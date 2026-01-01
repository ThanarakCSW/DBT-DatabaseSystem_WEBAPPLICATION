-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 01, 2026 at 07:30 PM
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
-- Database: `eqdatabasesystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `con_equipment`
--

CREATE TABLE `con_equipment` (
  `con_id` int(1) NOT NULL,
  `condition` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `eqlow`
--

CREATE TABLE `eqlow` (
  `sum_id` int(11) NOT NULL,
  `sumnum` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type_id` int(1) NOT NULL,
  `type` varchar(50) NOT NULL,
  `date1` varchar(50) NOT NULL,
  `date2` varchar(50) NOT NULL,
  `money_id` int(1) NOT NULL,
  `money` varchar(50) NOT NULL,
  `num` int(10) NOT NULL,
  `room_id` int(1) NOT NULL,
  `room` varchar(4) NOT NULL,
  `res_id` int(1) NOT NULL,
  `responsible` varchar(50) NOT NULL,
  `numstart` varchar(6) NOT NULL,
  `numend` varchar(6) NOT NULL,
  `moneynum` varchar(255) NOT NULL,
  `tran_id` int(1) NOT NULL,
  `tranfer` varchar(50) NOT NULL,
  `price` varchar(20) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `num1` varchar(10) NOT NULL,
  `num2` varchar(10) NOT NULL,
  `num3` varchar(10) NOT NULL,
  `num4` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `eqnomal`
--

CREATE TABLE `eqnomal` (
  `sum_id` int(11) NOT NULL,
  `sumnum` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type_id` int(1) NOT NULL,
  `type` varchar(50) NOT NULL,
  `date1` varchar(50) NOT NULL,
  `date2` varchar(50) NOT NULL,
  `money_id` int(1) NOT NULL,
  `money` varchar(50) NOT NULL,
  `num` int(10) NOT NULL,
  `room_id` int(1) NOT NULL,
  `room` text NOT NULL,
  `res_id` int(1) NOT NULL,
  `responsible` varchar(50) NOT NULL,
  `numstart` varchar(6) NOT NULL,
  `numend` varchar(6) NOT NULL,
  `moneynum` varchar(255) NOT NULL,
  `tran_id` int(1) NOT NULL,
  `tranfer` varchar(50) NOT NULL,
  `price` varchar(20) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `num1` varchar(10) NOT NULL,
  `num2` varchar(10) NOT NULL,
  `num3` varchar(10) NOT NULL,
  `num4` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `equipments`
--

CREATE TABLE `equipments` (
  `eq_id` int(11) NOT NULL,
  `eq_code` varchar(255) NOT NULL,
  `sum_id` int(11) NOT NULL,
  `hel` varchar(10) NOT NULL DEFAULT 'ปกติ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `equipments_low`
--

CREATE TABLE `equipments_low` (
  `eq_id` int(11) NOT NULL,
  `eq_code` varchar(255) NOT NULL,
  `sum_id` int(11) NOT NULL,
  `hel` varchar(10) NOT NULL DEFAULT 'ปกติ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `heleqlow`
--

CREATE TABLE `heleqlow` (
  `hel_id` int(11) NOT NULL,
  `eq_id` int(11) NOT NULL,
  `con_id` int(1) NOT NULL,
  `hel` varchar(20) NOT NULL,
  `date` varchar(25) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `heleqnomal`
--

CREATE TABLE `heleqnomal` (
  `hel_id` int(11) NOT NULL,
  `eq_id` int(11) NOT NULL,
  `con_id` int(1) NOT NULL,
  `hel` varchar(20) NOT NULL,
  `date` varchar(25) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `m_id` int(10) NOT NULL,
  `m_name` varchar(50) NOT NULL,
  `m_username` varchar(35) NOT NULL,
  `m_password` varchar(255) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `numroom`
--

CREATE TABLE `numroom` (
  `nr_id` int(5) NOT NULL,
  `nr` int(5) NOT NULL,
  `room` varchar(10) NOT NULL,
  `sum_id` int(5) NOT NULL,
  `room_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `numroom_low`
--

CREATE TABLE `numroom_low` (
  `nr_id` int(5) NOT NULL,
  `nr` int(5) NOT NULL,
  `room` varchar(10) NOT NULL,
  `sum_id` int(5) NOT NULL,
  `room_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receive_transfer`
--

CREATE TABLE `receive_transfer` (
  `tran_id` int(1) NOT NULL,
  `transfer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `responsible`
--

CREATE TABLE `responsible` (
  `res_id` int(2) NOT NULL,
  `responsible` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(1) NOT NULL,
  `room` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `source_money`
--

CREATE TABLE `source_money` (
  `money_id` int(1) NOT NULL,
  `money` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `type_id` int(2) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `con_equipment`
--
ALTER TABLE `con_equipment`
  ADD PRIMARY KEY (`con_id`);

--
-- Indexes for table `eqlow`
--
ALTER TABLE `eqlow`
  ADD PRIMARY KEY (`sum_id`),
  ADD KEY `type_id` (`type_id`,`money_id`,`room_id`,`res_id`,`tran_id`),
  ADD KEY `tran_id` (`tran_id`),
  ADD KEY `res_id` (`res_id`),
  ADD KEY `money_id` (`money_id`);

--
-- Indexes for table `eqnomal`
--
ALTER TABLE `eqnomal`
  ADD PRIMARY KEY (`sum_id`),
  ADD KEY `type_id` (`type_id`,`money_id`,`res_id`,`tran_id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `tran_id` (`tran_id`),
  ADD KEY `res_id` (`res_id`),
  ADD KEY `money_id` (`money_id`);

--
-- Indexes for table `equipments`
--
ALTER TABLE `equipments`
  ADD PRIMARY KEY (`eq_id`),
  ADD KEY `sum_id` (`sum_id`);

--
-- Indexes for table `equipments_low`
--
ALTER TABLE `equipments_low`
  ADD PRIMARY KEY (`eq_id`),
  ADD KEY `sum_id` (`sum_id`);

--
-- Indexes for table `heleqlow`
--
ALTER TABLE `heleqlow`
  ADD PRIMARY KEY (`hel_id`),
  ADD KEY `eq_id` (`eq_id`),
  ADD KEY `con_id` (`con_id`);

--
-- Indexes for table `heleqnomal`
--
ALTER TABLE `heleqnomal`
  ADD PRIMARY KEY (`hel_id`),
  ADD KEY `eq_id` (`eq_id`),
  ADD KEY `con_id` (`con_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `numroom`
--
ALTER TABLE `numroom`
  ADD PRIMARY KEY (`nr_id`),
  ADD KEY `sum_id` (`sum_id`,`room_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `numroom_low`
--
ALTER TABLE `numroom_low`
  ADD PRIMARY KEY (`nr_id`),
  ADD KEY `sum_id` (`sum_id`,`room_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `receive_transfer`
--
ALTER TABLE `receive_transfer`
  ADD PRIMARY KEY (`tran_id`);

--
-- Indexes for table `responsible`
--
ALTER TABLE `responsible`
  ADD PRIMARY KEY (`res_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `source_money`
--
ALTER TABLE `source_money`
  ADD PRIMARY KEY (`money_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `con_equipment`
--
ALTER TABLE `con_equipment`
  MODIFY `con_id` int(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eqlow`
--
ALTER TABLE `eqlow`
  MODIFY `sum_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eqnomal`
--
ALTER TABLE `eqnomal`
  MODIFY `sum_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `equipments`
--
ALTER TABLE `equipments`
  MODIFY `eq_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `equipments_low`
--
ALTER TABLE `equipments_low`
  MODIFY `eq_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `heleqlow`
--
ALTER TABLE `heleqlow`
  MODIFY `hel_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `heleqnomal`
--
ALTER TABLE `heleqnomal`
  MODIFY `hel_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `m_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `numroom`
--
ALTER TABLE `numroom`
  MODIFY `nr_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `numroom_low`
--
ALTER TABLE `numroom_low`
  MODIFY `nr_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receive_transfer`
--
ALTER TABLE `receive_transfer`
  MODIFY `tran_id` int(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `responsible`
--
ALTER TABLE `responsible`
  MODIFY `res_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `source_money`
--
ALTER TABLE `source_money`
  MODIFY `money_id` int(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `eqlow`
--
ALTER TABLE `eqlow`
  ADD CONSTRAINT `eqlow_ibfk_1` FOREIGN KEY (`tran_id`) REFERENCES `receive_transfer` (`tran_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `eqlow_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `type` (`type_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `eqlow_ibfk_3` FOREIGN KEY (`res_id`) REFERENCES `responsible` (`res_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `eqlow_ibfk_4` FOREIGN KEY (`money_id`) REFERENCES `source_money` (`money_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `eqnomal`
--
ALTER TABLE `eqnomal`
  ADD CONSTRAINT `eqnomal_ibfk_1` FOREIGN KEY (`tran_id`) REFERENCES `receive_transfer` (`tran_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `eqnomal_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `type` (`type_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `eqnomal_ibfk_3` FOREIGN KEY (`res_id`) REFERENCES `responsible` (`res_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `eqnomal_ibfk_4` FOREIGN KEY (`money_id`) REFERENCES `source_money` (`money_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `equipments`
--
ALTER TABLE `equipments`
  ADD CONSTRAINT `equipments_ibfk_1` FOREIGN KEY (`sum_id`) REFERENCES `eqnomal` (`sum_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `equipments_low`
--
ALTER TABLE `equipments_low`
  ADD CONSTRAINT `equipments_low_ibfk_1` FOREIGN KEY (`sum_id`) REFERENCES `eqlow` (`sum_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `heleqlow`
--
ALTER TABLE `heleqlow`
  ADD CONSTRAINT `heleqlow_ibfk_1` FOREIGN KEY (`eq_id`) REFERENCES `equipments_low` (`eq_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `heleqlow_ibfk_2` FOREIGN KEY (`con_id`) REFERENCES `con_equipment` (`con_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `heleqnomal`
--
ALTER TABLE `heleqnomal`
  ADD CONSTRAINT `heleqnomal_ibfk_1` FOREIGN KEY (`eq_id`) REFERENCES `equipments` (`eq_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `heleqnomal_ibfk_2` FOREIGN KEY (`con_id`) REFERENCES `con_equipment` (`con_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `numroom`
--
ALTER TABLE `numroom`
  ADD CONSTRAINT `numroom_ibfk_1` FOREIGN KEY (`sum_id`) REFERENCES `eqnomal` (`sum_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `numroom_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `numroom_low`
--
ALTER TABLE `numroom_low`
  ADD CONSTRAINT `numroom_low_ibfk_1` FOREIGN KEY (`sum_id`) REFERENCES `eqlow` (`sum_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `numroom_low_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
