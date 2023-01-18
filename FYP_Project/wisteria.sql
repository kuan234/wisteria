-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2023 at 09:00 AM
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
  `role_as` tinyint(1) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admlogin`
--

INSERT INTO `admlogin` (`admid`, `firstname`, `lastname`, `emailaddress`, `pw`, `role_as`, `created_at`) VALUES
(1, 'q', 'we', 'qwe@email.com', '123', 0, '2022-11-02'),
(3, 'testi\\', '1', 'test1@gmail.com', 'Wisteria_123', 1, '2022-12-19'),
(4, 's', 'k', 'test2@gmail.com', '12345', 0, '2022-12-20'),
(5, 'test', '3', 'test3@gmail.com', '12345', 0, '2022-12-20'),
(7, 'k', '123', 'kuan@email.com', '12345', 1, '2022-12-20'),
(9, 'sheng', 'zhe', 'kuanzhesheng02@gmail.com', 'e18b284b666dd22675c001c6eb3979f1', 1, '2023-01-02');

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
  `user_id` int(20) NOT NULL,
  `prod_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `name`, `price`, `quantity`, `image`, `user_id`, `prod_id`) VALUES
(13, 'Marble Pothos', 30, 1, 'Marble pothos.PNG', 82, 14);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(100) NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 0 COMMENT '0-available, 1-unavailable'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `status`) VALUES
(1, 'Pot Plant', 0),
(2, 'Herb', 0),
(3, 'High Light Plant', 0),
(4, 'Low Light Plant', 0),
(5, 'Big Tree', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(100) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_phone` int(11) NOT NULL,
  `contact_message` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `contact_name`, `contact_email`, `contact_phone`, `contact_message`) VALUES
(1, 'kuan', 'kuanzhesheng02@gmail.com', 1123412421, 'trying to get a long text.trying to get a long text.trying to get a long text.trying to get a long text.trying to get a long text.trying to get a long text.trying to get a long text.trying to get a long text.trying to get a long text.trying to get a long text.trying to get a long text.trying to get a long text.trying to get a long text.'),
(2, 'hey', 'hey@gmail.com', 1237416723, 'yoyo'),
(3, 'kuan', '1201202314@student.mmu.edu.my', 124726372, 'Hi, Is Philodendron Lemon Lime have sells in shop?');

-- --------------------------------------------------------

--
-- Table structure for table `order_manage`
--

CREATE TABLE `order_manage` (
  `orderID` int(100) NOT NULL,
  `order_number` varchar(255) DEFAULT NULL,
  `order_name` varchar(255) NOT NULL,
  `order_cardnum` varchar(20) NOT NULL,
  `order_address` varchar(255) NOT NULL,
  `order_city` varchar(100) NOT NULL,
  `order_state` varchar(100) NOT NULL,
  `order_postcode` int(10) NOT NULL,
  `order_price` float NOT NULL,
  `order_user_id` int(100) NOT NULL,
  `order_date` date DEFAULT current_timestamp(),
  `delivery_date` date NOT NULL DEFAULT current_timestamp(),
  `status` int(20) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_manage`
--

INSERT INTO `order_manage` (`orderID`, `order_number`, `order_name`, `order_cardnum`, `order_address`, `order_city`, `order_state`, `order_postcode`, `order_price`, `order_user_id`, `order_date`, `delivery_date`, `status`) VALUES
(1, 'W000000100', 'kuan Sheng Zhe', '5423 1342 3123 4123', '6, jln1, tmn1', 'kluang', 'Johor', 12345, 40, 82, '2023-01-11', '2023-01-18', 2),
(2, 'W000000101', 'kuan Sheng Zhe', '5454 3534 5345 3434', '6, jln1, tmn1', 'kluang', 'Johor', 12345, 60, 82, '2023-01-12', '2023-01-19', 3),
(3, 'W000000102', '1201202314', '1231 2312 3123 1231', '10,Jalan Ye, Taman Ye', 'Kluang', 'Johor', 86000, 75, 85, '2023-01-16', '2023-01-22', 2),
(4, 'W000000103', 'Kuan Sheng Zhe', '5126 4826 0748 2542', '6, jln1, tmn1', 'kluang', 'Johor', 12345, 140, 82, '2023-01-16', '2023-01-23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prodID` int(20) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` float NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `quantity` int(10) NOT NULL,
  `category` int(20) NOT NULL,
  `is_delete` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0-available, 1-unavailable'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prodID`, `product_name`, `product_price`, `product_image`, `description`, `quantity`, `category`, `is_delete`) VALUES
(1, 'Aloe Vara', 20, 'Aloe_Vara.jpg', '<p>Aloe Vara is a Pot Plant. <strong>Aloe Vara Saigo!</strong>!</p>\r\n', 10, 1, 1),
(13, 'Artifical', 15, 'Artifical.jpg', 'this is a long long long long long long long long long longlong v vlonglong long long long long long long long long long long long long longlonglonglonglonglonglong longlonglonglong text. long long long long long long ', 2, 2, 0),
(14, 'Marble Pothos', 30, 'Marble pothos.PNG', '<p>Testing for unavailvle edit .<s><em> EIhehehehehe</em></s></p>\r\n', 15, 3, 0),
(15, 'Baby Rubber', 25, 'Baby_Rubber.jpg', 'rubber', 2, 1, 0),
(18, 'Peach Lily', 20, 'Peace Lily.PNG', '<p>Peach Lily</p>\r\n\r\n<p>&nbsp;</p>\r\n', 0, 1, 0),
(19, 'zz plants', 11, 'ZZ Plant.PNG', '<p>zzplant</p>\r\n\r\n<p>&nbsp;</p>\r\n', 13, 1, 0),
(20, 'Aglaonema Lady Valentine', 20, 'Aglaonema Lady Valentine.jpg', '<p><em>Agaonema Lady Valentine</em>&nbsp;<strong>Hahahaha</strong></p>\r\n\r\n<p><strong>S</strong>Hdhuenf</p>\r\n\r\n<p>jdiejdiejiejdijei</p>\r\n', 5, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(10) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status`) VALUES
(1, 'Pending'),
(2, 'Delivered'),
(3, 'Completely');

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
(29, 'Kuan Sheng Zhe', '6, jln1, tmn1', 'Johor', 'kluang', 12345, 123456789, '2015-06-23', 82, 'Aglaonema Lady Valentine.jpg'),
(32, '1201202314', '10,Jalan Ye, Taman Ye', 'Johor', 'Kluang', 86000, 112345678, '0000-00-00', 85, 'user.png');

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
(1, 1, 'Baby Rubber', 25, 1, 'Baby_Rubber.jpg'),
(2, 1, 'Artifical', 15, 1, 'Calathea.jpg'),
(3, 2, 'Baby Rubber', 25, 1, 'Baby_Rubber.jpg'),
(4, 2, 'Artifical', 15, 1, 'Calathea.jpg'),
(5, 2, 'Peach Lily', 20, 1, 'Peace Lily.PNG'),
(6, 3, 'Artifical', 15, 1, 'Calathea.jpg'),
(7, 3, 'Aglaonema Lady Valentine', 20, 3, 'Aglaonema Lady Valentine.jpg'),
(8, 4, 'Aglaonema Lady Valentine', 20, 7, 'Aglaonema Lady Valentine.jpg');

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
(59, 'sz123@gmail.com', '123', '', 0, '2022-12-10 09:41:47'),
(82, 'kuanzhesheng02@gmail.com', 'Wisteria_123', 'c3777e20910a577ff1dee2cc3b2d3c2d', 1, '2022-12-13 17:48:58'),
(85, '1201202314@student.mmu.edu.my', 'Wisteria_123', '2a058b82ab66b883e26152a7a643123f', 1, '2023-01-12 17:42:34');

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
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_manage`
--
ALTER TABLE `order_manage`
  ADD PRIMARY KEY (`orderID`),
  ADD UNIQUE KEY `order_number` (`order_number`),
  ADD KEY `Foreignkey` (`order_user_id`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prodID`),
  ADD KEY `categorykey` (`category`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `admid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_manage`
--
ALTER TABLE `order_manage`
  MODIFY `orderID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prodID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `infoid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user_order`
--
ALTER TABLE `user_order`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_reg`
--
ALTER TABLE `user_reg`
  MODIFY `uid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

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
  ADD CONSTRAINT `Foreignkey` FOREIGN KEY (`order_user_id`) REFERENCES `user_reg` (`uid`),
  ADD CONSTRAINT `KeyStatus` FOREIGN KEY (`status`) REFERENCES `status` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `categorykey` FOREIGN KEY (`category`) REFERENCES `category` (`id`);

--
-- Constraints for table `user_info`
--
ALTER TABLE `user_info`
  ADD CONSTRAINT `user_info_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_reg` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
