-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 21, 2022 at 09:30 PM
-- Server version: 10.7.4-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `JRModEnt`
--

-- --------------------------------------------------------

--
-- Table structure for table `Header_Details`
--

CREATE TABLE `Header_Details` (
  `Header_Details_id` double NOT NULL,
  `lightBg` varchar(16) COLLATE ascii_bin DEFAULT NULL,
  `lightTextDesc` varchar(8) COLLATE ascii_bin DEFAULT NULL,
  `topLine` varchar(32) COLLATE ascii_bin DEFAULT NULL,
  `label` text COLLATE ascii_bin DEFAULT NULL,
  `title` text COLLATE ascii_bin DEFAULT NULL,
  `imgs` varchar(32) COLLATE ascii_bin DEFAULT NULL,
  `imgcount` varchar(32) COLLATE ascii_bin DEFAULT NULL,
  `imgurl` varchar(32) COLLATE ascii_bin DEFAULT NULL,
  `titleimage` varchar(64) COLLATE ascii_bin DEFAULT NULL,
  `alt` varchar(16) COLLATE ascii_bin DEFAULT NULL,
  `autoplay` varchar(8) COLLATE ascii_bin DEFAULT NULL,
  `display_type` varchar(12) COLLATE ascii_bin DEFAULT NULL,
  `user_display` varchar(16) COLLATE ascii_bin DEFAULT NULL,
  `Dummy1` varchar(32) COLLATE ascii_bin DEFAULT NULL,
  `Dummy2` varchar(32) COLLATE ascii_bin DEFAULT NULL,
  `Created_TimeStamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `Header_Details`
--

INSERT INTO `Header_Details` (`Header_Details_id`, `lightBg`, `lightTextDesc`, `topLine`, `label`, `title`, `imgs`, `imgcount`, `imgurl`, `titleimage`, `alt`, `autoplay`, `display_type`, `user_display`, `Dummy1`, `Dummy2`, `Created_TimeStamp`) VALUES
(13, 'true', 'false', 'OurWork', 'It\\\'s always good to change and keep things fresh, whether it\\\'s a Hairstyle or Cupboard.', 'Design with Your deam Wardrobe', NULL, '4', '/OurWork/', '/OurWork/1.jpg', 'Our Work', 'true', '1', 'true', '', NULL, '2022-07-04 20:41:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Header_Details`
--
ALTER TABLE `Header_Details`
  ADD PRIMARY KEY (`Header_Details_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Header_Details`
--
ALTER TABLE `Header_Details`
  MODIFY `Header_Details_id` double NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
