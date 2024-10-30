<?php
include("ketnoi.php");

$ma = $_REQUEST["mm"];

// Kiểm tra xem mã nhân viên có hợp lệ không
if (empty($ma)) {
    echo "<script language='javascript'>alert('Mã nhân viên không hợp lệ.'); window.location.assign('nhanvien.php');</script>";
    exit;
}

// Sử dụng prepared statement để bảo vệ khỏi SQL Injection
// Kiểm tra xem có phiếu nhập hàng nào liên quan đến nhân viên không
$sql_check = "SELECT * FROM phieunhaphang WHERE tendangnhap = ?";
$stmt_check = $conn->prepare($sql_check);
$stmt_check->bind_param("s", $ma);
$stmt_check->execute();
$result_check = $stmt_check->get_result();

$sql1 = "";

if ($result_check->num_rows > 0) {
    // Nếu có phiếu nhập hàng, xóa tất cả các phiếu nhập hàng liên quan
    $sql1 .= "DELETE FROM phieunhaphang WHERE tendangnhap = ?;";
}

// Xóa nhân viên
$sql1 .= "DELETE FROM nhanvien WHERE tendangnhap = ?;";

// Thực thi truy vấn xóa
$stmt_delete = $conn->prepare($sql1);

// Gán tham số cho các câu lệnh
if ($result_check->num_rows > 0) {
    $stmt_delete->bind_param("ss", $ma, $ma); // Truyền $ma cho cả hai câu lệnh
} else {
    $stmt_delete->bind_param("s", $ma); // Chỉ truyền $ma cho câu lệnh xóa nhân viên
}

// Thực thi câu lệnh
if ($stmt_delete->execute()) {
    echo ("<script language='javascript'>alert('Xóa thành công'); window.location.assign('nhanvien.php');</script>");
} else {
    die("Không thể xóa: " . $conn->error);
}

// Đóng prepared statements
$stmt_check->close();
$stmt_delete->close();
$conn->close();
?>
