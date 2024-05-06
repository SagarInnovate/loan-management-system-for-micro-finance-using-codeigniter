-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 05, 2024 at 01:11 PM
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
(11006, 'nagpur', 'Nagpur', 'maharashtra', 'india', 440001),
(11007, '9730220726', 'Nagpur', 'maharashtra', 'india', 440001),
(11008, 'latur mh', 'Nagpur', 'maharashtra', 'india', 440001),
(11009, 'dfgh', 'Nagpur', 'maharashtra', 'india', 440001),
(11010, 'shivaji chowk,asi road', 'Nagpur', 'maharashtra', 'india', 440001),
(11011, 'latur', 'Nagpur', 'maharashtra', 'india', 440001);

-- --------------------------------------------------------

--
-- Table structure for table `approved_loans`
--

DROP TABLE IF EXISTS `approved_loans`;
CREATE TABLE IF NOT EXISTS `approved_loans` (
  `loan_no` varchar(20) DEFAULT NULL,
  `number_of_emis` varchar(5) NOT NULL,
  `remaining_emis` varchar(5) NOT NULL,
  `date_approved` date DEFAULT NULL,
  `loan_started` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `emi_amount` decimal(10,2) DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'new',
  KEY `approved_loans_ibfk_1` (`loan_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `approved_loans`
--

INSERT INTO `approved_loans` (`loan_no`, `number_of_emis`, `remaining_emis`, `date_approved`, `loan_started`, `end_date`, `emi_amount`, `due_date`, `status`) VALUES
('loan_6633827191aff', '12', '11', '2024-05-02', '2024-05-02', '2025-04-27', 0.00, '2024-05-04', 'Active'),
('loan_6633834c401db', '12', '11', '2024-05-02', '2024-05-02', '2025-04-27', 850.00, '2024-05-04', 'Active'),
('L1002', '12', '11', '2024-05-02', '2024-05-02', '2025-04-27', 25.00, '2024-05-04', 'Active'),
('L1004', '100', '100', '2024-05-04', '2024-05-04', '2032-07-21', 11.00, '2024-05-04', 'Active');

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
  `passbook_url` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`bank_id`),
  KEY `account_no` (`account_no`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bank_details`
--

INSERT INTO `bank_details` (`bank_id`, `account_no`, `bank_name`, `ifsc_code`, `passbook_no`, `branch_address`, `passbook_url`) VALUES
(1, NULL, 'sagy bank', 'SAGY00012', 'ac124249265', 'latur', ''),
(2, 11005, 'SAGY BANK', 'SAGY00012', '9876678897', 'latur', './uploads/passbook/1714332541_IMG_4308 (1).PNG'),
(3, 11006, 'karpe multinantional bank', 'SAGY00012', 'sankys123', 'nagpur', './uploads/passbook/1714334597_png-transparent-boot'),
(4, 11007, 'karpe multinantional bank', 'SAGY00012', '9876678897', 'latur', 'uploads/passbook/1714462205_Picsart_23-10-13_21-09'),
(5, 11008, 'karpe multinantional bank', 'SAGY00012', '9876678897', 'l', 'uploads/passbook/1714463853_IMG_4308 (1).PNG'),
(6, 11009, '345678', 'SAGY00012', '9876678897', ';j', ''),
(7, 11010, 'SAGY MULTINATIONAL BANK', 'SAGY00012', '9876678897', 'ldhs', ''),
(8, 11011, 'SAGY MULTINATIONAL BANK', 'SAGY00012', 'sankys123', 'EDFGH', 'uploads/passbook/1714545763_statement (1).pdf');

-- --------------------------------------------------------

--
-- Table structure for table `business_details`
--

DROP TABLE IF EXISTS `business_details`;
CREATE TABLE IF NOT EXISTS `business_details` (
  `business_no` int NOT NULL AUTO_INCREMENT,
  `business_name` varchar(30) DEFAULT NULL,
  `business_address` varchar(50) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `employment_status` varchar(30) NOT NULL,
  `monthly_income` varchar(10) NOT NULL,
  `loan_no` varchar(20) DEFAULT NULL,
  `account_no` int DEFAULT NULL,
  PRIMARY KEY (`business_no`),
  KEY `debtor_business_ibfk_1` (`loan_no`)
) ENGINE=InnoDB AUTO_INCREMENT=314 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `business_details`
--

INSERT INTO `business_details` (`business_no`, `business_name`, `business_address`, `occupation`, `employment_status`, `monthly_income`, `loan_no`, `account_no`) VALUES
(309, 'ldsjnvfi ', 'oijrgio', 'kshgv e', 'Part-time', '5678', 'L1000', NULL),
(310, 'anfla', 'hello guyz', 'asfsa', 'Part-time', '34567', 'L1001', 11008),
(311, 'anfla', 'fghj', 'asfsa', 'Part-time', '4567', 'L1002', 11008),
(312, 'njsdvjksnd', 'lvnjdvsg', 'dshgsg', 'Part-time', '678925', 'L1003', 11008),
(313, 'anfla', 'kd', 'asfsa', 'Self-employed', '4567', 'L1004', 11008);

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
  `profile_img` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'person.png',
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
(11006, 'pappaji gajphiye', 'aai', 'single', 'btech-cse', '', 'sanky@gmail.com', '9876543210', '87654', '2024-04-26', 'Male', 'somethingds about me', 'New'),
(11007, 'vitthal', 'rukmini', 'single', 'btech', '', 'vaibhav@gmail.com', '98765432', '', '2024-04-27', 'Male', 'no info', 'New'),
(11008, 'kashinath mitkari', 'aai', 'widowed', 'btech', '', 'sgshinde6j12@gmail.com', '98765', '98765', '2024-04-19', 'Male', 'kjbb', 'Verified'),
(11009, 'yedzava', 'aai', 'single', 'btech', '', 'sgshinde612@gmail.com', '45678', '', '2024-04-13', 'Male', 'kjn', 'New'),
(11010, 'sagar', 'shinde', 'married', 'btech', 'http://localhost/loanapp/uploads/fdb8a1f', 'adminwala@gmail.com', '123456789', '12345678', '2024-06-01', 'Male', 'f', 'New'),
(11011, 'ramraov rathod', 'aai', 'divorced', 'cse btech', 'http://localhost/loanapp/uploads/2b5bfa76b01cd4c2f047f54c60c4cc1d.jpg', 'school1124@gmail.com', '9876543210', '9876543210', '2024-05-25', 'Male', 'SAGY', 'New');

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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`document_id`, `account_no`, `pan_card_number`, `pan_card_document`, `aadhar_card_number`, `aadhar_card_document`, `electricity_bill_number`, `electricity_bill_document`, `application_form_number`, `application_form_document`) VALUES
(1, NULL, '2345', 'uploads/pan/1714331366_statement.pdf', '34567', 'uploads/aadhar/1714331358_statement (1).pdf', '34567', './uploads/electricity/1714331392_Picsart_23-10-13_', '3456', NULL),
(2, NULL, '2345', '', '34567', '', '34567', '', '3456', NULL),
(3, 11005, 'pan no 1', 'uploads/pan/1714332509_statement.pdf', 'aadhar no1', 'uploads/aadhar/1714332516_statement (1).pdf', 'ele no 1', './uploads/electricity/1714332501_Picsart_23-10-13_21-09-45-865-1-1024x1024 (1).png', 'app no 1', NULL),
(4, 11006, 'lzpps8078d', 'uploads/pan/1714334539_statement.pdf', '388106387299', 'uploads/aadhar/1714334520_statement (1).pdf', 'elebil', './uploads/electricity/1714334553_3-devices-white.png', 'application n', './uploads/application/1714334565_statement (2).pdf'),
(5, 11007, '987654321', 'uploads/pan/1714462161_statement.pdf', NULL, 'uploads/aadhar/1714462144_statement (2).pdf', '9876543456789', 'uploads/electricity/1714462172_Picsart_23-10-13_21-09-45-865-1-1024x1024.png', '1234567876544', 'uploads/application/1714462182_Picsart_23-10-13_21-09-45-865-1-1024x1024 (1).png'),
(6, 11008, '234567tfg', 'uploads/pan/1714463826_statement.pdf', 'fyut89o', 'uploads/aadhar/1714463840_statement (1).pdf', '2345678', 'uploads/electricity/1714463811_Picsart_23-10-13_21-09-45-865-1-1024x1024 (1).png', '23456789iuhgv', 'uploads/application/1714463818_rfsc.png'),
(7, 11009, '34567', '', '45678', '', '4567', '', '4567', ''),
(8, 11010, '2345678', 'uploads/pan/1714544999_statement.pdf', '7654345678', 'uploads/aadhar/1714545007_statement (1).pdf', '9876543456789', 'uploads/electricity/1714545023_png-transparent-bootstrap-plain-wordmark-logo-icon.png', '543', 'uploads/application/1714545016_png-transparent-bootstrap-plain-wordmark-logo-icon.png'),
(9, 11011, 'SAGY', 'uploads/pan/1714545708_calculator_result_statement.pdf', 'SAGY', 'uploads/aadhar/1714545669_statement (2).pdf', 'SAGY', 'uploads/electricity/1714545716_IMG_4308 (1).PNG', 'SAGY', 'uploads/application/1714545725_just print of sanket.pdf');

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
  `adhar_uploaded_url` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `pan_card_no` varchar(20) DEFAULT NULL,
  `pan_card_uploaded_url` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `expense_details` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`guarantor_id`),
  KEY `account_no` (`account_no`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `guarantors_details`
--

INSERT INTO `guarantors_details` (`guarantor_id`, `account_no`, `name`, `relation`, `adhar_no`, `adhar_uploaded_url`, `pan_card_no`, `pan_card_uploaded_url`, `expense_details`) VALUES
(1, NULL, 'aditya', 'aditya', '8976533', '', 'pan 1224', '', 'no expense '),
(2, 11005, 'bhokal', 'mahabhokal', 'devsena no 1', 'uploads/gaadhar/1714332572_statement.pdf', 'dev sena no 2', 'uploads/gpan/1714332580_statement (1).pdf', '10000'),
(3, 11006, 'Signal_Loan', 'dost', '9876543erfg', 'uploads/gaadhar/1714334701_statement (2).pdf', 'jgw456yuhg', 'uploads/gpan/1714334692_calculator_result_statement.pdf', 'expense details'),
(4, 11007, 'Signal_Loan', 'dost', '388106387299', 'uploads/gaadhar/1714462224_statement.pdf', 'l', 'uploads/gpan/1714462235_statement.pdf', 'expenses'),
(5, 11008, 'Signal_Loan', 'dost', '56u8ibnert', 'uploads/gaadhar/1714463878_statement.pdf', '4567', 'uploads/gpan/1714463895_calculator_result_statement.pdf', 'hg'),
(6, 11009, 'Signal_Loan', 'aditya', '388106387299', '', 'jgw456yuhg', '', 'n'),
(7, 11010, 'Signal_Loan', 'dost', '9876543erfg', 'uploads/gaadhar/1714544954_statement.pdf', 'pan 1224', 'uploads/gpan/1714544946_statement.pdf', 'dser'),
(8, 11011, 'sagar shinde', 'friend', 'DOST123', 'uploads/gaadhar/1714545799_statement.pdf', 'pan 1224', 'uploads/gpan/1714545808_just print of sanket.pdf', 'EXPENS DETAILS');

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

DROP TABLE IF EXISTS `loan`;
CREATE TABLE IF NOT EXISTS `loan` (
  `loan_no` varchar(20) NOT NULL,
  `account_no` int DEFAULT NULL,
  `loan_amount` decimal(8,2) DEFAULT NULL,
  `interest` decimal(5,2) DEFAULT '10.00',
  `duration` varchar(4) NOT NULL,
  `loan_type` enum('Weekly','Monthly') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `collector` varchar(50) DEFAULT NULL,
  `date_loan` date DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Waiting for approval',
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `reason` varchar(100) DEFAULT 'New loan',
  `approved` tinyint(1) DEFAULT NULL,
  `terms` int DEFAULT NULL,
  PRIMARY KEY (`loan_no`),
  KEY `account_no` (`account_no`),
  KEY `loan_ibfk_2` (`verified`),
  KEY `loan_ibfk_3` (`collector`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`loan_no`, `account_no`, `loan_amount`, `interest`, `duration`, `loan_type`, `collector`, `date_loan`, `status`, `verified`, `reason`, `approved`, `terms`) VALUES
('L1000', NULL, 6543.00, 999.99, '50', 'Weekly', 'ffsdfsdff', '2024-05-01', 'Waiting for approval', 1, 'New loan', 0, NULL),
('L1001', 11008, 10000.00, 2.00, '12', 'Monthly', 'ffsdfsdff', '2024-05-01', 'Approved', 0, NULL, 0, NULL),
('L1002', 11008, 200.00, 50.00, '12', 'Monthly', 'ffsdfsdff', '2024-05-01', 'Active', 0, 'New loan', 0, NULL),
('L1003', 11008, 999999.99, 999.99, '12', 'Monthly', 'ffsdfsdff', '2024-05-01', 'Waiting for approval', 0, 'New loan', 1, NULL),
('L1004', 11008, 1000.00, 10.00, '100', 'Weekly', 'ffsdfsdff', '2024-05-04', 'Approved', 0, 'New loan', 0, NULL);

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
(11006, 'sanket', 'papp', 'gajbhiye'),
(11007, 'vaibhav', 'vitthal', 'shinde'),
(11008, 'shinde', 'mera nam', 'shinde'),
(11009, 'sagar', 'govind', 'shinde'),
(11010, ' sagar', 'govind', 'karpe'),
(11011, 'atul', 'ramraov', 'rathod');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `notification_id` int NOT NULL AUTO_INCREMENT,
  `account_no` int DEFAULT NULL,
  `notification_type` enum('Email','SMS') DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `sent_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`notification_id`),
  KEY `account_no` (`account_no`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `emi_no` varchar(10) NOT NULL,
  PRIMARY KEY (`transaction_id`),
  KEY `payment_transactions_ibfk_1` (`loan_no`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_transactions`
--

INSERT INTO `payment_transactions` (`transaction_id`, `loan_no`, `date`, `amount`, `payment_no`, `notes`, `emi_no`) VALUES
(1, 'L1002', '2024-05-03', 100.00, 0, '[value-6]', '1'),
(91, 'L1004', '2024-05-04', 0.00, 1, 'Daily payment', '1');

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
