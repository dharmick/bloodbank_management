-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2018 at 08:43 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE bloodbank;
USE bloodbank;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bloodbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `D_id` int(15) NOT NULL,
  `P_id` int(15) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Weight` int(5) NOT NULL,
  `Blood_group` varchar(5) NOT NULL,
  `Status` varchar(20) NOT NULL DEFAULT 'Pending',
  `Age` int(5) NOT NULL,
  `Registration_date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`D_id`, `P_id`, `Email`, `Weight`, `Blood_group`, `Status`, `Age`, `Registration_date`) VALUES
(1, 5, 'rahul.punjabi@somaiya.edu', 70, 'O+', 'Pending', 20, '2018-10-03 15:45:14.607695'),
(2, 6, 'darshil11@somaiya.edu', 75, 'A+', 'Pending', 21, '2018-10-03 15:50:11.031262');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `Emp_id` int(15) NOT NULL,
  `P_id` int(15) NOT NULL,
  `Emp_email` varchar(50) NOT NULL,
  `Password` varchar(500) NOT NULL,
  `password_changed` tinyint(1) NOT NULL DEFAULT '0',
  `Post_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`Emp_id`, `P_id`, `Emp_email`, `Password`, `password_changed`, `Post_id`) VALUES
(1, 1, 'parth.js@somaiya.edu', '12345', 0, 1),
(2, 4, 'dharmik.joshi@somaiya.edu', '', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `Hospital_id` int(11) NOT NULL,
  `Hospital_name` varchar(30) NOT NULL,
  `address` varchar(200) NOT NULL,
  `Contact` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`Hospital_id`, `Hospital_name`, `address`, `Contact`) VALUES
(1, 'J J Hospital', 'B-303,sarvodaya aangan ,pandurangwadi\r\nnear sai baba temple ,dombivali east', '9867875474');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `Inv_id` int(15) NOT NULL,
  `D_id` int(15) NOT NULL,
  `Wbc` varchar(30) NOT NULL,
  `Rbc` varchar(30) NOT NULL,
  `Haemoglobin` varchar(15) NOT NULL,
  `Blood_group` varchar(5) NOT NULL,
  `Units` float NOT NULL,
  `Comments` varchar(200) NOT NULL,
  `Date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Order_id` int(15) NOT NULL,
  `Hospital_id` int(15) NOT NULL,
  `Units` float NOT NULL,
  `Blood_group` varchar(5) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Pending',
  `Comments` varchar(200) NOT NULL,
  `Delivered_by` varchar(30) NOT NULL,
  `order_date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Order_id`, `Hospital_id`, `Units`, `Blood_group`, `status`, `Comments`, `Delivered_by`, `order_date`) VALUES
(1, 1, 5, 'B+', 'Pending', 'It should have hb to avg level', '', '2018-10-03 18:21:37.201732');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `P_id` int(15) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Contact` varchar(10) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`P_id`, `Name`, `Contact`, `Address`, `Gender`) VALUES
(1, 'Parth Sanghavi', '8451970710', 'B-303,sarvodaya aangan ,pandurangwadi\r\nnear sai baba temple ,dombivali east', 'Male'),
(4, 'Dharmik Joshi', '7788995566', 'B-303,sarvodaya aangan ,pandurangwadi\r\nnear sai baba temple ,dombivali east', 'Male'),
(5, 'Rahul Punjabi', '7788995566', 'B-303,sarvodaya aangan ,pandurangwadi\r\nnear sai baba temple ,dombivali east', 'Male'),
(6, 'Darshil Shah', '1234567890', 'B-303,sarvodaya aangan ,pandurangwadi\r\nnear sai baba temple ,dombivali east', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `Post_id` int(15) NOT NULL,
  `Post_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`Post_id`, `Post_name`) VALUES
(1, 'Blood Bank Admin'),
(2, 'Lab Technician'),
(3, 'Receptionist'),
(4, 'Delivery Staff'),
(5, 'Hospital Blood Bank Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`D_id`),
  ADD KEY `P_id` (`P_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`Emp_id`),
  ADD KEY `P_id` (`P_id`) USING BTREE,
  ADD KEY `Post_id` (`Post_id`) USING BTREE;

--
-- Indexes for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`Hospital_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`Inv_id`),
  ADD KEY `D_id` (`D_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_id`),
  ADD KEY `Hospital_id` (`Hospital_id`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`P_id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`Post_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `D_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `Emp_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `Hospital_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `Inv_id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `P_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `Post_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donor`
--
ALTER TABLE `donor`
  ADD CONSTRAINT `donor_ibfk_1` FOREIGN KEY (`P_id`) REFERENCES `person` (`P_id`) ON UPDATE CASCADE;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `foreign key_P_id` FOREIGN KEY (`P_id`) REFERENCES `person` (`P_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `foreign key_Pos_id` FOREIGN KEY (`Post_id`) REFERENCES `positions` (`Post_id`);

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`D_id`) REFERENCES `donor` (`D_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`Hospital_id`) REFERENCES `hospitals` (`Hospital_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
