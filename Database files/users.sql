-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2016 at 02:18 PM
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `value` int(11) NOT NULL,
  `question` varchar(30) NOT NULL,
  `points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstname`, `surname`, `email`, `value`, `question`, `points`) VALUES
(1, 'kamal', 'aa63b0d5d950361c05012235ab520512', 'kamal', 'jain', 'kamal.jain@iitg.ernet.in', 1, 'dhoni', 8),
(2, 'poniponi', '08468367815f16d958b9113a3a16e35a', 'poni', 'jain', 'poni@gmail.com', 0, '', 0),
(4, 'plko', 'b20799f613e9897b4c94a53755ba3b47', 'plko', 'jain', 'poni@gmail.com', 0, '', 0),
(5, 'lp', '443e5a43a3a3e8e9ef46bfa37bef7600', 'fvfv', 'fvfvf', 'kamalkishorejain2014@gmail.com', 0, '', 8),
(6, 'rerer', '443e5a43a3a3e8e9ef46bfa37bef7600', 'vfvf', 'vfbvfbv', 'kamalkishorejain2014@gmail.com', 1, '', 0),
(7, 'ashish_anand', 'aa63b0d5d950361c05012235ab520512', 'ashish', 'anand', 'anand.ashish@iitg.ernet.in', 1, '', 0),
(8, 'sravan', '9fef676dcb91846d5487274c7f309c6d', 'sravan', 'gottapu', 'gottapu@iitg.ernet.in', 1, 'kohli', 0),
(9, 'points', '0771ceda400e4294d832f8eea4d94a3b', 'poin', 'ts', 'kamalkishorejain2014@gmail.com', 1, 'yuvraj', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
