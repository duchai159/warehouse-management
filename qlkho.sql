-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 15, 2024 lúc 07:12 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlkho`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietphieunhap`
--

CREATE TABLE `chitietphieunhap` (
  `sophieunhap` int(11) DEFAULT NULL,
  `soluongnhap` int(11) DEFAULT NULL,
  `masanpham` int(11) DEFAULT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietphieuxuat`
--

CREATE TABLE `chitietphieuxuat` (
  `sophieuxuat` int(11) DEFAULT NULL,
  `soluongxuat` int(11) DEFAULT NULL,
  `masanpham` int(11) DEFAULT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietphieuxuat`
--

INSERT INTO `chitietphieuxuat` (`sophieuxuat`, `soluongxuat`, `masanpham`, `ID`) VALUES
(42, 5, 92, 47);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donvitinh`
--

CREATE TABLE `donvitinh` (
  `madonvitinh` int(255) NOT NULL,
  `tendonvitinh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `donvitinh`
--

INSERT INTO `donvitinh` (`madonvitinh`, `tendonvitinh`) VALUES
(39, 'Bộ'),
(40, 'Cái'),
(41, 'Hộp'),
(42, 'Lô'),
(43, 'Cái');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `makhachhang` int(11) NOT NULL,
  `tenkhachhang` varchar(255) DEFAULT NULL,
  `diachi` varchar(255) DEFAULT NULL,
  `dienthoai` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`makhachhang`, `tenkhachhang`, `diachi`, `dienthoai`) VALUES
(11, 'Phòng Hành Chính Nhân Sự CÔNG TY TNHH TM - DV NGUYÊN PHONG', ' 162 Ngô Quyền - P. 5 - Q. 10 - TP.HCM.', '0903020002'),
(12, 'Công ty NiNa', 'Lầu 3, Tòa nhà SaigonTel, Lô 46, CVPM Quang Trung, P. Tân Chánh Hiệp, Q. 12, TP HCM', '028.37154879'),
(13, 'VN CONCENTRIX SERVICES CO., LTD', 'Tầng 4, 6 và 7, QTSC Building 1, Lô 34, đường số 14, Công viên phần mềm Quang Trung, Phường Tân Chánh Hiệp, Quận 12, Thành phố Hồ Chí Minh, Việt Nam', '	028 7109 9755');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khohang`
--

CREATE TABLE `khohang` (
  `makho` int(11) NOT NULL,
  `tenkho` varchar(255) DEFAULT NULL,
  `loaisanpham` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khohang`
--

INSERT INTO `khohang` (`makho`, `tenkho`, `loaisanpham`) VALUES
(41, 'Kho_TONG', 61),
(42, 'Kho_q10', 62),
(43, 'Kho_q1', 63),
(47, 'Kho_q5', 69),
(48, 'Kho_q9', 64),
(49, 'Kho_q11', 68),
(50, 'Kho_q12', 65);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `maloaisanpham` int(11) NOT NULL,
  `tenloaisanpham` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisanpham`
--

INSERT INTO `loaisanpham` (`maloaisanpham`, `tenloaisanpham`) VALUES
(61, 'Màn hình'),
(62, 'Chuột'),
(63, 'Máy in'),
(64, 'Bàn phím'),
(65, 'CPU'),
(68, 'Máy in tem'),
(69, 'Máy SCAN');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `manhacungcap` int(11) NOT NULL,
  `tennhacungcap` varchar(255) DEFAULT NULL,
  `diachi` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhacungcap`
--

INSERT INTO `nhacungcap` (`manhacungcap`, `tennhacungcap`, `diachi`, `email`) VALUES
(21, 'Công ty TNHH Điện tử ABECO Việt Nam', 'Lô số 20, KCN Quang Minh, huyện Mê Linh, TP. Hà Nội, Việt Nam.', '(04) 3818 2223.'),
(22, 'Công ty Thiết bị Điện tử DAEWOO Việt Nam', 'Khu sản xuất Tân Định, phường Tân Định, thị xã Bến Cát, Bình Dương.', '(0274) 356 0101.'),
(23, 'Công ty TNHH Kỹ thuật Điện tử TH', ' 82 Đường số 13, phường Phước Bình, Quận 9, TPHCM.', ' (028) 3728 1992.'),
(24, 'Công ty TNHH GENESISTEK VINA', 'Villa 596 Lucasta Residence, đường Liên Phường, phường Phú Hữu, TP. Thủ Đức, TPHCM.', '(028) 2253 7027.'),
(25, 'Autotronics NguyenPhi JSC', ' 99B Hòa Hưng, Phường 12, Quận 10, TPHCM.', ' (028) 3978 8125.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `tendangnhap` varchar(255) NOT NULL,
  `matkhau` varchar(50) NOT NULL,
  `hoten` varchar(255) NOT NULL,
  `sodienthoai` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `quyen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`tendangnhap`, `matkhau`, `hoten`, `sodienthoai`, `email`, `quyen`) VALUES
('admin', 'abc123', 'Admin', '0326972624', 'admin@gmail.com', 1),
('dovanc', 'abc123', 'Đỗ Văn C', '0832126423', 'dovanc@gmail.com', 2),
('nguyenvana', 'abc123', 'Nguyễn Văn A', '0912969120', 'nguyenvana@gmail.com', 3),
('tranvanb', 'abc123', 'Trần Văn B', '0987123456', 'travanb@gmail.com', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieunhaphang`
--

CREATE TABLE `phieunhaphang` (
  `tendangnhap` varchar(255) DEFAULT NULL,
  `sophieunhap` int(11) NOT NULL,
  `ngaynhaphang` datetime DEFAULT NULL,
  `makho` int(11) DEFAULT NULL,
  `manhacungcap` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieuxuathang`
--

CREATE TABLE `phieuxuathang` (
  `tendangnhap` varchar(255) DEFAULT NULL,
  `sophieuxuat` int(11) NOT NULL,
  `ngayxuathang` datetime DEFAULT NULL,
  `makho` int(11) DEFAULT NULL,
  `makhachhang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phieuxuathang`
--

INSERT INTO `phieuxuathang` (`tendangnhap`, `sophieuxuat`, `ngayxuathang`, `makho`, `makhachhang`) VALUES
('tranvanb', 42, '2024-05-15 00:00:00', 41, 11);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyen`
--

CREATE TABLE `quyen` (
  `ma` int(11) NOT NULL,
  `ten` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `quyen`
--

INSERT INTO `quyen` (`ma`, `ten`) VALUES
(1, 'Quản trị'),
(2, 'Quản lý kho'),
(3, 'Nhân viên');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `masanpham` int(11) NOT NULL,
  `tensanpham` varchar(255) DEFAULT NULL,
  `mausac` varchar(255) DEFAULT NULL,
  `loaisanpham` int(11) DEFAULT NULL,
  `mathuonghieu` int(11) DEFAULT NULL,
  `kichthuoc` varchar(255) DEFAULT NULL,
  `hinhanh` varchar(255) DEFAULT NULL,
  `dongia` varchar(255) DEFAULT NULL,
  `donvitinh` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`masanpham`, `tensanpham`, `mausac`, `loaisanpham`, `mathuonghieu`, `kichthuoc`, `hinhanh`, `dongia`, `donvitinh`) VALUES
(92, 'Bàn phím máy tính mini', 'xám', 64, 35, '', 'uploads/3e9311e5cc5abbfa2b1d07bb16ec69e3.jpg', '10', 40),
(93, 'Màn hình LCD 22/24 Inch Dell P2314Ht chuyên đồ họa', 'Trắng', 61, 37, '', 'uploads/87813cf69f60a8ca24a81bc97ba24a8a.jpg', '10', 40),
(94, 'Chuột Không Dây Để Bàn Không Gây Tiếng Ồn Cho Notebook / Văn Phòng', 'xám', 62, 35, '', 'uploads/cn-11134301-7qukw-lk5g891yyba535.jpg', '10', 40);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuonghieu`
--

CREATE TABLE `thuonghieu` (
  `mathuonghieu` int(11) NOT NULL,
  `tenthuonghieu` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thuonghieu`
--

INSERT INTO `thuonghieu` (`mathuonghieu`, `tenthuonghieu`) VALUES
(28, 'SAMSUNG'),
(29, 'ASUS'),
(35, 'ACER'),
(36, 'HP'),
(37, 'DELL');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietphieunhap`
--
ALTER TABLE `chitietphieunhap`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `masanpham` (`masanpham`),
  ADD KEY `fk_sophieunhap` (`sophieunhap`);

--
-- Chỉ mục cho bảng `chitietphieuxuat`
--
ALTER TABLE `chitietphieuxuat`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `masanpham` (`masanpham`),
  ADD KEY `sophieuxuat` (`sophieuxuat`);

--
-- Chỉ mục cho bảng `donvitinh`
--
ALTER TABLE `donvitinh`
  ADD PRIMARY KEY (`madonvitinh`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`makhachhang`);

--
-- Chỉ mục cho bảng `khohang`
--
ALTER TABLE `khohang`
  ADD PRIMARY KEY (`makho`),
  ADD KEY `loaisanpham` (`loaisanpham`);

--
-- Chỉ mục cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`maloaisanpham`);

--
-- Chỉ mục cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`manhacungcap`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`tendangnhap`),
  ADD KEY `quyen` (`quyen`);

--
-- Chỉ mục cho bảng `phieunhaphang`
--
ALTER TABLE `phieunhaphang`
  ADD PRIMARY KEY (`sophieunhap`),
  ADD KEY `tendangnhap` (`tendangnhap`),
  ADD KEY `makho` (`makho`),
  ADD KEY `fk_manhacungcap` (`manhacungcap`);

--
-- Chỉ mục cho bảng `phieuxuathang`
--
ALTER TABLE `phieuxuathang`
  ADD PRIMARY KEY (`sophieuxuat`),
  ADD KEY `tendangnhap` (`tendangnhap`),
  ADD KEY `makho` (`makho`),
  ADD KEY `makhachhang` (`makhachhang`);

--
-- Chỉ mục cho bảng `quyen`
--
ALTER TABLE `quyen`
  ADD PRIMARY KEY (`ma`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`masanpham`),
  ADD KEY `mathuonghieu` (`mathuonghieu`),
  ADD KEY `donvitinh` (`donvitinh`),
  ADD KEY `fk_loaisanpham` (`loaisanpham`);

--
-- Chỉ mục cho bảng `thuonghieu`
--
ALTER TABLE `thuonghieu`
  ADD PRIMARY KEY (`mathuonghieu`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitietphieunhap`
--
ALTER TABLE `chitietphieunhap`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT cho bảng `chitietphieuxuat`
--
ALTER TABLE `chitietphieuxuat`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT cho bảng `donvitinh`
--
ALTER TABLE `donvitinh`
  MODIFY `madonvitinh` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `makhachhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `khohang`
--
ALTER TABLE `khohang`
  MODIFY `makho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `maloaisanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `manhacungcap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `phieunhaphang`
--
ALTER TABLE `phieunhaphang`
  MODIFY `sophieunhap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT cho bảng `phieuxuathang`
--
ALTER TABLE `phieuxuathang`
  MODIFY `sophieuxuat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `quyen`
--
ALTER TABLE `quyen`
  MODIFY `ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `masanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT cho bảng `thuonghieu`
--
ALTER TABLE `thuonghieu`
  MODIFY `mathuonghieu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietphieunhap`
--
ALTER TABLE `chitietphieunhap`
  ADD CONSTRAINT `chitietphieunhap_ibfk_1` FOREIGN KEY (`masanpham`) REFERENCES `sanpham` (`masanpham`),
  ADD CONSTRAINT `chitietphieunhap_ibfk_2` FOREIGN KEY (`sophieunhap`) REFERENCES `phieunhaphang` (`sophieunhap`),
  ADD CONSTRAINT `fk_sophieunhap` FOREIGN KEY (`sophieunhap`) REFERENCES `phieunhaphang` (`sophieunhap`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `chitietphieuxuat`
--
ALTER TABLE `chitietphieuxuat`
  ADD CONSTRAINT `chitietphieuxuat_ibfk_1` FOREIGN KEY (`masanpham`) REFERENCES `sanpham` (`masanpham`),
  ADD CONSTRAINT `chitietphieuxuat_ibfk_2` FOREIGN KEY (`sophieuxuat`) REFERENCES `phieuxuathang` (`sophieuxuat`);

--
-- Các ràng buộc cho bảng `khohang`
--
ALTER TABLE `khohang`
  ADD CONSTRAINT `khohang_ibfk_1` FOREIGN KEY (`loaisanpham`) REFERENCES `loaisanpham` (`maloaisanpham`);

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_ibfk_1` FOREIGN KEY (`quyen`) REFERENCES `quyen` (`ma`);

--
-- Các ràng buộc cho bảng `phieunhaphang`
--
ALTER TABLE `phieunhaphang`
  ADD CONSTRAINT `fk_manhacungcap` FOREIGN KEY (`manhacungcap`) REFERENCES `nhacungcap` (`manhacungcap`) ON DELETE CASCADE,
  ADD CONSTRAINT `phieunhaphang_ibfk_1` FOREIGN KEY (`tendangnhap`) REFERENCES `nhanvien` (`tendangnhap`),
  ADD CONSTRAINT `phieunhaphang_ibfk_2` FOREIGN KEY (`makho`) REFERENCES `khohang` (`makho`),
  ADD CONSTRAINT `phieunhaphang_ibfk_3` FOREIGN KEY (`manhacungcap`) REFERENCES `nhacungcap` (`manhacungcap`);

--
-- Các ràng buộc cho bảng `phieuxuathang`
--
ALTER TABLE `phieuxuathang`
  ADD CONSTRAINT `phieuxuathang_ibfk_1` FOREIGN KEY (`tendangnhap`) REFERENCES `nhanvien` (`tendangnhap`),
  ADD CONSTRAINT `phieuxuathang_ibfk_2` FOREIGN KEY (`makho`) REFERENCES `khohang` (`makho`),
  ADD CONSTRAINT `phieuxuathang_ibfk_3` FOREIGN KEY (`makhachhang`) REFERENCES `khachhang` (`makhachhang`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `fk_loaisanpham` FOREIGN KEY (`loaisanpham`) REFERENCES `loaisanpham` (`maloaisanpham`) ON DELETE CASCADE,
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`mathuonghieu`) REFERENCES `thuonghieu` (`mathuonghieu`),
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`loaisanpham`) REFERENCES `loaisanpham` (`maloaisanpham`),
  ADD CONSTRAINT `sanpham_ibfk_3` FOREIGN KEY (`donvitinh`) REFERENCES `donvitinh` (`madonvitinh`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
