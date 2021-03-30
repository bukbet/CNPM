-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 30, 2021 at 02:41 AM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beehome`
--

-- --------------------------------------------------------

--
-- Table structure for table `khach`
--

DROP TABLE IF EXISTS `khach`;
CREATE TABLE IF NOT EXISTS `khach` (
  `id` int NOT NULL AUTO_INCREMENT,
  `hoten` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachi` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sdt` int DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `time` int DEFAULT NULL,
  `room` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khach`
--

INSERT INTO `khach` (`id`, `hoten`, `diachi`, `sdt`, `date`, `time`, `room`) VALUES
(1, 'Nguyễn Văn A', 'Lào Cai', 558496514, '2021-03-23 01:57:36', 7, 1),
(2, 'Mai Thị B', 'HCM', 4356234, '2021-03-23 01:58:40', 2, 2),
(3, 'Đặng Văn C', 'Hà Nội', 23452345, '2021-03-25 01:59:01', 5, 3),
(7, 'Lò Thị E', 'Hải Phòng', 46698456, '2021-03-08 17:00:00', 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id` int NOT NULL AUTO_INCREMENT,
  `taikhoan` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `matkhau` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hoten` text COLLATE utf8_unicode_ci NOT NULL,
  `status` text COLLATE utf8_unicode_ci NOT NULL,
  `manv` int NOT NULL,
  `diachi` text COLLATE utf8_unicode_ci NOT NULL,
  `sdt` int NOT NULL,
  `chucvu` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `taikhoan`, `matkhau`, `hoten`, `status`, `manv`, `diachi`, `sdt`, `chucvu`) VALUES
(1, 'admin', 'admin', '???', 'Đang làm', 0, 'Việt Nam', 125325693, 'Giám đốc'),
(2, 'tuan', '1', 'Nguyễn Đình Tuân', 'Đang làm', 1, 'Lào Cai', 254895263, 'Quản lí'),
(19, 'nam', '1', 'Nguyễn Minh Nam', 'Đang làm', 2, 'Đông Anh', 656651834, 'Nhân viên'),
(20, 'long', '1', 'Lê Ngọc Long', 'Đã nghỉ', 3, 'Hà Nam', 456416533, 'Nhân viên'),
(25, 'tuyen', '1', 'Phạm Công Tuyền', 'Đã nghỉ', 4, 'Hải Phòng', 519665113, 'Nhân viên'),
(33, 'tuans', '1', 'Phan Hoàng Tuấn', 'Đã nghỉ', 5, 'Thanh Hóa', 22342534, 'Nhân viên');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tenbai` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ngaydang` date NOT NULL,
  `giatien` int NOT NULL,
  `trangthai` int NOT NULL,
  `SDT` int NOT NULL,
  `mota` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_user` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `tenbai`, `thumbnail`, `ngaydang`, `giatien`, `trangthai`, `SDT`, `mota`, `id_user`) VALUES
(1, 'Phòng 1', 'https://thanhbinhgoldhotel.vn/wp-content/uploads/2017/02/phong-don-thuong.gif', '2020-12-12', 60000, 1, 25334616, '\r\nĐiều Hòa 2 chiều, có wifi, bình nóng lạnh, ghế tình yêu ...', 1),
(2, 'Phòng 2', 'https://thanhbinhgoldhotel.vn/wp-content/uploads/2017/02/phong-don-thuong.gif', '2020-12-12', 60000, 1, 369826416, 'Điều Hòa 2 chiều, có wifi, bình nóng lạnh, ghế tình yêu ...', 2),
(3, 'Phòng 3', 'https://thanhbinhgoldhotel.vn/wp-content/uploads/2017/02/phong-don-thuong.gif', '2021-01-16', 60000, 1, 968707777, 'Điều Hòa 2 chiều, có wifi, bình nóng lạnh, ghế tình yêu ...', 19),
(4, 'Phòng 4', 'https://thanhbinhgoldhotel.vn/wp-content/uploads/2017/02/phong-don-thuong.gif', '2020-12-12', 60000, 1, 2147483647, 'Điều Hòa 2 chiều, có wifi, bình nóng lạnh, ghế tình yêu ...', 1),
(5, 'Phòng 5', 'https://thanhbinhgoldhotel.vn/wp-content/uploads/2017/02/phong-don-thuong.gif', '2020-12-12', 60000, 1, 2147483647, 'Điều Hòa 2 chiều, có wifi, bình nóng lạnh, ghế tình yêu ...', 1),
(6, 'Phòng 6', 'https://www.sakurahotel.net/wp-content/uploads/2020/03/THO_0661-1024x683.jpg', '2021-01-07', 80000, 0, 346169166, 'Điều Hòa 2 chiều, có wifi, bình nóng lạnh, ghế tình yêu ...', 1),
(48, 'Phòng 7', 'https://www.sakurahotel.net/wp-content/uploads/2020/03/THO_0661-1024x683.jpg', '2021-01-17', 80000, 1, 353037823, 'Điều Hòa 2 chiều, có wifi, bình nóng lạnh, ghế tình yêu ...', 1),
(50, 'Phòng 8', 'https://www.sakurahotel.net/wp-content/uploads/2020/03/THO_0661-1024x683.jpg', '2021-01-16', 80000, 1, 2147483647, 'Điều Hòa 2 chiều, có wifi, bình nóng lạnh, ghế tình yêu ...', 19),
(61, 'Phòng 9', 'https://www.sakurahotel.net/wp-content/uploads/2020/03/THO_0661-1024x683.jpg', '2021-01-17', 80000, 1, 987263333, 'Điều Hòa 2 chiều, có wifi, bình nóng lạnh, ghế tình yêu ...', 1),
(62, 'Phòng 10', 'https://www.sakurahotel.net/wp-content/uploads/2020/03/THO_0661-1024x683.jpg', '2021-01-17', 80000, 1, 367168432, 'Điều Hòa 2 chiều, có wifi, bình nóng lạnh, ghế tình yêu ...', 1),
(63, 'Phòng 11', 'https://www.sakurahotel.net/wp-content/uploads/2020/03/THO_0661-1024x683.jpg', '2021-01-17', 80000, 1, 905531985, 'Điều Hòa 2 chiều, có wifi, bình nóng lạnh, ghế tình yêu ...', 25);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `fk` FOREIGN KEY (`id_user`) REFERENCES `login` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
