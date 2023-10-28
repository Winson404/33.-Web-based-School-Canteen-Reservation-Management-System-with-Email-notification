-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2023 at 04:34 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `reservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE IF NOT EXISTS `announcement` (
`actId` int(11) NOT NULL,
  `actName` text NOT NULL,
  `actDate` varchar(20) NOT NULL,
  `date_added` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`actId`, `actName`, `actDate`, `date_added`) VALUES
(2, 'Activity 5', '2022-12-23', ''),
(3, 'Activity 3', '2022-12-10', '2022-12-11'),
(4, 'Activity 2', '2022-12-11', '2022-12-11'),
(5, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rem, ipsum delectus voluptatum? Molestias aut inventore eaque, maxime numquam dignissimos asperiores, voluptatibus consectetur distinctio excepturi odit architecto, saepe enim sunt, molestiae.', '2022-12-11', '2022-12-11'),
(6, 'sample', '2022-12-27', '2022-12-27'),
(8, 'gfdgfd', '2023-01-06', '2022-12-27'),
(9, 'Announcement sample', '2023-01-09', '2023-01-16'),
(10, 'SAMple', '2023-01-24', '2023-01-16'),
(11, 'yhfng', '2023-02-13', '2023-02-05'),
(12, 'smaple', '2023-07-28', '2023-07-08'),
(13, 'sadsadsa', '2023-07-29', '2023-07-08 07:51 PM'),
(14, 'samples', '2023-09-07', '2023-09-20 08:26 PM'),
(16, 'dsadsadasdsa', '2023-11-16', '2023-10-24 15:58:49'),
(17, 'akoa kinis', '2023-12-09', '2023-10-24 15:59:24');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`cat_Id` int(11) NOT NULL,
  `catName` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_Id`, `catName`, `description`, `date_added`) VALUES
(1, 'Food 2', 'Food 2 Description', '2023-10-25 01:36:42'),
(3, 'Food 1', 'Food 1 Description', '2023-10-25 01:57:43'),
(4, 'Food 3', 'Food 3 Description', '2023-10-25 01:58:03'),
(5, 'Food 4', 'Food 4 Description', '2023-10-25 01:58:12'),
(6, 'Food 5', 'Food 5 Description', '2023-10-25 01:58:22');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
`cust_Id` int(11) NOT NULL,
  `user_type` varchar(50) NOT NULL DEFAULT 'User',
  `yr_section` varchar(100) NOT NULL,
  `teacherPosition` varchar(50) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `suffix` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `age` varchar(100) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `civilstatus` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `verification_code` int(11) NOT NULL,
  `date_registered` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=88 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_Id`, `user_type`, `yr_section`, `teacherPosition`, `firstname`, `middlename`, `lastname`, `suffix`, `dob`, `age`, `gender`, `civilstatus`, `email`, `contact`, `address`, `password`, `image`, `verification_code`, `date_registered`) VALUES
(84, 'Student', '2020-01-28', '3 years old', 'Customer', 'Customer', 'Customer', 'Customer', '2018-01-30', '5 years old', 'Male', 'Single', 'customer@gmail.com', '9359428963', 'Customer', '7488e331b8b64e5794da3fa4eb10ad5d', 'assumpta.png', 276702, '2023-10-25 00:00:00'),
(85, 'Teacher', '', 'Teacher', 'Teacher', 'Teacher', 'Teacher', '', '2020-01-29', '3 years old', 'Male', 'Single', 'customer2@gmail.com', '9359428963', 'Teacher', '7488e331b8b64e5794da3fa4eb10ad5d', 'aisat.png', 0, '2023-10-27 22:38:05'),
(86, 'Student', 'Smaple', '', 'Digong', 'Digong', 'DigongDigong', 'Digong', '2020-01-28', '3 years old', 'Male', 'Married', 'adminDigong@gmail.com', '9359428963', 'Digong', 'fc79c7fecc271d0cd3b6ae2b44ec92d5', 'aics.jpg', 0, '2023-10-28 13:56:22'),
(87, 'Student', 'dsads', '', 'adsa', 'dsadsa', 'dsad', 'dsadsad', '2020-03-04', '3 years old', 'Male', 'Married', 'addsa432min@gmail.com', '9359428963', 'dsadsadsad', 'c162de19c4c3731ca3428769d0cd593d', 'berna.png', 0, '2023-10-28 22:13:23');

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE IF NOT EXISTS `income` (
`Id` int(11) NOT NULL,
  `reserve_Id` int(11) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`Id`, `reserve_Id`, `date_added`) VALUES
(1, 15, '2023-10-28 01:39:31'),
(2, 16, '2023-10-28 01:40:06'),
(3, 11, '2023-10-28 13:49:04'),
(4, 24, '2023-10-28 13:49:45'),
(5, 11, '2023-10-28 13:50:30');

-- --------------------------------------------------------

--
-- Table structure for table `log_history`
--

CREATE TABLE IF NOT EXISTS `log_history` (
`log_Id` int(11) NOT NULL,
  `user_Id` int(11) NOT NULL,
  `login_time` varchar(100) NOT NULL,
  `logout_time` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `log_history`
--

INSERT INTO `log_history` (`log_Id`, `user_Id`, `login_time`, `logout_time`) VALUES
(1, 66, '2023-10-10 06:25 PM', '2023-10-10 06:26:57'),
(2, 66, '2023-10-10 06:27 PM', ''),
(3, 66, '2023-10-10 06:47 PM', ''),
(4, 66, '2023-10-10 07:10 PM', ''),
(5, 66, '2023-10-10 09:44 PM', ''),
(6, 66, '2023-10-10 10:21 PM', '2023-10-10 10:25:25'),
(7, 66, '2023-10-10 10:29 PM', '2023-10-10 10:29:29'),
(8, 66, '2023-10-10 11:00 PM', '2023-10-10 11:00:42'),
(9, 66, '2023-10-10 11:02 PM', ''),
(10, 66, '2023-10-13 09:21 PM', ''),
(11, 66, '2023-10-22 03:05 AM', ''),
(12, 66, '2023-10-22 05:29 PM', '2023-10-22 07:20:55'),
(13, 66, '2023-10-22 07:10 PM', ''),
(14, 72, '2023-10-22 07:21 PM', '2023-10-22 07:28:42'),
(15, 66, '2023-10-22 07:29 PM', '2023-10-22 07:37:23'),
(16, 66, '2023-10-22 07:55 PM', '2023-10-22 07:56:08'),
(17, 66, '2023-10-22 10:46 PM', ''),
(18, 66, '2023-10-24 02:06 AM', ''),
(19, 66, '2023-10-24 02:14 AM', ''),
(20, 66, '2023-10-24 03:46 AM', ''),
(21, 66, '2023-10-24 10:33 AM', ''),
(22, 66, '2023-10-24 11:07 AM', ''),
(23, 66, '2023-10-24 11:44 AM', ''),
(24, 66, '2023-10-24 02:16 PM', ''),
(25, 66, '2023-10-24 03:19 PM', ''),
(26, 66, '2023-10-24 04:45 PM', ''),
(27, 66, '2023-10-24 05:03 PM', ''),
(28, 79, '2023-10-24 05:34 PM', ''),
(29, 66, '2023-10-24 05:37 PM', ''),
(30, 79, '2023-10-24 05:37 PM', ''),
(31, 66, '2023-10-25 12:40 PM', ''),
(32, 66, '2023-10-25 01:48 PM', ''),
(33, 66, '2023-10-25 02:15 PM', ''),
(34, 66, '2023-10-25 02:49 PM', ''),
(35, 66, '2023-10-25 06:28 PM', ''),
(36, 66, '2023-10-25 07:41 PM', ''),
(37, 66, '2023-10-25 07:46 PM', ''),
(38, 72, '2023-10-25 08:24 PM', ''),
(39, 66, '2023-10-25 08:33 PM', ''),
(40, 66, '2023-10-27 06:04 PM', ''),
(41, 66, '2023-10-27 10:37 PM', ''),
(42, 66, '2023-10-27 10:39 PM', ''),
(43, 66, '2023-10-28 12:55 AM', ''),
(44, 66, '2023-10-28 01:32 PM', ''),
(45, 66, '2023-10-28 02:07 PM', ''),
(46, 66, '2023-10-28 09:22 PM', ''),
(47, 66, '2023-10-28 09:33 PM', ''),
(48, 66, '2023-10-28 10:10 PM', '');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
`prod_Id` int(11) NOT NULL,
  `cat_Id` int(11) NOT NULL,
  `prod_name` varchar(100) NOT NULL,
  `prod_description` text NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `ingredients` text NOT NULL,
  `nutritional_info` text NOT NULL,
  `preparation_time` varchar(50) NOT NULL,
  `prod_image` varchar(255) NOT NULL,
  `prod_status` int(11) NOT NULL DEFAULT '1' COMMENT '0=Unavailable, 1=Available',
  `date_added` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_Id`, `cat_Id`, `prod_name`, `prod_description`, `price`, `stock`, `ingredients`, `nutritional_info`, `preparation_time`, `prod_image`, `prod_status`, `date_added`) VALUES
(1, 1, 'Food 2', 'Samples', 22, 22, 'Samples', 'Samples', 'Samples', 'istockphoto-450262987-612x612.jpg', 1, '2023-10-25 03:02:53'),
(2, 3, 'Food 1', 'fdsf', 2, 2, 'dsa', 'dsa', 'dsa', 'istockphoto-470860695-612x612.jpg', 1, '2023-10-25 19:44:35'),
(3, 4, 'Food 3', 'dsa', 2, 2, 'dsf', 'fdsf', 'fds', 'istockphoto-545356714-612x612.jpg', 1, '2023-10-25 19:44:52'),
(4, 5, 'Food 4', 'dsa', 2, 2, 'dsad', 'sadsa', 'dsa', 'istockphoto-620744590-612x612.jpg', 1, '2023-10-25 19:45:06'),
(5, 6, 'Food 5', 'Food 5', 2, 2, 'Food 5', 'Food 5', 'Food 5', 'istockphoto-638742100-612x612.jpg', 1, '2023-10-25 19:45:22');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
`reserve_Id` int(11) NOT NULL,
  `cust_Id` int(11) NOT NULL,
  `prod_Id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0=Pending, 1=Approved, 2=Delivered, 3=Unavailable',
  `date_reserved` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reserve_Id`, `cust_Id`, `prod_Id`, `qty`, `status`, `date_reserved`) VALUES
(25, 84, 1, 6, 3, '2023-10-28 14:00:53'),
(26, 84, 2, 4, 0, '2023-10-28 14:00:57'),
(27, 84, 3, 5, 0, '2023-10-28 14:01:01'),
(28, 84, 1, 5, 0, '2023-10-28 14:02:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_Id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `suffix` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `age` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `birthplace` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `civilstatus` varchar(50) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `house_no` varchar(255) NOT NULL,
  `street_name` varchar(255) NOT NULL,
  `purok` varchar(255) NOT NULL,
  `zone` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `municipality` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(50) NOT NULL DEFAULT 'User',
  `verification_code` int(11) NOT NULL,
  `date_registered` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=84 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_Id`, `firstname`, `middlename`, `lastname`, `suffix`, `dob`, `age`, `email`, `contact`, `birthplace`, `gender`, `civilstatus`, `occupation`, `religion`, `house_no`, `street_name`, `purok`, `zone`, `barangay`, `municipality`, `province`, `region`, `image`, `password`, `user_type`, `verification_code`, `date_registered`) VALUES
(66, 'Admins', 'Admin', 'Admin', 'Admin', '2023-10-11', '1 week old', 'admin@gmail.com', '9359428963', 'Female', 'Male', 'Single', 'Admin', 'United Church of Christ in the Philippines', 'dsa', 'Admin', 'Admin', 'dsa', 'Admin', 'Admin', 'Admin', 'Admin', 'aics.jpg', '0192023a7bbd73250516f069df18b500', 'Admin', 374025, '2022-11-25'),
(72, 'Userds', 'Users', 'User', 'Jr', '2022-12-21', '5 days old', 'user123@gmail.com', '9359428963', 'gfdgfdg', 'Male', 'Married', 'gfdgfdgd', 'Buddhist', 'gfdg', 'fdg', 'gdfgdg', 'gfdg', 'dfgd', 'fdgdg', 'fdg', 'dfg', 'ama.png', '0192023a7bbd73250516f069df18b500', 'Staff', 295016, '2022-12-27'),
(73, 'Sampleddd', 'Sample', 'Sample', '', '2023-10-02', '1 week old', 'sonerwin12@gmail.com', '9359428963', 'Sample', 'Female', 'Single', 'Sample', 'Methodist', 'Sample', 'Sample', 'Sample', 'Sample', 'Sample', 'Sample', 'Sample', 'Sample', '', '0192023a7bbd73250516f069df18b500', 'Admin', 276649, '2023-10-10'),
(79, 'Samples', 'Samples', 'Samples', 'Samples', '2022-03-02', '1 year old', 'admSampleinsss@gmail.com', '9359428962', 'Samples', 'Female', 'Single', 'Samples', 'Hindu', 'Samples', 'Sampless', 'Samples', 'Samples', 'Samples', 'Samples', 'Samples', 'Samples', 'barna.png', 'a2dc1592be8cd31d4395d016917d941c', 'User', 0, '2023-10-24'),
(80, 'pass', 'Pass', 'Pass', '', '2023-10-05', '2 weeks old', 'staff2@gmail.com', '9359428963', 'Pass', 'Male', 'Single', 'Pass', 'Buddhist', 'Pass', 'Pass', 'Pass', 'Pass', 'Pass', 'Pass', 'Pass', 'Pass', '4.jpg', '$2y$10$c6aPaM3e4xYmjogT.5/JzeSWNZIwPSu.0pVQ3cuneDJYmfVkPCdfy', 'Staff', 0, '2023-10-24'),
(81, 'New User', 'New User', 'New User', 'New User', '2023-10-05', '2 weeks old', 'admiNewUsern@gmail.com', '9359428963', 'New User', 'Male', 'Single', 'New User', 'Iglesia Ni Cristo', 'New User', 'New User', 'New User', 'New User', 'New User', 'New User', 'New User', 'New User', '1.jpg', 'clement.png', 'User', 0, '2023-10-24'),
(83, 'NewAdmin', 'NewAdminNewAdmin', 'NewAdmin', 'NewAdmin', '2023-10-10', '2 weeks old', 'adNewAdminmin@gmail.com', '9359428963', 'NewAdmin', 'Male', 'Married', 'NewAdmin', 'Jehovah''s Witnesses', 'NewAdmin', 'NewAdminNewAdmin', 'NewAdmin', 'NewAdmin', 'NewAdminNewAdmin', 'NewAdmin', 'NewAdminNewAdmin', 'NewAdmin', 'atec.png', '$2y$10$x0N5Mqk7grE.KgkmHC32COLPBjc9vmwycVD.LZ732pz1IeM815S46', 'Admin', 0, '2023-10-24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
 ADD PRIMARY KEY (`actId`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`cat_Id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
 ADD PRIMARY KEY (`cust_Id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
 ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `log_history`
--
ALTER TABLE `log_history`
 ADD PRIMARY KEY (`log_Id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
 ADD PRIMARY KEY (`prod_Id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
 ADD PRIMARY KEY (`reserve_Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
MODIFY `actId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `cat_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
MODIFY `cust_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=88;
--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `log_history`
--
ALTER TABLE `log_history`
MODIFY `log_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
MODIFY `prod_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
MODIFY `reserve_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=84;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
