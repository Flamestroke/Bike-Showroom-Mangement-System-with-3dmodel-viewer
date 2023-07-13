-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 27, 2023 at 03:51 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bike_showroom`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `ViewBookings` ()   BEGIN
SELECT * FROM `bookings`;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_username` varchar(20) NOT NULL,
  `f_name` varchar(20) DEFAULT NULL,
  `l_name` varchar(20) DEFAULT NULL,
  `a_phone` bigint(12) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `a_dob` date DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_username`, `f_name`, `l_name`, `a_phone`, `email`, `a_dob`, `password`) VALUES
('admin', NULL, NULL, NULL, NULL, NULL, '54545');

-- --------------------------------------------------------

--
-- Table structure for table `bikes`
--

CREATE TABLE `bikes` (
  `bike_photo` varchar(200) DEFAULT NULL,
  `bike_no` int(20) NOT NULL,
  `type` varchar(20) DEFAULT NULL,
  `bike_name` varchar(20) DEFAULT NULL,
  `availability` varchar(20) DEFAULT NULL,
  `company` varchar(20) DEFAULT NULL,
  `price` int(20) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `bike_model` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bikes`
--

INSERT INTO `bikes` (`bike_photo`, `bike_no`, `type`, `bike_name`, `availability`, `company`, `price`, `description`, `bike_model`) VALUES
('panigale.png', 58935, 'Sports', 'Panigale SprLeggera', 'Yes', 'Ducati', 11300000, '', NULL),
('panigale_v4.png', 58936, 'Sports', 'Panigale V4', 'Yes', 'Ducati', 5800000, '', NULL),
('Z1000.jpg', 78951, 'Sports', 'Z1000', 'Out-of-Stock', 'Kawasaki', 1500000, NULL, NULL),
('ER-6n.jpg', 78952, 'Sports', 'ER-6N', 'Yes', 'Kawasaki', 490000, NULL, NULL),
('r3.png', 89632, 'Sports', 'YZF-R3', 'Yes', 'Yamaha', 370000, '', ''),
('r1m.jpg', 89633, 'Sports', 'R1M', 'Yes', 'Yamaha', 2943000, NULL, NULL),
('iron883.jpeg', 111125, 'Cruiser', 'Iron-883', 'Yes', 'Harley-Davidson', 1200000, NULL, NULL),
('xr1200x.jpg', 111126, 'Cruiser', 'XR1200X', 'Out-of-Stock', 'Harley-Davidson', 1100000, NULL, NULL),
('bullet.jpg', 324567, 'Adventure', 'Bullet', 'Yes', 'Royal enfield', 161000, '', NULL);

--
-- Triggers `bikes`
--
DELIMITER $$
CREATE TRIGGER `add_bike` AFTER INSERT ON `bikes` FOR EACH ROW UPDATE company 
SET no_of_bikes =no_of_bikes+1
WHERE cmp_name = new.company
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `remove_bike` AFTER DELETE ON `bikes` FOR EACH ROW UPDATE company 
SET no_of_bikes = no_of_bikes-1
WHERE cmp_name = old.company
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `bike_photo` varchar(200) DEFAULT NULL,
  `c_username` varchar(20) DEFAULT NULL,
  `booking_id` varchar(20) NOT NULL,
  `bike_no` int(11) DEFAULT NULL,
  `bike_name` varchar(20) DEFAULT NULL,
  `final_price` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `cmp_logo` varchar(200) DEFAULT NULL,
  `cmp_name` varchar(20) NOT NULL,
  `cmp_website` varchar(100) DEFAULT NULL,
  `no_of_bikes` int(200) DEFAULT 0,
  `cmp_address` varchar(200) DEFAULT NULL,
  `cmp_desc` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`cmp_logo`, `cmp_name`, `cmp_website`, `no_of_bikes`, `cmp_address`, `cmp_desc`) VALUES
('DUCATII.jpg', 'Ducati', 'https://www.ducati.com/in/en/home', 2, '', 'Ducati is a group of companies, best known for manufacturing motorcycles and headquartered in Borgo Panigale, Bologna, Italy. The group is owned by German automotive manufacturer Audi through its Italian subsidiary Lamborghini, which is in turn owned by the Volkswagen Group.'),
('harley.jpg', 'Harley-Davidson', NULL, 2, NULL, 'Harley-Davidson, Inc. (H-D, or simply Harley) is an American motorcycle manufacturer headquartered in Milwaukee, Wisconsin, United States. Founded in 1903, it is one of two major American motorcycle manufacturers to survive the Great Depression along with its historical rival, Indian Motorcycles.'),
('KAWASAKI.jpg', 'Kawasaki', NULL, 2, NULL, 'Kawasaki Aircraft initially manufactured motorcycles under the Meguro name, having bought an ailing motorcycle manufacturer, Meguro Manufacturing with whom they had been in partnership. This eventually became Kawasaki Motor Sales. Some early motorcycles display an emblem with \"Kawasaki Aircraft\" on the fuel tank. '),
('RE.jpg', 'Royal Enfield', 'https://www.royalenfield.com/us/en/home/', 1, '', 'Royal Enfield is an Indian multinational motorcycle manufacturing company headquartered in Chennai, Tamil Nadu, India. The Royal Enfield brand, including its original English heritage, is the oldest global motorcycle brand in continuous production. The company operates manufacturing plants in Chennai in India.'),
('yam.jpg', 'Yamaha', NULL, 2, NULL, 'Yamaha Motor Co Ltd (Yamaha Motor) is an automobile company. The company manufactures and markets motorcycles, marine products, Robotics; Financial services; and other components.');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_username` varchar(20) NOT NULL,
  `f_name` varchar(20) DEFAULT NULL,
  `l_name` varchar(20) DEFAULT NULL,
  `c_phone` bigint(12) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `c_dob` date DEFAULT NULL,
  `c_password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_username`, `f_name`, `l_name`, `c_phone`, `email`, `c_dob`, `c_password`) VALUES
('ag420', 'A', 'G', 8424055215, 'guptearchit@gmail.com', '2002-12-03', '852852'),
('FLAME', 'Archit', 'guPTE', 8542456, 'guptearchit@gmail.com', '0000-00-00', '578694');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_username`);

--
-- Indexes for table `bikes`
--
ALTER TABLE `bikes`
  ADD PRIMARY KEY (`bike_no`),
  ADD KEY `company` (`company`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `c_username` (`c_username`),
  ADD KEY `bike_no` (`bike_no`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`cmp_name`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bikes`
--
ALTER TABLE `bikes`
  ADD CONSTRAINT `bikes_ibfk_1` FOREIGN KEY (`company`) REFERENCES `company` (`cmp_name`) ON DELETE CASCADE;

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`c_username`) REFERENCES `customer` (`c_username`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`bike_no`) REFERENCES `bikes` (`bike_no`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
