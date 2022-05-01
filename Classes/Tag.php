<?php

require_once base_app("Classes/BaseModel.php");

class Tag extends BaseModel
{
    public array $fillable = [
        'id',
        'ten_tag',
        'nguoi_tao',
        'mo_ta',
        'ngay_tao',
        'trang_thai'
    ];
    public function all()
    {
        $query = "select t.id, t.ten_tag, t.mo_ta, t.trang_thai, t.ngay_tao, tk.id as nguoi_tao_id, tk.ho_ten from tags t, taikhoan tk where t.nguoi_tao = tk.id";
        return $this->conn->query($query);
    }
    public function insert()
    {

    }
}