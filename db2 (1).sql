-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2021 at 06:48 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblcollege`
--

CREATE TABLE `tblcollege` (
  `id` int(11) NOT NULL,
  `collegeshort` varchar(20) NOT NULL,
  `college` varchar(100) NOT NULL,
  `seal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcollege`
--

INSERT INTO `tblcollege` (`id`, `collegeshort`, `college`, `seal`) VALUES
(5, 'ICS', 'Institute of Computer Studies', 'ics-seal.png'),
(6, 'COE', 'College of Engineering', 'wmsu-seal.png');

-- --------------------------------------------------------

--
-- Table structure for table `tblcourse`
--

CREATE TABLE `tblcourse` (
  `id` int(11) NOT NULL,
  `courseshort` varchar(20) NOT NULL,
  `course` varchar(100) NOT NULL,
  `yearlevels` int(11) NOT NULL,
  `collegeid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcourse`
--

INSERT INTO `tblcourse` (`id`, `courseshort`, `course`, `yearlevels`, `collegeid`) VALUES
(7, 'BSCS', 'Bachelor of Science in Computer Science', 4, 5),
(8, 'BSIS', 'Bachelor of Science in Information Science', 4, 5),
(9, 'BSIT', 'Bachelor of Science in Information Technology', 4, 5),
(10, 'BSCL', 'Bachelor of Science in Ikdapkjefjajor', 4, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tblcurriculum`
--

CREATE TABLE `tblcurriculum` (
  `id` int(11) NOT NULL,
  `CMO` varchar(100) NOT NULL,
  `BoardResolution` varchar(100) NOT NULL,
  `effectiveSYfrom` int(11) NOT NULL,
  `effectiveSYto` int(11) NOT NULL,
  `courseid` int(11) NOT NULL,
  `collegeid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcurriculum`
--

INSERT INTO `tblcurriculum` (`id`, `CMO`, `BoardResolution`, `effectiveSYfrom`, `effectiveSYto`, `courseid`, `collegeid`) VALUES
(4, 'CMO1', 'BR1', 2000, 2003, 7, 5),
(5, 'CMO2', 'BR2', 2005, 2008, 8, 5),
(6, 'CMO3', 'BR3', 20010, 2013, 9, 5),
(7, 'CM01', 'BR1', 2000, 2003, 10, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tblnotification`
--

CREATE TABLE `tblnotification` (
  `accountID` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `college` varchar(100) NOT NULL,
  `course` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblnotification`
--

INSERT INTO `tblnotification` (`accountID`, `firstname`, `lastname`, `email`, `college`, `course`, `year`) VALUES
('20000', 'ren', 'tum', 'bg20000@wmsu.edu.ph', 'Institute of Computer Studies', 'Bachelor of Science in Computer Science', '1'),
('111111', 'r', 't', 'bg201802824@wsmu.edu.ph', 'Institute of Computer Studies', 'Bachelor of Science in Computer Science', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tblprereq`
--

CREATE TABLE `tblprereq` (
  `id` int(11) NOT NULL,
  `subjectid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblsection`
--

CREATE TABLE `tblsection` (
  `id` int(11) NOT NULL,
  `sectioncode` varchar(50) NOT NULL,
  `section` varchar(50) NOT NULL,
  `courseid` int(11) NOT NULL,
  `yearlevel` int(11) NOT NULL,
  `numberofstudents` int(11) NOT NULL,
  `availableslot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblsubject`
--

CREATE TABLE `tblsubject` (
  `id` int(11) NOT NULL,
  `subjectcode` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `lec` int(11) NOT NULL,
  `lab` int(11) NOT NULL,
  `units` int(11) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `curriculumid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `collegeid` int(11) NOT NULL,
  `courseid` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`id`, `username`, `password`, `usertype`, `collegeid`, `courseid`, `created_at`) VALUES
(1, 'reniel125', 'reniel125', 'Superadmin', 0, 0, '2021-04-03 07:52:29'),
(9, 'erick123', 'erick123', 'Admin', 5, 0, '2021-04-03 11:28:44'),
(10, 'reno11', 'reno11', 'Admin', 6, 0, '2021-04-03 11:29:08');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `collegeid` int(11) NOT NULL,
  `courseid` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `username`, `password`, `usertype`, `collegeid`, `courseid`, `created_at`, `status`) VALUES
(1, 'jay77', 'jay77', 'Adviser', 5, 7, '2021-04-05 07:29:29', 0),
(2, 'reniel125', 'reniel125', 'Superadmin', 0, 0, '2021-04-05 07:32:41', 0),
(3, 'erick123', 'erick123', 'Admin', 5, 0, '2021-04-05 07:36:04', 0),
(4, 'reno11', 'reno11', 'Admin', 6, 0, '2021-04-05 07:36:26', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbluser_details`
--

CREATE TABLE `tbluser_details` (
  `userid` int(11) NOT NULL,
  `username` varchar(500) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `usertype` varchar(100) NOT NULL,
  `advisedTo` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` int(11) NOT NULL,
  `college` varchar(100) NOT NULL,
  `course` varchar(500) NOT NULL,
  `year` varchar(20) NOT NULL,
  `status` varchar(50) NOT NULL,
  `accountStatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbluser_details`
--

INSERT INTO `tbluser_details` (`userid`, `username`, `firstname`, `lastname`, `usertype`, `advisedTo`, `email`, `contact`, `college`, `course`, `year`, `status`, `accountStatus`) VALUES
(0, '20000', 'ren', 'tum', '', '', 'bg20000@wmsu.edu.ph', 0, 'Institute of Computer Studies', 'Bachelor of Science in Computer Science', '1', 'Old Student', ''),
(0, '111111', 'r', 't', '', '', 'bg201802824@wsmu.edu.ph', 0, 'Institute of Computer Studies', 'Bachelor of Science in Computer Science', '1', 'Old Student', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblcollege`
--
ALTER TABLE `tblcollege`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`collegeshort`),
  ADD UNIQUE KEY `name` (`college`),
  ADD UNIQUE KEY `seal` (`seal`);

--
-- Indexes for table `tblcourse`
--
ALTER TABLE `tblcourse`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`courseshort`),
  ADD UNIQUE KEY `name` (`course`),
  ADD KEY `collegeid` (`collegeid`);

--
-- Indexes for table `tblcurriculum`
--
ALTER TABLE `tblcurriculum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsubject`
--
ALTER TABLE `tblsubject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`username`),
  ADD UNIQUE KEY `collegeid` (`collegeid`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblcollege`
--
ALTER TABLE `tblcollege`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tblcourse`
--
ALTER TABLE `tblcourse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblcurriculum`
--
ALTER TABLE `tblcurriculum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblsubject`
--
ALTER TABLE `tblsubject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblcourse`
--
ALTER TABLE `tblcourse`
  ADD CONSTRAINT `collegeid` FOREIGN KEY (`collegeid`) REFERENCES `tblcollege` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
