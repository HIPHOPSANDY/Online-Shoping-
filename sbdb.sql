-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2017 at 05:00 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sbdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `c_id` int(20) NOT NULL,
  `c_name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `admail` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(200) NOT NULL,
  `adid` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `c_email` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`c_id`, `c_name`, `mobile`, `admail`, `amount`, `adid`, `c_email`) VALUES
(2, 'raja', '8798654372', 'jayamdhanush@gmail.com', 1000, '5', 'jayamdhanush@gmail.com'),
(3, 'suresh', '8798654372', 'jayamdhanush@gmail.com', 1500, '5', 'jamu03031996@gmail.com'),
(4, 'rasheetha banu', '8798654372', 'jayamdhanush@gmail.com', 1500, '5', 'rashee171995@gmail.com'),
(8, 'Arun', '9875637654', 'jayamdhanush@gmail.com', 3000, '5', 'arunvinoth143@gmail.com'),
(9, 'nagaraj', '8756435678', 'jamu03031996@gmail.com', 2030, '7', 'nagaraj24@gmail.com'),
(10, 'raja', '7546384562', 'jamu03031996@gmail.com', 3400, '7', 'rajalakshmi02@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `productId` int(10) NOT NULL,
  `userId` int(10) NOT NULL,
  `companyName` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `productName` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `wight` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `userId`, `companyName`, `productName`, `image`, `price`, `wight`) VALUES
(14, 5, 'saravana stores', 'idly dosa mavu', 'product/images.jpg', 30, '1kg'),
(15, 5, 'saravana stores', 'juice', 'product/juice.jpg', 20, '100ml'),
(16, 7, 'pazhamuthir solai', 'tomato', 'product/tomato.jpg', 30, '1kg'),
(17, 7, 'pazhamuthir solai', 'apple', 'product/apple.jpg', 60, '1kg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `companyName` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `productName` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `userEmail` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `userPass` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `companyName`, `productName`, `phone`, `userEmail`, `userPass`) VALUES
(5, 'Muruga', 'saravana stores', 'foods and snacks', '9566632370', 'jayamdhanush@gmail.com', '4cc8f4d609b717356701c57a03e737e5ac8fe885da8c7163d3de47e01849c635'),
(7, 'prakash', 'pazhamuthir solai', 'fruits &amp; vegitables', '8428839003', 'jamu03031996@gmail.com', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `c_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
