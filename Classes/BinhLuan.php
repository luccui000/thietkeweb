<?php

require_once base_app("Classes/BaseModel.php");
require_once base_app("Classes/TaiKhoan.php");

class BinhLuan extends BaseModel
{
    public const TRANGTHAI = [
        'dangchoduyet' => "Đang chờ duyệt",
        'daduyet' => "Đã duyệt"
    ];
    protected array $fillable = [
        'id',
        'diadiem_id',
        'noi_dung_binh_luan',
        'trang_thai',
        'ngay_tao',
        'nguoi_tao'
    ];
    public function all()
    {
        $q = "select * from {$this->table}";
        $result = $this->conn->query($q);
        if($result->num_rows > 0) {
            $taikhoan = new TaiKhoan();
            $rows = [];
            while($row = $result->fetch_assoc()) {
                array_push($rows, [
                    'id' => $row['id'],
                    'diadiem_id' => $row['diadiem_id'],
                    'noi_dung_binh_luan' => $row['noi_dung_binh_luan'],
                    'trang_thai' => $row['trang_thai'],
                    'ngay_tao' => $row['ngay_tao'],
                    'nguoi_tao' => $taikhoan->find(!is_null($row['nguoi_tao']) ? $row['nguoi_tao'] : 1)
                ]);
            }
            return $rows;
        } else {
            return [];
        }
    }
    public function danhSachBinhLuanTheo($trangthai = BinhLuan::TRANGTHAI['daduyet'])
    {
        $q = "select * from {$this->table} where trang_thai = '{$trangthai}'";
        $result = $this->conn->query($q);
        if($result->num_rows > 0) {
            $taikhoan = new TaiKhoan();
            $rows = [];
            while($row = $result->fetch_assoc()) {
                array_push($rows, [
                    'id' => $row['id'],
                    'diadiem_id' => $row['diadiem_id'],
                    'noi_dung_binh_luan' => $row['noi_dung_binh_luan'],
                    'trang_thai' => $row['trang_thai'],
                    'ngay_tao' => $row['ngay_tao'],
                    'nguoi_tao' => $taikhoan->find(!is_null($row['nguoi_tao']) ? $row['nguoi_tao'] : 1)
                ]);
            }
            return $rows;
        } else {
            return [];
        }
    }
    public function danhSachBinhLuan($diaDiemId, $trangthai = BinhLuan::TRANGTHAI['daduyet'])
    {
        $q = "select * from {$this->table} where trang_thai='{$trangthai}' AND diadiem_id=" . $diaDiemId;
        $result = $this->conn->query($q);
        if($result->num_rows > 0) {
            $taikhoan = new TaiKhoan();
            $rows = [];
            while($row = $result->fetch_assoc()) {
                array_push($rows, [
                    'id' => $row['id'],
                    'diadiem_id' => $row['diadiem_id'],
                    'noi_dung_binh_luan' => $row['noi_dung_binh_luan'],
                    'trang_thai' => $row['trang_thai'],
                    'ngay_tao' => $row['ngay_tao'],
                    'nguoi_tao' => $taikhoan->find(!is_null($row['nguoi_tao']) ? $row['nguoi_tao'] : 1)
                ]);
            }
            return $rows;
        } else {
            return [];
        }
    }
    public function duyet($id)
    {
        $trangThai = BinhLuan::TRANGTHAI['daduyet'];
        $q = "update {$this->table} set trang_thai = '{$trangThai}' where id={$id}";
        return $this->conn->query($q);
    }
    public function destroy($id)
    {
        $q = "delete from {$this->table} where id={$id}";
        return $this->conn->query($q);
    }
}