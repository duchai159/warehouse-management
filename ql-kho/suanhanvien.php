<?php
    include_once("header.php");
?>

<?php
$ma = $_REQUEST["mm"];
$sql = "SELECT * FROM nhanvien WHERE tendangnhap='" . $ma . "'";
$kq = $conn->query($sql) or die("Không thể sửa ");

while ($row = mysqli_fetch_array($kq)) {
    echo ("<form name='frmSuanhanvien' action='xli_suanhanvien.php' method='post'enctype='multipart/form-data'>");
    echo ("<h1 class='tieudeform'>SỬA NHÂN VIÊN</h1>");
    
    echo ("<div class = 'form-group' ><label>Tên đăng nhập:</label> <input type='text' class='form-control' name='txttendangnhap' value='" . (isset($row["tendangnhap"]) ? $row["tendangnhap"] : '') . "' readonly></div>");
    echo ("<div class = 'form-group' ><label>Mật khẩu:</label>  <input  type='password' class='form-control' name='txtmatkhau' value='" . $row["matkhau"] . "' readonly></div>");
    echo ("<div class = 'form-group' ><label>Họ tên:</label>  <input type='text' class='form-control' name='txthoten' value='" . $row["hoten"] . "' </div>");
    echo ("<div class = 'form-group' ><label>Số điện thoại:</label>  <input type='text' class='form-control' name='txtsodienthoai' value='" . $row["sodienthoai"] . "' ></div>");

    echo ("<div class = 'form-group' ><label>Email</label> <input type='text' class='form-control' name='txtemail' value='" . (isset($row["email"]) ? $row["email"] : '') . "'></div><br>");
    echo ("<div class = 'form-group' ><label>Vai trò</label>"); 
    echo ("<select name = 'txtquyen' class='form-select'>");
    $query = "SELECT * FROM quyen";
    $res = $conn->query($query);
    while ($r = mysqli_fetch_assoc($res)) {
        if($r['ma']==$row["quyen"] )
            echo "<option selected value='" . $r['ma'] . "'>" . $r['ten'] . "</option>";
        else
        echo "<option value='" . $r['ma'] . "'>" . $r['ten'] . "</option>";
    }
    echo ("</select>");
    echo ("</div><br>");
    echo ("<input class = 'btn btn-primary' type='submit' name='sbmsuanhanvien' value='Sửa'>");
    echo ("</form>");
   }
   
?>
  <?php
    include("footer.php");
?>