<?php
include("ketnoi.php");

// Lấy mã đơn vị tính từ yêu cầu
$ma = $_REQUEST["mm"];

// Kiểm tra nếu mã không rỗng
if (empty($ma)) {
    echo "Mã đơn vị tính không hợp lệ.";
    exit;
}

// Bắt đầu transaction để đảm bảo tính toàn vẹn dữ liệu
$conn->begin_transaction();

try {
    // Kiểm tra xem có sản phẩm nào sử dụng đơn vị tính này không
    $sql = "SELECT * FROM sanpham WHERE donvitinh = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $ma);
    $stmt->execute();
    $result = $stmt->get_result();

    // Nếu có sản phẩm sử dụng đơn vị tính này, xóa sản phẩm trước
    if ($result->num_rows > 0) {
        // Xóa các sản phẩm có đơn vị tính này
        $sql1 = "DELETE FROM sanpham WHERE donvitinh = ?";
        $stmt1 = $conn->prepare($sql1);
        $stmt1->bind_param("s", $ma);
        $stmt1->execute();
    }

    // Xóa đơn vị tính
    $sql2 = "DELETE FROM donvitinh WHERE madonvitinh = ?";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->bind_param("s", $ma);
    $stmt2->execute();

    // Commit transaction
    $conn->commit();
    
    echo "<script language='javascript'>alert('Xóa thành công'); window.location.assign('donvitinh.php');</script>";
} catch (Exception $e) {
    // Rollback transaction nếu có lỗi xảy ra
    $conn->rollback();
    echo "Lỗi: " . htmlspecialchars($e->getMessage());
} finally {
    // Đóng các prepared statement
    if (isset($stmt)) $stmt->close();
    if (isset($stmt1)) $stmt1->close();
    if (isset($stmt2)) $stmt2->close();
    
    // Đóng kết nối
    $conn->close();
}
?>
