<?php
    include_once("header.php");
?>
    <h1 class = "tieudeform">Quản lý thương hiệu</h1>
    <a class='btn btn-success mb-2' href='themthuonghieu.php'>Thêm thương hiệu</a>
    <table class = "table table-hover ">
        <thead class="table-primary">
        <tr>
            <th>Mã Thương hiệu </th>
            <th>Tên Thương hiệu</th>

            <th style="text-align:center"colspan="2">Xử lý</th>
        </tr>
        </thead>
        <?php
        
        $sql = "SELECT * FROM thuonghieu ORDER BY mathuonghieu ASC";
        $kq = $conn->query($sql) or die("Không thể xem thương hiệu");
        while ($row = mysqli_fetch_array($kq)) {
            echo ("<tr>");
            $mathuonghieu = $row["mathuonghieu"];
            echo ("<td>" . $row["mathuonghieu"] . "</td>");
            echo ("<td>" . $row["tenthuonghieu"] . "</td>");

            echo ("<td><a style='float:right;'class='btn btn-primary' href='suathuonghieu.php?mm=$mathuonghieu'>Sửa</a></td>");
            echo ("<td>");
            ?>
            <a onclick = "return confirm('Bạn có thật sự muốn xoá không')" class="btn btn-danger" href="xoathuonghieu.php?mm=<?php echo $mathuonghieu;?>">Xóa</a>
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
