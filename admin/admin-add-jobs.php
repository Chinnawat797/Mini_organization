<!DOCTYPE html>
<html lang="en">
<head>
    <?php require '../head.php' ?>

    <style>
        * {
            font-family: 'Kanit', sans-serif;
        }

        body {
            background-color: #0D1117;
            color: #C9D1D9;
            min-height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        form {
            background-color: #161B22;
            padding: 2rem;
            border-radius: 20px;
            width: 100%;
            max-width: 600px;
        }

        input[type="text"],
        textarea {
            background-color: #0D1117;
            border: 1px solid #30363D;
            color: #C9D1D9;
            width: 100%;
            margin-top: 0.5rem;
            padding: 0.5rem;
            border-radius: 6px;
        }

        textarea {
            resize: none;
        }

        .form-title {
            text-align: center;
            font-weight: bold;
            color: #58A6FF;
            margin-bottom: 1rem;
        }

        .xx {
            margin-left: 0;
            display: flex;
            gap: 10px;
        }

        .btn {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #238636;
            border-color: #238636;
        }

        .btn-success {
            background-color: #58A6FF;
            border-color: #58A6FF;
            color: #0D1117;
        }

        .btn-danger {
            background-color: #F85149;
            border-color: #F85149;
        }

        .alert {
            font-family: 'Kanit', sans-serif;
        }
    </style>

    <script>
        $(function () {
            $('#add').click(function () {
                var el = $('[name="qualifications[]"]:last');
                var input = el.clone();
                input.val('');
                el.after(input);
            });

            $('#add').click();

            $('#delete').click(function () {
                if ($('input[name="qualifications[]"]').length > 1) {
                    $('input[name="qualifications[]"]:last').remove();
                }
            });
        });
    </script>
</head>

<body>
    <?php require 'admin-navbar.php' ?>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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

    <form method="post">
        <h4 class="form-title">ประกาศรับสมัครงาน</h4>

        <input type="text" name="position" placeholder="ชื่อตำแหน่งงาน" required>
        <input type="text" name="quantity" placeholder="จำนวนที่ต้องการ" required>
        <textarea name="description" rows="3" placeholder="รายละเอียดของงาน"></textarea>
        <input type="text" name="qualifications[]" placeholder="คุณสมบัติ" required>

        <div class="xx mt-2 mb-3">
            <div type="button" id="add" class="btn btn-sm btn-success">เพิ่มคุณสมบัติ</div>
            <div type="button" id="delete" class="btn btn-sm btn-danger">ลบคุณสมบัติ</div>
        </div>

        <button type="submit" class="btn btn-sm btn-primary d-block mx-auto">ส่งข้อมูล</button>
    </form>
</body>

</html>