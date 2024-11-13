<?php
function insert_donhang($MaKhachHang, $NgayDatHang, $TrangThaiDonHang, $PhuongThucThanhToan, $DiaChiGiaoHang, $MaGiamGia, $TongDonHang, $MaVanChuyen)
{
    if ($MaGiamGia != "") {
        $sql = "INSERT INTO donhang(MaKhachHang,NgayDatHang,TrangThaiDonHang,PhuongThucThanhToan,DiaChiGiaoHang,MaGiamGia,TongDonHang,MaVanChuyen) VALUES('$MaKhachHang','$NgayDatHang','$TrangThaiDonHang','$PhuongThucThanhToan','$DiaChiGiaoHang','$MaGiamGia','$TongDonHang','$MaVanChuyen') ";
    } else {
        $sql = "INSERT INTO donhang(MaKhachHang,NgayDatHang,TrangThaiDonHang,PhuongThucThanhToan,DiaChiGiaoHang,TongDonHang,MaVanChuyen) VALUES('$MaKhachHang','$NgayDatHang','$TrangThaiDonHang','$PhuongThucThanhToan','$DiaChiGiaoHang','$TongDonHang','$MaVanChuyen') ";
    }

    // echo $sql;
    // die();

    $MaDonHang = pdo_execute_lastInsertId($sql);
    return $MaDonHang;
};

function loadone_donhang($MaDonHang)
{
    $sql = "SELECT * FROM donhang where MaDonHang=" . $MaDonHang;
    $donhang = pdo_query_one($sql);
    return $donhang;
}

function loadone_donhang_detail()
{
    $sql = "SELECT * FROM donhang inner join chitietdonhang on donhang.MaDonHang = chitietdonhang.MaDonHang";
    $listdonhang_detail = pdo_query_one($sql);
    return $listdonhang_detail;
}

function loadall_donhang()
{
    $sql = "SELECT * FROM donhang inner join taikhoan on  donhang.MaKhachHang = taikhoan.MaTaiKhoan order by TrangThaiDonHang asc ";
    $listDonHang = pdo_query($sql);
    return $listDonHang;
};

function loadall_ThongTin($MaDonHang)
{
    $sql = "SELECT taikhoan.Ten,taikhoan.SoDienThoai,donhang.DiaChiGiaoHang,NgayDatHang,TrangThaiDonHang FROM donhang inner join taikhoan on  donhang.MaKhachHang = taikhoan.MaTaiKhoan where MaDonHang =" . $MaDonHang;
    $listThongTin = pdo_query_one($sql);
    return $listThongTin;
};

function update_trangThai($TrangThaiDonHang, $MaDonHang)
{
    $sql = "UPDATE donhang SET TrangThaiDonHang='" . $TrangThaiDonHang . "' WHERE MaDonHang=" . $MaDonHang;
    pdo_execute($sql);
}

function loadall_donhang_taikhoan($MaKhachHang, $TrangThaiDonHang)
{
    $sql = "SELECT 
    *
FROM 
    donhang dh
WHERE 
    dh.MaKhachHang = $MaKhachHang AND
    dh.TrangThaiDonHang = $TrangThaiDonHang
";
    $listThongTin = pdo_query($sql);
    return $listThongTin;
};
