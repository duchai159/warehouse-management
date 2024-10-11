<?php
    include_once("header.php");
?>
    <h1 class = "tieudeform">Quản lý kho hàng</h1>
    <a class='btn btn-success mb-2' href='themkhohang.php'>Thêm kho hàng</a>
    <table class = "table table-hover ">
        <thead class="table-primary">
        <tr>
            <th>Mã kho hàng</th>
            <th>Tên kho hàng</th>
            <th>Loại sản phẩm</th>

            <th style="text-align:center"colspan="2">Xử lý</th>
        </tr>
        </thead>
        <?php
        
        // $sql = "SELECT * FROM khohang ORDER BY makho ASC";
        $sql = "SELECT khohang.*, loaisanpham.tenloaisanpham
        FROM khohang
        JOIN loaisanpham ON khohang.loaisanpham = loaisanpham.maloaisanpham
       
        ORDER BY makho  ASC";
        $kq = $conn->query($sql) or die("Không thể xem ");
        while ($row = mysqli_fetch_array($kq)) {
            echo ("<tr>");
            $makho = $row["makho"];
            echo ("<td>" . $row["makho"] . "</td>");
            echo ("<td>" . $row["tenkho"] . "</td>");
            echo ("<td>" . $row["tenloaisanpham"] . "</td>");

            echo ("<td><a style='float:right;'class='btn btn-primary' href='suakhohang.php?mm=$makho'>Sửa</a></td>");
            echo ("<td>");
            ?>
            <a onclick = "return confirm('Bạn có thật sự muốn xoá không')" class="btn btn-danger" href="xoakhohang.php?mm=<?php echo $makho;?>">Xóa</a>
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
