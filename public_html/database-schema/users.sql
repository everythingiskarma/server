CREATE DATABASE IF NOT EXISTS `iskarmac_users`; USE `iskarmac_users`;


CREATE TABLE IF NOT EXISTS `gatekeeper` (
    `id` int(11) NOT NULL AUTO_INCREMENT COMMENT "",
    `uid` varchar(16) NOT NULL COMMENT "",
    `email` varchar(255) NOT NULL COMMENT "",
    `domain` varchar(255) NOT NULL COMMENT "",
    `verified` int(1) NOT NULL DEFAULT 0 COMMENT "",
    `created` datetime NOT NULL DEFAULT current_timestamp() COMMENT "",
    PRIMARY KEY (`id`),
    UNIQUE KEY `uid` (`uid`),
    UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT '';


CREATE TABLE IF NOT EXISTS `otp` (
    `id` int(11) NOT NULL AUTO_INCREMENT COMMENT "",
    `uid` varchar(16) NOT NULL COMMENT "",
    `otp` int(6) DEFAULT NULL COMMENT "",
    `type` int(1) NOT NULL DEFAULT 0 COMMENT "0 = gatekeeper,  1 = registered",
    `status` int(1) NOT NULL DEFAULT 0 COMMENT "0 = unverified,  1 = verified",
    `attempts` int(1) NOT NULL DEFAULT 0 COMMENT "max 4 attempts allowed",
    `date_issued` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT "auto updates on resends",
    UNIQUE KEY `uid` (`uid`),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci  COMMENT "";


CREATE TABLE IF NOT EXISTS `user` (
    `id` int(11) NOT NULL AUTO_INCREMENT COMMENT "",
    `uid` varchar(16) NOT NULL COMMENT "",
    `avatar` mediumblob COMMENT "profile avatar : max 1mb (jpg, jpeg, png, gif)", 
    `avatar_mime` varchar(255) DEFAULT NULL COMMENT "mime type of uploaded image",
    `email` varchar(255) NOT NULL COMMENT "registered email address",
    `domain` varchar(255) NOT NULL COMMENT "",
    `firstname` varchar(255) NULL COMMENT "users firstname",
    `lastname` varchar(255) NULL COMMENT "users lastname",
    `gender` int(1) NOT NULL DEFAULT 0 COMMENT "",
    `dob` varchar(20) DEFAULT NULL COMMENT "date of birth",
    `cc` varchar(20) DEFAULT NULL COMMENT "country code",
    `cn` varchar(20) DEFAULT NULL COMMENT "country name",
    `dc` varchar(20) DEFAULT NULL COMMENT "dial code",
    `mobile` varchar(20) DEFAULT NULL COMMENT "mobile number",
    `created` datetime NOT NULL DEFAULT current_timestamp() COMMENT "",
    `updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT "",
    PRIMARY KEY (`id`),
    UNIQUE KEY `uid` (`uid`),
    UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT "";


CREATE TABLE IF NOT EXISTS `address` (
    `id` int(11) NOT NULL AUTO_INCREMENT COMMENT "",
    `uid` varchar(16) NOT NULL COMMENT "",
    `type` int(1) NOT NULL DEFAULT 0 COMMENT "1 = home / 2 = office / 3 = other",
    `priority` int(1) NOT NULL DEFAULT 0 COMMENT "1 = primary, 2 = secondary",
    `label` varchar(50) NULL COMMENT "nickname to identify multiple addresses",
    `address` varchar(255) NULL COMMENT "",
    `country` varchar(120) NULL COMMENT "",
    `state` varchar(120) NULL COMMENT "",
    `city` varchar(120) NULL COMMENT "",
    `zip` varchar(20) NULL COMMENT "",
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT "";


CREATE TABLE IF NOT EXISTS `kyc` (
    `id` int(11) NOT NULL AUTO_INCREMENT COMMENT "",
    `uid` varchar(16) NOT NULL COMMENT "",
    `photo` mediumblob COMMENT "recent photo : max 4mb (jpg, jpeg, png)",

    `id_type` int(1) DEFAULT NULL COMMENT "id proof type: 1=driving license,2=passport,3=citizenship,4=pancard,5=voterID,6=aadhar",
    `id_image` mediumblob COMMENT "id proof image: max 4mb (pdf, jpg, jpeg, png)",
    `id_mime` varchar(255) DEFAULT NULL COMMENT "mime type of uploaded image",
    `id_status` int(1) DEFAULT 2 COMMENT "1=Verified,2=Unverified,3=Pending,4=Modified,5=Failed",
    `id_status_msg` varchar(255) DEFAULT NULL COMMENT "Status message regarding document verification",

    `ap_type` varchar(255) DEFAULT NULL COMMENT "address proof type: 1=water-bill,2=electricity-bill,3=tel-bill,4=bank-statement,5=cc-statement,6=passport,7=aadhar",
    `ap_image` mediumblob COMMENT "address proof image: max 4mb (pdf, jpg, jpeg, png)",
    `ap_mime` varchar(255) DEFAULT NULL COMMENT "mime type of uploaded image",
    `ap_status` int(1) DEFAULT 2 COMMENT "1=Verified,2=Unverified,3=Pending,4=Modified,5=Failed",
    `ap_status_msg` varchar(255) DEFAULT NULL COMMENT "Status message regarding document verification",

    PRIMARY KEY (`id`),
    UNIQUE KEY `uid` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT "";


CREATE TABLE IF NOT EXISTS `kyb` (
    `id` int(11) NOT NULL AUTO_INCREMENT COMMENT "",
    `uid` varchar(16) NOT NULL COMMENT "",

    `biz_name` varchar(255) DEFAULT NULL COMMENT "name of business or organization",
    `biz_url` varchar(255) DEFAULT NULL COMMENT "website url of business or organization",
    `biz_type` varchar(255) DEFAULT NULL COMMENT "manufacturing, services, retail etc.",
    `biz_industry` varchar(255) DEFAULT NULL COMMENT "agri, solar, textile etc",
    `biz_category` varchar(255) DEFAULT NULL COMMENT "category based on industry",

    `biz_desc` varchar(4096) DEFAULT NULL COMMENT "users role in business",
    `biz_role` varchar(255) DEFAULT NULL COMMENT "users role in business",
    `biz_income` varchar(255) DEFAULT NULL COMMENT "validity of certificate",
    `biz_employees` varchar(255) DEFAULT NULL COMMENT "validity of certificate",

    `cert_type` int(1) DEFAULT NULL COMMENT "1=prop,2=plc,3=llc,4=corp,5=non-profit,6=co-op,7=other",
    `cert_validity` varchar(255) DEFAULT NULL COMMENT "validity of registatration as on certificate",
    `cert_image` mediumblob COMMENT "govt issued business registatration certificate (image)",
    `cert_mime` varchar(255) DEFAULT NULL COMMENT "mime type of uploaded image",
    `cert_status` int(1) DEFAULT 2 COMMENT "1=Verified,2=Unverified,3=Pending,4=Modified,5=Failed",
    `cert_status_msg` varchar(255) DEFAULT NULL COMMENT "Status message regarding document verification",

    PRIMARY KEY (`id`),
    UNIQUE KEY `uid` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT "";


CREATE TABLE IF NOT EXISTS `settings` (
    `id` int(11) NOT NULL AUTO_INCREMENT COMMENT "",
    `uid` varchar(16) NOT NULL COMMENT "",
    `language` varchar(11) DEFAULT NULL COMMENT "sets default lang for the site",
    `timezone` varchar(256) DEFAULT NULL COMMENT "sets default timezone",
    `mode` int(1) DEFAULT 2 COMMENT "toggles dark mode. 1=on,2=off",

    `newsletters` int(1) DEFAULT 2 COMMENT "toggles newsletter subscription. 1=on,2=off",
    `notifications` int(1) DEFAULT 2 COMMENT "toggles notifications. 1=on,2=off",

    `recovery` varchar(255) DEFAULT NULL COMMENT "recovery email address",
    `two_factor` int(1) DEFAULT 2 COMMENT "toggles 2 factor authentication. 1=on,2=off",
    `two_factor_key` varchar(255) DEFAULT NULL COMMENT "2 factor key",
    `terms` int(1) DEFAULT 2 COMMENT "toggles accept terms. 1=on,2=off",
    `privacy` int(1) DEFAULT 2 COMMENT "toggles accept privacy. 1=on,2=off",
    `multisite` int(1) DEFAULT 2 COMMENT "toggles accept multisite. 1=on,2=off",

    PRIMARY KEY (`id`),
    UNIQUE KEY `uid` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT "";


CREATE TABLE IF NOT EXISTS `sessions` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `uid` varchar(16) NOT NULL,
    `session` varchar(255) DEFAULT NULL COMMENT "session id generated by the server",
    `ip` varchar(45) DEFAULT NULL COMMENT "ip addr of user",
    `country` varchar(120) DEFAULT NULL COMMENT "country of user",
    `os` varchar(50) DEFAULT NULL COMMENT "",
    `os_version` varchar(50) DEFAULT NULL COMMENT "",
    `timezone` varchar(255) DEFAULT NULL COMMENT "",
    `browser` varchar(255) DEFAULT NULL COMMENT "",
    `browser_version` varchar(255) DEFAULT NULL COMMENT "",
    `method` varchar(255) DEFAULT NULL COMMENT "",
    `domain` varchar(255) DEFAULT NULL COMMENT "",
    `referrer` varchar(255) DEFAULT NULL COMMENT "",
    `agent` varchar(255) DEFAULT NULL COMMENT "",
    `speed` varchar(255) DEFAULT NULL COMMENT "",
    `device` varchar(255) DEFAULT NULL COMMENT "",
    `status` int(1) DEFAULT 0 COMMENT "show current login status",
    `login_time` datetime DEFAULT NULL COMMENT "",
    `logout_time` datetime DEFAULT NULL COMMENT "",
    PRIMARY KEY (`id`),
    UNIQUE KEY `uid` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci  COMMENT "";