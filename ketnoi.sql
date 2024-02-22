-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 22, 2024 lúc 07:09 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ketnoi`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `taikhoan` varchar(35) NOT NULL,
  `matkhau` varchar(100) NOT NULL,
  `hoten` varchar(40) NOT NULL,
  `level` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `taikhoan`, `matkhau`, `hoten`, `level`) VALUES
(1, 'ddchang', '9ae6e159c8c7f434c49a63082b9cff23', 'Đào Đức Cháng', 0),
(2, 'changddc', '9ae6e159c8c7f434c49a63082b9cff23', 'Đào Đức Cháng', 0),
(21, 'hoangmn', '9ae6e159c8c7f434c49a63082b9cff23', 'Nguyễn Minh Hoàng', 1),
(24, 'hieucx', 'e08ef9333ba75f364661aa04f24109c3', 'Cao Xuân Hiếu', 1),
(25, 'admin', '123', 'Đào Đức Cháng', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `congviec`
--

CREATE TABLE `congviec` (
  `id` int(11) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `addressn` varchar(200) DEFAULT NULL,
  `subtitle` text DEFAULT NULL,
  `logo` blob DEFAULT NULL,
  `location` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `date` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `id_level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `congviec`
--

INSERT INTO `congviec` (`id`, `title`, `addressn`, `subtitle`, `logo`, `location`, `date`, `id_level`) VALUES
(1, 'Lập trình viên php', 'Chi Nhánh Hà Đô', 'Lương từ 15 đến 20 triệu', NULL, 'Full time', 'Ngày 1 tháng 3 năm 2023', 1),
(2, 'Lập trình viên Laravel', 'Chi Nhánh Hà Đô', 'Lương từ 20 đến 30 triệu', NULL, 'Full time', 'Ngày 1 tháng 3 năm 2023', 1),
(3, 'Lập trình viên Java', 'Chi Nhánh Hà Đô', 'Lương từ 20 đến 25 triệu', NULL, 'Full time', 'Ngày 1 tháng 4 năm 2023', 2),
(4, 'Lập trình viên Javascript', 'Chi Nhánh Hà Đô', 'Lương từ 20 đến 25 triệu', NULL, 'Full time', 'Ngày 1 tháng 5 năm 2023', 3),
(5, 'Lập trình viên BackEnd', 'Chi Nhánh Hà Đô', 'Lương từ 25 đến 30 triệu', NULL, 'Full time', 'Ngày 1 tháng 6 năm 2023', 4),
(6, 'Lập trình viên DEVOPS', 'Chi Nhánh Hà Đô', 'Lương từ 30 đến 35 triệu', NULL, 'Full time', 'Ngày 1 tháng 7 năm 2023', 5),
(7, 'Quản lý dự án', 'Chi Nhánh Cầu giấy', 'Lương từ 35 đến 40 triệu', NULL, 'Full time', 'Ngày 1 tháng 9 năm 2023', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `doanhnghiep`
--

CREATE TABLE `doanhnghiep` (
  `id` int(11) NOT NULL,
  `tendn` varchar(100) NOT NULL,
  `daidiendn` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sodienthoai` int(10) NOT NULL,
  `diachi` varchar(250) NOT NULL,
  `thongtindn` longtext NOT NULL,
  `vitritd` longtext NOT NULL,
  `phucloi` longtext NOT NULL,
  `anhdn` char(255) NOT NULL,
  `id_mdexp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `name` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `level`
--

INSERT INTO `level` (`id`, `name`) VALUES
(1, 'FRESHER'),
(2, 'JUNIOR'),
(3, 'MID-LEVEL'),
(4, 'SENIOR'),
(5, 'DEVELOPER'),
(6, 'MANAGER');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `linhvuc`
--

CREATE TABLE `linhvuc` (
  `id` int(11) NOT NULL,
  `ten_lv` varchar(50) NOT NULL,
  `mota_lv` longtext NOT NULL,
  `anh_lv` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mucdoexp`
--

CREATE TABLE `mucdoexp` (
  `id` int(11) NOT NULL,
  `tenmd` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `mucdoexp`
--

INSERT INTO `mucdoexp` (`id`, `tenmd`) VALUES
(1, 'Fresher'),
(2, 'Junior'),
(3, 'Mid-level'),
(4, 'Senior'),
(5, 'Developer'),
(6, 'Manager');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(11) NOT NULL,
  `taikhoan` varchar(40) NOT NULL,
  `matkhau` varchar(100) NOT NULL,
  `ten` varchar(100) NOT NULL,
  `ngaydk` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `sdt` int(10) NOT NULL,
  `loai` int(1) NOT NULL,
  `trangthai` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `taikhoan`, `matkhau`, `ten`, `ngaydk`, `email`, `sdt`, `loai`, `trangthai`) VALUES
(9, 'ddchang', '9ae6e159c8c7f434c49a63082b9cff23', 'Cháng', '2024-01-31', 'changdd@gmail.com', 909090090, 1, 1),
(14, 'nguyenvana', '123', '', '0000-00-00', '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongtinrieng`
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
  `idnguoidungtuyen` int(11) NOT NULL,
  `kinhnghiem` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thongtinrieng`
--

INSERT INTO `thongtinrieng` (`id`, `hoten`, `ngaysinh`, `gioitinh`, `chuyennganh`, `chungchi`, `hoso`, `anhdaidien`, `trangthai`, `congviecdaungtuyen`, `diachi`, `sodienthoai`, `thongtinthem`, `idnguoidungtuyen`, `kinhnghiem`) VALUES
(2, 'a', '2024-01-10', 'a', 'a', 'Six Principles of Behavior Management Page 1 - TTAC ODU.pdf', 'QuickNavigation+(3).pdf', '1.png', 1, 0, 'a', '111', 'a', 3, ''),
(3, 'test 2', '2024-01-15', 'nam', 'IT', '', '', '', 0, 0, 'Ha noi', '00341212121', '', 4, 'Developer'),
(4, '', '0000-00-00', '', '', '', '', '', 0, 0, '', '', '', 14, ''),
(14, 'nguyen van a', '2024-01-31', 'nam', 'ăd', '', '', '', 1, 7, 'ha noi', '0362626262', '<p>anvcx</p>\r\n', 0, '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `congviec`
--
ALTER TABLE `congviec`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_level` (`id_level`);

--
-- Chỉ mục cho bảng `doanhnghiep`
--
ALTER TABLE `doanhnghiep`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_dn_md` (`id_mdexp`);

--
-- Chỉ mục cho bảng `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `linhvuc`
--
ALTER TABLE `linhvuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `mucdoexp`
--
ALTER TABLE `mucdoexp`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thongtinrieng`
--
ALTER TABLE `thongtinrieng`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `congviec`
--
ALTER TABLE `congviec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `doanhnghiep`
--
ALTER TABLE `doanhnghiep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `linhvuc`
--
ALTER TABLE `linhvuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `mucdoexp`
--
ALTER TABLE `mucdoexp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `thongtinrieng`
--
ALTER TABLE `thongtinrieng`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `congviec`
--
ALTER TABLE `congviec`
  ADD CONSTRAINT `congviec_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id`);

--
-- Các ràng buộc cho bảng `doanhnghiep`
--
ALTER TABLE `doanhnghiep`
  ADD CONSTRAINT `FK_dn_md` FOREIGN KEY (`id_mdexp`) REFERENCES `mucdoexp` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
