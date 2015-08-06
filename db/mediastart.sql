/*
Navicat MySQL Data Transfer

Source Server         : Connect
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : mediastart

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2015-08-03 15:32:40
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ac_banners
-- ----------------------------
DROP TABLE IF EXISTS `ac_banners`;
CREATE TABLE `ac_banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `url_image` varchar(150) DEFAULT NULL,
  `link_image` varchar(150) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(1) DEFAULT NULL COMMENT '1 = ACTIVO\n0 = INACTIVO',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ac_banners
-- ----------------------------
INSERT INTO `ac_banners` VALUES ('6', 'Banner', '', '1403057247.jpg', 'http://local.mediastart/portfolio/video/25', '2014-06-17 21:58:35', '2014-06-18 04:07:30', '1');
INSERT INTO `ac_banners` VALUES ('7', 'Banner', '', '1403057241.jpg', '', '2014-06-18 04:06:16', '2014-06-18 04:07:22', '1');

-- ----------------------------
-- Table structure for ac_category
-- ----------------------------
DROP TABLE IF EXISTS `ac_category`;
CREATE TABLE `ac_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_parent` int(11) DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ac_category
-- ----------------------------
INSERT INTO `ac_category` VALUES ('1', '11', 'Showreel', '2014-04-15 00:00:00', null, '1');
INSERT INTO `ac_category` VALUES ('2', '11', 'Action - Sport', '2014-04-15 00:00:00', null, '1');
INSERT INTO `ac_category` VALUES ('3', '11', 'Cars', '2014-04-15 00:00:00', null, '1');
INSERT INTO `ac_category` VALUES ('4', '11', 'Comedy', '2014-04-15 00:00:00', null, '1');
INSERT INTO `ac_category` VALUES ('5', '11', 'Corporate', '2014-04-15 00:00:00', null, '1');
INSERT INTO `ac_category` VALUES ('6', '11', 'Fashion', '2014-04-15 00:00:00', null, '1');
INSERT INTO `ac_category` VALUES ('7', '11', 'Storytelling', '2014-04-15 00:00:00', null, '1');
INSERT INTO `ac_category` VALUES ('8', '11', 'Trailers', '2014-04-15 00:00:00', null, '1');
INSERT INTO `ac_category` VALUES ('9', '11', 'Music Videos', '2014-04-15 00:00:00', null, '1');
INSERT INTO `ac_category` VALUES ('10', null, 'PARTNERS', '2014-04-23 00:00:00', null, '1');
INSERT INTO `ac_category` VALUES ('11', null, 'PORTFOLIO', '2014-04-23 00:00:00', null, '1');
INSERT INTO `ac_category` VALUES ('12', '10', 'Agencies', '2014-04-23 00:00:00', null, '1');
INSERT INTO `ac_category` VALUES ('13', '10', 'Producers', '2014-04-23 00:00:00', null, '1');
INSERT INTO `ac_category` VALUES ('14', '10', 'Directors', '2014-04-23 00:00:00', null, '1');
INSERT INTO `ac_category` VALUES ('15', '10', 'Directors of Photography', '2014-04-23 00:00:00', null, '1');
INSERT INTO `ac_category` VALUES ('17', '10', 'Production Companies', '2014-04-23 00:00:00', null, '1');
INSERT INTO `ac_category` VALUES ('18', '10', 'Photographer', '2014-04-23 00:00:00', null, '1');
INSERT INTO `ac_category` VALUES ('19', '10', 'Other', '2014-04-23 00:00:00', null, '1');

-- ----------------------------
-- Table structure for ac_comments
-- ----------------------------
DROP TABLE IF EXISTS `ac_comments`;
CREATE TABLE `ac_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_post` int(11) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `comment` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ac_comments
-- ----------------------------

-- ----------------------------
-- Table structure for ac_our_teams
-- ----------------------------
DROP TABLE IF EXISTS `ac_our_teams`;
CREATE TABLE `ac_our_teams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `url_image` varchar(150) DEFAULT NULL,
  `cargo` varchar(30) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `skype` varchar(15) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ac_our_teams
-- ----------------------------
INSERT INTO `ac_our_teams` VALUES ('10', 'Luis Figuera', '1403057957.jpg', 'Cargo', '04248429422', 'milindex@gmail.com', 'milindex', '2014-06-17 22:08:25', '2014-06-18 04:31:57', '1');
INSERT INTO `ac_our_teams` VALUES ('11', 'Jesus Gaetano', '1403057979.jpg', 'Operador', '02819969365', 'jesus@gmail.com', 'jesus', '2014-06-18 04:20:00', '2014-06-18 04:31:36', '1');

-- ----------------------------
-- Table structure for ac_partners
-- ----------------------------
DROP TABLE IF EXISTS `ac_partners`;
CREATE TABLE `ac_partners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `url_image` varchar(150) DEFAULT NULL,
  `link_image` varchar(150) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ac_partners
-- ----------------------------
INSERT INTO `ac_partners` VALUES ('10', 'Patner 1', '12', '1403058168.jpg', 'http://www.google.com', '2014-06-18 04:22:49', null, '1');

-- ----------------------------
-- Table structure for ac_portfolios
-- ----------------------------
DROP TABLE IF EXISTS `ac_portfolios`;
CREATE TABLE `ac_portfolios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `url_image` varchar(100) DEFAULT NULL,
  `url_image_link` varchar(200) DEFAULT NULL,
  `url_video` varchar(150) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  `count_view` int(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_ac_portfolio_ac_category_idx` (`category_id`),
  CONSTRAINT `fk_ac_portfolio_ac_category` FOREIGN KEY (`category_id`) REFERENCES `ac_category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ac_portfolios
-- ----------------------------
INSERT INTO `ac_portfolios` VALUES ('18', '2', 'Skydive Dubai 2012', null, 'http://i.vimeocdn.com/video/418670425_640.jpg', '56703368', '2014-06-17 21:51:31', null, '1', '2');
INSERT INTO `ac_portfolios` VALUES ('19', '3', 'Skydive Dubai', null, 'http://i.vimeocdn.com/video/158584282_640.jpg', '24232824', '2014-06-17 21:51:53', null, '1', '5');
INSERT INTO `ac_portfolios` VALUES ('20', '4', 'Maktoum', null, 'http://i.vimeocdn.com/video/284402042_640.jpg', '41086299', '2014-06-17 21:52:11', null, '1', '0');
INSERT INTO `ac_portfolios` VALUES ('21', '5', 'Life style', null, 'http://i.vimeocdn.com/video/440755320_640.jpg', '68432753', '2014-06-17 21:52:40', null, '1', '1');
INSERT INTO `ac_portfolios` VALUES ('22', '6', 'My first Sky Dive from 13,000 Ft', null, 'http://i.vimeocdn.com/video/238308801_640.jpg', '34923373', '2014-06-17 21:53:02', null, '1', '0');
INSERT INTO `ac_portfolios` VALUES ('23', '7', 'Skydive Dubai', null, 'http://i.vimeocdn.com/video/394237282_640.jpg', '56890516', '2014-06-17 21:53:30', null, '1', '0');
INSERT INTO `ac_portfolios` VALUES ('24', '8', 'Skydive Dubai Pro', null, 'http://i.vimeocdn.com/video/233485274_640.jpg', '34301494', '2014-06-17 21:53:58', null, '1', '0');
INSERT INTO `ac_portfolios` VALUES ('25', '9', 'Dubai Winter Festival', null, 'http://i.vimeocdn.com/video/462420451_640.jpg', '85181096', '2014-06-17 21:54:24', '2014-06-17 21:57:31', '1', '5');
INSERT INTO `ac_portfolios` VALUES ('27', '2', 'My short vacation at Skydive Dubai ', null, 'http://i.vimeocdn.com/video/442689053_640.jpg', '69765068', '2014-06-17 22:00:44', null, '1', '4');
INSERT INTO `ac_portfolios` VALUES ('28', '3', 'Dubai Winter Festival', null, 'http://i.vimeocdn.com/video/461642800_640.jpg', '84677330', '2014-06-17 22:01:01', null, '1', '1');
INSERT INTO `ac_portfolios` VALUES ('29', '3', 'Skydive Dubai Winter Festival 2014', null, 'http://i.vimeocdn.com/video/459856988_640.jpg', '83393276', '2014-06-17 22:01:29', null, '1', '6');
INSERT INTO `ac_portfolios` VALUES ('30', '4', 'The Official Skydive Dubai', null, 'http://i.vimeocdn.com/video/93284316_640.jpg', '15476940', '2014-06-17 22:01:57', null, '1', '0');
INSERT INTO `ac_portfolios` VALUES ('31', '5', 'Dubai Reloaded', null, 'http://i.vimeocdn.com/video/435161006_640.jpg', '64484936', '2014-06-17 22:02:12', null, '1', '0');
INSERT INTO `ac_portfolios` VALUES ('32', '6', 'Skydive Dubai', null, 'http://i.vimeocdn.com/video/289590679_640.jpg', '41777389', '2014-06-17 22:02:27', null, '1', '0');
INSERT INTO `ac_portfolios` VALUES ('33', '6', 'Jumping the Palm', null, 'http://i.vimeocdn.com/video/308251524_640.jpg', '44374657', '2014-06-17 22:02:45', '2014-06-17 22:02:53', '1', '0');
INSERT INTO `ac_portfolios` VALUES ('34', '7', 'Dubai Motion', null, 'http://i.vimeocdn.com/video/459537692_640.jpg', '83036364', '2014-06-17 22:03:30', null, '1', '0');
INSERT INTO `ac_portfolios` VALUES ('35', '8', 'Project XRW Dubai', null, 'http://i.vimeocdn.com/video/283378147_640.jpg', '40949781', '2014-06-17 22:04:02', null, '1', '0');
INSERT INTO `ac_portfolios` VALUES ('36', '9', 'Skydive Dubai Markus', null, 'http://i.vimeocdn.com/video/403135118_640.jpg', '58107184', '2014-06-17 22:04:24', null, '1', '1');

-- ----------------------------
-- Table structure for ac_posts
-- ----------------------------
DROP TABLE IF EXISTS `ac_posts`;
CREATE TABLE `ac_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_type` varchar(20) DEFAULT NULL COMMENT 'page\npost',
  `title` varchar(100) DEFAULT NULL,
  `content` longtext,
  `url_image` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  `content_1` longtext,
  `content_2` longtext,
  `content_3` longtext,
  `content_4` longtext,
  `content_5` longtext,
  `content_6` longtext,
  `content_7` longtext,
  `content_8` longtext,
  `content_9` longtext,
  `title_1` varchar(100) DEFAULT NULL,
  `title_2` varchar(100) DEFAULT NULL,
  `title_3` varchar(100) DEFAULT NULL,
  `title_4` varchar(100) DEFAULT NULL,
  `title_5` varchar(100) DEFAULT NULL,
  `title_6` varchar(100) DEFAULT NULL,
  `title_7` varchar(100) DEFAULT NULL,
  `title_8` varchar(100) DEFAULT NULL,
  `title_9` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ac_posts
-- ----------------------------
INSERT INTO `ac_posts` VALUES ('9', 'page-about', 'What we do', 'Content What we do, What we do (US)   ', '1403057462.jpg', '2014-04-15 00:00:00', '2014-06-18 04:11:04', '1', ' ESPAÑOL <b>negrita</b>', ' FRANÇAIS   ', ' DEUTSCH   ', ' ITALIANO   ', ' PORTUGUÊS   ', 'РУССКИЙ Ruso', '简体中文Chino', 'العربية arabe ', '日本語 Japones<br>', 'What we do (ES)', 'What we do (FRANÇAIS)', 'What we do (DEUTSCH)', 'What we do (ITALIANO)', 'What we do (PORTUGUÊS)', 'What we do (РУССКИЙ)', 'What we do (简体中文)', 'What we do (العربية)', 'What we do (日本語)');
INSERT INTO `ac_posts` VALUES ('10', 'page-about', 'How we do it', 'content How we do it, (US)  ', '1403057472.jpg', '2014-04-15 00:00:00', '2014-06-18 04:11:15', '1', ' ESPAÑOL  ', ' FRANÇAIS  ', ' DEUTSCH  ', ' ITALIANO  ', ' PORTUGUÊS  ', 'РУССКИЙ  ', '简体中文  ', 'العربية  ', '日本語', 'How we do it ( ESPAÑOL)', 'How we do it (FRANÇAIS)', 'How we do it (DEUTSCH)', 'How we do it (ITALIANO)', 'How we do it ( PORTUGUÊS)', 'How we do it (РУССКИЙ )', 'How we do it (简体中文)', 'How we do it (العربية)', 'How we do it (日本語)');
INSERT INTO `ac_posts` VALUES ('11', 'page', 'Pymes', 'Lorem <span style=\"font-weight: bold;\">Ipsum</span> es simplemente el texto de relleno de las imprentas y archivos de texto de relleno estándarpara paginas web. <br />\r\n', '1403057601.jpg', '2014-04-15 00:00:00', '2014-06-18 04:13:22', '1', '', '', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ac_posts` VALUES ('12', 'page', 'POPULAR', 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto de relleno estándarpara paginas web... ', '1403057587.jpg', '2014-04-15 00:00:00', '2014-06-18 04:13:08', '1', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ac_posts` VALUES ('17', 'post', 'Lorem Ipsum is simply dummy text ', '\r\n<p><span style=\"font-weight: bold;\">Lorem Ipsum</span> is simply dummy text of the printing and \r\ntypesetting industry. Lorem Ipsum has been the industry\'s standard dummy\r\n text ever since the 1500s, when an unknown printer took a galley of \r\ntype and scrambled.</p>\r\n<p>&nbsp;It to make a type specimen book. It has survived not \r\nonly five centuries, but also the leap into electronic typesetting, \r\nremaining essentially unchanged. It was popularised in the 1960s with \r\nthe release of Letraset sheets containing Lorem Ipsum passages, and more\r\n recently with desktop publishing software like Aldus PageMaker \r\nincluding versions of Lorem Ipsum.</p>\r\n<p></p>\r\n<p><span style=\"font-weight: bold;\">Lorem Ipsum</span> is simply dummy text of the printing and \r\ntypesetting industry. Lorem Ipsum has been the industry\'s standard dummy\r\n text ever since the 1500s, when an unknown printer took a galley of \r\ntype and scrambled.</p>\r\n<p>&nbsp;It to make a type specimen book. It has survived not \r\nonly five centuries, but also the leap into electronic typesetting, \r\nremaining essentially unchanged. It was popularised in the 1960s with \r\nthe release of Letraset sheets containing Lorem Ipsum passages, and more\r\n recently with desktop publishing software like Aldus PageMaker \r\nincluding versions of Lorem Ipsum.</p>\r\n<p>&nbsp;</p>', '1403057359.jpg', '2014-06-17 19:47:26', '2014-06-18 04:09:20', '1', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ac_posts` VALUES ('18', 'post', 'Lorem Ipsum is simply dummy text 1', '\r\n<p><span style=\"font-weight: bold;\"></span></p>\r\n<p><span style=\"font-weight: bold;\">Lorem Ipsum</span> is simply dummy text of the printing and \r\ntypesetting industry. Lorem Ipsum has been the industry\'s standard dummy\r\n text ever since the 1500s, when an unknown printer took a galley of \r\ntype and scrambled it to make a type specimen book. It has survived not \r\nonly five centuries, but also the leap into electronic typesetting, \r\nremaining essentially unchanged.</p>\r\n<p>&nbsp;It was popularised in the 1960s with \r\nthe release of Letraset sheets containing Lorem Ipsum passages, and more\r\n recently with desktop publishing software like Aldus PageMaker \r\nincluding versions of Lorem Ipsum.</p>\r\n<p><span style=\"font-weight: bold;\">Lorem Ipsum</span> is simply dummy text of the printing and \r\ntypesetting industry. Lorem Ipsum has been the industry\'s standard dummy\r\n text ever since the 1500s, when an unknown printer took a galley of \r\ntype and scrambled it to make a type specimen book. It has survived not \r\nonly five centuries, but also the leap into electronic typesetting, \r\nremaining essentially unchanged.</p>\r\n<p>&nbsp;It was popularised in the 1960s with \r\nthe release of Letraset sheets containing Lorem Ipsum passages, and more\r\n recently with desktop publishing software like Aldus PageMaker \r\nincluding versions of Lorem Ipsum.</p><br />\r\n', '1403057350.jpg', '2014-06-17 19:51:06', '2014-06-18 04:09:12', '1', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `ac_posts` VALUES ('19', 'post', 'Lorem Ipsum is simply dummy text 2', '\r\n<p><span style=\"font-weight: bold;\">Lorem Ipsum</span> is simply dummy text of the printing and \r\ntypesetting industry. Lorem Ipsum has been the industry\'s standard dummy\r\n text ever since the 1500s, when an unknown printer took a galley of \r\ntype and scrambled.</p>\r\n<p>&nbsp;It to make a type specimen book. It has survived not \r\nonly five centuries, but also the leap into electronic typesetting, \r\nremaining essentially unchanged. It was popularised in the 1960s with \r\nthe release of Letraset sheets containing Lorem Ipsum passages, and more\r\n recently with desktop publishing software like Aldus PageMaker \r\nincluding versions of Lorem Ipsum.</p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"font-weight: bold;\">Lorem Ipsum</span> is simply dummy text of the printing and \r\ntypesetting industry. Lorem Ipsum has been the industry\'s standard dummy\r\n text ever since the 1500s, when an unknown printer took a galley of \r\ntype and scrambled.</p>\r\n<p>&nbsp;It to make a type specimen book. It has survived not \r\nonly five centuries, but also the leap into electronic typesetting, \r\nremaining essentially unchanged. It was popularised in the 1960s with \r\nthe release of Letraset sheets containing Lorem Ipsum passages, and more\r\n recently with desktop publishing software like Aldus PageMaker \r\nincluding versions of Lorem Ipsum.</p>\r\n<p>&nbsp;</p>', '1403057342.jpg', '2014-06-17 19:51:44', '2014-06-18 04:09:04', '1', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for ac_users
-- ----------------------------
DROP TABLE IF EXISTS `ac_users`;
CREATE TABLE `ac_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `user_name` varchar(30) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ac_users
-- ----------------------------
INSERT INTO `ac_users` VALUES ('1', 'luis', 'luis', '1051a9098103f697df0cfbcb507b2c10', '1@1.com', '2014-04-18 00:00:00', '2014-04-18 00:00:00', '1');

-- ----------------------------
-- Table structure for ac_works
-- ----------------------------
DROP TABLE IF EXISTS `ac_works`;
CREATE TABLE `ac_works` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `enlace` varchar(255) DEFAULT NULL,
  `description` text,
  `url_image` varchar(150) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ac_works
-- ----------------------------
INSERT INTO `ac_works` VALUES ('14', 'Title Company', 'http://www.google.com', 'Relleno estándar de las industrias.', '1403057778.jpg', '2014-06-18 03:09:28', '2014-07-04 04:53:42', '1');
INSERT INTO `ac_works` VALUES ('17', 'Relleno estándar de las industrias', 'http://local.mediastart/portfolio/video/36', 'Relleno estándar de las industrias', '1404442451.jpg', '2014-07-04 04:54:12', '2014-07-04 04:57:36', '1');

-- ----------------------------
-- Table structure for ci_sessions
-- ----------------------------
DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ci_sessions
-- ----------------------------
