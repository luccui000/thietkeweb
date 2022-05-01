<?php
header('Content-type: application/json');
require_once "../../connect.php";
require_once base_app("Classes/Tag.php");
require_once base_app("Helpers/DateFormat.php");

$result = (new Tag())->all();
if($result->num_rows > 0) {
    $tags = [];
    while($row = $result->fetch_assoc()) {
        array_push($tags, [
            'id' => $row['id'],
            'ten_tag' => $row['ten_tag'],
            'nguoi_tao_id' => $row['nguoi_tao_id'],
            'ho_ten_nguoi_tao' => $row['ho_ten'],
            'mo_ta' => $row['mo_ta'],
            'ngay_tao' => DateFormat::format($row['ngay_tao']),
            'trang_thai' => $row['trang_thai']
        ]);
    }
    $json = [
        'date' => date('dmYhms'),
        'error' => false,
        'message' => 'Lấy dữ liệu thành công',
        'data' => $tags
    ];
    echo json_encode($json);
}

