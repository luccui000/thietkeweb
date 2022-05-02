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

    public function find($id): array
    {
        $query = "select * from taikhoan where id = " . $id;
        $result = $this->conn->query($query);
        if($result->num_rows > 0) {
            $taikhoans = [];
            while($row = $result->fetch_assoc()) {
                array_push($taikhoans, [
                    'id' => $row['id'],
                    'ten_dang_nhap' => $row['ten_dang_nhap'],
                    'ho_ten' => $row['ho_ten'],
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
}