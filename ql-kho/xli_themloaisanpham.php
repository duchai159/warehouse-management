<?php
include("ketnoi.php");

if(isset($_POST["Themloaisanpham"])) {
    
    $ma = $_POST["txtmaloaisanpham"];
    $ten = $_POST["txttenloaisanpham"];
    
    
    $sql = "INSERT INTO loaisanpham (maloaisanpham, tenloaisanpham) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);

    
    $stmt->bind_param("ss", $ma, $ten);

    
    if ($stmt->execute()) {
        echo "<script language='javascript'>alert('" . htmlspecialchars('Thêm loại sản phẩm thành công') . "'); window.location.assign('loaisanpham.php');</script>";
    } else {
        echo "Không thể thêm loại sản phẩm: " . htmlspecialchars($conn->error);
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Lỗi";
}
?>
