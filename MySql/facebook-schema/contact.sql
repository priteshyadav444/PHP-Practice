DROP TABLE  IF EXISTS `contact`;

CREATE TABLE `contact`
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
ADD CONSTRAINT  FOREIGN KEY(`visibility_type`) REFERENCES `reletionship_visibility_privicy_types`(`reletionship_visibility_privicy_id`);
