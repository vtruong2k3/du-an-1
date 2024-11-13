<section class="checkout">
    <div class="container">
        <div class="checkout-title">
            <h1 style="margin-top: 60px;">Thanh toán</h1>
        </div>
        <div class="checkout-process">
            <div class="checkout-item" style="color: #38cb89">
                <div class="item" style="background-color: #38cb89">
                    <span>1</span>
                </div>
                <a href="index.php?act=cart">
                    <h2 style="color: #38cb89;font-size: 18px;font-weight: 600;margin-left: 20px;">Giỏ hàng</h2>
                </a>
            </div>
            <div class="checkout-item" style="color: black">
                <div class="item" style="background-color: black"><span>2</span></div>
                <a href="index.php?act=chitietthanhtoan">
                    <h2 style="color: black;font-size: 18px;font-weight: 600;margin-left: 20px;">Chi tiết thanh toán</h2>
                </a>
            </div>
            <div class="checkout-item" style="color: #6c7275">
                <div class="item" style="background-color: #6c7275"><span>3</span></div>
                <!-- <a href=""> -->
                <h2 style="color: #6c7275;font-size: 18px;font-weight: 600;margin-left: 20px;">Đơn hàng hoàn tất</h2>
                <!-- </a> -->
            </div>
        </div>
        <form action="index.php?act=chitietthanhtoan" method="post">
            <div class="checkout-cart">
                <div class="checkout-cart__form">
                    <div class="info bd">
                        <h2>Thông tin liên hệ</h2>
                        <div class="name">
                            <label for="">Tên</label>
                            <input type="text" name="MaKhachHang" value="<?= $MaTaiKhoan ?>" hidden>
                            <input type="text" name="Ten" value="<?= $Ten ?>" placeholder="Tên" />
                        </div>
                        <div class="phone">
                            <label for="">Số điện thoại</label>
                            <input type="text" name="SoDienThoai" value="<?= $Ten ?>" placeholder="Phone number" />
                        </div>
                        <div class="email">
                            <label for="">Email</label>
                            <input type="text" name="Email" value="<?= $Email ?>" placeholder="Email" />
                        </div>
                        <div class="diachi">
                            <label for="">Địa chỉ</label>
                            <input type="text" name="DiaChi" value="<?= $DiaChi ?>" placeholder="Địa chỉ" />
                        </div>
                    </div>

                    <!-- <div class="address bd">
                    <h2>Địa chỉ giao hàng</h2>
                    <label for="">Địa chỉ đường phố *</label>
                    <input type="text" placeholder="Địa chỉ đường phố" />
                    <label for="">Quốc gia *</label>
                    <input type="text" placeholder="Quốc gia" />
                    <label for="">Thị trấn / Thành phố *</label>
                    <input type="text" placeholder="Thị trấn / Thành phố" />
                    <div class="checkbox" style="">
                        <input type="checkbox" name="" id="" />
                        <p>Sử dụng địa chỉ thanh toán khác (tùy chọn)</p>
                    </div>
                </div> -->
                    <div class="payment bd">
                        <h2>Vận chuyển</h2>
                        <?php
                        $count = 0;
                        foreach ($listVanChuyen as $key) {
                            // var_dump($key['PhiVanChuyen']);
                            // die();
                            $checked = $count == 0 ? 'checked' : '';
                            if ($key) {
                                extract($key);
                                echo '
                                    <div class="element">
                                        <input type="radio" name="PhiVanChuyen" value="' . $PhiVanChuyen . '" '.$checked.' />
                                        <input type="text" name="MaVanChuyen" value="' . $MaVanChuyen . '" hidden />
                                        <div>
                                            <label for="">' . $TenVanChuyen . '</label>
                                            <label for=""><span style="color:gray;">' . number_format($PhiVanChuyen) . 'VNĐ</span></label>
                                        </div>
                                    </div>
                                    ';
                                    $count ++;
                            }
                        }
                        ?>
                        <!-- <div class="element">
                            <input type="radio" name="PhiVanChuyen" value="30000" checked />
                            <div>
                                <label for="">Nhanh</label>
                                <label for=""><span style="color:gray;">30,000VNĐ</span></label>
                            </div>
                        </div>
                        <div class="element">
                            <input type="radio" name="PhiVanChuyen" value="25000" />
                            <div>
                                <label for="">Giao hàng tiết kiệm</label>
                                <label for=""><span style="color:gray;">25,000VNĐ</span></label>
                            </div>
                        </div> -->
                    </div>

                    <div class="payment bd">
                        <h2>Phương thức thanh toán</h2>
                        <div class="element">
                            <input type="radio" name="thanhtoan" value="Thanh toán khi nhận hàng" checked />
                            <label for="">Thanh khi nhận hàng</label>
                        </div>
                        <div class="element">
                            <input type="radio" name="thanhtoan" value="Thanh toán bằng thẻ" />
                            <label for="">Thanh toán bằng thẻ</label>
                        </div>

                    </div>
                    <div class="button">
                        <input type="submit" name="DatHang" value="Đặt hàng" style="width: 100%;background-color: black;color: white;border-radius: 10px;padding: 15px 0;">
                        <!-- <button><a href="./complete.html">Đặt hàng</a></button> -->
                    </div>
                </div>
                <div class="checkout-cart__order bd">
                    <div class="title">
                        <h2>Tóm tắt đơn hàng</h2>
                    </div>

                    <table>
                        <tbody>
                            <?php
                            $TongDonHang = 0;
                            $i = 0;
                            if (isset($_SESSION['cart']) &&  $_SESSION['cart'] > 0) {
                                foreach ($_SESSION['cart'] as $key => $value) {
                                    // echo "<pre>";
                                    // print_r($_SESSION['cart']);
                                    // echo "</pre>";
                                    echo '
                                    <tr style="display: flex; align-items: center;justify-content: space-between;gap:50px">
                                        <td class="sanpham">
                                            <img src="' . $value[0] . '" alt="" />
                                            <div class="df-column">
                                                <h4>' . $value[1] . '</h4>
                                                <p>Màu: <input type="color" value="' . $value[4] . '" class="soluong" style="padding: unset;" disabled/></p>
                                                <p>Kích thước: <input type="text" value="' . $value[3] . '" class="soluong" disabled/></p>
                                                <p>Số lượng: <input type="number" value="' . $value[2] . '" class="soluong" disabled/></p>
                                            </div>
                                        </td>
                                        <td>' . number_format($value[5] * $value[2]) . 'VNĐ</td>
                                    </tr>                             
                                ';
                                    $i++;
                                    $TongDonHang += (int) $value[5] * $value[2];
                                }
                            }
                            if ($flag == true) {
                                $TongDonHang = $TongDonHang_Giam;
                            }
                            ?>
                            <!-- <td>
                            <h1 style="margin-bottom: 30px;">Tổng tiền:</h1>
                            <p style="font-size: 20px;"><?= number_format($TongDonHang) ?>VNĐ</p>
                        </td> -->
                        </tbody>
                    </table>
                    <div class="discount" style="margin:30px 0">
                        <h3 style="margin-bottom:10px">Bạn có mã giảm giá ?</h3>
                        <p>Thêm mã của bạn để được giảm giá giỏ hàng ngay lập tức</p>
                    </div>
                    <div class="coupon">
                        <input type="radio" name="vanchuyen" value="<? $vanchuyen ?>" hidden />
                        <input type="text" name="TongDonHang" value="<?= (int) $TongDonHang ?>" hidden>
                        <input type="text" name="MaGiamGia" value="<?= isset($MaGiamGia) ? $MaGiamGia : '' ?>" hidden>
                        <input type="text" name="TenMaGiamGia" placeholder="Nhập mã" />
                        <input type="submit" name="addMaGiamGia" value="Áp dụng" style="padding: 12px 26px; background-color: black;color: white;border-radius: 5px;width: 130px;text-align: center;">
                        <!-- <button>Áp dụng</button> -->
                    </div>

                    <div class="content">
                        <?= $errVouCher ?>
                        <div class="discout-code df m24">
                            <p><i class="bx bx-purchase-tag-alt"></i> Áp dụng mã giảm giá</p>
                            <p style="text-align: right;"> - <?php echo number_format($GiaTriGiam) ?>VNĐ</p>
                        </div>
                        <div class="shiping df m24">
                            <p>Vận chuyển</p>
                            <p id="shippingCost">30,000VNĐ</p>
                        </div>
                        <!-- <div class="subtotal df m24">
                        <p>Tổng phụ</p>
                        <p>199.000VNĐ</p>
                    </div> -->
                        <div class="total df m24">
                            <p>Tổng đơn hàng</p>
                            <strong>
                                <p id="totalCost"></p>
                            </strong>
                        </div>
                    </div>
                </div>
            </div>
        </form>
</section>