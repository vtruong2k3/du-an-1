    <section class="myaccount">
        <div class="container">
            <div class="account-title">
                <h1>Đơn đặt hàng</h1>
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
                            <li><a href="index.php?act=donhang&id=<?php print_r($_SESSION['TenDangNhap']['MaTaiKhoan']) ?>">Đơn đặt hàng</a></li>
                            <li><a href="#">Danh sách yêu thích</a></li>
                            <li><a href="index.php?act=thoat">Đăng xuất</a></li>
                        </ul>
                    </div>
                </div>
                <div class="donhang" style="flex:1">
                    <div class="link">
                        <ul style="display: flex;justify-content: space-between;margin: 0 40px;">
                            <li style="border-bottom: 1px solid black;"><a href="index.php?act=donhang&id=<?php print_r($_SESSION['TenDangNhap']['MaTaiKhoan']) ?>&tt=1" style="color: black;">Đang sử lý</a></li>
                            <li style="border-bottom: 1px solid black;"><a href="index.php?act=donhang&id=<?php print_r($_SESSION['TenDangNhap']['MaTaiKhoan']) ?>&tt=2" style="color: black;">Đã xác nhận</a></li>
                            <li style="border-bottom: 1px solid black;"><a href="index.php?act=donhang&id=<?php print_r($_SESSION['TenDangNhap']['MaTaiKhoan']) ?>&tt=3" style="color: black;">Đã giao hàng</a></li>
                            <li style="border-bottom: 1px solid black;"><a href="index.php?act=donhang&id=<?php print_r($_SESSION['TenDangNhap']['MaTaiKhoan']) ?>&tt=4" style="color: black;">Đã hủy</a></li>
                        </ul>
                    </div>
                    </form>
                    <?php
                    if ($_GET['tt'] == 1) {
                    ?>
                        <div class="product-cart" style="justify-content: center;margin: 0 40px;margin-top:50px">
                            <div class="product-cart__table" style="width: 100%;text-align: center;">
                                <form action="index.php?act=chitietthanhtoan" method="post" style="text-align: left;">
                                    <?php
                                    foreach ($listThongTin as $key) {
                                        if ($key) {
                                            extract($key);
                                            echo '
                                            <div style="border-top: 1px solid black;border-button: 1px solid black;text-align: left;padding:20px;display: flex;flex-direction: column;gap: 10px;">
                                                <h3>Mã đơn hàng: <span style="font-weight: 400;">' . $MaDonHang . '</span> </h3>
                                                <h3>Ngày đặt hàng: <span style="font-weight: 400;">' . $NgayDatHang . '</span> </h3>
                                                <h3>Trạng thái đơn hàng<span style="font-weight: 400;">' . $TrangThaiDonHang . '</span> </h3>
                                                <h3>Phương thức thanh toán: <span style="font-weight: 400;">' . $PhuongThucThanhToan . '</span> </h3>
                                                <h3>Địa chỉ giao: <span style="font-weight: 400;">' . $DiaChi . '</span> </h3>
                                                <h3>Tổng đơn hàng: <span style="font-weight: 400;">' . $TongDonHang . '</span> </h3>
                                                <a href="" style="color:green">Chi tiết</a> <br>
                                                <p>Đang sử lý</p>
                                                <input type="submit" value="Hủy đơn hàng" name="huyDonHang" style="padding: 5px;">
                                            </div>
                                            
                                            ';
                                        }
                                    }
                                    ?>

                                    <!-- dh.MaDonHang, 
                                    dh.NgayDatHang, 
                                    dh.NgayGiaoHang, 
                                    dh.TrangThaiDonHang, 
                                    ctdh.SoLuong, 
                                    ctdh.MauSac, 
                                    sp.TenSanPham, 
                                    ctdh.Gia,
                                    dh.TongDonHang,
                                    sp.HinhAnh -->
                                    <!-- <a href="">Chi tiết</a>
                                    <h3>Tên sản phẩm: <span style="font-weight: 400;">dsfg</span></h3>
                                    <h3>Hình ảnh: <span style="font-weight: 400;">dsfg</span></h3>
                                    <h3>Số lượng: <span style="font-weight: 400;">dsfg</span></h3>
                                    <h3>Màu sắc: <span style="font-weight: 400;">dsfg</span></h3>
                                    <h3>Giá: <span style="font-weight: 400;">dsfg</span></h3>
                                    <div class="discount" style="width:500px;margin:0 auto;"> -->
                                    <!-- <h3>Bạn có mã giảm giá ?</h3>
                        <p>Thêm mã của bạn để được giảm giá giỏ hàng ngay lập tức</p>
                        <div>
                            <input type="text" placeholder="Mã giảm giá" />
                            <input type="submit" value="Áp dụng" name="apDungGiamGia">
                        </div> -->
                                    <input type="submit" name="chitietthanhtoan" value="Hủy đơn hàng" style="background-color: black;color:white;width:50%; margin-top: 30px; padding:10px;cursor: pointer;">
                            </div>
                            </form>
                        </div>
                </div>
            <?php
                    } else if ($_GET['tt'] == 2) {
                        echo '';
            ?>
            <?php
                    } else if ($_GET['tt'] == 3) {
                        echo '';
            ?>
            <?php
                    } else if ($_GET['tt'] == 4) {
                        echo '';
            ?>
            <?php
                    }
            ?>
            </div>
        </div>
        </div>
        </div>
    </section>