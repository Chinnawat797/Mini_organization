<!DOCTYPE html>
<html lang="th">
<head>
    <?php require 'head.php'; ?>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;600&display=swap');

        body {
            background-color: #0D1117;
            color: #C9D1D9;
            font-family: 'Kanit', sans-serif;
            padding-top: 100px;
        }

        nav, footer {
            background-color: #0D1117;
        }

        h2, h3 {
            color: #58A6FF;
        }

        .section-divider {
            height: 4px;
            background-color: #58A6FF;
            width: 60px;
            margin: 1rem auto;
        }

        .about-icon {
            font-size: 40px;
            color: #58A6FF;
            margin-bottom: 10px;
        }

        .highlight {
            color: #F85149;
        }

        .card-dark {
            background-color: #161B22;
            border: none;
        }

        .card-dark .card-title {
            color: #58A6FF;
        }

        .card-dark .card-text {
            color: #C9D1D9;
        }

        .founder-img {
            width: 100%;
             max-width: 300px;
             aspect-ratio: 1 / 1;
             object-fit: cover;
             border-radius: 50%;
             border: 2px solid #58A6FF;
             margin-bottom: 1rem;
            }


    </style>
</head>
<body>

<?php require 'navbar.php'; ?>

<!-- Section: About -->
<div class="container text-center my-5">
    <h2>เกี่ยวกับเรา</h2>
    <div class="section-divider"></div>
    <p class="lead">KDIT Company คือองค์กรที่เชี่ยวชาญด้าน <span class="highlight">เครือข่ายและเทคโนโลยีสารสนเทศ</span> ที่มุ่งมั่นในการให้บริการอย่างมืออาชีพ</p>
</div>

<!-- Section: Mission & Vision -->
<div class="container my-5">
    <div class="row text-center g-4">
        <div class="col-md-4">
            <div class="card card-dark h-100 p-4">
                <i class="fa-solid fa-bullseye about-icon"></i>
                <h5 class="card-title">วิสัยทัศน์</h5>
                <p class="card-text">มุ่งมั่นเป็นผู้นำด้าน IT และเครือข่ายระดับประเทศ พร้อมผลักดันธุรกิจด้วยโซลูชันที่ล้ำสมัย</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-dark h-100 p-4">
                <i class="fa-solid fa-eye about-icon"></i>
                <h5 class="card-title">พันธกิจ</h5>
                <p class="card-text">ให้บริการด้าน IT ที่ครอบคลุม มีคุณภาพ และสร้างมูลค่าให้ลูกค้าในระยะยาว</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-dark h-100 p-4">
                <i class="fa-solid fa-users about-icon"></i>
                <h5 class="card-title">ทีมงานของเรา</h5>
                <p class="card-text">รวมทีมผู้เชี่ยวชาญที่มีประสบการณ์และใจรักการบริการ พร้อมดูแลคุณตลอดทุกกระบวนการ</p>
            </div>
        </div>
    </div>
</div>

<!-- Section: Company History -->
<div class="container my-5">
    <h3 class="text-center">ประวัติบริษัท</h3>
    <div class="section-divider"></div>
    <p class="text-center">
        KDIT Company ก่อตั้งขึ้นในปี <span class="highlight">2020</span> จากความตั้งใจของผู้ก่อตั้งที่ต้องการช่วยให้ธุรกิจในประเทศไทยสามารถเข้าถึงเทคโนโลยีที่มีประสิทธิภาพ 
        ด้วยแนวคิด “<span class="highlight">IT เพื่อทุกคน</span>” เราจึงสร้างทีมที่แข็งแกร่ง และพร้อมให้คำปรึกษาและพัฒนาโซลูชันแบบครบวงจรอย่างจริงใจ
    </p>
</div>

<!-- Section: Founder -->
<!-- Section: Founders -->
<div class="container my-5">
    <h3 class="text-center">ผู้ก่อตั้ง</h3>
    <div class="section-divider"></div>
    <div class="row text-center justify-content-center">
        <!-- Founder 1 -->
        <div class="col-md-5 mb-4">
            <img src="images/ball.png" alt="Founder 1" class="founder-img">
            <h4 class="text-accent">คุณ ชินวัตร สองธานี</h4>
            <p class="text-muted">ผู้ร่วมก่อตั้ง / ผู้เชี่ยวชาญ Data science</p>
            <p>มีประสบการณ์ด้าน Data และความปลอดภัยมากกว่า 10 ปี
               เริ่มต้นจากการเป็นฟรีแลนซ์ดูแลระบบองค์กรขนาดกลาง ก่อนก่อตั้ง KDIT Company ด้วยความตั้งใจที่จะพัฒนาโซลูชันที่ตอบโจทย์ธุรกิจไทย</p>
        </div>

        <!-- Founder 2 -->
        <div class="col-md-5 mb-4">
            <img src="images/fluck.png" alt="Founder 2" class="founder-img">
            <h4 class="text-accent">คุณ รณกฤต เชื้อโพล้ง</h4>
            <p class="text-muted">ผู้ร่วมก่อตั้ง / ผู้เชี่ยวชาญการเงินและการลงทุน</p>
            <p>มีประสบการณ์มากกว่า 10 ปีในวงการวางแผนการเงิน การจัดพอร์ตลงทุน และการวิเคราะห์ความเสี่ยง ได้รับใบอนุญาตผู้แนะนำการลงทุนจาก ก.ล.ต. และมีบทบาทเป็นที่ปรึกษาทางการเงินให้กับทั้งบุคคลและองค์กร</p>
        </div>
    </div>
</div>


<!-- Section: Services -->
<div class="container text-center my-5">
    <h3>เราให้บริการอะไรบ้าง?</h3>
    <div class="section-divider"></div>
    <p>ไม่ว่าจะเป็น <span class="highlight">ระบบเครือข่าย</span>, การวางระบบ <span class="highlight">Server</span>, ให้คำปรึกษา <span class="highlight">Cyber Security</span> หรือ <span class="highlight">Cloud Services</span> เราพร้อมดูแลคุณอย่างเต็มที่</p>
</div>

<?php require 'footer.php'; ?>

</body>
</html>
