-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2020 at 10:43 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `matrimony`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` bigint(20) NOT NULL,
  `admin_name` varchar(250) NOT NULL,
  `admin_email` varchar(150) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Techno', 'tech@demo.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

CREATE TABLE `advertisement` (
  `adv_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `reach_id` bigint(20) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `adv_page` varchar(250) DEFAULT NULL,
  `adv_from_date` varchar(20) DEFAULT NULL,
  `adv_to_date` varchar(20) DEFAULT NULL,
  `adv_name` varchar(500) DEFAULT NULL,
  `adv_amount` double DEFAULT NULL,
  `adv_image` varchar(250) DEFAULT NULL,
  `adv_status` varchar(50) NOT NULL DEFAULT 'active',
  `adv_addedby` varchar(50) DEFAULT NULL,
  `adv_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `advertisement`
--

INSERT INTO `advertisement` (`adv_id`, `company_id`, `reach_id`, `country_id`, `state_id`, `district_id`, `adv_page`, `adv_from_date`, `adv_to_date`, `adv_name`, `adv_amount`, `adv_image`, `adv_status`, `adv_addedby`, `adv_date`) VALUES
(8, 3, 1, 101, 22, 0, 'My Profile', '01-01-2020', '29-02-2020', 'Newspaper ', 5000, 'adv_8_1580295307.jpg', 'active', '3', '2020-01-29 12:33:12'),
(9, 3, 1, NULL, NULL, NULL, 'My Profile', '01-12-2019', '31-01-2020', 'Social Media Marketing', 50, 'adv_9_1580296477.jpg', 'active', '3', '2020-01-29 12:33:02'),
(10, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, 'www', 1000, NULL, 'active', NULL, '2020-01-15 05:26:24'),
(11, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, 'www', 1000, NULL, 'active', NULL, '2020-01-15 05:26:57'),
(12, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, 'www', 1000, 'adv_12_1579066098.jpg', 'active', NULL, '2020-01-15 05:28:18'),
(13, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, 'ppp', 500, 'adv_13_1579066891.jpg', 'active', '3', '2020-01-15 05:42:01');

-- --------------------------------------------------------

--
-- Table structure for table `advertisement_reach`
--

CREATE TABLE `advertisement_reach` (
  `reach_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `reach_name` varchar(50) NOT NULL,
  `reach_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `advertisement_reach`
--

INSERT INTO `advertisement_reach` (`reach_id`, `company_id`, `reach_name`, `reach_status`) VALUES
(1, 0, 'Pan India', 1),
(2, 0, 'State', 1),
(3, 0, 'District', 1);

-- --------------------------------------------------------

--
-- Table structure for table `blood_group`
--

CREATE TABLE `blood_group` (
  `blood_group_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `blood_group_name` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood_group`
--

INSERT INTO `blood_group` (`blood_group_id`, `company_id`, `user_id`, `blood_group_name`, `date`) VALUES
(2, 3, 3, 'O +Ve', '2019-12-26 08:08:46');

-- --------------------------------------------------------

--
-- Table structure for table `body_type`
--

CREATE TABLE `body_type` (
  `body_type_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `body_type_name` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `body_type`
--

INSERT INTO `body_type` (`body_type_id`, `company_id`, `user_id`, `body_type_name`, `date`) VALUES
(3, 3, 3, 'slim', '2019-12-26 09:48:06');

-- --------------------------------------------------------

--
-- Table structure for table `cast`
--

CREATE TABLE `cast` (
  `cast_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `religion_id` bigint(20) NOT NULL,
  `cast_name` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cast`
--

INSERT INTO `cast` (`cast_id`, `company_id`, `user_id`, `religion_id`, `cast_name`, `date`) VALUES
(1, 3, 3, 3, 'Kunabi', '2019-12-27 07:33:23'),
(3, 3, 3, 3, 'Maratha', '2019-12-27 07:33:37'),
(4, 3, 3, 3, 'Lohar', '2019-12-27 07:33:49');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `country_id` bigint(20) NOT NULL,
  `state_id` bigint(20) NOT NULL,
  `district_id` bigint(20) NOT NULL,
  `tahasil_id` bigint(20) NOT NULL,
  `city_name` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `company_id`, `user_id`, `country_id`, `state_id`, `district_id`, `tahasil_id`, `city_name`, `date`) VALUES
(7, 3, 3, 3, 5, 4, 3, 'sangav', '2020-01-14 10:28:09'),
(8, 3, 3, 3, 5, 5, 3, 'wagholi', '2020-01-14 10:29:03');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` bigint(20) NOT NULL,
  `company_name` varchar(250) NOT NULL,
  `company_address` varchar(350) NOT NULL,
  `company_city` varchar(150) NOT NULL,
  `company_state` varchar(150) NOT NULL,
  `company_district` varchar(150) NOT NULL,
  `company_pincode` bigint(20) DEFAULT NULL,
  `company_mob1` varchar(12) NOT NULL,
  `company_mob2` varchar(12) NOT NULL,
  `company_email` varchar(150) NOT NULL,
  `company_website` varchar(150) NOT NULL,
  `company_pan_no` varchar(12) NOT NULL,
  `company_gst_no` varchar(100) NOT NULL,
  `company_lic1` varchar(150) NOT NULL,
  `company_lic2` varchar(150) NOT NULL,
  `company_start_date` varchar(15) NOT NULL,
  `company_end_date` varchar(15) NOT NULL,
  `company_logo` varchar(200) NOT NULL,
  `admin_roll_id` int(11) NOT NULL DEFAULT 1,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `company_address`, `company_city`, `company_state`, `company_district`, `company_pincode`, `company_mob1`, `company_mob2`, `company_email`, `company_website`, `company_pan_no`, `company_gst_no`, `company_lic1`, `company_lic2`, `company_start_date`, `company_end_date`, `company_logo`, `admin_roll_id`, `date`) VALUES
(3, 'BHARTIYA SHADI ', 'RAJARAMPURI KOLHAPUR', 'KOLHAPUR', 'MAHARASHTRA', 'KOLHAPUR', 416004, '9876543210', '9876543210', 'root@gmail.com', 'dcs.com', 'abcd1234', '1245678', '12457', '1245', '01-04-2019', '31-03-2020', '', 1, '2019-12-26 06:43:33');

-- --------------------------------------------------------

--
-- Table structure for table `complexion`
--

CREATE TABLE `complexion` (
  `complexion_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `complexion_name` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complexion`
--

INSERT INTO `complexion` (`complexion_id`, `company_id`, `user_id`, `complexion_name`, `date`) VALUES
(1, 3, 3, 'abcd', '2019-12-27 07:59:54'),
(2, 3, 3, 'pqrs', '2019-12-27 07:56:13');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` bigint(20) NOT NULL,
  `sortname` varchar(250) DEFAULT NULL,
  `company_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `country_name` varchar(100) NOT NULL,
  `phonecode` varchar(250) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `sortname`, `company_id`, `user_id`, `country_name`, `phonecode`, `date`) VALUES
(1, 'AF', 0, 0, 'Afghanistan', '93', '2020-01-28 13:08:18'),
(2, 'AL', 0, 0, 'Albania', '355', '2020-01-28 13:08:18'),
(3, 'DZ', 0, 0, 'Algeria', '213', '2020-01-28 13:08:18'),
(4, 'AS', 0, 0, 'American Samoa', '1684', '2020-01-28 13:08:18'),
(5, 'AD', 0, 0, 'Andorra', '376', '2020-01-28 13:08:18'),
(6, 'AO', 0, 0, 'Angola', '244', '2020-01-28 13:08:18'),
(7, 'AI', 0, 0, 'Anguilla', '1264', '2020-01-28 13:08:18'),
(8, 'AQ', 0, 0, 'Antarctica', '0', '2020-01-28 13:08:18'),
(9, 'AG', 0, 0, 'Antigua And Barbuda', '1268', '2020-01-28 13:08:18'),
(10, 'AR', 0, 0, 'Argentina', '54', '2020-01-28 13:08:18'),
(11, 'AM', 0, 0, 'Armenia', '374', '2020-01-28 13:08:18'),
(12, 'AW', 0, 0, 'Aruba', '297', '2020-01-28 13:08:18'),
(13, 'AU', 0, 0, 'Australia', '61', '2020-01-28 13:08:18'),
(14, 'AT', 0, 0, 'Austria', '43', '2020-01-28 13:08:18'),
(15, 'AZ', 0, 0, 'Azerbaijan', '994', '2020-01-28 13:08:18'),
(16, 'BS', 0, 0, 'Bahamas The', '1242', '2020-01-28 13:08:18'),
(17, 'BH', 0, 0, 'Bahrain', '973', '2020-01-28 13:08:18'),
(18, 'BD', 0, 0, 'Bangladesh', '880', '2020-01-28 13:08:18'),
(19, 'BB', 0, 0, 'Barbados', '1246', '2020-01-28 13:08:18'),
(20, 'BY', 0, 0, 'Belarus', '375', '2020-01-28 13:08:18'),
(21, 'BE', 0, 0, 'Belgium', '32', '2020-01-28 13:08:18'),
(22, 'BZ', 0, 0, 'Belize', '501', '2020-01-28 13:08:18'),
(23, 'BJ', 0, 0, 'Benin', '229', '2020-01-28 13:08:18'),
(24, 'BM', 0, 0, 'Bermuda', '1441', '2020-01-28 13:08:18'),
(25, 'BT', 0, 0, 'Bhutan', '975', '2020-01-28 13:08:18'),
(26, 'BO', 0, 0, 'Bolivia', '591', '2020-01-28 13:08:18'),
(27, 'BA', 0, 0, 'Bosnia and Herzegovina', '387', '2020-01-28 13:08:18'),
(28, 'BW', 0, 0, 'Botswana', '267', '2020-01-28 13:08:18'),
(29, 'BV', 0, 0, 'Bouvet Island', '0', '2020-01-28 13:08:18'),
(30, 'BR', 0, 0, 'Brazil', '55', '2020-01-28 13:08:18'),
(31, 'IO', 0, 0, 'British Indian Ocean Territory', '246', '2020-01-28 13:08:18'),
(32, 'BN', 0, 0, 'Brunei', '673', '2020-01-28 13:08:18'),
(33, 'BG', 0, 0, 'Bulgaria', '359', '2020-01-28 13:08:18'),
(34, 'BF', 0, 0, 'Burkina Faso', '226', '2020-01-28 13:08:18'),
(35, 'BI', 0, 0, 'Burundi', '257', '2020-01-28 13:08:18'),
(36, 'KH', 0, 0, 'Cambodia', '855', '2020-01-28 13:08:18'),
(37, 'CM', 0, 0, 'Cameroon', '237', '2020-01-28 13:08:18'),
(38, 'CA', 0, 0, 'Canada', '1', '2020-01-28 13:08:18'),
(39, 'CV', 0, 0, 'Cape Verde', '238', '2020-01-28 13:08:18'),
(40, 'KY', 0, 0, 'Cayman Islands', '1345', '2020-01-28 13:08:18'),
(41, 'CF', 0, 0, 'Central African Republic', '236', '2020-01-28 13:08:18'),
(42, 'TD', 0, 0, 'Chad', '235', '2020-01-28 13:08:18'),
(43, 'CL', 0, 0, 'Chile', '56', '2020-01-28 13:08:18'),
(44, 'CN', 0, 0, 'China', '86', '2020-01-28 13:08:18'),
(45, 'CX', 0, 0, 'Christmas Island', '61', '2020-01-28 13:08:18'),
(46, 'CC', 0, 0, 'Cocos (Keeling) Islands', '672', '2020-01-28 13:08:18'),
(47, 'CO', 0, 0, 'Colombia', '57', '2020-01-28 13:08:18'),
(48, 'KM', 0, 0, 'Comoros', '269', '2020-01-28 13:08:18'),
(49, 'CG', 0, 0, 'Republic Of The Congo', '242', '2020-01-28 13:08:18'),
(50, 'CD', 0, 0, 'Democratic Republic Of The Congo', '242', '2020-01-28 13:08:18'),
(51, 'CK', 0, 0, 'Cook Islands', '682', '2020-01-28 13:08:18'),
(52, 'CR', 0, 0, 'Costa Rica', '506', '2020-01-28 13:08:18'),
(53, 'CI', 0, 0, 'Cote D\'Ivoire (Ivory Coast)', '225', '2020-01-28 13:08:18'),
(54, 'HR', 0, 0, 'Croatia (Hrvatska)', '385', '2020-01-28 13:08:18'),
(55, 'CU', 0, 0, 'Cuba', '53', '2020-01-28 13:08:18'),
(56, 'CY', 0, 0, 'Cyprus', '357', '2020-01-28 13:08:18'),
(57, 'CZ', 0, 0, 'Czech Republic', '420', '2020-01-28 13:08:18'),
(58, 'DK', 0, 0, 'Denmark', '45', '2020-01-28 13:08:18'),
(59, 'DJ', 0, 0, 'Djibouti', '253', '2020-01-28 13:08:18'),
(60, 'DM', 0, 0, 'Dominica', '1767', '2020-01-28 13:08:18'),
(61, 'DO', 0, 0, 'Dominican Republic', '1809', '2020-01-28 13:08:18'),
(62, 'TP', 0, 0, 'East Timor', '670', '2020-01-28 13:08:18'),
(63, 'EC', 0, 0, 'Ecuador', '593', '2020-01-28 13:08:18'),
(64, 'EG', 0, 0, 'Egypt', '20', '2020-01-28 13:08:18'),
(65, 'SV', 0, 0, 'El Salvador', '503', '2020-01-28 13:08:18'),
(66, 'GQ', 0, 0, 'Equatorial Guinea', '240', '2020-01-28 13:08:18'),
(67, 'ER', 0, 0, 'Eritrea', '291', '2020-01-28 13:08:18'),
(68, 'EE', 0, 0, 'Estonia', '372', '2020-01-28 13:08:18'),
(69, 'ET', 0, 0, 'Ethiopia', '251', '2020-01-28 13:08:18'),
(70, 'XA', 0, 0, 'External Territories of Australia', '61', '2020-01-28 13:08:18'),
(71, 'FK', 0, 0, 'Falkland Islands', '500', '2020-01-28 13:08:18'),
(72, 'FO', 0, 0, 'Faroe Islands', '298', '2020-01-28 13:08:18'),
(73, 'FJ', 0, 0, 'Fiji Islands', '679', '2020-01-28 13:08:18'),
(74, 'FI', 0, 0, 'Finland', '358', '2020-01-28 13:08:18'),
(75, 'FR', 0, 0, 'France', '33', '2020-01-28 13:08:18'),
(76, 'GF', 0, 0, 'French Guiana', '594', '2020-01-28 13:08:18'),
(77, 'PF', 0, 0, 'French Polynesia', '689', '2020-01-28 13:08:18'),
(78, 'TF', 0, 0, 'French Southern Territories', '0', '2020-01-28 13:08:18'),
(80, 'GM', 0, 0, 'Gambia The', '220', '2020-01-28 13:08:18'),
(81, 'GE', 0, 0, 'Georgia', '995', '2020-01-28 13:08:18'),
(82, 'DE', 0, 0, 'Germany', '49', '2020-01-28 13:08:18'),
(83, 'GH', 0, 0, 'Ghana', '233', '2020-01-28 13:08:18'),
(84, 'GI', 0, 0, 'Gibraltar', '350', '2020-01-28 13:08:18'),
(85, 'GR', 0, 0, 'Greece', '30', '2020-01-28 13:08:18'),
(86, 'GL', 0, 0, 'Greenland', '299', '2020-01-28 13:08:18'),
(87, 'GD', 0, 0, 'Grenada', '1473', '2020-01-28 13:08:18'),
(88, 'GP', 0, 0, 'Guadeloupe', '590', '2020-01-28 13:08:18'),
(89, 'GU', 0, 0, 'Guam', '1671', '2020-01-28 13:08:18'),
(90, 'GT', 0, 0, 'Guatemala', '502', '2020-01-28 13:08:18'),
(91, 'XU', 0, 0, 'Guernsey and Alderney', '44', '2020-01-28 13:08:18'),
(92, 'GN', 0, 0, 'Guinea', '224', '2020-01-28 13:08:18'),
(93, 'GW', 0, 0, 'Guinea-Bissau', '245', '2020-01-28 13:08:18'),
(94, 'GY', 0, 0, 'Guyana', '592', '2020-01-28 13:08:18'),
(95, 'HT', 0, 0, 'Haiti', '509', '2020-01-28 13:08:18'),
(96, 'HM', 0, 0, 'Heard and McDonald Islands', '0', '2020-01-28 13:08:18'),
(97, 'HN', 0, 0, 'Honduras', '504', '2020-01-28 13:08:18'),
(98, 'HK', 0, 0, 'Hong Kong S.A.R.', '852', '2020-01-28 13:08:18'),
(99, 'HU', 0, 0, 'Hungary', '36', '2020-01-28 13:08:18'),
(100, 'IS', 0, 0, 'Iceland', '354', '2020-01-28 13:08:18'),
(101, 'IN', 0, 0, 'India', '91', '2020-01-28 13:08:18'),
(102, 'ID', 0, 0, 'Indonesia', '62', '2020-01-28 13:08:18'),
(103, 'IR', 0, 0, 'Iran', '98', '2020-01-28 13:08:18'),
(104, 'IQ', 0, 0, 'Iraq', '964', '2020-01-28 13:08:18'),
(105, 'IE', 0, 0, 'Ireland', '353', '2020-01-28 13:08:18'),
(106, 'IL', 0, 0, 'Israel', '972', '2020-01-28 13:08:18'),
(107, 'IT', 0, 0, 'Italy', '39', '2020-01-28 13:08:18'),
(108, 'JM', 0, 0, 'Jamaica', '1876', '2020-01-28 13:08:18'),
(109, 'JP', 0, 0, 'Japan', '81', '2020-01-28 13:08:18'),
(110, 'XJ', 0, 0, 'Jersey', '44', '2020-01-28 13:08:18'),
(111, 'JO', 0, 0, 'Jordan', '962', '2020-01-28 13:08:18'),
(112, 'KZ', 0, 0, 'Kazakhstan', '7', '2020-01-28 13:08:18'),
(113, 'KE', 0, 0, 'Kenya', '254', '2020-01-28 13:08:18'),
(114, 'KI', 0, 0, 'Kiribati', '686', '2020-01-28 13:08:18'),
(115, 'KP', 0, 0, 'Korea North', '850', '2020-01-28 13:08:18'),
(116, 'KR', 0, 0, 'Korea South', '82', '2020-01-28 13:08:18'),
(117, 'KW', 0, 0, 'Kuwait', '965', '2020-01-28 13:08:18'),
(118, 'KG', 0, 0, 'Kyrgyzstan', '996', '2020-01-28 13:08:18'),
(119, 'LA', 0, 0, 'Laos', '856', '2020-01-28 13:08:18'),
(120, 'LV', 0, 0, 'Latvia', '371', '2020-01-28 13:08:18'),
(121, 'LB', 0, 0, 'Lebanon', '961', '2020-01-28 13:08:18'),
(122, 'LS', 0, 0, 'Lesotho', '266', '2020-01-28 13:08:18'),
(123, 'LR', 0, 0, 'Liberia', '231', '2020-01-28 13:08:18'),
(124, 'LY', 0, 0, 'Libya', '218', '2020-01-28 13:08:18'),
(125, 'LI', 0, 0, 'Liechtenstein', '423', '2020-01-28 13:08:18'),
(126, 'LT', 0, 0, 'Lithuania', '370', '2020-01-28 13:08:18'),
(127, 'LU', 0, 0, 'Luxembourg', '352', '2020-01-28 13:08:18'),
(128, 'MO', 0, 0, 'Macau S.A.R.', '853', '2020-01-28 13:08:18'),
(129, 'MK', 0, 0, 'Macedonia', '389', '2020-01-28 13:08:18'),
(130, 'MG', 0, 0, 'Madagascar', '261', '2020-01-28 13:08:18'),
(131, 'MW', 0, 0, 'Malawi', '265', '2020-01-28 13:08:18'),
(132, 'MY', 0, 0, 'Malaysia', '60', '2020-01-28 13:08:18'),
(133, 'MV', 0, 0, 'Maldives', '960', '2020-01-28 13:08:18'),
(134, 'ML', 0, 0, 'Mali', '223', '2020-01-28 13:08:18'),
(135, 'MT', 0, 0, 'Malta', '356', '2020-01-28 13:08:18'),
(136, 'XM', 0, 0, 'Man (Isle of)', '44', '2020-01-28 13:08:18'),
(137, 'MH', 0, 0, 'Marshall Islands', '692', '2020-01-28 13:08:18'),
(138, 'MQ', 0, 0, 'Martinique', '596', '2020-01-28 13:08:18'),
(139, 'MR', 0, 0, 'Mauritania', '222', '2020-01-28 13:08:18'),
(140, 'MU', 0, 0, 'Mauritius', '230', '2020-01-28 13:08:18'),
(141, 'YT', 0, 0, 'Mayotte', '269', '2020-01-28 13:08:18'),
(142, 'MX', 0, 0, 'Mexico', '52', '2020-01-28 13:08:18'),
(143, 'FM', 0, 0, 'Micronesia', '691', '2020-01-28 13:08:18'),
(144, 'MD', 0, 0, 'Moldova', '373', '2020-01-28 13:08:18'),
(145, 'MC', 0, 0, 'Monaco', '377', '2020-01-28 13:08:18'),
(146, 'MN', 0, 0, 'Mongolia', '976', '2020-01-28 13:08:18'),
(147, 'MS', 0, 0, 'Montserrat', '1664', '2020-01-28 13:08:18'),
(148, 'MA', 0, 0, 'Morocco', '212', '2020-01-28 13:08:18'),
(149, 'MZ', 0, 0, 'Mozambique', '258', '2020-01-28 13:08:18'),
(150, 'MM', 0, 0, 'Myanmar', '95', '2020-01-28 13:08:18'),
(151, 'NA', 0, 0, 'Namibia', '264', '2020-01-28 13:08:18'),
(152, 'NR', 0, 0, 'Nauru', '674', '2020-01-28 13:08:18'),
(153, 'NP', 0, 0, 'Nepal', '977', '2020-01-28 13:08:18'),
(154, 'AN', 0, 0, 'Netherlands Antilles', '599', '2020-01-28 13:08:18'),
(155, 'NL', 0, 0, 'Netherlands The', '31', '2020-01-28 13:08:18'),
(156, 'NC', 0, 0, 'New Caledonia', '687', '2020-01-28 13:08:18'),
(157, 'NZ', 0, 0, 'New Zealand', '64', '2020-01-28 13:08:18'),
(158, 'NI', 0, 0, 'Nicaragua', '505', '2020-01-28 13:08:18'),
(159, 'NE', 0, 0, 'Niger', '227', '2020-01-28 13:08:18'),
(160, 'NG', 0, 0, 'Nigeria', '234', '2020-01-28 13:08:18'),
(161, 'NU', 0, 0, 'Niue', '683', '2020-01-28 13:08:18'),
(162, 'NF', 0, 0, 'Norfolk Island', '672', '2020-01-28 13:08:18'),
(163, 'MP', 0, 0, 'Northern Mariana Islands', '1670', '2020-01-28 13:08:18'),
(164, 'NO', 0, 0, 'Norway', '47', '2020-01-28 13:08:18'),
(165, 'OM', 0, 0, 'Oman', '968', '2020-01-28 13:08:18'),
(166, 'PK', 0, 0, 'Pakistan', '92', '2020-01-28 13:08:18'),
(167, 'PW', 0, 0, 'Palau', '680', '2020-01-28 13:08:18'),
(168, 'PS', 0, 0, 'Palestinian Territory Occupied', '970', '2020-01-28 13:08:18'),
(169, 'PA', 0, 0, 'Panama', '507', '2020-01-28 13:08:18'),
(170, 'PG', 0, 0, 'Papua new Guinea', '675', '2020-01-28 13:08:18'),
(171, 'PY', 0, 0, 'Paraguay', '595', '2020-01-28 13:08:18'),
(172, 'PE', 0, 0, 'Peru', '51', '2020-01-28 13:08:18'),
(173, 'PH', 0, 0, 'Philippines', '63', '2020-01-28 13:08:18'),
(174, 'PN', 0, 0, 'Pitcairn Island', '0', '2020-01-28 13:08:18'),
(175, 'PL', 0, 0, 'Poland', '48', '2020-01-28 13:08:18'),
(176, 'PT', 0, 0, 'Portugal', '351', '2020-01-28 13:08:18'),
(177, 'PR', 0, 0, 'Puerto Rico', '1787', '2020-01-28 13:08:18'),
(178, 'QA', 0, 0, 'Qatar', '974', '2020-01-28 13:08:18'),
(179, 'RE', 0, 0, 'Reunion', '262', '2020-01-28 13:08:18'),
(180, 'RO', 0, 0, 'Romania', '40', '2020-01-28 13:08:18'),
(181, 'RU', 0, 0, 'Russia', '70', '2020-01-28 13:08:18'),
(182, 'RW', 0, 0, 'Rwanda', '250', '2020-01-28 13:08:18'),
(183, 'SH', 0, 0, 'Saint Helena', '290', '2020-01-28 13:08:18'),
(184, 'KN', 0, 0, 'Saint Kitts And Nevis', '1869', '2020-01-28 13:08:18'),
(185, 'LC', 0, 0, 'Saint Lucia', '1758', '2020-01-28 13:08:18'),
(186, 'PM', 0, 0, 'Saint Pierre and Miquelon', '508', '2020-01-28 13:08:18'),
(187, 'VC', 0, 0, 'Saint Vincent And The Grenadines', '1784', '2020-01-28 13:08:18'),
(188, 'WS', 0, 0, 'Samoa', '684', '2020-01-28 13:08:18'),
(189, 'SM', 0, 0, 'San Marino', '378', '2020-01-28 13:08:18'),
(190, 'ST', 0, 0, 'Sao Tome and Principe', '239', '2020-01-28 13:08:18'),
(191, 'SA', 0, 0, 'Saudi Arabia', '966', '2020-01-28 13:08:18'),
(192, 'SN', 0, 0, 'Senegal', '221', '2020-01-28 13:08:18'),
(193, 'RS', 0, 0, 'Serbia', '381', '2020-01-28 13:08:18'),
(194, 'SC', 0, 0, 'Seychelles', '248', '2020-01-28 13:08:18'),
(195, 'SL', 0, 0, 'Sierra Leone', '232', '2020-01-28 13:08:18'),
(196, 'SG', 0, 0, 'Singapore', '65', '2020-01-28 13:08:18'),
(197, 'SK', 0, 0, 'Slovakia', '421', '2020-01-28 13:08:18'),
(198, 'SI', 0, 0, 'Slovenia', '386', '2020-01-28 13:08:18'),
(199, 'XG', 0, 0, 'Smaller Territories of the UK', '44', '2020-01-28 13:08:18'),
(200, 'SB', 0, 0, 'Solomon Islands', '677', '2020-01-28 13:08:18'),
(201, 'SO', 0, 0, 'Somalia', '252', '2020-01-28 13:08:18'),
(202, 'ZA', 0, 0, 'South Africa', '27', '2020-01-28 13:08:18'),
(203, 'GS', 0, 0, 'South Georgia', '0', '2020-01-28 13:08:18'),
(204, 'SS', 0, 0, 'South Sudan', '211', '2020-01-28 13:08:18'),
(205, 'ES', 0, 0, 'Spain', '34', '2020-01-28 13:08:18'),
(206, 'LK', 0, 0, 'Sri Lanka', '94', '2020-01-28 13:08:18'),
(207, 'SD', 0, 0, 'Sudan', '249', '2020-01-28 13:08:18'),
(208, 'SR', 0, 0, 'Suriname', '597', '2020-01-28 13:08:18'),
(209, 'SJ', 0, 0, 'Svalbard And Jan Mayen Islands', '47', '2020-01-28 13:08:18'),
(210, 'SZ', 0, 0, 'Swaziland', '268', '2020-01-28 13:08:18'),
(211, 'SE', 0, 0, 'Sweden', '46', '2020-01-28 13:08:18'),
(212, 'CH', 0, 0, 'Switzerland', '41', '2020-01-28 13:08:18'),
(213, 'SY', 0, 0, 'Syria', '963', '2020-01-28 13:08:18'),
(214, 'TW', 0, 0, 'Taiwan', '886', '2020-01-28 13:08:18'),
(215, 'TJ', 0, 0, 'Tajikistan', '992', '2020-01-28 13:08:18'),
(216, 'TZ', 0, 0, 'Tanzania', '255', '2020-01-28 13:08:18'),
(217, 'TH', 0, 0, 'Thailand', '66', '2020-01-28 13:08:18'),
(218, 'TG', 0, 0, 'Togo', '228', '2020-01-28 13:08:18'),
(219, 'TK', 0, 0, 'Tokelau', '690', '2020-01-28 13:08:18'),
(220, 'TO', 0, 0, 'Tonga', '676', '2020-01-28 13:08:18'),
(221, 'TT', 0, 0, 'Trinidad And Tobago', '1868', '2020-01-28 13:08:18'),
(222, 'TN', 0, 0, 'Tunisia', '216', '2020-01-28 13:08:18'),
(223, 'TR', 0, 0, 'Turkey', '90', '2020-01-28 13:08:18'),
(224, 'TM', 0, 0, 'Turkmenistan', '7370', '2020-01-28 13:08:18'),
(225, 'TC', 0, 0, 'Turks And Caicos Islands', '1649', '2020-01-28 13:08:18'),
(226, 'TV', 0, 0, 'Tuvalu', '688', '2020-01-28 13:08:18'),
(227, 'UG', 0, 0, 'Uganda', '256', '2020-01-28 13:08:18'),
(228, 'UA', 0, 0, 'Ukraine', '380', '2020-01-28 13:08:18'),
(229, 'AE', 0, 0, 'United Arab Emirates', '971', '2020-01-28 13:08:18'),
(230, 'GB', 0, 0, 'United Kingdom', '44', '2020-01-28 13:08:18'),
(231, 'US', 0, 0, 'United States', '1', '2020-01-28 13:08:18'),
(232, 'UM', 0, 0, 'United States Minor Outlying Islands', '1', '2020-01-28 13:08:18'),
(233, 'UY', 0, 0, 'Uruguay', '598', '2020-01-28 13:08:18'),
(234, 'UZ', 0, 0, 'Uzbekistan', '998', '2020-01-28 13:08:18'),
(235, 'VU', 0, 0, 'Vanuatu', '678', '2020-01-28 13:08:18'),
(236, 'VA', 0, 0, 'Vatican City State (Holy See)', '39', '2020-01-28 13:08:18'),
(237, 'VE', 0, 0, 'Venezuela', '58', '2020-01-28 13:08:18'),
(238, 'VN', 0, 0, 'Vietnam', '84', '2020-01-28 13:08:18'),
(239, 'VG', 0, 0, 'Virgin Islands (British)', '1284', '2020-01-28 13:08:18'),
(240, 'VI', 0, 0, 'Virgin Islands (US)', '1340', '2020-01-28 13:08:18'),
(241, 'WF', 0, 0, 'Wallis And Futuna Islands', '681', '2020-01-28 13:08:18'),
(242, 'EH', 0, 0, 'Western Sahara', '212', '2020-01-28 13:08:18'),
(243, 'YE', 0, 0, 'Yemen', '967', '2020-01-28 13:08:18'),
(244, 'YU', 0, 0, 'Yugoslavia', '38', '2020-01-28 13:08:18'),
(245, 'ZM', 0, 0, 'Zambia', '260', '2020-01-28 13:08:18'),
(246, 'ZW', 0, 0, 'Zimbabwe', '263', '2020-01-28 13:08:18'),
(247, '', 0, 0, 'Gabon', '0', '2020-01-28 13:08:18');

-- --------------------------------------------------------

--
-- Table structure for table `diet`
--

CREATE TABLE `diet` (
  `diet_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `diet_name` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diet`
--

INSERT INTO `diet` (`diet_id`, `company_id`, `user_id`, `diet_name`, `date`) VALUES
(2, 3, 3, 'Non-veg', '2019-12-26 10:26:06'),
(4, 3, 3, 'Vegiterian', '2019-12-26 10:27:38');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `district_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `country_id` bigint(20) NOT NULL,
  `state_id` bigint(20) NOT NULL,
  `district_name` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`district_id`, `company_id`, `user_id`, `country_id`, `state_id`, `district_name`, `date`) VALUES
(6, 3, 3, 101, 22, 'Kolhapur', '2020-01-29 11:25:22'),
(7, 3, 3, 101, 22, 'Sangali', '2020-01-29 11:25:57');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `education_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `education_name` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`education_id`, `company_id`, `user_id`, `education_name`, `date`) VALUES
(2, 3, 3, 'C A', '2019-12-26 10:32:54'),
(3, 3, 3, 'M com', '2019-12-26 10:33:13');

-- --------------------------------------------------------

--
-- Table structure for table `family_status`
--

CREATE TABLE `family_status` (
  `family_status_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `family_status_name` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `family_status`
--

INSERT INTO `family_status` (`family_status_id`, `company_id`, `user_id`, `family_status_name`, `date`) VALUES
(2, 3, 3, 'high class 2', '2019-12-26 10:47:31');

-- --------------------------------------------------------

--
-- Table structure for table `family_type`
--

CREATE TABLE `family_type` (
  `family_type_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `family_type_name` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `family_type`
--

INSERT INTO `family_type` (`family_type_id`, `company_id`, `user_id`, `family_type_name`, `date`) VALUES
(1, 3, 3, 'high class', '2019-12-26 10:44:09');

-- --------------------------------------------------------

--
-- Table structure for table `family_value`
--

CREATE TABLE `family_value` (
  `family_value_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `family_value_name` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `family_value`
--

INSERT INTO `family_value` (`family_value_id`, `company_id`, `user_id`, `family_value_name`, `date`) VALUES
(1, 3, 3, 'high class 1', '2019-12-26 10:47:11'),
(2, 3, 3, 'high class 3', '2019-12-26 10:47:18');

-- --------------------------------------------------------

--
-- Table structure for table `franchise`
--

CREATE TABLE `franchise` (
  `franchise_id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `franchise_type_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `tahasil_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `franchise_name` varchar(250) DEFAULT NULL,
  `franchise_address` text DEFAULT NULL,
  `franchise_gender` varchar(50) DEFAULT NULL,
  `franchise_email` varchar(150) DEFAULT NULL,
  `franchise_mobile` varchar(15) DEFAULT NULL,
  `franchise_password` varchar(50) DEFAULT NULL,
  `franchise_status` varchar(50) NOT NULL DEFAULT 'active',
  `franchise_addedby` varchar(50) NOT NULL,
  `franchise_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `franchise`
--

INSERT INTO `franchise` (`franchise_id`, `company_id`, `franchise_type_id`, `country_id`, `state_id`, `district_id`, `tahasil_id`, `user_id`, `franchise_name`, `franchise_address`, `franchise_gender`, `franchise_email`, `franchise_mobile`, `franchise_password`, `franchise_status`, `franchise_addedby`, `franchise_date`) VALUES
(3, 3, 1, 3, 5, 4, 2, 8, 'Demo Franc', 'Kolhapur', 'Male', 'demofranc@ooo.com', '9876543211', '123456', 'active', '7', '2020-01-29 07:53:58'),
(4, 3, 5, 3, 5, 4, 2, 9, 'Demo Franc Local', 'Kolhapur', 'Male', 'ggg@jjj.com', '9876543212', '123456', 'active', '8', '2020-01-21 12:14:53');

-- --------------------------------------------------------

--
-- Table structure for table `franchise_type`
--

CREATE TABLE `franchise_type` (
  `franchise_type_id` int(11) NOT NULL,
  `franchise_type_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `franchise_type`
--

INSERT INTO `franchise_type` (`franchise_type_id`, `franchise_type_name`) VALUES
(1, 'State'),
(2, 'District'),
(3, 'Tehasil'),
(4, 'BPL'),
(5, 'Local');

-- --------------------------------------------------------

--
-- Table structure for table `gothram`
--

CREATE TABLE `gothram` (
  `gothram_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `gothram_name` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gothram`
--

INSERT INTO `gothram` (`gothram_id`, `company_id`, `user_id`, `gothram_name`, `date`) VALUES
(2, 3, 3, 'sinh', '2019-12-26 11:53:48');

-- --------------------------------------------------------

--
-- Table structure for table `height`
--

CREATE TABLE `height` (
  `height_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `height_name` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `height`
--

INSERT INTO `height` (`height_id`, `company_id`, `user_id`, `height_name`, `date`) VALUES
(3, 3, 3, '4', '2019-12-26 11:59:19'),
(4, 3, 3, '7', '2019-12-26 12:04:55');

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `income_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `min_income` varchar(100) NOT NULL,
  `max_income` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`income_id`, `company_id`, `user_id`, `min_income`, `max_income`, `date`) VALUES
(2, 3, 3, '15500', '20000', '2019-12-27 09:31:13');

-- --------------------------------------------------------

--
-- Table structure for table `interest`
--

CREATE TABLE `interest` (
  `interest_id` bigint(20) NOT NULL,
  `from_member_id` int(11) NOT NULL,
  `to_member_id` int(11) NOT NULL,
  `interest_status` int(11) DEFAULT 0,
  `interest_date` varchar(20) NOT NULL,
  `interest_time` varchar(20) NOT NULL,
  `interest_date2` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `interest`
--

INSERT INTO `interest` (`interest_id`, `from_member_id`, `to_member_id`, `interest_status`, `interest_date`, `interest_time`, `interest_date2`) VALUES
(1, 5, 4, 2, '24-01-2020', '09:01:14 AM', '2020-01-25 09:46:05'),
(2, 4, 5, 1, '24-01-2020', '11:01:47 AM', '2020-01-24 12:40:52'),
(7, 4, 2, 0, '25-01-2020', '10:01:06 AM', '2020-01-25 10:57:06'),
(8, 4, 3, 0, '25-01-2020', '11:01:50 AM', '2020-01-25 11:05:50'),
(9, 7, 4, 0, '28-01-2020', '08:01:01 AM', '2020-01-28 08:21:01'),
(10, 15, 4, 0, '28-01-2020', '11:01:32 AM', '2020-01-28 11:27:32'),
(11, 4, 15, 0, '30-01-2020', '06:01:50 AM', '2020-01-30 06:46:50');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `language_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `language_name` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`language_id`, `company_id`, `user_id`, `language_name`, `date`) VALUES
(2, 3, 3, 'English', '2019-12-26 12:08:15'),
(3, 3, 3, 'Marathi', '2019-12-26 12:08:31');

-- --------------------------------------------------------

--
-- Table structure for table `marital_status`
--

CREATE TABLE `marital_status` (
  `marital_status_id` int(11) NOT NULL,
  `marital_status_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marital_status`
--

INSERT INTO `marital_status` (`marital_status_id`, `marital_status_name`) VALUES
(1, 'Never Married'),
(2, 'Divorcee'),
(3, 'Widow');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` bigint(20) NOT NULL,
  `member_user_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `member_name` varchar(250) NOT NULL,
  `member_address` text DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `tahasil_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `member_area` varchar(250) DEFAULT NULL,
  `member_gender` varchar(20) NOT NULL,
  `member_birth_date` varchar(20) NOT NULL,
  `member_age` int(11) DEFAULT NULL,
  `language_id` bigint(20) DEFAULT NULL,
  `religion_id` bigint(20) DEFAULT NULL,
  `member_email` varchar(150) DEFAULT NULL,
  `show_email` int(11) NOT NULL DEFAULT 0 COMMENT '0=no, 1=yes',
  `show_mobile` int(11) NOT NULL DEFAULT 0 COMMENT '0=no, 1=yes',
  `member_mobile` varchar(20) NOT NULL,
  `member_otp` varchar(20) DEFAULT NULL,
  `is_otp_check` int(11) NOT NULL DEFAULT 0 COMMENT '0=Ne, 1=Yes',
  `member_password` varchar(100) NOT NULL,
  `member_img` varchar(250) DEFAULT NULL,
  `member_img_num` int(11) NOT NULL DEFAULT 4,
  `onbehalf_id` int(11) DEFAULT NULL COMMENT 'Created By',
  `marital_status` varchar(50) DEFAULT NULL,
  `cast_id` int(11) DEFAULT NULL,
  `mamber_date` varchar(20) DEFAULT NULL,
  `member_status` varchar(50) NOT NULL DEFAULT 'free',
  `member_addedby` varchar(50) NOT NULL,
  `member_date2` timestamp NOT NULL DEFAULT current_timestamp(),
  `sub_cast_id` int(11) DEFAULT NULL,
  `blood_group_id` int(11) DEFAULT NULL,
  `body_type_id` int(11) DEFAULT NULL,
  `complexion_id` int(11) DEFAULT NULL,
  `diet_id` int(11) DEFAULT NULL,
  `education_id` int(11) DEFAULT NULL,
  `family_status_id` int(11) DEFAULT NULL,
  `family_type_id` int(11) DEFAULT NULL,
  `family_value_id` int(11) DEFAULT NULL,
  `gothram_id` int(11) DEFAULT NULL,
  `height_id` int(11) DEFAULT NULL,
  `income_id` int(11) DEFAULT NULL,
  `moonsign_id` int(11) DEFAULT NULL,
  `occupation_id` int(11) DEFAULT NULL,
  `resident_status_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `member_user_id`, `company_id`, `member_name`, `member_address`, `country_id`, `state_id`, `district_id`, `tahasil_id`, `city_id`, `member_area`, `member_gender`, `member_birth_date`, `member_age`, `language_id`, `religion_id`, `member_email`, `show_email`, `show_mobile`, `member_mobile`, `member_otp`, `is_otp_check`, `member_password`, `member_img`, `member_img_num`, `onbehalf_id`, `marital_status`, `cast_id`, `mamber_date`, `member_status`, `member_addedby`, `member_date2`, `sub_cast_id`, `blood_group_id`, `body_type_id`, `complexion_id`, `diet_id`, `education_id`, `family_status_id`, `family_type_id`, `family_value_id`, `gothram_id`, `height_id`, `income_id`, `moonsign_id`, `occupation_id`, `resident_status_id`) VALUES
(2, 0, 3, 'Pravin Patil', 'Kolhapur ', 3, 5, 4, 2, 7, 'Rajarampuri', 'Male', '01-01-2000', NULL, 3, 3, 'abc@gmail.com', 0, 0, '9876543211', NULL, 0, '123456', NULL, 4, 0, '0', 3, NULL, 'free', '3', '2020-01-14 10:44:36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 0, 3, 'Pruthvi kadam', 'a/p Kaneri  Math', 3, 5, 4, 2, 7, 'kaneri Math', 'Male', '01-01-1993', NULL, 3, 3, 'abc@gmail.com', 0, 0, '9876543212', '555666', 1, '123456', NULL, 4, 0, '0', 3, NULL, 'free', '3', '2020-01-14 11:08:57', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 0, 3, 'demo', 'ttt', 101, 22, 6, 4, 0, 'ooo', 'Female', '01-02-1990', NULL, 3, 3, 'ddd@mmm.com', 1, 0, '9988556633', '222333', 1, '123456', 'profile_4_1580291558.png', 4, NULL, '1', 3, NULL, 'free', '3', '2020-01-22 06:32:17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 0, 3, 'Dhananjay ', 'Kagal', 3, 5, 4, 2, 7, 'area1', 'Male', '04-02-1989', NULL, 3, 3, 'aaaa@gmail.com', 0, 0, '9955447788', NULL, 0, '123', NULL, 4, NULL, '1', 3, NULL, 'free', '0', '2020-01-22 06:32:12', 2, 2, 3, 1, 2, 3, 2, 1, 2, 2, 3, 2, 2, 3, 2),
(6, 0, 0, 'dfgdsfg', 'dsfg', 3, 5, 4, 3, 7, 'dfg', 'Male', '02-01-1992', NULL, 2, 3, 'demo@qqq.com', 0, 0, '9966332255', NULL, 0, '123', NULL, 4, NULL, '1', 3, NULL, 'free', '0', '2020-01-22 06:31:54', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 18, 0, 'Demo Add Lead', 'dfgdfg', 3, 5, 4, 2, 8, 'dsfg', 'Male', '15-06-1991', NULL, 3, 3, 'fgdf@sdf.com', 0, 0, '9673454383', '400367', 1, '123456', NULL, 4, NULL, '1', 3, '28-01-2020', 'free', '0', '2020-01-28 10:03:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `member_image`
--

CREATE TABLE `member_image` (
  `member_image_id` bigint(20) NOT NULL,
  `member_id` int(11) NOT NULL,
  `member_image_name` varchar(250) NOT NULL,
  `member_image_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member_image`
--

INSERT INTO `member_image` (`member_image_id`, `member_id`, `member_image_name`, `member_image_date`) VALUES
(1, 4, 'member_image_4_1580291597.png', '2020-01-29 09:53:17'),
(3, 4, 'member_image_4_1580291597.png', '2020-01-29 09:53:17'),
(6, 4, 'member_image_4_1580291597.png', '2020-01-29 09:53:17'),
(9, 4, 'member_image_4_1580291597.png', '2020-01-29 09:53:17');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` bigint(20) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `from_member_id` int(11) NOT NULL,
  `to_member_id` int(11) NOT NULL,
  `message_text` text NOT NULL,
  `message_date` varchar(20) NOT NULL,
  `message_time` varchar(20) NOT NULL,
  `message_date2` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `company_id`, `from_member_id`, `to_member_id`, `message_text`, `message_date`, `message_time`, `message_date2`) VALUES
(1, 0, 5, 4, 'Hello', '24-01-2020', '10:01:28 AM', '2020-01-24 10:02:28'),
(2, 0, 4, 6, 'hhhjjj', '24-01-2020', '11:01:03 AM', '2020-01-25 04:46:17'),
(4, NULL, 4, 6, 'uuu', '25-01-2020', '06:01:21 AM', '2020-01-25 06:57:21'),
(5, NULL, 4, 6, 'fghgh', '25-01-2020', '07:01:06 AM', '2020-01-25 07:08:06'),
(6, NULL, 4, 6, 'dfgdfg', '25-01-2020', '07:01:41 AM', '2020-01-25 07:08:41'),
(7, NULL, 4, 6, 'dfsdf', '25-01-2020', '07:01:59 AM', '2020-01-25 07:08:59'),
(8, NULL, 4, 6, 'gvdg', '25-01-2020', '07:01:49 AM', '2020-01-25 07:09:49'),
(9, NULL, 4, 6, 'kkk', '25-01-2020', '07:01:54 AM', '2020-01-25 07:09:54'),
(10, NULL, 4, 6, 'uuy', '25-01-2020', '07:01:00 AM', '2020-01-25 07:10:00'),
(11, NULL, 2, 5, 'fdgdfg', '25-01-2020', '07:01:46 AM', '2020-01-30 07:57:40'),
(12, NULL, 6, 5, 'hii', '25-01-2020', '07:01:33 AM', '2020-01-30 07:57:10'),
(13, NULL, 6, 5, 'ghj', '30-01-2020', '06:01:03 AM', '2020-01-30 07:46:00');

-- --------------------------------------------------------

--
-- Table structure for table `moonsign`
--

CREATE TABLE `moonsign` (
  `moonsign_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `moonsign_name` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `moonsign`
--

INSERT INTO `moonsign` (`moonsign_id`, `company_id`, `user_id`, `moonsign_name`, `date`) VALUES
(2, 3, 3, 'Mithun', '2019-12-26 12:13:39');

-- --------------------------------------------------------

--
-- Table structure for table `occupation`
--

CREATE TABLE `occupation` (
  `occupation_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `occupation_name` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `occupation`
--

INSERT INTO `occupation` (`occupation_id`, `company_id`, `user_id`, `occupation_name`, `date`) VALUES
(2, 3, 3, 'Businessman', '2019-12-26 12:18:00'),
(3, 3, 3, 'Manager', '2019-12-26 12:18:12');

-- --------------------------------------------------------

--
-- Table structure for table `onbehalf`
--

CREATE TABLE `onbehalf` (
  `onbehalf_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `onbehalf_name` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `onbehalf`
--

INSERT INTO `onbehalf` (`onbehalf_id`, `company_id`, `user_id`, `onbehalf_name`, `date`) VALUES
(1, 3, 3, 'abcd', '2019-12-26 12:24:08');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `package_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `package_name` varchar(250) NOT NULL,
  `package_amount` double NOT NULL,
  `package_int_cnt` int(11) NOT NULL,
  `package_photo_cnt` int(11) NOT NULL,
  `package_img` varchar(250) NOT NULL,
  `package_status` varchar(50) NOT NULL DEFAULT 'active',
  `package_addedby` varchar(50) NOT NULL,
  `package_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`package_id`, `company_id`, `package_name`, `package_amount`, `package_int_cnt`, `package_photo_cnt`, `package_img`, `package_status`, `package_addedby`, `package_date`) VALUES
(1, 3, 'www2', 1112, 22, 32, 'package_1_1579069485.jpg', 'deactivate', '3', '2020-01-15 06:25:45');

-- --------------------------------------------------------

--
-- Table structure for table `reference_by`
--

CREATE TABLE `reference_by` (
  `reference_by_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `reference_by_name` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reference_by`
--

INSERT INTO `reference_by` (`reference_by_id`, `company_id`, `user_id`, `reference_by_name`, `date`) VALUES
(3, 3, 3, 'abcd', '2019-12-26 12:32:06');

-- --------------------------------------------------------

--
-- Table structure for table `religion`
--

CREATE TABLE `religion` (
  `religion_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `religion_name` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `religion`
--

INSERT INTO `religion` (`religion_id`, `company_id`, `user_id`, `religion_name`, `date`) VALUES
(2, 3, 3, 'Muslim', '2019-12-27 07:08:56'),
(3, 3, 3, 'Hindu', '2019-12-27 07:10:04'),
(4, 3, 3, 'Shikh', '2019-12-27 07:10:16'),
(5, 3, 3, 'Parasi', '2019-12-27 07:10:25');

-- --------------------------------------------------------

--
-- Table structure for table `resident_status`
--

CREATE TABLE `resident_status` (
  `resident_status_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `resident_status_name` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resident_status`
--

INSERT INTO `resident_status` (`resident_status_id`, `company_id`, `user_id`, `resident_status_name`, `date`) VALUES
(2, 3, 3, 'pqrs', '2019-12-27 09:39:57');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` bigint(20) NOT NULL,
  `role_name` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`, `date`) VALUES
(1, 'Admin', '2020-01-15 09:29:41'),
(2, 'Office Employee', '2020-01-15 09:28:50'),
(3, 'Telecaller', '2020-01-15 09:28:50'),
(4, 'Dealer', '2020-01-15 09:28:50'),
(5, 'Sub Dealer', '2020-01-15 09:28:50'),
(6, 'Member', '2020-01-28 04:53:14');

-- --------------------------------------------------------

--
-- Table structure for table `shortlist`
--

CREATE TABLE `shortlist` (
  `shortlist_id` bigint(20) NOT NULL,
  `from_member_id` int(11) NOT NULL,
  `to_member_id` int(11) NOT NULL,
  `shortlist_date` varchar(20) NOT NULL,
  `shortlist_time` varchar(20) NOT NULL,
  `shortlist_date2` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shortlist`
--

INSERT INTO `shortlist` (`shortlist_id`, `from_member_id`, `to_member_id`, `shortlist_date`, `shortlist_time`, `shortlist_date2`) VALUES
(1, 5, 4, '24-01-2020', '07:01:42 AM', '2020-01-24 07:19:42');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `roll_id` int(11) NOT NULL DEFAULT 1,
  `user_id` int(11) DEFAULT NULL,
  `staff_name` varchar(250) NOT NULL,
  `staff_city` varchar(150) NOT NULL,
  `staff_gender` varchar(250) NOT NULL,
  `staff_email` varchar(250) NOT NULL,
  `staff_mobile` varchar(12) NOT NULL,
  `staff_password` varchar(100) NOT NULL,
  `staff_status` varchar(20) NOT NULL DEFAULT 'active',
  `staff_addedby` varchar(100) NOT NULL,
  `staff_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `company_id`, `roll_id`, `user_id`, `staff_name`, `staff_city`, `staff_gender`, `staff_email`, `staff_mobile`, `staff_password`, `staff_status`, `staff_addedby`, `staff_date`) VALUES
(3, 1, 2, 7, 'Emp Demo', 'kop', 'Male', 'ddd@ggg.com', '9988556622', '123', 'active', '3', '2020-01-18 05:51:32');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `country_id` bigint(20) NOT NULL,
  `state_name` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `company_id`, `user_id`, `country_id`, `state_name`, `date`) VALUES
(1, 0, 0, 101, 'Andaman and Nicobar Islands', '2020-01-28 13:11:43'),
(2, 0, 0, 101, 'Andhra Pradesh', '2020-01-28 13:11:43'),
(3, 0, 0, 101, 'Arunachal Pradesh', '2020-01-28 13:11:43'),
(4, 0, 0, 101, 'Assam', '2020-01-28 13:11:43'),
(5, 0, 0, 101, 'Bihar', '2020-01-28 13:11:43'),
(6, 0, 0, 101, 'Chandigarh', '2020-01-28 13:11:43'),
(7, 0, 0, 101, 'Chhattisgarh', '2020-01-28 13:11:43'),
(8, 0, 0, 101, 'Dadra and Nagar Haveli', '2020-01-28 13:11:43'),
(9, 0, 0, 101, 'Daman and Diu', '2020-01-28 13:11:43'),
(10, 0, 0, 101, 'Delhi', '2020-01-28 13:11:43'),
(11, 0, 0, 101, 'Goa', '2020-01-28 13:11:43'),
(12, 0, 0, 101, 'Gujarat', '2020-01-28 13:11:43'),
(13, 0, 0, 101, 'Haryana', '2020-01-28 13:11:43'),
(14, 0, 0, 101, 'Himachal Pradesh', '2020-01-28 13:11:43'),
(15, 0, 0, 101, 'Jammu and Kashmir', '2020-01-28 13:11:43'),
(16, 0, 0, 101, 'Jharkhand', '2020-01-28 13:11:43'),
(17, 0, 0, 101, 'Karnataka', '2020-01-28 13:11:43'),
(18, 0, 0, 101, 'Kenmore', '2020-01-28 13:11:43'),
(19, 0, 0, 101, 'Kerala', '2020-01-28 13:11:43'),
(20, 0, 0, 101, 'Lakshadweep', '2020-01-28 13:11:43'),
(21, 0, 0, 101, 'Madhya Pradesh', '2020-01-28 13:11:43'),
(22, 0, 0, 101, 'Maharashtra', '2020-01-28 13:11:43'),
(23, 0, 0, 101, 'Manipur', '2020-01-28 13:11:43'),
(24, 0, 0, 101, 'Meghalaya', '2020-01-28 13:11:43'),
(25, 0, 0, 101, 'Mizoram', '2020-01-28 13:11:43'),
(26, 0, 0, 101, 'Nagaland', '2020-01-28 13:11:43'),
(27, 0, 0, 101, 'Narora', '2020-01-28 13:11:43'),
(28, 0, 0, 101, 'Natwar', '2020-01-28 13:11:43'),
(29, 0, 0, 101, 'Odisha', '2020-01-28 13:11:43'),
(30, 0, 0, 101, 'Paschim Medinipur', '2020-01-28 13:11:43'),
(31, 0, 0, 101, 'Pondicherry', '2020-01-28 13:11:43'),
(32, 0, 0, 101, 'Punjab', '2020-01-28 13:11:43'),
(33, 0, 0, 101, 'Rajasthan', '2020-01-28 13:11:43'),
(34, 0, 0, 101, 'Sikkim', '2020-01-28 13:11:43'),
(35, 0, 0, 101, 'Tamil Nadu', '2020-01-28 13:11:43'),
(36, 0, 0, 101, 'Telangana', '2020-01-28 13:11:43'),
(37, 0, 0, 101, 'Tripura', '2020-01-28 13:11:43'),
(38, 0, 0, 101, 'Uttar Pradesh', '2020-01-28 13:11:43'),
(39, 0, 0, 101, 'Uttarakhand', '2020-01-28 13:11:43'),
(40, 0, 0, 101, 'Vaishali', '2020-01-28 13:11:43'),
(41, 0, 0, 101, 'West Bengal', '2020-01-28 13:11:43'),
(42, 0, 0, 1, 'Badakhshan', '2020-01-28 13:11:43'),
(43, 0, 0, 1, 'Badgis', '2020-01-28 13:11:43'),
(44, 0, 0, 1, 'Baglan', '2020-01-28 13:11:43'),
(45, 0, 0, 1, 'Balkh', '2020-01-28 13:11:43'),
(46, 0, 0, 1, 'Bamiyan', '2020-01-28 13:11:43'),
(47, 0, 0, 1, 'Farah', '2020-01-28 13:11:43'),
(48, 0, 0, 1, 'Faryab', '2020-01-28 13:11:43'),
(49, 0, 0, 1, 'Gawr', '2020-01-28 13:11:43'),
(50, 0, 0, 1, 'Gazni', '2020-01-28 13:11:43'),
(51, 0, 0, 1, 'Herat', '2020-01-28 13:11:43'),
(52, 0, 0, 1, 'Hilmand', '2020-01-28 13:11:43'),
(53, 0, 0, 1, 'Jawzjan', '2020-01-28 13:11:43'),
(54, 0, 0, 1, 'Kabul', '2020-01-28 13:11:43'),
(55, 0, 0, 1, 'Kapisa', '2020-01-28 13:11:43'),
(56, 0, 0, 1, 'Khawst', '2020-01-28 13:11:43'),
(57, 0, 0, 1, 'Kunar', '2020-01-28 13:11:43'),
(58, 0, 0, 1, 'Lagman', '2020-01-28 13:11:43'),
(59, 0, 0, 1, 'Lawghar', '2020-01-28 13:11:43'),
(60, 0, 0, 1, 'Nangarhar', '2020-01-28 13:11:43'),
(61, 0, 0, 1, 'Nimruz', '2020-01-28 13:11:43'),
(62, 0, 0, 1, 'Nuristan', '2020-01-28 13:11:43'),
(63, 0, 0, 1, 'Paktika', '2020-01-28 13:11:43'),
(64, 0, 0, 1, 'Paktiya', '2020-01-28 13:11:43'),
(65, 0, 0, 1, 'Parwan', '2020-01-28 13:11:43'),
(66, 0, 0, 1, 'Qandahar', '2020-01-28 13:11:43'),
(67, 0, 0, 1, 'Qunduz', '2020-01-28 13:11:43'),
(68, 0, 0, 1, 'Samangan', '2020-01-28 13:11:43'),
(69, 0, 0, 1, 'Sar-e Pul', '2020-01-28 13:11:43'),
(70, 0, 0, 1, 'Takhar', '2020-01-28 13:11:43'),
(71, 0, 0, 1, 'Uruzgan', '2020-01-28 13:11:43'),
(72, 0, 0, 1, 'Wardag', '2020-01-28 13:11:43'),
(73, 0, 0, 1, 'Zabul', '2020-01-28 13:11:43'),
(74, 0, 0, 2, 'Berat', '2020-01-28 13:11:43'),
(75, 0, 0, 2, 'Bulqize', '2020-01-28 13:11:43'),
(76, 0, 0, 2, 'Delvine', '2020-01-28 13:11:43'),
(77, 0, 0, 2, 'Devoll', '2020-01-28 13:11:43'),
(78, 0, 0, 2, 'Dibre', '2020-01-28 13:11:43'),
(79, 0, 0, 2, 'Durres', '2020-01-28 13:11:43'),
(80, 0, 0, 2, 'Elbasan', '2020-01-28 13:11:43'),
(81, 0, 0, 2, 'Fier', '2020-01-28 13:11:43'),
(82, 0, 0, 2, 'Gjirokaster', '2020-01-28 13:11:43'),
(83, 0, 0, 2, 'Gramsh', '2020-01-28 13:11:43'),
(84, 0, 0, 2, 'Has', '2020-01-28 13:11:43'),
(85, 0, 0, 2, 'Kavaje', '2020-01-28 13:11:43'),
(86, 0, 0, 2, 'Kolonje', '2020-01-28 13:11:43'),
(87, 0, 0, 2, 'Korce', '2020-01-28 13:11:43'),
(88, 0, 0, 2, 'Kruje', '2020-01-28 13:11:43'),
(89, 0, 0, 2, 'Kucove', '2020-01-28 13:11:43'),
(90, 0, 0, 2, 'Kukes', '2020-01-28 13:11:43'),
(91, 0, 0, 2, 'Kurbin', '2020-01-28 13:11:43'),
(92, 0, 0, 2, 'Lezhe', '2020-01-28 13:11:43'),
(93, 0, 0, 2, 'Librazhd', '2020-01-28 13:11:43'),
(94, 0, 0, 2, 'Lushnje', '2020-01-28 13:11:43'),
(95, 0, 0, 2, 'Mallakaster', '2020-01-28 13:11:43'),
(96, 0, 0, 2, 'Malsi e Madhe', '2020-01-28 13:11:43'),
(97, 0, 0, 2, 'Mat', '2020-01-28 13:11:43'),
(98, 0, 0, 2, 'Mirdite', '2020-01-28 13:11:43'),
(99, 0, 0, 2, 'Peqin', '2020-01-28 13:11:43'),
(100, 0, 0, 2, 'Permet', '2020-01-28 13:11:43'),
(101, 0, 0, 2, 'Pogradec', '2020-01-28 13:11:43'),
(102, 0, 0, 2, 'Puke', '2020-01-28 13:11:43'),
(103, 0, 0, 2, 'Sarande', '2020-01-28 13:11:43'),
(104, 0, 0, 2, 'Shkoder', '2020-01-28 13:11:43'),
(105, 0, 0, 2, 'Skrapar', '2020-01-28 13:11:43'),
(106, 0, 0, 2, 'Tepelene', '2020-01-28 13:11:43'),
(107, 0, 0, 2, 'Tirane', '2020-01-28 13:11:43'),
(108, 0, 0, 2, 'Tropoje', '2020-01-28 13:11:43'),
(109, 0, 0, 2, 'Vlore', '2020-01-28 13:11:43'),
(110, 0, 0, 3, '\'Ayn Daflah', '2020-01-28 13:11:43'),
(111, 0, 0, 3, '\'Ayn Tamushanat', '2020-01-28 13:11:43'),
(112, 0, 0, 3, 'Adrar', '2020-01-28 13:11:43'),
(113, 0, 0, 3, 'Algiers', '2020-01-28 13:11:43'),
(114, 0, 0, 3, 'Annabah', '2020-01-28 13:11:43'),
(115, 0, 0, 3, 'Bashshar', '2020-01-28 13:11:43'),
(116, 0, 0, 3, 'Batnah', '2020-01-28 13:11:43'),
(117, 0, 0, 3, 'Bijayah', '2020-01-28 13:11:43'),
(118, 0, 0, 3, 'Biskrah', '2020-01-28 13:11:43'),
(119, 0, 0, 3, 'Blidah', '2020-01-28 13:11:43'),
(120, 0, 0, 3, 'Buirah', '2020-01-28 13:11:43'),
(121, 0, 0, 3, 'Bumardas', '2020-01-28 13:11:43'),
(122, 0, 0, 3, 'Burj Bu Arririj', '2020-01-28 13:11:43'),
(123, 0, 0, 3, 'Ghalizan', '2020-01-28 13:11:43'),
(124, 0, 0, 3, 'Ghardayah', '2020-01-28 13:11:43'),
(125, 0, 0, 3, 'Ilizi', '2020-01-28 13:11:43'),
(126, 0, 0, 3, 'Jijili', '2020-01-28 13:11:43'),
(127, 0, 0, 3, 'Jilfah', '2020-01-28 13:11:43'),
(128, 0, 0, 3, 'Khanshalah', '2020-01-28 13:11:43'),
(129, 0, 0, 3, 'Masilah', '2020-01-28 13:11:43'),
(130, 0, 0, 3, 'Midyah', '2020-01-28 13:11:43'),
(131, 0, 0, 3, 'Milah', '2020-01-28 13:11:43'),
(132, 0, 0, 3, 'Muaskar', '2020-01-28 13:11:43'),
(133, 0, 0, 3, 'Mustaghanam', '2020-01-28 13:11:43'),
(134, 0, 0, 3, 'Naama', '2020-01-28 13:11:43'),
(135, 0, 0, 3, 'Oran', '2020-01-28 13:11:43'),
(136, 0, 0, 3, 'Ouargla', '2020-01-28 13:11:43'),
(137, 0, 0, 3, 'Qalmah', '2020-01-28 13:11:43'),
(138, 0, 0, 3, 'Qustantinah', '2020-01-28 13:11:43'),
(139, 0, 0, 3, 'Sakikdah', '2020-01-28 13:11:43'),
(140, 0, 0, 3, 'Satif', '2020-01-28 13:11:43'),
(141, 0, 0, 3, 'Sayda\'', '2020-01-28 13:11:43'),
(142, 0, 0, 3, 'Sidi ban-al-\'Abbas', '2020-01-28 13:11:43'),
(143, 0, 0, 3, 'Suq Ahras', '2020-01-28 13:11:43'),
(144, 0, 0, 3, 'Tamanghasat', '2020-01-28 13:11:43'),
(145, 0, 0, 3, 'Tibazah', '2020-01-28 13:11:43'),
(146, 0, 0, 3, 'Tibissah', '2020-01-28 13:11:43'),
(147, 0, 0, 3, 'Tilimsan', '2020-01-28 13:11:43'),
(148, 0, 0, 3, 'Tinduf', '2020-01-28 13:11:43'),
(149, 0, 0, 3, 'Tisamsilt', '2020-01-28 13:11:43'),
(150, 0, 0, 3, 'Tiyarat', '2020-01-28 13:11:43'),
(151, 0, 0, 3, 'Tizi Wazu', '2020-01-28 13:11:43'),
(152, 0, 0, 3, 'Umm-al-Bawaghi', '2020-01-28 13:11:43'),
(153, 0, 0, 3, 'Wahran', '2020-01-28 13:11:43'),
(154, 0, 0, 3, 'Warqla', '2020-01-28 13:11:43'),
(155, 0, 0, 3, 'Wilaya d Alger', '2020-01-28 13:11:43'),
(156, 0, 0, 3, 'Wilaya de Bejaia', '2020-01-28 13:11:43'),
(157, 0, 0, 3, 'Wilaya de Constantine', '2020-01-28 13:11:43'),
(158, 0, 0, 3, 'al-Aghwat', '2020-01-28 13:11:43'),
(159, 0, 0, 3, 'al-Bayadh', '2020-01-28 13:11:43'),
(160, 0, 0, 3, 'al-Jaza\'ir', '2020-01-28 13:11:43'),
(161, 0, 0, 3, 'al-Wad', '2020-01-28 13:11:43'),
(162, 0, 0, 3, 'ash-Shalif', '2020-01-28 13:11:43'),
(163, 0, 0, 3, 'at-Tarif', '2020-01-28 13:11:43'),
(164, 0, 0, 4, 'Eastern', '2020-01-28 13:11:43'),
(165, 0, 0, 4, 'Manu\'a', '2020-01-28 13:11:43'),
(166, 0, 0, 4, 'Swains Island', '2020-01-28 13:11:43'),
(167, 0, 0, 4, 'Western', '2020-01-28 13:11:43'),
(168, 0, 0, 5, 'Andorra la Vella', '2020-01-28 13:11:43'),
(169, 0, 0, 5, 'Canillo', '2020-01-28 13:11:43'),
(170, 0, 0, 5, 'Encamp', '2020-01-28 13:11:43'),
(171, 0, 0, 5, 'La Massana', '2020-01-28 13:11:43'),
(172, 0, 0, 5, 'Les Escaldes', '2020-01-28 13:11:43'),
(173, 0, 0, 5, 'Ordino', '2020-01-28 13:11:43'),
(174, 0, 0, 5, 'Sant Julia de Loria', '2020-01-28 13:11:43'),
(175, 0, 0, 6, 'Bengo', '2020-01-28 13:11:43'),
(176, 0, 0, 6, 'Benguela', '2020-01-28 13:11:43'),
(177, 0, 0, 6, 'Bie', '2020-01-28 13:11:43'),
(178, 0, 0, 6, 'Cabinda', '2020-01-28 13:11:43'),
(179, 0, 0, 6, 'Cunene', '2020-01-28 13:11:43'),
(180, 0, 0, 6, 'Huambo', '2020-01-28 13:11:43'),
(181, 0, 0, 6, 'Huila', '2020-01-28 13:11:43'),
(182, 0, 0, 6, 'Kuando-Kubango', '2020-01-28 13:11:43'),
(183, 0, 0, 6, 'Kwanza Norte', '2020-01-28 13:11:43'),
(184, 0, 0, 6, 'Kwanza Sul', '2020-01-28 13:11:43'),
(185, 0, 0, 6, 'Luanda', '2020-01-28 13:11:43'),
(186, 0, 0, 6, 'Lunda Norte', '2020-01-28 13:11:43'),
(187, 0, 0, 6, 'Lunda Sul', '2020-01-28 13:11:43'),
(188, 0, 0, 6, 'Malanje', '2020-01-28 13:11:43'),
(189, 0, 0, 6, 'Moxico', '2020-01-28 13:11:43'),
(190, 0, 0, 6, 'Namibe', '2020-01-28 13:11:43'),
(191, 0, 0, 6, 'Uige', '2020-01-28 13:11:43'),
(192, 0, 0, 6, 'Zaire', '2020-01-28 13:11:43'),
(193, 0, 0, 7, 'Other Provinces', '2020-01-28 13:11:43'),
(194, 0, 0, 8, 'Sector claimed by Argentina/Ch', '2020-01-28 13:11:43'),
(195, 0, 0, 8, 'Sector claimed by Argentina/UK', '2020-01-28 13:11:43'),
(196, 0, 0, 8, 'Sector claimed by Australia', '2020-01-28 13:11:43'),
(197, 0, 0, 8, 'Sector claimed by France', '2020-01-28 13:11:43'),
(198, 0, 0, 8, 'Sector claimed by New Zealand', '2020-01-28 13:11:43'),
(199, 0, 0, 8, 'Sector claimed by Norway', '2020-01-28 13:11:43'),
(200, 0, 0, 8, 'Unclaimed Sector', '2020-01-28 13:11:43'),
(201, 0, 0, 9, 'Barbuda', '2020-01-28 13:11:43'),
(202, 0, 0, 9, 'Saint George', '2020-01-28 13:11:43'),
(203, 0, 0, 9, 'Saint John', '2020-01-28 13:11:43'),
(204, 0, 0, 9, 'Saint Mary', '2020-01-28 13:11:43'),
(205, 0, 0, 9, 'Saint Paul', '2020-01-28 13:11:43'),
(206, 0, 0, 9, 'Saint Peter', '2020-01-28 13:11:43'),
(207, 0, 0, 9, 'Saint Philip', '2020-01-28 13:11:43'),
(208, 0, 0, 10, 'Buenos Aires', '2020-01-28 13:11:43'),
(209, 0, 0, 10, 'Catamarca', '2020-01-28 13:11:43'),
(210, 0, 0, 10, 'Chaco', '2020-01-28 13:11:43'),
(211, 0, 0, 10, 'Chubut', '2020-01-28 13:11:43'),
(212, 0, 0, 10, 'Cordoba', '2020-01-28 13:11:43'),
(213, 0, 0, 10, 'Corrientes', '2020-01-28 13:11:43'),
(214, 0, 0, 10, 'Distrito Federal', '2020-01-28 13:11:43'),
(215, 0, 0, 10, 'Entre Rios', '2020-01-28 13:11:43'),
(216, 0, 0, 10, 'Formosa', '2020-01-28 13:11:43'),
(217, 0, 0, 10, 'Jujuy', '2020-01-28 13:11:43'),
(218, 0, 0, 10, 'La Pampa', '2020-01-28 13:11:43'),
(219, 0, 0, 10, 'La Rioja', '2020-01-28 13:11:43'),
(220, 0, 0, 10, 'Mendoza', '2020-01-28 13:11:43'),
(221, 0, 0, 10, 'Misiones', '2020-01-28 13:11:43'),
(222, 0, 0, 10, 'Neuquen', '2020-01-28 13:11:43'),
(223, 0, 0, 10, 'Rio Negro', '2020-01-28 13:11:43'),
(224, 0, 0, 10, 'Salta', '2020-01-28 13:11:43'),
(225, 0, 0, 10, 'San Juan', '2020-01-28 13:11:43'),
(226, 0, 0, 10, 'San Luis', '2020-01-28 13:11:43'),
(227, 0, 0, 10, 'Santa Cruz', '2020-01-28 13:11:43'),
(228, 0, 0, 10, 'Santa Fe', '2020-01-28 13:11:43'),
(229, 0, 0, 10, 'Santiago del Estero', '2020-01-28 13:11:43'),
(230, 0, 0, 10, 'Tierra del Fuego', '2020-01-28 13:11:43'),
(231, 0, 0, 10, 'Tucuman', '2020-01-28 13:11:43'),
(232, 0, 0, 11, 'Aragatsotn', '2020-01-28 13:11:43'),
(233, 0, 0, 11, 'Ararat', '2020-01-28 13:11:43'),
(234, 0, 0, 11, 'Armavir', '2020-01-28 13:11:43'),
(235, 0, 0, 11, 'Gegharkunik', '2020-01-28 13:11:43'),
(236, 0, 0, 11, 'Kotaik', '2020-01-28 13:11:43'),
(237, 0, 0, 11, 'Lori', '2020-01-28 13:11:43'),
(238, 0, 0, 11, 'Shirak', '2020-01-28 13:11:43'),
(239, 0, 0, 11, 'Stepanakert', '2020-01-28 13:11:43'),
(240, 0, 0, 11, 'Syunik', '2020-01-28 13:11:43'),
(241, 0, 0, 11, 'Tavush', '2020-01-28 13:11:43'),
(242, 0, 0, 11, 'Vayots Dzor', '2020-01-28 13:11:43'),
(243, 0, 0, 11, 'Yerevan', '2020-01-28 13:11:43'),
(244, 0, 0, 12, 'Aruba', '2020-01-28 13:11:43'),
(245, 0, 0, 13, 'Auckland', '2020-01-28 13:11:43'),
(246, 0, 0, 13, 'Australian Capital Territory', '2020-01-28 13:11:43'),
(247, 0, 0, 13, 'Balgowlah', '2020-01-28 13:11:43'),
(248, 0, 0, 13, 'Balmain', '2020-01-28 13:11:43'),
(249, 0, 0, 13, 'Bankstown', '2020-01-28 13:11:43'),
(250, 0, 0, 13, 'Baulkham Hills', '2020-01-28 13:11:43'),
(251, 0, 0, 13, 'Bonnet Bay', '2020-01-28 13:11:43'),
(252, 0, 0, 13, 'Camberwell', '2020-01-28 13:11:43'),
(253, 0, 0, 13, 'Carole Park', '2020-01-28 13:11:43'),
(254, 0, 0, 13, 'Castle Hill', '2020-01-28 13:11:43'),
(255, 0, 0, 13, 'Caulfield', '2020-01-28 13:11:43'),
(256, 0, 0, 13, 'Chatswood', '2020-01-28 13:11:43'),
(257, 0, 0, 13, 'Cheltenham', '2020-01-28 13:11:43'),
(258, 0, 0, 13, 'Cherrybrook', '2020-01-28 13:11:43'),
(259, 0, 0, 13, 'Clayton', '2020-01-28 13:11:43'),
(260, 0, 0, 13, 'Collingwood', '2020-01-28 13:11:43'),
(261, 0, 0, 13, 'Frenchs Forest', '2020-01-28 13:11:43'),
(262, 0, 0, 13, 'Hawthorn', '2020-01-28 13:11:43'),
(263, 0, 0, 13, 'Jannnali', '2020-01-28 13:11:43'),
(264, 0, 0, 13, 'Knoxfield', '2020-01-28 13:11:43'),
(265, 0, 0, 13, 'Melbourne', '2020-01-28 13:11:43'),
(266, 0, 0, 13, 'New South Wales', '2020-01-28 13:11:43'),
(267, 0, 0, 13, 'Northern Territory', '2020-01-28 13:11:43'),
(268, 0, 0, 13, 'Perth', '2020-01-28 13:11:43'),
(269, 0, 0, 13, 'Queensland', '2020-01-28 13:11:43'),
(270, 0, 0, 13, 'South Australia', '2020-01-28 13:11:43'),
(271, 0, 0, 13, 'Tasmania', '2020-01-28 13:11:43'),
(272, 0, 0, 13, 'Templestowe', '2020-01-28 13:11:43'),
(273, 0, 0, 13, 'Victoria', '2020-01-28 13:11:43'),
(274, 0, 0, 13, 'Werribee south', '2020-01-28 13:11:43'),
(275, 0, 0, 13, 'Western Australia', '2020-01-28 13:11:43'),
(276, 0, 0, 13, 'Wheeler', '2020-01-28 13:11:43'),
(277, 0, 0, 14, 'Bundesland Salzburg', '2020-01-28 13:11:43'),
(278, 0, 0, 14, 'Bundesland Steiermark', '2020-01-28 13:11:43'),
(279, 0, 0, 14, 'Bundesland Tirol', '2020-01-28 13:11:43'),
(280, 0, 0, 14, 'Burgenland', '2020-01-28 13:11:43'),
(281, 0, 0, 14, 'Carinthia', '2020-01-28 13:11:43'),
(282, 0, 0, 14, 'Karnten', '2020-01-28 13:11:43'),
(283, 0, 0, 14, 'Liezen', '2020-01-28 13:11:43'),
(284, 0, 0, 14, 'Lower Austria', '2020-01-28 13:11:43'),
(285, 0, 0, 14, 'Niederosterreich', '2020-01-28 13:11:43'),
(286, 0, 0, 14, 'Oberosterreich', '2020-01-28 13:11:43'),
(287, 0, 0, 14, 'Salzburg', '2020-01-28 13:11:43'),
(288, 0, 0, 14, 'Schleswig-Holstein', '2020-01-28 13:11:43'),
(289, 0, 0, 14, 'Steiermark', '2020-01-28 13:11:43'),
(290, 0, 0, 14, 'Styria', '2020-01-28 13:11:43'),
(291, 0, 0, 14, 'Tirol', '2020-01-28 13:11:43'),
(292, 0, 0, 14, 'Upper Austria', '2020-01-28 13:11:43'),
(293, 0, 0, 14, 'Vorarlberg', '2020-01-28 13:11:43'),
(294, 0, 0, 14, 'Wien', '2020-01-28 13:11:43'),
(295, 0, 0, 15, 'Abseron', '2020-01-28 13:11:43'),
(296, 0, 0, 15, 'Baki Sahari', '2020-01-28 13:11:43'),
(297, 0, 0, 15, 'Ganca', '2020-01-28 13:11:43'),
(298, 0, 0, 15, 'Ganja', '2020-01-28 13:11:43'),
(299, 0, 0, 15, 'Kalbacar', '2020-01-28 13:11:43'),
(300, 0, 0, 15, 'Lankaran', '2020-01-28 13:11:43'),
(301, 0, 0, 15, 'Mil-Qarabax', '2020-01-28 13:11:43'),
(302, 0, 0, 15, 'Mugan-Salyan', '2020-01-28 13:11:43'),
(303, 0, 0, 15, 'Nagorni-Qarabax', '2020-01-28 13:11:43'),
(304, 0, 0, 15, 'Naxcivan', '2020-01-28 13:11:43'),
(305, 0, 0, 15, 'Priaraks', '2020-01-28 13:11:43'),
(306, 0, 0, 15, 'Qazax', '2020-01-28 13:11:43'),
(307, 0, 0, 15, 'Saki', '2020-01-28 13:11:43'),
(308, 0, 0, 15, 'Sirvan', '2020-01-28 13:11:43'),
(309, 0, 0, 15, 'Xacmaz', '2020-01-28 13:11:43'),
(310, 0, 0, 16, 'Abaco', '2020-01-28 13:11:43'),
(311, 0, 0, 16, 'Acklins Island', '2020-01-28 13:11:43'),
(312, 0, 0, 16, 'Andros', '2020-01-28 13:11:43'),
(313, 0, 0, 16, 'Berry Islands', '2020-01-28 13:11:43'),
(314, 0, 0, 16, 'Biminis', '2020-01-28 13:11:43'),
(315, 0, 0, 16, 'Cat Island', '2020-01-28 13:11:43'),
(316, 0, 0, 16, 'Crooked Island', '2020-01-28 13:11:43'),
(317, 0, 0, 16, 'Eleuthera', '2020-01-28 13:11:43'),
(318, 0, 0, 16, 'Exuma and Cays', '2020-01-28 13:11:43'),
(319, 0, 0, 16, 'Grand Bahama', '2020-01-28 13:11:43'),
(320, 0, 0, 16, 'Inagua Islands', '2020-01-28 13:11:43'),
(321, 0, 0, 16, 'Long Island', '2020-01-28 13:11:43'),
(322, 0, 0, 16, 'Mayaguana', '2020-01-28 13:11:43'),
(323, 0, 0, 16, 'New Providence', '2020-01-28 13:11:43'),
(324, 0, 0, 16, 'Ragged Island', '2020-01-28 13:11:43'),
(325, 0, 0, 16, 'Rum Cay', '2020-01-28 13:11:43'),
(326, 0, 0, 16, 'San Salvador', '2020-01-28 13:11:43'),
(327, 0, 0, 17, '\'Isa', '2020-01-28 13:11:43'),
(328, 0, 0, 17, 'Badiyah', '2020-01-28 13:11:43'),
(329, 0, 0, 17, 'Hidd', '2020-01-28 13:11:43'),
(330, 0, 0, 17, 'Jidd Hafs', '2020-01-28 13:11:43'),
(331, 0, 0, 17, 'Mahama', '2020-01-28 13:11:43'),
(332, 0, 0, 17, 'Manama', '2020-01-28 13:11:43'),
(333, 0, 0, 17, 'Sitrah', '2020-01-28 13:11:43'),
(334, 0, 0, 17, 'al-Manamah', '2020-01-28 13:11:43'),
(335, 0, 0, 17, 'al-Muharraq', '2020-01-28 13:11:43'),
(336, 0, 0, 17, 'ar-Rifa\'a', '2020-01-28 13:11:43'),
(337, 0, 0, 18, 'Bagar Hat', '2020-01-28 13:11:43'),
(338, 0, 0, 18, 'Bandarban', '2020-01-28 13:11:43'),
(339, 0, 0, 18, 'Barguna', '2020-01-28 13:11:43'),
(340, 0, 0, 18, 'Barisal', '2020-01-28 13:11:43'),
(341, 0, 0, 18, 'Bhola', '2020-01-28 13:11:43'),
(342, 0, 0, 18, 'Bogora', '2020-01-28 13:11:43'),
(343, 0, 0, 18, 'Brahman Bariya', '2020-01-28 13:11:43'),
(344, 0, 0, 18, 'Chandpur', '2020-01-28 13:11:43'),
(345, 0, 0, 18, 'Chattagam', '2020-01-28 13:11:43'),
(346, 0, 0, 18, 'Chittagong Division', '2020-01-28 13:11:43'),
(347, 0, 0, 18, 'Chuadanga', '2020-01-28 13:11:43'),
(348, 0, 0, 18, 'Dhaka', '2020-01-28 13:11:43'),
(349, 0, 0, 18, 'Dinajpur', '2020-01-28 13:11:43'),
(350, 0, 0, 18, 'Faridpur', '2020-01-28 13:11:43'),
(351, 0, 0, 18, 'Feni', '2020-01-28 13:11:43'),
(352, 0, 0, 18, 'Gaybanda', '2020-01-28 13:11:43'),
(353, 0, 0, 18, 'Gazipur', '2020-01-28 13:11:43'),
(354, 0, 0, 18, 'Gopalganj', '2020-01-28 13:11:43'),
(355, 0, 0, 18, 'Habiganj', '2020-01-28 13:11:43'),
(356, 0, 0, 18, 'Jaipur Hat', '2020-01-28 13:11:43'),
(357, 0, 0, 18, 'Jamalpur', '2020-01-28 13:11:43'),
(358, 0, 0, 18, 'Jessor', '2020-01-28 13:11:43'),
(359, 0, 0, 18, 'Jhalakati', '2020-01-28 13:11:43'),
(360, 0, 0, 18, 'Jhanaydah', '2020-01-28 13:11:43'),
(361, 0, 0, 18, 'Khagrachhari', '2020-01-28 13:11:43'),
(362, 0, 0, 18, 'Khulna', '2020-01-28 13:11:43'),
(363, 0, 0, 18, 'Kishorganj', '2020-01-28 13:11:43'),
(364, 0, 0, 18, 'Koks Bazar', '2020-01-28 13:11:43'),
(365, 0, 0, 18, 'Komilla', '2020-01-28 13:11:43'),
(366, 0, 0, 18, 'Kurigram', '2020-01-28 13:11:43'),
(367, 0, 0, 18, 'Kushtiya', '2020-01-28 13:11:43'),
(368, 0, 0, 18, 'Lakshmipur', '2020-01-28 13:11:43'),
(369, 0, 0, 18, 'Lalmanir Hat', '2020-01-28 13:11:43'),
(370, 0, 0, 18, 'Madaripur', '2020-01-28 13:11:43'),
(371, 0, 0, 18, 'Magura', '2020-01-28 13:11:43'),
(372, 0, 0, 18, 'Maimansingh', '2020-01-28 13:11:43'),
(373, 0, 0, 18, 'Manikganj', '2020-01-28 13:11:43'),
(374, 0, 0, 18, 'Maulvi Bazar', '2020-01-28 13:11:43'),
(375, 0, 0, 18, 'Meherpur', '2020-01-28 13:11:43'),
(376, 0, 0, 18, 'Munshiganj', '2020-01-28 13:11:43'),
(377, 0, 0, 18, 'Naral', '2020-01-28 13:11:43'),
(378, 0, 0, 18, 'Narayanganj', '2020-01-28 13:11:43'),
(379, 0, 0, 18, 'Narsingdi', '2020-01-28 13:11:43'),
(380, 0, 0, 18, 'Nator', '2020-01-28 13:11:43'),
(381, 0, 0, 18, 'Naugaon', '2020-01-28 13:11:43'),
(382, 0, 0, 18, 'Nawabganj', '2020-01-28 13:11:43'),
(383, 0, 0, 18, 'Netrakona', '2020-01-28 13:11:43'),
(384, 0, 0, 18, 'Nilphamari', '2020-01-28 13:11:43'),
(385, 0, 0, 18, 'Noakhali', '2020-01-28 13:11:43'),
(386, 0, 0, 18, 'Pabna', '2020-01-28 13:11:43'),
(387, 0, 0, 18, 'Panchagarh', '2020-01-28 13:11:43'),
(388, 0, 0, 18, 'Patuakhali', '2020-01-28 13:11:43'),
(389, 0, 0, 18, 'Pirojpur', '2020-01-28 13:11:43'),
(390, 0, 0, 18, 'Rajbari', '2020-01-28 13:11:43'),
(391, 0, 0, 18, 'Rajshahi', '2020-01-28 13:11:43'),
(392, 0, 0, 18, 'Rangamati', '2020-01-28 13:11:43'),
(393, 0, 0, 18, 'Rangpur', '2020-01-28 13:11:43'),
(394, 0, 0, 18, 'Satkhira', '2020-01-28 13:11:43'),
(395, 0, 0, 18, 'Shariatpur', '2020-01-28 13:11:43'),
(396, 0, 0, 18, 'Sherpur', '2020-01-28 13:11:43'),
(397, 0, 0, 18, 'Silhat', '2020-01-28 13:11:43'),
(398, 0, 0, 18, 'Sirajganj', '2020-01-28 13:11:43'),
(399, 0, 0, 18, 'Sunamganj', '2020-01-28 13:11:43'),
(400, 0, 0, 18, 'Tangayal', '2020-01-28 13:11:43'),
(401, 0, 0, 18, 'Thakurgaon', '2020-01-28 13:11:43'),
(402, 0, 0, 19, 'Christ Church', '2020-01-28 13:11:43'),
(403, 0, 0, 19, 'Saint Andrew', '2020-01-28 13:11:43'),
(404, 0, 0, 19, 'Saint George', '2020-01-28 13:11:43'),
(405, 0, 0, 19, 'Saint James', '2020-01-28 13:11:43'),
(406, 0, 0, 19, 'Saint John', '2020-01-28 13:11:43'),
(407, 0, 0, 19, 'Saint Joseph', '2020-01-28 13:11:43'),
(408, 0, 0, 19, 'Saint Lucy', '2020-01-28 13:11:43'),
(409, 0, 0, 19, 'Saint Michael', '2020-01-28 13:11:43'),
(410, 0, 0, 19, 'Saint Peter', '2020-01-28 13:11:43'),
(411, 0, 0, 19, 'Saint Philip', '2020-01-28 13:11:43'),
(412, 0, 0, 19, 'Saint Thomas', '2020-01-28 13:11:43'),
(413, 0, 0, 20, 'Brest', '2020-01-28 13:11:43'),
(414, 0, 0, 20, 'Homjel\'', '2020-01-28 13:11:43'),
(415, 0, 0, 20, 'Hrodna', '2020-01-28 13:11:43'),
(416, 0, 0, 20, 'Mahiljow', '2020-01-28 13:11:43'),
(417, 0, 0, 20, 'Mahilyowskaya Voblasts', '2020-01-28 13:11:43'),
(418, 0, 0, 20, 'Minsk', '2020-01-28 13:11:43'),
(419, 0, 0, 20, 'Minskaja Voblasts\'', '2020-01-28 13:11:43'),
(420, 0, 0, 20, 'Petrik', '2020-01-28 13:11:43'),
(421, 0, 0, 20, 'Vicebsk', '2020-01-28 13:11:43'),
(422, 0, 0, 21, 'Antwerpen', '2020-01-28 13:11:43'),
(423, 0, 0, 21, 'Berchem', '2020-01-28 13:11:43'),
(424, 0, 0, 21, 'Brabant', '2020-01-28 13:11:43'),
(425, 0, 0, 21, 'Brabant Wallon', '2020-01-28 13:11:43'),
(426, 0, 0, 21, 'Brussel', '2020-01-28 13:11:43'),
(427, 0, 0, 21, 'East Flanders', '2020-01-28 13:11:43'),
(428, 0, 0, 21, 'Hainaut', '2020-01-28 13:11:43'),
(429, 0, 0, 21, 'Liege', '2020-01-28 13:11:43'),
(430, 0, 0, 21, 'Limburg', '2020-01-28 13:11:43'),
(431, 0, 0, 21, 'Luxembourg', '2020-01-28 13:11:43'),
(432, 0, 0, 21, 'Namur', '2020-01-28 13:11:43'),
(433, 0, 0, 21, 'Ontario', '2020-01-28 13:11:43'),
(434, 0, 0, 21, 'Oost-Vlaanderen', '2020-01-28 13:11:43'),
(435, 0, 0, 21, 'Provincie Brabant', '2020-01-28 13:11:43'),
(436, 0, 0, 21, 'Vlaams-Brabant', '2020-01-28 13:11:43'),
(437, 0, 0, 21, 'Wallonne', '2020-01-28 13:11:43'),
(438, 0, 0, 21, 'West-Vlaanderen', '2020-01-28 13:11:43'),
(439, 0, 0, 22, 'Belize', '2020-01-28 13:11:43'),
(440, 0, 0, 22, 'Cayo', '2020-01-28 13:11:43'),
(441, 0, 0, 22, 'Corozal', '2020-01-28 13:11:43'),
(442, 0, 0, 22, 'Orange Walk', '2020-01-28 13:11:43'),
(443, 0, 0, 22, 'Stann Creek', '2020-01-28 13:11:43'),
(444, 0, 0, 22, 'Toledo', '2020-01-28 13:11:43'),
(445, 0, 0, 23, 'Alibori', '2020-01-28 13:11:43'),
(446, 0, 0, 23, 'Atacora', '2020-01-28 13:11:43'),
(447, 0, 0, 23, 'Atlantique', '2020-01-28 13:11:43'),
(448, 0, 0, 23, 'Borgou', '2020-01-28 13:11:43'),
(449, 0, 0, 23, 'Collines', '2020-01-28 13:11:43'),
(450, 0, 0, 23, 'Couffo', '2020-01-28 13:11:43'),
(451, 0, 0, 23, 'Donga', '2020-01-28 13:11:43'),
(452, 0, 0, 23, 'Littoral', '2020-01-28 13:11:43'),
(453, 0, 0, 23, 'Mono', '2020-01-28 13:11:43'),
(454, 0, 0, 23, 'Oueme', '2020-01-28 13:11:43'),
(455, 0, 0, 23, 'Plateau', '2020-01-28 13:11:43'),
(456, 0, 0, 23, 'Zou', '2020-01-28 13:11:43'),
(457, 0, 0, 24, 'Hamilton', '2020-01-28 13:11:43'),
(458, 0, 0, 24, 'Saint George', '2020-01-28 13:11:43'),
(459, 0, 0, 25, 'Bumthang', '2020-01-28 13:11:43'),
(460, 0, 0, 25, 'Chhukha', '2020-01-28 13:11:43'),
(461, 0, 0, 25, 'Chirang', '2020-01-28 13:11:43'),
(462, 0, 0, 25, 'Daga', '2020-01-28 13:11:43'),
(463, 0, 0, 25, 'Geylegphug', '2020-01-28 13:11:43'),
(464, 0, 0, 25, 'Ha', '2020-01-28 13:11:43'),
(465, 0, 0, 25, 'Lhuntshi', '2020-01-28 13:11:43'),
(466, 0, 0, 25, 'Mongar', '2020-01-28 13:11:43'),
(467, 0, 0, 25, 'Pemagatsel', '2020-01-28 13:11:43'),
(468, 0, 0, 25, 'Punakha', '2020-01-28 13:11:43'),
(469, 0, 0, 25, 'Rinpung', '2020-01-28 13:11:43'),
(470, 0, 0, 25, 'Samchi', '2020-01-28 13:11:43'),
(471, 0, 0, 25, 'Samdrup Jongkhar', '2020-01-28 13:11:43'),
(472, 0, 0, 25, 'Shemgang', '2020-01-28 13:11:43'),
(473, 0, 0, 25, 'Tashigang', '2020-01-28 13:11:43'),
(474, 0, 0, 25, 'Timphu', '2020-01-28 13:11:43'),
(475, 0, 0, 25, 'Tongsa', '2020-01-28 13:11:43'),
(476, 0, 0, 25, 'Wangdiphodrang', '2020-01-28 13:11:43'),
(477, 0, 0, 26, 'Beni', '2020-01-28 13:11:43'),
(478, 0, 0, 26, 'Chuquisaca', '2020-01-28 13:11:43'),
(479, 0, 0, 26, 'Cochabamba', '2020-01-28 13:11:43'),
(480, 0, 0, 26, 'La Paz', '2020-01-28 13:11:43'),
(481, 0, 0, 26, 'Oruro', '2020-01-28 13:11:43'),
(482, 0, 0, 26, 'Pando', '2020-01-28 13:11:43'),
(483, 0, 0, 26, 'Potosi', '2020-01-28 13:11:43'),
(484, 0, 0, 26, 'Santa Cruz', '2020-01-28 13:11:43'),
(485, 0, 0, 26, 'Tarija', '2020-01-28 13:11:43'),
(486, 0, 0, 27, 'Federacija Bosna i Hercegovina', '2020-01-28 13:11:43'),
(487, 0, 0, 27, 'Republika Srpska', '2020-01-28 13:11:43'),
(488, 0, 0, 28, 'Central Bobonong', '2020-01-28 13:11:43'),
(489, 0, 0, 28, 'Central Boteti', '2020-01-28 13:11:43'),
(490, 0, 0, 28, 'Central Mahalapye', '2020-01-28 13:11:43'),
(491, 0, 0, 28, 'Central Serowe-Palapye', '2020-01-28 13:11:43'),
(492, 0, 0, 28, 'Central Tutume', '2020-01-28 13:11:43'),
(493, 0, 0, 28, 'Chobe', '2020-01-28 13:11:43'),
(494, 0, 0, 28, 'Francistown', '2020-01-28 13:11:43'),
(495, 0, 0, 28, 'Gaborone', '2020-01-28 13:11:43'),
(496, 0, 0, 28, 'Ghanzi', '2020-01-28 13:11:43'),
(497, 0, 0, 28, 'Jwaneng', '2020-01-28 13:11:43'),
(498, 0, 0, 28, 'Kgalagadi North', '2020-01-28 13:11:43'),
(499, 0, 0, 28, 'Kgalagadi South', '2020-01-28 13:11:43'),
(500, 0, 0, 28, 'Kgatleng', '2020-01-28 13:11:43'),
(501, 0, 0, 28, 'Kweneng', '2020-01-28 13:11:43'),
(502, 0, 0, 28, 'Lobatse', '2020-01-28 13:11:43'),
(503, 0, 0, 28, 'Ngamiland', '2020-01-28 13:11:43'),
(504, 0, 0, 28, 'Ngwaketse', '2020-01-28 13:11:43'),
(505, 0, 0, 28, 'North East', '2020-01-28 13:11:43'),
(506, 0, 0, 28, 'Okavango', '2020-01-28 13:11:43'),
(507, 0, 0, 28, 'Orapa', '2020-01-28 13:11:43'),
(508, 0, 0, 28, 'Selibe Phikwe', '2020-01-28 13:11:43'),
(509, 0, 0, 28, 'South East', '2020-01-28 13:11:43'),
(510, 0, 0, 28, 'Sowa', '2020-01-28 13:11:43'),
(511, 0, 0, 29, 'Bouvet Island', '2020-01-28 13:11:43'),
(512, 0, 0, 30, 'Acre', '2020-01-28 13:11:43'),
(513, 0, 0, 30, 'Alagoas', '2020-01-28 13:11:43'),
(514, 0, 0, 30, 'Amapa', '2020-01-28 13:11:43'),
(515, 0, 0, 30, 'Amazonas', '2020-01-28 13:11:43'),
(516, 0, 0, 30, 'Bahia', '2020-01-28 13:11:43'),
(517, 0, 0, 30, 'Ceara', '2020-01-28 13:11:43'),
(518, 0, 0, 30, 'Distrito Federal', '2020-01-28 13:11:43'),
(519, 0, 0, 30, 'Espirito Santo', '2020-01-28 13:11:43'),
(520, 0, 0, 30, 'Estado de Sao Paulo', '2020-01-28 13:11:43'),
(521, 0, 0, 30, 'Goias', '2020-01-28 13:11:43'),
(522, 0, 0, 30, 'Maranhao', '2020-01-28 13:11:43'),
(523, 0, 0, 30, 'Mato Grosso', '2020-01-28 13:11:43'),
(524, 0, 0, 30, 'Mato Grosso do Sul', '2020-01-28 13:11:43'),
(525, 0, 0, 30, 'Minas Gerais', '2020-01-28 13:11:43'),
(526, 0, 0, 30, 'Para', '2020-01-28 13:11:43'),
(527, 0, 0, 30, 'Paraiba', '2020-01-28 13:11:43'),
(528, 0, 0, 30, 'Parana', '2020-01-28 13:11:43'),
(529, 0, 0, 30, 'Pernambuco', '2020-01-28 13:11:43'),
(530, 0, 0, 30, 'Piaui', '2020-01-28 13:11:43'),
(531, 0, 0, 30, 'Rio Grande do Norte', '2020-01-28 13:11:43'),
(532, 0, 0, 30, 'Rio Grande do Sul', '2020-01-28 13:11:43'),
(533, 0, 0, 30, 'Rio de Janeiro', '2020-01-28 13:11:43'),
(534, 0, 0, 30, 'Rondonia', '2020-01-28 13:11:43'),
(535, 0, 0, 30, 'Roraima', '2020-01-28 13:11:43'),
(536, 0, 0, 30, 'Santa Catarina', '2020-01-28 13:11:43'),
(537, 0, 0, 30, 'Sao Paulo', '2020-01-28 13:11:43'),
(538, 0, 0, 30, 'Sergipe', '2020-01-28 13:11:43'),
(539, 0, 0, 30, 'Tocantins', '2020-01-28 13:11:43'),
(540, 0, 0, 31, 'British Indian Ocean Territory', '2020-01-28 13:11:43'),
(541, 0, 0, 32, 'Belait', '2020-01-28 13:11:43'),
(542, 0, 0, 32, 'Brunei-Muara', '2020-01-28 13:11:43'),
(543, 0, 0, 32, 'Temburong', '2020-01-28 13:11:43'),
(544, 0, 0, 32, 'Tutong', '2020-01-28 13:11:43'),
(545, 0, 0, 33, 'Blagoevgrad', '2020-01-28 13:11:43'),
(546, 0, 0, 33, 'Burgas', '2020-01-28 13:11:43'),
(547, 0, 0, 33, 'Dobrich', '2020-01-28 13:11:43'),
(548, 0, 0, 33, 'Gabrovo', '2020-01-28 13:11:43'),
(549, 0, 0, 33, 'Haskovo', '2020-01-28 13:11:43'),
(550, 0, 0, 33, 'Jambol', '2020-01-28 13:11:43'),
(551, 0, 0, 33, 'Kardzhali', '2020-01-28 13:11:43'),
(552, 0, 0, 33, 'Kjustendil', '2020-01-28 13:11:43'),
(553, 0, 0, 33, 'Lovech', '2020-01-28 13:11:43'),
(554, 0, 0, 33, 'Montana', '2020-01-28 13:11:43'),
(555, 0, 0, 33, 'Oblast Sofiya-Grad', '2020-01-28 13:11:43'),
(556, 0, 0, 33, 'Pazardzhik', '2020-01-28 13:11:43'),
(557, 0, 0, 33, 'Pernik', '2020-01-28 13:11:43'),
(558, 0, 0, 33, 'Pleven', '2020-01-28 13:11:43'),
(559, 0, 0, 33, 'Plovdiv', '2020-01-28 13:11:43'),
(560, 0, 0, 33, 'Razgrad', '2020-01-28 13:11:43'),
(561, 0, 0, 33, 'Ruse', '2020-01-28 13:11:43'),
(562, 0, 0, 33, 'Shumen', '2020-01-28 13:11:43'),
(563, 0, 0, 33, 'Silistra', '2020-01-28 13:11:43'),
(564, 0, 0, 33, 'Sliven', '2020-01-28 13:11:43'),
(565, 0, 0, 33, 'Smoljan', '2020-01-28 13:11:43'),
(566, 0, 0, 33, 'Sofija grad', '2020-01-28 13:11:43'),
(567, 0, 0, 33, 'Sofijska oblast', '2020-01-28 13:11:43'),
(568, 0, 0, 33, 'Stara Zagora', '2020-01-28 13:11:43'),
(569, 0, 0, 33, 'Targovishte', '2020-01-28 13:11:43'),
(570, 0, 0, 33, 'Varna', '2020-01-28 13:11:43'),
(571, 0, 0, 33, 'Veliko Tarnovo', '2020-01-28 13:11:43'),
(572, 0, 0, 33, 'Vidin', '2020-01-28 13:11:43'),
(573, 0, 0, 33, 'Vraca', '2020-01-28 13:11:43'),
(574, 0, 0, 33, 'Yablaniza', '2020-01-28 13:11:43'),
(575, 0, 0, 34, 'Bale', '2020-01-28 13:11:43'),
(576, 0, 0, 34, 'Bam', '2020-01-28 13:11:43'),
(577, 0, 0, 34, 'Bazega', '2020-01-28 13:11:43'),
(578, 0, 0, 34, 'Bougouriba', '2020-01-28 13:11:43'),
(579, 0, 0, 34, 'Boulgou', '2020-01-28 13:11:43'),
(580, 0, 0, 34, 'Boulkiemde', '2020-01-28 13:11:43'),
(581, 0, 0, 34, 'Comoe', '2020-01-28 13:11:43'),
(582, 0, 0, 34, 'Ganzourgou', '2020-01-28 13:11:43'),
(583, 0, 0, 34, 'Gnagna', '2020-01-28 13:11:43'),
(584, 0, 0, 34, 'Gourma', '2020-01-28 13:11:43'),
(585, 0, 0, 34, 'Houet', '2020-01-28 13:11:43'),
(586, 0, 0, 34, 'Ioba', '2020-01-28 13:11:43'),
(587, 0, 0, 34, 'Kadiogo', '2020-01-28 13:11:43'),
(588, 0, 0, 34, 'Kenedougou', '2020-01-28 13:11:43'),
(589, 0, 0, 34, 'Komandjari', '2020-01-28 13:11:43'),
(590, 0, 0, 34, 'Kompienga', '2020-01-28 13:11:43'),
(591, 0, 0, 34, 'Kossi', '2020-01-28 13:11:43'),
(592, 0, 0, 34, 'Kouritenga', '2020-01-28 13:11:43'),
(593, 0, 0, 34, 'Kourweogo', '2020-01-28 13:11:43'),
(594, 0, 0, 34, 'Leraba', '2020-01-28 13:11:43'),
(595, 0, 0, 34, 'Mouhoun', '2020-01-28 13:11:43'),
(596, 0, 0, 34, 'Nahouri', '2020-01-28 13:11:43'),
(597, 0, 0, 34, 'Namentenga', '2020-01-28 13:11:43'),
(598, 0, 0, 34, 'Noumbiel', '2020-01-28 13:11:43'),
(599, 0, 0, 34, 'Oubritenga', '2020-01-28 13:11:43'),
(600, 0, 0, 34, 'Oudalan', '2020-01-28 13:11:43'),
(601, 0, 0, 34, 'Passore', '2020-01-28 13:11:43'),
(602, 0, 0, 34, 'Poni', '2020-01-28 13:11:43'),
(603, 0, 0, 34, 'Sanguie', '2020-01-28 13:11:43'),
(604, 0, 0, 34, 'Sanmatenga', '2020-01-28 13:11:43'),
(605, 0, 0, 34, 'Seno', '2020-01-28 13:11:43'),
(606, 0, 0, 34, 'Sissili', '2020-01-28 13:11:43'),
(607, 0, 0, 34, 'Soum', '2020-01-28 13:11:43'),
(608, 0, 0, 34, 'Sourou', '2020-01-28 13:11:43'),
(609, 0, 0, 34, 'Tapoa', '2020-01-28 13:11:43'),
(610, 0, 0, 34, 'Tuy', '2020-01-28 13:11:43'),
(611, 0, 0, 34, 'Yatenga', '2020-01-28 13:11:43'),
(612, 0, 0, 34, 'Zondoma', '2020-01-28 13:11:43'),
(613, 0, 0, 34, 'Zoundweogo', '2020-01-28 13:11:43'),
(614, 0, 0, 35, 'Bubanza', '2020-01-28 13:11:43'),
(615, 0, 0, 35, 'Bujumbura', '2020-01-28 13:11:43'),
(616, 0, 0, 35, 'Bururi', '2020-01-28 13:11:43'),
(617, 0, 0, 35, 'Cankuzo', '2020-01-28 13:11:43'),
(618, 0, 0, 35, 'Cibitoke', '2020-01-28 13:11:43'),
(619, 0, 0, 35, 'Gitega', '2020-01-28 13:11:43'),
(620, 0, 0, 35, 'Karuzi', '2020-01-28 13:11:43'),
(621, 0, 0, 35, 'Kayanza', '2020-01-28 13:11:43'),
(622, 0, 0, 35, 'Kirundo', '2020-01-28 13:11:43'),
(623, 0, 0, 35, 'Makamba', '2020-01-28 13:11:43'),
(624, 0, 0, 35, 'Muramvya', '2020-01-28 13:11:43'),
(625, 0, 0, 35, 'Muyinga', '2020-01-28 13:11:43'),
(626, 0, 0, 35, 'Ngozi', '2020-01-28 13:11:43'),
(627, 0, 0, 35, 'Rutana', '2020-01-28 13:11:43'),
(628, 0, 0, 35, 'Ruyigi', '2020-01-28 13:11:43'),
(629, 0, 0, 36, 'Banteay Mean Chey', '2020-01-28 13:11:43'),
(630, 0, 0, 36, 'Bat Dambang', '2020-01-28 13:11:43'),
(631, 0, 0, 36, 'Kampong Cham', '2020-01-28 13:11:43'),
(632, 0, 0, 36, 'Kampong Chhnang', '2020-01-28 13:11:43'),
(633, 0, 0, 36, 'Kampong Spoeu', '2020-01-28 13:11:43'),
(634, 0, 0, 36, 'Kampong Thum', '2020-01-28 13:11:43'),
(635, 0, 0, 36, 'Kampot', '2020-01-28 13:11:43'),
(636, 0, 0, 36, 'Kandal', '2020-01-28 13:11:43'),
(637, 0, 0, 36, 'Kaoh Kong', '2020-01-28 13:11:43'),
(638, 0, 0, 36, 'Kracheh', '2020-01-28 13:11:43'),
(639, 0, 0, 36, 'Krong Kaeb', '2020-01-28 13:11:43'),
(640, 0, 0, 36, 'Krong Pailin', '2020-01-28 13:11:43'),
(641, 0, 0, 36, 'Krong Preah Sihanouk', '2020-01-28 13:11:43'),
(642, 0, 0, 36, 'Mondol Kiri', '2020-01-28 13:11:43'),
(643, 0, 0, 36, 'Otdar Mean Chey', '2020-01-28 13:11:43'),
(644, 0, 0, 36, 'Phnum Penh', '2020-01-28 13:11:43'),
(645, 0, 0, 36, 'Pousat', '2020-01-28 13:11:43'),
(646, 0, 0, 36, 'Preah Vihear', '2020-01-28 13:11:43'),
(647, 0, 0, 36, 'Prey Veaeng', '2020-01-28 13:11:43'),
(648, 0, 0, 36, 'Rotanak Kiri', '2020-01-28 13:11:43'),
(649, 0, 0, 36, 'Siem Reab', '2020-01-28 13:11:43'),
(650, 0, 0, 36, 'Stueng Traeng', '2020-01-28 13:11:43'),
(651, 0, 0, 36, 'Svay Rieng', '2020-01-28 13:11:43'),
(652, 0, 0, 36, 'Takaev', '2020-01-28 13:11:43'),
(653, 0, 0, 37, 'Adamaoua', '2020-01-28 13:11:43'),
(654, 0, 0, 37, 'Centre', '2020-01-28 13:11:43'),
(655, 0, 0, 37, 'Est', '2020-01-28 13:11:43'),
(656, 0, 0, 37, 'Littoral', '2020-01-28 13:11:43'),
(657, 0, 0, 37, 'Nord', '2020-01-28 13:11:43'),
(658, 0, 0, 37, 'Nord Extreme', '2020-01-28 13:11:43'),
(659, 0, 0, 37, 'Nordouest', '2020-01-28 13:11:43'),
(660, 0, 0, 37, 'Ouest', '2020-01-28 13:11:43'),
(661, 0, 0, 37, 'Sud', '2020-01-28 13:11:43'),
(662, 0, 0, 37, 'Sudouest', '2020-01-28 13:11:43'),
(663, 0, 0, 38, 'Alberta', '2020-01-28 13:11:43'),
(664, 0, 0, 38, 'British Columbia', '2020-01-28 13:11:43'),
(665, 0, 0, 38, 'Manitoba', '2020-01-28 13:11:43'),
(666, 0, 0, 38, 'New Brunswick', '2020-01-28 13:11:43'),
(667, 0, 0, 38, 'Newfoundland and Labrador', '2020-01-28 13:11:43'),
(668, 0, 0, 38, 'Northwest Territories', '2020-01-28 13:11:43'),
(669, 0, 0, 38, 'Nova Scotia', '2020-01-28 13:11:43'),
(670, 0, 0, 38, 'Nunavut', '2020-01-28 13:11:43'),
(671, 0, 0, 38, 'Ontario', '2020-01-28 13:11:43'),
(672, 0, 0, 38, 'Prince Edward Island', '2020-01-28 13:11:43'),
(673, 0, 0, 38, 'Quebec', '2020-01-28 13:11:43'),
(674, 0, 0, 38, 'Saskatchewan', '2020-01-28 13:11:43'),
(675, 0, 0, 38, 'Yukon', '2020-01-28 13:11:43'),
(676, 0, 0, 39, 'Boavista', '2020-01-28 13:11:43'),
(677, 0, 0, 39, 'Brava', '2020-01-28 13:11:43'),
(678, 0, 0, 39, 'Fogo', '2020-01-28 13:11:43'),
(679, 0, 0, 39, 'Maio', '2020-01-28 13:11:43'),
(680, 0, 0, 39, 'Sal', '2020-01-28 13:11:43'),
(681, 0, 0, 39, 'Santo Antao', '2020-01-28 13:11:43'),
(682, 0, 0, 39, 'Sao Nicolau', '2020-01-28 13:11:43'),
(683, 0, 0, 39, 'Sao Tiago', '2020-01-28 13:11:43'),
(684, 0, 0, 39, 'Sao Vicente', '2020-01-28 13:11:43'),
(685, 0, 0, 40, 'Grand Cayman', '2020-01-28 13:11:43'),
(686, 0, 0, 41, 'Bamingui-Bangoran', '2020-01-28 13:11:43'),
(687, 0, 0, 41, 'Bangui', '2020-01-28 13:11:43'),
(688, 0, 0, 41, 'Basse-Kotto', '2020-01-28 13:11:43'),
(689, 0, 0, 41, 'Haut-Mbomou', '2020-01-28 13:11:43'),
(690, 0, 0, 41, 'Haute-Kotto', '2020-01-28 13:11:43'),
(691, 0, 0, 41, 'Kemo', '2020-01-28 13:11:43'),
(692, 0, 0, 41, 'Lobaye', '2020-01-28 13:11:43'),
(693, 0, 0, 41, 'Mambere-Kadei', '2020-01-28 13:11:43'),
(694, 0, 0, 41, 'Mbomou', '2020-01-28 13:11:43'),
(695, 0, 0, 41, 'Nana-Gribizi', '2020-01-28 13:11:43'),
(696, 0, 0, 41, 'Nana-Mambere', '2020-01-28 13:11:43'),
(697, 0, 0, 41, 'Ombella Mpoko', '2020-01-28 13:11:43'),
(698, 0, 0, 41, 'Ouaka', '2020-01-28 13:11:43'),
(699, 0, 0, 41, 'Ouham', '2020-01-28 13:11:43'),
(700, 0, 0, 41, 'Ouham-Pende', '2020-01-28 13:11:43'),
(701, 0, 0, 41, 'Sangha-Mbaere', '2020-01-28 13:11:43'),
(702, 0, 0, 41, 'Vakaga', '2020-01-28 13:11:43'),
(703, 0, 0, 42, 'Batha', '2020-01-28 13:11:43'),
(704, 0, 0, 42, 'Biltine', '2020-01-28 13:11:43'),
(705, 0, 0, 42, 'Bourkou-Ennedi-Tibesti', '2020-01-28 13:11:43'),
(706, 0, 0, 42, 'Chari-Baguirmi', '2020-01-28 13:11:43'),
(707, 0, 0, 42, 'Guera', '2020-01-28 13:11:43'),
(708, 0, 0, 42, 'Kanem', '2020-01-28 13:11:43'),
(709, 0, 0, 42, 'Lac', '2020-01-28 13:11:43'),
(710, 0, 0, 42, 'Logone Occidental', '2020-01-28 13:11:43'),
(711, 0, 0, 42, 'Logone Oriental', '2020-01-28 13:11:43'),
(712, 0, 0, 42, 'Mayo-Kebbi', '2020-01-28 13:11:43'),
(713, 0, 0, 42, 'Moyen-Chari', '2020-01-28 13:11:43'),
(714, 0, 0, 42, 'Ouaddai', '2020-01-28 13:11:43'),
(715, 0, 0, 42, 'Salamat', '2020-01-28 13:11:43'),
(716, 0, 0, 42, 'Tandjile', '2020-01-28 13:11:43'),
(717, 0, 0, 43, 'Aisen', '2020-01-28 13:11:43'),
(718, 0, 0, 43, 'Antofagasta', '2020-01-28 13:11:43'),
(719, 0, 0, 43, 'Araucania', '2020-01-28 13:11:43'),
(720, 0, 0, 43, 'Atacama', '2020-01-28 13:11:43'),
(721, 0, 0, 43, 'Bio Bio', '2020-01-28 13:11:43'),
(722, 0, 0, 43, 'Coquimbo', '2020-01-28 13:11:43'),
(723, 0, 0, 43, 'Libertador General Bernardo O\'', '2020-01-28 13:11:43'),
(724, 0, 0, 43, 'Los Lagos', '2020-01-28 13:11:43'),
(725, 0, 0, 43, 'Magellanes', '2020-01-28 13:11:43'),
(726, 0, 0, 43, 'Maule', '2020-01-28 13:11:43'),
(727, 0, 0, 43, 'Metropolitana', '2020-01-28 13:11:43'),
(728, 0, 0, 43, 'Metropolitana de Santiago', '2020-01-28 13:11:43'),
(729, 0, 0, 43, 'Tarapaca', '2020-01-28 13:11:43'),
(730, 0, 0, 43, 'Valparaiso', '2020-01-28 13:11:43'),
(731, 0, 0, 44, 'Anhui', '2020-01-28 13:11:43'),
(732, 0, 0, 44, 'Anhui Province', '2020-01-28 13:11:43'),
(733, 0, 0, 44, 'Anhui Sheng', '2020-01-28 13:11:43'),
(734, 0, 0, 44, 'Aomen', '2020-01-28 13:11:43'),
(735, 0, 0, 44, 'Beijing', '2020-01-28 13:11:43'),
(736, 0, 0, 44, 'Beijing Shi', '2020-01-28 13:11:43'),
(737, 0, 0, 44, 'Chongqing', '2020-01-28 13:11:43'),
(738, 0, 0, 44, 'Fujian', '2020-01-28 13:11:43'),
(739, 0, 0, 44, 'Fujian Sheng', '2020-01-28 13:11:43'),
(740, 0, 0, 44, 'Gansu', '2020-01-28 13:11:43'),
(741, 0, 0, 44, 'Guangdong', '2020-01-28 13:11:43'),
(742, 0, 0, 44, 'Guangdong Sheng', '2020-01-28 13:11:43'),
(743, 0, 0, 44, 'Guangxi', '2020-01-28 13:11:43'),
(744, 0, 0, 44, 'Guizhou', '2020-01-28 13:11:43'),
(745, 0, 0, 44, 'Hainan', '2020-01-28 13:11:43'),
(746, 0, 0, 44, 'Hebei', '2020-01-28 13:11:43'),
(747, 0, 0, 44, 'Heilongjiang', '2020-01-28 13:11:43'),
(748, 0, 0, 44, 'Henan', '2020-01-28 13:11:43'),
(749, 0, 0, 44, 'Hubei', '2020-01-28 13:11:43'),
(750, 0, 0, 44, 'Hunan', '2020-01-28 13:11:43'),
(751, 0, 0, 44, 'Jiangsu', '2020-01-28 13:11:43'),
(752, 0, 0, 44, 'Jiangsu Sheng', '2020-01-28 13:11:43'),
(753, 0, 0, 44, 'Jiangxi', '2020-01-28 13:11:43'),
(754, 0, 0, 44, 'Jilin', '2020-01-28 13:11:43'),
(755, 0, 0, 44, 'Liaoning', '2020-01-28 13:11:43'),
(756, 0, 0, 44, 'Liaoning Sheng', '2020-01-28 13:11:43'),
(757, 0, 0, 44, 'Nei Monggol', '2020-01-28 13:11:43'),
(758, 0, 0, 44, 'Ningxia Hui', '2020-01-28 13:11:43'),
(759, 0, 0, 44, 'Qinghai', '2020-01-28 13:11:43'),
(760, 0, 0, 44, 'Shaanxi', '2020-01-28 13:11:43'),
(761, 0, 0, 44, 'Shandong', '2020-01-28 13:11:43'),
(762, 0, 0, 44, 'Shandong Sheng', '2020-01-28 13:11:43'),
(763, 0, 0, 44, 'Shanghai', '2020-01-28 13:11:43'),
(764, 0, 0, 44, 'Shanxi', '2020-01-28 13:11:43'),
(765, 0, 0, 44, 'Sichuan', '2020-01-28 13:11:43'),
(766, 0, 0, 44, 'Tianjin', '2020-01-28 13:11:43'),
(767, 0, 0, 44, 'Xianggang', '2020-01-28 13:11:43'),
(768, 0, 0, 44, 'Xinjiang', '2020-01-28 13:11:43'),
(769, 0, 0, 44, 'Xizang', '2020-01-28 13:11:43'),
(770, 0, 0, 44, 'Yunnan', '2020-01-28 13:11:43'),
(771, 0, 0, 44, 'Zhejiang', '2020-01-28 13:11:43'),
(772, 0, 0, 44, 'Zhejiang Sheng', '2020-01-28 13:11:43'),
(773, 0, 0, 45, 'Christmas Island', '2020-01-28 13:11:43'),
(774, 0, 0, 46, 'Cocos (Keeling) Islands', '2020-01-28 13:11:43'),
(775, 0, 0, 47, 'Amazonas', '2020-01-28 13:11:43'),
(776, 0, 0, 47, 'Antioquia', '2020-01-28 13:11:43'),
(777, 0, 0, 47, 'Arauca', '2020-01-28 13:11:43'),
(778, 0, 0, 47, 'Atlantico', '2020-01-28 13:11:43'),
(779, 0, 0, 47, 'Bogota', '2020-01-28 13:11:43'),
(780, 0, 0, 47, 'Bolivar', '2020-01-28 13:11:43'),
(781, 0, 0, 47, 'Boyaca', '2020-01-28 13:11:43'),
(782, 0, 0, 47, 'Caldas', '2020-01-28 13:11:43'),
(783, 0, 0, 47, 'Caqueta', '2020-01-28 13:11:43'),
(784, 0, 0, 47, 'Casanare', '2020-01-28 13:11:43'),
(785, 0, 0, 47, 'Cauca', '2020-01-28 13:11:43'),
(786, 0, 0, 47, 'Cesar', '2020-01-28 13:11:43'),
(787, 0, 0, 47, 'Choco', '2020-01-28 13:11:43'),
(788, 0, 0, 47, 'Cordoba', '2020-01-28 13:11:43'),
(789, 0, 0, 47, 'Cundinamarca', '2020-01-28 13:11:43'),
(790, 0, 0, 47, 'Guainia', '2020-01-28 13:11:43'),
(791, 0, 0, 47, 'Guaviare', '2020-01-28 13:11:43'),
(792, 0, 0, 47, 'Huila', '2020-01-28 13:11:43'),
(793, 0, 0, 47, 'La Guajira', '2020-01-28 13:11:43'),
(794, 0, 0, 47, 'Magdalena', '2020-01-28 13:11:43'),
(795, 0, 0, 47, 'Meta', '2020-01-28 13:11:43'),
(796, 0, 0, 47, 'Narino', '2020-01-28 13:11:43'),
(797, 0, 0, 47, 'Norte de Santander', '2020-01-28 13:11:43'),
(798, 0, 0, 47, 'Putumayo', '2020-01-28 13:11:43'),
(799, 0, 0, 47, 'Quindio', '2020-01-28 13:11:43'),
(800, 0, 0, 47, 'Risaralda', '2020-01-28 13:11:43'),
(801, 0, 0, 47, 'San Andres y Providencia', '2020-01-28 13:11:43'),
(802, 0, 0, 47, 'Santander', '2020-01-28 13:11:43'),
(803, 0, 0, 47, 'Sucre', '2020-01-28 13:11:43'),
(804, 0, 0, 47, 'Tolima', '2020-01-28 13:11:43'),
(805, 0, 0, 47, 'Valle del Cauca', '2020-01-28 13:11:43'),
(806, 0, 0, 47, 'Vaupes', '2020-01-28 13:11:43'),
(807, 0, 0, 47, 'Vichada', '2020-01-28 13:11:43'),
(808, 0, 0, 48, 'Mwali', '2020-01-28 13:11:43'),
(809, 0, 0, 48, 'Njazidja', '2020-01-28 13:11:43'),
(810, 0, 0, 48, 'Nzwani', '2020-01-28 13:11:43'),
(811, 0, 0, 49, 'Bouenza', '2020-01-28 13:11:43'),
(812, 0, 0, 49, 'Brazzaville', '2020-01-28 13:11:43'),
(813, 0, 0, 49, 'Cuvette', '2020-01-28 13:11:43'),
(814, 0, 0, 49, 'Kouilou', '2020-01-28 13:11:43'),
(815, 0, 0, 49, 'Lekoumou', '2020-01-28 13:11:43'),
(816, 0, 0, 49, 'Likouala', '2020-01-28 13:11:43'),
(817, 0, 0, 49, 'Niari', '2020-01-28 13:11:43'),
(818, 0, 0, 49, 'Plateaux', '2020-01-28 13:11:43'),
(819, 0, 0, 49, 'Pool', '2020-01-28 13:11:43'),
(820, 0, 0, 49, 'Sangha', '2020-01-28 13:11:43'),
(821, 0, 0, 50, 'Bandundu', '2020-01-28 13:11:43'),
(822, 0, 0, 50, 'Bas-Congo', '2020-01-28 13:11:43'),
(823, 0, 0, 50, 'Equateur', '2020-01-28 13:11:43'),
(824, 0, 0, 50, 'Haut-Congo', '2020-01-28 13:11:43'),
(825, 0, 0, 50, 'Kasai-Occidental', '2020-01-28 13:11:43'),
(826, 0, 0, 50, 'Kasai-Oriental', '2020-01-28 13:11:43'),
(827, 0, 0, 50, 'Katanga', '2020-01-28 13:11:43'),
(828, 0, 0, 50, 'Kinshasa', '2020-01-28 13:11:43'),
(829, 0, 0, 50, 'Maniema', '2020-01-28 13:11:43'),
(830, 0, 0, 50, 'Nord-Kivu', '2020-01-28 13:11:43'),
(831, 0, 0, 50, 'Sud-Kivu', '2020-01-28 13:11:43'),
(832, 0, 0, 51, 'Aitutaki', '2020-01-28 13:11:43'),
(833, 0, 0, 51, 'Atiu', '2020-01-28 13:11:43'),
(834, 0, 0, 51, 'Mangaia', '2020-01-28 13:11:43'),
(835, 0, 0, 51, 'Manihiki', '2020-01-28 13:11:43'),
(836, 0, 0, 51, 'Mauke', '2020-01-28 13:11:43'),
(837, 0, 0, 51, 'Mitiaro', '2020-01-28 13:11:43'),
(838, 0, 0, 51, 'Nassau', '2020-01-28 13:11:43'),
(839, 0, 0, 51, 'Pukapuka', '2020-01-28 13:11:43'),
(840, 0, 0, 51, 'Rakahanga', '2020-01-28 13:11:43'),
(841, 0, 0, 51, 'Rarotonga', '2020-01-28 13:11:43'),
(842, 0, 0, 51, 'Tongareva', '2020-01-28 13:11:43'),
(843, 0, 0, 52, 'Alajuela', '2020-01-28 13:11:43'),
(844, 0, 0, 52, 'Cartago', '2020-01-28 13:11:43'),
(845, 0, 0, 52, 'Guanacaste', '2020-01-28 13:11:43'),
(846, 0, 0, 52, 'Heredia', '2020-01-28 13:11:43'),
(847, 0, 0, 52, 'Limon', '2020-01-28 13:11:43'),
(848, 0, 0, 52, 'Puntarenas', '2020-01-28 13:11:43'),
(849, 0, 0, 52, 'San Jose', '2020-01-28 13:11:43'),
(850, 0, 0, 53, 'Abidjan', '2020-01-28 13:11:43'),
(851, 0, 0, 53, 'Agneby', '2020-01-28 13:11:43'),
(852, 0, 0, 53, 'Bafing', '2020-01-28 13:11:43'),
(853, 0, 0, 53, 'Denguele', '2020-01-28 13:11:43'),
(854, 0, 0, 53, 'Dix-huit Montagnes', '2020-01-28 13:11:43'),
(855, 0, 0, 53, 'Fromager', '2020-01-28 13:11:43'),
(856, 0, 0, 53, 'Haut-Sassandra', '2020-01-28 13:11:43'),
(857, 0, 0, 53, 'Lacs', '2020-01-28 13:11:43'),
(858, 0, 0, 53, 'Lagunes', '2020-01-28 13:11:43'),
(859, 0, 0, 53, 'Marahoue', '2020-01-28 13:11:43'),
(860, 0, 0, 53, 'Moyen-Cavally', '2020-01-28 13:11:43'),
(861, 0, 0, 53, 'Moyen-Comoe', '2020-01-28 13:11:43'),
(862, 0, 0, 53, 'N\'zi-Comoe', '2020-01-28 13:11:43'),
(863, 0, 0, 53, 'Sassandra', '2020-01-28 13:11:43'),
(864, 0, 0, 53, 'Savanes', '2020-01-28 13:11:43'),
(865, 0, 0, 53, 'Sud-Bandama', '2020-01-28 13:11:43'),
(866, 0, 0, 53, 'Sud-Comoe', '2020-01-28 13:11:43'),
(867, 0, 0, 53, 'Vallee du Bandama', '2020-01-28 13:11:43'),
(868, 0, 0, 53, 'Worodougou', '2020-01-28 13:11:43'),
(869, 0, 0, 53, 'Zanzan', '2020-01-28 13:11:43'),
(870, 0, 0, 54, 'Bjelovar-Bilogora', '2020-01-28 13:11:43'),
(871, 0, 0, 54, 'Dubrovnik-Neretva', '2020-01-28 13:11:43'),
(872, 0, 0, 54, 'Grad Zagreb', '2020-01-28 13:11:43'),
(873, 0, 0, 54, 'Istra', '2020-01-28 13:11:43'),
(874, 0, 0, 54, 'Karlovac', '2020-01-28 13:11:43'),
(875, 0, 0, 54, 'Koprivnica-Krizhevci', '2020-01-28 13:11:43'),
(876, 0, 0, 54, 'Krapina-Zagorje', '2020-01-28 13:11:43'),
(877, 0, 0, 54, 'Lika-Senj', '2020-01-28 13:11:43'),
(878, 0, 0, 54, 'Medhimurje', '2020-01-28 13:11:43'),
(879, 0, 0, 54, 'Medimurska Zupanija', '2020-01-28 13:11:43'),
(880, 0, 0, 54, 'Osijek-Baranja', '2020-01-28 13:11:43'),
(881, 0, 0, 54, 'Osjecko-Baranjska Zupanija', '2020-01-28 13:11:43'),
(882, 0, 0, 54, 'Pozhega-Slavonija', '2020-01-28 13:11:43'),
(883, 0, 0, 54, 'Primorje-Gorski Kotar', '2020-01-28 13:11:43'),
(884, 0, 0, 54, 'Shibenik-Knin', '2020-01-28 13:11:43'),
(885, 0, 0, 54, 'Sisak-Moslavina', '2020-01-28 13:11:43'),
(886, 0, 0, 54, 'Slavonski Brod-Posavina', '2020-01-28 13:11:43'),
(887, 0, 0, 54, 'Split-Dalmacija', '2020-01-28 13:11:43'),
(888, 0, 0, 54, 'Varazhdin', '2020-01-28 13:11:43'),
(889, 0, 0, 54, 'Virovitica-Podravina', '2020-01-28 13:11:43'),
(890, 0, 0, 54, 'Vukovar-Srijem', '2020-01-28 13:11:43'),
(891, 0, 0, 54, 'Zadar', '2020-01-28 13:11:43'),
(892, 0, 0, 54, 'Zagreb', '2020-01-28 13:11:43'),
(893, 0, 0, 55, 'Camaguey', '2020-01-28 13:11:43'),
(894, 0, 0, 55, 'Ciego de Avila', '2020-01-28 13:11:43'),
(895, 0, 0, 55, 'Cienfuegos', '2020-01-28 13:11:43'),
(896, 0, 0, 55, 'Ciudad de la Habana', '2020-01-28 13:11:43'),
(897, 0, 0, 55, 'Granma', '2020-01-28 13:11:43'),
(898, 0, 0, 55, 'Guantanamo', '2020-01-28 13:11:43'),
(899, 0, 0, 55, 'Habana', '2020-01-28 13:11:43'),
(900, 0, 0, 55, 'Holguin', '2020-01-28 13:11:43'),
(901, 0, 0, 55, 'Isla de la Juventud', '2020-01-28 13:11:43'),
(902, 0, 0, 55, 'La Habana', '2020-01-28 13:11:43'),
(903, 0, 0, 55, 'Las Tunas', '2020-01-28 13:11:43'),
(904, 0, 0, 55, 'Matanzas', '2020-01-28 13:11:43'),
(905, 0, 0, 55, 'Pinar del Rio', '2020-01-28 13:11:43'),
(906, 0, 0, 55, 'Sancti Spiritus', '2020-01-28 13:11:43'),
(907, 0, 0, 55, 'Santiago de Cuba', '2020-01-28 13:11:43'),
(908, 0, 0, 55, 'Villa Clara', '2020-01-28 13:11:43'),
(909, 0, 0, 56, 'Government controlled area', '2020-01-28 13:11:43'),
(910, 0, 0, 56, 'Limassol', '2020-01-28 13:11:43'),
(911, 0, 0, 56, 'Nicosia District', '2020-01-28 13:11:43'),
(912, 0, 0, 56, 'Paphos', '2020-01-28 13:11:43'),
(913, 0, 0, 56, 'Turkish controlled area', '2020-01-28 13:11:43'),
(914, 0, 0, 57, 'Central Bohemian', '2020-01-28 13:11:43'),
(915, 0, 0, 57, 'Frycovice', '2020-01-28 13:11:43'),
(916, 0, 0, 57, 'Jihocesky Kraj', '2020-01-28 13:11:43'),
(917, 0, 0, 57, 'Jihochesky', '2020-01-28 13:11:43'),
(918, 0, 0, 57, 'Jihomoravsky', '2020-01-28 13:11:43'),
(919, 0, 0, 57, 'Karlovarsky', '2020-01-28 13:11:43'),
(920, 0, 0, 57, 'Klecany', '2020-01-28 13:11:43'),
(921, 0, 0, 57, 'Kralovehradecky', '2020-01-28 13:11:43'),
(922, 0, 0, 57, 'Liberecky', '2020-01-28 13:11:43'),
(923, 0, 0, 57, 'Lipov', '2020-01-28 13:11:43'),
(924, 0, 0, 57, 'Moravskoslezsky', '2020-01-28 13:11:43'),
(925, 0, 0, 57, 'Olomoucky', '2020-01-28 13:11:43'),
(926, 0, 0, 57, 'Olomoucky Kraj', '2020-01-28 13:11:43'),
(927, 0, 0, 57, 'Pardubicky', '2020-01-28 13:11:43'),
(928, 0, 0, 57, 'Plzensky', '2020-01-28 13:11:43'),
(929, 0, 0, 57, 'Praha', '2020-01-28 13:11:43'),
(930, 0, 0, 57, 'Rajhrad', '2020-01-28 13:11:43'),
(931, 0, 0, 57, 'Smirice', '2020-01-28 13:11:43'),
(932, 0, 0, 57, 'South Moravian', '2020-01-28 13:11:43'),
(933, 0, 0, 57, 'Straz nad Nisou', '2020-01-28 13:11:43'),
(934, 0, 0, 57, 'Stredochesky', '2020-01-28 13:11:43'),
(935, 0, 0, 57, 'Unicov', '2020-01-28 13:11:43'),
(936, 0, 0, 57, 'Ustecky', '2020-01-28 13:11:43'),
(937, 0, 0, 57, 'Valletta', '2020-01-28 13:11:43'),
(938, 0, 0, 57, 'Velesin', '2020-01-28 13:11:43'),
(939, 0, 0, 57, 'Vysochina', '2020-01-28 13:11:43'),
(940, 0, 0, 57, 'Zlinsky', '2020-01-28 13:11:43'),
(941, 0, 0, 58, 'Arhus', '2020-01-28 13:11:43'),
(942, 0, 0, 58, 'Bornholm', '2020-01-28 13:11:43'),
(943, 0, 0, 58, 'Frederiksborg', '2020-01-28 13:11:43'),
(944, 0, 0, 58, 'Fyn', '2020-01-28 13:11:43'),
(945, 0, 0, 58, 'Hovedstaden', '2020-01-28 13:11:43'),
(946, 0, 0, 58, 'Kobenhavn', '2020-01-28 13:11:43'),
(947, 0, 0, 58, 'Kobenhavns Amt', '2020-01-28 13:11:43'),
(948, 0, 0, 58, 'Kobenhavns Kommune', '2020-01-28 13:11:43'),
(949, 0, 0, 58, 'Nordjylland', '2020-01-28 13:11:43'),
(950, 0, 0, 58, 'Ribe', '2020-01-28 13:11:43'),
(951, 0, 0, 58, 'Ringkobing', '2020-01-28 13:11:43'),
(952, 0, 0, 58, 'Roervig', '2020-01-28 13:11:43'),
(953, 0, 0, 58, 'Roskilde', '2020-01-28 13:11:43'),
(954, 0, 0, 58, 'Roslev', '2020-01-28 13:11:43'),
(955, 0, 0, 58, 'Sjaelland', '2020-01-28 13:11:43'),
(956, 0, 0, 58, 'Soeborg', '2020-01-28 13:11:43'),
(957, 0, 0, 58, 'Sonderjylland', '2020-01-28 13:11:43'),
(958, 0, 0, 58, 'Storstrom', '2020-01-28 13:11:43'),
(959, 0, 0, 58, 'Syddanmark', '2020-01-28 13:11:43'),
(960, 0, 0, 58, 'Toelloese', '2020-01-28 13:11:43'),
(961, 0, 0, 58, 'Vejle', '2020-01-28 13:11:43'),
(962, 0, 0, 58, 'Vestsjalland', '2020-01-28 13:11:43'),
(963, 0, 0, 58, 'Viborg', '2020-01-28 13:11:43'),
(964, 0, 0, 59, '\'Ali Sabih', '2020-01-28 13:11:43'),
(965, 0, 0, 59, 'Dikhil', '2020-01-28 13:11:43'),
(966, 0, 0, 59, 'Jibuti', '2020-01-28 13:11:43'),
(967, 0, 0, 59, 'Tajurah', '2020-01-28 13:11:43'),
(968, 0, 0, 59, 'Ubuk', '2020-01-28 13:11:43'),
(969, 0, 0, 60, 'Saint Andrew', '2020-01-28 13:11:43'),
(970, 0, 0, 60, 'Saint David', '2020-01-28 13:11:43'),
(971, 0, 0, 60, 'Saint George', '2020-01-28 13:11:43'),
(972, 0, 0, 60, 'Saint John', '2020-01-28 13:11:43'),
(973, 0, 0, 60, 'Saint Joseph', '2020-01-28 13:11:43'),
(974, 0, 0, 60, 'Saint Luke', '2020-01-28 13:11:43'),
(975, 0, 0, 60, 'Saint Mark', '2020-01-28 13:11:43'),
(976, 0, 0, 60, 'Saint Patrick', '2020-01-28 13:11:43'),
(977, 0, 0, 60, 'Saint Paul', '2020-01-28 13:11:43'),
(978, 0, 0, 60, 'Saint Peter', '2020-01-28 13:11:43');
INSERT INTO `state` (`state_id`, `company_id`, `user_id`, `country_id`, `state_name`, `date`) VALUES
(979, 0, 0, 61, 'Azua', '2020-01-28 13:11:43'),
(980, 0, 0, 61, 'Bahoruco', '2020-01-28 13:11:43'),
(981, 0, 0, 61, 'Barahona', '2020-01-28 13:11:43'),
(982, 0, 0, 61, 'Dajabon', '2020-01-28 13:11:43'),
(983, 0, 0, 61, 'Distrito Nacional', '2020-01-28 13:11:43'),
(984, 0, 0, 61, 'Duarte', '2020-01-28 13:11:43'),
(985, 0, 0, 61, 'El Seybo', '2020-01-28 13:11:43'),
(986, 0, 0, 61, 'Elias Pina', '2020-01-28 13:11:43'),
(987, 0, 0, 61, 'Espaillat', '2020-01-28 13:11:43'),
(988, 0, 0, 61, 'Hato Mayor', '2020-01-28 13:11:43'),
(989, 0, 0, 61, 'Independencia', '2020-01-28 13:11:43'),
(990, 0, 0, 61, 'La Altagracia', '2020-01-28 13:11:43'),
(991, 0, 0, 61, 'La Romana', '2020-01-28 13:11:43'),
(992, 0, 0, 61, 'La Vega', '2020-01-28 13:11:43'),
(993, 0, 0, 61, 'Maria Trinidad Sanchez', '2020-01-28 13:11:43'),
(994, 0, 0, 61, 'Monsenor Nouel', '2020-01-28 13:11:43'),
(995, 0, 0, 61, 'Monte Cristi', '2020-01-28 13:11:43'),
(996, 0, 0, 61, 'Monte Plata', '2020-01-28 13:11:43'),
(997, 0, 0, 61, 'Pedernales', '2020-01-28 13:11:43'),
(998, 0, 0, 61, 'Peravia', '2020-01-28 13:11:43'),
(999, 0, 0, 61, 'Puerto Plata', '2020-01-28 13:11:43'),
(1000, 0, 0, 61, 'Salcedo', '2020-01-28 13:11:43'),
(1001, 0, 0, 61, 'Samana', '2020-01-28 13:11:43'),
(1002, 0, 0, 61, 'San Cristobal', '2020-01-28 13:11:43'),
(1003, 0, 0, 61, 'San Juan', '2020-01-28 13:11:43'),
(1004, 0, 0, 61, 'San Pedro de Macoris', '2020-01-28 13:11:43'),
(1005, 0, 0, 61, 'Sanchez Ramirez', '2020-01-28 13:11:43'),
(1006, 0, 0, 61, 'Santiago', '2020-01-28 13:11:43'),
(1007, 0, 0, 61, 'Santiago Rodriguez', '2020-01-28 13:11:43'),
(1008, 0, 0, 61, 'Valverde', '2020-01-28 13:11:43'),
(1009, 0, 0, 62, 'Aileu', '2020-01-28 13:11:43'),
(1010, 0, 0, 62, 'Ainaro', '2020-01-28 13:11:43'),
(1011, 0, 0, 62, 'Ambeno', '2020-01-28 13:11:43'),
(1012, 0, 0, 62, 'Baucau', '2020-01-28 13:11:43'),
(1013, 0, 0, 62, 'Bobonaro', '2020-01-28 13:11:43'),
(1014, 0, 0, 62, 'Cova Lima', '2020-01-28 13:11:43'),
(1015, 0, 0, 62, 'Dili', '2020-01-28 13:11:43'),
(1016, 0, 0, 62, 'Ermera', '2020-01-28 13:11:43'),
(1017, 0, 0, 62, 'Lautem', '2020-01-28 13:11:43'),
(1018, 0, 0, 62, 'Liquica', '2020-01-28 13:11:43'),
(1019, 0, 0, 62, 'Manatuto', '2020-01-28 13:11:43'),
(1020, 0, 0, 62, 'Manufahi', '2020-01-28 13:11:43'),
(1021, 0, 0, 62, 'Viqueque', '2020-01-28 13:11:43'),
(1022, 0, 0, 63, 'Azuay', '2020-01-28 13:11:43'),
(1023, 0, 0, 63, 'Bolivar', '2020-01-28 13:11:43'),
(1024, 0, 0, 63, 'Canar', '2020-01-28 13:11:43'),
(1025, 0, 0, 63, 'Carchi', '2020-01-28 13:11:43'),
(1026, 0, 0, 63, 'Chimborazo', '2020-01-28 13:11:43'),
(1027, 0, 0, 63, 'Cotopaxi', '2020-01-28 13:11:43'),
(1028, 0, 0, 63, 'El Oro', '2020-01-28 13:11:43'),
(1029, 0, 0, 63, 'Esmeraldas', '2020-01-28 13:11:43'),
(1030, 0, 0, 63, 'Galapagos', '2020-01-28 13:11:43'),
(1031, 0, 0, 63, 'Guayas', '2020-01-28 13:11:43'),
(1032, 0, 0, 63, 'Imbabura', '2020-01-28 13:11:43'),
(1033, 0, 0, 63, 'Loja', '2020-01-28 13:11:43'),
(1034, 0, 0, 63, 'Los Rios', '2020-01-28 13:11:43'),
(1035, 0, 0, 63, 'Manabi', '2020-01-28 13:11:43'),
(1036, 0, 0, 63, 'Morona Santiago', '2020-01-28 13:11:43'),
(1037, 0, 0, 63, 'Napo', '2020-01-28 13:11:43'),
(1038, 0, 0, 63, 'Orellana', '2020-01-28 13:11:43'),
(1039, 0, 0, 63, 'Pastaza', '2020-01-28 13:11:43'),
(1040, 0, 0, 63, 'Pichincha', '2020-01-28 13:11:43'),
(1041, 0, 0, 63, 'Sucumbios', '2020-01-28 13:11:43'),
(1042, 0, 0, 63, 'Tungurahua', '2020-01-28 13:11:43'),
(1043, 0, 0, 63, 'Zamora Chinchipe', '2020-01-28 13:11:43'),
(1044, 0, 0, 64, 'Aswan', '2020-01-28 13:11:43'),
(1045, 0, 0, 64, 'Asyut', '2020-01-28 13:11:43'),
(1046, 0, 0, 64, 'Bani Suwayf', '2020-01-28 13:11:43'),
(1047, 0, 0, 64, 'Bur Sa\'id', '2020-01-28 13:11:43'),
(1048, 0, 0, 64, 'Cairo', '2020-01-28 13:11:43'),
(1049, 0, 0, 64, 'Dumyat', '2020-01-28 13:11:43'),
(1050, 0, 0, 64, 'Kafr-ash-Shaykh', '2020-01-28 13:11:43'),
(1051, 0, 0, 64, 'Matruh', '2020-01-28 13:11:43'),
(1052, 0, 0, 64, 'Muhafazat ad Daqahliyah', '2020-01-28 13:11:43'),
(1053, 0, 0, 64, 'Muhafazat al Fayyum', '2020-01-28 13:11:43'),
(1054, 0, 0, 64, 'Muhafazat al Gharbiyah', '2020-01-28 13:11:43'),
(1055, 0, 0, 64, 'Muhafazat al Iskandariyah', '2020-01-28 13:11:43'),
(1056, 0, 0, 64, 'Muhafazat al Qahirah', '2020-01-28 13:11:43'),
(1057, 0, 0, 64, 'Qina', '2020-01-28 13:11:43'),
(1058, 0, 0, 64, 'Sawhaj', '2020-01-28 13:11:43'),
(1059, 0, 0, 64, 'Sina al-Janubiyah', '2020-01-28 13:11:43'),
(1060, 0, 0, 64, 'Sina ash-Shamaliyah', '2020-01-28 13:11:43'),
(1061, 0, 0, 64, 'ad-Daqahliyah', '2020-01-28 13:11:43'),
(1062, 0, 0, 64, 'al-Bahr-al-Ahmar', '2020-01-28 13:11:43'),
(1063, 0, 0, 64, 'al-Buhayrah', '2020-01-28 13:11:43'),
(1064, 0, 0, 64, 'al-Fayyum', '2020-01-28 13:11:43'),
(1065, 0, 0, 64, 'al-Gharbiyah', '2020-01-28 13:11:43'),
(1066, 0, 0, 64, 'al-Iskandariyah', '2020-01-28 13:11:43'),
(1067, 0, 0, 64, 'al-Ismailiyah', '2020-01-28 13:11:43'),
(1068, 0, 0, 64, 'al-Jizah', '2020-01-28 13:11:43'),
(1069, 0, 0, 64, 'al-Minufiyah', '2020-01-28 13:11:43'),
(1070, 0, 0, 64, 'al-Minya', '2020-01-28 13:11:43'),
(1071, 0, 0, 64, 'al-Qahira', '2020-01-28 13:11:43'),
(1072, 0, 0, 64, 'al-Qalyubiyah', '2020-01-28 13:11:43'),
(1073, 0, 0, 64, 'al-Uqsur', '2020-01-28 13:11:43'),
(1074, 0, 0, 64, 'al-Wadi al-Jadid', '2020-01-28 13:11:43'),
(1075, 0, 0, 64, 'as-Suways', '2020-01-28 13:11:43'),
(1076, 0, 0, 64, 'ash-Sharqiyah', '2020-01-28 13:11:43'),
(1077, 0, 0, 65, 'Ahuachapan', '2020-01-28 13:11:43'),
(1078, 0, 0, 65, 'Cabanas', '2020-01-28 13:11:43'),
(1079, 0, 0, 65, 'Chalatenango', '2020-01-28 13:11:43'),
(1080, 0, 0, 65, 'Cuscatlan', '2020-01-28 13:11:43'),
(1081, 0, 0, 65, 'La Libertad', '2020-01-28 13:11:43'),
(1082, 0, 0, 65, 'La Paz', '2020-01-28 13:11:43'),
(1083, 0, 0, 65, 'La Union', '2020-01-28 13:11:43'),
(1084, 0, 0, 65, 'Morazan', '2020-01-28 13:11:43'),
(1085, 0, 0, 65, 'San Miguel', '2020-01-28 13:11:43'),
(1086, 0, 0, 65, 'San Salvador', '2020-01-28 13:11:43'),
(1087, 0, 0, 65, 'San Vicente', '2020-01-28 13:11:43'),
(1088, 0, 0, 65, 'Santa Ana', '2020-01-28 13:11:43'),
(1089, 0, 0, 65, 'Sonsonate', '2020-01-28 13:11:43'),
(1090, 0, 0, 65, 'Usulutan', '2020-01-28 13:11:43'),
(1091, 0, 0, 66, 'Annobon', '2020-01-28 13:11:43'),
(1092, 0, 0, 66, 'Bioko Norte', '2020-01-28 13:11:43'),
(1093, 0, 0, 66, 'Bioko Sur', '2020-01-28 13:11:43'),
(1094, 0, 0, 66, 'Centro Sur', '2020-01-28 13:11:43'),
(1095, 0, 0, 66, 'Kie-Ntem', '2020-01-28 13:11:43'),
(1096, 0, 0, 66, 'Litoral', '2020-01-28 13:11:43'),
(1097, 0, 0, 66, 'Wele-Nzas', '2020-01-28 13:11:43'),
(1098, 0, 0, 67, 'Anseba', '2020-01-28 13:11:43'),
(1099, 0, 0, 67, 'Debub', '2020-01-28 13:11:43'),
(1100, 0, 0, 67, 'Debub-Keih-Bahri', '2020-01-28 13:11:43'),
(1101, 0, 0, 67, 'Gash-Barka', '2020-01-28 13:11:43'),
(1102, 0, 0, 67, 'Maekel', '2020-01-28 13:11:43'),
(1103, 0, 0, 67, 'Semien-Keih-Bahri', '2020-01-28 13:11:43'),
(1104, 0, 0, 68, 'Harju', '2020-01-28 13:11:43'),
(1105, 0, 0, 68, 'Hiiu', '2020-01-28 13:11:43'),
(1106, 0, 0, 68, 'Ida-Viru', '2020-01-28 13:11:43'),
(1107, 0, 0, 68, 'Jarva', '2020-01-28 13:11:43'),
(1108, 0, 0, 68, 'Jogeva', '2020-01-28 13:11:43'),
(1109, 0, 0, 68, 'Laane', '2020-01-28 13:11:43'),
(1110, 0, 0, 68, 'Laane-Viru', '2020-01-28 13:11:43'),
(1111, 0, 0, 68, 'Parnu', '2020-01-28 13:11:43'),
(1112, 0, 0, 68, 'Polva', '2020-01-28 13:11:43'),
(1113, 0, 0, 68, 'Rapla', '2020-01-28 13:11:43'),
(1114, 0, 0, 68, 'Saare', '2020-01-28 13:11:43'),
(1115, 0, 0, 68, 'Tartu', '2020-01-28 13:11:43'),
(1116, 0, 0, 68, 'Valga', '2020-01-28 13:11:43'),
(1117, 0, 0, 68, 'Viljandi', '2020-01-28 13:11:43'),
(1118, 0, 0, 68, 'Voru', '2020-01-28 13:11:43'),
(1119, 0, 0, 69, 'Addis Abeba', '2020-01-28 13:11:43'),
(1120, 0, 0, 69, 'Afar', '2020-01-28 13:11:43'),
(1121, 0, 0, 69, 'Amhara', '2020-01-28 13:11:43'),
(1122, 0, 0, 69, 'Benishangul', '2020-01-28 13:11:43'),
(1123, 0, 0, 69, 'Diredawa', '2020-01-28 13:11:43'),
(1124, 0, 0, 69, 'Gambella', '2020-01-28 13:11:43'),
(1125, 0, 0, 69, 'Harar', '2020-01-28 13:11:43'),
(1126, 0, 0, 69, 'Jigjiga', '2020-01-28 13:11:43'),
(1127, 0, 0, 69, 'Mekele', '2020-01-28 13:11:43'),
(1128, 0, 0, 69, 'Oromia', '2020-01-28 13:11:43'),
(1129, 0, 0, 69, 'Somali', '2020-01-28 13:11:43'),
(1130, 0, 0, 69, 'Southern', '2020-01-28 13:11:43'),
(1131, 0, 0, 69, 'Tigray', '2020-01-28 13:11:43'),
(1132, 0, 0, 70, 'Christmas Island', '2020-01-28 13:11:43'),
(1133, 0, 0, 70, 'Cocos Islands', '2020-01-28 13:11:43'),
(1134, 0, 0, 70, 'Coral Sea Islands', '2020-01-28 13:11:43'),
(1135, 0, 0, 71, 'Falkland Islands', '2020-01-28 13:11:43'),
(1136, 0, 0, 71, 'South Georgia', '2020-01-28 13:11:43'),
(1137, 0, 0, 72, 'Klaksvik', '2020-01-28 13:11:43'),
(1138, 0, 0, 72, 'Nor ara Eysturoy', '2020-01-28 13:11:43'),
(1139, 0, 0, 72, 'Nor oy', '2020-01-28 13:11:43'),
(1140, 0, 0, 72, 'Sandoy', '2020-01-28 13:11:43'),
(1141, 0, 0, 72, 'Streymoy', '2020-01-28 13:11:43'),
(1142, 0, 0, 72, 'Su uroy', '2020-01-28 13:11:43'),
(1143, 0, 0, 72, 'Sy ra Eysturoy', '2020-01-28 13:11:43'),
(1144, 0, 0, 72, 'Torshavn', '2020-01-28 13:11:43'),
(1145, 0, 0, 72, 'Vaga', '2020-01-28 13:11:43'),
(1146, 0, 0, 73, 'Central', '2020-01-28 13:11:43'),
(1147, 0, 0, 73, 'Eastern', '2020-01-28 13:11:43'),
(1148, 0, 0, 73, 'Northern', '2020-01-28 13:11:43'),
(1149, 0, 0, 73, 'South Pacific', '2020-01-28 13:11:43'),
(1150, 0, 0, 73, 'Western', '2020-01-28 13:11:43'),
(1151, 0, 0, 74, 'Ahvenanmaa', '2020-01-28 13:11:43'),
(1152, 0, 0, 74, 'Etela-Karjala', '2020-01-28 13:11:43'),
(1153, 0, 0, 74, 'Etela-Pohjanmaa', '2020-01-28 13:11:43'),
(1154, 0, 0, 74, 'Etela-Savo', '2020-01-28 13:11:43'),
(1155, 0, 0, 74, 'Etela-Suomen Laani', '2020-01-28 13:11:43'),
(1156, 0, 0, 74, 'Ita-Suomen Laani', '2020-01-28 13:11:43'),
(1157, 0, 0, 74, 'Ita-Uusimaa', '2020-01-28 13:11:43'),
(1158, 0, 0, 74, 'Kainuu', '2020-01-28 13:11:43'),
(1159, 0, 0, 74, 'Kanta-Hame', '2020-01-28 13:11:43'),
(1160, 0, 0, 74, 'Keski-Pohjanmaa', '2020-01-28 13:11:43'),
(1161, 0, 0, 74, 'Keski-Suomi', '2020-01-28 13:11:43'),
(1162, 0, 0, 74, 'Kymenlaakso', '2020-01-28 13:11:43'),
(1163, 0, 0, 74, 'Lansi-Suomen Laani', '2020-01-28 13:11:43'),
(1164, 0, 0, 74, 'Lappi', '2020-01-28 13:11:43'),
(1165, 0, 0, 74, 'Northern Savonia', '2020-01-28 13:11:43'),
(1166, 0, 0, 74, 'Ostrobothnia', '2020-01-28 13:11:43'),
(1167, 0, 0, 74, 'Oulun Laani', '2020-01-28 13:11:43'),
(1168, 0, 0, 74, 'Paijat-Hame', '2020-01-28 13:11:43'),
(1169, 0, 0, 74, 'Pirkanmaa', '2020-01-28 13:11:43'),
(1170, 0, 0, 74, 'Pohjanmaa', '2020-01-28 13:11:43'),
(1171, 0, 0, 74, 'Pohjois-Karjala', '2020-01-28 13:11:43'),
(1172, 0, 0, 74, 'Pohjois-Pohjanmaa', '2020-01-28 13:11:43'),
(1173, 0, 0, 74, 'Pohjois-Savo', '2020-01-28 13:11:43'),
(1174, 0, 0, 74, 'Saarijarvi', '2020-01-28 13:11:43'),
(1175, 0, 0, 74, 'Satakunta', '2020-01-28 13:11:43'),
(1176, 0, 0, 74, 'Southern Savonia', '2020-01-28 13:11:43'),
(1177, 0, 0, 74, 'Tavastia Proper', '2020-01-28 13:11:43'),
(1178, 0, 0, 74, 'Uleaborgs Lan', '2020-01-28 13:11:43'),
(1179, 0, 0, 74, 'Uusimaa', '2020-01-28 13:11:43'),
(1180, 0, 0, 74, 'Varsinais-Suomi', '2020-01-28 13:11:43'),
(1181, 0, 0, 75, 'Ain', '2020-01-28 13:11:43'),
(1182, 0, 0, 75, 'Aisne', '2020-01-28 13:11:43'),
(1183, 0, 0, 75, 'Albi Le Sequestre', '2020-01-28 13:11:43'),
(1184, 0, 0, 75, 'Allier', '2020-01-28 13:11:43'),
(1185, 0, 0, 75, 'Alpes-Cote dAzur', '2020-01-28 13:11:43'),
(1186, 0, 0, 75, 'Alpes-Maritimes', '2020-01-28 13:11:43'),
(1187, 0, 0, 75, 'Alpes-de-Haute-Provence', '2020-01-28 13:11:43'),
(1188, 0, 0, 75, 'Alsace', '2020-01-28 13:11:43'),
(1189, 0, 0, 75, 'Aquitaine', '2020-01-28 13:11:43'),
(1190, 0, 0, 75, 'Ardeche', '2020-01-28 13:11:43'),
(1191, 0, 0, 75, 'Ardennes', '2020-01-28 13:11:43'),
(1192, 0, 0, 75, 'Ariege', '2020-01-28 13:11:43'),
(1193, 0, 0, 75, 'Aube', '2020-01-28 13:11:43'),
(1194, 0, 0, 75, 'Aude', '2020-01-28 13:11:43'),
(1195, 0, 0, 75, 'Auvergne', '2020-01-28 13:11:43'),
(1196, 0, 0, 75, 'Aveyron', '2020-01-28 13:11:43'),
(1197, 0, 0, 75, 'Bas-Rhin', '2020-01-28 13:11:43'),
(1198, 0, 0, 75, 'Basse-Normandie', '2020-01-28 13:11:43'),
(1199, 0, 0, 75, 'Bouches-du-Rhone', '2020-01-28 13:11:43'),
(1200, 0, 0, 75, 'Bourgogne', '2020-01-28 13:11:43'),
(1201, 0, 0, 75, 'Bretagne', '2020-01-28 13:11:43'),
(1202, 0, 0, 75, 'Brittany', '2020-01-28 13:11:43'),
(1203, 0, 0, 75, 'Burgundy', '2020-01-28 13:11:43'),
(1204, 0, 0, 75, 'Calvados', '2020-01-28 13:11:43'),
(1205, 0, 0, 75, 'Cantal', '2020-01-28 13:11:43'),
(1206, 0, 0, 75, 'Cedex', '2020-01-28 13:11:43'),
(1207, 0, 0, 75, 'Centre', '2020-01-28 13:11:43'),
(1208, 0, 0, 75, 'Charente', '2020-01-28 13:11:43'),
(1209, 0, 0, 75, 'Charente-Maritime', '2020-01-28 13:11:43'),
(1210, 0, 0, 75, 'Cher', '2020-01-28 13:11:43'),
(1211, 0, 0, 75, 'Correze', '2020-01-28 13:11:43'),
(1212, 0, 0, 75, 'Corse-du-Sud', '2020-01-28 13:11:43'),
(1213, 0, 0, 75, 'Cote-d\'Or', '2020-01-28 13:11:43'),
(1214, 0, 0, 75, 'Cotes-d\'Armor', '2020-01-28 13:11:43'),
(1215, 0, 0, 75, 'Creuse', '2020-01-28 13:11:43'),
(1216, 0, 0, 75, 'Crolles', '2020-01-28 13:11:43'),
(1217, 0, 0, 75, 'Deux-Sevres', '2020-01-28 13:11:43'),
(1218, 0, 0, 75, 'Dordogne', '2020-01-28 13:11:43'),
(1219, 0, 0, 75, 'Doubs', '2020-01-28 13:11:43'),
(1220, 0, 0, 75, 'Drome', '2020-01-28 13:11:43'),
(1221, 0, 0, 75, 'Essonne', '2020-01-28 13:11:43'),
(1222, 0, 0, 75, 'Eure', '2020-01-28 13:11:43'),
(1223, 0, 0, 75, 'Eure-et-Loir', '2020-01-28 13:11:43'),
(1224, 0, 0, 75, 'Feucherolles', '2020-01-28 13:11:43'),
(1225, 0, 0, 75, 'Finistere', '2020-01-28 13:11:43'),
(1226, 0, 0, 75, 'Franche-Comte', '2020-01-28 13:11:43'),
(1227, 0, 0, 75, 'Gard', '2020-01-28 13:11:43'),
(1228, 0, 0, 75, 'Gers', '2020-01-28 13:11:43'),
(1229, 0, 0, 75, 'Gironde', '2020-01-28 13:11:43'),
(1230, 0, 0, 75, 'Haut-Rhin', '2020-01-28 13:11:43'),
(1231, 0, 0, 75, 'Haute-Corse', '2020-01-28 13:11:43'),
(1232, 0, 0, 75, 'Haute-Garonne', '2020-01-28 13:11:43'),
(1233, 0, 0, 75, 'Haute-Loire', '2020-01-28 13:11:43'),
(1234, 0, 0, 75, 'Haute-Marne', '2020-01-28 13:11:43'),
(1235, 0, 0, 75, 'Haute-Saone', '2020-01-28 13:11:43'),
(1236, 0, 0, 75, 'Haute-Savoie', '2020-01-28 13:11:43'),
(1237, 0, 0, 75, 'Haute-Vienne', '2020-01-28 13:11:43'),
(1238, 0, 0, 75, 'Hautes-Alpes', '2020-01-28 13:11:43'),
(1239, 0, 0, 75, 'Hautes-Pyrenees', '2020-01-28 13:11:43'),
(1240, 0, 0, 75, 'Hauts-de-Seine', '2020-01-28 13:11:43'),
(1241, 0, 0, 75, 'Herault', '2020-01-28 13:11:43'),
(1242, 0, 0, 75, 'Ile-de-France', '2020-01-28 13:11:43'),
(1243, 0, 0, 75, 'Ille-et-Vilaine', '2020-01-28 13:11:43'),
(1244, 0, 0, 75, 'Indre', '2020-01-28 13:11:43'),
(1245, 0, 0, 75, 'Indre-et-Loire', '2020-01-28 13:11:43'),
(1246, 0, 0, 75, 'Isere', '2020-01-28 13:11:43'),
(1247, 0, 0, 75, 'Jura', '2020-01-28 13:11:43'),
(1248, 0, 0, 75, 'Klagenfurt', '2020-01-28 13:11:43'),
(1249, 0, 0, 75, 'Landes', '2020-01-28 13:11:43'),
(1250, 0, 0, 75, 'Languedoc-Roussillon', '2020-01-28 13:11:43'),
(1251, 0, 0, 75, 'Larcay', '2020-01-28 13:11:43'),
(1252, 0, 0, 75, 'Le Castellet', '2020-01-28 13:11:43'),
(1253, 0, 0, 75, 'Le Creusot', '2020-01-28 13:11:43'),
(1254, 0, 0, 75, 'Limousin', '2020-01-28 13:11:43'),
(1255, 0, 0, 75, 'Loir-et-Cher', '2020-01-28 13:11:43'),
(1256, 0, 0, 75, 'Loire', '2020-01-28 13:11:43'),
(1257, 0, 0, 75, 'Loire-Atlantique', '2020-01-28 13:11:43'),
(1258, 0, 0, 75, 'Loiret', '2020-01-28 13:11:43'),
(1259, 0, 0, 75, 'Lorraine', '2020-01-28 13:11:43'),
(1260, 0, 0, 75, 'Lot', '2020-01-28 13:11:43'),
(1261, 0, 0, 75, 'Lot-et-Garonne', '2020-01-28 13:11:43'),
(1262, 0, 0, 75, 'Lower Normandy', '2020-01-28 13:11:43'),
(1263, 0, 0, 75, 'Lozere', '2020-01-28 13:11:43'),
(1264, 0, 0, 75, 'Maine-et-Loire', '2020-01-28 13:11:43'),
(1265, 0, 0, 75, 'Manche', '2020-01-28 13:11:43'),
(1266, 0, 0, 75, 'Marne', '2020-01-28 13:11:43'),
(1267, 0, 0, 75, 'Mayenne', '2020-01-28 13:11:43'),
(1268, 0, 0, 75, 'Meurthe-et-Moselle', '2020-01-28 13:11:43'),
(1269, 0, 0, 75, 'Meuse', '2020-01-28 13:11:43'),
(1270, 0, 0, 75, 'Midi-Pyrenees', '2020-01-28 13:11:43'),
(1271, 0, 0, 75, 'Morbihan', '2020-01-28 13:11:43'),
(1272, 0, 0, 75, 'Moselle', '2020-01-28 13:11:43'),
(1273, 0, 0, 75, 'Nievre', '2020-01-28 13:11:43'),
(1274, 0, 0, 75, 'Nord', '2020-01-28 13:11:43'),
(1275, 0, 0, 75, 'Nord-Pas-de-Calais', '2020-01-28 13:11:43'),
(1276, 0, 0, 75, 'Oise', '2020-01-28 13:11:43'),
(1277, 0, 0, 75, 'Orne', '2020-01-28 13:11:43'),
(1278, 0, 0, 75, 'Paris', '2020-01-28 13:11:43'),
(1279, 0, 0, 75, 'Pas-de-Calais', '2020-01-28 13:11:43'),
(1280, 0, 0, 75, 'Pays de la Loire', '2020-01-28 13:11:43'),
(1281, 0, 0, 75, 'Pays-de-la-Loire', '2020-01-28 13:11:43'),
(1282, 0, 0, 75, 'Picardy', '2020-01-28 13:11:43'),
(1283, 0, 0, 75, 'Puy-de-Dome', '2020-01-28 13:11:43'),
(1284, 0, 0, 75, 'Pyrenees-Atlantiques', '2020-01-28 13:11:43'),
(1285, 0, 0, 75, 'Pyrenees-Orientales', '2020-01-28 13:11:43'),
(1286, 0, 0, 75, 'Quelmes', '2020-01-28 13:11:43'),
(1287, 0, 0, 75, 'Rhone', '2020-01-28 13:11:43'),
(1288, 0, 0, 75, 'Rhone-Alpes', '2020-01-28 13:11:43'),
(1289, 0, 0, 75, 'Saint Ouen', '2020-01-28 13:11:43'),
(1290, 0, 0, 75, 'Saint Viatre', '2020-01-28 13:11:43'),
(1291, 0, 0, 75, 'Saone-et-Loire', '2020-01-28 13:11:43'),
(1292, 0, 0, 75, 'Sarthe', '2020-01-28 13:11:43'),
(1293, 0, 0, 75, 'Savoie', '2020-01-28 13:11:43'),
(1294, 0, 0, 75, 'Seine-Maritime', '2020-01-28 13:11:43'),
(1295, 0, 0, 75, 'Seine-Saint-Denis', '2020-01-28 13:11:43'),
(1296, 0, 0, 75, 'Seine-et-Marne', '2020-01-28 13:11:43'),
(1297, 0, 0, 75, 'Somme', '2020-01-28 13:11:43'),
(1298, 0, 0, 75, 'Sophia Antipolis', '2020-01-28 13:11:43'),
(1299, 0, 0, 75, 'Souvans', '2020-01-28 13:11:43'),
(1300, 0, 0, 75, 'Tarn', '2020-01-28 13:11:43'),
(1301, 0, 0, 75, 'Tarn-et-Garonne', '2020-01-28 13:11:43'),
(1302, 0, 0, 75, 'Territoire de Belfort', '2020-01-28 13:11:43'),
(1303, 0, 0, 75, 'Treignac', '2020-01-28 13:11:43'),
(1304, 0, 0, 75, 'Upper Normandy', '2020-01-28 13:11:43'),
(1305, 0, 0, 75, 'Val-d\'Oise', '2020-01-28 13:11:43'),
(1306, 0, 0, 75, 'Val-de-Marne', '2020-01-28 13:11:43'),
(1307, 0, 0, 75, 'Var', '2020-01-28 13:11:43'),
(1308, 0, 0, 75, 'Vaucluse', '2020-01-28 13:11:43'),
(1309, 0, 0, 75, 'Vellise', '2020-01-28 13:11:43'),
(1310, 0, 0, 75, 'Vendee', '2020-01-28 13:11:43'),
(1311, 0, 0, 75, 'Vienne', '2020-01-28 13:11:43'),
(1312, 0, 0, 75, 'Vosges', '2020-01-28 13:11:43'),
(1313, 0, 0, 75, 'Yonne', '2020-01-28 13:11:43'),
(1314, 0, 0, 75, 'Yvelines', '2020-01-28 13:11:43'),
(1315, 0, 0, 76, 'Cayenne', '2020-01-28 13:11:43'),
(1316, 0, 0, 76, 'Saint-Laurent-du-Maroni', '2020-01-28 13:11:43'),
(1317, 0, 0, 77, 'Iles du Vent', '2020-01-28 13:11:43'),
(1318, 0, 0, 77, 'Iles sous le Vent', '2020-01-28 13:11:43'),
(1319, 0, 0, 77, 'Marquesas', '2020-01-28 13:11:43'),
(1320, 0, 0, 77, 'Tuamotu', '2020-01-28 13:11:43'),
(1321, 0, 0, 77, 'Tubuai', '2020-01-28 13:11:43'),
(1322, 0, 0, 78, 'Amsterdam', '2020-01-28 13:11:43'),
(1323, 0, 0, 78, 'Crozet Islands', '2020-01-28 13:11:43'),
(1324, 0, 0, 78, 'Kerguelen', '2020-01-28 13:11:43'),
(1325, 0, 0, 247, 'Estuaire', '2020-01-28 13:11:43'),
(1326, 0, 0, 247, 'Haut-Ogooue', '2020-01-28 13:11:43'),
(1327, 0, 0, 247, 'Moyen-Ogooue', '2020-01-28 13:11:43'),
(1328, 0, 0, 247, 'Ngounie', '2020-01-28 13:11:43'),
(1329, 0, 0, 247, 'Nyanga', '2020-01-28 13:11:43'),
(1330, 0, 0, 247, 'Ogooue-Ivindo', '2020-01-28 13:11:43'),
(1331, 0, 0, 247, 'Ogooue-Lolo', '2020-01-28 13:11:43'),
(1332, 0, 0, 247, 'Ogooue-Maritime', '2020-01-28 13:11:43'),
(1333, 0, 0, 247, 'Woleu-Ntem', '2020-01-28 13:11:43'),
(1334, 0, 0, 80, 'Banjul', '2020-01-28 13:11:43'),
(1335, 0, 0, 80, 'Basse', '2020-01-28 13:11:43'),
(1336, 0, 0, 80, 'Brikama', '2020-01-28 13:11:43'),
(1337, 0, 0, 80, 'Janjanbureh', '2020-01-28 13:11:43'),
(1338, 0, 0, 80, 'Kanifing', '2020-01-28 13:11:43'),
(1339, 0, 0, 80, 'Kerewan', '2020-01-28 13:11:43'),
(1340, 0, 0, 80, 'Kuntaur', '2020-01-28 13:11:43'),
(1341, 0, 0, 80, 'Mansakonko', '2020-01-28 13:11:43'),
(1342, 0, 0, 81, 'Abhasia', '2020-01-28 13:11:43'),
(1343, 0, 0, 81, 'Ajaria', '2020-01-28 13:11:43'),
(1344, 0, 0, 81, 'Guria', '2020-01-28 13:11:43'),
(1345, 0, 0, 81, 'Imereti', '2020-01-28 13:11:43'),
(1346, 0, 0, 81, 'Kaheti', '2020-01-28 13:11:43'),
(1347, 0, 0, 81, 'Kvemo Kartli', '2020-01-28 13:11:43'),
(1348, 0, 0, 81, 'Mcheta-Mtianeti', '2020-01-28 13:11:43'),
(1349, 0, 0, 81, 'Racha', '2020-01-28 13:11:43'),
(1350, 0, 0, 81, 'Samagrelo-Zemo Svaneti', '2020-01-28 13:11:43'),
(1351, 0, 0, 81, 'Samche-Zhavaheti', '2020-01-28 13:11:43'),
(1352, 0, 0, 81, 'Shida Kartli', '2020-01-28 13:11:43'),
(1353, 0, 0, 81, 'Tbilisi', '2020-01-28 13:11:43'),
(1354, 0, 0, 82, 'Auvergne', '2020-01-28 13:11:43'),
(1355, 0, 0, 82, 'Baden-Wurttemberg', '2020-01-28 13:11:43'),
(1356, 0, 0, 82, 'Bavaria', '2020-01-28 13:11:43'),
(1357, 0, 0, 82, 'Bayern', '2020-01-28 13:11:43'),
(1358, 0, 0, 82, 'Beilstein Wurtt', '2020-01-28 13:11:43'),
(1359, 0, 0, 82, 'Berlin', '2020-01-28 13:11:43'),
(1360, 0, 0, 82, 'Brandenburg', '2020-01-28 13:11:43'),
(1361, 0, 0, 82, 'Bremen', '2020-01-28 13:11:43'),
(1362, 0, 0, 82, 'Dreisbach', '2020-01-28 13:11:43'),
(1363, 0, 0, 82, 'Freistaat Bayern', '2020-01-28 13:11:43'),
(1364, 0, 0, 82, 'Hamburg', '2020-01-28 13:11:43'),
(1365, 0, 0, 82, 'Hannover', '2020-01-28 13:11:43'),
(1366, 0, 0, 82, 'Heroldstatt', '2020-01-28 13:11:43'),
(1367, 0, 0, 82, 'Hessen', '2020-01-28 13:11:43'),
(1368, 0, 0, 82, 'Kortenberg', '2020-01-28 13:11:43'),
(1369, 0, 0, 82, 'Laasdorf', '2020-01-28 13:11:43'),
(1370, 0, 0, 82, 'Land Baden-Wurttemberg', '2020-01-28 13:11:43'),
(1371, 0, 0, 82, 'Land Bayern', '2020-01-28 13:11:43'),
(1372, 0, 0, 82, 'Land Brandenburg', '2020-01-28 13:11:43'),
(1373, 0, 0, 82, 'Land Hessen', '2020-01-28 13:11:43'),
(1374, 0, 0, 82, 'Land Mecklenburg-Vorpommern', '2020-01-28 13:11:43'),
(1375, 0, 0, 82, 'Land Nordrhein-Westfalen', '2020-01-28 13:11:43'),
(1376, 0, 0, 82, 'Land Rheinland-Pfalz', '2020-01-28 13:11:43'),
(1377, 0, 0, 82, 'Land Sachsen', '2020-01-28 13:11:43'),
(1378, 0, 0, 82, 'Land Sachsen-Anhalt', '2020-01-28 13:11:43'),
(1379, 0, 0, 82, 'Land Thuringen', '2020-01-28 13:11:43'),
(1380, 0, 0, 82, 'Lower Saxony', '2020-01-28 13:11:43'),
(1381, 0, 0, 82, 'Mecklenburg-Vorpommern', '2020-01-28 13:11:43'),
(1382, 0, 0, 82, 'Mulfingen', '2020-01-28 13:11:43'),
(1383, 0, 0, 82, 'Munich', '2020-01-28 13:11:43'),
(1384, 0, 0, 82, 'Neubeuern', '2020-01-28 13:11:43'),
(1385, 0, 0, 82, 'Niedersachsen', '2020-01-28 13:11:43'),
(1386, 0, 0, 82, 'Noord-Holland', '2020-01-28 13:11:43'),
(1387, 0, 0, 82, 'Nordrhein-Westfalen', '2020-01-28 13:11:43'),
(1388, 0, 0, 82, 'North Rhine-Westphalia', '2020-01-28 13:11:43'),
(1389, 0, 0, 82, 'Osterode', '2020-01-28 13:11:43'),
(1390, 0, 0, 82, 'Rheinland-Pfalz', '2020-01-28 13:11:43'),
(1391, 0, 0, 82, 'Rhineland-Palatinate', '2020-01-28 13:11:43'),
(1392, 0, 0, 82, 'Saarland', '2020-01-28 13:11:43'),
(1393, 0, 0, 82, 'Sachsen', '2020-01-28 13:11:43'),
(1394, 0, 0, 82, 'Sachsen-Anhalt', '2020-01-28 13:11:43'),
(1395, 0, 0, 82, 'Saxony', '2020-01-28 13:11:43'),
(1396, 0, 0, 82, 'Schleswig-Holstein', '2020-01-28 13:11:43'),
(1397, 0, 0, 82, 'Thuringia', '2020-01-28 13:11:43'),
(1398, 0, 0, 82, 'Webling', '2020-01-28 13:11:43'),
(1399, 0, 0, 82, 'Weinstrabe', '2020-01-28 13:11:43'),
(1400, 0, 0, 82, 'schlobborn', '2020-01-28 13:11:43'),
(1401, 0, 0, 83, 'Ashanti', '2020-01-28 13:11:43'),
(1402, 0, 0, 83, 'Brong-Ahafo', '2020-01-28 13:11:43'),
(1403, 0, 0, 83, 'Central', '2020-01-28 13:11:43'),
(1404, 0, 0, 83, 'Eastern', '2020-01-28 13:11:43'),
(1405, 0, 0, 83, 'Greater Accra', '2020-01-28 13:11:43'),
(1406, 0, 0, 83, 'Northern', '2020-01-28 13:11:43'),
(1407, 0, 0, 83, 'Upper East', '2020-01-28 13:11:43'),
(1408, 0, 0, 83, 'Upper West', '2020-01-28 13:11:43'),
(1409, 0, 0, 83, 'Volta', '2020-01-28 13:11:43'),
(1410, 0, 0, 83, 'Western', '2020-01-28 13:11:43'),
(1411, 0, 0, 84, 'Gibraltar', '2020-01-28 13:11:43'),
(1412, 0, 0, 85, 'Acharnes', '2020-01-28 13:11:43'),
(1413, 0, 0, 85, 'Ahaia', '2020-01-28 13:11:43'),
(1414, 0, 0, 85, 'Aitolia kai Akarnania', '2020-01-28 13:11:43'),
(1415, 0, 0, 85, 'Argolis', '2020-01-28 13:11:43'),
(1416, 0, 0, 85, 'Arkadia', '2020-01-28 13:11:43'),
(1417, 0, 0, 85, 'Arta', '2020-01-28 13:11:43'),
(1418, 0, 0, 85, 'Attica', '2020-01-28 13:11:43'),
(1419, 0, 0, 85, 'Attiki', '2020-01-28 13:11:43'),
(1420, 0, 0, 85, 'Ayion Oros', '2020-01-28 13:11:43'),
(1421, 0, 0, 85, 'Crete', '2020-01-28 13:11:43'),
(1422, 0, 0, 85, 'Dodekanisos', '2020-01-28 13:11:43'),
(1423, 0, 0, 85, 'Drama', '2020-01-28 13:11:43'),
(1424, 0, 0, 85, 'Evia', '2020-01-28 13:11:43'),
(1425, 0, 0, 85, 'Evritania', '2020-01-28 13:11:43'),
(1426, 0, 0, 85, 'Evros', '2020-01-28 13:11:43'),
(1427, 0, 0, 85, 'Evvoia', '2020-01-28 13:11:43'),
(1428, 0, 0, 85, 'Florina', '2020-01-28 13:11:43'),
(1429, 0, 0, 85, 'Fokis', '2020-01-28 13:11:43'),
(1430, 0, 0, 85, 'Fthiotis', '2020-01-28 13:11:43'),
(1431, 0, 0, 85, 'Grevena', '2020-01-28 13:11:43'),
(1432, 0, 0, 85, 'Halandri', '2020-01-28 13:11:43'),
(1433, 0, 0, 85, 'Halkidiki', '2020-01-28 13:11:43'),
(1434, 0, 0, 85, 'Hania', '2020-01-28 13:11:43'),
(1435, 0, 0, 85, 'Heraklion', '2020-01-28 13:11:43'),
(1436, 0, 0, 85, 'Hios', '2020-01-28 13:11:43'),
(1437, 0, 0, 85, 'Ilia', '2020-01-28 13:11:43'),
(1438, 0, 0, 85, 'Imathia', '2020-01-28 13:11:43'),
(1439, 0, 0, 85, 'Ioannina', '2020-01-28 13:11:43'),
(1440, 0, 0, 85, 'Iraklion', '2020-01-28 13:11:43'),
(1441, 0, 0, 85, 'Karditsa', '2020-01-28 13:11:43'),
(1442, 0, 0, 85, 'Kastoria', '2020-01-28 13:11:43'),
(1443, 0, 0, 85, 'Kavala', '2020-01-28 13:11:43'),
(1444, 0, 0, 85, 'Kefallinia', '2020-01-28 13:11:43'),
(1445, 0, 0, 85, 'Kerkira', '2020-01-28 13:11:43'),
(1446, 0, 0, 85, 'Kiklades', '2020-01-28 13:11:43'),
(1447, 0, 0, 85, 'Kilkis', '2020-01-28 13:11:43'),
(1448, 0, 0, 85, 'Korinthia', '2020-01-28 13:11:43'),
(1449, 0, 0, 85, 'Kozani', '2020-01-28 13:11:43'),
(1450, 0, 0, 85, 'Lakonia', '2020-01-28 13:11:43'),
(1451, 0, 0, 85, 'Larisa', '2020-01-28 13:11:43'),
(1452, 0, 0, 85, 'Lasithi', '2020-01-28 13:11:43'),
(1453, 0, 0, 85, 'Lesvos', '2020-01-28 13:11:43'),
(1454, 0, 0, 85, 'Levkas', '2020-01-28 13:11:43'),
(1455, 0, 0, 85, 'Magnisia', '2020-01-28 13:11:43'),
(1456, 0, 0, 85, 'Messinia', '2020-01-28 13:11:43'),
(1457, 0, 0, 85, 'Nomos Attikis', '2020-01-28 13:11:43'),
(1458, 0, 0, 85, 'Nomos Zakynthou', '2020-01-28 13:11:43'),
(1459, 0, 0, 85, 'Pella', '2020-01-28 13:11:43'),
(1460, 0, 0, 85, 'Pieria', '2020-01-28 13:11:43'),
(1461, 0, 0, 85, 'Piraios', '2020-01-28 13:11:43'),
(1462, 0, 0, 85, 'Preveza', '2020-01-28 13:11:43'),
(1463, 0, 0, 85, 'Rethimni', '2020-01-28 13:11:43'),
(1464, 0, 0, 85, 'Rodopi', '2020-01-28 13:11:43'),
(1465, 0, 0, 85, 'Samos', '2020-01-28 13:11:43'),
(1466, 0, 0, 85, 'Serrai', '2020-01-28 13:11:43'),
(1467, 0, 0, 85, 'Thesprotia', '2020-01-28 13:11:43'),
(1468, 0, 0, 85, 'Thessaloniki', '2020-01-28 13:11:43'),
(1469, 0, 0, 85, 'Trikala', '2020-01-28 13:11:43'),
(1470, 0, 0, 85, 'Voiotia', '2020-01-28 13:11:43'),
(1471, 0, 0, 85, 'West Greece', '2020-01-28 13:11:43'),
(1472, 0, 0, 85, 'Xanthi', '2020-01-28 13:11:43'),
(1473, 0, 0, 85, 'Zakinthos', '2020-01-28 13:11:43'),
(1474, 0, 0, 86, 'Aasiaat', '2020-01-28 13:11:43'),
(1475, 0, 0, 86, 'Ammassalik', '2020-01-28 13:11:43'),
(1476, 0, 0, 86, 'Illoqqortoormiut', '2020-01-28 13:11:43'),
(1477, 0, 0, 86, 'Ilulissat', '2020-01-28 13:11:43'),
(1478, 0, 0, 86, 'Ivittuut', '2020-01-28 13:11:43'),
(1479, 0, 0, 86, 'Kangaatsiaq', '2020-01-28 13:11:43'),
(1480, 0, 0, 86, 'Maniitsoq', '2020-01-28 13:11:43'),
(1481, 0, 0, 86, 'Nanortalik', '2020-01-28 13:11:43'),
(1482, 0, 0, 86, 'Narsaq', '2020-01-28 13:11:43'),
(1483, 0, 0, 86, 'Nuuk', '2020-01-28 13:11:43'),
(1484, 0, 0, 86, 'Paamiut', '2020-01-28 13:11:43'),
(1485, 0, 0, 86, 'Qaanaaq', '2020-01-28 13:11:43'),
(1486, 0, 0, 86, 'Qaqortoq', '2020-01-28 13:11:43'),
(1487, 0, 0, 86, 'Qasigiannguit', '2020-01-28 13:11:43'),
(1488, 0, 0, 86, 'Qeqertarsuaq', '2020-01-28 13:11:43'),
(1489, 0, 0, 86, 'Sisimiut', '2020-01-28 13:11:43'),
(1490, 0, 0, 86, 'Udenfor kommunal inddeling', '2020-01-28 13:11:43'),
(1491, 0, 0, 86, 'Upernavik', '2020-01-28 13:11:43'),
(1492, 0, 0, 86, 'Uummannaq', '2020-01-28 13:11:43'),
(1493, 0, 0, 87, 'Carriacou-Petite Martinique', '2020-01-28 13:11:43'),
(1494, 0, 0, 87, 'Saint Andrew', '2020-01-28 13:11:43'),
(1495, 0, 0, 87, 'Saint Davids', '2020-01-28 13:11:43'),
(1496, 0, 0, 87, 'Saint George\'s', '2020-01-28 13:11:43'),
(1497, 0, 0, 87, 'Saint John', '2020-01-28 13:11:43'),
(1498, 0, 0, 87, 'Saint Mark', '2020-01-28 13:11:43'),
(1499, 0, 0, 87, 'Saint Patrick', '2020-01-28 13:11:43'),
(1500, 0, 0, 88, 'Basse-Terre', '2020-01-28 13:11:43'),
(1501, 0, 0, 88, 'Grande-Terre', '2020-01-28 13:11:43'),
(1502, 0, 0, 88, 'Iles des Saintes', '2020-01-28 13:11:43'),
(1503, 0, 0, 88, 'La Desirade', '2020-01-28 13:11:43'),
(1504, 0, 0, 88, 'Marie-Galante', '2020-01-28 13:11:43'),
(1505, 0, 0, 88, 'Saint Barthelemy', '2020-01-28 13:11:43'),
(1506, 0, 0, 88, 'Saint Martin', '2020-01-28 13:11:43'),
(1507, 0, 0, 89, 'Agana Heights', '2020-01-28 13:11:43'),
(1508, 0, 0, 89, 'Agat', '2020-01-28 13:11:43'),
(1509, 0, 0, 89, 'Barrigada', '2020-01-28 13:11:43'),
(1510, 0, 0, 89, 'Chalan-Pago-Ordot', '2020-01-28 13:11:43'),
(1511, 0, 0, 89, 'Dededo', '2020-01-28 13:11:43'),
(1512, 0, 0, 89, 'Hagatna', '2020-01-28 13:11:43'),
(1513, 0, 0, 89, 'Inarajan', '2020-01-28 13:11:43'),
(1514, 0, 0, 89, 'Mangilao', '2020-01-28 13:11:43'),
(1515, 0, 0, 89, 'Merizo', '2020-01-28 13:11:43'),
(1516, 0, 0, 89, 'Mongmong-Toto-Maite', '2020-01-28 13:11:43'),
(1517, 0, 0, 89, 'Santa Rita', '2020-01-28 13:11:43'),
(1518, 0, 0, 89, 'Sinajana', '2020-01-28 13:11:43'),
(1519, 0, 0, 89, 'Talofofo', '2020-01-28 13:11:43'),
(1520, 0, 0, 89, 'Tamuning', '2020-01-28 13:11:43'),
(1521, 0, 0, 89, 'Yigo', '2020-01-28 13:11:43'),
(1522, 0, 0, 89, 'Yona', '2020-01-28 13:11:43'),
(1523, 0, 0, 90, 'Alta Verapaz', '2020-01-28 13:11:43'),
(1524, 0, 0, 90, 'Baja Verapaz', '2020-01-28 13:11:43'),
(1525, 0, 0, 90, 'Chimaltenango', '2020-01-28 13:11:43'),
(1526, 0, 0, 90, 'Chiquimula', '2020-01-28 13:11:43'),
(1527, 0, 0, 90, 'El Progreso', '2020-01-28 13:11:43'),
(1528, 0, 0, 90, 'Escuintla', '2020-01-28 13:11:43'),
(1529, 0, 0, 90, 'Guatemala', '2020-01-28 13:11:43'),
(1530, 0, 0, 90, 'Huehuetenango', '2020-01-28 13:11:43'),
(1531, 0, 0, 90, 'Izabal', '2020-01-28 13:11:43'),
(1532, 0, 0, 90, 'Jalapa', '2020-01-28 13:11:43'),
(1533, 0, 0, 90, 'Jutiapa', '2020-01-28 13:11:43'),
(1534, 0, 0, 90, 'Peten', '2020-01-28 13:11:43'),
(1535, 0, 0, 90, 'Quezaltenango', '2020-01-28 13:11:43'),
(1536, 0, 0, 90, 'Quiche', '2020-01-28 13:11:43'),
(1537, 0, 0, 90, 'Retalhuleu', '2020-01-28 13:11:43'),
(1538, 0, 0, 90, 'Sacatepequez', '2020-01-28 13:11:43'),
(1539, 0, 0, 90, 'San Marcos', '2020-01-28 13:11:43'),
(1540, 0, 0, 90, 'Santa Rosa', '2020-01-28 13:11:43'),
(1541, 0, 0, 90, 'Solola', '2020-01-28 13:11:43'),
(1542, 0, 0, 90, 'Suchitepequez', '2020-01-28 13:11:43'),
(1543, 0, 0, 90, 'Totonicapan', '2020-01-28 13:11:43'),
(1544, 0, 0, 90, 'Zacapa', '2020-01-28 13:11:43'),
(1545, 0, 0, 91, 'Alderney', '2020-01-28 13:11:43'),
(1546, 0, 0, 91, 'Castel', '2020-01-28 13:11:43'),
(1547, 0, 0, 91, 'Forest', '2020-01-28 13:11:43'),
(1548, 0, 0, 91, 'Saint Andrew', '2020-01-28 13:11:43'),
(1549, 0, 0, 91, 'Saint Martin', '2020-01-28 13:11:43'),
(1550, 0, 0, 91, 'Saint Peter Port', '2020-01-28 13:11:43'),
(1551, 0, 0, 91, 'Saint Pierre du Bois', '2020-01-28 13:11:43'),
(1552, 0, 0, 91, 'Saint Sampson', '2020-01-28 13:11:43'),
(1553, 0, 0, 91, 'Saint Saviour', '2020-01-28 13:11:43'),
(1554, 0, 0, 91, 'Sark', '2020-01-28 13:11:43'),
(1555, 0, 0, 91, 'Torteval', '2020-01-28 13:11:43'),
(1556, 0, 0, 91, 'Vale', '2020-01-28 13:11:43'),
(1557, 0, 0, 92, 'Beyla', '2020-01-28 13:11:43'),
(1558, 0, 0, 92, 'Boffa', '2020-01-28 13:11:43'),
(1559, 0, 0, 92, 'Boke', '2020-01-28 13:11:43'),
(1560, 0, 0, 92, 'Conakry', '2020-01-28 13:11:43'),
(1561, 0, 0, 92, 'Coyah', '2020-01-28 13:11:43'),
(1562, 0, 0, 92, 'Dabola', '2020-01-28 13:11:43'),
(1563, 0, 0, 92, 'Dalaba', '2020-01-28 13:11:43'),
(1564, 0, 0, 92, 'Dinguiraye', '2020-01-28 13:11:43'),
(1565, 0, 0, 92, 'Faranah', '2020-01-28 13:11:43'),
(1566, 0, 0, 92, 'Forecariah', '2020-01-28 13:11:43'),
(1567, 0, 0, 92, 'Fria', '2020-01-28 13:11:43'),
(1568, 0, 0, 92, 'Gaoual', '2020-01-28 13:11:43'),
(1569, 0, 0, 92, 'Gueckedou', '2020-01-28 13:11:43'),
(1570, 0, 0, 92, 'Kankan', '2020-01-28 13:11:43'),
(1571, 0, 0, 92, 'Kerouane', '2020-01-28 13:11:43'),
(1572, 0, 0, 92, 'Kindia', '2020-01-28 13:11:43'),
(1573, 0, 0, 92, 'Kissidougou', '2020-01-28 13:11:43'),
(1574, 0, 0, 92, 'Koubia', '2020-01-28 13:11:43'),
(1575, 0, 0, 92, 'Koundara', '2020-01-28 13:11:43'),
(1576, 0, 0, 92, 'Kouroussa', '2020-01-28 13:11:43'),
(1577, 0, 0, 92, 'Labe', '2020-01-28 13:11:43'),
(1578, 0, 0, 92, 'Lola', '2020-01-28 13:11:43'),
(1579, 0, 0, 92, 'Macenta', '2020-01-28 13:11:43'),
(1580, 0, 0, 92, 'Mali', '2020-01-28 13:11:43'),
(1581, 0, 0, 92, 'Mamou', '2020-01-28 13:11:43'),
(1582, 0, 0, 92, 'Mandiana', '2020-01-28 13:11:43'),
(1583, 0, 0, 92, 'Nzerekore', '2020-01-28 13:11:43'),
(1584, 0, 0, 92, 'Pita', '2020-01-28 13:11:43'),
(1585, 0, 0, 92, 'Siguiri', '2020-01-28 13:11:43'),
(1586, 0, 0, 92, 'Telimele', '2020-01-28 13:11:43'),
(1587, 0, 0, 92, 'Tougue', '2020-01-28 13:11:43'),
(1588, 0, 0, 92, 'Yomou', '2020-01-28 13:11:43'),
(1589, 0, 0, 93, 'Bafata', '2020-01-28 13:11:43'),
(1590, 0, 0, 93, 'Bissau', '2020-01-28 13:11:43'),
(1591, 0, 0, 93, 'Bolama', '2020-01-28 13:11:43'),
(1592, 0, 0, 93, 'Cacheu', '2020-01-28 13:11:43'),
(1593, 0, 0, 93, 'Gabu', '2020-01-28 13:11:43'),
(1594, 0, 0, 93, 'Oio', '2020-01-28 13:11:43'),
(1595, 0, 0, 93, 'Quinara', '2020-01-28 13:11:43'),
(1596, 0, 0, 93, 'Tombali', '2020-01-28 13:11:43'),
(1597, 0, 0, 94, 'Barima-Waini', '2020-01-28 13:11:43'),
(1598, 0, 0, 94, 'Cuyuni-Mazaruni', '2020-01-28 13:11:43'),
(1599, 0, 0, 94, 'Demerara-Mahaica', '2020-01-28 13:11:43'),
(1600, 0, 0, 94, 'East Berbice-Corentyne', '2020-01-28 13:11:43'),
(1601, 0, 0, 94, 'Essequibo Islands-West Demerar', '2020-01-28 13:11:43'),
(1602, 0, 0, 94, 'Mahaica-Berbice', '2020-01-28 13:11:43'),
(1603, 0, 0, 94, 'Pomeroon-Supenaam', '2020-01-28 13:11:43'),
(1604, 0, 0, 94, 'Potaro-Siparuni', '2020-01-28 13:11:43'),
(1605, 0, 0, 94, 'Upper Demerara-Berbice', '2020-01-28 13:11:43'),
(1606, 0, 0, 94, 'Upper Takutu-Upper Essequibo', '2020-01-28 13:11:43'),
(1607, 0, 0, 95, 'Artibonite', '2020-01-28 13:11:43'),
(1608, 0, 0, 95, 'Centre', '2020-01-28 13:11:43'),
(1609, 0, 0, 95, 'Grand\'Anse', '2020-01-28 13:11:43'),
(1610, 0, 0, 95, 'Nord', '2020-01-28 13:11:43'),
(1611, 0, 0, 95, 'Nord-Est', '2020-01-28 13:11:43'),
(1612, 0, 0, 95, 'Nord-Ouest', '2020-01-28 13:11:43'),
(1613, 0, 0, 95, 'Ouest', '2020-01-28 13:11:43'),
(1614, 0, 0, 95, 'Sud', '2020-01-28 13:11:43'),
(1615, 0, 0, 95, 'Sud-Est', '2020-01-28 13:11:43'),
(1616, 0, 0, 96, 'Heard and McDonald Islands', '2020-01-28 13:11:43'),
(1617, 0, 0, 97, 'Atlantida', '2020-01-28 13:11:43'),
(1618, 0, 0, 97, 'Choluteca', '2020-01-28 13:11:43'),
(1619, 0, 0, 97, 'Colon', '2020-01-28 13:11:43'),
(1620, 0, 0, 97, 'Comayagua', '2020-01-28 13:11:43'),
(1621, 0, 0, 97, 'Copan', '2020-01-28 13:11:43'),
(1622, 0, 0, 97, 'Cortes', '2020-01-28 13:11:43'),
(1623, 0, 0, 97, 'Distrito Central', '2020-01-28 13:11:43'),
(1624, 0, 0, 97, 'El Paraiso', '2020-01-28 13:11:43'),
(1625, 0, 0, 97, 'Francisco Morazan', '2020-01-28 13:11:43'),
(1626, 0, 0, 97, 'Gracias a Dios', '2020-01-28 13:11:43'),
(1627, 0, 0, 97, 'Intibuca', '2020-01-28 13:11:43'),
(1628, 0, 0, 97, 'Islas de la Bahia', '2020-01-28 13:11:43'),
(1629, 0, 0, 97, 'La Paz', '2020-01-28 13:11:43'),
(1630, 0, 0, 97, 'Lempira', '2020-01-28 13:11:43'),
(1631, 0, 0, 97, 'Ocotepeque', '2020-01-28 13:11:43'),
(1632, 0, 0, 97, 'Olancho', '2020-01-28 13:11:43'),
(1633, 0, 0, 97, 'Santa Barbara', '2020-01-28 13:11:43'),
(1634, 0, 0, 97, 'Valle', '2020-01-28 13:11:43'),
(1635, 0, 0, 97, 'Yoro', '2020-01-28 13:11:43'),
(1636, 0, 0, 98, 'Hong Kong', '2020-01-28 13:11:43'),
(1637, 0, 0, 99, 'Bacs-Kiskun', '2020-01-28 13:11:43'),
(1638, 0, 0, 99, 'Baranya', '2020-01-28 13:11:43'),
(1639, 0, 0, 99, 'Bekes', '2020-01-28 13:11:43'),
(1640, 0, 0, 99, 'Borsod-Abauj-Zemplen', '2020-01-28 13:11:43'),
(1641, 0, 0, 99, 'Budapest', '2020-01-28 13:11:43'),
(1642, 0, 0, 99, 'Csongrad', '2020-01-28 13:11:43'),
(1643, 0, 0, 99, 'Fejer', '2020-01-28 13:11:43'),
(1644, 0, 0, 99, 'Gyor-Moson-Sopron', '2020-01-28 13:11:43'),
(1645, 0, 0, 99, 'Hajdu-Bihar', '2020-01-28 13:11:43'),
(1646, 0, 0, 99, 'Heves', '2020-01-28 13:11:43'),
(1647, 0, 0, 99, 'Jasz-Nagykun-Szolnok', '2020-01-28 13:11:43'),
(1648, 0, 0, 99, 'Komarom-Esztergom', '2020-01-28 13:11:43'),
(1649, 0, 0, 99, 'Nograd', '2020-01-28 13:11:43'),
(1650, 0, 0, 99, 'Pest', '2020-01-28 13:11:43'),
(1651, 0, 0, 99, 'Somogy', '2020-01-28 13:11:43'),
(1652, 0, 0, 99, 'Szabolcs-Szatmar-Bereg', '2020-01-28 13:11:43'),
(1653, 0, 0, 99, 'Tolna', '2020-01-28 13:11:43'),
(1654, 0, 0, 99, 'Vas', '2020-01-28 13:11:43'),
(1655, 0, 0, 99, 'Veszprem', '2020-01-28 13:11:43'),
(1656, 0, 0, 99, 'Zala', '2020-01-28 13:11:43'),
(1657, 0, 0, 100, 'Austurland', '2020-01-28 13:11:43'),
(1658, 0, 0, 100, 'Gullbringusysla', '2020-01-28 13:11:43'),
(1659, 0, 0, 100, 'Hofu borgarsva i', '2020-01-28 13:11:43'),
(1660, 0, 0, 100, 'Nor urland eystra', '2020-01-28 13:11:43'),
(1661, 0, 0, 100, 'Nor urland vestra', '2020-01-28 13:11:43'),
(1662, 0, 0, 100, 'Su urland', '2020-01-28 13:11:43'),
(1663, 0, 0, 100, 'Su urnes', '2020-01-28 13:11:43'),
(1664, 0, 0, 100, 'Vestfir ir', '2020-01-28 13:11:43'),
(1665, 0, 0, 100, 'Vesturland', '2020-01-28 13:11:43'),
(1666, 0, 0, 102, 'Aceh', '2020-01-28 13:11:43'),
(1667, 0, 0, 102, 'Bali', '2020-01-28 13:11:43'),
(1668, 0, 0, 102, 'Bangka-Belitung', '2020-01-28 13:11:43'),
(1669, 0, 0, 102, 'Banten', '2020-01-28 13:11:43'),
(1670, 0, 0, 102, 'Bengkulu', '2020-01-28 13:11:43'),
(1671, 0, 0, 102, 'Gandaria', '2020-01-28 13:11:43'),
(1672, 0, 0, 102, 'Gorontalo', '2020-01-28 13:11:43'),
(1673, 0, 0, 102, 'Jakarta', '2020-01-28 13:11:43'),
(1674, 0, 0, 102, 'Jambi', '2020-01-28 13:11:43'),
(1675, 0, 0, 102, 'Jawa Barat', '2020-01-28 13:11:43'),
(1676, 0, 0, 102, 'Jawa Tengah', '2020-01-28 13:11:43'),
(1677, 0, 0, 102, 'Jawa Timur', '2020-01-28 13:11:43'),
(1678, 0, 0, 102, 'Kalimantan Barat', '2020-01-28 13:11:43'),
(1679, 0, 0, 102, 'Kalimantan Selatan', '2020-01-28 13:11:43'),
(1680, 0, 0, 102, 'Kalimantan Tengah', '2020-01-28 13:11:43'),
(1681, 0, 0, 102, 'Kalimantan Timur', '2020-01-28 13:11:43'),
(1682, 0, 0, 102, 'Kendal', '2020-01-28 13:11:43'),
(1683, 0, 0, 102, 'Lampung', '2020-01-28 13:11:43'),
(1684, 0, 0, 102, 'Maluku', '2020-01-28 13:11:43'),
(1685, 0, 0, 102, 'Maluku Utara', '2020-01-28 13:11:43'),
(1686, 0, 0, 102, 'Nusa Tenggara Barat', '2020-01-28 13:11:43'),
(1687, 0, 0, 102, 'Nusa Tenggara Timur', '2020-01-28 13:11:43'),
(1688, 0, 0, 102, 'Papua', '2020-01-28 13:11:43'),
(1689, 0, 0, 102, 'Riau', '2020-01-28 13:11:43'),
(1690, 0, 0, 102, 'Riau Kepulauan', '2020-01-28 13:11:43'),
(1691, 0, 0, 102, 'Solo', '2020-01-28 13:11:43'),
(1692, 0, 0, 102, 'Sulawesi Selatan', '2020-01-28 13:11:43'),
(1693, 0, 0, 102, 'Sulawesi Tengah', '2020-01-28 13:11:43'),
(1694, 0, 0, 102, 'Sulawesi Tenggara', '2020-01-28 13:11:43'),
(1695, 0, 0, 102, 'Sulawesi Utara', '2020-01-28 13:11:43'),
(1696, 0, 0, 102, 'Sumatera Barat', '2020-01-28 13:11:43'),
(1697, 0, 0, 102, 'Sumatera Selatan', '2020-01-28 13:11:43'),
(1698, 0, 0, 102, 'Sumatera Utara', '2020-01-28 13:11:43'),
(1699, 0, 0, 102, 'Yogyakarta', '2020-01-28 13:11:43'),
(1700, 0, 0, 103, 'Ardabil', '2020-01-28 13:11:43'),
(1701, 0, 0, 103, 'Azarbayjan-e Bakhtari', '2020-01-28 13:11:43'),
(1702, 0, 0, 103, 'Azarbayjan-e Khavari', '2020-01-28 13:11:43'),
(1703, 0, 0, 103, 'Bushehr', '2020-01-28 13:11:43'),
(1704, 0, 0, 103, 'Chahar Mahal-e Bakhtiari', '2020-01-28 13:11:43'),
(1705, 0, 0, 103, 'Esfahan', '2020-01-28 13:11:43'),
(1706, 0, 0, 103, 'Fars', '2020-01-28 13:11:43'),
(1707, 0, 0, 103, 'Gilan', '2020-01-28 13:11:43'),
(1708, 0, 0, 103, 'Golestan', '2020-01-28 13:11:43'),
(1709, 0, 0, 103, 'Hamadan', '2020-01-28 13:11:43'),
(1710, 0, 0, 103, 'Hormozgan', '2020-01-28 13:11:43'),
(1711, 0, 0, 103, 'Ilam', '2020-01-28 13:11:43'),
(1712, 0, 0, 103, 'Kerman', '2020-01-28 13:11:43'),
(1713, 0, 0, 103, 'Kermanshah', '2020-01-28 13:11:43'),
(1714, 0, 0, 103, 'Khorasan', '2020-01-28 13:11:43'),
(1715, 0, 0, 103, 'Khuzestan', '2020-01-28 13:11:43'),
(1716, 0, 0, 103, 'Kohgiluyeh-e Boyerahmad', '2020-01-28 13:11:43'),
(1717, 0, 0, 103, 'Kordestan', '2020-01-28 13:11:43'),
(1718, 0, 0, 103, 'Lorestan', '2020-01-28 13:11:43'),
(1719, 0, 0, 103, 'Markazi', '2020-01-28 13:11:43'),
(1720, 0, 0, 103, 'Mazandaran', '2020-01-28 13:11:43'),
(1721, 0, 0, 103, 'Ostan-e Esfahan', '2020-01-28 13:11:43'),
(1722, 0, 0, 103, 'Qazvin', '2020-01-28 13:11:43'),
(1723, 0, 0, 103, 'Qom', '2020-01-28 13:11:43'),
(1724, 0, 0, 103, 'Semnan', '2020-01-28 13:11:43'),
(1725, 0, 0, 103, 'Sistan-e Baluchestan', '2020-01-28 13:11:43'),
(1726, 0, 0, 103, 'Tehran', '2020-01-28 13:11:43'),
(1727, 0, 0, 103, 'Yazd', '2020-01-28 13:11:43'),
(1728, 0, 0, 103, 'Zanjan', '2020-01-28 13:11:43'),
(1729, 0, 0, 104, 'Babil', '2020-01-28 13:11:43'),
(1730, 0, 0, 104, 'Baghdad', '2020-01-28 13:11:43'),
(1731, 0, 0, 104, 'Dahuk', '2020-01-28 13:11:43'),
(1732, 0, 0, 104, 'Dhi Qar', '2020-01-28 13:11:43'),
(1733, 0, 0, 104, 'Diyala', '2020-01-28 13:11:43'),
(1734, 0, 0, 104, 'Erbil', '2020-01-28 13:11:43'),
(1735, 0, 0, 104, 'Irbil', '2020-01-28 13:11:43'),
(1736, 0, 0, 104, 'Karbala', '2020-01-28 13:11:43'),
(1737, 0, 0, 104, 'Kurdistan', '2020-01-28 13:11:43'),
(1738, 0, 0, 104, 'Maysan', '2020-01-28 13:11:43'),
(1739, 0, 0, 104, 'Ninawa', '2020-01-28 13:11:43'),
(1740, 0, 0, 104, 'Salah-ad-Din', '2020-01-28 13:11:43'),
(1741, 0, 0, 104, 'Wasit', '2020-01-28 13:11:43'),
(1742, 0, 0, 104, 'al-Anbar', '2020-01-28 13:11:43'),
(1743, 0, 0, 104, 'al-Basrah', '2020-01-28 13:11:43'),
(1744, 0, 0, 104, 'al-Muthanna', '2020-01-28 13:11:43'),
(1745, 0, 0, 104, 'al-Qadisiyah', '2020-01-28 13:11:43'),
(1746, 0, 0, 104, 'an-Najaf', '2020-01-28 13:11:43'),
(1747, 0, 0, 104, 'as-Sulaymaniyah', '2020-01-28 13:11:43'),
(1748, 0, 0, 104, 'at-Ta\'mim', '2020-01-28 13:11:43'),
(1749, 0, 0, 105, 'Armagh', '2020-01-28 13:11:43'),
(1750, 0, 0, 105, 'Carlow', '2020-01-28 13:11:43'),
(1751, 0, 0, 105, 'Cavan', '2020-01-28 13:11:43'),
(1752, 0, 0, 105, 'Clare', '2020-01-28 13:11:43'),
(1753, 0, 0, 105, 'Cork', '2020-01-28 13:11:43'),
(1754, 0, 0, 105, 'Donegal', '2020-01-28 13:11:43'),
(1755, 0, 0, 105, 'Dublin', '2020-01-28 13:11:43'),
(1756, 0, 0, 105, 'Galway', '2020-01-28 13:11:43'),
(1757, 0, 0, 105, 'Kerry', '2020-01-28 13:11:43'),
(1758, 0, 0, 105, 'Kildare', '2020-01-28 13:11:43'),
(1759, 0, 0, 105, 'Kilkenny', '2020-01-28 13:11:43'),
(1760, 0, 0, 105, 'Laois', '2020-01-28 13:11:43'),
(1761, 0, 0, 105, 'Leinster', '2020-01-28 13:11:43'),
(1762, 0, 0, 105, 'Leitrim', '2020-01-28 13:11:43'),
(1763, 0, 0, 105, 'Limerick', '2020-01-28 13:11:43'),
(1764, 0, 0, 105, 'Loch Garman', '2020-01-28 13:11:43'),
(1765, 0, 0, 105, 'Longford', '2020-01-28 13:11:43'),
(1766, 0, 0, 105, 'Louth', '2020-01-28 13:11:43'),
(1767, 0, 0, 105, 'Mayo', '2020-01-28 13:11:43'),
(1768, 0, 0, 105, 'Meath', '2020-01-28 13:11:43'),
(1769, 0, 0, 105, 'Monaghan', '2020-01-28 13:11:43'),
(1770, 0, 0, 105, 'Offaly', '2020-01-28 13:11:43'),
(1771, 0, 0, 105, 'Roscommon', '2020-01-28 13:11:43'),
(1772, 0, 0, 105, 'Sligo', '2020-01-28 13:11:43'),
(1773, 0, 0, 105, 'Tipperary North Riding', '2020-01-28 13:11:43'),
(1774, 0, 0, 105, 'Tipperary South Riding', '2020-01-28 13:11:43'),
(1775, 0, 0, 105, 'Ulster', '2020-01-28 13:11:43'),
(1776, 0, 0, 105, 'Waterford', '2020-01-28 13:11:43'),
(1777, 0, 0, 105, 'Westmeath', '2020-01-28 13:11:43'),
(1778, 0, 0, 105, 'Wexford', '2020-01-28 13:11:43'),
(1779, 0, 0, 105, 'Wicklow', '2020-01-28 13:11:43'),
(1780, 0, 0, 106, 'Beit Hanania', '2020-01-28 13:11:43'),
(1781, 0, 0, 106, 'Ben Gurion Airport', '2020-01-28 13:11:43'),
(1782, 0, 0, 106, 'Bethlehem', '2020-01-28 13:11:43'),
(1783, 0, 0, 106, 'Caesarea', '2020-01-28 13:11:43'),
(1784, 0, 0, 106, 'Centre', '2020-01-28 13:11:43'),
(1785, 0, 0, 106, 'Gaza', '2020-01-28 13:11:43'),
(1786, 0, 0, 106, 'Hadaron', '2020-01-28 13:11:43'),
(1787, 0, 0, 106, 'Haifa District', '2020-01-28 13:11:43'),
(1788, 0, 0, 106, 'Hamerkaz', '2020-01-28 13:11:43'),
(1789, 0, 0, 106, 'Hazafon', '2020-01-28 13:11:43'),
(1790, 0, 0, 106, 'Hebron', '2020-01-28 13:11:43'),
(1791, 0, 0, 106, 'Jaffa', '2020-01-28 13:11:43'),
(1792, 0, 0, 106, 'Jerusalem', '2020-01-28 13:11:43'),
(1793, 0, 0, 106, 'Khefa', '2020-01-28 13:11:43'),
(1794, 0, 0, 106, 'Kiryat Yam', '2020-01-28 13:11:43'),
(1795, 0, 0, 106, 'Lower Galilee', '2020-01-28 13:11:43'),
(1796, 0, 0, 106, 'Qalqilya', '2020-01-28 13:11:43'),
(1797, 0, 0, 106, 'Talme Elazar', '2020-01-28 13:11:43'),
(1798, 0, 0, 106, 'Tel Aviv', '2020-01-28 13:11:43'),
(1799, 0, 0, 106, 'Tsafon', '2020-01-28 13:11:43'),
(1800, 0, 0, 106, 'Umm El Fahem', '2020-01-28 13:11:43'),
(1801, 0, 0, 106, 'Yerushalayim', '2020-01-28 13:11:43'),
(1802, 0, 0, 107, 'Abruzzi', '2020-01-28 13:11:43'),
(1803, 0, 0, 107, 'Abruzzo', '2020-01-28 13:11:43'),
(1804, 0, 0, 107, 'Agrigento', '2020-01-28 13:11:43'),
(1805, 0, 0, 107, 'Alessandria', '2020-01-28 13:11:43'),
(1806, 0, 0, 107, 'Ancona', '2020-01-28 13:11:43'),
(1807, 0, 0, 107, 'Arezzo', '2020-01-28 13:11:43'),
(1808, 0, 0, 107, 'Ascoli Piceno', '2020-01-28 13:11:43'),
(1809, 0, 0, 107, 'Asti', '2020-01-28 13:11:43'),
(1810, 0, 0, 107, 'Avellino', '2020-01-28 13:11:43'),
(1811, 0, 0, 107, 'Bari', '2020-01-28 13:11:43'),
(1812, 0, 0, 107, 'Basilicata', '2020-01-28 13:11:43'),
(1813, 0, 0, 107, 'Belluno', '2020-01-28 13:11:43'),
(1814, 0, 0, 107, 'Benevento', '2020-01-28 13:11:43'),
(1815, 0, 0, 107, 'Bergamo', '2020-01-28 13:11:43'),
(1816, 0, 0, 107, 'Biella', '2020-01-28 13:11:43'),
(1817, 0, 0, 107, 'Bologna', '2020-01-28 13:11:43'),
(1818, 0, 0, 107, 'Bolzano', '2020-01-28 13:11:43'),
(1819, 0, 0, 107, 'Brescia', '2020-01-28 13:11:43'),
(1820, 0, 0, 107, 'Brindisi', '2020-01-28 13:11:43'),
(1821, 0, 0, 107, 'Calabria', '2020-01-28 13:11:43'),
(1822, 0, 0, 107, 'Campania', '2020-01-28 13:11:43'),
(1823, 0, 0, 107, 'Cartoceto', '2020-01-28 13:11:43'),
(1824, 0, 0, 107, 'Caserta', '2020-01-28 13:11:43'),
(1825, 0, 0, 107, 'Catania', '2020-01-28 13:11:43'),
(1826, 0, 0, 107, 'Chieti', '2020-01-28 13:11:43'),
(1827, 0, 0, 107, 'Como', '2020-01-28 13:11:43'),
(1828, 0, 0, 107, 'Cosenza', '2020-01-28 13:11:43'),
(1829, 0, 0, 107, 'Cremona', '2020-01-28 13:11:43'),
(1830, 0, 0, 107, 'Cuneo', '2020-01-28 13:11:43'),
(1831, 0, 0, 107, 'Emilia-Romagna', '2020-01-28 13:11:43'),
(1832, 0, 0, 107, 'Ferrara', '2020-01-28 13:11:43'),
(1833, 0, 0, 107, 'Firenze', '2020-01-28 13:11:43'),
(1834, 0, 0, 107, 'Florence', '2020-01-28 13:11:43'),
(1835, 0, 0, 107, 'Forli-Cesena ', '2020-01-28 13:11:43'),
(1836, 0, 0, 107, 'Friuli-Venezia Giulia', '2020-01-28 13:11:43'),
(1837, 0, 0, 107, 'Frosinone', '2020-01-28 13:11:43'),
(1838, 0, 0, 107, 'Genoa', '2020-01-28 13:11:43'),
(1839, 0, 0, 107, 'Gorizia', '2020-01-28 13:11:43'),
(1840, 0, 0, 107, 'L\'Aquila', '2020-01-28 13:11:43'),
(1841, 0, 0, 107, 'Lazio', '2020-01-28 13:11:43'),
(1842, 0, 0, 107, 'Lecce', '2020-01-28 13:11:43'),
(1843, 0, 0, 107, 'Lecco', '2020-01-28 13:11:43'),
(1844, 0, 0, 107, 'Lecco Province', '2020-01-28 13:11:43'),
(1845, 0, 0, 107, 'Liguria', '2020-01-28 13:11:43'),
(1846, 0, 0, 107, 'Lodi', '2020-01-28 13:11:43'),
(1847, 0, 0, 107, 'Lombardia', '2020-01-28 13:11:43'),
(1848, 0, 0, 107, 'Lombardy', '2020-01-28 13:11:43'),
(1849, 0, 0, 107, 'Macerata', '2020-01-28 13:11:43'),
(1850, 0, 0, 107, 'Mantova', '2020-01-28 13:11:43'),
(1851, 0, 0, 107, 'Marche', '2020-01-28 13:11:43'),
(1852, 0, 0, 107, 'Messina', '2020-01-28 13:11:43'),
(1853, 0, 0, 107, 'Milan', '2020-01-28 13:11:43'),
(1854, 0, 0, 107, 'Modena', '2020-01-28 13:11:43'),
(1855, 0, 0, 107, 'Molise', '2020-01-28 13:11:43'),
(1856, 0, 0, 107, 'Molteno', '2020-01-28 13:11:43'),
(1857, 0, 0, 107, 'Montenegro', '2020-01-28 13:11:43'),
(1858, 0, 0, 107, 'Monza and Brianza', '2020-01-28 13:11:43'),
(1859, 0, 0, 107, 'Naples', '2020-01-28 13:11:43'),
(1860, 0, 0, 107, 'Novara', '2020-01-28 13:11:43'),
(1861, 0, 0, 107, 'Padova', '2020-01-28 13:11:43'),
(1862, 0, 0, 107, 'Parma', '2020-01-28 13:11:43'),
(1863, 0, 0, 107, 'Pavia', '2020-01-28 13:11:43'),
(1864, 0, 0, 107, 'Perugia', '2020-01-28 13:11:43'),
(1865, 0, 0, 107, 'Pesaro-Urbino', '2020-01-28 13:11:43'),
(1866, 0, 0, 107, 'Piacenza', '2020-01-28 13:11:43'),
(1867, 0, 0, 107, 'Piedmont', '2020-01-28 13:11:43'),
(1868, 0, 0, 107, 'Piemonte', '2020-01-28 13:11:43'),
(1869, 0, 0, 107, 'Pisa', '2020-01-28 13:11:43'),
(1870, 0, 0, 107, 'Pordenone', '2020-01-28 13:11:43'),
(1871, 0, 0, 107, 'Potenza', '2020-01-28 13:11:43'),
(1872, 0, 0, 107, 'Puglia', '2020-01-28 13:11:43'),
(1873, 0, 0, 107, 'Reggio Emilia', '2020-01-28 13:11:43'),
(1874, 0, 0, 107, 'Rimini', '2020-01-28 13:11:43'),
(1875, 0, 0, 107, 'Roma', '2020-01-28 13:11:43'),
(1876, 0, 0, 107, 'Salerno', '2020-01-28 13:11:43'),
(1877, 0, 0, 107, 'Sardegna', '2020-01-28 13:11:43'),
(1878, 0, 0, 107, 'Sassari', '2020-01-28 13:11:43'),
(1879, 0, 0, 107, 'Savona', '2020-01-28 13:11:43'),
(1880, 0, 0, 107, 'Sicilia', '2020-01-28 13:11:43'),
(1881, 0, 0, 107, 'Siena', '2020-01-28 13:11:43'),
(1882, 0, 0, 107, 'Sondrio', '2020-01-28 13:11:43'),
(1883, 0, 0, 107, 'South Tyrol', '2020-01-28 13:11:43'),
(1884, 0, 0, 107, 'Taranto', '2020-01-28 13:11:43'),
(1885, 0, 0, 107, 'Teramo', '2020-01-28 13:11:43'),
(1886, 0, 0, 107, 'Torino', '2020-01-28 13:11:43'),
(1887, 0, 0, 107, 'Toscana', '2020-01-28 13:11:43'),
(1888, 0, 0, 107, 'Trapani', '2020-01-28 13:11:43'),
(1889, 0, 0, 107, 'Trentino-Alto Adige', '2020-01-28 13:11:43'),
(1890, 0, 0, 107, 'Trento', '2020-01-28 13:11:43'),
(1891, 0, 0, 107, 'Treviso', '2020-01-28 13:11:43'),
(1892, 0, 0, 107, 'Udine', '2020-01-28 13:11:43'),
(1893, 0, 0, 107, 'Umbria', '2020-01-28 13:11:43'),
(1894, 0, 0, 107, 'Valle d\'Aosta', '2020-01-28 13:11:43'),
(1895, 0, 0, 107, 'Varese', '2020-01-28 13:11:43'),
(1896, 0, 0, 107, 'Veneto', '2020-01-28 13:11:43'),
(1897, 0, 0, 107, 'Venezia', '2020-01-28 13:11:43'),
(1898, 0, 0, 107, 'Verbano-Cusio-Ossola', '2020-01-28 13:11:43'),
(1899, 0, 0, 107, 'Vercelli', '2020-01-28 13:11:43'),
(1900, 0, 0, 107, 'Verona', '2020-01-28 13:11:43'),
(1901, 0, 0, 107, 'Vicenza', '2020-01-28 13:11:43'),
(1902, 0, 0, 107, 'Viterbo', '2020-01-28 13:11:43'),
(1903, 0, 0, 108, 'Buxoro Viloyati', '2020-01-28 13:11:43'),
(1904, 0, 0, 108, 'Clarendon', '2020-01-28 13:11:43'),
(1905, 0, 0, 108, 'Hanover', '2020-01-28 13:11:43'),
(1906, 0, 0, 108, 'Kingston', '2020-01-28 13:11:43'),
(1907, 0, 0, 108, 'Manchester', '2020-01-28 13:11:43'),
(1908, 0, 0, 108, 'Portland', '2020-01-28 13:11:43'),
(1909, 0, 0, 108, 'Saint Andrews', '2020-01-28 13:11:43'),
(1910, 0, 0, 108, 'Saint Ann', '2020-01-28 13:11:43'),
(1911, 0, 0, 108, 'Saint Catherine', '2020-01-28 13:11:43'),
(1912, 0, 0, 108, 'Saint Elizabeth', '2020-01-28 13:11:43'),
(1913, 0, 0, 108, 'Saint James', '2020-01-28 13:11:43'),
(1914, 0, 0, 108, 'Saint Mary', '2020-01-28 13:11:43'),
(1915, 0, 0, 108, 'Saint Thomas', '2020-01-28 13:11:43'),
(1916, 0, 0, 108, 'Trelawney', '2020-01-28 13:11:43'),
(1917, 0, 0, 108, 'Westmoreland', '2020-01-28 13:11:43'),
(1918, 0, 0, 109, 'Aichi', '2020-01-28 13:11:43'),
(1919, 0, 0, 109, 'Akita', '2020-01-28 13:11:43'),
(1920, 0, 0, 109, 'Aomori', '2020-01-28 13:11:43'),
(1921, 0, 0, 109, 'Chiba', '2020-01-28 13:11:43'),
(1922, 0, 0, 109, 'Ehime', '2020-01-28 13:11:43'),
(1923, 0, 0, 109, 'Fukui', '2020-01-28 13:11:43'),
(1924, 0, 0, 109, 'Fukuoka', '2020-01-28 13:11:43'),
(1925, 0, 0, 109, 'Fukushima', '2020-01-28 13:11:43');
INSERT INTO `state` (`state_id`, `company_id`, `user_id`, `country_id`, `state_name`, `date`) VALUES
(1926, 0, 0, 109, 'Gifu', '2020-01-28 13:11:43'),
(1927, 0, 0, 109, 'Gumma', '2020-01-28 13:11:43'),
(1928, 0, 0, 109, 'Hiroshima', '2020-01-28 13:11:43'),
(1929, 0, 0, 109, 'Hokkaido', '2020-01-28 13:11:43'),
(1930, 0, 0, 109, 'Hyogo', '2020-01-28 13:11:43'),
(1931, 0, 0, 109, 'Ibaraki', '2020-01-28 13:11:43'),
(1932, 0, 0, 109, 'Ishikawa', '2020-01-28 13:11:43'),
(1933, 0, 0, 109, 'Iwate', '2020-01-28 13:11:43'),
(1934, 0, 0, 109, 'Kagawa', '2020-01-28 13:11:43'),
(1935, 0, 0, 109, 'Kagoshima', '2020-01-28 13:11:43'),
(1936, 0, 0, 109, 'Kanagawa', '2020-01-28 13:11:43'),
(1937, 0, 0, 109, 'Kanto', '2020-01-28 13:11:43'),
(1938, 0, 0, 109, 'Kochi', '2020-01-28 13:11:43'),
(1939, 0, 0, 109, 'Kumamoto', '2020-01-28 13:11:43'),
(1940, 0, 0, 109, 'Kyoto', '2020-01-28 13:11:43'),
(1941, 0, 0, 109, 'Mie', '2020-01-28 13:11:43'),
(1942, 0, 0, 109, 'Miyagi', '2020-01-28 13:11:43'),
(1943, 0, 0, 109, 'Miyazaki', '2020-01-28 13:11:43'),
(1944, 0, 0, 109, 'Nagano', '2020-01-28 13:11:43'),
(1945, 0, 0, 109, 'Nagasaki', '2020-01-28 13:11:43'),
(1946, 0, 0, 109, 'Nara', '2020-01-28 13:11:43'),
(1947, 0, 0, 109, 'Niigata', '2020-01-28 13:11:43'),
(1948, 0, 0, 109, 'Oita', '2020-01-28 13:11:43'),
(1949, 0, 0, 109, 'Okayama', '2020-01-28 13:11:43'),
(1950, 0, 0, 109, 'Okinawa', '2020-01-28 13:11:43'),
(1951, 0, 0, 109, 'Osaka', '2020-01-28 13:11:43'),
(1952, 0, 0, 109, 'Saga', '2020-01-28 13:11:43'),
(1953, 0, 0, 109, 'Saitama', '2020-01-28 13:11:43'),
(1954, 0, 0, 109, 'Shiga', '2020-01-28 13:11:43'),
(1955, 0, 0, 109, 'Shimane', '2020-01-28 13:11:43'),
(1956, 0, 0, 109, 'Shizuoka', '2020-01-28 13:11:43'),
(1957, 0, 0, 109, 'Tochigi', '2020-01-28 13:11:43'),
(1958, 0, 0, 109, 'Tokushima', '2020-01-28 13:11:43'),
(1959, 0, 0, 109, 'Tokyo', '2020-01-28 13:11:43'),
(1960, 0, 0, 109, 'Tottori', '2020-01-28 13:11:43'),
(1961, 0, 0, 109, 'Toyama', '2020-01-28 13:11:43'),
(1962, 0, 0, 109, 'Wakayama', '2020-01-28 13:11:43'),
(1963, 0, 0, 109, 'Yamagata', '2020-01-28 13:11:43'),
(1964, 0, 0, 109, 'Yamaguchi', '2020-01-28 13:11:43'),
(1965, 0, 0, 109, 'Yamanashi', '2020-01-28 13:11:43'),
(1966, 0, 0, 110, 'Grouville', '2020-01-28 13:11:43'),
(1967, 0, 0, 110, 'Saint Brelade', '2020-01-28 13:11:43'),
(1968, 0, 0, 110, 'Saint Clement', '2020-01-28 13:11:43'),
(1969, 0, 0, 110, 'Saint Helier', '2020-01-28 13:11:43'),
(1970, 0, 0, 110, 'Saint John', '2020-01-28 13:11:43'),
(1971, 0, 0, 110, 'Saint Lawrence', '2020-01-28 13:11:43'),
(1972, 0, 0, 110, 'Saint Martin', '2020-01-28 13:11:43'),
(1973, 0, 0, 110, 'Saint Mary', '2020-01-28 13:11:43'),
(1974, 0, 0, 110, 'Saint Peter', '2020-01-28 13:11:43'),
(1975, 0, 0, 110, 'Saint Saviour', '2020-01-28 13:11:43'),
(1976, 0, 0, 110, 'Trinity', '2020-01-28 13:11:43'),
(1977, 0, 0, 111, '\'Ajlun', '2020-01-28 13:11:43'),
(1978, 0, 0, 111, 'Amman', '2020-01-28 13:11:43'),
(1979, 0, 0, 111, 'Irbid', '2020-01-28 13:11:43'),
(1980, 0, 0, 111, 'Jarash', '2020-01-28 13:11:43'),
(1981, 0, 0, 111, 'Ma\'an', '2020-01-28 13:11:43'),
(1982, 0, 0, 111, 'Madaba', '2020-01-28 13:11:43'),
(1983, 0, 0, 111, 'al-\'Aqabah', '2020-01-28 13:11:43'),
(1984, 0, 0, 111, 'al-Balqa\'', '2020-01-28 13:11:43'),
(1985, 0, 0, 111, 'al-Karak', '2020-01-28 13:11:43'),
(1986, 0, 0, 111, 'al-Mafraq', '2020-01-28 13:11:43'),
(1987, 0, 0, 111, 'at-Tafilah', '2020-01-28 13:11:43'),
(1988, 0, 0, 111, 'az-Zarqa\'', '2020-01-28 13:11:43'),
(1989, 0, 0, 112, 'Akmecet', '2020-01-28 13:11:43'),
(1990, 0, 0, 112, 'Akmola', '2020-01-28 13:11:43'),
(1991, 0, 0, 112, 'Aktobe', '2020-01-28 13:11:43'),
(1992, 0, 0, 112, 'Almati', '2020-01-28 13:11:43'),
(1993, 0, 0, 112, 'Atirau', '2020-01-28 13:11:43'),
(1994, 0, 0, 112, 'Batis Kazakstan', '2020-01-28 13:11:43'),
(1995, 0, 0, 112, 'Burlinsky Region', '2020-01-28 13:11:43'),
(1996, 0, 0, 112, 'Karagandi', '2020-01-28 13:11:43'),
(1997, 0, 0, 112, 'Kostanay', '2020-01-28 13:11:43'),
(1998, 0, 0, 112, 'Mankistau', '2020-01-28 13:11:43'),
(1999, 0, 0, 112, 'Ontustik Kazakstan', '2020-01-28 13:11:43'),
(2000, 0, 0, 112, 'Pavlodar', '2020-01-28 13:11:43'),
(2001, 0, 0, 112, 'Sigis Kazakstan', '2020-01-28 13:11:43'),
(2002, 0, 0, 112, 'Soltustik Kazakstan', '2020-01-28 13:11:43'),
(2003, 0, 0, 112, 'Taraz', '2020-01-28 13:11:43'),
(2004, 0, 0, 113, 'Central', '2020-01-28 13:11:43'),
(2005, 0, 0, 113, 'Coast', '2020-01-28 13:11:43'),
(2006, 0, 0, 113, 'Eastern', '2020-01-28 13:11:43'),
(2007, 0, 0, 113, 'Nairobi', '2020-01-28 13:11:43'),
(2008, 0, 0, 113, 'North Eastern', '2020-01-28 13:11:43'),
(2009, 0, 0, 113, 'Nyanza', '2020-01-28 13:11:43'),
(2010, 0, 0, 113, 'Rift Valley', '2020-01-28 13:11:43'),
(2011, 0, 0, 113, 'Western', '2020-01-28 13:11:43'),
(2012, 0, 0, 114, 'Abaiang', '2020-01-28 13:11:43'),
(2013, 0, 0, 114, 'Abemana', '2020-01-28 13:11:43'),
(2014, 0, 0, 114, 'Aranuka', '2020-01-28 13:11:43'),
(2015, 0, 0, 114, 'Arorae', '2020-01-28 13:11:43'),
(2016, 0, 0, 114, 'Banaba', '2020-01-28 13:11:43'),
(2017, 0, 0, 114, 'Beru', '2020-01-28 13:11:43'),
(2018, 0, 0, 114, 'Butaritari', '2020-01-28 13:11:43'),
(2019, 0, 0, 114, 'Kiritimati', '2020-01-28 13:11:43'),
(2020, 0, 0, 114, 'Kuria', '2020-01-28 13:11:43'),
(2021, 0, 0, 114, 'Maiana', '2020-01-28 13:11:43'),
(2022, 0, 0, 114, 'Makin', '2020-01-28 13:11:43'),
(2023, 0, 0, 114, 'Marakei', '2020-01-28 13:11:43'),
(2024, 0, 0, 114, 'Nikunau', '2020-01-28 13:11:43'),
(2025, 0, 0, 114, 'Nonouti', '2020-01-28 13:11:43'),
(2026, 0, 0, 114, 'Onotoa', '2020-01-28 13:11:43'),
(2027, 0, 0, 114, 'Phoenix Islands', '2020-01-28 13:11:43'),
(2028, 0, 0, 114, 'Tabiteuea North', '2020-01-28 13:11:43'),
(2029, 0, 0, 114, 'Tabiteuea South', '2020-01-28 13:11:43'),
(2030, 0, 0, 114, 'Tabuaeran', '2020-01-28 13:11:43'),
(2031, 0, 0, 114, 'Tamana', '2020-01-28 13:11:43'),
(2032, 0, 0, 114, 'Tarawa North', '2020-01-28 13:11:43'),
(2033, 0, 0, 114, 'Tarawa South', '2020-01-28 13:11:43'),
(2034, 0, 0, 114, 'Teraina', '2020-01-28 13:11:43'),
(2035, 0, 0, 115, 'Chagangdo', '2020-01-28 13:11:43'),
(2036, 0, 0, 115, 'Hamgyeongbukto', '2020-01-28 13:11:43'),
(2037, 0, 0, 115, 'Hamgyeongnamdo', '2020-01-28 13:11:43'),
(2038, 0, 0, 115, 'Hwanghaebukto', '2020-01-28 13:11:43'),
(2039, 0, 0, 115, 'Hwanghaenamdo', '2020-01-28 13:11:43'),
(2040, 0, 0, 115, 'Kaeseong', '2020-01-28 13:11:43'),
(2041, 0, 0, 115, 'Kangweon', '2020-01-28 13:11:43'),
(2042, 0, 0, 115, 'Nampo', '2020-01-28 13:11:43'),
(2043, 0, 0, 115, 'Pyeonganbukto', '2020-01-28 13:11:43'),
(2044, 0, 0, 115, 'Pyeongannamdo', '2020-01-28 13:11:43'),
(2045, 0, 0, 115, 'Pyeongyang', '2020-01-28 13:11:43'),
(2046, 0, 0, 115, 'Yanggang', '2020-01-28 13:11:43'),
(2047, 0, 0, 116, 'Busan', '2020-01-28 13:11:43'),
(2048, 0, 0, 116, 'Cheju', '2020-01-28 13:11:43'),
(2049, 0, 0, 116, 'Chollabuk', '2020-01-28 13:11:43'),
(2050, 0, 0, 116, 'Chollanam', '2020-01-28 13:11:43'),
(2051, 0, 0, 116, 'Chungbuk', '2020-01-28 13:11:43'),
(2052, 0, 0, 116, 'Chungcheongbuk', '2020-01-28 13:11:43'),
(2053, 0, 0, 116, 'Chungcheongnam', '2020-01-28 13:11:43'),
(2054, 0, 0, 116, 'Chungnam', '2020-01-28 13:11:43'),
(2055, 0, 0, 116, 'Daegu', '2020-01-28 13:11:43'),
(2056, 0, 0, 116, 'Gangwon-do', '2020-01-28 13:11:43'),
(2057, 0, 0, 116, 'Goyang-si', '2020-01-28 13:11:43'),
(2058, 0, 0, 116, 'Gyeonggi-do', '2020-01-28 13:11:43'),
(2059, 0, 0, 116, 'Gyeongsang ', '2020-01-28 13:11:43'),
(2060, 0, 0, 116, 'Gyeongsangnam-do', '2020-01-28 13:11:43'),
(2061, 0, 0, 116, 'Incheon', '2020-01-28 13:11:43'),
(2062, 0, 0, 116, 'Jeju-Si', '2020-01-28 13:11:43'),
(2063, 0, 0, 116, 'Jeonbuk', '2020-01-28 13:11:43'),
(2064, 0, 0, 116, 'Kangweon', '2020-01-28 13:11:43'),
(2065, 0, 0, 116, 'Kwangju', '2020-01-28 13:11:43'),
(2066, 0, 0, 116, 'Kyeonggi', '2020-01-28 13:11:43'),
(2067, 0, 0, 116, 'Kyeongsangbuk', '2020-01-28 13:11:43'),
(2068, 0, 0, 116, 'Kyeongsangnam', '2020-01-28 13:11:43'),
(2069, 0, 0, 116, 'Kyonggi-do', '2020-01-28 13:11:43'),
(2070, 0, 0, 116, 'Kyungbuk-Do', '2020-01-28 13:11:43'),
(2071, 0, 0, 116, 'Kyunggi-Do', '2020-01-28 13:11:43'),
(2072, 0, 0, 116, 'Kyunggi-do', '2020-01-28 13:11:43'),
(2073, 0, 0, 116, 'Pusan', '2020-01-28 13:11:43'),
(2074, 0, 0, 116, 'Seoul', '2020-01-28 13:11:43'),
(2075, 0, 0, 116, 'Sudogwon', '2020-01-28 13:11:43'),
(2076, 0, 0, 116, 'Taegu', '2020-01-28 13:11:43'),
(2077, 0, 0, 116, 'Taejeon', '2020-01-28 13:11:43'),
(2078, 0, 0, 116, 'Taejon-gwangyoksi', '2020-01-28 13:11:43'),
(2079, 0, 0, 116, 'Ulsan', '2020-01-28 13:11:43'),
(2080, 0, 0, 116, 'Wonju', '2020-01-28 13:11:43'),
(2081, 0, 0, 116, 'gwangyoksi', '2020-01-28 13:11:43'),
(2082, 0, 0, 117, 'Al Asimah', '2020-01-28 13:11:43'),
(2083, 0, 0, 117, 'Hawalli', '2020-01-28 13:11:43'),
(2084, 0, 0, 117, 'Mishref', '2020-01-28 13:11:43'),
(2085, 0, 0, 117, 'Qadesiya', '2020-01-28 13:11:43'),
(2086, 0, 0, 117, 'Safat', '2020-01-28 13:11:43'),
(2087, 0, 0, 117, 'Salmiya', '2020-01-28 13:11:43'),
(2088, 0, 0, 117, 'al-Ahmadi', '2020-01-28 13:11:43'),
(2089, 0, 0, 117, 'al-Farwaniyah', '2020-01-28 13:11:43'),
(2090, 0, 0, 117, 'al-Jahra', '2020-01-28 13:11:43'),
(2091, 0, 0, 117, 'al-Kuwayt', '2020-01-28 13:11:43'),
(2092, 0, 0, 118, 'Batken', '2020-01-28 13:11:43'),
(2093, 0, 0, 118, 'Bishkek', '2020-01-28 13:11:43'),
(2094, 0, 0, 118, 'Chui', '2020-01-28 13:11:43'),
(2095, 0, 0, 118, 'Issyk-Kul', '2020-01-28 13:11:43'),
(2096, 0, 0, 118, 'Jalal-Abad', '2020-01-28 13:11:43'),
(2097, 0, 0, 118, 'Naryn', '2020-01-28 13:11:43'),
(2098, 0, 0, 118, 'Osh', '2020-01-28 13:11:43'),
(2099, 0, 0, 118, 'Talas', '2020-01-28 13:11:43'),
(2100, 0, 0, 119, 'Attopu', '2020-01-28 13:11:43'),
(2101, 0, 0, 119, 'Bokeo', '2020-01-28 13:11:43'),
(2102, 0, 0, 119, 'Bolikhamsay', '2020-01-28 13:11:43'),
(2103, 0, 0, 119, 'Champasak', '2020-01-28 13:11:43'),
(2104, 0, 0, 119, 'Houaphanh', '2020-01-28 13:11:43'),
(2105, 0, 0, 119, 'Khammouane', '2020-01-28 13:11:43'),
(2106, 0, 0, 119, 'Luang Nam Tha', '2020-01-28 13:11:43'),
(2107, 0, 0, 119, 'Luang Prabang', '2020-01-28 13:11:43'),
(2108, 0, 0, 119, 'Oudomxay', '2020-01-28 13:11:43'),
(2109, 0, 0, 119, 'Phongsaly', '2020-01-28 13:11:43'),
(2110, 0, 0, 119, 'Saravan', '2020-01-28 13:11:43'),
(2111, 0, 0, 119, 'Savannakhet', '2020-01-28 13:11:43'),
(2112, 0, 0, 119, 'Sekong', '2020-01-28 13:11:43'),
(2113, 0, 0, 119, 'Viangchan Prefecture', '2020-01-28 13:11:43'),
(2114, 0, 0, 119, 'Viangchan Province', '2020-01-28 13:11:43'),
(2115, 0, 0, 119, 'Xaignabury', '2020-01-28 13:11:43'),
(2116, 0, 0, 119, 'Xiang Khuang', '2020-01-28 13:11:43'),
(2117, 0, 0, 120, 'Aizkraukles', '2020-01-28 13:11:43'),
(2118, 0, 0, 120, 'Aluksnes', '2020-01-28 13:11:43'),
(2119, 0, 0, 120, 'Balvu', '2020-01-28 13:11:43'),
(2120, 0, 0, 120, 'Bauskas', '2020-01-28 13:11:43'),
(2121, 0, 0, 120, 'Cesu', '2020-01-28 13:11:43'),
(2122, 0, 0, 120, 'Daugavpils', '2020-01-28 13:11:43'),
(2123, 0, 0, 120, 'Daugavpils City', '2020-01-28 13:11:43'),
(2124, 0, 0, 120, 'Dobeles', '2020-01-28 13:11:43'),
(2125, 0, 0, 120, 'Gulbenes', '2020-01-28 13:11:43'),
(2126, 0, 0, 120, 'Jekabspils', '2020-01-28 13:11:43'),
(2127, 0, 0, 120, 'Jelgava', '2020-01-28 13:11:43'),
(2128, 0, 0, 120, 'Jelgavas', '2020-01-28 13:11:43'),
(2129, 0, 0, 120, 'Jurmala City', '2020-01-28 13:11:43'),
(2130, 0, 0, 120, 'Kraslavas', '2020-01-28 13:11:43'),
(2131, 0, 0, 120, 'Kuldigas', '2020-01-28 13:11:43'),
(2132, 0, 0, 120, 'Liepaja', '2020-01-28 13:11:43'),
(2133, 0, 0, 120, 'Liepajas', '2020-01-28 13:11:43'),
(2134, 0, 0, 120, 'Limbazhu', '2020-01-28 13:11:43'),
(2135, 0, 0, 120, 'Ludzas', '2020-01-28 13:11:43'),
(2136, 0, 0, 120, 'Madonas', '2020-01-28 13:11:43'),
(2137, 0, 0, 120, 'Ogres', '2020-01-28 13:11:43'),
(2138, 0, 0, 120, 'Preilu', '2020-01-28 13:11:43'),
(2139, 0, 0, 120, 'Rezekne', '2020-01-28 13:11:43'),
(2140, 0, 0, 120, 'Rezeknes', '2020-01-28 13:11:43'),
(2141, 0, 0, 120, 'Riga', '2020-01-28 13:11:43'),
(2142, 0, 0, 120, 'Rigas', '2020-01-28 13:11:43'),
(2143, 0, 0, 120, 'Saldus', '2020-01-28 13:11:43'),
(2144, 0, 0, 120, 'Talsu', '2020-01-28 13:11:43'),
(2145, 0, 0, 120, 'Tukuma', '2020-01-28 13:11:43'),
(2146, 0, 0, 120, 'Valkas', '2020-01-28 13:11:43'),
(2147, 0, 0, 120, 'Valmieras', '2020-01-28 13:11:43'),
(2148, 0, 0, 120, 'Ventspils', '2020-01-28 13:11:43'),
(2149, 0, 0, 120, 'Ventspils City', '2020-01-28 13:11:43'),
(2150, 0, 0, 121, 'Beirut', '2020-01-28 13:11:43'),
(2151, 0, 0, 121, 'Jabal Lubnan', '2020-01-28 13:11:43'),
(2152, 0, 0, 121, 'Mohafazat Liban-Nord', '2020-01-28 13:11:43'),
(2153, 0, 0, 121, 'Mohafazat Mont-Liban', '2020-01-28 13:11:43'),
(2154, 0, 0, 121, 'Sidon', '2020-01-28 13:11:43'),
(2155, 0, 0, 121, 'al-Biqa', '2020-01-28 13:11:43'),
(2156, 0, 0, 121, 'al-Janub', '2020-01-28 13:11:43'),
(2157, 0, 0, 121, 'an-Nabatiyah', '2020-01-28 13:11:43'),
(2158, 0, 0, 121, 'ash-Shamal', '2020-01-28 13:11:43'),
(2159, 0, 0, 122, 'Berea', '2020-01-28 13:11:43'),
(2160, 0, 0, 122, 'Butha-Buthe', '2020-01-28 13:11:43'),
(2161, 0, 0, 122, 'Leribe', '2020-01-28 13:11:43'),
(2162, 0, 0, 122, 'Mafeteng', '2020-01-28 13:11:43'),
(2163, 0, 0, 122, 'Maseru', '2020-01-28 13:11:43'),
(2164, 0, 0, 122, 'Mohale\'s Hoek', '2020-01-28 13:11:43'),
(2165, 0, 0, 122, 'Mokhotlong', '2020-01-28 13:11:43'),
(2166, 0, 0, 122, 'Qacha\'s Nek', '2020-01-28 13:11:43'),
(2167, 0, 0, 122, 'Quthing', '2020-01-28 13:11:43'),
(2168, 0, 0, 122, 'Thaba-Tseka', '2020-01-28 13:11:43'),
(2169, 0, 0, 123, 'Bomi', '2020-01-28 13:11:43'),
(2170, 0, 0, 123, 'Bong', '2020-01-28 13:11:43'),
(2171, 0, 0, 123, 'Grand Bassa', '2020-01-28 13:11:43'),
(2172, 0, 0, 123, 'Grand Cape Mount', '2020-01-28 13:11:43'),
(2173, 0, 0, 123, 'Grand Gedeh', '2020-01-28 13:11:43'),
(2174, 0, 0, 123, 'Loffa', '2020-01-28 13:11:43'),
(2175, 0, 0, 123, 'Margibi', '2020-01-28 13:11:43'),
(2176, 0, 0, 123, 'Maryland and Grand Kru', '2020-01-28 13:11:43'),
(2177, 0, 0, 123, 'Montserrado', '2020-01-28 13:11:43'),
(2178, 0, 0, 123, 'Nimba', '2020-01-28 13:11:43'),
(2179, 0, 0, 123, 'Rivercess', '2020-01-28 13:11:43'),
(2180, 0, 0, 123, 'Sinoe', '2020-01-28 13:11:43');

-- --------------------------------------------------------

--
-- Table structure for table `sub_cast`
--

CREATE TABLE `sub_cast` (
  `sub_cast_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `religion_id` bigint(20) NOT NULL,
  `cast_id` bigint(20) NOT NULL,
  `sub_cast_name` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_cast`
--

INSERT INTO `sub_cast` (`sub_cast_id`, `company_id`, `user_id`, `religion_id`, `cast_id`, `sub_cast_name`, `date`) VALUES
(2, 3, 3, 3, 3, 'Kunabi', '2019-12-28 04:25:14');

-- --------------------------------------------------------

--
-- Table structure for table `tahasil`
--

CREATE TABLE `tahasil` (
  `tahasil_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `country_id` bigint(20) NOT NULL,
  `state_id` bigint(20) NOT NULL,
  `district_id` bigint(20) NOT NULL,
  `tahasil_name` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tahasil`
--

INSERT INTO `tahasil` (`tahasil_id`, `company_id`, `user_id`, `country_id`, `state_id`, `district_id`, `tahasil_name`, `date`) VALUES
(4, 3, 3, 101, 22, 6, 'Gadhinglaj', '2020-01-29 11:26:55');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 1,
  `user_name` varchar(250) NOT NULL,
  `user_city` varchar(150) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_mobile` varchar(12) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_status` varchar(20) NOT NULL DEFAULT 'active',
  `user_addedby` varchar(100) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_admin` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `company_id`, `role_id`, `user_name`, `user_city`, `user_email`, `user_mobile`, `user_password`, `user_status`, `user_addedby`, `user_date`, `is_admin`) VALUES
(3, 3, 1, 'Admin', 'KOLHAPUR', 'demo@mail.com', '9876543210', '123456', 'active', 'Admin', '2019-12-26 06:07:57', 1),
(7, 3, 2, 'Emp Demo', 'kop', 'ddd@ggg.com', '9988556622', '123', 'active', '3', '2020-01-21 11:47:39', 0),
(8, 3, 4, 'Demo Franc', '', 'demofranc@ooo.com', '9876543211', '123456', 'active', '7', '2020-01-21 11:48:41', 0),
(9, 3, 5, 'Demo Franc Local', '', 'ggg@jjj.com', '9876543212', '123456', 'active', '8', '2020-01-21 12:17:36', 0),
(18, 0, 6, 'Demo Add Lead', '', '', '9673454383', '123456', 'deactivate', '0', '2020-01-30 08:15:45', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`adv_id`);

--
-- Indexes for table `advertisement_reach`
--
ALTER TABLE `advertisement_reach`
  ADD PRIMARY KEY (`reach_id`);

--
-- Indexes for table `blood_group`
--
ALTER TABLE `blood_group`
  ADD PRIMARY KEY (`blood_group_id`);

--
-- Indexes for table `body_type`
--
ALTER TABLE `body_type`
  ADD PRIMARY KEY (`body_type_id`);

--
-- Indexes for table `cast`
--
ALTER TABLE `cast`
  ADD PRIMARY KEY (`cast_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `complexion`
--
ALTER TABLE `complexion`
  ADD PRIMARY KEY (`complexion_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `diet`
--
ALTER TABLE `diet`
  ADD PRIMARY KEY (`diet_id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`education_id`);

--
-- Indexes for table `family_status`
--
ALTER TABLE `family_status`
  ADD PRIMARY KEY (`family_status_id`);

--
-- Indexes for table `family_type`
--
ALTER TABLE `family_type`
  ADD PRIMARY KEY (`family_type_id`);

--
-- Indexes for table `family_value`
--
ALTER TABLE `family_value`
  ADD PRIMARY KEY (`family_value_id`);

--
-- Indexes for table `franchise`
--
ALTER TABLE `franchise`
  ADD PRIMARY KEY (`franchise_id`);

--
-- Indexes for table `franchise_type`
--
ALTER TABLE `franchise_type`
  ADD PRIMARY KEY (`franchise_type_id`);

--
-- Indexes for table `gothram`
--
ALTER TABLE `gothram`
  ADD PRIMARY KEY (`gothram_id`);

--
-- Indexes for table `height`
--
ALTER TABLE `height`
  ADD PRIMARY KEY (`height_id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`income_id`);

--
-- Indexes for table `interest`
--
ALTER TABLE `interest`
  ADD PRIMARY KEY (`interest_id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`language_id`);

--
-- Indexes for table `marital_status`
--
ALTER TABLE `marital_status`
  ADD PRIMARY KEY (`marital_status_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `member_image`
--
ALTER TABLE `member_image`
  ADD PRIMARY KEY (`member_image_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `moonsign`
--
ALTER TABLE `moonsign`
  ADD PRIMARY KEY (`moonsign_id`);

--
-- Indexes for table `occupation`
--
ALTER TABLE `occupation`
  ADD PRIMARY KEY (`occupation_id`);

--
-- Indexes for table `onbehalf`
--
ALTER TABLE `onbehalf`
  ADD PRIMARY KEY (`onbehalf_id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `reference_by`
--
ALTER TABLE `reference_by`
  ADD PRIMARY KEY (`reference_by_id`);

--
-- Indexes for table `religion`
--
ALTER TABLE `religion`
  ADD PRIMARY KEY (`religion_id`);

--
-- Indexes for table `resident_status`
--
ALTER TABLE `resident_status`
  ADD PRIMARY KEY (`resident_status_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `shortlist`
--
ALTER TABLE `shortlist`
  ADD PRIMARY KEY (`shortlist_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `sub_cast`
--
ALTER TABLE `sub_cast`
  ADD PRIMARY KEY (`sub_cast_id`);

--
-- Indexes for table `tahasil`
--
ALTER TABLE `tahasil`
  ADD PRIMARY KEY (`tahasil_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `advertisement`
--
ALTER TABLE `advertisement`
  MODIFY `adv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `advertisement_reach`
--
ALTER TABLE `advertisement_reach`
  MODIFY `reach_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blood_group`
--
ALTER TABLE `blood_group`
  MODIFY `blood_group_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `body_type`
--
ALTER TABLE `body_type`
  MODIFY `body_type_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cast`
--
ALTER TABLE `cast`
  MODIFY `cast_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `complexion`
--
ALTER TABLE `complexion`
  MODIFY `complexion_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;

--
-- AUTO_INCREMENT for table `diet`
--
ALTER TABLE `diet`
  MODIFY `diet_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `district_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `education_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `family_status`
--
ALTER TABLE `family_status`
  MODIFY `family_status_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `family_type`
--
ALTER TABLE `family_type`
  MODIFY `family_type_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `family_value`
--
ALTER TABLE `family_value`
  MODIFY `family_value_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `franchise`
--
ALTER TABLE `franchise`
  MODIFY `franchise_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `franchise_type`
--
ALTER TABLE `franchise_type`
  MODIFY `franchise_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gothram`
--
ALTER TABLE `gothram`
  MODIFY `gothram_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `height`
--
ALTER TABLE `height`
  MODIFY `height_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `income_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `interest`
--
ALTER TABLE `interest`
  MODIFY `interest_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `language_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `marital_status`
--
ALTER TABLE `marital_status`
  MODIFY `marital_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `member_image`
--
ALTER TABLE `member_image`
  MODIFY `member_image_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `moonsign`
--
ALTER TABLE `moonsign`
  MODIFY `moonsign_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `occupation`
--
ALTER TABLE `occupation`
  MODIFY `occupation_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `onbehalf`
--
ALTER TABLE `onbehalf`
  MODIFY `onbehalf_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reference_by`
--
ALTER TABLE `reference_by`
  MODIFY `reference_by_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `religion`
--
ALTER TABLE `religion`
  MODIFY `religion_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `resident_status`
--
ALTER TABLE `resident_status`
  MODIFY `resident_status_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `shortlist`
--
ALTER TABLE `shortlist`
  MODIFY `shortlist_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `state_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2181;

--
-- AUTO_INCREMENT for table `sub_cast`
--
ALTER TABLE `sub_cast`
  MODIFY `sub_cast_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tahasil`
--
ALTER TABLE `tahasil`
  MODIFY `tahasil_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
