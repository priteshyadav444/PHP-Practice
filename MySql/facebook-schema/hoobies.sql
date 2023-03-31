/* Table Stores diffrent hoobies */

DROP TABLE IF EXISTS `hobbies`;

CREATE TABLE `hobbies`
(
    `user_hobbies_id` SMALLINT UNSIGNED PRIMARY KEY,
    `user_hobies_names` VARCHAR(30) NOT NULL,
    UNIQUE(`user_hobbies_id`, `user_hobies_names`)
);

/* Table Stores users hoobies */
DROP TABLE IF EXISTS `user_hoobies`;
CREATE TABLE `user_hoobies`
(
    `user_id` INT UNSIGNED,
    `user_hobbies_id` SMALLINT UNSIGNED,
    UNIQUE(`user_id`, `user_hobbies_id`),
    `creadted_datetime` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP
);

ALTER TABLE `user_hoobies`
    ADD CONSTRAINT `fk_user_hoobies_user_id` FOREIGN KEY(`user_id`) REFERENCES `users`(`user_id`);

ALTER TABLE `user_hoobies`
    ADD CONSTRAINT `fk_users_hobbies_id` FOREIGN KEY(`user_hobbies_id`) REFERENCES `hobbies`(`user_hobbies_id`);