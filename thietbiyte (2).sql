-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 29, 2021 lúc 03:59 PM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `thietbiyte`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(14, 'CÂN SỨC KHỎE'),
(16, 'ĐAI - NẸP CHẤN THƯƠNG'),
(3, 'ĐỆM HƠI LUCASS'),
(13, 'ĐÈN CỰC TÍM'),
(12, 'ĐÈN HÔNG NGOẠI '),
(10, 'HUYẾT ÁP CƠ '),
(1, 'HUYẾT ÁP OMRON'),
(7, 'MÁY ĐO SPO2'),
(4, 'MÁY ĐO TIỂU ĐƯỜNG'),
(15, 'MÁY HÚT DỊCH '),
(9, 'MÁY TẬP THỞ'),
(8, 'MÁY TRỢ THÍNH '),
(2, 'MÁY XÔNG KHÍ DUNG'),
(6, 'NHIỆT ĐỘ ĐIỆN TỬ'),
(5, 'QUE THỬ TIỂU ĐƯỜNG '),
(11, 'TẤT ÁP LỰC ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `ct_id` int(11) NOT NULL,
  `ct_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ct_email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ct_sdt` int(11) DEFAULT NULL,
  `ct_title` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ct_content` varchar(4000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ct_address` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ct_check` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`ct_id`, `ct_name`, `ct_email`, `ct_sdt`, `ct_title`, `ct_content`, `ct_address`, `ct_check`) VALUES
(3, 'Ha Duy Do', 'dotrung02022001@gmail.com', 353621900, 'Gop y', 'xyz', 'Ha Noi', b'1'),
(4, 'Hoang Long', 'longdo@gmail.com', 353621900, '123456', 'zxc\r\n', 'Nghe An', b'0'),
(5, 'Ngo Ba Kha', 'khabanh12@gmail.com', 99999999, 'Gop y', '123', 'Nghe An', b'1'),
(6, 'Trương Thị Quỳnh', 'truongquynh312002@gmail.com', 123123, 'Mua hang', 'Hang chat luong dep', 'Nghe An', b'1'),
(7, 'Ngo Ba Kha', 'dotrung02022001@gmail.com', 353621900, 'ban', 'ban', 'Ha Noi', NULL),
(8, 'Phat', 'check', 0, 'check', 'check', 'check', NULL),
(9, 'Long', 'check', 0, 'check', 'check', 'check', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `od_id` int(11) NOT NULL,
  `od_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `od_phone` int(11) NOT NULL,
  `od_mail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `od_address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `od_prd_name` varchar(4000) COLLATE utf8_unicode_ci NOT NULL,
  `od_qtt` int(11) NOT NULL,
  `od_all_price` int(11) NOT NULL,
  `od_check` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`od_id`, `od_name`, `od_phone`, `od_mail`, `od_address`, `od_prd_name`, `od_qtt`, `od_all_price`, `od_check`) VALUES
(1, 'Hà Duy Đô', 353621900, 'dotrung02022001@gmail.com', 'Nghệ An', 'Máy tập thở B-SPIRO 5000', 3, 1350000, 0),
(2, 'Hà Duy Đô', 353621900, 'dotrung02022001@gmail.com', 'Nghệ An', 'Ha Duy Do', 2, 1000000, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `prd_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `prd_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prd_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prd_price` int(11) UNSIGNED NOT NULL,
  `prd_warranty` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prd_status` int(1) NOT NULL,
  `prd_details` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`prd_id`, `cat_id`, `prd_name`, `prd_image`, `prd_price`, `prd_warranty`, `prd_status`, `prd_details`) VALUES
(1, 1, 'Huyết áp cổ tay HEM 6161', 'iPhone-7-Plus-32GB-Rose-Gold.png', 880000, '', 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(2, 1, 'Huyết áp cổ tay HEM 6181', 'iPhone-X-256GB-Silver-Seedstock.png', 1250000, '', 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(3, 1, 'Huyết áp bắp tay HEM 8712', 'iPhone-Xr-2-Sim-64GB-Yellow.png', 890000, '', 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(4, 2, 'Máy khí dung KANEKO ', 'iPhone-Xr-2-Sim-256GB-Red.png', 750000, '', 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(5, 2, 'Máy khí dung OMRON NE C101', 'iPhone-Xs-256GB-Gold.png', 890000, '', 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(6, 2, 'Máy khí dung OMRON NE C801', 'Samsung-Galaxy-A9-2018-Black.png', 1120000, '', 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(7, 3, 'Đệm hơi LC138', 'Samsung-Galaxy-J2-Core-Gold.png', 750000, '', 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(8, 3, 'Đệm hơi LC389', 'Samsung-Galaxy-J4-Core-Black.png', 950000, '', 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(9, 3, 'Đệm hơi LC5789', 'Samsung-Galaxy-S9-Plus-64GB-Orchid-Gray.png', 1000000, '', 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(10, 4, 'Máy đo tiểu đường CareSen Premium', 'Samsung-Galaxy-S9-Plus-Black-128GB.png', 1250000, '', 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(11, 4, 'Máy đo tiểu đường CareSen N', 'Nokia-1-red.png', 950000, '', 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(12, 4, 'Máy đo tiểu đường On Call Plus', 'Nokia-3.1-Black.png', 1000000, '', 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(13, 5, 'Que thử CareSen', 'Nokia-6.1-Plus-Blue.png', 180000, '', 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(14, 5, 'Que thử On Call Plus', 'Nokia-6.1-Plus-White.png', 150000, '', 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(15, 5, 'Que thử Safe Accu', 'Nokia-150-White.png', 200000, '', 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(16, 6, 'Nhiệt độ kẹp nách OMRON MC246', 'OPPO-A3s–16GB-Red.png', 115000, '', 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(17, 6, 'Nhiệt độ kẹp nách Microlife MT200', 'OPPO-A7-64GB-Blue.png', 200000, '', 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(18, 6, 'Nhiệt độ đo trán OMRON MC720', 'OPPO-F7-128GB-Black.png', 955000, '', 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(19, 7, 'Máy đo nồng độ oxy trong máu KANEKO A320', 'OPPO-F9-Sunrise-Red.png', 900000, '', 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(20, 8, 'Máy trợ thính RIONET HA-20DX', 'OPPO-R17-Pro-Lavender.png', 1280000, '', 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(21, 8, 'Máy trợ thính RIONET HB-23P', 'Xiaomi-Mi-8-Pro-Black.png', 2150000, '', 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(22, 8, 'Máy trợ thính RIONET HM-04', 'Xiaomi-Mi-A1-Black.png', 3700000, '', 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(24, 10, 'Huyết áp cơ B.Well kèm tai nghe ', 'Xiaomi-Mi-Max-3-Ram-4–64GB-Black.png', 420000, '', 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(25, 10, 'Huyết áp cơ Microlife kèm tai nghe', 'Xiaomi-Redmi-Note-6-Pro–32GB-Blue.png', 350000, '', 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(31, 1, 'Huyết áp bắp tay HEM 7120', 'banner-5.png', 910000, '5 năm', 1, '<p>cf&ecirc;wty</p>\r\n');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_full` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_pass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `user_full`, `user_mail`, `user_pass`, `user_level`) VALUES
(8, 'Quynh Truong', 'truongquynh0301@gmail.com', '123456', 1),
(9, 'Hà Duy Đô', 'hado2201@gmail.com', '123456', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`),
  ADD UNIQUE KEY `cat_name` (`cat_name`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`ct_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`od_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prd_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_mail` (`user_mail`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `ct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `od_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `prd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
