-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2016 at 07:01 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fasttry`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `dress_id` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `color` varchar(30) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `descr` text NOT NULL,
  `image` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`dress_id`, `type`, `price`, `brand`, `color`, `gender`, `descr`, `image`) VALUES
(1, 'T-shirt', '200', 'Nike', 'Green', 'Men', 'Men t shirt', '1.png'),
(2, 'T-shirt', '150', 'UCB', 'Pink', 'Women', 'Men t shirt', '2.png'),
(3, 'T-shirt', '175', 'Flying Machine', 'Red', 'Men', 'Men t shirt', '3.png'),
(4, 'T-shirt', '199', 'Flying Machine', 'Yellow', 'Men', 'Men t shirt', '4.png'),
(5, 'Shirt', '475', 'Puma', 'Red', 'Men', 'Men t shirt', '5.png'),
(6, 'T-shirt', '575', 'Puma', 'Red', 'Men', 'Men t shirt', '6.png'),
(7, 'Shirt', '355', 'MBA', 'Red', 'Men', 'Men t shirt', '7.jpeg'),
(8, 'Shirt', '333', 'Xyz', 'Blue', 'Men', 'Men t shirt', '8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `cart` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `cart`) VALUES
(1, 'Shivansh Nalwaya', 'shivanshnalwaya@gmail.com', 'asd', '3,'),
(2, 'Sid Nalwaya', 'sidnlw@gmail.com', 'sid', '8,'),
(3, 'Test Test', 'test@test.com', 'test', ''),
(4, 'j j', 'j@j.com', 'j', ''),
(5, 'x x', 'sidnlw@gmaix', 'x', ''),
(6, 'f g', 'sidnlw@gmail.com', 'sid', '8,'),
(7, 'x x', 'x@x.com', 'x', ''),
(8, 'Siddharth Nalwaya', 'siddnlw@gmail.com', 'pokemon', ''),
(9, 'Sanjay Rajpurohit', 'sanjay@gmail.com', 'sanjay', ''),
(10, 'Hello Hello', 'hello@hello.com', 'hello', ''),
(11, 's s', 'sidnlw@gmail.com', 'sid', '8,'),
(12, 'shivansh nalwaya', 'shivanshnlw@gmail.com', 'hello', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`dress_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `dress_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
