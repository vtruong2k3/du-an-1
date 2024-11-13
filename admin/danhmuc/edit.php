<div class="add-danhmuc">
    <div class="add-danhmuc__title">
        <!-- <i class='bx bxs-category'></i> -->
        <h2>Sửa Danh Mục</h2>
    </div>
    <form action="index.php?act=suaDanhMuc&id=<?= $danhmuc['MaDanhMuc'] ?>" method="post">
        <div class="" style="text-align: left;">
            <input type="text" name="MaDanhMuc" value="<?= $danhmuc['MaDanhMuc'] ?>" hidden>
            <div style="display: flex;align-items: center;margin: 10px 0">
                <label for="name" style="min-width: 100px;">Trước:</label>
                <input type="text" id="" name="" placeholder="<?= $danhmuc['TenDanhMuc'] ?>" disabled>
            </div>
            <div style="display: flex;align-items: center;margin: 10px 0">
                <label for="name" style="min-width: 100px;">Sau:</label>
                <input type="text" id="" name="TenDanhMuc" placeholder="Nhập thay đổi">
            </div>
            <?= $err ?>
        </div>

        <div class="submit">
            <input type="submit" value="Lưu thay đổi" name="suaDanhMuc">
        </div>
        <?php
        if (isset($thongbao) && ($thongbao != '')) echo $thongbao;
        ?>
    </form>
</div>