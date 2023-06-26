-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2023 at 11:22 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evsu_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `incharge_add_event`
--

CREATE TABLE `incharge_add_event` (
  `userID` int(11) NOT NULL,
  `eventType` varchar(255) NOT NULL,
  `towho` varchar(255) NOT NULL,
  `fromwho` varchar(255) NOT NULL,
  `eventSubject` varchar(255) NOT NULL,
  `venue` varchar(255) NOT NULL,
  `agenda` text NOT NULL,
  `date` varchar(255) NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `eventStatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `online_attendance`
--

CREATE TABLE `online_attendance` (
  `UserID` int(11) NOT NULL,
  `Registered_ID` varchar(255) NOT NULL,
  `Event_ID` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(225) NOT NULL,
  `email` varchar(255) NOT NULL,
  `time_in` varchar(11) DEFAULT current_timestamp(),
  `login_type` varchar(225) NOT NULL,
  `eventType` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `online_attendance2`
--

CREATE TABLE `online_attendance2` (
  `UserID` int(11) NOT NULL,
  `Registered_ID` varchar(255) NOT NULL,
  `Event_ID` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(225) NOT NULL,
  `email` varchar(255) NOT NULL,
  `time_in` varchar(11) DEFAULT current_timestamp(),
  `login_type` varchar(225) NOT NULL,
  `eventType` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `registered_admin`
--

CREATE TABLE `registered_admin` (
  `userid` int(11) NOT NULL,
  `Registered_ID` varchar(255) NOT NULL,
  `IDnumber` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `Firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `Lastname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `login_type` varchar(255) NOT NULL,
  `profile_picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `registered_idnumber`
--

CREATE TABLE `registered_idnumber` (
  `UserID` int(11) NOT NULL,
  `Registered_ID` varchar(255) NOT NULL,
  `IDnumber` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `OTP` varchar(255) NOT NULL,
  `login_type` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `registered_incharge`
--

CREATE TABLE `registered_incharge` (
  `incharge_id` int(11) NOT NULL,
  `Registered_ID` varchar(255) NOT NULL,
  `IDnumber` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `registered_users`
--

CREATE TABLE `registered_users` (
  `UserID` int(11) NOT NULL,
  `Registered_ID` varchar(255) NOT NULL,
  `IDnumber` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `Firstname` varchar(255) NOT NULL,
  `Middlename` varchar(255) NOT NULL,
  `Lastname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Department` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `login_type` varchar(255) NOT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `qrID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reset_password_token`
--

CREATE TABLE `reset_password_token` (
  `UserID` int(11) NOT NULL,
  `IDnumber` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `OTP` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `UserID` int(50) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `IDnumber` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `UserID` int(11) NOT NULL,
  `IDnumber` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `department` varchar(225) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guest`
--

CREATE TABLE `tbl_guest` (
  `UserID` int(50) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_incharge`
--

CREATE TABLE `tbl_incharge` (
  `UserID` int(11) NOT NULL,
  `IDnumber` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `UserID` int(11) NOT NULL,
  `IDnumber` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `incharge_add_event`
--
ALTER TABLE `incharge_add_event`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `online_attendance`
--
ALTER TABLE `online_attendance`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `online_attendance2`
--
ALTER TABLE `online_attendance2`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `registered_admin`
--
ALTER TABLE `registered_admin`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `registered_idnumber`
--
ALTER TABLE `registered_idnumber`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `Registered_ID` (`Registered_ID`);

--
-- Indexes for table `registered_incharge`
--
ALTER TABLE `registered_incharge`
  ADD PRIMARY KEY (`incharge_id`);

--
-- Indexes for table `registered_users`
--
ALTER TABLE `registered_users`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `reset_password_token`
--
ALTER TABLE `reset_password_token`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `unique_idnumber_email` (`IDnumber`,`email`);

--
-- Indexes for table `tbl_guest`
--
ALTER TABLE `tbl_guest`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `tbl_incharge`
--
ALTER TABLE `tbl_incharge`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `unique_idnumber_email` (`IDnumber`,`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `incharge_add_event`
--
ALTER TABLE `incharge_add_event`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `online_attendance`
--
ALTER TABLE `online_attendance`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `online_attendance2`
--
ALTER TABLE `online_attendance2`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `registered_admin`
--
ALTER TABLE `registered_admin`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `registered_idnumber`
--
ALTER TABLE `registered_idnumber`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `registered_incharge`
--
ALTER TABLE `registered_incharge`
  MODIFY `incharge_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `registered_users`
--
ALTER TABLE `registered_users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `reset_password_token`
--
ALTER TABLE `reset_password_token`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `UserID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_guest`
--
ALTER TABLE `tbl_guest`
  MODIFY `UserID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_incharge`
--
ALTER TABLE `tbl_incharge`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
