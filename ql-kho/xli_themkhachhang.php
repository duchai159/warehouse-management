<?php



include("ketnoi.php");

if(isset($_POST["Themkhachhang"]))
{
    $ma = $_POST["txtMakhachhang"];
    $ten = $_POST["txtTenkhachhang"];
    $diachi = $_POST["txtDiachi"];
    $sodienthoai = $_POST["txtSodienthoai"];

  


    $sql = "INSERT INTO khachhang ( makhachhang,tenkhachhang, diachi, dienthoai)
            VALUES ('$ma','$ten', '$diachi' ,'$sodienthoai')";

    $kq = $conn->query($sql) or die("Không thể thêm khách hàng: " . $conn->error);

    echo("<script language='javascript'>alert('Thêm khách hàng thành công');
    window.location.assign('khachhang.php');
    </script>");

    $conn->close();
} else {
    echo "Lỗi";
}
?>