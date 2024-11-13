<?php
function loadall_magiamgia()
{
    $sql = "SELECT * FROM magiamgia where TrangThai = 1 order by MaGiamGia asc ";
    $listmagiamgia = pdo_query($sql);
    return $listmagiamgia;
};

function update_magiamgia($TrangThai)
{
    $sql = "UPDATE magiamgia SET TrangThai = 0 ";
    pdo_execute($sql);
}
