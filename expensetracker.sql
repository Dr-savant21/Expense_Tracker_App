-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2022 at 03:20 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `expensetracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `trans_id` int(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `trans_title` varchar(255) NOT NULL,
  `trans_desc` varchar(255) NOT NULL,
  `trans_type` varchar(255) NOT NULL,
  `trans_amount` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`trans_id`, `username`, `trans_title`, `trans_desc`, `trans_type`, `trans_amount`, `created_at`) VALUES
(1, 'Israel', '', '', 'expense', '0', '2022-10-29 21:02:51'),
(1, 'Israel', '', 'bought house last week', 'expense', '0', '2022-10-29 21:04:41'),
(1, 'Israel', '', 'bought land today', 'expense', '0', '2022-10-29 21:05:26'),
(1, 'Israel', 'buy car', 'bought car from mr ojo', 'expense', '10000', '2022-10-29 21:07:29'),
(1, 'Israel', 'buy car', 'bought car today', 'expense', '$20', '2022-10-29 21:09:03'),
(1, 'Israel', '', '', 'expense', '$', '2022-10-29 17:50:32'),
(1, 'Israel', '', '', 'expense', '$', '2022-10-30 08:07:41'),
(1, 'Israel', '', '', 'expense', '$', '2022-10-30 08:07:43'),
(1, 'Israel', '', '', 'expense', '$', '2022-10-30 08:09:22'),
(1, 'Israel', '', '', 'expense', '$', '2022-10-30 08:09:23'),
(1, 'Israel', '', '', 'expense', '$', '2022-10-30 08:09:24'),
(1, 'Israel', '', '', 'expense', '$', '2022-10-30 08:10:30'),
(1, 'Israel', '', '', 'expense', '$', '2022-10-30 08:16:01'),
(1, 'Israel', '', '', 'expense', '$', '2022-10-30 08:16:02'),
(1, 'Israel', 'bought house', 'bought a new house from mr john', 'expense', '$10000', '2022-10-31 11:24:58'),
(1, 'Israel', 'bought house', 'bought house last week from mr john', 'expense', '$10000', '2022-10-31 11:25:26'),
(2, 'Nosakhare', 'salary', 'got paid my salary today', 'income', '$250000', '2022-10-31 11:30:57');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `firstname`, `lastname`, `password`, `user_type`, `created_at`) VALUES
(1, 'israelnosakhare21@gmail.com', 'Israel', 'Ajagboye', 'izzywindz', 'user', '2022-10-28 00:18:26'),
(2, 'ofurenosakhare21@gmail.com', 'Nosakhare', 'Israel', 'ilovegod', 'user', '2022-10-28 00:19:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
