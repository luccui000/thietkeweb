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
    <link rel="stylesheet" href="<?php url('/assets/dist/magic-suggest/css/magicsuggest.css') ?>">
    <style>
        ul {
            margin: 0;
            padding: 0;
            list-style-type: none;
        }
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
        .card-active {
            outline: 2px solid #777777;
        }
        .ms-ctn-focus{
            border-color: #86b7fe;
            /* outline: 0; */
            -webkit-box-shadow: none;
            /* box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, .6); */
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
            <form action="<?php url('admin/diadiem/post.create.php'); ?>" method="POST">
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
                                                <input name="ten_dia_diem" class="form-control must-translate" type="text" placeholder="Tên địa điểm" id="TenDiaDiem">
                                            </div>
                                            <div class="form-group">
                                                <label for="ten_dia_diem_tieng_anh">Tên địa điểm (bản tiếng anh)</label>
                                                <input name="ten_dia_diem_tieng_anh" type="text" class="form-control" placeholder="Tên địa điểm (bản tiếng anh)" id="ten_dia_diem_tieng_anh">
                                            </div>
                                            <div class="form-group">
                                                <label for="mo_ta">Mô tả ngắn</label>
                                                <textarea name="mo_ta" id="mo_ta" class="form-control must-translate" placeholder="Mô tả ngắn" ></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="mo_ta_tieng_anh">Mô tả ngắn (bản tiếng anh)</label>
                                                <textarea name="mo_ta_tieng_anh" id="mo_ta_tieng_anh" class="form-control" placeholder="Mô tả ngắn" ></textarea>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group position-relative">
                                                        <label for="iframe">Nhập link iframe</label>
                                                        <textarea id="iframe" name="iframe" class="form-control" cols="30" rows="10"></textarea>
                                                        <button type="button" class="btn position-absolute" data-toggle="modal" data-target="#helpGetIframe" style="top: 30px; right: 0px;" >
                                                            <i class="fa fa-circle-question"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="kinh_do">Kinh độ</label>
                                                        <input name="kinh_do" id="kinh_do" class="form-control" >
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="vi_do">Vĩ độ</label>
                                                        <input name="vi_do" id="vi_do" class="form-control" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="dia_chi">Địa chỉ</label>
                                                        <input name="dia_chi" id="dia_chi" class="form-control" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="noi_dung">Nội dung</label>
                                                        <textarea name="noi_dung" id="noi_dung" class="form-control must-translate editor"  cols="30" rows="10"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="noi_dung_tieng_anh">Nội dung (bản tiếng anh)</label>
                                                        <textarea name="noi_dung_tieng_anh" class="form-control editor" id="noi_dung_tieng_anh" cols="30" rows="10"></textarea>
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
                                            <button type="button" id="btn_dich_bai" class="btn btn-primary">Dịch bài</button>
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
                                                    <input name="hinhanh" id="inp_hinhanh" hidden value="" />
                                                    <button type="button" class="open-hinhanh" data-toggle="modal" data-target="#setImageThumbnail">
                                                        Chọn hình ảnh
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <div class="card">
                                        <h5 class="card-header">Chọn tags</h5>
                                        <div class="card-body">
                                            <input type="hidden" name="tags[]" id="inp_tag" >
                                            <div id="tags"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <div class="card">
                                        <h5 class="card-header">Trạng thái</h5>
                                        <div class="card-body">
                                            <select name="trang_thai" class="form-control custom-select">
                                                <?php
                                                    require_once base_app("Classes/DiaDiem.php");
                                                    foreach (DiaDiem::TRANG_THAI as $key => $value) {
                                                        echo "<option value='{$key}'>" . $value ."</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <div class="card">
                                        <h5 class="card-header">Danh mục cho bài viết</h5>
                                        <div class="card-body">
                                            <input type="hidden" id="danhmuc" name='danhmuc'>
                                            <?php
                                                require_once base_app("Classes/DanhMuc.php");
                                                $danhmuc = new DanhMuc();
                                                $result = $danhmuc->hierarchicalTree();
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <div class="card">
                                        <h5 class="card-header">Địa điểm nổi bật</h5>
                                        <div class="card-body">
                                            <div class="form-check">
                                                <input name="la_noi_bat" id="la_noi_bat" type="checkbox" value="1" class="form-check-input">
                                                <label for="la_noi_bat" class="form-check-label">Là nổi bật</label>
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
                                            <?php include_once base_app("/admin/hinhanh/partial/content.php") ?>
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
                                    <button type="button" class="btn btn-primary float-right btn-insert">Chọn</button>
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
<script src="<?php echo url('/assets/dist/magic-suggest/js/magicsuggest.js'); ?>"></script>
<script>
    $(document).ready(function() {
        const textEditors = document.querySelectorAll(".editor");
        const hinhanhs = document.querySelectorAll(".hinhanh");
        const btnInsert = document.querySelector(".btn-insert");
        const danhmucs = document.querySelectorAll(".select-danhmuc");
        const danhmucPost = document.querySelector("#danhmuc");
        const btnDichBai = document.querySelector("#btn_dich_bai");
        const dichTexts = document.querySelectorAll(".must-translate");
        let editors = [];
        let selectedData;

        $.get("/api/tag/getData.php", function(response) {
            if(!response.error) {
                let tags = $('#tags').magicSuggest({
                    placeholder: "Chọn tags cho bài viết",
                    data: response.data,
                    valueField: "id",
                    displayField: "ten_tag",
                    mode: "remote",
                    render: function(data) {
                        return `<div data-id='${data.id}'>${data.ten_tag}</div>`
                    }
                });
                $(tags).on('selectionchange', function () {
                    $("#inp_tag").val(this.getValue());
                })
            }
        })
        danhmucs.forEach(danhmucInp => {
            danhmucInp.addEventListener("change", function () {
                if($(danhmucPost).val() == "") {
                    $(danhmucPost).val(`[${$(danhmucInp).val()}]`);
                } else {
                    let danhmucPostVal = [...eval($(danhmucPost).val())];
                    const index = danhmucPostVal.indexOf(eval($(danhmucInp).val()));
                    if(index > -1) {
                        danhmucPostVal.splice(index, 1);
                    } else {
                        danhmucPostVal.push($(danhmucInp).val());
                    }
                    $(danhmucPost).val(`[${[...danhmucPostVal]}]`);
                }
            })
        })
        btnInsert.addEventListener("click", function () {
            if(selectedData === undefined) {
                alert("Vui lòng chọn ít nhất 1 hình ảnh")
            } else {
                $("#setImageThumbnail").modal("hide");
                $("#inp_hinhanh").val(selectedData.id);
                $(".preview").css('background-image', `url(${selectedData.duongdan})`);
            }
        })
        textEditors.forEach(editor => {
            createEditor(editor, 'hello');
        })
        hinhanhs.forEach(hinhanh => {
            hinhanh.addEventListener("click", function () {
                selectImage(hinhanh);
                if($(hinhanh).data() !== undefined) {
                    selectedData = $(hinhanh).data();
                    const { id, duongdan, tenhinhanh, nguoitaoid, hotennguoitao, ngaytao } = $(hinhanh).data();
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
                }
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
                        $(element).val(editors[$(element).attr('name')].getData())
                    })
                }).catch(err => console.error(err));
        }
        function selectImage(element) {
            document.querySelectorAll(".choose-card").forEach(choose => $(choose).removeClass('card-active'))
            $(element).parent('div').addClass('card-active');
        }
        btnDichBai.addEventListener("click", function () {
            let translateTexts = [];
            dichTexts.forEach(text => {
                let div = document.createElement("div");
                div.innerHTML = $(text).val();
                let sanitizedText = div.textContent || div.innerText;
                translateTexts.push(sanitizedText)
            })
            const ajaxTranslateAPIs = translateTexts.map(t => callTranslateApi(t));
            Promise.all([...ajaxTranslateAPIs]).then(response => {
                if(!response[0].error) {
                    $("#ten_dia_diem_tieng_anh").val(response[0].data)
                }
                if(!response[1].error) {
                    $("#mo_ta_tieng_anh").val(response[1].data)
                }
                if(!response[2].error) {
                    $("#noi_dung_tieng_anh").text(response[0].data)
                    editors['noi_dung_tieng_anh'].setData(response[2].data);
                }
            })
        })
        function callTranslateApi(input) {
            let data = { 'text': input };
            return fetch("/api/translate/translate.php", {
                method: "POST",
                mode: "cors",
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            }).then(response => response.json())
        }
    })
</script>
</body>
</html>