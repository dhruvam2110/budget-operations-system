-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2023 at 08:35 AM
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
(1, '2020 - 21', 500000000.00, 1, NULL, '2023-03-17 02:03:41', '2023-03-17 02:03:41'),
(2, '2021 - 22', 600000000.00, 1, NULL, '2023-03-17 02:03:56', '2023-03-17 02:03:56'),
(3, '2022 - 23', 700000000.00, 1, NULL, '2023-03-17 02:04:06', '2023-03-17 02:04:06'),
(4, '2023 - 24', 800000000.00, 1, NULL, '2023-03-17 02:04:15', '2023-03-17 02:04:15'),
(5, '2019 - 20', 400000000.00, 1, NULL, '2023-03-17 02:04:57', '2023-03-17 02:04:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `budget_amounts`
--
ALTER TABLE `budget_amounts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `budget_amounts`
--
ALTER TABLE `budget_amounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
