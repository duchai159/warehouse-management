<?php
include("ketnoi.php");

$ma = $_REQUEST["mm"];

// Kiểm tra xem mã sản phẩm có hợp lệ không
if (empty($ma)) {
    echo "<script language='javascript'>alert('Mã sản phẩm không hợp lệ.'); window.location.assign('sanpham.php');</script>";
    exit;
}

// Sử dụng prepared statements để bảo vệ khỏi SQL Injection
$sql1 = "DELETE FROM chitietphieunhap WHERE masanpham = ?";
$sql2 = "DELETE FROM chitietphieuxuat WHERE masanpham = ?";
$sql3 = "DELETE FROM sanpham WHERE masanpham = ?";

// Khởi tạo prepared statement cho từng câu lệnh
$stmt1 = $conn->prepare($sql1);
$stmt2 = $conn->prepare($sql2);
$stmt3 = $conn->prepare($sql3);

// Gán tham số cho các câu lệnh
$stmt1->bind_param("s", $ma);
$stmt2->bind_param("s", $ma);
$stmt3->bind_param("s", $ma);

// Thực thi các câu lệnh
$result1 = $stmt1->execute();
$result2 = $stmt2->execute();
$result3 = $stmt3->execute();

// Kiểm tra kết quả và thông báo lỗi chi tiết nếu có
if ($result1 && $result2 && $result3) {
    echo ("<script language='javascript'>alert('Xóa thành công'); window.location.assign('sanpham.php');</script>");
} else {
    echo "Không thể xóa: " . $conn->error;
}

// Đóng các prepared statement
$stmt1->close();
$stmt2->close();
$stmt3->close();
$conn->close();
?>
