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
    <?php include '../include/link.php' ?>
<body>
<div>
    <?php include '../include/nav.php' ?>
    <div class="page-container mt-2">
        <div class="page-sidebar">
            <?php include '../include/aside.php' ?>
        </div>
        <div class="page-content">
            <div class="container-fluid mt-2">
                <div class="row">
                    <div class="col-3">
                        <ul class="list-group">
                            <a href="<?php url('admin/danhmuc/index.php?id=1'); ?>" class="list-group-item">1</a>
                            <a href="<?php url('admin/danhmuc/index.php?id=1'); ?>" class="list-group-item">1</a>
                            <a href="<?php url('admin/danhmuc/index.php?id=1'); ?>" class="list-group-item">1</a>
                        </ul>
                    </div>
                    <div class="col-9">
                        <div class="card">
                            <div class="card-body p-2">
                                <div class="form-group">
                                    <label>Tên danh mục</label>
                                    <input type="text" id="TenDanhMuc" name="TenDanhMuc" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="DanhMucChaId">Danh mục cha</label>
                                    <select name="DanhMucChaId" id="DanhMucChaId" class="form-control custom-select">
                                        <option value="">1</option>
                                        <option value="">1</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="MoTa">Mô tả ngắn</label>
                                    <textarea name="MoTa" id="MoTa" class="form-control"></textarea>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="TrangThai" class="custom-control-input" id="TrangThai">
                                    <label class="custom-control-label" for="TrangThai">Hiển thị</label>
                                </div>
                                <button class="btn btn-success mt-4">Lưu và tiếp tục</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include '../include/script.php' ?>
</body>
</html>