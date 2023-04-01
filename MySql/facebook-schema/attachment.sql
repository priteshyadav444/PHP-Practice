/* it stores attachment with its types like profile picture, cover picture, post , messages*/
CREATE TABLE `users_attachment`
(
    `attachment_id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT UNSIGNED,
    `type` VARCHAR(30),
    `link_url` VARCHAR(100),
    `created_datetime` TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
);

ALTER TABLE `users_attachment`
ADD CONSTRAINT FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`);