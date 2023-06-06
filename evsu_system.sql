-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2023 at 11:20 AM
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

--
-- Dumping data for table `incharge_add_event`
--

INSERT INTO `incharge_add_event` (`userID`, `eventType`, `towho`, `fromwho`, `eventSubject`, `venue`, `agenda`, `date`, `file`, `eventStatus`) VALUES
(26, 'MEETING', 'STUDENT AND EMPLOYEE', 'COMPUTER STUDIES', 'Clean-Up Drive', 'FUNCTION HALL', 'To teach residents about activities that will reduce carbon footprints.', '2023-05-20', 'e8156338a38a4e5bc26e2b4cb957bd0c.pdf', 'Active'),
(27, 'MEETING', '2ND YEAR', 'COMPUTER STUDIES', 'Student Orientation', 'IT OFFICE', 'Example', '2023-05-20', '43dadb92acfe4f6f186c94bec4d8fd56.pdf', 'Active');

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

--
-- Dumping data for table `registered_admin`
--

INSERT INTO `registered_admin` (`userid`, `Registered_ID`, `IDnumber`, `email`, `Firstname`, `middlename`, `Lastname`, `password`, `login_type`, `profile_picture`) VALUES
(2, '12 ', '2020-20201', 'omapasdhemz77@gmail.com', 'Dhemler', 'Ayento', 'Omapas', '$argon2i$v=19$m=65536,t=4,p=1$dVM2elRYL2c4NkpUcmcuNg$UrqNEIkNkTMeaX18LatfLXJqxXS2YhlFszf+XwRwGqE', 'ADMIN', '');

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

--
-- Dumping data for table `registered_idnumber`
--

INSERT INTO `registered_idnumber` (`UserID`, `Registered_ID`, `IDnumber`, `email`, `OTP`, `login_type`, `date`) VALUES
(35, '12', '2020-20201', 'omapasdhemz77@gmail.com', '246472', 'ADMIN', '2023-05-20 06:41:13'),
(36, '9', '2021-20213', 'jodelyn.cabalterajode@evsu.edu.ph', '503839', 'STUDENT', '2023-05-20 06:49:34'),
(37, '14', '2023-20231', 'dhemzomapas@gmail.com', '346162', 'INCHARGE', '2023-05-20 06:55:33'),
(38, '10', '2021-20214', 'juliannmascariola@gmail.com', '441760', 'STUDENT', '2023-05-20 07:03:19'),
(39, '25', '2022-20221', 'dhemzomapas@gmail.com', '617283', 'EMPLOYEE', '2023-05-20 07:04:13'),
(40, '10', '2021-20214', 'juliannmascariola@gmail.com', '561952', 'STUDENT', '2023-05-20 07:04:49'),
(41, '25', '2022-20221', 'dhemzomapas@gmail.com', '808640', 'EMPLOYEE', '2023-05-20 07:07:13'),
(42, '10', '2021-20214', 'mascariolajuliann@gmail.com', '400632', 'STUDENT', '2023-05-20 07:08:09');

-- --------------------------------------------------------

--
-- Table structure for table `registered_incharge`
--

CREATE TABLE `registered_incharge` (
  `UserID` int(11) NOT NULL,
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

--
-- Dumping data for table `registered_incharge`
--

INSERT INTO `registered_incharge` (`UserID`, `Registered_ID`, `IDnumber`, `firstname`, `middlename`, `lastname`, `email`, `password`, `department`, `profile_picture`, `type`) VALUES
(12, '14 ', '2023-20231', 'Dhemz', 'Ayento', 'Omaps', 'dhemzomapas@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$SkMwSWk2d2tyYkIyMElaLg$Wzwt8ZSK6UekglZxlYBVKl7jVUNuHx/WCNhjxfEptqE', 'COMPUTER STUDIES', '', 'INCHARGE');

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

--
-- Dumping data for table `registered_users`
--

INSERT INTO `registered_users` (`UserID`, `Registered_ID`, `IDnumber`, `email`, `username`, `Firstname`, `Middlename`, `Lastname`, `password`, `Department`, `year`, `login_type`, `profile_picture`, `qrID`) VALUES
(46, '9 ', '2021-20213', 'jodelyn.cabalterajode@evsu.edu.ph', NULL, 'Jodelyn', 'Cabaltera', 'Morpos', '$argon2i$v=19$m=65536,t=4,p=1$OGI0NFBTZy9mU1YyODVtMw$Et2MLf3FvDbo3LHkYCu2v0j0E8kXJVOiQ59V80vPdEc', 'COMPUTER STUDIES', '4th', 'STUDENT', '', '2021-20213-c0a4a20f6c3f48771553'),
(47, '25 ', '2022-20221', 'dhemzomapas@gmail.com', 'none', 'Dhemler', '', 'Omapas', '$argon2i$v=19$m=65536,t=4,p=1$RDBtZ1MydUFucXBVZHFCTg$jbUdqR2rnaLSp6C3+oSniP6VpmcFKw0aUKV4Ts07RMQ', 'COMPUTER STUDIES', NULL, 'EMPLOYEE', '', '2022-20221-e97bf27d2d656f259194'),
(48, '10 ', '2021-20214', 'mascariolajuliann@gmail.com', NULL, 'Juliann', 'Laperas', 'Mascariola', '$argon2i$v=19$m=65536,t=4,p=1$bEFRME1VN2RBOG52V2NXeQ$MzaGkhIwSE+mpm2CepPiymVvFRpiBUUDe8ePlnkuX9k', 'COMPUTER STUDIES', '2nd', 'STUDENT', '', '2021-20214-b8638d2f648cf78b3001');

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

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`UserID`, `firstname`, `middlename`, `lastname`, `IDnumber`, `email`) VALUES
(12, 'Dhemler', 'Ayento', 'Omapas', '2020-20201', 'omapasdhemz77@gmail.com');

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

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`UserID`, `IDnumber`, `firstname`, `middlename`, `lastname`, `email`, `department`, `type`) VALUES
(25, '2022-20221', 'Dhemler', 'Ayento', 'Omapas', 'dhemzomapas@gmail.com', 'COMPUTER STUDIES', 'EMPLOYEE'),
(26, '2022-20222', 'Ernesto', 'Abenoja', 'Omapas', 'ernestoomapas68@gmail.com', 'ENGINEERING', 'EMPLOYEE'),
(27, '2022-20223', 'edward', 'B', 'bertulfo', 'bertulfoedward@gmail.com', 'COMPUTER STUDIES', 'EMPLOYEE');

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

--
-- Dumping data for table `tbl_incharge`
--

INSERT INTO `tbl_incharge` (`UserID`, `IDnumber`, `firstname`, `middlename`, `lastname`, `email`, `department`) VALUES
(14, '2023-20231', 'Dhemz', 'Ayento', 'Omaps', 'dhemzomapas@gmail.com', 'COMPUTER STUDIES');

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
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`UserID`, `IDnumber`, `firstname`, `middlename`, `lastname`, `email`, `year`, `course`, `department`, `type`) VALUES
(7, '2021-20211', 'Dhemler', 'Ayento', 'Omapas', 'dhemzomapas@gmail.com', '4th', 'BSIT', 'COMPUTER STUDIES', 'STUDENT'),
(8, '2021-20212', 'Ernesto', 'Abenoja', 'Omapas', 'ernestoomapas68@gmail.com', '3rd', 'BSIT', 'COMPUTER STUDIES', 'STUDENT'),
(9, '2021-20213', 'Jodelyn', 'Cabaltera', 'Morpos', 'jodelyn.cabalterajode@evsu.edu.ph', '4th', 'BSME', 'ENGINEERING', 'STUDENT'),
(10, '2021-20214', 'Juliann', 'Laperas', 'Mascariola', 'mascariolajuliann@gmail.com', '2nd', 'BSCE', 'ENGINEERING', 'STUDENT');

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
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `incharge_history`
--
ALTER TABLE `incharge_history`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `online_attendance`
--
ALTER TABLE `online_attendance`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `online_attendance2`
--
ALTER TABLE `online_attendance2`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `registered_admin`
--
ALTER TABLE `registered_admin`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `registered_idnumber`
--
ALTER TABLE `registered_idnumber`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `registered_incharge`
--
ALTER TABLE `registered_incharge`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `registered_users`
--
ALTER TABLE `registered_users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `reset_password_token`
--
ALTER TABLE `reset_password_token`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `UserID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_guest`
--
ALTER TABLE `tbl_guest`
  MODIFY `UserID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_incharge`
--
ALTER TABLE `tbl_incharge`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
