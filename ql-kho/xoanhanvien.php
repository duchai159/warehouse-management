<?php
include("ketnoi.php");
$ma=$_REQUEST["mm"];

$sql = "SELECT * FROM phieunhaphang WHERE tendangnhap='".$ma."'";

$result = $conn->query($sql);
if($result->num_rows>0)
{
    $sql1 = "delete from phieunhaphang where tendangnhap='".$ma."';";
    // $kq = $conn -> query($sql) or die("Không thể xóa ");

    $sql1.="delete from nhanvien where tendangnhap='".$ma."';";
    // $kq_1 = $conn -> query($sql_1) or die("Không thể xóa ");

}
else
{
    $sql1="delete from nhanvien where tendangnhap='".$ma."'";
}
echo $sql1;
$kq = $conn -> multi_query($sql1) or die("Không thể xóa ");
echo ("<script language='javascript'>alert('Xóa thành công');window.location.assign('nhanvien.php');</script>");
?>