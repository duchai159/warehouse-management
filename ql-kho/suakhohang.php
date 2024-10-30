<?php
include_once("header.php");

$ma = $_REQUEST["mm"];

$stmt = $conn->prepare("SELECT * FROM khohang WHERE makho = ?");
$stmt->bind_param("s", $ma);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo ("<form name='frmSualoaisanpham' action='xli_suakhohang.php' method='post' enctype='multipart/form-data'>");
        echo ("<h1 class='tieudeform'>SỬA KHO HÀNG</h1>");

        echo ("<div class='form-group'><label>Mã kho hàng:</label> <input type='text' style='width:50%;' class='form-control' name='txtmakho' value='" . htmlspecialchars($row["makho"]) . "' readonly></div>");
        echo ("<div class='form-group'><label>Tên kho hàng:</label> <input type='text' style='width:50%;' class='form-control' name='txttenkho' value='" . htmlspecialchars($row["tenkho"]) . "'></div>");

        echo ("<div class='form-group'><label>Loại sản phẩm:</label>");
        $loaisp = $row["loaisanpham"];
        echo ("<select style='width:50%' name='txtloaisanpham' class='form-select'>");

        $query = "SELECT * FROM loaisanpham";
        $res = $conn->query($query);

        while ($r = mysqli_fetch_assoc($res)) {
            if ($r['maloaisanpham'] == $loaisp) {
                echo "<option selected value='" . htmlspecialchars($r['maloaisanpham']) . "'>" . htmlspecialchars($r['tenloaisanpham']) . "</option>";
            } else {
                echo "<option value='" . htmlspecialchars($r['maloaisanpham']) . "'>" . htmlspecialchars($r['tenloaisanpham']) . "</option>";
            }
        }
        echo ("</select><br>");
        echo ("</div>");

        echo ("<input type='submit' class='btn btn-primary' name='sbmsuakhohang' value='Sửa'>");
        echo ("</form>");
    }
} else {
    echo "<div class='alert alert-danger'>Không tìm thấy kho hàng nào với mã này.</div>";
}

$stmt->close();
include("footer.php");
?>
