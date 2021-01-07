-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2021 at 10:41 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `esptest`
--

-- --------------------------------------------------------

--
-- Table structure for table `air_hum`
--

CREATE TABLE `air_hum` (
  `id` int(10) NOT NULL,
  `value` varchar(10) NOT NULL,
  `sensorTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `air_temp`
--

CREATE TABLE `air_temp` (
  `id` int(10) NOT NULL,
  `value` varchar(10) NOT NULL,
  `sensorTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `light_intensity`
--

CREATE TABLE `light_intensity` (
  `id` int(10) NOT NULL,
  `value` varchar(10) NOT NULL,
  `sensorTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sensor_threshold`
--

CREATE TABLE `sensor_threshold` (
  `id` int(11) NOT NULL,
  `sensorName` varchar(20) NOT NULL,
  `minRange` float NOT NULL,
  `maxRange` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sensor_threshold`
--

INSERT INTO `sensor_threshold` (`id`, `sensorName`, `minRange`, `maxRange`) VALUES
(1, 'water_temperature', 20.02, 32),
(2, 'air_temperature', 21.56, 30.98),
(3, 'air_humidity', 60, 90),
(4, 'light_intensity', 120, 800);

-- --------------------------------------------------------

--
-- Table structure for table `water_temp`
--

CREATE TABLE `water_temp` (
  `id` int(10) NOT NULL,
  `value` varchar(10) NOT NULL,
  `sensorTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `air_hum`
--
ALTER TABLE `air_hum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `air_temp`
--
ALTER TABLE `air_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `light_intensity`
--
ALTER TABLE `light_intensity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sensor_threshold`
--
ALTER TABLE `sensor_threshold`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `water_temp`
--
ALTER TABLE `water_temp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `air_hum`
--
ALTER TABLE `air_hum`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `air_temp`
--
ALTER TABLE `air_temp`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `light_intensity`
--
ALTER TABLE `light_intensity`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sensor_threshold`
--
ALTER TABLE `sensor_threshold`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `water_temp`
--
ALTER TABLE `water_temp`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
