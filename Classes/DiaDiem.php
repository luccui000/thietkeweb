<?php

require_once base_app("Classes/BaseModel.php");
require_once base_app("Helpers/DateFormat.php");

class DiaDiem extends BaseModel
{
    const TRANG_THAI = [
        'congbo' => 'Công bố',
        'dangchoduyet' => 'Đang chờ duyệt',
        'banthao' => 'Bản thảo'
    ];
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
    public function themDanhMuc($danhmucs)
    {
        $query = "insert into danhmuc_diadiem(danhmuc_id, diadiem_id) values ";
        if(is_array($danhmucs)) {
            foreach ($danhmucs as $danhmuc) {
                $query .= "({$this->id}, {$danhmuc}),";
            }
        } else {
            $query .= "({$this->id}, {$danhmucs}),";
        }
        $query = trim($query, ",");
        return $this->conn->query($query);
    }
    public function themTag($tags)
    {
        $query = "insert into diadiem_tags(diadiem_id, tag_id) values";
        if(is_array($tags)) {
            foreach ($tags as $tag) {
                $query .= "({$this->id}, {$tag}),";
            }
        } else {
            $query .= "({$this->id}, {$tags}),";
        }
        $query = trim($query, ",");
        return $this->conn->query($query);
    }
}