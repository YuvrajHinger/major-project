DROP DATABASE IF EXISTS major_project;
CREATE DATABASE major_project
--  Database: `major_project`

-- 1.
CREATE TABLE `candidate_login` (
  `candidate_id` int(11) NOT NULL,
  `candidate_username` varchar(250) NOT NULL,
  `candidate_password` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `candidate_login` (`candidate_id`, `candidate_username`, `candidate_password`, `status`) VALUES
(1, 'student', 'student', 0),
(2, 'gits', 'gits', 0);

ALTER TABLE `candidate_login`
  ADD PRIMARY KEY (`candidate_id`),
  ADD UNIQUE KEY `candidate_username` (`candidate_username`);

ALTER TABLE `candidate_login`
  MODIFY `candidate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

-- 2.
CREATE TABLE `examiner_login` (
  `examiner_id` int(11) NOT NULL,
  `examiner_username` varchar(200) NOT NULL,
  `examiner_password` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `examiner_login` (`examiner_id`, `examiner_username`, `examiner_password`, `status`) VALUES
(1, 'admin', 'admin', 0);

ALTER TABLE `examiner_login`
  ADD PRIMARY KEY (`examiner_id`),
  ADD UNIQUE KEY `examiner_username` (`examiner_username`);

ALTER TABLE `examiner_login`
  MODIFY `examiner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

-- 3.
CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `examiner_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `category` (`id`, `title`, `examiner_id`, `status`) VALUES
(1, 'Title 1', 1, 0),
(2, 'Title 2', 1, 0);

ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

-- 4.
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
(3, 'CSS Stands For', 8, 1, 0);

ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`);

ALTER TABLE `question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

-- 5.
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
(11, 'cascading style show', 3, 1, 0);

ALTER TABLE `answer`
  ADD PRIMARY KEY (`answer_id`);

ALTER TABLE `answer`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;