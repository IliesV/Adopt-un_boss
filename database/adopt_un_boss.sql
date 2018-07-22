-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 17 juil. 2018 à 00:57
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

--
-- Base de données :  `adopt_un_boss`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `user_id` int(11) NOT NULL,
  `pseudo` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `mail` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `fk_admin_user1_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`user_id`, `pseudo`, `password`, `mail`) VALUES
(1, 'admin', 'admin', 'admin');

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
  `tel` int(10) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `password` varchar(45) NOT NULL,
  `photo` varchar(4000) NOT NULL,
  `date_creation` int(11) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `candidat`
--

INSERT INTO `candidat` (`user_id`, `nom`, `prenom`, `age`, `adresse`, `tel`, `mail`, `password`, `photo`, `date_creation`, `description`) VALUES
(16, 'Sonic', ' HEDGEHOG', 15, 'sega 20 SEGA', 606060606, 'sonic@bwb.com', 'sonic', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSvzFvo_ab1A7CelOXa5mtRqUYuGOhV40pB0nGLsJAjRHyqpUft', 1531763215, 'Je m appelle Sonic, j ai 15 ans et je suis un hérisson bleu. Malgrés les apparences, je suis très rapide. Avec moi dans votre équipe, vous aurez une rentabilité élevé ainsi que de grande chances de bonus sous forme de pièces.'),
(17, 'Le Plombier', 'Mario', 52, 'Dans un Tunnel 4514 Tunelland', 6545, 'mario@bwb.com', 'mario', 'http://www.site-de-telechargement.fr/wp-content/uploads/logo-super-mario-run.png', 1531763395, 'Je m appelle Mario. Malgres les apparences je suis d un caractere tres timide. Je suis pourtant fort pour trouve et tue les bugs et les champignons'),
(18, 'MBappé', 'Killian', 19, 'dans les etoiles 5645 Paris', 54894, 'mbappe@bwb.com', 'mbappe', 'https://resize2-elle.ladmedia.fr/r/625,,forcex/crop/625,625,center-middle,forcex,ffffff/img/var/plain_site/storage/images/people/la-vie-des-people/news/kylian-mbappe-est-il-en-couple-ou-celibataire-3685094/87828071-1-fre-FR/Kylian-Mbappe-est-il-en-couple-ou-celibataire.jpg', 1531763560, 'Anciennement Champion du Monde de Foot, je suis actuellement en reconversion. Ma vitesse de pointe et ma puissance de frappe sont des qualites à ne pas prendre a la légere.'),
(19, 'UGANDA', 'Knuckles', 16, 'Avec Sonic 584 Uganda', 5454169, 'knuckles@bwb.com', 'knuckles', 'https://images.encyclopediadramatica.rs/thumb/0/01/UgandaKnuckles.jpg/300px-UgandaKnuckles.jpg', 1531763653, 'DO U NO THE WAY ?'),
(24, 'Damso', 'William', 26, 'Bruxelles 4878 Bruxelles', 789498, 'damso@bwb.com', 'damso', 'https://static.booska-p.com/images/news/damso-lache-6-morceaux-inedits-en-streaming-649.jpg', 1531763906, 'Malgres la critique, je reste une personne calme avec un flow de malade. Ce flow est comparable à ma rapidité de codage et mes punchlines me permette dans la vie de tout les jours de codé des méthodes agressive et d autant plus efficace.');

-- --------------------------------------------------------

--
-- Structure de la table `candidat_and_entreprise_chat`
--

DROP TABLE IF EXISTS `candidat_and_entreprise_chat`;
CREATE TABLE IF NOT EXISTS `candidat_and_entreprise_chat` (
  `candidat_user_id` int(11) NOT NULL,
  `entreprise_user_id` int(11) NOT NULL,
  `message_entreprise` int(11) DEFAULT NULL,
  `message_candidat` int(11) DEFAULT NULL,
  PRIMARY KEY (`candidat_user_id`,`entreprise_user_id`),
  KEY `fk_candidat_has_entreprise_entreprise3_idx` (`entreprise_user_id`),
  KEY `fk_candidat_has_entreprise_candidat3_idx` (`candidat_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `candidat_and_entreprise_chat`
--

INSERT INTO `candidat_and_entreprise_chat` (`candidat_user_id`, `entreprise_user_id`, `message_entreprise`, `message_candidat`) VALUES
(16, 26, 0, 2);

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
(16, 1, 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `chat`
--

INSERT INTO `chat` (`id`, `recepteur_id`, `emetteur_id`, `contenu`, `date_creation`) VALUES
(1, 16, 26, 'kop', 1531785331),
(2, 16, 26, 'kop', 1531785332),
(3, 26, 16, 'qsd', 1531785945);

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
  `date_creation` int(11) DEFAULT NULL,
  `mail` varchar(100) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`user_id`, `nom`, `tel`, `adresse`, `logo`, `description`, `salarie`, `site_web`, `date_creation`, `mail`, `password`) VALUES
(26, 'Beweb', '57984', '33 Rue Jean Jacques Rousseau 34400 Lunel', 'http://www.beziers-agglo-eco.fr/fileadmin/_processed_/csm_BeWeb_3332be5320.jpg', 'Ecole du numérique de la région du languedoc rousillon, nous formons de jeune prodige avec notre formateur référant, Loic aka Dieu (oui il nous prend vraiment pour des cons)', 2, 'beweb.com', 1531764045, 'beweb@bwb.com', 'beweb'),
(30, 'Blizzard', '457489', 'Je sais pas 969 DTC', 'https://static1.millenium.org/articles/5/22/40/95/@/124171-blizzard-logo-northrend-article_m-1.jpeg', 'Malgrès notre nom d entreprise un peu froid, nous sommes une entreprise chaleureuse ou il fait bon travaillé.', 10000, 'blizzard.com', 1531764460, 'blizzard@bwb.com', 'blizzard'),
(31, 'Ubisoft', '5566', 'Je sais pas non plus 7655 dontcare', 'http://fr.ubergizmo.com/wp-content/uploads/2011/10/logo-ubisoft.jpg', 'Bonjour, nous sommes une entreprise compétente en pleine expansion avec des bureaux un peu partout dans le monde. Non mdrrr je rigole, on sait meme pas faire des serveurs correct et on sait pas non plus finir non jeu.', 520, 'ubisoft.com', 1531764710, 'ubisoft@bwb.com', 'ubisoft');

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
(26, 16, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `event`
--

INSERT INTO `event` (`id`, `titre`, `description`, `image`, `lieu`, `date`, `heure`, `statut`, `date_creation`, `entreprise_user_id`, `visibility`) VALUES
(1, 'Stage Dating', 'Rencontrez des entreprises et essayer de décrocher le gros lot; un stage. Merci a JOJO Le Grand Gagnant du la compét qui va payer sa tournée au bar.', 'https://pbs.twimg.com/media/DgMbmgmW4AAO2LE.png', 'Beweb', '2018-07-25', '15', 1, '2018-07-17', 26, NULL),
(2, 'Raid Roi Liche', 'Affrontez le roi liche. Une arme légendaire à la clé et un manuscrit (la programmation POO aka la bible de Loic).', 'https://i1.wp.com/static.connectesport.com/uploads/2017/08/hearthstone_lich_king.jpg?resize=600%2C338&ssl=1', 'Quelque part sur Wow', '2018-07-30', '20', 1, '2018-07-17', 30, NULL),
(3, 'Hackaton', 'Essayez de coder le meilleur serveur pour que nos joueurs puissent jouer sans problème. Si vous avez le temps de finir nos jeux faites vous plaisir.', 'https://www.zdnet.fr/i/edit/2018/04/39866622/hackathon_cover.jpg', 'Nimes le 100', '2018-08-05', '8', 0, '2018-07-17', 31, NULL);

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
(16, 26, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `offre`
--

INSERT INTO `offre` (`id`, `entreprise_user_id`, `intitule`, `poste`, `lieu`, `salaire`, `detail`, `date_creation`, `statut`, `edition_possible`, `visibility`) VALUES
(1, 26, 'Formateur', 'Formateur de Jeune Talent', 'Lunel', '1000', 'Notre formateur étant actuellement en train d être depasse par ses eleves qui commence a le surpasser, nous recherchons un nouveau formateur pouvant l aider a faire le travail.\r\nNon je rigole de toute facon le formateur passe sa journee a rien faire', '2018-07-16', 1, 0, 0),
(2, 30, 'Farmeur Chinois', 'Farmeur de PO', 'World Of Warcraft', '200000', 'En immersion en Azeroth, vous farmerez des PO en donjon ou en tuant de sanglier.', '2018-07-16', 1, 0, 0);

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
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(17, 1),
(18, 1),
(20, 1),
(1, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2);

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
(6, 2);

-- --------------------------------------------------------

--
-- Structure de la table `secteur_d_activite`
--

DROP TABLE IF EXISTS `secteur_d_activite`;
CREATE TABLE IF NOT EXISTS `secteur_d_activite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `statut`, `permission`, `newsletter`, `message`, `like`, `match`, `visibility`) VALUES
(1, 1, 'admin', 0, 0, 0, 0, 0),
(16, 1, 'candidat', 0, 2, 1, 1, 0),
(17, 1, 'candidat', 0, 0, 0, 0, 0),
(18, 1, 'candidat', 0, 0, 0, 0, 0),
(19, 1, 'candidat', 0, 0, 0, 1, 0),
(24, 1, 'candidat', 0, 0, 0, 0, 0),
(26, 1, 'entreprise', 0, 0, 1, 1, 0),
(30, 1, 'entreprise', 0, 0, 0, 0, 0),
(31, 0, 'entreprise', 0, 0, 0, 0, 0);

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
-- Contraintes pour la table `candidat_and_entreprise_chat`
--
ALTER TABLE `candidat_and_entreprise_chat`
  ADD CONSTRAINT `fk_candidat_has_entreprise_candidat3` FOREIGN KEY (`candidat_user_id`) REFERENCES `candidat` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_candidat_has_entreprise_entreprise3` FOREIGN KEY (`entreprise_user_id`) REFERENCES `entreprise` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
