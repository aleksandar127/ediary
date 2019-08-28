-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 28, 2019 at 10:22 AM
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
-- Table structure for table `class`
--

DROP TABLE IF EXISTS `class`;
CREATE TABLE IF NOT EXISTS `class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `users_id` int(11) NOT NULL,
  `high_low` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_class_users1_idx` (`users_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text COLLATE utf8_slovenian_ci NOT NULL,
  `from` varchar(45) COLLATE utf8_slovenian_ci NOT NULL,
  `to` varchar(45) COLLATE utf8_slovenian_ci NOT NULL,
  `date_and_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `read` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `notifications` text COLLATE utf8_slovenian_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `open`
--

DROP TABLE IF EXISTS `open`;
CREATE TABLE IF NOT EXISTS `open` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` datetime DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_open_users1_idx` (`users_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'professor'),
(2, 'admin'),
(3, 'teacher'),
(4, 'parent'),
(5, 'director');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

DROP TABLE IF EXISTS `schedule`;
CREATE TABLE IF NOT EXISTS `schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `class_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_schedule_class1_idx` (`class_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `class_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_students_class1_idx` (`class_id`),
  KEY `fk_students_users1_idx` (`users_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `high_low` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_subjects_users1_idx` (`users_id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `users_id`, `high_low`) VALUES
(49, 'Matematika i drustvo', NULL, 0),
(50, 'English', 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subjects_has_grades`
--

DROP TABLE IF EXISTS `subjects_has_grades`;
CREATE TABLE IF NOT EXISTS `subjects_has_grades` (
  `subjects_id` int(11) NOT NULL,
  `grades` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `fk_subjects_has_grades_subjects1_idx` (`subjects_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects_has_grades`
--

INSERT INTO `subjects_has_grades` (`subjects_id`, `grades`, `id`) VALUES
(49, 1, 31),
(49, 2, 32),
(49, 3, 33),
(49, 4, 34),
(49, 5, 35),
(50, 1, 36),
(50, 2, 37),
(50, 3, 38),
(50, 4, 39),
(50, 5, 40);

-- --------------------------------------------------------

--
-- Table structure for table `subjects_has_grades_has_students`
--

DROP TABLE IF EXISTS `subjects_has_grades_has_students`;
CREATE TABLE IF NOT EXISTS `subjects_has_grades_has_students` (
  `students_id` int(11) DEFAULT NULL,
  `subjects_has_grades_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `fk_subjects_has_grades_has_students_students1_idx` (`students_id`),
  KEY `fk_subjects_has_grades_has_students_subjects_has_grades1_idx` (`subjects_has_grades_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

DROP TABLE IF EXISTS `terms`;
CREATE TABLE IF NOT EXISTS `terms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dan` varchar(45) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `cas` int(1) DEFAULT NULL,
  `subjects_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_terms_subjects1_idx` (`subjects_id`),
  KEY `fk_terms_schedule1_idx` (`schedule_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `last_name` varchar(45) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `username` varchar(45) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `cookie` varchar(255) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `roles_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_users_roles1_idx` (`roles_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `password`, `cookie`, `roles_id`) VALUES
(3, 'Isidora', 'Nikolic', 'isica', '$2y$10$BdM2tOY4sNp0qiFOfyqyyu.cEr4XJVmKwtfC15/xgT0CKv35iXq6O', '390b209a961a55ef64874c42a04156b1', 2),
(4, 'Aleksandar', 'Miljkovic', 'acika', '$2y$10$jtwHKh5tZixgASTiuTjHmuBh901kR7zmlEwH3x9Tea7RZGr3TADAm', NULL, 1),
(5, 'Milica', 'Petrovic', 'picika', '$2y$10$v9Ka975jcA7bYsyWDC4Gk.W7qioLRpt4O8Y4Xb1ypLr51AF5F9pa6', NULL, 1),
(8, 'AcaMaca', 'Pereca', 'pekica', '$2y$10$WsNtYTuKojOoDNNoXqM.qeXdEWDyOzPOuLfVhEUR0NR4h5eULEQCW', '671fb7404dc322568a201b8f5117c50f', 1),
(9, 'Milojko', 'Petrovic', 'milojko', '$2y$10$yCDXnAYsvg.Wqu76lqRyPundxe7ARn2aQ8lh6LSNqj8GOwwLcsvN6', NULL, 3),
(10, 'Aleksandar', 'Peconi', 'arkan', '$2y$10$7AsyyrjGCmKcLd68QTwEk.BL6rTDAYghhZOPkVqmwxbDTKBFFKCdS', '7548daad3e047134e10e3f5cac033cd7', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users_has_class`
--

DROP TABLE IF EXISTS `users_has_class`;
CREATE TABLE IF NOT EXISTS `users_has_class` (
  `users_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `fk_users_has_class_class1_idx` (`class_id`),
  KEY `fk_users_has_class_users1_idx` (`users_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_has_open`
--

DROP TABLE IF EXISTS `users_has_open`;
CREATE TABLE IF NOT EXISTS `users_has_open` (
  `users_id` int(11) NOT NULL,
  `open_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `fk_users_has_open_open1_idx` (`open_id`),
  KEY `fk_users_has_open_users1_idx` (`users_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `fk_class_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `open`
--
ALTER TABLE `open`
  ADD CONSTRAINT `fk_open_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `fk_schedule_class1` FOREIGN KEY (`class_id`) REFERENCES `class` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `fk_students_class1` FOREIGN KEY (`class_id`) REFERENCES `class` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_students_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `fk_subjects_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `subjects_has_grades`
--
ALTER TABLE `subjects_has_grades`
  ADD CONSTRAINT `fk_subjects_has_grades_subjects1` FOREIGN KEY (`subjects_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `subjects_has_grades_has_students`
--
ALTER TABLE `subjects_has_grades_has_students`
  ADD CONSTRAINT `fk_subjects_has_grades_has_students_students1` FOREIGN KEY (`students_id`) REFERENCES `students` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_subjects_has_grades_has_students_subjects_has_grades1` FOREIGN KEY (`subjects_has_grades_id`) REFERENCES `subjects_has_grades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `terms`
--
ALTER TABLE `terms`
  ADD CONSTRAINT `fk_terms_schedule1` FOREIGN KEY (`schedule_id`) REFERENCES `schedule` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_terms_subjects1` FOREIGN KEY (`subjects_id`) REFERENCES `subjects` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_roles1` FOREIGN KEY (`roles_id`) REFERENCES `role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users_has_class`
--
ALTER TABLE `users_has_class`
  ADD CONSTRAINT `fk_users_has_class_class1` FOREIGN KEY (`class_id`) REFERENCES `class` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_has_class_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users_has_open`
--
ALTER TABLE `users_has_open`
  ADD CONSTRAINT `fk_users_has_open_open1` FOREIGN KEY (`open_id`) REFERENCES `open` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_has_open_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
