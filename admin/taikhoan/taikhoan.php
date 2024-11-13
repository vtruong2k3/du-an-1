<div class="title">
            <h1>Tài Khoản</h1>
            </div>
            <div class="tab">
                <table>
                    <thead>
                        <th>ID</th>
                        <th>Họ và tên</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Tên đăng nhập</th>
                        <th>Mật khẩu</th>
                        <th>Vai trò</th>
                    </thead>
                    <tbody>
                       
                            <?php
                            foreach($listtkk as $tk){
                                extract($tk);
                                echo '
                                <tr>
                                    <td>'.$MaTaiKhoan.'</td>
                                    <td>'.$Ten.'</td>
                                    <td>'.$Email.'</td>
                                    <td>'.$SoDienThoai.'</td>
                                    <td>'.$DiaChi.'</td>
                                    <td>'.$TenDangNhap.'</td>
                                    <td>'.$MatKhau.'</td>
                                    <td>'.$VaiTro.'</td>
                                    <td><a href="index.php?act=suatk&MaTaiKhoan='.$MaTaiKhoan.'"> <input type="submit" name="" id="" value="Sửa"></a></td>
                                    <td><a href="index.php?act=xoatk&MaTaiKhoan='.$MaTaiKhoan.'"> <input type="submit" name="" id="" value="Xóa"></a></td>
                                </tr>
                                ';

                            }
                            ?>
                        
                    </tbody>
                </table>
                <div class="button">
                    <a href="index.php?act=themtaikhoan"><input type="submit" name="" id="" value="Thêm tài Khoản"></a>
                </div>
            </div>
          