-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 07, 2014 at 11:31 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jobloads`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email_address` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `address` text,
  `city` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `zip` int(11) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `fax` int(11) DEFAULT NULL,
  `mobile` int(11) DEFAULT NULL,
  `mobilecarrier` varchar(45) DEFAULT NULL,
  `dot` varchar(45) DEFAULT NULL,
  `user_type` enum('admin','buyer','seller') DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `updated` timestamp NULL DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `activation_code` varchar(45) DEFAULT NULL,
  `activation_status` int(2) NOT NULL DEFAULT '0',
  `gov_auth_number` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email_address`, `password`, `first_name`, `last_name`, `address`, `city`, `state`, `country`, `zip`, `phone`, `fax`, `mobile`, `mobilecarrier`, `dot`, `user_type`, `last_login`, `updated`, `created`, `status`, `activation_code`, `activation_status`, `gov_auth_number`) VALUES
(40, 'dhavald99@gmail.com', 'a', 'Dhaval', 'fgjf', 'Rajkot', 'Rajkot', 'Gujrat', NULL, 360005, 2147483647, NULL, 2147483647, NULL, NULL, 'buyer', NULL, NULL, NULL, NULL, 'b3caac4d89686084094b07ac604838543483dc38', 1, 0),
(41, 'd@d.com', 'a', 's', 's', 's', 's', 's', NULL, 5, 5, 5, 5, NULL, NULL, 'buyer', NULL, NULL, NULL, NULL, '28014f377b3d784a417c3c95cb4782538a2d4623', 0, 0),
(42, 'da@da.com', '5d35af78e53e6fe4ea9759689c9209cd4b798c02', 'a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, 'seller', NULL, NULL, NULL, NULL, '28a320d3b4630923b23d10f78f8e0185b1ca6a1a', 1, 453),
(43, 'dd@gmail.com', 'dhavald99', 'dhava;', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 80, NULL, NULL, 'seller', '2014-03-06 11:57:50', NULL, NULL, NULL, '82bf949e43370e51a2c4a3bf441ae35b6e8f578a', 1, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
