CREATE TABLE `visitor_logs` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `page_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
 `referrer_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
 `user_ip_address` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
 `user_geo_location` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
 `user_agent` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
 `device` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
 `created` datetime NOT NULL DEFAULT current_timestamp(),
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `engagement_logs` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `log_id` varchar(16) NOT NULL FOREIGN_KEY visitor_logs.id,
 `created` datetime NOT NULL DEFAULT current_timestamp(),
 `engagement_time` int(5) NOT NULL DEFAULT 0,
 `last_visited_at` datetime NOT NULL DEFAULT current_timestamp(),
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `retantion_logs` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `log_id` int(11) NOT NULL FOREIGN_KEY visitor_logs.id,
 `created` datetime NOT NULL DEFAULT current_timestamp(),
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



// visitor count Table