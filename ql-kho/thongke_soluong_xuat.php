<?php
require_once("header.php");
?>
<h1 class="tieudeform">Thống kê số lượng tồn kho</h1>
<?php
    $sql = "select sp.tensanpham, sum(soluongxuat) as sl from chitietphieuxuat ct, sanpham sp WHERE ct.masanpham = sp.masanpham group by ct.masanpham";
    // echo $sql;
    $result = $conn->query($sql);
    echo "<table class = 'table table-hover'>";
    echo "<tr><th>Tên sản phẩm</th><th>Số lượng xuất</th></tr>";
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr> ";
        echo "<td>" . $row["tensanpham"]. " </td> ";
        echo "<td>". $row["sl"]. "</td>";
        echo "</td>";
    }
    echo "</table>";
    } else {
    echo "0 results";
    }

?>
<?php
require_once("footer.php");
?>