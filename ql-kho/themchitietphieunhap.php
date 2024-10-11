<?php
    include_once("header.php");
?>

<h1 class="tieudeform">Thêm Chi tiết phiếu nhập</h1>

    <form name="frmMon" action="xli_themchitietphieunhap.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
                <label>số phiếu nhập</label>
                <select class="form-select" name="txtsophieunhap" required>
                    <?php
                    include("ketnoi.php");
                    $query = "SELECT * FROM phieunhaphang";
                    $result = $conn->query($query);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['sophieunhap'] . "'>" . $row['sophieunhap'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
            <label>Số lượng nhập</label>
            <input class="form-control" type="number" name="txtsoluongnhap" />
        </div>
            <div class="form-group">
                <label>Tên sản phẩm</label>
                <select class="form-select" name="txtsanpham" required>
                    <?php
                    include("ketnoi.php");
                    $query = "SELECT * FROM sanpham";
                    $result = $conn->query($query);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['masanpham'] . "'>" . $row['masanpham'] . "</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
            <label>Đơn vị tính</label>
            <input class="form-control"  type="text" name="txtdonvitinh" /> <br>
        </div>

    <input class="btn btn-success" type="submit" name="Themchitietphieunhap" value="Lưu " />
    <a class='btn btn-success' href='phieunhaphang.php'>Quay lại</a>

</form>

<?php
    include("footer.php");
?>
</body>
</html>
