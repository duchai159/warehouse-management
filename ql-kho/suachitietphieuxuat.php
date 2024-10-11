<?php
    include_once("header.php");
?>
<?php

$id = $_REQUEST["id"];
$sql = "SELECT * FROM chitietphieuxuat  WHERE id='" . $id . "'";




$kq = $conn->query($sql) or die("Không thể sửa");

while ($row = mysqli_fetch_array($kq)) {
    echo ("<form name='frmSuaSp' action='xli_suachitietphieuxuat.php' method='post'enctype='multipart/form-data'>");
    echo ("<h1 class='tieudeform'>SỬA CHI TIẾT PHIẾU XUẤT </h1>");
    //-----
    echo ("<div class = 'form-group' ><label>Id :</label>  <input type='text' class='form-control' name='txtid' value='" . $row["ID"] . "'readonly></div>");

    echo ("<div class = 'form-group' ><label>Số phiếu xuất :</label>  <input type='text' class='form-control' name='txtsophieuxuat' value='" . $row["sophieuxuat"] . "'readonly></div>");


    //.....
    echo ("<div class = 'form-group' ><label>Tên sản phẩm:</label>");
    //-----
    $sp=$row["masanpham"];
    echo ("<select name = 'txtmasanpham' class='form-select'>");
    $query = "SELECT * FROM sanpham";
    $res = $conn->query($query);
    while ($r = mysqli_fetch_assoc($res)) {
        if($r['masanpham']==$sp)
            echo "<option selected value='" . $r['masanpham'] . "'>" . $r['tensanpham'] . "</option>";
        else
            echo "<option value='" . $r['masanpham'] . "'>" . $r['tensanpham'] . "</option>";
    }
    echo ("</select>");
    echo("</div>");
    //----
    echo ("<div class = 'form-group' ><label>Số lượng xuất:</label>  <input type='text' class='form-control' name='txtsoluongxuat' value='" . $row["soluongxuat"] . "' </div> <br>");

    //-----
   
    echo ("<input class = 'btn btn-primary' type='submit' name='sbmsua' value='Sửa'>");
    echo ("</form>");
   }
   
?>
  <?php
    include("footer.php");
?>