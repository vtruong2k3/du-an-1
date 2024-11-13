<div class="banner">
    <div class="banner-img">
        <img src="./assets/img/banner/banner.png" alt="">
    </div>
    <div class="banner-icon">
        <img class="i1" src="./assets/img/icon/left.png" alt="">
        <img class="i2" src="./assets/img/icon/right.png" alt="">
    </div>
</div>
<div class="title">
    <div class="title-content">
        <h1>Đơn Giản<span style="color: #6C7275;">/</span><br>Độc Đáo<span style="color: #6C7275;">.</span></h1>
        <p> <strong style="color: black;">Furniro</strong> là cửa hàng quà tặng và đồ trang trí có trụ sở tại TP.HCM,<br>
            Vietnam. Ước tính kể từ năm 2019</p>
    </div>
</div>
<div class="content">
    <div class="row">
        <div class="row-content-one">
            <img style="width: 548px;height: 664px;" src="./assets/img/product/anh1.png" alt="">
            <h1>Phòng khách</h1>
            <a href="#">
                <div class="text">
                    <span>Mua ngay</span>
                    <img src="./assets/img/icon/iconmuiten.png" alt="">
                </div>
            </a>
        </div>

        <div class="row-content-two">
            <img src="./assets/img/product/anh2.png" alt="">
            <h1>Phòng ngủ</h1>
            <a href="#">
                <div class="text">
                    <span>Mua ngay</span>
                    <img src="./assets/img/icon/iconmuiten.png" alt="">
                </div>
            </a>
        </div>

        <div class="row-content-three">
            <img src="./assets/img/product/anh3.png" alt="">
            <h1>Phòng bếp</h1>
            <a href="#">
                <div class="text">
                    <span>Mua ngay</span>
                    <img src="./assets/img/icon/iconmuiten.png" alt="">
                </div>
            </a>
        </div>
    </div>

    <div class="headline">
        <h1>Mới<br>Điểm đến</h1>
        <a href="#">
            <div class="text">
                <span>Nhiều sản phẩm hơn</span>
                <img src="./assets/img/icon/iconmuiten.png" alt="">
            </div>
        </a>
    </div>

    <!-- Top sản phẩm -->
    <div class="row-product">
        <?php
        foreach ($listSanPham as $sanpham) {
            if ($sanpham) {
                extract($sanpham);
                $HinhAnh = $img_path2 . $HinhAnh;
                echo '
                <a href="index.php?act=chiTietSanPham&id=' . $MaSanPham . '" style="cursor: pointer;">
                <div class="row-product-content">
                    <div class="img-product">
                        <a href="index.php?act=chiTietSanPham&id=' . $MaSanPham . '"><img src="' . $HinhAnh  .'" alt="" style="width:300px;object-fit: cover;"></a>
                        <div class="new">
                            <p>NEW</p>
                        </div>
                        <div class="sale">
                            <p>-50%</p>
                        </div>
                    </div>
                    <img class="star" src="./assets/img/icon/star.png" alt="">
                    <h5 style="margin: 20px 0">' . $TenSanPham . '</h5>
                    <div class="money">
                        <span class="m1">' . $GiaSale . 'VNĐ</span>
                        <span class="m2">' . $Gia . 'VNĐ</span>
                    </div>
                </div>    
                </a>
                ';
            }
        }



        ?>

        <!-- <div class="row-product-content">
            <div class="img-product">
                <a href="#"><img src="../upload/a." alt=""></a>
                <div class="new">
                    <p>NEW</p>
                </div>
                <div class="sale">
                    <p>-50%</p>
                </div>
            </div>
            <img class="star" src="./assets/img/icon/star.png" alt="">
            <h5>Table Lamp</h5>
            <div class="money">
                <span class="m1">$199.00</span>
                <span class="m2">$400.00</span>
            </div>
        </div> -->

        <!-- <div class="row-product-content">
            <div class="img-product">
                <a href="#"><img src="./assets/img/product/p3.png" alt=""></a>
                <div class="new">
                    <p>NEW</p>
                </div>
                <div class="sale">
                    <p>-50%</p>
                </div>
            </div>
            <img class="star" src="./assets/img/icon/star.png" alt="">
            <h5>Beige Table Lamp</h5>
            <div class="money">
                <span class="m1">$24.99</span>

            </div>
        </div>

        <div class="row-product-content">
            <div class="img-product">
                <a href="#"><img src="./assets/img/product/p4.png" alt=""></a>
                <div class="new">
                    <p>NEW</p>
                </div>
                <div class="sale">
                    <p>-50%</p>
                </div>
            </div>
            <img class="star" src="./assets/img/icon/star.png" alt="">
            <h5>Bamboo basket</h5>
            <div class="money">
                <span class="m1">$24.99</span>

            </div>
        </div> -->
    </div>
    <!-- End top sản phẩm  -->
    <div class="endow">
        <div class="endow-content">
            <img src="./assets/img/icon/ship.png" alt="">
            <h5>Free Shipping</h5>
            <p>Order above $200</p>
        </div>
        <div class="endow-content">
            <img src="./assets/img/icon/money.png" alt="">
            <h5>Money-back</h5>
            <p>30 days guarantee</p>
        </div>
        <div class="endow-content">
            <img src="./assets/img/icon/lock 01.png" alt="">
            <h5>Secure Payments</h5>
            <p>Secured by Stripe</p>
        </div>
        <div class="endow-content">
            <img src="./assets/img/icon/call.png" alt="">
            <h5>24/7 Support</h5>
            <p>Phone and Email support</p>
        </div>
    </div>
    <div class="sale-product">
        <img src="./assets/img/product/f1.png" alt="">
        <div class="sale-product-content">
            <h5>SALE UP TO 35% OFF</h5>
            <h1>HUNDREDS of<br>New lower prices!</h1>
            <p>It’s more affordable than ever to give every <br>
                room in your home a stylish makeover</p>
            <a href="#">
                <div class="text">
                    <span>Shop now</span>
                    <img src="./assets/img/icon/iconmuiten.png" alt="">
                </div>
            </a>
        </div>
    </div>
    <div class="headline-footer">
        <h1>Articles</h1>
        <a href="#">
            <div class="text">
                <span>More Articles</span>
                <img src="./assets/img/icon/iconmuiten.png" alt="">
            </div>
        </a>
    </div>
    <div class="design">
        <div class="design-content">
            <img src="./assets/img/product/d1.png" alt="">
            <h3>7 ways to decor your home</h3>
            <div class="text">
                <span>Read More</span>
                <img src="./assets/img/icon/iconmuiten.png" alt="">
            </div>
        </div>
        <div class="design-content">
            <img src="./assets/img/product/d2.png" alt="">
            <h3>Kitchen organization</h3>
            <div class="text">
                <span>Read More</span>
                <img src="img/icon/iconmuiten.png" alt="">
            </div>
        </div>
        <div class="design-content">
            <img src="./assets/img/product/d3.png" alt="">
            <h3>Decor your bedroom</h3>
            <div class="text">
                <span>Read More</span>
                <img src="img/icon/iconmuiten.png" alt="">
            </div>
        </div>
    </div>
    <div class="contact">
        <div class="contact-content">
            <img src="./assets/img/banner/banner-footer.png" alt="">
            <h1>Join Our Newsletter</h1>
            <p>Sign up for deals, new products and promotions</p>
            <form action="" method="post">
                <input class="p1" type="text" name="" id="" placeholder="Email address">
                <input class="p2" type="submit" value="Sigup">
            </form>
        </div>
    </div>
</div>
<!-- Phần tử để chứa trang đăng nhập -->
<div id="dangnhapContainer" class="login-container"></div>