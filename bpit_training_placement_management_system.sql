-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2025 at 04:56 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bpit_training_placement_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `comp_id` int(11) NOT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `grade` char(1) DEFAULT NULL,
  `package` decimal(5,2) DEFAULT NULL,
  `contact_no` varchar(15) DEFAULT NULL,
  `criteria_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`comp_id`, `company_name`, `address`, `grade`, `package`, `contact_no`, `criteria_id`) VALUES
(1, 'Infosys', 'Bangalore', 'A', 7.50, '9876501234', 101),
(2, 'TCS', 'Pune', 'B', 6.00, '9811122233', 102),
(3, 'Wipro', 'Hyderabad', 'A', 8.00, '9900011111', 103);

-- --------------------------------------------------------

--
-- Table structure for table `coordinator`
--

CREATE TABLE `coordinator` (
  `coord_id` int(11) NOT NULL,
  `contact_no` varchar(15) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `coord_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coordinator`
--

INSERT INTO `coordinator` (`coord_id`, `contact_no`, `address`, `coord_name`) VALUES
(1, '9876543210', 'Karol Bagh', 'Rajesh Sharma'),
(2, '9123456789', 'Lajpat Nagar', 'Neha Verma'),
(3, '9988776655', 'Connaught Place', 'Manoj Kumar');

-- --------------------------------------------------------

--
-- Table structure for table `criteria`
--

CREATE TABLE `criteria` (
  `criteria_id` int(11) NOT NULL,
  `dept_allowed` varchar(100) DEFAULT NULL,
  `cgpa_required` decimal(3,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `criteria`
--

INSERT INTO `criteria` (`criteria_id`, `dept_allowed`, `cgpa_required`) VALUES
(101, '1,2', 7.0),
(102, '2,3', 6.5),
(103, '1,3', 6.0);

-- --------------------------------------------------------

--
-- Table structure for table `placement`
--

CREATE TABLE `placement` (
  `placement_id` int(11) NOT NULL,
  `stud_id` int(11) DEFAULT NULL,
  `comp_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `placement`
--

INSERT INTO `placement` (`placement_id`, `stud_id`, `comp_id`) VALUES
(1, 2, 1),
(2, 4, 2),
(3, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stud_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `d_id` int(11) DEFAULT NULL,
  `cgpa` decimal(3,1) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `contact_no` varchar(15) DEFAULT NULL,
  `co_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stud_id`, `name`, `d_id`, `cgpa`, `address`, `contact_no`, `co_id`) VALUES
(2, 'Aman', 2, 9.1, 'Mukherjee Nagar', '9773696990', 2),
(3, 'Rohit', 1, 7.8, 'Karol Bagh', '9823456789', 1),
(4, 'Sneha', 3, 8.7, 'Connaught Place', '9834567890', 3),
(5, 'Vikram', 2, 6.9, 'Dwarka', '9845678901', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`comp_id`),
  ADD KEY `criteria_id` (`criteria_id`);

--
-- Indexes for table `coordinator`
--
ALTER TABLE `coordinator`
  ADD PRIMARY KEY (`coord_id`);

--
-- Indexes for table `criteria`
--
ALTER TABLE `criteria`
  ADD PRIMARY KEY (`criteria_id`);

--
-- Indexes for table `placement`
--
ALTER TABLE `placement`
  ADD PRIMARY KEY (`placement_id`),
  ADD KEY `stud_id` (`stud_id`),
  ADD KEY `comp_id` (`comp_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stud_id`),
  ADD KEY `co_id` (`co_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`criteria_id`) REFERENCES `criteria` (`criteria_id`);

--
-- Constraints for table `placement`
--
ALTER TABLE `placement`
  ADD CONSTRAINT `placement_ibfk_1` FOREIGN KEY (`stud_id`) REFERENCES `student` (`stud_id`),
  ADD CONSTRAINT `placement_ibfk_2` FOREIGN KEY (`comp_id`) REFERENCES `company` (`comp_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`co_id`) REFERENCES `coordinator` (`coord_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
