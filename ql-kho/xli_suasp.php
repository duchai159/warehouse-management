<?php
include("ketnoi.php");

// Lấy dữ liệu từ form
$ma = $_POST["txtMasanpham"];
$ten = $_POST["txtTensanpham"];
$mau = $_POST["txtMau"];
$loaisanpham = $_POST["txtLoaisanpham"];
$thuonghieu = $_POST["txtThuongHieu"];
$size = $_POST["txtSize"];
$gia = $_POST["txtGia"];
$dvt = $_POST["txtdonvitinh"];

$hinhanh_path = ''; // Đường dẫn cho hình ảnh
$sql = "UPDATE sanpham SET tensanpham = ?, mausac = ?, loaisanpham = ?, mathuonghieu = ?, kichthuoc = ?, dongia = ?, donvitinh = ?";

// Kiểm tra xem có hình ảnh mới không
if (isset($_FILES["txtHinhAnh"]) && $_FILES["txtHinhAnh"]["error"] == 0) {
    $hinhanh_path = 'uploads/' . basename($_FILES["txtHinhAnh"]["name"]);
    
    // Di chuyển file tải lên
    if (move_uploaded_file($_FILES["txtHinhAnh"]["tmp_name"], $hinhanh_path)) {
        $sql .= ", hinhanh = ?";
        $params = [$ten, $mau, $loaisanpham, $thuonghieu, $size, $gia, $dvt, $hinhanh_path];
    } else {
        die("<script>alert('Lỗi khi tải lên hình ảnh.'); window.history.back();</script>");
    }
} else {
    $params = [$ten, $mau, $loaisanpham, $thuonghieu, $size, $gia, $dvt];
}

// Thêm điều kiện WHERE vào câu lệnh SQL
$sql .= " WHERE masanpham = ?";
$params[] = $ma;

// Sử dụng Prepared Statements
$stmt = $conn->prepare($sql);
if ($stmt === false) {
    die("Lỗi chuẩn bị câu lệnh: " . htmlspecialchars($conn->error));
}

// Gán tham số cho prepared statement
$stmt->bind_param(str_repeat('s', count($params)), ...$params);

// Thực thi câu lệnh
if ($stmt->execute()) {
    echo "<script>alert('Sửa thành công'); window.location.assign('sanpham.php');</script>";
} else {
    echo "Lỗi: " . htmlspecialchars($stmt->error);
}

// Đóng prepared statement và kết nối
$stmt->close();
$conn->close();
?>
