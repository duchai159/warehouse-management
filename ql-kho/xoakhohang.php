<?php
include("ketnoi.php");
$ma = $_REQUEST["mm"];

$sql = "SELECT * FROM phieunhaphang WHERE makho='".$ma."'";
$sql = "SELECT * FROM phieuxuathang WHERE makho='".$ma."'";

$result = $conn->query($sql);
if($result->num_rows>0){
    $sql1 = "DELETE FROM phieunhaphang WHERE makho='".$ma."';";
    $sql1 .= "DELETE FROM phieuxuathang WHERE makho='".$ma."';";
    $sql1 .= "DELETE FROM khohang WHERE makho='".$ma."';";
}
else {
    $sql1 = "DELETE FROM khohang WHERE makho='".$ma."';";
}

echo $sql1;

$kq = $conn->multi_query($sql1) or die("Không thể xóa ");
echo ("<script language='javascript'>alert('Xóa thành công');window.location.assign('khohang.php');</script>");
?>
