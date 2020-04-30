-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2018 at 10:29 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eclabdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `firstname` tinytext NOT NULL,
  `surname` tinytext NOT NULL,
  `title` tinytext NOT NULL,
  `address` text NOT NULL,
  `phone` tinytext NOT NULL,
  `email` tinytext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `firstname`, `surname`, `title`, `address`, `phone`, `email`) VALUES
(1, 'Hans', 'Jones', 'Teacher', 'The road 1', '1234567', 'hjo@du.se'),
(2, 'Hans Edy', 'Mårtensson', 'Teacher', 'The road 2', '7654321', 'hem@du.se'),
(3, 'Jerker', 'Westin', 'Doctor', 'The road 3', '1234321', 'jwe@du.se');

-- --------------------------------------------------------

--
-- Table structure for table `example`
--

CREATE TABLE `example` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price_myr` double(10,2) NOT NULL,
  `price_usd` double(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fr_star`
--

CREATE TABLE `fr_star` (
  `id` int(11) NOT NULL,
  `rate_id` varchar(40) NOT NULL,
  `user_id` varchar(40) NOT NULL,
  `rate` float NOT NULL,
  `rated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fr_star`
--

INSERT INTO `fr_star` (`id`, `rate_id`, `user_id`, `rate`, `rated`) VALUES
(1, 'index_page', '999', 3, '2017-04-16 04:49:34');

-- --------------------------------------------------------

--
-- Table structure for table `maybank2u`
--

CREATE TABLE `maybank2u` (
  `id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `balance` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maybank2u`
--

INSERT INTO `maybank2u` (`id`, `username`, `password`, `name`, `balance`) VALUES
(1, 'testing', 'testing123', 'testing', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(255) DEFAULT NULL,
  `total_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `datetime`, `status`, `total_price`) VALUES
(1, 12, '2017-11-26 06:27:22', 'paid', 8187),
(2, 12, '2018-04-10 04:50:48', 'paid', 300),
(3, 12, '2018-04-10 05:00:32', 'unpaid', 300),
(4, 12, '2018-04-10 05:39:04', 'unpaid', 9300),
(5, 12, '2018-04-10 05:39:31', 'unpaid', 10500),
(6, 12, '2018-04-10 05:41:07', 'unpaid', 10500),
(7, 12, '2018-04-10 05:42:46', 'unpaid', 11300),
(8, 12, '2018-04-10 05:51:11', 'unpaid', 11300),
(9, 12, '2018-04-10 05:51:19', 'paid', 11300),
(10, 12, '2018-04-15 03:36:36', 'unpaid', 600),
(11, 12, '2018-04-17 05:58:35', 'unpaid', 1500),
(12, 12, '2018-04-17 05:58:43', 'unpaid', 1500),
(13, 12, '2018-04-24 06:12:56', 'unpaid', 1500),
(14, 12, '2018-04-24 06:13:09', 'paid', 3000),
(15, 12, '2018-05-06 02:14:24', 'paid', 2300),
(16, 12, '2018-05-06 02:27:58', 'paid', 1100),
(17, 12, '2018-05-06 03:01:04', 'paid', 8887),
(18, 12, '2018-05-06 03:05:48', 'unpaid', 8887),
(19, 12, '2018-05-06 03:33:03', 'unpaid', 8887),
(20, 12, '2018-05-06 03:50:17', 'paid', 5600),
(21, 12, '2018-10-08 02:47:43', 'paid', 3587);

-- --------------------------------------------------------

--
-- Table structure for table `ordersdetails`
--

CREATE TABLE `ordersdetails` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'processed'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordersdetails`
--

INSERT INTO `ordersdetails` (`id`, `order_id`, `product_id`, `price`, `quantity`, `customer_id`, `status`) VALUES
(1, 1, 'USB02', 800, 5, 12, 'processed'),
(2, 1, 'wristWear03', 300, 1, 12, 'processed'),
(3, 1, 'calc2007', 87, 1, 12, 'processed'),
(4, 1, 'S8100', 3800, 1, 12, 'processed'),
(5, 2, 'wristWear03', 300, 1, 12, 'processed'),
(6, 3, 'wristWear03', 300, 1, 12, 'processed'),
(7, 4, '3DcAM01', 1500, 1, 12, 'processed'),
(8, 4, 'USB02', 800, 5, 12, 'processed'),
(9, 4, 'wristWear03', 300, 1, 12, 'processed'),
(10, 4, 'comp123', 3500, 1, 12, 'processed'),
(11, 5, '3DcAM01', 1500, 1, 12, 'processed'),
(12, 5, 'USB02', 800, 5, 12, 'processed'),
(13, 5, 'wristWear03', 300, 5, 12, 'processed'),
(14, 5, 'comp123', 3500, 1, 12, 'processed'),
(15, 6, '3DcAM01', 1500, 1, 12, 'processed'),
(16, 6, 'USB02', 800, 5, 12, 'processed'),
(17, 6, 'wristWear03', 300, 5, 12, 'processed'),
(18, 6, 'comp123', 3500, 1, 12, 'processed'),
(19, 7, '3DcAM01', 1500, 1, 12, 'processed'),
(20, 7, 'USB02', 800, 6, 12, 'processed'),
(21, 7, 'wristWear03', 300, 5, 12, 'processed'),
(22, 7, 'comp123', 3500, 1, 12, 'processed'),
(23, 8, '3DcAM01', 1500, 1, 12, 'processed'),
(24, 8, 'USB02', 800, 6, 12, 'processed'),
(25, 8, 'wristWear03', 300, 5, 12, 'processed'),
(26, 8, 'comp123', 3500, 1, 12, 'processed'),
(27, 9, '3DcAM01', 1500, 1, 12, 'processed'),
(28, 9, 'USB02', 800, 6, 12, 'processed'),
(29, 9, 'wristWear03', 300, 5, 12, 'processed'),
(30, 9, 'comp123', 3500, 1, 12, 'processed'),
(31, 10, 'wristWear03', 300, 2, 12, 'processed'),
(32, 11, '3DcAM01', 1500, 1, 12, 'processed'),
(33, 12, '3DcAM01', 1500, 1, 12, 'processed'),
(34, 13, '3DcAM01', 1500, 1, 12, 'processed'),
(35, 14, '3DcAM01', 1500, 2, 12, 'shipped'),
(36, 15, 'USB02', 800, 1, 12, 'processed'),
(37, 15, '3DcAM01', 1500, 1, 12, 'processed'),
(38, 16, 'USB02', 800, 1, 12, 'processed'),
(39, 16, 'wristWear03', 300, 1, 12, 'processed'),
(40, 17, 'USB02', 800, 1, 12, 'processed'),
(41, 17, 'wristWear03', 300, 1, 12, 'shipped'),
(42, 17, 'calc2007', 87, 1, 12, 'processed'),
(43, 17, 'comp123', 3500, 1, 12, 'processed'),
(44, 17, 'ip7', 4200, 1, 12, 'processed'),
(45, 18, 'USB02', 800, 1, 12, 'processed'),
(46, 18, 'wristWear03', 300, 1, 12, 'processed'),
(47, 18, 'calc2007', 87, 1, 12, 'processed'),
(48, 18, 'comp123', 3500, 1, 12, 'processed'),
(49, 18, 'ip7', 4200, 1, 12, 'processed'),
(50, 19, 'USB02', 800, 1, 12, 'processed'),
(51, 19, 'wristWear03', 300, 1, 12, 'shipped'),
(52, 19, 'calc2007', 87, 1, 12, 'processed'),
(53, 19, 'comp123', 3500, 1, 12, 'processed'),
(54, 19, 'ip7', 4200, 1, 12, 'processed'),
(55, 20, 'S8100', 3800, 1, 12, 'processed'),
(56, 20, 'wristWear03', 300, 1, 12, 'processed'),
(57, 20, '3DcAM01', 1500, 1, 12, 'shipped'),
(58, 21, 'comp123', 3500, 1, 12, 'processed'),
(59, 21, 'calc2007', 87, 1, 12, 'processed');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `method` varchar(255) NOT NULL,
  `amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='track record payment transaction';

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `order_id`, `datetime`, `method`, `amount`) VALUES
(1, 1, '2017-11-26 06:28:14', 'online', 8187),
(2, 2, '2018-04-10 04:50:56', 'online', 300),
(3, 9, '2018-04-10 05:56:13', 'online', 11300),
(4, 14, '2018-04-24 06:13:19', 'online', 3000),
(5, 15, '2018-05-06 02:14:32', 'online', 2300),
(6, 16, '2018-05-06 02:28:34', 'online', 1100),
(7, 17, '2018-05-06 03:01:12', 'online', 8887),
(8, 17, '2018-05-06 03:01:35', 'online', 8887),
(9, 17, '2018-05-06 03:06:21', 'online', 8887),
(10, 17, '2018-05-06 03:33:00', 'online', 8887),
(11, 17, '2018-05-06 03:37:36', 'online', 8887),
(12, 20, '2018-05-06 03:50:28', 'online', 5600),
(13, 21, '2018-10-08 02:47:56', 'online', 3587);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price_myr` double(10,2) NOT NULL,
  `price_usd` double(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `code`, `image`, `price_myr`, `price_usd`) VALUES
(1, '3D Camera', '3DcAM01', 'product-images/camera.jpg', 1500.00, 3000.00),
(2, 'External Hard Drive', 'USB02', 'product-images/external-hard-drive.jpg', 800.00, NULL),
(3, 'Wrist Watch', 'wristWear03', 'product-images/watch.jpg', 300.00, NULL),
(4, 'botol air', 'botol_1234', 'images/botolsusu.jpg', 30.00, 120.00);

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `firstname` tinytext NOT NULL,
  `surname` tinytext NOT NULL,
  `title` tinytext NOT NULL,
  `address` text NOT NULL,
  `phone` tinytext NOT NULL,
  `email` tinytext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`id`, `firstname`, `surname`, `title`, `address`, `phone`, `email`) VALUES
(1, 'Hans', 'Jones', 'Teacher', 'The road 1', '1234567', 'hjo@du.se'),
(2, 'Hans Edy', 'Mårtensson', 'Teacher', 'The road 2', '7654321', 'hem@du.se'),
(3, 'Jerker', 'Westin', 'Doctor', 'The road 3', '1234321', 'jwe@du.se'),
(12, 'Jerker', 'Westin', 'Doctor', 'The road 3', '1234321', 'jwe@du.se');

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL,
  `sellerid` int(12) DEFAULT NULL,
  `quantity` int(12) NOT NULL DEFAULT '50'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`id`, `name`, `code`, `image`, `price`, `sellerid`, `quantity`) VALUES
(1, '3D Camera', '3DcAM01', 'product-images/camera.jpg', 1500.00, 12, 50),
(2, 'External Hard Drive', 'USB02', 'product-images/external-hard-drive.jpg', 800.00, NULL, 50),
(3, 'Wrist Watch', 'wristWear03', 'product-images/watch.jpg', 300.00, 12, 50),
(4, 'Computer', 'comp123', 'product-images/computer.png', 3500.00, NULL, 50),
(6, 'Calculator', 'calc2007', 'product-images/calculator.jpg', 87.00, NULL, 50),
(7, 'I Phone 7', 'ip7', 'product-images/iphone.jpg', 4200.00, NULL, 50),
(8, 'NES Station', 'NES200', 'product-images/nes.jpg', 540.00, NULL, 50),
(9, 'Samsung Galaxy S8', 'S8100', 'product-images/s8.jpg', 3800.00, NULL, 50),
(10, 'NAS Storage', 'NAS2000', 'product-images/nas.jpeg', 1500.00, NULL, 50),
(11, '4G WIFI', 'WifiModem001', 'product-images/modem.jpg', 600.00, NULL, 50),
(12, 'Notebook', 'notebook200', 'product-images/notebook.jpeg', 2800.00, NULL, 50),
(13, 'Pendrive 8GB', '8GB0001', 'product-images/pendrive.jpg', 18.00, NULL, 50),
(14, 'PlayStation 4', 'PS42300', 'product-images/ps4.jpg', 1020.00, 12, 50),
(15, 'RAM DDR4 16GB', 'DDR416GB003', 'product-images/ram.jpg', 160.00, 12, 50);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(12) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wsadvancedchat`
--

CREATE TABLE `wsadvancedchat` (
  `id` int(11) NOT NULL,
  `user` varchar(20) NOT NULL,
  `msg` varchar(100) NOT NULL,
  `type` varchar(10) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `posted` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wsmessages`
--

CREATE TABLE `wsmessages` (
  `name` varchar(20) NOT NULL,
  `msg` text NOT NULL,
  `posted` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `example`
--
ALTER TABLE `example`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`code`);

--
-- Indexes for table `fr_star`
--
ALTER TABLE `fr_star`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maybank2u`
--
ALTER TABLE `maybank2u`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordersdetails`
--
ALTER TABLE `ordersdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`code`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`code`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wsadvancedchat`
--
ALTER TABLE `wsadvancedchat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `example`
--
ALTER TABLE `example`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fr_star`
--
ALTER TABLE `fr_star`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `maybank2u`
--
ALTER TABLE `maybank2u`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `ordersdetails`
--
ALTER TABLE `ordersdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wsadvancedchat`
--
ALTER TABLE `wsadvancedchat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
