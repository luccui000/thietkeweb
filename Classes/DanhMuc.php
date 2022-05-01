<?php

require_once base_app("Classes/BaseModel.php");

class DanhMuc extends BaseModel implements RecursiveIterator
{
    public string $table = "danhmuc";
    private string $iddanhmuc;
    private string $tendanhmuc;
    private $danhmucs = [];
    private $currentIndex = 0;
    private $danhmucon = null;

    public array $fillable = [
        'id',
        'thu_tu',
        'la_noi_bat',
        'ten_danh_muc',
        'danh_muc_cha',
        'mo_ta',
        'icon',
        'trang_thai',
        'ngay_tao'
    ];
    public function __construct($idDanhMuc = 0, $tenDanhMuc = '')
    {
        parent::__construct();
        $this->tendanhmuc = $tenDanhMuc;
        $this->iddanhmuc = $idDanhMuc;
    }

    public function all()
    {
        $query = "select * from danhmuc";
        return $this->conn->query($query);
    }
    public function getTenDanhMuc()
    {
        return $this->tendanhmuc;
    }
    public function getIdDanhMuc()
    {
        return $this->iddanhmuc;
    }
    public function hierarchicalTree()
    {
        $query  = "select d1.id as idMuc1, d1.ten_danh_muc as muc1, d2.id as idMuc2, d2.ten_danh_muc as muc2 ";
        $query .= " from danhmuc as d1 ";
        $query .= " left join danhmuc as d2 on d2.danh_muc_cha = d1.id";
        $query .= " where d1.danh_muc_cha is null";
        $result = $this->conn->query($query);
        if($result->num_rows > 0) {
            $danhmucs = [];
            while($row = $result->fetch_assoc()) {
                array_push($danhmucs, $row);
            }
            $rootDanhmuc = new DanhMuc(0, "");
            foreach ($danhmucs as $danhmuc) {
                $dm = new DanhMuc($danhmuc['idMuc1'], $danhmuc['muc1']);
                if($danhmuc['muc2']) {
                    $dm2 = new DanhMuc($danhmuc['idMuc2'], $danhmuc['muc2']);
                    $dm->themDanhMuc($dm2);
                }
                $rootDanhmuc->themDanhMuc($dm);
            }
            echo "<ul class='p-2'>";
            $this->printDanhMuc($rootDanhmuc, 0);
            echo "</ul>";
        }
    }
    public function printDanhMuc(DanhMuc $danhmucs, $level)
    {
        if($level == 1) {
            echo "<li class='form-check my-2'>";
        } else if($level == 2) {
            echo "<li style='margin-left: 40px;'>";
        }
        if($level != 0) {
            echo        "<input value='{$danhmucs->getIdDanhMuc()}' class='form-check-input select-danhmuc' type='checkbox' id='danhmuc{$danhmucs->getIdDanhMuc()}' >";
            echo        "<label for='danhmuc{$danhmucs->getIdDanhMuc()}' class='form-check-label cursor-pointer'>{$danhmucs->getTenDanhMuc()}</label>";
            echo    "</li>";
        }

        foreach ($danhmucs as $danhmuc) {
            $this->printDanhMuc($danhmuc, $level + 1);
            if($danhmuc->hasChildren()) {
                echo "<ul>";
                $this->printDanhMuc($danhmuc->getChildren(), $level + 2);
                echo "</ul>";
            }
        }
    }
    public function rewind()
    {
        $this->currentIndex = 0;
    }

    public function current()
    {
        return $this->danhmucs[$this->currentIndex];
    }
    public function valid()
    {
        return isset($this->danhmucs[$this->currentIndex]);
    }

    public function hasChildren()
    {
        return ($this->danhmucon != null);
    }
    public function getChildren()
    {
        return $this->danhmucon;
    }

    public function next()
    {
        return $this->currentIndex++;
    }
    public function key()
    {
        return $this->currentIndex;
    }
    public function setDanhMucCon($danhmuccon)
    {
        $this->danhmucon = $danhmuccon;
    }
    public function themDanhMuc($danhmuc)
    {
        $this->danhmucs[] = $danhmuc;
    }
}