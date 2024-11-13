<div class="danhmuc">
    <div class="list-danhmuc">
        <div class="list-danhmuc__title">
            <!-- <i class='bx bxs-category'></i> -->
            <h2>Danh Sách Đơn hàng</h2>
        </div>

        <div class="list-danhmuc__content">
            <table border="1">
                <thead>
                    <th>Mã đơn hàng</th>
                    <th>Tên khách hàng</th>
                    <th>Tổng tiền</th>
                    <th>Ngày đặt</th>
                    <th>Trạng thái</th>
                    <th>Chi tiết</th>
                    <th>Xóa</th>
                    <button></button>
                </thead>
                <tbody>
                    <?php
                    $count = 0;
                    foreach ($listDonHang as $DonHang) {
                        if ($DonHang) {
                            extract($DonHang);
                            switch ($TrangThaiDonHang) {
                                case '1':
                                    $TrangThaiDonHang_name = '<p style="color:red">Đang sử lý</p>';
                                    break;
                                case '2':
                                    $TrangThaiDonHang_name = '<p style="color:green">Đã xác nhận</p>';
                                    break;
                                case '3':
                                    $TrangThaiDonHang_name = '<p style="color:#FFAB00">Đã giao hàng</p>';
                                    break;
                                case '4':
                                    $TrangThaiDonHang_name = '<p style="color:red">Đã hủy</p>';
                                    break;
                            }
                            $rowClass = ($count % 2 === 0) ? 'class="grayRow"' : 'class="whiteRow"';
                            $xoaDonHang = "index.php?act=xoaDonHang&id=" . $MaDonHang;
                            $chiTietDonHang = "index.php?act=chiTietDonHang&id=" . $MaDonHang;
                            echo '
                                <tr ' . $rowClass . '>
                                    <td>' . $MaDonHang . '</td>
                                    <td>' . $Ten . '</td>
                                    <td>' . number_format($TongDonHang) . 'VNĐ</td>
                                    <td>' . $NgayDatHang . '</td>
                                    <td>' . $TrangThaiDonHang_name . '</td>
                                    <td>
                                      <a href="' . $chiTietDonHang . '"><i class="bx bxs-edit"></i></a>
                                    <td>
                                      <a href="' . $xoaDonHang . '"onclick="return confirm(\'Bạn có chắc chắn muốn xóa?\');"><i class="bx bx-trash-alt"></i></a>
                                    </td>
                                  </tr>
                            ';
                        }
                        $count++;
                    }

                    ?>
                </tbody>
            </table>
            <div class="page" style="margin-top: 40px;margin-bottom: 10px;text-align: center;">

            </div>
        </div>
    </div>
</div>