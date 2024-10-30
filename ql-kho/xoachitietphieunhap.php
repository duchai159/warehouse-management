<?php
// Kết nối cơ sở dữ liệu
include("ketnoi.php");

// Lấy id của chi tiết phiếu nhập được gửi khi nhấn vào nút xóa
$id = $_REQUEST["id"];
$sophieunhap = $_REQUEST["spn"];

// Viết câu truy vấn DELETE với Prepared Statement
$sql = "DELETE FROM chitietphieunhap WHERE id = ?";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Lỗi chuẩn bị câu lệnh: " . htmlspecialchars($conn->error));
}

// Gán tham số cho prepared statement
$stmt->bind_param("s", $id); // Giả sử id là kiểu string. Nếu là kiểu khác, hãy thay đổi cho phù hợp.

// Thực thi câu lệnh
if ($stmt->execute()) {
    echo "Record deleted successfully";
    header("Location: chitietphieunhap.php?mm=" . urlencode($sophieunhap));
    exit; // Thêm exit để dừng thực thi mã sau khi chuyển hướng
} else {
    echo "Error deleting record: " . htmlspecialchars($stmt->error);
}

// Đóng prepared statement và kết nối
$stmt->close();
$conn->close();
?>
