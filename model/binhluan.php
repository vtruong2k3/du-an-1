<?php
function insert_binhluan($NoiDungBinhLuan, $MaTaiKhoan, $MaSanPham, $NgayBinhLuan)
{
    $sql = "INSERT INTO binhluan (NoiDungBinhLuan, MaTaiKhoan, MaSanPham, NgayBinhLuan) VALUES ('$NoiDungBinhLuan', '$MaTaiKhoan', '$MaSanPham', '$NgayBinhLuan')";
    pdo_query($sql);
}

// function loadall_binhluan($MaTaiKhoan)
// {
//     $sql = "SELECT * FROM binhluan where 1";
//     if ($MaTaiKhoan > 0) $sql .= " AND MaTaiKhoan = '" . $MaTaiKhoan . "'";
//     $sql .= " order by MaBinhLuan desc ";
//     $listBinhLuan = pdo_query($sql);
//     return $listBinhLuan;
// }

function loadall_binhluan_taikhoan($MaTaiKhoan, $MaSanPham)
{
    $sql = "SELECT * FROM binhluan inner join taikhoan on binhluan.MaTaiKhoan = taikhoan.MaTaiKhoan where binhluan.MaTaiKhoan = '$MaTaiKhoan' and MaSanPham = '$MaSanPham' order by MaBinhLuan desc";
    $listBinhLuan = pdo_query($sql);
    return $listBinhLuan;
}

function loadall_binhluan_taikhoan_($MaSanPham)
{
    $sql = "SELECT * FROM binhluan inner join taikhoan on binhluan.MaTaiKhoan = taikhoan.MaTaiKhoan where MaSanPham = '$MaSanPham' order by MaBinhLuan desc";
    $listBinhLuan = pdo_query($sql);
    return $listBinhLuan;
}

function loadall_binhluan_all()
{
    $sql = "SELECT * FROM binhluan inner join taikhoan on binhluan.MaTaiKhoan = taikhoan.MaTaiKhoan  order by MaBinhLuan desc";
    $listBinhLuan = pdo_query($sql);
    return $listBinhLuan;
}

function currentPage_binhluan($offset, $perPage)
{
    $sql = "SELECT * FROM binhluan inner join taikhoan on binhluan.MaTaiKhoan = taikhoan.MaTaiKhoan ORDER BY MaBinhLuan desc LIMIT $offset, $perPage";
    $listBinhLuan = pdo_query($sql);
    return $listBinhLuan;
}

function delete_binhluan($MaBinhLuan)
{
    $sql = "DELETE FROM binhluan WHERE MaBinhLuan =" . $MaBinhLuan;
    pdo_query($sql);
}

function load_mataikhoan($MaBinhLuan)
{
    $sql = "SELECT * FROM binhluan WHERE MaBinhLuan = " . $MaBinhLuan;

    $load_mataikhoan = pdo_query($sql);
    return $load_mataikhoan;
}
