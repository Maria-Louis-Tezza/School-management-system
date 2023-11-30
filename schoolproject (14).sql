-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2023 at 06:54 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schoolproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usertype` varchar(20) NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `usertype`) VALUES
(1, 'admin', 'admin@gmail.com', '1235', 'Primary'),
(2, 'admin2', 'admin2@gmail.com', 'Admin123', 'Secondary');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_records`
--

CREATE TABLE `attendance_records` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `roll_number` varchar(255) NOT NULL,
  `attendence_status` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `teacher_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance_records`
--

INSERT INTO `attendance_records` (`id`, `username`, `roll_number`, `attendence_status`, `date`, `teacher_name`) VALUES
(61, 'student1', '41', 'Present', '2023-04-27', 'Sangeetha'),
(62, 'student2', '92', 'Present', '2023-04-27', 'Sangeetha'),
(63, 'student3', '93', 'Present', '2023-04-27', 'Sangeetha'),
(64, 'student5', '95', 'Present', '2023-04-27', 'Sangeetha');

-- --------------------------------------------------------

--
-- Table structure for table `tblclasses`
--

CREATE TABLE `tblclasses` (
  `id` int(11) NOT NULL,
  `ClassName` varchar(80) DEFAULT NULL,
  `ClassNameNumeric` int(4) DEFAULT NULL,
  `Section` varchar(5) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblclasses`
--

INSERT INTO `tblclasses` (`id`, `ClassName`, `ClassNameNumeric`, `Section`, `CreationDate`, `UpdationDate`) VALUES
(1, 'First', 2, 'C', '2022-01-01 10:30:57', '2022-01-01 10:30:57'),
(2, 'Second', 2, 'A', '2022-01-01 10:30:57', '2022-01-01 10:30:57'),
(4, 'Fourth', 4, 'C', '2022-01-01 10:30:57', '2022-01-01 10:30:57'),
(5, 'Sixth', 6, 'A', '2022-01-01 10:30:57', '2022-01-01 10:30:57'),
(7, 'Seventh', 7, 'B', '2022-01-01 10:30:57', '2022-01-01 10:30:57'),
(8, 'Eight', 8, 'A', '2022-01-01 10:30:57', '2022-01-01 10:30:57'),
(9, 'Tenth', 10, 'A', '2022-01-01 15:17:32', NULL),
(12, 'third', 3, 'C', '2023-03-30 18:06:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblresult`
--

CREATE TABLE `tblresult` (
  `id` int(11) NOT NULL,
  `StudentId` int(11) DEFAULT NULL,
  `ClassId` int(11) DEFAULT NULL,
  `SubjectId` int(11) DEFAULT NULL,
  `marks` int(11) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL,
  `lastaccessed` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblresult`
--

INSERT INTO `tblresult` (`id`, `StudentId`, `ClassId`, `SubjectId`, `marks`, `PostingDate`, `UpdationDate`, `lastaccessed`) VALUES
(27, 95, 9, 8, 99, '2023-04-12 13:56:17', NULL, 'Sangeetha'),
(28, 95, 9, 8, 88, '2023-04-12 13:56:17', NULL, 'Sangeetha'),
(29, 95, 9, 2, 99, '2023-04-12 13:56:17', NULL, 'Sangeetha'),
(30, 95, 9, 1, 99, '2023-04-12 13:56:17', NULL, 'Sangeetha');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubjectcombination`
--

CREATE TABLE `tblsubjectcombination` (
  `id` int(11) NOT NULL,
  `ClassId` int(11) DEFAULT NULL,
  `SubjectId` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Updationdate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubjectcombination`
--

INSERT INTO `tblsubjectcombination` (`id`, `ClassId`, `SubjectId`, `status`, `CreationDate`, `Updationdate`) VALUES
(3, 2, 5, 1, '2022-01-01 10:30:57', '2023-04-13 02:58:05'),
(4, 1, 2, 1, '2022-01-01 10:30:57', NULL),
(5, 1, 4, 1, '2022-01-01 10:30:57', NULL),
(6, 1, 5, 1, '2022-01-01 10:30:57', NULL),
(8, 4, 4, 1, '2022-01-01 10:30:57', NULL),
(10, 4, 1, 1, '2022-01-01 10:30:57', NULL),
(12, 4, 2, 1, '2022-01-01 10:30:57', NULL),
(13, 4, 5, 1, '2022-01-01 10:30:57', NULL),
(14, 6, 1, 1, '2022-01-01 10:30:57', NULL),
(15, 6, 2, 1, '2022-01-01 10:30:57', NULL),
(16, 6, 4, 1, '2022-01-01 10:30:57', NULL),
(17, 6, 6, 1, '2022-01-01 10:30:57', NULL),
(18, 7, 1, 1, '2022-01-01 10:30:57', NULL),
(19, 7, 7, 1, '2022-01-01 10:30:57', NULL),
(20, 7, 2, 1, '2022-01-01 10:30:57', NULL),
(21, 7, 6, 1, '2022-01-01 10:30:57', NULL),
(22, 7, 5, 0, '2022-01-01 10:30:57', NULL),
(23, 8, 1, 1, '2022-01-01 10:30:57', NULL),
(24, 8, 2, 1, '2022-01-01 10:30:57', NULL),
(25, 8, 4, 1, '2022-01-01 10:30:57', NULL),
(26, 8, 6, 1, '2022-01-01 10:30:57', NULL),
(27, 8, 5, 0, '2022-01-01 10:30:57', NULL),
(28, 9, 1, 1, '2022-01-01 15:18:40', NULL),
(29, 9, 2, 1, '2022-01-01 15:18:43', NULL),
(30, 9, 8, 1, '2022-01-01 15:18:48', NULL),
(31, 9, 8, 1, '2022-01-01 15:18:54', NULL),
(32, 0, 0, 0, '2023-03-24 16:43:57', NULL),
(33, 0, 0, 0, '2023-03-24 16:45:12', NULL),
(34, 8, 12, 1, '2023-03-24 17:09:22', NULL),
(35, 11, 13, 1, '2023-03-26 13:28:51', NULL),
(36, 11, 14, 1, '2023-03-26 13:35:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblsubjects`
--

CREATE TABLE `tblsubjects` (
  `id` int(11) NOT NULL,
  `SubjectName` varchar(100) NOT NULL,
  `SubjectCode` varchar(100) DEFAULT NULL,
  `Creationdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubjects`
--

INSERT INTO `tblsubjects` (`id`, `SubjectName`, `SubjectCode`, `Creationdate`, `UpdationDate`) VALUES
(1, 'Maths', 'MTH01', '2022-01-01 10:30:57', NULL),
(2, 'English', 'ENG5', '2022-01-01 10:30:57', NULL),
(4, 'Science', 'SC1', '2022-01-01 10:30:57', NULL),
(5, 'Music', 'MS', '2022-01-01 10:30:57', NULL),
(6, 'Social Studies', 'SS08', '2022-01-01 10:30:57', NULL),
(7, 'Physics', 'PH03', '2022-01-01 10:30:57', NULL),
(8, 'Chemistry', 'CH65', '2022-01-01 10:30:57', NULL),
(12, 'economics', 'eco1111', '2023-03-24 07:54:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(100) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `EmpID` int(5) NOT NULL,
  `image` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `lastaccessed` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `username`, `EmpID`, `image`, `email`, `password`, `lastaccessed`) VALUES
(40, 'Kamala', 12346, 'image/Puneeth.PNG', 'gsdjg@gmail.com', 'Kamala123', ''),
(41, 'Jenny', 56868, 'image/Puneeth.PNG', 'khdsk@gmail.com', 'Jenny1234', ''),
(42, 'Karthick', 3288, 'image/Puneeth.PNG', 'kjdksj@gmail.com', 'Karthick987', ''),
(43, 'Sangeetha', 98237, 'image/Puneeth.PNG', 'shd@gmail.com', 'Jaishan123', ''),
(44, 'Clara', 3280, 'image/Puneeth.PNG', 'ram@gmail.com', 'Clara88', ''),
(45, 'Jennifer12', 78965, 'image/teachpic1.jpg', 'Jan@gmail.com', 'Jan1234', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `RollId` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `DOB` varchar(100) DEFAULT NULL,
  `ClassId` int(11) DEFAULT NULL,
  `lastaccessed` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `Status` int(1) DEFAULT NULL,
  `teacher_name` varchar(50) NOT NULL,
  `image` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `RollId`, `email`, `Gender`, `DOB`, `ClassId`, `lastaccessed`, `password`, `Status`, `teacher_name`, `image`) VALUES
(41, 'student1', '15642', 'hkd@gmail.com', 'Male', '2023-03-04', 11, '', 'Student123', 1, 'Sangeetha', 'image/marketing.png'),
(92, 'student2', '97', 'afjla@gmail.com', 'Male', '2009-03-18', 10, '', 'Student456', 1, 'Sangeetha', 'image/Puneeth.PNG'),
(93, 'student3', '32', 'jxlvd@gmail.com', 'Male', '2010-03-17', 8, '', 'Student678', 1, 'Sangeetha', 'image/Puneeth.PNG'),
(94, 'student4', '55', 'Paul123@gmail.com', 'Male', '2008-03-04', 1, '', 'Student789', 1, 'Jenny', 'image/teachpic1.jpg'),
(95, 'student5', '899', 'jake2@gmail.com', 'Male', '2006-06-14', 9, 'admin', 'student268', 1, 'Sangeetha', 'image/teachpic1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance_records`
--
ALTER TABLE `attendance_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblclasses`
--
ALTER TABLE `tblclasses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblresult`
--
ALTER TABLE `tblresult`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsubjectcombination`
--
ALTER TABLE `tblsubjectcombination`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsubjects`
--
ALTER TABLE `tblsubjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `attendance_records`
--
ALTER TABLE `attendance_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `tblclasses`
--
ALTER TABLE `tblclasses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tblresult`
--
ALTER TABLE `tblresult`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `tblsubjectcombination`
--
ALTER TABLE `tblsubjectcombination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `tblsubjects`
--
ALTER TABLE `tblsubjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
