

<?php
include("ketnoi.php");
$ma=$_REQUEST["mm"];

$sql = "SELECT * FROM chitietphieuxuat WHERE sophieuxuat='".$ma."'";

$result = $conn->query($sql);
if($result->num_rows>0)
{
    $sql1 = "delete from chitietphieuxuat where sophieuxuat='".$ma."';";
    // $kq = $conn -> query($sql) or die("Không thể xóa ");

    $sql1.="delete from phieuxuathang where sophieuxuat='".$ma."';";
    // $kq_1 = $conn -> query($sql_1) or die("Không thể xóa ");

}
else
{
    $sql1.="delete from phieuxuathang where sophieuxuat='".$ma."';";
}
echo $sql1;
$kq = $conn -> multi_query($sql1) or die("Không thể xóa ");
echo ("<script language='javascript'>alert('Xóa thành công');window.location.assign('phieuxuathang.php');</script>");
?>