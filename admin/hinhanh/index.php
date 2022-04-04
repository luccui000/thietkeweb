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
    <style>
        .media-name p {
            margin-bottom: 0;
            font-weight: bold;
        }
    </style>
<body>
<div>
    <?php include '../include/nav.php' ?>
    <div class="page-container mt-2">
        <div class="page-sidebar">
            <?php include '../include/aside.php' ?>
        </div>
        <div class="page-content">
            <div class="container-fluid">
                <div class="row mt-2">
                    <div class="col-9 d-flex justify-content-between">
                        <h5 class="text-uppercase">Danh sách hình ảnh</h5>
                        <div>
                            <button class="btn btn-default" data-toggle="modal" data-target="#themMoiHinhAnh">Thêm mới</button>
                            <button class="btn btn-danger">Xoá</button>
                        </div>
                    </div>
                    <div class="col-3"></div>
                </div>
                <div class="row mt-2">
                    <div class="col-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <?php
                                        $conn = createConnection();
                                        $query = "SELECT ha.Id, tk.HoTen, ha.DuongDan, ha.NgayTao, ha.NguoiTao, bdha.TenHinhAnh, bdha.MoTa FROM HinhAnh as ha, BanDich_HinhAnh as bdha, TaiKhoan as tk WHERE bdha.HinhAnhId = ha.Id AND ha.NguoiTao = tk.Id AND bdha.BanDichId=1";
                                        $result = $conn->query($query);
                                        $rows = [];
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_array()) {
                                                array_push($rows, $row);
                                            }
                                            $rows = array_chunk($rows, 4);
                                            foreach ($rows as $row) {
                                                echo "<div class='row'>";
                                                foreach ($row as $col) {
                                                    echo "<div class='col-3 mb-2'>
                                                       <img 
                                                            data-id='{$col['Id']}'
                                                            data-duongdan='{$col['DuongDan']}'
                                                            data-ngaytao='{$col['NgayTao']}'
                                                            data-nguoitao='{$col['HoTen']}'
                                                            class='rounded w-100 h-100 thongtin' 
                                                            src='{$col['DuongDan']}'
                                                        />
                                                    </div>";
                                                }
                                                echo "</div>";
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card">
                            <h5 class="card-header">Thông tin về hình ảnh</h5>
                            <div class="card-body px-2">
                                <div id="media-detail"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="themMoiHinhAnh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm mới hình ảnh</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="txtTenHinhAnh">Tên hình ảnh</label>
                                    <input type="text" id="TenHinhAnh" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="txtTenHinhAnhTiengAnh">Tên hình ảnh(bản tiếng anh)</label>
                                    <input type="text" id="TenHinhAnhTiengAnh" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="MoTa">Mô tả hình ảnh</label>
                                    <textarea name="" id="MoTa" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-2 d-flex align-items-center justify-content-center">
                                <button type="button" class="btn btn-primary" id="btnDich">Dịch</button>
                            </div>
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="txtMoTaTiengAnh">Mô tả hình ảnh (bản tiếng anh)</label>
                                    <textarea name="" id="MoTaTiengAnh" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="fuDuongDan">Hình ảnh</label>
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile02">
                                    <label class="custom-file-label" for="inputGroupFile02">Chọn hình ảnh</label>
                                </div>
                            </div>
                        </div>
                        <img class="preview" src="" alt="" />
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end">
                                <button class="btn btn-success" style="width: 100px">Lưu</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include '../include/script.php' ?>
<script>
    $(document).ready(function() {
        const thongtins = document.querySelectorAll('.thongtin');
        thongtins.forEach(thongtin => thongtin.addEventListener('click', handleXemThongTin))

        function handleXemThongTin(e) {
            const { id, duongdan, ngaytao, nguoitao } = e.target.dataset;
            $("#media-detail").empty();
            $("#media-detail").append(
                `<div class="media-name">
                    <p>Đường dẫn</p>
                    <div class="input-group mb-3">
                        <input type="text" id="media-name-duongdan" class="form-control" value="${duongdan}" >
                        <div class="input-group-append" >
                            <a class="input-group-text" id="media-name-copy" >
                                <i class="fa fa-copy"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="media-name">
                    <p>Người tạo</p>
                    <span>${nguoitao}</span>
                </div>
                <div class="media-name">
                    <p>Ngày tạo</p>
                    <span>${ngaytao}</span>
                </div>`
            );
        }

    })
</script>
</body>
</html>