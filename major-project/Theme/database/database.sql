DROP DATABASE IF EXISTS major_project;
CREATE DATABASE major_project
--  Database: `major_project`

-- 1.
DROP TABLE if exists candidate_login;
CREATE TABLE `candidate_login` (
  `candidate_id` int(11) NOT NULL,
  `candidate_username` varchar(250) NOT NULL,
  `candidate_password` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `candidate_login` (`candidate_id`, `candidate_username`, `candidate_password`, `status`) VALUES
(1, 'student', 'student', 0),
(2, 'gits', 'gits', 0),
(3, 'user', 'user', 0);

ALTER TABLE `candidate_login`
  ADD PRIMARY KEY (`candidate_id`),
  ADD UNIQUE KEY `candidate_username` (`candidate_username`);

ALTER TABLE `candidate_login`
  MODIFY `candidate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

-- 2.
DROP TABLE if exists examiner_login;
CREATE TABLE `examiner_login` (
  `examiner_id` int(11) NOT NULL,
  `examiner_username` varchar(200) NOT NULL,
  `examiner_password` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `examiner_login` (`examiner_id`, `examiner_username`, `examiner_password`, `status`) VALUES
(1, 'admin', 'admin', 0),
(2, 'examiner', 'examiner', 0);

ALTER TABLE `examiner_login`
  ADD PRIMARY KEY (`examiner_id`),
  ADD UNIQUE KEY `examiner_username` (`examiner_username`);

ALTER TABLE `examiner_login`
  MODIFY `examiner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

-- 3.
DROP TABLE if exists category;
CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `examiner_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `category` (`id`, `title`, `examiner_id`, `status`) VALUES
(1, 'CATEGORY 1', 1, 0),
(2, 'CATEGORY 2', 2, 0);

ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

-- 4.
DROP TABLE if exists question;
CREATE TABLE `question` (
  `question_id` int(11) NOT NULL,
  `question_text` varchar(200) NOT NULL,
  `answer_id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`);

ALTER TABLE `question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

-- 5.
DROP TABLE if exists answer;
CREATE TABLE `answer` (
  `answer_id` int(11) NOT NULL,
  `answer_text` varchar(200) NOT NULL,
  `question_id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

ALTER TABLE `answer`
  ADD PRIMARY KEY (`answer_id`);

ALTER TABLE `answer`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

-- 6.
DROP TABLE if exists active_exams;
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

ALTER TABLE `active_exams`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `active_exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

-- 7.
DROP TABLE if exists exam_applicant;
CREATE TABLE `exam_applicant` (
  `id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `exam_applicant`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `exam_applicant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

-- 8.
DROP TABLE if exists report;
CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `report` varchar(2000) NOT NULL,
  `time_remaining` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
