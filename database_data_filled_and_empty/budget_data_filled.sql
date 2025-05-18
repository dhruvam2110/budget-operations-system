-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2023 at 10:41 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `budget`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `emp_code` int(11) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `mob_num` bigint(20) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `image` varchar(255) DEFAULT 'user.png',
  `token` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `emp_code`, `email`, `mob_num`, `email_verified_at`, `password`, `gender`, `image`, `token`, `is_active`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 2002, 'admin@admin.com', 9510163269, NULL, '$2y$10$sq0onLxhP/4rVG5cwyotJeOFDHc.WvssrMj68HDwudj.xcIshJvvy', 'Male', '1679043657.jpg', NULL, 1, NULL, NULL, '2023-03-17 03:30:20', '2023-03-17 03:30:57'),
(2, 'Heet Shah', 1234, 'heet.c1234@veedacr.com', 9867543123, NULL, NULL, 'Male', '1679036379.jpg', NULL, 1, NULL, NULL, '2023-03-16 19:59:39', '2023-03-16 19:59:39'),
(3, 'Dhruvam Desai', 2110, 'dhruvam.c2110@veedacr.com', 7041678923, NULL, NULL, 'Male', '1679036445.jpg', NULL, 1, NULL, NULL, '2023-03-16 20:00:45', '2023-03-16 20:00:45'),
(4, 'Shlok Patel', 1402, 'shlok.c1402@veedacr.com', 9832747382, NULL, NULL, 'Male', '1679036490.jpg', NULL, 1, NULL, NULL, '2023-03-16 20:01:30', '2023-03-16 20:01:30'),
(5, 'Sani Chauhan', 2654, 'sani.c2654@veedacr.com', 9962373648, NULL, NULL, 'Male', '1679036528.jpg', NULL, 1, NULL, NULL, '2023-03-16 20:02:08', '2023-03-16 20:02:08'),
(6, 'Chandresh Vanker', 2150, 'chandresh.c2150@veedacr.com', 8326487238, NULL, NULL, 'Male', '1679036630.jpg', NULL, 1, NULL, NULL, '2023-03-16 20:03:50', '2023-03-16 20:03:50'),
(7, 'Priya Chavda', 2157, 'priya.c2157@veedacr.com', 7389203749, NULL, NULL, 'Female', '1679036685.jpg', NULL, 1, NULL, NULL, '2023-03-16 20:04:45', '2023-03-16 20:04:45'),
(8, 'Pranav Dalal', 1998, 'pranav.c1998@veedacr.com', 8898942945, NULL, NULL, 'Male', '1679036774.jpg', NULL, 1, NULL, NULL, '2023-03-16 20:06:14', '2023-03-16 20:06:14'),
(9, 'Software Artisan', 2901, 'softwareartisan3@gmail.com', 9836372193, NULL, NULL, 'Male', '1679036817.jpg', NULL, 1, NULL, NULL, '2023-03-16 20:06:57', '2023-03-16 20:06:57'),
(10, 'Jaimin Patel', 1546, 'jaimin.c1546@veedacr.com', 9238764293, NULL, NULL, 'Male', '1679036909.jpg', NULL, 1, NULL, NULL, '2023-03-16 20:08:29', '2023-03-16 20:08:29'),
(11, 'Pratham Shah', 2802, 'pratham.c2802@veedacr.com', 8992387498, NULL, NULL, 'Male', '1679037260.jpg', NULL, 1, NULL, NULL, '2023-03-16 20:14:20', '2023-03-16 20:14:20'),
(12, 'Manit Shah', 1803, 'manit.c1803@veedacr.com', 9923879823, NULL, NULL, 'Male', '1679037308.jpg', NULL, 1, NULL, NULL, '2023-03-16 20:15:08', '2023-03-16 20:16:30'),
(13, 'Jash Makwana', 1003, 'jash.c1003@veedacr.com', 9213897462, NULL, NULL, 'Male', '1679037343.jpg', NULL, 1, NULL, NULL, '2023-03-16 20:15:43', '2023-03-16 20:15:43'),
(14, 'Tushar Thakkar', 1503, 'tushar.c1503@veedacr.com', 9712323478, NULL, NULL, 'Male', '1679037433.jpg', NULL, 1, NULL, NULL, '2023-03-16 20:17:13', '2023-03-16 20:17:13'),
(15, 'Akshat Shah', 2810, 'akshat.c2810@veedacr.com', 8234923457, NULL, NULL, 'Male', '1679037476.jpg', NULL, 1, NULL, NULL, '2023-03-16 20:17:56', '2023-03-16 20:17:56'),
(16, 'Neet Parikh', 2183, 'neet.c2183@veedacr.com', 9239847923, NULL, NULL, 'Male', '1679037577.jpg', NULL, 1, NULL, NULL, '2023-03-16 20:19:37', '2023-03-16 20:19:37'),
(17, 'Rajesh Limbachia', 1765, 'rajesh.c1765@veedacr.com', 8384756837, NULL, NULL, 'Male', '1679037624.jpg', NULL, 1, NULL, NULL, '2023-03-16 20:20:24', '2023-03-16 20:20:24'),
(18, 'Ishita Joshi', 2432, 'ishita.c2432@veedacr.com', 9823648273, NULL, NULL, 'Female', '1679037712.jpg', NULL, 1, NULL, NULL, '2023-03-16 20:21:52', '2023-03-16 20:21:52'),
(19, 'Devarshi Trivedi', 1334, 'devarshi.c1334@veedacr.com', 9723987593, NULL, NULL, 'Female', '1679037762.jpg', NULL, 1, NULL, NULL, '2023-03-16 20:22:42', '2023-03-16 20:22:42'),
(20, 'Vishwa Shah', 1534, 'vishwa.c1534@veedacr.com', 7827492374, NULL, NULL, 'Female', '1679037808.jpg', NULL, 1, NULL, NULL, '2023-03-16 20:23:28', '2023-03-16 20:23:28'),
(21, 'Helee Shah', 2145, 'helee.c2145@veedacr.com', 9485987346, NULL, NULL, 'Female', '1679037890.jpg', NULL, 1, NULL, NULL, '2023-03-16 20:24:50', '2023-03-16 20:24:50'),
(22, 'Prachi Shah', 2000, 'prachi.c2000@veedacr.com', 9238462983, NULL, NULL, 'Female', '1679037929.jpg', NULL, 1, NULL, NULL, '2023-03-16 20:25:29', '2023-03-16 20:25:29');

-- --------------------------------------------------------

--
-- Table structure for table `admins_password_resets`
--

CREATE TABLE `admins_password_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `allocated_budgets`
--

CREATE TABLE `allocated_budgets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `budget_id` bigint(20) UNSIGNED NOT NULL,
  `dep_id` bigint(20) UNSIGNED NOT NULL,
  `budget_allocated` double(20,2) NOT NULL,
  `budget_used` double(20,2) DEFAULT 0,
  `budget_remaining` double(20,2) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `allocated_budgets`
--

INSERT INTO `allocated_budgets` (`id`, `budget_id`, `dep_id`, `budget_allocated`, `budget_used`, `budget_remaining`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 30000000.00, 27610000.00, 2390000.00, 1, NULL, '2023-03-17 03:36:40', '2023-03-17 03:47:27'),
(2, 1, 12, 15000000.00, 12195000.00, 2805000.00, 1, NULL, '2023-03-17 03:37:03', '2023-03-17 03:44:52'),
(3, 2, 19, 35000000.00, 31350000.00, 3650000.00, 1, NULL, '2023-03-17 03:48:39', '2023-03-17 03:54:10'),
(4, 2, 17, 20000000.00, 15500000.00, 4500000.00, 1, NULL, '2023-03-17 03:48:49', '2023-03-17 03:59:46');

-- --------------------------------------------------------

--
-- Table structure for table `budget_amounts`
--

CREATE TABLE `budget_amounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `year` varchar(255) NOT NULL,
  `budget_allocated` double(20,2) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `budget_amounts`
--

INSERT INTO `budget_amounts` (`id`, `year`, `budget_allocated`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '2023 - 24', 50000000.00, 1, NULL, '2023-03-16 20:33:41', '2023-03-17 03:34:22'),
(2, '2022 - 23', 60000000.00, 1, NULL, '2023-03-16 20:33:56', '2023-03-17 03:35:12');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dep_name` varchar(255) NOT NULL,
  `dep_code` varchar(255) NOT NULL,
  `emp_code` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `dep_name`, `dep_code`, `emp_code`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Information & Comm. Tech.', 'ICTD', 20, 1, NULL, NULL, NULL),
(2, 'Clinical Affairs Department', 'CA', 2, 1, NULL, NULL, NULL),
(3, 'Biopharmaceutics & Project Management', 'BPD', 3, 1, NULL, NULL, NULL),
(4, 'Purchase Department', 'PD', 4, 1, NULL, NULL, NULL),
(5, 'Bioanalytical Research', 'BRD', 5, 1, NULL, NULL, NULL),
(6, 'Administration & Maintenance', 'AMD', 6, 1, NULL, NULL, NULL),
(7, 'Training And Development', 'TDD', 7, 1, NULL, NULL, NULL),
(8, 'Finance & Accounts', 'FAD', 8, 1, NULL, NULL, NULL),
(9, 'Service Provider', 'SP', 21, 1, NULL, NULL, NULL),
(10, 'Medical Affairs & Pv', 'MPD', 10, 1, NULL, NULL, NULL),
(11, 'Quality Assurance', 'QAD', 11, 1, NULL, NULL, NULL),
(12, 'Clinical Research Department', 'CRD', 12, 1, NULL, NULL, NULL),
(13, 'Business Development', 'BDD', 13, 1, NULL, NULL, NULL),
(14, 'Clinical Operations', 'COD', 14, 1, NULL, NULL, NULL),
(15, 'Data Management', 'DMD', 15, 1, NULL, NULL, NULL),
(16, 'Operations', 'OPR', 16, 1, NULL, NULL, NULL),
(17, 'Human Resource', 'HRD', 17, 1, NULL, NULL, NULL),
(18, 'Pharmacokinetics & Biostatistics Department', 'PBD', 18, 1, NULL, NULL, NULL),
(19, 'Marketing', 'MKTD', 19, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `department_expenditures`
--

CREATE TABLE `department_expenditures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dep_id` bigint(20) UNSIGNED NOT NULL,
  `budget_id` int(11) DEFAULT NULL,
  `expense_type` enum('Capex','Opex','Salary') NOT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price_per_quantity` double(20,2) DEFAULT NULL,
  `service_name` varchar(255) DEFAULT NULL,
  `service_start_date` varchar(255) DEFAULT NULL,
  `service_end_date` varchar(255) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `month` enum('January','February','March','April','May','June','July','August','September','October','November','December') DEFAULT NULL,
  `expense` double(20,2) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department_expenditures`
--

INSERT INTO `department_expenditures` (`id`, `dep_id`, `budget_id`, `expense_type`, `item_name`, `quantity`, `price_per_quantity`, `service_name`, `service_start_date`, `service_end_date`, `remarks`, `month`, `expense`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Capex', 'Clinical Tools Spetula', 150, 300.00, NULL, NULL, NULL, NULL, NULL, 45000.00, 1, NULL, '2023-03-17 03:42:44', '2023-03-17 03:42:44'),
(2, 2, 1, 'Opex', NULL, NULL, NULL, 'Study Management Software', '15-Mar-2023', '15-Mar-2024', '1 Year Full Enterprise Subscription', NULL, 150000.00, 1, NULL, '2023-03-17 03:43:56', '2023-03-17 03:43:56'),
(3, 2, 1, 'Salary', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'January', 12000000.00, 1, NULL, '2023-03-17 03:44:51', '2023-03-17 03:44:51'),
(4, 1, 1, 'Capex', 'Samsung Display Screen', 150, 9000.00, NULL, NULL, NULL, NULL, NULL, 1350000.00, 1, NULL, '2023-03-17 03:45:47', '2023-03-17 03:45:47'),
(5, 1, 1, 'Opex', NULL, NULL, NULL, 'Zing HR', '31-Mar-2023', '31-Mar-2024', 'Full Enterprise Level HR Software', NULL, 260000.00, 1, NULL, '2023-03-17 03:46:26', '2023-03-17 03:46:26'),
(6, 1, 1, 'Salary', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'January', 16000000.00, 1, NULL, '2023-03-17 03:47:03', '2023-03-17 03:47:03'),
(7, 1, 1, 'Salary', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'February', 10000000.00, 1, NULL, '2023-03-17 03:47:27', '2023-03-17 03:47:27'),
(8, 3, 2, 'Opex', NULL, NULL, NULL, 'Social Tracker Software', '31-Mar-2023', '01-Apr-2024', 'Tracks the entire social journey', NULL, 350000.00, 1, NULL, '2023-03-17 03:51:05', '2023-03-17 03:51:05'),
(9, 3, 2, 'Capex', 'Advertisement banners and hoardings', 2000, 500.00, NULL, NULL, NULL, NULL, NULL, 1000000.00, 1, NULL, '2023-03-17 03:52:23', '2023-03-17 03:52:23'),
(10, 3, 2, 'Salary', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'January', 20000000.00, 1, NULL, '2023-03-17 03:52:45', '2023-03-17 03:52:45'),
(11, 3, 2, 'Capex', 'Advertisement Magazines', 10000, 1000.00, NULL, NULL, NULL, NULL, NULL, 10000000.00, 1, NULL, '2023-03-17 03:54:10', '2023-03-17 03:54:10'),
(12, 4, 2, 'Capex', 'Talent Management Rentals', 1000, 500.00, NULL, NULL, NULL, NULL, NULL, 500000.00, 1, NULL, '2023-03-17 03:57:59', '2023-03-17 03:59:31'),
(13, 4, 2, 'Opex', NULL, NULL, NULL, 'Interview hotel booking', '01-Mar-2023', '01-Mar-2027', '5 years hotel contract', NULL, 10000000.00, 1, NULL, '2023-03-17 03:59:21', '2023-03-17 03:59:21'),
(14, 4, 2, 'Salary', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'January', 5000000.00, 1, NULL, '2023-03-17 03:59:46', '2023-03-17 03:59:46');

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
(124, '2014_10_12_000000_create_users_table', 1),
(125, '2014_10_12_100000_create_password_resets_table', 1),
(126, '2019_08_19_000000_create_failed_jobs_table', 1),
(127, '2023_01_09_042734_create_admins_table', 1),
(128, '2023_01_09_042933_create_admins_password_resets_table', 1),
(129, '2023_02_03_034242_create_department_table', 1),
(130, '2023_02_13_061932_create_budget_amounts_table', 1),
(131, '2023_02_27_095850_create_sponsors_table', 1),
(132, '2023_02_28_072218_create_allocated_budgets_table', 1),
(133, '2023_03_02_041244_create_department_expenditures_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

CREATE TABLE `sponsors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sponsor_name` varchar(255) NOT NULL,
  `drug_name` varchar(255) NOT NULL,
  `study_year` varchar(255) NOT NULL,
  `study_revenue` double(20,2) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sponsors`
--

INSERT INTO `sponsors` (`id`, `sponsor_name`, `drug_name`, `study_year`, `study_revenue`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Zydus Cadilla', 'Paracetamol', '2023 - 24', 15000000.00, 1, NULL, '2023-03-17 04:03:00', '2023-03-17 04:09:45'),
(2, 'Rontis', 'Lansoprazole', '2023 - 24', 11000000.00, 1, NULL, '2023-03-17 04:05:57', '2023-03-17 04:07:40'),
(3, 'Medreich', 'Proguanil', '2023 - 24', 13000000.00, 1, NULL, '2023-03-17 04:06:18', '2023-03-17 04:09:37'),
(4, 'ELPEN', 'Cefadroxil', '2023 - 24', 15000000.00, 1, NULL, '2023-03-17 04:06:59', '2023-03-17 04:09:32'),
(5, 'Osmotica', 'Azithromycin', '2022 - 23', 20000000.00, 1, NULL, '2023-03-17 04:08:50', '2023-03-17 04:08:50'),
(6, 'Sun Pharma', 'Perindopril', '2022 - 23', 30000000.00, 1, NULL, '2023-03-17 04:09:08', '2023-03-17 04:09:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins_password_resets`
--
ALTER TABLE `admins_password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admins_password_resets_email_index` (`email`);

--
-- Indexes for table `allocated_budgets`
--
ALTER TABLE `allocated_budgets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `allocated_budgets_budget_id_foreign` (`budget_id`),
  ADD KEY `allocated_budgets_dep_id_foreign` (`dep_id`);

--
-- Indexes for table `budget_amounts`
--
ALTER TABLE `budget_amounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departments_emp_code_foreign` (`emp_code`);

--
-- Indexes for table `department_expenditures`
--
ALTER TABLE `department_expenditures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_expenditures_dep_id_foreign` (`dep_id`);

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
-- Indexes for table `sponsors`
--
ALTER TABLE `sponsors`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `admins_password_resets`
--
ALTER TABLE `admins_password_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `allocated_budgets`
--
ALTER TABLE `allocated_budgets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `budget_amounts`
--
ALTER TABLE `budget_amounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `department_expenditures`
--
ALTER TABLE `department_expenditures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `allocated_budgets`
--
ALTER TABLE `allocated_budgets`
  ADD CONSTRAINT `allocated_budgets_budget_id_foreign` FOREIGN KEY (`budget_id`) REFERENCES `budget_amounts` (`id`),
  ADD CONSTRAINT `allocated_budgets_dep_id_foreign` FOREIGN KEY (`dep_id`) REFERENCES `departments` (`id`);

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_emp_code_foreign` FOREIGN KEY (`emp_code`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `department_expenditures`
--
ALTER TABLE `department_expenditures`
  ADD CONSTRAINT `department_expenditures_dep_id_foreign` FOREIGN KEY (`dep_id`) REFERENCES `allocated_budgets` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
