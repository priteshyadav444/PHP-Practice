CREATE TABLE `search_history`
(
    `user_id` INT UNSIGNED NOT NULL,
    `searched_text` VARCHAR(60),
    'searched_id' VARCHAR(20),
    `craetedAt_datetime` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
);

ALTER TABLE `search_history`
    ADD CONSTRAINT 'fk_searched_id' FOREIGN KEY(`searched_id`) REFERENCES `search_type`(`searched_id`);

ALTER TABLE `search_history`
    ADD CONSTRAINT 'fk_user_id' FOREIGN KEY(`user_id`) REFERENCES `users`(`user_id`);

CREATE TABLE `search_type`
(
    `searched_id` TINYINT UNSIGNED PRIMARY KEY,
    `searched_type` VARCHAR(60) NOT NULl,
);
