-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2018 at 02:39 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

CREATE TABLE `manufacturer` (
  `id` int(11) NOT NULL,
  `manufacturer_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manufacturer`
--

INSERT INTO `manufacturer` (`id`, `manufacturer_name`, `created_at`, `updated_at`) VALUES
(27, 'Maruti', '2018-07-14 09:21:20', '2018-07-14 09:21:20'),
(28, 'Royal Star', '2018-07-14 09:48:22', '2018-07-14 09:48:22'),
(29, 'Maruti', '2018-07-14 10:55:28', '2018-07-14 10:55:28');

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `id` int(11) NOT NULL,
  `model_name` varchar(255) NOT NULL,
  `manufacturer_name` varchar(11) NOT NULL,
  `file_upload_one` varchar(200) DEFAULT NULL,
  `file_upload_second` varchar(200) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `manufacturing_year` int(200) NOT NULL,
  `registration_number` int(200) NOT NULL,
  `model_count` int(23) NOT NULL,
  `notes` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`id`, `model_name`, `manufacturer_name`, `file_upload_one`, `file_upload_second`, `color`, `manufacturing_year`, `registration_number`, `model_count`, `notes`) VALUES
(11, 'dfsdf', '27', 'WIN_20150529_151632.JPG', 'WIN_20150729_175658.JPG', 'GTest', 2018, 3434234, 3434, 'sdfsdfdfdfdsf'),
(13, 'Wangor', '27', 'viewInventory1.jpg', 'viewInventory2.jpg', 'Red', 2018, 121212, 4, 'This is for you sumit sharma');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
