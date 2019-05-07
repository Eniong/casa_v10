-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 20, 2018 at 06:48 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

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
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `b_day` date NOT NULL,
  `age` int(55) NOT NULL,
  `civil_status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(13, 'edzkie', 'edzzzcatbagan@yahoo.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(12, 'cloud', 'cloud_cruz@yahoo.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(14, 'Rey', 'rey@sample', '81dc9bdb52d04dc20036dbd8313ed055'),
(15, 'sample', 'sample@me', '81dc9bdb52d04dc20036dbd8313ed055'),
(16, 'rich', 'rich@sample', '81dc9bdb52d04dc20036dbd8313ed055'),
(18, 'Melchor', 'melchor@sample', 'b0c7aa077bf11291c4b971dbe2ac475d'),
(19, 'Reyshirl', 'reyreycutecute@me', '604e175357902d9bce088e2878ff0a5f'),
(20, 'Eniong Cruz', 'eniongancheta11@gmail.com', '790e25a221fad17368df5a1492a5018b'),
(21, 'Client', 'client@sample', '81dc9bdb52d04dc20036dbd8313ed055');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
