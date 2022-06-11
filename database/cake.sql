-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2021 at 10:50 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cake`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `aid` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`aid`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `cakename`
--

CREATE TABLE `cakename` (
  `cnid` int(11) NOT NULL,
  `cakeimg` varchar(100) NOT NULL,
  `cakeuserid` varchar(100) NOT NULL,
  `orderdate` varchar(20) NOT NULL,
  `deliverydate` varchar(20) NOT NULL,
  `cakecategoryid` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cakename`
--

INSERT INTO `cakename` (`cnid`, `cakeimg`, `cakeuserid`, `orderdate`, `deliverydate`, `cakecategoryid`, `status`) VALUES
(1, 'IMG_2_041221063109_688631.jpg', 'rhythm', '2021-12-04', '2021-12-05', 1, 'Order Pending'),
(2, 'IMG_7_041221065548_284606.jpg', 'ruchi20', '2021-12-04', '2021-12-05', 3, 'Ordered'),
(4, 'IMG_7_041221065822_607638.jpg', 'ruchi20', '2021-12-04', '2021-12-11', 8, 'Order'),
(5, 'IMG_2_041221094156_113133.jpg', 'rhythm', '2021-12-04', '2021-12-05', 1, 'Ordered'),
(6, 'IMG_2_041221094245_443840.jpg', 'rhythm', '2021-12-04', '2021-12-05', 1, 'Ordered');

-- --------------------------------------------------------

--
-- Table structure for table `category_master`
--

CREATE TABLE `category_master` (
  `cid` int(11) NOT NULL,
  `c_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_master`
--

INSERT INTO `category_master` (`cid`, `c_name`) VALUES
(1, 'Chocolate'),
(2, 'Vanila'),
(3, 'Strawberry'),
(4, 'Special valentine '),
(5, 'Blueberry'),
(6, 'Red Velvet'),
(7, 'Black current'),
(8, 'White Forest');

-- --------------------------------------------------------

--
-- Table structure for table `category_wise_entry`
--

CREATE TABLE `category_wise_entry` (
  `cw_id` int(11) NOT NULL,
  `cake_name` varchar(35) NOT NULL,
  `category` varchar(30) NOT NULL,
  `price` varchar(20) NOT NULL,
  `weight` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_wise_entry`
--

INSERT INTO `category_wise_entry` (`cw_id`, `cake_name`, `category`, `price`, `weight`, `description`, `image`) VALUES
(1, 'Choco vanila', '1', '1499', '1 Kg', 'A toothsome treat for the sugar lovers who are just passionate about chocolate and relish the mushin', 'image/cake-g2e04289cc_1920.jpg'),
(2, 'Dark Chocalate', '1', '1499', '1 Kg', 'A toothsome treat for the sugar lovers who are just passionate about chocolate and relish the mushin', 'image/ferrero-rocher-cake-g747dcbaf0_1920.jpg'),
(3, 'Pretty Pink Rose Strawberry ', '4', '1499', '1 Kg', 'A toothsome treat for the sugar lovers who are just passionate about chocolate and relish the mushin', 'image/wedding-g49be8db60_1920.jpg'),
(4, 'Pretty Pink Rose Strawberry ', '3', '999', '750 gm', 'A toothsome treat for the sugar lovers who are just passionate about chocolate and relish the mushin', 'image/birthday-g4fcb05a0c_1920.jpg'),
(5, 'Pretty Blue Rose Blueberry', '5', '1499', '1 Kg', 'A toothsome treat for the sugar lovers who are just passionate about chocolate and relish the mushin', 'image/cake-g38415a442_1920.jpg'),
(6, 'Pretty Pink Rose Strawberry ', '3', '1499', '1 Kg', 'A toothsome treat for the sugar lovers who are just passionate about chocolate and relish the mushin', 'image/birthday-g4fcb05a0c_1920.jpg'),
(7, 'Red Velvet', '6', '1499', '1 Kg', 'A toothsome treat for the sugar lovers who are just passionate about chocolate and relish the mushin', 'image/cake-g3f3cbb888_1920.jpg'),
(8, 'Butter scotch', '2', '1499', '1 Kg', 'A toothsome treat for the sugar lovers who are just passionate about chocolate and relish the mushin', 'image/cakes-g56ee832f9_1920.jpg'),
(9, 'Dark Chocalate', '7', '1499', '1 Kg', 'A toothsome treat for the sugar lovers who are just passionate about chocolate and relish the mushin', 'image/cake-gc140e80dd_1920.jpg'),
(10, 'Dark chocolate', '1', '999', '500 gm', 'Dark chocalte cake', 'image/cake-g713c160fe_1920.jpg'),
(11, 'Pretty Pink Rose Strawberry', '3', '999', '500 gm', 'A toothsome treat for the sugar lovers who are just passionate about chocolate and relish the mushin', 'image/birthday-g4fcb05a0c_1920.jpg'),
(12, 'Choco vanila', '4', '2699', '1.5 Kg', 'A toothsome treat for the sugar lovers who are just passionate about chocolate and relish the mushin', 'image/cake-gf128e52ad_1920.jpg'),
(13, 'Pretty White Rose cake', '8', '999', '500 gm', 'A toothsome treat for the sugar lovers who are just passionate about chocolate and relish the mushin', 'image/bg_2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customer_purchase`
--

CREATE TABLE `customer_purchase` (
  `id` int(11) NOT NULL,
  `reciept_number` varchar(30) NOT NULL,
  `cus_name` varchar(100) NOT NULL,
  `c_add` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `d_date` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_purchase`
--

INSERT INTO `customer_purchase` (`id`, `reciept_number`, `cus_name`, `c_add`, `email`, `contact`, `date`, `d_date`, `status`) VALUES
(1, '1', 'Rhythm', 'surat', 'ruchi20', '9874220546', '2021-12-04', '2021-12-05', 'Order'),
(2, '2', 'ruchi', 'god dhod road', 'deevy45', '1234567890', '2021-12-04', '2021-12-06', 'Order'),
(3, '3', 'Rhythm', 'Bardoli', 'rhythm', '926556600', '2021-12-04', '2021-12-04', 'Order'),
(4, '4', 'Rhythm', 'Bardoli', 'rhythm', '9879544082', '2021-12-04', '2021-12-08', 'Order');

-- --------------------------------------------------------

--
-- Table structure for table `customer_purchase_product`
--

CREATE TABLE `customer_purchase_product` (
  `id` int(11) NOT NULL,
  `reciept_number` varchar(30) NOT NULL,
  `p_code` varchar(100) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `cus_email` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_purchase_product`
--

INSERT INTO `customer_purchase_product` (`id`, `reciept_number`, `p_code`, `qty`, `cus_email`, `status`) VALUES
(1, '3', '9', '1', 'rhythm', 'Order'),
(2, '3', '6', '1', 'rhythm', 'Order'),
(5, '1', '1', '1', 'ruchi20', 'Ordered'),
(6, '1', '4', '1', 'ruchi20', 'Order'),
(8, '2', '8', '1', 'deevy45', 'Ordered'),
(9, '2', '5', '1', 'deevy45', 'Order'),
(10, '0', '1', '1', 'deevy45', 'cart'),
(11, '0', '2', '1', 'deevy45', 'cart'),
(13, '4', '2', '5', 'rhythm', 'Order');

-- --------------------------------------------------------

--
-- Table structure for table `customer_registraion`
--

CREATE TABLE `customer_registraion` (
  `c_id` int(11) NOT NULL,
  `cust_code` varchar(20) NOT NULL,
  `c_fname` varchar(20) NOT NULL,
  `c_mname` varchar(20) NOT NULL,
  `c_lname` varchar(20) NOT NULL,
  `username` text NOT NULL,
  `c_country` varchar(20) NOT NULL,
  `c_state` varchar(20) NOT NULL,
  `c_city` varchar(20) NOT NULL,
  `c_add` varchar(100) NOT NULL,
  `c_mobile` varchar(20) NOT NULL,
  `c_gender` varchar(20) NOT NULL,
  `c_email` varchar(20) NOT NULL,
  `c_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_registraion`
--

INSERT INTO `customer_registraion` (`c_id`, `cust_code`, `c_fname`, `c_mname`, `c_lname`, `username`, `c_country`, `c_state`, `c_city`, `c_add`, `c_mobile`, `c_gender`, `c_email`, `c_password`) VALUES
(1, '1', 'Deevy ', 'Bhavinbhai', 'Patel', 'deevy45', 'India', 'Gujarat', 'SURAT', '302 astavinyak aapt surat', '6352142415', 'male', 'dbp.sd20@gmail.com', '123'),
(2, '2', 'Rhythm', 'Dipak', 'Bhavsar', 'rhythm', 'India', 'Gujarat', 'Vyara', '131, Krishna Nagar Society,Shastri Road,Vyara.', '987463120', 'male', 'rdb.sd20@gmail.com', '1234'),
(6, '3', 'Varshil', 'Dhansukhbhai', 'Patel', 'varshil007', 'India', 'Gujarat', 'SURAT', '131, Krishna Nagar Society,Shastri Road,Bardoli.', '06354468667', 'male', 'vdp.sd20@gmail.com', '123'),
(7, '4', 'Ruchita', 'Shrikantbhai', 'Jariwala', 'ruchi20', 'India', 'Gujarat', 'SURAT', '131, Krishna Nagar Society,\r\nShastri Road,Bardoli.', '6353479189', 'female', 'rsj.sd20@gmail.com', '123'),
(8, '5', 'Rhythm', 'Dipak', 'Patel', 'rhythm007', 'India', 'Gujarat', 'SURAT', '131, Krishna Nagar Society,', '06354468667', 'male', 'vdp.sd20', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `cakename`
--
ALTER TABLE `cakename`
  ADD PRIMARY KEY (`cnid`);

--
-- Indexes for table `category_master`
--
ALTER TABLE `category_master`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `category_wise_entry`
--
ALTER TABLE `category_wise_entry`
  ADD PRIMARY KEY (`cw_id`);

--
-- Indexes for table `customer_purchase`
--
ALTER TABLE `customer_purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_purchase_product`
--
ALTER TABLE `customer_purchase_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_registraion`
--
ALTER TABLE `customer_registraion`
  ADD PRIMARY KEY (`c_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cakename`
--
ALTER TABLE `cakename`
  MODIFY `cnid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category_master`
--
ALTER TABLE `category_master`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `category_wise_entry`
--
ALTER TABLE `category_wise_entry`
  MODIFY `cw_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `customer_purchase`
--
ALTER TABLE `customer_purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer_purchase_product`
--
ALTER TABLE `customer_purchase_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `customer_registraion`
--
ALTER TABLE `customer_registraion`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
