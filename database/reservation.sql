-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2023 at 12:48 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_Id`, `catName`, `description`, `date_added`) VALUES
(1, 'Food 2', 'Food 2 Description', '2023-10-25 01:36:42'),
(3, 'Food 1', 'Food 1 Description', '2023-10-25 01:57:43'),
(4, 'Food 3', 'Food 3 Description', '2023-10-25 01:58:03'),
(5, 'Food 4', 'Food 4 Description', '2023-10-25 01:58:12'),
(6, 'Food 5', 'Food 5 Description', '2023-10-25 01:58:22'),
(7, 'Cat 1', 'Cat food 1', '2023-11-05 12:35:27');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=86 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_Id`, `user_type`, `yr_section`, `teacherPosition`, `firstname`, `middlename`, `lastname`, `suffix`, `dob`, `age`, `gender`, `civilstatus`, `email`, `contact`, `address`, `password`, `image`, `verification_code`, `date_registered`) VALUES
(85, 'Teacher', '', 'Teacher', 'Teacher', 'Teacher', 'Teacher', '', '2020-01-29', '3 years old', 'Male', 'Single', 'customer2@gmail.com', '9359428963', 'Teacher', '0192023a7bbd73250516f069df18b500', 'aisat.png', 0, '2023-10-27 22:38:05');

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE IF NOT EXISTS `income` (
`Id` int(11) NOT NULL,
  `reserve_Id` int(11) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`Id`, `reserve_Id`, `date_added`) VALUES
(1, 15, '2023-10-28 01:39:31'),
(2, 16, '2023-10-28 01:40:06'),
(3, 11, '2023-10-28 13:49:04'),
(4, 24, '2023-10-28 13:49:45'),
(5, 11, '2023-10-28 13:50:30'),
(6, 32, '2023-11-05 12:45:39'),
(7, 1, '2023-11-06 21:07:59'),
(8, 2, '2023-11-06 21:10:38');

-- --------------------------------------------------------

--
-- Table structure for table `log_history`
--

CREATE TABLE IF NOT EXISTS `log_history` (
`log_Id` int(11) NOT NULL,
  `user_Id` int(11) NOT NULL,
  `login_time` varchar(100) NOT NULL,
  `logout_time` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

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
(48, 66, '2023-10-28 10:10 PM', ''),
(49, 66, '2023-11-04 12:24 PM', ''),
(50, 66, '2023-11-04 12:36 PM', ''),
(51, 66, '2023-11-05 12:17 PM', ''),
(52, 66, '2023-11-05 12:25 PM', ''),
(53, 66, '2023-11-06 08:56 PM', ''),
(54, 66, '2023-11-06 09:06 PM', ''),
(55, 66, '2023-11-06 09:23 PM', ''),
(56, 66, '2023-11-07 10:20 PM', ''),
(57, 66, '2023-11-07 10:30 PM', ''),
(58, 66, '2023-11-10 03:41 PM', ''),
(59, 66, '2023-11-10 04:39 PM', ''),
(60, 66, '2023-11-10 04:42 PM', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_Id`, `cat_Id`, `prod_name`, `prod_description`, `price`, `stock`, `ingredients`, `nutritional_info`, `preparation_time`, `prod_image`, `prod_status`, `date_added`) VALUES
(6, 3, 'Spinach Sardines', '1 Bulb Garlic\r\n1 Bundle Spinach\r\n1 Can Small Sardines\r\nSalt And Pepper To Taste', 50, 3, '1 bulb Garlic\r\n1 bundle Spinach\r\n1 can small sardines\r\nSalt and Pepper to taste', '', '1hr', '213644513_189111556557732_1378771322819495517_n.jpg', 1, '2023-11-10 15:44:36'),
(7, 7, 'Chopseuy', 'N/A', 50, 5, '12 pieces jumbo shrimp head and shell removed\r\n10 pcs baguio beans\r\n1 small zucchini\r\n1 small red bell pepper sliced small rectangular pieces\r\n2 cups chopped cabbage\r\n1 1/2 cup cauliflower florets\r\n1 cup broccoli florets optional\r\n1 medium yellow onion sliced\r\n2 teaspoons cornstarch\r\n3 tablespoons cooking oil\r\nSalt and ground black pepper to taste\r\nQuail eggs (optional)', 'N/A', '2hrs', '209715195_189112406557647_6874310381790233546_n.jpg', 1, '2023-11-10 15:46:17'),
(8, 7, 'Tortang Talong', 'N/A', 25, 5, 'Eggs\r\nTalong', 'N/A', '30 mins', '211866466_189111713224383_6577776221255867394_n (2).jpg', 1, '2023-11-10 15:51:55'),
(9, 7, 'Corned Beef with Patatas', 'N/A', 20, 5, 'Corned Beef\r\nPotatoes\r\nGarlic\r\nSalt and Pepper to taste', 'N/A', '30 Mins', '214026157_189112363224318_435947499288035058_n.jpg', 1, '2023-11-10 15:52:58'),
(10, 7, 'Ginisang Ampalaya', 'N/A', 20, 5, 'Ampalaya\r\nTomatoes\r\nGarlic\r\nOnions\r\nEggsh\r\nSalt and Pepper to taste', 'N/A', '1hr', '211099022_189112319890989_4861144102522815171_n.jpg', 1, '2023-11-10 15:54:00'),
(11, 7, 'Ginisang Munggo with Bagoong', 'N/A', 15, 5, 'N/A', 'N/A', '30 Mins', '211395151_189112709890950_5277170457850420882_n.jpg', 1, '2023-11-10 15:55:04'),
(12, 7, 'Oil free Roasted Vegetables', 'N/A', 50, 5, 'Broccoli\r\nCarrots\r\nPotatoes\r\nTomatoes\r\nBell Pepper\r\nZucchini\r\nSalt and Pepper to taste', 'N/A', '45 mins', '210089403_189111743224380_6521695961940763668_n.jpg', 1, '2023-11-10 15:58:07'),
(13, 7, 'Buttered Spinach', 'N/A', 40, 5, 'Garlic\r\nButter\r\nSpinach\r\nSalt and Pepper to taste', 'N/A', '1hr', '214102054_189112206557667_6867804809161720799_n.jpg', 1, '2023-11-10 15:59:07'),
(14, 7, 'No meat Pinakbet', 'N/A', 20, 5, 'Eggplant\r\nAmpalaya\r\nSitaw\r\nOkra\r\nGarlic\r\nOnion\r\nBagoong / Shrimp paste\r\nTomatoes\r\nPepper', 'N/A', '45 Mins', '211924781_189112443224310_2200960192016976296_n.jpg', 1, '2023-11-10 16:01:19'),
(15, 7, 'Vegetable spring rolls', 'N/A', 25, 5, 'Carrots\r\nRepolyo\r\nWhite onions\r\nPotatoes\r\nCelery\r\nSoy sauce\r\nLumpia Wrapper', 'N/A', '1hr', '213508247_189112546557633_7085015144182061271_n.jpg', 1, '2023-11-10 16:02:04'),
(16, 7, 'Vegetable Omelette', 'N/A', 15, 5, 'Eggs\r\nBell Pepper\r\nParsley\r\nGarlic', 'N/A', '30 Mins', '212951866_189112849890936_1547960774071623182_n.jpg', 1, '2023-11-10 16:03:10'),
(17, 7, 'Adobong Sitaw', 'N/A', 15, 5, 'Sitaw\r\nSoy sauce\r\nOnion\r\nGarlic\r\nBay leaves\r\nPepper\r\nSugar\r\nChicken strips (optional)', 'N/A', '15 Mins', '212659208_189111816557706_3366349225077435557_n.jpg', 1, '2023-11-10 16:04:36'),
(18, 7, 'Zucchini Noodles', 'n/A', 15, 5, 'Zucchini (sliced into thin noodles)\r\nBroccoli\r\nBaguio Beans\r\nBell pepper\r\nRepolyo\r\nOyster sauce\r\nSalt and Pepper to taste', 'N/A', '15 Mins', '211369870_189112139891007_4742679864677333789_n.jpg', 1, '2023-11-10 16:06:20'),
(19, 7, 'Tortang Repolyo', 'N/A', 20, 5, 'Repolyo\r\nEgg\r\nOlive oil / any oil\r\nSalt and Pepper to taste', 'N/A', '20 Mins', '214341361_189112053224349_6970478152166346416_n.jpg', 1, '2023-11-10 16:07:36'),
(20, 7, 'Tortang Patatas', 'Gisa muna sa garlic and bell pepper yung patatas make sure na malambot na before ilagay ang scrambled eggs', 35, 5, 'Potatoes\r\nBell Pepper\r\nEggs\r\nGarlic', 'N/A', '50 Mins', '208917992_189112799890941_8683525446140662993_n.jpg', 1, '2023-11-10 16:08:54'),
(21, 7, 'Okra with Bagoong', 'Steamed Okra (pwede isabay sa sinaing)', 15, 5, 'Okra\r\nBagoong', 'N/A', '15 Mins', '208783797_189112496557638_7757291693442588190_n.jpg', 1, '2023-11-10 16:11:26'),
(22, 7, 'Ginisang Togue', 'N/A', 30, 5, 'Toge\r\nCarrots\r\nRepolyo\r\nOyster Sauce\r\nSalt and Pepper to taste\r\nGround Pork', 'N/A', '1hr', '214625069_189112633224291_2238380046676549943_n.jpg', 1, '2023-11-10 16:12:29'),
(23, 7, 'Spicy Sardines with Bok Choy', 'N/A', 20, 5, 'This time I used small pechay / bok choi\r\n1 bulb Garlic\r\n1 bundle bok choy\r\n1 can small sardines\r\nSalt and Pepper to taste', 'N/A', '30 Mins', '214625069_189112633224291_2238380046676549943_n.jpg', 1, '2023-11-10 16:13:57'),
(24, 7, 'Kare Kare', '* In a large pot, bring the water to a boil\r\n* Put in the oxtail followed by the onions and simmer for 2.5 to 3 hrs or until tender (35 minutes if using a pressure cooker)\r\n* Once the meat is tender, add the ground peanuts, peanut butter, and coloring (water from the annatto seed mixture) and simmer for 5 to 7 minutes\r\n* Add the toasted ground rice and simmer for 5 minutes\r\n* On a separate pan, saute the garlic then add the banana flower, eggplant, and string beans and cook for 5 minutes\r\n* Transfer the cooked vegetables to the large pot (where the rest of the ingredients are)\r\n* Add salt and pepper to taste\r\n* Serve hot with shrimp paste. Enjoy!', 50, 5, '3 lbs oxtail cut in 2 inch slices you an also use tripe or beef slices\r\n1 piece small banana flower bud sliced\r\n1 bundle pechay or bok choy\r\n1 bundle string beans cut into 2 inch slices\r\n4 pieces eggplants sliced\r\n1 cup ground peanuts\r\n1/2 cup peanut butter\r\n1/2 cup shrimp paste\r\n34 Ounces water about 1 Liter\r\n1/2 cup annatto seeds soaked in a cup of water\r\n1/2 cup toasted ground rice\r\n1 tbsp garlic minced\r\n1 piece onion chopped\r\nsalt and pepper', 'N/A', '1:30hr', '213619353_189112249890996_6424179100584371502_n.jpg', 1, '2023-11-10 16:15:31'),
(25, 7, 'Dinindeng - Simplified version', 'N/A', 40, 5, 'Bunga ng Malunggay\r\nSaluyot\r\nSitaw\r\nTalong\r\nBagoong isda\r\nBawang\r\nSibuyas\r\nLuya', 'N/A', '1hr', '212192656_189112013224353_4311671894331757473_n.jpg', 1, '2023-11-10 16:16:45'),
(26, 7, 'Pumpkin Noodles', 'N/A', 30, 5, 'Pumpkin / Kalabasa (Sliced Into Thin Noodles)\r\nBell Pepper\r\nBaguio Beans\r\nRepolyo\r\nTomatoes\r\nSalt And Pepper To Taste\r\nOyster Sauce', 'N/A', '1hr', '210517402_189112173224337_3874155103651415479_n.jpg', 1, '2023-11-10 16:17:40'),
(27, 7, 'Ginataang Gulay', 'N/A', 20, 5, 'Kalabasa\r\nSitaw\r\nOnion\r\nGarlic\r\nCoconut milk\r\nSalt and Pepper to taste\r\nBagoong', 'N/A', '1hr', '208137283_189111863224368_5501776108432917647_n.jpg', 1, '2023-11-10 16:18:55'),
(28, 7, 'Egg soup', 'N/A', 30, 5, 'Eggs\r\nChicken cubes\r\nWater\r\nCornstarch\r\nOnion leaves or Parsley', 'N/A', '45 Mins', '213366651_189112759890945_8769884802700984559_n.jpg', 1, '2023-11-10 16:19:55'),
(29, 7, 'Upo Guisado', 'N/A', 50, 5, '1 small bottle gourd upo, sliced\r\n1 medium plum tomato cubed\r\n1 medium yellow onion chopped\r\n4 cloves garlic crushed\r\nÂ¼ teaspoon ground black pepper\r\n3 tablespoons cooking oil\r\n1 Â½ cup water', 'N/A', '1hr', '208565370_189112596557628_7653420692471937989_n.jpg', 1, '2023-11-10 16:21:29'),
(30, 7, 'Chicken Afritada (simplified version)', 'N/A', 100, 5, 'Chicken\r\nPotatoes\r\nTomato Sauce\r\nGarlic\r\nOnion\r\nOregano\r\nParsley (optional)\r\nSalt and Pepper to taste', 'N/A', '2hrs', '209290401_189112673224287_7092982747012061293_n.jpg', 1, '2023-11-10 16:22:23'),
(31, 7, 'Corn and Crab Soup', 'Boil the water\r\nPut the eggs and mix\r\nadd cornstarch dissolved in warm water\r\nadd the crab balls and corn (cooked)\r\nadd the cabbage\r\nsalt and pepper to taste', 100, 5, 'Eggs\r\nWater\r\nCornstarch\r\nCabbage\r\nSweet Corn\r\nCrab balls (siomai if not available)', 'N/A', '1hr', '210114263_189111906557697_5161843405115837354_n.jpg', 1, '2023-11-10 16:23:44'),
(32, 7, 'Tinola', '* Heat oil in a pot.\r\n* SautÃ© garlic, onion, and ginger. Add the ground black pepper.\r\n* When the onion starts to get soft, add the chicken. Cook for 5 minutes or until it turns light brown.\r\n* Pour the water. Let boil. Cover and then set the heat to low. Boil for 40 minutes.\r\n* Scoop and discard the scums and oil on the soup.\r\n* Add the Knorr chicken cube and chayote or papaya. Stir. Cover and cook for 5 minutes.\r\n* Put the malunggay and hot pepper leaves in the pot and pour the fish sauce in. Continue to cook for 2 minutes.', 50, 5, '* 2 lbs. chicken cut into serving pieces\r\n* 1 cup malunggay leaves\r\n* 1 cup hot pepper leaves\r\n* 1/8 teaspoon ground black pepper\r\n* 1 piece sayote wedged\r\n* 6 cups water\r\n* 1 piece Knorr chicken cube\r\n* 1 piece onion sliced\r\n* 4 cloves garlic crushed and chopped\r\n* 3 thumbs ginger julienne\r\n* 2 tablespoons fish sauce patis\r\n* 3 tablespoons vegetable oil', 'N/A', '1hr', '211297743_189112276557660_5281141812317827805_n.jpg', 1, '2023-11-10 16:25:15'),
(33, 7, 'Laing', 'N/A', 15, 5, 'N/A', 'N/A', '30 Mins', '208772689_189112883224266_8004682489168755231_n.jpg', 1, '2023-11-10 16:25:58'),
(34, 7, 'Nilagang Baka + Patis with Calamansi', 'N/A', 50, 5, 'N/A', 'N/A', '1hr', '211306857_189111536557734_6195363516529121624_n.jpg', 1, '2023-11-10 16:27:11'),
(35, 7, 'Vegan Pasta', 'N/A', 35, 5, 'N/A', 'N/A', '1hr', '212973033_189111663224388_8613556631265303359_n.jpg', 1, '2023-11-10 16:28:13'),
(36, 7, 'Sardines with Pechay', 'N/A', 30, 5, '1 bulb Garlic\r\n1 bundle Pechay\r\n1 can small sardines\r\nSalt and Pepper to taste', 'N/A', '30 Mins', '215004656_189133333222221_8565897117541585307_n.jpg', 1, '2023-11-10 16:29:22'),
(37, 7, 'Sizzling Tofu', '* Prepare the sauce by combining all the sauce ingredients. Mix well. Set aside.\r\n* Heat oil in a pot.\r\n* Once the oil gets hot, deep fry the cubed tofu until it turns light brown. Remove from the pot and place in a plate with paper towel. Set aside\r\n* Scoop 3 tablespoons cooking oil from the pot where the tofu was fried. Heat it in a separate clean pot.\r\n* Saute onion and bell peppers.\r\n* Add the fried tofu. Cook for 2 minutes.\r\n* Pour half of the sauce mixture into the pot. Stir and continue to cook for 2 minutes.\r\n* Serve. Share and enjoy!\r\n\r\n* Optional: Heat a sizzling plate on the stovetop. Melt butter into the plate. Transfer cooked tofu on the metal plate and pour the remaining sauce. Toss and cook for 1 minute.', 50, 5, '* 14 Oz. Extra Firm Tofu Cubed\r\n* 2 Tablespoons Chopped Red Bell Pepper\r\n* 2 Tablespoons Chopped Green Bell Pepper\r\n* 1 Medium Yellow Onion Chopped\r\n* 1 Tablespoon Butter\r\n* 2 Cups Cooking Oil\r\nSauce\r\n* 1/4 Cup Lady''s Choice Mayonnaise\r\n* 1 Tablespoon Knorr Liquid Seasoning\r\n* 1/2 Teaspoon Onion Powder\r\n* 2 Tablespoons Water', 'N/A', '2hrs', '208258275_189134116555476_4313807113519734204_n.jpg', 1, '2023-11-10 16:31:55');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reserve_Id`, `cust_Id`, `prod_Id`, `qty`, `status`, `date_reserved`) VALUES
(1, 85, 2, 2, 1, '2023-11-06 21:06:15'),
(2, 85, 1, 3, 1, '2023-11-06 21:06:18');

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
(73, 'Sampleddd', 'Sample', 'Sample', '', '2023-10-02', '1 week old', 'sonerwin12@gmail.com', '9359428963', 'Sample', 'Female', 'Single', 'Sample', 'Methodist', 'Sample', 'Sample', 'Sample', 'Sample', 'Sample', 'Sample', 'Sample', 'Sample', '', '0192023a7bbd73250516f069df18b500', 'Admin', 276649, '2023-10-10'),
(79, 'Samples', 'Samples', 'Samples', 'Samples', '2022-03-02', '1 year old', 'admSampleinsss@gmail.com', '9359428962', 'Samples', 'Female', 'Single', 'Samples', 'Hindu', 'Samples', 'Sampless', 'Samples', 'Samples', 'Samples', 'Samples', 'Samples', 'Samples', 'barna.png', 'a2dc1592be8cd31d4395d016917d941c', 'User', 0, '2023-10-24'),
(80, 'gfdgdf', '', 'Passgf', '', '1998-06-09', '25 years old', 'staff2hgf@gmail.com', '9359428963', 'Passhgfhf', 'Male', 'Single', 'Pass', 'Buddhist', 'NA', 'Pass', 'Pass', 'Pass', 'Pass', 'Pass', 'Pass', 'Pass', '4.jpg', '$2y$10$c6aPaM3e4xYmjogT.5/JzeSWNZIwPSu.0pVQ3cuneDJYmfVkPCdfy', 'Staff', 0, '2023-10-24'),
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
MODIFY `cat_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
MODIFY `cust_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `log_history`
--
ALTER TABLE `log_history`
MODIFY `log_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
MODIFY `prod_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
MODIFY `reserve_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=84;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
