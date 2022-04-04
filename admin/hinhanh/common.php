<?php


/**
 * @param mysqli_result $result
 * @param array $rows
 * @return array
 */
function getHinhAnh(mysqli_result $result, array $rows)  {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_array()) {
            array_push($rows, $row);
        }
        $rows = array_chunk($rows, 4);
        foreach ($rows as $row) {
            echo "<div class='row'>";
            foreach ($row as $col) {
                echo "<div class='col-3 mb-2'>
                   <img 
                        data-id='{$col['Id']}'
                        data-duongdan='{$col['DuongDan']}'
                        data-ngaytao='{$col['NgayTao']}'
                        data-nguoitao='{$col['NguoiTao']}'
                        class='rounded w-100 h-100 hinhanh' 
                        src='{$col['DuongDan']}'
                    />
                </div>";
            }
            echo "</div>";
        }
    }
    return $rows;
}