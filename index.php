<?php
    require_once "connect.php";
    require_once base_app("Classes/GheTham.php");

    $gheTham = new GheTham();
    $gheTham->themTruyCapWeb();
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vi vu Trà Vinh</title>
    <?php include_once base_app("include/link.php"); ?>
</head>
<body>
    <?php include base_app("include/header.php"); ?>
    <section class="section-header">
        <div class="section-header-image">
            <img src="<?php url("/assets/img/header2.png"); ?>" alt="Header">
        </div>
        <div class="container">
            <div class="section-header-inner">
                <div class="section-header-title">
                    <h3 class="title">Cùng rời thành phố</h3>
                    <p>"Cùng rời thành phố", đến thăm địa điểm du lịch tỉnh Trà Vinh. Gần gủi, dễ thương, dễ xao xuyến nói lên tất cả về vùng đất và con người nơi đây!</p>
                    <a href="" class="btn btn-round btn-orange">Khám phá ngay</a>
                </div>
                <div class="section-header-title-xs">
                    <h3 class="title">Cùng rời thành phố</h3>
                    <p>"Cùng rời thành phố", đến thăm địa điểm du lịch tỉnh Trà Vinh. Gần gủi, dễ thương, dễ xao xuyến nói lên tất cả về vùng đất và con người nơi đây!</p>
                    <a href="" class="btn btn-round btn-orange">Khám phá ngay</a>
                </div>
            </div>
        </div>
    </section>

    <section class="section section-about">
        <div class="about-head slides">
            <h3>Cùng vòng quanh khám phá cùng Vi vu Trà Vinh</h3>
            <p>Vùng đất “Chín Rồng” nổi tiếng với khung cảnh miền quê sông nước trong lành, mát mẻ và mỗi tỉnh miền tây lại có một nét riêng mới là điều đặc biệt. Trà Vinh được biết đến với đặc sản bánh tét Trà Cuôn nổi tiếng. Là tỉnh miền Tây được bao bọc bởi hai con sông Cổ Chiên, sông Hậu và một mặt giáp biển, chắc chắn những địa điểm du lịch Trà Vinh sẽ rất thú vị và độc đáo đúng không?</p>
        </div>
        <div class="about-body">
            <div class="row slides">
                <div class="col">
                    <img src="<?php url("/assets/img/About/035-trekking.png") ?>">
                    <h2>Phiêu lưu</h2>
                    <p>Chuyến đi phiêu lưu cùng Vi Vu Trà Vinh vòng quanh toàn bộ các địa danh nổi tiếng tại Trà Vinh</p>
                </div>
                <div class="col">
                    <img src="<?php url("/assets/img/About/028-book.png"); ?>">
                    <h2>Khám phá</h2>
                    <p>Tham quan, khám phá nhưng văn hóa độc đáo của người dân nơi đây, mang nét văn hóa đặc sặc bởi ba dân tộc người Kinh, Khmer và Hoa. </p>
                </div>
                <div class="col">
                    <img src="<?php url("/assets/img/About/024-tent.png"); ?>">
                    <h2>Trải nghiệm</h2>
                    <p>Cùng trải nghiệm đặc sắc các lễ hội của người dân tộc</p>
                </div>
            </div>
        </div>
    </section>
    <section class="section-explore">
        <div class="texture-handler-top"></div>
        <div class="overlay">
            <div class="caption">
                <h2>Trải nghiệm văn hóa du lịch</h2> <br>
                <img src="<?php url("/assets/img/vivutravinh.png") ?>" alt="Bali Island">
            </div>
        </div>
        <div class="texture-handler-bottom"></div>
    </section>
    <section class="section section-discover" id="discover">
        <div class="section-head">
            <div class="section-line"></div>
            <h3 class="section-title">Danh mục nổi bật</h3>
            <p class="section-subtitle">Tham quan, khám phá nhưng văn hóa độc đáo của người dân nơi đây, mang nét văn hóa đặc sặc bởi ba dân tộc người Kinh, Khmer và Hoa.</p>
        </div>
        <div class="section-discover-body slides">
            <?php
                require_once base_app("Classes/DanhMuc.php");
                $dm = new DanhMuc();
                $danhmucs = $dm->topDanhMuc();
            ?>
            <?php foreach ($danhmucs as $danhmuc) { ?>
                <div class="col">
                    <a href="#">
                        <img src="<?php echo image_url($danhmuc['icon']); ?>" alt="Destination">
                        <div class="caption">
                            <p><?php echo $danhmuc['ten_danh_muc'] ?></p>
                            <div class="line"></div>
                            <div class="caption-text">
                                <p><?php echo $danhmuc['mo_ta'] ?></p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </section>
    <section class="section section-tour">
        <div class="section-head">
            <div class="section-line"></div>
            <h3 class="section-title">5 điểm đến chúng tôi gợi ý cho bạn</h3>
            <p class="section-subtitle">Vùng đất này còn là nơi sinh sống gắn bó lâu đời của ba dân tộc Kinh, Khmer, Hoa. Từ đó, đã hình thành một nền văn hóa đa sắc tộc nổi bật với nhiều công trình kiến trúc tôn giáo độc đáo</p>
        </div>
        <div class="section-tour-body">
            <?php
                require_once base_app("Classes/DiaDiem.php");
                $dd = new DiaDiem();
                $diadiems = $dd->topDiaDiem();
            ?>
            <div class="row">
                <?php for($i = 0; $i < 2; $i++) {?>
                    <div class="col-1 slides">
                        <img src="<?php echo $diadiems[$i]['hinh_anh']; ?>">
                        <div class="overlay">
                            <div class="caption">
                                <div class="caption-text">
                                    <p><?php echo $diadiems[$i]['ten_dia_diem'] ?></p>
                                    <span class=""><?php echo $diadiems[$i]['mo_ta'] ?></span>
                                    <a href="#" class="btn btn-orange btn-round right">Chi tiết</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="row">
                <?php for($i = 2; $i < 5; $i++) {?>
                    <div class="col-2 slides">
                        <img src="<?php echo $diadiems[$i]['hinh_anh']; ?>">
                        <div class="overlay">
                            <div class="caption">
                                <div class="caption-text">
                                    <p><?php echo $diadiems[$i]['ten_dia_diem'] ?></p>
                                    <span class=""><?php echo $diadiems[$i]['mo_ta'] ?></span>
                                    <a href="#" class="btn btn-orange btn-round right">Chi tiết</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- Section Newsletter -->

    <section class="section-testi">
        <div class="overlay">
            <div class="head">
                <h3>Khách du lịch họ nói gì về Trà Vinh</h3>
            </div>
            <div id='mySwipe' class='swipe'>
                <div class="swipe-wrap">
                    <div class="blockquote">
                        <p class="text">Người dân chất phác hiền lành vui tươi </p>
                        <div class="blockquote-user">
                            <div class="blockquote-avatar">
                                <img src="https://picsum.photos/100" alt="Bae Hyo-Rin">
                            </div>
                            <div class="blockquote-name">Lý Kim Lam</div>
                        </div>
                    </div>
                    <div class="blockquote">
                        <p class="text">Cùng mình tham quan, khám phá nhưng văn hóa độc đáo của người dân nơi đây, mang nét văn hóa đặc sặc bởi ba dân tộc người Kinh, Khmer và Hoa.</p>
                        <div class="blockquote-user">
                            <div class="blockquote-avatar">
                                <img src="https://picsum.photos/100" alt="Bae Hyo-Rin">
                            </div>
                            <div class="blockquote-name">Thạch Minh Lực</div>
                        </div>
                    </div>
                    <div class="blockquote">
                        <p class="text">Vùng đất này còn là nơi sinh sống gắn bó lâu đời của ba dân tộc Kinh, Khmer, Hoa. Từ đó, đã hình thành một nền văn hóa đa sắc tộc nổi bật với nhiều công trình kiến trúc tôn giáo độc đáo                         </p>
                        <div class="blockquote-user">
                            <div class="blockquote-avatar">
                                <img src="https://picsum.photos/100" alt="Bae Hyo-Rin">
                            </div>
                            <div class="blockquote-name">g Phuoc Thinh</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="overlay-btn">
                <button class="btn-orange btn-bullet" onclick='mySwipe.prev()'><</button> &nbsp;
                <button class="btn-orange btn-bullet" onclick='mySwipe.next()'> > </button>
            </div>
        </div>
    </section>
    <?php include_once base_app("include/footer.php"); ?>
    <?php include_once base_app("include/script.php"); ?>
</body>
</html>
