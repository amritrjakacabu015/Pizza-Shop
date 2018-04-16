-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 16, 2018 at 04:48 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `swe6623db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admintable`
--

DROP TABLE IF EXISTS `admintable`;
CREATE TABLE IF NOT EXISTS `admintable` (
  `idNumber` int(10) NOT NULL,
  `aUsername` varchar(20) NOT NULL,
  `aPassword` varchar(150) NOT NULL,
  `phNumber` bigint(10) NOT NULL,
  `fName` varchar(32) NOT NULL,
  `lName` varchar(32) NOT NULL,
  `designation` varchar(30) NOT NULL,
  PRIMARY KEY (`idNumber`),
  UNIQUE KEY `idNumber` (`idNumber`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admintable`
--

INSERT INTO `admintable` (`idNumber`, `aUsername`, `aPassword`, `phNumber`, `fName`, `lName`, `designation`) VALUES
(1199100001, 'amritraj', '7815696ecbf1c96e6894b779456d330e', 4057685978, 'Amritraj', 'LNU', 'Website Administrator'),
(1234500001, 'paulh', '5f039b4ef0058a1d652f13d612375a5b', 6547893210, 'Paul', 'Hilier', 'Restaurant Manager');

-- --------------------------------------------------------

--
-- Table structure for table `offerstable`
--

DROP TABLE IF EXISTS `offerstable`;
CREATE TABLE IF NOT EXISTS `offerstable` (
  `offerNo` int(5) NOT NULL,
  `offerHead` text NOT NULL,
  `offerDesc` text NOT NULL,
  PRIMARY KEY (`offerNo`),
  UNIQUE KEY `offerNo` (`offerNo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offerstable`
--

INSERT INTO `offerstable` (`offerNo`, `offerHead`, `offerDesc`) VALUES
(1, 'WELCOME OFFER!', 'NOW AS A WELCOME OFFER, NEW CUSTOMERS WILL GET 50% OFF ON THEIR FIRST ORDER WHEN THEY PAY WITH CASH.'),
(2, 'OFFER 2', 'NOW GET 2$ OFF ON PEPPERONI PIZZAS WHEN YOU PAY WITH CASH.');

-- --------------------------------------------------------

--
-- Table structure for table `orderhistory`
--

DROP TABLE IF EXISTS `orderhistory`;
CREATE TABLE IF NOT EXISTS `orderhistory` (
  `orderID` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `username` varchar(32) NOT NULL,
  `pName` varchar(20) NOT NULL,
  `pSize` varchar(15) NOT NULL,
  `pQuantity` int(10) NOT NULL,
  `eCheeze` varchar(5) NOT NULL,
  `pTopping` varchar(15) NOT NULL,
  `pCrust` varchar(15) NOT NULL,
  `paymentType` varchar(20) NOT NULL,
  `totalPayment` float NOT NULL,
  `orderType` varchar(10) NOT NULL,
  `orderStatus` varchar(30) NOT NULL,
  PRIMARY KEY (`orderID`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderhistory`
--

INSERT INTO `orderhistory` (`orderID`, `date`, `username`, `pName`, `pSize`, `pQuantity`, `eCheeze`, `pTopping`, `pCrust`, `paymentType`, `totalPayment`, `orderType`, `orderStatus`) VALUES
(1, '2017-11-15 18:56:15', 'amritraj', 'Pepperoni Pizza', 'Small', 1, 'No', 'Mushrooms', 'Thin Crust', 'E-Check', 5.99, 'Delivery', 'Complete'),
(2, '2017-11-15 23:58:09', 'amritraj', 'Pizza Margherita', 'Large', 4, 'Yes', 'Mushrooms', 'Thin Crust', 'E-Check', 45.96, 'Pick-Up', 'Complete'),
(3, '2017-11-14 05:58:57', 'paulh', 'Neapolitan pizza', 'Small', 3, 'No', 'Mushrooms', 'Thin Crust', 'Credit/Debit Card', 20.97, 'Pick-Up', 'Complete'),
(4, '2017-11-15 01:16:17', 'amritraj', 'Pepperoni Pizza', 'Small', 1, 'No', 'Mushrooms', 'Thin Crust', 'E-Check', 5.99, 'Pick-Up', 'Complete'),
(5, '2017-11-15 01:17:10', 'amritraj', 'New York-style pizza', 'Small', 1, 'No', 'Mushrooms', 'Thin Crust', 'E-Check', 6.99, 'Pick-Up', 'Cooking'),
(6, '2017-11-15 01:19:01', 'paulh', 'Pizza marinara', 'Small', 2, 'No', 'Mushrooms', 'Thin Crust', 'Credit/Debit Card', 17.98, 'Pick-Up', 'Ready for Pick-Up'),
(7, '2017-11-15 23:56:16', 'amritraj', 'Pizza marinara', 'Small', 1, 'No', 'Mushrooms', 'Thin Crust', 'E-Check', 8.99, 'Delivery', 'Pending'),
(8, '2017-11-15 23:56:16', 'amritraj', 'Neapolitan pizza', 'Medium', 5, 'Yes', 'Black Olives', 'Thin Crust', 'E-Check', 47.45, 'Delivery', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `pizzatable`
--

DROP TABLE IF EXISTS `pizzatable`;
CREATE TABLE IF NOT EXISTS `pizzatable` (
  `username` varchar(50) NOT NULL,
  `pName` varchar(20) NOT NULL,
  `pQuantity` int(10) NOT NULL,
  `pSize` varchar(15) NOT NULL,
  `eCheeze` varchar(5) NOT NULL,
  `pTopping` varchar(20) NOT NULL,
  `pCrust` varchar(15) NOT NULL,
  `cost` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userstable`
--

DROP TABLE IF EXISTS `userstable`;
CREATE TABLE IF NOT EXISTS `userstable` (
  `phoneNumber` bigint(20) NOT NULL,
  `firstName` varchar(32) NOT NULL,
  `lastName` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(150) NOT NULL,
  `address1` varchar(100) NOT NULL,
  `address2` varchar(100) NOT NULL,
  `paymentType` varchar(20) DEFAULT NULL,
  `paymentInfo` int(32) DEFAULT NULL,
  PRIMARY KEY (`phoneNumber`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userstable`
--

INSERT INTO `userstable` (`phoneNumber`, `firstName`, `lastName`, `username`, `password`, `address1`, `address2`, `paymentType`, `paymentInfo`) VALUES
(9876543210, 'Amritraj', 'LNU', 'amritraj', '7815696ecbf1c96e6894b779456d330e', 'xyz street 2', 'Apt - 100', 'E-Check', 0),
(1234567890, 'Paul', 'Hilier', 'paulh', '5f039b4ef0058a1d652f13d612375a5b', 'xyz 1234', 'Apt - 454', 'Credit/Debit Card', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
