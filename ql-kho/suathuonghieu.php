<?php
    include_once("header.php");
?>



<?php

$ma = $_REQUEST["mm"];
$sql = "SELECT * FROM thuonghieu WHERE mathuonghieu='" . $ma . "'";
$kq = $conn->query($sql) or die("Không thể sửa sản phẩm");

while ($row = mysqli_fetch_array($kq)) {
    echo ("<form name='frmSuathuonghieu' action='xli_suathuonghieu.php' method='post'enctype='multipart/form-data'>");
    echo ("<h1 class='tieudeform'>Sửa thương hiệu </h1>");
    
    echo ("<div class='form-group'><label>Mã thương hiệu:</label> <input type='text' style='width:50%' class='form-control' name='txtmathuonghieu' value='" . $row["mathuonghieu"] . "' readonly></div>");
    echo ("<div class='form-group'><label>Tên thương hiệu:</label> <input type='text' style='width:50%' class='form-control' name='txttenthuonghieu' value='" . (isset($row["tenthuonghieu"]) ? $row["tenthuonghieu"] : '') . "'></div><br>");
   
    echo ("<input type='submit' class='btn btn-primary' name='sbmsuathuonghieu' value='Sửa'>");
    echo ("</form>");
}
?>

<?php
    include("footer.php");
?>