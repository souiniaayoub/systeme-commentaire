-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2020 at 01:01 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `post_id`, `user_id`, `body`, `created_at`) VALUES
(1, 1, 0, 'id 1', '2020-03-04 16:16:50'),
(2, 1, 0, 'id 2', '2020-03-04 21:19:46'),
(73, 1, 1, 'efzef', '2020-03-09 12:02:42'),
(74, 1, 1, 'fzefzf', '2020-03-09 12:02:47'),
(75, 1, 1, 'TEST 1\n', '2020-03-09 17:39:48'),
(76, 1, 1, '2 TEST', '2020-03-09 17:40:01'),
(77, 1, 1, 'TEST 3', '2020-03-09 17:40:16'),
(78, 1, 1, 'TEST 15', '2020-03-09 17:42:02'),
(79, 1, 1, 'zerrzer', '2020-03-09 19:14:01'),
(80, 1, 1, 'zerzr', '2020-03-09 19:14:03'),
(81, 1, 1, 'zerzer', '2020-03-09 19:14:05'),
(82, 1, 1, 'ggggggggggggg', '2020-03-09 19:19:26'),
(83, 1, 1, 'rgrgr', '2020-03-09 21:12:31'),
(84, 1, 1, 'rgerg', '2020-03-09 21:15:42'),
(85, 1, 1, 'rege', '2020-03-09 21:15:47'),
(86, 1, 1, 'rgrg', '2020-03-09 21:16:33'),
(87, 1, 1, 're', '2020-03-09 21:18:08'),
(88, 1, 1, 'eeee', '2020-03-09 21:19:09'),
(89, 1, 1, 'fefefefe', '2020-03-09 22:50:16'),
(90, 1, 1, 'rgr', '2020-03-09 22:50:24'),
(91, 1, 1, 'rggrg', '2020-03-09 22:50:28'),
(92, 1, 1, 'efe', '2020-03-09 22:52:16'),
(93, 1, 1, 'eee', '2020-03-09 23:05:48'),
(94, 1, 1, 'aaaaa', '2020-03-09 23:06:13'),
(95, 1, 1, 'aa', '2020-03-09 23:06:54'),
(96, 1, 1, 'trtt', '2020-03-09 23:07:14'),
(97, 1, 1, 'zzez', '2020-03-09 23:07:49'),
(98, 1, 1, 'z', '2020-03-09 23:08:27'),
(99, 1, 1, 'azerty', '2020-03-09 23:09:05'),
(100, 1, 1, 'azezza', '2020-03-09 23:09:15'),
(101, 1, 1, 'ze', '2020-03-09 23:10:17'),
(102, 1, 1, 'efeefef', '2020-03-09 23:10:38'),
(103, 1, 1, 'ere', '2020-03-09 23:11:03'),
(104, 1, 1, 'rer', '2020-03-09 23:11:16'),
(105, 1, 1, 'az', '2020-03-09 23:12:10'),
(106, 1, 1, 'erzzrz', '2020-03-09 23:13:07'),
(107, 1, 1, 'dzd', '2020-03-09 23:14:42'),
(108, 1, 1, 'ere', '2020-03-09 23:15:32'),
(109, 1, 1, 'effffffffffffffffffffff', '2020-03-09 23:16:20'),
(110, 1, 1, 'zez', '2020-03-09 23:17:26'),
(111, 1, 1, 'zeeeeeeeeeeeee', '2020-03-09 23:18:51'),
(112, 1, 1, 'aaaaaaaaaaaa', '2020-03-09 23:19:06'),
(113, 1, 1, 'abcd', '2020-03-09 23:25:52'),
(114, 1, 1, 'azae', '2020-03-09 23:43:25');

-- --------------------------------------------------------

--
-- Table structure for table `comment_likes`
--

CREATE TABLE `comment_likes` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `value` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment_likes`
--

INSERT INTO `comment_likes` (`comment_id`, `user_id`, `value`) VALUES
(2, 1, -1);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `body` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `post_likes`
--

CREATE TABLE `post_likes` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `value` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `reply_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`reply_id`, `comment_id`, `user_id`, `created_at`, `body`) VALUES
(8, 3, 2, '2020-03-04 21:09:21', ''),
(9, 3, 2, '2020-03-04 21:09:21', ''),
(11, 3, 2, '2020-03-04 21:09:21', ''),
(12, 3, 2, '2020-03-04 21:09:21', ''),
(14, 3, 2, '2020-03-04 21:09:22', 'id14'),
(15, 3, 2, '2020-03-04 21:09:22', ''),
(26, 68, 1, '2020-03-09 01:33:23', 'XXX'),
(27, 68, 1, '2020-03-09 01:33:29', 'XXXXXX'),
(28, 67, 1, '2020-03-09 01:33:34', 'zdz'),
(29, 67, 1, '2020-03-09 01:33:38', 'dzdzd'),
(30, 70, 1, '2020-03-09 08:08:56', 'hilhkhj'),
(31, 70, 1, '2020-03-09 08:09:59', 'kkj'),
(32, 70, 1, '2020-03-09 08:15:09', 'ee'),
(33, 70, 1, '2020-03-09 08:15:14', 'eee'),
(34, 70, 1, '2020-03-09 08:15:20', 'ee'),
(35, 70, 1, '2020-03-09 08:15:32', 'ff'),
(36, 69, 1, '2020-03-09 08:16:16', 'fff'),
(37, 69, 1, '2020-03-09 08:16:20', 'fff'),
(38, 69, 1, '2020-03-09 08:16:38', 'fffff'),
(39, 70, 1, '2020-03-09 08:16:54', 'zzZZZZ'),
(40, 1, 1, '2020-03-09 12:02:44', 'fzefzef'),
(41, 78, 1, '2020-03-09 17:48:13', 'zzefzefz'),
(42, 78, 1, '2020-03-09 17:48:15', 'zfzef'),
(43, 78, 1, '2020-03-09 17:48:18', 'zfzfzef'),
(44, 78, 1, '2020-03-09 17:48:19', 'zfzefzef'),
(45, 76, 1, '2020-03-09 17:57:10', 'fzefze'),
(46, 77, 1, '2020-03-09 17:57:34', 'ergerg'),
(47, 81, 1, '2020-03-09 19:20:17', 'ferf'),
(48, 81, 1, '2020-03-09 19:20:18', 'f'),
(49, 81, 1, '2020-03-09 19:20:20', 'fer'),
(50, 81, 1, '2020-03-09 19:20:21', 'ferf'),
(51, 81, 1, '2020-03-09 19:20:23', 'ferf'),
(52, 81, 1, '2020-03-09 19:20:26', 'erferf'),
(53, 81, 1, '2020-03-09 19:20:28', 'ferferf'),
(54, 81, 1, '2020-03-09 19:20:30', 'erferf'),
(55, 81, 1, '2020-03-09 19:20:31', 'fef'),
(56, 82, 1, '2020-03-09 20:13:51', 'gergergerg'),
(57, 82, 1, '2020-03-09 20:13:52', 'ergerg'),
(58, 82, 1, '2020-03-09 20:13:54', 'egrg'),
(59, 86, 1, '2020-03-09 22:50:08', 'fef'),
(60, 86, 1, '2020-03-09 22:50:10', 'fef'),
(61, 89, 1, '2020-03-09 22:50:38', 'rgrgrgr'),
(62, 89, 1, '2020-03-09 22:50:40', 'rg'),
(63, 91, 1, '2020-03-09 22:51:12', 'grg'),
(64, 91, 1, '2020-03-09 22:51:14', 'rg'),
(65, 91, 1, '2020-03-09 22:52:02', 'grgr'),
(66, 91, 1, '2020-03-09 22:52:05', 'grg'),
(67, 91, 1, '2020-03-09 22:52:08', 'gr'),
(68, 92, 1, '2020-03-09 23:01:37', 'ezrze'),
(69, 92, 1, '2020-03-09 23:01:38', 'er'),
(70, 112, 1, '2020-03-09 23:56:41', 'zefzef'),
(71, 112, 1, '2020-03-09 23:56:43', 'zerz'),
(72, 112, 1, '2020-03-09 23:56:44', 'zerz'),
(73, 112, 1, '2020-03-09 23:56:48', 'zerzerz'),
(74, 112, 1, '2020-03-09 23:56:50', 'zerze');

-- --------------------------------------------------------

--
-- Table structure for table `reply_likes`
--

CREATE TABLE `reply_likes` (
  `reply_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `value` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `user_pic` text DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`reply_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
