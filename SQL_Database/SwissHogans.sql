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

-- --------------------------------------------------------
-- Database: `SwissHogans`
--

-- Create the SANDWICHES table first
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
  `Price` DECIMAL(5,2) DEFAULT NULL,
  `SandwichID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`SandwichID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Create tables for Meats, Cheeses, and Toppings
CREATE TABLE Meats (
    Name VARCHAR(30) PRIMARY KEY,
    Price DECIMAL(5,2)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO Meats (Name, Price) VALUES 
('Chicken', 2.50), 
('Turkey', 2.75), 
('Roast Beef', 3.00);

CREATE TABLE Cheeses (
    Name VARCHAR(30) PRIMARY KEY,
    Price DECIMAL(5,2)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO Cheeses (Name, Price) VALUES 
('Cheddar', 0.50), 
('Swiss', 0.60), 
('Provolone', 0.55);

CREATE TABLE Toppings (
    Name VARCHAR(30) PRIMARY KEY,
    Price DECIMAL(5,2)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Inserting values into Toppings
INSERT INTO Toppings (Name, Price) VALUES 
('Lettuce', 0.25), 
('Tomato', 0.30),
('Mayo', 0.20), 
('Onion', 0.25), 
('Mustard', 0.20), 
('Ranch', 0.25), 
('Italian Dressing', 0.25), 
('Hot Sauce', 0.20), 
('Marinara', 0.30), 
('Mushrooms', 0.35), 
('Jalapenos', 0.30), 
('Banana Peppers', 0.30), 
('Sauerkraut', 0.35), 
('Thousand Island Dressing', 0.40), 
('Sauteed Onions', 0.30), 
('Sauteed Peppers', 0.30);

-- Ensure all tables are created and only then perform updates
UPDATE SANDWICHES S
SET S.Price = (SELECT Price FROM Meats WHERE Name = S.Meat) 
             + (SELECT Price FROM Cheeses WHERE Name = S.Cheese) 
             + IF(S.Mayo = 1, (SELECT Price FROM Toppings WHERE Name = 'Mayo'), 0)
             + IF(S.Lettuce = 1, (SELECT Price FROM Toppings WHERE Name = 'Lettuce'), 0)
             + IF(S.Tomato = 1, (SELECT Price FROM Toppings WHERE Name = 'Tomato'), 0)
             + IF(S.Onion = 1, (SELECT Price FROM Toppings WHERE Name = 'Onion'), 0)
             + IF(S.Mustard = 1, (SELECT Price FROM Toppings WHERE Name = 'Mustard'), 0)
             + IF(S.Ranch = 1, (SELECT Price FROM Toppings WHERE Name = 'Ranch'), 0)
             + IF(S.ItalianDressing = 1, (SELECT Price FROM Toppings WHERE Name = 'ItalianDressing'), 0);

-- --------------------------------------------------------
--
-- Dumping data for table `SANDWICHES`
--

INSERT INTO `SANDWICHES` (`Name`, `Meat`, `Cheese`, `Mayo`, `Lettuce`, `Tomato`, `Onion`, `Mustard`, `Ranch`, `ItalianDressing`, `HotSauce`, `Marinara`, `Mushrooms`, `Jalapenos`, `BananaPeppers`, `Sauerkraut`, `ThousandIslandDressing`, `SauteedOnions`, `SauteedPeppers`, `SandwichID`) VALUES
('ItalianDressing', 'Ham, Salami, Pepperoni', 'Provolone', 1, 1, 1, 1, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
('The Swiss Hogan', 'Ham', 'Swiss', 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2),
('The Turkey Hogan', 'Turkey', 'Provolone', 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3),
('Chicken Bacon Ranch', 'Chicken, Bacon', 'Cheddar', 1, 1, 1, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4),
('The Works', 'Ham, Turkey, Roast Beef', 'Provolone', 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5),
('The Meatball Hogan', 'Meatballs', 'Provolone', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6),
('The Hogan Parm', 'Chicken', 'Provolone, Parmesean', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7),
('The Hot-n-Ham Hogan', 'Ham', 'Pepper Jack', 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, 8),
('The Reuben Hogan', 'Corned Beef', 'Swiss', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, 9),
('The Steak Hogan', 'Steak', 'Provolone', 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 10);



--
-- Table structure for table `SANDWICH_ORDER`
--

CREATE TABLE `SANDWICH_ORDER` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `OrderNo` INT(11) NOT NULL,
  `Price` DECIMAL(10,0),
  `Quantity` INT(11),
  `TakeOut` INT(11),
  `OrderDate` DATE,
  `Bread` VARCHAR(30),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Indexes for dumped tables
--

--
-- Indexes for table `SANDWICHES`
--ss

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



