-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 04, 2020 at 01:56 PM
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
(322, 1, 130, NULL, NULL),
(323, 1, 131, NULL, NULL),
(324, 1, 132, NULL, NULL),
(325, 1, 133, NULL, NULL),
(326, 1, 134, NULL, NULL),
(327, 1, 135, NULL, NULL),
(328, 1, 136, NULL, NULL),
(329, 1, 137, NULL, NULL),
(330, 1, 138, NULL, NULL),
(331, 1, 139, NULL, NULL),
(332, 1, 140, NULL, NULL),
(333, 1, 141, NULL, NULL),
(334, 1, 142, NULL, NULL),
(335, 1, 143, NULL, NULL),
(336, 1, 144, NULL, NULL),
(337, 1, 145, NULL, NULL),
(338, 1, 146, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `group_role`
--
ALTER TABLE `group_role`
  ADD PRIMARY KEY (`group_role_id`),
  ADD KEY `group_role_group_id_foreign` (`group_id`),
  ADD KEY `group_role_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `group_role`
--
ALTER TABLE `group_role`
  MODIFY `group_role_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=339;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
