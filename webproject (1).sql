-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 11, 2017 at 05:42 PM
-- Server version: 5.7.19-0ubuntu0.16.04.1
-- PHP Version: 7.0.19-1+deb.sury.org~xenial+2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `feedback` text NOT NULL,
  `upvotes` int(11) DEFAULT NULL,
  `downvotes` int(11) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `tags` varchar(128) NOT NULL,
  `reg_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `user_id`, `feedback`, `upvotes`, `downvotes`, `score`, `tags`, `reg_time`) VALUES
(1, 1, 'All IITs have many options for minor program but our iit lacks them .If the administration could look into it would lead to more diversified learning', NULL, NULL, NULL, 'academics', '2017-07-27 18:28:08'),
(15542, 1, '<p>It would be of great help if we could get a seperate rooom for table tennis because really hard to play along with the gym.</p>\r\n', NULL, NULL, NULL, 'sports', '2017-07-27 18:56:20'),
(18366, 1, '<p>The housekeeping person has not been coming for many days please look into this matter</p>\r\n', NULL, NULL, NULL, 'hostel', '2017-07-28 06:40:55'),
(69347, 1, '<p>The Mess food has only degraded in quality inspite of the fee hike.I think we deserve a better meal than the present given to us.If the general scretary could take serious note into this matter it woud be of great help</p>\r\n', NULL, NULL, NULL, 'mess', '2017-07-27 18:30:18');

-- --------------------------------------------------------

--
-- Table structure for table `like_unlike`
--

CREATE TABLE `like_unlike` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `question_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `reg_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `like_unlike`
--

INSERT INTO `like_unlike` (`id`, `user_id`, `question_id`, `type`, `reg_time`) VALUES
(1, 1, 40112, 1, '2017-07-27 18:33:31');

-- --------------------------------------------------------

--
-- Table structure for table `like_unlike_reply`
--

CREATE TABLE `like_unlike_reply` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `reply_id` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notificationlike`
--

CREATE TABLE `notificationlike` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `unread` int(1) NOT NULL DEFAULT '1',
  `category` text NOT NULL,
  `reg_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ref_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notificationlike`
--

INSERT INTO `notificationlike` (`id`, `sender_id`, `receiver_id`, `unread`, `category`, `reg_time`, `ref_id`) VALUES
(1, 1, 1, 1, 'reply', '2017-07-27 18:24:26', 1),
(2, 1, 1, 1, 'question', '2017-07-27 18:33:31', 40112),
(3, 1, 1, 1, 'reply', '2017-07-27 18:33:39', 1),
(4, 1, 1, 1, 'reply', '2017-07-27 19:18:45', 60244);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `question_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `upvotes` int(11) NOT NULL,
  `downvotes` int(11) NOT NULL,
  `score` double NOT NULL,
  `reg_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `question_heading` text,
  `tags` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `user_id`, `question`, `upvotes`, `downvotes`, `score`, `reg_time`, `question_heading`, `tags`) VALUES
(1, 1, 'Why was query created when we have an option of posting feedbacks and questions on the official mail?', 0, 0, 0, '2017-07-27 18:21:47', 'What is the purpose of query?', 'Others'),
(40112, 1, 'Even though gst was applied it would lead to only a marginal increase in price but the fee hike was exorbitant.Please look into this matter.', 0, 0, 0, '2017-07-27 18:31:51', 'Why was the mess fees hiked to such an extent?', 'mess'),
(60244, 1, '', 0, 0, 0, '2017-07-27 19:15:36', 'How does query work?', 'others');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `reply_id` int(11) NOT NULL,
  `quest_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reply` text NOT NULL,
  `upvotes` int(11) DEFAULT NULL,
  `downvotes` int(11) DEFAULT NULL,
  `score` double DEFAULT NULL,
  `reg_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`reply_id`, `quest_id`, `user_id`, `reply`, `upvotes`, `downvotes`, `score`, `reg_time`) VALUES
(1, 1, 1, '<p>We have been noticing that there was no proper platform for posting questions and feedbacks ,and the official mail did not live upto expectations.Thus query helps in all these matters.</p>', NULL, NULL, 0, '2017-07-27 18:24:26'),
(3, 60244, 1, '<p>Anybody can reply to questions and get to know feedbacks.The 4&nbsp;most popular posts will be displayed under questions and feedbacks and will be displayed according to their popularity.All the other posts can be viewed under various&nbsp;categories .People will get notifications if anybody replies to their posts or likes them.So for any doubt or feedbacks just QUERY IT</p>', NULL, NULL, 0, '2017-07-27 19:18:45');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `user_name` varchar(128) NOT NULL,
  `password` varchar(16) NOT NULL,
  `email_id` varchar(128) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `user_name`, `password`, `email_id`, `description`) VALUES
(1, 'pranav', 'khanna', 'pranavk28', '1234', 'pranikhanna1998@gmail.com', 'entrepreneurship is my dream ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `like_unlike`
--
ALTER TABLE `like_unlike`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `like_unlike_reply`
--
ALTER TABLE `like_unlike_reply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notificationlike`
--
ALTER TABLE `notificationlike`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`reply_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69348;
--
-- AUTO_INCREMENT for table `like_unlike`
--
ALTER TABLE `like_unlike`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `like_unlike_reply`
--
ALTER TABLE `like_unlike_reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notificationlike`
--
ALTER TABLE `notificationlike`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60245;
--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
