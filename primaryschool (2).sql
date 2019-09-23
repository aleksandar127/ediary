-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 23, 2019 at 09:29 AM
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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `name`, `users_id`, `high_low`) VALUES
(19, '1/1', 19, 0),
(21, '2/1', 9, 0),
(22, '6/1', 18, 1),
(24, '5/1', 21, 1),
(25, '3/1', 26, 0),
(26, '4/1', 27, 0),
(27, '7/1', 4, 1),
(28, '8/1', 23, 1);

-- --------------------------------------------------------

--
-- Table structure for table `excuses`
--

DROP TABLE IF EXISTS `excuses`;
CREATE TABLE IF NOT EXISTS `excuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `students_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `students_id` (`students_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB AUTO_INCREMENT=206 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `final_grade`
--

INSERT INTO `final_grade` (`id`, `student_id`, `subject_grade`) VALUES
(2, 13, 44),
(3, 15, 43),
(6, 13, 59),
(7, 13, 52),
(8, 13, 64),
(9, 36, 49),
(10, 25, 47),
(11, 31, 50),
(12, 42, 49),
(13, 30, 48),
(14, 24, 50),
(15, 15, 49),
(16, 13, 47),
(17, 49, 50),
(19, 46, 49),
(20, 43, 47),
(21, 50, 50),
(22, 48, 47),
(23, 44, 48),
(24, 45, 48),
(25, 28, 70),
(26, 28, 75),
(27, 28, 80),
(28, 28, 85),
(29, 28, 95),
(30, 28, 100),
(31, 36, 55),
(32, 42, 52),
(33, 25, 53),
(34, 31, 53),
(35, 30, 52),
(36, 24, 53),
(37, 15, 54),
(38, 49, 53),
(39, 47, 53),
(40, 43, 55),
(42, 50, 53),
(43, 48, 52),
(44, 45, 54),
(45, 44, 53),
(46, 36, 45),
(47, 25, 45),
(48, 31, 44),
(49, 42, 44),
(50, 30, 45),
(51, 24, 44),
(52, 49, 44),
(53, 47, 45),
(54, 46, 45),
(55, 43, 45),
(56, 50, 45),
(57, 48, 45),
(58, 44, 45),
(59, 45, 44),
(60, 36, 65),
(61, 25, 63),
(62, 31, 62),
(63, 42, 63),
(64, 30, 62),
(65, 24, 63),
(66, 15, 64),
(67, 49, 63),
(68, 47, 64),
(69, 46, 62),
(70, 43, 65),
(71, 50, 63),
(72, 48, 62),
(73, 44, 64),
(74, 45, 63),
(75, 36, 60),
(76, 25, 60),
(77, 31, 60),
(78, 42, 60),
(79, 30, 59),
(80, 24, 59),
(81, 15, 58),
(82, 49, 59),
(83, 47, 60),
(84, 46, 60),
(85, 43, 60),
(86, 50, 58),
(87, 48, 58),
(88, 45, 59),
(89, 44, 60),
(90, 36, 109),
(91, 25, 110),
(92, 31, 109),
(93, 42, 110),
(94, 30, 108),
(95, 24, 110),
(96, 15, 108),
(97, 13, 109),
(98, 49, 110),
(99, 47, 109),
(100, 46, 109),
(101, 43, 110),
(102, 45, 109),
(103, 50, 109),
(104, 48, 107),
(105, 44, 109),
(106, 36, 105),
(107, 25, 105),
(108, 31, 105),
(109, 42, 104),
(110, 30, 105),
(111, 24, 105),
(112, 15, 105),
(113, 13, 105),
(114, 49, 105),
(115, 47, 105),
(116, 46, 105),
(117, 43, 105),
(118, 50, 104),
(119, 48, 105),
(120, 44, 105),
(121, 45, 105),
(122, 36, 113),
(123, 25, 112),
(124, 31, 112),
(125, 42, 114),
(126, 30, 113),
(127, 24, 114),
(128, 15, 112),
(129, 13, 112),
(130, 49, 112),
(131, 47, 112),
(132, 46, 113),
(133, 43, 115),
(134, 50, 112),
(135, 48, 112),
(136, 44, 114),
(137, 45, 113),
(138, 36, 119),
(139, 25, 120),
(140, 42, 119),
(141, 31, 118),
(142, 30, 118),
(143, 24, 119),
(144, 15, 118),
(145, 13, 120),
(146, 49, 119),
(147, 47, 118),
(148, 46, 120),
(149, 43, 120),
(150, 50, 117),
(151, 48, 118),
(152, 44, 119),
(153, 45, 120),
(154, 29, 100),
(155, 29, 68),
(156, 29, 80),
(157, 29, 85),
(158, 29, 95),
(159, 17, 69),
(160, 17, 73),
(161, 17, 79),
(162, 17, 85),
(163, 17, 94),
(164, 17, 99),
(165, 20, 67),
(166, 20, 73),
(167, 20, 80),
(168, 20, 85),
(169, 20, 95),
(170, 20, 99),
(171, 36, 125),
(172, 25, 124),
(173, 31, 125),
(174, 42, 123),
(175, 30, 125),
(176, 24, 124),
(177, 15, 122),
(178, 13, 123),
(179, 49, 123),
(180, 47, 124),
(181, 43, 125),
(182, 46, 122),
(183, 50, 123),
(184, 48, 122),
(185, 44, 124),
(186, 45, 123),
(187, 29, 74),
(188, 32, 67),
(189, 32, 72),
(190, 32, 79),
(191, 32, 84),
(192, 32, 95),
(193, 32, 100),
(194, 37, 69),
(195, 37, 75),
(196, 37, 80),
(197, 37, 85),
(198, 37, 95),
(199, 37, 99),
(200, 39, 69),
(201, 39, 72),
(202, 39, 79),
(203, 39, 85),
(204, 39, 95),
(205, 39, 99);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` mediumtext NOT NULL,
  `from_user` varchar(45) NOT NULL,
  `to_user` varchar(45) NOT NULL,
  `date_and_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `is_read` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `message`, `from_user`, `to_user`, `date_and_time`, `is_read`) VALUES
(1, 'nkbkb', '4', '9', '2019-09-07 07:33:48', 1),
(2, 'bn j vgh jj ', '9', '4', '2019-09-07 07:50:43', 1),
(3, 'hhh', '4', '9', '2019-09-07 14:13:00', 1),
(4, 'hhhhhhhhhhhhhhh hhhhhhhhhhh hhhhhhhhhh hhhhh', '4', '9', '2019-09-07 14:13:49', 1),
(5, 'gospođo,vaše dete je debil', '4', '44', '2019-09-14 21:04:05', 0),
(6, 'kada?', '14', '21', '2019-09-16 08:29:58', 0),
(7, 'Kada mogu da dođem?', '48', '4', '2019-09-23 08:36:39', 0),
(8, 'vidimo se.', '33', '19', '2019-09-23 09:06:01', 0);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `notifications` mediumtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `notifications`) VALUES
(1, 'Ekskurzia pocinje 20.09.2019.'),
(2, 'Roditeljski sastanak za odeljenje 8/1 povodom maturske ekskurzije održaće se 29.09.2019. u učionici broj 11.'),
(3, 'Obaveštenje za roditelje - Besplatni udžbenici\r\nPravo na besplatne udžbenike u Projektu „Nabavka udžbenika i drugih nastavnih sredstava za učenike osnovnih škole“ ostvaruju sledeće kategorije:\r\n\r\nUčenici iz socijalno/materijalno ugroženih porodica, primaoci socijalne pomoći\r\nUčenici sa smetnjama u razvoju i invaliditetom (koji nastavu prate po individualno-obrazovnom planu)\r\nUčenici osnovne škole koji su u porodici treće i svako naredno rođeno dete koje je u sistemu školovanja'),
(4, 'Prijava počinje 1. aprila i traje do 30.maja, upisuju se rođeni od 1.marta 2012. do 28 februara 2013, uz obavezu da su primili DT, OPV i MMR vakcine.'),
(5, 'Poštovani roditelji i učenici, drugo polugodište školske 2018/2019. godine počinje u ponedeljak, 25. februara 2019. Prvi i treći razred je u prepodnevnoj smeni. Ako bude ikakvih promena, na sajtu škole će biti obaveštenje.'),
(6, 'На основу одлуке Министарства просвете,науке и технолошког развоја и Закона о уџбеницима, Стручна већа учитеља и наставника извршила су избор уџбеника за наредну школску годину за ученике другог и шестог разреда.\r\n\r\nИнформације о избору уџбеника за 2018/ 2019. можете погледати овде\r\n\r\n Списак уџбеника другог и шестог разреда за шк. 2019/ 2020. годину можете погледати овде'),
(7, 'Gradska opština Zvezdara shodno članu 14. tačka 14. Statuta („Službeni list grada Beograda“ broj 43/08, 43/09, 15/10, 13/13, 36/13 i 41/13-ispr.) obaveštava roditelje/staratelje budućih đaka prvaka da u školsku 2015/2016. godinu u prvi razred osnovne škole treba da budu upisana sva deca koja na dan početka školske godine 01. septembra 2015. godine, imaju najmanje šest i po, a najviše sedam i po godina, odnosno deca rođena od 01.03.2008. do 01.03.2009. godine.\r\n\r\nPrijavljivanje dece za upis u prvi razred osnovne škole obavezni su da izvrše roditelji, a za decu pod starateljstvom, staratelj ili organ starateljstva.');

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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `open`
--

INSERT INTO `open` (`id`, `time`, `users_id`) VALUES
(5, '2019-09-26 01:00:00', 4),
(6, '2019-09-26 17:00:00', 23),
(11, '2019-10-09 00:00:00', 20),
(12, '2019-10-15 00:00:00', 21),
(13, '2019-10-01 00:00:00', 22),
(14, '2019-10-27 00:00:00', 24),
(15, '2019-10-16 00:00:00', 25),
(18, '2019-10-17 00:00:00', 30),
(20, '2019-10-10 16:00:00', 26),
(21, '2019-09-25 17:00:00', 27),
(22, '2019-09-29 18:00:00', 9),
(23, '2019-09-26 19:00:00', 19),
(24, '2019-09-27 13:00:00', 17),
(25, '2019-09-30 18:30:00', 18);

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
  `day_in_week` varchar(45) DEFAULT NULL,
  `lesson_no` int(1) DEFAULT NULL,
  `subjects_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_terms_subjects1_idx` (`subjects_id`),
  KEY `class_id_idx` (`class_id`)
) ENGINE=InnoDB AUTO_INCREMENT=287 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `day_in_week`, `lesson_no`, `subjects_id`, `class_id`) VALUES
(4, '1', 1, 56, 19),
(5, '2', 1, 56, 19),
(6, '3', 1, 61, 19),
(7, '4', 1, 57, 19),
(8, '5', 1, 56, 19),
(9, '1', 2, 58, 19),
(10, '2', 2, 57, 19),
(11, '3', 2, 62, 19),
(12, '4', 2, 62, 19),
(13, '5', 2, 58, 19),
(14, '1', 3, 59, 19),
(15, '2', 3, 59, 19),
(16, '3', 3, 59, 19),
(17, '4', 3, 59, 19),
(18, '5', 3, 61, 19),
(19, '1', 4, 62, 19),
(20, '2', 4, 58, 19),
(21, '3', 4, 59, 19),
(22, '4', 4, 58, 19),
(23, '5', 4, 56, 19),
(24, '1', 5, 58, 19),
(25, '2', 5, 57, 19),
(26, '3', 5, 59, 19),
(27, '4', 5, 57, 19),
(28, '5', 5, 59, 19),
(29, '1', 6, 61, 19),
(30, '2', 6, 62, 19),
(31, '3', 6, 62, 19),
(32, '4', 6, 61, 19),
(33, '5', 6, 57, 19),
(34, '1', 7, 62, 19),
(35, '2', 7, 58, 19),
(36, '1', 1, 58, 21),
(37, '2', 1, 59, 21),
(38, '3', 1, 58, 21),
(39, '4', 1, 59, 21),
(40, '5', 1, 59, 21),
(41, '1', 2, 56, 21),
(42, '2', 2, 58, 21),
(43, '3', 2, 61, 21),
(44, '4', 2, 57, 21),
(45, '5', 2, 57, 21),
(46, '1', 3, 57, 21),
(47, '2', 3, 61, 21),
(48, '3', 3, 58, 21),
(49, '4', 3, 61, 21),
(50, '5', 3, 56, 21),
(51, '1', 4, 56, 21),
(52, '2', 4, 57, 21),
(53, '3', 4, 61, 21),
(54, '4', 4, 61, 21),
(55, '5', 4, 59, 21),
(56, '1', 5, 61, 21),
(57, '2', 5, 59, 21),
(58, '3', 5, 56, 21),
(59, '4', 5, 56, 21),
(60, '5', 5, 57, 21),
(61, '1', 6, 59, 21),
(62, '2', 6, 58, 21),
(63, '3', 6, 57, 21),
(64, '4', 6, 57, 21),
(65, '5', 6, 58, 21),
(66, '1', 7, 58, 21),
(67, '2', 7, 59, 21),
(68, '1', 1, 57, 25),
(69, '2', 1, 57, 25),
(70, '3', 1, 57, 25),
(71, '4', 1, 62, 25),
(72, '5', 1, 57, 25),
(73, '1', 2, 61, 25),
(74, '2', 2, 61, 25),
(75, '3', 2, 57, 25),
(76, '4', 2, 61, 25),
(77, '5', 2, 56, 25),
(78, '1', 3, 58, 25),
(79, '2', 3, 58, 25),
(80, '3', 3, 61, 25),
(81, '4', 3, 58, 25),
(82, '5', 3, 57, 25),
(83, '1', 4, 58, 25),
(84, '2', 4, 61, 25),
(85, '3', 4, 56, 25),
(86, '4', 4, 56, 25),
(87, '5', 4, 61, 25),
(88, '1', 5, 56, 25),
(89, '2', 5, 62, 25),
(90, '3', 5, 58, 25),
(91, '4', 5, 58, 25),
(92, '5', 5, 58, 25),
(93, '1', 6, 57, 25),
(94, '2', 6, 61, 25),
(95, '3', 6, 59, 25),
(96, '4', 6, 62, 25),
(97, '5', 6, 61, 25),
(98, '1', 7, 61, 25),
(99, '2', 7, 62, 25),
(100, '1', 1, 61, 26),
(101, '2', 1, 61, 26),
(102, '3', 1, 59, 26),
(103, '4', 1, 56, 26),
(104, '5', 1, 61, 26),
(105, '1', 2, 62, 26),
(106, '2', 2, 62, 26),
(107, '3', 2, 58, 26),
(108, '4', 2, 56, 26),
(109, '5', 2, 62, 26),
(110, '1', 3, 56, 26),
(111, '2', 3, 57, 26),
(112, '3', 3, 62, 26),
(113, '4', 3, 57, 26),
(114, '5', 3, 62, 26),
(115, '1', 4, 61, 26),
(116, '2', 4, 59, 26),
(117, '3', 4, 62, 26),
(118, '4', 4, 62, 26),
(119, '5', 4, 62, 26),
(120, '1', 5, 59, 26),
(121, '2', 5, 56, 26),
(122, '3', 5, 62, 26),
(123, '4', 5, 61, 26),
(124, '5', 5, 61, 26),
(125, '1', 6, 58, 26),
(126, '2', 6, 59, 26),
(127, '3', 6, 61, 26),
(128, '4', 6, 59, 26),
(129, '5', 6, 56, 26),
(130, '1', 7, 57, 26),
(131, '2', 7, 56, 26),
(132, '1', 1, 53, 24),
(133, '2', 1, 51, 24),
(134, '3', 1, 55, 24),
(135, '4', 1, 52, 24),
(136, '5', 1, 65, 24),
(137, '1', 2, 53, 24),
(138, '2', 2, 51, 24),
(139, '3', 2, 55, 24),
(140, '4', 2, 55, 24),
(141, '5', 2, 51, 24),
(142, '1', 3, 63, 24),
(143, '2', 3, 52, 24),
(144, '3', 3, 52, 24),
(145, '4', 3, 65, 24),
(146, '5', 3, 54, 24),
(147, '1', 4, 63, 24),
(148, '2', 4, 52, 24),
(149, '3', 4, 51, 24),
(150, '4', 4, 65, 24),
(151, '5', 4, 67, 24),
(152, '1', 5, 65, 24),
(153, '2', 5, 65, 24),
(154, '3', 5, 63, 24),
(155, '4', 5, 66, 24),
(156, '5', 5, 52, 24),
(157, '1', 6, 67, 24),
(158, '2', 6, 66, 24),
(159, '3', 6, 64, 24),
(160, '4', 6, 66, 24),
(161, '5', 6, 66, 24),
(162, '1', 7, 66, 24),
(163, '2', 7, 55, 24),
(164, '1', 1, 54, 22),
(165, '2', 1, 55, 22),
(166, '3', 1, 51, 22),
(167, '4', 1, 53, 22),
(168, '5', 1, 66, 22),
(169, '1', 2, 65, 22),
(170, '2', 2, 55, 22),
(171, '3', 2, 53, 22),
(172, '4', 2, 52, 22),
(173, '5', 2, 55, 22),
(174, '1', 3, 66, 22),
(175, '2', 3, 67, 22),
(176, '3', 3, 63, 22),
(177, '4', 3, 52, 22),
(178, '5', 3, 51, 22),
(179, '1', 4, 66, 22),
(180, '2', 4, 67, 22),
(181, '3', 4, 63, 22),
(182, '4', 4, 64, 22),
(183, '5', 4, 64, 22),
(184, '1', 5, 64, 22),
(185, '2', 5, 64, 22),
(186, '3', 5, 66, 22),
(187, '4', 5, 54, 22),
(188, '5', 5, 64, 22),
(189, '1', 6, 51, 22),
(190, '2', 6, 53, 22),
(191, '3', 6, 66, 22),
(192, '4', 6, 63, 22),
(193, '5', 6, 65, 22),
(194, '1', 7, 55, 22),
(195, '2', 7, 53, 22),
(196, '1', 1, 55, 27),
(197, '2', 1, 63, 27),
(198, '3', 1, 52, 27),
(199, '4', 1, 51, 27),
(200, '5', 1, 67, 27),
(201, '1', 2, 63, 27),
(202, '2', 2, 63, 27),
(203, '3', 2, 52, 27),
(204, '4', 2, 51, 27),
(205, '5', 2, 52, 27),
(206, '1', 3, 51, 27),
(207, '2', 3, 64, 27),
(208, '3', 3, 54, 27),
(209, '4', 3, 63, 27),
(210, '5', 3, 53, 27),
(211, '1', 4, 55, 27),
(212, '2', 4, 64, 27),
(213, '3', 4, 64, 27),
(214, '4', 4, 66, 27),
(215, '5', 4, 55, 27),
(216, '1', 5, 63, 27),
(217, '2', 5, 54, 27),
(218, '3', 5, 65, 27),
(219, '4', 5, 67, 27),
(220, '5', 5, 53, 27),
(221, '1', 6, 65, 27),
(222, '2', 6, 52, 27),
(223, '3', 6, 63, 27),
(224, '4', 6, 55, 27),
(225, '5', 6, 55, 27),
(226, '1', 7, 52, 27),
(227, '2', 7, 52, 27),
(228, '1', 1, 66, 28),
(229, '2', 1, 54, 28),
(230, '3', 1, 67, 28),
(231, '4', 1, 64, 28),
(232, '5', 1, 53, 28),
(233, '1', 2, 66, 28),
(234, '2', 2, 65, 28),
(235, '3', 2, 65, 28),
(236, '4', 2, 67, 28),
(237, '5', 2, 66, 28),
(238, '1', 3, 54, 28),
(239, '2', 3, 65, 28),
(240, '3', 3, 53, 28),
(241, '4', 3, 51, 28),
(242, '5', 3, 66, 28),
(243, '1', 4, 53, 28),
(244, '2', 4, 55, 28),
(245, '3', 4, 52, 28),
(246, '4', 4, 52, 28),
(247, '5', 4, 52, 28),
(248, '1', 5, 52, 28),
(249, '2', 5, 52, 28),
(250, '3', 5, 52, 28),
(251, '4', 5, 63, 28),
(252, '5', 5, 51, 28),
(253, '1', 6, 52, 28),
(254, '2', 6, 55, 28),
(255, '3', 6, 55, 28),
(256, '4', 6, 54, 28),
(257, '5', 6, 52, 28),
(258, '1', 7, 67, 28),
(259, '2', 7, 66, 28),
(260, '3', 7, 62, 19),
(262, '4', 7, 62, 19),
(263, '5', 7, 62, 19),
(264, '4', 7, 59, 21),
(265, '3', 7, 59, 21),
(266, '5', 7, 59, 21),
(267, '4', 7, 57, 25),
(268, '3', 7, 57, 25),
(269, '5', 7, 59, 25),
(270, '3', 7, 57, 26),
(271, '4', 7, 57, 26),
(272, '5', 7, 58, 26),
(273, '3', 7, 63, 24),
(274, '4', 7, 63, 24),
(275, '5', 7, 63, 24),
(278, '3', 7, 54, 22),
(279, '4', 7, 54, 22),
(280, '5', 7, 54, 22),
(281, '3', 7, 53, 27),
(282, '4', 7, 53, 27),
(283, '5', 7, 53, 27),
(284, '3', 7, 52, 28),
(285, '4', 7, 52, 28),
(286, '5', 7, 52, 28);

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
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `class_id`, `users_id`) VALUES
(13, 'Marko', 'Petrovic', 22, 14),
(15, 'dejan', 'Petrovic', 22, 14),
(17, 'Nikola', 'Petrovic', 19, 14),
(18, 'Ivan', 'Micić', 25, 28),
(19, 'Jovan', 'jokić', 26, 29),
(20, 'Nina', 'lukić', 19, 31),
(21, 'radmila', 'banović', 19, 32),
(22, 'mihailo', 'lukić', 19, 33),
(23, 'stefan', 'nedeljković', 19, 34),
(24, 'mian', 'nedeljković', 22, 34),
(25, 'nikola', 'matić', 24, 35),
(26, 'miloš', 'matić', 19, 35),
(27, 'stefan', 'jovanović', 19, 21),
(28, 'aleksandar', 'jovanović', 21, 41),
(29, 'milena', 'jović', 21, 37),
(30, 'igor', 'jović', 22, 37),
(31, 'jelena', 'mijatović', 24, 38),
(32, 'predrag', 'mijatović', 21, 38),
(33, 'đorđe', 'đoković', 25, 39),
(34, 'nenad', 'đoković', 26, 39),
(35, 'ivana', 'marić', 26, 40),
(36, 'anja', 'marić', 24, 40),
(37, 'andrea', 'obradović', 21, 41),
(38, 'tanja', 'obradović', 26, 41),
(39, 'nikola', 'nedić', 21, 42),
(40, 'ivan', 'nedić', 26, 42),
(41, 'bogdan', 'mitić', 25, 43),
(42, 'marijana', 'mitić', 24, 43),
(43, 'jelena', 'rodić', 27, 44),
(44, 'boris', 'milović', 28, 45),
(45, 'ognjen', 'raspopović', 28, 46),
(46, 'perica', 'raspopović', 27, 46),
(47, 'marinko', 'ivanović', 27, 47),
(48, 'nebojša', 'ivanović', 28, 47),
(49, 'strahinja', 'erović', 27, 48),
(50, 'goca', 'erović', 28, 48);

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
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `users_id`, `high_low`) VALUES
(51, 'muzičko vaspitanje', 18, 1),
(52, 'matematika', 4, 1),
(53, 'hemija', 17, 1),
(54, 'likovno vaspitanje', 21, 1),
(55, 'srpski jezik', 20, 1),
(56, 'srpski jezik', NULL, 0),
(57, 'matematika', NULL, 0),
(58, 'likovno vaspitanje', NULL, 0),
(59, 'fizičko vaspitanje', NULL, 0),
(61, 'muzičko vaspitanje', NULL, 0),
(62, 'Svet oko nas', NULL, 0),
(63, 'fizičko vaspitanje', 23, 1),
(64, 'geografija', 22, 1),
(65, 'fizika', 24, 1),
(66, 'engleski jezik', 25, 1),
(67, 'biologija', 30, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects_has_grades`
--

INSERT INTO `subjects_has_grades` (`subjects_id`, `grades`, `id`) VALUES
(51, 1, 41),
(51, 2, 42),
(51, 3, 43),
(51, 4, 44),
(51, 5, 45),
(52, 1, 46),
(52, 2, 47),
(52, 3, 48),
(52, 4, 49),
(52, 5, 50),
(53, 1, 51),
(53, 2, 52),
(53, 3, 53),
(53, 4, 54),
(53, 5, 55),
(54, 1, 56),
(54, 2, 57),
(54, 3, 58),
(54, 4, 59),
(54, 5, 60),
(55, 1, 61),
(55, 2, 62),
(55, 3, 63),
(55, 4, 64),
(55, 5, 65),
(56, 1, 66),
(56, 2, 67),
(56, 3, 68),
(56, 4, 69),
(56, 5, 70),
(57, 1, 71),
(57, 2, 72),
(57, 3, 73),
(57, 4, 74),
(57, 5, 75),
(58, 1, 76),
(58, 2, 77),
(58, 3, 78),
(58, 4, 79),
(58, 5, 80),
(59, 1, 81),
(59, 2, 82),
(59, 3, 83),
(59, 4, 84),
(59, 5, 85),
(61, 1, 91),
(61, 2, 92),
(61, 3, 93),
(61, 4, 94),
(61, 5, 95),
(62, 1, 96),
(62, 2, 97),
(62, 3, 98),
(62, 4, 99),
(62, 5, 100),
(63, 1, 101),
(63, 2, 102),
(63, 3, 103),
(63, 4, 104),
(63, 5, 105),
(64, 1, 106),
(64, 2, 107),
(64, 3, 108),
(64, 4, 109),
(64, 5, 110),
(65, 1, 111),
(65, 2, 112),
(65, 3, 113),
(65, 4, 114),
(65, 5, 115),
(66, 1, 116),
(66, 2, 117),
(66, 3, 118),
(66, 4, 119),
(66, 5, 120),
(67, 1, 121),
(67, 2, 122),
(67, 3, 123),
(67, 4, 124),
(67, 5, 125);

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
) ENGINE=InnoDB AUTO_INCREMENT=326 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects_has_grades_has_students`
--

INSERT INTO `subjects_has_grades_has_students` (`students_id`, `subjects_has_grades_id`, `id`) VALUES
(15, 50, 16),
(17, 49, 20),
(17, 42, 21),
(15, 57, 22),
(17, 58, 23),
(36, 48, 24),
(36, 47, 25),
(36, 50, 26),
(36, 49, 27),
(25, 46, 28),
(25, 47, 29),
(25, 48, 30),
(31, 50, 31),
(31, 50, 32),
(31, 50, 33),
(42, 48, 34),
(42, 49, 35),
(42, 49, 36),
(30, 48, 37),
(30, 49, 38),
(30, 46, 39),
(30, 50, 40),
(24, 50, 41),
(24, 49, 42),
(24, 50, 43),
(15, 50, 44),
(15, 47, 46),
(13, 47, 48),
(13, 46, 49),
(13, 47, 50),
(49, 49, 51),
(49, 50, 52),
(49, 50, 53),
(47, 47, 54),
(47, 47, 55),
(47, 50, 56),
(46, 50, 57),
(46, 48, 58),
(46, 48, 59),
(50, 50, 63),
(50, 50, 64),
(50, 49, 65),
(48, 48, 66),
(48, 48, 67),
(48, 46, 68),
(44, 46, 69),
(44, 49, 70),
(44, 48, 71),
(28, 69, 75),
(28, 69, 76),
(28, 75, 77),
(28, 74, 78),
(28, 80, 79),
(28, 80, 80),
(28, 85, 81),
(28, 95, 82),
(28, 100, 83),
(28, 70, 84),
(29, 68, 85),
(50, 45, 86),
(44, 45, 87),
(44, 44, 88),
(36, 55, 89),
(36, 54, 90),
(42, 51, 91),
(42, 53, 92),
(25, 52, 93),
(25, 52, 94),
(25, 55, 95),
(31, 53, 96),
(31, 52, 97),
(30, 53, 98),
(30, 51, 99),
(24, 54, 100),
(24, 51, 101),
(15, 55, 102),
(15, 52, 103),
(13, 52, 104),
(13, 52, 105),
(46, 51, 106),
(46, 52, 107),
(47, 54, 108),
(47, 54, 109),
(49, 53, 110),
(49, 52, 111),
(43, 54, 112),
(43, 55, 113),
(50, 54, 114),
(50, 51, 115),
(48, 51, 116),
(48, 52, 117),
(44, 55, 118),
(44, 51, 119),
(45, 54, 120),
(45, 53, 121),
(36, 45, 122),
(36, 45, 123),
(25, 45, 124),
(25, 44, 125),
(31, 44, 126),
(31, 43, 127),
(42, 43, 128),
(42, 45, 129),
(30, 45, 130),
(30, 45, 131),
(24, 44, 132),
(24, 44, 133),
(15, 45, 134),
(15, 41, 135),
(13, 44, 136),
(13, 44, 137),
(49, 44, 138),
(49, 43, 139),
(47, 45, 140),
(46, 45, 141),
(43, 45, 142),
(48, 45, 143),
(45, 44, 144),
(36, 65, 145),
(25, 63, 146),
(31, 62, 147),
(42, 63, 148),
(30, 62, 149),
(24, 63, 150),
(15, 64, 151),
(13, 64, 152),
(49, 63, 153),
(47, 64, 154),
(46, 62, 155),
(43, 65, 156),
(50, 63, 157),
(48, 62, 158),
(44, 64, 159),
(45, 63, 160),
(36, 60, 161),
(25, 60, 162),
(31, 60, 163),
(42, 60, 164),
(30, 59, 165),
(24, 59, 166),
(15, 58, 167),
(13, 59, 168),
(49, 59, 169),
(47, 60, 170),
(46, 60, 171),
(43, 60, 172),
(44, 60, 173),
(48, 58, 174),
(45, 59, 175),
(50, 58, 176),
(36, 109, 177),
(25, 110, 178),
(31, 109, 179),
(42, 110, 180),
(30, 108, 181),
(24, 110, 182),
(15, 108, 183),
(13, 109, 184),
(49, 110, 185),
(47, 109, 186),
(46, 109, 187),
(43, 110, 188),
(45, 109, 189),
(50, 109, 190),
(48, 107, 191),
(44, 109, 192),
(36, 105, 193),
(25, 105, 194),
(31, 105, 195),
(42, 104, 196),
(30, 105, 197),
(24, 105, 198),
(15, 105, 199),
(13, 105, 200),
(47, 105, 201),
(49, 105, 202),
(46, 105, 203),
(43, 105, 204),
(50, 104, 205),
(48, 105, 206),
(44, 105, 207),
(45, 105, 208),
(36, 113, 209),
(25, 112, 210),
(31, 112, 211),
(42, 114, 212),
(30, 113, 213),
(24, 114, 214),
(15, 112, 215),
(13, 112, 216),
(49, 112, 217),
(47, 112, 218),
(46, 113, 219),
(43, 115, 220),
(50, 112, 221),
(48, 112, 222),
(44, 115, 223),
(45, 113, 224),
(36, 119, 225),
(25, 120, 226),
(42, 119, 227),
(31, 118, 228),
(30, 118, 229),
(24, 119, 230),
(15, 118, 231),
(13, 120, 232),
(49, 119, 233),
(47, 118, 234),
(46, 120, 235),
(43, 120, 236),
(50, 117, 237),
(48, 118, 238),
(44, 119, 239),
(45, 120, 240),
(29, 74, 241),
(29, 85, 242),
(29, 80, 243),
(29, 95, 244),
(29, 100, 245),
(29, 74, 246),
(17, 69, 247),
(17, 73, 248),
(17, 79, 249),
(17, 85, 250),
(17, 94, 251),
(17, 99, 252),
(20, 67, 253),
(20, 73, 254),
(20, 80, 255),
(20, 85, 256),
(20, 95, 257),
(20, 99, 258),
(18, 67, 259),
(18, 72, 260),
(18, 79, 261),
(18, 85, 262),
(18, 94, 263),
(18, 98, 264),
(33, 69, 265),
(33, 75, 266),
(33, 80, 267),
(33, 85, 268),
(33, 95, 269),
(33, 100, 270),
(19, 70, 271),
(19, 75, 272),
(19, 80, 273),
(19, 85, 274),
(19, 95, 275),
(19, 100, 276),
(35, 70, 277),
(34, 74, 278),
(34, 68, 279),
(34, 80, 280),
(34, 85, 281),
(34, 85, 282),
(34, 94, 283),
(34, 98, 284),
(36, 125, 285),
(25, 124, 286),
(31, 125, 287),
(42, 123, 288),
(30, 125, 289),
(24, 124, 290),
(15, 122, 291),
(13, 123, 292),
(49, 123, 293),
(47, 124, 294),
(43, 125, 295),
(46, 122, 296),
(50, 123, 297),
(48, 122, 298),
(44, 124, 299),
(45, 123, 300),
(21, 69, 301),
(22, 85, 302),
(23, 99, 303),
(26, 73, 304),
(27, 68, 305),
(32, 84, 306),
(37, 68, 307),
(39, 95, 308),
(46, 54, 309),
(32, 68, 310),
(32, 72, 311),
(32, 79, 312),
(32, 95, 313),
(32, 100, 314),
(37, 80, 315),
(37, 75, 316),
(37, 85, 317),
(37, 95, 318),
(37, 99, 319),
(39, 69, 320),
(39, 72, 321),
(39, 79, 322),
(39, 85, 323),
(39, 99, 324),
(32, 66, 325);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `cookie` varchar(255) DEFAULT NULL,
  `roles_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_users_roles1_idx` (`roles_id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `password`, `cookie`, `roles_id`) VALUES
(3, 'Isidora', 'Nikolic', 'isica', '$2y$10$BdM2tOY4sNp0qiFOfyqyyu.cEr4XJVmKwtfC15/xgT0CKv35iXq6O', 'd70107c649e184a15aeaaefbf055e76e', 2),
(4, 'Aleksandar', 'Marković', 'acika', '$2y$10$jtwHKh5tZixgASTiuTjHmuBh901kR7zmlEwH3x9Tea7RZGr3TADAm', '940c43d1360ee8415f212b5d39d77386', 1),
(9, 'Milojko', 'Petrovic', 'milojko', '$2y$10$yCDXnAYsvg.Wqu76lqRyPundxe7ARn2aQ8lh6LSNqj8GOwwLcsvN6', '9c0fc9e88cbd4206b5ca3e9326abebba', 3),
(14, 'Silvana', 'Ostojic', 'silkica', '$2y$10$yxmWGGqDIQRbkVbGUahSWOliYrMRDSpjSkPXd1KQE0gOB8eO3p6mq', '81b9924b26c2df22c751ebdb0b62b869', 4),
(16, 'Nenad', 'nikolić', 'nenad', '$2y$10$yCDXnAYsvg.Wqu76lqRyPundxe7ARn2aQ8lh6LSNqj8GOwwLcsvN6', '7a0dd26fd95daddcfcad5c8f34721ed3', 5),
(17, 'Nemanja', 'stanković', 'nemanja', '$2y$10$Ui6Y1zJv4P7mZD7Mp2zexeeRA8ju9A1ZkQkhY8A1E4h1RVQixtew6', 'bbcf844a44d941351478d6b54e7e9f91', 1),
(18, 'Pavaroti', 'jovanović', 'pavaroti', '$2y$10$MTEn.sCGyO3TYjGstsTS5udr367huv.x1nyDm/djyJNAA5xl6Vpzy', '5095f62e414d60230a616c94b44d35f8', 1),
(19, 'marijan', 'Despotović', 'marijan', '$2y$10$wGxnU/ZCmkd1XZUw7XOF2OC9CimXeykfAb1usXId2S1ZH2.i2lJd2', '64ab0e5c0fd5f73d74de00006f0e4106', 3),
(20, 'Miki', 'jugović', 'miki', '$2y$10$48zaEXaFfJhGc6hP2AzjoOW64kZXKp.k0Nt7CM99IbtbGDbFXTPqy', '06c101a76e5ac0d32ff69d46d32d86a1', 1),
(21, 'ana', 'stanojković', 'anaana', '$2y$10$Y7JlDsB8uFUbBMIVYpSg5e9OVed98Uak3dSfouGUmt.vbIo6nO/6C', 'e9d8b29f16ced20b03a7ebd4ce71fabe', 1),
(22, 'mile', 'rakić', 'mile', '$2y$10$BdM2tOY4sNp0qiFOfyqyyu.cEr4XJVmKwtfC15/xgT0CKv35iXq6O', '0cb3011f52ef740199cabb639756271e', 1),
(23, 'Momčilo', 'martać', 'momčilo', '$2y$10$BdM2tOY4sNp0qiFOfyqyyu.cEr4XJVmKwtfC15/xgT0CKv35iXq6O', '569a078a1ba06170a5fa32fdb72e7243', 1),
(24, 'mileva', 'mihajlović', 'mileva', '$2y$10$BdM2tOY4sNp0qiFOfyqyyu.cEr4XJVmKwtfC15/xgT0CKv35iXq6O', '25bdacdf19f84c6165653d3c4e167310', 1),
(25, 'danijela', 'milić', 'danijela', '$2y$10$riWbu1sqZ4KGcSFgX2TzjOR4suYNXriA7U6AyXuO5lE4qJi87ZzqK', 'c0e6077fc2a480169e2be28ca07ca8a0', 1),
(26, 'jelena', 'Jovanović', 'jelena', '$2y$10$guzziuEjI2xdiNzhXeGC/enYLTqGiaRb8VCRdC0Bqq1vsa1Q3DVqO', '3aab1117e08c855efcc051ca5dfc1222', 3),
(27, 'Marija', 'petković', 'marija', '$2y$10$xNwCRVWn9nnHFcDQI70GbOmLqLhNuYTCUBDirro1pYycWiLYmmjp.', '764cbef1dd4ca8ffe79890ccfaa7a2c1', 3),
(28, 'Miloš', 'Micić', 'miloš', '$2y$10$KDEStQRQQrmpL6YNw6vaCeGIq9et9Um/pb/yCiLunlAKvxBkuZP0a', '31a80aab1b0f49181cc2ded3c0076553', 4),
(29, 'Predrag', 'Jokić', 'predrag', '$2y$10$wX0k.QylZf5dAhkzm0ndTOhQdHhoeFDATCcIudSeavA2HzvrYPzzC', '648ad6120b1c8cc5d94ae402c469bf13', 4),
(30, 'Dragan', 'smiljanić', 'dragan', '$2y$10$5zgV0lXfM1/K.c9fBEb06u0j4kLl.lW0hT39kNPYHomt9O2V7Yj5O', 'fbeaf674091f809aabbeb49500b2011b', 1),
(31, 'Marina', 'lukić', 'marina', '$2y$10$jtwHKh5tZixgASTiuTjHmuBh901kR7zmlEwH3x9Tea7RZGr3TADAm', NULL, 4),
(32, 'nevena', 'banović', 'nevena', '$2y$10$jtwHKh5tZixgASTiuTjHmuBh901kR7zmlEwH3x9Tea7RZGr3TADAm', NULL, 4),
(33, 'milica', 'lukić', 'milica', '$2y$10$jtwHKh5tZixgASTiuTjHmuBh901kR7zmlEwH3x9Tea7RZGr3TADAm', '71370122888e452bc93b78a7f461659a', 4),
(34, 'tamara', 'nedeljković', 'tamara', '$2y$10$jtwHKh5tZixgASTiuTjHmuBh901kR7zmlEwH3x9Tea7RZGr3TADAm', NULL, 4),
(35, 'svetlana', 'matić', 'svetlana', '$2y$10$jtwHKh5tZixgASTiuTjHmuBh901kR7zmlEwH3x9Tea7RZGr3TADAm', NULL, 4),
(36, 'anja', 'jovanović', 'anja', '$2y$10$jtwHKh5tZixgASTiuTjHmuBh901kR7zmlEwH3x9Tea7RZGr3TADAm', NULL, 4),
(37, 'lidija', 'jović', 'lidija', '$2y$10$jtwHKh5tZixgASTiuTjHmuBh901kR7zmlEwH3x9Tea7RZGr3TADAm', '40a3a52f5665e31773113849011fc7a4', 4),
(38, 'tijana', 'mijatović', 'tijana', '$2y$10$jtwHKh5tZixgASTiuTjHmuBh901kR7zmlEwH3x9Tea7RZGr3TADAm', '1e3d2c3860f4dd2a1e317491fbb6cca7', 4),
(39, 'novak', 'đoković', 'novak', '$2y$10$jtwHKh5tZixgASTiuTjHmuBh901kR7zmlEwH3x9Tea7RZGr3TADAm', NULL, 4),
(40, 'uroš', 'marić', 'uroš', '$2y$10$jtwHKh5tZixgASTiuTjHmuBh901kR7zmlEwH3x9Tea7RZGr3TADAm', NULL, 4),
(41, 'sanja', 'obradović', 'sanja', '$2y$10$jtwHKh5tZixgASTiuTjHmuBh901kR7zmlEwH3x9Tea7RZGr3TADAm', 'a097f31d4a9755e391f6000f7cf77d55', 4),
(42, 'isidora', 'nedić', 'isidora', '$2y$10$jtwHKh5tZixgASTiuTjHmuBh901kR7zmlEwH3x9Tea7RZGr3TADAm', 'cdc9763832777947d6897067bda248cf', 4),
(43, 'goran', 'mitić', 'goran', '$2y$10$jtwHKh5tZixgASTiuTjHmuBh901kR7zmlEwH3x9Tea7RZGr3TADAm', NULL, 4),
(44, 'stefana', 'rodić', 'stefana', '$2y$10$cbhQc2NEyWnqS0Ttcy2P1uas8LHZ4rZkMxn0y41N.5PklWYsWkXRW', '3ffaea4d74e5d5ef4adc3709069f04c4', 4),
(45, 'zoran', 'milović', 'zoran', '$2y$10$lYwUmvSppYzGBOWA8fAtpOF44j9HgA3iPIIYIrb.TEjcidhJFE6ke', NULL, 4),
(46, 'feđa', 'raspopović', 'feđa', '$2y$10$jtwHKh5tZixgASTiuTjHmuBh901kR7zmlEwH3x9Tea7RZGr3TADAm', 'b663385c70e6dc2c93fcb640cc5d18a6', 4),
(47, 'ognjen', 'ivanović', 'ognjen', '$2y$10$jtwHKh5tZixgASTiuTjHmuBh901kR7zmlEwH3x9Tea7RZGr3TADAm', 'a611d29411d1a107e57ec8eac3a0e187', 4),
(48, 'marica', 'erović', 'marica', '$2y$10$jtwHKh5tZixgASTiuTjHmuBh901kR7zmlEwH3x9Tea7RZGr3TADAm', 'bc888509c0d3a9b87c20eaf258cf5cef', 4);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `users_has_class`
--

INSERT INTO `users_has_class` (`users_id`, `class_id`, `id`) VALUES
(4, 20, 1),
(4, 22, 2),
(5, 22, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users_has_open`
--

DROP TABLE IF EXISTS `users_has_open`;
CREATE TABLE IF NOT EXISTS `users_has_open` (
  `users_id` int(11) NOT NULL,
  `open_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `accepted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_users_has_open_open1_idx` (`open_id`),
  KEY `fk_users_has_open_users1_idx` (`users_id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_has_open`
--

INSERT INTO `users_has_open` (`users_id`, `open_id`, `id`, `accepted`) VALUES
(14, 11, 5, 0),
(14, 14, 6, 2),
(14, 18, 7, 0),
(14, 23, 8, 0),
(29, 21, 9, 0),
(37, 22, 10, 1),
(37, 15, 11, 0),
(37, 12, 12, 0),
(37, 5, 13, 2),
(38, 22, 14, 2),
(38, 15, 15, 0),
(38, 24, 16, 0),
(38, 11, 17, 0),
(38, 14, 18, 0),
(41, 22, 19, 0),
(46, 5, 20, 1),
(46, 12, 21, 0),
(46, 15, 22, 0),
(46, 25, 23, 0),
(46, 18, 24, 0),
(47, 5, 25, 0),
(47, 11, 26, 0),
(47, 13, 27, 0),
(47, 24, 28, 0),
(47, 15, 29, 0),
(48, 5, 30, 0),
(48, 11, 31, 0),
(48, 13, 32, 0),
(48, 25, 33, 0),
(48, 18, 34, 0),
(48, 24, 35, 0),
(44, 5, 36, 1),
(44, 14, 37, 0),
(44, 24, 38, 0),
(44, 18, 39, 0),
(44, 13, 40, 0),
(44, 12, 41, 0),
(33, 23, 42, 0),
(14, 5, 43, 1),
(14, 6, 44, 0),
(42, 22, 45, 0),
(38, 5, 46, 0),
(38, 25, 47, 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `fk_class_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `excuses`
--
ALTER TABLE `excuses`
  ADD CONSTRAINT `students_id` FOREIGN KEY (`students_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `final_grade`
--
ALTER TABLE `final_grade`
  ADD CONSTRAINT `grade` FOREIGN KEY (`subject_grade`) REFERENCES `subjects_has_grades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `open`
--
ALTER TABLE `open`
  ADD CONSTRAINT `fk_open_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `class_id` FOREIGN KEY (`class_id`) REFERENCES `class` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_terms_subjects1` FOREIGN KEY (`subjects_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `fk_subjects_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `subjects_has_grades`
--
ALTER TABLE `subjects_has_grades`
  ADD CONSTRAINT `fk_subjects_has_grades_subjects1` FOREIGN KEY (`subjects_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subjects_has_grades_has_students`
--
ALTER TABLE `subjects_has_grades_has_students`
  ADD CONSTRAINT `fk_subjects_has_grades_has_students_students1` FOREIGN KEY (`students_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_subjects_has_grades_has_students_subjects_has_grades1` FOREIGN KEY (`subjects_has_grades_id`) REFERENCES `subjects_has_grades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `roles` FOREIGN KEY (`roles_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `fk_users_has_open_open1` FOREIGN KEY (`open_id`) REFERENCES `open` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_users_has_open_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
