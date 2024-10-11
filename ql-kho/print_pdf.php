<?php
include_once ("ketnoi.php"); // Include file kết nối

use Dompdf\Dompdf;

if (isset($_GET['sophieuxuat'])) {
    $sophieuxuat = $_GET['sophieuxuat'];

    // Truy vấn cơ sở dữ liệu để lấy thông tin của phiếu mượn (sử dụng prepared statement)
    $stmt = $conn->prepare("SELECT phieuxuathang.sophieuxuat, nhanvien.hoten AS tennhanvien, phieuxuathang.ngayxuathang, khohang.tenkho, khachhang.tenkhachhang, sanpham.tensanpham, chitietphieuxuat.soluongxuat, sanpham.hinhanh
                            FROM phieuxuathang
                            INNER JOIN nhanvien ON phieuxuathang.tendangnhap = nhanvien.tendangnhap
                            INNER JOIN khohang ON phieuxuathang.makho = khohang.makho
                            INNER JOIN khachhang ON phieuxuathang.makhachhang = khachhang.makhachhang
                            INNER JOIN chitietphieuxuat ON phieuxuathang.sophieuxuat = chitietphieuxuat.sophieuxuat
                            INNER JOIN sanpham ON chitietphieuxuat.masanpham = sanpham.masanpham
                            WHERE phieuxuathang.sophieuxuat = ?");
    $stmt->bind_param("s", $sophieuxuat);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Bắt đầu tạo nội dung HTML cho tài liệu PDF
   

        $html = "
        <html>
        <head>
            <style>
            @font-face { font-family: 'DejaVu Sans'; src: url('fonts/Arial.ttf') format('truetype'); }
                body {
                    font-family: 'DejaVu Sans', sans-serif; 
                }
        
                h1 {
                    text-align: center;
                }
        
                .info {
                    margin-bottom: 20px;
                }
        
                .info span {
                    font-weight: bold;
                }
                .map{
                    text-align: center;
                }
            </style>
        </head>
        <body>
            <h1>Thông tin phiếu mượn</h1>";

        // Thêm thông tin của phiếu mượn vào tài liệu PDF
        while ($row = $result->fetch_assoc()) {
            $html .= "
            <div class=' info row'>
                <p class='map'><span>Mã phiếu mượn:</span> " . $row["sophieuxuat"] . "</p>
                <p><span>Kho:</span> " . $row["tenkho"] . "</p>
                <p><span>Tên nhân viên:</span> " . $row["tennhanvien"] . "</p>
                <p><span>Ngày mượn:</span> " . $row["ngayxuathang"] . "</p>
                <p><span>Khách mượn:</span> " . $row["tenkhachhang"] . "</p>
                <p><span>Sản phẩm mượn:</span> " . $row["tensanpham"] . "</p>
                <p><span>Số lượng mượn:</span> " . $row["soluongxuat"] . "</p>
            </div>";
        }

        $html .= "
        </body>
        </html>";


        // Bao gồm thư viện Dompdf
        require_once 'vendor/autoload.php';

        // Tạo một đối tượng Dompdf
        $dompdf = new Dompdf();

        // Chỉ định font chữ cho tài liệu PDF
        $dompdf->set_option('isHtml5ParserEnabled', true);
        $dompdf->set_option('isPhpEnabled', true);
        $dompdf->set_option('defaultFont', 'Arial');

        // Load HTML vào tài liệu PDF
        $dompdf->loadHtml($html);

        // Render tài liệu PDF
        $dompdf->render();

        // Ghi tài liệu PDF ra đầu ra (ví dụ: hiển thị trong trình duyệt hoặc tải xuống)
        $dompdf->stream("phieu_muon.pdf");
    } else {
        echo "Không tìm thấy thông tin phiếu mượn";
    }

    // Đóng kết nối
    $stmt->close();
}
?>