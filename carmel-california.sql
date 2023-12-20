-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 20, 2023 at 06:49 AM
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
-- Table structure for table `billing_details`
--

CREATE TABLE `billing_details` (
  `id` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Area` varchar(50) NOT NULL,
  `Street` varchar(50) NOT NULL,
  `Building` int(6) NOT NULL,
  `Floor` int(2) NOT NULL,
  `Apartment` int(2) NOT NULL,
  `Postalcode` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `billing_details`
--

INSERT INTO `billing_details` (`id`, `UserId`, `FirstName`, `LastName`, `Area`, `Street`, `Building`, `Floor`, `Apartment`, `Postalcode`) VALUES
(1, 32, 'Shahd', 'Khaled', 'maadi', 'Mahmoud Madkour', 3132, 2, 5, 11733),
(1, 32, 'Shahd', 'Khaled', 'maadi', 'Mahmoud Madkour', 3132, 2, 5, 11733);

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
(3, 'Eggs', 'Eggs', 'Poached eggs, smoked salmon, spinach, homemade brioche, warm holl', 249, 'public/images/breakfast/image_6561b7d57b7ac.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `Item_type` varchar(15) NOT NULL,
  `Item_id` int(11) NOT NULL,
  `Selected_Option` varchar(20) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(6, 'Soups'),
(7, '123');

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
  `category` varchar(100) DEFAULT NULL,
  `percentage` int(50) DEFAULT NULL,
  `coupon` varchar(100) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `valid` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`id`, `type`, `category`, `percentage`, `coupon`, `start_date`, `end_date`, `valid`) VALUES
(1, 'main', 'pasta', 10, 'Pasta10', '2023-12-19', '2024-01-19', 'Yes'),
(20, 'breakfast', 'Eggs', 22, 'Eggs22', '2023-12-08', '2024-01-07', 'YES'),
(21, 'main', 'Burger', 10, 'Burger10', '2023-12-08', '2024-01-07', 'YES'),
(22, 'sides', 'Starters', 40, 'Starters40', '2023-12-08', '2024-01-07', 'YES'),
(23, 'main', 'Burger', 22, 'Burger22', '2023-12-08', '2024-01-07', 'YES'),
(24, 'drinks', 'Coffee', 30, NULL, '2023-12-08', '2024-01-07', 'YES'),
(25, 'breakfast', 'Eggs', 45, 'Eggs45', '2023-12-19', '2024-01-18', 'YES');

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
-- Table structure for table `navbar`
--

CREATE TABLE `navbar` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `navbar`
--

INSERT INTO `navbar` (`id`, `name`, `path`) VALUES
(1, 'Home', 'index'),
(2, 'Menu', 'menu'),
(3, 'Services', 'services'),
(4, 'About', 'about'),
(5, 'Contact', 'contact'),
(6, 'Logout', 'logout'),
(7, 'Sign in', 'login'),
(8, 'Dashboard', 'dashboard');

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
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `ItemId` int(11) NOT NULL,
  `ItemType` varchar(50) NOT NULL,
  `SelectedOption` varchar(50) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `UserId`, `ItemId`, `ItemType`, `SelectedOption`, `Quantity`) VALUES
(6, 32, 2, 'main', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `description`, `path`) VALUES
(1, 'View Homepage', ''),
(2, 'View Menu Page', 'menu'),
(3, 'View Product Page', 'product'),
(4, 'View Services Page', 'services'),
(5, 'View About Page', 'about'),
(6, 'View Contact Page', 'contact'),
(7, 'View Cart Page', 'cart'),
(8, 'View Checkout Page', 'checkout'),
(9, 'View Dashboard Home', 'dashboard'),
(10, 'Add/Edit/View Menu', 'dashboard/menu'),
(11, 'Add/Edit/View Users', 'dashboard/users'),
(12, 'View/ Add Discounts', 'dashboard/discount');

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
('28', '4', 'main', 'Test 3', '1', '2023-12-09'),
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
('Menna Emam', 'mennaemaam12@gmail.com', 'mennaemam', '$2y$10$gEEdH30mYNok7SQixvbqSOq5de/394x247bUDNH3JF.4qCmWgqa5W', 1092348337, 26, '1'),
('Nader Maged', 'donia1@gmail.com', 'nadouraa', '$2y$10$HQZeLHqlpx7phPnlqvo7UOf6KRz9jY4VlcAtiyS5uYMUe0kjfDt.G', 1210700150, 27, '1'),
('Ramez Ehab', 'ramez@gmail.com', 'ramez', '$2y$10$PIbQHrRj3S0BEmFm1KRCLOzC0ALC7wdQT5b35.YQ/BxTOFiXYAeiO', 2147483647, 28, '2'),
('Admin Universal', 'admin@gmail.com', 'admin', '$2y$10$e6fkBOvwdfkkU62V0xsS1eEs0Rs9y8IHSb3Ca71vJTKpVONq//KBu', 2147483647, 29, '2'),
('User Universal', 'user@gmail.com', 'user', '$2y$10$Tpxk2DpwDP.ugQj0XtFND.hQAk5rEXkD2j4KCeBTm2bP7FPKu40d.', 20123123, 30, '1'),
('farrah', 'farah2102625@miuegypt.edu.eg', 'farooha', '$2y$10$1Px1r.Ja6J122X8Dx3s3i.Ntnf9s1DU7OXjqD2uHC9DsgdbxRniTu', 1288319666, 32, '2');

-- --------------------------------------------------------

--
-- Table structure for table `usertype_permissions`
--

CREATE TABLE `usertype_permissions` (
  `usertype_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usertype_permissions`
--

INSERT INTO `usertype_permissions` (`usertype_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(2, 11),
(2, 12);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `name`) VALUES
(1, 'user'),
(2, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `breakfast`
--
ALTER TABLE `breakfast`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
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
-- Indexes for table `navbar`
--
ALTER TABLE `navbar`
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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
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
-- Indexes for table `usertype_permissions`
--
ALTER TABLE `usertype_permissions`
  ADD PRIMARY KEY (`usertype_id`,`permission_id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `desserts`
--
ALTER TABLE `desserts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `drinks`
--
ALTER TABLE `drinks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `main`
--
ALTER TABLE `main`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `navbar`
--
ALTER TABLE `navbar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
