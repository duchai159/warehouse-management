<?php
include("ketnoi.php");

if (isset($_POST["Themkhachhang"])) {
    $ten = $_POST["txtTenkhachhang"];
    $diachi = $_POST["txtDiachi"];
    $sodienthoai = $_POST["txtSodienthoai"];

    // Sử dụng prepared statements để bảo vệ khỏi SQL injection
    $sql = "INSERT INTO khachhang (tenkhachhang, diachi, dienthoai) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $ten, $diachi, $sodienthoai);

    if ($stmt->execute()) {
        echo("<script language='javascript'>alert('Thêm khách hàng thành công');
        window.location.assign('khachhang.php');
        </script>");
    } else {
        die("Không thể thêm khách hàng: " . $stmt->error);
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Lỗi";
}
?>
