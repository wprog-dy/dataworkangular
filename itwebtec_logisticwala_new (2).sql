-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2020 at 09:15 AM
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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `realeted_category_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `realeted_category_id`, `status`, `created_date`, `modify_date`) VALUES
(1, 'Transportation', 0, 1, '2020-06-30 11:54:07', '2020-06-30 11:54:30'),
(2, 'Train', 1, 1, '2020-06-30 11:54:56', '0000-00-00 00:00:00'),
(3, 'Air', 1, 1, '2020-06-30 13:28:14', '0000-00-00 00:00:00'),
(4, 'Warehousing', 0, 1, '2020-06-30 13:31:43', '0000-00-00 00:00:00'),
(5, '3PL/4PL', 4, 1, '2020-06-30 13:33:13', '2020-06-30 13:33:21'),
(6, 'Purchase', 5, 1, '2020-06-30 13:35:49', '0000-00-00 00:00:00'),
(7, 'Rental', 5, 1, '2020-06-30 13:35:49', '0000-00-00 00:00:00'),
(8, 'Buyers', 6, 1, '2020-06-30 13:36:58', '0000-00-00 00:00:00'),
(9, 'Sellers', 6, 1, '2020-06-30 13:36:58', '0000-00-00 00:00:00'),
(10, 'Available', 7, 1, '2020-06-30 13:47:34', '0000-00-00 00:00:00'),
(11, 'Required', 7, 1, '2020-06-30 13:47:34', '0000-00-00 00:00:00'),
(12, 'Global Logistics', 0, 1, '2020-07-01 09:00:59', '0000-00-00 00:00:00'),
(13, 'Air Cargo', 12, 1, '2020-07-01 09:01:52', '0000-00-00 00:00:00'),
(14, 'Sea Shipping', 12, 1, '2020-07-01 09:01:52', '0000-00-00 00:00:00'),
(15, 'International Courier', 12, 1, '2020-07-01 09:02:06', '0000-00-00 00:00:00'),
(16, 'Elite Services', 0, 1, '2020-07-02 10:07:58', '0000-00-00 00:00:00'),
(17, 'Movers & Packers', 16, 1, '2020-07-02 10:07:58', '0000-00-00 00:00:00'),
(18, 'Critical Management Services', 16, 1, '2020-07-02 10:07:58', '0000-00-00 00:00:00'),
(19, 'Project Management Services', 16, 1, '2020-07-02 10:07:58', '0000-00-00 00:00:00'),
(20, 'People Transport Solution', 16, 1, '2020-07-02 10:08:55', '0000-00-00 00:00:00'),
(21, 'Freight Trading', 0, 1, '2020-07-03 06:08:35', '0000-00-00 00:00:00'),
(22, 'Trucker', 21, 1, '2020-07-03 06:08:35', '2020-07-03 06:08:53'),
(23, 'Forwarder', 21, 1, '2020-07-03 06:09:33', '0000-00-00 00:00:00'),
(24, 'CHA', 21, 1, '2020-07-03 06:09:33', '2020-07-03 06:09:47'),
(25, 'Dedicated', 0, 1, '2020-07-03 09:49:08', '2020-07-07 11:27:27'),
(26, 'FTL', 25, 1, '2020-07-03 09:49:46', '0000-00-00 00:00:00'),
(27, 'PTL', 25, 1, '2020-07-03 09:49:46', '0000-00-00 00:00:00'),
(28, 'Dedicated', 0, 1, '2020-07-04 14:13:17', '2020-07-07 11:29:02');

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
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `status`, `created_date`, `modify_date`) VALUES
(1, 'USD - United States dollar', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(2, 'EUR - Euro', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(3, 'GBP - British pound', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(4, 'CAD - Canadian dollar', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(5, 'CNY - Chinese yuan', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(6, 'JPY - Japanese yen', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(7, 'RUB - Russian ruble', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(8, 'AED - United Arab Emirates dirham', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(9, 'AFN - Afghan afghani', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(10, 'ALL - Albanian lek', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(11, 'AMD - Armenian dram', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(12, 'ANG - Netherlands Antillean guilder', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(13, 'AOA - Angolan kwanza', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(14, 'ARS - Argentine peso', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(15, 'AUD - Australian dollar', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(16, 'AWG - Aruban florin', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(17, 'AZN - Azerbaijani manat', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(18, 'BAM - Bosnia and Herzegovina convertible mark', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(19, 'BBD - Barbadian dollar', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(20, 'BDT - Bangladeshi taka', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(21, 'BGN - Bulgarian lev', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(22, 'BHD - Bahraini dinar', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(23, 'BIF - Burundian franc', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(24, 'BMD - Bermudian dollar', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(25, 'BND - Brunei dollar', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(26, 'BOB - Bolivian boliviano', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(27, 'BRL - Brazilian real', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(28, 'BSD - Bahamian dollar', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(29, 'BTC - Bitcoin', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(30, 'BTN - Bhutanese ngultrum', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(31, 'BWP - Botswana pula', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(32, 'BYR - Belarusian ruble', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(33, 'BZD - Belize dollar', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(34, 'CAD - Canadian dollar', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(35, 'CDF - Congolese franc', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(36, 'CHF - Swiss franc', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(37, 'CLF - Unidad de Fomento (funds code)', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(38, 'CLP - Chilean peso', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(39, 'CNH - Renminbi', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(40, 'CNY - Chinese yuan', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(41, 'COP - Colombian peso', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(42, 'CRC - Costa Rican colón', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(43, 'CUP - Cuban peso', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(44, 'CVE - Cape Verdean escudo', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(45, 'CZK - Czech koruna', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(46, 'DJF - Djiboutian franc', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(47, 'DKK - Danish krone', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(48, 'DOP - Dominican peso', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(49, 'DZD - Algerian dinar', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(50, 'ECS - Ecuadorian sucre', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(51, 'EGP - Egyptian pound', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(52, 'ERN - Eritrean nakfa', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(53, 'ETB - Ethiopian birr', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(54, 'EUR - Euro', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(55, 'FJD - Fijian dollar', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(56, 'FKP - Falkland Islands pound', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(57, 'GBP - British pound', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(58, 'GEL - Georgian lari', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(59, 'GHS - Ghanaian cedi', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(60, 'GIP - Gibraltar pound', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(61, 'GMD - Gambian dalasi', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(62, 'GNF - Guinean franc', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(63, 'GTQ - Guatemalan quetzal', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(64, 'GYD - Guyanese dollar', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(65, 'HKD - Hong Kong dollar', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(66, 'HNL - Honduran lempira', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(67, 'HRK - Croatian kuna', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(68, 'HTG - Haitian gourde', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(69, 'HUF - Hungarian forint', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(70, 'IDR - Indonesian rupiah', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(71, 'ILS - Israeli new shekel', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(72, 'IQD - Iraqi dinar', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(73, 'IRR - Iranian rial', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(74, 'ISK - Icelandic króna', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(75, 'JMD - Jamaican dollar', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(76, 'JOD - Jordanian dinar', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(77, 'JPY - Japanese yen', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(78, 'KES - Kenyan shilling', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(79, 'KGS - Kyrgyzstani som', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(80, 'KHR - Cambodian riel', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(81, 'KMF - Comorian franc', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(82, 'KPW - North Korean won', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(83, 'KRW - South Korean won', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(84, 'KWD - Kuwaiti dinar', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(85, 'KYD - Cayman Islands dollar', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(86, 'KZT - Kazakhstani tenge', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(87, 'LAK - Lao kip', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(88, 'LBP - Lebanese pound', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(89, 'LKR - Sri Lankan rupee', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(90, 'LRD - Liberian dollar', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(91, 'LSL - Lesotho loti', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(92, 'LTC - Litecoin', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(93, 'LYD - Libyan dinar', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(94, 'MAD - Moroccan dirham', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(95, 'MDL - Moldovan leu', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(96, 'MGA - Malagasy ariary', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(97, 'MKD - Macedonian denar', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(98, 'MMK - Myanma kyat', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(99, 'MNT - Mongolian tögrög', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(100, 'MOP - Macanese pataca', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(101, 'MRO - Mauritanian ouguiya', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(102, 'MUR - Mauritian rupee', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(103, 'MVR - Maldivian rufiyaa', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(104, 'MWK - Malawian kwacha', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(105, 'MXN - Mexican peso', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(106, 'MYR - Malaysian ringgit', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(107, 'MZN - Mozambican metical', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(108, 'NAD - Namibian dollar', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(109, 'NGN - Nigerian naira', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(110, 'NIO - Nicaraguan córdoba', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(111, 'NMC - Namecoin', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(112, 'NOK - Norwegian krone', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(113, 'NPR - Nepalese rupee', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(114, 'NVC - Novacoin', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(115, 'NZD - New Zealand dollar', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(116, 'OMR - Omani rial', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(117, 'PAB - Panamanian balboa', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(118, 'PEN - Peruvian nuevo sol', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(119, 'PGK - Papua New Guinean kina', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(120, 'PHP - Philippine peso', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(121, 'PKR - Pakistani rupee', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(122, 'PLN - Polish z?oty', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(123, 'PPC - Peercoin', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(124, 'PYG - Paraguayan guaraní', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(125, 'QAR - Qatari riyal', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(126, 'RON - Romanian leu', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(127, 'RSD - Serbian dinar', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(128, 'RUB - Russian ruble', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(129, 'RWF - Rwandan franc', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(130, 'SAR - Saudi riyal', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(131, 'SBD - Solomon Islands dollar', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(132, 'SCR - Seychellois rupee', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(133, 'SDG - Sudanese pound', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(134, 'SEK - Swedish krona', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(135, 'SGD - Singapore dollar', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(136, 'SHP - Saint Helena pound', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(137, 'SLL - Sierra Leonean leone', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(138, 'SOS - Somali shilling', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(139, 'SRD - Surinamese dollar', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(140, 'STD - São Tomé and Príncipe dobra', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(141, 'SVC - Salvadoran colón', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(142, 'SYP - Syrian pound', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(143, 'SZL - Swazi lilangeni', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(144, 'THB - Thai baht', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(145, 'TJS - Tajikistani somoni', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(146, 'TMT - Turkmenistani new manat', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(147, 'TND - Tunisian dinar', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(148, 'TOP - Tongan pa?anga', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(149, 'TRY - Turkish lira', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(150, 'TTD - Trinidad and Tobago dollar', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(151, 'TWD - New Taiwan dollar', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(152, 'TZS - Tanzanian shilling', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(153, 'UAH - Ukrainian hryvnia', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(154, 'UGX - Ugandan shilling', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(155, 'USD - United States dollar', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(156, 'UYU - Uruguayan peso', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(157, 'UZS - Uzbekistani som', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(158, 'VEF - Venezuelan bolívar', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(159, 'VND - Vietnamese ??ng', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(160, 'VUV - Vanuatu vatu', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(161, 'WST - Samoan tala', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(162, 'XAF - Central African CFA franc', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(163, 'XCD - East Caribbean dollar', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(164, 'XOF - West African CFA franc', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(165, 'XPF - CFP franc', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(166, 'YER - Yemeni rial', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(167, 'ZAR - South African rand', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(168, 'ZMW - Zambian kwacha', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(169, 'ZWL - Zimbabwean dollar', 1, '2020-07-01 11:34:20', '0000-00-00 00:00:00'),
(170, 'INR - Indian rupee', 1, '2020-07-01 11:35:04', '0000-00-00 00:00:00');

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
  `driving_license_no` varchar(255) NOT NULL,
  `driving_license_type` varchar(255) NOT NULL,
  `driving_license_issue_date` varchar(255) NOT NULL,
  `driving_license_valid_till` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `aadhar_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `profile_image` varchar(255) NOT NULL,
  `verification_images` varchar(255) NOT NULL,
  `driving_license_front` varchar(255) NOT NULL,
  `aadhar_card_front_back` varchar(255) NOT NULL,
  `driver_mobile_type` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '0=>inactive, 1=>active',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `vendor_id`, `driver_name`, `driver_type`, `phone_no`, `driving_license_no`, `driving_license_type`, `driving_license_issue_date`, `driving_license_valid_till`, `dob`, `aadhar_number`, `address`, `profile_image`, `verification_images`, `driving_license_front`, `aadhar_card_front_back`, `driver_mobile_type`, `status`, `created_date`, `modify_date`) VALUES
(18, 0, 'sdjkfdksb', '', 'sdfdsf', '', '', '', '', '2020-06-12', 'sdfdsfsdfdsfsd', 'sdfdsf', '', '', '', '', '', 1, '2020-06-06 09:18:48', '2020-06-06 10:10:52'),
(21, 10, '3232', 'Biker', '9876543210', '', '', '', '', '2020-06-19', '321654987', 'aafdsfsdf', 'bb18c85c15eb01144b5af7c1fdfabdd6.jpg', '[\"1731a49d03f01eff267537152d09c575.jpg\",\"45636661a500effc1e7c955a02ba9713.jpg\"]', '', '', '', 1, '2020-06-06 09:34:48', '2020-06-13 13:12:46'),
(22, 18, 'dfdsgdfg', 'Biker', '9876543123', '87365425', 'Permanent License', '2020-06-24', '8745678345`', '2020-06-23', '2545644561', 'adfssdfgsdg', 'd37ea556ef6b2d77f3596b4f1b916a63.jpg', '[\"44eaea039408421c2f08b9440e6d6325.jpg\"]', '', '', 'Smart Phone', 1, '2020-06-23 09:07:03', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `customerid` int(11) NOT NULL,
  `origin_city` varchar(255) NOT NULL,
  `destination_city` varchar(255) NOT NULL,
  `when_required_date` varchar(255) NOT NULL,
  `when_required_time` varchar(255) NOT NULL,
  `type_of_transaction` varchar(255) NOT NULL,
  `type_of_load` varchar(255) NOT NULL,
  `industry_type` varchar(255) NOT NULL,
  `product_commodities` varchar(255) NOT NULL,
  `approx_weight_kg` varchar(255) NOT NULL,
  `volume_weight` varchar(255) NOT NULL,
  `no_of_packets` varchar(255) NOT NULL,
  `pickup_address` varchar(255) NOT NULL,
  `drop_address` varchar(255) NOT NULL,
  `specific_requirement` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `area_dimension` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `whatsapp_no` varchar(255) NOT NULL,
  `type_of_warehouse` varchar(255) NOT NULL,
  `services` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `expected_rate_sqr_feet` varchar(255) NOT NULL,
  `shed_requirement` varchar(255) NOT NULL,
  `area_required` varchar(255) NOT NULL,
  `street_1` varchar(255) NOT NULL,
  `street_2` varchar(255) NOT NULL,
  `town` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `photo_front` varchar(255) NOT NULL,
  `photo_inside` varchar(255) NOT NULL,
  `photo_back` varchar(255) NOT NULL,
  `photo_side` varchar(255) NOT NULL,
  `min_lockin_period` varchar(255) NOT NULL,
  `dedicated_and_shared` varchar(255) NOT NULL,
  `other_services_provide` varchar(255) NOT NULL,
  `available_for` varchar(255) NOT NULL,
  `tentative_price_sqr_feet` varchar(255) NOT NULL,
  `currency_id` int(11) NOT NULL,
  `my_expected_freight` varchar(255) NOT NULL,
  `type_of_service` varchar(255) NOT NULL,
  `dimension` varchar(255) NOT NULL,
  `target_pricing` varchar(255) NOT NULL,
  `wishtomove` varchar(255) NOT NULL,
  `mode_of_transport` varchar(255) NOT NULL,
  `starttime` varchar(255) NOT NULL,
  `closingtime` varchar(255) NOT NULL,
  `vendor_based_post` longtext NOT NULL,
  `type_of_product` varchar(255) NOT NULL,
  `product_requirement` varchar(255) NOT NULL,
  `essential_requirement` varchar(255) NOT NULL,
  `volume_or_dense` varchar(100) NOT NULL,
  `no_of_vehicles` varchar(255) NOT NULL,
  `container_type` varchar(255) NOT NULL,
  `type_of_vehicle` varchar(255) NOT NULL,
  `my_expect_freight` varchar(255) NOT NULL,
  `tentation_rate_Kg_in_USD` varchar(255) NOT NULL,
  `expertise_of_industries` varchar(255) NOT NULL,
  `port_airport_in_india` varchar(255) NOT NULL,
  `my_expected_charges_shipment` varchar(255) NOT NULL,
  `vehicle_placement_location` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `origin_pincode` varchar(100) NOT NULL,
  `destination_pincode` varchar(100) NOT NULL,
  `your_national` varchar(255) NOT NULL,
  `national_value` varchar(255) NOT NULL,
  `national_weight` varchar(255) NOT NULL,
  `scheduling_type` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `days` varchar(255) NOT NULL,
  `pickup_date` varchar(255) NOT NULL,
  `freight` varchar(255) NOT NULL,
  `paymentterms_percentage` varchar(255) NOT NULL,
  `reporting_time` varchar(255) NOT NULL,
  `daily_hour` varchar(255) NOT NULL,
  `monthly_km` varchar(255) NOT NULL,
  `with_without` varchar(255) NOT NULL,
  `admin_setting_status` int(11) NOT NULL COMMENT 'automatic =>0, manual=>1',
  `assign_vendor_ids` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '	0=>inactive, 1=>active',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`id`, `category_id`, `customerid`, `origin_city`, `destination_city`, `when_required_date`, `when_required_time`, `type_of_transaction`, `type_of_load`, `industry_type`, `product_commodities`, `approx_weight_kg`, `volume_weight`, `no_of_packets`, `pickup_address`, `drop_address`, `specific_requirement`, `area`, `area_dimension`, `location`, `whatsapp_no`, `type_of_warehouse`, `services`, `city`, `state`, `country`, `name`, `contact_no`, `email`, `expected_rate_sqr_feet`, `shed_requirement`, `area_required`, `street_1`, `street_2`, `town`, `district`, `pincode`, `photo_front`, `photo_inside`, `photo_back`, `photo_side`, `min_lockin_period`, `dedicated_and_shared`, `other_services_provide`, `available_for`, `tentative_price_sqr_feet`, `currency_id`, `my_expected_freight`, `type_of_service`, `dimension`, `target_pricing`, `wishtomove`, `mode_of_transport`, `starttime`, `closingtime`, `vendor_based_post`, `type_of_product`, `product_requirement`, `essential_requirement`, `volume_or_dense`, `no_of_vehicles`, `container_type`, `type_of_vehicle`, `my_expect_freight`, `tentation_rate_Kg_in_USD`, `expertise_of_industries`, `port_airport_in_india`, `my_expected_charges_shipment`, `vehicle_placement_location`, `company_name`, `origin_pincode`, `destination_pincode`, `your_national`, `national_value`, `national_weight`, `scheduling_type`, `product`, `weight`, `days`, `pickup_date`, `freight`, `paymentterms_percentage`, `reporting_time`, `daily_hour`, `monthly_km`, `with_without`, `admin_setting_status`, `assign_vendor_ids`, `status`, `created_date`, `modify_date`) VALUES
(4, 2, 26, 'bhopal123', 'indore', '2020-07-02', '18:32', 'One Time', 'Parcel', 'General', '23', '12', '', '12', '$category_id$category_id$category_id', 'An example of a long word is: Supercalifragulistic', 'An example of a long word is: Supercalifragulistic', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '0', 1, '2020-06-30 13:12:08', '2020-07-06 11:19:02'),
(5, 2, 26, 'bhopal', 'indore', '2020-07-02', '18:32', 'One Time', 'Parcel', 'General', '23', '12', '', '12', '$category_id$category_id$category_id', 'An example of a long word is: Supercalifragulistic', 'An example of a long word is: Supercalifragulistic', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '0', 1, '2020-06-30 13:12:18', '2020-07-06 11:19:05'),
(6, 5, 26, '', '', '', '', '', '', '', '', '', '', '', '', '', 'An example of a long word is: Supercalifragulistic', 'ksnfklsna3211', 'ddafndsjn', 'asdfdafs', '9754968659', 'RCC/ Alabaster,Kirby,Open to Sky,Select all,', 'Storage,Transportation,Other,Select all,', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '0', 1, '2020-06-30 15:09:31', '2020-07-06 11:19:12'),
(7, 8, 26, '', '', '', '', '', '', '', '', '', '', '', '', '', 'An example of a long word is: Supercalifragulistic', 'news arae321', '', '', '9754968659', '', '', 'indore', 'mp', 'india', 'dipesh', '9754968659', 'dipesh8786@gmail.com', '12', 'RCC/ Alabaster,Kirby,Open to Sky,Select all,', '12', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '0', 1, '2020-07-01 06:11:00', '2020-07-06 11:19:16'),
(9, 13, 26, 'dfgdfg', 'fdgdfgdf', '2020-07-02', '19:47', '', '', 'General', 'sdfsdf', '12', '', '12', 'sindhi  coloy indore', 'indore', 'sdfdsfsd', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 18, '', 'Doort to Door(DTD)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '0', 1, '2020-07-01 14:18:33', '2020-07-06 08:04:00'),
(10, 13, 26, 'dfgdfg', 'dfgdfg', '2020-07-03', '20:27', '', '', 'General', 'dsfdsfs', '23', '', '21', 'sindhi  coloy indore', 'indore', 'sdfsdfdsfs', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 16, '', 'Doort to Door(DTD)', '{\"length\":[\"12\",\"21\"],\"breadth\":[\"2\",\"2\"],\"height\":[\"3\",\"31\"],\"noofpackets\":[\"21\",\"23\"]}', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '0', 1, '2020-07-01 14:58:18', '2020-07-06 08:04:00'),
(11, 13, 26, 'Indore', 'Indore', '2020-07-02', '11:05', '', '', 'General', '2132', '23123', '', '231', 'sindhi  coloy indore', 'indore', 'asfdsfds', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 15, '', 'Door to Airport (DTA)', '{\"2\":{\"length\":[\"55\",\"23\"],\"breadth\":[\"6\",\"23\"],\"height\":[\"5\",\"23\"],\"noofpackets\":[\"6\",\"2\"]}}', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '0', 1, '2020-07-02 05:55:43', '2020-07-06 08:04:00'),
(12, 13, 26, 'Indore', 'Indore', '2020-07-02', '11:05', '', '', 'General', '2132', '23123', 'CM', '231', 'sindhi  coloy indore', 'indore', 'asfdsfds', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 170, '321', 'Door to Airport (DTA)', '{\"3\":{\"length\":[\"55\",\"23\",\"12\"],\"breadth\":[\"6\",\"23\",\"12\"],\"height\":[\"5\",\"23\",\"12\"],\"noofpackets\":[\"6\",\"2\",\"12\"]}}', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '0', 1, '2020-07-02 06:17:02', '2020-07-06 08:04:00'),
(13, 15, 26, 'xgdfgdfg', 'dfgdfgdf', '2020-07-03', '02:40', '', '', 'General', 'dfgfdg', '54684', 'CM', '654654', 'hjkjhk', 'jhkjhk', 'hjkhjk', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', 'Doort to Door(DTD)', '{\"1\":{\"length\":[\"56\"],\"breadth\":[\"56\"],\"height\":[\"56\"],\"noofpackets\":[\"56\"]}}', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '0', 1, '2020-07-02 09:11:56', '2020-07-06 08:04:00'),
(15, 18, 26, 'sdfadfd', 'dsfsd', '', '', 'Repeat', '', '', 'sdfdsf', '3515', '', '45', 'sindhi  coloy indore', 'indore', 'fghfghgfhvmkjkjhkh', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', 'sdfdsfds', '', '', '2020-07-03', '2020-07-10', '{\"vendor_based_post\":\"1\",\"turnover_of_company\":\"fgfh654654\",\"businessyear\":\"gfhgfhfgh\"}', 'High Value Product like (Gold / Platinum/ Silver Jewellery/ with in city time definit deliveries)', '', '', 'Volume', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '0', 1, '2020-07-02 14:08:24', '2020-07-06 08:04:00'),
(17, 19, 26, 'fdhfgh', 'fghgfh', '', '', '', '', 'General', 'gfhgfhfg', '321', '', '555', 'sindhi  coloy indore', 'indore', 'fsdfds', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '2020-07-02', '2020-07-10', '{\"vendor_based_post\":\"1\",\"post_vendor\":\"sadsads\",\"turnover_of_company\":\"dds\",\"businessyear\":\"fsdfds\"}', '', 'Odd Size', 'gfhgfhgf', 'Volume', '555', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '0', 1, '2020-07-02 15:19:36', '2020-07-06 08:04:00'),
(20, 28, 26, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '[\"1212\"]', '', '[\"Champion\"]', '', '', '', '', '', 'vfghfgh', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '[\"12\"]', '[\"1212\"]', '[\"With Helper\"]', 1, '18,', 1, '2020-07-09 08:27:59', '2020-07-10 06:29:16'),
(22, 26, 26, 'asdsf', 'sdfdsf,sdfsdfsd,', '2020-07-10', '12:39', '', '', '', '', '', '', '', '', '', 'dgdfg\r\n kjbvdjlfvb sd\r\ndvndv df\r\ndf\' bd\'f\r\nbd\r\ndfb \r\nv', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '3', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'One Time', 'sdfdsf', '232', '', '', 'Fixed', '{\"advance_per\":\"23\"}', '', '', '', '', 1, '25,', 1, '2020-07-10 07:09:46', '2020-07-10 07:11:11');

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
  `status` int(11) NOT NULL DEFAULT '1' COMMENT 'automatic =>0, manual=>1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `status`, `created_date`, `modify_date`) VALUES
(1, 1, '2020-06-06 14:03:33', '2020-07-09 14:07:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `fullname` varchar(255) NOT NULL,
  `gst_certificate` varchar(255) NOT NULL,
  `pan_cart_image` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `login_code` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `phone` varchar(11) NOT NULL,
  `other_phone` varchar(11) DEFAULT NULL,
  `landline` varchar(11) DEFAULT NULL,
  `pancard_no` varchar(20) NOT NULL,
  `cancelled_cheque` varchar(255) NOT NULL,
  `director_id_roof` varchar(255) NOT NULL,
  `industry_type` varchar(50) DEFAULT NULL,
  `additional_info` varchar(255) DEFAULT NULL,
  `msme_certificate` varchar(255) NOT NULL,
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

INSERT INTO `users` (`id`, `first_name`, `last_name`, `fullname`, `gst_certificate`, `pan_cart_image`, `email`, `login_code`, `phone`, `other_phone`, `landline`, `pancard_no`, `cancelled_cheque`, `director_id_roof`, `industry_type`, `additional_info`, `msme_certificate`, `main_services`, `services`, `city`, `contact_person`, `company_type`, `company_name`, `company_website`, `gst_no`, `business_years`, `password`, `verification_docs`, `user_type`, `status`, `featured`) VALUES
(1, '', '', '', '', '', 'admin@gmail.com', '', '', NULL, NULL, '', '', '', NULL, NULL, '', '', '', '', '', '', '', NULL, NULL, '', 'MTIzNDU2', '', 'admin', '1', '1'),
(2, 'snc', '', '', '', '', 'snc@gmail.com', 'LWV001', '1234567890', '1111111111', '', 'ABCDE1234F', '', '', 'hola', 'fjfj', '', 'kfk', 'kfk', 'fkfk', 'kfk', 'Proprietorship', 'fjfj', '', 'snc', '1 year', 'MTIzNDU2', '[\"863b49b2e7ad2b0175a83055160e43f6.png\",\"bf798c138a298ba0175793b42d2910e8.jpg\"]', 'vendor', '1', '0'),
(3, 'snc', '', '', '', '', 'snc@gmail.com1', '', '1234567891', '1111111111', '', 'ABCDE1234F', '', '', 'hola', 'fjfj', '', 'kfk', 'kfk', 'fkfk', 'kfk', 'Partnership', 'fjfj', '', '', '1 year', '123456', NULL, '', '1', '1'),
(4, 'sonu', 'nigam', '', '', '', 'sonu@gmail.com', 'LWC001', '9876543210', '', '', 'MNOPQ1234R', '', '', 'film', NULL, '', '', '', 'mumbai', 'udit narayan', 'Pvt. Ltd.', 'ysrj', '', 'sonu', '5 years', 'MTIzNDU2', '[\"294c370b8c6859de696a4d1777b92b59.jpg\",\"c156b2a9802b0edb7ddb409b72d6d4b7.jpg\",\"bf8894ea8f1e1dfe09b6c293b2368219.xlsx\",\"5e72ab444398d6a78eb887189620ef26.sql\"]', 'customer', '1', '1'),
(5, 'name', '', '', '', '', 'name@gmail.com', 'LWC002', '7418529630', '', '', 'ABCDE1234F', '', '', 'aa', NULL, '', '', '', 'aa', 'aa', 'Proprietorship', 'ff', 'http://www.fb.com', '', '18 years', 'MTIzNDU2', NULL, 'customer', '1', '1'),
(6, 'Sachin', 'Tendulkar', '', '', '', 'sachin@gmail.com', 'LWC003', '6666666666', '', '2222222222', 'SACHI1234N', '', '', 'Cricket', NULL, '', '', '', 'Mumbai', 'Anjali Tendulkar', 'Sports', 'MRF', '', 'Boost', '16 years', 'MTIzNDU2', NULL, 'customer', '1', '1'),
(7, 'Sourav', 'Ganguly', '', '', '', 'sourav@gmail.com', 'LWC004', '4444444444', '1111111111', '', 'SOURA1234V', '', '', 'Cricket', NULL, '', '', '', 'Kolkata', 'Dona Ganguly', 'Sports', 'Britannia', '', 'Milo', '14 years', 'MTIzNDU2', NULL, 'customer', '1', '0'),
(10, 'Anil', 'vendor', '', '', '', 'info@eweblabs.com', 'LWV004', '8527239178', '', '', 'DAFPS0250E', '', '', 'ITs', 'Test Description', '', 'IT ', 'Website development', 'Gurgaon', 'Anil singh', 'Pvt. Ltd.', 'Eweblabs PVT LTD', '', 'Anil', '10', 'MTIzNDU2', '[\"1a662e02653d38036e7356385d812da2.jpg\",\"4b715cb3db9596d7f0d95936b3382ad8.jpg\",\"3b97764ab79c26eb915f9a5c1f541598.png\"]', 'vendor', '1', '1'),
(11, 'anil', 'singh', '', '', '', 'singhanil221@gmail.com', 'LWC005', '7539514568', '', '', 'DAFLK0250E', '', '', 'ITs', NULL, '', '', '', 'GURGAON', 'Mr. ANIL SINGH', 'Pvt. Ltd.', 'Eweblabs Pvt LTd', '', 'anil', '5', 'MTIzNDU2', '[\"e7bf7a12098a7468ec40b8c7db48df54.jpg\",\"714b6a8a4a7e210d17cc0af8a69ed483.jpg\",\"ea315a091effc5ea882291d9bba00a4a.png\"]', 'customer', '1', '1'),
(12, 'Amit', 'Kumar', '', '', '', 'amit@adka.com', 'LWC006', '7536542585', '', '4582586586', 'AMITI1234N', '', '', 'Cricket', NULL, '', '', '', 'Mumbai', 'Anjali Tendulkar', 'Sports', 'MRF', '', 'Boost', '16 years', 'MTIzNDU2', NULL, 'customer', '1', '1'),
(13, 'Rakesh', 'Verma', '', '', '', 'rakesh@asda.com', 'LWC007', '4569523585', '123456856', '', 'KJHUJ1234V', '', '', 'Cricket', NULL, '', '', '', 'Kolkata', 'Dona Ganguly', 'Sports', 'Britannia', '', 'Milo', '14 years', 'MTIzNDU2', NULL, 'customer', '1', '0'),
(16, 'Sachin', 'Tendulkar', '', '', '', 'sachin@cricket.com', 'LWC008', '6666666699', '', '2222222222', 'SACHI1234N', '', '', 'Cricket', NULL, '', '', '', 'Mumbai', 'Anjali Tendulkar', 'Proprietorship', 'MRF', '', 'Boost', '16 years', 'MTIzNDU2', NULL, 'customer', '', '1'),
(17, 'Sourav', 'Ganguly', '', '', '', 'sourav@cricket.com', 'LWC009', '4444444477', '1111111111', '', 'SOURA1234V', '', '', 'Cricket', NULL, '', '', '', 'Kolkata', 'Dona Ganguly', 'Partnership', 'Britannia', '', 'Sourav', '4 years', 'MTIzNDU2', '[\"e2431929ea61630feb576942c20b0cd9.jpg\"]', 'customer', '0', '1'),
(18, 'Indira', 'Gandhi', '', '', '', 'indira@congress.com', 'LWV005', '1950195019', '1919191719', '', 'INDIR1234A', '', '', 'Politics', 'Rajiv', '', 'Prime Minister', 'Poverty', 'Allahabad', 'Jawahar Lal Nehru', 'Pvt. Ltd.', 'Priyanka Gandhi', '', '786786787', '6 months', 'MTIzNDU2', NULL, 'vendor', '0', '0'),
(25, 'V', 'yadav', '', '[\"a3e029c45f74b9ff6190cec31c3e5bd3.png\"]', '[\"2d8e447e9d9357942cf1c110509d6b58.png\"]', 'dipesh9897@gmail.com', '', '9754968659', '', '', '', '[\"a65e7bd017a163d39ed2d8c547b5d50f.png\"]', '[\"c3a654454b0b6327954bac180fb5c355.png\"]', 'lknlknkln', 'Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.', '[\"0db4ffdde12f10d9b74ffd733056be73.png\"]', 'Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.', 'Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.', 'Indore', '9876543210', 'Partnership', 'Software Developer', '', 'dipesh', 'Software Developer', 'ZGlwZXNoQDMyMQ==', NULL, 'vendor', '1', '1'),
(26, 'C', 'yadav', '', '[\"a8f315d1187a2e934be2751c22d031c9.png\"]', '[\"337d5ddc0be3fd153241decd885d5c5f.png\"]', 'xyz@gmail.com', '', '9898765432', '', '9876543210', '', '', '', 'Load Provider', NULL, '', '', '', 'Indore', '9876543210', 'Proprietorship', 'Software Developer', '', '', '1', 'ZGlwZXNoQDMyMQ==', NULL, 'customer', '1', '1'),
(27, '', NULL, '', '', '', 'dipesh989gg7@gmail.com', '', '9754968651', NULL, NULL, '', '', '', NULL, NULL, '', '', '', '', '', '', '', NULL, NULL, '', 'ZGlwZXNo', NULL, 'customer', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `vehicle` varchar(255) NOT NULL,
  `vehicle_type` varchar(255) NOT NULL,
  `vehicle_type_mention` varchar(255) NOT NULL,
  `owner_name` varchar(255) NOT NULL,
  `registering_authority` varchar(255) NOT NULL,
  `vehicle_class` varchar(255) NOT NULL,
  `fuel_type` varchar(255) NOT NULL,
  `registration_date` varchar(255) NOT NULL,
  `fitness_valid_upto` varchar(255) NOT NULL,
  `insurance_valid_upto` varchar(255) NOT NULL,
  `tax_valid_upto` varchar(255) NOT NULL,
  `pucc_valid_upto` varchar(255) NOT NULL,
  `vehicle_no` varchar(255) NOT NULL,
  `vehicle_images` varchar(255) NOT NULL,
  `vehicle_important_images` varchar(255) NOT NULL,
  `assign_driver_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '0=>inactive, 1=>active',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `vendor_id`, `vehicle`, `vehicle_type`, `vehicle_type_mention`, `owner_name`, `registering_authority`, `vehicle_class`, `fuel_type`, `registration_date`, `fitness_valid_upto`, `insurance_valid_upto`, `tax_valid_upto`, `pucc_valid_upto`, `vehicle_no`, `vehicle_images`, `vehicle_important_images`, `assign_driver_id`, `status`, `created_date`, `modify_date`) VALUES
(3, 18, 'dfhgfh', 'Open Body', '', 'fghfghfg', 'hfghfghfgh', 'fghfghfghfg', 'fghfghfgh', '2020-06-22', 'fghfgh', 'fghfghfgh', 'gfhfgh', 'fghfghfgh', 'fghgfhfghfg', '[\"71b70496568ebc9ebf7dcf82663789b6.png\",\"fa18d565e147b607933aab0bc5bff9ad.jpg\",\"27a25456e5ffaec424044cd3cff921f8.pdf\"]', '[\"dd6a9197ac3b2baf510fe55cf0726eda.jpg\",\"0561bafe80a9dc20e0c48d76d336d0e1.pdf\",\"0e99c96cebd48e413ca9ac9c55689239.png\"]', 22, 1, '2020-06-23 08:23:11', '2020-07-09 12:02:23'),
(4, 25, 'ASA', 'Closed Container Body', '', 'SASA', 'ASASA', 'SAS', 'ASAS', '2020-07-10', 'ASAS', 'ASAS', 'SA', 'ASASA', 'SASAS', '[\"f2c417dfe11534c4e2e55aad21545a4e.JPG\"]', '[\"e3a1a09297eaefbc9516efce0b40aacc.JPG\"]', 0, 1, '2020-07-10 06:45:53', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_enquiry_bit`
--

CREATE TABLE `vendor_enquiry_bit` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `reference_id` varchar(100) NOT NULL,
  `customerid` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `equiry_status` varchar(255) NOT NULL COMMENT 'accept,accepted,cancel',
  `enquiry_id` int(11) NOT NULL,
  `enquiry_detail` longtext NOT NULL,
  `rate_per_unit` varchar(255) NOT NULL,
  `validity` varchar(255) NOT NULL,
  `credit_term` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `assign_driver_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor_enquiry_bit`
--

INSERT INTO `vendor_enquiry_bit` (`id`, `vendor_id`, `reference_id`, `customerid`, `category_id`, `equiry_status`, `enquiry_id`, `enquiry_detail`, `rate_per_unit`, `validity`, `credit_term`, `message`, `assign_driver_id`, `status`, `created_date`, `modify_date`) VALUES
(10, 25, 'LW-5f08151b69ad0', 26, 26, 'accepted', 22, '', '121', '1ssdfds', 'sddfdsf', 'sdfdsfdsf', 22, 1, '2020-07-10 07:13:31', '2020-07-10 07:14:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
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
-- Indexes for table `vendor_enquiry_bit`
--
ALTER TABLE `vendor_enquiry_bit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vendor_enquiry_bit`
--
ALTER TABLE `vendor_enquiry_bit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
