<?php
include("ketnoi.php");

$ma = $_POST["txtmaloaisanpham"];
$ten = $_POST["txttenloaisanpham"];

$sql = "UPDATE loaisanpham SET tenloaisanpham = ? WHERE maloaisanpham = ?";
$stmt = $conn->prepare($sql);

$stmt->bind_param("ss", $ten, $ma);

if ($stmt->execute()) {
    echo "<script language='javascript'>alert('" . htmlspecialchars('Sửa thành công') . "'); window.location.assign('loaisanpham.php');</script>";
} else {
    echo "Lỗi: " . htmlspecialchars($conn->error);
}

$stmt->close();
$conn->close();
?>
