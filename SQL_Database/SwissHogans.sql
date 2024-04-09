-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 09, 2024 at 06:54 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `SwissHogans`
--

-- --------------------------------------------------------

--
-- Table structure for table `SANDWICHES`
--

CREATE TABLE `SANDWICHES` (
  `Meat` varchar(30) DEFAULT NULL,
  `Cheese` varchar(30) DEFAULT NULL,
  `Bread` varchar(30) DEFAULT NULL,
  `Mayo` int(11) DEFAULT NULL,
  `Lettuce` int(11) DEFAULT NULL,
  `Tomato` int(11) DEFAULT NULL,
  `Onion` int(11) DEFAULT NULL,
  `Mustard` int(11) DEFAULT NULL,
  `Ranch` int(11) DEFAULT NULL,
  `ItalianDressing` int(11) DEFAULT NULL,
  `HotSauce` int(11) DEFAULT NULL,
  `Marinara` int(11) DEFAULT NULL,
  `Mushrooms` int(11) DEFAULT NULL,
  `Jalapenos` int(11) DEFAULT NULL,
  `BananaPeppers` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `SANDWICH_ORDER`
--

CREATE TABLE `SANDWICH_ORDER` (
  `Price` decimal(10,0) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `TakeOut` int(11) DEFAULT NULL,
  `OrderNo` int(11) NOT NULL,
  `OrderDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `SANDWICH_ORDER`
--
ALTER TABLE `SANDWICH_ORDER`
  ADD PRIMARY KEY (`OrderNo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
