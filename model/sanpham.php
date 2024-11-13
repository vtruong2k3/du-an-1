<?php
//Thêm sản phẩm vào database
function insert_sanpham($TenSanPham, $MoTa, $Gia, $GiaSale, $HinhAnh, $KichThuoc, $SoLuongTrongKho, $MauSac, $MaDanhMuc)
{
    $sql = "INSERT INTO sanpham(TenSanPham,MoTa,Gia,GiaSale,HinhAnh,KichThuoc,SoLuongTrongKho,MauSac,MaDanhMuc) VALUES('$TenSanPham','$MoTa','$Gia','$GiaSale','$HinhAnh','$KichThuoc','$SoLuongTrongKho','$MauSac','$MaDanhMuc') ";
    pdo_execute($sql);
};
//Xóa sản phẩm
// function delete_sanpham($MaSanPham)
// {
//     $sql = "DELETE FROM sanpham WHERE MaSanPham=" . $MaSanPham;
//     pdo_execute($sql);
// };

// Xóa sản phẩm
function delete_sanpham($MaSanPham)
{
    $sql = "DELETE FROM binhluan
    WHERE MaSanPham = $MaSanPham;
    
    DELETE FROM sanpham
    WHERE MaSanPham = $MaSanPham ";
    pdo_execute($sql);
};

function loadsanpham_danhmuc_limit4($MaDanhMuc)
{
    $sql = "SELECT * FROM sanpham where MaDanhMuc =  $MaDanhMuc  limit 4";
    $list =  pdo_query($sql);
    return $list;
}


function loadsanpham_danhmuc($MaDanhMuc)
{
    $sql = "SELECT * FROM sanpham where MaDanhMuc = " . $MaDanhMuc;
    $list =  pdo_query($sql);
    return $list;
}

function loadone_ten_dm($MaDanhMuc)
{
    if ($MaDanhMuc > 0) {
        $sql = "SELECT * FROM danhmucsanpham where MaDanhMuc=" . $MaDanhMuc;
        $dm = pdo_query_one($sql);
        extract($dm);
        return $TenDanhMuc;
    } else {
        return "";
    }
}

function loadone_sanpham($MaSanPham)
{
    $sql = "SELECT * FROM sanpham where MaSanPham =" . $MaSanPham;
    $sp = pdo_query_one($sql);
    return $sp;
}

function loadone_sanpham_detail($MaDanhMuc)
{
    $sql = "SELECT * FROM sanpham inner join danhmucsanpham on sanpham.MaDanhMuc = danhmucsanpham.MaDanhMuc where MaSanPham= " . $MaDanhMuc;
    $sp = pdo_query_one($sql);
    return $sp;
}


function update_sanpham($MaSanPham, $TenSanPham, $MoTa, $Gia, $GiaSale, $HinhAnh, $KichThuoc, $SoLuongTrongKho, $MauSac, $MaDanhMuc)
{
    if ($HinhAnh != "") {
        $sql = "UPDATE sanpham SET TenSanPham ='" . $TenSanPham . "', MoTa='" . $MoTa . "',Gia='" . $Gia . "', GiaSale='" . $GiaSale . "', HinhAnh='" . $HinhAnh . "', KichThuoc='" . $KichThuoc . "', SoLuongTrongKho='" . $SoLuongTrongKho . "', MauSac='" . $MauSac . "', MauSac='" . $MauSac . "' WHERE MaSanPham=" . $MaSanPham;
    } else {
        $sql = "UPDATE sanpham SET TenSanPham ='" . $TenSanPham . "', MoTa='" . $MoTa . "',Gia='" . $Gia . "', GiaSale='" . $GiaSale . "', KichThuoc='" . $KichThuoc . "', SoLuongTrongKho='" . $SoLuongTrongKho . "', MauSac='" . $MauSac . "', MaDanhMuc='" . $MaDanhMuc . "' WHERE MaSanPham=" . $MaSanPham;
    }
    // die($sql);   
    pdo_execute($sql);
}

function loadall_sanpham()
{
    $sql = "SELECT * FROM sanpham";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
};

function loadall_sanpham_new()
{
    $sql = "SELECT * FROM sanpham where 1 order by MaSanPham desc limit 0,4";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
};

function currentPage_sanpham($offset, $perPage, $key_name, $MaDanhMuc)
{
    $sql = "SELECT * FROM sanpham as sp join danhmucsanpham as dmsp ";
    $sql .= " ON sp.MaDanhMuc = dmsp.MaDanhMuc ";
    if ($key_name != "") {
        $sql .= " AND TenSanPham LIKE '%" . $key_name . "%' ";
    }
    if ($MaDanhMuc > 0) {
        $sql .= " AND dmsp.MaDanhMuc = '" . $MaDanhMuc . "' ";
    }
    $sql .= " ORDER BY MaSanPham desc LIMIT $offset, $perPage";
    // echo $sql;
    // die();
    $listsanpham = pdo_query($sql);
    return $listsanpham;
};

function currentPage_sanpham_home($offset, $perPage, $MaDanhMuc)
{
    $sql = "SELECT * FROM sanpham as sp join danhmucsanpham as dmsp ";
    $sql .= " ON sp.MaDanhMuc = dmsp.MaDanhMuc ";

    if ($MaDanhMuc > 0) {
        $sql .= " AND dmsp.MaDanhMuc = '" . $MaDanhMuc . "' ";
    }
    $sql .= " ORDER BY MaSanPham desc LIMIT $offset, $perPage";
    // echo $sql;
    // die();
    $listsanpham = pdo_query($sql);
    return $listsanpham;
};


function loadall_sanpham_loc($key_name, $MaDanhMuc)
{
    $sql = "SELECT * FROM sanpham where 1";
    if ($key_name != "") {
        $sql .= " AND TenSanPham LIKE '%" . $key_name . "%' ";
    }
    if ($MaDanhMuc > 0) {
        $sql .= " AND MaDanhMuc = '" . $MaDanhMuc . "' ";
    }
    $listsanpham = pdo_query($sql);
    return $listsanpham;
};

function loadall_sanpham_loc2($MaDanhMuc)
{
    $sql = "SELECT * FROM sanpham where 1";

    if ($MaDanhMuc > 0) {
        $sql .= " AND MaDanhMuc = '" . $MaDanhMuc . "' ";
    }
    $listsanpham = pdo_query($sql);
    return $listsanpham;
};

function loadone_sanpham_cungloai($id, $iddm)
{
    $sql = "SELECT * FROM sanpham where iddm = " . $iddm . " AND id <> " . $id;
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
// Hiển thị toàn bộ sản phẩm
function loadall_sanpham_home()
{
    $sql = "SELECT * FROM sanpham where 1 order by id desc limit 0,9";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
};




function loadall_sanpham_top10()
{
    $sql = "SELECT * FROM sanpham where 1 order by luotxem desc limit 0,10";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
};
