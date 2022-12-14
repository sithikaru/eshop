-- MySQL Script generated by MySQL Workbench
-- Mon Oct 10 12:27:09 2022
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema eshop
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema eshop
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `eshop` DEFAULT CHARACTER SET utf8 ;
USE `eshop` ;

-- -----------------------------------------------------
-- Table `eshop`.`brand`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eshop`.`brand` (
  `id` INT NOT NULL,
  `name` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `eshop`.`model`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eshop`.`model` (
  `id` INT NOT NULL,
  `name` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `eshop`.`brand_has_model`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eshop`.`brand_has_model` (
  `id` INT NOT NULL,
  `model_id` INT NOT NULL,
  `brand_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_brand_has_model_model1_idx` (`model_id` ASC) VISIBLE,
  INDEX `fk_brand_has_model_brand1_idx` (`brand_id` ASC) VISIBLE,
  CONSTRAINT `fk_brand_has_model_brand1`
    FOREIGN KEY (`brand_id`)
    REFERENCES `eshop`.`brand` (`id`),
  CONSTRAINT `fk_brand_has_model_model1`
    FOREIGN KEY (`model_id`)
    REFERENCES `eshop`.`model` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `eshop`.`category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eshop`.`category` (
  `id` INT NOT NULL,
  `name` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id` (`id` ASC) VISIBLE,
  INDEX `id_2` (`id` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `eshop`.`province`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eshop`.`province` (
  `id` INT NOT NULL,
  `name` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `eshop`.`district`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eshop`.`district` (
  `id` INT NOT NULL,
  `name` VARCHAR(45) NULL DEFAULT NULL,
  `province_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_district_province1_idx` (`province_id` ASC) VISIBLE,
  CONSTRAINT `fk_district_province1`
    FOREIGN KEY (`province_id`)
    REFERENCES `eshop`.`province` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `eshop`.`city`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eshop`.`city` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NULL DEFAULT NULL,
  `district_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_city_district1_idx` (`district_id` ASC) VISIBLE,
  CONSTRAINT `fk_city_district1`
    FOREIGN KEY (`district_id`)
    REFERENCES `eshop`.`district` (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `eshop`.`colour`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eshop`.`colour` (
  `id` INT NOT NULL,
  `name` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `eshop`.`condition`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eshop`.`condition` (
  `id` INT NOT NULL,
  `name` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `eshop`.`gender`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eshop`.`gender` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `gender_name` VARCHAR(10) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `eshop`.`images`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eshop`.`images` (
  `id` INT NOT NULL,
  `code` VARCHAR(100) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `eshop`.`status`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eshop`.`status` (
  `id` INT NOT NULL,
  `name` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `eshop`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eshop`.`user` (
  `email` VARCHAR(100) NOT NULL,
  `fname` VARCHAR(50) NULL DEFAULT NULL,
  `lname` VARCHAR(50) NULL DEFAULT NULL,
  `password` VARCHAR(20) NULL DEFAULT NULL,
  `mobile` VARCHAR(10) NULL DEFAULT NULL,
  `joined_date` DATETIME NULL DEFAULT NULL,
  `verification_code` VARCHAR(20) NULL DEFAULT NULL,
  `status` INT NULL DEFAULT NULL,
  `gender_id` INT NOT NULL,
  PRIMARY KEY (`email`),
  INDEX `fk_user_gender1_idx` (`gender_id` ASC) VISIBLE,
  CONSTRAINT `fk_user_gender1`
    FOREIGN KEY (`gender_id`)
    REFERENCES `eshop`.`gender` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `eshop`.`product`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eshop`.`product` (
  `id` INT NOT NULL,
  `price` DOUBLE NULL DEFAULT NULL,
  `qty` INT NULL DEFAULT NULL,
  `description` TEXT NULL DEFAULT NULL,
  `title` VARCHAR(100) NULL DEFAULT NULL,
  `category_id` INT NOT NULL,
  `colour_id` INT NOT NULL,
  `status_id` INT NOT NULL,
  `condition_id` INT NOT NULL,
  `images_id` INT NOT NULL,
  `user_email` VARCHAR(100) NOT NULL,
  `brand_has_model_id` INT NOT NULL,
  `datetime_added` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_product_category1_idx` (`category_id` ASC) VISIBLE,
  INDEX `fk_product_colour1_idx` (`colour_id` ASC) VISIBLE,
  INDEX `fk_product_status1_idx` (`status_id` ASC) VISIBLE,
  INDEX `fk_product_condition1_idx` (`condition_id` ASC) VISIBLE,
  INDEX `fk_product_images1_idx` (`images_id` ASC) VISIBLE,
  INDEX `fk_product_user1_idx` (`user_email` ASC) VISIBLE,
  INDEX `fk_product_brand_has_model1_idx` (`brand_has_model_id` ASC) VISIBLE,
  CONSTRAINT `fk_product_brand_has_model1`
    FOREIGN KEY (`brand_has_model_id`)
    REFERENCES `eshop`.`brand_has_model` (`id`),
  CONSTRAINT `fk_product_category1`
    FOREIGN KEY (`category_id`)
    REFERENCES `eshop`.`category` (`id`),
  CONSTRAINT `fk_product_colour1`
    FOREIGN KEY (`colour_id`)
    REFERENCES `eshop`.`colour` (`id`),
  CONSTRAINT `fk_product_condition1`
    FOREIGN KEY (`condition_id`)
    REFERENCES `eshop`.`condition` (`id`),
  CONSTRAINT `fk_product_images1`
    FOREIGN KEY (`images_id`)
    REFERENCES `eshop`.`images` (`id`),
  CONSTRAINT `fk_product_status1`
    FOREIGN KEY (`status_id`)
    REFERENCES `eshop`.`status` (`id`),
  CONSTRAINT `fk_product_user1`
    FOREIGN KEY (`user_email`)
    REFERENCES `eshop`.`user` (`email`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `eshop`.`profile_image`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eshop`.`profile_image` (
  `path` VARCHAR(100) NOT NULL,
  `user_email` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`path`),
  INDEX `fk_profile_image_user1_idx` (`user_email` ASC) VISIBLE,
  CONSTRAINT `fk_profile_image_user1`
    FOREIGN KEY (`user_email`)
    REFERENCES `eshop`.`user` (`email`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `eshop`.`user_has_address`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eshop`.`user_has_address` (
  `user_email` VARCHAR(100) NOT NULL,
  `city_id` INT NOT NULL,
  `id` INT NOT NULL AUTO_INCREMENT,
  `line1` TEXT NULL DEFAULT NULL,
  `line2` TEXT NULL DEFAULT NULL,
  `postal_code` VARCHAR(5) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_user_has_city_city1_idx` (`city_id` ASC) VISIBLE,
  INDEX `fk_user_has_city_user1_idx` (`user_email` ASC) VISIBLE,
  CONSTRAINT `fk_user_has_city_city1`
    FOREIGN KEY (`city_id`)
    REFERENCES `eshop`.`city` (`id`),
  CONSTRAINT `fk_user_has_city_user1`
    FOREIGN KEY (`user_email`)
    REFERENCES `eshop`.`user` (`email`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8mb3;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
