<?php
    include_once("header.php");
?>

<body>
    <h1 class="tieudeform">THÊM PHIẾU NHẬP HÀNG</h1>

    <form name="frmMon" action="xli_themphieunhaphang.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Tên nhân viên</label>
            <select class="form-control"  name="txttennhanvien" required>
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
            <label>Ngày nhập hàng</label>
            <input class="form-control"  type="date" name="txtngaynhaphang" value = "<?php //echo getdate(); ?>" required />
        </div>
        <div class="form-group">
            <label>Chọn kho</label>
            <select class="form-control"  name="txtmakho" required>
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
            <label>Chọn nhà cung cấp</label>
            <select class="form-control"  name="txtmanhacungcap" required>
                <?php
                $query = "SELECT * FROM nhacungcap";
                $result = $conn->query($query);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row['manhacungcap'] . "'>" . $row['tennhacungcap'] . "</option>";
                }
                ?>
            </select><br>
        </div>

        <input type="submit" class="btn btn-success" name="Themphieunhap" value="Lưu" />
        <a class='btn btn-success' href='phieunhaphang.php'>Quay lại</a>

    </form>

    <?php
    include("footer.php");
    ?>
</body>
</html>
