<?php
include("ketnoi.php");

$ma = $_REQUEST["mm"];

// Kiểm tra xem mã nhà cung cấp có hợp lệ không
if (empty($ma)) {
    echo "<script language='javascript'>alert('Mã nhà cung cấp không hợp lệ.'); window.location.assign('nhacungcap.php');</script>";
    exit;
}

// Sử dụng prepared statement để bảo vệ khỏi SQL Injection
// Kiểm tra xem có phiếu nhập hàng liên quan đến nhà cung cấp hay không
$sql_check = "SELECT * FROM phieunhaphang WHERE manhacungcap = ?";
$stmt_check = $conn->prepare($sql_check);
$stmt_check->bind_param("s", $ma);
$stmt_check->execute();
$result_check = $stmt_check->get_result();

if ($result_check->num_rows > 0) {
    // Nếu có phiếu nhập hàng, xóa tất cả các chi tiết của các phiếu nhập hàng đó
    $sql_delete_chitiet = "DELETE FROM chitietphieunhap WHERE sophieunhap IN (SELECT sophieunhap FROM phieunhaphang WHERE manhacungcap = ?)";
    $stmt_delete_chitiet = $conn->prepare($sql_delete_chitiet);
    $stmt_delete_chitiet->bind_param("s", $ma);
    if (!$stmt_delete_chitiet->execute()) {
        die("Không thể xóa chi tiết phiếu nhập hàng: " . $conn->error);
    }
}

// Xóa tất cả phiếu nhập hàng của nhà cung cấp
$sql_delete_phieunhaphang = "DELETE FROM phieunhaphang WHERE manhacungcap = ?";
$stmt_delete_phieunhaphang = $conn->prepare($sql_delete_phieunhaphang);
$stmt_delete_phieunhaphang->bind_param("s", $ma);
if (!$stmt_delete_phieunhaphang->execute()) {
    die("Không thể xóa phiếu nhập hàng: " . $conn->error);
}

// Xóa nhà cung cấp
$sql_delete_nhacungcap = "DELETE FROM nhacungcap WHERE manhacungcap = ?";
$stmt_delete_nhacungcap = $conn->prepare($sql_delete_nhacungcap);
$stmt_delete_nhacungcap->bind_param("s", $ma);
if ($stmt_delete_nhacungcap->execute()) {
    echo ("<script language='javascript'>alert('Xóa thành công'); window.location.assign('nhacungcap.php');</script>");
} else {
    die("Không thể xóa nhà cung cấp: " . $conn->error);
}

// Đóng prepared statements
$stmt_check->close();
$stmt_delete_chitiet->close();
$stmt_delete_phieunhaphang->close();
$stmt_delete_nhacungcap->close();
$conn->close();
?>
