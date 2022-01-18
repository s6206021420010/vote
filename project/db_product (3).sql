-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2021 at 05:21 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_product`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(100) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_lastname` varchar(100) NOT NULL,
  `admin_idcode` varchar(13) NOT NULL,
  `admin_image` varchar(100) NOT NULL,
  `admin_phone` varchar(100) NOT NULL,
  `admin_user` varchar(50) NOT NULL,
  `admin_pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `applicant`
--

CREATE TABLE `applicant` (
  `applicant_id` int(11) NOT NULL,
  `applicant_name` varchar(50) NOT NULL,
  `applicant_number` int(20) NOT NULL,
  `applicant_image` varchar(50) NOT NULL,
  `event_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicant`
--

INSERT INTO `applicant` (`applicant_id`, `applicant_name`, `applicant_number`, `applicant_image`, `event_id`) VALUES
(11, 'สุทัส', 8, '1625519342.jpg', '63'),
(12, 'ประไพร', 4, '1619209933.png', '63'),
(13, 'สุทัส', 8, '79.png', '63'),
(14, 'จำโบ้', 12, '1625519342.jpg', '63'),
(15, 'Alex', 0, '1626548291.png', '63'),
(16, 'บาส', 1, '226435971_249462350347477_5362451740290194708_n.jp', '68'),
(17, 'uraga', 12, 'carbon.jpg', '63'),
(18, 'สุทัสss', 3, 'old-books-436498_1920.jpg', '63'),
(19, 'เก้าอี้', 1, '1627653981.jpg', '73'),
(20, 'ไม้เชอร่า', 1, '1625517275.jpg', '81'),
(21, 'ไม้พยุง', 2, '', '81');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `organization_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`, `organization_id`) VALUES
(1, 'techno', 1),
(2, 'engineering', 1),
(3, 'Industrial Education\r\nscience', 1),
(301, 'บุคคล', 3);

-- --------------------------------------------------------

--
-- Table structure for table `department2`
--

CREATE TABLE `department2` (
  `department2_id` int(11) NOT NULL,
  `department2_name` varchar(100) NOT NULL,
  `department_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department2`
--

INSERT INTO `department2` (`department2_id`, `department2_name`, `department_id`) VALUES
(2, 'iti', 1),
(4, 'im', 1),
(5, 'imt', 3),
(3001, 'กลุ่มเลขา', 301);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `event_detail` varchar(100) NOT NULL,
  `date_time` datetime NOT NULL,
  `image` varchar(100) NOT NULL,
  `status_event` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `event_name`, `event_detail`, `date_time`, `image`, `status_event`, `user_id`, `event_type`) VALUES
(63, 'นักเรียน', 'หัวหน้าห้อง', '2021-07-24 00:00:00', '1625519549.jpg', 'Private', 0, ''),
(67, 'สโมสร', 'คณะเทคโน', '2021-07-25 00:00:00', '1627216801.png', 'Public', 0, ''),
(68, 'รองหัวหน้าห้อง', 'โหวตรองหัวหน้าห้อง', '2021-07-17 00:00:00', '1627480369.jpg', 'Private', 0, ''),
(73, 'ไกดไำด', 'ไำดไ', '2021-08-07 00:00:00', '1629232437.jpg', 'Public', 874, ''),
(75, 'พันธ์หมา', 'ชนิดสุนัก', '2021-09-01 00:00:00', '1629564431.png', 'Private', 874, ''),
(79, 'studen', 'new', '2021-09-11 00:00:00', '1629570539.png', 'Private', 893, ''),
(80, 'teacher', 'newtech', '2021-08-20 00:00:00', '1629570583.jpg', 'Private', 893, ''),
(81, 'wood', 'moo', '2021-08-27 00:00:00', '1629573534.jpg', 'Public', 893, '');

-- --------------------------------------------------------

--
-- Table structure for table `event_list`
--

CREATE TABLE `event_list` (
  `list_id` int(11) NOT NULL,
  `list_detel` varchar(50) NOT NULL,
  `event_id` int(10) NOT NULL,
  `list_img` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_list`
--

INSERT INTO `event_list` (`list_id`, `list_detel`, `event_id`, `list_img`) VALUES
(1, 'กษาป สมปอง', 62, ''),
(2, 'บักบีม เกษศสมบูร', 63, ''),
(15, 'บักเงาะ', 63, ''),
(16, 'บักเง็ก', 63, ''),
(17, 'สมดูก', 63, ''),
(18, 'บัวลอย', 63, ''),
(19, 'สุทัส', 63, ''),
(20, 'สุทัส', 63, ''),
(21, 'สุทัส', 63, ''),
(22, 'ยำๆ', 63, ''),
(23, 'ลงลง', 0, ''),
(24, 'กกกกกกก', 63, ''),
(25, 'มอๆ', 63, ''),
(26, 'สุทัส', 67, '');

-- --------------------------------------------------------

--
-- Table structure for table `event_private`
--

CREATE TABLE `event_private` (
  `private_id` int(11) NOT NULL,
  `private_name` varchar(50) NOT NULL,
  `private_detail` varchar(100) NOT NULL,
  `private_img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `organization_id` int(11) NOT NULL,
  `organization_name` varchar(100) NOT NULL,
  `department_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`organization_id`, `organization_name`, `department_id`) VALUES
(1, 'kmutnb', 1),
(2, 'kmuit', 2),
(3, 'การไฟฟ้า', 301);

-- --------------------------------------------------------

--
-- Table structure for table `point`
--

CREATE TABLE `point` (
  `point_id` int(11) NOT NULL,
  `event_id` varchar(50) NOT NULL,
  `applicant_id` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `point_all` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `id_card` varchar(100) NOT NULL,
  `number` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_pass` varchar(100) NOT NULL,
  `organization_id` text NOT NULL,
  `department_id` int(11) NOT NULL,
  `department2_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `id_card`, `number`, `image`, `user_name`, `user_pass`, `organization_id`, `department_id`, `department2_id`, `status`) VALUES
(874, 'สุนิสา วงพรม', '1788888859', '095225488', '1629220238.jpg', 'b123', '123', '2', 0, 0, ''),
(893, 'บุณฑริก', '1729900405554', '0927604466', '1629383244.jpg', 'r123', '123', '1', 0, 0, ''),
(930, 'noob', '1988888887', '0266666666', '1629673387.jpg', 'd123', '123', '1', 1, 5, ''),
(931, 'ธนาธร กิจกรรม', '17299888856', '0986588895', '1629674534.jpg', 'e123', '123', '1', 1, 5, ''),
(932, 'น้ำใส', '1361000306386', '0957165342', '1629731685.jpg', 'n123', '123', '3', 301, 3001, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `applicant`
--
ALTER TABLE `applicant`
  ADD PRIMARY KEY (`applicant_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `department2`
--
ALTER TABLE `department2`
  ADD PRIMARY KEY (`department2_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `event_list`
--
ALTER TABLE `event_list`
  ADD PRIMARY KEY (`list_id`);

--
-- Indexes for table `event_private`
--
ALTER TABLE `event_private`
  ADD PRIMARY KEY (`private_id`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`organization_id`);

--
-- Indexes for table `point`
--
ALTER TABLE `point`
  ADD PRIMARY KEY (`point_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `applicant`
--
ALTER TABLE `applicant`
  MODIFY `applicant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=302;

--
-- AUTO_INCREMENT for table `department2`
--
ALTER TABLE `department2`
  MODIFY `department2_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3002;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `event_list`
--
ALTER TABLE `event_list`
  MODIFY `list_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `event_private`
--
ALTER TABLE `event_private`
  MODIFY `private_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `organization_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `point`
--
ALTER TABLE `point`
  MODIFY `point_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=933;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
