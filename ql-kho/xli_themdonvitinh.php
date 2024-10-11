<?php



include("ketnoi.php");

if(isset($_POST["Themdonvitinh"]))
{


    $mdvt = $_POST["txtMadonvitinh"];

    $tdvt = $_POST["txtTendonvitinh"];
   



    $sql = "INSERT INTO donvitinh ( madonvitinh, tendonvitinh )
            VALUES ( '$mdvt','$tdvt')";

    $kq = $conn->query($sql) or die("Không thể thêm : " . $conn->error);

    echo("<script language='javascript'>alert('Thêm  thành công');
    window.location.assign('donvitinh.php');
    </script>");

    $conn->close();
} else {
    echo "Lỗi";
}
?>