<?php
    include_once("header.php");
?>


<body>
<h1 class="tieudeform">  THÊM kho hàng </h1>

<form name="frmMon" action="xli_themkhohang.php"
method="post" enctype=multipart/form-data>


<div class="form-group">
<label>Tên kho</label>
 <input class="form-control" style="width:50%;" type="text" name="txttenkho" />
 </div>
 <div class="form-group">
                <label>Loại sản phẩm</label>
                <select class="form-select" name="txtloaisanpham" required>
                    <?php
                    include("ketnoi.php");
                    $query = "SELECT * FROM loaisanpham";
                    $result = $conn->query($query);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['maloaisanpham'] . "'>" . $row['tenloaisanpham'] . "</option>";
                    }
                    ?>
                </select><br>
            </div>

<input type="submit" class="btn btn-success" name="Themkhohang" value="Thêm kho hàng" />
</form>
   

    <?php
    include("footer.php");
?>
</body>
</html>
