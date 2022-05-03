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
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
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
                                            <h4 class="">Danh sách bình luận</h4>
                                        </div>
                                        <div class="col-6 d-flex justify-content-end">

                                        </div>
                                    </div>
                                </div>
                                <div class="card-body p-2">
                                    <div class="row mt-2">
                                        <div class="col-12">
                                            <?php
                                                require_once base_app("Classes/BinhLuan.php");
                                                require_once base_app("Helpers/DateFormat.php");

                                                $tatca = (new BinhLuan())->all();
                                                $chuaduyet = (new BinhLuan())->danhSachBinhLuanTheo(BinhLuan::TRANGTHAI['dangchoduyet']);
                                                $daduyet = (new BinhLuan())->danhSachBinhLuanTheo(BinhLuan::TRANGTHAI['daduyet']);
                                            ?>
                                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Tất cả</a>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Chưa duyệt</a>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Đã duyệt</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Người bình luận</th>
                                                                <th>Nội dung bình luận</th>
                                                                <th>Ngày tạo</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($tatca as $item) { ?>
                                                                <tr>
                                                                    <td><?php echo $item['id'] ?></td>
                                                                    <td><?php echo $item['noi_dung_binh_luan'] ?></td>
                                                                    <td><?php echo $item['nguoi_tao'][0]['ten_hien_thi'] ?></td>
                                                                    <td><?php echo DateFormat::format($item['ngay_tao']) ?></td>
                                                                </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                                    <table class="table">
                                                        <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Người bình luận</th>
                                                            <th>Nội dung bình luận</th>
                                                            <th>Ngày tạo</th>
                                                            <th></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php foreach ($chuaduyet as $item) { ?>
                                                            <tr>
                                                                <td><?php echo $item['id'] ?></td>
                                                                <td><?php echo $item['noi_dung_binh_luan'] ?></td>
                                                                <td><?php echo $item['nguoi_tao'][0]['ten_hien_thi'] ?></td>
                                                                <td><?php echo DateFormat::format($item['ngay_tao']) ?></td>
                                                                <td>
                                                                    <a href="/admin/binhluan/duyet.php?id=<?php echo $item['id'] ?>" class="btn btn-primary btn-sm">
                                                                        Duyệt
                                                                    </a>
                                                                    <a href="/admin/binhluan/delete.php?id=<?php echo $item['id'] ?>" class="btn btn-danger btn-sm">
                                                                        Xóa
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                                    <table class="table">
                                                        <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Người bình luận</th>
                                                            <th>Nội dung bình luận</th>
                                                            <th>Ngày tạo</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php foreach ($daduyet as $item) { ?>
                                                            <tr>
                                                                <td><?php echo $item['id'] ?></td>
                                                                <td><?php echo $item['noi_dung_binh_luan'] ?></td>
                                                                <td><?php echo $item['nguoi_tao'][0]['ten_hien_thi'] ?></td>
                                                                <td><?php echo DateFormat::format($item['ngay_tao']) ?></td>
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
                </div>
            </div>
        </div>
    </div>
    <?php include base_app('admin/include/script.php'); ?>
    </body>
</html>
