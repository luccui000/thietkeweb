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
    <style>
        #DataTables_Table_0_filter, #DataTables_Table_0_paginate {
            display: flex;
            justify-content: flex-end;
            margin-right: 10px;
        }
        #DataTables_Table_0 tbody tr td:nth-child(3),
        #DataTables_Table_0 tbody tr td:nth-child(4),
        #DataTables_Table_0 tbody tr td:nth-child(5),
        #DataTables_Table_0 tbody tr td:nth-child(6),
        #DataTables_Table_0 tbody tr td:nth-child(7){
            text-align: center;
        }
        td.details-control {
            background: url(<?php url('assets/images/lichtrinh/details_open.png') ?>) no-repeat center center;
            cursor: pointer;
        }
        tr.details td.details-control {
            background: url(<?php url('assets/images/lichtrinh/details_close.png') ?>) no-repeat center center;
        }
    </style>
<body>
<div>
    <?php include base_app('/admin/include/nav.php') ?>
    <div class="page-container mt-2">
        <div class="page-sidebar">
            <?php include base_app('/admin/include/aside.php') ?>
        </div>
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 d-flex justify-content-end">
                        <a href="/admin/lichtrinh/create.php" class="btn btn-primary">Thêm mới</a>
                    </div>
                </div>
                <div class="card mt-2">
                    <div class="card-body p-2">
                        <div class="row">
                            <div class="col-12">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tên lịch trình</th>
                                        <th class="text-center">Thời gian khởi hành</th>
                                        <th class="text-center">Địa điểm khởi hành</th>
                                        <th class="text-center">Trạng thái</th>
                                        <th class="text-center">Người tạo</th>
                                        <th class="text-center">Chi tiết lịch trình</th>
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
<script>
    $(document).ready(function() {
        let dt = $("table").DataTable({
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
                url: "/api/lichtrinh/getData.php"
            },
            columns: [
                {
                    "class":          "details-control",
                    "orderable":      false,
                    "data":           "",
                    "defaultContent": ""
                },
                {data: 'ten_lich_trinh'},
                {data: 'thoi_gian_khoi_hanh'},
                {data: 'dia_chi_khoi_hanh'},
                {data: 'trang_thai'},
                {data: 'nguoi_tao'},
                {data: 'so_luong_chi_tiet_lich_trinh'},
            ],
            columnDefs: [{
                targets: 4,
                render: function(data) {
                    let text;
                    switch (data) {
                        case "Công bố":
                            text = `<span class="badge badge-success">${data}</span>`;
                            break;
                        case "Đang chờ duyệt":
                            text = `<span class="badge badge-danger">${data}</span>`;
                            break;
                        case "Bản thảo":
                            text = `<span class="badge badge-info">${data}</span>`;
                            break;
                    }
                    return text;
                }
            }, {
                targets: 5,
                render: function(data) {
                    return `<span>${data.ten_hien_thi}</span>`
                }
            }]
        })
        let detailRows = [];
        $("table tbody").on('click', 'tr td:nth-child(2)', function() {
            console.log(dt.row(this).data())
        })
        $('table tbody').on( 'click', 'tr td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = dt.row(tr);
            var idx = $.inArray( tr.attr('id'), detailRows );

            if ( row.child.isShown() ) {
                tr.removeClass( 'details' );
                row.child.hide();
                detailRows.splice( idx, 1 );
            }
            else {
                tr.addClass( 'details' );
                let d = row.data()['chi_tiet_lich_trinh'];
                row.child(format(d)).show();
                if ( idx === -1 ) {
                    detailRows.push( tr.attr('id') );
                }
            }
        });
        dt.on('draw', function () {
            $.each(detailRows, function(i, id ) {
                $('#'+ id +' td.details-control').trigger('click');
            } );
        });
        function format(data) {
            console.log(data)
            let text = ``;
            let i = 1;
            for(let item of data) {
                text += `<div class="card mt-2">
                    <div class="card-body d-flex align-items-center">
                        <span class="text-center font-weight-bold" style="width: 50px">${i++}</span>
                        <div class="">
                            <span><b>Tên lịch trình: </b>${item.ten_ctlt}</span><br/>
                            <span><b>Nội dung lịch trình: </b>${item.noi_dung}</span><br/>
                            <span><b>Chi phí trung bình: </b>${item.chi_phi_trung_binh}</span><br/>
                            <span><b>Thời gian ghé thăm: </b>${item.thoi_gian_trung_binh}</span><br/>
                        </div>
                    </div>
                </div>`;
            }
            return text;
        }
        function get10WordInText(str) {
            const NUMBER_WORD_GETTING = 10;
            return str.split(" ").slice(0, NUMBER_WORD_GETTING).join(' ');
        }
    })
</script>
</body>
</html>