-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 23, 2022 lúc 10:36 AM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `sporter`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `MaCTHD` int(11) NOT NULL,
  `MaHD` int(11) NOT NULL,
  `IDSP` int(11) NOT NULL,
  `Size` varchar(50) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `Gia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `MaHD` int(11) NOT NULL,
  `TongTien` int(11) NOT NULL,
  `Ten` varchar(50) NOT NULL,
  `DiaChi` varchar(100) NOT NULL,
  `SoDienThoai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `IDKhachhang` int(11) NOT NULL,
  `Ten` varchar(50) NOT NULL,
  `MatKhau` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `SDT` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`IDKhachhang`, `Ten`, `MatKhau`, `Email`, `SDT`) VALUES
(2, 'Triệu Văn Vinh', '123', 'trieuvanvinh2001@gmail.com', '0123456789'),
(3, 'Nguyễn Duy Thanh', '123', 'nguyenduythanh2001@gmail.com', '0385661625'),
(4, 'Ngô Tuấn Vũ', '123', 'ngotuanvu2001@gmail.com', '0335566778'),
(5, 'Nguyễn Thanh Toản', '123', 'nguyenthanhtoan2001@gmail.com', '0987555888'),
(6, 'Đào Tuấn Minh Vương', '123', 'daotuanminhvuong2001@gmail.com', '0588999000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `IDNV` int(11) NOT NULL,
  `TenDN` varchar(50) NOT NULL,
  `MatKhau` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `IDSP` int(11) NOT NULL,
  `TenSP` varchar(100) NOT NULL,
  `Gia` int(11) NOT NULL,
  `MoTa` varchar(500) NOT NULL,
  `Anh` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`IDSP`, `TenSP`, `Gia`, `MoTa`, `Anh`) VALUES
(11, 'Bộ quần áo Arsenal sân nhà 2021 – 2022 hàng chính hãng', 125000, '- Áo chất lượng cao', 'a1.jpg'),
(12, 'Bộ quần áo Arsenal sân khách 2021 – 2022 hàng chính hãng', 125000, '- Áo chất lượng cao', 'a2.jpg'),
(13, 'Bộ quần áo Chelsea sân nhà 2021 – 2022 hàng chính hãng', 150000, '- Áo chất lượng cao', 'a3.jpg'),
(14, 'Bộ quần áo Chelsea sân nhà 2021 – 2022 hàng chính hãng', 150000, '- Áo chất lượng cao', 'a4.jpg'),
(15, 'Bộ quần áo Liverpool sân nhà 2021 – 2022 hàng chính hãng', 160000, '- Áo chất lượng cao', 'a5.jpg'),
(16, 'Bộ quần áo Liverpool sân khách 2021 – 2022 hàng chính hãng', 160000, '- Áo chất lượng cao', 'a6.jpg'),
(17, 'Bộ quần áo Mancity sân nhà 2021 – 2022 hàng chính hãng', 180000, '- Áo chất lượng cao', 'a7.jpg'),
(18, 'Bộ quần áo Mancity sân khách 2021 – 2022 hàng chính hãng', 180000, '- Áo chất lượng cao', 'a8.jpg'),
(20, 'Bộ quần áo Manchester United sân nhà 2021 – 2022 hàng chính hãng', 185000, '-Áo đẹp chất lượng tốt', 'a9.jpg'),
(21, 'Bộ quần áo Manchester United sân khách 2021 – 2022 hàng chính hãng', 185000, '- Áo chất lượng cao', 'a10.jpg'),
(22, 'Bộ quần áo Atletico Madrid sân nhà 2021 – 2022 hàng chính hãng', 185000, '- Áo chất lượng cao', 'a11.jpg'),
(23, 'Bộ quần áo Atletico Madrid sân khách 2021 – 2022 hàng chính hãng', 195000, '- Áo chất lượng cao', 'a12.jpg'),
(24, 'Bộ quần áo Barcelona  sân nhà 2021 – 2022 hàng chính hãng', 195000, '- Áo chất lượng cao', 'a13.jpg'),
(25, 'Bộ quần áo Barcelona  sân khách 2021 – 2022 hàng chính hãng', 210000, '- Áo chất lượng cao', 'a14.jpg'),
(26, 'Bộ quần áo Real Madrid sân nhà 2021 – 2022 hàng chính hãng', 210000, '- Áo chất lượng cao', 'a15.jpg'),
(27, 'Bộ quần áo Real Madrid sân khách 2021 – 2022 hàng chính hãng', 230000, '- Áo chất lượng cao', 'a16.jpg'),
(28, 'Bộ quần áo Bayern Munich sân nhà 2021 – 2022 hàng chính hãng', 230000, '- Áo chất lượng cao', 'a17.jpg'),
(29, 'Bộ quần áo Bayern Munich sân khách 2021 – 2022 hàng chính hãng', 240000, '- Áo chất lượng cao', 'a18.jpg'),
(36, 'Bộ quần áo PSG sân nhà 2021 – 2022 hàng chính hãng', 165000, '- Áo chất lượng cao', 'a25.jpg'),
(37, 'Bộ quần áo Juventus sân nhà 2021 – 2022 hàng chính hãng', 165000, '- Áo chất lượng cao', 'a24.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`MaCTHD`),
  ADD KEY `MaHD` (`MaHD`),
  ADD KEY `IDSP` (`IDSP`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MaHD`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`IDKhachhang`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`IDNV`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`IDSP`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  MODIFY `MaCTHD` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `MaHD` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `IDKhachhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `chitiethoadon_ibfk_1` FOREIGN KEY (`MaHD`) REFERENCES `hoadon` (`MaHD`),
  ADD CONSTRAINT `chitiethoadon_ibfk_2` FOREIGN KEY (`IDSP`) REFERENCES `sanpham` (`IDSP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
