-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2022 at 12:00 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `cart_added_date` datetime NOT NULL DEFAULT current_timestamp(),
  `cart_order_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `cart_item_name`, `cart_item_description`, `cart_price`, `cart_user_id`, `cart_user_name`, `cart_user_contact`, `cart_user_email`, `cart_user_state`, `cart_user_city`, `cart_user_address`, `cart_user_pincode`, `cart_added_date`, `cart_order_id`) VALUES
(5, 'Test', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas commodo dapibus cursus. Suspendiss', '₹123', '12', 'Customer', '9876543210', 'sid.asthana0290@gmail.com', '', '', '', '', '2022-05-14 21:44:51', ''),
(6, 'Test', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas commodo dapibus cursus. Suspendiss', '₹100', '12', 'Customer', '9876543210', 'sid.asthana0290@gmail.com', '', '', '', '', '2022-05-15 11:14:50', '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(100) NOT NULL,
  `category_image` varchar(100) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_description` varchar(100) NOT NULL,
  `category_added_on` datetime NOT NULL DEFAULT current_timestamp()
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
(50, 'Test', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas commodo dapibus cursus. Suspendiss', 'front.jpg', 'back.jpg', '100', 'Weight Loss', '1'),
(51, 'Test', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas commodo dapibus cursus. Suspendiss', 'front.jpg', 'back.jpg', '123', 'Weight Loss', '1'),
(52, 'Test', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas commodo dapibus cursus. Suspendiss', 'GSB Paaniwaala brothers 1.png', 'GSB Paaniwaala brothers 2.png', '123', 'Weight Loss', '1');

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
  `user_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `user_type` int(100) NOT NULL COMMENT '1=Admin, 2=Customer',
  `user_tnc` varchar(100) NOT NULL COMMENT '1=Accepted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_password`, `user_contact`, `user_email`, `user_state`, `user_city`, `user_address`, `user_pincode`, `user_created_at`, `user_type`, `user_tnc`) VALUES
(1, 'admin', '$2y$10$HBLqmPc7YLWgLTLKvv1Sz.HjOeZr53DBEe4QWKKjWkvvNISDFLraS', '9727545445', 'sid@xcy.com', '', '', '', '', '2022-04-30 10:12:11', 1, ''),
(12, 'Customer', '$2y$10$8bs9CjaKPbEXRR9P8wTPYO2PBf064WMHPzx7Kd5xW..ZrXFG2uAyG', '9876543210', 'sid.asthana0290@gmail.com', '', '', '', '', '2022-05-07 13:50:37', 2, ''),
(14, 'Samiksha Asthana', '$2y$10$mepkYpRrjD4fXmhVVopFBexE5RDG3w6CzX/XkrOPuWPEwzLWJ7fY6', '7355410185', 'samiksha7sen@gmail.com', 'UP', 'Almorah', 'Villa 5, Kesto Residency, Jankipuram Extension. Lucknow', '226031', '2022-05-15 11:30:15', 2, ''),
(16, 'TEST CUSTOMER', '$2y$10$J2Q6ahGepzdDKb/VGRgtN.DcdMMLDDlPT8.TyWtNr.ByP5Gz.ZufK', '1234567890', 'admin@admin.com', 'UK', 'Bareilly', 'asbjand ajklsnlkasdn ', '123456', '2022-05-19 09:55:09', 2, '');

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
  MODIFY `cart_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inventory_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
