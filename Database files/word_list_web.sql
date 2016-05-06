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
-- Table structure for table `word_list_web`
--

CREATE TABLE `word_list_web` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `word` varchar(60) NOT NULL,
  `category` varchar(60) NOT NULL,
  `document` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `word_list_web`
--

INSERT INTO `word_list_web` (`id`, `username`, `word`, `category`, `document`) VALUES
(1, 'kamal', 'average', 'figure', '0'),
(2, 'kamal', 'Tinker', 'name', '0'),
(3, 'kamal', 'Elements', 'element', '0'),
(4, 'kamal', 'Robert Bringhurst', 'Name', 'HealthCare'),
(5, 'kamal', 'professionally', 'quality', 'healthcare'),
(6, 'kamal', 'increases readability', 'das', 'fgbfbgefg'),
(7, 'kamal', 'paragraph', 'paragraph', 'fgbfbgefg'),
(8, 'kamal', 'Legibility', 'fsf', ''),
(9, 'kamal', 'Typographic', 'szdazd', ''),
(10, 'kamal', ' professionally ', 'carrier', ''),
(11, 'kamal', 'e instruction re', ' guwahati', ''),
(12, 'kamal', 'languages', ' engineering', ''),
(13, 'kamal', 'references', 'female', ''),
(14, 'kamal', '	deuterostomes and protostomes', 'female', ''),
(29, 'ashish_anand', ' summarizes ', 'summer', 'computer'),
(33, 'ashish_anand', 'according', 'cater', 'article'),
(34, 'kamal', 'languages', 'kamal', 'article'),
(35, 'kamal', 'exceptions', 'state', ''),
(36, 'kamal', 'computatio', 'animals', 'points'),
(37, 'kamal', 'animal grow', 'contry', ''),
(38, 'kamal', ' determiners', 'yuoi', 'article'),
(39, '', 'rgrgrgrg', 'grgtrgt', ''),
(40, 'kamal', 'article', 'dfrfd', 'article'),
(41, 'kamal', 'demonstratives', 'quora', 'article'),
(42, 'kamal', 'anguage', 'poopo', 'article'),
(43, 'kamal', ' multicellular', 'state', 'https://www.google.co.in/search?q=animals&oq=a&aqs=chrome.3.69i60l3j69i59j69i60l2.1821j0j7&sourceid='),
(44, 'kamal', ' index.php', 'file', 'http://stackoverflow.com/questions/19942229/xampp-object-not-found-error'),
(45, 'kamal', 'cv cvvc', 'c vcvccv', 'http://localhost/phpmyadmin/sql.php?server=1&db=annotated_words&table=word_list_web&pos=0&token=93f3'),
(46, 'kamal', ' localhost', 'female', 'http://stackoverflow.com/questions/19942229/xampp-object-not-found-error'),
(47, 'kamal', 'word', 'fvdcvv', 'article');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `word_list_web`
--
ALTER TABLE `word_list_web`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `word_list_web`
--
ALTER TABLE `word_list_web`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
