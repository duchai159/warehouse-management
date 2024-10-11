<?php
include("ketnoi.php");
$ma=$_REQUEST["mm"];
$sql="delete from khachhang where
makhachhang='".$ma."'";
$kq = $conn -> query($sql) or die("Không thể xóa ");
echo ("<script laguage='javascript'>alert('Xóa thành công');window.location.assign('khachhang.php');</script>");
?>
