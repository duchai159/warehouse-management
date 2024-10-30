<?php
include("ketnoi.php");

$ma = $_POST["txtmathuonghieu"];
$ten = $_POST["txttenthuonghieu"];

$sql = "UPDATE thuonghieu SET tenthuonghieu = ? WHERE mathuonghieu = ?";
$stmt = $conn->prepare($sql);

$stmt->bind_param("ss", $ten, $ma);

if ($stmt->execute()) {
    echo "<script language='javascript'>alert('" . htmlspecialchars('Sửa thành công') . "'); window.location.assign('thuonghieu.php');</script>";
} else {
    echo "Lỗi: " . htmlspecialchars($conn->error);
}

// Đóng prepared statement và kết nối
$stmt->close();
$conn->close();
?>
