<?php
session_start();

if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
if (!isset($_SESSION['magiamgia'])) $_SESSION['magiamgia'] = "";
include "model/pdo.php";
include "model/taikhoan.php";
include "model/sanpham.php";
include "model/danhmuc.php";
include "model/binhluan.php";
include "model/magiamgia.php";
include "model/donhang.php";
include "model/chitietdonhang.php";
include "model/vanchuyen.php";
include "./global.php";
$header1 = "view/header-1.php";
$css = '<link rel="stylesheet" href="./assets/css/style.css?v= echo time();"/>';
$css2 = '<link rel="stylesheet" href="./assets/css/style-2.css?v= echo time();" />';
$header2 = "view/header-2.php";
$footer = "view/footer.php";

if ((isset($_GET["act"])) && ($_GET["act"] != "")) {
    $act = $_GET["act"];
    switch ($act) {
        case 'sanpham':
            include './global.php';
            include $header1;
            echo $css2;
            include "view/header-2.php";

            // Xác định trang hiện tại
            $currentPage = isset($_GET['page']) ? (int) $_GET['page'] : 1;
            // Số bản ghi mỗi trang
            $perPage = 6;

            $offset = ($currentPage - 1) * $perPage;

            if (isset($_POST['LocSanPham']) && ($_POST['LocSanPham'])) {
                $MaDanhMuc = $_POST['MaDanhMuc'];
                // die();
            } else {
                $MaDanhMuc = "0";
            }
            $listsanpham = loadall_sanpham_loc2($MaDanhMuc);
            // print_r($listsanpham);
            // die();

            $totalRow = count($listsanpham);

            $totalPages = ceil($totalRow / $perPage);

            $listsanpham_perpage = currentPage_sanpham_home($offset, $perPage, $MaDanhMuc);


            $TenDanhMuc_one = loadone_ten_dm($MaDanhMuc);

            $listDanhMuc = loadall_danhmuc();


            include "view/sanpham.php";
            include $footer;
            break;
        case 'baiviet':
            echo '<link rel="stylesheet" href="./assets/css/blog.css" />';
            include "view/header-2.php";
            include "view/baiviet.php";
            break;
        case 'dangnhap':
            $header1 = '';
            $header2 = '';
            $footer = '';
            $isValid = true;
            $usernameError = "";
            $passwordError = "";
            $thongBao = "";


            if (isset($_POST['dangnhap']) && $_POST['dangnhap']) {
                $TenDangNhap = $_POST['TenDangNhap'];
                $MatKhau = $_POST['MatKhau'];

                // $TenDangNhap = trim($_POST['TenDangNhap']);
                // $MatKhau = trim($_POST['MatKhau']);

                if (empty($TenDangNhap)) {
                    $usernameError = "Vui lòng nhập tên đăng nhập.";
                    $isValid = false;
                } else if (strlen($TenDangNhap) < 4) {
                    $usernameError = "Tên đăng nhập phải hơn 4 kí tự.";
                    $isValid = false;
                }

                if (empty($MatKhau)) {
                    $passwordError = "Vui lòng nhập mật khẩu.";
                    $isValid = false;
                } else if (strlen($MatKhau) < 4) {
                    $passwordError = "Mật khẩu phải hơn 6 kí tự.";
                    $isValid = false;
                }

                if ($isValid) {
                    $checkUser = checkUser($TenDangNhap, $MatKhau);
                    if (is_array($checkUser)) {
                        $_SESSION['TenDangNhap'] = $checkUser;
                        // $cartUser = showDonHang($checkUser['MaTaiKhoan']);
                        // echo $cart;
                        // die();
                        $_SESSION['cartUser'] = $cartUser;
                        if ($checkUser['VaiTro'] == 0) {
                            header('Location: index.php');
                        } else if ($checkUser['VaiTro'] == 1) {
                            $thongBao = 'Tài khoản không tồn tại.';
                        }
                        exit;
                    } else {
                        $thongBao = 'Tài khoản không tồn tại.';
                    }
                }
            }
            echo '<link rel="stylesheet" href="./view/css/dangnhap.css?v= <?php echo time(); ?>" />';
            include "view/dangnhap.php";
            break;
        case 'dangki':
            $header1 = '';
            $header2 = '';
            $footer = '';
            $isValid = true;
            $usernameError = "";
            $emailError = "";
            $tenDangNhapError = "";
            $passwordError = "";
            if (isset($_POST['dangki']) && $_POST['dangki']) {
                $Ten = trim($_POST['Ten']);
                $Email = trim($_POST['Email']);
                $TenDangNhap = trim($_POST['TenDangNhap']);
                $MatKhau = trim($_POST['MatKhau']);

                // $TenDangNhap = trim($_POST['TenDangNhap']);
                // $MatKhau = trim($_POST['MatKhau']);

                if (empty($Ten)) {
                    $usernameError = "Vui lòng nhập tên đăng nhập.";
                    $isValid = false;
                }

                if (empty($Email)) {
                    $emailError = "Vui lòng nhập email";
                    $isValid = false;
                }

                if (empty($TenDangNhap)) {
                    $tenDangNhapError = "Vui lòng nhập ten đăng nhập.";
                    $isValid = false;
                } else if (strlen($TenDangNhap) < 6) {
                    $passwordError = "Tên đăng nhập phải hơn 6 kí tự.";
                    $isValid = false;
                }

                if (empty($MatKhau)) {
                    $passwordError = "Vui lòng nhập mật khẩu.";
                    $isValid = false;
                } else if (strlen($MatKhau) < 6) {
                    $passwordError = "Mật khẩu phải hơn 6 kí tự.";
                    $isValid = false;
                }

                if ($isValid) {
                    insert_taikhoan($Ten, $TenDangNhap, $Email, $MatKhau);
                    $thongBao = 'Đăng kí thành công hãy đăng nhập';
                }
            }

            echo '<link rel="stylesheet" href="./view/css/dangki.css?v= <?php echo time(); ?>" />';
            include "view/dangki.php";
            break;
        case 'thoat':
            session_unset();
            header('Location: index.php');
            break;

        case 'myaccount':
            include $header1;
            include $header2;
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $myaccount = load_oneadmin($_GET['id']);
                extract($myaccount);
                // var_dump($myaccount);
                // echo "<pre>";
                // var_dump($_SESSION);
                // $cart = showDonHang($MaTaiKhoan);
                // echo "</pre>";
            }
            include './view/myaccount.php';
            include $footer;
            break;
        case 'editTaiKhoan':
            if (isset($_POST['editTaiKhoan']) && $_POST['editTaiKhoan']) {
                $MaTaiKhoan = $_POST['MaTaiKhoan'];
                $Ten = $_POST['Ten'];
                $TenDangNhap = $_POST['TenDangNhap'];
                $Email = $_POST['Email'];
                $SoDienThoai = $_POST['SoDienThoai'];
                $DiaChi = $_POST['DiaChi'];
                $MatKhau = $_POST['MatKhau'];

                update_taikhoanUser($MaTaiKhoan, $Ten, $Email, $SoDienThoai, $DiaChi, $TenDangNhap, $MatKhau);
                header("Location: index.php?act=myaccount&id=" . $MaTaiKhoan);
            }
        case 'chiTietSanPham':
            // session_start();
            include $header1;
            echo $css2;
            include $header2;

            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $listSanPham = loadone_sanpham($_GET['id']);
                extract($listSanPham);
                $TenDanhMuc = loadone_ten_dm($MaDanhMuc);

                $HinhAnh = $img_path2 . $HinhAnh;
                $listSanPham_lienquan = loadsanpham_danhmuc_limit4($MaDanhMuc);
                // echo '<pre>';
                $KichThuoc = explode(",", $KichThuoc);
                $MauSac = explode(",", $MauSac);
                // var_dump($KichThuoc);
                // foreach ($MauSac as $color) {
                //     $listColor .= '<div style="width: 100%;height: 30px;background-color:' . $color . '"></div> <br>';
                // }
                // echo '</pre>';
                // die();
            }

            // echo "<pre>";
            // print_r($_SESSION);
            // die();
            // Xử lý các bình luận đã gửi
            if (isset($_POST['guibinhluan']) && $_POST['guibinhluan']) {
                $NoiDungBinhLuan = $_POST['NoiDungBinhLuan'];
                $MaSanPham = $_POST['MaSanPham'];
                $MaTaiKhoan  = $_SESSION['TenDangNhap']['MaTaiKhoan'];
                $NgayBinhLuan = date('h:i:sa d/m/Y');
                insert_binhluan($NoiDungBinhLuan, $MaTaiKhoan, $MaSanPham, $NgayBinhLuan);

                // echo $NoiDungBinhLuan;
                // echo $MaSanPham;
                // echo $MaTaiKhoan;
                // echo $NgayBinhLuan;
                // die();
                header("Location: " . $_SERVER['PHP_SELF']);
            }


            // $MaTaiKhoan  = $_SESSION['TenDangNhap']['MaTaiKhoan'];
            $listBinhLuan = loadall_binhluan_taikhoan_($MaSanPham);
            // echo '<pre>';
            // print_r($listBinhLuan);
            // // die();
            // echo '</pre>';

            include './view/chiTietSanPham.php';
            include $footer;
            break;
        case 'binhluan':
            if (!isset($_SESSION['TenDangNhap'])) {
                header("Location: index.php?act=dangnhap");
            }

            if (isset($_POST['guibinhluan']) && $_POST['guibinhluan']) {
                if (empty($_SESSION)) {
                    header('Location: index.php?act=dangnhap');
                    exit();
                } else {
                    $NoiDungBinhLuan = $_POST['NoiDungBinhLuan'];
                    $MaSanPham = $_POST['MaSanPham'];
                    $MaTaiKhoan  = $_SESSION['TenDangNhap']['MaTaiKhoan'];
                    $NgayBinhLuan = date('h:i:sa d/m/Y');
                    insert_binhluan($NoiDungBinhLuan, $MaTaiKhoan, $MaSanPham, $NgayBinhLuan);

                    // echo $NoiDungBinhLuan;
                    // echo $MaSanPham;
                    // echo $MaTaiKhoan;
                    // echo $NgayBinhLuan;
                    // die();
                    header("Location: index.php?act=chiTietSanPham&id=" . $MaSanPham);
                }
            }

            break;
        case 'xoaBinhLuan':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                // die();
                $MaBinhLuan = $_GET['id'];
                delete_binhluan($MaBinhLuan);
                $MaTaiKhoan = $_GET['MaTaiKhoan'];

                header("Location: index.php?act=sanpham");
            }
            break;

            // ============================= Giỏ hàng ============================= //
        case 'cart':
            include $header1;
            echo $css2;
            include $header2;

            // unset($_SESSION['cart']);

            // echo "<pre>";
            // print_r($listVanChuyen);
            // echo "</pre>";
            // die();

            if (isset($_POST['themVaoGioHang']) && $_POST['themVaoGioHang']) {
                $HinhAnh = $_POST['HinhAnh'];
                $TenSanPham = $_POST['TenSanPham'];
                $SoLuong = $_POST['SoLuong'];
                $KichThuoc = $_POST['KichThuoc'];
                $MauSac = $_POST['MauSac'];
                $Gia = $_POST['Gia'];
                $MaSanPham = $_POST['MaSanPham'];

                // $SoLuong_batdau = 1;
                $flag = 0;
                $i = 0;

                foreach ($_SESSION['cart'] as $key) {
                    // echo "<pre>";
                    // print_r($key[2]);
                    // echo "</pre>";
                    // die();
                    if ($key[1] === $TenSanPham && $key[3] === $KichThuoc && $key[4] === $MauSac) {
                        $soLuongMoi = $SoLuong;
                        $_SESSION['cart'][$i][2] = $soLuongMoi;
                        $flag = 1;
                    }
                    $i++;
                }

                if ($flag == 0) { {
                        $cart = array($HinhAnh, $TenSanPham, $SoLuong, $KichThuoc, $MauSac, $Gia, $MaSanPham);
                        $_SESSION['cart'][] = $cart;
                    }
                    // echo "<pre>";
                    // print_r($cart);
                    // echo "</pre>";
                }
            }

            include './view/cart.php';
            include $footer;
            break;
        case 'xoaDonHang':
            if (isset($_GET['id']) && $_GET['id'] >= 0) {
                array_splice($_SESSION['cart'], $_GET['id'], 1);
            } else {
                if (isset($_SESSION['cart']))  unset($_SESSION['cart']);
            }
            if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                header("Location: index.php?act=cart");
            } else {
                header('Location: index.php?act=sanpham');
            }
            break;
        case 'chitietthanhtoan':
            include $header1;
            echo $css2;
            include $header2;
            $flag = false;
            $errVouCher = '';
            $GiaTriGiam = 0;
            $TrangThai = 0;

            // var_dump($_SESSION['magiamgia']);
            // die();
            // unset($_SESSION['magiamgia']);

            $listVanChuyen = loadall_vanchuyen();

            if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                $myaccount = load_oneadmin($_SESSION['TenDangNhap']['MaTaiKhoan']);
                extract($myaccount);

                // echo '<pre>';
                // var_dump($MaTaiKhoan);
                // echo '</pre>';

                // die();

                if (isset($_POST['addMaGiamGia']) && $_POST['addMaGiamGia']) {
                    $TenMaGiamGia = $_POST['TenMaGiamGia'];
                    $TongDonHang = $_POST['TongDonHang'];
                    $PhiVanChuyen = $_POST['PhiVanChuyen'];
                    // echo $TenMaGiamGia;
                    // die();

                    $listMaGiamGia = loadall_magiamgia();

                    foreach ($listMaGiamGia as $voucher) {
                        // echo $TenMaGiamGia;
                        // die();
                        if ($TenMaGiamGia === $voucher['TenMaGiamGia'] && $TongDonHang >= $voucher['DieuKien']) {
                            if (isset($_SESSION['magiamgia']) && $_SESSION['magiamgia'] != "") {
                                $TongDonHang_Giam = $_SESSION['magiamgia'];
                                $MaGiamGia = $voucher['MaGiamGia'];
                                $flag = true;
                                // echo $TongDonHang_Giam;
                                // die();
                            } else {
                                $MaGiamGia = $voucher['MaGiamGia'];
                                // echo "<pre>";
                                // print_r($_SESSION['cart']);
                                // echo "</pre>";

                                $TongDonHang_Giam = $TongDonHang - (int) $voucher['GiaTriGiam'];
                                $GiaTriGiam = $voucher['GiaTriGiam'];

                                $_SESSION['magiamgia'] = $TongDonHang_Giam;

                                $flag = true;
                            }

                            // var_dump($_SESSION['magiamgia']);
                            // die();
                            // }
                            // header("Location: index.php?act=chitietthanhtoan");
                        } else {
                            $_SESSION['magiamgia'] = "";
                            $errVouCher = '<p style="color: red;margin-top:20px">Voucher không tồn tại hoặc không đủ điều kiện</p>';
                            $GiaTriGiam = 0;
                            // die();
                        }
                    }
                }

                if (isset($_POST['DatHang']) && $_POST['DatHang']) {
                    $MaKhachHang = $_POST['MaKhachHang'];
                    $NgayDatHang =  date('Y/m/d h:i:sa');
                    // echo $NgayDatHang;
                    // die();
                    $TrangThaiDonHang = 1;
                    $PhuongThucThanhToan = $_POST['thanhtoan'];
                    $DiaChiGiaoHang = $_POST['DiaChi'];
                    $MaGiamGia = $_POST['MaGiamGia'];
                    $PhiVanChuyen = $_POST['PhiVanChuyen'];
                    $TongDonHang = $_POST['TongDonHang'] + $PhiVanChuyen;
                    $MaVanChuyen = $_POST['MaVanChuyen'];

                    // echo $MaGiamGia;
                    // die();


                    $MaDonHang = insert_donhang($MaKhachHang, $NgayDatHang, $TrangThaiDonHang, $PhuongThucThanhToan, $DiaChiGiaoHang, $MaGiamGia, $TongDonHang, $MaVanChuyen);

                    if (isset($_SESSION['cart']) &&  $_SESSION['cart'] > 0) {
                        foreach ($_SESSION['cart'] as $key => $value) {
                            echo "<pre>";
                            print_r($_SESSION['cart']);
                            echo "</pre>";
                            $MaSanPham = $value['6'];
                            $KichThuoc = $value['3'];
                            $MauSac = $value['4'];
                            $SoLuong = $value['2'];
                            $Gia = $value['5'];

                            insert_chitietdonhang($MaSanPham, $KichThuoc, $MauSac, $SoLuong, $Gia, $MaDonHang);
                            // echo "Đặt hàng thành công";

                            // die();
                        }
                    }
                    $_SESSION['magiamgia'] = "";
                    header("Location: index.php?act=donhanghoantat&id=" . $MaDonHang);
                    update_magiamgia($TrangThai);
                    // echo $MaSanPham . "<br>";
                    // echo $KichThuoc . "<br>";
                    // echo $MauSac . "<br>";
                    // echo $SoLuong . "<br>";
                    // echo $Gia;
                    // die();
                }
            } else {
                header("Location: index.php?act=cart");
            }

            include './view/chitietthanhtoan.php';
            include $footer;
            break;
        case 'donhanghoantat':
            include $header1;
            echo $css2;
            include $header2;

            if (isset($_GET['id']) && $_GET['id']) {
                $DonHang = loadone_donhang($_GET['id']);
                extract($DonHang);

                // echo "<pre>";
                // var_dump($_SESSION['cart']);
                // echo "</pre>";
                // die();
            }

            include './view/donhanghoantat.php';
            include $footer;
            $_SESSION['cart'] = [];
            break;

            // ======================================== ÁP dụng mã giảm giá========================================
        case 'donhang':
            include $header1;
            echo $css2;
            include $header2;
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $myaccount = load_oneadmin($_GET['id']);
                extract($myaccount);
                $MaKhachHang = $_GET['id'];
                // var_dump($myaccount);
                // echo "<pre>";
                // var_dump($_SESSION);
                // $cart = showDonHang($MaTaiKhoan);
                // echo "</pre>";

                if (isset($_GET['tt']) && ($_GET['tt'])) {
                    $TrangThaiDonHang = $_GET['tt'];

                    $listThongTin = loadall_donhang_taikhoan($MaKhachHang, $TrangThaiDonHang);
                    // echo "<pre>";
                    // var_dump($listThongTin);
                    // echo "</pre>";
                }
            }
            include './view/donhang.php';
            include $footer;
            break;
            break;
        case 'thoat':

            break;
        case 'thoat':

            break;
        case 'thoat':

            break;
        default:
            include './global.php';
            include $header1;
            echo $css;
            include $header2;
            $listSanPham = loadall_sanpham_new();

            // echo "<pre>";
            // print_r($listSanPham);
            // die();

            include "./view/trangchu.php";
            include $footer;
    }
} else {
    include './global.php';
    include $header1;
    echo $css;
    include $header2;
    $listSanPham = loadall_sanpham_new();

    // echo "<pre>";
    // print_r($listSanPham);
    // die();

    include "./view/trangchu.php";
    include $footer;
}
