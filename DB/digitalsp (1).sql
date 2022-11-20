-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2022 at 01:23 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digitalsp`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '0=Inactive | 1=Active',
  `duration` int(11) NOT NULL,
  `fees` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `slug`, `description`, `status`, `duration`, `fees`, `image`, `created_at`, `updated_at`) VALUES
(3, 'We Development', 'we-development', 'Voluptas sint quam e', 1, 6, 15000, '-2022-02-13-6209134801e2c.png', '2022-02-13 08:18:48', '2022-02-13 08:20:44'),
(5, 'Web Design', 'web-design', 'Similique maiores as', 1, 5, 10000, '-2022-02-13-620913a162cb1.png', '2022-02-13 08:20:17', '2022-02-13 08:20:17'),
(6, 'Graphic Design', 'graphic-design', 'wsdwqrwq', 1, 3, 12000, '-2022-02-13-6209208a81746.jpg', '2022-02-13 09:15:22', '2022-02-13 09:15:22'),
(7, 'Mobile App Development', 'mobile-app-development', 'fwsf fwsfgs', 1, 8, 15000, '-2022-02-17-620e786b5a9b3.png', '2022-02-17 10:31:39', '2022-02-17 10:31:39');

-- --------------------------------------------------------

--
-- Table structure for table `course_payment`
--

CREATE TABLE `course_payment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_payment`
--

INSERT INTO `course_payment` (`id`, `course_id`, `payment_id`, `created_at`, `updated_at`) VALUES
(21, 6, 20, NULL, NULL),
(22, 3, 21, NULL, NULL),
(23, 5, 22, NULL, NULL),
(24, 6, 22, NULL, NULL),
(25, 5, 23, NULL, NULL),
(26, 6, 23, NULL, NULL),
(27, 5, 24, NULL, NULL),
(28, 5, 25, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course_user`
--

CREATE TABLE `course_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_user`
--

INSERT INTO `course_user` (`id`, `user_id`, `course_id`, `created_at`, `updated_at`) VALUES
(22, 11, 6, NULL, NULL),
(23, 12, 3, NULL, NULL),
(24, 13, 5, NULL, NULL),
(25, 13, 6, NULL, NULL),
(26, 14, 5, NULL, NULL),
(27, 14, 6, NULL, NULL),
(28, 15, 5, NULL, NULL),
(29, 16, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_11_22_043241_create_sessions_table', 1),
(7, '2021_11_23_123056_create_courses_table', 1),
(8, '2022_01_10_142537_create_course_user_table', 1),
(9, '2022_01_17_052817_create_payments_table', 1),
(10, '2022_02_10_075130_create_course_payment_table', 1);

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1=Unapproved | 0=Approved',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `payment_method`, `payment_number`, `transaction_id`, `status`, `created_at`, `updated_at`) VALUES
(20, 11, 'bkash', '625', 'Dolorem ut suscipit', 1, '2022-02-13 12:09:06', '2022-02-13 12:09:06'),
(21, 12, 'nagod', '438', 'Sint neque quae sed', 1, '2022-02-13 12:09:19', '2022-02-13 12:09:19'),
(22, 13, 'rocket', '588', 'Dolor quis ab et sit', 1, '2022-02-13 12:09:40', '2022-02-13 12:09:40'),
(23, 14, 'rocket', '466', 'Aut dicta sit dolori', 1, '2022-02-13 12:12:38', '2022-02-13 12:12:38'),
(24, 15, 'bkash', '66', 'Ducimus sunt qui nu', 1, '2022-02-14 04:38:09', '2022-02-14 04:38:09'),
(25, 16, 'nagod', '610', 'Incididunt omnis pla', 1, '2022-02-17 10:24:42', '2022-02-17 10:24:42');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('9kqKB7qJSlpw0y7eBtFWewlZvvwMLhqiiY2QsWzQ', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', 'YTo4OntzOjM6InVybCI7YToxOntzOjg6ImludGVuZGVkIjtzOjM3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4vZGFzaGJvYXJkIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NjoiX3Rva2VuIjtzOjQwOiJJRklKbHNkYXh6a1hZaXhSTE9zU1MzbGxQaE1ZZld1bjk2dEFiVUVpIjtzOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6NToidXR5cGUiO3M6MzoiQURNIjtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJE9XOW94Z0hyME8xTHdDZmlNT0FvLy45RmtyVlp5Z05FZy84azlzU2lydXEubWtHSHJ0cTl5IjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRPVzlveGdIcjBPMUx3Q2ZpTU9Bby8uOUZrclZaeWdORWcvOGs5c1NpcnVxLm1rR0hydHE5eSI7fQ==', 1645115545),
('kkyFVzTUWQMIHurKGUfwF00aIYqxvq9GAAGLLf6v', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWXBDR3ZYTTJ0ZjF2Q3dQQmNDZHowU1NxRlgyUVhOMGNUaWZBZHhBSyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9yZWdpc3RlciI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1668845489),
('Lv1VcvxCouRYgwgxgHqPqzYxqm5wLevEsYviD8XN', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNFhJNExvRXJWdkhYWVRpZHlmdEd0ZlRCcHBUaUF0SlFzUUFrVVNoSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9yZWdpc3RlciI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1668828841);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '0=Inactive | 1=Active | 2=Ban',
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `utype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USR' COMMENT 'ADM for Admin and USR for Normal User',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `status`, `address`, `remember_token`, `current_team_id`, `image`, `utype`, `created_at`, `updated_at`) VALUES
(1, 'Bishwajit', 'Roy', 'admin@admin.com', '01911087057', NULL, '$2y$10$OW9oxgHr0O1LwCfiMOAo/.9FkrVZygNEg/8k9sSiruq.mkGHrtq9y', NULL, NULL, 0, 'Dhaka', NULL, NULL, 'bishwajit-2022-02-17-620e7689c061a.png', 'ADM', '2022-02-13 08:13:51', '2022-02-17 10:23:37'),
(11, 'Rahim', 'Holcomb', 'penoso@mailinator.com', '+1 (146) 587-3678', NULL, '$2y$10$.6YiiHFqCIIKpH2KrSa5uuOwdWxxQmSy4No4rME4S77d.RY2tfNSO', NULL, NULL, 1, 'Illum mollitia esse', NULL, NULL, NULL, 'USR', '2022-02-13 12:09:06', '2022-02-13 12:09:06'),
(12, 'Jaime', 'Ashley', 'huvemyxix@mailinator.com', '+1 (924) 424-1498', NULL, '$2y$10$F0P9XvBpzaBaHwvqTbm69eIvDMPSIRIODOzEmtH2D1VfzLb5bwOMW', NULL, NULL, 1, 'Facere debitis eius', NULL, NULL, NULL, 'USR', '2022-02-13 12:09:19', '2022-02-13 12:09:19'),
(13, 'Sonia', 'Richards', 'pycosumoze@mailinator.com', '+1 (486) 184-4645', NULL, '$2y$10$huJSjol8wC9.iCN9Or4Ht.aKcgojcNXEepPNWtMLFQWqdrS.9vLYq', NULL, NULL, 1, 'Itaque sint nihil do', NULL, NULL, NULL, 'USR', '2022-02-13 12:09:40', '2022-02-13 12:09:40'),
(14, 'Ferris', 'Moss', 'hywul@mailinator.com', '+1 (767) 306-3298', NULL, '$2y$10$n7w.H0qFjkeCZ2OeNXSP0uUfoL.fF03RvZLbP2Ndjd/jSwMr4iv/m', NULL, NULL, 0, 'Voluptate et exercit', NULL, NULL, NULL, 'USR', '2022-02-13 12:12:38', '2022-02-13 23:04:35'),
(15, 'Kellie', 'Morton', 'liwijococ@mailinator.com', '+1 (893) 195-1149', NULL, '$2y$10$qWbepa2SRhRzXNJQdD5iEuHGnSQT92BLfZvbjHh8lSnE1Ahura9fW', NULL, NULL, 1, 'Nobis impedit neces', NULL, NULL, NULL, 'USR', '2022-02-14 04:38:09', '2022-02-14 04:38:09'),
(16, 'Mara', 'Becker', 'vyhegyheje@mailinator.com', '+1 (369) 716-4427', NULL, '$2y$10$6.Le.fXotPo86IEKpLxqneYSwKpAfZX0ZC83K4DhBv.aM1ainKG9C', NULL, NULL, 1, 'Molestias fugiat qu', NULL, NULL, NULL, 'USR', '2022-02-17 10:24:42', '2022-02-17 10:24:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_payment`
--
ALTER TABLE `course_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_user`
--
ALTER TABLE `course_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payments_transaction_id_unique` (`transaction_id`),
  ADD KEY `payments_user_id_foreign` (`user_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `course_payment`
--
ALTER TABLE `course_payment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `course_user`
--
ALTER TABLE `course_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
