-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2019 at 11:53 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stor`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_details`
--

CREATE TABLE `admin_details` (
  `admin_id_pk` int(3) NOT NULL,
  `user_name` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `user_type_id_fk` int(3) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_details`
--

INSERT INTO `admin_details` (`admin_id_pk`, `user_name`, `password`, `user_type_id_fk`) VALUES
(1, 'admin', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `file_details`
--

CREATE TABLE `file_details` (
  `file_name` varchar(70) NOT NULL,
  `id` varchar(12) NOT NULL,
  `subject_id_fk` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file_details`
--

INSERT INTO `file_details` (`file_name`, `id`, `subject_id_fk`) VALUES
('CN.pdf', 'T001', 14),
('Computer Network Unit 1.pdf', '1MS19MCA02', 14),
('1MS17MCA50-Tarun Joseph.pdf', '1MS19MCA02', 15),
('ST.pdf', 'T002', 15),
('Diag.png', 'T003', 17),
('final.docx', 'T003', 17),
('MINIP.pdf', 'T003', 17);

-- --------------------------------------------------------

--
-- Table structure for table `professor_details`
--

CREATE TABLE `professor_details` (
  `professor_id_pk` varchar(15) NOT NULL,
  `password` varchar(64) NOT NULL,
  `user_type_id_fk` int(3) NOT NULL DEFAULT '3',
  `old_password` varchar(20) NOT NULL,
  `dob` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `professor_details`
--

INSERT INTO `professor_details` (`professor_id_pk`, `password`, `user_type_id_fk`, `old_password`, `dob`) VALUES
('T001', '08d4f527fe3feb9c58388b3a0fffc28d', 3, 'wwACZWLc', '05/11/2019'),
('T002', '6195a46ae9cb255a22a5299ae4395284', 3, 'raKrngKb', '05/15/2019'),
('T003', 'f131318581e8e1b53ed4758de2828dc1', 3, 'mPlGh3w6', '06/05/2003');

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE `student_details` (
  `usn_pk` varchar(12) NOT NULL,
  `password` varchar(64) NOT NULL,
  `batch` int(5) NOT NULL,
  `user_type_id_fk` int(2) NOT NULL DEFAULT '2',
  `old_password` varchar(20) NOT NULL,
  `dob` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`usn_pk`, `password`, `batch`, `user_type_id_fk`, `old_password`, `dob`) VALUES
('1MS19MCA02', '390a0458823dd1a2ec0608e252631f66', 2021, 2, 'qHJLQF7S', '05/02/2019'),
('1MS19MCA03', '438da15500736e0599e8f9fc657db550', 2021, 2, 'xxni40Qv', NULL),
('1MS19MCA04', 'c627c0d496433cd413de7c03f07e0e53', 2021, 2, 'xjmry9gC', NULL),
('1MS19MCA05', '0d8aefa402b91c3c584505012b0e93fb', 2021, 2, 'cLqX4Q9Y', NULL),
('1MS19MCA06', '40650b42bbcba4036b09f875063fd21f', 2021, 2, 'gDjBmQfk', NULL),
('1MS19MCA07', '7f70adcc288b4c1f287c166f22a2293e', 2021, 2, 'tHO6aTjp', NULL),
('1MS19MCA08', '19c5129b5cc22855b39f362f41a8621a', 2021, 2, 'zGCdgL5Z', NULL),
('1MS19MCA09', '52a03cdb6c187849d1a3317085cc7f44', 2021, 2, 'klxHmajP', NULL),
('1MS19MCA10', '0b85a95cc7a44dacc20d5dc7b7901a36', 2021, 2, 'trhjfTLD', NULL),
('1MS19MCA11', '20ee68aa6a2e9e900ae2e42d624c826c', 2021, 2, 'MJBMEFac', NULL),
('1MS19MCA12', 'eb7c3bdc8ca04aa720bd1699f7fcb1a3', 2021, 2, 'YVgRkfhf', NULL),
('1MS19MCA13', '98f01ce0f53c548a5376942bd5e8e009', 2021, 2, 'OO1k2nQy', NULL),
('1MS19MCA14', '8f6911e4595935775aabcbefa24dc2c1', 2021, 2, '48BTvODP', NULL),
('1MS19MCA15', '9f06ceada85e462541c8c446fe25982d', 2021, 2, 'sDMkvinR', NULL),
('1MS19MCA16', '78a1921d290402ab987dcde6c1e0a8ae', 2021, 2, 'K3hoMBQn', NULL),
('1MS19MCA17', '3b5dbee50e4c6e99ea6a3bc7e152d5f1', 2021, 2, 'GaSO4sL9', NULL),
('1MS19MCA18', 'fbe41f043ea66443b64fe5c16f07c50f', 2021, 2, '1Hjm9BTU', NULL),
('1MS19MCA19', 'b3518cb63f5cac71647202f6b7a9023f', 2021, 2, 'wpkLJOYp', NULL),
('1MS19MCA20', '17c6976c6619d89e3843d823ceda3c61', 2021, 2, 'T3GMBPMo', NULL),
('1MS19MCA21', '7f8f64f776002046f18beffc48b73b34', 2021, 2, 'Wn7bup2C', NULL),
('1MS19MCA22', '5c0a6bcc23b152537d98c633cfe403a9', 2021, 2, 'm8oG9hwQ', NULL),
('1MS19MCA23', '0532859d010d09bfc08023ce3e1eaeac', 2021, 2, 'W4f4ldXO', NULL),
('1MS19MCA24', '6902096766c1218d168bf3ad7db7bc47', 2021, 2, 'qVs3NW6h', NULL),
('1MS19MCA25', 'c60b444842e808354bf995b381278ade', 2021, 2, 'ytJqheHY', NULL),
('1MS19MCA30', 'c19f0b9d62ab53a49deb61ef60ca07c2', 2021, 2, '4ttGTRG1', NULL),
('1MS19MCA31', '23c89928caf9d08b82545bc53dd42d25', 2021, 2, 'wJbFiy3P', NULL),
('1MS19MCA32', '215739481d12b54d669f3d0630c2bf50', 2021, 2, '3kUd9vQ2', NULL),
('1MS19MCA33', 'b880e901b94bf8ccf800d36368bc11fa', 2021, 2, 'q4q3dsLr', NULL),
('1MS19MCA34', 'da6db69080e3af735c516df345e5481e', 2021, 2, 'nFsXf8AM', NULL),
('1MS19MCA35', 'cae11f5fa52e55ac75a90015a0c6e9df', 2021, 2, 'FSKEZj3N', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subject_details`
--

CREATE TABLE `subject_details` (
  `subject_id_pk` int(5) NOT NULL,
  `subject_name` varchar(50) NOT NULL,
  `subject_code` varchar(15) NOT NULL,
  `professor_id_fk` varchar(15) NOT NULL,
  `batch` int(5) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_details`
--

INSERT INTO `subject_details` (`subject_id_pk`, `subject_name`, `subject_code`, `professor_id_fk`, `batch`, `status`) VALUES
(13, 'NoSQL DataBase', 'MCAE07', 'T001', 2021, 1),
(14, 'Computer Networks', 'MCA41', 'T001', 2021, 1),
(15, 'Software Testing', 'MCAE14', 'T002', 2021, 1),
(16, 'qwe', '123', 'T001', 2021, 0),
(17, 'Mini Project', 'MCAP01', 'T003', 2021, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `user_type_id_pk` int(3) NOT NULL,
  `user_type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`user_type_id_pk`, `user_type`) VALUES
(1, 'Administrator '),
(2, 'Student'),
(3, 'Professor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_details`
--
ALTER TABLE `admin_details`
  ADD PRIMARY KEY (`admin_id_pk`),
  ADD KEY `user_type_id_fk` (`user_type_id_fk`);

--
-- Indexes for table `file_details`
--
ALTER TABLE `file_details`
  ADD KEY `subject_id_fk` (`subject_id_fk`);

--
-- Indexes for table `professor_details`
--
ALTER TABLE `professor_details`
  ADD PRIMARY KEY (`professor_id_pk`),
  ADD KEY `user_type_id_fk` (`user_type_id_fk`);

--
-- Indexes for table `student_details`
--
ALTER TABLE `student_details`
  ADD PRIMARY KEY (`usn_pk`),
  ADD KEY `user_type_id_fk` (`user_type_id_fk`);

--
-- Indexes for table `subject_details`
--
ALTER TABLE `subject_details`
  ADD PRIMARY KEY (`subject_id_pk`),
  ADD KEY `professor_id_fk` (`professor_id_fk`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`user_type_id_pk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_details`
--
ALTER TABLE `admin_details`
  MODIFY `admin_id_pk` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subject_details`
--
ALTER TABLE `subject_details`
  MODIFY `subject_id_pk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `user_type_id_pk` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_details`
--
ALTER TABLE `admin_details`
  ADD CONSTRAINT `admin_details_ibfk_1` FOREIGN KEY (`user_type_id_fk`) REFERENCES `user_type` (`user_type_id_pk`);

--
-- Constraints for table `file_details`
--
ALTER TABLE `file_details`
  ADD CONSTRAINT `file_details_ibfk_1` FOREIGN KEY (`subject_id_fk`) REFERENCES `subject_details` (`subject_id_pk`);

--
-- Constraints for table `professor_details`
--
ALTER TABLE `professor_details`
  ADD CONSTRAINT `professor_details_ibfk_1` FOREIGN KEY (`user_type_id_fk`) REFERENCES `user_type` (`user_type_id_pk`);

--
-- Constraints for table `student_details`
--
ALTER TABLE `student_details`
  ADD CONSTRAINT `student_details_ibfk_1` FOREIGN KEY (`user_type_id_fk`) REFERENCES `user_type` (`user_type_id_pk`);

--
-- Constraints for table `subject_details`
--
ALTER TABLE `subject_details`
  ADD CONSTRAINT `subject_details_ibfk_1` FOREIGN KEY (`professor_id_fk`) REFERENCES `professor_details` (`professor_id_pk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
