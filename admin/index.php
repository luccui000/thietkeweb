<?php
    require_once "../connect.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php include './include/link.php' ?>
    <link rel="stylesheet" href="<?php echo BASE_URL . 'admin/resources/css/dashboard.css'; ?>">
<body>
    <div>
        <?php include './include/nav.php' ?>
        <div class="page-container mt-2">
            <div class="page-sidebar">
                <?php include './include/aside.php' ?>
            </div>
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-3">
                            <div class="dashboard card p-3 wave wave-animate-slower wave-danger">
                                <div class="card-body">
                                    <h2>5</h2>
                                    <p>Trang</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="dashboard card p-3 wave wave-animate-slow wave-success">
                                <div class="card-body">
                                    <h2>1</h2>
                                    <p>Bài viết</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="dashboard card p-3 wave wave-animate-fast wave-info">
                                <div class="card-body">
                                    <h2>4</h2>
                                    <p>Người dùng</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="dashboard card p-3  wave wave-animate-faster wave-dark">
                                <div class="card-body">
                                    <h2>8</h2>
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

                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card">
                                <h4 class="card-header">Top bài viết được xem nhiều nhất</h4>
                                <div class="card-body">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>URL</th>
                                            <th>Lượt xem</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                1
                                            </td>
                                            <td>
                                                <a href="#">Bai 1</a>
                                            </td>
                                            <td>
                                                88 lượt
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                2
                                            </td>
                                            <td>
                                                <a href="#">Bai 2</a>
                                            </td>
                                            <td>
                                                12 lượt
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                3
                                            </td>
                                            <td>
                                                <a href="#">Bai 3</a>
                                            </td>
                                            <td>
                                                9 lượt
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <asp:GridView runat="server" ID="grTop"></asp:GridView>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include './include/script.php' ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script>
        $(document).ready(function () {
            var xValues = [100, 200, 300, 400, 500, 600, 700, 800, 900, 1000];
            new Chart("myChart", {
                type: "line",
                data: {
                    labels: xValues,
                    datasets: [{
                        data: [860, 1140, 1060, 1060, 1070, 1110, 1330, 2210, 7830, 2478],
                        borderColor: "red",
                        fill: false,
                        label: 'Khách ghé thăm'
                    }, {
                        data: [1600, 1700, 1700, 1900, 2000, 2700, 4000, 5000, 6000, 7000],
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