<?php
    include_once("header.php");
?>
<?php
$ma = $_REQUEST["mm"];
$sql = "SELECT * FROM phieuxuathang  WHERE sophieuxuat='" . $ma . "'";

$kq = $conn->query($sql) or die("Không thể sửa ");

while ($row = mysqli_fetch_array($kq)) {
    echo ("<form name='frmSuaSp' action='xli_suaphieuxuathang.php' method='post'enctype='multipart/form-data'>");
    echo ("<h1 class='tieudeform'>SỬA PHIẾU xuất HÀNG</h1>");
    echo ("<div class = 'form-group' ><label>Tên đăng nhập</label>");
    //-----
    $nhanvien=$row["tendangnhap"];
    echo ("<select name = 'txttennhanvien' class = 'form-select'>");
    $query = "SELECT * FROM nhanvien";
    $res = $conn->query($query);
    while ($r = mysqli_fetch_assoc($res)) {
        if($r['tendangnhap']==$nhanvien)
            echo "<option selected value='" . $r['tendangnhap'] . "'>" . $r['tendangnhap'] . "</option>";
        else
            echo "<option value='" . $r['tendangnhap'] . "'>" . $r['tendangnhap'] . "</option>";
    }
    echo ("</select>");
    echo("</div>");
    echo ("<div class = 'form-group' ><label>Số phiếu xuất:</label>  <input type='text' class='form-control' name='txtsophieuxuat' value='" . $row["sophieuxuat"] . "' <readonly></div>");
    echo ("<div class = 'form-group' ><label>Ngày xuất hàng:</label>  <input type='date' class='form-control' name='txtngayxuathang' value='" . $row["ngayxuathang"] . "' </div>");

    //.....
    echo ("<div class = 'form-group' ><label>Mã kho:</label>");
    //-----
    $makho=$row["makho"];
    echo ("<select name = 'txtmakho' class='form-select'>");
    $query = "SELECT * FROM khohang";
    $res = $conn->query($query);
    while ($r = mysqli_fetch_assoc($res)) {
        if($r['makho']==$makho)
            echo "<option selected value='" . $r['makho'] . "'>" . $r['tenkho'] . "</option>";
        else
            echo "<option value='" . $r['makho'] . "'>" . $r['tenkho'] . "</option>";
    }
    echo ("</select>");
    echo("</div>");
    //----
    echo ("<div class = 'form-group' ><label>Tên khách hàng:</label>");
    //-----
    $makhachhang=$row["makhachhang"];
    echo ("<select name = 'txtmakhachhang' class='form-select'>");
    $query = "SELECT * FROM khachhang";
    $res = $conn->query($query);
    while ($r = mysqli_fetch_assoc($res)) {
        if($r['makhachhang']==$makhachhang)
            echo "<option selected value='" . $r['makhachhang'] . "'>" . $r['tenkhachhang'] . "</option>";
        else
            echo "<option value='" . $r['makhachhang'] . "'>" . $r['tenkhachhang'] . "</option>";
    }
    echo ("</select>");
    echo("</div><br>"); 
    //----
    echo ("<input class = 'btn btn-primary' type='submit' name='sbmsuaphieuxuathang' value='Sửa'>");
    echo ("</form>");
   }
   
?>
  <?php
    include("footer.php");
?>