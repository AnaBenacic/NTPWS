-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 24, 2024 at 06:48 PM
-- Server version: 8.0.40-0ubuntu0.24.04.1
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projekt`
--

-- --------------------------------------------------------

--
-- Table structure for table `artworks`
--

CREATE TABLE `artworks` (
  `artwork_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `artist_name` varchar(255) NOT NULL,
  `description` text,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `artworks`
--

INSERT INTO `artworks` (`artwork_id`, `title`, `artist_name`, `description`, `image_url`) VALUES
(4, 'The Creation of Adam', 'Michelangelo', 'The Creation of Adam (Italian: Creazione di Adamo), also known as The Creation of Man, is a fresco painting by Italian artist Michelangelo, which forms part of the Sistine Chapel\'s ceiling, painted c. 1508–1512. It illustrates the Biblical creation narrative from the Book of Genesis in which God gives life to Adam, the first man. The fresco is part of a complex iconographic scheme and is chronologically the fourth in the series of panels depicting episodes from Genesis.', 'artworks/The_Creation_of_Adam.png'),
(5, 'Napoleon Crossing the Alps', 'Jacques-Louis David', 'Napoleon Crossing the Alps (also known as Napoleon at the Saint-Bernard Pass or Bonaparte Crossing the Alps; listed as Le Premier Consul franchissant les Alpes au col du Grand Saint-Bernard) is a series of five oil on canvas equestrian portraits of Napoleon Bonaparte painted by the French artist Jacques-Louis David between 1801 and 1805. Initially commissioned by the King of Spain, the composition shows a strongly idealized view of the real crossing that Napoleon and his army made along the Alps through the Great St Bernard Pass in May 1800.', 'artworks/Napoleon_Crossing_the_Alps.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artworks`
--
ALTER TABLE `artworks`
  ADD PRIMARY KEY (`artwork_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artworks`
--
ALTER TABLE `artworks`
  MODIFY `artwork_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
