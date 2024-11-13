<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./assets/css/style-2.css" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Roboto:ital,wght@0,100;0,300;0,500;1,400;1,500&display=swap" rel="stylesheet" />
    <title>Tài khoản</title>
</head>

<body>
    <section class="myaccount">
        <div class="container">
            <div class="account-title">
                <h1>Tài khoản của tôi</h1>
            </div>
            <div class="account-section">
                <div class="account-section__menu">
                    <div class="user">
                        <img src="./assets/images/user.png" alt="">
                        <i class='bx bx-camera'></i>
                        <h2><?= $Ten; ?></h2>
                    </div>
                    <div class="info">
                        <ul>
                            <li><a href="index.php?act=myaccount&id=<?php print_r($_SESSION['TenDangNhap']['MaTaiKhoan']) ?>">Tài khoản</a></li>
                            <li><a href="#">Địa chỉ</a></li>
                            <li><a href="index.php?act=donhang&id=<?php print_r($_SESSION['TenDangNhap']['MaTaiKhoan']) ?>&tt=1">Đơn đặt hàng</a></li>
                            <li><a href="#">Danh sách yêu thích</a></li>
                            <li><a href="index.php?act=thoat">Đăng xuất</a></li>
                        </ul>
                    </div>
                </div>
                <div class="account-section__detail">
                    <form action="index.php?act=editTaiKhoan" method="post">
                        <div class="details">
                            <h1>Chi tiết tài khoản</h1>
                            <input type="text" name="MaTaiKhoan" value="<?= $MaTaiKhoan ?>" hidden>
                            <label for="">Họ và tên *</label>
                            <input type="text" value="<?= $Ten ?>" name="Ten" placeholder="Họ và tên">
                            <label for="">Tên đăng nhập *</label>
                            <input type="text" value="<?= $TenDangNhap ?>" name="TenDangNhap" placeholder="Tên đăng nhập">
                            <label for="">Email *</label>
                            <input type="text" value="<?= $Email ?>" name="Email" placeholder="Email">
                            <label for="">Số điện thoại *</label>
                            <input type="text" value="<?= $SoDienThoai ?>" name="SoDienThoai" placeholder="Số điện thoại">
                            <label for="">Địa chỉ *</label>
                            <input type="text" value="<?= $DiaChi ?>" name="DiaChi" placeholder="Địa chỉ">
                            <p>Đây sẽ là cách tên của bạn được hiển thị trong phần tài khoản và trong phần đánh giá</p>
                        </div>

                        <div class="password">
                            <h1 style="margin-top: 50px;">Mật khẩu</h1>
                            <input type="text" name="MatKhau" hidden value="<?= $MatKhau ?>">
                            <label for="">Mật khẩu cũ</label>
                            <input type="text" placeholder="Mật khẩu cũ">
                            <label for="">Mật khẩu mới</label>
                            <input type="text" placeholder="Mật khẩu mới">
                            <label for="">Lặp lại mật khẩu mới</label>
                            <input type="text" placeholder="Lặp lại mật khẩu mới">
                        </div>
                        <div class="button">
                            <input type="submit" value="Lưu thay đổi" name="editTaiKhoan" style="width: 100%;background-color: black;color: white;border-radius: 10px;padding: 15px 0;margin-top:50px">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>