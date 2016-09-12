-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 12, 2016 at 04:16 PM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `company`
--

-- --------------------------------------------------------

--
-- Table structure for table `compare`
--

CREATE TABLE IF NOT EXISTS `compare` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(20) NOT NULL,
  `image` varchar(20) NOT NULL,
  `sector` varchar(20) NOT NULL,
  `locality` varchar(20) NOT NULL,
  `atm` varchar(20) NOT NULL,
  `park` varchar(100) NOT NULL,
  `light` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `compare`
--

INSERT INTO `compare` (`id`, `city`, `image`, `sector`, `locality`, `atm`, `park`, `light`) VALUES
(1, 'Noida', '1.jpg', 'Sector 71', ' Block C', 'yes', 'yes', '24 Hours'),
(2, 'Noida', '2.jpg', 'Setor 71', 'Block B', 'Yes', 'Yes', '24 hours'),
(3, 'Noida', '3.jpg', 'Sector 51', 'Block A', 'Yes', 'Yes', '20 Hours'),
(4, 'Noida', '4.jpg', 'Sector 52', 'Block F', 'Yes', 'Yes', '21 Hours'),
(5, 'Delhi', '5.jpg', 'Yamuna Vihar', 'Block B', 'No', 'No', 'Never');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'santosh', 'sk'),
(2, 'deepu', 'Deepu');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(32) NOT NULL,
  `access` int(10) unsigned DEFAULT NULL,
  `data` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sessions`
--

