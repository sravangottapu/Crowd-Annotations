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
-- Table structure for table `word_list_web`
--

CREATE TABLE `word_list_web` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `word` varchar(60) NOT NULL,
  `category` varchar(60) NOT NULL,
  `document` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `word_list_web`
--

INSERT INTO `word_list_web` (`id`, `username`, `word`, `category`, `document`) VALUES
(1, 'kamal', 'average', 'figure', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
