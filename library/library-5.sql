-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 25, 2021 at 02:45 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `password`, `name`, `phone`, `email`) VALUES
(1, 'admin', 'admin', 1234567890, 'aa@aa.aa');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `b_name` varchar(255) NOT NULL,
  `b_description` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `year` int(255) NOT NULL,
  `category` varchar(2552) NOT NULL,
  `isbn` int(30) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL,
  PRIMARY KEY (`isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`b_name`, `b_description`, `quantity`, `author`, `year`, `category`, `isbn`, `photo`, `language`) VALUES
('Node.js', 'Programming', 10, 'whatever', 2010, 'Programming', 1992, 'uploads/60cefe53c5dd94.98713064.png', 'English'),
('Flask', 'Programming', 15, 'Jugantar', 2010, 'Programming', 6121, 'uploads/60ccf67f08a2e6.58247174.png', 'English'),
('Django', 'Programming', 15, 'Whomever', 2010, 'Programming', 6454, 'uploads/60ccf61f53f215.48680638.png', 'English');

-- --------------------------------------------------------

--
-- Table structure for table `book_issue`
--

DROP TABLE IF EXISTS `book_issue`;
CREATE TABLE IF NOT EXISTS `book_issue` (
  `b_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `issue_date` varchar(20) NOT NULL,
  `return_date` varchar(20) NOT NULL,
  PRIMARY KEY (`b_id`),
  KEY `s_id` (`s_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Triggers `book_issue`
--
DROP TRIGGER IF EXISTS `status_issued`;
DELIMITER $$
CREATE TRIGGER `status_issued` AFTER INSERT ON `book_issue` FOR EACH ROW UPDATE `book_status` SET `status` = 1
WHERE `b_id` = NEW.b_id
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `status_returned`;
DELIMITER $$
CREATE TRIGGER `status_returned` AFTER DELETE ON `book_issue` FOR EACH ROW UPDATE `book_status` SET `status` = 0
WHERE `b_id` = OLD.b_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `book_status`
--

DROP TABLE IF EXISTS `book_status`;
CREATE TABLE IF NOT EXISTS `book_status` (
  `b_id` int(11) NOT NULL,
  `isbn` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`b_id`),
  KEY `isbn` (`isbn`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book_status`
--

INSERT INTO `book_status` (`b_id`, `isbn`, `status`) VALUES
(1888, '1992', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `s_id` int(255) NOT NULL AUTO_INCREMENT,
  `s_name` varchar(2552) NOT NULL,
  `s_email` varchar(255) NOT NULL,
  `s_phone` int(255) NOT NULL,
  `s_address` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1445 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_id`, `s_name`, `s_email`, `s_phone`, `s_address`, `department`) VALUES
(1444, 'Kaushik Medhi', 'k@m.com', 78998798, 'JKJSHkshKJSH', 'MCA');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
