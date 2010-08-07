SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `invictushu` ;
CREATE SCHEMA IF NOT EXISTS `invictushu` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `invictushu` ;

-- -----------------------------------------------------
-- Table `invictushu`.`partners`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `invictushu`.`partners` ;

CREATE  TABLE IF NOT EXISTS `invictushu`.`partners` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NULL ,
  `logo` VARCHAR(150) NULL ,
  `url` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `idx_partners` (`name` ASC, `logo` ASC, `url` ASC) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `invictushu`.`contact`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `invictushu`.`contact` ;

CREATE  TABLE IF NOT EXISTS `invictushu`.`contact` (
  `key` INT NOT NULL ,
  `value` VARCHAR(255) NULL ,
  PRIMARY KEY (`key`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `invictushu`.`menus`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `invictushu`.`menus` ;

CREATE  TABLE IF NOT EXISTS `invictushu`.`menus` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NULL ,
  `url` VARCHAR(45) NULL ,
  `order` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `idx_menus` (`name` ASC, `url` ASC, `order` ASC) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `invictushu`.`pages`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `invictushu`.`pages` ;

CREATE  TABLE IF NOT EXISTS `invictushu`.`pages` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `title` VARCHAR(100) NULL ,
  `content` TEXT NULL ,
  `created` TIMESTAMP NULL ,
  `url` VARCHAR(100) NULL ,
  `menu_id` INT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_menu` (`menu_id` ASC) ,
  CONSTRAINT `fk_menu`
    FOREIGN KEY (`menu_id` )
    REFERENCES `invictushu`.`menus` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `invictushu`.`types`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `invictushu`.`types` ;

CREATE  TABLE IF NOT EXISTS `invictushu`.`types` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NULL ,
  `order` INT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `idx_types` (`name` ASC, `order` ASC) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `invictushu`.`games`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `invictushu`.`games` ;

CREATE  TABLE IF NOT EXISTS `invictushu`.`games` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(100) NULL ,
  `logo` VARCHAR(150) NULL ,
  `description` TEXT NULL ,
  `released` TIMESTAMP NULL ,
  `type_id` INT NULL ,
  `url` VARCHAR(100) NULL ,
  `order` INT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_type` (`type_id` ASC) ,
  INDEX `idx_games` (`name` ASC, `logo` ASC, `released` ASC, `url` ASC, `order` ASC) ,
  CONSTRAINT `fk_type`
    FOREIGN KEY (`type_id` )
    REFERENCES `invictushu`.`types` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `invictushu`.`screenshots`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `invictushu`.`screenshots` ;

CREATE  TABLE IF NOT EXISTS `invictushu`.`screenshots` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `game_id` INT NULL ,
  `path` VARCHAR(100) NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_game` (`game_id` ASC) ,
  INDEX `idx_screenshots` (`path` ASC) ,
  CONSTRAINT `fk_game`
    FOREIGN KEY (`game_id` )
    REFERENCES `invictushu`.`games` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `invictushu`.`images`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `invictushu`.`images` ;

CREATE  TABLE IF NOT EXISTS `invictushu`.`images` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `img_path` VARCHAR(100) NULL ,
  `thumb_path` VARCHAR(100) NULL ,
  `page_id` INT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_page` (`page_id` ASC) ,
  INDEX `idx_images` (`img_path` ASC) ,
  CONSTRAINT `fk_page`
    FOREIGN KEY (`page_id` )
    REFERENCES `invictushu`.`pages` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `invictushu`.`videos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `invictushu`.`videos` ;

CREATE  TABLE IF NOT EXISTS `invictushu`.`videos` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `path` VARCHAR(100) NULL ,
  `page_id` INT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_page` (`page_id` ASC) ,
  INDEX `idx_videos` (`path` ASC) ,
  CONSTRAINT `fk_page`
    FOREIGN KEY (`page_id` )
    REFERENCES `invictushu`.`pages` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `invictushu`.`news`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `invictushu`.`news` ;

CREATE  TABLE IF NOT EXISTS `invictushu`.`news` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `title` VARCHAR(45) NULL ,
  `content` TEXT NULL ,
  `url` VARCHAR(45) NULL ,
  `created` TIMESTAMP NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `idx_news` (`title` ASC, `content` ASC, `url` ASC) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `invictushu`.`table1`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `invictushu`.`table1` ;

CREATE  TABLE IF NOT EXISTS `invictushu`.`table1` (
)
ENGINE = MyISAM;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
