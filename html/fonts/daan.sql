-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2017 at 03:59 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

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
-- Table structure for table `doantion_type`
--

CREATE TABLE `doantion_type` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `image` int(11) NOT NULL,
  `datetime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `id` int(8) NOT NULL,
  `uid` int(8) NOT NULL,
  `name` varchar(20) NOT NULL,
  `type` varchar(15) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '0 for donate and 1 for request',
  `address` varchar(50) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `pincode` int(8) NOT NULL,
  `qty` int(8) NOT NULL,
  `message` varchar(50) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`id`, `uid`, `name`, `type`, `status`, `address`, `city`, `state`, `pincode`, `qty`, `message`, `datetime`) VALUES
(1, 1, 'jeans', 'Clothes', 0, '1', 'Pune', 'Delhi', 3, 3, '', '2017-10-02 10:08:28'),
(2, 1, 'jeans', 'Clothes', 1, '1', 'Pune', 'Delhi', 3, 3, '', '2017-10-02 10:08:46'),
(3, 4, 'jeans', 'Clothes', 0, '1', 'Pune', 'Delhi', 3, 3, '', '2017-10-02 10:08:47'),
(4, 1, 'jeans', 'Clothes', 1, '1', 'Pune', 'Delhi', 3, 3, '', '2017-10-02 10:08:47'),
(5, 4, 'jeans', 'Clothes', 0, '1', 'Pune', 'Delhi', 3, 3, '', '2017-10-02 10:08:48'),
(6, 1, 'jeans', 'Clothes', 1, '1', 'Pune', 'Delhi', 3, 3, '', '2017-10-02 10:08:48'),
(7, 4, 'jeans', 'Clothes', 0, '1', 'Pune', 'Delhi', 3, 3, '', '2017-10-02 10:08:49'),
(8, 1, 'jeans', 'Clothes', 1, '1', 'Pune', 'Delhi', 3, 3, '', '2017-10-02 10:08:49'),
(9, 4, 'jeans', 'Clothes', 0, '1', 'Pune', 'Delhi', 3, 3, '', '2017-10-02 10:08:49'),
(10, 1, 'jeans', 'Clothes', 1, '1', 'Pune', 'Delhi', 3, 3, '', '2017-10-02 10:08:50'),
(11, 4, 'jeans', 'Clothes', 0, '1', 'Pune', 'Delhi', 3, 3, '', '2017-10-02 10:08:50'),
(12, 1, 'jeans', 'Clothes', 0, '1', 'Pune', 'Delhi', 3, 3, '', '2017-10-02 10:08:51');

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

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `uid`, `fid`, `message`, `datetime`) VALUES
(1, 1, 2, 'fake', '2017-10-02 07:47:27'),
(2, 1, 2, 'fake', '2017-10-02 07:47:39'),
(3, 1, 2, 'fake', '2017-10-02 07:47:45');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(8) NOT NULL,
  `donationid` int(8) NOT NULL,
  `uid` int(8) NOT NULL,
  `message` varchar(50) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `donationid`, `uid`, `message`, `datetime`) VALUES
(1, 2, 1, 'I want shoes', '2017-10-04 17:28:40'),
(2, 7, 4, 'i want juice', '2017-10-04 17:28:40'),
(3, 8, 4, 'i want php book', '2017-10-04 17:29:18'),
(4, 5, 1, 'i want advice', '2017-10-04 17:29:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(8) NOT NULL,
  `name` varchar(18) CHARACTER SET utf8 NOT NULL,
  `email` varchar(30) NOT NULL,
  `verify` int(11) NOT NULL DEFAULT '0',
  `pro_img` varchar(100) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `password` varchar(15) NOT NULL,
  `street` varchar(50) NOT NULL,
  `city` varchar(15) NOT NULL,
  `state` varchar(15) NOT NULL,
  `pincode` int(8) NOT NULL,
  `about_me` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `verify`, `pro_img`, `contact`, `password`, `street`, `city`, `state`, `pincode`, `about_me`, `date`) VALUES
(1, 'vaibhav', 'vaibhav.mandlik1@gmail.com', 0, 'uploads/9168082188.jpg', '9168082188', 'vaibhav', 'Flat No.11,Sai Ratna Apt,Gopal Nagar,Amrutdham,Pan', 'Nashik', 'Maharshtra', 422003, NULL, '2017-10-01 07:40:54'),
(4, 'avinash', 'singharyan015@gmail.com', 0, 'default_pro.jpg', '8857053269', 'avinash', '1', 'Nashik', 'Maharshtra', 1, NULL, '2017-10-02 10:04:40');

-- --------------------------------------------------------

--
-- Table structure for table `user_request`
--

CREATE TABLE `user_request` (
  `id` int(8) NOT NULL,
  `uid` int(8) NOT NULL,
  `donationid` int(8) NOT NULL,
  `message` varchar(50) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contact` (`contact`),
  ADD UNIQUE KEY `email` (`email`);

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
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_request`
--
ALTER TABLE `user_request`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
