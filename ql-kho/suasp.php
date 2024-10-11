<?php
include_once("header.php");
?>
<?php
$ma = $_REQUEST["mm"];
$sql = "SELECT * FROM sanpham sp, loaisanpham lsp WHERE sp.loaisanpham=lsp.maloaisanpham AND sp.masanpham='" . $ma . "'";
// echo $sql;
$kq = $conn->query($sql) or die("Không thể sửa sản phẩm");

while ($row = mysqli_fetch_array($kq)) {
    echo ("<form name='frmSuaSp' action='xli_suasp.php' method='post'enctype='multipart/form-data'>");
    echo ("<h1 class='tieudeform'>SỬA SẢN PHẨM </h1>");

    echo ("<div class = 'form-group' ><label>Mã sản phẩm:</label>  <input type='text' class='form-control' name='txtMasanpham' value='" . $row["masanpham"] . "' readonly></div>");
    echo ("<div class = 'form-group' ><label>Tên sản phẩm:</label> <input type='text' class='form-control' name='txtTensanpham' value='" . (isset($row["tensanpham"]) ? $row["tensanpham"] : '') . "'></div>");
    echo ("<div class = 'form-group' ><label>Đơn vị tính</label>");
    $dvt = $row["donvitinh"];
    echo ("<select name = 'txtdonvitinh' class = 'form-select'>");
    $query = "SELECT * FROM donvitinh";
    $res = $conn->query($query);
    while ($r = mysqli_fetch_assoc($res)) {
        if ($r['madonvitinh'] == $dvt)
            echo "<option selected value='" . $r['madonvitinh'] . "'>" . $r['tendonvitinh'] . "</option>";
        else
            echo "<option value='" . $r['madonvitinh'] . "'>" . $r['tendonvitinh'] . "</option>";
    }
    echo ("</select>");
    echo ("</div>");

    $color = array("Xanh" => "Xanh", "Đỏ" => "Đỏ", "Vàng" => "Vàng", "Trắng" => "Trắng", "Cam" => "Cam");

    echo "<div class='form-group'>
                <label>Chọn màu sắc:</label>
                <select name='txtMau' class='form-select'>
                ";
    foreach ($color as $x => $x_value) {
        if ($x == $row["mausac"])
            echo "<option selected value='" . $x . "'> " . $x_value . "</option>";
        else
            echo "<option value='" . $x . "'> " . $x_value . "</option>";
    }

    echo "</select></div>";
    echo ("<div class = 'form-group' ><label>Loại sản phẩm:</label>");
    //-----
    $loaisp = $row["loaisanpham"];
    echo ("<select name = 'txtLoaisanpham' class = 'form-select'>");
    $query = "SELECT * FROM loaisanpham";
    $res = $conn->query($query);
    while ($r = mysqli_fetch_assoc($res)) {
        if ($r['maloaisanpham'] == $loaisp)
            echo "<option selected value='" . $r['maloaisanpham'] . "'>" . $r['tenloaisanpham'] . "</option>";
        else
            echo "<option value='" . $r['maloaisanpham'] . "'>" . $r['tenloaisanpham'] . "</option>";
    }
    echo ("</select>");
    echo ("</div>");
    //.....
    echo ("<div class = 'form-group' ><label>Thương Hiệu:</label>");
    //-----
    $mathuonghieu = $row["mathuonghieu"];
    echo ("<select name = 'txtThuongHieu' class='form-select'>");
    $query = "SELECT * FROM thuonghieu";
    $res = $conn->query($query);
    while ($r = mysqli_fetch_assoc($res)) {
        if ($r['mathuonghieu'] == $mathuonghieu)
            echo "<option selected value='" . $r['mathuonghieu'] . "'>" . $r['tenthuonghieu'] . "</option>";
        else
            echo "<option value='" . $r['mathuonghieu'] . "'>" . $r['tenthuonghieu'] . "</option>";
    }
    echo ("</select>");
    echo ("</div>");
    //----

    $size = array("NULL" => "NULL", "S" => "S", "M" => "M", "L" => "L", "XL" => "XL", "XXL" => "XXL", "38" => "38", "39" => "39", "40" => "40", "41" => "41");

    echo "<div class='form-group'>
                <label>Size</label>
                <select name='txtSize' class='form-select'>
                ";
    foreach ($size as $x => $x_value) {
        if ($x == $row["kichthuoc"])
            echo "<option selected value='" . $x . "'> " . $x_value . "</option>";
        else
            echo "<option value='" . $x . "'> " . $x_value . "</option>";
    }

    echo "</select></div>";
    // Thêm trường input file để chọn hình ảnh mới

    echo ("<div class = 'form-group' ><label>Hình ảnh mới:</label> ");

    echo "<input value='" . $row['hinhanh'] . "' type='file' class='form-control' name='txtHinhAnh'>";
    echo "<input value='" . $row['hinhanh'] . "' type='hidden' class='form-control' name='txtFile'>";
    echo ("</div>");

    // Hiển thị hình ảnh hiện tại
    echo ("<label>Hình ảnh hiện tại:</label> <img class = 'img-fluid' style='width:110px;;height:110px' src='" . $row["hinhanh"] . "' alt=''><br>");

    echo ("<div class = 'form-group' ><label>Số lượng trong kho</label> <input type='text' class='form-control' name='txtGia' value='" . (isset($row["dongia"]) ? $row["dongia"] : '') . "'></div> <br>");

    echo ("<input class = 'btn btn-primary' type='submit' name='sbmsuasp' value='Sửa'>");
    echo ("</form>");
}

?>
  <?php
    include("footer.php");
    ?>