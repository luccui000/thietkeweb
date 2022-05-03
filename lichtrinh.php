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
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;600&display=swap');
        .card-container {
            margin: 30px 0;
            width: 1140px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .card-wrapper {
            display: block;
            color: hsl(229, 6%, 66%);
        }
        .card-wrapper h2 {
            color: hsl(234, 12%, 34%);
        }
        .card-wrapper p {
            margin-bottom: 5px;
        }
        .card {
            margin: 10px 0;
            width: 100%;
            height: 150px;
            border-radius: 5px;
            padding: 20px;
            transition: box-shadow .2s linear;
            box-shadow: 0px 30px 40px -20px hsl(229, 6%, 66%);
        }
    </style>
</head>
<body>
    <?php include base_app("include/header.php"); ?>
    <section class="section-header-single">
        <img src="<?php url("/assets/img/diengioduyenhai.jpg"); ?>">
        <div class="overlay">
            <div class="header-title">
                <h3>Tham khảo lịch trình trải nghiệm cùng Vi Vu Trà Vinh</h3>
            </div>
    </section>
    <ul class="breadcrumb">
        <li><a href="/">Trang chủ</a></li>
        <li>Lịch trình</li>
    </ul>
    <section class="section">
        <div class="container">
            <div class="card-container">
                <?php
                    require_once base_app("Classes/LichTrinh.php");
                    $lichtrinhs = (new LichTrinh())->all();
                    $colors = [
                        'hsl(0, 78%, 62%)',
                        'hsl(180, 62%, 55%)',
                        'hsl(34, 97%, 64%)',
                        'hsl(212, 86%, 64%)'
                    ];
                ?>
                <?php foreach ($lichtrinhs as $lichtrinh) { ?>
                     <div class="card" style="border-top: 2px solid <?php echo $colors[rand(0, 3)]; ?>">
                        <a href="<?php url("/chitietlichtrinh.php?id=" . $lichtrinh['id']);?>" class="card-wrapper">
                             <h2><?php echo $lichtrinh['ten_lich_trinh'] ?></h2>
                             <p>Thời gian khởi hành: <?php echo $lichtrinh['thoi_gian_khoi_hanh']; ?></p>
                             <p>Địa điểm khởi hành: <?php echo $lichtrinh['dia_chi_khoi_hanh']; ?></p>
                        </a>
                     </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <?php include_once base_app("include/footer.php"); ?>
    <?php include_once base_app("include/script.php"); ?>
</body>
</html>
