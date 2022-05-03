<?php

require_once "../../connect.php";
require_once base_app("Classes/BinhLuan.php");

$binhluan = new BinhLuan();

if(isset($_GET['id'])) {
    $binhluan->destroy($_GET['id']);
    header("Location: /admin/binhluan/index.php");
} else {
    header("Location: /admin/binhluan/index.php");
}
