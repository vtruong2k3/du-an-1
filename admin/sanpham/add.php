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
                <form action="index.php?act=addSanPham" method="post" enctype="multipart/form-data">
                    <div class="row-detail">
                        <label for="TenSanPham">Tên sản phẩm:</label>
                        <input type="text" name="TenSanPham" id="TenSanPham" required title="Vui lòng nhập tên sản phẩm">
                    </div>
                    <div class="row-detail">
                        <label for="MoTa">Mô tả:</label>
                        <textarea name="MoTa" id="MoTa" rows="5" required></textarea>
                    </div>
                    <div style="display: flex;gap:50px">
                        <div class="row-detail">
                            <label for="Gia">Giá:</label>
                            <input type="number" name="Gia" id="Gia" required>
                        </div>
                        <div class="row-detail">
                            <label for="GiaSale">Giá sale:</label>
                            <input type="number" name="GiaSale" id="GiaSale" step="0.01" min="0" max="100" placeholder="%...">
                        </div>
                        <div class="row-detail">
                            <label for="TenDanhMuc">Tên danh mục:</label>
                            <select name="MaDanhMuc" id="MaDanhMuc" required>
                                <?php
                                foreach ($listDanhMuc as $danhmuc) {
                                    if ($danhmuc) {
                                        extract($danhmuc);
                                        echo '
                                            <option value="' . $MaDanhMuc . '">' . $TenDanhMuc . '</option>
                                            ';
                                    }
                                }


                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row-detail">
                        <label for="SoLuong">Số lượng trong kho:</label>
                        <input type="number" name="SoLuongTrongKho" id="SoLuongTrongKho" required>
                    </div>
                    <div class="row-detail">
                        <label for="HinhAnh">Hình ảnh:</label>
                        <input type="file" name="HinhAnh" id="HinhAnh" required style="border: none;">
                        <img id="previewImage" style="width: 200px; height: 200px;">
                    </div>
                    <div style="display: flex;gap:50px">
                        <!-- <div class="row-detail">
                            <label for="MauSac">Màu sắc:</label>
                            <label for="MauSac">1</label>
                            <input type="color" name="MauSac[]" id="MauSac" required>
                            <label for="MauSac">2</label>
                            <input type="color" name="MauSac[]" id="MauSac">
                            <label for="MauSac">3</label>
                            <input type="color" name="MauSac[]" id="MauSac">
                        </div> -->
                        <div class="row-detail">
                            <label for="MauSac">Màu sắc:</label>
                            <div id="color-inputs">
                                <div id="add-color-btn" style="width:100%;background-color:grey;color:white;cursor: pointer;padding:5px;text-align: center;">Thêm màu</div>
                                <div class="color-input-group">
                                    <!-- <label for="MauSac">1</label>
                                    <input type="color" name="MauSac[]" id="MauSac" required>
                                    <div class="remove-color-btn" data-index="1">X</div> -->
                                </div>
                            </div>
                        </div>

                        <div class="row-detail">
                            <label for="KichThuoc">Kích thước:</label>
                            <label for="KichThuoc">1</label>
                            <input type="text" name="KichThuoc[]" id="KichThuoc" required>
                            <label for="KichThuoc">2</label>
                            <input type="text" name="KichThuoc[]" id="KichThuoc">
                            <label for="KichThuoc">3</label>
                            <input type="text" name="KichThuoc[]" id="KichThuoc">
                        </div>
                    </div>
                    <div class="row-detail">
                        <input type="submit" value="Thêm sản phẩm" name="addSanPham" style="background-color:black; color: white">
                    </div>
                </form>
                <!-- =========== -->
            </div>
        </div>
    </div>
</div>