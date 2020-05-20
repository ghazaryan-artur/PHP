-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 20, 2020 at 10:58 AM
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
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=123 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `market`
--

INSERT INTO `market` (`id`, `title`, `description`, `price`, `count`) VALUES
(54, 'BMW', 'Fast and respectable. Everything that you need ...', 30000.00, 47),
(2, 'Mersedes', 'Car for that mans, who already successful.', 42000.00, 44),
(3, 'Ferrari', 'You cant ride it in Yerevan. But everybody know why you buy it.', 80000.00, 12),
(5, 'Opel', 'Cheap and sad', 3999.99, 160),
(108, 'asdasd', 'iykklkl', 33.00, 44),
(107, 'kkk', 'lklk', 9999.00, 9999),
(105, 'kkk', 'lklk', 9999.00, 9999),
(116, 'asd', 'sdafsddfg', 123.00, 123),
(113, 'asdasd', 'jkljkl', 33.00, 44),
(112, 'asd', 'sdsdg', 11.00, 11),
(115, 'asd', 'sdfsdf', 212.00, 312),
(111, 'aasd', 'asdsd', 123.00, 123),
(122, 'jghj', 'ghjghj', 56456.00, 456);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(20) NOT NULL,
  `l_name` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `f_name`, `l_name`, `email`, `password`) VALUES
(1, 'Artur', 'qasd', 'ghaza@ad.ad', 'testtest'),
(2, 'newNmae', 'Ghazaryan', 'ghazaryan.artur1@gmai.com', '05a671c66aefea124cc08b76ea6d30bb'),
(4, 'natali', 'portman', 'portman@gmail.com', 'dc5f3b8db86bb00bc94d919b0bb3e18e'),
(8, 'Artur', 'Gh', 'Crown_92@mail.ru', '698d51a19d8a121ce581499d7b701668'),
(11, 'Artur', 'Gh', 'Crown_92@mail.ru', '6512bd43d9caa6e02c990b0a82652dca');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
