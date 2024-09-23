-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2024 at 10:54 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ln_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `job_general`
--

CREATE TABLE `job_general` (
  `id` int(100) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'ชื่อ-นามสกุล',
  `sex` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'เพศ',
  `pf` varchar(50) NOT NULL COMMENT 'คำนำหน้าชื่อ',
  `birthday` date NOT NULL COMMENT 'วัน/เดือน/ปีเกิด',
  `agg` varchar(90) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'อายุ',
  `nationality` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'สัญชาติ',
  `ethnicity` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'เชื้อชาติ',
  `religion` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'ศาสนา',
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'ที่อยู่',
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'เบอร์โทรศัพท์',
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'อีเมล์ผู้สมัคร',
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'รูปถ่าย',
  `edu` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'ระดับการศึกษา',
  `positions` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'ตำแหน่งที่ต้องการสมัคร',
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'สถานะ',
  `degree` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'ชื่อวุฒิการศึกษา',
  `nameedu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'ชื่อสถานะศึกษา',
  `ex` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'วันที่สำเร็จการศึกษา',
  `gpa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'คะแนนเฉลี่ยสะสม',
  `personal` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'คำนำหน้าชื่อ',
  `personal_firstname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'ชื่อ',
  `personal_surname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'นามสกุล',
  `personal_relation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'เกี่ยวข้างเป็น',
  `personal_tel` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'โทรศัพท์',
  `resume` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'ไฟล์วุฒิ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `job_general`
--

INSERT INTO `job_general` (`id`, `name`, `sex`, `pf`, `birthday`, `agg`, `nationality`, `ethnicity`, `religion`, `address`, `phone`, `email`, `image`, `edu`, `positions`, `status`, `degree`, `nameedu`, `ex`, `gpa`, `personal`, `personal_firstname`, `personal_surname`, `personal_relation`, `personal_tel`, `resume`) VALUES
(45, 'นายณัฐวัตร ทนันชัย', 'ชาย', 'นาย', '2024-07-04', '24', 'ไทย', 'ไทย', 'พุทธ', '163 หมู่ 2 ต.กังแอน อ.ปราสาท จ.สุรินทร์ 32140', '0630750064', 'aisfanta@gmail.com', 'image_669f6d440d1f9.png', 'ปริญญาตรี', 'โปรแกรมเมอร์', 'โสด', 'วิศวกรรมบัณฑิต', 'วิทยาลัยเทคโนโลยีราชมงคลอีสาน', '2024-07-31', '3.44', 'นาง', 'รจนา', 'คงสืบเสาะ', 'แฟน', '0804349774', 'resume_669f6d440d36c.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `job_general`
--
ALTER TABLE `job_general`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `job_general`
--
ALTER TABLE `job_general`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
