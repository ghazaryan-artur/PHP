-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 20, 2020 at 10:41 AM
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
