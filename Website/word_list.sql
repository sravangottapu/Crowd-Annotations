-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2016 at 07:42 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `annotated_words`
--

-- --------------------------------------------------------

--
-- Table structure for table `word_list`
--

CREATE TABLE `word_list` (
  `id` int(11) NOT NULL,
  `word` varchar(30) NOT NULL,
  `type` text NOT NULL,
  `frequency` int(4) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `word_list`
--

INSERT INTO `word_list` (`id`, `word`, `type`, `frequency`, `date`) VALUES
(20, ' instead ', 'word', 1, '2016-02-19 16:24:38'),
(21, ' ENGINEERING', 'course', 1, '2016-02-19 16:26:08'),
(22, 'Ashish', '', 1, '2016-02-19 16:28:34'),
(23, 'Anand', '', 1, '2016-02-19 16:29:24'),
(24, 'Anand', 'lastname', 1, '2016-02-19 16:29:41'),
(25, 'Nanyang', 'state', 1, '2016-02-19 16:34:57'),
(26, 'Mathematics', 'subject', 1, '2016-02-19 16:35:17'),
(27, 'University', 'jukk', 1, '2016-02-19 16:35:35'),
(28, ' GUWAHATI', 'city', 1, '2016-02-19 16:40:59'),
(29, 'EMAIL', 'grgrgr', 1, '2016-02-19 16:43:02'),
(30, 'ashish [at] iitg.ernet.in', 'fgrgrgrg', 1, '2016-02-19 16:44:48'),
(31, ' COMPUTER ', 'sss', 1, '2016-02-19 16:45:56'),
(32, ' COMPUTER ', 'scsdc', 1, '2016-02-19 16:47:47'),
(33, 'ENGINEERING', 'female', 1, '2016-02-19 16:51:56'),
(34, ' GUWAHATI', 'ciity', 1, '2016-02-19 16:52:07'),
(35, 'Location', 'lastname', 1, '2016-02-22 22:22:55'),
(36, 'B.Tech', 'course', 2, '2016-02-24 16:20:36'),
(37, 'CSE', 'course', 1, '2016-02-24 16:24:12'),
(38, 'B.Tech.', 'course', 1, '2016-02-24 16:24:33'),
(39, '0243 seconds', 'number', 1, '2016-02-25 10:13:52'),
(40, 'meaning', 'verb', 1, '2016-02-27 16:43:00'),
(41, ' allow ', 'verb', 1, '2016-03-15 21:50:58'),
(42, 'JavaScript ', 'language', 2, '2016-03-15 21:54:49'),
(43, ' Bootstrap', 'language', 1, '2016-03-15 21:56:32'),
(44, 'Following', 'verb', 1, '2016-03-15 21:57:49'),
(45, 'Convert', 'contry', 1, '2016-03-15 22:00:23'),
(46, 'multiple', 'noun', 1, '2016-03-15 22:01:15'),
(47, 'You ', 'noun', 1, '2016-03-15 22:03:01'),
(48, 'Stack', 'structurE', 1, '2016-03-15 22:03:35'),
(49, 'programmers', 'male', 1, '2016-03-15 22:39:11'),
(50, 'Perhaps ', 'noun', 1, '2016-03-15 22:49:51'),
(51, 'Overflow ', 'state', 1, '2016-03-15 22:50:56'),
(52, 'Some', 'contry', 1, '2016-03-15 22:52:15'),
(53, 'Manual', 'state', 1, '2016-03-15 22:55:22'),
(54, 'Leo ', 'sign', 1, '2016-03-20 18:58:53'),
(55, 'onclick', 'male', 1, '2016-03-20 19:11:20'),
(56, 'sayHell', 'female', 1, '2016-03-20 19:12:40'),
(57, ' Leonardo DiCaprio', 'male', 1, '2016-03-20 19:35:27'),
(58, 'Scrip', 'useless', 1, '2016-03-20 19:36:17'),
(59, 'Book a Cab', 'new', 1, '2016-03-31 13:43:08'),
(60, 'al Jam is an', 'contry', 1, '2016-03-31 13:47:22'),
(61, 'e shown ', 'ours', 1, '2016-03-31 15:10:22'),
(62, 'default.', 'word', 1, '2016-03-31 15:12:29'),
(63, 'hdfhfgbf', 'state', 1, '2016-03-31 16:45:06'),
(64, 'bfbfb', 'bfbfcb', 1, '2016-03-31 16:45:31'),
(65, 'form controls', 'ununtu', 1, '2016-03-31 17:19:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `word_list`
--
ALTER TABLE `word_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `word_list`
--
ALTER TABLE `word_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
