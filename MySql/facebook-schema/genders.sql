/* gender Tables */

DROP TABLE IF EXISTS `genders`;
CREATE TABLE `genders`
(
    `gender_id` TINYINT UNSIGNED PRIMARY KEY,
    `gender_type` VARCHAR(20)
);

-- altering user table adding foreign key

ALTER TABLE `users` 
    ADD CONSTRAINT `fk_gender_id` FOREIGN KEY(`gender_id`) REFERENCES `genders`(`gender_id`);