-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2016 at 02:19 PM
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
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `date_s` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `username`, `title`, `filename`, `date_s`) VALUES
(3, 'kamal', 'fgbfbgefg', 'Startups.xlsx', '2016-04-13 22:57:24'),
(4, 'kamal', 'dwdw', 'word_list.sql', '2016-04-13 22:57:24'),
(5, 'kamal', 'polkj', 'Thanks for your support.txt', '2016-04-13 22:57:24'),
(6, 'kamal', 'aaca', 'GraduatingStudents2016.xlsx', '2016-04-13 22:57:24'),
(7, 'kamal', 'animals', 'animals', '2016-04-13 22:57:24'),
(8, 'kamal', 'Ankle', 'Ankle', '2016-04-13 22:57:24'),
(9, 'kamal', 'Earth', 'Earth', '2016-04-13 22:57:24'),
(10, 'kamal', 'planktom', 'planktom', '2016-04-13 22:57:24'),
(11, 'kamal', 'newfile', '1.php', '2016-04-13 22:57:24'),
(12, 'kamal', 'sponjes', 'sponjes.txt', '2016-04-13 22:57:24'),
(13, 'kamal', 'article', 'article.txt', '2016-04-13 22:57:24'),
(14, 'kamal', 'article', 'article.txt', '2016-04-13 22:57:24'),
(15, 'kamal', 'article', 'article.txt', '2016-04-13 22:57:24'),
(16, 'kamal', 'article', 'article.txt', '2016-04-13 22:57:24'),
(17, 'kamal', 'sponjes', 'sponjes.txt', '2016-04-13 22:57:24'),
(18, 'kamal', 'article', 'article.txt', '2016-04-13 22:57:24'),
(19, 'kamal', 'article', 'article.txt', '2016-04-13 22:57:24'),
(20, 'kamal', 'article', 'article.txt', '2016-04-13 22:57:24'),
(21, 'kamal', 'article', 'article.txt', '2016-04-13 22:57:24'),
(22, 'kamal', 'article', 'article.txt', '2016-04-13 22:57:24'),
(23, 'kamal', 'article', 'article.txt', '2016-04-13 22:57:24'),
(24, 'kamal', 'article', 'article.txt', '2016-04-13 22:57:24'),
(25, 'kamal', 'article', 'article.txt', '2016-04-13 22:57:24'),
(26, 'kamal', 'article', '1', '2016-04-13 22:57:24'),
(27, 'kamal', 'artice', 'artice.txt', '2016-04-13 22:57:24'),
(28, 'kamal', 'article', 'article1.txt', '2016-04-13 22:57:24'),
(29, 'kamal', 'article', 'article1.txt', '2016-04-13 22:57:24'),
(30, 'kamal', 'article', 'article1.txt', '2016-04-13 22:57:24'),
(31, 'kamal', 'article', 'article1.txt', '2016-04-13 22:57:24'),
(32, 'kamal', 'article', 'article2.txt', '2016-04-13 22:57:24'),
(33, 'kamal', 'article', 'article3.txt', '2016-04-13 22:57:24'),
(34, 'kamal', 'login', 'login.php', '2016-04-13 23:01:47'),
(35, 'kamal', 'article', 'article4.txt', '2016-04-17 19:13:21'),
(36, 'kamal', 'more news on the topic', 'more news on the topic.txt', '2016-04-17 19:38:11'),
(37, 'kamal', 'computer', 'computer.txt', '2016-04-17 21:39:47'),
(38, 'kamal', 'information', 'information.txt', '2016-04-17 21:40:00'),
(39, 'kamal', 'points', 'points.txt', '2016-04-17 21:40:16'),
(40, 'kamal', 'jjj', 'jjj.txt', '2016-04-20 15:13:36'),
(41, 'kamal', 'comedy', 'comedy.txt', '2016-04-20 21:49:54'),
(42, 'kamal', 'comedy', 'comedy1.txt', '2016-04-20 21:51:28'),
(43, 'kamal', 'lpoijk', 'lpoijk.txt', '2016-04-20 22:03:47'),
(44, 'kamal', 'animals', 'animals1.txt', '2016-04-20 22:04:37'),
(45, 'ashish_anand', 'anthrax', 'anthrax.txt', '2016-04-21 14:37:13'),
(46, 'kamal', 'structure', 'structure.txt', '2016-04-22 17:16:43'),
(47, 'kamal', 'forgot', 'forgot_password.php', '2016-04-22 17:17:24'),
(48, 'kamal', 'structure', 'structure1.txt', '2016-04-22 17:21:28'),
(49, 'kamal', 'kamal', 'kamal.txt', '2016-04-22 17:23:45'),
(50, 'ashish_anand', 'sravan', 'sravan.txt', '2016-04-22 17:25:41'),
(51, 'kamal', 'text animals', 'text animals.txt', '2016-04-22 17:37:11'),
(52, 'kamal', 'ankle', 'Ankle.txt', '2016-04-22 17:38:03'),
(53, 'ashish_anand', 'food', 'food.txt', '2016-04-22 17:40:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
