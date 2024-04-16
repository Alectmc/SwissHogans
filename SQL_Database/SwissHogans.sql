-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 16, 2024 at 08:39 PM
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
  `Name` varchar(30) DEFAULT NULL,
  `Meat` varchar(30) DEFAULT NULL,
  `Cheese` varchar(30) DEFAULT NULL,
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
  `BananaPeppers` int(11) DEFAULT NULL,
  `Sauerkraut` int(11) DEFAULT NULL,
  `ThousandIslandDressing` int(11) DEFAULT NULL,
  `SauteedOnions` int(11) DEFAULT NULL,
  `SauteedPeppers` int(11) DEFAULT NULL,
  `SandwichID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `SANDWICHES`
--

INSERT INTO `SANDWICHES` (`Name`, `Meat`, `Cheese`, `Mayo`, `Lettuce`, `Tomato`, `Onion`, `Mustard`, `Ranch`, `ItalianDressing`, `HotSauce`, `Marinara`, `Mushrooms`, `Jalapenos`, `BananaPeppers`, `Sauerkraut`, `ThousandIslandDressing`, `SauteedOnions`, `SauteedPeppers`, `SandwichID`) VALUES
('Italian', 'Ham, Salami, Pepperoni', 'Provolone', 1, 1, 1, 1, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
('The Swiss Hogan', 'Ham', 'Swiss', 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
('The Turkey Hogan', 'Turkey', 'Provolone', 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3),
('Chicken Bacon Ranch', 'Chicken, Bacon', 'Cheddar', 1, 1, 1, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4),
('The Works', 'Ham, Turkey, Roast Beef', 'Provolone', 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5),
('The Meatball Hogan', 'Meatballs', 'Provolone', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6),
('The Hogan Parm', 'Chicken', 'Provolone, Parmesean', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7),
('The Hot-n-Ham Hogan', 'Ham', 'Pepper Jack', 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, 8),
('The Reuben Hogan', 'Corned Beef', 'Swiss', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, 9),
('The Steak Hogan', 'Steak', 'Provolone', 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `SANDWICH_ORDER`
--

CREATE TABLE `SANDWICH_ORDER` (
  `Price` decimal(10,0) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `TakeOut` int(11) DEFAULT NULL,
  `OrderNo` int(11) NOT NULL,
  `OrderDate` date DEFAULT NULL,
  `Bread` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `SANDWICHES`
--
ALTER TABLE `SANDWICHES`
  ADD PRIMARY KEY (`SandwichID`);

--
-- Indexes for table `SANDWICH_ORDER`
--
ALTER TABLE `SANDWICH_ORDER`
  ADD PRIMARY KEY (`OrderNo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
