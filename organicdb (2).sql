-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2018 at 01:29 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `organicdb`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getParentId` (IN `login_child_id` INT)  SELECT T2.p_id as parent_id
FROM (
    SELECT
        @r AS _id,
        (SELECT @r := p_id FROM relations WHERE child_id = _id) AS parent_id,
        @l := @l + 1 AS lvl
    FROM
        (SELECT @r := login_child_id, @l := 0) vars,
        relations m
    WHERE @r <> 0) T1
JOIN relations T2
ON T1._id = T2.child_id
ORDER BY T1.lvl ASC$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin_master`
--

CREATE TABLE `admin_master` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `rollmaster_id` int(11) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_master`
--

INSERT INTO `admin_master` (`id`, `username`, `password`, `image`, `rollmaster_id`, `is_active`) VALUES
(9, 'adminone', '123', '1535805799_37074004_1800555253392285_5556539601906040832_n.jpg', 2, 1),
(10, 'admin', '123', '1543319123_3Tmd8I.png', 1, 1),
(11, 'lalu', '1234', '1536042554_37074004_1800555253392285_5556539601906040832_n.jpg', 2, 1),
(12, 'ashish', 'qwerty', NULL, 2, 1),
(13, 'lalu', '1234', NULL, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `id` int(11) NOT NULL,
  `city_id` int(11) DEFAULT NULL,
  `area` varchar(100) DEFAULT NULL,
  `pincode` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ask`
--

CREATE TABLE `ask` (
  `id` int(11) NOT NULL,
  `mobile` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `img_url` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_date` varchar(255) NOT NULL,
  `meta_title` varchar(2000) NOT NULL,
  `meta_keyword` varchar(2000) NOT NULL,
  `meta_description` varchar(2000) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `description`, `img_url`, `created_by`, `created_date`, `meta_title`, `meta_keyword`, `meta_description`, `is_active`) VALUES
(1, 'first', '<span style=\"font-weight: bold;\">cxzzcxzc</span>', '1530602476_35888654_1758215954292882_4526243180286312448_n.jpg', 'aditya', '03-07-18', 'cx', 'czxcz', 'cxzcx', 1),
(2, 'second', '<span style=\"font-weight: bold; font-style: italic; color: rgb(153, 153, 153);\">cdsfsdfdsfdsf</span>', '1530688052_555logo.png', 'aditya', '04-07-18', 'dssad', 'asdasd', 'asdasdas', 1),
(3, 'czxczc', 'cxz<span style=\"font-weight: bold;\">czxcxz</span>', '1530688150_35888654_1758215954292882_4526243180286312448_n.jpg', 'aditya', '04-07-18', 'czxc', 'zxczxcz', 'czcx', 1),
(4, 'cxzzx', '<span style=\"font-weight: bold;\">czxcxzc</span>', '1530692968_photo-1515163988842-60ece4c9a5bb.jpg', 'aditya', '04-07-18', 'xczc', 'zxcz', 'xcxc', 1),
(5, 'cxzcxzczx', 'czxcxzcxc', '1530775881_photo-1515163988842-60ece4c9a5bb.jpg', 'aditya', '05-07-18', 'czxczc', 'zxcxzc', 'xczxcz', 1),
(7, 'LagnPhere', 'dsasdasdasdsadas', '1535095155_31102401_1007570849418485_6325220195522393767_n.jpg', 'admin', '24-08-18', 'asdsadas', 'dasdasdasd', 'sadsadsad', 1),
(8, 'my first blog', '<p style=\"margin-bottom: 22px; padding: 0px; clear: left; font-family: sans-serif; font-size: 13px; font-variant-numeric: normal !important; font-variant-east-asian: normal !important;\"><span style=\"font-weight: bold; color: rgb(0, 0, 0);\">\"Blog\" is an abbreviated version of \"weblog,\" which is a term used to describe websites that maintain an ongoing chronicle of information. A blog features diary-type commentary and links to articles on other websites, usually presented as a list of entries in reverse chronological order. Blogs range from the personal to the political, and can focus on one narrow subject or a whole range of subjects.</span></p><p style=\"margin-bottom: 22px; padding: 0px; clear: left; font-family: sans-serif; font-size: 13px; font-variant-numeric: normal !important; font-variant-east-asian: normal !important;\"><span style=\"font-weight: bold; color: rgb(0, 0, 0);\">Many blogs focus on a particular topic, such as web design, home staging, sports, or mobile technology. Some are more eclectic, presenting links to all types of other sites. And others are more like personal journals, presenting the author\'s daily life and thoughts.</span></p><p style=\"margin-bottom: 22px; padding: 0px; clear: left; font-family: sans-serif; font-size: 13px; font-variant-numeric: normal !important; font-variant-east-asian: normal !important;\"><span style=\"font-weight: bold; color: rgb(0, 0, 0);\">Generally speaking (although there are exceptions), blogs tend to have a few things in common:</span></p>', '1535198991_rakhi-70a.jpg', 'admin', '25-08-18', 'rr', 'rr', 'rr', 1),
(9, '9999999999', '<span style=\"font-weight: bold;\">hfjhgb<span style=\"color: rgb(255, 255, 0);\">kjlgklkl</span></span>', '1535608983_37074004_1800555253392285_5556539601906040832_n.jpg', 'admin', '30-08-18', 'qwe', 'qwe', 'qwe', 1),
(10, 'fsdfsd', 'fsdfsdf', '1535614449_31102401_1007570849418485_6325220195522393767_n.jpg', 'admin', '30-08-18', 'sdfsd', 'fsdfsd', 'sdfsdfsd', 1),
(11, 'fsdfsd', 'fsdfsdf', '1535616727_37074004_1800555253392285_5556539601906040832_n.jpg', 'admin', '30-08-18', 'sdfsd', 'fsdfsd', 'sdfsdfsd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `blog_category`
--

CREATE TABLE `blog_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `meta_keyword` varchar(2000) NOT NULL,
  `meta_description` varchar(2000) NOT NULL,
  `meta_title` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_category`
--

INSERT INTO `blog_category` (`id`, `name`, `meta_keyword`, `meta_description`, `meta_title`) VALUES
(1, 'aa', 'aa', 'aa', 'aa'),
(2, 'sad', 'asdasd', 'asd', 'dsadsa'),
(3, 'cxzczx', 'zxczx', 'czxcx', 'czxc');

-- --------------------------------------------------------

--
-- Table structure for table `blog_cat_record`
--

CREATE TABLE `blog_cat_record` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_cat_record`
--

INSERT INTO `blog_cat_record` (`id`, `blog_id`, `cat_id`) VALUES
(1, 1, 3),
(2, 2, 2),
(3, 3, 1),
(4, 3, 2),
(5, 4, 2),
(6, 5, 2),
(7, 7, 2),
(8, 8, 2),
(9, 9, 2),
(10, 9, 3),
(11, 10, 2),
(12, 11, 1),
(13, 11, 2),
(14, 11, 3);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `brand` varchar(50) DEFAULT NULL,
  `is_active` smallint(6) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand`, `is_active`) VALUES
(1, 'Haldiram', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category_master`
--

CREATE TABLE `category_master` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category_master`
--

INSERT INTO `category_master` (`id`, `name`, `slug`, `description`, `img`, `is_active`, `created_at`) VALUES
(1, 'Daal', 'undefined', 'no', NULL, 1, '2018-06-05 11:48:14'),
(2, 'Chana', 'chana', 'no', NULL, 1, '2018-06-05 11:48:39'),
(3, 'Daliya', 'daliya', 'no', NULL, 1, '2018-06-05 11:49:02'),
(4, 'Aata', 'aata', 'no', NULL, 1, '2018-06-05 11:49:29'),
(5, 'Flakes', 'flakes', 'no', NULL, 1, '2018-06-09 08:26:14'),
(6, 'Wheat', 'wheat', 'no', NULL, 1, '2018-06-09 08:26:14'),
(7, 'Spices', 'spices', 'no', NULL, 1, '2018-06-09 08:26:14'),
(8, 'Sweetners', 'sweetners', 'no', NULL, 1, '2018-06-11 06:07:16'),
(9, 'Oil', 'oil', 'no', NULL, 1, '2018-06-11 06:07:35'),
(10, 'Honey', 'honey', 'no', NULL, 1, '2018-06-11 06:09:39'),
(11, 'Millet', 'millet', '\r\n', NULL, 1, '2018-06-11 06:09:39'),
(12, 'Medicinal', 'medicinal', 'Medicinal', NULL, 1, '2018-06-11 06:10:40'),
(13, 'Ghee', 'ghee', 'Ghee', NULL, 1, '2018-06-11 06:10:40'),
(14, 'Jam', 'jam', NULL, NULL, 1, '2018-06-11 06:16:18'),
(15, 'Pickle', 'pickle', NULL, NULL, 1, '2018-06-11 06:16:18'),
(16, 'Preserves', 'preserves', NULL, NULL, 1, '2018-06-11 06:16:57'),
(17, 'Salt', 'salt', NULL, NULL, 1, '2018-06-11 06:16:57'),
(18, 'Seeds', 'seeds', 'seeds', NULL, 1, '2018-06-11 06:17:38'),
(19, 'Ready Mix', 'ready-mix', 'Ready Mix', NULL, 1, '2018-06-11 06:17:38'),
(20, 'Cosmetics', 'cosmetics', 'cosmetics', NULL, 1, '2018-06-11 06:18:18'),
(21, 'Henna', 'henna', 'Henna', NULL, 1, '2018-06-11 06:18:18'),
(22, 'Hair Colors', 'hair-colors', 'hair-colors', NULL, 1, '2018-06-11 06:19:34'),
(23, 'Hair treatment', 'hair-treatment', NULL, NULL, 1, '2018-06-11 06:19:34'),
(24, 'Dry Fruits', 'dry-fruits', NULL, NULL, 1, '2018-06-11 06:20:16'),
(25, 'Energy Drink', 'energy-drink', 'Energy Drink', NULL, 1, '2018-06-11 06:20:16'),
(26, 'Ready To Eat', 'ready-to-eat', 'Ready To eat', NULL, 1, '2018-06-11 06:21:12'),
(27, 'Protein Powder', 'protein-powder', 'Protein Powder', NULL, 1, '2018-06-11 06:21:12'),
(28, 'Rice', NULL, 'no', NULL, 1, '2018-08-20 02:50:03'),
(29, 'Whole grains', NULL, 'no', NULL, 1, '2018-08-20 05:23:01'),
(30, 'snacks', NULL, 'no', NULL, 1, '2018-08-20 06:33:27'),
(31, 'Misc', NULL, 'no', NULL, 1, '2018-08-20 10:16:41'),
(32, 'Kajal', NULL, 'no', NULL, 1, '2018-08-20 11:07:27'),
(33, 'lipstick', NULL, 'no', NULL, 1, '2018-08-20 11:38:17'),
(34, 'Shampoo', NULL, 'no', NULL, 1, '2018-08-20 11:51:28'),
(35, 'Hair Oil', NULL, 'no', NULL, 1, '2018-08-20 11:57:26'),
(36, 'Seasoning', NULL, 'no', NULL, 1, '2018-08-20 12:31:39'),
(37, 'Herbs', NULL, 'no', NULL, 1, '2018-08-20 12:35:13'),
(38, 'aditya', 'undefined', 'shri', NULL, 0, '2018-08-24 07:23:07'),
(39, 'ee', NULL, 'ee', NULL, 0, '2018-08-24 07:28:14'),
(40, 'dsfds', NULL, 'fdsfds', NULL, 0, '2018-08-24 07:29:46'),
(41, 'dedet', 'undefined', 'dedet', NULL, 0, '2018-09-04 07:45:03'),
(42, 'ccvcxvxv', NULL, 'cxvxcvxcvc', NULL, 0, '2018-09-28 07:06:30'),
(43, 'd', NULL, 'd', NULL, 0, '2018-10-15 09:47:28'),
(44, 'mn', 'undefined', NULL, NULL, 0, '2018-10-15 10:13:31'),
(45, 'jkfkfdjkffhs', 'undefined', NULL, NULL, 0, '2018-10-15 10:43:17');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `state_id` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `state_id`, `city`, `is_deleted`) VALUES
(1, '15', 'Jabalpur', 0),
(2, '14', 'Bhopal', 0),
(3, '15', 'vadodra', 1),
(4, '15', 'vadodra', 1);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` float DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_charges`
--

CREATE TABLE `delivery_charges` (
  `id` int(11) NOT NULL,
  `city_id` int(11) DEFAULT NULL,
  `area` varchar(50) DEFAULT NULL,
  `pin` int(11) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `delivery_charge` float DEFAULT '0' COMMENT 'Delivery charge will be applicable over this row Amount',
  `is_active` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery_charges`
--

INSERT INTO `delivery_charges` (`id`, `city_id`, `area`, `pin`, `amount`, `delivery_charge`, `is_active`) VALUES
(1, 1, 'aditya', 482003, 5000, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `item_brand`
--

CREATE TABLE `item_brand` (
  `id` int(11) NOT NULL,
  `item_master_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item_category`
--

CREATE TABLE `item_category` (
  `id` int(11) NOT NULL,
  `item_master_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_category`
--

INSERT INTO `item_category` (`id`, `item_master_id`, `category_id`, `is_active`) VALUES
(22, 4, 1, 1),
(26, 3, 19, 1),
(30, 8, 1, 1),
(47, 25, 2, 1),
(54, 32, 29, 1),
(66, 43, 3, 1),
(70, 47, 4, 1),
(72, 49, 4, 1),
(74, 51, 4, 1),
(76, 53, 4, 1),
(79, 56, 4, 1),
(80, 57, 4, 1),
(81, 58, 4, 1),
(84, 61, 4, 1),
(90, 67, 7, 1),
(93, 70, 7, 1),
(94, 71, 7, 1),
(95, 72, 7, 1),
(97, 74, 7, 1),
(100, 77, 7, 1),
(103, 80, 7, 1),
(104, 81, 7, 1),
(107, 84, 30, 1),
(109, 86, 30, 1),
(111, 88, 30, 1),
(123, 95, 7, 1),
(126, 98, 7, 1),
(133, 103, 8, 1),
(134, 104, 8, 1),
(141, 111, 9, 1),
(145, 116, 10, 1),
(146, 117, 10, 1),
(147, 118, 10, 1),
(148, 119, 10, 1),
(153, 124, 7, 1),
(158, 129, 8, 1),
(160, 131, 8, 1),
(169, 140, 12, 1),
(173, 144, 14, 1),
(179, 150, 15, 1),
(185, 157, 26, 1),
(186, 158, 26, 1),
(188, 159, 26, 1),
(189, 160, 26, 1),
(190, 161, 26, 1),
(192, 163, 16, 1),
(193, 162, 16, 1),
(194, 164, 16, 1),
(195, 165, 27, 1),
(196, 166, 27, 1),
(197, 167, 7, 1),
(198, 168, 17, 1),
(200, 170, 17, 1),
(201, 171, 17, 1),
(202, 172, 7, 1),
(203, 173, 7, 1),
(204, 174, 7, 1),
(205, 175, 7, 1),
(206, 176, 7, 1),
(207, 177, 7, 1),
(208, 178, 7, 1),
(209, 179, 7, 1),
(217, 185, 25, 1),
(218, 186, 25, 1),
(219, 187, 25, 1),
(220, 188, 25, 1),
(221, 189, 31, 1),
(222, 190, 20, 1),
(223, 191, 20, 1),
(224, 192, 20, 1),
(225, 193, 20, 1),
(226, 194, 20, 1),
(227, 195, 20, 1),
(228, 196, 20, 1),
(229, 197, 20, 1),
(230, 198, 20, 1),
(231, 199, 20, 1),
(232, 200, 20, 1),
(233, 201, 20, 1),
(234, 202, 20, 1),
(235, 203, 20, 1),
(236, 204, 20, 1),
(237, 205, 20, 1),
(238, 206, 32, 1),
(239, 207, 32, 1),
(240, 208, 32, 1),
(241, 209, 32, 1),
(242, 210, 32, 1),
(243, 211, 32, 1),
(244, 212, 32, 1),
(245, 213, 32, 1),
(246, 214, 32, 1),
(247, 215, 32, 1),
(248, 216, 32, 1),
(249, 217, 32, 1),
(251, 218, 33, 1),
(252, 219, 33, 1),
(253, 220, 33, 1),
(254, 221, 33, 1),
(255, 222, 33, 1),
(256, 223, 33, 1),
(257, 224, 33, 1),
(258, 225, 33, 1),
(259, 226, 33, 1),
(260, 227, 33, 1),
(261, 228, 33, 1),
(262, 229, 33, 1),
(263, 230, 33, 1),
(264, 231, 33, 1),
(265, 232, 33, 1),
(266, 233, 33, 1),
(267, 234, 33, 1),
(268, 235, 34, 1),
(269, 236, 34, 1),
(270, 237, 34, 1),
(271, 238, 20, 1),
(272, 239, 20, 1),
(273, 240, 35, 1),
(274, 241, 35, 1),
(277, 244, 22, 1),
(278, 245, 22, 1),
(279, 246, 22, 1),
(280, 247, 22, 1),
(281, 248, 22, 1),
(282, 249, 22, 1),
(283, 250, 22, 1),
(284, 251, 22, 1),
(286, 253, 21, 1),
(287, 254, 23, 1),
(288, 255, 23, 1),
(289, 256, 23, 1),
(290, 257, 23, 1),
(291, 258, 21, 1),
(292, 259, 21, 1),
(293, 260, 23, 1),
(294, 261, 23, 1),
(295, 262, 23, 1),
(296, 263, 23, 1),
(297, 264, 23, 1),
(298, 265, 23, 1),
(299, 266, 23, 1),
(300, 267, 23, 1),
(301, 268, 31, 1),
(316, 12, 1, 1),
(317, 1, 7, 1),
(318, 11, 1, 1),
(319, 10, 1, 1),
(320, 9, 1, 1),
(322, 281, 7, 1),
(323, 280, 7, 1),
(324, 278, 37, 1),
(325, 279, 7, 1),
(327, 274, 37, 1),
(328, 275, 37, 1),
(329, 276, 37, 1),
(330, 277, 37, 1),
(331, 272, 36, 1),
(332, 270, 36, 1),
(333, 271, 36, 1),
(334, 7, 1, 1),
(335, 6, 1, 1),
(337, 22, 28, 1),
(338, 21, 28, 1),
(340, 19, 28, 1),
(341, 18, 28, 1),
(342, 17, 28, 1),
(343, 16, 28, 1),
(346, 15, 1, 1),
(347, 14, 1, 1),
(348, 13, 1, 1),
(349, 31, 29, 1),
(350, 30, 29, 1),
(351, 29, 29, 1),
(352, 28, 29, 1),
(353, 27, 2, 1),
(354, 26, 2, 1),
(355, 24, 2, 1),
(356, 23, 28, 1),
(357, 42, 3, 1),
(358, 41, 3, 1),
(359, 40, 3, 1),
(360, 39, 3, 1),
(361, 38, 3, 1),
(362, 37, 29, 1),
(363, 36, 29, 1),
(364, 35, 29, 1),
(365, 34, 29, 1),
(366, 33, 29, 1),
(367, 52, 4, 1),
(368, 50, 4, 1),
(369, 48, 4, 1),
(370, 46, 4, 1),
(371, 45, 4, 1),
(372, 44, 3, 1),
(373, 62, 5, 1),
(374, 60, 4, 1),
(375, 59, 4, 1),
(376, 55, 4, 1),
(377, 54, 4, 1),
(379, 69, 7, 1),
(380, 68, 7, 1),
(381, 66, 6, 1),
(383, 64, 5, 1),
(384, 63, 5, 1),
(385, 82, 7, 1),
(386, 79, 7, 1),
(388, 78, 7, 1),
(389, 76, 7, 1),
(390, 75, 7, 1),
(391, 73, 7, 1),
(392, 92, 24, 1),
(393, 91, 24, 1),
(394, 90, 24, 1),
(395, 87, 30, 1),
(396, 89, 30, 1),
(397, 83, 30, 1),
(398, 85, 30, 1),
(399, 102, 8, 1),
(400, 101, 8, 1),
(402, 100, 8, 1),
(403, 99, 7, 1),
(404, 97, 7, 1),
(405, 94, 7, 1),
(406, 96, 7, 1),
(407, 93, 24, 1),
(408, 65, 6, 1),
(409, 112, 9, 1),
(410, 110, 9, 1),
(411, 109, 9, 1),
(412, 108, 9, 1),
(413, 107, 9, 1),
(414, 106, 25, 1),
(415, 105, 25, 1),
(416, 122, 7, 1),
(417, 121, 7, 1),
(418, 120, 29, 1),
(419, 115, 10, 1),
(420, 113, 9, 1),
(421, 132, 11, 1),
(424, 126, 7, 1),
(425, 123, 7, 1),
(428, 127, 8, 1),
(429, 130, 8, 1),
(430, 5, 1, 1),
(431, 128, 8, 1),
(432, 125, 8, 1),
(433, 139, 12, 1),
(434, 138, 12, 1),
(435, 137, 12, 1),
(436, 136, 12, 1),
(437, 135, 12, 1),
(438, 134, 13, 1),
(439, 133, 13, 1),
(440, 152, 26, 1),
(441, 151, 15, 1),
(442, 149, 15, 1),
(443, 146, 15, 1),
(444, 142, 14, 1),
(445, 141, 14, 1),
(446, 147, 15, 1),
(447, 148, 15, 1),
(448, 143, 14, 1),
(449, 145, 14, 1),
(450, 169, 17, 1),
(451, 182, 19, 1),
(452, 183, 19, 1),
(453, 180, 19, 1),
(454, 181, 19, 1),
(455, 252, 21, 1),
(457, 243, 22, 1),
(458, 242, 22, 1),
(459, 184, 25, 1),
(460, 153, 26, 1),
(461, 154, 26, 1),
(462, 155, 26, 1),
(463, 156, 26, 1),
(464, 269, 31, 1),
(467, 273, 36, 1),
(471, 282, 7, 1),
(482, 284, 1, 1),
(483, 284, 5, 1),
(484, 284, 9, 1),
(485, 284, 13, 1),
(486, 284, 17, 1),
(493, 283, 1, 1),
(494, 283, 5, 1),
(495, 285, 1, 1),
(496, 285, 2, 1),
(497, 285, 3, 1),
(498, 285, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `item_images`
--

CREATE TABLE `item_images` (
  `id` int(11) NOT NULL,
  `item_master_id` int(11) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_images`
--

INSERT INTO `item_images` (`id`, `item_master_id`, `image`) VALUES
(1, 3, '1534601358_Screenshot tawk.jpg'),
(2, 12, '1534934296_urad dhuli.jpg'),
(3, 2, '1534936223_arhar dal.jpg'),
(4, 1, '1534937737_arhar dal.jpg'),
(5, 11, '1534937931_urad-sabut.jpg'),
(6, 10, '1534938226_mung sabut.jpg'),
(7, 9, '1534938267_mung dhuli.jpg'),
(8, 7, '1534938690_mung chhilka.jpg'),
(9, 6, '1534938725_arhar dal.jpg'),
(12, 22, '1534946210_natural-brown-rice-500x500.png'),
(13, 21, '1534946460_qn.jpg'),
(14, 19, '1535008527_parmal-rice-500x500.jpg'),
(15, 18, '1535008585_Jeera shankar rice.jpg'),
(16, 17, '1535008637_regular basmati rice.jpg'),
(17, 16, '1535008806_pusa basmati.jpg'),
(18, 15, '1535008984_dal-fry-recipe-lentils.jpg'),
(19, 14, '1535009044_pachrangi dal.jpg'),
(20, 13, '1535009077_masur dal.jpg'),
(21, 31, '1535009168_quinoa.jpg'),
(22, 30, '1535009240_moth sabut.jpg'),
(23, 29, '1535009336_moth sabut.jpg'),
(24, 28, '1535009388_rajma.jpg'),
(25, 27, '1535009453_hara chana.jpg'),
(26, 26, '1535009516_desi chana.jpg'),
(27, 24, '1535009572_kabuli chana.jpg'),
(28, 23, '1535009662_brown basmati rice.jpg'),
(29, 42, '1535009697_makka daliya.jpg'),
(30, 41, '1535009721_bajra daliya.JPG'),
(31, 40, '1535009739_barley daliya.jpg'),
(32, 39, '1535009759_khapli wheat daliya.jpg'),
(33, 38, '1535009788_gehu daliya.jpg'),
(34, 37, '1535009804_rajgir.jpg'),
(35, 36, '1535009819_safed matar.jpg'),
(36, 35, '1535009853_hara matar.jpg'),
(37, 34, '1535009873_ragi.jpg'),
(38, 33, '1535009928_2015-07-08-1436374933-6373539-Buckwheat_600_x_450-thumb.jpg'),
(39, 52, '1535009991_bajra aata.jpg'),
(40, 50, '1535010252_ragi aata.jpg'),
(41, 48, '1535010264_besan.jpg'),
(42, 46, '1535010309_Khapli wheat aata.jpg'),
(43, 45, '1535010344_gehu aata.jpg'),
(44, 44, '1535010361_jowar daliya.jpg'),
(45, 62, '1535010431_1200px-Cornflakes_in_bowl.jpg'),
(46, 60, '1535010449_barley aata.jpg'),
(47, 59, '1535010507_amaranthus aata.jpg'),
(48, 55, '1535010547_makka aata.jpg'),
(49, 54, '1535010584_rice aata.jpg'),
(51, 69, '1535010765_mungfali.jpg'),
(52, 68, '1535010868_alsi.jpg'),
(53, 66, '1535011042_wheat-lokwan-250x250.jpg'),
(55, 64, '1535011225_prozis-whey-protein-oats-bar-oats_482x352_13369_46942.jpg'),
(56, 63, '1535011400_wheat flakes.jpg'),
(57, 82, '1535011442_Saunf.jpg'),
(58, 79, '1535011480_kali mirch.jpg'),
(59, 78, '1535011517_til.jpg'),
(60, 76, '1535011556_rai.jpg'),
(61, 75, '1535011583_jeera powder.jpg'),
(62, 73, '1535011601_jeera.jpg'),
(63, 92, '1535011710_akhrot.jpg'),
(64, 91, '1535011741_kaju.jpg'),
(65, 90, '1535011762_kishmish.jpg'),
(66, 87, '1535012164_suji-1500899557-lb.jpg'),
(67, 89, '1535012191_Bean-pasta-category-emerges-with-protein-fiber-gluten-free-options.jpg'),
(68, 83, '1535012338_1-500x500.jpg'),
(69, 85, '1535012377_organic-red-poha-500x500.png'),
(70, 102, '1535012515_jaggery deccan.jpg'),
(71, 101, '1535012611_jaggery powder deccan.png'),
(72, 100, '1535012636_jaggery powder.jpg'),
(73, 100, '1535012647_jaggery powder.jpg'),
(74, 99, '1535012677_tej patta.jpg'),
(75, 97, '1535012752_long.jpg'),
(76, 94, '1535012778_ilaichi.jpg'),
(77, 96, '1535012827_ilaichi pure & sure.jpg'),
(78, 93, '1535012848_badam.jpg'),
(79, 65, '1535016702_sharbati Wheat.jpg'),
(80, 112, '1535016743_castor oil.jpg'),
(81, 110, '1535017146_sesame oil.jpg'),
(82, 109, '1535017272_groundnut oil.jpg'),
(83, 108, '1535017397_sunflower oil.jpg'),
(84, 107, '1535017472_mustard oil.jpg'),
(85, 106, '1535017667_Green-tea-extract-supplements-may-improve-lipid-levels-for-women_wrbm_large.jpg'),
(86, 105, '1535017755_30-kg-ctc-tea-500x500.jpg'),
(87, 122, '1535017927_turmeric powder.jpg'),
(88, 121, '1535018258_chilli powder.jpg'),
(89, 120, '1535018362_sprout mix.jpg'),
(90, 115, '1535018502_honey.jpg'),
(91, 113, '1535018536_extra virgin coconut oil.jpg'),
(92, 114, '1535018558_extra virgin coconut oil pure & sure.jpg'),
(93, 132, '1535018750_Kodo-Millet-Rice-bowl-600.jpg'),
(96, 126, '1535019410_fenugreek.jpg'),
(97, 123, '1535019567_coriander powder.jpg'),
(100, 127, '1535020185_white sugar.jpg'),
(101, 130, '1535020238_palm sugar.jpg'),
(102, 5, '1535020937_chana-dal-500x500-500x500.jpg'),
(103, 128, '1535021029_brown sugar.jpg'),
(104, 125, '1535021096_cottage sugar.jpg'),
(105, 20, '1535021674_chinnorrice-500x500-500x500.png'),
(106, 139, '1535021775_wheat grass powder.jpeg'),
(107, 138, '1535021841_triphala powder.jpg'),
(108, 137, '1535021878_triphala juice.png'),
(109, 136, '1535021935_amla powder.jpg'),
(110, 135, '1535021962_aloevera juice.jpg'),
(111, 134, '1535022109_gir cow ghee.jpg'),
(112, 133, '1535022147_cow ghee.jpg'),
(113, 152, '1535022261_chanajor.jpg'),
(114, 151, '1535022550_lemon pickle.jpg'),
(115, 149, '1535022602_green chilli pickle.jpg'),
(116, 146, '1535022681_mango pickle.jpg'),
(117, 142, '1535023083_pineapple jam.jpg'),
(118, 141, '1535023146_mango jam.jpg'),
(119, 147, '1535023540_lemon pickle1.jpg'),
(120, 148, '1535023862_8_garlic_pickle.jpg'),
(121, 143, '1535025509_apple jam.jpg'),
(122, 145, '1535025691_mix fruit jam.jpg'),
(123, 169, '1535025891_rock salt deccan.jpg'),
(124, 182, '1535026100_81YeEWJyM-L._SL1500_.jpg'),
(125, 183, '1535026181_rava idli mix.jpg'),
(126, 180, '1535026359_81ImTkJDQBL._SX522_.jpg'),
(127, 181, '1535026492_91nXnlS3HQL._AC_UL320_SR256,320_.jpg'),
(128, 252, '1535026878_organic henna powder.jpg'),
(129, 243, '1535027128_sunab-natural-dark-brown-500x500.jpg'),
(130, 242, '1535027510_sunab soft black hair color.jpg'),
(131, 184, '1535027762_coffee powder smooth.jpg'),
(132, 153, '1535027955_mungjor.jpg'),
(133, 154, '1535027996_chakli.jpg'),
(134, 155, '1535028066_nippat.jpg'),
(135, 156, '1535028129_kodbale.jpg'),
(136, 269, '1535028253_chyawanprash.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `item_master`
--

CREATE TABLE `item_master` (
  `id` int(10) UNSIGNED NOT NULL,
  `popularity` int(11) NOT NULL DEFAULT '10',
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext,
  `usage` longtext,
  `specifcation` longtext,
  `ingredients` longtext,
  `nutrients` longtext,
  `delivery` varchar(255) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `meta_tag` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `created_time` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_master`
--

INSERT INTO `item_master` (`id`, `popularity`, `name`, `description`, `usage`, `specifcation`, `ingredients`, `nutrients`, `delivery`, `is_active`, `meta_tag`, `meta_keyword`, `meta_description`, `created_time`) VALUES
(1, 10, 'Arhar Daal Chhilka', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', NULL, 1, NULL, NULL, NULL, '2018-08-18 13:47:03'),
(2, 10, 'Arhar Daal  Gold', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-18 14:01:27'),
(3, 10, 'Suhana Paneer Butter Masala', NULL, NULL, NULL, 'Salt, Sugar', NULL, NULL, 0, NULL, NULL, NULL, '2018-08-18 14:09:18'),
(4, 10, 'Taaza Salt', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2018-08-18 14:13:42'),
(5, 10, 'Chana Daal', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-19 14:59:53'),
(6, 10, 'Arhar dal Clean', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-19 17:05:24'),
(7, 10, 'Mung Chhilka', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-19 17:08:14'),
(8, 10, 'Mung Chhilka', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2018-08-19 17:08:26'),
(9, 10, 'Mung Dhuli', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-19 17:11:29'),
(10, 10, 'Mung Sabut', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-19 17:13:42'),
(11, 10, 'Urad Sabut', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 02:33:06'),
(12, 10, 'Urad Dhuli', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 02:35:54'),
(13, 10, 'Masur', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 02:38:30'),
(14, 10, 'Pachrangi Daal', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2018-08-20 02:40:02'),
(15, 10, 'mix Daal', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 02:41:16'),
(16, 10, 'Pusa basmati', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 02:56:35'),
(17, 10, 'regular basmati', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 02:58:17'),
(18, 10, 'Jeera shankar', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 03:00:00'),
(19, 10, 'Parmal', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 03:01:28'),
(20, 10, 'chinnor', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 03:02:32'),
(21, 10, 'sangmarmari', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 03:04:18'),
(22, 10, 'Brown Rice', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 03:05:43'),
(23, 10, 'brown basmati Rice', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 03:07:54'),
(24, 10, 'Kabuli Chana', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 03:20:51'),
(25, 10, 'Kabuli Chana (Deccan)', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2018-08-20 03:21:42'),
(26, 10, 'Desi Chana', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 03:24:21'),
(27, 10, 'Hara Chana', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 03:26:12'),
(28, 10, 'Rajma', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 05:24:47'),
(29, 10, 'Moth sabut', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 05:27:41'),
(30, 10, 'Moth Sabut', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2018-08-20 05:29:25'),
(31, 10, 'Quinoa', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 05:33:30'),
(32, 10, 'Quinoa (Deccan)', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 05:34:23'),
(33, 10, 'Buckwheat', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 05:35:17'),
(34, 10, 'Ragi', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 05:36:11'),
(35, 10, 'Hara Matar', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 05:37:24'),
(36, 10, 'Safed Matar', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 05:38:08'),
(37, 10, 'Rajgir', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 05:39:40'),
(38, 10, 'Gehu Daliya', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 05:42:06'),
(39, 10, 'Khapli Wheat Daliya', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 05:43:19'),
(40, 10, 'Barley Daliya', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 05:45:12'),
(41, 10, 'Bajra Daliya', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 05:47:25'),
(42, 10, 'Makka Daliya', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 05:48:04'),
(43, 10, 'Makka Daliya  (Deccan)', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 05:48:41'),
(44, 10, 'Jowar Daliya', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 05:49:15'),
(45, 10, 'Gehu Aata', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 05:50:11'),
(46, 10, 'Khapli Wheat Aata', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 05:51:00'),
(47, 10, 'Gehu Aata', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 05:52:05'),
(48, 10, 'Besan', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 05:52:58'),
(49, 10, 'Besan( Deccan)', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 05:54:12'),
(50, 10, 'Ragi Aata', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 05:56:00'),
(51, 10, 'Sprouted Ragi Aata', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 05:56:34'),
(52, 10, 'Bajra Aata', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 05:58:02'),
(53, 10, 'Bajra Aata (Deccan)', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 05:59:23'),
(54, 10, 'Rice Aata', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 06:00:02'),
(55, 10, 'Makka aata', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 06:00:42'),
(56, 10, 'Makka aata (Deccan)', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 06:01:23'),
(57, 10, 'Sorghum Aata', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 06:02:02'),
(58, 10, 'Jowar Aata  (Deccan)', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 06:02:53'),
(59, 10, 'Amaranthus Aata', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 06:03:34'),
(60, 10, 'Barley Aata', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 06:04:13'),
(61, 10, 'Barley Aata (Deccan)', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 06:04:51'),
(62, 10, 'Corn Flakes', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 06:05:37'),
(63, 10, 'Wheat Flakes', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 06:06:14'),
(64, 10, 'Oats', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 06:07:07'),
(65, 10, 'Sharbati Wheat', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 06:07:48'),
(66, 10, 'Lokman Wheat', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2018-08-20 06:08:34'),
(67, 10, 'Alsi Raw', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 06:09:41'),
(68, 10, 'Alsi Roasted', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 06:10:53'),
(69, 10, 'Mung fali', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 06:12:18'),
(70, 10, 'Ajwain', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2018-08-20 06:13:04'),
(71, 10, 'Ajwain  (Deccan)', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 06:13:54'),
(72, 10, 'Ajwain', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2018-08-20 06:14:44'),
(73, 10, 'Jeera', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 06:17:14'),
(74, 10, 'Jeera (Deccan)', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 06:18:05'),
(75, 10, 'Jeera Powder', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 06:19:32'),
(76, 10, 'Rai', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 06:20:35'),
(77, 10, 'Rai (Deccan)', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 06:21:12'),
(78, 10, 'Til', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 06:22:25'),
(79, 10, 'Kali Mirch', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 06:23:21'),
(80, 10, 'Saunf', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 06:24:06'),
(81, 10, 'Saunf (Deccan)', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 06:25:06'),
(82, 10, 'Saunf', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 06:26:34'),
(83, 10, 'White Poha', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 06:34:20'),
(84, 10, 'White Poha (Deccan)', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2018-08-20 06:35:07'),
(85, 10, 'Brown Poha', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 06:38:01'),
(86, 10, 'Brown Poha (Deccan)', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 06:39:30'),
(87, 10, 'Suji', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 06:41:26'),
(88, 10, 'Suji (Deccan)', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 06:44:08'),
(89, 10, 'Pasta', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 06:45:49'),
(90, 10, 'Kishmish', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 06:48:38'),
(91, 10, 'Kaju', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 06:50:23'),
(92, 10, 'Akhrot', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 06:51:56'),
(93, 10, 'Badam', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 06:53:33'),
(94, 10, 'Ilaichi', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 06:54:30'),
(95, 10, 'Ilaichi  (Deccan)', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 06:55:25'),
(96, 10, 'Ilaichi (Pure & Sure)', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 06:56:04'),
(97, 10, 'Long', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 06:57:15'),
(98, 10, 'Long (Deccan)', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 06:58:05'),
(99, 10, 'Tejpatta', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 07:01:05'),
(100, 10, 'Jaggery Powder', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 07:02:03'),
(101, 10, 'Jaggery Powder (Deccan)', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 07:03:32'),
(102, 10, 'Jaggerey Cube', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 07:04:28'),
(103, 10, 'Jaggery Ginger Flavour', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 07:06:01'),
(104, 10, 'Jaggery Cardamum Flavour', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 07:07:00'),
(105, 10, 'CTC Tea', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 07:09:38'),
(106, 10, 'Green Tea', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 07:12:46'),
(107, 10, 'Mustard Oil', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 07:14:26'),
(108, 10, 'Sunflower Oil', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 07:15:59'),
(109, 10, 'Groundnut Oil', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 07:17:35'),
(110, 10, 'Seasame Oil', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 07:19:16'),
(111, 10, 'Seasame Oil (Deccan)', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 07:20:21'),
(112, 10, 'Castor Oil', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 07:21:10'),
(113, 10, 'Extra virgin coconut oil', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 07:25:20'),
(114, 10, 'Extra virgin coconut oil  (Pure & Sure)', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 07:26:10'),
(115, 10, 'Honey', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 07:27:10'),
(116, 10, 'Mint Honey  (Sanjivani)', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2018-08-20 07:28:08'),
(117, 10, 'Holy Basil Honey   (Sanjivani)', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 07:29:02'),
(118, 10, 'Masala Honey   (Sanjivani)', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 07:29:39'),
(119, 10, 'Van Tulsi Honey   (Sanjivani)', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 07:30:35'),
(120, 10, 'Sprout Mix', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 07:31:13'),
(121, 10, 'Chilli Powder', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 07:32:23'),
(122, 10, 'Turmeric Powder', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 07:33:50'),
(123, 10, 'Coriander Powder', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 07:35:25'),
(124, 10, 'Fenugreek', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2018-08-20 07:36:55'),
(125, 10, 'Sugar cottage', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 07:39:30'),
(126, 10, 'Fenugreek', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 07:42:43'),
(127, 10, 'Sugar white', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 07:44:04'),
(128, 10, 'Sugar brown (Deccan)', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 07:45:04'),
(129, 10, 'Sugar coconut  (Pure & Sure)', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 07:46:16'),
(130, 10, 'Sugar palm   (Pure & Sure)', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 07:46:57'),
(131, 10, 'Sugar sulpher free   (Deccan)', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 07:48:46'),
(132, 10, 'Millet kodo', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 07:49:39'),
(133, 10, 'cow ghee', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 07:51:02'),
(134, 10, 'gir cow ghee  (Deccan)', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2018-08-20 07:51:56'),
(135, 10, 'Aloevera Juice', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 07:53:07'),
(136, 10, 'Amla Powder', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 07:55:05'),
(137, 10, 'Triphala  juice', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 07:56:19'),
(138, 10, 'Triphala  powder', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 07:58:03'),
(139, 10, 'Wheat Grass Powder', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 07:58:38'),
(140, 10, 'Vinegar sugar cane', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 07:59:35'),
(141, 10, 'Jam mango', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 08:00:36'),
(142, 10, 'Jam pineapple', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 08:01:28'),
(143, 10, 'Jam apple', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 08:02:17'),
(144, 10, 'Jam orange', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 08:03:04'),
(145, 10, 'Jam Mix fruit', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 08:03:40'),
(146, 10, 'Pickle mango', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 08:05:12'),
(147, 10, 'Pickle lemon', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 08:06:05'),
(148, 10, 'Pickle garlic', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 08:06:51'),
(149, 10, 'Pickle Green chilli', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 08:07:38'),
(150, 10, 'Pickle Mix', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2018-08-20 08:08:24'),
(151, 10, 'Pickle sweet lemon', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 08:10:10'),
(152, 10, 'chana jor', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 08:12:36'),
(153, 10, 'mung jor', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 08:15:35'),
(154, 10, 'chakli', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 08:17:02'),
(155, 10, 'nippat', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 08:17:58'),
(156, 10, 'kodbale', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 08:18:57'),
(157, 10, 'blue berry chia bar', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 08:23:02'),
(158, 10, 'raspberry chia bar', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 08:24:49'),
(159, 10, 'wild berry chia bar', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 08:34:38'),
(160, 10, 'Amla Candy  spicy', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 08:35:38'),
(161, 10, 'Amla Candy sweet', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 08:37:46'),
(162, 10, 'Preserves kiwi', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 09:36:41'),
(163, 10, 'Preserves grape & beetroot', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 09:38:25'),
(164, 10, 'Preserves strawberry', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 09:39:53'),
(165, 10, 'Protein Powder cocoa safron', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 09:41:44'),
(166, 10, 'Protein Powder vanila', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 09:42:56'),
(167, 10, 'Heeng', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 09:43:50'),
(168, 10, 'Salt Himalayan rock', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 09:44:34'),
(169, 10, 'Salt rock salt   (Deccan)', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 09:45:16'),
(170, 10, 'Salt Himalayan pink  (Deccan)', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 09:46:25'),
(171, 10, 'Salt black salt   (Deccan)', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 09:47:40'),
(172, 10, 'Kasuri Methi', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 09:48:40'),
(173, 10, 'Garam Masala', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 09:49:38'),
(174, 10, 'Moringa Powder', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 09:51:08'),
(175, 10, 'Moringa Powder', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 09:51:15'),
(176, 10, 'Sambhar Powder', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 09:53:14'),
(177, 10, 'Chana Masala', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 09:54:04'),
(178, 10, 'Pavbhaji Masala', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 09:55:34'),
(179, 10, 'Rasam Powder', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 09:58:05'),
(180, 10, 'Ragi Dosa mix', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 09:59:35'),
(181, 10, 'Rice dosa mix', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 10:01:37'),
(182, 10, 'Rice idli mix', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 10:04:00'),
(183, 10, 'Rava idli mix', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 10:11:31'),
(184, 10, 'Coffee smooth filter', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 10:12:33'),
(185, 10, 'Coffee bold filter', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 10:13:21'),
(186, 10, 'Coffee bold filter', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2018-08-20 10:13:29'),
(187, 10, 'Coffee bold filter', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2018-08-20 10:13:34'),
(188, 10, 'Coffee decoction bold', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 10:14:56'),
(189, 10, 'Coconut Milk', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 10:17:32'),
(190, 10, 'mousturising gel', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 10:22:09'),
(191, 10, 'Apricot moisturiser', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 10:23:17'),
(192, 10, 'face scrub', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 10:24:47'),
(193, 10, 'sun protection cream', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 10:26:01'),
(194, 10, 'Anti ageing body oil', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 10:27:29'),
(195, 10, 'cleansing lotion', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 10:29:37'),
(196, 10, 'Anti wrinkle cream', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 10:30:29'),
(197, 10, 'under eye gel', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 10:32:08'),
(198, 10, 'hair conditioner', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 10:33:28'),
(199, 10, 'hand & foot cream', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 10:34:10'),
(200, 10, 'nourishing cream', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 10:34:57'),
(201, 10, 'lip balm', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 10:36:13'),
(202, 10, 'indian rose face wash', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 10:36:58'),
(203, 10, 'nutgrass face wash', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 10:37:48'),
(204, 10, 'Kit hair care', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 11:04:50'),
(205, 10, 'Kit mountain essential', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 11:06:44'),
(206, 10, 'Kajal fern green 001', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 11:09:50'),
(207, 10, 'Kajal moss velvet 002', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 11:11:59'),
(208, 10, 'Kajal grey glow 004', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 11:12:52'),
(209, 10, 'Kajal true blue 005', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 11:13:35'),
(210, 10, 'Kajal mood indigo 006', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 11:15:05'),
(211, 10, 'Kajal rich loam 007', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 11:16:10'),
(212, 10, 'Kajal purple haze 008', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 11:32:36'),
(213, 10, 'Kajal copper tint 009', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 11:33:30'),
(214, 10, 'Kajal 24 carat 010', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 11:34:13'),
(215, 10, 'Kajal pure black 011', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 11:34:52'),
(216, 10, 'Kajal violet bainganee 012', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 11:35:48'),
(217, 10, 'Kajal robusta brown 013', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 11:36:39'),
(218, 10, 'Lipstick copper mine 213', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 11:37:35'),
(219, 10, 'Lipstick Nude pink 500', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 11:39:05'),
(220, 10, 'Lipstick glistening loam 511', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 11:39:51'),
(221, 10, 'Lipstick glowing violet 513', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 11:40:32'),
(222, 10, 'Lipstick iced plum 520', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 11:41:09'),
(223, 10, 'Lipstick ruspberry crush 640', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 11:42:21'),
(224, 10, 'Lipstick candy floss 636', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 11:43:06'),
(225, 10, 'Lipstick ruspberry crush 640', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 11:43:39'),
(226, 10, 'Lipstick sunshine 655', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 11:44:31'),
(227, 10, 'Lipstick rich earth 777', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 11:45:04'),
(228, 10, 'Lipstick Java Brown 810', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 11:45:43'),
(229, 10, 'Lipstick wild honey 811', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 11:46:27'),
(230, 10, 'Lipstick true brick 813', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 11:46:59'),
(231, 10, 'Lipstick cantaloupe 817', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 11:47:58'),
(232, 10, 'Lipstick Deep blush 820', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 11:49:22'),
(233, 10, 'Lipstick coral pink 904', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 11:50:00'),
(234, 10, 'Lipstick cocoa rich 906', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 11:50:36'),
(235, 10, 'Triphala Revitalising Shampoo', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 11:52:40'),
(236, 10, 'Licorice Hair repair shampoo', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 11:53:32'),
(237, 10, 'Anti dandruff shampoo', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 11:54:22'),
(238, 10, 'Hair & body wash', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 11:55:25'),
(239, 10, 'shower gel', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 11:56:37'),
(240, 10, 'Nourishing hair oil', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 11:58:19'),
(241, 10, 'Revitalising hair oil', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 11:59:40'),
(242, 10, 'Hair Colors Sunab soft blck', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 12:01:23'),
(243, 10, 'Hair Colors sunab dark brown', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 12:02:05'),
(244, 10, 'Hair Colors sunab brown', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 12:03:24'),
(245, 10, 'Hair Colors Organic mahogany', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 12:04:21'),
(246, 10, 'Hair Colors organic brown', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2018-08-20 12:05:11'),
(247, 10, 'Hair Colors Organic dark brown', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2018-08-20 12:06:21'),
(248, 10, 'Hair Colors Natural brown', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 12:08:34'),
(249, 10, 'Hair Colors Natural Dark Brown', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 12:09:30'),
(250, 10, 'Hair Colors Natural Burgundy', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 12:11:05'),
(251, 10, 'Hair Colors Natural Black henna', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 12:11:48'),
(252, 10, 'Organic henna', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 12:13:18'),
(253, 10, 'Natural henna', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2018-08-20 12:14:15'),
(254, 10, 'Indigo leaf powder', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2018-08-20 12:15:04'),
(255, 10, 'neem powder', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2018-08-20 12:15:48'),
(256, 10, 'reetha powder', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2018-08-20 12:16:27'),
(257, 10, 'amla powder', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2018-08-20 12:17:45'),
(258, 10, 'Natural henna', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2018-08-20 12:20:09'),
(259, 10, 'Natural henna', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 12:20:55'),
(260, 10, 'Indigo leaf powder', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 12:21:42'),
(261, 10, 'neem powder', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 12:22:18'),
(262, 10, 'reetha powder', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 12:22:59'),
(263, 10, 'amla powder', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 12:23:37'),
(264, 10, 'hair treatment powder', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 12:24:12'),
(265, 10, 'bhringraj powder', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 12:24:52'),
(266, 10, 'shikakai powder', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 12:25:35'),
(267, 10, 'bramhi powder', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 12:26:16'),
(268, 10, 'Desiccated Coconut', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 12:26:54'),
(269, 10, 'Chyawanprash', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 12:27:53'),
(270, 10, 'Seasoning  Chicken', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 12:32:36'),
(271, 10, 'Seasoning  Steak', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 12:33:18'),
(272, 10, 'Seasoning   Italian', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 12:34:01'),
(273, 10, 'Seasoning  Seafood', 'no', NULL, NULL, NULL, NULL, 'yes', 1, NULL, NULL, NULL, '2018-08-20 12:34:38'),
(274, 10, 'Herbs Chilli Flakes', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 12:36:06'),
(275, 10, 'Herbs Basil', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 12:36:57'),
(276, 10, 'Herbs Parsley', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 12:37:41'),
(277, 10, 'Herbs Oregano', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 12:38:26'),
(278, 10, 'Herbs Rosemary', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 12:39:01'),
(279, 10, 'Chat Masala', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 12:40:09'),
(280, 10, 'Sabji Masala', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 12:40:54'),
(281, 10, 'Chicken Masala', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 12:41:32'),
(282, 10, 'Meat Masala', '<span style=\"font-weight: bold; color: rgb(0, 255, 0);\">Meat </span><span style=\"font-weight: bold; color: rgb(0, 0, 0);\">Masala</span>', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2018-08-20 12:42:04'),
(283, 10, 'rr', 'rr', NULL, 'r', 'r', 'r', '2', 1, '2', '2', '2', '2018-08-24 13:23:25'),
(284, 10, 'anand one', '<span style=\"font-weight: bold; color: rgb(0, 255, 255);\">gdfgdfgdfgdfgdfgdfg</span>', 'fghfg', 'fhfh', 'fhfgh', 'hfghf', 'gdfgd', 1, 'dfgdfg', 'gdfgd', 'fgdfg', '2018-09-01 19:16:25'),
(285, 10, '333', '333', 'no', 'no', 'no', 'no', NULL, 1, NULL, NULL, NULL, '2018-10-15 18:21:48');

-- --------------------------------------------------------

--
-- Table structure for table `item_meta`
--

CREATE TABLE `item_meta` (
  `id` int(11) NOT NULL,
  `meta_tag` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `item_master_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item_price`
--

CREATE TABLE `item_price` (
  `id` int(11) NOT NULL,
  `item_master_id` int(11) DEFAULT NULL,
  `unit` varchar(20) DEFAULT NULL,
  `weight` varchar(20) DEFAULT NULL,
  `cost_price` float DEFAULT '0',
  `price` float DEFAULT '0',
  `spl_price` float NOT NULL DEFAULT '0',
  `qty` float DEFAULT NULL,
  `product_id` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_price`
--

INSERT INTO `item_price` (`id`, `item_master_id`, `unit`, `weight`, `cost_price`, `price`, `spl_price`, `qty`, `product_id`) VALUES
(5, 3, '180', 'Gms', 40, 40, 0, 10, '12345'),
(6, 4, '500', 'Gms', 20, 18, 0, 20, '123'),
(12, 8, '500', 'Gms', 64, 90, 0, 39, '3003013'),
(43, 25, '500', 'Gms', 105, 140, 0, 4, '5008013'),
(51, 32, '500', 'Gms', 232, 290, 0, 4, '8906076830942'),
(63, 43, '500', 'Gms', 42, 55, 0, 0, '8906076831048'),
(67, 47, '5', 'Kg', 160, 200, 0, 7, '3017015'),
(69, 49, '500', 'Gms', 75, 100, 0, 3, '8906076830324'),
(71, 51, '500', 'Gms', 57, 75, 0, 3, '8906076830409'),
(73, 53, '500', 'Gms', 42, 55, 0, 6, '890606831130'),
(76, 56, '500', 'Gms', 30, 40, 0, 0, '890676831147'),
(77, 57, '500', 'Gms', 39, 48, 0, 13, '3017083'),
(78, 58, '500', 'Gms', 49, 65, 0, 4, '890607683116'),
(81, 61, '500', 'Gms', 49, 65, 0, 6, '8906076831123'),
(87, 67, '100', 'Gms', 36, 44, 0, 36, '3020011'),
(88, 67, '250', 'Kg', 83, 110, 0, 10, '3020012'),
(92, 70, '100', 'Gms', 48, 60, 0, 10, '3022011'),
(93, 71, '100', 'Gms', 49, 65, 0, 8, '8906076830294'),
(94, 72, '250', 'Gms', 120, 150, 0, 2, '3022012'),
(99, 74, '100', 'Gms', 49, 65, 0, 7, '8906076830171'),
(104, 77, '200', 'Gms', 36, 45, 0, 5, '8906076830263'),
(107, 80, '100', 'Gms', 26, 32, 0, 25, '3028011'),
(108, 81, '100', 'Gms', 34, 45, 0, 6, '8906076830287'),
(112, 84, '500', 'Gms', 49, 65, 0, 8, '8906076830157'),
(114, 86, '500', 'Gms', 53, 70, 0, 8, '8906076830386'),
(116, 88, '500', 'Gms', 36, 48, 0, 4, '8906076830140'),
(126, 95, '50', 'Gms', 158, 210, 0, 3, '8906076830232'),
(130, 98, '50', 'Gms', 143, 190, 0, 10, '8906076830249'),
(135, 103, '1', 'Kg', 0, 0, 0, 0, '5039033'),
(136, 104, '1', 'Kg', 120, 150, 0, 6, '8906076830706'),
(145, 111, '500', 'ml', 154, 192, 0, 0, '5042043'),
(150, 116, '250', 'ml', 131, 174, 0, 0, '8043022'),
(151, 117, '250', 'ml', 131, 174, 0, 0, '8043032'),
(152, 118, '250', 'ml', 131, 174, 0, 0, '8043042'),
(153, 119, '250', 'ml', 131, 174, 0, 0, '8043052'),
(161, 124, '100', 'Gms', 32, 40, 0, 3, '3048011'),
(162, 124, '250', 'Gms', 24, 30, 0, 8, '3048012'),
(169, 129, '500', 'Gms', 270, 360, 0, 2, '8906047001159'),
(171, 131, '500', 'Gms', 52, 72, 0, 27, '8906076830447'),
(180, 140, '100', 'ml', 48, 60, 0, 6, '3056011'),
(184, 144, '250', 'Gms', 152, 190, 0, 5, '8906066851636'),
(190, 150, '350', 'Gms', 132, 165, 0, 1, '8058051'),
(201, 157, '40', 'Gms', 120, 149, 0, 0, '8906066851704'),
(202, 158, '40', 'Gms', 120, 149, 0, 0, '8906066851728'),
(203, 159, '40', 'Gms', 120, 149, 0, 20, '8906066851711'),
(204, 160, '200', 'Gms', 81, 108, 0, 20, '8059096'),
(205, 161, '200', 'Gms', 81, 108, 0, 0, '8059106'),
(206, 162, '200', 'Gms', 288, 360, 0, 0, '3060016'),
(207, 163, '200', 'Gms', 288, 360, 0, 0, '3060026'),
(208, 164, '200', 'Gms', 288, 360, 0, 1, '3060036'),
(209, 165, '150', 'Gms', 340, 425, 0, 0, '3061015'),
(210, 166, '150', 'Gms', 360, 425, 0, 4, '3061025'),
(211, 167, '50', 'Gms', 68, 85, 0, 7, '8906066851179'),
(212, 168, '500', 'Gms', 31, 38, 0, 1, '8906066851216'),
(214, 170, '500', 'Gms', 43, 59, 0, 0, '8906076830492'),
(215, 171, '500', 'Gms', 40, 55, 0, 0, '8906076830485'),
(216, 172, '500', 'Gms', 24, 30, 0, 1, '8906066851513'),
(217, 173, '100', 'Gms', 68, 85, 0, 1, '8906047000084'),
(218, 174, '100', 'Gms', 169, 200, 0, 1, '8906047001135'),
(219, 175, '100', 'Gms', 169, 200, 0, 1, '8906047001135'),
(220, 176, '100', 'Gms', 47, 55, 0, 5, '8906047000107'),
(221, 177, '100', 'Gms', 55, 65, 0, 1, '8906047000565'),
(222, 178, '100', 'Gms', 65, 76, 0, 2, '8906047000558'),
(223, 179, '100', 'Gms', 44, 54, 0, 0, '8906047000091'),
(229, 188, '160', 'ml', 80, 100, 0, 1, '8906047001715'),
(230, 189, '160', 'ml', 68, 80, 0, 1, '8906047001036'),
(231, 190, '40', 'ml', 360, 450, 0, 1, '8906026912452'),
(232, 191, '200', 'ml', 360, 450, 0, 1, '8906026910892'),
(233, 192, '100', 'ml', 280, 350, 0, 1, '8906026912421'),
(234, 193, '100', 'Gms', 520, 650, 0, 1, '8906026912438'),
(235, 194, '120', 'Gms', 432, 540, 0, 1, '8906026910953'),
(236, 195, '150', 'Gms', 316, 395, 0, 1, '8906026910948'),
(237, 196, '60', 'ml', 476, 595, 0, 1, '8906026910915'),
(238, 197, '40', 'Gms', 428, 575, 0, 1, '8906026912469'),
(239, 198, '100', 'Gms', 261, 350, 0, 1, '8906026911028'),
(240, 199, '100', 'Gms', 316, 395, 0, 1, '8906026912445'),
(241, 200, '60', 'Gms', 420, 525, 0, 1, '8906026912247'),
(242, 201, '3.5', 'Gms', 220, 295, 0, 1, '8906026911066'),
(243, 202, '120', 'ml', 300, 375, 0, 1, '8906026911042'),
(244, 203, '120', 'ml', 300, 375, 0, 1, '8906026911035'),
(245, 204, '1', 'piece', 236, 295, 0, 1, '890602691'),
(246, 205, '1', 'piece', 460, 575, 0, 1, '6076021'),
(247, 206, '1', 'piece', 221, 350, 0, 1, '8906026911219'),
(248, 207, '1', 'piece', 221, 350, 0, 1, '8906026911226'),
(249, 208, '1', 'piece', 221, 350, 0, 1, '8906026911233'),
(250, 209, '1', 'piece', 221, 350, 0, 1, '8906026911240'),
(251, 210, '1', 'piece', 221, 350, 0, 1, '8906026911257'),
(252, 211, '1', 'piece', 221, 350, 0, 1, '890602691'),
(253, 212, '1', 'piece', 221, 350, 0, 1, '8906026911271'),
(254, 213, '1', 'piece', 221, 350, 0, 1, '8906026911288'),
(255, 214, '1', 'piece', 221, 350, 0, 2, '890602691'),
(256, 215, '1', 'piece', 221, 350, 0, 1, '8906026911301'),
(257, 216, '1', 'piece', 221, 350, 0, 1, '8906026911325'),
(258, 217, '1', 'piece', 221, 350, 0, 1, '890602691'),
(259, 218, '1', 'ml', 409, 550, 0, 1, '8906026911905'),
(260, 219, '1', NULL, 409, 550, 0, 1, '8906026911912'),
(261, 220, '1', 'piece', 409, 550, 0, 1, '8906026911929'),
(262, 221, '1', 'piece', 409, 550, 0, 1, '8906026911936'),
(263, 222, '1', 'piece', 409, 550, 0, 1, '8906026911943'),
(264, 223, '1', 'piece', 409, 550, 0, 1, '8906026912087'),
(265, 224, '1', 'piece', 409, 550, 0, 1, '8906026912100'),
(266, 225, '1', 'piece', 409, 550, 0, 1, '8906026912087'),
(267, 226, '1', 'piece', 409, 550, 0, 1, '8906026911967'),
(268, 227, '1', 'piece', 409, 550, 0, 1, '8906026911974'),
(269, 228, '1', 'piece', 409, 550, 0, 1, '8906026911998'),
(270, 229, '1', 'piece', 409, 550, 0, 1, '8906026912001'),
(271, 230, '1', 'piece', 409, 550, 0, 1, '8906026912018'),
(272, 231, '1', 'piece', 409, 550, 0, 4, '8906026912063'),
(273, 232, '1', 'piece', 409, 550, 0, 5, '8906026912025'),
(274, 233, '1', 'piece', 409, 550, 0, 6, '8906026912032'),
(275, 234, '1', 'piece', 409, 550, 0, 2, '8906026912049'),
(276, 235, '250', 'ml', 354, 475, 0, 4, '8906026910908'),
(277, 236, '250', 'ml', 428, 575, 0, 3, '8906026910960'),
(278, 237, '250', 'ml', 391, 525, 0, 2, '8906026911097'),
(279, 238, '300', 'ml', 391, 525, 0, 3, '8906026912230'),
(280, 239, '300', 'ml', 372, 500, 0, 5, '8906026910939'),
(281, 240, '120', 'ml', 409, 525, 0, 6, '8906026911059'),
(282, 241, '120', 'ml', 354, 575, 0, 1, '8906026911011'),
(285, 244, '100', 'Gms', 815, 1150, 0, 1, '8902670021625'),
(286, 245, '100', 'Gms', 495, 699, 0, 4, '8902670020147'),
(287, 246, '100', 'Gms', 460, 699, 0, 0, '8902670020161'),
(288, 247, '100', 'Gms', 495, 699, 0, 4, '8902670020109'),
(289, 248, '60', 'Gms', 82, 115, 0, 0, '8902670021038'),
(290, 249, '60', 'Gms', 82, 115, 0, 1, '8902670021021'),
(291, 250, '60', 'Gms', 82, 115, 0, 2, '8902670021045'),
(292, 251, '60', 'Gms', 82, 115, 0, 4, '8902670021014'),
(294, 253, '150', 'Gms', 39, 55, 0, 1, '8902670020086'),
(295, 254, '100', 'Gms', 177, 250, 0, 1, '8902670020086'),
(296, 255, '100', 'Gms', 128, 180, 0, 1, '8902670020086'),
(297, 256, '100', 'Gms', 107, 150, 0, 1, '8902670020086'),
(298, 257, '100', 'Gms', 128, 180, 0, 1, '8902670020222'),
(299, 258, '100', 'Gms', 39, 55, 0, 1, '8902670020024'),
(300, 259, '150', 'Gms', 39, 55, 0, 1, '8902670020024'),
(301, 260, '100', 'Gms', 177, 250, 0, 1, '8902670020215'),
(302, 261, '100', 'Gms', 128, 180, 0, 1, '8902670020352'),
(303, 262, '100', 'Gms', 107, 150, 0, 1, '8902670020239'),
(304, 263, '100', 'Gms', 128, 180, 0, 1, '8902670020222'),
(305, 264, '100', 'Gms', 128, 180, 0, 1, '8902670020314'),
(306, 265, '100', 'Gms', 177, 250, 0, 1, '8902670020338'),
(307, 266, '100', 'Gms', 128, 180, 0, 1, '8902670020246'),
(308, 267, '100', 'Gms', 248, 350, 0, 1, '8902670020321'),
(309, 268, '100', 'Gms', 120, 152, 0, 1, '8906047001166'),
(324, 12, '500', 'Gms', 88, 110, 0, 15, '3004023'),
(325, 12, '1', 'Kg', 176, 200, 0, 0, '3004024'),
(326, 2, '1', 'Kg', 160, 200, 0, 1, '2001024'),
(327, 2, '5', 'Kg', 560, 700, 0, 10, '2001025'),
(328, 1, '1', 'Kg', 200, 200, 0, 5, '1001014'),
(329, 1, '5', 'Kg', 700, 700, 0, 3, '1001015'),
(330, 11, '500', 'Gms', 80, 100, 0, 24, '3004013'),
(331, 11, '1', 'Kg', 160, 190, 0, 0, '3004014'),
(332, 10, '500', 'Gms', 64, 90, 0, 32, '3003033'),
(333, 10, '1', 'Kg', 128, 160, 0, 0, '3003034'),
(334, 10, '5', 'Kg', 500, 560, 0, 2, '3003035'),
(335, 9, '500', 'Gms', 72, 100, 0, 16, '3003023'),
(336, 9, '1', 'Kg', 144, 180, 0, 0, '3003024'),
(337, 9, '5', 'Kg', 600, 700, 0, 1, '3003025'),
(339, 281, '100', 'Gms', 120, 159, 0, 1, '8093011'),
(340, 280, '100', 'Gms', 96, 127, 0, 1, '8092011'),
(341, 278, '40', 'Gms', 78, 104, 0, 1, '8090051'),
(342, 279, '100', 'Gms', 96, 127, 0, 1, '8091011'),
(344, 274, '60', 'Gms', 67, 89, 0, 1, '8090011'),
(345, 275, '40', 'Gms', 80, 99, 0, 1, '8090021'),
(346, 276, '40', 'Gms', 80, 99, 0, 1, '8090031'),
(347, 277, '60', 'Gms', 78, 104, 0, 1, '8090041'),
(348, 272, '100', 'Gms', 128, 159, 0, 1, '8906076830584'),
(349, 270, '100', 'Gms', 128, 159, 0, 1, '8906076830591'),
(350, 271, '100', 'Gms', 128, 159, 0, 1, '8906076830614'),
(351, 7, '500', 'Gms', 64, 90, 0, 39, '3003013'),
(352, 6, '1', 'Kg', 160, 200, 0, 3, '3001034'),
(353, 6, '5', 'Kg', 560, 700, 0, 0, '3001035'),
(358, 22, '500', 'Gms', 0, 0, 0, 0, '5007083'),
(359, 21, '1', 'Kg', 96, 120, 0, 0, '3007064'),
(360, 21, '5', 'Kg', 336, 420, 0, 0, '3007065'),
(362, 19, '1', 'Kg', 69, 86, 0, 0, '3007044'),
(363, 19, '5', 'Kg', 240, 300, 0, 0, '3007045'),
(364, 18, '1', 'Kg', 100, 125, 0, 17, '1007034'),
(365, 18, '5', 'Kg', 351, 438, 0, 3, '1007035'),
(366, 17, '1', 'Kg', 100, 125, 0, 4, '3007024'),
(367, 17, '5', 'Kg', 351, 438, 0, 2, '3007025'),
(368, 16, '1', 'Kg', 152, 190, 0, 7, '3007014'),
(369, 16, '5', 'Kg', 532, 665, 0, 4, '3007015'),
(372, 15, '500', 'Gms', 87, 115, 0, 9, '8906076830553'),
(373, 14, '500', 'Kg', 80, 99, 0, 0, '8906066851070'),
(374, 13, '500', 'Gms', 70, 87, 0, 10, '3005013'),
(375, 13, '1', 'Kg', 140, 165, 0, 0, '3005014'),
(376, 13, '5', 'Kg', 480, 522, 0, 1, '3005015'),
(377, 31, '250', 'Gms', 120, 160, 0, 5, '3011012'),
(378, 31, '500', 'Gms', 240, 300, 0, 2, '3011013'),
(379, 30, '5', 'Kg', 476, 595, 0, 1, '3010015'),
(380, 29, '500', 'Gms', 72, 90, 0, 11, '3010013'),
(381, 28, '500', 'Gms', 80, 100, 0, 18, '3009013'),
(382, 27, '500', 'Gms', 120, 150, 0, 17, '2008033'),
(383, 26, '500', 'Gms', 112, 140, 0, 35, '3008023'),
(384, 24, '500', 'Gms', 120, 150, 0, 0, '3008013'),
(385, 23, '1', 'Kg', 173, 230, 0, 15, '89067630461'),
(386, 42, '500', 'Gms', 40, 50, 0, 0, '3016043'),
(387, 41, '500', 'Gms', 40, 50, 0, 0, '3016033'),
(388, 40, '500', 'Gms', 36, 45, 0, 1, '3016023'),
(389, 39, '500', 'Gms', 57, 75, 0, 2, '896076830164'),
(390, 38, '500', 'Gms', 36, 45, 0, 8, '3016013'),
(391, 37, '250', 'Gms', 32, 40, 0, 2, '3015012'),
(392, 37, '500', 'Gms', 60, 75, 0, 0, '3015013'),
(393, 36, '500', 'Gms', 40, 50, 0, 19, 'Safed Matar'),
(394, 35, '500', 'Gms', 44, 55, 0, 21, '3014013'),
(395, 34, '500', 'Gms', 48, 60, 0, 0, '3013013'),
(396, 33, '500', 'Gms', 80, 100, 0, 0, '3012013'),
(397, 52, '500', 'Gms', 28, 35, 0, 0, '3017053'),
(398, 50, '500', 'Gms', 56, 70, 0, 10, '3017033'),
(399, 48, '500', 'Gms', 120, 150, 0, 41, '3017023'),
(400, 46, '1', 'Kg', 75, 99, 0, 5, '8906076830393'),
(401, 45, '1', 'Kg', 32, 40, 0, 8, '3017011'),
(402, 44, '500', 'Gms', 42, 55, 0, 0, '5016053'),
(403, 62, '250', 'Gms', 68, 85, 0, 9, '3018012'),
(404, 60, '500', 'Gms', 32, 40, 0, 9, '3017113'),
(405, 59, '500', 'Gms', 72, 90, 0, 0, '3017093'),
(406, 55, '500', 'Gms', 40, 50, 0, 3, '3017073'),
(407, 54, '500', 'Gms', 40, 50, 0, 0, '3017063'),
(410, 69, '250', 'Gms', 68, 85, 0, 16, '3021012'),
(411, 69, '500', 'Gms', 136, 170, 0, 5, '3021013'),
(412, 68, '100', 'Gms', 44, 44, 0, 40, '8906066850608'),
(413, 66, '5', 'Kg', 0, 0, 0, 0, '3019025'),
(415, 64, '500', 'Gms', 144, 180, 0, 6, '3018033'),
(416, 63, '250', 'Gms', 48, 60, 0, 0, '3018022'),
(417, 82, '250', 'Gms', 60, 80, 0, 12, '3028012'),
(418, 82, '500', 'Gms', 120, 150, 0, 10, '3028013'),
(419, 79, '100', 'Gms', 152, 190, 0, 44, '3027011'),
(421, 78, '250', 'Gms', 68, 85, 0, 7, '3026012'),
(422, 76, '100', 'Gms', 16, 22, 0, 27, '3025011'),
(423, 76, '250', 'Gms', 32, 40, 0, 7, '3025012'),
(424, 75, '100', 'Gms', 48, 60, 0, 0, '3024011'),
(425, 75, '250', 'Gms', 113, 150, 0, 7, '3024012'),
(426, 73, '100', 'Gms', 44, 55, 0, 10, '3023011'),
(427, 73, '250', 'Gms', 0, 80, 0, 100, '3023012'),
(428, 73, '500', 'Gms', 160, 200, 0, 1, '3023013'),
(429, 73, '1', 'Kg', 320, 400, 0, 0, '3023014'),
(430, 92, '200', 'Gms', 348, 434, 0, 0, '3034016'),
(431, 91, '100', 'Gms', 144, 180, 0, 2, '3033011'),
(432, 91, '250', 'Gms', 312, 390, 0, 0, '3033012'),
(433, 90, '100', 'Gms', 63, 78, 0, 0, '3032011'),
(434, 90, '500', 'Gms', 110, 137, 0, 10, '3032012'),
(435, 87, '500', 'Gms', 28, 35, 0, 25, '3030013'),
(436, 89, '250', 'Gms', 48, 60, 0, 3, '3031012'),
(437, 83, '500', 'Gms', 40, 50, 0, 5, '3029013'),
(438, 85, '500', 'Gms', 51, 63, 0, 10, '3029023'),
(439, 102, '1', 'Kg', 108, 135, 0, 12, '8906076830362'),
(440, 101, '500', 'Gms', 64, 79, 0, 6, '8906076830119'),
(442, 100, '500', 'Gms', 64, 80, 0, 0, '3039013'),
(443, 99, '100', 'Gms', 28, 35, 0, 6, '3038011'),
(444, 97, '100', 'Gms', 160, 200, 0, 0, '3037011'),
(445, 97, '25', 'Gms', 40, 50, 0, 5, '3037018'),
(446, 94, '100', 'Gms', 75, 100, 0, 3, '3036011'),
(447, 96, '50', 'Gms', 117, 155, 0, 3, '8906047000077'),
(448, 93, '100', 'Gms', 112, 140, 0, 0, '3035011'),
(449, 93, '250', 'Gms', 276, 345, 0, 0, '3035012'),
(450, 65, '5', 'Kg', 167, 185, 0, 7, '3019015'),
(451, 112, '250', 'ml', 102, 120, 0, 20, '8906047000633'),
(452, 110, '500', 'ml', 182, 215, 0, 4, '8906047001371'),
(453, 109, '1', 'Lt', 220, 275, 0, 16, '3042034'),
(454, 108, '1', 'Lt', 219, 230, 0, 2, '3042024'),
(455, 108, '5', 'Lt', 878, 975, 0, 6, '3042025'),
(456, 107, '1', 'Lt', 194, 242, 0, 13, '3042014'),
(457, 106, '100', 'Gms', 143, 178, 0, 11, '3041011'),
(458, 105, '100', 'Gms', 56, 70, 0, 13, '3040011'),
(459, 105, '500', 'Gms', 240, 300, 0, 2, '3040013'),
(460, 122, '100', 'Gms', 34, 42, 0, 20, '3046011'),
(461, 122, '250', 'Gms', 80, 100, 0, 6, '3046012'),
(462, 121, '100', 'ml', 40, 50, 0, 1, '3045011'),
(463, 121, '250', 'ml', 72, 90, 0, 15, '3045012'),
(464, 120, '500', 'ml', 120, 150, 0, 6, '3044013'),
(465, 115, '500', 'ml', 228, 284, 0, 18, '3043013'),
(466, 113, '400', 'ml', 196, 245, 0, 2, '3042061'),
(467, 114, '250', 'ml', 244, 305, 0, 17, '4042063'),
(468, 132, '500', 'Gms', 73, 91, 0, 12, '8906066851957'),
(472, 126, '1', 'Gms', 48, 60, 0, 5, '3048013'),
(473, 123, '100', 'Gms', 36, 45, 0, 5, '3047011'),
(474, 123, '250', 'Gms', 72, 90, 0, 13, '3047012'),
(477, 127, '1', 'Kg', 88, 110, 0, 1, '3049024'),
(478, 127, '1', 'Kg', 400, 500, 0, 1, '3049025'),
(479, 130, '500', 'Gms', 293, 390, 0, 2, '8906047001173'),
(480, 5, '1', 'Kg', 160, 200, 0, 30, '3002014'),
(481, 5, '5', 'Kg', 560, 700, 0, 5, '3002015'),
(482, 128, '100', 'Gms', 64, 80, 0, 11, '8906076830126'),
(483, 125, '1', 'Kg', 88, 110, 0, 88, '3049014'),
(484, 125, '1', 'Kg', 400, 500, 0, 2, '3049015'),
(485, 20, '1', 'Kg', 160, 200, 0, 3, '1007054'),
(486, 20, '5', 'Kg', 560, 700, 0, 0, '1007055'),
(487, 139, '100', 'Gms', 132, 165, 0, 1, '8906066850363'),
(488, 138, '100', 'Gms', 56, 70, 0, 8, '8906066851254'),
(489, 137, '500', 'ml', 136, 170, 0, 8, '3054013'),
(490, 136, '100', 'Gms', 56, 70, 0, 11, '8906066850165'),
(491, 135, '500', 'ml', 136, 170, 0, 2, '3052013'),
(492, 134, '500', 'Gms', 176, 879, 0, 11, '8906076830454'),
(493, 133, '400', 'Gms', 319, 398, 0, 14, '3051011'),
(494, 152, '250', 'Gms', 64, 80, 0, 2, '3059012'),
(495, 152, '500', 'Gms', 120, 150, 0, 3, '3059013'),
(496, 152, '150', 'Gms', 40, 50, 0, 0, '3059015'),
(497, 151, '350', 'Gms', 112, 149, 0, 0, '8058061'),
(498, 149, '350', 'Gms', 132, 165, 0, 8, '8906066850455'),
(499, 146, '350', 'Gms', 132, 165, 0, 0, '8906066850424'),
(500, 142, '250', 'Gms', 152, 190, 0, 6, '8906066850196'),
(501, 141, '250', 'Gms', 152, 190, 0, 2, '8960606850172'),
(502, 147, '350', 'Gms', 132, 165, 0, 1, '8906066850448'),
(503, 148, '350', 'Gms', 132, 165, 0, 0, '8906066850462'),
(504, 143, '250', 'Gms', 152, 190, 0, 6, '8906066850189'),
(505, 145, '250', 'Gms', 152, 190, 0, 5, '8906066850219'),
(506, 169, '500', 'Gms', 25, 35, 0, 1, '8906076830546'),
(507, 182, '100', 'Gms', 50, 65, 0, 3, '8906047000695'),
(508, 183, '100', 'Gms', 58, 68, 0, 0, '8906047000701'),
(509, 180, '100', 'Gms', 49, 58, 0, 2, '4071011'),
(510, 181, '100', 'Gms', 51, 60, 0, 3, '8906047000688'),
(511, 252, '100', 'Gms', 71, 99, 0, 0, '8902670020086'),
(513, 243, '100', 'Gms', 815, 1150, 0, 1, '8902670021601'),
(514, 242, '100', 'Gms', 815, 1150, 0, 3, '8902670021618'),
(515, 184, '200', 'Gms', 148, 175, 0, 1, '8906047000206'),
(516, 153, '250', 'Gms', 64, 80, 0, 0, '3059022'),
(517, 153, '500', 'Gms', 120, 150, 0, 3, '3059023'),
(518, 153, '150', 'Gms', 40, 50, 0, 2, '3059024'),
(519, 154, '200', 'Gms', 56, 70, 0, 0, '8906047000800'),
(520, 155, '200', 'Gms', 56, 70, 0, 0, '8906047000824'),
(521, 156, '200', 'Gms', 56, 70, 0, 0, '8906047000817'),
(522, 269, '100', 'Gms', 254, 325, 0, 1, '8906047000756'),
(525, 273, '100', 'Gms', 128, 159, 0, 1, '5089041'),
(528, 282, '100', 'Gms', 120, 159, 0, 1, '8094011'),
(537, 284, '11', 'Gms', 11, 11, 11, 11, '11'),
(538, 284, '121', 'Gms', 11, 11, 11, 11, '111'),
(539, 284, '12', 'Gms', 21, 2121, 212, 121, '2121'),
(540, 284, '45', 'Kg', 55, 55, 55, 55, '55'),
(544, 283, '1', 'Kg', 14, 1, 11, 11, '1111'),
(545, 285, '12', 'Lt', 0, 12, 0, 12, '11111'),
(546, 285, '10', 'Lt', 0, 15, 0, 15, '3259');

-- --------------------------------------------------------

--
-- Table structure for table `menumaster`
--

CREATE TABLE `menumaster` (
  `id` int(11) NOT NULL,
  `menu` varchar(120) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menumaster`
--

INSERT INTO `menumaster` (`id`, `menu`, `is_active`) VALUES
(1, 'dashboard', 1),
(2, 'category', 1),
(3, 'items', 1),
(4, 'userlist', 1),
(5, 'orderlist', 1),
(6, 'delivery', 1),
(7, 'review', 1),
(8, 'statelist', 1),
(9, 'citylist', 1),
(10, 'ask', 1),
(11, 'testimonials', 1),
(12, 'allreciepe', 1),
(13, 'blog', 1),
(14, 'subscribe', 1),
(15, 'rollmastermenu', 1),
(16, 'Brand', 1),
(17, 'Shop Points', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu_role`
--

CREATE TABLE `menu_role` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `menu_id` varchar(200) DEFAULT NULL,
  `is_active` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_role`
--

INSERT INTO `menu_role` (`id`, `user_id`, `menu_id`, `is_active`) VALUES
(51, 9, '1', 1),
(52, 9, '2', 1),
(53, 9, '3', 1),
(54, 9, '4', 1),
(55, 9, '6', 1),
(56, 9, '7', 1),
(57, 9, '8', 1),
(58, 9, '11', 1),
(59, 9, '12', 1),
(60, 9, '13', 1),
(90, 10, '1', 1),
(91, 10, '2', 1),
(92, 10, '3', 1),
(93, 10, '4', 1),
(94, 10, '5', 1),
(95, 10, '6', 1),
(96, 10, '7', 1),
(97, 10, '8', 1),
(98, 10, '9', 1),
(99, 10, '10', 1),
(100, 10, '11', 1),
(101, 10, '12', 1),
(102, 10, '13', 1),
(103, 10, '14', 1),
(104, 10, '15', 1),
(115, 11, '1', 1),
(116, 11, '2', 1),
(117, 11, '3', 1),
(118, 11, '4', 1),
(119, 11, '5', 1),
(120, 11, '6', 1),
(121, 11, '7', 1),
(122, 11, '8', 1),
(123, 11, '11', 1),
(124, 11, '12', 1),
(128, 12, '1', 1),
(129, 12, '2', 1),
(130, 12, '3', 1),
(131, 12, '6', 1),
(132, 12, '7', 1),
(133, 12, '11', 1),
(134, 12, '12', 1),
(135, 13, '1', 1),
(136, 10, '16', 1),
(137, 10, '17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_description`
--

CREATE TABLE `order_description` (
  `id` int(11) NOT NULL,
  `order_master_id` int(11) DEFAULT NULL,
  `item_master_id` int(11) DEFAULT NULL,
  `qty` smallint(6) DEFAULT NULL,
  `unit_price` decimal(12,2) DEFAULT NULL,
  `total` decimal(12,2) DEFAULT NULL,
  `is_cancelled` tinyint(4) NOT NULL DEFAULT '0',
  `is_return` tinyint(4) DEFAULT '0',
  `is_active` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_description`
--

INSERT INTO `order_description` (`id`, `order_master_id`, `item_master_id`, `qty`, `unit_price`, `total`, `is_cancelled`, `is_return`, `is_active`) VALUES
(1, 1, 7, 1, '90.00', '90.00', 0, 0, 1),
(2, 1, 39, 1, '75.00', '75.00', 0, 0, 1),
(3, 2, 9, 1, '100.00', '100.00', 0, 0, 1),
(4, 2, 39, 1, '75.00', '75.00', 0, 0, 1),
(5, 3, 24, 1, '150.00', '150.00', 0, 0, 1),
(6, 3, 100, 1, '80.00', '80.00', 0, 0, 1),
(7, 3, 132, 1, '91.00', '91.00', 0, 0, 1),
(8, 3, 115, 1, '284.00', '284.00', 0, 0, 1),
(9, 4, 10, 3, '90.00', '270.00', 0, 0, 1),
(10, 4, 69, 4, '85.00', '340.00', 0, 0, 1),
(11, 6, 43, 1, '55.00', '55.00', 0, 0, 1),
(12, 6, 32, 1, '290.00', '290.00', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_master`
--

CREATE TABLE `order_master` (
  `id` int(11) NOT NULL,
  `order_no` varchar(50) DEFAULT NULL,
  `order_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) DEFAULT NULL,
  `address_id` int(11) DEFAULT NULL,
  `shop_address_id` int(11) DEFAULT NULL,
  `bill_amount` float DEFAULT NULL,
  `point_pay` float DEFAULT NULL,
  `promo_pay` float DEFAULT NULL,
  `paid_amt` float DEFAULT NULL,
  `delivery_charge` float DEFAULT NULL,
  `is_cancelled` tinyint(4) NOT NULL DEFAULT '0',
  `is_cod` tinyint(4) NOT NULL DEFAULT '1',
  `is_return` tinyint(4) DEFAULT '0',
  `status` enum('Ordered','Packed','Shipped','Delivered') DEFAULT 'Ordered',
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `updated_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_master`
--

INSERT INTO `order_master` (`id`, `order_no`, `order_date`, `user_id`, `address_id`, `shop_address_id`, `bill_amount`, `point_pay`, `promo_pay`, `paid_amt`, `delivery_charge`, `is_cancelled`, `is_cod`, `is_return`, `status`, `is_active`, `updated_time`) VALUES
(1, '632205', '2018-08-24 08:26:23', 16, 1, NULL, 165, 0, 100, 115, 50, 0, 1, 0, 'Shipped', 1, '2018-08-24 04:28:56'),
(2, '289797', '2018-08-24 10:04:58', 16, 3, NULL, 175, 0, 0, 225, 50, 0, 1, 0, 'Ordered', 1, '2018-08-24 10:04:58'),
(3, '290910', '2018-08-24 10:24:13', 16, 3, NULL, 605, 0, 100, 505, 0, 0, 1, 0, 'Packed', 1, '2018-08-24 04:55:31'),
(4, '705093', '2018-08-25 07:02:16', 16, 3, NULL, 610, 0, 0, 610, 0, 0, 1, 0, 'Ordered', 1, '2018-11-27 07:50:36'),
(5, '852658', '2018-11-29 12:26:12', 16, 4, NULL, 345, 0, 0, 345, 0, 0, 1, 0, 'Ordered', 1, '2018-11-29 12:26:12'),
(6, '981458', '2018-11-29 12:26:42', 16, 4, NULL, 345, 0, 0, 345, 0, 0, 1, 0, 'Packed', 1, '2018-11-29 06:58:13');

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE `promo` (
  `id` int(11) NOT NULL,
  `promo_code` varchar(100) DEFAULT NULL,
  `promo_amount` float DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promo`
--

INSERT INTO `promo` (`id`, `promo_code`, `promo_amount`, `is_active`) VALUES
(1, 'pre100', 100, 1);

-- --------------------------------------------------------

--
-- Table structure for table `recipe_ingredients`
--

CREATE TABLE `recipe_ingredients` (
  `id` int(11) NOT NULL,
  `rec_id` int(11) DEFAULT NULL,
  `ingrediant` varchar(200) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipe_ingredients`
--

INSERT INTO `recipe_ingredients` (`id`, `rec_id`, `ingrediant`, `product_id`, `qty`) VALUES
(1, 1, NULL, 1, 5),
(2, 1, '', NULL, NULL),
(3, 2, NULL, 2, 10),
(4, 2, '', NULL, NULL),
(5, 3, NULL, 8, 44),
(6, 3, NULL, 1, 22),
(7, 3, NULL, 4, 23),
(8, 3, 'Test Ingr', NULL, 50),
(9, 4, NULL, 6, 12),
(10, 4, NULL, 3, 45),
(11, 4, NULL, 2, 15),
(12, 4, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `recipe_instruction`
--

CREATE TABLE `recipe_instruction` (
  `id` int(11) NOT NULL,
  `rec_id` int(11) DEFAULT NULL,
  `instruction` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipe_instruction`
--

INSERT INTO `recipe_instruction` (`id`, `rec_id`, `instruction`) VALUES
(1, 1, 'Instructions'),
(2, 2, 'dsadafaddafsad'),
(3, 3, 'Step1'),
(4, 4, 'buhbuhbuhj');

-- --------------------------------------------------------

--
-- Table structure for table `recipe_master`
--

CREATE TABLE `recipe_master` (
  `id` int(11) NOT NULL,
  `title` varchar(500) DEFAULT NULL,
  `desciption` longtext,
  `image` varchar(50) DEFAULT NULL,
  `cooking_time` varchar(50) DEFAULT NULL,
  `difficulty_level` varchar(50) DEFAULT NULL,
  `serve_count` varchar(50) DEFAULT NULL,
  `is_approved` enum('approved','rejected','pending') NOT NULL DEFAULT 'pending',
  `reject_reason` varchar(300) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipe_master`
--

INSERT INTO `recipe_master` (`id`, `title`, `desciption`, `image`, `cooking_time`, `difficulty_level`, `serve_count`, `is_approved`, `reject_reason`, `created_by`, `created_time`, `is_active`) VALUES
(1, 'Test Title', 'Benifits', 'recipe/rKG97i_0D44M2_level.png', '30', 'Easy', '5', 'rejected', NULL, 16, '2018-08-30 12:04:57', 0),
(2, 'Test Title 2', 'Nothing brings back childhood memories like frozen chocolate-covered bananas! Not only are these delicious but they are simple to make and they are on the healthier end of the dessert', 'recipe/lcetnf_5b4330ea7a924_img.Adver_mainimg3.jpg', '60', 'Easy', '2', 'rejected', 'bolo', 16, '2018-08-30 12:21:34', 0),
(3, 'Test Title 3', 'dvsdsacf', 'recipe/nKPpTy_5b4330ea7a924_img.Adver_mainimg3.jpg', '10', 'Medium', '5', 'rejected', 'haa', 16, '2018-08-30 12:34:50', 0),
(4, 'Chole Le Lo', 'dsaasd', 'recipe/I9F30y_555logo.png', '30', 'Difficult', '2', 'approved', NULL, 16, '2018-08-31 11:52:47', 0);

-- --------------------------------------------------------

--
-- Table structure for table `relations`
--

CREATE TABLE `relations` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `p_id` int(11) DEFAULT NULL,
  `child_id` varchar(255) CHARACTER SET utf8 NOT NULL,
  `PaymentStatus` int(11) NOT NULL DEFAULT '1',
  `CreatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Gateway` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t_id` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Transaction Id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `relations`
--

INSERT INTO `relations` (`id`, `parent_id`, `p_id`, `child_id`, `PaymentStatus`, `CreatedAt`, `Gateway`, `t_id`) VALUES
(1, '8989892897', 16, '42', 1, '2018-08-21 11:32:40', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `return_master`
--

CREATE TABLE `return_master` (
  `id` int(11) NOT NULL,
  `order_master_id` int(11) DEFAULT NULL,
  `return_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `quantity` float DEFAULT NULL,
  `return_reason` varchar(50) DEFAULT NULL,
  `other_reason` longtext,
  `is_open` tinyint(4) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_master_id` int(11) DEFAULT NULL,
  `order_description_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `review` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `star_rating` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `is_approved` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `item_master_id`, `order_description_id`, `user_id`, `name`, `email`, `review`, `star_rating`, `created_at`, `is_active`, `is_approved`) VALUES
(1, 3, NULL, 16, NULL, 'a@gmail.com', 'sfvgv ge ges g', 5, '2018-06-20 12:44:13', 1, 0),
(2, 2, NULL, 16, NULL, 'a@gmail.com', 'fdsgs', 4, '2018-06-20 12:44:22', 1, 0),
(3, 279, 2, 42, 'Amit', 'retinodes.amit@gmail.com', '3w', 3, '2018-08-22 09:59:19', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rollmaster`
--

CREATE TABLE `rollmaster` (
  `id` int(11) NOT NULL,
  `roll` varchar(50) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rollmaster`
--

INSERT INTO `rollmaster` (`id`, `roll`, `is_active`) VALUES
(1, 'admin', 1),
(2, 'officework', 1);

-- --------------------------------------------------------

--
-- Table structure for table `shop_points`
--

CREATE TABLE `shop_points` (
  `id` int(11) NOT NULL,
  `city_id` int(11) DEFAULT NULL,
  `shop_name` varchar(50) DEFAULT NULL,
  `contact` varchar(15) DEFAULT NULL,
  `shop_address` varchar(500) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT '1',
  `created_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop_points`
--

INSERT INTO `shop_points` (`id`, `city_id`, `shop_name`, `contact`, `shop_address`, `is_active`, `created_time`) VALUES
(1, 1, 'Abc', '8989892897', 'Organic Bhandar, Vijay Nagar Jabalpur', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `state_name` varchar(255) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `state_name`, `is_deleted`) VALUES
(14, 'Madhya Pradesh', 0),
(15, 'Gujraat', 0),
(16, 'demo', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subscribes`
--

CREATE TABLE `subscribes` (
  `id` int(11) NOT NULL,
  `email` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribes`
--

INSERT INTO `subscribes` (`id`, `email`) VALUES
(2, 'dsa@dfcs.com'),
(4, 'dcsf@vdfs.com'),
(5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int(11) NOT NULL,
  `review` text,
  `user_id` int(11) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `review`, `user_id`, `is_active`) VALUES
(2, '6589', 41, 0),
(3, '521hjhdcr', 16, 0),
(4, '639', 42, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `otp` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rc` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_img` varchar(100) COLLATE utf8_unicode_ci DEFAULT 'images/Male_default.png',
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` enum('male','female') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'male',
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `gain_amount` float NOT NULL DEFAULT '0',
  `is_confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `confirmation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `is_cod_allow` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `otp`, `rc`, `profile_img`, `name`, `email`, `gender`, `password`, `contact`, `city_id`, `gain_amount`, `is_confirmed`, `confirmation_code`, `remember_token`, `created_at`, `is_active`, `is_cod_allow`) VALUES
(16, NULL, 'rc1232', 'JkithH_prihul_mainlogo.png', 'Bijendra Sahu', 'a@gmail.com', 'male', '202cb962ac59075b964b07152d234b70', '8989892897', 99, 20.012, 1, NULL, NULL, '0000-00-00 00:00:00', 1, 1),
(37, NULL, 'rc1233', 'images/Male_default.png', 'aditya', 'aadishriz@gmail.com', 'male', '202cb962ac59075b964b07152d234b70', '9876543210', NULL, 0, 1, NULL, NULL, '2018-06-05 10:11:40', 1, 0),
(38, NULL, 'rc1234', 'zvhSIW_imagename.png', 'abc', 'bijendra1@gmail.com', 'male', '202cb962ac59075b964b07152d234b70', '9876543211', NULL, 0, 0, NULL, NULL, '2018-06-11 12:03:09', 1, 1),
(39, NULL, 'rc1235', 'zvhSIW_imagename.png', 'abc', 'bijendra2@gmail.com', 'male', '202cb962ac59075b964b07152d234b70', '9876543211', NULL, 0, 0, NULL, NULL, '2018-06-11 12:03:09', 1, 1),
(40, NULL, 'rc1236', 'zvhSIW_imagename.png', 'abc', 'bijendra3@gmail.com', 'male', '202cb962ac59075b964b07152d234b70', '9876543211', NULL, 0, 0, NULL, NULL, '2018-06-11 12:03:09', 1, 1),
(41, NULL, NULL, 'images/Male_default.png', 'aditya', 'aadi@aadi.com', 'male', '123', '7000700070', NULL, 0, 0, NULL, NULL, '2018-08-06 11:58:39', 1, 1),
(42, '287849', '8989892897', 'images/Male_default.png', 'Amit', 'retinodes.amit@gmail.com', 'male', '202cb962ac59075b964b07152d234b70', '9826895533', NULL, 0, 1, NULL, NULL, '2018-08-21 11:32:40', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `contact` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` longtext,
  `address2` longtext,
  `zip` varchar(20) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`id`, `user_id`, `name`, `contact`, `email`, `address`, `address2`, `zip`, `city_id`, `state_id`, `is_active`, `created_time`) VALUES
(1, 16, 'Bijendra', '9876543210', 'bijendra@gmail.com', 'address', 'address2', '482003', 1, 85, 1, '2018-06-11 13:13:21'),
(2, 16, 'Bijendra', '7894561230', 'bijendra1@gmail.com', 'Jabalpur Garha', NULL, '482442', 1, NULL, 1, '2018-06-19 07:10:41'),
(3, 16, 'Anuj Sahu', '9876543210', 'anuj12@gmail.com', 'Indore', NULL, '482004', 1, NULL, 1, '2018-07-03 13:24:43'),
(4, 16, 'Bijendra', '9876543215', NULL, 'dsa', NULL, '482003', 1, NULL, 1, '2018-07-03 13:36:52'),
(5, 37, 'Twe', '8989892897', 'retinodes.bijendra@gmail.com', 'dsa', NULL, '482003', 1, NULL, 1, '2018-08-22 11:05:14');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_master`
--
ALTER TABLE `admin_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ask`
--
ALTER TABLE `ask`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_category`
--
ALTER TABLE `blog_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_cat_record`
--
ALTER TABLE `blog_cat_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_master`
--
ALTER TABLE `category_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_charges`
--
ALTER TABLE `delivery_charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_brand`
--
ALTER TABLE `item_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_category`
--
ALTER TABLE `item_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_images`
--
ALTER TABLE `item_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_master`
--
ALTER TABLE `item_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_meta`
--
ALTER TABLE `item_meta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_price`
--
ALTER TABLE `item_price`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menumaster`
--
ALTER TABLE `menumaster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_role`
--
ALTER TABLE `menu_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_description`
--
ALTER TABLE `order_description`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_master`
--
ALTER TABLE `order_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipe_ingredients`
--
ALTER TABLE `recipe_ingredients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipe_instruction`
--
ALTER TABLE `recipe_instruction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipe_master`
--
ALTER TABLE `recipe_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `relations`
--
ALTER TABLE `relations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `return_master`
--
ALTER TABLE `return_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rollmaster`
--
ALTER TABLE `rollmaster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_points`
--
ALTER TABLE `shop_points`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribes`
--
ALTER TABLE `subscribes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_master`
--
ALTER TABLE `admin_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ask`
--
ALTER TABLE `ask`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `blog_category`
--
ALTER TABLE `blog_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blog_cat_record`
--
ALTER TABLE `blog_cat_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category_master`
--
ALTER TABLE `category_master`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_brand`
--
ALTER TABLE `item_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menumaster`
--
ALTER TABLE `menumaster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `menu_role`
--
ALTER TABLE `menu_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `order_description`
--
ALTER TABLE `order_description`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order_master`
--
ALTER TABLE `order_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `shop_points`
--
ALTER TABLE `shop_points`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
