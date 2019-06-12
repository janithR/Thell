-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2019 at 08:10 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `newthell`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE IF NOT EXISTS `administrator` (
  `admin_id` int(5) NOT NULL,
  `username` varchar(29) NOT NULL,
  `password` varchar(20) NOT NULL DEFAULT '12345',
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`admin_id`, `username`, `password`, `email`) VALUES
(1, 'admin113', '12345', 'admin1@gmail.com'),
(2, 'admin2', '12345', 'admin2@gmail.com'),
(3, 'admin3', '12345', 'admin3@gmail.com'),
(5, 'lahiru', '12345', 'l@gmail.com'),
(6, 'admin67', 'admin67', 'admin67@gmail.com'),
(7, 'agha', 'admin67', 'admin67f@.co');

-- --------------------------------------------------------

--
-- Table structure for table `bmanager`
--

CREATE TABLE IF NOT EXISTS `bmanager` (
  `bm_id` int(10) NOT NULL,
  `bm_name` varchar(255) NOT NULL,
  `nic` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `branch_id` int(12) NOT NULL,
  `username` varchar(25) NOT NULL,
  `tel` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bmanager`
--

INSERT INTO `bmanager` (`bm_id`, `bm_name`, `nic`, `address`, `email`, `password`, `branch_id`, `username`, `tel`) VALUES
(2, 'sumudu dileepa', '933434907V', 'No 30, Galle Road, Dehiwala', 'sumudu@gmail.com', 'sumudu@gmail.com', 2, 'sumudu1', '0777953995'),
(4, 'Janith Rumalka', '953041734v', '20/40, Rawathawatta Rd, Rawathawatta, Moratuwa', 'janith@gmail.com', 'janith@gmail.com', 1, 'janith', '0755235552');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE IF NOT EXISTS `branch` (
  `b_id` int(20) NOT NULL,
  `b_name` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `location` varchar(500) NOT NULL,
  `incharge` varchar(50) NOT NULL,
  `petrol_92` varchar(10) NOT NULL,
  `petrol_95` varchar(10) NOT NULL,
  `auto_diesel` varchar(10) NOT NULL,
  `super_diesel` varchar(10) NOT NULL,
  `kerosene` varchar(10) NOT NULL,
  `industrial_kerosene` varchar(10) NOT NULL,
  `furance_800` varchar(10) NOT NULL,
  `furance_1500` varchar(10) NOT NULL,
  `furance_3500` varchar(10) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `service` varchar(25) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`b_id`, `b_name`, `address`, `location`, `incharge`, `petrol_92`, `petrol_95`, `auto_diesel`, `super_diesel`, `kerosene`, `industrial_kerosene`, `furance_800`, `furance_1500`, `furance_3500`, `tel`, `service`, `image`) VALUES
(1, 'Colombo', '24, Baseline, Colombo', 'https://maps.google.com/maps?q=laugh gas dehiwala&t=&z=13&ie=UTF8&iwloc=&output=embed', 'Janith Rumalka', 'yes', 'no', 'yes', 'yes', 'yes', 'no', 'no', 'yes', 'no', '0112567534', '8 am - 9 pm', '01.jpg'),
(2, 'Moratuwa ', '42/21A, galle road, Rathmalana', 'https://maps.google.com/maps?q=laugh gas battaramulla&t=&z=13&ie=UTF8&iwloc=&output=embed', 'Sumudu Dileepa', 'yes', 'no', 'yes', 'no', 'no', 'no', 'yes', 'no', 'no', '0115258774', '8 a.m - 10 p.m', '02.jpg'),
(3, 'koswattta', '27,1 A koswatta', 'https://maps.google.com/maps?q=kottawa%20gas%20satation&t=&z=13&ie=UTF8&iwloc=&output=embed', 'himaruk silva', 'yes', 'no', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', 'yes', '0113478980', '24 hours', 'infa_Deh_fill_02.jpg'),
(4, 'katubedda', 'moratuwa', 'https://maps.google.com/maps?q=kottawa%20gas%20satation&t=&z=13&ie=UTF8&iwloc=&output=embed', 'thasun damiru', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'no', 'yes', 'yes', '0777952224', '24 hours', 'wattala.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `emp_id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `nic` varchar(20) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `branch_id` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `name`, `nic`, `tel`, `address`, `branch_id`) VALUES
(1, 'Dian Jayasooriya', '955458201V', '0752362254', '20, katubedda moratuwa', '1'),
(7, 'Sahan Madusanka', '953041731V', '0983736363', '52, Angoda Road, Angoda', '1'),
(8, 'svdfvdfb', '747447545v', '1444125114', 'egebb', '1'),
(10, 'dianJ', '923041731V', '0115680854', 'nugegoda', '3'),
(11, 'janith', '953021573V', '0753456789', 'sdads', '3'),
(12, 'Lahiru', '943194165V', '0725547478', 'Rat', '2'),
(13, 'kjhgfew', '123456789V', '5874563214', 'ytu', '1'),
(14, 'Wadura', '954785632V', '9875645289', 'Jaf', '8'),
(15, 'Pathum', '564125632V', '9087656789', 'Jakyu', '2'),
(17, 'janir', '993041731V', '0115680855', 'jkhjkhkjhjk', '1'),
(18, 'janith', '953041756V', '0998765456', 'moratuwa', '1');

-- --------------------------------------------------------

--
-- Table structure for table `fuel`
--

CREATE TABLE IF NOT EXISTS `fuel` (
  `fuel_id` int(10) NOT NULL,
  `fuel_type` varchar(50) NOT NULL,
  `unit_price` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fuel`
--

INSERT INTO `fuel` (`fuel_id`, `fuel_type`, `unit_price`) VALUES
(1, 'Petrol 95 Octane', '148'),
(5, 'Auto Diesel', '120'),
(6, 'Super Diesel 4 Star', '129'),
(7, 'Kerosene', '101'),
(8, 'Industrial Kerosene', '110'),
(9, 'Furnace Oil 800', '80'),
(10, 'Furnace Oil 1500', '80'),
(11, 'Furnace Oil 3500', '80');

-- --------------------------------------------------------

--
-- Table structure for table `fuel_request`
--

CREATE TABLE IF NOT EXISTS `fuel_request` (
  `request_id` int(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `branch_id` int(10) NOT NULL,
  `req_date` date NOT NULL,
  `branch_name` varchar(50) NOT NULL,
  `branch_manager` varchar(100) NOT NULL,
  `branch_location` varchar(200) NOT NULL,
  `tel` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `supplier_name` varchar(50) NOT NULL,
  `fuel_type` varchar(20) NOT NULL,
  `unit_price` int(20) NOT NULL,
  `volume` int(50) NOT NULL,
  `total_price` int(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fuel_request`
--

INSERT INTO `fuel_request` (`request_id`, `status`, `branch_id`, `req_date`, `branch_name`, `branch_manager`, `branch_location`, `tel`, `email`, `supplier_name`, `fuel_type`, `unit_price`, `volume`, `total_price`) VALUES
(9, 'pending', 0, '0000-00-00', 'Colombo', 'Janith Rumalka', 'https://www.google.com/maps/place/Ceypetco+Filling+Station/@6.9463283,79.861147,17z/data=!3m1!4b1!4m5!3m4!1s0x3ae258fb5526660d:0xa879c38ae21be0bb!8m2!3d6.9463283!4d79.8633357', 112567534, 'janith@gmail.com', 'Lanaka IOC', 'Petrol 92 Octane', 100, 25000, 2500000),
(16, '', 0, '0000-00-00', 'Moratuwa ', 'sumudu dileepa', 'https://www.google.com/maps/place/Ceypetco/@6.8190146,79.8719552,17z/data=!3m1!4b1!4m5!3m4!1s0x3ae25b2a06c9dd33:0xf60dd6e99ce5fa1a!8m2!3d6.8190146!4d79.8741439', 115258774, 'sumudu@gmail.com', 'CEYPETCO', 'Super Diesel 4 Star', 78, 200, 15600),
(17, '', 0, '2018-07-12', '0', 'sumudu dileepa', 'https://www.google.com/maps/place/Ceypetco/@6.8190146,79.8719552,17z/data=!3m1!4b1!4m5!3m4!1s0x3ae25b2a06c9dd33:0xf60dd6e99ce5fa1a!8m2!3d6.8190146!4d79.8741439', 115258774, 'sumudu@gmail.com', 'CEYPETCO', 'Furnace Oil 3500', 123, 10000, 1230000),
(18, '', 0, '2018-07-12', 'Moratuwa ', 'sumudu dileepa', 'https://www.google.com/maps/place/Ceypetco/@6.8190146,79.8719552,17z/data=!3m1!4b1!4m5!3m4!1s0x3ae25b2a06c9dd33:0xf60dd6e99ce5fa1a!8m2!3d6.8190146!4d79.8741439', 115258774, 'sumudu@gmail.com', 'CEYPETCO', 'Furnace Oil 800', 36, 190, 6840),
(19, '', 0, '2018-08-13', 'Moratuwa ', 'sumudu dileepa', 'https://www.google.com/maps/place/Ceypetco/@6.8190146,79.8719552,17z/data=!3m1!4b1!4m5!3m4!1s0x3ae25b2a06c9dd33:0xf60dd6e99ce5fa1a!8m2!3d6.8190146!4d79.8741439', 115258774, 'sumudu@gmail.com', 'CEYPETCO', 'Petrol 95 Octane', 0, 0, 0),
(20, '', 0, '2018-08-18', 'Moratuwa ', 'sumudu dileepa', 'https://maps.google.com/maps?q=laugh gas battaramulla&t=&z=13&ie=UTF8&iwloc=&output=embed', 115258774, 'sumudu@gmail.com', 'Lanka IOC', 'Kerosene', 1000, 89, 89000),
(21, '', 0, '2018-08-19', 'Moratuwa ', 'sumudu dileepa', 'https://maps.google.com/maps?q=laugh gas battaramulla&t=&z=13&ie=UTF8&iwloc=&output=embed', 115258774, 'sumudu@gmail.com', 'CEYPETCO', 'Petrol 95 Octane', 989, 90000000, 2147483647),
(22, '', 0, '2018-08-19', 'Moratuwa ', 'sumudu dileepa', 'https://maps.google.com/maps?q=laugh gas battaramulla&t=&z=13&ie=UTF8&iwloc=&output=embed', 115258774, 'sumudu@gmail.com', 'CEYPETCO', 'Petrol 95 Octane', 2147483647, 11, 2147483647),
(24, '', 2, '2018-08-19', 'Moratuwa ', 'sumudu dileepa', 'https://maps.google.com/maps?q=laugh gas battaramulla&t=&z=13&ie=UTF8&iwloc=&output=embed', 115258774, 'sumudu@gmail.com', 'Lanka IOC', 'Petrol 95 Octane', 79, 1000, 79000),
(25, '', 2, '2018-08-19', 'Moratuwa ', 'sumudu dileepa', 'https://maps.google.com/maps?q=laugh gas battaramulla&t=&z=13&ie=UTF8&iwloc=&output=embed', 115258774, 'sumudu@gmail.com', 'CEYPETCO', 'Industrial Kerosene', 76, 1200, 91200),
(26, '', 2, '2018-08-22', 'Moratuwa ', 'sumudu dileepa', 'https://maps.google.com/maps?q=laugh gas battaramulla&t=&z=13&ie=UTF8&iwloc=&output=embed', 115258774, 'sumudu@gmail.com', 'CEYPETCO', 'Kerosene', 101, 78, 7878),
(27, 'confirmed', 2, '2018-08-22', 'Moratuwa ', 'sumudu dileepa', 'https://maps.google.com/maps?q=laugh gas battaramulla&t=&z=13&ie=UTF8&iwloc=&output=embed', 115258774, 'sumudu@gmail.com', 'Lanka IOC', 'Industrial Kerosene', 110, 1000, 110000),
(28, 'confirmed', 2, '2018-08-22', 'Moratuwa ', 'sumudu dileepa', 'https://maps.google.com/maps?q=laugh gas battaramulla&t=&z=13&ie=UTF8&iwloc=&output=embed', 115258774, 'sumudu@gmail.com', 'CEYPETCO', 'Furnace Oil 800', 80, 1000, 80000),
(29, 'confirmed', 2, '2018-08-22', 'Moratuwa ', 'sumudu dileepa', 'https://maps.google.com/maps?q=laugh gas battaramulla&t=&z=13&ie=UTF8&iwloc=&output=embed', 115258774, 'sumudu@gmail.com', 'CEYPETCO', 'Kerosene', 101, 1900, 191900),
(30, 'rejected', 2, '2018-08-23', 'Moratuwa ', 'sumudu dileepa', 'https://maps.google.com/maps?q=laugh gas battaramulla&t=&z=13&ie=UTF8&iwloc=&output=embed', 115258774, 'sumudu@gmail.com', 'Lanka IOC', 'Super Diesel 4 Star', 129, 10000, 1290000),
(31, 'confirmed', 2, '2018-08-23', 'Moratuwa ', 'sumudu dileepa', 'https://maps.google.com/maps?q=laugh gas battaramulla&t=&z=13&ie=UTF8&iwloc=&output=embed', 115258774, 'sumudu@gmail.com', 'Lanka IOC', 'Kerosene', 101, 1000, 101000),
(32, 'confirmed', 2, '2018-08-23', 'Moratuwa ', 'sumudu dileepa', 'https://maps.google.com/maps?q=laugh gas battaramulla&t=&z=13&ie=UTF8&iwloc=&output=embed', 115258774, 'sumudu@gmail.com', 'CEYPETCO', 'Furnace Oil 3500', 80, 1877, 150160),
(33, 'confirmed', 2, '2018-08-23', 'Moratuwa ', 'sumudu dileepa', 'https://maps.google.com/maps?q=laugh gas battaramulla&t=&z=13&ie=UTF8&iwloc=&output=embed', 115258774, 'sumudu@gmail.com', 'Lanka IOC', 'Furnace Oil 800', 80, 122, 9760),
(34, 'confirmed', 2, '2018-08-23', 'Moratuwa ', 'sumudu dileepa', 'https://maps.google.com/maps?q=laugh gas battaramulla&t=&z=13&ie=UTF8&iwloc=&output=embed', 115258774, 'sumudu@gmail.com', 'CEYPETCO', 'Kerosene', 101, 1200, 121200),
(35, 'confirmed', 2, '2018-08-23', 'Moratuwa ', 'sumudu dileepa', 'https://maps.google.com/maps?q=laugh gas battaramulla&t=&z=13&ie=UTF8&iwloc=&output=embed', 115258774, 'sumudu@gmail.com', 'CEYPETCO', 'Auto Diesel', 120, 10000, 1200000),
(36, 'confirmed', 2, '2018-08-23', 'Moratuwa ', 'sumudu dileepa', 'https://maps.google.com/maps?q=laugh gas battaramulla&t=&z=13&ie=UTF8&iwloc=&output=embed', 115258774, 'sumudu@gmail.com', 'CEYPETCO', 'Industrial Kerosene', 110, 125, 13750);

-- --------------------------------------------------------

--
-- Table structure for table `height`
--

CREATE TABLE IF NOT EXISTS `height` (
  `idHeight` int(11) NOT NULL,
  `record_date` varchar(255) NOT NULL,
  `record_time` varchar(255) NOT NULL,
  `height` double NOT NULL,
  `idTank` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `height`
--

INSERT INTO `height` (`idHeight`, `record_date`, `record_time`, `height`, `idTank`) VALUES
(1, '2018-08-23', '12:11:00', 1030, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kk`
--

CREATE TABLE IF NOT EXISTS `kk` (
  `kkid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `recording`
--

CREATE TABLE IF NOT EXISTS `recording` (
  `idRecording` int(11) NOT NULL,
  `record_date` varchar(255) NOT NULL,
  `record_time` varchar(255) NOT NULL,
  `volume` double NOT NULL,
  `idTank` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recording`
--

INSERT INTO `recording` (`idRecording`, `record_date`, `record_time`, `volume`, `idTank`) VALUES
(1, '2018', '01.04.37', 18, 1),
(2, '2018', '01.47.78', 18, 1),
(3, '2018-08-22', '00:21:47', 24, 1),
(4, '2018-08-22', '00:21:47', 24, 1),
(5, '2018-08-22', '00:21:47', 24, 1),
(6, '2018-08-22', '00:21:47', 24, 1),
(7, '2018-08-22', '00:21:47', 24, 1),
(8, '2018-08-22', '00:21:47', 24, 1),
(9, '2018-08-22', '00:21:47', 24, 1),
(10, '2018-08-22', '00:21:47', 24, 1),
(11, '2018-08-22', '00:21:47', 24, 1),
(12, '2018-08-22', '00:21:47', 24, 1),
(13, '2018-08-22', '00:21:47', 24, 1),
(14, '2018-08-22', '00:21:47', 24, 1),
(15, '2018-08-22', '00:21:47', 24, 1),
(16, '2018-08-22', '00:21:47', 976, 1),
(17, '2018-08-22', '00:21:47', 976, 1),
(18, '2018-08-22', '00:21:47', 976, 1),
(19, '2018-08-22', '00:21:47', 976, 1),
(20, '2018-08-22', '00:21:47', 976, 1),
(21, '2018-08-22', '00:21:47', 976, 1),
(22, '2018-08-22', '00:21:47', 976, 1),
(23, '2018-08-22', '00:21:47', 976, 1),
(24, '2018-08-22', '00:21:47', 976, 1),
(25, '2018-08-22', '00:21:47', 976, 1),
(26, '2018-08-22', '00:21:47', 976, 1),
(27, '2018-08-22', '11:51:07', 1000, 1),
(28, '2018-08-22', '11:51:22', 1000, 1),
(29, '2018-08-22', '11:51:37', 1000, 1),
(30, '2018-08-22', '11:54:38', 1000, 1),
(31, '2018-08-22', '12:16:02', 943, 1),
(32, '2018-08-22', '12:16:20', 984, 1),
(33, '2018-08-22', '12:16:34', 991, 1),
(34, '2018-08-22', '12:17:04', 994, 1),
(35, '2018-08-22', '12:17:13', 772, 1),
(36, '2018-08-22', '12:17:54', 995, 1),
(37, '2018-08-22', '12:18:07', 984, 1),
(38, '2018-08-22', '12:18:14', 972, 1),
(39, '2018-08-22', '12:18:20', 966, 1),
(40, '2018-08-22', '12:18:34', 780, 1),
(41, '2018-08-22', '12:18:43', 996, 1),
(42, '2018-08-22', '12:18:50', 983, 1),
(43, '2018-08-22', '12:23:45', 982, 1),
(44, '2018-08-22', '12:25:29', 734, 1),
(45, '2018-08-22', '12:26:45', 991, 1),
(46, '2018-08-22', '12:27:03', 773, 1),
(47, '2018-08-22', '12:47:16', 770, 1),
(48, '2018-08-22', '12:47:28', 989, 1),
(49, '2018-08-22', '12:47:32', 989, 1),
(50, '2018-08-22', '12:47:39', 781, 1),
(51, '2018-08-22', '12:54:52', 964, 1),
(52, '2018-08-22', '13:52:36', 995, 1),
(53, '2018-08-22', '13:53:33', 994, 1),
(54, '2018-08-22', '13:55:28', 994, 1),
(55, '2018-08-22', '14:04:48', 641, 1),
(56, '2018-08-22', '14:10:17', 994, 1),
(57, '2018-08-22', '14:11:20', 994, 1),
(58, '2018-08-22', '14:14:20', 994, 1),
(59, '2018-08-22', '14:18:25', 993, 1),
(60, '2018-08-22', '14:18:47', 993, 1),
(61, '2018-08-22', '14:19:29', 993, 1),
(62, '2018-08-22', '14:19:29', 993, 1),
(63, '2018-08-22', '14:19:29', 993, 1),
(64, '2018-08-22', '14:19:29', 993, 1),
(65, '2018-08-22', '14:19:29', 993, 1),
(66, '2018-08-22', '14:19:29', 993, 1),
(67, '2018-08-22', '14:19:29', 993, 1),
(68, '2018-08-22', '14:19:29', 993, 1),
(69, '2018-08-22', '14:19:29', 993, 1),
(70, '2018-08-22', '14:19:29', 993, 1),
(71, '2018-08-22', '14:19:29', 993, 1),
(72, '2018-08-22', '14:19:29', 993, 1),
(73, '2018-08-22', '14:19:29', 993, 1),
(74, '2018-08-22', '14:19:29', 993, 1),
(75, '2018-08-22', '14:19:29', 993, 1),
(76, '2018-08-23', '06:26:02', 844, 1),
(77, '2018-08-23', '06:30:47', 867, 1),
(78, '2018-08-23', '06:30:57', 993, 1),
(79, '2018-08-23', '06:31:11', 864, 1),
(80, '2018-08-23', '06:31:24', 867, 1),
(81, '2018-08-23', '06:33:11', 832, 1),
(82, '2018-08-23', '06:36:01', 996, 1),
(83, '2018-08-23', '06:36:22', 836, 1),
(84, '2018-08-23', '06:38:03', 870, 1),
(85, '2018-08-23', '06:38:39', 868, 1),
(86, '2018-08-23', '09:19:04', 993, 1),
(87, '2018-08-23', '09:19:47', 817, 1),
(88, '2018-08-23', '09:23:08', 993, 1),
(89, '2018-08-23', '09:24:00', 980, 1),
(90, '2018-08-23', '10:31:39', 946, 1),
(91, '2018-08-23', '10:33:04', 996, 1),
(92, '2018-08-23', '10:33:24', 974, 1),
(93, '2018-08-23', '10:42:04', 920, 1),
(94, '2018-08-23', '10:42:07', 920, 1),
(95, '2018-08-23', '10:43:21', 909, 1),
(96, '2018-08-23', '10:43:49', 945, 1),
(97, '2018-08-23', '10:44:03', 883, 1),
(98, '2018-08-23', '10:44:13', 941, 1),
(99, '2018-08-23', '10:44:13', 941, 1),
(100, '2018-08-23', '10:44:22', 938, 1),
(101, '2018-08-23', '12:01:37', 923, 1),
(102, '2018-08-23', '12:05:06', 994, 1),
(103, '2018-08-23', '12:05:20', 977, 1),
(104, '2018-08-23', '12:06:06', 925, 1),
(105, '2018-08-23', '12:11:00', -30, 1);

-- --------------------------------------------------------

--
-- Table structure for table `stock_count`
--

CREATE TABLE IF NOT EXISTS `stock_count` (
  `stock_id` int(10) NOT NULL,
  `fuel_id` int(10) NOT NULL,
  `fuel_type` varchar(20) NOT NULL,
  `height` int(20) NOT NULL,
  `volume` int(20) NOT NULL,
  `date` date NOT NULL,
  `time` time(3) NOT NULL,
  `branch_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(40) NOT NULL,
  `reg_no` varchar(12) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(23) NOT NULL,
  `password` varchar(30) NOT NULL,
  `username` varchar(10) NOT NULL,
  `tel` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`s_id`, `s_name`, `reg_no`, `address`, `email`, `password`, `username`, `tel`) VALUES
(1, 'CEYPETCO', '4001', 'colombo 10', 'ceypetco@gmail.com', 'ceypetco@gmail.com', 'CEYPETCO', '0112567534'),
(2, 'Lanka IOC', '4002', 'colombo 7', 'ioc@gmail.com', 'ioc@gmail.com', 'IOC', '0116789634');

-- --------------------------------------------------------

--
-- Table structure for table `tank`
--

CREATE TABLE IF NOT EXISTS `tank` (
  `idTank` int(11) NOT NULL,
  `tankName` varchar(255) NOT NULL,
  `b_id` int(11) NOT NULL,
  `fuel_id` int(11) NOT NULL,
  `maxHeight` double NOT NULL,
  `maxVolume` double NOT NULL,
  `availability` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tank`
--

INSERT INTO `tank` (`idTank`, `tankName`, `b_id`, `fuel_id`, `maxHeight`, `maxVolume`, `availability`) VALUES
(1, 'Tank A', 1, 1, 1000, 1000, 1),
(2, 'Tank B', 1, 2, 200, 400, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `bmanager`
--
ALTER TABLE `bmanager`
  ADD PRIMARY KEY (`bm_id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `fuel`
--
ALTER TABLE `fuel`
  ADD PRIMARY KEY (`fuel_id`);

--
-- Indexes for table `fuel_request`
--
ALTER TABLE `fuel_request`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `height`
--
ALTER TABLE `height`
  ADD PRIMARY KEY (`idHeight`);

--
-- Indexes for table `kk`
--
ALTER TABLE `kk`
  ADD PRIMARY KEY (`kkid`);

--
-- Indexes for table `recording`
--
ALTER TABLE `recording`
  ADD PRIMARY KEY (`idRecording`);

--
-- Indexes for table `stock_count`
--
ALTER TABLE `stock_count`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`s_id`), ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tank`
--
ALTER TABLE `tank`
  ADD PRIMARY KEY (`idTank`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `admin_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `bmanager`
--
ALTER TABLE `bmanager`
  MODIFY `bm_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `b_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `fuel`
--
ALTER TABLE `fuel`
  MODIFY `fuel_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `fuel_request`
--
ALTER TABLE `fuel_request`
  MODIFY `request_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `height`
--
ALTER TABLE `height`
  MODIFY `idHeight` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kk`
--
ALTER TABLE `kk`
  MODIFY `kkid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `recording`
--
ALTER TABLE `recording`
  MODIFY `idRecording` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=106;
--
-- AUTO_INCREMENT for table `stock_count`
--
ALTER TABLE `stock_count`
  MODIFY `stock_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tank`
--
ALTER TABLE `tank`
  MODIFY `idTank` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
