CREATE DATABASE IF NOT EXISTS `basoma_autoworks`;

USE `basoma_autoworks`;

CREATE TABLE IF NOT EXISTS `user`(
	`id` INT NOT NULL AUTO_INCREMENT,
	`username` VARCHAR(100) NOT NULL, /* Not more than 30 charachers */
	`email` VARCHAR(100) UNIQUE NOT NULL, /* Not more than 50 charachers */
	`phoneNumber` VARCHAR(50) NOT NULL, /* Not more than 11 charachers */
	`password` VARCHAR(50) NOT NULL, /* Not more than 20 charachers */
    `firstName` VARCHAR(50), /* Not more than 20 charachers */
	`lastName` VARCHAR(50), /* Not more than 20 charachers */
    
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `business`(
	`id` INT NOT NULL AUTO_INCREMENT,
    `user_id` INT UNIQUE NOT NULL,
	`businessName` VARCHAR(100) NOT NULL, /* Not more than 60 charachers */
	`businessEmail` VARCHAR(100) NOT NULL, /* Not more than 60 charachers */
	`businessPhoneNumber` VARCHAR(50) NOT NULL, /* Not more than 11 charachers */
    `businessAddress` VARCHAR(150) NOT NULL, /* Not more than 70 charachers */
    
    PRIMARY KEY(`id`),
    
    CONSTRAINT `userId`
		FOREIGN KEY(`user_id`)
        REFERENCES `basoma_autoworks`.`user`(`id`)
);