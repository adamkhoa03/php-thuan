-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2024 at 07:11 PM
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
  `title` char(255) NOT NULL,
  `address` varchar(112) NOT NULL,
  `subtitle` text NOT NULL,
  `logo` varchar(112) NOT NULL,
  `location` varchar(112) NOT NULL,
  `date` varchar(112) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `title`, `address`, `subtitle`, `logo`, `location`, `date`, `level`) VALUES
(1, 'Lập trình viên php', 'Chi Nhánh Hà Đô', 'Lương từ 15 đến 20 triệu', 'php', 'Full time', 'Ngày 1 tháng 3 năm 2023', 'Fresher'),
(2, 'Lập trình viên Laravel', 'Chi Nhánh Cầu giấy', 'Lương từ 20 đến 30 triệu', 'laravel', 'Part time', 'Ngày 1 tháng 2 năm 2023', 'Junior'),
(3, 'Lập trình viên Java', 'Chi Nhánh Hà Đô 2', 'Lương từ 15 đến 20 triệu', 'php', 'Full time', 'Ngày 1 tháng 3 năm 2023', 'Mid-level'),
(4, 'Lập trình viên Javascript', 'Chi Nhánh Cầu giấy', 'Lương từ 20 đến 30 triệu', 'laravel', 'Part time', 'Ngày 1 tháng 2 năm 2023', 'Senior'),
(5, 'Lập trình viên Back End', 'Chi Nhánh Hà Đô', 'Lương từ 15 đến 20 triệu', 'php', 'Full time', 'Ngày 1 tháng 3 năm 2023', 'Developer'),
(6, 'Quản lý dự án', 'Chi Nhánh Cầu giấy', 'Lương từ 20 đến 30 triệu', 'laravel', 'Part time', 'Ngày 1 tháng 2 năm 2023', 'Manager');

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
(6, 'Student 01', '2024-01-17', '0', 'FPT', 'Biểu mẫu 17 - Công khai chất lượng giảng dạy năm học 2020-2021.pdf', 'vps.png', 'Biểu mẫu 17 - Công khai chất lượng giảng dạy năm học 2020-2021.pdf', 'student@gmail.com', '123456', '1', NULL, '', '', 0),
(7, 'chu van bb', '2024-01-15', 'nam', 'sg', 'QuickNavigation+(3).pdf', '2.png', 'Six Principles of Behavior Management Page 1 - TTAC ODU.pdf', 'chuvana@gmail.com', '1', '1', 1, 'ha npoi', 'fth', 362223232);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoannguoiungtuyen`
--

CREATE TABLE `taikhoannguoiungtuyen` (
  `id` int(11) NOT NULL,
  `taikhoan` varchar(100) NOT NULL,
  `matkhau` varchar(100) NOT NULL,
  `trangthai` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `taikhoannguoiungtuyen`
--

INSERT INTO `taikhoannguoiungtuyen` (`id`, `taikhoan`, `matkhau`, `trangthai`) VALUES
(3, 'user', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `thongtinrieng`
--

CREATE TABLE `thongtinrieng` (
  `id` int(11) NOT NULL,
  `hoten` varchar(100) NOT NULL,
  `ngaysinh` date NOT NULL,
  `gioitinh` varchar(3) NOT NULL,
  `chuyennganh` varchar(200) NOT NULL,
  `chungchi` varchar(200) NOT NULL,
  `hoso` varchar(200) NOT NULL,
  `anhdaidien` varchar(200) NOT NULL,
  `trangthai` int(1) NOT NULL,
  `congviecdaungtuyen` int(11) NOT NULL,
  `diachi` text NOT NULL,
  `sodienthoai` varchar(11) NOT NULL,
  `thongtinthem` text NOT NULL,
  `idnguoidungtuyen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `thongtinrieng`
--

INSERT INTO `thongtinrieng` (`id`, `hoten`, `ngaysinh`, `gioitinh`, `chuyennganh`, `chungchi`, `hoso`, `anhdaidien`, `trangthai`, `congviecdaungtuyen`, `diachi`, `sodienthoai`, `thongtinthem`, `idnguoidungtuyen`) VALUES
(2, 'a', '2024-01-10', 'a', 'a', 'Six Principles of Behavior Management Page 1 - TTAC ODU.pdf', 'QuickNavigation+(3).pdf', '1.png', 1, 0, 'a', '111', 'a', 3);

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
-- Indexes for table `taikhoannguoiungtuyen`
--
ALTER TABLE `taikhoannguoiungtuyen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thongtinrieng`
--
ALTER TABLE `thongtinrieng`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `taikhoannguoiungtuyen`
--
ALTER TABLE `taikhoannguoiungtuyen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `thongtinrieng`
--
ALTER TABLE `thongtinrieng`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
