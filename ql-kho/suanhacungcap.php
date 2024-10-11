<?php
    include_once("header.php");
?>




<?php
$ma = $_REQUEST["mm"];
$sql = "SELECT * FROM nhacungcap WHERE manhacungcap='" . $ma . "'";
$kq = $conn->query($sql) or die("Không thể sửa nhà cung cấp");

while ($row = mysqli_fetch_array($kq)) {
    echo ("<form name='frmSuanhacungcap' action='xli_suanhacungcap.php' method='post'enctype='multipart/form-data'>");
    echo ("<h1 class='tieudeform'>SỬA NHÀ CUNG CẤP</h1>");
    
    echo ("<div class = 'form-group' ><label>Mã nhà cung cấp:</label>  <input type='text' class='form-control' name='txtManhacungcap' value='" . $row["manhacungcap"] . "' readonly></div>");
    echo ("<div class = 'form-group' ><label>Tên nhà cung cấp:</label> <input type='text' class='form-control' name='txtTennhacungcap' value='" . (isset($row["tennhacungcap"]) ? $row["tennhacungcap"] : '') . "'></div>");
  
    echo ("<div class = 'form-group' ><label>Địa chỉ</label> <input type='text' class='form-control' name='txtDiachi' value='" . (isset($row["diachi"]) ? $row["diachi"] : '') . "'></div>");
    echo ("<div class = 'form-group' ><label>Email</label> <input type='text' class='form-control' name='txtEmail' value='" . (isset($row["email"]) ? $row["email"] : '') . "'></div><br>");

    echo ("<input class = 'btn btn-primary' type='submit' name='sbmsuanhacungcap' value='Sửa'>");
    echo ("</form>");
   }
   
?>
  <?php
    include("footer.php");
?>