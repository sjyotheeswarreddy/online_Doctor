-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2022 at 06:26 PM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinedoctor`
--

-- --------------------------------------------------------

--
-- Table structure for table `addsupport`
--

CREATE TABLE `addsupport` (
  `id` int(100) NOT NULL,
  `Name` varchar(250) NOT NULL,
  `email` varchar(100) NOT NULL,
  `Problemtype` varchar(50) NOT NULL,
  `image` varchar(250) NOT NULL,
  `Description` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addsupport`
--

INSERT INTO `addsupport` (`id`, `Name`, `email`, `Problemtype`, `image`, `Description`, `status`) VALUES
(17, 'anil', 'j@gmail.com', 'Maintainance', 'assets/img/download.jpg', 'cleaning', 'Pending'),
(18, 'anil', 'j@gmail.com', 'Software', 'assets/img/download.jpg', 'issue', 'Pending'),
(19, 'anil', '', 'Select', 'assets/img/download.jpg', '', ''),
(27, 'vishnu', 'g@gmail.com', 'Select', 'assets/img/download.jpg', '', ''),
(28, 'vishnu', 'g@gmail.com', 'Select', 'assets/img/download.jpg', '', ''),
(29, 'vishnu', 'g@gmail.com', 'Select', 'assets/img/download.jpg', '', ''),
(30, 'vishnu', 'g@gmail.com', 'Select', 'assets/img/download.jpg', '', '0'),
(31, 'vishnu', 'g@gmail.com', 'Software', 'assets/img/download.jpg', '', 'Pending'),
(32, 'vishnu', '', 'Select', 'assets/img/download.jpg', '', ''),
(33, 'issue', 'a@gmail.com', 'Software', 'assets/img/download.jpg', 'sdfghj', ''),
(34, 'vishnu', 'a@gmail.com', 'Software', 'assets/img/download.jpg', 'asdfg', ''),
(35, 'anil', 'dhanista@gmail.com', 'Software', 'assets/img/download.jpg', 'km,', ''),
(36, 'anil', 'anil@gmail.com', 'Hardware', 'assets/img/download.jpg', 'No treatment kits available', ''),
(37, 'vishnu', 'kumaranil@gmail.com', 'Software', 'assets/img/download.jpg', 'kldcv', ''),
(38, 'anilKUMAR', 'kumaranil@gmail.com', 'Software', 'assets/img/bg_3.jpg', 'network issue', ''),
(39, 'anilKUMAR', 'kumaranil@gmail.com', 'Hardware', 'assets/img/bg_3.jpg', 'asdf', '');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `doctorname` varchar(30) NOT NULL,
  `PatientName` varchar(50) NOT NULL,
  `Patient_Email` varchar(100) NOT NULL,
  `PatientPhone` varchar(10) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Comments` varchar(250) NOT NULL,
  `meeting_link` varchar(100) NOT NULL,
  `Medicine` varchar(100) NOT NULL,
  `Tests` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `doctorname`, `PatientName`, `Patient_Email`, `PatientPhone`, `Date`, `Time`, `Comments`, `meeting_link`, `Medicine`, `Tests`, `status`) VALUES
(25, 'anilKUMAR', 'ali', 'a@gmail.com', '9988776658', '2022-09-10', '21:28:00', 'headache', 'https://zoom.us/join', '', '', 'Completed'),
(26, 'sujana', 'ali', 'a@gmail.com', '9988776658', '2022-09-09', '20:29:00', 'dsfds', 'https://zoom.us/join', '', '', 'Pending'),
(27, 'anilKUMAR', 'ali', 'a@gmail.com', '9988776658', '2022-09-17', '18:24:00', 'lkj', '', '', '', 'Pending'),
(28, 'anilKUMAR', 'vishnu', 'vishnu@gmail.com', '8856452112', '2022-09-30', '12:51:00', '', '', '', '', ''),
(29, 'anilKUMAR', 'vishnu', 'vishnu@gmail.com', '8856452112', '2022-09-29', '12:52:00', '', 'https://zoom.us/join', '', '', ''),
(30, 'sujana', 'vishnu', 'vishnu@gmail.com', '8856452112', '2022-09-30', '14:54:00', '', '', '', '', ''),
(31, 'anilKUMAR', 'vishnu', 'vishnu@gmail.com', '8856452112', '2022-10-07', '12:53:00', '', '', '', '', ''),
(32, 'sujana', 'vishnu', 'vishnu@gmail.com', '8856452112', '2022-10-06', '14:55:00', '', '', '', '', ''),
(33, 'sujana', 'vishnu', 'vishnu@gmail.com', '8856452112', '2022-09-29', '13:54:00', '', '', '', '', ''),
(34, 'sujana', 'vishnu', 'vishnu@gmail.com', '8856452112', '2022-09-30', '15:57:00', '', '', '', '', ''),
(35, 'anilKUMAR', 'vishnu', 'vishnu@gmail.com', '8856452112', '2022-10-14', '20:18:00', '', '', '', '', ''),
(36, 'anilKUMAR', 'vishnu', 'vishnu@gmail.com', '8856452112', '2022-10-09', '18:32:00', '', 'https://zoom.us/join', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE `logins` (
  `id` int(100) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `mobileno` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`id`, `name`, `email`, `mobileno`, `password`, `role`, `status`) VALUES
(1, 'sudarshan', 'sudarshan@gmail.com', '8106104600', 'Sudarshan@123', 'user', 1),
(2, 'chandrika', 'chandrika@gmail.com', '8796541230', 'chandrika@123', 'user', 1),
(3, 'naga', 'naga@gmail.com', '9874563210', 'nag@12', 'Hospital', 1),
(4, 'dhanistha', 'admin@gmail.com', '7418529630', 'admin@12', 'admin', 1),
(5, 'ganesh', 'ganesh@gmail.com', '9638521470', 'gani@12', 'staff', 1),
(7, 'sudarshan', 'sudarshan@gmail.com', '8106104600', 'Sudarshan@123', 'user', 0);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `paymentID` varchar(30) NOT NULL,
  `doctorname` varchar(30) NOT NULL,
  `PatientName` varchar(100) NOT NULL,
  `PaymentType` varchar(30) NOT NULL,
  `PaidDate` varchar(255) NOT NULL,
  `PaidAmount` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `paymentID`, `doctorname`, `PatientName`, `PaymentType`, `PaidDate`, `PaidAmount`) VALUES
(31, 'PAYT632320bc36cd4', 'anilKUMAR', 'ali', 'Online', '09/15/2022 12:55:24', '500/-'),
(32, 'PAYT63232146b474d', 'sujana', 'ali', 'UPI', '09/15/2022 12:57:42', '200/-'),
(33, 'PAYT63244234021be', 'sujana', 'ali', 'Select', '09/16/2022 09:30:28', '260'),
(34, 'PAYT632455693dbdf', 'anilKUMAR', 'ali', 'Select', '09/16/2022 10:52:25', '650'),
(35, 'PAYT632d5029e3999', 'anilKUMAR', 'vishnu', 'Online', '09/23/2022 06:20:25', '650'),
(36, 'PAYT632d5049b88f1', 'anilKUMAR', 'vishnu', 'UPI', '09/23/2022 06:20:57', '650'),
(37, 'PAYT632d5068ca506', 'sujana', 'vishnu', 'Debitcard', '09/23/2022 06:21:28', '260'),
(38, 'PAYT632d507f953e0', 'anilKUMAR', 'vishnu', 'Debitcard', '09/23/2022 06:21:51', '650'),
(39, 'PAYT632d509d1ed6a', 'sujana', 'vishnu', 'UPI', '09/23/2022 06:22:21', '260'),
(40, 'PAYT632d50b59f742', 'sujana', 'vishnu', 'Select', '09/23/2022 06:22:45', '260'),
(41, 'PAYT632d50caef8b6', 'sujana', 'vishnu', 'Select', '09/23/2022 06:23:06', '260'),
(42, 'PAYT633d7c823c2d4', 'anilKUMAR', 'vishnu', 'Online', '10/05/2022 12:45:54', '500/-'),
(43, 'PAYT633d8061a76e1', 'anilKUMAR', 'vishnu', 'Select', '10/05/2022 01:02:25', '500/-');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `id` int(11) NOT NULL,
  `DoctorName` varchar(30) NOT NULL,
  `PatientName` varchar(30) NOT NULL,
  `Patient_Email` varchar(50) NOT NULL,
  `PatientPhoneNumber` varchar(50) NOT NULL,
  `Description` varchar(50) NOT NULL,
  `Medicine` varchar(50) NOT NULL,
  `Tests` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`id`, `DoctorName`, `PatientName`, `Patient_Email`, `PatientPhoneNumber`, `Description`, `Medicine`, `Tests`) VALUES
(1, 'Anil', 'sudarshan', 'sudarshan@gmail.com', '9874563218', 'eye problem', 'Dolo650,\r\nOmez', 'blood test'),
(2, 'Ali', 'dhanista', 'dhanista@gmail.com', '8854568555', 'headache', 'aspirin', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(70) NOT NULL,
  `Username` varchar(79) NOT NULL,
  `EmailAddress` varchar(80) NOT NULL,
  `Password` varchar(120) NOT NULL,
  `UserMobile` varchar(90) NOT NULL,
  `role` varchar(30) NOT NULL,
  `image` varchar(30) NOT NULL,
  `Hospital_Name` varchar(25) NOT NULL,
  `Qualification` varchar(30) NOT NULL,
  `Experience` varchar(25) NOT NULL,
  `Address` varchar(25) NOT NULL,
  `Pincode` varchar(25) NOT NULL,
  `fee` varchar(100) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `Username`, `EmailAddress`, `Password`, `UserMobile`, `role`, `image`, `Hospital_Name`, `Qualification`, `Experience`, `Address`, `Pincode`, `fee`, `status`) VALUES
(19, 'anilKUMAR', 'kumar@gmail.com', 'ZEc0T2tmRU1ieFZjcjdpTUFETGtNZm5iRnZ6Uktub3p3ckhxbnBsR3ZsdkRwSExJUnhENEJlSDMreHl1STNTTw==', '9988776655', 'Doctor', '../images/person_1.jpg', '', 'MD', '5yrs', '', '', '500/-', 0),
(20, 'jyothi', 'j@gmail.com', 'ZEc0T2tmRU1ieFZjcjdpTUFETGtNZm5iRnZ6Uktub3p3ckhxbnBsR3ZsdkRwSExJUnhENEJlSDMreHl1STNTTw==', '9988776699', 'Staff', 'assets/img/download (1).jpg', '', 'B.com (computers)', '8 months', '', '', '', 1),
(21, 'sujana', 's@gmail.com', 'ZEc0T2tmRU1ieFZjcjdpTUFETGtNZm5iRnZ6Uktub3p3ckhxbnBsR3ZsdkRwSExJUnhENEJlSDMreHl1STNTTw==', '9988776658', 'Doctor', '../images/image_2.jpg', '', 'MBBS', '6yrs', '', '', '200/-', 0),
(22, 'sujju', 'ss@gmail.com', 'ZEc0T2tmRU1ieFZjcjdpTUFETGtNZm5iRnZ6Uktub3p3ckhxbnBsR3ZsdkRwSExJUnhENEJlSDMreHl1STNTTw==', '9988776658', 'Admin', 'assets/img/download (1).jpg', '', '', '', '', '', '', 0),
(23, 'vishnu', 'vishnu@gmail.com', 'ZEc0T2tmRU1ieFZjcjdpTUFETGtNZm5iRnZ6Uktub3p3ckhxbnBsR3ZsdkRwSExJUnhENEJlSDMreHl1STNTTw==', '8856452112', 'User', '', '', '', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phoneno` int(11) NOT NULL,
  `hospitalname` varchar(120) NOT NULL,
  `address` varchar(120) NOT NULL,
  `role` varchar(120) NOT NULL,
  `qualification` varchar(120) NOT NULL,
  `pincode` int(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `phoneno`, `hospitalname`, `address`, `role`, `qualification`, `pincode`) VALUES
(9, 'Dhanista12', 'dhanista.m@gmail.com', 2147483647, 'dhanista', 'mallavaram', '', 'MBBS', 517501),
(10, 'Mallavaram Dhanista ', 'sravya.m@gmail.com', 2147483647, 'arogya', 'fdvdfvdfbdg', 'Pharmacy', 'BPT', 517501);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addsupport`
--
ALTER TABLE `addsupport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
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
-- AUTO_INCREMENT for table `addsupport`
--
ALTER TABLE `addsupport`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(70) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
