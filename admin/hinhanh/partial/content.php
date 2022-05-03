<?php
    require_once base_app("Classes/HinhAnh.php");
    require_once base_app("Classes/TaiKhoan.php");

    $hinhanhs = (new HinhAnh())->all();
    foreach ($hinhanhs as $parent) {
        echo "<div class='row'>";
        foreach ($parent as $child) {
            echo "<div class='col-". 12 / HinhAnh::ITEM_IN_ROW ." mt-2 cursor-pointer'>";
            echo    "<div class='card choose-card'>";
            echo        "<img class='w-100 rounded hinhanh' style='height: 155px'";
            echo            "src='". $child["duong_dan"] ."'";
            echo            "alt='". $child["ten_hinh_anh"] ."'";
            echo            "data-id='". $child["id"] ."'";
            echo            "data-tenhinhanh='". $child["ten_hinh_anh"] ."'";
            echo            "data-duongdan='". $child["duong_dan"] ."'";
            echo            "data-ngaytao='". $child["ngay_tao"] ."'";
            echo            "data-nguoitaoid='". $child["nguoi_tao"][0]["id"] ."'";
            echo            "data-hotennguoitao='". $child["nguoi_tao"][0]["ten_hien_thi"] ."'";
            echo        ">";
            echo        "<div class='card-body'>";
            echo            "<div class='card-text text-center'>" . $child["id"] . "</div>";
            echo        "</div>";
            echo    "</div>";
            echo "</div>";
        }
        echo "</div>";
    }
?>