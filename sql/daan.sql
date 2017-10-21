-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 22, 2017 at 04:28 AM
-- Server version: 5.7.19-0ubuntu0.16.04.1
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
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `id` int(8) NOT NULL,
  `uid` int(8) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` int(15) NOT NULL COMMENT 'We need to save id from donation_type',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '0 for donate and 1 for request',
  `address` varchar(50) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `pincode` int(8) NOT NULL,
  `qty` int(8) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `message` varchar(50) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`id`, `uid`, `name`, `type`, `status`, `address`, `city`, `state`, `pincode`, `qty`, `slug`, `message`, `datetime`) VALUES
(1, 2, 'maths book', 1, 0, 'Flat No.11,Sai Ratna Apt,Gopal Nagar,Amrutdham,Nas', '1', '1', 422003, 1, 'maths_book', 'hard subject', '2017-10-11 18:00:02'),
(2, 2, 'i want handbook', 1, 1, 'Flat No.11,Sai Ratna Apt,Gopal Nagar,Amrutdham,Nas', '2', '2', 422003, 2, 'i_want_handbook', 'i want this', '2017-10-11 18:05:11'),
(3, 1, 'pencil', 1, 0, 'hello', '1', '1', 422012, 1, 'pencil', 'hello', '2017-10-11 18:52:33'),
(4, 2, 'formal pant', 2, 0, 'Flat No.11,Sai Ratna Apt,Gopal Nagar,Amrutdham,Nas', '1', '1', 422003, 3, 'formal_pant', 'they are good', '2017-10-12 18:32:22'),
(12, 2, 'i want to donate my ', 6, 0, 'Flat No.11,Sai Ratna Apt,Gopal Nagar,Amrutdham,Nas', '1', '1', 422003, 1, 'i_want_to_donate_my', 'white color', '2017-10-14 18:17:01'),
(13, 4, 'i want to donate bag', 4, 0, 'gyatri duplex room no-12', '1', '1', 422012, 1, 'i_want_to_donate_bag', 'hello, hello', '2017-10-14 18:19:02'),
(14, 6, 'Tiger Story books', 1, 0, 'satpur', '1', '1', 422012, 10, 'tiger_story_books', 'We have all the new books some of them are purchas', '2017-10-14 18:22:24'),
(18, 2, 'i wan to donate my p', 5, 0, 'Flat No.11,Sai Ratna Apt,Gopal Nagar,Amrutdham,Nas', '1', '1', 422003, 1, 'i_wan_to_donate_my_p', 'samsung guru', '2017-10-19 05:39:49'),
(19, 2, 'i wan to donate my s', 2, 0, 'Flat No.11,Sai Ratna Apt,Gopal Nagar,Amrutdham,Nas', '1', '1', 422003, 1, 'i_wan_to_donate_my_s', 'white shirt', '2017-10-19 05:43:09'),
(20, 9, 'shirt', 2, 0, 'ashok nagar', '1', '1', 422012, 1, 'shirt', 'adasd as asds asd asdas ', '2017-10-19 06:03:28'),
(21, 2, 'i want school bag', 4, 1, 'Flat No.11,Sai Ratna Apt,Gopal Nagar,Amrutdham,Nas', '1', '1', 422003, 1, 'i_want_school_bag', 'school bag', '2017-10-19 07:11:56'),
(22, 2, 'besheet', 2, 0, 'Flat No.11,Sai Ratna Apt,Gopal Nagar,Amrutdham,Nas', '1', '1', 422003, 1, 'besheet', 'Red bedsheet', '2017-10-20 17:25:42');

-- --------------------------------------------------------

--
-- Table structure for table `donation_type`
--

CREATE TABLE `donation_type` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(150) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donation_type`
--

INSERT INTO `donation_type` (`id`, `name`, `image`, `datetime`) VALUES
(1, 'Books', 'donation_type/books.jpg', '2017-10-11 17:58:50'),
(2, 'Cloths', 'donation_type/cloths.jpg', '2017-10-11 17:58:50'),
(3, 'Notebooks', 'donation_type/notebooks.jpg', '2017-10-14 16:02:27'),
(4, 'Bags', 'donation_type/bags.jpeg', '2017-10-14 16:35:38'),
(5, 'Electric Equipment', 'donation_type/electric.jpg', '2017-10-14 16:35:38'),
(6, 'Footwear', 'donation_type/footwear.jpg', '2017-10-14 16:36:37'),
(7, 'Sport Equipment', 'donation_type/sports.jpg', '2017-10-14 16:36:37'),
(8, 'Stationary', 'donation_type/stationary.jpg', '2017-10-14 16:37:32'),
(9, 'Toys', 'donation_type/toys.jpg', '2017-10-14 16:37:32'),
(10, 'Makeup Equipment', 'donation_type/makeup.jpg', '2017-10-14 16:43:09'),
(11, 'Magazine', 'donation_type/magazine.jpg', '2017-10-14 17:30:24'),
(12, 'Kitchen Ware', 'donation_type/kitchenware.jpg', '2017-10-14 17:40:20');

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
(1, 2, 1, 1, 'thanks for this book', '2017-10-21 19:41:34');

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
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `pro_img`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', 'assets/img/profile.png', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1508608757, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(2, '192.168.225.47', 'shkasd1992@gmail.com', '$2y$08$xuuvmADR9jshQzC/.B8XDOnkArBlLd2EhoqLBWZOFd/7I92RcHTja', 'assets/img/profile.png', NULL, 'shkasd1992@gmail.com', NULL, NULL, NULL, NULL, 1508608828, 1508626230, 1, 'Rahul', 'Pawar', 'daan', '7709817985'),
(4, '192.168.225.47', 'rahulp1492@yahoo.com', '$2y$08$8qgdWEbQhmTyfsfNM4IeN.nRzFlHUssH/9J.nxl8EvL4YlPyHRj9y', 'assets/img/profile.png', NULL, 'rahulp1492@yahoo.com', NULL, 'UnCjuwT4Low6eY3cNQFtmee4c89a5071205c8d11', 1508619671, NULL, 1508608849, 1508616907, 1, 'Praful', 'pawar', 'dann', '7709817985');

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
(2, 1, 2),
(3, 3, 2),
(4, 4, 2);

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
(1, 1, 2, 'hello pls do', 1, '2017-10-11 21:02:46'),
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
(12, 10, 22, 'i want', 1, '2017-10-20 17:27:29');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
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
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `news_letter`
--
ALTER TABLE `news_letter`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;
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
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_request`
--
ALTER TABLE `user_request`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
