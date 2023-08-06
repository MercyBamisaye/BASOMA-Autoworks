CREATE DATABASE IF NOT EXISTS `basoma_autoworks`;

USE `basoma_autoworks`;

CREATE TABLE IF NOT EXISTS `user`(
	`id` INT NOT NULL AUTO_INCREMENT,
	`username` VARCHAR(100) NOT NULL, /* Not more than 30 charachers */
	`email` VARCHAR(100) NOT NULL, /* Not more than 50 charachers */
	`phoneNumber` VARCHAR(50) NOT NULL, /* Not more than 11 charachers */
	`password` VARCHAR(50) NOT NULL, /* Not more than 20 charachers */
	`firstName` VARCHAR(50), /* Not more than 20 charachers */
	`lastName` VARCHAR(50), /* Not more than 20 charachers */
	`businessName` VARCHAR(100), /* Not more than 60 charachers */
	`businessEmail` VARCHAR(100), /* Not more than 60 charachers */
	`businessPhoneNumber` VARCHAR(50), /* Not more than 11 charachers */
    
    PRIMARY KEY (`id`)
);
