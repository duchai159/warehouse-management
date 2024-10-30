<?php
include("ketnoi.php");

$ma = $_REQUEST["mm"];

// Kiểm tra nếu mã không rỗng
if (empty($ma)) {
    echo "<script language='javascript'>alert('Mã loại sản phẩm không hợp lệ.'); window.location.assign('loaisanpham.php');</script>";
    exit;
}

// Sử dụng prepared statement để bảo vệ khỏi SQL Injection
$sql_check_sanpham = "SELECT * FROM sanpham WHERE loaisanpham = ?";
$stmt_check_sanpham = $conn->prepare($sql_check_sanpham);
$stmt_check_sanpham->bind_param("s", $ma);
$stmt_check_sanpham->execute();
$result_check_sanpham = $stmt_check_sanpham->get_result();

$sql_check_khohang = "SELECT * FROM khohang WHERE loaisanpham = ?";
$stmt_check_khohang = $conn->prepare($sql_check_khohang);
$stmt_check_khohang->bind_param("s", $ma);
$stmt_check_khohang->execute();
$result_check_khohang = $stmt_check_khohang->get_result();

$sql_delete = "";

if ($result_check_sanpham->num_rows > 0 || $result_check_khohang->num_rows > 0) {
    // Nếu có sản phẩm hoặc kho hàng liên quan đến loại sản phẩm
    $sql_delete .= "DELETE FROM sanpham WHERE loaisanpham = ?;";
    $sql_delete .= "DELETE FROM khohang WHERE loaisanpham = ?;";
}

// Xóa loại sản phẩm
$sql_delete .= "DELETE FROM loaisanpham WHERE maloaisanpham = ?;";

// Thực hiện xóa
$stmt_delete = $conn->prepare($sql_delete);

// Bắt đầu xóa theo từng câu lệnh
if ($result_check_sanpham->num_rows > 0 || $result_check_khohang->num_rows > 0) {
    $stmt_delete->bind_param("sss", $ma, $ma, $ma);
} else {
    $stmt_delete->bind_param("s", $ma);
}

if ($stmt_delete->execute()) {
    echo "<script language='javascript'>alert('Xóa thành công'); window.location.assign('loaisanpham.php');</script>";
} else {
    echo "Lỗi: " . htmlspecialchars($stmt_delete->error);
}

// Đóng prepared statement và kết nối
$stmt_check_sanpham->close();
$stmt_check_khohang->close();
$stmt_delete->close();
$conn->close();
?>
