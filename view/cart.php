<section class="cart">
    <div class="container">
        <div class="checkout-title">
            <h1 style="margin-top: 60px;">Giỏ hàng</h1>
        </div>
        <div class="checkout-process">
            <div class="checkout-item" style="color: black">
                <div class="item" style="background-color: black">
                    <span>1</span>
                </div>
                <a href="index.php?act=cart">
                    <h2 style="color: black;font-size: 18px;font-weight: 600;margin-left: 20px;">Giỏ hàng</h2>
                </a>
            </div>
            <div class="checkout-item" style="color: #6c7275">
                <div class="item" style="background-color: #6c7275"><span>2</span></div>
                <!-- <a href="index.php?act=chitietthanhtoan"> -->
                <h2 style="color: #6c7275;font-size: 18px;font-weight: 600;margin-left: 20px;">Chi tiết thanh toán</h2>
                <!-- </a> -->
            </div>
            <div class="checkout-item" style="color: #6c7275">
                <div class="item" style="background-color: #6c7275"><span>3</span></div>
                <!-- <a href="index.php?act=donhanghoantat"> -->
                <h2 style="color: #6c7275;font-size: 18px;font-weight: 600;margin-left: 20px;">Đơn hàng hoàn tất</h2>
                <!-- </a> -->
            </div>
        </div>

        <div class="product-cart" style="justify-content: center;">
            <div class="product-cart__table" style="width: 100%;text-align: center;">
                <form action="index.php?act=chitietthanhtoan" method="post">
                    <table style="text-align: center;">
                        <!-- <caption>Bảng thông tin sinh viên</caption> -->
                        <thead>
                            <tr>
                                <th style="text-align: left;">Sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Kích thước</th>
                                <th>Màu sắc</th>
                                <th>Giá</th>
                                <!-- <th>Tổng</th> -->
                                <th>Thao tác</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $TongDonHang = 0;
                            $i = 0;
                            if (isset($_SESSION['cart']) && $_SESSION['cart'] > 0) {
                                foreach ($_SESSION['cart'] as $key => $value) {
                                    if (isset($_SESSION['cart'][2]) && $_SESSION['cart'][2] > 0) {
                                        $value[2] +=  $_SESSION['cart'][2];
                                    }
                                    // echo "<pre>";
                                    // print_r($_SESSION['cart']);
                                    // echo "</pre>";
                                    echo '
                                <tr>
                                    <td class="sanpham">
                                        <img src="' . $value[0] . '" alt="" />
                                        <h4><a style="color:black" href="index.php?act=chiTietSanPham&id=' . $value[6] . '&sl=' . $value[2] . '">' . $value[1] . '</a></h4>
                                    </td>
                                    <td><input type="number" value="' . (int)$value[2] . '" style="padding:10px;width:80px;text-align: center;"  min="0" disabled/></td>
                                    <td><input type="text" value="' . $value[3] . '" style="padding:10px;width:80px;text-align: center;" disabled/></td>
                                    <td><input type="color" value="' . $value[4] . '" style="padding: unset;" disabled/></td>
                                    <td class="gia" >' . number_format((int)$value[5] * (int)$value[2]) . 'VNĐ</td>
                                    <td><a href="index.php?act=xoaDonHang&id=' . $key = $i . '"><i class="bx bx-trash-alt" style="color:black"></i></a></td>
                                </tr>
                                ';
                                    // var_dump($value[5]);
                                    // var_dump($TongDonHang);
                                    $i++;
                                    $TongDonHang += (int) $value[5] * (int)$value[2];
                                }
                            }
                            ?>
                            <tr>
                                <td>
                                    <h4>Tổng đơn hàng:</h4>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><?= number_format($TongDonHang) ?>VNĐ</td>
                                <td><a href="index.php?act=xoaDonHang" style="cursorr:poiter;color:black">Xóa tất cả</a></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="discount" style="width:500px;margin:0 auto;">
                        <!-- <h3>Bạn có mã giảm giá ?</h3>
                        <p>Thêm mã của bạn để được giảm giá giỏ hàng ngay lập tức</p>
                        <div>
                            <input type="text" placeholder="Mã giảm giá" />
                            <input type="submit" value="Áp dụng" name="apDungGiamGia">
                        </div> -->
                        <input type="submit" name="chitietthanhtoan" value="Tiến hành thanh toán" style="background-color: black;color:white;width:100%; margin-top: 30px; padding:10px;cursor: pointer;">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>