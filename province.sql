-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2024 at 12:29 AM
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
-- Database: `province`
--

-- --------------------------------------------------------

--
-- Table structure for table `mail_info`
--

CREATE TABLE `mail_info` (
  `id` int(11) NOT NULL,
  `sender_first_name` varchar(100) DEFAULT NULL,
  `sender_last_name` varchar(100) DEFAULT NULL,
  `sender_house_number` varchar(50) DEFAULT NULL,
  `sender_village` varchar(100) DEFAULT NULL,
  `sender_alley` varchar(100) DEFAULT NULL,
  `sender_sub_district` varchar(100) DEFAULT NULL,
  `sender_district` varchar(100) DEFAULT NULL,
  `sender_province` varchar(100) DEFAULT NULL,
  `sender_zip` varchar(5) DEFAULT NULL,
  `send_date` date DEFAULT NULL,
  `receiver_first_name` varchar(100) DEFAULT NULL,
  `receiver_last_name` varchar(100) DEFAULT NULL,
  `receiver_house_number` varchar(50) DEFAULT NULL,
  `receiver_village` varchar(100) DEFAULT NULL,
  `receiver_alley` varchar(100) DEFAULT NULL,
  `receiver_sub_district` varchar(100) DEFAULT NULL,
  `receiver_district` varchar(100) DEFAULT NULL,
  `receiver_province` varchar(100) DEFAULT NULL,
  `receiver_zip` varchar(5) DEFAULT NULL,
  `receive_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mail_info`
--

INSERT INTO `mail_info` (`id`, `sender_first_name`, `sender_last_name`, `sender_house_number`, `sender_village`, `sender_alley`, `sender_sub_district`, `sender_district`, `sender_province`, `sender_zip`, `send_date`, `receiver_first_name`, `receiver_last_name`, `receiver_house_number`, `receiver_village`, `receiver_alley`, `receiver_sub_district`, `receiver_district`, `receiver_province`, `receiver_zip`, `receive_date`) VALUES
(3, 'house', 'number', '564', 'gfhh', 'hjtrjh', 'hjthj', 'trhjtr', 'กรุงเทพมหานคร', '2511', '2024-11-07', 'house', 'number', 'house number', 'house number', 'house number', 'house number', 'house number', NULL, '99', '2024-11-30'),
(4, 'Tangrusu', 'แตงกวย', '45635', 'เ้่เ้่เ', 'ะ่ะ', 'หด', 'กหดกหด', NULL, 'กหกห', '2024-11-01', 'เ้่ะั่', 'ะั่ะั่', 'เ้่ะั่ ะั่ะั่', 'เ้่ะั่ ะั่ะั่', 'เ้่ะั่ ะั่ะั่', 'เ้่ะั่ ะั่ะั่', 'เ้่ะั่ ะั่ะั่', NULL, 'กหกห', '2024-11-30'),
(5, 'Tangrusu', 'แตงกวย', '45635', 'เ้่เ้่เ', NULL, 'หด', 'กหดกหด', NULL, 'กหกห', '2024-11-01', 'เ้่ะั่', 'ะั่ะั่', 'เ้่ะั่ ะั่ะั่', 'เ้่ะั่ ะั่ะั่', NULL, 'เ้่ะั่ ะั่ะั่', 'เ้่ะั่ ะั่ะั่', NULL, 'กหกห', '2024-11-30'),
(6, 'Tangrusu', 'แตงกวย', '45635', 'เ้่เ้่เ', NULL, 'หด', 'กหดกหด', NULL, 'กหกห', '0000-00-00', 'เ้่ะั่', 'ะั่ะั่', 'เ้่ะั่ ะั่ะั่', 'เ้่ะั่ ะั่ะั่', NULL, 'เ้่ะั่ ะั่ะั่', 'เ้่ะั่ ะั่ะั่', NULL, 'กหกห', '0000-00-00'),
(7, 'Tangrusu', 'แตงกวย', '45635', 'เ้่เ้่เ', NULL, 'หด', 'กหดกหด', 'กรุงเทพมหานคร', 'กหกห', '2024-11-02', 'เ้่ะั่', 'ะั่ะั่', 'เ้่ะั่ ะั่ะั่', 'เ้่ะั่ ะั่ะั่', NULL, 'เ้่ะั่ ะั่ะั่', 'เ้่ะั่ ะั่ะั่', 'นครปฐม', 'กหกห', '2024-12-07'),
(8, 'เ้่ะั่', 'ะั่ะั่', 'เ้่ะั่', 'เ้่ะั่', 'เ้่ะั่', 'เ้่ะั่', 'เ้่ะั่', 'เ้่ะั่', 'เ้่ะั', '2024-11-05', 'เ้่ะั่', 'ะั่ะั่', 'เ้่ะั่', 'เ้่ะั่', 'เ้่ะั่', 'เ้่ะั่', 'เ้่ะั่', 'เ้่ะั่', 'เ้่ะั', '2024-11-07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mail_info`
--
ALTER TABLE `mail_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mail_info`
--
ALTER TABLE `mail_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
