-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Feb 09, 2022 at 05:42 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `car_photo` varchar(255) DEFAULT NULL,
  `smart_card_photo` varchar(255) DEFAULT NULL,
  `tax_token_photo` varchar(255) DEFAULT NULL,
  `fitness_photo` varchar(255) DEFAULT NULL,
  `bank_clearance_photo` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `smartend_seller_images`
--

INSERT INTO `smartend_seller_images` (`seller_id`, `car_photo`, `smart_card_photo`, `tax_token_photo`, `fitness_photo`, `bank_clearance_photo`) VALUES
(11, 'uploads//341998bed3e5716508f7ddd82094ffff1644428418.jpg', 'uploads//fa51cb80f3936690798c4bd367c02bb61644428418.png', 'uploads//9d32e23748cd892844444700852c90301644428418.png', 'uploads//b9875e18efa13861f666c23c7abc68861644428418.png', 'uploads//5cd77dcfa104e1d299d7b14fd2e2dec81644428418.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
