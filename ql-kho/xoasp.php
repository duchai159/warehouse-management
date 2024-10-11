<?php
include("ketnoi.php");

$ma = $_REQUEST["mm"];

// Xóa chi tiết phiếu nhập và phiếu xuất trước (nếu có)
$sql1 = "DELETE FROM chitietphieunhap WHERE masanpham='" . $ma . "'";
$sql2 = "DELETE FROM chitietphieuxuat WHERE masanpham='" . $ma . "'";

$result1 = $conn->query($sql1);
$result2 = $conn->query($sql2);

// Xóa sản phẩm
$sql3 = "DELETE FROM sanpham WHERE masanpham='" . $ma . "'";
$result3 = $conn->query($sql3);

// Kiểm tra kết quả và thông báo lỗi chi tiết nếu có
if ($result1 && $result2 && $result3) {
    echo ("<script language='javascript'>alert('Xóa thành công');window.location.assign('sanpham.php');</script>");
} else {
    echo "Không thể xóa: " . $conn->error;
}
?>
