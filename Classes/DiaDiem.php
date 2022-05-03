<?php

require_once base_app("Classes/BaseModel.php");
require_once base_app("Classes/TaiKhoan.php");
require_once base_app("Helpers/DateFormat.php");
require_once base_app("Helpers/Str.php");

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
        'ngay_tao',
        'ngon_ngu'
    ];

    public function all()
    {
        $query = "select * from {$this->table} where ngon_ngu = 'vi' order by ngay_tao desc";
        $result = $this->conn->query($query);
        if($result->num_rows > 0) {
            $rows = [];
            $taikhoan = new TaiKhoan();
            while($row = $result->fetch_assoc()) {
                array_push($rows, [
                    'id' => $row['id'],
                    'hinh_anh' => image_url($row['hinh_anh']),
                    'ten_dia_diem' => $row['ten_dia_diem'],
                    'mo_ta' => $row['mo_ta'],
                    'noi_dung' => $row['noi_dung'],
                    'dia_chi' => $row['dia_chi'],
                    'iframe' => $row['iframe'],
                    'kinh_do' => $row['kinh_do'],
                    'vi_do' => $row['vi_do'],
                    'nguoi_tao' => $taikhoan->find(!is_null($row['nguoi_tao']) ? $row['nguoi_tao'] : 1),
                    'luot_xem' => $row['luot_xem'],
                    'la_noi_bat' => $row['la_noi_bat'],
                    'trang_thai' => $row['trang_thai'],
                    'ngay_tao' => DateFormat::format($row['ngay_tao']),
                    'ngon_ngu' => $row['ngon_ngu']
                ]);
            }
            return $rows;
        } else {
            return [];
        }
    }
    public function first($id)
    {
        $q = "select * from {$this->table} where id={$id} limit 1";
        $result = $this->conn->query($q);
        if($result->num_rows <= 0)
            return [];

        return $result->fetch_assoc();
    }
    public function topDiaDiem($ngonngu = 'vi')
    {
        $query = "select * from {$this->table} where la_noi_bat = 1 and ngon_ngu = '{$ngonngu}' order by ngay_tao desc limit 5";
        $result = $this->conn->query($query);
        if($result->num_rows > 0) {
            $rows = [];
            $taikhoan = new TaiKhoan();
            while($row = $result->fetch_assoc()) {
                array_push($rows, [
                    'id' => $row['id'],
                    'hinh_anh' => image_url($row['hinh_anh']),
                    'ten_dia_diem' => $row['ten_dia_diem'],
                    'mo_ta' => Str::limit($row['mo_ta'], 20),
                    'noi_dung' => $row['noi_dung'],
                    'dia_chi' => $row['dia_chi'],
                    'iframe' => $row['iframe'],
                    'kinh_do' => $row['kinh_do'],
                    'vi_do' => $row['vi_do'],
                    'nguoi_tao' => $taikhoan->find(!is_null($row['nguoi_tao']) ? $row['nguoi_tao'] : 1),
                    'luot_xem' => $row['luot_xem'],
                    'la_noi_bat' => $row['la_noi_bat'],
                    'trang_thai' => $row['trang_thai'],
                    'ngay_tao' => DateFormat::format($row['ngay_tao']),
                    'ngon_ngu' => $row['ngon_ngu']
                ]);
            }
            return $rows;
        } else {
            return [];
        }
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