<?php



include("ketnoi.php");

if(isset($_POST["Themchitietphieunhap"]))
{
    $spn = $_POST["txtsophieunhap"];
    $sln = $_POST["txtsoluongnhap"];
    $sp = $_POST["txtsanpham"];
    




    $sql = "INSERT INTO chitietphieunhap ( sophieunhap, soluongnhap, masanpham )
            VALUES ( '$spn','$sln', '$sp');";
    $sql.="UPDATE sanpham SET soluongton=(soluongton+$sln) WHERE masanpham='$sp'";

    $kq = $conn->multi_query($sql) or die("Không thể thêm : " . $conn->error);
    echo $sql;
    echo("<script language='javascript'>alert('Thêm  thành công');
    window.location.assign('chitietphieunhap.php?mm=$spn');
    </script>");

    $conn->close();
} else {
    echo "Lỗi";
}
?>