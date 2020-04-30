-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2020 at 08:08 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crh`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_pw` varchar(30) NOT NULL,
  `balance` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`user_id`, `user_name`, `user_pw`, `balance`) VALUES
(1, 'sofea', '00000', 945276);

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(15) NOT NULL,
  `student_id` int(15) NOT NULL,
  `car_id` int(15) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `start_time` time(6) NOT NULL,
  `end_time` time(6) NOT NULL,
  `booking_duration` int(11) NOT NULL,
  `booking_fee` int(11) NOT NULL,
  `booking_payment` varchar(11) NOT NULL DEFAULT 'unpaid'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `student_id`, `car_id`, `start_date`, `end_date`, `start_time`, `end_time`, `booking_duration`, `booking_fee`, `booking_payment`) VALUES
(3, 19, 35, '2020-04-14', '2020-04-14', '15:00:00.000000', '17:00:00.000000', 2, 80, '1'),
(4, 0, 0, '0000-00-00', '0000-00-00', '00:00:00.000000', '00:00:00.000000', 0, 0, '0'),
(5, 0, 0, '0000-00-00', '0000-00-00', '00:00:00.000000', '00:00:00.000000', 0, 0, '0'),
(6, 0, 0, '0000-00-00', '0000-00-00', '00:00:00.000000', '00:00:00.000000', 0, 0, '0'),
(7, 0, 0, '0000-00-00', '0000-00-00', '00:00:00.000000', '00:00:00.000000', 0, 0, '0'),
(26, 19, 29, '2020-04-23', '2020-04-23', '17:00:00.000000', '18:00:00.000000', 0, 0, '0'),
(27, 19, 29, '2020-04-23', '2020-04-23', '17:00:00.000000', '18:00:00.000000', 0, 0, '0'),
(28, 19, 29, '2020-04-23', '2020-04-23', '17:00:00.000000', '18:00:00.000000', 0, 0, '0'),
(29, 19, 29, '2020-04-23', '2020-04-23', '18:00:00.000000', '19:00:00.000000', 0, 0, '0'),
(30, 19, 29, '2020-04-23', '2020-04-23', '18:00:00.000000', '19:00:00.000000', 0, 0, '0'),
(31, 19, 29, '2020-04-23', '2020-04-23', '18:00:00.000000', '19:00:00.000000', 0, 0, '0'),
(32, 19, 29, '2020-04-23', '2020-04-23', '22:00:00.000000', '14:22:00.000000', 0, 0, '0'),
(33, 19, 29, '2020-04-23', '2020-04-23', '22:00:00.000000', '14:22:00.000000', 0, 0, '0'),
(34, 19, 29, '2020-04-23', '2020-04-23', '23:11:00.000000', '12:12:00.000000', 0, 0, 'unpaid'),
(35, 19, 44, '2020-04-23', '2020-04-23', '21:00:00.000000', '10:00:00.000000', 0, 0, 'unpaid'),
(39, 19, 38, '0000-00-00', '0000-00-00', '00:00:00.000000', '00:00:00.140000', 0, 7, 'paid'),
(40, 19, 39, '2020-04-23', '2020-04-23', '08:00:00.000000', '14:00:00.000000', 0, 7, 'paid'),
(41, 19, 38, '2020-04-23', '2020-04-23', '22:00:00.000000', '23:00:00.000000', 0, 0, 'unpaid'),
(42, 19, 34, '2020-04-23', '2020-04-23', '22:00:00.000000', '23:00:00.000000', 0, 0, 'unpaid'),
(43, 19, 39, '2020-04-26', '2020-04-26', '15:00:00.000000', '16:00:00.000000', 0, 0, 'unpaid'),
(44, 18, 39, '2020-04-26', '2020-04-26', '15:00:00.000000', '16:00:00.000000', 0, 0, 'unpaid'),
(45, 18, 39, '2020-04-26', '2020-04-26', '15:00:00.000000', '16:00:00.000000', 0, 0, 'unpaid'),
(46, 19, 34, '2020-04-26', '2020-04-26', '15:00:00.000000', '17:00:00.000000', 0, 0, 'unpaid'),
(47, 19, 29, '2020-04-26', '2020-04-26', '17:00:00.000000', '18:00:00.000000', 0, 0, 'unpaid'),
(48, 18, 29, '2020-04-26', '2020-04-26', '17:00:00.000000', '18:00:00.000000', 0, 0, 'unpaid'),
(49, 19, 29, '2020-04-26', '2020-04-26', '16:00:00.000000', '00:00:00.000000', 0, 0, 'unpaid'),
(50, 19, 47, '2020-04-28', '2020-04-28', '14:22:00.000000', '00:00:00.000000', 0, 0, 'unpaid'),
(51, 19, 47, '2020-04-28', '2020-04-28', '14:22:00.000000', '00:00:00.000000', 0, 0, 'unpaid'),
(52, 19, 47, '2020-04-28', '2020-04-28', '14:22:00.000000', '00:00:00.000000', 0, 0, 'unpaid'),
(53, 19, 43, '2020-04-28', '2020-04-28', '14:22:00.000000', '00:00:00.000000', 0, 0, 'unpaid'),
(54, 19, 43, '2020-04-28', '2020-04-28', '14:22:00.000000', '00:00:00.000000', 0, 0, 'unpaid'),
(56, 19, 43, '2020-04-28', '2020-04-28', '14:22:00.000000', '00:00:00.000000', 0, 0, 'unpaid'),
(57, 0, 0, '0000-00-00', '0000-00-00', '00:00:00.000000', '00:00:00.000000', 0, 0, 'unpaid'),
(58, 19, 43, '2020-04-28', '2020-04-28', '14:22:00.000000', '00:00:00.000000', 0, 0, 'unpaid'),
(59, 19, 34, '2020-04-28', '2020-04-28', '23:11:00.000000', '00:00:00.000000', 0, 0, 'unpaid'),
(60, 0, 0, '0000-00-00', '0000-00-00', '00:00:00.000000', '00:00:00.000000', 0, 0, 'unpaid'),
(61, 19, 34, '2020-04-28', '2020-04-28', '22:00:00.000000', '00:00:00.000000', 0, 0, 'unpaid'),
(62, 19, 35, '2020-04-28', '2020-04-28', '22:00:00.000000', '00:00:00.000000', 0, 0, 'unpaid'),
(63, 0, 0, '0000-00-00', '0000-00-00', '00:00:00.000000', '00:00:00.000000', 0, 0, 'unpaid'),
(64, 19, 43, '2020-04-28', '2020-04-28', '22:00:00.000000', '00:00:00.000000', 0, 0, 'unpaid'),
(65, 19, 43, '2020-04-28', '2020-04-28', '22:00:00.000000', '00:00:00.000000', 0, 0, 'unpaid'),
(66, 19, 29, '2020-04-29', '2020-04-29', '02:00:00.000000', '00:00:00.000000', 0, 0, 'unpaid'),
(67, 19, 39, '2020-04-29', '2020-04-29', '22:00:00.000000', '00:00:00.000000', 0, 0, 'unpaid'),
(68, 19, 43, '2020-04-29', '2020-04-29', '22:00:00.000000', '00:00:00.000000', 0, 0, 'unpaid'),
(69, 19, 38, '2020-04-29', '2020-04-29', '22:00:00.000000', '23:00:00.000000', 0, 0, 'unpaid'),
(70, 0, 0, '0000-00-00', '0000-00-00', '00:00:00.000000', '00:00:00.000000', 0, 0, 'unpaid'),
(71, 19, 37, '2020-04-29', '2020-04-29', '22:00:00.000000', '23:00:00.000000', 0, 0, 'unpaid'),
(72, 19, 37, '2020-04-29', '2020-04-29', '22:00:00.000000', '23:00:00.000000', 0, 0, 'unpaid'),
(73, 19, 36, '2020-04-29', '2020-04-29', '15:00:00.000000', '16:00:00.000000', 0, 0, 'unpaid'),
(74, 19, 36, '2020-04-29', '2020-04-29', '15:00:00.000000', '16:00:00.000000', 0, 0, 'unpaid'),
(75, 0, 38, '2020-04-29', '2020-04-29', '14:02:00.000000', '15:03:00.000000', 0, 0, 'unpaid'),
(76, 0, 0, '2020-04-29', '2020-04-29', '14:02:00.000000', '14:02:00.000000', 0, 0, 'unpaid'),
(81, 0, 38, '2020-04-29', '2020-04-29', '15:06:00.000000', '14:22:00.000000', 0, 0, 'unpaid'),
(82, 19, 38, '2020-04-30', '2020-04-30', '13:02:00.000000', '16:44:00.000000', 0, 0, 'unpaid'),
(83, 19, 35, '2020-04-29', '2020-04-29', '12:30:00.000000', '06:06:00.000000', 0, 0, 'unpaid'),
(84, 19, 38, '2020-04-30', '2020-04-30', '00:12:00.000000', '14:02:00.000000', 0, 0, 'unpaid'),
(85, 19, 37, '2020-04-30', '2020-04-30', '10:10:00.000000', '14:22:00.000000', 0, 0, 'unpaid'),
(86, 19, 39, '2020-04-30', '2020-04-30', '01:01:00.000000', '14:02:00.000000', 0, 0, 'unpaid'),
(87, 19, 39, '2020-04-30', '2020-04-30', '14:02:00.000000', '15:03:00.000000', 0, 0, 'unpaid'),
(88, 19, 37, '2020-04-30', '2020-04-30', '14:02:00.000000', '18:06:00.000000', 0, 0, 'unpaid');

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `id` int(15) NOT NULL,
  `owner_id` int(15) NOT NULL,
  `name` varchar(255) NOT NULL,
  `seat` varchar(255) NOT NULL,
  `colour` varchar(255) NOT NULL,
  `rate` double(15,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `year` year(4) NOT NULL,
  `info` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1 = available , 2 = booked'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`id`, `owner_id`, `name`, `seat`, `colour`, `rate`, `image`, `year`, `info`, `status`) VALUES
(29, 16, 'Proton Iriz', '5', 'grey', 8.00, 'IMG_3248.jpg', 2018, 'slow', 1),
(34, 16, 'myvi', '5', 'white', 8.00, 'gallery_used-car-carlist-perodua-myvi-se-hatchback-malaysia_5303522_759018595_v1sm.jpg', 2010, 'dsasaffa', 1),
(35, 16, 'Bezza', '5', 'Blue', 10.50, 'gallery_new-car-carlist-perodua-bezza-x-premium-sedan-malaysia_8438195_1fyBCnVYIB1vNMCYcqSpPV.jpg', 2018, 'besar', 1),
(36, 16, 'bmw', '5', 'blue', 13.00, 'prev-desktop_review-g20-bmw-3-series--digital-in-mind-analogue-in-soul-65477_cover_2019_g20-330i-1_1.jpg', 2017, 'this is a good car', 1),
(37, 17, 'Bezza', '5', 'Brown', 8.00, 'Carsifu-P-Bezza-sedan-01.jpg', 2018, 'okay', 1),
(38, 17, 'Axia ', '5', 'White', 7.00, 'gallery_new-car-carlist-perodua-axia-gxtra-hatchback-malaysia_7767026_4616Rnsybz6wHIQTELCEPb.jpg', 2017, 'Boleh naik', 1),
(39, 17, 'Axia', '5', 'Yellow', 7.00, 'main-l_used-car-carlist-perodua-axia-advance-hatchback-malaysia_3268726_MExtiTV8YXjK8mFjLVTWRU.jpg', 2018, 'kuning buat abang pening', 1),
(40, 18, 'Myvi', '4', 'Purple', 8.00, 'perodua_myvi_2010_perodua_myvi_13se_at_4620069510161500951.jpg', 2015, 'Cantik', 1),
(42, 18, 'Honda City', '5', 'Red', 10.00, '506807084389567.jpg', 2018, 'okay', 1),
(43, 18, 'Perodua Aruz', '7', 'White', 13.00, '213913083578854.jpg', 2019, 'Big', 1),
(44, 18, 'Honda Accord', '5', 'Brown', 15.00, '327924080494936.jpg', 2015, 'Big', 1),
(46, 18, 'Jazz', '5', 'White', 20.00, 'bc5877947e0341b98c7e962c97216515.jpg', 2010, 'Good', 1),
(47, 24, 'myvi', '5', 'white', 10.00, '404911127198010.jpg', 2018, 'sesuai untuk dating', 1),
(49, 23, 'myvi', '5', 'purple', 10.00, 'perodua_myvi_2010_perodua_myvi_13se_at_4620069510161500951.jpg', 2015, 'cantik', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cimb`
--

CREATE TABLE `cimb` (
  `user_id` int(11) NOT NULL,
  `user_username` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_deposit` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cimb`
--

INSERT INTO `cimb` (`user_id`, `user_username`, `user_pass`, `user_deposit`) VALUES
(1, 'ali', 'ali', 9999920),
(2, 'faziatulakma', 'faziatulakma', 286.04),
(3, 'gg', '123', 9999457);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(20) NOT NULL,
  `satisfaction` varchar(50) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `satisfaction`, `message`) VALUES
(1, 'Satisfied', 'great service!'),
(2, 'Unsatisfied', 'tak best'),
(3, 'Satisfied', 'ok'),
(4, 'Satisfied', 'ok'),
(5, 'Unsatisfied', 'not ok'),
(6, 'Satisfied', 'okay :)'),
(7, 'Satisfied', 'great service ');

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `id` int(15) NOT NULL,
  `name` text NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` text NOT NULL,
  `phone` int(11) NOT NULL,
  `cert` varchar(255) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1' COMMENT '1 = unverified , 2 = verified '
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`id`, `name`, `address`, `email`, `pass`, `phone`, `cert`, `status`) VALUES
(1, 'aqip', 'qwer', 'aqip', '$2y$10$oY5oAm7jPohqH', 243245, '', 2),
(3, 'ayel', 'huuhuh', 'ayel', '$2y$10$zVIRpttLHoEld', 3123213, '', 2),
(10, 'ash', 'perak', 'ash', '$2y$10$rQi4nz9y3SPem', 312312, 'cert', 2),
(12, 'pawi', 'johor', 'pawi', '$2y$10$Mr8R37GRr9/Zc', 123123, 'cert', 2),
(13, 'azman', 'himalaya', 'jeman', '$2y$10$F7TJEvFDfx3c0', 213123, 'cert', 2),
(14, 'shahreen', 'denai alam', 'shahreen', '$2y$10$t9frr3NTACgCk', 123123, 'cert', 2),
(15, 'test', 'test1', 'test', '$2y$10$2pRhJTki3.dt5', 12312312, 'cert', 2),
(16, 'khair', 'test', 'khair', '$2y$10$10zEjEqcJ3BBQyMej43fPulUoMYFidWDwraXS36O0qDGo8tl8Yi/C', 561, 'cert', 2),
(17, 'zarif', 'kuantan', 'zarif', '$2y$10$2wOfglp2flOW..n5b9xYG.xBHiz2rDk9BnDKiYNTamGqBxgEE1xXC', 291822, 'cert', 2),
(18, 'faiz', 'dungun', 'faiz', '$2y$10$0/AZdQY/PYVwlmPxkRhqTuZAF6RRDOvSb9F3Ak/nKTfzcGWQzWyua', 123123, 'cert', 2),
(19, 'halim', 'ganu', 'halim', '$2y$10$VOIti7XaXSSdUBPRaExdIOOrAnFVQhaWHRqDjtZsYEeAXtvXWuVjK', 21312, 'cert', 2),
(20, 'ana', 'kuatan', 'ana', '$2y$10$3MLmGkPQt63hZifxYKJsPO6Ol2xrARiFDaXMKR5qudFUttdNUZetS', 12773, '', 2),
(22, 'bal', 'kelantan', 'bal', '$2y$10$dnI24XQ08aKg6TugCq97.eiaEjUmF8JuMq7woTRDe/7Y5ErdSbWVy', 2022920, '', 2),
(23, 'miss', 'miss', 'miss', '$2y$10$/6GcM15QRnxNjhy6iwfq.uYKKjJ32wEVBGwg9SphkVU3nwP2nOzAi', 892729, '', 2),
(24, 'qis', 'melor', 'qis', '$2y$10$EWok1iM00fKi4A7JuQ9veeodaKjHuT2dIoHsj/P2FEZ63k9H6NYV.', 3432112, '', 2),
(25, 'shahreen', 'denai alam', 'shahreen', '$2y$10$D6HPVNDPIVuhR2JuprcosegdmqErXJh4OYgwsyXvaTAI3m6kIH33q', 1135021007, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `total_rate` double NOT NULL,
  `owner_rate` double NOT NULL,
  `admin_rate` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `booking_id`, `student_id`, `car_id`, `total_rate`, `owner_rate`, `admin_rate`) VALUES
(1, 3, 19, 35, 10.5, 9.45, 1.05),
(2, 71, 19, 37, 8, 7.2, 0.8),
(3, 40, 19, 39, 7, 6.3, 0.7),
(4, 71, 19, 37, 8, 7.2, 0.8);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `purchase` float NOT NULL,
  `sale` float NOT NULL,
  `profit` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `year`, `purchase`, `sale`, `profit`) VALUES
(5, '2007', 550000, 800000, 250000),
(6, '2008', 678000, 1065000, 387000),
(7, '2009', 787000, 12786500, 560400),
(8, '2010', 895600, 1456000, 560400),
(9, '2012', 1065850, 1710540, 636692);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `book_id` int(15) NOT NULL,
  `student_id` int(15) NOT NULL,
  `id` int(15) NOT NULL COMMENT 'car_id',
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `book_duration` int(11) NOT NULL,
  `book_fee` double(4,2) NOT NULL,
  `book_payment` varchar(1) NOT NULL DEFAULT '1' COMMENT '1 = unpaid , 2 = paid'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`book_id`, `student_id`, `id`, `start_date`, `end_date`, `start_time`, `end_time`, `book_duration`, `book_fee`, `book_payment`) VALUES
(17, 0, 0, '0000-00-00', '0000-00-00', '00:00:00', '00:00:00', 0, 0.00, '1'),
(18, 0, 0, '2020-04-08', '2020-04-08', '15:00:00', '16:00:00', 0, 0.00, '1'),
(19, 19, 38, '2020-04-11', '2020-04-11', '16:00:00', '17:00:00', 0, 0.00, '1');

-- --------------------------------------------------------

--
-- Table structure for table `reservationn`
--

CREATE TABLE `reservationn` (
  `book_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `id` int(11) NOT NULL COMMENT 'car_id',
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `book_duration` int(11) NOT NULL,
  `book_fee` double(4,2) NOT NULL,
  `book_payment` varchar(1) NOT NULL DEFAULT '1' COMMENT '1 = unpaid , 2 = paid'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservationn`
--

INSERT INTO `reservationn` (`book_id`, `student_id`, `id`, `start_date`, `end_date`, `start_time`, `end_time`, `book_duration`, `book_fee`, `book_payment`) VALUES
(17, 0, 0, '0000-00-00', '0000-00-00', '00:00:00', '00:00:00', 0, 0.00, '1'),
(18, 0, 0, '2020-04-08', '2020-04-08', '15:00:00', '16:00:00', 0, 0.00, '1'),
(19, 0, 0, '2020-04-11', '2020-04-11', '16:00:00', '17:00:00', 0, 0.00, '1');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(15) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` text NOT NULL,
  `phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `email`, `pass`, `phone`) VALUES
(1, 'nami', 'nami', '$2y$10$F5fDlTu57sCQY', 312312),
(2, 'ayel', 'ayel', '$2y$10$UIYf/NlbhbgY0', 89234);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(15) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `name`, `email`, `pass`, `address`, `phone`, `image`) VALUES
(3, 'test', 'test@gmail.com', '123', 'safdfs2', 321213, ''),
(4, 'ddd', 'ddd', '111', 'ddd', 223, ''),
(5, 'qip', 'qippp@gmail.com', '123', 'sadkl', 213213, ''),
(6, 'mama', 'mama', '123', 'dsakl2', 312, ''),
(7, 'ppp', 'ppp', '123', 'ppp22', 231, ''),
(9, 'aaaa', 'aaaa', '123', 'aaaa', 1234, ''),
(10, 'pyro', 'rool', '123', 'sdwoejiq', 1231231, ''),
(11, 'jondowh', 'jon', '$2y$10$cJO3TDCzpuvRj', 'bon', 111, ''),
(12, 'najmi', 'najmi', '$2y$10$ljS6hanDefkHa', 'najmi', 123, ''),
(13, 'popo', 'popo', '123', 'uiyui', 189719, ''),
(14, 'bul', 'qwe', '$2y$10$yhp//DUMc/bfB', 'erwrw', 543543, ''),
(15, 'haii', 'hai@', '$2y$10$FLqZM3rnxj7VY', 'qwe', 2313123, ''),
(16, 'yeet', 'Hum@mail', '$2y$10$T8QU/9epnbbYu', 'pre', 12344, ''),
(17, 'qwert', 'qwer', '$2y$10$jY7NODVDF3BlL', 'aaa', 13477, ''),
(18, 'haziq', 'haziq', '$2y$10$mUAmM3/pegt7V', 'kuantan', 3982163, ''),
(19, 'zamir', 'zamir', '$2y$10$inkP.5OjifDR5', 'perak', 223213, ''),
(20, 'kireen', 'kireen', '$2y$10$QaVv7TSHaem/XwSk25AuZ.ZpHJ0TsIUfvE4/lryiWv8Ib9VP2QMIW', 'sadjbsakdb', 1283129, ''),
(21, 'arfan', 'arfan@gmail.com', '$2y$10$wHYyEPXGA4ElmnVN2P8cMuN0LuwozcGh40aSRuFgMnmnSosAOc3tu', 'denai', 123123124, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id`),
  ADD KEY `owner_id` (`owner_id`);

--
-- Indexes for table `cimb`
--
ALTER TABLE `cimb`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `reservationn`
--
ALTER TABLE `reservationn`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `cimb`
--
ALTER TABLE `cimb`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `book_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `reservationn`
--
ALTER TABLE `reservationn`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `car_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `owner` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
