<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: dangnhap.php');
    exit;
}

include "./header.php";
include "../model/pdo.php";
include "../model/taikhoan.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/binhluan.php";
include "../model/donhang.php";
include "../model/chitietdonhang.php";
include "../model/vanchuyen.php";
include "../model/magiamgia.php";
include "../model/thongke.php";
include "../global.php";

if ((isset($_GET["act"])) && ($_GET["act"] != "")) {
    $act = $_GET['act'];
    switch ($act) {
            //============// Danh Mục //============//
        case 'listDanhMuc':
            // Xác định trang hiện tại
            $currentPage = isset($_GET['page']) ? (int) $_GET['page'] : 1;
            // Số bản ghi mỗi trang
            $perPage = 5;

            $offset = ($currentPage - 1) * $perPage;

            $listdanhmucc = loadall_danhmuc();

            $totalRow = count($listdanhmucc);

            $totalPages = ceil($totalRow / $perPage);

            $listdanhmuc = currentPage_danhmuc($offset, $perPage);

            include "./danhmuc/list.php";
            break;
        case 'addDanhMuc':
            $TenDanhMuc = "";
            $err = "";
            $isCheck = true;
            $thongbao = "";
            // Thêm danh mục
            if (isset($_POST["addDanhMuc"]) && $_POST["addDanhMuc"]) {
                $TenDanhMuc = $_POST["TenDanhMuc"];
                if (empty($TenDanhMuc)) {
                    $err = "<p>Vui lòng nhập tên danh mục</p>";
                    $isCheck = false;
                } else {
                    insert_danhmuc($TenDanhMuc);
                    $thongbao = '';
                    header("Location: index.php?act=listDanhMuc");
                }
            }
            include "./danhmuc/add.php";
            break;
        case 'xoaDanhMuc':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_danhmuc($_GET['id']);
            }
            header("location: index.php?act=listDanhMuc");
            $listdanhmuc = loadall_danhmuc();
            include "./danhmuc/list.php";
            break;
        case 'suaDanhMuc':
            $err = "";
            $isCheck = true;
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $danhmuc = loadone_danhmuc($_GET['id']);
            }
            if (isset($_POST["suaDanhMuc"]) && $_POST["suaDanhMuc"]) {
                $MaDanhMuc = $_POST["MaDanhMuc"];
                $TenDanhMuc = $_POST["TenDanhMuc"];
                if (empty($TenDanhMuc)) {
                    $err = "<p>Vui lòng nhập tên danh mục</p>";
                    $isCheck = false;
                } else {
                    update_danhmuc($MaDanhMuc, $TenDanhMuc);
                    header("Location: index.php?act=listDanhMuc");
                }
            }
            include "./danhmuc/edit.php";
            break;
            //============// Trang sản phẩm //============//
        case 'listSanPham':

            // $MaDanhMuc = $_COOKIE["MaDanhMuc"];
            // Xác định trang hiện tại
            $currentPage = isset($_GET['page']) ? (int) $_GET['page'] : 1;

            // Số bản ghi mỗi trang
            $perPage = 5;

            $offset = ($currentPage - 1) * $perPage;

            if (isset($_POST['LocSanPham']) && ($_POST['LocSanPham'])) {
                $key_name = $_POST['TenSanPham'];
                $MaDanhMuc = $_POST['MaDanhMuc'];
                // die();
            } else {
                $key_name = "";
                $MaDanhMuc = "0";
            }

            $TenDanhMuc_one = loadone_ten_dm($MaDanhMuc);

            $listsanpham = loadall_sanpham_loc($key_name, $MaDanhMuc);
            // print_r($listsanpham);
            $listDanhMuc = loadall_danhmuc();

            $totalRow = count($listsanpham);

            $totalPages = ceil($totalRow / $perPage);

            $listsanpham_perpage = currentPage_sanpham($offset, $perPage, $key_name, $MaDanhMuc);

            include "./sanpham/list.php";
            break;
        case 'chiTietSanPham':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $sanpham_detail = loadone_sanpham_detail($_GET['id']);
                extract($sanpham_detail);
            }
            include "./sanpham/list-detail.php";
            break;
        case 'addSanPham':

            if (isset($_POST['addSanPham']) && ($_POST['addSanPham'])) {
                $MaDanhMuc = $_POST['MaDanhMuc'];
                $TenSanPham = $_POST['TenSanPham'];
                $MoTa = $_POST['MoTa'];
                $Gia = $_POST['Gia'];
                $GiaSale = $_POST['GiaSale'];
                $SoLuongTrongKho = $_POST['SoLuongTrongKho'];
                $HinhAnh = $_FILES['HinhAnh']['name'];
                $KichThuoc = $_POST['KichThuoc'];
                $MauSac = $_POST['MauSac'];

                // echo "<pre>";
                // print_r($KichThuoc);
                // echo "</pre>";
                $filtered_arr = array_filter($KichThuoc, function ($value) {
                    return !empty($value);
                });
                $KichThuoc = implode(",", $filtered_arr);
                // var_dump($KichThuoc);
                // $KichThuoc = json_encode($KichThuoc);
                // die();

                $filtered_arrcolor = array_filter($MauSac, function ($value) {
                    return !empty($value);
                });
                // echo "<pre>";
                // var_dump($filtered_arrcolor);
                // echo "</pre>";
                // die();
                $MauSac = implode(",", $filtered_arrcolor);
                // echo "<pre>";
                // var_dump($MauSac);
                // echo "</pre>";
                // die();

                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["HinhAnh"]["name"]);
                if (move_uploaded_file($_FILES["HinhAnh"]["tmp_name"], $target_file)) {
                } else {
                }
                insert_sanpham($TenSanPham, $MoTa, $Gia, $GiaSale, $HinhAnh, $KichThuoc, $SoLuongTrongKho, $MauSac, $MaDanhMuc);
                $thongbao = "Thêm thành công";

                header("Location: index.php?act=listSanPham");
            }
            $listDanhMuc = loadall_danhmuc();
            include "./sanpham/add.php";
            break;
        case 'xoaSanPham':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_sanpham($_GET['id']);
            }
            header("location: index.php?act=listSanPham");
            include "./sanpham/list.php";
            break;
        case 'suaSanPham';
            $isCheck = true;
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $sanpham = loadone_sanpham($_GET['id']);
                extract($sanpham);
            }
            if (isset($_POST["suaSanPham"]) && $_POST["suaSanPham"]) {
                $MaDanhMuc = $_POST['MaDanhMuc'];
                $TenSanPham = $_POST['TenSanPham'];
                $MoTa = $_POST['MoTa'];
                $Gia = $_POST['Gia'];
                $GiaSale = $_POST['GiaSale'];
                $SoLuongTrongKho = $_POST['SoLuongTrongKho'];
                $HinhAnh = $_FILES['HinhAnh']['name'];
                $KichThuoc = $_POST['KichThuoc'];
                $MauSac = $_POST['MauSac'];

                $filtered_arr = array_filter($KichThuoc, function ($value) {
                    return !empty($value);
                });
                $KichThuoc = implode(",", $filtered_arr);
                // var_dump($KichThuoc);
                // $KichThuoc = json_encode($KichThuoc);
                // die();

                $filtered_arrcolor = array_filter($MauSac, function ($value) {
                    return !empty($value);
                });
                $MauSac = implode(",", $filtered_arrcolor);

                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["HinhAnh"]["name"]);
                if (move_uploaded_file($_FILES["HinhAnh"]["tmp_name"], $target_file)) {
                } else {
                }
                update_sanpham($MaSanPham, $TenSanPham, $MoTa, $Gia, $GiaSale, $HinhAnh, $KichThuoc, $SoLuongTrongKho, $MauSac, $MaDanhMuc);
                header("Location: index.php?act=listSanPham");
            }
            // $TenDanhMuc_one = loadone_ten_dm($MaDanhMuc);
            // echo $TenDanhMuc_one;
            // die();
            $TenDanhMuc_one = loadone_ten_dm($MaDanhMuc);
            $listDanhMuc = loadall_danhmuc();
            // echo '<pre>';
            // print_r($listDanhMuc);
            // die();
            include "./sanpham/edit.php";
            break;
        case 'listBinhLuan';
            // echo '<pre>';
            // print_r($listBinhLuan);
            // die();
            // extract($listBinhLuan);
            // Xác định trang hiện tại

            $currentPage = isset($_GET['page']) ? (int) $_GET['page'] : 1;
            // Số bản ghi mỗi trang
            $perPage = 10;

            $offset = ($currentPage - 1) * $perPage;

            $listBinhLuan = loadall_binhluan_all();

            $totalRow = count($listBinhLuan);

            $totalPages = ceil($totalRow / $perPage);

            $listsanpham_perpage = currentPage_binhluan($offset, $perPage);

            include "./binhluan/list.php";
            break;
        case 'xoaBinhluan';
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_binhluan($_GET['id']);
            }
            header("location: index.php?act=listBinhLuan");
            break;

            // =========Tài khoản==========//
        case 'thoat':
            session_unset();
            header('Location: index.php');
            break;
        case 'listTaiKhoanAdmin':
            $listTaiKhoanAdmin = loadAllAdmin();
            // echo '<pre>';
            // print_r($listTaiKhoanAdmin);
            // die();
            include "./taikhoan/listAdmin.php";
            break;
        case 'listTaiKhoanUser':
            if (isset($_POST['locTaiKhoanUser']) && ($_POST['locTaiKhoanUser'])) {
                $key_name = $_POST['tenTaiKhoan'];
                // die();
            } else {
                $key_name = "";
                $MaDanhMuc = "0";
            }
            $listTaiKhoanUser = loadall_taikhoan_loc($key_name);
            // echo '<pre>';
            // print_r($listTaiKhoanAdmin);
            // die();
            include "./taikhoan/listUser.php";
            break;
        case 'suaTaiKhoan':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $tkAdmin = load_oneadmin($_GET['id']);
                extract($tkAdmin);
            }
            if (isset($_POST["suaTaiKhoan"]) && $_POST["suaTaiKhoan"]) {
                $MaTaiKhoan = $_POST['MaTaiKhoan'];
                $Ten = $_POST['Ten'];
                $Email = $_POST['Email'];
                $SoDienThoai = $_POST['SoDienThoai'];
                $DiaChi = $_POST['DiaChi'];
                $TenDangNhap = $_POST['TenDangNhap'];
                $MatKhau = $_POST['MatKhau'];


                update_taikhoanAdmin($MaTaiKhoan, $Ten, $Email, $SoDienThoai, $DiaChi, $TenDangNhap, $MatKhau);
                header("Location: index.php?act=listTaiKhoanAdmin");
            }

            include "./taikhoan/edit.php";
            break;
        case 'xoaTaiKhoan':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                xoaAdmin($_GET['id']);
            }
            header("location: index.php?act=listTaiKhoanAdmin");
            include "./taikhoan/listAdmin.php";
            break;
        case 'addTaiKhoanAdmin':
            $errors = [];
            if (isset($_POST["addTaiKhoanAdmin"]) && $_POST["addTaiKhoanAdmin"]) {
                $Ten = $_POST['Ten'];
                $Email = $_POST['Email'];
                $SoDienThoai = $_POST['SoDienThoai'];
                $DiaChi = $_POST['DiaChi'];
                $TenDangNhap = $_POST['TenDangNhap'];
                $MatKhau = $_POST['MatKhau'];


                if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
                    $errors[] = "Email không hợp lệ";
                }


                if (!preg_match("/^[0-9]{10,11}$/", $SoDienThoai)) {
                    $errors[] = "Số điện thoại phải gồm 10-11 chữ số";
                }

                if (!empty($errors)) {
                    echo "<div>";
                    foreach ($errors as $error) {
                        echo "<p>$error</p>";
                    }
                    echo "</div>";
                }
                $listTaiKhoanAdmin = add_taikhoanadmin($Ten, $Email, $SoDienThoai, $DiaChi, $TenDangNhap, $MatKhau);
                header("Location: index.php?act=listTaiKhoanAdmin");
            }
            include "./taikhoan/add.php";
            break;
        case 'themtaikhoan':
            $errTen = '';
            $errEmail = '';
            $errSoDienThoai = '';
            $errTenDangNhap = '';
            $errDiaChi = '';
            $errTenDangNhap = '';
            $errMatKhau = '';
            $thongBao = '';
            $isCheck = true;
            if (isset($_POST['them']) && ($_POST['them'])) {
                $ten = $_POST['ten'];
                $email = $_POST['email'];
                $soDienThoai = $_POST['soDienThoai'];
                $diaChi = $_POST['daiChi'];
                $tenDangNhap = $_POST['tenDangNhap'];
                $matKhau = $_POST['matKhau'];
                if (empty($ten)) {
                    $errTen = 'Vui lòng không bỏ trống. ';
                    $isCheck = false;
                }
                if (empty($email)) {
                    $errEmail = 'Vui lòng không bỏ trống. ';
                    $isCheck = false;
                }
                if (empty($soDienThoai)) {
                    $errSoDienThoai = 'Vui lòng không bỏ trống. ';
                    $isCheck = false;
                }
                if (empty($diaChi)) {
                    $errDiaChi = 'Vui lòng không bỏ trống. ';
                    $isCheck = false;
                }
                if (empty($tenDangNhap)) {
                    $errTenDangNhap = 'Vui lòng không bỏ trống. ';
                    $isCheck = false;
                }
                if (empty($matKhau)) {
                    $errMatKhau = 'Vui lòng không bỏ trống. ';
                    $isCheck = false;
                }
                if ($isCheck) {
                    insert_themtaikhoan($ten, $email, $soDienThoai, $diaChi, $tenDangNhap, $matKhau);
                    $thongBao = 'Đã thêm thành công';
                }
            }
            include "taikhoan/themtaikhoan.php";
            break;
        case 'suatk':
            if (isset($_GET['MaTaiKhoan']) && ($_GET['MaTaiKhoan'])) {
                $loadtk = ud_loadtaikhoan($_GET['MaTaiKhoan']);
            }
            if (isset($_POST['sua']) && ($_POST['sua'])) {
                $MaTaiKhoan = $_POST['maTaiKhoan'];
                $Ten = $_POST['ten'];
                $Email = $_POST['email'];
                $SoDienThoai = $_POST['soDienThoai'];
                $DiaChi = $_POST['daiChi'];
                $TenDangNhap = $_POST['tenDangNhap'];
                $MatKhau = $_POST['matKhau'];
                $VaiTro = $_POST['vaiTro'];
                update_taikhoan($MaTaiKhoan, $Ten, $Email, $SoDienThoai, $DiaChi, $TenDangNhap, $MatKhau, $VaiTro);
                $thongBao = "Sửa thành công.";
            }
            include "taikhoan/sua.php";
            break;
        case 'xoatk':
            if (isset($_GET['MaTaiKhoan']) && ($_GET['MaTaiKhoan'] > 0)) {
                xoataikhoan($_GET['MaTaiKhoan']);
                header('Location: index.php?act=taikhoan');
            }


            include "taikhoan/sua.php";
            break;
        case 'donhang';

            $listDonHang = loadall_donhang();
            // echo "<pre>";
            // var_dump($listDonHang);
            // echo "</pre>";
            // die();
            include "bill/donhang.php";
            break;
        case 'chiTietDonHang';
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $listThongTin = loadall_ThongTin($_GET['id']);
                extract($listThongTin);
                // echo "<pre>";
                // print_r($listThongTin);
                // echo "</pre>";
                $listDonHangCT = loadone_donhang_ct($_GET['id']);
            }

            include "bill/edit.php";
            break;
        case 'capNhatTrangThai';
            if (isset($_POST['capNhatTrangThai']) && ($_POST['capNhatTrangThai'])) {
                $TrangThaiDonHang = $_POST['TrangThai'];
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    update_trangThai($TrangThaiDonHang, $_GET['id']);
                    header("Location: index.php?act=donhang");
                    exit();
                }
            }
            break;
        case 'thongke';

            include "thongke/home.php";
            break;
        case 'thongkedoanhthu';
            $table = '
                <thead>
                    <th>STT</th>
                    <th>Ngày đặt hàng</th>
                    <th>Trong tháng</th>
                    <th>Doanh Thu</th>
                </thead> 
            ';
            $boloc = '1';
            $listdonhang = doanhthutheongay();
            if (isset($_POST['boloc']) && ($_POST['boloc'])) {
                $boloc = $_POST['boloc'];
                if ($boloc == '2') {
                    $table = '
                        <thead>
                            <th>STT</th>
                            <th>Tháng đặt hàng</th>
                            <th>Doanh Thu</th>
                        </thead> 
                    ';
                    $listdonhang = doanhthutheothang();
                } else if ($boloc == '3') {
                    $table = '
                        <thead>
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Doanh Thu</th>
                        </thead> 
                    ';
                    $listdonhang = doanhthutheosanpham();
                }
            }
            include "thongke/thongkedoanhthu.php";
            break;
        case 'thongkedonhang';
            $table = '
                <thead>
                    <th>STT</th>
                    <th>Ngày đặt hàng</th>
                    <th>Trong tháng</th>
                    <th>Số lượng đặt hàng</th>
                </thead> 
            ';
            $boloc = '1';
            $listdonhang = donhangtheongay();
            if (isset($_POST['boloc']) && ($_POST['boloc'])) {
                $boloc = $_POST['boloc'];
                if ($boloc == '2') {
                    $table = '
                        <thead>
                            <th>STT</th>
                            <th>Trạng thái đặt hàng</th>
                            <th>Số lượng đặt hàng</th>
                        </thead> 
                    ';
                    $listdonhang = donhangtheotrangthai();
                } else if ($boloc == '3') {
                    $table = '
                        <thead>
                            <th>STT</th>
                            <th>Mã đơn hàng</th>
                            <th>Ngày đặt hàng</th>
                            <th>Tổng đơn hàng</th>
                            <th>Tên tài khoản</th>
                        </thead> 
                    ';
                    $listdonhang = donhangtheokhachhang();
                }
            }
            include "thongke/thongkedonhang.php";
            break;
        case 'thongkesp';
            $table = '
                <thead>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng bán</th>
                </thead> 
            ';
            $boloc = '1';
            $listdonhang = topsanphambanchay();
            if (isset($_POST['boloc']) && ($_POST['boloc'])) {
                $boloc = $_POST['boloc'];
                if ($boloc == '2') {
                    $table = '
                        <thead>
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Danh mục</th>
                            <th>Số lượng đặt hàng</th>
                        </thead> 
                    ';
                    $listdonhang =  sanphambanchaytheodanhmuc();
                }
            }
            include "thongke/thongkesp.php";
            break;
        case '';
            break;

        case '';
            break;

        case '';
            break;
        default:
            include 'home.php';
            break;
    }
} else {
    include "home.php";
}
include "home.php";
include "./footer.php";
