-- Rename Privacy option table which have visibility_type 
--     reletionship_visibility_privicy_types (Only Four Option)
--     post_visibility_privicy_types (Six Option)

CREATE TABLE `users_privacy`
(
    `user_id` INT UNSIGNED,
    `default_post_` TINYINT UNSIGNED,
    `birthdate_visibility_type` TINYINT UNSIGNED,
    `phone_visibility_type` TINYINT UNSIGNED,
    `email_visibility_type` TINYINT UNSIGNED,
    UNIQUE(`user_id`)
);

ALTER TABLE `users_privacy`
ADD FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`);
ALTER TABLE `users_privacy`

ADD FOREIGN KEY(`birthdate_visibility_type`) REFERENCES `reletionship_visibility_privicy_types`(`reletionship_visibility_privicy_id`);
ALTER TABLE `users_privacy`

ADD FOREIGN KEY(`phone_visibility_type`) REFERENCES `reletionship_visibility_privicy_types`(`reletionship_visibility_privicy_id`);
ALTER TABLE `users_privacy`

ADD FOREIGN KEY(`email_visibility_type`) REFERENCES `reletionship_visibility_privicy_types`(`reletionship_visibility_privicy_id`);

ALTER TABLE  `users_privacy`
ADD `default_post_visibilty_types`  TINYINT UNSIGNED;

ALTER TABLE `users`
ADD CONSTRAINT FOREIGN KEY(`default_post_visibilty_types`) REFERENCES `post_visibility_privicy_types`(`posts_visibility_privicy_id`);
