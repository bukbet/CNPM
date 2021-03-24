-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 24, 2021 at 04:36 PM
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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khach`
--

INSERT INTO `khach` (`id`, `hoten`, `diachi`, `sdt`, `date`, `time`) VALUES
(1, 'Nguyễn Văn A', 'Lào Cai', 558496514, '2021-03-23 01:57:36', 7),
(2, 'Mai Thị B', 'HCM', 4356234, '2021-03-23 01:58:40', 2),
(3, 'Đặng Văn C', 'Hà Nội', 23452345, '2021-03-25 01:59:01', 5),
(7, 'Lò Thị E', 'Hải Phòng', 46698456, '2021-03-08 17:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id` int NOT NULL AUTO_INCREMENT,
  `taikhoan` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `matkhau` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` text COLLATE utf8_unicode_ci NOT NULL,
  `manv` int NOT NULL,
  `diachi` text COLLATE utf8_unicode_ci NOT NULL,
  `sdt` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `taikhoan`, `matkhau`, `status`, `manv`, `diachi`, `sdt`) VALUES
(1, 'admin', 'admin', 'Đang làm', 0, 'Việt Nam', 125325693),
(2, 'tk1', '1', 'Đang làm', 1, 'Lào Cai', 254895263),
(19, '1', '1', 'Đang làm', 2, 'Đông Anh', 656651834),
(20, 'tk11', '1', 'Đã nghỉ', 3, 'Hà Nam', 456416533),
(25, 'tien', '1', 'Đã nghỉ', 4, 'Hải Phòng', 519665113);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tenbai` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `noidung` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ngaydang` date NOT NULL,
  `giatien` int NOT NULL,
  `trangthai` int NOT NULL,
  `detail` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `dientich` int NOT NULL,
  `tienich` varchar(2000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `SDT` int NOT NULL,
  `mota` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_user` int NOT NULL,
  `tinhtrang` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `tenbai`, `thumbnail`, `noidung`, `ngaydang`, `giatien`, `trangthai`, `detail`, `dientich`, `tienich`, `SDT`, `mota`, `diachi`, `id_user`, `tinhtrang`) VALUES
(1, 'Phòng 1', 'https://thanhbinhgoldhotel.vn/wp-content/uploads/2017/02/phong-don-thuong.gif', '<p></p><div style=\"text-align: justify;\"><p><div style=\"text-align: left;\"><span style=\"color: rgb(44, 47, 54);\">Đường Phạm Đôn rộng 9m, nối giữa đường\r\nTrần Hưng Đạo B và đường Hải Thượng Lãn Ông, rất gần các trường ĐH, TDTT, TW 2,\r\nTrường ĐHYD và trường ĐH Sư Phạm, bưu điện Quận 5.</span></div><span style=\"mso-bidi-font-family:Arial;mso-bidi-theme-font:minor-latin;color:#2C2F36\"><div style=\"text-align: justify;\"><span style=\"text-align: start;\">Hẻm cụt. Khu dân cư yên tĩnh, an ninh, vệ sinh.\r\n</span></div><div style=\"text-align: justify;\"><span style=\"text-align: start;\">Thích hợp cho học sinh, sinh viên và những người làm công tác học tập, nghiên cứu.\r\n</span></div><div style=\"text-align: justify;\"><span style=\"text-align: start;\">Nhà mới sửa chữa, gần chợ và khu mua sắm Parkson Hùng Vương.</span></div>\r\n\r\n<span style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><div style=\"text-align: justify;\"><span style=\"text-align: start;\">vui lòng liên hệ trước để hẹn giờ xem phòng.</span></div></span></span><o:p></o:p></p></div><p></p>', '2020-12-12', 60000, 1, 'PGSV.php', 25, 'Phòng đơn', 25334616, '\r\nĐiều Hòa 2 chiều, có wifi, bình nóng lạnh, ghế tình yêu ...', 'ĐH Sư Phạm, bưu điện Quận 5.', 1, ''),
(2, 'Phòng 2', 'https://thanhbinhgoldhotel.vn/wp-content/uploads/2017/02/phong-don-thuong.gif', '<p style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; vertical-align: baseline; color: rgb(51, 51, 51); font-family: \" times=\"\" new=\"\" roman\";=\"\" font-size:=\"\" 18px;=\"\" text-align:=\"\" justify;\"=\"\">fsdfádfds<span style=\"background: transparent; border: 0px; margin: 0px; padding: 0px; vertical-align: baseline;\">– Tòa nhà chung cư mini Lạc Long Quân&nbsp;tọa l</span><span style=\"background-color: transparent;\">, cách Hồ Tây chỉ 200m, một trong những vị trí đẹp nhất trong số các dự án mà Chungcumini.com.vn đã triển khai.</span></p><p times=\"\" new=\"\" roman\";=\"\" font-size:=\"\" 18px;=\"\" text-align:=\"\" justify;\"=\"\" style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border: 0px; padding: 0px; vertical-align: baseline; color: rgb(51, 51, 51);\"><span style=\"background: transparent; border: 0px; margin: 0px; padding: 0px; vertical-align: baseline;\"><span style=\"background-color: transparent;\">– Nằm trong khu vực trung tâm với&nbsp;khu dân trí cao, với hệ thống cơ sở hạ tầng ổn định, hiện đại, gần các trường học, bệnh viện, trung tâm thương mại ở xung quanh, thế nên với mức giá chỉ từ 500 triệu đã có thể sở hữu nhà ở tại đây, thì đây xứng đáng là dự án chung cư giá rẻ Hà Nội nổi bật nhất cuối năm 2020.</span>ạc tại gần Ngã Tư Lạc Long Quân Bưởi – Hoàng Hoa Thám</span></p>', '2020-12-12', 60000, 1, 'CCMN.php', 35, 'Phòng đơn', 369826416, 'Điều Hòa 2 chiều, có wifi, bình nóng lạnh, ghế tình yêu ...', 'Hà Nội Studio, 23 Phố Tràng Thi, Phường Hàng Trống, Quận Hoàn Kiếm, Thành Phố Hà Nội', 2, ''),
(3, 'Phòng 3', 'https://thanhbinhgoldhotel.vn/wp-content/uploads/2017/02/phong-don-thuong.gif', '<span style=\"margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 18px; line-height: inherit; font-family: Archivo; vertical-align: baseline; color: rgb(0, 0, 0);\">+&nbsp; Sky resort</span><br style=\"color: rgb(51, 51, 51); font-family: Archivo; font-size: 18px;\"><span style=\"margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 18px; line-height: inherit; font-family: Archivo; vertical-align: baseline; color: rgb(0, 0, 0);\">+ Vị trí: Km 53, Quốc lộ 6 xã Mông Hoá, thành phố Hoà Bình</span><br style=\"color: rgb(51, 51, 51); font-family: Archivo; font-size: 18px;\"><span style=\"margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 18px; line-height: inherit; font-family: Archivo; vertical-align: baseline; color: rgb(0, 0, 0);\">+ Chủ đầu tư: Công ty cổ phần nghỉ dưỡng Việt Nhật</span><br style=\"color: rgb(51, 51, 51); font-family: Archivo; font-size: 18px;\"><span style=\"margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 18px; line-height: inherit; font-family: Archivo; vertical-align: baseline; color: rgb(0, 0, 0);\">+ Tổng diện tích: 10ha</span><br style=\"color: rgb(51, 51, 51); font-family: Archivo; font-size: 18px;\"><span style=\"margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 18px; line-height: inherit; font-family: Archivo; vertical-align: baseline; color: rgb(0, 0, 0);\">+ Diện tích xây dựng: 1.170m2, diện tích mặt nước, cây xanh lên tới 6ha, liền kề với vườn rau sạch farm stay cung cấp rau sạch cho thành phố HN</span><span style=\"margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 18px; line-height: inherit; font-family: Archivo; vertical-align: baseline; color: rgb(0, 0, 0);\"><br>+ ĐÃ CÓ SỔ ĐỎ</span>', '2021-01-16', 60000, 1, '', 2500, 'Phòng đơn', 968707777, 'Điều Hòa 2 chiều, có wifi, bình nóng lạnh, ghế tình yêu ...', 'Km 53, Quốc lộ 6 xã Mông Hoá, thành phố ', 19, ''),
(4, 'Phòng 4', 'https://thanhbinhgoldhotel.vn/wp-content/uploads/2017/02/phong-don-thuong.gif', '<p style=\"margin: 15pt 0cm 0cm; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size: 11pt; font-family: Tahoma, sans-serif;\">Khách sạn có 251 phòng nghỉ sang trọng đặc trưng với nét\r\ntrang trí mang phong cách Pháp cổ điển</span></p><p style=\"margin: 15pt 0cm 0cm; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size: 11pt; font-family: Tahoma, sans-serif;\">Các khu vực sảnh lớn, phòng giải\r\nlao, khu giải trí, phòng VIP, nhà hàng theo phong cách Châu Âu và Châu Á,\r\nRooftop Grand Lounge, Bars & Spa<o:p></o:p></span></p>', '2020-12-12', 60000, 1, '', 0, 'Phòng đơn', 2147483647, 'Điều Hòa 2 chiều, có wifi, bình nóng lạnh, ghế tình yêu ...', 'Số 8 đường Đồng Khởi, Quận 1, Thành phố Hồ Chí Minh, Việt Nam', 1, ''),
(5, 'Phòng 5', 'https://thanhbinhgoldhotel.vn/wp-content/uploads/2017/02/phong-don-thuong.gif', 'Biệt thự nha trang Cho thuê Uy Tín Giá Rẻ Villa Nha Trang&nbsp; giá&nbsp; rẻ&nbsp; cho thuê tiết kiệm đến 35%&nbsp; Giúp bạn tiết kiệm được chi phí,mang sự ấm áp bình yên như ngôi nhà của bạn khi bạn lưu trú&nbsp; những&nbsp; &nbsp;căn hộ ở nha trang , villa nha trang , các biệt thự nha trang từ 3 phòng ngủ đến 7 phòng ngủ khu vực villa an viên nha trang . Nếu bạn quan tâm đến an viên villa nha trang cách&nbsp; 6km là đến&nbsp; quảng trường nha trang .', '2020-12-12', 60000, 1, '', 260, 'Phòng đơn', 2147483647, 'Điều Hòa 2 chiều, có wifi, bình nóng lạnh, ghế tình yêu ...', ' Trần Phú, Vĩnh Nguyên, Vĩnh Trường, An Viên, Nha Trang ', 1, ''),
(6, 'Phòng 6', 'https://www.sakurahotel.net/wp-content/uploads/2020/03/THO_0661-1024x683.jpg', '<div id=\"summary\" class=\"\" data-et-mouseenter=\"customGoal:BUeeZaTaTaBEKMPXLae:1\r\ncustomGoal:BUeeHNSPMWdMOdUBMHT:1\r\ncustomGoal:BUeeHNSPdQEeWFWZTDWFC:1\r\ncustomGoal:BUeeHNSPMWdMOdUEXXO:1\r\ncustomGoal:BUeeHNSPdQEeXXaNSPRXXe:1\r\ncustomGoal:BUeePHOOSINEGO:1\r\ncustomGoal:BUeeHNSPVadIaCKe:1\r\ncustomGoal:BUeeHNSPCaASBaRDSGEXO:1 customGoal:BUeeZdbaBMRbBYWKOBLHXT:1\" data-et-click=\"customGoal:BUeeZaTaTaBEKMPXLae:2\r\ncustomGoal:BUeeHNSPMWdMOdUBMHT:2\r\ncustomGoal:BUeeHNSPdQEeWFWZTDWFC:2\r\ncustomGoal:BUeeHNSPMWdMOdUEXXO:2\r\ncustomGoal:BUeeHNSPdQEeXXaNSPRXXe:2\r\ncustomGoal:BUeePHOOSINEGO:2\r\ncustomGoal:BUeeHNSPVadIaCKe:2\r\ncustomGoal:BUeeHNSPCaASBaRDSGEXO:2 customGoal:BUeeZdbaBMRbBYWKOBLHXT:2\" style=\"font-size: 14px; color: rgb(51, 51, 51); font-family: BlinkMacSystemFont, -apple-system, \"Segoe UI\", Roboto, Helvetica, Arial, sans-serif;\"><div id=\"property_description_content\"><p>Nằm trong bán kính 2,9 km từ trung tâm thương mại Tràng Tiền Plaza, Lake House Studio cung cấp chỗ nghỉ có WiFi miễn phí và chỗ đỗ xe riêng miễn phí.</p><p>Cả Văn Miếu - Quốc Tử Giám và Bảo tàng mỹ thuật Việt Nam đều cách căn hộ 3,1 km. Sân bay gần nhất là sân bay quốc tế Nội Bài, cách Lake House Studio 31 km.</p></div></div><p class=\"hp-desc-review-highlight hp-desc-traveller-type--ph-v0\" style=\"font-size: 14px; color: rgb(51, 51, 51); font-family: BlinkMacSystemFont, -apple-system, \"Segoe UI\", Roboto, Helvetica, Arial, sans-serif;\">Các cặp đôi đặc biệt thích địa điểm này — họ cho điểm <strong>8,7</strong> cho kỳ nghỉ dành cho 2 người.</p><p class=\"hp-desc-we-speak\" style=\"font-size: 14px; color: rgb(51, 51, 51); font-family: BlinkMacSystemFont, -apple-system, \"Segoe UI\", Roboto, Helvetica, Arial, sans-serif;\">Chúng tôi sử dụng ngôn ngữ của bạn!</p>', '2021-01-07', 80000, 0, '', 130, 'Phòng đôi', 346169166, 'Điều Hòa 2 chiều, có wifi, bình nóng lạnh, ghế tình yêu ...', ' 283 Ho Ba Mau, Phuong Lien ward, Dong Da district, Quận Đống Đa, Hà Nội, Việt Nam ', 1, ''),
(48, 'Phòng 7', 'https://www.sakurahotel.net/wp-content/uploads/2020/03/THO_0661-1024x683.jpg', '<p><span style=\"color: rgb(68, 68, 68); font-family: Roboto; font-size: 15px;\">Chung cư Tứ Hiệp Plaza là tổ hợp khu nhà ở, văn phòng, dịch vụ tiện nghi nằm tại cửa ngõ phía Nam của thủ đô Hà Nội với quy mô lên tới 9ha. Với vị trí đắc địa, thiết kế không gian mở bố trí hài hòa cùng môi trường cảnh quan xung quanh tạo nên một không gian xanh – môi trường sống thư giãn lý tưởng cho nhiều hộ gia đình hiện đại.</span></p><p><font color=\"#444444\" face=\"Roboto\"><span style=\"font-size: 15px;\">Ngay sát bệnh viện nội tiết trung ương cơ sở 2. Từ dự án, quý khách chỉ mất vài phút lái xe là tới bến xe giáp bát, đai học Bách Khoa HN, bệnh viện Bạch Mai. Hứa hẹn sẽ là trung tâm hành chính, kinh tế sầm uất của phía Nam Hà Nội.</span></font><br><br></p>', '2021-01-17', 80000, 1, '', 65, 'Phòng đôi', 353037823, 'Điều Hòa 2 chiều, có wifi, bình nóng lạnh, ghế tình yêu ...', 'xã tứ hiệp huyện thanh trì tp hà nội', 1, ''),
(50, 'Phòng 8', 'https://www.sakurahotel.net/wp-content/uploads/2020/03/THO_0661-1024x683.jpg', '<p>Khách sạn 4 sao phù hợp cho cả gia đình gần Lâu đài Chateau-Gaillard\r\nCùng với nhà hàng, khách sạn không khói thuốc này có hồ bơi ngoài trời và quầy bar/khu lounge. </p><p>Khách có thể sử dụng Wifi miễn phí tại khu vực chung lẫn bãi đậu xe tự phục vụ miễn phí.</p><p> Ngoài ra, trong khuôn viên còn có quầy bar bên hồ bơi, tiệm/cửa hàng đồ ăn nhanh và phòng tắm hơi. </p>', '2021-01-16', 80000, 1, '', 230, 'Phòng đôi', 2147483647, 'Điều Hòa 2 chiều, có wifi, bình nóng lạnh, ghế tình yêu ...', 'Place d\'Armes 78000 Versailles France', 19, ''),
(61, 'Phòng 9', 'https://www.sakurahotel.net/wp-content/uploads/2020/03/THO_0661-1024x683.jpg', 'Vinpearl Hạ Long được xây dựng nhằm tận dụng tối đa lợi thế về mặt tự nhiên của dải đất Vịnh Hạ Long. Ngay từ cái nhìn đầu tiên, quý khách hàng sẽ cảm nhận được sự sang trọng, lịch lãm trong những thiết kế tân cổ điển, tạo nên vẻ đẹp lỗng lẫy, khác hoàn toàn với lỗi kiến trúc quen thuộc tại các sản phẩm Vinpearl trước đây, đem đến hình ảnh tươi mới cho một Vinpearl tràn đầy sức sống.', '2021-01-17', 80000, 1, '', 47000, 'Phòng đôi', 987263333, 'Điều Hòa 2 chiều, có wifi, bình nóng lạnh, ghế tình yêu ...', 'Vinpearl Hạ Long nằm biệt lập trên hòn đảo Rều thuộc quần thể Vịnh Hạ Long', 1, ''),
(62, 'Phòng 10', 'https://www.sakurahotel.net/wp-content/uploads/2020/03/THO_0661-1024x683.jpg', '<ul style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; list-style: none; color: rgb(34, 34, 34); font-family: Luxstay;\"><li style=\"box-sizing: inherit;\"><p style=\"box-sizing: inherit; margin-right: 0px; margin-left: 0px; font-size: 1rem !important; line-height: 1.5rem !important;\">Phòng lớn phù hợp với cặp tình nhân, vợ chồng, gia đình có con. Phòng có thể đáp ứng nhóm bạn từ 2-3 người.</p></li><li style=\"box-sizing: inherit;\"><p style=\"box-sizing: inherit; margin-right: 0px; margin-left: 0px; font-size: 1rem !important; line-height: 1.5rem !important;\">Phòng có ánh sáng tự nhiên và View hướng núi đồi siêu thực lên đến 185 độ. Có sofa và sofa bed để ban thư giản đọc sách và ngắm núi đồi buổi sáng và về đêm.</p></li><li style=\"box-sizing: inherit;\"><p style=\"box-sizing: inherit; margin-right: 0px; margin-left: 0px; font-size: 1rem !important; line-height: 1.5rem !important;\">Phòng rộng rãi đẹp 35m2, giường Kingsize 1m8*2m cho ban phút giây nghỉ ngơi thoải mái.</p></li><li style=\"box-sizing: inherit;\"><p style=\"box-sizing: inherit; margin-right: 0px; margin-left: 0px; font-size: 1rem !important; line-height: 1.5rem !important;\">Phòng có bếp mini thuận tiện cho bạn nấu ăn nhẹ.</p></li></ul>', '2021-01-17', 80000, 1, '', 35, 'Phòng đôi', 367168432, 'Điều Hòa 2 chiều, có wifi, bình nóng lạnh, ghế tình yêu ...', 'Đà Lạt, Lâm Đồng, Vietnam ', 1, ''),
(63, 'Phòng 11', 'https://www.sakurahotel.net/wp-content/uploads/2020/03/THO_0661-1024x683.jpg', 'Cho thuê hoặc bán một căn biệt thự VIP duy nhất( NHÀ THÔ), gần các tiện ích bệnh viện, trường học quốc tế, siêu thị Emart giao thông thuận tiện đi sân bay 10p.\r\nDiện tích rộng 17x19m 1 hầm,triệt 3 lầu, khu dân cư văn minh, thuận tiện mở công ty, Coffee House, spa,...hợp đồng 5năm trở lên\r\nGiá thuê rẻ nhất 70 triệu/tháng (giá thu về).\r\nLiên hệ: 0905531985 ', '2021-01-17', 80000, 1, '', 323, 'Phòng đôi', 905531985, 'Điều Hòa 2 chiều, có wifi, bình nóng lạnh, ghế tình yêu ...', '67 Phan Văn Trị Phường 5 Quận Gò Vấp - TPHCM ', 25, '');

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
