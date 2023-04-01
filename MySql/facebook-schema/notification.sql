DROP TABLE IF EXISTS `notifications`;
CREATE TABLE `notifications`
(
    `notification_id` INT UNSIGNED PRIMARY KEY,
    `user_id` INT UNSIGNED,
    `content` TEXT,
    `notification_link` VARCHAR(60),
    `notification_seen` boolean,
    `notification_datetime` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

ALTER TABLE `notifications`
ADD CONSTRAINT `fk_user_id_notifications` FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`);


-- Notification Id
-- Notification Type 
-- Notification Content
-- Notification Link
-- Notification Deen
-- notification Datetime