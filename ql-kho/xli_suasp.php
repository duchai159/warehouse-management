<?php
include("ketnoi.php");

$ma = $_POST["txtMasanpham"];
$ten = $_POST["txtTensanpham"];
$mau = $_POST["txtMau"];
$loaisanpham = $_POST["txtLoaisanpham"];
$thuonghieu = $_POST["txtThuongHieu"];
$size = $_POST["txtSize"];
$hinhanh = $_POST["txtFile"];
$gia = $_POST["txtGia"];
$dvt = $_POST["txtdonvitinh"];

$hinhanh_path = ''; // Giữ nguyên giá trị cũ nếu không có hình ảnh mới
$sql="";
if (isset($_FILES["txtHinhAnh"]) && $_FILES["txtHinhAnh"]["error"] == 0) {
    $hinhanh_path = 'uploads/' . $_FILES["txtHinhAnh"]["name"];
    move_uploaded_file($_FILES["txtHinhAnh"]["tmp_name"], $hinhanh_path);
    $sql = "UPDATE sanpham SET tensanpham = '$ten', mausac = '$mau',loaisanpham='$loaisanpham', mathuonghieu = '$thuonghieu', kichthuoc = '$size',hinhanh='$hinhanh_path',dongia='$gia', donvitinh='$dvt' WHERE masanpham = '$ma'";
}
else{
    $sql = "UPDATE sanpham SET tensanpham = '$ten', mausac = '$mau',loaisanpham='$loaisanpham', mathuonghieu = '$thuonghieu', kichthuoc = '$size',dongia='$gia', donvitinh='$dvt' WHERE masanpham = '$ma'";
}



if ($conn->query($sql) === TRUE) {
    echo("<script language='javascript'>alert('Sửa thành công'); window.location.assign('sanpham.php');</script>");
} else {
    echo "Lỗi: " . $conn->error;
}

$conn->close();
?>
