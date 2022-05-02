<?php

require_once base_app("Classes/BaseModel.php");
require_once base_app("Classes/ThongTinLichTrinh.php");
require_once base_app("Classes/TaiKhoan.php");
require_once base_app("Classes/DiaDiem.php");

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
        'trang_thai',
        'ngay_tao'
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
                    'trang_thai' => DiaDiem::TRANG_THAI[$row['trang_thai']],
                    'nguoi_tao' => $nguoiTao[0],
                    'chi_tiet_lich_trinh' => $chiTietLichTrinh,
                    'so_luong_chi_tiet_lich_trinh' => count($chiTietLichTrinh)
                ]);
            }
            return $lichtrinhs;
        } else {
            return [];
        }
    }
    public function themDanhMuc($danhmucs)
    {
        $query = "insert into danhmuc_lichtrinh(danhmuc_id, lichtrinh_id) values ";
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
    public function themChiTietLichTrinh($thongtinlichtrinh_id, $thutu)
    {
        $query = "insert into chitiet_thongtinlichtrinh(lichtrinh_id, thongtinlichtrinh_id, thu_tu) values ";
        $query .= "({$this->id}, {$thongtinlichtrinh_id}, {$thutu})";
        return $this->conn->query($query);
    }
}