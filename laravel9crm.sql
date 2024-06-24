-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2022 at 06:58 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel9crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dp` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `dp`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'admin', 'admin@gmail.com', '$2y$10$/KQbPGOGI.c/piRNCLAKXOWHsGWaiGRWr8zMMkfs0XlG4IJ2qmYZS', '1645082828.jpg', NULL, '2022-02-17 01:57:08', NULL),
(3, 'admin', 'admin2@gmail.com', '$2y$10$/KQbPGOGI.c/piRNCLAKXOWHsGWaiGRWr8zMMkfs0XlG4IJ2qmYZS', '2233', '2022-02-16 23:31:19', '2022-02-16 23:31:19', NULL),
(4, 'Admin', 'admin3@gmail.com', '$2y$10$/KQbPGOGI.c/piRNCLAKXOWHsGWaiGRWr8zMMkfs0XlG4IJ2qmYZS', '2233', '2022-02-16 23:31:56', '2022-02-16 23:31:56', NULL),
(5, 'Admin', 'admin4@gmail.com', '$2y$10$TM6YWNjAFP9.tzu.8KUqXOXhA1iVOYgFEuXVe6sgxseftzLT13bvG', '2233', '2022-02-16 23:34:51', '2022-02-17 00:42:09', '2022-02-17 00:42:09'),
(6, 'adminkhan', 'adminkhan@gmail.com', '$2y$10$JcOpHAllqNRLcldzUeK/aeGr3WsQmbJCu9siGJqnHFLj9PXr3gwse', '2233', '2022-02-18 00:25:41', '2022-02-18 00:25:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `emps`
--

CREATE TABLE `emps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `dp` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emps`
--

INSERT INTO `emps` (`id`, `name`, `email`, `password`, `phone`, `post`, `gender`, `permission`, `dp`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Khan', 'khan@gmail.com', '$2y$10$zBYXv666EitUVqgi6JwuQeWtivXmn/sP82x2m098BE.rumJ0kZ52q', '8878789989', 'HR', 'Male', 'Yes', '1645160574.jpg', '2022-02-17 01:12:10', '2022-02-17 23:32:54', NULL),
(3, 'Anant', 'anant@gmail.com', '$2y$10$ec1gBRj/KYXTPalGBaRD4.CDUHw.0b.tVYi1znPEs3rn9RX/T5k26', '8786789567', 'Inter Viewer', '', 'Yes', NULL, '2022-02-17 01:12:56', '2022-02-17 01:20:29', NULL),
(4, 'Naveen', 'naveen@gmail.com', '$2y$10$KzUJNxPwlCRSj0edw8PdXOcrfeDcchErl3sxurRRf04DqnIVyGkH.', '1234567890', 'Data Admin', 'Male', 'Yes', '1645100328.jpg', '2022-02-17 01:13:15', '2022-02-17 06:58:38', NULL),
(6, 'anjli', 'anjali@gmail.com', '$2y$10$ZtW6Ta5yt3P0C4ErLb5tF.WQGUz4eX4JqYZd81DYLvutfrI6emISi', '8878789989', 'HR', 'female', 'Yes', NULL, '2022-02-17 02:38:03', '2022-02-17 02:40:01', NULL),
(7, 'khan', 'khan1@gmail.com', '$2y$10$ZtW6Ta5yt3P0C4ErLb5tF.WQGUz4eX4JqYZd81DYLvutfrI6emISi', '9878978695', 'Inter Viewer', 'Male', 'Yes', '1645161604.jpg', '2022-02-17 03:00:58', '2022-02-17 23:50:53', NULL);

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_02_16_115027_create_admins_table', 1),
(6, '2022_02_16_115113_create_super_admins_table', 1),
(7, '2022_02_16_115129_create_emps_table', 1),
(8, '2022_02_16_120033_create_user_data_table', 1),
(9, '2022_02_16_120058_create_user_docs_table', 1),
(10, '2022_02_16_120450_add_delete_at_to_admins_table', 1),
(11, '2022_02_16_120515_add_delete_at_to_super_admins_table', 1),
(12, '2022_02_17_062218_add_delete_at_to_emps_table', 2);

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
-- Table structure for table `super_admins`
--

CREATE TABLE `super_admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dp` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `super_admins`
--

INSERT INTO `super_admins` (`id`, `name`, `email`, `password`, `dp`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Super', 'super@gmail.com', '$2y$10$/KQbPGOGI.c/piRNCLAKXOWHsGWaiGRWr8zMMkfs0XlG4IJ2qmYZS', NULL, NULL, '2022-02-16 23:53:34', NULL),
(2, 'Top Super Admin', 'superadmin@gmail.com', '$2y$10$ahHr3tQvbiiYB9uPvomNauHeKvIr3o5TNwoJX7Op6WGv7uJfK0HEC', NULL, '2022-02-18 00:23:57', '2022-02-18 00:23:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `Course` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `City` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `State` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Round_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Round_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Round_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `R1_Result` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `R2_Result` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `R3_Result` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Call_Response` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Select_Status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Data_Admin_Id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Hr_Id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Inter_Id_R1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Inter_Id_R2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Inter_Id_R3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`id`, `Name`, `Email`, `Phone`, `Gender`, `DOB`, `Course`, `Address`, `City`, `State`, `Round_1`, `Round_2`, `Round_3`, `R1_Result`, `R2_Result`, `R3_Result`, `Call_Response`, `Select_Status`, `Data_Admin_Id`, `Hr_Id`, `Inter_Id_R1`, `Inter_Id_R2`, `Inter_Id_R3`, `created_at`, `updated_at`) VALUES
(1, 'Raja', 'raja@gmail.com', '7865678909', 'male', '2003-07-19', 'MCA', NULL, NULL, NULL, '1', '1', NULL, 'Completed', 'Completed', NULL, 'Interested', 'Not Interested', '4', '2', '7', '7', NULL, '2022-02-17 05:33:03', '2022-02-18 00:19:20'),
(2, 'raju', 'raju@gmail.com', '7868987845', 'male', '2018-11-28', 'MCA', NULL, NULL, NULL, '1', '1', NULL, 'Completed', 'Completed', NULL, 'Interested', NULL, '4', '2', '7', '7', NULL, '2022-02-17 05:43:01', '2022-02-18 00:19:25');

-- --------------------------------------------------------

--
-- Table structure for table `user_docs`
--

CREATE TABLE `user_docs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `User_Id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `User_Photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `User_Resume` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `User_10_Class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `User_12_Class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `User_Ug_1st` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `User_Ug_2nd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `User_Ug_3rd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `User_Ug_4th` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `User_Ug_5th` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `User_Ug_6th` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `User_Id_Proof` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_docs`
--

INSERT INTO `user_docs` (`id`, `User_Id`, `User_Photo`, `User_Resume`, `User_10_Class`, `User_12_Class`, `User_Ug_1st`, `User_Ug_2nd`, `User_Ug_3rd`, `User_Ug_4th`, `User_Ug_5th`, `User_Ug_6th`, `User_Id_Proof`, `created_at`, `updated_at`) VALUES
(1, '1', '1645158852.jpg', '1645158852.pdf', '1645158852.pdf', '1645158852.pdf', NULL, NULL, NULL, NULL, NULL, NULL, '1645158852.jpg', '2022-02-17 23:02:52', '2022-02-17 23:32:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emps`
--
ALTER TABLE `emps`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `emps_email_unique` (`email`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `super_admins`
--
ALTER TABLE `super_admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_data_email_unique` (`Email`);

--
-- Indexes for table `user_docs`
--
ALTER TABLE `user_docs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `emps`
--
ALTER TABLE `emps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `super_admins`
--
ALTER TABLE `super_admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_docs`
--
ALTER TABLE `user_docs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
