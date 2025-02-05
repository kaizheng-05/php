-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 05, 2025 at 07:39 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `password` int(11) NOT NULL,
  `firstname` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `lastname` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `date_of_birth` date NOT NULL,
  `registration_date_and_time` datetime NOT NULL,
  `account_status` enum('active','inactive') NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`email`, `password`, `firstname`, `lastname`, `gender`, `date_of_birth`, `registration_date_and_time`, `account_status`) VALUES
('janydo3cm@email-temp.com', 5449, 'william', 'afton', 'male', '1987-04-30', '2015-06-27 08:30:15', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `product_cat` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `price` double NOT NULL,
  `promotion_price` double NOT NULL,
  `manufacture_date` date DEFAULT NULL,
  `expired_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `product_cat`, `price`, `promotion_price`, `manufacture_date`, `expired_date`) VALUES
(1, 'ps controller', 'A device that used with ps5', '2', 299.99, 200, '2023-04-29', '2025-02-05'),
(3, 'Gatorade', 'This is a very good drink for athletes.', '3', 1.99, 0, NULL, NULL),
(4, 'Eye Glasses', 'It will make you read better.', '2', 6, 0, NULL, NULL),
(5, 'Trash Can', 'It will help you maintain cleanliness.', '2', 3.95, 0, NULL, NULL),
(6, 'Mouse', 'Very useful if you love your computer.', '2', 11.35, 0, NULL, NULL),
(7, 'Earphone', 'You need this one if you love music.', '2', 7, 0, NULL, NULL),
(8, 'Pillowsss', 'Sleeping well is important.', '2', 8.99, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_cat`
--

DROP TABLE IF EXISTS `product_cat`;
CREATE TABLE IF NOT EXISTS `product_cat` (
  `product_cat_id` int(11) NOT NULL,
  `product_cat_name` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `product_cat_description` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`product_cat_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_cat`
--

INSERT INTO `product_cat` (`product_cat_id`, `product_cat_name`, `product_cat_description`) VALUES
(1, 'sport', ''),
(2, 'accessories ', ''),
(3, 'drinks', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
