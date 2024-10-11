<?php
    include_once("header.php");
?>


<body>
<h1 class="tieudeform">  THÊM NHÀ CUNG CẤP  </h1>

<form name="frmMon" action="xli_themnhacungcap.php"
method="post" enctype=multipart/form-data>
<!--<div class="form-group">
<label>Mã nhà cung cấp</label> 
<input class="form-control" style="width:50%;" type="text" name="txtmanhacungcap"/>
</div>-->
<div class="form-group">
<label>Tên nhà cung cấp </label>
<input class="form-control" style="width:50%;" type="text" name="txttennhacungcap" required/>
</div>
<div class="form-group">
<label>Địa chỉ</label>
 <input class="form-control" style="width:50%;" type="text" name="txtdiachi" />
 </div>
 <div class="form-group">
 <label>email</label>
 <input class="form-control" style="width:50%;" type="text" name="txtemail" /><br/>
 </div>


<input type="submit" class="btn btn-success" name="Themnhacungcap" value="Thêm nhà cung cấp" />
</form>
   

    <?php
    include("footer.php");
?>
</body>
</html>
