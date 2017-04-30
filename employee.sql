-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 30, 2017 at 06:58 PM
-- Server version: 5.6.33-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `employee`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `salary` int(11) NOT NULL,
  `contact` varchar(25) DEFAULT NULL,
  `position` varchar(50) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `firstname`, `lastname`, `address`, `salary`, `contact`, `position`, `username`, `password`) VALUES
(7, 'y', 'w', 'test 32', 2000, '123456789', 'junior php dev', 'yw', '$2y$10$Ci9eLTOH.SeEZ3PAtzjM0eQNa9KTC5BSpKwXCSkS0Mr4zqVabnrFa'),
(8, 'm', 'g2', 'test 333', 9999, '987654321', 'owner', 'manager', '$2y$10$HW5SeH2wVqRzGiUCxDtd4ul/BKVi1K9bkK8rG2vmKhK7tv5qZRzNq'),
(10, 'test name', 'test', 'test 23', 666, '234567890', 'test', 'test', '$2y$10$FXTAv4dzWzc5dVSimuqIpeYcqkoYIWA9Ih2KzHqgampylfMSyITc6');

-- --------------------------------------------------------

--
-- Table structure for table `overtime_schedule`
--

CREATE TABLE IF NOT EXISTS `overtime_schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `timestart` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `hours` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
