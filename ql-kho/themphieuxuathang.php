<?php
    include_once("header.php");
?>

<body>
    <h1 class="tieudeform">THÊM PHIẾU XUẤT HÀNG</h1>

    <form name="frmMon" action="xli_themphieuxuathang.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Tên nhân viên</label>
            <select class="form-control" style="width:50%;" name="txttennhanvien" required>
                <?php
                include("ketnoi.php");
                $query = "SELECT * FROM nhanvien";
                $result = $conn->query($query);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row['tendangnhap'] . "'>" . $row['hoten'] . "</option>";
                }
                ?>
            </select>
        </div>
        <!--<div class="form-group">
            <label>Số phiếu nhập</label>
            <input class="form-control" style="width:50%;" type="text" name="txtsophieunhap" required/>
        </div>-->
        <div class="form-group">
            <label>Ngày xuất hàng</label>
            <input class="form-control" style="width:50%;" type="date" name="txtngayxuathang" />
        </div>
        <div class="form-group">
            <label>chọn kho</label>
            <select class="form-control" style="width:50%;" name="txtmakho" required>
                <?php
                $query = "SELECT * FROM khohang";
                $result = $conn->query($query);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row['makho'] . "'>" . $row['tenkho'] . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label>chọn khách hàng</label>
            <select class="form-control" style="width:50%;" name="txtmakhachhang" required>
                <?php
                $query = "SELECT * FROM khachhang";
                $result = $conn->query($query);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row['makhachhang'] . "'>" . $row['tenkhachhang'] . "</option>";
                }
                ?>
            </select><br>
        </div>

        <input type="submit" class="btn btn-success" name="Themphieuxuat" value="Lưu" />
        <a class='btn btn-success' href='phieuxuathang.php'>Quay lại</a>

    </form>

    <?php
    include("footer.php");
    ?>
</body>
</html>
