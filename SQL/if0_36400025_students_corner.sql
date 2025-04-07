-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql204.infinityfree.com
-- Generation Time: Apr 07, 2025 at 10:52 AM
-- Server version: 10.6.19-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+05:30";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_36400025_students_corner`
--
CREATE DATABASE IF NOT EXISTS `if0_36400025_students_corner` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `if0_36400025_students_corner`;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--
-- Creation: Aug 11, 2024 at 05:57 PM
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `password`) VALUES
(1, '1', '356a192b7913b04c54574d18c28d46e6395428ab'),
(2, 'c', '84a516841ba77a5b4648de2cd0dfcb30ea46dbb4'),
(3, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--
-- Creation: Aug 11, 2024 at 05:57 PM
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `pid`, `name`, `price`, `quantity`, `image`) VALUES
(93, 47, 2, 'drafter', 1000, 1, 'drafter-removebg-preview.png'),
(94, 59, 9, 'Engineering Physics-1', 599, 1, 'phy.jpg'),
(123, 3, 2, 'Engineering Physics', 799, 1, '1-Studentscorner-2024-Apr-19-Fri-0-03-29-phy1.jpg'),
(124, 3, 4, 'Basic Electrical Engineering ', 759, 2, '1-Studentscorner-2024-Apr-19-Fri-0-14-15-bee1.jpg'),
(127, 6, 2, 'Engineering Physics', 799, 1, '1-Studentscorner-2024-Apr-19-Fri-0-03-29-phy1.jpg'),
(128, 2, 13, 'Roll n Draw', 69, 1, '1-Studentscorner-2024-Apr-19-Fri-0-37-04-rnd1.jpeg'),
(167, 8, 15, 'Book', 79, 1, '1-Studentscorner-2024-Apr-27-Sat-7-30-11-bookn.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `lostnfound`
--
-- Creation: Aug 11, 2024 at 05:57 PM
--

DROP TABLE IF EXISTS `lostnfound`;
CREATE TABLE `lostnfound` (
  `id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(100) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `sold_by` varchar(1000) NOT NULL,
  `recieved_by` varchar(1000) NOT NULL,
  `details` varchar(500) NOT NULL,
  `image_01` varchar(1000) NOT NULL,
  `status` varchar(1000) NOT NULL,
  `time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lostnfound`
--

INSERT INTO `lostnfound` (`id`, `category`, `name`, `number`, `email`, `sold_by`, `recieved_by`, `details`, `image_01`, `status`, `time`) VALUES
(2, 'Sports', 'Bottle', '9764394818', 'tukaramshinde@gmail.com', 'Students Corner', '', 'Found near ground', '1Bottle1713467541lnf1.jpg', 'Not-Found', '19 April 2024, 12:42 am'),
(3, 'Electronics', 'Earbuds', '9764394818', 'tukaramshinde@gmail.com', 'Students Corner', '', 'Found in Library.', '1Earbuds1713467583lnf2.jpeg', 'Not-Found', '19 April 2024, 12:43 am'),
(4, 'Other', 'Keys', '9764394818', 'tukaramshinde@gmail.com', 'Students Corner', '', 'Found in F-302', '1Keys1713467642lnf3.jpeg', 'Not-Found', '19 April 2024, 12:44 am');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--
-- Creation: Aug 11, 2024 at 05:57 PM
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `time` varchar(100) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--
-- Creation: Aug 11, 2024 at 05:57 PM
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `number` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` mediumtext NOT NULL,
  `total_price` int(11) NOT NULL,
  `payment_status` varchar(50) NOT NULL,
  `payment_id` varchar(50) NOT NULL,
  `placed_on` varchar(100) NOT NULL,
  `delivery` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `sname`, `number`, `email`, `address`, `total_products`, `total_price`, `payment_status`, `payment_id`, `placed_on`, `delivery`) VALUES
(32, 10, 'Chaitanya', 'Shinde', ' 919373954169', 'chaitanyashindetrader@gmail.com', 'Nav Shanti Niketan Housing Society, Pune, Maharashtra, 411044', 'Chaitanya (1 x 1) - ', 1, 'Completed', 'pay_Nd6oPvv7d57xAD', '2024-02-20 04:26:54', 'Not Completed'),
(33, 10, 'Chaitanya', 'Shinde', ' 919373954169', 'chaitanyashindetrader@gmail.com', 'Nav Shanti Niketan Housing Society, Pune, Maharashtra, 411044', 'Chaitanya (1 x 1) - ', 1, 'Completed', 'pay_Nd6qcB8oKUOaBp', '2024-02-20 04:28:12', 'Not Completed'),
(34, 10, 'TUKARAM', 'SHINDE', '9764394818', 'tukaramshinde63@gmail.com', 'D.Y. PATIL ROAD, P.C.N.T., MAHARASHTRA, 411044', 'Chaitanya (1 x 1) - ', 1, 'Completed', 'pay_Nd6smQidWRVEIf', '2024-02-20 04:30:47', 'Not Completed'),
(36, 10, 'Chaitanya', 'Shinde', ' 919373954169', 'chaitanyashindetrader@gmail.com', 'Nav Shanti Niketan Housing Society, Pune, Maharashtra, 411044', 'physics (1000 x 1) - ', 1000, 'Completed', 'pay_Nd6ukV7JEt8jeZ', '2024-02-20 04:33:02', 'Completed'),
(38, 10, 'Chaitanya', 'Shinde', ' 919373954169', 'chaitanyashindetrader@gmail.com', 'Nav Shanti Niketan Housing Society, Pune, Maharashtra, 411044', 'drafter (1000 x 1) - ', 1000, 'Completed', 'pay_NeGVk0UcgTP0YS', '2024-02-23 02:33:13', 'Completed'),
(43, 47, 'Chaitanya', 'Shinde', '9373954169', '9chaitanyashinde@gmail.com', 'Nav Shanti Niketan Housing Society, Pune, Maharashtra, 411044', 'Engineering Physics-1 (599 x 1) - drafter (1000 x 1) - Notebook (100 x 2) - ', 1799, 'Completed', 'pay_NgldPeHuhDhpPp', '2024-02-29 10:19:12', 'Not Completed'),
(45, 47, 'Chaitanya', 'Shinde', '9373954169', '9chaitanyashinde@gmail.com', 'Nav Shanti Niketan Housing Society, Pune, Maharashtra, 411044', 'drafter (1000 x 1) - Engineering Physics-1 (599 x 1) - ', 1599, 'Completed', 'pay_NgwxfCZSjMyA4V', '2024-03-01 09:24:57', 'Not Completed'),
(49, 47, 'Chaitanya', 'Shinde', '9373954169', '9chaitanyashinde@gmail.com', 'Nav Shanti Niketan Housing Society, Pune, Maharashtra, 411044', '1). drafter :-  Price : 1000X Quantity : 1 Total = 1000 - ', 1000, 'Failed', 'NONE', '2024-03-02 05:03:42', 'Not Completed'),
(50, 47, 'Chaitanya', 'Shinde', '9373954169', '9chaitanyashinde@gmail.com', 'Nav Shanti Niketan Housing Society, Pune, Maharashtra, 411044', '1). drafter :-  Price : 1000X Quantity : 1 Total = 1000 - ', 1000, 'Completed', 'pay_NhTJU074T5IVAS', '2024-03-02 05:04:01', 'Not Completed'),
(51, 47, 'Chaitanya', 'Shinde', '9373954169', '9chaitanyashinde@gmail.com', 'Nav Shanti Niketan Housing Society, Pune, Maharashtra, 411044', '1) Engineering Physics-1 :-  Price : 599 X Quantity : 1-> Total = 599 - 2) drafter :-  Price : 1000 ', 1599, 'Failed', 'NONE', '2024-03-02 05:06:35', 'Not Completed'),
(52, 47, 'Chaitanya', 'Shinde', '9373954169', '9chaitanyashinde@gmail.com', 'Nav Shanti Niketan Housing Society, Pune, Maharashtra, 411044', '1) Engineering Physics-1 :-  Price : 599 X Quantity : 2-> Total = 1198 - 2) drafter :-  Price : 1000', 3198, 'Completed', 'pay_NhTSvnHEoslT2W', '2024-03-02 05:12:48', 'Not Completed'),
(53, 47, 'Chaitanya', 'Shinde', '9373954169', '9chaitanyashinde@gmail.com', 'Nav Shanti Niketan Housing Society, Pune, Maharashtra, 411044', '1) drafter :-  Price : 1000 X Quantity : 1-> Total = 1000 - 2) Engineering Physics-1 :-  Price : 599', 1599, 'Failed', 'NONE', '2024-03-02 05:14:25', 'Not Completed'),
(54, 47, 'Chaitanya', 'Shinde', '9373954169', '9chaitanyashinde@gmail.com', 'Nav Shanti Niketan Housing Society, Pune, Maharashtra, 411044', '1) drafter :-  Price : 1000 X Quantity : 1-> Total = 1000 - 2) Engineering Physics-1 :-  Price : 599', 2198, 'Completed', 'pay_NhTUudoKVgawb4', '2024-03-02 05:14:41', 'Not Completed'),
(55, 47, 'Chaitanya', 'Shinde', '9373954169', '9chaitanyashinde@gmail.com', 'Nav Shanti Niketan Housing Society, Pune, Maharashtra, 411044', '1) drafter :-  Price : 100 X Quantity : 1 Total = 100 - 2) Engineering Physics-1 :-  Price : 599 X Q', 699, 'Completed', 'pay_NhTWKpd08YngaD', '2024-03-02 05:16:13', 'Not Completed'),
(56, 47, 'Chaitanya', 'Shinde', '9373954169', '9chaitanyashinde@gmail.com', 'Nav Shanti Niketan Housing Society, Pune, Maharashtra, 411044', '1) Engineering Physics-1 :-  Price : 599 X Quantity : 1 Total = 599 - 2) drafter :-  Price : 1000 X Quantity : 1 Total = 1000 - ', 1599, 'Completed', 'pay_NhTd67w6jEteVW', '2024-03-02 05:22:32', 'Not Completed'),
(57, 47, 'Chaitanya', 'Shinde', '9373954169', '9chaitanyashinde@gmail.com', 'Nav Shanti Niketan Housing Society, Pune, Maharashtra, 411044', '1) Engineering Physics-1.:-.  Price :. 599. X .Quantity :. 1.:-. Total = .599 - 2) drafter.:-.  Price :. 100. X .Quantity :. 1.:-. Total = .100 - 3) drafter.:-.  Price :. 1000. X .Quantity :. 2.:-. Total = .2000 - ', 2699, 'Completed', 'pay_NhUqO3am8aHPEg', '2024-03-02 06:33:46', 'Not Completed'),
(58, 47, 'Chaitanya', 'Shinde', '9373954169', '9chaitanyashinde@gmail.com', 'Nav Shanti Niketan Housing Society, Pune, Maharashtra, 411044', '1) drafter :-  Price : 1000 X Quantity : 1:- Total = 1000 - ', 1000, 'Failed', 'NONE', '2024-03-02 06:37:29', 'Not Completed'),
(59, 60, 'Chaitanya', 'Shinde', '9373954169', '9chaitanyashinde@gmail.com', 'Nav Shanti Niketan Housing Society, Pune, Maharashtra, 411044', '1) drafter :-  Price : 1000 X Quantity : 1:- Total = 1000 - ', 1000, 'Completed', 'pay_Nhv3grS38f2Art', '2024-03-03 08:12:11', 'Completed'),
(60, 65, 'Chaitanya', 'Shinde', '9373954169', '9chaitanyashinde@gmail.com', 'Nav Shanti Niketan Housing Society, Pune, Maharashtra, 411044', '1) Engineering Physics-1 :-  Price : 599 X Quantity : 1:- Total = 599 - ', 599, 'Completed', 'pay_NjhsGY5RJS2wPl', '2024-03-08 08:36:37', 'Completed'),
(61, 1, 'Chaitanya', 'Shinde', '9373954169', '9chaitanyashinde@gmail.com', 'Nav Shanti Niketan Housing Society, Pune, Maharashtra, 411044', '1) drafter :-  Price : 1000 X Quantity : 1:- Total = 1000 - ', 1000, 'Completed', 'pay_NlWPLttpgw5L8z', '2024-03-12 10:41:24', 'Not Completed'),
(62, 2, 'TUKARAM', 'SHINDE', '9764394818', 'tukaramshinde@gmail.com', 'D.Y. PATIL ROAD, P.C.N.T., MAHARASHTRA, 411044', '1) drafter :-  Price : 1000 X Quantity : 1:- Total = 1000 - ', 1000, 'Completed', 'pay_NmIEY2zrSphW2p', '2024-03-14 09:28:19', 'Not Completed'),
(64, 2, 'TUKARAM', 'SHINDE', '9764394818', 'tukaramshinde@gmail.com', 'D.Y. PATIL ROAD, P.C.N.T., MAHARASHTRA, 411044', '1) style=', 1699, 'Completed', 'pay_Nuv6m2xVY1gxy7', '2024-04-05 04:42:19', 'Not Completed'),
(65, 2, 'TUKARAM', 'SHINDE', '9764394818', 'tukaramshinde@gmail.com', 'D.Y. PATIL ROAD, P.C.N.T., MAHARASHTRA, 411044', '1)Engineering Physics-1 :-  Price : 599 X Quantity : 1:- Total = 599 - ', 599, 'Completed', 'pay_NuvBCIdc4d1FdG', '2024-04-05 04:46:30', 'Not Completed'),
(67, 2, 'Tukaram', 'shinde', '9764394818', 'tukaramshinde@gmail.com', 'D.Y. PATIL ROAD, P.C.N.T., MAHARASHTRA, 411044', '1) Chaitanya :-  Price : 100 X Quantity : 3 :- Total = 300 - ', 300, 'Completed', 'pay_O06WhpnNebpaWy', '0000-00-00 00:00:00', 'Not Completed'),
(68, 2, 'Tukaram', 'shinde', '9764394818', 'tukaramshinde@gmail.com', 'D.Y. PATIL ROAD, P.C.N.T., MAHARASHTRA, 411044', '1) Chaitanya :-  Price : 100 X Quantity : 1 :- Total = 100 - ', 100, 'Completed', 'pay_O06ZifUL6WYynP', '0000-00-00 00:00:00', 'Not Completed'),
(69, 2, 'Tukaram', 'shinde', '9764394818', 'tukaramshinde@gmail.com', 'D.Y. PATIL ROAD, P.C.N.T., MAHARASHTRA, 411044', '1) Chaitanya :-  Price : 100 X Quantity : 1 :- Total = 100 - ', 100, 'Completed', 'pay_O09COPk2OOXABl', '18 April 2024, 9:44 pm', 'Not Completed'),
(70, 3, 'Chaitanya', 'Shinde', '9373954169', 'chaitanyashinde@gmail.com', 'Nav Shanti Niketan Housing Society, Pune, Maharashtra, 411044', '1) Basic Electrical Engineering  :-  Price : 759 X Quantity : 1 :- Total = 759 - 2) Engineering Physics :-  Price : 799 X Quantity : 1 :- Total = 799 - ', 1558, 'Completed', 'pay_O0CT2QVz6EZ2UR', '19 April 2024, 12:55 am', 'Not Completed'),
(73, 7, 'Chaitanya', 'Shinde', '9373954169', '9chaitanyashinde@gmail.com', 'Nav Shanti Niketan Housing Society, Pune, Maharashtra, 411044', '1) drafter :-  Price : 449 X Quantity : 1 :- Total = 449 - ', 449, 'Completed', 'pay_O11JR8z1PmzMsq', '20 April 2024, 5:10 pm', 'Not Completed'),
(74, 8, 'Demo Name', 'Demo Surname', '1234567890', 'demo@studentscorner.com', 'Demo street lane 310,, New york,, Maharashtra, 3158019', '1) drafter :-  Price : 546 X Quantity : 1 :- Total = 546 - 2) Container :-  Price : 150 X Quantity : 1 :- Total = 150 - 3) Book :-  Price : 79 X Quantity : 1 :- Total = 79 - ', 775, 'Completed', 'pay_O4txCWexA4F9r3', '30 April 2024, 12:34 pm', 'Not Completed'),
(75, 8, 'Demo Name', 'Demo Surname', '1234567890', 'demo@studentscorner.com', 'Demo street lane 310,, New york,, Maharashtra, 3158019', '1) Roll n Draw :-  Price : 69 X Quantity : 1 :- Total = 69 - ', 69, 'Failed', 'NONE', '1 May 2024, 11:30 am', 'Not Completed'),
(76, 8, 'Demo Name', 'Surname', '1234567890', 'demo@studentscorner.com', 'Demo street lane 310,, New york,, Maharashtra, 3158019', '1) Roll n Draw :-  Price : 69 X Quantity : 1 :- Total = 69 - 2) Container :-  Price : 150 X Quantity : 1 :- Total = 150 - ', 219, 'Completed', 'pay_OJXwWg3nbErtou', '6 June 2024, 12:46 pm', 'Completed'),
(77, 8, 'Demo Name', 'Surname', '1234567890', 'demo@studentscorner.com', 'Demo street lane 310,, New york,, Maharashtra, 3158019', '1) drafter :-  Price : 546 X Quantity : 1 :- Total = 546 - ', 546, 'Completed', 'pay_OTK4neTKaxLX6a', '1 July 2024, 5:43 am', 'Cancelled'),
(78, 8, 'Demo Name', 'Surname', '1234567890', 'demo@studentscorner.com', 'Demo street lane 310,, New york,, Maharashtra, 3158019', '1) drafter :-  Price : 546 X Quantity : 1 :- Total = 546 - ', 546, 'Completed', 'pay_OTRuUYpxI8BvVT', '1 July 2024, 1:22 pm', 'Not Completed'),
(79, 8, 'Demo Name', 'Surname', '1234567890', 'demo@studentscorner.com', 'Demo street lane 310,, New york,, Maharashtra, 3158019', '1) Book :-  Price : 79 X Quantity : 1 :- Total = 79 - 2) Basic Electrical Engineering  :-  Price : 759 X Quantity : 1 :- Total = 759 - ', 838, 'Failed', 'NONE', '24 July 2024, 6:46 am', 'Not Completed'),
(80, 8, 'Demo Name', 'Surname', '1234567890', 'demo@studentscorner.com', 'Demo street lane 310,, New york,, Maharashtra, 3158019', '1) Book :-  Price : 79 X Quantity : 1 :- Total = 79 - 2) Basic Electrical Engineering  :-  Price : 759 X Quantity : 1 :- Total = 759 - ', 838, 'Completed', 'pay_OePQGN3mHkgsNU', '29 July 2024, 6:05 am', 'Not Completed'),
(81, 8, 'Demo Name', 'Surname', '1234567890', 'demo@studentscorner.com', 'Demo street lane 310,, New york,, Maharashtra, 3158019', '1) Book :-  Price : 79 X Quantity : 1 :- Total = 79 - ', 79, 'Failed', 'NONE', '1 August 2024, 11:36 am', 'Not Completed'),
(82, 8, 'Demo Name', 'Surname', '1234567890', 'demo@studentscorner.com', 'Demo street lane 310,, New york,, Maharashtra, 3158019', '1) Book :-  Price : 79 X Quantity : 1 :- Total = 79 - ', 79, 'Completed', 'pay_OkP3Iqlakszysn', '13 August 2024, 9:38 am', 'Not Completed'),
(83, 8, 'Demo Name', 'Surname', '1234567890', 'demo@studentscorner.com', 'Demo street lane 310,, New york,, Maharashtra, 3158019', '1) Engineering mechanics :-  Price : 1001 X Quantity : 1 :- Total = 1001 - 2) Engineering Chemistry :-  Price : 699 X Quantity : 1 :- Total = 699 - ', 1700, 'Failed', 'NONE', '26 August 2024, 8:58 am', 'Not Completed'),
(84, 8, 'Demo Name', 'Surname', '1234567890', 'demo@studentscorner.com', 'Demo street lane 310,, New york,, Maharashtra, 3158019', '1) Engineering mechanics :-  Price : 1001 X Quantity : 1 :- Total = 1001 - 2) Engineering Chemistry :-  Price : 699 X Quantity : 1 :- Total = 699 - 3) Engineering Physics :-  Price : 799 X Quantity : 1 :- Total = 799 - ', 2499, 'Failed', 'NONE', '26 August 2024, 9:57 am', 'Not Completed'),
(85, 8, 'Demo Name', 'Surname', '1234567890', 'demo@studentscorner.com', 'Demo street lane 310,, New york,, Maharashtra, 3158019', '1) Engineering mechanics :-  Price : 1001 X Quantity : 1 :- Total = 1001 - 2) Engineering Chemistry :-  Price : 699 X Quantity : 1 :- Total = 699 - 3) Engineering Physics :-  Price : 799 X Quantity : 1 :- Total = 799 - ', 2499, 'Failed', 'NONE', '30 August 2024, 3:01 am', 'Not Completed'),
(86, 8, 'Demo Name', 'Surname', '1234567890', 'demo@studentscorner.com', 'Demo street lane 310,, New york,, Maharashtra, 3158019', '1) Engineering mechanics :-  Price : 1001 X Quantity : 1 :- Total = 1001 - 2) Engineering Chemistry :-  Price : 699 X Quantity : 1 :- Total = 699 - 3) Engineering Physics :-  Price : 799 X Quantity : 1 :- Total = 799 - 4) Engineering Graphics :-  Price : 750 X Quantity : 1 :- Total = 750 - 5) Basic Electronics Engineering  :-  Price : 749 X Quantity : 1 :- Total = 749 - 6) Book :-  Price : 79 X Quantity : 1 :- Total = 79 - ', 4077, 'Failed', 'NONE', '18 September 2024, 2:23 pm', 'Not Completed'),
(87, 8, 'Demo Name', 'Surname', '1234567890', 'demo@studentscorner.com', 'Demo street lane 310,, New york,, Maharashtra, 3158019', '1) Engineering mechanics :-  Price : 1001 X Quantity : 1 :- Total = 1001 - 2) Engineering Chemistry :-  Price : 699 X Quantity : 1 :- Total = 699 - 3) Engineering Physics :-  Price : 799 X Quantity : 1 :- Total = 799 - 4) Engineering Graphics :-  Price : 750 X Quantity : 1 :- Total = 750 - 5) Basic Electronics Engineering  :-  Price : 749 X Quantity : 1 :- Total = 749 - 6) Book :-  Price : 79 X Quantity : 1 :- Total = 79 - 7) drafter :-  Price : 546 X Quantity : 1 :- Total = 546 - ', 4623, 'Failed', 'NONE', '17 October 2024, 12:37 pm', 'Not Completed'),
(88, 8, 'Demo Name', 'Surname', '1234567890', 'demo@studentscorner.com', 'Demo street lane 310,, New york,, Maharashtra, 3158019', '1) Engineering mechanics :-  Price : 1001 X Quantity : 1 :- Total = 1001 - 2) Engineering Chemistry :-  Price : 699 X Quantity : 1 :- Total = 699 - 3) Engineering Physics :-  Price : 799 X Quantity : 1 :- Total = 799 - 4) Engineering Graphics :-  Price : 750 X Quantity : 1 :- Total = 750 - 5) Basic Electronics Engineering  :-  Price : 749 X Quantity : 1 :- Total = 749 - 6) Book :-  Price : 79 X Quantity : 1 :- Total = 79 - 7) drafter :-  Price : 546 X Quantity : 1 :- Total = 546 - ', 4623, 'Failed', 'NONE', '17 October 2024, 12:39 pm', 'Not Completed'),
(90, 8, 'Demo Name', 'Surname', '1234567890', 'demo@studentscorner.com', 'Demo street lane 310,, New york,, Maharashtra, 3158019', '1) Engineering mechanics :-  Price : 1001 X Quantity : 1 :- Total = 1001 - 2) Engineering Chemistry :-  Price : 699 X Quantity : 1 :- Total = 699 - 3) Engineering Physics :-  Price : 799 X Quantity : 1 :- Total = 799 - 4) Engineering Graphics :-  Price : 750 X Quantity : 1 :- Total = 750 - 5) Basic Electronics Engineering  :-  Price : 749 X Quantity : 1 :- Total = 749 - 6) Book :-  Price : 79 X Quantity : 1 :- Total = 79 - 7) drafter :-  Price : 546 X Quantity : 1 :- Total = 546 - ', 4623, 'Failed', 'NONE', '17 October 2024, 12:41 pm', 'Not Completed'),
(91, 8, 'Demo Name', 'Surname', '1234567890', 'demo@studentscorner.com', 'Demo street lane 310,, New york,, Maharashtra, 3158019', '1) Engineering mechanics :-  Price : 1001 X Quantity : 1 :- Total = 1001 - 2) Engineering Chemistry :-  Price : 699 X Quantity : 1 :- Total = 699 - 3) Engineering Physics :-  Price : 799 X Quantity : 1 :- Total = 799 - 4) Engineering Graphics :-  Price : 750 X Quantity : 1 :- Total = 750 - 5) Basic Electronics Engineering  :-  Price : 749 X Quantity : 1 :- Total = 749 - 6) Book :-  Price : 79 X Quantity : 1 :- Total = 79 - ', 4077, 'Failed', 'NONE', '17 October 2024, 12:42 pm', 'Not Completed'),
(92, 8, 'Demo Name', 'Surname', '1234567890', 'demo@studentscorner.com', 'Demo street lane 310,, New york,, Maharashtra, 3158019', '1) Book :-  Price : 79 X Quantity : 1 :- Total = 79 - ', 79, 'Completed', 'pay_PAAuLxJsblwCJF', '17 October 2024, 12:42 pm', 'Cancelled'),
(93, 8, 'Demo Name', 'Surname', '1234567890', 'demo@studentscorner.com', 'Demo street lane 310,, New york,, Maharashtra, 3158019', '1) vg :-  Price : 20 X Quantity : 1 :- Total = 20 - ', 20, 'Completed', 'pay_PAAyWMEQcIxH3M', '17 October 2024, 12:46 pm', 'Completed'),
(94, 8, 'Demo Name', 'Surname', '1234567890', 'demo@studentscorner.com', 'Demo street lane 310,, New york,, Maharashtra, 3158019', '1) Book :-  Price : 79 X Quantity : 1 :- Total = 79 - ', 79, 'Completed', 'pay_PGNM7GenkgjrQQ', '2 November 2024, 4:46 am', 'Not Completed'),
(95, 8, 'Demo Name', 'Surname', '1234567890', 'demo@studentscorner.com', 'Demo street lane 310,, New york,, Maharashtra, 3158019', '1) drafter :-  Price : 546 X Quantity : 2 :- Total = 1092 - ', 1092, 'Failed', 'NONE', '31 December 2024, 11:27 pm', 'Not Completed'),
(96, 8, 'Demo Name', 'Surname', '1234567890', 'demo@studentscorner.com', 'Demo street lane 310,, New york,, Maharashtra, 3158019', '1) drafter :-  Price : 546 X Quantity : 2 :- Total = 1092 - ', 1092, 'Completed', 'pay_Pe2yyFeP0r8E14', '31 December 2024, 11:27 pm', 'Not Completed'),
(97, 8, 'Demo Name', 'Surname', '1234567890', 'demo@studentscorner.com', 'Demo street lane 310,, New york,, Maharashtra, 3158019', '1) Book :-  Price : 79 X Quantity : 1 :- Total = 79 - 2) drafter :-  Price : 546 X Quantity : 1 :- Total = 546 - ', 625, 'Completed', 'pay_PeRYLUpq9bgFas', '1 January 2025, 11:29 pm', 'Not Completed'),
(98, 8, 'Demo Name', 'Surname', '1234567890', 'demo@studentscorner.com', 'Demo street lane 310,, New york,, Maharashtra, 3158019', '1) Roll n Draw :-  Price : 69 X Quantity : 1 :- Total = 69 - 2) Book :-  Price : 79 X Quantity : 1 :- Total = 79 - ', 148, 'Completed', 'pay_Pgo1i8xTvojd9S', '7 January 2025, 10:46 pm', 'Not Completed'),
(99, 8, 'Demo Name', 'Surname', '1234567890', 'demo@studentscorner.com', 'Demo street lane 310,, New york,, Maharashtra, 3158019', '1) Roll n Draw :-  Price : 69 X Quantity : 1 :- Total = 69 - ', 69, 'Failed', 'NONE', '14 January 2025, 11:14 pm', 'Not Completed'),
(100, 8, 'Demo Name', 'Surname', '1234567890', 'demo@studentscorner.com', 'Demo street lane 310,, New york,, Maharashtra, 3158019', '1) Roll n Draw :-  Price : 69 X Quantity : 1 :- Total = 69 - 2) Book :-  Price : 79 X Quantity : 1 :- Total = 79 - ', 148, 'Completed', 'pay_PlDo2XD2LvQs7V', '19 January 2025, 2:35 am', 'Not Completed'),
(101, 8, 'Demo Name', 'Surname', '1234567890', 'demo@studentscorner.com', 'Demo street lane 310,, New york,, Maharashtra, 3158019', '1) Book :-  Price : 79 X Quantity : 1 :- Total = 79 - 2) drafter :-  Price : 546 X Quantity : 1 :- Total = 546 - ', 625, 'Failed', 'NONE', '30 January 2025, 8:08 am', 'Not Completed'),
(102, 8, 'Demo Name', 'Surname', '1234567890', 'demo@studentscorner.com', 'Demo street lane 310,, New york,, Maharashtra, 3158019', '1) Book :-  Price : 79 X Quantity : 1 :- Total = 79 - 2) drafter :-  Price : 546 X Quantity : 1 :- Total = 546 - ', 625, 'Completed', 'pay_PpfNbCVxnjOS1W', '30 January 2025, 8:10 am', 'Cancelled'),
(104, 8, 'Demo Name', 'Surname', '1234567890', 'demo@studentscorner.com', 'Demo street lane 310,, New york,, Maharashtra, 3158019', '1) Basic Electrical Engineering  :-  Price : 759 X Quantity : 1 :- Total = 759 - 2) Book :-  Price : 79 X Quantity : 1 :- Total = 79 - ', 838, 'Failed', 'NONE', '21 February 2025, 8:59 am', 'Not Completed'),
(105, 8, 'Demo Name', 'Surname', '1234567890', 'demo@studentscorner.com', 'Demo street lane 310,, New york,, Maharashtra, 3158019', '1) Book :-  Price : 79 X Quantity : 1 :- Total = 79 - ', 79, 'Failed', 'NONE', '25 February 2025, 12:39 pm', 'Not Completed'),
(106, 8, 'Demo Name', 'Surname', '1234567890', 'demo@studentscorner.com', 'Demo street lane 310,, New york,, Maharashtra, 3158019', '1) Book :-  Price : 79 X Quantity : 1 :- Total = 79 - ', 79, 'Failed', 'NONE', '10 March 2025, 11:11 am', 'Not Completed'),
(107, 8, 'Demo Name', 'Surname', '1234567890', 'demo@studentscorner.com', 'Demo street lane 310,, New york,, Maharashtra, 3158019', '1) Book :-  Price : 79 X Quantity : 1 :- Total = 79 - ', 79, 'Failed', 'NONE', '10 March 2025, 11:13 am', 'Not Completed'),
(108, 8, 'Demo Name', 'Surname', '1234567890', 'demo@studentscorner.com', 'Demo street lane 310,, New york,, Maharashtra, 3158019', '1) Book :-  Price : 79 X Quantity : 1 :- Total = 79 - ', 79, 'Failed', 'NONE', '10 March 2025, 11:13 am', 'Not Completed'),
(109, 8, 'Demo Name', 'Surname', '1234567890', 'demo@studentscorner.com', 'Demo street lane 310,, New york,, Maharashtra, 3158019', '1) Book :-  Price : 79 X Quantity : 1 :- Total = 79 - ', 79, 'Completed', 'pay_Q58LQcselyMUhN', '10 March 2025, 11:14 am', 'Not Completed'),
(110, 8, 'Demo Name', 'Surname', '1234567890', 'demo@studentscorner.com', 'Demo street lane 310,, New york,, Maharashtra, 3158019', '1) Engineering Physics :-  Price : 799 X Quantity : 1 :- Total = 799 - ', 799, 'Failed', 'NONE', '11 March 2025, 7:14 am', 'Not Completed'),
(111, 8, 'Demo Name', 'Surname', '1234567890', 'demo@studentscorner.com', 'Demo street lane 310,, New york,, Maharashtra, 3158019', '1) Engineering Physics :-  Price : 799 X Quantity : 1 :- Total = 70 - ', 799, 'Failed', 'NONE', '11 March 2025, 7:17 am', 'Not Completed'),
(112, 8, 'Demo Name', 'Surname', '1234567890', 'demo@studentscorner.com', 'Demo street lane 310,, New york,, Maharashtra, 3158019', '1) Engineering Physics :-  Price : 799 X Quantity : 1 :- Total = 799 - ', 799, 'Failed', 'NONE', '11 March 2025, 7:21 am', 'Not Completed'),
(113, 8, 'Demo Name', 'Surname', '1234567890', 'demo@studentscorner.com', 'Demo street lane 310,, New york,, Maharashtra, 3158019', '1) Engineering Physics :-  Price : 79 X Quantity : 1 :- Total = 79 - ', 799, 'Failed', 'NONE', '11 March 2025, 10:12 am', 'Not Completed'),
(114, 8, 'hwllo Name', 'Surname', '1234567890', 'demo@studentscorner.com', 'Demo street lane 310,, New york,, Maharashtra, 3158019', '1) Engineering Physics :-  Price : 799 X Quantity : 1 :- Total = 79 - ', 799, 'Failed', 'NONE', '16 March 2025, 12:49 am', 'Not Completed'),
(115, 8, 'Demo Name', 'Demo Surname', '1234567890', 'demo@studentscorner.com', 'Demo street lane 310,, New york,, Maha, 315899', '1) Engineering Physics :-  Price : 799 X Quantity : 1 :- Total = 799 - ', 799, 'Failed', 'NONE', '16 March 2025, 1:05 am', 'Not Completed'),
(116, 8, 'Demo Name', 'Demo Surname', '1234567890', 'demo@studentscorner.com', 'Demo street lane 310,, New york,, Maharashtra, 315808', '1) Engineering Physics :-  Price : 799 X Quantity : 1 :- Total = 799 - ', 799, 'Completed', 'pay_Q7LHvGuu4Tjksh', '16 March 2025, 1:08 am', 'Not Completed'),
(117, 8, 'Demo Name', 'Demo Surname', '1234567890', 'demo@studentscorner.com', 'Demo street lane 310,, New york,, Maharashtra, 3158019', '1) Engineering Physics :-  Price : 799 X Quantity : 6 :- Total = 4794 - ', 4794, 'Completed', 'pay_Q9mLs7Nmx8ygd4', '22 March 2025, 4:58 am', 'Completed'),
(118, 8, 'Demo Name', 'Demo Surname', '1234567890', 'demo@studentscorner.com', 'Demo street lane 310,, New york,, Maharashtra, 3158019', '1) Engineering Physics :-  Price : 799 X Quantity : 1 :- Total = 799 - ', 799, 'Failed', 'NONE', '25 March 2025, 4:05 am', 'Not Completed'),
(119, 8, 'Demo Name', 'Demo Surname', '1234567890', 'demo@studentscorner.com', 'Demo street lane 310,, New york,, Maharashtra, 3158019', '1) Book :-  Price : 79 X Quantity : 1 :- Total = 79 - ', 79, 'Failed', 'NONE', '4 April 2025, 2:50 am', 'Not Completed');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--
-- Creation: Aug 11, 2024 at 05:57 PM
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `sold_by` varchar(1000) NOT NULL,
  `quality` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `details` varchar(500) NOT NULL,
  `price` int(10) NOT NULL,
  `image_01` varchar(1000) NOT NULL,
  `image_02` varchar(1000) NOT NULL,
  `image_03` varchar(1000) NOT NULL,
  `status` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category`, `name`, `sold_by`, `quality`, `quantity`, `details`, `price`, `image_01`, `image_02`, `image_03`, `status`) VALUES
(2, 'book', 'Engineering Physics', 'Students Corner (Admin)', '1st Hand', 10, 'Best book for physics.', 799, '1-Studentscorner-2024-Apr-19-Fri-0-03-29-phy1.jpg', '2-Studentscorner-2024-Apr-19-Fri-0-03-29-phy2.jpg', '3-Studentscorner-2024-Apr-19-Fri-0-03-29-phy.jpg', 'Approved'),
(3, 'book', 'Engineering Chemistry', 'Students Corner (Admin)', '1st Hand', 9, 'Best book for Engg chemistry.', 699, '1-Studentscorner-2024-Apr-19-Fri-0-04-34-chem1.jpeg', '2-Studentscorner-2024-Apr-19-Fri-0-04-34-chem3.jpg', '3-Studentscorner-2024-Apr-19-Fri-0-04-34-chem2.jpg', 'Approved'),
(4, 'book', 'Basic Electrical Engineering ', 'Students Corner (Admin)', '1st Hand', 8, 'Best book for BEE.', 759, '1-Studentscorner-2024-Apr-19-Fri-0-14-15-bee1.jpg', '2-Studentscorner-2024-Apr-19-Fri-0-14-15-bee2.jpg', '3-Studentscorner-2024-Apr-19-Fri-0-14-15-bee3.jpg', 'Approved'),
(5, 'book', 'Basic Electronics Engineering ', 'Students Corner (Admin)', '1st Hand', 7, 'Best book for BXE.', 749, '1-Studentscorner-2024-Apr-19-Fri-0-15-21-bxe.png', '2-Studentscorner-2024-Apr-19-Fri-0-15-21-bxe1.jpg', '3-Studentscorner-2024-Apr-19-Fri-0-15-21-bxe2.jpg', 'Approved'),
(6, 'book', 'Engineering mechanics', 'Students Corner (Admin)', '1st Hand', 10, 'Perfect Book for engg mechanics', 1001, '1-Studentscorner-2024-Apr-19-Fri-0-16-42-mech1.jpg', '2-Studentscorner-2024-Apr-19-Fri-0-16-42-mech3.jpg', '3-Studentscorner-2024-Apr-19-Fri-0-16-42-mech2.jpg', 'Approved'),
(7, 'book', 'Engineering Graphics', 'Students Corner (Admin)', '1st Hand', 5, 'All in one book for eG', 750, 'eg2.jpeg', '2-Studentscorner-2024-Apr-19-Fri-0-17-39-eg3.jpeg', '3-Studentscorner-2024-Apr-19-Fri-0-17-39-eg1.jpg', 'Approved'),
(8, 'book', 'Programming and Problem Solving', 'Students Corner (Admin)', '1st Hand', 8, 'Book for clearing concept of programming in python', 449, '1-Studentscorner-2024-Apr-19-Fri-0-19-20-pps.jpg', '2-Studentscorner-2024-Apr-19-Fri-0-19-20-pps3.jpeg', '3-Studentscorner-2024-Apr-19-Fri-0-19-20-pps2.jpg', 'Approved'),
(9, 'book', 'Engineering Mathematics- II ', 'Students Corner (Admin)', '1st Hand', 7, 'Best book for M2.', 669, '1-Studentscorner-2024-Apr-19-Fri-0-23-35-m22.jpeg', '2-Studentscorner-2024-Apr-19-Fri-0-23-35-m21.jpg', '3-Studentscorner-2024-Apr-19-Fri-0-23-35-m23.jpg', 'Approved'),
(10, 'book', 'Engineering Mathematics - I', 'Students Corner (Admin)', '1st Hand', 6, 'Best book for 1 year student.', 549, '1-Studentscorner-2024-Apr-19-Fri-0-31-34-m11.jpg', '2-Studentscorner-2024-Apr-19-Fri-0-31-34-m13.jpg', '3-Studentscorner-2024-Apr-19-Fri-0-31-34-m12.jpg', 'Approved'),
(11, 'stationery', 'drafter', 'Students Corner (Admin)', '1st Hand', 2, 'Perfect tool for drawing.', 449, '1-Studentscorner-2024-Apr-19-Fri-0-32-53-draft.jpg', '2-Studentscorner-2024-Apr-19-Fri-0-32-53-mini-drafter.jpg', '3-Studentscorner-2024-Apr-19-Fri-0-32-53-draf.png', 'Approved'),
(12, 'stationery', 'Container', 'Students Corner (Admin)', '1st Hand', 3, 'Tool for carring sheets.', 150, '1-Studentscorner-2024-Apr-19-Fri-0-35-00-cont1.jpg', '2-Studentscorner-2024-Apr-19-Fri-0-35-00-cont2.jpeg', '3-Studentscorner-2024-Apr-19-Fri-0-35-00-cont3.jpeg', 'Approved'),
(13, 'stationery', 'Roll n Draw', 'Students Corner (Admin)', '1st Hand', 5, 'Best tool for drawing parallel lines.', 69, '1-Studentscorner-2024-Apr-19-Fri-0-37-04-rnd1.jpeg', '2-Studentscorner-2024-Apr-19-Fri-0-37-04-rnd2.png', '3-Studentscorner-2024-Apr-19-Fri-0-37-04-rnd3.jpg', 'Approved'),
(14, 'stationery', 'drafter', 'Chaitanya Shinde', '1st Hand', 10, 'drafter', 546, '1-Studentscorner-2024-Apr-19-Fri-9-59-48-draft.jpg', '2-Studentscorner-2024-Apr-19-Fri-9-59-48-drafter-removebg-preview.png', '3-Studentscorner-2024-Apr-19-Fri-9-59-48-draf.png', 'Approved'),
(15, 'book', 'Book', 'Students Corner (Admin)', '1st Hand', 1, 'Note book', 79, '1-Studentscorner-2024-Apr-27-Sat-7-30-11-bookn.jpg', '2-Studentscorner-2024-Apr-27-Sat-7-30-11-imgs.jpeg', '3-Studentscorner-2024-Apr-27-Sat-7-30-11-nb.jpg', 'Approved'),
(16, 'stationery', 'drafter', 'Demo NameÂ Demo Surname', '2nd Hand', 10, 'EG', 459, '1-Studentscorner-2024-Apr-27-Sat-7-31-49-draft.jpg', '2-Studentscorner-2024-Apr-27-Sat-7-31-49-draf.png', '3-Studentscorner-2024-Apr-27-Sat-7-31-49-drafter-removebg-preview.png', 'Not-Approved');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--
-- Creation: Aug 11, 2024 at 05:57 PM
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_rating` int(1) NOT NULL,
  `user_review` text NOT NULL,
  `datetime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `user_name`, `user_rating`, `user_review`, `datetime`) VALUES
(28, 'chaitanya', 3, 'nice', 1713469205),
(29, 'chaitanya', 4, 'nice', 1713501169),
(30, 'chaitanya', 5, 'best website', 1713711707),
(31, 'Ash', 5, 'Best Website\nHappy To work With you', 1713714566),
(33, 'Emaani Mahesh Reddy', 5, 'Nice Website! Happy to have such dev in campus. Keep Going!', 1713714750),
(34, 'Sandesh beloshe', 5, 'Very beautiful website!', 1714153204),
(35, 'Demo', 1, 'Demo bad review!', 1714702173),
(36, 'chait', 2, 'Demo bad Review!', 1722247089),
(37, 'Humanshu Ise', 5, 'Very good website!! Loved the dedication shown by Chaitanya!!!!', 1729183760),
(38, 'Danish Bhai', 5, 'Systumm Hang Website!!!!!!!!!', 1729183865),
(39, 'Ash', 5, 'Good!', 1737994640),
(40, 'CS', 5, ' good!', 1738242859),
(44, 'Donald Trump', 5, 'We will hire u chaits', 1738243273),
(45, 'Tukaram Shinde(CS cha Baap)', 0, 'Highly exaggerated website. I ought but never and always use it.', 1740480514),
(46, 'Tukaram Shinde(CS cha Baap)', 1, 'Highly exaggerated website. I ought but never and always use it.', 1740480528),
(47, 'Digvijay', 5, 'good ', 1742634297);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
-- Creation: Aug 11, 2024 at 05:57 PM
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `user_id` varchar(1000) NOT NULL,
  `username` varchar(1000) NOT NULL,
  `name` varchar(20) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `clgname` varchar(100) NOT NULL,
  `number` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `p_p` varchar(1000) NOT NULL,
  `address` varchar(500) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(500) NOT NULL,
  `pincode` int(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `last_seen` datetime NOT NULL DEFAULT current_timestamp(),
  `verification` varchar(100) NOT NULL,
  `otp` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `username`, `name`, `sname`, `clgname`, `number`, `email`, `p_p`, `address`, `city`, `state`, `pincode`, `password`, `last_seen`, `verification`, `otp`) VALUES
(2, '1710167394', 'Students Corner', 'Students', 'Corner', 'PICT', '9764394818', 'tukaramshinde@gmail.com', 'pic-3.png', 'D.Y. PATIL ROAD', 'P.C.N.T.', 'MAHARASHTRA', 411044, '84a516841ba77a5b4648de2cd0dfcb30ea46dbb4', '2024-03-31 16:25:59', 'Verified', ''),
(3, '1712911450', 'ChaitanyaShinde', 'Chaitanya', 'Shinde', 'PICT', '9373954169', 'chaitanyashinde@gmail.com', '', 'Nav Shanti Niketan Housing Society', 'Pune', 'Maharashtra', 411044, '84a516841ba77a5b4648de2cd0dfcb30ea46dbb4', '2024-04-12 14:14:10', 'Verified', 'b4cf1aaada40c22abb6d19275f2e895105cb61dd'),
(7, '1713641771', 'ChaitanyaShinde', 'Chaitanya', 'Shinde', 'PICT', '9373954169', '9chaitanyashinde@gmail.com', '', 'Nav Shanti Niketan Housing Society', 'Pune', 'Maharashtra', 411044, '84a516841ba77a5b4648de2cd0dfcb30ea46dbb4', '2024-04-21 01:06:11', 'Verifiedsff', '399042'),
(8, '1714211349', 'Demo NameDemo Surname', 'Demo Name', 'Demo Surname', 'PICT', '1234567890', 'demo@studentscorner.com', '', 'Demo street lane 310,', 'New york,', 'Maharashtra', 3158019, '4171c9efc1404418b201ab22910ba8d968d66cdd', '2024-04-27 15:19:09', 'Verified', '');
(9, '1714211350', 'Sandesh Beloshe', 'Sandesh', 'Beloshe', 'DYPIU', '1234567890', 'sandeshbeloshe6@gmail.com', '', 'Nav Shanti Niketan Housing Society', 'Pune,', 'Maharashtra', 411044, '4171c9efc1404418b201ab22910ba8d968d66cdd', '2025-03-27 15:19:09', 'Verified', '');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--
-- Creation: Aug 11, 2024 at 05:57 PM
--

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE `wishlist` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lostnfound`
--
ALTER TABLE `lostnfound`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT for table `lostnfound`
--
ALTER TABLE `lostnfound`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
