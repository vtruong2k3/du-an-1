<div class="danhmuc">
    <div class="list-danhmuc">
        <div class="list-danhmuc__title">
            <!-- <i class='bx bxs-category'></i> -->
            <h2>Thống kê sản phẩm bán chạy</h2>
        </div>
        <form action="index.php?act=thongkesp" method="post" style="margin-bottom: 20px;">
            <select name="boloc" id="boloc" style="padding: 10px;">
                <?php
                for ($i = 1; $i <= 2; $i++) {
                    switch ($i) {
                        case 1:
                            $name = 'Top 10 sản phẩm bán chạy';
                            break;
                        case 2:
                            $name = 'Sản phẩm bán chạy theo danh mục';
                            break;
                    }
                    $checked = ($i == 1) ? 'checked' : '';
                    echo '<option value="' . $i . '" ' . $checked . ' >' . $name . '</option>';
                }

                ?>
            </select>
            <input type="submit" name="thongkesp" value="Xác nhận" style="padding: 10px;background-color:black;color:white">
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
                                <td>' . $TenSanPham . '</td>
                                <td>' . $SoLuongBan . '</td>
                            </tr>
                            ';
                        } else if ($boloc == '2') {
                            echo '
                            <tr ' . $rowClass . '>
                                <td>' . $count . '</td>
                                <td>' . $TenSanPham . '</td>
                                <td>' . $TenDanhMuc . '</td>
                                <td>' . $SoLuongBan . '</td>
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