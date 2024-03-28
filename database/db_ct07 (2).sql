-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 28, 2024 at 07:05 AM
-- Server version: 8.0.31
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ct07`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`) VALUES
(1, 3),
(2, 4),
(3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `cartitem`
--

CREATE TABLE `cartitem` (
  `id` int NOT NULL,
  `product_id` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `cart_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cartitem`
--

INSERT INTO `cartitem` (`id`, `product_id`, `quantity`, `cart_id`) VALUES
(107, 1, 1, 1),
(108, 1, 1, 2),
(109, 1, 1, 2),
(114, 3, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Món Nước'),
(2, 'Món Khô'),
(3, 'Thức Uống'),
(4, 'Tráng Miệng');

-- --------------------------------------------------------

--
-- Table structure for table `dv_van_chuyen`
--

CREATE TABLE `dv_van_chuyen` (
  `id` int NOT NULL,
  `ten_don_vi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dv_van_chuyen`
--

INSERT INTO `dv_van_chuyen` (`id`, `ten_don_vi`) VALUES
(1, 'Giao hàng nhanh'),
(2, 'Viettel Post'),
(3, 'Giao hàng tiết kiệm'),
(4, 'GrabExpress'),
(5, 'NowShip'),
(6, 'ShipChung');

-- --------------------------------------------------------

--
-- Table structure for table `exception`
--

CREATE TABLE `exception` (
  `id` int NOT NULL,
  `message` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exception`
--

INSERT INTO `exception` (`id`, `message`, `time`) VALUES
(1, 'Kiểu tập tin phải là hình ảnh.', '2024-03-17 15:43:36'),
(2, 'SQLSTATE[01000]: Warning: 1265 Data truncated for column \'price\' at row 1D:\\VSCode + ampps\\Ampps\\www\\web_php_food\\services\\productService.php', '2024-03-17 16:03:10'),
(3, 'SQLSTATE[01000]: Warning: 1265 Data truncated for column \'price\' at row 1D:\\VSCode + ampps\\Ampps\\www\\web_php_food\\services\\productService.php', '2024-03-17 16:05:12');

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `id` int NOT NULL,
  `cart_id` int NOT NULL,
  `total_price` float NOT NULL,
  `dia_chi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_tao` datetime NOT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`id`, `cart_id`, `total_price`, `dia_chi`, `sdt`, `ngay_tao`, `status`) VALUES
(1, 3, 100000, 'qqq', '05555', '2024-03-27 02:14:24', 'đã xác nhận'),
(3, 3, 50000, '123456', '123456', '2024-03-28 11:55:35', 'đã xác nhận'),
(4, 3, 455000, 'qưeqw', '123131231', '2024-03-28 12:54:28', 'đã xác nhận'),
(5, 3, 455000, '11231231', '12312312123', '2024-03-28 13:03:41', 'đã xác nhận'),
(6, 3, 455000, 'ádadadas', 'ádadasdasd', '2024-03-28 13:05:48', 'đã xác nhận'),
(7, 3, 455000, 'ádasdasd', '12312312', '2024-03-28 13:15:42', 'đã xác nhận'),
(8, 3, 138000, 'asdasdasd', '123123121', '2024-03-28 13:31:53', 'đã xác nhận');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int DEFAULT NULL,
  `price` float NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `category_id`, `price`, `image`, `description`) VALUES
(1, 'Phở Gà', 1, 50000, 'phoga.jpg', 'Phở gà Việt Nam'),
(2, 'Bún Riêu Cua', 1, 65000, 'bunrieucua.jpg', 'Bún riêu cua đầy đủ hải sản'),
(3, 'Hủ Tiếu Mì', 1, 46000, 'hutieumi.jpg', 'Hủ tiếu mì sườn non'),
(4, 'Mì Quảng Ếch', 1, 55000, 'miquangech.jpg', 'Mì Quảng Ếch thơm ngon'),
(5, 'Bún Bò Huế', 1, 45000, 'bunbohue.jpg', 'Bún bò Huế thơm ngon'),
(6, 'Miến Gà', 1, 50000, 'miengaga.jpg', 'Miến gà nấu hầm'),
(7, 'Canh Chua Cá Lóc', 1, 45000, 'canhchuacaloc.jpg', 'Canh chua cá lóc ngon miệng'),
(8, 'Súp Măng Cua', 1, 45000, 'supmangcua.jpg', 'Súp măng cua hấp dẫn'),
(9, 'Bún Mọc', 1, 50000, 'bunmoc.jpg', 'Bún mọc đầy đủ nguyên liệu'),
(10, 'Phở Cuốn', 1, 50000, 'phocuon.jpg', 'Phở cuốn hấp dẫn'),
(11, 'Bánh Mì Chảo', 2, 35000, 'banhmichao.jpg', 'Bánh mì chảo thơm ngon'),
(12, 'Gỏi Bò Bóp Thấu', 2, 35000, 'goibobopthau.jpg', 'Gỏi bò bóp thấu ngon lạ'),
(13, 'Bánh Tráng Trộn', 2, 30000, 'banhtrangtron.jpg', 'Bánh tráng trộn sả cá'),
(14, 'Khoai Lang Chiên', 2, 25000, 'khoailangchien.jpg', 'Khoai lang chiên giòn'),
(15, 'Chả Cá Lã Vọng', 2, 56000, 'chacalavong.jpg', 'Chả cá Lã Vọng thơm ngon'),
(16, 'Bánh Bèo Nhân Tôm', 2, 31000, 'banhbeonhantom.jpg', 'Bánh bèo nhân tôm ngon'),
(17, 'Bò Khô Bơ', 2, 56000, 'bokhobo.jpg', 'Bò khô bơ đậm đà'),
(18, 'Cơm Cháy Chà Bông', 2, 45000, 'comchaychabong.jpg', 'Cơm cháy chà bông thơm lừng'),
(19, 'Gà Rán KFC', 2, 46000, 'garankfc.jpg', 'Gà rán phong cách KFC'),
(20, 'Xôi Gấc', 2, 30000, 'xoigac.jpg', 'Xôi gấc đỏ rực'),
(21, 'Trà Sữa', 3, 30000, 'trasua.jpg', 'Trà sữa thạch trái cây'),
(22, 'Nước Dừa Lọc', 3, 25000, 'nuocdualoc.jpg', 'Nước dừa tươi ngon'),
(23, 'Sinh Tố Bơ', 3, 30000, 'sinhtobo.jpg', 'Sinh tố bơ thơm ngon'),
(24, 'Cafe Đen', 3, 30000, 'cafedentuoi.jpg', 'Cafe đen sạch'),
(25, 'Soda Chanh', 3, 20000, 'sodachanh.jpg', 'Soda chanh mát lạnh'),
(26, 'Nước Lọc Lavie', 3, 10000, 'nuocloc.jpg', 'Nước lọc Lavie'),
(27, 'Bạc Xỉu', 3, 30000, 'bacxiu.jpg', 'Bạc xỉu pha phê'),
(28, 'Nước Cam Tươi', 3, 25000, 'nuoccamtuoi.jpg', 'Nước cam tươi ngon'),
(29, 'Trà Oolong', 3, 26000, 'traoolong.jpg', 'Trà oolong thơm ngon'),
(30, 'Nước Mía', 3, 10000, 'nuocmia.jpg', 'Nước mía tươi ngon'),
(31, 'Chè Thái', 4, 35000, 'chethai.jpg', 'Chè Thái ngon lạ miệng'),
(32, 'Kem Dừa', 4, 35000, 'kemdua.jpg', 'Kem dừa tươi mát'),
(33, 'Bánh Flan Caramel', 4, 35000, 'banhflan.jpg', 'Bánh flan caramel mềm mịn'),
(34, 'Kem Chuối', 4, 25000, 'kemchuoi.jpg', 'Kem chuối thơm ngon'),
(35, 'Bánh Gato Chocolate', 4, 55000, 'banhgatochocolate.jpg', 'Bánh gato chocolate ngon đậm đà'),
(36, 'Chè Sâm Bổ Lượng', 4, 45000, 'chesam.jpg', 'Chè sâm bổ lượng dưỡng sinh'),
(37, 'Bánh Tart Trái Cây', 4, 35000, 'banhtarttraicay.jpg', 'Bánh tart trái cây tươi mát'),
(38, 'Kem Cà Phê', 4, 45000, 'kemcaphe.jpg', 'Kem cà phê thơm ngon'),
(39, 'Bánh Dẻo Lá Dứa', 4, 35000, 'banhdeoladua.jpg', 'Bánh dẻo lá dứa ngon'),
(40, 'Chè Bưởi', 4, 44444, 'chebuoi.jpg', 'Chè bưởi thơm ngon');

-- --------------------------------------------------------

--
-- Table structure for table `product_sale`
--

CREATE TABLE `product_sale` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `sold_quantity` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_sale`
--

INSERT INTO `product_sale` (`id`, `product_id`, `sold_quantity`) VALUES
(1, 1, 7),
(2, 2, 14),
(3, 3, 3),
(4, 4, 0),
(5, 5, 0),
(6, 6, 0),
(7, 7, 0),
(8, 8, 0),
(9, 9, 0),
(10, 10, 0),
(11, 11, 0),
(12, 12, 0),
(13, 13, 0),
(14, 14, 0),
(15, 15, 0),
(16, 16, 0),
(17, 17, 0),
(18, 18, 0),
(19, 19, 0),
(20, 20, 0),
(21, 21, 0),
(22, 22, 0),
(23, 23, 0),
(24, 24, 0),
(25, 25, 0),
(26, 26, 0),
(27, 27, 0),
(28, 28, 0),
(29, 29, 0),
(30, 30, 0),
(31, 31, 0),
(32, 32, 0),
(33, 33, 0),
(34, 34, 0),
(35, 35, 0),
(36, 36, 0),
(37, 37, 0),
(38, 38, 0),
(39, 39, 0),
(40, 40, 0);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `ship`
--

CREATE TABLE `ship` (
  `id` int NOT NULL,
  `hoadon_id` int NOT NULL,
  `dv_van_chuyen_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ship`
--

INSERT INTO `ship` (`id`, `hoadon_id`, `dv_van_chuyen_id`) VALUES
(1, 1, 1),
(3, 3, 1),
(4, 4, 1),
(5, 6, 1),
(6, 7, 1),
(7, 7, 1),
(8, 1, 1),
(9, 7, 1),
(10, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `email`, `role_id`) VALUES
(1, 'AdminUser', 'adminpassword', 'admin@example.com', 1),
(2, 'RegularUser', '$2y$10$W7sacXbHaCaCjUIS8kP2NeRpt8rMnZOnxhvBDFNC./tdtCC70ix0e', 'user@example.com', 2),
(3, 'qqqqqq', '$2y$10$6i8K4tt6NAsbd8BCnCk8NuwwteVhliUW58DG2FCZ1BJ6DlaJU9Zqy', 'on@gmail.com3', 2),
(4, 'hohieu', '$2y$10$Y5gbst1Mu2mM/BVUX8TKGOyjMaITRm0v6EM/LR8MBveCi3gzuzECq', 'hokyhieu@', 1),
(5, 'hokyhieu2', '$2y$10$QAL/0c0ueIeSeCXl5hBtR.XrdB8yDfqL0nN992IN85X9BfTxBb.NW', 'hokyhieu1603@gmail.com', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cartitem`
--
ALTER TABLE `cartitem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `cart_id_2` (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dv_van_chuyen`
--
ALTER TABLE `dv_van_chuyen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exception`
--
ALTER TABLE `exception`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_id` (`cart_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `product_sale`
--
ALTER TABLE `product_sale`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_id` (`product_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ship`
--
ALTER TABLE `ship`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hoadon_id` (`hoadon_id`),
  ADD KEY `dv_van_chuyen_id` (`dv_van_chuyen_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cartitem`
--
ALTER TABLE `cartitem`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `dv_van_chuyen`
--
ALTER TABLE `dv_van_chuyen`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `exception`
--
ALTER TABLE `exception`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `product_sale`
--
ALTER TABLE `product_sale`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `ship`
--
ALTER TABLE `ship`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cartitem`
--
ALTER TABLE `cartitem`
  ADD CONSTRAINT `cartitem_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`),
  ADD CONSTRAINT `fk_foreign_key_productid` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `fk_cart_id` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `product_sale`
--
ALTER TABLE `product_sale`
  ADD CONSTRAINT `product_sale_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `ship`
--
ALTER TABLE `ship`
  ADD CONSTRAINT `fk_dv_van_chuyen_id` FOREIGN KEY (`dv_van_chuyen_id`) REFERENCES `dv_van_chuyen` (`id`),
  ADD CONSTRAINT `fk_hoadon_id_ship` FOREIGN KEY (`hoadon_id`) REFERENCES `hoadon` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
