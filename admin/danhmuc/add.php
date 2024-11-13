<div class="add-danhmuc">
    <div class="add-danhmuc__title">
        <!-- <i class='bx bxs-category'></i> -->
        <h2>Thêm Danh Mục</h2>
    </div>
    <form action="index.php?act=addDanhMuc" method="post">
        <div class="input">
            <!-- <label for="name">Danh Mục:</label> -->
            <input type="text" id="" name="TenDanhMuc" placeholder="Nhập tên danh mục">
            <?= $err ?>
        </div>

        <div class="submit">
            <input type="submit" value="Thêm" name="addDanhMuc">
        </div>
        <?php
        if (isset($thongbao) && ($thongbao != '')) echo $thongbao;
        ?>
    </form>
</div>