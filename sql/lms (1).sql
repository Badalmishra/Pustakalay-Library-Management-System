-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2018 at 03:21 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bookid` int(11) NOT NULL,
  `bname` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT '1',
  `publication` varchar(50) NOT NULL,
  `Edition` varchar(50) NOT NULL,
  `price` varchar(20) DEFAULT '500'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bookid`, `bname`, `author`, `stock`, `publication`, `Edition`, `price`) VALUES
(1, 'life of pie', 'bishal', 45, '', 'wo wala ', '200'),
(2, 'life of no one ', 'ye wala ', 0, '', 'haha', '200'),
(3, 'ye wala', 'wo wala', 100, 'pata nahi', 'konsa', '2000'),
(4, 'the alchemist ', 'nichola spark', 16, 'paperboat', '2000', '3200'),
(5, 'book1', 'auth1', 2, 'pub1', 'ed1', '900'),
(6, 'book2', 'auth2', 2, 'pub2', 'ed2', '900'),
(7, 'book3', 'auth3', 3, 'pub3', 'ed3', '800');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `tid` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  `uid` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `returned` int(11) NOT NULL,
  `iby` varchar(20) NOT NULL,
  `t_type` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`tid`, `bid`, `uid`, `time`, `returned`, `iby`, `t_type`) VALUES
(65, 1, '12', '2018-06-11 07:47:39', 0, '', 'issue'),
(66, 5, '12', '2018-06-12 07:13:22', 1, '', 'hold'),
(67, 5, '14', '2018-06-15 18:46:37', 0, '', 'hold'),
(68, 5, '12', '2018-07-13 13:18:40', 1, '', 'hold');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `credit` int(11) NOT NULL DEFAULT '0',
  `email` char(100) NOT NULL,
  `utype` varchar(20) NOT NULL,
  `pic` varchar(50) NOT NULL,
  `did` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `name`, `password`, `credit`, `email`, `utype`, `pic`, `did`) VALUES
(6, 'admin', 'admin', 0, '', 'admin', '', 0),
(8, 'Badal Mishra', 'badalo', 0, 'b@h.com', '', 'screenshot (20).png', 0),
(9, 'Mayank Mishra', 'mayanko', 0, 'b@h.com', '', 'screenshot (20).png', 0),
(10, 'mayank sharma', 'badalo', 0, 'n@k.com', '', 'screenshot (22).png', 0),
(11, 'mayank sharma', 'ba', 1, 'n@k.com', '', 'screenshot (22).png', 0),
(12, 'user', 'user', 1, 'b@g.com', '', '1200px-litter.jpg', 0),
(13, 'shivam', 'bbb', 0, 'b@l.com', '', '22.jpg', 0),
(14, 'Badal Mishra', 'lol', 1, 'b@g.com', '', '22.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bookid`),
  ADD UNIQUE KEY `bookid` (`bookid`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bookid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
