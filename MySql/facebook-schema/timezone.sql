-- CREATE TABLE  `timezones`
-- (
--     `timezone_id` TINYINT UNSIGNED PRIMARY KEY,
--     `timezone_name` VARCHAR(30),
--     UNIQUE(`timezone_id`, `timezone_name`)
-- );




ALTER TABLE `users`
ADD  `timezone_id` TINYINT UNSIGNED;

ALTER TABLE `users`
ADD CONSTRAINT `fk_timezonr_id` FOREIGN KEY(`timezone_id`) REFERENCES `timezones`(`timezone_id`);