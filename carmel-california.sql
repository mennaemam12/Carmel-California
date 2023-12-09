-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2023 at 03:14 PM
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
(3, 'Eggs Benedict', 'Eggs', 'Poached eggs, smoked salmon, spinach, homemade brioche, warm holl', 249, 'public/images/breakfast/image_6561b7d57b7ac.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `Name`) VALUES
(1, 'Pasta'),
(2, 'Burger'),
(3, 'Coffee'),
(4, 'Eggs'),
(5, 'Starters'),
(6, 'Soups');

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
  `valid` varchar(50) DEFAULT NULL
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
(3, 'Mushroom & Swiss Burger', 'Burger', 'Emmental, tomato, lettuce, pickles served with homemade.', 269, 'public/images/main/image_655d3533ef5dc.jpg'),
(4, 'Shrimp Havana', 'Pasta', 'Sundried tomato, broccoli, fresh cream', 310, 'public/images/main/image_656cea700d41e.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `Category_id` int(11) NOT NULL,
  `Criteria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `Category_id`, `Criteria`) VALUES
(3, 2, 'Size');

-- --------------------------------------------------------

--
-- Table structure for table `option_values`
--

CREATE TABLE `option_values` (
  `id` int(11) NOT NULL,
  `id_options` int(11) NOT NULL,
  `value` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `option_values`
--

INSERT INTO `option_values` (`id`, `id_options`, `value`) VALUES
(1, 3, 'Single'),
(2, 3, 'Double'),
(3, 3, 'Triple');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `user_id` varchar(200) NOT NULL,
  `item_id` varchar(200) NOT NULL,
  `item_type` varchar(20) NOT NULL,
  `message` varchar(500) NOT NULL,
  `rating` set('1','2','3','4','5') NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`user_id`, `item_id`, `item_type`, `message`, `rating`, `date`) VALUES
('28', '2', 'main', 'Delicious stuff', '5', '2023-12-09'),
('28', '4', 'main', 'To7fa to7fa ra2e3 fo2 el gamal', '2', '2023-12-09'),
('28', '4', 'main', 'Folaaa', '5', '2023-12-09'),
('28', '4', 'main', 'Test 3', '1', '2023-12-09');

-- --------------------------------------------------------

--
-- Table structure for table `saladingredients`
--

CREATE TABLE `saladingredients` (
  `id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Price` double NOT NULL,
  `Category` varchar(50) NOT NULL,
  `CategoryMax` int(11) NOT NULL,
  `ImagePath` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `saladingredients`
--

INSERT INTO `saladingredients` (`id`, `Name`, `Price`, `Category`, `CategoryMax`, `ImagePath`) VALUES
(1, 'Lettuce', 15, 'Base', 1, 'public/images/salad-ingredients/Base/Cabbage.jpg'),
(2, 'Arugula', 15, 'Base', 1, 'public/images/salad-ingredients/Base/Arugula.jpg'),
(3, 'Baby Rocca', 20, 'Base', 1, 'public/images/salad-ingredients/Base/Baby Rocca.jpg'),
(4, 'Mix Greens', 20, 'Base', 1, 'public/images/salad-ingredients/Base/Mix Greens.jpg'),
(5, 'Coriander', 15, 'Base', 1, 'public/images/salad-ingredients/Base/Coriander.jpg'),
(6, 'Blueberries', 20, 'Add On', 3, 'public/images/salad-ingredients/Add Ons/Blueberries.jpg'),
(7, 'Strawberries', 15, 'Add On', 2, 'public/images/salad-ingredients/Add Ons/Strawberries.jpg'),
(8, 'Onions', 10, 'Topping', 3, 'public/images/salad-ingredients/Toppings/Onions.jpg'),
(9, 'Grilled Chicken', 25, 'Protein', 1, 'public/images/salad-ingredients/Toppings/Grilled Chicken.jpg'),
(10, 'Red Beans', 10, 'Topping', 3, 'public/images/salad-ingredients/Toppings/Red Beans.jpg'),
(11, 'Cherry Tomato', 15, 'Topping', 3, 'public/images/salad-ingredients/Toppings/Cherry Tomato.jpg'),
(12, 'Pepper', 10, 'Topping', 3, 'public/images/salad-ingredients/Toppings/Pepper.jpg');

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
(2, 'Truffle Fries', 'Starters', 'Savor the perfection of hand-cut golden fries, expertly seasoned ', 135, 'public/images/sides/image_655d2c8bc5aca.jpg'),
(3, 'Mushroom', 'Soups', 'Cream Soup', 115, 'public/images/sides/image_656ce97224885.jpg');

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

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`FullName`, `Email`, `UserName`, `UserPass`, `PhoneNumber`, `id`, `Usertype`) VALUES
('Menna Emam', 'mennaemaam12@gmail.com', 'mennaemam', '$2y$10$gEEdH30mYNok7SQixvbqSOq5de/394x247bUDNH3JF.4qCmWgqa5W', 1092348337, 26, 'user'),
('Nader Maged', 'donia1@gmail.com', 'nadouraa', '$2y$10$HQZeLHqlpx7phPnlqvo7UOf6KRz9jY4VlcAtiyS5uYMUe0kjfDt.G', 1210700150, 27, 'admin'),
('Ramez Ehab', 'ramez@gmail.com', 'ramez', '$2y$10$PIbQHrRj3S0BEmFm1KRCLOzC0ALC7wdQT5b35.YQ/BxTOFiXYAeiO', 2147483647, 28, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `breakfast`
--
ALTER TABLE `breakfast`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `desserts`
--
ALTER TABLE `desserts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
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
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `option_values`
--
ALTER TABLE `option_values`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saladingredients`
--
ALTER TABLE `saladingredients`
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `breakfast`
--
ALTER TABLE `breakfast`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `desserts`
--
ALTER TABLE `desserts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `option_values`
--
ALTER TABLE `option_values`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `saladingredients`
--
ALTER TABLE `saladingredients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sides`
--
ALTER TABLE `sides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
