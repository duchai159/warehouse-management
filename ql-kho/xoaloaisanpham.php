<?php
include("ketnoi.php");

$ma = $_REQUEST["mm"];

$sql = "SELECT * FROM sanpham WHERE loaisanpham='" . $ma . "'";
$sql = "SELECT * FROM khohang WHERE loaisanpham='" . $ma . "'";

$result = $conn->query($sql);
if($result->num_rows>0){


    $sql1 = "DELETE FROM sanpham WHERE loaisanpham='" . $ma . "';";
    $sql1.= "DELETE FROM khohang WHERE loaisanpham='" . $ma . "';";

    $sql1.= "DELETE FROM loaisanpham WHERE maloaisanpham='" . $ma . "';";
}
else {
    $sql1 = "DELETE FROM loaisanpham WHERE maloaisanpham='" . $ma . "';";
}

echo $sql1;

$kq = $conn->multi_query($sql1) or die("Không thể xóa ");
echo ("<script language='javascript'>alert('Xóa thành công');window.location.assign('loaisanpham.php');</script>");
?>
