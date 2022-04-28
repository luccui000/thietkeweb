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
    <?php include base_app('/admin/include/link.php') ?>

    <style>
        .media-name p {
            margin-bottom: 0;
            font-weight: bold;
        }
        .card-active {
            border: 1px solid blue;
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
                <div class="row mt-2">
                    <div class="col-9 d-flex justify-content-between">
                        <h5 class="text-uppercase">Danh sách hình ảnh</h5>
                        <div>
                            <label for="fuHinhAnh" class="btn btn-default them-moi">
                                Thêm mới
                            </label>
                            <button class="btn btn-danger btn-delete" >Xoá</button>
                        </div>
                    </div>
                    <div class="col-3"></div>
                </div>
                <div class="row mt-2">
                    <div class="col-9">
                        <div class="card">
                            <div class="card-body">
                                <?php include_once base_app("/admin/hinhanh/partial/content.php") ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card">
                            <h5 class="card-header">Thông tin về hình ảnh</h5>
                            <div class="card-body px-2">
                                <div class="media-detail"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="themMoiHinhAnh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="/admin/hinhanh/create.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="txtTenHinhAnh">Nhập tên hình ảnh</label>
                                    <input type="text" name="ten_hinh_anh" id="TenHinhAnh" class="form-control must-translate">
                                </div>
                                <input type="file" name="fu_hinh_anh" id="fuHinhAnh" hidden>
                                <button type="submit" class="btn btn-success float-right">Tải lên</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include base_app('/admin/include/script.php') ?>
<script>
    $(document).ready(function() {
        const fuHinhAnh = document.querySelector("input[name=fu_hinh_anh]");
        const deleteBtn = document.querySelector(".btn-delete");
        const chooseCardBtn = document.querySelectorAll(".choose-card");
        deleteBtn.addEventListener("click", handleDelete)

        fuHinhAnh.addEventListener("change", function (e) {
            console.log(e)
            $("#themMoiHinhAnh").modal('show')
        })
        function handleDelete(e) {
            if($('.card-active').length > 0) {
                const { id } = $('.card-active').find('img').data();
                $.post("/admin/hinhanh/delete.php", { id: id }, function (response) {
                    if(response.error) {
                        alert(response.message)
                    } else {
                        window.location.reload();
                    }
                })
            } else {
                alert('Vui lòng chọn ít nhất 1 hình ảnh');
            }
        }

        chooseCardBtn.forEach(card => {
            card.addEventListener("click", function () {
                document.querySelectorAll(".choose-card").forEach(c => $(c).removeClass('card-active'))
                $(card).addClass('card-active')
                const dataSet = $(card).children('img').data();
                $(".media-detail").empty();
                $(".media-detail").append(
                    `<div class="media-name">
                        <p>Đường dẫn</p>
                        <div class="input-group mb-3">
                            <input type="text" id="media-name-duongdan" class="form-control" value="${dataSet.duongdan}" >
                            <div class="input-group-append" >
                                <a class="input-group-text" id="media-name-copy" >
                                    <i class="fa fa-copy"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="media-name">
                        <p>Mã hình ảnh</p>
                        <span>${dataSet.id}</span>
                    </div>
                    <div class="media-name">
                        <p>Tên hình ảnh</p>
                        <span>${dataSet.tenhinhanh}</span>
                    </div>
                    <div class="media-name">
                        <p>Người tạo</p>
                        <span>${dataSet.hotennguoitao}</span>
                    </div>
                    <div class="media-name">
                        <p>Ngày tạo</p>
                        <span>${dataSet.ngaytao}</span>
                    </div>`
                );
            })
        })
    })
</script>
</body>
</html>