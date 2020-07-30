-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 01, 2020 at 11:08 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `Announcements`
--

CREATE TABLE `Announcements` (
  `announcement_id` int(11) NOT NULL,
  `announcement_subject` varchar(500) NOT NULL,
  `announcement_description` varchar(1000) NOT NULL,
  `announcement_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `course_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Announcements`
--

INSERT INTO `Announcements` (`announcement_id`, `announcement_subject`, `announcement_description`, `announcement_time`, `course_id`, `teacher_id`) VALUES
(1, 'Last 2 quizzes [5 May 2020 at 14:00]', 'We are going to start the group presentations tomorrow. Because of tight agenda, everyone needs to be ready on time.', '2020-06-01 08:35:03', 4, 2),
(2, 'Welcome', 'I would like to say welcome to all my new students and have a nice semster all.', '2020-06-01 08:46:43', 1, 1),
(3, 'Stay safe', 'I would like to make sure that all of you stay at home and be careful.', '2020-06-01 08:47:16', 2, 1),
(4, 'Last 2 quizzes', '\r\nDear students,\r\n\r\nYou will have your last 2 quizzes, 5 May 2020 at 14:00. The quizzess are currently unavailable to you. To see your quizzes go to Bilgi Learn Weekly Content this Tuesday at 14:00 . \r\n\r\nQuiz3 will be available to you at exactly 14:00,  5 June 2020.  It will be unavailable to you again at 14:10. You have 10 minutes to answer 5 questions.\r\nQuiz4 will be available to you at exactly 14:15, 5 June 2020.  It will be unavailable to you again at 14:25. You have 10 minutes to answer 5 questions.\r\nIrrespective of your starting time, Quiz3 and Quiz4 will become unavailable to you at 14:10 and 14:25 and respectively. So please start at exact time to your quizzes to be able to use all your time.\r\n\r\nGood luck', '2020-06-01 08:53:30', 3, 1),
(5, 'Corona Status', 'Dear students,  \r\n\r\nDue to Corona Virus, we need to make our lectures online. You can find the very first online lecture in `Learn > Weekly Content > Online Lecture 1`. Remember all the course', '2020-06-01 08:55:13', 3, 2),
(6, 'Homework', 'Dear students,\r\n\r\nFor your first homework, you will implement Ant Colony Optimisation from scratch for the problem of finding shortest path in an environment represented as a distance matrix', '2020-06-01 08:56:28', 1, 3),
(7, 'Announcement', 'Hi all,\r\n\r\nBefore finalize your work, contact to your project advisors.\r\n\r\nAccording to the last faculty board, maybe, a unique template must be used in documentation. If that happens, I will announce and give you one extra day to revise your documents.\r\n\r\nJury presentations will be as zoom meeting and at the beginning of the final period. All group members must be online for presentations.', '2020-06-01 08:56:56', 2, 3),
(8, 'Important', 'Hi all,\r\n\r\nBefore finalize your work, contact to your project advisors.\r\n\r\nAccording to the last faculty board, maybe, a unique template must be used in documentation. If that happens, I will announce and give you one extra day to revise your documents.\r\n\r\nJury presentations will be as zoom meeting and at the beginning of the final period. All group members must be online for presentations.', '2020-06-01 08:57:06', 3, 3),
(9, 'Project Deadline', 'Deadline of the project submission is shifted to June 31, 23:59..\r\n\r\n', '2020-06-01 08:58:21', 3, 4),
(10, 'Notes', 'You can find the meeting notes in weekly content..\r\n\r\n', '2020-06-01 08:59:26', 1, 5),
(11, 'Weekly Content', 'You can find the meeting notes in weekly content..\r\n\r\n', '2020-06-01 08:59:35', 2, 5),
(12, 'Assignment', 'You may find your assignment details on \"Weekly Content\"\r\n\r\n', '2020-06-01 09:00:00', 3, 5),
(13, 'Project ', 'The term project grades are posted on SIS.\r\n\r\nThe evaluation of all the term projects was based on the following criteria:\r\n\r\nContent, coherence, organisation, integrity of sections\r\nOriginality, creativity\r\nLanguage, expression\r\nDesign, outlook\r\nLength\r\nReferences, citations', '2020-06-01 09:01:35', 1, 6),
(14, 'Assignment', 'Be ready for your assignment next week', '2020-06-01 09:01:58', 2, 6),
(15, 'Quiz', 'Be ready for your quiz next week', '2020-06-01 09:02:05', 3, 6),
(16, 'Quiz', 'Quiz will bee held next week', '2020-06-01 09:02:50', 1, 7),
(17, 'group presentation', 'We are going to start the group presentations tomorrow. Because of tight agenda, everyone needs to be ready on time.\r\n\r\n', '2020-06-01 09:03:13', 2, 7),
(18, 'presentations', 'We are going to start the group presentations tomorrow.\r\n\r\n', '2020-06-01 09:03:21', 3, 7),
(19, 'Midterm', ' With regard to my last message on this matter, the regrading of the midterm exam (including consideration of your feedbacks) is finished. The regrading 1 through 7 are automatically applied by the system after modifying grading settings and 8 is accomplished as manual score overwrite.\r\n\r\nT', '2020-06-01 09:04:06', 1, 8),
(20, 'Scores', 'You are recommended to check your score change in question basis by strictly following the points above.\r\n\r\n', '2020-06-01 09:04:19', 2, 8),
(21, 'Welcome', 'Welcome All Students ', '2020-06-01 09:05:04', 1, 9),
(22, 'Welcome', 'Welcome All Students. I hope you will have a great semster.', '2020-06-01 09:05:25', 2, 9),
(23, 'Welcome ', 'Welcome my dear students', '2020-06-01 09:05:36', 3, 9);

-- --------------------------------------------------------

--
-- Table structure for table `Courses`
--

CREATE TABLE `Courses` (
  `course_id` int(11) NOT NULL,
  `course_code` varchar(30) NOT NULL,
  `course_name` varchar(30) NOT NULL,
  `course_credit` int(11) NOT NULL,
  `course_date` varchar(255) NOT NULL,
  `course_teacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Courses`
--

INSERT INTO `Courses` (`course_id`, `course_code`, `course_name`, `course_credit`, `course_date`, `course_teacher`) VALUES
(1, 'CMPE100', 'Into to computer programming', 5, '[\"MON-09:00-12:00\",\"TUE-09:00-12:00\",\"FRI-09:00-12:00\"]', 1),
(2, 'CMPE101', 'Algorithms and Data Structure', 6, '[\"WED-12:00-16:00\",\"THU-12:00-16:00\",\"FRI-12:00-16:00\"]', 1),
(3, 'CMPE102', 'Java for beginners', 5, '[\"MON-10:00-13:00\",\"MON-15:00-18:00\",\"FRI-11:00-14:00\"]', 1),
(4, 'CMPE210', 'Advanced Java', 7, '[\"THU-14:00-17:00\",\"THU-16:00-19:00\",\"FRI-13:00-16:00\"]', 2),
(5, 'CMPE322', 'Image Proccesing', 5, '[\"MON-09:00-12:00\",\"MON-15:00-18:00\",\"TUE-11:00-14:00\"]', 2),
(6, 'CMPE123', 'Natural language proccesing', 5, '[\"TUE-09:00-12:00\",\"TUE-13:00-16:00\",\"WED-09:00-12:00\"]', 3),
(7, 'ENGR322', 'User Interface', 5, '[\"WED-10:00-13:00\",\"WED-14:00-17:00\",\"FRI-15:00-18:00\"]', 2),
(8, 'PHYS101', 'Phisics 1', 7, '[\"TUE-11:00-14:00\",\"TUE-15:00-18:00\",\"FRI-11:00-14:00\"]', 3),
(9, 'MATH404', 'Calculus', 7, '[\"THU-16:00-19:00\",\"FRI-13:00-16:00\",\"FRI-16:00-19:00\"]', 3),
(10, 'CMPE211', 'Data Structure', 5, '[\"MON-09:00-12:00\",\"TUE-09:00-12:00\",\"FRI-09:00-12:00\"]', 4),
(11, 'CMPE212', 'Advanced Data Structure', 6, '[\"WED-12:00-16:00\",\"THU-12:00-16:00\",\"FRI-12:00-16:00\"]', 4),
(12, 'EEEN222', 'Digital Systems Design', 5, '[\"MON-10:00-13:00\",\"MON-15:00-18:00\",\"FRI-11:00-14:00\"]', 4),
(13, 'EEEN201', 'Circuits 1', 5, '[\"THU-14:00-17:00\",\"THU-16:00-19:00\",\"FRI-13:00-16:00\"]', 5),
(14, 'EEEN202', 'Circuits 2', 5, '[\"MON-09:00-12:00\",\"MON-15:00-18:00\",\"TUE-11:00-14:00\"]', 5),
(15, 'ENG101', 'English 1', 3, '[\"TUE-09:00-12:00\",\"TUE-13:00-16:00\",\"WED-09:00-12:00\"]', 5),
(16, 'ENG102', 'English 2', 3, '[\"WED-10:00-13:00\",\"WED-14:00-17:00\",\"FRI-15:00-18:00\"]', 6),
(17, 'TK101', 'Turkish 1', 3, '[\"TUE-11:00-14:00\",\"TUE-15:00-18:00\",\"FRI-11:00-14:00\"]', 6),
(18, 'TK102', 'Turkish 2', 4, '[\"THU-16:00-19:00\",\"FRI-13:00-16:00\",\"FRI-16:00-19:00\"]', 6),
(19, 'TK103', 'Turkish 3', 4, '[\"MON-09:00-12:00\",\"TUE-09:00-12:00\",\"FRI-09:00-12:00\"]', 7),
(20, 'MATH405', 'Calculus 2', 6, '[\"WED-12:00-16:00\",\"THU-12:00-16:00\",\"FRI-12:00-16:00\"]', 7),
(21, 'MATH406', 'Calculus 3', 7, '[\"MON-10:00-13:00\",\"MON-15:00-18:00\",\"FRI-11:00-14:00\"]', 7),
(22, 'ENGR400', 'Ethics in Engineering', 4, '[\"MON-10:00-13:00\",\"MON-15:00-18:00\",\"FRI-11:00-14:00\"]', 10),
(23, 'CHEM101', 'Chemistry', 5, '[\"MON-09:00-12:00\",\"MON-15:00-18:00\",\"TUE-11:00-14:00\"]', 8),
(24, 'CHEM110', 'Chemistry Lab', 2, '[\"TUE-09:00-12:00\",\"TUE-13:00-16:00\",\"WED-09:00-12:00\"]', 8),
(25, 'MATH240', 'Logic and Discrete Mathematics', 4, '[\"WED-10:00-13:00\",\"WED-14:00-17:00\",\"FRI-15:00-18:00\"]', 9),
(26, 'MATH259', 'Probability and Statistics', 5, '[\"TUE-11:00-14:00\",\"TUE-15:00-18:00\",\"FRI-11:00-14:00\"]', 9),
(27, 'MATH139', 'Linear Algebra', 5, '[\"THU-16:00-19:00\",\"FRI-13:00-16:00\",\"FRI-16:00-19:00\"]', 9);

-- --------------------------------------------------------

--
-- Table structure for table `GradesAndAttendence`
--

CREATE TABLE `GradesAndAttendence` (
  `course_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `mid_grade` int(11) NOT NULL,
  `final_grade` int(11) NOT NULL,
  `attendence` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `GradesAndAttendence`
--

INSERT INTO `GradesAndAttendence` (`course_id`, `student_id`, `mid_grade`, `final_grade`, `attendence`) VALUES
(1, 1, 35, 35, 12),
(14, 3, 23, 44, 12),
(13, 5, 14, 12, 12),
(1, 6, 10, 12, 11);

-- --------------------------------------------------------

--
-- Table structure for table `Students`
--

CREATE TABLE `Students` (
  `stu_id` int(11) NOT NULL,
  `stu_name` varchar(30) NOT NULL,
  `stu_dep` varchar(30) NOT NULL,
  `stu_faculty` varchar(30) NOT NULL,
  `stu_email` varchar(30) NOT NULL,
  `stu_pass` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Students`
--

INSERT INTO `Students` (`stu_id`, `stu_name`, `stu_dep`, `stu_faculty`, `stu_email`, `stu_pass`) VALUES
(1, 'Anas Badawi', 'Computer Engineering', 'Engineering', 'anas@bilgi.com', '11'),
(2, 'Omar Soliman', 'Computer Engineering', 'Engineering', 'omar@bilgi.com', '22'),
(3, 'Mohammed Soliman', 'Mechanical Engineering', 'Engineering', 'mohamed@bilgi.com', '33'),
(4, 'Omar Hatta', 'Mechanical Engineering', 'Engineering', 'omar.hatta@bilgi.com', '44'),
(5, 'Ahmet Mohameed', 'Industrial Engineering', 'Engineering', 'ahmet@bilgi.com', '55'),
(6, 'Ali Kasem', 'Industrial Engineering', 'Engineering', 'ali@bilgi.com', '66'),
(7, 'Ezel bayraktar', 'Biomedical Engineering', 'Engineering', 'ezel@bilgi.com', '77'),
(8, 'Ahmet Davutoglu', 'Biomedical Engineering', 'Engineering', 'ahmet.d@bilgi.com', '88'),
(9, 'Mert Kilcdaroglu', 'Chemical Engineering', 'Engineering', 'mert@bilgi.com', '99'),
(10, 'Sinan Balci', 'Chemical Engineering', 'Engineering', 'sinan@bilgi.com', '00');

-- --------------------------------------------------------

--
-- Table structure for table `StudentsCourses`
--

CREATE TABLE `StudentsCourses` (
  `stu_id` int(11) NOT NULL,
  `courses` varchar(255) NOT NULL,
  `course_section` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `StudentsCourses`
--

INSERT INTO `StudentsCourses` (`stu_id`, `courses`, `course_section`) VALUES
(1, '[1,2,3,23,21]', '[2,0,1,0,0]'),
(2, '[5,2,6,25]', '[0,2,0,0]'),
(3, '[2,14,20,17,27]', '[0,0,0,0,0]'),
(4, '[4,1,8,7,15]', '[0,0,0,0,0]'),
(5, '[23,17,15,13]', '[0,0,0,0]'),
(6, '[1,6,11,20,24]', '[0,0,0,0,0]');

-- --------------------------------------------------------

--
-- Table structure for table `Teachers`
--

CREATE TABLE `Teachers` (
  `teacher_id` int(11) NOT NULL,
  `teacher_name` varchar(30) NOT NULL,
  `teacher_faculty` varchar(30) NOT NULL,
  `teacher_email` varchar(30) NOT NULL,
  `teacher_pass` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Teachers`
--

INSERT INTO `Teachers` (`teacher_id`, `teacher_name`, `teacher_faculty`, `teacher_email`, `teacher_pass`) VALUES
(1, 'Elif Pinar', 'Enginneering', 'elif@bilgi.com', '11'),
(2, 'Murat Oguz', 'Enginneering', 'murat@bilgi.com', '22'),
(3, 'Ahmet Denker', 'Enginneering', 'ahmet@bilgi.com', '33'),
(4, 'Ali Nesin', 'Scince', 'ali@bilgi.com', '44'),
(5, 'Alpaslan Parlakçı', 'Enginneering', 'alp@bilgi.com', '55'),
(6, 'Murat Sarıbay', 'Scince', 'murat.s@bilgi.com', '66'),
(7, 'Savaş Yıldırım', 'Scince', 'savas@bilgi.com', '77'),
(8, 'Tuğba Yıldız', 'Enginneering', 'tugba@bilgi.com', '88'),
(9, 'Uzay Çetin', 'Enginneering', 'uzay@bilgi.com', '99'),
(10, 'Yeşim Öniz', 'Scince', 'yesim@bilgi.com', '00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Announcements`
--
ALTER TABLE `Announcements`
  ADD PRIMARY KEY (`announcement_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `Courses`
--
ALTER TABLE `Courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `GradesAndAttendence`
--
ALTER TABLE `GradesAndAttendence`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `Students`
--
ALTER TABLE `Students`
  ADD PRIMARY KEY (`stu_id`);

--
-- Indexes for table `StudentsCourses`
--
ALTER TABLE `StudentsCourses`
  ADD PRIMARY KEY (`stu_id`);

--
-- Indexes for table `Teachers`
--
ALTER TABLE `Teachers`
  ADD PRIMARY KEY (`teacher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Announcements`
--
ALTER TABLE `Announcements`
  MODIFY `announcement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `Courses`
--
ALTER TABLE `Courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `Students`
--
ALTER TABLE `Students`
  MODIFY `stu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `Teachers`
--
ALTER TABLE `Teachers`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Announcements`
--
ALTER TABLE `Announcements`
  ADD CONSTRAINT `Announcements_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `Courses` (`course_id`);

--
-- Constraints for table `GradesAndAttendence`
--
ALTER TABLE `GradesAndAttendence`
  ADD CONSTRAINT `GradesAndAttendence_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `Courses` (`course_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
