-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2025 at 10:25 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `Student_id` int(11) NOT NULL,
  `Photo` varchar(255) DEFAULT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Nickname` varchar(50) DEFAULT NULL,
  `Present_address` text DEFAULT NULL,
  `Permanent_address` text DEFAULT NULL,
  `Place_of_birth` varchar(100) DEFAULT NULL,
  `Contact_no` varchar(50) DEFAULT NULL,
  `Date_of_birth` date DEFAULT NULL,
  `Email_address` varchar(100) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `Religion` varchar(50) DEFAULT NULL,
  `Citizenship` varchar(50) DEFAULT NULL,
  `Civil_status` varchar(20) DEFAULT NULL,
  `Weight` decimal(5,2) DEFAULT NULL,
  `Height` decimal(5,2) DEFAULT NULL,
  `Language_spoken` varchar(100) DEFAULT NULL,
  `Occupation` varchar(100) DEFAULT NULL,
  `Father_name` varchar(100) DEFAULT NULL,
  `Father_occupation` varchar(100) DEFAULT NULL,
  `Mother_name` varchar(100) DEFAULT NULL,
  `Mother_occupation` varchar(100) DEFAULT NULL,
  `Emergency_contact_person` varchar(100) DEFAULT NULL,
  `Emergency_address` text DEFAULT NULL,
  `Emergency_relationship` varchar(50) DEFAULT NULL,
  `Emergency_contact_no` varchar(50) DEFAULT NULL,
  `Elementary_school` varchar(150) DEFAULT NULL,
  `Elementary_years_attended` varchar(50) DEFAULT NULL,
  `High_school` varchar(150) DEFAULT NULL,
  `High_school_years_attended` varchar(50) DEFAULT NULL,
  `Skills` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`) VALUES
(1, 'admin1', 'admin123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`Student_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `Student_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
