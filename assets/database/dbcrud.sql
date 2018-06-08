-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2018 at 06:35 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbcrud`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblguest`
--

CREATE TABLE `tblguest` (
  `guest_id` int(11) NOT NULL,
  `guest_firstname` varchar(40) NOT NULL,
  `guest_lastname` varchar(40) NOT NULL,
  `guest_email` varchar(40) NOT NULL,
  `guest_address` varchar(80) NOT NULL,
  `guest_contact` varchar(30) NOT NULL,
  `guest_status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblguest`
--

INSERT INTO `tblguest` (`guest_id`, `guest_firstname`, `guest_lastname`, `guest_email`, `guest_address`, `guest_contact`, `guest_status`) VALUES
(1, 'Jan', 'Sajo', 'jansajo@gmail.com', 'City of Binan, Laguna', '09057499210', 1),
(4, 'Kenneth', 'Sajo', 'nethsajo98@gmail.com', 'City of Binan, Laguna', '09057499213', 0),
(5, 'Angel', 'Sajo', 'angelsajo@gmail.com', 'City of Binan, Laguna', '09123456789', 0),
(6, 'Jan Kenneth', 'Sajo', 'jansajo98@gmail.com', 'City of Bi&ntilde;an, Laguna', '09057499210', 1),
(7, '', '', '', '', '', 0),
(8, 'asd', 'eqwe', 'azxc', 'afa', '7721498', 0),
(9, 'qweoiiou', 'afsjb', 'ufaslhjkj', 'mnewro', '123356', 0),
(10, 'jklgj', 'ouqower', 'xdfnl', 'ljshl', '29889746', 0),
(11, 'drtykl;', 'cvbnip', 'dhknj', 'opyeprt', '645743435', 0),
(12, 'qwesg', 'pwtpw', 'dfgh', 'eeyiop', 'dfghkl', 0),
(13, 'qwe', 'sgzf', 'qjuoi', 'oidgh', '89554', 0),
(14, 'easdjk', 'ioqwe', 'zsdf', 'uwoie', 'dfgfg', 0),
(15, 'asq', 'kop', 'g', 'qw', '453', 0),
(16, 'we', 'sg', 'wr', 'w', '14', 0),
(17, 'qwe', 's', 'qw', 'tj', '234756', 0),
(18, 'uoiu', 'sdfg', 'weit[poi', 'yjj', '89234897', 1),
(19, 'xfgh', 'dfghf', 'dfgv', 'ryerptjfj', '78424685756', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblguest`
--
ALTER TABLE `tblguest`
  ADD PRIMARY KEY (`guest_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblguest`
--
ALTER TABLE `tblguest`
  MODIFY `guest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
