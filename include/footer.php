<?php require_once "connect.php"; ?>
<section class="section-footer">
    <div class="texture-handler-top"></div>
    <div class="row">
        <div class="col-left">
            <p>Vi Vu Trà Vinh<br>
                Phone : +03999xxxx <br>
                Email : gmail@vivutravinh.com </p>
        </div>
        <div class="col-right">
            <b>TOP ĐỊA ĐIỂM</b>
            <ul>
                <?php
                    require_once base_app("Classes/DiaDiem.php");
                    require_once base_app("Helpers/Str.php");
                    $dd = new DiaDiem();
                    $diadiems = $dd->topDiaDiem();
                ?>
                <?php foreach ($diadiems as $diadiem) {?>
                    <li><a href="#"><?php echo Str::limit($diadiem['ten_dia_diem'], 5) ?></a></li>
                <?php } ?>
            </ul>
        </div>
        <div class="col-right">
            <b>TOP LỊCH TRÌNH</b>
            <ul>
                <li><a href="#">Lịch trình 1 ngày</a></li>
                <li><a href="#">Lịch trình 7 ngày</a></li>
                <li><a href="#">Du lịch cùng gia đình</a></li>
                <li><a href="#">Du lịch cuối tuần</a></li>
            </ul>
        </div>
        <div class="col-right">
            <b>THEO DÕI CHÚNG TÔI QUA</b>
            <ul>
                <li><a href="#">Facebook</a></li>
                <li><a href="#">Youtube</a></li>
                <li><a href="#">Tiktok</a></li>
            </ul>
        </div>
    </div>
</section>
