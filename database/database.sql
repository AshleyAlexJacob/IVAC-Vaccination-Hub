-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2021 at 09:52 PM
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
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `username`, `password`) VALUES
(2, 'admin', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `employeedetails`
--

CREATE TABLE `employeedetails` (
  `ID` int(255) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `psw` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `sex` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `haddress` varchar(255) NOT NULL,
  `city` varchar(50) NOT NULL,
  `hstate` varchar(50) NOT NULL,
  `pincode` int(6) NOT NULL,
  `cnic` varchar(13) NOT NULL,
  `location` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employeedetails`
--

INSERT INTO `employeedetails` (`ID`, `uname`, `psw`, `fname`, `mname`, `lname`, `sex`, `email`, `mobile`, `haddress`, `city`, `hstate`, `pincode`, `cnic`, `location`) VALUES
(1, 'employee', 'password', 'Demo', 'For', 'Test', 'other', 'demo@demo.com', '9876543210', 'Demo Address', 'Demo City', 'Demo State', 123456, '1730111111111', 'JB-Abt'),
(7, 'kth', 'kth', 'Ali', 'Ahmed', 'Sajjad`', 'male', 'ali@gmail.com', '0333633636', 'Peshawar Pakistan', 'Peshawar', 'Pakistan', 25000, '1730153732648', 'KTH-Pesh');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `name` longtext DEFAULT NULL,
  `shortname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `name`, `shortname`) VALUES
(1, 'Jallal Baba Auditorium, Abottabad', 'JB-Abt'),
(2, 'Nishtar Hall, Peshawar', 'NH-Pesh'),
(3, 'Khyber Teaching Hospital, Peshawar', 'KTH-Pesh');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `ID` int(255) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `haddress` varchar(255) NOT NULL,
  `city` varchar(50) NOT NULL,
  `hstate` varchar(50) NOT NULL,
  `pincode` int(6) NOT NULL,
  `dob` date NOT NULL,
  `dov` date NOT NULL,
  `bg` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'scheduled',
  `cnic` varchar(13) DEFAULT NULL,
  `location` varchar(30) NOT NULL,
  `vaccine` varchar(50) DEFAULT NULL,
  `doneDoses` int(11) DEFAULT 0,
  `doses` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`ID`, `fname`, `mname`, `lname`, `sex`, `email`, `mobile`, `haddress`, `city`, `hstate`, `pincode`, `dob`, `dov`, `bg`, `status`, `cnic`, `location`, `vaccine`, `doneDoses`, `doses`) VALUES
(17, 'Ashley', 'Alex', 'Jacob', 'male', 'alexjacob260@gmail.com', '03005864372', 'H.no.2, St#1,Zulfiqar Town1,Gulberg', 'Peshawar', 'KPK', 25000, '2021-08-18', '2021-08-13', 'A+', 'rejected', '1730146644587', 'JB-Abt', NULL, NULL, NULL),
(18, 'AR', 'Khan', 'Khan', 'male', 'ashkhan@gmail.com', '03008591040', 'H.no.2, Jacob House,St#1, Zulfiqar Town No.1, Gulberg No.3.', 'Peshawar', 'North-West Frontier', 25000, '2021-08-19', '2021-08-07', '0+', 'rejected', ' 173011426067', 'JB-Abt', NULL, NULL, NULL),
(19, 'AB', 'Z', 'AB', 'male', 'abc@yahoo.com', '03255864372', 'Peshawar', 'Peshawar', 'North-West Frontier', 25000, '2021-08-20', '2021-08-13', '0+', 'vacinated', '1730146644565', 'JB-Abt', 'Sinovac', 2, 2),
(20, 'demo', '', 'khan', 'male', 'demokhan@gmail.com', '03189753245', 'Peshawar', 'Peshawar', 'KPK', 25000, '2021-08-18', '2021-08-25', '0+', 'scheduled', '1730146644588', 'JB-Abt', NULL, NULL, NULL),
(21, 'Abdul ', 'Mohiz', 'Khalid', 'male', 'abdulmohizkhalid@gmail.com', '03175534345', 'Peshawar', 'Peshawar', 'Peshawar', 25000, '2000-07-14', '2021-08-10', 'A+', 'p-vacinated', '1310102629771', 'JB-Abt', 'Astra Zeneca', 1, 2),
(22, 'abc', 'khan', 'khan', 'male', 'abckhan@testing.com', '03005864372', 'H.no.2, St#1,Zulfiqar Town1,Gulberg', 'Peshawar', 'KPK', 25000, '2000-01-01', '2021-08-17', 'A+', 'rejected', '1730146644589', 'JB-Abt', NULL, NULL, NULL),
(23, 'Abdul ', 'Rehman', '.', 'male', 'arehman98bhai@gmail.com', '03336336366', 'Peshawar Pakistan', 'Peshawar', 'Pakistan', 25000, '2021-08-04', '2021-08-12', 'B+', 'rejected', '1730153732645', 'JB-Abt', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vaccine`
--

CREATE TABLE `vaccine` (
  `id` int(11) NOT NULL,
  `vName` varchar(50) DEFAULT NULL,
  `doses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vaccine`
--

INSERT INTO `vaccine` (`id`, `vName`, `doses`) VALUES
(1, 'Astra Zeneca', 2),
(2, 'Sputnik', 1),
(3, 'Cansino', 1),
(4, 'Sinovac', 2),
(5, 'Phizer', 2),
(6, 'Cynopharm', 2),
(7, 'Moderna', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `employeedetails`
--
ALTER TABLE `employeedetails`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `vaccine`
--
ALTER TABLE `vaccine`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employeedetails`
--
ALTER TABLE `employeedetails`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `vaccine`
--
ALTER TABLE `vaccine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
