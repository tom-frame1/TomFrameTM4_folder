-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 13, 2017 at 07:10 PM
-- Server version: 5.6.34
-- PHP Version: 7.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bit695_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `boardgames`
--

CREATE TABLE `boardgames` (
  `memberid` int(11) NOT NULL COMMENT 'Member number',
  `boardgame` varchar(30) NOT NULL COMMENT 'Board game name'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Board game owned by player';

--
-- Dumping data for table `boardgames`
--

INSERT INTO `boardgames` (`memberid`, `boardgame`) VALUES
(1, 'Scrabble'),
(2, 'Monopoly'),
(3, 'Cluedo'),
(4, 'Risk');

-- --------------------------------------------------------

--
-- Table structure for table `boardgamesassigned`
--

CREATE TABLE `boardgamesassigned` (
  `boardgame1` varchar(30) NOT NULL COMMENT 'Board game name 1',
  `boardgame2` varchar(30) NOT NULL COMMENT 'Board game name 2',
  `boardgame3` varchar(30) NOT NULL COMMENT 'Board game name 3',
  `boardgame4` varchar(30) NOT NULL COMMENT 'Board game name 4',
  `memberid` int(11) NOT NULL COMMENT 'Member number'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Board game assigned to player';

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `memberid` int(11) NOT NULL COMMENT 'Member number',
  `firstname` varchar(30) NOT NULL COMMENT 'First name',
  `familyname` varchar(40) NOT NULL COMMENT 'Family name',
  `email` varchar(40) NOT NULL COMMENT 'Email address',
  `phone` int(15) NOT NULL COMMENT 'Phone number'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Player details';

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`memberid`, `firstname`, `familyname`, `email`, `phone`) VALUES
(1, 'Bert', 'Hailey', 'burt_hailey@gmail.com', 21000000),
(2, 'Nessa ', 'Tammara', 'nessa_tammara@hotmail.com', 27000000),
(3, 'Lexie', 'Ann', 'lexie_ann@gmail.com', 21000001),
(4, 'Louella', 'Monroe', 'louella_monroe@hotmail.com', 27000001);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `eventname` varchar(30) NOT NULL COMMENT 'Event name',
  `date` date NOT NULL COMMENT 'Date',
  `time` time(6) NOT NULL COMMENT 'Time',
  `venue` varchar(30) NOT NULL COMMENT 'Venue'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Schedule';

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`eventname`, `date`, `time`, `venue`) VALUES
('Big Game Night', '2017-02-16', '20:00:00.000000', 'The Venue');

-- --------------------------------------------------------

--
-- Table structure for table `scoring`
--

CREATE TABLE `scoring` (
  `memberid` int(11) NOT NULL COMMENT 'Member number',
  `score` int(10) NOT NULL COMMENT 'Score'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Player score overall';

--
-- Dumping data for table `scoring`
--

INSERT INTO `scoring` (`memberid`, `score`) VALUES
(1, 100),
(2, 86),
(3, 88);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `boardgames`
--
ALTER TABLE `boardgames`
  ADD PRIMARY KEY (`boardgame`),
  ADD KEY `boardgame` (`boardgame`),
  ADD KEY `memberid_2` (`memberid`);

--
-- Indexes for table `boardgamesassigned`
--
ALTER TABLE `boardgamesassigned`
  ADD PRIMARY KEY (`memberid`),
  ADD KEY `boardgame` (`boardgame1`),
  ADD KEY `memberid` (`memberid`),
  ADD KEY `boardgame2` (`boardgame2`,`boardgame3`,`boardgame4`),
  ADD KEY `boardgame3` (`boardgame3`),
  ADD KEY `boardgame4` (`boardgame4`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`memberid`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`eventname`);

--
-- Indexes for table `scoring`
--
ALTER TABLE `scoring`
  ADD KEY `memberid` (`memberid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `memberid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Member number', AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `boardgames`
--
ALTER TABLE `boardgames`
  ADD CONSTRAINT `boardgames_ibfk_1` FOREIGN KEY (`memberid`) REFERENCES `players` (`memberid`);

--
-- Constraints for table `boardgamesassigned`
--
ALTER TABLE `boardgamesassigned`
  ADD CONSTRAINT `boardgamesassigned_ibfk_1` FOREIGN KEY (`memberid`) REFERENCES `players` (`memberid`),
  ADD CONSTRAINT `boardgamesassigned_ibfk_2` FOREIGN KEY (`boardgame1`) REFERENCES `boardgames` (`boardgame`),
  ADD CONSTRAINT `boardgamesassigned_ibfk_3` FOREIGN KEY (`boardgame2`) REFERENCES `boardgames` (`boardgame`),
  ADD CONSTRAINT `boardgamesassigned_ibfk_4` FOREIGN KEY (`boardgame3`) REFERENCES `boardgames` (`boardgame`),
  ADD CONSTRAINT `boardgamesassigned_ibfk_5` FOREIGN KEY (`boardgame4`) REFERENCES `boardgames` (`boardgame`);

--
-- Constraints for table `scoring`
--
ALTER TABLE `scoring`
  ADD CONSTRAINT `scoring_ibfk_1` FOREIGN KEY (`memberid`) REFERENCES `players` (`memberid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
