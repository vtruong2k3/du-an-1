
<?php
if(is_array($loadtk)){
    extract($loadtk);
}
?>

<div class="title">
    <h1>Sửa tài khoản</h1>
</div>
<div class="form">
    <form action="index.php?act=suatk" method="post">
        <input type="hidden" name="maTaiKhoan" id="" value="<?=$MaTaiKhoan?>">
        <input type="text" value="<?=$Ten; ?>" name="ten" id="" placeholder="Tên"><br>
        <input type="email" value="<?=$Email; ?>" name="email" id="" placeholder="Email"><br>
        <input type="text" value="<?=$SoDienThoai; ?>" name="soDienThoai" id="" placeholder="Số diện thoại"><br>
        <input type="text" value="<?=$DiaChi; ?>"  name="daiChi" id="" placeholder="Địa chỉ"><br>
        <input type="text"  value="<?=$TenDangNhap; ?>" name="tenDangNhap" id="" placeholder="Tên Đăng nhập"><br>
        <input type="password" value="<?=$MatKhau; ?>"  name="matKhau" id="Mật khẩu" placeholder="Mật khẩu"><br>
        <input type="text"  value="<?=$VaiTro; ?>" name="vaiTro" id="" placeholder="Vai trò"><br>
        <input type="submit"  name="sua" id="i2" value="Sửa tài khoản">
       
    </form>
    <h2 style="color: red;" class="thongBao">
                    <?php 
                    if(isset($thongBao)&&($thongBao!='')){
                        echo $thongBao;
                    }
                    ?>
                </h2>
</div>