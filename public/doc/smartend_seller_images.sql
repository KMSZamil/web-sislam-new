-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 13, 2022 at 04:02 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sislam`
--

-- --------------------------------------------------------

--
-- Table structure for table `smartend_seller_images`
--

DROP TABLE IF EXISTS `smartend_seller_images`;
CREATE TABLE IF NOT EXISTS `smartend_seller_images` (
  `seller_id` int(11) NOT NULL,
  `car_photo_1` varchar(255) DEFAULT NULL,
  `car_photo_2` varchar(255) DEFAULT NULL,
  `car_photo_3` varchar(255) DEFAULT NULL,
  `car_photo_4` varchar(255) DEFAULT NULL,
  `car_photo_5` varchar(255) DEFAULT NULL,
  `smart_card_photo` varchar(255) DEFAULT NULL,
  `tax_token_photo` varchar(255) DEFAULT NULL,
  `fitness_photo` varchar(255) DEFAULT NULL,
  `bank_clearance_photo` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `smartend_seller_images`
--

INSERT INTO `smartend_seller_images` (`seller_id`, `car_photo_1`, `car_photo_2`, `car_photo_3`, `car_photo_4`, `car_photo_5`, `smart_card_photo`, `tax_token_photo`, `fitness_photo`, `bank_clearance_photo`) VALUES
(81, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(89, 'uploads/b3ad9cfde9b4abf50d6e7d26e9ddecda1644768110.png', 'uploads/b8415c3bd0f644fc2085876f4212e5321644768110.png', 'uploads/77745441634c92f17e89b417d91d17701644768110.png', NULL, NULL, NULL, NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
