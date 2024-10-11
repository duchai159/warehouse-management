<?php



include("ketnoi.php");

if(isset($_POST["Themloaisanpham"]))
{
     $ma = $_POST["txtmaloaisanpham"];
    $ten = $_POST["txttenloaisanpham"];
  




    $sql = "INSERT INTO loaisanpham ( maloaisanpham, tenloaisanpham)
            VALUES ('$ma','$ten')";

    $kq = $conn->query($sql) or die("Không thể thêm loại sản phẩm: " . $conn->error);

    echo("<script language='javascript'>alert('Thêm loại sản phẩm thành công');
    window.location.assign('loaisanpham.php');
    </script>");

    $conn->close();
} else {    
    echo "Lỗi";
}
?>