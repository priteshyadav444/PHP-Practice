/* Messages Status (A - Accepted, N - Not accepted)*/

DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages`
(
    `message_id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `user1_id` INT UNSIGNED NOT NULL,
    `user2_id` INT UNSIGNED NOT NULL,
    `message_content` BLOB,
    `pinned_messages` BOOLEAN DEFAULT false,
    `message_status` ENUM('D', 'S'),
    `message_datetime` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE(`user1_id`, `user2_id`)
);

ALTER TABLE
    `messages` ADD CONSTRAINT `fk__messages_friend_id_1` FOREIGN KEY(`user1_id`) REFERENCES `users`(`user_id`);
ALTER TABLE
    `messages` ADD CONSTRAINT `fk__messages_friend_id_2` FOREIGN KEY(`user2_id`) REFERENCES `users`(`user_id`);


alter table `messages` drop foreign key `fk__messages_friend_id_1`;
alter table `messages` drop foreign key `fk__messages_friend_id_2`;

ALTER TABLE  `messages` DROP COLUMN `user1_id`;
ALTER TABLE  `messages` DROP COLUMN `user2_id`;

ALTER TABLE `messages` ADD `attachment` json;
ALTER TABLE `messages` ADD `message_seen_datetime` TIMESTAMP;
ALTER TABLE `messages` ADD `thread_id` INT UNSIGNED;


CREATE TABLE `message_thread`
(
    `thread_id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `user1_id` INT UNSIGNED NOT NULL,
    `user2_id` INT UNSIGNED NOT NULL,
    UNIQUE(`user1_id`, `user2_id`),
    `created_datetime` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
);

ALTER TABLE
    `message_thread` ADD CONSTRAINT `fk__messages_thread_id_1` FOREIGN KEY(`user1_id`) REFERENCES `users`(`user_id`);
ALTER TABLE
    `message_thread` ADD CONSTRAINT `fk__messages_thread_id_2` FOREIGN KEY(`user2_id`) REFERENCES `users`(`user_id`);


ALTER TABLE
    `messages` ADD CONSTRAINT `fk_thread_id` FOREIGN KEY(`thread_id`) REFERENCES `message_thread`(`thread_id`);
