<?php
    include_once("header.php");
?>
<?php

$ma = $_REQUEST["mm"];
$sql = "SELECT * FROM khohang WHERE makho='" . $ma . "'";
$kq = $conn->query($sql) or die("Không thể sửa ");

while ($row = mysqli_fetch_array($kq)) {
    echo ("<form name='frmSualoaisanpham' action='xli_suakhohang.php' method='post'enctype='multipart/form-data'>");
    echo ("<h1 class='tieudeform'>SỬA kho hàng  </h1>");
    
    echo ("<div class='form-group'><label>Mã kho hàng:</label> <input type='text' style='width:50%;'class='form-control' name='txtmakho' value='" . $row["makho"] . "' readonly></div>");
    echo ("<div class='form-group'><label>Tên kho hàng:</label> <input type='text' style='width:50%;'class='form-control' name='txttenkhohang' value='" . (isset($row["tenkho"]) ? $row["tenkho"] : '') . "'></div>");
    echo ("<div class = 'form-group' ><label>Loại sản phẩm:</label>");
    //-----
    $loaisp=$row["loaisanpham"];
    echo ("<select style='width:50%'name = 'txtloaisanpham' class = 'form-select'>");
    $query = "SELECT * FROM loaisanpham";
    $res = $conn->query($query);
    while ($r = mysqli_fetch_assoc($res)) {
        if($r['maloaisanpham']==$loaisp)
            echo "<option selected value='" . $r['maloaisanpham'] . "'>" . $r['tenloaisanpham'] . "</option>";
        else
            echo "<option value='" . $r['maloaisanpham'] . "'>" . $r['tenloaisanpham'] . "</option>";
    }
    echo ("</select><br>");
    echo("</div>");
    echo ("<input type='submit' class='btn btn-primary'name='sbmsuakhohang' value='Sửa'>");
    echo ("</form>");
}
?>
  <?php
    include("footer.php");
?>