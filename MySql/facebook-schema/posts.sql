/*
    -- SEQ - 1 Main Posts Table Contain Details About Posts
    conten_text can be null (only if attackment is passed other wise it should be containing value)
*/
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts`(
    `post_id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `author_id` INT UNSIGNED NOT NULL,
    `is_post_visibility_hidden` boolean NULL DEFAULT false,
    `isEdited` boolean NULL DEFAULT false,
    `content_text` TEXT,
    `attachment` VARCHAR(60) COMMENT 'Store image link url',
    `created_datetime` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_datetime` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP
);




ALTER TABLE
    `posts` ADD CONSTRAINT `posts_author_id_foreign` FOREIGN KEY(`author_id`) REFERENCES `users`(`user_id`);

ALTER TABLE `posts` DROP COLUMN `is_post_visibility_hidden`;
ALTER TABLE `posts` DROP COLUMN `attachment`;

ALTER TABLE  `posts`
ADD `post_visibilty_types`  TINYINT UNSIGNED;

ALTER TABLE  `posts`
ADD `post_tagged_list_id`  json;

ALTER TABLE  `posts`
ADD `location`  VARCHAR(60);




/* table alteration for visibilty_id*/ 
ALTER TABLE `posts`
    ADD CONSTRAINT `fk_post_visibilty_types` FOREIGN KEY(`post_visibilty_types`) REFERENCES 			                                    `post_visibility_privicy_types`(`posts_visibility_privicy_id`);


-- Post Feeling Id Alteration
ALTER TABLE  `posts`
ADD `feeling_id`  TINYINT UNSIGNED;


ALTER TABLE `posts`
    ADD CONSTRAINT `fk_post_feeling_id` FOREIGN KEY(`feeling_id`) REFERENCES  `post_feeling_types`(`post_feeling_id`);

-- Post Activity Id Alteration (USER AND ACTIVIT TABLE SHOULD BE ADDED. FOR ACTIVITY TYPES)
ALTER TABLE  `posts`
ADD `activity_id`  TINYINT UNSIGNED;

ALTER TABLE `posts`
    ADD CONSTRAINT `fk_post_activity_id` FOREIGN KEY(`activity_id`) REFERENCES  `post_activity_types`(`post_activity_id`);


-- Alteration of attachment links
ALTER TABLE  `posts`
ADD `attachment` json;


/* Post attachment table Stored all the attachment of particular post in json */
CREATE TABLE `post_attachments`(
`post_id` INT UNSIGNED,
`attachments_links` json
);
ALTER TABLE `post_attachments`
    ADD CONSTRAINT `fk_post_id_attachment` FOREIGN KEY(`post_id`) REFERENCES `posts`(`post_id`);

/* post share expect and specifc user store all the expect user for particular post */

/* post share expect and specifc user store all the expect user for particular post */
CREATE TABLE `post_share_except_specific_users`(
`post_id` INT UNSIGNED,
`user_list` json
);

ALTER TABLE `post_share_except_specific_users`
    ADD CONSTRAINT `fk_post_id_post_share_except_specific_users` FOREIGN KEY(`post_id`) REFERENCES `posts`(`post_id`);

/* store custom share list share and not share list 
sharewith - all, frinds, json
	not share -  with json membes id
*/

CREATE TABLE `post_share_custom_users`(
`post_id` INT UNSIGNED,
`share_user_list` json,
`not_share_user_list` json
);

ALTER TABLE `post_share_custom_users`
    ADD CONSTRAINT `fk_post_id_post_share_custom_users` FOREIGN KEY(`post_id`) REFERENCES `posts`(`post_id`);

/* 
this store all the visibilty types for post 
types Public, Freinds, Friends, specific friend, Only me, CUSTOM
*/

CREATE TABLE `post_visibility_privicy_types`(
`posts_visibility_privicy_id` TINYINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
`posts_visibility_privicy_type` VARCHAR(30)
);


/* this store all the post feeling like(happy, blessed with emojis) types for post */
CREATE TABLE `post_feeling_types`(
`post_feeling_id` TINYINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
`posts_feeling_type` VARCHAR(30)
)


/* table for post and activity to store page */
DROP TABLE IF EXISTS `post_activity`;
CREATE TABLE `post_activity`
(
    `activity_id` INT UNSIGNED PRIMARY KEY,
    `post_activity_id` TINYINT UNSIGNED,
    `page_id` INT UNSIGNED
);

ALTER TABLE `post_activity`
ADD CONSTRAINT `fk_activity_id_1` FOREIGN KEY(`post_activity_id`) REFERENCES `post_activity_types`(`post_activity_id`);

alter table `posts` drop foreign key `fk_post_activity_id`;
alter table `posts` add constraint `fk_activity_id_2` foreign key(`activity_id`) references `post_activity`(`activity_id`); 
alter TABLE `posts` add `activity_id` int unsigned; 
alter table `posts` add constraint `fk_activity_id_3` foreign key(`activity_id`) references `post_activity`(`activity_id`); 

/* this store all the post activity like(watching, movie) types*/
CREATE TABLE `post_activity_types`(
`post_activity_id` TINYINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
`posts_activity_type` VARCHAR(30)
)


/* 
-- Post Like Table Contain Details who liked the posts
*/

DROP TABLE IF EXISTS `post_likes`;
CREATE TABLE `post_likes`(
    `like_id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `liked_post_id` INT UNSIGNED NOT NULL,
    `liked_by_user_id` INT UNSIGNED NOT NULL,
    `created_datetime` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP
);

ALTER TABLE
    `post_likes` ADD CONSTRAINT `post_likes_liked_post_id_foreign` FOREIGN KEY(`liked_post_id`) REFERENCES `posts`(`post_id`);

/* 
-- Post Shared Table Contain Details who shared the posts
shared table can contain same user. which shared the post more than once
*/

DROP TABLE IF EXISTS `post_shared`;
CREATE TABLE `post_shared`(
    `shared_id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `shared_post_id` INT UNSIGNED NOT NULL,
    `shared_by_user_id` INT UNSIGNED NOT NULL,
    `created_datetime` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'post shared time'
);

ALTER TABLE
    `post_shared` ADD CONSTRAINT `post_shared_shared_post_id_foreign` FOREIGN KEY(`shared_post_id`) REFERENCES `posts`(`post_id`); 
    ALTER TABLE
    `post_shared` ADD CONSTRAINT `post_shared_shared_user_id_foreign` FOREIGN KEY(`shared_by_user_id`) REFERENCES `users`(`user_id`);  


/*
    -- Post Comment user contain all the unique coment of the posts 
    Content can store text and 
*/
DROP TABLE IF EXISTS `post_commnets`;
CREATE TABLE `post_comments`(
    `comment_id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `comment_post_id` INT UNSIGNED NOT NULL,
    `comment_user_id` INT UNSIGNED NOT NULL,
    `comment_content` TEXT,
    `attachment` VARCHAR(60) COMMENT 'Store image link url',
    `created_datetime` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_datetime` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP
);



ALTER TABLE
    `post_comments` ADD CONSTRAINT `post_comments_comment_post_id_foreign` FOREIGN KEY(`comment_post_id`) REFERENCES `posts`(`post_id`);

ALTER TABLE
    `post_comments` ADD CONSTRAINT `post_comments_comment_user_id_foreign` FOREIGN KEY(`comment_user_id`) REFERENCES `users`(`user_id`);


/*
    Table content Comment Replyes
    reply content can be text empoji anything ()
*/
DROP TABLE IF EXISTS `commet_reply`;
CREATE TABLE `commet_reply`(
    `reply_id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    `replay_comment_id` INT UNSIGNED NOT NULL,
    `reply_user_id` INT UNSIGNED NOT NULL,
    `reply_content` TEXT,
    `created_datetime` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_datetime` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

ALTER TABLE
    `commet_reply` ADD CONSTRAINT `commet_reply_comment_id_foreign` FOREIGN KEY(`reply_user_id`) REFERENCES `post_comments`(`comment_id`);
ALTER TABLE
    `commet_reply` ADD CONSTRAINT `commet_reply_reply_user_id_foreign` FOREIGN KEY(`reply_user_id`) REFERENCES `users`(`user_id`);



/*
    Table Store Comment likes details which user liked the post
*/
DROP TABLE IF EXISTS `comment_likes`;
CREATE TABLE `comment_likes`(
    `comment_like_id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `comment_id` INT UNSIGNED NOT NULL,
    `liked_by_user_id` INT UNSIGNED NOT NULL,
    `created_datetime` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    UNIQUE(`comment_id`, `liked_by_user_id`)
);


ALTER TABLE
    `comment_likes` ADD CONSTRAINT `comment_likes_comment_id_foreign` FOREIGN KEY(`comment_id`) REFERENCES `post_comments`(`comment_id`);

ALTER TABLE
    `comment_likes` ADD CONSTRAINT `comment_likes_liked_by_user_id_foreign` FOREIGN KEY(`liked_by_user_id`) REFERENCES `users`(`user_id`);


/*
    Table Store Reply likes details which user liked the post
    user is going to unique for 
*/
DROP TABLE IF EXISTS `reply_likes`;
CREATE TABLE `reply_likes`(
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `reply_id` INT UNSIGNED NOT NULL,
    `reply_user_id` INT UNSIGNED NOT NULL,
    `created_datetime` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    UNIQUE(`reply_id`, `reply_user_id`)
);

ALTER TABLE
    `reply_likes` ADD CONSTRAINT `reply_likes_reply_id_foreign` FOREIGN KEY(`reply_id`) REFERENCES `commet_reply`(`reply_id`);

ALTER TABLE
    `reply_likes` ADD CONSTRAINT `reply_likes_reply_user_id_foreign` FOREIGN KEY(`reply_user_id`) REFERENCES `users`(`user_id`);


