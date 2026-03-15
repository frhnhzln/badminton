-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2021 at 01:23 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `raffbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(15) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` text NOT NULL,
  `phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `pass`, `phone`) VALUES
(1, 'nami', 'nami', '$2y$10$F5fDlTu57sCQY', 312312),
(4, 'Kolej Kerawang', 'kolejkerawang@gmail.com', '$2y$10$BRqD2qPSr7ZWQ2umXU9/cOBZJ0A5zav9vBgJ0QrqjtU51mrt0iMhS', 981628),
(5, 'Muhammad Shahreen Aqiff', 'aqiff@gmail.com', '$2y$10$Z0VLS188YmKtTnsh84oc0.kas3eFTnFEX6SWe6a.hiXT0Of6ohCFi', 1135021007),
(6, 'far', 'far@gmail.com', '$2y$10$JKMCmBpEBSbpjzZ8sF1h9OiNjSboQgnbydjY3iBQ9Txi6b8x43vS6', 126059652),
(7, 'saiful zuhairi', 'zsaiful98@gmail.com', '$2y$10$/MQxUB5E6cO2pk24B8jWF.kOUHkLPL2MI0Vu4IAxeoW7YpyMhT/ge', 136612330);

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(15) NOT NULL,
  `student_id` int(15) NOT NULL,
  `id` int(15) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `start_time` time(6) NOT NULL,
  `end_time` time(6) NOT NULL,
  `booking_duration` int(11) NOT NULL,
  `booking_fee` int(11) NOT NULL,
  `booking_payment` varchar(11) NOT NULL DEFAULT 'unpaid',
  `start_timestamp` varchar(255) NOT NULL,
  `end_timestamp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `student_id`, `id`, `start_date`, `end_date`, `start_time`, `end_time`, `booking_duration`, `booking_fee`, `booking_payment`, `start_timestamp`, `end_timestamp`) VALUES
(250, 41, 69, '2021-06-06', '2021-06-07', '02:28:00.000000', '02:28:00.000000', 24, 2952, 'unpaid', '1622917680', '1623004080'),
(251, 41, 66, '2021-06-06', '2021-06-07', '15:49:00.000000', '15:49:00.000000', 24, 5760, 'unpaid', '1622965740', '1623052140'),
(252, 41, 70, '2021-06-06', '2021-06-07', '17:40:00.000000', '20:40:00.000000', 27, 7290, 'paid', '1622972400', '1623069600'),
(254, 39, 67, '2021-06-14', '2021-06-14', '18:00:00.000000', '20:00:00.000000', 2, 520, 'paid', '1623686400', '1623693600'),
(256, 39, 66, '2021-06-11', '2021-06-11', '14:00:00.000000', '16:00:00.000000', 2, 500, 'paid', '1623412800', '1623420000'),
(258, 0, 67, '2021-06-19', '2021-06-19', '20:00:00.000000', '22:00:00.000000', 2, 520, 'paid', '1624125600', '1624132800'),
(259, 39, 66, '2021-07-04', '2021-07-05', '15:00:00.000000', '17:00:00.000000', 26, 6500, 'unpaid', '1625403600', '1625497200'),
(260, 39, 70, '2021-07-04', '2021-07-04', '10:00:00.000000', '12:00:00.000000', 2, 540, 'unpaid', '1625385600', '1625392800'),
(261, 39, 66, '2021-07-04', '2021-07-04', '10:00:00.000000', '12:00:00.000000', 2, 500, 'unpaid', '1625385600', '1625392800'),
(262, 39, 67, '2021-07-04', '2021-07-04', '10:00:00.000000', '12:00:00.000000', 2, 520, 'unpaid', '1625385600', '1625392800'),
(263, 39, 67, '2021-07-05', '2021-07-05', '14:00:00.000000', '16:00:00.000000', 2, 520, 'unpaid', '1625486400', '1625493600'),
(264, 39, 66, '2021-09-10', '2021-09-10', '14:00:00.000000', '16:00:00.000000', 2, 500, 'unpaid', '1631275200', '1631282400'),
(266, 42, 66, '2021-12-27', '2021-12-27', '19:00:00.000000', '22:00:00.000000', 3, 750, 'paid', '1640628000', '1640638800'),
(267, 42, 67, '2021-07-04', '2021-07-04', '20:00:00.000000', '22:00:00.000000', 2, 520, 'paid', '1625421600', '1625428800'),
(268, 41, 1, '2021-06-21', '2021-06-21', '20:17:00.000000', '20:17:00.000000', 0, 0, 'unpaid', '1624277820', '1624277820'),
(269, 41, 1, '2021-06-21', '2021-06-21', '20:17:00.000000', '20:17:00.000000', 0, 0, 'paid', '1624277820', '1624277820'),
(270, 41, 1, '2021-06-21', '2021-06-21', '20:17:00.000000', '20:17:00.000000', 0, 0, 'paid', '1624277820', '1624277820'),
(271, 41, 1, '2021-06-21', '2021-06-22', '20:21:00.000000', '20:21:00.000000', 24, 6000, 'paid', '1624278060', '1624364460'),
(272, 41, 1, '2021-06-25', '2021-06-26', '20:22:00.000000', '20:22:00.000000', 24, 6000, 'paid', '1624623720', '1624710120');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `student_id` int(15) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`student_id`, `name`, `email`, `pass`, `address`, `phone`, `image`) VALUES
(38, 'FARHAN ZIKRY BIN AHMAD RAZIF', 'farhanzikry43@gmail.com', '$2y$10$jE.ASttM.2NzF65b1C7yweM98JLiDL.JJi.zMqp3FBECrBMgNS8Xq', 'NO 8 JALAN TANGSI 19/25', '60126059652', ''),
(39, 'FARHAN ZIKRY BIN AHMAD RAZIF', 'far@gmail.com', '$2y$10$ec./tdk0f.WlgJ2XboodiONKQeYbSfwTP9FpKAbvlUVocZ37MOwSm', 'NO 8 JALAN TANGSI 19/25, SEKSYEN 19', '0126059652', ''),
(41, 'saiful zuhairi', 'zsaiful98@gmail.com', '$2y$10$SAmjbFzTQWL2Jnb8YGaYEuOMzml./TOPWr68Dn8ME/0h3JsXFyi3m', 'PARIT 3 KAMPUNG SUNGAI PERGAM, we, we', '60136612330', '');

-- --------------------------------------------------------

--
-- Table structure for table `field`
--

CREATE TABLE `field` (
  `id` int(15) NOT NULL,
  `name` varchar(255) NOT NULL,
  `size` varchar(15) NOT NULL,
  `rate` double(15,2) NOT NULL,
  `info` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `field`
--

INSERT INTO `field` (`id`, `name`, `size`, `rate`, `info`) VALUES
(1, 'Field 1', '100 x 50', 250.00, 'padang sintetik'),
(2, 'A1', '100 X 50', 12.00, 'padang sintatik grad A'),
(3, 'B', '100 X 50', 12.00, 'padang sintatik grad B');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `p_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `total_rate` double NOT NULL,
  `owner_rate` double NOT NULL,
  `admin_rate` double NOT NULL,
  `payment_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`p_id`, `booking_id`, `student_id`, `id`, `total_rate`, `owner_rate`, `admin_rate`, `payment_time`) VALUES
(167, 250, 41, 69, 2952, 2656.8, 295.2, '2021-06-05 18:52:32'),
(168, 251, 41, 66, 5760, 5184, 576, '2021-06-06 07:50:14'),
(169, 252, 41, 70, 7290, 6561, 729, '2021-06-06 09:40:28'),
(170, 253, 39, 66, 500, 450, 50, '2021-06-06 14:51:39'),
(171, 254, 39, 67, 520, 468, 52, '2021-06-06 14:52:16'),
(172, 255, 39, 67, 520, 468, 52, '2021-06-06 22:51:55'),
(173, 256, 39, 66, 500, 450, 50, '2021-06-07 16:52:39'),
(174, 257, 39, 70, 540, 486, 54, '2021-06-07 18:29:48'),
(175, 258, 0, 67, 520, 468, 52, '2021-06-08 00:38:56'),
(176, 259, 39, 66, 6500, 5850, 650, '2021-06-09 14:54:58'),
(177, 260, 39, 70, 540, 486, 54, '2021-06-10 07:09:08'),
(178, 261, 39, 66, 500, 450, 50, '2021-06-10 07:25:58'),
(179, 262, 39, 67, 520, 468, 52, '2021-06-10 07:32:12'),
(180, 263, 39, 67, 520, 468, 52, '2021-06-10 07:33:56'),
(181, 264, 39, 66, 500, 450, 50, '2021-06-10 08:05:22'),
(182, 265, 39, 67, 520, 468, 52, '2021-06-18 17:14:35'),
(183, 266, 42, 66, 750, 675, 75, '2021-06-18 17:22:00'),
(184, 267, 42, 67, 520, 468, 52, '2021-06-18 17:26:31'),
(185, 268, 41, 1, 0, 0, 0, '2021-06-20 12:17:17'),
(186, 269, 41, 1, 0, 0, 0, '2021-06-20 12:17:25'),
(187, 270, 41, 1, 0, 0, 0, '2021-06-20 12:17:33'),
(188, 271, 41, 1, 6000, 5400, 600, '2021-06-20 12:21:35'),
(189, 272, 41, 1, 6000, 5400, 600, '2021-06-20 12:22:31');

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
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` text NOT NULL,
  `phone` varchar(12) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'unverified'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `address`, `email`, `pass`, `phone`, `image`, `status`) VALUES
(18, 'Faiz Halim', 'dungun', 'faiz@gmail.com', '$2y$10$0/AZdQY/PYVwlmPxkRhqTuZAF6RRDOvSb9F3Ak/nKTfzcGWQzWyua', '123123', 'cert', 'verified'),
(19, 'halim', 'ganu', 'halim', '$2y$10$VOIti7XaXSSdUBPRaExdIOOrAnFVQhaWHRqDjtZsYEeAXtvXWuVjK', '21312', 'cert', 'verified'),
(20, 'ana', 'kuatan', 'ana', '$2y$10$3MLmGkPQt63hZifxYKJsPO6Ol2xrARiFDaXMKR5qudFUttdNUZetS', '12773', '', 'verified'),
(22, 'bal', 'kelantan', 'bal', '$2y$10$dnI24XQ08aKg6TugCq97.eiaEjUmF8JuMq7woTRDe/7Y5ErdSbWVy', '2022920', '', 'verified'),
(23, 'miss', 'miss', 'miss', '$2y$10$/6GcM15QRnxNjhy6iwfq.uYKKjJ32wEVBGwg9SphkVU3nwP2nOzAi', '892729', '', 'verified'),
(24, 'qis', 'melor', 'qis@gmail.com', '$2y$10$EWok1iM00fKi4A7JuQ9veeodaKjHuT2dIoHsj/P2FEZ63k9H6NYV.', '3432112', '', 'verified'),
(25, 'shahreen', 'denai alam', 'shahreen', '$2y$10$D6HPVNDPIVuhR2JuprcosegdmqErXJh4OYgwsyXvaTAI3m6kIH33q', '1135021007', '', 'verified'),
(38, 'aaa', 'aaa', 'aaa@g', '$2y$10$ScuzRjaz.f8jDVIjpEFepeGKYfKCar9B0a7UV58O4ekQj1Cee7OtS', '123', '', 'verified'),
(40, 'qwer', 'asdsaddsa', 'namiku@gmail.com', '$2y$10$xDt.3JcyDDNmybTPqrgs5OPuMDS1QZTpex1ySj2Ct.HpeHULcWUC2', '60174215083', 'WhatsApp Image 2020-05-06 at 8.52.22 PM.jpeg', 'verified'),
(42, 'syakireen', 'ampang', 'syakireen@gmail.com', '$2y$10$vFZWcVmPla9s3WMxyXjGdOBwHkaS0YtnHA6adBABq4FDafGchr38.', '60176406261', 'WhatsApp Image 2020-05-06 at 8.52.22 PM.jpeg', 'unverified'),
(43, 'nami', 'asifnh', 'najmi@gmail.com', '$2y$10$F2RkqCA7m.lHVWxTtI6gq.RtpCO6WOtAMWr0IhTnuKLtBwPCnv5HC', '60132566420', 'WhatsApp Image 2020-05-06 at 8.52.22 PM.jpeg', 'unverified'),
(44, 'Muhammad Azril', 'Kuala Selangor', 'ayel@gmail.com', '$2y$10$PpvRf5maJYXc9xPtqDCi5.mRzMJWD5Xs.cqlVsZCEdhAGQkTXB/oy', '60126780233', 'borang9.jpg', 'verified'),
(46, 'Zul', 'Perak', 'zul@gmail.com', '$2y$10$6aHiJG4CEO9tyPpjlm3WROUX.o1e6y0uASgV6CtZMVueVn9ycRQeW', '60175904739', 'borang9.jpg', 'verified'),
(47, 'Madam Ummu', 'Kuala Terengganu', 'madamummu@gmail.com', '$2y$10$gXP0QDs5RSNOC.OL9oeDE.XdY.jC8Tp2uGo.TZZSDr1aJrRQwtuJa', '60194625258', 'borang9.jpg', 'verified'),
(48, 'FARHAN ZIKRY BIN AHMAD RAZIF', 'NO 8 JALAN TANGSI 19/25', 'farhanzikry43@gmail.com', '$2y$10$aBHJmtYEdotLAHk3nr5EweLPmYejXA/eRqO2H7LD7h.hbC55j1sOS', '0126950652', 'nasi tomato.jpg', 'unverified'),
(49, 'farha', 'shah alam', 'far@gmail.com', '$2y$10$VkgpvQRu6c/6lo1L85oY7.9acBFojxetyfKSr9YsLxPcOAZORQY0u', '0126059652', 'breaking news.jpg', 'verified'),
(50, 'saiful zuhairi', 'PARIT 3 KAMPUNG SUNGAI PERGAM, we', 'zsaiful98@gmail.com', '$2y$10$DSUJzLtUhU/AqR7a6XV/C.8JE48zm5nWP/GVFEdmHh8VmCIUBqstS', '0136612330', '', 'verified');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_username` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_deposit` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_username`, `user_pass`, `user_deposit`) VALUES
(1, 'ali', 'ali', 641.32),
(2, 'faziatulakma', 'faziatulakma', 327.04);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `field`
--
ALTER TABLE `field`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`p_id`);

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
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=273;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `student_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `field`
--
ALTER TABLE `field`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

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
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
