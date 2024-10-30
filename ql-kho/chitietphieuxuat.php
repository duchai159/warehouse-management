<?php
include_once("header.php");

// Khởi tạo biến và kiểm tra tham số từ GET
$sophieuxuat = "";
if (isset($_GET['mm'])) {
    $sophieuxuat = $_GET['mm'];
}

// Truy vấn để lấy danh sách sản phẩm
$query = "SELECT * FROM sanpham";
$result = $conn->query($query);
?>
<h1 class="tieudeform">Thêm Chi tiết phiếu xuất</h1>
<form name="frmMon" action="xli_themchitietphieuxuat.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Số phiếu xuất</label>
        <input class="form-control" type="" name="txtsophieuxuat" readonly value="<?php echo htmlspecialchars($sophieuxuat); ?>">
    </div>
    <div class="form-group">
        <label>Tên sản phẩm</label>
        <select class="form-select" name="txtsanpham" required>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . htmlspecialchars($row['masanpham']) . "'>" . htmlspecialchars($row['tensanpham']) . "</option>";
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label>Số lượng xuất</label>
        <input class="form-control" type="number" name="txtsoluongxuat" required />
    </div>
    <p></p>
    <input class="btn btn-success" type="submit" name="Themchitietphieuxuat" value="Lưu " />
    <a class='btn btn-success' href='phieuxuathang.php'>Quay lại</a><br><br>
</form>

<h3>Chi tiết phiếu xuất hàng số <span style="red"><?php echo htmlspecialchars($sophieuxuat); ?></span></h3>
<table class="table table-hover">
    <thead class="table-primary">
        <tr>
            <th>Id</th>
            <th>Số phiếu xuất</th>
            <th>Tên sản phẩm mượn</th>
            <th>Số lượng mượn</th>
            <th style="text-align:center" colspan="2">Xử lý</th>
        </tr>
    </thead>
    <?php
    // Sử dụng prepared statement cho truy vấn chi tiết phiếu xuất
    $sql = "SELECT * FROM chitietphieuxuat 
            JOIN sanpham ON chitietphieuxuat.masanpham = sanpham.masanpham 
            JOIN donvitinh ON sanpham.donvitinh = donvitinh.madonvitinh 
            WHERE chitietphieuxuat.sophieuxuat = ? 
            ORDER BY sophieuxuat";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $sophieuxuat);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = mysqli_fetch_array($result)) {
        echo ("<tr>");
        $id = $row["ID"];
        echo ("<td>" . htmlspecialchars($row["ID"]) . "</td>");
        echo ("<td>" . htmlspecialchars($row["sophieuxuat"]) . "</td>");
        echo ("<td>" . htmlspecialchars($row["tensanpham"]) . "</td>");
        echo ("<td>" . htmlspecialchars($row["soluongxuat"]) . "</td>");
        echo ("<td><a class='btn btn-primary' href='suachitietphieuxuat.php?id=$id'>Sửa</a></td>");
        echo ("<td>");
    ?>
        <a onclick="return confirm('Bạn có thật sự muốn xoá không')" class="btn btn-danger" href="xoachitietphieuxuat.php?id=<?php echo htmlspecialchars($id); ?>&spx=<?php echo htmlspecialchars($sophieuxuat); ?>">Xóa</a>
    <?php
        echo ("</td>");
        echo ("</tr>");
    }
    ?>
</table>

<?php
include("footer.php");
?>
</body>
</html>
