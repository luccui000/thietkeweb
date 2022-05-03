<?php
header('Content-type: application/json');
require_once "../../connect.php";
require_once base_app("Classes/DiaDiem.php");

$diadiems = (new DiaDiem())->all();
$json = [
    'date' => date('dmYhms'),
    'error' => false,
    'message' => 'Lấy dữ liệu thành công',
    'data' => $diadiems
];
echo json_encode($json);

