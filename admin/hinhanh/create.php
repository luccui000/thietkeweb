<?php
require "../../connect.php";
require_once base_app("Helpers/FileUpload.php");
require_once base_app("Classes/HinhAnh.php");

if(count($_POST)) {
    $fileUpload = new FileUpload($_FILES['fu_hinh_anh'], "/Upload/images");
    if($fileUpload->save()) {
        $hinhAnh = new HinhAnh();
        $hinhAnh->ten_hinh_anh = $_POST['ten_hinh_anh'];
        $hinhAnh->duong_dan = $fileUpload->getTargetFile();
        $hinhAnh->nguoi_tao = $_SESSION['id'] ?? 1;
        $hinhAnh->ngay_tao = date('Y/m/d');
        $hinhAnh->trang_thai = 1;
        if($hinhAnh->save()) {
            header("Location: /admin/hinhanh/index.php");
        } else {
            echo "Them moi that bai";
        }
    }
}
