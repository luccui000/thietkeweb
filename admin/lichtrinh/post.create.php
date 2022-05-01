<?php
header('Content-type: application/json');

require_once "../../connect.php";
require_once base_app("Classes/LichTrinh.php");
require_once base_app("Classes/ThongTinLichTrinh.php");

$post = json_decode(file_get_contents('php://input'), true);

$chi_tiet_lich_trinh = $post['chi_tiet_lich_trinh'];
$danh_mucs = $post['danh_mucs'];
$danh_mucs = str_replace('[', '', $danh_mucs);
$danh_mucs = str_replace(']', '', $danh_mucs);

$lichtrinh = new LichTrinh();
$lichtrinh->insert([
    'ten_lich_trinh' => $post['ten_lich_trinh'],
    'thoi_gian_khoi_hanh' => $post['thoi_gian_khoi_hanh'],
    'dia_chi_khoi_hanh' => $post['dia_chi_khoi_hanh'],
    'trang_thai' => $post['trang_thai'],
    'nguoi_tao' => 1
]);
$danh_muc_ids = explode(",", $danh_mucs);
$lichtrinh->themDanhMuc($danh_muc_ids);

foreach ($chi_tiet_lich_trinh as $items) {
    $thuTu = $items["props"]["thu_tu"];
    $thongTinLichTrinh = new ThongTinLichTrinh();
    $thongTinLichTrinh->insert([
        'ten_ctlt' => $items["props"]["ten_ctlt"],
        'noi_dung' => $items["props"]["noi_dung"],
        'chi_phi_trung_binh' => $items["props"]["chi_phi_trung_binh"],
        'thoi_gian_trung_binh' => $items["props"]["thoi_gian_trung_binh"]
    ]);
    $lichtrinh->themChiTietLichTrinh($thongTinLichTrinh->id, $thuTu);
}
$json = [
    'date' => date('dmYhms'),
    'error' => false,
    'message' => 'Lấy dữ liệu thành công',
    'data' => $lichtrinh
];
echo json_encode($json);