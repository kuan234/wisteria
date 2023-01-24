-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2023 at 09:30 AM
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
(9, 'sheng', 'zhe', 'kuanzhesheng02@gmail.com', 'Wisteria_123', 0, '2023-01-02'),
(10, 'chu', 'jing', '1201201901@student.mmu.edu.my', 'Wisteria_123', 1, '2023-01-24'),
(11, 'esther', '', '1201202452@student.mmu.edu.my', 'Wisteria_123', 1, '2023-01-24'),
(12, 'sheng', 'zhe', '1201202314@student.mmu.edu.my', 'Wisteria_123', 1, '2023-01-24');

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
(3, 'Aglaonema Lady Valentine', 50, 9, 'Aglaonema Lady Valentine.JPG', 82, 2);

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
(1, 'Potted Plant', 0),
(2, 'CNY Plant', 0),
(3, 'Artifical', 0),
(4, 'Herb', 0),
(5, 'Big Tree', 0),
(6, 'Low Light Plant', 0);

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
(1, 'kuan', 'kuanzhesheng02@gmail.com', 1123412421, 'May i know have any plant stand sells or not?'),
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
(1, 'W000000100', 'Kuan Sheng Zhe', '5436 1738 2461 2939', '6, jln1, tmn', 'kluang', 'Johor', 86200, 180, 82, '2023-01-24', '2023-01-31', 2),
(2, 'W000000101', 'Liong Xin Yei', '4196 2739 1723 0305', '10, Jalan 1, Taman 2', 'Kluang', 'Johor', 86000, 567, 86, '2023-01-24', '2023-01-31', 3),
(3, 'W000000102', 'Ong Chu Jing', '5463 0123 7183 6123', '5,Jalan 1, Taman 10', 'Skudai', 'Johor Bahru', 83000, 310, 1, '2023-01-24', '2023-01-31', 1);

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
(2, 'Aglaonema Lady Valentine', 50, 'Aglaonema Lady Valentine.JPG', 'Pretty in pink! The Lady Valentine is so appealing to the eye. Her leaves are green with splashes of a pretty shade of pink! A super elegant and easy to maintain plant. She will surely be standing out in any space, especially on an office desk. She requires only a little sunlight and can survive with florescent lighting.', 9, 1, 1),
(3, 'Aloe Vera', 60, 'Aloe Vera.JPG', '<p>Aloe Vera has been used extensively for&nbsp;many years in many cultures. It&rsquo;s said that&nbsp;it originated in southern Africa and spread&nbsp;to other warm climates via trade routes.</p>\r\n', 10, 1, 0),
(4, 'Peperomia Obtusifolia', 50, 'Peperomia Obtusifolia.JPG', 'Peperomia Obtusifolia or fondly known as ‘baby rubber plant’ is a low maintenance plant to have. It does not demand a huge amount of care, perfect for the frequent traveler!', 10, 1, 0),
(5, 'Baby Rubber', 25, 'Baby Rubber.JPG', 'The rubber plant or Ficus elastica is a popular ornamental house plant. This plant appreciates being cleaned gently using a soft cloth or a sponge to get that glossy look.', 10, 1, 0),
(6, 'Marble pothos', 20, 'Marble pothos.JPG', '<p>The pothos plant is considered by many to be a great way to get started caring for houseplants. Because pothos care in easy and undemanding, this lovely plant is an easy way to add some green in your home.&nbsp;They do well in bright indirect light as well as low light, making it perfect for beginners.</p>\r\n\r\n<p>It&rsquo;s beautiful foliage when grown will extend into vines. It is easy to control by just cutting the vines that are not needed or have sprawled over.</p>\r\n', 10, 1, 0),
(7, 'Opulent Tangerine Willow', 399, 'Opulent Tangerine Willow.JPG', 'In Chinese tradition, Pussy wIn Chinese tradition, Pussy willow (银柳), also known as catkins is a signifies the coming of Spring and Prosperity. The appearance of their branches of fluffy, furry blossoms and tall height can also be related to the growth and abundance of fortune.\n\nPussy willows can last for months and make for a great decoration even after Chinese New Year is over.', 9, 2, 0),
(8, 'Yānhóng Petite Red Willow', 198, 'Yan Hong Petite Red Willow.JPG', '<p>In Chinese tradition, Pussy wIn Chinese tradition, Pussy willow (银柳), also known as catkins is a signifies the coming of Spring and Prosperity. The appearance of their branches of fluffy, furry blossoms and tall height can also be related to the growth and abundance of fortune.</p>\r\n\r\n<p>Pussy willows can last for months and make for a great decoration even after Chinese New Year is over.</p>\r\n', 10, 2, 0),
(9, 'Ruyi Pink Willow', 298, 'Ruyi Pink Willow.JPG', 'In Chinese tradition, Pussy wIn Chinese tradition, Pussy willow (银柳), also known as catkins is a signifies the coming of Spring and Prosperity. The appearance of their branches of fluffy, furry blossoms and tall height can also be related to the growth and abundance of fortune.\n\nPussy willows can last for months and make for a great decoration even after Chinese New Year is over.', 10, 2, 0),
(10, 'Zixia Petite Purple Willow', 168, 'Zixia Petite Purple Willow.JPG', '<p>In Chinese tradition, Pussy wIn Chinese tradition, Pussy willow (银柳), also known as catkins is a signifies the coming of Spring and Prosperity. The appearance of their branches of fluffy, furry blossoms and tall height can also be related to the growth and abundance of fortune.</p>\r\n\r\n<p>Pussy willows can last for months and make for a great decoration even after Chinese New Year is over.</p>\r\n', 9, 2, 0),
(11, 'Pachira Fa Cai Shu', 258, 'pachira.jpg', '<p>Pachira Fa Cai Shu in Yellow Ceramic Planter. It is a traditional housewarming gift that brings good fortune and happiness to the home.</p>\r\n', 10, 2, 0),
(12, 'Artificial Pepperomia', 250, 'Artificial Pepperomia.JPG', '<p>We understand that most plants will not survive in the darkest corners of your home. Hence, we have hand-picked the most &lsquo;real looking&rsquo; artificial plants to furnish every corner of your home. Trust us, you can&rsquo;t even tell the difference! This artificial alocasia in basket is perfect for places where the sun don&rsquo;t shine.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Height: 70cm</p>\r\n', 9, 3, 0),
(13, 'Artificial Alocasia', 250, 'Artifical.jpg', '<p>We understand that most plants will not survive in the darkest corners of your home. Hence, we have hand-picked the most &lsquo;real looking&rsquo; artificial plants to furnish every corner of your home. Trust us, you can&rsquo;t even tell the difference! This artificial alocasia in basket is perfect for places where the sun don&rsquo;t shine.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Height: 70cm</p>\r\n', 10, 3, 0),
(14, 'Artificial Plant Bird of Paradise', 250, 'Artificial Plant Bird of Paradise.JPG', '<p>We understand that most plants will not survive in the darkest corners of your home. Hence, we have hand-picked the most &lsquo;real looking&rsquo; artificial plants to furnish every corner of your home. Trust us, you can&rsquo;t even tell the difference! This artificial alocasia in basket is perfect for places where the sun don&rsquo;t shine.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Height: 70cm</p>\r\n', 10, 3, 0),
(15, 'Artificial Palm Plant', 250, 'Artificial Palm Plant.JPG', '<p>We understand that most plants will not survive in the darkest corners of your home. Hence, we have hand-picked the most &lsquo;real looking&rsquo; artificial plants to furnish every corner of your home. Trust us, you can&rsquo;t even tell the difference! This artificial alocasia in basket is perfect for places where the sun don&rsquo;t shine.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Height: 70cm</p>\r\n', 10, 3, 0),
(16, 'Artificial Dracaena Cornstalk Plant', 250, 'Artificial Dracaena Cornstalk Plant.JPG', '<p>We understand that most plants will not survive in the darkest corners of your home. Hence, we have hand-picked the most &lsquo;real looking&rsquo; artificial plants to furnish every corner of your home. Trust us, you can&rsquo;t even tell the difference! This artificial alocasia in basket is perfect for places where the sun don&rsquo;t shine.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Height: 70cm</p>\r\n', 10, 3, 0),
(17, 'Chili', 20, 'Chili.JPG', '<p>All chilli peppers are varieties of several plant species in the genus Capsicum. They can be herbaceous or shrub-like but are generally branching with green-brown stems and simple oval leaves.</p>\r\n\r\n<p>The plants produces flowers with five teeth (petals) which are usually white in color. All herbs come in 15cm diameter plastic pot in random colours.</p>\r\n', 7, 4, 0),
(18, 'Lavender', 20, 'Lavender.JPG', 'Lavender (Lavandula angustifolia) is a commonly grown herb plant popular for its fragrant aroma. This easy-care plant enjoys hot, dry conditions, making it suitable for use in a variety of landscape settings and an excellent candidate for areas prone to drought.\n\nAll herbs come in 15cm diameter plastic pot in random colours. ', 10, 4, 0),
(19, 'Mint', 20, 'Mint.JPG', 'Mint is a perennial with very fragrant, toothed leaves and tiny purple, pink, or white flowers. It has a fruity, aromatic taste. As well as kitchen companions, mints are used as garden accents, ground covers, air fresheners, and herbal medicines.\n\nAll herbs come in 15cm diameter plastic pot in random colours. ', 10, 4, 0),
(20, 'Parsley', 20, 'Parsley-e1495888144808-600x450.jpg', '<p>Parsley is a herb that originated in the Mediterranean region of southern Italy, Algeria, and Tunisia. This herb is known scientifically as Petroselinum hortense and Petroselinum crispum and it belongs to the family Apiaceae. All herbs come in 15cm diameter plastic pot in random colours.</p>\r\n', 10, 4, 0),
(21, 'Rosemary', 20, 'Rosemary.JPG', '<p>In 2000, rosemary was selected as Herb of the Year by the International Herb Association, and it&rsquo;s easy to see why. This aromatic evergreen is an indispensable kitchen herb, it&rsquo;s used as an ornamental element in the garden, and it is used in aromatherapy.</p>\r\n\r\n<p>Rosemary is a member of the Labiatae or mint family, and it grows as an evergreen perennial shrub in mild-wintered regions of the world. Its Latin name, Rosmarinus officinalis, means &ldquo;dew of the sea,&rdquo; a reference to its Mediterranean roots.</p>\r\n\r\n<p>All herbs come in 15cm diameter plastic pot in random colours.</p>\r\n', 10, 4, 0),
(22, 'Big ZZ', 200, 'Big ZZ.JPG', '<p>The ZZ Plant (Zamioculcas Zamifolia) is the ultimate plant for brown thumbs, jet setters and the forgetful gardener.It is drought tolerant and requires little light to survive. It can also survive under fluorescent light, making it perfect for an indoor plant.</p>\r\n\r\n<p>Height of plant including pot: 3-4 feet</p>\r\n\r\n<p>Diameter of pot: 1 feet</p>\r\n', 10, 5, 0),
(23, 'Dracaena Draco', 350, 'Dracaena Draco.JPG', 'Draco comes in stiffly looking leaf resembling a spike. Sometimes called Dragon’s Blood plant, this tough plant is available at 4-5 feet height in either white or black ceramic pot.', 10, 5, 0),
(24, 'Dracaena Medusa', 250, 'Dracaena Medusa.JPG', '<p>To us, Dracaena Medusa (Dracaena Reflexa Longifolia) is the most delicate and bushy looking. It has long and soft cascading green leaves and can thrive in low light conditions making it suitable as an indoor statement plant. This plant is very rare and hard to find and is available while stocks last. It comes in a white ceramic pot and white saucer.</p>\r\n\r\n<p>Diameter of pot: 30cm</p>\r\n\r\n<p>Height of plant and pot: 4-5 feet</p>\r\n', 10, 5, 0),
(25, 'Monstera Deliciosa', 200, 'Monstera Deliciosa.JPG', '<p>This sub-tropical climber is native to the rainforest of South Mexico and is a popular for its recognisable leaves that is featured in art prints and designs.</p>\r\n\r\n<p>It is very popular for its foliage effect indoors. If you are looking to fill up a bright and sunny corner, Monstera will do the trick! This plant is approx 3ft and comes in a ceramic pot with colour of choosing with a plastic saucer. Of course, it will grow a monstrous size if she is happy.</p>\r\n', 10, 5, 0),
(26, 'Big Yellow Palm', 150, 'Big Yellow Palm.JPG', '<p>Potted yellow palm or also known as the Areca Palm bring color and warmth to any room in the house. Yellow palm works well indoors because it&rsquo;s small, normally reaching a height of about 7 feet and it doesn&rsquo;t need full sun. The tree originated in Mexico and Honduras and is found growing as an understory palm.</p>\r\n\r\n<p>AIR PURIFYING QUALITY According to NASA, yellow palm tops the list of plants best for filtering out formaldehyde, xylene and toluene. It comes in either white or black ceramic pot with a matching plastic saucer.</p>\r\n', 10, 5, 0),
(27, 'Aglaonema Pink Dalmation', 65, 'Aglaonema Pink Dalmation.JPG', '<p>True to it&rsquo;s name, but she has pink sporadic spots and a contrasting with a deep green and a pink stem. The colour combination is nature at it&rsquo;s best! Who would have thought it would make a beautiful house plant.</p>\r\n\r\n<p>Super easy to maintain and not a fussy plant when it comes to care. Just make sure to rotate her pot every once in a while so she will grow evenly as she tends to &ldquo;follow&rdquo; the sun. This plant comes in white Mad Matte pot with matching saucer.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Diameter of pot: 15cm</p>\r\n\r\n<p>Height of pot and plant: 30cm</p>\r\n', 8, 6, 0),
(28, 'Golden Pothos', 25, 'Golden Pothos.JPG', 'This fast-growing vine, known as Money Plant or Golden Pothos (Epipremnum Aureum) is a popular houseplant. It is also called the devil’s ivy because it is almost impossible to kill, making it perfect for people who frequently travel.', 10, 6, 0),
(29, 'Marble pothos', 45, 'Marble pothos.JPG', '<p>The pothos plant is considered by many to be a great way to get started caring for houseplants. Because pothos care in easy and undemanding, this lovely plant is an easy way to add some green in your home. They do well in bright indirect light as well as low light, making it perfect for beginners.</p>\r\n\r\n<p>It&rsquo;s beautiful foliage when grown will extend into vines. It is easy to control by just cutting the vines that are not needed or have sprawled over.</p>\r\n', 10, 6, 0),
(30, 'Money Plant in Short Stand', 130, 'Money Plant in Short Stand.JPG', '<p>This fast-growing vine, known as Money Plant or Golden Pothos (Epipremnum Aureum) is a popular houseplant. It is also called the devil&rsquo;s ivy because it is almost impossible to kill, making it perfect for people who frequently travel. This product comes with either black or white ceramic pot with saucer, plant stand and money plant.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Diameter of stand: 25cm</p>\r\n\r\n<p>Height of stand: 30cm</p>\r\n\r\n<p>Height of plant and stand: 120cm</p>\r\n', 10, 6, 0),
(31, 'Snake Plant', 35, 'Snake Plant.JPG', '<p>Snake plants (Sansevieria) can be awarded as the perfect houseplant! It is drought tolerant and needs little light to survive. The Snake Plant is one of the few plants that converts CO2 (carbon dioxide) to O2 (oxygen) at night and thus making it the perfect houseplant to have in your bedroom.</p>\r\n\r\n<p>Small ceramic pot diameter: 15cm</p>\r\n\r\n<p>Small plastic pot diameter: 12cm</p>\r\n\r\n<p>Medium ceramic pot diameter: 18cm</p>\r\n\r\n<p>Medium plastic pot diameter: 15cm</p>\r\n', 10, 6, 0);

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
(1, 'Ong Chu Jing', '', '', '', 0, 123456789, '2023-01-23', 1, 'Artifical.jpg'),
(29, 'Kuan Sheng Zhe', '6, jln1, tmn', 'Johor', 'kluang', 86200, 1234567801, '2015-06-23', 82, 'cup.jpg'),
(32, '1201202314', '10,Jalan Ye, Taman Ye', 'Johor', 'Kluang', 86000, 112345678, '0000-00-00', 85, 'user.png'),
(33, '', '', '', '', NULL, 1123456789, '0000-00-00', 86, NULL);

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
(1, 1, 'Aglaonema Pink Dalmation', 65, 2, 'Aglaonema Pink Dalmation.JPG'),
(2, 1, 'Aglaonema Lady Valentine', 50, 1, 'Aglaonema Lady Valentine.JPG'),
(3, 2, 'Opulent Tangerine Willow', 399, 1, 'Opulent Tangerine Willow.JPG'),
(4, 2, 'Zixia Petite Purple Willow', 168, 1, 'Zixia Petite Purple Willow.JPG'),
(5, 3, 'Artificial Pepperomia', 250, 1, 'Artificial Pepperomia.JPG'),
(6, 3, 'Chili', 20, 3, 'Chili.JPG');

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
(1, '1201201901@student.mmu.edu.my', 'Wisteria_123', '', 1, '2022-12-10 09:41:47'),
(82, 'kuanzhesheng02@gmail.com', 'Wisteria_123', 'c3777e20910a577ff1dee2cc3b2d3c2d', 1, '2022-12-13 17:48:58'),
(85, '1201202314@student.mmu.edu.my', 'Wisteria_123', '2a058b82ab66b883e26152a7a643123f', 1, '2023-01-12 17:42:34'),
(86, '1201202452@student.mmu.edu.my', 'Wisteria_123', '9090f915e52ef80c8fd7cd7eb0e0c06c', 1, '2023-01-24 08:12:14');

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
  MODIFY `admid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_manage`
--
ALTER TABLE `order_manage`
  MODIFY `orderID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prodID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `infoid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user_order`
--
ALTER TABLE `user_order`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_reg`
--
ALTER TABLE `user_reg`
  MODIFY `uid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

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
-- Constraints for table `user_info`
--
ALTER TABLE `user_info`
  ADD CONSTRAINT `user_info_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_reg` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
