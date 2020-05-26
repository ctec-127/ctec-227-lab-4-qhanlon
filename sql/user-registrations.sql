-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2019 at 07:41 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codemonkey`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `email` varchar(64) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `first_name`, `last_name`, `password`) VALUES
(1, 'belgort@clark.edu', 'Bruce', 'Elgort', 'secret'),
(5, 'bruce.elgort@gmail.com', 'sdfsaf', 'safsfsaf', 'sadfsdf'),
(7, 'beau@martin.com', 'sdaff', 'sdfsda', 'sdafs'),
(10, 'ahagha@gaga.com', 'sdfsdaf', 'sfdsdf', 'sdfsafsadf'),
(15, 'lady@gaga.com', 'sdafsadf', 'sddfadff', 'sdafsadf'),
(17, 'iosif@frenchfries.org', 'sadfasf', 'sadfsdf', 'sdfdsafsa'),
(20, 'june@pain.com', 'June', 'Pain', 'sha512(password)'),
(21, 'b@b.com', 'sdfsadf', 'sadfsdf', ''),
(24, 'scott@scott.com', 'scott', 'scott', 'b119701f3d3eaa97d998a4e8021307785e7f107f26d4f9f72f1cc58591a712ea84e1c2349335412e307c518d572526b2f92c7a8d20d0cd108ee97654e3455d5b'),
(35, 'A@A.COM', 'Cat', 'Stevens', '4241b986a49591d445ebb840bc4b49c12b10b392b49222bc45dfd8b871cb3d0e742cdba152aa782e253026c7fc93fe8287b95c5fd0e22467e99c89501a502cd4'),
(51, 'joani@joani.com', 'Joani', 'Jendgleski', '4241b986a49591d445ebb840bc4b49c12b10b392b49222bc45dfd8b871cb3d0e742cdba152aa782e253026c7fc93fe8287b95c5fd0e22467e99c89501a502cd4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`,`email`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
