-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2016 at 04:36 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sandpoint_archives`
--

-- --------------------------------------------------------

--
-- Table structure for table `alignments`
--

CREATE TABLE `alignments` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `abbreviation` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alignments`
--

INSERT INTO `alignments` (`id`, `name`, `abbreviation`) VALUES
(1, 'Lawful Good', 'LG'),
(2, 'Neutral Good', 'NG'),
(3, 'Chaotic Good', 'CG'),
(4, 'Lawful Neutral', 'LN'),
(5, 'True Neutral', 'N'),
(6, 'Chaotic Neutral', 'CN'),
(7, 'Lawful Evil', 'LE'),
(8, 'Neutral Evil', 'NE'),
(9, 'Chaotic Evil', 'CE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alignments`
--
ALTER TABLE `alignments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alignments`
--
ALTER TABLE `alignments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
