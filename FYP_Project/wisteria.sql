-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2022 at 08:06 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wisteria`
--

-- --------------------------------------------------------

--
-- Table structure for table `admlogin`
--

CREATE TABLE `admlogin` (
  `admid` int(5) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `emailaddress` varchar(80) NOT NULL,
  `pw` varchar(80) NOT NULL,
  `role_as` tinyint(4) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admlogin`
--

INSERT INTO `admlogin` (`admid`, `firstname`, `lastname`, `emailaddress`, `pw`, `role_as`, `status`, `created_at`) VALUES
(1, '', '', 'qwe@email.com', '123', 0, 0, '2022-11-02'),
(2, '', '', 'qwe@email.com', '123', 0, 0, '2022-11-02');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(10) NOT NULL,
  `image` varchar(255) NOT NULL,
  `user_id` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `name`, `price`, `quantity`, `image`, `user_id`) VALUES
(3, 'Marble Pothos', 35, 4, 'Marble pothos.PNG', 1),
(10, 'Artifical', 20, 1, 'Artifical.jpg', 18),
(11, 'Baby Rubber', 25, 1, 'Baby_Rubber.jpg', 18),
(12, 'Aloe Vara', 20, 5, 'Aloe_Vara.jpg', 18),
(13, 'Marble Pothos', 35, 4, 'Marble pothos.PNG', 18),
(14, 'Artifical', 20, 1, 'Artifical.jpg', 1),
(15, 'Aloe Vara', 20, 1, 'Aloe_Vara.jpg', 1),
(16, 'Baby Rubber', 25, 1, 'Baby_Rubber.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prodID` int(20) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `quantity` int(10) NOT NULL,
  `category` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prodID`, `product_name`, `product_price`, `product_image`, `description`, `quantity`, `category`) VALUES
(1, 'Aloe Vara', '20', 'Aloe_Vara.jpg', 'Aloe Vara is a Pot Plants.', 50, 'Pot Plants'),
(13, 'Artifical', '20', 'Artifical.jpg', 'euwifjknm', 20, 'pot_plants'),
(14, 'Marble Pothos', '35', 'Marble pothos.PNG', 'Marble', 15, 'herbs'),
(15, 'Baby Rubber', '25', 'Baby_Rubber.jpg', 'rubber', 15, 'pot_plants');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `infoid` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` int(12) NOT NULL,
  `birthday` date NOT NULL,
  `user_id` int(20) DEFAULT NULL,
  `user_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`infoid`, `username`, `address`, `phone`, `birthday`, `user_id`, `user_image`) VALUES
(1, 'kuan sheng zhe', '1, Jalan Bass 1, Taman 1, 21111, Melaka', 123, '2011-08-21', 1, 'shawnmendes.jpg'),
(2, 'kuan', 'melaka', 123456789, '2001-01-01', 18, 'user.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_reg`
--

CREATE TABLE `user_reg` (
  `uid` int(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_reg`
--

INSERT INTO `user_reg` (`uid`, `email`, `password`) VALUES
(1, 'email@gmail.com', '123'),
(2, 'wqe@email.com', 'wp123!@#'),
(3, 'lol@email.com', 'wp123!@#'),
(18, 'kuan123@email.com', 'kuan123'),
(19, 'kkk@email.com', 'kkk123'),
(20, 'qwe@email.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admlogin`
--
ALTER TABLE `admlogin`
  ADD PRIMARY KEY (`admid`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prodID`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`infoid`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_reg`
--
ALTER TABLE `user_reg`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admlogin`
--
ALTER TABLE `admlogin`
  MODIFY `admid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prodID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `infoid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_reg`
--
ALTER TABLE `user_reg`
  MODIFY `uid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_reg` (`uid`);

--
-- Constraints for table `user_info`
--
ALTER TABLE `user_info`
  ADD CONSTRAINT `user_info_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_reg` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
