<section id="page-header">
    <div class="container">
        <div class="title">
            <div class="link-group"><a href="">Trang chủ</a> <span>/</span> <a href="">Tất cả sản phẩm</a></div>
            <h1>Tất cả sản phẩm</h1>
            <p>Hãy thiết kế nơi bạn luôn tưởng tượng</p>
        </div>
    </div>
</section>

<!-- Product start -->
<section id="product">
    <div class="container">
        <div class="products">
            <form action="index.php?act=sanpham&page=1" method="post" class="product-slidebar">
                <!-- <div class=" product-slidebar"> -->
                <div class="filter">
                    <i class="bx bx-filter"></i>
                    <h3>Bộ lọc</h3>
                </div>
                <div class="categories">
                    <h4>Loại</h4>
                    <select name="MaDanhMuc" id="MaDanhMuc" style="width:150px; padding:5px 10px;margin-right: 20px;border-radius: 5px;">
                        <?php
                        // echo $MaDanhMuc;
                        if ($MaDanhMuc == 0) {
                        ?>;
                        <option value="0" selected>Tất cả</option>
                        <?php
                        } else {
                        ?>;
                        <option value="0" selected>Tất cả</option>
                        <option value="<?= $MaDanhMuc ?>" selected><?= $TenDanhMuc_one ?></option>
                    <?php }; ?>
                    <?php
                    foreach ($listDanhMuc as $danhmuc) {
                        if ($danhmuc) {
                            extract($danhmuc);
                            if ($TenDanhMuc_one === $danhmuc['TenDanhMuc']) {
                                echo '
                                                    <option value="' . $MaDanhMuc . '" hidden>' . $TenDanhMuc . '</option>
                                                ';
                            } else {
                                echo '
                                            <option value="' . $MaDanhMuc . '">' . $TenDanhMuc . '</option>
                                            ';
                            }
                        }
                    }
                    ?>
                    </select>
                </div>
                <div class="price">
                    <h4>Giá</h4>
                    <div class="price-from">
                        <p>Từ 100.000VNĐ - 200.000VNĐ</p>
                        <input type="checkbox" />
                    </div>
                    <div class="price-from">
                        <p>Từ 300.000VNĐ - 400.000VNĐ</p>
                        <input type="checkbox" />
                    </div>
                    <div class="price-from">
                        <p>Từ 500.000VNĐ - 600.000VNĐ</p>
                        <input type="checkbox" />
                    </div>
                    <div class="price-from">
                        <p>Từ 700.000VNĐ - 800.000VNĐ</p>
                        <input type="checkbox" />
                    </div>
                    <div class="price-from">
                        <p>Từ 900.000VNĐ+</p>
                        <input type="checkbox" />
                    </div>
                    <!-- </div> -->
                </div>
                <input type="submit" name="LocSanPham" value="Lọc" style="padding: 10px 20px;font-size: 20px;background-color: black;color: white;border-radius: 5px;cursor: pointer;margin-top: 20px">
            </form>

            <div class="product-grids">
                <div class="toolbar">
                    <h3>Tất cả các phòng</h3>
                    <div class="toolbar-element">
                        <div class="sortby">Sắp xếp theo <i class="bx bx-chevron-down"></i></div>
                        <div class="toolbar-grid">
                            <i class="bx bxs-grid"></i>
                            <i class="bx bxs-grid-alt"></i>
                            <i class="bx bx-list-ul"></i>
                        </div>
                    </div>
                </div>
                <div class="list-product">
                    <?php
                    $count = 0;
                    foreach ($listsanpham_perpage as $sanpham) {
                        $the = '';
                        if ($sanpham) {
                            extract($sanpham);
                            $HinhAnh = $img_path2 . $HinhAnh;
                            $gia_sale = $GiaSale * 100;
                            $Gia_ApDungSale = number_format($Gia - ($GiaSale * $Gia),);
                            if ($count === 0) $product1 = 'mr12 mb24';
                            if ($count === 1) $product1 = 'mr12 ml12 mb24';
                            if ($count === 2) $product1 = 'mb24 ml12';
                            // $product1 = 'mr12 mb24';
                            // $product2 = 'mr12 mb24';
                            // $product3 = 'mr12 mb24';
                            // if ($count === 0) $the = '<div class="list-product">';
                            // $the = ($count === 2) ? '</div><div class="list-product' : '';
                            if ($count === 2) $the = '</div><div class="list-product">';
                            // $the_mo = '<div class="list-product">';
                            // $the_dong = '</div>';
                            // echo $count;
                            echo '
                            <div class="product-card ' . $product1 . '">
                                <div class="product-card__element">
                                    <img src="' . $HinhAnh . '" alt="" />
                                    <div class="product-card__badges">
                                        <div class="status">New</div>
                                        <div class="promotion">-' . $gia_sale . '%</div>
                                    </div>
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
                                        <a href="index.php?act=chiTietSanPham&id=' . $MaSanPham . '" style="color: black;">
                                                ' . $TenSanPham . '
                                        </a>
                                    </div>
                                    <div class="price">
                                        <p>' . $Gia_ApDungSale . 'VNĐ <span>' . number_format($Gia,) . 'VNĐ</span></p>
                                    </div>
                                </div>
                            </div> ' . $the . '
                        
                        ';
                        }
                        $count++;
                        if ($count > 2) {
                            $count = 0;
                        }
                    }
                    ?>
                </div>
                <!-- <div class="list-product">
                    <div class="product-card mr12 mb24">
                        <div class="product-card__element">
                            <img src="./assets/images/product.png" alt="" />
                            <div class="product-card__badges">
                                <div class="status">New</div>
                                <div class="promotion">-50%</div>
                            </div>
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
                                <a href="./product-details.html" style="color: black;">
                                    Loveseat Sofa
                                </a>
                            </div>
                            <div class="price">
                                <p>100.000VNĐ <span>150.000VNĐ</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="product-card mr12 ml12 mb24">
                        <div class="product-card__element">
                            <img src="./assets/images/product.png" alt="" />
                            <div class="product-card__badges">
                                <div class="status">New</div>
                                <div class="promotion">-50%</div>
                            </div>
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
                    <div class="product-card mb24 ml12">
                        <div class="product-card__element">
                            <img src="./assets/images/product.png" alt="" />
                            <div class="product-card__badges">
                                <div class="status">New</div>
                                <div class="promotion">-50%</div>
                            </div>
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
                </div>
                <div class="list-product">
                    <div class="product-card mr12 mb24">
                        <div class="product-card__element">
                            <img src="./assets/images/product.png" alt="" />
                            <div class="product-card__badges">
                                <div class="status">New</div>
                                <div class="promotion">-50%</div>
                            </div>
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
                    <div class="product-card mr12 ml12 mb24">
                        <div class="product-card__element">
                            <img src="./assets/images/product.png" alt="" />
                            <div class="product-card__badges">
                                <div class="status">New</div>
                                <div class="promotion">-50%</div>
                            </div>
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
                    <div class="product-card ml12 mb24">
                        <div class="product-card__element">
                            <img src="./assets/images/product.png" alt="" />
                            <div class="product-card__badges">
                                <div class="status">New</div>
                                <div class="promotion">-50%</div>
                            </div>
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
                </div> -->

                <!-- buton -->
                <!-- <div class="btn">
                    <button>Xem thêm</button>
                </div> -->
                <div class="page" style="margin-top: 40px;margin-bottom: 10px;text-align: center;">
                    <?php
                    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

                    // Hiển thị liên kết phân trang
                    for ($i = 1; $i <= $totalPages; $i++) {
                        $style = ($i == $current_page) ? 'background-color: #007bff; color: #fff;' : ''; // CSS nội tuyến cho trang hiện tại
                        echo '<a href="index.php?act=sanpham&page=' . $i . '"><input type="button" style="padding: 5px 10px;text-align: center;' . $style . '" value="Trang ' . $i . '"/></a> ';
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product end -->

<!-- Newsletter start -->
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
<!-- Newsletter END -->