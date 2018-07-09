-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 07 juil. 2018 à 09:43
-- Version du serveur :  5.7.21
-- Version de PHP :  7.0.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
DROP DATABASE adopt_un_boss;
--
-- Base de données :  `adopt_un_boss`
--
CREATE SCHEMA IF NOT EXISTS `adopt_un_boss` DEFAULT CHARACTER SET utf8 ;
USE `adopt_un_boss` ;
-- --------------------------------------------------------
--
-- Structure de la table `actualite`
--

DROP TABLE IF EXISTS `actualite`;
CREATE TABLE IF NOT EXISTS `actualite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(45) DEFAULT NULL,
  `texte` varchar(1024) DEFAULT NULL,
  `statut` tinyint(1) DEFAULT '0',
  `date_creation` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `actualite`
--

INSERT INTO `actualite` (`id`, `titre`, `texte`, `statut`, `date_creation`) VALUES
(1, 'Ouverture du site !', 'Le site est en ligne, adieu le chomage !', 1, '2018-06-19'),
(2, 'Conditions de travail déplorable chez IBM', 'Attention, n\'allez pas chez eux, ça sent pas bon  et les mauvais employés sont fouettés', 1, '2018-06-19'),
(3, 'Meet-up Microsoft.', 'La grand firme américain débarque enfin près de chez vous avec une soirée de feu de dieu de derrière les faggos qui va casser trois pates à un canard.', 0, '2018-06-19');

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `user_id` int(11) NOT NULL,
  `pseudo` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `fk_admin_user1_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`user_id`, `pseudo`, `password`) VALUES
(1, 'admin1', 'admin1'),
(2, 'admin2', 'admin2'),
(3, 'admin3', 'admin3');

-- --------------------------------------------------------

--
-- Structure de la table `candidat`
--

DROP TABLE IF EXISTS `candidat`;
CREATE TABLE IF NOT EXISTS `candidat` (
  `user_id` int(11) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `age` int(11) NOT NULL,
  `adresse` varchar(300) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `password` varchar(45) NOT NULL,
  `photo` varchar(4000) NOT NULL,
  `date_creation` date NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `candidat`
--

INSERT INTO `candidat` (`user_id`, `nom`, `prenom`, `age`, `adresse`, `tel`, `mail`, `password`, `photo`, `date_creation`, `description`) VALUES
(4, 'Piot Pilot', 'Yannis', 20, '127 rue des mouettes, la grande motte', '0754966555', 'pp@gmail.com', 'candidat', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQvpfa0PheBt_7ibxsIqVhayRkPSytHdt1I0rBKngyAsWH6UigL9w', '2018-06-19', NULL),
(5, 'Cantinelli', 'Thomas', 34, '128 rue des mouettes, la grande motte', '0755447667', 'ct@gmail.com', 'candidat', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQvpfa0PheBt_7ibxsIqVhayRkPSytHdt1I0rBKngyAsWH6UigL9w', '2018-06-19', NULL),
(6, 'Serbouty', 'Karim', 21, '129 rue des mouettes, la grande motte', '0654443445', 'sk@gmail.com', 'candidat', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQvpfa0PheBt_7ibxsIqVhayRkPSytHdt1I0rBKngyAsWH6UigL9w', '2018-06-19', NULL),
(7, 'Vidal', 'François', 26, '130 rue des mouettes, la grande motte', '0654443445', 'vf@gmail.com', 'candidat', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQvpfa0PheBt_7ibxsIqVhayRkPSytHdt1I0rBKngyAsWH6UigL9w', '2018-06-19', NULL),
(8, 'Jauze', 'Julien', 43, '131 rue des mouettes, la grande motte', '0766922344', 'jj@gmail.com', 'candidat', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQvpfa0PheBt_7ibxsIqVhayRkPSytHdt1I0rBKngyAsWH6UigL9w', '2018-06-19', NULL),
(9, 'Amchi', 'Dorian', 22, '132 rue des mouettes, la grande motte', '0755933345', 'ad@gmail.com', 'candidat', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQvpfa0PheBt_7ibxsIqVhayRkPSytHdt1I0rBKngyAsWH6UigL9w', '2018-06-19', NULL),
(10, 'Preumont', 'Erwan', 64, '133 rue des mouettes, la grande motte', '0754914356', 'pe@gmail.com', 'candidat', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQvpfa0PheBt_7ibxsIqVhayRkPSytHdt1I0rBKngyAsWH6UigL9w', '2018-06-19', NULL),
(11, 'Albert', 'Nicolas', 23, '134 rue des mouettes, la grande motte', '0777655545', 'an@gmail.com', 'candidat', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQvpfa0PheBt_7ibxsIqVhayRkPSytHdt1I0rBKngyAsWH6UigL9w', '2018-06-19', NULL),
(12, 'Bertrix', 'Julian', 54, '135 rue des mouettes, la grande motte', '0745024356', 'bj@gmail.com', 'candidat', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQvpfa0PheBt_7ibxsIqVhayRkPSytHdt1I0rBKngyAsWH6UigL9w', '2018-06-19', NULL),
(13, 'Viellard', 'Ilies', 24, '136 rue des mouettes, la grande motte', '0763344332', 'vi@gmail.com', 'candidat', 'https://cdn.pixabay.com/photo/2017/10/05/22/55/anonymous-2821433_960_720.jpg', '2018-06-19', NULL),
(14, 'Planque', 'Alexandre', 33, '137 rue des mouettes, la grande motte', '0654455667', 'pa@gmail.com', 'candidat', 'https://cdn.pixabay.com/photo/2017/10/05/22/55/anonymous-2821433_960_720.jpg', '2018-06-19', NULL),
(15, 'Lavery', 'Cédric', 26, '138 rue des mouettes, la grande motte', '0665556707', 'lc@gmail.com', 'candidat', 'https://cdn.pixabay.com/photo/2017/10/05/22/55/anonymous-2821433_960_720.jpg', '2018-06-19', NULL),
(16, 'Halot', 'Thierry', 54, '139 rue des mouettes, la grande motte', '0634231243', 'ht@gmail.com', 'candidat', 'https://cdn.pixabay.com/photo/2017/10/05/22/55/anonymous-2821433_960_720.jpg', '2018-06-19', NULL),
(17, 'Bezard-Falgas', 'Alexis', 23, '140 rue des mouettes, la grande motte', '0765646768', 'ba@gmail.com', 'candidat', 'https://cdn.pixabay.com/photo/2017/10/05/22/55/anonymous-2821433_960_720.jpg', '2018-06-19', NULL),
(18, 'emery', 'alain', 44, '141 rue des mouettes, la grande motte', '0769977695', 'ea@gmail.com', 'candidat', 'https://cdn.pixabay.com/photo/2017/10/05/22/55/anonymous-2821433_960_720.jpg', '2018-06-19', NULL),
(19, 'loic', 'derieux', 69, '69 rue de la pipe au jambon, moncul', '0654445665', 'ld@gmail.com', 'candidat', 'https://cdn.pixabay.com/photo/2017/10/05/22/55/anonymous-2821433_960_720.jpg', '2018-06-19', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `candidat_bookmarked_offre`
--

DROP TABLE IF EXISTS `candidat_bookmarked_offre`;
CREATE TABLE IF NOT EXISTS `candidat_bookmarked_offre` (
  `candidat_user_id` int(11) NOT NULL,
  `offre_id` int(11) NOT NULL,
  PRIMARY KEY (`candidat_user_id`,`offre_id`),
  KEY `fk_candidat_has_offre_offre2_idx` (`offre_id`),
  KEY `fk_candidat_has_offre_candidat2_idx` (`candidat_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `candidat_has_techno`
--

DROP TABLE IF EXISTS `candidat_has_techno`;
CREATE TABLE IF NOT EXISTS `candidat_has_techno` (
  `candidat_user_id` int(11) NOT NULL,
  `techno_id` int(11) NOT NULL,
  PRIMARY KEY (`candidat_user_id`,`techno_id`),
  KEY `fk_candidat_has_techno_techno1_idx` (`techno_id`),
  KEY `fk_candidat_has_techno_candidat1_idx` (`candidat_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `candidat_has_techno`
--

INSERT INTO `candidat_has_techno` (`candidat_user_id`, `techno_id`) VALUES
(4, 1),
(12, 1),
(4, 2),
(7, 2),
(11, 2),
(12, 2),
(15, 2),
(16, 2),
(5, 3),
(13, 3),
(6, 4),
(14, 4),
(5, 5),
(8, 5),
(13, 5),
(7, 6),
(15, 6),
(6, 7),
(9, 7),
(10, 7),
(14, 7),
(8, 8),
(9, 9),
(10, 11),
(16, 11),
(11, 12),
(4, 13),
(12, 13),
(16, 13),
(5, 14),
(13, 14),
(6, 15),
(14, 15),
(7, 16),
(15, 16),
(8, 17),
(9, 18),
(10, 19),
(11, 20);

-- --------------------------------------------------------

--
-- Structure de la table `candidat_liked_offre`
--

DROP TABLE IF EXISTS `candidat_liked_offre`;
CREATE TABLE IF NOT EXISTS `candidat_liked_offre` (
  `candidat_user_id` int(11) NOT NULL,
  `offre_id` int(11) NOT NULL,
  `answered` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`candidat_user_id`,`offre_id`),
  KEY `fk_candidat_has_offre_offre1_idx` (`offre_id`),
  KEY `fk_candidat_has_offre_candidat1_idx` (`candidat_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `candidat_liked_offre`
--

INSERT INTO `candidat_liked_offre` (`candidat_user_id`, `offre_id`, `answered`) VALUES
(4, 1, 0),
(5, 2, 0),
(6, 3, 0),
(7, 4, 0),
(8, 5, 0),
(9, 6, 0),
(10, 7, 0),
(11, 8, 0),
(12, 9, 0),
(13, 10, 0),
(14, 11, 0),
(15, 12, 0),
(16, 13, 0),
(17, 14, 0),
(18, 15, 0),
(19, 16, 0);

-- --------------------------------------------------------

--
-- Structure de la table `candidat_viewed_entreprise`
--

DROP TABLE IF EXISTS `candidat_viewed_entreprise`;
CREATE TABLE IF NOT EXISTS `candidat_viewed_entreprise` (
  `candidat_user_id` int(11) NOT NULL,
  `entreprise_user_id` int(11) NOT NULL,
  PRIMARY KEY (`candidat_user_id`,`entreprise_user_id`),
  KEY `fk_candidat_has_entreprise_entreprise1_idx` (`entreprise_user_id`),
  KEY `fk_candidat_has_entreprise_candidat1_idx` (`candidat_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `candidat_viewed_offre`
--

DROP TABLE IF EXISTS `candidat_viewed_offre`;
CREATE TABLE IF NOT EXISTS `candidat_viewed_offre` (
  `candidat_user_id` int(11) NOT NULL,
  `offre_id` int(11) NOT NULL,
  PRIMARY KEY (`candidat_user_id`,`offre_id`),
  KEY `fk_candidat_has_offre1_offre1_idx` (`offre_id`),
  KEY `fk_candidat_has_offre1_candidat1_idx` (`candidat_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `chat`
--

DROP TABLE IF EXISTS `chat`;
CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `recepteur_id` int(11) NOT NULL,
  `emetteur_id` int(11) NOT NULL,
  `contenu` varchar(2048) DEFAULT NULL,
  `date_creation` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`,`recepteur_id`,`emetteur_id`),
  KEY `fk_chat_user1_idx` (`emetteur_id`),
  KEY `fk_chat_user2_idx` (`recepteur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `chat`
--

INSERT INTO `chat` (`id`, `recepteur_id`, `emetteur_id`, `contenu`, `date_creation`) VALUES
(1, 26, 4, 'Bonjour, j\'aurais une question par rapport a vote offre.', NULL),
(2, 4, 26, 'Je vous écoute.', NULL),
(3, 26, 4, 'Est-il possible de négocier le salaire ?', NULL),
(4, 4, 26, 'Non. Au revoir.', NULL),
(5, 19, 20, 'Bonjour', 1530691459),
(6, 19, 22, 'bonjour', 1530691500),
(7, 20, 19, 'tg', 1530691550),
(8, 19, 30, 'ok', 1530691600),
(9, 30, 19, 'no u', 1530691650),
(10, 19, 34, 'suce', 1530691700),
(11, 34, 19, 'la bite', 1530691750),
(12, 19, 22, 'répond  pd', 1530691800),
(13, 20,  19,'qsd', 1530827830),
(14, 19, 22, 'Bonjour Loic', 1530905292),
(15, 22, 19, '', 1530905320),
(16, 19, 20, 'Bonjour Loic', 1530905335),
(17, 34, 19, 'Bonjour Loic', 1530905433),
(18, 19, 30, 'Bonjour Loic', 1530905446),
(19, 19, 22, 'Bonjour Loic', 1530905449),
(20, 19, 34, 'sqd', 1530947434),
(21, 34, 19, 'xwc', 1530948081),
(22, 34, 19, 'xwcwxcwxc', 1530948082),
(23, 20, 19, 'xwcwxcwxc', 1530948204),
(24, 30, 19, 'ft', 1530948208),
(25, 19, 30,  'Q', 1530948433),
(26, 30, 19, 'QQS', 1530948435);

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

DROP TABLE IF EXISTS `entreprise`;
CREATE TABLE IF NOT EXISTS `entreprise` (
  `user_id` int(11) NOT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `adresse` varchar(300) DEFAULT NULL,
  `logo` varchar(4000) DEFAULT NULL,
  `description` varchar(700) DEFAULT NULL,
  `salarie` int(11) DEFAULT NULL,
  `site_web` varchar(45) DEFAULT NULL,
  `date_creation` date DEFAULT NULL,
  `mail` varchar(100) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`user_id`, `nom`, `tel`, `adresse`, `logo`, `description`, `salarie`, `site_web`, `date_creation`, `mail`, `password`) VALUES
(20, 'blizzard', '0467787665', '145 Rue Yves le Coz, 78000 Versailles', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ8q6ubfJnmAxhUpBY2dNDaytSJ1ZtnnBsuWILottosnyLnuO8Y', 'Blizzard Entertainment est une société américaine de développement et d’édition de jeux vidéo siégeant à Irvine en Californie. La société a été fondée en 1991 par Allen Adham, Michael Morhaime et Frank Pearce sous le nom de Silicon & Synapse.', 2000, 'http://blizzard.com', '2018-06-19', NULL, NULL),
(21, 'nintendo', '0455655443', '6 boulevard de l’Oise\nImmeuble Le Montaigne\n95031 Cergy Pontoise CEDEX', 'https://cdn03.nintendo-europe.com/media/images/10_share_images/others_3/H2x1_NintendoLogo_Red.png', 'Nintendo est une entreprise multinationale japonaise fondée en 1889 par Fusajiro Yamauchi près de Kyoto au Japon. À ses débuts, la société produisait des cartes à jouer japonaises : les Hanafuda.', 554, 'http://nintendo.fr', '2018-06-19', NULL, NULL),
(22, 'sony', '0467223344', '92 Avenue de Wagram, 75017 Paris', 'https://sonyglobal.scene7.com/is/image/gwtprod/sonyview1?fmt=png&wid=1200', 'Sony Corporation, est une société multinationale japonaise basée dans l\'arrondissement de Minato, à Tokyo, Japon.', 8000, 'https://www.sony.fr', '2018-06-19', NULL, NULL),
(23, 'activison', '0454455567', 'Fraunhoferstraße 7, 85737 Ismaning, Allemagne', 'https://global-img.gamergen.com/activision-logo_09026C014C00696532.jpg', 'Activision, Inc. est une entreprise américaine de développement et d\'édition de jeux vidéo, créée en 1979.', 5430, 'https://www.activisonblizzard.com', '2018-06-19', NULL, NULL),
(24, 'ea', '0455433456', '56 Rue Edgar Quinet, 34400 Lunel', 'https://www.sportbuzzbusiness.fr/wp-content/uploads/2014/10/logo-ea-sports.png', 'EA Sports est une marque de l\'entreprise américaine Electronic Arts spécialisée dans les jeux vidéo sportifs. Il s\'agit d\'un « sous-label » qui sort des séries de jeux telles que NBA Live, FIFA, NHL, Madden NFL ou encore NASCAR.', 5000, 'https://www.ea.com', '2018-06-19', NULL, NULL),
(25, 'eight_tech', '0411932474', 'Le Triade 3, 215 Rue Samuel Morse, 34000 Montpellier', 'http://8tech.fr/wp-content/uploads/2014/12/main_logo_bgWhite320x80.png', '8-TECH est une société de service en ingénierie informatique, spécialisée dans la maintenance, l’infogérance et la communication numérique. Notre vocation est de soutenir les entreprises dans la gestion de leurs parcs informatiques. Avec plus de 10 ans d’expérience dans ce domaine, nous vous apportons l’ensemble des compétences humaines et techniques pour assurer la fiabilité et le développement de votre système de gestion informatique. De plus, toutes nos offres sont orientées sur deux axes majeurs : la qualité de service et la satisfaction clientèle. C’est pourquoi l’ensemble de nos services sont sans engagement.', 30, 'https://8tech.fr', '2018-06-19', NULL, NULL),
(26, 'smile', '0499772010', '26 Cours Gambetta, 34000 Montpellier', 'https://pbs.twimg.com/profile_images/912955199656009728/O8W7v0L6.jpg', 'Au menu de l\'open source : des bénéfices économiques, une source inépuisée d’innovations, une liberté retrouvée... Et plein d\'autres avantages qui se comptent par centaines !', 50, 'http://smile.eu', '2018-06-19', NULL, NULL),
(27, 'akka', '0455433445', '1095 Rue Henri Becquerel, 34000 Montpellier', 'https://static.latribune.fr/full_width/348859/akka.jpg', 'Grâce à AKKA Research, notre centre de Recherche & Développement interne, nous vous aidons à développer et donner vie à votre vision du futur. En effet, nous avons les outils et les moyens de transformer votre concept en réalité.', 45, 'https://www.akka-technologies.com', '2018-06-19', NULL, NULL),
(28, 'cnrs', '0467613434', '1919 Route de Mende, 34000 Montpellier', 'https://pbs.twimg.com/profile_images/857602325321576448/N7Z3F7M3_400x400.jpg', 'Faire avancer la connaissance\nDe l\'étude de la matière et du vivant à celle des sociétés humaines, le CNRS explore l\'ensemble des champs de la science.', 150, 'http://www.cnrs.fr', '2018-06-19', NULL, NULL),
(29, 'noma', '0467754462', ' 41 Rue Yves Montand, 34080 Montpellier', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQrPrFe4G6r5ERceLowH19SaDAMHjVOUwz5sDpLHzORrjvyrl3GXA', 'NOMA est une agence web spécialisée dans la conception et la réalisation de votre communication, \net de votre développement sur Internet.\n\nDans un monde numérique en constante évolution, nous vous aidons à prendre des décisions éclairées qui reposent sur la compréhension de vos besoins et des objectifs de vos utilisateurs.\n\nNous accompagnons le développement de votre entreprise en proposant des solutions innovantes pour améliorer votre notoriété.\n\nCréation graphique de votre identité visuelle, conception ou refonte de votre site Internet, stratégie social média & référencement : l’agence prend en charge l’ensemble des étapes de vos projets Web.', 50, 'https://www.noma.fr', '2018-06-19', NULL, NULL),
(30, 'triotech', '0467825693', 'Bâtiment, Le Cathare, A, 345 Avenue de Monsieur Teste, 34070 Montpellier', 'https://www.triotech.fr/static/img/logo-couleur.png', 'Designers, développeurs, chefs de projet, conseillers clientèle, Triotech est constitué de talents aux multiples savoir-faire.', 150, 'https://www.triotech.fr', '2018-06-19', NULL, NULL),
(31, 'beenome', '0984502766', '86 rue Pierre et Marie Curie, Parc Kennedy, 34430 Saint-Jean-de-Védas', 'https://www.beenome.com/wp-content/uploads/2014/05/logo-beenome1.png', 'Implantée à Montpellier, l’agence web beenome est le partenaire privilégié de tous vos projets internet. Comme il est impossible d’être numéro 1 dans l’ensemble des métiers très spécialisés du web, nous avons décidé de nous spécialiser dans la mise en place et le suivi de votre stratégie internet, en nous appuyant sur un réseau de prestataires, les meilleurs dans leur domaine, qui donneront les meilleures chances de réussite à VOTRE projet grâce à notre expertise.', 48, 'https://www.beenome.com', '2018-06-19', NULL, NULL),
(32, 'safenergy', '0455433304', 'SAFENERGY, 6 AV D ASSAS 34000 MONTPELLIER', 'https://static.wixstatic.com/media/5f0b00_017681085e7c46f399eeea4feee894e2~mv2.png/v1/fill/w_591,h_197,al_c,usm_0.66_1.00_0.01/5f0b00_017681085e7c46f399eeea4feee894e2~mv2.png', 'SAFENERGY, société à responsabilité limitée est active depuis 12 ans.\nÉtablie à MONTPELLIER (34000), elle est spécialisée dans le secteur d\'activité de l\'edition de logiciels applicatifs.', 10, 'https://www.safenergy-services.com', '2018-06-19', NULL, NULL),
(33, 'synox', '0970264012', 'Parc Eureka - Le Tucano, 836 Rue du Mas de Verchant, 34000 Montpellier', 'https://pbs.twimg.com/profile_images/644777245316358144/7_9q_dRc_400x400.jpg', 'Intégrateur et fournisseur de services dans l’Internet des Objets, Synox réalise et concrétise vos projets d’objets connectés.\n\nFort d’une expertise dans le déploiement de projets IoT et d’une parfaite maîtrise des technologies existantes (cartes Sim M2M, LoRa, Sigfox), Synox gère pour vous toute la complexité technique d’un projet d’objet connecté de bout en bout pour vous permettre de vous concentrer sur votre métier.', 200, 'https://www.synox.io', '2018-06-19', NULL, NULL),
(34, 'matooma', '0488360740', 'Immeuble Le Liner ZAC de l’aéroport Entrée 2 SIS 2630, Avenue Georges Frêche, 34470 Pérols', 'https://pbs.twimg.com/profile_images/590451167819239424/lhlEovVz_400x400.png', 'Matooma est le leader français de la gestion et de la communication des objets connectés par carte SIM. Notre leitmotiv est de simplifier le métier des professionnels du M2M et de l’IoT au travers de multiples offres de connectivité et d’un outil de gestion Machine to Machine unique : le M2MManager. ', 100, 'http://www.matooma.com', '2018-06-19', NULL, NULL),
(35, 'viveris_techno', '0472821760', 'bâtiment 31, 2 Place Eugène Bataillon, 34090 Montpellier', 'https://emploiobjetsconnectes.com/lib/img/recruteurs/logo-viveris-daef0e599.jpg', 'Ingénierie, innovation, projets, technologies, recherche ... sans le savoir, nous profitons tous du savoir-faire de Viveris !', 60, 'https://www.viveris.fr', '2018-06-19', NULL, NULL),
(36, 'ubisoft', '0467712233', '1 Chemin de Borie, 34170 Castelnau-le-Lez', 'https://img.generation-nt.com/ubisoft-logo_09094307AE00060402.jpg', 'Ubisoft est une entreprise française de développement, d\'édition et de distribution de jeux vidéo, créée en mars 1986 par les cinq frères Guillemot, originaires de Carentoir dans le Morbihan, en France.', 1000, 'http://ubisoft.com', '2018-06-19', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `entreprise_has_secteur_d_activite`
--

DROP TABLE IF EXISTS `entreprise_has_secteur_d_activite`;
CREATE TABLE IF NOT EXISTS `entreprise_has_secteur_d_activite` (
  `entreprise_user_id` int(11) NOT NULL,
  `secteur_d_activite_id` int(11) NOT NULL,
  PRIMARY KEY (`entreprise_user_id`,`secteur_d_activite_id`),
  KEY `fk_entreprise_has_secteur_d_activite_secteur_d_activite1_idx` (`secteur_d_activite_id`),
  KEY `fk_entreprise_has_secteur_d_activite_entreprise1_idx` (`entreprise_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `entreprise_has_secteur_d_activite`
--

INSERT INTO `entreprise_has_secteur_d_activite` (`entreprise_user_id`, `secteur_d_activite_id`) VALUES
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(36, 1),
(29, 2),
(30, 2),
(31, 2),
(32, 2),
(25, 3),
(26, 3),
(27, 3),
(28, 3),
(33, 4),
(34, 4),
(35, 4);

-- --------------------------------------------------------

--
-- Structure de la table `entreprise_liked_candidat`
--

DROP TABLE IF EXISTS `entreprise_liked_candidat`;
CREATE TABLE IF NOT EXISTS `entreprise_liked_candidat` (
  `entreprise_user_id` int(11) NOT NULL,
  `candidat_user_id` int(11) NOT NULL,
  `offre_id` int(11) NOT NULL,
  PRIMARY KEY (`entreprise_user_id`,`candidat_user_id`,`offre_id`),
  KEY `fk_entreprise_has_candidat_candidat1_idx` (`candidat_user_id`),
  KEY `fk_entreprise_has_candidat_entreprise1_idx` (`entreprise_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `entreprise_liked_candidat`
--

INSERT INTO `entreprise_liked_candidat` (`entreprise_user_id`, `candidat_user_id`, `offre_id`) VALUES
(25, 12, 1);

-- --------------------------------------------------------

--
-- Structure de la table `entreprise_viewed_candidat`
--

DROP TABLE IF EXISTS `entreprise_viewed_candidat`;
CREATE TABLE IF NOT EXISTS `entreprise_viewed_candidat` (
  `entreprise_user_id` int(11) NOT NULL,
  `candidat_user_id` int(11) NOT NULL,
  PRIMARY KEY (`entreprise_user_id`,`candidat_user_id`),
  KEY `fk_entreprise_has_candidat_candidat2_idx` (`candidat_user_id`),
  KEY `fk_entreprise_has_candidat_entreprise2_idx` (`entreprise_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `entreprise_viewed_entreprise`
--

DROP TABLE IF EXISTS `entreprise_viewed_entreprise`;
CREATE TABLE IF NOT EXISTS `entreprise_viewed_entreprise` (
  `entreprise_user_id` int(11) NOT NULL,
  `entreprise_user_id1` int(11) NOT NULL,
  PRIMARY KEY (`entreprise_user_id`,`entreprise_user_id1`),
  KEY `fk_entreprise_has_entreprise_entreprise2_idx` (`entreprise_user_id1`),
  KEY `fk_entreprise_has_entreprise_entreprise1_idx` (`entreprise_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `entreprise_viewed_offre`
--

DROP TABLE IF EXISTS `entreprise_viewed_offre`;
CREATE TABLE IF NOT EXISTS `entreprise_viewed_offre` (
  `entreprise_user_id` int(11) NOT NULL,
  `offre_id` int(11) NOT NULL,
  PRIMARY KEY (`entreprise_user_id`,`offre_id`),
  KEY `fk_entreprise_has_offre_offre1_idx` (`offre_id`),
  KEY `fk_entreprise_has_offre_entreprise1_idx` (`entreprise_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(100) DEFAULT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `image` varchar(4000) DEFAULT NULL,
  `lieu` varchar(300) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `heure` varchar(5) DEFAULT NULL,
  `statut` tinyint(1) DEFAULT '0',
  `date_creation` date DEFAULT NULL,
  `entreprise_user_id` int(11) NOT NULL,
  `visibility` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`,`entreprise_user_id`),
  KEY `fk_event_entreprise1_idx` (`entreprise_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `event`
--

INSERT INTO `event` (`id`, `titre`, `description`, `image`, `lieu`, `date`, `heure`, `statut`, `date_creation`, `entreprise_user_id`, `visibility`) VALUES
(1, 'Meet-Up triste.', 'Rencontre de développeur dans une ambiance maussade.', 'http://images.midilibre.fr/images/2014/01/08/le-cimetiere-protestant-le-plus-ancien-de-la-ville-a-ete_774919_667x333.jpg?v=1', '3 Avenue de Palavas, 34070 Montpellier', '2018-07-22', '14:30', 1, '2018-06-19', 36, NULL),
(2, 'Meet-Up joyeux.', 'Rencontre de développeur dans une ambiance joviale.', 'https://www.google.fr/url?sa=i&rct=j&q=&esrc=s&source=images&cd=&cad=rja&uact=8&ved=2ahUKEwi9zqfo1d_bAhUEbhQKHadvBzMQjRx6BAgBEAQ&url=https%3A%2F%2Fodysseum.klepierre.fr%2FShopping%2FBaraka-Jeux&psig=AOvVaw12cDHvIBUc_7fcqkk2dPaB&ust=1529495741840641', 'Allée Ulysse, 34000 Montpellier', '2018-08-12', '17:00', 0, '2018-06-19', 20, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `event_has_candidat_participant`
--

DROP TABLE IF EXISTS `event_has_candidat_participant`;
CREATE TABLE IF NOT EXISTS `event_has_candidat_participant` (
  `event_id` int(11) NOT NULL,
  `candidat_user_id` int(11) NOT NULL,
  PRIMARY KEY (`event_id`,`candidat_user_id`),
  KEY `fk_event_has_candidat_candidat1_idx` (`candidat_user_id`),
  KEY `fk_event_has_candidat_event1_idx` (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `event_has_entreprise_participant`
--

DROP TABLE IF EXISTS `event_has_entreprise_participant`;
CREATE TABLE IF NOT EXISTS `event_has_entreprise_participant` (
  `event_id` int(11) NOT NULL,
  `entreprise_user_id` int(11) NOT NULL,
  PRIMARY KEY (`event_id`,`entreprise_user_id`),
  KEY `fk_event_has_entreprise_entreprise1_idx` (`entreprise_user_id`),
  KEY `fk_event_has_entreprise_event1_idx` (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `matching`
--

DROP TABLE IF EXISTS `matching`;
CREATE TABLE IF NOT EXISTS `matching` (
  `candidat_user_id` int(11) NOT NULL,
  `entreprise_user_id` int(11) NOT NULL,
  `offre_id` int(11) NOT NULL,
  PRIMARY KEY (`candidat_user_id`,`entreprise_user_id`),
  KEY `fk_candidat_has_entreprise_entreprise2_idx` (`entreprise_user_id`),
  KEY `fk_candidat_has_entreprise_candidat2_idx` (`candidat_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `matching`
--

INSERT INTO `matching` (`candidat_user_id`, `entreprise_user_id`, `offre_id`) VALUES
(19, 20, 2),
(19, 22, 6),
(19, 30, 8),
(19, 34, 15),
(12, 26, 2),
(12, 27, 12),
(12, 28, 10),
(14, 29, 11),
(15, 30, 14),
(16, 31, 15);

-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

DROP TABLE IF EXISTS `offre`;
CREATE TABLE IF NOT EXISTS `offre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entreprise_user_id` int(11) NOT NULL,
  `intitule` varchar(128) DEFAULT NULL,
  `poste` varchar(96) DEFAULT NULL,
  `lieu` varchar(300) DEFAULT NULL,
  `salaire` varchar(100) DEFAULT NULL,
  `detail` varchar(1024) DEFAULT NULL,
  `date_creation` date DEFAULT NULL,
  `statut` tinyint(1) DEFAULT '0',
  `edition_possible` tinyint(1) DEFAULT '0',
  `visibility` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`,`entreprise_user_id`),
  KEY `fk_offre_entreprise1_idx` (`entreprise_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `offre`
--

INSERT INTO `offre` (`id`, `entreprise_user_id`, `intitule`, `poste`, `lieu`, `salaire`, `detail`, `date_creation`, `statut`, `edition_possible`, `visibility`) VALUES
(1, 36, 'ingénieur études et developpement', 'ingénieur sa400', 'castelnau', '50000', 'vous travaillerez au sein d\'une equipe avec un chef de projets et un  designer  .CE, ticket repas,  bureau individuel', '2018-06-19', 0, NULL, NULL),
(2, 20, 'Dev Concepteur sites web', 'developpeur full stack', 'versailles / berlin', '35000', 'Vous interviendrez sur des projets de création de sites internet, au sein d’une équipe constituée d’un chef de projet, d’intégrateurs HTML, de développeurs. Mission sur un projet ponctuel d\'une durée prévu de 30 mois', '2018-06-19', 0, NULL, NULL),
(3, 27, 'Concepteur application de test ou developpeur automatisation', 'ingenieur devOp', 'Londres', '55000', 'Pour soutenir sa croissance, akka recrute pour un poste, basé à Londres nous avons des bureaux dans l\'europe entiere et vous serrez ammené a vous déplacez a l\'internationnal', '2018-06-19', 1, NULL, NULL),
(4, 33, 'developpeur(euse) backend php/mysql', 'developpeur senior', 'itinerant', '32000', 'Vous participez aux développements: conception et maintenance de nos applications, métier orienté Web. Vous êtes expert : PHP, MySQL, Laravel, jQuery.', '2018-06-19', 1, NULL, NULL),
(5, 32, 'ingenieur etudes et developpement php', 'ingenieur', 'paris', '50000', 'Vous interviendrez sur des projets de création de sites internet, au sein d’une équipe constituée d’un chef de projet, d’intégrateurs HTML, de développeurs et...\n\n\nVous interviendrez sur des projets de création de sites internet, au sein d’une équipe constituée d’un chef de projet, d’intégrateurs HTML, de développeurs etc....Postuler directement', '2018-06-19', 1, NULL, NULL),
(6, 22, 'developpeur logiciel applicatif ', 'developpeur tout niveau', 'montpellier', '30000', 'ous rêvez de smart data, de voiture autonome, de taxi volant ou du train du futur ? Chez Assystem Technologies, nous travaillons déjà sur ces projets qui reveleront tout votre potentiel', '2018-06-19', 0, NULL, NULL),
(7, 29, 'ingenieur logiciel applicatif', 'ingenieur', 'montpellier', '55000', 'ous rêvez de smart data, de voiture autonome, de taxi volant ou du train du futur ? Chez Assystem Technologies, nous travaillons déjà sur ces projets qui reveleront tout votre potentiel, Vous interviendrez sur des projets de création de sites internet, au sein d’une équipe constituée d’un chef de projet, d’intégrateurs HTML, de développeurs et...   Vous interviendrez sur des projets de création de sites internet, au sein d’une équipe constituée d’un chef de projet, d’intégrateurs HTML, de développeurs etc....Postuler directement', '2018-06-19', 1, NULL, NULL),
(8, 30, 'dessinateur ', 'designers stagiaire', 'montpellier', '8000', 'refonte de notre site WEB et gestion des réseaux sociaux * création de maquette WEB qui sera intégrée dans les réseaux et applications mobiles * ', '2018-06-19', 1, NULL, NULL),
(9, 28, 'ingenieur atomique', 'ingenieurs chef de projets', 'montpellier / paris', '80000', 'De formation scientifiques, vous etes un expert dans la recherche moleculaire, vous aurrez en charge la supervision des deux laboratoire qui travaillent conjointement sur la physique quantique appliqué. vous aurez en charges la creation d\'un super calculateur quantique capable d\'analysé les formes proto-moléculaires de l\'agronomie blablabla.. postul si tu veut etre riche..', '2018-06-19', 1, NULL, NULL),
(10, 25, 'Développeur Backend', 'dev senior ', 'montpellier', '38000', 'Nous recherchons aujourd’hui un(e) Développeur Backend, basé(e) à Montpellier. Acteur de la confiance numérique, membre de la FrenchTech et labellisée BLAblablabla', '2018-06-19', 1, NULL, NULL),
(11, 31, 'integrateur stagiaire', 'dev junior', 'montpellier', '10000', 'Vous participez aux développements: conception et maintenance de nos applications, métier orienté Web. Vous êtes expert : PHP, MySQL, Laravel, jQuery', '2018-06-19', 1, NULL, NULL),
(12, 24, 'dev full stack ', 'developpeur ', 'montpellier', '32000', 'EA renforce son équipe de développement basée sur Montpellier et recherche un développeur d’applications mobiles (H/F). Description du poste', '2018-06-19', 0, NULL, NULL),
(13, 23, 'Développeurs Web', 'junior, confirmer, senior', 'france', '40000', '35 000 € - 43 000 € par an\nNous recherchons 2 Développeurs Web. Aujourd\'hui, nous recherchons deux Développeurs expérimentés ou pas, Back-End et/ou Front-End*', '2018-06-19', 1, NULL, NULL),
(14, 21, 'ingenieur conceptuel', 'ingenieur ', 'montpellier toulouse', '50000', 'Vous interviendrez sur des projets de création de jeu multi plateformes, au sein d’une équipe constituée d’un chef de projet, d’intégrateurs HTML, de développeurs ', '2018-06-19', 1, NULL, NULL),
(15, 34, 'happy manager', 'happy manager', 'montpellier', '28000', 'vous etes de nature dynamiques et debrouillard, vous avez une premiere experience des starts-up ? rejoignez BEWEB School\'s lunel. payer a rien foutr vous pourrez vous grattez les boules en attendant que ca passe.', '2018-06-19', 1, NULL, NULL),
(16, 36, 'joueur professionnel', 'joueur professionnel', 'montpellier / monde entier', '80000', 'vous etes joueur professinnel avec une maitrise de haut niveaux, rejoignez notre groupe et prenez notre poste d\'ambassadeur, votre mission? nous representez lors de manifestations, congres concours etc. etre egalement present sur youtubes et publier regulierement des video de demo', '2018-06-19', 1, NULL, NULL),
(17, 31, 'developpeur application mobile', 'dev confirmer', 'beenome', '30000', 'recherche un développeur d’applications mobiles (H/F). Description du poste Vous rêvez de smart data, de voiture autonome, de taxi volant ou du train du futur ne venez pas chez nous, ici ont fait des vieux trucs', '2018-06-19', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `offre_has_techno`
--

DROP TABLE IF EXISTS `offre_has_techno`;
CREATE TABLE IF NOT EXISTS `offre_has_techno` (
  `techno_id` int(11) NOT NULL,
  `offre_id` int(11) NOT NULL,
  PRIMARY KEY (`techno_id`,`offre_id`),
  KEY `fk_techno_has_offre_offre1_idx` (`offre_id`),
  KEY `fk_techno_has_offre_techno1_idx` (`techno_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `offre_has_techno`
--

INSERT INTO `offre_has_techno` (`techno_id`, `offre_id`) VALUES
(1, 1),
(3, 1),
(4, 1),
(6, 1),
(8, 2),
(9, 2),
(11, 2),
(12, 2),
(1, 3),
(3, 3),
(4, 3),
(13, 3),
(14, 3),
(15, 3),
(9, 4),
(11, 4),
(12, 4),
(16, 4),
(17, 4),
(18, 4),
(2, 5),
(5, 5),
(16, 5),
(2, 6),
(7, 6),
(20, 6),
(6, 7),
(8, 7),
(20, 7),
(4, 8),
(9, 8),
(17, 8),
(3, 9),
(12, 9),
(13, 9),
(1, 10),
(2, 10),
(13, 10),
(3, 11),
(5, 11),
(14, 11),
(4, 12),
(7, 12),
(6, 13),
(8, 13),
(17, 13),
(7, 14),
(8, 14),
(14, 14),
(15, 14),
(2, 15),
(5, 15),
(7, 15),
(17, 15),
(2, 16),
(4, 16),
(5, 16),
(6, 16),
(2, 17),
(13, 17),
(14, 17);

-- --------------------------------------------------------

--
-- Structure de la table `offre_has_type_de_contrat`
--

DROP TABLE IF EXISTS `offre_has_type_de_contrat`;
CREATE TABLE IF NOT EXISTS `offre_has_type_de_contrat` (
  `type_de_contrat_id` int(11) NOT NULL,
  `offre_id` int(11) NOT NULL,
  PRIMARY KEY (`type_de_contrat_id`,`offre_id`),
  KEY `fk_type_de_contrat_has_offre_offre1_idx` (`offre_id`),
  KEY `fk_type_de_contrat_has_offre_type_de_contrat1_idx` (`type_de_contrat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `offre_has_type_de_contrat`
--

INSERT INTO `offre_has_type_de_contrat` (`type_de_contrat_id`, `offre_id`) VALUES
(1, 1),
(3, 1),
(4, 1),
(2, 2),
(3, 2),
(4, 2),
(4, 3),
(5, 3),
(6, 4),
(1, 5),
(3, 5),
(4, 5),
(2, 6),
(3, 6),
(4, 6),
(4, 7),
(5, 7),
(1, 8),
(3, 8),
(4, 8),
(2, 9),
(3, 9),
(4, 9),
(1, 10),
(3, 10),
(4, 10),
(2, 11),
(3, 11),
(4, 11),
(4, 12),
(5, 12),
(6, 13),
(1, 14),
(3, 14),
(4, 14),
(2, 15),
(3, 15),
(4, 15),
(4, 16),
(5, 16),
(1, 17),
(3, 17),
(4, 17);

-- --------------------------------------------------------

--
-- Structure de la table `secteur_d_activite`
--

DROP TABLE IF EXISTS `secteur_d_activite`;
CREATE TABLE IF NOT EXISTS `secteur_d_activite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `secteur_d_activite`
--

INSERT INTO `secteur_d_activite` (`id`, `nom`) VALUES
(1, 'jeux_video'),
(2, 'developpement_web'),
(3, 'developpement_logiciel'),
(4, 'iot');

-- --------------------------------------------------------

--
-- Structure de la table `techno`
--

DROP TABLE IF EXISTS `techno`;
CREATE TABLE IF NOT EXISTS `techno` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `techno`
--

INSERT INTO `techno` (`id`, `nom`, `type`) VALUES
(1, 'Php', 'Back-End'),
(2, 'CSS', 'Front-End'),
(3, 'C++', 'Back-End'),
(4, 'C#', 'Back-End'),
(5, 'HTML', 'Front-End'),
(6, 'Java', 'Back-End'),
(7, 'JavaScript', 'Front-End'),
(8, 'SQL', 'Back-End'),
(9, 'JQuery', 'Library'),
(10, 'NodeJS', 'Back-End'),
(11, 'Python', 'Back-End'),
(12, 'Ruby', 'Back-End'),
(13, 'Bootstrap', 'Framework'),
(14, 'Symfony', 'Framework'),
(15, 'Laravel', 'Framework'),
(16, 'Zend', 'Framework'),
(17, 'Foundation', 'Framework'),
(18, 'Bulma', 'Framework'),
(19, 'MooTools', 'Framework'),
(20, 'Angular JS', 'Framework');

-- --------------------------------------------------------

--
-- Structure de la table `type_de_contrat`
--

DROP TABLE IF EXISTS `type_de_contrat`;
CREATE TABLE IF NOT EXISTS `type_de_contrat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_de_contrat` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type_de_contrat`
--

INSERT INTO `type_de_contrat` (`id`, `type_de_contrat`) VALUES
(1, 'cdi'),
(2, 'cdd'),
(3, 'temps_partiel'),
(4, 'temps_plein'),
(5, 'alternance'),
(6, 'stage');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `statut` tinyint(1) DEFAULT '0',
  `permission` varchar(45) DEFAULT NULL,
  `newsletter` tinyint(1) DEFAULT '0',
  `message` int(11) DEFAULT '0',
  `like` int(11) DEFAULT '0',
  `match` int(11) DEFAULT '0',
  `visibility` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `statut`, `permission`, `newsletter`, `message`, `like`, `match`, `visibility`) VALUES
(1, 1, 'admin', 0, NULL, NULL, NULL, NULL),
(2, 1, 'admin', 0, NULL, NULL, NULL, NULL),
(3, 1, 'admin', 0, NULL, NULL, NULL, NULL),
(4, 0, 'candidat', 1, NULL, NULL, NULL, NULL),
(5, 0, 'candidat', 1, NULL, NULL, NULL, NULL),
(6, 0, 'candidat', 1, NULL, NULL, NULL, NULL),
(7, 0, 'candidat', 1, NULL, NULL, NULL, NULL),
(8, 1, 'candidat', 0, NULL, NULL, NULL, NULL),
(9, 1, 'candidat', 0, NULL, NULL, NULL, NULL),
(10, 1, 'candidat', 0, NULL, NULL, NULL, NULL),
(11, 1, 'candidat', 0, NULL, NULL, NULL, NULL),
(12, 0, 'candidat', 1, NULL, NULL, NULL, NULL),
(13, 0, 'candidat', 1, NULL, NULL, NULL, NULL),
(14, 0, 'candidat', 1, NULL, NULL, NULL, NULL),
(15, 0, 'candidat', 1, NULL, NULL, NULL, NULL),
(16, 0, 'candidat', 0, NULL, NULL, NULL, NULL),
(17, 0, 'candidat', 0, NULL, NULL, NULL, NULL),
(18, 0, 'candidat', 0, NULL, NULL, NULL, NULL),
(19, 0, 'candidat', 0, NULL, NULL, NULL, NULL),
(20, 1, 'entreprise', 1, NULL, NULL, NULL, NULL),
(21, 0, 'entreprise', 1, NULL, NULL, NULL, NULL),
(22, 0, 'entreprise', 1, NULL, NULL, NULL, NULL),
(23, 0, 'entreprise', 0, NULL, NULL, NULL, NULL),
(24, 0, 'entreprise', 0, NULL, NULL, NULL, NULL),
(25, 0, 'entreprise', 1, NULL, NULL, NULL, NULL),
(26, 0, 'entreprise', 1, NULL, NULL, NULL, NULL),
(27, 1, 'entreprise', 1, NULL, NULL, NULL, NULL),
(28, 0, 'entreprise', 0, NULL, NULL, NULL, NULL),
(29, 1, 'entreprise', 0, NULL, NULL, NULL, NULL),
(30, 0, 'entreprise', 0, NULL, NULL, NULL, NULL),
(31, 0, 'entreprise', 0, NULL, NULL, NULL, NULL),
(32, 1, 'entreprise', 0, NULL, NULL, NULL, NULL),
(33, 1, 'entreprise', 0, NULL, NULL, NULL, NULL),
(34, 1, 'entreprise', 0, NULL, NULL, NULL, NULL),
(35, 1, 'entreprise', 0, NULL, NULL, NULL, NULL),
(36, 1, 'entreprise', 0, NULL, NULL, NULL, NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `fk_admin_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `candidat`
--
ALTER TABLE `candidat`
  ADD CONSTRAINT `fk_candidat_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `candidat_bookmarked_offre`
--
ALTER TABLE `candidat_bookmarked_offre`
  ADD CONSTRAINT `fk_candidat_has_offre_candidat2` FOREIGN KEY (`candidat_user_id`) REFERENCES `candidat` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_candidat_has_offre_offre2` FOREIGN KEY (`offre_id`) REFERENCES `offre` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `candidat_has_techno`
--
ALTER TABLE `candidat_has_techno`
  ADD CONSTRAINT `fk_candidat_has_techno_candidat1` FOREIGN KEY (`candidat_user_id`) REFERENCES `candidat` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_candidat_has_techno_techno1` FOREIGN KEY (`techno_id`) REFERENCES `techno` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `candidat_liked_offre`
--
ALTER TABLE `candidat_liked_offre`
  ADD CONSTRAINT `fk_candidat_has_offre_candidat1` FOREIGN KEY (`candidat_user_id`) REFERENCES `candidat` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_candidat_has_offre_offre1` FOREIGN KEY (`offre_id`) REFERENCES `offre` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `candidat_viewed_entreprise`
--
ALTER TABLE `candidat_viewed_entreprise`
  ADD CONSTRAINT `fk_candidat_has_entreprise_candidat1` FOREIGN KEY (`candidat_user_id`) REFERENCES `candidat` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_candidat_has_entreprise_entreprise1` FOREIGN KEY (`entreprise_user_id`) REFERENCES `entreprise` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `candidat_viewed_offre`
--
ALTER TABLE `candidat_viewed_offre`
  ADD CONSTRAINT `fk_candidat_has_offre1_candidat1` FOREIGN KEY (`candidat_user_id`) REFERENCES `candidat` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_candidat_has_offre1_offre1` FOREIGN KEY (`offre_id`) REFERENCES `offre` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `fk_chat_user1` FOREIGN KEY (`emetteur_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_chat_user2` FOREIGN KEY (`recepteur_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD CONSTRAINT `fk_entreprise_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `entreprise_has_secteur_d_activite`
--
ALTER TABLE `entreprise_has_secteur_d_activite`
  ADD CONSTRAINT `fk_entreprise_has_secteur_d_activite_entreprise1` FOREIGN KEY (`entreprise_user_id`) REFERENCES `entreprise` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_entreprise_has_secteur_d_activite_secteur_d_activite1` FOREIGN KEY (`secteur_d_activite_id`) REFERENCES `secteur_d_activite` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `entreprise_liked_candidat`
--
ALTER TABLE `entreprise_liked_candidat`
  ADD CONSTRAINT `fk_entreprise_has_candidat_candidat1` FOREIGN KEY (`candidat_user_id`) REFERENCES `candidat` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_entreprise_has_candidat_entreprise1` FOREIGN KEY (`entreprise_user_id`) REFERENCES `entreprise` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `entreprise_viewed_candidat`
--
ALTER TABLE `entreprise_viewed_candidat`
  ADD CONSTRAINT `fk_entreprise_has_candidat_candidat2` FOREIGN KEY (`candidat_user_id`) REFERENCES `candidat` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_entreprise_has_candidat_entreprise2` FOREIGN KEY (`entreprise_user_id`) REFERENCES `entreprise` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `entreprise_viewed_entreprise`
--
ALTER TABLE `entreprise_viewed_entreprise`
  ADD CONSTRAINT `fk_entreprise_has_entreprise_entreprise1` FOREIGN KEY (`entreprise_user_id`) REFERENCES `entreprise` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_entreprise_has_entreprise_entreprise2` FOREIGN KEY (`entreprise_user_id1`) REFERENCES `entreprise` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `entreprise_viewed_offre`
--
ALTER TABLE `entreprise_viewed_offre`
  ADD CONSTRAINT `fk_entreprise_has_offre_entreprise1` FOREIGN KEY (`entreprise_user_id`) REFERENCES `entreprise` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_entreprise_has_offre_offre1` FOREIGN KEY (`offre_id`) REFERENCES `offre` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `fk_event_entreprise1` FOREIGN KEY (`entreprise_user_id`) REFERENCES `entreprise` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `event_has_candidat_participant`
--
ALTER TABLE `event_has_candidat_participant`
  ADD CONSTRAINT `fk_event_has_candidat_candidat1` FOREIGN KEY (`candidat_user_id`) REFERENCES `candidat` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_event_has_candidat_event1` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `event_has_entreprise_participant`
--
ALTER TABLE `event_has_entreprise_participant`
  ADD CONSTRAINT `fk_event_has_entreprise_entreprise1` FOREIGN KEY (`entreprise_user_id`) REFERENCES `entreprise` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_event_has_entreprise_event1` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `matching`
--
ALTER TABLE `matching`
  ADD CONSTRAINT `fk_candidat_has_entreprise_candidat2` FOREIGN KEY (`candidat_user_id`) REFERENCES `candidat` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_candidat_has_entreprise_entreprise2` FOREIGN KEY (`entreprise_user_id`) REFERENCES `entreprise` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `offre`
--
ALTER TABLE `offre`
  ADD CONSTRAINT `fk_offre_entreprise1` FOREIGN KEY (`entreprise_user_id`) REFERENCES `entreprise` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `offre_has_techno`
--
ALTER TABLE `offre_has_techno`
  ADD CONSTRAINT `fk_techno_has_offre_offre1` FOREIGN KEY (`offre_id`) REFERENCES `offre` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_techno_has_offre_techno1` FOREIGN KEY (`techno_id`) REFERENCES `techno` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `offre_has_type_de_contrat`
--
ALTER TABLE `offre_has_type_de_contrat`
  ADD CONSTRAINT `fk_type_de_contrat_has_offre_offre1` FOREIGN KEY (`offre_id`) REFERENCES `offre` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_type_de_contrat_has_offre_type_de_contrat1` FOREIGN KEY (`type_de_contrat_id`) REFERENCES `type_de_contrat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
