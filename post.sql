-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 01, 2021 at 02:01 AM
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
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
