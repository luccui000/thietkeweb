<?php require_once "../../connect.php"; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thêm mới địa điểm</title>
    <?php include base_app('admin/include/link.php') ?>
    <?php include base_app('admin/include/script.php') ?>
    <style>
        .ck-editor__editable {
            min-height: 300px;
        }
        .preview {
            width: 100%;
            height: 200px;
            border: 1px solid #ccc;
            position: relative;
            object-fit: cover;
            object-position: left;
            border-radius: 4px;
        }
        .preview-remove {
            width: 30px;
            height: 30px;
            position: absolute;
            top: 5px;
            right: 5px;
            border: 1px solid #ccc;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .open-hinhanh {
            color: #0d6efd;
            cursor: pointer;
            border: 1px solid transparent;
            background-color: #fff;
        }
        .preinsert {
            width: 100%;
            height: 200px;
        }
        .media-name {
            margin-bottom: 1rem;
        }
        .media-name p{
            margin-bottom: 0;
            font-weight: bold;
        }
    </style>
<body>
<div>
    <?php require base_app('admin/utils/helpers.php') ?>
    <?php include base_app('admin/include/nav.php') ?>
    <div class="page-container mt-2">
        <div class="page-sidebar">
            <?php include base_app('admin/include/aside.php') ?>
        </div>
        <div class="page-content">
            <form action="<?php url('admin/diadiem/process.create.php'); ?>" method="POST">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-9">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <h5 class="card-header">Thêm mới thông tin địa điểm</h5>
                                        <div class="card-body p-2">
                                            <div class="form-group">
                                                <label for="txtTenDiaDiem">Tên địa điểm</label>
                                                <input name="TenDiaDiem" class="form-control" type="text" placeholder="Tên địa điểm" id="TenDiaDiem">
                                            </div>
                                            <div class="form-group">
                                                <label for="TenDiaDiemTiengAnh">Tên địa điểm (bản tiếng anh)</label>
                                                <input name="TenDiaDiemTiengAnh" type="text" class="form-control" placeholder="Tên địa điểm (bản tiếng anh)" id="TenDiaDiemTiengAnh">
                                            </div>
                                            <div class="form-group">
                                                <label for="MoTaNgan">Mô tả ngắn</label>
                                                <textarea name="MoTaNgan" id="MoTaNgan" class="form-control" placeholder="Mô tả ngắn" ></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="MoTaNganTiengAnh">Mô tả ngắn (bản tiếng anh)</label>
                                                <textarea name="MoTaNganTiengAnh" id="MoTaNganTiengAnh" class="form-control" placeholder="Mô tả ngắn" ></textarea>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group position-relative">
                                                        <label for="">Nhập link iframe</label>
                                                        <textarea id="Iframe" name="Iframe" class="form-control" cols="30" rows="10"></textarea>
                                                        <button type="button" class="btn position-absolute" data-toggle="modal" data-target="#helpGetIframe" style="top: 30px; right: 0px;" >
                                                            <i class="fa fa-circle-question"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="">Kinh độ</label>
                                                        <input name="KinhDo" id="KinhDo" class="form-control" >
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="">Vĩ độ</label>
                                                        <input name="ViDo" id="ViDo" class="form-control" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="">Địa chỉ</label>
                                                        <input name="DiaChi" id="DiaChi" class="form-control" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="">Mô tả địa điểm</label>
                                                        <textarea name="MoTa" id="MoTa" class="form-control editor"  cols="30" rows="10"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="">Mô tả địa điểm (bản tiếng anh)</label>
                                                        <textarea name="MoTaTiengAnh" class="form-control editor" id="MoTaTiengAnh" cols="30" rows="10"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <h5 class="card-header">Hành động</h5>
                                        <div class="card-body">
                                            <button type="button" id="btnDichBai" class="btn btn-primary">Dịch bài</button>
                                            <button id="btnSaveAndContinue" class="btn btn-success">Lưu và tiếp tục</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <div class="card">
                                        <h5 class="card-header">Thêm ảnh bìa</h5>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="preview">
                                                        <button type="button" class="preview-remove">
                                                            <i class="fa fa-close"></i>
                                                        </button>
                                                    </div>
                                                    <input name="HinhAnhId" hidden value="" />
                                                    <button type="button" class="open-hinhanh" data-toggle="modal" data-target="#setImageThumbnail">
                                                        Launch demo modal
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="setImageThumbnail" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-custom" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Chọn ảnh thumbnail</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body mx-auto">
                                    <div class="row">
                                        <div class="col-9" style="max-height: 90%; overflow-y: scroll">
                                            <?php
                                                require base_app("Classes/HinhAnh.php");
                                                $result = (new HinhAnh())->getForModal();
                                                if($result->num_rows > 0) {
                                                    $hinhanhs = [];
                                                    while ($row = $result->fetch_array()) {
                                                        array_push($hinhanhs, $row);
                                                    }
                                                    $hinhanhs = array_chunk($hinhanhs, 4);
                                                    foreach ($hinhanhs as $parent) {
                                                        echo "<div class='row'>";
                                                        foreach ($parent as $child) {
                                                            echo "<div class='col-". 12 / HinhAnh::ITEM_IN_ROW ." mt-2 cursor-pointer'>";
                                                            echo    "<div class='card'>";
                                                            echo        "<img class='w-100 rounded hinhanh' style='height: 155px'";
                                                            echo            "src='". $child["DuongDan"] ."'";
                                                            echo            "alt='". $child["TenHinhAnh"] ."'";
                                                            echo            "data-id='". $child["Id"] ."'";
                                                            echo            "data-tenhinhanh='". $child["TenHinhAnh"] ."'";
                                                            echo            "data-duongdan='". $child["DuongDan"] ."'";
                                                            echo            "data-ngaytao='". $child["NgayTao"] ."'";
                                                            echo            "data-nguoitaoid='". $child["NguoiTaoId"] ."'";
                                                            echo            "data-hotennguoitao='". $child["HoTenNguoiTao"] ."'";
                                                            echo        ">";
                                                            echo        "<div class='card-body'>";
                                                            echo            "<div class='card-text text-center'>" . $child["Id"] . "</div>";
                                                            echo        "</div>";
                                                            echo    "</div>";
                                                            echo "</div>";
                                                        }
                                                        echo "</div>";
                                                    }
                                                }
                                            ?>
                                        </div>
                                        <div class="col-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="preinsert"></div>
                                                    <div class="image-detail"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-secondary">Chọn</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="helpGetIframe" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Hướng dẫn lấy iframe địa điểm</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <p><b>Bước 1: </b>Vào <a href="https://www.google.com/maps">Google Maps</a> tìm kiếm địa điểm</p>
                                            <img class="w-100" src="<?php echo BASE_URL . 'assets/images/modal/NhapDiaDiem.png';?>" alt="Alternate Text" />
                                            <p class="mt-2"><b>Bước 2: </b>Ấn vào địa điểm hiển thị trên bản đồ, sau đó chọn nút share bên trái</p>
                                            <img class="w-100" src="<?php echo BASE_URL . 'assets/images/modal/NhanVaoNutShare.png';?>" alt="Alternate Text" />
                                            <p class="mt-2"><b>Bước 3: </b>Hộp thoại xuất hiện, bạn chọn Embed a map, sau đó nhấn vào chữ Copy Link để sao chép iframe</p>
                                            <img class="w-100" src="<?php echo BASE_URL . 'assets/images/modal/LayIFrame.png';?>" alt="Alternate Text" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/classic/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        let editors = [];
        let selectedHinhAnhId;
        document.querySelectorAll(".editor").forEach(editor => {
            createEditor(editor, 'hello');
        })
        document.querySelectorAll(".hinhanh").forEach(hinhanh => {
            hinhanh.addEventListener("click", function () {
                const { id, duongdan, tenhinhanh, nguoitaoid, hotennguoitao, ngaytao } = $(hinhanh).data();
                selectedHinhAnhId = id;
                // $(".preview").css('background-image', `url(${duongdan})`);
                $(".preinsert").css('background-image', `url(${duongdan})`);
                $(".image-detail").empty();
                $(".image-detail").append(
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
                        <p>Tên hình ảnh</p>
                        <span>${tenhinhanh}</span>
                    </div>
                    <div class="media-name">
                        <p>Người tạo</p>
                        <span>${hotennguoitao}</span>
                    </div>
                    <div class="media-name">
                        <p>Ngày tạo</p>
                        <span>${ngaytao}</span>
                    </div>`
                );
                $("input[name=HinhAnhId]").val(id)
            })
        })
        //////
        function createEditor(element, data)  {
            ClassicEditor
                .create(element)
                .then(editor => {
                    editors[$(element).attr('name')] = editor;
                    editor.setData(data);
                    editors[$(element).attr('name')].model.document.on('change:data', function () {
                        console.log(editors[$(element).attr('name')].getData())
                    })
                }).catch(err => console.error(err));
        }
    })
</script>
</body>
</html>