<?php

require_once base_app("Classes/BaseModel.php");
require_once base_app("Classes/TaiKhoan.php");

class HinhAnh extends BaseModel
{
    public const ITEM_IN_ROW = 6;

    protected array $fillable = [
        'id',
        'ten_hinh_anh',
        'duong_dan',
        'trang_thai',
        'nguoi_tao',
        'ngay_tao'
    ];
    public function save()
    {
        try {
            $query = "INSERT INTO hinhanh(ten_hinh_anh, duong_dan, trang_thai, nguoi_tao, ngay_tao) VALUES(?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("ssiis",
                $this->ten_hinh_anh,
                $this->duong_dan,
                $this->trang_thai,
                $this->nguoi_tao,
                $this->ngay_tao
            );
            $stmt->execute();
            return true;
        } catch (Exception $ex) {
            return false;
        }
    }
    public function all()
    {
        $query = "select * from {$this->table}";
        $result = $this->conn->query($query);
        if($result->num_rows > 0) {
            $hinhanhs = [];
            $taikhoan = new TaiKhoan();
            while ($row = $result->fetch_assoc()) {
                array_push($hinhanhs, [
                    'id' => $row['id'],
                    'ten_hinh_anh' => $row['ten_hinh_anh'],
                    'duong_dan' => $row['duong_dan'],
                    'trang_thai' => $row['trang_thai'],
                    'nguoi_tao' => $taikhoan->find(!is_null($row['nguoi_tao']) ? $row['nguoi_tao'] : 1),
                    'ngay_tao' => $row['ngay_tao']
                ]);
            }
            return array_chunk($hinhanhs, HinhAnh::ITEM_IN_ROW);
        } else {
            return [];
        }
    }
    public function getForModal()
    {
        $query = "select * from {$this->table} where trang_thai = 1";
        return $this->conn->query($query);
    }

    public function first($id)
    {
        return $this->findById($id)[0];
    }
    public function find($id)
    {
        return $this->findById($id);
    }
    protected function findById($id)
    {
        $query = "select * from {$this->table} where id=" . $id;
        $result = $this->conn->query($query);
        if($result->num_rows > 0) {
            $rows = [];
            $taikhoan = new TaiKhoan();
            while($row = $result->fetch_assoc()) {
                array_push($rows, [
                    'id' => $row['id'],
                    'ten_hinh_anh' => $row['ten_hinh_anh'],
                    'duong_dan' => $row['duong_dan'],
                    'trang_thai' => $row['trang_thai'],
                    'nguoi_tao' => $taikhoan->find(!is_null($row['nguoi_tao']) ? $row['nguoi_tao'] : 1),
                    'ngay_tao' => $row['ngay_tao'],
                ]);
            }
            return $rows;
        } else {
            return [];
        }
    }
    public function destroy($id): bool
    {
        $query = "delete from hinhanh where id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        try {
            $stmt->execute();
            return true;
        } catch (Exception $ex) {
            return false;
        }
    }
}