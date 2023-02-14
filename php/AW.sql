-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2022 at 08:16 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `AW`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `destination` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `country` varchar(20) NOT NULL,
  `city` varchar(40) NOT NULL,
  `price` varchar(20) NOT NULL,
  `transport` varchar (20) NOT NULL,
  `insurance` varchar (10) NOT NULL,
  `airporttransport` varchar (20) NOT NULL,
  `apartmans` varchar (20) NOT NULL,
  `nameapartamns` varchar(50) NOT NULL,
  `food` varchar (30) NOT NULL,
  `restaurant` varchar (20) NOT NULL,
  `wifi` varchar (20) NOT NULL,
  `parking` varchar (20) NOT NULL,
  `view` varchar (20) NOT NULL,
  `description` varchar(500) NOT NULL,
  `date`  datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `destination`
--



--
-- umped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `destination`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `destination`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
