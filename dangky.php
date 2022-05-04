<?php require_once "connect.php"; ?>
<?php
    require_once base_app("Classes/TaiKhoan.php");
    if(count($_POST) > 0) {
        $errorBags = [];
        if(empty($_POST['ten_hien_thi'])) {
            $errorBags['ten_hien_thi'] = [
                'required' => 'Vui lòng nhập vào tên hiển thị'
            ];
        }
        if(empty($_POST['so_dien_thoai'])) {
            $errorBags['so_dien_thoai'] = [
                'required' => 'Vui lòng nhập vào số điện thoại'
            ];
        }
        if(empty($_POST['mat_khau'])) {
            $errorBags['mat_khau'] = [
                'required' => 'Vui lòng nhập vào mật khẩu'
            ];
        }
        if(count($errorBags) == 0) {
            $taikhoan = new TaiKhoan();
            $isOk = $taikhoan->insert([
                'ten_hien_thi' => $_POST['ten_hien_thi'],
                'email' => $_POST['email'],
                'so_dien_thoai' => $_POST['so_dien_thoai'],
                'mat_khau' => md5($_POST['mat_khau'])
            ]);
        }
    }
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Đăng ký tài khoản</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
          integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="<?php url("assets/css/dangky.css") ?>" rel="stylesheet"/>
    <link rel="stylesheet" href="<?php url("assets/dist/jquery-toast-plugin/css/jquery.toast.min.css") ?>">
</head>
<body>
    <div class="container">
        <div class="container-wrapper">
            <div class="container-left">
                <div class="text-container">
                    <h2>Chào mừng bạn đến với Vi Vu Trà Vinh</h2>
                    <p>Hãy đăng ký tài khoản cùng Vi vu Trà Vinh để khám phá hết mọi thứ nơi đây</p>
                    <a href="/"><i class="fa fa-arrow-left"></i><span>quay lại trang chủ</span></a>
                </div>
            </div>
            <div class="container-right">
                <div class="form-container">
                    <h3>Đăng ký</h3>
                    <form action="/dangky.php" method="post">
                        <div class="form-group">
                            <label for="ten_hien_thi">Tên hiển thị <span class="text-danger">*</span></label>
                            <input name="ten_hien_thi" id="ten_hien_thi" class="form-control" type="text" >
                            <?php
                                if(isset($errorBags) && isset($errorBags['ten_hien_thi'])) {
                                    foreach ($errorBags['ten_hien_thi'] as $key => $value) {
                                        echo "<span class='text-sm text-danger'>{$value}</span>";
                                    }
                                }
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="email">Email <span class="text-danger">*</span></label>
                            <input name="email" id="email" class="form-control" type="text">
                        </div>
                        <div class="form-group">
                            <label for="so_dien_thoai">Số điện thoại </label>
                            <input name="so_dien_thoai" id="so_dien_thoai" class="form-control" type="text">
                            <?php
                            if(isset($errorBags) && isset($errorBags['so_dien_thoai'])) {
                                foreach ($errorBags['so_dien_thoai'] as $key => $value) {
                                    echo "<span class='text-sm text-danger'>{$value}</span>";
                                }
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="mat_khau">Mật khẩu <span class="text-danger">*</span></label>
                            <input name="mat_khau" id="mat_khau" class="form-control" type="password">
                            <?php
                            if(isset($errorBags) && isset($errorBags['mat_khau'])) {
                                foreach ($errorBags['mat_khau'] as $key => $value) {
                                    echo "<span class='text-sm text-danger'>{$value}</span>";
                                }
                            }
                            ?>
                        </div>
                        <button type="submit" class="btn">Đăng ký</button>
                    </form>
                    <hr/>
                    <div class="split">
                        <span class="text-helper">Hoặc đăng nhập bằng</span>
                        <a href="/dangnhap.php">Đăng nhập tài khoản</a>
                    </div>
                    <ul class="social-login">
                        <li class="social-item">
                            <a href="#" class="social-link">
                                <i class="fab fa-google"></i>
                            </a>
                        </li>
                        <li class="social-item">
                            <a href="#" class="social-link">
                                <i class="fab fa-facebook"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="<?php url("assets/dist/jquery-toast-plugin/js/jquery.toast.min.js") ?>"></script>
    <script>
        $(document).ready(function() {
            <?php if(isset($isOk) && $isOk) { ?>
                $.toast({
                    heading: 'Thành công',
                    text: 'Đăng ký tài khoản thành công',
                    showHideTransition: 'plain',
                    icon: 'success',
                    position: 'top-right'
                })
            <?php } else if(isset($isOk) && !$isOk) { ?>
                $.toast({
                    heading: 'Thất bại',
                    text: 'Có lỗi xảy ra',
                    showHideTransition: 'plain',
                    icon: 'error',
                    position: 'top-right'
                })
            <?php } ?>
        })
    </script>
</body>
</html>

