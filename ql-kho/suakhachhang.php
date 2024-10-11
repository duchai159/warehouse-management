<?php
    include_once("header.php");
?>
<body>

<?php

$ma = $_REQUEST["mm"];
$sql = "SELECT * FROM khachhang WHERE makhachhang='" . $ma . "'";
$kq = $conn->query($sql) or die("Không thể sửa khách hàng");

while ($row = mysqli_fetch_array($kq)) {
    echo ("<form name='frmSuakhachhang' action='xli_suakhachhang.php' method='post' enctype='multipart/form-data'>");
    echo ("<h1 class='tieudeform'>Sửa thông tin Khách hàng</h1>");

    echo ("<div class='form-group'><label>Mã khách hàng:</label> <input type='text' style='width:50%;'class='form-control' name='txtMakhachhang' value='" . $row["makhachhang"] . "' readonly></div>");
    echo ("<div class='form-group'><label>Tên khách hàng:</label> <input type='text' style='width:50%;'class='form-control' name='txtTenkhachhang' value='" . (isset($row["tenkhachhang"]) ? $row["tenkhachhang"] : '') . "'></div>");
    echo ("<div class='form-group'><label>Địa chỉ:</label> <input type='text' style='width:50%;'class='form-control' name='txtDiachi' value='" . (isset($row["diachi"]) ? $row["diachi"] : '') . "'></div>");
    echo ("<div class='form-group'><label>Số điện thoại:</label> <input type='text' style='width:50%;'class='form-control' name='txtSodienthoai' value='" . (isset($row["dienthoai"]) ? $row["dienthoai"] : '') . "'></div><br>");

    echo ("<input type='submit'class='btn btn-primary' name='sbmsuakhachhang' value='Sửa'>");
    echo ("</form>");
}
?>
  
  <?php
    include("footer.php");
?>
</body>
</html>
