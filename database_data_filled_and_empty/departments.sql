-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2023 at 10:09 AM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departments_emp_code_foreign` (`emp_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_emp_code_foreign` FOREIGN KEY (`emp_code`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
