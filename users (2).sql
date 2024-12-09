-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2024 at 09:20 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(200) NOT NULL,
  `pass` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `pass`) VALUES
('admin12@gmail.com', 'admin12');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(20) NOT NULL,
  `uname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `sub` varchar(200) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `uname`, `email`, `sub`, `msg`) VALUES
(2, 'Sundar', 'sundar123@gmail.com', 'health', 'health care'),
(3, 'Dhruvi', 'dhruvi@gmail.com', 'meditation', 'Meditation to relax the mind and provide the anergy  of body.'),
(4, 'Vibhuti', 'vibhuti12@gmail.com', 'Yamas', 'this yoga sutra describe ashmsa,asteya,satya and brahmcharya.'),
(5, 'Riya', 'riyu12@gmail.com', 'control of breath', 'some of which include holding your breath may inflammation.'),
(6, 'Tilak', 'tilak12@gmail.com', 'Niyamas', 'Rules,guidences or observation.'),
(7, 'Sagar', 'sagar123@gmail.com', 'withdraw of the sense ', 'This system is a process of detching oneself from external stimuli focus.'),
(8, 'Shveta', 'jikadra43@gmail.com', 'Enlightenment', 'this is highest state of consciosness one can achieve through meditation.'),
(9, 'Jaydip', 'jaydip703@gmail.com', 'Concentration', 'Focus on the single object and focus on your breath.'),
(10, 'Vaidik', 'vaidik76@gmail.com', 'meditation', 'this yoga sutra describe ashmsa,asteya,satya and brahmcharya.'),
(11, 'Mohit', 'mohitt123@gmail.com', 'control of breath', 'Rules,guidences or observation.');

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `id` int(5) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `dob` varchar(200) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `age` int(2) NOT NULL,
  `pass` varchar(10) NOT NULL,
  `plan_name` varchar(30) NOT NULL,
  `payment_amount` varchar(10) NOT NULL,
  `payment_validity` date NOT NULL,
  `payment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`id`, `fullname`, `dob`, `email`, `mobile`, `age`, `pass`, `plan_name`, `payment_amount`, `payment_validity`, `payment_date`) VALUES
(1, 'Sundar', '0000-00-00', 'sundarghodadara@gmail.com', '', 0, 'Sundar@200', '', '', '0000-00-00', '0000-00-00'),
(2, 'dhruvika', '0000-00-00', 'dhruvi@gmail.com', '', 0, 'Dhruvi@200', '', '', '0000-00-00', '0000-00-00'),
(3, 'Shveta', '0000-00-00', 'jikadra@gmail.com', '', 0, 'Shveta123', '', '', '0000-00-00', '0000-00-00'),
(5, 'vibhuti', '', 'vibhuti@gmail.cpm', '', 0, '123456', '', '', '0000-00-00', '0000-00-00'),
(8, 'ridhi', '', 'ridhi@gmail.com', '', 0, 'Ridhi@123', '', '', '0000-00-00', '0000-00-00'),
(9, 'Smit', '', 'smit90@gmail.com', '', 0, 'Smit@1990', '', '', '0000-00-00', '0000-00-00'),
(10, 'Bhavika', '', 'bhavika87@gmail.com', '', 0, 'Bhavu@9999', '', '', '0000-00-00', '0000-00-00'),
(11, 'Jaydip', '', 'jaydip73@gmail.com', '', 0, 'Jaydip@730', '', '', '0000-00-00', '0000-00-00'),
(12, 'sagar', '', 'sagar123@gmail.com', '', 0, 'Sagar@2666', '', '', '0000-00-00', '0000-00-00'),
(13, 'Tilak', '', 'tilak12@gmail.com', '', 0, 'Tilak@9876', '', '', '0000-00-00', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `userdetails`
--
ALTER TABLE `userdetails`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
