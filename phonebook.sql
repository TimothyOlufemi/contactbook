-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2023 at 02:40 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phonebook`
--

-- --------------------------------------------------------

--
-- Table structure for table `grp_test`
--

CREATE TABLE `grp_test` (
  `id` int(11) NOT NULL,
  `cnt_id` varchar(100) NOT NULL,
  `cnt_fullname` varchar(100) NOT NULL,
  `cnt_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stored_contacts`
--

CREATE TABLE `stored_contacts` (
  `id` int(100) NOT NULL,
  `cnt_title` varchar(100) NOT NULL,
  `cnt_firstname` varchar(100) NOT NULL,
  `cnt_lastname` varchar(100) NOT NULL,
  `cnt_address` varchar(100) NOT NULL,
  `cnt_gender` varchar(100) NOT NULL,
  `cnt_email` varchar(100) NOT NULL,
  `cnt_number` varchar(100) NOT NULL,
  `cnt_CreatedBy` varchar(100) NOT NULL,
  `cnt_day` varchar(100) NOT NULL,
  `cnt_month` varchar(100) NOT NULL,
  `cnt_year` varchar(100) NOT NULL,
  `LastUpdatedBy` varchar(100) NOT NULL,
  `bg1` varchar(100) NOT NULL,
  `acl` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stored_groups`
--

CREATE TABLE `stored_groups` (
  `id` int(11) NOT NULL,
  `group_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stored_groups`
--

INSERT INTO `stored_groups` (`id`, `group_name`) VALUES
(8, 'test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grp_test`
--
ALTER TABLE `grp_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stored_contacts`
--
ALTER TABLE `stored_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stored_groups`
--
ALTER TABLE `stored_groups`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grp_test`
--
ALTER TABLE `grp_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stored_contacts`
--
ALTER TABLE `stored_contacts`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `stored_groups`
--
ALTER TABLE `stored_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
