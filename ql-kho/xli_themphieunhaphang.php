<?php



include("ketnoi.php");

if(isset($_POST["Themphieunhap"]))
{
    $ten = $_POST["txttennhanvien"];
    $sophieunhap = $_POST["txtsophieunhap"];
    $ngaynhaphang = $_POST["txtngaynhaphang"];
    $makho = $_POST["txtmakho"];
    $manhacungcap = $_POST["txtmanhacungcap"];
    




    $sql = "INSERT INTO phieunhaphang ( tendangnhap, sophieunhap, ngaynhaphang, makho, manhacungcap)
            VALUES ('$ten', '$sophieunhap','$ngaynhaphang', '$makho', '$manhacungcap')";

    $kq = $conn->query($sql) or die("Không thể thêm phiếu nhập hàng: " . $conn->error);

    echo("<script language='javascript'>alert('Thêm phiếu nhập hàng thành công');
    window.location.assign('phieunhaphang.php');
    </script>");

    $conn->close();
} else {
    echo "Lỗi";
}
?>