-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 27, 2018 at 08:50 PM
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
-- Table structure for table `City`
--

CREATE TABLE `City` (
  `i_id` int(2) NOT NULL,
  `s_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `City`
--

INSERT IGNORE INTO `City` (`i_id`, `s_name`) VALUES
(1, 'Kharagpur'),
(2, 'Mumbai'),
(3, 'Delhi'),
(4, 'Bangalore'),
(5, 'Ahmedabad'),
(6, 'Chennai'),
(7, 'Kolkata'),
(8, 'Surat'),
(9, 'Pune'),
(10, 'Jaipur'),
(11, 'Lucknow'),
(12, 'Kanpur'),
(13, 'Nagpur'),
(14, 'Visakhapatnam'),
(15, 'Indore'),
(16, 'thane'),
(17, 'Bhopal'),
(18, 'Patna'),
(19, 'Vadodara'),
(20, 'Ghaziabad'),
(21, 'Ludhiana'),
(22, 'Agra'),
(23, 'Nashik'),
(24, 'Faridabad'),
(25, 'Meerut'),
(26, '	Rajkot'),
(27, '	Varanasi'),
(28, 'Srinagar'),
(29, 'Aurangabad'),
(30, 'Dhanbad'),
(31, 'Amritsar'),
(32, 'Ranchi'),
(33, 'Jabalpur'),
(34, 'Gwalior'),
(35, 'Jodhpur'),
(36, 'Raipur'),
(37, 'Solapur'),
(38, 'Bareilly'),
(39, 'Mysore'),
(40, 'Tiruppur'),
(41, 'Aligarh'),
(42, 'Bhubaneswar'),
(43, 'Noida'),
(44, 'Bhilai'),
(45, 'Cuttack'),
(46, 'Kochi');

-- --------------------------------------------------------

--
-- Table structure for table `Class`
--

CREATE TABLE `Class` (
  `i_id` int(2) NOT NULL,
  `s_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Class`
--

INSERT IGNORE INTO `Class` (`i_id`, `s_name`) VALUES
(5, 'Five'),
(6, 'Six'),
(7, 'Seven'),
(8, 'Eight'),
(9, 'Nine'),
(10, 'Ten'),
(11, 'Eleven'),
(12, 'Twelve');

-- --------------------------------------------------------

--
-- Table structure for table `class_subject`
--

CREATE TABLE `class_subject` (
  `i_class_id` int(4) NOT NULL,
  `i_subject_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Entry_details`
--

CREATE TABLE `Entry_details` (
  `dt_entry_date` date NOT NULL,
  `i_entered_class` int(10) NOT NULL,
  `i_entry_type` int(10) NOT NULL,
  `s_entry_type_other` text NOT NULL,
  `s_leaving_reason` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Exam`
--

CREATE TABLE `Exam` (
  `i_student_id` int(2) NOT NULL,
  `i_is_present` enum('yes','no') DEFAULT NULL,
  `i_exam_type_id` int(4) NOT NULL,
  `i_year-id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Exam_type`
--

CREATE TABLE `Exam_type` (
  `i_exam_type_id` int(2) NOT NULL,
  `s_exam_type` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Exam_type`
--

INSERT IGNORE INTO `Exam_type` (`i_exam_type_id`, `s_exam_type`) VALUES
(1, 'Half-Yearly'),
(2, 'Annual'),
(3, 'Internal'),
(4, 'Surprise');

-- --------------------------------------------------------

--
-- Table structure for table `Library_books`
--

CREATE TABLE `Library_books` (
  `i_book_id` int(2) NOT NULL,
  `s_book_name` varchar(10) NOT NULL,
  `s_book_author` varchar(40) NOT NULL,
  `i_book_subject_id` int(2) NOT NULL,
  `i_book_type` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Library_book_type`
--

CREATE TABLE `Library_book_type` (
  `i_book_type_id` int(2) NOT NULL,
  `s_book-type_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `library_issue`
--

CREATE TABLE `library_issue` (
  `i_student_id` int(2) NOT NULL,
  `i_librarian_id` int(2) NOT NULL,
  `i_library_book_id` int(4) NOT NULL,
  `d_issued_date` date NOT NULL,
  `d_valid_till` date NOT NULL,
  `e_return_info` enum('yes','no') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Marks`
--

CREATE TABLE `Marks` (
  `i_exam_id` int(2) NOT NULL,
  `i_marks_obtain` int(10) NOT NULL,
  `i_subject_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Personal_details`
--

CREATE TABLE `Personal_details` (
  `i_stud_id` int(10) NOT NULL,
  `s_stud_fname` varchar(40) NOT NULL,
  `s_stud_lname` varchar(40) NOT NULL,
  `s_stud_father` varchar(40) NOT NULL,
  `s_stud_mother` varchar(40) NOT NULL,
  `dt_stud_dob` date NOT NULL,
  `s_stud_gender` enum('male','female') NOT NULL DEFAULT 'male',
  `s_stud_address` varchar(40) NOT NULL,
  `i_city_id` int(4) NOT NULL,
  `i_state_id` int(4) NOT NULL,
  `i_pin_id` int(4) NOT NULL,
  `s_stud_contact` char(10) NOT NULL,
  `s_img_name` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Personal_details`
--

INSERT IGNORE INTO `Personal_details` (`i_stud_id`, `s_stud_fname`, `s_stud_lname`, `s_stud_father`, `s_stud_mother`, `dt_stud_dob`, `s_stud_gender`, `s_stud_address`, `i_city_id`, `i_state_id`, `i_pin_id`, `s_stud_contact`, `s_img_name`) VALUES
(1, 'Kaustav', 'Paul', 'Kaushik Kumar Paul', 'Soma Paul', '1996-11-23', 'male', '43,Ghatakpara Lane', 7, 11, 1, '7797480989', ''),
(2, 'Rajdeep', 'Palit', 'Rana Palit', 'mother Palit', '1996-11-03', 'male', 'Sarsuna Lane', 7, 11, 3, '9434842692', ''),
(3, 'Subham', 'Yadav', 'Jagdish Yadav', 'Bismodia Yadav', '1995-07-12', 'male', 'DE Block', 6, 7, 4, '7585855522', ''),
(4, 'Arup', 'Mondal', 'Astapada Mondal', 'Mother Mondal', '1996-04-27', 'male', 'New Town', 5, 6, 1, '4848484454', ''),
(5, 'Soutrick', 'Chakraborty', 'Rail Chakraborty', 'Mother Chakraborty', '1996-04-15', 'male', 'Parnashree', 5, 7, 4, '7585855522', ''),
(6, 'Samrat', 'Gupta', 'Late Gupta', 'Maa Gupta', '1995-04-16', 'male', 'Santipur', 10, 22, 2, '9735691878', '');

-- --------------------------------------------------------

--
-- Table structure for table `Pincode`
--

CREATE TABLE `Pincode` (
  `i_id` int(2) NOT NULL,
  `s_no` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Pincode`
--

INSERT IGNORE INTO `Pincode` (`i_id`, `s_no`) VALUES
(1, '741201'),
(2, '742101'),
(3, '700001'),
(4, '742401');

-- --------------------------------------------------------

--
-- Table structure for table `Room`
--

CREATE TABLE `Room` (
  `i_id` int(2) NOT NULL,
  `s_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Room`
--

INSERT IGNORE INTO `Room` (`i_id`, `s_name`) VALUES
(1, 'hall1'),
(2, 'hall2'),
(3, 'hall3'),
(4, 'hall4'),
(5, 'hall5');

-- --------------------------------------------------------

--
-- Table structure for table `Routine`
--

CREATE TABLE `Routine` (
  `i_teacher_id` int(2) NOT NULL,
  `i_subject_id` int(2) NOT NULL,
  `i_class_id` int(4) NOT NULL,
  `i_room_id` int(4) NOT NULL,
  `e_day` enum('mon','tue','wed','thu','sun','sat','fri') NOT NULL DEFAULT 'mon',
  `i_section_id` int(4) NOT NULL,
  `i_time_id` int(4) NOT NULL,
  `i_year_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `School_entry_type`
--

CREATE TABLE `School_entry_type` (
  `i_entered_class` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Section`
--

CREATE TABLE `Section` (
  `i_id` int(2) NOT NULL,
  `s_name` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Section`
--

INSERT IGNORE INTO `Section` (`i_id`, `s_name`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(4, 'D');

-- --------------------------------------------------------

--
-- Table structure for table `State`
--

CREATE TABLE `State` (
  `i_id` int(2) NOT NULL,
  `s_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `State`
--

INSERT IGNORE INTO `State` (`i_id`, `s_name`) VALUES
(1, 'Andhra Pradesh'),
(2, 'Assam'),
(3, 'Bihar'),
(4, 'Gujarat'),
(5, 'Jharkhand'),
(6, 'Maharashtra'),
(7, 'Kerala'),
(8, 'Odisha'),
(9, 'Tamil Nadu'),
(10, 'Uttar Pradesh'),
(11, 'West Bengal'),
(12, 'Nagaland'),
(13, '	Mizoram'),
(14, 'Meghalaya'),
(15, 'Manipur'),
(16, 'Maharashtra'),
(17, 'Madhya Pradesh'),
(18, 'Lakshadweep'),
(19, 'Kerala'),
(20, 'Karnataka'),
(21, 'Jharkhand'),
(22, 'Jammu and Kashmir'),
(23, 'Himachal Pradesh'),
(24, 'Haryana'),
(25, '	Gujarat'),
(26, 'Goa'),
(27, 'National Capital Territory of Delhi'),
(28, 'Chhattisgarh'),
(29, 'Bihar'),
(30, 'Assam'),
(31, 'Arunachal Pradesh'),
(32, 'Andhra Pradesh'),
(33, 'Andaman and Nicobar Islands union territ');

-- --------------------------------------------------------

--
-- Table structure for table `Student_attendance`
--

CREATE TABLE `Student_attendance` (
  `i_teacher_id` int(2) NOT NULL,
  `i_class_id` int(2) NOT NULL,
  `i_section_id` int(2) NOT NULL,
  `i_student_id` int(2) NOT NULL,
  `dt_entry_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Student_classes`
--

CREATE TABLE `Student_classes` (
  `i_student_id` int(2) NOT NULL,
  `i_class_id` int(2) NOT NULL,
  `i_secion_id` int(4) NOT NULL,
  `i_roll_no` int(4) NOT NULL,
  `i_year_id` int(4) NOT NULL,
  `i_room_id` int(4) NOT NULL,
  `i_library_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Student_classes`
--

INSERT IGNORE INTO `Student_classes` (`i_student_id`, `i_class_id`, `i_secion_id`, `i_roll_no`, `i_year_id`, `i_room_id`, `i_library_id`) VALUES
(1, 5, 3, 5, 1, 3, 2),
(2, 5, 3, 5, 2, 1, 3),
(3, 7, 3, 11, 1, 4, 12);

-- --------------------------------------------------------

--
-- Table structure for table `Student_status`
--

CREATE TABLE `Student_status` (
  `i_status_id` int(2) NOT NULL,
  `s_status_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `stud_gender` varchar(10) NOT NULL,
  `stud_dob` date NOT NULL DEFAULT '2018-07-09',
  `stud_address` varchar(40) NOT NULL,
  `stud_parent` varchar(30) NOT NULL,
  `stud_guardian_type` enum('father','mother') NOT NULL DEFAULT 'father',
  `stud_guardian` varchar(40) NOT NULL,
  `stud_status` enum('active','left','TC') NOT NULL DEFAULT 'active',
  `img_name` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Stud_table1`
--

INSERT IGNORE INTO `Stud_table1` (`stud_id`, `stud_fname`, `stud_lname`, `stud_class`, `stud_section`, `stud_roll`, `stud_age`, `stud_gender`, `stud_dob`, `stud_address`, `stud_parent`, `stud_guardian_type`, `stud_guardian`, `stud_status`, `img_name`) VALUES
(4, 'Rajdeep', 'Palit', 10, 'B', 23, 22, 'male', '1996-11-04', 'Sarsuna', 'Rana Palit', 'father', 'Rana Palit', 'active', 'profile_4.jpeg'),
(5, 'Subham', 'Yadav', 5, 'B', 34, 23, 'male', '1995-10-03', 'Durgapur', 'Jagdish Yadav', 'father', 'Jagdish Yadav', 'active', 'profile_5.jpg'),
(6, 'Soutrick', 'Mondal', 7, 'A', 8, 22, 'male', '1111-11-11', 'Dhakkapara', 'Rail Chakraborty', 'father', 'grsjgsrj', 'TC', 'profile_6.jpg'),
(7, 'Arup', 'Mondala', 6, 'B', 8, 22, 'male', '1111-11-11', 'New town', 'kdkbsd', 'father', 'grsjgsrj', 'active', 'profile_4.jpg'),
(12, 'Kaustav', 'Pauli', 8, 'B', 12, 22, 'male', '2015-03-03', 'Sarsuna', 'Soma Paul', 'father', 'grsjgsrj', 'left', 'profile_12.jpg'),
(15, 'ftjmry', 'kyrrs', 5, '1212', 1, 1212, 'male', '2018-07-19', '1221201', '12121', 'father', 'jl;jiolj', 'active', ''),
(17, 'Uma', 'Basu', 6, 'A', 5, 12, 'male', '2006-04-29', 'abcd', 'Parimal Basu', 'father', 'Parimal Basu', 'TC', ''),
(18, 'Rahul', 'Adhikary', 10, 'A', 1, 16, 'female', '2002-03-03', 'ABCD', 'TAPAN ADHIKARY', 'father', 'Tapan Adhikary', 'left', ''),
(19, 'Sudipta', 'Banerjee', 5, 'B', 35, 23, 'female', '1995-06-02', 'Burdwan', 'Dulal Banerjee', 'father', 'Dulal Banerjee', 'active', ''),
(22, 'Kaustav', 'Paul', 6, 'B', 19, 22, 'female', '1996-11-23', 'Ranaghat', 'Soma Paul', 'father', 'Kaushik Kumar Paul', 'left', ''),
(24, 'Amit ', 'Roy', 7, 'B', 4, 12, 'female', '2006-11-02', 'Kharagpur', 'Ashoke roy', 'father', 'Samrat Ashoke', 'TC', ''),
(40, 'saddsad', 'sdsadsa', 5, 'A', 4, 4, 'female', '2018-07-18', 'afdfdsf', 'dfdsfdsf', 'father', 'fdgfdg', 'active', 'profile_40.jpg'),
(42, 'EWG', 'WGEeGW', 5, 'WEG', 5, 5, 'male', '2018-07-11', 'ETHA', 'ERAN', 'father', 'ERHH', 'left', 'profile_42.jpg'),
(47, 'dfhndghn', 'ngfjtrjr', 9, 'B', 4, 4, 'male', '2018-06-28', 'fdgbd', 'dndnjt', 'mother', 'thndhn', 'active', NULL),
(49, 'dbdfd', 'dbfdfb', 6, 'B', 4, 5, 'male', '2018-07-03', 'bdfss', 'bffdsrbsd', 'mother', 'sfbfsbs', 'left', NULL),
(53, 'Image', 'lhoho', 5, 'h', 3, 3, 'female', '2018-06-29', 'rurj', 'mfghmf', 'father', 'fjfyj', 'TC', 'profile_53.jpg'),
(54, 'Check', 'Gender', 5, 'B', 6, 7, 'male', '2007-03-03', 'shds', 'sdbgvsfd', 'father', 'sfgsdgs', 'active', 'profile_54.png'),
(55, 'dgxdf', 'xbxfb', 5, 'B', 4, 6, 'male', '2018-07-05', 'zdbxf', 'xfbxfbxfb', 'father', 'bfxfbfb', 'active', 'profile_55.jpg'),
(56, 'Kaustav', 'Paul', 5, 'A', 7, 9, 'male', '1999-11-03', 'svgsv', 'sgsgsg', 'father', 'egfrfs', 'active', 'profile_56.jpeg'),
(57, 'Kaustav', 'Paul', 7, 'B', 8, 12, 'male', '1996-11-23', 'Ranaghat', 'Kaushik Paul', 'father', 'Kaushik Paul', 'active', 'profile_57.jpg'),
(58, 'Arunava', 'Kundu', 10, 'A', 3, 22, 'male', '1996-05-05', 'Courtpara', 'Father Kundu', 'father', 'Father Kundu', 'active', 'profile_58.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `Subject`
--

CREATE TABLE `Subject` (
  `i_id` int(2) NOT NULL,
  `s_name` varchar(40) NOT NULL,
  `i_total_marks` int(10) NOT NULL,
  `i_pass_marks` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Subject`
--

INSERT IGNORE INTO `Subject` (`i_id`, `s_name`, `i_total_marks`, `i_pass_marks`) VALUES
(1, 'PHP', 100, 25),
(2, 'Java', 100, 30),
(3, 'Javascript', 100, 35),
(4, 'C', 100, 45),
(5, 'jQuery', 100, 20);

-- --------------------------------------------------------

--
-- Table structure for table `Teacher_details`
--

CREATE TABLE `Teacher_details` (
  `i_teacher_id` int(2) NOT NULL,
  `s_teacher_name` varchar(10) NOT NULL,
  `s_teacher_father` varchar(10) NOT NULL,
  `s_teacher_mother` varchar(10) NOT NULL,
  `s_teacher_address` varchar(20) NOT NULL,
  `i_city_id` int(2) NOT NULL,
  `i_state_id` int(4) NOT NULL,
  `i_pin_id` int(4) NOT NULL,
  `s_contact` char(10) NOT NULL,
  `d_dob` date NOT NULL,
  `d_entry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Teacher_specialization`
--

CREATE TABLE `Teacher_specialization` (
  `i_teacher_id` int(4) NOT NULL,
  `s_specialization_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Teacher_subjects`
--

CREATE TABLE `Teacher_subjects` (
  `i_teacher_id` int(2) NOT NULL,
  `i_subject_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Time`
--

CREATE TABLE `Time` (
  `i_time_id` int(2) NOT NULL,
  `dt_start_time` time NOT NULL,
  `dt_end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Time`
--

INSERT IGNORE INTO `Time` (`i_time_id`, `dt_start_time`, `dt_end_time`) VALUES
(1, '10:30:00', '11:15:00'),
(2, '11:30:00', '12:30:00'),
(3, '12:45:00', '01:30:00'),
(4, '02:15:00', '03:00:00'),
(5, '03:15:00', '04:15:00');

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

-- --------------------------------------------------------

--
-- Table structure for table `Year`
--

CREATE TABLE `Year` (
  `i_year_id` int(2) NOT NULL,
  `s_year_val` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Year`
--

INSERT IGNORE INTO `Year` (`i_year_id`, `s_year_val`) VALUES
(1, '2017'),
(2, '2018');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `City`
--
ALTER TABLE `City`
  ADD PRIMARY KEY (`i_id`);

--
-- Indexes for table `Class`
--
ALTER TABLE `Class`
  ADD PRIMARY KEY (`i_id`);

--
-- Indexes for table `class_subject`
--
ALTER TABLE `class_subject`
  ADD PRIMARY KEY (`i_class_id`);

--
-- Indexes for table `Exam`
--
ALTER TABLE `Exam`
  ADD PRIMARY KEY (`i_student_id`);

--
-- Indexes for table `Exam_type`
--
ALTER TABLE `Exam_type`
  ADD PRIMARY KEY (`i_exam_type_id`);

--
-- Indexes for table `Library_books`
--
ALTER TABLE `Library_books`
  ADD PRIMARY KEY (`i_book_id`);

--
-- Indexes for table `Library_book_type`
--
ALTER TABLE `Library_book_type`
  ADD PRIMARY KEY (`i_book_type_id`);

--
-- Indexes for table `library_issue`
--
ALTER TABLE `library_issue`
  ADD PRIMARY KEY (`i_student_id`);

--
-- Indexes for table `Personal_details`
--
ALTER TABLE `Personal_details`
  ADD PRIMARY KEY (`i_stud_id`);

--
-- Indexes for table `Pincode`
--
ALTER TABLE `Pincode`
  ADD PRIMARY KEY (`i_id`);

--
-- Indexes for table `Room`
--
ALTER TABLE `Room`
  ADD PRIMARY KEY (`i_id`);

--
-- Indexes for table `Section`
--
ALTER TABLE `Section`
  ADD PRIMARY KEY (`i_id`);

--
-- Indexes for table `State`
--
ALTER TABLE `State`
  ADD PRIMARY KEY (`i_id`);

--
-- Indexes for table `Student_classes`
--
ALTER TABLE `Student_classes`
  ADD PRIMARY KEY (`i_student_id`);

--
-- Indexes for table `Student_status`
--
ALTER TABLE `Student_status`
  ADD PRIMARY KEY (`i_status_id`);

--
-- Indexes for table `Stud_table1`
--
ALTER TABLE `Stud_table1`
  ADD PRIMARY KEY (`stud_id`);

--
-- Indexes for table `Subject`
--
ALTER TABLE `Subject`
  ADD PRIMARY KEY (`i_id`);

--
-- Indexes for table `Teacher_details`
--
ALTER TABLE `Teacher_details`
  ADD PRIMARY KEY (`i_teacher_id`);

--
-- Indexes for table `Teacher_specialization`
--
ALTER TABLE `Teacher_specialization`
  ADD PRIMARY KEY (`i_teacher_id`);

--
-- Indexes for table `Time`
--
ALTER TABLE `Time`
  ADD PRIMARY KEY (`i_time_id`);

--
-- Indexes for table `user_details_table1`
--
ALTER TABLE `user_details_table1`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `Year`
--
ALTER TABLE `Year`
  ADD PRIMARY KEY (`i_year_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `City`
--
ALTER TABLE `City`
  MODIFY `i_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `Class`
--
ALTER TABLE `Class`
  MODIFY `i_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `Exam_type`
--
ALTER TABLE `Exam_type`
  MODIFY `i_exam_type_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `Library_books`
--
ALTER TABLE `Library_books`
  MODIFY `i_book_id` int(2) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Library_book_type`
--
ALTER TABLE `Library_book_type`
  MODIFY `i_book_type_id` int(2) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Personal_details`
--
ALTER TABLE `Personal_details`
  MODIFY `i_stud_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `Pincode`
--
ALTER TABLE `Pincode`
  MODIFY `i_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `Room`
--
ALTER TABLE `Room`
  MODIFY `i_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `Section`
--
ALTER TABLE `Section`
  MODIFY `i_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `State`
--
ALTER TABLE `State`
  MODIFY `i_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `Student_classes`
--
ALTER TABLE `Student_classes`
  MODIFY `i_student_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `Student_status`
--
ALTER TABLE `Student_status`
  MODIFY `i_status_id` int(2) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Stud_table1`
--
ALTER TABLE `Stud_table1`
  MODIFY `stud_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `Subject`
--
ALTER TABLE `Subject`
  MODIFY `i_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `Teacher_details`
--
ALTER TABLE `Teacher_details`
  MODIFY `i_teacher_id` int(2) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Time`
--
ALTER TABLE `Time`
  MODIFY `i_time_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `Year`
--
ALTER TABLE `Year`
  MODIFY `i_year_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
