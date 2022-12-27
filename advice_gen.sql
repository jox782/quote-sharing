-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2022 at 05:40 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `advice_gen`
--

-- --------------------------------------------------------

--
-- Table structure for table `advices`
--

CREATE TABLE `advices` (
  `Id` int(32) NOT NULL,
  `Email` varchar(32) NOT NULL,
  `Name` varchar(32) NOT NULL,
  `Advice` text NOT NULL,
  `Status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `advices`
--

INSERT INTO `advices` (`Id`, `Email`, `Name`, `Advice`, `Status`) VALUES
(18, 'you@you.com', 'youssef', 'Stop using the term \"busy\" as an excuse.\r\n', 2),
(19, 'you@you.com', 'youssef', 'Most things are not as bad as you think they are.\r\n', 2),
(20, 'you@you.com', 'youssef', 'What\'s stopping you?\r\n', 2),
(21, 'you@you.com', 'youssef', 'You\'re not as fat as you think you are.', 2),
(22, 'you@you.com', 'youssef', 'Repeat people\'s names when you meet them.', 2),
(23, 'you@you.com', 'youssef', 'The person who never made a mistake never made anything.', 2),
(24, 'you@you.com', 'youssef', 'You spend half your life asleep or in bed. It\'s worth spending money on a good mattress, decent pillows and a comfy duvet.', 2),
(25, 'you@you.com', 'youssef', 'Always double check you actually attached the file to the email.', 2),
(26, 'you@you.com', 'youssef', 'Try using an old idea.', 2),
(27, 'you@you.com', 'youssef', 'Never run a marathon in Crocs.', 2),
(28, 'you@you.com', 'youssef', 'If you think nobody cares if you\'re alive, try missing a few payments.', 2),
(29, 'you@you.com', 'youssef', 'What could you increase? What could you reduce?', 2),
(30, 'you@you.com', 'youssef', 'Don\'t drink bleach.', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(32) NOT NULL,
  `Name` varchar(32) NOT NULL,
  `Email` varchar(32) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `Role` varchar(32) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `Name`, `Email`, `Password`, `Role`) VALUES
(5, 'youssef', 'you@you.com', '123', 'user'),
(6, 'joe', 'admin@joe.com', '123', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advices`
--
ALTER TABLE `advices`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advices`
--
ALTER TABLE `advices`
  MODIFY `Id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
