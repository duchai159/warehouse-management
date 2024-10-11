<?php
    include_once("header.php");
?>


<body>
<h1 class="tieudeform">Đơn vị tính</h1>  <a class='btn btn-success mb-2' href='themdonvitinh.php'>Thêm đơn vị tính</a>
    <table class = "table table-hover ">
        <thead class="table-primary">
        <tr>
            <th>Mã đơn vị tính</th>
            <th>Tên đơn vị tính</th>
            
            <th colspan="2">Xử lý</th>
        </tr>
        </thead>
        <?php
        include("ketnoi.php");
        
         $sql = "SELECT * FROM donvitinh ORDER BY madonvitinh ASC";
        
        $kq = $conn->query($sql) or die("Không thể xem ");
        while ($row = mysqli_fetch_array($kq)) {
            echo ("<tr>");
            $ma = $row["madonvitinh"];
            echo ("<td>" . $row["madonvitinh"] . "</td>");
            echo ("<td>" . $row["tendonvitinh"] . "</td>");
           
            echo ("<td><a class='btn btn-primary' href='suadonvitinh.php?mm=$ma'>Sửa</a></td>");
            // echo ("<td><a class='btn btn-danger' href='xoadonvitinh.php?mm=$madvt'>Xóa</a></td>");


            echo ("<td>");
                ?>
                <a onclick = "return confirm('Bạn có thật sự muốn xoá không')" class="btn btn-danger" href="xoadonvitinh.php?mm=<?php echo $ma;?>">Xóa</a>
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
