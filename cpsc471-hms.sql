-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2020 at 08:09 AM
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

--
-- Dumping data for table `amenity`
--

INSERT INTO `amenity` (`Number`, `Type`) VALUES
(0, 'Swimming Pool'),
(1, 'Valet Parking'),
(123, 'Laundry');

-- --------------------------------------------------------

--
-- Table structure for table `amenity_used`
--

CREATE TABLE `amenity_used` (
  `Customer_id` smallint(5) UNSIGNED NOT NULL,
  `Number` smallint(5) UNSIGNED NOT NULL,
  `Type` char(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `amenity_used`
--

INSERT INTO `amenity_used` (`Customer_id`, `Number`, `Type`) VALUES
(1, 0, 'Swimming Pool'),
(1, 1, 'Valet Parking');

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

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Customer_id`, `Phone`, `Fname`, `Lname`) VALUES
(1, '4031234567', 'Jane', 'Doe'),
(5, '1234567', 'John', 'Doe'),
(6, '4039876', 'Bob', 'Loblaw'),
(8, '4030811367', 'Chris', 'Mitchell'),
(9, '4035031182', 'Alison', 'Smith'),
(10, '4031234567', 'John', 'Johnson'),
(12, '4035555555', 'Amy', 'Lee'),
(13, '4037777777', 'Will', 'Robinson'),
(14, '4037654321', 'Keanu', 'Reeves'),
(15, '5877777771', 'Rob', 'Loblaw');

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

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Employee_id`, `Name`, `Phone`, `Position`) VALUES
(0, 'Allan Rogers', '4031456522', 'front desk'),
(1, 'Bob Loblaw', '4031234555', 'front desk'),
(2, 'Saffiya Pasha', '4034540287', 'housekeeping'),
(10, 'Jason', 'Renoir', 'housekeeping'),
(12, 'Miguel Peralez', '4035876703', 'maintenance'),
(15, 'Cosette Favreau', '4035876703', 'housekeeping'),
(16, 'Rashmi Sidhu', '4035372467', 'maintenance'),
(20, 'Sacha Schmidt', '4036471834', 'housekeeping'),
(23, 'Wallace Mcfadden', '5873949211', 'security');

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `Customer_id` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`Customer_id`) VALUES
(14);

-- --------------------------------------------------------

--
-- Table structure for table `managed_amenity`
--

CREATE TABLE `managed_amenity` (
  `Number` smallint(5) UNSIGNED NOT NULL,
  `Type` char(60) NOT NULL,
  `Employee_id` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `managed_amenity`
--

INSERT INTO `managed_amenity` (`Number`, `Type`, `Employee_id`) VALUES
(0, 'Swimming Pool', 12),
(0, 'Swimming Pool', 16),
(1, 'Valet Parking', 12);

-- --------------------------------------------------------

--
-- Table structure for table `managed_room`
--

CREATE TABLE `managed_room` (
  `Type_id` smallint(5) UNSIGNED NOT NULL,
  `Room_num` smallint(6) NOT NULL,
  `Employee_id` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `managed_room`
--

INSERT INTO `managed_room` (`Type_id`, `Room_num`, `Employee_id`) VALUES
(0, 201, 10),
(0, 202, 10),
(0, 203, 10),
(1, 301, 15);

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `Employee_id` smallint(5) UNSIGNED NOT NULL,
  `Username` char(60) NOT NULL,
  `Pword` char(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`Employee_id`, `Username`, `Pword`) VALUES
(0, 'allanr', 'abc123'),
(2, 'saffiyap', 'Q%47Ea');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `Customer_id` smallint(5) UNSIGNED NOT NULL,
  `Username` char(60) NOT NULL,
  `Pword` char(60) NOT NULL,
  `Points` smallint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`Customer_id`, `Username`, `Pword`, `Points`) VALUES
(1, 'janedoe', 'abc123', 15),
(8, 'chrism', 'qwerty', 0),
(9, 'allisonsmith', 'sdf#dsDW', 5);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `Reservation_id` smallint(5) UNSIGNED NOT NULL,
  `Customer_id` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`Reservation_id`, `Customer_id`) VALUES
(101, 1),
(123, 8);

-- --------------------------------------------------------

--
-- Table structure for table `payment_amount`
--

CREATE TABLE `payment_amount` (
  `Reservation_id` smallint(5) UNSIGNED NOT NULL,
  `Customer_id` smallint(5) UNSIGNED NOT NULL,
  `Amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment_amount`
--

INSERT INTO `payment_amount` (`Reservation_id`, `Customer_id`, `Amount`) VALUES
(101, 1, 90),
(123, 8, 120);

-- --------------------------------------------------------

--
-- Table structure for table `payment_type`
--

CREATE TABLE `payment_type` (
  `Reservation_id` smallint(5) UNSIGNED NOT NULL,
  `Customer_id` smallint(5) UNSIGNED NOT NULL,
  `Type` enum('CASH','CARD','CHEQUE') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment_type`
--

INSERT INTO `payment_type` (`Reservation_id`, `Customer_id`, `Type`) VALUES
(101, 1, 'CARD'),
(123, 8, 'CASH');

-- --------------------------------------------------------

--
-- Table structure for table `pays`
--

CREATE TABLE `pays` (
  `Mgr_id` smallint(5) UNSIGNED NOT NULL,
  `Employee_id` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pays`
--

INSERT INTO `pays` (`Mgr_id`, `Employee_id`) VALUES
(0, 1),
(0, 12),
(2, 16);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `Reservation_id` smallint(5) UNSIGNED NOT NULL,
  `Arrival_date` date NOT NULL,
  `Checkout_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`Reservation_id`, `Arrival_date`, `Checkout_date`) VALUES
(101, '2020-12-31', '2021-01-05'),
(123, '2020-12-18', '2020-12-20'),
(213, '2021-01-15', '2021-01-22'),
(567, '2020-12-12', '2020-12-14'),
(1000, '2021-01-03', '2021-01-05'),
(1001, '2021-01-03', '2021-01-05'),
(1002, '2021-02-01', '2021-02-02');

-- --------------------------------------------------------

--
-- Table structure for table `reserved_rooms`
--

CREATE TABLE `reserved_rooms` (
  `Reservation_id` smallint(5) UNSIGNED NOT NULL,
  `Type_id` smallint(5) UNSIGNED NOT NULL,
  `Room_num` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reserved_rooms`
--

INSERT INTO `reserved_rooms` (`Reservation_id`, `Type_id`, `Room_num`) VALUES
(101, 0, 201),
(123, 3, 501);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `Type_id` smallint(5) UNSIGNED NOT NULL,
  `Room_num` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`Type_id`, `Room_num`) VALUES
(0, 201),
(0, 202),
(0, 203),
(1, 301),
(1, 302),
(1, 311),
(1, 312),
(1, 313),
(2, 416),
(2, 417),
(2, 418),
(3, 501),
(3, 502),
(4, 701),
(4, 702),
(5, 1201),
(5, 1202);

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

--
-- Dumping data for table `room_type`
--

INSERT INTO `room_type` (`Type_id`, `Room_price`, `Total_rooms`, `Type`) VALUES
(0, 90, 16, 'Single'),
(1, 120, 12, 'Double'),
(2, 150, 10, 'Queen'),
(3, 175, 10, 'King'),
(4, 230, 10, 'Junior Suite'),
(5, 300, 5, 'Executive Suite'),
(6, 350, 5, 'Family Suite'),
(7, 500, 3, 'Super Duper Executive Suite');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `Employee_id` smallint(5) UNSIGNED NOT NULL,
  `Amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`Employee_id`, `Amount`) VALUES
(10, 40000),
(12, 45000),
(15, 35000),
(16, 44000);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `Employee_id` smallint(5) UNSIGNED NOT NULL,
  `Mgr_id` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`Employee_id`, `Mgr_id`) VALUES
(1, 0),
(10, 0),
(12, 0),
(20, 0),
(15, 2),
(16, 2);

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
  MODIFY `Cancellation_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Customer_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `Reservation_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1004;

--
-- AUTO_INCREMENT for table `room_type`
--
ALTER TABLE `room_type`
  MODIFY `Type_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
