<div class="danhmuc">
  <div class="list-danhmuc">
    <div class="list-danhmuc__title">
      <!-- <i class='bx bxs-category'></i> -->
      <h2>Danh Sách Danh Mục</h2>
    </div>
    <div style="display: flex; justify-content: space-between; margin: 20px 0; align-items: center;border: 1px solid rgba(128, 128, 128, 0.349); border-radius: 10px; padding:10px 20px">
      <!-- <div class="list-danhmuc__show">
        <form action="index.php?act=listDanhMuc" method="post">
          <label for="" style="margin-right: 5px;">Hiển thị:</label>
          <select name="cars" id="cars">
            <option value="show5" selected>5</option>
            <option value="show10">10</option>
            <option value="show15">15</option>
            <option value="showAll">Tất cả</option>
          </select>
          <input type="submit" value="Xác nhận" name="show">
        </form>
      </div> -->
      <div class="list-danhmuc__add">
        <a href="index.php?act=addDanhMuc"><i class='bx bx-plus'></i><input type="button" value="Thêm danh mục"></a>
      </div>
    </div>
    <div class="list-danhmuc__content">
      <table border="1">
        <thead>
          <th>STT</th>
          <th>Mã danh mục</th>
          <th>Tên danh mục</th>
          <th>Sửa</th>
          <th>Xóa</th>
          <button></button>
        </thead>
        <tbody>
          <?php
          $count = $offset;
          foreach ($listdanhmuc as $danhmuc) {
            // echo "<pre>";
            // print_r($danhmuc);
            // die();
            if ($danhmuc)
              $rowClass = ($count % 2 === 0) ? 'class="grayRow"' : 'class="whiteRow"';
            extract($danhmuc);
            $suadanhmuc = "index.php?act=suaDanhMuc&id=" . $MaDanhMuc;
            $xoadanhmuc = "index.php?act=xoaDanhMuc&id=" . $MaDanhMuc;
            $confirm = "Bạn có chắc chắn muốn xóa";
            if ($TrangThai == true) {
              echo '
                          <tr ' . $rowClass . '>
                            <td>' . $count +  1 . '</td>
                            <td>' . $MaDanhMuc . '</td>
                            <td>' . $TenDanhMuc . '</td>
                            <td>
                              <a href="' . $suadanhmuc . '"><i class="bx bxs-edit"></i></a>
                            <td>
                              <a href="' . $xoadanhmuc . '"onclick="return confirm(\'Bạn có chắc chắn muốn xóa?\');"><i class="bx bx-trash-alt"></i></a>
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
        <?php
        // Hiển thị liên kết phân trang
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1; // Assuming default page is 1

        for ($i = 1; $i <= $totalPages; $i++) {
          if ($i == $current_page) {
            echo '<a href="index.php?act=listDanhMuc&page=' . $i . '"><input type="button" value="Trang ' . $i . '" style="padding: 5px 10px; text-align: center; background-color: #ff0000; color: #fff;" /></a> ';
          } else {
            echo '<a href="index.php?act=listDanhMuc&page=' . $i . '"><input type="button" value="Trang ' . $i . '" style="padding: 5px 10px; text-align: center;" /></a> ';
          }
        }

        ?>
      </div>
    </div>
  </div>
</div>