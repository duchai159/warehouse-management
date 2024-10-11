<?php



include("ketnoi.php");

if(isset($_POST["Themkhohang"]))
{
    $ma = $_POST["txtmakhohang"];
    $ten = $_POST["txttenkho"];
    $loaisanpham = $_POST["txtloaisanpham"];
    



    $sql = "INSERT INTO khohang( makho, tenkho,  loaisanpham)
            VALUES ('$ma','$ten', '$loaisanpham')";

    $kq = $conn->query($sql) or die("Không thể thêm : " . $conn->error);

    echo("<script language='javascript'>alert('Thêm  thành công');
    window.location.assign('khohang.php');
    </script>");

    $conn->close();
} else {
    echo "Lỗi";
}
?>