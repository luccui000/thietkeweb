<?php
require_once "../../connect.php";
require_once base_app("Classes/HinhAnh.php");

if(isset($_SESSION[SESSION_AUTH_ID])) {
    if(isset($_POST['id'])) {
        $id = $_POST["id"];
        $hinhAnh = new HinhAnh();
        $result = $hinhAnh->find($id);
        if($result->num_rows > 0) {
            header('Content-Type: application/json; charset=utf-8');
            if($hinhAnh->destroy($id)) {
                echo json_encode([
                    'status' => 200,
                    'error' => false,
                    'message' => "Xóa thành công"
                ]);
            } else {
                echo json_encode([
                    'status' => 200,
                    'error' => true,
                    'message' => "Xóa thất bại"
                ]);
            }
        }
    }
} else {
    echo "Vui lòng đăng nhập";
}
