-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2015 at 07:46 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `planitsurveyportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `survey_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `answer_text` varchar(1000) DEFAULT NULL,
  `last_modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `submission_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `user_id`, `survey_id`, `question_id`, `option_id`, `answer_text`, `last_modified_date`, `submission_date`) VALUES
(7, 1, 1, 1, 10, '1', '2015-07-16 05:43:56', '2015-07-15 23:43:56'),
(8, 1, 1, 2, 15, '1', '2015-07-16 05:43:56', '2015-07-15 23:43:56'),
(9, 1, 1, 3, 21, '1', '2015-07-16 05:43:56', '2015-07-15 23:43:56'),
(10, 1, 1, 4, 27, '1', '2015-07-16 05:43:56', '2015-07-15 23:43:56'),
(11, 1, 1, 5, 34, '1', '2015-07-16 05:43:56', '2015-07-15 23:43:56'),
(12, 1, 1, 6, 42, '1', '2015-07-16 05:43:56', '2015-07-15 23:43:56'),
(13, 1, 1, 7, 44, '44', '2015-07-16 05:43:56', '2015-07-15 23:43:56'),
(14, 1, 1, 8, 52, '1', '2015-07-16 05:43:56', '2015-07-15 23:43:56'),
(15, 1, 1, 9, 59, '1', '2015-07-16 05:43:56', '2015-07-15 23:43:56'),
(16, 1, 1, 10, 60, '1', '2015-07-16 05:43:56', '2015-07-15 23:43:56'),
(17, 1, 1, 10, 61, '2', '2015-07-16 05:43:56', '2015-07-15 23:43:56'),
(18, 1, 1, 11, 62, '3', '2015-07-16 05:43:56', '2015-07-15 23:43:56'),
(19, 1, 1, 12, 66, '1', '2015-07-16 05:43:56', '2015-07-15 23:43:56'),
(20, 1, 1, 13, 69, '69', '2015-07-16 05:43:56', '2015-07-15 23:43:56'),
(21, 1, 1, 14, 70, '70', '2015-07-16 05:43:56', '2015-07-15 23:43:56'),
(22, 1, 1, 15, 73, '73', '2015-07-16 05:43:56', '2015-07-15 23:43:56'),
(23, 1, 1, 16, 74, '74', '2015-07-16 05:43:56', '2015-07-15 23:43:56'),
(24, 1, 1, 17, 79, '1', '2015-07-16 05:43:56', '2015-07-15 23:43:56'),
(25, 1, 1, 18, 81, '81', '2015-07-16 05:43:56', '2015-07-15 23:43:56'),
(26, 1, 1, 19, 82, '82', '2015-07-16 05:43:56', '2015-07-15 23:43:56'),
(27, 1, 1, 20, 84, '12', '2015-07-16 05:43:56', '2015-07-15 23:43:56'),
(28, 1, 1, 20, 85, '13', '2015-07-16 05:43:56', '2015-07-15 23:43:56'),
(29, 1, 1, 21, 87, '87', '2015-07-16 05:43:56', '2015-07-15 23:43:56'),
(30, 1, 1, 22, 88, '88', '2015-07-16 05:43:56', '2015-07-15 23:43:56'),
(31, 1, 1, 23, 90, '90', '2015-07-16 05:43:56', '2015-07-15 23:43:56'),
(32, 1, 1, 24, 93, '93', '2015-07-16 05:43:56', '2015-07-15 23:43:56'),
(33, 1, 1, 25, 94, '94', '2015-07-16 05:43:56', '2015-07-15 23:43:56'),
(34, 1, 1, 26, 96, '7', '2015-07-16 05:43:56', '2015-07-15 23:43:56');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE IF NOT EXISTS `options` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `question_id`, `description`, `type`) VALUES
(1, 1, 'Then-Client Web Browser', 'checkbox'),
(2, 1, 'Fat-Client Web Application', 'checkbox'),
(3, 1, 'Web Server', 'checkbox'),
(4, 1, 'Application Server', 'checkbox'),
(5, 1, 'Authentication Server / LDAP', 'checkbox'),
(6, 1, 'File Server / NFS', 'checkbox'),
(7, 1, 'IVR Integration / Comms Server', 'checkbox'),
(8, 1, 'Mainframe', 'checkbox'),
(9, 1, 'Database Server', 'checkbox'),
(10, 1, 'Middleware Platform Integration / Enterprise Service Bus', 'checkbox'),
(11, 2, '10Mbit Network', 'checkbox'),
(12, 2, '100Mbit Network', 'checkbox'),
(13, 2, '1000Mbit Network', 'checkbox'),
(14, 2, 'Mobile Network / 3G, 4G, LTE', 'checkbox'),
(15, 2, 'Weak Link / Remote Location', 'checkbox'),
(16, 3, 'Java Based Application', 'checkbox'),
(17, 3, 'Microsoft ASP.Net Application', 'checkbox'),
(18, 3, 'Oracke Firns / APEX', 'checkbox'),
(19, 3, 'SAP ABAP', 'checkbox'),
(20, 3, 'Siebel Customisation', 'checkbox'),
(21, 3, 'Ruby Application', 'checkbox'),
(22, 3, 'Other', 'checkbox'),
(23, 4, 'Oracle Database', 'checkbox'),
(24, 4, 'Microsoft SQL Server', 'checkbox'),
(25, 4, 'IBM DB2', 'checkbox'),
(26, 4, 'Mongo DB', 'checkbox'),
(27, 4, 'Postgres', 'checkbox'),
(28, 4, 'MySQL', 'checkbox'),
(29, 5, 'HTML / HTML5 W3C Standard', 'checkbox'),
(30, 5, 'JavaScript', 'checkbox'),
(31, 5, 'JavaScript Framework', 'checkbox'),
(32, 5, 'Microsoft ActiveX Components', 'checkbox'),
(33, 5, 'Adobe Air', 'checkbox'),
(34, 5, 'Microsoft SilverLight', 'checkbox'),
(35, 5, 'Java Applets', 'checkbox'),
(36, 6, 'HTTP / HTTPS', 'checkbox'),
(37, 6, 'TCP / IP', 'checkbox'),
(38, 6, 'UDP', 'checkbox'),
(39, 6, 'SISNAPI', 'checkbox'),
(40, 6, 'SilverLight Protocol', 'checkbox'),
(41, 6, 'MUX / SMUX / SPDY', 'checkbox'),
(42, 6, 'Propietary', 'checkbox'),
(43, 7, 'Yes', 'radio'),
(44, 7, 'No', 'radio'),
(45, 8, 'TIBCO', 'checkbox'),
(46, 8, 'Web Methods', 'checkbox'),
(47, 8, 'IBM Information Bus', 'checkbox'),
(48, 8, 'SAP Process Integration', 'checkbox'),
(49, 8, 'Oracle Tuxedo', 'checkbox'),
(50, 8, 'Oracle Service Bus', 'checkbox'),
(51, 8, 'Microsoft BizTalk Server', 'checkbox'),
(52, 8, 'IBM WebSphere', 'checkbox'),
(53, 9, 'SOAP / XML', 'checkbox'),
(54, 9, 'REST API / XML', 'checkbox'),
(55, 9, 'REST API / JSON', 'checkbox'),
(56, 9, 'Custom', 'checkbox'),
(57, 9, 'Request / Response', 'checkbox'),
(58, 9, 'Publish / Subscribe', 'checkbox'),
(59, 9, 'Async Messaging Queues', 'checkbox'),
(60, 10, 'Total number of users registered in the database', 'numeric'),
(61, 10, 'Total number of users available in LDAP directory', 'numeric'),
(62, 11, 'Total number of users at any given point in time', 'numeric'),
(63, 12, 'Physical Hardware', 'checkbox'),
(64, 12, 'Virtualisation Technology', 'checkbox'),
(65, 12, 'Para-Virtual', 'checkbox'),
(66, 12, 'Cloud Infrastructure', 'checkbox'),
(67, 12, 'IaaS', 'checkbox'),
(68, 13, 'Capped', 'radio'),
(69, 13, 'Dynamically allocated on demand', 'radio'),
(70, 14, 'Yes', 'radio'),
(71, 14, 'No', 'radio'),
(72, 15, 'Yes', 'radio'),
(73, 15, 'No', 'radio'),
(74, 16, 'Yes', 'radio'),
(75, 16, 'No', 'radio'),
(76, 17, 'Never', 'radio'),
(77, 17, 'Indexes created on (dd/mm/yyyy)', 'radio'),
(78, 17, 'Archiving', 'radio'),
(79, 17, 'Moved data to Data-warehouse', 'radio'),
(80, 18, 'Yes', 'radio'),
(81, 18, 'No', 'radio'),
(82, 19, 'Yes', 'radio'),
(83, 19, 'No', 'radio'),
(84, 20, 'Business Perspective: (Revenue generation, number of affected users, customer facing, brand advocates, business critical)', 'numeric'),
(85, 20, 'Technical Perspective: (Complex logic, Resource greedy, Overall influence in platform stability, batch job processing, integrations)', 'numeric'),
(86, 21, '10+ steps', 'radio'),
(87, 21, '<10 steps', 'radio'),
(88, 22, 'Yes', 'radio'),
(89, 22, 'No', 'radio'),
(90, 23, 'Yes', 'radio'),
(91, 23, 'No', 'radio'),
(92, 24, 'Yes', 'radio'),
(93, 24, 'No', 'radio'),
(94, 25, 'Yes', 'radio'),
(95, 25, 'No', 'radio'),
(96, 26, 'Number of integrations', 'numeric');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL,
  `survey_id` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `mandatory_flag` varchar(1) NOT NULL,
  `control_type` varchar(20) NOT NULL,
  `column_style` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `survey_id`, `description`, `mandatory_flag`, `control_type`, `column_style`) VALUES
(1, 1, 'What are the architectural tiers of the application under test?', 'Y', 'checkbox', 2),
(2, 1, 'What is the network speed and infrastructure of your test environment?', 'Y', 'checkbox', 2),
(3, 1, 'What is the technology and platform version used for development?', 'Y', 'checkbox', 2),
(4, 1, 'What is your Dtabase Management System and its version?', 'Y', 'checkbox', 2),
(5, 1, 'What kind of technologies are used for the development of the front-end?', 'Y', 'checkbox', 2),
(6, 1, 'Which protocol is used to communicate between the front-end and web/application server?', 'Y', 'checkbox', 2),
(7, 1, 'Does your application interact with a middleware or integration platform?', 'Y', 'radio', 1),
(8, 1, 'If your application interacts with a middleware or integration platform, what vendor of middleware you use?', 'Y', 'checkbox', 2),
(9, 1, 'Which paradigms and message structures are used in your application and middleware?', 'Y', 'checkbox', 2),
(10, 1, 'What is the total user population of your application?', 'Y', 'text', 1),
(11, 1, 'What is the approximate number of concurrent users of your application?', 'Y', 'text', 1),
(12, 1, 'What kind of platform is used to host your application?', 'Y', 'checkbox', 2),
(13, 1, 'Are the resources of your application capped or dynamic?', 'Y', 'radio', 1),
(14, 1, 'Do you have a systems monitoring solution? Please specify.', 'Y', 'radio', 1),
(15, 1, 'Does your test environment matches production scale and specifications? Percentage ratio (%)', 'Y', 'radio', 1),
(16, 1, 'Has your application experienced a slow performance in the past? Please specify.', 'Y', 'radio', 1),
(17, 1, 'When was the last time that the application database schema undertook an tuning exercise?', 'Y', 'checkbox', 1),
(18, 1, 'Does your application has a SLA? Please specify.', 'Y', 'radio', 1),
(19, 1, 'Does your application needs to meet specific APDEX Objectives for maximum transaction response times? (Example: <5 sec)', 'Y', 'radio', 1),
(20, 1, 'Please specify the number of business processes candidate for testing?', 'Y', 'text', 1),
(21, 1, 'What is the average number of steps in the business process selected for testing?', 'Y', 'radio', 1),
(22, 1, 'Does your application have multiple user profiles or different user roles?', 'Y', 'radio', 1),
(23, 1, 'Does your application serve users in different time-zones?', 'Y', 'radio', 1),
(24, 1, 'Does your application serve multiple work shifts in the same time-zone?', 'Y', 'radio', 1),
(25, 1, 'Does your application has an expected maintenance/downtime window per day/month/year?', 'Y', 'radio', 1),
(26, 1, 'How many integrations does the application under test expose to the enterprise service catalog?', 'Y', 'text', 1);

-- --------------------------------------------------------

--
-- Table structure for table `surveys`
--

CREATE TABLE IF NOT EXISTS `surveys` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surveys`
--

INSERT INTO `surveys` (`id`, `name`, `description`) VALUES
(1, 'Tech Survey', 'This is survey description'),
(2, 'Survey Example Two', 'This is survey description two');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `long_name` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `long_name`) VALUES
(1, 'jafrica', 'Joel Africa'),
(2, 'pcaceres', 'Patrick Caceres');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`), ADD KEY `survey_id` (`survey_id`), ADD KEY `question_id` (`question_id`), ADD KEY `option_id` (`option_id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`), ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`), ADD KEY `survey_id` (`survey_id`);

--
-- Indexes for table `surveys`
--
ALTER TABLE `surveys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=97;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `surveys`
--
ALTER TABLE `surveys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
ADD CONSTRAINT `answers_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON UPDATE CASCADE,
ADD CONSTRAINT `answers_ibfk_3` FOREIGN KEY (`survey_id`) REFERENCES `surveys` (`id`) ON UPDATE CASCADE,
ADD CONSTRAINT `answers_ibfk_4` FOREIGN KEY (`option_id`) REFERENCES `options` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `options`
--
ALTER TABLE `options`
ADD CONSTRAINT `options_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`survey_id`) REFERENCES `surveys` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
