-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2023 at 12:18 AM
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
-- Database: `carmel-california`
--

-- --------------------------------------------------------

--
-- Table structure for table `breakfast`
--

CREATE TABLE `breakfast` (
  `id` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Category` varchar(20) NOT NULL,
  `Description` varchar(65) NOT NULL,
  `Price` double NOT NULL,
  `ImagePath` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `breakfast`
--

INSERT INTO `breakfast` (`id`, `Name`, `Category`, `Description`, `Price`, `ImagePath`) VALUES
(3, 'Eggs Benedict', 'Eggs', 'Poached eggs, smoked salmon, spinach, homemade brioche, warm holl', 249, 'public/images/breakfast/image_655d3482b54c7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `desserts`
--

CREATE TABLE `desserts` (
  `id` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Category` varchar(20) NOT NULL,
  `Description` text NOT NULL,
  `Price` double NOT NULL,
  `ImagePath` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `drinks`
--

CREATE TABLE `drinks` (
  `id` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Category` varchar(20) NOT NULL,
  `Description` varchar(65) NOT NULL,
  `Price` double NOT NULL,
  `ImagePath` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `drinks`
--

INSERT INTO `drinks` (`id`, `Name`, `Category`, `Description`, `Price`, `ImagePath`) VALUES
(2, 'Espresso', 'Coffee', 'Single shot | double shot | triple shot', 49, 'public/images/drinks/image_655d303a32a50.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `main`
--

CREATE TABLE `main` (
  `id` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Category` varchar(20) NOT NULL,
  `Description` varchar(65) NOT NULL,
  `Price` double NOT NULL,
  `ImagePath` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `main`
--

INSERT INTO `main` (`id`, `Name`, `Category`, `Description`, `Price`, `ImagePath`) VALUES
(2, 'Chicken Pesto', 'Pasta', 'pasta, cream', 295, 'public/images/main/image_655b8c040e11b.jpg'),
(3, 'Mushroom & Swiss Burger', 'Burger', 'Emmental, tomato, lettuce, pickles served with homemade.', 269, 'public/images/main/image_655d3533ef5dc.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sides`
--

CREATE TABLE `sides` (
  `id` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Category` varchar(20) NOT NULL,
  `Description` varchar(65) NOT NULL,
  `Price` double NOT NULL,
  `ImagePath` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sides`
--

INSERT INTO `sides` (`id`, `Name`, `Category`, `Description`, `Price`, `ImagePath`) VALUES
(2, 'Truffle Fries', 'Starters', 'Savor the perfection of hand-cut golden fries, expertly seasoned ', 135, 'public/images/sides/image_655d2c8bc5aca.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `FullName` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `UserPass` varchar(255) NOT NULL,
  `PhoneNumber` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `Usertype` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `percentage` int(50) DEFAULT NULL,
  `coupon` varchar(100) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `valid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Dumping data for table `users`
--

INSERT INTO `discount` (`id`, `type`, `category`, `percentage`,  `coupon`, `start_date` , `end_date`,`valid`) VALUES
(1, 'breakfast', 'Eggs', 10, , 'Eggs10', '1/12/2023' , '1/2/2024' , 'valid');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `breakfast`
--
ALTER TABLE `breakfast`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `desserts`
--
ALTER TABLE `desserts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drinks`
--
ALTER TABLE `drinks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main`
--
ALTER TABLE `main`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sides`
--
ALTER TABLE `sides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);



--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`id`);


--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `breakfast`
--
ALTER TABLE `breakfast`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `desserts`
--
ALTER TABLE `desserts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `drinks`
--
ALTER TABLE `drinks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `main`
--
ALTER TABLE `main`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sides`
--
ALTER TABLE `sides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;


--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
