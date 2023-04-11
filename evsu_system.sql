-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2023 at 12:43 PM
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
  `title` text NOT NULL,
  `towho` varchar(255) NOT NULL,
  `fromwho` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `venue` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `incharge_history`
--

CREATE TABLE `incharge_history` (
  `userid` int(11) NOT NULL,
  `title` text NOT NULL,
  `subject` varchar(255) NOT NULL,
  `conducted` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `pdf_file` varchar(255) NOT NULL,
  `pdf_file_name` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `online_attendance`
--

CREATE TABLE `online_attendance` (
  `UserID` int(11) NOT NULL,
  `Registered_ID` varchar(255) NOT NULL,
  `IDnumber` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(225) NOT NULL,
  `log_date` varchar(255) NOT NULL,
  `time_in` time NOT NULL,
  `login_type` varchar(225) NOT NULL
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
  `UserID` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registered_incharge`
--

INSERT INTO `registered_incharge` (`UserID`, `user`, `password`, `profile_picture`, `type`) VALUES
(1, 'CAMDOH', '$argon2i$v=19$m=65536,t=4,p=1$b3VvV0wuLmdZUlJTNjZDSA$JJIlH8xp/dq3Y+lnI1CInsfShtE76MPDlW6U1Lpz47U', '483e22b24ae190af9f18f7aaafc4eadc.jpg', 'SCHOOL HEAD'),
(2, 'ADD_OFF', '$argon2i$v=19$m=65536,t=4,p=1$NTZLa0xjYkh4QUNHdjRGNw$ZTlOJ5pCt0c1hMzxvoKQXWpN+PMLhopUR6ngGR//W2A', 'fb8fc77d9a2d2f03ccf2067e9d43053f.jpg', 'ADMIN_OFF'),
(3, 'CSD', '$argon2i$v=19$m=65536,t=4,p=1$NTZLa0xjYkh4QUNHdjRGNw$ZTlOJ5pCt0c1hMzxvoKQXWpN+PMLhopUR6ngGR//W2A', '13e4ca37d6511134c021c3fdfc189fbf.jpg', 'COMPUTER STUDIES'),
(4, 'END', '$argon2i$v=19$m=65536,t=4,p=1$NTZLa0xjYkh4QUNHdjRGNw$ZTlOJ5pCt0c1hMzxvoKQXWpN+PMLhopUR6ngGR//W2A', '5abedf44bd93e633857665fb1148d802.jpg', 'ENGINEERING'),
(5, 'EDUD', '$argon2i$v=19$m=65536,t=4,p=1$NTZLa0xjYkh4QUNHdjRGNw$ZTlOJ5pCt0c1hMzxvoKQXWpN+PMLhopUR6ngGR//W2A', '30cc6f9d938634b3e470d52a9d184b38.jpg', 'EDUCATION'),
(6, 'TECHD', '$argon2i$v=19$m=65536,t=4,p=1$aTBOM2Z1UlBtR09pR05SWQ$AVwoMDzQQlfhN8Rg8yQnSKStopMYMRfysAFZvGhgWXo', '1a9d2b7fade9bf3c7e15f60306ccf2a1.jpg', 'TECHNOLOGY');

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
  `Lastname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `qrID` varchar(255) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `login_type` varchar(255) NOT NULL,
  `profile_picture` varchar(255) NOT NULL
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
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `UserID` int(11) NOT NULL,
  `IDnumber` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
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
  `lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `UserID` int(11) NOT NULL,
  `IDnumber` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
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
-- Indexes for table `incharge_history`
--
ALTER TABLE `incharge_history`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `online_attendance`
--
ALTER TABLE `online_attendance`
  ADD PRIMARY KEY (`UserID`);

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
  ADD PRIMARY KEY (`UserID`);

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
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `tbl_guest`
--
ALTER TABLE `tbl_guest`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `incharge_add_event`
--
ALTER TABLE `incharge_add_event`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `incharge_history`
--
ALTER TABLE `incharge_history`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `online_attendance`
--
ALTER TABLE `online_attendance`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `registered_idnumber`
--
ALTER TABLE `registered_idnumber`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `registered_incharge`
--
ALTER TABLE `registered_incharge`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `registered_users`
--
ALTER TABLE `registered_users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reset_password_token`
--
ALTER TABLE `reset_password_token`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_guest`
--
ALTER TABLE `tbl_guest`
  MODIFY `UserID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
