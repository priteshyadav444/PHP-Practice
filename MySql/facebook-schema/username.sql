/* username and userid */
/* username and userid */
DROP TABLE IF EXISTS `usernames`;
CREATE TABLE  `usernames`
(
    `user_id` INT UNSIGNED,
    `username` VARCHAR(30),
    UNIQUE(`user_id`, `username`)
);

ALTER TABLE `usernames`
    ADD CONSTRAINT `fk_user_id_username`
    FOREIGN KEY(`user_id`)
    REFERENCES `users`(`user_id`);
