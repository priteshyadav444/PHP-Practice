
/* Table Relation Status  Names */
DROP TABLE IF EXISTS `reletionship_status_types`;
CREATE TABLE `reletionship_status_types`(
    `reletionship_status_type_id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `reletionship_status_name` VARCHAR(30) NOT NULL,
    `created_datetime` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

/* Reletion ship status */
DROP TABLE IF EXISTS `user_reletionship_status`;
CREATE TABLE `user_reletionship_status`
(
    `user_id` INT UNSIGNED NOT NULL,
    `reletionship_status_type_id` INT UNSIGNED NOT NULL,
    `visibility_type` TINYINT UNSIGNED,
    `partner_id` INT UNSIGNED,
    `created_datetime` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE(`user_id`, `reletionship_status_type_id`)
);

ALTER TABLE `user_reletionship_status`
    ADD CONSTRAINT `fk_user_reletionship_status_partner_id` FOREIGN KEY(`partner_id`) REFERENCES `users`(`user_id`);
ALTER TABLE `user_reletionship_status`
    ADD CONSTRAINT `fk_user_reletionship_status_user_id` FOREIGN KEY(`user_id`) REFERENCES `users`(`user_id`);
ALTER TABLE `user_reletionship_status`
    ADD CONSTRAINT `fk_reletionship_status_type_id` FOREIGN KEY(`reletionship_status_type_id`) REFERENCES `reletionship_status_types`(`reletionship_status_type_id`);
ALTER TABLE `user_reletionship_status` 
    ADD CONSTRAINT `fk_user_reletionship_status_visibility_type` FOREIGN KEY(`visibility_type`) REFERENCES `visibility_types`(`visibility_id`);

/* Reletion ship status show only four types  Public, Freinds,  Only me, CUSTOM*/ 
CREATE TABLE `reletionship_visibility_privicy_types`(
`reletionship_visibility_privicy_id` TINYINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
`reletionship_visibility_privicy_type` VARCHAR(30)
);

alter table `user_reletionship_status` drop foreign key `fk_user_reletionship_status_visibility_type`;

ALTER TABLE `user_reletionship_status`
ADD CONSTRAINT `fk_user_reletionship_status_visibility` FOREIGN KEY(`visibility_type`) REFERENCES `reletionship_visibility_privicy_types`(`reletionship_visibility_privicy_id`);


/* Family members Table */
CREATE TABLE `users_family_members`
(
    `user_id` INT UNSIGNED NOT NULL,
    `visibility_type` TINYINT UNSIGNED,
    `reletion_types` INT UNSIGNED,
    `member_id` INT UNSIGNED NOT NULL,
    `created_datetime` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
);

ALTER TABLE `users_family_members`
    ADD CONSTRAINT `fk_users_family_members_member_id` FOREIGN KEY(`member_id`) REFERENCES `users`(`user_id`);
ALTER TABLE `users_family_members` 
    ADD CONSTRAINT `fk_users_family_members_visibility_type` FOREIGN KEY(`visibility_type`) REFERENCES `visibility_types`(`visibility_id`);
ALTER TABLE `users_family_members`
    ADD CONSTRAINT `fk_users_family_members_user_id` FOREIGN KEY(`user_id`) REFERENCES `users`(`user_id`);
ALTER TABLE `users_family_members` ADD CONSTRAINT `fk_users_family_members_reletion_types` FOREIGN KEY (`reletion_types`) REFERENCES `reletion_names`(`reletion_id`);

/* Table Reletion Names */
DROP TABLE IF EXISTS `reletion_names`;
CREATE TABLE `reletion_names`(
    `reletion_id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `reletion_name` VARCHAR(30) NOT NULL,
    `created_datetime` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

--updating relationship 
ALTER TABLE `users_family_members` DROP FOREIGN KEY `fk_users_family_members_visibility_type`;

ALTER TABLE `users_family_members`
ADD CONSTRAINT `fk_user_visibility_type_1` FOREIGN KEY(`visibility_type`) REFERENCES `reletionship_visibility_privicy_types`(`reletionship_visibility_privicy_id`);
