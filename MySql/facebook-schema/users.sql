DROP TABLE users IF EXISTS;

-- SEQ2 -  Main Users Table Contain Details About Users

CREATE TABLE `users`(
    `user_id` INT UNSIGNED NULL AUTO_INCREMENT,
    `user_name` VARCHAR(15) NULL,
    `first_name` VARCHAR(40) NOT NULL,
    `last_name` VARCHAR(40) NOT NULL,
    `profile_pic_url` VARCHAR(60) NULL,
    `is_account_verified` TINYINT(1) NOT NULL DEFAULT '0',
    `email` VARCHAR(100) NOT NULL,
    `phone_no` VARCHAR(15) NOT NULL,
    `bio` VARCHAR(100) NULL,
    `password` CHAR(64) NOT NULL,
    `gender` CHAR(1) NOT NULL,
    `dob` DATE NOT NULL,
    `city` VARCHAR(60) NULL,
    `country_code` CHAR(2) NULL,
    `created_datetime` TIMESTAMP NULL DEFAULT 'CURRENT_TIMESTAMP',
    `updatedAt_datetime` TIMESTAMP NULL DEFAULT 'CURRENT_TIMESTAMP'
);

ALTER TABLE
    `users` ADD PRIMARY KEY `users_user_id_primary`(`user_id`);
ALTER TABLE
    `users` ADD UNIQUE `users_user_name_unique`(`user_name`);
ALTER TABLE
    `users` ADD UNIQUE `users_email_unique`(`email`);
ALTER TABLE
    `users` ADD UNIQUE `users_phone_no_unique`(`phone_no`);
ALTER TABLE
    `users` ADD CONSTRAINT `users_country_code_foreign` FOREIGN KEY(`country_code`) REFERENCES `country`(`alpha-2-code`);

ALTER TABLE `posts` DROP COLUMN `attachment`;

/* Add  gender type */

ALTER TABLE `users`
    DROP COLUMN `gender`;

ALTER TABLE `users`
    ADD  `gender_id`  TINYINT UNSIGNED NOT NULL;


/* adding dates */

ALTER TABLE  `users`
MODIFY `last_seen_date_time` TIMESTAMP NULL DEFAULT NULL;

ALTER TABLE  `users`
MODIFY `last_signup_datetime` TIMESTAMP NULL DEFAULT NULL;

ALTER TABLE  `users`
MODIFY `last_password_changed_datetime` TIMESTAMP NULL DEFAULT NULL;




-- alter table for default post visibilty post
ALTER TABLE  `users`
ADD `default_post_visibilty_types`  TINYINT UNSIGNED;

ALTER TABLE `users`
ADD CONSTRAINT FOREIGN KEY(`default_post_visibilty_types`) REFERENCES `post_visibility_privicy_types`(`posts_visibility_privicy_id`);


/*
    Table Store Visibility Types 
*/

DROP TABLE IF EXISTS `visibility_types`;
CREATE TABLE `visibility_types`(
    `visibility_id` TINYINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `visibility_name` VARCHAR(25) NOT NULL,
    `created_datetime` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


