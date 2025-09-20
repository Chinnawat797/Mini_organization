<!DOCTYPE html>
<html lang="en">
<head>
    <?php require '../head.php' ?>

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
            background-color: var(--main-bg);
            color: var(--text-color);
            min-height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Kanit', sans-serif;
        }
        
        .form-box {
            background-color: var(--secondary-bg);
            padding: 2.5rem;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 600px;
        }

        .form-title {
            text-align: center;
            font-weight: bold;
            color: var(--accent-color);
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
        }

        input.form-control,
        textarea.form-control {
            background-color: var(--main-bg);
            color: var(--text-color);
            border: 1px solid #30363D;
            transition: border-color 0.3s ease;
        }
        
        input.form-control:focus,
        textarea.form-control:focus {
            background-color: var(--main-bg);
            color: var(--text-color);
            border-color: var(--accent-color);
            box-shadow: 0 0 0 0.25rem rgba(88, 166, 255, 0.25);
        }

        textarea {
            resize: vertical;
        }
        
        .btn-custom-add {
            background-color: #238636;
            border-color: #238636;
            color: white;
            transition: background-color 0.3s ease;
        }
        
        .btn-custom-add:hover {
            background-color: #2ea043;
        }
        
        .btn-custom-delete {
            background-color: var(--highlight-color);
            border-color: var(--highlight-color);
            color: white;
            transition: background-color 0.3s ease;
        }
        
        .btn-custom-delete:hover {
            background-color: #da3633;
        }

        .btn-primary {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
            color: var(--main-bg);
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }
        
        .btn-primary:hover {
            background-color: #4489DD;
            border-color: #4489DD;
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

    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(function () {
            $('#add').click(function () {
                var el = $('input[name="qualifications[]"]:last');
                var input = el.clone();
                input.val('');
                input.insertAfter(el);
            });
            $('#delete').click(function () {
                if ($('input[name="qualifications[]"]').length > 1) {
                    $('input[name="qualifications[]"]:last').remove();
                }
            });
            $('#add').click();
        });
    </script>
</head>

<body>
    <?php require 'admin-navbar.php' ?>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Your PHP code for database insertion remains the same
        $position = $_POST['position'];
        $quantity = $_POST['quantity'];
        $description = $_POST['description'];

        $mysqli = new mysqli('localhost', 'root', '', 'jobs_resume');
        $sql = 'INSERT INTO jobs VALUES (?, ?, ?, ?, ?, ?)';
        $stmt = $mysqli->stmt_init();
        $stmt->prepare($sql);
        $qualifications = [];

        foreach ($_POST['qualifications'] as $q) {
            $q = trim($q);
            if (!empty($q)) {
                $qualifications[] = $q;
            }
        }

        $qual_str = implode('/', $qualifications);
        $param = [0, $position, $quantity, $description, $qual_str, date('Y-m-d')];

        $stmt->bind_param('isssss', ...$param);
        $stmt->execute();

        $hmsg = '';
        $msg = '';
        $bs_class = '';

        if ($stmt->affected_rows == 1) {
            $hmsg = 'สำเร็จ: ';
            $msg = 'ประกาศงานเรียบร้อยแล้ว';
            $bs_class = 'alert-success';
        } else {
            $hmsg = 'ล้มเหลว: ';
            $msg = 'ไม่สามารถประกาศงานได้';
            $bs_class = 'alert-danger';
        }

        echo <<<HTML
            <div class="alert {$bs_class} alert-dismissible position-fixed start-50 translate-middle-x mt-2" style="top: 70px; z-index: 1050; width: 90%; max-width: 500px;">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>$hmsg</strong>$msg
            </div>
        HTML;

        $stmt->close();
        $mysqli->close();
    }
    ?>

    <div class="form-box">
        <h4 class="form-title">ประกาศรับสมัครงาน</h4>

        <form method="post">
            <div class="mb-3">
                <input type="text" name="position" class="form-control" placeholder="ชื่อตำแหน่งงาน" required>
            </div>
            <div class="mb-3">
                <input type="text" name="quantity" class="form-control" placeholder="จำนวนที่ต้องการ" required>
            </div>
            <div class="mb-3">
                <textarea name="description" class="form-control" rows="3" placeholder="รายละเอียดของงาน"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">คุณสมบัติ</label>
                <input type="text" name="qualifications[]" class="form-control mb-2" placeholder="คุณสมบัติ" required>
            </div>
            
            <div class="d-flex justify-content-between mb-3">
                <button type="button" id="add" class="btn btn-sm btn-custom-add flex-fill me-2">เพิ่มคุณสมบัติ</button>
                <button type="button" id="delete" class="btn btn-sm btn-custom-delete flex-fill">ลบคุณสมบัติ</button>
            </div>

            <button type="submit" class="btn btn-primary d-block w-100">ส่งข้อมูล</button>
        </form>
    </div>
</body>
</html>