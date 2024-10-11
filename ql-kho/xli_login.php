<?php
session_start();
require_once("ketnoi.php"); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nhanvien_name = $_POST['txtTenDangNhap'];
    $nhanvien_pass = $_POST['txtMatKhau'];
    
    
    $query = "SELECT * FROM nhanvien WHERE tendangnhap = '$nhanvien_name' AND matkhau = '$nhanvien_pass'";
    $result = $conn->query($query); 
    
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_array($result);
        header("Location: index.php"); 
        $_SESSION["name"]=$row["hoten"];
        $_SESSION["role"]=$row["quyen"];
        exit();
    } else {
       
        echo '<p style="color: red;">Tên đăng nhập hoặc mật khẩu không đúng!</p>';
        header("Location:login.php");
    }
}
?>
