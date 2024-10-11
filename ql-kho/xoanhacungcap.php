
<?php
//
/* include("ketnoi.php");
$ma=$_REQUEST["mm"];

$sql = "SELECT * FROM phieunhaphang WHERE manhacungcap='".$ma."'";

$result = $conn->query($sql);
if($result->num_rows>0)
{
    $sql1 = "delete from phieunhaphang where manhacungcap='".$ma."';";
    // $kq = $conn -> query($sql) or die("Không thể xóa ");

    $sql1.="delete from nhacungcap where manhacungcap='".$ma."';";
    // $kq_1 = $conn -> query($sql_1) or die("Không thể xóa ");

}
else
{
    $sql1="delete from nhacungcap where manhacungcap='".$ma."'";
}
echo $sql1;
$kq = $conn -> multi_query($sql1) or die("Không thể xóa ");
echo ("<script language='javascript'>alert('Xóa thành công');window.location.assign('nhacungcap.php');</script>");*/
//



include("ketnoi.php");

$ma = $_REQUEST["mm"];

// Kiểm tra xem có phiếu nhập hàng liên quan đến nhà cung cấp hay không
$sql_check = "SELECT * FROM phieunhaphang WHERE manhacungcap='" . $ma . "'";
$result_check = $conn->query($sql_check);

if ($result_check->num_rows > 0) {
    // Nếu có phiếu nhập hàng, xóa tất cả các chi tiết của các phiếu nhập hàng đó
    $sql_delete_chitiet = "DELETE FROM chitietphieunhap WHERE sophieunhap IN (SELECT sophieunhap FROM phieunhaphang WHERE manhacungcap='" . $ma . "')";
    $result_delete_chitiet = $conn->query($sql_delete_chitiet);
    
    // Kiểm tra kết quả và thông báo lỗi chi tiết nếu có
    if (!$result_delete_chitiet) {
        die("Không thể xóa chi tiết phiếu nhập hàng: " . $conn->error);
    }
}

// Xóa tất cả phiếu nhập hàng của nhà cung cấp
$sql_delete_phieunhaphang = "DELETE FROM phieunhaphang WHERE manhacungcap='" . $ma . "'";
$result_delete_phieunhaphang = $conn->query($sql_delete_phieunhaphang);

// Kiểm tra kết quả và thông báo lỗi chi tiết nếu có
if (!$result_delete_phieunhaphang) {
    die("Không thể xóa phiếu nhập hàng: " . $conn->error);
}

// Xóa nhà cung cấp
$sql_delete_nhacungcap = "DELETE FROM nhacungcap WHERE manhacungcap='" . $ma . "'";
$result_delete_nhacungcap = $conn->query($sql_delete_nhacungcap);

// Kiểm tra kết quả và thông báo lỗi chi tiết nếu có
if ($result_delete_nhacungcap) {
    echo ("<script language='javascript'>alert('Xóa thành công');window.location.assign('nhacungcap.php');</script>");
} else {
    die("Không thể xóa nhà cung cấp: " . $conn->error);
}

?> 