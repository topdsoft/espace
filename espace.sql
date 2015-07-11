-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 11, 2015 at 12:08 PM
-- Server version: 5.5.43
-- PHP Version: 5.3.10-1ubuntu3.19

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `espace`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `instructor_id` int(10) unsigned NOT NULL,
  `created` datetime NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` text NOT NULL,
  `cost` int(11) NOT NULL,
  `max_students` int(11) NOT NULL,
  `min_students` int(11) NOT NULL,
  `textbook` varchar(256) NOT NULL,
  `materials` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `instructor_id`, `created`, `name`, `description`, `cost`, `max_students`, `min_students`, `textbook`, `materials`) VALUES
(1, 2, '2015-07-10 16:26:12', 'Arduino 101', '', 15, 10, 5, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `courses_members`
--

CREATE TABLE IF NOT EXISTS `courses_members` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `course_id` int(10) unsigned NOT NULL,
  `member_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `courses_members`
--

INSERT INTO `courses_members` (`id`, `course_id`, `member_id`) VALUES
(1, 1, 1),
(2, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE IF NOT EXISTS `logins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `time_in` datetime NOT NULL,
  `time_out` datetime DEFAULT NULL,
  `member_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(16) NOT NULL,
  `email` varchar(128) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `paid_until` date NOT NULL,
  `access_level` int(11) NOT NULL,
  `barcode_hash` varchar(32) NOT NULL,
  `company` varchar(64) NOT NULL,
  `hrs_left` int(11) NOT NULL,
  `hrs_left_monthly` int(11) NOT NULL,
  `waver` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `username`, `email`, `phone`, `first_name`, `last_name`, `paid_until`, `access_level`, `barcode_hash`, `company`, `hrs_left`, `hrs_left_monthly`, `waver`) VALUES
(1, 'drobson', 'david@espacelabs.com', '', 'David', 'Robson', '2025-07-10', 1, 'jahdfjkdhkjf', '', 1000, 100, ''),
(2, 'rsilver', 'rick@espacelabs.com', '', 'Rick', 'Silver', '2025-07-10', 1, 'dfjkajfkajl', '', 1000, 100, ''),
(3, 'klakin', 'kurtlakin@topdsoft.com', '5157701684', 'Kurt', 'Lakin', '2015-07-10', 1, 'kdajfkdjfk', 'Top Drawer Software LLC', 10, 4, '');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `member_id` int(10) unsigned NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `created`, `member_id`, `amount`, `payment_type`) VALUES
(1, '2015-07-10 16:19:11', 1, 50, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `course_id` int(10) unsigned NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
