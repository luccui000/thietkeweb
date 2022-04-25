<?php require_once "../../connect.php"; ?>
<?php
    if(count($_POST) > 0) {
        $errors = [];
        $tenDangNhap = trim($_POST['TenDangNhap']);
        $matKhau = trim($_POST['MatKhau']);
        $flag = true;
        if(strlen($tenDangNhap) == 0) {
            $errors["TenDangNhap"]["Required"] = "Vui lòng nhập tên đăng nhập";
            $flag = false;
        }
        if(strlen($tenDangNhap) == 0) {
            $errors["MatKhau"]["Required"] = "Vui lòng nhập mật khẩu";
            $flag = false;
        }
        if($flag) {
            $hashedMatKhau = md5($matKhau);
            $conn = createConnection();
            $query = "SELECT * FROM TaiKhoan WHERE TenDangNhap=? AND MatKhau=? LIMIT 1";
            $stmt = $conn->prepare($query);

            $stmt->bind_param("ss", $tenDangNhap, $hashedMatKhau);
            $stmt->execute();
            $result = $stmt->get_result();
            if($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $_SESSION[SESSION_AUTH_NAME] = $row['TenDangNhap'];
                $_SESSION[SESSION_IS_LOGIN_NAME] = true;
                header('Location: /admin/index.php');
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
    <link rel="stylesheet" href="<?php echo url('assets/css/bootstrap.min.css'); ?>" />
    <link rel="stylesheet" href="<?php echo url('assets/css/app.css'); ?>" />
    <link rel="stylesheet" href="<?php echo url('assets/css/auth.css'); ?>" />
</head>
<body style="background-image: url(<?php echo url('assets/images/auth/bg.jpg'); ?>);">
    <div class="container-bg">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8"></div>
                <div class="col-4 main-form pt-4" >
                    <form class="form" action="login.php" method="POST">
                        <h4 class="text-uppercase font-weight-bold mb-2">Đăng nhập</h4>
                        <div class="form-group mt-2">
                            <label for="TenDangNhap">Tên đăng nhập</label>
                            <input name="TenDangNhap" value="admin" class="form-control-custom w-100"  type="text" />
                            <?php
                                if(isset($errors) && isset($errors['TenDangNhap']['Required']))
                                    printError($errors['TenDangNhap']['Required']);
                            ?>
                        </div>
                        <div class="form-group mt-2">
                            <label for="MatKhau">Mật khẩu</label>
                            <input name="MatKhau" type="password" value="Pass@123" class="form-control-custom w-100">
                            <?php
                                if(isset($errors) && isset($errors['MatKhau']['Required']))
                                    printError($errors['MatKhau']['Required']);
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