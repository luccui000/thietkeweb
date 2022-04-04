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
            $query = "SELECT * FROM TaiKhoan WHERE TenDangNhap='" . $tenDangNhap ."' AND MatKhau='" . $hashedMatKhau . "'";
            $conn = createConnection();
            $result = $conn->query($query);
            echo $query;

            if($result->num_rows > 0) {
                header("Location: /admin/index.php");
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
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../assets/css/app.css" />
    <link rel="stylesheet" href="../../assets/css/lineicons.css" />
    <link rel="stylesheet" href="../../assets/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="../../assets/css/fullcalendar.css" />
    <link rel="stylesheet" href="../../assets/css/fullcalendar.css" />
    <link rel="stylesheet" href="../../assets/css/main.css" />
    <link rel="stylesheet" href="../../assets/css/auth.css" />
</head>
<body>
    <div class="container-bg">
        <div class="row">
            <div class="col-8"></div>
            <div class="col-4 main-form pt-4" >
                <form class="form" action="login.php" method="POST">
                    <h4 class="text-uppercase">Đăng nhập</h4>
                    <div class="form-group mt-2">
                        <label for="TenDangNhap">Tên đăng nhập</label>
                        <input name="TenDangNhap" class="form-control"  type="text">
                        <?php
                            if(isset($errors) && isset($errors['TenDangNhap']['Required']))
                                printError($errors['TenDangNhap']['Required']);
                        ?>
                    </div>
                    <div class="form-group mt-2">
                        <label for="MatKhau">Mật khẩu</label>
                        <input name="MatKhau" type="text" class="form-control">
                        <?php
                            if(isset($errors) && isset($errors['MatKhau']['Required']))
                                printError($errors['MatKhau']['Required']);
                        ?>
                    </div>
                    <button class="btn btn-primary mt-3">Đăng nhập</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>