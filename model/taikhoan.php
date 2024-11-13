<?php
function add_taikhoanadmin($Ten, $Email, $SoDienThoai, $DiaChi, $TenDangNhap, $MatKhau)
{
    $sql = "INSERT INTO taikhoan(Ten, Email,SoDienThoai,DiaChi,TenDangNhap,MatKhau,VaiTro) 
    VALUES ('$Ten','$Email','$SoDienThoai','$DiaChi','$TenDangNhap','$MatKhau',1)";
    pdo_execute($sql);
}

function insert_taikhoan($Ten, $TenDangNhap, $Email, $MatKhau)
{
    $sql = "INSERT INTO taikhoan(Ten, TenDangNhap,Email,MatKhau) 
    VALUES ('$Ten','$TenDangNhap','$Email','$MatKhau')";
    // echo $sql;
    // die();
    pdo_execute($sql);
}

function load_oneadmin($MaTaiKhoan)
{
    $sql = "SELECT * FROM taikhoan WHERE MaTaiKhoan='$MaTaiKhoan' ";
    $tk = pdo_query_one($sql);
    return $tk;
}

function checkAdmin($TenDangNhap, $MatKhau)
{
    $sql = "SELECT * FROM taikhoan WHERE TenDangNhap='$TenDangNhap' AND MatKhau='$MatKhau'";
    $tk = pdo_query_one($sql);
    return $tk;
}

function checkUser($TenDangNhap, $MatKhau)
{
    $sql = "SELECT * FROM taikhoan WHERE TenDangNhap='$TenDangNhap' AND MatKhau='$MatKhau' and VaiTro = 0";
    $tk = pdo_query_one($sql);
    return $tk;
}

function loadAllAdmin()
{
    $sql = "SELECT * FROM taikhoan WHERE VaiTro = true";
    $admin = pdo_query($sql);
    return $admin;
}

function loadAllUser()
{
    $sql = "SELECT * FROM taikhoan WHERE VaiTro = false";
    $admin = pdo_query($sql);
    return $admin;
}

function xoaAdmin($MaTaiKhoan)
{
    $sql = "DELETE FROM taikhoan
    WHERE MaTaiKhoan = $MaTaiKhoan
    AND MaTaiKhoan NOT IN (
        SELECT MaTaiKhoan FROM binhluan
        UNION
        SELECT MaKhachHang FROM donhang
    )";
    pdo_execute($sql);
};

function update_taikhoanAdmin($MaTaiKhoan, $Ten, $Email, $SoDienThoai, $DiaChi, $TenDangNhap, $MatKhau)
{
    $sql = "UPDATE taikhoan SET Ten='$Ten', Email='$Email',SoDienThoai='$SoDienThoai',DiaChi='$DiaChi',TenDangNhap='$TenDangNhap',MatKhau='$MatKhau',
   VaiTro= 1 WHERE MaTaiKhoan=" . $MaTaiKhoan;
    pdo_execute($sql);
}

function update_taikhoanUser($MaTaiKhoan, $Ten, $Email, $SoDienThoai, $DiaChi, $TenDangNhap, $MatKhau)
{
    $sql = "UPDATE taikhoan SET Ten='$Ten', Email='$Email',SoDienThoai='$SoDienThoai',DiaChi='$DiaChi',TenDangNhap='$TenDangNhap',MatKhau='$MatKhau',
   VaiTro= 0 WHERE MaTaiKhoan=" . $MaTaiKhoan;
    // echo $sql;
    // die();
    pdo_execute($sql);
}

function showDonHang($MaTaiKhoan)
{
    $sql = "SELECT * FROM taikhoan inner join donhang on taikhoan.MaTaiKhoan = donhang.MaKhachHang inner join chitietdonhang on donhang.MaDonHang = chitietdonhang.MaDonHang where MaTaiKhoan= " . $MaTaiKhoan;
    echo $sql;
    die();
    $sp = pdo_query_one($sql);
    return $sp;
}

function insert_themtaikhoan($ten, $email, $soDienThoai, $diaChi, $tenDangNhap, $matKhau)
{
    $sql = "INSERT INTO taikhoan(Ten,Email,SoDienThoai,DiaChi, TenDangNhap,MatKhau) 
    VALUES ('$ten','$email','$soDienThoai','$diaChi','$tenDangNhap','$matKhau')";
    pdo_execute($sql);
}
function loadtaikhoan()
{
    $sql = "SELECT*FROM taikhoan ORDER BY MaTaiKhoan ASC";
    $listtk = pdo_query($sql);
    return $listtk;
}
function ud_loadtaikhoan($MaTaiKhoan)
{
    $sql = "SELECT*FROM taikhoan WHERE MaTaiKhoan= " . $MaTaiKhoan;
    $listtk = pdo_query_one($sql);
    return $listtk;
}
function xoataikhoan($MaTaiKhoan)
{
    $sql = "DELETE FROM taikhoan WHERE MaTaiKhoan=" . $MaTaiKhoan;
    pdo_execute($sql);
}
function update_taikhoan($MaTaiKhoan, $Ten, $Email, $SoDienThoai, $DiaChi, $TenDangNhap, $MatKhau, $VaiTro)
{
    $sql = "UPDATE taikhoan SET Ten='$Ten', Email='$Email',SoDienThoai='$SoDienThoai',DiaChi='$DiaChi',TenDangNhap='$TenDangNhap',MatKhau='$MatKhau',
   VaiTro='$VaiTro' WHERE MaTaiKhoan=" . $MaTaiKhoan;
    pdo_execute($sql);
}

function loadall_taikhoan_loc($key_name)
{
    $sql = "SELECT * FROM taikhoan where 1";
    if ($key_name != "") {
        $sql .= " AND Ten LIKE '%" . $key_name . "%' ";
    }
    $listTaiKhoanUser = pdo_query($sql);
    return $listTaiKhoanUser;
};
