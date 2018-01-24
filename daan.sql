-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 24, 2018 at 09:08 AM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `daan`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_setting`
--

CREATE TABLE `account_setting` (
  `id` int(11) NOT NULL,
  `banner_image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_setting`
--

INSERT INTO `account_setting` (`id`, `banner_image`, `created_at`, `updated_at`) VALUES
(1, 'd20f4245756d10d733978bcc6dac64b8.jpg', '2017-12-16 18:50:27', '2017-12-17 19:01:36');

-- --------------------------------------------------------

--
-- Table structure for table `contact_enquiry`
--

CREATE TABLE `contact_enquiry` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_emails` varchar(255) NOT NULL,
  `comments` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `id` int(8) NOT NULL,
  `uid` int(8) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` int(15) NOT NULL COMMENT 'We need to save id from donation_type',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '0 for donate and 1 for request',
  `address` varchar(500) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `pincode` int(8) NOT NULL,
  `qty` int(8) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `banner` varchar(255) NOT NULL,
  `message` varchar(50) NOT NULL,
  `activate` enum('0','1') NOT NULL DEFAULT '1' COMMENT '1 = activate, 0 = deactivate',
  `active` enum('0','1') NOT NULL DEFAULT '1' COMMENT '1 = active, 0 = inactive',
  `complete` enum('0','1') NOT NULL DEFAULT '0' COMMENT 'Donation completed or not',
  `completed_uid` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`id`, `uid`, `name`, `type`, `status`, `address`, `city`, `state`, `pincode`, `qty`, `slug`, `banner`, `message`, `activate`, `active`, `complete`, `completed_uid`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'maths book', 1, 0, 'Flat No.11,Sai Ratna Apt,Gopal Nagar,Amrutdham,Nas', '1', '1', 422003, 1, 'maths_book', '', 'hard subject', '1', '1', '0', 0, '2017-10-11 18:00:02', '2017-12-14 11:01:15', NULL),
(2, 2, 'i want handbook', 1, 1, 'Flat No.11,Sai Ratna Apt,Gopal Nagar,Amrutdham,Nas', '2', '2', 422003, 2, 'i_want_handbook', '', 'i want this', '1', '1', '0', 2, '2017-10-11 18:05:11', '2017-12-14 14:55:17', NULL),
(3, 1, 'pencil', 1, 0, 'hello', '1', '1', 422012, 1, 'pencil', '', 'hello', '1', '1', '0', 0, '2017-10-11 18:52:33', '2017-12-14 10:57:10', NULL),
(4, 2, 'formal pant', 2, 0, 'Flat No.11,Sai Ratna Apt,Gopal Nagar,Amrutdham,Nas', '1', '1', 422003, 3, 'formal_pant', '', 'they are good', '1', '1', '0', 0, '2017-10-12 18:32:22', '2017-12-14 10:57:07', NULL),
(12, 2, 'i want to donate my ', 6, 0, 'Flat No.11,Sai Ratna Apt,Gopal Nagar,Amrutdham,Nas', '1', '1', 422003, 1, 'i_want_to_donate_my', '', 'white color', '1', '1', '0', 0, '2017-10-14 18:17:01', '2017-12-14 10:57:05', NULL),
(13, 4, 'i want to donate bag', 4, 0, 'gyatri duplex room no-12', '1', '1', 422012, 1, 'i_want_to_donate_bag', '', 'hello, hello', '1', '1', '0', 0, '2017-10-14 18:19:02', '2017-12-14 10:57:02', NULL),
(14, 6, 'Tiger Story books', 1, 0, 'satpur', '1', '1', 422012, 10, 'tiger_story_books', '', 'We have all the new books some of them are purchas', '1', '1', '0', 0, '2017-10-14 18:22:24', '2017-12-14 10:56:58', NULL),
(18, 2, 'i wan to donate my p', 5, 0, 'Flat No.11,Sai Ratna Apt,Gopal Nagar,Amrutdham,Nas', '1', '1', 422003, 1, 'i_wan_to_donate_my_p', '', 'samsung guru', '1', '1', '0', 0, '2017-10-19 05:39:49', '2017-12-14 10:56:56', NULL),
(19, 2, 'i wan to donate my s', 2, 0, 'Flat No.11,Sai Ratna Apt,Gopal Nagar,Amrutdham,Nas', '1', '1', 422003, 1, 'i_wan_to_donate_my_s', '', 'white shirt', '1', '1', '0', 0, '2017-10-19 05:43:09', '2017-12-14 10:56:53', NULL),
(20, 9, 'shirt', 2, 0, 'ashok nagar', '1', '1', 422012, 1, 'shirt', '', 'adasd as asds asd asdas ', '1', '1', '0', 0, '2017-10-19 06:03:28', '2017-12-14 10:56:49', NULL),
(21, 2, 'i want school bag', 4, 1, 'Flat No.11,Sai Ratna Apt,Gopal Nagar,Amrutdham,Nas', '1', '1', 422003, 1, 'i_want_school_bag', '', 'school bag', '1', '1', '0', 2, '2017-10-19 07:11:56', '2017-12-14 14:55:30', NULL),
(22, 2, 'besheet', 2, 0, 'Flat No.11,Sai Ratna Apt,Gopal Nagar,Amrutdham,Nas', '1', '1', 422003, 1, 'besheet', '', 'Red bedsheet', '1', '1', '0', 0, '2017-10-20 17:25:42', '2017-12-14 10:56:43', NULL),
(30, 2, 'Title', 3, 1, 'Shraddha sai society, Room No. 2, I.T.I colony, shramik nagar, satpur', '1', '1', 422012, 3, 'title', 'd23c76ba586f16d3005638e7e782e9c6.jpg', 'i want notebooks for my childs', '1', '1', '0', 0, '2017-12-16 14:10:33', '2017-12-16 14:10:33', NULL),
(31, 2, 'Title', 2, 0, 'Shraddha sai society, Room No. 2, I.T.I colony, shramik nagar, satpur', '1', '1', 422012, 3, 'title_707a96e06f7d5031b1ee633dee7e9d7f8434002551e067ca4446dd8807c04049', 'dcf4076da68c185c1f12a3c76caced0f.jpg', 'I want to donate the cloths i have with me.', '1', '1', '0', 0, '2017-12-16 14:15:33', '2017-12-16 14:15:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `donation_type`
--

CREATE TABLE `donation_type` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image_thumb` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donation_type`
--

INSERT INTO `donation_type` (`id`, `name`, `image_thumb`, `image`, `datetime`) VALUES
(1, 'Books', 'donation_type/books_thumb.jpg', 'donation_type/books.jpg', '2017-10-11 17:58:50'),
(2, 'Cloths', 'donation_type/cloths_thumb.jpg', 'donation_type/cloths.jpg', '2017-10-11 17:58:50'),
(3, 'Notebooks', 'donation_type/notebook_thumb.jpg', 'donation_type/notebooks.jpg', '2017-10-14 16:02:27'),
(4, 'Bags', 'donation_type/bags_thumb.jpg', 'donation_type/bags.jpeg', '2017-10-14 16:35:38'),
(5, 'Electric Equipment', 'donation_type/electric_thumb.jpg', 'donation_type/electric.jpg', '2017-10-14 16:35:38'),
(6, 'Footwear', 'donation_type/footwear_thumb.jpg', 'donation_type/footwear.jpg', '2017-10-14 16:36:37'),
(7, 'Sport Equipment', 'donation_type/sports_thumb.jpg', 'donation_type/sports.jpg', '2017-10-14 16:36:37'),
(8, 'Stationary', 'donation_type/stationary_thumb.jpg', 'donation_type/stationary.jpg', '2017-10-14 16:37:32'),
(9, 'Toys', 'donation_type/toys_thumb.jpg', 'donation_type/toys.jpg', '2017-10-14 16:37:32'),
(10, 'Makeup Equipment', 'donation_type/makeup_thumb.jpg', 'donation_type/makeup.jpg', '2017-10-14 16:43:09'),
(11, 'Magazine', 'donation_type/magazine_thumb.jpg', 'donation_type/magazine.jpg', '2017-10-14 17:30:24'),
(12, 'Kitchen Ware', 'donation_type/kitchenware_thumb.jpg', 'donation_type/kitchenware.jpg', '2017-10-14 17:40:20');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) DEFAULT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(0);

-- --------------------------------------------------------

--
-- Table structure for table `news_letter`
--

CREATE TABLE `news_letter` (
  `id` int(8) NOT NULL,
  `email` varchar(100) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news_letter`
--

INSERT INTO `news_letter` (`id`, `email`, `datetime`) VALUES
(1, 'singharyan015@gmail.com', '2017-10-21 23:01:17'),
(2, 'supports@hoyowatch.com', '2017-10-21 23:02:42'),
(3, 'user_email@gmail.com', '2017-10-21 23:03:35'),
(4, 'r@gmail.com', '2017-10-21 23:12:13'),
(5, 'm@gmail.com', '2017-10-21 23:14:05'),
(6, 'rahulp1492@yahoo.com', '2017-10-21 23:27:55'),
(7, 'rahulp1492@yahoo.co', '2017-10-22 17:28:14');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(8) NOT NULL,
  `uid` int(8) NOT NULL,
  `fid` int(8) NOT NULL,
  `message` varchar(50) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(8) NOT NULL,
  `donation_id` int(8) NOT NULL COMMENT 'this is for joining donation table esily',
  `qty` int(8) NOT NULL,
  `request_id` int(8) NOT NULL COMMENT 'from user request table id',
  `message` varchar(50) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `donation_id`, `qty`, `request_id`, `message`, `datetime`) VALUES
(1, 2, 1, 1, 'Thanks for your support', '2017-12-17 16:59:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(80) NOT NULL,
  `pro_img` varchar(100) NOT NULL DEFAULT 'assets/img/profile.png',
  `salt` varchar(40) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `user_verification` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '1 = verified, 2=request, 0=not verified',
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(500) NOT NULL,
  `state` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `sd_aadhar` varchar(20) NOT NULL,
  `sd_tax_card` varchar(20) NOT NULL,
  `other` varchar(500) NOT NULL,
  `profession` varchar(255) NOT NULL,
  `created_on` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `pro_img`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `last_login`, `active`, `user_verification`, `first_name`, `last_name`, `phone`, `address`, `state`, `city`, `pincode`, `sd_aadhar`, `sd_tax_card`, `other`, `profession`, `created_on`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '::1', 'admin@admin.com', '$2y$08$eB6mEI09UrQcSXW1IF2sZeMuCjDe2yz8Nd.xXEKC0Sax/0KQ9laKC', 'assets/img/profile.png', NULL, 'admin@admin.com', NULL, NULL, NULL, 'h.3eZLCk5aSMkp4ytTBDXO', 1515320207, 1, '0', 'admin', 'Master', '8888888888', 'shramikn nagar', 1, 1, '422012', '', '', '', '', '1515319656', '2018-01-07 10:07:36', '2018-01-07 10:19:59', NULL),
(6, '::1', 'shkasd1992@gmail.com', '$2y$08$jQYvynRUfV1KKQyfMCKJB.hqNY.xLr0sEj4/rI0WSfro0mu3gTNNe', 'assets/img/profile.png', NULL, 'shkasd1992@gmail.com', 'c9ce5f990bc0bb8bb1e002b6f1367d5fe6fa4f5c', NULL, NULL, NULL, NULL, 0, '0', 'Rahul', 'Pawar', '7709817985', 'Shraddha sai society, Room No. 2, I.T.I colony, shramik nagar, satpur', 1, 1, '422012', '', '', '', '', '1515321705', '2018-01-07 10:41:45', '2018-01-07 10:41:46', NULL),
(7, '::1', 'shkasd199@gmail.com', '$2y$08$2CaEfvjiTf6iJ7S2UWE.vO2USQdYRp.MV6fjmSCgbi7EHrjhkPxF2', 'assets/img/profile.png', NULL, 'shkasd199@gmail.com', 'e139bd75166ed5c466aebed344d2e1393a0dfcbc', NULL, NULL, NULL, NULL, 0, '0', 'Rahul', 'Pawar', '7709817985', 'Shraddha sai society, Room No. 2, I.T.I colony, shramik nagar, satpur', 1, 1, '422012', '', '', '', '', '1515321945', '2018-01-07 10:45:45', '2018-01-07 10:45:45', NULL),
(8, '::1', 'rahulp1492@yahoo.com', '$2y$08$uaLAV9uz7ojKfRPgxvmcZOlbQhteRK9cIa75cxQNnT1y6rdxH/30q', 'assets/img/profile.png', NULL, 'rahulp1492@yahoo.com', '92df07f5cb92d9a4bb923c558bbf3c5861e652c8', NULL, NULL, NULL, NULL, 0, '0', 'Praful', 'pawar', '7709817985', 'Shraddha sai soc, Room No. 2, I.T.I colony, shramik nagar, satpur', 1, 1, '422012', '', '', '', '', '1515322068', '2018-01-07 10:47:48', '2018-01-07 10:47:48', NULL),
(9, '::1', 'shkasd19@gmail.com', '$2y$08$i.DWip3x4A8xwOQRGWMTC.DGfC7LxJlVLccvy/jLgG.lP80Fihy4m', 'assets/img/profile.png', NULL, 'shkasd19@gmail.com', 'ef063d7e22b193d78b840b555606a6d8dc21739c', NULL, NULL, NULL, NULL, 0, '0', 'Rahul', 'Pawar', '7709817985', 'Shraddha sai society, Room No. 2, I.T.I colony, shramik nagar, satpur', 1, 1, '422012', '', '', '', '', '1515322771', '2018-01-07 10:59:31', '2018-01-07 10:59:31', NULL),
(10, '::1', 'shkasd1@gmail.com', '$2y$08$XCgGDNwTcVWe0NIU3v14PekOAGQ8Of55iPR75ffzNXQJLs1kx.lNe', 'assets/img/profile.png', NULL, 'shkasd1@gmail.com', '7bc6ad9b8379a3598d2d1f705a99a5471e961a7c', NULL, NULL, NULL, NULL, 0, '0', 'Rahul', 'Pawar', '7709817985', 'Shraddha sai society, Room No. 2, I.T.I colony, shramik nagar, satpur', 1, 1, '422012', '', '', '', '', '1515322878', '2018-01-07 11:01:18', '2018-01-07 11:01:19', NULL),
(11, '::1', 'shkasd12@gmail.com', '$2y$08$rK1wrafToXFu3t8N1y3kiO.uvfq.Y42yanCp01Pfnke.9BZQIu0Dq', 'assets/img/profile.png', NULL, 'shkasd12@gmail.com', 'ba94912edcfc537466cdce5a2fcf4f04a74b237a', NULL, NULL, NULL, NULL, 0, '0', 'Rahul', 'Pawar', '7709817985', 'Shraddha sai society, Room No. 2, I.T.I colony, shramik nagar, satpur', 1, 1, '422012', '', '', '', '', '1515323004', '2018-01-07 11:03:24', '2018-01-07 11:03:24', NULL),
(12, '::1', 'shkasd2@gmail.com', '$2y$08$h7OfS6rQEDPx2qaloPSB3eWSrMq4b3zFUSpux4LUqkxKqVF9gn0lu', 'assets/img/profile.png', NULL, 'shkasd2@gmail.com', '7dee684859b94dfcd12c636bc6355c951b4073d3', NULL, NULL, NULL, NULL, 0, '0', 'Rahul', 'Pawar', '7709817985', 'Shraddha sai society, Room No. 2, I.T.I colony, shramik nagar, satpur', 1, 1, '422012', '', '', '', '', '1515325005', '2018-01-07 11:36:45', '2018-01-07 11:36:46', NULL),
(13, '::1', 'shkasd@gmail.com', '$2y$08$uhObHVOyYx3lZqzVB2Hf/uMdZjaxlXX1OD6o7TLEZ388depJG/5L2', 'assets/img/profile.png', NULL, 'shkasd@gmail.com', '1d57db25228474c566390b38d509ba269b5ec4fa', NULL, NULL, NULL, NULL, 0, '0', 'Rahul', 'Pawar', '7709817985', 'Shraddha sai society, Room No. 2, I.T.I colony, shramik nagar, satpur', 1, 1, '422012', '', '', '', '', '1515325399', '2018-01-07 11:43:19', '2018-01-07 11:43:19', NULL),
(14, '::1', 'rahulp149@yahoo.com', '$2y$08$qfi43k7PghWDaxTIUAOEdut71qnfHmwjM/emOn1iWD0jU3J.naoG2', 'assets/img/profile.png', NULL, 'rahulp149@yahoo.com', NULL, NULL, NULL, NULL, NULL, 1, '0', 'Praful', 'pawar', '7709817985', 'Shraddha sai soc, Room No. 2, I.T.I colony, shramik nagar, satpur', 1, 1, '422012', '', '', '', '', '1515325468', '2018-01-07 11:44:28', '2018-01-07 11:44:28', NULL),
(15, '::1', 'rahulp14@yahoo.com', '$2y$08$J3hvDkD4gqKISOtWOhuQwOrlG5DXAd78DAsA6j0eeptX6VTd6MXJq', 'assets/img/profile.png', NULL, 'rahulp14@yahoo.com', NULL, NULL, NULL, NULL, NULL, 1, '0', 'Praful', 'pawar', '7709817985', 'Shraddha sai soc, Room No. 2, I.T.I colony, shramik nagar, satpur', 1, 1, '422012', '', '', '', '', '1515325505', '2018-01-07 11:45:05', '2018-01-07 11:45:05', NULL),
(16, '::1', 'rahulp4@yahoo.com', '$2y$08$75phSm8.a4bUcbzt0fn.fOKCBDHjcN54Wy0F7Ia93KJRyvnIphwDK', 'assets/img/profile.png', NULL, 'rahulp4@yahoo.com', 'd6b6801598e76bf91ef0e61f6326062b1cfacae4', NULL, NULL, NULL, NULL, 0, '0', 'Praful', 'pawar', '7709817985', 'Shraddha sai soc, Room No. 2, I.T.I colony, shramik nagar, satpur', 1, 1, '422012', '', '', '', '', '1515325575', '2018-01-07 11:46:15', '2018-01-07 11:46:15', NULL),
(17, '::1', 'rahulp142@yahoo.com', '$2y$08$q8G5frY8VTzrVo5sAOINi.NANoyC17meKwU6Xp1AjBTSAkSL4Mhoq', 'assets/img/profile.png', NULL, 'rahulp142@yahoo.com', '9ba23df7e638bb97f6518b7ddaebfbe99eb18c56', NULL, NULL, NULL, NULL, 0, '0', 'Praful', 'pawar', '7709817985', 'Shraddha sai soc, Room No. 2, I.T.I colony, shramik nagar, satpur', 1, 1, '422012', '', '', '', '', '1515325619', '2018-01-07 11:46:59', '2018-01-07 11:46:59', NULL),
(18, '::1', 'rahulp492@yahoo.com', '$2y$08$Vc4p/ePdD4mjwho9T4cQxOROgrybjImAE7B2P0x3pdo3yC4YsGsiS', 'assets/img/profile.png', NULL, 'rahulp492@yahoo.com', NULL, NULL, NULL, NULL, NULL, 1, '0', 'Praful', 'pawar', '7709817985', 'Shraddha sai soc, Room No. 2, I.T.I colony, shramik nagar, satpur', 1, 1, '422012', '', '', '', '', '1515325710', '2018-01-07 11:48:30', '2018-01-07 11:48:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `user_id` mediumint(8) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 6, 2),
(3, 7, 2),
(4, 8, 2),
(5, 9, 2),
(6, 10, 2),
(7, 11, 2),
(8, 12, 2),
(9, 13, 2),
(10, 14, 2),
(11, 15, 2),
(12, 16, 2),
(13, 17, 2),
(14, 18, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_request`
--

CREATE TABLE `user_request` (
  `id` int(8) NOT NULL,
  `uid` int(8) NOT NULL,
  `donationid` int(8) NOT NULL,
  `message` varchar(50) NOT NULL,
  `qty` int(8) NOT NULL DEFAULT '1',
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_request`
--

INSERT INTO `user_request` (`id`, `uid`, `donationid`, `message`, `qty`, `datetime`) VALUES
(1, 2, 2, 'hello pls do', 1, '2017-10-11 21:02:46'),
(2, 4, 14, 'hi how are you ', 1, '2017-10-14 18:29:31'),
(3, 4, 12, 'i want this', 1, '2017-10-16 17:39:44'),
(4, 7, 14, 'helloo', 1, '2017-10-18 18:57:58'),
(5, 1, 3, 'because', 1, '2017-10-18 19:23:14'),
(6, 9, 14, 'I m interested to get this thanks ', 1, '2017-10-19 05:57:20'),
(7, 9, 21, 'i have one bag , but its one month used.', 1, '2017-10-19 07:14:42'),
(8, 2, 20, 'sfasdf  ra af', 1, '2017-10-19 09:19:59'),
(9, 9, 19, 'please take from me', 1, '2017-10-20 16:19:52'),
(10, 10, 21, 'i will give you the bag', 1, '2017-10-20 16:27:34'),
(11, 10, 19, 'de na mla ', 1, '2017-10-20 17:09:52'),
(12, 10, 22, 'i want', 1, '2017-10-20 17:27:29'),
(13, 7, 3, 'i want this thanks buddy', 1, '2017-10-22 20:23:19'),
(14, 10, 1, 'asdasds', 1, '2017-11-29 17:51:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_setting`
--
ALTER TABLE `account_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_enquiry`
--
ALTER TABLE `contact_enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donation_type`
--
ALTER TABLE `donation_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_letter`
--
ALTER TABLE `news_letter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_request`
--
ALTER TABLE `user_request`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_setting`
--
ALTER TABLE `account_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `contact_enquiry`
--
ALTER TABLE `contact_enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `donation_type`
--
ALTER TABLE `donation_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `news_letter`
--
ALTER TABLE `news_letter`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `user_request`
--
ALTER TABLE `user_request`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
