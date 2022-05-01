<?php
header('Content-Type: application/json');
require_once "../../connect.php";

require_once base_app("Classes/LichTrinh.php");

$lichtrinhs = (new LichTrinh())->all();

$json = [
    'date' => date('dmYhms'),
    'error' => false,
    'message' => 'Lấy dữ liệu thành công',
    'data' => $lichtrinhs
];

echo json_encode($json);