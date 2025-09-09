-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2021 at 09:34 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookvr_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `booking_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_date` date NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `week` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redeem_loyalty_points` int(11) DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `promo_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loyalty_points_to_user` int(11) DEFAULT NULL,
  `user_photographer_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_photographer_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_photographer_check_in` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_request_id` bigint(20) UNSIGNED NOT NULL,
  `shoot_for_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `booking_code`, `booking_no`, `location`, `longitude`, `latitude`, `full_date`, `year`, `month`, `week`, `date`, `day`, `time`, `details`, `status`, `redeem_loyalty_points`, `amount`, `total_amount`, `promo_code`, `loyalty_points_to_user`, `user_photographer_id`, `user_photographer_name`, `user_photographer_check_in`, `package_request_id`, `shoot_for_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'ID20210327', '1', 'BB Banquate', NULL, NULL, '2021-04-04', '2021', 'Mar', '13', '30', 'Friday', '01:30 PM', 'Testing.', 'Cancel Booking', NULL, '120', '120', NULL, NULL, '5', NULL, NULL, 1, 3, 4, '2021-03-27 05:35:07', '2021-04-03 17:07:07'),
(3, 'ID20210329', '2', 'BB Banquate', NULL, NULL, '2021-03-29', '2021', 'Mar', '13', '29', 'Friday', '01:30 PM', 'Testing', 'Completed', NULL, '120', '120', NULL, 10, '5', 'Muhammad Muzammil', NULL, 1, 3, 4, '2021-03-27 05:35:07', '2021-03-31 01:37:15'),
(4, 'ID20210331', '3', 'BB Banquate', NULL, NULL, '2021-03-31', '2021', 'Mar', '13', '31', 'Friday', '01:30 PM', 'confirm booking details', 'Completed', 5, '120', '120', NULL, NULL, '5', 'Muhammad Muzammil Khan', '2021-03-31 07:33 AM', 1, 3, 4, '2021-03-27 05:35:07', '2021-03-31 02:33:28'),
(5, 'ID20210401', '4', 'BB Banquate', NULL, NULL, '2021-04-06', '2021', 'Apr', '13', '01', 'Thursday', '01:30 PM', 'Testingyuweyuiwq', 'Completed', NULL, '122', '122', NULL, NULL, '5', NULL, 'Tuesday Apr 06 2021 06:01', 1, 3, 4, '2021-03-27 05:35:07', '2021-04-06 01:01:34'),
(6, 'ID20210403', '2', 'BB Hall', NULL, NULL, '2021-04-14', '2021', 'Apr', '14', '14', 'Saturday', '15:01', 'dssa', 'Requested', NULL, NULL, NULL, NULL, NULL, '5', NULL, NULL, 2, 9, 4, '2021-04-03 17:01:26', '2021-04-03 17:01:26'),
(7, 'ID20210403', '3', 'Cornish HOtel', NULL, NULL, '2021-04-19', '2021', 'Apr', '15', '19', 'Tuesday', '15:09', 'test', 'Requested', NULL, NULL, NULL, NULL, NULL, '5', NULL, NULL, 2, 8, 4, '2021-04-03 17:06:43', '2021-04-03 17:06:43'),
(8, 'ID20210406', '4', 'Mateen Shopping Galaxy, Rashid Minhas Road Service Lane, Block 10-A Block 10 A Gulshan-e-Iqbal, Karachi, Pakistan', '67.1115203', '24.9060121', '2021-04-20', '2021', 'Apr', '15', '20', 'Tuesday', 'Tuesday Apr 13 2021 12:15', 'test api', 'Photographer Assigned', NULL, '250 AED', '250 AED', NULL, NULL, '5', 'Muhammad Muzammil Khan', NULL, 2, 9, 4, '2021-04-06 02:16:05', '2021-04-06 02:32:56'),
(9, 'ID20210406', '5', 'Mateen Shopping Galaxy, Rashid Minhas Road Service Lane, Block 10-A Block 10 A Gulshan-e-Iqbal, Karachi, Pakistan', '67.1115203', '24.9060121', '2021-04-20', '2021', 'Apr', '16', '20', 'Tuesday', 'Tuesday Apr 20 2021 17:00', 'test api', 'Requested', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 9, 4, '2021-04-06 06:48:32', '2021-04-06 06:48:32');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `is_view` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `first_name`, `last_name`, `phone`, `email`, `message`, `date`, `is_view`, `created_at`, `updated_at`) VALUES
(1, 'Afroz', 'Siddique', '03460329659', 'afrozsiddique@gmail.com', 'api test', '2021-03-22', 1, '2021-03-22 02:02:49', '2021-03-22 04:11:30'),
(2, 'Muhammad', 'Muzammil', '03460329659', 'muzammilken95@gmail.com', 'test contact form', '2021-03-22', 1, '2021-03-22 07:03:01', '2021-03-22 07:03:25');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loyalty_points` int(11) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `isactive` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `email`, `image`, `phone_code`, `phone_number`, `date_of_birth`, `gender`, `loyalty_points`, `user_id`, `isactive`, `created_at`, `updated_at`) VALUES
(1, 'Muhammad', 'Muzammil', 'muzammil1@gmail.com', 'customer1605695.png', '+92', '3460329659', '1996-11-05', 'Male', 5, 4, 1, '2021-03-24 01:03:22', '2021-04-06 02:32:36'),
(2, 'Muzammil', 'Khan', 'muzammilke95@gmail.com', 'customer13358711583732121598.jpg', '+92', '3460329659', '1996-11-05', 'Male', NULL, 6, 1, '2021-03-30 04:02:28', '2021-04-05 05:04:33'),
(3, 'Muzammil', 'Khan', 'testmuzammil@gmail.com', 'customer78928461583732121598.jpg', '+92', '3460329659', '2000-01-02', 'Male', NULL, 7, 1, '2021-03-31 05:34:54', '2021-04-02 16:30:54'),
(4, 'new', 'test', 'newtest@gmail.com', 'customer9052072bookvr.png', '+92', '340329659', '2003-03-06', 'Male', NULL, 10, 1, '2021-04-20 04:58:42', '2021-04-20 04:58:42');

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
(4, '2021_02_26_110138_create_permission_tables', 1),
(5, '2021_03_10_152311_create_customers_table', 1),
(6, '2021_03_10_153910_create_photography_equipments_table', 1),
(7, '2021_03_10_154017_create_spaces_photographeds_table', 1),
(8, '2021_03_10_154250_create_photographers_table', 1),
(9, '2021_03_10_160248_create_shoot_fors_table', 1),
(10, '2021_03_10_160315_create_package_requests_table', 1),
(11, '2021_03_10_160610_create_photographer_projects_table', 1),
(12, '2021_03_10_161320_create_notifications_table', 1),
(13, '2021_03_10_161423_create_project_images_table', 1),
(14, '2021_03_10_161750_create_promo_codes_table', 1),
(15, '2021_03_10_161803_create_bookings_table', 1),
(18, '2021_03_22_053717_create_contact_us_table', 2),
(19, '2021_03_24_052321_add_column_user', 3),
(20, '2019_12_14_000001_create_personal_access_tokens_table', 4),
(23, '2021_03_27_073818_create_bookings_table', 5),
(24, '2021_03_30_044702_add_column_to_notification', 6),
(25, '2021_03_31_054950_add_column_bookings', 7),
(26, '2021_04_06_103414_update_column_fcm_user', 8);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 5),
(2, 'App\\Models\\User', 8),
(2, 'App\\Models\\User', 9),
(3, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3),
(3, 'App\\Models\\User', 4),
(3, 'App\\Models\\User', 6),
(3, 'App\\Models\\User', 7),
(3, 'App\\Models\\User', 10);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `send_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `send_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `booking_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `send_by`, `send_to`, `description`, `status`, `booking_id`, `created_at`, `updated_at`) VALUES
(1, '1', '4', 'Dear Muhammad Muzammil, Your Quote is 120 Against the BookingID ID202103271', '1', '1', '2021-03-29 06:38:43', '2021-04-22 02:21:14'),
(2, '1', '4', 'Dear Muhammad Muzammil, Your Quote is 122 Against this BookingID ID202104014', '1', '5', '2021-03-30 05:40:02', '2021-04-22 02:21:14'),
(3, '1', '4', 'Dear Muhammad Muzammil, Your Quote is 250 AED Against this BookingID ID202104064', '1', '8', '2021-04-06 02:32:13', '2021-04-22 02:21:14');

-- --------------------------------------------------------

--
-- Table structure for table `package_requests`
--

CREATE TABLE `package_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isactive` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_requests`
--

INSERT INTO `package_requests` (`id`, `name`, `isactive`, `created_at`, `updated_at`) VALUES
(1, 'Ongoing Project Quote', 1, NULL, '2021-03-20 01:00:12'),
(2, 'Specific Project Quote', 1, NULL, NULL);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 4, 'app-login-token', 'd39f6d916184d17cd3c9e0b0888b4e89f9f5a5428e015af417c37b7e98126065', '[\"*\"]', NULL, '2021-03-24 01:57:04', '2021-03-24 01:57:04'),
(2, 'App\\Models\\User', 4, 'app-login-token', 'fd789f0e186d006f8ae84271d7ad3d0b94f86675592cf3f65adeb37d362ecd0f', '[\"*\"]', NULL, '2021-03-25 01:34:48', '2021-03-25 01:34:48'),
(3, 'App\\Models\\User', 4, 'app-login-token', 'd462eb12c3c913b68aab237b6bcd2972eb75cd2aab2460a465d5afbd6af509a9', '[\"*\"]', NULL, '2021-03-25 01:36:02', '2021-03-25 01:36:02'),
(4, 'App\\Models\\User', 4, 'app-login-token', 'b2f134b618fd93ab92bd7c3be49dc77dc5dacee78611a73b1d47e280f329e99e', '[\"*\"]', NULL, '2021-03-25 01:44:57', '2021-03-25 01:44:57'),
(5, 'App\\Models\\User', 5, 'app-login-token', 'a5ff4c522bf58df34c04ffbf3da3f2eee77dbec7e8e201a303fa6efa8b072858', '[\"*\"]', NULL, '2021-03-25 01:59:16', '2021-03-25 01:59:16'),
(6, 'App\\Models\\User', 6, 'app-login-token', '3ddf76e79681115aec010cb3cb21d14cd4f9b5b6bb1f1dd51f66a64edb22b9af', '[\"*\"]', NULL, '2021-03-30 04:02:28', '2021-03-30 04:02:28'),
(7, 'App\\Models\\User', 6, 'app-login-token', '8ee4493568bb397379a47c7d6e7ceaaeeff11d5a129b983136a6db3d3a3cca22', '[\"*\"]', NULL, '2021-03-30 04:05:25', '2021-03-30 04:05:25');

-- --------------------------------------------------------

--
-- Table structure for table `photographers`
--

CREATE TABLE `photographers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bio` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `equipment_id` bigint(20) UNSIGNED NOT NULL,
  `spaces_photograph_id` bigint(20) UNSIGNED NOT NULL,
  `equip_other_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isactive` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photographers`
--

INSERT INTO `photographers` (`id`, `first_name`, `last_name`, `email`, `image`, `phone_code`, `phone_number`, `date_of_birth`, `gender`, `address`, `experience`, `bio`, `user_id`, `equipment_id`, `spaces_photograph_id`, `equip_other_name`, `isactive`, `created_at`, `updated_at`) VALUES
(1, 'Muhammad', 'Muzammil Khan', 'muzammil10@gmail.com', 'photographer5066011.png', '+92', '3460329659', '1996-11-05', 'Male', 'johar mor', '5 years', 'register photographer updated', 5, 9, 6, NULL, 1, '2021-03-25 00:58:29', '2021-04-04 15:45:36'),
(2, 'Test', 'Test', 'testtnew@gmail.com', 'photographer6853522bookvr.png', '+92', '123456', '2003-03-09', 'Male', 'hdfudiudsmf', '2 years', 'jjejkldjsa', 9, 9, 1, NULL, 1, '2021-03-31 06:15:21', '2021-03-31 06:15:21');

-- --------------------------------------------------------

--
-- Table structure for table `photographer_projects`
--

CREATE TABLE `photographer_projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `portfolio_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `shoot_for_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photographer_projects`
--

INSERT INTO `photographer_projects` (`id`, `title`, `location`, `portfolio_link`, `description`, `user_id`, `shoot_for_id`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test', 'test.co', 'testing', 5, 4, '2021-03-25 06:10:34', '2021-03-25 06:10:34'),
(2, 'test', 'test', 'test.co', 'testing', 5, 4, '2021-03-25 06:11:17', '2021-03-25 06:11:17'),
(4, 'Rental', 'BB Hall', 'www.look.com', 'tetsing', 5, 8, '2021-04-05 01:35:17', '2021-04-05 01:35:17'),
(5, 'Rental', 'BB Hall', 'www.look.com', 'tetsing', 5, 8, '2021-04-05 01:36:05', '2021-04-05 01:36:05'),
(6, 'Rental', 'BB Hall', 'www.look.com', 'test', 5, 9, '2021-04-05 04:02:35', '2021-04-05 04:02:35'),
(7, 'Rental', 'BB Hall', 'www.look.com', 'test', 5, 9, '2021-04-05 04:03:19', '2021-04-05 04:03:19'),
(8, 'Rental New', 'BB Hall', 'www.look.com', 'test', 5, 9, '2021-04-05 04:04:22', '2021-04-05 04:04:22'),
(9, 'Rental New test', 'BB Hall', 'www.look.com', 'test', 5, 8, '2021-04-05 04:06:18', '2021-04-05 04:06:18'),
(10, 'test5', 'test', 'test.co', 'testing', 5, 4, '2021-04-05 04:10:06', '2021-04-05 04:10:06');

-- --------------------------------------------------------

--
-- Table structure for table `photography_equipments`
--

CREATE TABLE `photography_equipments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isactive` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photography_equipments`
--

INSERT INTO `photography_equipments` (`id`, `name`, `isactive`, `created_at`, `updated_at`) VALUES
(1, 'Other', 1, NULL, NULL),
(2, 'Drone', 1, NULL, NULL),
(3, 'Z1', 1, NULL, NULL),
(4, 'Insta 360', 1, NULL, NULL),
(5, 'Leica BLK 360', 1, NULL, NULL),
(8, 'Matterport Pro 1', 1, NULL, NULL),
(9, 'Matterport Pro 2', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_images`
--

CREATE TABLE `project_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photographer_project_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_images`
--

INSERT INTO `project_images` (`id`, `images`, `photographer_project_id`, `created_at`, `updated_at`) VALUES
(1, 'project6018702.png', 2, '2021-03-25 06:11:17', '2021-03-25 06:11:17'),
(2, 'project4292002.png', 2, '2021-03-25 06:11:17', '2021-03-25 06:11:17'),
(3, 'project2730824screencapture-localhost-8000-admin-add-loyalty-points-4-2021-03-31-17_26_28.png', 7, '2021-04-05 04:03:19', '2021-04-05 04:03:19'),
(4, 'project4759588screencapture-localhost-8000-customer-bookings-2021-04-03-02_47_03.png', 8, '2021-04-05 04:04:22', '2021-04-05 04:04:22'),
(5, 'project5804988screencapture-localhost-8000-customer-change-password-2021-04-03-02_45_11.png', 8, '2021-04-05 04:04:22', '2021-04-05 04:04:22'),
(6, 'project397797screencapture-localhost-8000-customer-edit-profile-2021-04-03-02_44_48.png', 8, '2021-04-05 04:04:22', '2021-04-05 04:04:22'),
(7, 'project960256screencapture-localhost-8000-customer-notification-2021-04-03-02_47_22.png', 8, '2021-04-05 04:04:22', '2021-04-05 04:04:22'),
(8, 'project5921737screencapture-localhost-8000-customer-index-2021-04-03-02_48_44.png', 8, '2021-04-05 04:04:22', '2021-04-05 04:04:22'),
(9, 'project7047106screencapture-kapturise-bookings-2021-04-02-23_27_24.png', 9, '2021-04-05 04:06:18', '2021-04-05 04:06:18'),
(10, 'project7988609screencapture-localhost-8000-sign-up-2021-03-31-17_20_55.png', 9, '2021-04-05 04:06:18', '2021-04-05 04:06:18'),
(11, 'project4748638screencapture-localhost-8000-admin-add-loyalty-points-4-2021-03-31-17_26_28.png', 10, '2021-04-05 04:10:06', '2021-04-05 04:10:06');

-- --------------------------------------------------------

--
-- Table structure for table `promo_codes`
--

CREATE TABLE `promo_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active_from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expire_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isactive` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promo_codes`
--

INSERT INTO `promo_codes` (`id`, `code`, `amount`, `type`, `active_from`, `expire_date`, `isactive`, `created_at`, `updated_at`) VALUES
(1, 'Test Promo', 10, 'Fixed', '2021-03-20', '2021-03-31', 1, NULL, '2021-03-20 01:33:49');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', NULL, NULL),
(2, 'photographer', 'web', NULL, NULL),
(3, 'customer', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shoot_fors`
--

CREATE TABLE `shoot_fors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isactive` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shoot_fors`
--

INSERT INTO `shoot_fors` (`id`, `name`, `image`, `isactive`, `created_at`, `updated_at`) VALUES
(1, 'Furniture & Virtual Staging', 'shoot_for_1533.png', 1, NULL, NULL),
(2, 'Interior Design', 'shoot_for_3824.png', 1, NULL, NULL),
(3, 'Retail & Commercial', 'shoot_for_3725.png', 1, NULL, NULL),
(4, 'Insurance & Restoration', 'shoot_for_3532.png', 1, NULL, NULL),
(5, 'Architecture Engineering Construction', 'shoot_for_3026.png', 1, NULL, NULL),
(6, 'Facility Management', 'shoot_for_6627.png', 1, NULL, NULL),
(7, 'Travel & Tourism', 'shoot_for_4500.png', 1, NULL, NULL),
(8, 'Hotel & Resturant', 'shoot_for_8402.png', 1, NULL, NULL),
(9, 'Real Estate', 'shoot_for_3514.png', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `spaces_photographeds`
--

CREATE TABLE `spaces_photographeds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isactive` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spaces_photographeds`
--

INSERT INTO `spaces_photographeds` (`id`, `name`, `isactive`, `created_at`, `updated_at`) VALUES
(1, '0-10', 1, NULL, NULL),
(2, '11-50', 1, NULL, NULL),
(3, '51-100', 1, NULL, NULL),
(4, '101-200', 1, NULL, NULL),
(5, '201-500', 1, NULL, NULL),
(6, '501-1000', 1, NULL, '2021-03-20 01:13:41'),
(7, '1001-5000+', 1, NULL, NULL);

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
  `fcm_token` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `fcm_token`, `remember_token`, `created_at`, `updated_at`, `google_id`, `is_active`) VALUES
(1, 'admin', 'admin@bookvr.com', NULL, '$2y$10$kkAWqNIGFhrbP2Pao91h.eniP2Ch9yD8Pc53OmTr2tXjbmf2FC7L6', NULL, NULL, '2021-03-12 10:04:44', '2021-03-12 10:04:44', NULL, NULL),
(4, 'Muhammad Muzammil', 'muzammil1@gmail.com', NULL, '$2y$10$eFaUv66smUfMSP3Q9khOOemM47XUUw8IzxLVObLWCcyfsAt/Ov5rO', NULL, NULL, '2021-03-24 01:03:21', '2021-03-24 04:09:55', NULL, 1),
(5, 'Muhammad Muzammil Khan', 'muzammil10@gmail.com', NULL, '$2y$10$gHq9MHJpfuRBuBgbTQc8Nuxe25/J54a02t8SABWy5Z/i1rhw46CCe', 'dzxU5jwOwLjpRGiRlL3Ksx:APA91bG9uF3Y65tKOX7XeFJvq3e3xft9DWoGYfdkSV_k28BJZsLURVO4G2j-7JglHLeWzucX2_tQv2nz3DWiuUHf95r93RrmQ13aXJ_zMyYpMzf5UssXpNdsHUX_zwByQjym-LIUNmNH', NULL, '2021-03-25 00:58:28', '2021-04-12 06:38:29', NULL, 1),
(6, 'Muzammil Khan', 'muzammilke95@gmail.com', NULL, '$2y$10$cjLakoBoGTrZljFhzOuv1O/I/fzmWNpSqL8LsnHV3dJxOklGvZIae', NULL, NULL, '2021-03-30 04:02:28', '2021-04-05 05:04:33', '101028096952012842747', 1),
(7, 'Muzammil Khan', 'testmuzammil@gmail.com', NULL, '$2y$10$4apL0yJ6J9A0PE4Eh4/s2O1NnGi5ZP4bY1nDx58noFsn2RHVNbLLe', NULL, NULL, '2021-03-31 05:34:53', '2021-04-02 16:38:32', NULL, 1),
(8, 'Test Test', 'test@gmail.com', NULL, '$2y$10$uL4Gg9dV/BojAYS1IQ0Z3uLS9Mb8/K5RrxjqNHqcG4IcqyLdK/8v2', NULL, NULL, '2021-03-31 06:11:26', '2021-04-12 06:59:28', NULL, 1),
(9, 'Test Test', 'testtnew@gmail.com', NULL, '$2y$10$LrIYRCvWjxuAV6yQmGPFZ.afbTykZks2/TqRXeBLVhkFnRuJpIGJG', NULL, NULL, '2021-03-31 06:15:21', '2021-03-31 06:15:21', NULL, 1),
(10, 'new test', 'newtest@gmail.com', NULL, '$2y$10$Z.9Jfd6Ke9.PftndnaFRfOBP7FgjuK28P6rvzvauPkvP6LX8gPyLq', NULL, NULL, '2021-04-20 04:58:42', '2021-04-20 04:58:42', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_package_request_id_foreign` (`package_request_id`),
  ADD KEY `bookings_shoot_for_id_foreign` (`shoot_for_id`),
  ADD KEY `bookings_user_id_foreign` (`user_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_user_id_foreign` (`user_id`);

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
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_requests`
--
ALTER TABLE `package_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `photographers`
--
ALTER TABLE `photographers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `photographers_user_id_foreign` (`user_id`),
  ADD KEY `photographers_equipment_id_foreign` (`equipment_id`),
  ADD KEY `photographers_spaces_photograph_id_foreign` (`spaces_photograph_id`);

--
-- Indexes for table `photographer_projects`
--
ALTER TABLE `photographer_projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `photographer_projects_user_id_foreign` (`user_id`),
  ADD KEY `photographer_projects_shoot_for_id_foreign` (`shoot_for_id`);

--
-- Indexes for table `photography_equipments`
--
ALTER TABLE `photography_equipments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_images`
--
ALTER TABLE `project_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_images_photographer_project_id_foreign` (`photographer_project_id`);

--
-- Indexes for table `promo_codes`
--
ALTER TABLE `promo_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `shoot_fors`
--
ALTER TABLE `shoot_fors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spaces_photographeds`
--
ALTER TABLE `spaces_photographeds`
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
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `package_requests`
--
ALTER TABLE `package_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `photographers`
--
ALTER TABLE `photographers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `photographer_projects`
--
ALTER TABLE `photographer_projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `photography_equipments`
--
ALTER TABLE `photography_equipments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `project_images`
--
ALTER TABLE `project_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `promo_codes`
--
ALTER TABLE `promo_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shoot_fors`
--
ALTER TABLE `shoot_fors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `spaces_photographeds`
--
ALTER TABLE `spaces_photographeds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_package_request_id_foreign` FOREIGN KEY (`package_request_id`) REFERENCES `package_requests` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_shoot_for_id_foreign` FOREIGN KEY (`shoot_for_id`) REFERENCES `shoot_fors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `photographers`
--
ALTER TABLE `photographers`
  ADD CONSTRAINT `photographers_equipment_id_foreign` FOREIGN KEY (`equipment_id`) REFERENCES `photography_equipments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `photographers_spaces_photograph_id_foreign` FOREIGN KEY (`spaces_photograph_id`) REFERENCES `spaces_photographeds` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `photographers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `photographer_projects`
--
ALTER TABLE `photographer_projects`
  ADD CONSTRAINT `photographer_projects_shoot_for_id_foreign` FOREIGN KEY (`shoot_for_id`) REFERENCES `shoot_fors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `photographer_projects_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_images`
--
ALTER TABLE `project_images`
  ADD CONSTRAINT `project_images_photographer_project_id_foreign` FOREIGN KEY (`photographer_project_id`) REFERENCES `photographer_projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
