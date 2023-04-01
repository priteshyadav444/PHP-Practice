CREATE TABLE `post_locations`(
    `post_id` INT UNSIGNED,
    `post_tagged_list_id` json
);

ALTER TABLE
    `post_locations` ADD CONSTRAINT `fk_post_locations` FOREIGN KEY(`post_id`) REFERENCES `posts`(`post_id`);