-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 09, 2021 lúc 09:07 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `midterm`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_desc`) VALUES
(4, 'Máy tính', 'Dell, Lenovo, Asus,...'),
(6, 'Điện thoại', 'Androi hoặc IOS'),
(7, 'Phụ kiện', 'Các loại từ điện thoại đến laptop');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `cmt_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `cmt_content` varchar(255) NOT NULL,
  `cmt_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`cmt_id`, `user_id`, `product_id`, `cmt_content`, `cmt_time`) VALUES
(2, 3, 1, 'Sản phẩm dung tốt, mượt, chiến game OK', '18 tháng 10, 2020'),
(3, 2, 1, 'Dùng tốt', '18 tháng 10, 2020'),
(4, 2, 1, 'Tệ, chơi game giật lag, pin ít, k có camera', '22 tháng 10, 2020'),
(5, 2, 14, 'Mẫu đẹp đó, làm lần mấy con về chơi', '26 tháng 10, 2020'),
(6, 2, 1, '', '9 tháng 11, 2020');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gallery`
--

CREATE TABLE `gallery` (
  `gallery_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `gallery`
--

INSERT INTO `gallery` (`gallery_id`, `product_id`, `img`) VALUES
(8, 15, 'daisy_field_flower_dark_background_125105_1366x768.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderx`
--

CREATE TABLE `orderx` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orderx`
--

INSERT INTO `orderx` (`order_id`, `user_id`, `date`, `lastname`, `name`, `address`, `phone`, `email`) VALUES
(1, 2, '', 'Ly', 'Trúc', 'Đà Nẵng', '2147483647', 'nttl@gmail.com'),
(2, 2, '', 'Ly', 'Trúc', 'Đà Nẵng', '2147483647', 'nttl@gmail.com'),
(3, 3, '28-10-2020', 'Vân ', 'Vân', 'Thanh Khê', '123456788', 'tkkv@gmail.com'),
(4, 9, '31-10-2020', 'Ngọc', 'Cao', 'Lê Duẩn', '69969696', 'nttn@gmeil.cem'),
(5, 10, '01-11-2020', 'Ngân', 'Lê', 'Hòa Khánh Nam', '123456789', 'ntnn@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `order_detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`order_detail_id`, `order_id`, `product_id`, `product_name`, `product_price`, `qty`) VALUES
(7, 1, 3, 'Loa', 99000, 1),
(8, 1, 6, 'Tai nghe', 499000, 1),
(9, 2, 3, 'Loa', 99000, 3),
(10, 3, 9, 'Laptop Apple MacBook Air', 55999999, 1),
(11, 3, 12, 'Webcam', 19999999, 1),
(12, 4, 9, 'Laptop Apple MacBook Air', 55999999, 2),
(13, 4, 15, 'Samsung Galaxy Note 20', 19990000, 1),
(14, 5, 12, 'Webcam', 19999999, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_desc` varchar(255) NOT NULL,
  `product_detail` text NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `product_discount` int(100) NOT NULL,
  `product_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `product_name`, `product_desc`, `product_detail`, `product_price`, `product_discount`, `product_img`) VALUES
(1, 6, 'Iphone 12 Pro', 'abc', '<p>New</p>\r\n', '111111', 100000, 'product_1 - Copy.jpg'),
(3, 7, 'Loa', 'Xịn', '<p>Si&ecirc;u to si&ecirc;u nhạy</p>\r\n', '120000', 99000, 'product_2.jpg'),
(4, 6, 'Ipad', 'Màn hình lớn', '<p>aaaaaaaaaaa</p>\r\n', '1599000', 1399000, 'product_6.jpg'),
(6, 7, 'Tai nghe', 'Như bao tai nghe khác', '<p>ok</p>\r\n', '550000', 499000, 'product_5.jpg'),
(8, 7, 'Bàn phím', 'Phím bình thường', '<p>Xịn</p>\r\n', '300000', 249000, 'product_8.jpg'),
(9, 4, 'Laptop Apple MacBook Air', 'Xịn xịn', '<p>Super mượt</p>\r\n', '59999999', 55999999, 'product_4.jpg'),
(11, 7, 'Máy chơi game', 'Đời mới nhất', '<p>aaa</p>\r\n', '5000000', 4999999, 'product_11.jpg'),
(12, 7, 'Webcam', 'ahihi', '<p>ddđ</p>\r\n', '20000000', 19999999, 'product_9.jpg'),
(14, 6, 'Iphone 12 64GB chính hãng', 'HOT HOT HOT', '<p>M&aacute;y sở hữu m&agrave;n h&igrave;nh&nbsp;<strong>5,4 inch</strong>, c&ocirc;ng nghệ m&agrave;n h&igrave;nh đem đến h&igrave;nh ảnh chi tiết, sắc n&eacute;t.</p>\r\n\r\n<p>M&aacute;y cũng được trang bị cấu h&igrave;nh cao cấp với&nbsp;chip<strong>&nbsp;A14 Bionic</strong>, bộ đ&ocirc;i camera 12MP với nhiều chế độ chụp ảnh đẹp.</p>\r\n', '32000000', 29990000, 'tải xuống.png'),
(15, 6, 'Samsung Galaxy Note 20', 'AAAAAA', '<p><strong>Samsung Galaxy Note 20 (8GB|256GB)</strong>&nbsp;si&ecirc;u phẩm 2020 sở hữu thiết kế phẳng l&igrave; sang trọng, cao cấp với m&agrave;n h&igrave;nh&nbsp;<strong>6.7 inch</strong>, hiệu năng mạnh mẽ bởi chip&nbsp;con chip&nbsp;<strong>Exynos 990.</strong></p>\r\n\r\n<p>M&aacute;y c&ograve;n được trang bị bộ 3 camera với nhiều t&iacute;nh năng, đ&aacute;p ứng tốt nhu cầu người d&ugrave;ng.</p>\r\n', '20990000', 19990000, 'samsung-galaxy-note-20-8gb-256gb_1_3.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`userid`, `username`, `name`, `password`, `role`) VALUES
(1, 'admin', 'TL', '1234', 'admin'),
(2, 'nttl', 'Trúc', '1234', 'khachhang'),
(3, 'tkkv', 'Vân', '1234', 'khachhang'),
(9, 'ngoc', 'Cao', '1234', 'khachhang');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`cmt_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Chỉ mục cho bảng `orderx`
--
ALTER TABLE `orderx`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `order_id` (`order_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `cmt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `orderx`
--
ALTER TABLE `orderx`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `orderx`
--
ALTER TABLE `orderx`
  ADD CONSTRAINT `orderx_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
