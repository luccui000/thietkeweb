<?php

require_once "../../connect.php";

if(count($_POST) > 0) {
    $TenDiaDiem = $_POST["TenDiaDiem"];
    $TenDiaDiemTiengAnh = $_POST["TenDiaDiemTiengAnh"];
    $Iframe = $_POST["Iframe"];
    $KinhDo = doubleval($_POST["KinhDo"]);
    $ViDo = doubleval($_POST["ViDo"]);
    $DiaChi = $_POST["DiaChi"];
    $MoTa = $_POST["MoTa"];
    $MoTaTiengAnh = $_POST["MoTaTiengAnh"];
    $HinhAnhId = $_POST["HinhAnhId"];
    $NgayTao = date('Y-m-d');
    $NguoiTao = 1;


    $query = "INSERT INTO DiaDiem(HinhAnhId, DiaChi, Iframe, KinhDo, ViDo, NgayTao, NguoiTao) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $queryBDDD_VI = "INSERT INTO BanDich_DiaDiem(DiaDiemId, BanDichId, TenDiaDiem, MoTa) VALUES (?, ?, ?, ?)";
    $queryBDDD_EN = "INSERT INTO BanDich_DiaDiem(DiaDiemId, BanDichId, TenDiaDiem, MoTa) VALUES (?, ?, ?, ?)";
    $conn = createConnection();
    $stmt1 = $conn->prepare($query);

    $stmt1->bind_param("isssssi",
        $HinhAnhId,
        $DiaChi,
        $Iframe,
        $KinhDo,
        $ViDo,
        $NgayTao,
        $NguoiTao //
    );
    $stmt1->execute();

    $id = $stmt1->insert_id;
    $banDichVietNam = 1;
    $banDichTiengAnh = 2;
    $stmt2 = $conn->prepare($queryBDDD_VI);
    $stmt2->bind_param("iiss",
        $id,
        $banDichVietNam,
        $TenDiaDiem,
        $MoTa
    );
    $stmt2->execute();
    $stmt3 = $conn->prepare($queryBDDD_EN);
    $stmt3->bind_param("iiss",
        $id,
        $banDichTiengAnh,
        $TenDiaDiemTiengAnh,
        $MoTaTiengAnh
    );
    $stmt3->execute();
    $stmt1->close();
    $stmt2->close();
    $stmt3->close();
    $conn->close();
    header("Location: /admin/diadiem/index.php");
}