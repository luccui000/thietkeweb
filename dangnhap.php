<?php require_once "connect.php"; ?>
<?php
    require "vendor/autoload.php";
    require "env.php";

    $client = new Google_Client();
    $client->setClientId(GOOGLE_APP_ID);
    $client->setClientSecret(GOOGLE_APP_SECRET);
    $client->setRedirectUri(GOOGLE_APP_CALLBACK_URL);
    $client->addScope('email');
    $client->addScope('profile');

    if(count($_POST) > 0) {
        $errorBags = [];
        if(empty($_POST['email'])) {
            $errorBags['email'] = [
                'required' => 'Vui lòng nhập vào email hoac so dien thoai'
            ];
        }
        if(empty($_POST['mat_khau'])) {
            $errorBags['mat_khau'] = [
                'required' => 'Vui lòng nhập vào mật khẩu'
            ];
        }

        if(count($errorBags) == 0) {
            require_once base_app("Classes/TaiKhoan.php");
            $taikhoan = new TaiKhoan();
            $result = $taikhoan->where([
                'email' => $_POST['email'],
                'mat_khau' => md5($_POST['mat_khau'])
            ]);
            $isOk = true;
            if(isset($result[0])) {
                $_SESSION[SESSION_AUTH_ID] = $result[0]['id'];
                $_SESSION[SESSION_AUTH_EMAIL] = $result[0]['email'];
                $_SESSION[SESSION_AUTH_NAME] = $result[0]['ten_hien_thi'];
                $_SESSION[SESSION_IS_LOGIN_NAME] = true;
            } else {
                $isOk = false;
            }
        }
    }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Đăng nhập tài khoản</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
          integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="<?php echo url("assets/css/dangky.css") ?>" rel="stylesheet"/>
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
                <form action="/dangnhap.php" method="POST">
                    <h3>Đăng Nhập</h3>
                    <div class="form-group">
                        <label for="email">Email/ Số điện thoại</label>
                        <input name="email" id="email" class="form-control" type="text">
                        <?php
                            if(isset($errorBags) && isset($errorBags['email'])) {
                                foreach ($errorBags['email'] as $key => $value) {
                                    echo "<span class='text-sm text-danger'>{$value}</span>";
                                }
                            }
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="mat_khau">Mật khẩu</label>
                        <input name="mat_khau" id="mat_khau" class="form-control" type="password">
                        <?php
                            if(isset($errorBags) && isset($errorBags['mat_khau'])) {
                                foreach ($errorBags['mat_khau'] as $key => $value) {
                                    echo "<span class='text-sm text-danger'>{$value}</span>";
                                }
                            }
                        ?>
                    </div>
                    <button type="submit" class="btn">Đăng nhập</button>
                </form>
                <hr/>
                <div class="split">
                    <span class="text-helper">Hoặc đăng nhập bằng</span>
                    <a href="/dangky.php">Đăng ký tài khoản</a>
                </div>
                <ul class="social-login">
                    <li class="social-item">
                        <a href="<?php echo $client->createAuthUrl(); ?>" class="social-link">
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
                text: 'Đăng nhập thành công',
                showHideTransition: 'plain',
                icon: 'success',
                position: 'top-right'
            })
            setTimeout(() => {
                window.location.href = "/";
            }, 3500)
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

