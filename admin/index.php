<?php @session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require '../head.php'; ?>
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
            font-family: 'Kanit', sans-serif;
            font-weight: 300;
        }

        .form-box {
            background-color: var(--secondary-bg);
            color: var(--text-color);
            padding: 2.5rem;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
            min-width: 320px;
        }

        input.form-control {
            background-color: var(--main-bg);
            color: var(--text-color);
            border: 1px solid #30363D;
            transition: border-color 0.3s ease;
        }

        input.form-control:focus {
            background-color: var(--main-bg);
            color: var(--text-color);
            border-color: var(--accent-color);
            box-shadow: 0 0 0 0.25rem rgba(88, 166, 255, 0.25);
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

        .btn-outline-success {
            border: 2px solid var(--accent-color);
            color: var(--accent-color);
            transition: all 0.3s ease;
        }

        .btn-outline-success:hover {
            background-color: var(--accent-color);
            color: var(--main-bg);
        }
        
        .btn-outline-warning {
            border: 2px solid var(--text-color);
            color: var(--text-color);
            transition: all 0.3s ease;
        }

        .btn-outline-warning:hover {
            background-color: var(--text-color);
            color: var(--main-bg);
        }

        .btn-danger {
            background-color: var(--highlight-color);
            border-color: var(--highlight-color);
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }
        
        .btn-danger:hover {
            background-color: #da3633;
            border-color: #da3633;
        }

        .alert-danger {
            background-color: #2c0b0e;
            color: var(--highlight-color);
            border-color: var(--highlight-color);
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
</body>
</html>