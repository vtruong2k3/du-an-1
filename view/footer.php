<footer>
    <div class="footer-contents">
        <div class="content-1">
            <div class="logo">
                <img src="./assets/images/logowhite.png" alt="" />
            </div>
            <span>|</span>
            <div class="slogan">
                <span>Cửa hàng quà tặng & trang trí</span>
            </div>
        </div>
        <div class="content-2">
            <div class="nav">
                <ul>
                    <li><a href="#">Trang chủ</a></li>
                    <li><a href="#">Sản phẩm</a></li>
                    <li><a href="#">Bài viết</a></li>
                    <li><a href="#">Về chúng tôi</a></li>
                    <li><a href="#">Liên hệ</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-btnbar">
        <div class="copyright">
            <p>Copyright © 2023 3legant. All rights reserved</p>
            <a href="#">Chính sách bảo mật</a>
            <a href="#">Điều khoản sử dụng</a>
        </div>
        <div class="social-icon">
            <i class="bx bxl-facebook"></i>
            <i class="bx bxl-instagram"></i>
            <i class="bx bxl-youtube"></i>
        </div>
    </div>
</footer>
</body>
<script>
    // =======================================================================================
    // Lấy tất cả các input radio vận chuyển
    var shippingRadios = document.querySelectorAll('input[name="PhiVanChuyen"]');

    // Giá trị mặc định cho vận chuyển (lấy từ input radio đầu tiên)
    var defaultShippingCost = parseFloat(shippingRadios[0].value);

    // Hiển thị giá trị vận chuyển mặc định
    document.getElementById('shippingCost').textContent = defaultShippingCost.toLocaleString('vi-VN') + ' VNĐ';

    // Tính và hiển thị tổng đơn hàng khi trang được tải
    window.onload = function() {
        var totalCost = parseFloat(<?php echo $TongDonHang; ?>) + defaultShippingCost;
        document.getElementById('totalCost').textContent = totalCost.toLocaleString('vi-VN') + ' VNĐ';
    };
    // Lắng nghe sự kiện thay đổi trên các input radio
    document.querySelectorAll('input[type=radio][name="PhiVanChuyen"]').forEach(function(radio) {
        radio.addEventListener('change', function() {
            // Nếu input radio được chọn, cập nhật giá trị hiển thị của vận chuyển
            if (this.checked) {
                // Lấy giá trị của input radio được chọn
                var shippingCost = parseFloat(this.value);
                // Cập nhật nội dung của phần tổng đơn hàng
                updateTotal(shippingCost);
                // Cập nhật nội dung của phần tổng vận chuyển
                document.getElementById('shippingCost').textContent = shippingCost.toLocaleString('vi-VN') + ' VNĐ';
            }
        });
    });

    function updateTotal(shippingCost) {
        // Lấy giá trị của tổng đơn hàng
        var totalCost = parseFloat(<?php echo $TongDonHang; ?>);
        // Tính tổng đơn hàng cộng thêm giá vận chuyển
        var grandTotal = totalCost + shippingCost;
        // Cập nhật nội dung của phần tổng đơn hàng
        document.getElementById('totalCost').textContent = grandTotal.toLocaleString('vi-VN') + ' VNĐ';
    }

    function hienTrangDangNhap() {
        // Tạo một phần tử iframe để chứa trang đăng nhập
        var iframe = document.createElement('iframe');
        iframe.src = 'view/dangnhap.php'; // Đường dẫn đến trang đăng nhập
        iframe.style.position = 'fixed';
        iframe.style.top = '0';
        iframe.style.left = '0';
        iframe.style.width = '100%';
        iframe.style.height = '100%';
        iframe.style.border = 'none';
        iframe.style.zIndex = '9999';

        // Thêm phần tử iframe vào div chứa trang đăng nhập
        document.getElementById('dangnhapContainer').appendChild(iframe);
    }

    function hienTrangDangKi() {
        // Tạo một phần tử iframe để chứa trang đăng nhập
        var iframe = document.createElement('iframe');
        iframe.src = 'view/taikhoan/dangki.php'; // Đường dẫn đến trang đăng nhập
        iframe.style.position = 'fixed';
        iframe.style.top = '0';
        iframe.style.left = '0';
        iframe.style.width = '100%';
        iframe.style.height = '100%';
        iframe.style.border = 'none';
        iframe.style.zIndex = '9999';

        // Thêm phần tử iframe vào div chứa trang đăng nhập
        document.getElementById('dangnhapContainer').appendChild(iframe);
    }

    function quenmk() {
        // Tạo một phần tử iframe để chứa trang đăng nhập
        var iframe = document.createElement('iframe');
        iframe.src = 'view/taikhoan/quenmatkhau.php'; // Đường dẫn đến trang đăng nhập
        iframe.style.position = 'fixed';
        iframe.style.top = '0';
        iframe.style.left = '0';
        iframe.style.width = '100%';
        iframe.style.height = '100%';
        iframe.style.border = 'none';
        iframe.style.zIndex = '9999';

        // Thêm phần tử iframe vào div chứa trang đăng nhập
        document.getElementById('dangnhapContainer').appendChild(iframe);
    }

    function quenmkk() {

        var iframe = document.createElement('iframe');
        iframe.src = 'view/taikhoan/quenmatkhau-2.php';
        iframe.style.position = 'fixed';
        iframe.style.top = '0';
        iframe.style.left = '0';
        iframe.style.width = '100%';
        iframe.style.height = '100%';
        iframe.style.border = 'none';
        iframe.style.zIndex = '9999';

        // Thêm phần tử iframe vào div chứa trang đăng nhập
        document.getElementById('dangnhapContainer').appendChild(iframe);
    }
</script>

</html>