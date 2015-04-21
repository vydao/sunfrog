-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2015 at 04:57 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sunfrog`
--

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE IF NOT EXISTS `config` (
`id` int(3) unsigned NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL,
  `title` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `description` text CHARACTER SET utf8,
  `keyword` text CHARACTER SET utf8,
  `com` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `config`
--
ALTER TABLE `config`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
MODIFY `id` int(3) unsigned NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


--
--Default value
--
INSERT INTO `sunfrog`.`config` (`id`, `content`, `title`, `description`, `keyword`, `com`) VALUES (NULL, 'gioi thieu', NULL, NULL, NULL, 'about');
INSERT INTO `sunfrog`.`config` (`id`, `content`, `title`, `description`, `keyword`, `com`) VALUES (NULL, 'contact', NULL, NULL, NULL, 'contact');
INSERT INTO `sunfrog`.`config` (`id`, `content`, `title`, `description`, `keyword`, `com`) VALUES (NULL, 'footer', NULL, NULL, NULL, 'footer');
INSERT INTO `sunfrog`.`config` (`id`, `content`, `title`, `description`, `keyword`, `com`) VALUES (NULL, 'iframe of video', NULL, NULL, NULL, 'video');

