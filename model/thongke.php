<?php

// Thống kê theo doanh thu
// 1. Doanh thu theo ngày:
function doanhthutheongay()
{
    $sql = "SELECT DAY(NgayDatHang) AS Ngay,MONTH(NgayDatHang) AS Thang, SUM(TongDonHang) AS DoanhThu
    FROM donhang
    WHERE TrangThaiDonHang IN (3)
    GROUP BY Ngay
    ORDER BY Ngay ASC";
    $listdonhang = pdo_query($sql);
    return $listdonhang;
};


// 2. Doanh thu theo tháng:
function doanhthutheothang()
{
    $sql = "SELECT MONTH(NgayDatHang) AS Thang, SUM(TongDonHang) AS DoanhThu
    FROM donhang
    WHERE TrangThaiDonHang IN (3)
    GROUP BY MONTH(NgayDatHang)
    ORDER BY Thang ASC";
    $listdonhang = pdo_query($sql);
    return $listdonhang;
};
// 3. Doanh thu theo sản phẩm:
function doanhthutheosanpham()
{
    $sql = "SELECT sp.TenSanPham, SUM(ctdh.SoLuong * ctdh.Gia) AS DoanhThu
    FROM ChiTietDonHang ctdh
    INNER JOIN sanpham sp ON ctdh.MaSanPham = sp.MaSanPham
    INNER JOIN donhang dh ON ctdh.MaDonHang = dh.MaDonHang
    WHERE dh.TrangThaiDonHang IN (3)
    GROUP BY sp.MaSanPham
    ORDER BY DoanhThu DESC";
    $listdonhang = pdo_query($sql);
    return $listdonhang;
};


// Thống kê theo đơn hàng
// 1. Số lượng đơn hàng theo ngày:
function donhangtheongay()
{
    $sql = "SELECT DAY(NgayDatHang) as Ngay,MONTH(NgayDatHang) as Thang, COUNT(*) AS SoLuongDonHang
    FROM donhang
    GROUP BY Ngay
    ORDER BY Ngay ASC";
    $listdonhang = pdo_query($sql);
    return $listdonhang;
};
// 2. Số lượng đơn hàng theo trạng thái:
function donhangtheotrangthai()
{
    $sql = "SELECT TrangThaiDonHang, COUNT(*) AS SoLuongDonHang
    FROM donhang
    GROUP BY TrangThaiDonHang";
    $listdonhang = pdo_query($sql);
    return $listdonhang;
};
// 3. Danh sách đơn hàng theo khách hàng:
function donhangtheokhachhang()
{
    $sql = "SELECT dh.MaDonHang, dh.NgayDatHang, dh.TongDonHang, tk.Ten
    FROM donhang dh
    INNER JOIN taikhoan tk ON dh.MaKhachHang = tk.MaTaiKhoan
    ORDER BY dh.NgayDatHang DESC ";
    $listdonhang = pdo_query($sql);
    return $listdonhang;
};




// Thống kê sản phẩm bán chạy
// 1. Top 10 sản phẩm bán chạy:
function topsanphambanchay()
{
    $sql = "SELECT sp.TenSanPham, SUM(ctdh.SoLuong) AS SoLuongBan
    FROM chitietdonhang ctdh
    INNER JOIN sanpham sp ON ctdh.MaSanPham = sp.MaSanPham
    INNER JOIN donhang dh ON ctdh.MaDonHang = dh.MaDonHang
    WHERE dh.TrangThaiDonHang IN (3)
    GROUP BY sp.MaSanPham
    ORDER BY SoLuongBan DESC
    LIMIT 10";
    $listdonhang = pdo_query($sql);
    return $listdonhang;
};
// 2. Sản phẩm bán chạy theo danh mục:
// function sanphambanchaytheodanhmuc()
// {
//     $sql = "SELECT sp.TenSanPham, SUM(ctdh.SoLuong) AS SoLuongBan
//     FROM chitietdonhang ctdh
//     INNER JOIN sanpham sp ON ctdh.MaSanPham = sp.MaSanPham
//     INNER JOIN donhang dh ON ctdh.MaDonHang = dh.MaDonHang
//     INNER JOIN danhmuc dm ON sp.MaDanhMuc = dm.MaDanhMuc
//     WHERE dh.TrangThaiDonHang IN (3)
//     GROUP BY sp.MaSanPham, dm.TenDanhMuc
//     ORDER BY SoLuongBan DESC";
//     $listdonhang = pdo_query($sql);
//     return $listdonhang;
// };

function sanphambanchaytheodanhmuc()
{
    $sql = "SELECT sp.TenSanPham,dm.TenDanhMuc, SUM(ctdh.SoLuong) AS SoLuongBan
    FROM chitietdonhang ctdh
    INNER JOIN sanpham sp ON ctdh.MaSanPham = sp.MaSanPham
    INNER JOIN donhang dh ON ctdh.MaDonHang = dh.MaDonHang
    INNER JOIN danhmucsanpham dm ON sp.MaDanhMuc = dm.MaDanhMuc
    WHERE dh.TrangThaiDonHang IN (3)
    GROUP BY sp.MaSanPham, dm.TenDanhMuc
    ORDER BY SoLuongBan DESC";
    $listdonhang = pdo_query($sql);
    return $listdonhang;
};
