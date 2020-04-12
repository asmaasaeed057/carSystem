-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 12, 2020 at 11:20 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `ItemName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 1,
  `price` double(8,2) NOT NULL,
  `subTotal` double(8,2) DEFAULT NULL,
  `tax` double(8,2) NOT NULL,
  `total` double(8,2) NOT NULL,
  `car_id` int(10) UNSIGNED DEFAULT NULL,
  `client_id` int(10) UNSIGNED DEFAULT NULL,
  `admin_id` int(10) UNSIGNED DEFAULT NULL,
  `paidAmount` double(8,2) DEFAULT NULL,
  `isDebet` double(8,2) DEFAULT NULL,
  `status` enum('panding','accepted','finished','underMaintance') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'panding',
  `reprairCard_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `ItemName`, `qty`, `price`, `subTotal`, `tax`, `total`, `car_id`, `client_id`, `admin_id`, `paidAmount`, `isDebet`, `status`, `reprairCard_id`, `created_at`, `updated_at`) VALUES
(3, 'رسوم صيانة', 1, 250.00, 250.00, 12.50, 262.50, 1, 1, 1, NULL, NULL, 'underMaintance', 2, '2020-01-22 14:26:54', '2020-01-27 17:46:55'),
(4, 'فحمات', 1, 15.00, 15.00, 0.00, 15.00, 1, 1, 1, NULL, NULL, 'underMaintance', 2, '2020-01-22 14:27:47', '2020-01-27 17:46:55'),
(5, 'اصلاح', 1, 100.00, 100.00, 5.00, 105.00, 1, 1, 1, NULL, NULL, 'underMaintance', 1, '2020-01-27 14:19:18', '2020-01-27 15:53:23'),
(6, 'maintance', 1, 250.00, 250.00, 12.50, 262.50, 1, 1, 1, NULL, NULL, 'accepted', 8, '2020-01-27 18:12:57', '2020-01-27 18:12:57'),
(7, 'hghg', 1, 10.00, 10.00, 50.50, 60.50, 2, 1, 1, NULL, NULL, 'underMaintance', 9, '2020-01-28 09:37:40', '2020-01-28 09:37:55'),
(8, 'مكابح امامية', 2, 10.00, 20.00, 0.00, 20.00, 1, 1, 1, NULL, NULL, 'accepted', 1, '2020-03-02 19:11:24', '2020-03-02 19:11:24');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `group_id` bigint(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `group_id`) VALUES
(1, 'Ashraf', 'admin@gmail.com', '$2y$10$m7Vffeh7iIbKPPVeFsEtHuIjk6xubZAqb4KZurT642NCoEcM7MpYu', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(10) UNSIGNED NOT NULL,
  `model` int(11) NOT NULL,
  `platNo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `car_structure_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `car_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `carType_id` int(10) UNSIGNED DEFAULT NULL,
  `car_brand_category_id` int(10) UNSIGNED DEFAULT NULL,
  `client_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `model`, `platNo`, `car_structure_number`, `car_color`, `carType_id`, `car_brand_category_id`, `client_id`, `created_at`, `updated_at`) VALUES
(24, 2017, 'FDL158', '95875', 'red', 1, 6, 15, NULL, NULL),
(25, 2003, 'Yml548', '85214', 'brown', 1, 21, 15, NULL, NULL),
(26, 2010, 'FmL175', '65485', 'black', 1, 8, 16, NULL, NULL),
(27, 2013, 'Yim458', '23895', 'yellow', 1, 10, 16, NULL, NULL),
(28, 2015, 'Hio586', '54823', 'silver', 1, 9, 17, NULL, NULL),
(29, 2002, 'PLM565', '78569', 'White', 1, 20, 17, NULL, NULL),
(30, 2001, 'OPL123', '96347', 'Red', 1, 9, 18, NULL, NULL),
(32, 2014, 'Elk214', '65478', 'white', 1, 21, 19, NULL, NULL),
(33, 2003, 'YUI456', '32145', 'Black', 1, 18, 20, NULL, NULL),
(34, 2002, 'LKI23', '65897', 'Orange', 1, 10, 21, NULL, NULL),
(35, 2006, 'YUP158', '96874', 'White', 1, 17, 22, NULL, NULL),
(36, 2003, 'RTO25', '25478', 'Yello', 1, 16, 23, NULL, NULL),
(37, 1990, 'GHK154', '51646', 'red', 1, 7, 18, '2020-04-12 16:22:42', '2020-04-12 16:22:42'),
(38, 2014, 'FGY4845', '01264848', 'yellow', 1, 9, 30, '2020-04-12 16:59:18', '2020-04-12 17:05:10'),
(40, 2015, 'IOM4654', '65646', 'green', 1, 10, 32, '2020-04-12 17:45:53', '2020-04-12 17:45:53'),
(42, 2022, 'klkhk3135', '65646', 'blue', 2, 6, 17, '2020-04-12 17:50:17', '2020-04-12 17:50:17'),
(43, 2003, 'BBJ666', '65646', 'yellow', 1, 9, 33, '2020-04-12 18:10:41', '2020-04-12 18:10:41');

-- --------------------------------------------------------

--
-- Table structure for table `car_brands`
--

CREATE TABLE `car_brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `car_brands`
--

INSERT INTO `car_brands` (`id`, `name_ar`, `name_en`, `created_at`, `updated_at`) VALUES
(15, 'شيروكي', 'Sheroky', NULL, NULL),
(16, 'نيسان', 'Nessan', NULL, NULL),
(17, 'تويوتا', 'Toyota', NULL, NULL),
(18, 'هيونداي', 'Heondi', NULL, NULL),
(19, 'كيا', 'Kia', NULL, NULL),
(20, 'ماتريكس', 'Matrics', NULL, NULL),
(21, 'لادا', 'Lada', NULL, NULL),
(22, 'سيزوكي', 'Sizoki', NULL, NULL),
(23, 'مارسيدس', 'Marsides', NULL, NULL),
(24, 'هامر', 'hummer', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `car_brand_category`
--

CREATE TABLE `car_brand_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `car_brand_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `car_brand_category`
--

INSERT INTO `car_brand_category` (`id`, `name_ar`, `name_en`, `car_brand_id`, `created_at`, `updated_at`) VALUES
(6, '370Z', '370Z', 16, NULL, NULL),
(7, 'Altima', 'Altima', 16, NULL, NULL),
(8, 'Armada', 'Armada', 16, NULL, NULL),
(9, 'Frontier', 'Frontier', 16, NULL, NULL),
(10, 'Kicks', 'Kicks', 16, NULL, NULL),
(11, 'LEAFs', 'LEAF', 16, NULL, NULL),
(12, 'Latitude', 'Latitude', 15, NULL, NULL),
(13, 'Latitude Plus', 'Latitude Plus', 15, NULL, NULL),
(14, 'Altitude', 'Altitude', 15, NULL, NULL),
(15, 'Upland', 'Upland', 15, NULL, NULL),
(16, 'Limited', 'Limited', 15, NULL, NULL),
(17, '4Runner', '4Runner', 17, NULL, NULL),
(18, 'Avalon', 'Avalon', 17, NULL, NULL),
(19, 'Camry', 'Camry', 17, NULL, NULL),
(20, 'Corolla', 'Corolla', 17, NULL, NULL),
(21, 'Highlander', 'Highlander', 17, NULL, NULL),
(22, 'Accent', 'Accent', 18, NULL, NULL),
(23, 'Elantra', 'Elantra', 18, NULL, NULL),
(24, 'Ioniq', 'Ioniq', 18, NULL, NULL),
(25, 'Cadenza', 'Cadenza', 19, NULL, NULL),
(26, 'Forte', 'Forte', 19, NULL, NULL),
(27, 'K900', 'K900', 19, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `car_services`
--

CREATE TABLE `car_services` (
  `service_id` bigint(11) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `service_number` varchar(255) NOT NULL,
  `service_type` int(11) NOT NULL,
  `service_cost` varchar(255) NOT NULL,
  `service_client_cost` varchar(255) NOT NULL,
  `service_working_hours` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `car_services`
--

INSERT INTO `car_services` (`service_id`, `service_name`, `service_number`, `service_type`, `service_cost`, `service_client_cost`, `service_working_hours`) VALUES
(5, 'تغير زجاج', '1', 1, '1000', '300', '5'),
(6, 'تغير موتور', '2', 1, '2000', '600', '3'),
(7, 'تغير زيت', '3', 1, '200', '300', '1'),
(8, 'تركيب باب', '4', 2, '2000', '2500', '7'),
(9, 'تركيب كاوتش', '5', 2, '200', '250', '1'),
(10, ' سمركه', '6', 2, '500', '600', '5'),
(11, ' باب', '7', 3, '1000', '1200', '3'),
(12, ' زجاج', '8', 3, '500', '600', '7'),
(13, ' ماتور', '9', 4, '3000', '3500', '8'),
(14, ' شاكمان', '10', 4, '3200', '3500', '9');

-- --------------------------------------------------------

--
-- Table structure for table `car_types`
--

CREATE TABLE `car_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `car_types`
--

INSERT INTO `car_types` (`id`, `name_ar`, `name_en`, `created_at`, `updated_at`) VALUES
(1, 'صالون', 'salon', '2020-01-21 18:51:49', '2020-01-21 18:51:49'),
(2, 'شاحنة', 'trunk', '2020-01-27 14:02:13', '2020-01-27 14:02:30');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'contract',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `fullName`, `phone`, `address`, `email`, `client_type`, `created_at`, `updated_at`) VALUES
(15, 'Menna', 1003004369, 'wengt', 'menna@gmail.com', 'contract', NULL, NULL),
(16, 'Asmaa', 2147483647, 'mahrmbieh', 'asmaa@gmail.com', 'contract', NULL, NULL),
(17, 'Mariam', 1005700314, 'sidibasher', 'mariam@gmail.com', 'contract', NULL, NULL),
(18, 'Ahmed Ali', 1656568568, 'mostafakamel', 'ahmedali@gmail.com', 'contract', NULL, '2020-04-12 16:15:04'),
(19, 'samah', 1656568568, 'mostafakamel', 'samah@gmail.com', 'contract', NULL, NULL),
(20, 'amira', 1658544496, NULL, NULL, 'noneContract', NULL, NULL),
(21, 'islam', 1236858444, NULL, NULL, 'noneContract', NULL, NULL),
(22, 'sherouk', 1656565654, NULL, NULL, 'noneContract', NULL, NULL),
(23, 'sara', 126868644, NULL, NULL, 'noneContract', NULL, NULL),
(24, 'youstina', 1656565654, NULL, NULL, 'noneContract', NULL, NULL),
(25, 'asmaa', 2147483647, NULL, NULL, 'noneContract', '2020-04-12 13:01:43', '2020-04-12 13:01:43'),
(26, 'loly', 2147483647, NULL, NULL, 'noneContract', '2020-04-12 13:33:24', '2020-04-12 13:33:24'),
(27, 'looly', 2147483647, NULL, NULL, 'noneContract', '2020-04-12 13:35:27', '2020-04-12 13:35:27'),
(30, 'toka', 2147483647, NULL, NULL, 'noneContract', '2020-04-12 16:59:18', '2020-04-12 16:59:18'),
(32, 'salma', 22151554, NULL, NULL, 'noneContract', '2020-04-12 17:45:53', '2020-04-12 17:45:53'),
(33, 'loly', 2147483647, 'سيدى بشر', 'admin@gmail.com', 'contract', '2020-04-12 18:09:26', '2020-04-12 18:09:26');

-- --------------------------------------------------------

--
-- Table structure for table `custom_invoice`
--

CREATE TABLE `custom_invoice` (
  `invoice_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `invoice_date` date NOT NULL,
  `invoice_taxes` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `custom_invoice`
--

INSERT INTO `custom_invoice` (`invoice_id`, `invoice_number`, `client_name`, `invoice_date`, `invoice_taxes`) VALUES
(9, 1, 'yousra ali', '2020-04-12', '5');

-- --------------------------------------------------------

--
-- Table structure for table `custom_invoice_items`
--

CREATE TABLE `custom_invoice_items` (
  `item_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `service_id` bigint(11) NOT NULL,
  `client_cost` varchar(255) NOT NULL,
  `price_cost` varchar(2555) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `custom_invoice_items`
--

INSERT INTO `custom_invoice_items` (`item_id`, `invoice_id`, `service_id`, `client_cost`, `price_cost`) VALUES
(18, 9, 5, '300', '1000');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `expense_id` int(11) NOT NULL,
  `expense_name` varchar(255) NOT NULL,
  `expense_bill` varchar(255) NOT NULL,
  `expense_price` varchar(255) NOT NULL,
  `expense_tax` varchar(255) NOT NULL,
  `expense_date` datetime NOT NULL,
  `expense_notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`expense_id`, `expense_name`, `expense_bill`, `expense_price`, `expense_tax`, `expense_date`, `expense_notes`) VALUES
(4, 'kt3 8ear', '900', '5000', '6', '2020-04-01 00:00:00', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(5, 'smkkra', '88', '5000', '100', '2020-04-25 00:00:00', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `group_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `group_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `group_role`
--

CREATE TABLE `group_role` (
  `group_role_id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `group_role`
--

INSERT INTO `group_role` (`group_role_id`, `group_id`, `role_id`, `created_at`, `updated_at`) VALUES
(204, 1, 1, '2020-04-12 10:47:41', '2020-04-12 10:47:41'),
(205, 1, 2, '2020-04-12 10:47:41', '2020-04-12 10:47:41'),
(206, 1, 3, '2020-04-12 10:47:41', '2020-04-12 10:47:41'),
(207, 1, 4, '2020-04-12 10:47:41', '2020-04-12 10:47:41'),
(208, 1, 5, '2020-04-12 10:47:42', '2020-04-12 10:47:42'),
(209, 1, 6, '2020-04-12 10:47:42', '2020-04-12 10:47:42'),
(210, 1, 7, '2020-04-12 10:47:42', '2020-04-12 10:47:42'),
(211, 1, 52, '2020-04-12 10:47:42', '2020-04-12 10:47:42'),
(212, 1, 53, '2020-04-12 10:47:42', '2020-04-12 10:47:42'),
(213, 1, 54, '2020-04-12 10:47:42', '2020-04-12 10:47:42'),
(214, 1, 55, '2020-04-12 10:47:42', '2020-04-12 10:47:42'),
(215, 1, 56, '2020-04-12 10:47:42', '2020-04-12 10:47:42'),
(216, 1, 57, '2020-04-12 10:47:42', '2020-04-12 10:47:42'),
(217, 1, 9, '2020-04-12 10:47:42', '2020-04-12 10:47:42'),
(218, 1, 10, '2020-04-12 10:47:42', '2020-04-12 10:47:42'),
(219, 1, 11, '2020-04-12 10:47:42', '2020-04-12 10:47:42'),
(220, 1, 12, '2020-04-12 10:47:42', '2020-04-12 10:47:42'),
(221, 1, 13, '2020-04-12 10:47:42', '2020-04-12 10:47:42'),
(222, 1, 14, '2020-04-12 10:47:43', '2020-04-12 10:47:43'),
(223, 1, 15, '2020-04-12 10:47:43', '2020-04-12 10:47:43'),
(224, 1, 112, '2020-04-12 10:47:43', '2020-04-12 10:47:43'),
(225, 1, 113, '2020-04-12 10:47:43', '2020-04-12 10:47:43'),
(226, 1, 114, '2020-04-12 10:47:43', '2020-04-12 10:47:43'),
(227, 1, 115, '2020-04-12 10:47:43', '2020-04-12 10:47:43'),
(228, 1, 116, '2020-04-12 10:47:43', '2020-04-12 10:47:43'),
(229, 1, 117, '2020-04-12 10:47:43', '2020-04-12 10:47:43'),
(230, 1, 118, '2020-04-12 10:47:43', '2020-04-12 10:47:43'),
(231, 1, 16, '2020-04-12 10:47:43', '2020-04-12 10:47:43'),
(232, 1, 17, '2020-04-12 10:47:43', '2020-04-12 10:47:43'),
(233, 1, 18, '2020-04-12 10:47:43', '2020-04-12 10:47:43'),
(234, 1, 19, '2020-04-12 10:47:43', '2020-04-12 10:47:43'),
(235, 1, 20, '2020-04-12 10:47:43', '2020-04-12 10:47:43'),
(236, 1, 21, '2020-04-12 10:47:43', '2020-04-12 10:47:43'),
(237, 1, 24, '2020-04-12 10:47:44', '2020-04-12 10:47:44'),
(238, 1, 25, '2020-04-12 10:47:44', '2020-04-12 10:47:44'),
(239, 1, 26, '2020-04-12 10:47:44', '2020-04-12 10:47:44'),
(240, 1, 27, '2020-04-12 10:47:44', '2020-04-12 10:47:44'),
(241, 1, 28, '2020-04-12 10:47:44', '2020-04-12 10:47:44'),
(242, 1, 29, '2020-04-12 10:47:44', '2020-04-12 10:47:44'),
(243, 1, 30, '2020-04-12 10:47:44', '2020-04-12 10:47:44'),
(244, 1, 31, '2020-04-12 10:47:44', '2020-04-12 10:47:44'),
(245, 1, 32, '2020-04-12 10:47:44', '2020-04-12 10:47:44'),
(246, 1, 33, '2020-04-12 10:47:44', '2020-04-12 10:47:44'),
(247, 1, 34, '2020-04-12 10:47:44', '2020-04-12 10:47:44'),
(248, 1, 35, '2020-04-12 10:47:44', '2020-04-12 10:47:44'),
(249, 1, 36, '2020-04-12 10:47:44', '2020-04-12 10:47:44'),
(250, 1, 37, '2020-04-12 10:47:44', '2020-04-12 10:47:44'),
(251, 1, 38, '2020-04-12 10:47:45', '2020-04-12 10:47:45'),
(252, 1, 39, '2020-04-12 10:47:45', '2020-04-12 10:47:45'),
(253, 1, 40, '2020-04-12 10:47:45', '2020-04-12 10:47:45'),
(254, 1, 41, '2020-04-12 10:47:45', '2020-04-12 10:47:45'),
(255, 1, 42, '2020-04-12 10:47:45', '2020-04-12 10:47:45'),
(256, 1, 43, '2020-04-12 10:47:45', '2020-04-12 10:47:45'),
(257, 1, 58, '2020-04-12 10:47:45', '2020-04-12 10:47:45'),
(258, 1, 59, '2020-04-12 10:47:45', '2020-04-12 10:47:45'),
(259, 1, 60, '2020-04-12 10:47:45', '2020-04-12 10:47:45'),
(260, 1, 61, '2020-04-12 10:47:45', '2020-04-12 10:47:45'),
(261, 1, 62, '2020-04-12 10:47:45', '2020-04-12 10:47:45'),
(262, 1, 63, '2020-04-12 10:47:45', '2020-04-12 10:47:45'),
(263, 1, 64, '2020-04-12 10:47:45', '2020-04-12 10:47:45'),
(264, 1, 65, '2020-04-12 10:47:46', '2020-04-12 10:47:46'),
(265, 1, 66, '2020-04-12 10:47:46', '2020-04-12 10:47:46'),
(266, 1, 67, '2020-04-12 10:47:46', '2020-04-12 10:47:46'),
(267, 1, 68, '2020-04-12 10:47:46', '2020-04-12 10:47:46'),
(268, 1, 69, '2020-04-12 10:47:46', '2020-04-12 10:47:46'),
(269, 1, 70, '2020-04-12 10:47:46', '2020-04-12 10:47:46'),
(270, 1, 71, '2020-04-12 10:47:46', '2020-04-12 10:47:46'),
(271, 1, 72, '2020-04-12 10:47:46', '2020-04-12 10:47:46'),
(272, 1, 73, '2020-04-12 10:47:46', '2020-04-12 10:47:46'),
(273, 1, 74, '2020-04-12 10:47:46', '2020-04-12 10:47:46'),
(274, 1, 75, '2020-04-12 10:47:46', '2020-04-12 10:47:46'),
(275, 1, 76, '2020-04-12 10:47:46', '2020-04-12 10:47:46'),
(276, 1, 77, '2020-04-12 10:47:46', '2020-04-12 10:47:46'),
(277, 1, 78, '2020-04-12 10:47:47', '2020-04-12 10:47:47'),
(278, 1, 79, '2020-04-12 10:47:47', '2020-04-12 10:47:47'),
(279, 1, 80, '2020-04-12 10:47:47', '2020-04-12 10:47:47'),
(280, 1, 81, '2020-04-12 10:47:47', '2020-04-12 10:47:47'),
(281, 1, 82, '2020-04-12 10:47:47', '2020-04-12 10:47:47'),
(282, 1, 83, '2020-04-12 10:47:47', '2020-04-12 10:47:47'),
(283, 1, 84, '2020-04-12 10:47:47', '2020-04-12 10:47:47'),
(284, 1, 85, '2020-04-12 10:47:47', '2020-04-12 10:47:47'),
(285, 1, 86, '2020-04-12 10:47:47', '2020-04-12 10:47:47'),
(286, 1, 87, '2020-04-12 10:47:47', '2020-04-12 10:47:47'),
(287, 1, 88, '2020-04-12 10:47:47', '2020-04-12 10:47:47'),
(288, 1, 89, '2020-04-12 10:47:47', '2020-04-12 10:47:47'),
(289, 1, 90, '2020-04-12 10:47:47', '2020-04-12 10:47:47'),
(290, 1, 91, '2020-04-12 10:47:47', '2020-04-12 10:47:47'),
(291, 1, 92, '2020-04-12 10:47:47', '2020-04-12 10:47:47'),
(292, 1, 93, '2020-04-12 10:47:47', '2020-04-12 10:47:47'),
(293, 1, 94, '2020-04-12 10:47:48', '2020-04-12 10:47:48'),
(294, 1, 95, '2020-04-12 10:47:48', '2020-04-12 10:47:48'),
(295, 1, 96, '2020-04-12 10:47:48', '2020-04-12 10:47:48'),
(296, 1, 97, '2020-04-12 10:47:48', '2020-04-12 10:47:48'),
(297, 1, 98, '2020-04-12 10:47:48', '2020-04-12 10:47:48'),
(298, 1, 99, '2020-04-12 10:47:48', '2020-04-12 10:47:48'),
(299, 1, 100, '2020-04-12 10:47:48', '2020-04-12 10:47:48'),
(300, 1, 101, '2020-04-12 10:47:48', '2020-04-12 10:47:48'),
(301, 1, 106, '2020-04-12 10:47:48', '2020-04-12 10:47:48'),
(302, 1, 102, '2020-04-12 10:47:48', '2020-04-12 10:47:48'),
(303, 1, 103, '2020-04-12 10:47:48', '2020-04-12 10:47:48'),
(304, 1, 104, '2020-04-12 10:47:48', '2020-04-12 10:47:48'),
(305, 1, 105, '2020-04-12 10:47:48', '2020-04-12 10:47:48'),
(306, 1, 107, '2020-04-12 10:47:48', '2020-04-12 10:47:48'),
(307, 1, 108, '2020-04-12 10:47:48', '2020-04-12 10:47:48'),
(308, 1, 109, '2020-04-12 10:47:48', '2020-04-12 10:47:48'),
(309, 1, 110, '2020-04-12 10:47:49', '2020-04-12 10:47:49'),
(310, 1, 111, '2020-04-12 10:47:49', '2020-04-12 10:47:49'),
(311, 1, 119, '2020-04-12 10:47:49', '2020-04-12 10:47:49'),
(312, 1, 120, '2020-04-12 10:47:49', '2020-04-12 10:47:49'),
(313, 1, 121, '2020-04-12 10:47:49', '2020-04-12 10:47:49'),
(314, 1, 122, '2020-04-12 10:47:49', '2020-04-12 10:47:49'),
(315, 1, 123, '2020-04-12 10:47:49', '2020-04-12 10:47:49'),
(316, 1, 124, '2020-04-12 10:47:49', '2020-04-12 10:47:49'),
(317, 1, 125, '2020-04-12 10:47:49', '2020-04-12 10:47:49'),
(318, 1, 126, NULL, NULL),
(319, 1, 127, NULL, NULL),
(320, 1, 128, NULL, NULL),
(321, 1, 129, NULL, NULL),
(322, 1, 130, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `invoice_id` int(11) UNSIGNED NOT NULL,
  `invoice_number` varchar(255) NOT NULL,
  `invoice_date` datetime NOT NULL,
  `invoice_total` varchar(255) NOT NULL,
  `repair_card_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`invoice_id`, `invoice_number`, `invoice_date`, `invoice_total`, `repair_card_id`) VALUES
(16, '2', '2020-04-12 18:59:19', '945', 14),
(18, '3', '2020-04-12 19:45:54', '262.5', 16),
(19, '1', '2020-04-12 19:54:15', '630', 13),
(20, '4', '2020-04-12 20:21:39', '2625', 17);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_payment`
--

CREATE TABLE `invoice_payment` (
  `invoice_payment_id` int(11) UNSIGNED NOT NULL,
  `invoice_payment_number` varchar(255) NOT NULL,
  `invoice_payment_date` datetime NOT NULL,
  `invoice_payment_amount` varchar(255) NOT NULL,
  `invoice_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoice_payment`
--

INSERT INTO `invoice_payment` (`invoice_payment_id`, `invoice_payment_number`, `invoice_payment_date`, `invoice_payment_amount`, `invoice_id`) VALUES
(13, '1', '2020-04-12 19:59:57', '100', 19),
(14, '2', '2020-04-12 20:00:33', '530', 19),
(15, '3', '2020-04-12 20:01:03', '300', 16),
(16, '4', '2020-04-12 20:08:49', '20', 16),
(17, '5', '2020-04-12 20:22:19', '2500', 20);

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
(13, '2013_01_01_030935_create_admin_groups_table', 1),
(14, '2014_10_12_000000_create_users_table', 1),
(15, '2014_10_12_100000_create_password_resets_table', 1),
(16, '2019_12_27_212401_create_admins_table', 1),
(17, '2019_12_28_010703_create_companies_table', 1),
(18, '2019_12_28_231438_create_clients_table', 1),
(19, '2019_12_29_010730_create_car_catograys_table', 1),
(20, '2019_12_29_010745_create_car_types_table', 1),
(21, '2019_12_29_235744_create_cars_table', 1),
(22, '2019_12_30_234905_create_reprair_cards_table', 1),
(23, '2020_01_07_124618_create_accounts_table', 1),
(24, '2020_01_19_213314_create_costs_table', 1),
(25, '2020_01_19_202938_create_boxes_table', 2),
(26, '2020_01_26_120046_create_receipt_vouchers_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `operation_orders`
--

CREATE TABLE `operation_orders` (
  `operation_order_id` int(11) UNSIGNED NOT NULL,
  `operation_order_number` varchar(255) NOT NULL,
  `operation_order_date` datetime NOT NULL,
  `invoice_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `operation_orders`
--

INSERT INTO `operation_orders` (`operation_order_id`, `operation_order_number`, `operation_order_date`, `invoice_id`) VALUES
(16, '2', '2020-04-12 18:59:19', 16),
(17, '2', '2020-04-12 19:04:19', 17),
(18, '3', '2020-04-12 19:45:54', 18),
(19, '1', '2020-04-12 19:54:15', 19),
(20, '4', '2020-04-12 20:21:40', 20);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `repair_cards_items`
--

CREATE TABLE `repair_cards_items` (
  `card_item_id` int(11) NOT NULL,
  `card_id` int(11) UNSIGNED NOT NULL,
  `service_id` bigint(20) NOT NULL,
  `service_client_cost` varchar(255) NOT NULL,
  `service_cost` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `repair_cards_items`
--

INSERT INTO `repair_cards_items` (`card_item_id`, `card_id`, `service_id`, `service_client_cost`, `service_cost`) VALUES
(55, 13, 5, '300', '1000'),
(56, 13, 7, '300', '200'),
(71, 14, 5, '300', '1000'),
(72, 14, 13, '3500', '3000'),
(73, 14, 11, '1200', '1000'),
(75, 16, 9, '250', '200'),
(76, 16, 9, '250', '200'),
(77, 17, 8, '2500', '2000');

-- --------------------------------------------------------

--
-- Table structure for table `repair_cards_status`
--

CREATE TABLE `repair_cards_status` (
  `card_status_id` int(11) NOT NULL,
  `card_status` enum('panding','accepted','finished','underMaintance','denied') NOT NULL DEFAULT 'panding',
  `card_status_date` date NOT NULL,
  `card_id` int(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `repair_cards_status`
--

INSERT INTO `repair_cards_status` (`card_status_id`, `card_status`, `card_status_date`, `card_id`) VALUES
(26, 'accepted', '2020-04-12', 13),
(27, 'accepted', '2020-04-12', 17);

-- --------------------------------------------------------

--
-- Table structure for table `reprair_cards`
--

CREATE TABLE `reprair_cards` (
  `id` int(10) UNSIGNED NOT NULL,
  `car_id` int(10) UNSIGNED DEFAULT NULL,
  `status` enum('panding','accepted','finished','underMaintance','denied') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'panding',
  `checkReprort` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `card_number` int(11) NOT NULL,
  `card_taxes` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reprair_cards`
--

INSERT INTO `reprair_cards` (`id`, `car_id`, `status`, `checkReprort`, `client_id`, `created_at`, `updated_at`, `card_number`, `card_taxes`, `employee_id`) VALUES
(13, 30, 'accepted', 'report 1', 18, '2020-04-12 16:49:17', '2020-04-12 17:54:09', 1, 5, 5),
(14, 38, 'accepted', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 30, '2020-04-12 16:59:18', '2020-04-12 17:22:22', 2, 5, 7),
(16, 40, 'accepted', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 32, '2020-04-12 17:45:53', '2020-04-12 17:45:53', 3, 5, 5),
(17, 43, 'accepted', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 33, '2020-04-12 18:13:40', '2020-04-12 18:20:22', 4, 5, 6);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `role_controller` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_action` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_label` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_controller_label` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_controller`, `role_action`, `role_label`, `role_controller_label`, `created_at`, `updated_at`) VALUES
(1, 'client', 'index', 'client', 'client', NULL, NULL),
(2, 'client', 'create', 'create client', 'client', NULL, NULL),
(3, 'client', 'store', 'save client', 'client', NULL, NULL),
(4, 'client', 'edit', 'edit client', 'client', NULL, NULL),
(5, 'client', 'update', 'update client', 'client', NULL, NULL),
(6, 'client', 'destroy', 'delete client', 'client', NULL, NULL),
(7, 'client', 'show', 'show client', 'client', NULL, NULL),
(9, 'service', 'index', 'service', 'service', NULL, NULL),
(10, 'service', 'create', 'create service', 'service', NULL, NULL),
(11, 'service', 'store', 'save service', 'service', NULL, NULL),
(12, 'service', 'edit', 'edit service', 'service', NULL, NULL),
(13, 'service', 'update', 'update service', 'service', NULL, NULL),
(14, 'service', 'destroy', 'delete service', 'service', NULL, NULL),
(15, 'service', 'show', 'show service', 'service', NULL, NULL),
(16, 'cartype', 'index', 'carType', 'car Type', NULL, NULL),
(17, 'cartype', 'create', 'create carType', 'car Type', NULL, NULL),
(18, 'cartype', 'store', 'save carType', 'car Type', NULL, NULL),
(19, 'cartype', 'edit', 'edit carType', 'car Type', NULL, NULL),
(20, 'cartype', 'update', 'update carType', 'car Type', NULL, NULL),
(21, 'cartype', 'destroy', 'delete carType', 'carType', NULL, NULL),
(24, 'car', 'index', 'car', 'car', NULL, NULL),
(25, 'car', 'create', 'create car', 'car', NULL, NULL),
(26, 'car', 'store', 'save car', 'car', NULL, NULL),
(27, 'car', 'edit', 'edit car', 'car', NULL, NULL),
(28, 'car', 'update', 'update car', 'car', NULL, NULL),
(29, 'car', 'destroy', 'delete car', 'car', NULL, NULL),
(30, 'carbrand', 'index', 'car Brand', 'car Brand', NULL, NULL),
(31, 'carbrand', 'create', 'create car Brand', 'car Brand', NULL, NULL),
(32, 'carbrand', 'store', 'save car Brand', 'car Brand', NULL, NULL),
(33, 'carbrand', 'edit', 'edit car Brand', 'car Brand', NULL, NULL),
(34, 'carbrand', 'update', 'update car Brand', 'car Brand', NULL, NULL),
(35, 'carbrand', 'destroy', 'delete car Brand', 'car Brand', NULL, NULL),
(36, 'carbrand', 'show', 'show car Brand', 'car Brand', NULL, NULL),
(37, 'carbrandcategory', 'index', 'car Brand Category', 'car Brand Category', NULL, NULL),
(38, 'carbrandcategory', 'create', 'create car Brand Category', 'car Brand Category', NULL, NULL),
(39, 'carbrandcategory', 'store', 'save car Brand Category', 'car Brand Category', NULL, NULL),
(40, 'carbrandcategory', 'edit', 'edit car Brand Category', 'car Brand Category', NULL, NULL),
(41, 'carbrandcategory', 'update', 'update car Brand Category', 'car Brand Category', NULL, NULL),
(42, 'carbrandcategory', 'destroy', 'delete car Brand Category', 'car Brand Category', NULL, NULL),
(43, 'carbrandcategory', 'show', 'show car Brand Category', 'car Brand Category', NULL, NULL),
(52, 'client', 'search', 'search client', 'client', NULL, NULL),
(53, 'client', 'createNoneContractClient', 'create none contract client', 'client', NULL, NULL),
(54, 'client', 'storeNoneContractClient', 'save none contract client', 'client', NULL, NULL),
(55, 'client', 'indexNoneContract', 'None contract client', 'client', NULL, NULL),
(56, 'client', 'editNoneContractClient', 'edit none contract client', 'client', NULL, NULL),
(57, 'client', 'updateNoneContractClient', 'update none contract client', 'client', NULL, NULL),
(58, 'custominvoice', 'index', 'Custom Invoice', 'Custom Invoice', NULL, NULL),
(59, 'custominvoice', 'create', 'create Custom Invoice', 'Custom Invoice', NULL, NULL),
(60, 'custominvoice', 'store', 'save Custom Invoice', 'Custom Invoice', NULL, NULL),
(61, 'custominvoice', 'edit', 'edit Custom Invoice', 'Custom Invoice', NULL, NULL),
(62, 'custominvoice', 'update', 'update Custom Invoice', 'Custom Invoice', NULL, NULL),
(63, 'custominvoice', 'destroy', 'delete Custom Invoice', 'Custom Invoice', NULL, NULL),
(64, 'custominvoice', 'show', 'show Custom Invoice', 'Custom Invoice', NULL, NULL),
(65, 'expense', 'index', 'expense', 'expense', NULL, NULL),
(66, 'expense', 'create', 'create expense', 'expense', NULL, NULL),
(67, 'expense', 'store', 'save expense', 'expense', NULL, NULL),
(68, 'expense', 'edit', 'edit expense', 'expense', NULL, NULL),
(69, 'expense', 'update', 'update expense', 'expense', NULL, NULL),
(70, 'expense', 'destroy', 'delete expense', 'expense', NULL, NULL),
(71, 'expense', 'show', 'show expense', 'expense', NULL, NULL),
(72, 'expensereport', 'index', 'expense Report', 'report', NULL, NULL),
(73, 'expensereport', 'search', 'search expense report', 'report', NULL, NULL),
(74, 'expensetaxreport', 'index', 'expense Tax Report', 'report', NULL, NULL),
(75, 'expensetaxreport', 'search', 'search expense Tax report', 'report', NULL, NULL),
(76, 'group', 'index', 'group', 'group', NULL, NULL),
(77, 'group', 'create', 'create group', 'group', NULL, NULL),
(78, 'group', 'store', 'save group', 'group', NULL, NULL),
(79, 'group', 'edit', 'edit group', 'group', NULL, NULL),
(80, 'group', 'update', 'update group', 'group', NULL, NULL),
(81, 'group', 'destroy', 'delete group', 'group', NULL, NULL),
(82, 'incomereport', 'index', 'income contract client Report', 'report', NULL, NULL),
(83, 'incomereport', 'search', 'search income contract client Report', 'report', NULL, NULL),
(84, 'incomereport', 'indexNoneContract', 'income none contract client Report', 'report', NULL, NULL),
(85, 'incomereport', 'searchNoneContract', 'search income none contract client Report', 'report', NULL, NULL),
(86, 'incomereport', 'index', 'invoice contract client Report', 'report', NULL, NULL),
(87, 'incomereport', 'search', 'search invoice contract client Report', 'report', NULL, NULL),
(88, 'incomereport', 'indexNoneContract', 'invoice none contract client Report', 'report', NULL, NULL),
(89, 'incomereport', 'searchNoneContract', 'search invoice none contract client Report', 'report', NULL, NULL),
(90, 'operationorder', 'index', 'operation Order', 'operation Order', NULL, NULL),
(91, 'operationorder', 'show', 'show operation Order', 'operation Order', NULL, NULL),
(92, 'repraircard', 'approved', 'approve reprairCard', 'reprair Card', NULL, NULL),
(93, 'repraircard', 'denied', 'deny reprairCard', 'reprair Card', NULL, NULL),
(94, 'repraircard', 'index', 'reprairCard ', 'reprair Card', NULL, NULL),
(95, 'repraircard', 'invoiceIndexNoneContract', 'invoice Index None Contract', 'reprair Card', NULL, NULL),
(96, 'repraircard', 'create', 'create reprairCard', 'reprair Card', NULL, NULL),
(97, 'repraircard', 'store', 'save reprairCard', 'reprair Card', NULL, NULL),
(98, 'repraircard', 'createRepairCardFromClient', 'create Repair Card From Client', 'reprair Card', NULL, NULL),
(99, 'repraircard', 'show', 'show reprairCard', 'reprair Card', NULL, NULL),
(100, 'repraircard', 'edit', 'edit reprairCard', 'reprair Card', NULL, NULL),
(101, 'repraircard', 'update', 'update reprairCard', 'reprair Card', NULL, NULL),
(102, 'repraircard', 'ClientReport', 'client report', 'report', NULL, NULL),
(103, 'repraircard', 'clientSearch', 'client search', 'report', NULL, NULL),
(104, 'repraircard', 'cardTaxesReport', 'card Taxes Report', 'report', NULL, NULL),
(105, 'repraircard', 'cardTaxesSearch', 'card Taxes Search', 'report', NULL, NULL),
(106, 'repraircard', 'cardSearch', 'card Search', 'reprair Card', NULL, NULL),
(107, 'repraircard', 'createInvoice', 'create Invoice', 'invoice', NULL, NULL),
(108, 'repraircard', 'invoiceIndex', 'invoices', 'invoice', NULL, NULL),
(109, 'repraircard', 'invoiceShow', 'invoice Show', 'invoice', NULL, NULL),
(110, 'repraircard', 'invoicePayment', 'create payment', 'payment', NULL, NULL),
(111, 'repraircard', 'paymentStore', 'save payment', 'payment', NULL, NULL),
(112, 'service', 'index', 'service', 'service', NULL, NULL),
(113, 'service', 'create', 'create service', 'service', NULL, NULL),
(114, 'service', 'store', 'save service', 'service', NULL, NULL),
(115, 'service', 'edit', 'edit service', 'service', NULL, NULL),
(116, 'service', 'update', 'update service', 'service', NULL, NULL),
(117, 'service', 'destroy', 'delete service', 'service', NULL, NULL),
(118, 'service', 'show', 'show service', 'service', NULL, NULL),
(119, 'technicalemployee', 'index', 'technical Employee', 'technical Employee', NULL, NULL),
(120, 'technicalemployee', 'create', 'create technical Employee', 'technical Employee', NULL, NULL),
(121, 'technicalemployee', 'store', 'save technical Employee', 'technical Employee', NULL, NULL),
(122, 'technicalemployee', 'edit', 'edit technicalEmployee', 'technical Employee', NULL, NULL),
(123, 'technicalemployee', 'update', 'update technicalEmployee', 'technical Employee', NULL, NULL),
(124, 'technicalemployee', 'destroy', 'delete technicalEmployee', 'technical Employee', NULL, NULL),
(125, 'technicalemployee', 'show', 'show technicalEmployee', 'technical Employee', NULL, NULL),
(126, 'car', 'createCar', 'create car for client', 'client', NULL, NULL),
(127, 'invoicereport', 'index', 'invoice contract Report', 'report', NULL, NULL),
(128, 'invoicereport', 'search', 'search invoice contract Report', 'report', NULL, NULL),
(129, 'invoicereport', 'indexNoneContract', 'invoice none contract Report', 'report', NULL, NULL),
(130, 'invoicereport', 'searchNoneContract', 'search invoice none contract Report', 'report', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `technical_employee`
--

CREATE TABLE `technical_employee` (
  `employee_id` int(11) NOT NULL,
  `employee_name` varchar(255) NOT NULL,
  `employee_phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `technical_employee`
--

INSERT INTO `technical_employee` (`employee_id`, `employee_name`, `employee_phone`) VALUES
(5, 'asmaa', '012151458478'),
(6, 'menna mahmoud', '01232569888'),
(7, 'omar hamdy', '01265996231');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accounts_car_id_foreign` (`car_id`),
  ADD KEY `accounts_client_id_foreign` (`client_id`),
  ADD KEY `accounts_admin_id_foreign` (`admin_id`),
  ADD KEY `accounts_repraircard_id_foreign` (`reprairCard_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cars_cartype_id_foreign` (`carType_id`),
  ADD KEY `cars_carcatogaries_id_foreign` (`car_brand_category_id`),
  ADD KEY `cars_client_id_foreign` (`client_id`);

--
-- Indexes for table `car_brands`
--
ALTER TABLE `car_brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_brand_category`
--
ALTER TABLE `car_brand_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `car_catograys_company_id_foreign` (`car_brand_id`);

--
-- Indexes for table `car_services`
--
ALTER TABLE `car_services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `car_types`
--
ALTER TABLE `car_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_email_unique` (`email`);

--
-- Indexes for table `custom_invoice`
--
ALTER TABLE `custom_invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `custom_invoice_items`
--
ALTER TABLE `custom_invoice_items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `invoice_id` (`invoice_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`expense_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `group_role`
--
ALTER TABLE `group_role`
  ADD PRIMARY KEY (`group_role_id`),
  ADD KEY `group_role_group_id_foreign` (`group_id`),
  ADD KEY `group_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`invoice_id`),
  ADD KEY `repair_card_id` (`repair_card_id`);

--
-- Indexes for table `invoice_payment`
--
ALTER TABLE `invoice_payment`
  ADD PRIMARY KEY (`invoice_payment_id`),
  ADD KEY `invoice_id` (`invoice_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operation_orders`
--
ALTER TABLE `operation_orders`
  ADD PRIMARY KEY (`operation_order_id`),
  ADD KEY `invoice_id` (`invoice_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `repair_cards_items`
--
ALTER TABLE `repair_cards_items`
  ADD PRIMARY KEY (`card_item_id`),
  ADD KEY `card_id` (`card_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `repair_cards_status`
--
ALTER TABLE `repair_cards_status`
  ADD PRIMARY KEY (`card_status_id`),
  ADD KEY `card_id` (`card_id`);

--
-- Indexes for table `reprair_cards`
--
ALTER TABLE `reprair_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reprair_cards_car_id_foreign` (`car_id`),
  ADD KEY `reprair_cards_client_id_foreign` (`client_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `technical_employee`
--
ALTER TABLE `technical_employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `car_brands`
--
ALTER TABLE `car_brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `car_brand_category`
--
ALTER TABLE `car_brand_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `car_services`
--
ALTER TABLE `car_services`
  MODIFY `service_id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `car_types`
--
ALTER TABLE `car_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `custom_invoice`
--
ALTER TABLE `custom_invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `custom_invoice_items`
--
ALTER TABLE `custom_invoice_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `expense_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `group_role`
--
ALTER TABLE `group_role`
  MODIFY `group_role_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=323;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `invoice_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `invoice_payment`
--
ALTER TABLE `invoice_payment`
  MODIFY `invoice_payment_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `operation_orders`
--
ALTER TABLE `operation_orders`
  MODIFY `operation_order_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `repair_cards_items`
--
ALTER TABLE `repair_cards_items`
  MODIFY `card_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `repair_cards_status`
--
ALTER TABLE `repair_cards_status`
  MODIFY `card_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `reprair_cards`
--
ALTER TABLE `reprair_cards`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `technical_employee`
--
ALTER TABLE `technical_employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`);

--
-- Constraints for table `custom_invoice_items`
--
ALTER TABLE `custom_invoice_items`
  ADD CONSTRAINT `custom_invoice_items_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `custom_invoice` (`invoice_id`);

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`repair_card_id`) REFERENCES `reprair_cards` (`id`);

--
-- Constraints for table `invoice_payment`
--
ALTER TABLE `invoice_payment`
  ADD CONSTRAINT `invoice_payment_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`invoice_id`);

--
-- Constraints for table `operation_orders`
--
ALTER TABLE `operation_orders`
  ADD CONSTRAINT `operation_orders_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`invoice_id`);

--
-- Constraints for table `reprair_cards`
--
ALTER TABLE `reprair_cards`
  ADD CONSTRAINT `reprair_cards_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `technical_employee` (`employee_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
