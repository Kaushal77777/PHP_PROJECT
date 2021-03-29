-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2021 at 04:16 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydairy`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_ledger`
--

CREATE TABLE `table_ledger` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `o_date` date NOT NULL,
  `qty` int(11) NOT NULL,
  `rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_ledger`
--

INSERT INTO `table_ledger` (`id`, `user_id`, `o_date`, `qty`, `rate`) VALUES
(1, 2, '2021-03-01', 2, 45),
(2, 3, '2021-03-01', 3, 46),
(3, 2, '2021-03-02', 5, 45),
(4, 2, '2021-03-03', 5, 45),
(5, 2, '2021-02-28', 2, 45),
(6, 2, '2021-03-01', 2, 45),
(7, 2, '2021-03-06', 2, 45),
(8, 2, '2021-03-07', 3, 45),
(9, 3, '2021-03-01', 10, 46),
(10, 2, '2021-03-02', 2, 45),
(11, 2, '2021-04-01', 2, 45),
(12, 3, '2021-01-01', 10, 46),
(13, 2, '2021-03-15', 5, 45);

-- --------------------------------------------------------

--
-- Table structure for table `table_user`
--

CREATE TABLE `table_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_user`
--

INSERT INTO `table_user` (`id`, `name`, `username`, `password`, `email`, `mobile`, `address`, `role`, `rate`) VALUES
(1, 'Kaushal', 'k123', '123', 'kaushal@gmail.com', '9876543210', 'Rajkot', 0, 0),
(2, 'Dhruvit', 'd123', '123', 'dhruvit@gmail.com', '9997779999', 'Rajkot', 1, 45),
(3, 'ABC', 'abc', 'abc', 'abc@gmail.com', '1111111111', 'Rajkot, Gujarat, India', 1, 46),
(4, 'XYZ', 'xyz', 'xyz', 'xyz@gmail.com', '2222222222', 'Gondal', 1, 50),
(5, 'Kaushal Chovatiya', 'kaushal77777', 'kaushal@1907', 'patelkaushal736@gmail.com', '+918511019459', '1,Jyotinagar Chowk, St no 1 Jyoti Nagar, B/H: Crystal Mall, Kalawad Road, Rajkot, Gujarat.', 0, 0),
(6, 'Shubham', 's123', '123', 's@gmail.com', '1234567890', 'Rajkot', 1, 45);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_ledger`
--
ALTER TABLE `table_ledger`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_user`
--
ALTER TABLE `table_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_ledger`
--
ALTER TABLE `table_ledger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `table_user`
--
ALTER TABLE `table_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
