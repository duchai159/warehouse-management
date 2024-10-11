<?php



include("ketnoi.php");

if(isset($_POST["Themsp"]))
{
    $ma = $_POST["txtMasanpham"];
    $ten = $_POST["txtTensanpham"];
    $dvt = $_POST["txtdonvitinh"];

    $mau = $_POST["txtMau"];
    $loaisanpham = $_POST["txtLoaisanpham"];
    $thuonghieu = $_POST["txtmathuonghieu"];
    $size = $_POST["txtSize"];
    $hinhanh = isset($_POST["txtHinhAnh"]) ; 
    $gia = $_POST["txtGia"];

    if (isset($_FILES["txtHinhAnh"]) && $_FILES["txtHinhAnh"]["error"] == 0) {
        $hinhanh_path = 'uploads/' . $_FILES["txtHinhAnh"]["name"];
        move_uploaded_file($_FILES["txtHinhAnh"]["tmp_name"], $hinhanh_path);
    }




    $sql = "INSERT INTO sanpham ( masanpham, tensanpham,donvitinh, mausac, loaisanpham, mathuonghieu, kichthuoc, hinhanh,dongia)
            VALUES ('$ma','$ten','$dvt', '$mau','$loaisanpham', '$thuonghieu', '$size','$hinhanh_path','$gia')";

    $kq = $conn->query($sql) or die("Không thể thêm sản phẩm mới: " . $conn->error);

    echo("<script language='javascript'>alert('Thêm sản phẩm thành công');
    window.location.assign('sanpham.php');
    </script>");

    $conn->close();
} else {
    echo "Lỗi";
}
?>