-- MySQL Script generated by MySQL Workbench
-- Tue Jun 20 10:43:02 2017
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema apolearn
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema apolearn
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `apolearn` DEFAULT CHARACTER SET utf8 ;
USE `apolearn` ;

-- -----------------------------------------------------
-- Table `apolearn`.`entreprise`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `apolearn`.`entreprise` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NULL,
  `adresse` VARCHAR(45) NULL,
  `code_postal` VARCHAR(45) NULL,
  `ville` VARCHAR(45) NULL,
  `telephone` VARCHAR(45) NULL,
  `siret` VARCHAR(45) NULL,
  `numero_contrat` VARCHAR(20) NULL,
  `numero_tva` VARCHAR(20) NULL,
  `email` VARCHAR(20) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `apolearn`.`centre_de_formation`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `apolearn`.`centre_de_formation` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(20) NULL,
  `adresse` VARCHAR(45) NULL,
  `code_postal` VARCHAR(8) NULL,
  `siret` VARCHAR(20) NULL,
  `telephone` VARCHAR(15) NULL,
  `secteur` VARCHAR(20) NULL,
  `utilisateur_id` INT NULL,
  `entreprise_id` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_centre_de_formation_antreprise1_idx` (`entreprise_id` ASC),
  CONSTRAINT `fk_centre_de_formation_antreprise1`
    FOREIGN KEY (`entreprise_id`)
    REFERENCES `apolearn`.`entreprise` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `apolearn`.`formation`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `apolearn`.`formation` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NULL,
  `date_debut` DATE NULL,
  `date_fin` DATE NULL,
  `lien_planning` VARCHAR(45) NULL,
  `centre_de_formation_id` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_formation_centre_de_formation1_idx` (`centre_de_formation_id` ASC),
  CONSTRAINT `fk_formation_centre_de_formation1`
    FOREIGN KEY (`centre_de_formation_id`)
    REFERENCES `apolearn`.`centre_de_formation` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `apolearn`.`paiement`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `apolearn`.`paiement` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(20) NULL,
  `numero` VARCHAR(20) NULL,
  `date_validite` DATE NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `apolearn`.`utilisateur`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `apolearn`.`utilisateur` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `civilite` VARCHAR(5) NULL,
  `nom` VARCHAR(20) NULL,
  `prenom` VARCHAR(20) NULL,
  `date_naissance` DATE NULL,
  `telephone_fixe` VARCHAR(15) NULL,
  `telephone_mobile` VARCHAR(15) NULL,
  `adresse` VARCHAR(45) NULL,
  `code_postal` VARCHAR(10) NULL,
  `ville` VARCHAR(10) NULL,
  `email` VARCHAR(20) NULL,
  `mot_de_passe` VARCHAR(8) NULL,
  `role` VARCHAR(20) NULL,
  `formation_id` INT NULL,
  `centre_de_formation_id` INT NULL,
  `entreprise_id` INT NULL,
  `paiement_id` INT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC),
  INDEX `fk_utilisateur_formation1_idx` (`formation_id` ASC),
  INDEX `fk_utilisateur_centre_de_formation1_idx` (`centre_de_formation_id` ASC),
  INDEX `fk_utilisateur_entreprise1_idx` (`entreprise_id` ASC),
  INDEX `fk_utilisateur_paiement1_idx` (`paiement_id` ASC),
  CONSTRAINT `fk_utilisateur_formation1`
    FOREIGN KEY (`formation_id`)
    REFERENCES `apolearn`.`formation` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_utilisateur_centre_de_formation1`
    FOREIGN KEY (`centre_de_formation_id`)
    REFERENCES `apolearn`.`centre_de_formation` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_utilisateur_entreprise1`
    FOREIGN KEY (`entreprise_id`)
    REFERENCES `apolearn`.`entreprise` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_utilisateur_paiement1`
    FOREIGN KEY (`paiement_id`)
    REFERENCES `apolearn`.`paiement` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `apolearn`.`evaluation`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `apolearn`.`evaluation` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `titre` VARCHAR(20) NULL,
  `date_eval` DATE NULL,
  `note` INT NULL,
  `stagiaire_id` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_eval_note_utilisateur2_idx` (`stagiaire_id` ASC),
  CONSTRAINT `fk_eval_note_utilisateur2`
    FOREIGN KEY (`stagiaire_id`)
    REFERENCES `apolearn`.`utilisateur` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `apolearn`.`chapitre`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `apolearn`.`chapitre` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `titre` VARCHAR(45) NULL,
  `ouvert` TINYINT NULL,
  `formation_id` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_chapitre_formation1_idx` (`formation_id` ASC),
  CONSTRAINT `fk_chapitre_formation1`
    FOREIGN KEY (`formation_id`)
    REFERENCES `apolearn`.`formation` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `apolearn`.`module`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `apolearn`.`module` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `titre` VARCHAR(45) NULL,
  `note` VARCHAR(45) NULL,
  `ouvert` TINYINT NOT NULL,
  `chapitre_id` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_module_chapitre_idx` (`chapitre_id` ASC),
  CONSTRAINT `fk_module_chapitre`
    FOREIGN KEY (`chapitre_id`)
    REFERENCES `apolearn`.`chapitre` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `apolearn`.`exercices`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `apolearn`.`exercices` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `titre` VARCHAR(45) NULL,
  `module_id` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_module_exo_module1_idx` (`module_id` ASC),
  CONSTRAINT `fk_module_exo_module1`
    FOREIGN KEY (`module_id`)
    REFERENCES `apolearn`.`module` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `apolearn`.`tchat`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `apolearn`.`tchat` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `message` VARCHAR(255) NULL,
  `formation_id` INT NULL,
  `utilisateur_id` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_tchat_formation1_idx` (`formation_id` ASC),
  INDEX `fk_tchat_utilisateur1_idx` (`utilisateur_id` ASC),
  CONSTRAINT `fk_tchat_formation1`
    FOREIGN KEY (`formation_id`)
    REFERENCES `apolearn`.`formation` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tchat_utilisateur1`
    FOREIGN KEY (`utilisateur_id`)
    REFERENCES `apolearn`.`utilisateur` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `apolearn`.`thread`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `apolearn`.`thread` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `sujet` VARCHAR(45) NULL,
  `titre` VARCHAR(45) NULL,
  `text` VARCHAR(255) NULL,
  `date_post` DATE NULL,
  `utilisateur_id` INT NULL,
  `centre_de_formation_id` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_messagerie_forum_centre_de_formation1_idx` (`centre_de_formation_id` ASC),
  UNIQUE INDEX `sujet_UNIQUE` (`sujet` ASC),
  INDEX `fk_thread_utilisateur1_idx` (`utilisateur_id` ASC),
  CONSTRAINT `fk_messagerie_forum_centre_de_formation1`
    FOREIGN KEY (`centre_de_formation_id`)
    REFERENCES `apolearn`.`centre_de_formation` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_thread_utilisateur1`
    FOREIGN KEY (`utilisateur_id`)
    REFERENCES `apolearn`.`utilisateur` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `apolearn`.`fiche_revision`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `apolearn`.`fiche_revision` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `lien_fiche` VARCHAR(45) NULL,
  `module_id` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_fiche_revision_module1_idx` (`module_id` ASC),
  CONSTRAINT `fk_fiche_revision_module1`
    FOREIGN KEY (`module_id`)
    REFERENCES `apolearn`.`module` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `apolearn`.`oubli`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `apolearn`.`oubli` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `token` VARCHAR(45) NULL,
  `date_expiration` DATETIME NULL,
  `utilisateur_id` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_oubli_utilisateur1_idx` (`utilisateur_id` ASC),
  UNIQUE INDEX `token_UNIQUE` (`token` ASC),
  CONSTRAINT `fk_oubli_utilisateur1`
    FOREIGN KEY (`utilisateur_id`)
    REFERENCES `apolearn`.`utilisateur` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `apolearn`.`utilisateur_has_centre_de_formation`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `apolearn`.`utilisateur_has_centre_de_formation` (
  `utilisateur_id` INT NOT NULL,
  `centre_de_formation_id` INT NOT NULL,
  PRIMARY KEY (`utilisateur_id`, `centre_de_formation_id`),
  INDEX `fk_utilisateur_has_centre_de_formation_centre_de_formation1_idx` (`centre_de_formation_id` ASC),
  INDEX `fk_utilisateur_has_centre_de_formation_utilisateur1_idx` (`utilisateur_id` ASC),
  CONSTRAINT `fk_utilisateur_has_centre_de_formation_utilisateur1`
    FOREIGN KEY (`utilisateur_id`)
    REFERENCES `apolearn`.`utilisateur` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_utilisateur_has_centre_de_formation_centre_de_formation1`
    FOREIGN KEY (`centre_de_formation_id`)
    REFERENCES `apolearn`.`centre_de_formation` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `apolearn`.`message`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `apolearn`.`message` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `sujet` VARCHAR(60) NULL,
  `date_post` DATETIME NULL,
  `text` VARCHAR(255) NULL,
  `utilisateur_id` INT NULL,
  `thread_id` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_message_thread1_idx` (`thread_id` ASC),
  INDEX `fk_message_utilisateur1_idx` (`utilisateur_id` ASC),
  CONSTRAINT `fk_message_thread1`
    FOREIGN KEY (`thread_id`)
    REFERENCES `apolearn`.`thread` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_message_utilisateur1`
    FOREIGN KEY (`utilisateur_id`)
    REFERENCES `apolearn`.`utilisateur` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `apolearn`.`tchat_prive`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `apolearn`.`tchat_prive` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `message` VARCHAR(255) NULL,
  `utilisateur_id` INT NULL,
  `formation_id` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_tchat_prive_utilisateur1_idx` (`utilisateur_id` ASC),
  INDEX `fk_tchat_prive_formation1_idx` (`formation_id` ASC),
  CONSTRAINT `fk_tchat_prive_utilisateur1`
    FOREIGN KEY (`utilisateur_id`)
    REFERENCES `apolearn`.`utilisateur` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tchat_prive_formation1`
    FOREIGN KEY (`formation_id`)
    REFERENCES `apolearn`.`formation` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
