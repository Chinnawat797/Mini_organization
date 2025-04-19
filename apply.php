<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'head.php'; ?>
    <style>
        * {
            font-family: 'Kanit', sans-serif;
        }

        html, body {
            height: 100%;
            margin: 0;
            background-color: #0D1117;
            color: #C9D1D9;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        form {
            width: 100%;
            max-width: 600px;
            padding: 2rem;
            border-radius: 15px;
            background-color: #161B22;
            box-shadow: 1px 1px 10px rgba(0, 0, 0, 0.8);
        }

        input[type="text"],
        input[type="file"],
        .form-control {
            background-color: #0D1117;
            border: 1px solid #30363D;
            color: #C9D1D9;
        }

        .form-control:focus {
            background-color: #0D1117;
            color: #fff;
            border-color: #58A6FF;
            box-shadow: none;
        }

        .form-check-label {
            color: #C9D1D9;
        }

        label {
            margin-top: 0.5rem;
            color: #58A6FF;
        }

        .btn-primary {
            background-color: #238636;
            border-color: #238636;
            font-weight: bold;
        }

        .alert {
            background-color: #21262D;
            color: #C9D1D9;
            border-color: #30363D;
        }

        .alert-success {
            border-left: 5px solid #2EA043;
        }

        .alert-danger {
            border-left: 5px solid #F85149;
        }

            
        .form-check {
            display: flex;
            align-items: center;
            gap: 0.5rem; /* ระยะห่างระหว่าง checkbox กับ label */
        }
        .form-check-input {
            background-color: #1f1f1f;   /* พื้นหลังมืด */
            border: 1px solid #555;      /* เส้นขอบเข้ม */
            accent-color: #0d6efd;       /* สีตอนติ๊ก (ใช้กับเบราว์เซอร์สมัยใหม่) */
            width: 1.1em;
            height: 1.1em;
        }



    </style>

    <script>
        $(function () {
            $('#resume').change(function () {
                var filename = $(this).val().split('\\').pop();
                $(this).next().text(filename);
            });

            $('#submit').click(function () {
                if ($(':checkbox:checked').length == 0) {
                    alert('ต้องเลือกสมัครงานอย่างน้อย 1 ตำแหน่ง');
                } else {
                    $('form').submit();
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
            <div class="alert $bs_class alert-dismissible">
                $msg
                <a href="job.php" class="btn btn-secondary btn-sm">กลับไปหน้างาน</a>
            </div>
        HTML;
    }
    ?>

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
                exit('</form></body></html>');
            }
        }

        $sql = 'SELECT id, position FROM jobs';
        $result = $mysqli->query($sql);
        if ($result->num_rows == 0) {
            echo '<h6 class="text-center text-danger mt-3 mb-5">ไม่มีตำแหน่งงานที่เปิดรับสมัคร</h6>';
            $mysqli->close();
            include 'footer.php';
            exit('</form></body></html>');
        }
        ?>

        <h4 class="text-center text-info mb-3">สมัครงาน</h4>
        <div class="input-group input-group-sm mb-3">
            <input type="text" name="firstname" class="form-control" required placeholder="ชื่อจริง">
            <input type="text" name="lastname" class="form-control" required placeholder="นามสกุล">
        </div>

        <label class="fw-bold">ตำแหน่งที่สมัคร</label>
        <div class="mb-3">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" name="positions[]" id="c<?= $row['id'] ?>" value="<?= $row['position'] ?>">
                    <label class="form-check-label" for="c<?= $row['id'] ?>"><?= $row['position'] ?></label>
                </div>
            <?php endwhile; ?>
        </div>

        <label class="fw-bold">เรซูเม่ (PDF เท่านั้น)</label>
        <div class="mb-3">
            <input class="form-control" type="file" name="resume" id="resume" accept="application/pdf" required>
        </div>

        <button type="submit" id="submit" class="btn btn-primary btn-sm d-block mx-auto px-5">ส่งใบสมัคร</button>
    </form>

    <?php require 'footer.php'; ?>
</body>
</html>


</html>