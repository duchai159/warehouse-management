<?php
include("ketnoi.php");

if(isset($_POST["Themth"])) {
    
    $ma = $_POST["txtMaThuongHieu"];
    $ten = $_POST["txtTenthuonghieu"];
    
    
    $sql = "INSERT INTO thuonghieu (MaThuongHieu, TenThuongHieu) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);

    
    $stmt->bind_param("ss", $ma, $ten);

    
    if ($stmt->execute()) {
        
        echo "<script language='javascript'>alert('Thêm thành công'); window.location.assign('thuonghieu.php');</script>";
    } else {
        die("Không thể thêm thương hiệu: " . htmlspecialchars($conn->error));
    }

    
    $stmt->close();
    $conn->close();
} else {
    echo "Lỗi";
}
?>