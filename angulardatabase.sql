-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2021 at 01:37 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `angulardatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `admintable`
--

CREATE TABLE IF NOT EXISTS `admintable` (
  `Id` int(50) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `ContactNo` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Occupation` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admintable`
--

INSERT INTO `admintable` (`Id`, `Name`, `Email`, `ContactNo`, `Password`, `Occupation`) VALUES
(5, 'Jadhav Prashant Kishanrao', 'prashant@gmail.com', '8983058583', 'prashant@', 'Software Java Developer');

-- --------------------------------------------------------

--
-- Table structure for table `companydetail`
--

CREATE TABLE IF NOT EXISTS `companydetail` (
  `Id` int(50) NOT NULL,
  `company` varchar(255) NOT NULL,
  `sscMarks` varchar(50) NOT NULL,
  `hsccMarks` varchar(50) NOT NULL,
  `diploma` varchar(50) NOT NULL,
  `engineering` varchar(50) NOT NULL,
  `technology` varchar(255) NOT NULL,
  `gap` varchar(50) NOT NULL,
  `detail` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companydetail`
--

INSERT INTO `companydetail` (`Id`, `company`, `sscMarks`, `hsccMarks`, `diploma`, `engineering`, `technology`, `gap`, `detail`) VALUES
(6, 'Infosys', '60% or above', '60% or above', '60% or above', '60% or above', 'Angular, Java', 'No Gap Allowed', 'MNC Company'),
(7, 'Wipro', '60% or above', '60% or above', '60% or above', '60% or above', 'Angular, Python', 'No Gap Allowed', 'MNC Company'),
(8, 'TATA', '60%', '60%', '60%', '60%', 'Auto Cad', 'No Gap Allowed', 'MNC Company'),
(14, 'Red Bus', '50', '50', '50', '50', 'Computer Operator', '1', 'Travel Agency');

-- --------------------------------------------------------

--
-- Table structure for table `hungamatable`
--

CREATE TABLE IF NOT EXISTS `hungamatable` (
  `Id` int(50) NOT NULL,
  `FullName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `sscMarks` int(50) NOT NULL,
  `hscMarks` int(50) NOT NULL,
  `PolyMarks` int(50) NOT NULL,
  `EngineeringMarks` int(50) NOT NULL,
  `ProjectDetails` varchar(255) NOT NULL,
  `Resume` varchar(255) NOT NULL,
  `Contact` varchar(100) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `City` varchar(50) NOT NULL,
  `PinCode` int(20) NOT NULL,
  `State` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hungamatable`
--

INSERT INTO `hungamatable` (`Id`, `FullName`, `Email`, `sscMarks`, `hscMarks`, `PolyMarks`, `EngineeringMarks`, `ProjectDetails`, `Resume`, `Contact`, `Gender`, `City`, `PinCode`, `State`) VALUES
(8, 'Supriya Kishanrao Jadhav', 'supriya@gmail.com', 81, 0, 62, 74, 'First Angular Project', 'Supriya_Mechanical_Resume.pdf', '9561958362', 'female', 'Pune', 413512, 'Maharashtra'),
(10, 'Sandhya Kishanrao Jadhav', 'sandhya@gmail.com', 0, 0, 0, 0, '', '', '7387530590', 'female', 'Pune', 413512, 'Maharashtra'),
(11, 'Shailaja Kishanrao Jadhav', 'shailaja@gmail.com', 0, 0, 0, 0, '', '', '9960432740', 'female', 'Margao', 403714, 'Goa'),
(12, 'Bhagyashree Kishanrao Jadhav', 'bhagyashree@gmail.com', 0, 0, 0, 0, '', '', '9960432740', 'female', 'Latur', 413512, 'Maharashtra'),
(13, 'Ahilya Mahadev Dahphae', 'ahilya@gmail.com', 0, 0, 0, 0, '', '', '7774981888', 'female', 'Pune', 413512, 'Maharashtra'),
(34, 'Vaishnavi Prashant Jadhav', 'vaishnavi@gmail.com', 0, 0, 0, 0, '', '', '2222222222', 'female', 'Latur', 413512, 'Maharashtra');

-- --------------------------------------------------------

--
-- Table structure for table `studentsapplytocompany`
--

CREATE TABLE IF NOT EXISTS `studentsapplytocompany` (
  `StudentId` int(100) NOT NULL,
  `StudentName` varchar(255) NOT NULL,
  `EmailId` varchar(255) NOT NULL,
  `Contact` varchar(255) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `City` varchar(100) NOT NULL,
  `Pincode` int(50) NOT NULL,
  `State` varchar(100) NOT NULL,
  `CompanyId` int(100) NOT NULL,
  `CompanyName` varchar(255) NOT NULL,
  `SSCObtainedMark` varchar(50) NOT NULL,
  `HSCObtainedMark` varchar(50) NOT NULL,
  `DiplomaObtainedMarks` varchar(50) NOT NULL,
  `EngineeringObtainedMarks` varchar(50) NOT NULL,
  `YearDrop` varchar(100) NOT NULL,
  `Technology` varchar(255) NOT NULL,
  `ProjectDetails` varchar(255) NOT NULL,
  `Resume` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentsapplytocompany`
--

INSERT INTO `studentsapplytocompany` (`StudentId`, `StudentName`, `EmailId`, `Contact`, `Gender`, `City`, `Pincode`, `State`, `CompanyId`, `CompanyName`, `SSCObtainedMark`, `HSCObtainedMark`, `DiplomaObtainedMarks`, `EngineeringObtainedMarks`, `YearDrop`, `Technology`, `ProjectDetails`, `Resume`) VALUES
(13, 'Jadhav Supriya Kishanrao', 'supriya@gmail.com', '9561958362', 'male', 'Latur', 413512, 'Maharashtra', 6, 'Infosys', '80.80', '70', '65', '74.17', 'No Gap Allowed', 'Angular', 'First Angular Project', '20160320_084447.jpg'),
(22, 'Bhagyshree', 'supriya@gmail.com', '', '', '', 0, '', 6, 'Infosys', '70', '', '', '', 'No Gap Allowed', 'Angular', '', '20160320_084447.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admintable`
--
ALTER TABLE `admintable`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `companydetail`
--
ALTER TABLE `companydetail`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `hungamatable`
--
ALTER TABLE `hungamatable`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `studentsapplytocompany`
--
ALTER TABLE `studentsapplytocompany`
  ADD PRIMARY KEY (`StudentId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admintable`
--
ALTER TABLE `admintable`
  MODIFY `Id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `companydetail`
--
ALTER TABLE `companydetail`
  MODIFY `Id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `hungamatable`
--
ALTER TABLE `hungamatable`
  MODIFY `Id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `studentsapplytocompany`
--
ALTER TABLE `studentsapplytocompany`
  MODIFY `StudentId` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
