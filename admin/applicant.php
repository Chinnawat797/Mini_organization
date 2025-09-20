<?php session_start(); ?>
<!DOCTYPE html>
<html lang="th">
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
            font-family: 'Kanit', sans-serif;
            background-color: var(--main-bg);
            color: var(--text-color);
            padding-top: 100px;
        }
        
        .navbar {
            background-color: var(--secondary-bg) !important;
        }

        .container {
            max-width: 1000px;
        }

        .table {
            color: var(--text-color);
        }
        
        .table-custom {
            background-color: var(--secondary-bg);
            border-collapse: separate;
            border-spacing: 0 10px;
            border-radius: 12px;
        }

        .table-custom th, .table-custom td {
            padding: 1rem;
            border-top: 1px solid #30363d;
        }

        .table-custom thead tr {
            background-color: #1a1e24;
        }
        
        .table-custom tbody tr {
            transition: background-color 0.3s ease;
        }

        .table-custom tbody tr:hover {
            background-color: #2a333f;
        }

        .btn-primary {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
            color: var(--main-bg);
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #4489DD;
            border-color: #4489DD;
        }

        .btn-danger {
            background-color: var(--highlight-color);
            border-color: var(--highlight-color);
            transition: background-color 0.3s ease;
        }
        
        .btn-danger:hover {
            background-color: #da3633;
            border-color: #da3633;
        }
        
        .section-title {
            font-size: 2.5rem;
            font-weight: 600;
            color: var(--accent-color);
            margin-bottom: 0.5rem;
            text-align: center;
        }

        .table-actions {
            white-space: nowrap;
        }

        @media (max-width: 576px) {
            .table-responsive {
                font-size: 0.9rem;
            }
            .table-actions {
                display: flex;
                flex-direction: column;
                align-items: flex-end;
            }
            .btn-sm {
                width: 100%;
                margin-bottom: 0.5rem;
            }
            .text-end {
                text-align: left !important;
            }
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(function() {
            $('.btn-delete').click(function(e) {
                if (!confirm('ยืนยันการลบผู้สมัครงานรายนี้')) {
                    e.preventDefault();
                }
            });
        });
    </script>
</head>

<body>
    <?php require 'admin-navbar.php'?>
    
    <div class="container my-5">
        <h2 class="section-title mb-4">รายชื่อผู้สมัครงาน</h2>
        <?php
        require '../lib/pagination-v2.class.php';
        $page = new PaginationV2();
        $mysqli = new mysqli('localhost', 'root', '', 'jobs_resume');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['del_id'];
            $sql = "DELETE FROM applicant WHERE id = $id";
            $mysqli->query($sql);
            $file_name = "../resume/$id.pdf";
            if (file_exists($file_name)) {
                unlink($file_name);
            }
        }

        $sql = 'SELECT * FROM applicant ORDER BY id DESC';
        $result = $page->query($mysqli, $sql, 20);
        
        if ($result->num_rows == 0) {
            echo '<p class="text-center text-muted">ยังไม่มีผู้สมัครงานในขณะนี้</p>';
        } else {
            echo <<<HTML
            <div class="table-responsive">
                <table class="table table-custom">
                    <thead>
                        <tr>
                            <th>รายชื่อผู้สมัครงาน</th>
                            <th class="text-end">การจัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
            HTML;

            while ($a = $result->fetch_object()) {
                $p = str_replace('/', ', ', $a->apply_for_positons);
                echo <<<HTML
                <tr>
                    <td>$a->firstname $a->lastname<br>
                        <span class="text-muted small">ตำแหน่งที่สมัคร: $p</span>
                    </td>
                    <td class="text-end table-actions">
                        <a href="../resume/$a->id.pdf" target="_blank" class="btn btn-primary btn-sm me-2">Resume</a>
                        <form method="post" class="d-inline">
                            <input type="hidden" name="del_id" value="$a->id">
                            <button type="submit" class="btn btn-danger btn-sm btn-delete">ลบ</button>
                        </form>
                    </td>
                </tr>
                HTML;
            }
            echo '</tbody></table></div>';
        }
        $mysqli->close();
        ?>
    </div>

    <?php require '../footer.php' ?>
</body>
</html>