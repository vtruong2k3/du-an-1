<div class="danhmuc">
    <div class="list-danhmuc">
        <div class="list-danhmuc__title">
            <!-- <i class='bx bxs-category'></i> -->
            <h2>Chi Tiết Sản Phẩm</h2>
        </div>
        <div style="display: flex; justify-content: space-between; margin: 20px 0; align-items: center;border: 1px solid rgba(128, 128, 128, 0.349); border-radius: 10px; padding:10px 20px">
            <div class="list-danhmuc__add">
                <a href="index.php?act=listSanPham"><i class='bx bx-arrow-back'></i><input type="button" value=" Quay lại"></a>
            </div>
        </div>
        <!-- ========= -->
        <div class=" list-danhmuc__content list-sanpham__content">
            <div class="sanpham-detail add-sanpham">
                <form action="index.php?act=suaSanPham&id=<?= $sanpham['MaSanPham'] ?>" method="post" enctype="multipart/form-data">
                    <input type="text" name="MaSanPham" id="MaSanPham" value="<?= $MaSanPham ?>" hidden>
                    <div class="row-detail">
                        <label for="TenSanPham">Tên sản phẩm:</label>
                        <input type="text" name="TenSanPham" id="TenSanPham" required title="Vui lòng nhập tên sản phẩm" value="<?= $TenSanPham ?>">
                    </div>
                    <div class="row-detail">
                        <label for="MoTa">Mô tả:</label>
                        <textarea name="MoTa" id="MoTa" rows="5" required><?= $MoTa ?></textarea>
                    </div>
                    <div style="display: flex;gap:50px">
                        <div class="row-detail">
                            <label for="Gia">Giá:</label>
                            <input type="number" name="Gia" id="Gia" required value="<?= $Gia ?>">
                        </div>
                        <div class="row-detail">
                            <label for="GiaSale">Giá sale:</label>
                            <input type="number" name="GiaSale" id="GiaSale" value="<?= $GiaSale ?>" step="0.01" min="0" max="100">
                        </div>
                        <div class="row-detail">
                            <label for="TenDanhMuc">Tên danh mục:</label>
                            <select name="MaDanhMuc" id="MaDanhMuc" required>
                                <option value="<?= $MaDanhMuc ?>" selected hidden><?= $TenDanhMuc_one ?></option>
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
                    </div>
                    <div class="row-detail">
                        <label for="SoLuong">Số lượng trong kho:</label>
                        <input type="number" name="SoLuongTrongKho" id="SoLuongTrongKho" required value="<?= $SoLuongTrongKho ?>">
                    </div>
                    <div class="row-detail">
                        <label for="HinhAnh">Hình ảnh:</label>
                        <input type="file" name="HinhAnh" id="HinhAnh" style="border: none;" value="<?= $HinhAnh ?>">
                        <img id="previewImage" style="width: 200px; height: 200px;" src="<?= $img_path ?>/<?= $HinhAnh ?>">
                    </div>
                    <div style="display: flex;gap:50px">
                        <div class="row-detail">
                            <label for="KichThuoc">Kích thước:</label>
                            <?php
                            $count = 0;
                            $KichThuoc = explode(",", $KichThuoc);
                            // var_dump($MauSac);
                            // die();
                            foreach ($KichThuoc as $KichThuoc) {
                                $count == 0 ? $checked = 'checked' : $checked = '';
                                echo '<label for="KichThuoc">' . $count + 1 . '</label>
                                    <input type="text" name="KichThuoc[]" id="KichThuoc" value="' . $KichThuoc . '" ' . $checked . '>';
                                $count++;
                            }

                            ?>
                        </div>
                        <div class="row-detail">
                            <label for="MauSac">Màu sắc:</label>
                            <?php
                            $count = 0;
                            $MauSac = explode(",", $MauSac);
                            // var_dump($MauSac);
                            // die();
                            foreach ($MauSac as $MauSac) {
                                $count == 0 ? $checked = 'checked' : $checked = '';
                                echo '<label for="MauSac">' . $count + 1 . '</label>
                                    <input type="color" name="MauSac[]" id="MauSac" value="' . $MauSac . '" ' . $checked . '>';
                                $count++;
                            }
                            ?>
                        </div>
                    </div>
                    <div class="row-detail">
                        <input type="submit" value="Xác nhân sửa" name="suaSanPham" style="width:500px;margin: 0 auto;background-color: black;color: white;margin-top: 50px;">
                    </div>
                </form>
                <!-- =========== -->
            </div>
        </div>
    </div>
</div>