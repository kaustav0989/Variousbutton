-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 16, 2018 at 09:17 PM
-- Server version: 5.7.22-0ubuntu0.16.04.1
-- PHP Version: 7.0.30-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Student_details`
--

-- --------------------------------------------------------

--
-- Table structure for table `Stud_table1`
--

CREATE TABLE `Stud_table1` (
  `stud_id` int(12) NOT NULL,
  `stud_fname` varchar(12) NOT NULL,
  `stud_lname` varchar(10) NOT NULL,
  `stud_class` int(4) NOT NULL,
  `stud_section` varchar(6) NOT NULL,
  `stud_roll` int(4) NOT NULL,
  `stud_age` int(4) NOT NULL,
  `stud_dob` date NOT NULL DEFAULT '2018-07-09',
  `stud_address` varchar(40) NOT NULL,
  `stud_parent` varchar(30) NOT NULL,
  `stud_guardian_type` enum('father','mother') NOT NULL DEFAULT 'father',
  `stud_guardian` varchar(40) NOT NULL,
  `stud_status` enum('active','left','TC') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Stud_table1`
--

INSERT IGNORE INTO `Stud_table1` (`stud_id`, `stud_fname`, `stud_lname`, `stud_class`, `stud_section`, `stud_roll`, `stud_age`, `stud_dob`, `stud_address`, `stud_parent`, `stud_guardian_type`, `stud_guardian`, `stud_status`) VALUES
(1, 'Kaustavaaaa', 'Paul', 5, 'B', 20, 20, '2018-07-09', '43,Ghatakpara Lane', 'Kaushik Paul Soma Paul', 'father', 'Kaushik Paul', 'active'),
(2, 'Arpan', 'Pain', 6, 'C', 5, 23, '2018-07-09', 'hgjcgdjvgkdv', 'father mother', 'father', 'father pain', 'active'),
(3, 'amit', 'roy', 7, 'A', 52, 24, '2018-07-09', 'sdgsfgbdfb', 'father1 mother1', 'father', 'father roy', 'active'),
(4, 'Rajdeep', 'Palit', 10, 'B', 23, 22, '1996-11-04', 'Sarsuna', 'Rana Palit', 'father', 'Rana Palit', 'active'),
(5, 'Subham', 'Yadav', 5, 'B', 33, 23, '1995-10-03', 'Durgapur', 'Jagdish Yadav', 'father', 'Jagdish Yadav', 'active'),
(6, 'Arup', 'Mondal', 6, 'B', 8, 22, '1111-11-11', 'New town', 'kdkbsd', 'father', 'grsjgsrj', 'active'),
(7, 'Arup', 'Mondal', 6, 'B', 8, 22, '1111-11-11', 'New town', 'kdkbsd', 'father', 'grsjgsrj', 'active'),
(8, 'Kaustav', 'Paul', 5, 'A', 12, 12, '2015-12-01', 'New town', 'Rana Palit', 'mother', 'grsjgsrj', 'left'),
(9, 'dggh', 'yhky', 8, 'A', 23, 22, '2015-03-02', 'Sarsuna', 'kdkbsd', 'father', 'grsjgsrj', 'left'),
(10, 'Kaustav', 'Palit', 6, 'C', 121, 23, '2018-07-03', 'New town', 'Rana Palit', 'mother', 'Jagdish Yadav', 'left'),
(11, 'zvsdvdb', 'Pain', 9, 'B', 12, 45, '2018-06-26', 'Durgapur', 'kdkbsd', 'mother', 'grsjgsrj', 'TC'),
(12, 'Kaustav', 'Paul', 8, 'B', 12, 22, '2015-03-03', 'Sarsuna', 'Soma Paul', 'father', 'grsjgsrj', 'left'),
(13, 'dgnftgrft', 'dfhdfhh', 5, 'B', 21, 21, '2018-06-27', '123.1131hnjvb', 'gjfj', 'father', 'fjvgjfj', 'left'),
(14, 'dgnftgrft', 'dfhdfhh', 5, 'B', 21, 21, '2018-06-27', '123.1131hnjvb', 'gjfj', 'father', 'fjvgjfj', 'left'),
(15, 'ftjmry', 'kyrrs', 5, '1212', 1, 1212, '2018-07-19', '1221201', '12121', 'father', 'jl;jiolj', 'active'),
(16, 'Swarnendu', 'Hazra', 7, 'B', 8, 22, '1996-10-01', 'Bosepara', 'Soma Hazra', 'father', 'Chandan Hazra', 'active'),
(17, 'Uma', 'Basu', 6, 'A', 5, 12, '2006-04-29', 'abcd', 'Parimal Basu', 'father', 'Parimal Basu', 'TC'),
(18, 'Rahul', 'Adhikary', 10, 'A', 1, 16, '2002-03-03', 'ABCD', 'TAPAN ADHIKARY', 'father', 'Tapan Adhikary', 'left');

-- --------------------------------------------------------

--
-- Table structure for table `user_details_table1`
--

CREATE TABLE `user_details_table1` (
  `user_id` varchar(12) NOT NULL,
  `user_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details_table1`
--

INSERT IGNORE INTO `user_details_table1` (`user_id`, `user_password`) VALUES
('admin', 'admin'),
('kaustavcse', 'kaustavcse');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Stud_table1`
--
ALTER TABLE `Stud_table1`
  ADD PRIMARY KEY (`stud_id`);

--
-- Indexes for table `user_details_table1`
--
ALTER TABLE `user_details_table1`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Stud_table1`
--
ALTER TABLE `Stud_table1`
  MODIFY `stud_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
