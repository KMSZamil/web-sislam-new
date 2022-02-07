-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 07, 2022 at 12:15 PM
-- Server version: 10.3.32-MariaDB-cll-lve
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `raisaweb_sislamdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `smartend_analytics_pages`
--

CREATE TABLE `smartend_analytics_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `visitor_id` int(11) NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `query` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `load_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smartend_analytics_pages`
--

INSERT INTO `smartend_analytics_pages` (`id`, `visitor_id`, `ip`, `title`, `name`, `query`, `load_time`, `date`, `time`, `created_at`, `updated_at`) VALUES
(1, 1, '127.0.0.1', 'Site Title', 'unknown', 'http://127.0.0.1:8000/', '0.49841714', '2022-02-04', '06:08:42', '2022-02-04 00:08:42', '2022-02-04 00:08:42'),
(2, 1, '127.0.0.1', 'Dashboard &raquo; Sign in to CONTROL', 'unknown', 'http://127.0.0.1:8000/admin/login', '0.1758461', '2022-02-04', '06:12:10', '2022-02-04 00:12:10', '2022-02-04 00:12:10'),
(3, 1, '127.0.0.1', 'Dashboard &raquo; Site Title', 'unknown', 'http://127.0.0.1:8000/admin', '0.23201323', '2022-02-04', '06:13:07', '2022-02-04 00:13:07', '2022-02-04 00:13:07'),
(4, 1, '127.0.0.1', 'Site Title', 'unknown', 'http://127.0.0.1:8000//assets/dashboard/js/flot/jquery.flot.js', '0.99298191', '2022-02-04', '06:13:08', '2022-02-04 00:13:08', '2022-02-04 00:13:08'),
(5, 1, '127.0.0.1', 'Site Title', 'unknown', 'http://127.0.0.1:8000//assets/dashboard/js/flot/jquery.flot.resize.js', '0.37136602', '2022-02-04', '06:13:08', '2022-02-04 00:13:08', '2022-02-04 00:13:08'),
(6, 1, '127.0.0.1', 'Site Title', 'unknown', 'http://127.0.0.1:8000//assets/dashboard/js/flot/jquery.flot.pie.js', '0.26503897', '2022-02-04', '06:13:09', '2022-02-04 00:13:09', '2022-02-04 00:13:09'),
(7, 1, '127.0.0.1', 'Site Title', 'unknown', 'http://127.0.0.1:8000//assets/dashboard/js/flot.tooltip/js/jquery.flot.tooltip.min.js', '0.26704717', '2022-02-04', '06:13:09', '2022-02-04 00:13:09', '2022-02-04 00:13:09'),
(8, 1, '127.0.0.1', 'Site Title', 'unknown', 'http://127.0.0.1:8000//assets/dashboard/js/flot-spline/js/jquery.flot.spline.min.js', '0.2845459', '2022-02-04', '06:13:09', '2022-02-04 00:13:09', '2022-02-04 00:13:09'),
(9, 1, '127.0.0.1', 'Site Title', 'unknown', 'http://127.0.0.1:8000//assets/dashboard/js/flot.orderbars/js/jquery.flot.orderBars.js', '0.25654387', '2022-02-04', '06:13:09', '2022-02-04 00:13:09', '2022-02-04 00:13:09'),
(10, 1, '127.0.0.1', 'Dashboard &raquo; General Settings', 'unknown', 'http://127.0.0.1:8000/admin/settings', '0.18748498', '2022-02-04', '06:13:19', '2022-02-04 00:13:19', '2022-02-04 00:13:19'),
(11, 1, '127.0.0.1', 'Dashboard &raquo; General Settings', 'unknown', 'http://127.0.0.1:8000/admin/webmaster', '0.541291', '2022-02-04', '06:13:37', '2022-02-04 00:13:37', '2022-02-04 00:13:37'),
(12, 1, '127.0.0.1', 'Site Title', 'unknown', 'http://127.0.0.1:8000//assets/dashboard/js/select2/dist/css/select2.min.css', '0.81209207', '2022-02-04', '06:13:38', '2022-02-04 00:13:38', '2022-02-04 00:13:38'),
(13, 1, '127.0.0.1', 'Site Title', 'unknown', 'http://127.0.0.1:8000//assets/dashboard/js/select2-bootstrap-theme/dist/select2-bootstrap.min.css', '0.2541039', '2022-02-04', '06:13:39', '2022-02-04 00:13:39', '2022-02-04 00:13:39'),
(14, 1, '127.0.0.1', 'Site Title', 'unknown', 'http://127.0.0.1:8000//assets/dashboard/js/select2-bootstrap-theme/dist/select2-bootstrap.4.css', '0.24027991', '2022-02-04', '06:13:39', '2022-02-04 00:13:39', '2022-02-04 00:13:39'),
(15, 1, '127.0.0.1', 'Site Title', 'unknown', 'http://127.0.0.1:8000//assets/dashboard/js/select2/dist/js/select2.min.js', '0.29047918', '2022-02-04', '06:13:39', '2022-02-04 00:13:39', '2022-02-04 00:13:39'),
(16, 1, '127.0.0.1', 'Dashboard &raquo; Users &amp; Permissions', 'unknown', 'http://127.0.0.1:8000/admin/users', '0.20574999', '2022-02-04', '06:15:32', '2022-02-04 00:15:32', '2022-02-04 00:15:32'),
(17, 1, '127.0.0.1', 'Dashboard &raquo; Site Menus', 'unknown', 'http://127.0.0.1:8000/admin/menus', '0.20065904', '2022-02-04', '06:15:41', '2022-02-04 00:15:41', '2022-02-04 00:15:41'),
(18, 1, '127.0.0.1', 'Dashboard &raquo; Photos', 'unknown', 'http://127.0.0.1:8000/admin/4/topics', '0.56510186', '2022-02-04', '06:16:12', '2022-02-04 00:16:12', '2022-02-04 00:16:12'),
(19, 1, '127.0.0.1', 'Dashboard &raquo; Site Sections', 'unknown', 'http://127.0.0.1:8000/admin/webmaster/sections', '0.47440696', '2022-02-04', '06:16:27', '2022-02-04 00:16:27', '2022-02-04 00:16:27'),
(20, 1, '127.0.0.1', 'Dashboard &raquo; Site pages', 'unknown', 'http://127.0.0.1:8000/admin/1/topics', '0.509758', '2022-02-04', '06:16:55', '2022-02-04 00:16:55', '2022-02-04 00:16:55'),
(21, 1, '127.0.0.1', 'About Us', 'unknown', 'http://127.0.0.1:8000/topic/about', '0.4399929', '2022-02-04', '06:17:03', '2022-02-04 00:17:03', '2022-02-04 00:17:03'),
(22, 1, '127.0.0.1', 'Site Title', 'unknown', 'http://127.0.0.1:8000/home', '0.24680495', '2022-02-04', '06:32:03', '2022-02-04 00:32:03', '2022-02-04 00:32:03'),
(23, 1, '127.0.0.1', 'Dashboard &raquo; Ad. Banners', 'unknown', 'http://127.0.0.1:8000/admin/banners', '0.48892188', '2022-02-04', '06:34:14', '2022-02-04 00:34:14', '2022-02-04 00:34:14'),
(24, 1, '127.0.0.1', 'Dashboard &raquo; Ad. Banners', 'unknown', 'http://127.0.0.1:8000/admin/banners/1/edit', '0.23217297', '2022-02-04', '06:34:22', '2022-02-04 00:34:22', '2022-02-04 00:34:22'),
(25, 1, '127.0.0.1', 'Dashboard &raquo; Ad. Banners', 'unknown', 'http://127.0.0.1:8000/admin/banners/2/edit', '0.17017388', '2022-02-04', '06:41:28', '2022-02-04 00:41:28', '2022-02-04 00:41:28'),
(26, 1, '127.0.0.1', 'Dashboard &raquo; Site Title', 'unknown', 'http://127.0.0.1:8000/admin/', '0.205935', '2022-02-04', '08:27:58', '2022-02-04 02:27:58', '2022-02-04 02:27:58'),
(27, 1, '127.0.0.1', 'Dashboard &raquo; Banners settings', 'unknown', 'http://127.0.0.1:8000/admin/webmaster/banners', '0.35385013', '2022-02-04', '14:36:14', '2022-02-04 08:36:14', '2022-02-04 08:36:14'),
(28, 1, '127.0.0.1', 'Dashboard &raquo; Categories of  Products', 'unknown', 'http://127.0.0.1:8000/admin/8/categories', '0.15933895', '2022-02-04', '14:37:19', '2022-02-04 08:37:19', '2022-02-04 08:37:19'),
(29, 1, '127.0.0.1', 'Dashboard &raquo; Categories of  Products', 'unknown', 'http://127.0.0.1:8000/admin/8/categories/create', '0.16961288', '2022-02-04', '14:37:23', '2022-02-04 08:37:23', '2022-02-04 08:37:23'),
(30, 1, '127.0.0.1', 'Dashboard &raquo; Site Menus', 'unknown', 'http://127.0.0.1:8000/admin/menus/4/edit/1', '0.1709621', '2022-02-04', '14:41:23', '2022-02-04 08:41:23', '2022-02-04 08:41:23'),
(31, 1, '127.0.0.1', 'Dashboard &raquo; Site Menus', 'unknown', 'http://127.0.0.1:8000/admin/menus/5/edit/1', '0.1658659', '2022-02-04', '14:45:52', '2022-02-04 08:45:52', '2022-02-04 08:45:52'),
(32, 1, '127.0.0.1', 'Dashboard &raquo; Site Menus', 'unknown', 'http://127.0.0.1:8000/admin/menus/6/edit/1', '0.48841691', '2022-02-04', '14:49:38', '2022-02-04 08:49:38', '2022-02-04 08:49:38'),
(33, 1, '127.0.0.1', 'Dashboard &raquo; Site Menus', 'unknown', 'http://127.0.0.1:8000/admin/menus/3/edit/1', '0.17575717', '2022-02-04', '14:54:35', '2022-02-04 08:54:35', '2022-02-04 08:54:35'),
(34, 1, '127.0.0.1', 'Dashboard &raquo; Site Menus', 'unknown', 'http://127.0.0.1:8000/admin/menus/11/edit/1', '0.18833303', '2022-02-04', '14:55:32', '2022-02-04 08:55:32', '2022-02-04 08:55:32'),
(35, 1, '127.0.0.1', 'Dashboard &raquo; Site Menus', 'unknown', 'http://127.0.0.1:8000/admin/menus/1', '0.18278718', '2022-02-04', '14:55:41', '2022-02-04 08:55:41', '2022-02-04 08:55:41'),
(36, 1, '127.0.0.1', 'Dashboard &raquo; Site Menus', 'unknown', 'http://127.0.0.1:8000/admin/menus/7/edit/1', '0.1705029', '2022-02-04', '14:55:45', '2022-02-04 08:55:45', '2022-02-04 08:55:45'),
(37, 1, '127.0.0.1', 'Dashboard &raquo; Site Menus', 'unknown', 'http://127.0.0.1:8000/admin/menus/8/edit/1', '0.18190503', '2022-02-04', '14:55:57', '2022-02-04 08:55:57', '2022-02-04 08:55:57'),
(38, 1, '127.0.0.1', 'Dashboard &raquo; Site Menus', 'unknown', 'http://127.0.0.1:8000/admin/menus/9/edit/1', '0.17607903', '2022-02-04', '14:56:15', '2022-02-04 08:56:15', '2022-02-04 08:56:15'),
(39, 1, '127.0.0.1', 'Dashboard &raquo; Site Menus', 'unknown', 'http://127.0.0.1:8000/admin/menus/10/edit/1', '0.16359687', '2022-02-04', '14:56:24', '2022-02-04 08:56:24', '2022-02-04 08:56:24'),
(40, 1, '127.0.0.1', 'Dashboard &raquo; Site Menus', 'unknown', 'http://127.0.0.1:8000/admin/menus/create/1', '0.17268586', '2022-02-04', '14:56:52', '2022-02-04 08:56:52', '2022-02-04 08:56:52'),
(41, 1, '127.0.0.1', 'Dashboard &raquo; Site Menus', 'unknown', 'http://127.0.0.1:8000/admin/menus/19/edit/1', '0.20597196', '2022-02-04', '14:59:24', '2022-02-04 08:59:24', '2022-02-04 08:59:24'),
(42, 2, '127.0.0.1', 'Dashboard &raquo; Sign in to CONTROL', 'unknown', 'http://127.0.0.1:8000/admin/login', '0.20266008', '2022-02-05', '01:32:38', '2022-02-04 19:32:38', '2022-02-04 19:32:38'),
(43, 2, '127.0.0.1', 'Dashboard &raquo; Site Menus', 'unknown', 'http://127.0.0.1:8000/admin/menus/19/edit/1', '0.20614314', '2022-02-05', '01:32:58', '2022-02-04 19:32:58', '2022-02-04 19:32:58'),
(44, 2, '127.0.0.1', 'Dashboard &raquo; Ad. Banners', 'unknown', 'http://127.0.0.1:8000/admin/banners', '0.20589995', '2022-02-05', '01:33:08', '2022-02-04 19:33:08', '2022-02-04 19:33:08'),
(45, 2, '127.0.0.1', 'Dashboard &raquo; Ad. Banners', 'unknown', 'http://127.0.0.1:8000/admin/banners/1/edit', '0.21998596', '2022-02-05', '01:33:14', '2022-02-04 19:33:14', '2022-02-04 19:33:14'),
(46, 2, '127.0.0.1', 'Dashboard &raquo; Site Menus', 'unknown', 'http://127.0.0.1:8000/admin/menus', '0.28022408', '2022-02-05', '01:40:12', '2022-02-04 19:40:12', '2022-02-04 19:40:12'),
(47, 2, '127.0.0.1', 'Dashboard &raquo; Site Menus', 'unknown', 'http://127.0.0.1:8000/admin/menus/1', '0.17703485', '2022-02-05', '01:40:29', '2022-02-04 19:40:29', '2022-02-04 19:40:29'),
(48, 2, '127.0.0.1', 'Dashboard &raquo; Site Menus', 'unknown', 'http://127.0.0.1:8000/admin/menus/7/edit/1', '0.17847204', '2022-02-05', '01:40:37', '2022-02-04 19:40:37', '2022-02-04 19:40:37'),
(49, 2, '127.0.0.1', 'Dashboard &raquo; Site Title', 'unknown', 'http://127.0.0.1:8000/admin', '0.22753596', '2022-02-05', '01:46:45', '2022-02-04 19:46:45', '2022-02-04 19:46:45'),
(50, 2, '127.0.0.1', 'Dashboard &raquo; Site Menus', 'unknown', 'http://127.0.0.1:8000/admin/menus/3/edit/1', '0.17326403', '2022-02-05', '01:54:57', '2022-02-04 19:54:57', '2022-02-04 19:54:57'),
(51, 2, '127.0.0.1', 'Dashboard &raquo; Site Menus', 'unknown', 'http://127.0.0.1:8000/admin/menus/4/edit/1', '0.17674112', '2022-02-05', '01:55:06', '2022-02-04 19:55:06', '2022-02-04 19:55:06'),
(52, 2, '127.0.0.1', 'Dashboard &raquo; Site Menus', 'unknown', 'http://127.0.0.1:8000/admin/menus/12/edit/1', '0.15903902', '2022-02-05', '01:55:22', '2022-02-04 19:55:22', '2022-02-04 19:55:22'),
(53, 2, '127.0.0.1', 'Dashboard &raquo; General Settings', 'unknown', 'http://127.0.0.1:8000/admin/settings', '0.60088205', '2022-02-05', '02:14:07', '2022-02-04 20:14:07', '2022-02-04 20:14:07'),
(54, 2, '127.0.0.1', 'Dashboard &raquo; General Settings', 'unknown', 'http://127.0.0.1:8000/admin/webmaster', '0.51903105', '2022-02-05', '02:14:30', '2022-02-04 20:14:30', '2022-02-04 20:14:30'),
(55, 2, '127.0.0.1', 'Dashboard &raquo; Users &amp; Permissions', 'unknown', 'http://127.0.0.1:8000/admin/users', '0.622015', '2022-02-05', '02:17:13', '2022-02-04 20:17:13', '2022-02-04 20:17:13'),
(56, 2, '127.0.0.1', 'Dashboard &raquo; Users &amp; Permissions', 'unknown', 'http://127.0.0.1:8000/admin/users/1/edit', '0.16176295', '2022-02-05', '02:17:23', '2022-02-04 20:17:23', '2022-02-04 20:17:23'),
(57, 2, '127.0.0.1', 'Site Title', 'unknown', 'http://127.0.0.1:8000/', '0.6073091', '2022-02-05', '02:28:37', '2022-02-04 20:28:37', '2022-02-04 20:28:37'),
(58, 2, '127.0.0.1', 'Dashboard &raquo; 403', 'unknown', 'http://127.0.0.1:8000/admin/403', '0.14472604', '2022-02-05', '11:00:55', '2022-02-05 05:00:55', '2022-02-05 05:00:55'),
(59, 2, '127.0.0.1', 'Dashboard &raquo; Site Title', 'unknown', 'http://127.0.0.1:8000/admin/', '0.27886796', '2022-02-05', '11:01:00', '2022-02-05 05:01:00', '2022-02-05 05:01:00'),
(60, 2, '127.0.0.1', 'Site Title', 'unknown', 'http://127.0.0.1:8000//assets/dashboard/js/flot/jquery.flot.js', '0.54094315', '2022-02-05', '11:01:00', '2022-02-05 05:01:00', '2022-02-05 05:01:00'),
(61, 2, '127.0.0.1', 'Site Title', 'unknown', 'http://127.0.0.1:8000//assets/dashboard/js/flot/jquery.flot.resize.js', '0.27929711', '2022-02-05', '11:01:01', '2022-02-05 05:01:01', '2022-02-05 05:01:01'),
(62, 2, '127.0.0.1', 'Site Title', 'unknown', 'http://127.0.0.1:8000//assets/dashboard/js/flot/jquery.flot.pie.js', '0.28551292', '2022-02-05', '11:01:01', '2022-02-05 05:01:01', '2022-02-05 05:01:01'),
(63, 2, '127.0.0.1', 'Site Title', 'unknown', 'http://127.0.0.1:8000//assets/dashboard/js/flot.tooltip/js/jquery.flot.tooltip.min.js', '0.36097693', '2022-02-05', '11:01:01', '2022-02-05 05:01:01', '2022-02-05 05:01:01'),
(64, 2, '127.0.0.1', 'Site Title', 'unknown', 'http://127.0.0.1:8000//assets/dashboard/js/flot-spline/js/jquery.flot.spline.min.js', '0.65102887', '2022-02-05', '11:01:02', '2022-02-05 05:01:02', '2022-02-05 05:01:02'),
(65, 2, '127.0.0.1', 'Site Title', 'unknown', 'http://127.0.0.1:8000//assets/dashboard/js/flot.orderbars/js/jquery.flot.orderBars.js', '0.25051498', '2022-02-05', '11:01:02', '2022-02-05 05:01:02', '2022-02-05 05:01:02'),
(66, 2, '127.0.0.1', 'Site Title', 'unknown', 'http://127.0.0.1:8000//assets/dashboard/js/select2/dist/css/select2.min.css', '0.46984696', '2022-02-05', '12:07:11', '2022-02-05 06:07:11', '2022-02-05 06:07:11'),
(67, 2, '127.0.0.1', 'Site Title', 'unknown', 'http://127.0.0.1:8000//assets/dashboard/js/select2-bootstrap-theme/dist/select2-bootstrap.min.css', '0.48266697', '2022-02-05', '12:07:12', '2022-02-05 06:07:12', '2022-02-05 06:07:12'),
(68, 2, '127.0.0.1', 'Site Title', 'unknown', 'http://127.0.0.1:8000//assets/dashboard/js/select2-bootstrap-theme/dist/select2-bootstrap.4.css', '0.24719191', '2022-02-05', '12:07:12', '2022-02-05 06:07:12', '2022-02-05 06:07:12'),
(69, 2, '127.0.0.1', 'Site Title', 'unknown', 'http://127.0.0.1:8000//assets/dashboard/js/select2/dist/js/select2.min.js', '0.26093197', '2022-02-05', '12:07:12', '2022-02-05 06:07:12', '2022-02-05 06:07:12'),
(70, 2, '127.0.0.1', 'Dashboard &raquo; Banners settings', 'unknown', 'http://127.0.0.1:8000/admin/webmaster/banners', '0.18417096', '2022-02-05', '12:07:49', '2022-02-05 06:07:49', '2022-02-05 06:07:49'),
(71, 2, '127.0.0.1', 'Site Title', 'unknown', 'http://127.0.0.1:8000/?', '0.23157597', '2022-02-05', '19:38:53', '2022-02-05 13:38:53', '2022-02-05 13:38:53'),
(72, 2, '127.0.0.1', 'Site Title', 'unknown', 'http://127.0.0.1:8000/home', '0.23765898', '2022-02-05', '20:50:36', '2022-02-05 14:50:36', '2022-02-05 14:50:36'),
(73, 3, '127.0.0.1', 'Dashboard &raquo; Ad. Banners', 'unknown', 'http://127.0.0.1:8000/admin/banners', '0.74097204', '2022-02-06', '00:00:46', '2022-02-05 18:00:46', '2022-02-05 18:00:46'),
(74, 3, '127.0.0.1', 'Dashboard &raquo; Ad. Banners', 'unknown', 'http://127.0.0.1:8000/admin/banners/create/1', '0.213907', '2022-02-06', '00:00:52', '2022-02-05 18:00:52', '2022-02-05 18:00:52'),
(75, 3, '127.0.0.1', 'Dashboard &raquo; Ad. Banners', 'unknown', 'http://127.0.0.1:8000/admin/banners/1/edit', '0.19576502', '2022-02-06', '00:01:29', '2022-02-05 18:01:29', '2022-02-05 18:01:29'),
(76, 3, '127.0.0.1', 'Site Title', 'unknown', 'http://127.0.0.1:8000/home', '0.32269382', '2022-02-06', '00:02:27', '2022-02-05 18:02:27', '2022-02-05 18:02:27'),
(77, 3, '127.0.0.1', 'Dashboard &raquo; Ad. Banners', 'unknown', 'http://127.0.0.1:8000/admin/banners/7/edit', '0.18547893', '2022-02-06', '00:14:47', '2022-02-05 18:14:47', '2022-02-05 18:14:47'),
(78, 3, '127.0.0.1', 'Dashboard &raquo; Ad. Banners', 'unknown', 'http://127.0.0.1:8000/admin/banners/8/edit', '0.21182609', '2022-02-06', '00:15:06', '2022-02-05 18:15:06', '2022-02-05 18:15:06'),
(79, 3, '127.0.0.1', 'Dashboard &raquo; Ad. Banners', 'unknown', 'http://127.0.0.1:8000/admin/banners/9/edit', '0.28199601', '2022-02-06', '00:15:26', '2022-02-05 18:15:26', '2022-02-05 18:15:26'),
(80, 3, '127.0.0.1', 'Dashboard &raquo; Site pages', 'unknown', 'http://127.0.0.1:8000/admin/1/topics', '0.79835105', '2022-02-06', '01:08:20', '2022-02-05 19:08:20', '2022-02-05 19:08:20'),
(81, 3, '127.0.0.1', 'Dashboard &raquo; Categories of  Products', 'unknown', 'http://127.0.0.1:8000/admin/8/categories', '2.08695698', '2022-02-06', '01:40:13', '2022-02-05 19:40:13', '2022-02-05 19:40:13'),
(82, 3, '127.0.0.1', 'Dashboard &raquo; Products', 'unknown', 'http://127.0.0.1:8000/admin/8/topics', '0.53915119', '2022-02-06', '01:40:27', '2022-02-05 19:40:27', '2022-02-05 19:40:27'),
(83, 3, '127.0.0.1', 'Dashboard &raquo; Products', 'unknown', 'http://127.0.0.1:8000/admin/8/topics/create', '0.49558902', '2022-02-06', '01:40:33', '2022-02-05 19:40:33', '2022-02-05 19:40:33'),
(84, 3, '127.0.0.1', 'Site Title', 'unknown', 'http://127.0.0.1:8000//assets/dashboard/js/select2/dist/css/select2.min.css', '1.017138', '2022-02-06', '01:40:35', '2022-02-05 19:40:35', '2022-02-05 19:40:35'),
(85, 3, '127.0.0.1', 'Site Title', 'unknown', 'http://127.0.0.1:8000//assets/dashboard/js/select2-bootstrap-theme/dist/select2-bootstrap.min.css', '0.34357405', '2022-02-06', '01:40:36', '2022-02-05 19:40:36', '2022-02-05 19:40:36'),
(86, 3, '127.0.0.1', 'Site Title', 'unknown', 'http://127.0.0.1:8000//assets/dashboard/js/select2-bootstrap-theme/dist/select2-bootstrap.4.css', '0.25477386', '2022-02-06', '01:40:36', '2022-02-05 19:40:36', '2022-02-05 19:40:36'),
(87, 3, '127.0.0.1', 'Site Title', 'unknown', 'http://127.0.0.1:8000//assets/dashboard/js/select2/dist/js/select2.min.js', '0.25413895', '2022-02-06', '01:40:36', '2022-02-05 19:40:36', '2022-02-05 19:40:36'),
(88, 3, '127.0.0.1', 'Site Title', 'unknown', 'http://127.0.0.1:8000/seller-basic', '0.66245484', '2022-02-06', '02:23:19', '2022-02-05 20:23:19', '2022-02-05 20:23:19'),
(89, 3, '127.0.0.1', 'Site Title', 'unknown', 'http://127.0.0.1:8000/', '0.34572506', '2022-02-06', '11:46:32', '2022-02-06 05:46:32', '2022-02-06 05:46:32'),
(90, 4, '88.198.58.29', 'Site Title', 'unknown', 'http://sislam.raisawebcloud.com/', '0.38149905', '2022-02-06', '23:37:49', '2022-02-06 17:37:49', '2022-02-06 17:37:49'),
(91, 5, '88.198.58.29', 'Site Title', 'unknown', 'http://sislam.raisawebcloud.com/', '0.17741299', '2022-02-07', '00:03:50', '2022-02-06 18:03:50', '2022-02-06 18:03:50');

-- --------------------------------------------------------

--
-- Table structure for table `smartend_analytics_visitors`
--

CREATE TABLE `smartend_analytics_visitors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_cor1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_cor2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `os` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `browser` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resolution` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referrer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hostname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `org` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smartend_analytics_visitors`
--

INSERT INTO `smartend_analytics_visitors` (`id`, `ip`, `city`, `country_code`, `country`, `region`, `full_address`, `location_cor1`, `location_cor2`, `os`, `browser`, `resolution`, `referrer`, `hostname`, `org`, `date`, `time`, `created_at`, `updated_at`) VALUES
(1, '127.0.0.1', 'unknown', 'US', 'unknown', 'Connecticut', NULL, '41.31', '-72.92', 'Mac OS X', 'Chrome', 'unknown', 'unknown', 'NA', 'America/New_York', '2022-02-04', '06:08:42', '2022-02-04 00:08:42', '2022-02-04 00:08:42'),
(2, '127.0.0.1', 'unknown', 'unknown', 'unknown', 'Connecticut', NULL, '41.31', '-72.92', 'Mac OS X', 'Chrome', 'unknown', 'http://127.0.0.1:8000/admin/menus/19/edit/1', 'NA', 'America/New_York', '2022-02-05', '01:32:38', '2022-02-04 19:32:38', '2022-02-04 19:32:38'),
(3, '127.0.0.1', 'unknown', 'unknown', 'unknown', 'Connecticut', NULL, '41.31', '-72.92', 'Mac OS X', 'Chrome', 'unknown', 'http://127.0.0.1:8000/admin/banners/1/edit', 'NA', 'America/New_York', '2022-02-06', '00:00:46', '2022-02-05 18:00:46', '2022-02-05 18:00:46'),
(4, '88.198.58.29', 'Munich', 'DE', 'Germany', 'Bavaria', NULL, '48.1336', '11.5658', 'Mac OS X', 'Chrome', 'unknown', 'unknown', 'Unknown', 'Europe/Berlin', '2022-02-06', '23:37:49', '2022-02-06 17:37:49', '2022-02-06 17:37:49'),
(5, '88.198.58.29', 'Munich', 'Germany', 'unknown', 'Bavaria', NULL, '48.1336', '11.5658', 'Windows 7', NULL, 'unknown', 'unknown', 'Unknown', 'Europe/Berlin', '2022-02-07', '00:03:50', '2022-02-06 18:03:50', '2022-02-06 18:03:50');

-- --------------------------------------------------------

--
-- Table structure for table `smartend_attach_files`
--

CREATE TABLE `smartend_attach_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `topic_id` int(11) NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `row_no` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title_bn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `smartend_banners`
--

CREATE TABLE `smartend_banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_id` int(11) NOT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_type` tinyint(4) DEFAULT NULL,
  `youtube_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `visits` int(11) NOT NULL,
  `row_no` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title_bn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_bn` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_bn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smartend_banners`
--

INSERT INTO `smartend_banners` (`id`, `section_id`, `title_en`, `details_en`, `code`, `file_en`, `video_type`, `youtube_link`, `link_url`, `icon`, `status`, `visits`, `row_no`, `created_by`, `updated_by`, `created_at`, `updated_at`, `title_bn`, `details_bn`, `file_bn`) VALUES
(1, 1, 'Hassle-free and easy way instantly sell, buy or exchange your car at any time in Bangladesh with S Islam Cars', '<i class=\"fa fa-check-circle fa-bse\"></i>We will buy your used car, assist you in buying a new one or you can exchange your car\r\n<i class=\"fa fa-check-circle fa-bse\"></i>Secure & instant payments by cash or bank online transfer\r\n<i class=\"fa fa-check-circle fa-bse\"></i>We arrange all the paperwork', NULL, '16440072544753.jpg', NULL, NULL, NULL, NULL, 1, 0, 1, 1, 1, '2020-12-12 17:50:55', '2022-02-05 13:12:16', 'বাংলাদেশের যেকোনো জায়গা থেকে মুহূর্তেই ঝামেলামুক্ত এবং সহজ উপায়ে আপনি গাড়ী ক্রয়, বিক্রয় বা বদল করতে পারেন এস ইসলাম কারস এর সাথে', '<i class=\"fa fa-check-circle fa-bse\"></i>আপনার ব্যবহৃত গাড়ীটি বিক্রি করতে পারেন, আপনার পছন্দের গাড়িটি ক্রয় করতে পারেন অথবা আপনি আপনার গাড়ী বদল করতে পারেন আমাদের যে কোনো গাড়ির সাথে\r\n<i class=\"fa fa-check-circle fa-bse\"></i>নগদ বা অনলাইন ব্যাঙ্কিং এর মাধ্যমে নিরাপদ ও তাৎক্ষণিক লেনদেন\r\n<i class=\"fa fa-check-circle fa-bse\"></i>কাগজপত্রের সকল কাজ আমরা করে দিবো', '16440072541339.jpg'),
(3, 2, 'Responsive Design', 'It is a long established fact that a reader will be distracted by the readable content of a page.', NULL, '', NULL, NULL, '#', 'fa-object-group', 1, 0, 1, 1, NULL, '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Responsive Design', 'It is a long established fact that a reader will be distracted by the readable content of a page.', NULL),
(4, 2, 'HTML5 & CSS3', 'It is a long established fact that a reader will be distracted by the readable content of a page.', NULL, '', NULL, NULL, '#', 'fa-html5', 1, 0, 2, 1, NULL, '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'HTML5 & CSS3', 'It is a long established fact that a reader will be distracted by the readable content of a page.', NULL),
(5, 2, 'Bootstrap Used', 'It is a long established fact that a reader will be distracted by the readable content of a page.', NULL, '', NULL, NULL, '#', 'fa-code', 1, 0, 3, 1, NULL, '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Bootstrap Used', 'It is a long established fact that a reader will be distracted by the readable content of a page.', NULL),
(6, 2, 'Classic Design', 'It is a long established fact that a reader will be distracted by the readable content of a page.', NULL, '', NULL, NULL, '#', 'fa-laptop', 1, 0, 4, 1, NULL, '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Classic Design', 'It is a long established fact that a reader will be distracted by the readable content of a page.', NULL),
(7, 1, 'Hassle-free and easy way instantly sell, buy or exchange your car at any time in Bangladesh with S Islam Cars', '<i class=\"fa fa-check-circle fa-bse\"></i>We will buy your used car, assist you in buying a new one or you can exchange your car\r\n<i class=\"fa fa-check-circle fa-bse\"></i>Secure & instant payments by cash or bank online transfer\r\n<i class=\"fa fa-check-circle fa-bse\"></i>We arrange all the paperwork', NULL, '16440849001244.jpg', NULL, NULL, NULL, NULL, 1, 0, 5, 1, 1, '2022-02-05 18:02:21', '2022-02-05 18:15:00', 'বাংলাদেশের যেকোনো জায়গা থেকে মুহূর্তেই ঝামেলামুক্ত এবং সহজ উপায়ে আপনি গাড়ী ক্রয়, বিক্রয় বা বদল করতে পারেন এস ইসলাম কারস এর সাথে', '<i class=\"fa fa-check-circle fa-bse\"></i>আপনার ব্যবহৃত গাড়ীটি বিক্রি করতে পারেন, আপনার পছন্দের গাড়িটি ক্রয় করতে পারেন অথবা আপনি আপনার গাড়ী বদল করতে পারেন আমাদের যে কোনো গাড়ির সাথে\r\n<i class=\"fa fa-check-circle fa-bse\"></i>নগদ বা অনলাইন ব্যাঙ্কিং এর মাধ্যমে নিরাপদ ও তাৎক্ষণিক লেনদেন\r\n<i class=\"fa fa-check-circle fa-bse\"></i>কাগজপত্রের সকল কাজ আমরা করে দিবো', '16440849001776.jpg'),
(8, 1, 'Hassle-free and easy way instantly sell, buy or exchange your car at any time in Bangladesh with S Islam Cars', '<i class=\"fa fa-check-circle fa-bse\"></i>We will buy your used car, assist you in buying a new one or you can exchange your car\r\n<i class=\"fa fa-check-circle fa-bse\"></i>Secure & instant payments by cash or bank online transfer\r\n<i class=\"fa fa-check-circle fa-bse\"></i>We arrange all the paperwork', NULL, '16440849184753.jpg', NULL, NULL, NULL, NULL, 1, 0, 6, 1, 1, '2022-02-05 18:06:01', '2022-02-05 18:15:18', 'বাংলাদেশের যেকোনো জায়গা থেকে মুহূর্তেই ঝামেলামুক্ত এবং সহজ উপায়ে আপনি গাড়ী ক্রয়, বিক্রয় বা বদল করতে পারেন এস ইসলাম কারস এর সাথে', '<i class=\"fa fa-check-circle fa-bse\"></i>আপনার ব্যবহৃত গাড়ীটি বিক্রি করতে পারেন, আপনার পছন্দের গাড়িটি ক্রয় করতে পারেন অথবা আপনি আপনার গাড়ী বদল করতে পারেন আমাদের যে কোনো গাড়ির সাথে\r\n<i class=\"fa fa-check-circle fa-bse\"></i>নগদ বা অনলাইন ব্যাঙ্কিং এর মাধ্যমে নিরাপদ ও তাৎক্ষণিক লেনদেন\r\n<i class=\"fa fa-check-circle fa-bse\"></i>কাগজপত্রের সকল কাজ আমরা করে দিবো', '16440849189802.jpg'),
(9, 1, 'Hassle-free and easy way instantly sell, buy or exchange your car at any time in Bangladesh with S Islam Cars', '<i class=\"fa fa-check-circle fa-bse\"></i>We will buy your used car, assist you in buying a new one or you can exchange your car\r\n<i class=\"fa fa-check-circle fa-bse\"></i>Secure & instant payments by cash or bank online transfer\r\n<i class=\"fa fa-check-circle fa-bse\"></i>We arrange all the paperwork', NULL, '16440849395939.jpg', NULL, NULL, NULL, NULL, 1, 0, 7, 1, 1, '2022-02-05 18:08:14', '2022-02-05 18:15:39', 'বাংলাদেশের যেকোনো জায়গা থেকে মুহূর্তেই ঝামেলামুক্ত এবং সহজ উপায়ে আপনি গাড়ী ক্রয়, বিক্রয় বা বদল করতে পারেন এস ইসলাম কারস এর সাথে', '<i class=\"fa fa-check-circle fa-bse\"></i>আপনার ব্যবহৃত গাড়ীটি বিক্রি করতে পারেন, আপনার পছন্দের গাড়িটি ক্রয় করতে পারেন অথবা আপনি আপনার গাড়ী বদল করতে পারেন আমাদের যে কোনো গাড়ির সাথে\r\n<i class=\"fa fa-check-circle fa-bse\"></i>নগদ বা অনলাইন ব্যাঙ্কিং এর মাধ্যমে নিরাপদ ও তাৎক্ষণিক লেনদেন\r\n<i class=\"fa fa-check-circle fa-bse\"></i>কাগজপত্রের সকল কাজ আমরা করে দিবো', '16440849396786.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `smartend_body_type`
--

CREATE TABLE `smartend_body_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `smartend_body_type`
--

INSERT INTO `smartend_body_type` (`id`, `name`, `status`) VALUES
(1, 'Sedan', 1),
(2, 'SUV', 1),
(3, 'Microbus', 1),
(4, 'Compact SUV', 1),
(5, 'Bus', 1),
(6, 'Compact', 1),
(7, 'Compact MPV', 1),
(8, 'Convertible', 1),
(9, 'Coupe', 1),
(10, 'Covered Van', 1),
(11, 'Hatchback', 1),
(12, 'Luxury Sedan', 1),
(13, 'Mini Bus', 1),
(14, 'MPV', 1),
(15, 'Off-Road', 1),
(16, 'Saloon', 1),
(17, 'Scooter', 1),
(18, 'Sports Car', 1),
(19, 'Wagon', 1),
(20, 'Estate', 1),
(21, 'Others', 1);

-- --------------------------------------------------------

--
-- Table structure for table `smartend_car_brand`
--

CREATE TABLE `smartend_car_brand` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `smartend_car_brand`
--

INSERT INTO `smartend_car_brand` (`id`, `name`, `status`) VALUES
(1, 'Toyota', 1),
(2, 'Honda', 1),
(3, 'Nissan', 1),
(4, 'Mitsubishi', 1),
(5, 'Akij', 1),
(6, 'Alfa Romeo', 1),
(7, 'Audi', 1),
(8, 'BAIC', 1),
(9, 'BMW', 1),
(10, 'Audi', 1),
(11, 'BAIC', 1),
(12, 'BMW', 1),
(13, 'Audi', 1),
(14, 'BAIC', 1),
(15, 'BMW', 1),
(16, 'Audi', 1),
(17, 'BAIC', 1),
(18, 'BMW', 1),
(19, 'Buick', 1),
(20, 'Cadillac', 1),
(21, 'Changan', 1),
(22, 'Chery', 1),
(23, 'Chevrolet', 1),
(24, 'Chrysler', 1),
(25, 'Citroen', 1),
(26, 'Daewoo', 1),
(27, 'Daihatsu', 1),
(28, 'Datsun', 1),
(29, 'DFSK', 1),
(30, 'Dodge', 1),
(31, 'Ferrari', 1),
(32, 'Fiat', 1),
(33, 'Foday', 1),
(34, 'Ford', 1),
(35, 'Geely', 1),
(36, 'GMC', 1),
(37, 'Great Wall', 1),
(38, 'Haval', 1),
(39, 'Hino', 1),
(40, 'Honda', 1),
(41, 'Hummer', 1),
(42, 'Hyundai', 1),
(43, 'Infiniti', 1),
(44, 'Isuzu', 1),
(45, 'Jaguar', 1),
(46, 'Jeep', 1),
(47, 'Jinbei', 1),
(48, 'JMC', 1),
(49, 'JONWAY', 1),
(50, 'Kia', 1),
(51, 'Lamborghini', 1),
(52, 'Land Rover', 1),
(53, 'Lexus', 1),
(54, 'Lincoln', 1),
(55, 'Mahindra', 1),
(56, 'Maruti Suzuki', 1),
(57, 'Maruti', 1),
(58, 'Mazda', 1),
(59, 'Mercedes-Benz', 1),
(60, 'MG', 1),
(61, 'Mini', 1),
(62, 'Moto Guzzi', 1),
(63, 'Oldsmobile', 1),
(64, 'Opel', 1),
(65, 'Peugeot', 1),
(66, 'Plymouth', 1),
(67, 'Pontiac', 1),
(68, 'Porsche', 1),
(69, 'Pragoti', 1),
(70, 'Proton', 1),
(71, 'Range Rover', 1),
(72, 'Renault', 1),
(73, 'Rover', 1),
(74, 'Royal Enfield', 1),
(75, 'SAAB', 1),
(76, 'Scion', 1),
(77, 'SEAT', 1),
(78, 'Skoda', 1),
(79, 'Smart', 1),
(80, 'SsangYong', 1),
(81, 'Subaru', 1),
(82, 'Suzuki', 1),
(83, 'Tata', 1),
(84, 'Tesla', 1),
(85, 'Vauxhall', 1),
(86, 'Volkswagen', 1),
(87, 'Volvo', 1),
(88, 'Zotye', 1),
(89, 'Other brand', 1);

-- --------------------------------------------------------

--
-- Table structure for table `smartend_car_condition`
--

CREATE TABLE `smartend_car_condition` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `status` tinyint(2) DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `smartend_car_condition`
--

INSERT INTO `smartend_car_condition` (`id`, `name`, `status`) VALUES
(1, 'New', 1),
(2, 'Recondition', 1),
(3, 'Used', 1);

-- --------------------------------------------------------

--
-- Table structure for table `smartend_car_model`
--

CREATE TABLE `smartend_car_model` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `car_brand` int(11) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `smartend_car_model`
--

INSERT INTO `smartend_car_model` (`id`, `name`, `car_brand`, `status`) VALUES
(1, '2000GT', 1, 1),
(2, '4Runner', 1, 1),
(3, '86', 1, 1),
(4, 'Agya', 1, 1),
(5, 'Allex', 1, 1),
(6, 'Allion', 1, 1),
(7, 'Alphard', 1, 1),
(8, 'Altis', 1, 1),
(9, 'Aqua', 1, 1),
(10, 'Aurion', 1, 1),
(11, 'Auris', 1, 1),
(12, 'Avalon', 1, 1),
(13, 'Avanza', 1, 1),
(14, 'Avensis', 1, 1),
(15, 'Axio', 1, 1),
(16, 'Aygo', 1, 1),
(17, 'Ayla', 1, 1),
(18, 'Belta', 1, 1),
(19, 'Brevis', 1, 1),
(20, 'C-HR	', 1, 1),
(21, 'Caldina', 1, 1),
(22, 'Cami', 1, 1),
(23, 'Camry', 1, 1),
(24, 'Carina', 1, 1),
(25, 'Carri', 1, 1),
(26, 'Cavalier', 1, 1),
(27, 'Celica', 1, 1),
(28, 'Celsior', 1, 1),
(29, 'Century', 1, 1),
(30, 'Chaser', 1, 1),
(31, 'Classic', 1, 1),
(32, 'Coaster', 1, 1),
(33, 'Comfort', 1, 1),
(34, 'Condor', 1, 1),
(35, 'Corolla', 1, 1),
(36, 'Corona', 1, 1),
(37, 'Corsa', 1, 1),
(38, 'Cresta', 1, 1),
(39, 'Cross', 1, 1),
(40, 'Crown', 1, 1),
(41, 'Curren', 1, 1),
(42, 'Cygnus', 1, 1),
(43, 'Cynos', 1, 1),
(44, 'Dyna', 1, 1),
(45, 'Echo', 1, 1),
(46, 'Esquire', 1, 1),
(47, 'Estima', 1, 1),
(48, 'Etios', 1, 1),
(49, 'Etios Liva', 1, 1),
(50, 'Exiv', 1, 1),
(51, 'FJ Cruiser', 1, 1),
(52, 'Fielder', 1, 1),
(53, 'Fortuner	', 1, 1),
(54, 'Gaia', 1, 1),
(55, 'Harrier', 1, 1),
(56, 'HiClass', 1, 1),
(57, 'Hiace', 1, 1),
(58, 'Highlander', 1, 1),
(59, 'Hilux', 1, 1),
(60, 'Innova', 1, 1),
(61, 'Ipsum', 1, 1),
(62, 'Isis', 1, 1),
(63, 'Kijang', 1, 1),
(64, 'Kingdom', 1, 1),
(65, 'Kluger', 1, 1),
(66, 'Land Cruiser', 1, 1),
(67, 'LiteAce', 1, 1),
(68, 'MR2', 1, 1),
(69, 'Mark II', 1, 1),
(70, 'Mark X', 1, 1),
(71, 'Matrix', 1, 1),
(72, 'Mega Cruiser', 1, 1),
(73, 'Mirai', 1, 1),
(74, 'Nadia', 1, 1),
(75, 'Noah', 1, 1),
(76, 'Opa', 1, 1),
(77, 'Origin', 1, 1),
(78, 'Paseo', 1, 1),
(79, 'Passo', 1, 1),
(80, 'Platz', 1, 1),
(81, 'Porte', 1, 1),
(82, 'Prado', 1, 1),
(83, 'Premio', 1, 1),
(84, 'Previa', 1, 1),
(85, 'Prius', 1, 1),
(86, 'ProAce', 1, 1),
(87, 'Probox', 1, 1),
(88, 'Progres', 1, 1),
(89, 'Publica', 1, 1),
(90, 'RAV4', 1, 1),
(91, 'Ractis', 1, 1),
(92, 'Raum', 1, 1),
(93, 'Revo', 1, 1),
(94, 'Rumion	', 1, 1),
(95, 'Rush', 1, 1),
(96, 'SA', 1, 1),
(97, 'Sai', 1, 1),
(98, 'Scion', 1, 1),
(99, 'Sequoia', 1, 1),
(100, 'Sera', 1, 1),
(101, 'Sienna', 1, 1),
(102, 'Sienta', 1, 1),
(103, 'Soarer', 1, 1),
(104, 'Sofia', 1, 1),
(105, 'Spacio', 1, 1),
(106, 'Spade', 1, 1),
(107, 'Sprinter', 1, 1),
(108, 'Starlet', 1, 1),
(109, 'Succeed', 1, 1),
(110, 'Supra', 1, 1),
(111, 'T100', 1, 1),
(112, 'Tacoma', 1, 1),
(113, 'Tank', 1, 1),
(114, 'Tercel', 1, 1),
(115, 'TownAce', 1, 1),
(116, 'ToyoAce', 1, 1),
(117, 'Tundra', 1, 1),
(118, 'Urban Cruiser', 1, 1),
(119, 'Vanguard', 1, 1),
(120, 'Venza', 1, 1),
(121, 'Verossa', 1, 1),
(122, 'Verso', 1, 1),
(123, 'Vios', 1, 1),
(124, 'Vista', 1, 1),
(125, 'Vitz', 1, 1),
(126, 'Voltz', 1, 1),
(127, 'Voxy', 1, 1),
(128, 'Wish', 1, 1),
(129, 'X Assista', 1, 1),
(130, 'Yaris', 1, 1),
(131, 'Zelas', 1, 1),
(132, 'bB', 1, 1),
(133, 'eCom', 1, 1),
(134, 'iQ', 1, 1),
(135, 'ist', 1, 1),
(136, 'sportivo', 1, 1),
(137, 'RunX', 1, 1),
(138, 'Starlet Soleil', 1, 1),
(139, 'Other Model', 1, 1),
(140, 'Accord', 2, 1),
(141, 'Airwave', 2, 1),
(142, 'Amaze', 2, 1),
(143, 'Ascot', 2, 1),
(144, 'Avancier', 2, 1),
(145, 'BR-V', 2, 1),
(146, 'Ballade', 2, 1),
(147, 'Beat', 2, 1),
(148, 'Brio', 2, 1),
(149, 'CR-V', 2, 1),
(150, 'CR-X', 2, 1),
(151, 'CR-Z', 2, 1),
(152, 'Capa', 2, 1),
(153, 'City', 2, 1),
(154, 'Civic', 2, 1),
(155, 'Clarity', 2, 1),
(156, 'Concerto', 2, 1),
(157, 'Crider', 2, 1),
(158, 'Crossroad', 2, 1),
(159, 'Crosstour', 2, 1),
(160, 'Domani', 2, 1),
(161, 'EV Plus', 2, 1),
(162, 'Edix', 2, 1),
(163, 'Element', 2, 1),
(164, 'Elysion', 2, 1),
(165, 'FCX', 2, 1),
(166, 'FR-V', 2, 1),
(167, 'Fit', 2, 1),
(168, 'Freed', 2, 1),
(169, 'Grace', 2, 1),
(170, 'Greiz', 2, 1),
(171, 'H-RV', 2, 1),
(172, 'HR-V', 2, 1),
(173, 'Hobio', 2, 1),
(174, 'Insight	', 2, 1),
(175, 'Integra', 2, 1),
(176, 'Jade', 2, 1),
(177, 'Jazz', 2, 1),
(178, 'LaGreat', 2, 1),
(179, 'Legend', 2, 1),
(180, 'MC-β', 2, 1),
(181, 'Mobilio', 2, 1),
(182, 'N-Box', 2, 1),
(183, 'N-One', 2, 1),
(184, 'N-WGN', 2, 1),
(185, 'NSX', 2, 1),
(186, 'Odyssey', 2, 1),
(187, 'Orthia', 2, 1),
(188, 'Partner', 2, 1),
(189, 'Passport', 2, 1),
(190, 'Pilot', 2, 1),
(191, 'Prelude', 2, 1),
(192, 'R400', 2, 1),
(193, 'Rafaga', 2, 1),
(194, 'Ridgeline', 2, 1),
(195, 'S-MX', 2, 1),
(196, 'S2000', 2, 1),
(197, 'S660', 2, 1),
(198, 'Saber', 2, 1),
(199, 'Shuttle', 2, 1),
(200, 'Spirior', 2, 1),
(201, 'StepWGN', 2, 1),
(202, 'Stream', 2, 1),
(203, 'Thats', 2, 1),
(204, 'Today', 2, 1),
(205, 'Torneo', 2, 1),
(206, 'Vamos', 2, 1),
(207, 'Vezel', 2, 1),
(208, 'Vigor', 2, 1),
(209, 'Zest', 2, 1),
(210, 'Other Model', 2, 1),
(211, '100NX', 3, 1),
(212, '180SX', 3, 1),
(213, '240SX', 3, 1),
(214, '300ZX Z32', 3, 1),
(215, '350Z Z33', 3, 1),
(216, '370Z Z34', 3, 1),
(217, 'Almera', 3, 1),
(218, 'Altima', 3, 1),
(219, 'Armada', 3, 1),
(220, 'Atlas', 3, 1),
(221, 'Avenir', 3, 1),
(222, 'Axxess', 3, 1),
(223, 'Bassara', 3, 1),
(224, 'Bluebird', 3, 1),
(225, 'Caravan', 3, 1),
(226, 'Carryboy', 3, 1),
(227, 'Cedric', 3, 1),
(228, 'Cefiro', 3, 1),
(229, 'Cherry', 3, 1),
(230, 'Cima', 3, 1),
(231, 'Clipper', 3, 1),
(232, 'Crew', 3, 1),
(233, 'Cube', 3, 1),
(234, 'Diesel', 3, 1),
(235, 'Dualis', 3, 1),
(236, 'Elgrand', 3, 1),
(237, 'Figaro', 3, 1),
(238, 'Frontier', 3, 1),
(239, 'Fuga', 3, 1),
(240, 'GT-R', 3, 1),
(241, 'Gloria', 3, 1),
(242, 'Hardbody Truck', 3, 1),
(243, 'Homy', 3, 1),
(244, 'Hypermini', 3, 1),
(245, 'Interstar', 3, 1),
(246, 'Juke', 3, 1),
(247, 'Kix', 3, 1),
(248, 'Kubistar', 3, 1),
(249, 'Lafesta', 3, 1),
(250, 'Largo', 3, 1),
(251, 'Latio', 3, 1),
(252, 'Laurel', 3, 1),
(253, 'Leaf', 3, 1),
(254, 'Leopard', 3, 1),
(255, 'Livina', 3, 1),
(256, 'Lucino', 3, 1),
(257, 'March', 3, 1),
(258, 'Maxima', 3, 1),
(259, 'Micra', 3, 1),
(260, 'Moco', 3, 1),
(261, 'Multi', 3, 1),
(262, 'Murano', 3, 1),
(263, 'NPT-90', 3, 1),
(264, 'NV', 3, 1),
(265, 'NX', 3, 1),
(266, 'Navara', 3, 1),
(267, 'Note', 3, 1),
(268, 'Otti', 3, 1),
(269, 'Pathfinder', 3, 1),
(270, 'Patrol', 3, 1),
(271, 'Pino', 3, 1),
(272, 'Pintara', 3, 1),
(273, 'Pixo', 3, 1),
(274, 'Platina', 3, 1),
(275, 'Prairie', 3, 1),
(276, 'Presage', 3, 1),
(277, 'Presea', 3, 1),
(278, 'President', 3, 1),
(279, 'Primastar', 3, 1),
(280, 'Primera	', 3, 1),
(281, 'Pulsar', 3, 1),
(282, 'Qashqai', 3, 1),
(283, 'Quest', 3, 1),
(284, 'R nessa', 3, 1),
(285, 'R390 GT1', 3, 1),
(286, 'R391', 3, 1),
(287, 'R90C', 3, 1),
(288, 'Rasheen', 3, 1),
(289, 'Rogue', 3, 1),
(290, 'Roox', 3, 1),
(291, 'S-Cargo', 3, 1),
(292, 'Saurus Jr', 3, 1),
(293, 'Sentra', 3, 1),
(294, 'Serena', 3, 1),
(295, 'Silvia', 3, 1),
(296, 'Skyline', 3, 1),
(297, 'Stagea', 3, 1),
(298, 'Stanza', 3, 1),
(299, 'Sunny', 3, 1),
(300, 'Sylphy', 3, 1),
(301, 'Teana', 3, 1),
(302, 'Terrano', 3, 1),
(303, 'Terrano II', 3, 1),
(304, 'Tiida', 3, 1),
(305, 'Titan', 3, 1),
(306, 'Urvan', 3, 1),
(307, 'Vanette', 3, 1),
(308, 'Versa', 3, 1),
(309, 'Violet', 3, 1),
(310, 'Wingroad', 3, 1),
(311, 'Winner', 3, 1),
(312, 'X-Trail', 3, 1),
(313, 'Xterra', 3, 1),
(314, 'Z-car', 3, 1),
(315, 'Other Model', 3, 1),
(316, '380', 4, 1),
(317, 'ASX', 4, 1),
(318, 'Airtrek', 4, 1),
(319, 'Attrage', 4, 1),
(320, 'Carisma', 4, 1),
(321, 'Challenger', 4, 1),
(322, 'Chariot', 4, 1),
(323, 'Colt', 4, 1),
(324, 'Debonair', 4, 1),
(325, 'DelicaDelica', 4, 1),
(326, 'Diamante', 4, 1),
(327, 'Dignity', 4, 1),
(328, 'Dion', 4, 1),
(329, 'Eclipse', 4, 1),
(330, 'Eclipse Cross', 4, 1),
(331, 'Endeavor', 4, 1),
(332, 'FTO', 4, 1),
(333, 'Freeca', 4, 1),
(334, 'GDI', 4, 1),
(335, 'GLX', 4, 1),
(336, 'Galant', 4, 1),
(337, 'Grandis', 4, 1),
(338, 'JONWAY', 4, 1),
(339, 'Lancer', 4, 1),
(340, 'Magna', 4, 1),
(341, 'Maven', 4, 1),
(342, 'Minica', 4, 1),
(343, 'Minicab', 4, 1),
(344, 'Mirage', 4, 1),
(345, 'Outlandar', 4, 1),
(346, 'Pajero', 4, 1),
(347, 'Pistachio', 4, 1),
(348, 'Proudia', 4, 1),
(349, 'RVR', 4, 1),
(350, 'Raider', 4, 1),
(351, 'Toppo', 4, 1),
(352, 'Town Box', 4, 1),
(353, 'Tredia', 4, 1),
(354, 'Triton', 4, 1),
(355, 'V6', 4, 1),
(356, 'Verada', 4, 1),
(357, 'Vr4', 4, 1),
(358, 'Zinger', 4, 1),
(359, 'eK', 4, 1),
(360, 'i', 4, 1),
(361, 'i-MiEV', 4, 1),
(362, 'l200', 4, 1),
(363, 'l300', 4, 1),
(364, 'Other Model', 4, 1),
(365, '14 Seat Microbus Petrol/CNG', 5, 1),
(366, '7 Seat Microbus-Petrol/CNG', 5, 1),
(367, 'Ambulance Diesel/Petrol', 5, 1),
(368, 'Hiace Type Ambulance Diesel', 5, 1),
(369, 'Hiace Type Ambulance Petrol', 5, 1),
(370, 'Hiace type Microbus-Diesel', 5, 1),
(371, 'Mini Ambulance Petrol/CNG', 5, 1),
(372, 'VIP Microbus', 5, 1),
(373, 'Other Model', 5, 1),
(374, '4C Spider', 6, 1),
(375, 'Giulia', 6, 1),
(376, 'Giulietta', 6, 1),
(377, 'MiTo', 6, 1),
(378, 'Stelvio', 6, 1),
(379, 'Stelvio Quadrifoglio', 6, 1),
(380, 'Other Model', 6, 1),
(381, 'A1', 7, 1),
(382, 'A2', 7, 1),
(383, 'A3', 7, 1),
(384, 'A4', 7, 1),
(385, 'A5', 7, 1),
(386, 'A6', 7, 1),
(387, 'A7', 7, 1),
(388, 'A8', 7, 1),
(389, 'Q3', 7, 1),
(390, 'Q5', 7, 1),
(391, 'Q7', 7, 1),
(392, 'R8', 7, 1),
(393, 'RS2', 7, 1),
(394, 'RS3', 7, 1),
(395, 'RS4', 7, 1),
(396, 'RS5', 7, 1),
(397, 'RS6', 7, 1),
(398, 'RS7', 7, 1),
(399, 'RS8', 7, 1),
(400, 'S2', 7, 1),
(401, 'S3', 7, 1),
(402, 'S4', 7, 1),
(403, 'S5', 7, 1),
(404, 'S6', 7, 1),
(405, 'S7', 7, 1),
(406, 'S8', 7, 1),
(407, 'TT', 7, 1),
(408, 'TTS', 7, 1),
(409, 'Other Model', 7, 1),
(410, 'A115', 8, 1),
(411, 'BJ100', 8, 1),
(412, 'M20', 8, 1),
(413, 'MZ40', 8, 1),
(414, 'MZ45', 8, 1),
(415, 'Senova C51X', 8, 1),
(416, 'X25', 8, 1),
(417, 'X424', 8, 1),
(418, 'Other Model', 8, 1),
(419, '1 Series', 9, 1),
(420, '3 Series', 9, 1),
(421, '320i', 9, 1),
(422, '328i', 9, 1),
(423, '5 Series', 9, 1),
(424, '520d', 9, 1),
(425, '523i', 9, 1),
(426, '525i', 9, 1),
(427, '528', 9, 1),
(428, '528i', 9, 1),
(429, '530E', 9, 1),
(430, '530i', 9, 1),
(431, '535d', 9, 1),
(432, '535i', 9, 1),
(433, '535xi', 9, 1),
(434, '540i', 9, 1),
(435, '6 Series', 9, 1),
(436, '640i', 9, 1),
(437, '650i', 9, 1),
(438, '7 Series', 9, 1),
(439, '730li', 9, 1),
(440, '8 Series', 9, 1),
(441, '850i', 9, 1),
(442, 'E36 M3', 9, 1),
(443, 'G30', 9, 1),
(444, 'M1', 9, 1),
(445, 'M2', 9, 1),
(446, 'M3', 9, 1),
(447, 'M4', 9, 1),
(448, 'M5', 9, 1),
(449, 'M6', 9, 1),
(450, 'X1', 9, 1),
(451, 'X3', 9, 1),
(452, 'X4', 9, 1),
(453, 'X5', 9, 1),
(454, 'X6', 9, 1),
(455, 'X7', 9, 1),
(456, 'Z Series', 9, 1),
(457, 'Z1', 9, 1),
(458, 'Z3', 9, 1),
(459, 'Z4', 9, 1),
(460, 'Z8', 9, 1),
(461, 'Z9', 9, 1),
(462, 'i8', 9, 1),
(463, 'Other Model', 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `smartend_comfort`
--

CREATE TABLE `smartend_comfort` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `smartend_comfort`
--

INSERT INTO `smartend_comfort` (`id`, `name`, `status`) VALUES
(1, 'A/C: Front', 1),
(2, 'A/C: Rear', 1),
(3, 'Back Camera', 1),
(4, 'Front/Side Camera', 1),
(5, 'Cruise Control', 1),
(6, 'Power Locks', 1),
(7, 'Power Steering', 1);

-- --------------------------------------------------------

--
-- Table structure for table `smartend_comments`
--

CREATE TABLE `smartend_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `topic_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `row_no` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `smartend_contacts`
--

CREATE TABLE `smartend_contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `last_login_ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `smartend_contacts_groups`
--

CREATE TABLE `smartend_contacts_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smartend_contacts_groups`
--

INSERT INTO `smartend_contacts_groups` (`id`, `name`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Newsletter Emails', 1, NULL, '2020-12-12 17:50:55', '2020-12-12 17:50:55');

-- --------------------------------------------------------

--
-- Table structure for table `smartend_countries`
--

CREATE TABLE `smartend_countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title_bn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smartend_countries`
--

INSERT INTO `smartend_countries` (`id`, `code`, `title_en`, `tel`, `created_at`, `updated_at`, `title_bn`) VALUES
(1, 'AL', 'Albania', '355', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Albania'),
(2, 'DZ', 'Algeria', '213', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Algeria'),
(3, 'AS', 'American Samoa', '1-684', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'American Samoa'),
(4, 'AD', 'Andorra', '376', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Andorra'),
(5, 'AO', 'Angola', '244', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Angola'),
(6, 'AI', 'Anguilla', '1-264', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Anguilla'),
(7, 'AR', 'Argentina', '54', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Argentina'),
(8, 'AM', 'Armenia', '374', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Armenia'),
(9, 'AW', 'Aruba', '297', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Aruba'),
(10, 'AU', 'Australia', '61', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Australia'),
(11, 'AT', 'Austria', '43', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Austria'),
(12, 'AZ', 'Azerbaijan', '994', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Azerbaijan'),
(13, 'BS', 'Bahamas', '1-242', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Bahamas'),
(14, 'BH', 'Bahrain', '973', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Bahrain'),
(15, 'BD', 'Bangladesh', '880', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Bangladesh'),
(16, 'BB', 'Barbados', '1-246', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Barbados'),
(17, 'BY', 'Belarus', '375', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Belarus'),
(18, 'BE', 'Belgium', '32', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Belgium'),
(19, 'BZ', 'Belize', '501', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Belize'),
(20, 'BJ', 'Benin', '229', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Benin'),
(21, 'BM', 'Bermuda', '1-441', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Bermuda'),
(22, 'BT', 'Bhutan', '975', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Bhutan'),
(23, 'BO', 'Bolivia', '591', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Bolivia'),
(24, 'BA', 'Bosnia and Herzegovina', '387', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Bosnia and Herzegovina'),
(25, 'BW', 'Botswana', '267', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Botswana'),
(26, 'BR', 'Brazil', '55', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Brazil'),
(27, 'VG', 'British Virgin Islands', '1-284', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'British Virgin Islands'),
(28, 'IO', 'British Indian Ocean Territory', '246', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'British Indian Ocean Territory'),
(29, 'BN', 'Brunei Darussalam', '673', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Brunei Darussalam'),
(30, 'BG', 'Bulgaria', '359', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Bulgaria'),
(31, 'BF', 'Burkina Faso', '226', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Burkina Faso'),
(32, 'BI', 'Burundi', '257', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Burundi'),
(33, 'KH', 'Cambodia', '855', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Cambodia'),
(34, 'CM', 'Cameroon', '237', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Cameroon'),
(35, 'CA', 'Canada', '1', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Canada'),
(36, 'CV', 'Cape Verde', '238', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Cape Verde'),
(37, 'KY', 'Cayman Islands', '1-345', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Cayman Islands'),
(38, 'CF', 'Central African Republic', '236', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Central African Republic'),
(39, 'TD', 'Chad', '235', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Chad'),
(40, 'CL', 'Chile', '56', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Chile'),
(41, 'CN', 'China', '86', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'China'),
(42, 'HK', 'Hong Kong', '852', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Hong Kong'),
(43, 'MO', 'Macao', '853', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Macao'),
(44, 'CX', 'Christmas Island', '61', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Christmas Island'),
(45, 'CC', 'Cocos (Keeling) Islands', '61', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Cocos (Keeling) Islands'),
(46, 'CO', 'Colombia', '57', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Colombia'),
(47, 'KM', 'Comoros', '269', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Comoros'),
(48, 'CK', 'Cook Islands', '682', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Cook Islands'),
(49, 'CR', 'Costa Rica', '506', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Costa Rica'),
(50, 'HR', 'Croatia', '385', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Croatia'),
(51, 'CU', 'Cuba', '53', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Cuba'),
(52, 'CY', 'Cyprus', '357', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Cyprus'),
(53, 'CZ', 'Czech Republic', '420', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Czech Republic'),
(54, 'DK', 'Denmark', '45', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Denmark'),
(55, 'DJ', 'Djibouti', '253', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Djibouti'),
(56, 'DM', 'Dominica', '1-767', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Dominica'),
(57, 'DO', 'Dominican Republic', '1-809', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Dominican Republic'),
(58, 'EC', 'Ecuador', '593', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Ecuador'),
(59, 'EG', 'Egypt', '20', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Egypt'),
(60, 'SV', 'El Salvador', '503', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'El Salvador'),
(61, 'GQ', 'Equatorial Guinea', '240', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Equatorial Guinea'),
(62, 'ER', 'Eritrea', '291', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Eritrea'),
(63, 'EE', 'Estonia', '372', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Estonia'),
(64, 'ET', 'Ethiopia', '251', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Ethiopia'),
(65, 'FO', 'Faroe Islands', '298', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Faroe Islands'),
(66, 'FJ', 'Fiji', '679', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Fiji'),
(67, 'FI', 'Finland', '358', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Finland'),
(68, 'FR', 'France', '33', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'France'),
(69, 'GF', 'French Guiana', '689', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'French Guiana'),
(70, 'GA', 'Gabon', '241', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Gabon'),
(71, 'GM', 'Gambia', '220', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Gambia'),
(72, 'GE', 'Georgia', '995', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Georgia'),
(73, 'DE', 'Germany', '49', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Germany'),
(74, 'GH', 'Ghana', '233', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Ghana'),
(75, 'GI', 'Gibraltar', '350', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Gibraltar'),
(76, 'GR', 'Greece', '30', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Greece'),
(77, 'GL', 'Greenland', '299', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Greenland'),
(78, 'GD', 'Grenada', '1-473', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Grenada'),
(79, 'GU', 'Guam', '1-671', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Guam'),
(80, 'GT', 'Guatemala', '502', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Guatemala'),
(81, 'GN', 'Guinea', '224', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Guinea'),
(82, 'GW', 'Guinea-Bissau', '245', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Guinea-Bissau'),
(83, 'GY', 'Guyana', '592', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Guyana'),
(84, 'HT', 'Haiti', '509', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Haiti'),
(85, 'HN', 'Honduras', '504', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Honduras'),
(86, 'HU', 'Hungary', '36', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Hungary'),
(87, 'IS', 'Iceland', '354', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Iceland'),
(88, 'IN', 'India', '91', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'India'),
(89, 'ID', 'Indonesia', '62', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Indonesia'),
(90, 'IR', 'Iran, Islamic Republic of', '98', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Iran, Islamic Republic of'),
(91, 'IQ', 'Iraq', '964', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Iraq'),
(92, 'IE', 'Ireland', '353', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Ireland'),
(93, 'IM', 'Isle of Man', '44-1624', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Isle of Man'),
(94, 'IL', 'Israel', '972', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Israel'),
(95, 'IT', 'Italy', '39', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Italy'),
(96, 'JM', 'Jamaica', '1-876', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Jamaica'),
(97, 'JP', 'Japan', '81', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Japan'),
(98, 'JE', 'Jersey', '44-1534', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Jersey'),
(99, 'JO', 'Jordan', '962', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Jordan'),
(100, 'KZ', 'Kazakhstan', '7', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Kazakhstan'),
(101, 'KE', 'Kenya', '254', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Kenya'),
(102, 'KI', 'Kiribati', '686', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Kiribati'),
(103, 'KW', 'Kuwait', '965', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Kuwait'),
(104, 'KG', 'Kyrgyzstan', '996', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Kyrgyzstan'),
(105, 'LV', 'Latvia', '371', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Latvia'),
(106, 'LB', 'Lebanon', '961', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Lebanon'),
(107, 'LS', 'Lesotho', '266', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Lesotho'),
(108, 'LR', 'Liberia', '231', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Liberia'),
(109, 'LY', 'Libya', '218', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Libya'),
(110, 'LI', 'Liechtenstein', '423', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Liechtenstein'),
(111, 'LT', 'Lithuania', '370', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Lithuania'),
(112, 'LU', 'Luxembourg', '352', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Luxembourg'),
(113, 'MK', 'Macedonia', '389', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Macedonia'),
(114, 'MG', 'Madagascar', '261', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Madagascar'),
(115, 'MW', 'Malawi', '265', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Malawi'),
(116, 'MY', 'Malaysia', '60', '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Malaysia'),
(117, 'MV', 'Maldives', '960', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Maldives'),
(118, 'ML', 'Mali', '223', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Mali'),
(119, 'MT', 'Malta', '356', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Malta'),
(120, 'MH', 'Marshall Islands', '692', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Marshall Islands'),
(121, 'MR', 'Mauritania', '222', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Mauritania'),
(122, 'MU', 'Mauritius', '230', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Mauritius'),
(123, 'YT', 'Mayotte', '262', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Mayotte'),
(124, 'MX', 'Mexico', '52', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Mexico'),
(125, 'FM', 'Micronesia', '691', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Micronesia'),
(126, 'MD', 'Moldova', '373', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Moldova'),
(127, 'MC', 'Monaco', '377', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Monaco'),
(128, 'MN', 'Mongolia', '976', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Mongolia'),
(129, 'ME', 'Montenegro', '382', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Montenegro'),
(130, 'MS', 'Montserrat', '1-664', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Montserrat'),
(131, 'MA', 'Morocco', '212', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Morocco'),
(132, 'MZ', 'Mozambique', '258', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Mozambique'),
(133, 'MM', 'Myanmar', '95', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Myanmar'),
(134, 'NA', 'Namibia', '264', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Namibia'),
(135, 'NR', 'Nauru', '674', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Nauru'),
(136, 'NP', 'Nepal', '977', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Nepal'),
(137, 'NL', 'Netherlands', '31', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Netherlands'),
(138, 'AN', 'Netherlands Antilles', '599', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Netherlands Antilles'),
(139, 'NC', 'New Caledonia', '687', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'New Caledonia'),
(140, 'NZ', 'New Zealand', '64', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'New Zealand'),
(141, 'NI', 'Nicaragua', '505', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Nicaragua'),
(142, 'NE', 'Niger', '227', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Niger'),
(143, 'NG', 'Nigeria', '234', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Nigeria'),
(144, 'NU', 'Niue', '683', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Niue'),
(145, 'NO', 'Norway', '47', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Norway'),
(146, 'OM', 'Oman', '968', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Oman'),
(147, 'PK', 'Pakistan', '92', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Pakistan'),
(148, 'PW', 'Palau', '680', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Palau'),
(149, 'PS', 'Palestinian', '972', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Palestinian'),
(150, 'PA', 'Panama', '507', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Panama'),
(151, 'PY', 'Paraguay', '595', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Paraguay'),
(152, 'PE', 'Peru', '51', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Peru'),
(153, 'PH', 'Philippines', '63', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Philippines'),
(154, 'PN', 'Pitcairn', '870', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Pitcairn'),
(155, 'PL', 'Poland', '48', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Poland'),
(156, 'PT', 'Portugal', '351', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Portugal'),
(157, 'PR', 'Puerto Rico', '1-787', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Puerto Rico'),
(158, 'QA', 'Qatar', '974', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Qatar'),
(159, 'RO', 'Romania', '40', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Romania'),
(160, 'RU', 'Russian Federation', '7', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Russian Federation'),
(161, 'RW', 'Rwanda', '250', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Rwanda'),
(162, 'SH', 'Saint Helena', '290', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Saint Helena'),
(163, 'KN', 'Saint Kitts and Nevis', '1-869', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Saint Kitts and Nevis'),
(164, 'LC', 'Saint Lucia', '1-758', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Saint Lucia'),
(165, 'PM', 'Saint Pierre and Miquelon', '508', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Saint Pierre and Miquelon'),
(166, 'VC', 'Saint Vincent and Grenadines', '1-784', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Saint Vincent and Grenadines'),
(167, 'WS', 'Samoa', '685', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Samoa'),
(168, 'SM', 'San Marino', '378', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'San Marino'),
(169, 'ST', 'Sao Tome and Principe', '239', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Sao Tome and Principe'),
(170, 'SA', 'Saudi Arabia', '966', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Saudi Arabia'),
(171, 'SN', 'Senegal', '221', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Senegal'),
(172, 'RS', 'Serbia', '381', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Serbia'),
(173, 'SC', 'Seychelles', '248', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Seychelles'),
(174, 'SL', 'Sierra Leone', '232', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Sierra Leone'),
(175, 'SG', 'Singapore', '65', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Singapore'),
(176, 'SK', 'Slovakia', '421', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Slovakia'),
(177, 'SI', 'Slovenia', '386', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Slovenia'),
(178, 'SB', 'Solomon Islands', '677', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Solomon Islands'),
(179, 'SO', 'Somalia', '252', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Somalia'),
(180, 'ZA', 'South Africa', '27', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'South Africa'),
(181, 'ES', 'Spain', '34', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Spain'),
(182, 'LK', 'Sri Lanka', '94', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Sri Lanka'),
(183, 'SD', 'Sudan', '249', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Sudan'),
(184, 'SR', 'Suriname', '597', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Suriname'),
(185, 'SJ', 'Svalbard and Jan Mayen Islands', '47', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Svalbard and Jan Mayen Islands'),
(186, 'SZ', 'Swaziland', '268', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Swaziland'),
(187, 'SE', 'Sweden', '46', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Sweden'),
(188, 'CH', 'Switzerland', '41', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Switzerland'),
(189, 'SY', 'Syrian Arab Republic', '963', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Syrian Arab Republic'),
(190, 'TW', 'Taiwan, Republic of China', '886', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Taiwan, Republic of China'),
(191, 'TJ', 'Tajikistan', '992', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Tajikistan'),
(192, 'TZ', 'Tanzania', '255', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Tanzania'),
(193, 'TH', 'Thailand', '66', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Thailand'),
(194, 'TG', 'Togo', '228', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Togo'),
(195, 'TK', 'Tokelau', '690', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Tokelau'),
(196, 'TO', 'Tonga', '676', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Tonga'),
(197, 'TT', 'Trinidad and Tobago', '1-868', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Trinidad and Tobago'),
(198, 'TN', 'Tunisia', '216', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Tunisia'),
(199, 'TR', 'Turkey', '90', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Turkey'),
(200, 'TM', 'Turkmenistan', '993', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Turkmenistan'),
(201, 'TC', 'Turks and Caicos Islands', '1-649', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Turks and Caicos Islands'),
(202, 'TV', 'Tuvalu', '688', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Tuvalu'),
(203, 'UG', 'Uganda', '256', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Uganda'),
(204, 'UA', 'Ukraine', '380', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Ukraine'),
(205, 'AE', 'United Arab Emirates', '971', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'United Arab Emirates'),
(206, 'GB', 'United Kingdom', '44', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'United Kingdom'),
(207, 'US', 'United States of America', '1', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'United States of America'),
(208, 'UY', 'Uruguay', '598', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Uruguay'),
(209, 'UZ', 'Uzbekistan', '998', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Uzbekistan'),
(210, 'VU', 'Vanuatu', '678', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Vanuatu'),
(211, 'VE', 'Venezuela', '58', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Venezuela'),
(212, 'VN', 'Viet Nam', '84', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Viet Nam'),
(213, 'WF', 'Wallis and Futuna Islands', '681', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Wallis and Futuna Islands'),
(214, 'YE', 'Yemen', '967', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Yemen'),
(215, 'ZM', 'Zambia', '260', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Zambia'),
(216, 'ZW', 'Zimbabwe', '263', '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `smartend_district`
--

CREATE TABLE `smartend_district` (
  `id` int(11) NOT NULL,
  `name` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `division_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `smartend_district`
--

INSERT INTO `smartend_district` (`id`, `name`, `division_id`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'BARGUNA', 1, 1, NULL, NULL, NULL, NULL),
(2, 'BARISAL', 1, 1, NULL, NULL, NULL, NULL),
(3, 'BHOLA', 1, 1, NULL, NULL, NULL, NULL),
(4, 'JHALOKATI', 1, 1, NULL, NULL, NULL, NULL),
(5, 'PATUAKHALI', 1, 1, NULL, NULL, NULL, NULL),
(6, 'PIROJPUR', 1, 1, NULL, NULL, NULL, NULL),
(7, 'BANDARBAN', 2, 1, NULL, NULL, NULL, NULL),
(8, 'BRAHAMANBARIA', 2, 1, NULL, NULL, NULL, NULL),
(9, 'CHANDPUR', 2, 1, NULL, NULL, NULL, NULL),
(10, 'CHITTAGONG', 2, 1, NULL, NULL, NULL, NULL),
(11, 'COMILLA', 2, 1, NULL, NULL, NULL, NULL),
(12, 'COXS BAZAR', 2, 1, NULL, NULL, NULL, NULL),
(13, 'FENI', 2, 1, NULL, NULL, NULL, NULL),
(14, 'KHAGRACHHARI', 2, 1, NULL, NULL, NULL, NULL),
(15, 'LAKSHMIPUR', 2, 1, NULL, NULL, NULL, NULL),
(16, 'NOAKHALI', 2, 1, NULL, NULL, NULL, NULL),
(17, 'RANGAMATI', 2, 1, NULL, NULL, NULL, NULL),
(18, 'DHAKA', 3, 1, NULL, NULL, NULL, NULL),
(19, 'FARIDPUR', 3, 1, NULL, NULL, NULL, NULL),
(20, 'GAZIPUR', 3, 1, NULL, NULL, NULL, NULL),
(21, 'GOPALGANJ', 3, 1, NULL, NULL, NULL, NULL),
(22, 'JAMALPUR', 3, 1, NULL, NULL, NULL, NULL),
(23, 'KISHOREGANJ', 3, 1, NULL, NULL, NULL, NULL),
(24, 'MADARIPUR', 3, 1, NULL, NULL, NULL, NULL),
(25, 'MANIKGANJ', 3, 1, NULL, NULL, NULL, NULL),
(26, 'MAULVIBAZAR', 7, 1, NULL, '2020-02-25 06:30:10', NULL, NULL),
(27, 'MUNSHIGANJ', 3, 1, NULL, NULL, NULL, NULL),
(28, 'MYMENSINGH', 3, 1, NULL, NULL, NULL, NULL),
(29, 'NARAYANGANJ', 3, 1, NULL, NULL, NULL, NULL),
(30, 'NARSINGDI', 3, 1, NULL, NULL, NULL, NULL),
(31, 'NETRAKONA', 3, 1, NULL, NULL, NULL, NULL),
(32, 'RAJBARI', 3, 1, NULL, NULL, NULL, NULL),
(33, 'SHARIATPUR', 3, 1, NULL, NULL, NULL, NULL),
(34, 'SHERPUR', 3, 1, NULL, NULL, NULL, NULL),
(35, 'TANGAIL', 3, 1, NULL, NULL, NULL, NULL),
(36, 'BAGERHAT', 4, 1, NULL, NULL, NULL, NULL),
(37, 'CHUADANGA', 4, 1, NULL, NULL, NULL, NULL),
(38, 'JESSORE', 4, 1, NULL, NULL, NULL, NULL),
(39, 'JHENAIDAH', 4, 1, NULL, NULL, NULL, NULL),
(40, 'KHULNA', 4, 1, NULL, NULL, NULL, NULL),
(41, 'KUSHTIA', 4, 1, NULL, NULL, NULL, NULL),
(42, 'MAGURA', 4, 1, NULL, NULL, NULL, NULL),
(43, 'MEHERPUR', 4, 1, NULL, NULL, NULL, NULL),
(44, 'NORAIL', 4, 1, NULL, NULL, NULL, NULL),
(45, 'SATKHIRA', 4, 1, NULL, NULL, NULL, NULL),
(46, 'BOGRA', 5, 1, NULL, NULL, NULL, NULL),
(47, 'JOYPURHAT', 5, 1, NULL, NULL, NULL, NULL),
(48, 'NAOGAON', 5, 1, NULL, NULL, NULL, NULL),
(49, 'NATORE', 5, 1, NULL, NULL, NULL, NULL),
(50, 'CHAPAI NAWABGANJ', 5, 1, NULL, '2018-05-21 05:59:50', NULL, NULL),
(51, 'PABNA', 5, 1, NULL, NULL, NULL, NULL),
(52, 'RAJSHAHI', 5, 1, NULL, NULL, NULL, NULL),
(53, 'SIRAJGANJ', 5, 1, NULL, NULL, NULL, NULL),
(54, 'DINAJPUR', 6, 1, NULL, '2018-05-14 09:11:19', NULL, NULL),
(55, 'GAIBANDHA', 6, 0, NULL, '2020-02-26 06:02:38', NULL, NULL),
(56, 'KURIGRAM', 6, 1, NULL, '2018-05-14 09:13:46', NULL, NULL),
(57, 'LALMONIRHAT', 6, 1, NULL, '2018-05-14 09:14:15', NULL, NULL),
(58, 'NILPHAMARI', 6, 1, NULL, NULL, NULL, NULL),
(59, 'PANCHAGARH', 6, 0, NULL, '2020-02-26 06:01:04', NULL, NULL),
(60, 'RANGPUR', 6, 0, NULL, '2020-02-26 06:02:01', NULL, NULL),
(61, 'THAKURGAON', 6, 0, NULL, '2020-02-27 08:08:02', NULL, NULL),
(62, 'HABIGANJ', 7, 0, NULL, '2020-02-26 06:02:49', NULL, NULL),
(63, 'SUNAMGANJ', 7, 0, NULL, '2020-06-17 06:47:33', NULL, NULL),
(64, 'SYLHET', 7, 1, NULL, '2018-05-14 09:15:26', NULL, NULL),
(65, 'HABIGANJ', 7, 1, '2018-05-08 12:14:36', '2020-02-25 06:29:46', NULL, NULL),
(66, 'RANGPUR', 6, 1, '2018-05-14 08:34:11', '2018-05-14 08:34:11', NULL, NULL),
(67, 'THAKURGAON', 6, 1, '2018-05-14 09:09:45', '2020-02-27 08:07:54', NULL, NULL),
(68, 'PANCHAGARH', 6, 1, '2018-05-14 09:12:44', '2018-05-14 09:19:32', NULL, NULL),
(69, 'GAIBANDHA', 6, 1, '2018-05-14 09:14:44', '2018-05-14 09:21:58', NULL, NULL),
(70, 'SUNAMGONJ', 7, 0, '2018-05-14 09:16:07', '2020-02-26 06:01:44', NULL, NULL),
(71, 'MOULOVIBAZAR', 7, 1, '2018-05-14 09:16:47', '2018-05-14 09:16:47', NULL, NULL),
(72, 'SUNAMGANJ', 7, 1, '2020-06-17 06:47:57', '2020-06-17 06:47:57', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `smartend_drive`
--

CREATE TABLE `smartend_drive` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `smartend_drive`
--

INSERT INTO `smartend_drive` (`id`, `name`, `status`) VALUES
(1, '4 WD', 1),
(2, 'All WD', 1),
(3, 'Forward WD', 1),
(4, 'Rear WD', 1),
(7, 'Other', 1);

-- --------------------------------------------------------

--
-- Table structure for table `smartend_entertainment`
--

CREATE TABLE `smartend_entertainment` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `smartend_entertainment`
--

INSERT INTO `smartend_entertainment` (`id`, `name`, `status`) VALUES
(1, 'AM/FM Stereo', 1),
(2, 'CD Player', 1),
(3, 'DVD System', 1),
(4, 'MP3 Player', 1),
(5, 'Portable Audio', 1),
(6, 'Premium Audio', 1),
(7, 'Navigation', 1);

-- --------------------------------------------------------

--
-- Table structure for table `smartend_events`
--

CREATE TABLE `smartend_events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `smartend_exterior_color`
--

CREATE TABLE `smartend_exterior_color` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `smartend_exterior_color`
--

INSERT INTO `smartend_exterior_color` (`id`, `name`, `status`) VALUES
(1, 'Alpine White', 1),
(2, 'Authentic Red', 1),
(3, 'Beige', 1),
(4, 'Black', 1),
(5, 'Blue', 1),
(6, 'Bluish Green', 1),
(7, 'Bottle Green', 1),
(8, 'Bronze', 1),
(9, 'Brown', 1),
(10, 'Cherry', 1),
(11, 'Dark Ash', 1),
(12, 'Deep Blue', 1),
(13, 'Deep Blue Pearl', 1),
(14, 'Golden', 1),
(15, 'Green', 1),
(16, 'Grey', 1),
(17, 'Light Blue', 1),
(18, 'Light Green', 1),
(19, 'Metallic Black', 1),
(20, 'Metallic Blue', 1),
(21, 'Metallic Glow', 1),
(22, 'Metallic Grey', 1),
(23, 'Metallic Gun', 1),
(24, 'Metallic Maroon', 1),
(25, 'Metallic Pearl', 1),
(26, 'Metallic Wine', 1),
(27, 'Miami Blue', 1),
(28, 'Mica Blue', 1),
(29, 'Midnight Silver Metallic', 1),
(30, 'Multi Color', 1),
(31, 'Obsidian Black Metallic', 1),
(32, 'Ocean Sky', 1),
(33, 'Opal Coffee', 1),
(34, 'Orange', 1),
(35, 'Paste', 1),
(36, 'Pastel Blue', 1),
(37, 'Pastel Greenish Blue', 1),
(38, 'Pearl', 1),
(39, 'Pearl White', 1),
(40, 'Purple', 1),
(41, 'Purple Bloom', 1),
(42, 'Red', 1),
(43, 'Red Charm', 1),
(44, 'Red Multi-Coat', 1),
(45, 'Red Wine', 1),
(46, 'Silver', 1),
(47, 'Silver Arcade', 1),
(48, 'Silver Glow', 1),
(49, 'Silver Gold', 1),
(50, 'Silver Metallic', 1),
(51, 'Silver Metallic Glow', 1),
(52, 'Sky Blue', 1),
(53, 'Solid Black', 1),
(54, 'Solid White', 1),
(55, 'Sparkling Blackish Purple', 1),
(56, 'Titanium Metallic', 1),
(57, 'White', 1),
(58, 'Yellow', 1),
(59, 'Other', 1);

-- --------------------------------------------------------

--
-- Table structure for table `smartend_failed_jobs`
--

CREATE TABLE `smartend_failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `smartend_fuel_type`
--

CREATE TABLE `smartend_fuel_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `smartend_fuel_type`
--

INSERT INTO `smartend_fuel_type` (`id`, `name`, `status`) VALUES
(1, 'Diesel', 1),
(2, 'Electric', 1),
(3, 'Petrol', 1),
(4, 'Octane', 1),
(5, 'CNG', 1),
(6, 'LPG', 1),
(7, 'Hybrid', 1),
(8, 'Other fuel type', 1);

-- --------------------------------------------------------

--
-- Table structure for table `smartend_interior_color`
--

CREATE TABLE `smartend_interior_color` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `smartend_interior_color`
--

INSERT INTO `smartend_interior_color` (`id`, `name`, `status`) VALUES
(1, 'Beige', 1),
(2, 'Brown', 1),
(3, 'Cream', 1),
(4, 'Grey', 1),
(5, 'Jet Black', 1),
(6, 'Jet Red', 1),
(7, 'Multi-pattern', 1),
(8, 'Black', 1),
(9, 'Other', 1);

-- --------------------------------------------------------

--
-- Table structure for table `smartend_languages`
--

CREATE TABLE `smartend_languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direction` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `left` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `right` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `box_status` tinyint(4) DEFAULT 1,
  `status` tinyint(4) DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smartend_languages`
--

INSERT INTO `smartend_languages` (`id`, `title`, `code`, `direction`, `left`, `right`, `icon`, `box_status`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'English', 'en', 'ltr', 'left', 'right', 'us', 1, 1, 1, NULL, '2020-12-12 17:50:54', '2020-12-12 17:50:54'),
(3, 'বাংলা', 'bn', 'ltr', 'left', 'right', 'bd', 1, 1, 1, NULL, '2022-02-04 00:14:31', '2022-02-04 00:14:31');

-- --------------------------------------------------------

--
-- Table structure for table `smartend_ltm_translations`
--

CREATE TABLE `smartend_ltm_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `locale` varchar(191) COLLATE utf8mb4_bin NOT NULL,
  `group` varchar(191) COLLATE utf8mb4_bin NOT NULL,
  `key` text COLLATE utf8mb4_bin NOT NULL,
  `value` text COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `smartend_maps`
--

CREATE TABLE `smartend_maps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `topic_id` int(11) NOT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `row_no` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title_bn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_bn` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `smartend_menus`
--

CREATE TABLE `smartend_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `row_no` int(11) NOT NULL,
  `father_id` int(11) NOT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title_bn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smartend_menus`
--

INSERT INTO `smartend_menus` (`id`, `row_no`, `father_id`, `title_en`, `status`, `type`, `cat_id`, `link`, `created_by`, `updated_by`, `created_at`, `updated_at`, `title_bn`) VALUES
(1, 1, 0, 'Main Menu', 1, 0, 0, '', 1, NULL, '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Main Menu'),
(2, 2, 0, 'Quick Links', 1, 0, 0, '', 1, NULL, '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Quick Links'),
(3, 1, 1, 'Home', 1, 1, 1, 'home', 1, 1, '2020-12-12 17:50:55', '2022-02-04 08:54:42', 'হোম'),
(4, 2, 1, 'Find Car', 1, 1, 1, 'topic/about', 1, 1, '2020-12-12 17:50:55', '2022-02-04 08:45:38', 'গাড়ী খুঁজুন'),
(5, 3, 1, 'Sell Car', 1, 1, 2, NULL, 1, 1, '2020-12-12 17:50:55', '2022-02-04 08:54:28', 'গাড়ী বিক্রি'),
(6, 4, 1, 'Blog', 1, 2, 3, NULL, 1, 1, '2020-12-12 17:50:55', '2022-02-04 08:53:56', 'ব্লগ'),
(12, 10, 1, 'Contact', 1, 1, 0, 'contact', 1, NULL, '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Contact'),
(13, 1, 2, 'Home', 1, 1, 0, 'home', 1, NULL, '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Home'),
(14, 2, 2, 'About Us', 1, 1, 0, 'topic/about', 1, NULL, '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'About Us'),
(15, 3, 2, 'Blog', 1, 2, 7, '', 1, NULL, '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Blog'),
(16, 4, 2, 'Privacy', 1, 1, 0, 'topic/privacy', 1, NULL, '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Privacy'),
(17, 5, 2, 'Terms & Conditions', 1, 1, 0, 'topic/terms', 1, NULL, '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Terms & Conditions'),
(18, 6, 2, 'Contact Us', 1, 1, 0, 'contact', 1, NULL, '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Contact Us'),
(19, 11, 1, 'Watch TV', 1, 1, 1, NULL, 1, 1, '2022-02-04 08:59:24', '2022-02-04 09:09:51', 'Watch TV');

-- --------------------------------------------------------

--
-- Table structure for table `smartend_migrations`
--

CREATE TABLE `smartend_migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smartend_migrations`
--

INSERT INTO `smartend_migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_04_02_193005_create_translations_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2020_09_11_160850_create_sessions_table', 1),
(7, '2020_09_11_190632_create_webmaster_settings_table', 1),
(8, '2020_09_11_190633_create_webmaster_sections_table', 1),
(9, '2020_09_11_190635_create_webmaster_banners_table', 1),
(10, '2020_09_11_190637_create_webmails_groups_table', 1),
(11, '2020_09_11_190638_create_webmails_files_table', 1),
(12, '2020_09_11_190640_create_webmails_table', 1),
(13, '2020_09_11_190641_create_topics_table', 1),
(14, '2020_09_11_190643_create_settings_table', 1),
(15, '2020_09_11_190645_create_sections_table', 1),
(16, '2020_09_11_190647_create_photos_table', 1),
(17, '2020_09_11_190648_create_permissions_table', 1),
(18, '2020_09_11_190650_create_menus_table', 1),
(19, '2020_09_11_190652_create_maps_table', 1),
(20, '2020_09_11_190654_create_events_table', 1),
(21, '2020_09_11_190656_create_countries_table', 1),
(22, '2020_09_11_190657_create_contacts_groups_table', 1),
(23, '2020_09_11_190659_create_contacts_table', 1),
(24, '2020_09_11_190701_create_comments_table', 1),
(25, '2020_09_11_190703_create_banners_table', 1),
(26, '2020_09_11_190704_create_attach_files_table', 1),
(27, '2020_09_11_190706_create_analytics_visitors_table', 1),
(28, '2020_09_11_190708_create_analytics_pages_table', 1),
(29, '2020_09_11_190912_create_related_topics_table', 1),
(30, '2020_09_11_190914_create_topic_categories_table', 1),
(31, '2020_09_11_190916_create_topic_fields_table', 1),
(32, '2020_09_11_190917_create_webmaster_section_fields_table', 1),
(33, '2020_09_11_201046_create_languages_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `smartend_other_feature`
--

CREATE TABLE `smartend_other_feature` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `smartend_other_feature`
--

INSERT INTO `smartend_other_feature` (`id`, `name`, `status`) VALUES
(1, 'Push Start', 1),
(2, 'HID Lights', 1),
(3, 'Multi-function Steering', 1),
(4, 'Alloy Wheels', 1),
(5, 'Keyless Entry', 1),
(6, 'Sunroof', 1),
(7, 'Moonroof', 1);

-- --------------------------------------------------------

--
-- Table structure for table `smartend_password_resets`
--

CREATE TABLE `smartend_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `smartend_permissions`
--

CREATE TABLE `smartend_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `view_status` tinyint(4) NOT NULL DEFAULT 0,
  `add_status` tinyint(4) NOT NULL DEFAULT 0,
  `edit_status` tinyint(4) NOT NULL DEFAULT 0,
  `delete_status` tinyint(4) NOT NULL DEFAULT 0,
  `active_status` tinyint(4) NOT NULL DEFAULT 0,
  `analytics_status` tinyint(4) NOT NULL DEFAULT 0,
  `inbox_status` tinyint(4) NOT NULL DEFAULT 0,
  `newsletter_status` tinyint(4) NOT NULL DEFAULT 0,
  `calendar_status` tinyint(4) NOT NULL DEFAULT 0,
  `banners_status` tinyint(4) NOT NULL DEFAULT 0,
  `settings_status` tinyint(4) NOT NULL DEFAULT 0,
  `webmaster_status` tinyint(4) NOT NULL DEFAULT 0,
  `data_sections` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_status` tinyint(4) NOT NULL DEFAULT 0,
  `home_links` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_details_ar` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_details_en` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `home_details_bn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smartend_permissions`
--

INSERT INTO `smartend_permissions` (`id`, `name`, `view_status`, `add_status`, `edit_status`, `delete_status`, `active_status`, `analytics_status`, `inbox_status`, `newsletter_status`, `calendar_status`, `banners_status`, `settings_status`, `webmaster_status`, `data_sections`, `home_status`, `home_links`, `home_details_ar`, `home_details_en`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `home_details_bn`) VALUES
(1, 'Webmaster', 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '1,2,3,4,5,6,7,8,9', 0, NULL, NULL, NULL, 1, 1, NULL, '2020-12-12 17:50:54', '2022-02-04 00:14:31', NULL),
(2, 'Website Manager', 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, '1,2,3,4,5,6,7,8,9', 0, NULL, NULL, NULL, 1, 1, NULL, '2020-12-12 17:50:54', '2022-02-04 00:14:31', NULL),
(3, 'Limited User', 1, 1, 1, 0, 0, 0, 0, 0, 1, 1, 0, 0, '1,2,3,4,5,6,7,8,9', 0, NULL, NULL, NULL, 1, 1, NULL, '2020-12-12 17:50:54', '2022-02-04 00:14:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `smartend_photos`
--

CREATE TABLE `smartend_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `topic_id` int(11) NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `row_no` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `smartend_related_topics`
--

CREATE TABLE `smartend_related_topics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `topic_id` int(11) NOT NULL,
  `topic2_id` int(11) NOT NULL,
  `row_no` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `smartend_safety`
--

CREATE TABLE `smartend_safety` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `smartend_safety`
--

INSERT INTO `smartend_safety` (`id`, `name`, `status`) VALUES
(1, 'Airbag: Driver', 1),
(2, 'Airbag: Passenger', 1),
(3, 'Antilock Brakes', 1),
(4, 'Hands-Free', 1),
(5, 'Fog Lights', 1),
(6, 'Security System', 1),
(7, 'Remote Lock', 1);

-- --------------------------------------------------------

--
-- Table structure for table `smartend_seats`
--

CREATE TABLE `smartend_seats` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `smartend_seats`
--

INSERT INTO `smartend_seats` (`id`, `name`, `status`) VALUES
(1, 'Regular Seats', 1),
(2, 'Heated Seats', 1),
(3, 'Leather Interior', 1),
(4, 'Memory Seats', 1),
(5, 'Power Seats', 1),
(6, 'Third Row Seats', 1);

-- --------------------------------------------------------

--
-- Table structure for table `smartend_sections`
--

CREATE TABLE `smartend_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `visits` int(11) NOT NULL,
  `webmaster_id` int(11) NOT NULL,
  `father_id` int(11) NOT NULL,
  `row_no` int(11) NOT NULL,
  `seo_title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_keywords_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_url_slug_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title_bn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_title_bn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description_bn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_keywords_bn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_url_slug_bn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `smartend_seller`
--

CREATE TABLE `smartend_seller` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile` varchar(50) NOT NULL,
  `car_condition` tinyint(4) DEFAULT NULL,
  `brand` tinyint(4) DEFAULT NULL,
  `car_model` tinyint(4) DEFAULT NULL,
  `menufacturing_year` tinyint(4) DEFAULT NULL,
  `milage` varchar(50) DEFAULT NULL,
  `engine_capacity` varchar(50) DEFAULT NULL,
  `body_type` tinyint(4) DEFAULT NULL,
  `fuel_type` tinyint(4) DEFAULT NULL,
  `transmission` tinyint(4) DEFAULT NULL,
  `registration_year` tinyint(4) DEFAULT NULL,
  `registration_serial` tinyint(4) DEFAULT NULL,
  `registration_city` tinyint(4) DEFAULT NULL,
  `drive_type` tinyint(4) DEFAULT NULL,
  `exterior_color` tinyint(4) DEFAULT NULL,
  `interior_color` tinyint(4) DEFAULT NULL,
  `comfort` varchar(100) DEFAULT NULL,
  `enterteinment` varchar(100) DEFAULT NULL,
  `safty` varchar(50) DEFAULT NULL,
  `seats` varchar(50) DEFAULT NULL,
  `wwindow` varchar(50) DEFAULT NULL,
  `others` varchar(50) DEFAULT NULL,
  `tax_token_expaire` timestamp NULL DEFAULT NULL,
  `fitnes_exspaire` timestamp NULL DEFAULT NULL,
  `bank_loan` tinyint(2) DEFAULT NULL,
  `name_transfer` tinyint(2) DEFAULT NULL,
  `thana` tinyint(4) DEFAULT NULL,
  `district` tinyint(4) DEFAULT NULL,
  `address_line1` text DEFAULT NULL,
  `address_line2` text DEFAULT NULL,
  `message` text DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `smartend_seller`
--

INSERT INTO `smartend_seller` (`id`, `name`, `email`, `mobile`, `car_condition`, `brand`, `car_model`, `menufacturing_year`, `milage`, `engine_capacity`, `body_type`, `fuel_type`, `transmission`, `registration_year`, `registration_serial`, `registration_city`, `drive_type`, `exterior_color`, `interior_color`, `comfort`, `enterteinment`, `safty`, `seats`, `wwindow`, `others`, `tax_token_expaire`, `fitnes_exspaire`, `bank_loan`, `name_transfer`, `thana`, `district`, `address_line1`, `address_line2`, `message`, `price`, `created_at`, `updated_at`, `created_by`) VALUES
(1, 'Muhammad Golam Saroar', 'gsoroar@gmail.com', '01746555579', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-05 19:50:57', '2022-02-05 19:50:57', NULL),
(2, 'Muhammad Golam Saroar', 'gsoroar@gmail.com', '01746555579', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-05 19:52:39', '2022-02-05 19:52:39', NULL),
(3, 'Muhammad Golam Saroar', 'gsoroar@gmail.com', '01746555579', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-05 19:55:12', '2022-02-05 19:55:12', NULL),
(4, 'Muhammad Golam Saroar', 'gsoroar@gmail.com', '01746555579', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-05 20:06:05', '2022-02-05 20:06:05', NULL),
(5, 'Muhammad Golam Saroar', 'gsoroar@gmail.com', '01746555579', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-05 20:12:00', '2022-02-05 20:12:00', NULL),
(6, 'Muhammad Golam Saroar', 'gsoroar@gmail.com', '01746555579', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-05 20:13:55', '2022-02-05 20:13:55', NULL),
(7, 'Muhammad Golam Saroar', 'gsoroar@gmail.com', '01746555579', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-05 20:15:49', '2022-02-05 20:15:49', NULL),
(8, 'Muhammad Golam Saroar', 'gsoroar@gmail.com', '01746555579', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-05 20:18:36', '2022-02-05 20:18:36', NULL),
(9, 'Muhammad Golam Saroar', 'gsoroar@gmail.com', '01746555579', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-05 20:23:19', '2022-02-05 20:23:19', NULL),
(10, 'Muhammad Golam Saroar', 'gsoroar@gmail.com', '01746555579', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-05 20:25:33', '2022-02-05 20:25:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `smartend_sessions`
--

CREATE TABLE `smartend_sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `smartend_settings`
--

CREATE TABLE `smartend_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_desc_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_keywords_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_webmails` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notify_messages_status` tinyint(4) DEFAULT NULL,
  `notify_comments_status` tinyint(4) DEFAULT NULL,
  `notify_orders_status` tinyint(4) DEFAULT NULL,
  `notify_table_status` tinyint(4) DEFAULT NULL,
  `notify_private_status` tinyint(4) DEFAULT NULL,
  `site_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_status` tinyint(4) NOT NULL,
  `close_msg` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_link1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_link2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_link3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_link4` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_link5` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_link6` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_link7` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_link8` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_link9` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_link10` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_t1_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_t3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_t4` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_t5` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_t6` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_t7_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `style_logo_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `style_fav` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `style_apple` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `style_color1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `style_color2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `style_type` tinyint(4) DEFAULT NULL,
  `style_bg_type` tinyint(4) DEFAULT NULL,
  `style_bg_pattern` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `style_bg_color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `style_bg_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `style_subscribe` tinyint(4) DEFAULT NULL,
  `style_footer` tinyint(4) DEFAULT NULL,
  `style_header` tinyint(4) DEFAULT NULL,
  `style_footer_bg` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `style_preload` tinyint(4) DEFAULT NULL,
  `css` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `site_title_bn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_desc_bn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_keywords_bn` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_t1_bn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_t7_bn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `style_logo_bn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smartend_settings`
--

INSERT INTO `smartend_settings` (`id`, `site_title_en`, `site_desc_en`, `site_keywords_en`, `site_webmails`, `notify_messages_status`, `notify_comments_status`, `notify_orders_status`, `notify_table_status`, `notify_private_status`, `site_url`, `site_status`, `close_msg`, `social_link1`, `social_link2`, `social_link3`, `social_link4`, `social_link5`, `social_link6`, `social_link7`, `social_link8`, `social_link9`, `social_link10`, `contact_t1_en`, `contact_t3`, `contact_t4`, `contact_t5`, `contact_t6`, `contact_t7_en`, `style_logo_en`, `style_fav`, `style_apple`, `style_color1`, `style_color2`, `style_type`, `style_bg_type`, `style_bg_pattern`, `style_bg_color`, `style_bg_image`, `style_subscribe`, `style_footer`, `style_header`, `style_footer_bg`, `style_preload`, `css`, `created_by`, `updated_by`, `created_at`, `updated_at`, `site_title_bn`, `site_desc_bn`, `site_keywords_bn`, `contact_t1_bn`, `contact_t7_bn`, `style_logo_bn`) VALUES
(1, 'Site Title', 'Website description and some little information about it', 'key, words, website, web', 'si139684@gmail.com', 1, 1, 1, 0, 0, 'http://www.sitename.com/', 1, 'Website under maintenance \r\n<h1>Comming SOON</h1>', 'https://www.facebook.com/sislamcars/', NULL, NULL, '#', '#', '#', NULL, NULL, '#', '#', 'Tazbih plaza, House # 08, Block # B, Uttara, Dhaka - 1230', '+8801712282178', NULL, '+8801712282178', 'si139684@gmail.com', 'Sunday to Saturday 09:00 AM to 09:00 PM', '16440434654908.png', '16440413252279.png', '16440413254309.png', '#0b1b38', '#2e3e4e', 0, 0, NULL, NULL, NULL, 1, 1, 0, NULL, 1, NULL, 1, 1, '2020-12-12 17:50:54', '2022-02-05 06:44:25', 'Site Title', 'Website description and some little information about it', 'key, words, website, web', 'তাজবিহ প্লাজা, বাড়ি # ০৮, ব্লক # বি, উত্তরা, ঢাকা - 1230', 'রবিবার থেকে শনিবার সকাল 09:00 AM থেকে 09:00 PM পর্যন্ত', '16440434659182.png');

-- --------------------------------------------------------

--
-- Table structure for table `smartend_smartend_thana`
--

CREATE TABLE `smartend_smartend_thana` (
  `id` int(11) NOT NULL,
  `name` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `district_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `smartend_thana`
--

CREATE TABLE `smartend_thana` (
  `id` int(11) NOT NULL,
  `name` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `district_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `smartend_thana`
--

INSERT INTO `smartend_thana` (`id`, `name`, `district_id`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'AMTALI', 1, 1, NULL, NULL, NULL, NULL),
(2, 'BARGUNA SADAR', 1, 1, NULL, NULL, NULL, NULL),
(3, 'BETAGI', 1, 1, NULL, NULL, NULL, NULL),
(4, 'PATHARGHATA', 1, 1, NULL, NULL, NULL, NULL),
(5, 'TALTALI', 1, 1, NULL, NULL, NULL, NULL),
(6, 'AGAILJHARA', 2, 1, NULL, NULL, NULL, NULL),
(7, 'BABUGANJ', 2, 1, NULL, NULL, NULL, NULL),
(8, 'BAKERGANJ', 2, 1, NULL, NULL, NULL, NULL),
(9, 'BANARI PARA', 2, 1, NULL, NULL, NULL, NULL),
(10, 'BARISAL SADAR (KOTWALI)', 2, 1, NULL, NULL, NULL, NULL),
(11, 'GAURNADI', 2, 1, NULL, NULL, NULL, NULL),
(12, 'HIZLA', 2, 1, NULL, NULL, NULL, NULL),
(13, 'MEHENDIGANJ', 2, 1, NULL, NULL, NULL, NULL),
(14, 'MULADI', 2, 1, NULL, NULL, NULL, NULL),
(15, 'WAZIRPUR', 2, 1, NULL, NULL, NULL, NULL),
(16, 'BHOLA SADAR', 3, 1, NULL, NULL, NULL, NULL),
(17, 'BURHANUDDIN', 3, 1, NULL, NULL, NULL, NULL),
(18, 'CHAR FASSON', 3, 1, NULL, NULL, NULL, NULL),
(19, 'DAULAT KHAN', 3, 1, NULL, NULL, NULL, NULL),
(20, 'LALMOHAN', 3, 1, NULL, NULL, NULL, NULL),
(21, 'MANPURA', 3, 1, NULL, NULL, NULL, NULL),
(22, 'TAZUMUDDIN', 3, 1, NULL, NULL, NULL, NULL),
(23, 'JHALOKATI SADAR', 4, 1, NULL, NULL, NULL, NULL),
(24, 'KANTHALIA', 4, 1, NULL, NULL, NULL, NULL),
(25, 'NALCHITY', 4, 1, NULL, NULL, NULL, NULL),
(26, 'RAJAPUR', 4, 1, NULL, NULL, NULL, NULL),
(27, 'BAUPHAL', 5, 1, NULL, NULL, NULL, NULL),
(28, 'DASHMINA', 5, 1, NULL, NULL, NULL, NULL),
(29, 'DUMKI UPAZILA', 5, 1, NULL, NULL, NULL, NULL),
(30, 'GALACHIPA', 5, 1, NULL, NULL, NULL, NULL),
(31, 'KALA PARA', 5, 1, NULL, NULL, NULL, NULL),
(32, 'MIRZAGANJ UPAZILA', 5, 1, NULL, NULL, NULL, NULL),
(33, 'PATUAKHALI SADAR', 5, 1, NULL, NULL, NULL, NULL),
(34, 'RANGABALI', 5, 1, NULL, NULL, NULL, NULL),
(35, 'BHANDARIA', 6, 1, NULL, NULL, NULL, NULL),
(36, 'INDURKANI', 6, 1, NULL, NULL, NULL, NULL),
(37, 'KAWKHALI', 6, 1, NULL, NULL, NULL, NULL),
(38, 'MATHBARIA', 6, 1, NULL, NULL, NULL, NULL),
(39, 'NAZIRPUR UPAZILA', 6, 1, NULL, NULL, NULL, NULL),
(40, 'NESARABAD (SWARUPKATI)', 6, 1, NULL, NULL, NULL, NULL),
(41, 'PIROJPUR SADAR', 6, 1, NULL, NULL, NULL, NULL),
(42, 'ALIKADAM', 7, 1, NULL, NULL, NULL, NULL),
(43, 'BANDARBAN SADAR', 7, 1, NULL, NULL, NULL, NULL),
(44, 'LAMA', 7, 1, NULL, NULL, NULL, NULL),
(45, 'NAIKHONGCHHARI', 7, 1, NULL, NULL, NULL, NULL),
(46, 'ROWANGCHHARI', 7, 1, NULL, NULL, NULL, NULL),
(47, 'RUMA', 7, 1, NULL, NULL, NULL, NULL),
(48, 'THANCHI', 7, 1, NULL, NULL, NULL, NULL),
(49, 'AKHAURA', 8, 1, NULL, NULL, NULL, NULL),
(50, 'ASHUGANJ', 8, 1, NULL, NULL, NULL, NULL),
(51, 'BANCHHARAMPUR', 8, 1, NULL, NULL, NULL, NULL),
(52, 'BIJOYNAGAR', 8, 1, NULL, NULL, NULL, NULL),
(53, 'BRAHMANBARIA SADAR', 8, 1, NULL, NULL, NULL, NULL),
(54, 'KASBA', 8, 1, NULL, NULL, NULL, NULL),
(55, 'NABINAGAR', 8, 1, NULL, NULL, NULL, NULL),
(56, 'NASIRNAGAR', 8, 1, NULL, NULL, NULL, NULL),
(57, 'SARAIL', 8, 1, NULL, NULL, NULL, NULL),
(58, 'CHANDPUR SADAR', 9, 1, NULL, NULL, NULL, NULL),
(59, 'FARIDGANJ', 9, 1, NULL, NULL, NULL, NULL),
(60, 'HAIM CHAR', 9, 1, NULL, NULL, NULL, NULL),
(61, 'HAJIGANJ', 9, 1, NULL, NULL, NULL, NULL),
(62, 'KACHUA', 9, 1, NULL, NULL, NULL, NULL),
(63, 'MATLAB DAKSHIN', 9, 1, NULL, NULL, NULL, NULL),
(64, 'MATLAB UTTAR', 9, 1, NULL, NULL, NULL, NULL),
(65, 'SHAHRASTI', 9, 1, NULL, NULL, NULL, NULL),
(66, 'ANOWARA', 10, 1, NULL, NULL, NULL, NULL),
(67, 'BANSHKHALI', 10, 1, NULL, NULL, NULL, NULL),
(68, 'BAYEJID BOSTAMI', 10, 1, NULL, NULL, NULL, NULL),
(69, 'BOALKHALI', 10, 1, NULL, NULL, NULL, NULL),
(70, 'CHANDANAISH', 10, 1, NULL, NULL, NULL, NULL),
(71, 'CHANDGAON', 10, 1, NULL, NULL, NULL, NULL),
(72, 'DOUBLE MOORING', 10, 1, NULL, NULL, NULL, NULL),
(73, 'FATIKCHHARI', 10, 1, NULL, NULL, NULL, NULL),
(74, 'HALISHAHAR', 10, 1, NULL, NULL, NULL, NULL),
(75, 'HATHAZARI', 10, 1, NULL, NULL, NULL, NULL),
(76, 'KHULSHI', 10, 1, NULL, NULL, NULL, NULL),
(77, 'KOTWALI', 10, 1, NULL, NULL, NULL, NULL),
(78, 'LOHAGARA', 10, 1, NULL, NULL, NULL, NULL),
(79, 'MIRSHARAI', 10, 1, NULL, NULL, NULL, NULL),
(80, 'PAHARTALI', 10, 1, NULL, NULL, NULL, NULL),
(81, 'PANCHLAISH', 10, 1, NULL, NULL, NULL, NULL),
(82, 'PATIYA', 10, 1, NULL, NULL, NULL, NULL),
(83, 'RANGUNIA', 10, 1, NULL, NULL, NULL, NULL),
(84, 'RAOZAN', 10, 1, NULL, NULL, NULL, NULL),
(85, 'SANDWIP', 10, 1, NULL, NULL, NULL, NULL),
(86, 'SATKANIA', 10, 1, NULL, NULL, NULL, NULL),
(87, 'SITAKUNDA', 10, 1, NULL, NULL, NULL, NULL),
(88, 'BARURA', 11, 1, NULL, NULL, NULL, NULL),
(89, 'BRAHMAN PARA', 11, 1, NULL, NULL, NULL, NULL),
(90, 'BURICHANG', 11, 1, NULL, NULL, NULL, NULL),
(91, 'CHANDINA', 11, 1, NULL, NULL, NULL, NULL),
(92, 'CHAUDDAGRAM', 11, 1, NULL, NULL, NULL, NULL),
(93, 'COMILLA ADARSHA SADAR', 11, 1, NULL, NULL, NULL, NULL),
(94, 'COMILLA SADAR DAKSHIN', 11, 1, NULL, NULL, NULL, NULL),
(95, 'DAUDKANDI', 11, 1, NULL, NULL, NULL, NULL),
(96, 'DEBIDWAR', 11, 1, NULL, NULL, NULL, NULL),
(97, 'HOMNA', 11, 1, NULL, NULL, NULL, NULL),
(98, 'LAKSAM', 11, 1, NULL, NULL, NULL, NULL),
(99, 'MANOHARGANJ', 11, 1, NULL, NULL, NULL, NULL),
(100, 'MEGHNA', 11, 1, NULL, NULL, NULL, NULL),
(101, 'MURADNAGAR', 11, 1, NULL, NULL, NULL, NULL),
(102, 'NANGALKOT', 11, 1, NULL, NULL, NULL, NULL),
(103, 'TITAS', 11, 1, NULL, NULL, NULL, NULL),
(104, 'CHAKARIA', 12, 1, NULL, NULL, NULL, NULL),
(105, 'COX\'S BAZAR SADAR', 12, 1, NULL, NULL, NULL, NULL),
(106, 'KUTUBDIA', 12, 1, NULL, NULL, NULL, NULL),
(107, 'MAHESHKHALI', 12, 1, NULL, NULL, NULL, NULL),
(108, 'PEKUA', 12, 1, NULL, NULL, NULL, NULL),
(109, 'RAMU', 12, 1, NULL, NULL, NULL, NULL),
(110, 'TEKNAF', 12, 1, NULL, NULL, NULL, NULL),
(111, 'UKHIA UPAZILA', 12, 1, NULL, NULL, NULL, NULL),
(112, 'CHHAGALNAIYA', 13, 1, NULL, NULL, NULL, NULL),
(113, 'DAGANBHUIYAN', 13, 1, NULL, NULL, NULL, NULL),
(114, 'FENI SADAR', 13, 1, NULL, NULL, NULL, NULL),
(115, 'FULGAZI', 13, 1, NULL, NULL, NULL, NULL),
(116, 'PARSHURAM', 13, 1, NULL, NULL, NULL, NULL),
(117, 'SONAGAZI', 13, 1, NULL, NULL, NULL, NULL),
(118, 'DIGHINALA', 14, 1, NULL, NULL, NULL, NULL),
(119, 'KHAGRACHHARI SADAR', 14, 1, NULL, NULL, NULL, NULL),
(120, 'LAKSHMICHHARI', 14, 1, NULL, NULL, NULL, NULL),
(121, 'MAHALCHHARI', 14, 1, NULL, NULL, NULL, NULL),
(122, 'MANIKCHHARI', 14, 1, NULL, NULL, NULL, NULL),
(123, 'MATIRANGA', 14, 1, NULL, NULL, NULL, NULL),
(124, 'PANCHHARI', 14, 1, NULL, NULL, NULL, NULL),
(125, 'RAMGARH', 14, 1, NULL, NULL, NULL, NULL),
(126, 'KAMALNAGAR', 15, 1, NULL, NULL, NULL, NULL),
(127, 'LAKSHMIPUR SADAR', 15, 1, NULL, NULL, NULL, NULL),
(128, 'RAMGANJ', 15, 1, NULL, NULL, NULL, NULL),
(129, 'RAMGATI', 15, 1, NULL, NULL, NULL, NULL),
(130, 'ROYPUR', 15, 1, NULL, NULL, NULL, NULL),
(131, 'BEGUMGANJ', 16, 1, NULL, NULL, NULL, NULL),
(132, 'CHATKHIL', 16, 1, NULL, NULL, NULL, NULL),
(133, 'COMPANIGANJ', 16, 1, NULL, NULL, NULL, NULL),
(134, 'HATIYA', 16, 1, NULL, NULL, NULL, NULL),
(135, 'KABIRHAT', 16, 1, NULL, NULL, NULL, NULL),
(136, 'NOAKHALI SADAR', 16, 1, NULL, NULL, NULL, NULL),
(137, 'SENBAGH', 16, 1, NULL, NULL, NULL, NULL),
(138, 'SONAIMURI', 16, 1, NULL, NULL, NULL, NULL),
(139, 'SUBARNACHAR', 16, 1, NULL, NULL, NULL, NULL),
(140, 'BAGHAICHHARI', 17, 1, NULL, NULL, NULL, NULL),
(141, 'BARKAL UPAZILA', 17, 1, NULL, NULL, NULL, NULL),
(142, 'BELAI CHHARI  UPAZI', 17, 1, NULL, NULL, NULL, NULL),
(143, 'JURAI CHHARI UPAZIL', 17, 1, NULL, NULL, NULL, NULL),
(144, 'KAPTAI  UPAZILA', 17, 1, NULL, NULL, NULL, NULL),
(145, 'KAWKHALI (BETBUNIA)', 17, 1, NULL, NULL, NULL, NULL),
(146, 'LANGADU  UPAZILA', 17, 1, NULL, NULL, NULL, NULL),
(147, 'NANIARCHAR  UPAZILA', 17, 1, NULL, NULL, NULL, NULL),
(148, 'RAJASTHALI  UPAZILA', 17, 1, NULL, NULL, NULL, NULL),
(149, 'RANGAMATI SADAR  UP', 17, 1, NULL, NULL, NULL, NULL),
(150, 'ADABOR', 18, 1, NULL, NULL, NULL, NULL),
(151, 'BADDA', 18, 1, NULL, NULL, NULL, NULL),
(152, 'BANGSHAL', 18, 1, NULL, NULL, NULL, NULL),
(153, 'BHANSAN TEK', 18, 1, NULL, NULL, NULL, NULL),
(154, 'CANTONMENT', 18, 1, NULL, NULL, NULL, NULL),
(155, 'CHAK BAZAR', 18, 1, NULL, NULL, NULL, NULL),
(156, 'DAKSHINKHAN', 18, 1, NULL, NULL, NULL, NULL),
(157, 'DEMRA', 18, 1, NULL, NULL, NULL, NULL),
(158, 'DHAMRAI', 18, 1, NULL, NULL, NULL, NULL),
(159, 'DHANMONDI', 18, 1, NULL, NULL, NULL, NULL),
(160, 'DOHAR', 18, 1, NULL, NULL, NULL, NULL),
(161, 'GENDARIA', 18, 1, NULL, NULL, NULL, NULL),
(162, 'GULSHAN', 18, 1, NULL, NULL, NULL, NULL),
(163, 'HAZARIBAGH', 18, 1, NULL, NULL, NULL, NULL),
(164, 'JATRABARI', 18, 1, NULL, NULL, NULL, NULL),
(165, 'KADAMTALI', 18, 1, NULL, NULL, NULL, NULL),
(166, 'KAFRUL', 18, 1, NULL, NULL, NULL, NULL),
(167, 'KALABAGAN', 18, 1, NULL, NULL, NULL, NULL),
(168, 'KAMRANGIR CHAR', 18, 1, NULL, NULL, NULL, NULL),
(169, 'KERANIGANJ', 18, 1, NULL, NULL, NULL, NULL),
(170, 'KHILGAON', 18, 1, NULL, NULL, NULL, NULL),
(171, 'KHILKHET', 18, 1, NULL, NULL, NULL, NULL),
(172, 'LALBAGH', 18, 1, NULL, NULL, NULL, NULL),
(173, 'MIRPUR', 18, 1, NULL, NULL, NULL, NULL),
(174, 'MOHAMMADPUR', 18, 1, NULL, NULL, NULL, NULL),
(175, 'MOTIJHEEL', 18, 1, NULL, NULL, NULL, NULL),
(176, 'MUGDA PARA', 18, 1, NULL, NULL, NULL, NULL),
(177, 'NAWABGANJ', 18, 1, NULL, NULL, NULL, NULL),
(178, 'PALLABI', 18, 1, NULL, NULL, NULL, NULL),
(179, 'RAMNA', 18, 1, NULL, NULL, NULL, NULL),
(180, 'RAMPURA', 18, 1, NULL, NULL, NULL, NULL),
(181, 'SABUJBAGH', 18, 1, NULL, NULL, NULL, NULL),
(182, 'SAVAR', 18, 1, NULL, NULL, NULL, NULL),
(183, 'SHER-E-BANGLA NAGAR', 18, 1, NULL, NULL, NULL, NULL),
(184, 'SHYAMPUR', 18, 1, NULL, NULL, NULL, NULL),
(185, 'SUTRAPUR', 18, 1, NULL, NULL, NULL, NULL),
(186, 'TEJGAON IND. AREA', 18, 1, NULL, NULL, NULL, NULL),
(187, 'TURAG', 18, 1, NULL, NULL, NULL, NULL),
(188, 'UTTAR KHAN', 18, 1, NULL, NULL, NULL, NULL),
(189, 'UTTARA', 18, 1, NULL, NULL, NULL, NULL),
(190, 'UTTARA  PASCHIM', 18, 1, NULL, NULL, NULL, NULL),
(191, 'ALFADANGA', 19, 1, NULL, NULL, NULL, NULL),
(192, 'BHANGA', 19, 1, NULL, NULL, NULL, NULL),
(193, 'BOALMARI', 19, 1, NULL, NULL, NULL, NULL),
(194, 'CHAR BHADRASAN', 19, 1, NULL, NULL, NULL, NULL),
(195, 'FARIDPUR SADAR', 19, 1, NULL, NULL, NULL, NULL),
(196, 'MADHUKHALI', 19, 1, NULL, NULL, NULL, NULL),
(197, 'NAGARKANDA', 19, 1, NULL, NULL, NULL, NULL),
(198, 'SADARPUR', 19, 1, NULL, NULL, NULL, NULL),
(199, 'SHALTHA', 19, 1, NULL, NULL, NULL, NULL),
(200, 'GAZIPUR SADAR', 20, 1, NULL, NULL, NULL, NULL),
(201, 'KALIAKAIR', 20, 1, NULL, NULL, NULL, NULL),
(202, 'KALIGANJ', 20, 1, NULL, NULL, NULL, NULL),
(203, 'KAPASIA', 20, 1, NULL, NULL, NULL, NULL),
(204, 'SREEPUR', 20, 1, NULL, NULL, NULL, NULL),
(205, 'GOPALGANJ SADAR', 21, 1, NULL, NULL, NULL, NULL),
(206, 'KASHIANI', 21, 1, NULL, NULL, NULL, NULL),
(207, 'KOTALIPARA', 21, 1, NULL, NULL, NULL, NULL),
(208, 'MUKSUDPUR', 21, 1, NULL, NULL, NULL, NULL),
(209, 'TUNGIPARA', 21, 1, NULL, NULL, NULL, NULL),
(210, 'BAKSHIGANJ', 22, 1, NULL, NULL, NULL, NULL),
(211, 'DEWANGANJ', 22, 1, NULL, NULL, NULL, NULL),
(212, 'ISLAMPUR', 22, 1, NULL, NULL, NULL, NULL),
(213, 'JAMALPUR SADAR', 22, 1, NULL, NULL, NULL, NULL),
(214, 'MADARGANJ', 22, 1, NULL, NULL, NULL, NULL),
(215, 'MELANDAHA', 22, 1, NULL, NULL, NULL, NULL),
(216, 'SARISHABARI UPAZILA', 22, 1, NULL, NULL, NULL, NULL),
(217, 'AUSTAGRAM', 23, 1, NULL, NULL, NULL, NULL),
(218, 'BAJITPUR', 23, 1, NULL, NULL, NULL, NULL),
(219, 'BHAIRAB', 23, 1, NULL, NULL, NULL, NULL),
(220, 'HOSSAINPUR', 23, 1, NULL, NULL, NULL, NULL),
(221, 'ITNA', 23, 1, NULL, NULL, NULL, NULL),
(222, 'KARIMGANJ', 23, 1, NULL, NULL, NULL, NULL),
(223, 'KATIADI', 23, 1, NULL, NULL, NULL, NULL),
(224, 'KISHOREGANJ SADAR', 23, 1, NULL, NULL, NULL, NULL),
(225, 'KULIAR CHAR', 23, 1, NULL, NULL, NULL, NULL),
(226, 'MITHAMAIN', 23, 1, NULL, NULL, NULL, NULL),
(227, 'NIKLI', 23, 1, NULL, NULL, NULL, NULL),
(228, 'PAKUNDIA', 23, 1, NULL, NULL, NULL, NULL),
(229, 'TARAIL', 23, 1, NULL, NULL, NULL, NULL),
(230, 'KALKINI', 24, 1, NULL, NULL, NULL, NULL),
(231, 'MADARIPUR SADAR', 24, 1, NULL, NULL, NULL, NULL),
(232, 'RAJOIR', 24, 1, NULL, NULL, NULL, NULL),
(233, 'SHIB CHAR', 24, 1, NULL, NULL, NULL, NULL),
(234, 'DAULATPUR', 25, 1, NULL, NULL, NULL, NULL),
(235, 'GHIOR', 25, 1, NULL, NULL, NULL, NULL),
(236, 'HARIRAMPUR', 25, 1, NULL, NULL, NULL, NULL),
(237, 'MANIKGANJ SADAR', 25, 1, NULL, NULL, NULL, NULL),
(238, 'SATURIA', 25, 1, NULL, NULL, NULL, NULL),
(239, 'SHIBALAYA', 25, 1, NULL, NULL, NULL, NULL),
(240, 'SINGAIR', 25, 1, NULL, NULL, NULL, NULL),
(241, 'JURI', 71, 1, NULL, '2018-05-14 04:29:57', NULL, NULL),
(242, 'GAZARIA', 27, 1, NULL, NULL, NULL, NULL),
(243, 'LOHAJANG', 27, 1, NULL, NULL, NULL, NULL),
(244, 'MUNSHIGANJ SADAR', 27, 1, NULL, NULL, NULL, NULL),
(245, 'SERAJDIKHAN', 27, 1, NULL, NULL, NULL, NULL),
(246, 'SREENAGAR', 27, 1, NULL, NULL, NULL, NULL),
(247, 'TONGIBARI', 27, 1, NULL, NULL, NULL, NULL),
(248, 'BHALUKA', 28, 1, NULL, NULL, NULL, NULL),
(249, 'DHOBAURA', 28, 1, NULL, NULL, NULL, NULL),
(250, 'FULBARIA', 28, 1, NULL, NULL, NULL, NULL),
(251, 'GAFFARGAON', 28, 1, NULL, NULL, NULL, NULL),
(252, 'GAURIPUR', 28, 1, NULL, NULL, NULL, NULL),
(253, 'HALUAGHAT', 28, 1, NULL, NULL, NULL, NULL),
(254, 'ISHWARGANJ', 28, 1, NULL, NULL, NULL, NULL),
(255, 'MUKTAGACHHA', 28, 1, NULL, NULL, NULL, NULL),
(256, 'MYMENSINGH SADAR', 28, 1, NULL, NULL, NULL, NULL),
(257, 'NANDAIL', 28, 1, NULL, NULL, NULL, NULL),
(258, 'PHULPUR', 28, 1, NULL, NULL, NULL, NULL),
(259, 'TARAKANDA', 28, 1, NULL, NULL, NULL, NULL),
(260, 'TRISHAL', 28, 1, NULL, NULL, NULL, NULL),
(261, 'ARAIHAZAR', 29, 1, NULL, NULL, NULL, NULL),
(262, 'BANDAR', 29, 1, NULL, NULL, NULL, NULL),
(263, 'NARAYANGANJ SADAR', 29, 1, NULL, NULL, NULL, NULL),
(264, 'RUPGANJ', 29, 1, NULL, NULL, NULL, NULL),
(265, 'SONARGAON', 29, 1, NULL, NULL, NULL, NULL),
(266, 'BELABO', 30, 1, NULL, NULL, NULL, NULL),
(267, 'MANOHARDI', 30, 1, NULL, NULL, NULL, NULL),
(268, 'NARSINGDI SADAR', 30, 1, NULL, NULL, NULL, NULL),
(269, 'PALASH', 30, 1, NULL, NULL, NULL, NULL),
(270, 'ROYPURA', 30, 1, NULL, NULL, NULL, NULL),
(271, 'SHIBPUR', 30, 1, NULL, NULL, NULL, NULL),
(272, 'ATPARA', 31, 1, NULL, NULL, NULL, NULL),
(273, 'BARHATTA', 31, 1, NULL, NULL, NULL, NULL),
(274, 'DURGAPUR', 31, 1, NULL, NULL, NULL, NULL),
(275, 'KALMAKANDA', 31, 1, NULL, NULL, NULL, NULL),
(276, 'KENDUA', 31, 1, NULL, NULL, NULL, NULL),
(277, 'KHALIAJURI', 31, 1, NULL, NULL, NULL, NULL),
(278, 'MADAN', 31, 1, NULL, NULL, NULL, NULL),
(279, 'MOHANGANJ', 31, 1, NULL, NULL, NULL, NULL),
(280, 'NETROKONA SADAR', 31, 1, NULL, NULL, NULL, NULL),
(281, 'PURBADHALA', 31, 1, NULL, NULL, NULL, NULL),
(282, 'BALIAKANDI', 32, 1, NULL, NULL, NULL, NULL),
(283, 'GOALANDA', 32, 1, NULL, NULL, NULL, NULL),
(284, 'KALUKHALI', 32, 1, NULL, NULL, NULL, NULL),
(285, 'PANGSHA', 32, 1, NULL, NULL, NULL, NULL),
(286, 'RAJBARI SADAR', 32, 1, NULL, NULL, NULL, NULL),
(287, 'BHEDARGANJ', 33, 1, NULL, NULL, NULL, NULL),
(288, 'DAMUDYA', 33, 1, NULL, NULL, NULL, NULL),
(289, 'GOSAIRHAT', 33, 1, NULL, NULL, NULL, NULL),
(290, 'NARIA', 33, 1, NULL, NULL, NULL, NULL),
(291, 'SHARIATPUR SADAR', 33, 1, NULL, NULL, NULL, NULL),
(292, 'ZANJIRA', 33, 1, NULL, NULL, NULL, NULL),
(293, 'JHENAIGATI', 34, 1, NULL, NULL, NULL, NULL),
(294, 'NAKLA', 34, 1, NULL, NULL, NULL, NULL),
(295, 'NALITABARI', 34, 1, NULL, NULL, NULL, NULL),
(296, 'SHERPUR SADAR', 34, 1, NULL, NULL, NULL, NULL),
(297, 'SREEBARDI', 34, 1, NULL, NULL, NULL, NULL),
(298, 'BASAIL', 35, 1, NULL, NULL, NULL, NULL),
(299, 'BHUAPUR', 35, 1, NULL, NULL, NULL, NULL),
(300, 'DELDUAR', 35, 1, NULL, NULL, NULL, NULL),
(301, 'DHANBARI', 35, 1, NULL, NULL, NULL, NULL),
(302, 'GHATAIL', 35, 1, NULL, NULL, NULL, NULL),
(303, 'GOPALPUR', 35, 1, NULL, NULL, NULL, NULL),
(304, 'KALIHATI', 35, 1, NULL, NULL, NULL, NULL),
(305, 'MADHUPUR', 35, 1, NULL, NULL, NULL, NULL),
(306, 'MIRZAPUR', 35, 1, NULL, NULL, NULL, NULL),
(307, 'NAGARPUR', 35, 1, NULL, NULL, NULL, NULL),
(308, 'SAKHIPUR', 35, 1, NULL, NULL, NULL, NULL),
(309, 'TANGAIL SADAR', 35, 1, NULL, NULL, NULL, NULL),
(310, 'BAGERHAT SADAR', 36, 1, NULL, NULL, NULL, NULL),
(311, 'CHITALMARI', 36, 1, NULL, NULL, NULL, NULL),
(312, 'FAKIRHAT', 36, 1, NULL, NULL, NULL, NULL),
(313, 'MOLLAHAT', 36, 1, NULL, NULL, NULL, NULL),
(314, 'MONGLA', 36, 1, NULL, NULL, NULL, NULL),
(315, 'MORRELGANJ', 36, 1, NULL, NULL, NULL, NULL),
(316, 'RAMPAL', 36, 1, NULL, NULL, NULL, NULL),
(317, 'SARANKHOLA', 36, 1, NULL, NULL, NULL, NULL),
(318, 'ALAMDANGA', 37, 1, NULL, NULL, NULL, NULL),
(319, 'CHUADANGA SADAR', 37, 1, NULL, NULL, NULL, NULL),
(320, 'DAMURHUDA', 37, 1, NULL, NULL, NULL, NULL),
(321, 'JIBAN NAGAR', 37, 1, NULL, NULL, NULL, NULL),
(322, 'ABHAYNAGAR', 38, 1, NULL, NULL, NULL, NULL),
(323, 'BAGHER PARA', 38, 1, NULL, NULL, NULL, NULL),
(324, 'CHAUGACHHA', 38, 1, NULL, NULL, NULL, NULL),
(325, 'JHIKARGACHHA', 38, 1, NULL, NULL, NULL, NULL),
(326, 'KESHABPUR', 38, 1, NULL, NULL, NULL, NULL),
(327, 'MANIRAMPUR', 38, 1, NULL, NULL, NULL, NULL),
(328, 'SHARSHA', 38, 1, NULL, NULL, NULL, NULL),
(329, 'HORINAKUNDA', 39, 1, NULL, NULL, NULL, NULL),
(330, 'JHENAIDAH SADAR', 39, 1, NULL, NULL, NULL, NULL),
(331, 'KOTCHANDPUR', 39, 1, NULL, NULL, NULL, NULL),
(332, 'MAHESHPUR', 39, 1, NULL, NULL, NULL, NULL),
(333, 'SHAILKUPA', 39, 1, NULL, NULL, NULL, NULL),
(334, 'BATIAGHATA', 40, 1, NULL, NULL, NULL, NULL),
(335, 'DACOPE', 40, 1, NULL, NULL, NULL, NULL),
(336, 'DIGHALIA', 40, 1, NULL, NULL, NULL, NULL),
(337, 'DUMURIA', 40, 1, NULL, NULL, NULL, NULL),
(338, 'KHALISHPUR', 40, 1, NULL, NULL, NULL, NULL),
(339, 'KHAN JAHAN ALI', 40, 1, NULL, NULL, NULL, NULL),
(340, 'KOYRA', 40, 1, NULL, NULL, NULL, NULL),
(341, 'PAIKGACHHA', 40, 1, NULL, NULL, NULL, NULL),
(342, 'PHULTALA', 40, 1, NULL, NULL, NULL, NULL),
(343, 'RUPSA', 40, 1, NULL, NULL, NULL, NULL),
(344, 'SONADANGA', 40, 1, NULL, NULL, NULL, NULL),
(345, 'TEROKHADA', 40, 1, NULL, NULL, NULL, NULL),
(346, 'BHERAMARA', 41, 1, NULL, NULL, NULL, NULL),
(347, 'KHOKSA', 41, 1, NULL, NULL, NULL, NULL),
(348, 'KUMARKHALI', 41, 1, NULL, NULL, NULL, NULL),
(349, 'KUSHTIA SADAR', 41, 1, NULL, NULL, NULL, NULL),
(350, 'MAGURA SADAR', 42, 1, NULL, NULL, NULL, NULL),
(351, 'SHALIKHA', 42, 1, NULL, NULL, NULL, NULL),
(352, 'GANGNI', 43, 1, NULL, NULL, NULL, NULL),
(353, 'MEHERPUR SADAR', 43, 1, NULL, NULL, NULL, NULL),
(354, 'MUJIB NAGAR', 43, 1, NULL, NULL, NULL, NULL),
(355, 'KALIA', 44, 1, NULL, NULL, NULL, NULL),
(356, 'NARAIL SADAR', 44, 1, NULL, NULL, NULL, NULL),
(357, 'ASSASUNI', 45, 1, NULL, NULL, NULL, NULL),
(358, 'DEBHATA', 45, 1, NULL, NULL, NULL, NULL),
(359, 'KALAROA', 45, 1, NULL, NULL, NULL, NULL),
(360, 'SATKHIRA SADAR', 45, 1, NULL, NULL, NULL, NULL),
(361, 'SHYAMNAGAR', 45, 1, NULL, NULL, NULL, NULL),
(362, 'TALA', 45, 1, NULL, NULL, NULL, NULL),
(363, 'ADAMDIGHI', 46, 1, NULL, NULL, NULL, NULL),
(364, 'BOGRA SADAR', 46, 1, NULL, NULL, NULL, NULL),
(365, 'DHUNAT', 46, 1, NULL, NULL, NULL, NULL),
(366, 'DHUPCHANCHIA', 46, 1, NULL, NULL, NULL, NULL),
(367, 'GABTALI', 46, 1, NULL, NULL, NULL, NULL),
(368, 'KAHALOO', 46, 1, NULL, NULL, NULL, NULL),
(369, 'NANDIGRAM', 46, 1, NULL, NULL, NULL, NULL),
(370, 'SARIAKANDI', 46, 1, NULL, NULL, NULL, NULL),
(371, 'SHAJAHANPUR', 46, 1, NULL, NULL, NULL, NULL),
(372, 'SHERPUR', 46, 1, NULL, NULL, NULL, NULL),
(373, 'SHIBGANJ', 46, 1, NULL, NULL, NULL, NULL),
(374, 'SONATOLA', 46, 1, NULL, NULL, NULL, NULL),
(375, 'AKKELPUR', 47, 1, NULL, NULL, NULL, NULL),
(376, 'JOYPURHAT SADAR', 47, 1, NULL, NULL, NULL, NULL),
(377, 'KALAI', 47, 1, NULL, NULL, NULL, NULL),
(378, 'KHETLAL', 47, 1, NULL, NULL, NULL, NULL),
(379, 'PANCHBIBI', 47, 1, NULL, NULL, NULL, NULL),
(380, 'ATRAI', 48, 1, NULL, NULL, NULL, NULL),
(381, 'BADALGACHHI', 48, 1, NULL, NULL, NULL, NULL),
(382, 'DHAMOIRHAT', 48, 1, NULL, NULL, NULL, NULL),
(383, 'MAHADEBPUR', 48, 1, NULL, NULL, NULL, NULL),
(384, 'MANDA', 48, 1, NULL, NULL, NULL, NULL),
(385, 'NAOGAON SADAR', 48, 1, NULL, NULL, NULL, NULL),
(386, 'NIAMATPUR', 48, 1, NULL, NULL, NULL, NULL),
(387, 'PATNITALA', 48, 1, NULL, NULL, NULL, NULL),
(388, 'PORSHA', 48, 1, NULL, NULL, NULL, NULL),
(389, 'RANINAGAR', 48, 1, NULL, NULL, NULL, NULL),
(390, 'SAPAHAR', 48, 1, NULL, NULL, NULL, NULL),
(391, 'BAGATIPARA', 49, 1, NULL, NULL, NULL, NULL),
(392, 'BARAIGRAM', 49, 1, NULL, NULL, NULL, NULL),
(393, 'GURUDASPUR', 49, 1, NULL, NULL, NULL, NULL),
(394, 'LALPUR', 49, 1, NULL, NULL, NULL, NULL),
(395, 'NALDANGA', 49, 1, NULL, NULL, NULL, NULL),
(396, 'NATORE SADAR', 49, 1, NULL, NULL, NULL, NULL),
(397, 'SINGRA', 49, 1, NULL, NULL, NULL, NULL),
(398, 'BHOLAHAT', 50, 1, NULL, NULL, NULL, NULL),
(399, 'CHAPAI NABABGANJ SADAR', 50, 1, NULL, NULL, NULL, NULL),
(400, 'GOMASTAPUR', 50, 1, NULL, NULL, NULL, NULL),
(401, 'NACHOLE', 50, 1, NULL, NULL, NULL, NULL),
(402, 'ATGHARIA', 51, 1, NULL, NULL, NULL, NULL),
(403, 'BERA', 51, 1, NULL, NULL, NULL, NULL),
(404, 'BHANGURA', 51, 1, NULL, NULL, NULL, NULL),
(405, 'CHATMOHAR', 51, 1, NULL, NULL, NULL, NULL),
(406, 'FARIDPUR', 51, 1, NULL, NULL, NULL, NULL),
(407, 'ISHWARDI', 51, 1, NULL, NULL, NULL, NULL),
(408, 'PABNA SADAR', 51, 1, NULL, NULL, NULL, NULL),
(409, 'SANTHIA', 51, 1, NULL, NULL, NULL, NULL),
(410, 'SUJANAGAR', 51, 1, NULL, NULL, NULL, NULL),
(411, 'BAGHA', 52, 1, NULL, NULL, NULL, NULL),
(412, 'BAGHMARA', 52, 1, NULL, NULL, NULL, NULL),
(413, 'BOALIA', 52, 1, NULL, NULL, NULL, NULL),
(414, 'CHARGHAT', 52, 1, NULL, NULL, NULL, NULL),
(415, 'GODAGARI', 52, 1, NULL, NULL, NULL, NULL),
(416, 'MATIHAR', 52, 1, NULL, NULL, NULL, NULL),
(417, 'MOHANPUR', 52, 1, NULL, NULL, NULL, NULL),
(418, 'PABA', 52, 1, NULL, NULL, NULL, NULL),
(419, 'PUTHIA', 52, 1, NULL, NULL, NULL, NULL),
(420, 'RAJPARA', 52, 1, NULL, NULL, NULL, NULL),
(421, 'TANORE', 52, 1, NULL, NULL, NULL, NULL),
(422, 'BELKUCHI', 53, 1, NULL, NULL, NULL, NULL),
(423, 'CHAUHALI', 53, 1, NULL, NULL, NULL, NULL),
(424, 'KAMARKHANDA', 53, 1, NULL, NULL, NULL, NULL),
(425, 'KAZIPUR', 53, 1, NULL, NULL, NULL, NULL),
(426, 'ROYGANJ', 53, 1, NULL, NULL, NULL, NULL),
(427, 'SHAHJADPUR', 53, 1, NULL, NULL, NULL, NULL),
(428, 'SIRAJGANJ SADAR', 53, 1, NULL, NULL, NULL, NULL),
(429, 'TARASH', 53, 1, NULL, NULL, NULL, NULL),
(430, 'ULLAH PARA', 53, 1, NULL, NULL, NULL, NULL),
(431, 'BIRAL', 54, 1, NULL, NULL, NULL, NULL),
(432, 'BIRAMPUR', 54, 1, NULL, NULL, NULL, NULL),
(433, 'BIRGANJ', 54, 1, NULL, NULL, NULL, NULL),
(434, 'BOCHAGANJ', 54, 1, NULL, NULL, NULL, NULL),
(435, 'CHIRIRBANDAR', 54, 1, NULL, NULL, NULL, NULL),
(436, 'DINAJPUR SADAR', 54, 1, NULL, NULL, NULL, NULL),
(437, 'FULBARI', 54, 1, NULL, NULL, NULL, NULL),
(438, 'GHORAGHAT', 54, 1, NULL, NULL, NULL, NULL),
(439, 'HAKIMPUR', 54, 1, NULL, NULL, NULL, NULL),
(440, 'KAHAROLE', 54, 1, NULL, NULL, NULL, NULL),
(441, 'KHANSAMA', 54, 1, NULL, NULL, NULL, NULL),
(442, 'PARBATIPUR', 54, 1, NULL, NULL, NULL, NULL),
(443, 'FULCHHARI', 69, 1, NULL, '2018-05-14 04:10:17', NULL, NULL),
(444, 'GAIBANDHA SADAR', 69, 1, NULL, '2018-05-14 04:10:44', NULL, NULL),
(445, 'GOBINDAGANJ', 69, 1, NULL, '2018-05-14 04:13:51', NULL, NULL),
(446, 'PALASHBARI', 55, 1, NULL, NULL, NULL, NULL),
(447, 'SADULLAPUR', 55, 1, NULL, NULL, NULL, NULL),
(448, 'saghata', 46, 0, NULL, '2018-06-06 01:16:18', NULL, NULL),
(449, 'SUNDARGANJ', 55, 1, NULL, NULL, NULL, NULL),
(450, 'BHURUNGAMARI', 56, 1, NULL, NULL, NULL, NULL),
(451, 'CHAR RAJIBPUR', 56, 1, NULL, NULL, NULL, NULL),
(452, 'CHILMARI', 56, 1, NULL, NULL, NULL, NULL),
(453, 'KURIGRAM SADAR', 56, 1, NULL, NULL, NULL, NULL),
(454, 'NAGESHWARI', 56, 1, NULL, NULL, NULL, NULL),
(455, 'PHULBARI', 56, 1, NULL, NULL, NULL, NULL),
(456, 'RAJARHAT', 56, 1, NULL, NULL, NULL, NULL),
(457, 'RAUMARI', 56, 1, NULL, NULL, NULL, NULL),
(458, 'ULIPUR', 56, 1, NULL, NULL, NULL, NULL),
(459, 'ADITMARI', 57, 1, NULL, NULL, NULL, NULL),
(460, 'HATIBANDHA', 57, 1, NULL, NULL, NULL, NULL),
(461, 'LALMONIRHAT SADAR', 57, 1, NULL, NULL, NULL, NULL),
(462, 'PATGRAM', 57, 1, NULL, NULL, NULL, NULL),
(463, 'DIMLA UPAZILA', 58, 1, NULL, NULL, NULL, NULL),
(464, 'DOMAR UPAZILA', 58, 1, NULL, NULL, NULL, NULL),
(465, 'JALDHAKA UPAZILA', 58, 1, NULL, NULL, NULL, NULL),
(466, 'KISHOREGANJ UPAZILA', 58, 1, NULL, NULL, NULL, NULL),
(467, 'NILPHAMARI SADAR UPAZ', 58, 1, NULL, NULL, NULL, NULL),
(468, 'SAIDPUR UPAZILA', 58, 1, NULL, NULL, NULL, NULL),
(469, 'ATWARI', 59, 1, NULL, NULL, NULL, NULL),
(470, 'BODA', 68, 1, NULL, '2018-05-20 01:57:28', NULL, NULL),
(471, 'DEBIGANJ', 68, 1, NULL, '2018-05-14 03:58:59', NULL, NULL),
(472, 'RANGPUR SADAR', 66, 1, NULL, '2018-06-27 11:51:52', NULL, NULL),
(473, 'TENTULIA', 59, 1, NULL, NULL, NULL, NULL),
(474, 'BADARGANJ', 60, 1, NULL, NULL, NULL, NULL),
(475, 'GANGACHARA', 66, 1, NULL, '2018-05-14 04:11:28', NULL, NULL),
(476, 'KAUNIA', 66, 1, NULL, '2018-05-14 02:47:00', NULL, NULL),
(477, 'MITHA PUKUR', 66, 1, NULL, '2018-05-14 05:08:09', NULL, NULL),
(478, 'PIRGACHHA', 46, 0, NULL, '2018-05-14 05:11:33', NULL, NULL),
(479, 'PIRGANJ', 60, 1, NULL, NULL, NULL, NULL),
(480, 'RANGPUR SADAR', 60, 1, NULL, NULL, NULL, NULL),
(481, 'TARAGANJ', 60, 1, NULL, NULL, NULL, NULL),
(482, 'BALIADANGI', 61, 1, NULL, NULL, NULL, NULL),
(483, 'HARIPUR', 67, 1, NULL, '2018-05-14 04:18:11', NULL, NULL),
(484, 'RANISANKAIL', 61, 1, NULL, NULL, NULL, NULL),
(485, 'THAKURGAON SADAR', 61, 1, NULL, NULL, NULL, NULL),
(486, 'AJMIRIGANJ', 65, 1, NULL, '2018-05-14 00:54:07', NULL, NULL),
(487, 'BAHUBAL', 62, 1, NULL, NULL, NULL, NULL),
(488, 'BANIACHONG', 62, 1, NULL, NULL, NULL, NULL),
(489, 'CHUNARUGHAT', 62, 1, NULL, NULL, NULL, NULL),
(490, 'HABIGANJ SADAR', 62, 1, NULL, NULL, NULL, NULL),
(491, 'LAKHAI', 62, 1, NULL, NULL, NULL, NULL),
(492, 'MADHABPUR', 62, 1, NULL, NULL, NULL, NULL),
(493, 'NABIGANJ', 62, 1, NULL, NULL, NULL, NULL),
(494, 'BARLEKHA', 26, 1, NULL, NULL, NULL, NULL),
(495, 'KAMALGANJ', 71, 1, NULL, '2018-05-14 04:43:37', NULL, NULL),
(496, 'KULAURA', 71, 1, NULL, '2018-05-14 04:44:54', NULL, NULL),
(497, 'MAULVIBAZAR SADAR', 71, 1, NULL, '2018-05-14 05:07:10', NULL, NULL),
(498, 'RAJNAGAR', 26, 1, NULL, NULL, NULL, NULL),
(499, 'SREEMANGAL', 26, 1, NULL, NULL, NULL, NULL),
(500, 'BISHWAMBARPUR', 63, 1, NULL, NULL, NULL, NULL),
(501, 'CHHATAK', 70, 1, NULL, '2018-05-14 03:47:18', NULL, NULL),
(502, 'DAKSHIN SUNAMGANJ', 70, 1, NULL, '2018-05-14 03:56:34', NULL, NULL),
(503, 'DERAI', 70, 1, NULL, '2018-05-14 03:59:53', NULL, NULL),
(504, 'DHARAMPASHA', 63, 1, NULL, '2020-03-08 23:21:14', NULL, NULL),
(505, 'DOWARABAZAR', 70, 1, NULL, '2018-05-14 04:07:41', NULL, NULL),
(506, 'JAGANNATHPUR', 70, 1, NULL, '2018-05-14 04:21:01', NULL, NULL),
(507, 'JAMALGANJ', 63, 1, NULL, NULL, NULL, NULL),
(508, 'SULLA', 63, 1, NULL, NULL, NULL, NULL),
(509, 'SUNAMGANJ SADAR', 63, 1, NULL, NULL, NULL, NULL),
(510, 'TAHIRPUR', 63, 1, NULL, NULL, NULL, NULL),
(511, 'BALAGANJ', 64, 1, NULL, NULL, NULL, NULL),
(512, 'BEANI BAZAR', 64, 1, NULL, NULL, NULL, NULL),
(513, 'BISHWANATH', 64, 1, NULL, NULL, NULL, NULL),
(514, 'DAKSHIN SURMA', 64, 1, NULL, NULL, NULL, NULL),
(515, 'FENCHUGANJ', 64, 1, NULL, NULL, NULL, NULL),
(516, 'GOLAPGANJ', 64, 1, NULL, NULL, NULL, NULL),
(517, 'GOWAINGHAT', 64, 1, NULL, NULL, NULL, NULL),
(518, 'JAINTIAPUR', 64, 1, NULL, NULL, NULL, NULL),
(519, 'KANAIGHAT', 64, 1, NULL, NULL, NULL, NULL),
(520, 'SYLHET SADAR', 64, 1, NULL, NULL, NULL, NULL),
(521, 'ZAKIGANJ', 64, 1, NULL, NULL, NULL, NULL),
(522, 'BAMNA', 1, 1, NULL, NULL, NULL, NULL),
(523, 'BAKALIA', 10, 1, NULL, NULL, NULL, NULL),
(524, 'CHITTAGONG PORT', 10, 1, '2018-03-26 22:55:57', '2018-03-26 22:55:57', NULL, NULL),
(528, 'PATENGA', 10, 1, '2018-03-26 22:55:57', '2018-03-26 22:55:57', NULL, NULL),
(530, 'LALMAI', 11, 1, '2018-03-26 22:55:57', '2018-03-26 22:55:57', NULL, NULL),
(532, 'BANANI', 18, 1, '2018-03-26 22:55:58', '2018-03-26 22:55:58', NULL, NULL),
(533, 'DARUS SALAM', 18, 1, '2018-03-26 22:55:58', '2018-03-26 22:55:58', NULL, NULL),
(534, 'NEW MARKET', 18, 1, '2018-03-26 22:55:58', '2018-03-26 22:55:58', NULL, NULL),
(536, 'PALTAN', 18, 1, '2018-03-26 22:55:58', '2018-03-26 22:55:58', NULL, NULL),
(537, 'RUPNAGAR', 18, 1, '2018-03-26 22:55:59', '2018-03-26 22:55:59', NULL, NULL),
(538, 'SHAH ALI', 18, 1, '2018-03-26 22:55:59', '2018-03-26 22:55:59', NULL, NULL),
(540, 'SHAHBAGH', 18, 1, '2018-03-26 22:55:59', '2018-03-26 22:55:59', NULL, NULL),
(546, 'WARI', 18, 1, '2018-03-26 22:55:59', '2018-03-26 22:55:59', NULL, NULL),
(554, 'KHULNA SADAR', 40, 1, '2018-03-26 22:56:01', '2018-03-26 22:56:01', NULL, NULL),
(575, 'KALIGANJ', 57, 1, NULL, NULL, NULL, NULL),
(590, 'BIMAN BANDAR', 18, 1, '2018-03-26 23:38:15', '2018-03-26 23:38:15', NULL, NULL),
(592, 'BHATARA', 18, 1, '2018-03-26 23:38:15', '2018-03-26 23:38:15', NULL, NULL),
(607, 'SHAHJAHANPUR', 18, 1, '2018-03-26 23:38:18', '2018-03-26 23:38:18', NULL, NULL),
(609, 'TEJGAON', 18, 1, '2018-03-26 23:38:19', '2018-03-26 23:38:19', NULL, NULL),
(653, 'SHAH MAKHDUM', 52, 1, '2018-03-26 23:39:06', '2018-03-26 23:39:06', NULL, NULL),
(654, 'LOHAGORA', 44, 1, '2018-05-14 00:59:39', '2018-05-14 00:59:39', NULL, NULL),
(655, 'MITHAPUKUR', 66, 0, '2018-05-14 02:34:51', '2018-05-14 02:34:51', NULL, NULL),
(656, 'BODORGONJ', 66, 1, '2018-05-14 02:35:50', '2018-05-14 02:35:50', NULL, NULL),
(657, 'PIRGONJ', 66, 1, '2018-05-14 02:37:15', '2018-05-14 02:37:15', NULL, NULL),
(658, 'RANGPURSADAR', 66, 0, '2018-05-14 02:42:49', '2018-06-27 11:51:05', NULL, NULL),
(659, 'TARAGONJ', 66, 1, '2018-05-14 02:46:02', '2018-05-14 02:46:02', NULL, NULL),
(660, 'PIRGACHA', 66, 1, '2018-05-14 02:47:39', '2018-05-14 02:47:39', NULL, NULL),
(661, 'GONGACHARA', 66, 0, '2018-05-14 02:48:30', '2018-05-14 02:48:30', NULL, NULL),
(662, 'KALIGANJ', 45, 1, '2018-05-16 23:00:22', '2018-05-16 23:01:15', NULL, NULL),
(663, 'THAKURGAON SADAR', 67, 1, '2018-05-17 00:07:10', '2018-05-17 00:07:10', NULL, NULL),
(664, 'PIRGONJ', 67, 1, '2018-05-17 00:07:41', '2018-05-17 00:07:41', NULL, NULL),
(665, 'RANI SANKOYEL', 67, 1, '2018-05-17 00:08:20', '2018-05-17 00:08:20', NULL, NULL),
(666, 'BALIADANGI', 67, 1, '2018-05-17 00:08:53', '2018-05-17 00:08:53', NULL, NULL),
(667, 'Shibganj', 50, 1, '2018-05-21 00:00:43', '2018-05-21 00:00:43', NULL, NULL),
(668, 'JESSORE SADAR', 38, 1, '2018-05-21 22:29:48', '2018-05-21 22:29:48', NULL, NULL),
(669, 'Rajshahi Sadar', 52, 1, '2018-05-22 04:44:17', '2018-05-22 04:44:17', NULL, NULL),
(670, 'SUNDORGONJ', 69, 1, '2018-05-22 23:51:54', '2018-05-22 23:51:54', NULL, NULL),
(671, 'DURGAPUR', 52, 1, '2018-05-23 00:08:18', '2018-05-23 00:08:18', NULL, NULL),
(672, 'TETULIA', 68, 1, '2018-05-23 01:15:21', '2018-05-23 01:15:21', NULL, NULL),
(673, 'TANGI', 20, 1, '2018-05-28 23:06:53', '2018-05-28 23:06:53', NULL, NULL),
(674, 'SREEMONGOL', 71, 1, '2018-05-28 23:34:15', '2018-05-28 23:34:15', NULL, NULL),
(675, 'SREEPUR', 42, 1, '2018-05-29 00:16:06', '2018-05-29 00:16:06', NULL, NULL),
(676, 'NAWABGANJ', 54, 1, '2018-05-29 00:47:51', '2018-05-29 00:47:51', NULL, NULL),
(677, 'DAULATPUR', 41, 1, '2018-05-29 01:11:08', '2018-05-29 01:11:08', NULL, NULL),
(678, 'MIRPUR', 41, 1, '2018-05-29 01:12:16', '2018-05-29 01:12:16', NULL, NULL),
(679, 'PALASHBARI', 69, 1, '2018-05-29 01:21:02', '2018-05-29 01:21:02', NULL, NULL),
(680, 'SADULLAPUR', 69, 1, '2018-05-29 01:21:39', '2018-05-29 01:21:39', NULL, NULL),
(681, 'ATWARI', 68, 1, '2018-05-29 01:33:29', '2018-05-29 01:33:29', NULL, NULL),
(682, 'PANCHAGARH SADAR', 68, 1, '2018-05-29 01:34:13', '2018-05-29 01:34:13', NULL, NULL),
(683, 'COMPANYGANJ', 64, 1, '2018-06-04 03:36:15', '2018-06-04 03:36:15', NULL, NULL),
(684, 'LOHAGARA', 10, 1, '2018-06-04 22:09:25', '2018-06-04 22:09:25', NULL, NULL),
(685, 'BALIADANGI', 38, 1, '2018-06-05 21:59:19', '2018-06-05 21:59:19', NULL, NULL),
(686, 'SAGHATA', 69, 1, '2018-06-06 01:18:49', '2018-06-06 01:18:49', NULL, NULL),
(687, 'KALIGANJ', 39, 1, '2018-06-19 22:33:00', '2018-06-19 22:33:00', NULL, NULL),
(688, 'SUNAMGONJ SADAR', 70, 1, '2018-07-01 03:56:55', '2018-07-01 03:56:55', NULL, NULL),
(689, 'DAULATPUR', 40, 1, '2018-07-05 04:40:43', '2018-07-05 04:40:43', NULL, NULL),
(690, 'RAJNAGAR', 71, 1, '2018-07-05 04:44:40', '2018-07-05 04:44:40', NULL, NULL),
(691, 'MOHAMMADPUR', 42, 1, '2018-07-22 00:02:30', '2018-07-22 00:02:30', NULL, NULL),
(692, 'KAZIRHAT', 2, 1, '2018-07-22 04:04:54', '2018-07-22 04:04:54', NULL, NULL),
(693, 'BARLEKHA', 71, 1, '2018-07-24 04:21:38', '2018-07-24 04:21:38', NULL, NULL),
(694, 'SHALLA', 70, 1, '2018-08-08 03:18:10', '2018-08-08 03:18:10', NULL, NULL),
(695, 'SUNDULPUR', 69, 1, '2018-08-09 12:13:53', '2018-08-09 12:13:53', NULL, NULL),
(696, 'SADULLAPUR', 66, 1, '2018-08-28 01:24:44', '2018-08-28 01:24:44', NULL, NULL),
(697, 'TAHIRPUR', 70, 1, '2018-09-10 03:18:27', '2018-09-10 03:18:27', NULL, NULL),
(698, 'KACHUA', 36, 1, '2018-09-17 00:25:37', '2018-09-17 00:25:37', NULL, NULL),
(699, 'OSMANINAGAR', 64, 1, '2018-10-02 12:59:55', '2018-10-02 12:59:55', NULL, NULL),
(700, 'SAIDPUR', 58, 1, '2018-10-14 08:34:29', '2018-10-14 08:34:29', NULL, NULL),
(701, 'BANIACHONG', 65, 1, '2018-10-23 08:22:51', '2018-10-23 08:22:51', NULL, NULL),
(702, 'KOTWALI', 18, 1, '2018-12-13 02:41:55', '2018-12-13 02:41:55', NULL, NULL),
(703, 'JAMALGANJ', 70, 1, '2018-12-13 03:47:18', '2018-12-13 03:47:18', NULL, NULL),
(704, 'Bishwambarpur', 70, 1, '2019-01-07 00:13:58', '2019-01-07 00:13:58', NULL, NULL),
(705, 'DOWARABAZAR', 63, 1, '2020-03-18 00:24:40', '2020-03-18 00:24:40', NULL, NULL),
(706, 'CHUNARUGHAT', 65, 1, '2020-05-31 03:45:59', '2020-05-31 03:45:59', NULL, NULL),
(707, 'MADHABPUR', 65, 1, '2020-06-02 01:19:06', '2020-06-02 01:19:06', NULL, NULL),
(708, 'NABIGANJ', 65, 1, '2020-06-16 23:26:50', '2020-06-16 23:26:50', NULL, NULL),
(709, 'SUNAMGANJ SADAR', 72, 1, '2020-06-17 02:42:56', '2020-06-17 02:42:56', NULL, NULL),
(710, 'SOUTH SUNAMGANJ', 72, 1, '2020-06-17 02:43:40', '2020-06-17 02:43:40', NULL, NULL),
(711, 'BISHWAMBARPUR', 72, 1, '2020-06-17 02:44:25', '2020-06-17 02:44:25', NULL, NULL),
(712, 'CHHATAK', 72, 1, '2020-06-17 02:44:50', '2020-06-17 02:44:50', NULL, NULL),
(713, 'JAGANNATHPUR', 72, 1, '2020-06-17 02:45:22', '2020-06-17 02:45:22', NULL, NULL),
(714, 'TAHIRPUR', 72, 1, '2020-06-17 02:45:44', '2020-06-17 02:45:44', NULL, NULL),
(715, 'DHARMAPASHA', 72, 1, '2020-06-17 02:46:12', '2020-06-17 02:46:12', NULL, NULL),
(716, 'JAMALGANJ', 72, 1, '2020-06-17 02:46:37', '2020-06-17 02:46:37', NULL, NULL),
(717, 'SHALLA', 72, 1, '2020-06-17 02:46:55', '2020-06-17 02:46:55', NULL, NULL),
(718, 'DERAI', 72, 1, '2020-06-17 02:47:19', '2020-06-17 02:47:19', NULL, NULL),
(719, 'DOWARABAZAR', 72, 1, '2020-06-17 02:47:52', '2020-06-17 02:47:52', NULL, NULL),
(720, 'HABIGANJ SADAR', 65, 1, '2020-06-23 02:51:05', '2020-06-23 02:51:05', NULL, NULL),
(721, 'BAHUBAL', 65, 1, '2020-09-22 00:36:27', '2020-09-22 00:36:27', NULL, NULL),
(722, 'JIRUNDA MANPUR TOFAILIA SENIOR ALIM MADRASAH', 65, 1, '2020-10-07 23:25:52', '2020-10-07 23:25:52', NULL, NULL),
(723, 'Lakhai', 65, 1, '2020-10-07 23:30:27', '2020-10-07 23:30:27', NULL, NULL),
(724, 'SHAYESTAGANJ', 65, 1, '2021-09-07 02:54:26', '2021-09-07 02:54:26', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `smartend_topics`
--

CREATE TABLE `smartend_topics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_en` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `expire_date` date DEFAULT NULL,
  `video_type` tinyint(4) DEFAULT NULL,
  `photo_file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attach_file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_file` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `audio_file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `visits` int(11) NOT NULL,
  `webmaster_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `row_no` int(11) NOT NULL,
  `seo_title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_keywords_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_url_slug_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title_bn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_bn` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_title_bn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description_bn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_keywords_bn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_url_slug_bn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smartend_topics`
--

INSERT INTO `smartend_topics` (`id`, `title_en`, `details_en`, `date`, `expire_date`, `video_type`, `photo_file`, `attach_file`, `video_file`, `audio_file`, `icon`, `status`, `visits`, `webmaster_id`, `section_id`, `row_no`, `seo_title_en`, `seo_description_en`, `seo_keywords_en`, `seo_url_slug_en`, `created_by`, `updated_by`, `created_at`, `updated_at`, `title_bn`, `details_bn`, `seo_title_bn`, `seo_description_bn`, `seo_keywords_bn`, `seo_url_slug_bn`) VALUES
(1, 'About Us', 'It is a long established fact that a reader will be distracted by the readable content of a page.', '2020-12-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 6, 1, 0, 1, NULL, NULL, NULL, NULL, 1, NULL, '2020-12-12 17:50:55', '2022-02-04 00:31:56', 'About Us', 'It is a long established fact that a reader will be distracted by the readable content of a page.', NULL, NULL, NULL, NULL),
(2, 'Contact Us', '', '2020-12-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, 0, 2, NULL, NULL, NULL, NULL, 1, NULL, '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Contact Us', '', NULL, NULL, NULL, NULL),
(3, 'Privacy', 'It is a long established fact that a reader will be distracted by the readable content of a page.', '2020-12-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, 0, 3, NULL, NULL, NULL, NULL, 1, NULL, '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Privacy', 'It is a long established fact that a reader will be distracted by the readable content of a page.', NULL, NULL, NULL, NULL),
(4, 'Terms & Conditions', 'It is a long established fact that a reader will be distracted by the readable content of a page.', '2020-12-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, 0, 4, NULL, NULL, NULL, NULL, 1, NULL, '2020-12-12 17:50:55', '2022-02-04 00:14:31', 'Terms & Conditions', 'It is a long established fact that a reader will be distracted by the readable content of a page.', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `smartend_topic_categories`
--

CREATE TABLE `smartend_topic_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `topic_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `smartend_topic_fields`
--

CREATE TABLE `smartend_topic_fields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `topic_id` int(11) NOT NULL,
  `field_id` int(11) NOT NULL,
  `field_value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `smartend_transmission`
--

CREATE TABLE `smartend_transmission` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `smartend_transmission`
--

INSERT INTO `smartend_transmission` (`id`, `name`, `status`) VALUES
(1, 'Manual', 1),
(2, 'Automatic', 1),
(3, 'Other transmission', 1);

-- --------------------------------------------------------

--
-- Table structure for table `smartend_users`
--

CREATE TABLE `smartend_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permissions_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `connect_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `connect_password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `access_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smartend_users`
--

INSERT INTO `smartend_users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `photo`, `permissions_id`, `status`, `connect_email`, `connect_password`, `provider`, `provider_id`, `access_token`, `created_by`, `updated_by`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@site.com', NULL, '$2y$10$VgKfmmvW.SYvB4KRdGfSuu0NjMEcWCkQ6yKx5/y66jnftn6wPBVFa', NULL, NULL, '16440058705320.png', 1, 1, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, '2020-12-12 17:50:54', '2022-02-04 20:17:50');

-- --------------------------------------------------------

--
-- Table structure for table `smartend_webmails`
--

CREATE TABLE `smartend_webmails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_id` int(11) NOT NULL DEFAULT 0,
  `group_id` int(11) DEFAULT NULL,
  `contact_id` int(11) DEFAULT NULL,
  `father_id` int(11) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` datetime NOT NULL,
  `from_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_cc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_bcc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `flag` tinyint(4) NOT NULL DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `smartend_webmails_files`
--

CREATE TABLE `smartend_webmails_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `webmail_id` int(11) NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `smartend_webmails_groups`
--

CREATE TABLE `smartend_webmails_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smartend_webmails_groups`
--

INSERT INTO `smartend_webmails_groups` (`id`, `name`, `color`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Support', '#00bcd4', 1, NULL, '2020-12-12 17:50:55', '2020-12-12 17:50:55'),
(2, 'Orders', '#f44336', 1, NULL, '2020-12-12 17:50:55', '2020-12-12 17:50:55'),
(3, 'Queries', '#8bc34a', 1, NULL, '2020-12-12 17:50:55', '2020-12-12 17:50:55');

-- --------------------------------------------------------

--
-- Table structure for table `smartend_webmaster_banners`
--

CREATE TABLE `smartend_webmaster_banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `row_no` int(11) NOT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `desc_status` tinyint(4) NOT NULL,
  `link_status` tinyint(4) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `icon_status` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title_bn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smartend_webmaster_banners`
--

INSERT INTO `smartend_webmaster_banners` (`id`, `row_no`, `title_en`, `width`, `height`, `desc_status`, `link_status`, `type`, `icon_status`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `title_bn`) VALUES
(1, 1, 'Home Banners', 1600, 500, 1, 1, 1, 0, 1, 1, NULL, '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Home Banners'),
(2, 2, 'Text Banners', 330, 330, 1, 1, 0, 1, 1, 1, NULL, '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Text Banners'),
(3, 3, 'Side Banners', 330, 330, 0, 1, 1, 0, 1, 1, NULL, '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Side Banners');

-- --------------------------------------------------------

--
-- Table structure for table `smartend_webmaster_sections`
--

CREATE TABLE `smartend_webmaster_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `row_no` int(11) NOT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0,
  `title_status` tinyint(4) NOT NULL DEFAULT 1,
  `photo_status` tinyint(4) NOT NULL DEFAULT 1,
  `case_status` tinyint(4) NOT NULL DEFAULT 1,
  `visits_status` tinyint(4) NOT NULL DEFAULT 1,
  `sections_status` tinyint(4) NOT NULL DEFAULT 0,
  `comments_status` tinyint(4) NOT NULL DEFAULT 0,
  `date_status` tinyint(4) NOT NULL DEFAULT 0,
  `expire_date_status` tinyint(4) NOT NULL DEFAULT 0,
  `longtext_status` tinyint(4) NOT NULL DEFAULT 0,
  `editor_status` tinyint(4) NOT NULL DEFAULT 0,
  `attach_file_status` tinyint(4) NOT NULL DEFAULT 0,
  `extra_attach_file_status` tinyint(4) NOT NULL DEFAULT 0,
  `multi_images_status` tinyint(4) NOT NULL DEFAULT 0,
  `section_icon_status` tinyint(4) NOT NULL DEFAULT 0,
  `icon_status` tinyint(4) NOT NULL DEFAULT 0,
  `maps_status` tinyint(4) NOT NULL DEFAULT 0,
  `order_status` tinyint(4) NOT NULL DEFAULT 0,
  `related_status` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `seo_title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_keywords_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_url_slug_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title_bn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_title_bn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description_bn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_keywords_bn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_url_slug_bn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smartend_webmaster_sections`
--

INSERT INTO `smartend_webmaster_sections` (`id`, `row_no`, `title_en`, `type`, `title_status`, `photo_status`, `case_status`, `visits_status`, `sections_status`, `comments_status`, `date_status`, `expire_date_status`, `longtext_status`, `editor_status`, `attach_file_status`, `extra_attach_file_status`, `multi_images_status`, `section_icon_status`, `icon_status`, `maps_status`, `order_status`, `related_status`, `status`, `seo_title_en`, `seo_description_en`, `seo_keywords_en`, `seo_url_slug_en`, `created_by`, `updated_by`, `created_at`, `updated_at`, `title_bn`, `seo_title_bn`, `seo_description_bn`, `seo_keywords_bn`, `seo_url_slug_bn`) VALUES
(1, 1, 'Site pages', 0, 1, 1, 1, 1, 0, 0, 0, 0, 1, 1, 1, 0, 1, 1, 0, 1, 0, 0, 1, 'Site pages', NULL, NULL, 'sitepages', 1, NULL, '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Site pages', 'Site pages', NULL, NULL, NULL),
(2, 2, 'Services', 0, 1, 1, 1, 1, 0, 0, 0, 0, 1, 1, 1, 0, 1, 1, 0, 0, 1, 1, 1, 'Services', NULL, NULL, 'services', 1, NULL, '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Services', 'Services', NULL, NULL, NULL),
(3, 3, 'News', 0, 1, 1, 1, 1, 0, 1, 1, 0, 1, 1, 0, 0, 1, 1, 0, 0, 0, 1, 1, 'News', NULL, NULL, 'news', 1, NULL, '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'News', 'News', NULL, NULL, NULL),
(4, 4, 'Photos', 1, 1, 1, 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 'Photos', NULL, NULL, 'photos', 1, NULL, '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Photos', 'Photos', NULL, NULL, NULL),
(5, 5, 'Videos', 2, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 1, 'Videos', NULL, NULL, 'videos', 1, NULL, '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Videos', 'Videos', NULL, NULL, NULL),
(6, 6, 'Audio', 3, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 1, 'Audio', NULL, NULL, 'audio', 1, NULL, '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Audio', 'Audio', NULL, NULL, NULL),
(7, 7, 'Blog', 0, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 0, 0, 1, 1, 0, 0, 0, 1, 1, 'Blog', NULL, NULL, 'blog', 1, NULL, '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Blog', 'Blog', NULL, NULL, NULL),
(8, 8, 'Products', 0, 1, 1, 1, 1, 2, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 1, 'Products', NULL, NULL, 'products', 1, NULL, '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Products', 'Products', NULL, NULL, NULL),
(9, 9, 'Partners', 0, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 'Partners', NULL, NULL, 'partners', 1, NULL, '2020-12-12 17:50:54', '2022-02-04 00:14:31', 'Partners', 'Partners', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `smartend_webmaster_section_fields`
--

CREATE TABLE `smartend_webmaster_section_fields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `webmaster_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default_value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `row_no` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `required` tinyint(4) NOT NULL,
  `in_table` tinyint(4) NOT NULL DEFAULT 0,
  `in_search` tinyint(4) NOT NULL DEFAULT 0,
  `in_listing` tinyint(4) NOT NULL DEFAULT 0,
  `in_page` tinyint(4) NOT NULL DEFAULT 0,
  `in_statics` tinyint(4) NOT NULL DEFAULT 0,
  `lang_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `css_class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view_permission_groups` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `add_permission_groups` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edit_permission_groups` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title_bn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_bn` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `smartend_webmaster_settings`
--

CREATE TABLE `smartend_webmaster_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seo_status` tinyint(4) NOT NULL,
  `analytics_status` tinyint(4) NOT NULL,
  `banners_status` tinyint(4) NOT NULL,
  `inbox_status` tinyint(4) NOT NULL,
  `calendar_status` tinyint(4) NOT NULL,
  `settings_status` tinyint(4) NOT NULL,
  `newsletter_status` tinyint(4) NOT NULL,
  `members_status` tinyint(4) NOT NULL,
  `orders_status` tinyint(4) NOT NULL,
  `shop_status` tinyint(4) NOT NULL,
  `shop_settings_status` tinyint(4) NOT NULL,
  `default_currency_id` int(11) NOT NULL,
  `languages_by_default` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latest_news_section_id` int(11) NOT NULL,
  `header_menu_id` int(11) NOT NULL,
  `footer_menu_id` int(11) NOT NULL,
  `home_banners_section_id` int(11) NOT NULL,
  `home_text_banners_section_id` int(11) NOT NULL,
  `side_banners_section_id` int(11) NOT NULL,
  `contact_page_id` int(11) NOT NULL,
  `newsletter_contacts_group` int(11) NOT NULL,
  `new_comments_status` tinyint(4) NOT NULL,
  `links_status` tinyint(4) NOT NULL,
  `register_status` tinyint(4) NOT NULL,
  `permission_group` int(11) NOT NULL,
  `api_status` tinyint(4) NOT NULL,
  `api_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_content1_section_id` int(11) NOT NULL,
  `home_content2_section_id` int(11) NOT NULL,
  `home_content3_section_id` int(11) NOT NULL,
  `home_contents_per_page` int(11) NOT NULL,
  `mail_driver` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_host` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_port` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_encryption` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_no_replay` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_template` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nocaptcha_status` tinyint(4) NOT NULL,
  `nocaptcha_secret` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nocaptcha_sitekey` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_tags_status` tinyint(4) NOT NULL,
  `google_tags_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_analytics_code` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_facebook_status` tinyint(4) NOT NULL,
  `login_facebook_client_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_facebook_client_secret` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_twitter_status` tinyint(4) NOT NULL,
  `login_twitter_client_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_twitter_client_secret` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_google_status` tinyint(4) NOT NULL,
  `login_google_client_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_google_client_secret` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_linkedin_status` tinyint(4) NOT NULL,
  `login_linkedin_client_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_linkedin_client_secret` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_github_status` tinyint(4) NOT NULL,
  `login_github_client_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_github_client_secret` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_bitbucket_status` tinyint(4) NOT NULL,
  `login_bitbucket_client_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_bitbucket_client_secret` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dashboard_link_status` tinyint(4) NOT NULL,
  `timezone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `version` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smartend_webmaster_settings`
--

INSERT INTO `smartend_webmaster_settings` (`id`, `seo_status`, `analytics_status`, `banners_status`, `inbox_status`, `calendar_status`, `settings_status`, `newsletter_status`, `members_status`, `orders_status`, `shop_status`, `shop_settings_status`, `default_currency_id`, `languages_by_default`, `latest_news_section_id`, `header_menu_id`, `footer_menu_id`, `home_banners_section_id`, `home_text_banners_section_id`, `side_banners_section_id`, `contact_page_id`, `newsletter_contacts_group`, `new_comments_status`, `links_status`, `register_status`, `permission_group`, `api_status`, `api_key`, `home_content1_section_id`, `home_content2_section_id`, `home_content3_section_id`, `home_contents_per_page`, `mail_driver`, `mail_host`, `mail_port`, `mail_username`, `mail_password`, `mail_encryption`, `mail_no_replay`, `mail_title`, `mail_template`, `nocaptcha_status`, `nocaptcha_secret`, `nocaptcha_sitekey`, `google_tags_status`, `google_tags_id`, `google_analytics_code`, `login_facebook_status`, `login_facebook_client_id`, `login_facebook_client_secret`, `login_twitter_status`, `login_twitter_client_id`, `login_twitter_client_secret`, `login_google_status`, `login_google_client_id`, `login_google_client_secret`, `login_linkedin_status`, `login_linkedin_client_id`, `login_linkedin_client_secret`, `login_github_status`, `login_github_client_id`, `login_github_client_secret`, `login_bitbucket_status`, `login_bitbucket_client_id`, `login_bitbucket_client_secret`, `dashboard_link_status`, `timezone`, `version`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 'en', 3, 1, 2, 1, 2, 3, 2, 1, 1, 0, 0, 3, 0, '402784613679330', 7, 4, 9, 20, 'smtp', '', '', '', '', '', 'noreplay@site.com', '{title}', '{details}', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 1, 'Asia/Dhaka', '8.1.0', 1, 1, '2020-12-12 17:50:54', '2022-02-04 02:35:32');

-- --------------------------------------------------------

--
-- Table structure for table `smartend_windows`
--

CREATE TABLE `smartend_windows` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `smartend_windows`
--

INSERT INTO `smartend_windows` (`id`, `name`, `status`) VALUES
(1, 'Power Windows', 1),
(2, 'Windows Defroster', 1),
(3, 'Rear Window Wiper', 1),
(4, 'Tinted Glass', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `smartend_analytics_pages`
--
ALTER TABLE `smartend_analytics_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smartend_analytics_visitors`
--
ALTER TABLE `smartend_analytics_visitors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smartend_attach_files`
--
ALTER TABLE `smartend_attach_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smartend_banners`
--
ALTER TABLE `smartend_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smartend_body_type`
--
ALTER TABLE `smartend_body_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smartend_car_brand`
--
ALTER TABLE `smartend_car_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smartend_car_condition`
--
ALTER TABLE `smartend_car_condition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smartend_car_model`
--
ALTER TABLE `smartend_car_model`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smartend_comfort`
--
ALTER TABLE `smartend_comfort`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smartend_comments`
--
ALTER TABLE `smartend_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smartend_contacts`
--
ALTER TABLE `smartend_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smartend_contacts_groups`
--
ALTER TABLE `smartend_contacts_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smartend_countries`
--
ALTER TABLE `smartend_countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smartend_district`
--
ALTER TABLE `smartend_district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smartend_drive`
--
ALTER TABLE `smartend_drive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smartend_entertainment`
--
ALTER TABLE `smartend_entertainment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smartend_events`
--
ALTER TABLE `smartend_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smartend_exterior_color`
--
ALTER TABLE `smartend_exterior_color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smartend_failed_jobs`
--
ALTER TABLE `smartend_failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `smartend_failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `smartend_fuel_type`
--
ALTER TABLE `smartend_fuel_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smartend_interior_color`
--
ALTER TABLE `smartend_interior_color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smartend_languages`
--
ALTER TABLE `smartend_languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smartend_ltm_translations`
--
ALTER TABLE `smartend_ltm_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smartend_maps`
--
ALTER TABLE `smartend_maps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smartend_menus`
--
ALTER TABLE `smartend_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smartend_migrations`
--
ALTER TABLE `smartend_migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smartend_other_feature`
--
ALTER TABLE `smartend_other_feature`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smartend_password_resets`
--
ALTER TABLE `smartend_password_resets`
  ADD KEY `smartend_password_resets_email_index` (`email`);

--
-- Indexes for table `smartend_permissions`
--
ALTER TABLE `smartend_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smartend_photos`
--
ALTER TABLE `smartend_photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smartend_related_topics`
--
ALTER TABLE `smartend_related_topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smartend_safety`
--
ALTER TABLE `smartend_safety`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smartend_seats`
--
ALTER TABLE `smartend_seats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smartend_sections`
--
ALTER TABLE `smartend_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smartend_seller`
--
ALTER TABLE `smartend_seller`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smartend_sessions`
--
ALTER TABLE `smartend_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `smartend_sessions_user_id_index` (`user_id`),
  ADD KEY `smartend_sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `smartend_settings`
--
ALTER TABLE `smartend_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smartend_thana`
--
ALTER TABLE `smartend_thana`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smartend_topics`
--
ALTER TABLE `smartend_topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smartend_topic_categories`
--
ALTER TABLE `smartend_topic_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smartend_topic_fields`
--
ALTER TABLE `smartend_topic_fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smartend_transmission`
--
ALTER TABLE `smartend_transmission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smartend_users`
--
ALTER TABLE `smartend_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `smartend_users_email_unique` (`email`);

--
-- Indexes for table `smartend_webmails`
--
ALTER TABLE `smartend_webmails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smartend_webmails_files`
--
ALTER TABLE `smartend_webmails_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smartend_webmails_groups`
--
ALTER TABLE `smartend_webmails_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smartend_webmaster_banners`
--
ALTER TABLE `smartend_webmaster_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smartend_webmaster_sections`
--
ALTER TABLE `smartend_webmaster_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smartend_webmaster_section_fields`
--
ALTER TABLE `smartend_webmaster_section_fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smartend_webmaster_settings`
--
ALTER TABLE `smartend_webmaster_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smartend_windows`
--
ALTER TABLE `smartend_windows`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `smartend_analytics_pages`
--
ALTER TABLE `smartend_analytics_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `smartend_analytics_visitors`
--
ALTER TABLE `smartend_analytics_visitors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `smartend_attach_files`
--
ALTER TABLE `smartend_attach_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `smartend_banners`
--
ALTER TABLE `smartend_banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `smartend_body_type`
--
ALTER TABLE `smartend_body_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `smartend_car_brand`
--
ALTER TABLE `smartend_car_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `smartend_car_condition`
--
ALTER TABLE `smartend_car_condition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `smartend_car_model`
--
ALTER TABLE `smartend_car_model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=464;

--
-- AUTO_INCREMENT for table `smartend_comfort`
--
ALTER TABLE `smartend_comfort`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `smartend_comments`
--
ALTER TABLE `smartend_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `smartend_contacts`
--
ALTER TABLE `smartend_contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `smartend_contacts_groups`
--
ALTER TABLE `smartend_contacts_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `smartend_countries`
--
ALTER TABLE `smartend_countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT for table `smartend_district`
--
ALTER TABLE `smartend_district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `smartend_drive`
--
ALTER TABLE `smartend_drive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `smartend_entertainment`
--
ALTER TABLE `smartend_entertainment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `smartend_events`
--
ALTER TABLE `smartend_events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `smartend_exterior_color`
--
ALTER TABLE `smartend_exterior_color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `smartend_failed_jobs`
--
ALTER TABLE `smartend_failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `smartend_fuel_type`
--
ALTER TABLE `smartend_fuel_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `smartend_interior_color`
--
ALTER TABLE `smartend_interior_color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `smartend_languages`
--
ALTER TABLE `smartend_languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `smartend_ltm_translations`
--
ALTER TABLE `smartend_ltm_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `smartend_maps`
--
ALTER TABLE `smartend_maps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `smartend_menus`
--
ALTER TABLE `smartend_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `smartend_migrations`
--
ALTER TABLE `smartend_migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `smartend_other_feature`
--
ALTER TABLE `smartend_other_feature`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `smartend_permissions`
--
ALTER TABLE `smartend_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `smartend_photos`
--
ALTER TABLE `smartend_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `smartend_related_topics`
--
ALTER TABLE `smartend_related_topics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `smartend_safety`
--
ALTER TABLE `smartend_safety`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `smartend_seats`
--
ALTER TABLE `smartend_seats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `smartend_sections`
--
ALTER TABLE `smartend_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `smartend_seller`
--
ALTER TABLE `smartend_seller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `smartend_settings`
--
ALTER TABLE `smartend_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `smartend_thana`
--
ALTER TABLE `smartend_thana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=725;

--
-- AUTO_INCREMENT for table `smartend_topics`
--
ALTER TABLE `smartend_topics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `smartend_topic_categories`
--
ALTER TABLE `smartend_topic_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `smartend_topic_fields`
--
ALTER TABLE `smartend_topic_fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `smartend_transmission`
--
ALTER TABLE `smartend_transmission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `smartend_users`
--
ALTER TABLE `smartend_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `smartend_webmails`
--
ALTER TABLE `smartend_webmails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `smartend_webmails_files`
--
ALTER TABLE `smartend_webmails_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `smartend_webmails_groups`
--
ALTER TABLE `smartend_webmails_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `smartend_webmaster_banners`
--
ALTER TABLE `smartend_webmaster_banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `smartend_webmaster_sections`
--
ALTER TABLE `smartend_webmaster_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `smartend_webmaster_section_fields`
--
ALTER TABLE `smartend_webmaster_section_fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `smartend_webmaster_settings`
--
ALTER TABLE `smartend_webmaster_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `smartend_windows`
--
ALTER TABLE `smartend_windows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
