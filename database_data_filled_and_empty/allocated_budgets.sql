-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2023 at 10:30 AM
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
-- Table structure for table `allocated_budgets`
--

CREATE TABLE `allocated_budgets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `budget_id` bigint(20) UNSIGNED NOT NULL,
  `dep_id` bigint(20) UNSIGNED NOT NULL,
  `budget_allocated` double(20,2) NOT NULL,
  `budget_used` double(20,2) DEFAULT NULL,
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allocated_budgets`
--
ALTER TABLE `allocated_budgets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `allocated_budgets_budget_id_foreign` (`budget_id`),
  ADD KEY `allocated_budgets_dep_id_foreign` (`dep_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allocated_budgets`
--
ALTER TABLE `allocated_budgets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `allocated_budgets`
--
ALTER TABLE `allocated_budgets`
  ADD CONSTRAINT `allocated_budgets_budget_id_foreign` FOREIGN KEY (`budget_id`) REFERENCES `budget_amounts` (`id`),
  ADD CONSTRAINT `allocated_budgets_dep_id_foreign` FOREIGN KEY (`dep_id`) REFERENCES `departments` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
