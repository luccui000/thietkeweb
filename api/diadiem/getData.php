<?php
header('Content-type: application/json');
require_once "../../connect.php";
require_once base_app("Classes/DiaDiem.php");
require_once base_app("Helpers/DateFormat.php");

$result = (new DiaDiem())->all();
if($result->num_rows > 0) {
    $diadiems = [];
    while($row = $result->fetch_assoc()) {
        array_push($diadiems, [
            'id' => $row['id'],
            'hinh_anh' => image_url($row['hinh_anh']),
            'ten_dia_diem' => $row['ten_dia_diem'],
            'mo_ta' => $row['mo_ta'],
            'noi_dung' => $row['noi_dung'],
            'dia_chi' => $row['dia_chi'],
            'iframe' => $row['iframe'],
            'kinh_do' => $row['kinh_do'],
            'vi_do' => $row['vi_do'],
            'nguoi_tao' => $row['nguoi_tao_id'],
            'ho_ten_nguoi_tao' => $row['ho_ten'],
            'luot_xem' => $row['luot_xem'],
            'la_noi_bat' => $row['la_noi_bat'],
            'trang_thai' => $row['trang_thai'],
            'ngay_tao' => DateFormat::format($row['ngay_tao'])
        ]);
    }
    $json = [
        'date' => date('dmYhms'),
        'error' => false,
        'message' => 'Lấy dữ liệu thành công',
        'data' => $diadiems
    ];
    echo json_encode($json);
}

