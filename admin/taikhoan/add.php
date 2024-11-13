<div class="danhmuc">
    <div class="list-danhmuc">
        <div class="list-danhmuc__title">
            <h2>Thêm Tài Khoản</h2>
        </div>
        <div style="display: flex; justify-content: space-between; margin: 20px 0; align-items: center;border: 1px solid rgba(128, 128, 128, 0.349); border-radius: 10px; padding:10px 20px">
            <div class="list-danhmuc__add">
                <a href="index.php?act=listSanPham"><i class='bx bx-arrow-back'></i><input type="button" value=" Quay lại"></a>
            </div>
        </div>
        <form action="index.php?act=addTaiKhoanAdmin" method="post">
            <div class="list-danhmuc__content list-sanpham__content">
                <div class="sanpham-detail">
                    <div class="row-detail">
                        <label for="Ten">Tên tài khoản:</label>
                        <input type="text" id="TenTaiKhoan" name="Ten" required>
                    </div>
                    <div class="row-detail">
                        <label for="Email">Email:</label>
                        <input type="email" id="Email" name="Email" required>
                    </div>
                    <div class="row-detail">
                        <label for="SoDienThoai">Số điện thoại:</label>
                        <input type="tel" id="SoDienThoai" name="SoDienThoai" pattern="[0-9]{10,11}" title="Số điện thoại phải gồm 10-11 chữ số">
                    </div>
                    <div class="row-detail">
                        <label for="DiaChi">Địa chỉ:</label>
                        <input type="text" id="DiaChi" name="DiaChi">
                    </div>
                    <div class="row-detail">
                        <label for="TenDangNhap">Tên đăng nhập:</label>
                        <input type="text" id="TenDangNhap" name="TenDangNhap" required>
                    </div>
                    <div class="row-detail">
                        <label for="MatKhau">Mật khẩu:</label>
                        <input type="password" id="MatKhau" name="MatKhau" required>
                    </div>
                    <div class="row-detail">
                        <input type="submit" name="addTaiKhoanAdmin" value="Xác nhận" style="width:500px;margin:0 auto;margin-top: 50px;background-color:black; color:white;cursor: pointer;">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>