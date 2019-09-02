-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 02, 2019 at 08:06 AM
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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `name`, `users_id`, `high_low`) VALUES
(17, '1/4', 4, 0),
(19, '1/1', 4, 0),
(20, '5/1', 4, 1),
(21, '2/1', 4, 0),
(22, '6/1', 5, 1),
(23, '6/2', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `final_grade`
--

DROP TABLE IF EXISTS `final_grade`;
CREATE TABLE IF NOT EXISTS `final_grade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `subject_grade` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `grade` (`subject_grade`),
  KEY `student` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text COLLATE utf8_slovenian_ci NOT NULL,
  `from_user` varchar(45) COLLATE utf8_slovenian_ci NOT NULL,
  `to_user` varchar(45) COLLATE utf8_slovenian_ci NOT NULL,
  `date_and_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `is_read` tinyint(4) DEFAULT '0',
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
  `day_in_week` varchar(45) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `lesson_no` int(1) DEFAULT NULL,
  `subjects_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_terms_subjects1_idx` (`subjects_id`),
  KEY `class_id_idx` (`class_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `day_in_week`, `lesson_no`, `subjects_id`, `class_id`) VALUES
(2, '1', 1, 51, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `class_id`, `users_id`) VALUES
(11, 'Marko ', 'Mirkovic', 17, 9),
(13, 'Marko ', 'Ostojic', 19, 9),
(14, 'Milos', 'Milosevic', 20, 9),
(15, 'Marko ', 'Ostojic', 21, 9),
(16, 'Marko ', 'Ostojic', 22, 11);

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
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `users_id`, `high_low`) VALUES
(51, 'Music', 5, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects_has_grades`
--

INSERT INTO `subjects_has_grades` (`subjects_id`, `grades`, `id`) VALUES
(51, 1, 41),
(51, 2, 42),
(51, 3, 43),
(51, 4, 44),
(51, 5, 45);

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `password`, `cookie`, `roles_id`) VALUES
(3, 'Isidora', 'Nikolic', 'isica', '$2y$10$BdM2tOY4sNp0qiFOfyqyyu.cEr4XJVmKwtfC15/xgT0CKv35iXq6O', '51189664e80868a14cceb62f1603949e', 2),
(4, 'Aleksandar', 'Miljkovic', 'acika', '$2y$10$jtwHKh5tZixgASTiuTjHmuBh901kR7zmlEwH3x9Tea7RZGr3TADAm', '137b09ce771699aa9a3383ebaa272cf7', 1),
(5, 'Milica', 'Petrovic', 'picika', '$2y$10$v9Ka975jcA7bYsyWDC4Gk.W7qioLRpt4O8Y4Xb1ypLr51AF5F9pa6', NULL, 1),
(8, 'AcaMaca', 'Pereca', 'pekica', '$2y$10$WsNtYTuKojOoDNNoXqM.qeXdEWDyOzPOuLfVhEUR0NR4h5eULEQCW', '671fb7404dc322568a201b8f5117c50f', 1),
(9, 'Milojko', 'Petrovic', 'milojko', '$2y$10$yCDXnAYsvg.Wqu76lqRyPundxe7ARn2aQ8lh6LSNqj8GOwwLcsvN6', NULL, 3),
(11, 'Silvana', 'silkica', 'silkica', '$2y$10$wTYmlWyjEcvOl7ygm4RrIeRnKdF5AarG94FUI5ukqJ51L7pGdx7qK', '07b51d5472118f4269a74c45b66d1b76', 4),
(14, 'Silvana', 'Ostojic', 'silkica', '$2y$10$yxmWGGqDIQRbkVbGUahSWOliYrMRDSpjSkPXd1KQE0gOB8eO3p6mq', NULL, 4),
(15, 'john', 'doeh', 'joniiiii', '$2y$10$2o.JLxSl5K6ub1ScPJ/b8uq8ahunx0AUiY9E4.dtNx7Q/5RjaqaPK', NULL, 3);

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
  `accepted` int(11) NOT NULL,
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
  ADD CONSTRAINT `fk_class_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `final_grade`
--
ALTER TABLE `final_grade`
  ADD CONSTRAINT `grade` FOREIGN KEY (`subject_grade`) REFERENCES `subjects_has_grades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `student` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `open`
--
ALTER TABLE `open`
  ADD CONSTRAINT `fk_open_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `class_id` FOREIGN KEY (`class_id`) REFERENCES `class` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_terms_subjects1` FOREIGN KEY (`subjects_id`) REFERENCES `subjects` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `fk_students_class1` FOREIGN KEY (`class_id`) REFERENCES `class` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_students_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_roles1` FOREIGN KEY (`roles_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
