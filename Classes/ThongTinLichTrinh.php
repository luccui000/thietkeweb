<?php

require_once base_app("Classes/BaseModel.php");

class ThongTinLichTrinh extends BaseModel
{
    public array $fillable = [
        'id',
        'ten_ctlt',
        'noi_dung',
        'chi_phi_trung_binh',
        'thoi_gian_trung_binh',
    ];

    public function find($id)
    {
        $query  = "select ct.id, ct.thongtinlichtrinh_id, tt.ten_ctlt, tt.noi_dung, tt.thoi_gian_trung_binh, tt.chi_phi_trung_binh ";
        $query .= " from chitiet_thongtinlichtrinh ct, thongtinlichtrinh tt ";
        $query .= " where ct.thongtinlichtrinh_id = tt.id ";
        $query .= " and ct.lichtrinh_id = " . $id;
        $query .= " order by ct.thu_tu";

        $result = $this->conn->query($query);
        if($result->num_rows > 0) {
            $chitiet = [];
            while($row = $result->fetch_assoc()) {
                array_push($chitiet, [
                    'id' => $row['id'],
                    'thongtinlichtrinh_id' => $row['thongtinlichtrinh_id'],
                    'ten_ctlt' => $row['ten_ctlt'],
                    'noi_dung' => $row['noi_dung'],
                    'thoi_gian_trung_binh' => $row['thoi_gian_trung_binh'],
                    'chi_phi_trung_binh' => $row['chi_phi_trung_binh'],
                ]);
            }
            return $chitiet;
        } else {
            return [];
        }
    }
}