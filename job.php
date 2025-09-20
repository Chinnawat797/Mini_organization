<?php session_start(); ?>
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
            padding-top: 80px;
        }

        .navbar {
            background-color: var(--secondary-bg) !important;
        }

        .card {
            background-color: var(--secondary-bg);
            color: var(--text-color);
            border: 1px solid #30363d;
            border-radius: 12px;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0,0,0,0.3);
        }

        .card .btn-danger {
            background-color: var(--highlight-color);
            border: none;
            transition: background-color 0.3s ease;
        }
        
        .card .btn-danger:hover {
            background-color: #da3633;
        }

        .btn-primary {
            background-color: var(--accent-color);
            border: none;
            color: var(--main-bg);
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #4489DD;
        }
        
        .section-title {
            font-size: 2.5rem;
            font-weight: 600;
            color: var(--accent-color);
            margin-bottom: 0.5rem;
        }

        a, a:hover {
            color: var(--accent-color);
        }

        .text-primary {
            color: var(--accent-color) !important;
        }

        .text-danger {
            color: var(--highlight-color) !important;
        }

        .text-muted {
            color: #8b949e !important;
        }
    </style>
</head>
<body>

<?php require 'navbar.php'; ?>

<div class="container my-5">
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
        echo '<h2 class="text-center section-title mb-4">ตำแหน่งงานที่เปิดรับสมัคร</h2>';
    }

    while ($job = $result->fetch_object()) {
        $qualifications = '<ul class="mb-2 list-unstyled">';
        $qs = explode('/', $job->qualifications);
        foreach ($qs as $q) {
            $qualifications .= "<li><i class='fas fa-check-circle me-2' style='color: var(--highlight-color);'></i>$q</li>";
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