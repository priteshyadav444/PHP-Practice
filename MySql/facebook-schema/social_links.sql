/* it stores social link of users like websites and instagram*/

CREATE TABLE `social_links`
(
    `user_id` INT UNSIGNED,
    `social_media` VARCHAR(30),
    `link_url` VARCHAR(100),
    `visibility_type` TINYINT UNSIGNED,
    `created_datetime` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE(`user_id`, `social_media`)
);

ALTER TABLE `social_links`
ADD CONSTRAINT FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`);

ALTER TABLE `social_links`
ADD CONSTRAINT `fk_social_links` FOREIGN KEY(`visibility_type`) REFERENCES `reletionship_visibility_privicy_types`(`reletionship_visibility_privicy_id`);


CREATE TABLE `websites_link`
(
    `user_id` INT UNSIGNED,
    `link_url` VARCHAR(100),
    `visibility_type` TINYINT UNSIGNED,
    `created_datetime` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE(`user_id`, `link_url`)
);

ALTER TABLE `websites_link`
ADD CONSTRAINT FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`);

ALTER TABLE `websites_link`
ADD CONSTRAINT `fk_websites_links` FOREIGN KEY(`visibility_type`) REFERENCES `reletionship_visibility_privicy_types`(`reletionship_visibility_privicy_id`);
