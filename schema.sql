-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 03, 2023 lúc 01:05 PM
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
-- Cơ sở dữ liệu: `laravel-hrm`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `annual_leave`
--

CREATE TABLE `annual_leave` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` int(11) NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `working_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `annual_leave`
--

INSERT INTO `annual_leave` (`id`, `staff_id`, `number`, `working_time`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, '0', '298', NULL, '2023-01-13 15:25:14', '2023-01-15 16:32:30'),
(2, 4, '5.5', '56', NULL, '2023-01-13 16:04:16', '2023-01-15 18:54:49'),
(3, 5, '23', '56', NULL, '2023-01-13 16:08:01', '2023-01-15 19:51:47'),
(4, 22, '0', '0', NULL, '2023-01-20 18:40:43', '2023-01-20 18:40:43'),
(5, 23, '0', '0', NULL, '2023-01-20 18:52:31', '2023-01-20 18:52:31'),
(10, 7, '1', '57', NULL, '2023-02-06 16:30:36', '2023-02-06 16:30:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chats`
--

CREATE TABLE `chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from` bigint(20) NOT NULL,
  `to` bigint(20) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_code` int(11) NOT NULL,
  `founding_date` date NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `companies`
--

INSERT INTO `companies` (`id`, `name`, `tax_code`, `founding_date`, `email`, `phone`, `address`, `logo`, `website`, `created_at`, `updated_at`) VALUES
(1, 'CÔNG TY CỔ PHẦN GV ASIA', 109212059, '2020-06-05', 'services@gv.com.vn', '1900299284', 'dfgfdg', 'logo-gv.jpg', 'https://g-v.asia/', NULL, '2023-01-11 01:36:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `decentralizations`
--

CREATE TABLE `decentralizations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `decentralizations`
--

INSERT INTO `decentralizations` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'staff', '2022-12-20 22:40:58', '2022-12-20 22:40:58'),
(2, 'accountant', '2022-12-20 22:41:20', '2022-12-20 22:41:20'),
(3, 'admin', '2022-12-20 22:41:20', '2022-12-20 22:41:20'),
(4, 'super admin', '2022-12-20 22:41:45', '2022-12-20 22:41:45'),
(5, '', '2023-02-28 23:27:46', '2023-02-28 23:27:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `departments`
--

INSERT INTO `departments` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Phòng IT', '2022-12-20 22:49:45', '2023-01-11 01:40:41'),
(2, 'Phòng kĩ thuật', '2022-12-20 22:49:45', '2022-12-20 22:49:45'),
(3, 'Phòng kế toán', '2022-12-20 22:50:01', '2022-12-20 22:50:01'),
(4, 'Phòng marketing', '2022-12-20 22:50:01', '2022-12-20 22:50:01'),
(5, 'Phòng hành chính - nhân sự', '2022-12-20 22:50:24', '2022-12-20 22:50:24'),
(6, 'Ban lãnh đạo', '2022-12-20 22:50:24', '2022-12-20 22:50:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diplomas`
--

CREATE TABLE `diplomas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `diplomas`
--

INSERT INTO `diplomas` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Bằng tốt nghiệp THPT', '2022-12-20 22:42:14', '2023-01-14 00:01:34'),
(2, 'Bằng cử nhân', '2022-12-20 22:42:14', '2023-01-14 00:01:34'),
(3, 'Bằng kĩ sư', '2022-12-20 22:42:33', '2023-01-14 00:01:34'),
(4, 'Bằng thạc sĩ', '2022-12-20 22:42:33', '2023-01-14 00:01:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `groups`
--

CREATE TABLE `groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `groups`
--

INSERT INTO `groups` (`id`, `name`, `code`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 'test', 'z7D8oYr', 7, '2023-02-11 16:31:22', '2023-02-11 16:31:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `group_participants`
--

CREATE TABLE `group_participants` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `group_participants`
--

INSERT INTO `group_participants` (`id`, `group_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `receiver_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `receiver_id`, `message`, `is_read`, `created_at`, `updated_at`) VALUES
(32, 7, 0, 'sdfsdf', 0, '2023-02-12 12:41:55', '2023-02-12 12:41:55'),
(34, 7, 0, 'sdfsdf', 0, '2023-02-12 12:42:00', '2023-02-12 12:42:00'),
(35, 7, 0, '😃 test 1', 0, '2023-02-12 12:42:07', '2023-02-12 12:42:07'),
(44, 7, 0, 'sdfg', 0, '2023-02-12 13:08:08', '2023-02-12 13:08:08'),
(45, 7, 0, '1111', 0, '2023-02-12 13:12:32', '2023-02-12 13:12:32'),
(46, 7, 3, 'dfgdfg', 0, '2023-02-12 13:14:17', '2023-02-12 13:14:17'),
(47, 7, 6, '123', 0, '2023-02-12 13:16:26', '2023-02-12 13:16:26'),
(48, 7, 4, 'fdg', 0, '2023-02-12 15:19:59', '2023-02-12 15:19:59'),
(49, 7, 4, 'tesst', 0, '2023-02-12 15:20:47', '2023-02-12 15:20:47'),
(50, 7, 4, 'tessst', 0, '2023-02-12 15:29:28', '2023-02-12 15:29:28'),
(51, 11, 1, 'alo', 0, '2023-02-12 15:39:02', '2023-02-12 15:39:02'),
(52, 7, 11, 'hju', 0, '2023-02-12 15:39:26', '2023-02-12 15:39:26'),
(53, 11, 7, 'hello', 0, '2023-02-12 15:39:50', '2023-02-12 15:39:50'),
(54, 7, 11, 'aa', 0, '2023-02-12 15:40:21', '2023-02-12 15:40:21'),
(55, 11, 7, 'ab', 0, '2023-02-12 15:40:47', '2023-02-12 15:40:47'),
(56, 7, 11, 'hju', 0, '2023-02-12 15:42:28', '2023-02-12 15:42:28'),
(57, 7, 11, 'tét', 0, '2023-02-12 15:42:49', '2023-02-12 15:42:49'),
(58, 7, 9, 'sdf', 0, '2023-02-12 18:33:48', '2023-02-12 18:33:48'),
(59, 7, 9, 'sdf', 0, '2023-02-12 18:34:06', '2023-02-12 18:34:06'),
(60, 7, 9, '123', 0, '2023-02-12 18:34:16', '2023-02-12 18:34:16'),
(61, 7, 9, '123', 0, '2023-02-12 18:34:39', '2023-02-12 18:34:39'),
(62, 7, 11, 'tét', 0, '2023-02-12 18:38:46', '2023-02-12 18:38:46'),
(63, 7, 11, '11122', 0, '2023-02-12 18:38:52', '2023-02-12 18:38:52'),
(64, 7, 6, '2132', 0, '2023-02-12 18:39:17', '2023-02-12 18:39:17'),
(65, 7, 0, '4324', 0, '2023-02-12 18:39:30', '2023-02-12 18:39:30'),
(66, 7, 11, '321', 0, '2023-02-12 18:45:52', '2023-02-12 18:45:52'),
(67, 7, 6, 'hehe', 0, '2023-02-12 19:27:53', '2023-02-12 19:27:53'),
(68, 7, 0, 'hju', 0, '2023-02-13 15:14:59', '2023-02-13 15:14:59'),
(69, 11, 0, 'abc', 0, '2023-02-13 15:15:48', '2023-02-13 15:15:48'),
(70, 7, 0, 'ádasdasdasd', 0, '2023-02-13 15:16:01', '2023-02-13 15:16:01'),
(98, 11, 0, 'IE Explorer', 0, '2023-02-13 16:02:58', '2023-02-13 16:02:58'),
(99, 7, 0, 'Chrome', 0, '2023-02-13 16:03:05', '2023-02-13 16:03:05'),
(100, 11, 0, 'IE', 0, '2023-02-13 16:04:12', '2023-02-13 16:04:12'),
(101, 7, 0, 'Chrome', 0, '2023-02-13 16:04:17', '2023-02-13 16:04:17'),
(102, 7, 11, '111', 0, '2023-02-13 16:05:12', '2023-02-13 16:05:12'),
(103, 11, 7, '222', 0, '2023-02-13 16:05:18', '2023-02-13 16:05:18'),
(104, 7, 11, '1111', 0, '2023-02-13 16:05:25', '2023-02-13 16:05:25'),
(105, 11, 7, '2222', 0, '2023-02-13 16:05:33', '2023-02-13 16:05:33'),
(106, 7, 0, 'Cr', 0, '2023-02-13 16:06:50', '2023-02-13 16:06:50'),
(107, 11, 0, 'IE', 0, '2023-02-13 16:06:57', '2023-02-13 16:06:57'),
(108, 11, 7, 'IE', 0, '2023-02-13 16:07:24', '2023-02-13 16:07:24'),
(109, 7, 11, 'Chrome', 0, '2023-02-13 16:07:34', '2023-02-13 16:07:34'),
(110, 11, 7, 'IE', 0, '2023-02-13 16:08:22', '2023-02-13 16:08:22'),
(111, 11, 7, 'last test IE', 0, '2023-02-13 16:12:27', '2023-02-13 16:12:27'),
(112, 7, 11, 'last test Chrome', 0, '2023-02-13 16:12:38', '2023-02-13 16:12:38'),
(113, 11, 7, 'last IE', 0, '2023-02-13 16:18:01', '2023-02-13 16:18:01'),
(114, 7, 1, 'hju', 0, '2023-02-15 18:15:26', '2023-02-15 18:15:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_12_20_203646_create_decentralizations_table', 1),
(6, '2022_12_20_204038_create_staffs_table', 1),
(7, '2022_12_20_205637_create_positions_table', 1),
(8, '2022_12_20_205759_create_departments_table', 1),
(9, '2022_12_20_205817_create_diplomas_table', 1),
(10, '2022_12_20_205938_create_companies_table', 1),
(11, '2022_12_20_210505_create_salaries_table', 1),
(12, '2022_12_20_211114_create_timesheets_table', 1),
(13, '2022_12_20_212740_update_all_table_timestamp', 2),
(14, '2022_12_20_215032_add_notifications_table', 3),
(15, '2023_01_05_214722_modify_column_staffs_table', 4),
(16, '2023_01_06_013836_modify_column_users_table', 5),
(17, '2023_01_06_224357_add_column_users_table', 6),
(18, '2023_01_06_224358_add_column_users_table', 7),
(19, '2023_01_06_225249_add_column_staffs_table', 8),
(20, '2023_01_06_225806_drop_column_user_id_staffs_table', 9),
(21, '2023_01_06_225822_drop_column_user_id_staffs_table', 10),
(22, '2023_01_07_001331_create_rewards_table', 11),
(23, '2023_01_07_011900_add_column_companies_table', 12),
(24, '2023_01_07_011910_add_column_companies_table', 13),
(25, '2023_01_07_220915_modify_column_notifications_table', 14),
(26, '2023_01_09_013832_modify_column_amount_salaries_table', 15),
(27, '2023_01_09_014248_drop_column_allowance_salaries_table', 16),
(28, '2023_01_09_230046_modify_column_amount_timesheet_table', 17),
(29, '2023_01_09_232518_add_column_timesheet_table', 18),
(30, '2023_01_09_235538_add_column_leave_annual_staffs_table', 19),
(31, '2023_01_11_001933_modify_column_received__allowance_advance__timesheet_table', 20),
(32, '2023_01_11_004614_add_column_code_timesheet_table', 21),
(33, '2023_01_13_013920_add_column_ýear_timesheet_table', 22),
(34, '2023_01_13_013920_add_column_year_timesheet_table', 23),
(35, '2023_01_13_021843_add_column_insurance_amount_salaries_table', 24),
(36, '2023_01_13_214952_create_annual_leave_table', 25),
(37, '2023_01_13_214953_create_annual_leave_table', 26),
(38, '2023_01_16_011141_add_column_status_timesheets_table', 27),
(39, '2023_02_04_222919_create_messages_table', 28),
(40, '2023_02_11_225054_create_chats_table', 29),
(41, '2023_02_11_225241_create_group_participants_table', 29),
(42, '2023_02_11_225253_create_groups_table', 29),
(43, '2023_02_11_225605_add_column_messages_table', 29),
(45, '2023_02_12_005128_add_column_receiver_id_messages_table', 30);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) NOT NULL,
  `title` text DEFAULT NULL,
  `content` text NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `department_id` int(11) NOT NULL,
  `status` enum('waiting','approve','refuse') DEFAULT 'waiting',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `notifications`
--

INSERT INTO `notifications` (`id`, `title`, `content`, `user_id`, `department_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ms.2343242ádasd', 'Nihil aspernatur nesciunt deleniti non nihil. Voluptas ipsum accusantium mollitia quod. Ab asperiores animi iure exercitationem ducimus aspernatur maiores.', 4, 1, 'approve', '2023-01-07 21:59:18', '2023-01-08 18:41:47'),
(2, 'Dr.34342', 'Explicabo inventore id qui aliquid cupiditate. Quas perspiciatis iusto assumenda ut. Repudiandae magnam perferendis laudantium unde molestiae ea aut nihil.', 7, 1, 'waiting', '2023-01-07 21:59:18', '2023-01-08 18:42:34'),
(3, 'Dr.', 'Consequatur vel alias modi hic et expedita. Esse fugiat aut quia culpa soluta. Commodi nam non veritatis quam.', 3, 3, 'waiting', '2023-01-07 21:59:18', '2023-01-07 21:59:18'),
(4, 'Prof.', 'Rerum aut consequuntur quibusdam blanditiis omnis quis officia officiis. Modi minima nisi tenetur aut. Totam quia itaque maxime.', 1, 3, 'waiting', '2023-01-07 21:59:18', '2023-01-07 21:59:18'),
(5, 'Mrs.', 'Nihil libero ratione suscipit veniam recusandae. Ipsam assumenda quas harum nesciunt occaecati. Quia alias repellat maiores sunt enim ab. Quidem dolor quia mollitia aut adipisci.', 5, 4, 'waiting', '2023-01-07 21:59:18', '2023-01-07 21:59:18'),
(6, 'Mr.', 'Rem aspernatur eveniet non dolores quia. Dolores autem corporis labore. Non eos et corporis illum ut dolorem temporibus. Aut asperiores id laborum repellat dolorum quia voluptatem et.', 5, 3, 'waiting', '2023-01-07 21:59:18', '2023-01-07 21:59:18'),
(7, 'Prof.', 'Quos cum labore eaque mollitia. Qui vero natus rem fugiat. Veniam perferendis perferendis voluptatum sit dolorem id ab. Maiores perferendis error tenetur omnis.', 5, 3, 'waiting', '2023-01-07 21:59:18', '2023-01-07 21:59:18'),
(8, 'Dr.', 'Fugit est voluptatem ut. Praesentium rem adipisci et quisquam praesentium velit iusto optio. Ea et magni voluptates error voluptatem. In qui vel explicabo ducimus qui est.', 4, 3, 'waiting', '2023-01-07 21:59:18', '2023-01-07 21:59:18'),
(9, 'Dr.', 'Qui iste incidunt soluta ea. Veniam occaecati laborum corrupti maxime cum nisi similique. Officiis aliquam vel sint tempora modi.', 8, 1, 'approve', '2023-01-07 21:59:19', '2023-01-08 19:01:19'),
(10, 'Prof.', 'Dolore architecto laborum cupiditate libero maiores quasi aperiam. Et est quisquam voluptatem a autem. Recusandae assumenda aliquid debitis porro.', 8, 2, 'waiting', '2023-01-07 21:59:19', '2023-01-07 21:59:19'),
(11, 'Prof.', 'Pariatur sapiente doloremque eum quasi harum. Qui omnis voluptatem inventore accusantium corrupti explicabo nobis corrupti. Distinctio architecto modi sequi.', 5, 2, 'waiting', '2023-01-07 21:59:19', '2023-01-07 21:59:19'),
(12, 'Ms.', 'Veniam exercitationem quis quam pariatur fugit aut omnis aut. Aperiam et alias soluta dolorum facere molestias quod. Tenetur voluptatem facilis dicta in vel.', 3, 2, 'waiting', '2023-01-07 21:59:19', '2023-01-07 21:59:19'),
(13, 'Prof.', 'Minima id commodi exercitationem incidunt et. Et est modi et explicabo nemo.', 4, 4, 'waiting', '2023-01-07 21:59:19', '2023-01-07 21:59:19'),
(14, 'Mrs.', 'Sed blanditiis et dolorem laborum quo non sed. Consequatur optio cum ad enim eaque autem. Nulla neque corporis aliquid ipsam itaque provident optio expedita.', 9, 1, 'waiting', '2023-01-07 21:59:19', '2023-01-07 21:59:19'),
(15, 'Prof.', 'Illum amet reprehenderit harum vitae explicabo. Voluptas perferendis expedita architecto ut quas. Id minima autem cumque consequatur accusantium minus.', 9, 2, 'waiting', '2023-01-07 21:59:19', '2023-01-07 21:59:19'),
(16, 'Mrs.', 'Vel possimus est voluptates deleniti. Aut quia ut tempore assumenda corrupti magni rerum. Consequatur ea est dicta.', 9, 4, 'waiting', '2023-01-07 21:59:19', '2023-01-07 21:59:19'),
(17, 'Mr.', 'Voluptatem debitis sunt omnis blanditiis et. Aut occaecati in in sit dolor eveniet. Non sed magnam delectus.', 7, 4, 'waiting', '2023-01-07 21:59:19', '2023-01-07 21:59:19'),
(21, 'ẻt', 'rty', 7, 1, 'refuse', '2023-01-08 18:50:12', '2023-01-08 18:52:13'),
(22, 'xcv', 'xcv', 1, 1, 'waiting', '2023-01-08 20:06:25', '2023-01-08 20:06:25'),
(23, 'sdg', 'dfg', 1, 1, 'waiting', '2023-01-08 20:06:32', '2023-01-08 20:06:32'),
(24, 'ok', 'okookokko', 1, 1, 'waiting', '2023-01-08 20:07:42', '2023-01-08 20:07:42'),
(25, 'sdf', 'sdf', 0, 1, 'waiting', '2023-01-08 20:18:39', '2023-01-08 20:18:39'),
(26, 'sdf', 'sdf', 0, 1, 'refuse', '2023-01-08 20:18:39', '2023-01-08 20:18:39'),
(27, 'dsfdsf', 'sdf', 0, 1, 'waiting', '2023-01-08 20:18:47', '2023-01-08 20:18:47'),
(28, 'dsfdsf', 'sdf', 0, 1, 'refuse', '2023-01-08 20:18:47', '2023-01-08 20:18:47'),
(29, 'sdf', 'sd', 1, 1, 'waiting', '2023-01-08 20:20:13', '2023-01-08 20:20:13'),
(30, 'sdf', 'sd', 1, 1, 'refuse', '2023-01-08 20:20:13', '2023-01-08 20:20:13'),
(31, 'sfsd', 'sdf', 7, 1, 'approve', '2023-01-08 20:20:48', '2023-01-14 01:01:20'),
(32, 'Đơn xin nghỉ phép', 'Nghỉ từ : Sáng 19/11/2022, Đến : Chiều 20/11/2022, Số ngày nghỉ : 2.5, Lý do : Nghỉ phép năm, Bàn giao công việc : kkkk', 7, 1, 'approve', '2022-12-22 20:21:02', '2023-01-08 20:21:02'),
(33, 'Đơn xin nghỉ phép', 'Nghỉ từ : Sáng 19/11/2022, Đến : Chiều 20/11/2022, Số ngày nghỉ : 3, Lý do : Nghỉ phép năm, Bàn giao công việc : kkkk', 7, 1, 'approve', '2022-12-22 20:21:02', '2023-01-08 20:21:02'),
(34, 'Đơn xin nghỉ phép', 'Nghỉ từ : Sáng 19/11/2022, Đến : Chiều 20/11/2022, Số ngày nghỉ : 2, Lý do : Nghỉ phép năm, Bàn giao công việc : kkkk', 7, 1, 'waiting', '2023-02-09 01:01:36', '2023-02-09 01:01:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `positions`
--

CREATE TABLE `positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `positions`
--

INSERT INTO `positions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Nhân viên', '2022-12-20 22:43:18', '2022-12-20 22:43:18'),
(2, 'Phó phòng', '2022-12-20 22:43:18', '2022-12-20 22:43:18'),
(3, 'Team Leader', '2022-12-20 22:43:37', '2022-12-20 22:43:37'),
(4, 'Manager', '2022-12-20 22:43:37', '2022-12-20 22:43:37'),
(5, 'Trưởng phòng', '2022-12-20 22:43:48', '2022-12-20 22:43:48'),
(6, 'Giám đốc', '2022-12-20 22:43:48', '2022-12-20 22:43:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rewards`
--

CREATE TABLE `rewards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prime` double NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `rewards`
--

INSERT INTO `rewards` (`id`, `name`, `prime`, `created_at`, `updated_at`) VALUES
(1, 'Nhân viên xuất sắc', 210002, '0000-00-00 00:00:00', '2023-01-13 17:04:26'),
(2, 'Nhân viên chăm chỉ', 210002, '2023-01-06 17:17:25', '2023-01-13 17:04:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `salaries`
--

CREATE TABLE `salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` int(11) NOT NULL,
  `amount` double(15,2) NOT NULL DEFAULT 0.00,
  `insurance_amount` double(15,2) NOT NULL DEFAULT 5100000.00,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `salaries`
--

INSERT INTO `salaries` (`id`, `staff_id`, `amount`, `insurance_amount`, `note`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 2000000.00, 5100007.00, 'quyết định tăng', NULL, '2022-12-20 22:50:55', '2023-01-16 01:09:26'),
(5, 5, 18796587.00, 5100000.00, NULL, NULL, '2023-01-09 02:01:14', '2023-01-09 02:01:14'),
(6, 4, 8539310.00, 6100000.00, NULL, NULL, '2023-01-09 02:01:14', '2023-01-15 22:50:49'),
(13, 133, 8539310.00, 5100000.00, NULL, NULL, '2023-01-09 02:01:14', '2023-01-09 02:01:14'),
(14, 22, 7000000.00, 5100000.00, NULL, NULL, '2023-01-21 01:40:43', '2023-01-21 01:40:43'),
(15, 23, 7000000.00, 5100000.00, NULL, NULL, '2023-01-21 01:52:31', '2023-01-21 01:52:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `staffs`
--

CREATE TABLE `staffs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('Nam','Nữ') COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('Toàn thời gian','Bán thời gian','Thực tập sinh','Thử việc') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Thử việc',
  `position_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `diploma_id` int(11) NOT NULL,
  `leave_annual` double(8,2) NOT NULL DEFAULT 12.00,
  `marriage_status` enum('Độc thân','Đã kết hôn') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Độc thân',
  `start_date` date NOT NULL,
  `status` enum('active','inactive','suspended') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `staffs`
--

INSERT INTO `staffs` (`id`, `code`, `first_name`, `last_name`, `avatar`, `gender`, `date_of_birth`, `address`, `type`, `position_id`, `department_id`, `diploma_id`, `leave_annual`, `marriage_status`, `start_date`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'GV100', 'Hùng', 'Nguyễn', 'avatar-me.jpg', 'Nam', '1992-04-30', 'Hà Nội', 'Toàn thời gian', 5, 1, 1, 12.00, 'Độc thân', '2022-03-22', 'inactive', NULL, '2022-12-20 22:49:06', '2023-01-08 22:50:26'),
(3, 'GV101', 'Thị Hợp', 'Vũ', 'mi7.jpg', 'Nữ', '2000-04-30', 'Hà Nội', 'Bán thời gian', 5, 2, 1, 12.00, 'Đã kết hôn', '2022-02-22', 'inactive', NULL, '2022-12-20 22:49:06', '2023-01-06 23:07:45'),
(4, 'GV102', 'Thành Huy', 'Đỗ', 'user3-128x128.jpg', 'Nam', '1996-04-30', 'Hà Nội', 'Toàn thời gian', 5, 3, 1, 12.00, 'Độc thân', '2022-02-22', 'active', NULL, '2022-12-20 22:49:06', '2023-01-05 23:35:25'),
(5, 'GV103', 'Nghĩa', 'Đỗ', 'user1-128x128.jpg', 'Nam', '1996-04-30', 'Hà Nội', 'Toàn thời gian', 5, 4, 1, 12.00, 'Độc thân', '2022-02-22', 'active', NULL, '2022-12-20 22:49:06', '2023-01-05 23:46:11'),
(6, 'GV1000', 'Kim Anh', 'Đỗ', 'user1-128x128.jpg', '', '1996-04-30', 'Hà Nội', 'Thực tập sinh', 5, 5, 1, 12.00, 'Độc thân', '2022-02-22', 'inactive', NULL, '2022-12-20 22:49:06', '2023-01-05 02:18:21'),
(7, 'GV1130', 'Quang Mạnh', 'Đỗ', 'user1-128x128.jpg', 'Nam', '1996-04-30', 'Hà Nội', 'Bán thời gian', 1, 1, 1, 12.00, 'Độc thân', '2022-02-22', 'active', NULL, '2022-12-20 22:49:06', '2023-01-11 01:38:46'),
(8, 'GV11320', 'Hà Thu', 'Đỗ', 'avatar-me.jpg', '', '1996-04-30', 'Hà Nội', 'Thử việc', 5, 6, 1, 12.00, 'Độc thân', '2022-02-22', 'inactive', '2023-01-10 18:38:40', '2022-12-20 22:49:06', '2023-01-11 01:38:40'),
(9, '', 'Diệu Linh', 'Đỗ', 'test.png', '', '1996-04-30', 'Hà Nội', '', 1, 1, 1, 12.00, '', '2022-02-22', 'inactive', '2023-01-05 14:59:22', '2022-12-20 22:49:06', '2023-01-03 01:05:02'),
(10, '', 'Văn Chiến', 'Đỗ', 'test.png', '', '1996-04-30', 'Hà Nội', '', 1, 1, 1, 12.00, '', '2022-02-22', 'inactive', '2023-01-02 18:04:51', '2022-12-20 22:49:06', '2023-01-03 01:04:51'),
(11, '', 'Văn Sử', 'Đỗ', 'test.png', '', '1996-04-30', 'Hà Nội', '', 1, 1, 1, 12.00, '', '2022-02-22', 'inactive', '2023-01-02 18:04:33', '2022-12-20 22:49:06', '2023-01-03 01:04:33'),
(12, '', 'Kiều Anh', 'Đỗ', 'test.png', '', '1996-04-30', 'Hà Nội', '', 1, 1, 1, 12.00, '', '2022-02-22', 'inactive', '2023-01-02 18:04:00', '2022-12-20 22:49:06', '2023-01-03 01:04:00'),
(13, 'GV7136', 'sdfsdf', 'df', 'gv7136user1-128x128.jpg', 'Nam', '1995-04-20', 'Số 31 Ngách 473 Ngõ 192 Lê Trọng Tấn', 'Bán thời gian', 1, 1, 1, 12.00, 'Độc thân', '2022-11-19', 'inactive', NULL, '2023-01-05 23:54:00', '2023-01-11 01:59:54'),
(14, 'GV1150', 'Thị Phương', 'Nguyễn', 'fr_desk_hp_VIP-program_w27_22_fix_new.jpg', 'Nữ', '1995-04-20', 'Số 31 Ngách 473 Ngõ 192 Lê Trọng Tấn', 'Bán thời gian', 2, 2, 3, 12.00, 'Đã kết hôn', '2022-11-19', 'inactive', NULL, '2023-01-09 02:52:46', '2023-01-09 02:52:46'),
(15, 'GV3997', 'Văn Chiến', 'Trần', 'avatar5.png', 'Nam', '1995-04-20', '06 Hồ Tùng Mậu', 'Toàn thời gian', 1, 2, 3, 12.00, 'Độc thân', '2022-11-19', 'inactive', NULL, '2023-01-10 00:00:20', '2023-01-10 00:00:20'),
(20, 'GV6651', 'Kiều Anh', 'Đặng', 'user3-128x128.jpg', 'Nam', '1995-04-20', 'Nam Trung Yên, Cầu Giấy, Hà nội', 'Toàn thời gian', 1, 3, 2, 12.00, 'Độc thân', '2022-11-19', 'inactive', NULL, '2023-01-13 23:04:16', '2023-01-13 23:04:16'),
(21, 'GV1574', 'Quang Mạnh', 'Hoàng', 'user1-128x128.jpg', 'Nam', '1995-04-20', 'Tây Mỗ, Hà Nội', 'Toàn thời gian', 6, 1, 3, 12.00, 'Đã kết hôn', '2022-11-19', 'inactive', NULL, '2023-01-13 23:08:01', '2023-01-13 23:08:01'),
(22, 'GV4791', 'Văn A', 'Nguyễn', 'photo3.jpg', 'Nam', '1995-04-20', 'Nguyễn Thị Thập, Hà Nội', 'Toàn thời gian', 1, 1, 1, 12.00, 'Độc thân', '2022-11-19', 'active', NULL, '2023-01-21 01:40:43', '2023-01-21 01:40:43'),
(23, 'GV8592', 'Thị B', 'Nguyễn', 'avatar3.png', 'Nữ', '1995-04-20', 'Nguyễn Thị Thập, Hà Nội', 'Toàn thời gian', 1, 2, 1, 12.00, 'Độc thân', '2022-11-19', 'active', NULL, '2023-01-21 01:52:31', '2023-01-21 01:52:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `timesheets`
--

CREATE TABLE `timesheets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `staff_id` int(11) DEFAULT NULL,
  `salary_id` bigint(20) DEFAULT NULL,
  `allowance` double(15,2) NOT NULL DEFAULT 0.00,
  `work_day` double(5,2) NOT NULL,
  `advance` double(15,2) NOT NULL DEFAULT 0.00,
  `received` double(15,2) NOT NULL DEFAULT 0.00,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `month_leave` double(8,2) NOT NULL DEFAULT 0.00,
  `remaining_leave` double(8,2) NOT NULL DEFAULT 12.00,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('processing','closed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'processing',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `timesheets`
--

INSERT INTO `timesheets` (`id`, `code`, `staff_id`, `salary_id`, `allowance`, `work_day`, `advance`, `received`, `month`, `year`, `month_leave`, `remaining_leave`, `note`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(25, '0', 1, 1, 0.00, 22.00, 0.00, 1790000.00, 12, 2022, 0.00, 0.00, 'Lương tháng 12/2022', 'closed', NULL, '2023-01-11 00:42:34', '2023-01-13 01:51:52'),
(26, '0', 3, 3, 0.00, 22.00, 0.00, 11102030.19, 12, 2022, 0.00, 0.00, 'Lương tháng 12/2022', 'processing', '2023-01-12 18:56:18', '2023-01-11 00:42:34', '2023-01-13 01:56:18'),
(27, '0', 5, 5, 0.00, 22.00, 0.00, 16822945.36, 12, 2022, 0.00, 0.00, 'Lương tháng 12/2022', 'processing', '2023-01-12 18:56:18', '2023-01-11 00:42:34', '2023-01-13 01:56:18'),
(28, '0', 4, 6, 0.00, 22.00, 0.00, 7642682.45, 12, 2022, 0.00, 0.00, 'Lương tháng 12/2022', 'processing', '2023-01-12 18:56:18', '2023-01-11 00:42:34', '2023-01-13 01:56:18'),
(29, '0', 7, 8, 0.00, 22.00, 0.00, 1093888.69, 12, 2022, 0.00, 0.00, 'Lương tháng 12/2022', 'processing', '2023-01-12 18:56:18', '2023-01-11 00:42:34', '2023-01-13 01:56:18'),
(30, '0', 14, 9, 0.00, 22.00, 0.00, 6265002.68, 12, 2022, 0.00, 0.00, 'Lương tháng 12/2022', 'processing', '2023-01-12 18:56:18', '2023-01-11 00:42:34', '2023-01-13 01:56:18'),
(39, 'GV100122022', 1, 1, 0.00, 22.00, 0.00, 1790000.00, 12, 2022, 0.00, 0.00, 'Lương tháng 12/2022', 'closed', '2023-01-13 19:13:58', '2023-01-13 01:56:18', '2023-01-14 02:13:58'),
(40, 'GV101122022', 3, 3, 0.00, 22.00, 0.00, 11102030.19, 12, 2022, 0.00, 0.00, 'Lương tháng 12/2022', 'processing', '2023-01-13 19:13:58', '2023-01-13 01:56:18', '2023-01-14 02:13:58'),
(41, 'GV103122022', 5, 5, 0.00, 22.00, 0.00, 16822945.36, 12, 2022, 0.00, 0.00, 'Lương tháng 12/2022', 'processing', '2023-01-13 19:13:58', '2023-01-13 01:56:18', '2023-01-14 02:13:58'),
(42, 'GV102122022', 4, 6, 0.00, 22.00, 0.00, 7642682.45, 12, 2022, 0.00, 0.00, 'Lương tháng 12/2022', 'processing', '2023-01-13 19:13:58', '2023-01-13 01:56:18', '2023-01-14 02:13:58'),
(43, 'GV7136122022', 7, 8, 0.00, 22.00, 0.00, 1093888.69, 12, 2022, 0.00, 0.00, 'Lương tháng 12/2022', 'processing', '2023-01-13 19:13:58', '2023-01-13 01:56:18', '2023-01-14 02:13:58'),
(44, 'GV1150122022', 14, 9, 0.00, 22.00, 0.00, 6265002.68, 12, 2022, 0.00, 0.00, 'Lương tháng 12/2022', 'processing', '2023-01-13 19:13:58', '2023-01-13 01:56:18', '2023-01-14 02:13:58'),
(45, 'GV3997122022', 15, 10, 0.00, 22.00, 0.00, 7160000.00, 12, 2022, 0.00, 0.00, 'Lương tháng 12/2022', 'processing', '2023-01-13 19:13:58', '2023-01-13 01:56:18', '2023-01-14 02:13:58'),
(46, 'GV100122022', 1, 1, 0.00, 22.00, 0.00, 1790000.00, 12, 2022, 5.50, 8.00, 'Lương tháng 12/2022', 'processing', '2023-01-13 20:25:20', '2023-01-14 03:24:15', '2023-01-14 03:25:20'),
(47, 'GV101122022', 3, 3, 0.00, 22.00, 0.00, 11102030.19, 12, 2022, 0.00, 0.00, 'Lương tháng 12/2022', 'processing', '2023-01-13 20:25:20', '2023-01-14 03:24:15', '2023-01-14 03:25:20'),
(48, 'GV103122022', 5, 5, 0.00, 22.00, 0.00, 16822945.36, 12, 2022, 0.00, 0.00, 'Lương tháng 12/2022', 'processing', '2023-01-13 20:25:20', '2023-01-14 03:24:15', '2023-01-14 03:25:20'),
(49, 'GV102122022', 4, 6, 0.00, 22.00, 0.00, 7642682.45, 12, 2022, 0.00, 0.00, 'Lương tháng 12/2022', 'processing', '2023-01-13 20:25:20', '2023-01-14 03:24:15', '2023-01-14 03:25:20'),
(50, 'GV7136122022', 13, 8, 0.00, 22.00, 0.00, 1093888.69, 12, 2022, 0.00, 0.00, 'Lương tháng 12/2022', 'processing', '2023-01-13 20:25:20', '2023-01-14 03:24:15', '2023-01-14 03:25:20'),
(51, 'GV1150122022', 14, 9, 0.00, 22.00, 0.00, 6265002.68, 12, 2022, 0.00, 0.00, 'Lương tháng 12/2022', 'processing', '2023-01-13 20:25:20', '2023-01-14 03:24:15', '2023-01-14 03:25:20'),
(52, 'GV3997122022', 15, 10, 0.00, 22.00, 0.00, 7160000.00, 12, 2022, 0.00, 0.00, 'Lương tháng 12/2022', 'processing', '2023-01-13 20:25:20', '2023-01-14 03:24:15', '2023-01-14 03:25:20'),
(53, 'GV6651122022', 20, 11, 0.00, 22.00, 0.00, 6265000.00, 12, 2022, 0.00, 10.00, 'Lương tháng 12/2022', 'processing', '2023-01-13 20:25:20', '2023-01-14 03:24:15', '2023-01-14 03:25:20'),
(54, 'GV1574122022', 21, 12, 0.00, 22.00, 0.00, 62650000.00, 12, 2022, 0.00, 24.00, 'Lương tháng 12/2022', 'processing', '2023-01-13 20:25:20', '2023-01-14 03:24:15', '2023-01-14 03:25:20'),
(55, 'GV100122022', 1, 1, 0.00, 22.00, 0.00, 1790000.00, 12, 2022, 5.50, 8.00, 'Lương tháng 12/2022', 'processing', '2023-01-13 20:28:19', '2023-01-14 03:26:20', '2023-01-14 03:28:19'),
(56, 'GV101122022', 3, 3, 0.00, 22.00, 0.00, 11102030.19, 12, 2022, 0.00, 0.00, 'Lương tháng 12/2022', 'processing', '2023-01-13 20:28:19', '2023-01-14 03:26:20', '2023-01-14 03:28:19'),
(57, 'GV103122022', 5, 5, 0.00, 22.00, 0.00, 16822945.36, 12, 2022, 0.00, 0.00, 'Lương tháng 12/2022', 'processing', '2023-01-13 20:28:19', '2023-01-14 03:26:20', '2023-01-14 03:28:19'),
(58, 'GV102122022', 4, 6, 0.00, 22.00, 0.00, 7642682.45, 12, 2022, 0.00, 0.00, 'Lương tháng 12/2022', 'processing', '2023-01-13 20:28:19', '2023-01-14 03:26:20', '2023-01-14 03:28:19'),
(59, 'GV7136122022', 13, 8, 0.00, 22.00, 0.00, 1093888.69, 12, 2022, 0.00, 0.00, 'Lương tháng 12/2022', 'processing', '2023-01-13 20:28:19', '2023-01-14 03:26:20', '2023-01-14 03:28:19'),
(60, 'GV1150122022', 14, 9, 0.00, 22.00, 0.00, 6265002.68, 12, 2022, 0.00, 0.00, 'Lương tháng 12/2022', 'processing', '2023-01-13 20:28:19', '2023-01-14 03:26:20', '2023-01-14 03:28:19'),
(61, 'GV3997122022', 15, 10, 0.00, 22.00, 0.00, 7160000.00, 12, 2022, 0.00, 0.00, 'Lương tháng 12/2022', 'processing', '2023-01-13 20:28:19', '2023-01-14 03:26:20', '2023-01-14 03:28:19'),
(62, 'GV6651122022', 20, 11, 0.00, 22.00, 0.00, 6265000.00, 12, 2022, 0.00, 10.00, 'Lương tháng 12/2022', 'processing', '2023-01-13 20:28:19', '2023-01-14 03:26:20', '2023-01-14 03:28:19'),
(63, 'GV1574122022', 21, 12, 0.00, 22.00, 0.00, 62650000.00, 12, 2022, 0.00, 24.00, 'Lương tháng 12/2022', 'processing', '2023-01-13 20:28:19', '2023-01-14 03:26:20', '2023-01-14 03:28:19'),
(64, 'GV100122022', 1, 1, 0.00, 22.00, 0.00, 1790000.00, 12, 2022, 5.50, 8.00, 'Lương tháng 12/2022', 'processing', '2023-01-13 20:36:02', '2023-01-14 03:35:55', '2023-01-14 03:36:02'),
(65, 'GV103122022', 5, 5, 0.00, 22.00, 0.00, 16822945.36, 12, 2022, 0.00, 0.00, 'Lương tháng 12/2022', 'processing', '2023-01-13 20:36:02', '2023-01-14 03:35:55', '2023-01-14 03:36:02'),
(66, 'GV102122022', 4, 6, 0.00, 22.00, 0.00, 7642682.45, 12, 2022, 0.00, 0.00, 'Lương tháng 12/2022', 'processing', '2023-01-13 20:36:02', '2023-01-14 03:35:55', '2023-01-14 03:36:02'),
(67, 'GV100122022', 1, 1, 0.00, 22.00, 0.00, 1790000.00, 12, 2022, 5.50, 8.00, 'Lương tháng 12/2022', 'processing', '2023-01-13 20:38:14', '2023-01-14 03:36:02', '2023-01-14 03:38:14'),
(68, 'GV103122022', 5, 5, 0.00, 22.00, 0.00, 16822945.36, 12, 2022, 0.00, 0.00, 'Lương tháng 12/2022', 'processing', '2023-01-13 20:38:14', '2023-01-14 03:36:02', '2023-01-14 03:38:14'),
(69, 'GV102122022', 4, 6, 0.00, 22.00, 0.00, 7642682.45, 12, 2022, 0.00, 0.00, 'Lương tháng 12/2022', 'processing', '2023-01-13 20:38:14', '2023-01-14 03:36:02', '2023-01-14 03:38:14'),
(70, 'GV100122022', 1, 1, 0.00, 22.00, 0.00, 1790000.00, 12, 2022, 5.50, 8.00, 'Lương tháng 12/2022', 'processing', '2023-01-14 19:46:32', '2023-01-14 03:38:14', '2023-01-15 02:46:32'),
(71, 'GV103122022', 5, 5, 0.00, 22.00, 0.00, 16822945.36, 12, 2022, 0.00, 0.00, 'Lương tháng 12/2022', 'processing', '2023-01-14 19:46:32', '2023-01-14 03:38:14', '2023-01-15 02:46:32'),
(72, 'GV102122022', 4, 6, 0.00, 22.00, 0.00, 7642682.45, 12, 2022, 0.00, 0.00, 'Lương tháng 12/2022', 'processing', '2023-01-14 19:46:32', '2023-01-14 03:38:14', '2023-01-15 02:46:32'),
(73, 'GV100012023', 1, 1, 0.00, 22.00, 0.00, 1790000.00, 1, 2023, 0.00, 8.00, 'Lương tháng 01/2023', 'processing', '2023-01-14 20:29:18', '2023-01-14 03:39:19', '2023-01-15 03:29:18'),
(74, 'GV103012023', 5, 5, 0.00, 22.00, 0.00, 16822945.36, 1, 2023, 0.00, 0.00, 'Lương tháng 01/2023', 'processing', '2023-01-14 20:29:18', '2023-01-14 03:39:19', '2023-01-15 03:29:18'),
(75, 'GV102012023', 4, 6, 0.00, 22.00, 0.00, 7642682.45, 1, 2023, 0.00, 0.00, 'Lương tháng 01/2023', 'processing', '2023-01-14 20:29:18', '2023-01-14 03:39:19', '2023-01-15 03:29:18'),
(76, 'GV103122022', 5, 5, 0.00, 22.00, 0.00, 16822945.36, 12, 2022, 0.00, 24.00, 'Lương tháng 12/2022', 'processing', '2023-01-14 20:39:09', '2023-01-15 03:38:37', '2023-01-15 03:39:09'),
(77, 'GV102122022', 4, 6, 0.00, 22.00, 0.00, 7642682.45, 12, 2022, 0.00, 10.00, 'Lương tháng 12/2022', 'processing', '2023-01-14 20:39:09', '2023-01-15 03:38:37', '2023-01-15 03:39:09'),
(78, 'GV103122022', 5, 5, 0.00, 22.00, 0.00, 16822945.36, 12, 2022, 0.00, 24.00, 'Lương tháng 12/2022', 'processing', '2023-01-14 20:42:41', '2023-01-15 03:39:09', '2023-01-15 03:42:41'),
(79, 'GV102122022', 4, 6, 0.00, 22.00, 0.00, 7642682.45, 12, 2022, 0.00, 10.00, 'Lương tháng 12/2022', 'processing', '2023-01-14 20:42:41', '2023-01-15 03:39:09', '2023-01-15 03:42:41'),
(80, 'GV103122022', 5, 5, 0.00, 22.00, 0.00, 16822945.36, 12, 2022, 0.00, 24.00, 'Lương tháng 12/2022', 'processing', '2023-01-14 20:51:57', '2023-01-15 03:51:31', '2023-01-15 03:51:57'),
(81, 'GV102122022', 4, 6, 0.00, 22.00, 0.00, 7642682.45, 12, 2022, 0.00, 10.00, 'Lương tháng 12/2022', 'processing', '2023-01-14 20:51:57', '2023-01-15 03:51:31', '2023-01-15 03:51:57'),
(82, 'GV103122022', 5, 5, 0.00, 22.00, 0.00, 16822945.36, 12, 2022, 0.00, 24.00, 'Lương tháng 12/2022', 'processing', '2023-01-14 20:55:35', '2023-01-15 03:51:58', '2023-01-15 03:55:35'),
(83, 'GV102122022', 4, 6, 0.00, 22.00, 0.00, 7642682.45, 12, 2022, 0.00, 10.00, 'Lương tháng 12/2022', 'processing', '2023-01-14 20:55:35', '2023-01-15 03:51:58', '2023-01-15 03:55:35'),
(84, 'GV103122022', 5, 5, 0.00, 22.00, 0.00, 16822945.36, 12, 2022, 0.00, 24.00, 'Lương tháng 12/2022', 'processing', '2023-01-15 16:07:41', '2023-01-15 03:55:35', '2023-01-15 23:07:41'),
(85, 'GV102122022', 4, 6, 0.00, 22.00, 0.00, 7642682.45, 12, 2022, 0.00, 10.00, 'Lương tháng 12/2022', 'processing', '2023-01-15 16:07:41', '2023-01-15 03:55:35', '2023-01-15 23:07:41'),
(86, 'GV103012023', 5, 5, 0.00, 22.00, 0.00, 16822945.36, 1, 2023, 0.00, 24.00, 'Lương tháng 01/2023', 'processing', NULL, '2023-01-15 04:02:38', '2023-01-15 04:02:38'),
(87, 'GV102012023', 4, 6, 0.00, 22.00, 0.00, 7642682.45, 1, 2023, 0.00, 10.00, 'Lương tháng 01/2023', 'processing', NULL, '2023-01-15 04:02:38', '2023-01-15 04:02:38'),
(88, 'GV102122022', 4, 6, 11111111.00, 22.00, 1231232.00, 17522561.45, 12, 2022, 1.50, 5.50, 'Lương tháng 12/2022', 'processing', '2023-01-15 16:07:41', '2023-01-15 22:57:32', '2023-01-15 23:07:41'),
(89, 'GV103122022', 5, 5, 11111111.00, 22.00, 500000.00, 27434056.36, 12, 2022, 1.00, 23.00, 'Lương tháng 12/2022', 'processing', '2023-01-15 16:09:17', '2023-01-15 23:09:07', '2023-01-15 23:09:17'),
(90, 'GV103122022', 5, 5, 0.00, 22.00, 0.00, 16822945.36, 12, 2022, 0.00, 23.00, 'Lương tháng 12/2022', 'processing', '2023-01-15 16:40:49', '2023-01-15 23:40:32', '2023-01-15 23:40:49'),
(91, 'GV102122022', 4, 6, 0.00, 22.00, 0.00, 7642682.45, 12, 2022, 0.00, 5.50, 'Lương tháng 12/2022', 'processing', '2023-01-15 16:40:49', '2023-01-15 23:40:32', '2023-01-15 23:40:49'),
(92, 'GV103122022', 5, 5, 0.00, 22.00, 0.00, 16822945.36, 12, 2022, 0.00, 23.00, 'Lương tháng 12/2022', 'processing', '2023-01-15 16:41:46', '2023-01-15 23:41:07', '2023-01-15 23:41:46'),
(93, 'GV102122022', 4, 6, 0.00, 22.00, 0.00, 7642682.45, 12, 2022, 0.00, 5.50, 'Lương tháng 12/2022', 'processing', '2023-01-15 16:41:46', '2023-01-15 23:41:07', '2023-01-15 23:41:46'),
(94, 'GV103122022', 5, 5, 0.00, 22.00, 0.00, 16822945.36, 12, 2022, 0.00, 23.00, 'Lương tháng 12/2022', 'closed', '2023-01-15 18:54:49', '2023-01-15 23:41:46', '2023-01-16 01:54:49'),
(95, 'GV102122022', 4, 6, 0.00, 22.00, 0.00, 7642682.45, 12, 2022, 0.00, 5.50, 'Lương tháng 12/2022', 'closed', '2023-01-15 18:54:49', '2023-01-15 23:41:46', '2023-01-16 01:54:49'),
(96, 'GV102122022', 4, 6, 120000.00, 22.00, 0.00, 7762682.45, 12, 2022, 0.00, 5.50, 'Lương tháng 12/2022', 'closed', '2023-01-15 18:54:49', '2023-01-16 01:16:04', '2023-01-16 01:54:49'),
(97, 'GV103122022', 5, 5, 0.00, 22.00, 0.00, 16822945.36, 12, 2022, 0.00, 23.00, 'Lương tháng 12/2022', 'processing', NULL, '2023-01-16 01:54:49', '2023-01-16 02:51:47'),
(98, 'GV102122022', 4, 6, 0.00, 22.00, 0.00, 7642682.45, 12, 2022, 0.00, 5.50, 'Lương tháng 12/2022', 'closed', NULL, '2023-01-16 01:54:49', '2023-01-16 02:51:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `decentralization` enum('staff','accountant','admin','super_admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'staff',
  `status` enum('active','inactive','suspended','deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `staff_id`, `name`, `email`, `password`, `phone`, `decentralization`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 7, 'Hùng Nguyễns', 'hungtest@gmail.com', '$2y$10$olgQq4ChKU1EFpyRljCVOOYh3Q2FAu1/uCxpM/FjJEaipZFWo75HO', '0988833382', 'accountant', 'active', NULL, '2022-12-20 22:44:38', '2023-01-06 23:38:21'),
(4, 4, 'tests2', 'test21@gmail.com', '$2y$10$Bc4PBq0lccAJdE75w9xG.uC9ZO3qZpeexQUkMEfjIQ6dEnqWTIdl.', '01234584352', 'staff', 'active', NULL, '2023-01-06 23:47:23', '2023-01-07 03:26:01'),
(6, 5, 'tests2', 'tes2t21@gmail.com', '$2y$10$1N8Hq24wctd0ksBAuyv9E.a8Kle6VkzxqkDho3yYTg5.qeoQd52Wm', '012345824352', 'staff', 'active', NULL, '2023-01-06 23:47:23', '2023-01-15 16:06:31'),
(7, 1, 'Hùng Nguyễn', 'hungnguyen@gmail.com', '$2y$10$AtGDau/hU06Jk4eNcA5ZreDjHeUbLWEacslrZCNxIP.tjpcZcvKYe', '23423423423', 'super_admin', 'active', NULL, '2023-01-07 23:22:34', '2023-01-09 22:05:01'),
(9, 10, 'Hùng Nguyễn', 'hn@gmail.com', '$2y$10$1AWB3F1DptBCh9S0ek1NKeb7XgCeq1F1tlwMzRtzkF8kdHFn/YBMS', '234234222', 'super_admin', 'active', NULL, '2023-01-07 23:22:34', '2023-01-08 22:54:17'),
(10, 8, 'Test', 'hung@gmail.com', '$2y$10$6/B6OaUbn.4l1U114KVA9.EZmdVguRmU2mnwZm.zREszU7yLVRJPG', '0123924223', 'super_admin', 'active', NULL, '2023-01-09 22:01:28', '2023-01-09 22:01:28'),
(11, 22, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '$2y$10$jvHILPmTSdoUItwdD2yrdO3lZAnuHi8gHZxaOJvZ6qshVtL9gCJF2', '0123456781', 'super_admin', 'active', NULL, '2023-01-21 01:50:15', '2023-01-21 01:50:15');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `annual_leave`
--
ALTER TABLE `annual_leave`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `companies_email_unique` (`email`),
  ADD UNIQUE KEY `companies_phone_unique` (`phone`);

--
-- Chỉ mục cho bảng `decentralizations`
--
ALTER TABLE `decentralizations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `diplomas`
--
ALTER TABLE `diplomas`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `groups_code_unique` (`code`),
  ADD KEY `groups_admin_id_foreign` (`admin_id`);

--
-- Chỉ mục cho bảng `group_participants`
--
ALTER TABLE `group_participants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `group_participants_group_id_user_id_unique` (`group_id`,`user_id`);

--
-- Chỉ mục cho bảng `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `rewards`
--
ALTER TABLE `rewards`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `salaries_staff_id_unique` (`staff_id`);

--
-- Chỉ mục cho bảng `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `timesheets`
--
ALTER TABLE `timesheets`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `annual_leave`
--
ALTER TABLE `annual_leave`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `decentralizations`
--
ALTER TABLE `decentralizations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `diplomas`
--
ALTER TABLE `diplomas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `group_participants`
--
ALTER TABLE `group_participants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `positions`
--
ALTER TABLE `positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `rewards`
--
ALTER TABLE `rewards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `staffs`
--
ALTER TABLE `staffs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `timesheets`
--
ALTER TABLE `timesheets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
