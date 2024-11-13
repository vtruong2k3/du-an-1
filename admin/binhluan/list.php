<div class="danhmuc">
    <div class="list-danhmuc">
        <div class="list-danhmuc__title">
            <!-- <i class='bx bxs-category'></i> -->
            <h2>Danh Sách Bình Luận</h2>
        </div>
        <!-- <div style="display: flex; justify-content: space-between; margin: 20px 0; align-items: center;border: 1px solid rgba(128, 128, 128, 0.349); border-radius: 10px; padding:10px 20px">
      <div class="list-danhmuc__show">
        <form action="index.php?act=listDanhMuc" method="post">
          <label for="" style="margin-right: 5px;">Hiển thị:</label>
          <select name="cars" id="cars">
            <option value="show5" selected>5</option>
            <option value="show10">10</option>
            <option value="show15">15</option>
            <option value="showAll">Tất cả</option>
          </select>
          <input type="submit" value="Xác nhận" name="show">
        </form>
      </div>
      <div class="list-danhmuc__add">
        <a href="index.php?act=addDanhMuc"><i class='bx bx-plus'></i><input type="button" value="Thêm danh mục"></a>
      </div>
    </div> -->
        <div class="list-danhmuc__content">
            <table border="1">
                <thead>
                    <th>STT</th>
                    <th>Mã bình luận</th>
                    <th>Nội dung bình luận</th>
                    <th>Ngày bình luận</th>
                    <th>Mã sản phẩm</th>
                    <th>Mã tài khoản</th>
                    <th>Tên tài khoản</th>
                    <th>Thao tác</th>
                    <button></button>
                </thead>
                <tbody>
                    <?php
                    $count = $offset;
                    foreach ($listsanpham_perpage as $binhluan) {
                        // echo "<pre>";
                        // print_r($danhmuc);
                        // die();
                        if ($binhluan)
                            $rowClass = ($count % 2 === 0) ? 'class="grayRow"' : 'class="whiteRow"';
                        extract($binhluan);
                        // $suadanhmuc = "index.php?act=suaDanhMuc&id=" . $MaDanhMuc;
                        $xoabinhluan = "index.php?act=xoaBinhluan&id=" . $MaBinhLuan;
                        // $confirm = "Bạn có chắc chắn muốn xóa";
                        echo '
                        <tr ' . $rowClass . '>
                            <td>' . $count +  1 . '</td>
                            <td>' . $MaBinhLuan . '</td>
                            <td>' . $NoiDungBinhLuan . '</td>
                            <td>' . $NgayBinhLuan . '</td>
                            <td>' . $MaSanPham  . '</td>
                            <td>' . $MaTaiKhoan . '</td>
                            <td>' . $Ten . '</td>
                            <td>
                            <!--<a href="">i class="bx bxs-edit"></a>-->
                                <a href="' . $xoabinhluan . '"onclick="return confirm(\'Bạn có chắc chắn muốn xóa?\');"><i class="bx bx-trash-alt"></i></a>
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
                // Hiển thị liên kết phân trang
                for ($i = 1; $i <= $totalPages; $i++) {
                    echo '<a href="index.php?act=listBinhLuan&page=' . $i . '"><input type="button" value="Trang ' . $i . '" style="padding: 5px 10px;text-align: center;"/></a> ';
                }
                ?>
            </div>
        </div>
    </div>
</div>