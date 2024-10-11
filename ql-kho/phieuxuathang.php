<?php
include_once("header.php");
?>

<body>
<h1 class="tieudeform">QUẢN LÝ PHIẾU XUẤT HÀNG</h1>
<div><a class='btn btn-success' href='themphieuxuathang.php'>Tạo phiếu mượn</a></div> <br>

<table class="table table-hover">
    <thead class="table-primary">
        <tr>
           <th>Số phiếu xuất</th>
            <th>Tên nhân viên</th>
            <th>Ngày xuất hàng</th>
            <th>Tên kho</th>
            <th>Tên người mượn </th>
            <th> &nbsp; </th>

            <th colspan="2" style="text-align:center">Xử lý</th>
        </tr>
    </thead>
    <?php

$sql = "SELECT phieuxuathang.*, nhanvien.hoten, khohang.tenkho, khachhang.tenkhachhang
FROM phieuxuathang
JOIN nhanvien ON phieuxuathang.tendangnhap = nhanvien.tendangnhap
JOIN khohang ON phieuxuathang.makho = khohang.makho
JOIN khachhang ON phieuxuathang.makhachhang = khachhang.makhachhang
order by sophieuxuat asc";
    $kq = $conn->query($sql) or die("Không thể xem phiếu xuất hàng");
    while ($row = mysqli_fetch_array($kq)) {
        echo ("<tr>");
        $sophieuxuat = $row["sophieuxuat"];
        echo ("<td>" . $row["sophieuxuat"] . "</td>");
        echo ("<td>" . $row["hoten"] . "</td>");
        echo ("<td>" . $row["ngayxuathang"] . "</td>");
        echo ("<td>" . $row["tenkho"] . "</td>");
        echo ("<td>" . $row["tenkhachhang"] . "</td>");

        echo ("<td><a class='btn btn-info' href='chitietphieuxuat.php?mm=$sophieuxuat'>Thêm chi tiết</a></td>");

        echo ("<td><a class='btn btn-primary' href='suaphieuxuathang.php?mm=$sophieuxuat'>Sửa</a></td>");
        // echo ("<td><a class='btn btn-danger' href='xoaphieuxuathang.php?mm=$sophieuxuat'>Xóa</a></td>");



        echo ("<td>");
        ?>
        <a onclick = "return confirm('Bạn có thật sự muốn xoá không')" class="btn btn-danger" href="xoaphieuxuathang.php?mm=<?php echo $sophieuxuat;?>">Xóa</a>
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
