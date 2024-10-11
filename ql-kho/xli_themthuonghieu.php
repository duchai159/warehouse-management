<?php



include("ketnoi.php");

if(isset($_POST["Themth"]))
{
     $ma = $_POST["txtMaThuongHieu"];
    $ten = $_POST["txtTenthuonghieu"];
  




    $sql = "INSERT INTO thuonghieu ( MaThuongHieu, TenThuongHieu)
            VALUES ('$ma','$ten')";

    $kq = $conn->query($sql) or die("Không thể thêm thương hiệu: " . $conn->error);

    echo("<script language='javascript'>alert('Thêm thành công');
    window.location.assign('thuonghieu.php');
    </script>");

    $conn->close();
} else {
    echo "Lỗi";
}
?>