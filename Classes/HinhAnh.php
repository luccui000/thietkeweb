<?php

require_once base_app("Classes/BaseModel.php");

class HinhAnh extends BaseModel
{
    public const ITEM_IN_ROW = 6;

    public function __construct()
    {
        parent::__construct();
    }

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
            var_dump($ex);
            return false;
        }
    }
    public function all()
    {
        $query = "select ha.id, ha.ten_hinh_anh, ha.duong_dan, ha.nguoi_tao as nguoi_tao_id, ha.ngay_tao, tk.ho_ten from hinhanh ha, taikhoan tk where ha.nguoi_tao = tk.id";
        return $this->conn->query($query);
    }
    public function getForModal()
    {
        $query = "select ha.id, ha.duong_dan, ha.nguoi_tao as nguoi_tao_id, ha.ngay_tao, tk.ho_ten from hinhanh ha, taikhoan tk where ha.nguoi_tao = tk.id and ha.trang_thai = 1";
        return $this->conn->query($query);
    }

    public function first($id)
    {
        $result = $this->findById($id);
        $result->data_seek(0);
        return $result->fetch_assoc();
    }
    public function find($id)
    {
        return $this->findById($id);
    }
    protected function findById($id)
    {
        $query = "select ha.id, ha.ten_hinh_anh, ha.duong_dan, ha.nguoi_tao as nguoi_tao_id, ha.ngay_tao, tk.ho_ten from hinhanh ha, taikhoan tk where ha.nguoi_tao = tk.id AND ha.id= {$id}";
        return $this->conn->query($query);
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