-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2020 at 12:38 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_larashop`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `country`, `first_name`, `last_name`, `city`, `state`, `address`, `zip`, `phone`, `email`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Bangladesh', 'naime', 'hossain', 'brahmanbaria', 'bangladesh', 'gukhar 2', '3250', '1961091993', 'hossain.naime@yahoo.com', '3', '2017-09-15 22:31:21', '2017-09-15 22:31:21');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'men', '2017-09-15 11:28:55', '2017-09-15 11:28:55'),
(2, 'women', '2017-09-15 11:29:05', '2017-09-15 11:29:05'),
(3, 'baby', '2017-09-15 11:29:13', '2017-09-15 11:29:13'),
(4, 'sunglass', '2017-09-15 11:30:13', '2017-09-15 11:30:13'),
(5, 'backpack', '2017-09-15 11:30:21', '2017-09-15 11:30:21'),
(6, 'phone', '2017-09-15 11:31:10', '2017-09-15 11:31:10'),
(7, 'laptop', '2017-09-15 11:31:19', '2017-09-15 11:31:19'),
(8, 'camera', '2017-09-15 11:37:26', '2017-09-15 11:37:26'),
(9, 'watch', '2017-09-15 11:55:33', '2017-09-15 11:55:33'),
(10, 'umbrella', '2017-09-15 13:33:30', '2017-09-15 13:33:30');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'black', '2017-09-15 12:57:41', '2017-09-15 12:57:41'),
(2, 'white', '2017-09-15 12:57:41', '2017-09-15 12:57:41'),
(3, 'gray', '2017-09-15 13:12:42', '2017-09-15 13:12:42'),
(4, 'green', '2017-09-15 13:16:24', '2017-09-15 13:16:24'),
(5, 'blue', '2017-09-15 13:16:24', '2017-09-15 13:16:24');

-- --------------------------------------------------------

--
-- Table structure for table `color_product`
--

CREATE TABLE `color_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `color_product`
--

INSERT INTO `color_product` (`id`, `product_id`, `color_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 2, 1, NULL, NULL),
(4, 2, 2, NULL, NULL),
(5, 3, 1, NULL, NULL),
(6, 3, 2, NULL, NULL),
(7, 4, 1, NULL, NULL),
(8, 4, 2, NULL, NULL),
(9, 5, 1, NULL, NULL),
(10, 5, 2, NULL, NULL),
(11, 6, 1, NULL, NULL),
(12, 6, 2, NULL, NULL),
(13, 7, 1, NULL, NULL),
(14, 7, 2, NULL, NULL),
(15, 8, 1, NULL, NULL),
(16, 8, 2, NULL, NULL),
(17, 8, 3, NULL, NULL),
(18, 9, 1, NULL, NULL),
(19, 9, 2, NULL, NULL),
(20, 9, 3, NULL, NULL),
(21, 10, 1, NULL, NULL),
(22, 10, 2, NULL, NULL),
(23, 10, 3, NULL, NULL),
(24, 10, 4, NULL, NULL),
(25, 10, 5, NULL, NULL),
(26, 11, 1, NULL, NULL),
(27, 11, 2, NULL, NULL),
(28, 11, 3, NULL, NULL),
(29, 11, 4, NULL, NULL),
(30, 11, 5, NULL, NULL),
(31, 12, 1, NULL, NULL),
(32, 12, 2, NULL, NULL),
(33, 12, 3, NULL, NULL),
(34, 12, 4, NULL, NULL),
(35, 12, 5, NULL, NULL),
(36, 13, 1, NULL, NULL),
(37, 13, 2, NULL, NULL),
(38, 13, 3, NULL, NULL),
(39, 13, 4, NULL, NULL),
(40, 13, 5, NULL, NULL),
(41, 14, 1, NULL, NULL),
(42, 14, 2, NULL, NULL),
(43, 14, 3, NULL, NULL),
(44, 14, 4, NULL, NULL),
(45, 14, 5, NULL, NULL),
(46, 15, 1, NULL, NULL),
(47, 15, 2, NULL, NULL),
(48, 15, 3, NULL, NULL),
(49, 16, 1, NULL, NULL),
(50, 16, 2, NULL, NULL),
(51, 16, 3, NULL, NULL),
(52, 16, 4, NULL, NULL),
(53, 16, 5, NULL, NULL),
(54, 17, 1, NULL, NULL),
(55, 17, 2, NULL, NULL),
(56, 17, 3, NULL, NULL),
(57, 17, 4, NULL, NULL),
(58, 17, 5, NULL, NULL),
(59, 18, 1, NULL, NULL),
(60, 18, 2, NULL, NULL),
(61, 18, 3, NULL, NULL),
(62, 18, 4, NULL, NULL),
(63, 18, 5, NULL, NULL),
(64, 19, 1, NULL, NULL),
(65, 19, 2, NULL, NULL),
(66, 19, 3, NULL, NULL),
(67, 19, 4, NULL, NULL),
(68, 19, 5, NULL, NULL),
(69, 20, 1, NULL, NULL),
(70, 20, 2, NULL, NULL),
(71, 20, 3, NULL, NULL),
(72, 20, 4, NULL, NULL),
(73, 20, 5, NULL, NULL),
(74, 21, 1, NULL, NULL),
(75, 21, 2, NULL, NULL),
(76, 21, 3, NULL, NULL),
(77, 21, 4, NULL, NULL),
(78, 21, 5, NULL, NULL),
(79, 22, 1, NULL, NULL),
(80, 22, 2, NULL, NULL),
(81, 22, 3, NULL, NULL),
(82, 23, 1, NULL, NULL),
(83, 23, 2, NULL, NULL),
(84, 23, 3, NULL, NULL),
(85, 23, 4, NULL, NULL),
(86, 23, 5, NULL, NULL),
(87, 24, 1, NULL, NULL),
(88, 24, 2, NULL, NULL),
(89, 24, 3, NULL, NULL),
(90, 24, 4, NULL, NULL),
(91, 24, 5, NULL, NULL),
(92, 25, 1, NULL, NULL),
(93, 25, 2, NULL, NULL),
(94, 25, 3, NULL, NULL),
(95, 25, 4, NULL, NULL),
(96, 25, 5, NULL, NULL),
(97, 26, 1, NULL, NULL),
(98, 26, 2, NULL, NULL),
(99, 26, 3, NULL, NULL),
(100, 26, 4, NULL, NULL),
(101, 26, 5, NULL, NULL),
(102, 27, 1, NULL, NULL),
(103, 27, 2, NULL, NULL),
(104, 27, 3, NULL, NULL),
(105, 27, 4, NULL, NULL),
(106, 27, 5, NULL, NULL),
(107, 28, 1, NULL, NULL),
(108, 28, 2, NULL, NULL),
(109, 28, 3, NULL, NULL),
(110, 28, 4, NULL, NULL),
(111, 28, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `site_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_pic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_slogan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_driver` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_host` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_port` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mail_settings`
--

CREATE TABLE `mail_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(161, '2014_10_12_000000_create_users_table', 1),
(162, '2014_10_12_100000_create_password_resets_table', 1),
(163, '2017_07_09_055959_create_products_table', 1),
(164, '2017_07_09_060218_create_categories_table', 1),
(165, '2017_07_09_060327_create_photos_table', 1),
(166, '2017_07_09_065044_create_types_table', 1),
(167, '2017_07_09_070217_create_prodcutType_table', 1),
(168, '2017_07_11_115919_create_roles_table', 1),
(169, '2017_08_01_123223_create_addresses_table', 1),
(170, '2017_08_03_094241_create_orders_table', 1),
(171, '2017_08_03_094823_create_order_product_table', 1),
(172, '2017_08_08_125108_create_jobs_table', 1),
(173, '2017_08_10_091732_create_reviews_table', 1),
(174, '2017_08_23_035829_create_colors_table', 1),
(175, '2017_08_23_040053_create_sizes_table', 1),
(176, '2017_08_23_040803_Create_product_size_table', 1),
(177, '2017_08_23_040925_create_color_product_tabel', 1),
(178, '2017_08_26_105235_create_general_settings_table', 1),
(179, '2017_08_26_105507_create_social_settings_table', 1),
(180, '2017_08_26_105634_create_page_settings_table', 1),
(181, '2017_08_28_060018_create_shop_settings_table', 1),
(182, '2017_08_30_025319_Create_message_table', 1),
(183, '2017_08_31_051838_create_seed_role_table', 1),
(184, '2017_09_15_150634_create_mail_settings_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `is_deliver` int(11) NOT NULL DEFAULT '0',
  `order_token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `address_id`, `is_deliver`, `order_token`, `total`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 0, '$2y$10$0md8HdlGX/sbp9LVBsleUO9l5ChLxZ34YbVxkabnm3sJ4fOH2Gfsi', 202.00, '2017-09-15 22:32:02', '2017-09-15 22:32:02');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id`, `order_id`, `product_id`, `qty`, `color`, `size`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 28, 1, 'black', 'small', 101.00, NULL, NULL),
(2, 1, 24, 1, 'black', NULL, 101.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `page_settings`
--

CREATE TABLE `page_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `termsAndConditions` text COLLATE utf8mb4_unicode_ci,
  `returnPolicy` text COLLATE utf8mb4_unicode_ci,
  `contactUs` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_settings`
--

INSERT INTO `page_settings` (`id`, `termsAndConditions`, `returnPolicy`, `contactUs`, `created_at`, `updated_at`) VALUES
(1, '<h2>Terms and Conditions (\"Terms\")</h2>\r\n<p><br />Last updated: (add date)<br />Please read these Terms and Conditions (\"Terms\", \"Terms and Conditions\") carefully before using the http://www.mywebsite.com (change this) website and the My Mobile App (change this) mobile application (the \"Service\") operated by My Company (change this) (\"us\", \"we\", or \"our\").<br />Your access to and use of the Service is conditioned on your acceptance of and compliance with<br />these Terms. These Terms apply to all visitors, users and others who access or use the Service.<br />By accessing or using the Service you agree to be bound by these Terms. If you disagree<br />with any part of the terms then you may not access the Service.</p>\r\n<h4><br />Purchases</h4>\r\n<p><br />If you wish to purchase any product or service made available through the Service (\"Purchase\"),<br />you may be asked to supply certain information relevant to your Purchase including, without<br />limitation, your &hellip;<br />The Purchases section is for businesses that sell online (physical or digital). For the full<br />disclosure section, create your own Terms and Conditions.</p>\r\n<h4><br />Subscriptions</h4>\r\n<p><br />Some parts of the Service are billed on a subscription basis (\"Subscription(s)\"). You will be billed in<br />advance on a recurring ...<br />The Subscriptions section is for SaaS businesses. For the full disclosure section, create your<br />own Terms and Conditions.</p>\r\n<h4><br />Content</h4>\r\n<p><br />Our Service allows you to post, link, store, share and otherwise make available certain information,<br />text, graphics, videos, or other material (\"Content\"). You are responsible for the &hellip;<br />The Content section is for businesses that allow users to create, edit, share, make content on<br />their websites or apps. For the full disclosure section, create your own Terms and Conditions.<br />Links To Other Web Sites<br />Our Service may contain links to third-party web sites or services that are not owned or controlled<br />by My Company (change this).<br />My Company (change this) has no control over, and assumes no responsibility for, the content,<br />privacy policies, or practices of any third party web sites or services. You further acknowledge and<br />agree that My Company (change this) shall not be responsible or liable, directly or indirectly, for any<br />damage or loss caused or alleged to be caused by or in connection with use of or reliance on any<br />such content, goods or services available on or through any such web sites or services.</p>\r\n<h4><br />Changes</h4>\r\n<p><br />We reserve the right, at our sole discretion, to modify or replace these Terms at any time. If a<br />revision is material we will try to provide at least 30 (change this) days\' notice prior to any new terms<br />taking effect. What constitutes a material change will be determined at our sole discretion.</p>\r\n<h4><br />Contact Us</h4>\r\n<p><br />If you have any questions about these Terms, please contact us.</p>', '<h2>Return &amp; Refund Policy</h2>\r\n<p><br />Thanks for shopping at My Site (change this).<br />If you are not entirely satisfied with your purchase, we\'re here to help.</p>\r\n<h4><br />Returns</h4>\r\n<p><br />You have 30 (change this) calendar days to return an item from the date you received it.<br />To be eligible for a return, your item must be unused and in the same condition that you received it.<br />Your item must be in the original packaging.<br />Your item needs to have the receipt or proof of purchase.<br />For additional information in this section, create your own Return &amp; Refund Policy.</p>\r\n<h4><br />Refunds</h4>\r\n<p><br />Once we receive your item, we will inspect it and notify you that we have received your returned<br />item. We will immediately notify you on the status of your refund after inspecting the item.<br />If your return is approved, we will initiate a refund to your credit card (or original method of<br />payment).<br />You will receive the credit within a certain amount of days, depending on your card issuer\'s policies.<br />For additional information in this section, create your own Return &amp; Refund Policy.</p>\r\n<h4><br />Shipping</h4>\r\n<p><br />You will be responsible for paying for your own shipping costs for returning your item. Shipping<br />costs are nonrefundable.<br />If you receive a refund, the cost of return shipping will be deducted from your refund.<br />For additional information in this section, create your own Return &amp; Refund Policy.</p>\r\n<h4><br />Contact Us</h4>\r\n<p><br />If you have any questions on how to return your item to us, contact us.</p>', 1, '2017-09-15 22:18:07', '2017-09-15 22:18:07');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(10) UNSIGNED NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photoable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photoable_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `path`, `photoable_type`, `photoable_id`, `created_at`, `updated_at`) VALUES
(1, 'camera one383358990display-monitor-camera-camera-monitor-39360.jpeg', 'App\\Product', 1, '2017-09-15 12:57:31', '2017-09-15 12:57:31'),
(3, 'camera one1186005398pexels-photo-69970.jpeg', 'App\\Product', 1, '2017-09-15 12:57:36', '2017-09-15 12:57:36'),
(4, 'camera one980221011pexels-photo-122400.jpeg', 'App\\Product', 1, '2017-09-15 12:57:40', '2017-09-15 12:57:40'),
(5, 'camera one544163941pexels-photo-204954.jpeg', 'App\\Product', 1, '2017-09-15 12:57:41', '2017-09-15 12:57:41'),
(6, 't-shirt one675932172pexels-photo-220139.jpeg', 'App\\Product', 2, '2017-09-15 13:00:05', '2017-09-15 13:00:05'),
(7, 't-shirt one662378613pexels-photo-428311.jpeg', 'App\\Product', 2, '2017-09-15 13:00:11', '2017-09-15 13:00:11'),
(8, 't-shirt one1043394491title-photo-logo-shirt-157646.jpeg', 'App\\Product', 2, '2017-09-15 13:00:13', '2017-09-15 13:00:13'),
(9, 't-shirt rwo1250557332black-and-white-lofty-tone-european-united-states-157778.jpeg', 'App\\Product', 3, '2017-09-15 13:02:17', '2017-09-15 13:02:17'),
(10, 't-shirt rwo747605309black-fashion-fashion-model-model-157944.jpeg', 'App\\Product', 3, '2017-09-15 13:02:21', '2017-09-15 13:02:21'),
(11, 't-shirt rwo382669901pexels-photo-91227.jpeg', 'App\\Product', 3, '2017-09-15 13:02:26', '2017-09-15 13:02:26'),
(12, 't-shirt rwo853369045pexels-photo-247903.jpeg', 'App\\Product', 3, '2017-09-15 13:02:26', '2017-09-15 13:02:26'),
(13, 't-shirt three950265591pexels-photo-212289.jpeg', 'App\\Product', 4, '2017-09-15 13:04:06', '2017-09-15 13:04:06'),
(14, 't-shirt three1325033105pexels-photo-428311.jpeg', 'App\\Product', 4, '2017-09-15 13:04:12', '2017-09-15 13:04:12'),
(15, 't-shirt three1032138309pexels-photo-428340.jpeg', 'App\\Product', 4, '2017-09-15 13:04:13', '2017-09-15 13:04:13'),
(16, 't-shirt three1075004325the-last-shirt-dollar-bill-20-euro-folded-128878.jpeg', 'App\\Product', 4, '2017-09-15 13:04:19', '2017-09-15 13:04:19'),
(17, 'tops one34044715girl-model-pretty-portrait-70845.jpeg', 'App\\Product', 5, '2017-09-15 13:05:58', '2017-09-15 13:05:58'),
(18, 'tops one584870758hair-bracelet-beautiful-beauty-157940.jpeg', 'App\\Product', 5, '2017-09-15 13:06:01', '2017-09-15 13:06:01'),
(19, 'tops one99009936model-modelling-attractive-fashion-157948.jpeg', 'App\\Product', 5, '2017-09-15 13:06:03', '2017-09-15 13:06:03'),
(20, 'tops one1126553893pexels-photo-219549.jpeg', 'App\\Product', 5, '2017-09-15 13:06:07', '2017-09-15 13:06:07'),
(21, 'tops two489444520dog-ice-woman-purple.jpg', 'App\\Product', 6, '2017-09-15 13:08:12', '2017-09-15 13:08:12'),
(22, 'tops two730054767girl-nature-smile-beauty-160998.jpeg', 'App\\Product', 6, '2017-09-15 13:08:15', '2017-09-15 13:08:15'),
(23, 'tops two304472810girl-people-landscape-sun-38554.jpeg', 'App\\Product', 6, '2017-09-15 13:08:17', '2017-09-15 13:08:17'),
(24, 'tops two1127656656pexels-photo-247196.jpeg', 'App\\Product', 6, '2017-09-15 13:08:22', '2017-09-15 13:08:22'),
(25, 'tops two783304204pexels-photo-264172.jpeg', 'App\\Product', 6, '2017-09-15 13:08:24', '2017-09-15 13:08:24'),
(27, 'tops three947049745pexels-photo-169047.jpeg', 'App\\Product', 7, '2017-09-15 13:10:46', '2017-09-15 13:10:46'),
(28, 'tops three1491995024pexels-photo-206434.jpeg', 'App\\Product', 7, '2017-09-15 13:10:50', '2017-09-15 13:10:50'),
(29, 'tops three365119310pexels-photo-227335.jpeg', 'App\\Product', 7, '2017-09-15 13:10:55', '2017-09-15 13:10:55'),
(30, 'tops three775172143pexels-photo-372052.jpeg', 'App\\Product', 7, '2017-09-15 13:10:58', '2017-09-15 13:10:58'),
(31, 'tops three1317360770pexels-photo-428034.jpeg', 'App\\Product', 7, '2017-09-15 13:11:00', '2017-09-15 13:11:00'),
(32, 'tops three548666771pexels-photo-428338.jpeg', 'App\\Product', 7, '2017-09-15 13:11:02', '2017-09-15 13:11:02'),
(33, 'tops four1182192727pexels-photo-136673.jpeg', 'App\\Product', 8, '2017-09-15 13:12:33', '2017-09-15 13:12:33'),
(34, 'tops four1199697507pexels-photo-247304.jpeg', 'App\\Product', 8, '2017-09-15 13:12:34', '2017-09-15 13:12:34'),
(35, 'tops four355471033pexels-photo-255274.jpeg', 'App\\Product', 8, '2017-09-15 13:12:35', '2017-09-15 13:12:35'),
(36, 'tops four1276056931pexels-photo-284006.jpeg', 'App\\Product', 8, '2017-09-15 13:12:38', '2017-09-15 13:12:38'),
(37, 'tops four821805659pexels-photo-413841.jpeg', 'App\\Product', 8, '2017-09-15 13:12:41', '2017-09-15 13:12:41'),
(38, 'tops five329053083pexels-photo-206525.jpeg', 'App\\Product', 9, '2017-09-15 13:14:16', '2017-09-15 13:14:16'),
(39, 'tops five819416609pexels-photo-206539.jpeg', 'App\\Product', 9, '2017-09-15 13:14:19', '2017-09-15 13:14:19'),
(40, 'tops five1364729521pexels-photo-206542.jpeg', 'App\\Product', 9, '2017-09-15 13:14:22', '2017-09-15 13:14:22'),
(41, 'tops five89729220pexels-photo-206584.jpeg', 'App\\Product', 9, '2017-09-15 13:14:25', '2017-09-15 13:14:25'),
(42, 'tops five1479314614pexels-photo-206605.jpeg', 'App\\Product', 9, '2017-09-15 13:14:29', '2017-09-15 13:14:29'),
(43, 'jacket one742597798pexels-photo-234575.jpeg', 'App\\Product', 10, '2017-09-15 13:16:19', '2017-09-15 13:16:19'),
(44, 'jacket one707174739pexels-photo-234599.jpeg', 'App\\Product', 10, '2017-09-15 13:16:20', '2017-09-15 13:16:20'),
(45, 'jacket one115825592pexels-photo-234627.jpeg', 'App\\Product', 10, '2017-09-15 13:16:21', '2017-09-15 13:16:21'),
(46, 'jacket one1501000440pexels-photo-234628.jpeg', 'App\\Product', 10, '2017-09-15 13:16:21', '2017-09-15 13:16:21'),
(47, 'jacket one499828092pexels-photo-234631.jpeg', 'App\\Product', 10, '2017-09-15 13:16:22', '2017-09-15 13:16:22'),
(48, 'jacket one1438424297pexels-photo-234653.jpeg', 'App\\Product', 10, '2017-09-15 13:16:23', '2017-09-15 13:16:23'),
(49, 'jacket two318348110pexels-photo-54202.jpeg', 'App\\Product', 11, '2017-09-15 13:18:06', '2017-09-15 13:18:06'),
(50, 'jacket two1181595715pexels-photo-54203.jpeg', 'App\\Product', 11, '2017-09-15 13:18:08', '2017-09-15 13:18:08'),
(51, 'jacket two1252212118pexels-photo-54206.jpeg', 'App\\Product', 11, '2017-09-15 13:18:09', '2017-09-15 13:18:09'),
(52, 'jacket two833797304pexels-photo-206434.jpeg', 'App\\Product', 11, '2017-09-15 13:18:13', '2017-09-15 13:18:13'),
(53, 'jacket two1026809345pexels-photo-324658.jpeg', 'App\\Product', 11, '2017-09-15 13:18:17', '2017-09-15 13:18:17'),
(54, 'jacket two964554811pexels-photo-432679.jpeg', 'App\\Product', 11, '2017-09-15 13:18:23', '2017-09-15 13:18:23'),
(55, 'jacket three581425254pexels-photo (5).jpg', 'App\\Product', 12, '2017-09-15 13:19:44', '2017-09-15 13:19:44'),
(56, 'jacket three170361505pexels-photo-207081.jpeg', 'App\\Product', 12, '2017-09-15 13:19:47', '2017-09-15 13:19:47'),
(57, 'jacket three411890749pexels-photo-247887.jpeg', 'App\\Product', 12, '2017-09-15 13:19:50', '2017-09-15 13:19:50'),
(58, 'jacket three368749042pexels-photo-262038.jpeg', 'App\\Product', 12, '2017-09-15 13:19:52', '2017-09-15 13:19:52'),
(59, 'jacket three1382510271pexels-photo-326559.jpeg', 'App\\Product', 12, '2017-09-15 13:19:53', '2017-09-15 13:19:53'),
(60, 'jacket four577244358pexels-photo-91227.jpeg', 'App\\Product', 13, '2017-09-15 13:21:18', '2017-09-15 13:21:18'),
(61, 'jacket four537961971pexels-photo-262038.jpeg', 'App\\Product', 13, '2017-09-15 13:21:20', '2017-09-15 13:21:20'),
(62, 'jacket four749167984pexels-photo-375880.jpeg', 'App\\Product', 13, '2017-09-15 13:21:21', '2017-09-15 13:21:21'),
(63, 'shirt992351323man-crazy-funny-dude-45882.jpeg', 'App\\Product', 14, '2017-09-15 13:23:34', '2017-09-15 13:23:34'),
(64, 'shirt172566858pexels-photo-175701.jpeg', 'App\\Product', 14, '2017-09-15 13:23:38', '2017-09-15 13:23:38'),
(65, 'shirt1028647340pexels-photo-193355.jpeg', 'App\\Product', 14, '2017-09-15 13:23:42', '2017-09-15 13:23:42'),
(66, 'shirt223932607pexels-photo-415326.jpeg', 'App\\Product', 14, '2017-09-15 13:23:45', '2017-09-15 13:23:45'),
(67, 't-shirt six1475088425pexels-photo-412840.jpeg', 'App\\Product', 15, '2017-09-15 13:26:10', '2017-09-15 13:26:10'),
(68, 't-shirt six1156832104pexels-photo-451552.jpeg', 'App\\Product', 15, '2017-09-15 13:26:15', '2017-09-15 13:26:15'),
(69, 'suite one360387288pexels-photo-173125.jpeg', 'App\\Product', 16, '2017-09-15 13:27:38', '2017-09-15 13:27:38'),
(70, 'suite one612208137pexels-photo-207081.jpeg', 'App\\Product', 16, '2017-09-15 13:27:41', '2017-09-15 13:27:41'),
(71, 'suite one938091240pexels-photo-404171.jpeg', 'App\\Product', 16, '2017-09-15 13:27:47', '2017-09-15 13:27:47'),
(72, 'suite two472629298pexels-photo-423364.jpeg', 'App\\Product', 17, '2017-09-15 13:28:53', '2017-09-15 13:28:53'),
(73, 'suite two355609097pexels-photo-551653.jpeg', 'App\\Product', 17, '2017-09-15 13:28:58', '2017-09-15 13:28:58'),
(74, 'suite two1032323105pexels-photo-551658.jpeg', 'App\\Product', 17, '2017-09-15 13:29:04', '2017-09-15 13:29:04'),
(75, 'suite three1233789068pexels-photo-447186.jpeg', 'App\\Product', 18, '2017-09-15 13:30:45', '2017-09-15 13:30:45'),
(76, 'suite three1295584196pexels-photo-447189.jpeg', 'App\\Product', 18, '2017-09-15 13:30:46', '2017-09-15 13:30:46'),
(77, 'suite three1421150054pexels-photo-450212.jpeg', 'App\\Product', 18, '2017-09-15 13:30:50', '2017-09-15 13:30:50'),
(78, 'umbrella one17321015dots-dotted-color-cute-41512.jpeg', 'App\\Product', 19, '2017-09-15 13:35:08', '2017-09-15 13:35:08'),
(79, 'umbrella one549769963pexels-photo-237637.jpeg', 'App\\Product', 19, '2017-09-15 13:35:11', '2017-09-15 13:35:11'),
(80, 'umbrella one1448119632pexels-photo-247114.jpeg', 'App\\Product', 19, '2017-09-15 13:35:18', '2017-09-15 13:35:18'),
(81, 'umbrella one169626501pexels-photo-247199.jpeg', 'App\\Product', 19, '2017-09-15 13:35:22', '2017-09-15 13:35:22'),
(82, 'umbrella one708140107spots-fashion-female-girl-41216.jpeg', 'App\\Product', 19, '2017-09-15 13:35:25', '2017-09-15 13:35:25'),
(83, 'watch one1030164039pexels-photo-125779.jpeg', 'App\\Product', 20, '2017-09-15 13:36:44', '2017-09-15 13:36:44'),
(84, 'watch one553859045pexels-photo-190819.jpeg', 'App\\Product', 20, '2017-09-15 13:36:47', '2017-09-15 13:36:47'),
(85, 'watch one741174129pexels-photo-277319.jpeg', 'App\\Product', 20, '2017-09-15 13:36:48', '2017-09-15 13:36:48'),
(86, 'watch one716593907pexels-photo-280250.jpeg', 'App\\Product', 20, '2017-09-15 13:36:49', '2017-09-15 13:36:49'),
(87, 'watch one1024834500watch-fashion-accessories-clothes-157627.jpeg', 'App\\Product', 20, '2017-09-15 13:36:52', '2017-09-15 13:36:52'),
(88, 'iphone one1247434897ios-new-mobile-gadget-163096.jpeg', 'App\\Product', 21, '2017-09-15 13:38:03', '2017-09-15 13:38:03'),
(89, 'iphone one1253913052iphone-6-apple-ios-iphone-50684.jpeg', 'App\\Product', 21, '2017-09-15 13:38:05', '2017-09-15 13:38:05'),
(90, 'iphone one336909879pexels-photo-238541.jpeg', 'App\\Product', 21, '2017-09-15 13:38:09', '2017-09-15 13:38:09'),
(91, 'imac one967679828pexels-photo (1).jpg', 'App\\Product', 22, '2017-09-15 13:39:13', '2017-09-15 13:39:13'),
(92, 'imac one141462643pexels-photo.jpg', 'App\\Product', 22, '2017-09-15 13:39:17', '2017-09-15 13:39:17'),
(93, 'imac one1331467172pexels-photo-293333.jpeg', 'App\\Product', 22, '2017-09-15 13:39:22', '2017-09-15 13:39:22'),
(94, 'imac one698216241pexels-photo-306763.jpeg', 'App\\Product', 22, '2017-09-15 13:39:25', '2017-09-15 13:39:25'),
(95, 'sungalss one1177553669girl-portrait-carnival-retro-46244 (1).jpeg', 'App\\Product', 23, '2017-09-15 13:40:36', '2017-09-15 13:40:36'),
(96, 'sungalss one1376079205man-crazy-funny-dude-45882.jpeg', 'App\\Product', 23, '2017-09-15 13:40:41', '2017-09-15 13:40:41'),
(97, 'sunglass two561256194pexels-photo-343720.jpeg', 'App\\Product', 24, '2017-09-15 13:41:44', '2017-09-15 13:41:44'),
(98, 'sunglass two206611748pexels-photo-386410.jpeg', 'App\\Product', 24, '2017-09-15 13:41:47', '2017-09-15 13:41:47'),
(99, 'sunglass two1046336659pexels-photo-577794.jpeg', 'App\\Product', 24, '2017-09-15 13:41:50', '2017-09-15 13:41:50'),
(100, 'baby dress one1429926097child-children-girl-happy.jpg', 'App\\Product', 25, '2017-09-15 13:42:40', '2017-09-15 13:42:40'),
(101, 'baby dress one727023442pexels-photo-356274.jpeg', 'App\\Product', 25, '2017-09-15 13:42:41', '2017-09-15 13:42:41'),
(102, 'baby dress two958812738pexels-photo-157053.jpeg', 'App\\Product', 26, '2017-09-15 13:43:36', '2017-09-15 13:43:36'),
(103, 'baby dress two1268523635pexels-photo-189857.jpeg', 'App\\Product', 26, '2017-09-15 13:43:38', '2017-09-15 13:43:38'),
(104, 'baby dress two94599426pexels-photo-264109.jpeg', 'App\\Product', 26, '2017-09-15 13:43:41', '2017-09-15 13:43:41'),
(105, 'baby dress two1398546163school-vintage-desk-back-to-school-159764.jpeg', 'App\\Product', 26, '2017-09-15 13:43:43', '2017-09-15 13:43:43'),
(106, 'backpack one520319846pexels-photo-108009.jpeg', 'App\\Product', 27, '2017-09-15 13:44:59', '2017-09-15 13:44:59'),
(107, 'backpack one331626370pexels-photo-346767.jpeg', 'App\\Product', 27, '2017-09-15 13:45:03', '2017-09-15 13:45:03'),
(108, 'backpack one1288050060pexels-photo-443417.jpeg', 'App\\Product', 27, '2017-09-15 13:45:07', '2017-09-15 13:45:07'),
(109, 'purse one84353845adult-bag-bags-buy-41277.jpeg', 'App\\Product', 28, '2017-09-15 13:46:35', '2017-09-15 13:46:35'),
(110, 'purse one446441348fashion-glasses-go-pro-female-157888.jpeg', 'App\\Product', 28, '2017-09-15 13:46:39', '2017-09-15 13:46:39'),
(111, 'purse one1500083366pexels-photo-167703.jpeg', 'App\\Product', 28, '2017-09-15 13:46:45', '2017-09-15 13:46:45'),
(112, 'purse one117387841pexels-photo-291762.jpeg', 'App\\Product', 28, '2017-09-15 13:46:49', '2017-09-15 13:46:49'),
(113, 'purse one1247848836pexels-photo-413841.jpeg', 'App\\Product', 28, '2017-09-15 13:46:53', '2017-09-15 13:46:53');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `rating` double(8,2) UNSIGNED DEFAULT NULL,
  `is_available` int(11) NOT NULL DEFAULT '1',
  `is_feature` int(11) NOT NULL DEFAULT '0',
  `inStock` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `slug`, `category_id`, `rating`, `is_available`, `is_feature`, `inStock`, `created_at`, `updated_at`) VALUES
(1, 'camera one', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />proident, sunt in culpa qui officia deserunt mollit anim orum.</p>', '200', 'camera-one', 8, NULL, 1, 1, 30, '2017-09-15 12:57:24', '2019-07-30 05:14:37'),
(2, 't-shirt one', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '20', 't-shirt-one', 1, NULL, 1, 0, 20, '2017-09-15 12:59:58', '2017-09-15 12:59:58'),
(3, 't-shirt rwo', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '30', 't-shirt-rwo', 1, NULL, 1, 0, 30, '2017-09-15 13:02:15', '2017-09-15 13:02:15'),
(4, 't-shirt three', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '50', 't-shirt-three', 1, NULL, 1, 0, 20, '2017-09-15 13:04:00', '2017-09-15 13:04:00'),
(5, 'tops one', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '60', 'tops-one', 2, NULL, 1, 0, 50, '2017-09-15 13:05:55', '2017-09-15 13:05:55'),
(6, 'tops two', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '70', 'tops-two', 2, NULL, 1, 1, 40, '2017-09-15 13:08:10', '2017-09-15 13:08:10'),
(7, 'tops three', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '80', 'tops-three', 2, NULL, 1, 1, 50, '2017-09-15 13:10:40', '2017-09-15 13:10:40'),
(8, 'tops four', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '50', 'tops-four', 2, NULL, 1, 1, 50, '2017-09-15 13:12:29', '2017-09-15 13:12:29'),
(9, 'tops five', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '100', 'tops-five', 2, NULL, 1, 0, 50, '2017-09-15 13:14:11', '2017-09-15 13:14:11'),
(10, 'jacket one', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '200', 'jacket-one', 2, NULL, 1, 1, 100, '2017-09-15 13:16:18', '2017-09-15 13:16:18'),
(11, 'jacket two', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '200', 'jacket-two', 2, NULL, 1, 0, 30, '2017-09-15 13:18:02', '2017-09-15 13:18:02'),
(12, 'jacket three', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '300', 'jacket-three', 1, NULL, 1, 1, 300, '2017-09-15 13:19:38', '2017-09-15 13:19:38'),
(13, 'jacket four', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '240', 'jacket-four', 1, NULL, 1, 1, 70, '2017-09-15 13:21:14', '2017-09-15 13:21:14'),
(14, 'shirt', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '50', 'shirt', 1, NULL, 1, 0, 80, '2017-09-15 13:23:29', '2017-09-15 13:23:29'),
(15, 't-shirt six', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '100', 't-shirt-six', 1, 5.00, 1, 1, 90, '2017-09-15 13:26:05', '2017-09-15 15:22:00'),
(16, 'suite one', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '400', 'suite-one', 1, NULL, 1, 0, 100, '2017-09-15 13:27:35', '2017-09-15 13:27:35'),
(17, 'suite two', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '200', 'suite-two', 1, 5.00, 1, 1, 100, '2017-09-15 13:28:46', '2017-09-15 15:21:03'),
(18, 'suite three', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '500', 'suite-three', 1, 5.00, 1, 1, 200, '2017-09-15 13:30:42', '2017-09-15 15:22:10'),
(19, 'umbrella one', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '100', 'umbrella-one', 10, NULL, 1, 0, 100, '2017-09-15 13:35:04', '2017-09-15 13:35:04'),
(20, 'watch one', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '100', 'watch-one', 9, 5.00, 1, 1, 200, '2017-09-15 13:36:43', '2017-09-15 15:22:19'),
(21, 'iphone one', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '500', 'iphone-one', 6, NULL, 1, 0, 200, '2017-09-15 13:37:58', '2017-09-15 13:37:58'),
(22, 'imac one', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '1000', 'imac-one', 7, NULL, 1, 0, 100, '2017-09-15 13:39:08', '2017-09-15 13:39:08'),
(23, 'sungalss one', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '20', 'sungalss-one', 1, NULL, 1, 0, 100, '2017-09-15 13:40:30', '2017-09-15 13:40:30'),
(24, 'sunglass two', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '100', 'sunglass-two', 4, 5.00, 1, 0, 99, '2017-09-15 13:41:41', '2017-09-15 22:32:03'),
(25, 'baby dress one', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '70', 'baby-dress-one', 3, 5.00, 1, 0, 100, '2017-09-15 13:42:37', '2017-09-15 15:20:32'),
(26, 'baby dress two', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '100', 'baby-dress-two', 3, NULL, 1, 0, 100, '2017-09-15 13:43:35', '2017-09-15 13:43:35'),
(27, 'backpack one', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '100', 'backpack-one', 5, NULL, 1, 0, 299, '2017-09-15 13:44:58', '2017-09-15 13:44:58'),
(28, 'purse one', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '100', 'purse-one', 2, NULL, 1, 1, 99, '2017-09-15 13:46:31', '2017-09-15 22:32:02');

-- --------------------------------------------------------

--
-- Table structure for table `product_size`
--

CREATE TABLE `product_size` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_size`
--

INSERT INTO `product_size` (`id`, `product_id`, `size_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, NULL, NULL),
(2, 2, 2, NULL, NULL),
(3, 2, 3, NULL, NULL),
(4, 2, 4, NULL, NULL),
(5, 3, 1, NULL, NULL),
(6, 3, 2, NULL, NULL),
(7, 3, 3, NULL, NULL),
(8, 3, 4, NULL, NULL),
(9, 4, 1, NULL, NULL),
(10, 4, 2, NULL, NULL),
(11, 4, 3, NULL, NULL),
(12, 4, 4, NULL, NULL),
(13, 5, 1, NULL, NULL),
(14, 5, 2, NULL, NULL),
(15, 5, 3, NULL, NULL),
(16, 5, 4, NULL, NULL),
(17, 6, 1, NULL, NULL),
(18, 6, 2, NULL, NULL),
(19, 6, 3, NULL, NULL),
(20, 6, 4, NULL, NULL),
(21, 7, 1, NULL, NULL),
(22, 7, 2, NULL, NULL),
(23, 7, 3, NULL, NULL),
(24, 7, 4, NULL, NULL),
(25, 8, 1, NULL, NULL),
(26, 8, 2, NULL, NULL),
(27, 8, 3, NULL, NULL),
(28, 8, 4, NULL, NULL),
(29, 9, 1, NULL, NULL),
(30, 9, 2, NULL, NULL),
(31, 9, 3, NULL, NULL),
(32, 9, 4, NULL, NULL),
(33, 10, 1, NULL, NULL),
(34, 10, 2, NULL, NULL),
(35, 10, 3, NULL, NULL),
(36, 10, 4, NULL, NULL),
(37, 11, 1, NULL, NULL),
(38, 11, 2, NULL, NULL),
(39, 11, 3, NULL, NULL),
(40, 11, 4, NULL, NULL),
(41, 12, 1, NULL, NULL),
(42, 12, 2, NULL, NULL),
(43, 12, 3, NULL, NULL),
(44, 12, 4, NULL, NULL),
(45, 13, 1, NULL, NULL),
(46, 13, 2, NULL, NULL),
(47, 13, 3, NULL, NULL),
(48, 13, 4, NULL, NULL),
(49, 14, 1, NULL, NULL),
(50, 14, 2, NULL, NULL),
(51, 14, 3, NULL, NULL),
(52, 14, 4, NULL, NULL),
(53, 15, 1, NULL, NULL),
(54, 15, 2, NULL, NULL),
(55, 15, 3, NULL, NULL),
(56, 15, 4, NULL, NULL),
(57, 16, 1, NULL, NULL),
(58, 16, 2, NULL, NULL),
(59, 16, 3, NULL, NULL),
(60, 16, 4, NULL, NULL),
(61, 17, 1, NULL, NULL),
(62, 17, 2, NULL, NULL),
(63, 17, 3, NULL, NULL),
(64, 17, 4, NULL, NULL),
(65, 18, 1, NULL, NULL),
(66, 18, 2, NULL, NULL),
(67, 18, 3, NULL, NULL),
(68, 18, 4, NULL, NULL),
(69, 25, 1, NULL, NULL),
(70, 25, 2, NULL, NULL),
(71, 25, 3, NULL, NULL),
(72, 25, 4, NULL, NULL),
(73, 26, 1, NULL, NULL),
(74, 26, 2, NULL, NULL),
(75, 26, 3, NULL, NULL),
(76, 26, 4, NULL, NULL),
(77, 27, 1, NULL, NULL),
(78, 27, 2, NULL, NULL),
(79, 27, 3, NULL, NULL),
(80, 27, 4, NULL, NULL),
(81, 28, 1, NULL, NULL),
(82, 28, 2, NULL, NULL),
(83, 28, 3, NULL, NULL),
(84, 28, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`id`, `product_id`, `type_id`, `created_at`, `updated_at`) VALUES
(1, 1, 5, NULL, NULL),
(2, 2, 1, NULL, NULL),
(3, 3, 1, NULL, NULL),
(4, 4, 1, NULL, NULL),
(5, 5, 2, NULL, NULL),
(6, 6, 2, NULL, NULL),
(7, 7, 2, NULL, NULL),
(8, 8, 2, NULL, NULL),
(9, 9, 2, NULL, NULL),
(10, 10, 9, NULL, NULL),
(11, 11, 9, NULL, NULL),
(12, 12, 9, NULL, NULL),
(13, 13, 9, NULL, NULL),
(14, 14, 1, NULL, NULL),
(15, 15, 1, NULL, NULL),
(16, 16, 4, NULL, NULL),
(17, 17, 4, NULL, NULL),
(18, 18, 4, NULL, NULL),
(19, 19, 11, NULL, NULL),
(20, 20, 10, NULL, NULL),
(21, 21, 3, NULL, NULL),
(22, 22, 3, NULL, NULL),
(23, 23, 11, NULL, NULL),
(24, 24, 3, NULL, NULL),
(25, 25, 1, NULL, NULL),
(26, 26, 2, NULL, NULL),
(27, 27, 11, NULL, NULL),
(28, 28, 8, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `rating` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `rating`, `product_id`, `user_id`, `review`, `created_at`, `updated_at`) VALUES
(1, 5, 25, 3, 'nice product', '2017-09-15 15:20:32', '2017-09-15 15:20:32'),
(2, 5, 17, 3, 'wow dashing', '2017-09-15 15:21:03', '2017-09-15 15:21:03'),
(3, 5, 15, 3, 'lovely', '2017-09-15 15:22:00', '2017-09-15 15:22:00'),
(4, 5, 18, 3, 'awesome', '2017-09-15 15:22:10', '2017-09-15 15:22:10'),
(5, 5, 20, 3, 'trendy', '2017-09-15 15:22:19', '2017-09-15 15:22:19'),
(6, 5, 24, 3, 'nice', '2017-09-15 15:22:28', '2017-09-15 15:22:28');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'user', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shop_settings`
--

CREATE TABLE `shop_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `tax` double(8,2) NOT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_secret` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paypal_client_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paypal_secret` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paypal_option` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'small', '2017-09-15 13:00:13', '2017-09-15 13:00:13'),
(2, 'larage', '2017-09-15 13:00:13', '2017-09-15 13:00:13'),
(3, 'xl', '2017-09-15 13:00:14', '2017-09-15 13:00:14'),
(4, 'medium', '2017-09-15 13:00:14', '2017-09-15 13:00:14');

-- --------------------------------------------------------

--
-- Table structure for table `social_settings`
--

CREATE TABLE `social_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'facebook.com',
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'twitter.com',
  `linkedin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'linkedin.com',
  `googlePlus` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'googleplus.com',
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'instagram.com',
  `tumblr` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'tumblr.com',
  `whatsApp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'whatsapp.com',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_settings`
--

INSERT INTO `social_settings` (`id`, `facebook`, `twitter`, `linkedin`, `googlePlus`, `instagram`, `tumblr`, `whatsApp`, `created_at`, `updated_at`) VALUES
(1, 'https://www.facebook.com/naime.hossain.3', 'https://twitter.com/NaimeH_B', 'https://www.linkedin.com/in/naime-hossain-a604a6107/', 'https://plus.google.com/u/0/106947629883304967382', 'https://www.instagram.com/?hl=en', 'https://www.tumblr.com/', NULL, '2017-09-15 22:21:32', '2017-09-15 22:21:32');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 't-shirt', '2017-09-15 11:31:50', '2017-09-15 11:31:50'),
(2, 'tops', '2017-09-15 11:31:58', '2017-09-15 11:31:58'),
(3, 'apple', '2017-09-15 11:32:13', '2017-09-15 11:32:13'),
(4, 'suite', '2017-09-15 11:32:24', '2017-09-15 11:32:24'),
(5, 'cannon', '2017-09-15 11:32:31', '2017-09-15 11:32:31'),
(6, 'jeans', '2017-09-15 11:32:40', '2017-09-15 11:32:40'),
(7, 'pant', '2017-09-15 11:33:10', '2017-09-15 11:33:10'),
(8, 'purse', '2017-09-15 11:33:20', '2017-09-15 11:33:20'),
(9, 'jacket', '2017-09-15 11:45:12', '2017-09-15 11:45:12'),
(10, 'rolax', '2017-09-15 11:55:51', '2017-09-15 11:55:51'),
(11, 'shankar', '2017-09-15 13:33:44', '2017-09-15 13:33:44'),
(12, 'sungalss', '2017-09-15 13:40:37', '2017-09-15 13:40:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '0',
  `role_id` int(11) NOT NULL DEFAULT '2',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `is_active`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$Gxr00yKOZJ.paQg.hcQOceDIjoLe03Ne6ysHPezYTp9z38n5UqFp2', 1, 1, 'Zhn5QhztlETOf1tLaGRAMFk41GXGUb8DEkmu78KwxuaqEyQH1EZaRI61Xp5C', '2017-09-15 09:36:07', '2017-09-15 09:36:07'),
(2, 'Customer', 'customer@yaoo.com', '$2y$10$K9bta7o84aTQnH3I//UEveBGxjkUZxVcQ/XoFWDMw0sgrEA.vJsD6', 1, 2, 'AvFwm1P5MjawcC3XXprz6bgJkJdd1Ki3qbuwHuWj5ujkbj5T1KBvVkKFbAxq', '2017-09-15 14:53:51', '2017-09-15 15:19:08'),
(3, 'naime hossain', 'hossain.naime@yahoo.com', '$2y$10$hy9U.k9qyzEfci5PqK5.A.IfedvfKiiFPLrvyMvWI6EZGE3lXgZ7q', 1, 2, 'aijkwf0vUqBtr1BNQYH5S0wqj7a0OfhUZY4KShFTlowv5bXy8Jf1joop0GNp', '2017-09-15 15:19:34', '2017-09-15 15:19:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color_product`
--
ALTER TABLE `color_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_reserved_at_index` (`queue`,`reserved_at`);

--
-- Indexes for table `mail_settings`
--
ALTER TABLE `mail_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_settings`
--
ALTER TABLE `page_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_settings`
--
ALTER TABLE `shop_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_settings`
--
ALTER TABLE `social_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `color_product`
--
ALTER TABLE `color_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mail_settings`
--
ALTER TABLE `mail_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `page_settings`
--
ALTER TABLE `page_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `product_size`
--
ALTER TABLE `product_size`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shop_settings`
--
ALTER TABLE `shop_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `social_settings`
--
ALTER TABLE `social_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
