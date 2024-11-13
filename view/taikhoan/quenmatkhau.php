<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/quenmk.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>
<body>

<div class="container">
    <div class="password">
        <img src="img/banner/login.png" alt="">
        
        <div class="password-logo">
            <img src="img/logo.png" alt="">
        </div>
        <div class="password-form">
            <h1>Quên mật khẩu</h1>
            <form action="" method="post">
                <div class="signin">
                    <span>Already have an account?</span>
                    <button onclick="hienTrangDangKi()" style="border: none; background: #e6e8e9;"><a href="dangki.php"> Sign in</a></button>
                </div><br>

                <input  class="i1" type="email" name="" id="p1" placeholder="Địa chỉ email"><Br></Br>

                <button class="i2" onclick="quenmkk ()"><a  href="quenmatkhau-2.php" style="color: white;" >Gửi mã</a></button>
                
                <div class="password-m">
                    <span>Register an account?</span>
                    <button onclick="hienTrangDangNhap()" style="border: none; background: #e6e8e9;"> <a href="dangnhap.php">Sign up</a></button>
                 </div><br>
            </form>
        </div>
    </div>
</div>

</body>
</html>