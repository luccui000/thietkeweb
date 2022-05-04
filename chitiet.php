<?php
    require_once "connect.php";
    require_once base_app("Classes/DiaDiem.php");
    require_once base_app("Classes/TaiKhoan.php");
    require_once base_app("Classes/BinhLuan.php");

    require_once base_app("Classes/GheTham.php");
    require "vendor/autoload.php";
    require "env.php";

    $client = new Google_Client();
    $client->setClientId(GOOGLE_APP_ID);
    $client->setClientSecret(GOOGLE_APP_SECRET);
    $client->setRedirectUri(GOOGLE_APP_CALLBACK_URL);
    $client->addScope('email');
    $client->addScope('profile');

    $gheTham = new GheTham();
    $gheTham->themTruyCapDiaDiem();

    if(!isset($_GET['id']))
        header("Location: /diadiem.php");

    $diadiem = new DiaDiem();
    $result = $diadiem->first($_GET['id']);

    if(count($_POST)) {
        $id = $_GET['id'];
        $errorBags = [];
        $idNguoiTao = isset($_SESSION[SESSION_AUTH_ID]) ?? 0;
        if(!isset($_SESSION[SESSION_IS_LOGIN_NAME])) {
            if(empty($_POST['ten_hien_thi'])) {
                $errorBags['ten_hien_thi'] = [
                    'required' => 'Vui lòng nhập vào họ và tên'
                ];
            }
            if(empty($_POST['email'])) {
                $errorBags['email'] = [
                    'required' => 'Vui lòng nhập vào email'
                ];
            }
            $ten_hien_thi = $_POST['ten_hien_thi'];
            $email = $_POST['email'];
            $taikhoan = new TaiKhoan();
            $taikhoan->insert([
                'ten_hien_thi' => $ten_hien_thi,
                'email' => $email
            ]);
            $idNguoiTao = $taikhoan->id;
        }
        if(empty($_POST['noi_dung'])) {
            $errorBags['noi_dung'] = [
                'required' => 'Vui lòng nhập vào nội dung'
            ];
        }
        if(count($errorBags) == 0) {
            $binhluan =  new BinhLuan();
            $isOk = $binhluan->insert([
                'noi_dung_binh_luan' => $_POST['noi_dung'],
                'nguoi_tao' => $idNguoiTao,
                'diadiem_id' => $id,
                'trang_thai' => BinhLuan::TRANGTHAI['dangchoduyet']
            ]);
        }
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
    <style>
        .iframe iframe {
            width: 100%;
        }
        .post__comments {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
        .post__comment--item {
            display: flex;
        }
        .post__comment--img {
            width: 70px !important;
            height: 70px !important;
            border-radius: 50% !important;
            margin-right: 30px;
        }
        .post__comment--content {
            flex: 1;
        }
        .post__comment--body {
            margin-bottom: 0;
        }
        .post__comment--desc {
            font-size: 12px;
        }
        .post__comment {
            margin: 20px 0;
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
        .form-control:focus {
            outline: none;
            border: 2px solid #6d93c7;
        }
        .btn-submit {
            background-color: #6d93c7;
            color: #fff;
            margin-right: 10px;
        }
        .social-login {
            display: inline-flex;
            align-items: center;
        }
        .social-login a {
            margin-left: 10px;
        }
        .text-helper {
            font-size: 13px;
        }
        .text-danger {
            color: #ff4c4c;
        }
    </style>
</head>
<body>
    <?php include base_app("include/header.php"); ?>
    <section class="section-header-single">
        <img src="<?php echo image_url($result['hinh_anh']); ?>">
        <div class="overlay">
            <div class="header-title">
                <h3><?php echo $result['ten_dia_diem'] ?></h3>
            </div>
    </section>
    <ul class="breadcrumb">
        <li><a href="/">Trang chủ</a></li>
        <li><a href="/diadiem.php">Điểm đến</a></li>
        <li><?php echo $result['ten_dia_diem'] ?></li>
    </ul>
    <div class="section-tour-body">
        <div class="container">
            <p><?php echo $result['noi_dung']; ?></p>
            <div class="iframe">
                <?php echo $result['iframe']; ?>
            </div>
            <hr>
            <br />
            <h3>Bình luận</h3>

            <ul class="post__comments">
                <?php
                    require_once base_app("Classes/BinhLuan.php");
                    $binhluan = new BinhLuan();
                    $binhluans = $binhluan->danhSachBinhLuan($_GET['id']);
                ?>
                <?php foreach ($binhluans as $value) {?>
                    <li class="post__comment--item">
                        <img class="post__comment--img" src="https://picsum.photos/100"  alt="">
                        <div class="post__comment--content">
                            <p class="post__comment--body"><?php echo $value['noi_dung_binh_luan']; ?></p>
                            <p class="post__comment--desc">Bởi <b><?php echo $value['nguoi_tao'][0]['ten_hien_thi']; ?></b></p>
                        </div>
                    </li>
                <?php } ?>
            </ul>
            <div class="post__comment">
                <form action="<?php url("chitiet.php?id=" . $_GET['id']) ?>" method="POST">
                    <?php if(!isset($_SESSION[SESSION_IS_LOGIN_NAME])) {?>
                        <div class="form-group">
                            <label for="">Họ và tên</label>
                            <input name="ten_hien_thi" class="form-control" type="text">
                            <?php if(isset($errorBags) && isset($errorBags['ten_hien_thi'])) {?>
                                <?php foreach ($errorBags['ten_hien_thi'] as $value) { ?>
                                    echo "<span class='text-helper text-danger'>{$value}</span>";
                                <?php } ?>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input name="email" class="form-control" type="text">
                            <?php if(isset($errorBags) && isset($errorBags['email'])) {?>
                                <?php foreach ($errorBags['email'] as $value) { ?>
                                    echo "<span class='text-helper text-danger'>{$value}</span>";
                                <?php } ?>
                            <?php } ?>
                        </div>
                    <?php } ?>
                    <div class="form-group">
                        <label for="">Nội dung</label>
                        <textarea name="noi_dung" class="form-control"></textarea>
                        <?php
                            if(isset($errorBags) && isset($errorBags['noi_dung'])) {
                                foreach ($errorBags['noi_dung'] as $value) {
                                    echo "<span class='text-helper text-danger'>{$value}</span>";
                                }
                            }
                        ?>
                    </div>
                    <button class="btn btn-submit" style="padding: 5px 30px;">Gửi</button>
                </form>
                <?php if(!isset($_SESSION[SESSION_IS_LOGIN_NAME])) {?>
                    <span class="social-login">Hoặc đăng nhập bằng <a href="<?php echo $client->createAuthUrl(); ?>"><i class="fab fa-google"></i>oogle</a></span>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php include_once base_app("include/footer.php"); ?>
    <?php include_once base_app("include/script.php"); ?>
    <?php if(isset($isOk) && $isOk) { ?>
        <script>
            alert("Bình lụân bạn đang chờ duyệt, cảm ơn bạn đã góp ý");
        </script>
    <?php } ?>
</body>
</html>
