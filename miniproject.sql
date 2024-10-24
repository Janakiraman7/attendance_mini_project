-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2024 at 07:47 AM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `miniproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE IF NOT EXISTS `attendance` (
  `aid` int(11) NOT NULL,
  `regno` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `period` int(5) NOT NULL,
  `status` smallint(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`aid`, `regno`, `date`, `period`, `status`) VALUES
(1, '22cs0515', '2024-10-23', 1, 1),
(2, '22cs0515', '2024-10-23', 2, 0);

--
-- Triggers `attendance`
--
DELIMITER $$
CREATE TRIGGER `update_attendance` AFTER UPDATE ON `attendance`
 FOR EACH ROW BEGIN
    SET @classes_present = 0;
    SET @classes_abscent = 0;
    SET @total_classes = 0;


   SELECT 
    
    COUNT(status) into @classes_present
FROM 
    attendance
    
WHERE regno=new.regno AND status=1;


 SELECT 
    
    COUNT(status) into @classes_abscent
FROM 
    attendance
    
WHERE regno=new.regno AND status=0;

 SELECT 
    
    count(status) into @total_classes
FROM 
    attendance
    
WHERE regno=new.regno;

UPDATE stdinfo SET present=@classes_present,abscent=@classes_abscent,attendance=(@classes_present/@total_classes)*100 WHERE regno=new.regno;
    
  
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `stdinfo`
--

CREATE TABLE IF NOT EXISTS `stdinfo` (
  `sid` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `regno` varchar(20) NOT NULL,
  `department` varchar(5) NOT NULL,
  `year` int(5) NOT NULL,
  `present` int(20) DEFAULT NULL,
  `abscent` int(20) DEFAULT NULL,
  `attendance` float(30,2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stdinfo`
--

INSERT INTO `stdinfo` (`sid`, `name`, `regno`, `department`, `year`, `present`, `abscent`, `attendance`) VALUES
(1, 'janakiraman', '22cs0515', 'bsc', 3, 1, 1, 50.00);

-- --------------------------------------------------------

--
-- Table structure for table `teachers_details`
--

CREATE TABLE IF NOT EXISTS `teachers_details` (
  `sno` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `id` int(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers_details`
--

INSERT INTO `teachers_details` (`sno`, `name`, `id`, `password`) VALUES
(1, 'janakiraman', 12345, 'hi');

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE IF NOT EXISTS `timetable` (
  `sno` int(10) NOT NULL,
  `id` int(11) NOT NULL,
  `day` varchar(20) NOT NULL,
  `period1` varchar(20) NOT NULL,
  `period2` varchar(20) NOT NULL,
  `period3` varchar(20) NOT NULL,
  `period4` varchar(20) NOT NULL,
  `period5` varchar(20) NOT NULL,
  `period6` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`sno`, `id`, `day`, `period1`, `period2`, `period3`, `period4`, `period5`, `period6`) VALUES
(1, 12345, 'monday', 'bsc1(c)', 'bsc2(java)', 'bsc3(php)', 'lab', '-', 'bsc1(c)');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `stdinfo`
--
ALTER TABLE `stdinfo`
  ADD UNIQUE KEY `serialno` (`sid`),
  ADD UNIQUE KEY `regno` (`regno`),
  ADD UNIQUE KEY `regno_2` (`regno`),
  ADD UNIQUE KEY `regno_4` (`regno`),
  ADD KEY `regno_3` (`regno`);

--
-- Indexes for table `teachers_details`
--
ALTER TABLE `teachers_details`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `id_2` (`id`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `stdinfo`
--
ALTER TABLE `stdinfo`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `teachers_details`
--
ALTER TABLE `teachers_details`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
