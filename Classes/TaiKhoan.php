<?php

require_once base_app("Classes/BaseModel.php");

class TaiKhoan extends BaseModel
{
    public array $fillable = [
        'id',
        'ten_hien_thi',
        'mat_khau',
        'ho_ten',
        'email',
        'so_dien_thoai',
        'trang_thai',
        'ngay_tao'
    ];
    protected array $hiddenFields = ['mat_khau'];
    public function all()
    {
        $query = "select * from {$this->table}";
        $result = $this->conn->query($query);
        if($result->num_rows > 0) {
            $taikhoans = [];
            while($row = $result->fetch_assoc()) {
                array_push($taikhoans, [
                    'id' => $row['id'],
                    'ten_hien_thi' => $row['ten_hien_thi'],
                    'email' => $row['email'],
                    'so_dien_thoai' => $row['so_dien_thoai'],
                    'trang_thai' => $row['trang_thai'],
                ]);
            }
            return $taikhoans;
        } else {
            return [];
        }
    }

    public function find($id): array
    {
        $query = "select * from {$this->table} where id = " . $id;
        $result = $this->conn->query($query);
        if($result->num_rows > 0) {
            $taikhoans = [];
            while($row = $result->fetch_assoc()) {
                array_push($taikhoans, [
                    'id' => $row['id'],
                    'ten_hien_thi' => $row['ten_hien_thi'],
                    'email' => $row['email'],
                    'so_dien_thoai' => $row['so_dien_thoai'],
                    'trang_thai' => $row['trang_thai'],
                ]);
            }
            return $taikhoans;
        } else {
            return [];
        }
    }
    public function dangKy($data = [])
    {
        $this->insert($data);
    }
    public function dangNhap($data = [])
    {
        $this->where($data);
    }
    public function destroy($id)
    {
        $q = "delete from {$this->table} where id={$id}";
        return $this->conn->query($q);
    }
}