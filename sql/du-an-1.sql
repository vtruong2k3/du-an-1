-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 30, 2024 lúc 04:12 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `du-an-1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `MaBinhLuan` int(11) NOT NULL,
  `NoiDungBinhLuan` text NOT NULL,
  `NgayBinhLuan` datetime NOT NULL,
  `MaSanPham` int(11) NOT NULL,
  `MaTaiKhoan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`MaBinhLuan`, `NoiDungBinhLuan`, `NgayBinhLuan`, `MaSanPham`, `MaTaiKhoan`) VALUES
(40, 'ádfsad', '0000-00-00 00:00:00', 79, 28),
(41, 'ádfasdf', '0000-00-00 00:00:00', 80, 28),
(57, 'sadfsadf', '0000-00-00 00:00:00', 111, 28);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `MaChiTietDonHang` int(11) NOT NULL,
  `MaDonHang` int(11) NOT NULL,
  `MaSanPham` int(11) NOT NULL,
  `KichThuoc` varchar(255) DEFAULT NULL,
  `MauSac` varchar(255) DEFAULT NULL,
  `SoLuong` int(11) NOT NULL,
  `Gia` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`MaChiTietDonHang`, `MaDonHang`, `MaSanPham`, `KichThuoc`, `MauSac`, `SoLuong`, `Gia`) VALUES
(38, 51, 80, '1m', '#839541', 10, 70000.00),
(39, 52, 80, '1m', '#839541', 10, 70000.00),
(40, 52, 80, '2m', '#839541', 10, 70000.00),
(41, 53, 80, '1m', '#839541', 4, 70000.00),
(42, 53, 80, '1m', '#000', 4, 70000.00),
(43, 54, 80, '1m', '#839541', 10, 70000.00),
(44, 55, 80, '1m', '#839541', 10, 70000.00),
(45, 56, 80, '1m', '#839541', 10, 70000.00),
(46, 57, 84, '5m', '#684141', 8, 1094500.00),
(47, 58, 83, '8m', '#ad7b7b', 1, 3277700.00),
(48, 59, 84, '0.2m', '#684141', 1, 1094500.00),
(49, 60, 84, '0.2m', '#b27676', 8, 1094500.00),
(50, 61, 80, '1m', '#839541', 5, 70000.00),
(51, 62, 84, '0.2m', '#684141', 10, 1094500.00),
(52, 62, 84, '0.2m', '#b27676', 10, 1094500.00),
(53, 63, 84, '0.2m', '#b27676', 1, 1094500.00),
(54, 64, 111, '80x32cm', '#000000', 1, 1394400.00),
(55, 64, 111, '80x32cm', '#d9c373', 3, 1394400.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmucsanpham`
--

CREATE TABLE `danhmucsanpham` (
  `MaDanhMuc` int(11) NOT NULL,
  `TenDanhMuc` varchar(255) NOT NULL,
  `TrangThai` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmucsanpham`
--

INSERT INTO `danhmucsanpham` (`MaDanhMuc`, `TenDanhMuc`, `TrangThai`) VALUES
(1, 'Phòng khách', 1),
(2, 'Phòng ngủ', 1),
(3, 'Phòng bếp', 1),
(5, 'Combo Nội thất', 1),
(6, 'Văn phòng', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `MaDonHang` int(11) NOT NULL,
  `MaKhachHang` int(11) NOT NULL,
  `NgayDatHang` datetime NOT NULL,
  `NgayGiaoHang` datetime DEFAULT NULL,
  `TrangThaiDonHang` varchar(20) NOT NULL,
  `PhuongThucThanhToan` varchar(20) NOT NULL,
  `DiaChiGiaoHang` varchar(255) NOT NULL,
  `MaGiamGia` int(11) DEFAULT NULL,
  `TongDonHang` int(255) NOT NULL,
  `MaVanChuyen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`MaDonHang`, `MaKhachHang`, `NgayDatHang`, `NgayGiaoHang`, `TrangThaiDonHang`, `PhuongThucThanhToan`, `DiaChiGiaoHang`, `MaGiamGia`, `TongDonHang`, `MaVanChuyen`) VALUES
(51, 28, '2024-03-07 01:05:06', NULL, '2', 'Thanh toán khi nhận ', 'Hà Nội', 1, 530000, 2),
(52, 28, '2024-03-07 01:14:02', NULL, '3', 'Thanh toán khi nhận ', 'Hà Nội', 1, 1230000, 2),
(53, 28, '2024-04-08 01:15:40', NULL, '3', 'Thanh toán khi nhận ', 'Hà Nội', 1, 390000, 2),
(54, 28, '2024-04-08 01:22:48', NULL, '3', 'Thanh toán khi nhận ', 'Hà Nội', 1, 530000, 2),
(55, 28, '2024-04-08 01:24:12', NULL, '3', 'Thanh toán khi nhận ', 'Hà Nội', 1, 530000, 2),
(56, 28, '2024-03-07 01:25:26', NULL, '1', 'Thanh toán khi nhận ', 'Hà Nội', NULL, 730000, 2),
(57, 28, '2024-04-08 01:28:17', NULL, '1', 'Thanh toán khi nhận ', 'Hà Nội', NULL, 8786000, 2),
(58, 28, '2024-04-08 01:30:26', NULL, '3', 'Thanh toán khi nhận ', 'Hà Nội', NULL, 3307700, 2),
(59, 28, '2024-04-08 02:02:25', NULL, '3', 'Thanh toán khi nhận ', 'Hà Nội', NULL, 1124500, 2),
(60, 28, '2024-04-08 02:04:19', NULL, '3', 'Thanh toán khi nhận ', 'Hà Nội', NULL, 8786000, 2),
(61, 28, '2024-04-08 02:06:51', NULL, '1', 'Thanh toán khi nhận ', 'Hà Nội', NULL, 380000, 2),
(62, 28, '2024-04-08 02:41:03', NULL, '1', 'Thanh toán khi nhận ', 'Hà Nội', 1, 21720000, 2),
(63, 28, '2024-04-10 05:24:36', NULL, '1', 'Thanh toán khi nhận ', 'Hà Nội', NULL, 1124500, 2),
(64, 28, '2024-04-15 02:16:55', NULL, '3', 'Thanh toán khi nhận ', 'Hà Nội', 1, 5407600, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `magiamgia`
--

CREATE TABLE `magiamgia` (
  `MaGiamGia` int(11) NOT NULL,
  `TenMaGiamGia` varchar(255) NOT NULL,
  `SoLuong` int(255) NOT NULL,
  `GiaTriGiam` int(255) NOT NULL,
  `DieuKien` int(255) NOT NULL,
  `TrangThai` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `magiamgia`
--

INSERT INTO `magiamgia` (`MaGiamGia`, `TenMaGiamGia`, `SoLuong`, `GiaTriGiam`, `DieuKien`, `TrangThai`) VALUES
(1, 'GIAM200K', 1, 200000, 100000, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSanPham` int(11) NOT NULL,
  `TenSanPham` varchar(255) NOT NULL,
  `MoTa` text DEFAULT NULL,
  `Gia` decimal(10,2) NOT NULL,
  `GiaSale` decimal(10,2) DEFAULT NULL,
  `SoLuongTrongKho` int(11) NOT NULL,
  `HinhAnh` varchar(255) DEFAULT NULL,
  `MaDanhMuc` int(11) NOT NULL,
  `KichThuoc` varchar(255) DEFAULT NULL,
  `MauSac` varchar(255) DEFAULT NULL,
  `LuotXem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MaSanPham`, `TenSanPham`, `MoTa`, `Gia`, `GiaSale`, `SoLuongTrongKho`, `HinhAnh`, `MaDanhMuc`, `KichThuoc`, `MauSac`, `LuotXem`) VALUES
(78, 'Tủ Kệ Bếp Gỗ MOHO OSLO 202', 'Kích thước phủ bì: Dài 212cm x Rộng 136/156/176/196cm x Cao đến đầu giường 92cm\r\n\r\nChất liệu:\r\n\r\n- Thân giường: Gỗ tràm tự nhiên, Veneer gỗ tràm tự nhiên\r\n\r\n- Chân giường: Gỗ cao su tự nhiên\r\n\r\n- Tấm phản: Gỗ plywood chuẩn CARB-P2 (*)\r\n\r\n(*) Tiêu chuẩn California Air Resources Board xuất khẩu Mỹ, đảm bảo gỗ không độc hại, an toàn cho sức khỏe', 100000.00, 0.10, 23423, 'pro_1m5_chu_i_noi_that_moho_tu_bep_premium_chu_i_1m5_narvik_grenaa_a_153f2b0ca74f44148c758f9761ee88f2_large.webp', 3, '1m,2m,3m', '#ffa3a3,#fa0000,#000', 0),
(79, 'Tủ Kệ Bếp Gỗ MOHO OSLO 201', 'Kích thước phủ bì: Dài 212cm x Rộng 136/156/176/196cm x Cao đến đầu giường 92cm\r\n\r\nChất liệu:\r\n\r\n- Thân giường: Gỗ tràm tự nhiên, Veneer gỗ tràm tự nhiên\r\n\r\n- Chân giường: Gỗ cao su tự nhiên\r\n\r\n- Tấm phản: Gỗ plywood chuẩn CARB-P2 (*)\r\n\r\n(*) Tiêu chuẩn California Air Resources Board xuất khẩu Mỹ, đảm bảo gỗ không độc hại, an toàn cho sức khỏe', 100000.00, 0.20, 23423, 'pro_1m5_chu_i_noi_that_moho_tu_bep_premium_chu_i_1m5_narvik_a_a35d7137894a4c11ae4d3a2a20cbddae_large.webp', 3, '1m,2m,3m3', '#527321,#9399f0,#000', 0),
(80, 'Bàn Ăn Gỗ Cao Su Tự Nhiên MOHO VLINE 602', 'Kích thước phủ bì: Dài 212cm x Rộng 136/156/176/196cm x Cao đến đầu giường 92cm\r\n\r\nChất liệu:\r\n\r\n- Thân giường: Gỗ tràm tự nhiên, Veneer gỗ tràm tự nhiên\r\n\r\n- Chân giường: Gỗ cao su tự nhiên\r\n\r\n- Tấm phản: Gỗ plywood chuẩn CARB-P2 (*)\r\n\r\n(*) Tiêu chuẩn California Air Resources Board xuất khẩu Mỹ, đảm bảo gỗ không độc hại, an toàn cho sức khỏeMô tả', 100000.00, 0.30, 23423, 'pro_nau_noi_that_moho_ban_an_go_vline_1_3a90bd7182de436d8451eb56f73adfd3_large.jpg', 1, '1m,2m,3m', '#839541,#6b6161,#000', 0),
(82, 'Giường Ngủ Gỗ Tràm MOHO VLINE 601 Nhiều Kích Thước', 'Kích thước phủ bì: Dài 212cm x Rộng 136/156/176/196cm x Cao đến đầu giường 92cm\r\n\r\nChất liệu:\r\n\r\n- Thân giường: Gỗ tràm tự nhiên, Veneer gỗ tràm tự nhiên\r\n\r\n- Chân giường: Gỗ cao su tự nhiên\r\n\r\n- Tấm phản: Gỗ plywood chuẩn CARB-P2 (*)\r\n\r\n(*) Tiêu chuẩn California Air Resources Board xuất khẩu Mỹ, đảm bảo gỗ không độc hại, an toàn cho sức khỏe', 7990000.00, 0.38, 10000, 'pro_nau_noi_that_moho_giuong_ngu_go_tram_vline_1m8_2_09e6f0afa7684efcbb049ae74aa0c183_large.jpg', 2, '1m4,1m6,1m8', '#ac7272,#6b8e8c,#000', 0),
(83, 'Tủ Quần Áo Gỗ Kệ Ngăn MOHO VIENNA 201 4 Màu', 'Kích thước: Dài 50cm x Rộng 60cm x Cao 2m1\r\n\r\nChất liệu:\r\n\r\n- Cánh tủ + Thân tủ: Gỗ MFC phủ Melamin chuẩn CARB-P2 (*)\r\n- Lưng tủ: Gỗ MDF phủ Melamin chuẩn CARB-P2 (*)\r\n- Thanh treo: Hợp kim nhôm, chống gỉ sét\r\n\r\n(*) Tiêu chuẩn California Air Resources Board xuất khẩu Mỹ, đảm bảo gỗ không độc hại, an toàn cho sức khỏe', 4490000.00, 0.27, 1234, 'pro_mau_tu_nhien_tu_quan_ao_vienna_ke_ngan_4_mau_1_d20e0536701e44f884fb79d0a459df1f_master.jpg', 2, '8m,1m,5m', '#ad7b7b,#c5b149,#000', 0),
(84, 'Ghế Ăn Gỗ Cao Su Tự Nhiên MOHO OSLO 601', 'Kích thước: Dài 50cm x Rộng 51cm x Cao đến đệm ngồi/lưng tựa 41cm/81cm\r\n\r\nChất liệu:\r\n\r\n- Gỗ cao su tự nhiên\r\n\r\n- Vải bọc polyester chống nhăn, kháng bụi bẩn và nấm mốc\r\n\r\nChống thấm, cong vênh, trầy xước, mối mọt\r\n\r\nMã sản phẩm: MFDCCC801.B08 - Ghế ăn Oslo Nâu Đệm xám đậm chỉ còn hàng tại Hà Nội', 1990000.00, 0.45, 346, 'pro_nau_noi_that_moho_ghe_an_oslo_dem_xam_6_b8922c5413504a1b9796513aa9ae7e05_master.webp', 3, '0.2m', '#b27676,#684141,#000', 0),
(93, 'Ghế Sofa Gỗ Tràm Tự Nhiên MOHO VLINE 601', 'Kích thước: Dài: 180cm x Rộng 85cm x Cao 69cm\r\n\r\nChất liệu:\r\n\r\n- Thân ghế: Gỗ tràm tự nhiên\r\n\r\n- Chân ghế: Gỗ cao su tự nhiên\r\n\r\n- Vải sợi tổng hợp kháng khuẩn, chống nhăn, kháng bụi bẩn và nấm mốc\r\n\r\n- Tấm phản: Gỗ công nghiệp Plywood chuẩn CARB-P2 (*) \r\n\r\n(*) Tiêu chuẩn California Air Resources Board xuất khẩu Mỹ, đảm bảo gỗ không độc hại, an toàn sức khỏe.', 11490000.00, 0.30, 1000, 'pro_nau_noi_that_moho_ghe_sofa_go_vline_dem_be_1_810c604bcf444eb095ef1546816221bc_master.webp', 1, '0.8cm', '#9a7e7e', 0),
(94, 'Kệ Gỗ – Kệ Sách MOHO OSLO 901', 'Kích thước: Dài 80cm x Rộng 30cm x Cao 160cm\r\n\r\nChất liệu: Gỗ công nghiệp PB chuẩn CARB-P2(*), Sơn phủ UV\r\n\r\n(*) Tiêu chuẩn California Air Resources Board xuất khẩu Mỹ, đảm bảo gỗ không độc hại, an toàn cho sức khỏe', 1990000.00, 0.10, 1000, 'pro_mau_tu_nhien_noi_that_moho_tu_ke_sach_oslo_1_b95178561732462186e05fcfb42a8b4a_master.jpg', 1, '80x30cm', '#644335,#ce7373', 0),
(95, 'Tủ Kệ Tivi Gỗ MOHO OSLO 201', 'Kích thước: Dài 140/160/180 cm x Rộng 40 cm x Cao 60 cm\r\n\r\nChất liệu:\r\n\r\n- Thân tủ: Gỗ công nghiệp PB chuẩn CARB-P2 (*), Sơn phủ UV vân gỗ sồi tự nhiên\r\n\r\n- Chân tủ: Gỗ cao su tự nhiên\r\n\r\n(*) Tiêu chuẩn California Air Resources Board xuất khẩu Mỹ, đảm bảo gỗ không độc hại, an toàn cho sức khỏe', 2290000.00, 0.34, 100, 'pro_nau_noi_that_moho_tu_ke_tivi_oslo_1m4_1_eade81ca21b24c87a29c79431c387ed2_master.jpg', 1, '1m4,1m5,1m6', '#644335,#d2af84,#000000', 0),
(96, 'Tủ Giày – Tủ Trang Trí Gỗ MOHO OSLO 901', 'Kích thước: Dài 80cm x Rộng 36cm x Cao 92cm\r\n\r\nChất liệu:\r\n\r\n- Mặt tủ: Gỗ công nghiệp PB chuẩn CARB-P2 (*), Sơn phủ UV\r\n\r\n- Thân tủ: Gỗ công nghiệp MDF chuẩn CARB-P2 (*), Sơn phủ UV\r\n\r\n- Chân tủ: Gỗ cao su tự nhiên\r\n\r\n(*) Tiêu chuẩn California Air Resources Board xuất khẩu Mỹ, đảm bảo gỗ không độc hại, an toàn cho sức khỏe', 2490000.00, 0.29, 100, 'pro_mau_tu_nhien_noi_that_moho_tu_giay_oslo_901_4_aa6deab03e374e7c8417afa33c8d70ec_master.webp', 1, '80x36cm', '#625050,#754815', 0),
(97, 'Tủ Đầu Giường Gỗ MOHO VLINE 801', 'Kích thước: Dài 55cm x Rộng 41cm x Cao 51,5cm\r\n\r\nChất liệu:\r\n\r\n- Thân tủ: Gỗ công nghiệp PB, MDF chuẩn CARB-P2 (*), Veneer gỗ tràm tự nhiên\r\n\r\n- Chân tủ: Gỗ tràm tự nhiên\r\n\r\n(*) Tiêu chuẩn California Air Resources Board xuất khẩu Mỹ, đảm bảo gỗ không độc hại, an toàn cho sức khỏe', 2490000.00, 0.24, 100, 'pro_nau_noi_that_moho_tu_dau_giuong_vline_801_3_e4a191da342a421592e66dbde854ab8a_master.webp', 2, '55x41cm', '#9a6047', 0),
(98, 'Set Tủ Quần Áo Gỗ MOHO VIENNA 201 3 Cánh Kệ Ngăn 3 Màu', 'Kích thước: Dài 150cm x Rộng 60cm x Cao 2m1\r\n\r\nChất liệu:\r\n\r\n- Thân tủ: Gỗ MFC phủ Melamine chuẩn CARB-P2 (*)\r\n\r\n- Cửa tủ + Thân tủ: Gỗ MDF phủ Melamine chuẩn CARB-P2 (*)\r\n\r\n- Thanh treo: Hợp kim nhôm, chống gỉ sét\r\n\r\n(*) Tiêu chuẩn California Air Resources Board xuất khẩu Mỹ, đảm bảo gỗ không độc hại, an toàn cho sức khỏe', 11980000.00, 0.33, 100, 'pro_go_phoi_trang_noi_that_moho_tu_quan_ao_vienna_3_canh_2_695bde02b8af462692832671caabe58f_master.webp', 2, '150x60cm', '#ffffff,#000000,#9f4e19', 0),
(99, 'Tủ Quần Áo Gỗ Thanh Treo MOHO VIENNA 201 3 Màu', 'Kích thước: Dài 50cm x Rộng 60cm x Cao 210cm\r\n\r\nChất liệu:\r\n\r\n- Cánh tủ + Thân tủ: Gỗ MFC phủ Melamin chuẩn CARB-P2 (*)\r\n- Lưng tủ: Gỗ MDF phủ Melamin chuẩn CARB-P2 (*)\r\n- Thanh treo: Hợp kim nhôm, chống gỉ sét\r\n\r\n(*) Tiêu chuẩn California Air Resources Board xuất khẩu Mỹ, đảm bảo gỗ không độc hại, an toàn cho sức khỏe', 4490000.00, 0.27, 100, 'pro_nau_noi_that_moho_tu_quan_ao_vienna_1_canh_50cm_25_1__30c762e4ec82414c8a73daa8cc3fda49_master.webp', 2, '50x60cm', '#ffffff,#000000,#a25915', 0),
(100, 'Bàn Ăn Gỗ Cao Su Tự Nhiên MOHO VLINE 602', 'Kích thước: Dài 160cm x Rộng 75cm x Cao 75cm\r\n\r\nChất liệu: Gỗ cao su tự nhiên\r\n\r\nChống thấm, cong vênh, trầy xước, mối mọt', 5190000.00, 0.29, 100, 'pro_mau_tu_nhien_noi_that_moho_ban_an_vline_75cm_10_042d4586934f494f9f67ccea60dad0d5_master.jpg', 3, '160x75cm', '#af721d,#f4eea9', 0),
(101, 'Bàn Ăn Gỗ Tràm Tự Nhiên MOHO NYBORG 301', 'Kích thước: Dài 140cm x Rộng 80cm x Cao 75cm\r\n\r\nChất liệu: \r\n\r\n- Mặt bàn: Gỗ công nghiệp MDF chuẩn CARB-P2 (*), Veneer gỗ tràm tự nhiên\r\n\r\n- Chân bàn: Gỗ tràm tự nhiên\r\n\r\n(*) Tiêu chuẩn California Air Resources Board xuất khẩu Mỹ, đảm bảo gỗ không độc hại, an toàn cho sức khỏe\r\n\r\nChống thấm, cong vênh, trầy xước, mối mọt', 5990000.00, 0.42, 100, 'pro_den_noi_that_moho_ban_an_go_nyborg_5_0dddf596994f443c8b575cfe573afc61_master.webp', 3, '140x80cm', '#6c390f', 0),
(102, 'Combo Basic Phòng Khách Grenaa 201 Màu Nâu', 'Combo basic gồm:\r\n\r\n1 Ghế Sofa: Dài 150 x Rộng 80 x Cao 70 cm\r\n\r\n1 Bàn Sofa: Dài 70 x Rộng 50 x Cao 35 cm\r\n\r\n1 Ghế đôn: Dài 40 x Rộng 40 x Cao 32 cm\r\n\r\n \r\n\r\nChất liệu chính: Gỗ cao su và MFC/ MDF phủ Melamin chuẩn CARB P2 (*)\r\n\r\n(*) Tiêu chuẩn California Air Resources Board xuất khẩu Mỹ, đảm bảo gỗ không độc hại, an toàn cho sức khỏe', 8670000.00, 0.32, 100, 'pro_mau_nau_noi_that_grenaa_moho__2__ab3fc9ded04c4f5b8840dfdcd23af42f_master.webp', 5, 'Combo basic', '#6e3e07', 0),
(103, 'Combo Basic Phòng Ngủ Grenaa 201 Màu Nâu', 'Combo basic gồm:\r\n\r\n1 Giường Ngủ Grenaa: Dài 204 x Rộng 161 x Cao 800 cm (Phù hợp với nệm 1m6 x 2m)\r\n\r\n1 Tủ Đầu Giường: Dài 45 x Rộng 40 x Cao 40 cm\r\n\r\n \r\n\r\nChất liệu chính: Gỗ cao su và gỗ MFC/ MDF phủ Melamin chuẩn CARB P2 (*)\r\n\r\n(*) Tiêu chuẩn California Air Resources Board xuất khẩu Mỹ, đảm bảo gỗ không độc hại, an toàn cho sức khỏe\r\n\r\n ', 7500000.00, 0.33, 100, 'pro_mau_nau_noi_that_grenaa_moho__7__69d231891277473fbe532e1af7244cbb_master.webp', 5, 'Combo', '#a34d14', 0),
(104, ' Combo Basic Phòng Ăn Narvik 201 Màu Tự Nhiên', 'Combo basic gồm:\r\n\r\n1 Bàn Ăn: Dài 120 x Rộng 75 x Cao 78 cm\r\n\r\n4 Ghế Ăn: Dài 48 x Rộng 40 x Cao 80 cm\r\n\r\n \r\n\r\nChất liệu chính: Gỗ cao su và gỗ MFC/ MDF chuẩn CARB P2 (*)\r\n\r\n(*) Tiêu chuẩn California Air Resources Board xuất khẩu Mỹ, đảm bảo gỗ không độc hại, an toàn cho sức khỏe', 7150000.00, 0.29, 100, 'pro_mau_tu_nhien_noi_that_moho_narvik__10__e84698ebcf7045e9b05d7d7809d153c3_master.webp', 5, 'Combo', '#f5dba3', 0),
(105, 'Full House (Combo Basic) Bộ Sưu Tập Ubeda 201 Màu Nâu', 'Full House (Combo basic) gồm:\r\n\r\nPhòng khách\r\n\r\n1 Ghế sofa: Dài 1600 X Rộng 780 X Cao 750\r\n1 Bàn sofa: Dài 600 X Rộng 400 X Cao 350\r\n1 Ghế đôn: Dài 400 X Rộng 400 X Cao 350\r\nPhòng ngủ\r\n\r\n1 Giường ngủ: Dài 2057 x Rộng 1657 x Cao 789\r\n1 Tủ đầu giường: Dài 500 X Rộng 400 X Cao 400\r\nPhòng ăn\r\n\r\n1 Bàn ăn: Dài 1200 X Rộng 750 X Cao 780\r\n4 Ghế ăn: Dài 500 X Rộng 470 X Cao 800\r\nChất liệu chính: Gỗ cao su và gỗ MFC chuẩn CARB P2 (*) (*) Tiêu chuẩn California Air Resources Board xuất khẩu Mỹ, đảm bảo gỗ không độc hại, an toàn cho sức khỏe', 25500000.00, 0.33, 100, 'pro_mau_nau_noi_that_moho_ubeda__6__61e1e0901d40426bae3d8e731496eeba_master.webp', 5, 'Combo', '#ae5113', 0),
(106, 'Combo Cơ Bản Phòng Khách MOHO KOSTER Màu Nâu', 'Combo BS gồm: 1 ghế sofa 1m8, 1 bàn cafe, 1 ghế đôn\r\n\r\nKích thước:\r\n\r\n1 Ghế Sofa (MFSNCDD01.B18): W1800 X D790 X H750\r\n\r\n1 Bàn Cafe (MFSTCDD01.B09): W900 X D500 X H400\r\n\r\n1 Ghế Đôn (MFSSCDD01.B04): W400 X D400 X H400\r\n\r\nChất liệu chính:\r\n\r\nVải Polyester Canvas chống thấm nước\r\nGỗ cao su, gỗ MFC/ MDF chuẩn CARB P2 (*)\r\n(*) Tiêu chuẩn California Air Resources Board xuất khẩu Mỹ, đảm bảo gỗ không độc hại, an toàn cho sức khỏe', 13790000.00, 0.34, 100, 'pro_nau_noi_that_moho_full_combo_phong_khach_moho_koster_mau_nau__3__bcd0d56791274ce1a41feaa8b3835951_master.webp', 5, 'Combo', '#b8530f', 0),
(107, 'Hộc Tủ 3 Ngăn Lưu Trữ Tài Liệu Có Khóa MOHO WORKS 201', 'Kích thước: Dài 35cm x Rộng 42cm x Cao 63cm \r\n\r\nChất liệu: Gỗ công nghiệp PB cao cấp chuẩn CARB-P2 (*), sơn phủ UV\r\n\r\n(*) Tiêu chuẩn California Air Resources Board xuất khẩu Mỹ, đảm bảo gỗ không độc hại, an toàn cho sức khỏe', 2900000.00, 0.22, 100, 'pro_trang_noi_that_moho_hoc_tu_luu_tru_11_7cac38416e714e32b8534fd2a8e011d8_master.webp', 6, '35x42cm', '#000000,#ffffff', 0),
(108, 'Ghế Xoay Văn Phòng Tay Gập Thông Minh MOHO RIGA 701', 'Kích thước: Dài 52cm x Rộng 65cm x Cao 94-101cm\r\n\r\nChất liệu:\r\n\r\n- Khung ghế: nhựa cao cấp\r\n\r\n- Tựa lưng và nệm ghế: vải lưới mềm mại thoáng khí', 1690000.00, 0.24, 100, 'pro_trang_noi_that_moho_ghe_van_phong_riga_1_92865499928b49a191bbf2d0e0c91f6f_master.jpg', 6, '52x65cm', '#ffffff,#000000', 0),
(109, 'Ghế Xoay Văn Phòng Ngả Lưng MOHO JEFE 701', 'Kích thước: Dài 47cm x Rộng 65cm x Cao 108-126cm\r\n\r\nChất liệu:\r\n\r\n- Khung ghế: nhựa cao cấp\r\n\r\n- Tựa lưng và nệm ghế: vải lưới mềm mại thoáng khí\r\n\r\n- Chân xoay: inox\r\n\r\nGhế có yếu tố công thái học - Ergonomic', 2990000.00, 0.17, 100, 'pro_den_noi_that_moho_ghe_van_phong_jefe_1_c22b21049a9748aa9ce64503ad45b58b_master.webp', 6, '47x65cm', '#000000,#ababab', 0),
(110, 'Kệ Để Sách 5 Tầng MOHO WORKS 701', 'Kích thước: Dài 80cm x Rộng 32cm x Cao 174cm \r\n\r\nChất liệu:\r\n\r\nGỗ công nghiệp PB cao cấp chuẩn CARB-P2 (*)\r\n\r\nKhung sắt sơn tĩnh điện chống gỉ, thấm nước.\r\n\r\n(*) Tiêu chuẩn California Air Resources Board xuất khẩu Mỹ, đảm bảo gỗ không độc hại, an toàn cho sức khỏe', 4790000.00, 0.36, 100, 'pro_trang_noi_that_moho_ke_de_sach_5_tang_moho_works_8_0fceadbecd0d48df9113163674a088b9_master.webp', 6, '80x32cm', '#000000,#bfbfbf,#ebec98', 0),
(111, 'Kệ Để Sách 3 Tầng MOHO WORKS 703', 'Kích thước: Dài 80cm x Rộng 32cm x Cao 106cm \r\n\r\nChất liệu:\r\n\r\nGỗ công nghiệp PB cao cấp chuẩn CARB-P2 (*)\r\n\r\nKhung sắt sơn tĩnh điện chống gỉ, thấm nước.\r\n\r\n(*) Tiêu chuẩn California Air Resources Board xuất khẩu Mỹ, đảm bảo gỗ không độc hại, an toàn cho sức khỏe', 2490000.00, 0.44, 100, 'pro_trang_noi_that_moho_ke_de_sach_7_85b616ba9a054024b13dcd167096a2b4_master.webp', 6, '80x32cm', '#000000,#d9c373', 0),
(112, 'sgsdfgsfd', 'ádfasdf', 234.00, 10.00, 23234, 'z5978324833302_a80181ac0ad7c66c41a4573b5bddc957.jpg', 2, '34234,234234,ẻwrwer', '#000000,#f50000,#877373', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `MaTaiKhoan` int(11) NOT NULL,
  `Ten` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `SoDienThoai` varchar(20) DEFAULT NULL,
  `DiaChi` varchar(255) DEFAULT NULL,
  `TenDangNhap` varchar(255) NOT NULL,
  `MatKhau` varchar(255) NOT NULL,
  `VaiTro` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`MaTaiKhoan`, `Ten`, `Email`, `SoDienThoai`, `DiaChi`, `TenDangNhap`, `MatKhau`, `VaiTro`) VALUES
(1, 'Nguyễn Văn Trương', 'vantruong@gmail.com', '0963631187', 'Địa chỉ', 'admin', 'admin', 1),
(2, 'Nguyễn Văn Trương', 'email', '0963631187', 'Địa chỉ', 'admin2', 'admin2', 1),
(28, 'Nguyễn Văn Trương', 'vantruong@gmail.com', '0963631187', 'Hà Nội', 'vantruong', 'vantruong', 0),
(34, 'Nguyễn Văn Trương', 'nhoksyasuo@gmail.com', NULL, NULL, 'vtruong2k3', 'vtruong2k3', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vanchuyen`
--

CREATE TABLE `vanchuyen` (
  `MaVanChuyen` int(11) NOT NULL,
  `TenVanChuyen` varchar(255) NOT NULL,
  `PhiVanChuyen` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vanchuyen`
--

INSERT INTO `vanchuyen` (`MaVanChuyen`, `TenVanChuyen`, `PhiVanChuyen`) VALUES
(1, 'Nhanh', 30000),
(2, 'Tiết kiệm', 25000);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`MaBinhLuan`),
  ADD KEY `MaSanPham` (`MaSanPham`),
  ADD KEY `MaTaiKhoan` (`MaTaiKhoan`);

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`MaChiTietDonHang`),
  ADD KEY `MaDonHang` (`MaDonHang`),
  ADD KEY `MaSanPham` (`MaSanPham`);

--
-- Chỉ mục cho bảng `danhmucsanpham`
--
ALTER TABLE `danhmucsanpham`
  ADD PRIMARY KEY (`MaDanhMuc`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`MaDonHang`),
  ADD KEY `MaKhachHang` (`MaKhachHang`),
  ADD KEY `MaGiamGia` (`MaGiamGia`),
  ADD KEY `MaVanChuyen` (`MaVanChuyen`);

--
-- Chỉ mục cho bảng `magiamgia`
--
ALTER TABLE `magiamgia`
  ADD PRIMARY KEY (`MaGiamGia`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSanPham`),
  ADD KEY `MaDanhMuc` (`MaDanhMuc`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`MaTaiKhoan`),
  ADD UNIQUE KEY `TenDangNhap` (`TenDangNhap`);

--
-- Chỉ mục cho bảng `vanchuyen`
--
ALTER TABLE `vanchuyen`
  ADD PRIMARY KEY (`MaVanChuyen`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `MaBinhLuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `MaChiTietDonHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT cho bảng `danhmucsanpham`
--
ALTER TABLE `danhmucsanpham`
  MODIFY `MaDanhMuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `MaDonHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT cho bảng `magiamgia`
--
ALTER TABLE `magiamgia`
  MODIFY `MaGiamGia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaSanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `MaTaiKhoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `vanchuyen`
--
ALTER TABLE `vanchuyen`
  MODIFY `MaVanChuyen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_ibfk_1` FOREIGN KEY (`MaSanPham`) REFERENCES `sanpham` (`MaSanPham`),
  ADD CONSTRAINT `binhluan_ibfk_2` FOREIGN KEY (`MaTaiKhoan`) REFERENCES `taikhoan` (`MaTaiKhoan`);

--
-- Các ràng buộc cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_ibfk_1` FOREIGN KEY (`MaDonHang`) REFERENCES `donhang` (`MaDonHang`),
  ADD CONSTRAINT `chitietdonhang_ibfk_2` FOREIGN KEY (`MaSanPham`) REFERENCES `sanpham` (`MaSanPham`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`MaKhachHang`) REFERENCES `taikhoan` (`MaTaiKhoan`),
  ADD CONSTRAINT `donhang_ibfk_2` FOREIGN KEY (`MaGiamGia`) REFERENCES `magiamgia` (`MaGiamGia`),
  ADD CONSTRAINT `donhang_ibfk_3` FOREIGN KEY (`MaVanChuyen`) REFERENCES `vanchuyen` (`MaVanChuyen`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`MaDanhMuc`) REFERENCES `danhmucsanpham` (`MaDanhMuc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
