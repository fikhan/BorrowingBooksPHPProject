-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2020 at 12:13 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `borrow`
--

-- --------------------------------------------------------

--
-- Table structure for table `borrowing`
--

CREATE TABLE `borrowing` (
  `borrowid` int(11) NOT NULL,
  `Borrowername` varchar(500) NOT NULL,
  `bookname` varchar(500) NOT NULL,
  `bookID` varchar(500) NOT NULL,
  `BorrowingDate` date NOT NULL,
  `ReturningDate` date NOT NULL,
  `quantitiyborrowed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `borrowing`
--

INSERT INTO `borrowing` (`borrowid`, `Borrowername`, `bookname`, `bookID`, `BorrowingDate`, `ReturningDate`, `quantitiyborrowed`) VALUES
(2, 'faraz', 'Text1', 'IT001', '2020-12-01', '2020-12-11', 0),
(3, 'faraz1', 'Text1', 'IT001', '2020-12-01', '2020-12-11', 0),
(4, 'faraz', 'Text1', 'IT001', '2020-11-30', '2020-11-26', 0),
(5, 'faraz', 'Text1', 'IT002', '2020-11-25', '2020-12-05', 0),
(6, 'faraz', 'Text1', 'IT003', '2020-11-29', '2020-12-11', 0),
(7, 'faraz', 'Text1', 'IT003', '2020-11-29', '2020-12-11', 0),
(8, 'faraz', 'Text1', 'IT003', '2020-11-29', '2020-12-11', 0),
(9, 'faraz', 'Text1', 'IT003', '2020-11-29', '2020-12-11', 0),
(10, 'faraz', 'Text1', 'IT004', '2020-11-22', '2020-12-04', 0),
(11, 'faraz', 'Text1', 'IT004', '2020-11-22', '2020-12-04', 0),
(12, 'faraz', 'Text1', 'IT004', '2020-11-22', '2020-12-04', 0),
(13, 'faraz', 'Text1', 'IT004', '2020-11-29', '2020-12-09', 2),
(14, 'faraz', 'Text1', 'IT004', '2020-11-29', '2020-12-09', 1),
(15, 'faraz', 'Text1', 'IT005', '2020-12-08', '2020-12-10', 10),
(16, 'faraz', 'Text1', 'IT005', '2020-12-08', '2020-12-10', 10);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `itemname` varchar(100) NOT NULL,
  `itemid` varchar(100) NOT NULL,
  `borrowingprice` varchar(100) NOT NULL,
  `itemcategory` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `itemstatus` varchar(100) NOT NULL,
  `authorname` varchar(100) NOT NULL,
  `publication` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`itemname`, `itemid`, `borrowingprice`, `itemcategory`, `quantity`, `itemstatus`, `authorname`, `publication`) VALUES
('faraz', 'IT001', '56', 'Text1', 0, 'Pending', 'Faraz', 'Publication'),
('faraz2', 'IT001', '56', 'Text1', 0, 'Pending', 'Faraz', 'Publication'),
('faraz3', 'IT001', '56', 'Text1', 0, 'Pending', 'Faraz', 'Publication'),
('faraz1222', 'IT002', '100', 'Text1', 4, 'Available', 'Faraz', 'Publication'),
('faraz', 'IT003', '445', 'Text1', 3, 'Unavailable', 'Faraz', 'Publication'),
('faraz', 'IT004', '140', 'Text1', 1, 'Available', 'Faraz', 'Publication'),
('faraz', 'IT005', '150', 'Text1', 69, 'Available', 'Faraz', 'Publication');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `borrowing`
--
ALTER TABLE `borrowing`
  ADD PRIMARY KEY (`borrowid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `borrowing`
--
ALTER TABLE `borrowing`
  MODIFY `borrowid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
