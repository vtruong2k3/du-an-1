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
        <div class=" list-danhmuc__content list-sanpham__content">
            <div class="sanpham-detail">
                <div class="row-detail">
                    <label for="">Mã sản phẩm:</label>
                    <input type="text" value="<?= $MaSanPham ?>" disabled>
                </div>
                <div class="row-detail">
                    <label for="">Tên sản phẩm:</label>
                    <input type="text" value="<?= $TenSanPham ?>" disabled>
                </div>
                <div style="display: flex;justify-content: space-between;">
                    <div class="row-detail">
                        <label for="">Giá:</label>
                        <input type="text" value="<?= $Gia ?>" disabled>
                    </div>
                    <div class="row-detail">
                        <label for="">Giá Sale:</label>
                        <input type="text" value="<?= $GiaSale ?>" disabled>
                    </div>
                    <div class="row-detail">
                        <label for="">Số lượng trong kho:</label>
                        <input type="text" value="<?= $SoLuongTrongKho ?>" disabled>
                    </div>
                </div>
                <div class="row-detail">
                    <label for="">Mô tả:</label>
                    <textarea disabled><?= $MoTa ?></textarea>
                    <!-- <input type="text" value="" disabled> -->
                </div>
                <div class="row-detail">
                    <label for="">Hình ảnh:</label>
                    <img style="height: 500px;" src="<?= $img_path ?>/<?= $HinhAnh ?>" alt="">
                    <input type="text" value="<?= $HinhAnh ?>" disabled>
                </div>
                <div style="display: flex;justify-content: space-between;">
                    <div class="row-detail">
                        <label for="">Tên danh mục:</label>
                        <input type="text" value="<?= $TenDanhMuc ?>" disabled>
                    </div>
                    <div class="row-detail">
                        <label for="">Kích thước:</label>
                        <input type="text" value="<?= $KichThuoc ?>" disabled>
                    </div>
                    <div class="row-detail">
                        <label for="">Màu sắc:</label>
                        <div style="width: 100%;height: 30px;background-color:<?= $MauSac ?>"></div>
                    </div>
                    <div class="row-detail">
                        <label for="">Lượt xem:</label>
                        <input type="text" value="<?= $LuotXem ?>" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>