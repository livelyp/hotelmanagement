-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2020 at 09:23 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cpsc471-hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `amenity`
--

CREATE TABLE `amenity` (
  `Number` smallint(5) UNSIGNED NOT NULL,
  `Type` char(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `amenity_used`
--

CREATE TABLE `amenity_used` (
  `Customer_id` smallint(5) UNSIGNED NOT NULL,
  `Number` smallint(5) UNSIGNED NOT NULL,
  `Type` char(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cancel`
--

CREATE TABLE `cancel` (
  `Reservation_id` smallint(5) UNSIGNED NOT NULL,
  `Customer_id` smallint(5) UNSIGNED NOT NULL,
  `Cancellation_id` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Customer_id` smallint(5) UNSIGNED NOT NULL,
  `Phone` varchar(11) NOT NULL,
  `Fname` char(60) NOT NULL,
  `Lname` char(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Employee_id` smallint(5) UNSIGNED NOT NULL,
  `Name` char(60) NOT NULL,
  `Phone` char(11) NOT NULL,
  `Position` char(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `Customer_id` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `managed_amenity`
--

CREATE TABLE `managed_amenity` (
  `Number` smallint(5) UNSIGNED NOT NULL,
  `Type` char(60) NOT NULL,
  `Employee_id` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `managed_room`
--

CREATE TABLE `managed_room` (
  `Type_id` smallint(5) UNSIGNED NOT NULL,
  `Room_num` smallint(6) NOT NULL,
  `Employee_id` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `Employee_id` smallint(5) UNSIGNED NOT NULL,
  `Username` char(60) NOT NULL,
  `Pword` char(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `Customer_id` smallint(5) UNSIGNED NOT NULL,
  `Username` char(60) NOT NULL,
  `Pword` char(60) NOT NULL,
  `Points` char(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `Reservation_id` smallint(5) UNSIGNED NOT NULL,
  `Customer_id` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payment_amount`
--

CREATE TABLE `payment_amount` (
  `Reservation_id` smallint(5) UNSIGNED NOT NULL,
  `Customer_id` smallint(5) UNSIGNED NOT NULL,
  `Amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payment_type`
--

CREATE TABLE `payment_type` (
  `Reservation_id` smallint(5) UNSIGNED NOT NULL,
  `Customer_id` smallint(5) UNSIGNED NOT NULL,
  `Type` enum('CASH','CARD','CHEQUE') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pays`
--

CREATE TABLE `pays` (
  `Mgr_id` smallint(5) UNSIGNED NOT NULL,
  `Employee_id` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `Reservation_id` smallint(5) UNSIGNED NOT NULL,
  `Arrival_date` date NOT NULL,
  `Checkout_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reserved_rooms`
--

CREATE TABLE `reserved_rooms` (
  `Reservation_id` smallint(5) UNSIGNED NOT NULL,
  `Type_id` smallint(5) UNSIGNED NOT NULL,
  `Room_num` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `Type_id` smallint(5) UNSIGNED NOT NULL,
  `Room_num` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `room_type`
--

CREATE TABLE `room_type` (
  `Type_id` smallint(5) UNSIGNED NOT NULL,
  `Room_price` int(11) NOT NULL,
  `Total_rooms` int(11) NOT NULL,
  `Type` char(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `Employee_id` smallint(5) UNSIGNED NOT NULL,
  `Amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `Employee_id` smallint(5) UNSIGNED NOT NULL,
  `Mgr_id` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amenity`
--
ALTER TABLE `amenity`
  ADD PRIMARY KEY (`Number`,`Type`);

--
-- Indexes for table `amenity_used`
--
ALTER TABLE `amenity_used`
  ADD PRIMARY KEY (`Customer_id`,`Number`,`Type`),
  ADD KEY `Number` (`Number`,`Type`);

--
-- Indexes for table `cancel`
--
ALTER TABLE `cancel`
  ADD PRIMARY KEY (`Cancellation_id`),
  ADD KEY `Reservation_id` (`Reservation_id`),
  ADD KEY `Customer_id` (`Customer_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Customer_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Employee_id`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`Customer_id`);

--
-- Indexes for table `managed_amenity`
--
ALTER TABLE `managed_amenity`
  ADD PRIMARY KEY (`Number`,`Type`,`Employee_id`),
  ADD KEY `Employee_id` (`Employee_id`);

--
-- Indexes for table `managed_room`
--
ALTER TABLE `managed_room`
  ADD PRIMARY KEY (`Type_id`,`Room_num`,`Employee_id`),
  ADD KEY `Employee_id` (`Employee_id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`Employee_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`Customer_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`Reservation_id`,`Customer_id`),
  ADD KEY `Customer_id` (`Customer_id`);

--
-- Indexes for table `payment_amount`
--
ALTER TABLE `payment_amount`
  ADD PRIMARY KEY (`Reservation_id`,`Customer_id`),
  ADD KEY `Customer_id` (`Customer_id`);

--
-- Indexes for table `payment_type`
--
ALTER TABLE `payment_type`
  ADD PRIMARY KEY (`Reservation_id`,`Customer_id`),
  ADD KEY `Customer_id` (`Customer_id`);

--
-- Indexes for table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`Mgr_id`,`Employee_id`),
  ADD KEY `Employee_id` (`Employee_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`Reservation_id`);

--
-- Indexes for table `reserved_rooms`
--
ALTER TABLE `reserved_rooms`
  ADD PRIMARY KEY (`Reservation_id`,`Type_id`,`Room_num`),
  ADD KEY `Type_id` (`Type_id`,`Room_num`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`Type_id`,`Room_num`);

--
-- Indexes for table `room_type`
--
ALTER TABLE `room_type`
  ADD PRIMARY KEY (`Type_id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`Employee_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`Employee_id`),
  ADD KEY `Mgr_id` (`Mgr_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cancel`
--
ALTER TABLE `cancel`
  MODIFY `Cancellation_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Customer_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `Reservation_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room_type`
--
ALTER TABLE `room_type`
  MODIFY `Type_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `amenity_used`
--
ALTER TABLE `amenity_used`
  ADD CONSTRAINT `amenity_used_ibfk_1` FOREIGN KEY (`Customer_id`) REFERENCES `customer` (`Customer_id`),
  ADD CONSTRAINT `amenity_used_ibfk_2` FOREIGN KEY (`Number`,`Type`) REFERENCES `amenity` (`Number`, `Type`);

--
-- Constraints for table `cancel`
--
ALTER TABLE `cancel`
  ADD CONSTRAINT `cancel_ibfk_1` FOREIGN KEY (`Reservation_id`) REFERENCES `reservation` (`Reservation_id`),
  ADD CONSTRAINT `cancel_ibfk_2` FOREIGN KEY (`Customer_id`) REFERENCES `customer` (`Customer_id`);

--
-- Constraints for table `guest`
--
ALTER TABLE `guest`
  ADD CONSTRAINT `guest_ibfk_1` FOREIGN KEY (`Customer_id`) REFERENCES `customer` (`Customer_id`);

--
-- Constraints for table `managed_amenity`
--
ALTER TABLE `managed_amenity`
  ADD CONSTRAINT `managed_amenity_ibfk_1` FOREIGN KEY (`Number`,`Type`) REFERENCES `amenity` (`Number`, `Type`),
  ADD CONSTRAINT `managed_amenity_ibfk_2` FOREIGN KEY (`Employee_id`) REFERENCES `employee` (`Employee_id`);

--
-- Constraints for table `managed_room`
--
ALTER TABLE `managed_room`
  ADD CONSTRAINT `managed_room_ibfk_1` FOREIGN KEY (`Type_id`,`Room_num`) REFERENCES `room` (`Type_id`, `Room_num`),
  ADD CONSTRAINT `managed_room_ibfk_2` FOREIGN KEY (`Employee_id`) REFERENCES `employee` (`Employee_id`);

--
-- Constraints for table `manager`
--
ALTER TABLE `manager`
  ADD CONSTRAINT `manager_ibfk_1` FOREIGN KEY (`Employee_id`) REFERENCES `employee` (`Employee_id`);

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`Customer_id`) REFERENCES `customer` (`Customer_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`Reservation_id`) REFERENCES `reservation` (`Reservation_id`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`Customer_id`) REFERENCES `customer` (`Customer_id`);

--
-- Constraints for table `payment_amount`
--
ALTER TABLE `payment_amount`
  ADD CONSTRAINT `payment_amount_ibfk_1` FOREIGN KEY (`Reservation_id`) REFERENCES `reservation` (`Reservation_id`),
  ADD CONSTRAINT `payment_amount_ibfk_2` FOREIGN KEY (`Customer_id`) REFERENCES `customer` (`Customer_id`);

--
-- Constraints for table `payment_type`
--
ALTER TABLE `payment_type`
  ADD CONSTRAINT `payment_type_ibfk_1` FOREIGN KEY (`Reservation_id`) REFERENCES `reservation` (`Reservation_id`),
  ADD CONSTRAINT `payment_type_ibfk_2` FOREIGN KEY (`Customer_id`) REFERENCES `customer` (`Customer_id`);

--
-- Constraints for table `pays`
--
ALTER TABLE `pays`
  ADD CONSTRAINT `pays_ibfk_1` FOREIGN KEY (`Mgr_id`) REFERENCES `manager` (`Employee_id`),
  ADD CONSTRAINT `pays_ibfk_2` FOREIGN KEY (`Employee_id`) REFERENCES `employee` (`Employee_id`);

--
-- Constraints for table `reserved_rooms`
--
ALTER TABLE `reserved_rooms`
  ADD CONSTRAINT `reserved_rooms_ibfk_1` FOREIGN KEY (`Reservation_id`) REFERENCES `reservation` (`Reservation_id`),
  ADD CONSTRAINT `reserved_rooms_ibfk_2` FOREIGN KEY (`Type_id`,`Room_num`) REFERENCES `room` (`Type_id`, `Room_num`);

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`Type_id`) REFERENCES `room_type` (`Type_id`);

--
-- Constraints for table `salary`
--
ALTER TABLE `salary`
  ADD CONSTRAINT `salary_ibfk_1` FOREIGN KEY (`Employee_id`) REFERENCES `employee` (`Employee_id`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`Mgr_id`) REFERENCES `manager` (`Employee_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
