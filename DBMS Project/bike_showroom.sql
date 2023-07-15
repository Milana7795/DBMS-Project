-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2023 at 11:16 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bike_showroom`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `retrieve` (IN `name` INT)  SQL SECURITY INVOKER SELECT c.fname,c.lname,p.p_amount FROM customer c,payment1 p where c.cust_id=p.cust_id$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `bike`
--

CREATE TABLE `bike` (
  `bike_id` int(11) NOT NULL,
  `VIN` varchar(50) NOT NULL,
  `engine_no` varchar(50) NOT NULL,
  `version_name` varchar(50) NOT NULL,
  `year_of_release` int(11) NOT NULL,
  `price` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bike`
--

INSERT INTO `bike` (`bike_id`, `VIN`, `engine_no`, `version_name`, `year_of_release`, `price`) VALUES
(3, '1S4PT4GK4BW603719', 'E76434', 'Electric Start', 2015, '1550000.00'),
(4, '1S4PT4GK4BW603721', 'E98235', 'Drum', 2015, '89280.00'),
(9, '1S4PT4GK6BW601936', 'E76237', 'Electric Start2', 2020, '1300000.00'),
(10, '1S4PT4GK6BW601935', 'E76567', 'kick start', 2015, '930000.00'),
(11, '1S4PT4GK6BW601690', 'E98890', 'kick start', 2010, '77000.00');

--
-- Triggers `bike`
--
DELIMITER $$
CREATE TRIGGER `delete_bike` BEFORE DELETE ON `bike` FOR EACH ROW INSERT INTO dbike
VALUES(OLD.bike_id,OLD.VIN,OLD.price)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `ubike` BEFORE UPDATE ON `bike` FOR EACH ROW INSERT INTO ubike VALUES(OLD.bike_id,OLD.version_name,OLD.price)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `book_id` int(11) NOT NULL,
  `bike_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `bdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`book_id`, `bike_id`, `cust_id`, `bdate`) VALUES
(6, 3, 11, '2023-01-21'),
(7, 4, 12, '2023-01-21'),
(8, 9, 14, '2023-01-28'),
(9, 10, 15, '2023-01-28');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `fname` varchar(10) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `cust_phone` bigint(11) NOT NULL,
  `bike_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `fname`, `lname`, `cust_phone`, `bike_id`) VALUES
(11, 'mounika', 'B', 7795134527, 3),
(12, 'milana', 'gowda', 7795146102, 4),
(14, 'akshatha', 'shinde', 9141007398, 9),
(15, 'Arun', 'T', 9448556348, 10);

-- --------------------------------------------------------

--
-- Table structure for table `dbike`
--

CREATE TABLE `dbike` (
  `bike_id` int(11) NOT NULL,
  `VIN` varchar(100) NOT NULL,
  `price` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dbike`
--

INSERT INTO `dbike` (`bike_id`, `VIN`, `price`) VALUES
(67, '1S4PT4GK4BW603897', '74000.00'),
(50, '1S4PT4GK4BW654637', '74000.00'),
(52, '1S4PT4GK6BW601945', '930000.00'),
(1, '1S4PT4GK6BW234937', '1550000.00'),
(2, '1SMCU0GX6DUB13269', '103826.00'),
(3, '2SCEC19V941152774', '113376.00'),
(4, 'KSDPBCA23C7324436', '95270.40'),
(5, 'WSUBJAFM6CA004331', '1617320.00'),
(6, '1S6AG5RX9E0111346', '132091.20'),
(7, '2SMDJ8JK8FBL31364', '958320.00'),
(8, '1SBNE31L75HA05999', '103164.00'),
(9, '1SNUKBE09AR119587', '1643939.00'),
(10, '1S1AFIFIXA7177885', '1638850.00'),
(50, '1S4PT4GK4BW6037134', '1550000.00'),
(51, '1S4PT4GK4BW603720', '74400.00'),
(6, '1S4PT4GK6BW601937', '74000.00'),
(5, '1S4PT4GK6BW601938', '745000.00'),
(8, '1S4PT4GK4BW789637', '930000.00'),
(2, '1S4PT4GK6BW601937', '88800.00'),
(7, '1S4PT4GK4BW603890', '100000.00');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `phone` bigint(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `email_id`, `phone`) VALUES
('Milana', '81DC9BDB52D04DC20036DBD8313ED055', '20e05@sdmit.in', 7795146102),
('Mounika', '81DC9BDB52D04DC20036DBD8313ED055', '20e07@sdmit.in', 8792074340),
('Pooja', '81DC9BDB52D04DC20036DBD8313ED055', '20e18@sdmit.in', 9591920160);

-- --------------------------------------------------------

--
-- Table structure for table `payment1`
--

CREATE TABLE `payment1` (
  `pay_id` int(11) NOT NULL,
  `bike_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `pay_date` date NOT NULL,
  `pay_type` varchar(50) NOT NULL,
  `p_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment1`
--

INSERT INTO `payment1` (`pay_id`, `bike_id`, `cust_id`, `pay_date`, `pay_type`, `p_amount`) VALUES
(2, 3, 11, '2023-01-21', 'cash', 1550000),
(5, 10, 15, '2023-01-28', 'cash', 930000),
(7, 9, 14, '2023-01-28', 'GPay', 1300000),
(8, 4, 12, '2023-01-26', 'cash', 89280);

-- --------------------------------------------------------

--
-- Table structure for table `ubike`
--

CREATE TABLE `ubike` (
  `bike_id` int(11) NOT NULL,
  `version_name` varchar(50) NOT NULL,
  `price` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ubike`
--

INSERT INTO `ubike` (`bike_id`, `version_name`, `price`) VALUES
(6, 'SP ', '110076.00'),
(2, 'Drum', '74000.00'),
(4, 'Drum', '74400.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bike`
--
ALTER TABLE `bike`
  ADD PRIMARY KEY (`bike_id`),
  ADD KEY `bike_id` (`bike_id`),
  ADD KEY `bike_id_2` (`bike_id`),
  ADD KEY `bike_id_3` (`bike_id`),
  ADD KEY `bike_id_4` (`bike_id`,`VIN`),
  ADD KEY `price` (`price`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `bike_id` (`bike_id`,`cust_id`),
  ADD KEY `bdate` (`bdate`),
  ADD KEY `cust_id` (`cust_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`),
  ADD KEY `bike_id` (`bike_id`),
  ADD KEY `cust_id` (`cust_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`,`password`);

--
-- Indexes for table `payment1`
--
ALTER TABLE `payment1`
  ADD PRIMARY KEY (`pay_id`),
  ADD KEY `customer_id` (`cust_id`),
  ADD KEY `bike_id` (`bike_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bike`
--
ALTER TABLE `bike`
  MODIFY `bike_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `payment1`
--
ALTER TABLE `payment1`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`),
  ADD CONSTRAINT `booking_ibfk_4` FOREIGN KEY (`bike_id`) REFERENCES `bike` (`bike_id`) ON DELETE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`bike_id`) REFERENCES `bike` (`bike_id`) ON DELETE CASCADE;

--
-- Constraints for table `payment1`
--
ALTER TABLE `payment1`
  ADD CONSTRAINT `payment1_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payment1_ibfk_2` FOREIGN KEY (`bike_id`) REFERENCES `bike` (`bike_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
