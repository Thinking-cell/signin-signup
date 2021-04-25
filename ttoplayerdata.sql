-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2020 at 05:28 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";




--
-- Database: `000819787`
--

-- --------------------------------------------------------

--
-- Table structure for table `ttoplayerdata`
--

CREATE TABLE `ttoplayerdata` (
  `playerId` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `wins` int(11) NOT NULL DEFAULT 0,
  `loses` int(11) NOT NULL DEFAULT 0,
  `lastplayed` date NOT NULL
) ENGINE=InnoDB;

--
-- Dumping data for table `ttoplayerdata`
--

INSERT INTO `ttoplayerdata` (`playerId`, `email`, `pass`, `wins`, `loses`, `lastplayed`) VALUES
(1, '000819787@mohawk.ca', 'password', 7, 3, '2020-12-10'),
(4, 'adam@kmail.com', 'password1', 0, 0, '2020-12-10'),
(7, 'mawal@k.ca', 'pass1', 3, 1, '2020-12-12'),
(8, 'saand@redbull.in', 'pass', 3, 11, '2020-12-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ttoplayerdata`
--
ALTER TABLE `ttoplayerdata`
  ADD PRIMARY KEY (`playerId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ttoplayerdata`
--
ALTER TABLE `ttoplayerdata`
  MODIFY `playerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;


