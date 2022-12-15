-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2022 at 09:50 AM
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
(1, 'q', 'we', 'qwe@email.com', '123', 0, 0, '2022-11-02');

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

-- --------------------------------------------------------

--
-- Table structure for table `order_manage`
--

CREATE TABLE `order_manage` (
  `orderID` int(100) NOT NULL,
  `order_number` varchar(255) DEFAULT NULL,
  `order_name` varchar(255) NOT NULL,
  `order_cardnum` int(20) NOT NULL,
  `order_address` varchar(255) NOT NULL,
  `order_city` varchar(100) NOT NULL,
  `order_state` varchar(100) NOT NULL,
  `order_postcode` int(10) NOT NULL,
  `order_user_id` int(100) NOT NULL,
  `order_date` date DEFAULT current_timestamp(),
  `delivery_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_manage`
--

INSERT INTO `order_manage` (`orderID`, `order_number`, `order_name`, `order_cardnum`, `order_address`, `order_city`, `order_state`, `order_postcode`, `order_user_id`, `order_date`, `delivery_date`) VALUES
(2, NULL, 'kuan', 123456789, 'mmmmm', 'melaka', 'melaka', 123321, 1, '2022-12-05', '2022-12-07'),
(16, NULL, 'test4', 123213, 'hhh', 'jjj', 'kkk', 123322, 1, '2022-12-05', '2022-12-07'),
(24, 'W00000000100', 'test3', 2147483647, '6,jalan10,permata1', 'mmm', 'mlk', 12345, 1, '2022-12-07', '2022-12-07'),
(27, 'W00000010102', 'test11', 12341234, 'wqdqwdwqdq', 'mlk', 'mlk', 88888, 1, '2022-12-07', '2022-12-14'),
(28, 'W00000010103', 'test44', 2147483647, 'jjjhdlahegbf', 'MLK', 'MLK', 12345, 1, '2022-12-07', '2022-12-14'),
(29, 'W00000010104', 'kk', 1231231231, '123123', '12312312', '32132131', 32131, 1, '2022-12-08', '2022-12-15'),
(30, 'W00000010105', 'k', 1234, 'ewqe', 'qe', 'qwe', 12345, 1, '2022-12-09', '2022-12-16'),
(34, 'W00000010106', 'kk', 2147483647, '6, jln1, tmn1', 'kluang', 'johor', 86000, 82, '2022-12-14', '2022-12-20'),
(35, 'W00000010107', '22', 22, '6, jln1, tmn1', 'kluang', 'johor', 86000, 82, '2022-12-15', '2022-12-22');

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
  `state` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `postcode` int(5) DEFAULT NULL,
  `phone` int(12) NOT NULL,
  `birthday` date NOT NULL,
  `user_id` int(20) NOT NULL,
  `user_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`infoid`, `username`, `address`, `state`, `city`, `postcode`, `phone`, `birthday`, `user_id`, `user_image`) VALUES
(1, 'kuan', '1, Jalan Bass 1, Taman gugua, 21111, Melaka', '', '', NULL, 123456789, '2022-09-19', 1, 'Artifical.jpg'),
(29, 'kuan', '6, jln1, tmn1', 'johor', 'kluang', 86000, 1123456789, '2015-06-23', 82, 'shawnmendes.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `user_order`
--

CREATE TABLE `user_order` (
  `id` int(100) NOT NULL,
  `order_id` int(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_order`
--

INSERT INTO `user_order` (`id`, `order_id`, `product_name`, `price`, `quantity`, `image`) VALUES
(18, 27, 'Artifical', 20, 5, 'Artifical.jpg'),
(21, 28, 'Marble Pothos', 35, 1, 'Marble pothos.PNG'),
(22, 28, 'Artifical', 20, 1, 'Artifical.jpg'),
(23, 28, 'Baby Rubber', 25, 1, 'Baby_Rubber.jpg'),
(25, 29, 'Artifical', 20, 3, 'Artifical.jpg'),
(26, 30, 'Aloe Vara', 20, 4, 'Aloe_Vara.jpg'),
(27, 30, 'Artifical', 20, 1, 'Artifical.jpg'),
(28, 31, 'Artifical', 20, 2, 'Artifical.jpg'),
(29, 31, 'Aloe Vara', 20, 1, 'Aloe_Vara.jpg'),
(30, 33, 'Artifical', 20, 1, 'Artifical.jpg'),
(31, 33, 'Baby Rubber', 25, 1, 'Baby_Rubber.jpg'),
(32, 34, 'Aloe Vara', 20, 4, 'Aloe_Vara.jpg'),
(33, 34, 'Artifical', 20, 3, 'Artifical.jpg'),
(34, 35, 'Artifical', 20, 3, 'Artifical.jpg'),
(35, 35, 'Baby Rubber', 25, 1, 'Baby_Rubber.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_reg`
--

CREATE TABLE `user_reg` (
  `uid` int(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `verify_status` tinyint(2) NOT NULL DEFAULT 0 COMMENT '0=no,1=yes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_reg`
--

INSERT INTO `user_reg` (`uid`, `email`, `password`, `token`, `verify_status`, `created_at`) VALUES
(1, 'email@gmail.com', '', '', 0, '2022-12-10 09:41:47'),
(59, 'sz123@gmail.com', '', '', 0, '2022-12-10 09:41:47'),
(82, 'kuanzhesheng02@gmail.com', '2551e68d7609259415d85a392198a560', 'c3777e20910a577ff1dee2cc3b2d3c2d', 1, '2022-12-13 17:48:58');

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
-- Indexes for table `order_manage`
--
ALTER TABLE `order_manage`
  ADD PRIMARY KEY (`orderID`),
  ADD UNIQUE KEY `order_number` (`order_number`),
  ADD KEY `Foreignkey` (`order_user_id`);

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
-- Indexes for table `user_order`
--
ALTER TABLE `user_order`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `order_manage`
--
ALTER TABLE `order_manage`
  MODIFY `orderID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prodID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `infoid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user_order`
--
ALTER TABLE `user_order`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `user_reg`
--
ALTER TABLE `user_reg`
  MODIFY `uid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_reg` (`uid`);

--
-- Constraints for table `order_manage`
--
ALTER TABLE `order_manage`
  ADD CONSTRAINT `Foreignkey` FOREIGN KEY (`order_user_id`) REFERENCES `user_reg` (`uid`);

--
-- Constraints for table `user_info`
--
ALTER TABLE `user_info`
  ADD CONSTRAINT `user_info_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_reg` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
