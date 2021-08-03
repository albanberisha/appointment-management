-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2021 at 12:40 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `calendarapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `Shdesc` varchar(1000) DEFAULT NULL,
  `FullDesc` varchar(1000) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `StartTime` time DEFAULT NULL,
  `EndTime` time DEFAULT NULL,
  `NumOfDays` int(50) DEFAULT NULL,
  `Importance` varchar(20) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `UserId`, `Shdesc`, `FullDesc`, `Date`, `StartTime`, `EndTime`, `NumOfDays`, `Importance`, `status`) VALUES
(32, 2, 'Sot', '', '2021-06-04', NULL, NULL, 1, '', 2),
(33, 2, 'asfasf', 'fasafasf', '2021-06-04', '01:29:00', '04:33:00', 1, 'blue', 2),
(34, 2, 'asfdasfasf', 'asfasf', '2021-05-03', '14:29:00', '15:29:00', 2, 'blue', 2),
(35, 2, 'Termin', 'asfasf', '2021-06-03', '14:37:00', '15:37:00', 1, 'blue', 2),
(36, 2, 'takim', 'asfasf', '2021-06-03', NULL, NULL, 3, 'green', 2),
(37, 2, 'Takim', 'Takim me antaret e komisionit nga BE', '2021-06-03', NULL, NULL, 1, 'red', 2),
(38, 2, 'asfasfasf', 'asfasfasf', '2021-06-05', NULL, NULL, 1, '', 2),
(39, 2, 'Pushim', 'Pushim Vjetor', '2021-06-08', NULL, NULL, 365, 'blue', 2),
(40, 2, 'asfasfasf', '', '2021-05-05', NULL, NULL, 1, 'red', 2),
(41, 2, 'Takim', 'asfasfa', '2021-12-30', '14:59:00', '16:01:00', 1, 'green', 2),
(42, 2, 'asfasf', '', '2021-12-31', NULL, NULL, 1, '', 2),
(43, 2, 'asasf', 'asdasd', '2021-06-26', NULL, NULL, 1, 'red', 2),
(44, 2, 'asfasfasf', 'asfasf', '2021-06-02', '15:57:00', '16:57:00', 1, 'red', 2),
(45, 2, 'asfasfa', '', '2021-05-19', NULL, NULL, 1, 'blue', 1),
(46, 2, 'asfsf', 'asfasf', '2021-06-03', NULL, NULL, 1, 'blue', 2),
(47, 2, 'temrin', 'Komenti', '2021-06-02', '03:19:00', '17:19:00', 1, 'red', 2),
(48, 2, 'asfasfasf', '', '2021-07-01', NULL, NULL, 1, 'blue', 1),
(49, 1, 'Termin', 'Termin', '2021-06-04', NULL, NULL, 2, 'green', 2),
(50, 1, 'Datelindja e kompanise', 'Datelindja e kompanise ku te ftuar jane te gjithe klientet e afert\r\n', '2021-06-03', '20:00:00', '22:00:00', 1, 'blue', 2),
(51, 2, 'Takim', 'Takim me klient', '2021-06-02', '07:00:00', '08:00:00', 1, 'red', 1),
(52, 2, 'Takim', '', '2021-06-02', '10:00:00', '11:00:00', 1, 'red', 1),
(53, 2, 'Takim', 'Takim me klient', '2021-06-02', '15:00:00', '16:00:00', 1, 'blue', 1),
(54, 1, 'Termin', 'terminaslkfhasnf cajm c', '2021-05-04', NULL, NULL, 1, 'blue', 1),
(55, 1, 'Pushim', 'Pushimi veror', '2021-06-17', NULL, NULL, 6, 'red', 2),
(56, 1, 'tiaslnfm;as', '', '2021-06-01', NULL, NULL, 1, '', 1),
(57, 1, 'mamonia', 'Mja prezantu', '2021-06-30', NULL, NULL, 1, 'red', 1),
(58, 1, 'Tremin', 'koment i gjate', '2021-06-02', '17:07:00', '19:07:00', 1, 'blue', 1);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `computer_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Adresa` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `userId`, `name`, `computer_id`, `Adresa`) VALUES
(1, 2, 'qendrim', NULL, NULL),
(2, 0, 'Dadim', NULL, NULL),
(3, 2, 'Hasam', NULL, NULL),
(4, 2, 'alban', NULL, NULL),
(5, 2, 'klientperdimbabushin', NULL, NULL),
(7, 2, 'qendrim2', '', ''),
(8, 2, 'qendrim3', '', ''),
(9, 2, 'qendrim4', '', ''),
(10, 1, 'qendrim', '', ''),
(11, 2, 'qendrim34', '', ''),
(12, 2, 'qend213312', '', ''),
(13, 1, 'Artan', 'DESKTOP/NJ23423423', 'ISTOG');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `client_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `dateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`client_id`, `user_id`, `description`, `dateTime`) VALUES
(11, 2, 'asfasfasfasf', '2021-06-15 15:45:13'),
(11, 3, 'asfasfasf', '0000-00-00 00:00:00'),
(11, 2, 'aaaa', '2021-06-03 15:46:54'),
(11, 2, 'aasdasdasd', '2021-06-03 15:47:49'),
(11, 2, 'koment\r\n', '2021-06-03 15:48:31'),
(5, 2, 'koment', '2021-06-03 15:51:30'),
(5, 2, 'koment\r\n', '2021-06-03 15:53:22'),
(13, 1, 'sfasfasf', '2021-06-03 15:56:05'),
(13, 1, 'asfaslkfhsalkfj svkjcs vjck SVKJ  sfkjv kjeaSV ;jkdv  kJDV KJ', '2021-06-03 15:56:12'),
(13, 1, 'afsaslkfhaLFJASFKLJASLFKJASDKLFJKSLJFKLASJFKLASJFLKASJFLKASJFLKASJFLKASJFKLASJFLASKFJASKLJFASKLJFLKASJFKASLJFLKAKSJFKLASKLFASKLFJLKASLJKFKLASKFJASKLFKJLASLJKFLJKALSFJK', '2021-06-03 15:56:24');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `userIp` varbinary(16) NOT NULL,
  `loginTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `userId`, `username`, `userIp`, `loginTime`) VALUES
(151, 3, 'dimi', 0x3a3a31, '2021-06-03 08:11:25'),
(152, 2, 'Qendrim', 0x3a3a31, '2021-06-03 08:12:42'),
(153, 2, 'Qendrim', 0x3a3a31, '2021-06-03 08:18:06'),
(154, 1, 'dimi', 0x3a3a31, '2021-06-03 10:00:19'),
(155, 2, 'Qendrim', 0x3a3a31, '2021-06-03 10:00:44'),
(156, 2, 'Qendrim', 0x3a3a31, '2021-06-03 10:04:07'),
(157, 1, 'dimi', 0x3a3a31, '2021-06-03 10:21:46'),
(158, 2, 'Qendrim', 0x3a3a31, '2021-06-03 10:28:12'),
(159, 1, 'dimi', 0x3a3a31, '2021-06-03 10:29:39'),
(160, 2, 'Qendrim', 0x3a3a31, '2021-06-03 10:29:50'),
(161, 1, 'dimi', 0x3a3a31, '2021-06-03 12:43:28'),
(162, 1, 'dimi', 0x3a3a31, '2021-06-03 12:51:32'),
(163, 2, 'Qendrim', 0x3a3a31, '2021-06-03 12:51:39'),
(164, 2, 'Qendrim', 0x3a3a31, '2021-06-03 12:55:48'),
(165, 1, 'dimi', 0x3a3a31, '2021-06-03 13:25:02'),
(166, 2, 'Qendrim', 0x3a3a31, '2021-06-03 13:25:20'),
(167, 1, 'dimi', 0x3a3a31, '2021-06-03 13:29:47'),
(168, 2, 'Qendrim', 0x3a3a31, '2021-06-03 13:33:14'),
(169, 1, 'dimi', 0x3a3a31, '2021-06-03 13:55:44'),
(170, 2, 'Qendrim', 0x3a3a31, '2021-06-03 13:56:57'),
(171, 2, 'qendrim', 0x3a3a31, '2021-06-03 13:58:33'),
(172, 1, 'dimi', 0x3a3a31, '2021-06-03 13:58:40'),
(173, 1, 'dimi', 0x3a3a31, '2021-06-03 14:06:56'),
(174, 1, 'dimi', 0x3a3a31, '2021-06-03 14:34:08'),
(175, 1, 'dimi', 0x3a3a31, '2021-06-06 17:37:31'),
(176, 1, 'dimi', 0x3a3a31, '2021-06-08 09:58:58'),
(177, 1, 'dimi', 0x3a3a31, '2021-06-09 08:09:21'),
(178, 1, 'dimi', 0x3a3a31, '2021-06-10 08:35:06'),
(179, 1, 'dimi', 0x3a3a31, '2021-06-17 13:43:28'),
(180, 1, 'dimi', 0x3a3a31, '2021-06-17 13:46:33'),
(181, 1, 'dimi', 0x3a3a31, '2021-06-18 08:38:26'),
(182, 1, 'dimi', 0x3a3a31, '2021-06-18 11:54:04'),
(183, 1, 'dimi', 0x3a3a31, '2021-06-18 12:26:30'),
(184, 1, 'dimi', 0x3a3a31, '2021-06-24 10:05:40'),
(185, 1, 'dimi', 0x3a3a31, '2021-08-03 08:49:41'),
(186, 1, 'dimi', 0x3a3a31, '2021-08-03 08:50:21'),
(187, 1, 'dimi', 0x3a3a31, '2021-08-03 10:35:48'),
(188, 1, 'dimi', 0x3a3a31, '2021-08-03 10:40:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(9) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `computer_id` varchar(100) NOT NULL,
  `RoleId` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `computer_id`, `RoleId`) VALUES
(1, 'dimi', '$2y$10$Q0iGqPJHF78pWVc2KYBWXulo9rel3P2z0QpG6I2XfT3kxA59UBowi', 'DESKTOP-HK6RU47', 1),
(2, 'qendrim', '$2y$10$Q0iGqPJHF78pWVc2KYBWXulo9rel3P2z0QpG6I2XfT3kxA59UBowi', '', 1),
(5, 'grind', '$2y$10$Q0iGqPJHF78pWVc2KYBWXulo9rel3P2z0QpG6I2XfT3kxA59UBowi', 'DESKTOP-5VI2FB4', 2),
(6, 'amsterdam', '$2y$10$Q0iGqPJHF78pWVc2KYBWXulo9rel3P2z0QpG6I2XfT3kxA59UBowi', 'TWIN-PC', 2),
(7, 'freskia', '$2y$10$SEhLYXb511OP3VAhoz0/nuCV3dunczyvSXGwVx5jk3pH1gZ6/4cZe', 'DESKTOP-QFBDA34', 2),
(9, 'demo', '$2y$10$lChK5H1CNXJSwGYhHh7y5ey6GfT9dLYO4Ggy6dofzdngsceWn8Pee', 'PC50-PC', 2),
(10, 'demo1', '$2y$10$Nwply1bSV0EulbOYhBJkvOTwXgo.2raeMwwUaFswUXgf3uG9rXLaq', 'hp-PC', 2),
(14, 'kontabilist', '$2y$10$Hii2x.Rs/J.cCeQcslZoqu/4NG9XPlaR1WB9JjfzvzRWFDHyh/vAy', 'kontabilist', 3),
(15, 'greenpr', '$2y$10$hFD0aaZY8iwomXQAtSVYqexZn5g8ZQFpGRAs5JPefr6wwNzuU5I4y', 'GREENPR', 2),
(16, 'kristal', '$2y$10$Q0iGqPJHF78pWVc2KYBWXulo9rel3P2z0QpG6I2XfT3kxA59UBowi', 'Kristal-PC', 2),
(17, 'greendrenas', '$2y$10$Q0iGqPJHF78pWVc2KYBWXulo9rel3P2z0QpG6I2XfT3kxA59UBowi', 'GREENDRENAS', 2),
(18, 'bungat', '$2y$10$d7jkvSDBkH95ZmrtJZhhSelEfoVC1b6WOJDb4o4hCU4Iz0CRYlljy', 'Bungat-PC', 2),
(19, 'blerimi', '$2y$10$Q0iGqPJHF78pWVc2KYBWXulo9rel3P2z0QpG6I2XfT3kxA59UBowi', '', 3),
(20, 'kotabilisttest', '$2y$10$nQ8o2R6zPIfsMMUhiTNTn.6seN2bu2yKyDRsAcm.Y6SnvxBow9tRK', '', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD KEY `client_id` (`client_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
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
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
