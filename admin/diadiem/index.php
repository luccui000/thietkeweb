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
                                        <h4 class="">Danh sách địa điểm</h4>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end">
                                        <a href="<?php url('admin/diadiem/create.php'); ?>" class="btn btn-primary">Thêm mới</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-2">
                                <div class="row mt-2">
                                    <div class="col-12">
                                        <table class="table table-hover" id="table_diadiem">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th style="width: 100px">Hình ảnh</th>
                                                    <th>Tên địa điểm</th>
                                                    <th>Địa chỉ</th>
                                                    <th>Ngày tạo</th>
                                                    <th></th>
                                                    <th></th>
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
    </div>
</div>
<?php include base_app('admin/include/script.php'); ?>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        let table = $("table").DataTable({
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
                { data: 'hinh_anh' },
                { data: 'ten_dia_diem' },
                { data: 'dia_chi' },
                { data: 'ngay_tao' },
                { data: 'nguoi_tao' },
                { data: 'trang_thai' },
            ],
            columnDefs: [{
               targets: 0,
               render: function (data) {
                   return `<p class="text-center">${data}</p>`;
               }
            }, {
                targets: 1,
                render: function(img) {
                    return `<img width="100" src="${img}" >`
                }
            }, {
                targets: 2,
                render: function(data) {
                    return `<a href="#">${data}</a>`
                }
            }, {
                targets: 5,
                render: function (data) {
                    return `<span>${data[0].ten_hien_thi}</span>`;
                }
            }, {
                targets: 6,
                render: function (data) {
                    return data === "congbo" ?
                        `<span class="badge badge-success">đã công bố</span>`:
                        `<span class="badge badge-danger">đang tắt</span>`;
                }
            }]
        });
        $('#table_diadiem tbody').on( 'click', 'tr td:nth-child(3)', function () {
            const { id } = table.row( this ).data();
            window.location.href = "/admin/diadiem/update.php?id=" + id;
        });
    })
</script>
</body>
</html>