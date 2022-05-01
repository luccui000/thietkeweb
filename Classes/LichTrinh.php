<?php

require_once base_app("Classes/BaseModel.php");
require_once base_app("Classes/ThongTinLichTrinh.php");
require_once base_app("Classes/TaiKhoan.php");

class LichTrinh extends BaseModel
{
    protected array $fillable = [
        'id',
        'danhmuc_id',
        'ten_lich_trinh',
        'thoi_gian_khoi_hanh',
        'dia_chi_khoi_hanh',
        'nguoi_tao',
        'thu_tu',
        'trang_thai'
    ];
    public function all()
    {
        $query = "select * from lichtrinh";
        $result = $this->conn->query($query);

        if($result->num_rows > 0) {
            $lichtrinhs = [];
            while($row = $result->fetch_assoc()) {
                $chiTietLichTrinh = (new ThongTinLichTrinh())->find($row['id']);
                $nguoiTao = (new TaiKhoan())->find($row['nguoi_tao']);
                array_push($lichtrinhs, [
                    'id' => $row['id'],
                    'ten_lich_trinh' => $row['ten_lich_trinh'],
                    'thoi_gian_khoi_hanh' => $row['thoi_gian_khoi_hanh'],
                    'dia_chi_khoi_hanh' => $row['dia_chi_khoi_hanh'],
                    'thu_tu' => $row['thu_tu'],
                    'trang_thai' => $row['trang_thai'],
                    'nguoi_tao' => $nguoiTao[0],
                    'chi_tiet_lich_trinh' => $chiTietLichTrinh
                ]);
            }
            return $lichtrinhs;
        } else {
            return [];
        }
    }
}