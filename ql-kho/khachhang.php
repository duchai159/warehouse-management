<?php
include_once("header.php");
?>


<body>
    <h1 class="tieudeform">QUẢN LÝ KHÁCH HÀNG</h1>
    <a class='btn btn-success mb-2' href='themkhachhang.php'>Thêm khách hàng</a>
    <table class="table table-hover ">
        <thead class="table-primary">
            <tr>
                <th>Mã khách hàng</th>
                <th>Tên khách hàng</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>

                <th colspan="2">Xử lý</th>
            </tr>
        </thead>
        <?php
        include("ketnoi.php");

        $sql = "SELECT * FROM khachhang ORDER BY makhachhang ASC";
        $kq = $conn->query($sql) or die("Không thể xem khách hàng");
        while ($row = mysqli_fetch_array($kq)) {
            echo ("<tr>");
            $makhachhang = $row["makhachhang"];
            echo ("<td>" . $row["makhachhang"] . "</td>");
            echo ("<td>" . $row["tenkhachhang"] . "</td>");
            echo ("<td>" . $row["diachi"] . "</td>");
            echo ("<td>" . $row["dienthoai"] . "</td>");

            echo ("<td><a class='btn btn-primary' href='suakhachhang.php?mm=$makhachhang'>Sửa</a></td>");
            echo ("<td><a class='btn btn-danger' href='xoakhachhang.php?mm=$makhachhang'>Xóa</a></td>");
            echo ("</tr>");
        }
        ?>
    </table><br>

    <?php
    include("footer.php");
    ?>
</body>

</html>