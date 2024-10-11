<?php
    //Kết nối cơ sở dữ liệu
    include("ketnoi.php");

    //Lấy id của chi tiết phiếu nhập được gửi khi nhấn vào nút xoá
    $id = $_REQUEST["id"];
    $sophieuxuat = $_REQUEST["spx"];

    //Viết câu truy vấn DELETE FROM chitietphieunhap WHERE id = ''
    $sql = "DELETE FROM chitietphieuxuat WHERE id='$id'";
    //Thực thi câu truy vấn
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header("Location:chitietphieuxuat.php?mm=$sophieuxuat");
      } else {
        echo "Error deleting record: " . $conn->error;
      }

    //Đóng kết nối
    $conn->close();

?>