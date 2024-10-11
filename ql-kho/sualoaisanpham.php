<?php
    include_once("header.php");
?>
<?php

$ma = $_REQUEST["mm"];
$sql = "SELECT * FROM loaisanpham WHERE maloaisanpham='" . $ma . "'";
$kq = $conn->query($sql) or die("Không thể sửa sản phẩm");

while ($row = mysqli_fetch_array($kq)) {
    echo ("<form name='frmSualoaisanpham' action='xli_sualoaisanpham.php' method='post'enctype='multipart/form-data'>");
    echo ("<h1 class='tieudeform'>SỬA LOẠI SẢN PHẨM  </h1>");
    
    echo ("<div class='form-group'><label>Mã loại sản phẩm:</label> <input type='text' style='width:50%;'class='form-control' name='txtmaloaisanpham' value='" . $row["maloaisanpham"] . "' readonly></div>");
    echo ("<div class='form-group'><label>Tên loại sản phẩm:</label> <input type='text' style='width:50%;'class='form-control' name='txttenloaisanpham' value='" . (isset($row["tenloaisanpham"]) ? $row["tenloaisanpham"] : '') . "'></div><br>");
   
    echo ("<input type='submit' class='btn btn-primary'name='sbmsualoaisanpham' value='Sửa'>");
    echo ("</form>");
}
?>
  <?php
    include("footer.php");
?>