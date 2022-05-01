<?php require_once "connect.php"; ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Đăng nhập tài khoản</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
          integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="<?php echo url("assets/css/dangky.css") ?>" rel="stylesheet"/>
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
                <h3>Đăng Nhập</h3>
                <div class="form-group">
                    <label for="email">Email/ Số điện thoại</label>
                    <input type="text" id="email" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="mat_khau">Mật khẩu</label>
                    <input type="password" id="mat_khau" class="form-control" >
                </div>
                <button id="btnRegister" class="btn">Đăng nhập</button>
                <hr/>
                <div class="split">
                    <span class="text-helper">Hoặc đăng nhập bằng</span>
                    <a href="/dangky.php">Đăng ký tài khoản</a>
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
</body>
</html>

