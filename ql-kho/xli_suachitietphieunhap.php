<?php
include("ketnoi.php");

$spn = $_POST["txtsophieunhap"];
$sln = $_POST["txtsoluongnhap"];
$masp = $_POST["txtmasanpham"];
$id = $_POST["txtid"];

//Phải lấy số lượng nhập lần trước
$sql = "UPDATE chitietphieunhap SET sophieunhap = '$spn', soluongnhap = '$sln', masanpham = '$masp' WHERE ID= '$id';";
$sql.="UPDATE sanpham SET soluongton='$sln' WHERE masanpham='$masp'";
if ($conn->multi_query($sql) === TRUE) {
    echo("<script language='javascript'>alert('Sửa thành công'); window.location.assign('chitietphieunhap.php?mm=$spn');</script>");
} else {
    echo "Lỗi: " . $conn->error;
}

$conn->close();
?>
