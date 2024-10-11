<?php
include("ketnoi.php");

$ten = $_POST["txttennhanvien"];
$sophieunhap = $_POST["txtsophieunhap"];
$ngaynhaphang = $_POST["txtngaynhaphang"];
$makho = $_POST["txtmakho"];
$manhacungcap = $_POST["txtmanhacungcap"];

$sql = "UPDATE phieunhaphang SET tendangnhap = '$ten', ngaynhaphang = '$ngaynhaphang', makho = '$makho', manhacungcap = '$manhacungcap' WHERE sophieunhap= '$sophieunhap'";

if ($conn->query($sql) === TRUE) {
    echo("<script language='javascript'>alert('Sửa thành công'); window.location.assign('phieunhaphang.php');</script>");
} else {
    echo "Lỗi: " . $conn->error;
}

$conn->close();
?>
