<?php require_once "connect.php"; ?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thư viện hình ảnh</title>
    <?php include_once base_app("include/link.php"); ?>
</head>
<body>
    <?php include base_app("include/header.php"); ?>
    <section class="section-header-single">
        <img src="<?php url("assets/img/bg-gallery.jpg"); ?>">
        <div class="overlay">
            <div class="header-title">
                <h3>Thư viện hình ảnh, lưu trữ cảm xúc</h3>
            </div>
    </section>

    <ul class="breadcrumb">
        <li><a href="/">Trang chủ</a></li>
        <li>Thư viện</li>
    </ul>
    <section class="section section-gallery">
        <div class="container-fluid">
            <div class="single-head">
                <div class="col">
                    <h3>Khám phá loạt ảnh đặc sắc</h3>
                    <p>Cùng khám phá loạt ảnh nổi bật được ghi lại bởi những khách du lịch</p>
                </div>
            </div>
        </div>
        <?php
            require_once base_app("Classes/HinhAnh.php");
            $hinhanhs = (new HinhAnh())->all();
            foreach ($hinhanhs as $parent) {
                echo "<div class='section-discover-body'>";
                foreach ($parent as $child) {?>
                    <div class="col">
                        <a href="#">
                            <img class="img-blur" src="<?php echo image_url($child['duong_dan']) ?>" alt="Destination">
                            <div class="caption caption2">
                                <p><?php echo $child['ten_hinh_anh'] ?></p>
                                <div class="line"></div>
                            </div>
                        </a>
                    </div>
                <?php }
                echo "</div>";
            }
        ?>
    </section>
    <?php include_once base_app("include/footer.php"); ?>
    <?php include_once base_app("include/script.php"); ?>
</body>
</html>
