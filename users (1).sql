-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2024 at 11:41 AM
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
('admin', 'admin123');

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
(1, 'Sundar', '0000-00-00', 'sundarghodadara@gmail.com', '', 0, 'Sundar@20', '', '', '0000-00-00', '0000-00-00'),
(2, 'dhruvika', '0000-00-00', 'dhruvi@gmail.com', '', 0, 'Dhruvi@200', '', '', '0000-00-00', '0000-00-00'),
(3, 'Shveta', '0000-00-00', 'jikadra@gmail.com', '', 0, 'Shveta123', '', '', '0000-00-00', '0000-00-00'),
(5, 'vibhuti', '', 'vibhuti@gmail.cpm', '', 0, '123456', '', '', '0000-00-00', '0000-00-00'),
(6, 'admin', '', 'admin@gmail.com', '', 0, 'admin123', '', '', '0000-00-00', '0000-00-00'),
(7, 'yesha', '', 'yesha@gmail.com', '', 0, 'Yesha@123', '', '', '0000-00-00', '0000-00-00'),
(8, 'ridhi', '', 'ridhi@gmail.com', '', 0, 'Ridhi@123', '', '', '0000-00-00', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userdetails`
--
ALTER TABLE `userdetails`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
