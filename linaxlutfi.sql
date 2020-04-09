-- Adminer 3.7.1 MySQL dump

SET NAMES utf8;
SET foreign_key_checks = 0;
SET time_zone = '+00:00';
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `linax_ip-whitelist`;
CREATE TABLE `linax_ip-whitelist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `linax_logs`;
CREATE TABLE `linax_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `time` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `page` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `browser` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `browser_version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `os` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `os_version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `referer_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `linax_logs` (`id`, `ip`, `date`, `time`, `page`, `type`, `browser`, `browser_version`, `os`, `os_version`, `referer_url`) VALUES
(25,	'127.0.0.1',	'05 April 2020',	'11:22',	'/php_project/process/linaxsec/index.php?id=1+UNION+1,2,3,4,5,6--',	'SQLi',	'Google Chrome',	'67.0.3396.87',	'Linux localhost 3.10.17 #1 SMP PREEMPT Wed Oct 21 18:10:45 CST 2015 armv7l',	'',	'');

DROP TABLE IF EXISTS `linax_pages-layolt`;
CREATE TABLE `linax_pages-layolt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `linax_pages-layolt` (`id`, `page`, `text`, `image`) VALUES
(1,	'Blocked',	'Your attack was detected',	'http://localhost:8080/php_project/process/linaxsec/img/tercyduk/heker.jpg');

DROP TABLE IF EXISTS `linax_settings`;
CREATE TABLE `linax_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'lutfianamart@gmail.com',
  `mail_notifications` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Yes',
  `realtime_protection` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Yes',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='All LinaXSec settings will be stored here.';

INSERT INTO `linax_settings` (`id`, `email`, `mail_notifications`, `realtime_protection`) VALUES
(1,	'lutfianamart@gmail.com',	'Yes',	'Yes');

DROP TABLE IF EXISTS `linax_sqli-patterns`;
CREATE TABLE `linax_sqli-patterns` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pattern` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `linax_sqli-patterns` (`id`, `pattern`) VALUES
(1,	'union'),
(2,	'cookie'),
(3,	'coockie'),
(4,	'concat'),
(5,	'table'),
(6,	'from'),
(7,	'where'),
(8,	'exec'),
(9,	'shell'),
(10,	'wget'),
(11,	'/**/'),
(12,	'0x3a'),
(13,	'null'),
(14,	'BUN'),
(15,	'S@BUN'),
(16,	'char'),
(17,	'\'%'),
(18,	'OR%'),
(24,	'%0A%0D');

DROP TABLE IF EXISTS `linax_sqli-settings`;
CREATE TABLE `linax_sqli-settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `protection` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Yes',
  `logging` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Yes',
  `redirect` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'pages/blocked.php',
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `linax_sqli-settings` (`id`, `protection`, `logging`, `redirect`, `mail`) VALUES
(1,	'Yes',	'Yes',	'lxs-tercyduk/blocked.php',	'No');

DROP TABLE IF EXISTS `linax_users`;
CREATE TABLE `linax_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'admin',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `linax_users` (`id`, `username`, `password`, `email`) VALUES
(1,	'admin',	'YWRtaW4=',	'admin@gmail.com'),
(2,	'LutfiAnam',	'bHV0ZmlhbmFt',	'lutfianamart@gmail.com'),
(3,	'LinaililMuna',	'bGluYWlsaWxtdW5h',	'linaililmuna@gmail.com'),
(4,	'LinaXSec',	'bGluYXhzZWM=',	'linaxsec@linaxsec.rf.gd');

-- 2020-04-06 03:17:52