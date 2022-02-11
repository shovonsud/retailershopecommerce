-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2022 at 02:25 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventorycontrolsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `status`) VALUES
(1, 'Laundry &amp; Dishwashing', 1),
(2, 'Household Cleaning', 1),
(3, 'Shaving &amp; Grooming', 1),
(4, 'Oral Care', 1),
(5, 'Hand Care', 1),
(6, 'Family Nutrition', 1),
(7, 'Air Fresheners', 1),
(8, 'Grocery &amp; Gourmet Foods', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `generated_id` varchar(255) NOT NULL,
  `cust_name` varchar(255) NOT NULL,
  `cust_addr` varchar(255) NOT NULL,
  `cust_phn` varchar(10) NOT NULL,
  `order_cart` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`order_cart`)),
  `carttotal` double NOT NULL,
  `order_attended` int(11) NOT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `generated_id`, `cust_name`, `cust_addr`, `cust_phn`, `order_cart`, `carttotal`, `order_attended`, `timestamp`) VALUES
(1, 'ORD16403223498421583', 'Abhishek Sanyal', 'N/A', '7191366529', '[{\"itemid\":13,\"qty\":\"1\"},{\"itemid\":2,\"qty\":\"1\"},{\"itemid\":12,\"qty\":\"2\"}]', 930, 1, '2021-12-24 10:35:49'),
(2, 'ORD16403224958755541', 'Riddhi Dutta', '42/B Phoolbagan, Kolkata-005', '6127908200', '[{\"itemid\":16,\"qty\":\"1\"},{\"itemid\":14,\"qty\":\"2\"},{\"itemid\":4,\"qty\":\"1\"}]', 674, 1, '2021-12-24 10:38:15'),
(3, 'ORD16403225799140274', 'Sagar Biswas', 'N/A', '7979012097', '[{\"itemid\":3,\"qty\":\"1\"},{\"itemid\":2,\"qty\":\"1\"},{\"itemid\":17,\"qty\":\"1\"}]', 518, 1, '2021-12-24 10:39:39'),
(4, 'ORD16403233386106067', 'Mansij Banerjee', 'N/A', '6127926683', '[{\"itemid\":1,\"qty\":\"1\"},{\"itemid\":6,\"qty\":\"1\"},{\"itemid\":14,\"qty\":\"1\"}]', 882, 1, '2021-12-24 10:52:18'),
(5, 'ORD16403257139834999', 'Raja Sen', 'N/A', '7471860402', '[{\"itemid\":12,\"qty\":\"2\"},{\"itemid\":13,\"qty\":\"1\"}]', 783, 0, '2021-12-24 11:31:53'),
(6, 'ORD16403258128039180', 'Sagar Biswas', 'N/A', '6127984642', '[{\"itemid\":10,\"qty\":\"1\"},{\"itemid\":12,\"qty\":\"1\"}]', 480, 1, '2021-12-24 11:33:32'),
(7, 'ORD16403260674143063', 'Seema Gupta', 'N/A', '8917584483', '[{\"itemid\":4,\"qty\":\"1\"},{\"itemid\":8,\"qty\":\"1\"},{\"itemid\":9,\"qty\":\"1\"}]', 673, 1, '2021-12-24 11:37:47'),
(8, 'ORD16403261656659330', 'Pratik Kuhad', 'N/A', '6127998789', '[{\"itemid\":12,\"qty\":\"2\"},{\"itemid\":6,\"qty\":\"1\"}]', 958, 0, '2021-12-24 11:39:25'),
(9, 'ORD16403262803748661', 'Shilpa Sikdar', 'N/A', '6127932612', '[{\"itemid\":6,\"qty\":\"1\"},{\"itemid\":2,\"qty\":\"2\"}]', 628, 0, '2021-12-24 11:41:20'),
(10, 'ORD16403263401229223', 'Ronty Sen', 'N/A', '8917270836', '[{\"itemid\":1,\"qty\":\"1\"},{\"itemid\":8,\"qty\":\"1\"}]', 510, 0, '2021-12-24 11:42:20'),
(11, 'ORD16403263778573702', 'Somnath Sikder', 'N/A', '6310313473', '[{\"itemid\":12,\"qty\":\"2\"}]', 624, 0, '2021-12-24 11:42:57'),
(12, 'ORD16403264314870635', 'Neeraj Chopra', 'N/A', '7285237743', '[{\"itemid\":1,\"qty\":\"1\"}]', 350, 0, '2021-12-24 11:43:51'),
(13, 'ORD16403265119355358', 'Sudipto Dasgupta', 'N/A', '6511253496', '[{\"itemid\":4,\"qty\":\"2\"}]', 368, 1, '2021-12-24 11:45:11'),
(14, 'ORD164032668590025', 'Samar Gupta', 'N/A', '6127957593', '[{\"itemid\":16,\"qty\":\"1\"},{\"itemid\":3,\"qty\":\"1\"}]', 386, 0, '2021-12-24 11:48:05'),
(15, 'ORD16403284621113810', 'Sudipto Dasgupta', 'N/A', '9868891236', '[{\"itemid\":16,\"qty\":\"6\"}]', 564, 0, '2021-12-24 12:17:42'),
(16, 'ORD1641892914297522', 'Sudipto Dasgupta', 'N/A', '9868891236', '[{\"itemid\":5,\"qty\":\"2\"}]', 898, 0, '2022-01-11 14:51:54');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `variant` tinytext NOT NULL,
  `picturefilepath` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `item_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`item_id`, `item_name`, `variant`, `picturefilepath`, `cat_id`, `unit_price`, `quantity`, `item_status`) VALUES
(1, 'Surf Excel Matic Top Load Detergent Washing Powder', '2 Kg', '../../assets/images/products/Item1.jpg', 1, '350.00', 9, 1),
(2, 'Vim Dishwash Liquid Gel Lemon', '750 ml', '../../assets/images/products/Item2.jpg', 1, '147.00', 2, 1),
(3, 'Godrej Ezee Liquid Detergent-Winterwear', '2 Kg', '../../assets/images/products/Item3.jpg', 1, '292.00', 1, 1),
(4, 'Surf Excel Easy Wash Detergent Powder', '1.5 Kg', '../../assets/images/products/Item4.jpg', 1, '184.00', 8, 1),
(5, 'Ariel Matic Top Load Detergent Washing Powder', '2 Kg', '../../assets/images/products/Item5.jpg', 1, '449.00', 4, 1),
(6, 'Lizol Disinfectant Surface &amp; Floor Cleaner Liquid (Citrus)', '2 L', '../../assets/images/products/Item6.jpg', 2, '334.00', 3, 1),
(7, 'Lizol Disinfectant Surface &amp; Floor Cleaner Liquid (Citrus)', '950 ml', '../../assets/images/products/Item7.jpg', 2, '158.00', 0, 1),
(8, 'Pidilite T16 Roff Cera Clean Professional Tile, Floor and Ceramic Cleaner', '1 L', '../../assets/images/products/Item8.jpg', 2, '160.00', 4, 1),
(9, 'Harpic Powerplus Disinfectant Toilet Cleaner, Original(Pack of 2)', '1 L', '../../assets/images/products/Item9.jpg', 2, '329.00', 3, 1),
(10, 'Harpic Disinfectant Toilet Cleaner Liquid', '1 L', '../../assets/images/products/Item10.jpg', 2, '168.00', 1, 1),
(11, 'Domex Fresh Guard Lime Fresh Disinfectant Liquid Toilet Cleaner', '750 ml', '../../assets/images/products/Item11.jpg', 2, '85.00', 3, 1),
(12, 'Dettol Liquid Disinfectant Cleaner for Home, Lime Fresh', '1 L', '../../assets/images/products/Item12.jpg', 2, '312.00', 10, 1),
(13, 'Dettol Disinfectant Sanitizer Spray', '225 ml', '../../assets/images/products/Item13.jpg', 2, '159.00', 5, 1),
(14, 'Dettol Liquid Refil', '1500 ml', '../../assets/images/products/Item14.jpg', 5, '198.00', 0, 1),
(15, 'Beardo Beard &amp; Hair Growth Oil', '50 ml', '../../assets/images/products/Item15.webp', 3, '699.00', 6, 1),
(16, 'Colgate MaxFresh Breath Freshner Toothpaste', '150 g', '../../assets/images/products/Item16.jpg', 4, '94.00', 6, 1),
(17, 'Dabur Red Gel Toothpaste + ToothBrush', '300 g', '../../assets/images/products/Item17.jpg', 4, '79.00', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email_id`, `phone`, `username`, `password`) VALUES
(1, 'Sudipto', 'Dasgupta', 'shovon.das.gupta@gmail.com', '9062416156', 'shovon_sud', '970072f9595eb5a4ba3bf36d6968eba0'),
(2, 'Himanshu', 'Kumar', 'kumarhimanshu2310@gmail.com', '7050223219', 'him_kum', '2728388deb1a7443dc4a485b4f83e2cc'),
(3, 'Iman', 'Maity', 'imanthedevil@gmail.com', '9475092373', 'iman_maity', '99ce8f8db3291e3d2cf17a09e1fd11a5'),
(4, 'Simi', 'Gupta', 'simmigupta4999@gmail.com', '9088453723', 'simi_gupta', 'd52fde62989536df584d92589debb7f6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD UNIQUE KEY `u_generated_id` (`generated_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
