
/* 
 
 TABLE STORE City Details

*/
DROP TABLE IF EXISTS `city`;
CREATE TABLE `city`(
    `city_id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `city_name` VARCHAR(60) NOT NULL,
    `country_id` char(2),
    `creadted_datetime` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

ALTER TABLE
    `city` ADD CONSTRAINT `city_country_id_foreign` FOREIGN KEY(`country_id`) REFERENCES `country`(`alpha-2-code`);

/* places lived tables */
/* places lived tables */
DROP TABLE IF EXISTS `users_places_lived`;
CREATE TABLE `users_places_lived`
(
    `user_id` INT UNSIGNED,
    `city_id` INT UNSIGNED,
    `visibility_type` TINYINT UNSIGNED,
    `from_datetime` DATE,
    `to_datetime` DATE,
    `created_datetime` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
ALTER TABLE `users_places_lived`
    ADD CONSTRAINT `fk_user_id_places_lived` FOREIGN KEY(`user_id`) REFERENCES `users`(`user_id`);
ALTER TABLE `users_places_lived`
    ADD CONSTRAINT `fk_city_id_places_lived` FOREIGN KEY(`city_id`) REFERENCES `city`(`city_id`);
ALTER TABLE `users_places_lived` 
    ADD CONSTRAINT `fk_users_places_lived_visibility_type` FOREIGN KEY(`visibility_type`) REFERENCES `visibility_types`(`visibility_id`);

/* 
places lived tables 
place_type (H : Home Town, C current Town) 
*/
DROP TABLE IF EXISTS `users_town_current_places`;
CREATE TABLE `users_town_current_places`
(
    `user_id` INT UNSIGNED,
    `city_id` INT UNSIGNED,
    `visibility_type` TINYINT UNSIGNED,
    `place_type` ENUM('C', 'H'),
    `from_datetime` DATE,
    `to_datetime` DATE,
    `created_datetime` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE(`user_id`, `city_id`)
);
ALTER TABLE `users_town_current_places`
    ADD CONSTRAINT `fk_users_town_current_places_user_id` FOREIGN KEY(`user_id`) REFERENCES `users`(`user_id`);
ALTER TABLE `users_town_current_places`
    ADD CONSTRAINT `fk_users_town_current_places_city_id` FOREIGN KEY(`city_id`) REFERENCES `city`(`city_id`);
ALTER TABLE `users_town_current_places` 
    ADD CONSTRAINT `fk_users_town_current_places_visibility_type` FOREIGN KEY(`visibility_type`) REFERENCES `visibility_types`(`visibility_id`);
    
alter table `users_town_current_places` drop foreign key `fk_users_town_current_places_visibility_type`;

ALTER TABLE `users_town_current_places` ADD `visibility_type` TINYINT UNSIGNED;;

ALTER TABLE `users_town_current_places`
ADD CONSTRAINT `fk_users_town_current_places_visibilty` FOREIGN KEY(`visibility_type`) REFERENCES `post_visibility_privicy_types`(`posts_visibility_privicy_id`);

