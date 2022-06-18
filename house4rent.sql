-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 18, 2020 at 02:02 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `house4rent`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(140) NOT NULL,
  `comments` longtext NOT NULL,
  `date_publish` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

DROP TABLE IF EXISTS `owner`;
CREATE TABLE IF NOT EXISTS `owner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(220) NOT NULL,
  `ownerID` varchar(100) NOT NULL,
  `address` varchar(220) NOT NULL,
  `contact` int(11) NOT NULL,
  `email` varchar(220) NOT NULL,
  `houseID` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`id`, `name`, `ownerID`, `address`, `contact`, `email`, `houseID`) VALUES
(1, 'admin', '123', 'Bashundhora R/A, Dhaka', 0, 'diptavoumick.nsu@gmail.com', '324'),
(14, '', '8975496746', 'dkh', 1321212121, 'asd@gmail.com', '321');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` tinyblob NOT NULL,
  `image_text` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tenant`
--

DROP TABLE IF EXISTS `tenant`;
CREATE TABLE IF NOT EXISTS `tenant` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(220) NOT NULL,
  `TenantID` varchar(100) NOT NULL,
  `Address` varchar(220) NOT NULL,
  `ContactNo` varchar(11) NOT NULL,
  `Email` varchar(220) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tenant`
--

INSERT INTO `tenant` (`ID`, `Name`, `TenantID`, `Address`, `ContactNo`, `Email`) VALUES
(18, 'gggg', '4345789769', 'dhaka,bd', '', 'diptbbba.voumick@northsouth.edu'),
(19, '', '3545645644', 'dhaka,kk', '', 'lkfdojjjidg@gmail.com'),
(16, 'admin22', '4853579870', 'dhaka', '', 'admin@gmail.com'),
(17, 'hfifj', '3333333333', 'khuimmmm', '', 'diptavoumicmmmk.nsu@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `registerID` int(10) NOT NULL,
  `name` varchar(220) NOT NULL,
  `username` varchar(220) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` int(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `registerID`, `name`, `username`, `email`, `contact`, `password`, `created_at`) VALUES
(4, 1, 'admin', 'admin', 'rsilence16@gmail.com', 123456789, '$2y$10$HWg1GJoqqjA5Jpnp7uJAaeJOJvCGyOJIOGdv.kIYL1PlfgMENSP.a', '2020-02-18 22:12:19'),
(8, 2, 'Dipta Voumick', 'dipta', 'ovykarmkor@gmail.com', 1765456700, '$2y$10$WBwAPAlfHNpKBI136o7LvumJbnKC5xAdVI8jt6yhZ2ESW5T9ZxmW6', '2020-04-15 21:15:06');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
