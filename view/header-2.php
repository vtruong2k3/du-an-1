<link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Roboto:ital,wght@0,100;0,300;0,500;1,400;1,500&display=swap" rel="stylesheet" />
<title>Tất cả sản phẩm</title>
</head>

<body>
    <header>
        <div class="notification-bar">
            <div class="content">
                <i class="bx bx-purchase-tag-alt"></i>
                <span>Giảm giá 30% trên toàn cửa hàng — Thời gian có hạn!</span>
                <div class="shop-now">
                    <span>Shop Now</span>
                    <i class="bx bx-right-arrow-alt"></i>
                </div>
            </div>
            <i class="bx bx-x"></i>
        </div>
        <div class="header">
            <div class="logo">
                <img src="./assets/images/logo.png" alt="Đây là Logo" />
            </div>
            <div class="nav">
                <ul>
                    <li><a href="index.php">Trang chủ</a></li>
                    <li><a href="index.php?act=sanpham">Sản phẩm</a></li>
                    <li><a href="index.php?act=baiviet">Về chúng tôi</a></li>
                    <li><a href="#">Liên hệ</a></li>
                </ul>
            </div>
            <div class="items-icon">
                <i class="bx bx-search"></i>
                <?php
                if (isset($_SESSION['TenDangNhap'])) {
                    // extract($_SESSION['TenDangNhap']);
                ?>
                    <a href="index.php?act=myaccount&id=<?php print_r($_SESSION['TenDangNhap']['MaTaiKhoan']) ?>"><i class='bx bxs-user-circle' style="color: black;"></i></a>
                    <a href="index.php?act=cart"><i class="bx bx-cart" style="color: black;"></i></i></a>
                <?php
                } else {
                ?>
                    <a href="index.php?act=dangnhap"><i class='bx bx-user-plus' style="color: black;"></i></a>
                    <a href="index.php?act=dangnhap"><i class="bx bx-cart" style="color: black;"></i></i></a>

                <?php
                } ?>
                <!--<button onclick="hienTrangDangNhap()" style="border: none; background: white;"><i class="bx bx-user"></i></button> -->
            </div>
        </div>
    </header>