-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2023 at 10:58 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `orms_db1`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_list`
--

CREATE TABLE `activity_list` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `image_path` text NOT NULL,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity_list`
--

INSERT INTO `activity_list` (`id`, `name`, `description`, `status`, `image_path`, `delete_flag`, `date_created`, `date_updated`) VALUES
(1, 'Mô Tô Nước', 'Xe nước l&agrave; sự kết hợp giữa m&ocirc; t&ocirc; v&agrave; thuyền nhỏ. &Yacute; tưởng tạo ra một phương tiện giao th&ocirc;ng đường thủy như vậy dựa tr&ecirc;n thiết kế của một chiếc catamaran v&agrave; một chiếc xe trượt tuyết. Ban đầu, những lợi &iacute;ch của aquabikes đ&atilde; được những người cứu hộ đ&aacute;nh gi&aacute; cao. Những thiết bị di động n&agrave;y cho ph&eacute;p họ tiếp cận người chết đuối nhanh hơn so với bơi hoặc thuyền cứu hộ cồng kềnh.\r\nTheo thời gian, v&aacute;n trượt m&aacute;y bay phản lực đ&atilde; trở n&ecirc;n phổ biến đối với những vận động vi&ecirc;n s&agrave;nh sỏi đang t&igrave;m kiếm những c&aacute;ch mới để tăng mức adrenaline của họ. Ng&agrave;y nay c&oacute; rất nhiều loại c&ocirc;ng nghệ cấp nước cho hạng mục n&agrave;y. N&oacute; kh&ocirc;ng chỉ được sử dụng cho c&aacute;c cuộc thi đấu thể thao m&agrave; c&ograve;n được sử dụng như một phương tiện giải tr&iacute;, cũng như trong một số cơ cấu quyền lực.', 1, 'uploads/activitys/timthumb.jpg?v=1641618733', 0, '2023-12-14 20:12:13', '2023-12-16 13:41:43');

-- --------------------------------------------------------

--
-- Table structure for table `message_list`
--

CREATE TABLE `message_list` (
  `id` int(30) NOT NULL,
  `fullname` text NOT NULL,
  `contact` text NOT NULL,
  `email` text NOT NULL,
  `message` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservation_list`
--

CREATE TABLE `reservation_list` (
  `id` int(30) NOT NULL,
  `code` varchar(100) NOT NULL,
  `room_id` int(30) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `fullname` text NOT NULL,
  `contact` text NOT NULL,
  `email` text NOT NULL,
  `address` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=Pending, 1 = Confirmed, 2=Cancelled',
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservation_list`
--

INSERT INTO `reservation_list` (`id`, `code`, `room_id`, `check_in`, `check_out`, `fullname`, `contact`, `email`, `address`, `status`, `date_created`, `date_updated`) VALUES
(1, '202201-0001', 2, '2023-12-16', '2023-12-16', 'Hòn Trống Mái', '09123456789', 'jsmith@sample.com', 'Sample Address only.', 1, '2023-12-14 20:43:17', '2023-12-16 14:01:25');

-- --------------------------------------------------------

--
-- Table structure for table `room_list`
--

CREATE TABLE `room_list` (
  `id` int(30) NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL DEFAULT 0,
  `image_path` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_list`
--

INSERT INTO `room_list` (`id`, `name`, `type`, `description`, `price`, `image_path`, `status`, `delete_flag`, `date_created`, `date_updated`) VALUES
(1, 'Phòng 101', 'Đơn', 'Với 37m2 được trang bị điều hòa không khí hiện đại, Premier Deluxe sẽ đem lại sự thoải mái cho khách hàng lưu trú. Căn phòng được bố trí một giường đôi lớn hoặc hai giường đơn, thích hợp cho các cặp đôi hoặc nhóm bạn hai người. Không gian trong phòng không có có quá nhiều nội thất, giúp tối đa diện tích sử dụng. Tổng thể tối giản nhưng rất hài hòa, tinh tế, tạo cảm giác bình yên, thanh tịnh để du khách có thể nghỉ ngơi hiệu quả.\n', 1200000, 'uploads/rooms/1.png?v=1641606821', 1, 0, '2023-12-08 09:53:41', '2023-12-15 14:05:06'),
(2, 'Phòng 102', 'Hai Người', 'Đây là hạng phòng sang trọng và đắt giá nhất tại Hạ Long. Cái tên Presidential chắc chắn là niềm mơ ước của rất nhiều du khách. Căn phòng được chia ra làm các khu vực phòng khách, phòng ngủ, phòng ăn, phòng tắm, phòng làm việc. Mỗi phòng lại được trang bị những trang thiết bị tân tiến phù hợp với các nhu cầu sinh hoạt khác nhau.\n\nNội thất tại Presidential đều thuộc hàng xa xỉ, toát lên sự cao quý, xứng tầm với những vị khách vương giả. Đội ngũ nhân viên chuyên nghiệp phục vụ 24/24 sẽ giúp những du khách đặt phòng có được sự hài lòng tuyệt đối.', 2500000, 'uploads/rooms/2.png?v=1641608206', 1, 0, '2023-12-08 10:16:45', '2023-12-15 14:05:28'),
(3, 'Phòng  103', 'Gia Đình', 'Đây là hạng phòng sang trọng và đắt giá nhất tại Hạ Long. Cái tên Presidential chắc chắn là niềm mơ ước của rất nhiều du khách. Căn phòng được chia ra làm các khu vực phòng khách, phòng ngủ, phòng ăn, phòng tắm, phòng làm việc. Mỗi phòng lại được trang bị những trang thiết bị tân tiến phù hợp với các nhu cầu sinh hoạt khác nhau.\n\nNội thất tại Presidential đều thuộc hàng xa xỉ, toát lên sự cao quý, xứng tầm với những vị khách vương giả. Đội ngũ nhân viên chuyên nghiệp phục vụ 24/24 sẽ giúp những du khách đặt phòng có được sự hài lòng tuyệt đối.', 3500000, 'uploads/rooms/3.png?v=1641608243', 1, 0, '2023-12-08 10:17:23', '2023-12-15 14:05:56'),
(4, 'Phòng 103', 'Hai Người', 'Đây là hạng phòng sang trọng và đắt giá nhất tại Hạ Long. Cái tên Presidential chắc chắn là niềm mơ ước của rất nhiều du khách. Căn phòng được chia ra làm các khu vực phòng khách, phòng ngủ, phòng ăn, phòng tắm, phòng làm việc. Mỗi phòng lại được trang bị những trang thiết bị tân tiến phù hợp với các nhu cầu sinh hoạt khác nhau.\n\nNội thất tại Presidential đều thuộc hàng xa xỉ, toát lên sự cao quý, xứng tầm với những vị khách vương giả. Đội ngũ nhân viên chuyên nghiệp phục vụ 24/24 sẽ giúp những du khách đặt phòng có được sự hài lòng tuyệt đối.', 1300000, 'uploads/rooms/4.png?v=1641608280', 1, 0, '2023-12-08 10:17:59', '2023-12-15 14:05:42'),
(5, 'Phòng  105', 'Hai Người', 'Khách đặt phòng Club Studio được tận hưởng không gian sinh hoạt rộng 55m2 với đầy đủ tiện nghi. Cửa kính lớn trải dài từ trần tới sàn đem đến tầm nhìn hướng rộng ra thành phố hoa lệ và dòng sông Sài Gòn nên thơ.Giường ngủ êm ái và chăn gối mềm mại giúp du khách có giấc ngủ ngon sau một ngày dài. Phòng tắm rộng rãi được bố trí khoa học với bốn khu vực bồn tắm, bồn rửa mặt, buồng tắm đứng và nhà vệ sinh. Nền nhà được lát gạch đen bóng kết hợp với ốp tường tạo nên tổng thể sang trọng.', 1600000, 'uploads/rooms/5.png?v=1641608319', 1, 0, '2023-12-08 10:18:39', '2023-12-15 14:05:47');

-- --------------------------------------------------------

--
-- Table structure for table `system_info`
--

CREATE TABLE `system_info` (
  `id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_info`
--

INSERT INTO `system_info` (`id`, `meta_field`, `meta_value`) VALUES
(1, 'name', 'Quản Lý Khách Sạn'),
(6, 'short_name', 'Nhóm 8 - Quản Lý Khách Sạn'),
(11, 'logo', 'uploads/logo-1641604371.png'),
(13, 'user_avatar', 'uploads/user_avatar.jpg'),
(14, 'cover', 'uploads/FLC-Grand-Hotel-Halong.jpg'),
(15, 'content', 'Array'),
(16, 'email', 'contact@xyz.com'),
(17, 'contact', '0123456789/ 78945632'),
(18, 'from_time', '11:00'),
(19, 'to_time', '21:30'),
(20, 'address', 'Hạ Long City ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `middlename` text DEFAULT NULL,
  `lastname` varchar(250) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `avatar` text DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '0=not verified, 1 = verified',
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `middlename`, `lastname`, `username`, `password`, `avatar`, `last_login`, `type`, `status`, `date_added`, `date_updated`) VALUES
(1, 'Xin Chào', NULL, 'Admin', 'admin', '0192023a7bbd73250516f069df18b500', 'uploads/avatar-1.png?v=1639468007', NULL, 1, 1, '2023-12-14 21:02:37', '2023-12-16 09:29:46'),
(5, 'Claire', NULL, 'Blake', 'cblake', 'abc123', 'uploads/avatar-5.png?v=1641622906', NULL, 2, 1, '2023-12-14 21:21:46', '2023-12-14 17:33:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_list`
--
ALTER TABLE `activity_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_list`
--
ALTER TABLE `message_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation_list`
--
ALTER TABLE `reservation_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `room_list`
--
ALTER TABLE `room_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_info`
--
ALTER TABLE `system_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_list`
--
ALTER TABLE `activity_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `message_list`
--
ALTER TABLE `message_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reservation_list`
--
ALTER TABLE `reservation_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `room_list`
--
ALTER TABLE `room_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `system_info`
--
ALTER TABLE `system_info`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservation_list`
--
ALTER TABLE `reservation_list`
  ADD CONSTRAINT `reservation_list_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `room_list` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
