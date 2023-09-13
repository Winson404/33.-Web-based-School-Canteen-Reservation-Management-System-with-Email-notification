-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2023 at 09:03 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `my_template`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

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
(14, 'dsfsd', '2023-08-01', '2023-07-08 07:53 PM');

-- --------------------------------------------------------

--
-- Table structure for table `customization`
--

CREATE TABLE IF NOT EXISTS `customization` (
`customID` int(11) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `status` varchar(150) NOT NULL DEFAULT 'Inactive',
  `date_added` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `customization`
--

INSERT INTO `customization` (`customID`, `picture`, `status`, `date_added`) VALUES
(38, '2.jpg', 'Active', '2023-07-07'),
(39, '14.jpg', 'Inactive', '2023-07-08 09:02 PM'),
(40, '13.jpg', 'Inactive', '2023-07-09 02:48 AM');

-- --------------------------------------------------------

--
-- Table structure for table `log_history`
--

CREATE TABLE IF NOT EXISTS `log_history` (
`log_Id` int(11) NOT NULL,
  `user_Id` int(11) NOT NULL,
  `login_time` varchar(100) NOT NULL,
  `logout_time` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `log_history`
--

INSERT INTO `log_history` (`log_Id`, `user_Id`, `login_time`, `logout_time`) VALUES
(1, 66, '2023-06-07 08:18 PM', ''),
(2, 66, '2023-07-07 01:01 PM', '2023-07-07 02:19:12'),
(3, 67, '2023-07-07 02:19 PM', '2023-07-07 02:23:47'),
(4, 66, '2023-07-07 02:23 PM', ''),
(5, 66, '2023-07-07 02:41 PM', ''),
(6, 66, '2023-07-07 03:12 PM', ''),
(7, 66, '2023-07-07 04:01 PM', ''),
(8, 66, '2023-07-07 04:46 PM', '2023-07-07 04:48:15'),
(9, 66, '2023-07-07 04:48 PM', ''),
(10, 72, '2023-07-07 04:50 PM', '2023-07-07 04:51:03'),
(11, 66, '2023-07-07 05:21 PM', '2023-07-07 05:21:12'),
(12, 66, '2023-07-07 05:23 PM', ''),
(13, 66, '2023-07-07 06:37 PM', ''),
(14, 66, '2023-07-07 07:37 PM', ''),
(15, 66, '2023-07-07 08:23 PM', ''),
(16, 66, '2023-07-07 09:39 PM', ''),
(17, 66, '2023-07-08 01:25 PM', ''),
(18, 66, '2023-07-08 02:11 PM', ''),
(19, 66, '2023-07-08 02:46 PM', ''),
(20, 66, '2023-07-08 07:15 PM', ''),
(21, 66, '2023-07-08 07:50 PM', ''),
(22, 66, '2023-07-08 08:45 PM', ''),
(23, 72, '2023-07-08 09:38 PM', '2023-07-08 09:40:59'),
(24, 72, '2023-07-08 09:41 PM', '2023-07-08 09:41:15'),
(25, 66, '2023-07-08 09:41 PM', '2023-07-08 09:43:02'),
(26, 66, '2023-07-09 12:40 AM', ''),
(27, 66, '2023-07-09 02:07 AM', '2023-07-09 02:20:50'),
(28, 66, '2023-07-09 02:24 AM', '2023-07-09 02:28:27'),
(29, 72, '2023-07-09 02:28 AM', '2023-07-09 02:28:45'),
(30, 66, '2023-07-09 02:28 AM', '2023-07-09 02:35:48'),
(31, 72, '2023-07-09 02:35 AM', '2023-07-09 02:36:25'),
(32, 66, '2023-07-09 02:37 AM', '2023-07-09 02:40:43'),
(33, 66, '2023-07-09 02:45 AM', '2023-07-09 02:49:07'),
(34, 72, '2023-07-09 02:52 AM', '');

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
  `password` varchar(100) NOT NULL,
  `user_type` varchar(50) NOT NULL DEFAULT 'User',
  `verification_code` int(11) NOT NULL,
  `date_registered` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=98 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_Id`, `firstname`, `middlename`, `lastname`, `suffix`, `dob`, `age`, `email`, `contact`, `birthplace`, `gender`, `civilstatus`, `occupation`, `religion`, `house_no`, `street_name`, `purok`, `zone`, `barangay`, `municipality`, `province`, `region`, `image`, `password`, `user_type`, `verification_code`, `date_registered`) VALUES
(66, 'Erwin', 'Cabag', 'Son', '', '1997-09-22', '25 years old', 'admin@gmail.com', '9359428963', 'Poblacion, Medellin, Cebu', 'Male', 'Married', 'Web developer', 'Bible Baptist Church', '1234', 'Sitio Upper Landing', 'Purok San Isidro', 'Ambot', 'Daanlungsod', 'Medellin', 'Cebu', 'VII', '13.jpg', '0192023a7bbd73250516f069df18b500', 'Admin', 374025, '2022-11-25'),
(72, 'Samplefh', 'gfdgfd', 'gdfgd', 'g', '2022-12-21', '5 days old', 'sonerwin12@gmail.com', '9359428963', 'gfdgfdg', 'Male', 'Married', 'gfdgfdgd', 'Buddhist', 'gfdg', 'fdg', 'gdfgdg', 'gfdg', 'dfgd', 'fdgdg', 'fdg', 'dfg', '12.jpg', '0192023a7bbd73250516f069df18b500', 'User', 406722, '2022-12-27'),
(74, 'gfdgfdgdg', 'dfgd', 'gdgdfg', 'dfgdf', '2022-12-15', '1 week old', 'gfdgdg232df@gmail.com', '9359428963', 'gfdg', 'Male', 'Single', 'gfdgdfg', 'Evangelical Christianity', 'gfdgg', 'fdgfdgd', 'gdf', 'gfdgfd', 'gdf', 'gfdgd', 'gdfgd', 'gdf', '14.jpg', '225f667d9243201a6b2b35e008ebe3d3', 'User', 0, '2022-12-27'),
(75, 'Norlyn', 'Son', 'Gelig', '', '2022-12-15', '1 week old', 'Norlgelig16@gmail.com', '9359428963', 'gfdgfd', 'Male', 'Separated', 'gfdgd', 'Evangelical Christianity', 'gfdg', 'dfgdg', 'df', 'gfdg', 'fdgd', 'gfdgdfg', 'Cebu', 'gfd', '17.jpg', '74129ee1fc4edfc41937efbbd6231c42', 'User', 0, '2022-12-27'),
(77, 'First name', 'First name', 'First name', 'First name', '2023-04-04', '1 day old', 'admFirstnamein@gmail.com', '9359428963', 'First name', 'Male', 'Married', 'First name', 'Hindu', 'First name', 'First name', 'First name', 'First name', 'First name', 'First name', 'First name', 'First name', '2.jpg', '20db0bfeecd8fe60533206a2b5e9891a', 'User', 0, '2023-04-05'),
(78, 'First name', 'First name', 'First name', 'First name', '2020-02-04', '3 years old', 'adminFirsdastname@gmail.com', '9359428963', 'First name', 'Male', 'Married', 'First name', 'Islam', 'First name', 'First name', 'First name', 'First name', 'First name', 'First name', 'First name', 'First name', '13.jpg', '1dd42fb217b3ca177ff30a7eca0e55c3', 'User', 0, '2023-04-05'),
(79, 'saro', 'saro', 'saro', '', '2021-02-10', '2 years old', 'sarosaro@gmail.com', '9359428963', 'saro', 'Male', 'Single', 'saro', 'Hindu', 'saro', 'saro', 'saro', 'saro', 'saro', 'saro', 'saro', 'saro', '2.jpg', '10bcd5a88092617e7e0f5536fbe18605', 'User', 0, '2023-07-07'),
(80, 'beatbox', 'beatbox', 'beatbox', '', '2019-01-29', '4 years old', 'beatbox@gmail.com', '9359428963', 'beatbox', 'Female', 'Married', 'beatbox', 'Jehovah''s Witnesses', 'beatboxbeatbox', 'beatbox', 'beatbox', 'beatbox', 'beatbox', 'beatbox', 'beatbox', 'beatbox', '16.jpg', 'db795b4937a87a010706df163c009598', 'User', 0, '2023-07-07'),
(81, 'new rec', 'new rec', 'new rec', '', '2019-01-29', '4 years old', 'Adminnewec@gmail.com', '9359428963', 'new rec', 'Female', 'Single', 'new rec', 'Methodist', 'new rec', 'new rec', 'new rec', 'new rec', 'new recnew rec', 'new rec', 'new rec', 'new rec', '12.jpg', '0337b17d1071ab32dd2fc0b6279a461a', '', 0, '2023-07-07'),
(82, 'newew', 'newew', 'newew', '', '2020-01-28', '3 years old', 'newewnewew@gmail.com', '9359428963', 'newew', 'Female', 'Single', 'newew', 'Methodist', 'newew', 'newew', 'newewnewew', 'newew', 'newew', 'newew', 'newew', 'newew', '17.jpg', 'c434ed0d721d7d8537b182337ca5237e', 'Admin', 0, '2023-07-07'),
(83, 'new rec user', 'new rec user', 'new rec user', '', '2021-03-10', '2 years old', 'adsfsdfdssd112@gmail.com', '9359428963', 'new rec user', 'Female', 'Single', 'new rec user', 'Islam', 'new rec user', 'new rec user', 'new rec user', 'new rec user', 'new rec user', 'new rec user', 'new rec user', 'new rec user', '20.jpg', '390265563df7555836e91e0855880125', '', 0, '2023-07-07'),
(85, 'Sakto', 'Sakto', 'Sakto', '', '2019-02-05', '4 years old', 'Sakto@gmail.com', '9359428963', 'Sakto', 'Male', 'Married', 'Sakto', 'Methodist', 'Sakto', 'Sakto', 'Sakto', 'Sakto', 'Sakto', 'Sakto', 'Sakto', 'Sakto', 'academia.png', '0652dab6b9ee99cc8e42558a116b5136', 'Admin', 0, '2023-07-08'),
(86, 'kuwang', 'kuwang', 'kuwang', '', '2023-07-03', '5 days old', 'kuwang@gmail.com', '9359428963', 'kuwang', 'Female', 'Single', 'kuwang', 'Methodist', 'kuwang', 'kuwang', 'kuwang', 'kuwang', 'kuwang', 'kuwang', 'kuwang', 'kuwang', 'berna.png', 'f7b68ccb10b430abfd206a18c62df47d', 'User', 0, '2023-07-08'),
(87, 'pugsanay', 'pugsanay', 'pugsanay', '', '2021-02-01', '2 years old', 'Adminpugsanay@gmail.com', '9359428963', 'pugsanay', 'Non-Binary', 'Single', 'pugsanay', 'Roman Catholic', 'pugsanay', 'pugsanay', 'pugsanay', 'pugsanay', 'pugsanay', 'pugsanay', 'pugsanay', 'pugsanay', '12.jpg', '5084b91a8ecfd8194132fd911f71efc9', 'User', 0, '2023-07-08'),
(88, 'Justin', 'Justin', 'Justin', '', '2020-02-05', '3 years old', 'AdminJustin@gmail.com', '9359428963', 'Justin', 'Female', 'Married', 'Justin', 'Methodist', 'Justin', 'Justin', 'Justin', 'Justin', 'Justin', 'Justin', 'Justin', 'Justin', 'bulac.png', 'c537caf37888973946bf24eebba4469d', 'User', 0, '0000-00-00'),
(89, 'danielNw', 'danielNw', 'danielNw', '', '2021-03-03', '2 years old', 'danielNw@gmail.com', '9359428963', 'danielNw', 'Female', 'Married', 'danielNw', 'Hindu', 'danielNw', 'danielNw', 'danielNw', 'danielNw', 'danielNw', 'danielNw', 'danielNw', 'danielNw', '16.jpg', 'b7b224d96640c5481a05b24d50ef9e7b', 'User', 0, '0000-00-00'),
(90, 'uhaw', 'uhaw', 'uhaw', '', '2023-06-26', '1 week old', 'Adminuhaw@gmail.com', '9359428963', 'uhaw', 'Non-Binary', 'Married', 'uhaw', 'Islam', 'uhaw', 'uhaw', 'uhaw', 'uhaw', 'uhaw', 'uhaw', 'uhaw', 'uhaw', 'bsu.png', '9b71cc947b7f55736edd86453b91f98e', 'User', 0, '2023-07-09'),
(91, 'nagwagi', 'nagwagi', 'nagwagi', 'nagwagi', '2020-07-10', '2 years old', 'nagwagi@gmail.com', '9359428963', 'nagwagi', 'Male', 'Married', 'nagwagi', 'United Church of Christ in the Philippines', 'nagwagi', 'nnagwagiagwagi', 'nagwagi', 'nagwagi', 'nagwagi', 'nagwagi', 'nagwagi', 'nagwagi', 'colm.png', '6cd649c9cc8b3dd90477d814487b284e', 'Admin', 0, '2023-07-09'),
(92, 'Kanlungan', 'KanlunganKanlungan', 'Kanlungan', 'Kanlungan', '2023-06-27', '1 week old', 'AdminKanlungan@gmail.com', '9359428963', 'Kanlungan', 'Female', 'Married', 'Kanlungan', 'Buddhist', 'Kanlungan', 'Kanlungan', 'Kanlungan', 'Kanlungan', 'Kanlungan', 'Kanlungan', 'Kanlungan', 'Kanlungan', 'mnhs.png', '428bda02b604710d31585f16b420998f', 'Staff', 0, '2023-07-09'),
(93, 'gusto', 'gusto', 'gusto', 'gusto', '2021-03-03', '2 years old', 'gustogusto@gmail.com', '9359428963', 'gusto', 'Non-Binary', 'Widow/ER', 'gusto', 'Jehovah''s Witnesses', 'gusto', 'gusto', 'gusto', 'gusto', 'gusto', 'gusto', 'gusto', 'gusto', 'laco.png', 'd64b94e8f8798a58878994b070f4e015', 'Admin', 0, '2023-07-09'),
(94, 'living', 'living', 'living', 'living', '2020-03-04', '3 years old', 'Adminliving@gmail.com', '9359428963', 'living', 'Non-Binary', 'Married', 'living', 'Evangelical Christianity', 'livingliving', 'livingliving', '', 'living', 'living', 'living', 'living', 'living', 'liceo.png', 'b4d21495ca41840e09f65cf6a0e7ee6c', '../images-users/', 0, '2023-07-09'),
(95, 'natog', 'natog', 'natog', '', '2022-03-02', '1 year old', 'Adminatogn@gmail.com', '9359428963', 'natog', 'Female', 'Widow/ER', 'natog', 'Hindu', 'natog', 'natog', 'natog', 'natog', 'natog', 'natog', 'natog', 'natog', 'marys.png', '05e7fb099e954e6be54419a07239eb3d', 'Staff', 0, '2023-07-09'),
(96, 'fdsfsfsfdsfdsf', 'dsfds', 'fdsfdsffdsfdsfs', '', '2023-07-05', '3 days old', 'Adminfdsfsfsfdsfdsf@gmail.com', '9359428963', 'fdsfsfsfdsfdsf', 'Female', 'Single', 'fdsfsfsfdsfdsf', 'Methodist', 'fdsfsfsfdsfdsf', 'fdsfsfsfdsfdsf', 'fdsfsfsfdsfdsf', 'fdsfsfsfdsfdsf', 'fdsfsfsfdsfdsf', 'fdsfsfsfdsfdsf', 'fdsfsfsfdsfdsf', 'fdsfsfsfdsfdsf', 'jocelyn.png', '7ed7a08eef00e53df44d759e0cefb8c6', 'User', 0, '2023-07-09'),
(97, 'hahaaheheheh', 'hahaaheheheh', 'hahaaheheheh', '', '2023-06-26', '1 week old', 'hahaaheheheh@gmail.com', '9359428963', 'hahaaheheheh', 'Female', 'Married', 'hahaaheheheh', 'Seventh-day Adventism', 'hahaaheheheh', 'hahaaheheheh', 'hahaaheheheh', 'hahaaheheheh', 'hahaaheheheh', 'hahaaheheheh', 'hahaaheheheh', 'hahaaheheheh', 'martin.png', '1ea95b849d9732bf16f5703561488b60', 'User', 0, '2023-07-09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
 ADD PRIMARY KEY (`actId`);

--
-- Indexes for table `customization`
--
ALTER TABLE `customization`
 ADD PRIMARY KEY (`customID`);

--
-- Indexes for table `log_history`
--
ALTER TABLE `log_history`
 ADD PRIMARY KEY (`log_Id`);

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
MODIFY `actId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `customization`
--
ALTER TABLE `customization`
MODIFY `customID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `log_history`
--
ALTER TABLE `log_history`
MODIFY `log_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=98;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
