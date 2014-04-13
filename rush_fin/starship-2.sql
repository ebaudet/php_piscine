-- phpMyAdmin SQL Dump
-- version 4.1.9
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Apr 13, 2014 at 10:45 AM
-- Server version: 5.5.36
-- PHP Version: 5.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `starship`
--

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE IF NOT EXISTS `game` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gamename` varchar(16) COLLATE utf8_bin NOT NULL,
  `gametype` int(11) NOT NULL,
  `player` varchar(128) COLLATE utf8_bin NOT NULL,
  `gameplayer` varchar(128) COLLATE utf8_bin NOT NULL,
  `currentplayer` int(11) NOT NULL,
  `battlefield` varchar(32) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `gamename` (`gamename`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gameplayer`
--

CREATE TABLE IF NOT EXISTS `gameplayer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `race` varchar(16) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `pointsmax` int(11) NOT NULL,
  `username` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `fleet` varchar(256) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `gameplayer`
--

INSERT INTO `gameplayer` (`id`, `race`, `pointsmax`, `username`, `fleet`) VALUES
(2, 'oip', 5, 'rtyh', 'yukm');

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE IF NOT EXISTS `player` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) COLLATE utf8_bin NOT NULL,
  `password` varchar(512) COLLATE utf8_bin NOT NULL,
  `nbWin` int(11) NOT NULL DEFAULT '0',
  `nbLoose` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ships`
--

CREATE TABLE IF NOT EXISTS `ships` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ownerid` int(11) NOT NULL,
  `weapons` varchar(256) COLLATE utf8_bin NOT NULL,
  `shieldbase` int(11) NOT NULL,
  `ppcapacity` int(11) NOT NULL,
  `speed` int(11) NOT NULL,
  `maneuvrability` int(11) NOT NULL,
  `notes` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ownerid` (`ownerid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `weapons`
--

CREATE TABLE IF NOT EXISTS `weapons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `charges` int(11) NOT NULL,
  `shortRange` varchar(4) COLLATE utf8_bin NOT NULL,
  `mediumRange` varchar(4) COLLATE utf8_bin NOT NULL,
  `longRange` varchar(4) COLLATE utf8_bin NOT NULL,
  `effectZone` varchar(4) COLLATE utf8_bin NOT NULL,
  `special` varchar(4) COLLATE utf8_bin NOT NULL,
  `notes` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
