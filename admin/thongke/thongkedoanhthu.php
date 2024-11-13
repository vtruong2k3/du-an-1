<div class="danhmuc">
    <div class="list-danhmuc">
        <div class="list-danhmuc__title">
            <!-- <i class='bx bxs-category'></i> -->
            <h2>Thống kê theo doanh thu</h2>
        </div>
        <form action="index.php?act=thongkedoanhthu" method="post" style="margin-bottom: 20px;">
            <select name="boloc" id="boloc" style="padding: 10px;">
                <?php
                for ($i = 1; $i <= 3; $i++) {
                    switch ($i) {
                        case 1:
                            $name = 'Doanh thu theo ngày';
                            break;
                        case 2:
                            $name = 'Doanh thu theo tháng';
                            break;
                        case 3:
                            $name = 'Doanh thu theo sản phẩm';
                            break;
                    }
                    $checked = ($i == 1) ? 'checked' : '';
                    echo '<option value="' . $i . '" ' . $checked . ' >' . $name . '</option>';
                }

                ?>
            </select>
            <input type="submit" name="thongkedoanhthu" value="Xác nhận" style="padding: 10px;background-color:black;color:white">
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
                                <td>' . number_format($DoanhThu) . 'VNĐ</td>
                            </tr>
                            ';
                        } else if ($boloc == '2') {
                            echo '
                            <tr ' . $rowClass . '>
                                <td>' . $count . '</td>
                                <td>' . $Thang . '</td>
                                <td>' . number_format($DoanhThu) . 'VNĐ</td>
                            </tr>
                            ';
                        } else if ($boloc == '3') {
                            echo '
                            <tr ' . $rowClass . '>
                                <td>' . $count . '</td>
                                <td>' . $TenSanPham . '</td>
                                <td>' . number_format($DoanhThu) . 'VNĐ</td>
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