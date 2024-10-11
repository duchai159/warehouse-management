<?php
include("ketnoi.php");

$ma = $_POST["txtmathuonghieu"];
$ten = $_POST["txttenthuonghieu"];


$sql = "UPDATE thuonghieu SET tenthuonghieu = '$ten'  WHERE mathuonghieu = '$ma'";

if ($conn->query($sql) === TRUE) {
    echo("<script language='javascript'>alert('Sửa thành công'); window.location.assign('thuonghieu.php');</script>");
} else {
    echo "Lỗi: " . $conn->error;
}

$conn->close();
?>
