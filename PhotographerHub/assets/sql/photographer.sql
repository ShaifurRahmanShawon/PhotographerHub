-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2021 at 06:24 PM
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
-- Database: `photographer`

  CREATE Database photographer;
  use photographer;

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
('Dukul', 'dukul@gmail.com', 'ASDasd12', '2020-12-29 20:10:16');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `Name` varchar(100) NOT NULL,
  `Type` varchar(100) NOT NULL,
  `Contact` bigint(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `About` varchar(1000) NOT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `images` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indexes for dumped tables
--

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
