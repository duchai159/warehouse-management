

<?php
    include_once("header.php");
?>

<body>
<h1 class = "tieudeform">  THÊM ĐƠN VỊ TÍNH </h1>

<form name="frmMon" action="xli_themdonvitinh.php"
method="post" enctype=multipart/form-data>

<div class="form-group">
<label>Tên đơn vị tính </label>
<input class="form-control" style="width:50%;" type="text" name="txtTendonvitinh" required/> <br>
</div>
<input type="submit" class="btn btn-success"name="Themdonvitinh" value="Lưu" />
</form>
   
<?php
    include("footer.php");
?>
</body>
</html>
