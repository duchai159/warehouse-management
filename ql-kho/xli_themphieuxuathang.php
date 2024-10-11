<?php



include("ketnoi.php");

if(isset($_POST["Themphieuxuat"]))
{
    $ten = $_POST["txttennhanvien"];
   // $sophieuxuat = $_POST["txtsophieuxuat"];
    $ngayxuathang = $_POST["txtngayxuathang"];
    $makho = $_POST["txtmakho"];
    $makhachhang = $_POST["txtmakhachhang"];
    




    $sql = "INSERT INTO phieuxuathang ( tendangnhap, ngayxuathang, makho, makhachhang) 
            VALUES ('$ten', '$ngayxuathang', '$makho', '$makhachhang')";

    $kq = $conn->query($sql) or die("Không thể thêm : " . $conn->error);

   echo("<script language='javascript'>window.location.assign('phieuxuathang.php');</script>");

    $conn->close();
} else {
    echo "Lỗi";
}
?>