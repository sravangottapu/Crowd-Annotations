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
-- Table structure for table `paragraph_users`
--

CREATE TABLE `paragraph_users` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `paragraph` longtext NOT NULL,
  `title` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paragraph_users`
--

INSERT INTO `paragraph_users` (`id`, `username`, `paragraph`, `title`) VALUES
(1, 'kamal', 'Animals are multicellular, eukaryotic organisms of the kingdom Animalia (also called Metazoa). All animals are motile, meaning they can move spontaneously and independently, at some point in their lives. Their body plan eventually becomes fixed as they develop, although some undergo a process of metamorphosis later on in their lives. All animals are heterotrophs: they must ingest other organisms or their products for sustenance.\r\n\r\nMost known animal phyla appeared in the fossil record as marine species during the Cambrian explosion, about 542 million years ago. Animals are divided into various sub-groups, some of which are: vertebrates (birds, mammals, amphibians, reptiles, fish); molluscs (clams, oysters, octopuses, squid, snails); arthropods (millipedes, centipedes, insects, spiders, scorpions, crabs, lobsters, shrimp); annelids (earthworms, leeches); cnidarians (jellyfish, anemones, corals); and sponges.\r\n', 'animals'),
(2, 'kamal', 'With a few exceptions, most notably the sponges (Phylum Porifera) and Placozoa, animals have bodies differentiated into separate tissues. These include muscles, which are able to contract and control locomotion, and nerve tissues, which send and process signals. Typically, there is also an internal digestive chamber, with one or two openings.[13] Animals with this sort of organization are called metazoans, or eumetazoans when the former is used for animals in general.[14]\r\n\r\nAll animals have eukaryotic cells, surrounded by a characteristic extracellular matrix composed of collagen and elastic glycoproteins.[15] This may be calcified to form structures like shells, bones, and spicules.[16] During development, it forms a relatively flexible framework[17] upon which cells can move about and be reorganized, making complex structures possible. In contrast, other multicellular organisms, like plants and fungi, have cells held in place by cell walls, and so develop by progressive growth.[13] Also, unique to animal cells are the following intercellular junctions: tight junctions, gap junctions, and desmosomes.[18]\r\n', 'structure'),
(3, 'kamal', 'With a few exceptions, most notably the sponges (Phylum Porifera) and Placozoa, animals have bodies differentiated into separate tissues. These include muscles, which are able to contract and control locomotion, and nerve tissues, which send and process signals. Typically, there is also an internal digestive chamber, with one or two openings.[13] Animals with this sort of organization are called metazoans, or eumetazoans when the former is used for animals in general.[14]\r\n', 'structure'),
(4, 'kamal', 'All animals have eukaryotic cells, surrounded by a characteristic extracellular matrix composed of collagen and elastic glycoproteins.[15] This may be calcified to form structures like shells, bones, and spicules.[16] During development, it forms a relatively flexible framework[17] upon which cells can move about and be reorganized, making complex structures possible. In contrast, other multicellular organisms, like plants and fungi, have cells held in place by cell walls, and so develop by progressive growth.[13] Also, unique to animal cells are the following intercellular junctions: tight junctions, gap junctions, and desmosomes.[18]\r\n', 'kamal'),
(5, 'kamal', 'Animals are multicellular, eukaryotic organisms of the kingdom Animalia (also called Metazoa). All animals are motile, meaning they can move spontaneously and independently, at some point in their lives. Their body plan eventually becomes fixed as they develop, although some undergo a process of metamorphosis later on in their lives. All animals are heterotrophs: they must ingest other organisms or their products for sustenance.\r\n\r\nMost known animal phyla appeared in the fossil record as marine species during the Cambrian explosion, about 542 million years ago. Animals are divided into various sub-groups, some of which are: vertebrates (birds, mammals, amphibians, reptiles, fish); molluscs (clams, oysters, octopuses, squid, snails); arthropods (millipedes, centipedes, insects, spiders, scorpions, crabs, lobsters, shrimp); annelids (earthworms, leeches); cnidarians (jellyfish, anemones, corals); and sponges.\r\n\r\n', 'text animals');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `paragraph_users`
--
ALTER TABLE `paragraph_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `paragraph_users`
--
ALTER TABLE `paragraph_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
