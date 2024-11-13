<div class="danhmuc">
    <div class="list-danhmuc">
        <div class="list-danhmuc__title">
            <!-- <i class='bx bxs-category'></i> -->
            <h2>Danh Sách Tài Khoản User</h2>
        </div>
        <div style="display: flex; justify-content: space-between; margin: 20px 0; align-items: center;border: 1px solid rgba(128, 128, 128, 0.349); border-radius: 10px; padding:10px 20px">
            <!-- <div class="list-danhmuc__show">
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
            </div> -->
            <!-- <div class="list-danhmuc__add">
                <a href="index.php?act=addTaiKhoanAdmin"><i class='bx bx-plus'></i><input type="button" value="Thêm tài khoản"></a>
            </div> -->
            <form action="" method="post">
                <label for="">Tìm kiếm</label>
                <input type="text" name="tenTaiKhoan" style="padding: 5px;" placeholder="Mời nhập tên">
                <input type="submit" value="Xác nhận" style="padding: 5px; background-color: black;color: white;border-radius:5px;cursor: pointer;" name="locTaiKhoanUser">
            </form>
        </div>
        <div class="list-danhmuc__content">
            <table border="1">
                <thead>
                    <th>STT</th>
                    <!-- <th>Mã tài khoản</th> -->
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Tên đăng nhập</th>
                    <th>Mật khẩu</th>
                    <!-- <th>Sửa</th> -->
                    <th>Xóa</th>
                    <button></button>
                </thead>
                <tbody>
                    <?php
                    $count = 0;
                    foreach ($listTaiKhoanUser as $taikhoan) {
                        if ($taikhoan)
                            $rowClass = ($count % 2 === 0) ? 'class="grayRow"' : 'class="whiteRow"';
                        extract($taikhoan);
                        $suaTaiKhoan = "index.php?act=suaTaiKhoan&id=" . $MaTaiKhoan;
                        $xoaTaiKhoan = "index.php?act=xoaTaiKhoan&id=" . $MaTaiKhoan;
                        // $confirm = "Bạn có chắc chắn muốn xóa";
                        if ($SoDienThoai == '') {
                            $SoDienThoai = '[Trống]';
                        }
                        if ($DiaChi == '') {
                            $DiaChi = '[Trống]';
                        }
                        echo '
                        <tr ' . $rowClass . '>
                            <td>' . $count +  1 . '</td>
                            <!-- <td>' . $MaTaiKhoan . '</td> -->
                            <td>' . $Ten . '</td>
                            <td>' . $Email . '</td>
                            <td>' . $SoDienThoai  . '</td>
                            <td>' . $DiaChi . '</td>
                            <td>' . $TenDangNhap . '</td>
                            <td>' . $MatKhau . '</td>
                            <td>
                                <a href="' . $xoaTaiKhoan . '"onclick="return confirm(\'Bạn có chắc chắn muốn xóa?\');"><i class="bx bx-trash-alt"></i></a>
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
                // for ($i = 1; $i <= $totalPages; $i++) {
                //     echo '<a href="index.php?act=listBinhLuan&page=' . $i . '"><input type="button" value="Trang ' . $i . '" style="padding: 5px 10px;text-align: center;"/></a> ';
                // }
                ?>
            </div>
        </div>
    </div>
</div>