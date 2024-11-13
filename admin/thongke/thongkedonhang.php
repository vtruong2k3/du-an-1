<div class="danhmuc">
    <div class="list-danhmuc">
        <div class="list-danhmuc__title">
            <!-- <i class='bx bxs-category'></i> -->
            <h2>Thống kê theo đơn hàng</h2>
        </div>
        <form action="index.php?act=thongkedonhang" method="post" style="margin-bottom: 20px;">
            <select name="boloc" id="boloc" style="padding: 10px;">
                <?php
                for ($i = 1; $i <= 3; $i++) {
                    switch ($i) {
                        case 1:
                            $name = 'Số lượng đơn hàng theo ngày';
                            break;
                        case 2:
                            $name = 'Số lượng đơn hàng theo trạng thái';
                            break;
                        case 3:
                            $name = 'Danh sách đơn hàng theo khách hàng';
                            break;
                    }
                    $checked = ($i == 1) ? 'checked' : '';
                    echo '<option value="' . $i . '" ' . $checked . ' >' . $name . '</option>';
                }

                ?>
            </select>
            <input type="submit" name="thongkedonhang" value="Xác nhận" style="padding: 10px;background-color:black;color:white">
        </form>
        <div class="list-danhmuc__content">
            <table border="1">
                <?php
                echo $table;
                ?>
                <tbody>
                    <?php
                    $count = 0;
                    foreach ($listdonhang as $donhang) {
                        // var_dump($donhang);
                        extract($donhang);
                        $rowClass = ($count % 2 === 0) ? 'class="grayRow"' : 'class="whiteRow"';
                        $count++;
                        if ($boloc == '1') {
                            echo '
                            <tr ' . $rowClass . '>
                                <td>' . $count . '</td>
                                <td>' . $Ngay . '</td>
                                <td>' . $Thang . '</td>
                                <td>' . $SoLuongDonHang . '</td>
                            </tr>
                            ';
                        } else if ($boloc == '2') {
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
                            echo '
                            <tr ' . $rowClass . '>
                                <td>' . $count . '</td>
                                <td>' . $TrangThaiDonHang_name . '</td>
                                <td>' . number_format($SoLuongDonHang) . '</td>
                            </tr>
                            ';
                        } else if ($boloc == '3') {
                            echo '
                            <tr ' . $rowClass . '>
                                <td>' . $count . '</td>
                                <td>' . $MaDonHang . '</td>
                                <td>' . $NgayDatHang . '</td>
                                <td>' . number_format($TongDonHang) . '</td>
                                <td>' . $Ten . '</td>
                            </tr>
                            ';
                        }
                    }
                    ?>
                </tbody>
            </table>
            <div class="page" style="margin-top: 40px;margin-bottom: 10px;text-align: center;">
            </div>
        </div>
    </div>
</div>