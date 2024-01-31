-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2023 at 02:00 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(255) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `Name`, `lastName`, `email`, `password`) VALUES
(1, 'Maliva', 'NICKSON', 'nicksonmaliva2017@gmail.com', '75ef9faee755c70589550b513ad881e5a603182c');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `user_id` int(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` text NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`user_id`, `name`, `email`, `message`) VALUES
(1, 'Nickson Maliva', 'nicksonmaliva2017@gmail.com', 'nick'),
(2, 'Nickson Maliva', 'nicksonmaliva2017@gmail.com', 'ff'),
(3, 'Nickson Maliva', 'nicksonmaliva2017@gmail.com', 'nick'),
(4, 'Nickson Maliva', 'nicksonmaliva2017@gmail.com', 'jj'),
(5, 'Nickson Maliva', 'nicksonmaliva2017@gmail.com', 'jj'),
(6, 'Nickson Maliva', 'nicksonmaliva2017@gmail.com', 'nick'),
(7, 'Nickson Maliva', 'nicksonmaliva2017@gmail.com', 'nnn'),
(8, 'Nickson Maliva', 'nicksonmaliva2017@gmail.com', 'nic'),
(9, 'Nickson Maliva', 'nicksonmaliva2017@gmail.com', 'ggg'),
(12, 'Nickson Maliva', 'nicksonmaliva2017@gmail.com', 'nick'),
(29, 'Nickson Maliva', 'nicksonmaliva2017@gmail.com', 'nick'),
(30, 'Nickson Maliva', 'nicksonmaliva2017@gmail.com', 'je suis malade'),
(31, 'Nickson Maliva', 'nicksonmaliva2017@gmail.com', 'nick'),
(32, 'Nickson Maliva', 'nicksonmaliva2017@gmail.com', 'maliva'),
(33, 'Nickson Maliva', 'nicksonmaliva2017@gmail.com', 'v'),
(34, 'Nickson Maliva', 'nicksonmaliva2017@gmail.com', 'viens voir'),
(35, 'Nickson Maliva', 'nicksonmaliva2017@gmail.com', 'je suis venu j\'qi vu');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `o_id` int(255) NOT NULL,
  `userid` int(255) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` int(255) NOT NULL,
  `product_image` text NOT NULL,
  `email` text NOT NULL,
  `address` text NOT NULL,
  `phone` int(20) NOT NULL,
  `pay_image` text NOT NULL,
  `date` datetime NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`o_id`, `userid`, `Name`, `product_name`, `product_price`, `product_image`, `email`, `address`, `phone`, `pay_image`, `date`, `status`) VALUES
(25, 6, 'MALIVA', 'hp', 4444, 'IMG_9158.jpg', 'nicksonmaliva2017@gmail.com', 'KIG.AAK.055', 791903528, 'IMG_9201.jpg', '2023-11-21 12:58:24', 0),
(26, 6, 'MALIVA', 'hp folio G5', 400, 'IMG_9157.jpg', 'nicksonmaliva2017@gmail.com', 'KIG.AAK.055', 791903528, 'IMG_9176.jpg', '2023-11-21 13:00:34', 0),
(27, 6, 'MALIVA', 'mouse', 45, 'IMG_9226.jpg', 'nicksonmaliva2017@gmail.com', 'KIG.AAK.055', 791903528, 'IMG_9447.jpg', '2023-11-21 13:03:38', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_image` text NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `product_price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_image`, `uploaded_on`, `product_price`) VALUES
(25, 'hp folio G5', 'IMG_9157.jpg', '0000-00-00 00:00:00', 400),
(26, 'hp', 'IMG_9158.jpg', '0000-00-00 00:00:00', 4444),
(42, 'Keyboard', 'IMG_9219.jpg', '2023-11-21 01:05:16', 10),
(43, 'Keyboard', 'IMG_9157.jpg', '2023-11-21 01:06:23', 30),
(45, 'Keyboard', 'IMG_9157.jpg', '2023-11-21 01:07:44', 30),
(47, 'Keyboard', 'IMG_9157.jpg', '2023-11-21 01:08:40', 30),
(49, 'Keyboard', 'IMG_9158.jpg', '2023-11-21 01:09:52', 30),
(50, 'mouse', 'IMG_9226.jpg', '2023-11-21 01:28:47', 45);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `Email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Name`, `lastName`, `Email`, `password`) VALUES
(6, 'MALIVA', 'NICKSON', 'nickson@gmail.com', '75ef9faee755c70589550b513ad881e5a603182c'),
(7, 'MALI', 'NICOLSON', 'nicksonmaliva2017@gmail.com', '75ef9faee755c70589550b513ad881e5a603182c'),
(8, 'BENGEYA', 'Gullain', 'guillain@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(9, 'Kuda', 'Ferdinand', 'kuda@gmail.com', 'c607994b9ff594d90c6496b739ce2574a562525f');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `o_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
