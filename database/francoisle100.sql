-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema adopt_un_boss
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema adopt_un_boss
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `adopt_un_boss` DEFAULT CHARACTER SET utf8 ;
USE `adopt_un_boss` ;

-- -----------------------------------------------------
-- Table `adopt_un_boss`.`techno`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `adopt_un_boss`.`techno` ;

CREATE TABLE IF NOT EXISTS `adopt_un_boss`.`techno` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NULL,
  `type` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `adopt_un_boss`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `adopt_un_boss`.`user` ;

CREATE TABLE IF NOT EXISTS `adopt_un_boss`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `statut` TINYINT(1) NULL DEFAULT 0,
  `permission` VARCHAR(45) NULL,
  `newsletter` TINYINT(1) NULL DEFAULT 0,
  `message` INT NULL DEFAULT 0,
  `like` INT NULL DEFAULT 0,
  `match` INT NULL DEFAULT 0,
  `visibility` TINYINT(1) NULL DEFAULT 0,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `adopt_un_boss`.`entreprise`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `adopt_un_boss`.`entreprise` ;

CREATE TABLE IF NOT EXISTS `adopt_un_boss`.`entreprise` (
  `user_id` INT NOT NULL,
  `nom` VARCHAR(45) NULL,
  `tel` VARCHAR(20) NULL,
  `adresse` VARCHAR(300) NULL,
  `logo` VARCHAR(4000) NULL,
  `description` VARCHAR(700) NULL,
  `salarie` INT NULL,
  `site_web` VARCHAR(45) NULL,
  `date_creation` DATE NULL,
  `mail` VARCHAR(100) NULL,
  `password` VARCHAR(45) NULL,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `fk_entreprise_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `adopt_un_boss`.`user` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `adopt_un_boss`.`offre`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `adopt_un_boss`.`offre` ;

CREATE TABLE IF NOT EXISTS `adopt_un_boss`.`offre` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `entreprise_user_id` INT NOT NULL,
  `intitule` VARCHAR(128) NULL,
  `poste` VARCHAR(96) NULL,
  `lieu` VARCHAR(300) NULL,
  `salaire` VARCHAR(100) NULL,
  `detail` VARCHAR(1024) NULL,
  `date_creation` DATE NULL,
  `statut` TINYINT(1) NULL DEFAULT 0,
  `edition_possible` TINYINT(1) NULL DEFAULT 0,
  `visibility` TINYINT(1) NULL DEFAULT 0,
  PRIMARY KEY (`id`, `entreprise_user_id`),
  INDEX `fk_offre_entreprise1_idx` (`entreprise_user_id` ASC),
  CONSTRAINT `fk_offre_entreprise1`
    FOREIGN KEY (`entreprise_user_id`)
    REFERENCES `adopt_un_boss`.`entreprise` (`user_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `adopt_un_boss`.`candidat`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `adopt_un_boss`.`candidat` ;

CREATE TABLE IF NOT EXISTS `adopt_un_boss`.`candidat` (
  `user_id` INT NOT NULL,
  `nom` VARCHAR(45) NOT NULL,
  `prenom` VARCHAR(45) NOT NULL,
  `age` INT NOT NULL,
  `adresse` VARCHAR(300) NOT NULL,
  `tel` VARCHAR(10) NOT NULL,
  `mail` VARCHAR(100) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `photo` VARCHAR(4000) NOT NULL,
  `date_creation` DATE NOT NULL,
  `description` VARCHAR(1000) NULL,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `fk_candidat_user`
    FOREIGN KEY (`user_id`)
    REFERENCES `adopt_un_boss`.`user` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `adopt_un_boss`.`chat`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `adopt_un_boss`.`chat` ;

CREATE TABLE IF NOT EXISTS `adopt_un_boss`.`chat` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `recepteur_id` INT NOT NULL,
  `emetteur_id` INT NOT NULL,
  `contenu` VARCHAR(2048) NULL,
  `date_creation` INT NULL,
  PRIMARY KEY (`id`, `recepteur_id`, `emetteur_id`),
  INDEX `fk_chat_user1_idx` (`emetteur_id` ASC),
  INDEX `fk_chat_user2_idx` (`recepteur_id` ASC),
  CONSTRAINT `fk_chat_user1`
    FOREIGN KEY (`emetteur_id`)
    REFERENCES `adopt_un_boss`.`user` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_chat_user2`
    FOREIGN KEY (`recepteur_id`)
    REFERENCES `adopt_un_boss`.`user` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `adopt_un_boss`.`admin`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `adopt_un_boss`.`admin` ;

CREATE TABLE IF NOT EXISTS `adopt_un_boss`.`admin` (
  `user_id` INT NOT NULL,
  `pseudo` VARCHAR(45) NULL,
  `password` VARCHAR(45) NULL,
  PRIMARY KEY (`user_id`),
  INDEX `fk_admin_user1_idx` (`user_id` ASC),
  CONSTRAINT `fk_admin_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `adopt_un_boss`.`user` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `adopt_un_boss`.`actualite`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `adopt_un_boss`.`actualite` ;

CREATE TABLE IF NOT EXISTS `adopt_un_boss`.`actualite` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `titre` VARCHAR(45) NULL,
  `texte` VARCHAR(1024) NULL,
  `statut` TINYINT(1) NULL DEFAULT 0,
  `date_creation` DATE NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `adopt_un_boss`.`event`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `adopt_un_boss`.`event` ;

CREATE TABLE IF NOT EXISTS `adopt_un_boss`.`event` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `titre` VARCHAR(100) NULL,
  `description` VARCHAR(1024) NULL,
  `image` VARCHAR(4000) NULL,
  `lieu` VARCHAR(300) NULL,
  `date` DATE NULL,
  `heure` VARCHAR(5) NULL,
  `statut` TINYINT(1) NULL DEFAULT 0,
  `date_creation` DATE NULL,
  `entreprise_user_id` INT NOT NULL,
  `visibility` TINYINT(1) NULL,
  PRIMARY KEY (`id`, `entreprise_user_id`),
  INDEX `fk_event_entreprise1_idx` (`entreprise_user_id` ASC),
  CONSTRAINT `fk_event_entreprise1`
    FOREIGN KEY (`entreprise_user_id`)
    REFERENCES `adopt_un_boss`.`entreprise` (`user_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `adopt_un_boss`.`candidat_has_techno`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `adopt_un_boss`.`candidat_has_techno` ;

CREATE TABLE IF NOT EXISTS `adopt_un_boss`.`candidat_has_techno` (
  `candidat_user_id` INT NOT NULL,
  `techno_id` INT NOT NULL,
  PRIMARY KEY (`candidat_user_id`, `techno_id`),
  INDEX `fk_candidat_has_techno_techno1_idx` (`techno_id` ASC),
  INDEX `fk_candidat_has_techno_candidat1_idx` (`candidat_user_id` ASC),
  CONSTRAINT `fk_candidat_has_techno_candidat1`
    FOREIGN KEY (`candidat_user_id`)
    REFERENCES `adopt_un_boss`.`candidat` (`user_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_candidat_has_techno_techno1`
    FOREIGN KEY (`techno_id`)
    REFERENCES `adopt_un_boss`.`techno` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `adopt_un_boss`.`offre_has_techno`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `adopt_un_boss`.`offre_has_techno` ;

CREATE TABLE IF NOT EXISTS `adopt_un_boss`.`offre_has_techno` (
  `techno_id` INT NOT NULL,
  `offre_id` INT NOT NULL,
  PRIMARY KEY (`techno_id`, `offre_id`),
  INDEX `fk_techno_has_offre_offre1_idx` (`offre_id` ASC),
  INDEX `fk_techno_has_offre_techno1_idx` (`techno_id` ASC),
  CONSTRAINT `fk_techno_has_offre_techno1`
    FOREIGN KEY (`techno_id`)
    REFERENCES `adopt_un_boss`.`techno` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_techno_has_offre_offre1`
    FOREIGN KEY (`offre_id`)
    REFERENCES `adopt_un_boss`.`offre` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `adopt_un_boss`.`secteur_d_activite`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `adopt_un_boss`.`secteur_d_activite` ;

CREATE TABLE IF NOT EXISTS `adopt_un_boss`.`secteur_d_activite` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(40) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `adopt_un_boss`.`entreprise_has_secteur_d_activite`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `adopt_un_boss`.`entreprise_has_secteur_d_activite` ;

CREATE TABLE IF NOT EXISTS `adopt_un_boss`.`entreprise_has_secteur_d_activite` (
  `entreprise_user_id` INT NOT NULL,
  `secteur_d_activite_id` INT NOT NULL,
  PRIMARY KEY (`entreprise_user_id`, `secteur_d_activite_id`),
  INDEX `fk_entreprise_has_secteur_d_activite_secteur_d_activite1_idx` (`secteur_d_activite_id` ASC),
  INDEX `fk_entreprise_has_secteur_d_activite_entreprise1_idx` (`entreprise_user_id` ASC),
  CONSTRAINT `fk_entreprise_has_secteur_d_activite_entreprise1`
    FOREIGN KEY (`entreprise_user_id`)
    REFERENCES `adopt_un_boss`.`entreprise` (`user_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_entreprise_has_secteur_d_activite_secteur_d_activite1`
    FOREIGN KEY (`secteur_d_activite_id`)
    REFERENCES `adopt_un_boss`.`secteur_d_activite` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `adopt_un_boss`.`type_de_contrat`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `adopt_un_boss`.`type_de_contrat` ;

CREATE TABLE IF NOT EXISTS `adopt_un_boss`.`type_de_contrat` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `type_de_contrat` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `adopt_un_boss`.`offre_has_type_de_contrat`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `adopt_un_boss`.`offre_has_type_de_contrat` ;

CREATE TABLE IF NOT EXISTS `adopt_un_boss`.`offre_has_type_de_contrat` (
  `type_de_contrat_id` INT NOT NULL,
  `offre_id` INT NOT NULL,
  PRIMARY KEY (`type_de_contrat_id`, `offre_id`),
  INDEX `fk_type_de_contrat_has_offre_offre1_idx` (`offre_id` ASC),
  INDEX `fk_type_de_contrat_has_offre_type_de_contrat1_idx` (`type_de_contrat_id` ASC),
  CONSTRAINT `fk_type_de_contrat_has_offre_type_de_contrat1`
    FOREIGN KEY (`type_de_contrat_id`)
    REFERENCES `adopt_un_boss`.`type_de_contrat` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_type_de_contrat_has_offre_offre1`
    FOREIGN KEY (`offre_id`)
    REFERENCES `adopt_un_boss`.`offre` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `adopt_un_boss`.`candidat_liked_offre`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `adopt_un_boss`.`candidat_liked_offre` ;

CREATE TABLE IF NOT EXISTS `adopt_un_boss`.`candidat_liked_offre` (
  `candidat_user_id` INT NOT NULL,
  `offre_id` INT NOT NULL,
  `answered` TINYINT(1) NULL DEFAULT 0,
  PRIMARY KEY (`candidat_user_id`, `offre_id`),
  INDEX `fk_candidat_has_offre_offre1_idx` (`offre_id` ASC),
  INDEX `fk_candidat_has_offre_candidat1_idx` (`candidat_user_id` ASC),
  CONSTRAINT `fk_candidat_has_offre_candidat1`
    FOREIGN KEY (`candidat_user_id`)
    REFERENCES `adopt_un_boss`.`candidat` (`user_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_candidat_has_offre_offre1`
    FOREIGN KEY (`offre_id`)
    REFERENCES `adopt_un_boss`.`offre` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `adopt_un_boss`.`entreprise_liked_candidat`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `adopt_un_boss`.`entreprise_liked_candidat` ;

CREATE TABLE IF NOT EXISTS `adopt_un_boss`.`entreprise_liked_candidat` (
  `entreprise_user_id` INT NOT NULL,
  `candidat_user_id` INT NOT NULL,
  `offre_id` INT NOT NULL,
  PRIMARY KEY (`entreprise_user_id`, `candidat_user_id`, `offre_id`),
  INDEX `fk_entreprise_has_candidat_candidat1_idx` (`candidat_user_id` ASC),
  INDEX `fk_entreprise_has_candidat_entreprise1_idx` (`entreprise_user_id` ASC),
  CONSTRAINT `fk_entreprise_has_candidat_entreprise1`
    FOREIGN KEY (`entreprise_user_id`)
    REFERENCES `adopt_un_boss`.`entreprise` (`user_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_entreprise_has_candidat_candidat1`
    FOREIGN KEY (`candidat_user_id`)
    REFERENCES `adopt_un_boss`.`candidat` (`user_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `adopt_un_boss`.`candidat_bookmarked_offre`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `adopt_un_boss`.`candidat_bookmarked_offre` ;

CREATE TABLE IF NOT EXISTS `adopt_un_boss`.`candidat_bookmarked_offre` (
  `candidat_user_id` INT NOT NULL,
  `offre_id` INT NOT NULL,
  PRIMARY KEY (`candidat_user_id`, `offre_id`),
  INDEX `fk_candidat_has_offre_offre2_idx` (`offre_id` ASC),
  INDEX `fk_candidat_has_offre_candidat2_idx` (`candidat_user_id` ASC),
  CONSTRAINT `fk_candidat_has_offre_candidat2`
    FOREIGN KEY (`candidat_user_id`)
    REFERENCES `adopt_un_boss`.`candidat` (`user_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_candidat_has_offre_offre2`
    FOREIGN KEY (`offre_id`)
    REFERENCES `adopt_un_boss`.`offre` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `adopt_un_boss`.`candidat_viewed_offre`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `adopt_un_boss`.`candidat_viewed_offre` ;

CREATE TABLE IF NOT EXISTS `adopt_un_boss`.`candidat_viewed_offre` (
  `candidat_user_id` INT NOT NULL,
  `offre_id` INT NOT NULL,
  PRIMARY KEY (`candidat_user_id`, `offre_id`),
  INDEX `fk_candidat_has_offre1_offre1_idx` (`offre_id` ASC),
  INDEX `fk_candidat_has_offre1_candidat1_idx` (`candidat_user_id` ASC),
  CONSTRAINT `fk_candidat_has_offre1_candidat1`
    FOREIGN KEY (`candidat_user_id`)
    REFERENCES `adopt_un_boss`.`candidat` (`user_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_candidat_has_offre1_offre1`
    FOREIGN KEY (`offre_id`)
    REFERENCES `adopt_un_boss`.`offre` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `adopt_un_boss`.`entreprise_viewed_offre`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `adopt_un_boss`.`entreprise_viewed_offre` ;

CREATE TABLE IF NOT EXISTS `adopt_un_boss`.`entreprise_viewed_offre` (
  `entreprise_user_id` INT NOT NULL,
  `offre_id` INT NOT NULL,
  PRIMARY KEY (`entreprise_user_id`, `offre_id`),
  INDEX `fk_entreprise_has_offre_offre1_idx` (`offre_id` ASC),
  INDEX `fk_entreprise_has_offre_entreprise1_idx` (`entreprise_user_id` ASC),
  CONSTRAINT `fk_entreprise_has_offre_entreprise1`
    FOREIGN KEY (`entreprise_user_id`)
    REFERENCES `adopt_un_boss`.`entreprise` (`user_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_entreprise_has_offre_offre1`
    FOREIGN KEY (`offre_id`)
    REFERENCES `adopt_un_boss`.`offre` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `adopt_un_boss`.`candidat_viewed_entreprise`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `adopt_un_boss`.`candidat_viewed_entreprise` ;

CREATE TABLE IF NOT EXISTS `adopt_un_boss`.`candidat_viewed_entreprise` (
  `candidat_user_id` INT NOT NULL,
  `entreprise_user_id` INT NOT NULL,
  PRIMARY KEY (`candidat_user_id`, `entreprise_user_id`),
  INDEX `fk_candidat_has_entreprise_entreprise1_idx` (`entreprise_user_id` ASC),
  INDEX `fk_candidat_has_entreprise_candidat1_idx` (`candidat_user_id` ASC),
  CONSTRAINT `fk_candidat_has_entreprise_candidat1`
    FOREIGN KEY (`candidat_user_id`)
    REFERENCES `adopt_un_boss`.`candidat` (`user_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_candidat_has_entreprise_entreprise1`
    FOREIGN KEY (`entreprise_user_id`)
    REFERENCES `adopt_un_boss`.`entreprise` (`user_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `adopt_un_boss`.`entreprise_viewed_candidat`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `adopt_un_boss`.`entreprise_viewed_candidat` ;

CREATE TABLE IF NOT EXISTS `adopt_un_boss`.`entreprise_viewed_candidat` (
  `entreprise_user_id` INT NOT NULL,
  `candidat_user_id` INT NOT NULL,
  PRIMARY KEY (`entreprise_user_id`, `candidat_user_id`),
  INDEX `fk_entreprise_has_candidat_candidat2_idx` (`candidat_user_id` ASC),
  INDEX `fk_entreprise_has_candidat_entreprise2_idx` (`entreprise_user_id` ASC),
  CONSTRAINT `fk_entreprise_has_candidat_entreprise2`
    FOREIGN KEY (`entreprise_user_id`)
    REFERENCES `adopt_un_boss`.`entreprise` (`user_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_entreprise_has_candidat_candidat2`
    FOREIGN KEY (`candidat_user_id`)
    REFERENCES `adopt_un_boss`.`candidat` (`user_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `adopt_un_boss`.`event_has_candidat_participant`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `adopt_un_boss`.`event_has_candidat_participant` ;

CREATE TABLE IF NOT EXISTS `adopt_un_boss`.`event_has_candidat_participant` (
  `event_id` INT NOT NULL,
  `candidat_user_id` INT NOT NULL,
  PRIMARY KEY (`event_id`, `candidat_user_id`),
  INDEX `fk_event_has_candidat_candidat1_idx` (`candidat_user_id` ASC),
  INDEX `fk_event_has_candidat_event1_idx` (`event_id` ASC),
  CONSTRAINT `fk_event_has_candidat_event1`
    FOREIGN KEY (`event_id`)
    REFERENCES `adopt_un_boss`.`event` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_event_has_candidat_candidat1`
    FOREIGN KEY (`candidat_user_id`)
    REFERENCES `adopt_un_boss`.`candidat` (`user_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `adopt_un_boss`.`event_has_entreprise_participant`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `adopt_un_boss`.`event_has_entreprise_participant` ;

CREATE TABLE IF NOT EXISTS `adopt_un_boss`.`event_has_entreprise_participant` (
  `event_id` INT NOT NULL,
  `entreprise_user_id` INT NOT NULL,
  PRIMARY KEY (`event_id`, `entreprise_user_id`),
  INDEX `fk_event_has_entreprise_entreprise1_idx` (`entreprise_user_id` ASC),
  INDEX `fk_event_has_entreprise_event1_idx` (`event_id` ASC),
  CONSTRAINT `fk_event_has_entreprise_event1`
    FOREIGN KEY (`event_id`)
    REFERENCES `adopt_un_boss`.`event` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_event_has_entreprise_entreprise1`
    FOREIGN KEY (`entreprise_user_id`)
    REFERENCES `adopt_un_boss`.`entreprise` (`user_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `adopt_un_boss`.`entreprise_viewed_entreprise`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `adopt_un_boss`.`entreprise_viewed_entreprise` ;

CREATE TABLE IF NOT EXISTS `adopt_un_boss`.`entreprise_viewed_entreprise` (
  `entreprise_user_id` INT NOT NULL,
  `entreprise_user_id1` INT NOT NULL,
  PRIMARY KEY (`entreprise_user_id`, `entreprise_user_id1`),
  INDEX `fk_entreprise_has_entreprise_entreprise2_idx` (`entreprise_user_id1` ASC),
  INDEX `fk_entreprise_has_entreprise_entreprise1_idx` (`entreprise_user_id` ASC),
  CONSTRAINT `fk_entreprise_has_entreprise_entreprise1`
    FOREIGN KEY (`entreprise_user_id`)
    REFERENCES `adopt_un_boss`.`entreprise` (`user_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_entreprise_has_entreprise_entreprise2`
    FOREIGN KEY (`entreprise_user_id1`)
    REFERENCES `adopt_un_boss`.`entreprise` (`user_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `adopt_un_boss`.`matching`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `adopt_un_boss`.`matching` ;

CREATE TABLE IF NOT EXISTS `adopt_un_boss`.`matching` (
  `candidat_user_id` INT NOT NULL,
  `entreprise_user_id` INT NOT NULL,
  `offre_id` INT NOT NULL,
  PRIMARY KEY (`candidat_user_id`, `entreprise_user_id`),
  INDEX `fk_candidat_has_entreprise_entreprise2_idx` (`entreprise_user_id` ASC),
  INDEX `fk_candidat_has_entreprise_candidat2_idx` (`candidat_user_id` ASC),
  CONSTRAINT `fk_candidat_has_entreprise_candidat2`
    FOREIGN KEY (`candidat_user_id`)
    REFERENCES `adopt_un_boss`.`candidat` (`user_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_candidat_has_entreprise_entreprise2`
    FOREIGN KEY (`entreprise_user_id`)
    REFERENCES `adopt_un_boss`.`entreprise` (`user_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `adopt_un_boss`.`candidat_and_entreprise_chat`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `adopt_un_boss`.`candidat_and_entreprise_chat` ;

CREATE TABLE IF NOT EXISTS `adopt_un_boss`.`candidat_and_entreprise_chat` (
  `candidat_user_id` INT NOT NULL,
  `entreprise_user_id` INT NOT NULL,
  `nombre_message` INT NULL,
  PRIMARY KEY (`candidat_user_id`, `entreprise_user_id`),
  INDEX `fk_candidat_has_entreprise_entreprise3_idx` (`entreprise_user_id` ASC),
  INDEX `fk_candidat_has_entreprise_candidat3_idx` (`candidat_user_id` ASC),
  CONSTRAINT `fk_candidat_has_entreprise_candidat3`
    FOREIGN KEY (`candidat_user_id`)
    REFERENCES `adopt_un_boss`.`candidat` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_candidat_has_entreprise_entreprise3`
    FOREIGN KEY (`entreprise_user_id`)
    REFERENCES `adopt_un_boss`.`entreprise` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `adopt_un_boss`.`techno`
-- -----------------------------------------------------
START TRANSACTION;
USE `adopt_un_boss`;
INSERT INTO `adopt_un_boss`.`techno` (`id`, `nom`, `type`) VALUES (1, 'Php', 'Back-End');
INSERT INTO `adopt_un_boss`.`techno` (`id`, `nom`, `type`) VALUES (2, 'CSS', 'Front-End');
INSERT INTO `adopt_un_boss`.`techno` (`id`, `nom`, `type`) VALUES (3, 'C++', 'Back-End');
INSERT INTO `adopt_un_boss`.`techno` (`id`, `nom`, `type`) VALUES (4, 'C#', 'Back-End');
INSERT INTO `adopt_un_boss`.`techno` (`id`, `nom`, `type`) VALUES (5, 'HTML', 'Front-End');
INSERT INTO `adopt_un_boss`.`techno` (`id`, `nom`, `type`) VALUES (6, 'Java', 'Back-End');
INSERT INTO `adopt_un_boss`.`techno` (`id`, `nom`, `type`) VALUES (7, 'JavaScript', 'Front-End');
INSERT INTO `adopt_un_boss`.`techno` (`id`, `nom`, `type`) VALUES (8, 'SQL', 'Back-End');
INSERT INTO `adopt_un_boss`.`techno` (`id`, `nom`, `type`) VALUES (9, 'JQuery', 'Library');
INSERT INTO `adopt_un_boss`.`techno` (`id`, `nom`, `type`) VALUES (10, 'NodeJS', 'Back-End');
INSERT INTO `adopt_un_boss`.`techno` (`id`, `nom`, `type`) VALUES (11, 'Python', 'Back-End');
INSERT INTO `adopt_un_boss`.`techno` (`id`, `nom`, `type`) VALUES (12, 'Ruby', 'Back-End');
INSERT INTO `adopt_un_boss`.`techno` (`id`, `nom`, `type`) VALUES (13, 'Bootstrap', 'Framework');
INSERT INTO `adopt_un_boss`.`techno` (`id`, `nom`, `type`) VALUES (14, 'Symfony', 'Framework');
INSERT INTO `adopt_un_boss`.`techno` (`id`, `nom`, `type`) VALUES (15, 'Laravel', 'Framework');
INSERT INTO `adopt_un_boss`.`techno` (`id`, `nom`, `type`) VALUES (16, 'Zend', 'Framework');
INSERT INTO `adopt_un_boss`.`techno` (`id`, `nom`, `type`) VALUES (17, 'Foundation', 'Framework');
INSERT INTO `adopt_un_boss`.`techno` (`id`, `nom`, `type`) VALUES (18, 'Bulma', 'Framework');
INSERT INTO `adopt_un_boss`.`techno` (`id`, `nom`, `type`) VALUES (19, 'MooTools', 'Framework');
INSERT INTO `adopt_un_boss`.`techno` (`id`, `nom`, `type`) VALUES (20, 'Angular JS', 'Framework');

COMMIT;


-- -----------------------------------------------------
-- Data for table `adopt_un_boss`.`user`
-- -----------------------------------------------------
START TRANSACTION;
USE `adopt_un_boss`;
INSERT INTO `adopt_un_boss`.`user` (`id`, `statut`, `permission`, `newsletter`, `message`, `like`, `match`, `visibility`) VALUES (1, 1, 'admin', 0, NULL, NULL, NULL, NULL);
INSERT INTO `adopt_un_boss`.`user` (`id`, `statut`, `permission`, `newsletter`, `message`, `like`, `match`, `visibility`) VALUES (2, 1, 'admin', 0, NULL, NULL, NULL, NULL);
INSERT INTO `adopt_un_boss`.`user` (`id`, `statut`, `permission`, `newsletter`, `message`, `like`, `match`, `visibility`) VALUES (3, 1, 'admin', 0, NULL, NULL, NULL, NULL);
INSERT INTO `adopt_un_boss`.`user` (`id`, `statut`, `permission`, `newsletter`, `message`, `like`, `match`, `visibility`) VALUES (4, 0, 'candidat', 1, NULL, NULL, NULL, NULL);
INSERT INTO `adopt_un_boss`.`user` (`id`, `statut`, `permission`, `newsletter`, `message`, `like`, `match`, `visibility`) VALUES (5, 1, 'candidat', 1, NULL, NULL, NULL, NULL);
INSERT INTO `adopt_un_boss`.`user` (`id`, `statut`, `permission`, `newsletter`, `message`, `like`, `match`, `visibility`) VALUES (6, 1, 'candidat', 1, NULL, NULL, NULL, NULL);
INSERT INTO `adopt_un_boss`.`user` (`id`, `statut`, `permission`, `newsletter`, `message`, `like`, `match`, `visibility`) VALUES (7, 0, 'candidat', 1, NULL, NULL, NULL, NULL);
INSERT INTO `adopt_un_boss`.`user` (`id`, `statut`, `permission`, `newsletter`, `message`, `like`, `match`, `visibility`) VALUES (8, 1, 'candidat', 0, NULL, NULL, NULL, NULL);
INSERT INTO `adopt_un_boss`.`user` (`id`, `statut`, `permission`, `newsletter`, `message`, `like`, `match`, `visibility`) VALUES (9, 1, 'candidat', 0, NULL, NULL, NULL, NULL);
INSERT INTO `adopt_un_boss`.`user` (`id`, `statut`, `permission`, `newsletter`, `message`, `like`, `match`, `visibility`) VALUES (10, 1, 'candidat', 0, NULL, NULL, NULL, NULL);
INSERT INTO `adopt_un_boss`.`user` (`id`, `statut`, `permission`, `newsletter`, `message`, `like`, `match`, `visibility`) VALUES (11, 1, 'candidat', 0, NULL, NULL, NULL, NULL);
INSERT INTO `adopt_un_boss`.`user` (`id`, `statut`, `permission`, `newsletter`, `message`, `like`, `match`, `visibility`) VALUES (12, 0, 'candidat', 1, NULL, NULL, NULL, NULL);
INSERT INTO `adopt_un_boss`.`user` (`id`, `statut`, `permission`, `newsletter`, `message`, `like`, `match`, `visibility`) VALUES (13, 0, 'candidat', 1, NULL, NULL, NULL, NULL);
INSERT INTO `adopt_un_boss`.`user` (`id`, `statut`, `permission`, `newsletter`, `message`, `like`, `match`, `visibility`) VALUES (14, 0, 'candidat', 1, NULL, NULL, NULL, NULL);
INSERT INTO `adopt_un_boss`.`user` (`id`, `statut`, `permission`, `newsletter`, `message`, `like`, `match`, `visibility`) VALUES (15, 0, 'candidat', 1, NULL, NULL, NULL, NULL);
INSERT INTO `adopt_un_boss`.`user` (`id`, `statut`, `permission`, `newsletter`, `message`, `like`, `match`, `visibility`) VALUES (16, 0, 'candidat', 0, NULL, NULL, NULL, NULL);
INSERT INTO `adopt_un_boss`.`user` (`id`, `statut`, `permission`, `newsletter`, `message`, `like`, `match`, `visibility`) VALUES (17, 0, 'candidat', 0, NULL, NULL, NULL, NULL);
INSERT INTO `adopt_un_boss`.`user` (`id`, `statut`, `permission`, `newsletter`, `message`, `like`, `match`, `visibility`) VALUES (18, 0, 'candidat', 0, NULL, NULL, NULL, NULL);
INSERT INTO `adopt_un_boss`.`user` (`id`, `statut`, `permission`, `newsletter`, `message`, `like`, `match`, `visibility`) VALUES (19, 1, 'candidat', 0, NULL, NULL, NULL, NULL);
INSERT INTO `adopt_un_boss`.`user` (`id`, `statut`, `permission`, `newsletter`, `message`, `like`, `match`, `visibility`) VALUES (20, 1, 'entreprise', 1, NULL, NULL, NULL, NULL);
INSERT INTO `adopt_un_boss`.`user` (`id`, `statut`, `permission`, `newsletter`, `message`, `like`, `match`, `visibility`) VALUES (21, 0, 'entreprise', 1, NULL, NULL, NULL, NULL);
INSERT INTO `adopt_un_boss`.`user` (`id`, `statut`, `permission`, `newsletter`, `message`, `like`, `match`, `visibility`) VALUES (22, 0, 'entreprise', 1, NULL, NULL, NULL, NULL);
INSERT INTO `adopt_un_boss`.`user` (`id`, `statut`, `permission`, `newsletter`, `message`, `like`, `match`, `visibility`) VALUES (23, 0, 'entreprise', 0, NULL, NULL, NULL, NULL);
INSERT INTO `adopt_un_boss`.`user` (`id`, `statut`, `permission`, `newsletter`, `message`, `like`, `match`, `visibility`) VALUES (24, 0, 'entreprise', 0, NULL, NULL, NULL, NULL);
INSERT INTO `adopt_un_boss`.`user` (`id`, `statut`, `permission`, `newsletter`, `message`, `like`, `match`, `visibility`) VALUES (25, 0, 'entreprise', 1, NULL, NULL, NULL, NULL);
INSERT INTO `adopt_un_boss`.`user` (`id`, `statut`, `permission`, `newsletter`, `message`, `like`, `match`, `visibility`) VALUES (26, 0, 'entreprise', 1, NULL, NULL, NULL, NULL);
INSERT INTO `adopt_un_boss`.`user` (`id`, `statut`, `permission`, `newsletter`, `message`, `like`, `match`, `visibility`) VALUES (27, 1, 'entreprise', 1, NULL, NULL, NULL, NULL);
INSERT INTO `adopt_un_boss`.`user` (`id`, `statut`, `permission`, `newsletter`, `message`, `like`, `match`, `visibility`) VALUES (28, 0, 'entreprise', 0, NULL, NULL, NULL, NULL);
INSERT INTO `adopt_un_boss`.`user` (`id`, `statut`, `permission`, `newsletter`, `message`, `like`, `match`, `visibility`) VALUES (29, 1, 'entreprise', 0, NULL, NULL, NULL, NULL);
INSERT INTO `adopt_un_boss`.`user` (`id`, `statut`, `permission`, `newsletter`, `message`, `like`, `match`, `visibility`) VALUES (30, 0, 'entreprise', 0, NULL, NULL, NULL, NULL);
INSERT INTO `adopt_un_boss`.`user` (`id`, `statut`, `permission`, `newsletter`, `message`, `like`, `match`, `visibility`) VALUES (31, 0, 'entreprise', 0, NULL, NULL, NULL, NULL);
INSERT INTO `adopt_un_boss`.`user` (`id`, `statut`, `permission`, `newsletter`, `message`, `like`, `match`, `visibility`) VALUES (32, 1, 'entreprise', 0, NULL, NULL, NULL, NULL);
INSERT INTO `adopt_un_boss`.`user` (`id`, `statut`, `permission`, `newsletter`, `message`, `like`, `match`, `visibility`) VALUES (33, 1, 'entreprise', 0, NULL, NULL, NULL, NULL);
INSERT INTO `adopt_un_boss`.`user` (`id`, `statut`, `permission`, `newsletter`, `message`, `like`, `match`, `visibility`) VALUES (34, 1, 'entreprise', 0, NULL, NULL, NULL, NULL);
INSERT INTO `adopt_un_boss`.`user` (`id`, `statut`, `permission`, `newsletter`, `message`, `like`, `match`, `visibility`) VALUES (35, 1, 'entreprise', 0, NULL, NULL, NULL, NULL);
INSERT INTO `adopt_un_boss`.`user` (`id`, `statut`, `permission`, `newsletter`, `message`, `like`, `match`, `visibility`) VALUES (36, 1, 'entreprise', 0, NULL, NULL, NULL, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `adopt_un_boss`.`entreprise`
-- -----------------------------------------------------
START TRANSACTION;
USE `adopt_un_boss`;
INSERT INTO `adopt_un_boss`.`entreprise` (`user_id`, `nom`, `tel`, `adresse`, `logo`, `description`, `salarie`, `site_web`, `date_creation`, `mail`, `password`) VALUES (36, 'ubisoft', '0467712233', '1 Chemin de Borie, 34170 Castelnau-le-Lez', 'https://slack-imgs.com/?c=1&url=https%3A%2F%2F3.bp.blogspot.com%2F-m7Y-MhoOEpY%2FWpae3Hv5jCI%2FAAAAAAAABIc%2FQhGn8Z1XKTgEWmXzQTzSox7ZHJ_Q5BidQCLcBGAs%2Fs1600%2FEl%252Bprofesor%252BLa%252Bcasa%252Bde%252Bpapel.jpg', 'Ubisoft est une entreprise française de développement, d\'édition et de distribution de jeux vidéo, créée en mars 1986 par les cinq frères Guillemot, originaires de Carentoir dans le Morbihan, en France.', 1000, 'http://ubisoft.com', '2018-06-19', 'nkmouk@gmail.com', 'entreprise');
INSERT INTO `adopt_un_boss`.`entreprise` (`user_id`, `nom`, `tel`, `adresse`, `logo`, `description`, `salarie`, `site_web`, `date_creation`, `mail`, `password`) VALUES (20, 'blizzard', '0467787665', '145 Rue Yves le Coz, 78000 Versailles', 'https://slack-imgs.com/?c=1&url=https%3A%2F%2F3.bp.blogspot.com%2F-m7Y-MhoOEpY%2FWpae3Hv5jCI%2FAAAAAAAABIc%2FQhGn8Z1XKTgEWmXzQTzSox7ZHJ_Q5BidQCLcBGAs%2Fs1600%2FEl%252Bprofesor%252BLa%252Bcasa%252Bde%252Bpapel.jpg', 'Blizzard Entertainment est une société américaine de développement et d’édition de jeux vidéo siégeant à Irvine en Californie. La société a été fondée en 1991 par Allen Adham, Michael Morhaime et Frank Pearce sous le nom de Silicon & Synapse.', 2000, 'http://blizzard.com', '2018-06-19', 'nkmouk1@gmail.com', 'entreprise');
INSERT INTO `adopt_un_boss`.`entreprise` (`user_id`, `nom`, `tel`, `adresse`, `logo`, `description`, `salarie`, `site_web`, `date_creation`, `mail`, `password`) VALUES (21, 'nintendo', '0455655443', '6 boulevard de l’Oise\nImmeuble Le Montaigne\n95031 Cergy Pontoise CEDEX', 'https://slack-imgs.com/?c=1&url=https%3A%2F%2F3.bp.blogspot.com%2F-m7Y-MhoOEpY%2FWpae3Hv5jCI%2FAAAAAAAABIc%2FQhGn8Z1XKTgEWmXzQTzSox7ZHJ_Q5BidQCLcBGAs%2Fs1600%2FEl%252Bprofesor%252BLa%252Bcasa%252Bde%252Bpapel.jpg', 'Nintendo est une entreprise multinationale japonaise fondée en 1889 par Fusajiro Yamauchi près de Kyoto au Japon. À ses débuts, la société produisait des cartes à jouer japonaises : les Hanafuda.', 554, 'http://nintendo.fr', '2018-06-19', 'nkmouk2@gmail.com', 'entreprise');
INSERT INTO `adopt_un_boss`.`entreprise` (`user_id`, `nom`, `tel`, `adresse`, `logo`, `description`, `salarie`, `site_web`, `date_creation`, `mail`, `password`) VALUES (22, 'sony', '0467223344', '92 Avenue de Wagram, 75017 Paris', 'https://slack-imgs.com/?c=1&url=https%3A%2F%2F3.bp.blogspot.com%2F-m7Y-MhoOEpY%2FWpae3Hv5jCI%2FAAAAAAAABIc%2FQhGn8Z1XKTgEWmXzQTzSox7ZHJ_Q5BidQCLcBGAs%2Fs1600%2FEl%252Bprofesor%252BLa%252Bcasa%252Bde%252Bpapel.jpg', 'Sony Corporation, est une société multinationale japonaise basée dans l\'arrondissement de Minato, à Tokyo, Japon.', 8000, 'https://www.sony.fr', '2018-06-19', 'nkmouk3@gmail.com', 'entreprise');
INSERT INTO `adopt_un_boss`.`entreprise` (`user_id`, `nom`, `tel`, `adresse`, `logo`, `description`, `salarie`, `site_web`, `date_creation`, `mail`, `password`) VALUES (23, 'activison', '0454455567', 'Fraunhoferstraße 7, 85737 Ismaning, Allemagne', 'https://slack-imgs.com/?c=1&url=https%3A%2F%2F3.bp.blogspot.com%2F-m7Y-MhoOEpY%2FWpae3Hv5jCI%2FAAAAAAAABIc%2FQhGn8Z1XKTgEWmXzQTzSox7ZHJ_Q5BidQCLcBGAs%2Fs1600%2FEl%252Bprofesor%252BLa%252Bcasa%252Bde%252Bpapel.jpg', 'Activision, Inc. est une entreprise américaine de développement et d\'édition de jeux vidéo, créée en 1979.', 5430, 'https://www.activisonblizzard.com', '2018-06-19', 'nkmouk4@gmail.com', 'entreprise');
INSERT INTO `adopt_un_boss`.`entreprise` (`user_id`, `nom`, `tel`, `adresse`, `logo`, `description`, `salarie`, `site_web`, `date_creation`, `mail`, `password`) VALUES (24, 'ea', '0455433456', '56 Rue Edgar Quinet, 34400 Lunel', 'https://slack-imgs.com/?c=1&url=https%3A%2F%2F3.bp.blogspot.com%2F-m7Y-MhoOEpY%2FWpae3Hv5jCI%2FAAAAAAAABIc%2FQhGn8Z1XKTgEWmXzQTzSox7ZHJ_Q5BidQCLcBGAs%2Fs1600%2FEl%252Bprofesor%252BLa%252Bcasa%252Bde%252Bpapel.jpg', 'EA Sports est une marque de l\'entreprise américaine Electronic Arts spécialisée dans les jeux vidéo sportifs. Il s\'agit d\'un « sous-label » qui sort des séries de jeux telles que NBA Live, FIFA, NHL, Madden NFL ou encore NASCAR.', 5000, 'https://www.ea.com', '2018-06-19', 'nkmouk5@gmail.com', 'entreprise');
INSERT INTO `adopt_un_boss`.`entreprise` (`user_id`, `nom`, `tel`, `adresse`, `logo`, `description`, `salarie`, `site_web`, `date_creation`, `mail`, `password`) VALUES (25, 'eight_tech', '0411932474', 'Le Triade 3, 215 Rue Samuel Morse, 34000 Montpellier', 'https://slack-imgs.com/?c=1&url=https%3A%2F%2F3.bp.blogspot.com%2F-m7Y-MhoOEpY%2FWpae3Hv5jCI%2FAAAAAAAABIc%2FQhGn8Z1XKTgEWmXzQTzSox7ZHJ_Q5BidQCLcBGAs%2Fs1600%2FEl%252Bprofesor%252BLa%252Bcasa%252Bde%252Bpapel.jpg', '8-TECH est une société de service en ingénierie informatique, spécialisée dans la maintenance, l’infogérance et la communication numérique. Notre vocation est de soutenir les entreprises dans la gestion de leurs parcs informatiques. Avec plus de 10 ans d’expérience dans ce domaine, nous vous apportons l’ensemble des compétences humaines et techniques pour assurer la fiabilité et le développement de votre système de gestion informatique. De plus, toutes nos offres sont orientées sur deux axes majeurs : la qualité de service et la satisfaction clientèle. C’est pourquoi l’ensemble de nos services sont sans engagement.', 30, 'https://8tech.fr', '2018-06-19', 'nkmouk6@gmail.com', 'entreprise');
INSERT INTO `adopt_un_boss`.`entreprise` (`user_id`, `nom`, `tel`, `adresse`, `logo`, `description`, `salarie`, `site_web`, `date_creation`, `mail`, `password`) VALUES (26, 'smile', '0499772010', '26 Cours Gambetta, 34000 Montpellier', 'https://slack-imgs.com/?c=1&url=https%3A%2F%2F3.bp.blogspot.com%2F-m7Y-MhoOEpY%2FWpae3Hv5jCI%2FAAAAAAAABIc%2FQhGn8Z1XKTgEWmXzQTzSox7ZHJ_Q5BidQCLcBGAs%2Fs1600%2FEl%252Bprofesor%252BLa%252Bcasa%252Bde%252Bpapel.jpg', 'Au menu de l\'open source : des bénéfices économiques, une source inépuisée d’innovations, une liberté retrouvée... Et plein d\'autres avantages qui se comptent par centaines !', 50, 'http://smile.eu', '2018-06-19', 'nkmouk7@gmail.com', 'entreprise');
INSERT INTO `adopt_un_boss`.`entreprise` (`user_id`, `nom`, `tel`, `adresse`, `logo`, `description`, `salarie`, `site_web`, `date_creation`, `mail`, `password`) VALUES (27, 'akka', '0455433445', '1095 Rue Henri Becquerel, 34000 Montpellier', 'https://slack-imgs.com/?c=1&url=https%3A%2F%2F3.bp.blogspot.com%2F-m7Y-MhoOEpY%2FWpae3Hv5jCI%2FAAAAAAAABIc%2FQhGn8Z1XKTgEWmXzQTzSox7ZHJ_Q5BidQCLcBGAs%2Fs1600%2FEl%252Bprofesor%252BLa%252Bcasa%252Bde%252Bpapel.jpg', 'Grâce à AKKA Research, notre centre de Recherche & Développement interne, nous vous aidons à développer et donner vie à votre vision du futur. En effet, nous avons les outils et les moyens de transformer votre concept en réalité.', 45, 'https://www.akka-technologies.com', '2018-06-19', 'nkmouk7@gmail.com', 'entreprise');
INSERT INTO `adopt_un_boss`.`entreprise` (`user_id`, `nom`, `tel`, `adresse`, `logo`, `description`, `salarie`, `site_web`, `date_creation`, `mail`, `password`) VALUES (28, 'cnrs', '0467613434', '1919 Route de Mende, 34000 Montpellier', 'https://slack-imgs.com/?c=1&url=https%3A%2F%2F3.bp.blogspot.com%2F-m7Y-MhoOEpY%2FWpae3Hv5jCI%2FAAAAAAAABIc%2FQhGn8Z1XKTgEWmXzQTzSox7ZHJ_Q5BidQCLcBGAs%2Fs1600%2FEl%252Bprofesor%252BLa%252Bcasa%252Bde%252Bpapel.jpg', 'Faire avancer la connaissance\nDe l\'étude de la matière et du vivant à celle des sociétés humaines, le CNRS explore l\'ensemble des champs de la science.', 150, 'http://www.cnrs.fr', '2018-06-19', 'nkmouk8@gmail.com', 'entreprise');
INSERT INTO `adopt_un_boss`.`entreprise` (`user_id`, `nom`, `tel`, `adresse`, `logo`, `description`, `salarie`, `site_web`, `date_creation`, `mail`, `password`) VALUES (29, 'noma', '0467754462', ' 41 Rue Yves Montand, 34080 Montpellier', 'https://slack-imgs.com/?c=1&url=https%3A%2F%2F3.bp.blogspot.com%2F-m7Y-MhoOEpY%2FWpae3Hv5jCI%2FAAAAAAAABIc%2FQhGn8Z1XKTgEWmXzQTzSox7ZHJ_Q5BidQCLcBGAs%2Fs1600%2FEl%252Bprofesor%252BLa%252Bcasa%252Bde%252Bpapel.jpg', 'NOMA est une agence web spécialisée dans la conception et la réalisation de votre communication, \net de votre développement sur Internet.\n\nDans un monde numérique en constante évolution, nous vous aidons à prendre des décisions éclairées qui reposent sur la compréhension de vos besoins et des objectifs de vos utilisateurs.\n\nNous accompagnons le développement de votre entreprise en proposant des solutions innovantes pour améliorer votre notoriété.\n\nCréation graphique de votre identité visuelle, conception ou refonte de votre site Internet, stratégie social média & référencement : l’agence prend en charge l’ensemble des étapes de vos projets Web.', 50, 'https://www.noma.fr', '2018-06-19', 'nkmouk10@gmail.com', 'entreprise');
INSERT INTO `adopt_un_boss`.`entreprise` (`user_id`, `nom`, `tel`, `adresse`, `logo`, `description`, `salarie`, `site_web`, `date_creation`, `mail`, `password`) VALUES (30, 'triotech', '0467825693', 'Bâtiment, Le Cathare, A, 345 Avenue de Monsieur Teste, 34070 Montpellier', 'https://slack-imgs.com/?c=1&url=https%3A%2F%2F3.bp.blogspot.com%2F-m7Y-MhoOEpY%2FWpae3Hv5jCI%2FAAAAAAAABIc%2FQhGn8Z1XKTgEWmXzQTzSox7ZHJ_Q5BidQCLcBGAs%2Fs1600%2FEl%252Bprofesor%252BLa%252Bcasa%252Bde%252Bpapel.jpg', 'Designers, développeurs, chefs de projet, conseillers clientèle, Triotech est constitué de talents aux multiples savoir-faire.', 150, 'https://www.triotech.fr', '2018-06-19', 'nkmouk11@gmail.com', 'entreprise');
INSERT INTO `adopt_un_boss`.`entreprise` (`user_id`, `nom`, `tel`, `adresse`, `logo`, `description`, `salarie`, `site_web`, `date_creation`, `mail`, `password`) VALUES (31, 'beenome', '0984502766', '86 rue Pierre et Marie Curie, Parc Kennedy, 34430 Saint-Jean-de-Védas', 'https://slack-imgs.com/?c=1&url=https%3A%2F%2F3.bp.blogspot.com%2F-m7Y-MhoOEpY%2FWpae3Hv5jCI%2FAAAAAAAABIc%2FQhGn8Z1XKTgEWmXzQTzSox7ZHJ_Q5BidQCLcBGAs%2Fs1600%2FEl%252Bprofesor%252BLa%252Bcasa%252Bde%252Bpapel.jpg', 'Implantée à Montpellier, l’agence web beenome est le partenaire privilégié de tous vos projets internet. Comme il est impossible d’être numéro 1 dans l’ensemble des métiers très spécialisés du web, nous avons décidé de nous spécialiser dans la mise en place et le suivi de votre stratégie internet, en nous appuyant sur un réseau de prestataires, les meilleurs dans leur domaine, qui donneront les meilleures chances de réussite à VOTRE projet grâce à notre expertise.', 48, 'https://www.beenome.com', '2018-06-19', 'nkmouk12@gmail.com', 'entreprise');
INSERT INTO `adopt_un_boss`.`entreprise` (`user_id`, `nom`, `tel`, `adresse`, `logo`, `description`, `salarie`, `site_web`, `date_creation`, `mail`, `password`) VALUES (32, 'safenergy', '0455433304', 'SAFENERGY, 6 AV D ASSAS 34000 MONTPELLIER', 'https://slack-imgs.com/?c=1&url=https%3A%2F%2F3.bp.blogspot.com%2F-m7Y-MhoOEpY%2FWpae3Hv5jCI%2FAAAAAAAABIc%2FQhGn8Z1XKTgEWmXzQTzSox7ZHJ_Q5BidQCLcBGAs%2Fs1600%2FEl%252Bprofesor%252BLa%252Bcasa%252Bde%252Bpapel.jpg', 'SAFENERGY, société à responsabilité limitée est active depuis 12 ans.\nÉtablie à MONTPELLIER (34000), elle est spécialisée dans le secteur d\'activité de l\'edition de logiciels applicatifs.', 10, 'https://www.safenergy-services.com', '2018-06-19', 'nkmouk13@gmail.com', 'entreprise');
INSERT INTO `adopt_un_boss`.`entreprise` (`user_id`, `nom`, `tel`, `adresse`, `logo`, `description`, `salarie`, `site_web`, `date_creation`, `mail`, `password`) VALUES (33, 'synox', '0970264012', 'Parc Eureka - Le Tucano, 836 Rue du Mas de Verchant, 34000 Montpellier', 'https://slack-imgs.com/?c=1&url=https%3A%2F%2F3.bp.blogspot.com%2F-m7Y-MhoOEpY%2FWpae3Hv5jCI%2FAAAAAAAABIc%2FQhGn8Z1XKTgEWmXzQTzSox7ZHJ_Q5BidQCLcBGAs%2Fs1600%2FEl%252Bprofesor%252BLa%252Bcasa%252Bde%252Bpapel.jpg', 'Intégrateur et fournisseur de services dans l’Internet des Objets, Synox réalise et concrétise vos projets d’objets connectés.\n\nFort d’une expertise dans le déploiement de projets IoT et d’une parfaite maîtrise des technologies existantes (cartes Sim M2M, LoRa, Sigfox), Synox gère pour vous toute la complexité technique d’un projet d’objet connecté de bout en bout pour vous permettre de vous concentrer sur votre métier.', 200, 'https://www.synox.io', '2018-06-19', 'nkmouk14@gmail.com', 'entreprise');
INSERT INTO `adopt_un_boss`.`entreprise` (`user_id`, `nom`, `tel`, `adresse`, `logo`, `description`, `salarie`, `site_web`, `date_creation`, `mail`, `password`) VALUES (34, 'matooma', '0488360740', 'Immeuble Le Liner ZAC de l’aéroport Entrée 2 SIS 2630, Avenue Georges Frêche, 34470 Pérols', 'https://slack-imgs.com/?c=1&url=https%3A%2F%2F3.bp.blogspot.com%2F-m7Y-MhoOEpY%2FWpae3Hv5jCI%2FAAAAAAAABIc%2FQhGn8Z1XKTgEWmXzQTzSox7ZHJ_Q5BidQCLcBGAs%2Fs1600%2FEl%252Bprofesor%252BLa%252Bcasa%252Bde%252Bpapel.jpg', 'Matooma est le leader français de la gestion et de la communication des objets connectés par carte SIM. Notre leitmotiv est de simplifier le métier des professionnels du M2M et de l’IoT au travers de multiples offres de connectivité et d’un outil de gestion Machine to Machine unique : le M2MManager. ', 100, 'http://www.matooma.com', '2018-06-19', 'nkmouk15@gmail.com', 'entreprise');
INSERT INTO `adopt_un_boss`.`entreprise` (`user_id`, `nom`, `tel`, `adresse`, `logo`, `description`, `salarie`, `site_web`, `date_creation`, `mail`, `password`) VALUES (35, 'viveris_techno', '0472821760', 'bâtiment 31, 2 Place Eugène Bataillon, 34090 Montpellier', 'https://slack-imgs.com/?c=1&url=https%3A%2F%2F3.bp.blogspot.com%2F-m7Y-MhoOEpY%2FWpae3Hv5jCI%2FAAAAAAAABIc%2FQhGn8Z1XKTgEWmXzQTzSox7ZHJ_Q5BidQCLcBGAs%2Fs1600%2FEl%252Bprofesor%252BLa%252Bcasa%252Bde%252Bpapel.jpg', 'Ingénierie, innovation, projets, technologies, recherche ... sans le savoir, nous profitons tous du savoir-faire de Viveris !', 60, 'https://www.viveris.fr', '2018-06-19', 'nkmouk16@gmail.com', 'entreprise');

COMMIT;


-- -----------------------------------------------------
-- Data for table `adopt_un_boss`.`offre`
-- -----------------------------------------------------
START TRANSACTION;
USE `adopt_un_boss`;
INSERT INTO `adopt_un_boss`.`offre` (`id`, `entreprise_user_id`, `intitule`, `poste`, `lieu`, `salaire`, `detail`, `date_creation`, `statut`, `edition_possible`, `visibility`) VALUES (1, 36, 'ingénieur études et developpement', 'ingénieur sa400', 'castelnau', '50000', 'vous travaillerez au sein d\'une equipe avec un chef de projets et un  designer  .CE, ticket repas,  bureau individuel', '2018-06-19', 0, NULL, NULL);
INSERT INTO `adopt_un_boss`.`offre` (`id`, `entreprise_user_id`, `intitule`, `poste`, `lieu`, `salaire`, `detail`, `date_creation`, `statut`, `edition_possible`, `visibility`) VALUES (2, 20, 'Dev Concepteur sites web', 'developpeur full stack', 'versailles / berlin', '35000', 'Vous interviendrez sur des projets de création de sites internet, au sein d’une équipe constituée d’un chef de projet, d’intégrateurs HTML, de développeurs. Mission sur un projet ponctuel d\'une durée prévu de 30 mois', '2018-06-19', 0, NULL, NULL);
INSERT INTO `adopt_un_boss`.`offre` (`id`, `entreprise_user_id`, `intitule`, `poste`, `lieu`, `salaire`, `detail`, `date_creation`, `statut`, `edition_possible`, `visibility`) VALUES (3, 27, 'Concepteur application de test ou developpeur automatisation', 'ingenieur devOp', 'Londres', '55000', 'Pour soutenir sa croissance, akka recrute pour un poste, basé à Londres nous avons des bureaux dans l\'europe entiere et vous serrez ammené a vous déplacez a l\'internationnal', '2018-06-19', 1, NULL, NULL);
INSERT INTO `adopt_un_boss`.`offre` (`id`, `entreprise_user_id`, `intitule`, `poste`, `lieu`, `salaire`, `detail`, `date_creation`, `statut`, `edition_possible`, `visibility`) VALUES (4, 33, 'developpeur(euse) backend php/mysql', 'developpeur senior', 'itinerant', '32000', 'Vous participez aux développements: conception et maintenance de nos applications, métier orienté Web. Vous êtes expert : PHP, MySQL, Laravel, jQuery.', '2018-06-19', 1, NULL, NULL);
INSERT INTO `adopt_un_boss`.`offre` (`id`, `entreprise_user_id`, `intitule`, `poste`, `lieu`, `salaire`, `detail`, `date_creation`, `statut`, `edition_possible`, `visibility`) VALUES (5, 32, 'ingenieur etudes et developpement php', 'ingenieur', 'paris', '50000', 'Vous interviendrez sur des projets de création de sites internet, au sein d’une équipe constituée d’un chef de projet, d’intégrateurs HTML, de développeurs et...\n\n\nVous interviendrez sur des projets de création de sites internet, au sein d’une équipe constituée d’un chef de projet, d’intégrateurs HTML, de développeurs etc....Postuler directement', '2018-06-19', 1, NULL, NULL);
INSERT INTO `adopt_un_boss`.`offre` (`id`, `entreprise_user_id`, `intitule`, `poste`, `lieu`, `salaire`, `detail`, `date_creation`, `statut`, `edition_possible`, `visibility`) VALUES (6, 22, 'developpeur logiciel applicatif ', 'developpeur tout niveau', 'montpellier', '30000', 'ous rêvez de smart data, de voiture autonome, de taxi volant ou du train du futur ? Chez Assystem Technologies, nous travaillons déjà sur ces projets qui reveleront tout votre potentiel', '2018-06-19', 0, NULL, NULL);
INSERT INTO `adopt_un_boss`.`offre` (`id`, `entreprise_user_id`, `intitule`, `poste`, `lieu`, `salaire`, `detail`, `date_creation`, `statut`, `edition_possible`, `visibility`) VALUES (7, 29, 'ingenieur logiciel applicatif', 'ingenieur', 'montpellier', '55000', 'ous rêvez de smart data, de voiture autonome, de taxi volant ou du train du futur ? Chez Assystem Technologies, nous travaillons déjà sur ces projets qui reveleront tout votre potentiel, Vous interviendrez sur des projets de création de sites internet, au sein d’une équipe constituée d’un chef de projet, d’intégrateurs HTML, de développeurs et...   Vous interviendrez sur des projets de création de sites internet, au sein d’une équipe constituée d’un chef de projet, d’intégrateurs HTML, de développeurs etc....Postuler directement', '2018-06-19', 1, NULL, NULL);
INSERT INTO `adopt_un_boss`.`offre` (`id`, `entreprise_user_id`, `intitule`, `poste`, `lieu`, `salaire`, `detail`, `date_creation`, `statut`, `edition_possible`, `visibility`) VALUES (8, 30, 'dessinateur ', 'designers stagiaire', 'montpellier', '8000', 'refonte de notre site WEB et gestion des réseaux sociaux * création de maquette WEB qui sera intégrée dans les réseaux et applications mobiles * ', '2018-06-19', 1, NULL, NULL);
INSERT INTO `adopt_un_boss`.`offre` (`id`, `entreprise_user_id`, `intitule`, `poste`, `lieu`, `salaire`, `detail`, `date_creation`, `statut`, `edition_possible`, `visibility`) VALUES (9, 28, 'ingenieur atomique', 'ingenieurs chef de projets', 'montpellier / paris', '80000', 'De formation scientifiques, vous etes un expert dans la recherche moleculaire, vous aurrez en charge la supervision des deux laboratoire qui travaillent conjointement sur la physique quantique appliqué. vous aurez en charges la creation d\'un super calculateur quantique capable d\'analysé les formes proto-moléculaires de l\'agronomie blablabla.. postul si tu veut etre riche..', '2018-06-19', 1, NULL, NULL);
INSERT INTO `adopt_un_boss`.`offre` (`id`, `entreprise_user_id`, `intitule`, `poste`, `lieu`, `salaire`, `detail`, `date_creation`, `statut`, `edition_possible`, `visibility`) VALUES (10, 25, 'Développeur Backend', 'dev senior ', 'montpellier', '38000', 'Nous recherchons aujourd’hui un(e) Développeur Backend, basé(e) à Montpellier. Acteur de la confiance numérique, membre de la FrenchTech et labellisée BLAblablabla', '2018-06-19', 1, NULL, NULL);
INSERT INTO `adopt_un_boss`.`offre` (`id`, `entreprise_user_id`, `intitule`, `poste`, `lieu`, `salaire`, `detail`, `date_creation`, `statut`, `edition_possible`, `visibility`) VALUES (11, 31, 'integrateur stagiaire', 'dev junior', 'montpellier', '10000', 'Vous participez aux développements: conception et maintenance de nos applications, métier orienté Web. Vous êtes expert : PHP, MySQL, Laravel, jQuery', '2018-06-19', 1, NULL, NULL);
INSERT INTO `adopt_un_boss`.`offre` (`id`, `entreprise_user_id`, `intitule`, `poste`, `lieu`, `salaire`, `detail`, `date_creation`, `statut`, `edition_possible`, `visibility`) VALUES (12, 24, 'dev full stack ', 'developpeur ', 'montpellier', '32000', 'EA renforce son équipe de développement basée sur Montpellier et recherche un développeur d’applications mobiles (H/F). Description du poste', '2018-06-19', 0, NULL, NULL);
INSERT INTO `adopt_un_boss`.`offre` (`id`, `entreprise_user_id`, `intitule`, `poste`, `lieu`, `salaire`, `detail`, `date_creation`, `statut`, `edition_possible`, `visibility`) VALUES (13, 23, 'Développeurs Web', 'junior, confirmer, senior', 'france', '40000', '35 000 € - 43 000 € par an\nNous recherchons 2 Développeurs Web. Aujourd\'hui, nous recherchons deux Développeurs expérimentés ou pas, Back-End et/ou Front-End*', '2018-06-19', 1, NULL, NULL);
INSERT INTO `adopt_un_boss`.`offre` (`id`, `entreprise_user_id`, `intitule`, `poste`, `lieu`, `salaire`, `detail`, `date_creation`, `statut`, `edition_possible`, `visibility`) VALUES (14, 21, 'ingenieur conceptuel', 'ingenieur ', 'montpellier toulouse', '50000', 'Vous interviendrez sur des projets de création de jeu multi plateformes, au sein d’une équipe constituée d’un chef de projet, d’intégrateurs HTML, de développeurs ', '2018-06-19', 1, NULL, NULL);
INSERT INTO `adopt_un_boss`.`offre` (`id`, `entreprise_user_id`, `intitule`, `poste`, `lieu`, `salaire`, `detail`, `date_creation`, `statut`, `edition_possible`, `visibility`) VALUES (15, 34, 'happy manager', 'happy manager', 'montpellier', '28000', 'vous etes de nature dynamiques et debrouillard, vous avez une premiere experience des starts-up ? rejoignez BEWEB School\'s lunel. payer a rien foutr vous pourrez vous grattez les boules en attendant que ca passe.', '2018-06-19', 1, NULL, NULL);
INSERT INTO `adopt_un_boss`.`offre` (`id`, `entreprise_user_id`, `intitule`, `poste`, `lieu`, `salaire`, `detail`, `date_creation`, `statut`, `edition_possible`, `visibility`) VALUES (16, 36, 'joueur professionnel', 'joueur professionnel', 'montpellier / monde entier', '80000', 'vous etes joueur professinnel avec une maitrise de haut niveaux, rejoignez notre groupe et prenez notre poste d\'ambassadeur, votre mission? nous representez lors de manifestations, congres concours etc. etre egalement present sur youtubes et publier regulierement des video de demo', '2018-06-19', 1, NULL, NULL);
INSERT INTO `adopt_un_boss`.`offre` (`id`, `entreprise_user_id`, `intitule`, `poste`, `lieu`, `salaire`, `detail`, `date_creation`, `statut`, `edition_possible`, `visibility`) VALUES (17, 31, 'developpeur application mobile', 'dev confirmer', 'beenome', '30000', 'recherche un développeur d’applications mobiles (H/F). Description du poste Vous rêvez de smart data, de voiture autonome, de taxi volant ou du train du futur ne venez pas chez nous, ici ont fait des vieux trucs', '2018-06-19', 1, NULL, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `adopt_un_boss`.`candidat`
-- -----------------------------------------------------
START TRANSACTION;
USE `adopt_un_boss`;
INSERT INTO `adopt_un_boss`.`candidat` (`user_id`, `nom`, `prenom`, `age`, `adresse`, `tel`, `mail`, `password`, `photo`, `date_creation`, `description`) VALUES (4, 'Piot Pilot', 'Yannis', 20, '127 rue des mouettes, la grande motte', '0754966555', 'pp@gmail.com', 'candidat', 'https://images.all-free-download.com/images/graphiclarge/harry_potter_icon_6825007.jpg', '2018-06-19', NULL);
INSERT INTO `adopt_un_boss`.`candidat` (`user_id`, `nom`, `prenom`, `age`, `adresse`, `tel`, `mail`, `password`, `photo`, `date_creation`, `description`) VALUES (5, 'Cantinelli', 'Thomas', 34, '128 rue des mouettes, la grande motte', '0755447667', 'ct@gmail.com', 'candidat', 'https://images.all-free-download.com/images/graphiclarge/harry_potter_icon_6825007.jpg', '2018-06-19', NULL);
INSERT INTO `adopt_un_boss`.`candidat` (`user_id`, `nom`, `prenom`, `age`, `adresse`, `tel`, `mail`, `password`, `photo`, `date_creation`, `description`) VALUES (6, 'Serbouty', 'Karim', 21, '129 rue des mouettes, la grande motte', '0654443445', 'sk@gmail.com', 'candidat', 'https://images.all-free-download.com/images/graphiclarge/harry_potter_icon_6825007.jpg', '2018-06-19', NULL);
INSERT INTO `adopt_un_boss`.`candidat` (`user_id`, `nom`, `prenom`, `age`, `adresse`, `tel`, `mail`, `password`, `photo`, `date_creation`, `description`) VALUES (7, 'Vidal', 'François', 26, '130 rue des mouettes, la grande motte', '0654443445', 'vf@gmail.com', 'candidat', 'https://images.all-free-download.com/images/graphiclarge/harry_potter_icon_6825007.jpg', '2018-06-19', NULL);
INSERT INTO `adopt_un_boss`.`candidat` (`user_id`, `nom`, `prenom`, `age`, `adresse`, `tel`, `mail`, `password`, `photo`, `date_creation`, `description`) VALUES (8, 'Jauze', 'Julien', 43, '131 rue des mouettes, la grande motte', '0766922344', 'jj@gmail.com', 'candidat', 'https://images.all-free-download.com/images/graphiclarge/harry_potter_icon_6825007.jpg', '2018-06-19', NULL);
INSERT INTO `adopt_un_boss`.`candidat` (`user_id`, `nom`, `prenom`, `age`, `adresse`, `tel`, `mail`, `password`, `photo`, `date_creation`, `description`) VALUES (9, 'Amchi', 'Dorian', 22, '132 rue des mouettes, la grande motte', '0755933345', 'ad@gmail.com', 'candidat', 'https://images.all-free-download.com/images/graphiclarge/harry_potter_icon_6825007.jpg', '2018-06-19', NULL);
INSERT INTO `adopt_un_boss`.`candidat` (`user_id`, `nom`, `prenom`, `age`, `adresse`, `tel`, `mail`, `password`, `photo`, `date_creation`, `description`) VALUES (10, 'Preumont', 'Erwan', 64, '133 rue des mouettes, la grande motte', '0754914356', 'pe@gmail.com', 'candidat', 'https://images.all-free-download.com/images/graphiclarge/harry_potter_icon_6825007.jpg', '2018-06-19', NULL);
INSERT INTO `adopt_un_boss`.`candidat` (`user_id`, `nom`, `prenom`, `age`, `adresse`, `tel`, `mail`, `password`, `photo`, `date_creation`, `description`) VALUES (11, 'Albert', 'Nicolas', 23, '134 rue des mouettes, la grande motte', '0777655545', 'an@gmail.com', 'candidat', 'https://images.all-free-download.com/images/graphiclarge/harry_potter_icon_6825007.jpg', '2018-06-19', NULL);
INSERT INTO `adopt_un_boss`.`candidat` (`user_id`, `nom`, `prenom`, `age`, `adresse`, `tel`, `mail`, `password`, `photo`, `date_creation`, `description`) VALUES (12, 'Bertrix', 'Julian', 54, '135 rue des mouettes, la grande motte', '0745024356', 'bj@gmail.com', 'candidat', 'https://images.all-free-download.com/images/graphiclarge/harry_potter_icon_6825007.jpg', '2018-06-19', NULL);
INSERT INTO `adopt_un_boss`.`candidat` (`user_id`, `nom`, `prenom`, `age`, `adresse`, `tel`, `mail`, `password`, `photo`, `date_creation`, `description`) VALUES (13, 'Viellard', 'Ilies', 24, '136 rue des mouettes, la grande motte', '0763344332', 'vi@gmail.com', 'candidat', 'https://images.all-free-download.com/images/graphiclarge/harry_potter_icon_6825007.jpg', '2018-06-19', NULL);
INSERT INTO `adopt_un_boss`.`candidat` (`user_id`, `nom`, `prenom`, `age`, `adresse`, `tel`, `mail`, `password`, `photo`, `date_creation`, `description`) VALUES (14, 'Planque', 'Alexandre', 33, '137 rue des mouettes, la grande motte', '0654455667', 'pa@gmail.com', 'candidat', 'https://images.all-free-download.com/images/graphiclarge/harry_potter_icon_6825007.jpg', '2018-06-19', NULL);
INSERT INTO `adopt_un_boss`.`candidat` (`user_id`, `nom`, `prenom`, `age`, `adresse`, `tel`, `mail`, `password`, `photo`, `date_creation`, `description`) VALUES (15, 'Lavery', 'Cédric', 26, '138 rue des mouettes, la grande motte', '0665556707', 'lc@gmail.com', 'candidat', 'https://images.all-free-download.com/images/graphiclarge/harry_potter_icon_6825007.jpg', '2018-06-19', NULL);
INSERT INTO `adopt_un_boss`.`candidat` (`user_id`, `nom`, `prenom`, `age`, `adresse`, `tel`, `mail`, `password`, `photo`, `date_creation`, `description`) VALUES (16, 'Halot', 'Thierry', 54, '139 rue des mouettes, la grande motte', '0634231243', 'ht@gmail.com', 'candidat', 'https://images.all-free-download.com/images/graphiclarge/harry_potter_icon_6825007.jpg', '2018-06-19', NULL);
INSERT INTO `adopt_un_boss`.`candidat` (`user_id`, `nom`, `prenom`, `age`, `adresse`, `tel`, `mail`, `password`, `photo`, `date_creation`, `description`) VALUES (17, 'Bezard-Falgas', 'Alexis', 23, '140 rue des mouettes, la grande motte', '0765646768', 'ba@gmail.com', 'candidat', 'https://images.all-free-download.com/images/graphiclarge/harry_potter_icon_6825007.jpg', '2018-06-19', NULL);
INSERT INTO `adopt_un_boss`.`candidat` (`user_id`, `nom`, `prenom`, `age`, `adresse`, `tel`, `mail`, `password`, `photo`, `date_creation`, `description`) VALUES (18, 'emery', 'alain', 44, '141 rue des mouettes, la grande motte', '0769977695', 'ea@gmail.com', 'candidat', 'https://images.all-free-download.com/images/graphiclarge/harry_potter_icon_6825007.jpg', '2018-06-19', NULL);
INSERT INTO `adopt_un_boss`.`candidat` (`user_id`, `nom`, `prenom`, `age`, `adresse`, `tel`, `mail`, `password`, `photo`, `date_creation`, `description`) VALUES (19, 'loic', 'derieux', 69, '69 rue de la pipe au jambon, moncul', '0654445665', 'ld@gmail.com', 'candidat', 'https://images.all-free-download.com/images/graphiclarge/harry_potter_icon_6825007.jpg', '2018-06-19', NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `adopt_un_boss`.`chat`
-- -----------------------------------------------------
START TRANSACTION;
USE `adopt_un_boss`;
INSERT INTO `adopt_un_boss`.`chat` (`id`, `recepteur_id`, `emetteur_id`, `contenu`, `date_creation`) VALUES (1, 26, 4, 'Bonjour, j\'aurais une question par rapport a vote offre.', NULL);
INSERT INTO `adopt_un_boss`.`chat` (`id`, `recepteur_id`, `emetteur_id`, `contenu`, `date_creation`) VALUES (2, 4, 26, 'Je vous écoute.', NULL);
INSERT INTO `adopt_un_boss`.`chat` (`id`, `recepteur_id`, `emetteur_id`, `contenu`, `date_creation`) VALUES (3, 26, 4, 'Est-il possible de négocier le salaire ?', NULL);
INSERT INTO `adopt_un_boss`.`chat` (`id`, `recepteur_id`, `emetteur_id`, `contenu`, `date_creation`) VALUES (4, 4, 26, 'Non. Au revoir.', NULL);
INSERT INTO `adopt_un_boss`.`chat` (`id`, `recepteur_id`, `emetteur_id`, `contenu`, `date_creation`) VALUES (5, 19, 20, 'Bonjour', 1530691459);
INSERT INTO `adopt_un_boss`.`chat` (`id`, `recepteur_id`, `emetteur_id`, `contenu`, `date_creation`) VALUES (6, 19, 22, 'bonjour', 1530691500);
INSERT INTO `adopt_un_boss`.`chat` (`id`, `recepteur_id`, `emetteur_id`, `contenu`, `date_creation`) VALUES (7, 20, 19, 'tg', 1530691550);
INSERT INTO `adopt_un_boss`.`chat` (`id`, `recepteur_id`, `emetteur_id`, `contenu`, `date_creation`) VALUES (8, 19, 30, 'ok', 1530691600);
INSERT INTO `adopt_un_boss`.`chat` (`id`, `recepteur_id`, `emetteur_id`, `contenu`, `date_creation`) VALUES (9, 30, 19, 'no u', 1530691650);
INSERT INTO `adopt_un_boss`.`chat` (`id`, `recepteur_id`, `emetteur_id`, `contenu`, `date_creation`) VALUES (10, 19, 34, 'suce', 1530691700);
INSERT INTO `adopt_un_boss`.`chat` (`id`, `recepteur_id`, `emetteur_id`, `contenu`, `date_creation`) VALUES (11, 34, 19, 'la bite', 1530691750);
INSERT INTO `adopt_un_boss`.`chat` (`id`, `recepteur_id`, `emetteur_id`, `contenu`, `date_creation`) VALUES (12, 19, 22, 'répond  pd', 1530691800);
INSERT INTO `adopt_un_boss`.`chat` (`id`, `recepteur_id`, `emetteur_id`, `contenu`, `date_creation`) VALUES (13, 19, 22, 'répond  pd', 1530691800);
INSERT INTO `adopt_un_boss`.`chat` (`id`, `recepteur_id`, `emetteur_id`, `contenu`, `date_creation`) VALUES (14, 19, 20, 'qsd', 1530691820);
INSERT INTO `adopt_un_boss`.`chat` (`id`, `recepteur_id`, `emetteur_id`, `contenu`, `date_creation`) VALUES (15, 19, 20, 'qsd', 1530691825);
INSERT INTO `adopt_un_boss`.`chat` (`id`, `recepteur_id`, `emetteur_id`, `contenu`, `date_creation`) VALUES (16, 19, 20, 'qsd', 1530691830);
INSERT INTO `adopt_un_boss`.`chat` (`id`, `recepteur_id`, `emetteur_id`, `contenu`, `date_creation`) VALUES (17, 19, 24, 'qsdqsd', 1530691835);
INSERT INTO `adopt_un_boss`.`chat` (`id`, `recepteur_id`, `emetteur_id`, `contenu`, `date_creation`) VALUES (18, 19, 34, 'qsd', 1530691840);
INSERT INTO `adopt_un_boss`.`chat` (`id`, `recepteur_id`, `emetteur_id`, `contenu`, `date_creation`) VALUES (19, 19, 34, 'message1', 1530691855);
INSERT INTO `adopt_un_boss`.`chat` (`id`, `recepteur_id`, `emetteur_id`, `contenu`, `date_creation`) VALUES (20, 19, 30, 'message2', 1530691860);
INSERT INTO `adopt_un_boss`.`chat` (`id`, `recepteur_id`, `emetteur_id`, `contenu`, `date_creation`) VALUES (21, 19, 20, 'message3', 1530691865);
INSERT INTO `adopt_un_boss`.`chat` (`id`, `recepteur_id`, `emetteur_id`, `contenu`, `date_creation`) VALUES (22, 19, 22, 'message4', 1530691870);
INSERT INTO `adopt_un_boss`.`chat` (`id`, `recepteur_id`, `emetteur_id`, `contenu`, `date_creation`) VALUES (23, 19, 34, 'message5', 1530691875);
INSERT INTO `adopt_un_boss`.`chat` (`id`, `recepteur_id`, `emetteur_id`, `contenu`, `date_creation`) VALUES (24, 19, 30, 'message6', 1530691880);
INSERT INTO `adopt_un_boss`.`chat` (`id`, `recepteur_id`, `emetteur_id`, `contenu`, `date_creation`) VALUES (25, 19, 24, 'message7', 1530691885);
INSERT INTO `adopt_un_boss`.`chat` (`id`, `recepteur_id`, `emetteur_id`, `contenu`, `date_creation`) VALUES (26, 19, 30, 'message8', 1530691890);
INSERT INTO `adopt_un_boss`.`chat` (`id`, `recepteur_id`, `emetteur_id`, `contenu`, `date_creation`) VALUES (27, 19, 34, 'message9', 1530691895);

COMMIT;


-- -----------------------------------------------------
-- Data for table `adopt_un_boss`.`admin`
-- -----------------------------------------------------
START TRANSACTION;
USE `adopt_un_boss`;
INSERT INTO `adopt_un_boss`.`admin` (`user_id`, `pseudo`, `password`) VALUES (1, 'admin1', 'admin1');
INSERT INTO `adopt_un_boss`.`admin` (`user_id`, `pseudo`, `password`) VALUES (2, 'admin2', 'admin2');
INSERT INTO `adopt_un_boss`.`admin` (`user_id`, `pseudo`, `password`) VALUES (3, 'admin3', 'admin3');

COMMIT;


-- -----------------------------------------------------
-- Data for table `adopt_un_boss`.`actualite`
-- -----------------------------------------------------
START TRANSACTION;
USE `adopt_un_boss`;
INSERT INTO `adopt_un_boss`.`actualite` (`id`, `titre`, `texte`, `statut`, `date_creation`) VALUES (1, 'Ouverture du site !', 'Le site est en ligne, adieu le chomage !', 1, '2018-06-19');
INSERT INTO `adopt_un_boss`.`actualite` (`id`, `titre`, `texte`, `statut`, `date_creation`) VALUES (2, 'Conditions de travail déplorable chez IBM', 'Attention, n\'allez pas chez eux, ça sent pas bon  et les mauvais employés sont fouettés', 1, '2018-06-19');
INSERT INTO `adopt_un_boss`.`actualite` (`id`, `titre`, `texte`, `statut`, `date_creation`) VALUES (3, 'Meet-up Microsoft.', 'La grand firme américain débarque enfin près de chez vous avec une soirée de feu de dieu de derrière les faggos qui va casser trois pates à un canard.', 0, '2018-06-19');

COMMIT;


-- -----------------------------------------------------
-- Data for table `adopt_un_boss`.`event`
-- -----------------------------------------------------
START TRANSACTION;
USE `adopt_un_boss`;
INSERT INTO `adopt_un_boss`.`event` (`id`, `titre`, `description`, `image`, `lieu`, `date`, `heure`, `statut`, `date_creation`, `entreprise_user_id`, `visibility`) VALUES (1, 'Meet-Up triste.', 'Rencontre de développeur dans une ambiance maussade.', 'http://images.midilibre.fr/images/2014/01/08/le-cimetiere-protestant-le-plus-ancien-de-la-ville-a-ete_774919_667x333.jpg?v=1', '3 Avenue de Palavas, 34070 Montpellier', '2018-07-22', '14:30', 1, '2018-06-19', 36, NULL);
INSERT INTO `adopt_un_boss`.`event` (`id`, `titre`, `description`, `image`, `lieu`, `date`, `heure`, `statut`, `date_creation`, `entreprise_user_id`, `visibility`) VALUES (2, 'Meet-Up joyeux.', 'Rencontre de développeur dans une ambiance joviale.', 'https://www.google.fr/url?sa=i&rct=j&q=&esrc=s&source=images&cd=&cad=rja&uact=8&ved=2ahUKEwi9zqfo1d_bAhUEbhQKHadvBzMQjRx6BAgBEAQ&url=https%3A%2F%2Fodysseum.klepierre.fr%2FShopping%2FBaraka-Jeux&psig=AOvVaw12cDHvIBUc_7fcqkk2dPaB&ust=1529495741840641', 'Allée Ulysse, 34000 Montpellier', '2018-08-12', '17:00', 1, '2018-06-19', 20, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `adopt_un_boss`.`candidat_has_techno`
-- -----------------------------------------------------
START TRANSACTION;
USE `adopt_un_boss`;
INSERT INTO `adopt_un_boss`.`candidat_has_techno` (`candidat_user_id`, `techno_id`) VALUES (4, 1);
INSERT INTO `adopt_un_boss`.`candidat_has_techno` (`candidat_user_id`, `techno_id`) VALUES (4, 2);
INSERT INTO `adopt_un_boss`.`candidat_has_techno` (`candidat_user_id`, `techno_id`) VALUES (4, 13);
INSERT INTO `adopt_un_boss`.`candidat_has_techno` (`candidat_user_id`, `techno_id`) VALUES (5, 3);
INSERT INTO `adopt_un_boss`.`candidat_has_techno` (`candidat_user_id`, `techno_id`) VALUES (5, 5);
INSERT INTO `adopt_un_boss`.`candidat_has_techno` (`candidat_user_id`, `techno_id`) VALUES (5, 14);
INSERT INTO `adopt_un_boss`.`candidat_has_techno` (`candidat_user_id`, `techno_id`) VALUES (6, 4);
INSERT INTO `adopt_un_boss`.`candidat_has_techno` (`candidat_user_id`, `techno_id`) VALUES (6, 7);
INSERT INTO `adopt_un_boss`.`candidat_has_techno` (`candidat_user_id`, `techno_id`) VALUES (6, 15);
INSERT INTO `adopt_un_boss`.`candidat_has_techno` (`candidat_user_id`, `techno_id`) VALUES (7, 6);
INSERT INTO `adopt_un_boss`.`candidat_has_techno` (`candidat_user_id`, `techno_id`) VALUES (7, 2);
INSERT INTO `adopt_un_boss`.`candidat_has_techno` (`candidat_user_id`, `techno_id`) VALUES (7, 16);
INSERT INTO `adopt_un_boss`.`candidat_has_techno` (`candidat_user_id`, `techno_id`) VALUES (8, 8);
INSERT INTO `adopt_un_boss`.`candidat_has_techno` (`candidat_user_id`, `techno_id`) VALUES (8, 5);
INSERT INTO `adopt_un_boss`.`candidat_has_techno` (`candidat_user_id`, `techno_id`) VALUES (8, 17);
INSERT INTO `adopt_un_boss`.`candidat_has_techno` (`candidat_user_id`, `techno_id`) VALUES (9, 9);
INSERT INTO `adopt_un_boss`.`candidat_has_techno` (`candidat_user_id`, `techno_id`) VALUES (9, 7);
INSERT INTO `adopt_un_boss`.`candidat_has_techno` (`candidat_user_id`, `techno_id`) VALUES (9, 18);
INSERT INTO `adopt_un_boss`.`candidat_has_techno` (`candidat_user_id`, `techno_id`) VALUES (10, 11);
INSERT INTO `adopt_un_boss`.`candidat_has_techno` (`candidat_user_id`, `techno_id`) VALUES (10, 7);
INSERT INTO `adopt_un_boss`.`candidat_has_techno` (`candidat_user_id`, `techno_id`) VALUES (10, 19);
INSERT INTO `adopt_un_boss`.`candidat_has_techno` (`candidat_user_id`, `techno_id`) VALUES (11, 12);
INSERT INTO `adopt_un_boss`.`candidat_has_techno` (`candidat_user_id`, `techno_id`) VALUES (11, 2);
INSERT INTO `adopt_un_boss`.`candidat_has_techno` (`candidat_user_id`, `techno_id`) VALUES (11, 20);
INSERT INTO `adopt_un_boss`.`candidat_has_techno` (`candidat_user_id`, `techno_id`) VALUES (12, 1);
INSERT INTO `adopt_un_boss`.`candidat_has_techno` (`candidat_user_id`, `techno_id`) VALUES (12, 2);
INSERT INTO `adopt_un_boss`.`candidat_has_techno` (`candidat_user_id`, `techno_id`) VALUES (12, 13);
INSERT INTO `adopt_un_boss`.`candidat_has_techno` (`candidat_user_id`, `techno_id`) VALUES (13, 3);
INSERT INTO `adopt_un_boss`.`candidat_has_techno` (`candidat_user_id`, `techno_id`) VALUES (13, 5);
INSERT INTO `adopt_un_boss`.`candidat_has_techno` (`candidat_user_id`, `techno_id`) VALUES (13, 14);
INSERT INTO `adopt_un_boss`.`candidat_has_techno` (`candidat_user_id`, `techno_id`) VALUES (14, 4);
INSERT INTO `adopt_un_boss`.`candidat_has_techno` (`candidat_user_id`, `techno_id`) VALUES (14, 7);
INSERT INTO `adopt_un_boss`.`candidat_has_techno` (`candidat_user_id`, `techno_id`) VALUES (14, 15);
INSERT INTO `adopt_un_boss`.`candidat_has_techno` (`candidat_user_id`, `techno_id`) VALUES (15, 6);
INSERT INTO `adopt_un_boss`.`candidat_has_techno` (`candidat_user_id`, `techno_id`) VALUES (15, 2);
INSERT INTO `adopt_un_boss`.`candidat_has_techno` (`candidat_user_id`, `techno_id`) VALUES (15, 16);
INSERT INTO `adopt_un_boss`.`candidat_has_techno` (`candidat_user_id`, `techno_id`) VALUES (16, 11);
INSERT INTO `adopt_un_boss`.`candidat_has_techno` (`candidat_user_id`, `techno_id`) VALUES (16, 2);
INSERT INTO `adopt_un_boss`.`candidat_has_techno` (`candidat_user_id`, `techno_id`) VALUES (16, 13);

COMMIT;


-- -----------------------------------------------------
-- Data for table `adopt_un_boss`.`offre_has_techno`
-- -----------------------------------------------------
START TRANSACTION;
USE `adopt_un_boss`;
INSERT INTO `adopt_un_boss`.`offre_has_techno` (`techno_id`, `offre_id`) VALUES (1, 1);
INSERT INTO `adopt_un_boss`.`offre_has_techno` (`techno_id`, `offre_id`) VALUES (3, 1);
INSERT INTO `adopt_un_boss`.`offre_has_techno` (`techno_id`, `offre_id`) VALUES (4, 1);
INSERT INTO `adopt_un_boss`.`offre_has_techno` (`techno_id`, `offre_id`) VALUES (6, 1);
INSERT INTO `adopt_un_boss`.`offre_has_techno` (`techno_id`, `offre_id`) VALUES (8, 2);
INSERT INTO `adopt_un_boss`.`offre_has_techno` (`techno_id`, `offre_id`) VALUES (9, 2);
INSERT INTO `adopt_un_boss`.`offre_has_techno` (`techno_id`, `offre_id`) VALUES (11, 2);
INSERT INTO `adopt_un_boss`.`offre_has_techno` (`techno_id`, `offre_id`) VALUES (12, 2);
INSERT INTO `adopt_un_boss`.`offre_has_techno` (`techno_id`, `offre_id`) VALUES (1, 3);
INSERT INTO `adopt_un_boss`.`offre_has_techno` (`techno_id`, `offre_id`) VALUES (3, 3);
INSERT INTO `adopt_un_boss`.`offre_has_techno` (`techno_id`, `offre_id`) VALUES (4, 3);
INSERT INTO `adopt_un_boss`.`offre_has_techno` (`techno_id`, `offre_id`) VALUES (13, 3);
INSERT INTO `adopt_un_boss`.`offre_has_techno` (`techno_id`, `offre_id`) VALUES (14, 3);
INSERT INTO `adopt_un_boss`.`offre_has_techno` (`techno_id`, `offre_id`) VALUES (15, 3);
INSERT INTO `adopt_un_boss`.`offre_has_techno` (`techno_id`, `offre_id`) VALUES (9, 4);
INSERT INTO `adopt_un_boss`.`offre_has_techno` (`techno_id`, `offre_id`) VALUES (11, 4);
INSERT INTO `adopt_un_boss`.`offre_has_techno` (`techno_id`, `offre_id`) VALUES (12, 4);
INSERT INTO `adopt_un_boss`.`offre_has_techno` (`techno_id`, `offre_id`) VALUES (16, 4);
INSERT INTO `adopt_un_boss`.`offre_has_techno` (`techno_id`, `offre_id`) VALUES (17, 4);
INSERT INTO `adopt_un_boss`.`offre_has_techno` (`techno_id`, `offre_id`) VALUES (18, 4);
INSERT INTO `adopt_un_boss`.`offre_has_techno` (`techno_id`, `offre_id`) VALUES (2, 5);
INSERT INTO `adopt_un_boss`.`offre_has_techno` (`techno_id`, `offre_id`) VALUES (5, 5);
INSERT INTO `adopt_un_boss`.`offre_has_techno` (`techno_id`, `offre_id`) VALUES (16, 5);
INSERT INTO `adopt_un_boss`.`offre_has_techno` (`techno_id`, `offre_id`) VALUES (2, 6);
INSERT INTO `adopt_un_boss`.`offre_has_techno` (`techno_id`, `offre_id`) VALUES (7, 6);
INSERT INTO `adopt_un_boss`.`offre_has_techno` (`techno_id`, `offre_id`) VALUES (20, 6);
INSERT INTO `adopt_un_boss`.`offre_has_techno` (`techno_id`, `offre_id`) VALUES (6, 7);
INSERT INTO `adopt_un_boss`.`offre_has_techno` (`techno_id`, `offre_id`) VALUES (8, 7);
INSERT INTO `adopt_un_boss`.`offre_has_techno` (`techno_id`, `offre_id`) VALUES (20, 7);
INSERT INTO `adopt_un_boss`.`offre_has_techno` (`techno_id`, `offre_id`) VALUES (4, 8);
INSERT INTO `adopt_un_boss`.`offre_has_techno` (`techno_id`, `offre_id`) VALUES (9, 8);
INSERT INTO `adopt_un_boss`.`offre_has_techno` (`techno_id`, `offre_id`) VALUES (17, 8);
INSERT INTO `adopt_un_boss`.`offre_has_techno` (`techno_id`, `offre_id`) VALUES (3, 9);
INSERT INTO `adopt_un_boss`.`offre_has_techno` (`techno_id`, `offre_id`) VALUES (12, 9);
INSERT INTO `adopt_un_boss`.`offre_has_techno` (`techno_id`, `offre_id`) VALUES (13, 9);
INSERT INTO `adopt_un_boss`.`offre_has_techno` (`techno_id`, `offre_id`) VALUES (1, 10);
INSERT INTO `adopt_un_boss`.`offre_has_techno` (`techno_id`, `offre_id`) VALUES (2, 10);
INSERT INTO `adopt_un_boss`.`offre_has_techno` (`techno_id`, `offre_id`) VALUES (13, 10);
INSERT INTO `adopt_un_boss`.`offre_has_techno` (`techno_id`, `offre_id`) VALUES (3, 11);
INSERT INTO `adopt_un_boss`.`offre_has_techno` (`techno_id`, `offre_id`) VALUES (5, 11);
INSERT INTO `adopt_un_boss`.`offre_has_techno` (`techno_id`, `offre_id`) VALUES (14, 11);
INSERT INTO `adopt_un_boss`.`offre_has_techno` (`techno_id`, `offre_id`) VALUES (4, 12);
INSERT INTO `adopt_un_boss`.`offre_has_techno` (`techno_id`, `offre_id`) VALUES (7, 12);
INSERT INTO `adopt_un_boss`.`offre_has_techno` (`techno_id`, `offre_id`) VALUES (17, 13);
INSERT INTO `adopt_un_boss`.`offre_has_techno` (`techno_id`, `offre_id`) VALUES (6, 13);
INSERT INTO `adopt_un_boss`.`offre_has_techno` (`techno_id`, `offre_id`) VALUES (8, 13);
INSERT INTO `adopt_un_boss`.`offre_has_techno` (`techno_id`, `offre_id`) VALUES (8, 14);
INSERT INTO `adopt_un_boss`.`offre_has_techno` (`techno_id`, `offre_id`) VALUES (7, 14);
INSERT INTO `adopt_un_boss`.`offre_has_techno` (`techno_id`, `offre_id`) VALUES (14, 14);
INSERT INTO `adopt_un_boss`.`offre_has_techno` (`techno_id`, `offre_id`) VALUES (15, 14);
INSERT INTO `adopt_un_boss`.`offre_has_techno` (`techno_id`, `offre_id`) VALUES (2, 15);
INSERT INTO `adopt_un_boss`.`offre_has_techno` (`techno_id`, `offre_id`) VALUES (5, 15);
INSERT INTO `adopt_un_boss`.`offre_has_techno` (`techno_id`, `offre_id`) VALUES (7, 15);
INSERT INTO `adopt_un_boss`.`offre_has_techno` (`techno_id`, `offre_id`) VALUES (17, 15);
INSERT INTO `adopt_un_boss`.`offre_has_techno` (`techno_id`, `offre_id`) VALUES (4, 16);
INSERT INTO `adopt_un_boss`.`offre_has_techno` (`techno_id`, `offre_id`) VALUES (6, 16);
INSERT INTO `adopt_un_boss`.`offre_has_techno` (`techno_id`, `offre_id`) VALUES (2, 16);
INSERT INTO `adopt_un_boss`.`offre_has_techno` (`techno_id`, `offre_id`) VALUES (5, 16);
INSERT INTO `adopt_un_boss`.`offre_has_techno` (`techno_id`, `offre_id`) VALUES (2, 17);
INSERT INTO `adopt_un_boss`.`offre_has_techno` (`techno_id`, `offre_id`) VALUES (13, 17);
INSERT INTO `adopt_un_boss`.`offre_has_techno` (`techno_id`, `offre_id`) VALUES (14, 17);

COMMIT;


-- -----------------------------------------------------
-- Data for table `adopt_un_boss`.`secteur_d_activite`
-- -----------------------------------------------------
START TRANSACTION;
USE `adopt_un_boss`;
INSERT INTO `adopt_un_boss`.`secteur_d_activite` (`id`, `nom`) VALUES (1, 'jeux_video');
INSERT INTO `adopt_un_boss`.`secteur_d_activite` (`id`, `nom`) VALUES (2, 'developpement_web');
INSERT INTO `adopt_un_boss`.`secteur_d_activite` (`id`, `nom`) VALUES (3, 'developpement_logiciel');
INSERT INTO `adopt_un_boss`.`secteur_d_activite` (`id`, `nom`) VALUES (4, 'iot');

COMMIT;


-- -----------------------------------------------------
-- Data for table `adopt_un_boss`.`entreprise_has_secteur_d_activite`
-- -----------------------------------------------------
START TRANSACTION;
USE `adopt_un_boss`;
INSERT INTO `adopt_un_boss`.`entreprise_has_secteur_d_activite` (`entreprise_user_id`, `secteur_d_activite_id`) VALUES (23, 1);
INSERT INTO `adopt_un_boss`.`entreprise_has_secteur_d_activite` (`entreprise_user_id`, `secteur_d_activite_id`) VALUES (22, 1);
INSERT INTO `adopt_un_boss`.`entreprise_has_secteur_d_activite` (`entreprise_user_id`, `secteur_d_activite_id`) VALUES (36, 1);
INSERT INTO `adopt_un_boss`.`entreprise_has_secteur_d_activite` (`entreprise_user_id`, `secteur_d_activite_id`) VALUES (24, 1);
INSERT INTO `adopt_un_boss`.`entreprise_has_secteur_d_activite` (`entreprise_user_id`, `secteur_d_activite_id`) VALUES (20, 1);
INSERT INTO `adopt_un_boss`.`entreprise_has_secteur_d_activite` (`entreprise_user_id`, `secteur_d_activite_id`) VALUES (21, 1);
INSERT INTO `adopt_un_boss`.`entreprise_has_secteur_d_activite` (`entreprise_user_id`, `secteur_d_activite_id`) VALUES (25, 3);
INSERT INTO `adopt_un_boss`.`entreprise_has_secteur_d_activite` (`entreprise_user_id`, `secteur_d_activite_id`) VALUES (26, 3);
INSERT INTO `adopt_un_boss`.`entreprise_has_secteur_d_activite` (`entreprise_user_id`, `secteur_d_activite_id`) VALUES (27, 3);
INSERT INTO `adopt_un_boss`.`entreprise_has_secteur_d_activite` (`entreprise_user_id`, `secteur_d_activite_id`) VALUES (28, 3);
INSERT INTO `adopt_un_boss`.`entreprise_has_secteur_d_activite` (`entreprise_user_id`, `secteur_d_activite_id`) VALUES (29, 2);
INSERT INTO `adopt_un_boss`.`entreprise_has_secteur_d_activite` (`entreprise_user_id`, `secteur_d_activite_id`) VALUES (30, 2);
INSERT INTO `adopt_un_boss`.`entreprise_has_secteur_d_activite` (`entreprise_user_id`, `secteur_d_activite_id`) VALUES (31, 2);
INSERT INTO `adopt_un_boss`.`entreprise_has_secteur_d_activite` (`entreprise_user_id`, `secteur_d_activite_id`) VALUES (32, 2);
INSERT INTO `adopt_un_boss`.`entreprise_has_secteur_d_activite` (`entreprise_user_id`, `secteur_d_activite_id`) VALUES (33, 4);
INSERT INTO `adopt_un_boss`.`entreprise_has_secteur_d_activite` (`entreprise_user_id`, `secteur_d_activite_id`) VALUES (34, 4);
INSERT INTO `adopt_un_boss`.`entreprise_has_secteur_d_activite` (`entreprise_user_id`, `secteur_d_activite_id`) VALUES (35, 4);

COMMIT;


-- -----------------------------------------------------
-- Data for table `adopt_un_boss`.`type_de_contrat`
-- -----------------------------------------------------
START TRANSACTION;
USE `adopt_un_boss`;
INSERT INTO `adopt_un_boss`.`type_de_contrat` (`id`, `type_de_contrat`) VALUES (1, 'cdi');
INSERT INTO `adopt_un_boss`.`type_de_contrat` (`id`, `type_de_contrat`) VALUES (2, 'cdd');
INSERT INTO `adopt_un_boss`.`type_de_contrat` (`id`, `type_de_contrat`) VALUES (3, 'temps_partiel');
INSERT INTO `adopt_un_boss`.`type_de_contrat` (`id`, `type_de_contrat`) VALUES (4, 'temps_plein');
INSERT INTO `adopt_un_boss`.`type_de_contrat` (`id`, `type_de_contrat`) VALUES (5, 'alternance');
INSERT INTO `adopt_un_boss`.`type_de_contrat` (`id`, `type_de_contrat`) VALUES (6, 'stage');

COMMIT;


-- -----------------------------------------------------
-- Data for table `adopt_un_boss`.`offre_has_type_de_contrat`
-- -----------------------------------------------------
START TRANSACTION;
USE `adopt_un_boss`;
INSERT INTO `adopt_un_boss`.`offre_has_type_de_contrat` (`type_de_contrat_id`, `offre_id`) VALUES (1, 1);
INSERT INTO `adopt_un_boss`.`offre_has_type_de_contrat` (`type_de_contrat_id`, `offre_id`) VALUES (3, 1);
INSERT INTO `adopt_un_boss`.`offre_has_type_de_contrat` (`type_de_contrat_id`, `offre_id`) VALUES (4, 1);
INSERT INTO `adopt_un_boss`.`offre_has_type_de_contrat` (`type_de_contrat_id`, `offre_id`) VALUES (2, 2);
INSERT INTO `adopt_un_boss`.`offre_has_type_de_contrat` (`type_de_contrat_id`, `offre_id`) VALUES (3, 2);
INSERT INTO `adopt_un_boss`.`offre_has_type_de_contrat` (`type_de_contrat_id`, `offre_id`) VALUES (4, 2);
INSERT INTO `adopt_un_boss`.`offre_has_type_de_contrat` (`type_de_contrat_id`, `offre_id`) VALUES (5, 3);
INSERT INTO `adopt_un_boss`.`offre_has_type_de_contrat` (`type_de_contrat_id`, `offre_id`) VALUES (4, 3);
INSERT INTO `adopt_un_boss`.`offre_has_type_de_contrat` (`type_de_contrat_id`, `offre_id`) VALUES (6, 4);
INSERT INTO `adopt_un_boss`.`offre_has_type_de_contrat` (`type_de_contrat_id`, `offre_id`) VALUES (1, 5);
INSERT INTO `adopt_un_boss`.`offre_has_type_de_contrat` (`type_de_contrat_id`, `offre_id`) VALUES (3, 5);
INSERT INTO `adopt_un_boss`.`offre_has_type_de_contrat` (`type_de_contrat_id`, `offre_id`) VALUES (4, 5);
INSERT INTO `adopt_un_boss`.`offre_has_type_de_contrat` (`type_de_contrat_id`, `offre_id`) VALUES (2, 6);
INSERT INTO `adopt_un_boss`.`offre_has_type_de_contrat` (`type_de_contrat_id`, `offre_id`) VALUES (3, 6);
INSERT INTO `adopt_un_boss`.`offre_has_type_de_contrat` (`type_de_contrat_id`, `offre_id`) VALUES (4, 6);
INSERT INTO `adopt_un_boss`.`offre_has_type_de_contrat` (`type_de_contrat_id`, `offre_id`) VALUES (5, 7);
INSERT INTO `adopt_un_boss`.`offre_has_type_de_contrat` (`type_de_contrat_id`, `offre_id`) VALUES (4, 7);
INSERT INTO `adopt_un_boss`.`offre_has_type_de_contrat` (`type_de_contrat_id`, `offre_id`) VALUES (1, 8);
INSERT INTO `adopt_un_boss`.`offre_has_type_de_contrat` (`type_de_contrat_id`, `offre_id`) VALUES (3, 8);
INSERT INTO `adopt_un_boss`.`offre_has_type_de_contrat` (`type_de_contrat_id`, `offre_id`) VALUES (4, 8);
INSERT INTO `adopt_un_boss`.`offre_has_type_de_contrat` (`type_de_contrat_id`, `offre_id`) VALUES (2, 9);
INSERT INTO `adopt_un_boss`.`offre_has_type_de_contrat` (`type_de_contrat_id`, `offre_id`) VALUES (3, 9);
INSERT INTO `adopt_un_boss`.`offre_has_type_de_contrat` (`type_de_contrat_id`, `offre_id`) VALUES (4, 9);
INSERT INTO `adopt_un_boss`.`offre_has_type_de_contrat` (`type_de_contrat_id`, `offre_id`) VALUES (1, 10);
INSERT INTO `adopt_un_boss`.`offre_has_type_de_contrat` (`type_de_contrat_id`, `offre_id`) VALUES (3, 10);
INSERT INTO `adopt_un_boss`.`offre_has_type_de_contrat` (`type_de_contrat_id`, `offre_id`) VALUES (4, 10);
INSERT INTO `adopt_un_boss`.`offre_has_type_de_contrat` (`type_de_contrat_id`, `offre_id`) VALUES (2, 11);
INSERT INTO `adopt_un_boss`.`offre_has_type_de_contrat` (`type_de_contrat_id`, `offre_id`) VALUES (3, 11);
INSERT INTO `adopt_un_boss`.`offre_has_type_de_contrat` (`type_de_contrat_id`, `offre_id`) VALUES (4, 11);
INSERT INTO `adopt_un_boss`.`offre_has_type_de_contrat` (`type_de_contrat_id`, `offre_id`) VALUES (5, 12);
INSERT INTO `adopt_un_boss`.`offre_has_type_de_contrat` (`type_de_contrat_id`, `offre_id`) VALUES (4, 12);
INSERT INTO `adopt_un_boss`.`offre_has_type_de_contrat` (`type_de_contrat_id`, `offre_id`) VALUES (6, 13);
INSERT INTO `adopt_un_boss`.`offre_has_type_de_contrat` (`type_de_contrat_id`, `offre_id`) VALUES (1, 14);
INSERT INTO `adopt_un_boss`.`offre_has_type_de_contrat` (`type_de_contrat_id`, `offre_id`) VALUES (3, 14);
INSERT INTO `adopt_un_boss`.`offre_has_type_de_contrat` (`type_de_contrat_id`, `offre_id`) VALUES (4, 14);
INSERT INTO `adopt_un_boss`.`offre_has_type_de_contrat` (`type_de_contrat_id`, `offre_id`) VALUES (2, 15);
INSERT INTO `adopt_un_boss`.`offre_has_type_de_contrat` (`type_de_contrat_id`, `offre_id`) VALUES (3, 15);
INSERT INTO `adopt_un_boss`.`offre_has_type_de_contrat` (`type_de_contrat_id`, `offre_id`) VALUES (4, 15);
INSERT INTO `adopt_un_boss`.`offre_has_type_de_contrat` (`type_de_contrat_id`, `offre_id`) VALUES (5, 16);
INSERT INTO `adopt_un_boss`.`offre_has_type_de_contrat` (`type_de_contrat_id`, `offre_id`) VALUES (4, 16);
INSERT INTO `adopt_un_boss`.`offre_has_type_de_contrat` (`type_de_contrat_id`, `offre_id`) VALUES (1, 17);
INSERT INTO `adopt_un_boss`.`offre_has_type_de_contrat` (`type_de_contrat_id`, `offre_id`) VALUES (3, 17);
INSERT INTO `adopt_un_boss`.`offre_has_type_de_contrat` (`type_de_contrat_id`, `offre_id`) VALUES (4, 17);

COMMIT;


-- -----------------------------------------------------
-- Data for table `adopt_un_boss`.`candidat_liked_offre`
-- -----------------------------------------------------
START TRANSACTION;
USE `adopt_un_boss`;
INSERT INTO `adopt_un_boss`.`candidat_liked_offre` (`candidat_user_id`, `offre_id`, `answered`) VALUES (4, 1, 0);
INSERT INTO `adopt_un_boss`.`candidat_liked_offre` (`candidat_user_id`, `offre_id`, `answered`) VALUES (5, 2, 0);
INSERT INTO `adopt_un_boss`.`candidat_liked_offre` (`candidat_user_id`, `offre_id`, `answered`) VALUES (6, 3, 0);
INSERT INTO `adopt_un_boss`.`candidat_liked_offre` (`candidat_user_id`, `offre_id`, `answered`) VALUES (7, 4, 0);
INSERT INTO `adopt_un_boss`.`candidat_liked_offre` (`candidat_user_id`, `offre_id`, `answered`) VALUES (8, 5, 0);
INSERT INTO `adopt_un_boss`.`candidat_liked_offre` (`candidat_user_id`, `offre_id`, `answered`) VALUES (9, 6, 0);
INSERT INTO `adopt_un_boss`.`candidat_liked_offre` (`candidat_user_id`, `offre_id`, `answered`) VALUES (10, 7, 0);
INSERT INTO `adopt_un_boss`.`candidat_liked_offre` (`candidat_user_id`, `offre_id`, `answered`) VALUES (11, 8, 0);
INSERT INTO `adopt_un_boss`.`candidat_liked_offre` (`candidat_user_id`, `offre_id`, `answered`) VALUES (12, 9, 0);
INSERT INTO `adopt_un_boss`.`candidat_liked_offre` (`candidat_user_id`, `offre_id`, `answered`) VALUES (13, 10, 0);
INSERT INTO `adopt_un_boss`.`candidat_liked_offre` (`candidat_user_id`, `offre_id`, `answered`) VALUES (14, 11, 0);
INSERT INTO `adopt_un_boss`.`candidat_liked_offre` (`candidat_user_id`, `offre_id`, `answered`) VALUES (15, 12, 0);
INSERT INTO `adopt_un_boss`.`candidat_liked_offre` (`candidat_user_id`, `offre_id`, `answered`) VALUES (16, 13, 0);
INSERT INTO `adopt_un_boss`.`candidat_liked_offre` (`candidat_user_id`, `offre_id`, `answered`) VALUES (17, 14, 0);
INSERT INTO `adopt_un_boss`.`candidat_liked_offre` (`candidat_user_id`, `offre_id`, `answered`) VALUES (18, 15, 0);
INSERT INTO `adopt_un_boss`.`candidat_liked_offre` (`candidat_user_id`, `offre_id`, `answered`) VALUES (19, 16, 0);

COMMIT;


-- -----------------------------------------------------
-- Data for table `adopt_un_boss`.`entreprise_liked_candidat`
-- -----------------------------------------------------
START TRANSACTION;
USE `adopt_un_boss`;
INSERT INTO `adopt_un_boss`.`entreprise_liked_candidat` (`entreprise_user_id`, `candidat_user_id`, `offre_id`) VALUES (25, 12, 1);

COMMIT;


-- -----------------------------------------------------
-- Data for table `adopt_un_boss`.`matching`
-- -----------------------------------------------------
START TRANSACTION;
USE `adopt_un_boss`;
INSERT INTO `adopt_un_boss`.`matching` (`candidat_user_id`, `entreprise_user_id`, `offre_id`) VALUES (12, 26, 2);
INSERT INTO `adopt_un_boss`.`matching` (`candidat_user_id`, `entreprise_user_id`, `offre_id`) VALUES (12, 27, 12);
INSERT INTO `adopt_un_boss`.`matching` (`candidat_user_id`, `entreprise_user_id`, `offre_id`) VALUES (12, 28, 10);
INSERT INTO `adopt_un_boss`.`matching` (`candidat_user_id`, `entreprise_user_id`, `offre_id`) VALUES (14, 29, 11);
INSERT INTO `adopt_un_boss`.`matching` (`candidat_user_id`, `entreprise_user_id`, `offre_id`) VALUES (15, 30, 14);
INSERT INTO `adopt_un_boss`.`matching` (`candidat_user_id`, `entreprise_user_id`, `offre_id`) VALUES (16, 31, 15);
INSERT INTO `adopt_un_boss`.`matching` (`candidat_user_id`, `entreprise_user_id`, `offre_id`) VALUES (19, 20, 2);
INSERT INTO `adopt_un_boss`.`matching` (`candidat_user_id`, `entreprise_user_id`, `offre_id`) VALUES (19, 22, 6);
INSERT INTO `adopt_un_boss`.`matching` (`candidat_user_id`, `entreprise_user_id`, `offre_id`) VALUES (19, 30, 8);
INSERT INTO `adopt_un_boss`.`matching` (`candidat_user_id`, `entreprise_user_id`, `offre_id`) VALUES (19, 34, 15);

COMMIT;


-- -----------------------------------------------------
-- Data for table `adopt_un_boss`.`candidat_and_entreprise_chat`
-- -----------------------------------------------------
START TRANSACTION;
USE `adopt_un_boss`;
INSERT INTO `adopt_un_boss`.`candidat_and_entreprise_chat` (`candidat_user_id`, `entreprise_user_id`, `nombre_message`) VALUES (19, 20, 2);
INSERT INTO `adopt_un_boss`.`candidat_and_entreprise_chat` (`candidat_user_id`, `entreprise_user_id`, `nombre_message`) VALUES (19, 22, 2);
INSERT INTO `adopt_un_boss`.`candidat_and_entreprise_chat` (`candidat_user_id`, `entreprise_user_id`, `nombre_message`) VALUES (19, 30, 2);
INSERT INTO `adopt_un_boss`.`candidat_and_entreprise_chat` (`candidat_user_id`, `entreprise_user_id`, `nombre_message`) VALUES (19, 34, 2);

COMMIT;

