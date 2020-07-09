-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 23, 2020 lúc 04:26 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `asm-php`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Túi Xách', '2020-06-06', '2020-06-07'),
(2, 'Balo', '2020-06-06', '2020-06-07'),
(3, 'Dép&Guốc', '2020-06-06', '2020-06-07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `user_id`, `product_id`, `content`, `created_at`, `updated_at`) VALUES
(5, 22, 16, '1234', '2020-06-21', '2020-06-21'),
(6, 22, 16, 'abc', '2020-06-21', '2020-06-21'),
(7, 6, 17, 'good', '2020-06-22', '2020-06-22'),
(9, 6, 1, 'good', '2020-06-22', '2020-06-22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phonenumber` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `note` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id`, `id_user`, `address`, `phonenumber`, `date`, `note`, `created_at`, `updated_at`) VALUES
(15, 6, 'Hà Nội', '0963852446', '2020-06-23 08:14:52', '', '2020-06-23', '2020-06-23'),
(16, 22, 'Hà Nội', '0123456789', '2020-06-23 09:07:06', '', '2020-06-23', '2020-06-23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(24, 15, 16, 845000, 1, '2020-06-23', '2020-06-23'),
(25, 15, 1, 600000, 1, '2020-06-23', '2020-06-23'),
(26, 15, 3, 595000, 1, '2020-06-23', '2020-06-23'),
(27, 16, 16, 845000, 1, '2020-06-23', '2020-06-23'),
(28, 16, 13, 795000, 2, '2020-06-23', '2020-06-23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `discount_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `category_id`, `name`, `price`, `discount_price`, `quantity`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 3, 'Dép Mules Satin Phối Nơ', 600000, 0, 100, '<ul>\r\n	<li>Loại sản phẩm: D&eacute;p &amp; Guốc</li>\r\n	<li>Kiểu g&oacute;t: Đế bệt</li>\r\n	<li>Độ cao g&oacute;t: 2 cm</li>\r\n	<li>Loại mũi: B&iacute;t mũi nhọn</li>\r\n	<li>Chất liệu: Satin</li>\r\n	<li>Hoa văn, chi tiết: Một m&agrave;u, đ&iacute;nh nơ trang tr&iacute;</li>\r\n</ul>', 'uploads/50815_1573815806-medium@2x.jpg', '2020-06-07', '2020-06-14'),
(2, 3, 'Hài Họa Tiết Hoa', 645000, 0, 100, '<ul>\r\n	<li>Loại sản phẩm: D&eacute;p &amp; Guốc</li>\r\n	<li>Kiểu g&oacute;t: G&oacute;t đặc biệt</li>\r\n	<li>Độ cao g&oacute;t: 8 cm</li>\r\n	<li>Loại mũi: Hở mũi (mũi vu&ocirc;ng)</li>\r\n	<li>Chất liệu: Da nh&acirc;n tạo &amp; Vải hoa</li>\r\n	<li>Hoa văn, chi tiết: Họa tiết hoa, trang tr&iacute; g&oacute;t kim loại</li>\r\n</ul>', 'uploads/52186_1577689394-medium@2x.png', '2020-06-07', '2020-06-14'),
(3, 3, 'Guốc Cói Quai Cài', 595000, 550000, 100, '<ul>\r\n	<li>Loại sản phẩm: D&eacute;p &amp; Guốc</li>\r\n	<li>Kiểu g&oacute;t: G&oacute;t nhọn</li>\r\n	<li>Độ cao g&oacute;t: 7 cm</li>\r\n	<li>Loại mũi: Hở mũi (mũi vu&ocirc;ng)</li>\r\n	<li>Chất liệu: Da nh&acirc;n tạo &amp; Canvas</li>\r\n	<li>Hoa văn, chi tiết: Một m&agrave;u, phối belt</li>\r\n</ul>', 'uploads/35.jpg', '2020-06-07', '2020-06-14'),
(4, 3, 'Balo 02', 700000, 0, 40, '<p>Description balo 02</p>', 'uploads/8.jpg', '2020-06-07', '2020-06-12'),
(5, 1, 'Túi Hộp Thêu Hoa Lavender', 845000, 800000, 50, '<ul>\r\n	<li>Loại sản phẩm: T&uacute;i X&aacute;ch Tay</li>\r\n	<li>K&iacute;ch thước (d&agrave;i x rộng x cao): 18.8 x 6 x 16.2 cm</li>\r\n	<li>Chất liệu: Da nh&acirc;n tạo &amp; Vải</li>\r\n	<li>Chất liệu d&acirc;y đeo: D&acirc;y da</li>\r\n	<li>Kiểu kh&oacute;a: Kh&oacute;a k&eacute;o</li>\r\n	<li>Hoa văn, chi tiếtPhối m&agrave;u, họa tiết hoa lavender</li>\r\n	<li>K&iacute;ch cỡ: Nhỏ</li>\r\n</ul>', 'uploads/54625_1588833748-medium@2x.jpg', '2020-06-07', '2020-06-14'),
(13, 1, 'Túi Tote - Màu Trắng', 795000, 750000, 0, '<ul>\r\n	<li>Loại sản phẩm: T&uacute;i X&aacute;ch Tay</li>\r\n	<li>K&iacute;ch thước (d&agrave;i x rộng x cao): 24 x 7.4 x 16.5 cm</li>\r\n	<li>Chất liệu: Da nh&acirc;n tạo</li>\r\n	<li>Chất liệu d&acirc;y đeo: D&acirc;y da</li>\r\n	<li>Kiểu kh&oacute;a: Kh&oacute;a k&eacute;o</li>\r\n	<li>Hoa văn, chi tiết: Một m&agrave;u</li>\r\n	<li>Số ngăn1 ngăn lớn , 1 ngăn nhỏ</li>\r\n	<li>K&iacute;ch cỡ: Nhỏ</li>\r\n</ul>', 'uploads/54867_1589340692-medium@2x.jpg', '2020-06-12', '2020-06-14'),
(14, 1, 'Túi Tote  - Màu Xanh Rêu', 895000, 0, 100, '<ul>\r\n	<li>M&atilde; sản phẩm1011TOT0066</li>\r\n	<li>Loại sản phẩmT&uacute;i X&aacute;ch Tay</li>\r\n	<li>K&iacute;ch thước (d&agrave;i x rộng x cao)38 x 13 x 24 cm</li>\r\n	<li>Chất liệuDa nh&acirc;n tạo</li>\r\n	<li>Chất liệu d&acirc;y đeoD&acirc;y da</li>\r\n	<li>Kiểu kh&oacute;aKh&oacute;a k&eacute;o</li>\r\n	<li>Số ngăn1 ngăn lớn, 1 ngăn nhỏ</li>\r\n	<li>K&iacute;ch cỡTrung b&igrave;nh</li>\r\n</ul>', 'uploads/55061_1590743111-medium@2x.jpg', '2020-06-14', '2020-06-14'),
(15, 2, 'BaLo Nắp Khóa Họa Tiết Caro', 845000, 800000, 100, '<ul>\r\n	<li>Loại sản phẩm: Balo</li>\r\n	<li>K&iacute;ch thước (d&agrave;i x rộng x cao): 23.5 x 11.6 x 23 cm</li>\r\n	<li>Chất liệu: Da nh&acirc;n tạo</li>\r\n	<li>Chất liệu d&acirc;y đeo: D&acirc;y da</li>\r\n	<li>Hoa văn, chi tiết: Một m&agrave;u, họa tiết caro</li>\r\n	<li>Số ngăn: 1 ngăn lớn, 5 ngăn nhỏ</li>\r\n	<li>K&iacute;ch cỡ: Nhỏ</li>\r\n</ul>', 'uploads/52377_1577780425-medium@2x.png', '2020-06-14', '2020-06-14'),
(16, 2, 'Balo Phối Khóa Cài Đôi', 845000, 800000, 100, '<ul>\r\n	<li>Loại sản phẩm: Balo</li>\r\n	<li>K&iacute;ch thước (d&agrave;i x rộng x cao): 24 x 15 x 29 cm</li>\r\n	<li>Chất liệu: Da nh&acirc;n tạo</li>\r\n	<li>Chất liệu d&acirc;y đeo: D&acirc;y da</li>\r\n	<li>Hoa văn, chi tiết: Phối m&agrave;u, phối kh&oacute;a c&agrave;i</li>\r\n	<li>Số ngăn: 1 ngăn lớn, 3 ngăn nhỏ</li>\r\n	<li>K&iacute;ch cỡ : Trung b&igrave;nh</li>\r\n</ul>', 'uploads/51335_1575274441-medium@2x.jpg', '2020-06-14', '2020-06-14'),
(17, 2, 'Balo Dây Rút', 650000, 0, 50, '<ul>\r\n	<li>Loại sản phẩm: Balo</li>\r\n	<li>K&iacute;ch thước (d&agrave;i x rộng x cao): 27 x 17.5 x 26 cm</li>\r\n	<li>Chất liệu: Vải bố</li>\r\n	<li>Chất liệu d&acirc;y đeo: D&acirc;y da</li>\r\n	<li>Kiểu kh&oacute;a: D&acirc;y r&uacute;t</li>\r\n	<li>Hoa văn, chi tiết: Một m&agrave;u</li>\r\n	<li>Số ngăn: 1 ngăn lớn, 5 ngăn nhỏ</li>\r\n	<li>K&iacute;ch cỡ: Trung b&igrave;nh</li>\r\n</ul>', 'uploads/30.jpg', '2020-06-14', '2020-06-14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `account` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `account`, `password`, `fullname`, `role`, `created_at`, `updated_at`) VALUES
(6, 'admin', '$2y$10$UlMwWe2LcXYnifsrqY2hzO4O6IFRtNjQwLDUY1sI6B9p/pC9dJQIa', 'hoàng anh', '1', '2020-06-10', '2020-06-23'),
(17, 'vinhvq', '$2y$10$7psGKgPB5tqfq/poApXdReM.EpalYlf81zoyGNm6jVVrvK8J55Uzm', 'vũ quang vinh', '0', '2020-06-12', '2020-06-12'),
(18, 'duynk', '$2y$10$6lirPAL9.4D7zceNa/cfg.YcGFbtwGhlXVP2zKJgOhaqA6ZO8dPRS', 'nguyễn khương duy', '0', '2020-06-12', '2020-06-12'),
(22, 'account', '$2y$10$sLEf54n/hcZWLNZl9oW1pugK75.6LQvf2uDWNPfk.3QZDJD3GBGqm', 'Anhnh', '1', '2020-06-12', '2020-06-23');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
