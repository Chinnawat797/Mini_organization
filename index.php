<head>
    <?php require 'head.php'; ?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;600&display=swap');
    
    :root {
        --main-bg: #0D1117; /* พื้นหลังหลักสีเทาเข้ม */
        --secondary-bg: #161B22; /* พื้นหลังรองสีเทาเข้มขึ้น */
        --accent-color: #58A6FF; /* สีเน้นสีน้ำเงิน */
        --text-color: #C9D1D9; /* สีข้อความสีขาวนวล */
        --highlight-color: #F85149; /* สีไฮไลต์สีแดง */
    }

    body {
        font-family: "Kanit", sans-serif;
        font-weight: 300;
        padding-top: 80px;
        background-color: var(--main-bg);
        color: var(--text-color);
    }

    nav {
        background-color: var(--secondary-bg) !important;
    }

    .btn-primary {
        background-color: var(--accent-color);
        border: none;
        color: white;
        padding: 12px 30px;
        font-weight: 600;
        transition: background-color 0.3s ease;
    }
    
    .btn-primary:hover {
        background-color: #4489DD;
    }

    .btn-success {
        background-color: var(--highlight-color);
        border: none;
        color: white;
        padding: 12px 30px;
        font-weight: 600;
        transition: background-color 0.3s ease;
    }
    
    .btn-success:hover {
        background-color: #D34139;
    }

    .card {
        background-color: var(--secondary-bg);
        color: var(--text-color);
        border: 1px solid #30363d;
        border-radius: 12px;
        transition: transform 0.3s ease-in-out;
    }

    .card:hover {
        transform: translateY(-10px);
    }

    .card-title {
        color: var(--accent-color);
    }

    .y-y {
        font-size: 50px;
        color: var(--accent-color);
    }

    footer {
        background-color: var(--secondary-bg);
        color: var(--text-color);
    }

    a.btn:hover {
        opacity: 0.9;
    }
    
    .hero-section {
        background: linear-gradient(rgba(13, 17, 23, 0.9), rgba(13, 17, 23, 0.9)), url('https://via.placeholder.com/1500x800.png?text=IT+Services+Background') no-repeat center center/cover;
        padding: 100px 0;
        text-align: center;
    }

    .why-us-icon {
        font-size: 60px;
        color: var(--accent-color);
        margin-bottom: 20px;
    }
    
    .testimonial-bg {
        background-color: var(--main-bg);
        padding: 50px 0;
    }

    .testimonial-card {
        background-color: var(--secondary-bg);
        border-radius: 10px;
        padding: 30px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }
</style>
</head>

<body>
    <?php require 'navbar.php'; ?>

    <div class="hero-section">
        <div class="container">
            <h1 class="display-4 fw-bold mb-3" style="color: var(--text-color);">
                ยกระดับธุรกิจของคุณด้วยนวัตกรรมด้าน <span style="color: var(--accent-color);">IT</span>
            </h1>
            <p class="lead mb-4">
                KDIT Company คือพันธมิตรด้านเทคโนโลยีที่เชื่อถือได้ของคุณ เราพร้อมให้บริการด้านเครือข่าย, Cloud, และ Cybersecurity แบบครบวงจร
            </p>
            <a href="contact.php" class="btn btn-primary mx-2">ปรึกษาเรา</a>
            <a href="job.php" class="btn btn-success mx-2">ร่วมงานกับเรา</a>
        </div>
    </div>
    
    <div class="container my-5">
        <h2 class="text-center mb-4 fw-bold">บริการของเรา</h2>
        <div class="row g-4">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm text-center">
                    <div class="card-body">
                        <i class="fa-solid fa-cloud-arrow-down y-y mb-3"></i>
                        <h5 class="card-title fw-bold">บริการ Cloud</h5>
                        <p class="card-text">เรามีบริการ Cloud ที่ปลอดภัย รวดเร็ว และปรับขนาดได้ตามธุรกิจของคุณ พร้อมการดูแลโดยผู้เชี่ยวชาญ</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm text-center">
                    <div class="card-body">
                        <i class="fa-solid fa-shield-halved y-y mb-3"></i>
                        <h5 class="card-title fw-bold">ความปลอดภัยเครือข่าย</h5>
                        <p class="card-text">เราดูแลและออกแบบระบบรักษาความปลอดภัยเครือข่าย ด้วยเทคโนโลยีล่าสุด เพื่อปกป้องข้อมูลของคุณ</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm text-center">
                    <div class="card-body">
                        <i class="fa-solid fa-people-group y-y mb-3"></i>
                        <h5 class="card-title fw-bold">ให้คำปรึกษาโดยทีมงาน</h5>
                        <p class="card-text">ให้คำปรึกษา IT ครอบคลุมทุกมิติ พร้อมแนะนำเทคโนโลยีที่เหมาะสมกับองค์กรของคุณ</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container my-5">
        <h2 class="text-center mb-5 fw-bold">ทำไมต้องเลือกเรา</h2>
        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <i class="fa-solid fa-medal why-us-icon"></i>
                <h5 class="fw-bold">ประสบการณ์ที่เชื่อถือได้</h5>
                <p>ทีมงานของเราประกอบด้วยผู้เชี่ยวชาญที่มีประสบการณ์สูงในวงการ IT มายาวนาน</p>
            </div>
            <div class="col-md-4 mb-4">
                <i class="fa-solid fa-handshake why-us-icon"></i>
                <h5 class="fw-bold">บริการที่ปรับเปลี่ยนได้</h5>
                <p>เราพร้อมออกแบบโซลูชันที่ตอบโจทย์ความต้องการเฉพาะของธุรกิจคุณได้อย่างยืดหยุ่น</p>
            </div>
            <div class="col-md-4 mb-4">
                <i class="fa-solid fa-headset why-us-icon"></i>
                <h5 class="fw-bold">การสนับสนุนตลอดเวลา</h5>
                <p>เรามีทีมงานพร้อมให้การสนับสนุนและแก้ไขปัญหาตลอด 24 ชั่วโมง</p>
            </div>
        </div>
    </div>
    
    <div class="testimonial-bg">
        <div class="container my-5">
            <h2 class="text-center mb-5 fw-bold">ลูกค้าของเรากล่าวว่า</h2>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="testimonial-card text-center">
                                    <p class="fst-italic lead">"บริการของ KDIT Company ยอดเยี่ยมมากครับ ทีมงานมีความเป็นมืออาชีพและช่วยให้ธุรกิจของเราเติบโตได้อย่างรวดเร็ว"</p>
                                    <p class="fw-bold">- คุณสมชาย รักษาดี, CEO บริษัท Tech Solutions</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="testimonial-card text-center">
                                    <p class="fst-italic lead">"ระบบ Cloud ที่ KDIT Company ออกแบบให้ใช้งานง่ายและปลอดภัยมาก ทำให้เราทำงานได้อย่างไร้กังวล"</p>
                                    <p class="fw-bold">- คุณอรอนงค์ มีสุข, ผู้จัดการฝ่าย IT บริษัท E-Commerce จำกัด</p>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php require 'footer.php'; ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>