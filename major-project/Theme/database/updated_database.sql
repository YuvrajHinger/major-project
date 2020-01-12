-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2020 at 02:03 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `major_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `active_exams`
--

CREATE TABLE `active_exams` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `duration` time NOT NULL,
  `purpose` varchar(100) NOT NULL,
  `total_question` int(11) NOT NULL,
  `total_marks` int(11) NOT NULL,
  `exam_key` varchar(100) NOT NULL,
  `negative_marking` varchar(100) NOT NULL,
  `questions` varchar(200) NOT NULL,
  `examiner_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `active_exams`
--

INSERT INTO `active_exams` (`id`, `title`, `date`, `time`, `duration`, `purpose`, `total_question`, `total_marks`, `exam_key`, `negative_marking`, `questions`, `examiner_id`, `status`) VALUES
(1, 'WEB DEVELOPMENT', '2019-10-10', '20:30:00', '00:05:00', 'Testing', 5, 10, '12345678', 'yes', 'id1id2id3id5id6', 1, 0),
(2, 'python', '2019-12-04', '12:00:00', '00:05:00', 'time pass', 5, 5, '1234', 'yes', 'id1id2id3id8id4', 1, 0),
(3, 'wipro', '2019-12-04', '11:00:00', '10:00:00', 'wipro ', 10, 50, '123', 'yes', 'id1id2id3id8id9id10id4id5id6id7', 1, 0),
(4, 'testing1', '2019-12-05', '10:00:00', '00:05:00', '1234', 5, 5, '1234', 'no', 'id1id2id3id8id9', 1, 0),
(5, 'testing 1', '2019-12-08', '10:00:00', '00:05:00', '1234', 5, 50, '1234', 'yes', 'id1id2id3id8id9', 1, 0),
(6, 'testing 123', '2019-12-18', '01:00:00', '00:10:00', 'testing 123', 10, 100, '123', 'no', 'id1id2id3id8id9id10id4id5id6id7', 1, 0),
(7, '13 jan', '2020-01-13', '01:00:00', '01:00:00', 'testing', 5, 10, 'monday', 'yes', 'id5id6id7id10id9', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `answer_id` int(11) NOT NULL,
  `answer_text` varchar(200) NOT NULL,
  `question_id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`answer_id`, `answer_text`, `question_id`, `category`, `status`) VALUES
(1, 'Hyper Text Markup Language', 1, 1, 0),
(2, 'High Text Markup Language', 1, 1, 0),
(3, 'Hyper Text Make Language', 1, 1, 0),
(4, 'High-Level Textual Markup Language', 1, 1, 0),
(5, 'Javascript', 2, 1, 0),
(6, 'JavaStyle', 2, 1, 0),
(7, 'JavaSide', 2, 1, 0),
(8, 'cascading style sheet', 3, 1, 0),
(9, 'cascade style show', 3, 1, 0),
(10, 'casecade style sheet', 3, 1, 0),
(11, 'cascading style show', 3, 1, 0),
(12, 'World Wide Web', 4, 2, 0),
(13, 'whole wide web', 4, 2, 0),
(14, 'hyper text transfer protocol', 5, 2, 0),
(15, 'high text transfer protocol', 5, 2, 0),
(16, 'high text transfer prototype', 5, 2, 0),
(17, 'hypertext preprocessor', 6, 2, 0),
(18, 'preprocessor hypertext', 6, 2, 0),
(19, 'pre-compiled hyper-text', 6, 2, 0),
(20, 'c is procedural language', 7, 2, 0),
(21, 'c follow concept of  object oriented programming', 7, 2, 0),
(22, 'c introduce abstraction and inheritance', 7, 2, 0),
(23, 'computer science engineering', 8, 1, 0),
(24, 'computer science engineer', 8, 1, 0),
(25, 'computer system engineering', 8, 1, 0),
(26, 'LIFO', 9, 1, 0),
(27, 'FIFO', 9, 1, 0),
(28, 'Both', 9, 1, 0),
(29, 'FIFO', 10, 1, 0),
(30, 'LIFO', 10, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `candidate_login`
--

CREATE TABLE `candidate_login` (
  `candidate_id` int(11) NOT NULL,
  `candidate_username` varchar(250) NOT NULL,
  `candidate_password` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidate_login`
--

INSERT INTO `candidate_login` (`candidate_id`, `candidate_username`, `candidate_password`, `status`) VALUES
(1, 'student', 'student', 0),
(2, 'gits', 'gits', 0),
(3, 'user', 'user', 0),
(4, 'abc', 'abc', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `examiner_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `examiner_id`, `status`) VALUES
(1, 'GENERAL APPTITUDE', 1, 0),
(2, 'PROGRAMMING', 1, 0),
(3, 'category 3', 1, 1),
(4, 'appt', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `examiner_login`
--

CREATE TABLE `examiner_login` (
  `examiner_id` int(11) NOT NULL,
  `examiner_username` varchar(200) NOT NULL,
  `examiner_password` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `examiner_login`
--

INSERT INTO `examiner_login` (`examiner_id`, `examiner_username`, `examiner_password`, `status`) VALUES
(1, 'admin', 'admin', 0),
(2, 'examiner', 'examiner', 0);

-- --------------------------------------------------------

--
-- Table structure for table `exam_applicant`
--

CREATE TABLE `exam_applicant` (
  `id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_applicant`
--

INSERT INTO `exam_applicant` (`id`, `exam_id`, `applicant_id`) VALUES
(1, 1, 3),
(2, 2, 3),
(3, 3, 3),
(4, 2, 1),
(5, 4, 3),
(6, 4, 1),
(7, 4, 2),
(8, 5, 3),
(9, 5, 1),
(10, 6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `question_id` int(11) NOT NULL,
  `question_text` varchar(200) NOT NULL,
  `answer_id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `question_text`, `answer_id`, `category`, `status`) VALUES
(1, 'HTML Stands For', 1, 1, 0),
(2, 'JS Stands For', 5, 1, 0),
(3, 'CSS Stands For', 8, 1, 0),
(4, 'WWW Stands For', 12, 2, 0),
(5, 'http stands for ..?', 14, 2, 0),
(6, 'php stands for . ?', 17, 2, 0),
(7, 'which statement is true about c programming language ?', 20, 2, 0),
(8, 'cse stands for ?', 23, 1, 0),
(9, 'stack follow concept of ?', 26, 1, 0),
(10, 'Queue Stands For ?', 29, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `report` varchar(2000) NOT NULL,
  `time_remaining` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `exam_id`, `applicant_id`, `report`, `time_remaining`) VALUES
(1, 1, 3, '[{"qid": "1","aid": "1"},{"qid": "2","aid": "5"},{"qid": "3","aid": "10"},{"qid": "5","aid": "14"},{"qid": "6","aid": "17"}]', 'Time Remaining:  00:04:36'),
(2, 2, 3, '[{"qid": "1","aid": "3"},{"qid": "2","aid": "5"},{"qid": "3","aid": "10"},{"qid": "8","aid": "23"},{"qid": "4","aid": "12"}]', 'Time Remaining:  00:04:03'),
(3, 3, 3, ']', 'Time Remaining:  9:60:23'),
(4, 2, 1, '[{"qid": "1","aid": "1"},{"qid": "2","aid": "5"},{"qid": "3","aid": "8"},{"qid": "8","aid": "23"},{"qid": "4","aid": "12"}]', 'Time Remaining:  00:00:33'),
(5, 4, 3, '[{"qid": "1","aid": "1"},{"qid": "2","aid": "5"},{"qid": "3","aid": "8"},{"qid": "8","aid": "23"},{"qid": "9","aid": "27"}]', 'Time Remaining:  00:04:36'),
(6, 4, 1, '[{"qid": "1","aid": "1"},{"qid": "3","aid": "8"},{"qid": "8","aid": "24"},{"qid": "9","aid": "26"}]', 'Time Remaining:  00:04:23'),
(7, 5, 3, '[{"qid": "1","aid": "1"},{"qid": "2","aid": "6"},{"qid": "3","aid": "8"},{"qid": "8","aid": "24"},{"qid": "9","aid": "28"}]', 'Time Remaining:  00:04:13'),
(8, 5, 1, '[{"qid": "1","aid": "1"},{"qid": "2","aid": "5"},{"qid": "3","aid": "8"},{"qid": "8","aid": "23"},{"qid": "9","aid": "26"}]', 'Time Remaining:  00:04:36'),
(9, 6, 3, '[{"qid": "1","aid": "1"},{"qid": "2","aid": "5"},{"qid": "3","aid": "8"},{"qid": "8","aid": "23"},{"qid": "9","aid": "26"},{"qid": "10","aid": "29"},{"qid": "4","aid": "12"},{"qid": "5","aid": "14"},{"qid": "6","aid": "17"},{"qid": "7","aid": "20"}]', 'Time Remaining:  00:08:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `active_exams`
--
ALTER TABLE `active_exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`answer_id`);

--
-- Indexes for table `candidate_login`
--
ALTER TABLE `candidate_login`
  ADD PRIMARY KEY (`candidate_id`),
  ADD UNIQUE KEY `candidate_username` (`candidate_username`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `examiner_login`
--
ALTER TABLE `examiner_login`
  ADD PRIMARY KEY (`examiner_id`),
  ADD UNIQUE KEY `examiner_username` (`examiner_username`);

--
-- Indexes for table `exam_applicant`
--
ALTER TABLE `exam_applicant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `active_exams`
--
ALTER TABLE `active_exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `candidate_login`
--
ALTER TABLE `candidate_login`
  MODIFY `candidate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `examiner_login`
--
ALTER TABLE `examiner_login`
  MODIFY `examiner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `exam_applicant`
--
ALTER TABLE `exam_applicant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
