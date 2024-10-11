<?php
    include_once("header.php");
?>

<h1 class="tieudeform">Thêm Chi tiết phiếu xuất</h1>

<form name="frmMon" action="xli_themchitietphieuxuat.php" method="post" enctype="multipart/form-data">

          

            <div class="form-group">
                <label>số phiếu xuất</label>
                <select class="form-select" name="txtsophieuxuat" required>
                    <?php
                    include("ketnoi.php");
                    $query = "SELECT * FROM phieuxuathang";
                    $result = $conn->query($query);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['sophieuxuat'] . "'>" . $row['sophieuxuat'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
            <label>Số lượng xuất</label>
            <input class="form-control" type="number" name="txtsoluongxuat" />
        </div>
            <div class="form-group">
                <label>Tên sản phẩm</label>
                <select class="form-select" name="txtsanpham" required>
                    <?php
                    include("ketnoi.php");
                    $query = "SELECT * FROM sanpham";
                    $result = $conn->query($query);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['masanpham'] . "'>" . $row['tensanpham'] . "</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
            <label>Đơn vị tính</label>
            <input class="form-control"  type="text" name="txtdonvitinh" /> <br>
        </div>

    <input class="btn btn-success" type="submit" name="Themchitietphieuxuat" value="Lưu " />
    <a class='btn btn-success' href='phieuxuathang.php'>Quay lại</a>

</form>

<?php
    include("footer.php");
?>
</body>
</html>
