-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 16, 2023 at 06:38 AM
-- Server version: 8.0.28
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myinnovet`
--

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date DEFAULT NULL,
  `breed` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('Male','Female','Unknown') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `species` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `height` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chronic_disease` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `dob`, `breed`, `gender`, `species`, `height`, `weight`, `chronic_disease`, `image`, `owner_id`, `created_at`, `updated_at`) VALUES
(1, 'Mittens', '2018-01-01', 'Siamese', 'Female', 'Cat', '23', '3.63', NULL, 'https://via.placeholder.com/640x480.png/00cc77?text=repellat', NULL, '2023-01-02 00:14:50', '2023-01-02 00:14:50'),
(2, 'Jeromy', '2008-11-27', 'American Shorthair', NULL, 'Turtle', '42', '19', NULL, 'https://via.placeholder.com/640x480.png/00dd44?text=quia', NULL, '2023-01-02 00:14:50', '2023-01-02 00:14:50'),
(3, 'Alysha', '2019-01-03', 'British Short Hair', NULL, 'Dog', '15', '10', NULL, 'https://via.placeholder.com/640x480.png/009977?text=quis', NULL, '2023-01-02 00:14:50', '2023-01-02 00:14:50'),
(4, 'Merritt', '2013-08-05', 'Domestic Cat', NULL, 'Rabbit', '40', '5', NULL, 'https://via.placeholder.com/640x480.png/0099cc?text=vitae', NULL, '2023-01-02 00:14:50', '2023-01-02 00:14:50'),
(5, 'Rubye', '2021-11-08', 'British Short Hair', NULL, 'Cat', '46', '14', NULL, 'https://via.placeholder.com/640x480.png/00aa11?text=eum', NULL, '2023-01-02 00:14:50', '2023-01-02 00:14:50'),
(6, 'Fred', '2020-05-13', 'Ragdoll', NULL, 'Rabbit', '25', '3', NULL, 'https://via.placeholder.com/640x480.png/003388?text=itaque', NULL, '2023-01-02 00:14:50', '2023-01-02 00:14:50'),
(7, 'Christian', '2004-04-14', 'Maine Coon', NULL, 'Lizard', '43', '9', NULL, 'https://via.placeholder.com/640x480.png/00ff77?text=minus', NULL, '2023-01-02 00:14:50', '2023-01-02 00:14:50'),
(8, 'Robert', '2010-05-06', 'Norwegian Forest', NULL, 'Cat', '19', '10', NULL, 'https://via.placeholder.com/640x480.png/00cccc?text=ut', NULL, '2023-01-02 00:14:50', '2023-01-02 00:14:50'),
(9, 'Brandi', '2000-04-04', 'Maine Coon', NULL, 'Rabbit', '38', '15', NULL, 'https://via.placeholder.com/640x480.png/0044cc?text=corporis', NULL, '2023-01-02 00:14:50', '2023-01-02 00:14:50'),
(10, 'Retha', '2016-11-27', 'British Short Hair', NULL, 'Turtle', '41', '2', NULL, 'https://via.placeholder.com/640x480.png/00aaff?text=nulla', NULL, '2023-01-02 00:14:50', '2023-01-02 00:14:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patients_owner_id_foreign` (`owner_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_owner_id_foreign` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
