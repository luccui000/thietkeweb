<?php
header('Content-type: application/json');
require_once "../../connect.php";
require_once base_app("Classes/Tag.php");
require_once base_app("Helpers/DateFormat.php");

$tags = (new Tag())->all();
$json = [
    'date' => date('dmYhms'),
    'error' => false,
    'message' => 'Lấy dữ liệu thành công',
    'data' => $tags
];
echo json_encode($json);