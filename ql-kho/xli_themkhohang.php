<?php
include("ketnoi.php");

if (isset($_POST["Themkhohang"])) {
    $ma = $_POST["txtmakhohang"];
    $ten = $_POST["txttenkho"];
    $loaisanpham = $_POST["txtloaisanpham"];

    $stmt = $conn->prepare("INSERT INTO khohang (makho, tenkho, loaisanpham) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $ma, $ten, $loaisanpham);

    if ($stmt->execute()) {
        echo("<script language='javascript'>alert('Thêm kho hàng thành công'); window.location.assign('khohang.php');</script>");
    } else {
        // Thông báo lỗi nếu có
        echo "<script language='javascript'>alert('Không thể thêm kho hàng: " . $stmt->error . "'); window.history.back();</script>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<script language='javascript'>alert('Lỗi: không có dữ liệu nào được gửi'); window.history.back();</script>";
}
?>
