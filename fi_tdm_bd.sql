-- MySQL Script generated by MySQL Workbench
-- Wed Jul 31 09:42:07 2024
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema fi_tdm_bd
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema fi_tdm_bd
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `fi_tdm_bd` DEFAULT CHARACTER SET utf8 ;
USE `fi_tdm_bd` ;

-- -----------------------------------------------------
-- Table `fi_tdm_bd`.`companies`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fi_tdm_bd`.`companies` (
  `id` INT NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `fi_tdm_bd`.`shops`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fi_tdm_bd`.`shops` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(500) NOT NULL,
  `centro_operacion` VARCHAR(45) NOT NULL,
  `id_company` INT NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_shops_companies_idx` (`id_company` ASC),
  CONSTRAINT `fk_shops_companies`
    FOREIGN KEY (`id_company`)
    REFERENCES `fi_tdm_bd`.`companies` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `fi_tdm_bd`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fi_tdm_bd`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(500) NOT NULL,
  `phone` VARCHAR(45) NOT NULL,
  `date_brirthay` VARCHAR(45) NOT NULL,
  `id_shop` INT NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_users_shops1_idx` (`id_shop` ASC),
  CONSTRAINT `fk_users_shops1`
    FOREIGN KEY (`id_shop`)
    REFERENCES `fi_tdm_bd`.`shops` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
