-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2020 at 11:00 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `democrud`
--

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_no` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `category` enum('technology','tips','health') DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `name`, `description`, `password`, `email`, `phone_no`, `date`, `gender`, `category`, `image`, `created_at`, `updated_at`) VALUES
(3, 'Harry Potter121', 'addgagdag1213', '12335464', 'admin123@gmail.com', '9876543216', '1997-09-23', '', 'tips', NULL, '2020-08-05 06:29:20', '2020-08-12 08:58:26'),
(4, 'zvasv', 'avsavsav', 'admin@1', 'admi2dsan@gmail.com', '1243254365475467', '2020-05-05', 'Male', 'health', 'uploads/LbFEIkOU65dTPBbi54vyAJ0En0UQpNctuCJ7LSEq.jpeg', '2020-08-05 06:42:19', '2020-08-05 06:42:19'),
(5, 'aasfsaf', 'asfsafasf', '122424', 'harry123343@yopmail.com', '134315426426', '1996-06-23', 'Male', 'health', NULL, '2020-08-12 08:57:44', '2020-08-12 08:57:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `password_token` varchar(255) DEFAULT NULL,
  `password_token_date` datetime DEFAULT NULL,
  `type` enum('SA','A') DEFAULT NULL COMMENT 'SA => SuperAdmin , A => Admin',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT 'Y => Yes, N=> No',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `password_token`, `password_token_date`, `type`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'sfdaf', 'harry123@yopmail.com', '$2y$10$kn9Jbzzqqb99M2ULpeTfHuQSdmSW0vxQFh3hoF189BXMPorTXQqey', 'UUUveG1JckI2VnhlK0VHdTRYelVaeDF5UjNaZmF3MlRYa3NlL3JyNE1XZXdqQ0tPUWpJdFVUdVZEOTRPN2wrbQ==', '2020-08-12 06:42:07', NULL, 'Y', '2020-08-11 10:35:16', '2020-08-12 06:42:07', NULL),
(2, 'Aaa', 'aad@yopmail.com', '$2y$10$m6VhoUbsq6IQ/xf9yHT1Ku/lcO0NSAz3b/GtxTWIBJq5ZV1wfKi0.', NULL, NULL, NULL, 'Y', '2020-08-12 06:37:25', '2020-08-12 06:37:25', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
