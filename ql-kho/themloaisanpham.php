<?php
    include_once("header.php");
?>


<body>
<h1 class='tieudeform'>  Thêm Loại Sản Phẩm  </h1>

<form name="frmMon" action="xli_themloaisanpham.php"
method="post" enctype=multipart/form-data>
<!--<div class="form-group">
<label>Mã loại sản phẩm</label> 
<input class="form-control"  style="width:50%;"type="text" name="txtmaloaisanpham"  />
</div>-->

<div class="form-group">
<label>Tên loại sản phẩm </label>
<input class="form-control"  style="width:50%;" type="text" name="txttenloaisanpham" required/><br />
</div>


<input type="submit" class="btn btn-success" name="Themloaisanpham" value="Thêm loại sản phẩm" />
</form>
    

    <?php
    include("footer.php");
?>
</body>
</html>
