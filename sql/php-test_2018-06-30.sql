# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.1.19-MariaDB)
# Database: php-test
# Generation Time: 2018-06-30 08:56:12 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table cms_banner
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cms_banner`;

CREATE TABLE `cms_banner` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` enum('T','B','M') COLLATE utf8mb4_bin NOT NULL DEFAULT 'M',
  `thumbnail` varchar(255) CHARACTER SET utf8 NOT NULL,
  `link` varchar(255) CHARACTER SET utf8 NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description` text CHARACTER SET utf8,
  `code` varchar(255) CHARACTER SET utf8 NOT NULL,
  `order` tinyint(4) DEFAULT NULL,
  `created_dt` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin ROW_FORMAT=COMPACT;

LOCK TABLES `cms_banner` WRITE;
/*!40000 ALTER TABLE `cms_banner` DISABLE KEYS */;

INSERT INTO `cms_banner` (`id`, `type`, `thumbnail`, `link`, `title`, `description`, `code`, `order`, `created_dt`)
VALUES
	(5,X'4D','20180623_6e793a43e4e380abe383606d9578da82.jpg','test','test','<span style=\"color: red;\">개행하여 배너에 대한 표시를 할 수가 있습니다.</span>\n개행하여 배너에 대한 표시를 할 수가 있습니다.\n개행하여 배너에 대한 표시를 할 수가 있습니다.','CODENAME',NULL,'2018-06-23 18:05:30'),
	(6,X'4D','20180623_34bda3aaaa6c5d0bc43d113bd50f31c6.jpg','test','test','개행하여 배너에 대한 표시를 할 수가 있습니다.\n개행하여 배너에 대한 표시를 할 수가 있습니다.\n개행하여 배너에 대한 표시를 할 수가 있습니다.','CODENAME',NULL,'2018-06-23 18:05:43'),
	(7,X'4D','20180623_a7ec3fb3ae59ed0e8b52d704f69bf033.jpg','test2','test2','개행하여 배너에 대한 표시를 할 수가 있습니다.\n개행하여 배너에 대한 표시를 할 수가 있습니다.\n개행하여 배너에 대한 표시를 할 수가 있습니다.','CODENAME',NULL,'2018-06-23 18:06:21'),
	(8,X'4D','20180623_d5c365c546cdc56c8dbe8631d0bfe842.jpg','test41','test41','개행하여 배너에 대한 표시를 할 수가 있습니다.\n개행하여 배너에 대한 표시를 할 수가 있습니다.\n개행하여 배너에 대한 표시를 할 수가 있습니다.','CODENAME',NULL,'2018-06-23 18:07:10'),
	(9,X'4D','20180623_ac9c672db45063d152043f92d68a6a25.png','http://www.naver.com/','asdf1','개행하여 배너에 대한 표시를 할 수가 있습니다.\n개행하여 배너에 대한 표시를 할 수가 있습니다.\n개행하여 배너에 대한 표시를 할 수가 있습니다.','CODENAME',NULL,'2018-06-23 18:15:38'),
	(11,X'4D','20180623_399abc070077640e8e76c8a1541f71c7.jpg','qwer1234','qwer1234','개행하여 배너에 대한 표시를 할 수가 있습니다.\n개행하여 배너에 대한 표시를 할 수가 있습니다.\n개행하여 배너에 대한 표시를 할 수가 있습니다.','CODENAME',NULL,'2018-06-23 18:18:07'),
	(12,X'4D','20180623_664700f3e3312cbf0fb4887d65e769a8.png','http://jcorporationtech.com','JCORP','개행하여 배너에 대한 표시를 할 수가 있습니다.\n개행하여 배너에 대한 표시를 할 수가 있습니다.\n개행하여 배너에 대한 표시를 할 수가 있습니다.','CODENAME',NULL,'2018-06-23 18:21:27'),
	(13,X'4D','20180624_68abb8c7ff8cd594e200f7683ae510e0.jpg','admin.co.kr','admin','개행하여 배너에 대한 표시를 할 수가 있습니다.\n개행하여 배너에 대한 표시를 할 수가 있습니다.\n개행하여 배너에 대한 표시를 할 수가 있습니다.','CODENAME',NULL,'2018-06-24 11:22:16');

/*!40000 ALTER TABLE `cms_banner` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table cms_board_blog
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cms_board_blog`;

CREATE TABLE `cms_board_blog` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `blog_type` enum('T','V','G','S') COLLATE utf8mb4_bin NOT NULL DEFAULT 'T' COMMENT '썸네일형, 비디오형, 갤러리형, 기본형',
  `video` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `contents` text CHARACTER SET utf8 NOT NULL,
  `thumbnail` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `author` varchar(10) CHARACTER SET utf8 NOT NULL,
  `attached` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `hits` bigint(20) unsigned DEFAULT '0' COMMENT '조회수',
  `created_dt` datetime DEFAULT CURRENT_TIMESTAMP,
  `modified_dt` datetime DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1' COMMENT '해당 글 노출 여부를 결정한다.',
  `type` enum('SE','GE') COLLATE utf8mb4_bin NOT NULL DEFAULT 'GE' COMMENT '비밀글인지 일반글인지 설정함',
  `password` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '타입이 비밀글일 경우 비밀번호를 입력받는다.',
  `comment_id` int(11) DEFAULT NULL COMMENT '어느 글의 코멘트인지 설정',
  `reply_id` int(11) DEFAULT NULL COMMENT '어느 글의 댓글인지 설정',
  `admin_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin ROW_FORMAT=COMPACT;

LOCK TABLES `cms_board_blog` WRITE;
/*!40000 ALTER TABLE `cms_board_blog` DISABLE KEYS */;

INSERT INTO `cms_board_blog` (`id`, `title`, `blog_type`, `video`, `contents`, `thumbnail`, `author`, `attached`, `hits`, `created_dt`, `modified_dt`, `active`, `type`, `password`, `comment_id`, `reply_id`, `admin_id`)
VALUES
	(1,'공지사항 1',X'54',NULL,'<p><span style=\"color: rgb(120, 32, 185);\">공지시항</span>을 작성합니다.</p><p><span style=\"font-size: 18pt;\"><span style=\"color: rgb(0, 117, 200);\">공지사항</span>을 작성합니다.</span></p><p><span style=\"font-size: 14pt;\"><span style=\"color: rgb(0, 158, 37);\">공지사항</span>을 작성합니다.​</span><span id=\"husky_bookmark_end_1529208544748\"></span>&nbsp;</p><p><span style=\"font-size: 12pt;\"><span style=\"color: rgb(255, 0, 0);\">공지사항</span>을 작성합니다.</span></p><p><span style=\"font-size: 12pt;\">&nbsp;</span></p><p><span style=\"font-size: 12pt;\"><img src=\"/upload/test1234.png\" title=\"test1234.png\"><br style=\"clear:both;\">이미지도 위와 같이 첨부합니다.</span></p><p><span style=\"font-size: 12pt;\">&nbsp;</span></p>',NULL,'',NULL,1000,'2018-06-17 13:10:57',NULL,1,X'4745',NULL,NULL,NULL,NULL),
	(2,'공지사항 2',X'54',NULL,'<p><img src=\"/upload/tmp_gallery_1.jpg\" title=\"tmp_gallery_1.jpg\"></p><p><img src=\"/upload/tmp_gallery_1.jpg\" title=\"tmp_gallery_1.jpg\"><br style=\"clear:both;\">업로드 테스트<br style=\"clear:both;\">&nbsp;</p>',NULL,'',NULL,1234,'2018-06-17 13:31:08',NULL,1,X'4745',NULL,NULL,NULL,NULL),
	(3,'수정 수정 한 번 더',X'54',NULL,'<p><span style=\"font-size: 9pt;\">공지사항을 작성합니다.</span></p><p>  <span style=\"font-size: 10pt;\">공지사항을 작성합니다.​</span></p><p><span style=\"font-size: 11pt;\">공지사항을 작성합니다.​</span></p>',NULL,'',NULL,0,'2018-06-25 00:00:00',NULL,1,X'4745',NULL,NULL,NULL,NULL),
	(4,'공지사항을 입력합니다.',X'54',NULL,'<p>&nbsp;</p>',NULL,'',NULL,0,'2018-06-25 19:11:43',NULL,1,X'4745',NULL,NULL,NULL,NULL),
	(5,'공지사항 테스트',X'54',NULL,'<p>공지사항을 입력합니다.</p><p>&nbsp;</p><p>공지사항을 입력합니다.​</p><p>공지사항을 입력합니다.​</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>공지사항을 입력합니다.​</p>',NULL,'',NULL,0,'2018-06-25 19:12:25',NULL,1,X'4745',NULL,NULL,NULL,NULL),
	(6,'공지사항 테스트2',X'54',NULL,'<p>공지사항</p><p>공지사항</p><p>&nbsp;</p><p><span style=\"font-size: 36pt;\">공지사항</span></p><p>&nbsp;</p>',NULL,'',NULL,0,'2018-06-25 19:14:13',NULL,1,X'4745',NULL,NULL,NULL,NULL),
	(7,'공지사항 테스트3',X'54',NULL,'<p><span style=\"color: rgb(239, 0, 124); font-size: 36pt;\">공지사항 테스트</span></p>',NULL,'',NULL,0,'2018-06-25 19:14:51',NULL,1,X'4745',NULL,NULL,NULL,NULL),
	(8,'입력된 제목이 없으므로 수정하여 제목을 입력합니다.',X'54',NULL,'<p>&nbsp;</p>',NULL,'',NULL,0,'2018-06-25 00:00:00',NULL,1,X'4745',NULL,NULL,NULL,NULL),
	(9,'입력된 제목이 없으므로 수정하여 제목을 입력합니다.',X'54',NULL,'<p>에디터를 이용한 글이 없으므로</p><p>글을 새롭게 작성합니다.</p><p>&nbsp;</p>',NULL,'',NULL,0,'2018-06-25 00:00:00',NULL,1,X'4745',NULL,NULL,NULL,NULL),
	(10,'제목을 입력합니다. 수정',X'54',NULL,'<p><span style=\"font-size: 12pt;\">공지사항을 작성합니다.</span></p><p><span style=\"font-size: 12pt;\">한줄을 개행하게 되면 어떻게 나오는지 확인을 해봅니다.</span></p><p><span style=\"font-size: 12pt;\">&nbsp;</span></p><p><span style=\"font-size: 12pt;\"></span><span style=\"font-size: 16px;\">한줄을 개행하게 되면 어떻게 나오는지 확인을 해봅니다.</span><span style=\"font-size: 12pt;\">​</span></p>',NULL,'',NULL,0,'2018-06-25 00:00:00',NULL,1,X'4745',NULL,NULL,NULL,NULL),
	(11,'대표 썸네일형 블로그를 작성합니다.',X'54',NULL,'<p>대표썸네일형 블로그를 작성합니다.</p><p>블로그 글이 충분히 길다면 얼마나 길 수가 있을까요?</p><p>&nbsp;</p><p>사용해보고 데이터베이스 값을 조정해 보아야 할 것 같습니다.</p><p>&nbsp;</p><p><img src=\"/upload/888_20180618150622_2.jpg\" title=\"888_20180618150622_2.jpg\"></p><p>테스트로 위와 같이 이미지를 업로드해봅니다.</p><p><br style=\"clear:both;\">&nbsp;</p>','20180630_2212a53522126f716db521f000ebf9c6.jpg','',NULL,0,'2018-06-30 00:00:00',NULL,1,X'4745',NULL,NULL,NULL,1);

/*!40000 ALTER TABLE `cms_board_blog` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table cms_board_notice
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cms_board_notice`;

CREATE TABLE `cms_board_notice` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `contents` text CHARACTER SET utf8 NOT NULL,
  `thumbnail` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `author` varchar(10) CHARACTER SET utf8 NOT NULL,
  `attached` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `hits` bigint(20) unsigned DEFAULT '0' COMMENT '조회수',
  `created_dt` datetime DEFAULT CURRENT_TIMESTAMP,
  `modified_dt` datetime DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1' COMMENT '해당 글 노출 여부를 결정한다.',
  `type` enum('SE','GE') COLLATE utf8mb4_bin NOT NULL DEFAULT 'GE' COMMENT '비밀글인지 일반글인지 설정함',
  `password` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '타입이 비밀글일 경우 비밀번호를 입력받는다.',
  `comment_id` int(11) DEFAULT NULL COMMENT '어느 글의 코멘트인지 설정',
  `reply_id` int(11) DEFAULT NULL COMMENT '어느 글의 댓글인지 설정',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin ROW_FORMAT=COMPACT;

LOCK TABLES `cms_board_notice` WRITE;
/*!40000 ALTER TABLE `cms_board_notice` DISABLE KEYS */;

INSERT INTO `cms_board_notice` (`id`, `title`, `contents`, `thumbnail`, `author`, `attached`, `hits`, `created_dt`, `modified_dt`, `active`, `type`, `password`, `comment_id`, `reply_id`)
VALUES
	(1,'공지사항 1','<p><span style=\"color: rgb(120, 32, 185);\">공지시항</span>을 작성합니다.</p><p><span style=\"font-size: 18pt;\"><span style=\"color: rgb(0, 117, 200);\">공지사항</span>을 작성합니다.</span></p><p><span style=\"font-size: 14pt;\"><span style=\"color: rgb(0, 158, 37);\">공지사항</span>을 작성합니다.​</span><span id=\"husky_bookmark_end_1529208544748\"></span>&nbsp;</p><p><span style=\"font-size: 12pt;\"><span style=\"color: rgb(255, 0, 0);\">공지사항</span>을 작성합니다.</span></p><p><span style=\"font-size: 12pt;\">&nbsp;</span></p><p><span style=\"font-size: 12pt;\"><img src=\"/upload/test1234.png\" title=\"test1234.png\"><br style=\"clear:both;\">이미지도 위와 같이 첨부합니다.</span></p><p><span style=\"font-size: 12pt;\">&nbsp;</span></p>',NULL,'',NULL,1000,'2018-06-17 13:10:57',NULL,1,X'4745',NULL,NULL,NULL),
	(2,'공지사항 2','<p><img src=\"/upload/tmp_gallery_1.jpg\" title=\"tmp_gallery_1.jpg\"></p><p><img src=\"/upload/tmp_gallery_1.jpg\" title=\"tmp_gallery_1.jpg\"><br style=\"clear:both;\">업로드 테스트<br style=\"clear:both;\">&nbsp;</p>',NULL,'',NULL,1234,'2018-06-17 13:31:08',NULL,1,X'4745',NULL,NULL,NULL),
	(3,'수정 수정 한 번 더','<p><span style=\"font-size: 9pt;\">공지사항을 작성합니다.</span></p><p>  <span style=\"font-size: 10pt;\">공지사항을 작성합니다.​</span></p><p><span style=\"font-size: 11pt;\">공지사항을 작성합니다.​</span></p>',NULL,'',NULL,0,'2018-06-25 00:00:00',NULL,1,X'4745',NULL,NULL,NULL),
	(4,'공지사항을 입력합니다.','<p>&nbsp;</p>',NULL,'',NULL,0,'2018-06-25 19:11:43',NULL,1,X'4745',NULL,NULL,NULL),
	(5,'공지사항 테스트','<p>공지사항을 입력합니다.</p><p>&nbsp;</p><p>공지사항을 입력합니다.​</p><p>공지사항을 입력합니다.​</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>공지사항을 입력합니다.​</p>',NULL,'',NULL,0,'2018-06-25 19:12:25',NULL,1,X'4745',NULL,NULL,NULL),
	(6,'공지사항 테스트2','<p>공지사항</p><p>공지사항</p><p>&nbsp;</p><p><span style=\"font-size: 36pt;\">공지사항</span></p><p>&nbsp;</p>',NULL,'',NULL,0,'2018-06-25 19:14:13',NULL,1,X'4745',NULL,NULL,NULL),
	(7,'공지사항 테스트3','<p><span style=\"color: rgb(239, 0, 124); font-size: 36pt;\">공지사항 테스트</span></p>',NULL,'',NULL,0,'2018-06-25 19:14:51',NULL,1,X'4745',NULL,NULL,NULL),
	(8,'입력된 제목이 없으므로 수정하여 제목을 입력합니다.','<p>&nbsp;</p>',NULL,'',NULL,0,'2018-06-25 00:00:00',NULL,1,X'4745',NULL,NULL,NULL),
	(9,'입력된 제목이 없으므로 수정하여 제목을 입력합니다.','<p>에디터를 이용한 글이 없으므로</p><p>글을 새롭게 작성합니다.</p><p>&nbsp;</p>',NULL,'',NULL,0,'2018-06-25 00:00:00',NULL,1,X'4745',NULL,NULL,NULL),
	(10,'제목을 입력합니다. 수정','<p><span style=\"font-size: 12pt;\">공지사항을 작성합니다.</span></p><p><span style=\"font-size: 12pt;\">한줄을 개행하게 되면 어떻게 나오는지 확인을 해봅니다.</span></p><p><span style=\"font-size: 12pt;\">&nbsp;</span></p><p><span style=\"font-size: 12pt;\"></span><span style=\"font-size: 16px;\">한줄을 개행하게 되면 어떻게 나오는지 확인을 해봅니다.</span><span style=\"font-size: 12pt;\">​</span></p>',NULL,'',NULL,0,'2018-06-25 00:00:00',NULL,1,X'4745',NULL,NULL,NULL);

/*!40000 ALTER TABLE `cms_board_notice` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table cms_board_qna
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cms_board_qna`;

CREATE TABLE `cms_board_qna` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `nickname` varchar(20) CHARACTER SET utf8 NOT NULL,
  `tel` varchar(12) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `question` text CHARACTER SET utf8mb4 NOT NULL,
  `public` tinyint(1) DEFAULT '1' COMMENT '글공개여부',
  `answer` text CHARACTER SET utf8mb4,
  `registered_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '등록일',
  `answered_dt` datetime DEFAULT NULL COMMENT '답변일',
  `attached` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '첨부파일',
  `origin_attached` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '첨부파일 원본이름',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin ROW_FORMAT=COMPACT;

LOCK TABLES `cms_board_qna` WRITE;
/*!40000 ALTER TABLE `cms_board_qna` DISABLE KEYS */;

INSERT INTO `cms_board_qna` (`id`, `title`, `nickname`, `tel`, `password`, `question`, `public`, `answer`, `registered_dt`, `answered_dt`, `attached`, `origin_attached`)
VALUES
	(1,'사은품을 문의합니다.','닉네임',NULL,NULL,'사은품 문의합니다.',1,NULL,'2018-06-11 08:45:57',NULL,NULL,NULL),
	(2,'두번째 테스트 문의 공개','닉네임',NULL,NULL,'두번째 테스트 문의',1,NULL,'2018-06-11 08:49:27',NULL,NULL,NULL),
	(3,'세번째 공개 문의글을 작성합니다.','닉네임',NULL,NULL,'세번째 공개 문의글을 \r\n테스트합니다.',1,NULL,'2018-06-11 08:50:49',NULL,NULL,NULL),
	(4,'네번째 비공개 문의글을 작성합니다. (비공개글)','닉네임',NULL,'db25f2fc14cd2d2b1e7af307241f548fb03c312a','pw: qwer1234\r\n비공개 문의글을 테스트합니다.\r\n이미지는 첨부하지 않았습니다.\r\n글을 비공개로 변경합니다.',0,NULL,'2018-06-11 08:52:23',NULL,NULL,NULL),
	(5,'다섯번째 글을 입력합니다. 공개+이미지첨부','닉네임',NULL,NULL,'공개 + 이미지 첨부\r\n패스워드를 설정하지 않았어요.',1,NULL,'2018-06-11 08:56:38',NULL,NULL,NULL),
	(6,'여섯번째 시도 공개이면서 이미지를 첨부합니다.','닉네임',NULL,NULL,'여섯번째 시도 공개이면서 이미지를 첨부합니다.',1,'관리자 답변을 수정합니다.\r\n관리자의 답변\r\n관리자의 답변\r\n관리자의 답변\r\n\r\n관리자의 답변\r\n관리자의 답변\r\n관리자의 답변\r\n\r\n관리자의 답변\r\n관리자의 답변\r\n관리자의 답변\r\n\r\n관리자의 답변\r\n관리자의 답변\r\n관리자의 답변','2018-06-11 09:00:08','2018-06-11 15:33:15',NULL,NULL),
	(7,'일곱번째 시도입니다. 공개 + 이미지첨부','닉네임',NULL,NULL,'일곱번째 시도입니다. 공개 + 이미지첨부',1,NULL,'2018-06-11 09:03:39',NULL,NULL,NULL),
	(8,'여덟번째 시도 공개+이미지첨부','닉네임',NULL,NULL,'여덟번째 시도 공개+이미지첨부',1,NULL,'2018-06-11 09:14:37',NULL,'20180611_4ad1414cc25df74e0c9335675ecda47c.png','??'),
	(9,'아홉번째 시도 공개 + 첨부','닉네임',NULL,NULL,'아홉번째 시도 공개 + 첨부',1,NULL,'2018-06-11 09:16:24',NULL,'20180611_3614f86f8db2e55211a27af8b4839f3d.png','??'),
	(10,'열번째 시도 공개+첨부','닉네임',NULL,NULL,'열번째 시도 공개+첨부',1,'관리자의 답변을 달고 곧 수정을 해보기로 합니다.\r\n\r\n답변을 수정해보기로 합니다.\r\n\r\n답변을 추가로 달아 봅니다.','2018-06-11 09:17:32','2018-06-11 15:16:42','20180611_6d4ca1fb736eae4d4e262b0d4bb99608.png','ico_facebook.png'),
	(11,'열번째 시도 공개+첨부','닉네임',NULL,NULL,'열번째 시도 공개+첨부',1,'공개된 글에 관리자가 답변을 달아봅니다.','2018-06-11 09:17:54','2018-06-11 15:13:45','20180611_dfaa032c8b6d0686a3007a3f3cc418f0.png','ico_facebook.png'),
	(12,'열두번째 시도 비공개+첨부 수정 (비공개)','닉네임',NULL,'7110eda4d09e062aa5e4a390b0a572ac0d2c0220','열두번째 시도 비공개+첨부\r\npw:1234\r\n수정\r\n이미지 추가\r\n공개글\r\n비공개글로 변경함',0,NULL,'2018-06-11 09:19:25',NULL,'20180611_539c0d84663b7fd09870752da11ebe2d.png','서버당1달러과금형태로설정변경.png'),
	(13,'공개적인 문의글을 작성합니다. (비공개로 수정함.)','nickname',NULL,'db25f2fc14cd2d2b1e7af307241f548fb03c312a','공개적인 문의글을 작성합니다.\r\n글을 수정합니다.\r\n\r\n공개적인 문의글을 작성합니다.\r\n글을 수정합니다.\r\n\r\n공개적인 문의글을 작성합니다.\r\n글을 수정합니다.\r\n\r\n공개적인 문의글을 작성합니다.\r\n글을 수정합니다.\r\n\r\n공개적인 문의글을 작성합니다.\r\n글을 수정합니다.\r\n\r\n공개적인 문의글을 작성합니다.\r\n글을 수정합니다.',0,'관리자의 답변을 답니다.\r\n관리자의 답변을 답니다.\r\n관리자의 답변을 답니다.\r\n\r\n관리자의 답변을 답니다.\r\n관리자의 답변을 답니다.\r\n관리자의 답변을 답니다.\r\n\r\n관리자의 답변을 답니다.\r\n관리자의 답변을 답니다.\r\n관리자의 답변을 답니다.\r\n\r\n관리자의 답변을 답니다.\r\n관리자의 답변을 답니다.\r\n관리자의 답변을 답니다.\r\n\r\n관리자의 답변을 답니다.\r\n관리자의 답변을 답니다.\r\n관리자의 답변을 답니다.','2018-06-11 12:03:46','2018-06-11 15:12:55','20180611_8a62c887e71532e4d98ae8e21e2da3b4.png','bg_board_inquery.png'),
	(14,'새로운 글을 작성합니다. 관리자도 유저로서 글을 쓸 수가 있습니다.','관리자놀이',NULL,'db25f2fc14cd2d2b1e7af307241f548fb03c312a','pw: qwer1234\r\n관리자도 유저와 같이 글을 쓸 수가 있습니다.\r\n관리자가 글을 쓰기 위해서는 \r\n로그아웃을 해야 합니다.',0,NULL,'2018-06-11 15:18:34',NULL,'20180611_de37469660a5e8fe783b096ce8943c17.jpg','download.jpg');

/*!40000 ALTER TABLE `cms_board_qna` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table cms_customer_req
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cms_customer_req`;

CREATE TABLE `cms_customer_req` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tel` varchar(12) CHARACTER SET utf8 NOT NULL,
  `registered_dt` datetime DEFAULT CURRENT_TIMESTAMP,
  `addr` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `comment` text CHARACTER SET utf8,
  `space` enum('C','H') COLLATE utf8mb4_bin DEFAULT 'H',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin ROW_FORMAT=COMPACT;

LOCK TABLES `cms_customer_req` WRITE;
/*!40000 ALTER TABLE `cms_customer_req` DISABLE KEYS */;

INSERT INTO `cms_customer_req` (`id`, `tel`, `registered_dt`, `addr`, `comment`, `space`)
VALUES
	(1,'01000001111','2018-06-13 17:50:17',NULL,NULL,X'48'),
	(2,'010-3365-051','2018-06-28 01:22:32',NULL,NULL,X'48'),
	(3,'010-1111-222','2018-06-28 01:24:35','상계동','부엌을 좀 고치고 싶습니다.',X'48'),
	(4,'010-9999-222','2018-06-28 01:25:05','하계동','사무실 인테리어를 변경하고 싶습니다.',X'43');

/*!40000 ALTER TABLE `cms_customer_req` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table cms_member
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cms_member`;

CREATE TABLE `cms_member` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `role` enum('A','C','U') COLLATE utf8mb4_bin NOT NULL DEFAULT 'U',
  `created_dt` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`,`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin ROW_FORMAT=COMPACT;

LOCK TABLES `cms_member` WRITE;
/*!40000 ALTER TABLE `cms_member` DISABLE KEYS */;

INSERT INTO `cms_member` (`id`, `username`, `email`, `password`, `role`, `created_dt`)
VALUES
	(1,'admin','admin','7110eda4d09e062aa5e4a390b0a572ac0d2c0220',X'41','2018-06-10 08:50:56'),
	(2,'test001',NULL,'8dac20aa7da734d8ac41583a50fe59075f08ed7a',X'43','2018-06-19 12:29:57');

/*!40000 ALTER TABLE `cms_member` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
