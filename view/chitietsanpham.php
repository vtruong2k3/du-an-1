<?php
if (isset($_POST['guibinhluan']) && $_POST['guibinhluan']) {
    $NoiDungBinhLuan = $_POST['NoiDungBinhLuan'];
    $MaSanPham = $_POST['MaSanPham'];
    $MaTaiKhoan  = $_SESSION['TenDangNhap']['MaTaiKhoan'];
    $NgayBinhLuan = date('h:i:sa d/m/Y');
    insert_binhluan($NoiDungBinhLuan, $MaTaiKhoan, $MaSanPham, $NgayBinhLuan);

    echo $NoiDungBinhLuan;
    echo $MaSanPham;
    echo $MaTaiKhoan;
    echo $NgayBinhLuan;
    die();
    header("Location: " . $_SERVER['PHP_SELF']);
}
?>

<!-- start product details -->
<section class="product-details">
    <form action="index.php?act=cart" method="post">
        <div class="container">
            <div class="product-detail__link">
                <ul>
                    <li><a href="index.php">Trang chủ ></a></li>
                    <li><a href="index.php?act=sanpham">Sản phẩm ></a></li>
                    <li><a href=""><?= $TenDanhMuc ?></a></li>
                </ul>
            </div>
            <form action="index.php?act=cart" method="post">
                <div class="product-detail">
                    <div class="product-detail__img">
                        <div class="product-card__element slider">
                            <img src="<?= $HinhAnh ?>" alt="" />
                            <div class="product-card__badges">
                                <div class="status">Mới</div>
                                <div class="promotion">-<?= $gia_sale = $GiaSale * 100; ?>%</div>
                            </div>
                            <div class="arrows">
                                <div class="prew"></div>
                                <div class="next"></div>
                            </div>
                        </div>
                        <div class="thumbnail">
                            <img src=" <?= $HinhAnh ?>" alt="" />
                            <img src=" <?= $HinhAnh ?>" alt="" />
                            <img src=" <?= $HinhAnh ?>" alt="" />
                        </div>
                    </div>

                    <div class="product-detail__content">
                        <div class="title">
                            <h1><?= $TenSanPham ?></h1>
                            <div class="gia" style="display: flex;">
                                <h3><?= $Gia_ApDungSale = number_format($Gia - ($GiaSale * $Gia),) ?>VNĐ</h3>
                                <h3 style="margin-left: 10px; text-decoration:line-through;font-weight: 300;"><?= number_format($Gia,) ?>VNĐ</h3>
                            </div>
                            <div class="reiews">
                                <div class="starts">
                                    <i class="bx bxs-star"></i>
                                    <i class="bx bxs-star"></i>
                                    <i class="bx bxs-star"></i>
                                    <i class="bx bxs-star"></i>
                                    <i class="bx bxs-star-half"></i>
                                </div>
                                <div class="customer"><?= count($listBinhLuan) ?> Đánh giá của khách hàng</div>
                            </div>
                            <div class="describe">
                                <p>
                                    <?= $MoTa ?>
                                </p>
                            </div>
                            <h3 style="margin-bottom: 10px;margin-top: 40px;">Kích thước:</h3>
                            <div class="size" style="display:flex">
                                <?php
                                $count = 0;
                                $checked = '';
                                foreach ($KichThuoc as $KichThuoc) {
                                    $count == 0 ? $checked = 'checked' : $checked = '';
                                    echo '<input type="radio" name="KichThuoc" value="' . $KichThuoc . '" ' . $checked . ' />
                            <label for="' . $KichThuoc . '">' . $KichThuoc . '</label>';
                                    $count++;
                                }


                                ?>
                            </div>
                            <div class="color">
                                <h3 style="margin-bottom: 10px;margin-top: 20px;">Color:</h3>
                                <?php
                                $count = 0;
                                $checked = '';
                                foreach ($MauSac as $MauSac) {
                                    $count == 0 ? $checked = 'checked' : $checked = '';
                                    echo '<input type="radio" name="MauSac" value="' . $MauSac . '" style="background-color: ' . $MauSac . ';" ' . $checked . '>';
                                    $count++;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="quantity">
                            <div class="product-quantity">
                                <div>
                                    <label for="">Số lượng: </label>
                                    <!-- <button class="decrease-quantity">-</button> -->
                                    <input type="number" id="quantity" name="SoLuong" min="1" value="<?= isset($_GET['sl']) && $_GET['sl'] > 0 ? $_GET['sl'] : 1; ?>" style="border: 1px solid black;padding: 5px;border-radius: 5px;margin-left: 20px;" />
                                    <!-- <button class="increase-quantity">+</button> -->
                                </div>
                                <div class="wishlist">
                                    <i class='bx bx-heart'></i>
                                    <p>Yêu thích</p>
                                </div>
                            </div>


                            <input type="text" name="MaSanPham" value="<?= $MaSanPham ?>" hidden>
                            <input type="text" name="HinhAnh" value="<?= $HinhAnh ?>" hidden>
                            <input type="text" name="TenSanPham" value="<?= $TenSanPham ?>" hidden>
                            <!-- <input type="text" name="KichThuoc" value="<?= $KichThuoc ?>" hidden> -->
                            <input type="text" name="Gia" value="<?= $Gia - ($GiaSale * $Gia) ?>" hidden>
                            <input type="submit" value="Thêm vào giỏ hàng" name="themVaoGioHang" style="background-color: black;color:white;padding:10px;width:100%;border-radius:10px;cursor: pointer;">
                        </div>
                        <div class="title-footer">
                            <div class="sku">
                                <h3>SKU: </h3>
                                <p><?= $MaSanPham ?></p>
                            </div>
                            <div class="category">
                                <h3>LOẠI: </h3>
                                <p><?= $TenDanhMuc ?></p>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </form>
</section>
<!-- end product details -->

<!-- start description -->
<section class="product-description">
    <div class="container">
        <div class="description-content">
            <h1 style="font-size: 18px;font-weight: 500; margin: 40px 0;">Miêu tả</h1>
            <p>Thể hiện tinh thần thô sơ, ương ngạnh của nhạc rock ‘n’ roll, loa âm thanh nổi di động Kilburn mang
                hình dáng và âm thanh không thể nhầm lẫn của Marshall, rút ​​dây hợp âm và bắt đầu chương trình trên
                đường.</p> <br> <br>
            <p>Với trọng lượng dưới 7 pound, Kilburn là một sản phẩm nhẹ mang phong cách cổ điển. Đặt tiêu chuẩn là
                một trong những loa có âm lượng lớn nhất trong phân khúc, Kilburn là một người hùng nhỏ gọn, mạnh mẽ
                với âm thanh cân bằng tốt, tự hào có dải âm trung rõ ràng và âm cao mở rộng để tạo ra âm thanh vừa
                rõ ràng vừa rõ ràng. Các nút bấm tương tự cho phép bạn tinh chỉnh các nút điều khiển theo sở thích
                cá nhân của mình trong khi dây đeo bằng da mang phong cách đàn guitar giúp bạn di chuyển dễ dàng và
                đầy phong cách.</p>
        </div>
        <div class="description-img">
            <img src="<?= $HinhAnh ?>" alt="">
            <img src="<?= $HinhAnh ?>" alt="">
        </div>
    </div>
</section>

<!-- start review -->
<section class="product-reviews">
    <div class="container">

        <form method="post" action="index.php?act=binhluan">
            <div class="reviews-title">
                <h2 style="font-size: 18px;font-weight: 500;margin: 40px 0;">Đánh giá</h2>
                <h1>Phản hồi từ khách hàng</h1>
                <div class="start">
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <span><?= count($listBinhLuan) ?> Đánh giá</span>
                </div>
            </div>
            <div class="reviews-button">
                <input type="hidden" name="MaSanPham" value="<?= $MaSanPham ?>">
                <input name="NoiDungBinhLuan" style="display: flex;flex:1;padding:10px;margin-right:20px;border-radius:10px" type="text" placeholder="Nhập bình luận của bạn" required>
                <input type="submit" value="Viết đánh giá" name="guibinhluan" style="background-color: black;color:white;padding:10px;border-radius:10px;cursor: pointer;">
            </div>
        </form>
        <div class="reviews-comments">
            <?php
            // Lấy bình luận từ cơ sở dữ liệu của bạn
            // Ví dụ:
            foreach ($listBinhLuan as $binhluan) {
                if ($binhluan) {
                    extract($binhluan);


                    // echo '<pre>';
                    // print_r($binhluan);
                    // // die();
                    // echo '</pre>';


                    $xoaBinhLuan = "index.php?act=xoaBinhLuan&id=" . $binhluan['MaBinhLuan'];
                    $xoa = "";
                    if (empty($_SESSION['TenDangNhap']) && $_GET['id'] == "") {
                        $xoa = '';
                    } else {
                        $xoa = '<h4><a href="' . $xoaBinhLuan . '"onclick="return confirm(\'Bạn có chắc chắn muốn xóa?\');" style="color:black">Xóa</a></h4>';
                    }
                    echo '
                    <div class="user">
                        <img src="./assets/images/user.png" alt="">
                        <div class="name-position">
                            <h1>' . $binhluan['Ten'] . '</h1>
                            <div class="start" style="margin-bottom: 12px;">';
                    // Hiển thị xếp hạng dựa trên $comment['Rating']
                    // Ví dụ:
                    // for($i = 0; $i < $comment['Rating']; $i++) {
                    //     echo '<i class="bx bxs-star"></i>';
                    // }
                    echo '
                            </div>
                            <p>' . $binhluan['NoiDungBinhLuan'] . '</p>
                            <div style="display: flex;margin: 20px;">
                                <h4 class="mr12">Thích</h4>
                                <h4 class="mr12">Phản hồi</h4>
                                ' . $xoa . '
                            </div>
                        </div>
                    </div>';
                }
            }
            ?>
        </div>
        <!-- <div class="reviews-comments">
            <h1>11 Đánh giá</h1>
            <div class="user">
                <img src="./assets/images/user.png" alt="">
                <div class="name-position">
                    <h1>Sofia Harvetz</h1>
                    <div class="start" style="margin-bottom: 12px;">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                    </div>
                    <p>Tôi đã mua nó cách đây 3 tuần và bây giờ quay lại chỉ để nói “Sản phẩm tuyệt vời”. Tôi thật
                        sự thích nó. At vero eos et Accusamus et iusto odio dignissimos ducimus qui blanditiis
                        praesentium voluptatum deleniti atque tham nhũng et quas molestias ngoại trừ tội lỗi không
                        quan phòng.</p>
                    <div style="display: flex;margin: 20px;">
                        <h4 class="mr12">Thích</h4>
                        <h4>Phản hồi</h4>
                    </div>
                </div>
            </div>

            <div class="user">
                <img src="./assets/images/user.png" alt="">
                <div class="name-position">
                    <h1>Sofia Harvetz</h1>
                    <div class="start" style="margin-bottom: 12px;">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                    </div>
                    <p>Tôi đã mua nó cách đây 3 tuần và bây giờ quay lại chỉ để nói “Sản phẩm tuyệt vời”. Tôi thật
                        sự thích nó. At vero eos et Accusamus et iusto odio dignissimos ducimus qui blanditiis
                        praesentium voluptatum deleniti atque tham nhũng et quas molestias ngoại trừ tội lỗi không
                        quan phòng.</p>
                    <div style="display: flex;margin: 20px;">
                        <h4 class="mr12">Thích</h4>
                        <h4>Phản hồi</h4>
                    </div>
                </div>
            </div>

            <div class="user">
                <img src="./assets/images/user.png" alt="">
                <div class="name-position">
                    <h1>Sofia Harvetz</h1>
                    <div class="start" style="margin-bottom: 12px;">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                    </div>
                    <p>Tôi đã mua nó cách đây 3 tuần và bây giờ quay lại chỉ để nói “Sản phẩm tuyệt vời”. Tôi thật
                        sự thích nó. At vero eos et Accusamus et iusto odio dignissimos ducimus qui blanditiis
                        praesentium voluptatum deleniti atque tham nhũng et quas molestias ngoại trừ tội lỗi không
                        quan phòng.</p>
                    <div style="display: flex;margin: 20px;">
                        <h4 class="mr12">Thích</h4>
                        <h4>Phản hồi</h4>
                    </div>
                </div>
            </div>

            <div class="user">
                <img src="./assets/images/user.png" alt="">
                <div class="name-position">
                    <h1>Sofia Harvetz</h1>
                    <div class="start" style="margin-bottom: 12px;">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                    </div>
                    <p>Tôi đã mua nó cách đây 3 tuần và bây giờ quay lại chỉ để nói “Sản phẩm tuyệt vời”. Tôi thật
                        sự thích nó. At vero eos et Accusamus et iusto odio dignissimos ducimus qui blanditiis
                        praesentium voluptatum deleniti atque tham nhũng et quas molestias ngoại trừ tội lỗi không
                        quan phòng.</p>
                    <div style="display: flex;margin: 20px;">
                        <h4 class="mr12">Thích</h4>
                        <h4>Phản hồi</h4>
                    </div>
                </div>
            </div>
            <div class="btn">
                <button>Xem thêm</button>
            </div>
        </div> -->
    </div>
</section>
<!-- end review -->

<!-- start related -->
<section class="product-related">
    <div class="container">
        <div class="related-title">
            <h1>Những sảm phẩm tương tự</h1>
        </div>
        <div class="related-top">
            <?php
            // $HinhAnh = $img_path2 . $HinhAnh; 
            foreach ($listSanPham_lienquan as $sanpham) {
                if ($sanpham) {
                    extract($sanpham);
                    echo ' 
                    <a href="" style="color:black">                    
                        <div class="product-card">
                            <div class="product-card__element">
                                <img src="./upload/' . $HinhAnh . '" alt="" />
                            </div>

                            <div class=" product-card__content">
                                <div class="rating">
                                    <i class="bx bxs-star"></i>
                                    <i class="bx bxs-star"></i>
                                    <i class="bx bxs-star"></i>
                                    <i class="bx bxs-star"></i>
                                    <i class="bx bxs-star"></i>
                                </div>
                                <div class="title">
                                    <h4>' . $TenSanPham . '</h4>
                                </div>
                                <div class="price">
                                    <p>' . $GiaSale . 'VNĐ <span>' . $Gia . 'VNĐ</span></p>
                                </div>
                            </div>
                        </div> 
                        </a>

                        ';
                }
            }



            ?>



            <!-- <div class="product-card">
                <div class="product-card__element">
                    <img src="" alt="" />
                </div>

                <div class=" product-card__content">
                    <div class="rating">
                        <i class="bx bxs-star"></i>
                        <i class="bx bxs-star"></i>
                        <i class="bx bxs-star"></i>
                        <i class="bx bxs-star"></i>
                        <i class="bx bxs-star"></i>
                    </div>
                    <div class="title">
                        <h4>Loveseat Sofa</h4>
                    </div>
                    <div class="price">
                        <p>100.000VNĐ <span>150.000VNĐ</span></p>
                    </div>
                </div>
            </div> -->

            <!-- <div class="product-card">
                <div class="product-card__element">
                    <img src="./assets/images/product.png" alt="" />
                </div>

                <div class="product-card__content">
                    <div class="rating">
                        <i class="bx bxs-star"></i>
                        <i class="bx bxs-star"></i>
                        <i class="bx bxs-star"></i>
                        <i class="bx bxs-star"></i>
                        <i class="bx bxs-star"></i>
                    </div>
                    <div class="title">
                        <h4>Loveseat Sofa</h4>
                    </div>
                    <div class="price">
                        <p>100.000VNĐ <span>150.000VNĐ</span></p>
                    </div>
                </div>
            </div>

            <div class="product-card">
                <div class="product-card__element">
                    <img src="./assets/images/product.png" alt="" />
                </div>

                <div class="product-card__content">
                    <div class="rating">
                        <i class="bx bxs-star"></i>
                        <i class="bx bxs-star"></i>
                        <i class="bx bxs-star"></i>
                        <i class="bx bxs-star"></i>
                        <i class="bx bxs-star"></i>
                    </div>
                    <div class="title">
                        <h4>Loveseat Sofa</h4>
                    </div>
                    <div class="price">
                        <p>100.000VNĐ <span>150.000VNĐ</span></p>
                    </div>
                </div>
            </div>

            <div class="product-card">
                <div class="product-card__element">
                    <img src="./assets/images/product.png" alt="" />
                </div>

                <div class="product-card__content">
                    <div class="rating">
                        <i class="bx bxs-star"></i>
                        <i class="bx bxs-star"></i>
                        <i class="bx bxs-star"></i>
                        <i class="bx bxs-star"></i>
                        <i class="bx bxs-star"></i>
                    </div>
                    <div class="title">
                        <h4>Loveseat Sofa</h4>
                    </div>
                    <div class="price">
                        <p>100.000VNĐ <span>150.000VNĐ</span></p>
                    </div>
                </div>
            </div> -->
        </div>

        <div class="btn">
            <button>Xem thêm</button>
        </div>
    </div>
</section>
<!-- end related -->


<!-- start newsletter -->
<section id="newsletter">
    <img src="./assets/images/newsletter.png" alt="" />
    <div class="newsletter-content">
        <h1>Bản tin của chúng tôi</h1>
        <p>Đăng ký nhận ưu đãi, sản phẩm mới và khuyến mãi</p>
        <div class="newsletter-content__form">
            <i class="bx bx-envelope"></i>
            <input type="text" placeholder="Nhập email" />
            <input type="button" value="Đăng kí" />
        </div>
    </div>
</section>
<!-- end newsletter -->