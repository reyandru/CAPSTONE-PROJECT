-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2024 at 12:06 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gymdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `registerdb`
--

CREATE TABLE `registerdb` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `age` int(5) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contactNo` int(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date_register` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registerdb`
--

INSERT INTO `registerdb` (`id`, `firstname`, `lastname`, `age`, `gender`, `address`, `contactNo`, `email`, `date_register`) VALUES
(1, 'Rei Andrew', 'Bariata', 21, '0', 'Abulalas', 2147483647, 'reiandrew@gmail.com', '0000-00-00 00:00:00'),
(2, 'Rei', 'Bariata', 25, 'Male', 'Abulalas', 2147483647, 'reiandrewbariata@gmail.com', '2024-09-18 22:03:29'),
(3, 'William', 'Sabino', 69, 'Male', 'San', 2147483647, 'Username@user.com', '2024-09-20 12:45:15');

-- --------------------------------------------------------

--
-- Table structure for table `signupdb`
--

CREATE TABLE `signupdb` (
  `id` int(11) NOT NULL,
  `role` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpassword` varchar(255) NOT NULL,
  `date_signup` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signupdb`
--

INSERT INTO `signupdb` (`id`, `role`, `email`, `username`, `password`, `cpassword`, `date_signup`) VALUES
(1, 'Client', 'reiandrew@gmail.com', 'REI ANDREW', '$2y$10$OajBzVZOaPbLPpgHsTHxg.EuN0JK7mmJ4clNZ5lFgB5TrwEHsEzMC', '$2y$10$.FfuXEKay3PadepsMo3/e.S5yv8EhX3ruSws4SdyXtRimpTboURKi', '2024-09-18 18:56:09'),
(2, 'Client', 'reiandrewbariata@gmail.com', 'Rei Andrew Bariata', '$2y$10$DPp4Khq7qaUuEuypSzVbrOq4JOzLYy2XrnbP94evwVcgNnvxBcRK2', '$2y$10$4waUY4BfkfJmrEf36QJf9O3wKAhS2Wz3QXuWAHLNwFTACpwGKWNuy', '2024-09-18 22:02:58'),
(3, 'Client', 'Username@user.com', 'William Sabino', '$2y$10$nSnSP2YeYNpNz0/uEmuChOiVKdpS2C0XlacNw/Qfl5an74VXPQ7R6', '$2y$10$zMVYflfqVsxorTZzQLxdJ.c6HGhiKF7bOwMwP1iEKsZRGJLtqwvC.', '2024-09-20 12:44:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registerdb`
--
ALTER TABLE `registerdb`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `signupdb`
--
ALTER TABLE `signupdb`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registerdb`
--
ALTER TABLE `registerdb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `signupdb`
--
ALTER TABLE `signupdb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
