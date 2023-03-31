
/* Table School */
DROP TABLE IF EXISTS `schools`;
CREATE TABLE `schools`(
    `school_id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `school_name` VARCHAR(100) NOT NULL,
    `created_datetime` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

/* users and its table */
DROP TABLE IF EXISTS `users_school`;
CREATE TABLE `users_school`
(
    `user_id` INT UNSIGNED NOT NULL,
    `school_id` INT UNSIGNED NOT NULL,
    `description` TEXT,
    `visibility_type`  TINYINT UNSIGNED,
    `from_datetime` DATE,
    `to_datetime` DATE,
    `is_graduated` boolean,
    `created_datetime` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_datetime` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE (`user_id`, `school_id`)
);

ALTER TABLE `users_school` 
    ADD CONSTRAINT `fk_school_id` FOREIGN KEY(`school_id`) REFERENCES   `schools`(`school_id`);
ALTER TABLE `users_school` 
    ADD CONSTRAINT `fk_userid` FOREIGN KEY(`user_id`) REFERENCES `users`(`user_id`);
ALTER TABLE `users_school` 
    ADD CONSTRAINT `fk_visibility_id` FOREIGN KEY(`visibility_type`) REFERENCES `visibility_types`(`visibility_id`);

-- alter adding vasibilty type
alter table `users_school` drop foreign key `fk_visibility_id`;

ALTER TABLE `users_school`
ADD CONSTRAINT `fk_fk_visibility_id_1` FOREIGN KEY(`visibility_type`) REFERENCES `post_visibility_privicy_types`(`posts_visibility_privicy_id`);



/* Table University */
DROP TABLE IF EXISTS `universites`;
CREATE TABLE `universites`(
    `university_id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `university_name` VARCHAR(100) NOT NULL,
    `created_datetime` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


/* 
users and its table 
Gradtion
graduation_level : Graduation, Post Greaduation
*/
DROP TABLE IF EXISTS `users_universites`;
CREATE TABLE `users_universites`
(
    `user_id` INT UNSIGNED NOT NULL,
    `university_id` INT UNSIGNED NOT NULL,
    `description` TEXT,
    `visibility_type` TINYINT UNSIGNED,
    `from_datetime` DATE,
    `to_datetime` DATE,
    `graduation_opt` json,
    `is_graduated` boolean,
    `graduation_level` ENUM('G', 'P'),
    `created_datetime` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_datetime` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE (`user_id`, `university_id`)
);
ALTER TABLE `users_universites` 
    ADD CONSTRAINT `fk_universites_id` FOREIGN KEY(`university_id`) REFERENCES   `universites`(`university_id`);
ALTER TABLE `users_universites` 
    ADD CONSTRAINT `fk_userid_universites` FOREIGN KEY(`user_id`) REFERENCES `users`(`user_id`);

ALTER TABLE `users_universites` 
    ADD CONSTRAINT `fk_visibility_id_uni` FOREIGN KEY(`visibility_type`) REFERENCES `visibility_types`(`visibility_id`);

--updated visibilty type
alter table `users_universites` drop foreign key `fk_visibility_id_uni`;

ALTER TABLE `users_universites`
ADD CONSTRAINT `fk_visibility_id_uni_1` FOREIGN KEY(`visibility_type`) REFERENCES `post_visibility_privicy_types`(`posts_visibility_privicy_id`);
