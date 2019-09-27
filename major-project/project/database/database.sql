CREATE TABLE `answer` (
  `answer_id` int(11) NOT NULL,
  `answer_text` varchar(200) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `answer` (`answer_id`, `answer_text`, `exam_id`, `status`) VALUES
(1, 'Hyper Text Markup Language', 1, 0),
(2, 'High Text Markup Language', 1, 0),
(3, 'Hyper Text Make Language', 1, 0),
(4, 'High-Level Textual Markup Language', 1, 0),
(5, 'Javascript', 1, 0),
(6, 'JavaStyle', 1, 0),
(7, 'JavaSide', 1, 0);

CREATE TABLE `candidate_login` (
  `candidate_id` int(11) NOT NULL,
  `candidate_username` varchar(250) NOT NULL,
  `candidate_password` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `candidate_login` (`candidate_id`, `candidate_username`, `candidate_password`, `status`) VALUES
(1, 'student', 'student', 0),
(2, 'gits', 'gits', 0);

CREATE TABLE `exam` (
  `exam_id` int(11) NOT NULL,
  `exam_title` varchar(200) NOT NULL,
  `exam_purpose` varchar(200) NOT NULL,
  `exam_type` varchar(200) NOT NULL,
  `exam_duration` time NOT NULL,
  `timer_mode` varchar(200) NOT NULL,
  `examiner_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `exam` (`exam_id`, `exam_title`, `exam_purpose`, `exam_type`, `exam_duration`, `timer_mode`, `examiner_id`, `status`) VALUES
(1, 'Title1', 'Purpose1', 'MCQ', '01:00:00', 'Overall', 1, 0),
(2, 'Title2', 'Purpose2', 'MCQ', '02:00:00', 'Overall', 1, 0),
(3, 'Title3', 'Purpose3', 'MCQ', '02:30:00', 'Overall', 1, 0);

CREATE TABLE `examiner_login` (
  `examiner_id` int(11) NOT NULL,
  `examiner_username` varchar(200) NOT NULL,
  `examiner_password` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `examiner_login` (`examiner_id`, `examiner_username`, `examiner_password`, `status`) VALUES
(1, 'admin', 'admin', 0);

CREATE TABLE `question` (
  `question_id` int(11) NOT NULL,
  `question_text` varchar(200) NOT NULL,
  `answer_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `question` (`question_id`, `question_text`, `answer_id`, `exam_id`, `status`) VALUES
(1, 'HTML Stands For', 1, 1, 0),
(2, 'JS Stands For', 5, 1, 0);

ALTER TABLE `answer`
  ADD PRIMARY KEY (`answer_id`);

ALTER TABLE `candidate_login`
  ADD PRIMARY KEY (`candidate_id`),
  ADD UNIQUE KEY `EMAIL` (`candidate_username`);

ALTER TABLE `exam`
  ADD PRIMARY KEY (`exam_id`),
  ADD UNIQUE KEY `exam_title` (`exam_title`);

ALTER TABLE `examiner_login`
  ADD PRIMARY KEY (`examiner_id`),
  ADD UNIQUE KEY `examiner_username` (`examiner_username`);

ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`);

ALTER TABLE `answer`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE `candidate_login`
  MODIFY `candidate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `exam`
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `examiner_login`
  MODIFY `examiner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
