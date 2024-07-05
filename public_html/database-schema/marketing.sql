CREATE DATABASE IF NOT EXISTS `iskarmac_marketing`; USE `iskarmac_marketing`;

CREATE TABLE IF NOT EXISTS `advertising` (
    `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '',
    `uid` varchar(16) NOT NULL COMMENT '',
	
    UNIQUE KEY `uid` (`uid`),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci  COMMENT '';

CREATE TABLE IF NOT EXISTS `emails` (
    `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '',
    `uid` varchar(16) NOT NULL COMMENT '',
	
    UNIQUE KEY `uid` (`uid`),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci  COMMENT '';

CREATE TABLE IF NOT EXISTS `newsletters` (
    `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '',
    `uid` varchar(16) NOT NULL COMMENT '',
	
    UNIQUE KEY `uid` (`uid`),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci  COMMENT '';

CREATE TABLE IF NOT EXISTS `sms` (
    `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '',
    `uid` varchar(16) NOT NULL COMMENT '',
	
    UNIQUE KEY `uid` (`uid`),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci  COMMENT '';

CREATE TABLE IF NOT EXISTS `funnels` (
    `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '',
    `uid` varchar(16) NOT NULL COMMENT '',
	
    UNIQUE KEY `uid` (`uid`),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci  COMMENT '';

CREATE TABLE IF NOT EXISTS `social` (
    `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '',
    `uid` varchar(16) NOT NULL COMMENT '',
	
    UNIQUE KEY `uid` (`uid`),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci  COMMENT '';

