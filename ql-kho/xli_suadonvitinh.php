<?php
include("ketnoi.php");

$mdvt = $_POST["txtMadonvitinh"];
$tdvt = $_POST["txtTendonvitinh"];


//Phải lấy số lượng nhập lần trước
$sql = "UPDATE donvitinh SET tendonvitinh= '$tdvt' WHERE madonvitinh= '$mdvt';";
if ($conn->multi_query($sql) === TRUE) {
    echo("<script language='javascript'>alert('Sửa thành công'); window.location.assign('donvitinh.php');</script>");
} else {
    echo "Lỗi: " . $conn->error;
}

$conn->close();
?>
