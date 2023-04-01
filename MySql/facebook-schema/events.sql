/* This Table Will Store Event Types */

DROP TABLE IF EXISTS `events_type`;
CREATE TABLE `events_type`
(
    `event_type_id` TINYINT unsigned AUTO_INCREMENT PRIMARY KEY,
    `event_type_name` VARCHAR(60)
);

/* This Table Will Store All Common Event with Evets  Types */

DROP TABLE IF EXISTS `events_common`;
CREATE TABLE `events_common`
(
    `event_id` INT unsigned AUTO_INCREMENT PRIMARY KEY,
    `event_type_id` TINYINT unsigned,
    `event_title` VARCHAR(60),
    `event_date` DATE,
    `createdAt_datetime` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
ALTER TABLE `events_common`
    ADD CONSTRAINT `fk_events_common_event_type_id` FOREIGN KEY(`event_type_id`) REFERENCES `events_type`(`event_type_id`);

/* Adding Post id in Event Common*/
ALTER TABLE  `events_common`
ADD `post_id`  INT UNSIGNED;

ALTER TABLE `events_common`
    ADD CONSTRAINT `fk_post_id_events_common` FOREIGN KEY(`post_id`) REFERENCES `posts`(`post_id`);


/* This Table Will Store All Job Event with Evets Types */
DROP TABLE IF EXISTS `events_job`;
CREATE TABLE `events_job`
(
    `event_id` INT unsigned AUTO_INCREMENT PRIMARY KEY,
    `event_type_id` TINYINT unsigned,
    `event_title` VARCHAR(60),
    `company_id` INT UNSIGNED,
    `event_date` DATE,
    `createdAt_datetime` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

ALTER TABLE `events_job`
    ADD CONSTRAINT `fk_events_job_company_id` FOREIGN KEY(`company_id`) REFERENCES `companies`(`company_id`);

ALTER TABLE `events_job`
    ADD CONSTRAINT `fk_events_job_event_type_id` FOREIGN KEY(`event_type_id`) REFERENCES `events_type`(`event_type_id`);
    
/* Adding Post id in Event Job*/
ALTER TABLE  `events_job`
ADD `post_id`  INT UNSIGNED;

ALTER TABLE `events_job`
    ADD CONSTRAINT `fk_post_id_events_job` FOREIGN KEY(`post_id`) REFERENCES `posts`(`post_id`);

/* This Table Will Store All Job Education with Evets Types */

CREATE TABLE `events_education`
(
    `event_id` INT unsigned AUTO_INCREMENT PRIMARY KEY,
    `event_type_id` TINYINT unsigned,
    `event_title` VARCHAR(60),
    `institute_type` ENUM('University', 'School'),
    `institute_id` INT UNSIGNED,
    `event_date` DATE,
    `createdAt_datetime` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

ALTER TABLE `events_education` 
    ADD CONSTRAINT `fk_events_education_universites_id` FOREIGN KEY(`institute_id`) REFERENCES   `universites`(`university_id`);

ALTER TABLE `events_education` 
    ADD CONSTRAINT `fk_events_education_school_id` FOREIGN KEY(`institute_id`) REFERENCES   `schools`(`school_id`);
    
ALTER TABLE `events_education`
    ADD CONSTRAINT `fk_events_education_event_type_id` FOREIGN KEY(`event_type_id`) REFERENCES `events_type`(`event_type_id`);

/* Adding Post id in Event events_education*/
ALTER TABLE  `events_education`
ADD `post_id`  INT UNSIGNED;

ALTER TABLE `events_education`
    ADD CONSTRAINT `fk_post_id_events_education` FOREIGN KEY(`post_id`) REFERENCES `posts`(`post_id`);

/* This Table Will Store Events releed All events Reletionship with Evets Types */

CREATE TABLE `events_reletionship`
(
    `event_id`INT unsigned AUTO_INCREMENT PRIMARY KEY,
    `event_type_id` TINYINT unsigned,
    `event_title` VARCHAR(60),
    `partner_id` INT UNSIGNED,
    `event_date` DATE,
    `createdAt_datetime` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

ALTER TABLE `events_reletionship` 
    ADD CONSTRAINT `fk_partner_id` FOREIGN KEY(`partner_id`) REFERENCES `users`(`user_id`);

ALTER TABLE `events_reletionship`
    ADD CONSTRAINT `fk_events_reletionship_event_type_id` FOREIGN KEY(`event_type_id`) REFERENCES `events_type`(`event_type_id`);

/* Adding Post id in Event events_reletionship*/
ALTER TABLE  `events_reletionship`
ADD `post_id`  INT UNSIGNED;

ALTER TABLE `events_reletionship`
    ADD CONSTRAINT `fk_post_id_events_reletionship` FOREIGN KEY(`post_id`) REFERENCES `posts`(`post_id`);

/* This Table Will Store Events releed All events Places Changed Moved with Events Types */
CREATE TABLE `events_places`
(
    `event_id` INT unsigned AUTO_INCREMENT PRIMARY KEY,
    `event_type_id` TINYINT unsigned,
    `event_title` VARCHAR(60),
    `city_id` INT UNSIGNED,
    `event_date` DATE,
    `createdAt_datetime` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

ALTER TABLE `events_places`
    ADD CONSTRAINT `fk_events_places_city_id` FOREIGN KEY(`city_id`) REFERENCES `city`(`city_id`);

ALTER TABLE `events_places`
    ADD CONSTRAINT `fk_events_places_event_type_id` FOREIGN KEY(`event_type_id`) REFERENCES `events_type`(`event_type_id`);

/* Adding Post id in Event events_reletionship*/
ALTER TABLE  `events_places`
ADD `post_id`  INT UNSIGNED;

ALTER TABLE `events_places`
    ADD CONSTRAINT `fk_post_id_events_places` FOREIGN KEY(`post_id`) REFERENCES `posts`(`post_id`);

/* This Table Will Store Events releted moved with Events Types */
CREATE TABLE `events_travel`
(
    `event_id` INT unsigned AUTO_INCREMENT PRIMARY KEY,
    `event_type_id` TINYINT unsigned,
    `event_title` VARCHAR(60),
    `location_id` INT UNSIGNED,
    `event_date` DATE,
    `createdAt_datetime` TIMESTAMP  DEFAULT CURRENT_TIMESTAMP
);

ALTER TABLE `events_travel`
    ADD CONSTRAINT `fk_events_travel_event_type_id` FOREIGN KEY(`event_type_id`) REFERENCES `events_type`(`event_type_id`);

ALTER TABLE  `posts`
ADD `event_id`  INT UNSIGNED;


/* Adding Post id in Event events_travel*/
ALTER TABLE  `events_travel`
ADD `post_id`  INT UNSIGNED;

ALTER TABLE `events_travel`
    ADD CONSTRAINT `fk_post_id_events_travel` FOREIGN KEY(`post_id`) REFERENCES `posts`(`post_id`);


-- ALTER TABLE `posts`
--     ADD CONSTRAINT `fk_event_id_multile_events_common` FOREIGN KEY(`event_id`) REFERENCES  `events_common`(`event_id`);

-- ALTER TABLE `posts`
--     ADD CONSTRAINT `fk_event_id_multile_events_job` FOREIGN KEY(`event_id`) REFERENCES  `events_job`(`event_id`);

-- ALTER TABLE `posts`
--     ADD CONSTRAINT `fk_event_id_multile_events_education` FOREIGN KEY(`event_id`) REFERENCES  `events_education`(`event_id`);

-- ALTER TABLE `posts`
--     ADD CONSTRAINT `fk_event_id_multile_events_places` FOREIGN KEY(`event_id`) REFERENCES  `events_places`(`event_id`);

-- ALTER TABLE `posts`
--     ADD CONSTRAINT `fk_event_id_multile_events_travel` FOREIGN KEY(`event_id`) REFERENCES  `events_travel`(`event_id`);

-- ALTER TABLE `posts`
--     ADD CONSTRAINT `fk_event_id_multile_events_reletionship` FOREIGN KEY(`event_id`) REFERENCES  `events_reletionship`(`event_id`);
