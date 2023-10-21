-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 21, 2023 at 11:50 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `engaz-test`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'omar', 'description', '2012-06-01 02:12:30', '2023-10-21 12:41:40', NULL),
(2, 'omar', 'description', '2012-06-01 02:12:30', '2023-10-21 15:55:55', NULL),
(3, 'blog3', 'description3', '2012-06-01 02:12:30', '2014-09-20 03:10:25', NULL),
(4, 'blog4', 'description4', '2012-06-01 02:12:30', '2015-04-11 04:11:12', NULL),
(5, 'omar', 'description', '2012-06-01 02:12:30', '2023-10-21 23:44:01', NULL),
(6, 'blog6', 'description6', '2012-06-01 02:12:30', '2017-01-10 06:40:10', NULL),
(7, 'blog7', 'description7', '2012-06-01 02:12:30', '2017-05-02 02:20:30', NULL),
(8, 'blog8', 'description8', '2012-06-01 02:12:30', '2018-01-04 05:15:35', NULL),
(9, 'blog9', 'description9', '2012-06-01 02:12:30', '2019-01-02 02:20:30', NULL),
(10, 'blog10', 'description10', '2012-06-01 02:12:30', '2020-02-01 06:22:50', NULL),
(29, 'new blog', 'new blog description', '2023-10-21 12:46:50', '2023-10-21 12:50:26', '2023-10-21 16:01:00'),
(30, 'new blog', 'new blog description', '2023-10-21 15:58:45', '2023-10-21 15:58:45', NULL),
(31, 'new blog', 'new blog description', '2023-10-21 19:08:59', '2023-10-21 19:08:59', '2023-10-21 23:43:04'),
(32, 'new blog', 'new blog description', '2023-10-21 23:17:49', '2023-10-21 23:17:49', '2023-10-21 23:45:37'),
(33, 'new blog', 'new blog description', '2023-10-21 23:19:34', '2023-10-21 23:19:34', '2023-10-21 23:45:59'),
(34, 'new blog', 'new blog description', '2023-10-21 23:22:21', '2023-10-21 23:22:21', NULL),
(35, 'new blog', 'new blog description', '2023-10-21 23:23:03', '2023-10-21 23:23:03', NULL),
(36, 'new blog', 'new blog description', '2023-10-21 23:23:07', '2023-10-21 23:23:07', NULL),
(37, 'new blog', 'new blog description', '2023-10-21 23:24:48', '2023-10-21 23:24:48', NULL),
(38, 'new blog', 'new blog description', '2023-10-21 23:26:48', '2023-10-21 23:26:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'omar', 'algalfy71@gmail.com', '$2y$10$eJuGIzoFlTe4zWTcURN/Z.Q8IPrfoGUgn9ej5YwyWhLe7sSP8Txae'),
(3, 'omar', 'algalfy@gmail.com', '$2y$10$KOn4QK3W5qecj.TlOOp/H.A/E4mg3JMXc.EccMpWir/RDfD9qfmFi'),
(8, 'omar', 'trer@gmail.com', '$2y$10$h09sbm9rPGFAPiT6hxuszO9R43pwROBunUXEPjC96BT6ojTKSYBdm'),
(10, 'omar', 'trer@y.com', '$2y$10$l2PWa.NXj2e07FDiljobe./6ZC8sktZ7TFf5tdIwnL1raFma/4FHW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
