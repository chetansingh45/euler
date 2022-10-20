-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2022 at 08:50 PM
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
-- Table structure for table `about_page`
--

CREATE TABLE `about_page` (
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
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about_page`
--

INSERT INTO `about_page` (`id`, `section_name`, `main_title`, `main_description`, `main_image`, `main_image_alt`, `title`, `footer_title`, `logo`, `logo_alt`, `description`, `btn_link`, `btn_text`, `iframe`, `side`, `right_title`, `status`) VALUES
(1, 'meta', 'About-us', 'about-us', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1),
(2, 'hero', 'Electric future is here, and we are in the driver’s seat.', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/about-hero.jpg', NULL, 'Sustainable. Electric. Future.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1),
(3, 'section_two', 'What Powers Us', '<p>The world is going electric and Euler believes in democratising the revolution. Our innovative mobility solutions are custom made for India. We aim to create superior alternatives to traditional mobility and eradicate barriers for mass adoption of EVs in India.</p><p>Our road-ready, sustainable last-mile logistic solutions have already proved their mettle in e-commerce and 3PL businesses. And now we are ready with the next chapter in electric mobility.</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1),
(4, 'section_two', NULL, NULL, NULL, NULL, 'Vehicle from Euler motors', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/Euler-veh-small.png', 'Vehicle from Euler motors', NULL, NULL, NULL, NULL, NULL, '', 1),
(5, 'section_two', NULL, NULL, NULL, NULL, 'Driver/Mechanic Hiring/Training', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/eco-img2.jpg', 'Driver/Mechanic Hiring/Training', NULL, NULL, NULL, NULL, NULL, '', 1),
(6, 'section_two', NULL, NULL, NULL, NULL, 'Software Stack', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/eco-img3.jpg', 'Software Stack', NULL, NULL, NULL, NULL, NULL, '', 1),
(7, 'section_two', NULL, NULL, NULL, NULL, 'Charging Station + Service + Field Assistance', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/eco-img4.jpg', 'Charging Station + Service + Field Assistance', NULL, NULL, NULL, NULL, NULL, '', 1),
(8, 'section_four', 'The Story So Far', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1),
(12, 'section_four', NULL, NULL, NULL, NULL, '2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1),
(14, 'section_four', NULL, NULL, NULL, NULL, '2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1),
(15, 'section_five', 'Trusted by Investors', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1),
(16, 'section_five', NULL, NULL, NULL, NULL, 'Inventus Capital', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/trusted_img1.jpg', 'Inventus Capital', NULL, NULL, NULL, NULL, NULL, '', 1),
(17, 'section_five', NULL, NULL, NULL, NULL, 'Blume Ventures', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/trusted_img2.jpg', 'Blume Ventures', NULL, NULL, NULL, NULL, NULL, '', 1),
(18, 'section_five', NULL, NULL, NULL, NULL, 'Jetty Ventures', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/trusted_img3.jpg', 'Jetty Ventures', NULL, NULL, NULL, NULL, NULL, '', 1),
(19, 'section_five', NULL, NULL, NULL, NULL, 'ADB Ventures', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/adb-logo.jpg', 'ADB Ventures', NULL, NULL, NULL, NULL, NULL, '', 1),
(20, 'section_five', NULL, NULL, NULL, NULL, 'Emergent Ventures', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/EV2+Logo+(1).png', 'Emergent Ventures', NULL, NULL, NULL, NULL, NULL, '', 1),
(21, 'section_six', 'Our Team', 'Enthusiatic individuals fueled by passion', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1),
(22, 'section_six', NULL, NULL, NULL, NULL, '', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/team_photo1.webp', 'euler', NULL, NULL, NULL, NULL, NULL, '', 1),
(23, 'section_six', NULL, NULL, NULL, NULL, NULL, NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/team_photo2.webp', 'team 3 ', NULL, NULL, NULL, NULL, NULL, '', 1),
(24, 'section_six', NULL, NULL, NULL, NULL, NULL, NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/team_photo3.webp', 'team 1', NULL, NULL, NULL, NULL, NULL, '', 1),
(25, 'section_seven', 'Want to move your fleet to electric, we can help you.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://www.eulermotors.com/contact.php', 'Contact Us', NULL, NULL, '', 1),
(31, 'section_four', NULL, NULL, NULL, NULL, '2021', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1),
(34, 'section_four', NULL, NULL, NULL, NULL, '2018', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `about_page_items`
--

CREATE TABLE `about_page_items` (
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
  `year_id` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about_page_items`
--

INSERT INTO `about_page_items` (`id`, `section_name`, `main_title`, `main_description`, `main_image`, `main_image_alt`, `title`, `footer_title`, `logo`, `logo_alt`, `description`, `btn_link`, `btn_text`, `iframe`, `side`, `right_title`, `year_id`, `status`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, 'Q1 2018', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/story/2018/img1.png', '', 'It all started with a vision to build  a Electric commercial vehicle  1st  factory', NULL, NULL, NULL, NULL, '', 11, 1),
(2, NULL, NULL, NULL, NULL, NULL, 'Q2 2018', NULL, '76601img1.png', NULL, 'Got our 1st client  on board raised 13.2 Crore ', NULL, NULL, NULL, NULL, '', 11, 1),
(3, NULL, NULL, NULL, NULL, NULL, 'Q1 2019', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/story/2019/img1.jpg', NULL, 'Fundraise', NULL, NULL, NULL, NULL, '', 12, 1),
(4, NULL, NULL, NULL, NULL, NULL, 'Q2 2019', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/story/2019/img2.jpg', NULL, 'Battery manufacturing started in factory 2', NULL, NULL, NULL, NULL, '', 12, 1),
(5, NULL, NULL, NULL, NULL, NULL, 'Q3 2019', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/story/2019/img3.jpg', NULL, '200  vehicles deployed', NULL, NULL, NULL, NULL, '', 12, 1),
(6, NULL, NULL, NULL, NULL, NULL, 'Q4 2019', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/story/2019/img4.jpg', NULL, '100 charging station deployed', NULL, NULL, NULL, NULL, '', 12, 1),
(7, NULL, NULL, NULL, NULL, NULL, 'Q1 2020', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/story/2020/img1.jpg', NULL, 'Raised 20 Crore as part of Series A fund', NULL, NULL, NULL, NULL, '', 14, 1),
(8, NULL, NULL, NULL, NULL, NULL, 'Q2 2020', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/story/2020/img2.jpg', NULL, 'L5 vehicle registration done & testing initiated', NULL, NULL, NULL, NULL, '', 14, 1),
(9, NULL, NULL, NULL, NULL, NULL, 'Q1 2021', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/story/2021/img1.jpg', NULL, 'New L5 vehicle coming soon', NULL, NULL, NULL, NULL, '', 31, 1),
(10, NULL, NULL, NULL, NULL, NULL, 'Q2 2021', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/story/2020/img2.jpg', NULL, 'desc', NULL, NULL, NULL, NULL, '', 31, 1),
(12, NULL, NULL, NULL, NULL, NULL, 'Q1 2025', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/story/2020/img2.jpg', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/story/2020/img2.jpg', NULL, NULL, NULL, NULL, '', 32, 1),
(13, NULL, NULL, NULL, NULL, NULL, 'Q1 2018', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/story/2020/img2.jpg', NULL, 'It all started with a vision to build  a Electric commercial vehicle  1st  factory', NULL, NULL, NULL, NULL, '', 32, 1),
(14, NULL, NULL, NULL, NULL, NULL, '2021 ttile', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/story/2020/img2.jpg', NULL, 'Raised 20 Crore as part of Series A fund', NULL, NULL, NULL, NULL, '', 32, 1),
(17, NULL, NULL, NULL, NULL, NULL, 'Q1 2018', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/story/2020/img2.jpg', NULL, 'Malachi Moran', NULL, NULL, NULL, NULL, '', 34, 1),
(18, NULL, NULL, NULL, NULL, NULL, 'Q1 2025', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/story/2020/img2.jpg', NULL, 'It all started with a vision to build  a Electric commercial vehicle  1st  factory', NULL, NULL, NULL, NULL, '', 34, 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `updated_at`, `created_at`) VALUES
(2, 'Super Admin', 'superadmin@gmail.com', '$2y$10$/CV8EwEozx9YOjpe1pnfbexxSl2Y7wGITkXpcUsysgNo/DYCLsz5m', '2021-10-21', '2021-10-21 09:49:51');

-- --------------------------------------------------------

--
-- Table structure for table `carrer_page`
--

CREATE TABLE `carrer_page` (
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
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carrer_page`
--

INSERT INTO `carrer_page` (`id`, `section_name`, `main_title`, `main_description`, `main_image`, `main_image_alt`, `title`, `footer_title`, `logo`, `logo_alt`, `description`, `btn_link`, `btn_text`, `status`) VALUES
(1, 'hero', 'Join the team!', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/careers-hero.jpg', '', 'Make your next transition worthy', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(2, 'section_two', 'Why choose Euler?', 'We aim to press the hyper speed button on the world&#39;s transition to sustainable energy. Join us if you share our passion for innovation and can back it up with your talent and perseverance.', 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/team_photo2.jpg', 'Why choose Euler?', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(3, 'section_three', 'We don’t let cubicles block our vision.', 'At Euler, we believe that great teams are built on a foundation of transparency. We encourage teams to spill over, merge and synergise, giving us a fresh perspective at all times. That means all it takes to share your new, revolutionary idea is a simple stroll to the other desk.', 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/careers-bg1.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(4, 'section_four', 'We believe that diversity fuels innovation.', 'You can’t build something new when everyone thinks the same. A diverse team helps us in coming up with new approaches and innovative solutions.&nbsp;', 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/careers-bg2.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(5, 'section_five', 'We unlearn to learn.', 'Building something from scratch involves a lot of breaking. Shattering conventions, smashing inhibitions and dismantling procedures to build it all from the ground up.', 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/careers-bg3.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(6, 'section_six', 'Want to be a part of our team?', 'Send your CV to hr@eulermotors.com', 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/careers-bg4.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(7, 'meta', 'Euler mototrs Carrers', 'meta descscription test', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'HiLoad', '2021-10-11 09:08:39', '2021-10-11 11:08:13');

-- --------------------------------------------------------

--
-- Table structure for table `charging_station_page`
--

CREATE TABLE `charging_station_page` (
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
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `charging_station_page`
--

INSERT INTO `charging_station_page` (`id`, `section_name`, `main_title`, `main_description`, `main_image`, `main_image_alt`, `title`, `footer_title`, `logo`, `logo_alt`, `description`, `btn_link`, `btn_text`, `iframe`, `status`) VALUES
(1, 'meta', 'Charging Station', 'test meta description                                                      ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(2, 'section_three', 'Flash27 | Fast Charger', 'We get it, you are in the fast lane to success, and you want nothing to slow you down. Introducing the Euler Lightning Charger - It’s 26kW power can keep up with your speed and reduce your waiting time by hours.', 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/flash-27-new.png', 'charging-network', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(3, 'section_three', NULL, NULL, NULL, NULL, 'Get 50km charge in 15 minutes', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/time.png', 'time', NULL, NULL, NULL, NULL, 1),
(4, 'section_three', NULL, NULL, NULL, NULL, 'Check charge status remotely through Shepherd app', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/charge-status.png', 'charge-status', NULL, NULL, NULL, NULL, 1),
(5, 'section_three', NULL, NULL, NULL, NULL, 'Get Book slots online on the Shepherd app', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/online-booking.png', 'online-booking', NULL, NULL, NULL, NULL, 1),
(7, 'section_three', NULL, NULL, NULL, NULL, 'Get Access it at any Euler hub', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/network.png', 'network', NULL, NULL, NULL, NULL, 1),
(8, 'hero', 'CHARGING NETWORK', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/changing-hero-bg.jpg', NULL, 'Welcome to Our Extensive and fast-spreading', NULL, NULL, NULL, NULL, NULL, NULL, 'https://www.youtube.com/embed/q9IeQICvOnE', 1),
(9, 'section_four', 'Onboard Charger', 'Wish to avoid trips to the charging station? Then bring the charging station to your doorstep with our On-Board Charger. It is already connected to your HiLoad and is super convenient to use. All you need to do is find a 3 pin socket and plug it in.', 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/CS_02.jpg', 'Onboard Charger', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(12, 'section_four', NULL, NULL, NULL, NULL, 'Check charge status remotely through Shepherd app', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/charge-status.png', 'charging status', NULL, NULL, NULL, NULL, 1),
(13, 'section_four', NULL, NULL, NULL, NULL, 'In-built auto cut-off & surge protection', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/tick.png', 'tick', NULL, NULL, NULL, NULL, 1),
(14, 'section_four', NULL, NULL, NULL, NULL, 'Hassle-free, plug & charge', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/robot.png', 'Hassle-free, plug & charge', NULL, NULL, NULL, NULL, 1),
(15, 'section_five', 'Charge on Wheels', 'Looking for a battery top-up on the go? Get charging on the move with our on-call mobile charging units.', 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/CS_04.jpg', 'Charge on Wheels', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(16, 'section_five', NULL, NULL, NULL, NULL, 'On-Road Charging', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/robot.png', 'On-Road Charging', NULL, NULL, NULL, NULL, 1),
(17, 'section_five', NULL, NULL, NULL, NULL, 'Roadside breakdown assistance', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/setting.png', 'Roadside breakdown assistance', NULL, NULL, NULL, NULL, 1),
(18, 'section_five', NULL, NULL, NULL, NULL, 'On-demand doorstep maintenance', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/men.png', 'On-demand doorstep maintenance', NULL, NULL, NULL, NULL, 1),
(19, 'section_five', NULL, NULL, NULL, NULL, 'Get 20km range with a 30min charge', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/time.png', 'Get 20km range with a 30min charge', NULL, NULL, NULL, NULL, 1),
(20, 'section_five', 'Charge on Wheels', 'Looking for a battery top-up on the go? Get charging on the move with our on-call mobile charging units.', 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/CS_04.jpg', 'Charge on Wheels', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` bigint(12) NOT NULL,
  `enquiry_type` varchar(100) NOT NULL,
  `message` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `email`, `mobile`, `enquiry_type`, `message`, `created_at`) VALUES
(4, 'chetan singh', 'coders24.online@gmail.com', 919753591245, 'service', 'test', '2021-12-30 06:02:40'),
(6, 'chetan singh', 'chetan.singh@webee.com', 9753591245, 'corporate', 'Qui ea provident la', '2022-02-04 08:05:59'),
(7, 'Chetan singh', 'qavuwom@mailinator.com', 7049056454, 'service', 'Dolorum vitae in non', '2022-02-04 08:10:09'),
(8, 'chetan singh', 'chetan.singh@webee.com', 9753591245, 'service', 'Sequi ut dolorem pra', '2022-02-04 10:03:46');

-- --------------------------------------------------------

--
-- Table structure for table `contact_page`
--

CREATE TABLE `contact_page` (
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
-- Dumping data for table `contact_page`
--

INSERT INTO `contact_page` (`id`, `section_name`, `main_title`, `main_description`, `main_image`, `main_image_alt`, `title`, `footer_title`, `logo`, `logo_alt`, `description`, `btn_link`, `btn_text`, `iframe`, `side`, `right_title`, `status`) VALUES
(1, 'hero', 'Contact Us', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/contact-hero.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1),
(2, 'meta', 'Contact Us', 'Contact Us                                         ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1),
(3, 'section_two', 'Corporate Office', 'B-99, Panchsheel Vihar, New Delhi. 110017 Contact:011-45018656', NULL, NULL, ' Factory', NULL, NULL, NULL, 'C-8, Pocket C, Okhla Phase I, Okhla Industrial Area, New Delhi, Delhi 110020', NULL, NULL, NULL, NULL, '', 1),
(4, 'section_three', 'Feel free to contact us any time. We will get back to you as soon as we can! ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1),
(5, 'section_four', 'For Suppliers & Vendors / Manufacturing relations', '<p>If you are a supplier or a vendor at Euler Motors, please contact us directly at&nbsp;<a href=\"mailto:emscm@eulermotors.com\">emscm@eulermotors.com</a></p>', NULL, NULL, 'For job opportunities', NULL, NULL, NULL, '<p>If you are interested in working with Euler Motors&nbsp;<a href=\"mailto:hr@eulermotors.com\">hr@eulermotors.com</a></p>', NULL, NULL, NULL, NULL, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dealership`
--

CREATE TABLE `dealership` (
  `id` int(11) NOT NULL,
  `genderprefix` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `dob` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `qualification` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `pincode` bigint(20) NOT NULL,
  `partnership` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `state_applied_for` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `city_applied_for` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `current_business_detail` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `experience` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `years` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `partnered_with` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `annual_turnover` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `land_detail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount_willing_to_invest` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dealership`
--

INSERT INTO `dealership` (`id`, `genderprefix`, `name`, `email`, `dob`, `qualification`, `address`, `state`, `city`, `pincode`, `partnership`, `state_applied_for`, `city_applied_for`, `current_business_detail`, `experience`, `years`, `partnered_with`, `annual_turnover`, `land_detail`, `comment`, `amount_willing_to_invest`, `updated_at`, `created_at`) VALUES
(3, 'Mr', 'Imogene Casey', 'rujefu@mailinator.com', 'A ea dolore quisquam', 'Esse quo non culpa', 'Sunt occaecat accusa', 'Nagaland', 'Dimapur', 452016, 'Authorized Service Center', 'Delhi', 'Delhi', 'Velit esse et simili', 'Magnam qui autem sed', '1989', 'Quo maxime eiusmod o', 'Laborum placeat quo', 'Owned', 'Est vero sapiente o', '50 Lakhs to 1 Crore', NULL, '2021-12-30 09:15:31'),
(4, 'Ms', 'chetan singh', 'coders24.online@gmail.com', 'Doloribus mollitia s', 'Sit ipsum blanditii', 'Nihil sint sint eu e', 'Madhya Pradesh', 'Indore', 452016, 'Authorized Service Center', 'Delhi', 'Delhi', 'Lorem rerum aliquam', 'Lorem quis cupiditat', '1977', 'Mollit commodo ullam', 'Culpa cupiditate et', 'Leased', 'Quidem magna ab exer', '1 to 3 Crore', NULL, '2022-02-04 08:08:53'),
(5, 'Ms', 'chetan singh', 'coders24.online@gmail.com', 'Doloribus mollitia s', 'Sit ipsum blanditii', 'Nihil sint sint eu e', 'Madhya Pradesh', 'Indore', 452016, 'Authorized Service Center', 'Delhi', 'Delhi', 'Lorem rerum aliquam', 'Lorem quis cupiditat', '1977', 'Mollit commodo ullam', 'Culpa cupiditate et', 'Leased', 'Quidem magna ab exer', '1 to 3 Crore', NULL, '2022-02-04 08:08:53');

-- --------------------------------------------------------

--
-- Table structure for table `dealership_page`
--

CREATE TABLE `dealership_page` (
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
  `is_video` int(11) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dealership_page`
--

INSERT INTO `dealership_page` (`id`, `section_name`, `main_title`, `main_description`, `main_image`, `main_image_alt`, `title`, `footer_title`, `logo`, `logo_alt`, `description`, `btn_link`, `btn_text`, `iframe`, `is_video`, `status`) VALUES
(1, 'section_two', 'Dealership', '<p>Euler Motors is one of India’s fastest growing commercial Electric Vehicle Company in India. And we are looking for like-minded partners to take our brand to every corner of India through authorised dealerships.</p><p>Electric powered vehicles are becoming mainstream with every passing day. Give yourself the early mover advantage with Euler. Come, be a part of the Euler network and open your doors to prosperity.</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'take the next step', NULL, 0, 1),
(2, 'hero', 'Dealership', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/dealership-banner.png', NULL, 'Think Big. Think Euler Dealership.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1),
(3, 'meta', 'Dealership', 'Dealership', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `eep_form`
--

CREATE TABLE `eep_form` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `age` varchar(10) NOT NULL,
  `city` varchar(100) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eep_form`
--

INSERT INTO `eep_form` (`id`, `name`, `age`, `city`, `contact`, `created_at`) VALUES
(3, 'Faith Lambert', '93', 'Noida', 'Cupidatat sed laboru', '2022-02-11 13:46:20'),
(4, 'Burke Kim', '53', 'Faridabad', 'Id nisi exercitation', '2022-02-11 13:46:30');

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

-- --------------------------------------------------------

--
-- Table structure for table `faq_page`
--

CREATE TABLE `faq_page` (
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
  `heading1` varchar(200) DEFAULT NULL,
  `heading2` varchar(200) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq_page`
--

INSERT INTO `faq_page` (`id`, `section_name`, `main_title`, `main_description`, `main_image`, `main_image_alt`, `title`, `footer_title`, `logo`, `logo_alt`, `description`, `btn_link`, `btn_text`, `iframe`, `side`, `right_title`, `heading1`, `heading2`, `status`) VALUES
(1, 'hero', 'FAQ', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/telematics-bg.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 1),
(2, 'meta', 'FAQ', 'euler faq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 1),
(3, 'section_two', NULL, NULL, NULL, NULL, 'How do I purchase the Euler HiLoad?', NULL, NULL, NULL, 'You would first need to reserve one by making a booking with a fully refundable amount of Rs ₹999. Your order would then be created. Depending on your order’s sequence in the queue and our delivery schedule, you will be notified via email or call whenever your order is ready for purchase completion. The booking token money will be adjusted against the final amount you pay to complete your purchase.', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL),
(4, 'section_two', NULL, NULL, NULL, NULL, 'In which cities will Euler HiLoad be delivered?', NULL, NULL, NULL, 'We’ve confirmed cities so far - New Delhi, Gurugram,Noida, Ghaziabad, Faridabad. For the latest updates about the confirmed cities and timelines, continue to visit the Euler Motors website .', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL),
(5, 'section_two', NULL, NULL, NULL, NULL, 'Do you have city-wise list of locations to test ride the Euler HiLoad?', NULL, NULL, NULL, 'To test ride the Euler HiLoad in Delhi/NCR you can fill in the online form on our website and then our team will reach out to you for the test ride of the vehicle as per your convenience. Our showrooms will be operational in Gurugram (Sector 17), New Delhi (Okhla) soon . We will reveal details about our retail showrooms in other cities soon. Our website will be updated to carry the coordinates and other details of these experience centers as and when we confirm them.', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL),
(6, 'section_two', NULL, NULL, NULL, NULL, 'How would Euler Motors be selling to its customers in all the cities?', NULL, NULL, NULL, 'We will sell directly to the customer through our showrooms in Delhi, Gurugram, Noida, Ghaziabad &amp; Faridabad. In the other cities, we may sell through our dealer partners. The details will be available on our website as and when we confirm them.', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL),
(7, 'section_two', NULL, NULL, NULL, NULL, 'How do I check the status of my order?', NULL, NULL, NULL, 'Once you’ve booked, you can call us at 1800 1238 1238 or write to us at customercare@eulermotors.com. Please note that you will have to use the same email ID and phone number that you used to book the vehicle.', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL),
(8, 'section_two', NULL, NULL, NULL, NULL, 'Will I get a FAME subsidy on purchasing the vehicle?', NULL, NULL, NULL, 'Yes, Euler HiLoad is FAME II compliant and is eligible for a subsidy of ~₹30000', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL),
(9, 'section_two', NULL, NULL, NULL, NULL, 'Do you offer a loan for purchasing Euler HiLoad?', NULL, NULL, NULL, 'Yes, we have two loan partners - who will help finance your purchase and we’re in talks to on-board more partners.', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL),
(10, 'section_two', NULL, NULL, NULL, NULL, 'I would like to buy more than one vehicle from my booking registration, is it possible?', NULL, NULL, NULL, 'For every vehicle, you need to make a booking separately. We haven&#39;t placed any restriction on the number of bookings per person.', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `id` int(11) NOT NULL,
  `form_data` longtext NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `getupdates`
--

CREATE TABLE `getupdates` (
  `id` int(11) NOT NULL,
  `genderprefix` varchar(50) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` bigint(12) NOT NULL,
  `designation` varchar(200) NOT NULL,
  `industry` varchar(200) NOT NULL,
  `organization` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hiload_page`
--

CREATE TABLE `hiload_page` (
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
  `heading1` varchar(200) DEFAULT NULL,
  `heading2` varchar(200) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hiload_page`
--

INSERT INTO `hiload_page` (`id`, `section_name`, `main_title`, `main_description`, `main_image`, `main_image_alt`, `title`, `footer_title`, `logo`, `logo_alt`, `description`, `btn_link`, `btn_text`, `iframe`, `side`, `right_title`, `heading1`, `heading2`, `status`) VALUES
(1, 'meta', 'Euler HiLoad - Electric Cargo Three Wheeler | Bookings Open', 'Meet the Euler HiLoad electric loading three wheeler &nbsp;with best-in-class payload capacity (688 Kg), range (151Km) and battery power (12.4 kWh)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 1),
(5, 'section_two', 'Bada Socho Euler HiLoad Socho', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://youtu.be/mDdcZOydobw', 'Watch the launch event ', 'https://www.youtube.com/embed/yD5YgTb1-LE', NULL, '', NULL, NULL, 1),
(6, 'section_three', 'Badi Performance', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/auto-hi-load.jpg', 'Badi Performance', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 1),
(7, 'section_three', NULL, NULL, NULL, NULL, 'Badi Load Capacity', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/strong-new.png', 'badi load capacity', '688Kg', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL),
(8, 'section_three', NULL, NULL, NULL, NULL, 'Badi Battery', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/battery.png', 'Badi Battery', '12.4kWh', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL),
(9, 'section_three', NULL, NULL, NULL, NULL, 'Badi Range', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/Tracking.png', 'badi range', '151KMs', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL),
(10, 'section_three', NULL, NULL, NULL, NULL, 'Fast Charge', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/fast-charge.png', 'Fast Charge', '50 KM in 15 Minutes', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL),
(12, 'section_four', 'Segment First Features', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/auto-perfornmance.jpg', 'Segment First Features', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 1),
(13, 'section_four', NULL, NULL, NULL, NULL, 'Projector Headlamps', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/project-lamp.png', 'Projector Headlamps', 'For better visibility', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL),
(14, 'section_four', NULL, NULL, NULL, NULL, 'Disc Brakes', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/disc.png', 'Disc Brakes', '200mm Disc Brakes for great stopping power', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL),
(16, 'section_five', 'ArcReactor100', 'Segment-first Liquid cooled battery pack for efficient thermal management', 'Battery-temperature.mp4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 1),
(17, 'section_six', 'Safety', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/Ground clearance-img.jpg', 'Safety', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 1),
(18, 'section_six', NULL, NULL, NULL, NULL, 'No Toppling', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/blue-icon-1.png', 'No Toppling', 'Its low center of gravity enhances stability in heavy load conditions', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL),
(19, 'section_six', NULL, NULL, NULL, NULL, 'Battery Temperature', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/blue-icon-2.png', 'Battery Temperature', 'Control for optimised performance and maximum safety', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL),
(21, 'section_seven', 'Vehicle Charging', NULL, '372589charging.mp4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 1),
(22, 'section_seven', NULL, NULL, NULL, NULL, 'Onboard Charger', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/plug.png', 'Onboard Charger', 'Charge with a 3 pin socket. 0 to 80% charge in 3hrs', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL),
(23, 'section_seven', NULL, NULL, NULL, NULL, 'Extensive Charging Network', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/charge-station.png', 'Extensive Charging Network', '200+ charging points in Delhi/NCR', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL),
(24, 'section_seven', NULL, NULL, NULL, NULL, 'Fast Charging', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/fast-charge.png', 'Fast Charging', 'Get 50km charge in 15 minutes', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL),
(26, 'section_eight', 'Telematics', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/phone.jpg', 'Telematics', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 1),
(27, 'section_eight', NULL, NULL, NULL, NULL, 'GPS Tracking', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/Tracking-new.png', 'GPS Tracking', 'Track your fleet', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL),
(28, 'section_eight', NULL, NULL, NULL, NULL, 'Geo Fencing', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/geo.png', 'Geo Fencing', 'Set up predefined areas to operate', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL),
(29, 'section_eight', NULL, NULL, NULL, NULL, 'Energy Efficiency', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/energy.png', 'Energy Efficiency', 'Monitor the consumption of energy & improve bottomline', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL),
(30, 'section_eight', NULL, NULL, NULL, NULL, 'Fleet Notification', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/fleet.png', 'Fleet Notification', 'Get notified if vehicle is operating beyond operation hours/being towed/ had breakdown', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL),
(32, 'section_nine', 'Variants & pricing', '<p>Euler HiLoad EV starts from ₹ 3,49,999*</p><p>Easy Financing available from our financing partners.</p>', 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/pricing.jpg', 'Variants & pricing', '999', NULL, NULL, NULL, NULL, 'https://www.eulermotors.com/book-now.php', 'Book Now', NULL, NULL, '', NULL, NULL, 1),
(33, 'section_ten', 'Specifications', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'HiLoad DV', 'HiLoad PV', 1),
(36, 'section_ten', NULL, NULL, NULL, NULL, 'Performance', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL),
(37, 'section_ten', NULL, NULL, NULL, NULL, 'Battery Powerpack', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL),
(38, 'section_ten', NULL, NULL, NULL, NULL, 'Specification', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL),
(39, 'section_ten', NULL, NULL, NULL, NULL, 'Model', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL),
(40, 'section_ten', NULL, NULL, NULL, NULL, 'Motor', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL),
(41, 'section_ten', NULL, NULL, NULL, NULL, 'Brake systems', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL),
(42, 'section_ten', NULL, NULL, NULL, NULL, 'Suspension systems', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL),
(43, 'section_ten', NULL, NULL, NULL, NULL, 'Features', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL),
(45, 'hero', NULL, NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/hiload-banner-1.webp', 'bada socho euler hiload socho', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 1),
(46, 'hero', NULL, NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/hiload-banner-2.webp', 'bada socho euler hiload socho', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 1),
(47, 'hero', NULL, NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/hiload-banner-3.webp', 'bada socho euler hiload socho', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 1),
(49, 'section_three', NULL, NULL, NULL, NULL, 'Bada Torque', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/strong-new.png', 'Stop Quicker', '88.55Nm', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL),
(50, 'section_four', NULL, NULL, NULL, NULL, 'More Tyre Width', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/tool.png', 'Battery Temperature', '30% more tyre width for Badi grip', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL),
(51, 'section_six', NULL, NULL, NULL, NULL, 'Safe Cabin', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/blue-icon-3.png', 'Safe Cabin', 'Large cabin size with sheet metal construction to maximise driver safety', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL),
(52, 'section_seven', NULL, NULL, NULL, NULL, 'Charge On Wheels', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/onboard.png', 'Pull Stronger', 'Charge on the move with our mobile charging units', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL),
(53, 'section_eight', NULL, NULL, NULL, NULL, 'Driver Monitoring', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/driving.png', 'Safe Cabin', 'Keep a check on reckless driving/severe acceleration/unnecessary idling', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hiload_spec_items`
--

CREATE TABLE `hiload_spec_items` (
  `id` int(11) NOT NULL,
  `hiload_id` int(11) NOT NULL,
  `col1` varchar(200) DEFAULT NULL,
  `col2` varchar(200) DEFAULT NULL,
  `col3` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hiload_spec_items`
--

INSERT INTO `hiload_spec_items` (`id`, `hiload_id`, `col1`, `col2`, `col3`) VALUES
(2, 36, 'Certified Payload', '688 Kg', '655 Kg'),
(3, 36, 'Certified Range', '151 Km', '129 Km'),
(4, 36, 'True Range*', '110 ± 10 Km', '110 ± 10 Km'),
(5, 36, 'Maximum Speed', '42 Km/hr', ''),
(6, 36, 'Charging Time', 'AC charging : 3.5 - 4 hours', ''),
(7, 36, 'DC Fast Charging Feature', '50 km in 15 minutes', ''),
(8, 36, 'On-board Charger', 'Plug and play charging gun. No extra hassle or components.', ''),
(11, 37, 'Battery Type / Location', 'Lithium-ion battery / Chassis integration', ''),
(12, 37, 'Pack Voltage', '72 V', ''),
(13, 37, 'Capacity', '12.4 KWh', ''),
(14, 38, 'Type', 'L5N', ''),
(15, 38, 'Seating Capacity', 'D + Cargo', ''),
(16, 38, 'Steering System', 'Handle Bar', ''),
(17, 38, 'Cabin Type', 'Reinforced Sheet Metal', ''),
(18, 38, 'Ground Clearance', '300 mm', ''),
(19, 38, 'Track Width', '1270 mm', ''),
(20, 38, 'Wheelbase', '2200 mm', ''),
(21, 38, 'Turning Radius', '3.5 m', ''),
(22, 38, 'Gradeability', '21% / 9.45 degrees', ''),
(23, 38, 'Overall Length', '3400 mm', ''),
(24, 38, 'Overall Width', '1460 mm', ''),
(25, 39, 'Overall Height', '2100 mm', '1800 mm'),
(26, 39, 'Container Dimension (lxbxh) ft', '6 x 4.7 x 4.3', '6 x 4.7 x Open'),
(27, 39, 'Kerb Weight', '690 Kgs', '650 Kgs'),
(28, 39, 'Gross Vehicle Weight', '1413 Kgs', '1413 Kgs'),
(29, 40, 'Type', 'Three phase induction motor', ''),
(30, 40, 'Power (peak)', '10.96 KW', '7.1 KW'),
(31, 40, 'Torque (peak)', '88.55 Nm', ''),
(32, 40, 'Transmission', 'Automatic', ''),
(34, 41, 'Type', 'Hydraulic', ''),
(35, 41, 'Front', 'Disc Brake', ''),
(36, 41, 'Rear', 'Drum Brake', ''),
(37, 41, 'Parking', 'Mechanical lever', ''),
(38, 42, 'Front', 'Hydraulic shock absorber with helical spring', ''),
(39, 42, 'Rear', 'Trailing arm with hydraulic shock absorber with helical spring', ''),
(40, 43, 'Battery Thermal Management System (Liquid Cooling)', '1', '1'),
(41, 43, 'Regenerative Braking', '1', '1'),
(42, 43, 'Vehicle Tracking System', '1', '1'),
(43, 43, 'Water and Dust Proof Battery (IP67)', '1', '1'),
(44, 43, 'Emission Free', '1', '1'),
(45, 43, 'Water Wading Height', '1 Foot', ''),
(46, 43, 'Head Lights', 'Projector head lamps', ''),
(47, 43, 'Tyres', 'Radial Tubeless: 5.5-12’', ''),
(49, 54, '', '', ''),
(50, 54, '', '', ''),
(51, 54, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `home_page`
--

CREATE TABLE `home_page` (
  `id` int(11) NOT NULL,
  `section_name` varchar(255) DEFAULT NULL,
  `main_title` varchar(255) DEFAULT NULL,
  `main_description` longtext DEFAULT NULL,
  `main_image` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `footer_title` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `btn_link` varchar(255) DEFAULT NULL,
  `btn_text` varchar(255) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home_page`
--

INSERT INTO `home_page` (`id`, `section_name`, `main_title`, `main_description`, `main_image`, `title`, `footer_title`, `logo`, `description`, `btn_link`, `btn_text`, `status`) VALUES
(1, 'cover', 'Moving today, for tomorrow2', '<p><i>We are an automotive tech startup manufacturing light electric commercial vehicles for intra-city transportation, hello world</i></p>', NULL, NULL, NULL, '44', NULL, NULL, NULL, 1),
(2, 'find_out_more', 'Electrifying India. One EV at a time.', '<p>We are an automotive technology startup devoted to spark the EV revolution in India. Through our smart mobility solutions we are enabling India’s transition to sustainable mobility.</p><p>With our sustainable logistics for E-Commerce &amp; 3PL businesses, we have already started to lay the groundwork for the future.</p>', NULL, NULL, NULL, NULL, NULL, 'https://www.eulermotors.com/about.php', NULL, 1),
(7, 'assets', 'Our Real Assets - Clients Who Trust Us', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(20, 'news', 'We Are Making Headlines! 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(27, 'accolades', 'Our Accolades', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(33, 'slider', 'Charge ahead with our EVs', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(34, 'network', 'Widespread Charging Network', '<p>Our extensive charging network ensures that you are never too far away from a charging station. OKHLA, GURGAON, PUNJABI BAGH, DWARKA, GHAZIPUR, MANDOLI, MOHAN NAGAR (GHAZIABAD), NOIDA SECTOR-63</p>', 'https://www.eulermotors.com/images/maps.png', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(35, 'meta', 'India’s most powerful electric commercial vehicle', 'Building Electric Commercial Vehicles for India. Euler HiLoad - The next big chapter in 3W electric mobility has been launched. Book Now- Only for Rs.999', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(41, 'slider', NULL, NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/why-ev-slider-thumb.jpg', 'Saves more per trip', 'Efficiency', 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/why-ev-slider-icon.png', '<p>3-wheeler EVs are more cost efficient than their 4-wheeler commercial ICE counterparts, giving you more value for your money with every delivery.</p>', NULL, NULL, 1),
(42, 'slider', NULL, NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/why-ev-slider-thumb2.jpg', 'Keeps you in the loop', 'Connectivity', 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/why-ev-slider-icon2.png', '<p>Our Evs help you monitor vehicle performance, enhance logistical efficiency and maximise profits, putting your business growth in the fast lane.</p>', NULL, NULL, 1),
(43, 'slider', NULL, NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/why-ev-slider-thumb3.jpg', 'Reaches everywhere', 'Accessibility', 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/why-ev-slider-icon3.png', 'The compact dimensions of our EVs help them reach the most crowded bylanes of India, ensuring no delivery is out of your reach.', NULL, NULL, 1),
(44, 'assets', NULL, NULL, NULL, NULL, NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/big-basket-logo.jpg', NULL, NULL, NULL, 1),
(45, 'assets', NULL, NULL, NULL, NULL, NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/udaan-logo.jpg', NULL, NULL, NULL, 1),
(46, 'assets', NULL, NULL, NULL, NULL, NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/ecom-express.jpg', NULL, NULL, NULL, 1),
(47, 'assets', NULL, NULL, NULL, NULL, NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/licious-logo.jpg', NULL, NULL, NULL, 1),
(48, 'assets', NULL, NULL, NULL, NULL, NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/supermart-logo.jpg', NULL, NULL, NULL, 1),
(49, 'assets', NULL, NULL, NULL, NULL, NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/grofers-logo.jpg', NULL, NULL, NULL, 1),
(50, 'news', NULL, NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/news-thumb1.jpg', 'Livemint', NULL, NULL, '<p>Euler Motors closes Series A at $9.5 million to expand in India. Additional investments of $2.6 million from new investor ADB Ventures.</p>', 'https://www.livemint.com/companies/news/euler-motors-closes-series-a-at-9-5-million-to-expand-in-india-11615972293917.html', 'Read More', 1),
(51, 'news', NULL, NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/news-thumb2.jpg', 'CNBC Young Turks', NULL, '', '<p>A discussion on India’s EV push, the focus on opportunities and challenges for the EV space in India and Euler Motor’s plans for 2021</p>', 'https://www.youtube.com/watch?v=xPxOMJhlxGk', 'See Now', 1),
(52, 'news', NULL, NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/news-thumb3.jpg', 'ET Now', NULL, '', '<p>Euler Motors current investors have chosen to continue to invest in Euler Motors because they believe in their vision and execution.</p>', 'https://www.timesnownews.com/videos/et-now/shows/how-did-euler-motors-raise-30cr-of-additional-financing-startupcentral/91206', 'Read More', 1),
(53, 'accolades', NULL, NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/awards-nasscom-thumb.jpg', 'Nasscom', NULL, NULL, '<p>#Emerge50 winners in Logistics Category for emerging as one of the top software product companies in India by NASSCOM.</p>', NULL, NULL, 1),
(57, 'accolades', NULL, NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/awards-business-world.jpg', 'Business World', NULL, NULL, 'Founder &amp; CEO Saurav Kumar awarded &#39;India&#39;s Most Enterprising Young Mind Award&#39; at the BW Businessworld Young Entrepreneur Summit &amp; Awards 2020', NULL, NULL, 1),
(58, 'accolades', NULL, NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/Awards-India-500-startup.jpg', 'India 500 Startup Awards 2020', NULL, NULL, 'Euler Motors recognized by India 500 Startup Awards 2020 for professing quality and excellent impact on society through service &amp; management', NULL, NULL, 1),
(59, 'accolades', NULL, NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/awards-entrepreneur-india.jpg', 'Entrepreneur India Award', NULL, NULL, 'Euler Motors awarded Best Social Impact Start-up of the year 2020', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `media_coverage_page`
--

CREATE TABLE `media_coverage_page` (
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
  `status` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `media_coverage_page`
--

INSERT INTO `media_coverage_page` (`id`, `section_name`, `main_title`, `main_description`, `main_image`, `main_image_alt`, `title`, `footer_title`, `logo`, `logo_alt`, `description`, `btn_link`, `btn_text`, `iframe`, `side`, `right_title`, `status`) VALUES
(1, 'meta', 'Media Coverage', 'Media Coverage', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1),
(2, 'hero', 'Media Coverage', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/careers-hero.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1),
(3, 'section_two', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://economictimes.indiatimes.com/industry/renewables/ev-maker-euler-motors-raises-10-million-in-series-b-round-of-funding/articleshow/87849947.cms', NULL, '', 1),
(5, 'section_two', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://m.economictimes.com/industry/renewables/euler-motors-bags-order-for-1000-ev-three-wheeler-cargo-vehicle-from-moeving/articleshow/88047952.cms', NULL, '', 1),
(6, 'section_two', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://www.businesstoday.in/auto/story/inferior-commercial-electric-vehicles-have-given-a-bad-taste-to-customers-euler-motors-311177-2021-11-02', NULL, '', 1),
(7, 'section_two', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://www.financialexpress.com/auto/electric-vehicles/euler-motors-launches-hiload-ev-indias-most-powerful-3w-cargo-with-six-segment-first-features/2357988', NULL, '', 1),
(8, 'section_two', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://www.livemint.com/companies/news/euler-motors-bags-order-from-e-commerce-companies-for-2-500-small-electric-cvs-11629719166960.html', NULL, '', 1),
(9, 'section_two', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://www.livemint.com/companies/news/euler-motors-closes-series-a-at-9-5-million-to-expand-in-india-11615972293917.html', NULL, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mobility_page`
--

CREATE TABLE `mobility_page` (
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
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mobility_page`
--

INSERT INTO `mobility_page` (`id`, `section_name`, `main_title`, `main_description`, `main_image`, `main_image_alt`, `title`, `footer_title`, `logo`, `logo_alt`, `description`, `btn_link`, `btn_text`, `iframe`, `side`, `right_title`, `status`) VALUES
(1, 'meta', 'Euler Mobility', '                                                        Euler Mobility                                                           ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1),
(2, 'hero', 'We help businesses transition to electric mobility with minimal commitment.', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/lease-hero.jpg', NULL, 'Euler Lease', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1),
(3, 'section_two', 'Why Euler Lease', NULL, NULL, NULL, 'Leasing allows you to drive an Euler vehicle with', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'When your lease is up, you can', 1),
(4, 'section_two', NULL, NULL, NULL, NULL, 'Minimal commitment', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/icon_setting.png', 'Minimal commitment', NULL, NULL, NULL, NULL, 'left', '', 1),
(5, 'section_two', NULL, NULL, NULL, NULL, 'Monthly plan starts at just ₹ 48,000/-', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/icon_money.png', 'Monthly plan starts at just ₹ 48,000/-', NULL, NULL, NULL, NULL, 'left', '', 1),
(6, 'section_two', NULL, NULL, NULL, NULL, 'End to end service that includes Vehicle | Staff | Charging Network | Service Infrastructure', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/icon_edit.png', 'End to end service that includes Vehicle | Staff | Charging Network | Service Infrastructure', NULL, NULL, NULL, NULL, 'left', '', 1),
(7, 'section_two', NULL, NULL, NULL, NULL, 'Switch vehicles', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/icon_switch.png', 'Switch vehicles', NULL, NULL, NULL, NULL, 'right', '', 1),
(8, 'section_two', NULL, NULL, NULL, NULL, 'Re-lease for another term', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/icon_lease.png', 'Re-lease for another term', NULL, NULL, NULL, NULL, 'right', '', 1),
(9, 'section_two', NULL, NULL, NULL, NULL, 'Purchase the vehicle at an agreed price', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/icon_purchase.png', 'Purchase the vehicle at an agreed price', NULL, NULL, NULL, NULL, 'right', '', 1),
(10, 'section_three', 'Modular platform that can adapt to every industry', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1),
(12, 'section_three', NULL, NULL, NULL, NULL, 'Ecommerce', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/icon_indust1.png', 'Ecommerce', NULL, NULL, NULL, NULL, NULL, '', 1),
(13, 'section_three', NULL, NULL, NULL, NULL, 'Pharma', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/icon_indust2.png', 'Pharma', NULL, NULL, NULL, NULL, NULL, '', 1),
(14, 'section_three', NULL, NULL, NULL, NULL, 'FMCG', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/icon_indust3.png', 'FMCG', NULL, NULL, NULL, NULL, NULL, '', 1),
(15, 'section_three', NULL, NULL, NULL, NULL, 'Utilities', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/icon_indust4.png', 'Utilities', NULL, NULL, NULL, NULL, NULL, '', 1),
(16, 'section_four', 'Customer Testimonials', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1),
(17, 'section_four', NULL, NULL, NULL, NULL, NULL, NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/big-basket-logo.jpg', 'big basket', '“The performance of their vehicles combined with their strong charging & service infrastructure have helped us in switching a large part of our fleet to electric power in Delhi NCR.” ', NULL, NULL, NULL, NULL, '', 1),
(18, 'section_four', NULL, NULL, NULL, NULL, NULL, NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/supermart-logo.jpg', 'supermart', '“With the current global conditions, we are constantly moving towards sustainability. Euler Motors has helped us take a step in the right direction with their fleet of commercial electric vehicles.”', NULL, NULL, NULL, NULL, '', 1),
(19, 'section_four', NULL, NULL, NULL, NULL, NULL, NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/udaan-logo.jpg', 'updaan', '“Euler Motors has made our last-mile logistics hassle-free with their cutting edge product and services. They have supported our vision for sustainable business with their technological prowess and innovative solutions.”', NULL, NULL, NULL, NULL, '', 1),
(20, 'section_five', 'Want to electrify your fleet?', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://www.eulermotors.com/contact.php', 'Talk To Us', NULL, NULL, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'pending',
  `booking_id` varchar(255) NOT NULL,
  `product_sku_id` varchar(255) NOT NULL,
  `transaction_id` mediumtext DEFAULT NULL,
  `invoice_no` varchar(255) DEFAULT NULL,
  `total_amount` float NOT NULL,
  `coupon_code` varchar(200) DEFAULT NULL,
  `coupon_amount` float DEFAULT NULL,
  `actual_amount` float NOT NULL,
  `state` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `pincode` varchar(12) NOT NULL,
  `showroom` varchar(100) NOT NULL,
  `finance` int(1) NOT NULL,
  `email` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `phone` bigint(12) NOT NULL,
  `transaction_detail` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `status`, `booking_id`, `product_sku_id`, `transaction_id`, `invoice_no`, `total_amount`, `coupon_code`, `coupon_amount`, `actual_amount`, `state`, `city`, `pincode`, `showroom`, `finance`, `email`, `firstname`, `lastname`, `phone`, `transaction_detail`, `created_at`, `updated_at`) VALUES
(2, 'pending', 'Bk1635237388', '8', NULL, NULL, 999, NULL, NULL, 999, 'Haryana', 'Gurgaon', '110044', 'Haryana', 1, 'anku.pathak@webeesocial.com', 'Anku', 'Pathak', 7982951312, NULL, '2021-10-26 08:36:29', '2021-10-26 03:36:29'),
(4, 'pending', 'Bk1635238080', '2', '20211026111212800110168018403107962', 'INV163523809234', 999, NULL, NULL, 999, 'Delhi', 'Delhi', '110044', 'Delhi', 1, 'anku.pathak@webeesocial.com', 'Dheeraj', 'Pathak', 7982951312, '{\"BANKNAME\":\"Kotak Bank\",\"BANKTXNID\":\"11330232992\",\"CHECKSUMHASH\":\"d/m1zXkdeu0coeGN474vKYDGNthpwv3J/7ebs96ZMRnDot//89k+3UEfYxiAANzeK5uhGpvc9RMjVIYeHBOByMFW/oyFZWbeR/wUnueHRDA=\",\"CURRENCY\":\"INR\",\"GATEWAYNAME\":\"NKMB\",\"MID\":\"EULERM32852334471090\",\"ORDERID\":\"Bk1635238080\",\"PAYMENTMODE\":\"NB\",\"RESPCODE\":\"01\",\"RESPMSG\":\"Txn Success\",\"STATUS\":\"TXN_SUCCESS\",\"TXNAMOUNT\":\"999.00\",\"TXNDATE\":\"2021-10-26 14:18:01.0\",\"TXNID\":\"20211026111212800110168018403107962\"}', '2021-12-27 08:48:00', '2021-10-26 03:48:12'),
(5, 'pending', 'BK1635242229', '2', '20211026111212800110168018403107962', 'INV163523809234', 999, NULL, NULL, 999, 'Delhi', 'Delhi', '110044', 'Delhi', 0, 'anku.pathak@webeesocial.com', 'Anku', 'Testing1231', 7876767656, '{\"BANKNAME\":\"Kotak Bank\",\"BANKTXNID\":\"11330232992\",\"CHECKSUMHASH\":\"d/m1zXkdeu0coeGN474vKYDGNthpwv3J/7ebs96ZMRnDot//89k+3UEfYxiAANzeK5uhGpvc9RMjVIYeHBOByMFW/oyFZWbeR/wUnueHRDA=\",\"CURRENCY\":\"INR\",\"GATEWAYNAME\":\"NKMB\",\"MID\":\"EULERM32852334471090\",\"ORDERID\":\"Bk1635238080\",\"PAYMENTMODE\":\"NB\",\"RESPCODE\":\"01\",\"RESPMSG\":\"Txn Success\",\"STATUS\":\"TXN_SUCCESS\",\"TXNAMOUNT\":\"999.00\",\"TXNDATE\":\"2021-10-26 14:18:01.0\",\"TXNID\":\"20211026111212800110168018403107962\"}', '2021-12-01 09:57:09', '2021-10-26 04:57:09'),
(6, 'pending', 'BK1635242237', '2', NULL, NULL, 999, NULL, NULL, 999, 'Delhi', 'Delhi', '110044', 'Delhi', 0, 'anku.pathak@webeesocial.com', 'Anku', 'Testing1231', 7876767656, NULL, '2021-10-26 09:57:18', '2021-10-26 04:57:17'),
(7, 'pending', 'BK1635242267', '2', NULL, NULL, 999, NULL, NULL, 999, 'Delhi', 'Delhi', '110044', 'Delhi', 0, 'anku.pathak@webeesocial.com', 'Anku', 'Testing1231', 7876767656, NULL, '2021-10-26 09:57:47', '2021-10-26 04:57:47'),
(8, 'pending', 'BK1635246082', '2', NULL, NULL, 999, NULL, NULL, 999, 'Delhi', 'Delhi', '110044', 'Delhi', 1, 'anku.pathak@webeesocial.com', 'Anku', 'Pathak', 918798787898, NULL, '2021-10-26 11:01:22', '2021-10-26 06:01:22'),
(9, 'pending', 'BK1635249970', '2', NULL, NULL, 999, NULL, NULL, 999, 'Delhi', 'Delhi', '110044', 'Delhi', 1, 'anku.pathak@webeesocial.com', 'Anku', 'Pathak', 918798787898, NULL, '2021-10-26 12:06:10', '2021-10-26 07:06:10'),
(10, 'pending', 'BK1640855820', '2', NULL, NULL, 999, NULL, NULL, 999, 'Haryana', 'Delhi', '452016', 'Delhi', 1, 'sipyhez@mailinator.com', 'Martena', 'Russo', 9753591245, NULL, '2021-12-30 09:17:00', '2021-12-30 10:17:00'),
(11, 'pending', 'BK1640855836', '2', NULL, NULL, 999, NULL, NULL, 999, 'Haryana', 'Delhi', '452016', 'Delhi', 1, 'sipyhez@mailinator.com', 'Martena', 'Russo', 9753591245, NULL, '2021-12-30 09:17:16', '2021-12-30 10:17:16'),
(12, 'pending', 'BK1643968157', '3', NULL, NULL, 999, NULL, NULL, 999, 'Delhi', 'Delhi', '452016', 'Delhi', 0, 'chetan.singh@webee.com', 'chetan', 'singh', 9753591245, NULL, '2022-02-04 09:49:17', '2022-02-04 10:49:17'),
(13, 'pending', 'BK1643968248', '2', NULL, NULL, 999, NULL, NULL, 999, 'Delhi', 'Delhi', '452016', 'Delhi', 0, 'chetan.singh@webeesocial.com', 'chetan', 'singh', 9753591245, NULL, '2022-02-04 09:50:48', '2022-02-04 10:50:48'),
(14, 'pending', 'BK1643968337', '2', NULL, NULL, 999, NULL, NULL, 999, 'Delhi', 'Delhi', '452016', 'Delhi', 0, 'chetan.singh@webeesocial.com', 'chetan', 'singh', 9753591245, NULL, '2022-02-04 09:52:17', '2022-02-04 10:52:17'),
(15, 'pending', 'BK1643968403', '2', NULL, NULL, 999, NULL, NULL, 999, 'Delhi', 'Delhi', '452016', 'Delhi', 0, 'chetan.singh@webeesocial.com', 'chetan', 'singh', 9753591245, NULL, '2022-02-04 09:53:23', '2022-02-04 10:53:23'),
(16, 'pending', 'BK1643968412', '2', NULL, NULL, 999, NULL, NULL, 999, 'Delhi', 'Delhi', '452016', 'Delhi', 0, 'chetan.singh@webeesocial.com', 'chetan', 'singh', 9753591245, NULL, '2022-02-04 09:53:32', '2022-02-04 10:53:32'),
(17, 'pending', 'BK1643968535', '2', NULL, NULL, 999, NULL, NULL, 999, 'Delhi', 'Delhi', '452016', 'Delhi', 0, 'chetan.singh@webee.com', 'chetan', 'singh', 9753591245, NULL, '2022-02-04 09:55:35', '2022-02-04 10:55:35'),
(18, 'pending', 'BK1643968774', '2', NULL, NULL, 999, NULL, NULL, 999, 'Delhi', 'Delhi', '452016', 'Delhi', 0, 'chetan.singh@webee.com', 'chetan', 'singh', 9753591245, NULL, '2022-02-04 09:59:34', '2022-02-04 10:59:34'),
(19, 'pending', 'BK1643968787', '2', NULL, NULL, 999, NULL, NULL, 999, 'Delhi', 'Delhi', '452016', 'Delhi', 0, 'chetan.singh@webee.com', 'chetan', 'singh', 9753591245, NULL, '2022-02-04 09:59:47', '2022-02-04 10:59:47'),
(20, 'pending', 'BK1643969904', '2', NULL, NULL, 999, NULL, NULL, 999, 'Delhi', 'Delhi', '452016', 'Delhi', 0, 'chetan.singh@webee.com', 'chetan', 'singh', 9753591245, NULL, '2022-02-04 10:18:24', '2022-02-04 11:18:24'),
(21, 'pending', 'BK1643969918', '2', NULL, NULL, 999, NULL, NULL, 999, 'Delhi', 'Delhi', '452016', 'Delhi', 0, 'chetan.singh@webee.com', 'chetan', 'singh', 9753591245, NULL, '2022-02-04 10:18:38', '2022-02-04 11:18:38'),
(22, 'pending', 'BK1643970582', '2', NULL, NULL, 999, NULL, NULL, 999, 'Delhi', 'Delhi', '452016', 'Delhi', 0, 'chetan.singh@webee.com', 'chetan', 'singh', 9753591245, NULL, '2022-02-04 10:29:42', '2022-02-04 11:29:42'),
(23, 'pending', 'BK1644221382', '2', NULL, NULL, 999, NULL, NULL, 999, 'Delhi', 'Delhi', '452016', 'Delhi', 1, 'chetan.singh@webee.com', 'chetan', 'singh', 9753591245, NULL, '2022-02-07 08:09:42', '2022-02-07 09:09:42');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `page_name` varchar(255) NOT NULL,
  `section_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page_name`, `section_name`) VALUES
(1, 'home', 'cover_section');

-- --------------------------------------------------------

--
-- Table structure for table `privacy_policy_page`
--

CREATE TABLE `privacy_policy_page` (
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
-- Dumping data for table `privacy_policy_page`
--

INSERT INTO `privacy_policy_page` (`id`, `section_name`, `main_title`, `main_description`, `main_image`, `main_image_alt`, `title`, `footer_title`, `logo`, `logo_alt`, `description`, `btn_link`, `btn_text`, `iframe`, `side`, `right_title`, `status`) VALUES
(1, 'meta', 'Privacy Policy', 'Privacy Policy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(2, 'hero', 'Privacy Policy', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/contact-hero.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1),
(3, 'section_two', NULL, '<p>This privacy policy sets out how <strong>Euler Motors Private Limited</strong> protects any information that you give us when you use this website. <strong>Euler Motors Private Limited</strong> is committed to ensuring that your privacy is protected. Should we ask you to provide certain information by which you can be identified when using this website, and then you can be assured that it will only be used in accordance with this privacy statement. <strong>Euler Motors Private Limited</strong> may change this policy from time to time by updating this page. You should check this page from time to time to ensure that you are happy with any changes. This policy is effective from <strong>October 22, 2021.</strong></p><h3><strong>We may collect the following information:</strong></h3><ul><li>name and job title</li><li>contact information including email address, phone number</li><li>demographic information such as postcode, preferences, and interests</li><li>other information relevant to customer surveys and/or offers</li></ul><h3><strong>We require this information to understand your needs and provide you with a better service, and in particular for the following reasons:</strong></h3><ul><li>Internal record keeping.</li><li>We may use the information to improve our products and services.</li><li>We may periodically send promotional emails/SMS about new products, special offers or other information which we think you may find interesting using the email address which you have provided.</li><li>From time to time, we may also use your information to contact you for market research purposes. We may contact you by email, phone or mail. We may use the information to customize the website according to your interests.</li></ul><p>We are committed to ensuring that your information is secure. In order to prevent unauthorized access or disclosure, we have put in place suitable physical, electronic and managerial procedures to safeguard and secure the information we collect online.We use traffic log cookies to identify which pages are being used. This helps us analyze data about webpage traffic and improve our website in order to tailor it to customer needs. We only use this information for statistical analysis purposes and then the data is removed from the system.We use cookies from third-party partners such as Google Analytics for marketing and analytical purposes. Google Analytics helps us understand how our customers use the site.Overall, cookies help us provide you with a better website, by enabling us to monitor which pages you find useful and which you do not. A cookie in no way gives us access to your computer or any information about you, other than the data you choose to share with us.You can choose to accept or decline cookies. Most web browsers automatically accept cookies, but you can usually modify your browser setting to decline cookies if you prefer. This may prevent you from taking full advantage of the website.</p><h3><strong>Links to other websites</strong></h3><p>Our website may contain links to other websites of interest. However, once you have used these links to leave our site, you should note that we do not have any control over that other website. Therefore, we cannot be responsible for the protection and privacy of any information which you provide whilst visiting such sites and such sites are not governed by this privacy statement. You should exercise caution and look at the privacy statement applicable to the website in question.</p><h3><strong>Controlling your personal information</strong></h3><p>We will not sell, distribute or lease your personal information to third parties unless we have your permission or are required by law to do so. If you believe that any information we are holding on you is incorrect or incomplete, please write to or email us as soon as possible, at the E-mail address <a href=\"email:customercare@eulermotors.com\">customercare@eulermotors.com</a> . We will promptly correct any information found to be incorrect.</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category_id` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` mediumtext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category_id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, '1', 'HiLoad XR13', '', '2021-10-11 09:50:35', '2021-10-11 11:49:00'),
(2, '1', 'HiLoad XR13', NULL, '2021-10-18 04:35:44', '2021-10-18 10:04:34');

-- --------------------------------------------------------

--
-- Table structure for table `product_attribute`
--

CREATE TABLE `product_attribute` (
  `id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL,
  `attribute_id` varchar(255) DEFAULT 'false',
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_attribute`
--

INSERT INTO `product_attribute` (`id`, `product_id`, `type`, `attribute_id`, `name`, `created_at`, `updated_at`) VALUES
(1, '1', 'attribute', 'false', 'Parameters', '2021-10-11 09:55:06', '2021-10-11 11:49:00'),
(2, '1', 'attribute', 'false', 'Description', '2021-10-11 09:55:06', '2021-10-11 11:49:00'),
(3, '1', 'attribute', 'false', 'Motor', '2021-10-11 09:55:06', '2021-10-11 11:49:00'),
(4, '1', 'attribute', 'false', 'Brake systems', '2021-10-11 09:55:06', '2021-10-11 11:49:00'),
(5, '1', 'attribute', 'false', 'Suspension systems', '2021-10-11 09:55:06', '2021-10-11 11:49:00'),
(6, '1', 'attribute', 'false', 'Features', '2021-10-11 09:55:06', '2021-10-11 11:49:00'),
(7, '1', 'attribute', '1', 'Payload', '2021-10-11 09:57:57', '2021-10-11 11:49:00'),
(8, '1', 'attribute', '1', 'Charging Time', '2021-10-11 09:57:57', '2021-10-11 11:49:00'),
(9, '1', 'attribute', '1', 'Battery Type / Location', '2021-10-11 09:57:57', '2021-10-11 11:49:00'),
(10, '1', 'attribute', '1', 'Pack Voltage', '2021-10-11 09:57:57', '2021-10-11 11:49:00'),
(11, '1', 'attribute', '1', 'Thermal Management System (Liquid Cooling)', '2021-10-11 09:57:57', '2021-10-11 11:49:00'),
(12, '1', 'attribute', '1', 'Water and Dust Proof Battery (IP67)', '2021-10-11 09:57:57', '2021-10-11 11:49:00'),
(13, '1', 'attribute', '1', 'Emission Free', '2021-10-11 09:57:57', '2021-10-11 11:49:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews_page`
--

CREATE TABLE `product_reviews_page` (
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
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_reviews_page`
--

INSERT INTO `product_reviews_page` (`id`, `section_name`, `main_title`, `main_description`, `main_image`, `main_image_alt`, `title`, `footer_title`, `logo`, `logo_alt`, `description`, `btn_link`, `btn_text`, `iframe`, `side`, `right_title`, `status`) VALUES
(1, 'meta', 'Product Reviews', 'Product Reviews', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1),
(2, 'hero', 'Product Reviews', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/careers-hero.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1),
(3, 'section_two', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://www.youtube.com/embed/Isqw7lWC78I', NULL, '', 1),
(4, 'section_two', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://www.youtube.com/embed/XJXQ99k9XYE', NULL, '', 1),
(5, 'section_two', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://www.youtube.com/embed/kWciBkIYPnk', NULL, '', 1),
(6, 'section_two', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://www.youtube.com/embed/QxyelpHcoiA', NULL, '', 1),
(7, 'section_two', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://www.youtube.com/embed/HGh4rzRApgY', NULL, '', 1),
(8, 'section_two', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://www.youtube.com/embed/NP0pLY-A_GM', NULL, '', 1),
(9, 'section_two', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://www.youtube.com/embed/8SplubGHT5w', NULL, '', 1),
(10, 'section_two', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://www.youtube.com/embed/LAO1Lhctb7I', NULL, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_sku`
--

CREATE TABLE `product_sku` (
  `id` int(11) NOT NULL,
  `reference_id` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sku_name` varchar(200) NOT NULL,
  `list_price` float NOT NULL,
  `selling_price` float NOT NULL,
  `image` longtext DEFAULT NULL,
  `image_url` longtext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_sku`
--

INSERT INTO `product_sku` (`id`, `reference_id`, `product_id`, `name`, `sku_name`, `list_price`, `selling_price`, `image`, `image_url`, `created_at`, `updated_at`) VALUES
(1, 'SKUHI01', '1', 'HiLoad Full Load Body ', 'DVXR13', 150000, 100000, NULL, 'images/Full-Load-Body.jpg', '2021-10-11 10:01:02', '2021-10-11 12:00:20'),
(2, 'SKUHI02', '1', 'HiLoad Half Load Body ', 'PVXR13', 100000, 90000, NULL, 'images/Half-Load-Body.jpg', '2021-10-18 04:28:30', '2021-10-18 09:56:07'),
(3, 'SKUHI03', '1', 'HiLoad Full Open Load Body ', 'HDXR13', 100000, 95000, NULL, 'images/Full-Load-Body.jpg', '2021-10-18 04:31:02', '2021-10-18 09:56:07'),
(4, 'SKUHI04', '1', 'HiLoad Flat Bed ', 'FBXR13', 200000, 120000, NULL, 'images/Flat-Bed-Body.jpg', '2021-10-18 04:31:02', '2021-10-18 09:56:07'),
(5, 'SKUHI05', '2', 'HiLoad Full Load Body ', 'DVXR14', 100000, 95000, NULL, 'images/Full-Load-Body.jpg', '2021-10-18 04:34:55', '2021-10-18 09:56:07'),
(6, 'SKUHI06', '2', 'HiLoad Half Load Body ', 'PVXR14', 100000, 95000, NULL, 'images/Half-Load-Body.jpg', '2021-10-18 04:34:55', '2021-10-18 09:56:07'),
(7, 'SKUHI07', '2', 'HiLoad Full Open Load Body ', 'HDXR14', 100000, 95000, NULL, 'images/Full-Load-Body.jpg', '2021-10-18 04:34:55', '2021-10-18 09:56:07'),
(8, 'SKUHI08', '2', 'HiLoad Flat Bed ', 'FBXR14', 100000, 95000, NULL, 'images/Flat-Bed-Body.jpg', '2021-10-18 04:34:55', '2021-10-18 09:56:07');

-- --------------------------------------------------------

--
-- Table structure for table `refund_policy_page`
--

CREATE TABLE `refund_policy_page` (
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
-- Dumping data for table `refund_policy_page`
--

INSERT INTO `refund_policy_page` (`id`, `section_name`, `main_title`, `main_description`, `main_image`, `main_image_alt`, `title`, `footer_title`, `logo`, `logo_alt`, `description`, `btn_link`, `btn_text`, `iframe`, `side`, `right_title`, `status`) VALUES
(1, 'meta', 'Refund Policy', 'Refund Policy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1),
(2, 'hero', 'Refund Policy', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/contact-hero.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1),
(3, 'section_two', NULL, '<ul><li>Upon payment of the Booking Amount, you may request for cancellation of booking of the Vehicle for any reason within [30] days from receiving the payment confirmation by us. If the cancellation request is approved by Euler Motors, the entire Booking Amount will be refunded to you within 60 days from the date of cancellation. The money will be refunded to the same source from which you had made the payment of the Booking Amount. Euler Motors does not process payments directly and refunds can take up to 1 month or more to reflect in your bank account depending upon the payment provider.</li><li>You will only be eligible for cancellation of the booking and refund of the Booking Amount before the payment of Sale Price of the selected Vehicle is made by you.</li><li>Please note that once the full payment of the Sale Price of the Vehicle has been made, the sale shall be deemed as complete, and cancellation or claim for any refund amount will not be possible.</li><li>All cancellation requests must be made through the option available on the Platform or by an email sent by the Users on <a href=\"email:customercare@eulermotors.com\">customercare@eulermotors.com</a>.</li></ul>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `technology_page`
--

CREATE TABLE `technology_page` (
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
  `is_video` int(11) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `technology_page`
--

INSERT INTO `technology_page` (`id`, `section_name`, `main_title`, `main_description`, `main_image`, `main_image_alt`, `title`, `footer_title`, `logo`, `logo_alt`, `description`, `btn_link`, `btn_text`, `iframe`, `is_video`, `status`) VALUES
(1, 'meta', 'Euler Technology', 'Technology that helps you think big!', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1),
(2, 'hero', 'Euler Technology', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/tech-banner.jpg', NULL, 'Technology that helps you think big!', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1),
(3, 'section_two', 'Vehicle Management', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/Tech_01-vehicle.png', 'Vehicle Management', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1),
(5, 'section_two', NULL, NULL, NULL, NULL, 'Be empowered by real time trip details and vehicle status', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/empowered.png', 'Be empowered by real time trip details and vehicle status', NULL, NULL, NULL, NULL, 0, 1),
(6, 'section_two', NULL, NULL, NULL, NULL, 'Get right alerts at right time', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/right-time.png', 'Get right alerts at right time', NULL, NULL, NULL, NULL, 0, 1),
(7, 'section_two', NULL, NULL, NULL, NULL, 'Optimise route and charging to minimise trip delays', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/optm.png', 'optm', NULL, NULL, NULL, NULL, 0, 1),
(8, 'section_two', NULL, NULL, NULL, NULL, 'Find charging stations closest to you or plan for later in your route', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/charging-station-icon.png', 'charging station', NULL, NULL, NULL, NULL, 0, 1),
(9, 'section_three', 'Electron Card', 'Personalized user card for all things Euler.', 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/Electron-Card.png', 'Electron Card', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1),
(10, 'section_three', NULL, NULL, NULL, NULL, 'Custom user ID for every vehicle', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/Electron-icon.png', 'Custom user ID for every vehicle', NULL, NULL, NULL, NULL, 0, 1),
(11, 'section_three', NULL, NULL, NULL, NULL, 'Charge at all Euler high performance charging stations (Free for the first 3/6 months of ownership)', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/Electron-icon.png', 'eletronic icon', NULL, NULL, NULL, NULL, 0, 1),
(12, 'section_three', NULL, NULL, NULL, NULL, 'Doubles up as an easy swipe identification and payment card', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/Electron-icon.png', 'eletronic icon', NULL, NULL, NULL, NULL, 0, 1),
(13, 'section_four', 'Battery TECH', 'Don’t let weather and road conditions come in the way of your success.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1),
(14, 'section_four', NULL, NULL, NULL, NULL, 'Indegenous Battery Pack', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/tech-slider-1.jpg', NULL, 'IP 67 certified batteries made for and tested in India.', NULL, NULL, NULL, 0, 1),
(15, 'section_four', NULL, NULL, NULL, NULL, 'Battery Management System', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/Tech_03.png', NULL, 'Monitor and manage critical battery data to optimise performance and lifespan.', NULL, NULL, NULL, 0, 1),
(16, 'section_four', NULL, NULL, NULL, NULL, 'Regenerative Braking', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/Tech_05.mp4', NULL, 'Regenerative braking technology increases vehicle efficiency and consequently leads to range enhancement.', NULL, NULL, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `telematics_page`
--

CREATE TABLE `telematics_page` (
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
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `telematics_page`
--

INSERT INTO `telematics_page` (`id`, `section_name`, `main_title`, `main_description`, `main_image`, `main_image_alt`, `title`, `footer_title`, `logo`, `logo_alt`, `description`, `btn_link`, `btn_text`, `iframe`, `side`, `right_title`, `status`) VALUES
(1, 'meta', 'telematics', 'telematics', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1),
(2, 'hero', 'Euler Shepherd', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/telematics-bg.jpg', NULL, 'Fleet control at your fingertips', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1),
(3, 'section_two', 'Electrify your fleet while reducing your cost of fleet operations', 'Euler Shepherd is a mobile application and web platform that gives you real-time updates about your fleet operations.', NULL, NULL, 'Our Offerings', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1),
(10, 'section_four', 'Driver Notifications', '<p>The Driver Monitor Console helps you keep a check on reckless driving and other activities. It keeps track of speeding, seat belt usage, severe acceleration and unnecessary idling.</p><p><strong>So you can take necessary steps to ensure their safety.</strong></p>', 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/driver_not_img.jpeg', 'driver notification', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1),
(11, 'section_two', NULL, NULL, NULL, NULL, 'Real time GPS tracking', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/our-ofr-icon-1.png', 'Real time GPS tracking', NULL, NULL, NULL, NULL, 'left', '', 1),
(12, 'section_two', NULL, NULL, NULL, NULL, 'Learning analytics', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/our-ofr-icon-2.png', 'Learning analytics', NULL, NULL, NULL, NULL, 'left', '', 1),
(13, 'section_two', NULL, NULL, NULL, NULL, 'Trips and Events', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/our-ofr-icon-4.png', 'Trips and Events', NULL, NULL, NULL, NULL, 'left', '', 1),
(14, 'section_two', NULL, NULL, NULL, NULL, 'Geo fencing', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/our-ofr-icon-5.png', 'Geo fencing', NULL, NULL, NULL, NULL, 'right', '', 1),
(15, 'section_two', NULL, NULL, NULL, NULL, 'Battery temperature', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/our-ofr-icon-6.png', 'Battery temperature', NULL, NULL, NULL, NULL, 'right', '', 1),
(16, 'section_two', NULL, NULL, NULL, NULL, 'Range left', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/our-ofr-icon-3.png', 'Range left', NULL, NULL, NULL, NULL, 'right', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `term_and_condition_page`
--

CREATE TABLE `term_and_condition_page` (
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
-- Dumping data for table `term_and_condition_page`
--

INSERT INTO `term_and_condition_page` (`id`, `section_name`, `main_title`, `main_description`, `main_image`, `main_image_alt`, `title`, `footer_title`, `logo`, `logo_alt`, `description`, `btn_link`, `btn_text`, `iframe`, `side`, `right_title`, `status`) VALUES
(1, 'hero', 'Terms & Conditions', NULL, 'https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/contact-hero.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1),
(2, 'meta', 'Terms & Conditions', 'Terms &amp; Conditions', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1),
(3, 'section_two', NULL, '<p>These Terms and Conditions (<strong>“Terms”</strong>) of online bookingare executed between the User (as defined hereinafter) and Euler Motors Private Limited,a company having its registered office address at B-99, PanchsheelVihar, New Delhi 110017 (hereinafter referred to as <strong>“Euler Motors”, “we”</strong> or <strong>“us”</strong> or <strong>“our”</strong>) and its affiliates and subsidiaries andapplies to the booking of Vehicles (as defined hereinafter) listed on the ‘Book Online’ section.</p><p>For the purpose of these Terms, wherever the context so requires, the words <strong>“you”</strong> or <strong>“your”</strong> or <strong>“User”</strong> used herein, refer to all individuals and/or entities browsing, accessing or using the Platform (as defined hereinafter)to place the booking of any Vehicle or for any other reason.</p><p>These Terms constitute a binding agreement between you and Euler Motors and its affiliates and subsidiaries. By accessing or using our Platform and/or bookingVehicles through the Platform, you understand and agree to be boundbytheseTerms. The Terms, Privacy Policy, Purchase Terms (as defined hereinafter)shall be collectively referred to as <strong>“Euler Motors Policies”</strong>, including any modifications or amendments made thereto by Euler Motors from time to time, at its sole discretion. If you do not agree to these Euler Motor Policies,you are notauthorized to access our Platform and/or book Vehicles on the Platform.</p><p>By accepting these Terms,you represent that you have the capacity to enter into or, if you are acting on behalf of an entity, that you have the authority to bind such entity to a legally binding contract, and you agree that these Terms legally bind you or the entity on behalf of which you purport to act, in the same manner as a signed, written, papercontract. These Terms constitute an electronic record within the meaning of the Applicable Law (as defined hereinafter). This electronic record is generated by a computer system and does not require any physical or digital signatures. Accessing, browsing and/or using the Platform or using any of the information provided therein shall be deemed to signify the User’s unequivocal acceptance of these Terms. The User expressly acknowledges and agrees to be bound by the Terms, regardless of however the User or anyone on the User’s behalf has accessed, installed, downloaded, or used the Platform andwhether or not the User has registered on the Platform.</p><p><strong>BY ACCESSING OR USING THE PLATFORM, YOU: (A) ACKNOWLEDGE THAT YOU HAVE READ AND UNDERSTOOD THESE TERMS; (B) REPRESENT THAT YOU ARE 18 YEARS OF AGE, OR THE REQUIRED LEGAL AGE IN YOUR JURISDICTION; AND (C) ACCEPT THESE TERMS AND AGREE THAT YOU ARE LEGALLY BOUND BY THEM.</strong></p><h3><strong>DEFINITIONS</strong></h3><p><strong>“Applicable Laws”</strong> shall mean any and all: (i) laws, statutes, constitutions, treaties, rules, regulations, ordinances, codes, guidance, and common law; and (ii) all judicial, executive, legislative, administrative or military orders, directives, decrees, injunctions, judgments, permits, agreements, and other legal requirements, in each case, of, with, or adopted or imposed by any Governmental Authority (as defined hereinafter), now or hereafter in effect and, in each case, as amended from time to time.</p><p><strong>“Bank Account”</strong> shall mean the bank account details of Euler Motors displayed on the Platform for making payment of the Booking Amount (as defined hereinafter).</p><p><strong>“Confidential Information”</strong> shall have the meaning ascribed to it in Clause 15 of these Terms.</p><p><strong>“Content”</strong> shall mean&nbsp;all information that is created, uploaded, posted and stored on the Platform by Euler Motors such as text, photos, audio, video, or other materials and information, including the details of the Vehicles and&nbsp;includes&nbsp;any other information&nbsp;made available by Euler Motors on or through the Platform including proprietary content and any content licensed or authorized for use by or through Euler Motors from a Third Party (as defined hereinafter).</p><p><strong>“Data Protection Law”</strong> shall mean any data protection, data security or privacy law, including, without limitation, the Information Technology Act, 2000, the EU General Data Protection Regulation 2016/679 (the \"GDPR\"), and any laws governing Personal Data (as defined hereinafter), Sensitive Personal Data (as defined hereinafter) or information outbound telephone calls, transmission of electronic mail, transmission of facsimile messages and any other communication-related data protection, data security or privacy laws.</p><p><strong>“Governmental Authority”</strong> shall mean any government authority, statutory authority, regulatory authority, government department, agency, commission, board, tribunal or court or other law, rule or regulation making entity/ authority having or purporting to have jurisdiction on behalf of the Republic of India or any state or other subdivision thereof or any municipality, district or other subdivision thereof.</p><p><strong>“Intellectual Property Rights”</strong> or <strong>“IP Rights”</strong> include: (i) all rights, title, and interest under any statute or under Applicable Law including patent rights; copyrights including moral rights; and any similar rights in respect of the Intellectual Property, anywhere in the world, whether negotiable or not; (ii) any licenses, permissions and grants in connection therewith; (iii) applications for any of the foregoing and the right to apply for them in any part of the world; (iv) right to obtain and hold appropriate registrations in Intellectual Property anywhere in the world; (v) all extensions and renewals thereof; and (vi) causes of action in the past, present or future, related thereto including the rights to damages and profits, due or accrued, arising out of past, present or future infringements or violations thereof and the right to sue for and recover the same.</p><p><strong>“Intellectual Property”</strong> or <strong>“IP”</strong> includes ideas, concepts, creations, discoveries, inventions, improvements, know how, trade or business secrets; trademarks, service marks, designs, utility models, tools, devices, models, methods, procedures, processes, systems, principles, synthesis protocol, algorithms, works of authorship, flowcharts, drawings, books, papers, models, sketches, formulas, proprietary techniques, research projects, copyright, designs, and other confidential and proprietary information, databases, data, documents, instruction manuals, records, memoranda, notes, user guides, in either printed or machine-readable form, whether or not copyrightable or patentable or protectable under any other intellectual property law, or any written or verbal instructions or comments.</p><p><strong>“Loss”</strong> shall mean all direct losses, damages, liabilities, costs (including legal fees), expenses, charges, interest, penalty, claims, arbitration, proceedings, suits and all sums paid in relation to any compromise or settlement of any claim, arbitration, suit or proceeding.</p><p><strong>“Misuse”</strong> or <strong>“Abuse”</strong> shall mean any act of the User that is inconsistent with the spirit of these Terms even if it is something that is not expressly or impliedly forbidden by the letter of these Terms.</p><p><strong>“Parties”</strong> refer to both you and Euler Motors jointly.</p><p><strong>“Party”</strong> refers individually to each of you and Euler Motors.</p><p><strong>“Personal Data”</strong> shall mean any personally identifiable information relating to an identified or identifiable individual, including data that identifies an individual or that could be used to identify, locate, track, or contact an individual. Personal Data includes both directly identifiable information, such as a name, identification number or unique job title, and indirectly identifiable information such as date of birth, unique mobile or wearable device identifier, information that could be used to identify a household, telephone number, key-coded data or online identifiers, such as IP addresses, and includes any data that constitutes \"personal data\" under the GDPR or similar terms under other Data Protection Law. For the avoidance of doubt, Personal Data includes (without limitation) Personal Identification Information.</p><p><strong>“Personal Identification Information”</strong> shall mean your name, address, identification number, phone number, and includes any other information by which you may be personally identified.</p><p><strong>“Platform”</strong> means our website accessible at www.eulermotors.com (and any related pages) and/or the or such website or mobile application powered by Euler Motors and made available to Users by us. It does not include any website or mobile application owned or operated by a Third-Party that may be accessed from any page on websites or mobile applications powered by Euler Motors.</p><p><strong>“Sensitive Personal Data or Information”</strong> with respect to a person means such personal information which consists of information relating to:</p><ol><li>any detail relating to the above clauses as provided to body corporate for providing service; and</li><li>any of the information received under above clauses by body corporate for processing, stored or processed under lawful contract or otherwise.</li><li>biometric information;</li><li>financial information such as bank account or credit card or debit card or other payment instrument details;</li><li>medical records and history;</li><li>password;</li><li>physical, physiological and mental health condition; and</li><li>sexual orientation.</li></ol><p>&nbsp;</p><p><strong>“User Content”</strong> shall mean any content such as text, photos, audio, video, or other materials and information, created, uploaded, posted, sent, received, and stored on or through the Platform by the User.</p><p><strong>“Third Party”</strong> shall mean a party which is not a signatory to these Terms.</p><p><strong>“Vehicle”</strong> shall mean the 3-wheeler light electric commercial vehicles owned by Euler Motors and listed on the Platform for the purpose of booking by the Users.</p><p>&nbsp;</p><ol><li><strong>ELIGIBILITY</strong></li></ol><p>&nbsp;</p><ol><li>By checking any acceptance boxes, clicking any acceptance buttons, submitting any text or User Content or simply by browsing, accessing or making any use of the Platform you: (i) accept the Terms and agree to be bound by each of its terms, and (ii) represent and warrant to Euler Motors that: (a) these Terms are binding and enforceable against you; (b) to the extent an individual is accepting these Terms on behalf of an entity, such individual has the right and authority to agree to all of the terms set forth herein on behalf of such entity; and (c) you have read and understand our Euler Motor Policies, the terms of which are incorporated herein by reference, and agree to abide by the Euler Motors Policies. These Terms are made between you and us and shall come into effect on the date which you access and/or download the Platform and shall continue unless and until terminated by us or you.</li></ol><p>&nbsp;</p><ol><li>In the event that the User or anyone acting on the User’s behalf does not wish to be bound by the Terms, the User (or the legal person/entity acting on the User’s behalf) unequivocally agrees to refrain from accessing, using or retaining the Platform on any device in any manner whatsoever. The User agrees that anything done or caused to be done by the User or anyone acting on the User’s behalf, whether expressly or impliedly that is in contravention of the Terms will render the User liable for legal and punitive action.</li></ol><p>&nbsp;</p><ol><li>While individuals under the age of 18 (eighteen) may utilize/browse the Platform, they shall do so only with the involvement, guidance, and supervision of their parents and/or legal guardians. Euler Motors reserves the right to terminate your access and refuse to provide you with access to the Platform if Euler Motors discovers that you are under the age of 18 (eighteen) years or the required legal age in your jurisdiction. You further represent and warrant that you are not under any legal or other deficiency which prevents/may prevent you from: (i) entering into a valid contract under the Applicable Laws; and (ii) making valid payment to Euler Motors for the Vehicle booked by you.</li></ol><p>&nbsp;</p><ol><li>You are responsible for, and agree to comply with, all laws, rules, and regulations applicable to your use of the Platform and any transaction you enter into on the Platform or in connection with your use of the Platform.</li></ol><p>&nbsp;</p><ol><li><strong>ACCEPTANCE OF TERMS</strong></li></ol><p>&nbsp;</p><p>These Terms form an electronic contract that establishes legally binding terms that the User must accept to book the Vehicles through the Platform. These Terms include by reference other terms disclosed and agreed to by the User in the event the User registers for, purchases, or accepts additional features, products or services in addition to booking the Vehicles, including but not limited to terms governing features, billing, discounts, promotions,etc.</p><p>&nbsp;</p><ol><li><strong>BOOKING</strong></li></ol><p>&nbsp;</p><ol><li>By placing a booking with us, you express your intention to purchase the Vehicle selected by you &nbsp;on the ‘Book Online’ section of the Platform and agree to be bound by these Terms. Your purchase of the Vehicle and delivery by us of the Vehicle will be subject to your compliance with Euler Motors Policies and Applicable Laws, regulations and guidelines. Successful booking of the Vehicles is subject to availability of the chosen Vehicle at our showroom.</li></ol><p>&nbsp;</p><ol><li><strong>PAYMENT OFBOOKING AMOUNT</strong></li></ol><p>&nbsp;</p><ol><li>For online booking of Vehicles, you are required to pay a booking amount of Rs. 999/-through the link provided on the Platform (“<strong>Booking Amount</strong>”). This shall be a non-interest bearing amount and will confirm your booking of the selected Vehicle upon success of the transaction. The acceptance of payment of Booking Amount on behalf of Euler Motors is undertaken by a Third Party payment gateway. Euler Motors shall not be responsible for payment issues in respect of online booking through anyThird Party payment gateway.</li></ol><p>&nbsp;</p><ol><li>The payment of the Booking Amount to us shall be construed as an offer from your end to purchase the selected Vehicle and shall be adjusted against payment of the Sale Price<i>(as defined hereinafter)</i>of the Vehicle by you. Upon the receipt of the amount in the Bank Account of Euler Motors, we shall communicate the acceptance of the booking via SMS/email to you.However, the acceptance of the booking will not be construed as completion of the purchaseof the Vehicle as it is subject to the payment of balance amount by you, documentation requirements and the Purchase Terms<i>(as defined hereinafter)</i>.You agree that Euler Motors shall not be deemed to have accepted the booking or be bound by the booking until Euler Motors notifies you of its acceptance of the booking via SMS/email.</li></ol><p>&nbsp;</p><ol><li>You will receive a payment confirmation for booking of the selected Vehicle via SMS/email from us. You can also share your transaction ID with us to view the status of the booking payment. You will be contacted by Euler Motors to complete the invoicing processon the contact details provided by you during the booking process.</li></ol><p>&nbsp;</p><ol><li><strong>PRICE OF THE VEHICLE</strong></li></ol><p>&nbsp;</p><ol><li>The price displayed of the Vehicle, if any, on the Platform is only the ex-showroom price of the Vehicle. The on-road price is subject to road tax, accessories charges and etc. The &nbsp;“<strong>SalePrice</strong>” of the Vehicleis the prevailing price as applicable on the date of intimation regarding final Vehicle payment. The balance Sale Price (i.e. balance sale consideration) payable after deduction of the Booking Amount shall be paid directly at the showroom or delivery point as notified by Euler Motorsupon successful booking of the Vehicle.</li></ol><p>&nbsp;</p><ol><li>The ex-showroom price is indicative and may vary at the time of purchase of the Vehicle. The ex-showroom price is inclusive of all applicable taxes. Additional accessories for the Vehicles will need to be purchased at the showroom.</li></ol><p>&nbsp;</p><ol><li>The on-road price includes insurance, registration and road tax. This has to be paid by the User at the showroom. You may request for receipts for the same from the showroom upon payment of the Sale Price.</li></ol><p>&nbsp;</p><ol><li><strong>AVAILING FINANCE FOR VEHICLES</strong></li></ol><p>&nbsp;</p><ol><li>Euler Motors provides the option of financing the Vehicles through a financier to the customers by availing a loan facility. Ifyou apply for financing the Vehicle under a loan facility with a financier (i.e., bank or NBFC)you will be governed by the terms and conditions of the said financier. Please refer to theseterms and conditions of the financier before proceeding.</li></ol><p>&nbsp;</p><ol><li>All informationrequired from you for the purpose of availing the loan facilitywill be collected as per the requirements of the financier.</li></ol><p>&nbsp;</p><ol><li>All documents and information provided to us will be passed on to the financier and will not be stored by Euler Motors.</li></ol><p>&nbsp;</p><ol><li>Euler Motors shallnot be responsible for any actions or omissionsof the financier.</li></ol><p>&nbsp;</p><ol><li>Additional charges for availing the EMI may be levied by the financieras per their policy. Please check the terms and conditions of your selected financier for details. Subsidy given is only on the interest component and not on the additional charges levied by bank like PF, interest on moratorium and GST.</li></ol><p>&nbsp;</p><ol><li>Any additional terms and conditions, including conversion to the EMI, may be applied by the financier. Euler Motors shall not beinvolvedwith the particulars of the loan facility availed for the Vehicle.</li></ol><p>&nbsp;</p><ol><li>In case of any issues/clarifications regarding the loan, kindly connect directly with your selected financier. Euler Motors will not have any involvement in the same.</li></ol><p>&nbsp;</p><ol><li>Euler Motors reserves the right to discontinue any offer with respect to availing the financing facility at any time without giving any prior notice to you.</li></ol><p>&nbsp;</p><ol><li>Once you opt for availing the loan facility for purchase of the Vehicle, no changes will be entertained by Euler Motors/ the financier.</li></ol><p>&nbsp;</p><ol><li>Thisloan facilityis applicable only for ex-showroom price of Vehicles and for the balance amount including the RTO / Insurance costs and etc.,Euler Motors will contactyou.</li></ol><p>&nbsp;</p><ol><li><strong>DELIVERY SCHEDULE</strong></li></ol><p>&nbsp;</p><ol><li>Upon receipt of the money towards the Sale Pricein our Bank Account for the Vehicle selected by youand completion of all documentation requirements, we will communicate the estimated delivery period for your Vehicle and will make all commercially reasonable efforts to deliver theVehicle within the specified delivery period notified by us.</li></ol><p>&nbsp;</p><ol><li>Any change or delay in the delivery period will be notified to you by us. We will not be liable for any claims, damages, losses, costs or expenses incurred/suffered by you due to the delay in delivery of the Vehicle by us. However, in the event of any delays, you may cancel and claim a refund of your Booking Amount in accordance with these Terms.</li></ol><p>&nbsp;</p><ol><li><strong>CANCELLATION/REFUND</strong></li></ol><p>&nbsp;</p><ol><li>Upon payment of the Booking Amount, you may request for cancellation of booking of the Vehicle for any reason within [30] days from receiving the payment confirmation by us. If the cancellation request is approved by Euler Motors, the entire Booking Amount will be refunded to you within 60 days from the date of cancellation. The money will be refunded to the same source from which you had made the payment of the Booking Amount. Euler Motors does not process payments directly and refunds can take up to 1 month or more to reflect in your bank account depending upon the payment provider.</li></ol><p>&nbsp;</p><ol><li>You will only be eligible for cancellation of the booking and refund of the Booking Amount before the payment of Sale Price of the selected Vehicle is made by you.</li></ol><p>&nbsp;</p><ol><li>Please note that once the full payment of the Sale Price of the Vehiclehas been made, the sale shall be deemed as complete, and cancellation or claim for any refund amount will not be possible.</li></ol><p>&nbsp;</p><ol><li>All cancellation requests must be made through the option available on the Platform or sent by the Users on customercare@eulermotors.com [ .</li></ol><p>&nbsp;</p><ol><li><strong>ASSIGNMENT OR TRANSFER</strong></li></ol><p>&nbsp;</p><p>You acknowledge and agree that your booking is for the purpose of purchase of a Vehicle only by you and you may not transfer or assign rights granted to you under these Terms to any Third Party.</p><p>&nbsp;</p><ol><li><strong>COLLECTION OF INFORMATION</strong></li></ol><p>&nbsp;</p><ol><li>We may require certain information and documents from you for processing your booking, complying with statutory requirements, and/or conducting a site inspection for installation of the Vehicle charging station. You represent and warrant that all such information and documents will be true, complete and accurate. You will promptly notify us of any change in the information provided to allow us to update our records.</li></ol><p>&nbsp;</p><ol><li>You agree that we shall have the right to collect and/or use or analyse your Personal Data or Sensitive Personal Data as set forth in the Privacy Policy.All collection, storage, use and disclosure of any information provided by you will be in accordance with our Privacy Policy available at https://www.Euler Motorsmotor.com/Privacy-Policy.Use of the Platform is also governed by the Privacy Policy. We only use your information as described in the Privacy Policy. We view protection of Users\' privacy as a very important community principle. If you object to the Privacy Policy in any way, please do not use the Platform.</li></ol><p>&nbsp;</p><ol><li><strong>TERRITORY</strong></li></ol><p>&nbsp;</p><p>The Vehicle is available for booking or sale in such territories as may be designated by us on the Platform. You may not place a booking request for the Vehicle outside these territories.</p><p>&nbsp;</p><ol><li><strong>PURCHASE TERMS</strong></li></ol><p>&nbsp;</p><p>These Terms are applicable to the booking of the Vehicle. You acknowledge that purchase of Vehicle will be subject to such additional terms and conditions as may be prescribed by us including without limitation, the Euler Motors General Terms and Conditions (collectively, the “<strong>Purchase Terms</strong>”). Such Purchase Terms are subject to change, and we recommend that you carefully read and understand all the prescribed Purchase Terms before proceeding with the purchase of the Vehicle and making the full payment.</p><p>&nbsp;</p><ol><li><strong>MODIFICATION</strong></li></ol><p>&nbsp;</p><ol><li>We reserve the right to revise, modify, or update these Terms from time to time and the most current version will be posted on thePlatform.Ifarevision,inoursolediscretion,ismaterial,wewillnotifyyoubye-mailorthroughanyother means of communication. Other revisions may be updated only on the Platform, and you are responsible for checking such postings regularly. By continuing to use the Platform for booking the Vehicles or any other reason after revisions become effective, you agree to be bound by the revised Terms. The revised Terms shall supersede all prior versions.</li></ol><p>&nbsp;</p><ol><li>In addition, in the event any regulatory authority that has provided us any license to provide the booking of Vehicles on the Platform and/or Platform revokes such license, you hereby agree that we may terminate these Terms, at any time, without liability on our part.</li></ol><p>&nbsp;</p><ol><li>Euler Motors reserves the right to change the price, model, variants, design, specifications and features of the Vehicles as displayed on the ‘Book Online’ section of the Platform at any time without any prior notice and any liability.</li></ol><p>&nbsp;</p><ol><li><strong>INTELLECTUAL PROPERTY RIGHTS</strong></li></ol><p>&nbsp;</p><ol><li>You acknowledge and agree that Euler Motors owns and reserves the right, title and interest in and to the Vehicles, Platform, and Content.</li></ol><p>&nbsp;</p><ol><li>As part of the booking option, we grant you a non-exclusive, limited, royalty-free, revocable license, during the term of the Terms to use our Platform to facilitate the booking of Vehicles. Any rights relating to our Platform and Content that we do not expressly grant to you in writing are expressly reserved, and your access to and use of our Platform does not grant you an express or implied license in respect of any of the Intellectual Property Rights that are owned by, licensed to, or controlled by us and our licensees.</li></ol><p>&nbsp;</p><ol><li>To the extent required in order for us to operate this Platform and provide you with booking of Vehiclesand/or promote the Platform, in any media or platform, you grant to us a non-exclusive, world-wide, royalty-free, transferrable, irrevocable license and right to host, publicly display, transmit, distribute, or use (that includes the right to copy, reproduce, and/or publish) the User Content you upload onto this Platform. Insofar as User Content (including images) includes Sensitive Personal Data, such User Content will only be used for these purposes if such use complies with the applicable Data Protection Laws in accordance with Clause 10 of the Terms and thePrivacyPolicy. Unless otherwise agreed between the Parties, Euler Motors does not claim any ownership rights in any User Content and nothing in the Terms and/or Privacy Policy will be deemed to restrict any rights that the User may have to use or exploit its User Content.</li></ol><p>&nbsp;</p><ol><li>You acknowledge and agree that you are solely responsible for all User Content that you make available through the Platform. Accordingly, you represent and warrant that: (i) you either are the sole and exclusive owner of all User Content that you make available through the Platform, or you have all rights, licenses, consents and releases that are necessary to grant to Euler Motors the rights in such User Content, as contemplated under these Terms and/or Privacy Policy; and (ii) neither the User Content nor your posting, uploading, publication, submission or transmittal of the User Content or Euler Motors\'s use of the User Content (or any portion thereof) on, through or by means of the Platform will infringe, misappropriate or violate a Third Party\'s patent, copyright, trademark, trade secret, moral rights or other proprietary or Intellectual Property Rights, or rights of publicity or privacy, or result in the violation of any Applicable Law or regulation.</li></ol><p>&nbsp;</p><ol><li>You acknowledge and agree that the Euler Motors logo is our trademark and may not be used by you without our prior written consent.</li></ol><p>&nbsp;</p><ol><li>Any distribution, reprint or electronic reproduction of any Content from the Platform, in whole or in part, is strictly prohibited without our prior written consent.</li></ol><p>&nbsp;</p><ol><li>You acknowledge and agree that you shall not copy, modify, transmit, create any derivative works from, make use of, or reproduce in any way any copyrighted material, trademarks, trade names, service marks, or other Intellectual Property or proprietary information accessible through the Platform, without first obtaining the prior written consent of Euler Motors.</li></ol><p>&nbsp;</p><ol><li><strong>CONFIDENTIALITY</strong></li></ol><p>&nbsp;</p><p>During the course of your use of our Platform you may receive information relating to us or to our Vehicles, that is not known to the general public (“<strong>Confidential Information</strong>”). You agree that: (i) all Confidential Information will remain Euler Motors’ exclusive property; (ii) you will use Confidential Information only as is reasonably necessary for your booking of Vehicles and any other use of the Platform; (iii) you will not disclose Confidential Information to any other person or Third Party; and (iv) you will take all reasonable measures to protect the Confidential Information against any use or disclosure that is not expressly permitted in these Terms and/or Privacy Policy. You may not issue any press release or make any public statement related to our Vehicles, or use our name, trademarks, or logo, in any way (including in promotional material) without our advance written permission or misrepresent or embellish the relationship between us in any way.</p><p>&nbsp;</p><ol><li><strong>INDEMNITY</strong></li></ol><p>&nbsp;</p><ol><li>You agree and undertake to fully indemnify and hold Euler Motors, its affiliates, and its respective officers, directors, employees, successors, representatives, and agents harmless from and against all Losses howsoever arising from all claims, allegations, actions, proceedings, demands, or costs broughtbyaThirdParty or other liability or expenses (including, without limitation, attorneys’ fees) (each, a \"<strong>Claim</strong>\")that we may sustain or incur, directly or indirectly, arising from or as a result of your: (i) actual or alleged breach of the Terms and/or Privacy Policy; (ii) use of the Platform; (iii) access to, use, or Misuse or Abuse of the Content offered through our Platform;(iv) misconduct in any manner, including negligence and fraud, in connection with your use of our Platform; or (v) any actual or alleged infringement of any Intellectual Property Rights by you, and any personal injury, death, or property damage related thereto.</li></ol><p>&nbsp;</p><ol><li>We will notify you of any such Claim or proceeding and assist you, at your expense, in defending the same. We reserve the right to assume, at your expense, the exclusive control and defence of any matter that is or may be subject to indemnification under this section. Should we exercise this right, you nevertheless agree to cooperate with any reasonable requests we make of you to assist with our defence of suchmatter.</li></ol><p>&nbsp;</p><ol><li><strong>LIMITATION OF LIABILITY</strong></li></ol><p>&nbsp;</p><ol><li>To the maximum extent permitted by law, we will not be liable to you for any Losses, (including loss of information, data, revenues, profits or savings) resulting, directly or indirectly, out of, or in any way connected with you access to, use of or reliance on the Platform including any special, punitive, incidental,consequential or other Losses, expenses or damages arising out of or in connection with theuse of the Platformwhether in negligence, contract, tort, strict liability, or any other legal theory.Youassumefullresponsibilityfortheuseof the Platform..</li></ol><p>&nbsp;</p><ol><li>We may at our sole discretion and without assigning any reason whatsoever at any time suspend your your access to the Platform without giving any prior notice, to carry out system maintenance or/and upgrading or/and testing or/and repairs or/and other related work. We will attempt to inform you of the same. Without prejudice to any other provisions of the Euler Motors policies, we shall not be liable to indemnify you for any Loss or/and damage or/and costs or/and expense that you may suffer or incur, and no fees or/and charges payable by you to the Platform for any purchase shall be deducted or refunded or rebated, as a result of such suspension.</li></ol><p>&nbsp;</p><ol><li>WithoutlimitingClause 17.1above,ifyousufferLossesordamageasaresultofourgrossnegligence orwillfulfailuretocomplywithourobligationsundertheseTerms or any of the Euler Motors Policies,anyclaimbyyouagainst uswillin any event be limited to the Booking Amount paid by you for booking the Vehicle.</li></ol><p>&nbsp;</p><ol><li>You expressly agree that in the event of any statute, rule, regulation, or amendment coming into force that would result in Euler Motors incurring any form of liability whatsoever, these Terms and any agreement thereof will stand terminated 1 (one) day before the coming into effect of such statute, rule, regulation oramendment.</li></ol><p>&nbsp;</p><ol><li><strong>DISCLAIMERS</strong></li></ol><p>&nbsp;</p><ol><li>The Vehicle will in all material aspects be similar to the Vehicle presented or advertised in marketing or promotional campaigns.However, in view of our endeavors to continuously innovate and improve our products, we reserve the right to modify or alter the specifications, features and/or design of the Vehicle without prior notice and any liability.</li></ol><p>&nbsp;</p><ol><li>Euler Motors and its licensors and affiliates make no representations or warranties of any kind, express, statutory or implied as to the operation of the Platform, Vehicles or the information, Content or materials included on the Platform. Euler Motors and its licensors and affiliates disclaim all warranties, express, statutory, or implied, including, but not limited to, implied warranties of merchantability and fitness for a particular purpose and non-infringement. Euler Motors is not responsible for the conduct of any User of Platform. Euler Motors does not warrant or covenant that our Platform will be available at any time or from any particular location, will be secure or error-free, that defects will be corrected, or that the access to the Platform is free of viruses or other potentially harmful components. any material or Content downloaded or otherwise obtained through the use of the Platform is accessed at your own discretion and risk and you will be solely responsible for any damage to your computer system or loss of data that results from the download of any such material. no advice or information, whether oral or written, obtained by any user from the Platform, shall create any warranty not expressly stated herein.</li></ol><p>&nbsp;</p><ol><li>Euler Motorsshall not be responsible for the delay or inability to use the Platform, the delay in delivery of Vehicles, or for any information, software, and related graphics obtained through the Platform or otherwise arising out of the use of the Platform, whether based on contract, tort, negligence, strict liability or otherwise. Further, Euler Motors shall not be held responsible for non-availability of the Platform during periodic maintenance operations or any unplanned suspension of access to the Platform that may occur due to technical reasons or for any reason beyond Euler Motors\'s control.</li></ol><p>&nbsp;</p><ol><li>These limitations, disclaimer of warranties and exclusions apply without regard to whether the damages arise from (a) breach of contract, (b) breach of warranty, (c) negligence, or (d) any other cause of action, to the extent such exclusion and limitations are not prohibited by Applicable Law.</li></ol><p>&nbsp;</p><ol><li>Whilst we will use reasonable commercial efforts to ensure that all your submitted Personal Data is accurately captured, extracted and/or entered into our system,wedonotwarrantthatthisprocessorthatanyreportsand/oranalysisgeneratedbythePlatform will be 100% error free. You are responsible for reviewing and verifying all such reports and/or analysisandpromptlyinforming usofanyerrorsnotedin writing.Subjecttothat,we will takestepstoinvestigateandrectifyanyconfirmederrorsassoonasreasonablypracticable following receipt of yournotification.</li></ol><p>&nbsp;</p><ol><li><strong>FORCE MAJEURE</strong></li></ol><p>&nbsp;</p><p>Neither Party shall be liable for any failure or delay on its part in performing its obligations under these Terms, if such failure or delay is due in whole or in part, to “<strong>Force Majeure</strong>” conditions. Force Majeure for these Terms shall mean incidents which could not have been reasonably predicted and which have resulted from circumstances beyond the control of the affected Party, and which are limited to, acts of God, labor disputes or other industrial disturbances, electrical or power outage, utilities or other telecommunications failures, earthquakes, storms or other elements of nature, blockages, embargoes, riots, acts or orders of government, epidemic, pandemic, acts of terrorism, or war.The Party whose performance is prevented by Force Majeure shall take all reasonable actions within its power to comply as fully as possible herewith and to preserve and protect the respective interests of the other Party hereto. It is clarified that failure to make payments within the prescribed period for any reason whatsoever or insufficiency of funds, shall not constitute a Force Majeure event. It is further clarified that delivery of the Vehicles by Euler Motors is subject to these Force Majeure conditions.</p><p>&nbsp;</p><ol><li><strong>GOVERNING LAW AND JURISDICTION</strong></li></ol><p>&nbsp;</p><ol><li>These Terms will be governed by the laws of India.</li></ol><p>&nbsp;</p><ol><li>The courts of New Delhi, India shall have exclusive jurisdiction over any disputes between the Parties arising out of or in relation to these Terms.</li></ol><p>&nbsp;</p><ol><li><strong>DISPUTE RESOLUTION</strong></li></ol><p>&nbsp;</p><ol><li>Any complaint or dispute can be raised in writing to us at customercare@eulermotors.com</li></ol><p>&nbsp;</p><ol><li>If any disputes or claims arising under the Euler Motors Policies or out of or in connection with the execution, interpretation, performance, or non-performance of the Euler Motors Policies or in respect of the scope, validity or application of the Euler Motors Policies, or the subject matter hereof (“<strong>Dispute</strong>”), representatives of the Parties shall cooperate, in good faith, to attempt to amicably resolve the Dispute.</li></ol><p>&nbsp;</p><ol><li>All Disputes that cannot be resolved by the Parties by discussion shall be settled by arbitration in accordance with the Arbitration and Conciliation Act, 1996. The arbitral tribunal shall consist of 3 (three) arbitrators. Each Party shall appoint 1 (one) arbitrator each and the 2 (two) arbitrators so appointed shall appoint the 3rd&nbsp;(third) arbitrator. The venue of arbitration shall beNew Delhi, India. The language of the arbitration shall be English. The decision of the arbitrators shall be final, binding and incontestable and may be used as a basis for judgment thereon anywhere. Judgment upon any arbitral award rendered hereunder may be entered in any court having jurisdiction, or application may be made to such court for a judicial acceptance of the award and an order of enforcement, as the case may be.</li></ol><p>&nbsp;</p><ol><li>Each Party to the arbitration shall cooperate with each other Party to the arbitration in making full disclosure of and providing complete access to all information and documents requested by such other Party in connection with such arbitration proceedings, subject only to any confidentiality obligations binding on such Party or any legal privilege applicable to any such information and/or documents. Each Party shall bear its own costs of the arbitration.</li></ol><p>&nbsp;</p><ol><li><strong>MISCELLANEOUS</strong></li></ol><p>&nbsp;</p><ol><li>Waiver</li></ol><p>&nbsp;</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The failure of a Party at any time to insist on performance of any provision of the Euler Motors Policies is not a waiver of that Party’s right at a later time to insist on performance of that or any other governing provision of the Euler Motors Policies.</p><p>&nbsp;</p><ol><li>Severability</li></ol><p>&nbsp;</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If any term or provision of the Euler Motors Policies is held by a court of competent jurisdiction to be invalid, void or unenforceable, the remainder of the terms and provisions of the Euler Motors Policies shall remain in full force and effect and shall in no way be affected, impaired or invalidated.</p><p>&nbsp;</p><ol><li>Notices</li></ol><p>&nbsp;</p><p>We may provide any notice to you under any Euler Motors Policies by sending a message to the email address provided by you during the booking process. Notices we provide by email will be effective when we send the email. It is your responsibility to keep your email address current. You will be deemed to have received any email sent to the email address specified by you when we send the email, whether or not you actually receive the email. To give us notice under any Euler Motors Policies, you must contact us by email, personal delivery, overnight courier or registered mail to the mailing address listed below. Notices to Euler Motors must be sent by email to the email address specified in this Clauseor to any other email address notified by email to the User by Euler Motors, or by electronic communication via the Platform from time to time for such purpose. Notices provided by personal delivery will be effective immediately. Notices provided by overnight courier will be effective 1 (one) business day after they are sent. Notices provided by registered mail will be effective 3 (three) business days after they are sent.</p><p>&nbsp;</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Euler Motors Private Limited</strong></p><p>]</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Address: B-99, PanchsheelVihar, New Delhi 110017</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email: [customercare@eulermotors.com]</p><p>&nbsp;</p><ol><li>Assignment</li></ol><p>&nbsp;</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The User shall not have the right to assign or transfer the Euler Motors Policies, or any part thereof, without the prior written consent of Euler Motors. Any assignment without such consent shall be void and have no effect. Euler Motors shall have the right to assign or transfer the Euler Motors Policies without requiring the prior approval of the Users. &nbsp;Subject to the foregoing, the Euler Motors Policies will be binding upon, and inure to the benefit of, the Parties and their respective permitted successors and assigns.</p><p>&nbsp;</p><ol><li>Rights of ThirdParties</li></ol><p>&nbsp;</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No Third-Party shall have any right or benefit under Euler Motors Policiesor entitlementtoenforceany term of the Euler Motors Policies.</p><p>&nbsp;</p><p>&nbsp;</p><ol><li><strong>SUGGESTIONS/FEEDBACK</strong></li></ol><p>&nbsp;</p><ol><li>We welcome and encourage you to provide feedback, comments, and suggestions for improvements to the Platform (“<strong>Feedback</strong>”). You may submit Feedback by writing to us at<a href=\"mailto:customercare@eulermotors.com\">customercare@eulermotors.com</a>&nbsp; or<a href=\"mailto:pallavi.arora@eulermotors.com\">pallavi.arora@eulermotors.com</a>.</li></ol><p>&nbsp;</p><ol><li>You acknowledge and agree that the Feedback will be the sole and exclusive property of Euler Motors and you hereby irrevocably assign to Euler Motors and agree to irrevocably assign to Euler Motorsall of your rights, title, and interest in and to the Feedback, including without limitation all worldwide patent, copyright, trade secret, moral and other proprietary or Intellectual Property Rights therein. At Euler Motors’ request and expense, you will execute documents and take such further acts as Euler Motors may reasonably request to assist Euler Motors to acquire, perfect, and maintain its Intellectual Property Rights and other legal protections for the Feedback.</li></ol><p>&nbsp;</p><p>&nbsp;</p><p><i>Last Updated: [20th October, 2021]</i></p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `testride`
--

CREATE TABLE `testride` (
  `id` int(11) NOT NULL,
  `testride_id` varchar(255) NOT NULL,
  `name` varchar(200) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `state` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `pincode` mediumint(10) NOT NULL,
  `purchaseplan` varchar(200) NOT NULL,
  `vehicle_owned` tinyint(1) NOT NULL,
  `vehicle_owned_type` varchar(100) DEFAULT NULL,
  `vehicle_owned_brand` varchar(100) DEFAULT NULL,
  `vehicle_owned_model` varchar(100) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testride`
--

INSERT INTO `testride` (`id`, `testride_id`, `name`, `mobile`, `email`, `state`, `city`, `pincode`, `purchaseplan`, `vehicle_owned`, `vehicle_owned_type`, `vehicle_owned_brand`, `vehicle_owned_model`, `status`, `created_at`) VALUES
(2, 'RIDE1641202606187', 'chetan singh', '+919753591245', 'chetan.singh@webee.com', 'Madhya Pradesh', 'Indore', 452016, 'Within 7 days', 1, '3 Wheeler', 'Mahindra', 'Ace', 1, '2022-01-03 09:36:46'),
(3, 'RIDE1643964572536', 'chetan singh', '9753591245', 'chetan.singh@webee.com', 'Madhya Pradesh', 'Indore', 452016, 'Within 7 days', 1, '3 Wheeler', 'Piaggio', 'Ape Xtra LDX', 1, '2022-02-04 08:49:32'),
(4, 'RIDE1644219756783', 'chetan singh', '7049056454', 'chetan.singh@webee.com', 'Manipur', 'Khongman', 452014, 'After a month', 1, '3 Wheeler', 'Bajaj', 'Maxima', 1, '2022-02-07 07:42:36'),
(5, 'RIDE1644233965142', 'chetan singh', '9753591245', 'chetan.singh@webee.com', 'Madhya Pradesh', 'Amlai', 452016, 'Within 7 days', 1, '3 Wheeler', 'Piaggio', 'Ape Xtra LDX', 1, '2022-02-07 11:39:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` int(2) NOT NULL COMMENT '1=admin,2=publisher,3=viewer\r\n',
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '1=active,0=inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `email`, `password`, `type`, `status`) VALUES
(1, 'admin', 'admin@gmail.com', '12345', 1, 1),
(3, 'publisher', 'publisher@gmail.com', '$2y$10$O.wY8NK/1JmG7rIceKTtouEON.Yyz5GLxfDuGovt2qrCjl5Vwrmg2', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `variants`
--

CREATE TABLE `variants` (
  `id` int(11) NOT NULL,
  `variant` varchar(200) NOT NULL,
  `variant_order` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0=inactive,1=active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `variants`
--

INSERT INTO `variants` (`id`, `variant`, `variant_order`, `status`, `created_at`) VALUES
(5, 'Hiload-Dv-XL', 4, 1, '2022-02-03 14:42:18'),
(6, 'Hiload-Dv', 1, 1, '2022-02-03 14:43:22'),
(7, 'Hiload-Dv-XL-1', 2, 1, '2022-02-03 14:43:50'),
(8, 'Hiload-Dv-1', 3, 1, '2022-02-04 14:24:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_page`
--
ALTER TABLE `about_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_page_items`
--
ALTER TABLE `about_page_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carrer_page`
--
ALTER TABLE `carrer_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `charging_station_page`
--
ALTER TABLE `charging_station_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_page`
--
ALTER TABLE `contact_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dealership`
--
ALTER TABLE `dealership`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dealership_page`
--
ALTER TABLE `dealership_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eep_form`
--
ALTER TABLE `eep_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eep_page`
--
ALTER TABLE `eep_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq_page`
--
ALTER TABLE `faq_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `getupdates`
--
ALTER TABLE `getupdates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hiload_page`
--
ALTER TABLE `hiload_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hiload_spec_items`
--
ALTER TABLE `hiload_spec_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_page`
--
ALTER TABLE `home_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media_coverage_page`
--
ALTER TABLE `media_coverage_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobility_page`
--
ALTER TABLE `mobility_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privacy_policy_page`
--
ALTER TABLE `privacy_policy_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_attribute`
--
ALTER TABLE `product_attribute`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_reviews_page`
--
ALTER TABLE `product_reviews_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sku`
--
ALTER TABLE `product_sku`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `SKUHI01` (`reference_id`);

--
-- Indexes for table `refund_policy_page`
--
ALTER TABLE `refund_policy_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `technology_page`
--
ALTER TABLE `technology_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `telematics_page`
--
ALTER TABLE `telematics_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `term_and_condition_page`
--
ALTER TABLE `term_and_condition_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testride`
--
ALTER TABLE `testride`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `variants`
--
ALTER TABLE `variants`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_page`
--
ALTER TABLE `about_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `about_page_items`
--
ALTER TABLE `about_page_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `carrer_page`
--
ALTER TABLE `carrer_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `charging_station_page`
--
ALTER TABLE `charging_station_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact_page`
--
ALTER TABLE `contact_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dealership`
--
ALTER TABLE `dealership`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dealership_page`
--
ALTER TABLE `dealership_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `eep_form`
--
ALTER TABLE `eep_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `eep_page`
--
ALTER TABLE `eep_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `faq_page`
--
ALTER TABLE `faq_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `getupdates`
--
ALTER TABLE `getupdates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hiload_page`
--
ALTER TABLE `hiload_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `hiload_spec_items`
--
ALTER TABLE `hiload_spec_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `home_page`
--
ALTER TABLE `home_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `media_coverage_page`
--
ALTER TABLE `media_coverage_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mobility_page`
--
ALTER TABLE `mobility_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `privacy_policy_page`
--
ALTER TABLE `privacy_policy_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_attribute`
--
ALTER TABLE `product_attribute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product_reviews_page`
--
ALTER TABLE `product_reviews_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product_sku`
--
ALTER TABLE `product_sku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `refund_policy_page`
--
ALTER TABLE `refund_policy_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `technology_page`
--
ALTER TABLE `technology_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `telematics_page`
--
ALTER TABLE `telematics_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `term_and_condition_page`
--
ALTER TABLE `term_and_condition_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `testride`
--
ALTER TABLE `testride`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `variants`
--
ALTER TABLE `variants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
