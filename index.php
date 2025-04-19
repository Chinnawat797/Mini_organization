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
            font-family: "Kanit", sans-serif;
            font-weight: 300;
            padding-top: 80px;
            padding-bottom: 80px;
            background-color: var(--main-bg);
            color: var(--text-color);
        }

        nav {
            background-color: var(--secondary-bg) !important;
        }

        .btn-primary {
            background-color: var(--accent-color);
            border: none;
        }

        .btn-success {
            background-color: var(--highlight-color);
            border: none;
        }

        .card {
            background-color: var(--secondary-bg);
            color: var(--text-color);
            border: 1px solid #30363d;
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
    </style>
   
</head>

<body>
    <?php require 'navbar.php'; ?>

    <div class="container my-5">
        <h2 class="text-center mb-4">ยินดีต้อนรับสู่ <span style="color: var(--accent-color)">KDIT Company</span></h2>
        <p class="text-center">
            องค์กรสำหรับบริการด้านเครือข่าย พร้อมให้คำปรึกษาด้าน IT ทุกประเภท และมีการสนับสนุนทางธุรกิจในด้านต่าง ๆ <br>
            เรามุ่งมั่นที่จะเป็นพันธมิตรทางเทคโนโลยีที่เชื่อถือได้ของคุณ ด้วยบริการที่ครอบคลุม ครบวงจร และทีมงานผู้เชี่ยวชาญ 
            พร้อมให้คำปรึกษาและพัฒนาโซลูชันที่เหมาะสมกับธุรกิจของคุณอย่างมืออาชีพ
        </p>
        <div class="text-center mt-4">
            <a href="contact.php" class="btn btn-primary mx-2">ติดต่องาน</a>
            <a href="job.php" class="btn btn-success mx-2">สมัครงานเข้าร่วมกับองค์กร</a>
        </div>
    </div>

    <div class="container my-5">
        <div class="row g-4">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm text-center">
                    <div class="card-body">
                        <i class="fa-solid fa-cloud-arrow-down y-y mb-3"></i>
                        <h5 class="card-title">บริการ Cloud</h5>
                        <p class="card-text">เรามีบริการ Cloud ที่ปลอดภัย รวดเร็ว และปรับขนาดได้ตามธุรกิจของคุณ พร้อมการดูแลโดยผู้เชี่ยวชาญ</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm text-center">
                    <div class="card-body">
                        <i class="fa-solid fa-shield-halved y-y mb-3"></i>
                        <h5 class="card-title">ความปลอดภัยเครือข่าย</h5>
                        <p class="card-text">เราดูแลและออกแบบระบบรักษาความปลอดภัยเครือข่าย ด้วยเทคโนโลยีล่าสุด เพื่อปกป้องข้อมูลของคุณ</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm text-center">
                    <div class="card-body">
                        <i class="fa-solid fa-people-group y-y mb-3"></i>
                        <h5 class="card-title">ให้คำปรึกษาโดยทีมงาน</h5>
                        <p class="card-text">ให้คำปรึกษา IT ครอบคลุมทุกมิติ พร้อมแนะนำเทคโนโลยีที่เหมาะสมกับองค์กรของคุณ</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require 'footer.php'; ?>
</body>
