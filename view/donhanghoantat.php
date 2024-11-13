<section class="complete">
    <div class="container">
        <div class="checkout-title">
            <h1 style="margin-top: 60px;">Cảm ơn</h1>
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
            <div class="checkout-item" style="color: #38cb89">
                <div class="item" style="background-color: #38cb89"><span>2</span></div>
                <!-- <a href="index.php?act=chitietthanhtoan"> -->
                <h2 style="color: #38cb89;font-size: 18px;font-weight: 600;margin-left: 20px;">Chi tiết thanh toán</h2>
                <!-- </a> -->
            </div>
            <div class="checkout-item" style="color: black">
                <div class="item" style="background-color: black"><span>3</span></div>
                <a href="index.php?act=donhanghoantat">
                    <h2 style="color: black;font-size: 18px;font-weight: 600;margin-left: 20px;">Đơn hàng hoàn tất</h2>
                </a>
            </div>
        </div>

        <div class="order-complete">
            <h3>Cảm ơn! 🎉</h3>
            <h1>Đơn đặt hàng của bạn đã được nhận</h1>
            <div class="item">
                <?php
                foreach ($_SESSION['cart'] as $key => $value) {
                    echo '
                        <div class="placeholder">
                            <img src="' . $value[0] . '" alt="" />
                            <p>' . $value[2] . '</p>
                        </div>
                        ';
                }

                ?>
                <!-- <div class="placeholder">
                    <img src="./assets/images/product.png" alt="" />
                    <p>2</p>
                </div>
                <div class="placeholder">
                    <img src="./assets/images/product.png" alt="" />
                    <p>2</p>
                </div> -->
            </div>

            <div class="order-detail">
                <div class="title">
                    <p>Mã đặt hàng:</p>
                    <p>Ngày:</p>
                    <p>Tổng:</p>
                    <p>Phương thức thanh toán:</p>
                </div>
                <div class="info">
                    <p>MDH-<?= $MaDonHang ?></p>
                    <p><?= $NgayDatHang ?></p>
                    <p><?= number_format($TongDonHang) ?>VNĐ</p>
                    <p><?= $PhuongThucThanhToan ?></p>
                </div>
            </div>
            <button>Lịch sử mua hàng</button>
        </div>
    </div>
</section>