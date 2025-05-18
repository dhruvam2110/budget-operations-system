-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2023 at 10:40 AM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
