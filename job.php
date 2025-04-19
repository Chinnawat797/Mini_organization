<?php session_start(); ?>
<!DOCTYPE html>
<html lang="th">
<head>
    <?php require 'head.php' ?>
    <style>
        body {
            font-family: 'Kanit', sans-serif;
            background-color: #0D1117;
            color: #C9D1D9;
            padding-top: 80px;
        }

        .navbar {
            background-color: #161B22;
        }

        .card {
            background-color: #161B22;
            color: #C9D1D9;
            border: 1px solid #30363d;
        }

        .card .btn-danger {
            background-color: #da3633;
            border: none;
        }

        .btn-primary {
            background-color: #238636;
            border: none;
        }

        a, a:hover {
            color: #58a6ff;
        }

        .text-primary {
            color: #58a6ff !important;
        }

        .text-danger {
            color: #f85149 !important;
        }

        .text-muted {
            color: #8b949e !important;
        }
    </style>
</head>
<body>

<?php require 'navbar.php'; ?>

<div class="container my-4">
    <?php
    $mysqli = new mysqli('localhost', 'root', '', 'jobs_resume');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['del_id'];
        $stmt = $mysqli->prepare("DELETE FROM jobs WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }

    $sql = 'SELECT * FROM jobs';
    $result = $mysqli->query($sql);

    echo '<div class="row justify-content-center">';
    echo '<div class="col-lg-10">';

    if ($result->num_rows == 0) {
        echo '<h4 class="text-center text-danger fw-bold">ยังไม่มีตำแหน่งงานที่เปิดรับสมัครในขณะนี้</h4>';
        $mysqli->close();
        include 'footer.php';
        exit;
    } else {
        echo '<h4 class="text-center text-primary fw-bold mb-4">ตำแหน่งงานที่เปิดรับสมัคร</h4>';
    }

    while ($job = $result->fetch_object()) {
        $qualifications = '<ul class="mb-2">';
        $qs = explode('/', $job->qualifications);
        foreach ($qs as $q) {
            $qualifications .= "<li>$q</li>";
        }
        $qualifications .= '</ul>';

        if (is_numeric($job->quantity)) {
            $job->quantity .= ' คน';
        }

        echo <<<HTML
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-8 fw-bold h5">$job->position</div>
                        <div class="col-sm-4 text-end text-muted">$job->quantity</div>
                    </div>
                    <p class="mb-2">$job->description</p>
                    <div class="mb-2"><strong>คุณสมบัติ:</strong>$qualifications</div>
        HTML;

        if (isset($_SESSION['admin'])) {
            echo <<<HTML
                    <form method="post" onsubmit="return confirm('คุณต้องการลบตำแหน่งงานนี้จริงหรือไม่?');">
                        <input type="hidden" name="del_id" value="$job->id">
                        <button type="submit" class="btn btn-danger btn-sm">ลบตำแหน่งนี้</button>
                    </form>
            HTML;
        }

        echo '</div></div>';
    }

    if (!isset($_SESSION['admin'])) {
        echo <<<HTML
            <div class="text-center mt-4">
                <a href="apply.php" class="btn btn-primary px-5">สมัครงาน</a>
            </div>
        HTML;
    }

    echo '</div></div>';
    $mysqli->close();
    ?>
</div>

<?php require 'footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
