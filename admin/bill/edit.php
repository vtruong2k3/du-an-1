<div class="danhmuc">
    <div class="list-danhmuc">
        <div class="list-danhmuc__title">
            <!-- <i class='bx bxs-category'></i> -->
            <h2>Thông tin khách hàng</h2>
        </div>
        <div>
            <?php
            switch ($TrangThaiDonHang) {
                case '1':
                    $TrangThaiDonHang_name = '<span style="color:red">Đang sử lý</span>';
                    break;
                case '2':
                    $TrangThaiDonHang_name = '<span style="color:green">Đã xác nhận</span>';
                    break;
                case '3':
                    $TrangThaiDonHang_name = '<span style="color:#FFAB00">Đã giao hàng</span>';
                    break;
                case '4':
                    $TrangThaiDonHang_name = '<span style="color:red">Đã hủy</span>';
                    break;
            }

            ?>
            <p style="color: black;">Tên khách hàng: <?= $Ten ?></p>
            <p style="color: black;">Số điện thoại: <?= $SoDienThoai ?></p>
            <p style="color: black;">Địa chỉ nhận hàng: <?= $DiaChiGiaoHang ?></p>
            <p style="color: black;">Ngày đặt hàng: <?= $NgayDatHang ?></p>
            <p style="color: black;">Trạng thái đơn hàng: <?= $TrangThaiDonHang_name ?></p>
            <form action="index.php?act=capNhatTrangThai&id=<?= $_GET['id'] ?>" method="post">
                <select name="TrangThai" id="TrangThai" style="padding: 10px;">
                    <?php
                    for ($i = 1; $i <= 4; $i++) {
                        switch ($i) {
                            case '1':
                                $name = 'Đang sử lý';
                                break;
                            case '2':
                                $name = 'Đã xác nhận';
                                break;
                            case '3':
                                $name = 'Đã giao hàng';
                                break;
                            case '4':
                                $name = 'Đã hủy';
                                break;
                                $checked = ($i === $TrangThaiDonHang) ? 'checked' : '';
                        }
                        echo '<option value="' . $i . '" ' . $checked . ' >' . $name . '</option>';
                    }

                    ?>
                </select>
                <input type="submit" name="capNhatTrangThai" value="Thay đổi" style="padding: 10px;background-color:black;color:white" <?php if ($TrangThaiDonHang == '3' || $TrangThaiDonHang == '4') echo 'disabled'; ?>>
            </form>
        </div>

        <div class="list-danhmuc__title">
            <!-- <i class='bx bxs-category'></i> -->
            <h2>Chi tiết đơn hàng</h2>
        </div>

        <div class="list-danhmuc__content">
            <table border="1">
                <thead>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Ảnh</th>
                    <th>Số lượng</th>
                    <th>Kích thước</th>
                    <th>Màu</th>
                    <th>Giá</th>
                    <th>Thành tiền</th>
                </thead>
                <tbody>
                    <?php
                    $count = 0;
                    foreach ($listDonHangCT as $DonHang) {
                        if ($DonHang) {
                            extract($DonHang);
                            $rowClass = ($count % 2 === 0) ? 'class="grayRow"' : 'class="whiteRow"';
                            $ThanhTien = $Gia * $SoLuong;
                            echo '
                                <tr ' . $rowClass . '>
                                    <td>' . $count + 1 . '</td>
                                    <td>' . $TenSanPham . '</td>
                                    <td><img src="' . $img_path . '/' . $HinhAnh . '" alt="" style="width:100px"></td>
                                    <td>' . $SoLuong . '</td>
                                    <td>' . $KichThuoc . '</td>
                                    <td><div style="width: 100%;height: 30px;background-color:' . $MauSac . '"></div></td>
                                    <td>' . number_format($Gia) . 'VNĐ</td>
                                    <td>' . number_format($ThanhTien) . 'VNĐ</td>
                                  </tr>
                                  ';
                        }
                        $count++;
                    }

                    ?>
                    <tr>
                        <td>
                            <h2>Tổng đơn hàng:</h2>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><strong><?= number_format($ThanhTien * ($count)) ?>VNĐ</strong></td>
                    </tr>
                </tbody>
            </table>
            <div class="page" style="margin-top: 40px;margin-bottom: 10px;text-align: center;">

            </div>
        </div>
    </div>
</div>