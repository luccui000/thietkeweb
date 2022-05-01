<?php

require_once "../../connect.php";
require_once base_app("Classes/DiaDiem.php");
require_once base_app("Classes/HinhAnh.php");

$danhmuc = $_POST['danhmuc'];
$danhmuc = str_replace('[', '', $danhmuc);
$danhmuc = str_replace(']', '', $danhmuc);
$laNoiBat = isset($_POST['la_noi_bat']) ? 1 : 0;
$tags = $_POST['tags'];

try {
    $idHinhAnh = (int)$_POST['hinhanh'];
     $hinhanh = (new HinhAnh())->first($idHinhAnh);
     if(isset($hinhanh['duong_dan'])) {
        $diadiem = new DiaDiem();
        $idDiaDiem = $diadiem->insert([
            'ten_dia_diem' => $_POST['ten_dia_diem'],
            'hinh_anh' => $hinhanh['duong_dan'],
            'mo_ta' => $_POST['mo_ta'],
            'noi_dung' => $_POST['noi_dung'],
            'nguoi_tao' => $_SESSION[SESSION_AUTH_ID],
            'dia_chi' => $_POST['dia_chi'],
            'iframe' => $_POST['iframe'],
            'kinh_do' => $_POST['kinh_do'],
            'vi_do' => $_POST['vi_do'],
            'trang_thai' => $_POST['trang_thai'],
            'la_noi_bat' => $laNoiBat
        ]);
        if($idDiaDiem > 0) {
            $diadiem->themDanhMuc(explode(",", $danhmuc));
            $diadiem->themTag($tags);
        }
        $diadiemTiengAnh = new DiaDiem();
        $idDiaDiemTiengAnh = $diadiemTiengAnh->insert([
            'ten_dia_diem' => $_POST['ten_dia_diem_tieng_anh'],
            'hinh_anh' => $hinhanh['duong_dan'],
            'mo_ta' => $_POST['mo_ta_tieng_anh'],
            'noi_dung' => $_POST['noi_dung_tieng_anh'],
            'nguoi_tao' => $_SESSION[SESSION_AUTH_ID],
            'dia_chi' => $_POST['dia_chi'],
            'iframe' => $_POST['iframe'],
            'kinh_do' => $_POST['kinh_do'],
            'vi_do' => $_POST['vi_do'],
            'trang_thai' => $_POST['trang_thai'],
            'la_noi_bat' => $laNoiBat
        ]);
        if($idDiaDiemTiengAnh > 0) {
             $diadiemTiengAnh->themDanhMuc(explode(",", $danhmuc));
             $diadiemTiengAnh->themTag($tags);
        }
        // header("Location: /admin/diadiem/index.php");
     }
} catch (Exception $exception) {
    var_dump($exception);
}
