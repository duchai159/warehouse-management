<?php
include("ketnoi.php");

$ma = $_REQUEST["mm"];

// Kiểm tra xem mã thương hiệu có hợp lệ không
if (empty($ma)) {
    echo "<script language='javascript'>alert('Mã thương hiệu không hợp lệ.'); window.location.assign('thuonghieu.php');</script>";
    exit;
}

// Sử dụng prepared statements để bảo vệ khỏi SQL Injection
$sql_check = "SELECT * FROM sanpham WHERE mathuonghieu = ?";
$sql_delete_sanpham = "DELETE FROM sanpham WHERE mathuonghieu = ?";
$sql_delete_thuonghieu = "DELETE FROM thuonghieu WHERE mathuonghieu = ?";

// Kiểm tra xem có sản phẩm nào thuộc thương hiệu này không
$stmt_check = $conn->prepare($sql_check);
$stmt_check->bind_param("s", $ma);
$stmt_check->execute();
$result_check = $stmt_check->get_result();

$stmt_check->close(); // Đóng statement kiểm tra

// Khởi tạo prepared statement cho xóa
$stmt_delete_sanpham = $conn->prepare($sql_delete_sanpham);
$stmt_delete_thuonghieu = $conn->prepare($sql_delete_thuonghieu);

// Gán tham số cho câu lệnh xóa sản phẩm
$stmt_delete_sanpham->bind_param("s", $ma);
$stmt_delete_thuonghieu->bind_param("s", $ma);

// Thực thi xóa sản phẩm nếu có
if ($result_check->num_rows > 0) {
    $stmt_delete_sanpham->execute();
}

// Thực thi xóa thương hiệu
$stmt_delete_thuonghieu->execute();

// Kiểm tra kết quả và thông báo cho người dùng
if ($stmt_delete_thuonghieu->affected_rows > 0) {
    echo ("<script language='javascript'>alert('Xóa thành công'); window.location.assign('thuonghieu.php');</script>");
} else {
    echo ("<script language='javascript'>alert('Không thể xóa thương hiệu hoặc không có thương hiệu nào được xóa.'); window.location.assign('thuonghieu.php');</script>");
}

// Đóng các prepared statement
$stmt_delete_sanpham->close();
$stmt_delete_thuonghieu->close();
$conn->close();
?>
