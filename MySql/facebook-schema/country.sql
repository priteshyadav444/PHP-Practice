/*
    Country Table Store data like Country code 
    SEQ 1
*/

CREATE TABLE `country`(
    `alpha-2-code` CHAR(255) PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `numcode` SMALLINT NULL,
    `phonecode` INT NOT NULL
);