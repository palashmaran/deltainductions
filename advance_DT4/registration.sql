-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 17, 2015 at 11:40 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE IF NOT EXISTS `register` (
  `uid` int(9) NOT NULL,
  `rollno` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `department` varchar(50) DEFAULT NULL,
  `year_of_study` int(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `profile_pic_path` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`uid`, `rollno`, `name`, `department`, `year_of_study`, `email`, `password`, `profile_pic_path`) VALUES
(134731800, 145236789, 'fsdfs', 'sdf', 2012, 'palashmaran@gmail.com', '95d1543adea47e88923c3d4ad56e9f65c2b40c76', 'profile_pic/145236789.jpeg'),
(497180560, 145236987, 'sdsfdfsdf', 'sdfsdf', 2014, 'sdfsdf@gmail.com', '95d1543adea47e88923c3d4ad56e9f65c2b40c76', 'profile_pic/145236987.png');
