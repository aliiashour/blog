-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2022 at 06:10 PM
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
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `favoruits`
--

CREATE TABLE `favoruits` (
  `favourit_user_id` int(11) NOT NULL,
  `favourit_post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favoruits`
--

INSERT INTO `favoruits` (`favourit_user_id`, `favourit_post_id`) VALUES
(1, 3),
(1, 5),
(2, 2),
(2, 5),
(3, 1),
(3, 2),
(3, 4),
(4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(100) NOT NULL,
  `post_content` varchar(1000) NOT NULL,
  `post_publisher` int(11) NOT NULL,
  `post_image` varchar(50) NOT NULL DEFAULT 'post.jpg',
  `post_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `post_visitor_count` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_content`, `post_publisher`, `post_image`, `post_time`, `post_visitor_count`) VALUES
(1, 'how to start programing', 'One thing I can clearly say you that since I managed to Learn to program then you will also learn to program very easily. because till my higher secondary study I didn’t have any knowledge about programming and languages, but now I’m doing my IPG M.tech from IIIT Gwalior and managed to learn C, C++, JAVA, PYTHON, HTML, CSS, JAVASCRIPT, and the list goes on.\r\n\r\nAt first, you should buy a C language book (the name of the book is ‘ let us C by Yashwant kanetkar’ it is really a very good book and also beginner-friendly .along with that you have to watch YouTube videos regarding C language. And truly speaking reading books can increase the theoretical knowledge about a language but watching various kind of videos regarding a language helps you to write programs and you can get familiar with various kind of approaches to solve a single problem, and which I think is the more important thing to learn a language. so I’ll suggest you that keep watch programming videos on YouTube as you don’t nee', 1, 'post.jpg', '2022-10-30 17:01:48', 2),
(2, 'what are loops in java?', 'If a given condition is true, loops are used to execute a specific part of a program multiple times. For example, if you write a code and the condition of it is true and you would want it to repeat if true, you would most likely want to use a loop, so that the code can be executed.\r\n\r\nNow that you have an idea of what loops could be, I will list below the 6 types of loops that you might use', 4, 'post.jpg', '2022-10-30 17:02:02', 1),
(3, 'What can I learn in 1 minute that will be useful for the rest of my life?', '1. If your home smells fishy for no reason, 9 times out of 10, it means there is an electrical fire.\r\n\r\n2. If you ever feel like someone is following your car, turn right four times and it will eventually circle. If they are still behind you, that means they are following you. Don\'t drive home, just call the police and drive to the police station\r\n\r\n3. If ever an assistance dog approaches you without its owner, follow it and do it quickly because you could potentially save someone else\'s life.\r\n\r\n4. If someone tries to take you away, fight back. Most kidnappers will simply give up if they encounter resistance. And whatever you do, don\'t let them take you away.\r\n\r\n5. If the tide suddenly goes out unexpectedly, run like you\'ve stolen it, for higher ground.\r\n\r\n6. If you are ever attacked by a moose, get behind a tree...they have a blind spot of about ten inches and they will lose you...\r\n\r\n7.When people say to take an aspirin to help during a heart attack, chew the pill, don\'t swallow it ', 1, 'post.jpg', '2022-10-30 17:02:20', 1),
(4, 'How can I learn to focus well?', 'This is Legit.\r\n\r\nBeing greedy in progress is one of the most typical causes of procrastination.\r\n\r\nWe intend to achieve our goal as quickly as possible by climbing a gigantic ladder that becomes more challenging for our brains every day.\r\n\r\nInstead, concentrate on forming habits by taking little everyday measures.\r\n\r\nIf you want to finish a 350-page book.\r\n\r\nStart by reading 10 pages every day, not 50 pages a day.', 1, 'post.jpg', '2022-10-30 14:59:17', 0),
(5, 'need to test', 'test test test', 6, 'post.jpg', '2022-10-21 16:38:15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `post_emojis`
--

CREATE TABLE `post_emojis` (
  `post_like` int(11) NOT NULL DEFAULT 0,
  `post_perfect` int(11) NOT NULL DEFAULT 0,
  `post_love` int(11) NOT NULL DEFAULT 0,
  `post_love_eye` int(11) NOT NULL DEFAULT 0,
  `post_laugh` int(11) NOT NULL DEFAULT 0,
  `post_cute` int(11) NOT NULL DEFAULT 0,
  `post_sad` int(11) NOT NULL DEFAULT 0,
  `post_emojis_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post_emojis`
--

INSERT INTO `post_emojis` (`post_like`, `post_perfect`, `post_love`, `post_love_eye`, `post_laugh`, `post_cute`, `post_sad`, `post_emojis_id`) VALUES
(1, 0, 1, 0, 0, 0, 0, 1),
(2, 0, 1, 0, 0, 0, 0, 2),
(0, 0, 0, 1, 1, 0, 0, 3),
(1, 0, 1, 1, 0, 0, 0, 4),
(0, 0, 0, 0, 0, 0, 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_uname` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_image` varchar(50) NOT NULL DEFAULT 'user.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_uname`, `user_email`, `user_password`, `user_image`) VALUES
(1, 'ali ashour', 'ali', 'aliashour592@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'user.jpg'),
(2, 'adam ali', 'adam', 'adam@gmail.com', '51eac6b471a284d3341d8c0c63d0f1a286262a18', 'user.jpg'),
(3, 'zaki hafez', 'zaki', 'zaki@gmail.com', 'fc1200c7a7aa52109d762a9f005b149abef01479', 'user.jpg'),
(4, 'ragb metwally', 'ragb', 'ragb@gmail.com', '6b9e37933b64bf5a4866f5ca85a1bf692dff5643', 'user.jpg'),
(5, 'nada mohamed', 'nada', 'nada@gmail.com', 'fb7465a0d5bef7335873ccdfc31bb8d3367c1945', 'user.jpg'),
(6, 'anas malek', 'anas', 'anas@gmail.com', '956e8ac6429e1bb29d07acbf2616585b39c6e305', 'user.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `favoruits`
--
ALTER TABLE `favoruits`
  ADD PRIMARY KEY (`favourit_user_id`,`favourit_post_id`),
  ADD KEY `FK_FAVOUIRT_POST_ID` (`favourit_post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `FK_POST_PUBLISHER` (`post_publisher`);

--
-- Indexes for table `post_emojis`
--
ALTER TABLE `post_emojis`
  ADD PRIMARY KEY (`post_emojis_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_uname` (`user_uname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favoruits`
--
ALTER TABLE `favoruits`
  ADD CONSTRAINT `FK_FAVOUIRT_POST_ID` FOREIGN KEY (`favourit_post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_FAVOUIRT_USER_ID` FOREIGN KEY (`favourit_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `FK_POST_PUBLISHER` FOREIGN KEY (`post_publisher`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post_emojis`
--
ALTER TABLE `post_emojis`
  ADD CONSTRAINT `KS_EMOJIIES_POSTS` FOREIGN KEY (`post_emojis_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
