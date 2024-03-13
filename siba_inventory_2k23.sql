-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2024 at 08:59 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siba_inventory_2k23`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(255) DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `created_by`, `isActive`, `created_at`, `updated_at`) VALUES
(1, 'LG', 2, 1, '2024-02-05 13:31:41', '2024-02-05 13:31:41'),
(2, 'Atlas', 2, 1, '2024-02-05 13:31:49', '2024-02-05 13:31:49'),
(3, 'Clorex', 2, 1, '2024-02-07 13:44:54', '2024-02-07 13:44:54'),
(4, 'No Brand', 2, 1, '2024-03-05 13:06:42', '2024-03-05 13:06:42'),
(5, 'Hemas', 8, 1, '2024-03-07 07:58:37', '2024-03-07 07:58:37'),
(6, 'Asus', 2, 1, '2024-03-12 09:15:04', '2024-03-12 09:15:04');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_by`, `isActive`, `created_at`, `updated_at`) VALUES
(1, 'Electronic', 2, 1, '2024-02-05 13:31:15', '2024-03-12 08:15:00'),
(2, 'Stationary', 2, 1, '2024-02-05 13:31:29', '2024-02-05 13:31:29'),
(3, 'Cleaning', 2, 1, '2024-02-07 13:19:42', '2024-02-07 13:19:42'),
(4, 'Other', 2, 1, '2024-02-07 14:18:39', '2024-02-07 14:18:39'),
(5, 'Graduation', 2, 1, '2024-03-05 13:04:36', '2024-03-05 13:04:36'),
(6, 'Medicine', 8, 1, '2024-03-07 07:58:21', '2024-03-07 07:58:21');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `po_no` varchar(255) DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `condition` tinyint(1) NOT NULL DEFAULT 1,
  `condition_updated_by` bigint(20) UNSIGNED NOT NULL,
  `condition_updated_timestamp` timestamp NULL DEFAULT NULL,
  `items_remaining` varchar(255) DEFAULT NULL,
  `lower_limit` varchar(255) DEFAULT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT 1,
  `flag_request` bigint(20) UNSIGNED DEFAULT NULL,
  `flag_return` bigint(20) UNSIGNED DEFAULT NULL,
  `owner` bigint(20) UNSIGNED DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `po_no`, `product_id`, `brand_id`, `item_name`, `condition`, `condition_updated_by`, `condition_updated_timestamp`, `items_remaining`, `lower_limit`, `availability`, `flag_request`, `flag_return`, `owner`, `created_by`, `isActive`, `created_at`, `updated_at`) VALUES
(1, 'po1', 1, 1, 'Fan 1', 1, 2, '2024-03-06 16:31:51', '1', '1', 0, NULL, NULL, 5, 2, 1, '2024-03-06 16:31:51', '2024-03-10 04:34:47'),
(2, 'po07', 5, 5, 'Betadine-100ml', 1, 8, '2024-03-07 08:00:52', '1', '1', 1, NULL, NULL, NULL, 8, 1, '2024-03-07 08:00:52', '2024-03-12 08:27:06'),
(3, 'po07', 5, 5, 'Betadine-50ml', 1, 8, '2024-03-07 08:01:46', '1', '1', 1, NULL, NULL, NULL, 8, 1, '2024-03-07 08:01:46', '2024-03-12 07:57:25'),
(4, 'po0311', 6, 1, 'lg-001', 1, 2, '2024-03-12 08:19:36', '1', '1', 1, NULL, NULL, NULL, 2, 1, '2024-03-12 08:19:36', '2024-03-12 08:28:58'),
(5, 'po255', 7, 6, 'A-1', 1, 3, '2024-03-12 09:17:26', '1', '1', 1, NULL, NULL, NULL, 2, 1, '2024-03-12 09:17:26', '2024-03-12 13:57:08');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(46, '2014_10_12_000000_create_users_table', 1),
(47, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(48, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(49, '2019_08_19_000000_create_failed_jobs_table', 1),
(50, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(51, '2024_01_20_111010_create_sessions_table', 1),
(52, '2024_01_23_234537_create_categories_table', 1),
(53, '2024_01_23_235830_create_products_table', 1),
(54, '2024_01_26_160206_create_brands_table', 1),
(56, '2024_01_29_144456_create_requests_table', 1),
(63, '2024_01_26_182649_create_items_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `lower_limit` int(11) DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `category_id`, `lower_limit`, `created_by`, `isActive`, `created_at`, `updated_at`) VALUES
(1, 'Fan', 1, 1, 2, 1, '2024-02-05 13:32:23', '2024-02-07 17:36:29'),
(2, 'CR-Single-Rule', 2, 0, 2, 1, '2024-02-05 13:32:39', '2024-02-07 17:33:47'),
(3, 'Chlorine', 3, 5, 2, 1, '2024-02-07 13:20:32', '2024-02-07 15:59:26'),
(4, 'Cloak', 5, 4, 2, 1, '2024-03-05 13:05:37', '2024-03-05 21:25:45'),
(5, 'Betadine', 6, 0, 8, 1, '2024-03-07 07:59:20', '2024-03-12 07:58:37'),
(6, 'Laptop', 1, 5, 2, 1, '2024-03-12 08:16:10', '2024-03-12 08:16:10'),
(7, 'Printer', 1, 0, 2, 1, '2024-03-12 09:15:58', '2024-03-12 09:28:38');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_user` varchar(255) DEFAULT NULL,
  `quantity_user` varchar(255) DEFAULT NULL,
  `user_remark` varchar(255) DEFAULT NULL,
  `request_by` bigint(20) UNSIGNED DEFAULT NULL,
  `requested_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `type` tinyint(1) NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `item_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `sm_remark` varchar(255) DEFAULT NULL,
  `store_manager` bigint(20) UNSIGNED DEFAULT NULL,
  `store_manager_timestamp` timestamp NULL DEFAULT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `item_user`, `quantity_user`, `user_remark`, `request_by`, `requested_timestamp`, `type`, `status`, `item_id`, `quantity`, `sm_remark`, `store_manager`, `store_manager_timestamp`, `isActive`, `created_at`, `updated_at`) VALUES
(60, '1', '1', 'I need a Fan', 4, '2024-03-10 03:52:34', 1, 3, 1, '1', 'Reject', 3, '2024-03-10 03:52:34', 1, '2024-03-09 03:50:30', '2024-03-10 03:52:34'),
(61, '2', '2', 'Betadine 2', 4, '2024-03-10 03:58:05', 1, 2, 2, '1', 'Issuing', 3, '2024-03-10 03:58:05', 1, '2024-03-09 17:43:31', '2024-03-10 03:58:05'),
(62, '3', '1', '33', 5, '2024-03-09 17:56:27', 1, 0, NULL, NULL, NULL, NULL, NULL, 1, '2024-03-09 17:56:27', '2024-03-09 17:56:27'),
(63, '2', 'd', 'd', 5, '2024-03-09 18:05:40', 1, 0, NULL, NULL, NULL, NULL, NULL, 1, '2024-03-09 18:05:40', '2024-03-09 18:05:40'),
(64, '1', '1', 'Requesting Fan', 4, '2024-03-10 06:49:33', 1, 1, NULL, NULL, NULL, 3, NULL, 1, '2024-03-10 04:04:09', '2024-03-10 06:49:33'),
(65, '2', '1', 'return', 4, '2024-03-10 08:49:44', 2, 1, NULL, NULL, NULL, 3, NULL, 1, '2024-03-10 04:30:15', '2024-03-10 08:49:44'),
(66, '1', '1', 'Need Fan', 5, '2024-03-10 04:32:16', 1, 2, 1, '1', 'f', 3, '2024-03-10 04:32:16', 1, '2024-03-10 04:31:37', '2024-03-10 04:32:16'),
(67, '1', '1', '1', 5, '2024-03-10 04:33:54', 2, 2, 1, '1', 'Accept', 3, '2024-03-10 04:33:54', 1, '2024-03-10 04:32:29', '2024-03-10 04:33:54'),
(68, '1', '1', 'f', 5, '2024-03-10 04:34:47', 1, 2, 1, '1', 'fan', 3, '2024-03-10 04:34:47', 1, '2024-03-10 04:34:09', '2024-03-10 04:34:47'),
(69, '1', '1', 'Returning Fan', 5, '2024-03-10 15:27:00', 2, 0, NULL, NULL, NULL, NULL, NULL, 1, '2024-03-10 15:27:00', '2024-03-10 15:27:00'),
(70, '2', '1', 'Returning betadine @ 11.44pm', 4, '2024-03-10 18:19:51', 2, 3, 2, '1', 'Rejecting returning', 3, '2024-03-10 18:19:51', 1, '2024-03-10 18:14:51', '2024-03-10 18:19:51'),
(71, '3', '1', 'request', 4, '2024-03-12 07:54:41', 1, 2, 3, '1', 'issue', 7, '2024-03-12 07:54:41', 1, '2024-03-12 07:53:33', '2024-03-12 07:54:41'),
(72, '3', '1', 'return', 4, '2024-03-12 07:57:25', 2, 2, 3, '1', 'accept', 7, '2024-03-12 07:57:25', 1, '2024-03-12 07:55:42', '2024-03-12 07:57:25'),
(73, '4', '1', 'Request', 4, '2024-03-12 08:23:34', 1, 2, 4, '1', 'Issue', 7, '2024-03-12 08:23:34', 1, '2024-03-12 08:20:51', '2024-03-12 08:23:34'),
(74, '2', '1', 'Returning', 4, '2024-03-12 08:27:06', 2, 2, 2, '1', 'Accept', 7, '2024-03-12 08:27:06', 1, '2024-03-12 08:26:07', '2024-03-12 08:27:06'),
(75, '4', '1', 'dsfsdf', 4, '2024-03-12 08:28:58', 2, 2, 4, '1', 'gsgdf', 7, '2024-03-12 08:28:58', 1, '2024-03-12 08:28:12', '2024-03-12 08:28:58'),
(76, '5', '1', 'Need a Printer', 4, '2024-03-12 09:22:00', 1, 2, 5, '1', 'Issueing a printer', 7, '2024-03-12 09:22:00', 1, '2024-03-12 09:19:32', '2024-03-12 09:22:00'),
(77, '5', '1', 'Returning printer', 4, '2024-03-12 09:26:45', 2, 2, 5, '1', 'Accept', 3, '2024-03-12 09:26:45', 1, '2024-03-12 09:23:32', '2024-03-12 09:26:45');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('49AfKIpGHwx4w1TmbESfgqDtJpRLeeas5jPlYCpl', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiSEdMVEROamdDdUxxc3dwbjZobXhwZFdodmlNWmNRcUZRWnNuWjkxUCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zdG9yZU1hbmFnZXIvc3RvcmUiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEyJEVDV253bGNHWFlXL1IyQXQxSG5jbS5lRWIxbTJnUGZxaUdJbGo1dHh3NGVyNWc3RWhBMTNpIjt9', 1710251830),
('8GAxms6PUQtbvqEYx5DRgU70AXTeVtSDVSfgf3l1', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMzFtTm1Edk50V1d2YTkxWW5USGFhckhlRnBxOHpHVW45SlZnWExnSSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0OToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3N0b3JlTWFuYWdlci9wcm9kdWN0LWxpbWl0cyI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1710307886),
('BDPulXIPKAG3F9tDVXbKE6TuVuArJK5bSyvA76VW', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoieVVSODRCV2FlN3pPSllEbWIwdEZoeUlFWXh6ZnFCdEVwWHVNZ0tQaiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zeXN0ZW1BZG1pbi9ob21lIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMiRsb3VKQ1RCcTZpWUtCZGhNRGpxdFpPUDkveTEybWRCaDhJU0hJTmZxZFkveEp1c0FTQk93SyI7fQ==', 1710234766),
('hTxZ2CJAKwEfcc2Rzf0PBN8b2EKdQ8GQrEDz2Xyz', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiUjY4clFjRFlpRndmbjhia3BVTHAyZGI3OHlEclZTaEl6VXBqcFlLTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zeXN0ZW1BZG1pbi9ob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMiRsb3VKQ1RCcTZpWUtCZGhNRGpxdFpPUDkveTEybWRCaDhJU0hJTmZxZFkveEp1c0FTQk93SyI7fQ==', 1710252908),
('iocFtUKsUaO4NkE9ffIgEyiejtmwEOA3a36IRWEx', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoicFlvMjlXWkh4YUM0Ylk0czQ1RlZXYlc5Rm9aT3JVR09zMlcxNG16WiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zdG9yZU1hbmFnZXIvcHJvZHVjdC1saW1pdHMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEyJEVDV253bGNHWFlXL1IyQXQxSG5jbS5lRWIxbTJnUGZxaUdJbGo1dHh3NGVyNWc3RWhBMTNpIjt9', 1710265546),
('lOr3c9j3tOZzzZCsjpyQA3JipmlGav59Mi1QbZ2d', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiamJLcHRzUTkzMDVrNFdzdU9XVHM0SG5ONGRhQkw4bkN0QnhqWHIxbCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c2VyL1JlcXVlc3RJdGVtVGFibGVWaWV3Ijt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NDtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMiRqcmxOYXZSdEwvNnZMaW8zNHVHS0kubGFNRmtUUnNXOWdUQ3ouR3gyVnVvcUVwb1FqUEtGaSI7fQ==', 1710235876),
('rUOD1MRsxFL1yrumPihQtzR6QBdbUuBhatVRvoPs', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiQkEyb3VrVFhmZElpWWN1QnY5NFowc1duQmRFOWk3SERENUsxa0VQaCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zdG9yZU1hbmFnZXIvdmlldy1yZXF1ZXN0ZWQtaXRlbXMiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEyJEVDV253bGNHWFlXL1IyQXQxSG5jbS5lRWIxbTJnUGZxaUdJbGo1dHh3NGVyNWc3RWhBMTNpIjt9', 1710236045),
('vED0qpFSg08shjQ0OXywr2kW74MdEZHa7qBgosy3', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicWRaN0xIQUtBd1UyM21DdUw5elJBcWFoa3UyZnJHV1JsNmF3RWptcyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1710229444);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `epf` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `role` bigint(20) NOT NULL DEFAULT 1,
  `dept_id` bigint(20) DEFAULT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 1,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `epf`, `name`, `role`, `dept_id`, `isActive`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `email_verified_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'admin@mail.com', '0000', 'Admin Amal', 5, NULL, 1, '$2y$12$louJCTBq6iYKBdhMDjqtZOP9/y12mdBh8ISHINfqdY/xJusASBOwK', NULL, NULL, '2024-02-05 13:28:01', 'o8veIxsWNpFuCEcI9sNh6bLhAG3P25xhWuwUG2cb0kXs1YlqaDC7j2aHUIK8', NULL, NULL, '2024-02-05 13:28:01', '2024-02-05 13:28:01'),
(2, 'purchase@mail.com', '123', 'Piyal Purchasing', 3, 8, 1, '$2y$12$/8WbWgledaJcLiYeQ.7L5eja6boNdTWYy/YegH1k..k36DHWo7ue2', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-05 13:28:43', '2024-02-05 13:28:43'),
(3, 'storemanager@mail.com', '132', 'Store Silva', 2, 8, 1, '$2y$12$ECWnwlcGXYW/R2At1Hncm.eEb1m2gPfqiGIlj5txw4er5g7EhA13i', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-05 13:29:07', '2024-02-05 13:29:07'),
(4, 'amal@mail.com', '1234', 'Amal', 1, 3, 1, '$2y$12$jrlNavRtL/6vLio34uGKI.laMFkTRsW9gTCz.Gx2VuoqEpoQjPKFi', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-05 13:29:32', '2024-02-05 13:29:32'),
(5, 'bimal@mail.com', '152', 'Bimal', 1, 4, 1, '$2y$12$jWrAg2HwQhy74FZK2iBbU.dZ3blFlaYFF7mZLWqpMzPXtMuLiLiz.', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-05 13:30:03', '2024-02-05 13:30:03'),
(6, 'sm2@mail.com', '158', 'SM2', 2, 2, 1, '$2y$12$NX7Dh0kZjeIc8qN6Oxfgz.tRSMuF2NySnLKvo2D1KWo8GzQZ8eeUK', NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-05 15:42:12', '2024-02-05 15:42:12'),
(7, 'sadeera@mail.com', '5863', 'sadeera', 2, 8, 1, '$2y$12$njllUBAlQ3v8IZl9u1VUpOc9XeO.FvGCxrwMeLkkwo0vrNtiWN.2O', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-07 07:55:49', '2024-03-07 07:56:08'),
(8, 'saminda@mail.com', '8562', 'saminda', 3, 8, 1, '$2y$12$FR9ILTarvVN0srAxm1dYXuIThrUrIkF9XgO4pCoueMRTNXJIlMNOO', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-07 07:57:09', '2024-03-07 07:57:09'),
(9, 'it@mail.com', '991', 'IT-Department', 1, 1, 1, '$2y$12$2o4dES7W8BfWWYaAGP8wD.WRG4Afqzf0j4yXqgbTxv.ieHtg/.Nia', NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-12 14:15:06', '2024-03-12 14:15:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brands_created_by_foreign` (`created_by`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_created_by_foreign` (`created_by`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_product_id_foreign` (`product_id`),
  ADD KEY `items_brand_id_foreign` (`brand_id`),
  ADD KEY `items_condition_updated_by_foreign` (`condition_updated_by`),
  ADD KEY `items_flag_request_foreign` (`flag_request`),
  ADD KEY `items_flag_return_foreign` (`flag_return`),
  ADD KEY `items_owner_foreign` (`owner`),
  ADD KEY `items_created_by_foreign` (`created_by`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_created_by_foreign` (`created_by`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `requests_request_by_foreign` (`request_by`),
  ADD KEY `requests_store_manager_foreign` (`store_manager`);

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
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `brands`
--
ALTER TABLE `brands`
  ADD CONSTRAINT `brands_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `items_condition_updated_by_foreign` FOREIGN KEY (`condition_updated_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `items_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `items_flag_request_foreign` FOREIGN KEY (`flag_request`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `items_flag_return_foreign` FOREIGN KEY (`flag_return`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `items_owner_foreign` FOREIGN KEY (`owner`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_request_by_foreign` FOREIGN KEY (`request_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `requests_store_manager_foreign` FOREIGN KEY (`store_manager`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
