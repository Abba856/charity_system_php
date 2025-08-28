-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2019 at 10:52 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `stock`
--
CREATE DATABASE IF NOT EXISTS `stock` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `stock`;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
  `brand_id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(255) NOT NULL,
  `brand_active` int(11) NOT NULL DEFAULT '0',
  `brand_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `brand_active`, `brand_status`) VALUES
(1, 'Gap', 1, 2),
(2, 'Forever 21', 1, 2),
(3, 'Gap', 1, 2),
(4, 'Forever 21', 1, 2),
(5, 'Adidas', 1, 2),
(6, 'Gap', 1, 2),
(7, 'Forever 21', 1, 2),
(8, 'Adidas', 1, 2),
(9, 'Gap', 1, 2),
(10, 'Forever 21', 1, 2),
(11, 'Adidas', 1, 1),
(12, 'Gap', 1, 1),
(13, 'Forever 21', 1, 1),
(14, 'BlueBand', 1, 1),
(15, 'MAGGI', 1, 1),
(16, 'Fruits', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cashier`
--

CREATE TABLE IF NOT EXISTS `cashier` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cashier`
--

INSERT INTO `cashier` (`userId`, `username`, `password`) VALUES
(1, 'cashier', 'bcaa8809b720d26b9b1eea432bd50fff');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `categories_id` int(11) NOT NULL AUTO_INCREMENT,
  `categories_name` varchar(255) NOT NULL,
  `categories_active` int(11) NOT NULL DEFAULT '0',
  `categories_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`categories_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categories_id`, `categories_name`, `categories_active`, `categories_status`) VALUES
(1, 'Sports ', 1, 2),
(2, 'Casual', 1, 2),
(3, 'Casual', 1, 2),
(4, 'Sport', 1, 2),
(5, 'Casual', 1, 2),
(6, 'Sport wear', 1, 2),
(7, 'Casual wear', 1, 1),
(8, 'Sports ', 1, 1),
(9, 'Creams', 1, 1),
(10, 'Fruits', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_date` date NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `client_contact` varchar(255) NOT NULL,
  `sub_total` varchar(255) NOT NULL,
  `vat` varchar(255) NOT NULL,
  `total_amount` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `grand_total` varchar(255) NOT NULL,
  `paid` varchar(255) NOT NULL,
  `due` varchar(255) NOT NULL,
  `payment_type` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `order_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `client_name`, `client_contact`, `sub_total`, `vat`, `total_amount`, `discount`, `grand_total`, `paid`, `due`, `payment_type`, `payment_status`, `order_status`) VALUES
(1, '2016-07-15', 'John Doe', '9807867564', '2700.00', '351.00', '3051.00', '1000.00', '2051.00', '1000.00', '1051.00', 2, 2, 2),
(2, '2016-07-15', 'John Doe', '9808746573', '3400.00', '442.00', '3842.00', '500.00', '3342.00', '3342', '0', 2, 1, 2),
(3, '2016-07-16', 'John Doe', '9809876758', '3600.00', '468.00', '4068.00', '568.00', '3500.00', '3500', '0', 2, 1, 2),
(4, '2016-08-01', 'Indra', '19208130', '1200.00', '156.00', '1356.00', '1000.00', '356.00', '356', '0.00', 2, 1, 2),
(5, '2016-07-16', 'John Doe', '9808767689', '3600.00', '468.00', '4068.00', '500.00', '3568.00', '3568', '0', 2, 1, 1),
(6, '2019-10-20', 'lamin', '090928776543', '1200.00', '156.00', '1356.00', '5', '1351.00', '12000', '-10649.00', 2, 1, 1),
(7, '2019-10-21', 'lamin', '897654', '10800.00', '1404.00', '12204.00', '50', '12154.00', '1200', '10954.00', 2, 1, 1),
(8, '2019-10-20', 'LAMIN', '098765432', '10800.00', '1404.00', '12204.00', '70', '12134.00', '9000', '3134.00', 2, 1, 1),
(9, '2019-10-20', 'gift', '9876543', '24000.00', '3120.00', '27120.00', '765', '26355.00', '0987654', '-961299.00', 2, 1, 1),
(10, '2019-11-02', 'mohammad shamsudeen idris', '09039531982', '4000.00', '520.00', '4520.00', '20', '4500.00', '4000', '500.00', 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE IF NOT EXISTS `order_item` (
  `order_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL DEFAULT '0',
  `product_id` int(11) NOT NULL DEFAULT '0',
  `quantity` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `order_item_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`order_item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`order_item_id`, `order_id`, `product_id`, `quantity`, `rate`, `total`, `order_item_status`) VALUES
(1, 1, 1, '1', '1500', '1500.00', 2),
(2, 1, 2, '1', '1200', '1200.00', 2),
(3, 2, 3, '2', '1200', '2400.00', 2),
(4, 2, 4, '1', '1000', '1000.00', 2),
(5, 3, 5, '2', '1200', '2400.00', 2),
(6, 3, 6, '1', '1200', '1200.00', 2),
(7, 4, 5, '1', '1200', '1200.00', 2),
(8, 5, 7, '2', '1200', '2400.00', 1),
(9, 5, 8, '1', '1200', '1200.00', 1),
(10, 6, 8, '1', '1200', '1200.00', 1),
(11, 7, 8, '9', '1200', '10800.00', 1),
(12, 8, 7, '9', '1200', '10800.00', 1),
(13, 9, 7, '20', '1200', '24000.00', 1),
(14, 10, 13, '1', '4000', '4000.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) NOT NULL,
  `product_image` text NOT NULL,
  `brand_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_image`, `brand_id`, `categories_id`, `quantity`, `rate`, `active`, `status`) VALUES
(1, 'Half pant', '../assests/images/stock/2847957892502c7200.jpg', 1, 2, '19', '1500', 2, 2),
(2, 'T-Shirt', '../assests/images/stock/163965789252551575.jpg', 2, 2, '9', '1200', 2, 2),
(3, 'Half Pant', '../assests/images/stock/13274578927924974b.jpg', 5, 3, '18', '1200', 2, 2),
(4, 'T-Shirt', '../assests/images/stock/12299578927ace94c5.jpg', 6, 3, '29', '1000', 2, 2),
(5, 'Half Pant', '../assests/images/stock/24937578929c13532e.jpg', 8, 5, '17', '1200', 2, 2),
(6, 'Polo T-Shirt', '../assests/images/stock/10222578929f733dbf.jpg', 9, 5, '29', '1200', 2, 2),
(7, 'Half Pant', '../assests/images/stock/1770257893463579bf.jpg', 11, 7, '-1', '1200', 1, 1),
(8, 'Polo T-shirt', '../assests/images/stock/136715789347d1aea6.jpg', 12, 7, '-1', '1200', 1, 1),
(9, 'Blue Band', '../assests/images/stock/323245dbd9ed3b89b4.jpg', 14, 9, '50', '250', 1, 1),
(10, 'cabin', '../assests/images/stock/110535dbd9eed054a3.jpg', 14, 9, '40', '150', 1, 1),
(11, 'fghjkl', '../assests/images/stock/302785dbde2c77fbc4.jpg', 16, 10, '50', '2000', 1, 1),
(12, 'fghjk', '../assests/images/stock/245835dbde2ddca062.jpg', 16, 10, '55', '500', 2, 1),
(13, 'trouser', '../assests/images/stock/136205dbde2f9cf6e6.jpg', 11, 7, '29', '4000', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE IF NOT EXISTS `register` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `addr` varchar(100) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `isAdmin` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`user_id`, `firstname`, `lastname`, `email`, `addr`, `contact`, `password`, `isAdmin`) VALUES
(10, 'uio', 'ghjk', 'eldeen@gmail.com', 'tgyhujik', '0', 'bcaa8809b720d26b9b1eea432bd50fff', 0),
(11, 'ghjk', 'hjkkjhg', 'shamsu@gmail.com', 'vcxz', '0', '83476316a972856163fb987b861a0a2c', 1),
(12, 'abubakar', 'alhassan', 'aalhassan222@yahoo.com', 'buk new site', '2147483647', '30d55f1df7a51e9d4d3cb74afa2b7d0f', 0),
(13, 'abubakar', 'sani', 'binta000@yahoo.com', 'minna', '2039404', 'f64b8ce828db01afa7bc1dc3261f3832', 1),
(14, 'ismail', 'idris', 'eldeen1@gmail.com', 'buk', '2147483647', 'bcaa8809b720d26b9b1eea432bd50fff', 1),
(15, 'ahmed', 'idris', 'idris@gmail.com', 'buk', '09039531982', 'bcaa8809b720d26b9b1eea432bd50fff', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `isAdmin` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `isAdmin`) VALUES
(1, 'admin', 'bcaa8809b720d26b9b1eea432bd50fff', '', 1),
(2, 'cashier', 'bcaa8809b720d26b9b1eea432bd50fff', '', 0),
(3, 'dinillah', 'dinillah', '', 0),
(4, 'dinillah', 'bcaa8809b720d26b9b1eea432bd50fff', '', 0),
(33, 'sdfghjkl', 'a215b0a8fe5fe544fbe987f5e15fc256', '', 1),
(34, '', 'd41d8cd98f00b204e9800998ecf8427e', '', 1),
(35, '', 'd41d8cd98f00b204e9800998ecf8427e', '', 1),
(36, '', 'd41d8cd98f00b204e9800998ecf8427e', '', 1),
(37, '', 'd41d8cd98f00b204e9800998ecf8427e', '', 1),
(38, '', 'd41d8cd98f00b204e9800998ecf8427e', '', 1),
(39, '', 'd41d8cd98f00b204e9800998ecf8427e', '', 1),
(40, '', 'd41d8cd98f00b204e9800998ecf8427e', '', 1),
(41, '', 'd41d8cd98f00b204e9800998ecf8427e', '', 1),
(42, '', 'd41d8cd98f00b204e9800998ecf8427e', '', 1),
(43, '', 'd41d8cd98f00b204e9800998ecf8427e', '', 1),
(44, '', 'd41d8cd98f00b204e9800998ecf8427e', '', 1),
(45, 'mohammad', 'bcaa8809b720d26b9b1eea432bd50fff', '', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
