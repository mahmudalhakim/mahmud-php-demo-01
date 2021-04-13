-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 10, 2021 at 03:17 PM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `filmdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`) VALUES
(1, 'Mahmud Al Hakim', 'mahmud@alhakim.com'),
(2, 'Yasmin Al Hakim', 'yasmin@alhakim.com');

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

CREATE TABLE `films` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`id`, `title`, `price`, `image`) VALUES
(1, 'Braveheart', 20, '1.jpg'),
(2, 'Matrix', 40, '2.jpg'),
(3, 'Fight Club', 15, '3.jpg'),
(4, 'Patrioten', 15, '4.jpg'),
(5, 'Goldeneye', 30, '5.jpg'),
(6, 'Blair Witch Project', 25, '6.jpg'),
(7, 'Dum dummare', 30, ''),
(8, 'Dödslängtan', 30, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `films`
--
ALTER TABLE `films`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
