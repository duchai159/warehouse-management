<?php
include_once("header.php");
?>

<?php
$ma = $_REQUEST["mm"];
// Sử dụng Prepared Statements để tránh SQL Injection
$sql = "SELECT * FROM nhanvien WHERE tendangnhap = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $ma);
$stmt->execute();
$kq = $stmt->get_result();

if ($kq->num_rows > 0) {
    while ($row = mysqli_fetch_array($kq)) {
        echo ("<form name='frmSuanhanvien' action='xli_suanhanvien.php' method='post' enctype='multipart/form-data'>");
        echo ("<h1 class='tieudeform'>SỬA NHÂN VIÊN</h1>");
        
        // Tên đăng nhập (readonly)
        echo ("<div class='form-group'><label>Tên đăng nhập:</label> <input type='text' class='form-control' name='txttendangnhap' value='" . htmlspecialchars($row["tendangnhap"]) . "' readonly></div>");
        
        // Mật khẩu (có thể yêu cầu nhập lại mật khẩu mới)
        echo ("<div class='form-group'><label>Mật khẩu:</label> <input type='password' class='form-control' name='txtmatkhau' placeholder='Nhập mật khẩu mới'></div>");
        
        // Họ tên
        echo ("<div class='form-group'><label>Họ tên:</label> <input type='text' class='form-control' name='txthoten' value='" . htmlspecialchars($row["hoten"]) . "'></div>");
        
        // Số điện thoại
        echo ("<div class='form-group'><label>Số điện thoại:</label> <input type='text' class='form-control' name='txtsodienthoai' value='" . htmlspecialchars($row["sodienthoai"]) . "'></div>");
        
        // Email
        echo ("<div class='form-group'><label>Email:</label> <input type='text' class='form-control' name='txtemail' value='" . htmlspecialchars($row["email"]) . "'></div><br>");
        
        // Vai trò
        echo ("<div class='form-group'><label>Vai trò:</label>");
        echo ("<select name='txtquyen' class='form-select'>");
        
        $query = "SELECT * FROM quyen";
        $res = $conn->query($query);
        while ($r = mysqli_fetch_assoc($res)) {
            if ($r['ma'] == $row["quyen"]) {
                echo "<option selected value='" . htmlspecialchars($r['ma']) . "'>" . htmlspecialchars($r['ten']) . "</option>";
            } else {
                echo "<option value='" . htmlspecialchars($r['ma']) . "'>" . htmlspecialchars($r['ten']) . "</option>";
            }
        }
        echo ("</select>");
        echo ("</div><br>");
        
        // Nút gửi
        echo ("<input class='btn btn-primary' type='submit' name='sbmsuanhanvien' value='Sửa'>");
        echo ("</form>");
    }
} else {
    echo "<p>Không tìm thấy nhân viên với tên đăng nhập này.</p>";
}

// Đóng prepared statement
$stmt->close();
?>
  
<?php
include("footer.php");
?>
