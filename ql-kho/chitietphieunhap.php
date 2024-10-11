    <?php
    include_once("header.php");
    $sophieunhap="";
    if (isset($_GET['mm'])) {
        $sophieunhap = $_GET['mm'];
    }
    ?>
    <h1 class="tieudeform">Thêm Chi tiết phiếu nhập</h1>

    <form name="frmMon" action="xli_themchitietphieunhap.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
                <label>Số phiếu nhập</label>
                <input class = "form-control" type = "text" name="txtsophieunhap" readonly value = "<?php echo $sophieunhap;?>">
                
        </div>
        
            <div class="form-group">
                <label>Tên sản phẩm</label>
                
                <select class="form-select" name="txtsanpham" required>
                    <?php
                   
                    $query = "SELECT * FROM sanpham";
                    $result = $conn->query($query);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['masanpham'] . "'>" . $row['tensanpham'] . "</option>";
                    }
                ?>
                </select>
            </div>
            <div class="form-group">
                <label>Số lượng nhập</label>
                <input class="form-control" type="number" name="txtsoluongnhap" /> <br>
            </div>
            <!-- <div class="form-group">
            <label>Đơn vị tính</label>
            <input class="form-control"  type="text" name="txtdonvitinh" /> <br>
        </div>-->










        <input class="btn btn-success" type="submit" name="Themchitietphieunhap" value="Lưu " />


    <a class='btn btn-success' href='phieunhaphang.php'>Quay lại</a>
    <br><br>
    <h3 >Chi tiết phiếu nhập hàng số <span style="red"><?php echo $sophieunhap;?></span></h3>
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th style="text-align:center"colspan="2">Xử lý</th>

            </tr>
        </thead>
        <?php
        
            $sql = "SELECT ct.id, ct.masanpham,ct.soluongnhap,  sp.tensanpham
            FROM chitietphieunhap ct, sanpham sp


            WHERE ct.masanpham = sp.masanpham 
            AND ct.sophieunhap = '$sophieunhap' 

            ORDER BY sophieunhap";
            $id = "";
            $kq = $conn->query($sql) or die("Không thể xem chi tiết phiếu nhập hàng");
            while ($row = mysqli_fetch_array($kq)) {
                $id = $row["id"];
                echo ("<tr>");
                echo ("<td>" . $row["id"] . "</td>");
                echo ("<td>" . $row["tensanpham"] . "</td>");
                echo ("<td>" . $row["soluongnhap"] . "</td>");
                echo ("<td><a class='btn btn-primary' href='suachitietphieunhap.php?id=$id'>Sửa</a></td>");

                echo ("<td>");
                ?>
                <a onclick = "return confirm('Bạn có thật sự muốn xoá không')" class="btn btn-danger" href="xoachitietphieunhap.php?id=<?php echo $id;?>&spn=<?php echo $sophieunhap;?>">Xóa</a>
                <?php
                echo ("</td>");


                echo ("</tr>");
            }
         
        ?>
    </table>
   
    <?php
    include("footer.php");
    ?>
  
