-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2022 at 01:07 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doctor_moringa`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(100) NOT NULL,
  `cart_item_name` varchar(100) NOT NULL,
  `cart_item_id` varchar(255) NOT NULL,
  `cart_item_description` varchar(100) NOT NULL,
  `cart_price` varchar(100) NOT NULL,
  `cart_user_id` varchar(100) NOT NULL,
  `cart_user_name` varchar(100) NOT NULL,
  `cart_user_contact` varchar(100) NOT NULL,
  `cart_user_email` varchar(100) NOT NULL,
  `cart_user_state` varchar(100) NOT NULL,
  `cart_user_city` varchar(100) NOT NULL,
  `cart_user_address` varchar(100) NOT NULL,
  `cart_user_pincode` varchar(100) NOT NULL,
  `cart_qty` varchar(100) NOT NULL,
  `cart_added_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cart_order_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `cart_item_name`, `cart_item_id`, `cart_item_description`, `cart_price`, `cart_user_id`, `cart_user_name`, `cart_user_contact`, `cart_user_email`, `cart_user_state`, `cart_user_city`, `cart_user_address`, `cart_user_pincode`, `cart_qty`, `cart_added_date`, `cart_order_id`) VALUES
(19, 'itom 1', '50', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas commodo dapibus cursus. Suspendiss', 'â‚¹100', '34', '', '8052738410', '', '', '', '', '', '2', '2022-05-27 23:43:34', ''),
(28, 'itom 1', '50', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas commodo dapibus cursus. Suspendiss', 'â‚¹100', '35', '', '8052738420', '', '', '', '', '', '1', '2022-05-28 16:34:55', '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(100) NOT NULL,
  `category_image` varchar(100) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_description` varchar(100) NOT NULL,
  `category_added_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_image`, `category_name`, `category_description`, `category_added_on`) VALUES
(7, 'weight-loss.png', 'Weight Loss', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2022-05-06 12:34:07'),
(8, 'beauty.png', 'Beauty', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2022-05-06 12:35:26'),
(9, 'diabetes.png', 'Diabetes', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2022-05-06 12:35:34'),
(10, 'heart-disease.png', 'Heart Disease', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2022-05-06 12:35:45'),
(11, 'ortho-aid.png', 'Ortho Aid', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2022-05-06 12:35:52');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `inventory_id` int(100) NOT NULL,
  `inventory_cat_id` varchar(100) NOT NULL,
  `inventory_cat_name` varchar(100) NOT NULL,
  `inventory_item_id` varchar(100) NOT NULL,
  `inventory_item_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_description` varchar(100) NOT NULL,
  `item_filename` varchar(100) NOT NULL,
  `item_filename_back` varchar(100) NOT NULL,
  `item_price` varchar(100) NOT NULL,
  `item_category` varchar(100) NOT NULL,
  `item_status` varchar(100) NOT NULL COMMENT '1=Active, 2=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `item_description`, `item_filename`, `item_filename_back`, `item_price`, `item_category`, `item_status`) VALUES
(50, 'itom 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas commodo dapibus cursus. Suspendiss', 'front.jpg', 'back.jpg', '100', 'Weight Loss', '1'),
(51, 'item 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas commodo dapibus cursus. Suspendiss', 'front.jpg', 'back.jpg', '123', 'Weight Loss', '1'),
(52, 'item 3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas commodo dapibus cursus. Suspendiss', 'GSB Paaniwaala brothers 1.png', 'GSB Paaniwaala brothers 2.png', '123', 'Weight Loss', '1');

-- --------------------------------------------------------

--
-- Table structure for table `uder_order`
--

CREATE TABLE `uder_order` (
  `order_id` int(11) NOT NULL,
  `order_user_id` varchar(255) NOT NULL,
  `order_user_name` varchar(255) NOT NULL,
  `order_user_contact` varchar(255) NOT NULL,
  `order_user_state` varchar(255) NOT NULL,
  `order_user_city` varchar(255) NOT NULL,
  `order_user_address` text NOT NULL,
  `order_user_email` varchar(255) NOT NULL,
  `order_time` varchar(255) NOT NULL,
  `order_total_amount` varchar(50) NOT NULL DEFAULT '0',
  `order_tax` varchar(50) NOT NULL DEFAULT '0',
  `order_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uder_order`
--

INSERT INTO `uder_order` (`order_id`, `order_user_id`, `order_user_name`, `order_user_contact`, `order_user_state`, `order_user_city`, `order_user_address`, `order_user_email`, `order_time`, `order_total_amount`, `order_tax`, `order_status`) VALUES
(1, '32', 'prakash', '805273841', 'up', 'lko', 'ssd', 'p@hs', '455565454544', '0', '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `uder_order_details`
--

CREATE TABLE `uder_order_details` (
  `uder_order_details` int(11) NOT NULL,
  `uod_order_id` varchar(255) NOT NULL,
  `uod_item_id` varchar(255) NOT NULL,
  `uod_item_cat` varchar(255) NOT NULL,
  `uod_price` varchar(255) NOT NULL,
  `uod_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uder_order_details`
--

INSERT INTO `uder_order_details` (`uder_order_details`, `uod_order_id`, `uod_item_id`, `uod_item_cat`, `uod_price`, `uod_status`) VALUES
(1, '1', '50', '7', '100', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_contact` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_state` varchar(100) NOT NULL,
  `user_city` varchar(100) NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `user_pincode` varchar(100) NOT NULL,
  `user_created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_type` int(100) NOT NULL COMMENT '1=Admin, 2=Customer',
  `user_tnc` varchar(100) NOT NULL COMMENT '1=Accepted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_password`, `user_contact`, `user_email`, `user_state`, `user_city`, `user_address`, `user_pincode`, `user_created_at`, `user_type`, `user_tnc`) VALUES
(1, 'admin', '$2y$10$HBLqmPc7YLWgLTLKvv1Sz.HjOeZr53DBEe4QWKKjWkvvNISDFLraS', '9727545445', 'sid@xcy.com', '', '', '', '', '2022-04-30 10:12:11', 1, ''),
(12, 'Customer', '$2y$10$8bs9CjaKPbEXRR9P8wTPYO2PBf064WMHPzx7Kd5xW..ZrXFG2uAyG', '9876543210', 'sid.asthana0290@gmail.com', '', '', '', '', '2022-05-07 13:50:37', 2, ''),
(18, 'Test New Customer', '$2y$10$GqktY3YhKQOsEwp4sGqkiOE1J/nWotKasEd/kIiGUcsHrtKqmyGRe', '1234567890', 'admin@test.com', 'UP', 'Lucknow', 'Test', '123456', '2022-05-22 10:49:16', 2, ''),
(31, '', '$2y$10$kE4qrMAzFCF0wTkGBuP5tOap4PXmysh6eiTFb/ImC2pR9M.NkYhre', '7355410185', '', '', '', '', '', '2022-05-25 14:23:49', 0, ''),
(32, 'admin2', '123', '9727545444', 'sid@xcy.com', '', '', '', '', '2022-04-30 10:12:11', 1, ''),
(33, '', '$2y$10$KwF.4xGbqNW72KfrBtKYoOFXxumgVn9gRD1HCerQQe.KDhLFRj0w.', '9727545443', '', '', '', '', '', '2022-05-27 23:40:10', 0, ''),
(34, '', '8052738410', '8052738410', '', '', '', '', '', '2022-05-27 23:42:45', 0, ''),
(35, '', '8052738420', '8052738420', '', '', '', '', '', '2022-05-28 00:24:22', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inventory_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `uder_order`
--
ALTER TABLE `uder_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `uder_order_details`
--
ALTER TABLE `uder_order_details`
  ADD PRIMARY KEY (`uder_order_details`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inventory_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `uder_order`
--
ALTER TABLE `uder_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `uder_order_details`
--
ALTER TABLE `uder_order_details`
  MODIFY `uder_order_details` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
