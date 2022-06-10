-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2022 at 08:08 AM
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
  `cart_added_date` datetime NOT NULL DEFAULT current_timestamp(),
  `cart_order_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `item_weight` varchar(255) NOT NULL,
  `item_ingredients` varchar(255) NOT NULL,
  `item_benefits` varchar(255) NOT NULL,
  `item_usage` varchar(255) NOT NULL,
  `item_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `item_price` varchar(100) NOT NULL,
  `item_category` varchar(100) NOT NULL,
  `item_status` varchar(100) NOT NULL COMMENT '1=Active, 2=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `item_weight`, `item_ingredients`, `item_benefits`, `item_usage`, `item_image`, `item_price`, `item_category`, `item_status`) VALUES
(86, 'Miracle Soap - Strawberry 3(pcs)', '200gm', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó u', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó u', 'Use it when you take a shower,I dont know dumbass', '2.png', '250', 'Beauty', '1'),
(87, 'Miracle Soap - Strawberry 5(pcs)', '500gms', ' ahsdh ahja sdlkakl da daj ldjakldlajdl ahsdh ahja sdlkakl da daj ldjakldlajdl ahsdh ahja sdlkakl da daj ldjakldlajdl ahsdh ahja sdlkakl da daj ldjakldlajdl ahsdh ahja sdlkakl da daj ldjakldlajdl ahsdh ahja sdlkakl da daj ldjakldlajdl ahsdh ahja sdlkakl d', 'ahsdh ahja sdlkakl da daj ldjakldlajdl ahsdh ahja sdlkakl da daj ldjakldlajdl ahsdh ahja sdlkakl da daj ldjakldlajdl ', 'ahsdh ahja sdlkakl da daj ldjakldlajdl ahsdh ahja sdlkakl da daj ldjakldlajdl ahsdh ahja sdlkakl da daj ldjakldlajdl ahsdh ahja sdlkakl da daj ldjakldlajdl ', '2.png', '750', 'Beauty', '1'),
(88, 'Miracle Sattu Powder - (3 Satchets)', '150gm', 'ashd asdkjalkdj adasnodahd and lhaskl  halsdkdls', 'asdhahdadandabdnalknalk klandlnajd aod kaljsd', 'hajdiuhasbk ash asd', '5.png', '200', 'Weight Loss', '1');

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
  `order_gross_amount` varchar(255) NOT NULL DEFAULT '0',
  `order_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uder_order`
--

INSERT INTO `uder_order` (`order_id`, `order_user_id`, `order_user_name`, `order_user_contact`, `order_user_state`, `order_user_city`, `order_user_address`, `order_user_email`, `order_time`, `order_total_amount`, `order_tax`, `order_gross_amount`, `order_status`) VALUES
(1, '32', 'prakash', '805273841', 'up', 'lko', 'ssd', 'p@hs', '455565454544', '0', '0', '0', 0),
(2, '37', 'Siddharth Asthana', '7355410185', 'uttar pradesh', 'lko', 'toy and joy', 'sid.asthan0290@gmail.com', '1654074872', '0', '0', '0', 0),
(3, '37', 'Samiksha Asthana', '7355410185', 'uttar pradesh', 'lko', 'toy and joy', 'sid.asthana0290@gmail.com', '1654075367', '0', '0', '0', 0),
(4, '37', '123', '7355410185', 'uttar pradesh', 'lko', 'toy and joy', 'admin@admin.com', '1654076024', '500', '60', '560', 0),
(5, '37', 'Samiksha Asthana', '7355410185', 'Uttar Pradesh', 'Lucknow', 'Kesto Residency', 'test@test.com', '1654515193', '750', '60', '810', 0),
(6, '37', 'Samiksha', '7355410185', 'Uttar Pradesh', 'Lucknow', 'Kesto', 'test@test.com', '1654676052', '250', '60', '310', 0),
(7, '37', 'Samiksha', '7355410185', 'UTTAR PRADESH', 'LUCKNOW', 'KESTO', 'TEST@TEST.COM', '1654676146', '250', '60', '310', 0),
(8, '37', 'Samiksha', '7355410185', 'UTTAR PRADESH', 'LUCKNOW', 'Kesto Residency', 'admin@admin.com', '1654676294', '250', '60', '310', 0),
(9, '37', 'Samiksha', '7355410185', 'uttar pradesh', 'lko', 'toy and joy', 'sid@xcy.com', '1654676336', '250', '60', '310', 0),
(10, '37', 'Samiksha', '7355410185', 'uttar pradesh', 'lko', 'Kesto Residency', 'samiksha@gmail.com', '1654677551', '250', '60', '310', 0),
(11, '37', 'Samiksha', '7355410185', 'UTTAR PRADESH', 'LUCKNOW', 'KESTO', 'admin@admin', '1654677631', '250', '60', '310', 0),
(12, '38', 'Test Customer', '1234567890', 'UP', 'Lucknow', 'Aliganj', 'test@test.com', '1654681601', '250', '60', '310', 0),
(13, '38', 'TEST CUSTOMER', '1234567890', 'UTTAR PRADESH', 'LUCKNOW', 'KESTO', 'admin@admin', '1654683062', '250', '60', '310', 0),
(14, '38', 'Test', '1234567890', 'UTTAR PRADESH', 'LUCKNOW', 'Aliganj', 'sid.asthana0290@gmail.com', '1654683162', '250', '60', '310', 0),
(15, '38', 'Test', '1234567890', 'UTTAR PRADESH', 'LUCKNOW', 'Aliganj', 'samiksha@gmail.com', '1654683334', '250', '60', '310', 0),
(16, '38', 'Sid', '1234567890', 'Uttar Pradesh', 'Lucknow', 'Aliganj', 'sid@xcy.com', '1654683428', '250', '60', '310', 0),
(17, '38', 'administrator', '1234567890', 'UTTAR PRADESH', 'LUCKNOW', 'KESTO', 'samiksha@gmail.com', '1654683459', '250', '60', '310', 0),
(18, '38', 'Test', '1234567890', 'UTTAR PRADESH', 'LUCKNOW', 'KESTO', 'sid@xcy.com', '1654683652', '250', '60', '310', 0),
(19, '38', 'Test', '1234567890', 'UTTAR PRADESH', 'LUCKNOW', 'toy and joy', 'samiksha7sen@gmail.com', '1654683782', '250', '60', '310', 0),
(20, '38', 'Test', '1234567890', 'UTTAR PRADESH', 'LUCKNOW', 'Kesto Residency', 'admin@admin.com', '1654683846', '250', '60', '310', 0),
(21, '38', 'Test New Test', '1234567890', 'UTTAR PRADESH', 'LUCKNOW', 'Kesto Residency', 'admin@admin', '1654683899', '250', '60', '310', 0),
(22, '38', 'asdadasd', '1234567890', 'Uttar Pradesh', 'asdasdasd', 'asdasdas', 'admin@admin', '1654684019', '250', '60', '310', 0),
(23, '38', 'Test', '1234567890', 'asdadasdasd', 'asdadasdasdas', 'sdfsdfsdfsdf', 'sid@xcy.com', '1654684119', '250', '60', '310', 0),
(24, '38', 'Test Admin', '1234567890', 'UTTAR PRADESH', 'Lucknow', 'Kesto ', 'sid@xcy.com', '1654758959', '950', '60', '1010', 0),
(25, '38', 'Samiksha Asthana', '1234567890', 'uttar pradesh', 'LUCKNOW', 'KESTO', 'sid@xcy.com', '1654759060', '250', '60', '310', 1),
(26, '38', 'Test', '1234567890', 'Uttar Pradesh', 'Lucknow', 'Kesto', 'gmail@gmail.com', '1654759446', '250', '60', '310', 0),
(27, '38', 'Test', '1234567890', 'Uttar Pradesh', 'Lucknow', 'Kesto', 'gmail@gmail.com', '1654762589', '250', '60', '310', 0);

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
  `uod_quantity` varchar(50) NOT NULL DEFAULT '1',
  `uod_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uder_order_details`
--

INSERT INTO `uder_order_details` (`uder_order_details`, `uod_order_id`, `uod_item_id`, `uod_item_cat`, `uod_price`, `uod_quantity`, `uod_status`) VALUES
(1, '1', '50', '7', '100', '1', 0),
(2, '2', '78', 'Weight Loss ', '150', '1', 0),
(3, '2', '79', 'Weight Loss ', '200', '1', 0),
(4, '3', '79', 'Weight Loss ', '200', '3', 0),
(5, '3', '78', 'Weight Loss ', '150', '1', 0),
(6, '4', '78', 'Weight Loss ', '150', '2', 0),
(7, '4', '79', 'Weight Loss ', '200', '1', 0),
(8, '5', '87', 'Beauty ', '750', '1', 0),
(9, '6', '86', 'Beauty ', '250', '1', 0),
(10, '7', '86', 'Beauty ', '250', '1', 0),
(11, '8', '86', 'Beauty ', '250', '1', 0),
(12, '9', '86', 'Beauty ', '250', '1', 0),
(13, '10', '86', 'Beauty', '250', '1', 0),
(14, '11', '86', 'Beauty', '250', '1', 0),
(15, '12', '86', 'Beauty', '250', '1', 0),
(16, '13', '86', 'Beauty', '250', '1', 0),
(17, '14', '86', 'Beauty', '250', '1', 0),
(18, '15', '86', 'Beauty', '250', '1', 0),
(19, '16', '86', 'Beauty', '250', '1', 0),
(20, '17', '86', 'Beauty', '250', '1', 0),
(21, '18', '86', 'Beauty', '250', '1', 0),
(22, '19', '86', 'Beauty', '250', '1', 0),
(23, '20', '86', 'Beauty', '250', '1', 0),
(24, '21', '86', 'Beauty', '250', '1', 0),
(25, '22', '86', 'Beauty', '250', '1', 0),
(26, '23', '86', 'Beauty', '250', '1', 0),
(27, '24', '86', 'Beauty', '250', '3', 0),
(28, '24', '88', 'Weight Loss', '200', '1', 0),
(29, '25', '86', 'Beauty', '250', '1', 0),
(30, '26', '86', 'Beauty', '250', '1', 0),
(31, '27', '86', 'Beauty', '250', '1', 0);

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
(37, 'Samiksha', '123456', '7355410185', '', '', '', '', '', '2022-05-30 11:20:08', 2, ''),
(38, 'Test', '123456', '1234567890', 'gmail@gmail.com', 'Uttar Pradesh', 'Lucknow', 'Kesto', '', '2022-06-07 18:31:51', 2, '');

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
  MODIFY `cart_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

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
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `uder_order`
--
ALTER TABLE `uder_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `uder_order_details`
--
ALTER TABLE `uder_order_details`
  MODIFY `uder_order_details` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
