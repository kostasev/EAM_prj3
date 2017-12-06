-- Draft created by modifying a "MySQL Workbench Forward Engineering" sql script

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES,NO_AUTO_VALUE_ON_ZERO';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema ika_db
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema ika_db
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `ika_db` DEFAULT CHARACTER SET utf8 ;
USE `ika_db` ;

-- -----------------------------------------------------
-- Table `ika_db`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `airbnb_db`.`user` (
  `UserID` BIGINT NOT NULL AUTO_INCREMENT,
  `FirstName` VARCHAR(45) NOT NULL,
  `LastName` VARCHAR(45) NOT NULL,
  `FathersName` VARCHAR(45) NOT NULL,
  `MothersName` VARCHAR(45) NOT NULL,
  `LastName` VARCHAR(45) NOT NULL,
  `LastName` VARCHAR(45) NOT NULL,
  `Username` VARCHAR(45) NOT NULL,
  `Password` VARCHAR(512) NOT NULL,
  `EmailAddress` VARCHAR(45) NOT NULL,
  `PhoneNumber` VARCHAR(45) NOT NULL,
  `IsAdmin` TEXT NOT NULL,
  `IsClient` TEXT NOT NULL,
  `IsHost` TEXT NOT NULL,
  PRIMARY KEY (`UserID`),
  UNIQUE INDEX `username_UNIQUE` (`Username` ASC),
  UNIQUE INDEX `email_adress_UNIQUE` (`EmailAddress` ASC),
  UNIQUE INDEX `UserID_UNIQUE` (`UserID` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Add sample users
-- -----------------------------------------------------
LOCK TABLES `user` WRITE;
INSERT INTO `user` VALUES (1,'admin','pass','admin','admin','admin@email.com','6900000000',"t","f","f");
UNLOCK TABLES;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
