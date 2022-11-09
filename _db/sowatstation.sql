-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th10 28, 2022 lúc 01:53 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `sowatstation`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `description`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Above the line', 'above-the-line', '<p>Above the line</p>', 0, NULL, NULL, '2022-05-24 21:35:29', '2022-05-24 21:39:19'),
(2, 'Below the line', 'below-the-line', '<p><a href=\"https://creativehunts.com/wp-admin/term.php?taxonomy=category&amp;tag_ID=4&amp;post_type=post&amp;wp_http_referer=%2Fwp-admin%2Fedit-tags.php%3Ftaxonomy%3Dcategory\"><strong>Below the line</strong></a></p>', 0, NULL, NULL, '2022-05-24 21:36:19', '2022-05-24 21:36:19'),
(3, 'Branding', 'branding', '<p><a href=\"https://creativehunts.com/wp-admin/term.php?taxonomy=category&amp;tag_ID=2&amp;post_type=post&amp;wp_http_referer=%2Fwp-admin%2Fedit-tags.php%3Ftaxonomy%3Dcategory\"><strong>Branding</strong></a></p>', 0, NULL, NULL, '2022-05-24 21:36:27', '2022-05-24 21:36:27'),
(5, 'Digital', 'digital', '<p>Digital</p>', 0, NULL, NULL, '2022-05-24 21:39:30', '2022-05-24 21:39:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sowater_id` int(11) DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `events`
--

INSERT INTO `events` (`id`, `title`, `sub_title`, `date`, `sowater_id`, `slug`, `cover`, `banner`, `short_desc`, `description`, `address`, `location`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(4, 'LINOCUT', 'WORKSHOP', '20.01.2022', 2, 'linocut', 'b93b53ffa2c5970f995b15d76535fc1b.jpg', '41eec0ce701d687fa85a8822e8205b40.jpg', 'Passengers access easily to art activities by coming to our events that hosted bythe very talented and dedicated artists.Workshops will be held weekly, and more other events are coming up.', '<p>We connect artists with the resources they need to pursue &nbsp;their artistic goals, while also valuing their individual creations and &nbsp;assisting them in reaching out to audiences. &nbsp;</p><p>We connect and expose art to the community in order to raise &nbsp;the appreciation value of creativity, art, design innovation, &nbsp;and so on. We connect art, from all over the world.</p>', '386/21B Lê Văn Sỹ, Phường 14, Quận 3', 'SOWAT STATION', 0, NULL, NULL, '2022-03-03 21:46:31', '2022-04-19 13:24:16'),
(7, 'Air dry clay', 'workshop', NULL, 10, 'air-dry-clay', 'd45ae6112d705dea78e80b9140ea6ca6.png', '1c7c2a98c1a5ecd7afbd3b032bb6e42f.png', 'We connect and expose art to the community in order to raise \r\nthe appreciation value of creativity, art, design innovation, \r\nand so on. We connect art, from all over the world...', '<p>We connect artists with the resources they need to pursue &nbsp;their artistic goals, while also valuing their individual creations and &nbsp;assisting them in reaching out to audiences. &nbsp;</p><p>We connect and expose art to the community in order to raise &nbsp;the appreciation value of creativity, art, design innovation, &nbsp;and so on. We connect art, from all over the world.</p>', NULL, NULL, 0, NULL, NULL, '2022-03-27 08:14:02', '2022-04-20 13:29:46'),
(9, 'Air dry clay2', 'workshop', NULL, 10, 'air-dry-clay2', 'a236a07161146389561d63c3de1803ee.png', '88b9aa4a6f974f7eb68e9615e421cc00.png', 'OK', '<p>OK</p>', NULL, NULL, 0, NULL, NULL, '2022-03-27 14:11:07', '2022-03-27 14:11:07');

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
-- Cấu trúc bảng cho bảng `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` int(11) NOT NULL DEFAULT 0,
  `type` int(11) NOT NULL DEFAULT 0,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo_mobile` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `original_name` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_size` int(11) DEFAULT NULL,
  `file_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `link_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `galleries`
--

INSERT INTO `galleries` (`id`, `event_id`, `type`, `photo`, `photo_mobile`, `original_name`, `file_size`, `file_type`, `priority`, `link_url`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(48, 0, 0, '62b5c409f2aa5.jpg', '947adf6703830e3d9d766530ba292150.png', 'home-slide1.jpg', 1361419, 'image/jpeg', 1, 'https://test.com', 0, 1, 1, '2022-06-24 14:02:49', '2022-07-22 12:34:51'),
(61, 3, 3, '62b72223a23c3.jpg', NULL, 'store-desc.jpg', 2733544, 'image/jpeg', 2, NULL, 0, 1, 1, '2022-06-25 14:56:35', '2022-06-25 14:57:19'),
(64, 0, 0, '62b72cc7f32fc.jpg', '5c997a73bb50aad5b69681813d032886.png', 'home-slide1.jpg', 1361419, 'image/jpeg', 1, NULL, 0, 1, 1, '2022-06-25 15:41:59', '2022-07-22 12:35:07'),
(65, 1, 2, '62b7d574eeeff.jpg', NULL, 'creative-desc.jpg', 2796142, 'image/jpeg', 2, NULL, 0, 1, 1, '2022-06-26 03:41:40', '2022-06-26 03:41:42'),
(66, 2, 2, '62b7ddbd61a5e.jpg', NULL, 'creative-desc.jpg', 2796142, 'image/jpeg', 2, NULL, 0, 1, 1, '2022-06-26 04:17:01', '2022-06-26 04:18:03'),
(68, 4, 3, '62bb1fc188d9c.jpg', NULL, 'store-desc.jpg', 2733544, 'image/jpeg', 2, NULL, 0, 1, 1, '2022-06-28 15:35:29', '2022-06-28 15:35:31'),
(71, 0, 0, 'dfe2b0a3ddd55232ffc7430fd47fd41b.jpg', '62c66f0e044a38dcebf5f0b9c131ccb9.jpg', NULL, NULL, NULL, 3, NULL, 0, 1, 1, '2022-07-22 12:27:44', '2022-07-22 12:27:44');

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
(5, '2022_03_02_202812_create_sowaters_table', 1),
(6, '2022_03_04_035226_create_events_table', 1),
(7, '2022_03_04_051317_create_postcards_table', 1),
(8, '2022_03_22_053602_create_galleries_table', 2),
(9, '2022_05_24_051353_create_project_controllers_table', 3),
(10, '2022_05_24_053730_create_categories_table', 4);

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
-- Cấu trúc bảng cho bảng `postcards`
--

CREATE TABLE `postcards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `gif` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `postcards`
--

INSERT INTO `postcards` (`id`, `title`, `slug`, `cover`, `type`, `gif`, `video`, `description`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Mèo mái hiền', 'meo-mai-hien', '10fb9872eb47d285cd76518125cfe8b9.jpg', NULL, '0edff1ab807693f1a6c9e56d34f14ffc.jpg', NULL, '<p>Mèo mái hiền</p>', 0, NULL, NULL, '2022-03-04 01:14:25', '2022-03-04 01:14:25'),
(3, 'Mèo mái hiền 2', 'meo-mai-hien-2', 'c9cf8447f037dfb7a59bb4fc28e321ad.jpg', NULL, '94939187d9ff20c78f6f1299b322186b.jpg', NULL, '<p>Mèo mái hiền</p>', 0, NULL, NULL, '2022-03-04 01:37:51', '2022-03-04 01:38:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT '0',
  `slug` varchar(255) DEFAULT NULL,
  `sowater_id` varchar(255) DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `cover_mobile` varchar(128) DEFAULT NULL,
  `cover_detail` varchar(128) DEFAULT NULL,
  `sub_title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `photos` text DEFAULT NULL,
  `background` varchar(10) DEFAULT NULL,
  `link_order` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `title`, `slug`, `sowater_id`, `cover`, `cover_mobile`, `cover_detail`, `sub_title`, `description`, `photos`, `background`, `link_order`, `meta_title`, `meta_description`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(3, 'Product', 'product', '1,4,2,3', 'fca8ea12755269eda2c9e50de96c84c6.jpg', 'ff64968ed1d04df1f1b7b5c85536be29.jpg', '00e2b7c03ee4acf6a47efc06d45572bf.png', 'Lorem', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>', '<p>\r\n<video controls=\"controls\" height=\"1080\" preload=\"metadata\" src=\"/uploads/files/tvc.mp4\" width=\"1920\">&nbsp;</video>\r\n<img alt=\"\" src=\"/uploads/files/dat2.jpeg\" style=\"height:960px; width:720px\" />HTML</p>\r\n\r\n<figure class=\"image\"><img src=\"http://127.0.0.1:8000/uploads/62b72223a23c3_1661269083.jpeg\" /></figure>', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-06-25 14:57:19', '2022-09-05 22:44:45'),
(4, 'Product 2', 'product-2', '1,5,7', '0d80ffda4584c721ce66900782b188ff.jpg', 'f6692d9e46f4ce5da96c242d3e68c99e.jpg', NULL, 'BAC', '<p>xin chao</p>', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-06-28 15:35:31', '2022-07-16 03:03:34'),
(5, 'Product 3', 'product-3', '1,5,7', '0d80ffda4584c721ce66900782b188ff.jpg', 'f6692d9e46f4ce5da96c242d3e68c99e.jpg', NULL, 'BAC', '<p>xin chao</p>', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-06-28 15:35:31', '2022-07-16 03:03:34'),
(6, 'Product 4', 'product-4', '5,7', '0d80ffda4584c721ce66900782b188ff.jpg', 'f6692d9e46f4ce5da96c242d3e68c99e.jpg', NULL, 'BAC', '<p>xin chao</p>', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-06-28 15:35:31', '2022-07-16 03:03:34'),
(7, 'Product 5', 'product-5', '1,5,7', '0d80ffda4584c721ce66900782b188ff.jpg', 'f6692d9e46f4ce5da96c242d3e68c99e.jpg', NULL, 'BAC', '<p>xin chao</p>', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-06-28 15:35:31', '2022-07-16 03:03:34'),
(8, 'Product 6', 'product-6', '1,5,7', '0d80ffda4584c721ce66900782b188ff.jpg', 'f6692d9e46f4ce5da96c242d3e68c99e.jpg', NULL, 'BAC', '<p>xin chao</p>', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-06-28 15:35:31', '2022-07-16 03:03:34'),
(9, 'Product 7', 'product-7', '1,5,7', '0d80ffda4584c721ce66900782b188ff.jpg', 'f6692d9e46f4ce5da96c242d3e68c99e.jpg', NULL, 'BAC', '<p>xin chao</p>', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-06-28 15:35:31', '2022-07-16 03:03:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sowater_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_mobile` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_detail` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photos` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `background` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_join_us` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `projects`
--

INSERT INTO `projects` (`id`, `title`, `slug`, `sowater_id`, `cover`, `cover_mobile`, `cover_detail`, `sub_title`, `description`, `photos`, `background`, `link_join_us`, `meta_title`, `meta_description`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Title activities', 'title-activities', '2,10', '16e6bca0c0dcb981c4be6460f5ec5b5c.jpg', '0efe02206d3e45519190e102117a2ab3.jpg', 'b9287d9744e1f2b89096d7609afa113e.png', 'Lorem ipsum dolor sit amet.', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p><figure class=\"image\"><img src=\"http://127.0.0.1:8000/uploads/2022-04-09-20-35-24723925455-quan-su_1661267723.png\"></figure>', NULL, '#bd0001', '#', 'abc', 'bac', 0, NULL, NULL, '2022-06-26 03:41:42', '2022-08-23 15:15:27'),
(2, 'Title 2', 'title-2', '2,10,1', '7178cd1ffbd1835a7aafad1fa8582a48.jpg', '221410a17424cb3fc2894b3611c1ac08.jpg', NULL, 'Lorem ipsum dolor sit amet.', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-06-26 04:18:03', '2022-06-28 15:26:16'),
(3, 'Title 3', 'title-3', '2,10,1', '7178cd1ffbd1835a7aafad1fa8582a48.jpg', '221410a17424cb3fc2894b3611c1ac08.jpg', NULL, 'Lorem ipsum dolor sit amet.', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-06-26 04:18:03', '2022-06-28 15:26:16'),
(4, 'Title 4', 'title-4', '2,10,1', '7178cd1ffbd1835a7aafad1fa8582a48.jpg', '221410a17424cb3fc2894b3611c1ac08.jpg', NULL, 'Lorem ipsum dolor sit amet.', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-06-26 04:18:03', '2022-06-28 15:26:16'),
(5, 'Title 5', 'title-5', '2,10,1', '7178cd1ffbd1835a7aafad1fa8582a48.jpg', '221410a17424cb3fc2894b3611c1ac08.jpg', NULL, 'Lorem ipsum dolor sit amet.', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-06-26 04:18:03', '2022-06-28 15:26:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` int(11) NOT NULL DEFAULT 0 COMMENT '0:text,1:image',
  `key` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `settings`
--

INSERT INTO `settings` (`id`, `type`, `key`, `photo`, `value`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(8, 0, 'production_desc', NULL, 'Attention please, on this platform there are exclusive product lines that resulted from the combination between the beautiful artworks from talented artists and professional production from SoWat. All products were made with a lot of love and care, to bring out the best quality in every detail.', 0, 1, 1, '2022-03-02 13:20:15', '2022-03-02 13:20:18'),
(9, 0, 'about_description', NULL, '<p>We connect artists with the resources they need to pursue their artistic goals, while also valuing their individual creations and assisting them in reaching out to audiences.</p>\r\n<p>We connect and expose art to the community in order to raise the appreciation value of creativity, art, design innovation, and so on. We connect art, from all over the world.</p>', 0, 1, 1, '2022-03-02 13:21:05', '2022-03-02 13:21:07'),
(10, 0, 'sowater_description', NULL, 'At Sowat Station, each Sowat—ers carries on their own hunt for original ideas, for ingenious execution, and for their own growth. We set out to chart the uncharted territories of this industry, in a hunt that\'s always on.', 0, 1, 1, '2022-03-02 13:35:28', '2022-03-02 13:35:30'),
(11, 0, 'address', NULL, '386/21 B Lê Văn Sỹ, phường 14, quận 03, TP Hồ Chí Minh', 0, NULL, NULL, NULL, NULL),
(12, 0, 'contact_email', NULL, 'van.au@sowatstation.com', 0, NULL, NULL, NULL, NULL),
(13, 0, 'facebook', NULL, 'https://www.facebook.com/sowat.station', 0, NULL, NULL, NULL, NULL),
(14, 0, 'instagram', NULL, 'https://www.instagram.com/sowat.station', 0, NULL, NULL, NULL, NULL),
(15, 0, 'postcard_description', NULL, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit.', 0, NULL, NULL, NULL, NULL),
(16, 2, 'art_hub', 'b22f0731349008c4e2825606200cfaa8.png', '<ul><li>For those who love art and who need art</li><li>For artists - established artist and maiden artist</li><li>With #Artspeak #Artjoy #Artlocal #Artinnovate</li><li>Plan and Organize events and workshops</li></ul>', 0, NULL, NULL, NULL, NULL),
(17, 2, 'art_work', '99bc42d9ba8f928466c1baa86012a5db.png', '<ul><li>Integrated Marketing Communications campaign support items</li><li>Non marketing items</li><li>Customized and personalized unique items</li></ul>', 0, NULL, NULL, NULL, NULL),
(18, 0, 'about_desc', NULL, '<p>The Hunter Group has been established for 15 years since 2007 in Vietnam as a local creative agency, making a tireless effort to find out the best communication solutions through our creativity.</p><p>Descended from that spirit, SoWat Station is also a The Hunter Group\'s member with a solid foundation. We showed up with the mission of connecting the artist community and elevating the art industry in Vietnam to new heights.</p>', 0, NULL, NULL, NULL, NULL),
(19, 0, 'about_desc_2', NULL, '<ul><li>- DIVERSE RESOURCES</li><li>- WIDE NETWORK</li><li>- ABILITY TO COORDINATE</li><li>- PUT THE HEART ON DETAILS</li></ul>', 0, NULL, NULL, NULL, NULL),
(20, 4, 'meta_about', 'About us', 'About us', 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sowaters`
--

CREATE TABLE `sowaters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT 0,
  `slug` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `background` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `biography` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar_hover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `on_column` int(11) DEFAULT NULL,
  `show_homepage` int(11) NOT NULL DEFAULT 0,
  `work_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_thumnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sowaters`
--

INSERT INTO `sowaters` (`id`, `name`, `full_name`, `title`, `type`, `slug`, `background`, `about`, `biography`, `avatar`, `avatar_hover`, `priority`, `on_column`, `show_homepage`, `work_at`, `meta_title`, `meta_description`, `meta_thumnail`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Ngọc Điệp', 'Artist', 1, 'ngoc-diep', '#c23200', '<p>Yêu cảm giác được vẽ, với chất liệu chính là những câu chuyện kể.</p>', '<p>Không cố định chất liệu,<br>cũng chẳng cố chọn phong cách.<br>Nhìn đời bằng đôi mắt đứa con nít,<br>và tìm cách bằng suy nghĩ người trưởng thành.<br>Yêu cảm giác được vẽ,<br>với chất liệu chính là những câu chuyện kể.<br>Chẳng muốn chần chờ chi nữa,<br>mà muốn…<br>Ất Ơ vậy đó, rồi sao?</p>', '59b793b1f1b1637a448fd2037c886ebb.jpg', '2f7ba0ab01bc0910aaa53270c5b9fe14.jpg', 1, 1, 0, NULL, 'BAC', 'BAC', 'c4a558009b4ad1cb967933dadf92fdb2.jpg', 0, NULL, NULL, NULL, NULL),
(2, 'Đăng Nguyễn', 'Đăng Nguyễn', 'Artist', 1, 'dang-nguyen', '#2e009e', '<p>At Sowat Station, each Sowat—ers carries on their own hunt for original ideas, for ingenious execution.</p>', '<p>At Sowat Station, each Sowat—ers carries on their own hunt for original ideas, for ingenious execution, and for their own growth. We set out to chart the uncharted territories of this industry, in a hunt that’s always on.</p><p>2021 Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p><p>2020 Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p><p>2019 Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p><p>2018 Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p><p>2017 Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>', '35f6fd27f79f64bc95d12377aa8d3802.jpg', '9994c7f422c91c7111f69968ae9e2c27.jpg', 4, 1, 0, 'Lorem ipsum', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(3, NULL, 'Uyên Châu', NULL, 1, 'uyen-chau', NULL, NULL, NULL, '2e081ccec08df6b62319f5ae55463eb3.jpg', '9b9c9fa4ce003d1f71f4bdf571c96b90.jpg', 7, 1, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(4, NULL, 'Văn Âu', NULL, 1, 'van-au', '#F50099', NULL, NULL, '2c0780f275eea84c69f9a536debfba9c.jpg', '9c24f524db9504f78ad2e63b080d8a91.jpg', 2, 2, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(5, NULL, 'Quỳnh Lê', NULL, 1, 'quynh-le', '#F9B304', NULL, NULL, '4ce28e04009d6223f4fc249fd6971dcc.jpg', '97300ae4a13b286ad350813e13b6f590.jpg', 5, 2, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(6, NULL, 'Ngân Nguyễn', NULL, 1, 'ngan-nguyen', NULL, NULL, NULL, 'a9a3f6d5a65f61f7945636a377bf4721.jpg', 'b0144a500604ec43de3346bece668d81.jpg', 8, 2, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(7, NULL, 'Linh Tăng', NULL, 1, 'linh-tang', NULL, NULL, NULL, '8475f59796a784889576f723863f9e7d.jpg', 'd899e6ae63e356fd4ecf0aadde801624.jpg', 3, 3, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(10, 'Huy Đình', 'Nguyễn Huy Đình', 'Artist', 1, 'nguyen-huy-dinh', NULL, NULL, NULL, '1d808487a2a1a76b69c8a794b2795bb0.jpg', 'a0b40d62707adcebd6569e15573779e8.jpg', 6, 3, 0, 'WORK AT<br/>ẤT Ơ STUDIO<br/>SOWAT STATION', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(11, NULL, 'Bảo An', NULL, 1, 'bao-an', NULL, NULL, NULL, '5463b20e999122d3a650074c3b1b12a2.jpg', 'bd4d573a82048de859b9a854a9b2eba0.jpg', 9, 3, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` int(11) NOT NULL DEFAULT 0,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `is_admin`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 1, 'admin@sowatstation.com', '2022-03-02 13:04:03', '$2y$10$JYHm0CLQxkrsg11ovsDF2.D0uEKd5Wq2DG.vPNLnbzWW3Vv7ggs8i', 'tPBqRp3spxy8VNCZMDaMr7klkpi9cQPT92NQIAyGnsroW5uvm5foqgWTygQ5', '2022-03-02 13:04:09', '2022-03-02 13:04:11');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `events_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
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
-- Chỉ mục cho bảng `postcards`
--
ALTER TABLE `postcards`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `postcards_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sowaters`
--
ALTER TABLE `sowaters`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `postcards`
--
ALTER TABLE `postcards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `sowaters`
--
ALTER TABLE `sowaters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
