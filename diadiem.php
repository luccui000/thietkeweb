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
	<style>
		.search_diadiem {
			margin-left: 344px;
			position: relative;
		}
		.search_diadiem input {
			margin: 10px 0;
			padding: 10px;
			border: 2px solid #ccc;
			width: 1140px;
		}
		.search__icon {
			position: absolute;
			top: 15px;
			left: 1105px;
            border: 1px solid transparent;
            background-color: #fff;
            padding: 8px;
            cursor: pointer;
            border-radius: 50%;
		}
        .search__icon:hover {
            background-color: #ccc;
        }
	</style>
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
<div class="container-fluid">
    <div class="single-head">
        <div class="col">
            <h3>Khám phá địa điểm du lịch</h3>
            <p>Cùng khám phá loạt ảnh nổi bật được ghi lại bởi Vi Vu Trà Vinh</p> 
        </div>
    </div>
</div>

<div class="section-tour-body">
    <form action="<?php url("/diadiem.php") ?>" method="GET">
        <div class="search_diadiem">
            <input name="q" type="text" placeholder="Nhập địa điểm cần tìm kiếm"/>
            <button class="search__icon"><i class="fa fa-search"></i></button>
        </div>
    </form>
    <?php
        require_once base_app("Classes/DiaDiem.php");
        require_once base_app("Helpers/Str.php");
        $dd = new DiaDiem();
        if(isset($_GET['q']) && !empty($_GET['q'])) {
            $q = $_GET['q'];
            $diadiems = $dd->timKiem($q);
        } else {
            $diadiems = $dd->all();
        }
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
