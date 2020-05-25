-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 25, 2020 at 07:26 AM
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
-- Database: `registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `date`) VALUES
(1, 'art', 'asd@sdf.sdf', 'asdasd', '2020-05-22 08:01:10'),
(2, 'asd', 'Crown_92@mail.ru', '123', '2020-05-22 08:01:34'),
(3, 'asd', 'cerber1993@rambler.ru', '123', '2020-05-22 10:36:10'),
(4, 'asd', 'Crown_92@mail.ru', 'fff', '2020-05-22 10:38:39'),
(5, 'asd', 'cerber1993@rambler.ru', 'MD5(123)', '2020-05-22 10:45:09'),
(6, 'name', 'mail', '823df70fef5a629989e4987f955653cf', '2020-05-22 10:50:56'),
(7, 'kkk', 'cerber1993@rambler.ru', 'cb42e130d1471239a27fca6228094f0e', '2020-05-22 10:52:38'),
(8, 'asd', 'cerber1993@rambler.ru', '698d51a19d8a121ce581499d7b701668', '2020-05-22 12:46:32');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
