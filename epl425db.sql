-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2015 at 04:52 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `epl425db`
--

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE IF NOT EXISTS `property` (
`id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `forSale` bit(1) NOT NULL,
  `bedrooms` int(2) DEFAULT NULL,
  `price` double NOT NULL,
  `city` varchar(10) NOT NULL,
  `location` varchar(50) NOT NULL,
  `img` varchar(400) NOT NULL,
  `link` varchar(400) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`id`, `type`, `forSale`, `bedrooms`, `price`, `city`, `location`, `img`, `link`) VALUES
(1, 'Apartment-Flat', b'1', 3, 395000, 'Nicosia', 'Engomi', 'http://www.ktimatagora.com/media/property-images/3_bedrooms_apartment_flat_for_sale_in_thumb_32.jpg', 'http://www.ktimatagora.com/properties-for-sale/3-bedroom-apartment-flat-for-sale-in-engomi-2'),
(2, 'Apartment-Flat', b'1', 2, 170000, 'Limassol', 'Agia Fyla', 'http://www.ktimatagora.com/media/property-images/2_bedrooms_apartment_flat_for_sale_in_engomi_thumb_45.jpg', 'http://www.ktimatagora.com/properties-for-sale/2-bedroom-apartment-flat-for-sale-in-agia-fyla');

-- --------------------------------------------------------

--
-- Table structure for table `villages`
--

CREATE TABLE IF NOT EXISTS `villages` (
  `Name` varchar(20) NOT NULL,
  `Latitude` double NOT NULL,
  `Longitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `villages`
--

INSERT INTO `villages` (`Name`, `Latitude`, `Longitude`) VALUES
('Agia Thekla', 34.9833117, 33.94072649999998),
('Agia Triada', 35.0547519, 34.0083396),
('Avgorou', 35.035556, 33.839166999999975),
('Ayia Napa', 34.9922836, 34.01401129999999),
('Deryneia', 35.0586943, 33.958278300000075),
('Kapparis', 35.1149116, 33.919245000000046),
('Paralimni', 35.033333, 33.983333000000016),
('Pernera', 35.0324053, 34.03350980000005),
('Protaras', 35.015, 34.05416700000001),
('Sotira', 35.026667, 33.950278000000026),
('Vrysoules', 35.0719751, 33.88159010000004);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `property`
--
ALTER TABLE `property`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `villages`
--
ALTER TABLE `villages`
 ADD PRIMARY KEY (`Name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
