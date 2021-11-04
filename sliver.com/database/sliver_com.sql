-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th10 26, 2021 lúc 08:19 PM
-- Phiên bản máy phục vụ: 10.4.10-MariaDB
-- Phiên bản PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `sliver.com`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `comment_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_rate` int(11) NOT NULL,
  `comment_user_id` int(11) NOT NULL,
  `comment_user_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `product_id`, `comment_content`, `comment_rate`, `comment_user_id`, `comment_user_name`) VALUES
(5, 1, 'sản phẩm ok', 5, 2, 'user'),
(6, 1, 'Sản phẩm dùng ổn định', 4, 3, 'manager');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manufactures`
--

DROP TABLE IF EXISTS `manufactures`;
CREATE TABLE IF NOT EXISTS `manufactures` (
  `manu_ID` int(11) NOT NULL AUTO_INCREMENT,
  `manu_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `manu_img` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`manu_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `manufactures`
--

INSERT INTO `manufactures` (`manu_ID`, `manu_name`, `manu_img`) VALUES
(1, 'Huaweiuuuuu', 'huawei.png'),
(3, 'Oppo', 'oppo.png'),
(4, 'Samsung', 'samsum.png'),
(5, 'Xiaomi', 'xiaomi.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `image` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `manu_ID` int(11) NOT NULL,
  `type_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`ID`, `name`, `price`, `image`, `description`, `manu_ID`, `type_ID`) VALUES
(1, 'Điện thoại Huawei P30 Lite', 6020000, 'huawei_p30.png', 'Màn hình:	IPS LCD, 6.15\", Full HD+\r\nHệ điều hành:	Android 9.0 (Pie)\r\nCamera sau:	Chính 24 MP & Phụ 8 MP, 2 MP\r\nCamera trước:	32 MP\r\nCPU:	HiSilicon Kirin 710\r\nRAM:	6 GB\r\nBộ nhớ trong:	128 GB\r\nThẻ nhớ:	MicroSD, hỗ trợ tối đa 512 GB\r\nThẻ SIM:\r\n2 SIM Nano (SIM 2 chung khe thẻ nhớ), Hỗ trợ 4G\r\nHOTSIM Mobi Big 70 (3GB data/tháng). Giá từ 170.000đ\r\nDung lượng pin:	3340 mAh, có sạc nhanh', 1, 1),
(2, 'Điện thoại OPPO F11 Pro 128GB', 7990000, 'oppo_f11_mtp.png', 'Màn hình:	LTPS LCD, 6.5\", Full HD+\r\nHệ điều hành:	Android 9.0 (Pie)\r\nCamera sau:	Chính 48 MP & Phụ 5 MP\r\nCamera trước:	16 MP\r\nCPU:	MediaTek Helio P70 8 nhân\r\nRAM:	6 GB\r\nBộ nhớ trong:	128 GB\r\nThẻ nhớ:	MicroSD, hỗ trợ tối đa 256 GB\r\nThẻ SIM:\r\n2 SIM Nano (SIM 2 chung khe thẻ nhớ), Hỗ trợ 4G\r\nHOTSIM Mobi Big 70 (3GB data/tháng). Giá từ 170.000đ\r\nDung lượng pin:	4000 mAh, có sạc nhanh', 3, 1),
(3, 'Điện thoại iPhone 7 Plus 32GB', 12490000, 'iphone_7_plus.png', 'Màn hình:	LED-backlit IPS LCD, 5.5\", Retina HD\r\nHệ điều hành:	iOS 12\r\nCamera sau:	Chính 12 MP & Phụ 12 MP\r\nCamera trước:	7 MP\r\nCPU:	Apple A10 Fusion 4 nhân 64-bit\r\nRAM:	3 GB\r\nBộ nhớ trong:	32 GB\r\nThẻ SIM:\r\n1 Nano SIM, Hỗ trợ 4G\r\nHOTSIM Mobi Big 70 (3GB data/tháng). Giá từ 170.000đ\r\nDung lượng pin:	2900 mAh', 2, 1),
(4, 'Điện thoại Samsung Galaxy A50s', 7790000, 'samsung_galaxy_a50s.png', 'Màn hình:	Super AMOLED, 6.4\", Full HD+\r\nHệ điều hành:	Android 9.0 (Pie)\r\nCamera sau:	Chính 48 MP & Phụ 8 MP, 5 MP\r\nCamera trước:	32 MP\r\nCPU:	Exynos 9610 8 nhân 64-bit\r\nRAM:	4 GB\r\nBộ nhớ trong:	64 GB\r\nThẻ nhớ:	MicroSD, hỗ trợ tối đa 512 GB\r\nThẻ SIM:\r\n2 Nano SIM, Hỗ trợ 4G\r\nHOTSIM Mobi Big 70 (3GB data/tháng). Giá từ 170.000đ\r\nDung lượng pin:	4000 mAh, có sạc nhanh', 4, 1),
(5, 'Điện thoại Xiaomi Redmi Note 7 64GB', 4690000, 'xiaomi_redmi_note_7.png', 'Màn hình:	IPS LCD, 6.3\", Full HD+\r\nHệ điều hành:	Android 9.0 (Pie)\r\nCamera sau:	Chính 48 MP & Phụ 5 MP\r\nCamera trước:	13 MP\r\nCPU:	Qualcomm Snapdragon 660 8 nhân\r\nRAM:	4 GB\r\nBộ nhớ trong:	64 GB\r\nThẻ nhớ:	MicroSD, hỗ trợ tối đa 256 GB\r\nThẻ SIM:\r\n2 SIM Nano (SIM 2 chung khe thẻ nhớ), Hỗ trợ 4G\r\nHOTSIM Mobi Big 70 (3GB data/tháng). Giá từ 170.000đ\r\nDung lượng pin:	4000 mAh, có sạc nhanh', 5, 1),
(6, 'Laptop Lenovo Ideapad 330S 14IKBR i5 8250U/4GB/1TB/Win10 (81F400NLVN)', 12290000, 'lenovo.png', 'CPU:	Intel Core i5 Coffee Lake, 8250U, 1.60 GHz\r\nRAM:	4 GB, DDR4 (On board +1 khe), 2400 MHz\r\nỔ cứng:	HDD: 1 TB, Hỗ trợ khe cắm SSD M.2 PCIe\r\nMàn hình:	14 inch, Full HD (1920 x 1080)\r\nCard màn hình:	Card đồ họa tích hợp, Intel® HD Graphics 620\r\nCổng kết nối:	HDMI 2.0, 2 x USB 3.1, USB Type-C\r\nHệ điều hành:	Windows 10 Home SL\r\nThiết kế:	Vỏ nhựa, PIN liền\r\nKích thước:	Dày 18.9 mm, 1.67 kg', 1, 2),
(7, 'Laptop Acer Aspire A515 53 3153 i3 8145U/4GB/1TB/Win10 ', 10990000, 'acer.png', 'CPU:	Intel Core i3 Coffee Lake, 8145U, 2.10 GHz\r\nRAM:	4 GB, DDR4 (1 khe), 2133 MHz\r\nỔ cứng:	HDD: 1 TB SATA3, Hỗ trợ khe cắm SSD M.2 PCIe\r\nMàn hình:	15.6 inch, Full HD (1920 x 1080)\r\nCard màn hình:	Card đồ họa tích hợp, Intel® UHD Graphics 620\r\nCổng kết nối:	2 x USB 3.0, HDMI, LAN (RJ45), USB Type-C\r\nHệ điều hành:	Windows 10 Home SL\r\nThiết kế:	Vỏ nhựa, PIN liền\r\nKích thước:	Dày 22.45 mm, 2.0 kg', 3, 2),
(8, 'Laptop Apple Macbook Air 2017 i5 1.8GHz/8GB/128GB', 21990000, 'macbook.png', 'CPU:	Intel Core i5 Broadwell, 1.80 GHz\r\nRAM:	8 GB, DDR3L(On board), 1600 MHz\r\nỔ cứng:	SSD: 128 GB\r\nMàn hình:	13.3 inch, WXGA+(1440 x 900)\r\nCard màn hình:	Card đồ họa tích hợp, Intel HD Graphics 6000\r\nCổng kết nối:	MagSafe 2, 2 x USB 3.0, Thunderbolt 2\r\nHệ điều hành:	Mac OS\r\nThiết kế:	Vỏ kim loại nguyên khối, PIN liền\r\nKích thước:	Dày 17 mm, 1.35 Kg', 2, 2),
(9, 'Laptop Dell Inspiron 3576 i3 7020U/4GB/1TB/2GB AMD 520/Win10', 11690000, 'dell.png', 'CPU:	Intel Core i3 Kabylake, 7020U, 2.30 GHz\r\nRAM:	4 GB, DDR4 (2 khe), 2400 MHz\r\nỔ cứng:	HDD: 1 TB SATA3\r\nMàn hình:	15.6 inch, HD (1366 x 768)\r\nCard màn hình:	Card đồ họa rời, AMD Radeon 520, 2GB\r\nCổng kết nối:	HDMI 1.4, 2 x USB 3.0, LAN (RJ45), USB 2.0\r\nHệ điều hành:	Windows 10 Home SL\r\nThiết kế:	Vỏ nhựa, PIN rời\r\nKích thước:	Dày 23.65 mm, 2.3 kg', 4, 2),
(10, 'Laptop Asus X507MA N4000/4GB/256GB/Win10', 6490000, 'asus.png', 'CPU:	Intel Celeron, N4000, 1.10 GHz\r\nRAM:	4 GB, DDR4 (1 khe), 2400 MHz\r\nỔ cứng:	SSD: 256 GB M2\r\nMàn hình:	15.6 inch, HD (1366 x 768)\r\nCard màn hình:	Card đồ họa tích hợp, Intel® UHD Graphics 600\r\nCổng kết nối:	2 x USB 3.0, HDMI, USB 2.0\r\nHệ điều hành:	Windows 10 Home SL\r\nThiết kế:	Vỏ nhựa, PIN liền\r\nKích thước:	Dày 21.9 mm, 1.75 kg', 5, 2),
(11, 'Loa Bluetooth eSaver S12B-2 Đen', 665000, 'loa_bluetooth_1.png', 'Nhà sản xuất:	\r\nEsaver\r\nModel:	\r\nS12B-2\r\nKích thước:	\r\nĐường kính 185 - ngang 285mm\r\nTrọng lượng:	\r\n1 kg\r\nCông suất:	\r\n12W + 3W*2\r\nCách kết nối:	\r\nBluetooth\r\nJack cắm 3.5 mm\r\nThẻ nhớ SD\r\nCổng USB\r\nPhím điều khiển:	\r\nTăng/giảm âm lượng\r\nChỉnh Bass\r\nChuyển bài hát\r\nPhát/dừng chơi nhạc\r\nChuyển chế độ\r\nBộ bán hàng chuẩn:	\r\nLoa\r\nCáp cắm 3.5 mm\r\nSách hướng dẫn', 1, 3),
(12, 'Loa Kéo Bluetooth Enkor L0810K Đen', 2000000, 'loa_keo_bluetooth.png', 'Nhà sản xuất:	\r\nEnkor\r\nModel:	\r\nL0810K\r\nKích thước:	\r\nCao 51 cm - ngang 31.5 cm - dày 31.5 cm\r\nTrọng lượng:	\r\n7kg\r\nCông suất:	\r\n25W\r\nCách kết nối:	\r\nCổng USB\r\nBluetooth\r\nJack cắm 3.5 mm\r\nThẻ nhớ Micro SD\r\nBộ bán hàng chuẩn:	\r\nMicro không dây\r\nLoa\r\nSách hướng dẫn\r\nRemote\r\n1 Adapter sạc', 2, 3),
(13, 'Loa Bluetooth Wetop A3 Đen', 700000, 'loa_bluetooth_a3.png', 'Nhà sản xuất:	\r\nWetop\r\nModel:	\r\nA3\r\nKích thước:	\r\nNgang 16.3 cm - dày 9.2 cm - cao 16.3 cm\r\nTrọng lượng:	\r\n360 gr\r\nCông suất:	\r\n10W\r\nCách kết nối:	\r\nThẻ nhớ Micro SD\r\nBluetooth\r\nPhím điều khiển:	\r\nTăng/giảm âm lượng\r\nNút nguồn\r\nChuyển bài hát\r\nPhát/dừng chơi nhạc\r\nNghe/nhận cuộc gọi\r\nBộ bán hàng chuẩn:	\r\nLoa\r\nCáp Micro USB\r\nCáp cắm 3.5 mm\r\nSách hướng dẫn', 3, 3),
(14, 'Loa vi tính Enkor 2.1 R228', 750000, 'loa_vi_tinh.png', 'Model:	\r\nR228\r\nKích thước loa siêu trầm:	\r\nCao 25 cm - ngang 16 cm - dày 18 cm\r\nCông suất loa siêu trầm:	\r\n20W\r\nKích thước loa vệ tinh:	\r\nCao 15 cm - ngang 11 cm - dày 8 cm\r\nCông suất loa vệ tinh:	\r\n5Wx2\r\nTổng công suất:	\r\n20W+5Wx2\r\nTrọng lượng:	\r\n1.85 kg\r\nCách kết nối:	\r\nCổng USB\r\nBluetooth\r\nJack cắm 3.5 mm\r\nPhím điều khiển:	\r\nTăng/giảm âm lượng\r\nNút nguồn\r\nChuyển bài hát\r\nPhát/dừng chơi nhạc\r\nChuyển chế độ\r\nDãi tần số (Hz)	\r\n40Hz-20KHz', 4, 3),
(15, 'Loa Bluetooth JBL GO2', 850000, 'loa_bluetooth_go2.png', 'Nhà sản xuất:	\r\nJBL\r\nModel:	\r\nGO2\r\nKích thước:	\r\n7.12 x 8.60 x3.16 (cm)\r\nTrọng lượng:	\r\n184g\r\nCông suất:	\r\n3.1W\r\nCách kết nối:	\r\nJack cắm 3.5 mm\r\nBluetooth\r\nPhím điều khiển:	\r\nBật/tắt bluetooth\r\nNút nguồn\r\nTăng/giảm âm lượng\r\nBộ bán hàng chuẩn:	\r\nLoa\r\nCáp Micro USB\r\nSách hướng dẫn', 5, 3),
(16, 'Tai nghe EP Mozard DS509-WB', 200, 'tai_nghe_ds509.png', 'Độ dài dây:	\r\n1.2 m\r\nPhím điều khiển:	\r\nMic thoại\r\nNghe/nhận cuộc gọi\r\nPhát/dừng chơi nhạc\r\nTăng/giảm âm lượng\r\nBộ bán hàng:	\r\nTai nghe\r\n2 cặp đệm tai nghe\r\nXuất xứ	\r\nTrung Quốc', 1, 4),
(17, 'Tai nghe chụp tai Gaming Logitech G431 7.1', 2099000, 'tai_nghe_g431.png', 'Jack cắm:	\r\n3.5mm\r\nĐộ dài dây:	\r\n2 m\r\nPhím điều khiển:	\r\nMic thoại\r\nTăng/giảm âm lượng\r\nBộ bán hàng:	\r\nTai nghe\r\nCáp chuyển USB ra đầu 3.5mm\r\nCáp âm thanh chữ Y\r\nSách hướng dẫn\r\nXuất xứ	\r\nTrung Quốc', 2, 4),
(18, 'Tai nghe chụp tai Kanen IP-350 Tím', 150000, 'tai_nghe_ip_350.png', 'Jack cắm:	\r\n3.5mm\r\nĐộ dài dây:	\r\n1.5 m\r\nPhím điều khiển:	\r\nMic thoại\r\nNghe/nhận cuộc gọi\r\nPhát/dừng chơi nhạc\r\nChuyển bài hát\r\nTăng/giảm âm lượng\r\nBộ bán hàng:	\r\nTai nghe\r\nXuất xứ	\r\nTrung Quốc', 3, 4),
(19, 'Tai nghe chụp tai Kanen IP-2090', 210000, 'tai_nghe_ip_2090.png', 'Jack cắm:	\r\n3.5 mm\r\nĐộ dài dây:	\r\n1.5 m\r\nPhím điều khiển:	\r\nMic thoại\r\nNghe/nhận cuộc gọi\r\nPhát/dừng chơi nhạc\r\nChuyển bài hát\r\nTăng/giảm âm lượng\r\nBộ bán hàng:	\r\nTai nghe\r\nXuất xứ	\r\nTrung Quốc', 4, 4),
(20, 'Tai nghe chụp tai Kanen IP-892', 350000, 'tai_nghe_g331.png', 'Jack cắm:	\r\n3.5mm\r\nĐộ dài dây:	\r\n1.5 m\r\nPhím điều khiển:	\r\nMic thoại\r\nNghe/nhận cuộc gọi\r\nPhát/dừng chơi nhạc\r\nChuyển bài hát\r\nTăng/giảm âm lượng\r\nBộ bán hàng:	\r\nTai nghe\r\nXuất xứ	\r\nTrung Quốc', 5, 4),
(21, 'Cáp Xmobile Micro USB 25 cm', 20000, 'cap_x_mobile.png', 'Jack cắm:	\r\nMicro USB\r\nĐộ dài dây:	\r\n25 cm\r\nXuất xứ	\r\nTrung Quốc', 1, 5),
(22, 'Dây cáp Micro USB 20 cm Xmobile MU03', 20000, 'cap_micro_usb.png', 'Jack cắm:	\r\nMicro USB\r\nTính năng:	\r\nTruyền dữ liệu\r\nSạc\r\nDòng sạc tối đa:	\r\n2A\r\nĐộ dài dây:	\r\n20 cm\r\nXuất xứ	\r\nTrung Quốc', 2, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `protypes`
--

DROP TABLE IF EXISTS `protypes`;
CREATE TABLE IF NOT EXISTS `protypes` (
  `type_ID` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type_img` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`type_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `protypes`
--

INSERT INTO `protypes` (`type_ID`, `type_name`, `type_img`) VALUES
(1, 'Điện thoại', 'dienthoai.png'),
(2, 'Laptop', 'laptop.png'),
(3, 'Loa', 'loa.png'),
(4, 'Tai nghe', 'tainghe.png'),
(5, 'Dây sạc', 'daysac.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `access` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `access_img` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `access`, `access_img`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '12345', 'admin', 'huawei.png'),
(2, 'user', 'user', 'user@gmail.com', '12345', 'user', 'oppo.png'),
(3, 'manager', 'manager', 'manager@gmail.com', '12345', 'manager', 'xiaomi.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
