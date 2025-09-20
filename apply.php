<!DOCTYPE html>
<html lang="th">
<head>
    <?php require 'head.php'; ?>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;600&display=swap');

        :root {
            --main-bg: #0D1117;
            --secondary-bg: #161B22;
            --accent-color: #58A6FF;
            --text-color: #C9D1D9;
            --highlight-color: #F85149;
        }

        body {
            font-family: 'Kanit', sans-serif;
            background-color: var(--main-bg);
            color: var(--text-color);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding-top: 80px;
        }

        .form-box {
            width: 100%;
            max-width: 600px;
            padding: 2.5rem;
            border-radius: 12px;
            background-color: var(--secondary-bg);
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
        }

        .form-title {
            text-align: center;
            font-weight: 600;
            color: var(--accent-color);
            margin-bottom: 1.5rem;
            font-size: 1.75rem;
        }

        .form-control,
        .form-control:focus {
            background-color: var(--main-bg);
            border: 1px solid #30363D;
            color: var(--text-color);
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 0.25rem rgba(88, 166, 255, 0.25);
        }

        .form-check-input {
            background-color: #212529;
            border: 1px solid #495057;
        }

        .form-check-input:checked {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
        }

        label {
            color: var(--text-color);
            font-weight: 400;
        }
        
        .file-label {
            color: var(--accent-color);
        }

        .btn-primary {
            background-color: #238636;
            border-color: #238636;
            color: white;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }
        
        .btn-primary:hover {
            background-color: #2ea043;
        }

        .alert-success {
            background-color: #28a74533;
            color: #28a745;
            border-color: #28a745;
        }
        
        .alert-danger {
            background-color: #dc354533;
            color: #dc3545;
            border-color: #dc3545;
        }
        
        .btn-close {
            filter: invert(1);
        }
        
        .alert-custom {
            position: fixed;
            top: 100px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1050;
            width: 90%;
            max-width: 500px;
        }
    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(function () {
            $('#resume').change(function () {
                var filename = $(this).val().split('\\').pop();
                if (filename) {
                    $('#file-name-display').text(filename).removeClass('text-muted').addClass('text-info');
                } else {
                    $('#file-name-display').text('ยังไม่ได้เลือกไฟล์').removeClass('text-info').addClass('text-muted');
                }
            });

            $('form').submit(function (e) {
                if ($(':checkbox:checked').length == 0) {
                    e.preventDefault();
                    alert('ต้องเลือกสมัครงานอย่างน้อย 1 ตำแหน่ง');
                }
            });
        });
    </script>
</head>
<body>
    <?php require 'navbar.php'; ?>

    <?php
    function show_alert($msg, $bs_class) {
        echo <<<HTML
            <div class="alert $bs_class alert-dismissible fade show alert-custom">
                <strong>$msg</strong>
                <a href="job.php" class="btn btn-secondary btn-sm ms-3">กลับไปหน้างาน</a>
            </div>
        HTML;
    }
    ?>

    <div class="form-box">
        <h4 class="form-title">สมัครงานกับ KDIT Company</h4>
        <p class="text-center text-muted mb-4">กรุณากรอกข้อมูลและแนบไฟล์ Resume ที่เป็น PDF เท่านั้น</p>
        
        <form method="post" enctype="multipart/form-data">
            <?php
            $mysqli = new mysqli('localhost', 'root', '', 'jobs_resume');

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $fname = $_POST['firstname'];
                $lname = $_POST['lastname'];
                $positions = implode('/', $_POST['positions']);
                $file = $_FILES['resume'];

                if ($file['error'] != 0) {
                    show_alert('เกิดข้อผิดพลาดในการอัปโหลดไฟล์', 'alert-danger');
                } else if ($file['type'] != 'application/pdf') {
                    show_alert('กรุณาอัปโหลดไฟล์ PDF เท่านั้น', 'alert-danger');
                } else {
                    $sql = 'INSERT INTO applicant (firstname, lastname, apply_for_positons, resume_file) VALUES (?, ?, ?, ?)';
                    $stmt = $mysqli->stmt_init();
                    $stmt->prepare($sql);
                    $p = [$fname, $lname, $positions, ''];
                    $stmt->bind_param('ssss', ...$p);
                    $stmt->execute();
                    $id = $stmt->insert_id;

                    $file_name = "$id.pdf";
                    @mkdir('resume');
                    if (move_uploaded_file($file['tmp_name'], "resume/$file_name")) {
                        $sql = "UPDATE applicant SET resume_file = '$file_name' WHERE id = $id";
                        $mysqli->query($sql);
                        show_alert('อัปโหลด Resume เรียบร้อยแล้ว', 'alert-success');
                    } else {
                        show_alert('ไม่สามารถบันทึกไฟล์ได้', 'alert-danger');
                    }

                    $mysqli->close();
                    include 'footer.php';
                    exit('</form></div></body></html>');
                }
            }

            $sql = 'SELECT id, position FROM jobs';
            $result = $mysqli->query($sql);
            if ($result->num_rows == 0) {
                echo '<h6 class="text-center text-danger mt-3 mb-5">ไม่มีตำแหน่งงานที่เปิดรับสมัคร</h6>';
                $mysqli->close();
                include 'footer.php';
                exit('</form></div></body></html>');
            }
            ?>

            <div class="row g-2 mb-3">
                <div class="col">
                    <input type="text" name="firstname" class="form-control" required placeholder="ชื่อจริง">
                </div>
                <div class="col">
                    <input type="text" name="lastname" class="form-control" required placeholder="นามสกุล">
                </div>
            </div>

            <label class="fw-bold mb-2">ตำแหน่งที่สมัคร</label>
            <div class="mb-3">
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="positions[]" id="c<?= $row['id'] ?>" value="<?= $row['position'] ?>">
                        <label class="form-check-label" for="c<?= $row['id'] ?>"><?= $row['position'] ?></label>
                    </div>
                <?php endwhile; ?>
            </div>

            <label class="fw-bold file-label">แนบเรซูเม่ (PDF เท่านั้น)</label>
            <div class="input-group mb-4">
                <input class="form-control" type="file" name="resume" id="resume" accept="application/pdf" required>
            </div>
            
            <button type="submit" class="btn btn-primary d-block w-100">ส่งใบสมัคร</button>
        </form>
    </div>

    <?php require 'footer.php'; ?>
</body>
</html>