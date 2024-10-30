<?php
include("ketnoi.php");

$ma = $_REQUEST["mm"];

// Kiểm tra xem mã phiếu xuất có hợp lệ không
if (empty($ma)) {
    echo "<script language='javascript'>alert('Mã phiếu xuất không hợp lệ.'); window.location.assign('phieuxuathang.php');</script>";
    exit;
}

// Sử dụng prepared statement để bảo vệ khỏi SQL Injection
$sql_check = "SELECT * FROM chitietphieuxuat WHERE sophieuxuat = ?";
$stmt_check = $conn->prepare($sql_check);
$stmt_check->bind_param("s", $ma);
$stmt_check->execute();
$result_check = $stmt_check->get_result();

// Xóa chi tiết phiếu xuất (nếu có)
if ($result_check->num_rows > 0) {
    $sql_delete_chitiet = "DELETE FROM chitietphieuxuat WHERE sophieuxuat = ?";
    $stmt_delete_chitiet = $conn->prepare($sql_delete_chitiet);
    $stmt_delete_chitiet->bind_param("s", $ma);
    $stmt_delete_chitiet->execute();
    $stmt_delete_chitiet->close(); // Đóng statement
}

// Xóa phiếu xuất hàng
$sql_delete_phieuxuat = "DELETE FROM phieuxuathang WHERE sophieuxuat = ?";
$stmt_delete_phieuxuat = $conn->prepare($sql_delete_phieuxuat);
$stmt_delete_phieuxuat->bind_param("s", $ma);

if ($stmt_delete_phieuxuat->execute()) {
    echo ("<script language='javascript'>alert('Xóa thành công'); window.location.assign('phieuxuathang.php');</script>");
} else {
    die("Không thể xóa: " . $conn->error);
}

// Đóng prepared statements
$stmt_check->close();
$stmt_delete_phieuxuat->close();
$conn->close();
?>
