-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2019 at 04:46 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_aparesepnya`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(10) UNSIGNED NOT NULL,
  `judul` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi_artikel` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_sub_artikel` int(10) UNSIGNED DEFAULT NULL,
  `id_data_user` int(11) UNSIGNED DEFAULT NULL,
  `status` int(2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul`, `thumbnail`, `isi_artikel`, `id_sub_artikel`, `id_data_user`, `status`, `created_at`, `updated_at`) VALUES
(2, 'tips merawat alat-alat dapur', 'https://www.jakartanotebook.com/upload/images/Panci%20Peralatan%20Masak%20Outdoor%20Cooking%20Set%20-%2011Pcs%201.jpg', '<p>jangan lupa bahagia</p>', 3, 2, 1, '2018-11-29 17:00:00', '2019-02-05 13:44:19'),
(3, 'ulasan tentang ricecooker Philips', 'https://www.courts.com.sg/media/catalog/product/cache/image/b63b995af7ec0952f5da176b7256b298/i/p/ip073146_00.jpg', '<p>philips makananku</p>', 5, 2, 1, '2018-11-29 17:00:00', '2019-02-05 15:39:34'),
(4, 'Tutorial menggunakan Ricecooker Listrik', 'https://thumb.viva.co.id/media/frontend/thumbs3/2015/12/07/352766_ilustrasi-penanak-nasi_665_374.jpg', 'listriknya', 4, 11, 1, '2018-11-29 17:00:00', '2019-01-01 14:27:36'),
(5, 'Cara Memasak Air', 'assets/images/thumbnail/PGjkvDkEs48GXfjM5HfloywHgQ3BfhOwY400zYjX.jpeg', '<p>Ya, Ini Artikel nya</p>', 3, 14, 1, '2019-01-07 05:53:58', '2019-01-07 05:53:58'),
(8, 'Saya Tampan', 'assets/images/thumbnail/QGMt7V9DrOUjLzxbDo1tlFlUgjYn3Qalvy2Fvwyx.png', '<p>sssssssss<strong>ssdsdsdsdsd</strong></p>', 2, 2, 1, '2019-02-05 12:23:52', '2019-02-05 15:37:45'),
(9, 'testing', 'data:image/jpeg;base64,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', '<p>bukalah matamu</p>', 4, 2, 1, '2019-02-05 12:48:57', '2019-03-02 12:21:10');

-- --------------------------------------------------------

--
-- Table structure for table `bahan_tutorial`
--

CREATE TABLE `bahan_tutorial` (
  `id_bahan` int(10) UNSIGNED NOT NULL,
  `bahan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_tutorial` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bahan_tutorial`
--

INSERT INTO `bahan_tutorial` (`id_bahan`, `bahan`, `id_tutorial`, `created_at`, `updated_at`) VALUES
(24, 'coklat', 19, '2018-11-30 07:11:17', '2018-11-30 07:11:17'),
(25, 'air', 19, '2018-11-30 07:11:17', '2018-11-30 07:11:17'),
(26, 'puding', 20, '2018-11-30 07:12:47', '2018-11-30 07:12:47'),
(61, '1', 22, '2019-01-07 05:55:03', '2019-01-07 05:55:03'),
(71, '7', NULL, '2019-01-08 14:12:00', '2019-01-08 14:12:00'),
(72, '7', NULL, '2019-01-08 15:55:27', '2019-01-08 15:55:27'),
(73, 'cabai', NULL, '2019-01-09 03:15:31', '2019-01-09 03:15:31'),
(74, 'jahe', NULL, '2019-01-09 03:15:31', '2019-01-09 03:15:31'),
(75, 'nasi', NULL, '2019-01-09 03:15:31', '2019-01-09 03:15:31'),
(76, 'kecap', NULL, '2019-01-09 03:15:31', '2019-01-09 03:15:31'),
(77, 'telur 1/2 kg', NULL, '2019-01-09 03:15:31', '2019-01-09 03:15:31'),
(85, 'jahe', 37, '2019-01-09 03:34:28', '2019-01-09 03:34:28'),
(86, 'santan kelapa', 37, '2019-01-09 03:34:28', '2019-01-09 03:34:28'),
(87, 'gula aren', 37, '2019-01-09 03:34:28', '2019-01-09 03:34:28'),
(88, 'daun pandan', 37, '2019-01-09 03:34:28', '2019-01-09 03:34:28'),
(89, 'gula pasir', 37, '2019-01-09 03:34:28', '2019-01-09 03:34:28'),
(91, 'ayam', 39, '2019-01-09 06:57:03', '2019-01-09 06:57:03'),
(92, 'miyak', 39, '2019-01-09 06:57:03', '2019-01-09 06:57:03'),
(93, '6', 40, '2019-01-16 08:10:18', '2019-01-16 08:10:18'),
(99, '2', NULL, '2019-01-21 12:14:57', '2019-01-21 12:14:57'),
(100, '2', NULL, '2019-01-21 12:15:59', '2019-01-21 12:15:59'),
(101, '1', NULL, '2019-01-21 12:16:49', '2019-01-21 12:16:49'),
(102, '2', NULL, '2019-01-21 12:38:52', '2019-01-21 12:38:52'),
(103, '2', NULL, '2019-01-21 12:39:23', '2019-01-21 12:39:23'),
(104, '2', NULL, '2019-01-21 12:39:24', '2019-01-21 12:39:24'),
(105, '2', NULL, '2019-01-21 12:41:03', '2019-01-21 12:41:03'),
(106, '2', NULL, '2019-01-21 12:41:25', '2019-01-21 12:41:25'),
(108, '2', NULL, '2019-01-21 12:57:33', '2019-01-21 12:57:33'),
(109, '5', NULL, '2019-01-23 06:02:57', '2019-01-23 06:02:57'),
(110, '6', NULL, '2019-01-23 06:52:32', '2019-01-23 06:52:32'),
(111, '1', NULL, '2019-01-26 16:07:16', '2019-01-26 16:07:16'),
(112, '6', NULL, '2019-01-28 13:06:39', '2019-01-28 13:06:39'),
(113, '0', NULL, '2019-01-28 13:44:42', '2019-01-28 13:44:42'),
(114, '0', NULL, '2019-01-28 13:46:27', '2019-01-28 13:46:27'),
(115, '7', NULL, '2019-01-28 13:48:21', '2019-01-28 13:48:21'),
(116, '6', NULL, '2019-01-28 14:21:16', '2019-01-28 14:21:16'),
(117, '5', NULL, '2019-01-28 14:25:18', '2019-01-28 14:25:18'),
(118, '7', NULL, '2019-01-28 14:26:04', '2019-01-28 14:26:04'),
(119, '7', NULL, '2019-01-28 14:26:04', '2019-01-28 14:26:04'),
(120, '8', NULL, '2019-01-28 14:27:34', '2019-01-28 14:27:34'),
(121, '7', NULL, '2019-01-29 03:18:47', '2019-01-29 03:18:47'),
(122, '1', NULL, '2019-01-29 16:13:55', '2019-01-29 16:13:55'),
(123, '2', NULL, '2019-01-30 04:24:07', '2019-01-30 04:24:07'),
(124, '2', NULL, '2019-01-30 04:24:07', '2019-01-30 04:24:07'),
(125, '2', NULL, '2019-01-30 04:42:50', '2019-01-30 04:42:50'),
(126, '2', NULL, '2019-01-30 05:04:02', '2019-01-30 05:04:02'),
(127, '3', NULL, '2019-01-30 05:04:02', '2019-01-30 05:04:02'),
(138, 'air', NULL, '2019-01-30 07:59:27', '2019-01-30 07:59:27'),
(139, 'gas', NULL, '2019-01-30 07:59:27', '2019-01-30 07:59:27'),
(140, 'kompor', NULL, '2019-01-30 07:59:27', '2019-01-30 07:59:27'),
(157, '2', NULL, '2019-02-02 14:59:00', '2019-02-02 14:59:00'),
(214, '1 ruas jahe (bakar lalu bersihkan kulitnya).', 36, '2019-02-05 12:12:20', '2019-02-05 12:12:20'),
(215, '1 ½ liter santan kelapa.', 36, '2019-02-05 12:12:20', '2019-02-05 12:12:20'),
(216, '250 gram gula aren (sisir halus).', 36, '2019-02-05 12:12:20', '2019-02-05 12:12:20'),
(217, '1 ruas kayu manis ukuran 3 cm.', 36, '2019-02-05 12:12:20', '2019-02-05 12:12:20'),
(228, '1', 21, '2019-02-05 14:01:50', '2019-02-05 14:01:50'),
(229, '2', 21, '2019-02-05 14:01:50', '2019-02-05 14:01:50'),
(249, '2', 44, '2019-02-05 15:23:04', '2019-02-05 15:23:04'),
(250, '2', 55, '2019-02-05 15:25:03', '2019-02-05 15:25:03'),
(251, '1', 53, '2019-02-05 15:26:16', '2019-02-05 15:26:16'),
(259, 'niat', 31, '2019-02-05 15:45:39', '2019-02-05 15:45:39'),
(260, 'uang', 31, '2019-02-05 15:45:39', '2019-02-05 15:45:39'),
(261, '5', 54, '2019-02-05 15:46:19', '2019-02-05 15:46:19'),
(264, '1', 56, '2019-02-06 06:37:11', '2019-02-06 06:37:11'),
(270, 'korean', 38, '2019-02-13 04:47:19', '2019-02-13 04:47:19'),
(273, '1', 57, '2019-03-02 12:22:51', '2019-03-02 12:22:51'),
(274, '1', 58, '2019-03-02 12:47:00', '2019-03-02 12:47:00'),
(278, 'ayam', NULL, '2019-03-03 05:13:26', '2019-03-03 05:13:26'),
(279, 'minyak', NULL, '2019-03-03 05:13:26', '2019-03-03 05:13:26'),
(280, 'terigu', NULL, '2019-03-03 05:13:27', '2019-03-03 05:13:27'),
(281, 'garam', NULL, '2019-03-03 05:13:27', '2019-03-03 05:13:27'),
(282, 'beras 10 kg', 23, '2019-04-24 08:47:30', '2019-04-24 08:47:30'),
(283, 'air 100 liter', 23, '2019-04-24 08:47:30', '2019-04-24 08:47:30');

-- --------------------------------------------------------

--
-- Table structure for table `block_post`
--

CREATE TABLE `block_post` (
  `id_block` int(10) UNSIGNED NOT NULL,
  `alasan` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_artikel` int(10) UNSIGNED DEFAULT NULL,
  `id_tutorial` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `block_post`
--

INSERT INTO `block_post` (`id_block`, `alasan`, `id_artikel`, `id_tutorial`, `created_at`, `updated_at`) VALUES
(2, 'sss', NULL, 21, '2019-02-06 02:33:33', '2019-02-06 02:33:33'),
(3, 'blocked', NULL, 22, '2019-02-13 04:09:52', '2019-02-13 04:09:52');

-- --------------------------------------------------------

--
-- Table structure for table `block_user`
--

CREATE TABLE `block_user` (
  `id_block` int(10) UNSIGNED NOT NULL,
  `alasan` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_category` int(10) UNSIGNED NOT NULL,
  `deskripsi` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'minuman', '2018-11-09 17:00:00', '2018-11-09 17:00:00'),
(2, 'masakan', '2018-11-09 17:00:00', '2018-11-09 17:00:00'),
(3, 'cemilan', '2018-11-09 17:00:00', '2018-11-09 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `comment_artikel`
--

CREATE TABLE `comment_artikel` (
  `id_comment_artikel` int(10) UNSIGNED NOT NULL,
  `comment` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_data_user` int(10) UNSIGNED DEFAULT NULL,
  `id_artikel` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comment_artikel`
--

INSERT INTO `comment_artikel` (`id_comment_artikel`, `comment`, `id_data_user`, `id_artikel`, `created_at`, `updated_at`) VALUES
(1, 'ss', 2, 2, '2019-02-05 15:04:18', '2019-02-05 15:04:18'),
(2, 'dsadasd', 2, 3, '2019-02-06 02:41:59', '2019-02-06 02:41:59'),
(3, 'sasasasas', 2, 2, '2019-02-13 04:11:13', '2019-02-13 04:11:13');

-- --------------------------------------------------------

--
-- Table structure for table `comment_tutorial`
--

CREATE TABLE `comment_tutorial` (
  `id_comment_tutorial` int(10) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_data_user` int(10) UNSIGNED DEFAULT NULL,
  `id_tutorial` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comment_tutorial`
--

INSERT INTO `comment_tutorial` (`id_comment_tutorial`, `comment`, `id_data_user`, `id_tutorial`, `created_at`, `updated_at`) VALUES
(14, 'aa', 2, 23, '2019-02-05 08:52:30', '2019-02-05 08:52:30'),
(15, 'bb', 2, 23, '2019-02-05 08:54:19', '2019-02-05 08:54:19'),
(16, 's', 2, 23, '2019-02-05 09:06:43', '2019-02-05 09:06:43'),
(21, 'bb', 2, 23, '2019-02-05 11:17:04', '2019-02-05 11:17:04'),
(22, 'komen', 2, 23, '2019-02-06 02:10:06', '2019-02-06 02:10:06'),
(23, 'kkok', 2, 23, '2019-02-13 03:44:13', '2019-02-13 03:44:13'),
(24, 'wkwkwk ngakak gan', 2, 19, '2019-02-13 04:56:09', '2019-02-13 04:56:09'),
(25, 'ok', 2, 19, '2019-02-13 04:57:32', '2019-02-13 04:57:32'),
(26, 'Resepnya mantap gan', 2, 39, '2019-04-24 08:29:09', '2019-04-24 08:29:09');

-- --------------------------------------------------------

--
-- Table structure for table `data_user`
--

CREATE TABLE `data_user` (
  `id_data_user` int(10) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenkel` enum('L','P') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_hint` int(10) UNSIGNED DEFAULT NULL,
  `jawab_hint` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_user`
--

INSERT INTO `data_user` (`id_data_user`, `nama_lengkap`, `email`, `no_hp`, `jenkel`, `foto`, `username`, `id_hint`, `jawab_hint`, `created_at`, `updated_at`) VALUES
(1, 'Robby Gustian', 'robbygustian@gmail.com', '089626319667', 'L', '1.jpg', 'robbytian', 9, NULL, '2018-11-18 13:34:51', '2019-01-06 14:24:48'),
(2, 'Rian Maulana', 'rianmaulana@yahoo.com', '08763546270', 'L', 'logo_bulat_orange.png', 'rianmau', 8, 'maiinn', '2018-11-24 09:27:55', '2019-01-29 11:28:04'),
(3, 'RoganLy', 'roganly@gmail.com', '089626319667', 'P', NULL, 'roganly', 3, 'bandung', '2018-11-25 07:49:30', '2019-01-06 14:24:57'),
(11, 'tes', 'tes@gamial.com', '0892', NULL, NULL, 'tes', NULL, NULL, '2018-11-25 10:55:13', '2019-01-06 14:25:02'),
(12, 'AzmiS', 'azmi.sf@gmail.com', '089626318772', 'L', NULL, 'azmiS', NULL, NULL, '2018-11-26 05:35:19', '2019-01-06 15:44:14'),
(13, 'Akun Demo', 'demo@gmail.com', '08963728372', 'L', 'azmi.JPG', 'Demo', 7, 'Regi', '2018-11-30 07:03:33', '2019-01-06 14:25:13'),
(14, 'Ikhsan Khoerul', 'khoerulikhsan.r@gmail.com', '0888820821232', NULL, NULL, 'itskaer', NULL, NULL, '2019-01-07 05:51:58', '2019-01-07 05:51:58'),
(15, 'ahay', 'ahay@gmail.com', '09876789', NULL, NULL, 'ahay', NULL, NULL, '2019-01-07 06:09:41', '2019-01-07 06:09:41'),
(16, 'user', 'user@user.com', '123', 'L', '10160.jpg', 'user', 3, 'bandung', '2019-01-09 06:54:52', '2019-01-09 06:59:04'),
(18, 'akunDemo', 'akunDemo@gmail.com', '089626319667', 'L', 'logo_bulat_orange.png', 'akunDemo', 8, 'main', '2019-03-03 03:36:39', '2019-03-03 03:38:11');

-- --------------------------------------------------------

--
-- Table structure for table `hint`
--

CREATE TABLE `hint` (
  `id_hint` int(10) UNSIGNED NOT NULL,
  `pertanyaan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hint`
--

INSERT INTO `hint` (`id_hint`, `pertanyaan`, `created_at`, `updated_at`) VALUES
(1, 'Siapa nama Ayah Anda?', NULL, NULL),
(2, 'Siapa nama Ibu Anda?', NULL, NULL),
(3, 'Dimana tempat lahir Anda?', NULL, NULL),
(4, 'Siapa nama panggilan Anda?', NULL, NULL),
(5, 'Siapa nama teman terdekat Anda?', NULL, NULL),
(6, 'Nama orang yang Anda sukai?', NULL, NULL),
(7, 'Nama hewan peliharaan anda?', NULL, NULL),
(8, 'Apa hobi Anda?', NULL, NULL),
(9, 'Nama film/kartun yang Anda sukai?', NULL, NULL),
(10, 'Siapa orang yang Anda idolakan?', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `langkah_tutorial`
--

CREATE TABLE `langkah_tutorial` (
  `id_langkah` int(10) UNSIGNED NOT NULL,
  `langkah` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_tutorial` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `langkah_tutorial`
--

INSERT INTO `langkah_tutorial` (`id_langkah`, `langkah`, `foto`, `id_tutorial`, `created_at`, `updated_at`) VALUES
(23, 'siapkan coklat', NULL, 19, '2018-11-30 07:11:17', '2018-11-30 07:11:17'),
(24, 'buat coklat panas', NULL, 19, '2018-11-30 07:11:17', '2018-11-30 07:11:17'),
(25, 'buat puding', NULL, 20, '2018-11-30 07:12:47', '2018-11-30 07:12:47'),
(62, '2', NULL, 22, '2019-01-07 05:55:03', '2019-01-07 05:55:03'),
(74, 'langkah 1 ya', NULL, NULL, '2019-01-09 03:15:31', '2019-01-09 03:15:31'),
(75, 'ini kedua mang', NULL, NULL, '2019-01-09 03:15:31', '2019-01-09 03:15:31'),
(76, 'ketiga yey', NULL, NULL, '2019-01-09 03:15:31', '2019-01-09 03:15:31'),
(77, 'akhirnya keempat', NULL, NULL, '2019-01-09 03:15:31', '2019-01-09 03:15:31'),
(78, 'kelima', NULL, NULL, '2019-01-09 03:15:31', '2019-01-09 03:15:31'),
(79, 'enam', NULL, NULL, '2019-01-09 03:15:31', '2019-01-09 03:15:31'),
(80, 'tujuh', NULL, NULL, '2019-01-09 03:15:31', '2019-01-09 03:15:31'),
(88, 'Mula-mula masak hingga mendidih santan kelapa bersama daun pandan, gula aren, serta gula pasir sambil diaduk-aduk dimaksukan agar kandungan dari santan kelapa tidak pecah.', NULL, 37, '2019-01-09 03:34:28', '2019-01-09 03:34:28'),
(89, 'Setelah itu, tambahkan jahe, kayu manis, daun pandan, kopi bubuk, vanili bubuk, garam halus, serta kolang-kaling lalu masak hingga mendidih kemudian angkat dan saring airnya.', NULL, 37, '2019-01-09 03:34:28', '2019-01-09 03:34:28'),
(90, 'Terakhir, sajikan bajigur selagi hangat.', NULL, 37, '2019-01-09 03:34:28', '2019-01-09 03:34:28'),
(92, 'goreng', NULL, 39, '2019-01-09 06:57:03', '2019-01-09 06:57:03'),
(93, 'makan', NULL, 39, '2019-01-09 06:57:03', '2019-01-09 06:57:03'),
(94, '6', NULL, 40, '2019-01-16 08:10:18', '2019-01-16 08:10:18'),
(100, '2', NULL, NULL, '2019-01-21 12:14:57', '2019-01-21 12:14:57'),
(101, '2', NULL, NULL, '2019-01-21 12:15:59', '2019-01-21 12:15:59'),
(102, '1', NULL, NULL, '2019-01-21 12:16:49', '2019-01-21 12:16:49'),
(103, '2', NULL, NULL, '2019-01-21 12:38:52', '2019-01-21 12:38:52'),
(104, '2', NULL, NULL, '2019-01-21 12:39:23', '2019-01-21 12:39:23'),
(105, '2', NULL, NULL, '2019-01-21 12:39:24', '2019-01-21 12:39:24'),
(106, '2', NULL, NULL, '2019-01-21 12:41:03', '2019-01-21 12:41:03'),
(107, '2', NULL, NULL, '2019-01-21 12:41:25', '2019-01-21 12:41:25'),
(109, '2', NULL, NULL, '2019-01-21 12:57:33', '2019-01-21 12:57:33'),
(110, '5', NULL, NULL, '2019-01-23 06:02:57', '2019-01-23 06:02:57'),
(111, '6', NULL, NULL, '2019-01-23 06:52:32', '2019-01-23 06:52:32'),
(112, '1', NULL, NULL, '2019-01-26 16:07:16', '2019-01-26 16:07:16'),
(113, '6', NULL, NULL, '2019-01-28 13:06:39', '2019-01-28 13:06:39'),
(114, '0', NULL, NULL, '2019-01-28 13:44:41', '2019-01-28 13:44:41'),
(115, '9', NULL, NULL, '2019-01-28 13:46:27', '2019-01-28 13:46:27'),
(116, '7', NULL, NULL, '2019-01-28 13:48:21', '2019-01-28 13:48:21'),
(117, '6', NULL, NULL, '2019-01-28 14:21:16', '2019-01-28 14:21:16'),
(118, '5', NULL, NULL, '2019-01-28 14:25:18', '2019-01-28 14:25:18'),
(119, '7', NULL, NULL, '2019-01-28 14:26:04', '2019-01-28 14:26:04'),
(120, '8', NULL, NULL, '2019-01-28 14:27:34', '2019-01-28 14:27:34'),
(121, '7', NULL, NULL, '2019-01-29 03:18:47', '2019-01-29 03:18:47'),
(122, '2', NULL, NULL, '2019-01-29 16:13:55', '2019-01-29 16:13:55'),
(123, '2', NULL, NULL, '2019-01-30 04:24:07', '2019-01-30 04:24:07'),
(124, '2', NULL, NULL, '2019-01-30 04:24:07', '2019-01-30 04:24:07'),
(125, '3', NULL, NULL, '2019-01-30 04:42:50', '2019-01-30 04:42:50'),
(126, '4', NULL, NULL, '2019-01-30 05:04:02', '2019-01-30 05:04:02'),
(127, '5', NULL, NULL, '2019-01-30 05:04:02', '2019-01-30 05:04:02'),
(138, 'panaskan komopr', NULL, NULL, '2019-01-30 07:59:26', '2019-01-30 07:59:26'),
(139, 'tuangkan air', NULL, NULL, '2019-01-30 07:59:26', '2019-01-30 07:59:26'),
(140, 'tunggu sampai mendidih', NULL, NULL, '2019-01-30 07:59:27', '2019-01-30 07:59:27'),
(141, 'air hangat telah dibuat', NULL, NULL, '2019-01-30 07:59:27', '2019-01-30 07:59:27'),
(154, '3', NULL, NULL, '2019-02-02 14:59:00', '2019-02-02 14:59:00'),
(199, 'Mula-mula masak hingga mendidih santan kelapa bersama daun pandan, gula aren, serta gula pasir sambil diaduk-aduk dimaksukan agar kandungan dari santan kelapa tidak pecah.', NULL, 36, '2019-02-05 12:12:19', '2019-02-05 12:12:19'),
(200, 'Setelah itu, tambahkan jahe, kayu manis, daun pandan, kopi bubuk, vanili bubuk, garam halus, serta kolang-kaling lalu masak hingga mendidih kemudian angkat dan saring airnya.', NULL, 36, '2019-02-05 12:12:19', '2019-02-05 12:12:19'),
(201, 'Terakhir, sajikan bajigur selagi hangat.', NULL, 36, '2019-02-05 12:12:19', '2019-02-05 12:12:19'),
(207, '2', NULL, 21, '2019-02-05 14:01:50', '2019-02-05 14:01:50'),
(228, '3', NULL, 44, '2019-02-05 15:23:04', '2019-02-05 15:23:04'),
(229, '3', NULL, 55, '2019-02-05 15:25:03', '2019-02-05 15:25:03'),
(230, '1', NULL, 53, '2019-02-05 15:26:16', '2019-02-05 15:26:16'),
(238, 'siapkan uang', NULL, 31, '2019-02-05 15:45:39', '2019-02-05 15:45:39'),
(239, 'cari tukang nasi goreng', NULL, 31, '2019-02-05 15:45:39', '2019-02-05 15:45:39'),
(240, 'beli nasi goreng', NULL, 31, '2019-02-05 15:45:39', '2019-02-05 15:45:39'),
(241, '5', NULL, 54, '2019-02-05 15:46:19', '2019-02-05 15:46:19'),
(244, '1', NULL, 56, '2019-02-06 06:37:11', '2019-02-06 06:37:11'),
(250, 'food', NULL, 38, '2019-02-13 04:47:19', '2019-02-13 04:47:19'),
(253, '2', NULL, 57, '2019-03-02 12:22:51', '2019-03-02 12:22:51'),
(254, '2', NULL, 58, '2019-03-02 12:46:59', '2019-03-02 12:46:59'),
(257, 'siapkan ayam', NULL, NULL, '2019-03-03 05:13:26', '2019-03-03 05:13:26'),
(258, 'goreng ayam', NULL, NULL, '2019-03-03 05:13:26', '2019-03-03 05:13:26'),
(259, 'siapkan beras', NULL, 23, '2019-04-24 08:47:29', '2019-04-24 08:47:29'),
(260, 'rebus hingga mendidih', NULL, 23, '2019-04-24 08:47:29', '2019-04-24 08:47:29');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_ket`
--

CREATE TABLE `laporan_ket` (
  `id_ket_laporan` int(10) UNSIGNED NOT NULL,
  `keterangan` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laporan_ket`
--

INSERT INTO `laporan_ket` (`id_ket_laporan`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Konten ini merupakan spam (mengganggu dan tidak bermanfaat / sampah)', NULL, NULL),
(2, 'Konten provokatif dan atau menghina pihak lain (hate speech / bullying)', NULL, NULL),
(3, 'Melanggar hukum (simbol simbol terlarang, aktifitas melanggar hukum, atau semacamnya)', NULL, NULL),
(4, 'Melanggar kode etik (Plagiatisme dan atau penggunaan hak cipta yang tidak tepat)', NULL, NULL),
(5, 'Mengandung konten sensitif (pembunuhan atau penyiksaan dan semacamnya)', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `like_artikel`
--

CREATE TABLE `like_artikel` (
  `id_like_artikel` int(10) UNSIGNED NOT NULL,
  `id_data_user` int(10) UNSIGNED DEFAULT NULL,
  `id_artikel` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `like_artikel`
--

INSERT INTO `like_artikel` (`id_like_artikel`, `id_data_user`, `id_artikel`, `created_at`, `updated_at`) VALUES
(2, 2, 4, '2019-01-27 07:43:14', '2019-01-27 07:43:14'),
(4, 11, 2, '2019-01-29 04:29:11', '2019-01-29 04:29:11'),
(6, 2, 3, '2019-02-06 02:42:12', '2019-02-06 02:42:12'),
(7, 2, 2, '2019-02-13 04:11:06', '2019-02-13 04:11:06');

-- --------------------------------------------------------

--
-- Table structure for table `like_tutorial`
--

CREATE TABLE `like_tutorial` (
  `id_like_tutorial` int(10) UNSIGNED NOT NULL,
  `id_data_user` int(10) UNSIGNED DEFAULT NULL,
  `id_tutorial` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `like_tutorial`
--

INSERT INTO `like_tutorial` (`id_like_tutorial`, `id_data_user`, `id_tutorial`, `created_at`, `updated_at`) VALUES
(24, 2, 22, '2019-01-23 07:29:40', '2019-01-23 07:29:40'),
(25, 2, 19, '2019-01-23 07:40:55', '2019-01-23 07:40:55'),
(38, 2, 38, '2019-01-26 16:16:45', '2019-01-26 16:16:45'),
(40, 11, 31, '2019-01-27 07:19:59', '2019-01-27 07:19:59'),
(41, 2, 36, '2019-02-02 14:48:05', '2019-02-02 14:48:05'),
(42, 2, 44, '2019-02-02 15:03:20', '2019-02-02 15:03:20'),
(43, 2, 40, '2019-02-02 15:03:26', '2019-02-02 15:03:26'),
(46, 2, 31, '2019-02-06 02:12:41', '2019-02-06 02:12:41'),
(48, 2, 53, '2019-02-13 04:51:22', '2019-02-13 04:51:22'),
(49, 2, 57, '2019-03-02 12:22:54', '2019-03-02 12:22:54'),
(50, 2, 39, '2019-04-24 08:25:52', '2019-04-24 08:25:52');

-- --------------------------------------------------------

--
-- Table structure for table `log_aktivitas`
--

CREATE TABLE `log_aktivitas` (
  `id_log` int(10) UNSIGNED NOT NULL,
  `aktivitas` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_data_user` int(10) UNSIGNED DEFAULT NULL,
  `id_artikel` int(10) UNSIGNED DEFAULT NULL,
  `id_tutorial` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `log_aktivitas`
--

INSERT INTO `log_aktivitas` (`id_log`, `aktivitas`, `id_data_user`, `id_artikel`, `id_tutorial`, `created_at`, `updated_at`) VALUES
(1, 'like', 2, 3, NULL, '2019-01-29 04:27:09', '2019-01-29 04:27:09'),
(2, 'like', 11, 2, NULL, '2019-01-29 04:29:11', '2019-01-29 04:29:11'),
(3, 'like', 2, 3, NULL, '2019-02-06 02:42:06', '2019-02-06 02:42:06'),
(4, 'like', 2, 3, NULL, '2019-02-06 02:42:12', '2019-02-06 02:42:12'),
(5, 'like', 2, 2, NULL, '2019-02-13 04:11:06', '2019-02-13 04:11:06');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_10_14_092534_create_user', 1),
(2, '2018_10_14_095757_create_hint', 2),
(3, '2018_10_14_100332_constraint_user_hint', 3),
(4, '2018_10_14_100828_create_data_user', 4),
(5, '2018_10_14_101538_constraint_data_user_users', 5),
(7, '2018_10_14_103240_create_category', 6),
(8, '2018_10_14_103650_create_tutorial', 7),
(9, '2018_10_14_105445_constraint_tutorial', 8),
(12, '2018_10_14_111824_create_like_tutorial', 10),
(13, '2018_10_14_111220_constraint_like_tutorial', 11),
(14, '2018_10_14_121941_create_komen_tutorial', 12),
(15, '2018_10_14_122612_constraint_comment_tutorial', 13),
(16, '2018_10_14_110719_create_like_tutorial', 14),
(17, '2018_11_17_202628_constraint_hint', 15),
(18, '2018_11_24_114209_create_sub_category', 16),
(21, '2018_11_24_165758_sub_category_constraint', 17),
(22, '2018_11_24_170235_table_subcategory', 17),
(23, '2018_11_24_170420_subcategory_table_create', 18),
(24, '2018_11_26_234621_create_artikel', 19),
(25, '2018_11_26_235452_constraint_artikel', 20),
(26, '2018_11_27_002859_buat_sub_category', 21),
(27, '2018_11_27_004336_constraint_sub_category_post', 22),
(28, '2018_11_27_004642_constraint_post_sub_pots', 23),
(29, '2018_11_27_005102_table_sub_artikel', 24),
(30, '2018_11_27_005538_constraint_artikel_sub_artikel', 25),
(31, '2018_11_27_112839_table_langkah2', 26),
(32, '2018_11_27_115402_table_bahan', 27),
(33, '2018_11_27_120532_constraint_langkah', 28),
(34, '2018_11_27_120838_constraint_bahan', 29),
(35, '2018_12_29_232936_laporan_table', 30),
(36, '2018_12_29_234155_constraint', 31),
(37, '2018_12_30_153039_table_laporan', 32),
(38, '2018_12_31_231712_table_block', 33),
(39, '2018_12_31_232400_relasi_block', 34),
(40, '2019_01_06_215920_table_block_akun', 35),
(41, '2019_01_06_220143_relaseblock_akun', 36),
(42, '2019_01_20_154307_like_relasi', 37),
(43, '2019_01_20_155028_like_relasi2', 38),
(44, '2019_01_20_155846_like_relasi3', 39),
(45, '2019_01_20_163843_create_like_artikel', 40),
(46, '2019_01_20_164218_like_relasi_artikel', 41),
(47, '2019_01_26_231749_table_comment', 42),
(48, '2019_01_26_232031_table_comment_relasi', 42),
(49, '2019_01_26_232416_table_comment_artikel_relasi', 43),
(50, '2019_01_27_183145_relasi_block_user_v2', 44),
(51, '2019_01_29_103236_log_aktivitas', 45),
(52, '2019_01_29_111839_relasi_aktivitas', 46);

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_laporan`
--

CREATE TABLE `riwayat_laporan` (
  `id_laporan` int(10) UNSIGNED NOT NULL,
  `id_artikel` int(10) UNSIGNED DEFAULT NULL,
  `id_tutorial` int(10) UNSIGNED DEFAULT NULL,
  `alasan` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `riwayat_laporan`
--

INSERT INTO `riwayat_laporan` (`id_laporan`, `id_artikel`, `id_tutorial`, `alasan`, `username`, `created_at`, `updated_at`) VALUES
(7, NULL, 19, 'Melanggar kode etik (Plagiatisme dan atau penggunaan hak cipta yang tidak tepat', 'rianmau', '2019-01-01 15:55:30', '2019-01-01 15:55:30'),
(10, NULL, 19, 'Melanggar hukum (simbol simbol terlarang, aktifitas melanggar hukum, atau semacamnya', 'tes', '2019-01-01 16:38:11', '2019-01-01 16:38:11'),
(11, 3, NULL, 'Konten provokatif dan atau menghina pihak lain (hate speech / bullying', 'ahay', '2019-01-07 06:12:09', '2019-01-07 06:12:09'),
(13, NULL, 21, 'Melanggar hukum (simbol simbol terlarang, aktifitas melanggar hukum, atau semacamnya', 'user', '2019-01-09 06:57:55', '2019-01-09 06:57:55'),
(15, NULL, 39, 'Melanggar hukum (simbol simbol terlarang, aktifitas melanggar hukum, atau semacamnya', 'rianmau', '2019-02-06 02:31:08', '2019-02-06 02:31:08');

-- --------------------------------------------------------

--
-- Table structure for table `sub_artikel`
--

CREATE TABLE `sub_artikel` (
  `id_sub_artikel` int(10) UNSIGNED NOT NULL,
  `nama` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_artikel`
--

INSERT INTO `sub_artikel` (`id_sub_artikel`, `nama`, `created_at`, `updated_at`) VALUES
(2, 'Cerita', NULL, NULL),
(3, 'Tips', NULL, NULL),
(4, 'Tutorial', NULL, NULL),
(5, 'Ulasan', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_category_post`
--

CREATE TABLE `sub_category_post` (
  `id_sub_post` int(10) UNSIGNED NOT NULL,
  `nama` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_category` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_category_post`
--

INSERT INTO `sub_category_post` (`id_sub_post`, `nama`, `id_category`, `created_at`, `updated_at`) VALUES
(3, 'Masakan Tradisional', 2, NULL, NULL),
(4, 'sarapan', 2, NULL, NULL),
(5, 'Jus', 1, NULL, NULL),
(6, 'Gorengan', 3, NULL, NULL),
(7, 'Sayur', 2, NULL, NULL),
(8, 'Anak Kost', 2, NULL, NULL),
(9, 'Sambal', 2, NULL, NULL),
(10, 'Minuman Tradisional', 1, NULL, NULL),
(11, 'Jamu', 1, NULL, NULL),
(12, 'Bolu', 3, NULL, NULL),
(13, 'Kue', 3, NULL, NULL),
(14, 'Pudding', 3, NULL, NULL),
(15, 'Keripik', 3, NULL, NULL),
(16, 'Special Hari Raya', 2, NULL, NULL),
(20, 'Kerupuk', 3, '2019-01-16 08:07:40', '2019-01-16 08:07:40');

-- --------------------------------------------------------

--
-- Table structure for table `tutorial`
--

CREATE TABLE `tutorial` (
  `id_tutorial` int(10) UNSIGNED NOT NULL,
  `judul` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` text COLLATE utf8mb4_unicode_ci,
  `video_header` text COLLATE utf8mb4_unicode_ci,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `porsi` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_masak` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_category` int(10) UNSIGNED DEFAULT NULL,
  `id_sub_post` int(10) UNSIGNED DEFAULT NULL,
  `id_data_user` int(10) UNSIGNED DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tutorial`
--

INSERT INTO `tutorial` (`id_tutorial`, `judul`, `thumbnail`, `video_header`, `deskripsi`, `porsi`, `waktu_masak`, `id_category`, `id_sub_post`, `id_data_user`, `status`, `created_at`, `updated_at`) VALUES
(19, 'Membuat minuman coklat panas', 'http://katalogkuliner.com/wp-content/uploads/2015/11/katalogkuliner-Resep-Minuman-Coklat-Hangat-e1447486896858.jpg', NULL, 'deskripsi sini', '2', '2 minggu', 1, 5, 13, 1, '2018-11-30 07:11:17', '2019-01-01 14:44:29'),
(20, 'Cemilan Enak', 'assets/images/thumbnail/E66YAUJBO9hg7Jz08SLvo9JxmWIqwT69LPOSX7UE.jpeg', '', 'cemilan adalah ....', '2', '2 jam', 3, 14, 13, 1, '2018-11-30 07:12:47', '2019-01-06 13:16:03'),
(21, 'judul ni ya', 'assets/images/thumbnail/QV2aDrXG2IP1Cmg1du4nIft6AR3U6LOLnOvKtebF.png', 'assets/images/video/rNIg7R1D9kAJtt1UAOUFpzZN6KK9UQUEZeDyvtdN.mp4', '<p>beda ah ahay</p>', '3', '3', 2, 4, 2, -1, '2019-01-02 04:30:31', '2019-02-06 02:33:33'),
(22, 'p', 'assets/images/thumbnail/9Sjf31AyJtK6BwPaqQVocnbrJT9TkxhoeIuBl3uP.jpeg', NULL, '<p>p</p>', '2', '2', 3, 13, 14, -1, '2019-01-07 05:55:03', '2019-02-13 04:09:52'),
(23, 'Cara Membuat Nasi', 'http://cdn2.tstatic.net/belitung/foto/bank/images/ilustrasi-foto-nasi-putih_20160225_190922.jpg', '', '<div style=\"background:#eee; border:1px solid #ccc; padding:5px 10px\"><strong>nasi</strong> untuk dimakan ya boi</div>', '3', '4', 2, 8, 2, 1, '2019-01-07 15:00:42', '2019-02-05 15:46:34'),
(31, 'Membuat Nasi Goreng Biasa', 'http://4.bp.blogspot.com/-dYidaNt1ceA/Vj5zoJSPGkI/AAAAAAAAEEg/qks-uMU968k/s1600/Cara%2BMembuat%2BNasi%2BGoreng.png', 'egbSMEi1KPM', '<p>Nasi Goureng</p>', '6', '6', 2, 8, 2, 1, '2019-01-08 14:10:42', '2019-02-05 15:45:39'),
(36, 'Cara Membuat Bajigur hangat', 'https://img-global.cpcdn.com/003_recipes/fbd758f3a54e8a44/751x532cq70/photo.jpg', NULL, '<p><strong>Bajigur</strong> adalah minuman tradisional khas masyarakat Sunda dari daerah Jawa Barat, Indonesia. Bahan utamanya adalah gula aren dan santan. Untuk menambah kenikmatan dicampurkan pula sedikit jahe, garam, dan bubuk vanili.</p>', '6', '1', 1, 10, 2, 1, '2019-01-09 03:29:02', '2019-01-09 03:29:02'),
(37, 'Cara Membuat Bajigur', 'https://img-global.cpcdn.com/003_recipes/fbd758f3a54e8a44/751x532cq70/photo.jpg', NULL, '<p><strong>Bajigur</strong> adalah minuman tradisional khas masyarakat Sunda dari daerah Jawa Barat, Indonesia. Bahan utamanya adalah gula aren dan santan. Untuk menambah kenikmatan dicampurkan pula sedikit jahe, garam, dan bubuk vanili.</p>', '7', '7', 1, 10, 2, 1, '2019-01-09 03:34:28', '2019-01-09 03:34:28'),
(38, 'Cara Membuat Masakan Koreaa', 'https://cintaihidup.com/wp-content/uploads/2017/01/pork-1582916_1920-1024x683.jpg', 'assets/images/video/n1Fd5NFbzzyR6wPIVgUnrvnyy7gVZY1U6WdgemyS.mp4', '<p>Tapi Boong Hiya hiya hiya</p>', '6', '6', 2, 4, 2, 1, '2019-01-09 05:44:58', '2019-02-13 04:47:19'),
(39, 'Ayam Goreng', 'https://cintaihidup.com/wp-content/uploads/2017/01/pork-1582916_1920-1024x683.jpg', 'Khtldoagw2s', '<p>ayam goreng nyam nyam</p>', '2', '20', 2, 3, 16, 1, '2019-01-09 06:57:03', '2019-03-14 09:01:08'),
(40, 'Membuat air hangat', 'data:image/jpeg;base64,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', NULL, '<p>kaka</p>', '6', '6', 1, 10, 2, 1, '2019-01-16 08:10:18', '2019-03-02 12:23:48'),
(44, 'Membuat NASGOR Special!!', 'https://www.goodnewsfromindonesia.id/wp-content/uploads/images/source/fachrezy/nasi-goreng-kambing.jpg', '', '<p>nasi goreng adalah nasi yang biasa dijual oleh emang emang, yang cara memasaknya adalah di goreng</p>', '3', '2', 2, 3, 2, 1, '2019-01-20 06:48:33', '2019-02-05 15:23:03'),
(53, 'Milshake Oreo', 'https://4.bp.blogspot.com/-tfIOHDPAA9c/VYJ4_EnCXII/AAAAAAAAAxw/ppSzAlLfolE/s1600/Oreo-Milkshake.jpg', '', '<p>deskripsi minum</p>', '1', '1', 1, 5, 2, 1, '2019-01-21 12:42:43', '2019-02-05 15:26:16'),
(54, 'Membuat Mie Samyang', 'https://ecs7.tokopedia.net/img/cache/700/product-1/2016/11/7/1847950/1847950_d8e4caf7-fb4d-4b0f-830c-cece2eb4e6c5.jpg', '', '<p>ramen ramen ramen</p>', '5', '5', 2, 4, 2, 1, '2019-02-05 07:36:17', '2019-02-05 15:46:19'),
(55, 'Cemilan Kulit Ayam Krispi', 'http://www.agrowindo.com/wp-content/uploads/2017/05/peluang-usaha-keripik-kulit-ayam.jpg', NULL, '<p>kulit ayam de bes</p>', '4', '5', 3, 15, 2, 1, '2019-02-05 15:25:02', '2019-02-05 15:25:02'),
(56, 'buat nasi goreng', 'http://res.cloudinary.com/cheersy/image/upload/ledb2ltubha0j4d5cnch.jpg', 'assets/images/video/AvfXocFu9mw3ySfio4dOdVMcYJ2BksJkxpAvrUNR.mp4', '<p>deskripsi</p>', '1', '1', 2, 3, 2, 1, '2019-02-06 06:37:11', '2019-03-02 12:20:18'),
(57, 'Membauat Gorengan Tempe', 'data:image/jpeg;base64,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', NULL, '<p>tempe oh yeah</p>', '3', '4', 3, 6, 2, 1, '2019-03-02 12:22:51', '2019-03-02 12:22:51'),
(58, 'Bolu Coklat Untuk Bolu Ulang Tahun', 'https://cdn0-a.production.vidio.static6.com/uploads/video/image/64584/warm-chocolate-lava-cake-0772f6.jpg', NULL, '<p>sasasa</p>', '3', '4', 3, 12, 2, 1, '2019-03-02 12:46:59', '2019-03-02 12:46:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(1) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `level`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
('ahay', '$2y$10$oSbAGSwzdIZc8N4nXT8nMO38gWW9QPmGsQfqVg1nh0Lt.KqFsHXDq', '2', 1, 'MFUx5adDQrLgctCrn7jHaJ06obulcY51LPK6T8ptH6ztKa8xNHXqilmLFND7', '2019-01-07 06:09:41', '2019-01-27 11:44:49'),
('akunDemo', '$2y$10$BXJI1oGj7cR0MVns36GiK.jkaKtovHLs/SCa2osHYaz34z14iZon6', '2', 1, NULL, '2019-03-03 03:36:39', '2019-03-03 03:38:44'),
('azmiS', '$2y$10$FJucUSmRvVU.GUy548VTfeXB1r8bcdlN4vXrvxMaJcbKnm4rKuL9S', '0', 1, 'CYv4sS9bfKpA5fNCW08lLampiOS7YrOGcwWee0FG2a6PXcfk43JWHCiiagU4', '2018-11-26 05:35:19', '2019-01-27 10:24:38'),
('Demo', '$2y$10$qTNYK/kjSrVjcbG0oiQbB.lyDvysK4QIzbwWo/6st6XQpOJF3h31m', '2', 1, 'JoJkHtkbHnKUNuJaK2JZhQGbqPtG3h8XLo9GoyRlvLECLnwPaq435X335Dx2', '2018-11-30 07:03:33', '2019-01-27 10:24:46'),
('itskaer', '$2y$10$XeDrs4SK8KKdHSDrzs3sEelGc9A1Bsr9Nt928xNIhXu8PdpSDP9fe', '2', 1, 'Jf2gInRJkxagZhjetFCXQ4Rc75FasAyqZ3Fur6V8S7RT7koXkjTVsIhfj5Ke', '2019-01-07 05:51:58', '2019-01-27 10:24:52'),
('rianmau', '$2y$10$NF1LdUl0HD6IQ54/cS4zBet/UP8tWo0K5Cn6wYusVef/dsm20XVtG', '1', 1, '4Qpvo7uC6UO9YjZ0TuGMCWJebTFfsNtwlIBRsU9moRlu782xkOZQAo3KfY77', '2018-11-24 09:27:55', '2019-03-02 12:54:18'),
('robbytian', 'rby11tian1', '1', 1, 'OrGMuxszMmmJTF3BIDl9tWLfT6F6QjK3SulZTDSfNlB0hkjWTKJpVzsJhXR2', '2018-11-18 13:34:51', '2019-01-27 10:25:08'),
('roganly', '$2y$10$Jz3XE5Jnr8oUDZisC2MGeuvTjBNvIAzPjNJt5mHYqhux1bjQU32cW', '3', 1, 'FrxLMFWP0HIk3k5Ckbeg8pAUMX8XVYmONqiuYVOYcG67QjZqSCOA5U157rxs', '2018-11-25 07:49:30', '2019-01-27 10:25:16'),
('tes', '$2y$10$My7JoYUlS04tThAux/lFC.dY7j7oEYiD/w5mYaTPGZ51KjIzEIJ56', '2', 1, 'xp4dwDPoyfvleYc5WxIUBQiRhLrW3COG6yKqn9kAaE7tn4vcONH1rQueJs0I', '2018-11-25 10:55:13', '2019-02-06 02:34:28'),
('user', '$2y$10$z1klJ4ivrStoWvWzDir84uu./f.dSMqhowKXaCSCLFoSZHhQkMc2G', '2', 1, 'IutDMkBNrxz2fnIVubs7GDoE7JNUu9lMhQutdUAHIeKEHo6yGr9MMLTSZV9G', '2019-01-09 06:54:52', '2019-01-27 10:25:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`),
  ADD KEY `artikel_id_data_user_foreign` (`id_data_user`),
  ADD KEY `artikel_id_sub_artikel_foreign` (`id_sub_artikel`);

--
-- Indexes for table `bahan_tutorial`
--
ALTER TABLE `bahan_tutorial`
  ADD PRIMARY KEY (`id_bahan`),
  ADD KEY `bahan_tutorial_id_tutorial_foreign` (`id_tutorial`);

--
-- Indexes for table `block_post`
--
ALTER TABLE `block_post`
  ADD PRIMARY KEY (`id_block`),
  ADD KEY `block_post_id_artikel_foreign` (`id_artikel`),
  ADD KEY `block_post_id_tutorial_foreign` (`id_tutorial`);

--
-- Indexes for table `block_user`
--
ALTER TABLE `block_user`
  ADD PRIMARY KEY (`id_block`),
  ADD KEY `block_user_username_foreign` (`username`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `comment_artikel`
--
ALTER TABLE `comment_artikel`
  ADD PRIMARY KEY (`id_comment_artikel`),
  ADD KEY `comment_artikel_id_data_user_foreign` (`id_data_user`),
  ADD KEY `comment_artikel_id_artikel_foreign` (`id_artikel`);

--
-- Indexes for table `comment_tutorial`
--
ALTER TABLE `comment_tutorial`
  ADD PRIMARY KEY (`id_comment_tutorial`),
  ADD KEY `comment_tutorial_id_data_user_foreign` (`id_data_user`),
  ADD KEY `comment_tutorial_id_tutorial_foreign` (`id_tutorial`);

--
-- Indexes for table `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`id_data_user`),
  ADD KEY `data_user_username_foreign` (`username`),
  ADD KEY `data_user_id_hint_foreign` (`id_hint`);

--
-- Indexes for table `hint`
--
ALTER TABLE `hint`
  ADD PRIMARY KEY (`id_hint`);

--
-- Indexes for table `langkah_tutorial`
--
ALTER TABLE `langkah_tutorial`
  ADD PRIMARY KEY (`id_langkah`),
  ADD KEY `langkah_tutorial_id_tutorial_foreign` (`id_tutorial`);

--
-- Indexes for table `laporan_ket`
--
ALTER TABLE `laporan_ket`
  ADD PRIMARY KEY (`id_ket_laporan`);

--
-- Indexes for table `like_artikel`
--
ALTER TABLE `like_artikel`
  ADD PRIMARY KEY (`id_like_artikel`),
  ADD KEY `like_artikel_id_artikel_foreign` (`id_artikel`),
  ADD KEY `like_artikel_id_data_user_foreign` (`id_data_user`);

--
-- Indexes for table `like_tutorial`
--
ALTER TABLE `like_tutorial`
  ADD PRIMARY KEY (`id_like_tutorial`),
  ADD KEY `like_tutorial_id_tutorial_foreign` (`id_tutorial`),
  ADD KEY `like_tutorial_id_data_user_foreign` (`id_data_user`);

--
-- Indexes for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `log_aktivitas_id_artikel_foreign` (`id_artikel`),
  ADD KEY `log_aktivitas_id_tutorial_foreign` (`id_tutorial`),
  ADD KEY `log_aktivitas_id_data_user_foreign` (`id_data_user`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riwayat_laporan`
--
ALTER TABLE `riwayat_laporan`
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `riwayat_laporan_id_tutorial_foreign` (`id_tutorial`),
  ADD KEY `riwayat_laporan_id_artikel_foreign` (`id_artikel`);

--
-- Indexes for table `sub_artikel`
--
ALTER TABLE `sub_artikel`
  ADD PRIMARY KEY (`id_sub_artikel`);

--
-- Indexes for table `sub_category_post`
--
ALTER TABLE `sub_category_post`
  ADD PRIMARY KEY (`id_sub_post`),
  ADD KEY `sub_category_post_id_category_foreign` (`id_category`);

--
-- Indexes for table `tutorial`
--
ALTER TABLE `tutorial`
  ADD PRIMARY KEY (`id_tutorial`),
  ADD KEY `tutorial_id_category_foreign` (`id_category`),
  ADD KEY `tutorial_id_data_user_foreign` (`id_data_user`),
  ADD KEY `tutorial_id_sub_post_foreign` (`id_sub_post`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `bahan_tutorial`
--
ALTER TABLE `bahan_tutorial`
  MODIFY `id_bahan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=284;

--
-- AUTO_INCREMENT for table `block_post`
--
ALTER TABLE `block_post`
  MODIFY `id_block` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `block_user`
--
ALTER TABLE `block_user`
  MODIFY `id_block` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comment_artikel`
--
ALTER TABLE `comment_artikel`
  MODIFY `id_comment_artikel` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comment_tutorial`
--
ALTER TABLE `comment_tutorial`
  MODIFY `id_comment_tutorial` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `data_user`
--
ALTER TABLE `data_user`
  MODIFY `id_data_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `hint`
--
ALTER TABLE `hint`
  MODIFY `id_hint` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `langkah_tutorial`
--
ALTER TABLE `langkah_tutorial`
  MODIFY `id_langkah` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=261;

--
-- AUTO_INCREMENT for table `laporan_ket`
--
ALTER TABLE `laporan_ket`
  MODIFY `id_ket_laporan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `like_artikel`
--
ALTER TABLE `like_artikel`
  MODIFY `id_like_artikel` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `like_tutorial`
--
ALTER TABLE `like_tutorial`
  MODIFY `id_like_tutorial` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  MODIFY `id_log` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `riwayat_laporan`
--
ALTER TABLE `riwayat_laporan`
  MODIFY `id_laporan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sub_artikel`
--
ALTER TABLE `sub_artikel`
  MODIFY `id_sub_artikel` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sub_category_post`
--
ALTER TABLE `sub_category_post`
  MODIFY `id_sub_post` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tutorial`
--
ALTER TABLE `tutorial`
  MODIFY `id_tutorial` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `artikel_id_data_user_foreign` FOREIGN KEY (`id_data_user`) REFERENCES `data_user` (`id_data_user`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `artikel_id_sub_artikel_foreign` FOREIGN KEY (`id_sub_artikel`) REFERENCES `sub_artikel` (`id_sub_artikel`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `bahan_tutorial`
--
ALTER TABLE `bahan_tutorial`
  ADD CONSTRAINT `bahan_tutorial_id_tutorial_foreign` FOREIGN KEY (`id_tutorial`) REFERENCES `tutorial` (`id_tutorial`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `block_post`
--
ALTER TABLE `block_post`
  ADD CONSTRAINT `block_post_id_artikel_foreign` FOREIGN KEY (`id_artikel`) REFERENCES `artikel` (`id_artikel`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `block_post_id_tutorial_foreign` FOREIGN KEY (`id_tutorial`) REFERENCES `tutorial` (`id_tutorial`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `block_user`
--
ALTER TABLE `block_user`
  ADD CONSTRAINT `block_user_username_foreign` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comment_artikel`
--
ALTER TABLE `comment_artikel`
  ADD CONSTRAINT `comment_artikel_id_artikel_foreign` FOREIGN KEY (`id_artikel`) REFERENCES `artikel` (`id_artikel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_artikel_id_data_user_foreign` FOREIGN KEY (`id_data_user`) REFERENCES `data_user` (`id_data_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comment_tutorial`
--
ALTER TABLE `comment_tutorial`
  ADD CONSTRAINT `comment_tutorial_id_data_user_foreign` FOREIGN KEY (`id_data_user`) REFERENCES `data_user` (`id_data_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_tutorial_id_tutorial_foreign` FOREIGN KEY (`id_tutorial`) REFERENCES `tutorial` (`id_tutorial`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data_user`
--
ALTER TABLE `data_user`
  ADD CONSTRAINT `data_user_id_hint_foreign` FOREIGN KEY (`id_hint`) REFERENCES `hint` (`id_hint`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `data_user_username_foreign` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `langkah_tutorial`
--
ALTER TABLE `langkah_tutorial`
  ADD CONSTRAINT `langkah_tutorial_id_tutorial_foreign` FOREIGN KEY (`id_tutorial`) REFERENCES `tutorial` (`id_tutorial`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `like_artikel`
--
ALTER TABLE `like_artikel`
  ADD CONSTRAINT `like_artikel_id_artikel_foreign` FOREIGN KEY (`id_artikel`) REFERENCES `artikel` (`id_artikel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `like_artikel_id_data_user_foreign` FOREIGN KEY (`id_data_user`) REFERENCES `data_user` (`id_data_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `like_tutorial`
--
ALTER TABLE `like_tutorial`
  ADD CONSTRAINT `like_tutorial_id_data_user_foreign` FOREIGN KEY (`id_data_user`) REFERENCES `data_user` (`id_data_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `like_tutorial_id_tutorial_foreign` FOREIGN KEY (`id_tutorial`) REFERENCES `tutorial` (`id_tutorial`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  ADD CONSTRAINT `log_aktivitas_id_artikel_foreign` FOREIGN KEY (`id_artikel`) REFERENCES `artikel` (`id_artikel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `log_aktivitas_id_data_user_foreign` FOREIGN KEY (`id_data_user`) REFERENCES `data_user` (`id_data_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `log_aktivitas_id_tutorial_foreign` FOREIGN KEY (`id_tutorial`) REFERENCES `tutorial` (`id_tutorial`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `riwayat_laporan`
--
ALTER TABLE `riwayat_laporan`
  ADD CONSTRAINT `riwayat_laporan_id_artikel_foreign` FOREIGN KEY (`id_artikel`) REFERENCES `artikel` (`id_artikel`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `riwayat_laporan_id_tutorial_foreign` FOREIGN KEY (`id_tutorial`) REFERENCES `tutorial` (`id_tutorial`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `sub_category_post`
--
ALTER TABLE `sub_category_post`
  ADD CONSTRAINT `sub_category_post_id_category_foreign` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `tutorial`
--
ALTER TABLE `tutorial`
  ADD CONSTRAINT `tutorial_id_category_foreign` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `tutorial_id_data_user_foreign` FOREIGN KEY (`id_data_user`) REFERENCES `data_user` (`id_data_user`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `tutorial_id_sub_post_foreign` FOREIGN KEY (`id_sub_post`) REFERENCES `sub_category_post` (`id_sub_post`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
