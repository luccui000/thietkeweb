<?php
header("Content-Type: application/json");

require_once "../../connect.php";
require_once base_app("Helpers/Translator.php");

$post = json_decode(file_get_contents('php://input'), true);
$translated = Translator::translate($post['text']);

echo json_encode([
    'date' => date('dmYhms'),
    'error' => false,
    'message' => 'Dịch thành công',
    'data' => $translated
]);