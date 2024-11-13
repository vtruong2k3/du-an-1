<div class="container">
    <div class="signup">
        <img src="view/taikhoan/img/banner/login.png" alt="">

        <div class="signup-logo">
            <img src="view/taikhoan/img/logo.png" alt="">
        </div>
        <div class="signup-form">
            <h1 style="margin-top: -20px;">Đăng kí</h1>
            <form action="index.php?act=dangki" method="post">
                <?php if (!empty($usernameError)) : ?>
                    <div class="error" style="color: red;font-size:12px"><?= $usernameError; ?></div>
                <?php endif; ?>

                <input class="i1" type="text" value="" name="Ten" id="p1" placeholder="Nhập tên tài khoản"><br><br>

                <?php if (!empty($emailError)) : ?>
                    <div class="error" style="color: red;font-size:12px"><?= $emailError; ?></div>
                <?php endif; ?>

                <input class="i1" type="email" value="" name="Email" id="p2" placeholder="Email"><br><br>
                <?php if (!empty($tenDangNhapError)) : ?>
                    <div class="error" style="color: red;font-size:12px"><?= $tenDangNhapError; ?></div>
                <?php endif; ?>

                <input class="i1" type="text" value="" name="TenDangNhap" id="p3" placeholder="Tên đăng nhập"><br><br>
                <?php if (!empty($passwordError)) : ?>
                    <div class="error" style="color: red;font-size:12px"><?= $passwordError; ?></div>
                <?php endif; ?>

                <input class="i1" type="password" value="" name="MatKhau" id="p4" placeholder="Mật khẩu"><br><br>
                <div class="signup-m">
                    <input type="checkbox" name="" id="">
                    <span>Tôi đồng ý <strong style="font-weight:600; color: #141718;">Chính sách bảo mật</strong> &
                        <strong style="font-weight:600; color: #141718;">Điều khoản sử dụng</strong></span>

                </div><br>
                <div class="signin">
                    <span>Bạn đã có tài khoản?</span>
                    <a href="index.php?act=dangnhap"> Đăng nhập</a>
                </div><br>
                <div>
                    <input class="i2" type="submit" name="dangki" id="p3" value="Đăng Kí">
                </div>
                <?php if (!empty($thongBao)) : ?>
                    <div class="error" style="color: red;font-size:16px;margin-top: 20px;margin-left: 50px;"><?= $thongBao; ?></div>
                <?php endif; ?>
            </form>
        </div>

    </div>
</div>