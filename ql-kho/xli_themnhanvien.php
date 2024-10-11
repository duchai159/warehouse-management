<?php



include("ketnoi.php");

if(isset($_POST["Themnhanvien"]))
{
    $ten = $_POST["txttennhanvien"];
    $matkhau = md5($_POST["txtmatkhau"]);
    $hoten = $_POST["txthoten"];
    $sodienthoai = $_POST["txtsodienthoai"];
    $email = $_POST["txtemail"];
    $q = $_POST["txtquyen"];
    


    $sql = "INSERT INTO nhanvien ( tendangnhap, matkhau, hoten, sodienthoai, email,quyen)
            VALUES ('$ten', '$matkhau','$hoten', '$sodienthoai', '$email','$q')";

    $kq = $conn->query($sql) or die("Không thể thêm nhân viên mới: " . $conn->error);

    echo("<script language='javascript'>alert('Thêm nhân viên thành công');
    window.location.assign('nhanvien.php');
    </script>");

    $conn->close();
} else {
    echo "Lỗi";
}
?>