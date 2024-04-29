-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2024 at 10:03 PM
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
-- Database: `swisshogans`
--

-- --------------------------------------------------------

--
-- Table structure for table `cheeses`
--

CREATE TABLE `cheeses` (
  `Name` varchar(30) NOT NULL,
  `Price` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cheeses`
--

INSERT INTO `cheeses` (`Name`, `Price`) VALUES
('Cheddar', 0.50),
('Provolone', 0.55),
('Swiss', 0.60);

-- --------------------------------------------------------

--
-- Table structure for table `custom_sandwiches`
--

CREATE TABLE `custom_sandwiches` (
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
  `ID` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `custom_sandwiches`
--

INSERT INTO `custom_sandwiches` (`Meat`, `Cheese`, `Mayo`, `Lettuce`, `Tomato`, `Onion`, `Mustard`, `Ranch`, `ItalianDressing`, `HotSauce`, `Marinara`, `Mushrooms`, `Jalapenos`, `BananaPeppers`, `Sauerkraut`, `ThousandIslandDressing`, `SauteedOnions`, `SauteedPeppers`, `ID`) VALUES
('h', 'h', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, 70540916);

-- --------------------------------------------------------

--
-- Table structure for table `meats`
--

CREATE TABLE `meats` (
  `Name` varchar(30) NOT NULL,
  `Price` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meats`
--

INSERT INTO `meats` (`Name`, `Price`) VALUES
('Chicken', 2.50),
('Roast Beef', 3.00),
('Turkey', 2.75);

-- --------------------------------------------------------

--
-- Table structure for table `sandwiches`
--

CREATE TABLE `sandwiches` (
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
  `Price` decimal(5,2) DEFAULT NULL,
  `SandwichID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sandwiches`
--

INSERT INTO `sandwiches` (`Name`, `Meat`, `Cheese`, `Mayo`, `Lettuce`, `Tomato`, `Onion`, `Mustard`, `Ranch`, `ItalianDressing`, `HotSauce`, `Marinara`, `Mushrooms`, `Jalapenos`, `BananaPeppers`, `Sauerkraut`, `ThousandIslandDressing`, `SauteedOnions`, `SauteedPeppers`, `Price`, `SandwichID`) VALUES
('ItalianDressing', 'Ham, Salami, Pepperoni', 'Provolone', 1, 1, 1, 1, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
('The Swiss Hogan', 'Ham', 'Swiss', 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
('The Turkey Hogan', 'Turkey', 'Provolone', 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3),
('Chicken Bacon Ranch', 'Chicken, Bacon', 'Cheddar', 1, 1, 1, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4),
('The Works', 'Ham, Turkey, Roast Beef', 'Provolone', 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5),
('The Meatball Hogan', 'Meatballs', 'Provolone', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6),
('The Hogan Parm', 'Chicken', 'Provolone, Parmesean', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7),
('The Hot-n-Ham Hogan', 'Ham', 'Pepper Jack', 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, 8),
('The Reuben Hogan', 'Corned Beef', 'Swiss', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, 9),
('The Steak Hogan', 'Steak', 'Provolone', 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, 10);

-- --------------------------------------------------------

--
-- Table structure for table `sandwich_order`
--

CREATE TABLE `sandwich_order` (
  `id` int(8) NOT NULL,
  `OrderNo` int(11) NOT NULL,
  `Price` decimal(10,0) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `TakeOut` int(11) DEFAULT NULL,
  `OrderDate` date DEFAULT NULL,
  `Bread` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sandwich_order`
--

INSERT INTO `sandwich_order` (`id`, `OrderNo`, `Price`, `Quantity`, `TakeOut`, `OrderDate`, `Bread`) VALUES
(1, 1, 5, 1, 0, '2024-04-29', 'White Bread'),
(9, 70540916, 0, 1, 1, '2024-04-29', 'White Bread'),
(10, 4, 5, 1, 0, '2024-04-29', 'White Bread');

-- --------------------------------------------------------

--
-- Table structure for table `toppings`
--

CREATE TABLE `toppings` (
  `Name` varchar(30) NOT NULL,
  `Price` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `toppings`
--

INSERT INTO `toppings` (`Name`, `Price`) VALUES
('Banana Peppers', 0.30),
('Hot Sauce', 0.20),
('Italian Dressing', 0.25),
('Jalapenos', 0.30),
('Lettuce', 0.25),
('Marinara', 0.30),
('Mayo', 0.20),
('Mushrooms', 0.35),
('Mustard', 0.20),
('Onion', 0.25),
('Ranch', 0.25),
('Sauerkraut', 0.35),
('Sauteed Onions', 0.30),
('Sauteed Peppers', 0.30),
('Thousand Island Dressing', 0.40),
('Tomato', 0.30);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cheeses`
--
ALTER TABLE `cheeses`
  ADD PRIMARY KEY (`Name`);

--
-- Indexes for table `custom_sandwiches`
--
ALTER TABLE `custom_sandwiches`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `meats`
--
ALTER TABLE `meats`
  ADD PRIMARY KEY (`Name`);

--
-- Indexes for table `sandwiches`
--
ALTER TABLE `sandwiches`
  ADD PRIMARY KEY (`SandwichID`);

--
-- Indexes for table `sandwich_order`
--
ALTER TABLE `sandwich_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `toppings`
--
ALTER TABLE `toppings`
  ADD PRIMARY KEY (`Name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `custom_sandwiches`
--
ALTER TABLE `custom_sandwiches`
  MODIFY `ID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT for table `sandwiches`
--
ALTER TABLE `sandwiches`
  MODIFY `SandwichID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sandwich_order`
--
ALTER TABLE `sandwich_order`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
