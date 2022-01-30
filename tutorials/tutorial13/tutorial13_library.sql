-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2022 at 07:19 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tutorial13_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookissue`
--

CREATE TABLE `bookissue` (
  `id` int(11) NOT NULL,
  `bookid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `issuedate` date NOT NULL,
  `duedate` date NOT NULL,
  `returnstatus` tinyint(4) NOT NULL DEFAULT 0,
  `fine` int(11) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookissue`
--

INSERT INTO `bookissue` (`id`, `bookid`, `userid`, `issuedate`, `duedate`, `returnstatus`, `fine`, `datetime`) VALUES
(3, 3, 4, '2018-05-24', '2018-05-27', 0, 0, '2018-05-03 06:10:50'),
(4, 3, 4, '2018-05-01', '2018-05-17', 1, 0, '2018-05-03 06:11:29'),
(5, 55, 4, '2018-05-12', '2018-05-27', 0, 0, '2022-01-28 08:28:17'),
(6, 5, 4, '2018-05-05', '2018-05-25', 1, 0, '2018-05-03 06:11:16'),
(7, 1, 6, '2018-05-01', '2018-05-12', 1, 0, '2018-05-03 06:11:08');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `titleurl` text NOT NULL,
  `pendingstock` int(11) NOT NULL,
  `datetime` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `price`, `stock`, `titleurl`, `pendingstock`, `datetime`) VALUES
(1, 'The Joy of PHP Programming', 'Alan Forbes', 200, 10, 'images/30-01-2022_06-52-19_book2.jfif', 10, '2022-01-30 05:52:19'),
(2, ' PHP & MySQL Novice to Ninja', 'Kevin Yank', 156, 6, 'images/30-01-2022_06-50-13_book1.jfif', 4, '2022-01-30 05:50:13'),
(3, 'Head First PHP & MySQL', 'Lynn Beighley & Michael Morrison', 650, 3, 'images/30-01-2022_06-52-32_book3.jfif', 2, '2022-01-30 05:52:32'),
(4, 'Learning PHP, MySQL, JavaScript, and CSS', 'Robin Nixon', 778, 1, 'upload/flower-purple-lical-blosso.jpg', 1, '2019-02-16 00:02:26'),
(5, 'PHP & MySQL Web Development', 'Luke Welling & Laura Thompson', 340, 10, 'images/30-01-2022_06-52-38_book4.jfif', 2, '2022-01-30 05:52:38'),
(6, 'PHP: A Beginnerï¿½s Guide ', 'Vikram Vaswani', 245, 4, 'upload/flower-purple-lical-blosso.jpg', 2, '2019-02-16 00:02:36');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(20) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `datetime`) VALUES
(1, 'Admin', '2018-04-10 05:17:38'),
(2, 'Student', '2018-04-10 05:17:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `category` varchar(20) NOT NULL DEFAULT 'Student',
  `datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `username`, `password`, `category`, `datetime`) VALUES
(1, 'Rajesh', 'Pandya', 'Admin@Gmail.com', '123456', 'Admin', '2019-02-21 23:50:29'),
(4, 'Student', 'Student', 'Student@Gmail.com', '123456', 'Student', '2019-02-21 23:12:09'),
(7, 'Rohit', 'Rajdev', 'Admin@Gmail.com', '123456', 'Student', '2019-02-21 23:50:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookissue`
--
ALTER TABLE `bookissue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
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
-- AUTO_INCREMENT for table `bookissue`
--
ALTER TABLE `bookissue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
