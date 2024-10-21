-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2024 at 07:34 PM
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
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `acc_number` varchar(20) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `acc_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `user_id`, `acc_number`, `bank`, `acc_name`) VALUES
(1, 2, '9031849161', '999992', 'FAITH IFEDOLAPO IYIOLA'),
(2, 3, '1482698367', '063', 'OTHNIEL SHEKWOYNA JOHN'),
(3, 1, '8151332473', '999992', 'ATARI  AGGAH'),
(4, 6, '8089230260', '107', 'TITUS TORHILE JINAWA'),
(5, 1, '7062467664', '999992', 'ALFRED ORYIMAN JINAWA');

-- --------------------------------------------------------

--
-- Table structure for table `identity`
--

CREATE TABLE `identity` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `identity`
--

INSERT INTO `identity` (`id`, `title`) VALUES
(1, 'Voter\'s Card'),
(2, 'NIN'),
(3, 'Driver\'s License'),
(4, 'Schhol ID');

-- --------------------------------------------------------

--
-- Table structure for table `kyc`
--

CREATE TABLE `kyc` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_fname` varchar(200) NOT NULL,
  `means_of_id` varchar(100) NOT NULL,
  `image1` varchar(200) NOT NULL,
  `image2` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kyc`
--

INSERT INTO `kyc` (`id`, `user_id`, `user_fname`, `means_of_id`, `image1`, `image2`, `date`) VALUES
(1, 2, 'Dola Faith', 'NIN', '11.png', 'Jonathan.jpg', '2024-09-13 14:08:22'),
(2, 3, 'samson', 'Schhol ID', '1122.jpg', '1122.jpg', '2024-09-14 08:41:56'),
(3, 1, 'Jinawa Titus', 'NIN', 'WIN_20240913_15_34_39_Pro.jpg', 'WIN_20240913_15_34_39_Pro.jpg', '2024-09-14 15:01:26'),
(4, 5, 'damian prosper', 'NIN', 'WIN_20240913_15_34_39_Pro.jpg', 'WIN_20240913_15_34_39_Pro.jpg', '2024-09-22 17:34:51'),
(5, 6, 'Opawoye Evelyn', 'Voter', 'WIN_20240913_15_34_45_Pro.jpg', 'WIN_20240913_15_34_45_Pro.jpg', '2024-09-25 14:51:38');

-- --------------------------------------------------------

--
-- Table structure for table `loan_amount`
--

CREATE TABLE `loan_amount` (
  `id` int(11) NOT NULL,
  `amount` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `loan_amount`
--

INSERT INTO `loan_amount` (`id`, `amount`) VALUES
(1, '5000'),
(2, '10000'),
(3, '15000'),
(4, '20000'),
(5, '25000'),
(6, '35000'),
(7, '40000'),
(8, '45000'),
(9, '50000');

-- --------------------------------------------------------

--
-- Table structure for table `loan_application`
--

CREATE TABLE `loan_application` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `loan_id` varchar(50) NOT NULL,
  `b_amount` decimal(50,0) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `r_amount` varchar(200) NOT NULL,
  `status` enum('paid','unpaid','overdue') NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `purpose` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `loan_application`
--

INSERT INTO `loan_application` (`id`, `user_id`, `loan_id`, `b_amount`, `duration`, `r_amount`, `status`, `invoice`, `date`, `purpose`) VALUES
(1, 1, '5219', 10000, '17/09/2024', '10500.00', 'paid', '', '2024-09-11 11:44:47', 'Accommodation'),
(2, 1, '9709', 5000, '18/09/2024', '5250', 'paid', 'INV-20240911154745', '2024-09-11 13:48:24', 'nEW'),
(3, 2, '2469', 5000, '20/09/2024', '5250', 'paid', 'INV-20240913151047', '2024-09-13 13:11:10', 'Rent'),
(4, 3, '2224', 5000, '14/10/2024', '5750', 'paid', 'INV-20240914094515', '2024-09-14 07:45:48', '235465768'),
(5, 1, '9986', 10000, '28/09/2024', '11500', 'paid', 'INV-20240914160359', '2024-09-14 14:04:21', 'Project'),
(6, 1, '9276', 15000, '06/10/2024', '17250', 'paid', 'INV-20240922182712', '2024-09-22 16:29:52', 'new year'),
(7, 1, '1387', 10000, '09/10/2024', '10700', 'paid', 'INV-20240925141030', '2024-09-25 12:10:53', 'zxcvbnm,./bvc'),
(8, 6, '4321', 5000, '09/10/2024', '5350', 'paid', 'INV-20240925155238', '2024-09-25 13:53:15', 'gfghjkl'),
(9, 1, '7916', 10000, '08/10/2024', '10700', 'paid', 'INV-20241021134053', '2024-10-21 11:41:19', 'fghjkl'),
(10, 1, '7980', 10000, '07/10/2024', '10700', 'unpaid', '', '2024-10-07 13:33:58', 'wertyuiop');

-- --------------------------------------------------------

--
-- Table structure for table `loan_duration`
--

CREATE TABLE `loan_duration` (
  `id` int(11) NOT NULL,
  `duration` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `loan_duration`
--

INSERT INTO `loan_duration` (`id`, `duration`) VALUES
(1, '7 days'),
(2, '14 days'),
(3, '21 days'),
(4, '30 days'),
(5, '3 months'),
(6, '6 months'),
(7, '1 year');

-- --------------------------------------------------------

--
-- Table structure for table `loan_percent`
--

CREATE TABLE `loan_percent` (
  `id` int(11) NOT NULL,
  `percent` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `loan_percent`
--

INSERT INTO `loan_percent` (`id`, `percent`) VALUES
(1, '7'),
(2, '7'),
(3, '10'),
(4, '15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `lga` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `bvn` varchar(20) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `email`, `phone_no`, `username`, `password`, `state`, `lga`, `address`, `bvn`, `reg_date`, `image`) VALUES
(1, 'Jinawa Titus', 'youngchief@nsuk.edu.ng', '08089230260', 'Jinawalic', '$2y$10$zrXJ1rV9va/NbJhayTYIVOZ3TrWGv7MweHLeFrfm/wdaG0uid2YfS', 'Benue', 'Logo', 'BCG keffi', '1234567890', '2024-09-09 21:32:37', 'Jonathan.jpg'),
(2, 'Dola Faith', 'admin@gmail.com', '08089230260', 'Dola', '$2y$10$cla.smhHKUFPbuQ7YnK5Re7NxaUWod00S0D.RKVtpsCjd8x4ljtXG', 'Oyo', 'Doma', 'BCG keffi', '12345432166', '2024-09-13 14:06:47', '11.png'),
(4, 'aggah atari ', 'davidaggah88@gmail.com', '08151332473', 'daveaggah', '$2y$10$lIFKUKGz82CMmEf.ADQUlOGRUG0vJ.FIX2K3SymfIqhkF8TsyU0By', 'Bauchi', 'doma', 'Akwanga', '12345678987', '2024-09-14 15:07:20', 'WIN_20240913_15_34_39_Pro.jpg'),
(5, 'damian prosper', 'damiancprosper11@gmail.com', '09071279188', 'prosperlance', '$2y$10$OsvxevjIN1fBfkAG/cg/QePfGgLpFhve.7E8LjfoQml2aG.ETm7g6', 'Imo', 'isiala mbano', 'obollo', '12342334233', '2024-09-22 17:33:05', 'WIN_20240913_15_36_18_Pro.jpg'),
(6, 'Opawoye Evelyn', 'opawoyetundun@gmail.com', '08168810225', 'Evelyn', '$2y$10$Hv336RlY5CUcdhK.Mj9V6ey6KR.taLafFShReQh4L6v1ixldpBkFS', 'Rivers', 'doma', 'BCG keffi', '67124905', '2024-09-25 14:44:25', 'WIN_20240913_15_34_39_Pro.jpg'),
(7, 'Jinawa Titus Torhile', 'jinawalic@gmail.com', '08089230260', '', '$2y$10$z2oX4p3ICvfLAua2lEwDfuVZz9tG.RhLYpAPLFAQsMiKXnYlHgu3S', '', '', '', '', '2024-10-08 16:00:14', 'uploads/Jonathan.jpg'),
(8, 'Jinawa Titus Torhile', 'jinawalic@gmail.com', '08089230260', '', '$2y$10$iqY2cv6j13n6yCiv3L9Tbuu4ZO4aj.FarvZ43dxL4e60mh/iq5FRq', '', '', '', '', '2024-10-09 10:11:21', 'uploads/DAD SIGN.PNG'),
(9, 'Jinawa Titus Torhile', 'jinawalic@gmail.com', '08089230260', '', '$2y$10$I5t1iCA5bqWkhmUfAoDHTuxuAyiu/zCN96XPyqyhFaMB2e8CeGbC.', '', '', '', '', '2024-10-09 10:12:41', 'uploads/sign.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `identity`
--
ALTER TABLE `identity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kyc`
--
ALTER TABLE `kyc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_amount`
--
ALTER TABLE `loan_amount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_application`
--
ALTER TABLE `loan_application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_duration`
--
ALTER TABLE `loan_duration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_percent`
--
ALTER TABLE `loan_percent`
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
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `identity`
--
ALTER TABLE `identity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kyc`
--
ALTER TABLE `kyc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `loan_amount`
--
ALTER TABLE `loan_amount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `loan_application`
--
ALTER TABLE `loan_application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `loan_duration`
--
ALTER TABLE `loan_duration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `loan_percent`
--
ALTER TABLE `loan_percent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
