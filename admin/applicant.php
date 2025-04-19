<!DOCTYPE html>
<html lang="en">
<head>
    <?php require '../head.php'?>

    <!-- ✅ ฟอนต์ Kanit -->
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">

    <!-- ✅ Custom Dark Theme -->
    <style>
        body {
            margin: 0;
            font-family: 'Kanit', sans-serif;
            background-color: #121212;
            color: #e0e0e0;
        }

        .container {
            max-width: 1000px;
        }

        .table {
            color: #e0e0e0;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #1e1e1e;
        }

        .table-striped tbody tr:nth-of-type(even) {
            background-color: #2a2a2a;
        }

        .table thead {
            background-color: #333;
            color: #fff;
        }

        .btn-primary {
            background-color: #0d6efd;
            border-color: #0d6efd;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-sm {
            font-size: 0.875rem;
        }

        /* ✅ Responsive */
        @media (max-width: 576px) {
            .table-responsive {
                font-size: 0.9rem;
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

    <!-- ✅ jQuery Delete Confirm -->
    <script>
        $(function() {
            $('.btn-delete').click(function() {
                if (confirm('ยืนยันการลบผู้สมัครงานรายนี้')) {
                    $(this).closest('form').submit();
                }
            });
        });
    </script>
</head>
<body class="d-flex flex-column align-items-center" style="padding-top: 80px;">
    <?php require 'admin-navbar.php'?>
    
    <div class="container my-4">
        <?php
        require '../lib/pagination-v2.class.php';
        $page = new PaginationV2();
        $mysqli = new mysqli('localhost', 'root', '', 'jobs_resume');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['del_id'];
            $sql = "DELETE FROM applicant WHERE id = $id";
            $mysqli->query($sql);
            $file_name = "resume/$id.pdf";
            if (file_exists($file_name)) {
                unlink($file_name);
            }
        }

        $sql = 'SELECT * FROM applicant ORDER BY id DESC';
        $result = $page->query($mysqli, $sql, 20);

        echo <<<HTML
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead class="table-dark">
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
                    <span class="text-info small">ตำแหน่งที่สมัคร: $p</span>
                </td>
                <td class="text-end pe-3">
                    <a href="../view-resume.php?id=$a->id" target="_blank" class="btn btn-primary btn-sm me-2">Resume</a>
                    <form method="post" class="d-inline delete-form">
                        <input type="hidden" name="del_id" value="$a->id">
                        <button type="submit" class="btn btn-danger btn-sm btn-delete">ลบ</button>
                    </form>
                </td>
            </tr>
            HTML;
        }

        echo '</tbody></table></div>';
        $mysqli->close();
        ?>
    </div>

    <?php require '../footer.php' ?>
</body>

</html>