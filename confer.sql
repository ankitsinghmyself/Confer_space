-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2019 at 01:26 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `confer`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `uname` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`uname`, `password`) VALUES
('', ''),
('admin', 'admin'),
('sheela', '123');

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `aid` int(11) NOT NULL,
  `answer` text NOT NULL,
  `qid` int(11) NOT NULL,
  `userid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`aid`, `answer`, `qid`, `userid`) VALUES
(2, 'morning 8 am', 3, 'sheeku'),
(4, '8 am', 1, 'askeee'),
(6, '5 subjects', 2, 'anki'),
(7, '3 lab per semester', 4, 'anki'),
(8, '3 year\r\n', 5, 'anki'),
(9, '22 students', 6, 'anki'),
(10, 'almost 359 students.', 57, 'anki'),
(11, '8', 1, 'sheeku'),
(12, '6AM to 4pm', 1, 'anki'),
(14, 'Fine', 58, 'anki'),
(15, 'Sleep mode is a low power mode for electronic devices such as computers, televisions, and remote controlled devices. These modes save significantly on electrical consumption compared to leaving a device fully on and, upon resume, allow the user to avoid having to reissue instructions or to wait for a machine to reboot.', 59, 'ankit1994');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notifid` int(10) NOT NULL,
  `notification` text NOT NULL,
  `uid` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'unread',
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `qid` int(11) NOT NULL,
  `question` text NOT NULL,
  `userid` varchar(20) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`qid`, `question`, `userid`, `date`) VALUES
(1, 'timing of college canteen?', 'askeee', '2019-04-27 09:32:46'),
(2, 'subjects in first semester?', 'renu', '2019-04-27 09:30:14'),
(3, 'timing of the classes?', 'anki', '2019-04-27 09:30:14'),
(4, 'number of labs per semester?', 'sheeku', '2019-04-27 09:30:14'),
(5, 'duration of the course?', 'archi', '2019-04-27 09:30:14'),
(6, 'what\'s the maximum strength of 1st semester?', 'askeee', '2019-04-27 09:36:59'),
(57, 'how many students are in mca dept?', 'anki', '2019-05-01 09:02:58'),
(58, 'How are you?', 'sheeku', '2019-05-02 21:25:50'),
(59, 'What is the purpose of keeping electronic devices such as computers televisions and remote controlled devices on sleep mode?', 'ankit1994', '2019-05-02 23:11:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` varchar(20) NOT NULL,
  `name` varchar(256) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `name`, `password`, `email`, `mobile`, `gender`) VALUES
('anki', 'ankit singh', 'ankit', 'ank@g.com', 9479396742, 'Male'),
('ankit1994', 'Ankit Singh', '123456', 'ankitsinghmyself@gmail.com', 9479396742, 'Male'),
('archi', 'archana', '123', 'arch@gmail.com', 2087654321, 'Female'),
('askeee', 'Astha', '123', 'askee@gmail.com', 9087654321, 'Male'),
('renu', 'renuka', '123', 'renu@gmail.com', 789054321, 'Male'),
('sheeku', 'Sheela Kumari', 'sheela', 'shee@gmail.com', 987654322, 'Female');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`uname`);

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`aid`),
  ADD KEY `qid` (`qid`),
  ADD KEY `userid` (`userid`(10)),
  ADD KEY `userid_2` (`userid`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notifid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`qid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notifid` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `admin` (`uname`),
  ADD CONSTRAINT `notifications_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `users` (`userid`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
