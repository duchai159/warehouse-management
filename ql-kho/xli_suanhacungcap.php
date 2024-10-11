<?php
include("ketnoi.php");

$ma = $_POST["txtManhacungcap"];
$ten = $_POST["txtTennhacungcap"];
$diachi = $_POST["txtDiachi"];
$email = $_POST["txtEmail"];




$sql = "UPDATE nhacungcap SET tennhacungcap = '$ten', diachi= '$diachi',email='$email' WHERE manhacungcap = '$ma'";

if ($conn->query($sql) === TRUE) {
    echo("<script language='javascript'>alert('Sửa thành công'); window.location.assign('nhacungcap.php');</script>");
} else {
    echo "Lỗi: " . $conn->error;
}

$conn->close();
?>
