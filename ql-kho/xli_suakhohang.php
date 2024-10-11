<?php
include("ketnoi.php");

$ma = $_POST["txtmakho"];
$ten = $_POST["txttenkhohang"];
$loaisanpham = $_POST["txtloaisanpham"];

$sql = "UPDATE khohang SET tenkho='$ten', loaisanpham='$loaisanpham' WHERE makho='$ma'";

if ($conn->query($sql) === TRUE) {
    echo("<script language='javascript'>alert('Sửa thành công'); window.location.assign('khohang.php');</script>");
} else {
    echo "Lỗi: " . $conn->error;
}

$conn->close();
?>
