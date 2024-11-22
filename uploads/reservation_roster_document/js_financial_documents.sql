-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2024 at 10:27 AM
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
-- Database: `sidbi_old`
--

-- --------------------------------------------------------

--
-- Table structure for table `js_financial_documents`
--

CREATE TABLE `js_financial_documents` (
  `financial_report_document_id` int(11) NOT NULL,
  `financial_report_id` int(11) NOT NULL DEFAULT 0,
  `financialreport_document_language_id` int(11) NOT NULL DEFAULT 0,
  `financialreport_document_type` int(11) NOT NULL DEFAULT 0,
  `financialreport_document_name` text DEFAULT NULL,
  `createdby` int(11) NOT NULL DEFAULT 0,
  `createdon` datetime DEFAULT NULL,
  `updatedon` datetime DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `js_financial_documents`
--

INSERT INTO `js_financial_documents` (`financial_report_document_id`, `financial_report_id`, `financialreport_document_language_id`, `financialreport_document_type`, `financialreport_document_name`, `createdby`, `createdon`, `updatedon`, `status`, `deleted`) VALUES
(1, 93, 1, 0, 'xfvgb-133951706883409.txt', 9, '2024-02-02 19:46:49', NULL, 1, 0),
(2, 94, 1, 0, 'financial_report-8161706964974.txt', 9, '2024-02-03 18:26:14', NULL, 1, 0),
(3, 95, 1, 0, '-765631706965160.docx', 9, '2024-02-03 18:29:20', NULL, 1, 0),
(4, 96, 2, 0, '-499511706965462.txt', 9, '2024-02-03 18:34:22', NULL, 1, 0),
(5, 97, 1, 0, '-856981706965557.txt', 9, '2024-02-03 18:35:57', NULL, 1, 0),
(6, 98, 2, 0, '-284471706965908.docx', 9, '2024-02-03 18:41:48', NULL, 1, 0),
(7, 99, 2, 0, '-760901707198991.txt', 9, '2024-02-06 11:26:31', NULL, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `js_financial_documents`
--
ALTER TABLE `js_financial_documents`
  ADD PRIMARY KEY (`financial_report_document_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `js_financial_documents`
--
ALTER TABLE `js_financial_documents`
  MODIFY `financial_report_document_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
