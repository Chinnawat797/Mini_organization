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
            background-color: var(--main-bg);
            color: var(--text-color);
            font-family: 'Kanit', sans-serif;
            padding-top: 100px;
        }

        .navbar {
            background-color: var(--secondary-bg) !important;
        }

        .highlight {
            color: var(--accent-color);
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 600;
            color: var(--accent-color);
            margin-bottom: 0.5rem;
        }
        
        .section-divider {
            height: 4px;
            background-color: var(--accent-color);
            width: 80px;
            margin: 1rem auto 3rem;
        }

        .card-dark {
            background-color: var(--secondary-bg);
            border: 1px solid #30363d;
            border-radius: 12px;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            padding: 2.5rem;
        }
        
        .card-dark:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }
        
        .about-icon {
            font-size: 60px;
            color: var(--accent-color);
            margin-bottom: 20px;
        }
        
        .founder-img {
            width: 250px;
            height: 250px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid var(--accent-color);
            box-shadow: 0 0 15px rgba(88, 166, 255, 0.4);
            transition: transform 0.3s ease;
        }
        
        .founder-img:hover {
            transform: scale(1.05);
        }

        .founder-title {
            color: var(--text-color);
            font-size: 1.5rem;
            margin-top: 1rem;
        }
        
        .founder-subtitle {
            color: var(--accent-color);
            font-weight: 300;
        }
        
        .expertise-list {
            list-style: none;
            padding: 0;
        }

        .expertise-list li {
            font-size: 1.1rem;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
        }
        
        .expertise-list li i {
            color: var(--highlight-color);
            margin-right: 15px;
            font-size: 1.5rem;
        }
    </style>
</head>
<body>

<?php require 'navbar.php'; ?>

<div class="container text-center my-5">
    <h1 class="section-title">เกี่ยวกับเรา</h1>
    <div class="section-divider"></div>
    <p class="lead" style="max-width: 800px; margin: 0 auto;">
        KDIT Company คือองค์กรที่เชี่ยวชาญด้าน <span class="highlight">เครือข่ายและเทคโนโลยีสารสนเทศ</span> ที่มุ่งมั่นในการให้บริการอย่างมืออาชีพด้วยนวัตกรรมที่ทันสมัย
    </p>
</div>

<div class="container my-5">
    <div class="row text-center g-4">
        <div class="col-md-6">
            <div class="card card-dark h-100 p-4">
                <i class="fa-solid fa-bullseye about-icon"></i>
                <h5 class="card-title">วิสัยทัศน์</h5>
                <p class="card-text">มุ่งมั่นเป็นผู้นำด้าน IT และเครือข่ายระดับประเทศ พร้อมผลักดันธุรกิจด้วยโซลูชันที่ล้ำสมัย</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-dark h-100 p-4">
                <i class="fa-solid fa-eye about-icon"></i>
                <h5 class="card-title">พันธกิจ</h5>
                <p class="card-text">ให้บริการด้าน IT ที่ครอบคลุม มีคุณภาพ และสร้างมูลค่าให้ลูกค้าในระยะยาว</p>
            </div>
        </div>
    </div>
</div>

<div class="container my-5 py-5">
    <div class="row align-items-center">
        <div class="col-md-6 mb-4 mb-md-0">
            <h2 class="section-title text-center text-md-start">ประวัติและสิ่งที่เราเชี่ยวชาญ</h2>
            <p class="lead text-center text-md-start">
                KDIT Company ก่อตั้งขึ้นในปี <span class="highlight">2020</span> จากความมุ่งมั่นของผู้ก่อตั้งที่ต้องการช่วยให้ธุรกิจในประเทศไทยเข้าถึงเทคโนโลยีที่มีประสิทธิภาพ เราเติบโตอย่างต่อเนื่องด้วยการยึดมั่นในคุณภาพและนวัตกรรม
            </p>
        </div>
        <div class="col-md-6">
            <ul class="expertise-list">
                <li><i class="fa-solid fa-check-circle"></i> การวางแผนและจัดการเครือข่ายระดับองค์กร</li>
                <li><i class="fa-solid fa-check-circle"></i> บริการ Cloud Solutions ที่ปลอดภัยและยืดหยุ่น</li>
                <li><i class="fa-solid fa-check-circle"></i> การให้คำปรึกษาด้าน Cybersecurity และการป้องกันข้อมูล</li>
                <li><i class="fa-solid fa-check-circle"></i> พัฒนาซอฟต์แวร์และแอปพลิเคชันสำหรับธุรกิจ</li>
            </ul>
        </div>
    </div>
</div>

<div class="container my-5 text-center">
    <h2 class="section-title">ผู้ก่อตั้งของเรา</h2>
    <div class="section-divider"></div>
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card card-dark h-100 text-center p-4">
                <div class="d-flex justify-content-center">
                    <img src="images/ball.png" alt="Founder 1" class="founder-img">
                </div>
                <h4 class="founder-title">คุณ ชินวัตร สองธานี</h4>
                <p class="founder-subtitle">ผู้ร่วมก่อตั้ง / ผู้เชี่ยวชาญ Data science</p>
                <p class="mt-3">มีประสบการณ์ด้าน Data และความปลอดภัยมากกว่า 10 ปี เริ่มต้นจากการเป็นฟรีแลนซ์ดูแลระบบองค์กรขนาดกลาง ก่อนก่อตั้ง KDIT Company ด้วยความตั้งใจที่จะพัฒนาโซลูชันที่ตอบโจทย์ธุรกิจไทย</p>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card card-dark h-100 text-center p-4">
                <div class="d-flex justify-content-center">
                    <img src="images/fluck.png" alt="Founder 2" class="founder-img">
                </div>
                <h4 class="founder-title">คุณ รณกฤต เชื้อโพล้ง</h4>
                <p class="founder-subtitle">ผู้ร่วมก่อตั้ง / ผู้เชี่ยวชาญการเงินและการลงทุน</p>
                <p class="mt-3">มีประสบการณ์มากกว่า 10 ปีในวงการวางแผนการเงินและการวิเคราะห์ความเสี่ยง ได้รับใบอนุญาตผู้แนะนำการลงทุนจาก ก.ล.ต. และมีบทบาทเป็นที่ปรึกษาทางการเงินให้กับองค์กร</p>
            </div>
        </div>
    </div>
</div>

<?php require 'footer.php'; ?>

</body>
</html>