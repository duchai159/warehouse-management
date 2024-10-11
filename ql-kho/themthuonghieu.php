<?php
    include_once("header.php");
?>
<body>
<h1 class="tieudeform">  Thêm Thương Hiệu  </h1> <br>

<form name="frmMon" action="xli_themthuonghieu.php"
method="post" enctype=multipart/form-data>

<!--<div class="form-group">
<label>Mã thương hiệu:</label> 
<input style="width:50%;"class="form-control" type="text" name="txtMaThuongHieu"  />
</div>
-->
<div class="form-group">
<label>Tên Thương hiệu:</label>
<input style="width:50%;" class="form-control" type="text" name="txtTenthuonghieu" required/><br />
</div>


<input class="btn btn-success"type="submit" name="Themth" value="Thêm thương hiệu" />
</form>

    

<?php
    include("footer.php");
?>

</body>
</html>
