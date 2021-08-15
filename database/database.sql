-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2021 at 06:03 PM
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

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `pVacinatedPerson` (`c_id` INT(11))  begin
select * from person
where status='p-vacinated'
and center_id=c_id;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `rejectedPerson` (`c_id` INT(11))  begin
select * from person
where status='rejected'
and center_id=c_id;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `scheduledPerson` (`c_id` INT(11))  begin 
select * from person
where status = "scheduled"
and center_id=c_id;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `vacinatedPerson` (`c_id` INT(11))  begin
select * from person
where status='vacinated'
and center_id=c_id;
end$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `noDoses` (`id` INT(11)) RETURNS INT(11) begin
declare retVal int(11) default 0;
select doses into retVal from vaccine where v_id = id;

return retVal;
end$$

DELIMITER ;

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
-- Table structure for table `center`
--

CREATE TABLE `center` (
  `center_id` int(11) NOT NULL,
  `name` longtext DEFAULT NULL,
  `shortname` varchar(30) NOT NULL,
  `area` varchar(30) DEFAULT NULL,
  `queueList` bigint(20) DEFAULT 0,
  `city` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `center`
--

INSERT INTO `center` (`center_id`, `name`, `shortname`, `area`, `queueList`, `city`) VALUES
(1, 'Jallal Baba Auditorium, Abottabad', 'JB-Abt', 'Abottabad', 100, 'Abottabad'),
(2, 'Nishtar Hall, Peshawar', 'NH-Pesh', 'Saddar', 100, 'Peshawar'),
(3, 'Khyber Teaching Hospital, Peshawar', 'KTH-Pesh', 'University Road', 200, 'Peshawar'),
(4, 'Lady Reading Hospital, Peshawar', 'LRH-Pesh', 'Internal City', 300, 'Peshawar');

-- --------------------------------------------------------

--
-- Table structure for table `paramedics`
--

CREATE TABLE `paramedics` (
  `para_id` int(11) NOT NULL,
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
  `center_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paramedics`
--

INSERT INTO `paramedics` (`para_id`, `uname`, `psw`, `fname`, `mname`, `lname`, `sex`, `email`, `mobile`, `haddress`, `city`, `hstate`, `pincode`, `cnic`, `center_id`) VALUES
(1, 'employee', 'password', 'Demo', 'For', 'Test', 'other', 'demo@demo.com', '9876543210', 'Demo Address', 'Demo City', 'Demo State', 123456, '1730111111111', 1),
(3, 'AR', 'admin', 'AR', 'Azad', 'Khan', 'male', 'arkhan@ymail.com', '0300586437', 'xxxxxxx', 'xxxxx', 'xxxx', 0, '17301xxxxx', 2);

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
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
  `doneDoses` int(11) DEFAULT 0,
  `doses` int(11) DEFAULT NULL,
  `center_id` int(11) DEFAULT NULL,
  `v_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`ID`, `fname`, `mname`, `lname`, `sex`, `email`, `mobile`, `haddress`, `city`, `hstate`, `pincode`, `dob`, `dov`, `bg`, `status`, `cnic`, `doneDoses`, `doses`, `center_id`, `v_id`) VALUES
(17, 'Ashley', 'Alex', 'Jacob', 'male', 'alexjacob260@gmail.com', '03005864372', 'H.no.2, St#1,Zulfiqar Town1,Gulberg', 'Peshawar', 'KPK', 25000, '2021-08-18', '2021-08-13', 'A+', 'rejected', '1730146644587', NULL, NULL, 2, NULL),
(18, 'AR', 'Khan', 'Khan', 'male', 'ashkhan@gmail.com', '03008591040', 'H.no.2, Jacob House,St#1, Zulfiqar Town No.1, Gulberg No.3.', 'Peshawar', 'North-West Frontier', 25000, '2021-08-19', '2021-08-07', '0+', 'rejected', ' 173011426067', NULL, NULL, 2, NULL),
(19, 'AB', 'Z', 'AB', 'male', 'abc@yahoo.com', '03255864372', 'Peshawar', 'Peshawar', 'North-West Frontier', 25000, '2021-08-20', '2021-08-13', '0+', 'vacinated', '1730146644565', 2, 2, 2, NULL),
(20, 'demo', '', 'khan', 'male', 'demokhan@gmail.com', '03189753245', 'Peshawar', 'Peshawar', 'KPK', 25000, '2021-08-18', '2021-08-25', '0+', 'p-vacinated', '1730146644588', 1, 2, 1, 4),
(21, 'Abdul ', 'Mohiz', 'Khalid', 'male', 'abdulmohizkhalid@gmail.com', '03175534345', 'Peshawar', 'Peshawar', 'Peshawar', 25000, '2000-07-14', '2021-08-10', 'A+', 'p-vacinated', '1310102629771', 1, 2, 1, NULL),
(22, 'abc', 'khan', 'khan', 'male', 'abckhan@testing.com', '03005864372', 'H.no.2, St#1,Zulfiqar Town1,Gulberg', 'Peshawar', 'KPK', 25000, '2000-01-01', '2021-08-17', 'A+', 'rejected', '1730146644589', NULL, NULL, 1, NULL),
(23, 'asd', 'asd', 'asd', 'male', 'asd@asd.com', '03336336366', 'asd', 'asd', 'asd', 123, '1111-11-11', '1111-11-11', 'B+', 'scheduled', '123', 0, NULL, 2, NULL),
(24, 'Abdul ', 'Rehman', 'asd', 'male', 'arehman98bhai@gmail.com', '0333633636', 'asd123', 'asd', 'Pakistan', 123, '0111-01-01', '1111-11-11', 'B+', 'p-vacinated', '111', 1, 2, 1, 5),
(25, 'raja', 'ahmed', 'sajjad', 'male', 'ahmed@gmail.com', '03336336366', 'Peshawar Pakistan', 'Peshawar', 'Pakistan', 25000, '1998-08-18', '2021-08-19', 'B+', 'scheduled', '1730146644587', 0, NULL, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `storage`
--

CREATE TABLE `storage` (
  `center_id` int(11) NOT NULL,
  `v_id` int(11) NOT NULL,
  `amount` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `storage`
--

INSERT INTO `storage` (`center_id`, `v_id`, `amount`) VALUES
(1, 1, 50000),
(1, 2, 50000),
(1, 3, 50000),
(1, 4, 50000),
(1, 5, 10000),
(1, 6, 500),
(1, 7, 500000),
(2, 1, 0),
(2, 2, 100),
(2, 3, 100),
(2, 4, 10000),
(2, 5, 10000),
(2, 6, 10000),
(2, 7, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `vaccine`
--

CREATE TABLE `vaccine` (
  `v_id` int(11) NOT NULL,
  `vName` varchar(50) DEFAULT NULL,
  `doses` int(11) NOT NULL,
  `inter` int(11) DEFAULT 0,
  `info` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vaccine`
--

INSERT INTO `vaccine` (`v_id`, `vName`, `doses`, `inter`, `info`) VALUES
(1, 'Astra Zeneca', 2, 0, NULL),
(2, 'Sputnik', 1, 0, NULL),
(3, 'Cansino', 1, 0, NULL),
(4, 'Sinovac', 2, 0, NULL),
(5, 'Phizer', 2, 0, NULL),
(6, 'Cynopharm', 2, 0, NULL),
(7, 'Moderna', 2, 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `center`
--
ALTER TABLE `center`
  ADD PRIMARY KEY (`center_id`);

--
-- Indexes for table `paramedics`
--
ALTER TABLE `paramedics`
  ADD PRIMARY KEY (`para_id`),
  ADD KEY `center_id` (`center_id`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `center_id` (`center_id`),
  ADD KEY `v_id` (`v_id`);

--
-- Indexes for table `storage`
--
ALTER TABLE `storage`
  ADD PRIMARY KEY (`center_id`,`v_id`),
  ADD KEY `v_id` (`v_id`);

--
-- Indexes for table `vaccine`
--
ALTER TABLE `vaccine`
  ADD PRIMARY KEY (`v_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `center`
--
ALTER TABLE `center`
  MODIFY `center_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `vaccine`
--
ALTER TABLE `vaccine`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `paramedics`
--
ALTER TABLE `paramedics`
  ADD CONSTRAINT `paramedics_ibfk_1` FOREIGN KEY (`center_id`) REFERENCES `center` (`center_id`);

--
-- Constraints for table `person`
--
ALTER TABLE `person`
  ADD CONSTRAINT `person_ibfk_1` FOREIGN KEY (`center_id`) REFERENCES `center` (`center_id`),
  ADD CONSTRAINT `person_ibfk_2` FOREIGN KEY (`v_id`) REFERENCES `vaccine` (`v_id`);

--
-- Constraints for table `storage`
--
ALTER TABLE `storage`
  ADD CONSTRAINT `storage_ibfk_1` FOREIGN KEY (`center_id`) REFERENCES `center` (`center_id`),
  ADD CONSTRAINT `storage_ibfk_2` FOREIGN KEY (`v_id`) REFERENCES `vaccine` (`v_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
