-- MySQL Workbench Synchronization
-- Generated: 2019-08-28 08:07
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: digio

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

ALTER TABLE `article` 
DROP FOREIGN KEY `fk_article_category1`;

ALTER TABLE `article` 
CHANGE COLUMN `category_fk_category_name` `category_fk_category_name` VARCHAR(255) NULL DEFAULT NULL ;

ALTER TABLE `leaders` 
DROP COLUMN `leader_added_by`,
ADD COLUMN `leaders_img` LONGBLOB NULL DEFAULT NULL AFTER `leaders_fk_position_name`,
CHANGE COLUMN `leaders_quote` `leaders_quote` TEXT(1000) NULL DEFAULT NULL COMMENT 'Thsi table will contains the leaders of various ministries\\n' ;

ALTER TABLE `ministries` 
ADD COLUMN `mty_name` VARCHAR(45) NOT NULL AFTER `mty_id`;

ALTER TABLE `admin` 
DROP COLUMN `admin_registered_by`;

ALTER TABLE `article` 
ADD CONSTRAINT `fk_article_category1`
  FOREIGN KEY (`category_fk_category_name`)
  REFERENCES `category` (`category_name`)
  ON DELETE CASCADE
  ON UPDATE CASCADE;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
