<?php
include("ketnoi.php");

if (isset($_POST["Themchitietphieuxuat"])) {
    $spx = $_POST["txtsophieuxuat"];
    $slx = $_POST["txtsoluongxuat"];
    $sp = $_POST["txtsanpham"];

    $sql_check = "SELECT dongia FROM sanpham WHERE masanpham = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("s", $sp);
    $stmt_check->execute();
    $stmt_check->bind_result($dongia);
    $stmt_check->fetch();
    $stmt_check->close();

    if ($dongia >= $slx) {
        $sql_insert = "INSERT INTO chitietphieuxuat (sophieuxuat, soluongxuat, masanpham) VALUES (?, ?, ?)";
        
        $stmt_insert = $conn->prepare($sql_insert);
        
        $stmt_insert->bind_param("sis", $spx, $slx, $sp); // 's' cho chuỗi, 'i' cho số nguyên

        if ($stmt_insert->execute()) {
        
            $sql_update = "UPDATE sanpham SET dongia = dongia - ? WHERE masanpham = ?";
            
            
            $stmt_update = $conn->prepare($sql_update);
            
            
            $stmt_update->bind_param("is", $slx, $sp); // 'i' cho số nguyên, 's' cho chuỗi

            
            if ($stmt_update->execute()) {
                echo("<script language='javascript'>alert('Thêm thành công và đã trừ số lượng sản phẩm.');
                window.location.assign('chitietphieuxuat.php?mm=$spx');
                </script>");
            } else {
                die("Không thể trừ số lượng sản phẩm: " . $stmt_update->error);
            }

           
            $stmt_update->close();
        } else {
            die("Không thể thêm: " . $stmt_insert->error);
        }

        // Đóng statement INSERT
        $stmt_insert->close();
    } else {
        echo("<script language='javascript'>alert('Đơn giá không đủ để trừ số lượng xuất.');
        window.location.assign('chitietphieuxuat.php?mm=$spx');
        </script>");
    }

    $conn->close();
} else {
    echo "Lỗi";
}
?>
