-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2024 at 02:03 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--
-- Error reading structure for table cms.announcements: #1932 - Table &#039;cms.announcements&#039; doesn&#039;t exist in engine
-- Error reading data for table cms.announcements: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `cms`.`announcements`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `dept_id` varchar(6) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('pending','approved','rejected','fixed') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `station_name` varchar(100) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `ref_code` varchar(20) NOT NULL,
  `file_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `subject`, `description`, `dept_id`, `user_id`, `status`, `created_at`, `phone_number`, `station_name`, `gender`, `address`, `ref_code`, `file_path`) VALUES
(42, 'Person Missing or Killed', 'The missing person was last seen at Central Park on October 1st around 4:30 PM near the Bethesda Terrace. They were wearing a blue jacket, black jeans, and carrying a red backpack. Witnesses ', 'Crime', 4, 'fixed', '2024-10-03 11:41:17', '0753110462', 'Gampaha', 'male', 'No.213/4, Magalegoda, Veyangofa', 'CMP-66FE82DDC428D', 'uploads/CMP-66FE82DDC428D/670b016f3dca0.png'),
(43, 'Person Missing or Killed', 'The missing person was last seen at Riverside Park on September 28, 2024, around 15:30. The individual is a female, reported missing by the Colombo station. Please refer to case CMP-77GH82HJK210L for further details.', 'Crime', 4, 'pending', '2024-09-28 10:00:00', '0712456789', 'Colombo', 'female', 'No.125/A, Park Lane, Colombo 07', 'CMP-77GH82HJK210L', NULL),
(44, 'Person Missing or Killed', 'A deceased individual was found near Lake Road on October 1, 2024, at 09:45. The case is currently under investigation by the Kandy police station. Refer to case CMP-88IJ91LK221P for further details.', 'Crime', 4, '', '2024-10-01 04:15:00', '0777894561', 'Kandy', 'unknown', 'No.11/B, Lake Road, Kandy', 'CMP-88IJ91LK221P', 'uploads/6709c9cdc81a6.png'),
(45, 'Person Missing or Killed', 'A suspected kidnapping occurred at the main market on October 2, 2024, at 14:20. The victim, a male, was last seen being forced into a vehicle. Case reported by the Galle station. Please refer to CMP-99KL82MN234Q for details.', 'Crime', 4, 'pending', '2024-10-02 08:50:00', '0755432198', 'Galle', 'male', 'No.89/C, Harbour Street, Galle', 'CMP-99KL82MN234Q', 'uploads/CMP-99KL82MN234Q/6710a8b750211.png'),
(46, 'Person Missing or Killed', 'A child was reported missing at the Ampara bus terminal on October 4, 2024, around 11:00 AM. Witnesses saw the child heading towards the market area. Case handled by Ampara station, ref CMP-11XY34AB567T.', 'Crime', 4, 'approved', '2024-10-04 05:30:00', '0778523410', 'Ampara', 'male', 'No.57/D, Main Street, Ampara', 'CMP-11XY34AB567T', NULL),
(47, 'Person Missing or Killed', 'A deceased individual was discovered in a remote forest area near Ella on October 5, 2024, at 08:30. Case under investigation by the Badulla station. See case CMP-22AB45CD678U for more details.', 'Crime', 4, '', '2024-10-05 03:00:00', '0756784321', 'Badulla', 'unknown', 'No.202/B, Ella Road, Badulla', 'CMP-22AB45CD678U', NULL),
(55, 'hhgghgffffhfghfghfgh', 'adwfawfawfawfawfwafawfawfawwafaw', 'Crime', 4, 'pending', '2024-10-12 06:07:20', '0114548756', 'dwadawd', 'male', 'dddaawdw', 'CMP-670A12186A3EE', NULL),
(56, 'dawddff ffa', 'dadwawdadawdadad', 'Crime', 4, 'pending', '2024-10-12 06:22:56', '0114548756', 'adwasfgggg', 'female', 'adawdadawda', 'CMP-670A15C027AD9', NULL),
(57, 'wdawdwadad', 'dwadawdawdawdaw', 'ACAD', 4, 'pending', '2024-10-12 06:45:48', '0114548756', 'dwadwadaw', 'male', 'dwadwadawdawdaw', 'CMP-670A1B1C399CC', NULL),
(58, 'asfafafafwafafwafwaf', 'dawdwafdawafawfw', 'Crime', 4, 'pending', '2024-10-12 23:17:10', '0114548756', 'fawfawfawfawfwafafa', 'male', 'afawfawfawfawfa', 'CMP-670B03764E216', NULL),
(59, 'dawddff ffaawdawdawd', 'dadwafafgawfwgagagawaga', 'Crime', 4, 'pending', '2024-10-17 00:25:19', '0114548756', 'ggff', 'male', 'dawdawdawaw', 'CMP-6688', NULL),
(60, 'dawddff ffaawdawdawd', 'wdadnawjkndjadkjada', 'Crime', 4, 'pending', '2024-10-17 00:27:20', '0114548756', 'adwasfgggg', 'male', 'dawddawd', 'CMP-B656', NULL),
(61, 'dawdawdadw', 'daddawkdawkdajwdjandkawd', 'Crime', 4, 'pending', '2024-10-17 00:28:46', '0114548756', 'wwwwwwwwwwwwwwwwwwwwwwwwwwww', 'male', 'dawdadawdada', 'CMP-77823', NULL),
(62, 'shhoo,drggrdg', 'awdawdawdwadadawddddddddddd', 'Crime', 4, 'pending', '2024-10-17 00:29:11', '0114548756', 'dadawda', 'male', 'dwadadadwd', 'CMP-06177', NULL),
(63, 'fadawdawd', 'wdadawdawdaw', 'Crime', 4, 'pending', '2024-10-17 00:29:44', '0114548756', 'dawdwadawd', 'male', 'dadwada', 'CMP-8A457', NULL),
(64, 'dawddff ffaawdawdawd', 'awdawfwafawfawfafawffa', 'Crime', 6, 'pending', '2024-10-17 00:51:01', '0114548756', 'adwasfgggg', 'male', 'srilanka way', 'CMP-76C3F', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `code`, `created_at`) VALUES
(1, 'Crime', 'Crime', '2020-04-28 11:29:11'),
(2, 'Academics', 'ACAD', '2020-04-28 12:01:16');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL,
  `code` varchar(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `name`, `code`, `created_at`) VALUES
(1, 'Male', 'male', '2024-10-01 14:20:45'),
(2, 'Female', 'female', '2024-10-01 14:21:34');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `selector` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expires_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testcomplain`
--

CREATE TABLE `testcomplain` (
  `id` int(11) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `telePhone` int(10) NOT NULL,
  `dept_id` varchar(10) NOT NULL,
  `user_id` int(20) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role` enum('admin','caretaker','user') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `dept_id` varchar(6) DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_picture` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'profileDefault.png',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `email_verified_at`, `role`, `dept_id`, `password`, `profile_picture`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '7415555536', 'admin@demo.com', NULL, 'admin', 'Crime', '$2y$10$iX9/UCqsuycWv0/19gDvuuKKbfajcalTOmYlfFSKaHrmPOGRHcps2', 'profile-1.png', NULL, '2020-04-28 11:47:28', '2020-04-28 13:26:29'),
(2, 'User', '1234567890', 'user@demo.com', NULL, 'user', NULL, '$2y$10$tg7vvxjaQSWwXr6OE4ESa.fKfFrzF/8o8rkXSE2dBxqQs0EScGc4K', 'profileDefault.png', NULL, '2020-04-28 12:11:22', NULL),
(3, 'Caretaker', '4294967295', 'caretaker@demo.com', NULL, 'caretaker', 'Crime', '$2y$10$FN8Rm9IBiL69.qApSKXKqOHAhN1VVGn5li/s6EOcrbQgnNC3kyIyS', 'profileDefault.png', NULL, '2020-04-28 12:40:01', NULL),
(4, 'Umesh Rasanjana', '0774848326', 'aa@dd.dd', NULL, 'caretaker', 'Crime', '$2y$10$gm3/rIXHWoNLrXXq31.QZ.mxmJ81NLT3iJcT7x/f2umlfNqCKsM1u', 'profileDefault.png', NULL, '2024-09-29 18:32:27', '2024-10-17 00:15:19'),
(5, 'ADMINN', '9332131234', 'admin@uk.kk', NULL, 'caretaker', 'Crime', '$2y$10$ukDdVTaTXUmAZQg7xQpqnustfP/hTGW5UaxgkMTunU8IK77DWw81i', 'profileDefault.png', NULL, '2024-10-02 15:12:41', NULL),
(6, 'chamath', '9332131234', 'sss@ff.co', NULL, 'user', NULL, '$2y$10$8gxQjuke/xaz7rBwJv1zSe2pssRuHlQZoIMkTwGS.n760ZWtnz5qO', 'profileDefault.png', NULL, '2024-10-17 00:37:24', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkey_complaints_user_id` (`user_id`),
  ADD KEY `fkey_complaints_dept_id` (`dept_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `depart_code_unique` (`code`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_unique` (`email`) USING BTREE;

--
-- Indexes for table `testcomplain`
--
ALTER TABLE `testcomplain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `foreign_key_dept_id` (`dept_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testcomplain`
--
ALTER TABLE `testcomplain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `fkey_complaints_dept_id` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkey_complaints_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `foreign_key_dept_id` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`code`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
