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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department_expenditures`
--
ALTER TABLE `department_expenditures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_expenditures_dep_id_foreign` (`dep_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department_expenditures`
--
ALTER TABLE `department_expenditures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `department_expenditures`
--
ALTER TABLE `department_expenditures`
  ADD CONSTRAINT `department_expenditures_dep_id_foreign` FOREIGN KEY (`dep_id`) REFERENCES `allocated_budgets` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
