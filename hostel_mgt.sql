-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2019 at 11:25 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hostel_mgt`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hostel`
--

CREATE TABLE `hostel` (
  `room_id` varchar(10) NOT NULL,
  `bed_id` varchar(30) NOT NULL,
  `floor_no` varchar(30) NOT NULL,
  `room_type` varchar(30) DEFAULT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_allocation`
--

CREATE TABLE `student_allocation` (
  `s_id` varchar(30) NOT NULL,
  `bed_id` varchar(30) DEFAULT NULL,
  `floor_no` varchar(30) DEFAULT NULL,
  `room_id` varchar(10) DEFAULT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_registration`
--

CREATE TABLE `student_registration` (
  `s_id` varchar(30) NOT NULL,
  `s_name` varchar(30) NOT NULL,
  `mother` varchar(30) DEFAULT NULL,
  `father` varchar(30) DEFAULT NULL,
  `b_date` date DEFAULT NULL,
  `local_guardian` varchar(30) DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `hostel`
--
ALTER TABLE `hostel`
  ADD PRIMARY KEY (`room_id`,`bed_id`,`floor_no`);

--
-- Indexes for table `student_allocation`
--
ALTER TABLE `student_allocation`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `s_id` (`s_id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `bed_id` (`bed_id`),
  ADD KEY `floor_no` (`floor_no`);

--
-- Indexes for table `student_registration`
--
ALTER TABLE `student_registration`
  ADD PRIMARY KEY (`s_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student_allocation`
--
ALTER TABLE `student_allocation`
  ADD CONSTRAINT `fk1_std_alc` FOREIGN KEY (`s_id`) REFERENCES `student_registration` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk4_std_alc` FOREIGN KEY (`room_id`) REFERENCES `hostel` (`room_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
