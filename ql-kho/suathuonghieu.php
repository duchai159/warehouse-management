<?php
include_once("header.php");

$ma = $_REQUEST["mm"];

$stmt = $conn->prepare("SELECT * FROM thuonghieu WHERE mathuonghieu = ?");
$stmt->bind_param("s", $ma);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo ("<form name='frmSuathuonghieu' action='xli_suathuonghieu.php' method='post' enctype='multipart/form-data'>");
        echo ("<h1 class='tieudeform'>Sửa thương hiệu</h1>");
        
        echo ("<div class='form-group'><label>Mã thương hiệu:</label> <input type='text' style='width:50%' class='form-control' name='txtmathuonghieu' value='" . htmlspecialchars($row["mathuonghieu"]) . "' readonly></div>");
        echo ("<div class='form-group'><label>Tên thương hiệu:</label> <input type='text' style='width:50%' class='form-control' name='txttenthuonghieu' value='" . htmlspecialchars($row["tenthuonghieu"]) . "'></div><br>");
       
        echo ("<input type='submit' class='btn btn-primary' name='sbmsuathuonghieu' value='Sửa'>");
        echo ("</form>");
    }
} else {
    echo "<div class='alert alert-danger'>Không tìm thấy thương hiệu nào với mã này.</div>";
}

// Đóng statement
$stmt->close();
include("footer.php");
?>
