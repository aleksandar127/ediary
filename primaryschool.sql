-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 13, 2019 at 07:21 AM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `primaryschool`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnici_has_ucenici`
--

DROP TABLE IF EXISTS `korisnici_has_ucenici`;
CREATE TABLE IF NOT EXISTS `korisnici_has_ucenici` (
  `korisnici_id` int(11) NOT NULL,
  `ucenici_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `fk_korisnici_has_ucenici_ucenici1_idx` (`ucenici_id`),
  KEY `fk_korisnici_has_ucenici_korisnici_idx` (`korisnici_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `korisnici_has_ucenici`
--

INSERT INTO `korisnici_has_ucenici` (`korisnici_id`, `ucenici_id`, `id`) VALUES
(3, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'director'),
(3, 'professor'),
(4, 'teacher'),
(5, 'parent');

-- --------------------------------------------------------

--
-- Table structure for table `ucenici`
--

DROP TABLE IF EXISTS `ucenici`;
CREATE TABLE IF NOT EXISTS `ucenici` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(45) NOT NULL,
  `prezime` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ucenici`
--

INSERT INTO `ucenici` (`id`, `ime`, `prezime`) VALUES
(1, 'Marjan', 'Despotovic'),
(2, 'Aca', 'Markovic');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_users_role1_idx` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `password`, `role_id`) VALUES
(1, 'Milenka', 'Ostojic', 'milka', '123456', 3),
(2, 'Savo', 'Milunovic', 'savica', '123456', 4),
(3, 'Ivana', 'Misic', 'ivanica', '123456', 5),
(4, 'Milos', 'Milosevic', 'misa', '123456', 2),
(5, 'Isiodra', 'Nikolic', 'isica', '123456', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `korisnici_has_ucenici`
--
ALTER TABLE `korisnici_has_ucenici`
  ADD CONSTRAINT `fk_korisnici_has_ucenici_korisnici` FOREIGN KEY (`korisnici_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_korisnici_has_ucenici_ucenici1` FOREIGN KEY (`ucenici_id`) REFERENCES `ucenici` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_role1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
