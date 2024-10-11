<?php
    include_once("header.php");
?>

<h1 class="tieudeform">Thêm sản phẩm</h1>

<form name="frmMon" action="xli_themsp.php" method="post" enctype="multipart/form-data">

          <!--  <div class="form-group">
                <label>Mã sản phẩm</label> 
                <input class="form-control" type="text" name="txtMasanpham" />
            </div>
            -->
            <div class="form-group">
                <label>Tên sản phẩm </label>
                <input class="form-control" type="text" name="txtTensanpham" required/>
            </div>
            <div class="form-group">
                <label>Đơn vị tính</label>
                <select class="form-select" name="txtdonvitinh" required>
                    <?php
                    
                    $query = "SELECT * FROM donvitinh";
                    $result = $conn->query($query);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['madonvitinh'] . "'>" . $row['tendonvitinh'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Màu sắc</label>
                <select name="txtMau" class="form-select">
                    <option>Trắng </option>
                    <option>Xanh</option>
                    <option>Vàng</option>
                    <option>Đỏ</option>
                    <option>Cam</option>
                    <option>xám</option>
                </select>
            </div>

            <div class="form-group">
                <label>Loại sản phẩm</label>
                <select class="form-select" name="txtLoaisanpham" required>
                    <?php
                    include("ketnoi.php");
                    $query = "SELECT * FROM loaisanpham";
                    $result = $conn->query($query);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['maloaisanpham'] . "'>" . $row['tenloaisanpham'] . "</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label>Thương hiệu</label>
                <select class="form-select" name="txtmathuonghieu" required>
                    <?php
                    include("ketnoi.php");
                    $query = "SELECT * FROM thuonghieu";
                    $result = $conn->query($query);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['mathuonghieu'] . "'>" . $row['tenthuonghieu'] . "</option>";
                    }
                    ?>
                </select>
            </div>
<!-- 
            <div class="form-group">
                <label>Size</label>
                <select name="txtSize" class="form-select">
                    
                    <option>NULL</option>
                    <option>S</option>
                    <option>M</option>
                    <option>L</option>
                    <option>XL</option>
                    <option>XXL</option>
                    <option>38</option>
                    <option>39</option>
                    <option>40</option>
                    <option>41</option>
                    <option>42</option>
                    <option>43</option>
                    <option>44</option>

                </select> 
            </div> -->

            <div class="form-group">
                <label>Hình ảnh</label>
                <input class="form-control" type="file" name="txtHinhAnh"/>
            </div>

            <div class="form-group">
                <label>Số lượng</label>
                <input class="form-control" type="text" name="txtGia"/> <br>
            </div>

    <input class="btn btn-success" type="submit" name="Themsp" value="Thêm sản phẩm" />
</form>

<?php
    include("footer.php");
?>
</body>
</html>
