-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 02, 2020 at 09:47 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

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
  `userid` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`userid`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `admin_notifications`
--

CREATE TABLE `admin_notifications` (
  `notifid` int(11) NOT NULL,
  `notification` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_notifications`
--

INSERT INTO `admin_notifications` (`notifid`, `notification`, `date`) VALUES
(6, 'user <b>kiran</b> joined Confer Space', '2019-05-03 13:23:59'),
(19, 'user <b>sheela</b> joined Confer Space', '2019-05-22 23:20:25'),
(20, 'user <b>ajanta</b> joined Confer Space', '2019-05-22 23:56:58'),
(21, 'user <b>ankit</b> joined Confer Space', '2020-03-02 13:22:16'),
(22, 'user <b>alokk</b> joined Confer Space', '2020-03-02 13:23:43');

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
(4, '8 am', 1, 'askeee'),
(6, 'hi askee', 1, 'anki'),
(23, 'not necessarily', 64, 'anuj'),
(24, 'around 4 to 5 months', 63, 'archi'),
(25, '6 months\r\n', 63, 'anki');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `qid` int(11) NOT NULL,
  `question` text NOT NULL,
  `userid` varchar(20) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`qid`, `question`, `userid`, `date`) VALUES
(1, 'timing of college canteen?', 'askeee', '2019-04-27 09:32:46'),
(5, 'duration of the course?', 'archi', '2019-04-27 09:30:14'),
(60, 'what is the timing of class?', 'anki', '2019-05-02 21:18:25'),
(63, 'what is the duration of each semester?', 'anuj', '2019-05-03 10:56:00'),
(64, 'Are Saturdays holiday? ', 'archi', '2019-05-03 11:09:48'),
(68, 'hi', 'anki', '2020-02-28 12:32:54');

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
('alokk', 'alok kumar', '1234', 'alok@gmail.com', 9479396744, 'Male'),
('anisa', 'anisa rani', '12345', 'ani@gmail.com', 9087654321, 'Female'),
('anki', 'ankit', '1234', 'ank@g.com', 9479396742, 'Male'),
('ankit', 'ankit', '546', '123', 123, 'Male'),
('anuj', 'anuj srivastav', '123', 'anuj@gmail.com', 8907654321, 'Male'),
('archi', 'archana', '123', 'arch@gmail.com', 2087654321, 'Female'),
('askeee', 'Astha', '123', 'askee@gmail.com', 9087654321, 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `user_notifications`
--

CREATE TABLE `user_notifications` (
  `notifid` int(11) NOT NULL,
  `notification` text NOT NULL,
  `userid` varchar(20) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_notifications`
--

INSERT INTO `user_notifications` (`notifid`, `notification`, `userid`, `date`) VALUES
(1, 'Welcome to Confer Space', 'anki', '2019-05-02 21:27:55'),
(2, 'Welcome to Confer Space ', 'archi', '2019-05-02 21:27:55'),
(3, 'Welcome to Confer Space', 'askeee', '2019-05-02 21:27:55'),
(19, 'User <b>anki</b> answered your question : <b>hello</b><br/>Answer: <b>hi there</b>', 'anki', '2019-05-02 22:49:49'),
(21, 'Welcome to Confer Space', 'anisa', '2019-05-02 23:01:02'),
(22, 'User <b>renu</b> answered your question : <b>duration of the course?</b><br/>Answer: <b>three years\r\n</b>', 'archi', '2019-05-02 23:42:06'),
(23, 'User <b>anki</b> answered your question : <b>timings for web lab sem 4?\r\n</b><br/>Answer: <b>8 am to 10:40 am</b>', 'anki', '2019-05-03 10:37:39'),
(24, 'Welcome to Confer Space', 'anuj', '2019-05-03 10:44:07'),
(25, 'User <b>anuj</b> answered your question : <b>Are Saturdays holiday? </b><br/>Answer: <b>not necessarily</b>', 'archi', '2019-05-03 11:10:26'),
(26, 'User <b>archi</b> answered your question : <b>what is the duration of each semester?</b><br/>Answer: <b>around 4 to 5 months</b>', 'anuj', '2019-05-03 11:11:05'),
(28, 'User <b>kiran</b> answered your question : <b>who am i?</b><br/>Answer: <b>fool</b>', 'anuj', '2019-05-03 13:24:22'),
(29, 'User <b>anki</b> answered your question : <b>who am i?</b><br/>Answer: <b>hey there\r\n</b>', 'anuj', '2019-05-03 13:51:57'),
(30, 'User <b>anki</b> answered your question : <b>what is the duration of each semester?</b><br/>Answer: <b>6 months\r\n</b>', 'anuj', '2019-05-09 13:11:25'),
(31, 'User <b>sheeku</b> answered your question : <b>timings for web lab sem 4?\r\n</b><br/>Answer: <b>8</b>', 'anki', '2019-05-22 21:57:44'),
(35, 'User <b>sheela</b> answered your question : <b>Are Saturdays holiday? </b><br/>Answer: <b>funny</b>', 'archi', '2019-05-22 23:21:03'),
(38, 'User <b>ajanta</b> answered your question : <b>Are Saturdays holiday? </b><br/>Answer: <b>funny</b>', 'archi', '2019-05-22 23:57:49'),
(40, 'Welcome to Confer Space', 'ankit', '2020-03-02 13:22:16'),
(41, 'Welcome to Confer Space', 'alokk', '2020-03-02 13:23:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `admin_notifications`
--
ALTER TABLE `admin_notifications`
  ADD PRIMARY KEY (`notifid`);

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`aid`),
  ADD KEY `qid` (`qid`),
  ADD KEY `userid` (`userid`(10)),
  ADD KEY `userid_2` (`userid`);

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
-- Indexes for table `user_notifications`
--
ALTER TABLE `user_notifications`
  ADD PRIMARY KEY (`notifid`),
  ADD KEY `userid` (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_notifications`
--
ALTER TABLE `admin_notifications`
  MODIFY `notifid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `user_notifications`
--
ALTER TABLE `user_notifications`
  MODIFY `notifid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);

--
-- Constraints for table `user_notifications`
--
ALTER TABLE `user_notifications`
  ADD CONSTRAINT `user_notifications_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
