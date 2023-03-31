/* account visibilty store is account active hiddent, terminated */
CREATE TABLE `account_visibility_status`
(
    `account_visibilty_id` TINYINT UNSIGNED PRIMARY KEY,
    `account_visibilty_type` TINYINT UNSIGNED,
);

--  adding inside user
ALTER TABLE  `users`
ADD `account_visibilty_id`  TINYINT UNSIGNED;

ALTER TABLE `users`
ADD CONSTRAINT FOREIGN KEY(`fk_account_visibilty_id`) REFERENCES `account_visibility_status`(`account_visibilty_id`);

