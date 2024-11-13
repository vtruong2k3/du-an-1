<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
    <!-- CSS hoặc inline styles để định dạng popup -->
    <style>
        #overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: none;
            justify-content: center;
            align-items: center;
        }
        #login-form {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<!-- Thêm overlay và form đăng nhập -->
<div id="overlay">
    <div id="login-form">
        <!-- Mã form đăng nhập PHP -->
        <?php include 'dangnhap.php'; ?>
    </div>
</div>

<!-- Nội dung trang chủ -->
<h1>Xin chào! Đây là trang chủ của chúng tôi.</h1>
<p>Đăng nhập để truy cập các tính năng khác.</p>

<!-- JavaScript để hiển thị popup khi cần -->
<script>
    function showLoginPopup() {
        document.getElementById('overlay').style.display = 'flex';
    }
</script>

<!-- Button hoặc link để mở popup -->
<button onclick="showLoginPopup()">Đăng nhập</button>

</body>
</html>
