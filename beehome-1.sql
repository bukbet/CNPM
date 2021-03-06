-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2021 at 11:32 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

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
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `IDHD` int(11) NOT NULL,
  `thoigian` timestamp NULL DEFAULT NULL,
  `giatien` int(11) DEFAULT NULL,
  `Idp` int(11) DEFAULT NULL,
  `Idk` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`IDHD`, `thoigian`, `giatien`, `Idp`, `Idk`) VALUES
(1, '2021-04-07 09:21:36', 120000, 4, 7),
(2, '2021-04-07 09:21:49', 420000, 1, 1),
(3, '2021-04-07 09:21:52', 120000, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `khach`
--

CREATE TABLE `khach` (
  `id` int(11) NOT NULL,
  `hoten` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachi` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sdt` int(11) DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `room` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khach`
--

INSERT INTO `khach` (`id`, `hoten`, `diachi`, `sdt`, `date`, `time`, `room`) VALUES
(1, 'Nguyễn Văn b', 'Lào Cai', 558496514, '2021-04-13 17:00:00', 7, 1),
(2, 'Mai Thị B', 'HCM', 4356234, '2021-03-23 01:58:40', 2, 2),
(3, 'Đặng Văn C', 'Hà Nội', 23452345, '2021-03-25 01:59:01', 5, 3),
(7, 'Lò Thị E', 'Hải Phòng', 46698456, '2021-03-08 17:00:00', 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `taikhoan` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `matkhau` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `hoten` text COLLATE utf8_unicode_ci NOT NULL,
  `status` text COLLATE utf8_unicode_ci NOT NULL,
  `manv` int(11) NOT NULL,
  `diachi` text COLLATE utf8_unicode_ci NOT NULL,
  `sdt` int(11) NOT NULL,
  `chucvu` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `taikhoan`, `matkhau`, `hoten`, `status`, `manv`, `diachi`, `sdt`, `chucvu`) VALUES
(1, 'admin', 'admin', '???', 'Đang làm', 0, 'Việt Nam', 125325693, 'Giám đốc'),
(2, 'tuan', '1', 'Nguyễn Đình Tuân', 'Đang làm', 1, 'Lào Cai', 254895263, 'Quản lí'),
(3, 'nam', '1', 'Nguyễn Minh Nam', 'Đang làm', 2, 'Đông Anh', 656651834, 'Nhân viên'),
(4, 'long', '1', 'Lê Ngọc Long', 'Đã nghỉ', 3, 'Hà Nam', 456416533, 'Nhân viên'),
(5, 'tuyen', '1', 'Phạm Công Tuyền', 'Đã nghỉ', 4, 'Hải Phòng', 519665113, 'Nhân viên'),
(6, 'tuans', '1', 'Phan Hoàng Tuấn', 'Đã nghỉ', 5, 'Thanh Hóa', 22342534, 'Nhân viên');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `tenbai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ngaydang` date NOT NULL,
  `giatien` int(11) NOT NULL,
  `trangthai` int(11) NOT NULL,
  `SDT` int(11) NOT NULL,
  `mota` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `tenbai`, `thumbnail`, `ngaydang`, `giatien`, `trangthai`, `SDT`, `mota`, `id_user`) VALUES
(1, 'Phòng 1', 'https://thanhbinhgoldhotel.vn/wp-content/uploads/2017/02/phong-don-thuong.gif', '2020-12-12', 60000, 0, 25334616, '\r\nĐiều Hòa 2 chiều, có wifi, bình nóng lạnh, ghế tình yêu ...', 1),
(2, 'Phòng 2', 'https://thanhbinhgoldhotel.vn/wp-content/uploads/2017/02/phong-don-thuong.gif', '2020-12-12', 60000, 0, 369826416, 'Điều Hòa 2 chiều, có wifi, bình nóng lạnh, ghế tình yêu ...', 1),
(3, 'Phòng 3', 'https://thanhbinhgoldhotel.vn/wp-content/uploads/2017/02/phong-don-thuong.gif', '2021-01-16', 60000, 0, 968707777, 'Điều Hòa 2 chiều, có wifi, bình nóng lạnh, ghế tình yêu ...', 1),
(4, 'Phòng 4', 'https://thanhbinhgoldhotel.vn/wp-content/uploads/2017/02/phong-don-thuong.gif', '2020-12-12', 60000, 0, 2147483647, 'Điều Hòa 2 chiều, có wifi, bình nóng lạnh, ghế tình yêu ...', 1),
(5, 'Phòng 5', 'https://thanhbinhgoldhotel.vn/wp-content/uploads/2017/02/phong-don-thuong.gif', '2020-12-12', 60000, 1, 2147483647, 'Điều Hòa 2 chiều, có wifi, bình nóng lạnh, ghế tình yêu ...', 1),
(6, 'Phòng 6', 'https://www.sakurahotel.net/wp-content/uploads/2020/03/THO_0661-1024x683.jpg', '2021-01-07', 80000, 1, 346169166, 'Điều Hòa 2 chiều, có wifi, bình nóng lạnh, ghế tình yêu ...', 1),
(7, 'Phòng 7', 'https://www.sakurahotel.net/wp-content/uploads/2020/03/THO_0661-1024x683.jpg', '2021-01-17', 80000, 1, 353037823, 'Điều Hòa 2 chiều, có wifi, bình nóng lạnh, ghế tình yêu ...', 1),
(8, 'Phòng 8', 'https://www.sakurahotel.net/wp-content/uploads/2020/03/THO_0661-1024x683.jpg', '2021-01-16', 80000, 1, 2147483647, 'Điều Hòa 2 chiều, có wifi, bình nóng lạnh, ghế tình yêu ...', 1),
(9, 'Phòng 9', 'https://www.sakurahotel.net/wp-content/uploads/2020/03/THO_0661-1024x683.jpg', '2021-01-17', 80000, 1, 987263333, 'Điều Hòa 2 chiều, có wifi, bình nóng lạnh, ghế tình yêu ...', 1),
(10, 'Phòng 10', 'https://www.sakurahotel.net/wp-content/uploads/2020/03/THO_0661-1024x683.jpg', '2021-01-17', 80000, 1, 367168432, 'Điều Hòa 2 chiều, có wifi, bình nóng lạnh, ghế tình yêu ...', 1),
(11, 'Phòng 11', 'https://www.sakurahotel.net/wp-content/uploads/2020/03/THO_0661-1024x683.jpg', '2021-01-17', 80000, 1, 905531985, 'Điều Hòa 2 chiều, có wifi, bình nóng lạnh, ghế tình yêu ...', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`IDHD`),
  ADD KEY `Idp` (`Idp`),
  ADD KEY `Idk` (`Idk`);

--
-- Indexes for table `khach`
--
ALTER TABLE `khach`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `IDHD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `khach`
--
ALTER TABLE `khach`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

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
