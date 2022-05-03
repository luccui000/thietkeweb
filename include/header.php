<nav class="navbar">
    <div class="container">
        <div class="navbar-bars">
            <a href="/" class="navbar-title sidebar-toggle" style="padding: 0;"><i class="ion-navicon-round"></i></a>
            <a href="/" class="navbar-title">Vi vu Trà Vinh</a>
        </div>
        <div class="navbar-item">
            <a href="/" class="navbar-title">Vi vu Trà Vinh</a>
            <ul>
                <li><a href="/">Trang chủ</a></li>
                <li><a href="/thuvien.php">Thư viện</a></li>
                <li><a href="/diadiem.php">Điểm đến</a></li>
                <li><a href="/lichtrinh.php">Lịch trình</a></li>
                <li><a href="/lienhe.php">Liên hệ</a></li>
                <?php
                    if(isset($_SESSION[SESSION_AUTH_NAME])) {
                        echo "<li><a href=''>Xin chào, {$_SESSION[SESSION_AUTH_NAME]}</a></li>";
                    } else {
                        echo "<li><a href='/dangnhap.php'>Đăng nhập</a></li>";
                    }
                ?>
            </ul>
        </div>
    </div>
</nav>

<div class="sidebar">
    <ul class="sidebar-list">
        <li><a href="" class="close"><span class="ion-android-close"></span></a></li>
        <li class="sidebar-list-hover"><a href="/">Trang chủ</a></li>
        <li class="sidebar-list-hover"><a href="/">Điểm đến</a></li>
        <li class="sidebar-list-hover"><a href="#">Thư viên</a></li>
        <li class="sidebar-list-hover"><a href="#discover">Khám phá</a></li>
        <li class="sidebar-list-hover"><a href="#"> Đăng nhập</a></li>
    </ul>
</div>