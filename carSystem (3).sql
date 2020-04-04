-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 04, 2020 at 01:45 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carSystem`
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
-- Table structure for table `boxes`
--

CREATE TABLE `boxes` (
  `id` int(10) UNSIGNED NOT NULL,
  `total` int(11) NOT NULL,
  `reprairCard_id` int(10) UNSIGNED DEFAULT NULL,
  `pay_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay_date` date DEFAULT NULL,
  `bankName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tex` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IsDebit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PaidUp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Admin_id` int(10) UNSIGNED DEFAULT NULL,
  `type` enum('Cache','Check','Transfer') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Cache',
  `status` enum('panding','accepted','isDebit','finshed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'panding',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 2020, 'SDL 123', '22', 'red', 1, 1, 1, '2020-01-21 18:53:58', '2020-01-21 18:53:58'),
(2, 2025, 'SLBB 3434', '123', '123', 1, 3, 2, '2020-01-27 14:10:20', '2020-03-29 18:06:36'),
(4, 2023, '12', '447', 'rrr', 1, 4, 3, '2020-03-29 17:19:15', '2020-03-30 16:52:13'),
(10, 2025, '888', '9999', 'red', 1, 3, 3, '2020-03-30 16:51:23', '2020-03-30 16:51:23');

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
(1, 'TOYOTA', 'تويوتا', '2020-01-21 18:51:24', '2020-01-21 18:51:24'),
(2, 'نيسان', 'Nissan', '2020-01-21 18:53:35', '2020-01-27 14:00:12'),
(3, 'جيب', 'jeep', '2020-01-27 13:59:48', '2020-01-27 13:59:48'),
(4, 'wwwwwy', 'wwwwwww', '2020-03-29 17:07:29', '2020-03-29 17:09:26');

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
(1, 'كامري', 'Camry', 1, '2020-01-21 18:52:13', '2020-01-21 18:52:13'),
(3, 'شيروكي', 'Sheroki', 3, '2020-01-27 14:09:26', '2020-01-27 14:09:26'),
(4, 'aaa', 'aaa', 2, '2020-03-29 16:54:47', '2020-03-29 17:00:40'),
(5, 'www', 'www', 2, '2020-03-29 17:00:02', '2020-03-29 17:00:48');

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
(1, 'اجور خدمات', '1', 1, '2000', '1000', '4'),
(2, 'اعمال خارجية', '1123', 2, '58', '58', '88');

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
(1, 'Salon', 'صالون', '2020-01-21 18:51:49', '2020-01-21 18:51:49'),
(2, 'شاحنة', 'trunk', '2020-01-27 14:02:13', '2020-01-27 14:02:30');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'contract',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `fullName`, `phone`, `address`, `email`, `client_type`, `created_at`, `updated_at`) VALUES
(1, 'ali', 9898, 'hghgh', 'a@a.com', 'contract', '2020-01-21 18:52:52', '2020-01-21 18:52:52'),
(2, 'رواسي', 65656, 'ساليالس', 'aaaa@aa.com', 'contract', '2020-01-27 14:07:56', '2020-01-27 14:07:56'),
(3, 'menna', 1003004396, '888', 'mennamahmoud455@gmail.com', 'contract', '2020-03-29 16:18:43', '2020-03-29 16:18:43');

-- --------------------------------------------------------

--
-- Table structure for table `costs`
--

CREATE TABLE `costs` (
  `id` int(10) UNSIGNED NOT NULL,
  `beneficiary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cardHolder` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pay_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay_date` date DEFAULT NULL,
  `bankName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_id` int(10) UNSIGNED DEFAULT 1,
  `paymentType` enum('cash','cheque','transfer') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cash',
  `type` enum('cost','paymentVoucher','salary','others') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cost',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `costs`
--

INSERT INTO `costs` (`id`, `beneficiary`, `cardHolder`, `amount`, `pay_no`, `pay_date`, `bankName`, `note`, `admin_id`, `paymentType`, `type`, `created_at`, `updated_at`) VALUES
(1, 'nasir', NULL, '200', '101066212231', '2020-01-13', 'الراجحي', 'مواد اصلاح ', 1, 'transfer', 'paymentVoucher', '2020-01-13 21:00:00', NULL),
(2, 'ahmed omar', NULL, '200', '656756', '2020-01-15', NULL, 'Mantance materials', 1, 'transfer', 'paymentVoucher', '2020-01-27 12:09:11', '2020-01-27 12:09:11'),
(3, 'اسلام عبدالله', NULL, '1800', NULL, NULL, NULL, 'راتب شهر ٣ + ٣٠٠ ريال بدل سفر', 1, 'transfer', 'salary', '2020-01-27 12:17:02', '2020-01-27 12:17:02'),
(4, 'اسلام عبدالله', NULL, '1800', NULL, NULL, NULL, 'راتب شهر ٣ + ٣٠٠ ريال بدل سفر', 1, 'cash', 'salary', '2020-01-27 12:17:38', '2020-01-27 12:17:38'),
(5, 'ali', NULL, '200', NULL, NULL, NULL, 'test', 1, 'cash', 'cost', '2020-01-27 12:18:39', '2020-01-27 12:18:39');

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
(27, 1, 1, '2020-04-03 19:27:05', '2020-04-03 19:27:05'),
(28, 1, 2, '2020-04-03 19:27:05', '2020-04-03 19:27:05'),
(29, 1, 9, '2020-04-03 19:27:05', '2020-04-03 19:27:05'),
(30, 1, 10, '2020-04-03 19:27:05', '2020-04-03 19:27:05'),
(31, 1, 11, '2020-04-03 19:27:05', '2020-04-03 19:27:05'),
(32, 1, 12, '2020-04-03 19:27:05', '2020-04-03 19:27:05'),
(33, 1, 13, '2020-04-03 19:27:05', '2020-04-03 19:27:05'),
(34, 1, 15, '2020-04-03 19:27:05', '2020-04-03 19:27:05');

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
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receipt_vouchers`
--

CREATE TABLE `receipt_vouchers` (
  `id` int(10) UNSIGNED NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pay_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay_date` date DEFAULT NULL,
  `bankName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_id` int(10) UNSIGNED DEFAULT NULL,
  `reprairCard_id` int(10) UNSIGNED DEFAULT NULL,
  `paymentType` enum('cash','cheque','transfer') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cash',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(5, 2, 2, '58', '58'),
(6, 2, 1, '1000', '2000'),
(7, 2, 1, '1000', '2000'),
(10, 3, 1, '1000', '2000'),
(11, 3, 1, '1000', '2000');

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
(1, 'denied', '2020-04-04', 2),
(2, 'accepted', '2020-04-04', 2),
(3, 'denied', '2020-04-04', 2),
(4, 'accepted', '2020-04-04', 2);

-- --------------------------------------------------------

--
-- Table structure for table `reprair_cards`
--

CREATE TABLE `reprair_cards` (
  `id` int(10) UNSIGNED NOT NULL,
  `car_id` int(10) UNSIGNED DEFAULT NULL,
  `status` enum('panding','accepted','finished','underMaintance','denied') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'panding',
  `checkReprort` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reprair_cards`
--

INSERT INTO `reprair_cards` (`id`, `car_id`, `status`, `checkReprort`, `client_id`, `created_at`, `updated_at`) VALUES
(2, 1, 'accepted', 'uuuuuuu', 1, '2020-04-02 17:05:01', '2020-04-04 09:06:37'),
(3, 1, 'panding', 'yyyy', 1, '2020-04-04 09:03:32', '2020-04-04 09:03:32');

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
(16, 'carType', 'index', 'carType', 'carType', NULL, NULL),
(17, 'carType', 'create', 'create carType', 'carType', NULL, NULL),
(18, 'carType', 'store', 'save carType', 'carType', NULL, NULL),
(19, 'carType', 'edit', 'edit carType', 'carType', NULL, NULL),
(20, 'carType', 'update', 'update carType', 'carType', NULL, NULL),
(21, 'carType', 'destroy', 'delete carType', 'carType', NULL, NULL),
(24, 'car', 'index', 'car', 'car', NULL, NULL),
(25, 'car', 'create', 'create car', 'car', NULL, NULL),
(26, 'car', 'store', 'save car', 'car', NULL, NULL),
(27, 'car', 'edit', 'edit car', 'car', NULL, NULL),
(28, 'car', 'update', 'update car', 'car', NULL, NULL),
(29, 'car', 'destroy', 'delete car', 'car', NULL, NULL),
(30, 'carBrand', 'index', 'car Brand', 'car Brand', NULL, NULL),
(31, 'carBrand', 'create', 'create car Brand', 'car Brand', NULL, NULL),
(32, 'carBrand', 'store', 'save car Brand', 'car Brand', NULL, NULL),
(33, 'carBrand', 'edit', 'edit car Brand', 'car Brand', NULL, NULL),
(34, 'carBrand', 'update', 'update car Brand', 'car Brand', NULL, NULL),
(35, 'carBrand', 'destroy', 'delete car Brand', 'car Brand', NULL, NULL),
(36, 'carBrand', 'show', 'show car Brand', 'car Brand', NULL, NULL),
(37, 'carBrandCategory', 'index', 'car Brand Category', 'car Brand Category', NULL, NULL),
(38, 'carBrandCategory', 'create', 'create car Brand Category', 'car Brand Category', NULL, NULL),
(39, 'carBrandCategory', 'store', 'save car Brand Category', 'car Brand Category', NULL, NULL),
(40, 'carBrandCategory', 'edit', 'edit car Brand Category', 'car Brand Category', NULL, NULL),
(41, 'carBrandCategory', 'update', 'update car Brand Category', 'car Brand Category', NULL, NULL),
(42, 'carBrandCategory', 'destroy', 'delete car Brand Category', 'car Brand Category', NULL, NULL),
(43, 'carBrandCategory', 'show', 'show car Brand Category', 'car Brand Category', NULL, NULL),
(44, 'reprairCard', 'index', 'reprair Card', 'reprair Card', NULL, NULL),
(45, 'reprairCard', 'create', 'create reprair Card', 'reprair Card', NULL, NULL),
(46, 'reprairCard', 'store', 'save reprair Card', 'reprair Card', NULL, NULL),
(47, 'reprairCard', 'edit', 'edit reprair Card', 'reprair Card', NULL, NULL),
(48, 'reprairCard', 'update', 'update reprair Card', 'reprair Card', NULL, NULL),
(49, 'reprairCard', 'denied', 'deny reprair Card', 'reprair Card', NULL, NULL),
(50, 'reprairCard', 'show', 'show reprair Card', 'reprair Card', NULL, NULL),
(51, 'reprairCard', 'approved', 'approve reprair Card', 'reprair Card', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Indexes for table `boxes`
--
ALTER TABLE `boxes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `boxes_repraircard_id_foreign` (`reprairCard_id`),
  ADD KEY `boxes_admin_id_foreign` (`Admin_id`);

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
-- Indexes for table `costs`
--
ALTER TABLE `costs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `costs_admin_id_foreign` (`admin_id`);

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `receipt_vouchers`
--
ALTER TABLE `receipt_vouchers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `receipt_vouchers_admin_id_foreign` (`admin_id`),
  ADD KEY `receipt_vouchers_repraircard_id_foreign` (`reprairCard_id`);

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
  ADD KEY `reprair_cards_client_id_foreign` (`client_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

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
-- AUTO_INCREMENT for table `boxes`
--
ALTER TABLE `boxes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `car_brands`
--
ALTER TABLE `car_brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `car_brand_category`
--
ALTER TABLE `car_brand_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `car_services`
--
ALTER TABLE `car_services`
  MODIFY `service_id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `car_types`
--
ALTER TABLE `car_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `costs`
--
ALTER TABLE `costs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `group_role`
--
ALTER TABLE `group_role`
  MODIFY `group_role_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `receipt_vouchers`
--
ALTER TABLE `receipt_vouchers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `repair_cards_items`
--
ALTER TABLE `repair_cards_items`
  MODIFY `card_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `repair_cards_status`
--
ALTER TABLE `repair_cards_status`
  MODIFY `card_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reprair_cards`
--
ALTER TABLE `reprair_cards`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `accounts_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`),
  ADD CONSTRAINT `accounts_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `accounts_repraircard_id_foreign` FOREIGN KEY (`reprairCard_id`) REFERENCES `reprair_cards` (`id`);

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`);

--
-- Constraints for table `boxes`
--
ALTER TABLE `boxes`
  ADD CONSTRAINT `boxes_admin_id_foreign` FOREIGN KEY (`Admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `boxes_repraircard_id_foreign` FOREIGN KEY (`reprairCard_id`) REFERENCES `reprair_cards` (`id`);

--
-- Constraints for table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_carcatogaries_id_foreign` FOREIGN KEY (`car_brand_category_id`) REFERENCES `car_brand_category` (`id`),
  ADD CONSTRAINT `cars_cartype_id_foreign` FOREIGN KEY (`carType_id`) REFERENCES `car_types` (`id`),
  ADD CONSTRAINT `cars_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`);

--
-- Constraints for table `car_brand_category`
--
ALTER TABLE `car_brand_category`
  ADD CONSTRAINT `car_catograys_company_id_foreign` FOREIGN KEY (`car_brand_id`) REFERENCES `car_brands` (`id`);

--
-- Constraints for table `costs`
--
ALTER TABLE `costs`
  ADD CONSTRAINT `costs_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `receipt_vouchers`
--
ALTER TABLE `receipt_vouchers`
  ADD CONSTRAINT `receipt_vouchers_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `receipt_vouchers_repraircard_id_foreign` FOREIGN KEY (`reprairCard_id`) REFERENCES `reprair_cards` (`id`);

--
-- Constraints for table `repair_cards_items`
--
ALTER TABLE `repair_cards_items`
  ADD CONSTRAINT `repair_cards_items_ibfk_1` FOREIGN KEY (`card_id`) REFERENCES `reprair_cards` (`id`),
  ADD CONSTRAINT `repair_cards_items_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `car_services` (`service_id`);

--
-- Constraints for table `repair_cards_status`
--
ALTER TABLE `repair_cards_status`
  ADD CONSTRAINT `repair_cards_status_ibfk_1` FOREIGN KEY (`card_id`) REFERENCES `reprair_cards` (`id`);

--
-- Constraints for table `reprair_cards`
--
ALTER TABLE `reprair_cards`
  ADD CONSTRAINT `reprair_cards_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`),
  ADD CONSTRAINT `reprair_cards_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
