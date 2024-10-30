<?php
include_once("header.php");

$ma = $_REQUEST["mm"];
$stmt = $conn->prepare("SELECT * FROM sanpham sp, loaisanpham lsp WHERE sp.loaisanpham=lsp.maloaisanpham AND sp.masanpham=?");
$stmt->bind_param("s", $ma);
$stmt->execute();
$kq = $stmt->get_result();

while ($row = $kq->fetch_assoc()) {
    echo ("<form name='frmSuaSp' action='xli_suasp.php' method='post' enctype='multipart/form-data'>");
    echo ("<h1 class='tieudeform'>SỬA SẢN PHẨM </h1>");

    echo ("<div class='form-group'><label>Mã sản phẩm:</label> <input type='text' class='form-control' name='txtMasanpham' value='" . htmlspecialchars($row["masanpham"]) . "' readonly></div>");
    echo ("<div class='form-group'><label>Tên sản phẩm:</label> <input type='text' class='form-control' name='txtTensanpham' value='" . htmlspecialchars($row["tensanpham"]) . "'></div>");
    
    // Đơn vị tính
    echo ("<div class='form-group'><label>Đơn vị tính</label>");
    $dvt = $row["donvitinh"];
    echo ("<select name='txtdonvitinh' class='form-select'>");
    $query = "SELECT * FROM donvitinh";
    $res = $conn->query($query);
    while ($r = $res->fetch_assoc()) {
        $selected = $r['madonvitinh'] == $dvt ? "selected" : "";
        echo "<option value='" . htmlspecialchars($r['madonvitinh']) . "' $selected>" . htmlspecialchars($r['tendonvitinh']) . "</option>";
    }
    echo ("</select></div>");

    // Màu sắc
    $color = ["Xanh", "Đỏ", "Vàng", "Trắng", "Cam"];
    echo "<div class='form-group'><label>Chọn màu sắc:</label><select name='txtMau' class='form-select'>";
    foreach ($color as $x) {
        $selected = $x == $row["mausac"] ? "selected" : "";
        echo "<option value='" . htmlspecialchars($x) . "' $selected> $x</option>";
    }
    echo "</select></div>";

    // Loại sản phẩm
    echo ("<div class='form-group'><label>Loại sản phẩm:</label>");
    $loaisp = $row["loaisanpham"];
    echo ("<select name='txtLoaisanpham' class='form-select'>");
    $query = "SELECT * FROM loaisanpham";
    $res = $conn->query($query);
    while ($r = $res->fetch_assoc()) {
        $selected = $r['maloaisanpham'] == $loaisp ? "selected" : "";
        echo "<option value='" . htmlspecialchars($r['maloaisanpham']) . "' $selected>" . htmlspecialchars($r['tenloaisanpham']) . "</option>";
    }
    echo ("</select></div>");

    // Thương hiệu
    echo ("<div class='form-group'><label>Thương Hiệu:</label>");
    $mathuonghieu = $row["mathuonghieu"];
    echo ("<select name='txtThuongHieu' class='form-select'>");
    $query = "SELECT * FROM thuonghieu";
    $res = $conn->query($query);
    while ($r = $res->fetch_assoc()) {
        $selected = $r['mathuonghieu'] == $mathuonghieu ? "selected" : "";
        echo "<option value='" . htmlspecialchars($r['mathuonghieu']) . "' $selected>" . htmlspecialchars($r['tenthuonghieu']) . "</option>";
    }
    echo ("</select></div>");

    // Kích thước
    $size = ["NULL", "S", "M", "L", "XL", "XXL", "38", "39", "40", "41"];
    echo "<div class='form-group'><label>Size</label><select name='txtSize' class='form-select'>";
    foreach ($size as $x) {
        $selected = $x == $row["kichthuoc"] ? "selected" : "";
        echo "<option value='" . htmlspecialchars($x) . "' $selected> $x</option>";
    }
    echo "</select></div>";

    // Hình ảnh
    echo ("<div class='form-group'><label>Hình ảnh mới:</label>");
    echo "<input type='file' class='form-control' name='txtHinhAnh'>";
    echo "<input type='hidden' class='form-control' name='txtFile' value='" . htmlspecialchars($row['hinhanh']) . "'>";
    echo ("</div>");

    // Hiển thị hình ảnh hiện tại
    echo ("<label>Hình ảnh hiện tại:</label> <img class='img-fluid' style='width:110px;height:110px' src='" . htmlspecialchars($row["hinhanh"]) . "' alt=''><br>");

    echo ("<div class='form-group'><label>Số lượng trong kho</label> <input type='text' class='form-control' name='txtGia' value='" . htmlspecialchars($row["dongia"]) . "'></div><br>");

    echo ("<input class='btn btn-primary' type='submit' name='sbmsuasp' value='Sửa'>");
    echo ("</form>");
}

$stmt->close();
include("footer.php");
?>
