-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 18, 2020 at 08:49 PM
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
(130, 'invoicereport', 'searchNoneContract', 'search invoice none contract Report', 'report', NULL, NULL),
(131, 'operationorder', 'indexNoneContract', 'operation Order none contract', 'operation Order', NULL, NULL),
(132, 'operationorder', 'operationSearchIndex', 'search operation Order contract', 'operation Order', NULL, NULL),
(133, 'operationorder', 'operationSearchNoneContractIndex', 'search operation Order none contract', 'operation Order', NULL, NULL),
(134, 'car', 'carSearch', 'search with client name', 'car', NULL, NULL),
(135, 'companydetails', 'index', 'company info', 'company info', NULL, NULL),
(136, 'companydetails', 'edit', 'edit company info', 'company info', NULL, NULL),
(137, 'companydetails', 'update', 'update company info', 'company info', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
