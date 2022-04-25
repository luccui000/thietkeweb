<?php
    require_once "config.php";
    require_once "connect.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Báo cáo  thuc mon | Du lịch Trà Vinh</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,500,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?php echo url('assets/css/bootstrap.css'); ?>" />
    <link href="<?php echo url('assets/css/style.css'); ?>" rel="stylesheet" />
    <link href="<?php echo url('assets/css/responsive.css'); ?>" rel="stylesheet" />
</head>
<body>
    <?php include_once BASE_APP . "include/preloader.php"; ?>
    <div class="hero_area">
        <header class="header_section">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg custom_nav-container">
                    <div class="fk_width" id="">
                        <div class="custom_menu-btn">
                            <button onclick="">
                                <span class="s-1"> </span>
                                <span class="s-2"> </span>
                                <span class="s-3"> </span>
                            </button>
                        </div>
                        <div id="myNav" class="overlay">
                            <div class="overlay-content">
                                <a href="index.html">Trang chủ</a>
                                <a href="about.html">Du lịch</a>
                                <a href="hotel.html">Khách sạn</a>
                                <a href="package.html">Dịch vụ</a>
                                <a href="testimonial.html">Liên hệ</a>
                            </div>
                        </div>
                    </div>
                    <a class="navbar-brand" href="index.html">
                        <img src="<?php echo url('assets/images/home/logo.png'); ?>" alt="" />
                    </a>
                    <div class="user_option">
                        <a href="#">
                            <img src="<?php echo url('assets/images/home/user-icon.png'); ?>" alt="" />
                        </a>
                        <form class="form-inline my-2 my-lg-0  mb-3 mb-lg-0">
                            <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
                        </form>
                    </div>
                </nav>
            </div>
        </header>
        <section class=" slider_section position-relative">
            <div class="detail-box">
                <div class="row">
                    <div class="col-md-8 col-lg-6 mx-auto">
                        <h1>
                            Khám phá ngay <br />
                            cùng với Du lịch Trà Vinh
                        </h1>
                        <p>
                            dummy text of the printing and typesetting industry. Lorem Ipsum has been thedummy text of the printing and typesetting industry. Lorem Ipsum has been the
                        </p>
                        <div>
                            <a href="#">
                                Đi ngay
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="img-box">

            </div>
        </section>
        <!-- end slider section -->
    </div>
    <!-- package section -->
    <section class="package_section layout_padding-top">
        <div class="container">
            <div class="heading_container">
                <h2>
                    Top những địa điểm nổi bật bạn nên ghé thăm
                </h2>
                <p>
                    Đây là 6 trong số 12 địa điểm hot nhất được lựa chọn để đến du lịch tại Trà Vinh
                </p>
            </div>
        </div>
        <div class="container">
            <div class="package_container">
                <div class="box active">
                    <div class="detail-box">
                        <h4>
                            Cù lao Tân Quy
                        </h4>
                        <div class="price_detail">
                            It is a long established fact that a reader will be
                        </div>
                        <a href="#">
                            xem ngay
                        </a>
                    </div>
                </div>
                <div class="box ">
                    <div class="detail-box">
                        <h4>
                            Biển Ba Động
                        </h4>
                        <div class="price_detail">
                            It is a long established fact that a reader will be
                        </div>
                        <a href="#">
                            xem ngay
                        </a>
                    </div>
                </div>
                <div class="box ">
                    <div class="detail-box">
                        <h4>
                            Điện gió Duyên Hải
                        </h4>
                        <div class="price_detail">
                            It is a long established fact that a reader will be
                        </div>
                        <a href="#">
                            xem ngay
                        </a>
                    </div>
                </div>
                <div class="box ">
                    <div class="detail-box">
                        <h4>
                            Bảo tàng Khmer
                        </h4>
                        <div class="price_detail">
                            It is a long established fact that a reader will be
                        </div>
                        <a href="#">
                            xem ngay
                        </a>
                    </div>
                </div>
                <div class="box ">
                    <div class="detail-box">
                        <h4>
                            Ao bà om
                        </h4>
                        <div class="price_detail">
                            It is a long established fact that a reader will be
                        </div>
                        <a href="#">
                            xem ngay
                        </a>
                    </div>
                </div>
                <div class="box ">
                    <div class="detail-box">
                        <h4>
                            Chợ Trà Vinh
                        </h4>
                        <div class="price_detail">
                            It is a long established fact that a reader will be
                        </div>
                        <a href="#">
                            xem ngay
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="about_section layout_padding">
        <div class="heading_container">
            <h2>
                Vài nét về Trà Vinh
            </h2>
            <p>
                dummy text of the printing and typesetting industry. Lorem Ipsum has been the
            </p>
        </div>
        <div class="img-box">
        </div>
        <div class="btn-box">
            <a href="#">
                Read More
            </a>
        </div>
    </section>

    <section class="client_section ">
        <div class="container">
            <div class="heading_container">
                <h2>
                    Khách du lịch nói gì về chúng tôi
                </h2>
                <p>
                    dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                </p>
            </div>
        </div>
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <div class="client_container ">
                            <div class="client_box b-1">
                                <div class="client-id">
                                    <div class="img-box">
                                        <img src="<?php echo url('assets/images/home/client-1.jpg'); ?>" alt="" />
                                    </div>
                                    <div class="name">
                                        <h5>
                                            Alina Jorch
                                        </h5>
                                        <p>
                                            Tourist
                                        </p>
                                    </div>
                                </div>
                                <div class="detail">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrudLorem ipsum
                                    </p>
                                    <div>
                                        <div class="arrow_img">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="client_box b2">
                                <div class="client-id">
                                    <div class="img-box">
                                        <img src="<?php echo url('assets/images/home/client-2.jpg'); ?>" alt="" />
                                    </div>
                                    <div class="name">
                                        <h5>
                                            Carlosh Den
                                        </h5>
                                        <p>
                                            Tourist
                                        </p>

                                    </div>
                                </div>
                                <div class="detail">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrudLorem ipsum
                                    </p>
                                    <div>
                                        <div class="arrow_img">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="client_container ">
                            <div class="client_box b-1">
                                <div class="client-id">
                                    <div class="img-box">
                                        <img src="<?php echo url('assets/images/home/client-1.jpg'); ?>" alt="" />
                                    </div>
                                    <div class="name">
                                        <h5>
                                            Alina Jorch
                                        </h5>
                                        <p>
                                            Tourist
                                        </p>
                                    </div>
                                </div>
                                <div class="detail">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrudLorem ipsum
                                    </p>
                                    <div>
                                        <div class="arrow_img">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="client_box b2">
                                <div class="client-id">
                                    <div class="img-box">
                                        <img src="<?php echo url('assets/images/home/client-2.jpg'); ?>" alt="" />
                                    </div>
                                    <div class="name">
                                        <h5>
                                            Carlosh Den
                                        </h5>
                                        <p>
                                            Tourist
                                        </p>

                                    </div>
                                </div>
                                <div class="detail">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrudLorem ipsum
                                    </p>
                                    <div>
                                        <div class="arrow_img">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="client_container ">
                            <div class="client_box b-1">
                                <div class="client-id">
                                    <div class="img-box">
                                        <img src="<?php echo url('assets/images/home/client-1.jpg'); ?>" alt="" />
                                    </div>
                                    <div class="name">
                                        <h5>
                                            Alina Jorch
                                        </h5>
                                        <p>
                                            Tourist
                                        </p>
                                    </div>
                                </div>
                                <div class="detail">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrudLorem ipsum
                                    </p>
                                    <div>
                                        <div class="arrow_img">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="client_box b2">
                                <div class="client-id">
                                    <div class="img-box">
                                        <img src="<?php echo url('assets/images/home/client-2.jpg'); ?>" alt="" />
                                    </div>
                                    <div class="name">
                                        <h5>
                                            Carlosh Den
                                        </h5>
                                        <p>
                                            Tourist
                                        </p>

                                    </div>
                                </div>
                                <div class="detail">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrudLorem ipsum
                                    </p>
                                    <div>
                                        <div class="arrow_img">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel_btn-container">
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

    </section>

    <!-- end client section -->

    <!-- info section -->

    <section class="info_section ">
        <div class="info_container layout_padding-top">
            <div class="container">
                <div class="heading_container">
                    <h2>
                        Contact Us
                    </h2>
                </div>
                <div class="info_logo">
                    <img src="<?php echo url('assets/images/home/logo.png'); ?>" alt="">
                </div>
                <div class="info_top">
                    <div class="info_form">
                        <form action="">
                            <input type="text" id="email2" placeholder="Enter Your Email">
                            <button>
                                subscribe
                            </button>
                        </form>
                    </div>
                    <div class="social_box">
                        <a href="#">
                            <img src="<?php echo url('assets/images/home/facebook.png'); ?>" alt="">
                        </a>
                        <a href="#">
                            <img src="<?php echo url('assets/images/home/twitter.png'); ?>" alt="">
                        </a>
                        <a href="#">
                            <img src="<?php echo url('assets/images/home/linkedin.png'); ?>" alt="">
                        </a>
                        <a href="#">
                            <img src="<?php echo url('assets/images/home/instagram.png'); ?>" alt="">
                        </a>
                        <a href="#">
                            <img src="<?php echo url('assets/images/home/youtube.png'); ?>" alt="">
                        </a>
                    </div>
                </div>

                <div class="info_main">
                    <div class="row">
                        <div class="col-md-3">
                            <h5>
                                About Us
                            </h5>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                            </p>
                        </div>

                        <div class="col-md-3 col-lg-2 offset-lg-1">
                            <h5>
                                Information
                            </h5>
                            <ul>
                                <li>
                                    <a href="#">
                                        There are many
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        variations of pas
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        sages of Lorem
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Ipsum available,
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        but the majority
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <div class="info_link-box">
                                <h5>
                                    Helpful Links
                                </h5>
                                <ul>
                                    <li class=" active">
                                        <a class="" href="index.html">Home <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="">
                                        <a class="" href="about.html">About </a>
                                    </li>
                                    <li class="">
                                        <a class="" href="package.html">Packages </a>
                                    </li>
                                    <li class="">
                                        <a class="" href="testimonial.html">Testimonial </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-2 offset-lg-1">
                            <h5>
                                Supported
                            </h5>
                            <ul>
                                <li>
                                    <a href="#">
                                        There are many
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        variations of pas
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        sages of Lorem
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Ipsum available,
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        but the majority
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-9 col-md-10 mx-auto">
                        <div class="info_contact layout_padding2">
                            <div class="row">
                                <div class="col-md-5">
                                    <a href="#" class="link-box">
                                        <div class="img-box">
                                            <img src="images/call.png" alt="">
                                        </div>
                                        <div class="detail-box">
                                            <h6>
                                                Call Now &nbsp; &nbsp; +01 123467890
                                            </h6>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-2">
                                    <a href="#" class="link-box">
                                        <div class="img-box">
                                            <img src="images/location.png" alt="">
                                        </div>
                                        <div class="detail-box">
                                            <h6>
                                                Location
                                            </h6>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-5">
                                    <a href="#" class="link-box">
                                        <div class="img-box">
                                            <img src="images/mail.png" alt="">
                                        </div>
                                        <div class="detail-box">
                                            <h6>
                                                demo@gmail.com
                                            </h6>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
</body>
</html>
