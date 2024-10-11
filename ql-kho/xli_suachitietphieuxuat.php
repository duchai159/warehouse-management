<?php
include("ketnoi.php");

$spx = $_POST["txtsophieuxuat"];
$slx = $_POST["txtsoluongxuat"];
$masp = $_POST["txtmasanpham"];
$id = $_POST["txtid"];

//Phải lấy số lượng nhập lần trước
$sql = "UPDATE chitietphieuxuat SET sophieuxuat= '$spx', soluongxuat = '$slx', masanpham = '$masp' WHERE ID= '$id';";
if ($conn->multi_query($sql) === TRUE) {
    echo("<script language='javascript'>alert('Sửa thành công'); window.location.assign('chitietphieuxuat.php?mm=$spx');</script>");
} else {
    echo "Lỗi: " . $conn->error;
}

$conn->close();
?>
