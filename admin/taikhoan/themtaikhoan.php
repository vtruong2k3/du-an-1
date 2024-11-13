<div class="title">
    <h1>Thêm tài khoản</h1>
</div>
<div class="form">
    <form action="index.php?act=themtaikhoan" method="post">
        <input type="text" value="<?php if(isset($errTen)&&($errTen!='')){ echo $errTen; } ?>"  name="ten" id="" placeholder="Tên"><br>
        <input type="email" value="<?php if(isset($errEmail)&&($errEmail!='')){ echo $errEmail; } ?>"  name="email" id="" placeholder="Email"><br>
        <input type="text" value="<?php if(isset($errSoDienThoai)&&($errSoDienThoai!='')){ echo $errSoDienThoai; } ?>"  name="soDienThoai" id="" placeholder="Số diện thoại"><br>
        <input type="text" value="<?php if(isset($errDiaChi)&&($errDiaChi!='')){ echo $errDiaChi; } ?>"  name="daiChi" id="" placeholder="Địa chỉ"><br>
        <input type="text" value="<?php if(isset($errTenDangNhap)&&($errTenDangNhap!='')){ echo $errTenDangNhap; } ?>"  name="tenDangNhap" id="" placeholder="Tên Đăng nhập"><br>
        <input type="password" value="<?php if(isset($errMatKhau)&&($errMatKhau!='')){ echo $errMatKhau; } ?>"  name="matKhau" id="Mật khẩu" placeholder="Mật khẩu"><br>
        <input type="submit"  name="them" id="i2" value="Thêm tài khoản">
       
    </form>
    <h2 style="color: red;" class="thongBao">
                    <?php 
                    if(isset($thongBao)&&($thongBao!='')){
                        echo $thongBao;
                    }
                    ?>
                </h2>
</div>