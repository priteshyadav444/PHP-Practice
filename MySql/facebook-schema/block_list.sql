CREATE TABLE `block_list`
(
    `user1_id` INT UNSIGNED NOT NULL,
    `user2_id` INT UNSIGNED NOT NULL,
    `block_datetime` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE(`user1_id`, `user2_id`)
);
ALTER TABLE
    `block_list` ADD CONSTRAINT `fk_block_list_friend_id_1` FOREIGN KEY(`user1_id`) REFERENCES `users`(`user_id`);
    ALTER TABLE
    `block_list` ADD CONSTRAINT `fk_block_list_friend_id_2` FOREIGN KEY(`user2_id`) REFERENCES `users`(`user_id`);