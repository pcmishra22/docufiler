-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 26, 2016 at 07:11 PM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `docudb`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_files`
--

CREATE TABLE IF NOT EXISTS `user_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `uniquename` varchar(100) DEFAULT NULL,
  `folder` varchar(100) DEFAULT NULL,
  `devicedetails` varchar(200) DEFAULT NULL,
  `device` varchar(200) DEFAULT NULL,
  `filetype` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `size` varchar(10) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `file_created_date` varchar(100) DEFAULT NULL,
  `file_last_modified_date` varchar(100) DEFAULT NULL,
  `is_image_created` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user_files`
--

INSERT INTO `user_files` (`id`, `userid`, `name`, `uniquename`, `folder`, `devicedetails`, `device`, `filetype`, `location`, `size`, `created_date`, `file_created_date`, `file_last_modified_date`, `is_image_created`) VALUES
(3, 2, 'file.docx', '1453813962_file.docx', '', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 'localhost', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'https://s3-us-west-2.amazonaws.com/docufiler/1453813962_file.docx', '14882', '2016-01-26 18:42:42', 'January 01 1970 05:30:00.', 'January 01 1970 05:30:00.', 1),
(4, 2, 'file.docx', '1453814013_file.docx', '', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 'localhost', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'https://s3-us-west-2.amazonaws.com/docufiler/1453814013_file.docx', '14882', '2016-01-26 18:43:33', 'January 01 1970 05:30:00.', 'January 01 1970 05:30:00.', 1),
(5, 2, 'file.docx', '1453814017_file.docx', '', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 'localhost', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'https://s3-us-west-2.amazonaws.com/docufiler/1453814017_file.docx', '14882', '2016-01-26 18:43:37', 'January 01 1970 05:30:00.', 'January 01 1970 05:30:00.', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
