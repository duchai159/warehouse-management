<?php
include("ketnoi.php");

$ma = $_POST["txtMakhachhang"];
$ten = $_POST["txtTenkhachhang"];
$diachi = $_POST["txtDiachi"];
$sodienthoai = $_POST["txtSodienthoai"];

$sql = "UPDATE khachhang SET tenkhachhang='$ten', diachi='$diachi', dienthoai='$sodienthoai' WHERE makhachhang='$ma'";

if ($conn->query($sql) === TRUE) {
    echo("<script language='javascript'>alert('Sửa thành công'); window.location.assign('khachhang.php');</script>");
} else {
    echo "Lỗi: " . $conn->error;
}

$conn->close();
?>
