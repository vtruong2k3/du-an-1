<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/css-admin.css?v= <?php echo time(); ?>">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Roboto:ital,wght@0,100;0,300;0,500;1,400;1,500&display=swap" rel="stylesheet" />
    <title>Admin</title>
</head>

<body>
    <header>
        <div class="header">
            <div class="logo">
                <a href="./index.php"><img src="../assets/images/logo.png" alt=""></a>
            </div>
            <!-- <div class="search">
                <input type="text" placeholder="Tìm kiếm">
            </div> -->
            <div class="user" style="display: flex; align-items: center;">
                <h2><?php print_r($_SESSION['Ten']); ?> <i class='bx bx-bell'></i></i></h2>
            </div>
        </div>
    </header>

    <div class="navbar">
        <div class="navbar-left">
            <ul>
                <li><i class='bx bx-home-alt-2'></i><a href="index.php">Bảng điều khiển</a></li>
                <li><i class='bx bx-slider-alt'></i><a href="index.php?act=listTaiKhoanAdmin">Tài khoản</a></li>
                <li><i class='bx bx-user'></i><a href="index.php?act=listTaiKhoanUser">Khách hàng</a></li>
                <li><i class='bx bx-collection'></i><a href="index.php?act=listSanPham&page=1&MaDanhMuc=0">Sản phẩm</a></li>
                <li><i class='bx bx-category'></i><a href="index.php?act=listDanhMuc&page=1">Danh mục</a></li>
                <li><i class='bx bx-heart'></i><a href="index.php?act=listBinhLuan&page=1">Bình luận</a></li>
                <li><i class='bx bx-receipt'></i><a href="index.php">Hóa đơn</a></li>
                <li><i class='bx bx-list-check'></i><a href="index.php?act=donhang">Đặt hàng</a></li>
                <li><i class='bx bx-line-chart-down'></i><a href="index.php?act=thongke">Thống kê</a></li>
            </ul>
            <ul>
                <li><i class='bx bx-arrow-back'></i><a href="index.php?act=thoat">Thoát</a></li>
            </ul>
        </div>
        <div class="content">