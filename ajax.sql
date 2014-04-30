-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 30 Avril 2014 à 10:53
-- Version du serveur: 5.5.35-0ubuntu0.13.10.2
-- Version de PHP: 5.5.3-1ubuntu2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `exo1`
--

-- --------------------------------------------------------

--
-- Structure de la table `ajax`
--

CREATE TABLE IF NOT EXISTS `ajax` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `birthdate` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=101 ;

--
-- Contenu de la table `ajax`
--

INSERT INTO `ajax` (`id`, `name`, `birthdate`) VALUES
(1, 'Stacy Adkins', '09/10/13'),
(2, 'Jenna Nolan', '09/07/13'),
(3, 'Cynthia Cooper', '12/11/14'),
(4, 'Lars Raymond', '12/01/14'),
(5, 'Cain Hopper', '22/05/14'),
(6, 'Justina Washington', '25/04/14'),
(7, 'Lawrence Cooper', '01/03/14'),
(8, 'Cheyenne Sweeney', '07/11/14'),
(9, 'Amir Moss', '15/12/14'),
(10, 'Ainsley Cook', '30/10/13'),
(11, 'Christopher English', '19/11/14'),
(12, 'Galvin Adams', '30/12/13'),
(13, 'Lillith Hayes', '18/01/14'),
(14, 'Ella Nunez', '17/01/14'),
(15, 'Ruby Solomon', '03/09/13'),
(16, 'Charity Mcleod', '03/12/13'),
(17, 'Dahlia Santos', '29/07/14'),
(18, 'Nell Burnett', '05/09/13'),
(19, 'Naida Trevino', '17/01/15'),
(20, 'Driscoll Vance', '25/04/14'),
(21, 'Christine Burt', '03/03/15'),
(22, 'Jackson Oconnor', '27/03/15'),
(23, 'Kalia Payne', '29/09/13'),
(24, 'Amity Espinoza', '03/12/13'),
(25, 'Gloria Whitney', '31/05/14'),
(26, 'Porter Kirkland', '06/04/14'),
(27, 'Erasmus Dunlap', '26/08/14'),
(28, 'Gillian Decker', '17/01/14'),
(29, 'Omar Mcguire', '04/10/14'),
(30, 'Kane Moody', '05/05/14'),
(31, 'Leslie Mendez', '19/04/14'),
(32, 'Melanie Heath', '17/10/13'),
(33, 'Ciara Lindsey', '07/02/15'),
(34, 'Russell Pollard', '30/09/14'),
(35, 'Belle Alexander', '22/08/14'),
(36, 'Wilma Oneal', '04/11/13'),
(37, 'Isabella Langley', '21/10/14'),
(38, 'Ivy Roy', '20/01/14'),
(39, 'Cora Hodge', '15/05/14'),
(40, 'Armando Delacruz', '18/04/15'),
(41, 'Rajah Mcknight', '14/12/14'),
(42, 'Cameron Barlow', '02/07/13'),
(43, 'Mira Petersen', '02/08/13'),
(44, 'Keegan Shannon', '25/07/14'),
(45, 'Riley Blanchard', '30/11/13'),
(46, 'Byron Ingram', '01/04/15'),
(47, 'Buffy Whitney', '18/04/15'),
(48, 'Jessamine Reed', '14/06/14'),
(49, 'Jelani Torres', '06/04/15'),
(50, 'Hoyt Lowe', '11/08/13'),
(51, 'Dominique Wade', '08/10/13'),
(52, 'Stephanie Rodriquez', '05/09/13'),
(53, 'Sybill Bridges', '14/02/14'),
(54, 'Iliana Todd', '14/04/14'),
(55, 'Rajah Hogan', '02/02/14'),
(56, 'Drew Harrington', '17/08/13'),
(57, 'Bruno Huffman', '06/04/14'),
(58, 'Chelsea Atkins', '26/10/14'),
(59, 'Galvin Burt', '23/02/15'),
(60, 'Ignacia Cardenas', '14/11/14'),
(61, 'Wendy Silva', '23/06/13'),
(62, 'Zenaida Harvey', '02/03/15'),
(63, 'Bernard Hendrix', '23/06/14'),
(64, 'Denton Rodriquez', '05/03/14'),
(65, 'Lavinia Stevens', '05/04/15'),
(66, 'Alma Huber', '03/03/14'),
(67, 'Galvin Deleon', '12/02/14'),
(68, 'Wang Adams', '13/01/15'),
(69, 'Reed Payne', '06/11/13'),
(70, 'Russell Hanson', '26/03/15'),
(71, 'Yvette Schultz', '17/06/14'),
(72, 'Lydia Guy', '26/06/14'),
(73, 'Dawn Mccarthy', '09/10/13'),
(74, 'Lael Clements', '25/03/15'),
(75, 'Rosalyn Schmidt', '25/03/15'),
(76, 'Lillian Cross', '05/01/14'),
(77, 'Raymond Massey', '04/08/14'),
(78, 'Tarik Hayden', '27/12/14'),
(79, 'Sean Pugh', '15/10/13'),
(80, 'Eden Mcpherson', '08/04/15'),
(81, 'Mariko Crawford', '31/07/14'),
(82, 'Harding Branch', '13/07/13'),
(83, 'Hadassah Contreras', '05/01/14'),
(84, 'Nevada Hubbard', '16/03/15'),
(85, 'Aphrodite Parks', '17/02/14'),
(86, 'Erasmus Frye', '25/09/14'),
(87, 'Dillon Mcfarland', '27/01/14'),
(88, 'Raven Pate', '26/03/15'),
(89, 'MacKenzie Carney', '19/06/14'),
(90, 'Noel Powers', '10/07/14'),
(91, 'Kameko Glover', '06/06/13'),
(92, 'Kelsie Carlson', '24/11/14'),
(93, 'Donovan Delaney', '28/12/13'),
(94, 'Nathan Shaffer', '26/10/14'),
(95, 'Stephanie Hammond', '17/09/14'),
(96, 'Tad Albert', '19/01/15'),
(97, 'Fritz Britt', '09/11/13'),
(98, 'Malcolm Holmes', '06/04/14'),
(99, 'Tatiana Mathis', '25/06/14'),
(100, 'Gisela Macdonald', '09/01/15');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
