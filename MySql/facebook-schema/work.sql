/* company tabls */

DROP TABLE IF EXISTS `companies`;
CREATE TABLE `companies`
(
    `company_id` int UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `compnay_name` VARCHAR(60) NOT NULL,
    `city_id` INT UNSIGNED,
    `created_datetime` TIMESTAMP DEFAULT CURRENT_TIMESTAMP;
)
ALTER TABLE `companies`
    ADD CONSTRAINT `fk_city_id` FOREIGN KEY(`city_id`) REFERENCES `city`(`city_id`);


/* user company tabls */

DROP TABLE IF EXISTS `user_companies`;
CREATE  TABLE `user_companies` 
(
    `user_id` INT UNSIGNED,
    `company_id` INT UNSIGNED,
    `postion` VARCHAR(30),
    `description` TEXT,
     `is_working` BOOLEAN DEFAULT FALSE,
    `visibility_type` TINYINT UNSIGNED,
    `from_datetime` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `to_datetime` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `created_datetime` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
ALTER TABLE `user_companies`
    ADD CONSTRAINT `fk_user_companies_user_id` FOREIGN KEY(`user_id`) REFERENCES `users`(`user_id`);
ALTER TABLE `user_companies`
    ADD CONSTRAINT `fk_user_companies_company_id` FOREIGN KEY(`company_id`) REFERENCES `companies`(`company_id`);
ALTER TABLE `user_companies` 
    ADD CONSTRAINT `fk_user_companies_visibility_type` FOREIGN KEY(`visibility_type`) REFERENCES `visibility_types`(`visibility_id`);

-- removeing visi

-- alter user companies for visibilty types
ALTER TABLE `user_companis`
    DROP COLUMN `default_visibilty_types`;

ALTER TABLE `user_companis`
    DROP COLUMN `visibility_type`;

ALTER TABLE  `user_companies`
ADD `visibility_type`  TINYINT UNSIGNED;

ALTER TABLE `user_companies`
ADD CONSTRAINT FOREIGN KEY(`visibility_type`) REFERENCES `post_visibility_privicy_types`(`posts_visibility_privicy_id`);

