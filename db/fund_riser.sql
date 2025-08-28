-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2023 at 11:19 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fund_riser`
--

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `donorId` int(11) NOT NULL,
  `fullname` varchar(25) NOT NULL,
  `gender` varchar(6) NOT NULL DEFAULT 'Male',
  `phone` varchar(14) NOT NULL,
  `email` varchar(30) NOT NULL,
  `category` varchar(9) NOT NULL DEFAULT 'Sadaqat',
  `amount` varchar(9) NOT NULL,
  `status` varchar(9) NOT NULL DEFAULT 'active',
  `donationdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`donorId`, `fullname`, `gender`, `phone`, `email`, `category`, `amount`, `status`, `donationdate`) VALUES
(1, 'Umar Yusuf', 'Male', '08078787878', 'umaraaa@gmail.com', 'Sadaqat', '1000', 'active', '2023-01-07 22:11:13'),
(2, 'Ayuba Hamisu', 'Male', '08029338116', 'ayubahamisu87@mail.com', 'Gift', '10000', 'active', '2023-01-07 22:33:04'),
(3, 'Ayuba Hamisu', 'Male', '08029338116', 'ayubahamisu87@mail.com', 'Gift', '10000', 'active', '2023-01-07 22:33:40'),
(4, 'Ayuba Hamisu', 'Male', '08029338116', 'ayubahamisu87@mail.com', 'Gift', '10000', 'active', '2023-01-07 22:35:12'),
(5, 'Aliyu Umar Musa', 'Male', '08029338116', 'ayubahamisu87@mail.com', 'Sadaqat', '500', 'active', '2023-01-20 12:14:05'),
(6, 'Maryam usman', 'Female', '08029338116', 'rufai.garba@umyu.edu.ng', 'Sadaqat', '200', 'active', '2023-01-20 21:05:28'),
(7, 'Umar Yusuf', 'Male', '08029338116', 'umar@gmail.com', 'Gift', '2000', 'active', '2023-01-22 20:03:00'),
(8, 'Yusuf', 'Male', '0908989898', 'yusufe@gmail.com', 'Zakat', '1000', 'active', '2023-01-23 11:51:31'),
(9, 'Ibrahim Bakori', 'Male', '07067676768', 'ibrahimbkr@gmail.com', 'Sadaqat', '1000', 'active', '2023-01-24 10:59:04'),
(10, 'Abubakar Musawa', 'Male', '07067676768', 'paris@gmailcom', 'Zakat', '600', 'active', '2023-01-24 11:07:05'),
(11, 'Abubakar Musawa', 'Male', '07067676768', 'paris@gmailcom', 'Zakat', '600', 'active', '2023-01-24 15:57:43'),
(12, 'Khadija Adamu', 'Female', '08036234116', 'khadee@outlook.com', 'Zakat', '10000', 'active', '2023-01-24 17:28:58');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `fullname` varchar(25) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `rank` varchar(5) NOT NULL DEFAULT 'User',
  `status` varchar(9) NOT NULL DEFAULT 'Active',
  `regdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `fullname`, `username`, `password`, `rank`, `status`, `regdate`) VALUES
(3, 'Ahmad Lawal', 'ahmad', '$2y$10$AOvX4duC509gN7i1OzlDouSmYYaB/8anj1rKG6Soonwn7ben0kPH2', 'User', 'Active', '2023-01-17 17:24:24'),
(4, 'Ayuba Hamisu', 'system', '$2y$10$re6P0aah2atJ14fZZU6w/OAGcRvTkOtYDm1kOyUZAtiKxzTjxCMpK', 'Admin', 'Active', '2023-01-17 17:25:27'),
(5, 'Aliyu Umar Musa', 'aliyu', '$2y$10$Vm9JbSeJ34oYHyoh3z3Kmud7c.mvg0HEQJE2rhymvjqtK2ovAd6Ge', 'User', 'Active', '2023-01-17 17:27:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`donorId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `donorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
