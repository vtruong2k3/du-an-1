<?php
function insert_danhmuc($TenDanhMuc)
{
    $sql = "INSERT INTO danhmucsanpham(TenDanhMuc) VALUES('$TenDanhMuc') ";
    pdo_execute($sql);
};

function delete_danhmuc($MaDanhMuc)
{

    $sql = "UPDATE danhmucsanpham SET TrangThai = 0 WHERE MaDanhMuc=" . $MaDanhMuc;
    pdo_execute($sql);
};

function loadall_danhmuc()
{
    $sql = "SELECT * FROM danhmucsanpham order by MaDanhMuc asc ";
    $listdanhmucc = pdo_query($sql);
    return $listdanhmucc;
};

function loadone_danhmuc($MaDanhMuc)
{
    $sql = "SELECT * FROM danhmucsanpham where MaDanhMuc=" . $MaDanhMuc;
    $dm = pdo_query_one($sql);
    return $dm;
}

function update_danhmuc($MaDanhMuc, $TenDanhMuc)
{
    $sql = "UPDATE danhmucsanpham SET TenDanhMuc='" . $TenDanhMuc . "' WHERE MaDanhMuc=" . $MaDanhMuc;
    pdo_execute($sql);
}

function currentPage_danhmuc($offset, $perPage)
{
    $sql = "SELECT * FROM danhmucsanpham ORDER BY MaDanhMuc desc LIMIT $offset, $perPage";
    $listdanhmuc = pdo_query($sql);
    return $listdanhmuc;
}

