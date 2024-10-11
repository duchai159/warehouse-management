<?php
include("ketnoi.php");

$ten = $_POST["txttendangnhap"];
$matkhau = $_POST["txtmatkhau"];
$hoten = $_POST["txthoten"];
$sodienthoai = $_POST["txtsodienthoai"];
$email = $_POST["txtemail"];
$q = $_POST["txtquyen"];
echo $q;
$sql = "UPDATE nhanvien SET hoten='$hoten', sodienthoai='$sodienthoai',email='$email', quyen = '$q' WHERE tendangnhap='$ten'";

if ($conn->query($sql) === TRUE) {
    echo("<script language='javascript'>alert('Sửa thành công'); window.location.assign('nhanvien.php');</script>");
} else {
    echo "Lỗi: " . $conn->error;
}

$conn->close();
?>
