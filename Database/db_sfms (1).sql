-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2023 at 01:22 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sfms`
--

-- --------------------------------------------------------

--
-- Table structure for table `cods`
--

CREATE TABLE `cods` (
  `coid` int(10) NOT NULL,
  `cocode` varchar(255) DEFAULT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `contactno` varchar(255) NOT NULL,
  `depcode` varchar(255) DEFAULT NULL,
  `depname` varchar(255) DEFAULT NULL,
  `depschool` varchar(255) DEFAULT NULL,
  `createdby` varchar(255) DEFAULT NULL,
  `createdon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cod_assigndep`
--

CREATE TABLE `cod_assigndep` (
  `aid` int(10) NOT NULL,
  `cocode` varchar(255) NOT NULL,
  `depcode` varchar(255) DEFAULT NULL,
  `createdby` varchar(200) NOT NULL,
  `creadedon` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `coordiantor`
--

CREATE TABLE `coordiantor` (
  `cid` int(11) NOT NULL,
  `ccode` varchar(255) DEFAULT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `contactno` varchar(255) NOT NULL,
  `depcode` varchar(255) DEFAULT NULL,
  `depname` varchar(255) DEFAULT NULL,
  `depschool` varchar(255) DEFAULT NULL,
  `createdby` varchar(255) DEFAULT NULL,
  `createdon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `coordiantor_assigndep`
--

CREATE TABLE `coordiantor_assigndep` (
  `aid` int(11) NOT NULL,
  `ccode` varchar(255) NOT NULL,
  `depcode` varchar(255) DEFAULT NULL,
  `createdby` varchar(200) NOT NULL,
  `creadedon` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `cid` int(11) NOT NULL,
  `coursecode` varchar(255) NOT NULL,
  `courseName` varchar(255) DEFAULT NULL,
  `coursesection` varchar(500) NOT NULL,
  `createdby` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `courses_assign`
--

CREATE TABLE `courses_assign` (
  `assid` int(11) NOT NULL,
  `fcode` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `corsecode` varchar(255) DEFAULT NULL,
  `courseName` varchar(255) DEFAULT NULL,
  `coursesection` varchar(255) DEFAULT NULL,
  `session` varchar(500) NOT NULL,
  `assignedby` varchar(255) DEFAULT NULL,
  `folderstatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `courses_section`
--

CREATE TABLE `courses_section` (
  `sid` int(11) NOT NULL,
  `coursecode` varchar(255) NOT NULL,
  `coursename` varchar(255) DEFAULT NULL,
  `coursesection` varchar(255) DEFAULT NULL,
  `session` varchar(500) NOT NULL,
  `creadedby` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `deans`
--

CREATE TABLE `deans` (
  `didid` int(11) NOT NULL,
  `dcode` varchar(255) DEFAULT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `contactno` varchar(255) NOT NULL,
  `depcode` varchar(255) DEFAULT NULL,
  `depname` varchar(255) DEFAULT NULL,
  `depschool` varchar(255) DEFAULT NULL,
  `createdby` varchar(255) DEFAULT NULL,
  `createdon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `deans_assigndep`
--

CREATE TABLE `deans_assigndep` (
  `aid` int(11) NOT NULL,
  `dcode` varchar(255) NOT NULL,
  `depcode` varchar(255) DEFAULT NULL,
  `createdby` varchar(200) NOT NULL,
  `creadedon` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `did` int(11) NOT NULL,
  `depschool` varchar(255) DEFAULT NULL,
  `depcode` varchar(255) NOT NULL,
  `depname` varchar(255) DEFAULT NULL,
  `deploc` varchar(255) DEFAULT NULL,
  `createdby` varchar(200) NOT NULL,
  `createdon` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `fid` int(10) NOT NULL,
  `fcode` varchar(255) DEFAULT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `contactno` varchar(255) NOT NULL,
  `depcode` varchar(255) DEFAULT NULL,
  `depname` varchar(255) DEFAULT NULL,
  `depschool` varchar(255) DEFAULT NULL,
  `createdby` varchar(255) DEFAULT NULL,
  `createdon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `sid` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`sid`, `session`, `status`) VALUES
(1, 'FALL 2023 ', 'Active '),
(2, 'SPRING 2023 ', 'IN Active');

-- --------------------------------------------------------

--
-- Table structure for table `storage`
--

CREATE TABLE `storage` (
  `store_id` int(11) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `file_type` varchar(20) NOT NULL,
  `date_uploaded` varchar(100) NOT NULL,
  `fcode` int(100) NOT NULL,
  `pattern` int(6) NOT NULL,
  `coursename` varchar(500) NOT NULL,
  `section` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stud_id` int(11) NOT NULL,
  `stud_no` int(10) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `yr&sec` varchar(5) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `firstname`, `lastname`, `username`, `password`, `status`) VALUES
(1, 'Administrator', '', '0011', '21232f297a57a5a743894a0e4a801fc3', 'administrator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cods`
--
ALTER TABLE `cods`
  ADD PRIMARY KEY (`coid`);

--
-- Indexes for table `cod_assigndep`
--
ALTER TABLE `cod_assigndep`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `coordiantor`
--
ALTER TABLE `coordiantor`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `coordiantor_assigndep`
--
ALTER TABLE `coordiantor_assigndep`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `courses_assign`
--
ALTER TABLE `courses_assign`
  ADD PRIMARY KEY (`assid`);

--
-- Indexes for table `deans`
--
ALTER TABLE `deans`
  ADD PRIMARY KEY (`didid`);

--
-- Indexes for table `deans_assigndep`
--
ALTER TABLE `deans_assigndep`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `storage`
--
ALTER TABLE `storage`
  ADD PRIMARY KEY (`store_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stud_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cods`
--
ALTER TABLE `cods`
  MODIFY `coid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cod_assigndep`
--
ALTER TABLE `cod_assigndep`
  MODIFY `aid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coordiantor`
--
ALTER TABLE `coordiantor`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coordiantor_assigndep`
--
ALTER TABLE `coordiantor_assigndep`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `courses_assign`
--
ALTER TABLE `courses_assign`
  MODIFY `assid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `deans`
--
ALTER TABLE `deans`
  MODIFY `didid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deans_assigndep`
--
ALTER TABLE `deans_assigndep`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `fid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `storage`
--
ALTER TABLE `storage`
  MODIFY `store_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `stud_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
