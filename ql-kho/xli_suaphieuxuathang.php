<?php
include("ketnoi.php");

$ten = $_POST["txttennhanvien"];
$sophieuxuat = $_POST["txtsophieuxuat"];
$ngayxuathang = $_POST["txtngayxuathang"];
$makho = $_POST["txtmakho"];
$makhachhang = $_POST["txtmakhachhang"];

$sql = "UPDATE phieuxuathang SET tendangnhap = '$ten', ngayxuathang = '$ngayxuathang', makho = '$makho', makhachhang = '$makhachhang' WHERE sophieuxuat= '$sophieuxuat'";

if ($conn->query($sql) === TRUE) {
    echo("<script language='javascript'>alert('Sửa thành công'); window.location.assign('phieuxuathang.php');</script>");
} else {
    echo "Lỗi: " . $conn->error;
}

$conn->close();
?>
