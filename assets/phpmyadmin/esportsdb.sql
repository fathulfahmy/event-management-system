-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2024 at 04:24 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `esportsdb`
--
CREATE DATABASE IF NOT EXISTS `esportsdb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `esportsdb`;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `adminid` int(4) UNSIGNED ZEROFILL NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL DEFAULT 'Admin123'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`adminid`, `firstname`, `lastname`, `username`, `email`, `password`) VALUES
(0001, 'Uniten', 'Esports 1', 'unitenesports1', 'unitenesports1@uniten.edu.my', 'Admin123'),
(0002, 'Uniten', 'Esports 2', 'unitenesports2', 'unitenesports2@uniten.edu.my', 'Admin123');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE `events` (
  `eventid` int(4) UNSIGNED ZEROFILL NOT NULL,
  `eventname` varchar(30) NOT NULL,
  `quota` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eventid`, `eventname`, `quota`) VALUES
(0001, 'Valorant', 3),
(0002, 'Counter-Strike 2', 3),
(0003, 'EA Sports FC 24', 2);

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

DROP TABLE IF EXISTS `participants`;
CREATE TABLE `participants` (
  `participantid` int(4) UNSIGNED ZEROFILL NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`participantid`, `firstname`, `lastname`, `username`, `email`, `password`) VALUES
(0001, 'Akmal Izudin', 'Bin Zakaria', 'akmal', 'akmalizudin@gmail.com', 'Akmal123'),
(0002, 'Muhammad Safwan', 'Bin Serat', 'safwan', 'safwanserat@gmail.com', 'Safwan123'),
(0003, 'Mus\'ab Salihin', 'Bin Mustaffa', 'musab', 'musabsalihin@gmail.com', 'Musab123'),
(0004, 'Wan Haziq Iskandar', 'Bin Wan Izhan', 'haziq', 'haziqiskandar@gmail.com', 'Haziq123');

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

DROP TABLE IF EXISTS `registrations`;
CREATE TABLE `registrations` (
  `registrationid` int(4) UNSIGNED ZEROFILL NOT NULL,
  `participantid` int(4) UNSIGNED ZEROFILL NOT NULL,
  `eventid` int(4) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`registrationid`, `participantid`, `eventid`) VALUES
(0015, 0001, 0001),
(0016, 0003, 0001),
(0017, 0002, 0002),
(0018, 0001, 0002),
(0019, 0004, 0003),
(0020, 0002, 0003);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`eventid`);

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`participantid`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`registrationid`),
  ADD KEY `participantid` (`participantid`),
  ADD KEY `eventid` (`eventid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `adminid` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `eventid` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `participants`
--
ALTER TABLE `participants`
  MODIFY `participantid` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `registrationid` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `registrations`
--
ALTER TABLE `registrations`
  ADD CONSTRAINT `registrations_ibfk_1` FOREIGN KEY (`participantid`) REFERENCES `participants` (`participantid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `registrations_ibfk_2` FOREIGN KEY (`eventid`) REFERENCES `events` (`eventid`) ON DELETE CASCADE ON UPDATE CASCADE;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
