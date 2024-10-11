<?php



include("ketnoi.php");

if(isset($_POST["Themnhacungcap"]))
{
    $ma = $_POST["txtmanhacungcap"];
    $ten = $_POST["txttennhacungcap"];
    $diachi = $_POST["txtdiachi"];
    $email = $_POST["txtemail"];
   



    $sql = "INSERT INTO nhacungcap ( manhacungcap, tennhacungcap, diachi, email)
            VALUES ('$ma','$ten', '$diachi', '$email')";

    $kq = $conn->query($sql) or die("Không thể thêm nhà cung cấp: " . $conn->error);

    echo("<script language='javascript'>alert('Thêm nhà cung cấp thành công');
    window.location.assign('nhacungcap.php');
    </script>");

    $conn->close();
} else {
    echo "Lỗi";
}
?>