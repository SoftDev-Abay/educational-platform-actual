-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql305.epizy.com
-- Generation Time: Nov 28, 2022 at 03:06 AM
-- Server version: 10.3.27-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_31883399_combase`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `cid` int(11) NOT NULL,
  `uid` varchar(128) CHARACTER SET utf8 NOT NULL,
  `date` datetime NOT NULL,
  `message` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`cid`, `uid`, `date`, `message`) VALUES
(212, 'Programmer', '2021-10-12 05:03:11', ' Of course, there are many problems that teacher and student will encounter during or after the lesson. However, one of the most frequent and crucial problems is teaching students who were not taught in the lesson. Often a student or teacher cannot find time to attend an individual consultation, which significantly slows down their progress and can also lead to difficulties in further lessons. Also, we must not forget about the human factor, because any student can lose the distribution of the lesson without being able to get ready for the next lesson.'),
(287, 'abay', '2022-04-14 02:27:17', ' Triangle volume lesson needs corrections.'),
(288, 'aigerim', '2022-04-16 06:19:20', ' Registration of the new users to the web application happens with no popping up errors, while authorization system is able to accurately check for inserted user account data and if is already registered than instantly sends to the main page. '),
(289, 'ainar', '2022-04-16 06:20:04', ' Lessons table is also working the way it was expected to while file attached to the lessons is also opening properly.'),
(290, 'aisultan', '2022-04-16 06:30:18', 'Web application interface is very much user friendly since I had no need for additional guide or instructions'),
(291, 'aydar', '2022-04-16 06:32:16', 'Just submitted an assignemtns, everything went smoothly no errors were found.'),
(295, 'abay', '2022-11-15 20:23:19', 'Need 100% !'),
(298, 'abay', '2022-11-19 13:02:17', ' 100');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`cid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=299;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
