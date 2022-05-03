<?php
require_once "connect.php";
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thư viện hình ảnh</title>
    <?php include_once base_app("include/link.php"); ?>
    <style>
        .follow {
            list-style-type: none;
            margin: 10px 0;
            padding: 0;
        }
        .follow-item {
            display: inline-block;
            margin-right:20px;
        }
        .follow-link {
            display: block;
            font-size: 18px;
        }
        .follow-link i {
            margin-right: 3px;
        }
        .form-group {
            display: flex;
            flex-direction: column;
            margin: 10px 0;
        }
        .form-control {
            width: 600px;
            max-width: 100%;
            border: 2px solid #ccc;
            transition: border .2s linear;
        }
        .follow-link-green {
            color: #3288f0;
        }
        .follow-link-red {
            color: #e94335;
        }
        .follow-link-black {
            color: #000;
        }
        .follow-link-blue {
            color: #3f9bf0;
        }
        .form-control:focus {
            outline: none;
            border: 2px solid #6d93c7;
        }
        .btn-submit {
            background-color: #6d93c7;
            color: #fff;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <?php include base_app("include/header.php"); ?>
    <section class="section-header-single">
        <img src="<?php url("assets/img/lienhe.jpg"); ?>">
        <div class="overlay">
            <div class="header-title">
                <h3>Liên hệ và hợp tác cùng Vi Vu Trà Vinh</h3>
            </div>
    </section>
    <ul class="breadcrumb">
        <li><a href="/">Trang chủ</a></li>
        <li>Liên hệ</li>
    </ul>
    <section class="section">
        <div class="container">
            <h3>Liên hệ chúng tôi qua: </h3>
            <ul class="follow">
                <li class="follow-item">
                    <a class="follow-link follow-link-green" href=""><i class="fab fa-facebook"></i>Facebook</a>
                </li>
                <li class="follow-item">
                    <a class="follow-link follow-link-red" href=""><i class="fab fa-google"></i>Google</a>
                </li>
                <li class="follow-item">
                    <a class="follow-link follow-link-black" href=""><i class="fab fa-tiktok"></i>Tiktok</a>
                </li>
                <li class="follow-item">
                    <a class="follow-link follow-link follow-link-blue" href=""><i class="fab fa-twitter"></i>Twitter</a>
                </li>
            </ul>
            <h3>Hoặc</h3>
            <div class="form-group">
                <label for="">Họ và tên</label>
                <input name="ten_hien_thi" class="form-control" type="text">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input name="email" class="form-control" type="text">
            </div>
            <div class="form-group">
                <label for="">Nội dung</label>
                <textarea name="noi_dung" class="form-control"></textarea>
            </div>
            <button class="btn btn-submit" style="padding: 5px 30px;">Gửi</button>
        </div>
    </section>
    <?php include_once base_app("include/footer.php"); ?>
    <?php include_once base_app("include/script.php"); ?>
</body>
</html>
