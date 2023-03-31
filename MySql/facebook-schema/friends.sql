/*
    -- SEQ - 1 Main Posts Table Contain Details About Posts
    conten_text can be null (only if attackment is passed other wise it should be containing value)
*/
DROP TABLE IF EXISTS `friends`;
CREATE TABLE `friends`
(
    `friendship_id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `user1_id` INT UNSIGNED NOT NULL,
    `user2_id` INT UNSIGNED NOT NULL,
    `established_datetime` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE(`user1_id`, `user2_id`)
);
ALTER TABLE
    `friends` ADD CONSTRAINT `fk_friend_id_1` FOREIGN KEY(`user1_id`) REFERENCES `users`(`user_id`);
    ALTER TABLE
    `friends` ADD CONSTRAINT `fk_friend_id_2` FOREIGN KEY(`user2_id`) REFERENCES `users`(`user_id`);


/* Request Status (A - Accepted, N - Not accepted)*/
DROP TABLE IF EXISTS `friend_requests`;
CREATE TABLE `friend_requests`
(
    `request_id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `user1_id` INT UNSIGNED NOT NULL,
    `user2_id` INT UNSIGNED NOT NULL,
    `request_status` ENUM('A', 'N') NOT NULL DEFAULT 'N',
    `request_datetime` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE(`user1_id`, `user2_id`)
);

ALTER TABLE
    `friend_requests` ADD CONSTRAINT `fk__request_friend_id_1` FOREIGN KEY(`user1_id`) REFERENCES `users`(`user_id`);
ALTER TABLE
    `friend_requests` ADD CONSTRAINT `fk__request_friend_id_2` FOREIGN KEY(`user2_id`) REFERENCES `users`(`user_id`)

