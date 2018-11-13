-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 22, 2018 at 03:51 AM
-- Server version: 5.6.39-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ch_mouthshut`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `ans_id` int(11) NOT NULL,
  `answer` varchar(500) NOT NULL,
  `ques_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `meta_tag` varchar(255) NOT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `ans_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`ans_id`, `answer`, `ques_id`, `product_id`, `user_id`, `admin_id`, `meta_tag`, `meta_keyword`, `meta_description`, `ans_date`, `status`) VALUES
(22, 'okkkkk', 54, 0, 107, 2, '', '', '', '2018-08-08', 1),
(23, '10', 58, 0, 107, 2, '', '', '', '2018-08-08', 1),
(24, '9august', 53, 62, 107, 2, '', '', '', '2018-08-09', 1),
(25, 'gfdss', 59, 0, 107, 2, '', '', '', '2018-08-09', 1),
(26, 'okkk', 50, 61, 107, 2, '', '', '', '2018-08-09', 1),
(27, 'ok', 59, 62, 107, 2, '', '', '', '2018-08-09', 1),
(28, 'ok', 54, 62, 107, 2, '', '', '', '2018-08-10', 1),
(29, 'Ya absolutely you can join ', 52, 0, 114, 2, '', '', '', '2018-09-04', 1),
(30, '', 52, 0, 114, 2, '', '', '', '2018-09-14', 1),
(31, 'no problem', 62, 0, 107, 2, '', '', '', '2018-09-22', 1),
(32, 'good', 62, 0, 107, 2, '', '', '', '2018-09-22', 1),
(33, 'good', 62, 0, 107, 2, '', '', '', '2018-09-22', 1),
(34, 'very good', 62, 0, 107, 2, '', '', '', '2018-09-22', 1),
(35, '<p>good experince</p>', 62, 0, 107, 2, '', '', '', '2018-09-22', 1),
(36, '<blockquote><h4><a href=\"http://www.c2shub.com\">http://www.c2shub.com</a></h4></blockquote>', 62, 0, 107, 2, '', '', '', '2018-09-22', 1),
(37, '<p>&lt;img src=\"http://demo.c2shub.com/rajesh/rajesh/image/user/c05811629.png\" /&gt;</p>', 62, 0, 107, 2, '', '', '', '2018-09-22', 1),
(38, '<p>rajesh</p>', 63, 0, 113, 2, '', '', '', '2018-09-29', 1),
(39, '<h4>NOKIA</h4><p>This phone\'s battery Backup is good</p>', 64, 0, 107, 2, '', '', '', '2018-10-10', 1),
(40, 'yes', 65, 0, 107, 2, '', '', '', '2018-10-10', 1),
(41, 'ok', 69, 0, 107, 2, '', '', '', '2018-10-20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `answer_reply`
--

CREATE TABLE `answer_reply` (
  `r_id` int(11) NOT NULL,
  `reply` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `admin_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer_reply`
--

INSERT INTO `answer_reply` (`r_id`, `reply`, `user_id`, `product_id`, `question_id`, `answer_id`, `status`, `admin_id`, `date`) VALUES
(14, 'okkkk', 107, 0, 63, 41, 1, 2, '2018-08-23'),
(15, 'done', 107, 0, 62, 33, 1, 2, '2018-09-22'),
(16, 'done', 107, 0, 62, 34, 1, 2, '2018-09-22'),
(17, 'hello', 107, 0, 52, 30, 1, 2, '2018-10-10'),
(18, 'he', 107, 0, 59, 27, 1, 2, '2018-10-10');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `admin_id` int(11) NOT NULL,
  `meta_tag` varchar(255) NOT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `status` int(120) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `admin_id`, `meta_tag`, `meta_keyword`, `meta_description`, `status`) VALUES
(6, 'Electrictronics', 2, '', '', '', 1),
(7, 'Education', 2, 'e', 'e', 'e', 1),
(9, 'IT Company', 2, '', '', '', 1),
(11, 'Movies', 2, '', '', '', 1),
(12, 'Hospitals', 2, 'r', 'rrre', 'rer', 1),
(19, 'LAPTOP', 2, '', '', '', 1),
(20, 'phone', 2, '', '', '', 1),
(21, 'love', 2, '', '', '', 1),
(22, 'Tour & Travels  ', 2, '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `city_name` varchar(100) NOT NULL,
  `state_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `city_name`, `state_id`) VALUES
(1, 'Havelock Island', '1'),
(2, 'Neil Island', '1'),
(3, 'Nicobar Island', '1'),
(4, 'Port Blair', '1'),
(5, 'Ross Island', '1'),
(6, 'Haridwar', '10'),
(7, 'Dehradun', '10'),
(8, 'RishiKesh', '10'),
(9, 'Mussoorie', '10'),
(10, 'Haldwani', '10'),
(11, 'Roorkee', '10'),
(12, 'Nainital', '10'),
(13, 'Kashipur', '10'),
(14, 'Rudhrapur', '10'),
(15, 'Kotdwar', '10'),
(16, 'Shrinagar', '10'),
(17, 'Tehri', '10'),
(18, 'Almora', '10'),
(19, 'Gangotri', '10'),
(20, 'Ranikhet', '10'),
(21, 'Badrinath', '10'),
(22, 'Kedarnath', '10'),
(23, 'Bhimtal', '10'),
(24, 'Pithoragard', '10'),
(25, 'Ramnagar', '10'),
(26, 'Jyotimath', '10'),
(27, 'Chamoli Gopeshwar', '10'),
(28, 'Lansedown', '10'),
(29, 'Chakarta', '10'),
(30, 'Devprayag', '10'),
(31, 'Lohagat', '10'),
(32, 'Rudhraprayag', '10'),
(33, 'Pauri', '10'),
(34, 'Bhowali', '10'),
(35, 'Kamaprayag', '10'),
(36, 'Kichha', '10'),
(37, 'Sitarganj', '10'),
(38, 'Barkot', '10'),
(39, 'Narendra Nagar', '10'),
(40, 'Darchula', '10'),
(41, 'Jaspur', '10'),
(42, 'Khatima', '10'),
(43, 'Chamba', '10'),
(44, 'Kathgodam', '10'),
(45, 'Laksar', '10'),
(46, 'DidiHat', '10'),
(47, 'Kausani', '10'),
(48, 'Dwarahat', '10'),
(49, 'Nandaprayag', '10'),
(50, 'Vikasnagar', '10'),
(51, 'Pantnagar', '10'),
(52, 'Kaladhungi', '10'),
(53, 'Auli', '10'),
(54, 'Bilaspur', '9'),
(55, 'Chamba', '9'),
(56, 'Hamirpur', '9'),
(57, 'Kangra', '9'),
(58, 'Kinnaur', '9'),
(59, 'Kullu', '9'),
(60, 'Lahaul and Spiti', '9'),
(61, 'Mandi', '9'),
(62, 'Shimla', '9'),
(63, 'Sirmaur', '9'),
(64, 'Solan', '9'),
(65, 'Una', '9'),
(66, 'Dharamsala', '9'),
(67, 'nahan', '9'),
(68, 'Manali', '9'),
(69, 'kasauli', '9'),
(70, 'Dalhausie', '9'),
(71, 'Parwanoo', '9'),
(72, 'Palampur', '9'),
(73, 'Sundar Nagar', '9'),
(74, 'Paonta Sahib', '9'),
(75, 'Nalagarh', '9'),
(76, 'Jogindernath', '9'),
(77, 'Nurpur', '9'),
(78, 'Nainadevi', '9'),
(79, 'Theog', '9'),
(80, 'Khajjiyar', '9'),
(81, 'Nadaun', '9'),
(82, 'Arki', '9'),
(83, 'Naggar', '9'),
(84, 'Tira Sujanpur', '9'),
(85, 'Rohru', '9'),
(86, 'Ghumarwin', '9'),
(87, 'Rampur', '9'),
(88, 'Rajgarh', '9'),
(89, 'Jawalamukhi', '9'),
(90, 'Banjar', '9'),
(91, 'Keylong', '9'),
(92, 'Sarkaghat', '9'),
(93, 'Narkanda', '9'),
(94, 'Jubbal', '9'),
(95, 'Pathanjot', '9'),
(96, 'Kalpa', '9'),
(97, 'Recklong Peo', '9'),
(98, 'Bhuntar', '9'),
(99, 'Dera Gopipur', '9'),
(100, 'Nagrota Bhagwan', '9'),
(101, 'Dagshai', '9'),
(102, 'Rewalsar', '9'),
(103, 'Palampur', '9'),
(104, 'Sundar Nagar', '9'),
(105, 'Paonta Sahib', '9'),
(106, 'Nalagarh', '9'),
(107, 'Sabhatu', '9'),
(108, 'Mashobra', '9'),
(109, 'Puttaparthi', '2'),
(110, 'Mahabaleshwar', '11'),
(111, 'Pune', '11'),
(112, 'Navi Mumbai', '11'),
(113, 'Hyderabad', '2'),
(114, 'Agra', '12'),
(115, 'Lucknow', '12'),
(116, 'Noida', '12'),
(117, 'Greater Noida', '12'),
(118, 'Surat', '13'),
(119, 'Ahmedabad', '13'),
(120, 'Vadodara', '13'),
(121, 'Rajkot', '13'),
(122, 'Bhavnagar', '13'),
(123, 'Bhuj', '13'),
(125, 'Gandhinagar', '13'),
(126, 'Porbandar', '13'),
(127, 'Panchmahal', '13'),
(128, 'Patan', '13'),
(129, 'Amreli', '13'),
(130, 'Junagadh', '13'),
(131, 'Jamnagar', '13'),
(132, 'Mehsana', '13'),
(133, 'Panaji', '14'),
(134, 'Bicholim', '14'),
(135, 'Canacona', '14'),
(136, 'Curchorem', '14'),
(137, 'Mapusa', '14'),
(138, 'Margao', '14'),
(139, 'Mormugao', '14'),
(140, 'Pernem', '14'),
(141, 'Ponda', '14'),
(142, 'Quepem', '14'),
(143, 'Sanguem', '14'),
(144, 'Sanquelim', '14'),
(145, 'Valpoi', '14'),
(146, 'Srinagar', '15'),
(147, 'Jammu', '15'),
(148, 'Leh(Ladakh)', '15'),
(149, 'Udhampur', '15'),
(150, 'Rajouri', '15'),
(151, 'Kargil', '15'),
(152, 'Anantnag', '15'),
(153, 'Kupwara', '15'),
(154, 'Jamshedpur', '16'),
(155, 'Dhanbad', '16'),
(156, 'Ranchi', '16'),
(157, 'Bokaro Steel City', '16'),
(158, 'Deoghar', '16'),
(159, 'Phusro', '16'),
(160, 'Hazaribagh', '16'),
(161, 'Giridih', '16'),
(162, 'Ramgarh', '16'),
(163, 'Medininagar', '16'),
(164, 'Chirkunda', '16'),
(165, 'Mysuru', '17'),
(166, 'Raichur', '17'),
(167, 'Kolar', '17'),
(168, 'Hassan', '17'),
(169, 'Vijayapura', '17'),
(170, 'Bidar', '17'),
(171, 'Bellary', '17'),
(172, 'Belagavi', '17'),
(173, 'Bagalkot', '17'),
(174, 'Mandya', '17'),
(175, 'Yadgir', '17'),
(176, 'Thiruvananthapuram', '18'),
(177, 'Kozhikode', '18'),
(178, 'Kannur', '18'),
(179, 'Malappuram', '18'),
(180, 'Kottayam', '18'),
(181, 'Kasaragod', '18'),
(182, 'Kavaratti', '19'),
(183, 'Agatti Island', '19'),
(184, 'Amini, India', '19'),
(185, 'Andrott', '19'),
(186, 'Kadmat Island', '19'),
(187, 'Kalpeni', '19'),
(188, 'Indore', '20'),
(189, 'Bhopal', '20'),
(190, 'Jabalpur', '20'),
(191, 'Gwalior', '20'),
(192, 'Ujjain', '20'),
(193, 'Sagar', '20'),
(194, 'Dewas', '20'),
(195, 'Ratlam', '20'),
(196, 'Rewa', '20'),
(197, 'Singrauli', '20'),
(198, 'Khandwa', '20'),
(199, 'Chhindwara', '20'),
(200, 'Shivpuri', '20'),
(201, 'Chhatarpur', '20'),
(202, 'Bishnupur', '21'),
(203, 'Thoubal', '21'),
(204, 'Imphal East', '21'),
(205, 'Imphal West', '21'),
(206, 'Senapati', '21'),
(207, 'Ukhrul', '21'),
(208, 'Chandel', '21'),
(209, 'Churachandpur', '21'),
(210, 'Tamenglong', '21'),
(211, 'Pherzawl', '21'),
(212, 'Noney', '21'),
(213, 'Kamjong', '21'),
(214, 'Tengnoupal', '21'),
(215, 'Kakching', '21'),
(216, 'Shillong', '22'),
(217, 'Pynthormukhrah', '22'),
(218, 'Mairang', '22'),
(219, 'Nongstoin', '22'),
(220, 'Aizawl', '23'),
(221, 'Kolasib', '23'),
(222, 'Lawngtlai', '23'),
(223, 'Lunglei', '23'),
(224, 'Mamit', '23'),
(225, 'Siaha', '23'),
(226, 'Serchhip', '23'),
(227, 'Champhai', '23'),
(228, 'Kohima', '24'),
(229, 'Dimapur', '24'),
(230, 'Kiphire', '24'),
(231, 'Longleng', '24'),
(232, 'Mokokchung', '24'),
(233, 'Mon', '24'),
(234, 'Peren', '24'),
(235, 'Phek', '24'),
(236, 'Tuensang', '24'),
(237, 'Wokha', '24'),
(238, 'Zunheboto', '24'),
(239, 'Bhubaneswar', '25'),
(240, 'Cuttack', '25'),
(241, 'Rourkela', '25'),
(242, 'Brahmapur', '25'),
(243, 'Sambalpur', '25'),
(244, 'Puri', '25'),
(245, 'Angul', '25'),
(246, 'Balasore', '25'),
(247, 'Bhadrak', '25'),
(248, 'Baripada', '25'),
(249, 'Barbil', '25'),
(250, 'Karaikal', '26'),
(251, 'Mahé', '26'),
(252, 'Pondicherry', '26'),
(253, 'Yanam', '26'),
(254, 'Ludhiana', '27'),
(255, 'Amritsar', '27'),
(256, 'Jalandhar', '27'),
(257, 'Patiala', '27'),
(258, 'Ludhiana', '27'),
(259, 'Amritsar', '27'),
(260, 'Jalandhar', '27'),
(261, 'Patiala', '27'),
(262, 'Mohali', '27'),
(263, 'Pathankot', '27'),
(264, 'Firozpur', '27'),
(265, 'Moga', '27'),
(266, 'Abohar', '27'),
(267, 'Malerkotla', '27'),
(268, 'Barnala', '27'),
(269, 'Jaipur', '28'),
(270, 'Jodhpur', '28'),
(271, 'Kota', '28'),
(272, 'Bikaner', '28'),
(273, 'Ajmer', '28'),
(274, 'Udaipur', '28'),
(275, 'Alwar', '28'),
(276, 'Sri Ganganagar', '28'),
(277, 'chittorgarh', '28'),
(278, 'Gangapur city', '28'),
(279, 'Sawai Madhopur', '28'),
(280, 'Jhunjhunu', '28'),
(281, 'Gangtok', '29'),
(282, 'Mangan, India', '29'),
(283, 'Namchi', '29'),
(284, 'Geyzing', '29'),
(285, 'Pelling', '29'),
(286, 'Lachung', '29'),
(287, 'Lachen', '29'),
(288, 'Ravangla', '29'),
(289, 'Chennai', '30'),
(290, 'Coimbatore', '30'),
(291, 'Madurai', '30'),
(292, 'Tiruchirappalli', '30'),
(293, 'Tiruppu', '30'),
(294, 'Salem', '30'),
(295, 'Erode', '30'),
(296, 'Vellore', '30'),
(297, 'Tirunelveli', '30'),
(298, 'Thoothukkudi', '30'),
(299, 'Nagercoil', '30'),
(300, 'Thanjavur', '30'),
(301, 'Dindigul', '30'),
(302, 'Cuddalore', '30'),
(303, 'Kanchipuram', '30'),
(304, 'Tiruvannamalai', '30'),
(305, 'Kumbakonam', '30'),
(306, 'Rajapalayam', '30'),
(307, 'Pudukottai', '30'),
(308, 'Hosur', '30'),
(309, 'Ambur', '30'),
(310, 'Karaikkudi', '30'),
(311, 'Neyveli', '30'),
(312, 'Nagapattinam', '30'),
(313, 'Hyderabad', '31'),
(314, 'Warangal', '31'),
(315, 'Nizamabad', '31'),
(316, 'Khammam', '31'),
(317, 'Karimnagar', '31'),
(318, 'Ramagundam', '31'),
(319, 'Mahbubnagar', '31'),
(320, 'Nalgonda', '31'),
(321, 'Adilabad', '31'),
(322, 'Suryapet', '31'),
(323, 'Siddipet', '31'),
(324, 'Miryalaguda', '31'),
(325, 'Agartala', '32'),
(326, 'Amarpur', '32'),
(327, 'Belonia', '32'),
(328, 'Dharmanagar', '32'),
(329, 'Kailasahar', '32'),
(330, 'Kamalpur', '32'),
(331, 'Ranirbazar', '32'),
(332, 'Jirania', '32'),
(333, 'Melaghar', '32'),
(334, 'Panisagar', '32'),
(335, 'Santirbazar', '32'),
(336, 'Sonamura', '32'),
(337, 'Kolkata', '33'),
(338, 'Darjeeling', '33'),
(339, 'Siliguri', '33'),
(340, 'Asansol', '33'),
(341, 'Durgapur', '33'),
(342, 'Bardhaman', '33'),
(343, 'Cooch Behar', '33'),
(344, 'Krishnanagar', '33'),
(345, 'Haldia', '33'),
(346, 'Malda', '33'),
(347, 'Jalpaiguri', '33'),
(348, 'Purulia', '33'),
(349, 'Daman', '35'),
(350, 'Diu? ', '35'),
(351, 'Faridabad', '36'),
(352, 'Gurgaon', '36'),
(353, 'Panipat', '36'),
(354, 'Ambala', '36'),
(355, 'Yamunanagar', '36'),
(356, 'Rohtak', '36'),
(357, 'Hisarr', '36'),
(358, 'Karnal', '36'),
(359, 'Sonipat', '36'),
(360, 'Panchkula', '36'),
(361, 'Sirsa', '36'),
(362, 'Rewari', '36'),
(363, 'Delhi', '34'),
(364, 'Najafgarh', '34'),
(365, 'Narela', '34'),
(366, 'New Delhi', '34'),
(367, 'Sultanpur Majra', '34'),
(368, 'Delhi Cantonment', '34'),
(369, 'Gokal Pur', '34'),
(370, 'Mustafabad', '34'),
(371, 'Hastsal', '34'),
(372, 'Taj Pul', '34'),
(373, 'Jaffrabad', '34'),
(374, 'Mandoli', '34'),
(375, 'Karol Bagh', '34'),
(376, 'Hauz Khas', '34'),
(379, 'Sadar Bazaar', '34'),
(380, 'Pankaj Nagar', '34'),
(381, 'Rohini', '34'),
(382, 'Patel Nagar', '34'),
(383, 'Dwarka', '34'),
(384, 'Civil Lines', '34'),
(385, 'Yamuna Vihar', '34'),
(386, 'Seemapuri', '34'),
(387, 'Vivek Vihar', '34'),
(388, 'Gandhi Nagar', '34'),
(389, 'Daryaganj', '34'),
(390, 'Mehrauli', '34'),
(391, 'Parliament Street', '34'),
(392, 'Chanakyapuri', '34'),
(395, 'Patparganj', '34'),
(396, 'Punjabi Bagh', '34'),
(397, 'Rajouri Garden', '34'),
(398, 'Janakpuri', '34'),
(399, 'Kashmere Gate', '34'),
(400, 'Defence Colony', '34'),
(401, 'Greater Kailash', '34'),
(402, 'Lajpat Nagar', '34'),
(403, 'Chandni Chowk', '34'),
(404, 'Pragati Maidan', '34'),
(405, 'Bawana', '34'),
(408, 'North Delhi', '34'),
(409, 'North West Delhi', '34'),
(410, 'West Delhi', '34'),
(412, 'South Delhi', '34'),
(413, 'South East Delhi', '34'),
(414, 'Central Delhi', '34'),
(415, 'South West Delhi', '34'),
(416, 'North East Delhi', '34'),
(417, 'Alipur', '34'),
(418, 'Kapashera', '34'),
(419, 'Model Town', '34'),
(420, 'Sarita Vihar', '34'),
(421, 'Karawal Nagar', '34'),
(422, 'BTM Bagh', '34'),
(423, 'Mumbai', '11'),
(425, 'Nagpur', '11'),
(426, 'Thane', '11'),
(427, 'Nashik', '11'),
(428, 'Pimpri-Chinchwad', '11'),
(429, 'Aurangabad', '11'),
(430, 'Solapur', '11'),
(431, 'Kalyan-Dombivali ', '11'),
(432, 'Vasai-Virar ', '11'),
(433, 'Amravati', '11'),
(434, 'Mira-Bhayandar ', '11'),
(435, 'Akola ', '11'),
(436, 'Bhiwandi-Nizampur', '11'),
(437, 'Dhule', '11'),
(438, 'Jalgaon', '11'),
(439, 'Nanded-Waghala ', '11'),
(440, 'Kolhapur', '11'),
(441, 'Latur', '11'),
(442, 'Panvel', '11'),
(443, 'Ulhasnagar', '11'),
(444, 'Sangli', '11'),
(445, 'Nashik', '11'),
(446, 'Ahmednagar', '11'),
(447, 'Kolhapur', '11'),
(448, 'Chandrapur', '11'),
(449, 'Parbhani', '11'),
(450, 'Ambernath', '11'),
(451, 'Firozabad', '12'),
(452, 'Mainpuri', '12'),
(453, 'Mathura', '12'),
(454, 'Aligarh', '12'),
(455, 'Etah', '12'),
(456, 'Hathras', '12'),
(457, 'Kasganj', '12'),
(458, 'Allahabaad', '12'),
(459, 'Fatehpur', '12'),
(460, 'Kaushambi', '12'),
(461, 'Pratapgarh', '12'),
(462, 'Azamgarh', '12'),
(463, 'Ballia', '12'),
(464, 'Mau', '12'),
(465, 'Budaun', '12'),
(466, 'Bareilly', '12'),
(467, 'Pilibhit', '12'),
(468, 'Shahjahanpur', '12'),
(469, 'Basti', '12'),
(470, 'Sant Kabir Nagar', '12'),
(471, 'Siddharthnagar', '12'),
(472, 'Banda', '12'),
(473, 'Chitrakoot', '12'),
(474, 'Hamirpur', '12'),
(475, 'Mahoba', '12'),
(476, 'Bahraich', '12'),
(477, 'Balarampur', '12'),
(478, 'Gonda', '12'),
(479, 'Shravasti', '12'),
(480, 'Ambedkar Nagar', '12'),
(481, 'Amethi', '12'),
(482, 'Barabanki', '12'),
(483, 'Faizabad', '12'),
(484, 'Sultanpur', '12'),
(485, 'Deoria', '12'),
(486, 'Gorakhpur', '12'),
(487, 'Kushinagar', '12'),
(488, 'Maharajganj', '12'),
(489, 'Jalaun', '12'),
(490, 'Jhansi', '12'),
(491, 'Lalitpur', '12'),
(492, 'Auraiya', '12'),
(493, 'Etawah', '12'),
(494, 'Farrukhabad', '12'),
(495, 'Kannauj', '12'),
(496, 'Kanpur Dehat', '12'),
(497, 'Kanpur Nagar', '12'),
(498, 'Hardoi', '12'),
(499, 'Lakhimpur Kheri', '12'),
(500, 'Raebareli', '12'),
(501, 'Sitapur', '12'),
(502, 'Unnao', '12'),
(503, 'Bagpat', '12'),
(504, 'Bulandshahr', '12'),
(505, 'Gautam Buddha Nagar', '12'),
(506, 'Ghaziabad', '12'),
(507, 'Hapur', '12'),
(508, 'Meerut', '12'),
(509, 'Mirzapur', '12'),
(510, 'Sant Ravidas Nagar', '12'),
(511, 'Sonbhadra', '12'),
(512, 'Amroha', '12'),
(513, 'Bijnor', '12'),
(514, 'Moradabad', '12'),
(515, 'Rampur', '12'),
(516, 'Sambhal', '12'),
(517, 'Muzaffarnagar', '12'),
(518, 'Saharanpur', '12'),
(519, 'Shamli', '12'),
(520, 'Chandauli', '12'),
(521, 'Ghazipur', '12'),
(522, 'Jaunpur', '12'),
(523, 'Varanasi', '12'),
(524, 'Pratapgarh', '28'),
(525, 'Bharatpur', '28'),
(526, 'Sikar', '28'),
(527, 'Pali', '28'),
(528, 'Tonk', '28'),
(529, 'Kishangarh', '28'),
(530, 'Beawar', '28'),
(531, 'Hanumangarh', '28'),
(532, 'Dholpur', '28'),
(533, 'churu', '28'),
(534, 'Banswara', '28'),
(535, 'Baran', '28'),
(536, 'Barmer', '28'),
(537, 'Bhilwara', '28'),
(538, 'Bundi', '28'),
(539, 'Churu', '28'),
(540, 'Dausa', '28'),
(541, 'Dungarpur', '28'),
(542, 'Hanumangarh', '28'),
(543, 'Jalore', '28'),
(544, 'Jhalawar', '28'),
(545, 'Karauli', '28'),
(546, 'Nagaur', '28'),
(547, 'Karauli', '28'),
(548, 'Sirohi', '28'),
(549, 'Murwara (Katni)', '20'),
(550, 'Guna', '20'),
(551, 'Vidisha', '20'),
(552, 'Damoh', '20'),
(553, 'Mandsaur', '20'),
(554, 'Khargone', '20'),
(555, 'Neemuch', '20'),
(556, 'Pithampur', '20'),
(557, 'Hoshangabad', '20'),
(558, 'Itarsi', '20'),
(559, 'Sehore', '20'),
(560, 'Betul', '20'),
(561, 'Seoni', '20'),
(562, 'Datia', '20'),
(563, 'Nagda', '20'),
(564, 'Ujjain ', '20'),
(565, 'Hoshangabad ', '20'),
(566, 'Kolar ', '20'),
(567, 'Sagar', '20'),
(568, 'Satna', '20'),
(569, 'Ratlam ', '20'),
(570, 'Amanganj', '20'),
(571, 'Kochi', '18'),
(572, 'Trichur', '18'),
(573, 'Kannur', '18'),
(574, 'Quilon', '18'),
(575, 'Alappuzha', '18'),
(576, 'Palakkad', '18'),
(577, 'Manjeri', '18'),
(578, 'Tellicherry', '18'),
(579, 'Ponnani', '18'),
(580, 'Vatakara', '18'),
(581, 'Kanhangad', '18'),
(582, 'Taliparamba', '18'),
(583, 'Payyanur', '18'),
(584, 'Koyilandy', '18'),
(585, 'Neyyattinkara', '18'),
(586, 'Beypore', '18'),
(587, 'Kayamkulam', '18'),
(588, 'Nedumangad', '18'),
(589, 'Punalur', '18'),
(590, 'Tirur', '18'),
(591, 'Nileshwaram', '18'),
(592, 'Kunnamkulam', '18'),
(593, 'Ottappalam', '18'),
(594, 'Tiruvalla', '18'),
(595, 'Adoor', '18'),
(596, 'Perinthalmanna', '18'),
(597, 'Chalakkudy', '18'),
(598, 'Varkala', '18'),
(599, 'Thirurangadi', '18'),
(600, 'Kottarakara', '18'),
(601, 'Cherthala', '18'),
(602, 'Maradu', '18'),
(603, 'Shornur', '18'),
(604, 'Kottakkal', '18'),
(605, 'Mananthavady', '18'),
(606, 'Manjeshwaram', '18'),
(607, 'Uppala', '18'),
(608, 'Pandalam', '18'),
(609, 'Mattanur', '18'),
(610, 'Chavakkad', '18'),
(611, 'Kattappana', '18'),
(612, 'Pathanamthitta', '18'),
(613, 'Attingal', '18'),
(614, 'Paravur', '18'),
(615, 'Ramanattukara', '18'),
(616, 'Kalamassery', '18'),
(617, 'Anchal', '18'),
(618, 'Ernakulam', '18'),
(619, 'Calicut', '18'),
(620, 'Alleppey', '18'),
(621, 'Palghat', '18'),
(622, 'Trichur', '18'),
(623, 'Palghat', '18'),
(624, 'Kollam', '18'),
(625, 'Blackpool', '37'),
(626, 'test done', ''),
(627, '', ''),
(628, 'hello ', ''),
(629, 'going', '');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `c_id` int(11) NOT NULL,
  `c_description` varchar(1000) NOT NULL,
  `product_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  `meta_tag` varchar(255) NOT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `c_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`c_id`, `c_description`, `product_id`, `admin_id`, `user_id`, `r_id`, `meta_tag`, `meta_keyword`, `meta_description`, `c_date`, `status`) VALUES
(2, 'good', 61, 2, 107, 51, '2', '2', '2', '2018-07-24', 2),
(4, 'Test3', 62, 2, 107, 45, '', '', '', '2018-07-24', 1),
(5, 'hello this is good product', 62, 2, 107, 50, '', '', '', '2018-07-25', 1),
(23, 'done ', 62, 2, 107, 45, '', '', '', '2018-08-06', 1),
(24, 'hello sir', 62, 2, 107, 50, '', '', '', '2018-08-07', 1),
(25, 'test', 62, 2, 107, 57, '', '', '', '2018-08-07', 1),
(27, 'test420', 62, 2, 0, 50, '', '', '', '2018-08-08', 1),
(28, 'test420', 62, 2, 0, 50, '', '', '', '2018-08-08', 1),
(31, '9august', 10, 2, 107, 45, '', '', '', '2018-08-09', 1),
(32, 'test', 10, 2, 107, 45, '', '', '', '2018-08-09', 1),
(33, 'yes this is good product', 64, 2, 107, 67, '', '', '', '2018-08-17', 1),
(34, 'very good', 65, 2, 114, 84, '', '', '', '2018-09-05', 1),
(35, 'this is good', 65, 2, 114, 84, '', '', '', '2018-09-05', 1),
(36, 'this is', 65, 2, 114, 84, '', '', '', '2018-09-05', 1);

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
  `c_state` varchar(255) NOT NULL,
  `c_city` varchar(255) NOT NULL,
  `c_zip_code` varchar(255) NOT NULL,
  `c_website` varchar(255) NOT NULL,
  `c_image` varchar(255) NOT NULL,
  `c_video_link` varchar(255) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `meta_tag` varchar(255) NOT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `c_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complain`
--

INSERT INTO `complain` (`c_id`, `c_company_name`, `c_subject`, `c_details`, `c_category`, `c_country`, `c_state`, `c_city`, `c_zip_code`, `c_website`, `c_image`, `c_video_link`, `admin_id`, `user_id`, `product_id`, `meta_tag`, `meta_keyword`, `meta_description`, `c_date`, `status`, `rating`) VALUES
(1, 'atozwebsolution', 'Testing', 'The class .active ', '6', 'business2', '', 'business2', '222302', 'https://www.sarkariresult.com/', 'COM_218871533622076.png', 'https://www.youtube.com/watch?v=azAEHCQgcUI', 2, 107, 0, '', '', '', '2018-08-10', 1, 0),
(28, 'c2shub12', 'TESTING', 'complains of forties ', '7', 'TESTING', '', 'TESTING', '201301', 'http://www.c2shub.com/', 'COM_218871533621518.png', 'test', 2, 107, 0, '', '', '', '2018-08-07', 1, 0),
(33, 'adifunds', 'This is fraod company', 'adifunds.com', '8', 'finance', '', 'finance', '201301', 'adifunds.com', 'COM_2187261532561185.png', 'no link', 2, 107, 0, 'ds', 'hello', 'hloh', '2018-08-07', 1, 0),
(34, 'HCL', 'THIS IS FROAD COMPANY', 'HCL.COM', '9', 'CALLING', '', 'CALLING', '201301', 'CALLING', 'COM_218871533620519.jpg', '', 2, 107, 0, '', '', '', '2018-08-07', 1, 0),
(35, 'c2shub', 'test', 'atoz', '11', '1', '', '116', '210301', '', '', '', 2, 107, 0, '', '', '', '2018-08-16', 1, 0),
(36, 'test', 'test', 'test', '12', '1', '12', '116', '', '', '', '', 2, 107, 0, '', '', '', '2018-08-16', 1, 0),
(43, 'hjhjh', 'hjj', 'jhjhkj', '19', '1', '4', '', '', '', '', '', 2, 107, 0, '', '', '', '2018-08-16', 1, 0),
(50, 'adifunds', 'test', 'test', '6', '1', '2', '2', '210301', '', '', '', 2, 107, 0, '', '', '', '2018-08-17', 1, 0),
(51, 'c2shub', 'test', 'test', '8', '24', '9', 'DEEH DHAGGUPUR', '228125', '', 'COM_2188161534420869.png', '', 2, 107, 0, '', '', '', '2018-08-17', 1, 0),
(52, 'jhj', 'hjh', 'jh', '9', 'Select Country', 'Select state', '', '', '', '', '', 2, 107, 0, '', '', '', '2018-08-17', 1, 0),
(53, 'c2shub', 'tst', 'test', '20', 'Select Country', 'Select state', '', '', '', '', '', 2, 107, 0, '', '', '', '2018-08-17', 1, 0),
(54, 'POLARIS SERVICES INDIA (P) LTD', 'SUBJECT :- CHEATING FROM POLARIS SERVICES INDIA PVT.LTD.', 'To all Indian citizens..\r\nI am Seenaiah khammampati from telangana, khammam dt, Kallur mandal.. My mob number is 8008194628..\r\nOn Jan 24th I received a call from Polaris financial services udaipur executive regarding to personal loan.. Mr. Rahul called me, he said to me, Sir send ur kyc documents and 6months bank statement and 3500/ login charges to sanction 10lakhs loan. Same day I send documents and next day adjusted 3500/ to Polaris bank account. After next day they send 10lakhs loan sanction', '21', '1', '12', '116', '201301', '', 'COM_2188231534999171.jpg', '', 2, 113, 0, '', '', '', '2018-08-23', 1, 0),
(55, 'Realfly', 'payment issues ', 'Hold my payment of website design', '22', '1', '34', '366', '110096', '', 'COM_2188241535089883.png', 'no', 2, 115, 0, '', '', '', '2018-08-24', 1, 0),
(56, 'this is bad expe', 'this is bad expe', 'test', '7', '1', '34', '363', '201301', 'chrome://settings/', '', '', 2, 114, 0, '', '', '', '2018-09-05', 1, 0),
(57, 'test', 'test', 'test', '7', '1', '1', '1', '201301', '', '', '', 2, 114, 0, '', '', '', '2018-09-05', 1, 0),
(58, 'Jobriya', 'Fraud Company in India', 'On Sunday, Cops had intercepted two cars and seized 209.744 kg Marijuana collectively valued at Rs 39,67,120. Cops had arrested drug-peddlers Rajendra alias Laddu Kirad (32), a resident of Satnami Nagar; Nitin Krishnaji Mohadikar (35), a resident of Plot No 77, New Sharda Chowk, Bhavani Nagar, Kalamna; Swapnil Suresh Todasam (30), a resident of Plot No 26, Kharbi Sagar, Aaradhana Nagar; Mahendra Keshavrao Wadankar (32), a resident of Plot No 123, Satnami Nagar, Anil Vishnuprasad Vishwakarma (19)', '7', '1', '12', '116', '201301', '', 'COM_2189191537340670.jpg', '', 2, 113, 0, '', '', '', '2018-09-19', 1, 3),
(59, 'Shoppers Drug Mart ', ' Transfer my meds to another branch of shopper', '<p>I get my methadone from the shoppers drug in saddletown circle n.e. Calgary and on the day of 27 September 2018 I was out of town for work and my car broke down so I can\'t be able to reach there for my dose and I called them and told them to transfer my dose to falconridge location so I can be able to take my dose but the staff didn\'t give me any reason and they just rudely refused my request not even listen my situation and I am really sick right now but the guy name Mohammed who works there', '9', '1', '12', '116', '201301', '', '', '', 2, 113, 0, '', '', '', '2018-09-28', 1, 2),
(80, 'c2shub', 'ok', '<p>jhkhk</p>', '', '1', 'Select State', '', '', '', '', '', 2, 107, 0, '', '', '', '2018-10-15', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `complain_comment`
--

CREATE TABLE `complain_comment` (
  `co_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `complain_id` int(11) NOT NULL,
  `co_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `c_rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complain_comment`
--

INSERT INTO `complain_comment` (`co_id`, `comment`, `user_id`, `admin_id`, `complain_id`, `co_date`, `status`, `c_rating`) VALUES
(2, 'yes this is a good company', 107, 2, 51, '2018-08-18', 1, 0),
(3, 'gjgj', 107, 2, 51, '2018-08-18', 1, 0),
(4, 'hello', 107, 2, 50, '2018-08-20', 1, 0),
(5, 'hello', 107, 2, 51, '2018-08-20', 1, 0),
(6, 'testing', 107, 2, 50, '2018-08-20', 1, 0),
(8, 'test', 107, 2, 51, '2018-08-20', 1, 0),
(9, 'hello', 112, 2, 50, '2018-08-20', 1, 0),
(10, 'ok test', 112, 2, 35, '2018-08-20', 1, 0),
(13, 'yes done', 112, 2, 35, '2018-08-20', 1, 0),
(15, 'reply', 112, 2, 50, '2018-08-20', 1, 0),
(16, 'hello', 112, 2, 51, '2018-08-20', 1, 0),
(17, 'vishal singh', 112, 2, 51, '2018-08-20', 1, 0),
(18, 'this is good', 112, 2, 51, '2018-08-20', 1, 0),
(19, 'hello yes', 112, 2, 51, '2018-08-20', 1, 0),
(20, 'this my test again', 112, 2, 51, '2018-08-20', 1, 0),
(21, 'yes ok test', 112, 2, 33, '2018-08-20', 1, 0),
(22, 'yes ok test', 112, 2, 33, '2018-08-20', 1, 0),
(23, 'okkkkk', 112, 2, 51, '2018-08-20', 1, 0),
(24, 'right', 112, 2, 1, '2018-08-20', 1, 0),
(25, 'right', 112, 2, 1, '2018-08-20', 1, 0),
(26, 'ooooo', 112, 2, 51, '2018-08-20', 1, 0),
(27, 'yesss', 112, 2, 33, '2018-08-20', 1, 0),
(28, 'yesss', 112, 2, 33, '2018-08-20', 1, 0),
(29, 'uuuuu', 112, 2, 33, '2018-08-20', 1, 0),
(30, 'uuuuu', 112, 2, 33, '2018-08-20', 1, 0),
(31, 'uuuuu', 112, 2, 33, '2018-08-20', 1, 0),
(32, 'hello', 112, 2, 52, '2018-08-20', 1, 0),
(33, 'hello', 112, 2, 52, '2018-08-20', 1, 0),
(34, 'hello', 112, 2, 52, '2018-08-20', 1, 0),
(35, 'hello', 112, 2, 52, '2018-08-20', 1, 0),
(36, 'hello', 112, 2, 52, '2018-08-20', 1, 0),
(37, 'hello', 112, 2, 52, '2018-08-20', 1, 0),
(38, 'hello', 112, 2, 52, '2018-08-20', 1, 0),
(39, 'hello', 112, 2, 52, '2018-08-20', 1, 0),
(40, 'hello', 112, 2, 51, '2018-08-20', 1, 0),
(41, 'hello', 107, 2, 51, '2018-08-21', 1, 0),
(42, 'hello', 107, 2, 51, '2018-08-21', 1, 0),
(43, 'hello', 107, 2, 51, '2018-08-21', 1, 0),
(44, 'hello', 107, 2, 51, '2018-08-21', 1, 0),
(45, 'hello', 107, 2, 51, '2018-08-21', 1, 0),
(46, 'hello', 107, 2, 51, '2018-08-21', 1, 0),
(47, 'hello', 107, 2, 51, '2018-08-21', 1, 0),
(48, 'hello', 107, 2, 51, '2018-08-21', 1, 0),
(49, 'hello', 107, 2, 51, '2018-08-21', 1, 0),
(50, 'hello', 107, 2, 51, '2018-08-21', 1, 0),
(51, 'hello', 107, 2, 51, '2018-08-21', 1, 0),
(52, 'hello', 107, 2, 51, '2018-08-21', 1, 0),
(53, 'test', 107, 2, 51, '2018-08-22', 1, 0),
(54, 'hrloo', 113, 2, 54, '2018-08-23', 1, 0),
(55, 'h', 107, 2, 50, '2018-08-23', 1, 0),
(56, 'test', 114, 2, 56, '2018-09-05', 1, 0),
(57, 'test', 114, 2, 56, '2018-09-05', 1, 0),
(58, 'this', 114, 2, 56, '2018-09-05', 1, 0),
(59, 'test', 114, 2, 56, '2018-09-05', 1, 0),
(60, 'not ok', 114, 2, 56, '2018-09-05', 1, 0),
(61, 'very good', 114, 2, 56, '2018-09-05', 1, 0),
(62, 'very bad', 107, 2, 58, '2018-09-20', 1, 0),
(63, '<p>test</p>', 107, 2, 56, '2018-09-20', 1, 0),
(64, '<p>&nbsp;</p>', 107, 2, 56, '2018-09-20', 1, 0),
(65, '<p>test</p>', 107, 2, 58, '2018-09-22', 1, 3),
(66, '<p>test</p>', 107, 2, 58, '2018-09-22', 1, 3),
(67, 'ok', 107, 2, 1, '2018-09-22', 1, 0),
(68, 'ok', 107, 2, 50, '2018-09-22', 1, 0),
(69, 'yes', 107, 2, 59, '2018-10-15', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `complain_like`
--

CREATE TABLE `complain_like` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `complain_id` int(11) NOT NULL,
  `action` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complain_like`
--

INSERT INTO `complain_like` (`id`, `customer_id`, `complain_id`, `action`) VALUES
(6, 107, 50, 'like'),
(7, 107, 51, 'dislike'),
(8, 107, 33, 'dislike'),
(9, 107, 34, 'like'),
(10, 107, 52, 'like'),
(11, 107, 1, 'like'),
(12, 112, 50, 'dislike'),
(13, 112, 43, 'like'),
(14, 112, 51, 'like'),
(15, 114, 50, 'like'),
(16, 116, 1, 'like'),
(17, 116, 50, 'like'),
(18, 116, 28, 'like'),
(19, 116, 51, 'like'),
(20, 116, 33, 'like'),
(21, 116, 52, 'like'),
(23, 116, 34, 'like'),
(24, 116, 35, 'like'),
(25, 116, 36, 'like'),
(26, 116, 53, 'like'),
(27, 116, 54, 'like'),
(28, 116, 55, 'like'),
(29, 113, 58, 'like'),
(30, 107, 55, 'like');

-- --------------------------------------------------------

--
-- Table structure for table `complain_reply`
--

CREATE TABLE `complain_reply` (
  `r_id` int(11) NOT NULL,
  `reply` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `complain_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `date` date NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complain_reply`
--

INSERT INTO `complain_reply` (`r_id`, `reply`, `user_id`, `comment_id`, `complain_id`, `status`, `date`, `admin_id`) VALUES
(1, 'hello sir', 107, 3, 51, 1, '2018-08-18', 2),
(2, 'yes', 107, 4, 50, 1, '2018-08-20', 2),
(3, 'yes right', 112, 2, 51, 1, '2018-08-20', 2),
(4, 'test', 112, 2, 51, 1, '2018-08-20', 2),
(5, 'first reply', 112, 20, 51, 1, '2018-08-20', 2),
(6, 'first', 112, 20, 51, 1, '2018-08-20', 2),
(7, 'first test', 112, 5, 51, 1, '2018-08-20', 2),
(8, 'test', 107, 2, 51, 1, '2018-08-22', 2),
(9, 'good company', 114, 15, 50, 1, '2018-08-22', 2),
(10, 'very nice', 114, 15, 50, 1, '2018-08-22', 2),
(11, 'ok', 114, 58, 56, 1, '2018-09-05', 2),
(12, 'very good', 114, 60, 56, 1, '2018-09-05', 2),
(13, 'ok', 107, 62, 58, 1, '2018-09-20', 2),
(14, 'done', 107, 65, 58, 1, '2018-09-22', 2),
(15, 'hello', 107, 66, 58, 1, '2018-10-15', 2),
(16, 'hello', 107, 66, 58, 1, '2018-10-15', 2),
(17, 'hello', 107, 66, 58, 1, '2018-10-15', 2),
(18, 'hello', 107, 66, 58, 1, '2018-10-15', 2),
(19, 'hello', 107, 66, 58, 1, '2018-10-15', 2),
(20, 'hello', 107, 66, 58, 1, '2018-10-15', 2),
(21, 'nothing', 107, 53, 51, 1, '2018-10-15', 2);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `country_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `country_name`) VALUES
(1, 'India'),
(2, 'Iceland'),
(3, 'Indonesia'),
(4, 'Iraq'),
(5, 'Israel'),
(6, 'Italy'),
(7, 'Ireland'),
(8, 'Jamaica'),
(9, 'Japan'),
(10, 'Jordan'),
(11, 'Afghanistan'),
(12, 'Albania'),
(13, 'Algeria'),
(14, 'American Samoa'),
(15, 'Malaysia'),
(16, 'Egypt'),
(17, 'Australia'),
(18, 'Singapore'),
(19, 'Thailand'),
(20, 'Sri Lanka'),
(21, 'Iceland'),
(22, 'France'),
(23, 'China'),
(24, 'Nepal'),
(25, 'Germany'),
(26, 'Hungary'),
(27, 'Saudi Arabia'),
(28, 'Oman'),
(29, 'Kuwait'),
(30, 'Canada'),
(31, 'United States of America (USA)'),
(32, 'Mexico'),
(33, 'Brazil'),
(34, 'Uruguay'),
(35, 'Venezuela'),
(36, 'South Africa'),
(37, 'England'),
(38, 'Scotland');

-- --------------------------------------------------------

--
-- Table structure for table `facility`
--

CREATE TABLE `facility` (
  `f_id` int(11) NOT NULL,
  `f_name` text NOT NULL,
  `admin_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `f_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facility`
--

INSERT INTO `facility` (`f_id`, `f_name`, `admin_id`, `product_id`, `f_date`) VALUES
(4, 'por', 2, 10, '2018-07-21'),
(9, 'This Mobile Camera Feature is excellent.', 2, 66, '2018-08-08'),
(10, 'This is nice product', 2, 63, '2018-08-08'),
(11, 'This software feature is excellent.', 2, 64, '2018-08-08'),
(13, 'All facility is better on this company', 2, 62, '2018-08-08'),
(14, 'Facility Test is ok', 2, 62, '2018-07-30'),
(15, 'This is a  Good company ', 2, 65, '2018-08-08'),
(16, 'ok and done', 2, 61, '2018-07-30'),
(17, 'This Mobile Processor is High.', 2, 66, '2018-08-08'),
(18, 'Ac classess ', 2, 109, '2018-09-02'),
(19, 'wifi', 2, 109, '2018-09-02'),
(20, '<p>new fac</p>\r\n', 2, 110, '2018-09-24'),
(21, '<p>new fac</p>\r\n', 2, 110, '2018-09-24'),
(22, '<p>new fac</p>\r\n', 2, 110, '2018-09-24'),
(23, '<p>new fac</p>\r\n', 2, 110, '2018-09-24'),
(24, '<ul>\r\n	<li>24*7 Support</li>\r\n	<li>Monthly Report.&nbsp;</li>\r\n	<li>100% Money Back gurantee</li>\r\n	<li>Healty Working Envirement</li>\r\n</ul>\r\n', 2, 111, '2018-09-28');

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
(76, '511qpyTfuIL._SL1000_.jpg', 2, 63, '2018-07-21'),
(82, 'download.jpg', 2, 63, '2018-07-21'),
(83, 'mod1.jpg', 2, 10, '2018-08-17'),
(84, 'kumbh-mela.jpg', 2, 10, '2018-08-17'),
(85, 'kumbh-mela.jpg', 2, 66, '2018-08-17'),
(86, 'mod1.jpg', 2, 66, '2018-08-17'),
(87, 'kumbh-mela.jpg', 2, 66, '2018-08-17'),
(88, 'mod1.jpg', 2, 66, '2018-08-17'),
(89, 'mod1.jpg', 2, 66, '2018-08-17'),
(90, 'jobriya1.jpg', 2, 109, '2018-09-02'),
(91, 'jobriya 2.jpg', 2, 109, '2018-09-02'),
(92, 'jobriya 3.jpg', 2, 109, '2018-09-02'),
(93, 'jobriya 4.jpg', 2, 109, '2018-09-02'),
(95, 'traffic 1.png', 2, 111, '2018-09-28');

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
  `subcategory1` int(11) NOT NULL,
  `subcategory2` int(11) NOT NULL,
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
  `user_id` int(11) NOT NULL,
  `meta_tag` varchar(255) NOT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `pin_code` varchar(255) NOT NULL,
  `establishment` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`company_id`, `company_name`, `category`, `subcategory1`, `subcategory2`, `mobile`, `email`, `title`, `product_rating`, `description`, `product_image`, `address`, `website`, `latitude`, `longnitude`, `map_code`, `p_date`, `admin_id`, `user_id`, `meta_tag`, `meta_keyword`, `meta_description`, `status`, `country`, `city`, `state`, `pin_code`, `establishment`) VALUES
(10, 'CAMERA', '6', 8, 0, '8181052357', 'singhvishal120012@gmail.com', 'CAMERA', 3, 'A mobile phone, known as a cell phone in North America, is a portable telephone that can make and receive calls over a radio frequency link while the user is ...', 'PRO_218871533619977.jpg', 'noida58', 'www.sarkari result.com', '', 'test', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d112087.59363108553!2d77.28524703427647!3d28.60765670466003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x390ce56c8e04d09d%3A0x3c352a87f1a93490!2sc2s+hub!3m2!1d28.6076747!2d77.3552873!5e0!3m2!1sen!2sin!4v1531403386456\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', '2018-06-19', '2', 0, '', '', '', 1, 'Select Category', 'Select Category', 'Select Category', '', ''),
(61, 'MOVIES', '11', 4, 0, '8181052357', 'singhvishal120012@gmail.com', 'SANJU', 0, 'A mobile phone, known as a cell phone in North America, is a portable telephone that can make and receive calls over a radio frequency link while the user is ...', 'PRO_218871533620133.gif', 'noida58', 'www.sarkari result.com', '', '', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d112087.59363108553!2d77.28524703427647!3d28.60765670466003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x390ce56c8e04d09d%3A0x3c352a87f1a93490!2sc2s+hub!3m2!1d28.6076747!2d77.3552873!5e0!3m2!1sen!2sin!4v1531403386456\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', '2018-06-19', '2', 0, '', '', '', 1, '', '', '', '', ''),
(62, 'c2s hub a', '9', 5, 3, '8587000514', 'c2shub.pvt@gmail.com', 'channel manager company', 0, 'This is good and any point to support him', 'PRO_2187231532367307.png', '', 'http://www.c2shub.com/', '', '', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d112087.59363108553!2d77.28524703427647!3d28.60765670466003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x390ce56c8e04d09d%3A0x3c352a87f1a93490!2sc2s+hub!3m2!1d28.6076747!2d77.3552873!5e0!3m2!1sen!2sin!4v1531403386456\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', '2018-06-28', '2', 0, '', '', '', 1, '', '', '', '', ''),
(63, 'Fortis ', '12', 12, 12, '8181818181', 'shwetachaurasiya9@gmail.com', ' Lowest Interest Rate On Personal Loan 2', 0, 'I have done two time successful transaction of 5 rupee but nowhere it show to transfer my amount to my account from payu money.  How to I can Transfer my amount to my account please guide me. My Regis', 'PRO_2187121531375087.png', 'B-22, Sector 62, Gautam Buddh Nagar, Noida, Uttar Pradesh 201301', 'http://www.fortishealthcare.com/', '12345678', '1234567', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d112087.59363108553!2d77.28524703427647!3d28.60765670466003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x390ce56c8e04d09d%3A0x3c352a87f1a93490!2sc2s+hub!3m2!1d28.6076747!2d77.3552873!5e0!3m2!1sen!2sin!4v1531403386456\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', '2017-01-01', '2', 0, 'ok', 'ok2', 'ok3', 1, '5', 'Select Category', 'Select Category', '', ''),
(64, 'SOFTWARE', '9', 5, 8, '789654136', 'singhvishla12@gmail.com', 'test', 0, '', 'PRO_218871533619769.png', 'noida 58', 'https://www.google.com/', 'test', 'test', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3504.2463908496934!2d77.34317521467837!3d28.562363082445557!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce5c615555555%3A0x7ba9729a3adbc962!2sNoida+Golf+Course!5e0!3m2!1sen!2sin!4v1533619361183\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', '2018-07-02', '2', 0, '', '', '', 1, '4', 'Select Category', 'Select Category', '', ''),
(65, 'FORTIES', '12', 11, 0, '7896321545', 'singhvishla0012@gmail.com', 'Subject', 0, 'ok', 'PRO_218871533619739.jpg', 'Allahabad', 'https://www.sarkariresult.com/', '', '', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3504.2463908496934!2d77.34317521467837!3d28.562363082445557!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce5c615555555%3A0x7ba9729a3adbc962!2sNoida+Golf+Course!5e0!3m2!1sen!2sin!4v1533619361183\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', '2017-07-02', '2', 0, 'as', 'sa', 'sa', 1, '3', '50', '25', '', '<p>test !&#39;sdas,ndbsd &#39;asjs,vds ;&#39;slkashvd shjhg &#39; aslaks</p>\r\n\r\n<p><strong>TESTM</strong></p>\r\n'),
(66, 'SAMSUNG MOBILE ', '7', 7, 9, '45346534532', 'singhvishla12@gmail.com', 'SAMSUNG J1 ', 1, '', 'PRO_2187191531978962.jpg', 'NOIDA 43', 'https://www.sarkariresult.com/', '', '', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7008.371832105342!2d77.3398651238253!3d28.56417942977905!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce5c7d6cf8aad%3A0x5163b56206900e5e!2sNoida+Golf+Course%2C+Sector+43%2C+Noida%2C+Uttar+Pradesh+201303!5e0!3m2!1sen!2sin!4v1533619138732\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', '2018-07-22', '2', 0, 'best samsung mobile in noida,best samsung mobile in noida,best samsung mobile in noida', 'best samsung mobile in noida keyqord,best samsung mobile in noida keyqord,best samsung mobile in noida keyqord,best samsung mobile in noida keyqord', 'best samsung mobile in noida desc', 1, '2', '12', '15', '', ''),
(107, 'vishal', '6', 18, 0, '8181052357', 'singhvishal120012@gmail.com', 'yogesh', 4, 'I have done two time successful transaction of 5 rupee but nowhere it show to transfer my amount to my account from payu money.  How to I can Transfer my amount to my account please guide me. My Regis', 'PRO_2188161534427824.png', 'VILL & POST- DEEH DHAGGUPUR SULTANPUR', 'www.sarkari result.com', 'fdgf', '1234567', '', '2018-08-14', '2', 107, '', '', '', 1, '11', 'Select Category', 'Select Category', '', '<ul>\r\n	<li>\r\n	<h2 style=\"font-style: italic;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce semper, magna a ultricies volutpat, mi eros viverra massa, vitae consequat nisi justo in tortor. Proin accumsan felis ac felis dapibus, non iaculis mi varius.</h2>\r\n	</li>\r\n	<li>\r\n	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce semper, magna a ultricies volutpat, mi eros viverra massa, vitae consequat nisi justo in tortor. Proin accumsan felis ac felis dapibus, non iaculis mi varius.</p>\r\n	</li>\r\n	<li>\r\n	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce semper, magna a ultricies volutpat, mi eros viverra massa, vitae consequat nisi justo in tortor. Proin accumsan felis ac felis dapibus, non iaculis mi varius.</p>\r\n	</li>\r\n	<li>\r\n	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce semper, magna a ultricies volutpat, mi eros viverra massa, vitae consequat nisi justo in tortor. Proin accumsan felis ac felis dapibus, non iaculis mi varius.</p>\r\n	</li>\r\n</ul>'),
(108, 'Arpan Tutorials', '7', 20, 0, '9044540038', 'info@arpantutorials.com', 'Best Coaching in Faizabad ', 5, 'à¤µà¤¿à¤¦à¥à¤¯à¤¾à¤¦à¤¾à¤¯à¤¨à¥€ à¤•à¥€ à¤…à¤¨à¥à¤•à¤®à¥à¤ªà¤¾ à¤¸à¥‡ ARPAN TUTORIALS à¤•à¥€ à¤¸à¥à¤°à¥à¤µà¤¾à¤¤ à¤¸à¤¨ 2012  à¤®à¥‡à¤‚  à¤¤à¤¹à¤¸à¥€à¤²à¤¦à¤¾à¤° à¤®à¥‡à¤¨à¥à¤¶à¤¨ à¤†à¤¶à¤¾à¤ªà¥', 'PRO_218921535885862.jpg', 'Tehsildar Mansion, Ashapur, Faizabad, Uttar Pradesh 224123', 'https://www.arpantutorials.com/', '', '', '', '2018-09-02', '2', 113, '', '', '', 1, '1', '483', '12', '224001', ''),
(109, 'Jobriya.net', '7', 20, 0, '9999615069', 'rajeshlkce@gmail.com', 'Education Portal In India', 5, 'Jobriya.net: Visit our Website to get complete information about Government Jobs,jobs notification,Exam pattern, Sarkari Result, Syllabus, and also get Study', 'PRO_218921535887505.png', 'Noida Sector 62', 'https://www.jobriya.net', '', '', '', '2018-09-01', '2', 0, 'Best Website For Govt Jobs Notification-Rajesh Kumar', 'jobriya,ibps po jobs,railway jobs,ssc jobs', 'we are one of the best jobs notification provider company in india. which provide jobs and study material. ', 1, '1', '116', '12', '224001', '<h1>New Jobs&nbsp;</h1>\r\n\r\n<p>Good news for those candidates who are looking for Today&nbsp;in &nbsp;released the official notification to fill&nbsp;<strong>Vijaya Bank&nbsp;</strong><strong>Probationary Asst Manager Online&nbsp;Form&nbsp;2018</strong>. Candidate who want to apply for&nbsp;<strong>Vijaya Bank Probationary Asst Manager Online&nbsp;Form&nbsp;2018&nbsp;</strong>can check all eligibale candidate apply<strong>&nbsp;Vijaya Bank</strong>&nbsp;<strong>Probationary Asst Manager Online&nbsp;Form&nbsp;2018</strong>&nbsp;and apply online. Online Application for&nbsp;<strong>Vijaya Bank Probationary Asst Manager start&nbsp;</strong><strong>from 12-09-2018</strong>&nbsp;and last date for online application form&nbsp;<strong>&nbsp;Vijaya Bank Probationary Asst Manager&nbsp;27-09-2018.</strong><strong>Vijaya Bank Probationary Asst Manager&nbsp;</strong>syllabus 2018. For more details about&nbsp;<strong>Vijaya Bank Probationary Asst Manager&nbsp;</strong>recruitment 2018<strong>&nbsp;</strong>Here you can also check&nbsp;<strong>&nbsp;Vijaya Bank Probationary Asst Manager&nbsp;</strong>like age recruitment, qualification details fee details and given below. Here we also provide you&nbsp;<strong>Vijaya Bank Probationary Asst Manager</strong>&nbsp;exam date. so Touch with us for latest information about<strong>&nbsp;Vijaya Bank Probationary Asst Manager&nbsp;</strong>vacancy.</p>\r\n'),
(110, 'test test', '22', 0, 0, '8989898989', 'shweta@gmail.com', 'test', 3, '<p><strong>hello dear,</strong></p><p><a href=\"http://demo.c2shub.com/rajesh/rajesh/\">welcome Â Â </a></p><p><a href=\"http://demo.c2shub.com/rajesh/rajesh/\">done Â Â </a></p>', 'PRO_2189241537777646.jpg', 'test', 'http://demo.c2shub.com/rajesh/rajesh/', '111111', '1111111111', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d224346.61368048817!2d77.06889969034492!3d28.52721814399746!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cfd5b347eb62d%3A0x52c2b7494e204dce!2sNew+Delhi%2C+Delhi!5e0!3m2!1sen!2sin!4v1537773719026\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', '2018-09-11', '2', 107, '', '', '', 0, '1', '417', '34', '201301', ''),
(111, 'Traffic Wala', '9', 10, 0, '09897697333', 'traffic@trafficwala.com', 'Best Seo Company in India- Trafficwala.com ', 5, '', 'PRO_2189281538113484.png', 'G 11, Basement Sector - 63, NOIDA NCR Delhi - 201307', 'http://www.trafficwala.com/', '', '', '', '2018-09-28', '2', 0, 'Best Seo Company in India- Trafficwala.com ', 'SEO India, SEO in India, SEO Services in India, Cheap SEO India,SEO Service in India, SEO Services ', 'Trafficwala is one of the leading SEO services provider company in india. Trafficwala offering wide range of solutions for SEO India, Web Development as well as ORM.', 1, '1', '116', '12', '201301', '<p>Based at NOIDA, INDIA in the outskirts of New Delhi, Trafficwala is among the fastest growing internet company in the arena of Search Marketing, Search Engine Optimization &amp; Pay per click managemen. Traffice wala establis in 2008</p>\r\n'),
(112, 'Digitviral', '9', 10, 26, '9889929191', 'rajesh.k@digitviral.com', '>Digital Marketing Company &amp; Internet Marketing Services', 5, '<p>Establishing your brand online locally and globally at lowest cost. You are able to present your brand&nbsp;across the globe. When somebody searching you get the right impression across the globe.<', 'PRO_2189281538114796.jpg', 'sector 62', 'https://digitviral.com/', '', '', '', '2018-09-28', '2', 113, '', '', '', 0, '1', '116', '12', '201301', '');

-- --------------------------------------------------------

--
-- Table structure for table `qa_rating_info`
--

CREATE TABLE `qa_rating_info` (
  `id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `rating_action` varchar(255) NOT NULL,
  `question_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qa_rating_info`
--

INSERT INTO `qa_rating_info` (`id`, `customer_id`, `product_id`, `rating_action`, `question_id`) VALUES
(81, 107, 62, 'dislike', 53),
(82, 107, 62, 'dislike', 54),
(83, 107, 0, 'like', 62),
(84, 107, 0, 'like', 70);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `q_id` int(11) NOT NULL,
  `q_name` varchar(500) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `meta_tag` varchar(255) NOT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `q_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`q_id`, `q_name`, `product_id`, `user_id`, `admin_id`, `meta_tag`, `meta_keyword`, `meta_description`, `q_date`, `status`) VALUES
(48, 'Tell me some good and extra features of HP Pavilion 15-cc129tx', 0, 107, 2, '', '', '', '2018-07-26', 1),
(49, 'What is Your Name.. ?', 0, 107, 2, 'hello', 'hello', 'hloh', '2018-07-27', 1),
(50, 'hello', 61, 107, 2, '', '', '', '2018-07-27', 1),
(51, 'question test', 62, 107, 2, 'ds', 'sda', 'ds', '2018-07-28', 1),
(52, 'Can I Join Job Ria', 109, 114, 2, '', '', '', '2018-09-04', 1),
(53, 'test', 0, 114, 2, '', '', '', '2018-09-05', 1),
(54, 'new quest', 0, 114, 2, '', '', '', '2018-09-10', 1),
(55, '<p>&nbsp;</p>', 0, 107, 2, '', '', '', '2018-09-22', 1),
(56, '<p>&nbsp;</p>', 0, 107, 2, '', '', '', '2018-09-22', 1),
(57, 'how to create add', 0, 107, 2, '', '', '', '2018-09-22', 1),
(58, 'add new question', 0, 107, 2, '', '', '', '2018-09-22', 1),
(59, 'add new question', 0, 107, 2, '', '', '', '2018-09-22', 1),
(60, 'add new question', 0, 107, 2, '', '', '', '2018-09-22', 1),
(61, 'test new question', 0, 107, 2, '', '', '', '2018-09-22', 1),
(62, 'test new question', 0, 107, 2, '', '', '', '2018-09-22', 1),
(63, 'Whja is my anme', 0, 113, 2, '', '', '', '2018-09-29', 1),
(64, 'tell me about this phone features', 66, 107, 2, '', '', '', '2018-10-10', 1),
(65, 'hello', 65, 107, 2, '', '', '', '2018-10-10', 1),
(66, 'hello', 0, 107, 2, '', '', '', '2018-10-11', 1),
(67, 'hello', 0, 107, 2, '', '', '', '2018-10-15', 1),
(68, 'h test', 65, 107, 2, '', '', '', '2018-10-15', 1),
(69, 'j', 65, 107, 2, '', '', '', '2018-10-15', 1),
(70, 'ok', 0, 107, 2, '', '', '', '2018-10-22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rating_info`
--

CREATE TABLE `rating_info` (
  `id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `r_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `rating_action` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating_info`
--

INSERT INTO `rating_info` (`id`, `customer_id`, `r_id`, `product_id`, `rating_action`) VALUES
(212, 107, 52, 61, 'like'),
(213, 107, 57, 62, 'like'),
(214, 107, 67, 64, 'dislike'),
(215, 107, 68, 64, 'dislike'),
(216, 113, 69, 108, 'like'),
(217, 114, 82, 66, 'like'),
(218, 114, 65, 66, 'like');

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
  `r_description` text,
  `meta_tag` varchar(255) NOT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `meta_description` text NOT NULL,
  `r_date` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`r_id`, `product_id`, `user_id`, `admin_id`, `r_image`, `r_title`, `r_rating`, `r_description`, `meta_tag`, `meta_keyword`, `meta_description`, `r_date`, `status`) VALUES
(45, 10, 107, 2, NULL, 'test', '5', 'test', '', '', '', '2018-07-04', 1),
(50, 62, 106, 2, 'REV_218751530779444.jpg', 'test2', '5', 'test', '50', '50', '50', '2018-07-05', 1),
(51, 63, 107, 2, 'REV_218751530779838.jpg', 'vishal', '2', 'Vishal', '', '', '', '2018-07-05', 2),
(52, 61, 107, 2, 'REV_218751530782325.jpg', 'vishal singh', '4', 'rajpoot', '', '', '', '2018-07-05', 1),
(53, 61, 109, 2, 'REV_218751530782529.jpg', 'test 1', '5', 'test 2', '', '', '', '2018-07-05', 1),
(54, 64, 108, 2, 'REV_218751530782702.jpg', 'test', '5', 'test', '', '', '', '2018-07-05', 1),
(55, 65, 109, 2, 'REV_218751530785911.jpg', 'review', '5', 'vishal singh', '', '', '', '2018-07-05', 1),
(57, 62, 111, 2, 'REV_2187111531290167.jpg', 'Good Product', '4', 'Good', '', '', '', '2018-07-11', 1),
(58, 62, 107, 2, 'no', 'Porash', '4', 'Porash', '', '', '', '2018-07-11', 1),
(65, 66, 107, 2, 'REV_2187231532380957.jpg', 'test23vvvxcv', '3', 'hgfg', '', '', '', '2018-07-23', 1),
(67, 64, 107, 2, NULL, 'this is good product', '2', 'good', '', '', '', '2018-08-17', 0),
(68, 64, 107, 2, NULL, 'no this is goog ', '2', 'm,jn', '', '', '', '2018-08-17', 0),
(69, 108, 113, 2, NULL, 'Best Coaching', '5', 'Really Arpan Tutorials is one of the Best Coaching in faizabad. ', '', '', '', '2018-09-02', 0),
(70, 108, 113, 2, NULL, 'Best Coaching', '5', 'Really Arpan Tutorials is one of the Best Coaching in faizabad. ', '', '', '', '2018-09-02', 0),
(71, 108, 117, 2, NULL, 'Good Staff', '5', 'There teaching process is very good. they have very qualified staff. ', '', '', '', '2018-09-02', 0),
(72, 108, 117, 2, NULL, 'Good Staff', '5', 'There teaching process is very good. they have very qualified staff. ', '', '', '', '2018-09-02', 0),
(73, 64, 114, 2, NULL, 'this is very good experience', '2', 'this is very good experience', '', '', '', '2018-09-04', 0),
(74, 64, 114, 2, NULL, 'this is very good experience', '2', 'this is very good experience', '', '', '', '2018-09-04', 0),
(75, 61, 114, 2, NULL, 'this is very good movie', '2', 'this is very good movie', '', '', '', '2018-09-04', 0),
(76, 61, 114, 2, NULL, 'this is very good movie', '2', 'this is very good movie', '', '', '', '2018-09-04', 0),
(77, 61, 114, 2, NULL, 'this is good experience', '2', 'this is good experience', '', '', '', '2018-09-04', 1),
(78, 61, 114, 2, NULL, 'this is good experience', '2', 'this is good experience', '', '', '', '2018-09-04', 1),
(79, 61, 114, 2, NULL, 'this is good experience', '2', 'this is good experience', '', '', '', '2018-09-04', 1),
(80, 61, 114, 2, NULL, 'this is good experience', '2', 'this is good experience', '', '', '', '2018-09-04', 1),
(81, 61, 114, 2, NULL, 'history', '2', 'history', '', '', '', '2018-09-04', 1),
(82, 66, 114, 2, NULL, 'this is very good', '1', 'this is very good desc', '', '', '', '2018-09-04', 1),
(83, 65, 114, 2, NULL, 'tes', '2', 'test', '', '', '', '2018-09-05', 1),
(84, 65, 114, 2, NULL, 'new review', '1', 'test', '', '', '', '2018-09-05', 1),
(85, 109, 113, 2, NULL, 'fraud company ', 'Select Rating', '<p>good website for jobs preparation . they provide all kind of syllabus <a href=\"http://olx.in\">click here</a>&nbsp;welcome</p>\r\n', '', '', '', '2018-09-18', 1),
(86, 61, 107, 2, 'REV_2189241537787175.jpg', 'very goog', '2', '<p>test come</p>', '', '', '', '2018-09-24', 1),
(87, 111, 113, 2, NULL, 'Good Company', '5', '<p>They have highly experience people. they do work at time. really good company.&nbsp;</p>', '', '', '', '2018-09-28', 1),
(88, 65, 107, 2, NULL, 'hkjhkj', '2', '<p>kljj</p>', '', '', '', '2018-10-15', 1),
(89, 65, 107, 2, NULL, 'test', '2', '<p>test</p>', '', '', '', '2018-10-15', 1),
(90, 65, 107, 2, NULL, 'test', '2', '<p>l</p>', '', '', '', '2018-10-15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `r_comment_reply`
--

CREATE TABLE `r_comment_reply` (
  `reply_id` int(11) NOT NULL,
  `reply` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `review_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `admin_id` int(11) NOT NULL,
  `r_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_comment_reply`
--

INSERT INTO `r_comment_reply` (`reply_id`, `reply`, `user_id`, `product_id`, `review_id`, `comment_id`, `status`, `admin_id`, `r_date`) VALUES
(1, 'tfgr', 107, 64, 67, 33, 1, 2, '2018-08-28'),
(2, 'truy', 107, 64, 67, 33, 1, 2, '2018-08-28'),
(3, 'ok test', 107, 64, 67, 35, 1, 2, '2018-08-28'),
(4, 'jhghjghjg', 107, 64, 67, 36, 1, 2, '2018-08-29'),
(5, 'test good', 114, 65, 84, 36, 1, 2, '2018-09-05'),
(6, 'hello', 107, 62, 50, 26, 1, 2, '2018-10-10');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `state_name` varchar(100) NOT NULL,
  `country_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `state_name`, `country_id`) VALUES
(1, 'Andaman and Nicobar Islands', '1'),
(2, 'Andhra Pradesh', '1'),
(3, 'Arunachal Pradesh', '1'),
(4, 'Assam', '1'),
(5, 'Bihar', '1'),
(6, 'Chandigarh', '1'),
(7, 'Chhattisgarh', '1'),
(8, 'Dadra and Nagar Haveli', '1'),
(9, 'Himachal Pradesh', '1'),
(10, 'Uttarakhand', '1'),
(11, 'Maharashtra', '1'),
(12, 'Uttar Pradesh', '1'),
(13, 'Gujarat', '1'),
(14, 'Goa', '1'),
(15, 'Jammu and Kashmir', '1'),
(16, 'Jharkhand', '1'),
(17, 'Karnataka', '1'),
(18, 'Kerala', '1'),
(19, 'Lakshadweep', '1'),
(20, 'Madhya Pradesh', '1'),
(21, 'Manipur', '1'),
(22, 'Meghalaya', '1'),
(23, 'Mizoram', '1'),
(24, 'Nagaland', '1'),
(25, 'Odisha', '1'),
(26, 'Puducherry ', '1'),
(27, 'Punjab', '1'),
(28, 'Rajasthan', '1'),
(29, 'Sikkim', '1'),
(30, 'Tamil Nadu', '1'),
(31, 'Telangana', '1'),
(32, 'Tripura', '1'),
(33, 'West Bengal', '1'),
(34, 'New Delhi', '1'),
(35, 'Daman and Diu', '1'),
(36, 'Haryana', '1'),
(37, 'Lancashire', '37'),
(38, 'Bedfordshire', '37');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory1`
--

CREATE TABLE `subcategory1` (
  `sub_cat_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sub_cat_name` varchar(255) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `meta_tag` varchar(255) NOT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory1`
--

INSERT INTO `subcategory1` (`sub_cat_id`, `cat_id`, `sub_cat_name`, `admin_id`, `meta_tag`, `meta_keyword`, `meta_description`, `status`) VALUES
(4, 11, 'Sanju', 2, '', '', '', 1),
(5, 9, 'Booking Engine', 2, '', '', '', 1),
(7, 7, 'Uptu', 2, '', '', '', 1),
(8, 6, 'Web Camera', 2, '', '', '', 1),
(9, 9, 'Hardware', 2, '', '', '', 1),
(10, 9, 'Software', 2, '10', '10', '10', 1),
(11, 12, 'Dev Hospitals', 2, '', '', '', 1),
(12, 12, 'Forties Hospitals', 2, 'ds', 'hello', 'hloh', 1),
(13, 6, 'FAN', 2, '', '', '', 1),
(14, 6, 'headphone', 2, '', '', '', 1),
(18, 6, 'LAPTOP', 2, '', '', '', 1),
(19, 6, 'Mobile Phones', 2, '', '', '', 1),
(20, 7, 'Coaching', 2, '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory2`
--

CREATE TABLE `subcategory2` (
  `sub_cat2_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sub_cat_id` int(11) NOT NULL,
  `sub_cat2_name` varchar(255) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `meta_tag` varchar(255) NOT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory2`
--

INSERT INTO `subcategory2` (`sub_cat2_id`, `cat_id`, `sub_cat_id`, `sub_cat2_name`, `admin_id`, `meta_tag`, `meta_keyword`, `meta_description`, `status`) VALUES
(1, 9, 10, 'PACKERS & MOVERS', 2, '', '', '', 1),
(3, 12, 11, 'DENTAL', 2, '', '', '', 1),
(4, 6, 19, 'SONY Experia', 2, 'hello', 'hello', 'ok3', 1),
(5, 9, 5, 'PAYU MONEY', 2, '', '', '', 1),
(6, 12, 11, 'EYE', 2, '', '', '', 1),
(8, 9, 5, 'Paypal', 2, '', '', '', 1),
(9, 7, 7, 'RKGIT', 2, '9', '9', '9', 1),
(10, 11, 4, 'SANJU1', 2, '', '', '', 1),
(11, 6, 13, 'Surya Fan', 2, '', '', '', 1),
(12, 12, 12, 'EYE', 2, '', '', '', 1),
(13, 9, 9, 'CPU', 2, '', '', '', 1),
(14, 6, 13, 'USHA', 2, '', '', '', 1),
(15, 7, 7, 'Kite', 2, '', '', '', 1),
(16, 9, 9, 'Keyboard', 2, '', '', '', 1),
(17, 12, 12, 'DENTAL', 2, '', '', '', 1),
(18, 11, 4, 'SANJU2', 2, '', '', '', 1),
(20, 6, 8, 'PHILIPS', 2, '', '', '', 1),
(22, 6, 19, 'Moto z- Play', 2, '', '', '', 1),
(23, 6, 19, 'Samsung J4', 2, '', '', '', 1),
(24, 6, 13, 'Bajaj', 2, 'fan', 'fan', 'fan', 1),
(25, 7, 20, 'vivekananda', 2, '', '', '', 1),
(26, 9, 10, '', 2, '', '', '', 1);

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
(33, 't', 6, '2018-07-30', 1, 62),
(34, 't2', 6, '2018-07-30', 1, 62),
(35, 't', 6, '2018-07-30', 1, 62),
(36, 't', 6, '2018-07-30', 1, 62),
(37, 'c2shub1', 4, '2018-07-30', 1, 62),
(38, 'c2shub2', 4, '2018-07-30', 1, 62),
(39, 'c2shub3', 4, '2018-07-30', 1, 62),
(40, 'c2shub4', 4, '2018-07-30', 1, 62),
(41, 'Test1', 7, '2018-08-08', 2, 66),
(42, 'test2', 7, '2018-08-08', 2, 66),
(43, 'test3', 7, '2018-08-08', 2, 66),
(44, 'Test4', 7, '2018-08-08', 2, 66);

-- --------------------------------------------------------

--
-- Table structure for table `title`
--

CREATE TABLE `title` (
  `title_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `title_name` longtext NOT NULL,
  `title_status` int(11) NOT NULL DEFAULT '1',
  `title_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `title`
--

INSERT INTO `title` (`title_id`, `product_id`, `admin_id`, `title_name`, `title_status`, `title_date`) VALUES
(4, 62, 1, 'c2shub', 0, '2018-07-20'),
(5, 62, 1, 'hello', 0, '2018-07-20'),
(6, 62, 1, 'happy', 0, '2018-07-21'),
(7, 66, 2, 'Samsung Note 5', 1, '2018-08-08'),
(8, 109, 2, 'Jobriya is established in 2004 by rajesh kumar.  our main motive is to provide best information related to government jobs. here you can also get study material and many others ', 1, '2018-09-02'),
(10, 10, 2, '<p>test 2</p>\r\n', 1, '2018-09-19'),
(11, 111, 2, '<h1>Trafficwala</h1>\r\n\r\n<p>Based at NOIDA, INDIA in the outskirts of New Delhi, Trafficwala is among the fastest growing internet company in the arena of Search Marketing, Search Engine Optimization &amp; Pay per click management. Set up with the sole objective of providing a single window service for generating massive online marketing to the websites, offering them the best exposure in almost all search engines through the help of best brains in the S.E.O...</p>\r\n\r\n<h1>Our Mission</h1>\r\n\r\n<p>Focused efforts to boost your website rank to the top of the lot in every search engine with the use of innovative and ethical techniques &amp; tools.</p>\r\n\r\n<p>Professional management of online marketing with complete integrity and transparency through regular job reports to the clients resulting in genuine low-cost web-traffic to our client&#39;s websites.</p>\r\n\r\n<h1>Knowledge</h1>\r\n\r\n<p>Search Engines are our team&#39;s play ground and we are not amateurs but seasoned experts with a long track record of successful achievements. Our team not only has the in-depth knowledge of all existing optimization tools, techniques and visitor generation tactics but we also keep updated ourselves with the latest trends and developments in this rapidly developing field. We instantaneously research the new guidelines adopted by any search engine which could adversely affect any website through the use of archaic and outdated technique as well as the opening up of new avenues and tools &amp; techniques whose early adoption can give a leverage to our clients over their competitors.</p>\r\n', 1, '2018-09-28');

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
(106, 'download (1).jpg', 'shweta', NULL, NULL, NULL, NULL, NULL, NULL, 2, '2018-07-05', 0, 'shwetachaurasiya0a@gmail.com', '7827136210', 'e10adc3949ba59abbe56e057f20f883e'),
(107, 'c05811629.png', 'Vishal singh ', NULL, 'Test', 'Noida', '', '', NULL, 2, '2018-07-05', 0, 'vishal@gmail.com', '7878787878', '8b64d2451b7a8f3fd17390f88ea35917'),
(109, 'download (1).jpg', 'porash pandit', NULL, 'Meerut', 'Noida', '', 'India', NULL, 2, '2018-07-05', 0, 'porash123@gmail.com', '9832156699', '4eaba25d2246a3dcb4048256733f5885'),
(111, 'download (1).jpg', 'rajesh', NULL, NULL, NULL, NULL, NULL, NULL, 2, '2018-07-11', 0, 'rajesh.k@digitviral.com', '9999615069', 'b322874a202f428d26044c2ed45ed381'),
(112, NULL, 'Porash', NULL, NULL, NULL, NULL, NULL, NULL, 2, '2018-08-20', 0, 'porash@gmail.com', '8180000357', 'a983fa4bc6f7106327bb2d677b8d9f3b'),
(113, NULL, 'dadera', NULL, NULL, NULL, NULL, NULL, NULL, 2, '2018-08-21', 0, 'dadera1990@gmail.com', '9450286473', '25f9e794323b453885f5181f1b624d0b'),
(114, 'USER_18940807521536048473.jpeg', 'shweta', NULL, 'test', 'noida', 'uttar pradesh', 'india', NULL, 2, '2018-08-22', 0, 'shwetachaurasiya9@gmail.com', '7827136227', '02633c6215f5ab52da91f13e8509f3fa'),
(115, NULL, 'Ajeet', NULL, NULL, NULL, NULL, NULL, NULL, 2, '2018-08-24', 0, 'ajeetchaurasiya5@gmail.com', '8587000514', '32b1cffb4d39f48c3909865a558135ee'),
(116, NULL, 'shweta', NULL, NULL, NULL, NULL, NULL, NULL, 2, '2018-08-29', 0, 'shwetac@gmail.com', '7827136222', '697117e224711f2a197c622d89a8cd06'),
(117, NULL, 'only4uptetfzb@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 2, '2018-09-02', 0, 'only4uptetfzb@gmail.com', '9889929191', '25f9e794323b453885f5181f1b624d0b'),
(118, NULL, 'Vishal singh', NULL, NULL, NULL, NULL, NULL, NULL, 2, '2018-10-15', 0, 'singhvishal120@gmail.com', '8181052357', '2865a5b14e5a70273a7d311bfc150f4f'),
(119, NULL, 'test', NULL, NULL, NULL, NULL, NULL, NULL, 2, '2018-10-15', 0, 'singhvishal120012@gmail.com', '8181052357', 'f3dcf2b24cdcda5f5a9e51cce73cbeff'),
(120, NULL, 'test', NULL, NULL, NULL, NULL, NULL, NULL, 2, '2018-10-15', 0, 'singhvi012@gmail.com', '8181052357', 'f3dcf2b24cdcda5f5a9e51cce73cbeff'),
(121, NULL, 'test', NULL, NULL, NULL, NULL, NULL, NULL, 2, '2018-10-15', 0, 'sin12@gmail.com', '8181052357', 'f3dcf2b24cdcda5f5a9e51cce73cbeff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`ans_id`);

--
-- Indexes for table `answer_reply`
--
ALTER TABLE `answer_reply`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `complain_comment`
--
ALTER TABLE `complain_comment`
  ADD PRIMARY KEY (`co_id`);

--
-- Indexes for table `complain_like`
--
ALTER TABLE `complain_like`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complain_reply`
--
ALTER TABLE `complain_reply`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `qa_rating_info`
--
ALTER TABLE `qa_rating_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `rating_info`
--
ALTER TABLE `rating_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `r_comment_reply`
--
ALTER TABLE `r_comment_reply`
  ADD PRIMARY KEY (`reply_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory1`
--
ALTER TABLE `subcategory1`
  ADD PRIMARY KEY (`sub_cat_id`);

--
-- Indexes for table `subcategory2`
--
ALTER TABLE `subcategory2`
  ADD PRIMARY KEY (`sub_cat2_id`);

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
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `ans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `answer_reply`
--
ALTER TABLE `answer_reply`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=630;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `complain`
--
ALTER TABLE `complain`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `complain_comment`
--
ALTER TABLE `complain_comment`
  MODIFY `co_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `complain_like`
--
ALTER TABLE `complain_like`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `complain_reply`
--
ALTER TABLE `complain_reply`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `facility`
--
ALTER TABLE `facility`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` tinyint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `company_id` tinyint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `qa_rating_info`
--
ALTER TABLE `qa_rating_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `rating_info`
--
ALTER TABLE `rating_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=219;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `r_comment_reply`
--
ALTER TABLE `r_comment_reply`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `subcategory1`
--
ALTER TABLE `subcategory1`
  MODIFY `sub_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `subcategory2`
--
ALTER TABLE `subcategory2`
  MODIFY `sub_cat2_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `subtitle`
--
ALTER TABLE `subtitle`
  MODIFY `sub_t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `title`
--
ALTER TABLE `title`
  MODIFY `title_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_register`
--
ALTER TABLE `user_register`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
