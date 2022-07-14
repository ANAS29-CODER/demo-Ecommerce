-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2022 at 10:27 AM
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
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adid` int(11) NOT NULL,
  `adname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adid`, `adname`) VALUES
(1010, 'nahla');

-- --------------------------------------------------------

--
-- Table structure for table `cat`
--

CREATE TABLE `cat` (
  `catid` int(11) NOT NULL,
  `catname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phonenum` int(11) NOT NULL,
  `photo` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cat`
--

INSERT INTO `cat` (`catid`, `catname`, `address`, `phonenum`, `photo`) VALUES
(2, 'dsdd', 'asss', 55645, ''),
(3, 'Apparel', 'sss', 247, ''),
(4, 'cars', 'German', 25802, ''),
(6, 'Balls', 'Espain', 266, ''),
(8, 'Elctronic', 'as', 0, ''),
(10, 'Medical', 'hebron', 2876323, ''),
(12, 'irpod', 'cxv', 4444, 'C:\\xampp\\tmp\\php99A5.tmp');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `proid` int(11) NOT NULL,
  `proname` varchar(255) NOT NULL,
  `proprice` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `catid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`proid`, `proname`, `proprice`, `address`, `phone`, `photo`, `catid`) VALUES
(34, 'mouse', 33, 'Gazassss', 2876323, '../img/Screenshot (7).png', 10),
(35, 'mouse', 33, 'Gazassss', 2876323, '../img/Screenshot (7).png', 10),
(36, 'mouse', 33, 'Gazassss', 2876323, '../img/Screenshot (7).png', 10),
(37, 'Ipod iphone', 560, 'asa', 432, '../img/Screenshot (9).png', 12),
(38, 'I40 promax', 14, 'asa', 432, '../img/Screenshot (9).png', 12),
(39, 'I12pro', 15, 'asa', 432, '../img/Screenshot (9).png', 12),
(40, 'I11\r\n', 55, 'asa', 432, '../img/Screenshot (9).png', 12),
(41, 'Merceds', 50000, 'German', 0, '../img/Screenshot (10).png', 4),
(42, 'sa', 5454, 'gfd', 545, '../img/Screenshot (12).png', 8),
(43, 'sa', 5454, 'gfd', 545, '../img/Screenshot (12).png', 8),
(44, 'sa', 5454, 'gfd', 545, '../img/Screenshot (12).png', 8),
(45, 'sa', 5454, 'gfd', 545, '../img/Screenshot (12).png', 8),
(46, 'sa', 5454, 'gfd', 545, '../img/Screenshot (12).png', 8),
(47, 'sa', 5454, 'gfd', 545, '../img/Screenshot (12).png', 8),
(48, 'Tshirt', 777, 'gb', 592970150, '../img/Screenshot (20).png', 3),
(49, 'pants', 285, 'gb', 592970150, '../img/Screenshot (25).png', 3),
(62, 'Socket', 1000, 'gaza', 972, '../img/Screenshot (16).png', 3),
(63, 'Dior', 1085, 'Norway', 592822, '../img/Screenshot (21).png', 2),
(64, 'penculk', 6567, 'fng', 6, '../img/Screenshot (15).png', 6),
(65, 'shirt', 20, 'sasas', 652, '../img/Screenshot (16).png', 3),
(66, 'jacket', 95, 'aa', 521, '../img/Screenshot (15).png', 3),
(68, 'Hogo', 22, 'da5', 100, '', 2),
(69, 'ds', 4334, 'ffd', 433, '../img/Screenshot (3).png', 6);

-- --------------------------------------------------------

--
-- Table structure for table `var`
--

CREATE TABLE `var` (
  `photoname` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `var`
--

INSERT INTO `var` (`photoname`) VALUES
('C:\\xampp\\tmp\\phpED1.tmp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adid`);

--
-- Indexes for table `cat`
--
ALTER TABLE `cat`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`proid`),
  ADD KEY `catid` (`catid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cat`
--
ALTER TABLE `cat`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `proid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `store`
--
ALTER TABLE `store`
  ADD CONSTRAINT `store_ibfk_1` FOREIGN KEY (`catid`) REFERENCES `cat` (`catid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
