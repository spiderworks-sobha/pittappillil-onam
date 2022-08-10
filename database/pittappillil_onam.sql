-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2022 at 02:26 PM
-- Server version: 8.0.29
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pittappillil_onam`
--

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` int DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'VELLAYAMBALAM', 1, 1, 1, '2022-08-10 10:11:28', '2022-08-10 10:11:28', NULL),
(2, 'EDAPPALLY -TOLL', 1, 1, 1, '2022-08-10 10:11:28', '2022-08-10 10:11:28', NULL),
(3, 'PERUMBAVOOR - DIGI', 1, 1, 1, '2022-08-10 10:11:28', '2022-08-10 10:11:28', NULL),
(4, 'PARUTHIPARA', 1, 1, 1, '2022-08-10 10:11:28', '2022-08-10 10:11:28', NULL),
(5, 'KOTHAMANGALAM', 1, 1, 1, '2022-08-10 10:11:28', '2022-08-10 10:11:28', NULL),
(6, 'MANNARKKAD', 1, 1, 1, '2022-08-10 10:11:28', '2022-08-10 10:11:28', NULL),
(7, 'THIRUVALLA', 1, 1, 1, '2022-08-10 10:11:28', '2022-08-10 10:11:28', NULL),
(8, 'PERUMBAVOOR - AGENCY', 1, 1, 1, '2022-08-10 10:11:28', '2022-08-10 10:11:28', NULL),
(9, 'KOLENCHERY', 1, 1, 1, '2022-08-10 10:11:28', '2022-08-10 10:11:28', NULL),
(10, 'ANGAMALY - DIGI', 1, 1, 1, '2022-08-10 10:11:28', '2022-08-10 10:11:28', NULL),
(11, 'IRINGALAKUDA', 1, 1, 1, '2022-08-10 10:11:28', '2022-08-10 10:11:28', NULL),
(12, 'ADIMALY', 1, 1, 1, '2022-08-10 10:11:28', '2022-08-10 10:11:28', NULL),
(13, 'THRISSUR', 1, 1, 1, '2022-08-10 10:11:28', '2022-08-10 10:11:28', NULL),
(14, 'KOTTAYAM', 1, 1, 1, '2022-08-10 10:11:28', '2022-08-10 10:11:28', NULL),
(15, 'KOLLAM', 1, 1, 1, '2022-08-10 10:11:28', '2022-08-10 10:11:28', NULL),
(16, 'PALA', 1, 1, 1, '2022-08-10 10:11:28', '2022-08-10 10:11:28', NULL),
(17, 'ANGAMALY - GEOJO', 1, 1, 1, '2022-08-10 10:11:28', '2022-08-10 10:11:28', NULL),
(18, 'ERNAKULAM - SOUTH', 1, 1, 1, '2022-08-10 10:11:28', '2022-08-10 10:11:28', NULL),
(19, 'PALAKKAD', 1, 1, 1, '2022-08-10 10:11:28', '2022-08-10 10:11:28', NULL),
(20, 'MANJERI', 1, 1, 1, '2022-08-10 10:11:28', '2022-08-10 10:11:28', NULL),
(21, 'KAYAMKULAM', 1, 1, 1, '2022-08-10 10:11:28', '2022-08-10 10:11:28', NULL),
(22, 'KOTTARAKKARA', 1, 1, 1, '2022-08-10 10:11:28', '2022-08-10 10:11:28', NULL),
(23, 'KOZHIKODE', 1, 1, 1, '2022-08-10 10:11:28', '2022-08-10 10:11:28', NULL),
(24, 'MUVATTUPUZHA', 1, 1, 1, '2022-08-10 10:11:28', '2022-08-10 10:11:28', NULL),
(25, 'KODUNGALLUR', 1, 1, 1, '2022-08-10 10:11:28', '2022-08-10 10:11:28', NULL),
(26, 'PARAVATTANI', 1, 1, 1, '2022-08-10 10:11:28', '2022-08-10 10:11:28', NULL),
(27, 'PATHANAMTHITTA', 1, 1, 1, '2022-08-10 10:11:28', '2022-08-10 10:11:28', NULL),
(28, 'THRIPUNITHURA', 1, 1, 1, '2022-08-10 10:11:28', '2022-08-10 10:11:28', NULL),
(29, 'CHALAKUDY', 1, 1, 1, '2022-08-10 10:11:28', '2022-08-10 10:11:28', NULL),
(30, 'VELLAYANI', 1, 1, 1, '2022-08-10 10:11:28', '2022-08-10 10:11:28', NULL),
(31, 'N.PARAVOOR', 1, 1, 1, '2022-08-10 10:11:28', '2022-08-10 10:11:28', NULL),
(32, 'EDAPPALLY - CHURCH', 1, 1, 1, '2022-08-10 10:11:28', '2022-08-10 10:11:28', NULL),
(33, 'ANGAMALY-PANASONIC EXCL', 1, 1, 1, '2022-08-10 10:11:28', '2022-08-10 10:11:28', NULL),
(34, 'AMBALAPUZHA', 1, 1, 1, '2022-08-10 10:11:28', '2022-08-10 10:11:28', NULL),
(35, 'MAVELIKKARA', 1, 1, 1, '2022-08-10 10:11:28', '2022-08-10 10:11:28', NULL),
(36, 'CHENGANNUR', 1, 1, 1, '2022-08-10 10:11:28', '2022-08-10 10:11:28', NULL),
(37, 'KATTAPPANA', 1, 1, 1, '2022-08-10 10:11:28', '2022-08-10 10:11:28', NULL),
(38, 'ANGAMALY-KITCHEN & BED CENTRE', 1, 1, 1, '2022-08-10 10:11:28', '2022-08-10 10:11:28', NULL),
(39, 'KOTTARAKKARA DIGI', 1, 1, 1, '2022-08-10 10:11:28', '2022-08-10 10:11:28', NULL),
(40, 'ETTUMANOOR', 1, 1, 1, '2022-08-10 10:11:28', '2022-08-10 10:11:28', NULL),
(41, 'KONDOTTY', 1, 1, 1, '2022-08-10 10:11:28', '2022-08-10 10:11:28', NULL),
(42, 'CHENGANASERRY', 1, 1, 1, '2022-08-10 10:11:28', '2022-08-10 10:11:28', NULL),
(43, 'MUVATTUPZHA DIGI', 1, 1, 1, '2022-08-10 10:11:28', '2022-08-10 10:11:28', NULL),
(44, 'EDAPPAL', 1, 1, 1, '2022-08-10 10:11:28', '2022-08-10 10:11:28', NULL),
(45, 'OMASSERY', 1, 1, 1, '2022-08-10 10:11:28', '2022-08-10 10:11:28', NULL),
(46, 'THAMARASSERY', 1, 1, 1, '2022-08-10 10:11:28', '2022-08-10 10:11:28', NULL),
(47, 'VALANCHERI', 1, 1, 1, '2022-08-10 10:11:28', '2022-08-10 10:11:28', NULL),
(48, 'RAMANATTUKKARA', 1, 1, 1, '2022-08-10 10:11:28', '2022-08-10 10:11:28', NULL),
(49, 'PALA DIGI', 1, 1, 1, '2022-08-10 10:11:28', '2022-08-10 10:11:28', NULL),
(50, 'ERATTUPETTA', 1, 1, 1, '2022-08-10 10:11:28', '2022-08-10 10:11:28', NULL),
(51, 'PUNALUR', 1, 1, 1, '2022-08-10 10:11:28', '2022-08-10 10:11:28', NULL),
(52, 'KAKKANADU', 1, 1, 1, '2022-08-10 10:11:28', '2022-08-10 10:11:28', NULL),
(53, 'PONKUNNAM', 1, 1, 1, '2022-08-10 10:11:28', '2022-08-10 10:11:28', NULL),
(54, 'PATTAMBI', 1, 1, 1, '2022-08-10 10:11:28', '2022-08-10 10:11:28', NULL),
(55, 'VADAKARA', 1, 1, 1, '2022-08-10 10:11:28', '2022-08-10 10:11:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gifts`
--

CREATE TABLE `gifts` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `probability` double(5,2) NOT NULL,
  `is_special_gift` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` bigint NOT NULL,
  `updated_by` bigint NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gifts`
--

INSERT INTO `gifts` (`id`, `name`, `probability`, `is_special_gift`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'CERAMIC MUG', 19.00, 0, 1, 2, 2, '2022-08-10 12:01:33', '2022-08-10 12:27:58', NULL),
(2, 'DINNER SET', 10.00, 0, 1, 2, 2, '2022-08-10 12:12:23', '2022-08-10 12:12:23', NULL),
(3, 'MICROWAVE KIT', 10.00, 0, 1, 2, 2, '2022-08-10 12:13:03', '2022-08-10 12:13:03', NULL),
(4, 'BOROSIL BOWLKIT', 10.00, 0, 1, 2, 2, '2022-08-10 12:15:36', '2022-08-10 12:27:31', NULL),
(5, 'GLASS BOWL', 10.00, 0, 1, 2, 2, '2022-08-10 12:19:31', '2022-08-10 12:27:34', NULL),
(6, 'GOLD COIN (200mg)', 0.50, 1, 1, 2, 2, '2022-08-10 13:18:57', '2022-08-10 13:18:57', NULL),
(7, 'SILVER COIN (8gm)', 0.50, 0, 1, 2, 2, '2022-08-10 14:15:23', '2022-08-10 14:15:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('supal@spiderworks.in', '$2y$10$7ZyFc6cXLm0aaevFr9wEcenkC01CtMQYJakN.2FyORfncFFdyvuT.', '2022-07-08 07:27:46');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int NOT NULL,
  `code` varchar(250) NOT NULL,
  `title` text,
  `content` text,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `code`, `title`, `content`, `created_at`, `updated_at`, `status`) VALUES
(1, 'smtp-settings', 'smtp-settings', '{\"protocol\":\"SMTP\",\"host\":\"smtp.gmail.com\",\"username\":\"notifications-no-reply@spiderworks.info\",\"smtp_security\":\"ssl\",\"port\":\"465\",\"password\":\"aiymizgvoyadbmad\",\"name\":\"Aster Admin\"}', '2022-07-04 14:08:38', '2022-07-14 06:58:19', 1),
(2, 'mail-settings', 'mail-settings', '{\"email_to\":\"astermedcity@asterhospital.com\",\"email_cc\":\"priyanka@spiderworks.in\"}', '2022-07-04 14:08:38', '2022-07-19 07:18:41', 1);

-- --------------------------------------------------------

--
-- Table structure for table `special_invoices`
--

CREATE TABLE `special_invoices` (
  `id` bigint UNSIGNED NOT NULL,
  `invoice` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `gifts_id` bigint NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` bigint NOT NULL,
  `updated_by` bigint NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `special_invoices`
--

INSERT INTO `special_invoices` (`id`, `invoice`, `gifts_id`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'OD21072205222129596', 6, 1, 2, 2, '2022-08-10 13:23:18', '2022-08-10 13:23:18', NULL),
(2, 'OD21072205222129556', 6, 1, 2, 2, '2022-08-10 13:24:51', '2022-08-10 13:24:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE `submissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `branch` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `invoice` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `gifts_id` bigint DEFAULT NULL,
  `claim_status` tinyint(1) NOT NULL DEFAULT '0',
  `claimed_on` datetime DEFAULT NULL,
  `updated_by` bigint NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `submissions`
--

INSERT INTO `submissions` (`id`, `name`, `phone_number`, `branch`, `invoice`, `gifts_id`, `claim_status`, `claimed_on`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Sobha Sudheesh', '9496845445', 'KOTHAMANGALAM', 'OD21072205222129596', NULL, 0, NULL, 2, '2022-08-10 17:30:51', '2022-08-10 17:30:51', NULL),
(2, 'Sobha Sudheesh', '9496849448', 'EDAPPALLY -TOLL', 'OD21072205222129598', NULL, 0, NULL, 2, '2022-08-10 17:33:42', '2022-08-10 17:33:42', NULL),
(3, 'Sobha Sudheesh', '9496849448', 'PARUTHIPARA', 'OD21072205222129556', 6, 0, NULL, 2, '2022-08-10 17:35:10', '2022-08-10 17:35:11', NULL),
(4, 'Sobha Sudheesh', '9496849448', 'PARUTHIPARA', 'OD21072205222129588', 3, 0, NULL, 2, '2022-08-10 17:36:20', '2022-08-10 17:36:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'supal  s', 'supal@spiderworks.in', NULL, '$2y$10$UJJwnRHzz2E8zTaNs1ByOuDDPpO4k9GWNyXS/qjOkWzE2Mlu0lc0u', 'Y2hqWA6rIh6fq6baamBbbJmTLMj5ZAxmIAC0JvZUvX48cFqvIVjjlUFHpEs0', '2022-07-01 06:14:53', '2022-07-08 04:47:45'),
(2, 'AsterAdmin', 'admin@AsterPrivilege.com', NULL, '$2y$10$q7VaHahSDXidDXA/a/Js3.wDdlcV/pHub1Ac2gFuy8UHnofYSp3Z.', NULL, '2022-07-01 06:14:53', '2022-07-01 06:14:53'),
(3, 'astermedcity@asterhospital.com', 'astermedcity@asterhospital.com', NULL, '$2y$10$UbXqH/uzSCacI8LePDB64.6j40cN1920FHK2pSXdwpPfXtmF3jRKu', NULL, '2022-07-19 07:07:48', '2022-07-19 07:07:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gifts`
--
ALTER TABLE `gifts`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `special_invoices`
--
ALTER TABLE `special_invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submissions`
--
ALTER TABLE `submissions`
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
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gifts`
--
ALTER TABLE `gifts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `special_invoices`
--
ALTER TABLE `special_invoices`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
