-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 27, 2020 at 01:59 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `artur`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `car_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `avatar` tinyint(1) NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=133 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `car_id`, `name`, `avatar`, `date`) VALUES
(125, 134, '0.11909900 15900558900.jpg', 0, '2020-05-21 10:11:30'),
(126, 0, '0.26490800 15900559040.jpg', 0, '2020-05-21 10:11:44'),
(127, 0, '0.26490800 15900559041.jpg', 0, '2020-05-21 10:11:44'),
(128, 0, '0.26490800 15900559042.jpg', 0, '2020-05-21 10:11:44'),
(129, 0, '0.26490800 15900559043.jpg', 0, '2020-05-21 10:11:44'),
(130, 134, '0.96247900 15900562280.jpg', 0, '2020-05-21 10:17:08'),
(131, 134, '0.96247900 15900562281.jpg', 0, '2020-05-21 10:17:09'),
(132, 134, '0.96247900 15900562282.jpg', 1, '2020-05-21 10:17:09');

-- --------------------------------------------------------

--
-- Table structure for table `market`
--

DROP TABLE IF EXISTS `market`;
CREATE TABLE IF NOT EXISTS `market` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL,
  `description` text DEFAULT NULL,
  `price` float(100,2) NOT NULL,
  `count` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=146 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `market`
--

INSERT INTO `market` (`id`, `title`, `description`, `price`, `count`) VALUES
(54, 'BMW', 'Fast and respectable. Everything that you need ...', 30000.00, 47),
(2, 'Mersedes', 'Car for that mans, who already successful.', 42000.00, 44),
(3, 'Ferrari', 'You cant ride it in Yerevan. But everybody know why you buy it.', 80000.00, 12),
(5, 'Opel', 'Cheap and sad', 3999.99, 160),
(130, 'fdg', 'fghfgh', 234.00, 345),
(131, 'sdf', 'gfhfgh', 45.00, 345),
(145, 'Ford', 'Lovely old american car', 7000.00, 1000),
(136, 'asdasd', 'rtrthyrh', 111.00, 333),
(137, 'asdasd', 'rtrthyrh', 111.00, 333),
(138, 'Toyota', 'Japan car', 11000.00, 66),
(139, 'Toyota', 'Japan car', 11000.00, 66),
(140, 'Toyota', 'Japan car', 11000.00, 66),
(142, 'Ford', 'Lovely old american car', 7000.00, 1000),
(143, 'Ford', 'Lovely old american car', 7000.00, 1000),
(144, 'Ford', 'Lovely old american car', 7000.00, 1000),
(135, 'asdasd', 'rtrthyrh', 111.00, 333),
(129, 'asdasd', 'hgf', 123.00, 213),
(134, 'sdf', 'sdfdsf', 111.00, 333);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
