-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 28, 2024 at 08:08 PM
-- Server version: 8.2.0
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loanapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
CREATE TABLE IF NOT EXISTS `address` (
  `account_no` int DEFAULT NULL,
  `street` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `state` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `country` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'india',
  `postal_code` int DEFAULT NULL,
  UNIQUE KEY `account_no` (`account_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`account_no`, `street`, `city`, `state`, `country`, `postal_code`) VALUES
(11000, 'i3rt8237', 'nvsdz ', 'nvsjgn', 'Philippines', 638256),
(11001, 'hello', 'geg', 'shinde state', 'Philippines', 8966),
(11002, 'SDFWE', 'Nagpur', 'maharashtra', 'india', 5785),
(11004, 'area vala', 'Nagpur', 'maharashtra', 'india', 440001),
(11005, 'area', 'Nagpur', 'maharashtra', 'india', 440001),
(11006, 'nagpur', 'Nagpur', 'maharashtra', 'india', 440001);

-- --------------------------------------------------------

--
-- Table structure for table `approved_loans`
--

DROP TABLE IF EXISTS `approved_loans`;
CREATE TABLE IF NOT EXISTS `approved_loans` (
  `loan_no` varchar(20) DEFAULT NULL,
  `date_approved` date DEFAULT NULL,
  `loan_started` date DEFAULT NULL,
  `daily_payment` decimal(8,2) DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'new',
  KEY `approved_loans_ibfk_1` (`loan_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bank_details`
--

DROP TABLE IF EXISTS `bank_details`;
CREATE TABLE IF NOT EXISTS `bank_details` (
  `bank_id` int NOT NULL AUTO_INCREMENT,
  `account_no` int DEFAULT NULL,
  `bank_name` varchar(30) DEFAULT NULL,
  `ifsc_code` varchar(20) DEFAULT NULL,
  `passbook_no` varchar(20) DEFAULT NULL,
  `branch_address` varchar(100) DEFAULT NULL,
  `passbook_url` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`bank_id`),
  KEY `account_no` (`account_no`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bank_details`
--

INSERT INTO `bank_details` (`bank_id`, `account_no`, `bank_name`, `ifsc_code`, `passbook_no`, `branch_address`, `passbook_url`) VALUES
(1, NULL, 'sagy bank', 'SAGY00012', 'ac124249265', 'latur', ''),
(2, 11005, 'SAGY BANK', 'SAGY00012', '9876678897', 'latur', './uploads/passbook/1714332541_IMG_4308 (1).PNG'),
(3, 11006, 'karpe multinantional bank', 'SAGY00012', 'sankys123', 'nagpur', './uploads/passbook/1714334597_png-transparent-boot');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `account_no` int NOT NULL,
  `father_name` varchar(30) NOT NULL,
  `mother_name` varchar(30) NOT NULL,
  `marital_status` varchar(10) NOT NULL,
  `literacy_level` varchar(20) NOT NULL,
  `profile_img` varchar(40) NOT NULL DEFAULT 'person.png',
  `email` varchar(30) DEFAULT NULL,
  `number1` varchar(20) DEFAULT NULL,
  `number2` varchar(20) DEFAULT NULL,
  `birthdate` varchar(20) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `added_info` varchar(100) DEFAULT NULL,
  `status` varchar(10) DEFAULT 'New',
  PRIMARY KEY (`account_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`account_no`, `father_name`, `mother_name`, `marital_status`, `literacy_level`, `profile_img`, `email`, `number1`, `number2`, `birthdate`, `gender`, `added_info`, `status`) VALUES
(11000, '', '', '', '', '', 'superadmi45n@gmail.com', '987654321', '987654321', '2024-04-16', 'Male', 'gnwel', 'New'),
(11001, '', '', '', '', '', 'sgshinde612@gmail.com', '987654321', '987654321', '2024-04-21', 'Male', '', 'New'),
(11002, '', '', '', '', '', 'school1@gmail.comqw', '234567', '', '2024-04-06', 'Male', '', 'New'),
(11003, 'yedzava', 'aai', 'single', 'this value', '', 'supgderadmin@gmail.com', '876543456', '4323456', '2024-04-27', 'Male', 'no info available', 'New'),
(11004, 'yedzava', 'aai', 'single', 'this value', '', 'supgderadmin@gmail.com', '876543456', '4323456', '2024-04-26', 'Male', 'no info available', 'New'),
(11005, 'kashinath mitkari', 'aai', 'divorced', 'mtech', '', 'aditya@gmail.com', '9876543210', '', '2024-04-13', 'Male', 'about user', 'New'),
(11006, 'pappaji gajphiye', 'aai', 'single', 'btech-cse', '', 'sanky@gmail.com', '9876543210', '87654', '2024-04-26', 'Male', 'somethingds about me', 'New');

-- --------------------------------------------------------

--
-- Table structure for table `debtor_business`
--

DROP TABLE IF EXISTS `debtor_business`;
CREATE TABLE IF NOT EXISTS `debtor_business` (
  `business_no` int NOT NULL AUTO_INCREMENT,
  `business_name` varchar(30) DEFAULT NULL,
  `business_address` varchar(50) NOT NULL,
  `loan_no` varchar(20) DEFAULT NULL,
  `account_no` int DEFAULT NULL,
  PRIMARY KEY (`business_no`),
  KEY `debtor_business_ibfk_1` (`loan_no`)
) ENGINE=InnoDB AUTO_INCREMENT=309 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

DROP TABLE IF EXISTS `documents`;
CREATE TABLE IF NOT EXISTS `documents` (
  `document_id` int NOT NULL AUTO_INCREMENT,
  `account_no` int DEFAULT NULL,
  `pan_card_number` varchar(20) DEFAULT NULL,
  `pan_card_document` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `aadhar_card_number` varchar(20) DEFAULT NULL,
  `aadhar_card_document` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `electricity_bill_number` varchar(20) DEFAULT NULL,
  `electricity_bill_document` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `application_form_number` varchar(20) DEFAULT NULL,
  `application_form_document` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`document_id`),
  KEY `account_no` (`account_no`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`document_id`, `account_no`, `pan_card_number`, `pan_card_document`, `aadhar_card_number`, `aadhar_card_document`, `electricity_bill_number`, `electricity_bill_document`, `application_form_number`, `application_form_document`) VALUES
(1, NULL, '2345', 'uploads/pan/1714331366_statement.pdf', '34567', 'uploads/aadhar/1714331358_statement (1).pdf', '34567', './uploads/electricity/1714331392_Picsart_23-10-13_', '3456', NULL),
(2, NULL, '2345', '', '34567', '', '34567', '', '3456', NULL),
(3, 11005, 'pan no 1', 'uploads/pan/1714332509_statement.pdf', 'aadhar no1', 'uploads/aadhar/1714332516_statement (1).pdf', 'ele no 1', './uploads/electricity/1714332501_Picsart_23-10-13_21-09-45-865-1-1024x1024 (1).png', 'app no 1', NULL),
(4, 11006, 'lzpps8078d', 'uploads/pan/1714334539_statement.pdf', '388106387299', 'uploads/aadhar/1714334520_statement (1).pdf', 'elebil', './uploads/electricity/1714334553_3-devices-white.png', 'application n', './uploads/application/1714334565_statement (2).pdf');

-- --------------------------------------------------------

--
-- Table structure for table `guarantors_details`
--

DROP TABLE IF EXISTS `guarantors_details`;
CREATE TABLE IF NOT EXISTS `guarantors_details` (
  `guarantor_id` int NOT NULL AUTO_INCREMENT,
  `account_no` int DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL,
  `relation` varchar(20) DEFAULT NULL,
  `adhar_no` varchar(20) DEFAULT NULL,
  `adhar_uploaded_url` varchar(100) DEFAULT NULL,
  `pan_card_no` varchar(20) DEFAULT NULL,
  `pan_card_uploaded_url` varchar(100) DEFAULT NULL,
  `expense_details` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`guarantor_id`),
  KEY `account_no` (`account_no`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `guarantors_details`
--

INSERT INTO `guarantors_details` (`guarantor_id`, `account_no`, `name`, `relation`, `adhar_no`, `adhar_uploaded_url`, `pan_card_no`, `pan_card_uploaded_url`, `expense_details`) VALUES
(1, NULL, 'aditya', 'aditya', '8976533', '', 'pan 1224', '', 'no expense '),
(2, 11005, 'bhokal', 'mahabhokal', 'devsena no 1', 'uploads/gaadhar/1714332572_statement.pdf', 'dev sena no 2', 'uploads/gpan/1714332580_statement (1).pdf', '10000'),
(3, 11006, 'Signal_Loan', 'dost', '9876543erfg', 'uploads/gaadhar/1714334701_statement (2).pdf', 'jgw456yuhg', 'uploads/gpan/1714334692_calculator_result_statement.pdf', 'expense details');

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

DROP TABLE IF EXISTS `loan`;
CREATE TABLE IF NOT EXISTS `loan` (
  `loan_no` varchar(20) NOT NULL,
  `account_no` int DEFAULT NULL,
  `area` varchar(20) DEFAULT NULL,
  `loan_amount` decimal(8,2) DEFAULT NULL,
  `interest` decimal(5,2) DEFAULT '10.00',
  `collector` varchar(50) DEFAULT NULL,
  `date_loan` date DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Waiting for approval',
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `reason` varchar(100) DEFAULT 'New loan',
  `approved` tinyint(1) DEFAULT NULL,
  `terms` int DEFAULT '60',
  PRIMARY KEY (`loan_no`),
  KEY `account_no` (`account_no`),
  KEY `loan_ibfk_2` (`verified`),
  KEY `loan_ibfk_3` (`collector`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `names`
--

DROP TABLE IF EXISTS `names`;
CREATE TABLE IF NOT EXISTS `names` (
  `account_no` int DEFAULT NULL,
  `firstname` varchar(20) DEFAULT NULL,
  `middlename` varchar(20) DEFAULT NULL,
  `lastname` varchar(20) DEFAULT NULL,
  UNIQUE KEY `account_no` (`account_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `names`
--

INSERT INTO `names` (`account_no`, `firstname`, `middlename`, `lastname`) VALUES
(11000, 'fhdnbsalg', 'kasfnaks', 'sagar shinde'),
(11001, 'sagar', 'govind', 'shinde '),
(11002, 'sagar', 'govind', 'shinde'),
(11003, 'rishi', 'yz', 'shinde'),
(11004, 'rishi', 'yz', 'shinde'),
(11005, 'aditya', 'kashinath', 'mitkari'),
(11006, 'sanket', 'papp', 'gajbhiye');

-- --------------------------------------------------------

--
-- Table structure for table `payment_transactions`
--

DROP TABLE IF EXISTS `payment_transactions`;
CREATE TABLE IF NOT EXISTS `payment_transactions` (
  `transaction_id` int NOT NULL AUTO_INCREMENT,
  `loan_no` varchar(20) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `amount` decimal(8,2) DEFAULT NULL,
  `payment_no` int NOT NULL,
  `notes` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`transaction_id`),
  KEY `payment_transactions_ibfk_1` (`loan_no`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `username` varchar(20) NOT NULL,
  `firstname` varchar(20) DEFAULT NULL,
  `middlename` varchar(20) DEFAULT NULL,
  `lastname` varchar(20) DEFAULT NULL,
  `number` int DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `position` varchar(30) NOT NULL,
  `bio` varchar(100) DEFAULT NULL,
  `profile_img` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`username`, `firstname`, `middlename`, `lastname`, `number`, `address`, `email`, `position`, `bio`, `profile_img`) VALUES
('james', 'sdfdf', NULL, NULL, 323232, 'ssfds', 'cajan@gmail.com', 'Loan Officer', NULL, NULL),
('ffsdfsdff', 'sfdsf', NULL, NULL, 2147483647, 'fsdfsdfds', 'sfsfd@gmail.com', 'Collector', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

DROP TABLE IF EXISTS `task`;
CREATE TABLE IF NOT EXISTS `task` (
  `task_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Unfinished',
  PRIMARY KEY (`task_id`),
  KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`task_id`, `username`, `description`, `status`) VALUES
(12, 'ron', 'Go out and enjoy', 'Doned');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` varchar(40) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `user_type`) VALUES
('admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Admin');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`account_no`) REFERENCES `clients` (`account_no`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
