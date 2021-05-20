-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2021 at 06:32 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `enrollment`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `name`, `username`, `password`) VALUES
(1, 'Admin', 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `name` varchar(50) NOT NULL,
  `id` int(50) NOT NULL,
  `sno` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `course` varchar(50) NOT NULL,
  `section` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`name`, `id`, `sno`, `pass`, `email`, `mobile`, `course`, `section`) VALUES
('Cruz, Mark Paulo Aday', 1, '201811064', '123', 'markpaulocruz839@gmail.com', '09650917332', 'BSIT', '3A');

-- --------------------------------------------------------

--
-- Table structure for table `students1`
--

CREATE TABLE `students1` (
  `id` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `course` varchar(50) NOT NULL,
  `year_level` varchar(50) NOT NULL,
  `section` varchar(50) NOT NULL,
  `birthday` varchar(50) NOT NULL,
  `complete_address` varchar(255) NOT NULL,
  `mobile_number` varchar(50) NOT NULL,
  `guardian` varchar(50) NOT NULL,
  `guardian_mobile_number` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students1`
--

INSERT INTO `students1` (`id`, `username`, `password`, `name`, `course`, `year_level`, `section`, `birthday`, `complete_address`, `mobile_number`, `guardian`, `guardian_mobile_number`, `email`, `status`) VALUES
(1, '201811064', 'asd', 'Mark Paulo Cruz', 'BSIT', '3', 'A', 'January 01, 2000', 'Baliuag, Bulacan', '09123456789', 'Juan Dela Cruz', '09123456789', 'paulo@yahoo.com', 'enrolled'),
(3, '201811208', '123', 'Richard Gonzales Jr.', 'BSIT', '3', 'A', 'January 01, 2000', 'Bopols', '09123456789', 'Juan Dela Cruz', '123', 'richard@yahoo.com', 'unenrolled'),
(4, '201810272', '123', 'Jan Kenneth Talavera', 'BSIT', '3', 'A', 'January 01, 2000', 'Bulacan', '09123456789', 'Juan Dela Cruz', '123', 'kenneth@yahoo.com', 'unenrolled'),
(5, '201810192', '123', 'Marites Ando', 'BSIT', '3', 'A', 'January 01, 2000', 'Baliuag, Bulacan', '09123456789', 'Juan Dela Cruz', '09123456789', 'thess@yahoo.com', 'unenrolled'),
(6, '201810343', '123', 'Angelica Minette Serna', 'BSIT', '3', 'A', 'January 01, 2000', 'Pulilan, Bulacan', '09123456789', 'Juan Dela Cruz', '09123456789', 'minette@yahoo.com', 'unenrolled');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students1`
--
ALTER TABLE `students1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students1`
--
ALTER TABLE `students1`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
