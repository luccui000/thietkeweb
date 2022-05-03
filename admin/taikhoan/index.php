<?php
require_once "../../connect.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php include base_app('/admin/include/link.php'); ?>
<body>
<div>
    <?php include base_app('admin/include/nav.php'); ?>
    <div class="page-container mt-2">
        <div class="page-sidebar">
            <?php include base_app('admin/include/aside.php') ?>
        </div>
        <div class="page-content">
            <div class="container-fluid mt-2">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row d-flex justify-content-between align-items-center">
                                    <div class="col-6 ">
                                        <h4 class="">Danh sách tài khoản</h4>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end">

                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-2">
                                <?php
                                require_once base_app("Classes/TaiKhoan.php");
                                $taikhoan = (new TaiKhoan())->all();
                                ?>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tên hiển thị</th>
                                        <th>Email</th>
                                        <th>Số điện thoại</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($taikhoan as $item) { ?>
                                        <tr>
                                            <td><?php echo $item['id'] ?></td>
                                            <td><?php echo $item['ten_hien_thi'] ?></td>
                                            <td><?php echo $item['email'] ?></td>
                                            <td><?php echo $item['so_dien_thoai'] ?></td>
                                            <td>
                                                <a href="" class="btn btn-primary btn-sm">Xem</a>
                                                <a href="/admin/taikhoan/delete.php?id=<?php echo $item['id'] ?>" class="btn btn-danger btn-sm">Xoá</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include base_app('admin/include/script.php'); ?>
</body>
</html>
