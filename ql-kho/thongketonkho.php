<?php
require_once("header.php");
?>

<h1 class="tieudeform">Thống kê số lượng tồn kho</h1>

<?php
$sql = "SELECT sp.tensanpham, (SUM(ctn.soluongnhap) - COALESCE(SUM(ctx.soluongxuat), 0)) AS tonkho
        FROM sanpham sp
        LEFT JOIN (SELECT masanpham, SUM(soluongnhap) AS soluongnhap FROM chitietphieunhap GROUP BY masanpham) ctn ON sp.masanpham = ctn.masanpham
        LEFT JOIN (SELECT masanpham, SUM(soluongxuat) AS soluongxuat FROM chitietphieuxuat GROUP BY masanpham) ctx ON sp.masanpham = ctx.masanpham
        GROUP BY sp.masanpham";

$result = $conn->query($sql);

echo "<table class='table table-hover'>";
echo "<tr>
            <th>Tên sản phẩm</th>
            <th>Số lượng tồn kho</th>
      </tr>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr> ";
        echo "<td>" . $row["tensanpham"] . " </td> ";

        if ($row["tonkho"] < 0) {
            echo "<td style='color: red;'>" . $row["tonkho"] . " (Số lượng xuất nhiều hơn số lượng nhập)</td>";
        } else {
            echo "<td>" . $row["tonkho"] . "</td>";
        }

        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

?>

<?php
require_once("footer.php");
?>
