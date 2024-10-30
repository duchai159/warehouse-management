<?php
include_once("header.php");

$ma = $_REQUEST["mm"];

$stmt = $conn->prepare("SELECT * FROM loaisanpham WHERE maloaisanpham = ?");
$stmt->bind_param("s", $ma);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo ("<form name='frmSualoaisanpham' action='xli_sualoaisanpham.php' method='post' enctype='multipart/form-data'>");
        echo ("<h1 class='tieudeform'>SỬA LOẠI SẢN PHẨM</h1>");
        
        echo ("<div class='form-group'><label>Mã loại sản phẩm:</label> <input type='text' style='width:50%;' class='form-control' name='txtmaloaisanpham' value='" . htmlspecialchars($row["maloaisanpham"]) . "' readonly></div>");
        echo ("<div class='form-group'><label>Tên loại sản phẩm:</label> <input type='text' style='width:50%;' class='form-control' name='txttenloaisanpham' value='" . htmlspecialchars($row["tenloaisanpham"]) . "'></div><br>");
       
        echo ("<input type='submit' class='btn btn-primary' name='sbmsualoaisanpham' value='Sửa'>");
        echo ("</form>");
    }
} else {
    echo "<div class='alert alert-danger'>Không tìm thấy loại sản phẩm nào với mã này.</div>";
}

// Đóng statement
$stmt->close();
include("footer.php");
?>
