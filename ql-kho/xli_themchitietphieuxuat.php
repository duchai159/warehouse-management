<?php



include("ketnoi.php");

if(isset($_POST["Themchitietphieuxuat"]))
{
    $spx = $_POST["txtsophieuxuat"];
    $slx = $_POST["txtsoluongxuat"];
    $sp = $_POST["txtsanpham"];
  
    




    $sql = "INSERT INTO chitietphieuxuat ( sophieuxuat, soluongxuat, masanpham)
            VALUES ( '$spx','$slx', '$sp')";

    $kq = $conn->query($sql) or die("Không thể thêm : " . $conn->error);

    echo("<script language='javascript'>alert('Thêm  thành công');
    window.location.assign('chitietphieuxuat.php?mm=$spx');
    </script>");

    $conn->close();
} else {
    echo "Lỗi";
}
?>