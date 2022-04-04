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
    <?php include '../include/nav.php'; ?>
    <div class="page-container mt-2">
        <div class="page-sidebar">
            <?php include '../include/aside.php' ?>
        </div>
        <div class="page-content">
            <div class="container-fluid mt-2">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row d-flex justify-content-between align-items-center">
                                    <div class="col-6 ">
                                        <h4 class="">Danh sách địa điểm</h4>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end">
                                        <a href="<?php echo url('admin/diadiem/create.php'); ?>" class="btn btn-primary">Thêm mới</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row mt-2">
                                    <div class="col-12">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Hình ảnh</th>
                                                    <th>Tên địa điểm</th>
                                                    <th>Địa chỉ</th>
                                                    <th>Ngày tạo</th>
                                                    <th colspan="2"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $conn = createConnection();
                                                $query = "SELECT dd.Id, bddd.TenDiaDiem, bddd.MoTa, dd.HinhAnhId, ha.DuongDan, dd.DiaChi, dd.Iframe, dd.KinhDo, dd.ViDo, dd.NguoiTao, dd.NgayTao
                                                        FROM DiaDiem as dd, HinhAnh as ha, BanDich_DiaDiem as bddd, BanDich bd
                                                        WHERE dd.HinhAnhId = ha.Id
                                                        AND bddd.DiaDiemId = dd.Id
                                                        AND bddd.BanDichId = bd.Id
                                                        AND bd.TenBanDich = 'VietNam'";
                                                $result = $conn->query($query);
                                                if($result->num_rows > 0) {
                                                    while($row = $result->fetch_assoc()) {
                                                        echo "<tr>";
                                                        echo "<td>{$row['Id']}</td>";
                                                        echo "<td><img class='img-thumbnail' width='100' height='100' src='". BASE_URL . trim($row['DuongDan'], '/') ."' /></td>";
                                                        echo "<td>{$row['TenDiaDiem']}</td>";
                                                        echo "<td>{$row['DiaChi']}</td>";
                                                        echo "<td>{$row['NgayTao']}</td>";
                                                        echo "<td>
                                                            <a href='". url("admin/diadiem/update.php?id={$row['Id']}") ."' class='btn btn-success btn-sm'><i class='fa fa-edit'></i><span>Edit</span></a>
                                                            <a href='". url("admin/diadiem/delete.php?id={$row['Id']}") ."' class='btn btn-danger btn-sm'><i class='fa fa-trash-alt'></i><span>Delete</span></a>
                                                            </td>";
                                                        echo "</tr>";
                                                    }
                                                }
                                                ?>
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
<?php include '../include/script.php' ?>
</body>
</html>