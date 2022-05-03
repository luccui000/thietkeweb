<?php

require_once "../../connect.php";
require_once base_app("Classes/TaiKhoan.php");

if(!isset($_GET['id'])) {
    header("Location: /admin/taikhoan/index.php");
} else {
    $taikhoan = new TaiKhoan();
    $taikhoan->destroy($_GET['id']);
    header("Location: /admin/taikhoan/index.php");
}

