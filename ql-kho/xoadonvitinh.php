

<?php
include("ketnoi.php");
$ma=$_REQUEST["mm"];


$sql = "SELECT * FROM sanpham WHERE donvitinh='" . $ma . "'";

$result = $conn->query($sql);

if ($result->num_rows>0) 
{
    $sql1.= "delete from sanpham where donvitinh='".$ma."';";
    // $kq = $conn -> query($sql) or die("Không thể xóa ");

    $sql1.="delete from donvitinh where madonvitinh='".$ma."';";
    // $kq_1 = $conn -> query($sql_1) or die("Không thể xóa ");

}
else
{
    $sql1="delete from donvitinh where  madonvitinh='".$ma."'";
}
echo $sql1;
$kq = $conn -> multi_query($sql1) or die("Không thể xóa ");
echo ("<script language='javascript'>alert('Xóa thành công');window.location.assign('donvitinh.php');</script>");
?>