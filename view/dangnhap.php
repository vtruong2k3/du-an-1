<div class="container">
    <div class="login">
        <img src="view/taikhoan/img/banner/login.png" alt="">
        <div class="login-logo">
            <img src="view/taikhoan/img/logo.png" alt="">
        </div>
        <div class="login-form">
            <h1>Đăng Nhập</h1>
            <form action="index.php?act=dangnhap" method="post">

                <?php if (!empty($usernameError)) : ?>
                    <div class="error" style="color: red;font-size:12px"><?= $usernameError; ?></div>
                <?php endif; ?>

                <input class="i1" type="text" value="" name="TenDangNhap" id="p1" placeholder="Nhập tên tài khoản"><br><br>

                <?php if (!empty($passwordError)) : ?>
                    <div class="error" style="color: red;font-size:12px"><?= $passwordError; ?></div>
                <?php endif; ?>

                <input class="i1" type="password" value="" name="MatKhau" id="p2" placeholder="Mật khẩu"><br><br>
                <div class="login-m">
                    <input type="checkbox" name="" id=""><span>Ghi nhớ</span>
                    <button onclick="quenmk()" style="border: none; background: #e6e8e9; width: 150px;"><a href="index.php?act=quenmatkhau.php">Quên mật khẩu?</a></button>
                </div><br>
                <div class="signin">
                    <span>Bạn chưa có tài khoản?</span>
                    <a href="index.php?act=dangki"> Đăng kí</a> <br><br> <a href="index.php" style="color: black;">Thoát</a>
                </div><br>
                <input id="loginBtn" class="i2" type="submit" name="dangnhap" id="p3" value="Đăng Nhập">
                <?php if (!empty($thongBao)) : ?>
                    <div class="error" style="color: red;font-size:16px;margin-top: 20px;margin-left: 50px;"><?= $thongBao; ?></div>
                <?php endif; ?>
            </form>
        </div>
    </div>
</div>
</body>