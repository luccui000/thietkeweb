<?php

require_once base_app("Classes/BaseModel.php");

class DiaDiem extends BaseModel
{
    public array $fillable = [
        'id',
        'hinh_anh',
        'ten_dia_diem',
        'mo_ta',
        'noi_dung',
        'iframe',
        'kinh_do',
        'vi_do',
        'dia_chi',
        'nguoi_tao',
        'luot_xem',
        'la_noi_bat',
        'trang_thai',
        'ngay_tao'
    ];
    public function all()
    {
        $query = "select dd.id, dd.ten_dia_diem, dd.mo_ta, dd.noi_dung, dd.la_noi_bat, dd.luot_xem, dd.trang_thai, dd.hinh_anh, dd.iframe, dd.kinh_do, dd.vi_do, dd.dia_chi, dd.ngay_tao, dd.nguoi_tao as nguoi_tao_id, tk.ho_ten from diadiem dd, taikhoan tk where dd.nguoi_tao = tk.id";
        return $this->conn->query($query);
    }
}