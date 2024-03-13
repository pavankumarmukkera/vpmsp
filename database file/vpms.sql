-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2023 at 07:15 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vpms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mobile` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `mobile`) VALUES
(1, 'Admin user', 'admin@gmail.com', 'Admin@123', 9898989899);

-- --------------------------------------------------------

--
-- Table structure for table `parking_history`
--

CREATE TABLE `parking_history` (
  `id` int(11) NOT NULL,
  `vehical_no` varchar(25) NOT NULL,
  `in_date` timestamp NULL DEFAULT current_timestamp(),
  `out_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parking_history`
--

INSERT INTO `parking_history` (`id`, `vehical_no`, `in_date`, `out_date`) VALUES
(1, 'RJ 14 EE 1456', '2023-03-14 07:31:36', '2023-04-10 10:51:17'),
(2, 'DL 28 CR 7894', '2023-03-14 08:13:17', '2023-04-09 16:19:14'),
(3, 'GH 01 3135', '2023-03-14 09:09:46', '2023-04-09 16:18:54'),
(4, 'RJ 14 EE 1456', '2023-04-10 10:47:18', '2023-04-10 10:51:17');

-- --------------------------------------------------------

--
-- Table structure for table `parking_slots`
--

CREATE TABLE `parking_slots` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parking_slots`
--

INSERT INTO `parking_slots` (`id`, `name`, `capacity`) VALUES
(1, 'Slot 1', 10),
(3, 'Slot 2', 15),
(4, 'Slot 3', 10);

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `id` int(11) NOT NULL,
  `vehical_type` varchar(25) NOT NULL,
  `rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rates`
--

INSERT INTO `rates` (`id`, `vehical_type`, `rate`) VALUES
(1, 'Two Wheeler', 10),
(4, 'Four Wheeler', 15);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mobile` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `mobile`) VALUES
(1, 'Hemant Kumar', 'hemant@gmail.com', 'Hemant@123', 9999999999),
(2, 'Test User', 'test@gmail.com', 'Test@123', 8888888888);

-- --------------------------------------------------------

--
-- Table structure for table `vehicals`
--

CREATE TABLE `vehicals` (
  `vid` int(10) NOT NULL,
  `vehical_no` varchar(50) NOT NULL,
  `vehical_owner` varchar(100) NOT NULL,
  `owner_email` varchar(100) NOT NULL,
  `vehical_type` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicals`
--

INSERT INTO `vehicals` (`vid`, `vehical_no`, `vehical_owner`, `owner_email`, `vehical_type`, `status`) VALUES
(1, 'RJ 14 EE 1456', 'Hemant Kumar', 'hemant@gmail.com', 'Four Wheeler', 0),
(2, 'DL 28 CR 7894', 'Rohit Sharma', 'rohit@gmail.com', 'Heavy Vehical', 0),
(3, 'GH 01 3135', 'Pramod Kumar', 'pramod@gmail.com', 'Two Wheeler', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vehical_type`
--

CREATE TABLE `vehical_type` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehical_type`
--

INSERT INTO `vehical_type` (`id`, `type`) VALUES
(1, 'Two Wheeler'),
(2, 'Four Wheeler'),
(4, 'Heavy Vehical');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parking_history`
--
ALTER TABLE `parking_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parking_slots`
--
ALTER TABLE `parking_slots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicals`
--
ALTER TABLE `vehicals`
  ADD PRIMARY KEY (`vid`);

--
-- Indexes for table `vehical_type`
--
ALTER TABLE `vehical_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `parking_history`
--
ALTER TABLE `parking_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `parking_slots`
--
ALTER TABLE `parking_slots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vehicals`
--
ALTER TABLE `vehicals`
  MODIFY `vid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vehical_type`
--
ALTER TABLE `vehical_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
