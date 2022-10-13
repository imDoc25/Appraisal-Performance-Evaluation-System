-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2022 at 08:27 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbevaluation`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_list`
--

CREATE TABLE `academic_list` (
  `id` int(30) NOT NULL,
  `year` text NOT NULL,
  `semester` text NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL DEFAULT 0 COMMENT '0=Pending,1=Start,2=Closed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `academic_list`
--

INSERT INTO `academic_list` (`id`, `year`, `semester`, `is_default`, `status`) VALUES
(1, '2019-2020', 'Teaching', 0, 2),
(2, '2019-2020', 'Non-Teaching', 0, 2),
(3, '2020-2021', 'Teaching', 1, 1),
(4, '2020-2021', 'Non-Teaching', 0, 0),
(7, '2020-2021', 'Special', 0, 0),
(8, '2021-2022', 'Promotion Award', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `attendance_list`
--

CREATE TABLE `attendance_list` (
  `id` int(30) NOT NULL,
  `fullname` text NOT NULL,
  `workfield` text NOT NULL,
  `semester` text NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL DEFAULT 0 COMMENT '0=Pending,1=Start,2=Closed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance_list`
--

INSERT INTO `attendance_list` (`id`, `fullname`, `workfield`, `semester`, `is_default`, `status`) VALUES
(9, 'Ed Shernan', 'Registrar', 'Academe', 1, 0),
(11, 'Tanjiro Cruz', 'Security', 'Non-Academe', 0, 0),
(12, 'Manny Spring', 'Registrar', 'Academe', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `awardee_list`
--

CREATE TABLE `awardee_list` (
  `id` int(30) NOT NULL,
  `fullname` text NOT NULL,
  `workfield` text NOT NULL,
  `semester` text NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL DEFAULT 0 COMMENT '0=Pending,1=Start,2=Closed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `awardee_list`
--

INSERT INTO `awardee_list` (`id`, `fullname`, `workfield`, `semester`, `is_default`, `status`) VALUES
(5, 'Noel Cabagnot', 'HR', 'Academe', 1, 0),
(8, 'Justin Believer', 'Security', 'Non-Academe', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `category_list`
--

CREATE TABLE `category_list` (
  `id` int(30) NOT NULL,
  `curriculum` text NOT NULL,
  `level` text NOT NULL,
  `section` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_list`
--

INSERT INTO `category_list` (`id`, `curriculum`, `level`, `section`) VALUES
(2, 'Academe - Registrar', '', ''),
(4, 'Non Academe - Maintenance', '', ''),
(6, 'Academe - HR', '', ''),
(7, 'Non Academe - Security', '', ''),
(8, 'Non Academe - Clinic', '', ''),
(9, 'Academe - Faculty', '', ''),
(10, 'Academe - Library', '', ''),
(15, 'Academe - Admission', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `class_list`
--

CREATE TABLE `class_list` (
  `id` int(30) NOT NULL,
  `curriculum` text NOT NULL,
  `level` text NOT NULL,
  `section` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class_list`
--

INSERT INTO `class_list` (`id`, `curriculum`, `level`, `section`) VALUES
(1, 'Elementary (Grade 1)', '', ''),
(2, 'High School (Grade 8)', '', ''),
(3, 'Senior High School (Grade 11)', '', ''),
(4, 'College - 1st Year (Discrete Math)', '', ''),
(5, 'Employee (Teaching)', '', ''),
(7, 'College - 3rd Year (Software Engineering)', '', ''),
(8, 'College - 4th Year (Capstone Project 2)', '', ''),
(10, 'Elementary (Grade 2)', '', ''),
(11, 'Elementary (Grade 3)', '', ''),
(12, 'Elementary (Grade 4)', '', ''),
(13, 'Elementary (Grade 5)', '', ''),
(14, 'Elementary (Grade 6)', '', ''),
(15, 'High School (Grade 7)', '', ''),
(16, 'High School (Grade 9)', '', ''),
(17, 'High School (Grade 10)', '', ''),
(18, 'Senior High School (Grade 12)', '', ''),
(19, 'Employee (Non-Teaching)', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `criteria_list`
--

CREATE TABLE `criteria_list` (
  `id` int(30) NOT NULL,
  `criteria` varchar(255) NOT NULL,
  `order_by` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `criteria_list`
--

INSERT INTO `criteria_list` (`id`, `criteria`, `order_by`) VALUES
(2, 'PERFORMANACE INDICATORS (A.	Session Lesson Planning and Delivery)', 0),
(4, 'B. Management of time and learning environment', 1),
(6, 'Session Lesson Planning and Deliveries', 2);

-- --------------------------------------------------------

--
-- Table structure for table `evaluation_answers`
--

CREATE TABLE `evaluation_answers` (
  `evaluation_id` int(30) NOT NULL,
  `question_id` int(30) NOT NULL,
  `rate` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `evaluation_answers`
--

INSERT INTO `evaluation_answers` (`evaluation_id`, `question_id`, `rate`) VALUES
(1, 1, 5),
(1, 6, 4),
(1, 3, 5),
(2, 1, 5),
(2, 6, 5),
(2, 3, 4),
(3, 1, 5),
(3, 6, 5),
(3, 3, 4),
(4, 7, 1),
(4, 8, 1),
(4, 9, 1),
(4, 10, 1),
(5, 7, 2),
(5, 8, 2),
(5, 9, 2),
(5, 10, 5),
(6, 7, 3),
(6, 8, 3),
(6, 9, 3),
(6, 10, 5),
(7, 1, 2),
(7, 6, 1),
(7, 3, 1),
(7, 11, 2),
(8, 1, 2),
(8, 6, 3),
(8, 3, 4),
(8, 11, 5),
(9, 1, 1),
(9, 6, 2),
(9, 3, 1),
(9, 11, 5),
(10, 6, 1),
(10, 3, 1),
(10, 11, 1),
(11, 3, 1),
(11, 11, 2),
(12, 3, 1),
(12, 11, 1),
(12, 12, 2),
(13, 3, 5),
(13, 11, 5),
(13, 12, 1),
(14, 3, 2),
(14, 11, 2),
(14, 12, 2),
(15, 3, 1),
(15, 11, 1),
(15, 12, 2),
(16, 3, 3),
(16, 11, 2),
(16, 12, 3),
(17, 3, 1),
(17, 11, 1),
(17, 12, 1),
(18, 3, 2),
(18, 11, 2),
(18, 12, 2),
(19, 3, 1),
(19, 11, 1),
(19, 12, 1),
(20, 3, 5),
(20, 11, 5),
(20, 12, 5),
(21, 3, 1),
(21, 11, 1),
(21, 12, 1),
(22, 3, 5),
(22, 11, 5),
(22, 12, 5),
(23, 3, 1),
(23, 11, 1),
(23, 12, 1),
(24, 3, 1),
(24, 11, 1),
(24, 12, 1),
(25, 12, 1),
(25, 3, 1),
(25, 11, 1),
(26, 3, 5),
(26, 11, 5),
(26, 12, 5),
(27, 3, 1),
(27, 11, 1),
(27, 12, 1),
(28, 3, 1),
(28, 11, 1),
(28, 12, 1),
(28, 13, 1),
(29, 3, 1),
(29, 11, 2),
(29, 12, 2),
(30, 3, 2),
(30, 11, 2),
(30, 14, 2),
(30, 12, 2),
(31, 3, 2),
(31, 11, 2),
(31, 14, 2),
(31, 12, 2),
(32, 3, 1),
(32, 11, 1),
(32, 14, 2),
(32, 12, 2),
(32, 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `evaluation_list`
--

CREATE TABLE `evaluation_list` (
  `evaluation_id` int(30) NOT NULL,
  `academic_id` int(30) NOT NULL,
  `class_id` int(30) NOT NULL,
  `student_id` int(30) NOT NULL,
  `subject_id` int(30) NOT NULL,
  `faculty_id` int(30) NOT NULL,
  `restriction_id` int(30) NOT NULL,
  `date_taken` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `evaluation_list`
--

INSERT INTO `evaluation_list` (`evaluation_id`, `academic_id`, `class_id`, `student_id`, `subject_id`, `faculty_id`, `restriction_id`, `date_taken`) VALUES
(1, 3, 1, 1, 1, 1, 8, '2020-12-15 16:26:51'),
(2, 3, 2, 2, 2, 1, 9, '2020-12-15 16:33:37'),
(3, 3, 1, 3, 1, 1, 8, '2020-12-15 20:18:49'),
(4, 2, 1, 1, 1, 2, 11, '2021-11-19 22:55:48'),
(5, 2, 1, 1, 1, 1, 12, '2021-11-19 23:00:22'),
(6, 2, 1, 1, 1, 3, 13, '2021-11-19 23:00:33'),
(7, 3, 1, 1, 1, 2, 14, '2021-11-20 00:31:35'),
(8, 3, 4, 4, 4, 2, 16, '2021-11-25 18:31:05'),
(9, 3, 3, 5, 3, 2, 19, '2021-11-25 19:54:44'),
(10, 3, 4, 4, 2, 4, 20, '2021-11-26 19:54:26'),
(11, 3, 4, 4, 2, 4, 21, '2021-11-26 21:25:16'),
(12, 3, 4, 4, 5, 2, 24, '2021-12-01 16:07:13'),
(13, 3, 1, 5, 4, 2, 28, '2021-12-01 16:52:45'),
(14, 3, 2, 1, 1, 5, 29, '2021-12-01 18:13:00'),
(15, 3, 2, 1, 2, 4, 30, '2021-12-01 19:13:18'),
(16, 3, 3, 5, 3, 2, 32, '2021-12-01 19:50:14'),
(17, 3, 3, 5, 2, 8, 33, '2021-12-02 15:14:21'),
(18, 3, 1, 1, 1, 8, 40, '2021-12-02 17:31:50'),
(19, 3, 1, 6, 1, 8, 40, '2021-12-02 18:13:54'),
(20, 3, 1, 10, 1, 8, 40, '2021-12-02 18:57:01'),
(21, 3, 1, 7, 1, 8, 40, '2021-12-02 22:14:34'),
(22, 3, 1, 7, 1, 8, 40, '2021-12-02 22:14:42'),
(23, 3, 1, 7, 1, 10, 41, '2021-12-02 23:24:06'),
(24, 3, 1, 7, 1, 2, 44, '2021-12-03 09:55:37'),
(25, 3, 1, 7, 1, 2, 46, '2021-12-03 15:02:17'),
(26, 3, 1, 7, 4, 4, 49, '2021-12-03 18:22:16'),
(27, 3, 4, 9, 3, 11, 54, '2021-12-09 17:16:32'),
(28, 3, 1, 7, 3, 10, 55, '2021-12-10 13:51:47'),
(29, 3, 5, 11, 1, 29, 56, '2021-12-11 01:55:55'),
(30, 3, 5, 14, 1, 11, 57, '2021-12-11 09:52:48'),
(31, 3, 5, 14, 3, 31, 58, '2021-12-11 10:20:08'),
(32, 3, 7, 7, 2, 29, 62, '2021-12-11 22:34:01');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_list`
--

CREATE TABLE `faculty_list` (
  `id` int(30) NOT NULL,
  `school_id` varchar(100) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `categ_id` int(30) NOT NULL,
  `avatar` text NOT NULL DEFAULT 'no-image-available.png',
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty_list`
--

INSERT INTO `faculty_list` (`id`, `school_id`, `firstname`, `lastname`, `email`, `password`, `categ_id`, `avatar`, `date_created`) VALUES
(28, '07-1237-27', 'Josephine ', 'Grey', 'josephine.grey@cdsp.edu.ph', '21232f297a57a5a743894a0e4a801fc3', 9, 'no-image-available.png', '2021-12-11 01:43:00'),
(29, '16-2730-12', 'Conor', 'Rocha', 'conor.rocha@cdsp.edu.ph', '21232f297a57a5a743894a0e4a801fc3', 10, 'no-image-available.png', '2021-12-11 01:44:35'),
(30, '19-1741-99', 'Wren', 'Orozco', 'wren.orozco@cdsp.edu.ph', '21232f297a57a5a743894a0e4a801fc3', 10, 'no-image-available.png', '2021-12-11 01:45:27'),
(31, '87-1234-81', 'Eddie', 'Rudd', 'eddie.rud@cdsp.edu.ph', '21232f297a57a5a743894a0e4a801fc3', 12, 'no-image-available.png', '2021-12-11 01:46:17'),
(79, '98-1746-89', 'Jonah', 'Baker', 'jonah@cdsp.edu.h', 'philippines', 2, 'no-image-available.png', '2022-02-02 15:25:56'),
(80, '63-7816-24', 'Jay', 'Lalou', 'jay@cdsp.edu.ph', 'admin', 10, 'no-image-available.png', '2022-02-02 15:25:56');

-- --------------------------------------------------------

--
-- Table structure for table `promotion_list`
--

CREATE TABLE `promotion_list` (
  `id` int(30) NOT NULL,
  `fullname` text NOT NULL,
  `workfield` text NOT NULL,
  `semester` text NOT NULL,
  `position` varchar(255) NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL DEFAULT 0 COMMENT '0=Pending,1=Start,2=Closed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `promotion_list`
--

INSERT INTO `promotion_list` (`id`, `fullname`, `workfield`, `semester`, `position`, `is_default`, `status`) VALUES
(14, 'Arthur Leni', 'Admission', 'Academe', 'Teacher III', 1, 0),
(16, 'Cargando Datos', 'Security', 'Non-Academe', 'Security Head', 0, 0),
(17, 'John Doe', 'Clinic', 'Non-Academe', 'Nurse I', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `question_list`
--

CREATE TABLE `question_list` (
  `id` int(30) NOT NULL,
  `academic_id` int(30) NOT NULL,
  `question` varchar(255) NOT NULL,
  `order_by` int(30) NOT NULL,
  `criteria_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question_list`
--

INSERT INTO `question_list` (`id`, `academic_id`, `question`, `order_by`, `criteria_id`) VALUES
(3, 3, '1. Select contents and prepares appropriate instructional materials/teaching aids', 0, 2),
(5, 0, 'Question 101', 0, 1),
(6, 3, 'Teacher give examples', 0, 1),
(7, 2, 'What are the strengths of this course', 0, 1),
(8, 2, 'What parts of the course aided your learning the most', 1, 1),
(9, 2, 'How satisfied were you with this course', 2, 2),
(10, 2, 'Is there a specific part of your course you want to know was effective for student learning', 3, 2),
(11, 3, 'Give breaktime', 1, 2),
(12, 3, '15.	Maintains clean and orderly classroom', 3, 4),
(13, 3, 'Teacher give example', 4, 8),
(14, 3, 'Consider student', 2, 2),
(15, 3, 'awdawd', 5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `restriction_list`
--

CREATE TABLE `restriction_list` (
  `id` int(30) NOT NULL,
  `academic_id` int(30) NOT NULL,
  `faculty_id` int(30) NOT NULL,
  `class_id` int(30) NOT NULL,
  `subject_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restriction_list`
--

INSERT INTO `restriction_list` (`id`, `academic_id`, `faculty_id`, `class_id`, `subject_id`) VALUES
(62, 3, 29, 7, 2),
(63, 3, 31, 2, 8);

-- --------------------------------------------------------

--
-- Table structure for table `student_list`
--

CREATE TABLE `student_list` (
  `id` int(30) NOT NULL,
  `school_id` varchar(100) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `class_id` int(30) NOT NULL,
  `avatar` text NOT NULL DEFAULT 'no-image-available.png',
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_list`
--

INSERT INTO `student_list` (`id`, `school_id`, `firstname`, `lastname`, `email`, `password`, `class_id`, `avatar`, `date_created`) VALUES
(6, '61-4718-71', 'Yuji', 'Itadori', 'yuji.itadori@cdsp.edu.ph', '202cb962ac59075b964b07152d234b70', 1, 'no-image-available.png', '2021-12-02 18:12:22'),
(7, '18-5719-84', 'Arthur', 'Leni', 'arthur.leni@cdsp.edu.ph', '202cb962ac59075b964b07152d234b70', 7, 'no-image-available.png', '2021-12-02 22:14:07'),
(9, '87-1237-71', 'Megumi', 'Saoto', 'megumi.saoto@cdsp.edu.ph', '202cb962ac59075b964b07152d234b70', 2, 'no-image-available.png', '2021-12-09 17:14:42'),
(14, '16-2730-12', 'Conor', 'Rocha', 'conor.rocha@cdsp.edu.ph', '202cb962ac59075b964b07152d234b70', 5, 'no-image-available.png', '2021-12-11 09:51:26'),
(15, '18-3420-12', 'Virgie', 'Laurio', 'virgie.laurio@cdsp.edu.ph', '202cb962ac59075b964b07152d234b70', 3, 'no-image-available.png', '2021-12-11 19:24:53'),
(16, '123-1231', 'Ed', 'Shernan', 'ed.shernan@cdsp.edu.ph', '21232f297a57a5a743894a0e4a801fc3', 5, 'no-image-available.png', '2021-12-11 20:31:49'),
(19, '98-1746-89', 'Jonah', 'Baker', 'jonah@cdsp.edu.h', 'philippines', 2, 'no-image-available.png', '2022-02-02 15:21:18'),
(20, '63-7816-24', 'Jay', 'Lalou', 'jay@cdsp.edu.ph', 'admin', 10, 'no-image-available.png', '2022-02-02 15:21:18');

-- --------------------------------------------------------

--
-- Table structure for table `subject_list`
--

CREATE TABLE `subject_list` (
  `id` int(30) NOT NULL,
  `code` varchar(50) NOT NULL,
  `subject` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject_list`
--

INSERT INTO `subject_list` (`id`, `code`, `subject`, `description`) VALUES
(2, '', 'Teaching- Faculty', ''),
(8, '', 'Teaching- HR', ''),
(9, '', 'Teaching- Library', ''),
(10, '', 'Teaching- Registrar', ''),
(11, '', 'Non Teaching- Clinic', ''),
(12, '', 'Non Teaching- Maintenance', ''),
(13, '', 'Non Teaching- Security', ''),
(15, '', 'Teaching- Admission', '');

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `cover_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `name`, `email`, `contact`, `address`, `cover_img`) VALUES
(1, 'Appraisal Performance Evaluation System for CDSP', 'info@sample.comm', '+6948 8542 623', '2102  Caldwell Road, Rochester, New York, 14608', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `avatar` text NOT NULL DEFAULT 'no-image-available.png',
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `avatar`, `date_created`) VALUES
(1, 'Admin', 'Doctor', 'admin.doctor@cdsp.edu.ph', '0192023a7bbd73250516f069df18b500', '1607135820_avatar.jpg', '2020-11-26 10:57:04'),
(2, 'Admin', 'Custodio', 'admin.custodio@cdsp.edu.ph', '0192023a7bbd73250516f069df18b500', 'no-image-available.png', '2021-11-26 16:41:02'),
(4, 'Ranz', 'Flores', 'ranz.flores@cdsp.edu.ph', '0192023a7bbd73250516f069df18b500', 'no-image-available.png', '2021-12-08 18:58:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_list`
--
ALTER TABLE `academic_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance_list`
--
ALTER TABLE `attendance_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `awardee_list`
--
ALTER TABLE `awardee_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_list`
--
ALTER TABLE `category_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_list`
--
ALTER TABLE `class_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `criteria_list`
--
ALTER TABLE `criteria_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluation_list`
--
ALTER TABLE `evaluation_list`
  ADD PRIMARY KEY (`evaluation_id`);

--
-- Indexes for table `faculty_list`
--
ALTER TABLE `faculty_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotion_list`
--
ALTER TABLE `promotion_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_list`
--
ALTER TABLE `question_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restriction_list`
--
ALTER TABLE `restriction_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_list`
--
ALTER TABLE `student_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject_list`
--
ALTER TABLE `subject_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_list`
--
ALTER TABLE `academic_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `attendance_list`
--
ALTER TABLE `attendance_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `awardee_list`
--
ALTER TABLE `awardee_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `category_list`
--
ALTER TABLE `category_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `class_list`
--
ALTER TABLE `class_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `criteria_list`
--
ALTER TABLE `criteria_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `evaluation_list`
--
ALTER TABLE `evaluation_list`
  MODIFY `evaluation_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `faculty_list`
--
ALTER TABLE `faculty_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `promotion_list`
--
ALTER TABLE `promotion_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `question_list`
--
ALTER TABLE `question_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `restriction_list`
--
ALTER TABLE `restriction_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `student_list`
--
ALTER TABLE `student_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `subject_list`
--
ALTER TABLE `subject_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
