<?php
include_once("header.php");
?>
<h1 class="tieudeform">Thông tin phiếu mượn</h1>
<table class="table table-hover">
    <thead class="table-primary">
        <tr>
            <th>Mã phiếu mượn</th>
            <th>Tên nhân viên</th>
            <th>Ngày mượn</th>
            <th>Kho</th>
            <th>Khách mượn</th>
            <th>Sản phẩm mượn</th>
            <th>Số lượng</th>
            <th>Hình ảnh</th>
            <th>Xử lý</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT phieuxuathang.sophieuxuat, nhanvien.hoten AS tennhanvien, phieuxuathang.ngayxuathang, khohang.tenkho, khachhang.tenkhachhang, sanpham.tensanpham, chitietphieuxuat.soluongxuat, sanpham.hinhanh
                FROM phieuxuathang
                INNER JOIN nhanvien ON phieuxuathang.tendangnhap = nhanvien.tendangnhap
                INNER JOIN khohang ON phieuxuathang.makho = khohang.makho
                INNER JOIN khachhang ON phieuxuathang.makhachhang = khachhang.makhachhang
                INNER JOIN chitietphieuxuat ON phieuxuathang.sophieuxuat = chitietphieuxuat.sophieuxuat
                INNER JOIN sanpham ON chitietphieuxuat.masanpham = sanpham.masanpham";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["sophieuxuat"] . "</td>";
                echo "<td>" . $row["tennhanvien"] . "</td>";
                echo "<td>" . $row["ngayxuathang"] . "</td>";
                echo "<td>" . $row["tenkho"] . "</td>";
                echo "<td>" . $row["tenkhachhang"] . "</td>";
                echo "<td>" . $row["tensanpham"] . "</td>";
                echo "<td>" . $row["soluongxuat"] . "</td>";
                echo "<td><img class='img-fluid' height='100px' width='100px' src='" . $row["hinhanh"] . "' alt='Hình ảnh sản phẩm'></td>";
                echo "<td><a href='print_pdf.php?sophieuxuat=" . $row['sophieuxuat'] . "' class='btn btn-primary'>In phiếu mượn</a></td>";
                echo "</tr>";
            }
        } else {
            echo "0 results";
        }
        ?>
    </tbody>
</table>
<?php
include("footer.php");
?>
</body>
</html>
