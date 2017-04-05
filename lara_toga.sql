-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2017 at 07:22 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lara_toga`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_transactions`
--

CREATE TABLE `account_transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `keterangan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `account_transactions`
--

INSERT INTO `account_transactions` (`id`, `user_id`, `invoice_id`, `nominal`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, 6, 1200, 'Pemasukan belanja', '2017-03-29 16:03:42', '2017-03-29 16:03:42'),
(2, 2, 24, 1400, 'Pemasukan belanja', '2017-03-29 16:44:09', '2017-03-29 16:44:10'),
(3, 2, 25, 1400, 'Pemasukan belanja', '2017-03-29 16:45:04', '2017-03-29 16:45:04'),
(4, 2, 26, 1400, 'Pemasukan belanja', '2017-03-29 16:45:24', '2017-03-29 16:45:24'),
(5, 2, 27, 1400, 'Pemasukan belanja', '2017-03-29 16:46:15', '2017-03-29 16:46:15'),
(6, 2, 28, 1400, 'Pemasukan belanja', '2017-03-29 17:00:14', '2017-03-29 17:00:14'),
(7, 2, 29, 1400, 'Pemasukan belanja', '2017-03-29 17:00:55', '2017-03-29 17:00:55'),
(8, 2, 30, 1400, 'Pemasukan belanja', '2017-03-29 17:01:04', '2017-03-29 17:01:05'),
(9, 2, 31, 1400, 'Pemasukan belanja', '2017-03-29 17:01:37', '2017-03-29 17:01:37'),
(10, 2, 32, 1400, 'Pemasukan belanja', '2017-03-29 17:02:11', '2017-03-29 17:02:11'),
(11, 2, 33, 1400, 'Pemasukan belanja', '2017-03-29 17:02:32', '2017-03-29 17:02:32'),
(12, 2, 34, 1400, 'Pemasukan belanja', '2017-03-29 17:02:51', '2017-03-29 17:02:51'),
(13, 2, 35, 1400, 'Pemasukan belanja', '2017-03-29 17:06:08', '2017-03-29 17:06:08'),
(14, 2, 36, 1400, 'Pemasukan belanja', '2017-03-29 17:06:26', '2017-03-29 17:06:26'),
(15, 2, 37, 1400, 'Pemasukan belanja', '2017-03-29 17:06:45', '2017-03-29 17:06:46'),
(16, 2, 38, 1400, 'Pemasukan belanja', '2017-03-29 17:06:53', '2017-03-29 17:06:53'),
(17, 2, 39, 1400, 'Pemasukan belanja', '2017-03-29 18:22:33', '2017-03-29 18:22:33'),
(18, 2, 40, 1400, 'Pemasukan belanja', '2017-03-29 18:23:04', '2017-03-29 18:23:04'),
(19, 2, 41, 1400, 'Pemasukan belanja', '2017-03-29 18:31:30', '2017-03-29 18:31:30'),
(20, 2, 42, 1400, 'Pemasukan belanja', '2017-03-29 18:31:48', '2017-03-29 18:31:49'),
(21, 2, 43, 1400, 'Pemasukan belanja', '2017-03-29 18:31:59', '2017-03-29 18:32:00'),
(22, 2, 44, 1400, 'Pemasukan belanja', '2017-03-29 18:32:04', '2017-03-29 18:32:05'),
(23, 2, 45, 1400, 'Pemasukan belanja', '2017-03-29 18:33:54', '2017-03-29 18:33:54'),
(24, 2, 46, 1400, 'Pemasukan belanja', '2017-03-29 18:34:55', '2017-03-29 18:34:55'),
(25, 2, 47, 1400, 'Pemasukan belanja', '2017-03-29 18:35:18', '2017-03-29 18:35:18'),
(26, 2, 48, 1400, 'Pemasukan belanja', '2017-03-29 18:35:56', '2017-03-29 18:35:56'),
(27, 2, 49, 1400, 'Pemasukan belanja', '2017-03-29 18:37:01', '2017-03-29 18:37:01'),
(28, 2, 50, 1400, 'Pemasukan belanja', '2017-03-29 18:38:49', '2017-03-29 18:38:50'),
(29, 2, 51, 1400, 'Pemasukan belanja', '2017-03-29 18:39:45', '2017-03-29 18:39:46'),
(30, 2, 52, 1400, 'Pemasukan belanja', '2017-03-29 18:40:02', '2017-03-29 18:40:03'),
(31, 1, 53, 1400, 'Pemasukan belanja', '2017-03-29 19:20:01', '2017-03-29 19:20:01'),
(32, 1, 59, 700, 'Pemasukan belanja', '2017-03-29 19:43:44', '2017-03-29 19:43:45'),
(33, 2, 60, 250, 'Pemasukan belanja', '2017-03-30 03:18:07', '2017-03-30 03:18:07'),
(34, 3, 0, 0, 'Saldo awal', '2017-03-30 16:00:39', '2017-03-30 16:00:39'),
(35, 2, 61, 1400, 'Pemasukan belanja', '2017-03-30 21:29:45', '2017-03-30 21:29:45'),
(36, 1, 62, 750, 'Pemasukan belanja', '2017-03-30 21:38:52', '2017-03-30 21:38:52'),
(37, 1, 0, -50, 'ambil tabungan', '2017-03-30 23:16:01', '2017-03-30 23:16:01'),
(38, 2, 0, 250, 'Top up tabungan', '2017-03-30 23:16:48', '2017-03-30 23:16:48'),
(39, 3, 0, 1000, 'Saldo awal', '2017-03-30 23:20:15', '2017-03-30 23:20:15'),
(40, 3, 0, -500, 'ambil tabungan', '2017-03-30 23:53:10', '2017-03-30 23:53:10');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(10) UNSIGNED NOT NULL,
  `transaction_form_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `invoice_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `transaction_total` int(11) NOT NULL,
  `profit_toko` int(11) NOT NULL,
  `profit_member` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `transaction_form_id`, `user_id`, `invoice_code`, `transaction_total`, `profit_toko`, `profit_member`, `created_at`, `updated_at`) VALUES
(3, 'mFKbVApWmwfqNDFj', 0, 'INV/290317/3', 127000, 33000, 0, '2017-03-29 15:56:50', '2017-03-29 15:56:50'),
(4, 'kEGzW1APJIk0wR3e', 0, 'INV/290317/4', 15000, 5000, 0, '2017-03-29 15:57:53', '2017-03-29 15:57:53'),
(5, 'hYt3WpsKfKwIG1Qg', 0, 'INV/290317/5', 15000, 5000, 0, '2017-03-29 15:59:05', '2017-03-29 15:59:05'),
(6, 'plG4r7bevn5jdtLr', 1, 'INV/290317/6', 160000, 22800, 1200, '2017-03-29 16:03:42', '2017-03-29 16:03:42'),
(7, 'vl3C3xaxqELkUKz0', 0, 'INV/290317/7', 120000, 28000, 0, '2017-03-29 16:08:46', '2017-03-29 16:08:46'),
(8, '7uFUWYK1TeFi1Eys', 0, 'INV/290317/8', 120000, 28000, 0, '2017-03-29 16:08:52', '2017-03-29 16:08:53'),
(9, 'ppuGIg8MjP1XRHnY', 0, 'INV/290317/9', 120000, 28000, 0, '2017-03-29 16:11:46', '2017-03-29 16:11:46'),
(10, 'LxMjJpVqvQWy5gN8', 0, 'INV/290317/10', 120000, 28000, 0, '2017-03-29 16:12:11', '2017-03-29 16:12:11'),
(11, 'IcWzmws3jyXWRWsv', 0, 'INV/290317/11', 120000, 28000, 0, '2017-03-29 16:13:14', '2017-03-29 16:13:14'),
(12, 'FqMztTFBfXtBHKvB', 0, 'INV/290317/12', 120000, 28000, 0, '2017-03-29 16:13:26', '2017-03-29 16:13:26'),
(13, 'dkN9R4sp1JNSq3AC', 0, 'INV/290317/13', 120000, 28000, 0, '2017-03-29 16:18:59', '2017-03-29 16:18:59'),
(14, 'vkP93fWE7waMeyow', 0, 'INV/290317/14', 120000, 28000, 0, '2017-03-29 16:19:15', '2017-03-29 16:19:15'),
(15, 'qnLtngSSp4RKFoPz', 0, 'INV/290317/15', 120000, 28000, 0, '2017-03-29 16:20:53', '2017-03-29 16:20:53'),
(16, 'zUnmn25GaSP9WQ6M', 0, 'INV/290317/16', 120000, 28000, 0, '2017-03-29 16:21:23', '2017-03-29 16:21:23'),
(17, 'NnW5Ap7bwE5ADT4S', 0, 'INV/290317/17', 120000, 28000, 0, '2017-03-29 16:22:14', '2017-03-29 16:22:14'),
(18, 'HYrNQdQcdo5fJ5sG', 0, 'INV/290317/18', 120000, 28000, 0, '2017-03-29 16:23:30', '2017-03-29 16:23:30'),
(19, '4LH3P4oOj3weayrR', 0, 'INV/290317/19', 120000, 28000, 0, '2017-03-29 16:30:24', '2017-03-29 16:30:24'),
(20, 'rd18g3DhLkJWxnVx', 0, 'INV/290317/20', 120000, 28000, 0, '2017-03-29 16:31:44', '2017-03-29 16:31:44'),
(21, 'osremNsAKpGg2WxO', 0, 'INV/290317/21', 120000, 28000, 0, '2017-03-29 16:32:14', '2017-03-29 16:32:14'),
(22, '2EsYKsBIdJaA4rm7', 0, 'INV/290317/22', 120000, 28000, 0, '2017-03-29 16:42:30', '2017-03-29 16:42:30'),
(23, 'OKQ3Hq1ADBJsN4zf', 0, 'INV/290317/23', 120000, 28000, 0, '2017-03-29 16:43:49', '2017-03-29 16:43:49'),
(24, 'kwbq89LsCvLXkSyB', 2, 'INV/290317/24', 120000, 26600, 1400, '2017-03-29 16:44:09', '2017-03-29 16:44:10'),
(25, 'HjXSjyo6HtBUA4IG', 2, 'INV/290317/25', 120000, 26600, 1400, '2017-03-29 16:45:04', '2017-03-29 16:45:04'),
(26, 'aYkWPTGt2b9yxuig', 2, 'INV/290317/26', 120000, 26600, 1400, '2017-03-29 16:45:24', '2017-03-29 16:45:24'),
(27, 'YakGv9MvpOGpZdaU', 2, 'INV/290317/27', 120000, 26600, 1400, '2017-03-29 16:46:15', '2017-03-29 16:46:15'),
(28, 'tVue6NEuS5danKu2', 2, 'INV/300317/28', 120000, 26600, 1400, '2017-03-29 17:00:14', '2017-03-29 17:00:14'),
(29, 'y559VRuOJpMFAil0', 2, 'INV/300317/29', 120000, 26600, 1400, '2017-03-29 17:00:55', '2017-03-29 17:00:55'),
(30, 'Y89GuEDESHOhYgfq', 2, 'INV/300317/30', 120000, 26600, 1400, '2017-03-29 17:01:05', '2017-03-29 17:01:05'),
(31, 'sXSGnu2iyZXMDHUA', 2, 'INV/300317/31', 120000, 26600, 1400, '2017-03-29 17:01:37', '2017-03-29 17:01:37'),
(32, 'jARxKLgHZecdVOoK', 2, 'INV/300317/32', 120000, 26600, 1400, '2017-03-29 17:02:11', '2017-03-29 17:02:11'),
(33, '0Ki3RXa2GuFBlDco', 2, 'INV/300317/33', 120000, 26600, 1400, '2017-03-29 17:02:32', '2017-03-29 17:02:32'),
(34, 'gQiDXgO86gR8mP7J', 2, 'INV/300317/34', 120000, 26600, 1400, '2017-03-29 17:02:51', '2017-03-29 17:02:51'),
(35, 'YklljyodtgCu9rVu', 2, 'INV/300317/35', 120000, 26600, 1400, '2017-03-29 17:06:08', '2017-03-29 17:06:08'),
(36, 'UpQSKpr2bI1LxNg3', 2, 'INV/300317/36', 120000, 26600, 1400, '2017-03-29 17:06:26', '2017-03-29 17:06:26'),
(37, '9SYJkWfnCOuyulOt', 2, 'INV/300317/37', 120000, 26600, 1400, '2017-03-29 17:06:46', '2017-03-29 17:06:46'),
(38, '43ErJGZu2kuFrkxF', 2, 'INV/300317/38', 120000, 26600, 1400, '2017-03-29 17:06:53', '2017-03-29 17:06:53'),
(39, 'owLRjb7zeDfYnjOd', 2, 'INV/300317/39', 120000, 26600, 1400, '2017-03-29 18:22:33', '2017-03-29 18:22:33'),
(40, 'NqV76kVMQMzpe3uU', 2, 'INV/300317/40', 120000, 26600, 1400, '2017-03-29 18:23:04', '2017-03-29 18:23:04'),
(41, 'Hy31hvJDiy00I1ss', 2, 'INV/300317/41', 120000, 26600, 1400, '2017-03-29 18:31:30', '2017-03-29 18:31:30'),
(42, 'S8XfsCF78Gu11kaO', 2, 'INV/300317/42', 120000, 26600, 1400, '2017-03-29 18:31:49', '2017-03-29 18:31:49'),
(43, 'E3xaOjkcLbmSxy38', 2, 'INV/300317/43', 120000, 26600, 1400, '2017-03-29 18:31:59', '2017-03-29 18:31:59'),
(44, 'Zpuie3kqYMRoTD9L', 2, 'INV/300317/44', 120000, 26600, 1400, '2017-03-29 18:32:05', '2017-03-29 18:32:05'),
(45, 'rdqW10BVlgn2I2sf', 2, 'INV/300317/45', 120000, 26600, 1400, '2017-03-29 18:33:54', '2017-03-29 18:33:54'),
(46, 'cB3Lu9ehsoCx7nKQ', 2, 'INV/300317/46', 120000, 26600, 1400, '2017-03-29 18:34:55', '2017-03-29 18:34:55'),
(47, 'yyK0efEdtMHhx3Op', 2, 'INV/300317/47', 120000, 26600, 1400, '2017-03-29 18:35:18', '2017-03-29 18:35:18'),
(48, 'oX4TPmIGKhDJezk9', 2, 'INV/300317/48', 120000, 26600, 1400, '2017-03-29 18:35:56', '2017-03-29 18:35:56'),
(49, '2iRxfGH8AUXayI4P', 2, 'INV/300317/49', 120000, 26600, 1400, '2017-03-29 18:37:01', '2017-03-29 18:37:01'),
(50, 'SftaieCgDwYLWXXE', 2, 'INV/300317/50', 120000, 26600, 1400, '2017-03-29 18:38:50', '2017-03-29 18:38:50'),
(51, 'vqfMlt1CO54FiDf7', 2, 'INV/300317/51', 120000, 26600, 1400, '2017-03-29 18:39:45', '2017-03-29 18:39:46'),
(52, '4ufrwtB0OKS8yIXL', 2, 'INV/300317/52', 120000, 26600, 1400, '2017-03-29 18:40:03', '2017-03-29 18:40:03'),
(53, 'BiiM5UWmQ8Scow3I', 1, 'INV/300317/53', 120000, 26600, 1400, '2017-03-29 19:20:01', '2017-03-29 19:20:01'),
(54, 'cL3IRLBWfG9zygcl', 0, 'INV/300317/54', 264000, 28000, 0, '2017-03-29 19:33:38', '2017-03-29 19:33:39'),
(55, 'pxeQpR7wJ2e6xiJr', 0, 'INV/300317/55', 264000, 28000, 0, '2017-03-29 19:35:15', '2017-03-29 19:35:15'),
(56, 'hFlajqehljhLo4A4', 0, 'INV/300317/56', 264000, 28000, 0, '2017-03-29 19:35:48', '2017-03-29 19:35:48'),
(57, 'pT9EvSxv5E79KSLk', 0, 'INV/300317/57', 264000, 28000, 0, '2017-03-29 19:42:05', '2017-03-29 19:42:05'),
(58, '8OlZWkn0DFCdvisf', 0, 'INV/300317/58', 20000, 10000, 0, '2017-03-29 19:42:40', '2017-03-29 19:42:40'),
(59, 'CDnWHObmPZnblC0m', 1, 'INV/300317/59', 24000, 13300, 700, '2017-03-29 19:43:45', '2017-03-29 19:43:45'),
(60, 'O0n80KMeieOE3yAz', 2, 'INV/300317/60', 55000, 4750, 250, '2017-03-30 03:18:07', '2017-03-30 03:18:07'),
(61, 'kFDOfImQlgaTipvT', 2, 'INV/310317/61', 48000, 26600, 1400, '2017-03-30 21:29:45', '2017-03-30 21:29:45'),
(62, 'XxKEwWJWi2ZWpUe0', 1, 'INV/310317/62', 190000, 14250, 750, '2017-03-30 21:38:52', '2017-03-30 21:38:52');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2017_02_08_235355_c_tabel_produk', 1),
('2017_02_09_002216_c_tabel_kategori_produk', 1),
('2017_02_09_002710_c_tabel_transaksi', 1),
('2017_02_09_002859_c_tabel_tagihan', 1),
('2017_02_14_002941_c_table_options', 2),
('2017_03_29_042812_create_account_transactions_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(10) UNSIGNED NOT NULL,
  `peringatan_stock` int(11) NOT NULL,
  `profit_konsumen` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `peringatan_stock`, `profit_konsumen`, `created_at`, `updated_at`) VALUES
(1, 5, 5, NULL, '2017-03-28 21:21:24');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_category_id` int(10) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `weight` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `buying_price` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `sell` int(11) NOT NULL,
  `product_image` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_category_id`, `kode`, `name`, `description`, `weight`, `stock`, `buying_price`, `selling_price`, `sell`, `product_image`, `created_at`, `updated_at`) VALUES
(1, 1, 'A001', 'Beras Mentik', '<p>Beras Mentik</p>\r\n', 0, 2, 50000, 55000, 0, 'i6fa98f77.jpg', NULL, '2017-03-30 21:31:48'),
(4, 1, 'A004', 'Lainnya', '<p>asdasdasd</p>\r\n', 0, 90, 10000, 15000, 0, '', '2017-02-09 23:41:52', '2017-03-30 21:43:38'),
(5, 1, 'A005', 'Contoh Produk', '<p>Lalalalala&nbsp;</p>\r\n', 0, 134, 10000, 20000, 0, '', '2017-02-11 17:23:47', '2017-03-30 03:19:27'),
(6, 1, 'A006', 'Gula Pasir', '<p>Balalalala&nbsp;</p>\r\n', 0, 80, 10000, 15000, 0, '', '2017-02-11 17:27:02', '2017-03-29 19:27:38'),
(7, 1, 'A007', 'Kecap Manis', '<p>Asdsdsda</p>\r\n', 0, 2, 10000, 20000, 0, '', '2017-02-11 17:30:01', '2017-03-30 21:38:52'),
(8, 1, 'A008', 'Garam Dapur 1Kg', '<p>Garan</p>\r\n', 0, 89, 10000, 24000, 0, 'iddf16a1fe7.jpg', '2017-02-11 17:30:47', '2017-03-30 21:29:45'),
(9, 1, 'B009', 'Kentang Instan', '<p>Ax</p>\r\n', 0, 82, 10000, 24000, 0, 'i7ed6181.jpg', '2017-02-11 18:54:58', '2017-03-30 21:29:45');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Sembako', NULL, '2017-02-13 18:35:32'),
(2, 'Snack', '2017-02-15 08:24:09', '2017-02-15 08:24:09'),
(3, 'Sandang', '2017-02-15 08:24:19', '2017-02-15 08:24:19');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `form_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `product_id`, `product_name`, `form_id`, `qty`, `subtotal`, `created_at`, `updated_at`) VALUES
(1, '9', 'Kentang Instan', 'mFKbVApWmwfqNDFj', 2, 48000, '2017-03-29 15:56:49', '2017-03-29 15:56:49'),
(2, '8', 'Garam Dapur 1Kg', 'mFKbVApWmwfqNDFj', 1, 24000, '2017-03-29 15:56:50', '2017-03-29 15:56:50'),
(3, '1', 'Beras Mentik', 'mFKbVApWmwfqNDFj', 1, 55000, '2017-03-29 15:56:50', '2017-03-29 15:56:50'),
(4, '4', 'Lainnya', 'kEGzW1APJIk0wR3e', 1, 15000, '2017-03-29 15:57:53', '2017-03-29 15:57:53'),
(5, '6', 'Gula Pasir', 'hYt3WpsKfKwIG1Qg', 1, 15000, '2017-03-29 15:59:05', '2017-03-29 15:59:05'),
(6, '5', 'Contoh Produk', 'plG4r7bevn5jdtLr', 2, 40000, '2017-03-29 16:03:42', '2017-03-29 16:03:42'),
(7, '8', 'Garam Dapur 1Kg', 'plG4r7bevn5jdtLr', 5, 120000, '2017-03-29 16:03:42', '2017-03-29 16:03:42'),
(8, '9', 'Kentang Instan', 'vl3C3xaxqELkUKz0', 4, 96000, '2017-03-29 16:08:46', '2017-03-29 16:08:46'),
(9, '8', 'Garam Dapur 1Kg', 'vl3C3xaxqELkUKz0', 1, 24000, '2017-03-29 16:08:46', '2017-03-29 16:08:46'),
(10, '9', 'Kentang Instan', '7uFUWYK1TeFi1Eys', 4, 96000, '2017-03-29 16:08:52', '2017-03-29 16:08:52'),
(11, '8', 'Garam Dapur 1Kg', '7uFUWYK1TeFi1Eys', 1, 24000, '2017-03-29 16:08:52', '2017-03-29 16:08:52'),
(12, '9', 'Kentang Instan', 'ppuGIg8MjP1XRHnY', 4, 96000, '2017-03-29 16:11:46', '2017-03-29 16:11:46'),
(13, '8', 'Garam Dapur 1Kg', 'ppuGIg8MjP1XRHnY', 1, 24000, '2017-03-29 16:11:46', '2017-03-29 16:11:46'),
(14, '9', 'Kentang Instan', 'LxMjJpVqvQWy5gN8', 4, 96000, '2017-03-29 16:12:11', '2017-03-29 16:12:11'),
(15, '8', 'Garam Dapur 1Kg', 'LxMjJpVqvQWy5gN8', 1, 24000, '2017-03-29 16:12:11', '2017-03-29 16:12:11'),
(16, '9', 'Kentang Instan', 'IcWzmws3jyXWRWsv', 4, 96000, '2017-03-29 16:13:14', '2017-03-29 16:13:14'),
(17, '8', 'Garam Dapur 1Kg', 'IcWzmws3jyXWRWsv', 1, 24000, '2017-03-29 16:13:14', '2017-03-29 16:13:14'),
(18, '9', 'Kentang Instan', 'FqMztTFBfXtBHKvB', 4, 96000, '2017-03-29 16:13:26', '2017-03-29 16:13:26'),
(19, '8', 'Garam Dapur 1Kg', 'FqMztTFBfXtBHKvB', 1, 24000, '2017-03-29 16:13:26', '2017-03-29 16:13:26'),
(20, '9', 'Kentang Instan', 'dkN9R4sp1JNSq3AC', 4, 96000, '2017-03-29 16:18:59', '2017-03-29 16:18:59'),
(21, '8', 'Garam Dapur 1Kg', 'dkN9R4sp1JNSq3AC', 1, 24000, '2017-03-29 16:18:59', '2017-03-29 16:18:59'),
(22, '9', 'Kentang Instan', 'vkP93fWE7waMeyow', 4, 96000, '2017-03-29 16:19:15', '2017-03-29 16:19:15'),
(23, '8', 'Garam Dapur 1Kg', 'vkP93fWE7waMeyow', 1, 24000, '2017-03-29 16:19:15', '2017-03-29 16:19:15'),
(24, '9', 'Kentang Instan', 'qnLtngSSp4RKFoPz', 4, 96000, '2017-03-29 16:20:53', '2017-03-29 16:20:53'),
(25, '8', 'Garam Dapur 1Kg', 'qnLtngSSp4RKFoPz', 1, 24000, '2017-03-29 16:20:53', '2017-03-29 16:20:53'),
(26, '9', 'Kentang Instan', 'zUnmn25GaSP9WQ6M', 4, 96000, '2017-03-29 16:21:23', '2017-03-29 16:21:23'),
(27, '8', 'Garam Dapur 1Kg', 'zUnmn25GaSP9WQ6M', 1, 24000, '2017-03-29 16:21:23', '2017-03-29 16:21:23'),
(28, '9', 'Kentang Instan', 'NnW5Ap7bwE5ADT4S', 4, 96000, '2017-03-29 16:22:13', '2017-03-29 16:22:13'),
(29, '8', 'Garam Dapur 1Kg', 'NnW5Ap7bwE5ADT4S', 1, 24000, '2017-03-29 16:22:13', '2017-03-29 16:22:13'),
(30, '9', 'Kentang Instan', 'HYrNQdQcdo5fJ5sG', 4, 96000, '2017-03-29 16:23:30', '2017-03-29 16:23:30'),
(31, '8', 'Garam Dapur 1Kg', 'HYrNQdQcdo5fJ5sG', 1, 24000, '2017-03-29 16:23:30', '2017-03-29 16:23:30'),
(32, '9', 'Kentang Instan', '4LH3P4oOj3weayrR', 4, 96000, '2017-03-29 16:30:24', '2017-03-29 16:30:24'),
(33, '8', 'Garam Dapur 1Kg', '4LH3P4oOj3weayrR', 1, 24000, '2017-03-29 16:30:24', '2017-03-29 16:30:24'),
(34, '9', 'Kentang Instan', 'rd18g3DhLkJWxnVx', 4, 96000, '2017-03-29 16:31:44', '2017-03-29 16:31:44'),
(35, '8', 'Garam Dapur 1Kg', 'rd18g3DhLkJWxnVx', 1, 24000, '2017-03-29 16:31:44', '2017-03-29 16:31:44'),
(36, '9', 'Kentang Instan', 'osremNsAKpGg2WxO', 4, 96000, '2017-03-29 16:32:14', '2017-03-29 16:32:14'),
(37, '8', 'Garam Dapur 1Kg', 'osremNsAKpGg2WxO', 1, 24000, '2017-03-29 16:32:14', '2017-03-29 16:32:14'),
(38, '9', 'Kentang Instan', '2EsYKsBIdJaA4rm7', 4, 96000, '2017-03-29 16:42:29', '2017-03-29 16:42:29'),
(39, '8', 'Garam Dapur 1Kg', '2EsYKsBIdJaA4rm7', 1, 24000, '2017-03-29 16:42:30', '2017-03-29 16:42:30'),
(40, '9', 'Kentang Instan', 'OKQ3Hq1ADBJsN4zf', 4, 96000, '2017-03-29 16:43:49', '2017-03-29 16:43:49'),
(41, '8', 'Garam Dapur 1Kg', 'OKQ3Hq1ADBJsN4zf', 1, 24000, '2017-03-29 16:43:49', '2017-03-29 16:43:49'),
(42, '9', 'Kentang Instan', 'kwbq89LsCvLXkSyB', 4, 96000, '2017-03-29 16:44:09', '2017-03-29 16:44:09'),
(43, '8', 'Garam Dapur 1Kg', 'kwbq89LsCvLXkSyB', 1, 24000, '2017-03-29 16:44:09', '2017-03-29 16:44:09'),
(44, '9', 'Kentang Instan', 'HjXSjyo6HtBUA4IG', 4, 96000, '2017-03-29 16:45:04', '2017-03-29 16:45:04'),
(45, '8', 'Garam Dapur 1Kg', 'HjXSjyo6HtBUA4IG', 1, 24000, '2017-03-29 16:45:04', '2017-03-29 16:45:04'),
(46, '9', 'Kentang Instan', 'aYkWPTGt2b9yxuig', 4, 96000, '2017-03-29 16:45:24', '2017-03-29 16:45:24'),
(47, '8', 'Garam Dapur 1Kg', 'aYkWPTGt2b9yxuig', 1, 24000, '2017-03-29 16:45:24', '2017-03-29 16:45:24'),
(48, '9', 'Kentang Instan', 'YakGv9MvpOGpZdaU', 4, 96000, '2017-03-29 16:46:15', '2017-03-29 16:46:15'),
(49, '8', 'Garam Dapur 1Kg', 'YakGv9MvpOGpZdaU', 1, 24000, '2017-03-29 16:46:15', '2017-03-29 16:46:15'),
(50, '9', 'Kentang Instan', 'tVue6NEuS5danKu2', 4, 96000, '2017-03-29 17:00:14', '2017-03-29 17:00:14'),
(51, '8', 'Garam Dapur 1Kg', 'tVue6NEuS5danKu2', 1, 24000, '2017-03-29 17:00:14', '2017-03-29 17:00:14'),
(52, '9', 'Kentang Instan', 'y559VRuOJpMFAil0', 4, 96000, '2017-03-29 17:00:55', '2017-03-29 17:00:55'),
(53, '8', 'Garam Dapur 1Kg', 'y559VRuOJpMFAil0', 1, 24000, '2017-03-29 17:00:55', '2017-03-29 17:00:55'),
(54, '9', 'Kentang Instan', 'Y89GuEDESHOhYgfq', 4, 96000, '2017-03-29 17:01:05', '2017-03-29 17:01:05'),
(55, '8', 'Garam Dapur 1Kg', 'Y89GuEDESHOhYgfq', 1, 24000, '2017-03-29 17:01:05', '2017-03-29 17:01:05'),
(56, '9', 'Kentang Instan', 'sXSGnu2iyZXMDHUA', 4, 96000, '2017-03-29 17:01:37', '2017-03-29 17:01:37'),
(57, '8', 'Garam Dapur 1Kg', 'sXSGnu2iyZXMDHUA', 1, 24000, '2017-03-29 17:01:37', '2017-03-29 17:01:37'),
(58, '9', 'Kentang Instan', 'jARxKLgHZecdVOoK', 4, 96000, '2017-03-29 17:02:11', '2017-03-29 17:02:11'),
(59, '8', 'Garam Dapur 1Kg', 'jARxKLgHZecdVOoK', 1, 24000, '2017-03-29 17:02:11', '2017-03-29 17:02:11'),
(60, '9', 'Kentang Instan', '0Ki3RXa2GuFBlDco', 4, 96000, '2017-03-29 17:02:32', '2017-03-29 17:02:32'),
(61, '8', 'Garam Dapur 1Kg', '0Ki3RXa2GuFBlDco', 1, 24000, '2017-03-29 17:02:32', '2017-03-29 17:02:32'),
(62, '9', 'Kentang Instan', 'gQiDXgO86gR8mP7J', 4, 96000, '2017-03-29 17:02:51', '2017-03-29 17:02:51'),
(63, '8', 'Garam Dapur 1Kg', 'gQiDXgO86gR8mP7J', 1, 24000, '2017-03-29 17:02:51', '2017-03-29 17:02:51'),
(64, '9', 'Kentang Instan', 'YklljyodtgCu9rVu', 4, 96000, '2017-03-29 17:06:08', '2017-03-29 17:06:08'),
(65, '8', 'Garam Dapur 1Kg', 'YklljyodtgCu9rVu', 1, 24000, '2017-03-29 17:06:08', '2017-03-29 17:06:08'),
(66, '9', 'Kentang Instan', 'UpQSKpr2bI1LxNg3', 4, 96000, '2017-03-29 17:06:26', '2017-03-29 17:06:26'),
(67, '8', 'Garam Dapur 1Kg', 'UpQSKpr2bI1LxNg3', 1, 24000, '2017-03-29 17:06:26', '2017-03-29 17:06:26'),
(68, '9', 'Kentang Instan', '9SYJkWfnCOuyulOt', 4, 96000, '2017-03-29 17:06:46', '2017-03-29 17:06:46'),
(69, '8', 'Garam Dapur 1Kg', '9SYJkWfnCOuyulOt', 1, 24000, '2017-03-29 17:06:46', '2017-03-29 17:06:46'),
(70, '9', 'Kentang Instan', '43ErJGZu2kuFrkxF', 4, 96000, '2017-03-29 17:06:53', '2017-03-29 17:06:53'),
(71, '8', 'Garam Dapur 1Kg', '43ErJGZu2kuFrkxF', 1, 24000, '2017-03-29 17:06:53', '2017-03-29 17:06:53'),
(72, '9', 'Kentang Instan', 'owLRjb7zeDfYnjOd', 4, 96000, '2017-03-29 18:22:33', '2017-03-29 18:22:33'),
(73, '8', 'Garam Dapur 1Kg', 'owLRjb7zeDfYnjOd', 1, 24000, '2017-03-29 18:22:33', '2017-03-29 18:22:33'),
(74, '9', 'Kentang Instan', 'NqV76kVMQMzpe3uU', 4, 96000, '2017-03-29 18:23:04', '2017-03-29 18:23:04'),
(75, '8', 'Garam Dapur 1Kg', 'NqV76kVMQMzpe3uU', 1, 24000, '2017-03-29 18:23:04', '2017-03-29 18:23:04'),
(76, '9', 'Kentang Instan', 'Hy31hvJDiy00I1ss', 4, 96000, '2017-03-29 18:31:30', '2017-03-29 18:31:30'),
(77, '8', 'Garam Dapur 1Kg', 'Hy31hvJDiy00I1ss', 1, 24000, '2017-03-29 18:31:30', '2017-03-29 18:31:30'),
(78, '9', 'Kentang Instan', 'S8XfsCF78Gu11kaO', 4, 96000, '2017-03-29 18:31:48', '2017-03-29 18:31:48'),
(79, '8', 'Garam Dapur 1Kg', 'S8XfsCF78Gu11kaO', 1, 24000, '2017-03-29 18:31:48', '2017-03-29 18:31:48'),
(80, '9', 'Kentang Instan', 'E3xaOjkcLbmSxy38', 4, 96000, '2017-03-29 18:31:59', '2017-03-29 18:31:59'),
(81, '8', 'Garam Dapur 1Kg', 'E3xaOjkcLbmSxy38', 1, 24000, '2017-03-29 18:31:59', '2017-03-29 18:31:59'),
(82, '9', 'Kentang Instan', 'Zpuie3kqYMRoTD9L', 4, 96000, '2017-03-29 18:32:05', '2017-03-29 18:32:05'),
(83, '8', 'Garam Dapur 1Kg', 'Zpuie3kqYMRoTD9L', 1, 24000, '2017-03-29 18:32:05', '2017-03-29 18:32:05'),
(84, '9', 'Kentang Instan', 'rdqW10BVlgn2I2sf', 4, 96000, '2017-03-29 18:33:54', '2017-03-29 18:33:54'),
(85, '8', 'Garam Dapur 1Kg', 'rdqW10BVlgn2I2sf', 1, 24000, '2017-03-29 18:33:54', '2017-03-29 18:33:54'),
(86, '9', 'Kentang Instan', 'cB3Lu9ehsoCx7nKQ', 4, 96000, '2017-03-29 18:34:55', '2017-03-29 18:34:55'),
(87, '8', 'Garam Dapur 1Kg', 'cB3Lu9ehsoCx7nKQ', 1, 24000, '2017-03-29 18:34:55', '2017-03-29 18:34:55'),
(88, '9', 'Kentang Instan', 'yyK0efEdtMHhx3Op', 4, 96000, '2017-03-29 18:35:18', '2017-03-29 18:35:18'),
(89, '8', 'Garam Dapur 1Kg', 'yyK0efEdtMHhx3Op', 1, 24000, '2017-03-29 18:35:18', '2017-03-29 18:35:18'),
(90, '9', 'Kentang Instan', 'oX4TPmIGKhDJezk9', 4, 96000, '2017-03-29 18:35:56', '2017-03-29 18:35:56'),
(91, '8', 'Garam Dapur 1Kg', 'oX4TPmIGKhDJezk9', 1, 24000, '2017-03-29 18:35:56', '2017-03-29 18:35:56'),
(92, '9', 'Kentang Instan', '2iRxfGH8AUXayI4P', 4, 96000, '2017-03-29 18:37:01', '2017-03-29 18:37:01'),
(93, '8', 'Garam Dapur 1Kg', '2iRxfGH8AUXayI4P', 1, 24000, '2017-03-29 18:37:01', '2017-03-29 18:37:01'),
(94, '9', 'Kentang Instan', 'SftaieCgDwYLWXXE', 4, 96000, '2017-03-29 18:38:50', '2017-03-29 18:38:50'),
(95, '8', 'Garam Dapur 1Kg', 'SftaieCgDwYLWXXE', 1, 24000, '2017-03-29 18:38:50', '2017-03-29 18:38:50'),
(96, '9', 'Kentang Instan', 'vqfMlt1CO54FiDf7', 4, 96000, '2017-03-29 18:39:45', '2017-03-29 18:39:45'),
(97, '8', 'Garam Dapur 1Kg', 'vqfMlt1CO54FiDf7', 1, 24000, '2017-03-29 18:39:45', '2017-03-29 18:39:45'),
(98, '9', 'Kentang Instan', '4ufrwtB0OKS8yIXL', 4, 96000, '2017-03-29 18:40:02', '2017-03-29 18:40:02'),
(99, '8', 'Garam Dapur 1Kg', '4ufrwtB0OKS8yIXL', 1, 24000, '2017-03-29 18:40:03', '2017-03-29 18:40:03'),
(100, '9', 'Kentang Instan', 'BiiM5UWmQ8Scow3I', 4, 96000, '2017-03-29 19:20:01', '2017-03-29 19:20:01'),
(101, '8', 'Garam Dapur 1Kg', 'BiiM5UWmQ8Scow3I', 1, 24000, '2017-03-29 19:20:01', '2017-03-29 19:20:01'),
(102, '9', 'Kentang Instan', 'cL3IRLBWfG9zygcl', 4, 96000, '2017-03-29 19:33:37', '2017-03-29 19:33:37'),
(103, '8', 'Garam Dapur 1Kg', 'cL3IRLBWfG9zygcl', 7, 168000, '2017-03-29 19:33:38', '2017-03-29 19:33:38'),
(104, '9', 'Kentang Instan', 'pxeQpR7wJ2e6xiJr', 4, 96000, '2017-03-29 19:35:15', '2017-03-29 19:35:15'),
(105, '8', 'Garam Dapur 1Kg', 'pxeQpR7wJ2e6xiJr', 7, 168000, '2017-03-29 19:35:15', '2017-03-29 19:35:15'),
(106, '9', 'Kentang Instan', 'hFlajqehljhLo4A4', 4, 96000, '2017-03-29 19:35:48', '2017-03-29 19:35:48'),
(107, '8', 'Garam Dapur 1Kg', 'hFlajqehljhLo4A4', 7, 168000, '2017-03-29 19:35:48', '2017-03-29 19:35:48'),
(108, '9', 'Kentang Instan', 'pT9EvSxv5E79KSLk', 4, 96000, '2017-03-29 19:42:04', '2017-03-29 19:42:04'),
(109, '8', 'Garam Dapur 1Kg', 'pT9EvSxv5E79KSLk', 7, 168000, '2017-03-29 19:42:04', '2017-03-29 19:42:04'),
(110, '7', 'Kecap Manis', '8OlZWkn0DFCdvisf', 1, 20000, '2017-03-29 19:42:40', '2017-03-29 19:42:40'),
(111, '9', 'Kentang Instan', 'CDnWHObmPZnblC0m', 1, 24000, '2017-03-29 19:43:45', '2017-03-29 19:43:45'),
(112, '1', 'Beras Mentik', 'O0n80KMeieOE3yAz', 1, 55000, '2017-03-30 03:18:07', '2017-03-30 03:18:07'),
(113, '9', 'Kentang Instan', 'kFDOfImQlgaTipvT', 1, 24000, '2017-03-30 21:29:45', '2017-03-30 21:29:45'),
(114, '8', 'Garam Dapur 1Kg', 'kFDOfImQlgaTipvT', 1, 24000, '2017-03-30 21:29:45', '2017-03-30 21:29:45'),
(115, '7', 'Kecap Manis', 'XxKEwWJWi2ZWpUe0', 5, 100000, '2017-03-30 21:38:52', '2017-03-30 21:38:52'),
(116, '4', 'Lainnya', 'XxKEwWJWi2ZWpUe0', 6, 90000, '2017-03-30 21:38:52', '2017-03-30 21:38:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` enum('admin','member') COLLATE utf8_unicode_ci NOT NULL,
  `saldo` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mothers_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `born` date NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_image` text COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `kode`, `password`, `level`, `saldo`, `name`, `mothers_name`, `address`, `born`, `tempat_lahir`, `profile_image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'axquired24@gmail.com', 'MB001', '$2y$10$P/fEyKDUl9t9z2cJkxVCLOAx5bEhoWkYWy44yI0rmopjar701M9zu', 'member', 126000, 'Albert Member', 'Umi S', 'Sukoharjo', '1995-03-24', 'Bandar Jaya', '7bd1a6bd4f.png', NULL, NULL, '2017-03-30 23:16:00'),
(2, '.toga.2@app.com', 'MB770', '$2y$10$Dm.m9tzYzPhhN.i9cdKx0.8BNydqkXuMR0cbgI7/Ka6IFi6N66skm', 'member', 629500, 'Vani Agung Dwi', 'Fina Ranita', 'Jawa Tengah', '1995-03-15', 'Purwodadi', '3bc2aed064.png', NULL, '2017-03-28 21:36:33', '2017-03-30 23:16:48'),
(3, 'toga.3@app.com', 'MB911', '$2y$10$MR3sj65mx.9QTx/fHAr9YeI/J8XJ.0lRFPhq.r2vxjEi9jH7HJeK.', 'member', 500, 'Sa\\''id Ali', 'Ma\\'' Iyem', 'Purwodadi', '1993-03-19', 'Purwodadi', 'd0662c3.png', NULL, '2017-03-30 23:20:15', '2017-03-30 23:53:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_transactions`
--
ALTER TABLE `account_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invoices_transaction_form_id_unique` (`transaction_form_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`),
  ADD KEY `product_category_id` (`product_category_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_id` (`form_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_transactions`
--
ALTER TABLE `account_transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `product_product_category_id` FOREIGN KEY (`product_category_id`) REFERENCES `product_categories` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
