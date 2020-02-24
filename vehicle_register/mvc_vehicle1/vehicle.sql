-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2020 at 09:39 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vehicle`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `addr_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `street` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip_code` bigint(255) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`addr_id`, `user_id`, `street`, `city`, `state`, `zip_code`, `country`) VALUES
(1, 1, 'Rajkot', 'Rajkot', 'Gujarat', 360003, 'India'),
(2, 2, 'vastrapur', 'ahmedabad', 'Gujarat', 380001, 'India'),
(3, 3, 'shree', 'Rajkot', 'Gujarat', 360003, 'India'),
(4, 4, 'shree', 'rajkot', 'Gujarat', 360003, 'India');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `service_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `vehicle_number` varchar(20) NOT NULL,
  `licence_number` varchar(25) NOT NULL,
  `date` varchar(15) NOT NULL,
  `slot` varchar(10) NOT NULL,
  `issue` varchar(512) NOT NULL,
  `service_center` varchar(512) NOT NULL,
  `status` varchar(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `user_id`, `title`, `vehicle_number`, `licence_number`, `date`, `slot`, `issue`, `service_center`, `status`, `created_at`) VALUES
(3, 2, 'Honda service', 'GJO3KK9889', 'ABC0101011', '02/22/2020', '10 to 11', 'mirror problem', 'zone1', 'pending', '2020-02-21 05:29:43'),
(4, 2, 'Activa service', 'GJO3KK9809', 'ABC010101', '02/22/2020', '12 to 1', 'petrol problem', 'zone1', 'completed', '2020-02-23 06:28:12'),
(5, 2, 'pulser service', 'GJO3KK9800', 'ABC010101', '02/22/2020', '10 to 11', 'bolt problem', 'zone1', 'pending', '2020-02-21 05:31:07'),
(7, 1, 'swift service', 'GJ03KK1234', 'ABC12345', '02/24/2020', '10 to 11', 'bolt problem', 'zone1', 'pending', '2020-02-21 05:50:01');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` bigint(12) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `mobile`, `password`) VALUES
(1, 'Kishan', 'Rank', 'km111@gmail.com', 9687110300, '111'),
(2, 'admin', 'cybercom', 'admin@gmail.com', 9687110300, 'admin'),
(3, 'Bhautik', 'Rank', 'bm111@gmail.com', 9687110300, '111'),
(4, 'jay', 'ramani', 'jay@gmail.com', 9966332211, '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`addr_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`),
  ADD KEY `service_ibfk_1` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `addr_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
