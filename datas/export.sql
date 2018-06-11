-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema phpoomvcjuin
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema phpoomvcjuin
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `phpoomvcjuin` DEFAULT CHARACTER SET utf8 ;
USE `phpoomvcjuin` ;

-- -----------------------------------------------------
-- Table `phpoomvcjuin`.`contenu`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `phpoomvcjuin`.`contenu` (
  `idcontenu` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `titre` VARCHAR(100) NULL,
  `texte` TEXT NULL,
  `ladate` DATETIME NULL DEFAULT NOW(),
  PRIMARY KEY (`idcontenu`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `phpoomvcjuin`.`contenu`
-- -----------------------------------------------------
START TRANSACTION;
USE `phpoomvcjuin`;
INSERT INTO `phpoomvcjuin`.`contenu` (`idcontenu`, `titre`, `texte`, `ladate`) VALUES (DEFAULT, 'Premier', 'Mon premier texte', NULL);
INSERT INTO `phpoomvcjuin`.`contenu` (`idcontenu`, `titre`, `texte`, `ladate`) VALUES (DEFAULT, 'Deuxième', 'Mon deuxième texte', NULL);

COMMIT;