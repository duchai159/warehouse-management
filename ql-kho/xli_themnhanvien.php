<?php



include("ketnoi.php");

if(isset($_POST["Themnhanvien"]))
{
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        echo $_POST['csrf_token'];

        echo $_SESSION['csrf_token'];
        echo $
        die("Yêu cầu không hợp lệ (CSRF token không hợp lệ).");
    }
    $ten = $_POST["txttennhanvien"];
    $matkhau = $_POST["txtmatkhau"];
    $hoten = $_POST["txthoten"];
    $sodienthoai = $_POST["txtsodienthoai"];
    $email = $_POST["txtemail"];
    $q = $_POST["txtquyen"];

    
    if (!preg_match('/[a-z]/', $matkhau)) {
        die("Mật khẩu phải chứa ít nhất một chữ cái thường.");
    } elseif (!preg_match('/[A-Z]/', $matkhau)) {
        die("Mật khẩu phải chứa ít nhất một chữ cái hoa.");
    } elseif (!preg_match('/[0-9]/', $matkhau)) {
        die("Mật khẩu phải chứa ít nhất một chữ số.");
    } elseif (!preg_match('/[@$!%*?&]/', $matkhau)) {
        die("Mật khẩu phải chứa ít nhất một ký tự đặc biệt (@, $, !, %, *, ?, &).");
    } elseif (strlen($matkhau) < 8) {
        die("Mật khẩu phải dài ít nhất 8 ký tự.");
    }

    
    $hashed_password = password_hash($matkhau, PASSWORD_DEFAULT);
    


    $sql = "INSERT INTO nhanvien ( tendangnhap, matkhau, hoten, sodienthoai, email,quyen)
            VALUES ('$ten', '$hashed_password','$hoten', '$sodienthoai', '$email','$q')";

    $kq = $conn->query($sql) or die("Không thể thêm nhân viên mới: " . $conn->error);

    echo("<script language='javascript'>alert('Thêm nhân viên thành công');
    window.location.assign('nhanvien.php');
    </script>");

    $conn->close();
} else {
    echo "Lỗi";
}
?>