DROP TABLE IF EXISTS `posts_type`;
CREATE TABLE `posts_type`(
    `posts_type_id` TINYINT UNSIGNED PRIMARY KEY,
    `post_type_name` VARCHAR(30) NOT NULL
);

DROP TABLE IF EXISTS `timelines`;
CREATE TABLE `timelines`(
    `timeline_id` INT UNSIGNED PRIMARY KEY,
    `post_id` INT UNSIGNED NOT NULL,
    `posts_type_id` TINYINT UNSIGNED NOT NULl
);

ALTER TABLE
    `timelines` ADD CONSTRAINT `fk_post_id_type_timline` FOREIGN KEY(`posts_type_id`) REFERENCES `posts_type`(`posts_type_id`);

ALTER TABLE
    `timelines` ADD CONSTRAINT `fk_post_id_timline` FOREIGN KEY(`post_id`) REFERENCES `posts`(`post_id`);

