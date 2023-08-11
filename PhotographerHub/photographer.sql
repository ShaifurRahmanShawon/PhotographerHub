-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 05, 2021 at 04:53 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `photographer`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Name`, `Email`, `Password`, `Created_at`) VALUES
('Shawon', 'shawon@gmail.com', 'ASDasd12', '2021-09-02 20:10:16');
INSERT INTO `admin` (`Name`, `Email`, `Password`, `Created_at`) VALUES
('Noor', 'noor@gmail.com', 'ASDasd12', '2021-09-02 21:11:17');
INSERT INTO `admin` (`Name`, `Email`, `Password`, `Created_at`) VALUES
('Tauseef', 'tauseef@gmail.com', 'ASDasd12', '2021-09-02 22:12:18');
-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `book_id` int(11) NOT NULL,
  `photographer` varchar(255) NOT NULL,
  `client` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--


-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `Name` varchar(100) NOT NULL,
  `Type` varchar(100) NOT NULL,
  `Contact` bigint(11) DEFAULT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `About` varchar(1000) DEFAULT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `Subject` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Query` varchar(1000) NOT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `Photographer_Name` varchar(100) NOT NULL,
  `Registered_Email` varchar(100) NOT NULL,
  `Feedback` varchar(1000) NOT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `Rating` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `newsteller`
--

CREATE TABLE `newsteller` (
  `Email` varchar(100) NOT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `photographer`
--

CREATE TABLE `photographer` (
  `Name` varchar(100) NOT NULL,
  `Type` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Contact` bigint(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Pricing1` varchar(300) NOT NULL,
  `Pricing2` varchar(300) NOT NULL,
  `Pricing3` varchar(300) NOT NULL,
  `Pricing4` varchar(300) NOT NULL,
  `Day1` varchar(300) NOT NULL,
  `Day2` varchar(300) NOT NULL,
  `Day3` varchar(300) NOT NULL,
  `Day4` varchar(300) NOT NULL,
  `Day5` varchar(300) NOT NULL,
  `Day6` varchar(300) NOT NULL,
  `Day7` varchar(300) NOT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `photographer`
--

INSERT INTO `photographer` (`Name`, `Type`, `Password`, `Contact`, `Email`, `Pricing1`, `Pricing2`, `Pricing3`, `Pricing4`, `Day1`, `Day2`, `Day3`, `Day4`, `Day5`, `Day6`, `Day7`, `Created_at`) VALUES
('Shawon', 'photographer', '12345678As', 12345678900, 'shawon1@gmail.com', '200 (Normal)', '500 (silver)', '600 (golden)', '700 (diamond)', '4Am', '5Am', '6AM', '5PM', '6PM', '12Pm', '2pm', '2021-09-04 09:53:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`Created_at`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`Created_at`);

--
-- Indexes for table `newsteller`
--
ALTER TABLE `newsteller`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `photographer`
--
ALTER TABLE `photographer`
  ADD PRIMARY KEY (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
