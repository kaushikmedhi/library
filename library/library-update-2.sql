-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 17, 2021 at 06:57 PM
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
  `b_description` longtext NOT NULL,
  `quantity` int(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `year` int(255) NOT NULL,
  `category` varchar(2552) NOT NULL,
  `isbn` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`b_name`, `b_description`, `quantity`, `author`, `year`, `category`, `isbn`, `photo`, `language`) VALUES
('Data Struct & Algorithm Analysis in C | Second Edition', 'In the second edition of this best-selling book, the author continues to refine and enhance his innovative approach to algorithms and data structures. Using a C implementation, he highlights conceptual topics, focusing on ADTs and the analysis of algorithms for efficiency as well as performance and running time.', 5, 'Mark Allen Weiss', 2006, 'Computer Science', ' 8177583581', 'uploads/6144e2ea5edb56.06720442.jpg', 'English'),
('Let Us C', 'For C language programmers, it is must to master the complexity of the language to deal with programming software in engineering, gaming and other fields. In order to understand each concept of the C language, it is necessary to follow a good reference book in easy-to-understand text.', 8, ' Yashavant Kanetkar ', 2016, 'Computer Science', ' 8183331637', 'uploads/6144e08c47a1b5.84170987.jpg', 'English'),
('Harry Potter and the Philosophers Stone', 'Harry Potter has never even heard of Hogwarts when the letters start dropping on the doormat at number four, Privet Drive. Addressed in green ink on yellowish parchment with a purple seal, they are swiftly confiscated by his grisly aunt and uncle. Then, on Harrys eleventh birthday, a great beetle-eyed giant of a man called Rubeus Hagrid bursts in with some astonishing news: Harry Potter is a wizard, and he has a place at Hogwarts School of Witchcraft and Wizardry. The magic starts here!', 3, 'J K Rowling', 2014, 'Fiction', ' 9781408855652', 'uploads/6144e1f54af7c2.18037110.jpg', 'English'),
('UNIX : Concepts and Applications | 4th Edition', 'This book is both an exhaustive reference and an outstanding guide for the beginner. Real-world examples make new concepts easy to grasp while the practice exercises take comprehension to a new level by forcing the user to think. An unparalleled reference apparatus, this is a book that users will reach for now and for years to come. ', 5, 'Sumitabha Das', 2017, 'Computer Science', '0070635463', 'uploads/6144e01adb4151.69795281.jpg', 'English'),
('Computer Fundamentals : Concepts, Systems & Applications- 8th Edition ', 'P K Sinha designed Computer Fundamentals to introduce its readers to important concepts in Computer Science. Computer Fundamentals is written in a manner that it can be used as a textbook for many introductory courses related to IT and Computer Science. For beginners, it is useful because of its sheer simplicity and explanation of fundamentals.', 6, 'P K Sinha', 2004, 'Computer Science', '8176567523', 'uploads/6144dfa5f3b413.59639905.jpg', 'English'),
('The Alchemist', 'Paulo Coelhos enchanting novel has inspired a devoted following around the world. This story, dazzling in its powerful simplicity and inspiring wisdom, is about an Andalusian shepherd boy named Santiago who travels from his homeland in Spain to the Egyptian desert in search of a treasure buried in the Pyramids. ', 4, 'Paulo Coelho', 2005, 'Fiction', '9788172234980', 'uploads/6144e145ba2f09.70305756.jpg', 'english');

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
(30, 100043, 1455, '2021-09-17', '2021-12-17', 'ACQ'),
(29, 100021, 1458, '2021-08-17', '2021-11-17', 'ACQ'),
(28, 100022, 1453, '2021-09-17', '2021-12-17', 'ACQ'),
(27, 100032, 1453, '2021-06-15', '2021-09-15', 'ACQ');

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
  `isbn` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book_status`
--

INSERT INTO `book_status` (`b_id`, `isbn`, `status`) VALUES
(100021, '8176567523', 1),
(100022, '8176567523', 1),
(100023, '8176567523', 0),
(100024, '8176567523', 0),
(100025, '8176567523', 0),
(100026, '8176567523', 0),
(100027, '0070635463', 0),
(100028, '0070635463', 0),
(100029, '0070635463', 0),
(100030, '0070635463', 0),
(100031, '0070635463', 0),
(100032, ' 8183331637', 1),
(100033, ' 8183331637', 0),
(100034, ' 8183331637', 0),
(100035, ' 8183331637', 0),
(100036, ' 8183331637', 0),
(100037, ' 8183331637', 0),
(100038, ' 8183331637', 0),
(100039, ' 8183331637', 0),
(100040, '9788172234980', 0),
(100041, '9788172234980', 0),
(100042, '9788172234980', 0),
(100043, '9788172234980', 1),
(100045, ' 9781408855652', 0),
(100046, ' 9781408855652', 0),
(100047, ' 9781408855652', 0),
(100048, ' 8177583581', 0),
(100049, ' 8177583581', 0),
(100050, ' 8177583581', 0),
(100051, ' 8177583581', 0),
(100052, ' 8177583581', 0);

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
  `del_id` int(100) NOT NULL,
  `b_id` int(100) NOT NULL,
  `isbn` varchar(255) NOT NULL,
  `b_name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `reason` enum('Lost','Damaged') NOT NULL,
  `by_person` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `delete_book`
--

INSERT INTO `delete_book` (`del_id`, `b_id`, `isbn`, `b_name`, `date`, `reason`, `by_person`) VALUES
(4, 100053, ' 8177583581', 'Data Struct ', '2017-09-21', 'Lost', 'Kaushik Medhi'),
(5, 100044, '9788172234980', 'The Alchemist', '2017-09-21', 'Damaged', 'Walter White');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `s_id` int(255) NOT NULL,
  `s_name` varchar(2552) NOT NULL,
  `s_password` varchar(255) NOT NULL,
  `s_email` varchar(255) NOT NULL,
  `s_phone` varchar(100) NOT NULL,
  `s_address` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_id`, `s_name`, `s_password`, `s_email`, `s_phone`, `s_address`, `department`) VALUES
(1451, 'Kaushik Medhi', 'kaushik123', 'kaushik@gmail.com', '9990098989', 'Tezpur', 'MCA'),
(1452, 'Anirban Dev Sharma', 'anirban123', 'anirban@gmail.com', '8987676546', 'Jorhat', 'MCA'),
(1453, 'Jugantar Kashyap', 'jugantar123', 'jugantar@gmail.com', '8767890987', 'Guwahati', 'CIV'),
(1454, 'Meghna Dutta', 'meghna123', 'meghna@gmail.com', '7787876787', 'Guwahati', 'CSE'),
(1455, 'Ankur Das', 'ankur123', 'ankur@gmail.com', '9909876546', 'Guwahati', 'MEC'),
(1456, 'Rajkumar Dutta', 'rajkumar123', 'rajkumar@gmail.com', '8987898767', 'Jorhat', 'EEE'),
(1457, 'Jethalal Gada', 'jethalal123', 'jethalal@gmail.com', '9909876789', 'Jorhat', 'MEC'),
(1458, 'Walter White', 'walter123', 'walter@gmail.com', '8898909876', 'Tezpur', 'CIV'),
(1459, 'Saitama', 'saitama123', 'saitama@gmail.com', '8987676567', 'Jorhat', 'CSE');

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
-- Indexes for table `delete_book`
--
ALTER TABLE `delete_book`
  ADD PRIMARY KEY (`del_id`);

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
  MODIFY `transaction_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `book_status`
--
ALTER TABLE `book_status`
  MODIFY `b_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100054;

--
-- AUTO_INCREMENT for table `delete_book`
--
ALTER TABLE `delete_book`
  MODIFY `del_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `s_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1460;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
