<?php
include("ketnoi.php");

if(isset($_POST["Themdonvitinh"])) {
    $mdvt = $_POST["txtMadonvitinh"];
    $tdvt = $_POST["txtTendonvitinh"];
   
    $sql = "INSERT INTO donvitinh (madonvitinh, tendonvitinh) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("ss", $mdvt, $tdvt);

    if ($stmt->execute()) {
        echo "<script language='javascript'>alert('" . htmlspecialchars('Thêm thành công') . "'); window.location.assign('donvitinh.php');</script>";
    } else {
        echo "Không thể thêm: " . htmlspecialchars($conn->error);
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Lỗi";
}
?>
