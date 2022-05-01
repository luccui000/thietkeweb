<?php
require_once "../../connect.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lịch trình</title>
    <?php include base_app('/admin/include/link.php') ?>
<body>
<div>
    <?php include base_app('/admin/include/nav.php') ?>
    <div class="page-container mt-2">
        <div class="page-sidebar">
            <?php include base_app('/admin/include/aside.php') ?>
        </div>
        <div class="page-content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end">
                                <a href="/admin/lichtrinh/create.php" class="btn btn-primary">Thêm mới</a>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <table class="table table-hovered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>#</th>
                                            <th>#</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    <tbody>

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
<?php include base_app('/admin/include/script.php') ?>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
</body>
</html>