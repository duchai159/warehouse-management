<?php
    include_once("header.php");
?>
<body>

<?php

$ma = $_REQUEST["mm"];
$sql = "SELECT * FROM donvitinh WHERE madonvitinh='" . $ma . "'";
$kq = $conn->query($sql) or die("Không thể sửa khách hàng");

while ($row = mysqli_fetch_array($kq)) {
    echo ("<form name='frmSuakhachhang' action='xli_suadonvitinh.php' method='post' enctype='multipart/form-data'>");
    echo ("<h1 class='tieudeform'>Sửa thông tin đơn vị tính</h1>");

    echo ("<div class='form-group'><label>Mã đơn vị tính:</label> <input type='text' style='width:50%;'class='form-control' name='txtMadonvitinh' value='" . $row["madonvitinh"] . "' readonly></div>");
    echo ("<div class='form-group'><label>Tên đơn vị tính:</label> <input type='text' style='width:50%;'class='form-control' name='txtTendonvitinh' value='" . $row["tendonvitinh"] . "' ></div><br>");

    echo ("<input type='submit'class='btn btn-primary' name='sbmsuadvt' value='Sửa'>");
    echo ("</form>");
}
?>
  
  <?php
    include("footer.php");
?>
</body>
</html>
