<?php
    //Kết nối cơ sở dữ liệu
    include("ketnoi.php");

    //Lấy id của chi tiết phiếu nhập được gửi khi nhấn vào nút xoá
    $id = $_REQUEST["id"];
    $sophieunhap = $_REQUEST["spn"];

    //Viết câu truy vấn DELETE FROM chitietphieunhap WHERE id = ''
    $sql = "DELETE FROM chitietphieunhap WHERE id='$id'";
    //Thực thi câu truy vấn
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header("Location:chitietphieunhap.php?mm=$sophieunhap");
      } else {
        echo "Error deleting record: " . $conn->error;
      }

    //Đóng kết nối
    $conn->close();

?>