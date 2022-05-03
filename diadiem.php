<?php require_once "connect.php"; ?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thư viện hình ảnh</title>
    <?php include_once base_app("include/link.php"); ?>
    <link rel="stylesheet" href="<?php url("assets/css/diadiem.css"); ?>">
</head>
<body>
<?php include base_app("include/header.php"); ?>
<section class="section-header-single">
    <img src="<?php url("assets/img/bg-gallery.jpg"); ?>">
    <div class="overlay">
        <div class="header-title">
            <h3>“Cùng rời thành phố” đến với những địa điểm du lịch Trà Vinh độc đáo</h3>
        </div>
</section>
<ul class="breadcrumb">
    <li><a href="/">Trang chủ</a></li>
    <li>Điểm đến</li>
</ul>
<div class="section-tour-body">
    <?php
        require_once base_app("Classes/DiaDiem.php");
        require_once base_app("Helpers/Str.php");
        $dd = new DiaDiem();
        $diadiems = $dd->all();
    ?>
    <div class="row">
         <?php foreach ($diadiems as $diadiem) {?>
             <div class="col-2 slides">
                 <img src="<?php echo $diadiem['hinh_anh']; ?>">
                 <div class="overlay">
                     <div class="caption">
                         <div class="caption-text">
                             <p><?php echo Str::limit($diadiem['ten_dia_diem'], 5) ?></p>
                             <span class=""><?php echo Str::limit($diadiem['mo_ta'], 20); ?></span>
                             <a href="<?php url("/chitiet.php?id=" . $diadiem['id']); ?>" class="btn btn-orange btn-round right">Chi tiết</a>
                         </div>
                     </div>
                 </div>
             </div>
         <?php } ?>
    </div>
</div>
<?php include_once base_app("include/footer.php"); ?>
<?php include_once base_app("include/script.php"); ?>
</body>
</html>
