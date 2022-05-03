<?php
    require_once "../../connect.php";

    if(count($_POST) > 0) {
        $errorBags = [];
        if(empty($_POST['email'])) {
            $errorBags['email'] = [
                'required' => 'Vui lòng nhập vào email'
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
                header("Location: /admin/index.php");
            } else {
                $isOk = false;
            }
        }
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập quản trị viên</title>
    <link rel="stylesheet" href="<?php url('assets/css/bootstrap.min.css'); ?>" />
    <link rel="stylesheet" href="<?php url('assets/css/app.css'); ?>" />
    <link rel="stylesheet" href="<?php url('assets/css/auth.css'); ?>" />
</head>
<body style="background-image: url(<?php url('assets/images/auth/bg.jpg'); ?>);">
    <div class="container-bg">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8"></div>
                <div class="col-4 main-form pt-4" >
                    <form class="form" action="/admin/auth/login.php" method="POST">
                        <h4 class="text-uppercase font-weight-bold mb-2">Đăng nhập</h4>
                        <div class="form-group mt-2">
                            <label for="email">Tên đăng nhập</label>
                            <input name="email" value="admin@dulichtravinh.local" class="form-control-custom w-100"  type="text" />
                            <?php
                            if(isset($errorBags) && isset($errorBags['email'])) {
                                foreach ($errorBags['email'] as $key => $value) {
                                    echo "<span class='text-sm text-danger'>{$value}</span>";
                                }
                            }
                            ?>
                        </div>
                        <div class="form-group mt-2">
                            <label for="mat_khau">Mật khẩu</label>
                            <input name="mat_khau" type="password" value="Pass@123" class="form-control-custom w-100">
                            <?php
                            if(isset($errorBags) && isset($errorBags['mat_khau'])) {
                                foreach ($errorBags['mat_khau'] as $key => $value) {
                                    echo "<span class='text-sm text-danger'>{$value}</span>";
                                }
                            }
                            ?>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12">
                                <button class="btn btn-login btn-block">Đăng nhập</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>