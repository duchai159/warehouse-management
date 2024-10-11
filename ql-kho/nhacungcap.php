<?php
    include_once("header.php");
?>
<body>
    <h1 class="tieudeform">QUẢN LÝ NHÀ CUNG CẤP</h1>
    <a class='btn btn-success mb-2' href='themnhacungcap.php'>Thêm nhà cung cấp</a>
    <table class = "table table-hover ">
        <thead class="table-primary">
            <tr>
            <th>Mã nhà cung cấp </th>
            <th>Tên nhà cung cấp</th>
            <th>Địa chỉ</th>
            <th>Email</th>
            
            <th colspan="2">Xử lý</th>    
        </tr>
        </thead>
        <?php
        
        $sql = "SELECT * FROM nhacungcap ORDER BY manhacungcap ASC";
        $kq = $conn->query($sql) or die("Không thể xem sản phẩm");
        while ($row = mysqli_fetch_array($kq)) {
            echo ("<tr>");
            $manhacungcap = $row["manhacungcap"];
            echo ("<td>" . $row["manhacungcap"] . "</td>");
            echo ("<td>" . $row["tennhacungcap"] . "</td>");
            echo ("<td>" . $row["diachi"] . "</td>");
            echo ("<td>" . $row["email"] . "</td>");
            
            echo ("<td><a class='btn btn-primary' href='suanhacungcap.php?mm=$manhacungcap'>Sửa</a></td>");
            echo ("<td><a class='btn btn-danger' href='xoanhacungcap.php?mm=$manhacungcap'>Xóa</a></td>");
            echo ("</tr>");
        }
        ?>
    </table><br>

    <?php
    include("footer.php");
?>

</body>
</html>
