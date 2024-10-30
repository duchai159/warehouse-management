<?php
include("ketnoi.php");

if (isset($_POST["Themsp"])) {
    $ma = $_POST["txtMasanpham"];
    $ten = $_POST["txtTensanpham"];
    $dvt = $_POST["txtdonvitinh"];
    $mau = $_POST["txtMau"];
    $loaisanpham = $_POST["txtLoaisanpham"];
    $thuonghieu = $_POST["txtmathuonghieu"];
    $size = $_POST["txtSize"];
    $gia = $_POST["txtGia"];

    $hinhanh_path = '';
    if (isset($_FILES["txtHinhAnh"]) && $_FILES["txtHinhAnh"]["error"] == 0) {
        // Kiểm tra loại tệp
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        $file_type = $_FILES["txtHinhAnh"]["type"];
        
        if (in_array($file_type, $allowed_types)) {
            $hinhanh_path = 'uploads/' . basename($_FILES["txtHinhAnh"]["name"]);
            move_uploaded_file($_FILES["txtHinhAnh"]["tmp_name"], $hinhanh_path);
        } else {
            die("Tệp không hợp lệ. Vui lòng tải lên hình ảnh JPEG, PNG hoặc GIF.");
        }
    }

    $stmt = $conn->prepare("INSERT INTO sanpham (masanpham, tensanpham, donvitinh, mausac, loaisanpham, mathuonghieu, kichthuoc, hinhanh, dongia) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $ma, $ten, $dvt, $mau, $loaisanpham, $thuonghieu, $size, $hinhanh_path, $gia);

    if ($stmt->execute()) {
        echo("<script language='javascript'>alert('Thêm sản phẩm thành công'); window.location.assign('sanpham.php');</script>");
    } else {
        echo "Không thể thêm sản phẩm mới: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Lỗi";
}
?>
