

<?php
    include_once("header.php");
?>

<body>
<h1 class = "tieudeform">  THÊM KHÁCH HÀNG </h1>

<form name="frmMon" action="xli_themkhachhang.php"
method="post" enctype=multipart/form-data>
<!--<div class="form-group">
<label>Mã khách hàng</label> 
<input class="form-control" style="width:50%;" type="text" name="txtMakhachhang"/>
</div>-->
<div class="form-group">
<label>Tên khách hàng </label>
<input class="form-control" style="width:50%;" type="text" name="txtTenkhachhang" required/>
</div>

 <div class="form-group">
 <label>Địa chỉ </label>
<input class="form-control" style="width:50%;" type="text" name="txtDiachi" />
</div>
<div class="form-group">
<label>Số điện thoại</label>
 <input class="form-control" style="width:50%;" type="text" name="txtSodienthoai"/> <br>
 </div>
<input type="submit" class="btn btn-success"name="Themkhachhang" value="Thêm khách hàng" />
</form>
   
<?php
    include("footer.php");
?>
</body>
</html>
