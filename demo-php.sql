-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2024 at 08:50 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo-php`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `full_name` char(255) NOT NULL,
  `email` char(255) NOT NULL,
  `password` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `full_name`, `email`, `password`) VALUES
(1, 'Admin', 'admin@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id` int(11) NOT NULL,
  `title` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `title`) VALUES
(1, 'Chi Nhánh Hà Đô');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `full_name` char(255) NOT NULL,
  `birthday` char(255) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `school` char(255) NOT NULL,
  `cert` char(255) NOT NULL,
  `avatar` char(255) NOT NULL,
  `cv` char(255) NOT NULL,
  `email` char(255) NOT NULL,
  `password` char(255) NOT NULL,
  `status` char(255) NOT NULL,
  `job` int(11) DEFAULT NULL,
  `address` varchar(114) NOT NULL,
  `description` text NOT NULL,
  `phone` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `full_name`, `birthday`, `gender`, `school`, `cert`, `avatar`, `cv`, `email`, `password`, `status`, `job`, `address`, `description`, `phone`) VALUES
(6, 'Student 01', '2024-01-17', '0', 'FPT', 'Biểu mẫu 17 - Công khai chất lượng giảng dạy năm học 2020-2021.pdf', 'vps.png', 'Biểu mẫu 17 - Công khai chất lượng giảng dạy năm học 2020-2021.pdf', 'student@gmail.com', '123456', '0', NULL, '', '', 0),
(7, 'chu van bb', '2024-01-15', 'nam', 'sg', 'QuickNavigation+(3).pdf', '2.png', 'Six Principles of Behavior Management Page 1 - TTAC ODU.pdf', 'chuvana@gmail.com', '123456789', '0', NULL, 'ha npoi', 'fth', 362223232);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
