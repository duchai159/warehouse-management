<?php
include("ketnoi.php");
$ma = $_REQUEST["mm"];

// Kiểm tra nếu mã không rỗng
if (empty($ma)) {
    echo "<script language='javascript'>alert('Mã kho không hợp lệ.'); window.location.assign('khohang.php');</script>";
    exit;
}

// Sử dụng prepared statement để bảo vệ khỏi SQL Injection
$sql_check = "SELECT * FROM phieunhaphang WHERE makho = ?";
$stmt_check = $conn->prepare($sql_check);
$stmt_check->bind_param("s", $ma);
$stmt_check->execute();
$result_check = $stmt_check->get_result();

$sql_delete = "";

if ($result_check->num_rows > 0) {
    // Nếu có phiếu nhập hàng
    $sql_delete .= "DELETE FROM phieunhaphang WHERE makho = ?;";
    $sql_delete .= "DELETE FROM phieuxuathang WHERE makho = ?;";
}

// Xóa kho hàng
$sql_delete .= "DELETE FROM khohang WHERE makho = ?;";

// Thực hiện xóa
$stmt_delete = $conn->prepare($sql_delete);

// Bắt đầu xóa theo từng câu lệnh
if (!empty($result_check->num_rows)) {
    $stmt_delete->bind_param("sss", $ma, $ma, $ma);
} else {
    $stmt_delete->bind_param("s", $ma);
}

if ($stmt_delete->execute()) {
    echo "<script language='javascript'>alert('Xóa thành công'); window.location.assign('khohang.php');</script>";
} else {
    echo "Lỗi: " . htmlspecialchars($stmt_delete->error);
}

// Đóng prepared statement và kết nối
$stmt_check->close();
$stmt_delete->close();
$conn->close();
?>
