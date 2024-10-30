<?php
include("ketnoi.php");

// Lấy mã khách hàng từ yêu cầu
$ma = $_REQUEST["mm"];

// Kiểm tra nếu mã không rỗng
if (empty($ma)) {
    echo "<script language='javascript'>alert('Mã khách hàng không hợp lệ.'); window.location.assign('khachhang.php');</script>";
    exit;
}

// Sử dụng prepared statement để bảo vệ khỏi SQL Injection
$sql = "DELETE FROM khachhang WHERE makhachhang = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $ma);

if ($stmt->execute()) {
    echo "<script language='javascript'>alert('Xóa thành công'); window.location.assign('khachhang.php');</script>";
} else {
    echo "Lỗi: " . htmlspecialchars($stmt->error);
}

// Đóng prepared statement và kết nối
$stmt->close();
$conn->close();
?>
