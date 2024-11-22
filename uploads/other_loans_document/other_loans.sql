-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2024 at 06:54 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sidbi`
--

-- --------------------------------------------------------

--
-- Table structure for table `other_loans`
--

CREATE TABLE `other_loans` (
  `other_loans_id` int(11) NOT NULL,
  `other_loans_title` varchar(250) DEFAULT NULL,
  `filename` varchar(250) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `createdby` int(11) NOT NULL,
  `createdon` datetime DEFAULT NULL,
  `updatedon` datetime DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `deleted` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `other_loans`
--

INSERT INTO `other_loans` (`other_loans_id`, `other_loans_title`, `filename`, `user_id`, `createdby`, `createdon`, `updatedon`, `status`, `deleted`) VALUES
(1, 'TIFAC-SRIJAN Scheme', 'TIFAC_SRIJAN.pdf', 0, 0, '2024-02-16 10:06:27', NULL, 1, 0),
(2, 'General Purpose Term Loan', '8 General Purpose Term Loan.pdf', 0, 0, '2024-02-16 10:10:04', NULL, 1, 0),
(3, 'Guarantee Scheme', '7 Guarantee Scheme.pdf', 0, 0, '2024-02-16 10:11:11', NULL, 1, 0),
(4, 'Secured Business Loan', '5 Secured Business Loan.pdf', 0, 0, '2024-02-16 10:19:49', NULL, 1, 0),
(5, 'Wdw', 'TIFAC_SRIJAN.pdf', 0, 0, '2024-02-16 10:29:19', NULL, 1, 0),
(6, 'Muthu Bro', 'Untitled-design-(76)_690a3a5784d4a4cba72b9928dbb65b08_1280X720.jpg', 0, 0, '2024-02-16 10:49:17', '2024-02-16 11:11:07', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `other_loans`
--
ALTER TABLE `other_loans`
  ADD PRIMARY KEY (`other_loans_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `other_loans`
--
ALTER TABLE `other_loans`
  MODIFY `other_loans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
