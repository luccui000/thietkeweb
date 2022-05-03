<?php

require_once base_app("Classes/BaseModel.php");
require_once base_app("Classes/TaiKhoan.php");

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
        $query = "select * from {$this->table}s";
        $result = $this->conn->query($query);
        if($result->num_rows > 0) {
            $rows = [];
            $taikhoan = new TaiKhoan();
            while($row = $result->fetch_assoc()) {
                array_push($rows, [
                    'id' => $row['id'],
                    'ten_tag' => $row['ten_tag'],
                    'nguoi_tao' => $taikhoan->find(!is_null($row['nguoi_tao']) ? $row['nguoi_tao'] : 1),
                    'mo_ta' => $row['mo_ta'],
                    'ngay_tao' => $row['ngay_tao'],
                    'trang_thai' => $row['trang_thai']
                ]);
            }
            return $rows;
        } else {
            return [];
        }
    }
}