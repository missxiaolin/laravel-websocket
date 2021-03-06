# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.7.18)
# Database: live
# Generation Time: 2018-05-12 08:48:19 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table live_chart
# ------------------------------------------------------------

DROP TABLE IF EXISTS `live_chart`;

CREATE TABLE `live_chart` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `game_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '比赛id',
  `user_id` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '用户id',
  `content` varchar(200) NOT NULL DEFAULT '' COMMENT '内容',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '状态',
  `create_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table live_game
# ------------------------------------------------------------

DROP TABLE IF EXISTS `live_game`;

CREATE TABLE `live_game` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `a_id` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '球队id',
  `b_id` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '球队id',
  `a_score` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '球队比分',
  `b_score` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '球队比分',
  `narrator` varchar(20) NOT NULL DEFAULT '' COMMENT '直播员',
  `image` varchar(20) NOT NULL DEFAULT '' COMMENT '图片',
  `start_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '直播开始时间',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否开始',
  `create_time` datetime NOT NULL,
  `update_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table live_outs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `live_outs`;

CREATE TABLE `live_outs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `game_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '直播id',
  `team_id` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '球队id',
  `content` varchar(200) NOT NULL DEFAULT '' COMMENT '内容',
  `image` varchar(20) NOT NULL DEFAULT '' COMMENT '图片',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '状态',
  `create_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table live_player
# ------------------------------------------------------------

DROP TABLE IF EXISTS `live_player`;

CREATE TABLE `live_player` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL DEFAULT '' COMMENT '球员名称',
  `image` varchar(20) NOT NULL DEFAULT '' COMMENT '球员图像',
  `age` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '球员年龄',
  `position` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '编号',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否显示',
  `create_time` datetime NOT NULL,
  `update_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table live_team
# ------------------------------------------------------------

DROP TABLE IF EXISTS `live_team`;

CREATE TABLE `live_team` (
  `id` tinyint(1) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL DEFAULT '' COMMENT '球队名称',
  `image` varchar(20) NOT NULL DEFAULT '' COMMENT '球队Logo图片',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '球队分区',
  `create_time` datetime NOT NULL,
  `update_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '姓名',
  `phone` char(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '手机号',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '密码',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `username`, `phone`, `password`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'xiaolin','17135501103','$2y$10$2hXBLQsn.2yEuqQCmHaa6ecQYjXUJaMhZ8uCM.xT1ClBCnuuUchyu','','2018-04-12 22:20:48','2018-04-12 22:20:48'),
	(2,'xiaobei','17135501104','$2y$10$2hXBLQsn.2yEuqQCmHaa6ecQYjXUJaMhZ8uCM.xT1ClBCnuuUchyu','','2018-04-12 22:20:48','2018-04-12 22:20:48');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
