<?php require_once "connect.php"; ?>
<?php
if(isset($_GET['id'])) {
    require_once ("Classes/LichTrinh.php");
    $lichtrinhs = new LichTrinh();
    $id = $_GET['id'];
    $result = $lichtrinhs->find($id);
} else {
    header("Location: /");
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thư viện hình ảnh</title>
    <?php include_once base_app("include/link.php"); ?>
    <link rel="stylesheet" href="<?php url("assets/css/lichtrinh.css") ?>">
</head>
<body>
<?php include base_app("include/header.php"); ?>
<section class="section-header-single">
    <img src="<?php url("assets/img/bg-gallery.jpg"); ?>">
    <div class="overlay">
        <div class="header-title">
            <h3><?php echo $result['ten_lich_trinh'] ?></h3>
        </div>
</section>
<div class="lichtrinh">
    <h4 class="lichtrinh-start lichtrinh-starttime">Thời gian khởi hành: <b><?php echo $result['thoi_gian_khoi_hanh'] ?></b></h4>
    <h4 class="lichtrinh-start lichtrinh-startaddress">Địa điểm khởi hành: <b><?php echo $result['dia_chi_khoi_hanh'] ?></b></h4>
    <?php $i = 1; ?>
    <?php foreach ($result['chi_tiet_lich_trinh'] as $value) { ?>
        <div class="step step<?php echo $i ?>"><?php echo $i ?></div>
        <article class="card card<?php echo $i++ ?>">
            <div class="card-body">
                <h3><?php echo $value['ten_ctlt'] ?></h3>
                <p><?php echo $value['ten_ctlt'] ?></p>
                <p>Thời gian tham quan: <b><?php echo $value['thoi_gian_trung_binh'] ?></b></p>
                <p>Chi phí trung bình: <b><?php echo $value['chi_phi_trung_binh'] ?></b></p>
            </div>
        </article>
    <?php } ?>
    <svg
        class="move-line"
        xmlns="http://www.w3.org/2000/svg"
        xmlns:xlink="http://www.w3.org/1999/xlink"
        style="width: 100%; height: 300vh; margin-top: 0px" >
        <path
            class="path"
            d="<?php echo $lichtrinhs->taoSvgPath(count($result['chi_tiet_lich_trinh']) + 1); ?>"
        >
        </path>
    </svg>
</div>

<?php include_once base_app("include/footer.php"); ?>
<?php include_once base_app("include/script.php"); ?>
<script>
    $(document).ready(function(){
        const path = document.querySelector(".path");
        const pathLength = path.getTotalLength();
        $(path).css('stroke-dasharray', pathLength)
        $(path).css('stroke-dashoffset', pathLength)
    });
</script>
</body>
</html>