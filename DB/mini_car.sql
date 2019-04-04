-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 04, 2019 at 06:55 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mini_car`
--

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

CREATE TABLE `manufacturer` (
  `m_id` int(11) NOT NULL,
  `manufacturer_name` varchar(200) NOT NULL,
  `m_addedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manufacturer`
--

INSERT INTO `manufacturer` (`m_id`, `manufacturer_name`, `m_addedon`) VALUES
(1, 'Datsun', '2019-04-03 05:20:02'),
(6, 'Jeep', '2019-04-03 05:49:53'),
(7, 'spyker', '2019-04-03 06:11:26'),
(9, 'MINI', '2019-04-03 07:22:57'),
(17, 'test', '2019-04-03 09:08:22'),
(18, 'test', '2019-04-03 09:16:44'),
(19, 'test', '2019-04-03 09:22:05');

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `model_id` int(11) NOT NULL,
  `model_name` varchar(200) NOT NULL,
  `manufacturer_id` int(11) NOT NULL,
  `manufacturing_year` int(4) NOT NULL,
  `color` varchar(20) NOT NULL,
  `registration_no` bigint(20) NOT NULL,
  `note` text NOT NULL,
  `pic1` varchar(150) NOT NULL,
  `pic2` varchar(150) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'N' COMMENT 'Y:sold;N:unsold',
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`model_id`, `model_name`, `manufacturer_id`, `manufacturing_year`, `color`, `registration_no`, `note`, `pic1`, `pic2`, `status`, `added_on`) VALUES
(1, 'Datsun-RediGO', 1, 2008, 'red', 654789, 'Datsun Redi-GO price starts at â‚¹ 2.67 Lakhs and goes upto â‚¹ 4.29 Lakhs. Petrol Redi-GO price starts at â‚¹ 2.67 Lakhs.', '231758_Datsun-RediGO.jpg', '231758_Datsun-RediGO-Exterior.jpg', 'N', '2019-04-03 21:17:58'),
(2, 'Datsun GO Plus', 1, 2010, 'Brown', 987456, 'Datsun Go + price starts at â‚¹ 3.83 Lakhs and goes upto â‚¹ 5.69 Lakhs. Petrol Go + price starts at â‚¹ 3.83 Lakhs.', '232051_Datsun-Go-Plus.jpg', '232051_Datsun-Go-Plus.jpg', 'N', '2019-04-03 21:20:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`model_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `model_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
