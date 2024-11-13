<?php
function insert_chitietdonhang($MaSanPham, $KichThuoc, $MauSac, $SoLuong, $Gia, $MaDonHang)
{
    $sql = "INSERT INTO chitietdonhang(MaSanPham,KichThuoc,MauSac,SoLuong,Gia,MaDonHang) VALUES('$MaSanPham','$KichThuoc','$MauSac','$SoLuong','$Gia','$MaDonHang') ";

    pdo_execute($sql);
};

function loadone_donhang_ct($MaDonHang)
{
    $sql = "SELECT TenSanPham,HinhAnh,chitietdonhang.SoLuong,chitietdonhang.KichThuoc,chitietdonhang.MauSac,chitietdonhang.Gia FROM chitietdonhang inner join sanpham on chitietdonhang.MaSanPham = sanpham.MaSanPham where MaDonHang=" . $MaDonHang;
    $listDonHang = pdo_query($sql);
    return $listDonHang;
}
