<?php
require_once base_app("Classes/BaseModel.php");
require_once base_app("Helpers/DateFormat.php");

class GheTham extends BaseModel
{
    protected array $fillable = [
        'id',
        'ngay_tao',
        'so_luong',
        'so_luong_xem_dia_diem'
    ];
    public function all()
    {
        $query = "select * from ghetham order by ngay_tao desc limit 7";
        $result = $this->conn->query($query);
        if($result->num_rows > 0) {
            $rows = [];
            while($row = $result->fetch_assoc()) {
                array_push($rows, [
                    'id' => $row['id'],
                    'ngay_tao' =>  DateFormat::format($row['ngay_tao']),
                    'so_luong' => $row['so_luong'],
                    'so_luong_xem_dia_diem' => $row['so_luong_xem_dia_diem']
                ]);
            }
            return $rows;
        } else {
            return [];
        }
    }
    public function themTruyCapWeb()
    {
        $date = date("Y/m/d");
        $q = "select * from {$this->table} where ngay_tao = '{$date}'";

        $result = $this->conn->query($q);
        if($result->num_rows > 0) {
            $qUpdate = "update {$this->table} set so_luong = so_luong + 1 where ngay_tao = '{$date}'";
            return $this->conn->query($qUpdate);
        } else {
            return $this->insert([
                'ngay_tao' => $date,
                'so_luong' => 1,
                'so_luong_xem_dia_diem' => 0
            ]);
        }
    }
    public function themTruyCapDiaDiem()
    {
        $date = date("Y/m/d");
        $q = "select * from {$this->table} where ngay_tao = '{$date}'";

        $result = $this->conn->query($q);
        if($result->num_rows > 0) {
            $qUpdate = "update {$this->table} set so_luong_xem_dia_diem = so_luong_xem_dia_diem + 1 where ngay_tao = '{$date}'";
            return $this->conn->query($qUpdate);
        } else {
            return $this->insert([
                'ngay_tao' => $date,
                'so_luong' => 0,
                'so_luong_xem_dia_diem' => 1
            ]);
        }
    }
    public function tongSoLuotTruyCap()
    {
        $q = "select sum(so_luong) as tong_so_luot_truy_cap from {$this->table}";
        $result = $this->conn->query($q);
        if($result->num_rows > 0) {
            return $result->fetch_assoc()['tong_so_luot_truy_cap'];
        } else {
            return 0;
        }
    }
    public function soKhachGheTrongNgay()
    {
        $date = date("Y/m/d");
        $q = "select so_luong from {$this->table} where ngay_tao = '{$date}' limit 1";
        $result = $this->conn->query($q);

        if($result->num_rows > 0) {
            return $result->fetch_assoc()['so_luong'];
        } else {
            return 0;
        }
    }
}