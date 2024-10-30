<?php
session_start();
require_once("ketnoi.php"); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nhanvien_name = $_POST['txtTenDangNhap'];
    $nhanvien_pass = $_POST['txtMatKhau'];
    
    // Chuẩn bị câu lệnh để lấy thông tin nhân viên
    $stmt = $conn->prepare("SELECT * FROM nhanvien WHERE tendangnhap = ?");
    $stmt->bind_param("s", $nhanvien_name);
    
    // Thực thi câu lệnh
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Kiểm tra kết quả
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Xác minh mật khẩu bằng password_verify
        if (password_verify($nhanvien_pass, $row['matkhau'])) {
            // Đăng nhập thành công
            $_SESSION["name"] = $row["hoten"];
            $_SESSION["role"] = $row["quyen"];
            header("Location: index.php"); 
            exit();
        } else {
            // Sai mật khẩu
            echo '<p style="color: red;">Tên đăng nhập hoặc mật khẩu không đúng!</p>';
            header("Location: login.php");
        }
    } else {
        // Không tìm thấy tên đăng nhập
        echo '<p style="color: red;">Tên đăng nhập hoặc mật khẩu không đúng!</p>';
        header("Location: login.php");
    }
}
?>
