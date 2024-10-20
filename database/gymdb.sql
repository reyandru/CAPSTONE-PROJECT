-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2024 at 08:08 PM
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
-- Database: `gymdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `user_id` int(11) NOT NULL,
  `login_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `logout_time` timestamp NULL DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `progressdb`
--

CREATE TABLE `progressdb` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `goalW` int(11) NOT NULL,
  `startW` int(11) NOT NULL,
  `currentW` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registerdb`
--

CREATE TABLE `registerdb` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `age` int(5) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contactNo` varchar(20) NOT NULL,
  `date_register` datetime NOT NULL DEFAULT current_timestamp(),
  `profile_pic` varchar(255) DEFAULT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registerdb`
--

INSERT INTO `registerdb` (`id`, `email`, `password`, `firstname`, `lastname`, `age`, `gender`, `address`, `contactNo`, `date_register`, `profile_pic`, `role`) VALUES
(22, 'reiandrew@user.com', '$2y$10$Xpk8owH/2J0c6vp/A/RhBeDA6DwGLt1qmYRBWRZsEy5tZNPVveuK2', 'Rei Andrew', 'Bariata', 21, 'Male', '', '09123456789', '2024-10-06 13:19:15', 'uploads/670293b274921_me.jpg', 'user'),
(25, 'williamsabino@user.com', '$2y$10$pyEZCEhe272vyLu1pTkxfe5rvsU..wP/eSlPAdzaI8AP4zu6TWFL.', 'William', 'Sabino', 23, 'Male', 'Tabing ilog', '09876543210', '2024-10-06 20:18:02', 'uploads/6702938c3bd3d_William2x2.jpg', 'user'),
(26, 'admin@admin.com', '$2y$10$4VnShPXOOTALdNkZjmMO/eN088C4QX32L8183bQr8c735w0AZpara', 'admin', 'realdealgym', 21, 'Male', 'admin', '09275156421', '2024-10-10 19:51:54', NULL, 'admin'),
(27, 'User@user.com', '$2y$10$Qa5/En7E0i4gjn7xwYYWl.q/UjS5JaePo9wAc/YDi.DqEM8fzGL2K', 'User', 'user', 21, 'Male', 'user', '09275156421', '2024-10-10 20:33:04', 'uploads/6707fc337e24e_0902-Cover.jpg', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `signupdb`
--

CREATE TABLE `signupdb` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpassword` varchar(255) NOT NULL,
  `date_signup` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `progressdb`
--
ALTER TABLE `progressdb`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `progressdb`
--
ALTER TABLE `progressdb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registerdb`
--
ALTER TABLE `registerdb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `signupdb`
--
ALTER TABLE `signupdb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
