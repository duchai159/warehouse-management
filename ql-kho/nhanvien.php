<?php
    include_once("header.php");
?>
   <h1 class="tieudeform">Quản lý nhân viên</h1>
   <a class='btn btn-success mb-2' href='themnhanvien.php'>Thêm nhân viên</a>
    <table class = "table table-hover ">
        <thead class="table-primary">
            <tr>
            <th>Tên đăng nhập</th>
            <th>Mật khẩu</th>
            <th>Họ tên</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Quyền</th>
            <th style="text-align:center"colspan="2">Xử lý</th>
        </tr>
        </thead>
        <?php
        
        $sql = "SELECT * FROM nhanvien, quyen WHERE nhanvien.quyen = quyen.ma ORDER BY quyen";
        $kq = $conn->query($sql) or die("Không thể xem ");
        while ($row = mysqli_fetch_array($kq)) {
            echo ("<tr>");
            $tendangnhap = $row["tendangnhap"];
            echo ("<td>" . $row["tendangnhap"] . "</td>");
            echo ("<td>*****</td>");
            echo ("<td>" . $row["hoten"] . "</td>");
            echo ("<td>" . $row["sodienthoai"] . "</td>");
            echo ("<td>" . $row["email"] . "</td>");
            echo ("<td>" . $row["ten"] . "</td>");
            echo ("<td><a class='btn btn-primary' href='suanhanvien.php?mm=$tendangnhap'>Sửa</a></td>");
            // echo ("<td><a class='btn btn-danger' href='xoanhanvien.php?mm=$tendangnhap'>Xóa</a></td>");
            echo ("<td>");
            ?>
            <a onclick = "return confirm('Bạn có thật sự muốn xoá không')" class="btn btn-danger" href="xoanhanvien.php?mm=<?php echo $tendangnhap;?>">Xóa</a>
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
