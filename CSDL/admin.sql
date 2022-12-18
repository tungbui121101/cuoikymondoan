-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2021 at 03:43 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tongtien` float DEFAULT NULL,
  `sdt` char(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachi` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `trangthai` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`id`, `id_user`, `ten`, `tongtien`, `sdt`, `email`, `diachi`, `ghichu`, `trangthai`) VALUES
(34, 5, 'Ngô Văn Bốn', 4500, '0972529194', 'anhemtn114@gmail.com', 'HN', 'ko', 0),
(36, 2, 'Nguyễn Văn Cẩm', 3600, '0972529194', 'camcxt@gmail.com', 'HN', 'ko', 0);

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

CREATE TABLE `giohang` (
  `id_donhang` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `gia` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `giohang`
--

INSERT INTO `giohang` (`id_donhang`, `id_sanpham`, `soluong`, `gia`, `id_user`) VALUES
(34, 10, 1, 3000, 5),
(34, 12, 1, 1500, 5),
(36, 8, 1, 3600, 2);

-- --------------------------------------------------------

--
-- Table structure for table `hang`
--

CREATE TABLE `hang` (
  `tenhang` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `logo` longtext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hang`
--

INSERT INTO `hang` (`tenhang`, `logo`) VALUES
('HONDA', '../HINH/LOGO/HONDA.jpg'),
('YAMAHA', '../HINH/LOGO/YAMAHA.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `tensp` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gia` bigint(20) DEFAULT NULL,
  `hinhanh` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `kichthuoc` char(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chieucaoyen` char(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sizebanh` char(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `engine` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CC` char(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `congsuat` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CCnhot` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CCxang` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phanh` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gear` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenhang` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id`, `tensp`, `gia`, `hinhanh`, `kichthuoc`, `chieucaoyen`, `sizebanh`, `engine`, `CC`, `congsuat`, `CCnhot`, `CCxang`, `phanh`, `gear`, `tenhang`) VALUES
(1, 'Click 2020', 3600, 'https://giaxe.2banh.vn/cache/dataupload/products/thumbs/266_204_1577759640-86024cad1e83101d97359d7351051156-390-1.jpg', '1919 x 679 x 1062 mm', '769 mm', '90/80-14 - 100/80- 14 48P Tubeless', 'PGM-Fi, xăng, 4 kỳ, 1 xy-lanh, làm mát bằng dung dịch', '150 cc', '9.7 kW (13.1 PS) / 8500 rpm', '0,8L', '5,5L', 'Thắng đĩa;Tang trống', '6 cấp', 'HONDA'),
(2, 'Winner X', 2000, 'https://giaxe.2banh.vn/cache/dataupload/products/thumbs/266_204_1605947907-86024cad1e83101d97359d7351051156-423-1.png', '2.019 x 727 x 1.088 mm', ' 795 mm', '90/80-17M/C 46P Sau: 120/70-17M/C 58P', 'PGM-Fi, xăng, 4 kỳ, 1 xy-lanh, làm mát bằng dung dịch', '149,1 cm3', '11,5kW/9.000 vòng/phút', '1.1 lít khi thay nhớt ; 1.3 lít khi rã máy', '4,5L', 'Phanh đĩa;Phanh đĩa', '6 Cấp', 'HONDA'),
(3, 'CB150R SF', 4000, 'https://giaxe.2banh.vn/cache/dataupload/products/thumbs/266_204_1555732880-86024cad1e83101d97359d7351051156-419-1.jpg', '2.019 x 719 x 1.039 mm', ' 797 mm', '100/80-17 52P - 130/70-17 62P', '4 thì, một xilanh, DOHC', '149,16 cc', '16,6 mã lực @ 9.000 vòng/phút', '1.1 lít khi thay nhớt ; 1.3 lít khi rã máy', '12L', 'Phanh đĩa;Phanh đĩa', '6 Cấp', 'HONDA'),
(4, 'Air Blade', 2150, 'https://giaxe.2banh.vn/cache/dataupload/products/thumbs/266_204_1607065653-86024cad1e83101d97359d7351051156-447-1.png', '1.870mm x 686mm x 1.112mm', '775 mm', '90/80-14M/C 43P - 100/80 -14M/C 48P', ' Xăng, 4 kỳ, 1 xy lanh, làm mát bằng dung dịch', '149,3 cm3', '9,6kW/8.500 vòng/phút', ' 0,8 khi thay nhớt ; 0,9 khi rã máy', '4,4L', 'Phanh đĩa ABS;Tang trống', 'Vô cấp', 'HONDA'),
(5, 'Monkey 2019', 3700, 'https://giaxe.2banh.vn/cache/dataupload/products/thumbs/266_204_1540456181-86024cad1e83101d97359d7351051156-389-1.png', '1.712 x 754 x 1.029 mm', '776 mm', 'Maxxis Tortuga: 120/80-12 65J - 130/80-12 69J', 'SOHC xy-lanh đơn, làm mát bằng gió', '125cc', '9,6 mã lực tại 7.000 vòng/phút', '0.9 lít khi thay nhớt ; 1.1 lít khi rã máy', '5,7L', 'Phanh đĩa;Phanh đĩa', '4 Cấp', 'HONDA'),
(6, 'SH 2021', 3600, 'https://giaxe.2banh.vn/cache/dataupload/products/thumbs/266_204_1605171539-86024cad1e83101d97359d7351051156-466-1.jpg', '2.090 x 739 x 1.129 mm', '799 mm', '120/80-16 ; 100/80-16', 'PGM-FI, xăng, 4 kỳ, 1 xy-lanh, làm mát bằng dung dịch', '124,8cm³ (SH 125i)', '9,6kW/8.250 vòng/phút (SH 125i)', '0,8 khi thay nhớt ; 0,9 khi rã máy', '7,8L', 'Phanh đĩa ABS;Phanh đĩa', 'Vô cấp', 'HONDA'),
(7, 'EXCITER 2022', 2100, 'https://giaxe.2banh.vn/cache/dataupload/products/thumbs/266_204_1606209295-86024cad1e83101d97359d7351051156-376-1.png', '1.985mm x 670mm x 1.100mm', '795 mm', '120/80-16 ; 100/80-16', 'PGM-FI, xăng, 4 kỳ, SOHC, 1 xy-lanh, làm mát bằng dung dịch', '149,7 cc', '11,3 kW (15,4 PS) / 8.500 vòng/phút', 'Thay nhớt 0,95 lít - lọc nhớt 1,15 lít', '4L', 'Đĩa đơn 245 mm; Đĩa đơn 203 mm', '5 cấp', 'YAMAHA'),
(8, 'XSR 155 2020', 3600, 'https://giaxe.2banh.vn/cache/dataupload/products/thumbs/266_204_1578017803-86024cad1e83101d97359d7351051156-435-1.png', ' 2.000 x 805 x 1.080 (mm)', '810 mm', '110/70/17 - 140/70/17', 'PGM-FI, xăng, 4 kỳ, SOHC, 1 xy-lanh, làm mát bằng dung dịch', '155 cm³', '14,2 kW (19,3 PS)/ 10.000 vòng/phút​', 'thay nhớt 0.85 Lít (thay lọc nhớt là 0.95 Lít)', '10L', 'Phanh đĩa ABS;Phanh đĩa', '6 cấp', 'YAMAHA'),
(9, 'LATTE 2021', 1700, 'https://giaxe.2banh.vn/cache/dataupload/products/thumbs/266_204_1584155892-86024cad1e83101d97359d7351051156-422-1.png', '1,820 mm x 690 mm x 1,160 mm', '790 mm', '90/90-12 / 100/90-10', 'PGM-FI, xăng, 4 kỳ, 1 xy-lanh, SOHC, làm mát bằng gió', '124,8cm³', '6.1 kW (8.3 PS) / 6,500 vòng/phút', '0,8 khi thay nhớt', '6L', 'Phanh đĩa;Phanh tang trống', 'Vô cấp', 'YAMAHA'),
(10, 'MT-15 2021', 3000, 'https://giaxe.2banh.vn/cache/dataupload/products/thumbs/266_204_1550724726-86024cad1e83101d97359d7351051156-409-1.png', '800 x 1.965 x 1.065 mm', ' 810 mm', '110 / 70-17 M - 140 / 70-17 M', 'PGM-FI, xăng, 4 kỳ, 1 xy-lanh, SOHC, làm mát bằng dung dịch', '155cm³', '19 mã lực tại 10.000 v/ph', 'thay nhớt 0.85 Lít (thay lọc nhớt là 0.95 Lít)', '7,8L', 'Đĩa đơn 292 mm;Đĩa dơn 220mm', '6 cấp', 'YAMAHA'),
(11, 'NVX 2021', 2300, 'https://giaxe.2banh.vn/cache/dataupload/products/thumbs/266_204_1604392207-86024cad1e83101d97359d7351051156-461-1.png', '1.980 mm x 700 mm x 1.150 mm', '790 mm', '110/80-14M/C 53P - 140/70-14M/C 62P', 'PGM-FI, xăng, Blue Core, 4 thì, 4 van, SOHC, làm mát bằng dung dịch', '155,1 cc', '11,3 kW (15,4 PS)/8.000 vòng/phút', '0,9  khi thay nhớt', '5,5L', 'Phanh đĩa ABS;Phanh đĩa', 'Vô cấp', 'YAMAHA'),
(12, 'FreeGo 2021', 1500, 'https://giaxe.2banh.vn/cache/dataupload/products/thumbs/266_204_1584157529-86024cad1e83101d97359d7351051156-418-1.png', ' 1.905 x 690 x 1.110 mm', '780 mm', '100/90-12 59J - 110/90-12 64L', 'Blue Core, 4 thì, làm mát không khí, 1 xy-lanh', '124,8cm³', '9,4 mã lực @ 8.000 vòng/phút', '0,84 L', '4,2L', 'Đĩa đơn, piston đơn;Tang trống', 'Vô cấp', 'YAMAHA');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `username` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`username`, `password`) VALUES
('admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`) VALUES
(2, 'Nguyễn Văn Cẩm', '123', 'camcxt@gmail.com'),
(5, 'Ngô Văn Bốn', '123', 'anhemtn114@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `giohang`
--
ALTER TABLE `giohang`
  ADD KEY `id_sanpham` (`id_sanpham`),
  ADD KEY `id_donhang` (`id_donhang`);

--
-- Indexes for table `hang`
--
ALTER TABLE `hang`
  ADD PRIMARY KEY (`tenhang`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_sp_h` (`tenhang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `FK_sp_h` FOREIGN KEY (`tenhang`) REFERENCES `hang` (`tenhang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
