-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 08, 2019 at 01:55 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `multigym`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getbatch` (IN `id` INT)  SELECT * FROM Trainee WHERE Batch_id=id$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin_log`
--

CREATE TABLE `admin_log` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_log`
--

INSERT INTO `admin_log` (`username`, `password`) VALUES
('admin', 'pass');

-- --------------------------------------------------------

--
-- Table structure for table `Batch`
--

CREATE TABLE `Batch` (
  `Batch_id` int(11) NOT NULL,
  `Timing` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Batch`
--

INSERT INTO `Batch` (`Batch_id`, `Timing`) VALUES
(1, 'Morning(4AM-7AM) '),
(2, 'EVENING(4PM-7PM)'),
(3, 'NIGHT(8PM-10PM)');

-- --------------------------------------------------------

--
-- Table structure for table `Bill`
--

CREATE TABLE `Bill` (
  `Bill_id` int(11) NOT NULL,
  `Date` date NOT NULL,
  `T_id` int(11) NOT NULL,
  `Pkg_id` int(11) DEFAULT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `Pkg_id` int(11) NOT NULL,
  `Pkg_Name` varchar(255) NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`Pkg_id`, `Pkg_Name`, `Price`) VALUES
(101, 'Weight Gain', 50000),
(102, 'Abs Section', 25000),
(103, 'Body Tuning', 10000),
(104, 'Weight Loss', 30000);

-- --------------------------------------------------------

--
-- Table structure for table `Trainee`
--

CREATE TABLE `Trainee` (
  `T_id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Phone` bigint(11) NOT NULL,
  `Sex` varchar(2) NOT NULL,
  `Pkg_id` int(11) NOT NULL,
  `Trnr_id` int(11) DEFAULT NULL,
  `Batch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Trainee`
--



--
-- Triggers `Trainee`
--
DELIMITER $$
CREATE TRIGGER `trigg1` AFTER INSERT ON `Trainee` FOR EACH ROW INSERT INTO trig VALUES(null,NEW.T_id,'joined',now())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `Trainer`
--

CREATE TABLE `Trainer` (
  `Trnr_id` int(11) NOT NULL,
  `Trnr_Name` varchar(255) NOT NULL,
  `Phone` bigint(20) NOT NULL,
  `pkg_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Trainer`
--

INSERT INTO `Trainer` (`Trnr_id`, `Trnr_Name`, `Phone`, `pkg_id`) VALUES
(11, 'xxx', 32543543, 101),
(12, 'yyy', 5345345, 102),
(13, 'zzz', 45345346, 103),
(14, 'jjj', 3535345, 104);

-- --------------------------------------------------------

--
-- Table structure for table `trig`
--

CREATE TABLE `trig` (
  `id` int(11) NOT NULL,
  `T_id` int(11) NOT NULL,
  `Action` varchar(20) NOT NULL,
  `Joined_On` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trig`
--



--
-- Indexes for dumped tables
--

--
-- Indexes for table `Batch`
--
ALTER TABLE `Batch`
  ADD PRIMARY KEY (`Batch_id`);

--
-- Indexes for table `Bill`
--
ALTER TABLE `Bill`
  ADD PRIMARY KEY (`Bill_id`),
  ADD KEY `fk_pkg_id` (`Pkg_id`),
  ADD KEY `fk_tid` (`T_id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`Pkg_id`);

--
-- Indexes for table `Trainee`
--
ALTER TABLE `Trainee`
  ADD PRIMARY KEY (`T_id`),
  ADD KEY `p` (`Pkg_id`),
  ADD KEY `b` (`Batch_id`),
  ADD KEY `trnr` (`Trnr_id`);

--
-- Indexes for table `Trainer`
--
ALTER TABLE `Trainer`
  ADD PRIMARY KEY (`Trnr_id`),
  ADD KEY `fk_pkg` (`pkg_id`);

--
-- Indexes for table `trig`
--
ALTER TABLE `trig`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `trig`
--
ALTER TABLE `trig`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Bill`
--
ALTER TABLE `Bill`
  ADD CONSTRAINT `fk_pkg_id` FOREIGN KEY (`Pkg_id`) REFERENCES `package` (`Pkg_id`),
  ADD CONSTRAINT `fk_tid` FOREIGN KEY (`T_id`) REFERENCES `Trainee` (`T_id`);

--
-- Constraints for table `Trainee`
--
ALTER TABLE `Trainee`
  ADD CONSTRAINT `b` FOREIGN KEY (`Batch_id`) REFERENCES `Batch` (`Batch_id`),
  ADD CONSTRAINT `p` FOREIGN KEY (`Pkg_id`) REFERENCES `package` (`Pkg_id`),
  ADD CONSTRAINT `trnr` FOREIGN KEY (`Trnr_id`) REFERENCES `Trainer` (`Trnr_id`);

--
-- Constraints for table `Trainer`
--
ALTER TABLE `Trainer`
  ADD CONSTRAINT `fk_pkg` FOREIGN KEY (`pkg_id`) REFERENCES `package` (`Pkg_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
