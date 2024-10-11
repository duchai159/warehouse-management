<?php
include("ketnoi.php");

$ma = $_POST["txtmaloaisanpham"];
$ten = $_POST["txttenloaisanpham"];


$sql = "UPDATE loaisanpham SET tenloaisanpham = '$ten'  WHERE maloaisanpham = '$ma'";

if ($conn->query($sql) === TRUE) {
    echo("<script language='javascript'>alert('Sửa thành công'); window.location.assign('loaisanpham.php');</script>");
} else {
    echo "Lỗi: " . $conn->error;
}

$conn->close();
?>
