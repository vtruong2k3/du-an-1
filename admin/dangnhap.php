<?php
session_start();

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header('Location: index.php');
    exit;
}

if (isset($_POST['dangNhapAdmin']) && ($_POST['dangNhapAdmin'])) {
    include "../model/pdo.php";
    include "../model/taikhoan.php";
    $TenDangNhap = $_POST['TenDangNhap'];
    $MatKhau = $_POST['MatKhau'];

    $listTaiKhoan = checkAdmin($TenDangNhap, $MatKhau);
    // extract($listTaiKhoan);
    if ($listTaiKhoan['VaiTro'] == true) {
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $TenDangNhap;
        $_SESSION['Ten'] = $listTaiKhoan['Ten'];
        header('Location: index.php');
        exit();
    } else {
        $error = "Tên đăng nhập hoặc mật khẩu không chính xác.";
    }
}

?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-image: url("path/to/your/image.jpg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            color: #fff;
            animation: backgroundAnimation 20s infinite alternate;
        }

        @keyframes backgroundAnimation {
            0% {
                background-position: 0% 50%;
            }

            100% {
                background-position: 100% 50%;
            }
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            margin-top: 100px;
            border-radius: 10px;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.7);
        }

        h1 {
            text-align: center;
            color: #fff;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #fff;
        }

        i {
            margin-right: 5px;
            color: #ccc;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: all 0.3s ease-in-out;
            background-color: rgba(255, 255, 255, 0.3);
            color: #000;
            box-sizing: border-box;
            margin-bottom: 10px;
            color: white;
        }

        input:hover,
        input:focus {
            border-color: #fff;
            box-shadow: 0 0 5px rgba(255, 255, 255, 0.5);
        }

        input[type="submit"] {
            margin-top: 20px;
            padding: 10px 20px;
            background-image: linear-gradient(to right, #000000, #333333);
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-image 0.3s ease;
        }

        button:hover {
            background-image: linear-gradient(to right, #333333, #666666);
        }

        a {
            text-decoration: none;
            color: #fff;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #ccc;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Đăng nhập Admin</h1>
        <form action="dangnhap.php" method="post">
            <label for="TenDangNhap"><i class="fa fa-user"></i> Tên đăng nhập:</label>
            <input type="text" id="TenDangNhap" name="TenDangNhap" required>
            <label for="MatKhau"><i class="fa fa-lock"></i> Mật khẩu:</label>
            <input type="password" id="MatKhau" name="MatKhau" required>
            <?php if (isset($error)) : ?>
                <p style="color: red;"><?php echo $error; ?></p>
            <?php endif; ?>
            <input type="submit" value="Đăng nhập" name="dangNhapAdmin" id="dangNhapAdmin">
        </form>
    </div>
</body>

</html>