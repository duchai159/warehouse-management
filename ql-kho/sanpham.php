<?php
include_once("header.php");
?>

<h1 class="tieudeform">Quản lý sản phẩm </h1>
<div class="row">
    <div class="col-md-10">
        <form method="GET" action="">
            <label for="search">Tìm kiếm:</label>
            <input type="text" name="search" id="search" placeholder="Nhập tên sản phẩm" value="<?php echo htmlspecialchars($timkiem_tukhoa); ?>">
            <button type="submit" class="btn btn-primary">Tìm kiếm</button> <br><br>
        </form>
    </div>
    <div class="col-md-2 text-right">
        <a class='btn btn-success' href='themsp.php'>Thêm sản phẩm</a>
    </div>
</div>

<table class="table table-hover ">
    <thead class="table-primary">
        <tr>
            <th>Mã sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Đơn vị tính</th>
            <th>Màu sắc</th>
            <th>Loại sản phẩm</th>
            <th>Thương hiệu</th>
            <th>Hình ảnh</th>
            <th>Số lượng trong kho</th>
            <th style="text-align:center" colspan="2">Xử lý</th>
        </tr>
    </thead>

    <?php
    // Check if the search parameter is set in the URL
    $timkiem_tukhoa = isset($_GET['search']) ? $_GET['search'] : '';

    // Prepare the SQL query to include the search functionality
    $sql = "SELECT sanpham.*, donvitinh.tendonvitinh, loaisanpham.tenloaisanpham, thuonghieu.tenthuonghieu
            FROM sanpham
            JOIN loaisanpham ON sanpham.loaisanpham = loaisanpham.maloaisanpham
            JOIN thuonghieu ON sanpham.mathuonghieu = thuonghieu.mathuongHieu
            JOIN donvitinh ON sanpham.donvitinh = donvitinh.madonvitinh
            WHERE sanpham.tensanpham LIKE ?
            ORDER BY masanpham ASC";

    $stmt = $conn->prepare($sql);
    $search_param = "%" . $timkiem_tukhoa . "%";
    $stmt->bind_param("s", $search_param);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        echo ("<tr>");
        $masanpham = $row["masanpham"];
        echo ("<td>" . htmlspecialchars($row["masanpham"]) . "</td>");
        echo ("<td>" . htmlspecialchars($row["tensanpham"]) . "</td>");
        echo ("<td>" . htmlspecialchars($row["tendonvitinh"]) . "</td>");
        echo ("<td>" . htmlspecialchars($row["mausac"]) . "</td>");
        echo ("<td>" . htmlspecialchars($row["tenloaisanpham"]) . "</td>");
        echo ("<td>" . htmlspecialchars($row["tenthuonghieu"]) . "</td>");
        echo ("<td><img class='img-fluid' height='100px' width='100px'  src='" . htmlspecialchars($row['hinhanh']) . "' alt='Hình ảnh sản phẩm'></td>");
        echo ("<td>" . htmlspecialchars($row["dongia"]) . "</td>");
        echo ("<td><a class='btn btn-primary' href='suasp.php?mm=" . htmlspecialchars($masanpham) . "'>Sửa</a></td>");
        echo ("<td>");
        ?>
        <a onclick="return confirm('Bạn có thật sự muốn xoá không')" class="btn btn-danger"
            href="xoasp.php?mm=<?php echo htmlspecialchars($masanpham); ?>">Xóa</a>
        <?php
        echo ("</td>");
        echo ("</tr>");
    }
    ?>

</table><br>

<?php
include("footer.php");
?>
</body>
</html>
