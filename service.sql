-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2020 at 04:05 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `service`
--

-- --------------------------------------------------------

--
-- Table structure for table `hires`
--

CREATE TABLE `hires` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `provider_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `done` tinyint(1) NOT NULL DEFAULT 0,
  `star` varchar(255) NOT NULL DEFAULT '0',
  `cancel` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hires`
--

INSERT INTO `hires` (`id`, `date`, `provider_id`, `user_id`, `done`, `star`, `cancel`) VALUES
(1, '2020-03-09 09:10:09', 66, 30, 1, '0', 0),
(2, '2020-02-27 21:37:37', 25, 13, 1, '0', 0),
(3, '2020-09-19 08:37:38', 12, 28, 1, '0', 0),
(4, '2020-07-16 13:30:10', 18, 15, 1, '0', 0),
(5, '2020-04-12 17:04:06', 54, 61, 1, '0', 0),
(6, '2020-08-26 06:02:24', 24, 51, 1, '0', 0),
(7, '2020-09-22 02:55:05', 13, 23, 1, '0', 0),
(8, '2020-05-18 02:46:27', 37, 71, 1, '0', 0),
(9, '2020-03-21 10:43:10', 76, 42, 1, '0', 0),
(10, '2019-12-29 05:46:58', 47, 67, 1, '0', 0),
(11, '2020-08-26 13:31:53', 71, 63, 1, '0', 0),
(12, '2019-12-29 20:16:41', 19, 12, 1, '0', 0),
(13, '2020-05-30 09:30:02', 32, 72, 1, '0', 0),
(14, '2020-06-24 12:57:43', 57, 42, 1, '0', 0),
(15, '2020-03-22 14:00:42', 60, 38, 1, '0', 0),
(16, '2019-11-15 15:12:20', 68, 65, 1, '0', 0),
(17, '2020-08-02 08:52:50', 55, 32, 1, '0', 0),
(18, '2020-07-06 23:43:21', 49, 58, 1, '0', 0),
(19, '2020-10-22 18:31:35', 37, 26, 1, '0', 0),
(20, '2019-12-12 23:26:24', 17, 43, 1, '0', 0),
(21, '2020-01-01 11:27:50', 63, 19, 1, '0', 0),
(22, '2020-08-16 09:00:32', 39, 45, 1, '0', 0),
(23, '2020-09-04 13:46:01', 61, 48, 1, '0', 0),
(24, '2019-11-29 03:43:45', 58, 27, 1, '0', 0),
(25, '2019-12-09 21:49:00', 57, 48, 1, '0', 0),
(26, '2020-03-24 09:04:04', 31, 42, 1, '0', 0),
(27, '2020-01-05 07:11:50', 56, 20, 1, '0', 0),
(28, '2020-08-18 05:52:55', 27, 36, 1, '0', 0),
(29, '2020-07-26 00:46:31', 24, 12, 1, '0', 0),
(30, '2019-12-13 23:53:00', 13, 39, 1, '0', 0),
(31, '2020-10-13 10:24:09', 26, 29, 1, '0', 0),
(32, '2020-01-24 03:54:58', 67, 33, 1, '0', 0),
(33, '2020-05-01 13:15:23', 66, 72, 1, '0', 0),
(34, '2020-05-15 10:09:42', 51, 64, 1, '0', 0),
(35, '2019-11-16 04:24:35', 17, 14, 1, '0', 0),
(36, '2020-01-12 20:42:40', 73, 68, 1, '0', 0),
(37, '2020-05-04 04:10:23', 59, 38, 1, '0', 0),
(38, '2020-10-18 09:17:00', 26, 69, 1, '0', 0),
(39, '2020-02-23 23:16:35', 74, 72, 1, '0', 0),
(40, '2020-03-09 09:47:27', 41, 46, 1, '0', 0),
(41, '2020-02-15 02:21:14', 18, 37, 1, '0', 0),
(42, '2020-01-19 16:11:39', 43, 16, 1, '0', 0),
(43, '2020-03-02 01:01:48', 24, 59, 1, '0', 0),
(44, '2020-05-13 10:38:59', 63, 32, 1, '0', 0),
(45, '2020-07-28 17:39:21', 41, 25, 1, '0', 0),
(46, '2020-10-18 12:07:23', 40, 33, 1, '0', 0),
(47, '2020-03-31 09:51:52', 44, 27, 1, '0', 0),
(48, '2019-12-30 18:41:15', 64, 50, 1, '0', 0),
(49, '2019-11-25 17:50:24', 16, 12, 1, '0', 0),
(50, '2019-11-25 17:40:20', 50, 45, 1, '0', 0),
(2204, '2020-11-08 14:19:00', 26, 3, 0, '4', 0),
(2205, '2020-11-09 16:57:00', 56, 3, 0, '0', 0),
(2206, '2020-11-08 17:29:00', 56, 3, 1, '2', 0),
(2207, '2020-11-08 17:41:00', 56, 3, 0, '2', 0),
(2208, '2020-11-08 17:42:00', 56, 3, 0, '3', 0),
(2209, '2020-11-08 19:57:00', 56, 3, 0, '2', 0),
(2210, '2020-11-12 10:01:00', 56, 3, 1, '0', 0),
(2211, '2020-11-12 10:01:00', 56, 3, 0, '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `image`) VALUES
(3, 'Plumber', 'storage/plumber.jpg'),
(4, 'Application Repair', 'storage/application repair.jpg'),
(5, 'Electrition', 'storage/electrician.jpg'),
(6, 'Photographer', 'storage/photographer.jpg'),
(7, 'Carpenter', 'storage/carpenter.jpg'),
(8, 'Home cleaner', 'storage/home cleaner.jpg'),
(9, 'Packer & Movers', 'storage/movers.jpg'),
(10, 'Painter', 'storage/painter.jpg'),
(11, 'Party decorator', 'storage/party.jpg'),
(12, 'Event Manager', 'storage/event manager.jpg'),
(13, 'Other', 'storage/other.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `profile` varchar(255) DEFAULT NULL,
  `city` varchar(10) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `mobile`, `role_name`, `designation`, `created_at`, `profile`, `city`, `pincode`, `updated_at`, `address`) VALUES
(3, 'Testuser', 'test3@test.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '1234567890', 'User', '-1', '2020-10-27 21:55:49', 'storage/image/profile.jpg', 'Surat', '394690', '2020-11-02 14:57:41', 'sdklfjoihfsdfskdjvsdv'),
(4, 'Testasisjd', 'idjf893j@ihjndsf.sdfoij', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '93', 'User', '-1', '2020-10-27 21:58:15', 'storage/image/profile.jpg', 'Surat', '0', '2020-11-01 17:15:32', ''),
(12, 'Profolencarrolldds', 'lindgren.scarlett@example.com', '12b03226a6d8be9c6e8cd5e55dc6c7920caaa39df14aab92d5e3ea9340d1c8a4d3d0b8e4314f1f6ef131ba4bf1ceb9186ab87c801af0d5c95b1befb8cedae2b9', '+1.691.334.1709', 'Worker', '4', '2020-11-01 17:16:44', 'storage/image/profile.jpg', 'Surat', '394690', '2020-11-08 08:34:30', 'This is my new address.'),
(13, 'Cecile Jacobi I', 'mosciski.sid@example.net', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '+1 (740) 999-8533', 'Worker', '11', '2020-11-01 17:16:44', 'storage/image/profile.jpg', 'Surat', '394690', '2020-11-01 11:46:44', ''),
(14, 'Marie Johnston', 'konopelski.aliyah@example.net', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '+1-436-439-6192', 'Worker', '12', '2020-11-01 17:16:44', 'storage/image/profile.jpg', 'Surat', '394690', '2020-11-01 11:46:44', ''),
(15, 'Alessia Ward', 'braulio.rutherford@example.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '+16526245495', 'Worker', '3', '2020-11-01 17:16:44', 'storage/image/profile.jpg', 'Surat', '394690', '2020-11-01 11:46:44', ''),
(16, 'Destiney Morar Jr.', 'esteban59@example.net', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '+1-889-770-3116', 'Worker', '12', '2020-11-01 17:16:44', 'storage/image/profile.jpg', 'Surat', '394690', '2020-11-01 11:46:44', ''),
(17, 'Matilda Cormier', 'dolson@example.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '1-286-959-9716', 'Worker', '7', '2020-11-01 17:17:43', 'storage/image/profile.jpg', 'Surat', '394690', '2020-11-01 11:47:43', ''),
(18, 'Devan Bins', 'isaac.heathcote@example.net', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '(558) 507-6307 x631', 'Worker', '13', '2020-11-01 17:17:43', 'storage/image/profile.jpg', 'Surat', '394690', '2020-11-01 11:47:43', ''),
(19, 'Jimmie Collins', 'babshire@example.org', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '+18968297442', 'Worker', '4', '2020-11-01 17:17:43', 'storage/image/profile.jpg', 'Surat', '394690', '2020-11-01 11:47:43', ''),
(20, 'Mr. Sedrick Gutkowski Sr.', 'fshanahan@example.net', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '1-905-454-9612', 'Worker', '10', '2020-11-01 17:17:43', 'storage/image/profile.jpg', 'Surat', '394690', '2020-11-01 11:47:43', ''),
(21, 'Mazie Schulist', 'ned.beier@example.net', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '1-370-253-5166', 'Worker', '13', '2020-11-01 17:17:43', 'storage/image/profile.jpg', 'Surat', '394690', '2020-11-01 11:47:43', ''),
(22, 'Abigayle White', 'ruecker.araceli@example.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '1-837-799-2423 x9417', 'Worker', '5', '2020-11-01 17:17:51', 'storage/image/profile.jpg', 'Surat', '394376', '2020-11-01 11:47:51', ''),
(23, 'Charley Carroll', 'fruecker@example.org', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '(859) 766-8138', 'Worker', '11', '2020-11-01 17:17:51', 'storage/image/profile.jpg', 'Surat', '394376', '2020-11-01 11:47:51', ''),
(24, 'Lura Murray', 'leonor.bartell@example.net', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '319.628.1888', 'Worker', '6', '2020-11-01 17:17:51', 'storage/image/profile.jpg', 'Surat', '394376', '2020-11-01 11:47:51', ''),
(25, 'Theodore Murazik', 'arnulfo31@example.net', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '(520) 266-9953', 'Worker', '12', '2020-11-01 17:17:51', 'storage/image/profile.jpg', 'Surat', '394376', '2020-11-01 11:47:51', ''),
(26, 'Ernest Bogisich', 'marguerite42@example.org', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '581-898-3232', 'Worker', '9', '2020-11-01 17:17:51', 'storage/image/profile.jpg', 'Surat', '394376', '2020-11-01 11:47:51', ''),
(27, 'Bernard Feeney', 'guillermo.heller@example.net', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '+1-245-834-3546', 'Worker', '4', '2020-11-01 17:18:09', 'storage/image/profile.jpg', 'Surat', '394335', '2020-11-01 11:48:09', ''),
(28, 'Mrs. Audra Blick DDS', 'jovanny66@example.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '452-784-7775 x705', 'Worker', '10', '2020-11-01 17:18:09', 'storage/image/profile.jpg', 'Surat', '394335', '2020-11-01 11:48:09', ''),
(29, 'Mr. Dylan Walter III', 'treutel.anabel@example.net', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '(892) 556-0931', 'Worker', '8', '2020-11-01 17:18:09', 'storage/image/profile.jpg', 'Surat', '394335', '2020-11-01 11:48:09', ''),
(30, 'Hilario Gusikowski', 'cecelia56@example.org', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '516-224-3521 x79788', 'Worker', '10', '2020-11-01 17:18:09', 'storage/image/profile.jpg', 'Surat', '394335', '2020-11-01 11:48:09', ''),
(31, 'Mr. Kyleigh Tromp', 'dietrich.rafael@example.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '1-640-748-7225 x1648', 'Worker', '5', '2020-11-01 17:18:09', 'storage/image/profile.jpg', 'Surat', '394335', '2020-11-01 11:48:09', ''),
(32, 'Kade Ortiz DVM', 'spinka.rafael@example.org', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '+1 (509) 273-9024', 'Worker', '8', '2020-11-01 17:18:25', 'storage/image/profile.jpg', 'Surat', '394310', '2020-11-01 11:48:25', ''),
(33, 'Shane Murphy', 'mazie87@example.net', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '863-540-0887', 'Worker', '10', '2020-11-01 17:18:25', 'storage/image/profile.jpg', 'Surat', '394310', '2020-11-01 11:48:25', ''),
(34, 'Dr. Hortense Rowe Sr.', 'sanford.maeve@example.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '201.340.4489 x356', 'Worker', '10', '2020-11-01 17:18:25', 'storage/image/profile.jpg', 'Surat', '394310', '2020-11-01 11:48:25', ''),
(35, 'Milton Keeling I', 'henderson.halvorson@example.org', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '(353) 597-6920 x65173', 'Worker', '12', '2020-11-01 17:18:25', 'storage/image/profile.jpg', 'Surat', '394310', '2020-11-01 11:48:25', ''),
(36, 'Joyce Morissette DVM', 'joshua.johnston@example.org', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '523-918-7049 x126', 'Worker', '8', '2020-11-01 17:18:25', 'storage/image/profile.jpg', 'Surat', '394310', '2020-11-01 11:48:25', ''),
(37, 'Bonita Adams Jr.', 'gkunde@example.net', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '(583) 727-9775 x72806', 'Worker', '10', '2020-11-01 17:19:50', 'storage/image/profile.jpg', 'Ahmedabad', '380053', '2020-11-01 11:49:50', ''),
(38, 'Makenna Hoeger', 'hnicolas@example.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '+1-491-318-0842', 'Worker', '4', '2020-11-01 17:19:50', 'storage/image/profile.jpg', 'Ahmedabad', '380053', '2020-11-01 11:49:50', ''),
(39, 'Mrs. Clotilde Stanton DDS', 'flatley.imogene@example.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '(956) 256-8531 x5917', 'Worker', '3', '2020-11-01 17:19:50', 'storage/image/profile.jpg', 'Ahmedabad', '380055', '2020-11-01 11:49:50', ''),
(40, 'Alvena Pollich', 'uullrich@example.net', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '1-334-439-8145 x99179', 'Worker', '4', '2020-11-01 17:19:50', 'storage/image/profile.jpg', 'Ahmedabad', '380053', '2020-11-01 11:49:50', ''),
(41, 'Freda Rice', 'utromp@example.net', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '1-247-783-5683', 'Worker', '10', '2020-11-01 17:19:50', 'storage/image/profile.jpg', 'Ahmedabad', '380058', '2020-11-01 11:49:50', ''),
(42, 'Glennie Hegmann', 'jarvis.zulauf@example.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '949-291-8703 x597', 'Worker', '5', '2020-11-01 17:19:50', 'storage/image/profile.jpg', 'Ahmedabad', '380058', '2020-11-01 11:49:50', ''),
(43, 'Jamison Stokes', 'kennedy38@example.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '+1-321-452-8433', 'Worker', '11', '2020-11-01 17:19:50', 'storage/image/profile.jpg', 'Ahmedabad', '380053', '2020-11-01 11:49:50', ''),
(44, 'Prof. Arthur Bogisich', 'nrutherford@example.org', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '909-337-8113', 'Worker', '4', '2020-11-01 17:19:50', 'storage/image/profile.jpg', 'Ahmedabad', '380058', '2020-11-01 11:49:50', ''),
(45, 'Vernice Hartmann', 'cernser@example.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '390-512-3810 x799', 'Worker', '4', '2020-11-01 17:19:50', 'storage/image/profile.jpg', 'Ahmedabad', '380055', '2020-11-01 11:49:50', ''),
(46, 'Rebeka Dare', 'christelle.mccullough@example.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '443-332-8897 x7866', 'Worker', '6', '2020-11-01 17:19:50', 'storage/image/profile.jpg', 'Ahmedabad', '380053', '2020-11-01 11:49:50', ''),
(47, 'Carlos Effertz DVM', 'ebradtke@example.org', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '1-735-278-3919 x2999', 'Worker', '3', '2020-11-01 17:19:50', 'storage/image/profile.jpg', 'Ahmedabad', '380053', '2020-11-01 11:49:50', ''),
(48, 'Mr. Greg Feeney', 'gerlach.ellen@example.org', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '278-540-4494 x25532', 'Worker', '10', '2020-11-01 17:19:50', 'storage/image/profile.jpg', 'Ahmedabad', '380015', '2020-11-01 11:49:50', ''),
(49, 'Keith Lynch', 'rempel.alfonso@example.net', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '445-667-8337 x729', 'Worker', '8', '2020-11-01 17:19:50', 'storage/image/profile.jpg', 'Ahmedabad', '380053', '2020-11-01 11:49:50', ''),
(50, 'Adolfo Bins', 'maya63@example.net', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '1-845-288-1783 x0153', 'Worker', '13', '2020-11-01 17:19:50', 'storage/image/profile.jpg', 'Ahmedabad', '380058', '2020-11-01 11:49:50', ''),
(51, 'Prof. Lucious Bayer III', 'dspinka@example.org', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '394-707-5038', 'Worker', '3', '2020-11-01 17:19:50', 'storage/image/profile.jpg', 'Ahmedabad', '380053', '2020-11-01 11:49:50', ''),
(52, 'Ottis Kunde I', 'fahey.madisen@example.net', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '1-749-349-2741', 'Worker', '8', '2020-11-01 17:19:50', 'storage/image/profile.jpg', 'Ahmedabad', '380053', '2020-11-01 11:49:50', ''),
(53, 'Aliya Bayer', 'bspinka@example.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '328-314-2575 x03805', 'Worker', '3', '2020-11-01 17:19:50', 'storage/image/profile.jpg', 'Ahmedabad', '380058', '2020-11-01 11:49:50', ''),
(54, 'Cyrus Heathcote', 'marquardt.ola@example.org', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '654.660.7438 x76787', 'Worker', '13', '2020-11-01 17:19:50', 'storage/image/profile.jpg', 'Ahmedabad', '380058', '2020-11-01 11:49:50', ''),
(55, 'Gerson Goldner IV', 'thora.toy@example.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '428-442-0159 x3802', 'Worker', '8', '2020-11-01 17:19:50', 'storage/image/profile.jpg', 'Ahmedabad', '380055', '2020-11-01 11:49:50', ''),
(56, 'Stanley Gottlieb', 'morar.hadley@example.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '879-308-5235 x3032', 'Worker', '13', '2020-11-01 17:19:50', 'storage/image/profile.jpg', 'Ahmedabad', '380055', '2020-11-01 11:49:50', ''),
(57, 'Breana Schmeler', 'buddy56@example.org', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '701-453-1800', 'Worker', '5', '2020-11-01 17:20:26', 'storage/image/profile.jpg', 'Vadodara', '391135', '2020-11-01 11:50:26', ''),
(58, 'Prof. Margarete Hauck', 'hailee.altenwerth@example.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '394.998.8462', 'Worker', '9', '2020-11-01 17:20:26', 'storage/image/profile.jpg', 'Vadodara', '390007', '2020-11-01 11:50:26', ''),
(59, 'Jovanny Langosh', 'kilback.saige@example.org', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '539.827.8640 x200', 'Worker', '7', '2020-11-01 17:20:26', 'storage/image/profile.jpg', 'Vadodara', '390007', '2020-11-01 11:50:26', ''),
(60, 'Prof. Kirstin Kutch PhD', 'xwunsch@example.org', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '678-387-9271', 'Worker', '7', '2020-11-01 17:20:26', 'storage/image/profile.jpg', 'Vadodara', '391110', '2020-11-01 11:50:26', ''),
(61, 'Dr. Wilbert Stoltenberg', 'sboyer@example.net', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '419.862.6407', 'Worker', '4', '2020-11-01 17:20:26', 'storage/image/profile.jpg', 'Vadodara', '391110', '2020-11-01 11:50:26', ''),
(62, 'Kole Parker V', 'lisandro19@example.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '461.717.8581 x1244', 'Worker', '6', '2020-11-01 17:20:26', 'storage/image/profile.jpg', 'Vadodara', '391110', '2020-11-01 11:50:26', ''),
(63, 'Prof. Stephanie Willms IV', 'gilda90@example.org', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '+1-303-559-5826', 'Worker', '4', '2020-11-01 17:20:26', 'storage/image/profile.jpg', 'Vadodara', '391110', '2020-11-01 11:50:26', ''),
(64, 'Santa Keeling', 'layne.thiel@example.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '650-939-0273', 'Worker', '7', '2020-11-01 17:20:26', 'storage/image/profile.jpg', 'Vadodara', '391135', '2020-11-01 11:50:26', ''),
(65, 'Keira Becker', 'skiles.taya@example.net', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '894.949.8412', 'Worker', '6', '2020-11-01 17:20:26', 'storage/image/profile.jpg', 'Vadodara', '390014', '2020-11-01 11:50:26', ''),
(66, 'Antone Beahan', 'istanton@example.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '(953) 420-7823', 'Worker', '3', '2020-11-01 17:20:26', 'storage/image/profile.jpg', 'Vadodara', '391110', '2020-11-01 11:50:26', ''),
(67, 'Shayne Jacobs PhD', 'dietrich.lexus@example.net', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '616-576-5377 x526', 'Worker', '11', '2020-11-01 17:20:26', 'storage/image/profile.jpg', 'Vadodara', '390014', '2020-11-01 11:50:26', ''),
(68, 'Kaley Flatley', 'mhintz@example.org', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '(431) 610-2895 x105', 'Worker', '12', '2020-11-01 17:20:26', 'storage/image/profile.jpg', 'Vadodara', '391110', '2020-11-01 11:50:26', ''),
(69, 'Aliza Streich', 'zhowell@example.net', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '506-807-1869', 'Worker', '11', '2020-11-01 17:20:26', 'storage/image/profile.jpg', 'Vadodara', '390014', '2020-11-01 11:50:26', ''),
(70, 'Hilbert Daniel', 'carmela44@example.net', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '404.210.0607 x058', 'Worker', '9', '2020-11-01 17:20:26', 'storage/image/profile.jpg', 'Vadodara', '391135', '2020-11-01 11:50:26', ''),
(71, 'Diana Schaefer DDS', 'erling75@example.org', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '+1-838-828-7279', 'Worker', '10', '2020-11-01 17:20:26', 'storage/image/profile.jpg', 'Vadodara', '390014', '2020-11-01 11:50:26', ''),
(73, 'Ransom Connelly', 'lebsack.patrick@example.org', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '1-252-484-5659', 'Worker', '13', '2020-11-01 17:20:26', 'storage/image/profile.jpg', 'Vadodara', '391135', '2020-11-01 11:50:26', ''),
(74, 'Prof. Evans Langworth DVM', 'elang@example.org', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '576-406-4335 x3971', 'Worker', '4', '2020-11-01 17:20:26', 'storage/image/profile.jpg', 'Vadodara', '390014', '2020-11-01 11:50:26', ''),
(75, 'Lou Rippin DVM', 'tony70@example.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '1-634-813-3623 x07560', 'Worker', '4', '2020-11-01 17:20:26', 'storage/image/profile.jpg', 'Vadodara', '390007', '2020-11-01 11:50:26', ''),
(76, 'Maximilian Blanda', 'mayert.adam@example.org', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '1-467-375-0189 x11978', 'Worker', '7', '2020-11-01 17:20:26', 'storage/image/profile.jpg', 'Vadodara', '391110', '2020-11-01 11:50:26', ''),
(78, 'admin', 'admin@admin.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '1234567890', 'admin', '-1', '2020-11-07 23:01:57', NULL, 'Surat', '394690', '2020-11-07 17:32:17', 'asd\r\nasd\r\nasd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hires`
--
ALTER TABLE `hires`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hires`
--
ALTER TABLE `hires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2212;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
