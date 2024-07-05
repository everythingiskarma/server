CREATE DATABASE IF NOT EXISTS `iskarmac_content`; USE `iskarmac_content`;

CREATE TABLE IF NOT EXISTS `pages` (
    `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '',
    `uid` varchar(16) NOT NULL COMMENT '',
	
    UNIQUE KEY `uid` (`uid`),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci  COMMENT '';

CREATE TABLE IF NOT EXISTS `categories` (
    `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '',
    `uid` varchar(16) NOT NULL COMMENT '',
	
    UNIQUE KEY `uid` (`uid`),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci  COMMENT '';

CREATE TABLE IF NOT EXISTS `menus` (
    `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '',
    `uid` varchar(16) NOT NULL COMMENT '',
	
    UNIQUE KEY `uid` (`uid`),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci  COMMENT '';