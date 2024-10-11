<?php
    include_once("header.php");
?>
    <h1 class="tieudeform">Quản lý loại sản phẩm</h1> 
    <a class='btn btn-success mb-2' href='themloaisanpham.php'>Thêm loại sản phẩm</a>
    <table class = "table table-hover ">
        <thead class="table-primary">
        <tr>
            <th>Mã loại sản phẩm</th>
            <th>Tên loại sản phẩm </th>
            <th style="text-align:center"colspan="2">Xử lý</th>
       
        </tr>
        </thead>
        <?php
        $sql = "SELECT * FROM loaisanpham ORDER BY maloaisanpham ASC";
        $kq = $conn->query($sql) or die("Không thể xem loại sản phẩm");
        while ($row = mysqli_fetch_array($kq)) {
            echo ("<tr>");
            $ma = $row["maloaisanpham"];
            echo ("<td>" . $row["maloaisanpham"] . "</td>");
            echo ("<td>" . $row["tenloaisanpham"] . "</td>");
           
            echo ("<td><a style='float:right;'class='btn btn-primary' href='sualoaisanpham.php?mm=$ma'>Sửa</a></td>");

            echo ("<td>");
            ?>
            <a onclick = "return confirm('Bạn có thật sự muốn xoá không')" class="btn btn-danger" href="xoaloaisanpham.php?mm=<?php echo $ma;?>">Xóa</a>
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
