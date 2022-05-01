<?php
    require "connect.php";
    require "vendor/autoload.php";
    require "env.php";

    $client = new Google_Client();
    $client->setClientId(GOOGLE_APP_ID);
    $client->setClientSecret(GOOGLE_APP_SECRET);

    $client->setRedirectUri(GOOGLE_APP_CALLBACK_URL);
    $client->addScope('email');

    var_dump($client);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php url('assets/css/home.css'); ?>">
    <link rel="stylesheet" href="<?php url('assets/css/custom.bootstrap.css'); ?>">
</head>
<body>
    <?php include_once BASE_APP . "include/preloader.php"; ?>
    <div class="container">
        <div class="row m-5 no-gutters shadow">
            <div class="col-md-6 d-none d-md-block">
                <img src="https://images.unsplash.com/photo-1566888596782-c7f41cc184c5?ixlib=rb-1.2.1&auto=format&fit=crop&w=2134&q=80" class="img-fluid" style="min-height:100%;" />
            </div>
            <div class="col-md-6 bg-white p-5">
                <h3 class="pb-3">Đăng nhập tài khoản</h3>
                <div class="form-style">
                    <form>
                        <div class="form-group pb-3">
                            <input type="email" placeholder="Email" class="form-control" style="padding: 25px 10px;">
                        </div>
                        <div class="form-group pb-3">
                            <input type="password" placeholder="Mật khẩu" class="form-control" style="padding: 25px 10px;">
                        </div>
                        <div class="pb-2">
                            <button type="submit" class="btn w-100 font-weight-bold mt-2" style="background-color: #132f53; color: #fff">Submit</button>
                        </div>
                        <a href="/register.php">Đăng ký tài khoản</a>
                    </form>
                    <div class="sideline">OR</div>
                    <div>
                        <button type="submit" class="btn btn-danger w-100 font-weight-bold mt-2" >
                            <i class="fa-brands fa-google" aria-hidden="true"></i>
                            <span>Login With Google</span>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    <script src="<?php url('assets/js/home.js'); ?>"></script>
</body>
</html>