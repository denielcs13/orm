-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2018 at 03:04 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mothsut`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `admin_id` int(11) NOT NULL,
  `status` int(120) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `admin_id`, `status`) VALUES
(5, 'laptop', 2, 1),
(6, 'electronices', 2, 1),
(7, 'Mobile', 2, 1),
(8, 'camera', 2, 1),
(9, 'IT Company', 2, 1),
(11, 'Movie Times', 2, 1),
(12, 'Hospital  123', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `c_id` int(11) NOT NULL,
  `c_description` varchar(1000) NOT NULL,
  `c_product_id` int(11) NOT NULL,
  `c_admin_id` int(11) NOT NULL,
  `c_user_id` int(11) NOT NULL,
  `c_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

CREATE TABLE `complain` (
  `c_id` int(11) NOT NULL,
  `c_company_name` varchar(255) NOT NULL,
  `c_subject` varchar(255) NOT NULL,
  `c_details` varchar(500) NOT NULL,
  `c_category` varchar(255) NOT NULL,
  `c_country` varchar(255) NOT NULL,
  `c_city` varchar(255) NOT NULL,
  `c_zip_code` varchar(255) NOT NULL,
  `c_website` varchar(255) NOT NULL,
  `c_image` varchar(255) NOT NULL,
  `c_video_link` varchar(255) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `c_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complain`
--

INSERT INTO `complain` (`c_id`, `c_company_name`, `c_subject`, `c_details`, `c_category`, `c_country`, `c_city`, `c_zip_code`, `c_website`, `c_image`, `c_video_link`, `admin_id`, `product_id`, `user_id`, `c_date`, `status`) VALUES
(1, 'Complain', 'test', 'The class .active makes a button appear pressed, and ', 'business', 'India', 'Noida', '228125', 'http://www.sarkariresult.com/', '', 'no', 2, 61, 107, '2018-07-21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `facility`
--

CREATE TABLE `facility` (
  `f_id` int(11) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `f_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facility`
--

INSERT INTO `facility` (`f_id`, `f_name`, `admin_id`, `product_id`, `f_date`) VALUES
(4, 'porash', 2, 63, '2018-07-21'),
(9, 'yyyytt', 2, 63, '2018-07-21'),
(10, 'hello vishal', 2, 63, '2018-07-21'),
(11, 'vishal singh', 2, 63, '2018-07-21'),
(13, 'porash pandit 2', 2, 62, '2018-07-21'),
(14, 'porash pandit 3345', 2, 61, '2018-07-21');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `g_id` int(11) NOT NULL,
  `g_image` varchar(255) NOT NULL,
  `g_admin_id` int(11) NOT NULL,
  `g_product_id` int(11) NOT NULL,
  `g_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`g_id`, `g_image`, `g_admin_id`, `g_product_id`, `g_date`) VALUES
(62, 'download.jpg', 2, 61, '2018-07-20'),
(75, '51wrcikRDcL._AC_UL160_SR160,160_.jpg', 2, 63, '2018-07-21'),
(76, '511qpyTfuIL._SL1000_.jpg', 2, 63, '2018-07-21'),
(77, '71129Uo6DDL._AC_UL320_SR164,320_.jpg', 2, 63, '2018-07-21'),
(78, 'download.jpg', 2, 63, '2018-07-21'),
(82, 'download.jpg', 2, 63, '2018-07-21');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` tinyint(10) NOT NULL,
  `username` text NOT NULL,
  `password` varchar(50) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `ownername` text NOT NULL,
  `logo` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `mobile`, `ownername`, `logo`, `image`) VALUES
(2, 'rajesh', 'e10adc3949ba59abbe56e057f20f883e', '9540007414', 'Rajesh Kumar', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `company_id` tinyint(10) NOT NULL,
  `company_name` text NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `mobile` varchar(120) NOT NULL,
  `email` varchar(100) NOT NULL,
  `title` text NOT NULL,
  `product_rating` tinyint(10) NOT NULL,
  `description` varchar(200) NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longnitude` varchar(255) NOT NULL,
  `map_code` text NOT NULL,
  `p_date` date NOT NULL,
  `admin_id` varchar(10) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`company_id`, `company_name`, `category`, `mobile`, `email`, `title`, `product_rating`, `description`, `product_image`, `address`, `website`, `latitude`, `longnitude`, `map_code`, `p_date`, `admin_id`, `status`) VALUES
(61, 'samsung mobile', '7', '8181052357', 'singhvishal120012@gmail.com', 'yogesh', 3, 'A mobile phone, known as a cell phone in North America, is a portable telephone that can make and receive calls over a radio frequency link while the user is ...', 'PRO_2187191531978962.jpg', 'noida58', 'www.sarkari result.com', '', 'test', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d112087.59363108553!2d77.28524703427647!3d28.60765670466003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x390ce56c8e04d09d%3A0x3c352a87f1a93490!2sc2s+hub!3m2!1d28.6076747!2d77.3552873!5e0!3m2!1sen!2sin!4v1531403386456\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', '2018-06-19', '2', 1),
(62, 'c2s hub', '9', '8587000514', 'c2shub.pvt@gmail.com', 'channel manager company', 5, 'This is good and any point to support him', 'PRO_2187191531978814.jpg', '', 'http://www.c2shub.com/', '', '', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d112087.59363108553!2d77.28524703427647!3d28.60765670466003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x390ce56c8e04d09d%3A0x3c352a87f1a93490!2sc2s+hub!3m2!1d28.6076747!2d77.3552873!5e0!3m2!1sen!2sin!4v1531403386456\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', '2018-06-28', '2', 1),
(63, 'Fortis', '12', '8181818181', 'shwetachaurasiya9@gmail.com', ' Lowest Interest Rate On Personal Loan 2', 0, 'I have done two time successful transaction of 5 rupee but nowhere it show to transfer my amount to my account from payu money.  How to I can Transfer my amount to my account please guide me. My Regis', 'PRO_2187121531375087.png', 'B-22, Sector 62, Gautam Buddh Nagar, Noida, Uttar Pradesh 201301', 'http://www.fortishealthcare.com/', '12345678', '1234567', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d112087.59363108553!2d77.28524703427647!3d28.60765670466003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x390ce56c8e04d09d%3A0x3c352a87f1a93490!2sc2s+hub!3m2!1d28.6076747!2d77.3552873!5e0!3m2!1sen!2sin!4v1531403386456\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', '2017-01-01', '2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `r_id` int(11) NOT NULL,
  `product_id` int(120) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `admin_id` int(11) NOT NULL,
  `r_image` varchar(255) DEFAULT NULL,
  `r_title` varchar(255) DEFAULT NULL,
  `r_rating` varchar(255) DEFAULT NULL,
  `r_description` varchar(255) DEFAULT NULL,
  `r_date` date DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`r_id`, `product_id`, `user_id`, `admin_id`, `r_image`, `r_title`, `r_rating`, `r_description`, `r_date`, `status`) VALUES
(45, 62, 103, 2, NULL, 'test', '5', 'test', '2018-07-04', 1),
(50, 62, 106, 2, 'REV_218751530779444.jpg', 'test', '5', 'test', '2018-07-05', 1),
(51, 61, 107, 2, 'REV_218751530779838.jpg', 'test23', '5', 'test', '2018-07-05', 2),
(52, 61, 107, 2, 'REV_218751530782325.jpg', 'test', '5', 'test', '2018-07-05', 1),
(53, 61, 108, 2, 'REV_218751530782529.jpg', 'test 1', '5', 'test 2', '2018-07-05', 1),
(54, 61, 108, 2, 'REV_218751530782702.jpg', 'test', '5', 'test', '2018-07-05', 1),
(55, 61, 109, 2, 'REV_218751530785911.jpg', 'review', '5', 'vishal singh', '2018-07-05', 1),
(56, 62, 110, 2, 'REV_218751530785988.jpg', 'sd', '5', 'gssfgsfsfgsfg', '2018-07-05', 2),
(57, 62, 111, 2, 'REV_2187111531290167.jpg', 'fdsgfg', '5', 'dfgsdfhf', '2018-07-11', 1),
(58, 62, 107, 2, 'no', '4112', '3', 'dfghj', '2018-07-11', 0),
(59, 62, 0, 2, NULL, 'hello', '2', 'hgjhgjhg', '2018-07-21', 0),
(60, 62, 0, 2, NULL, 'hello', '2', 'hgjhgjhg', '2018-07-21', 0),
(61, 62, 0, 2, NULL, 'hello', '2', 'hgjhgjhg', '2018-07-21', 0),
(62, 62, 0, 2, 'REV_2187211532133587.jpg', 'hello', '2', 'hgjhgjhg', '2018-07-21', 0),
(63, 61, 0, 2, 'REV_2187211532133603.jpg', 'gfhghf', '4', 'ghfgh', '2018-07-21', 0),
(64, 62, 0, 2, NULL, '', '', '', '2018-07-21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subtitle`
--

CREATE TABLE `subtitle` (
  `sub_t_id` int(11) NOT NULL,
  `sub_t_name` varchar(255) NOT NULL,
  `title_id` int(11) NOT NULL,
  `sub_t_date` date NOT NULL,
  `admin_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subtitle`
--

INSERT INTO `subtitle` (`sub_t_id`, `sub_t_name`, `title_id`, `sub_t_date`, `admin_id`, `product_id`) VALUES
(5, 'a', 2, '2018-07-20', 1, 0),
(6, 'b', 2, '2018-07-20', 1, 0),
(7, 'c', 2, '2018-07-20', 1, 0),
(8, 'd', 2, '2018-07-20', 1, 0),
(13, 'abcde', 1, '2018-07-20', 1, 0),
(14, 'abcd', 1, '2018-07-20', 1, 0),
(15, 'abc', 1, '2018-07-20', 1, 0),
(16, 'ab', 1, '2018-07-20', 1, 0),
(17, 'a', 5, '2018-07-20', 1, 62),
(18, 'a', 5, '2018-07-20', 1, 62),
(19, 'a', 5, '2018-07-20', 1, 62),
(20, 'a', 5, '2018-07-20', 1, 62),
(25, 'ab', 4, '2018-07-21', 1, 62),
(26, 'ba', 4, '2018-07-21', 1, 62),
(27, 'gg', 4, '2018-07-21', 1, 62),
(28, 'd', 4, '2018-07-21', 1, 62),
(29, 't', 6, '2018-07-21', 1, 62),
(30, 't', 6, '2018-07-21', 1, 62),
(31, 't', 6, '2018-07-21', 1, 62),
(32, 't', 6, '2018-07-21', 1, 62);

-- --------------------------------------------------------

--
-- Table structure for table `title`
--

CREATE TABLE `title` (
  `title_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `title_name` varchar(255) NOT NULL,
  `title_status` int(11) NOT NULL,
  `title_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `title`
--

INSERT INTO `title` (`title_id`, `product_id`, `admin_id`, `title_name`, `title_status`, `title_date`) VALUES
(4, 62, 1, 'hello sir', 0, '2018-07-20'),
(5, 62, 1, 'hello', 0, '2018-07-20'),
(6, 62, 1, 'happy', 0, '2018-07-21');

-- --------------------------------------------------------

--
-- Table structure for table `user_register`
--

CREATE TABLE `user_register` (
  `u_id` int(11) NOT NULL,
  `u_image` varchar(255) DEFAULT NULL,
  `u_name` varchar(255) DEFAULT NULL,
  `u_profile` varchar(255) DEFAULT NULL,
  `u_address` varchar(255) DEFAULT NULL,
  `u_city` varchar(255) DEFAULT NULL,
  `u_state` varchar(255) DEFAULT NULL,
  `u_country` varchar(255) DEFAULT NULL,
  `u_loginby` varchar(255) DEFAULT NULL,
  `admin_id` int(11) NOT NULL,
  `u_date` date DEFAULT NULL,
  `u_status` int(120) NOT NULL,
  `u_email` varchar(255) NOT NULL,
  `u_phone` varchar(255) NOT NULL,
  `u_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_register`
--

INSERT INTO `user_register` (`u_id`, `u_image`, `u_name`, `u_profile`, `u_address`, `u_city`, `u_state`, `u_country`, `u_loginby`, `admin_id`, `u_date`, `u_status`, `u_email`, `u_phone`, `u_password`) VALUES
(4, NULL, 'vishal', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2018-06-21', 0, '', '', ''),
(22, NULL, 'admin', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2018-06-28', 0, '', '', ''),
(77, NULL, 'abhi', NULL, NULL, NULL, NULL, NULL, NULL, 2, '2018-07-03', 0, '', '', ''),
(79, NULL, 'asd', NULL, NULL, NULL, NULL, NULL, NULL, 2, '2018-07-03', 0, '', '', ''),
(80, NULL, 'big', NULL, NULL, NULL, NULL, NULL, NULL, 2, '2018-07-03', 0, '', '', ''),
(81, NULL, 'jhgvhv', NULL, NULL, NULL, NULL, NULL, NULL, 2, '2018-07-03', 0, '', '', ''),
(82, NULL, 'asd', NULL, NULL, NULL, NULL, NULL, NULL, 2, '2018-07-03', 0, '', '', ''),
(83, NULL, 'vishal123', NULL, 'noida12', 'noida', '', '', NULL, 2, '2018-07-03', 0, '', '', ''),
(84, 'Desert.jpg', 'good', NULL, 'avbt', 'noida', 'ok', 'india', NULL, 2, '2018-07-04', 0, '', '', ''),
(86, NULL, 'test1', NULL, NULL, NULL, NULL, NULL, NULL, 2, '2018-07-04', 0, '', '', ''),
(95, NULL, 'test1', NULL, NULL, NULL, NULL, NULL, NULL, 2, '2018-07-04', 0, 'resr1235@gmail.com', '9838169825', '60474c9c10d7142b7508ce7a50acf414'),
(96, NULL, 'test1', NULL, NULL, NULL, NULL, NULL, NULL, 2, '2018-07-04', 0, 'resr1232@gmail.com', '9838169822', '60474c9c10d7142b7508ce7a50acf414'),
(97, NULL, 'test1', NULL, NULL, NULL, NULL, NULL, NULL, 2, '2018-07-04', 0, 'resr1233@gmail.com', '9838169823', '60474c9c10d7142b7508ce7a50acf414'),
(98, NULL, 'test1', NULL, NULL, NULL, NULL, NULL, NULL, 2, '2018-07-04', 0, 'resr1234@gmail.com', '9838169824', '60474c9c10d7142b7508ce7a50acf414'),
(99, NULL, 'test1', NULL, NULL, NULL, NULL, NULL, NULL, 2, '2018-07-04', 0, 'resr12346@gmail.com', '9838169826', '60474c9c10d7142b7508ce7a50acf414'),
(100, NULL, 'test1', NULL, NULL, NULL, NULL, NULL, NULL, 2, '2018-07-04', 0, 'resr12347@gmail.com', '9838169827', '60474c9c10d7142b7508ce7a50acf414'),
(101, NULL, 'test1234', NULL, NULL, NULL, NULL, NULL, NULL, 2, '2018-07-04', 0, 'shwetachaurasiya9@gmail.com', '7827136227', '16d7a4fca7442dda3ad93c9a726597e4'),
(102, NULL, 'test1234', NULL, NULL, NULL, NULL, NULL, NULL, 2, '2018-07-04', 0, 'shwetachaurasiya91@gmail.com', '7827136228', '16d7a4fca7442dda3ad93c9a726597e4'),
(103, NULL, 'test1234', NULL, NULL, NULL, NULL, NULL, NULL, 2, '2018-07-04', 0, 'shwetachaurasiya8@gmail.com', '7827136220', '16d7a4fca7442dda3ad93c9a726597e4'),
(104, NULL, 'shweta', NULL, NULL, NULL, NULL, NULL, NULL, 2, '2018-07-05', 0, 'shwetachaurasiya@gmail.com', '7827136277', 'e10adc3949ba59abbe56e057f20f883e'),
(105, NULL, 'shweta', NULL, NULL, NULL, NULL, NULL, NULL, 2, '2018-07-05', 0, 'shwetachaurasiyaa@gmail.com', '7827136299', 'e10adc3949ba59abbe56e057f20f883e'),
(106, NULL, 'shweta', NULL, NULL, NULL, NULL, NULL, NULL, 2, '2018-07-05', 0, 'shwetachaurasiya0a@gmail.com', '7827136210', 'e10adc3949ba59abbe56e057f20f883e'),
(107, NULL, 'vishal', NULL, NULL, NULL, NULL, NULL, NULL, 2, '2018-07-05', 0, 'vishal@gmail.com', '7878787878', '8b64d2451b7a8f3fd17390f88ea35917'),
(108, NULL, 'priya', NULL, NULL, NULL, NULL, NULL, NULL, 2, '2018-07-05', 0, 'priya@gmail.com', '7827136111', '0b1c8bc395a9588a79cd3c191c22a6b4'),
(109, '', 'porash pandit', NULL, 'Meerut', 'Noida', '', 'India', NULL, 2, '2018-07-05', 0, 'porash123@gmail.com', '9832156699', '4eaba25d2246a3dcb4048256733f5885'),
(110, '', 'porash pandit', NULL, '5rfdgfdg', 'Noida', '', '', NULL, 2, '2018-07-05', 0, 'singh112@gmail.com', '9832156601', '8d297df10ef6ea420ac796c46631a146'),
(111, NULL, 'rajesh', NULL, NULL, NULL, NULL, NULL, NULL, 2, '2018-07-11', 0, 'rajesh.k@digitviral.com', '9999615069', 'b322874a202f428d26044c2ed45ed381');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `complain`
--
ALTER TABLE `complain`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `facility`
--
ALTER TABLE `facility`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`g_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `subtitle`
--
ALTER TABLE `subtitle`
  ADD PRIMARY KEY (`sub_t_id`);

--
-- Indexes for table `title`
--
ALTER TABLE `title`
  ADD PRIMARY KEY (`title_id`);

--
-- Indexes for table `user_register`
--
ALTER TABLE `user_register`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `complain`
--
ALTER TABLE `complain`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `facility`
--
ALTER TABLE `facility`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` tinyint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `company_id` tinyint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `subtitle`
--
ALTER TABLE `subtitle`
  MODIFY `sub_t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `title`
--
ALTER TABLE `title`
  MODIFY `title_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_register`
--
ALTER TABLE `user_register`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
