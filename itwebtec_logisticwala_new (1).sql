-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2020 at 12:38 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itwebtec_logisticwala_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `joining_date` date NOT NULL,
  `salary` decimal(10,2) DEFAULT NULL,
  `leaving_date` date DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `role` int(1) NOT NULL DEFAULT '1' COMMENT '1=>admin,2=>subadmin',
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `phone`, `password`, `dob`, `joining_date`, `salary`, `leaving_date`, `profile_pic`, `role`, `status`) VALUES
(1, 'admin', 'admin@gmail.com', '', 'MTIzNDU2', '0000-00-00', '0000-00-00', NULL, NULL, NULL, 1, '1'),
(2, 'sauhard', 'sauhard.eweblabs@gmail.com', '', 'MTIzNDU2', '0000-00-00', '0000-00-00', NULL, NULL, NULL, 2, '1'),
(3, 'shakira', 'waka@waka.com', '7891234560', 'MTIzNDU2', '1995-12-09', '2018-09-21', NULL, NULL, NULL, 1, '1'),
(4, 'salman khan', 'salman@khan.com', '7867867867', 'MTIzNDU2', '2012-12-12', '2012-12-12', NULL, NULL, '016482ee5d86b7d95dc8c0a746dc2701.png', 2, '1');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `ip_address` varchar(16) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `user_agent` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `driver_name` varchar(255) NOT NULL,
  `driver_type` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `aadhar_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `profile_image` varchar(255) NOT NULL,
  `verification_images` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '0=>inactive, 1=>active',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `vendor_id`, `driver_name`, `driver_type`, `phone_no`, `dob`, `aadhar_number`, `address`, `profile_image`, `verification_images`, `status`, `created_date`, `modify_date`) VALUES
(18, 0, 'sdjkfdksb', '', 'sdfdsf', '2020-06-12', 'sdfdsfsdfdsfsd', 'sdfdsf', '', '', 1, '2020-06-06 09:18:48', '2020-06-06 10:10:52'),
(21, 10, '3232', 'Biker', '9876543210', '2020-06-19', '321654987', 'aafdsfsdf', 'bb18c85c15eb01144b5af7c1fdfabdd6.jpg', '[\"1731a49d03f01eff267537152d09c575.jpg\",\"45636661a500effc1e7c955a02ba9713.jpg\"]', 1, '2020-06-06 09:34:48', '2020-06-13 13:12:46');

-- --------------------------------------------------------

--
-- Table structure for table `menu_master`
--

CREATE TABLE `menu_master` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(50) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_master`
--

INSERT INTO `menu_master` (`id`, `menu_name`, `status`) VALUES
(1, 'Manage Vendor', '1'),
(2, 'Manage Customer', '1'),
(3, 'Manage Create Trip', '1');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL,
  `permission` text NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role_name`, `permission`, `status`) VALUES
(1, 'xyz', '{\"1\":{\"view\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"0\"},\"2\":{\"view\":\"0\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"0\"},\"3\":{\"view\":\"0\",\"create\":\"0\",\"edit\":\"1\",\"delete\":\"1\"}}', '1'),
(2, 'staff', '{\"1\":{\"view\":\"1\",\"create\":\"1\",\"edit\":\"0\",\"delete\":\"0\"},\"2\":{\"view\":\"0\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"0\"},\"3\":{\"view\":\"0\",\"create\":\"0\",\"edit\":\"1\",\"delete\":\"1\"}}', '1');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT 'automatic => 1, manual=>0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `status`, `created_date`, `modify_date`) VALUES
(1, 1, '2020-06-06 14:03:33', '2020-06-06 14:14:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `login_code` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `phone` varchar(11) NOT NULL,
  `other_phone` varchar(11) DEFAULT NULL,
  `landline` varchar(11) DEFAULT NULL,
  `pancard_no` varchar(20) NOT NULL,
  `industry_type` varchar(50) DEFAULT NULL,
  `additional_info` varchar(255) DEFAULT NULL,
  `main_services` varchar(255) NOT NULL,
  `services` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `company_type` varchar(50) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_website` varchar(255) DEFAULT NULL,
  `gst_no` varchar(50) DEFAULT NULL,
  `business_years` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `verification_docs` text,
  `user_type` varchar(20) NOT NULL COMMENT 'vendor, customer',
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0=>inactive, 1=>active',
  `featured` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0=>not featured; 1=>featured'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `login_code`, `phone`, `other_phone`, `landline`, `pancard_no`, `industry_type`, `additional_info`, `main_services`, `services`, `city`, `contact_person`, `company_type`, `company_name`, `company_website`, `gst_no`, `business_years`, `password`, `verification_docs`, `user_type`, `status`, `featured`) VALUES
(1, '', '', 'admin@gmail.com', '', '', NULL, NULL, '', NULL, NULL, '', '', '', '', '', '', NULL, NULL, '', 'MTIzNDU2', '', 'admin', '1', '1'),
(2, 'snc', '', 'snc@gmail.com', 'LWV001', '1234567890', '1111111111', '', 'ABCDE1234F', 'hola', 'fjfj', 'kfk', 'kfk', 'fkfk', 'kfk', 'Proprietorship', 'fjfj', '', 'snc', '1 year', 'MTIzNDU2', '[\"863b49b2e7ad2b0175a83055160e43f6.png\",\"bf798c138a298ba0175793b42d2910e8.jpg\"]', 'vendor', '1', '0'),
(3, 'snc', '', 'snc@gmail.com1', '', '1234567891', '1111111111', '', 'ABCDE1234F', 'hola', 'fjfj', 'kfk', 'kfk', 'fkfk', 'kfk', 'Partnership', 'fjfj', '', '', '1 year', '123456', NULL, '', '1', '1'),
(4, 'sonu', 'nigam', 'sonu@gmail.com', 'LWC001', '9876543210', '', '', 'MNOPQ1234R', 'film', NULL, '', '', 'mumbai', 'udit narayan', 'Pvt. Ltd.', 'ysrj', '', 'sonu', '5 years', 'MTIzNDU2', '[\"294c370b8c6859de696a4d1777b92b59.jpg\",\"c156b2a9802b0edb7ddb409b72d6d4b7.jpg\",\"bf8894ea8f1e1dfe09b6c293b2368219.xlsx\",\"5e72ab444398d6a78eb887189620ef26.sql\"]', 'customer', '1', '1'),
(5, 'name', '', 'name@gmail.com', 'LWC002', '7418529630', '', '', 'ABCDE1234F', 'aa', NULL, '', '', 'aa', 'aa', 'Proprietorship', 'ff', 'http://www.fb.com', '', '18 years', 'MTIzNDU2', NULL, 'customer', '1', '1'),
(6, 'Sachin', 'Tendulkar', 'sachin@gmail.com', 'LWC003', '6666666666', '', '2222222222', 'SACHI1234N', 'Cricket', NULL, '', '', 'Mumbai', 'Anjali Tendulkar', 'Sports', 'MRF', '', 'Boost', '16 years', 'MTIzNDU2', NULL, 'customer', '1', '1'),
(7, 'Sourav', 'Ganguly', 'sourav@gmail.com', 'LWC004', '4444444444', '1111111111', '', 'SOURA1234V', 'Cricket', NULL, '', '', 'Kolkata', 'Dona Ganguly', 'Sports', 'Britannia', '', 'Milo', '14 years', 'MTIzNDU2', NULL, 'customer', '1', '0'),
(10, 'Anil', 'vendor', 'info@eweblabs.com', 'LWV004', '8527239178', '', '', 'DAFPS0250E', 'ITs', 'Test Description', 'IT ', 'Website development', 'Gurgaon', 'Anil singh', 'Pvt. Ltd.', 'Eweblabs PVT LTD', '', 'Anil', '10', 'MTIzNDU2', '[\"1a662e02653d38036e7356385d812da2.jpg\",\"4b715cb3db9596d7f0d95936b3382ad8.jpg\",\"3b97764ab79c26eb915f9a5c1f541598.png\"]', 'vendor', '1', '1'),
(11, 'anil', 'singh', 'singhanil221@gmail.com', 'LWC005', '7539514568', '', '', 'DAFLK0250E', 'ITs', NULL, '', '', 'GURGAON', 'Mr. ANIL SINGH', 'Pvt. Ltd.', 'Eweblabs Pvt LTd', '', 'anil', '5', 'MTIzNDU2', '[\"e7bf7a12098a7468ec40b8c7db48df54.jpg\",\"714b6a8a4a7e210d17cc0af8a69ed483.jpg\",\"ea315a091effc5ea882291d9bba00a4a.png\"]', 'customer', '1', '1'),
(12, 'Amit', 'Kumar', 'amit@adka.com', 'LWC006', '7536542585', '', '4582586586', 'AMITI1234N', 'Cricket', NULL, '', '', 'Mumbai', 'Anjali Tendulkar', 'Sports', 'MRF', '', 'Boost', '16 years', 'MTIzNDU2', NULL, 'customer', '1', '1'),
(13, 'Rakesh', 'Verma', 'rakesh@asda.com', 'LWC007', '4569523585', '123456856', '', 'KJHUJ1234V', 'Cricket', NULL, '', '', 'Kolkata', 'Dona Ganguly', 'Sports', 'Britannia', '', 'Milo', '14 years', 'MTIzNDU2', NULL, 'customer', '1', '0'),
(16, 'Sachin', 'Tendulkar', 'sachin@cricket.com', 'LWC008', '6666666699', '', '2222222222', 'SACHI1234N', 'Cricket', NULL, '', '', 'Mumbai', 'Anjali Tendulkar', 'Proprietorship', 'MRF', '', 'Boost', '16 years', 'MTIzNDU2', NULL, 'customer', '', '1'),
(17, 'Sourav', 'Ganguly', 'sourav@cricket.com', 'LWC009', '4444444477', '1111111111', '', 'SOURA1234V', 'Cricket', NULL, '', '', 'Kolkata', 'Dona Ganguly', 'Partnership', 'Britannia', '', 'Sourav', '4 years', 'MTIzNDU2', '[\"e2431929ea61630feb576942c20b0cd9.jpg\"]', 'customer', '0', '1'),
(18, 'Indira', 'Gandhi', 'indira@congress.com', 'LWV005', '1950195019', '1919191719', '', 'INDIR1234A', 'Politics', 'Rajiv', 'Prime Minister', 'Poverty', 'Allahabad', 'Jawahar Lal Nehru', 'Pvt. Ltd.', 'Priyanka Gandhi', '', '786786787', '6 months', 'MTIzNDU2', NULL, 'vendor', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `vehicle_type` varchar(255) NOT NULL,
  `vehicle_no` varchar(255) NOT NULL,
  `vehicle_images` varchar(255) NOT NULL,
  `assign_driver_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '0=>inactive, 1=>active',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `vendor_id`, `vehicle_type`, `vehicle_no`, `vehicle_images`, `assign_driver_id`, `status`, `created_date`, `modify_date`) VALUES
(2, 18, 'dy123', '987654311', '[\"3726610dac4ce0d9cbbab5a0ff1a967a.jpg\"]', 18, 0, '2020-06-06 11:06:54', '2020-06-13 13:10:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_master`
--
ALTER TABLE `menu_master`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `id_2` (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `menu_master`
--
ALTER TABLE `menu_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
