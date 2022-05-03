<?php
    require_once "../connect.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trang quản trị</title>
    <?php include base_app("/admin/include/link.php") ?>
    <link rel="stylesheet" href="<?php url('admin/resources/css/dashboard.css') ?>">
<body>
    <div>
        <?php include base_app("/admin/include/nav.php") ?>
        <div class="page-container mt-2">
            <div class="page-sidebar">
                <?php include base_app("/admin/include/aside.php") ?>
            </div>
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-3">
                            <div class="dashboard card p-3 wave wave-animate-slower wave-danger">
                                <div class="card-body">
                                    <?php
                                        require_once base_app("Classes/GheTham.php");
                                        $gheTham = new GheTham();
                                        echo "<h2>" . $gheTham->tongSoLuotTruyCap() . "</h2>";
                                    ?>
                                    <p>Tổng số lượt truy cập</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="dashboard card p-3 wave wave-animate-slow wave-success">
                                <div class="card-body">
                                    <?php
                                        require_once base_app("Classes/DiaDiem.php");
                                        $diadiem = new DiaDiem();
                                        echo "<h2>" .  count($diadiem->all()) . "</h2>";
                                    ?>
                                    <p>Bài viết</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="dashboard card p-3 wave wave-animate-fast wave-info">
                                <div class="card-body">
                                    <?php
                                        $connection = createConnection();
                                        $result = $connection->query("select * from taikhoan");
                                        echo "<h2>{$result->num_rows}</h2>";
                                    ?>
                                    <p>Người dùng</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="dashboard card p-3  wave wave-animate-faster wave-dark">
                                <div class="card-body">
                                    <?php
                                        echo "<h2>" . $gheTham->soKhachGheTrongNgay() . "</h2>";
                                    ?>
                                    <p>Khách ghé trong ngày</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="card">
                                <h4 class="card-header">Lưu lượng truy cập</h4>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <canvas id="myChart" style="width:100%;"></canvas>
                                        </div>
                                        <div class="col-6">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-6">
                            <div class="card">
                                <h4 class="card-header">Bài viết gần đây</h4>
                                <div class="card-body">
                                    <table class="table table-bordered" id="table_diadiem">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tên địa điểm</th>
                                                <th>Người tạo</th>
                                                <th>Ngày tạo</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card">
                                <h4 class="card-header">Top bài viết được xem nhiều nhất</h4>
                                <div class="card-body">
                                    <table class="table table-hover" id="table_luotxem">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>URL</th>
                                                <th>Lượt xem</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
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
    <script>
        $(document).ready(function() {
            $("#table_diadiem").DataTable({
                searching: false,
                lengthChange: false,
                sort: false,
                bFilter: false,
                bInfo: false,
                bPaginate: false,
                language: {
                    "search": "Tìm kiếm",
                    "lengthMenu": "Hiển thị <span style='margin-right: 10px'></span> _MENU_",
                    "info": `Hiển thị <b>_TOTAL_</b> bản ghi`,
                    "paginate": {
                        "previous": "<i class='fa fa-arrow-left'></i>",
                        "next": "<i class='fa fa-arrow-right'></i>",
                    }
                },
                ajax: {
                    url: "/api/diadiem/getData.php"
                },
                columns: [
                    { data: 'id' },
                    { data: 'ten_dia_diem' },
                    { data: 'nguoi_tao' },
                    { data: 'ngay_tao' },
                ],
                columnDefs: [{
                    targets: 1,
                    render: function(data) {
                        return `<a href="">${data}</a>`;
                    }
                }, {
                    targets: 2,
                    render: function(data) {
                        return `<a href="">${data[0].ten_hien_thi}</a>`;
                    }
                }]
            })
            $("#table_luotxem").DataTable({
                searching: false,
                lengthChange: false,
                sort: false,
                bFilter: false,
                bInfo: false,
                bPaginate: false,
                language: {
                    "search": "Tìm kiếm",
                    "lengthMenu": "Hiển thị <span style='margin-right: 10px'></span> _MENU_",
                    "info": `Hiển thị <b>_TOTAL_</b> bản ghi`,
                    "paginate": {
                        "previous": "<i class='fa fa-arrow-left'></i>",
                        "next": "<i class='fa fa-arrow-right'></i>",
                    }
                },
                ajax: {
                    url: "/api/diadiem/getData.php"
                },
                columns: [
                    { data: 'id' },
                    { data: 'ten_dia_diem' },
                    { data: 'luot_xem' },
                ],
                columnDefs: [{
                    targets: 1,
                    render: function(data) {
                        return `<a>${data}</a>`
                    }
                }]
            })
        })
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script>
        $(document).ready(function () {
            <?php
                require_once base_app("Classes/GheTham.php");
                $gheTham = new GheTham();
                $result = $gheTham->all();
                $ngaytaos = array_map(fn($item) => $item['ngay_tao'], $result);
                $soluongs = array_map(fn($item) => $item['so_luong'], $result);
                $soluongxemdiadiems = array_map(fn($item) => $item['so_luong_xem_dia_diem'], $result);

                $ngaytaos = array_reverse($ngaytaos);
                $soluongs = array_reverse($soluongs);
                $soluongxemdiadiems = array_reverse($soluongxemdiadiems);

                $js_ngaytao = json_encode($ngaytaos);
                $js_soluong = json_encode($soluongs);
                $js_soluongxemdiadiems = json_encode($soluongxemdiadiems);

                echo "var xValues = " . $js_ngaytao . ";";
                echo "var y1Value = " . $js_soluong . ";";
                echo "var y2Value = " . $js_soluongxemdiadiems . ";";
            ?>
            new Chart("myChart", {
                type: "line",
                data: {
                    labels: xValues,
                    datasets: [{
                        data: y1Value,
                        borderColor: "red",
                        fill: false,
                        label: 'Khách ghé thăm'
                    }, {
                        data: y2Value,
                        borderColor: "green",
                        fill: false,
                        label: 'Lượt xem'
                    }
                    ]
                },
                options: {
                    legend: {display: false}
                }
            });
        })
    </script>
</body>
</html>