-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 31, 2021 at 01:57 AM
-- Server version: 10.4.15-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u161272378_pre_advisingdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblcollege`
--

CREATE TABLE `tblcollege` (
  `id` int(200) NOT NULL,
  `collegecode` varchar(20) NOT NULL,
  `college` varchar(100) NOT NULL,
  `seal` varchar(50) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `admin_exist` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcollege`
--

INSERT INTO `tblcollege` (`id`, `collegecode`, `college`, `seal`, `date_created`, `admin_exist`) VALUES
(26, 'ICS', 'Institute of Computer Study', 'ics.png', '2021-05-30 10:34:27', 1),
(27, 'CLA', 'College of Liberal Arts', 'cla-.png', '2021-05-28 11:05:09', 0),
(28, 'CET', 'College of Engineering and Technology', 'cet-.png', '2021-05-28 11:14:18', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblcourse`
--

CREATE TABLE `tblcourse` (
  `id` int(200) NOT NULL,
  `coursecode` varchar(20) NOT NULL,
  `course` varchar(100) NOT NULL,
  `college_id_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcourse`
--

INSERT INTO `tblcourse` (`id`, `coursecode`, `course`, `college_id_fk`) VALUES
(25, 'BSCS', 'Bachelor of Science in Computer Science', 26),
(32, 'BSCF', 'Bachelor of Science in fgfhgjhkjlk', 27);

-- --------------------------------------------------------

--
-- Table structure for table `tblcurriculum`
--

CREATE TABLE `tblcurriculum` (
  `id` int(11) NOT NULL,
  `curr_code` varchar(50) NOT NULL,
  `cmo` varchar(255) NOT NULL,
  `board_reso` varchar(255) NOT NULL,
  `effectiveSY` varchar(50) NOT NULL,
  `other_details` varchar(200) NOT NULL,
  `course_id_fk` int(200) DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcurriculum`
--

INSERT INTO `tblcurriculum` (`id`, `curr_code`, `cmo`, `board_reso`, `effectiveSY`, `other_details`, `course_id_fk`, `date_added`) VALUES
(55, 'BSCS(2009 - 2003)', 'CM02', 'BR2', '2009 - 2003', '', 25, '2021-05-28 04:07:08');

-- --------------------------------------------------------

--
-- Table structure for table `tblprereq`
--

CREATE TABLE `tblprereq` (
  `id` int(11) NOT NULL,
  `subjectcode` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `lab` int(11) NOT NULL,
  `lec` int(11) NOT NULL,
  `units` int(11) NOT NULL,
  `yearlevel` int(11) NOT NULL,
  `semester` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblrequest_account`
--

CREATE TABLE `tblrequest_account` (
  `id` int(200) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `req_usertype` varchar(20) NOT NULL,
  `college_id_fk` int(200) NOT NULL,
  `course_id_fk` int(200) DEFAULT NULL,
  `yearlevel` int(11) NOT NULL,
  `user_id_fk` int(200) NOT NULL,
  `date_requested` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblschedule`
--

CREATE TABLE `tblschedule` (
  `id` int(11) NOT NULL,
  `subject_id_fk` int(200) NOT NULL,
  `days` varchar(50) NOT NULL,
  `time-start` varchar(20) NOT NULL,
  `time-end` varchar(20) NOT NULL,
  `room` varchar(200) NOT NULL,
  `section_id_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblsection`
--

CREATE TABLE `tblsection` (
  `id` int(200) NOT NULL,
  `sectioncode` varchar(50) NOT NULL,
  `course_id_fk` int(11) NOT NULL,
  `adviser_id_fk` int(200) DEFAULT NULL,
  `yearlevel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblstudent_grades_sub`
--

CREATE TABLE `tblstudent_grades_sub` (
  `id` int(200) NOT NULL,
  `grades_filename` varchar(50) NOT NULL,
  `student_id_fk` int(200) NOT NULL,
  `submission_status` varchar(50) NOT NULL,
  `date_submitted` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblstudent_grades_sub`
--

INSERT INTO `tblstudent_grades_sub` (`id`, `grades_filename`, `student_id_fk`, `submission_status`, `date_submitted`) VALUES
(21, 'database.txt', 105, 'Pending', '2021-05-29 10:42:33');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudent_selected_subjects`
--

CREATE TABLE `tblstudent_selected_subjects` (
  `id` int(11) NOT NULL,
  `submission_id_fk` int(11) NOT NULL,
  `schedule_id_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblstudent_subject_sub`
--

CREATE TABLE `tblstudent_subject_sub` (
  `id` int(11) NOT NULL,
  `student_id_fk` int(11) NOT NULL,
  `section_id_fk` int(11) NOT NULL,
  `submission_status` varchar(50) NOT NULL,
  `date_submitted` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblstudent_subject_sub`
--

INSERT INTO `tblstudent_subject_sub` (`id`, `student_id_fk`, `section_id_fk`, `submission_status`, `date_submitted`) VALUES
(5, 98, 67, 'Pending', '2021-05-21 07:25:01'),
(6, 98, 67, 'Pending', '2021-05-21 07:40:43'),
(7, 98, 67, 'Pending', '2021-05-21 07:42:09');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubject`
--

CREATE TABLE `tblsubject` (
  `id` int(200) NOT NULL,
  `subject_code` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `lec` int(10) NOT NULL,
  `lab` int(10) NOT NULL,
  `units` int(50) NOT NULL,
  `yearlevel` int(5) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `prerequisite` int(20) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `curr_id_fk` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblsubject`
--

INSERT INTO `tblsubject` (`id`, `subject_code`, `description`, `lec`, `lab`, `units`, `yearlevel`, `semester`, `prerequisite`, `date_added`, `curr_id_fk`) VALUES
(53, 'CC100', 'Subject1', 3, 3, 6, 1, '1st', 0, '2021-05-31 00:19:53', 55),
(54, 'C200', 'Subject2', 3, 3, 6, 1, '2nd', 0, '2021-05-31 00:21:05', 55);

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `id` int(200) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `college_id_fk` int(200) DEFAULT NULL,
  `course_id_fk` int(200) DEFAULT NULL,
  `yearlevel` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`id`, `firstname`, `lastname`, `email`, `password`, `usertype`, `contact`, `college_id_fk`, `course_id_fk`, `yearlevel`, `date_created`) VALUES
(1, '', '', 'bg11111@wmsu.edu.ph', 'reniel125', 'Superadmin', '0', NULL, NULL, 0, '2021-05-21 05:42:49'),
(103, 'Erwyn', 'Evas', 'erwynfgf@wmsu.edu.ph', 'dfghghjkjl.k', 'Adviser', '09453621313', 26, NULL, 0, '2021-05-29 14:54:29'),
(105, 'Reniel', 'Tumacas', 'bg444444@wmsu.edu.ph', 'sadfghjkl;', 'Student', '09214567821', 26, NULL, 0, '2021-05-29 13:08:42'),
(106, 'Reniel', 'Tumacas', 'bg2222@wmsu.edu.ph', '22222222222222222', 'Admin', '09832323122', 26, NULL, 0, '2021-05-29 14:42:18');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser_adviser`
--

CREATE TABLE `tbluser_adviser` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `college_id_fk` int(11) NOT NULL,
  `course_id_fk` int(11) NOT NULL,
  `year_assigned` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbluser_student`
--

CREATE TABLE `tbluser_student` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `college_id_fk` int(11) NOT NULL,
  `course_id_fk` int(11) NOT NULL,
  `yearlevel` int(11) NOT NULL,
  `section_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblcollege`
--
ALTER TABLE `tblcollege`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcourse`
--
ALTER TABLE `tblcourse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `college_id_fk` (`college_id_fk`);

--
-- Indexes for table `tblcurriculum`
--
ALTER TABLE `tblcurriculum`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id_fk` (`course_id_fk`);

--
-- Indexes for table `tblprereq`
--
ALTER TABLE `tblprereq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblrequest_account`
--
ALTER TABLE `tblrequest_account`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id_fk` (`course_id_fk`),
  ADD KEY `college_id_fk` (`college_id_fk`),
  ADD KEY `user_id_fk` (`user_id_fk`);

--
-- Indexes for table `tblschedule`
--
ALTER TABLE `tblschedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `section_id_fk` (`section_id_fk`),
  ADD KEY `subject_id_fk` (`subject_id_fk`);

--
-- Indexes for table `tblsection`
--
ALTER TABLE `tblsection`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id_fk` (`course_id_fk`),
  ADD KEY `adviser_id_fk` (`adviser_id_fk`);

--
-- Indexes for table `tblstudent_grades_sub`
--
ALTER TABLE `tblstudent_grades_sub`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id_fk` (`student_id_fk`);

--
-- Indexes for table `tblstudent_selected_subjects`
--
ALTER TABLE `tblstudent_selected_subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tblstudent_selected_subjects_ibfk_1` (`schedule_id_fk`),
  ADD KEY `tblstudent_selected_subjects_ibfk_2` (`submission_id_fk`);

--
-- Indexes for table `tblstudent_subject_sub`
--
ALTER TABLE `tblstudent_subject_sub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsubject`
--
ALTER TABLE `tblsubject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `curr_id_fk` (`curr_id_fk`),
  ADD KEY `prerequisite` (`prerequisite`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`id`),
  ADD KEY `college_id_fk` (`college_id_fk`),
  ADD KEY `course_id_fk` (`course_id_fk`);

--
-- Indexes for table `tbluser_adviser`
--
ALTER TABLE `tbluser_adviser`
  ADD PRIMARY KEY (`id`),
  ADD KEY `college` (`college_id_fk`),
  ADD KEY `course` (`course_id_fk`);

--
-- Indexes for table `tbluser_student`
--
ALTER TABLE `tbluser_student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `college_id_fk` (`college_id_fk`),
  ADD KEY `course_id_fk` (`course_id_fk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblcollege`
--
ALTER TABLE `tblcollege`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tblcourse`
--
ALTER TABLE `tblcourse`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tblcurriculum`
--
ALTER TABLE `tblcurriculum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `tblprereq`
--
ALTER TABLE `tblprereq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblrequest_account`
--
ALTER TABLE `tblrequest_account`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tblschedule`
--
ALTER TABLE `tblschedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `tblsection`
--
ALTER TABLE `tblsection`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `tblstudent_grades_sub`
--
ALTER TABLE `tblstudent_grades_sub`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tblstudent_selected_subjects`
--
ALTER TABLE `tblstudent_selected_subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `tblstudent_subject_sub`
--
ALTER TABLE `tblstudent_subject_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblsubject`
--
ALTER TABLE `tblsubject`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `tbluser_student`
--
ALTER TABLE `tbluser_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblcourse`
--
ALTER TABLE `tblcourse`
  ADD CONSTRAINT `tblcourse_ibfk_1` FOREIGN KEY (`college_id_fk`) REFERENCES `tblcollege` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblcurriculum`
--
ALTER TABLE `tblcurriculum`
  ADD CONSTRAINT `tblcurriculum_ibfk_1` FOREIGN KEY (`course_id_fk`) REFERENCES `tblcourse` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblrequest_account`
--
ALTER TABLE `tblrequest_account`
  ADD CONSTRAINT `tblrequest_account_ibfk_1` FOREIGN KEY (`course_id_fk`) REFERENCES `tblcourse` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblrequest_account_ibfk_2` FOREIGN KEY (`college_id_fk`) REFERENCES `tblcollege` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblrequest_account_ibfk_3` FOREIGN KEY (`user_id_fk`) REFERENCES `tbluser` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblschedule`
--
ALTER TABLE `tblschedule`
  ADD CONSTRAINT `section_id_fk` FOREIGN KEY (`section_id_fk`) REFERENCES `tblsection` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblschedule_ibfk_1` FOREIGN KEY (`subject_id_fk`) REFERENCES `tblsubject` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblsection`
--
ALTER TABLE `tblsection`
  ADD CONSTRAINT `tblsection_ibfk_1` FOREIGN KEY (`course_id_fk`) REFERENCES `tblcourse` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblsection_ibfk_2` FOREIGN KEY (`adviser_id_fk`) REFERENCES `tbluser` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblstudent_grades_sub`
--
ALTER TABLE `tblstudent_grades_sub`
  ADD CONSTRAINT `student_id_fk` FOREIGN KEY (`student_id_fk`) REFERENCES `tbluser` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblstudent_selected_subjects`
--
ALTER TABLE `tblstudent_selected_subjects`
  ADD CONSTRAINT `tblstudent_selected_subjects_ibfk_1` FOREIGN KEY (`schedule_id_fk`) REFERENCES `tblschedule` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblstudent_selected_subjects_ibfk_2` FOREIGN KEY (`submission_id_fk`) REFERENCES `tblstudent_subject_sub` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblsubject`
--
ALTER TABLE `tblsubject`
  ADD CONSTRAINT `curr_id_fk` FOREIGN KEY (`curr_id_fk`) REFERENCES `tblcurriculum` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD CONSTRAINT `tbluser_ibfk_1` FOREIGN KEY (`college_id_fk`) REFERENCES `tblcollege` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbluser_ibfk_2` FOREIGN KEY (`course_id_fk`) REFERENCES `tblcourse` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbluser_adviser`
--
ALTER TABLE `tbluser_adviser`
  ADD CONSTRAINT `college` FOREIGN KEY (`college_id_fk`) REFERENCES `tbluser` (`college_id_fk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course` FOREIGN KEY (`course_id_fk`) REFERENCES `tbluser` (`course_id_fk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbluser_student`
--
ALTER TABLE `tbluser_student`
  ADD CONSTRAINT `college_id_fk` FOREIGN KEY (`college_id_fk`) REFERENCES `tbluser` (`college_id_fk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course_id_fk` FOREIGN KEY (`course_id_fk`) REFERENCES `tbluser` (`course_id_fk`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
