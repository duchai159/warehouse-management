<?php
    include_once("header.php");
?>


<body>
<h1 class="tieudeform">  THÊM nhân viên  </h1>

<form name="frmMon" action="xli_themnhanvien.php"
method="post" enctype=multipart/form-data>


 <div class="form-group">
 <label>Họ tên nhân viên: </label>
 <input class="form-control"  type="text" name="txthoten"/>
 </div>
 <div class="form-group">
 <label>Số điện thoại: </label>
 <input class="form-control" type="text" name="txtsodienthoai"/>
 </div>
 <div class="form-group">
 <label>Email: </label>
 <input class="form-control"  type="text" name="txtemail"/>
 </div>
 <div class="form-group">
<label>Tên đăng nhập: </label>
<input class="form-control"  type="text" name="txttennhanvien" required/>
</div>
<div class="form-group">
<label>Mật khẩu: </label>
 <input class="form-control" type="password" name="txtmatkhau" />
 </div>
 <div class="form-group">
<label>Vai trò: </label>
 <select class="form-control" name="txtquyen" >
<?php
    $sql = "SELECT * FROM quyen";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<option value='" . $row["ma"]. "'>" . $row["ten"]. " </option>";
    }
    } else {
        echo "<option value=''></option>";
    }
?>
    </select>
 </div>
<br>
<input type="submit" class="btn btn-success" name="Themnhanvien" value="Thêm nhân viên" />
</form>
   

    <?php
    include("footer.php");
?>
</body>
</html>
