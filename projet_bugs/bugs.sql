-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 25, 2014 at 05:14 PM
-- Server version: 5.5.37-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bugs`
--

-- --------------------------------------------------------

--
-- Table structure for table `carte`
--

CREATE TABLE IF NOT EXISTS `carte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_categorie` int(11) NOT NULL,
  `libelle` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `descriptif` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `prix_livraison` float NOT NULL,
  `prix_emporter` float NOT NULL,
  `url` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_categorie` (`id_categorie`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `carte`
--

INSERT INTO `carte` (`id`, `id_categorie`, `libelle`, `descriptif`, `prix_livraison`, `prix_emporter`, `url`) VALUES
(1, 1, 'Sauterelles sautees', 'Sauterelles sautees 01.\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed varius nisl. Integer enim lorem, tempus non enim a, aliquam rhoncus nulla. Proin lacinia eros egestas lacus sporta mattis. Vestibulum urna orci, mattis ac tortor sed, tempor mollis velit. Duis eros urna, vehicula vel ligula id, ornare tincidunt nulla. Praesent fermentum malesuada metus vitae posuere. Donec imperdiet, metus ac elementum pharetra, arcu est imperdiet odio, ac facilisis risus urna vitae purus.', 5, 0, 'sources/img/MenuFood01.jpg'),
(2, 2, 'Chenilles aux Morilles', 'Sauterelles sautees 02.\r\nCurabitur feugiat enim vel odio auctor tincidunt. Vivamus viverra quis arcu ac sodales. Morbi suscipit nibh id purus dictum, at fermentum orci iaculis. Donec convallis felis eu dignissim commodo. Vestibulum volutpat erat quis ultrices pulvinar. Sed neque quam, scelerisque ut metus a, euismod ullamcorper nulla. Vivamus non auctor arcu. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Quisque eget sagittis dui, et convallis maur', 10, 0, 'sources/img/MenuFood02.jpg'),
(3, 3, 'Sorbet de Fourmis', 'Sauterelles sautees 03.\r\n Vivamus scelerisque aliquet tortor, ultricies lobortis diam rhoncus eget. Etiam a accumsan enim, sit amet feugiat justo. Proin vitae lectus ullamcorper, bibendum purus at, rutrum turpis. Pellentesque dolor ipsum, dictum in cursus nec, porttitor eget tellus. Duis ac suscipit arcu, at convallis dui. Cras dapibus turpis justo, non sodales sapien blandit ut. In euismod diam vel placerat consequat. Curabitur a molestie turpis. Etiam quis rutrum turpis, non rutrum ante. ', 6, 0, 'sources/img/MenuFood03.jpg'),
(4, 8, 'Coca-Cola', 'Sauterelles sautees 04.\r\nAenean malesuada urna in nunc dignissim facilisis. Integer mattis nec arcu a molestie. Nulla egestas dui ac quam imperdiet, vel placerat ante ultrices. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas felis magna, blandit nec faucibus in, blandit a nisl. Suspendisse dignissim, elit sit amet sollicitudin fringilla, ante leo venenatis felis, et eleifend purus augue vitae eros. Vivamus accumsan facilisis accumsan. ', 3, 0, 'sources/img/MenuFood01.jpg'),
(5, 5, 'Mojito', 'Sauterelles sautees 05.\r\nSuspendisse fermentum aliquam consequat. Mauris pharetra mauris ac sem consequat, cursus elementum neque vestibulum. Cras vulputate turpis est, malesuada convallis lectus sagittis nec. Donec eu mi ac nibh rhoncus molestie. Sed pellentesque justo lectus, bibendum commodo odio consequat vitae. Ut placerat tristique odio, nec auctor lacus feugiat at. Ut ac erat nec magna pellentesque tempus vitae sagittis sapien. ', 8, 0, 'sources/img/MenuFood02.jpg'),
(6, 1, 'Salade de Chenilles', 'Sauterelles sautees 06.\r\nMaecenas ornare felis nulla, nec blandit neque egestas eu. Nullam non erat ipsum. Morbi blandit augue ut massa bibendum tincidunt. Etiam nec vulputate enim, vitae semper nulla. Ut vel felis gravida, hendrerit leo lobortis, viverra magna. Suspendisse potenti. Sed suscipit quis lorem id interdum. Quisque sed suscipit sapien. Proin sem erat, rhoncus non tortor ac, sagittis blandit mi. Cras eu mauris urna. ', 7, 5, 'sources/img/MenuFood03.jpg'),
(7, 1, 'Libellules en Pagaille', 'Sauterelles sautees 07.\r\nDuis eget nisi ac leo venenatis vehicula quis sed mauris. Suspendisse malesuada enim et felis pulvinar imperdiet. Maecenas a consequat velit. Suspendisse dapibus vitae leo tempor sodales. Donec turpis dolor, volutpat id orci in, volutpat dictum sapien. Aliquam fermentum magna eu pellentesque pharetra. Etiam congue leo vel orci bibendum, ut placerat sapien faucibus. Vivamus suscipit risus non massa faucibus consectetur quis vitae est. ', 6, 4, 'sources/img/MenuFood01.jpg'),
(8, 1, 'Mousse de Larve', 'Sauterelles sautees 08.\r\nVivamus ornare lobortis libero id posuere. Duis massa quam, ornare in sapien pulvinar, fermentum facilisis arcu. Donec sem quam, malesuada et lorem in, dignissim tempus lectus. Nunc condimentum, eros ac imperdiet malesuada, felis est viverra sapien, vitae dictum quam turpis ac lorem. Donec vitae rutrum ante. Cras dictum urna id velit euismod, a posuere dolor adipiscing. Proin eget feugiat libero. Suspendisse et sem velit. Aliquam erat volutpat. Duis ultricies lorem risus', 5, 3, 'sources/img/MenuFood02.jpg'),
(9, 2, 'Sauterelles au Whisky', 'Sauterelles sautees 09.\r\nSed quam risus, tincidunt in pharetra at, vehicula quis sem. Sed urna nunc, adipiscing id pharetra ut, commodo non turpis. In hac habitasse platea dictumst. Vivamus a purus quis tellus facilisis tristique. In vel ornare ligula. Duis vitae faucibus sapien. Nullam risus quam, pretium vel cursus a, fermentum at libero. ', 16, 13, 'sources/img/MenuFood03.jpg'),
(10, 2, 'Boboun d''Antenne', 'Sauterelles sautees 10.\r\nCras auctor, tortor eget egestas scelerisque, elit sem semper odio, vel blandit ipsum augue eu nibh. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Etiam venenatis tortor diam, ut egestas ligula tincidunt nec. Nam hendrerit risus id sapien pretium iaculis. Praesent eleifend viverra diam sit amet luctus. Aliquam libero odio, mollis at lectus in, fringilla gravida sapien. Sed vulputate velit ante, quis porta nunc rhoncus lacinia. Do', 13, 10, 'sources/img/MenuFood01.jpg'),
(11, 3, 'Croquant Sautant', 'Sauterelles sautees 11.\r\nPhasellus convallis malesuada mauris ut cursus. Nulla pulvinar sem vel magna condimentum, nec lacinia est eleifend. Phasellus iaculis elit a urna mattis laoreet. Curabitur vitae orci hendrerit nisi gravida blandit ut gravida eros. Nulla sollicitudin vulputate purus, sit amet interdum nisl convallis vitae. Morbi et varius nunc. Integer nec tincidunt turpis. Fusce tincidunt tempus enim. Nunc at augue porta, facilisis risus at, lacinia diam. Phasellus nec velit vitae purus ', 8, 6, 'sources/img/MenuFood02.jpg'),
(12, 3, 'Chenille Flottante', 'Sauterelles sautees 12.\r\nDonec pharetra, arcu nec tristique semper, nisl sapien aliquet lorem, quis vehicula nisi magna id ante. In dictum viverra orci, sed porttitor est consequat sed. Proin pulvinar orci vitae dictum fringilla. Sed rhoncus eleifend justo, a iaculis mi fringilla at. Fusce vitae pharetra nunc. Donec est erat, hendrerit a turpis sed, posuere tempor leo. Vestibulum dapibus iaculis enim, sit amet adipiscing mi. Donec sit amet enim sem. Proin ac lorem vitae erat feugiat feugiat vita', 7, 5, 'sources/img/MenuFood03.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `id_parent` int(11) DEFAULT NULL,
  `libelle` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_boisson` (`id_parent`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id`, `id_parent`, `libelle`) VALUES
(1, NULL, 'entree'),
(2, NULL, 'plat'),
(3, NULL, 'dessert'),
(4, NULL, 'boisson'),
(5, 4, 'cocktail'),
(6, 4, 'vin'),
(7, 4, 'biere'),
(8, 4, 'soda');

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `id_user` int(4) NOT NULL,
  `id_reduction` int(10) NOT NULL,
  `adresse` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cp` int(5) NOT NULL,
  `ville` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `commentaire` varchar(4096) COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `prix` float NOT NULL,
  `emporter` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  KEY `id_reduction` (`id_reduction`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `composer`
--

CREATE TABLE IF NOT EXISTS `composer` (
  `id_menu` int(4) NOT NULL,
  `id_carte` int(4) NOT NULL,
  PRIMARY KEY (`id_carte`,`id_menu`),
  KEY `id_menu` (`id_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `composer`
--

INSERT INTO `composer` (`id_menu`, `id_carte`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 8),
(1, 10),
(1, 12),
(2, 6),
(2, 7),
(2, 9),
(2, 10),
(2, 11),
(2, 12);

-- --------------------------------------------------------

--
-- Table structure for table `descriptif`
--

CREATE TABLE IF NOT EXISTS `descriptif` (
  `id_commande` int(4) NOT NULL,
  `id_carte` int(4) NOT NULL,
  `id_menu` int(4) NOT NULL,
  `quantite` int(4) NOT NULL,
  PRIMARY KEY (`id_commande`,`id_carte`,`id_menu`),
  KEY `id_carte` (`id_carte`),
  KEY `id_menu` (`id_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `livre`
--

CREATE TABLE IF NOT EXISTS `livre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `comment` varchar(4096) COLLATE utf8_unicode_ci NOT NULL,
  `date_comment` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `descriptif` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `prix_livraison` float NOT NULL,
  `prix_emporter` float NOT NULL,
  `url` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `libelle`, `descriptif`, `prix_livraison`, `prix_emporter`, `url`) VALUES
(1, 'Menu bugz spicy', '', 20, 15, 'sources/img/MenuFood01_Thumb.jpg'),
(2, 'Menu 1001 pattes', '', 22, 17, 'sources/img/MenuFood02_Thumb.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reduction`
--

CREATE TABLE IF NOT EXISTS `reduction` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pourcentage` int(3) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `reduction`
--

INSERT INTO `reduction` (`id`, `code`, `pourcentage`) VALUES
(1, 'AAAAA', 5);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `id_user` int(4) NOT NULL,
  `id_service` int(4) NOT NULL,
  `date` datetime NOT NULL,
  `couvert` int(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`,`id_service`),
  KEY `id_service` (`id_service`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `reserver`
--

CREATE TABLE IF NOT EXISTS `reserver` (
  `id_table` int(4) NOT NULL,
  `id_reservation` int(4) NOT NULL,
  PRIMARY KEY (`id_table`,`id_reservation`),
  KEY `id_reservation` (`id_reservation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `table`
--

CREATE TABLE IF NOT EXISTS `table` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `code` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `capacite` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `login` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cp` int(5) NOT NULL,
  `ville` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `societe` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `point` int(4) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `login`, `prenom`, `nom`, `tel`, `adresse`, `cp`, `ville`, `mail`, `societe`, `pass`, `point`, `admin`) VALUES
(1, 'mojho', 'Carlos', 'Rodrigues', '0000000000', '20 rue tartanpion', 91222, 'Chourtres', 'blabla@cloche.com', '', 'doudoudou', 0, 1),
(2, 'AgneloPires', 'Agnelo', 'PIRES', '0035191262', '', 75014, 'PARIS', 'agnelopires@hotmail.com', '', '357_python', 0, 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carte`
--
ALTER TABLE `carte`
  ADD CONSTRAINT `carte_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commande_ibfk_2` FOREIGN KEY (`id_reduction`) REFERENCES `reduction` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `composer`
--
ALTER TABLE `composer`
  ADD CONSTRAINT `composer_ibfk_1` FOREIGN KEY (`id_carte`) REFERENCES `carte` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `composer_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `descriptif`
--
ALTER TABLE `descriptif`
  ADD CONSTRAINT `descriptif_ibfk_1` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `descriptif_ibfk_2` FOREIGN KEY (`id_carte`) REFERENCES `carte` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `descriptif_ibfk_3` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `livre`
--
ALTER TABLE `livre`
  ADD CONSTRAINT `livre_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`id_service`) REFERENCES `service` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reserver`
--
ALTER TABLE `reserver`
  ADD CONSTRAINT `reserver_ibfk_1` FOREIGN KEY (`id_table`) REFERENCES `table` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reserver_ibfk_2` FOREIGN KEY (`id_reservation`) REFERENCES `reservation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
