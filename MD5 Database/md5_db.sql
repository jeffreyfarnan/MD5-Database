-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 05, 2023 at 04:43 PM
-- Server version: 5.5.20
-- PHP Version: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `md5_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `filename` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `name`, `filename`) VALUES
(1, 'bad', 'bad.jpeg'),
(2, 'good', 'good.jpeg'),
(3, 'unknown', 'unknown.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `md5_database`
--

CREATE TABLE IF NOT EXISTS `md5_database` (
  `File` int(11) NOT NULL AUTO_INCREMENT,
  `MD5` varchar(20) NOT NULL,
  `MalwareType` varchar(20) NOT NULL,
  `FileName` varchar(20) NOT NULL,
  `Size` int(11) NOT NULL,
  `Det` varchar(100) NOT NULL,
  `Date` varchar(20) NOT NULL,
  PRIMARY KEY (`File`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
