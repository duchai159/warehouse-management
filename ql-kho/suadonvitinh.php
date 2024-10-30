<?php
    include_once("header.php");
?>
<body>

<?php
include("ketnoi.php");

$ma = $_REQUEST["mm"];

$sql = "SELECT * FROM donvitinh WHERE madonvitinh = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $ma);
$stmt->execute();
$kq = $stmt->get_result();

if ($kq->num_rows > 0) {
    while ($row = $kq->fetch_assoc()) {
        echo ("<form name='frmSuakhachhang' action='xli_suadonvitinh.php' method='post' enctype='multipart/form-data'>");
        echo ("<h1 class='tieudeform'>Sửa thông tin đơn vị tính</h1>");

        echo ("<div class='form-group'><label>Mã đơn vị tính:</label> <input type='text' style='width:50%;' class='form-control' name='txtMadonvitinh' value='" . htmlspecialchars($row["madonvitinh"]) . "' readonly></div>");
        echo ("<div class='form-group'><label>Tên đơn vị tính:</label> <input type='text' style='width:50%;' class='form-control' name='txtTendonvitinh' value='" . htmlspecialchars($row["tendonvitinh"]) . "' ></div><br>");

        echo ("<input type='submit' class='btn btn-primary' name='sbmsuadvt' value='Sửa'>");
        echo ("</form>");
    }
} else {
    echo "Không tìm thấy đơn vị tính.";
}

$stmt->close();
$conn->close();
?>

<?php
    include("footer.php");
?>
</body>
</html>

