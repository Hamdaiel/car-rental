-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 14, 2019 at 07:42 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(2, 'admin1', '25d55ad283aa400af464c76d713c07ad', '2019-07-12 05:00:38');

-- --------------------------------------------------------

--
-- Table structure for table `tblbooking`
--

DROP TABLE IF EXISTS `tblbooking`;
CREATE TABLE IF NOT EXISTS `tblbooking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userEmail` varchar(100) DEFAULT NULL,
  `VehicleId` int(11) DEFAULT NULL,
  `FromDate` varchar(20) DEFAULT NULL,
  `ToDate` varchar(20) DEFAULT NULL,
  `paymid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbooking`
--

INSERT INTO `tblbooking` (`id`, `userEmail`, `VehicleId`, `FromDate`, `ToDate`, `paymid`) VALUES
(28, 'testtestcom', 1, '2018-06-20', '1', NULL),
(29, 'michael@gmail.com', 3, '2018-06-21', '3', NULL),
(30, 'michael@gmail.com', 3, '2018-06-21', '3', NULL),
(31, 'michael@gmail.com', 6, '2018-06-21', '6', NULL),
(32, 'michael@gmail.com', 4, '2018-06-22', '4', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblpayment`
--

DROP TABLE IF EXISTS `tblpayment`;
CREATE TABLE IF NOT EXISTS `tblpayment` (
  `PID` int(11) NOT NULL AUTO_INCREMENT,
  `AccountNum` int(11) NOT NULL,
  `TransID` varchar(11) NOT NULL,
  `Amount` float NOT NULL,
  `Dater` date NOT NULL,
  `Type` varchar(10) NOT NULL DEFAULT 'notused',
  PRIMARY KEY (`PID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblpayment`
--

INSERT INTO `tblpayment` (`PID`, `AccountNum`, `TransID`, `Amount`, `Dater`, `Type`) VALUES
(2, 123456, 'test', 500, '2018-06-21', 'used'),
(3, 123, 'free', 400, '2018-06-06', 'notused'),
(4, 123, 'free1', 400, '2018-06-06', 'notused'),
(5, 123, 'free2', 400, '2018-06-06', 'notused'),
(6, 123, 'free2', 400, '2018-06-06', 'notused'),
(7, 987, 'pap', 700, '2018-06-06', 'used'),
(8, 123456, '123456', 1000, '2018-06-06', 'notused');

-- --------------------------------------------------------

--
-- Table structure for table `tbltestimonial`
--

DROP TABLE IF EXISTS `tbltestimonial`;
CREATE TABLE IF NOT EXISTS `tbltestimonial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `UserEmail` varchar(100) NOT NULL,
  `Testimonial` mediumtext NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbltestimonial`
--

INSERT INTO `tbltestimonial` (`id`, `UserEmail`, `Testimonial`, `PostingDate`, `status`) VALUES
(1, 'test@gmail.com', 'Test Test', '2019-06-18 07:44:31', 0),
(3, 'null', 'Your website is very interesting', '2019-07-14 19:27:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

DROP TABLE IF EXISTS `tblusers`;
CREATE TABLE IF NOT EXISTS `tblusers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `FullName` varchar(120) DEFAULT NULL,
  `EmailId` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `ContactNo` char(11) DEFAULT NULL,
  `dob` varchar(100) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `City` varchar(100) DEFAULT NULL,
  `Country` varchar(100) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `IDnumber` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `FullName`, `EmailId`, `Password`, `ContactNo`, `dob`, `Address`, `City`, `Country`, `RegDate`, `IDnumber`) VALUES
(5, 'Mike', 'michael@gmail.com', '25d55ad283aa400af464c76d713c07ad', '0922468142', NULL, NULL, NULL, NULL, '2018-05-29 20:04:57', NULL),
(6, 'Selam', 'selam@gmail.com', 'hhaahhaa	', NULL, NULL, NULL, 'Addis ababa', NULL, '2018-06-21 11:57:36', NULL),
(10, 'Hamdaiel Abdurahman', 'hamdaiel@gmail.com', 'c7539fbf169e730b8d0fa0f18fe1cbff', '0911965858', '13/01/2011', '', '', '', '2019-07-13 22:35:34', NULL),
(11, 'try', 'try@gmail.com', '063651a8be3d6a010d106194e0264173', '555', '', '', '', 'oturo', '2019-07-13 22:39:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblvehicles`
--

DROP TABLE IF EXISTS `tblvehicles`;
CREATE TABLE IF NOT EXISTS `tblvehicles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `VehiclesTitle` varchar(150) DEFAULT NULL,
  `VehiclesBrand` varchar(11) DEFAULT NULL,
  `VehiclesOverview` longtext,
  `PricePerDay` int(11) DEFAULT NULL,
  `FuelType` varchar(100) DEFAULT NULL,
  `ModelYear` int(6) DEFAULT NULL,
  `SeatingCapacity` int(11) DEFAULT NULL,
  `Reserved` varchar(5) NOT NULL DEFAULT 'no',
  `Vimage1` varchar(120) DEFAULT NULL,
  `Vimage2` varchar(120) DEFAULT NULL,
  `Vimage3` varchar(120) DEFAULT NULL,
  `Vimage4` varchar(120) DEFAULT NULL,
  `Vimage5` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblvehicles`
--

INSERT INTO `tblvehicles` (`id`, `VehiclesTitle`, `VehiclesBrand`, `VehiclesOverview`, `PricePerDay`, `FuelType`, `ModelYear`, `SeatingCapacity`, `Reserved`, `Vimage1`, `Vimage2`, `Vimage3`, `Vimage4`, `Vimage5`) VALUES
(1, 'Toyota Carina', 'Toyota', 'This is a latest car ,combines style and comfort ', 500, 'Petrol', 1999, 5, 'yes', '9921b42cd9466ca831e6d314f8a26d3c--toyota-carina-hatchbacks.jpg', 'carina.jpg', 'toyota-carina-e_2626_5.jpg', 'images.jpg', 'download.jpg'),
(2, 'Toyota Vitz', 'Toyota', 'This car is good for City wide usage and is cost Efficient', 400, 'Petrol', 2009, 4, 'no', '2009-Toyota-Vitz-private-86125_1.jpg', 'BF634675_20028e.jpg', 'download (1).jpg', 'images (1).jpg', ''),
(3, 'Toyota Executive', 'Toyota', 'This car have both comfort and Luxury ', 700, 'Petrol', 2009, 4, 'yes', '1_15222258125abb52949e9aa.png', 'exe5.jpg', 'exxe4.jpg', 'images (2).jpg', ''),
(4, 'BMW E5', 'BMW', 'This car is only luxurious like Millionaire type', 900, 'Diesel', 2011, 2, 'yes', '2014-bmw-m5-m6-with-competition-package-first-drive-review-car-and-driver-photo-540941-s-original.jpg', '2014-bmw-m5-m6-with-competition-package-first-drive-review-car-and-driver-photo-540941-s-original.jpg', '2014-bmw-m5-m6-with-competition-package-first-drive-review-car-and-driver-photo-540941-s-original.jpg', '2014-bmw-m5-m6-with-competition-package-first-drive-review-car-and-driver-photo-540941-s-original.jpg', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
