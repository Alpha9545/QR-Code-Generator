-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2025 at 11:22 AM
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
-- Database: `qr`
--

-- --------------------------------------------------------

--
-- Table structure for table `reg`
--

CREATE TABLE `reg` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` int(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reg`
--

INSERT INTO `reg` (`id`, `name`, `email`, `password`, `phone`, `created_at`) VALUES
(1, 'Rekha prajapti', 'rekhap777@gmail.com', '12345678', 2147483647, '2025-02-24 08:40:26'),
(2, 'Shravani', 'shravu2005@gmail.com', '12345678', 2147483647, '2025-03-01 14:42:43'),
(7, 'Prajwal Maka', 'prajwalmaka777@gmail.com', '12345678', 2147483647, '2025-04-08 13:34:07');

-- --------------------------------------------------------

--
-- Table structure for table `user-info`
--

CREATE TABLE `user-info` (
  `sr.no` int(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_time` time DEFAULT curtime()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user-info`
--

INSERT INTO `user-info` (`sr.no`, `email`, `message`, `created_at`, `created_time`) VALUES
(1, 'rekhap777@gmail.com', 'REKHA', '2025-02-24 08:42:23', '14:12:42'),
(16, 'shravu2005@gmail.com', 'Message: hello\r\nName: Shravani\r\nEmail: shravu2005@gmail.com\r\nPhone: 2147483647', '2025-04-01 10:06:21', '15:36:21'),
(17, 'shravu2005@gmail.com', 'Message: Hello\r\nName: Shravani\r\nEmail: shravu2005@gmail.com\r\nPhone: 2147483647', '2025-04-08 13:18:25', '18:48:25'),
(18, 'shravu2005@gmail.com', 'Message: Mahesh\r\nName: Shravani\r\nEmail: shravu2005@gmail.com\r\nPhone: 2147483647', '2025-04-08 13:20:33', '18:50:33'),
(19, 'prajwalmaka777@gmail.com', 'Message: hiii\r\nName: Prajwal Maka\r\nEmail: prajwalmaka777@gmail.com\r\nPhone: 2147483647', '2025-04-08 13:34:34', '19:04:34'),
(20, 'prajwalmaka777@gmail.com', 'Message: Prajwal\r\nName: Prajwal Maka\r\nEmail: prajwalmaka777@gmail.com\r\nPhone: 2147483647', '2025-04-08 13:38:24', '19:08:24'),
(21, 'prajwalmaka777@gmail.com', 'hello', '2025-04-08 16:27:10', '21:57:10'),
(22, 'prajwalmaka777@gmail.com', 'https://www.smjoshicollege.edu.in/', '2025-04-08 16:29:57', '21:59:57'),
(23, 'prajwalmaka777@gmail.com', 'www.smjoshicollege.edu.in/', '2025-04-08 16:30:34', '22:00:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(3, 'rekhaprajapati6666@gmail.com', 'rekha7777');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reg`
--
ALTER TABLE `reg`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user-info`
--
ALTER TABLE `user-info`
  ADD PRIMARY KEY (`sr.no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reg`
--
ALTER TABLE `reg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user-info`
--
ALTER TABLE `user-info`
  MODIFY `sr.no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
