<?php require_once "../../connect.php"; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thêm mới lịch trình</title>
    <?php include base_app('admin/include/link.php') ?>
    <?php include base_app('admin/include/script.php') ?>
    <link rel="stylesheet" href="<?php url("assets/dist/datetimepicker/build/jquery.datetimepicker.min.css"); ?>" >
    <link rel="stylesheet" href="<?php url("assets/dist/jquery-ui/jquery-ui.css"); ?>" >
<body>
<div>
    <?php require base_app('admin/utils/helpers.php') ?>
    <?php include base_app('admin/include/nav.php') ?>
    <div class="page-container mt-2">
        <div class="page-sidebar">
            <?php include base_app('admin/include/aside.php') ?>
        </div>
        <div class="page-content">
            <form>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-9">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <h5 class="card-header">Thêm mới lịch trình</h5>
                                        <div class="card-body p-2">
                                            <div class="form-group">
                                                <label for="ten_lich_trinh">Tên lịch trình</label>
                                                <input name="ten_lich_trinh" id="ten_lich_trinh" class="form-control" type="text" placeholder="Tên lịch trình" >
                                            </div>
                                            <div class="form-group">
                                                <label for="thoi_gian_khoi_hanh">Chọn thời gian khởi hành</label>
                                                <input name="thoi_gian_khoi_hanh" id="thoi_gian_khoi_hanh" class="form-control" placeholder="Chọn thời gian khởi hành" >
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="dia_chi_khoi_hanh">Nhập địa chỉ khởi hành</label>
                                                        <input name="dia_chi_khoi_hanh" id="dia_chi_khoi_hanh" class="form-control" placeholder="Nhập địa chỉ khởi hành" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-12">
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#chiTietLichTrinh">Thêm chi tiết lịch trình</button>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-12">
                                                    <div id="danh_sach_chi_tiet_lich_trinh">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="chiTietLichTrinh" role="dialog" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Thông tin chi tiết lịch trình</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="form_chi_tiet_lich_trinh">
                                            <div class="form-group">
                                                <label for="ten_ctlt">Tên chi tiết lịch trình</label>
                                                <input name="ten_ctlt" id="ten_ctlt" class="form-control"  type="text" placeholder="Tên chi tiết lịch trình" >
                                            </div>
                                            <div class="form-group">
                                                <label for="noi_dung">Nội dung lịch trình</label>
                                                <textarea name="noi_dung" id="noi_dung" class="form-control" placeholder="Nội dung lịch trình"></textarea>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="chi_phi_trung_binh">Chi phí trung bình</label>
                                                        <input name="chi_phi_trung_binh" id="chi_phi_trung_binh" class="form-control" placeholder="Chi phí trung bình" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="thoi_gian_trung_binh">Thời gian trung bình</label>
                                                        <input name="thoi_gian_trung_binh" id="thoi_gian_trung_binh" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" id="luu_chi_tiet_lich_trinh" class="w-25 btn btn-primary">Lưu</button>
                                        </form>
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
                                            <button type="button" id="luu_lich_trinh" class="btn btn-success">Lưu và tiếp tục</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <div class="card">
                                        <h5 class="card-header">Trạng thái</h5>
                                        <div class="card-body">
                                            <select name="trang_thai" id="trang_thai" class="form-control custom-select">
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
                                                (new DanhMuc())->hierarchicalTree();
                                            ?>
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
<?php include base_app('admin/include/script.php'); ?>
<script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/classic/ckeditor.js"></script>
<script src="<?php url("assets/dist/datetimepicker/build/jquery.datetimepicker.full.js"); ?>"></script>
<script src="<?php url("assets/dist/jquery-ui/jquery-ui.js") ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
<script>
    $(document).ready(function() {
        // Ctlt: Chi tiết lịch trình
        const btnCtlt = document.querySelector("#luu_chi_tiet_lich_trinh");
        const btnLuuLichTrinh = document.querySelector("#luu_lich_trinh");
        const danhSachCtlt = $("#danh_sach_chi_tiet_lich_trinh");
        const danhmucs = document.querySelectorAll(".select-danhmuc");
        const danhmucPost = document.querySelector("#danhmuc");
        let chiTietLichTrinh = [];

        jQuery.datetimepicker.setLocale('vi');
        $("#thoi_gian_khoi_hanh").datetimepicker({
            format: "d/m/Y H:i"
        });
        $("#thoi_gian_trung_binh").datetimepicker({
            datepicker: false,
            step: 10,
            format: "H:i",
            defaultTime: "01:00"
        })
        btnLuuLichTrinh.addEventListener("click", function (e) {
            e.preventDefault();
            let ten_lich_trinh = $("#ten_lich_trinh").val();
            let thoi_gian_khoi_hanh = $("#thoi_gian_khoi_hanh").val();
            let dia_chi_khoi_hanh = $("#dia_chi_khoi_hanh").val();
            let danh_mucs = $(danhmucPost).val();
            let trang_thai = $("#trang_thai").children("option:selected").val();
            let data = {
                ten_lich_trinh: ten_lich_trinh,
                thoi_gian_khoi_hanh: thoi_gian_khoi_hanh,
                dia_chi_khoi_hanh: dia_chi_khoi_hanh,
                danh_mucs: danh_mucs,
                trang_thai: trang_thai,
                chi_tiet_lich_trinh: chiTietLichTrinh
            };
            fetch("/admin/lichtrinh/post.create.php", {
                method: "POST",
                mode: "cors",
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            }).then(response => response.json())
            .then(response => {
                console.log(response);
            })
        })
        btnCtlt.addEventListener("click", function(e) {
            e.preventDefault();
            const ten_ctlt = $("#ten_ctlt").val();
            const noi_dung = $("#noi_dung").val();
            const chi_phi_trung_binh = $("#chi_phi_trung_binh").val();
            const thoi_gian_trung_binh = $("#thoi_gian_trung_binh").val();
            let errorBags = "";
            let isOk = true;
            if(ten_ctlt.trim() === "") {
                errorBags += "tên chi tiết lịch trình, "
                isOk = false;
            }
            if(chi_phi_trung_binh.trim() === "") {
                errorBags += "chí phí trung bình lịch trình, "
                isOk = false;
            }
            if(thoi_gian_trung_binh.trim() === "") {
                errorBags += "chí phí trung bình lịch trình, "
                isOk = false;
            }
            if(!isOk) {
                alert(`Vui lòng nhập đầy đủ thông tin ${errorBags}`);
            } else {
                const id = generateIdDanhSachCtlt(ten_ctlt)
                let index = chiTietLichTrinh.findIndex(e => e.id === id);

                if(index >= 0) {
                    alert("Tên địa điểm bị trùng")
                } else {
                    const idx = chiTietLichTrinh.length + 1;
                    chiTietLichTrinh.push({
                        id: id,
                        props: {
                            idx: idx,
                            ten_ctlt,
                            noi_dung,
                            chi_phi_trung_binh,
                            thoi_gian_trung_binh,
                            thu_tu: idx
                        }
                    });
                    const thuTu = chiTietLichTrinh.findIndex(i => i.id === id);

                    $(danhSachCtlt).append(`
                        <li class="card mt-2" data-thu_tu="${chiTietLichTrinh[thuTu].props.thu_tu}" data-id="${id}" data-ten_ctlt="${ten_ctlt}" >
                            <div class="card-body d-flex align-items-center">
                                <span class="text-center font-weight-bold" style="width: 50px">${chiTietLichTrinh[thuTu].props.thu_tu}</span>
                                <div class="">
                                    <span><b>Tên lịch trình: </b>${ten_ctlt}</span><br/>
                                    <span><b>Nội dung lịch trình: </b>${get10WordInText(noi_dung)}</span><br/>
                                    <span><b>Chi phí trung bình: </b>${chi_phi_trung_binh}</span><br/>
                                    <span><b>Thời gian ghé thăm: </b>${thoi_gian_trung_binh}</span><br/>
                                </div>
                            </div>
                        </li>
                    `);
                }
            }
        });
        danhSachCtlt.sortable();
        danhSachCtlt.on("sortstop", function(event, ui) {
            let chiTietLichTrinhOrder = [];
            Array.from($(this).children()).forEach(e => {
                chiTietLichTrinhOrder.push(e.dataset.id);
            })
            changeOrderPlanning(chiTietLichTrinhOrder);
            console.log(chiTietLichTrinh)
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
        function changeOrderPlanning(order) {
            chiTietLichTrinh = order.map(item => {
                const idx = chiTietLichTrinh.findIndex(i => i.id === item);
                return {
                    id: item,
                    props: chiTietLichTrinh[idx].props
                }
            })
        }
        function get10WordInText(str) {
            const NUMBER_WORD_GETTING = 10;
            return str.split(" ").slice(0, NUMBER_WORD_GETTING).join(' ');
        }
        function generateIdDanhSachCtlt(str) {
            let removedVietNamTones = window.removeVietNamTones(str);
            return removedVietNamTones.split(" ").map(e => e.toLowerCase()).join("_")
        }
    })
</script>
</body>
</html>