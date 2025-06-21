-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2025 at 08:58 AM
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
-- Database: `caregroup`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(3) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(20) NOT NULL,
  `addr` varchar(35) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `doctor` varchar(25) NOT NULL,
  `date` varchar(10) NOT NULL,
  `time` varchar(7) NOT NULL,
  `dateandtime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `name`, `email`, `addr`, `phone`, `doctor`, `date`, `time`, `dateandtime`) VALUES
(1, '', '', '', ' ', '', '', '', '2025-06-21 06:28:48'),
(2, 'hamza', 'hkwaheedi@gmail.com', 'swwdawc', '3333756262', 'Dr. Brown', '2025-06-21', '11:03', '2025-06-21 06:57:23');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(3) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(20) NOT NULL,
  `message` varchar(50) NOT NULL,
  `dateandtime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `username`, `email`, `message`, `dateandtime`) VALUES
(1, 'admin', 'hkwaheedi@gmail.com', 'scszcfsdvsd', '2025-06-14 06:36:52'),
(2, 'admin', 'hkwaheedi@gmail.com', 'cxascassd', '2025-06-14 06:38:05'),
(3, 'admin', 'hkwaheedi@gmail.com', 'cxascassd', '2025-06-14 06:38:28'),
(4, '', '', '', '2025-06-14 06:39:28'),
(5, 'admin', 'hkwaheedi@gmail.com', 'xsacdsacas', '2025-06-14 06:40:15'),
(6, '', '', '', '2025-06-14 06:40:38'),
(7, '', '', '', '2025-06-14 06:40:46'),
(8, '', '', '', '2025-06-14 06:41:54'),
(9, '', '', '', '2025-06-14 06:43:27'),
(10, '', '', '', '2025-06-21 06:16:36'),
(11, '', '', '', '2025-06-21 06:39:04'),
(12, 'admin', 'hkwaheedi@gmail.com', 'd cx', '2025-06-21 06:43:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
