<?php
function loadall_vanchuyen()
{
    $sql = "SELECT * FROM vanchuyen order by MaVanChuyen asc ";
    $listVanChuyen = pdo_query($sql);
    return $listVanChuyen;
};