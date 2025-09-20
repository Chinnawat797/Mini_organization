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
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .navbar {
            background-color: var(--secondary-bg) !important;
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
        }
        
        .card-dark:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0,0,0,0.3);
        }

        .contact-info-list i {
            font-size: 1.5rem;
            color: var(--accent-color);
            margin-right: 15px;
        }

        .form-control, .form-control:focus {
            background-color: #212529;
            color: var(--text-color);
            border: 1px solid #495057;
        }
        
        .form-control:focus {
            box-shadow: 0 0 0 0.25rem rgba(88, 166, 255, 0.25);
            border-color: var(--accent-color);
        }

        .btn-primary {
            background-color: var(--accent-color);
            border: none;
            color: var(--main-bg);
            padding: 12px 30px;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }
        
        .btn-primary:hover {
            background-color: #4489DD;
        }

        .location-map {
            width: 100%;
            height: 400px;
            border: 0;
            border-radius: 12px;
            filter: grayscale(80%) invert(90%);
        }
    </style>
</head>

<body>
    <?php require 'navbar.php'; ?>

    <div class="container text-center my-5">
        <h1 class="section-title">ติดต่อเรา</h1>
        <div class="section-divider"></div>
        <p class="lead" style="max-width: 800px; margin: 0 auto;">
            KDIT Company พร้อมให้คำปรึกษาและช่วยเหลือคุณในทุกเรื่องที่เกี่ยวข้องกับเทคโนโลยี
        </p>
    </div>

    <div class="container mb-5">
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card card-dark p-4 h-100">
                    <h4 class="mb-4">ข้อมูลติดต่อ</h4>
                    <ul class="list-unstyled contact-info-list">
                        <li class="d-flex align-items-start mb-3"><i class="fas fa-map-marker-alt"></i> 123/4 ถนนหลัก แขวงเทคโนโลยี เขตนวัตกรรม กรุงเทพฯ 10200</li>
                        <li class="d-flex align-items-start mb-3"><i class="fas fa-phone"></i> 02-345-6789</li>
                        <li class="d-flex align-items-start mb-3"><i class="fas fa-envelope"></i> support@kditcompany.com</li>
                        <li class="d-flex align-items-start mb-3"><i class="fas fa-clock"></i> จันทร์–ศุกร์ | 09:00 – 18:00</li>
                    </ul>
                    <hr style="border-color: #30363d;">
                    <h5 class="mt-4 mb-3">ติดตามเรา</h5>
                    <div class="d-flex social-icons">
                        <a href="#" class="me-3"><i class="fab fa-facebook-square fa-2x" style="color: var(--accent-color);"></i></a>
                        <a href="#" class="me-3"><i class="fab fa-twitter-square fa-2x" style="color: var(--accent-color);"></i></a>
                        <a href="#" class="me-3"><i class="fab fa-linkedin fa-2x" style="color: var(--accent-color);"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-dark p-4 h-100">
                    <h4 class="mb-4">ส่งข้อความถึงเรา</h4>
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label">ชื่อของคุณ</label>
                            <input type="text" class="form-control" id="name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">อีเมล</label>
                            <input type="email" class="form-control" id="email">
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label">หัวข้อ</label>
                            <input type="text" class="form-control" id="subject">
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">ข้อความของคุณ</label>
                            <textarea class="form-control" id="message" rows="4"></textarea>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary mt-3">ส่งข้อความ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container mb-5">
        <h2 class="section-title text-center">ที่ตั้งของเรา</h2>
        <div class="section-divider"></div>
        <div class="card card-dark p-3">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3875.46271954313!2d100.5348883148113!3d13.756330990353484!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e29ed870a417e9%3A0x7d63a8a37f59d435!2sBangkok%2C%20Thailand!5e0!3m2!1sen!2sus!4v1628173499000!5m2!1sen!2sus" class="location-map" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>

    <?php require 'footer.php'; ?>
</body>
</html>