<div class="danhmuc">
    <div class="list-danhmuc">
        <div class="list-danhmuc__title">
            <!-- <i class='bx bxs-category'></i> -->
            <h2>Danh Sách Sản Phẩm</h2>
        </div>
        <div style="display: flex; justify-content: space-between; margin: 20px 0; align-items: center;border: 1px solid rgba(128, 128, 128, 0.349); border-radius: 10px; padding:10px 20px">
            <div class="list-danhmuc__add">
                <a href="index.php?act=addSanPham"><i class='bx bx-plus'></i><input type="button" value="Thêm sản phẩm"></a>
            </div>
            <div>

                <form action="index.php?act=listSanPham&MaDanhMuc=<?= $MaDanhMuc ?>&page=1" method="post">

                    <label for="">Danh mục:</label>
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
                            echo $MaDanhMuc;
                            echo $TenDanhMuc_one;
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
                    <label for="">Tên sản phẩm:</label>
                    <input type="text" style="width:150px; padding:5px 10px;margin-right: 20px;border-radius: 5px;" name="TenSanPham">
                    <input type="submit" name="LocSanPham" value="Xác nhận" style="padding: 5px 10px;text-align: center;background-color: black;color: white;border-radius: 5px;">
                </form>
            </div>
        </div>
        <div class="list-danhmuc__content list-sanpham__content">
            <table border="1">
                <thead>
                    <th>STT</th>
                    <!-- <th>Mã <br> sản phẩm</th> -->
                    <th style="width:250px">Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Tên danh mục</th>
                    <th>Kích thước</th>
                    <th>Màu sắc</th>
                    <th>Chi tiết</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                    <button></button>
                </thead>
                <tbody>
                    <?php
                    $count = $offset;
                    foreach ($listsanpham_perpage as $sanpham) {
                        $listColor = '';
                        if ($sanpham)
                            $rowClass = ($count % 2 === 0) ? 'class="grayRow"' : 'class="whiteRow"';
                        extract($sanpham);
                        $chiTietSanPham = "index.php?act=chiTietSanPham&id=" . $MaSanPham;
                        $suaSanPham = "index.php?act=suaSanPham&id=" . $MaSanPham;
                        $xoaSanPham = "index.php?act=xoaSanPham&id=" . $MaSanPham;
                        $confirm = "Bạn có chắc chắn muốn xóa";

                        // echo "<pre>";
                        $MauSac = explode(",", $MauSac);
                        // var_dump($MauSac);
                        // echo "</pre>";
                        // string(23) "#2469b2,#bb1b1b,#96a716"
                        foreach ($MauSac as $color) {
                            $listColor .= '<div style="width: 100%;height: 30px;background-color:' . $color . '"></div> <br>';
                        }
                        // echo "</pre>";
                        // die();
                        echo '
                            <tr ' . $rowClass . '>
                                <td>' . $count + 1 . '</td>
                                <!-- <td>' . $MaSanPham . '</td> -->
                                <td>' . $TenSanPham . '</td>
                                <td><img src="' . $img_path . '/' . $HinhAnh . '" alt=""></td>
                                <td>' . $TenDanhMuc . '</td>
                                <td>' . $KichThuoc . '</td>
                                <td>' . $listColor . '</td>
                                <td><a href="' . $chiTietSanPham . '"><input type="button" value="Xem" style="border: none;background-color: transparent;cursor: pointer;text-decoration:underline;"/></a></td>
                                <td>
                                    <a href="' . $suaSanPham . '"><i class="bx bxs-edit" ></i></a>
                                </td>
                                <td>
                                    <a href="' . $xoaSanPham . '"onclick="return confirm(\'Bạn có chắc chắn muốn xóa?\');"><i class="bx bx-trash-alt" ></i></a>
                                </td>
                            </tr>
                            ';
                        $count++;
                    }
                    ?>
                </tbody>
            </table>
            <div class="page" style="margin-top: 40px;margin-bottom: 10px;text-align: center;">
                <?php
                for ($i = 1; $i <= $totalPages; $i++) {
                    // Sử dụng phương thức GET để truyền giá trị MaDanhMuc qua URL
                    echo '<a href="index.php?act=listSanPham&MaDanhMuc=' . $MaDanhMuc . '&page=' . $i . '">';

                    // Kiểm tra nếu $i là trang hiện tại
                    if ($i == $currentPage) {
                        echo '<input type="button" value="Trang ' . $i . '" style="padding: 5px 10px;text-align: center;background-color: #ff0000;color: #ffffff;"/>';
                    } else {
                        echo '<input type="button" value="Trang ' . $i . '" style="padding: 5px 10px;text-align: center;"/>';
                    }

                    echo '</a> ';
                }

                ?>
            </div>
        </div>
    </div>
</div>