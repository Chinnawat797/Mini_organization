<!DOCTYPE html>
<html lang="th">

<head>
  <?php
    require 'head.php';
  ?>
  <style>
    body {
      background-color: #0D1117;
      color: #C9D1D9;
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

    .section-title {
      color: #58A6FF;
    }

    .contact-icon {
      color: #58A6FF;
      width: 30px;
    }

    .form-control, .form-control:focus {
      background-color: #161B22;
      color: #C9D1D9;
      border: 1px solid #30363d;
    }

    .btn-accent {
      background-color: #58A6FF;
      color: #0D1117;
    }

    .btn-accent:hover {
      background-color: #1F6FEB;
    }

    .contact-info i {
      margin-right: 10px;
    }
  </style>
</head>

<body>
    <?php require 'navbar.php'; ?>
  <div class="container">
    <h1 class="text-center section-title mb-3">ติดต่อเรา</h1>
    <p class="text-center mb-5">KDIT Company พร้อมให้คำปรึกษาและช่วยเหลือคุณในทุกเรื่องที่เกี่ยวข้องกับเทคโนโลยี</p>

    <div class="row mb-5">
      <div class="col-md-6">
        <h4 class="mb-4">ข้อมูลติดต่อ</h4>
        <ul class="list-unstyled contact-info">
          <li class="mb-3"><i class="fas fa-map-marker-alt contact-icon"></i>123/4 ถนนหลัก แขวงเทคโนโลยี เขตนวัตกรรม กรุงเทพฯ 10200</li>
          <li class="mb-3"><i class="fas fa-phone contact-icon"></i>02-345-6789</li>
          <li class="mb-3"><i class="fas fa-envelope contact-icon"></i>support@kditcompany.com</li>
          <li class="mb-3"><i class="fas fa-clock contact-icon"></i>จันทร์–ศุกร์ | 09:00 – 18:00</li>
        </ul>
      </div>

      <div class="col-md-6">
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
          <button type="submit" class="btn btn-accent">ส่งข้อความ</button>
        </form>
      </div>
    </div>

</body>

</html>
