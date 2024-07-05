-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 05, 2024 at 04:56 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erp`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Elektronika', '2024-07-05 00:21:38', '2024-07-05 00:21:38'),
(2, 'Ev Əşyaları', '2024-07-05 00:21:48', '2024-07-05 00:21:48'),
(3, 'Geyim', '2024-07-05 00:21:52', '2024-07-05 00:21:52'),
(4, 'Qida və İçki', '2024-07-05 00:21:58', '2024-07-05 00:21:58'),
(5, 'Kompyuter və Aksesuarlar', '2024-07-05 00:22:04', '2024-07-05 00:22:04'),
(6, 'Mebel', '2024-07-05 00:22:12', '2024-07-05 00:22:12'),
(7, 'Sağlamlıq və Gözəllik', '2024-07-05 00:22:18', '2024-07-05 00:22:18'),
(8, 'Kitablar', '2024-07-05 00:22:23', '2024-07-05 00:22:23'),
(9, 'Uşaq Əşyaları', '2024-07-05 00:22:29', '2024-07-05 00:22:29'),
(10, 'İdman və Açıq Hava', '2024-07-05 00:22:35', '2024-07-05 00:22:35');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `incomes`
--

CREATE TABLE `incomes` (
  `id` bigint UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint UNSIGNED NOT NULL,
  `invoice_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_date` date NOT NULL,
  `seller_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buyer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buyer_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `tax_rate` decimal(5,2) NOT NULL,
  `tax_amount` decimal(10,2) NOT NULL,
  `grand_total` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu_links`
--

CREATE TABLE `menu_links` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_links`
--

INSERT INTO `menu_links` (`id`, `title`, `slug`, `code`, `created_at`, `updated_at`) VALUES
(1, 'Tədarükçülər', 'supplier', 'product', '2024-07-04 23:45:35', '2024-07-04 23:45:35'),
(2, 'Kateqoriya', 'category', 'product', '2024-07-04 23:45:35', '2024-07-04 23:45:35'),
(3, 'Məhsullar', 'product', 'product', '2024-07-04 23:45:35', '2024-07-04 23:45:35'),
(4, 'Sifarişlər', 'order', 'order', '2024-07-04 23:45:35', '2024-07-04 23:45:35'),
(5, 'Menyu linkləri', 'menulinks', 'menu', '2024-07-04 23:45:35', '2024-07-04 23:45:35'),
(6, 'İstifadəçi rolları', 'userrole', 'user', '2024-07-04 23:45:35', '2024-07-04 23:45:35'),
(7, 'Adminlər', 'admin', 'user', '2024-07-04 23:45:35', '2024-07-04 23:45:35'),
(8, 'Gəlirlər', 'income', 'finance', '2024-07-04 23:45:35', '2024-07-04 23:45:35'),
(9, 'Xərclər', 'expense', 'finance', '2024-07-04 23:45:35', '2024-07-04 23:45:35'),
(10, 'Maliyyə Hesabatı', 'financialreport', 'finance', '2024-07-04 23:45:35', '2024-07-04 23:45:35'),
(11, 'Faktura', 'invoice', 'finance', '2024-07-04 23:45:35', '2024-07-04 23:45:35'),
(14, 'Ödənişlər', 'payment', 'finance', '2024-07-04 23:45:35', '2024-07-04 23:45:35');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_07_02_182307_add_reset_token_to_users_table', 1),
(5, '2024_07_03_060319_create_categories_table', 1),
(6, '2024_07_03_070841_create_suppliers_table', 1),
(7, '2024_07_03_073534_create_products_table', 1),
(8, '2024_07_03_125407_create_orders_table', 1),
(9, '2024_07_03_130415_create_product_orders_table', 1),
(10, '2024_07_04_043644_add_stock_to_product_orders_table', 1),
(11, '2024_07_04_044258_create_menus_table', 1),
(12, '2024_07_04_070009_create_user_permissions_table', 1),
(13, '2024_07_04_070015_create_user_role_permissions_table', 1),
(14, '2024_07_04_070048_create_user_roles_table', 1),
(15, '2024_07_04_073955_create_role_permissions_table', 1),
(16, '2024_07_04_093406_add_page_id_to_role_permissions_table', 1),
(17, '2024_07_04_192429_create_incomes_table', 1),
(18, '2024_07_04_201003_create_expenses_table', 1),
(19, '2024_07_04_213031_create_invoices_table', 1),
(20, '2024_07_04_223228_create_payments_table', 1),
(21, '2024_07_05_031716_change_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `order_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_code`, `order_status`, `customer_name`, `customer_surname`, `customer_email`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, '1d058b9ef21631ed', '1', 'Ignacia Knight', 'Cameron', 'gagejo@mailinator.com', '+1 (887) 407-7709', 'Aut animi enim non', '2024-07-05 00:39:08', '2024-07-05 00:39:08');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint UNSIGNED NOT NULL,
  `payment_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_date` date NOT NULL,
  `payer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payer_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `stock_count` int NOT NULL,
  `supplier_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `price`, `stock_count`, `supplier_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Mobil Telefon', '<p>Son model smartfon, y&uuml;ksək keyfiyyətli kamera və uzun &ouml;m&uuml;rl&uuml; batareya ilə.</p>', '700.00', 50, 3, 1, '2024-07-05 00:24:48', '2024-07-05 00:24:48'),
(2, 'Televizor', '<p>UHD TV, geniş ekran və y&uuml;ksək səslənmə sistemi ilə</p>', '1200.00', 9, 4, 1, '2024-07-05 00:26:54', '2024-07-05 00:40:40'),
(3, 'Soyuducu', '<p>Enerji səmərəli soyuducu, geniş i&ccedil; həcmi və s&uuml;rətli dondurma funksiyası ilə.</p>', '900.00', 20, 5, 2, '2024-07-05 00:27:23', '2024-07-05 00:28:21'),
(4, 'Paltaryuyan Maşın', '<p>Ağıllı yuma funksiyaları və enerji səmərəliliyi ilə m&uuml;asir paltaryuyan maşın.</p>', '750.00', 15, 6, 3, '2024-07-05 00:27:53', '2024-07-05 00:29:23'),
(5, 'Cins Şalvar', '<p>Rahat və davamlı materialdan hazırlanmış klassik cins şalvar.</p>', '50.00', 100, 7, 3, '2024-07-05 00:29:08', '2024-07-05 00:29:08'),
(6, 'Gödəkçə', '<p>Qış &uuml;&ccedil;&uuml;n isti və su ke&ccedil;irməz g&ouml;dək&ccedil;ə.</p>', '120.00', 60, 8, 3, '2024-07-05 00:29:45', '2024-07-05 00:29:45'),
(7, 'Mineral Su', '<p>Təbii mineral su, saf və təmiz.</p>', '1.00', 200, 9, 4, '2024-07-05 00:30:10', '2024-07-05 00:30:10'),
(8, 'Makaron', '<p>Y&uuml;ksək keyfiyyətli, ənənəvi &uuml;sulla hazırlanmış makaron.</p>', '2.00', 150, 10, 4, '2024-07-05 00:30:31', '2024-07-05 00:30:31'),
(9, 'Laptop', '<p>G&uuml;cl&uuml; prosessor və geniş yaddaş sahəsi ilə m&uuml;asir laptop.</p>', '1500.00', 40, 11, 5, '2024-07-05 00:30:56', '2024-07-05 00:30:56'),
(10, 'Printer', '<p>S&uuml;rətli və dəqiq &ccedil;ap imkanları ilə ofis printeri.</p>', '300.00', 25, 12, 5, '2024-07-05 00:31:13', '2024-07-05 00:31:13'),
(11, 'Divan', '<p>Rahat və geniş oturma yeri olan m&uuml;asir dizaynlı divan.</p>', '800.00', 10, 13, 6, '2024-07-05 00:31:35', '2024-07-05 00:31:35'),
(12, 'Yemək Masası', '<ul>\r\n	<li>Təsvir:</li>\r\n</ul>', '600.00', 15, 14, 6, '2024-07-05 00:31:56', '2024-07-05 00:31:56'),
(13, 'Vitamin D əlavəsi', '<p>İmmunitet sistemini g&uuml;cləndirən və s&uuml;m&uuml;kləri m&ouml;hkəmləndirən vitamin D əlavəsi.</p>', '20.00', 80, 15, 7, '2024-07-05 00:32:16', '2024-07-05 00:32:16'),
(14, 'Üz Kremi', '<p>əmləndirici və qidalandırıcı x&uuml;susiyyətli &uuml;z kremi</p>', '25.00', 100, 17, 7, '2024-07-05 00:32:41', '2024-07-05 00:32:41'),
(15, 'Roman', '<p>Maraqlı və s&uuml;r&uuml;kləyici bir roman.</p>', '15.00', 70, 17, 8, '2024-07-05 00:33:13', '2024-07-05 00:33:13'),
(16, 'Texniki Kitab', '<p>İT sahəsi &uuml;zrə dərin biliklər verən texniki kitab.</p>', '50.00', 50, 18, 9, '2024-07-05 00:33:32', '2024-07-05 00:33:32'),
(17, 'Uşaq Oyuncağı', '<p>Təhl&uuml;kəsiz və təhsilli uşaq oyuncağı.</p>', '10.00', 200, 19, 9, '2024-07-05 00:33:54', '2024-07-05 00:33:54'),
(18, 'Uşaq Arabası', '<p>Rahat və təhl&uuml;kəsiz uşaq arabası.</p>', '250.00', 30, 20, 9, '2024-07-05 00:34:14', '2024-07-05 00:34:14'),
(19, 'İdman və Açıq Hava', '<p>Y&uuml;ng&uuml;l və s&uuml;rətli dağ velosipedi.</p>', '500.00', 20, 21, 10, '2024-07-05 00:34:38', '2024-07-05 00:34:38'),
(20, 'Futbol Topu', '<p>Y&uuml;ksək keyfiyyətli və davamlı futbol topu.</p>', '30.00', 100, 22, 10, '2024-07-05 00:35:05', '2024-07-05 00:35:05');

-- --------------------------------------------------------

--
-- Table structure for table `product_orders`
--

CREATE TABLE `product_orders` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stock` bigint UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_orders`
--

INSERT INTO `product_orders` (`id`, `order_id`, `product_id`, `created_at`, `updated_at`, `stock`) VALUES
(1, 1, 2, '2024-07-05 00:40:40', '2024-07-05 00:40:40', 21);

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  `permission_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `page_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`, `page_id`) VALUES
(50, 14, 1, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 3),
(51, 14, 5, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 3),
(52, 14, 6, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 3),
(53, 14, 7, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 3),
(54, 14, 1, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 4),
(55, 14, 5, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 4),
(56, 14, 6, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 4),
(57, 14, 7, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 4),
(58, 14, 1, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 5),
(59, 14, 5, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 5),
(60, 14, 6, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 5),
(61, 14, 7, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 5),
(62, 14, 1, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 6),
(63, 14, 5, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 6),
(64, 14, 6, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 6),
(65, 14, 7, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 6),
(76, 14, 1, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 2),
(77, 14, 5, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 2),
(78, 14, 6, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 2),
(79, 14, 7, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 2),
(80, 14, 1, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 7),
(81, 14, 5, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 7),
(82, 14, 6, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 7),
(83, 14, 7, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 7),
(87, 14, 1, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 1),
(88, 14, 5, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 1),
(89, 14, 6, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 1),
(90, 14, 7, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 1),
(91, 14, 1, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 8),
(92, 14, 5, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 8),
(93, 14, 6, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 8),
(94, 14, 7, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 8),
(95, 14, 1, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 9),
(96, 14, 5, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 9),
(97, 14, 6, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 9),
(98, 14, 7, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 9),
(99, 14, 1, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 10),
(100, 14, 5, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 10),
(101, 14, 6, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 10),
(102, 14, 7, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 10),
(103, 14, 1, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 11),
(104, 14, 5, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 11),
(105, 14, 6, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 11),
(106, 14, 7, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 11),
(107, 14, 1, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 12),
(108, 14, 5, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 12),
(109, 14, 6, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 12),
(110, 14, 7, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 12),
(111, 14, 1, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 13),
(112, 14, 5, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 13),
(113, 14, 6, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 13),
(114, 14, 7, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 13),
(115, 14, 1, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 14),
(116, 14, 5, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 14),
(117, 14, 6, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 14),
(118, 14, 7, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 14),
(119, 15, 1, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 1),
(120, 15, 5, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 1),
(121, 15, 6, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 1),
(122, 15, 7, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 1),
(123, 15, 1, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 2),
(124, 15, 5, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 2),
(125, 15, 6, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 2),
(126, 15, 7, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 2),
(127, 15, 1, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 3),
(128, 15, 5, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 3),
(129, 15, 6, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 3),
(130, 15, 7, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 3),
(131, 15, 1, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 4),
(132, 15, 5, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 4),
(133, 15, 6, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 4),
(134, 15, 7, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 4),
(139, 15, 1, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 6),
(140, 15, 5, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 6),
(141, 15, 6, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 6),
(142, 15, 7, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 6),
(143, 15, 1, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 7),
(144, 15, 5, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 7),
(145, 15, 6, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 7),
(146, 15, 7, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 7),
(147, 15, 1, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 8),
(148, 15, 5, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 8),
(149, 15, 6, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 8),
(150, 15, 7, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 8),
(151, 15, 1, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 9),
(152, 15, 5, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 9),
(153, 15, 6, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 9),
(154, 15, 7, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 9),
(155, 15, 1, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 10),
(156, 15, 5, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 10),
(157, 15, 6, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 10),
(158, 15, 7, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 10),
(159, 15, 1, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 11),
(160, 15, 5, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 11),
(161, 15, 6, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 11),
(162, 15, 7, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 11),
(163, 15, 1, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 12),
(164, 15, 5, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 12),
(165, 15, 6, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 12),
(166, 15, 7, '2024-07-04 23:45:35', '2024-07-04 23:45:35', 12),
(168, 15, 1, '2024-07-05 00:55:22', '2024-07-05 00:55:22', 5);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `title`, `created_at`, `updated_at`) VALUES
(3, 'TechMart', '2024-07-05 00:18:24', '2024-07-05 00:18:24'),
(4, 'ElectroHub', '2024-07-05 00:18:30', '2024-07-05 00:18:30'),
(5, 'HomeAppliances Co.', '2024-07-05 00:18:37', '2024-07-05 00:18:37'),
(6, 'Domestic Goods Ltd.', '2024-07-05 00:18:43', '2024-07-05 00:18:43'),
(7, 'FashionWear Inc.', '2024-07-05 00:18:50', '2024-07-05 00:18:50'),
(8, 'StyleTrend', '2024-07-05 00:18:55', '2024-07-05 00:18:55'),
(9, 'FreshWater Co.', '2024-07-05 00:19:01', '2024-07-05 00:19:01'),
(10, 'PastaFoods Ltd.', '2024-07-05 00:19:06', '2024-07-05 00:19:06'),
(11, 'TechWorld', '2024-07-05 00:19:15', '2024-07-05 00:19:15'),
(12, 'OfficeTech', '2024-07-05 00:19:20', '2024-07-05 00:19:20'),
(13, 'ComfortFurniture', '2024-07-05 00:20:34', '2024-07-05 00:20:34'),
(14, 'ModernHome', '2024-07-05 00:20:40', '2024-07-05 00:20:40'),
(15, 'HealthPlus', '2024-07-05 00:20:45', '2024-07-05 00:20:45'),
(16, 'BeautyEssentials', '2024-07-05 00:20:51', '2024-07-05 00:20:51'),
(17, 'BookHouse', '2024-07-05 00:20:56', '2024-07-05 00:20:56'),
(18, 'EduBooks', '2024-07-05 00:21:01', '2024-07-05 00:21:01'),
(19, 'KidsWorld', '2024-07-05 00:21:06', '2024-07-05 00:21:06'),
(20, 'BabyGear', '2024-07-05 00:21:12', '2024-07-05 00:21:12'),
(21, 'SportCycle', '2024-07-05 00:21:19', '2024-07-05 00:21:19'),
(22, 'ActiveSports', '2024-07-05 00:21:24', '2024-07-05 00:21:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activate_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` bigint UNSIGNED NOT NULL DEFAULT '16',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reset_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `activate_token`, `user_type`, `remember_token`, `reset_token`, `created_at`, `updated_at`) VALUES
(1, 'Murad Agamedov', 'agamedov94@mail.ru', '2024-07-02 21:23:58', '$2y$12$gMTQCbieckAJcohOOQ..C.XhKQiCsGFbKHO4rUslEEooN/mV//NVS', NULL, 14, NULL, NULL, '2024-07-02 21:22:06', '2024-07-04 06:09:59'),
(2, 'Muhammad Aliyev', 'maga.mamedov.2001@bk.ru', '2024-07-04 23:59:12', '$2y$12$pYpKCLzqCIicYxPOrwTz.eclpd.Q/9YCKGiE5tm0Tf3ScURC6qXFS', NULL, 16, NULL, NULL, '2024-07-04 23:59:02', '2024-07-04 23:59:12');

-- --------------------------------------------------------

--
-- Table structure for table `user_permissions`
--

CREATE TABLE `user_permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_permissions`
--

INSERT INTO `user_permissions` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Baxış', '2024-07-04 23:45:35', '2024-07-04 23:45:35'),
(5, 'Əlavə etmək', '2024-07-04 23:45:35', '2024-07-04 23:45:35'),
(6, 'Yeniləmək', '2024-07-04 23:45:35', '2024-07-04 23:45:35'),
(7, 'Silmək', '2024-07-04 23:45:35', '2024-07-04 23:45:35');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `title`, `created_at`, `updated_at`) VALUES
(14, 'admin', NULL, NULL),
(15, 'menecer', NULL, NULL),
(16, 'işçi', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_role_permissions`
--

CREATE TABLE `user_role_permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `page_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `permission_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `incomes`
--
ALTER TABLE `incomes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invoices_invoice_number_unique` (`invoice_number`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_links`
--
ALTER TABLE `menu_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_order_code_unique` (`order_code`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payments_payment_number_unique` (`payment_number`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_orders`
--
ALTER TABLE `product_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_permissions`
--
ALTER TABLE `user_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role_permissions`
--
ALTER TABLE `user_role_permissions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `incomes`
--
ALTER TABLE `incomes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu_links`
--
ALTER TABLE `menu_links`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product_orders`
--
ALTER TABLE `product_orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_permissions`
--
ALTER TABLE `user_permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_role_permissions`
--
ALTER TABLE `user_role_permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
