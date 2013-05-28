-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 29, 2013 at 01:19 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `abala-LWP`
--

-- --------------------------------------------------------

--
-- Table structure for table `events_tbl`
--

CREATE TABLE IF NOT EXISTS `events_tbl` (
  `events_id` int(12) NOT NULL AUTO_INCREMENT,
  `events_name` varchar(50) NOT NULL,
  `organizer` varchar(50) NOT NULL,
  `invited_people` varchar(50) NOT NULL,
  `events_date` datetime NOT NULL,
  `events_held` varchar(50) NOT NULL,
  `date_entered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`events_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `events_tbl`
--

INSERT INTO `events_tbl` (`events_id`, `events_name`, `organizer`, `invited_people`, `events_date`, `events_held`, `date_entered`) VALUES
(3, '2013 summer bash', 'siege', 'all allumni in alang-alang', '2013-05-30 00:00:00', 'leyte ', '2013-05-22 00:00:00'),
(4, 'Summer Camp', 'Rei', 'all children', '2013-05-27 00:00:00', 'At alang-alang leyte', '2013-05-22 09:45:33'),
(5, 'Enrollment ', 'anime6url_max', 'all students in alang-alang Nat High School', '0000-00-00 00:00:00', 'alang-alang National High School', '2013-05-27 08:40:30'),
(11, 'Enrollment', 'anime6url_max', 'all students in alang-alang Nat High School', '2013-05-27 00:00:00', 'alang-alang National High School', '2013-05-27 10:16:16');

-- --------------------------------------------------------

--
-- Table structure for table `fave_places`
--

CREATE TABLE IF NOT EXISTS `fave_places` (
  `users_id` int(11) DEFAULT NULL,
  `places_id` int(11) DEFAULT NULL,
  KEY `users_id` (`users_id`),
  KEY `places_id` (`places_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fave_places`
--

INSERT INTO `fave_places` (`users_id`, `places_id`) VALUES
(4, 58),
(1, 70),
(32, 72),
(32, 75),
(32, 76),
(4, 77);

-- --------------------------------------------------------

--
-- Table structure for table `invite`
--

CREATE TABLE IF NOT EXISTS `invite` (
  `users_id` int(11) NOT NULL,
  `events_id` int(11) NOT NULL,
  KEY `users_id` (`users_id`),
  KEY `events_id` (`events_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invite`
--

INSERT INTO `invite` (`users_id`, `events_id`) VALUES
(1, 3),
(1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `like_places`
--

CREATE TABLE IF NOT EXISTS `like_places` (
  `places_like` int(11) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  KEY `places_like` (`places_like`),
  KEY `users_id` (`users_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `like_places`
--

INSERT INTO `like_places` (`places_like`, `users_id`) VALUES
(70, 1),
(70, 1),
(58, 1),
(58, 1),
(70, 1),
(70, 4),
(70, 4),
(58, 4),
(70, 1),
(58, 21),
(70, 21),
(70, 21),
(70, 21),
(58, 1),
(58, 1),
(76, 1),
(58, 1),
(72, 1),
(77, 1),
(77, 1),
(77, 1),
(76, 1),
(58, 1),
(77, 1),
(77, 1),
(77, 1),
(77, 1),
(77, 1),
(77, 1),
(77, 1),
(77, 1),
(76, 1),
(77, 1),
(58, 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications_tbl`
--

CREATE TABLE IF NOT EXISTS `notifications_tbl` (
  `users_notified_id` int(11) NOT NULL,
  `users_notify` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications_tbl`
--

INSERT INTO `notifications_tbl` (`users_notified_id`, `users_notify`) VALUES
(1, 4),
(1, 1),
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `places_TLAIB`
--

CREATE TABLE IF NOT EXISTS `places_TLAIB` (
  `places_id` int(12) NOT NULL AUTO_INCREMENT,
  `places_name` varchar(50) NOT NULL,
  `places_location` varchar(50) NOT NULL,
  `places_description` text NOT NULL,
  `places_classification` varchar(50) NOT NULL,
  PRIMARY KEY (`places_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=78 ;

--
-- Dumping data for table `places_TLAIB`
--

INSERT INTO `places_TLAIB` (`places_id`, `places_name`, `places_location`, `places_description`, `places_classification`) VALUES
(58, 'sahara beach', 'San jose', 'iuy', 'Beaches'),
(70, 'Manhattan Inn', 'yuiy', 'uiyiu', 'Hotels'),
(72, 'ytyut', '2pis', 'uyt', 'Beaches'),
(75, 'h', 'p', 'po', 'Events'),
(76, 'jhytuytuy', 'yutu', 'ytuyt', 'Restaurants'),
(77, 'shakeys', 'robinsons', 'gjhg', 'Restaurants');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) DEFAULT NULL,
  `user_lastname` varchar(50) DEFAULT NULL,
  `user_address` varchar(50) DEFAULT NULL,
  `user_contact_info` int(12) DEFAULT NULL,
  `user_email_address` varchar(50) DEFAULT NULL,
  `user_username` varchar(50) DEFAULT NULL,
  `user_password` varchar(50) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_lastname`, `user_address`, `user_contact_info`, `user_email_address`, `user_username`, `user_password`, `date`) VALUES
(1, 'Cherilyn', 'Abala', 'Brgy.Camvertudes Alang-Alang,Leyte', 910926789, 'aztyigsiege@gmail.com', 'anime6url_max', 'admin', '0000-00-00 00:00:00'),
(4, 'Siege', 'Capulet', 'Neo Verona', 8765765, 'neo_verona@yahoo.com', 'Siege_capulet', 'capulet', '0000-00-00 00:00:00'),
(18, 'uyiuyt', 'uyiu', 'yiiiuyh', 666685, 'jhltyhgf', 'joy', 'joy', '2013-05-07 08:52:36'),
(19, 'tripq', 'ko ', 'la', 575, 'kon@nadarait', 'may', 'may', '2013-05-07 14:12:44'),
(20, 'Reiko', 'Heike', 'brgy.dreamland', 275587, 'aztigsiege_1596@yahoo.com', 'reik', 'reik', '2013-05-08 11:11:08'),
(21, 'de', 'de', 'de', 5677, 'sdsdf', 're', 're', '2013-05-08 16:26:32'),
(22, 'Sakura', 'Kinomoyto', 'Tokyo,Japan', 2345, 'sakura_cute@yahoo.com', 'sakura', 'sakura', '2013-05-14 09:19:14'),
(24, 'cherry', 'abala', 'g', 56756, 'aztigsiege_1596@yahoo.com', 'animne', 'admin', '2013-05-20 10:44:02'),
(32, 'Mary Anne', 'Pore', 'Alangalang', 2147483647, 'mary_annepore@yahoo.com', 'anne', 'anne', '2013-05-20 16:15:20');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fave_places`
--
ALTER TABLE `fave_places`
  ADD CONSTRAINT `fave_places_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fave_places_ibfk_2` FOREIGN KEY (`places_id`) REFERENCES `places_TLAIB` (`places_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invite`
--
ALTER TABLE `invite`
  ADD CONSTRAINT `invite_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invite_ibfk_2` FOREIGN KEY (`events_id`) REFERENCES `events_tbl` (`events_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `like_places`
--
ALTER TABLE `like_places`
  ADD CONSTRAINT `like_places_ibfk_1` FOREIGN KEY (`places_like`) REFERENCES `places_TLAIB` (`places_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `like_places_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
