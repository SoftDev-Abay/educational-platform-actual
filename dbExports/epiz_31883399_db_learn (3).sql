-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql305.epizy.com
-- Generation Time: Nov 28, 2022 at 03:05 AM
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
-- Database: `epiz_31883399_db_learn`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assignments`
--

CREATE TABLE `tbl_assignments` (
  `Assignment_ID` int(11) NOT NULL,
  `Grade` int(255) NOT NULL,
  `Subject` varchar(30) NOT NULL,
  `Name_assignments` varchar(100) NOT NULL,
  `Link` varchar(255) NOT NULL,
  `Deadline` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_assignments`
--

INSERT INTO `tbl_assignments` (`Assignment_ID`, `Grade`, `Subject`, `Name_assignments`, `Link`, `Deadline`) VALUES
(22, 12, '', 'Logariphm ', 'https://forms.office.com/Pages/ResponsePage.aspx?id=yVLbOR7jwkKAg3U1W3KN47wBIghEUp9AloWICmpKCyJUN0FTQzdNWU1WT0ZZVENERzNGVk5GUDVRRC4u', '2022-04-10 00:00:00'),
(23, 12, '', 'Volume of a cube', 'https://forms.office.com/r/91BTpf8g3M', '2022-04-15 00:00:00'),
(24, 12, '', 'Trigonometric functions', 'https://forms.office.com/r/3NNE1HuhVp', '2022-04-23 00:00:00'),
(25, 12, '', 'Dynamical systems and differential equations.', 'https://forms.office.com/r/8ZnYxgTb75', '2022-04-01 00:00:00'),
(30, 12, '', 'Area of triangle ', 'aasdasasdfsf', '2022-11-01 00:00:00'),
(31, 7, '', 'APA style', 'https://www.youtube.com/watch?v=9zBsdzdE4sM&t=765s', '2022-11-03 00:00:00'),
(32, 10, '', 'Headging Language', '.', '2022-11-30 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assignments_users`
--

CREATE TABLE `tbl_assignments_users` (
  `id` int(20) NOT NULL,
  `Assignment_ID` int(20) NOT NULL,
  `Student_ID` int(20) NOT NULL,
  `Completed` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_classes`
--

CREATE TABLE `tbl_classes` (
  `ClassID` int(20) NOT NULL,
  `Grade` int(5) NOT NULL,
  `ClassIndex` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_classes_teachers`
--

CREATE TABLE `tbl_classes_teachers` (
  `ID` int(11) NOT NULL,
  `ClassID` int(20) NOT NULL,
  `TeacherID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_grades`
--

CREATE TABLE `tbl_grades` (
  `Grade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_grades`
--

INSERT INTO `tbl_grades` (`Grade`) VALUES
(7),
(8),
(9),
(10),
(11),
(12);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lessons`
--

CREATE TABLE `tbl_lessons` (
  `Lesson_ID` int(11) NOT NULL,
  `Grade` int(255) NOT NULL,
  `Subject` varchar(30) NOT NULL,
  `Name_Lesson` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_lessons`
--

INSERT INTO `tbl_lessons` (`Lesson_ID`, `Grade`, `Subject`, `Name_Lesson`, `Description`, `file_name`) VALUES
(19, 7, 'math', 'SAU preparation', 'asdadad', 'Алиев Абай (4).pdf'),
(20, 7, '', 'SAU preparation', 'Desc', 'zyro-image (2).png'),
(21, 7, '', 'title of the les', 'hmmm', 'Abay Ruslanovich Aliyev-679160 (1).jpg'),
(22, 12, '', 'Integrals', 'how to solve indefinite integrals ', 'indefinite integral.pdf'),
(23, 7, 'russian_language', 'Padeshi', 'Funcdamential rules', 'photo_5434098687572821797_y.jpg'),
(24, 12, 'english_language', 'Academic Integrity', 'Lesson 3, Week 1', 'B2_W1_Lesson 3.Academic integrity.pptx'),
(25, 12, 'english_language', 'Week 3, Lesson 2', '.', 'B2_W2_Lesson_3.pptx'),
(26, 12, 'english_language', 'APA Style', 'Overview ', 'APA_Citation_Style_Overview___7th_Edition__2020_.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subjects`
--

CREATE TABLE `tbl_subjects` (
  `SubjectID` int(20) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Grade` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subjects`
--

INSERT INTO `tbl_subjects` (`SubjectID`, `Name`, `Grade`) VALUES
(1, 'Math', 11),
(2, 'Russian', 11),
(3, 'Kazakh', 11);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teachers`
--

CREATE TABLE `tbl_teachers` (
  `Teacher_ID` int(11) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Surname` varchar(25) NOT NULL,
  `Login` varchar(25) NOT NULL,
  `Password` varchar(25) NOT NULL,
  `Gender` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `Login` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Name` varchar(60) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `Role` varchar(8) NOT NULL DEFAULT 'user',
  `Student_ID` int(11) NOT NULL,
  `Grade` int(2) NOT NULL,
  `Class_Index` varchar(1) NOT NULL,
  `Surname` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`Login`, `Password`, `Name`, `Gender`, `Role`, `Student_ID`, `Grade`, `Class_Index`, `Surname`) VALUES
('abay', '4444', 'Abay ', 'male', 'admin', 16, 12, 'E', 'Aliyev'),
('zaure', '0000', 'Zaure', 'male', 'user', 18, 12, '1', 'sur'),
('aydar', '00', 'Aydar', 'male', 'user', 27, 7, '7', 'Abduali'),
('babay', '0000', 'babay', 'male', 'user', 29, 7, 'A', 'babev'),
('AbayLove', 'LoveypuAbay', 'Assel', 'female', 'user', 30, 11, 'A', 'Bocha'),
('AbayLove', 'AbayLove', 'Assel', 'female', 'user', 31, 11, 'A', 'Aliyeva '),
('kamilla', '55', 'Kamilla', 'male', 'user', 35, 7, '', 'Kamilla'),
('assel', 'qwerty1!', 'Assel', 'female', 'admin', 107, 11, '', 'Nurlybayeva');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_assignments`
--
ALTER TABLE `tbl_assignments`
  ADD PRIMARY KEY (`Assignment_ID`),
  ADD KEY `Grade` (`Grade`);

--
-- Indexes for table `tbl_assignments_users`
--
ALTER TABLE `tbl_assignments_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Assignment_ID` (`Assignment_ID`,`Student_ID`),
  ADD KEY `User_ID` (`Student_ID`);

--
-- Indexes for table `tbl_classes`
--
ALTER TABLE `tbl_classes`
  ADD PRIMARY KEY (`ClassID`);

--
-- Indexes for table `tbl_classes_teachers`
--
ALTER TABLE `tbl_classes_teachers`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ClassID` (`ClassID`,`TeacherID`),
  ADD KEY `TeacherID` (`TeacherID`);

--
-- Indexes for table `tbl_grades`
--
ALTER TABLE `tbl_grades`
  ADD PRIMARY KEY (`Grade`);

--
-- Indexes for table `tbl_lessons`
--
ALTER TABLE `tbl_lessons`
  ADD PRIMARY KEY (`Lesson_ID`),
  ADD KEY `Grade` (`Grade`);

--
-- Indexes for table `tbl_subjects`
--
ALTER TABLE `tbl_subjects`
  ADD PRIMARY KEY (`SubjectID`);

--
-- Indexes for table `tbl_teachers`
--
ALTER TABLE `tbl_teachers`
  ADD PRIMARY KEY (`Teacher_ID`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`Student_ID`),
  ADD KEY `Grade` (`Grade`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_assignments`
--
ALTER TABLE `tbl_assignments`
  MODIFY `Assignment_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_assignments_users`
--
ALTER TABLE `tbl_assignments_users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_classes`
--
ALTER TABLE `tbl_classes`
  MODIFY `ClassID` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_classes_teachers`
--
ALTER TABLE `tbl_classes_teachers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_grades`
--
ALTER TABLE `tbl_grades`
  MODIFY `Grade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_lessons`
--
ALTER TABLE `tbl_lessons`
  MODIFY `Lesson_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_subjects`
--
ALTER TABLE `tbl_subjects`
  MODIFY `SubjectID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_teachers`
--
ALTER TABLE `tbl_teachers`
  MODIFY `Teacher_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `Student_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_assignments`
--
ALTER TABLE `tbl_assignments`
  ADD CONSTRAINT `tbl_assignments_ibfk_1` FOREIGN KEY (`Grade`) REFERENCES `tbl_grades` (`Grade`);

--
-- Constraints for table `tbl_assignments_users`
--
ALTER TABLE `tbl_assignments_users`
  ADD CONSTRAINT `tbl_assignments_users_ibfk_1` FOREIGN KEY (`Assignment_ID`) REFERENCES `tbl_assignments` (`Assignment_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_assignments_users_ibfk_2` FOREIGN KEY (`Student_ID`) REFERENCES `tbl_users` (`Student_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_classes_teachers`
--
ALTER TABLE `tbl_classes_teachers`
  ADD CONSTRAINT `tbl_classes_teachers_ibfk_1` FOREIGN KEY (`ClassID`) REFERENCES `tbl_classes` (`ClassID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_classes_teachers_ibfk_2` FOREIGN KEY (`TeacherID`) REFERENCES `tbl_teachers` (`Teacher_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_lessons`
--
ALTER TABLE `tbl_lessons`
  ADD CONSTRAINT `tbl_lessons_ibfk_1` FOREIGN KEY (`Grade`) REFERENCES `tbl_grades` (`Grade`);

--
-- Constraints for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD CONSTRAINT `tbl_users_ibfk_1` FOREIGN KEY (`Grade`) REFERENCES `tbl_grades` (`Grade`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
