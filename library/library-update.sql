-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 16, 2021 at 08:16 AM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` int(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `password`, `name`, `phone`, `email`) VALUES
(1, 'admin', 'admin', 1234567890, 'aa@aa.aa');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `b_name` varchar(255) NOT NULL,
  `b_description` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `year` int(255) NOT NULL,
  `category` varchar(2552) NOT NULL,
  `isbn` int(30) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`b_name`, `b_description`, `quantity`, `author`, `year`, `category`, `isbn`, `photo`, `language`) VALUES
('something', 'test', 1, 'newton', 2021, 'literature', 1111, 'uploads/60f2c869cb76f7.51305721.jpg', 'hindi'),
('Let us C', 'Programming', 5, 'Yashwant Kanitker', 2006, 'Programming', 1993, 'uploads/60eeda2f227875.72732199.png', 'English'),
('The Alchemist ', 'Paulo Coelhos enchanting novel.', 4, 'Paulo Coelho', 2005, 'Literarture', 45500, 'uploads/613aed53a8d972.96482940.jpg', 'English');

-- --------------------------------------------------------

--
-- Table structure for table `book_issue`
--

CREATE TABLE `book_issue` (
  `transaction_id` bigint(20) NOT NULL,
  `b_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `issue_date` date NOT NULL,
  `return_date` date NOT NULL,
  `issue_status` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book_issue`
--

INSERT INTO `book_issue` (`transaction_id`, `b_id`, `s_id`, `issue_date`, `return_date`, `issue_status`) VALUES
(18, 100001, 1447, '2021-07-14', '2021-10-14', 'ACQ'),
(20, 100002, 1444, '2021-07-17', '2021-10-17', 'RET'),
(21, 100009, 1444, '2021-07-17', '2021-10-17', 'ACQ'),
(22, 100011, 1444, '2021-09-10', '2021-12-10', 'RET'),
(24, 100003, 1444, '2021-09-12', '2021-12-12', 'ACQ'),
(25, 100014, 1444, '2021-09-12', '2021-12-12', 'ACQ'),
(26, 100004, 1444, '2021-09-12', '2021-12-12', 'RET');

--
-- Triggers `book_issue`
--
DELIMITER $$
CREATE TRIGGER `status_issued` AFTER INSERT ON `book_issue` FOR EACH ROW UPDATE `book_status` SET `status` = 1
WHERE `b_id` = NEW.b_id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `status_returned` AFTER UPDATE ON `book_issue` FOR EACH ROW BEGIN
  	IF(NEW.issue_status!=OLD.issue_status AND 	NEW.issue_status = 'RET') THEN
    	UPDATE book_status SET status = 0 WHERE b_id = NEW.b_id;

	END IF;    
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `book_status`
--

CREATE TABLE `book_status` (
  `b_id` int(255) NOT NULL,
  `isbn` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book_status`
--

INSERT INTO `book_status` (`b_id`, `isbn`, `status`) VALUES
(100001, '1993', 1),
(100003, '1993', 1),
(100005, '1993', 0),
(100006, '1993', 0),
(100007, '1993', 0),
(100012, '45500', 0),
(100009, '1111', 1),
(100014, '45500', 1),
(100018, '45500', 0),
(100019, '45500', 0);

--
-- Triggers `book_status`
--
DELIMITER $$
CREATE TRIGGER `decrease_quantity_of _books` AFTER DELETE ON `book_status` FOR EACH ROW UPDATE `books` set quantity = quantity-1 where isbn = OLD.isbn
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `delete_book`
--

CREATE TABLE `delete_book` (
  `b_id` int(100) NOT NULL,
  `isbn` int(100) NOT NULL,
  `b_name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `reason` enum('Lost','Damaged') NOT NULL,
  `by_person` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `delete_book`
--

INSERT INTO `delete_book` (`b_id`, `isbn`, `b_name`, `date`, `reason`, `by_person`) VALUES
(100020, 45500, 'The Alchemist ', '2016-09-21', 'Lost', 'Meghna Dutta'),
(100013, 45500, 'The Alchemist ', '2016-09-21', 'Lost', 'Kaushik Medhi');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `s_id` int(255) NOT NULL,
  `s_name` varchar(2552) NOT NULL,
  `s_password` varchar(255) NOT NULL,
  `s_email` varchar(255) NOT NULL,
  `s_phone` int(255) NOT NULL,
  `s_address` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_id`, `s_name`, `s_password`, `s_email`, `s_phone`, `s_address`, `department`) VALUES
(1444, 'Kaushik Medhi', 'k', 'k@m.com', 78998798, 'JKJSHkshKJSH', 'MCA'),
(1445, 'Meghna Dutta', '', 'meghna@gmail.com', 1234567, 'Assam', 'MCA'),
(1446, 'Ankur Das', '', 'ankur@gmail.com', 1234567, 'Assam', 'MCA'),
(1447, 'Anirban Sharma', 'a', 'anirban@gmail.com', 1234567, 'Assam', 'MCA'),
(1448, 'test student6', 'test', 'test@t.s', 998988981, 'test add6', 'CSE'),
(1449, 'aaaa', 'aaa', 'aaa@aa.d', 888888888, 'djdhdhd', 'MEC'),
(1450, 'aaaaaaa', 'aaa', 'aaa@aa.aa', 999999999, 'ajajaja', 'CIV');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`isbn`);

--
-- Indexes for table `book_issue`
--
ALTER TABLE `book_issue`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `b_id` (`b_id`),
  ADD KEY `s_id` (`s_id`);

--
-- Indexes for table `book_status`
--
ALTER TABLE `book_status`
  ADD PRIMARY KEY (`b_id`),
  ADD KEY `isbn` (`isbn`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`s_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `book_issue`
--
ALTER TABLE `book_issue`
  MODIFY `transaction_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `book_status`
--
ALTER TABLE `book_status`
  MODIFY `b_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100021;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `s_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1451;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
