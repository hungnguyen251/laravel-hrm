-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 03, 2023 lúc 01:01 PM
-- Phiên bản máy phục vụ: 10.4.25-MariaDB
-- Phiên bản PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `hrm`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `decentralization` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `department` enum('Phòng kĩ thuật','Phòng tổ chức - hành chính','Phòng tài chính - kế toán','Phòng IT','Phòng Marketing') COLLATE utf8_unicode_ci NOT NULL,
  `staff_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `first_name`, `last_name`, `avatar`, `email`, `password`, `phone`, `decentralization`, `status`, `department`, `staff_id`, `created_at`, `updated_at`) VALUES
(13, 'Hùng', 'Nguyễn', '', 'admin@gmail.com', '123456789', '0123456789', 2, 1, 'Phòng IT', 2, '2022-11-07 20:06:11', '2022-11-07 20:06:11'),
(14, 'Trần', 'Văn Sử', 'su.png', 'cto1@gmail.com', '123456789', '0123456789', 1, 0, 'Phòng kĩ thuật', 3, '2022-11-07 20:06:11', '2022-11-07 20:06:11'),
(24, 'Đỗ', 'Thành Huy', '', 'dothanhhuy@gmail.com', '123456', '0392221113', 2, 1, 'Phòng kĩ thuật', 15, '2022-11-19 20:58:59', '2022-11-19 20:58:59'),
(25, 'Phạm', 'Hữu Nghĩa', '', 'admin23@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '03952211', 2, 1, 'Phòng IT', 14, '2022-11-19 21:04:32', '2022-11-19 21:04:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `company_info`
--

CREATE TABLE `company_info` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `tax_code` int(11) NOT NULL,
  `founding_date` date NOT NULL,
  `logo` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `company_info`
--

INSERT INTO `company_info` (`id`, `company_name`, `tax_code`, `founding_date`, `logo`, `address`, `phone`, `email`, `website`) VALUES
(1, 'CÔNG TY CỔ PHẦN GV ASIA', 109212059, '2020-06-05', 'logo-gv.jpg', 'TDP số 6 Phú Mỹ, Phường Mỹ Đình 2, Quận Nam Từ Liêm, Thành phố Hà Nội, Việt Nam', 1900299284, 'service@gv.com.vn', 'https://g-v.asia/');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `department_info`
--

CREATE TABLE `department_info` (
  `id` int(11) NOT NULL,
  `department_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `department_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `editor` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `department_info`
--

INSERT INTO `department_info` (`id`, `department_code`, `department_name`, `note`, `author`, `editor`, `created_at`, `updated_at`) VALUES
(20, 'MBP1569204111', 'Phòng tổ chức - hành chính', '', 'Hùng Nguyễn', 'Nguyễn Mạnh Hùng', '2022-09-23 09:01:51', '2022-09-23 09:03:00'),
(21, 'MBP1569204120', 'Phòng kinh doanh', '', 'Hùng Nguyễn', 'Hùng Nguyễn', '2022-09-23 09:02:00', '2022-09-23 09:02:00'),
(22, 'MBP1569204129', 'Phòng tài chính - kế toán', '', 'Hùng Nguyễn', 'Nguyễn Mạnh Hùng', '2022-09-23 09:02:09', '2022-09-23 09:03:56'),
(23, 'MBP1569204142', 'Phòng IT', '', 'Hùng Nguyễn', 'Hùng Nguyễn', '2022-09-23 09:02:22', '2022-09-23 09:02:22'),
(24, 'MBP1569204214', 'Phòng Marketing', '', 'Hùng Nguyễn', 'Hùng Nguyễn', '2022-09-23 09:03:34', '2022-09-23 09:03:34'),
(25, 'MBP1569204303', 'Phòng kĩ thuật', '', 'Hùng Nguyễn', 'Hùng Nguyễn', '2022-09-23 09:05:03', '2022-09-23 09:05:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `descentralization`
--

CREATE TABLE `descentralization` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `descentralization`
--

INSERT INTO `descentralization` (`id`, `name`) VALUES
(1, 'Quản trị viên'),
(2, 'Nhân viên'),
(3, 'Kế toán');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diploma`
--

CREATE TABLE `diploma` (
  `id` int(11) NOT NULL,
  `diploma_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `diploma_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `editor` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `diploma`
--

INSERT INTO `diploma` (`id`, `diploma_code`, `diploma_name`, `note`, `author`, `editor`, `created_at`, `updated_at`) VALUES
(0, 'MBC1569664716', 'Bằng tốt nghiệp THPT', '', 'Nguyễn Mạnh Hùng', 'Nguyễn Mạnh Hùng', '2022-09-28 16:58:36', '2022-09-28 16:58:36'),
(1, 'MBC1569651987', 'Bằng cử nhân', '', 'Nguyễn Mạnh Hùng', 'Nguyễn Mạnh Hùng', '2022-09-28 13:26:27', '2022-09-28 13:26:27'),
(2, 'MBC1569652012', 'Bằng thạc sĩ', '', 'Nguyễn Mạnh Hùng', 'Nguyễn Mạnh Hùng', '2022-09-28 13:26:52', '2022-09-28 13:26:52'),
(3, 'MBC1569652035', 'Bằng tiến sĩ', '', 'Nguyễn Mạnh Hùng', 'Nguyễn Mạnh Hùng', '2022-09-28 13:27:15', '2022-09-28 13:27:15'),
(4, 'MBC1569652169', 'Bằng kĩ sư', '', 'Nguyễn Mạnh Hùng', 'Nguyễn Mạnh Hùng', '2022-09-28 13:29:29', '2022-09-28 13:29:29'),
(5, 'MBC1569652180', 'Cử nhân khoa học tự nhiên', '', 'Nguyễn Mạnh Hùng', 'Nguyễn Mạnh Hùng', '2022-09-28 13:29:40', '2022-09-28 13:29:40'),
(8, 'MBC1569652431', 'Cử nhân quản trị kinh doanh', '', 'Nguyễn Mạnh Hùng', 'Nguyễn Mạnh Hùng', '2022-09-28 13:33:51', '2022-09-28 13:33:51'),
(9, 'MBC1569652436', 'Cử nhân thương mại và quản trị', '', 'Nguyễn Mạnh Hùng', 'Nguyễn Mạnh Hùng', '2022-09-28 13:33:56', '2022-09-28 13:33:56'),
(10, 'MBC1569652441', 'Cử nhân kế toán', '', 'Nguyễn Mạnh Hùng', 'Nguyễn Mạnh Hùng', '2022-09-28 13:34:01', '2022-09-28 13:34:01'),
(11, 'MBC1569652448', 'Cử nhân luật', '', 'Nguyễn Mạnh Hùng', 'Nguyễn Mạnh Hùng', '2022-09-28 13:34:08', '2022-09-28 13:34:08'),
(12, 'MBC1569652456', 'Cử nhân ngành quản trị và chính sách công', '', 'Nguyễn Mạnh Hùng', 'Nguyễn Mạnh Hùng', '2022-09-28 13:34:16', '2022-09-28 13:34:16'),
(13, 'MBC1569652463', 'Thạc sĩ khoa học xã hội', '', 'Nguyễn Mạnh Hùng', 'Nguyễn Mạnh Hùng', '2022-09-28 13:34:23', '2022-09-28 13:34:23'),
(14, 'MBC1569652469', 'Thạc sĩ khoa học tự nhiên', '', 'Nguyễn Mạnh Hùng', 'Nguyễn Mạnh Hùng', '2022-09-28 13:34:29', '2022-09-28 13:34:29'),
(15, 'MBC1569652475', 'Thạc sĩ quản trị kinh doanh', '', 'Nguyễn Mạnh Hùng', 'Nguyễn Mạnh Hùng', '2022-09-28 13:34:35', '2022-09-28 13:34:35'),
(16, 'MBC1569652481', 'Thạc sĩ kế toán', '', 'Nguyễn Mạnh Hùng', 'Nguyễn Mạnh Hùng', '2022-09-28 13:34:41', '2022-09-28 13:56:55'),
(21, 'MBC1569652482', 'Thạc sĩ xây dựng', '', 'Nguyễn Mạnh Hùng', 'Nguyễn Mạnh Hùng', '2022-09-28 13:34:41', '2022-09-28 13:56:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ethnicity`
--

CREATE TABLE `ethnicity` (
  `id` int(11) NOT NULL,
  `ethnicity_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ethnicity`
--

INSERT INTO `ethnicity` (`id`, `ethnicity_name`) VALUES
(1, 'Kinh'),
(2, 'Khơ-me'),
(3, 'Mường'),
(4, 'Thổ'),
(5, 'H\'Mông'),
(6, 'Ê-đê'),
(7, 'Bố Y'),
(8, 'Lào'),
(9, 'Tày'),
(10, 'Thái'),
(11, 'Nùng'),
(12, 'Khơ-mú'),
(13, 'M\'Nông'),
(14, 'Xơ Đăng'),
(15, 'Chăm'),
(16, 'Gia Rai'),
(17, 'Hoa'),
(18, 'Lô Lô'),
(19, 'Phù Lá');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `group`
--

CREATE TABLE `group` (
  `id` int(11) NOT NULL,
  `group_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `group_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `editor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `group`
--

INSERT INTO `group` (`id`, `group_id`, `group_name`, `description`, `author`, `editor`, `created_at`, `updated_at`) VALUES
(1, 'GRP1571110024', 'Nhóm thu thập', '<p>Nh&oacute;m chuy&ecirc;n thu thập th&ocirc;ng tin kh&aacute;ch h&agrave;ng</p>\n', 'Hùng Nguyễn', 'Hùng Nguyễn', '2022-10-15 10:27:23', '2022-10-15 11:37:09'),
(2, 'GRP1571110114', 'Nhóm quản lý dự án', '<p>Thu thập, quản l&yacute; những dự &aacute;n mới, dự &aacute;n đang thực hiện</p>\r\n', 'Hùng Nguyễn', 'Hùng Nguyễn', '2022-10-15 10:28:48', '2022-10-15 11:30:45'),
(4, 'GRP1571110761', 'Nhóm đang công tác', '', 'Hùng Nguyễn', '', '2022-10-15 10:39:38', '0000-00-00 00:00:00'),
(5, 'GRP1571110790', 'Nhóm tổ chức sự kiện', '', 'Hùng Nguyễn', '', '2022-10-15 10:40:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `group_detail`
--

CREATE TABLE `group_detail` (
  `id` int(11) NOT NULL,
  `group_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `staff_id` int(11) NOT NULL,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `group_detail`
--

INSERT INTO `group_detail` (`id`, `group_id`, `staff_id`, `author`, `created_at`) VALUES
(1, 'GRP1571110024', 11, 'Hùng Nguyễn', '2022-10-15 11:39:22'),
(2, 'GRP1571110024', 10, 'Hùng Nguyễn', '2022-10-15 11:42:07'),
(3, 'GRP1571110024', 5, 'Hùng Nguyễn', '2022-10-15 11:56:45'),
(8, 'GRP1571110761', 5, 'Hùng Nguyễn', '2022-10-15 12:09:33'),
(9, 'GRP1571110761', 4, 'Hùng Nguyễn', '2022-10-15 12:09:38'),
(17, 'GRP1571110790', 11, 'Hùng Nguyễn', '2022-10-15 14:48:47'),
(18, 'GRP1571110790', 13, 'Hùng Nguyễn', '2022-10-15 14:48:50'),
(19, 'GRP1571110790', 3, 'Hùng Nguyễn', '2022-10-15 14:48:56'),
(20, 'GRP1571110114', 10, 'Hùng Nguyễn', '2022-10-15 14:49:08'),
(21, 'GRP1571110114', 5, 'Hùng Nguyễn', '2022-10-15 14:49:12'),
(22, 'GRP1571110114', 3, 'Hùng Nguyễn', '2022-10-15 14:49:18'),
(23, 'GRP1571110114', 8, 'Hùng Nguyễn', '2022-10-15 14:49:24'),
(24, 'GRP1571110790', 8, 'Hùng Nguyễn', '2022-10-17 08:44:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `level_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `level_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `editor` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `level`
--

INSERT INTO `level` (`id`, `level_code`, `level_name`, `note`, `author`, `editor`, `created_at`, `updated_at`) VALUES
(1, 'MTD1569206480', '1/12', '<p>Tr&igrave;nh độ lớp 1/12</p>\r\n', 'Hùng Nguyễn', 'Hùng Nguyễn', '2022-09-23 09:41:20', '2022-09-23 09:41:20'),
(2, 'MTD1569206546', '2/12', '<p>Tr&igrave;nh độ lớp 2/12</p>\r\n', 'Hùng Nguyễn', 'Hùng Nguyễn', '2022-09-23 09:42:26', '2022-09-23 09:42:26'),
(3, 'MTD1569206555', '3/12', '<p>Tr&igrave;nh độ lớp 3/12</p>\r\n', 'Hùng Nguyễn', 'Hùng Nguyễn', '2022-09-23 09:42:35', '2022-09-23 09:42:35'),
(4, 'MTD1569206570', '4/12', '<p>Tr&igrave;nh độ lớp 4/12</p>\r\n', 'Hùng Nguyễn', 'Hùng Nguyễn', '2022-09-23 09:42:50', '2022-09-23 09:42:50'),
(5, 'MTD1569206579', '5/12', '<p>Tr&igrave;nh độ lớp 5/12</p>\r\n', 'Hùng Nguyễn', 'Hùng Nguyễn', '2022-09-23 09:42:59', '2022-09-23 09:42:59'),
(6, 'MTD1569206590', '6/12', '<p>Tr&igrave;nh độ lớp 6/12</p>\r\n', 'Hùng Nguyễn', 'Hùng Nguyễn', '2022-09-23 09:43:10', '2022-09-23 09:43:10'),
(7, 'MTD1569206604', '7/12', '<p>Tr&igrave;nh độ lớp 7/12</p>\r\n', 'Hùng Nguyễn', 'Hùng Nguyễn', '2022-09-23 09:43:24', '2022-09-23 09:57:09'),
(8, 'MTD1569206616', '8/12', '<p>Tr&igrave;nh độ lớp 8/12</p>\r\n', 'Hùng Nguyễn', 'Hùng Nguyễn', '2022-09-23 09:43:36', '2022-09-23 09:43:36'),
(9, 'MTD1569206628', '9/12', '<p>Tr&igrave;nh độ lớp 9/12</p>\r\n', 'Hùng Nguyễn', 'Hùng Nguyễn', '2022-09-23 09:43:48', '2022-09-23 09:43:48'),
(10, 'MTD1569206638', '10/12', '<p>Tr&igrave;nh độ lớp 10/12</p>\r\n', 'Hùng Nguyễn', 'Hùng Nguyễn', '2022-09-23 09:43:58', '2022-09-23 09:43:58'),
(11, 'MTD1569206649', '11/12', '<p>Tr&igrave;nh độ lớp 11/12</p>\r\n', 'Hùng Nguyễn', 'Hùng Nguyễn', '2022-09-23 09:44:09', '2022-09-23 09:56:56'),
(12, 'MTD1569206662', '12/12', '<p>Tr&igrave;nh độ lớp 12/12</p>\r\n', 'Hùng Nguyễn', 'Hùng Nguyễn', '2022-09-23 09:44:22', '2022-09-23 10:51:16'),
(15, 'MTD1569651298', 'Trung cấp', '', 'Hùng Nguyễn', 'Hùng Nguyễn', '2022-09-28 13:14:58', '2022-09-28 13:14:58'),
(16, 'MTD1569651304', 'Cao đẳng', '', 'Hùng Nguyễn', 'Hùng Nguyễn', '2022-09-28 13:15:04', '2022-09-28 13:15:04'),
(17, 'MTD1569651310', 'Đại học', '', 'Hùng Nguyễn', 'Hùng Nguyễn', '2022-09-28 13:15:10', '2022-09-28 13:15:10'),
(18, 'MTD1569651317', 'Cao học', '', 'Hùng Nguyễn', 'Hùng Nguyễn', '2022-09-28 13:15:17', '2022-09-28 13:15:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `marriage_status`
--

CREATE TABLE `marriage_status` (
  `id` int(11) NOT NULL,
  `marriage_status_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `marriage_status`
--

INSERT INTO `marriage_status` (`id`, `marriage_status_name`) VALUES
(1, 'Độc thân'),
(2, 'Đính hôn'),
(3, 'Có gia đình'),
(4, 'Ly thân'),
(5, 'Ly hôn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mission`
--

CREATE TABLE `mission` (
  `id` int(11) NOT NULL,
  `mission_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `staff_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `object` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `editor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `mission`
--

INSERT INTO `mission` (`id`, `mission_code`, `staff_id`, `start_date`, `end_date`, `location`, `object`, `note`, `author`, `editor`, `created_at`, `updated_at`) VALUES
(1, 'MCT1570351884', 3, '2022-10-06', '2022-12-06', 'Cần Thơ', '<p>Đi khảo s&aacute;t t&igrave;nh h&igrave;nh c&aacute;c c&ocirc;ng ty lớn</p>\r\n', '', 'Nguyễn Mạnh Hùng', '', '2022-10-06 15:51:24', '0000-00-00 00:00:00'),
(3, 'MCT1570352254', 4, '2022-10-06', '2022-12-06', 'Phú Quốc', '<p>Khảo s&aacute;t t&igrave;nh h&igrave;nh c&aacute;c qu&aacute;n b&aacute;n hải sản ở Ph&uacute; Quốc</p>\r\n', '', 'Nguyễn Mạnh Hùng', '', '2022-10-06 15:57:34', '0000-00-00 00:00:00'),
(5, 'MCT1570353978', 5, '2022-10-08', '2022-10-10', 'Cần Thơ', '<p>Đi chơi</p>\r\n', '', 'Nguyễn Mạnh Hùng', 'Nguyễn Mạnh Hùng', '2022-10-06 16:26:18', '2022-10-06 16:54:16'),
(6, 'MCT1571039527', 10, '2022-10-14', '2022-12-11', 'Phú Quốc', '<p>Đi chơi Vinpearl Land để t&igrave;m hiểu t&igrave;nh h&igrave;nh</p>\r\n', '', 'Nguyễn Mạnh Hùng', '', '2022-10-14 14:52:07', '0000-00-00 00:00:00'),
(7, 'MCT1571106674', 11, '2022-10-15', '2022-11-15', 'Hà Nội', '<p>Đi khảo s&aacute;t</p>\r\n', '', 'Nguyễn Mạnh Hùng', '', '2022-10-15 09:31:14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nationality`
--

CREATE TABLE `nationality` (
  `id` int(11) NOT NULL,
  `nationality_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nationality`
--

INSERT INTO `nationality` (`id`, `nationality_name`) VALUES
(1, 'Danish'),
(2, 'Đan Mạch'),
(3, 'British / English'),
(4, 'Anh'),
(5, 'Estonian'),
(6, 'Estonia'),
(7, 'Finnish'),
(8, 'Phần Lan'),
(9, 'Icelandic'),
(10, 'Irish'),
(11, 'Ireland'),
(12, 'Latvian'),
(13, 'Latvia'),
(14, 'Lithuanian'),
(15, 'Norwegian'),
(16, 'Na Uy'),
(17, 'Canada'),
(18, 'Scotland'),
(19, 'Thụy Điển'),
(20, 'Tây Ban Nha'),
(21, 'Séc'),
(22, 'Ba Lan'),
(23, 'Mỹ'),
(24, 'Việt Nam'),
(25, 'Ấn Độ'),
(26, 'Trung Quốc'),
(27, 'Mông Cổ'),
(28, 'Triều Tiên'),
(29, 'Đài Loan'),
(30, 'Campuchia'),
(31, 'Indonesia'),
(32, 'Lào'),
(33, 'Philipin'),
(34, 'Thái Lan');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text DEFAULT NULL,
  `staff_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `status` enum('waiting','approve','cancel') NOT NULL DEFAULT 'waiting',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `notification`
--

INSERT INTO `notification` (`id`, `title`, `content`, `staff_id`, `author`, `department`, `status`, `created_at`, `updated_at`) VALUES
(9, 'Đơn xin nghỉ phép', 'Nghỉ từ : Sáng 23/04/2342, Đến : Chiều 23/04/23yy, Số ngày nghỉ : dsfdsf, Lý do : Nghỉ phép năm, Bàn giao công việc : 234234', 2, 'Hùng Nguyễn', 'Phòng IT', 'approve', '2022-11-20 13:09:21', '2022-11-20 13:09:21'),
(10, 'Đơn xin nghỉ phép', 'Nghỉ từ : Sáng , Đến : Chiều , Số ngày nghỉ : , Lý do : Nghỉ phép năm, Bàn giao công việc : ', 2, 'Hùng Nguyễn', 'Phòng IT', 'approve', '2022-11-20 13:12:44', '2022-11-20 13:12:44'),
(11, 'Đơn xin nghỉ phép', 'Nghỉ từ : Sáng , Đến : Chiều , Số ngày nghỉ : , Lý do : Nghỉ phép năm, Bàn giao công việc : ', 2, 'Hùng Nguyễn', 'Phòng IT', 'cancel', '2022-11-20 13:14:57', '2022-11-20 13:14:57'),
(13, 'Đơn xin nghỉ phép', 'Nghỉ từ : Sáng 31/03/2131, Đến : Chiều 24/03/2423, Số ngày nghỉ : fdgfg, Lý do : Nghỉ phép năm, Bàn giao công việc : tét', 2, 'Hùng Nguyễn', 'Phòng IT', 'waiting', '2022-11-20 13:19:21', '2022-11-20 13:19:21'),
(14, 'Đơn xin nghỉ phép', 'Nghỉ từ : Sáng 11/11/1112, Đến : Chiều 22/02/2222, Số ngày nghỉ : 2, Lý do : Nghỉ phép năm, Bàn giao công việc : test', 2, 'Hùng Nguyễn', 'Phòng IT', 'waiting', '2022-11-21 01:49:19', '2022-11-21 01:49:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `position`
--

CREATE TABLE `position` (
  `id` int(11) NOT NULL,
  `position_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `position_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `salary_per_day` double NOT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author` varchar(50) COLLATE utf8_unicode_ci DEFAULT 'Hùng Nguyễn',
  `editor` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `position`
--

INSERT INTO `position` (`id`, `position_code`, `position_name`, `salary_per_day`, `note`, `author`, `editor`, `created_at`, `updated_at`) VALUES
(16, 'MCV1569203762', 'Phó giám đốc', 560000, '', 'Nguyễn Mạnh Hùng', 'Nguyễn Mạnh Hùng', '2022-09-23 08:56:02', '2022-10-01 16:33:10'),
(17, 'MCV1569203773', 'Giám đốc', 600000, '', 'Nguyễn Mạnh Hùng', 'Nguyễn Mạnh Hùng', '2022-09-23 08:56:13', '2022-10-02 09:59:00'),
(33, 'MCV1569204007', 'Nhân viên', 230000, '', 'Nguyễn Mạnh Hùng', 'Nguyễn Mạnh Hùng', '2022-09-23 09:00:07', '2022-10-01 16:20:43'),
(37, 'MCV1569985216', 'Trưởng phòng', 310000, '', 'Nguyễn Mạnh Hùng', 'Nguyễn Mạnh Hùng', '2022-10-02 10:00:16', '2022-10-02 10:00:16'),
(38, 'MCV1569985261', 'Phó phòng', 280000, '', 'Nguyễn Mạnh Hùng', 'Nguyễn Mạnh Hùng', '2022-10-02 10:01:01', '2022-10-02 10:01:01'),
(39, 'MCV1571105797', 'Marketing', 285000, '', 'Nguyễn Mạnh Hùng', 'Nguyễn Mạnh Hùng', '2022-10-15 09:16:37', '2022-10-15 09:16:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `religion`
--

CREATE TABLE `religion` (
  `id` int(11) NOT NULL,
  `religion_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `religion`
--

INSERT INTO `religion` (`id`, `religion_name`) VALUES
(0, 'Không'),
(1, 'Phật giáo'),
(2, 'Thiên chúa giáo'),
(3, 'Đạo tin lành'),
(4, 'Hồi giáo'),
(5, 'Do Thái giáo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reward_discipline`
--

CREATE TABLE `reward_discipline` (
  `id` int(11) NOT NULL,
  `reward_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `decision_number` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `decision_date` date NOT NULL,
  `staff_id` int(11) NOT NULL,
  `reward_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rewardType_id` int(11) NOT NULL,
  `reward_form` tinyint(1) NOT NULL,
  `amount` double NOT NULL,
  `flag` tinyint(1) NOT NULL,
  `note` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `editor` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `reward_discipline`
--

INSERT INTO `reward_discipline` (`id`, `reward_code`, `decision_number`, `decision_date`, `staff_id`, `reward_name`, `rewardType_id`, `reward_form`, `amount`, `flag`, `note`, `author`, `editor`, `created_at`, `updated_at`) VALUES
(1, 'MKT1571286726', 'DHK/1146', '2022-10-17', 2, 'Khen thưởng nhân viên năng động', 6, 0, 240000, 1, '<p>Thưởng trong th&aacute;ng</p>\r\n', 'Nguyễn Mạnh Hùng', 'Nguyễn Mạnh Hùng', '2022-10-17 11:32:06', '2022-10-18 10:33:44'),
(2, 'MKT1571286771', 'DHK/1145', '2022-10-17', 4, 'Khen thưởng nhân viên chăm chỉ', 7, 0, 400000, 1, '', 'Nguyễn Mạnh Hùng', 'Nguyễn Mạnh Hùng', '2022-10-17 11:32:51', '2022-10-18 10:33:31'),
(3, 'MKT1571286857', 'DKT/1144', '2022-10-17', 12, 'Khen thưởng nhân viên tốt', 5, 1, 325000, 1, '', 'Nguyễn Mạnh Hùng', 'Nguyễn Mạnh Hùng', '2022-10-17 11:34:17', '2022-10-18 10:33:19'),
(7, 'MKT1571365640', 'DHK/1143', '2022-10-14', 5, 'Khen thưởng nhân viên hiếu động', 7, 1, 360000, 1, '<p>Thưởng cho th&agrave;nh phần hiếu động</p>\r\n', 'Nguyễn Mạnh Hùng', 'Nguyễn Mạnh Hùng', '2022-10-18 09:27:20', '2022-10-18 10:32:44'),
(9, 'MKL1571368523', 'DKT/5933', '2022-10-18', 12, 'Chuyên đi trễ', 15, 0, 25000, 0, '', 'Nguyễn Mạnh Hùng', 'Nguyễn Mạnh Hùng', '2022-10-18 10:15:23', '2022-10-18 10:15:23'),
(11, 'MKL1571369398', 'DKT/4421', '2022-10-12', 8, 'Nhân viên chậm chạp', 14, 1, 123000, 0, '<p>Cần c&acirc;n nhắc khi sử dụng nh&acirc;n vi&ecirc;n n&agrave;y.</p>\r\n', 'Nguyễn Mạnh Hùng', 'Nguyễn Mạnh Hùng', '2022-10-18 10:29:58', '2022-10-18 10:30:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reward_type`
--

CREATE TABLE `reward_type` (
  `id` int(11) NOT NULL,
  `reward_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `reward_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `flag` tinyint(1) NOT NULL,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `editor` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `reward_type`
--

INSERT INTO `reward_type` (`id`, `reward_code`, `reward_name`, `note`, `amount`, `flag`, `author`, `editor`, `created_at`, `updated_at`) VALUES
(5, 'LKT1571280354', 'Nhân viên đồng', 'ok', 120000, 1, 'Nguyễn Mạnh Hùng', 'Nguyễn Mạnh Hùng', '2022-10-17 09:45:54', '2022-10-17 09:45:54'),
(6, 'LKT1571280364', 'Nhân viên bạc', '', 200000, 1, 'Nguyễn Mạnh Hùng', 'Nguyễn Mạnh Hùng', '2022-10-17 09:46:04', '2022-10-17 09:46:04'),
(7, 'LKT1571280370', 'Nhân viên vàng', '', 300000, 1, 'Nguyễn Mạnh Hùng', 'Nguyễn Mạnh Hùng', '2022-10-17 09:46:10', '2022-10-17 09:46:10'),
(8, 'LKT1571280376', 'Nhân viên kim cương', '', 400000, 1, 'Nguyễn Mạnh Hùng', 'Nguyễn Mạnh Hùng', '2022-10-17 09:46:16', '2022-10-17 10:38:32'),
(14, 'LKL1571366769', 'Nhân viên đi trễ', 'Nhân viên thường xuyên đi trễ', 500000, 0, 'Nguyễn Mạnh Hùng', 'Nguyễn Mạnh Hùng', '2022-10-18 09:46:09', '2022-10-18 09:46:09'),
(15, 'LKL1571366807', 'Nhân viên nghỉ quá ngày cho phép', 'Nhân viên nghỉ quá 20 ngày', 600000, 0, 'Nguyễn Mạnh Hùng', 'Nguyễn Mạnh Hùng', '2022-10-18 09:46:47', '2022-10-18 09:46:47'),
(19, 'LKL1571367774', 'Nhân viên xuất sắc', '', 700000, 0, 'Nguyễn Mạnh Hùng', 'Nguyễn Mạnh Hùng', '2022-10-18 10:02:54', '2022-10-18 10:03:55'),
(21, 'LKT1599471135', 'Giải buôn chuyện', 'Dành cho người buôn chuyện', 500000, 1, 'Account Admin', 'Account Admin', '2020-09-07 16:32:15', '2020-09-07 16:32:15'),
(24, 'LKL1656398468', 'Nhân viên lười làm', 'test', 2500000, 0, '', '', '2022-11-21 01:30:17', '2022-11-21 01:30:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `salary`
--

CREATE TABLE `salary` (
  `id` int(11) NOT NULL,
  `salary_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `staff_id` int(11) NOT NULL,
  `salary_per_month` double NOT NULL,
  `work_day` int(11) NOT NULL,
  `allowance` double NOT NULL,
  `payment` double NOT NULL,
  `advance` double NOT NULL,
  `received` double NOT NULL,
  `timekeeper` date NOT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `month_salary` int(11) NOT NULL,
  `editor_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `salary`
--

INSERT INTO `salary` (`id`, `salary_code`, `staff_id`, `salary_per_month`, `work_day`, `allowance`, `payment`, `advance`, `received`, `timekeeper`, `note`, `month_salary`, `editor_id`, `created_at`, `updated_at`) VALUES
(3, 'ML1570075152', 10, 18600000, 28, 2260000, 1953000, 1500000, 17407000, '2022-10-03', '', 4, 4, '2022-10-03 10:59:12', '2022-10-03 10:59:12'),
(4, 'ML1570075175', 5, 5750000, 25, 0, 603750, 1500000, 3646250, '2022-10-03', '', 4, 4, '2022-10-03 10:59:35', '2022-10-03 10:59:35'),
(5, 'ML1570075372', 3, 8050000, 30, 1650000, 845250, 1500000, 7354750, '2022-10-03', '', 4, 4, '2022-10-03 11:02:52', '2022-10-03 11:02:52'),
(9, 'ML1570267241', 10, 19800000, 29, 2305000, 2079000, 0, 20026000, '2022-11-05', '', 4, 4, '2022-10-05 16:20:41', '2022-10-05 16:20:41'),
(10, 'ML1570267671', 10, 13800000, 23, 2035000, 1449000, 1200000, 13186000, '2022-12-05', '', 4, 4, '2022-10-05 16:27:51', '2022-10-05 16:27:51'),
(11, 'ML1570267847', 2, 8050000, 30, 1650000, 845250, 500000, 8354750, '2022-08-01', '', 4, 4, '2022-10-05 16:30:47', '2022-10-05 16:30:47'),
(12, 'ML1570267874', 2, 7590000, 29, 1605000, 796950, 0, 8398050, '2022-11-05', '', 4, 4, '2022-10-05 16:31:14', '2022-10-05 16:31:14'),
(13, 'ML1570355932', 8, 9240000, 29, 1805000, 970200, 1000000, 9074800, '2022-10-06', '<p>Nhận tiền mặt</p>\r\n', 12, 12, '2022-10-06 16:58:52', '2022-10-06 16:58:52'),
(14, 'ML1571365486', 12, 4600000, 20, 0, 483000, 0, 4117000, '2022-10-18', '', 12, 12, '2022-10-18 09:24:46', '2022-10-18 09:24:46'),
(15, 'ML1571390955', 8, 9800000, 30, 1850000, 1029000, 0, 10621000, '2022-11-05', '', 1, 1, '2022-10-18 16:29:15', '2022-10-18 16:29:15'),
(16, 'ML1598806041', 3, 3450000, 15, 0, 362250, 0, 3087750, '2020-08-30', '<p>aaaaaa</p>\r\n', 1, 1, '2020-08-30 23:47:21', '2020-08-30 23:47:21'),
(17, 'ML1599471056', 12, 8050000, 30, 0, 845250, 0, 7204750, '2020-09-07', '<p>ok</p>\r\n', 1, 1, '2020-09-07 16:30:56', '2020-09-07 16:30:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `salary_adjustment`
--

CREATE TABLE `salary_adjustment` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `decision_number` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `signature_date` datetime NOT NULL,
  `modification_date` datetime NOT NULL,
  `old_salary_coefficient` double NOT NULL,
  `new_salary_coefficient` double NOT NULL,
  `author_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `editor_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `speciality`
--

CREATE TABLE `speciality` (
  `id` int(11) NOT NULL,
  `speciality_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `speciality_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `editor` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `speciality`
--

INSERT INTO `speciality` (`id`, `speciality_code`, `speciality_name`, `note`, `author`, `editor`, `created_at`, `updated_at`) VALUES
(0, 'MCM1569664640', 'Không', '', 'Nguyễn Mạnh Hùng', 'Nguyễn Mạnh Hùng', '2022-09-28 16:57:20', '2022-09-28 16:57:20'),
(2, 'MCM1569208526', 'Kế toán', '', 'Nguyễn Mạnh Hùng', 'Nguyễn Mạnh Hùng', '2022-09-23 10:15:26', '2022-09-23 10:15:26'),
(3, 'MCM1569208539', 'Công nghệ thông tin', '', 'Nguyễn Mạnh Hùng', 'Nguyễn Mạnh Hùng', '2022-09-23 10:15:39', '2022-09-23 10:15:39'),
(4, 'MCM1569208553', 'Quản trị nhà hàng - khách sạn', '', 'Nguyễn Mạnh Hùng', 'Nguyễn Mạnh Hùng', '2022-09-23 10:15:53', '2022-09-23 10:15:53'),
(5, 'MCM1569208562', 'Tiếp tân', '', 'Nguyễn Mạnh Hùng', 'Nguyễn Mạnh Hùng', '2022-09-23 10:16:02', '2022-09-23 10:16:02'),
(6, 'MCM1569208577', 'Sale', '', 'Nguyễn Mạnh Hùng', 'Nguyễn Mạnh Hùng', '2022-09-23 10:16:17', '2022-09-23 10:16:17'),
(7, 'MCM1569208618', 'Hành chính văn phòng', '', 'Nguyễn Mạnh Hùng', 'Nguyễn Mạnh Hùng', '2022-09-23 10:16:58', '2022-09-23 10:16:58'),
(8, 'MCM1569208631', 'Quản lý chất lượng', '', 'Nguyễn Mạnh Hùng', 'Nguyễn Mạnh Hùng', '2022-09-23 10:17:11', '2022-09-23 10:17:11'),
(9, 'MCM1569208648', 'Thương mại điện tử', '', 'Nguyễn Mạnh Hùng', 'Nguyễn Mạnh Hùng', '2022-09-23 10:17:28', '2022-09-23 10:17:28'),
(10, 'MCM1569208673', 'Tài chính', '', 'Nguyễn Mạnh Hùng', 'Nguyễn Mạnh Hùng', '2022-09-23 10:17:53', '2022-09-23 10:17:53'),
(11, 'MCM1569208680', 'Quản lý', '', 'Nguyễn Mạnh Hùng', 'Nguyễn Mạnh Hùng', '2022-09-23 10:18:00', '2022-09-23 10:18:00'),
(12, 'MCM1569208698', 'Maketing', '', 'Nguyễn Mạnh Hùng', 'Nguyễn Mạnh Hùng', '2022-09-23 10:18:18', '2022-09-28 13:05:19'),
(13, 'MCM1569208705', 'Khởi nghiệp', '', 'Nguyễn Mạnh Hùng', 'Nguyễn Mạnh Hùng', '2022-09-23 10:18:25', '2022-09-23 10:18:25'),
(14, 'MCM1569208731', 'Quản lý nguồn nhân lực', '', 'Nguyễn Mạnh Hùng', 'Nguyễn Mạnh Hùng', '2022-09-23 10:18:51', '2022-09-23 10:18:51'),
(15, 'MCM1569208740', 'Kinh doanh', '', 'Nguyễn Mạnh Hùng', 'Nguyễn Mạnh Hùng', '2022-09-23 10:19:00', '2022-09-23 10:19:00'),
(16, 'MCM1569208758', 'Vận tải và hậu cần', '', 'Nguyễn Mạnh Hùng', 'Nguyễn Mạnh Hùng', '2022-09-23 10:19:18', '2022-09-23 10:19:18'),
(17, 'MCM1569208771', 'Kinh doanh', '', 'Nguyễn Mạnh Hùng', 'Nguyễn Mạnh Hùng', '2022-09-23 10:19:31', '2022-09-23 10:19:31'),
(18, 'MCM1569208782', 'Bán lẻ', '', 'Nguyễn Mạnh Hùng', 'Nguyễn Mạnh Hùng', '2022-09-23 10:19:42', '2022-09-23 10:19:42'),
(22, 'MCM1569208783', 'Trực tổng đài', 'Part-time', 'Nguyễn Mạnh Hùng', 'Nguyễn Mạnh Hùng', '2022-09-23 10:19:42', '2022-09-23 10:19:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `staff_info`
--

CREATE TABLE `staff_info` (
  `id` int(11) NOT NULL,
  `staff_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `staff_fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nickname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` enum('Male','Female') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Male',
  `date_of_birth` date NOT NULL,
  `place_of_birth` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `marriage_code` int(11) NOT NULL,
  `id_number` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `place_issue_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_issue_id` date DEFAULT NULL,
  `domicile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nationality_id` int(11) DEFAULT 24,
  `religion_id` int(11) NOT NULL DEFAULT 0,
  `ethnicity_id` int(11) NOT NULL DEFAULT 1,
  `permanent_residence` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `temporality_residence` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `staff_type_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL DEFAULT 12,
  `speciality_id` int(11) NOT NULL DEFAULT 0,
  `diploma_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `hobby` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_start_work` date NOT NULL DEFAULT current_timestamp(),
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active',
  `author_id` int(11) DEFAULT NULL,
  `editor_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `staff_info`
--

INSERT INTO `staff_info` (`id`, `staff_code`, `avatar`, `staff_fullname`, `nickname`, `gender`, `date_of_birth`, `place_of_birth`, `marriage_code`, `id_number`, `place_issue_id`, `date_issue_id`, `domicile`, `nationality_id`, `religion_id`, `ethnicity_id`, `permanent_residence`, `temporality_residence`, `staff_type_id`, `level_id`, `speciality_id`, `diploma_id`, `department_id`, `position_id`, `hobby`, `date_start_work`, `status`, `author_id`, `editor_id`, `created_at`, `updated_at`) VALUES
(2, 'MNV1569830976', 'avatar-me.png', 'Nguyễn Mạnh Hùng', '', 'Male', '1994-04-30', 'Hà Nội', 2, '371807766', 'Hà Nội', '2016-09-30', '192 Lê Trọng Tấn, Hoàng Mai, Hà Nội', 24, 0, 1, 'Hà Nội', 'Hà Nội', 2, 18, 2, 2, 20, 37, 'Game, Girl', '2022-04-10', 'Active', 4, 1, '2022-09-30 15:09:36', '2020-09-07 16:44:44'),
(3, 'MNV1569831824', '1569831824.jpg', 'Nguyễn Thị Hà Thu', '', 'Female', '1996-09-20', 'Hà Nội', 1, '3718087785', 'Hà Nội', '2016-09-30', 'Hà Nội', 24, 1, 1, 'Rạch Giá - Kiên Giang', 'Rạch Giá - Kiên Giang', 2, 17, 11, 1, 21, 37, NULL, '2022-11-06', 'Active', 4, 4, '2020-08-30 15:23:44', '2020-09-02 10:02:32'),
(4, 'MNV1569833913', '1569833913.jpg', 'Hoàng Diệu Linh', '', 'Female', '1984-09-12', 'Hà Nội', 3, '567423431', 'Hà Nội', '2002-04-23', 'Hà Nội', 24, 0, 1, 'Phú Quốc - Kiên Giang', 'Phú Quốc - Kiên Giang', 2, 18, 15, 2, 22, 37, NULL, '2022-11-06', 'Active', 4, 4, '2020-08-30 15:58:33', '2020-09-03 08:57:41'),
(5, 'MNV1569834099', '1569907854.png', 'Vũ', '', 'Female', '1997-02-12', 'Hà Nội', 1, '378623143', 'Hà Nội', '2004-09-12', 'Hà Nội', 24, 1, 1, 'Châu Thành - Kiên Giang', 'Châu Thành - Kiên Giang', 4, 17, 5, 1, 23, 37, NULL, '2022-11-06', 'Active', 4, 4, '2022-09-30 16:01:39', '2022-10-02 10:02:07'),
(8, 'MNV1569835233', '1569835233.jpg', 'Hằng', '', 'Female', '2000-12-09', 'Hà Nội', 2, '3718087777', 'Hà Nội', '2012-09-30', 'Hà Nội', 24, 0, 1, 'Cà Mau', 'Cà Mau', 3, 17, 5, 1, 24, 37, NULL, '2022-11-06', 'Active', 4, 4, '2022-09-30 16:20:33', '2022-10-02 10:01:14'),
(10, 'MNV1569905940', '1569907839.jpg', 'Hà', '', 'Male', '1980-12-04', 'Hà Nội', 3, '3718087744', 'Hà Nội', '1997-04-02', 'Hà Nội', 24, 3, 1, 'Phú Quốc - Kiên Giang', 'Phú Quốc - Kiên Giang', 2, 17, 14, 4, 25, 37, NULL, '2022-11-06', 'Active', 4, 4, '2022-10-01 11:59:00', '2022-10-02 09:59:30'),
(11, 'MNV1569906116', '1569906116.jpg', 'Kiều Anh', '', 'Male', '1992-09-12', 'Hà Nội', 3, '343214564', 'Hà Nội', '2002-10-20', 'Hà Nội', 24, 0, 18, 'Rạch Giá - Kiên Giang', 'Rạch Giá - Kiên Giang', 3, 18, 7, 11, 24, 33, NULL, '2022-11-06', 'Active', 4, 4, '2022-10-01 12:01:56', '2022-10-02 10:00:31'),
(12, 'MNV1571124337', '1571124337.jpg', 'Nguyễn Tuấn Hùng', '', 'Female', '1997-10-15', 'Hà Nội', 1, '3716024774', 'Hà Nội', '2015-10-15', 'Hà Nội', 24, 0, 1, 'Cần Thơ', 'Châu Thành - Kiên Giang', 4, 17, 9, 1, 20, 33, NULL, '2022-11-06', 'Active', 12, 12, '2022-10-15 14:25:37', '2022-10-15 14:27:02'),
(13, 'MNV1571124772', '1571124834.jpg', 'Vi Luân', '', 'Male', '1990-12-20', 'Hà Nội', 3, '443212354', 'Hà Nội', '2000-12-20', 'Hà Nội', 24, 0, 1, 'Cà Mau', 'Rạch Giá - Kiên Giang', 2, 16, 2, 0, 25, 33, NULL, '2022-11-06', 'Active', 12, 1, '2022-10-15 14:32:52', '2022-10-18 17:19:05'),
(14, 'MNV1571124773', '1571124834.jpg', 'Trương Quỳnh Anh', '', 'Male', '1990-12-20', 'Hà Nội', 3, '443212354', 'Hà Nội', '2000-12-20', 'Hà Nội', 24, 0, 1, 'Cà Mau', 'Rạch Giá - Kiên Giang', 2, 16, 2, 0, 22, 33, NULL, '2022-11-06', 'Active', 12, 1, '2022-10-15 14:32:52', '2022-10-18 17:19:05'),
(15, 'MNV1571124774', '1571124834.jpg', 'Phương', '', 'Male', '1990-12-20', 'Hà Nội', 3, '443212354', 'Hà Nội', '2000-12-20', 'Hà Nội', 24, 0, 1, 'Cà Mau', 'Rạch Giá - Kiên Giang', 2, 16, 2, 0, 25, 33, NULL, '2022-11-06', 'Inactive', 12, 1, '2022-10-15 14:32:52', '2022-10-18 17:19:05'),
(16, 'MNV1571124775', '1571124834.jpg', 'Doãn Nam', '', 'Male', '1990-12-20', 'Hà Nội', 3, '443212354', 'Hà Nội', '2000-12-20', 'Hà Nội', 24, 0, 1, 'Cà Mau', 'Rạch Giá - Kiên Giang', 2, 16, 2, 0, 23, 33, NULL, '2022-11-06', 'Inactive', 12, 1, '2022-10-15 14:32:52', '2022-10-18 17:19:05'),
(17, 'MNV1571124775', '1571124834.jpg', 'Long Thành', '', 'Male', '1990-12-20', 'Hà Nội', 3, '443212354', 'Hà Nội', '2000-12-20', 'Hà Nội', 24, 0, 1, 'Cà Mau', 'Rạch Giá - Kiên Giang', 2, 16, 2, 0, 23, 33, NULL, '2022-11-06', 'Inactive', 12, 1, '2022-10-15 14:32:52', '2022-10-18 17:19:05'),
(19, 'MNV1656398468', 'logo-min.png', 'Hương', 'No name', 'Female', '0000-00-00', NULL, 1, '15095002200', 'Hồ Chí Minh', '0000-00-00', 'Nghệ An', 24, 0, 1, NULL, NULL, 2, 12, 0, 1, 24, 33, 'no', '0000-00-00', 'Active', NULL, NULL, '2022-11-28 23:12:49', '2022-11-28 23:12:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `staff_type`
--

CREATE TABLE `staff_type` (
  `id` int(11) NOT NULL,
  `staff_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `staff_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `editor` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `staff_type`
--

INSERT INTO `staff_type` (`id`, `staff_code`, `staff_name`, `note`, `author`, `editor`, `created_at`, `updated_at`) VALUES
(2, 'LNV1569654834', 'Nhân viên chính thức', 'fulltime', 'Nguyễn Mạnh Hùng', 'Nguyễn Mạnh Hùng', '2022-09-28 14:13:54', '2022-09-28 14:13:54'),
(3, 'LNV1569654844', 'Nhân viên thực tập', 'internship', 'Nguyễn Mạnh Hùng', 'Nguyễn Mạnh Hùng', '2022-09-28 14:14:04', '2022-09-28 14:14:04'),
(4, 'LNV1569654850', 'Nhân viên thời vụ', 'parttime', 'Nguyễn Mạnh Hùng', 'Nguyễn Mạnh Hùng', '2022-09-28 14:14:10', '2022-09-28 14:14:10');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Chỉ mục cho bảng `company_info`
--
ALTER TABLE `company_info`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `department_info`
--
ALTER TABLE `department_info`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `descentralization`
--
ALTER TABLE `descentralization`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `diploma`
--
ALTER TABLE `diploma`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ethnicity`
--
ALTER TABLE `ethnicity`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `group_detail`
--
ALTER TABLE `group_detail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `marriage_status`
--
ALTER TABLE `marriage_status`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `mission`
--
ALTER TABLE `mission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Chỉ mục cho bảng `nationality`
--
ALTER TABLE `nationality`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `religion`
--
ALTER TABLE `religion`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `reward_discipline`
--
ALTER TABLE `reward_discipline`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rewardType_id` (`rewardType_id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Chỉ mục cho bảng `reward_type`
--
ALTER TABLE `reward_type`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Chỉ mục cho bảng `salary_adjustment`
--
ALTER TABLE `salary_adjustment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Chỉ mục cho bảng `speciality`
--
ALTER TABLE `speciality`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `staff_info`
--
ALTER TABLE `staff_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nationality_id` (`nationality_id`),
  ADD KEY `religion_id` (`religion_id`),
  ADD KEY `ethnicity_id` (`ethnicity_id`),
  ADD KEY `staff_type_id` (`staff_type_id`),
  ADD KEY `speciality_id` (`speciality_id`),
  ADD KEY `level_id` (`level_id`),
  ADD KEY `diploma_id` (`diploma_id`),
  ADD KEY `department` (`department_id`),
  ADD KEY `position_id` (`position_id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `editor_id` (`editor_id`);

--
-- Chỉ mục cho bảng `staff_type`
--
ALTER TABLE `staff_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT cho bảng `company_info`
--
ALTER TABLE `company_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `department_info`
--
ALTER TABLE `department_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `descentralization`
--
ALTER TABLE `descentralization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `diploma`
--
ALTER TABLE `diploma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `ethnicity`
--
ALTER TABLE `ethnicity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `group`
--
ALTER TABLE `group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `group_detail`
--
ALTER TABLE `group_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `marriage_status`
--
ALTER TABLE `marriage_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `mission`
--
ALTER TABLE `mission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `nationality`
--
ALTER TABLE `nationality`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `religion`
--
ALTER TABLE `religion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `reward_discipline`
--
ALTER TABLE `reward_discipline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `reward_type`
--
ALTER TABLE `reward_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `salary_adjustment`
--
ALTER TABLE `salary_adjustment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `speciality`
--
ALTER TABLE `speciality`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `staff_info`
--
ALTER TABLE `staff_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `staff_type`
--
ALTER TABLE `staff_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff_info` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `mission`
--
ALTER TABLE `mission`
  ADD CONSTRAINT `mission_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff_info` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `reward_discipline`
--
ALTER TABLE `reward_discipline`
  ADD CONSTRAINT `reward_discipline_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff_info` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reward_discipline_ibfk_2` FOREIGN KEY (`rewardType_id`) REFERENCES `reward_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `salary`
--
ALTER TABLE `salary`
  ADD CONSTRAINT `luong_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff_info` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `salary_adjustment`
--
ALTER TABLE `salary_adjustment`
  ADD CONSTRAINT `salary_adjustment_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff_info` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `staff_info`
--
ALTER TABLE `staff_info`
  ADD CONSTRAINT `nhanvien_ibfk_1` FOREIGN KEY (`nationality_id`) REFERENCES `nationality` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `nhanvien_ibfk_2` FOREIGN KEY (`religion_id`) REFERENCES `religion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `nhanvien_ibfk_3` FOREIGN KEY (`ethnicity_id`) REFERENCES `ethnicity` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `nhanvien_ibfk_4` FOREIGN KEY (`staff_type_id`) REFERENCES `staff_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `nhanvien_ibfk_5` FOREIGN KEY (`level_id`) REFERENCES `level` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `nhanvien_ibfk_6` FOREIGN KEY (`speciality_id`) REFERENCES `speciality` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `nhanvien_ibfk_7` FOREIGN KEY (`diploma_id`) REFERENCES `diploma` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `nhanvien_ibfk_8` FOREIGN KEY (`department_id`) REFERENCES `department_info` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `nhanvien_ibfk_9` FOREIGN KEY (`position_id`) REFERENCES `position` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
