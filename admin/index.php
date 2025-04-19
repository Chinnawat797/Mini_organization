<?php @session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require '../head.php'; ?>
    <style>
        body {
            background-color: #0D1117;
            color: #C9D1D9;
            font-family: "Kanit", sans-serif;
            font-weight: 300;
        }

        .form-box {
            background-color: #161B22;
            color: #C9D1D9;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(88, 166, 255, 0.2);
            min-width: 320px;
        }

        input.form-control {
            background-color: #0D1117;
            color: #C9D1D9;
            border: 1px solid #30363D;
        }

        input.form-control:focus {
            background-color: #0D1117;
            color: #C9D1D9;
            border-color: #58A6FF;
            box-shadow: 0 0 0 0.2rem rgba(88, 166, 255, 0.25);
        }

        .btn-primary {
            background-color: #58A6FF;
            border-color: #58A6FF;
            color: #0D1117;
        }

        .btn-outline-success,
        .btn-outline-warning,
        .btn-danger {
            border-width: 2px;
        }

        .btn-outline-success {
            border-color: #58A6FF;
            color: #58A6FF;
        }

        .btn-outline-success:hover {
            background-color: #58A6FF;
            color: #0D1117;
        }

        .btn-outline-warning {
            border-color: #C9D1D9;
            color: #C9D1D9;
        }

        .btn-outline-warning:hover {
            background-color: #C9D1D9;
            color: #0D1117;
        }

        .btn-danger {
            background-color: #F85149;
            border-color: #F85149;
        }

        .btn-danger:hover {
            background-color: #da3633;
            border-color: #da3633;
        }

        .alert-danger {
            background-color: #2c0b0e;
            color: #F85149;
            border-color: #F85149;
        }

        .btn-close {
            filter: invert(1);
        }
    </style>
</head>

<body class="d-flex justify-content-center align-items-center min-vh-100">
    <?php require 'admin-navbar.php'; ?>

    <form method="post" class="form-box">
        <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $login = $_POST['login'];
                $pswd = $_POST['pswd'];
                if ($login == 'kdit' && $pswd == 'kdit2025') {
                    $_SESSION['admin'] = '1';
                    echo '<meta http-equiv="refresh" content="0">';
                } else {
                    echo <<<HTML
                        <div class="alert alert-danger alert-dismissible fade show">
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            <strong>Incorrect:</strong> The admin username or password is incorrect.
                        </div> 
                    HTML;
                }
            }

            if (!isset($_SESSION['admin'])) {
                echo <<<HTML
                    <h4 class="text-center fw-bold mb-3">KDIT ADMIN</h4>
                    <input type="text" name="login" class="form-control form-control-sm mb-2 fw-bold" placeholder="Username" required>
                    <input type="password" name="pswd" class="form-control form-control-sm mb-3 fw-bold" placeholder="Password" required>
                    <button class="btn btn-primary btn-sm w-100">เข้าสู่ระบบ</button>
                HTML;
            } else {
                echo <<<HTML
                    <h4 class="text-center fw-bold mb-4">แอดมินเท่านั้น</h4>
                    <a href="admin-add-jobs.php" class="btn btn-outline-success mb-2 d-block">ประกาศสมัครงาน</a>
                    <a href="applicant.php" class="btn btn-outline-warning mb-3 d-block">ตรวจสอบผู้สมัคร</a>
                    <a href="admin-signout.php" class="btn btn-danger d-block">ออกจากระบบ</a>
                HTML;
            }
        ?>
    </form>

    <?php require '../footer.php'; ?>
</body>
</html>
