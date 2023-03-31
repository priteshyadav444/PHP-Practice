/* user sports intrest Tables add visibility of user show intrest in user privacy */

DROP TABLE IF EXISTS `users_sport_teams_intrest`;
CREATE TABLE `users_sport_teams_intrest`
(
    `user_id` INT UNSIGNED NOT NULL,
    `page_id` INT UNSIGNED NOT NULL,
    `visibility_type` TINYINT UNSIGNED NOT NULL,
    `createdAt_datetime` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

ALTER TABLE `users_sport_teams_intrest`
ADD FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`);

ALTER TABLE `users_sport_teams_intrest`
ADD CONSTRAINT `fk_user_visibility_type_users_sport_teams_intrest` 
FOREIGN KEY(`visibility_type`) REFERENCES `reletionship_visibility_privicy_types`(`reletionship_visibility_privicy_id`);


/* user sportsman intrest Tables */

DROP TABLE IF EXISTS `users_sport_men_intrest`;
CREATE TABLE `users_sport_men_intrest`
(
    `user_id` INT UNSIGNED NOT NULL,
    `page_id` INT UNSIGNED NOT NULL,
    `visibility_type` TINYINT UNSIGNED NOT NULL,
    `createdAt_datetime` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

ALTER TABLE `users_sport_men_intrest`
ADD FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`);

ALTER TABLE `users_sport_men_intrest`
ADD CONSTRAINT `fk_user_visibility_type_users_sport_men_intrest` 
FOREIGN KEY(`visibility_type`) REFERENCES `reletionship_visibility_privicy_types`(`reletionship_visibility_privicy_id`);


/* user music intrest Tables */

DROP TABLE IF EXISTS `users_music_intrest`;
CREATE TABLE `users_music_intrest`
(
    `user_id` INT UNSIGNED NOT NULL,
    `page_id` INT UNSIGNED NOT NULL,
    `visibility_type` TINYINT UNSIGNED NOT NULL,
    `createdAt_datetime` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

ALTER TABLE `users_music_intrest`
ADD FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`);

ALTER TABLE `users_music_intrest`
ADD CONSTRAINT `fk_user_visibility_type_users_music_intrest` 
FOREIGN KEY(`visibility_type`) REFERENCES `reletionship_visibility_privicy_types`(`reletionship_visibility_privicy_id`);



/* user music show Tables */

DROP TABLE IF EXISTS `users_show_intrest`;
CREATE TABLE `users_show_intrest`
(
    `user_id` INT UNSIGNED NOT NULL,
    `page_id` INT UNSIGNED NOT NULL,
    `visibility_type` TINYINT UNSIGNED NOT NULL,
    `createdAt_datetime` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

ALTER TABLE `users_show_intrest`
ADD FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`);

ALTER TABLE `users_show_intrest`
ADD CONSTRAINT `fk_user_visibility_type_users_show_intrest` 
FOREIGN KEY(`visibility_type`) REFERENCES `reletionship_visibility_privicy_types`(`reletionship_visibility_privicy_id`);



/* user music films Tables */

DROP TABLE IF EXISTS `users_films_intrest`;
CREATE TABLE `users_films_intrest`
(
    `user_id` INT UNSIGNED NOT NULL,
    `page_id` INT UNSIGNED NOT NULL,
    `visibility_type` TINYINT UNSIGNED NOT NULL,
    `createdAt_datetime` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

ALTER TABLE `users_films_intrest`
ADD FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`);

ALTER TABLE `users_films_intrest`
ADD CONSTRAINT `fk_user_visibility_type_users_films_intrest` 
FOREIGN KEY(`visibility_type`) REFERENCES `reletionship_visibility_privicy_types`(`reletionship_visibility_privicy_id`);



/* user artist films Tables */

DROP TABLE IF EXISTS `users_artist_intrest`;
CREATE TABLE `users_artist_intrest`
(
    `user_id` INT UNSIGNED NOT NULL,
    `page_id` INT UNSIGNED NOT NULL,
    `visibility_type` TINYINT UNSIGNED NOT NULL,
    `createdAt_datetime` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

ALTER TABLE `users_artist_intrest`
ADD FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`);

ALTER TABLE `users_artist_intrest`
ADD CONSTRAINT `fk_user_visibility_type_users_artist_intrest` 
FOREIGN KEY(`visibility_type`) REFERENCES `reletionship_visibility_privicy_types`(`reletionship_visibility_privicy_id`);



/* user books films Tables */

DROP TABLE IF EXISTS `users_book_intrest`;
CREATE TABLE `users_book_intrest`
(
    `user_id` INT UNSIGNED NOT NULL,
    `page_id` INT UNSIGNED NOT NULL,
    `visibility_type` TINYINT UNSIGNED NOT NULL,
    `createdAt_datetime` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

ALTER TABLE `users_book_intrest`
ADD FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`);

ALTER TABLE `users_book_intrest`
ADD CONSTRAINT `fk_user_visibility_type_users_book_intrest` 
FOREIGN KEY(`visibility_type`) REFERENCES `reletionship_visibility_privicy_types`(`reletionship_visibility_privicy_id`);



