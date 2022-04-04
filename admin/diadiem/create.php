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
        .preview-img {

        }
    </style>
<body>
<div>
    <?php include "../utils/helpers.php"; ?>
    <?php include '../include/nav.php' ?>
    <div class="page-container mt-2">
        <div class="page-sidebar">
            <?php include '../include/aside.php' ?>
        </div>
        <div class="page-content">
            <form action="<?php echo url('admin/diadiem/process.create.php'); ?>" method="POST">
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
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group position-relative">
                                                        <label for="">Nhập link iframe</label>
                                                        <textarea id="Iframe" name="Iframe" class="form-control" cols="30" rows="10"></textarea>
                                                        <button type="button" class="btn position-absolute" style="top: 30px; right: 0px;" data-toggle="modal" data-target="#helpGetIframe" >
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
                                                        <textarea name="MoTa" id="MoTa" class="form-control"  cols="30" rows="10"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="">Mô tả địa điểm (bản tiếng anh)</label>
                                                        <textarea name="MoTaTiengAnh" class="form-control" id="MoTaTiengAnh" cols="30" rows="10"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div id="googlemaps-iframe"></div>
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
                                                    <input name="HinhAnhId" id="HinhAnhId" hidden value="" />
                                                    <button class="select-image btn btn-primary" type="button" data-toggle="modal" data-target="#setImageThumbnail">
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                    <div class="preview">
                                                        <img class="w-100 h-100 rounded mt-2 preview-img" src="" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="setImageThumbnail" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Chọn ảnh thumbnail</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <?php
                                        $conn = createConnection();
                                        $query = "SELECT Id, DuongDan FROM HinhAnh";
                                        $result = $conn->query($query);
                                        $rows = [];
                                    $rows = getHinhAnh($result, $rows);
                                    ?>
                                    <div class="row">

                                    </div>
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
<?php include '../include/script.php' ?>
<script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/classic/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        let editors = [];
        const DEBOUND_AJAX_TIMER = 500;
        const images = document.querySelectorAll(".hinhanh");
        createEditor('#MoTa', '')
        createEditor('#MoTaTiengAnh', '')

        $("#btnDichBai").click(handleDichDiaDiem)
        images.forEach(image => image.addEventListener("click", handleSetImageThumbnail));
        $("#Iframe").keyup(window.deboundAjax(handleGetGeoGraphicIframe, DEBOUND_AJAX_TIMER))

        function createEditor(elementId, data)  {
            return ClassicEditor
                .create(document.querySelector(elementId))
                .then(editor => {
                    editors[elementId] = editor;
                    editor.setData(data);
                    editors[elementId].model.document.on('change:data', function () {
                        $(elementId).text(editors[elementId].getData())
                    })
                })
                .catch(err => console.error(err));
        }
        function handleDichDiaDiem() {
            const translateTenDiaDiem = $.ajax({
                url: "<?php echo url('admin/services/translate.php') ?>",
                type: "POST",
                data: {
                    text: $("#TenDiaDiem").val()
                }
            })
            const translateMoTa = $.ajax({
                url: "<?php echo url('admin/services/translate.php') ?>",
                type: "POST",
                data: {
                    text: $(`#MoTa`).val()
                }
            })
            $.when(translateTenDiaDiem, translateMoTa).done(function (res1, res2) {
                if(res1[1] == 'success') {
                    $("#TenDiaDiemTiengAnh").val(res1[0]);
                }
                if(res2[1] == 'success') {
                    $("#MoTaTiengAnh").val(res2[0]);
                }
            })
        }
        function handleGetGeoGraphicIframe() {
            const iframeVal = $("#Iframe").val();
            const pattern = /2d\d{1,10}.\d{1,20}!3d\d{1,10}.\d{1,20}/;
            const reg = new RegExp(pattern);
            if (iframeVal !== null || iframeVal !== "") {
                const matches = reg.exec(iframeVal);
                const splited = matches[0].split('!');
                if (splited.length > 1) {
                    const longtitude = splited[0].replace('2d', '');
                    const latitude = splited[1].replace('3d', '');
                    $(`#KinhDo`).val(latitude);
                    $(`#ViDo`).val(longtitude);
                }
            }
        }
        function handleSetImageThumbnail(e) {
            let imageSelected = {
                id: e.target.dataset.id,
                src: e.target.src
            };
            console.log(imageSelected)
            $("#setImageThumbnail").modal("hide");

            $(".select-image i").css("color", "#fff");
            $("#HinhAnhId").val(imageSelected.id);
            $(".preview-img").attr('src', imageSelected.src);
        }
    })
</script>
</body>
</html>