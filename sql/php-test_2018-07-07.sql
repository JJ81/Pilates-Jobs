# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.1.20-MariaDB)
# Database: php-test
# Generation Time: 2018-07-07 09:46:04 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table cms_business_info
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cms_business_info`;

CREATE TABLE `cms_business_info` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cm_id` bigint(20) unsigned NOT NULL COMMENT '사업자 유형의 멤버 아이디',
  `business_name` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT '사업장명',
  `address` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '사업장 주소',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin ROW_FORMAT=COMPACT;



# Dump of table cms_license
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cms_license`;

CREATE TABLE `cms_license` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL COMMENT 'cms_member의 아이디 참조',
  `license_name` varchar(100) CHARACTER SET utf8 NOT NULL COMMENT '자격증 명칭',
  `taken_dt` date DEFAULT NULL COMMENT '취득한 날',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin ROW_FORMAT=COMPACT;

LOCK TABLES `cms_license` WRITE;
/*!40000 ALTER TABLE `cms_license` DISABLE KEYS */;

INSERT INTO `cms_license` (`id`, `user_id`, `license_name`, `taken_dt`)
VALUES
	(11,4,'ㅁㄴㄹ1','2018-07-07'),
	(12,4,'qwer2','2018-07-07');

/*!40000 ALTER TABLE `cms_license` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table cms_member
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cms_member`;

CREATE TABLE `cms_member` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `nickname` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `realname` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `gender` enum('M','F') COLLATE utf8mb4_bin DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `phone` varchar(13) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `thumbnail` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `role` enum('A','C','U') COLLATE utf8mb4_bin NOT NULL DEFAULT 'U',
  `reg_type` enum('B','P') COLLATE utf8mb4_bin DEFAULT NULL COMMENT '가입유형 / B는 기업회원, P는 개인회원',
  `business_name` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT '상호명',
  `business_number` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '사업자번호',
  `description` text CHARACTER SET utf8 COMMENT '사업체에 대한 설명 등록',
  `address` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `created_dt` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`,`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin ROW_FORMAT=COMPACT;

LOCK TABLES `cms_member` WRITE;
/*!40000 ALTER TABLE `cms_member` DISABLE KEYS */;

INSERT INTO `cms_member` (`id`, `username`, `nickname`, `realname`, `gender`, `birthday`, `phone`, `email`, `thumbnail`, `password`, `role`, `reg_type`, `business_name`, `business_number`, `description`, `address`, `created_dt`)
VALUES
	(1,'admin',NULL,NULL,NULL,NULL,NULL,'admin',NULL,'7110eda4d09e062aa5e4a390b0a572ac0d2c0220',X'41',NULL,NULL,NULL,NULL,NULL,'2018-06-10 08:50:56'),
	(2,'test001',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'8dac20aa7da734d8ac41583a50fe59075f08ed7a',X'43',NULL,NULL,NULL,NULL,NULL,'2018-06-19 12:29:57'),
	(3,NULL,NULL,NULL,NULL,NULL,NULL,'j.lee@jcorporationtech.com',NULL,'db25f2fc14cd2d2b1e7af307241f548fb03c312a',X'55',X'50',NULL,NULL,NULL,NULL,'2018-07-03 14:50:59'),
	(4,NULL,NULL,'이재준',X'46','2018-06-05','010-3354-0000','j.lee@chadaeli.com','20180707_af84b70459d2af0e02f30d0f27df7575.jpg','db25f2fc14cd2d2b1e7af307241f548fb03c312a',X'43',X'50',NULL,NULL,'ㅂㄴㄹㅁㄴㅇㄹㅁㄴㅇㄹ\r\nasdf\r\nasdf',NULL,'2018-07-05 16:08:49');

/*!40000 ALTER TABLE `cms_member` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
