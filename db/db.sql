/* 
 * Creat de scriptul facut de Marius Trifu
 * La data de 04-09-2017 si ora 21:38:16
 * Pentru intrebari trifumarius01@gmail.com
 */
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


CREATE DATABASE IF NOT EXISTS `Hermes`;

USE Hermes;


CREATE TABLE `Hermes`.`Users` (

   `id` INT NOT NULL AUTO_INCREMENT , 
   `email` VARCHAR(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL , 
   `parola` VARCHAR(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL , 
   `nume` VARCHAR(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL , 
   `prenume` VARCHAR(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL , 
   `telefon` VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL , 
   `tip` VARCHAR(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL ,
    `sid` VARCHAR(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' ,
    `data` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_unicode_ci;


INSERT INTO `Users` 
    (`id`, `email`, `parola`, `nume`, `prenume`, `telefon`, `tip`) 
VALUES 
    ('1', 'trifumarius01@gmail.com', 'a80b568a237f50391d2f1f97beaf99564e33d2e1c8a2e5cac21ceda701570312', 'Trifu', 'Marius', '0764310664', 'admin');


CREATE TABLE `Hermes`.`Dashboard` (
    `id` INT NOT NULL AUTO_INCREMENT ,
    `id_user` INT NOT NULL ,
    `tip` VARCHAR(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
    `nume` VARCHAR(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
    `data` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_unicode_ci;

CREATE TABLE `Hermes`.`Sensor` (
    `id` INT NOT NULL AUTO_INCREMENT ,
    `id_dashboard` INT NOT NULL , 
    `tip` VARCHAR(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Numar', 
    `um` VARCHAR(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL , 
    `pozitie` INT NOT NULL , 
    `nume` VARCHAR(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
    `zecimale` INT NOT NULL , 
    `data` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
    PRIMARY KEY (`id`)
) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_unicode_ci;

CREATE TABLE `Hermes`.`Value` (
    `id` INT NOT NULL AUTO_INCREMENT , 
    `id_sensor` INT NOT NULL , 
    `data` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
    `valoare` VARCHAR(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL , 
    PRIMARY KEY (`id`)
) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_unicode_ci;