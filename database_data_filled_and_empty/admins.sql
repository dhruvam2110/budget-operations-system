-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2023 at 08:27 AM
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
(1, 'Admin', 2002, 'admin@admin.com', 9510163269, NULL, '$2y$10$r1gJpPY7GGA.plO9QjE93OYj6nyPoxQH.MVLEQbr6KTv1RW/UQhYC', 'Male', '1679036296.jpg', NULL, 1, NULL, NULL, '2023-03-17 01:27:47', '2023-03-17 01:53:44'),
(2, 'Heet Shah', 1234, 'heet.c1234@veedacr.com', 9867543123, NULL, NULL, 'Male', '1679036379.jpg', NULL, 1, NULL, NULL, '2023-03-17 01:29:39', '2023-03-17 01:29:39'),
(3, 'Dhruvam Desai', 2110, 'dhruvam.c2110@veedacr.com', 7041678923, NULL, NULL, 'Male', '1679036445.jpg', NULL, 1, NULL, NULL, '2023-03-17 01:30:45', '2023-03-17 01:30:45'),
(4, 'Shlok Patel', 1402, 'shlok.c1402@veedacr.com', 9832747382, NULL, NULL, 'Male', '1679036490.jpg', NULL, 1, NULL, NULL, '2023-03-17 01:31:30', '2023-03-17 01:31:30'),
(5, 'Sani Chauhan', 2654, 'sani.c2654@veedacr.com', 9962373648, NULL, NULL, 'Male', '1679036528.jpg', NULL, 1, NULL, NULL, '2023-03-17 01:32:08', '2023-03-17 01:32:08'),
(6, 'Chandresh Vanker', 2150, 'chandresh.c2150@veedacr.com', 8326487238, NULL, NULL, 'Male', '1679036630.jpg', NULL, 1, NULL, NULL, '2023-03-17 01:33:50', '2023-03-17 01:33:50'),
(7, 'Priya Chavda', 2157, 'priya.c2157@veedacr.com', 7389203749, NULL, NULL, 'Female', '1679036685.jpg', NULL, 1, NULL, NULL, '2023-03-17 01:34:45', '2023-03-17 01:34:45'),
(8, 'Pranav Dalal', 1998, 'pranav.c1998@veedacr.com', 8898942945, NULL, NULL, 'Male', '1679036774.jpg', NULL, 1, NULL, NULL, '2023-03-17 01:36:14', '2023-03-17 01:36:14'),
(9, 'Software Artisan', 2901, 'softwareartisan3@gmail.com', 9836372193, NULL, NULL, 'Male', '1679036817.jpg', NULL, 1, NULL, NULL, '2023-03-17 01:36:57', '2023-03-17 01:36:57'),
(10, 'Jaimin Patel', 1546, 'jaimin.c1546@veedacr.com', 9238764293, NULL, NULL, 'Male', '1679036909.jpg', NULL, 1, NULL, NULL, '2023-03-17 01:38:29', '2023-03-17 01:38:29'),
(11, 'Pratham Shah', 2802, 'pratham.c2802@veedacr.com', 8992387498, NULL, NULL, 'Male', '1679037260.jpg', NULL, 1, NULL, NULL, '2023-03-17 01:44:20', '2023-03-17 01:44:20'),
(12, 'Manit Shah', 1803, 'manit.c1803@veedacr.com', 9923879823, NULL, NULL, 'Male', '1679037308.jpg', NULL, 1, NULL, NULL, '2023-03-17 01:45:08', '2023-03-17 01:46:30'),
(13, 'Jash Makwana', 1003, 'jash.c1003@veedacr.com', 9213897462, NULL, NULL, 'Male', '1679037343.jpg', NULL, 1, NULL, NULL, '2023-03-17 01:45:43', '2023-03-17 01:45:43'),
(14, 'Tushar Thakkar', 1503, 'tushar.c1503@veedacr.com', 9712323478, NULL, NULL, 'Male', '1679037433.jpg', NULL, 1, NULL, NULL, '2023-03-17 01:47:13', '2023-03-17 01:47:13'),
(15, 'Akshat Shah', 2810, 'akshat.c2810@veedacr.com', 8234923457, NULL, NULL, 'Male', '1679037476.jpg', NULL, 1, NULL, NULL, '2023-03-17 01:47:56', '2023-03-17 01:47:56'),
(16, 'Neet Parikh', 2183, 'neet.c2183@veedacr.com', 9239847923, NULL, NULL, 'Male', '1679037577.jpg', NULL, 1, NULL, NULL, '2023-03-17 01:49:37', '2023-03-17 01:49:37'),
(17, 'Rajesh Limbachia', 1765, 'rajesh.c1765@veedacr.com', 8384756837, NULL, NULL, 'Male', '1679037624.jpg', NULL, 1, NULL, NULL, '2023-03-17 01:50:24', '2023-03-17 01:50:24'),
(18, 'Ishita Joshi', 2432, 'ishita.c2432@veedacr.com', 9823648273, NULL, NULL, 'Female', '1679037712.jpg', NULL, 1, NULL, NULL, '2023-03-17 01:51:52', '2023-03-17 01:51:52'),
(19, 'Devarshi Trivedi', 1334, 'devarshi.c1334@veedacr.com', 9723987593, NULL, NULL, 'Female', '1679037762.jpg', NULL, 1, NULL, NULL, '2023-03-17 01:52:42', '2023-03-17 01:52:42'),
(20, 'Vishwa Shah', 1534, 'vishwa.c1534@veedacr.com', 7827492374, NULL, NULL, 'Female', '1679037808.jpg', NULL, 1, NULL, NULL, '2023-03-17 01:53:28', '2023-03-17 01:53:28'),
(21, 'Helee Shah', 2145, 'helee.c2145@veedacr.com', 9485987346, NULL, NULL, 'Female', '1679037890.jpg', NULL, 1, NULL, NULL, '2023-03-17 01:54:50', '2023-03-17 01:54:50'),
(22, 'Prachi Shah', 2000, 'prachi.c2000@veedacr.com', 9238462983, NULL, NULL, 'Female', '1679037929.jpg', NULL, 1, NULL, NULL, '2023-03-17 01:55:29', '2023-03-17 01:55:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
