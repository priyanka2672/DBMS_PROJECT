-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2021 at 11:31 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `art_gallery`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `customsearch` (IN `NAME` VARCHAR(10))  BEGIN
DECLARE res INT(5);
SELECT `Artist_ID` INTO res FROM `artist` WHERE `Artist_fname` =NAME;
SELECT * FROM customview WHERE `Artist_ID`= res;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eventsearch` (IN `ID` VARCHAR(5))  SELECT * FROM eventview WHERE Event_ID=ID$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_ID` varchar(10) NOT NULL,
  `Admin_pass` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_ID`, `Admin_pass`) VALUES
('accountant', '1234'),
('JAINA2001', '1234'),
('priyanka26', '1234'),
('shashwatha', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `Article_ID` int(5) NOT NULL,
  `Artist_ID` int(5) DEFAULT NULL,
  `Event_ID` int(5) DEFAULT NULL,
  `Article_style` varchar(25) NOT NULL,
  `Article_title` varchar(20) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Date_Arrival` date NOT NULL,
  `sold` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`Article_ID`, `Artist_ID`, `Event_ID`, `Article_style`, `Article_title`, `Price`, `Date_Arrival`, `sold`) VALUES
(401, 1201, 101, 'Sculptures', 'Handmade Cups', '500.00', '2019-02-04', 1),
(402, 1202, 101, 'Painting', 'The Unknown', '2000.00', '2018-04-03', 1),
(404, 1204, 102, 'Sculptures', 'The Buddha', '1400.00', '2020-07-01', 1),
(405, 1205, 102, 'Painting', 'Mist of Colour', '10000.00', '2021-04-21', 0),
(407, 1206, 102, 'Sketching', 'The Eternal Bond ', '5900.00', '2021-04-24', 0);

--
-- Triggers `article`
--
DELIMITER $$
CREATE TRIGGER `deletelogart` AFTER DELETE ON `article` FOR EACH ROW INSERT INTO `logs` VALUES('Article',OLD.Article_ID,'Deleted',NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insertlogART` AFTER INSERT ON `article` FOR EACH ROW INSERT INTO `logs` VALUES('Article',NEW.Article_ID,'Inserted',NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updatelogart` AFTER UPDATE ON `article` FOR EACH ROW INSERT INTO `logs` VALUES('Article',NEW.Article_ID,'Modified',NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `Artist_ID` int(5) NOT NULL,
  `Artist_fname` varchar(50) NOT NULL,
  `Artist_lname` varchar(50) NOT NULL,
  `Article_style` varchar(25) NOT NULL,
  `Phone` int(10) NOT NULL,
  `Address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`Artist_ID`, `Artist_fname`, `Artist_lname`, `Article_style`, `Phone`, `Address`) VALUES
(1201, 'Swati', 'Pasari', 'Sculptures', 1234554321, '87 , Malavia Street, Ramnagar, Kolkata'),
(1202, 'Aarti ', 'Sunder', 'Contemporary Art', 1432112345, 'Hope College Signal, Peelamedu, Coimbatore'),
(1204, 'Aman ', 'Khanna', 'Ceramics', 1144332211, 'Tughlakabad Extn, Delhi'),
(1205, 'Dheer', ' Kaku', 'Painting', 1145678996, 'Opposite Magic Italy near palolem beach resort,123-0911'),
(1206, 'Harsh', 'Kumar', 'Sketching', 1144552233, '115 , Ibrahim, Mohammed Ali Road, Nr Crawford Market, Null Bazar,New Delhi');

--
-- Triggers `artist`
--
DELIMITER $$
CREATE TRIGGER `deletelog` AFTER DELETE ON `artist` FOR EACH ROW INSERT INTO logs VALUES('artist',OLD.Artist_ID,'Deleted',NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insertlog` AFTER INSERT ON `artist` FOR EACH ROW INSERT INTO logs VALUES('artist',NEW.Artist_ID,'Inserted',NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updatelog` AFTER UPDATE ON `artist` FOR EACH ROW INSERT INTO logs VALUES('artist',NEW.Artist_ID,'Modified',NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Customer_ID` int(5) NOT NULL,
  `Customer_pass` varchar(10) NOT NULL,
  `Bill_amount` decimal(10,0) NOT NULL,
  `Phone` int(10) NOT NULL,
  `Address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Customer_ID`, `Customer_pass`, `Bill_amount`, `Phone`, `Address`) VALUES
(1101, '1234', '12', 1111222334, 'Swar Gate, Pune, 40234'),
(1102, '1234', '30', 1223334444, 'Jahangir Pura, Surat, 379065'),
(1105, '1234', '23', 1122334411, 'Meera Bagh Road, Delhi NCR, 23004'),
(1106, '1234', '10', 1342224311, 'Adilabad, Hyderabad, 34076'),
(1109, '1234', '100', 1233342111, 'Shobagpura, Udaipur, 430005'),
(1110, '1234', '90', 1199776655, '29 , Kadambari Chs, Dr Lazarus Rd, Nr Charai Single, Thane (west)');

--
-- Triggers `customer`
--
DELIMITER $$
CREATE TRIGGER `deletelogcust` AFTER DELETE ON `customer` FOR EACH ROW INSERT INTO `logs` VALUES('customer',OLD.Customer_ID,'Deleted',NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insertlogcust` AFTER INSERT ON `customer` FOR EACH ROW INSERT INTO `logs` VALUES('customer',NEW.Customer_ID,'Inserted',NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updatelogcust` AFTER UPDATE ON `customer` FOR EACH ROW INSERT INTO `logs` VALUES('customer',NEW.Customer_ID,'Modified',NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `Event_Index` int(10) NOT NULL,
  `Event_ID` int(5) NOT NULL,
  `Article_ID` int(5) NOT NULL,
  `Artist_ID` int(5) DEFAULT NULL,
  `Description` text NOT NULL,
  `Event_Date` date NOT NULL,
  `Event_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`Event_Index`, `Event_ID`, `Article_ID`, `Artist_ID`, `Description`, `Event_Date`, `Event_time`) VALUES
(1, 101, 401, 1201, 'A couple of Indian artists coming together for an exhibition and open minds about the modern and new generation art!', '2021-05-12', '10:30:00'),
(2, 101, 402, 1202, 'A couple of Indian artists coming together for an exhibition and open minds about the modern and new generation art!', '2021-05-12', '10:30:00'),
(3, 101, 404, 1204, 'A couple of Indian artists coming together for an exhibition and open minds about the modern and new generation art!', '2021-05-12', '10:30:00'),
(4, 102, 405, 1205, 'A really buzzing atmosphere with some fresh new creations and an electric mix of art work', '2021-04-14', '18:30:00'),
(5, 102, 407, 1206, 'A really buzzing atmosphere with some fresh new creations and an electric mix of art work.', '2021-04-14', '18:30:00');

--
-- Triggers `event`
--
DELIMITER $$
CREATE TRIGGER `deleteevent` AFTER DELETE ON `event` FOR EACH ROW INSERT INTO logs VALUES('Event',OLD.Event_ID,'Deleted',NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insertevent` AFTER INSERT ON `event` FOR EACH ROW INSERT INTO logs VALUES('Event',NEW.Event_ID,'Inserted',NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updateevent` AFTER UPDATE ON `event` FOR EACH ROW INSERT INTO logs VALUES('Event',NEW.Event_ID,'Modified',NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `Table_Name` varchar(20) NOT NULL,
  `ID` varchar(5) NOT NULL,
  `Action` varchar(20) NOT NULL,
  `Date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_ID`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`Article_ID`),
  ADD KEY `artist` (`Artist_ID`);

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`Artist_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Customer_ID`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`Event_Index`),
  ADD KEY `article` (`Article_ID`),
  ADD KEY `fa` (`Artist_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `Article_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=910;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Customer_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6779;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `Event_Index` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `artist` FOREIGN KEY (`Artist_ID`) REFERENCES `artist` (`Artist_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `article` FOREIGN KEY (`Article_ID`) REFERENCES `article` (`Article_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fa` FOREIGN KEY (`Artist_ID`) REFERENCES `artist` (`Artist_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
