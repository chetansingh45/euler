-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2022 at 09:25 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `euler`
--

-- --------------------------------------------------------

--
-- Table structure for table `eep_page`
--

CREATE TABLE `eep_page` (
  `id` int(11) NOT NULL,
  `section_name` varchar(255) DEFAULT NULL,
  `main_title` varchar(255) DEFAULT NULL,
  `main_description` longtext DEFAULT NULL,
  `main_image` varchar(255) DEFAULT NULL,
  `main_image_alt` varchar(200) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `footer_title` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `logo_alt` varchar(200) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `btn_link` varchar(255) DEFAULT NULL,
  `btn_text` varchar(255) DEFAULT NULL,
  `iframe` longtext DEFAULT NULL,
  `side` varchar(100) DEFAULT NULL,
  `right_title` varchar(200) NOT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eep_page`
--

INSERT INTO `eep_page` (`id`, `section_name`, `main_title`, `main_description`, `main_image`, `main_image_alt`, `title`, `footer_title`, `logo`, `logo_alt`, `description`, `btn_link`, `btn_text`, `iframe`, `side`, `right_title`, `status`) VALUES
(1, 'meta', 'Euler | EEP', 'EEP', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1),
(2, 'hero', NULL, NULL, 'https://www.eulermotors.com/images/EEP_Banner.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1),
(3, 'section_two', 'Own a Euler HiLoad Vehicle by paying only ₹1*', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1),
(4, 'section_two', NULL, NULL, NULL, NULL, ' Start earning from day 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(5, 'section_two', NULL, NULL, NULL, NULL, 'Lockdown Proof business', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(6, 'section_two', NULL, NULL, NULL, NULL, 'Assured Monthly Income', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(7, 'section_two', NULL, NULL, NULL, NULL, '100% Transparency', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(8, 'section_two', NULL, NULL, NULL, NULL, 'Trusted Partners', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(10, 'section_three', 'How does EEP work?', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1),
(11, 'section_three', NULL, NULL, NULL, NULL, 'Own your very own brand new vehicle', NULL, 'https://www.eulermotors.com/images/icon_lease.png', 'Own your very own brand new vehicle', NULL, NULL, NULL, NULL, NULL, '', NULL),
(12, 'section_three', NULL, NULL, NULL, NULL, 'Assign the vehicle for reputed companies like BigBasket,Flipkart, Udaan etc.', NULL, '	http://localhost/euler-new1/images/icon_setting.png', 'Assign the vehicle for reputed companies like BigBasket,Flipkart, Udaan etc.', NULL, NULL, NULL, NULL, NULL, '', NULL),
(13, 'section_three', NULL, NULL, NULL, NULL, 'Choose the when and where you want to work.', NULL, 'https://www.eulermotors.com/images/icon_switch.png', 'Choose the when and where you want to work.', NULL, NULL, NULL, NULL, NULL, '', NULL),
(14, 'section_three', NULL, NULL, NULL, NULL, 'You or your drivers will participate in a 2 day training programme', NULL, '	https://www.eulermotors.com/images/icon_purchase.png', 'You or your drivers will participate in a 2 day training programme', NULL, NULL, NULL, NULL, NULL, '', NULL),
(15, 'section_three', NULL, NULL, NULL, NULL, 'Earn an assured monthly income starting from ₹38,000/-*', NULL, '	https://www.eulermotors.com/images/icon_money.png', 'Earn an assured monthly income starting from ₹38,000/-*', NULL, NULL, NULL, NULL, NULL, '', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eep_page`
--
ALTER TABLE `eep_page`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eep_page`
--
ALTER TABLE `eep_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
