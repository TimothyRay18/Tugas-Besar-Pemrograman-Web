-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2020 at 05:24 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tubes`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountlist`
--

CREATE TABLE `accountlist` (
  `No` int(11) NOT NULL,
  `Name` varchar(30) DEFAULT NULL,
  `Username` varchar(30) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Password` char(32) DEFAULT NULL,
  `Type` varchar(6) DEFAULT NULL,
  `Foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accountlist`
--

INSERT INTO `accountlist` (`No`, `Name`, `Username`, `Gender`, `Email`, `Password`, `Type`, `Foto`) VALUES
(1, 'Timothy', 'Timothyray_', 'male', 'timothy.ray1802@gmail.com', '545e565d615d174df5ae5c7f8e4d562c', 'admin', 'login/Upload/photo-02.jpg'),
(2, 'Dave Nathaniel Kertaatmadja', 'Dave', 'male', 'daveNathan@gmail.com', '70b9f55c5b2ab6ab9e5a3fed086f1ce7', 'admin', 'login/Upload/photo.jpg'),
(4, 'Aristo Demos', 'AristoDemos', 'male', 'ato@gmail.com', '35ba4aaf82b01238213e47fd130c153c', 'member', 'login/Upload/RMEL.png');

-- --------------------------------------------------------

--
-- Table structure for table `commentlist`
--

CREATE TABLE `commentlist` (
  `no` int(4) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `visit` varchar(8) NOT NULL,
  `comments` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `commentlist`
--

INSERT INTO `commentlist` (`no`, `name`, `email`, `visit`, `comments`) VALUES
(1, 'Timothy', 'timothy.ray1802@gmail.com', 'yes', 'Bagus banget webnya, saya terharu'),
(2, 'Timothy', 'timtam180201@gmail.com', 'maybe', 'bagus'),
(3, 'Aristo', 'ato@gmail.com', 'no', 'bagus webnya'),
(4, 'LALALA', 'lalala@gmail.com', 'yes', 'Bagus banget webnya'),
(5, 'tes', 'tes@gmail.com', 'yes', 'tes tes tes'),
(6, 'Dave', 'dave@yahoo.com', 'yes', 'apa pun'),
(7, 'Aristo', 'ato@gmail.com', 'yes', 'tes comment web'),
(8, 'Aristo', 'ato@gmail.com', 'yes', 'tes comment web'),
(9, 'Aristo', 'ato@gmail.com', 'yes', 'tes comment 2'),
(10, 'Katty Perry', 'lalala@gmail.com', 'yes', 'tes comment 3'),
(11, 'Katty Perry', 'ato@gmail.com', 'yes', 'tes comment 4'),
(12, 'Popol', 'pop@gmail.com', 'yes', 'tes comment 6'),
(13, 'Dave', 'daveNathan@gmail.com', 'yes', 'tes comment 7');

-- --------------------------------------------------------

--
-- Table structure for table `hero`
--

CREATE TABLE `hero` (
  `no` int(11) NOT NULL,
  `name` char(30) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `class` varchar(30) DEFAULT NULL,
  `weapon_name` varchar(30) DEFAULT NULL,
  `weapon_pic` varchar(255) DEFAULT NULL,
  `pet_name` varchar(30) DEFAULT NULL,
  `pet_pic` varchar(255) DEFAULT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hero`
--

INSERT INTO `hero` (`no`, `name`, `username`, `class`, `weapon_name`, `weapon_pic`, `pet_name`, `pet_pic`, `picture`) VALUES
(1, 'Popol', 'Timothyray_', 'Marksman', 'Spear', 'Upload/weapon/spear.png', 'Kupa', 'Upload/pet/kupa.jpeg', 'Upload/character/popol.jpg'),
(2, 'Zhask', 'Timothyray_', 'Mage', 'Magic Wand', 'Upload/weapon/MagicWand.png', 'Nightmaric', 'Upload/pet/nightmaric.jpeg', 'Upload/character/zhask.jpeg'),
(3, 'TimothyGanteng', 'Dave', 'Support', 'Shutdown System', 'Upload/weapon/Button.jpg', 'Mino', 'Upload/pet/Mino.jpg', 'Upload/character/photo-02.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountlist`
--
ALTER TABLE `accountlist`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `commentlist`
--
ALTER TABLE `commentlist`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `hero`
--
ALTER TABLE `hero`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accountlist`
--
ALTER TABLE `accountlist`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `commentlist`
--
ALTER TABLE `commentlist`
  MODIFY `no` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `hero`
--
ALTER TABLE `hero`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
