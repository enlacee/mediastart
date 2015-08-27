-- Adminer 4.2.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `mediastart` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `mediastart`;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `ac_banners` (`id`, `title`, `description`, `url_image`, `link_image`, `created_at`, `updated_at`, `status`) VALUES
(6,	'Banner',	'',	'image.jpg',	'http://local.mediastart/portfolio/video/25',	'2014-06-17 21:58:35',	'2015-08-20 00:25:13',	1),
(7,	'Banner',	'',	'image.jpg',	'',	'2014-06-18 04:06:16',	'2015-08-20 00:30:16',	1),
(8,	'new category 01',	'0',	'image.jpg',	'0',	'2015-08-21 00:35:59',	NULL,	1);

DROP TABLE IF EXISTS `ac_category`;
CREATE TABLE `ac_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_parent` int(11) DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `ac_category` (`id`, `id_parent`, `name`, `created_at`, `updated_at`, `status`) VALUES
(1,	11,	'Showreel',	'2014-04-15 00:00:00',	NULL,	1),
(2,	11,	'Action - Sport',	'2014-04-15 00:00:00',	NULL,	1),
(3,	11,	'Cars',	'2014-04-15 00:00:00',	NULL,	1),
(4,	11,	'Comedy',	'2014-04-15 00:00:00',	NULL,	1),
(5,	11,	'Corporate',	'2014-04-15 00:00:00',	NULL,	1),
(6,	11,	'Fashion',	'2014-04-15 00:00:00',	NULL,	1),
(7,	11,	'Storytelling',	'2014-04-15 00:00:00',	NULL,	1),
(8,	11,	'Trailers',	'2014-04-15 00:00:00',	NULL,	1),
(9,	11,	'Music Videos',	'2014-04-15 00:00:00',	NULL,	1),
(10,	NULL,	'PARTNERS',	'2014-04-23 00:00:00',	NULL,	1),
(11,	NULL,	'PORTFOLIO',	'2014-04-23 00:00:00',	NULL,	1),
(12,	10,	'Agencies',	'2014-04-23 00:00:00',	NULL,	1),
(13,	10,	'Producers',	'2014-04-23 00:00:00',	NULL,	1),
(14,	10,	'Directors',	'2014-04-23 00:00:00',	NULL,	1),
(15,	10,	'Directors of Photography',	'2014-04-23 00:00:00',	NULL,	1),
(17,	10,	'Production Companies',	'2014-04-23 00:00:00',	NULL,	1),
(18,	10,	'Photographer',	'2014-04-23 00:00:00',	NULL,	1),
(19,	10,	'Other',	'2014-04-23 00:00:00',	NULL,	1),
(20,	NULL,	'SOCIAL',	NULL,	NULL,	1),
(23,	20,	'facebook',	NULL,	NULL,	1),
(24,	20,	'youtube',	NULL,	NULL,	1),
(25,	20,	'twitter',	NULL,	NULL,	1),
(26,	20,	'instagram',	NULL,	NULL,	1),
(27,	11,	'a1',	NULL,	NULL,	1),
(29,	11,	'new category 02',	'2015-08-21 00:49:21',	'2015-08-21 01:47:45',	1);

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


DROP TABLE IF EXISTS `ac_our_teams`;
CREATE TABLE `ac_our_teams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `additional` varchar(50) DEFAULT NULL,
  `url_image` varchar(150) DEFAULT NULL,
  `cargo` varchar(30) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `skype` varchar(15) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `ac_our_teams` (`id`, `name`, `additional`, `url_image`, `cargo`, `phone`, `email`, `skype`, `created_at`, `updated_at`, `status`) VALUES
(10,	'Luis Figuera',	NULL,	'1403057957.jpg',	'Cargo',	'04248429422',	'milindex@gmail.com',	'milindex',	'2014-06-17 22:08:25',	'2014-06-18 04:31:57',	1),
(11,	'Jesus Gaetano',	NULL,	'1403057979.jpg',	'Operador',	'02819969365',	'jesus@gmail.com',	'jesus',	'2014-06-18 04:20:00',	'2014-06-18 04:31:36',	1),
(12,	'pepe',	'Recurso Humanos',	'image.jpg',	'CONTABILIDAD',	'97841289',	'peperios100@hotmail.com',	'pepe12',	'2015-08-20 02:11:52',	NULL,	1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `ac_partners` (`id`, `name`, `category_id`, `url_image`, `link_image`, `created_at`, `updated_at`, `status`) VALUES
(10,	'Patner 1',	12,	'1403058168.jpg',	'http://www.google.com',	'2014-06-18 04:22:49',	NULL,	1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `ac_portfolios` (`id`, `category_id`, `title`, `url_image`, `url_image_link`, `url_video`, `created_at`, `updated_at`, `status`, `count_view`) VALUES
(18,	2,	'Skydive Dubai 2012',	NULL,	'http://i.vimeocdn.com/video/418670425_640.jpg',	'56703368',	'2014-06-17 21:51:31',	NULL,	1,	2),
(19,	3,	'Skydive Dubai',	NULL,	'http://i.vimeocdn.com/video/158584282_640.jpg',	'24232824',	'2014-06-17 21:51:53',	NULL,	1,	5),
(20,	4,	'Maktoum',	NULL,	'http://i.vimeocdn.com/video/284402042_640.jpg',	'41086299',	'2014-06-17 21:52:11',	NULL,	1,	0),
(21,	5,	'Life style',	NULL,	'http://i.vimeocdn.com/video/440755320_640.jpg',	'68432753',	'2014-06-17 21:52:40',	NULL,	1,	1),
(22,	6,	'My first Sky Dive from 13,000 Ft',	NULL,	'http://i.vimeocdn.com/video/238308801_640.jpg',	'34923373',	'2014-06-17 21:53:02',	NULL,	1,	0),
(23,	7,	'Skydive Dubai',	NULL,	'http://i.vimeocdn.com/video/394237282_640.jpg',	'56890516',	'2014-06-17 21:53:30',	NULL,	1,	0),
(24,	8,	'Skydive Dubai Pro',	NULL,	'http://i.vimeocdn.com/video/233485274_640.jpg',	'34301494',	'2014-06-17 21:53:58',	NULL,	1,	0),
(25,	9,	'Dubai Winter Festival',	NULL,	'http://i.vimeocdn.com/video/462420451_640.jpg',	'85181096',	'2014-06-17 21:54:24',	'2014-06-17 21:57:31',	1,	5),
(27,	2,	'My short vacation at Skydive Dubai ',	NULL,	'http://i.vimeocdn.com/video/442689053_640.jpg',	'69765068',	'2014-06-17 22:00:44',	NULL,	1,	4),
(28,	3,	'Dubai Winter Festival',	NULL,	'http://i.vimeocdn.com/video/461642800_640.jpg',	'84677330',	'2014-06-17 22:01:01',	NULL,	1,	1),
(29,	3,	'Skydive Dubai Winter Festival 2014',	NULL,	'http://i.vimeocdn.com/video/459856988_640.jpg',	'83393276',	'2014-06-17 22:01:29',	NULL,	1,	6),
(30,	4,	'The Official Skydive Dubai',	NULL,	'http://i.vimeocdn.com/video/93284316_640.jpg',	'15476940',	'2014-06-17 22:01:57',	NULL,	1,	0),
(31,	5,	'Dubai Reloaded',	NULL,	'http://i.vimeocdn.com/video/435161006_640.jpg',	'64484936',	'2014-06-17 22:02:12',	NULL,	1,	0),
(32,	6,	'Skydive Dubai',	NULL,	'http://i.vimeocdn.com/video/289590679_640.jpg',	'41777389',	'2014-06-17 22:02:27',	NULL,	1,	0),
(33,	6,	'Jumping the Palm',	NULL,	'http://i.vimeocdn.com/video/308251524_640.jpg',	'44374657',	'2014-06-17 22:02:45',	'2014-06-17 22:02:53',	1,	0),
(34,	7,	'Dubai Motion',	NULL,	'http://i.vimeocdn.com/video/459537692_640.jpg',	'83036364',	'2014-06-17 22:03:30',	NULL,	1,	0),
(35,	8,	'Project XRW Dubai',	NULL,	'http://i.vimeocdn.com/video/283378147_640.jpg',	'40949781',	'2014-06-17 22:04:02',	NULL,	1,	0),
(36,	9,	'Skydive Dubai Markus',	'',	'http://i.vimeocdn.com/video/403135118_640.jpg',	'58107184',	'2014-06-17 22:04:24',	'2015-08-11 05:58:05',	1,	1),
(37,	2,	'portfolio 09',	NULL,	'',	'',	'2015-08-11 06:00:38',	NULL,	1,	0),
(38,	2,	'portfolio 10',	NULL,	'',	'',	'2015-08-11 06:02:28',	NULL,	1,	0),
(40,	2,	'p 10',	'',	'http://i.vimeocdn.com/video/458164484_640.jpg',	'81244498',	'2015-08-11 06:09:26',	'2015-08-11 06:36:54',	1,	4),
(41,	6,	'lucecitas',	'http://programacasasegura.org/imagens/mx/wp-content/uploads/2012/12/Lucesitas.jpg',	'',	'',	'2015-08-26 22:58:25',	'2015-08-26 23:34:47',	1,	20);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `ac_posts` (`id`, `post_type`, `title`, `content`, `url_image`, `created_at`, `updated_at`, `status`, `content_1`, `content_2`, `content_3`, `content_4`, `content_5`, `content_6`, `content_7`, `content_8`, `content_9`, `title_1`, `title_2`, `title_3`, `title_4`, `title_5`, `title_6`, `title_7`, `title_8`, `title_9`) VALUES
(9,	'page-about',	'What we do',	'Content What we do, What we do (US)   ',	'1403057462.jpg',	'2014-04-15 00:00:00',	'2014-06-18 04:11:04',	1,	' ESPAÑOL <b>negrita</b>',	' FRANÇAIS   ',	' DEUTSCH   ',	' ITALIANO   ',	' PORTUGUÊS   ',	'РУССКИЙ Ruso',	'简体中文Chino',	'العربية arabe ',	'日本語 Japones<br>',	'What we do (ES)',	'What we do (FRANÇAIS)',	'What we do (DEUTSCH)',	'What we do (ITALIANO)',	'What we do (PORTUGUÊS)',	'What we do (РУССКИЙ)',	'What we do (简体中文)',	'What we do (العربية)',	'What we do (日本語)'),
(10,	'page-about',	'How we do it',	'content How we do it, (US)  ',	'1403057472.jpg',	'2014-04-15 00:00:00',	'2014-06-18 04:11:15',	1,	' ESPAÑOL  ',	' FRANÇAIS  ',	' DEUTSCH  ',	' ITALIANO  ',	' PORTUGUÊS  ',	'РУССКИЙ  ',	'简体中文  ',	'العربية  ',	'日本語',	'How we do it ( ESPAÑOL)',	'How we do it (FRANÇAIS)',	'How we do it (DEUTSCH)',	'How we do it (ITALIANO)',	'How we do it ( PORTUGUÊS)',	'How we do it (РУССКИЙ )',	'How we do it (简体中文)',	'How we do it (العربية)',	'How we do it (日本語)'),
(11,	'page',	'Pymes',	'Lorem <span style=\"font-weight: bold;\">Ipsum</span> es simplemente el texto de relleno de las imprentas y archivos de texto de relleno estándarpara paginas web. <br />\r\n',	'1403057601.jpg',	'2014-04-15 00:00:00',	'2014-06-18 04:13:22',	1,	'',	'',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL),
(12,	'page',	'POPULAR',	'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto de relleno estándarpara paginas web... ',	'1403057587.jpg',	'2014-04-15 00:00:00',	'2014-06-18 04:13:08',	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL),
(17,	'post',	'Lorem Ipsum is simply dummy text ',	'\r\n<p><span style=\"font-weight: bold;\">Lorem Ipsum</span> is simply dummy text of the printing and \r\ntypesetting industry. Lorem Ipsum has been the industry\'s standard dummy\r\n text ever since the 1500s, when an unknown printer took a galley of \r\ntype and scrambled.</p>\r\n<p>&nbsp;It to make a type specimen book. It has survived not \r\nonly five centuries, but also the leap into electronic typesetting, \r\nremaining essentially unchanged. It was popularised in the 1960s with \r\nthe release of Letraset sheets containing Lorem Ipsum passages, and more\r\n recently with desktop publishing software like Aldus PageMaker \r\nincluding versions of Lorem Ipsum.</p>\r\n<p></p>\r\n<p><span style=\"font-weight: bold;\">Lorem Ipsum</span> is simply dummy text of the printing and \r\ntypesetting industry. Lorem Ipsum has been the industry\'s standard dummy\r\n text ever since the 1500s, when an unknown printer took a galley of \r\ntype and scrambled.</p>\r\n<p>&nbsp;It to make a type specimen book. It has survived not \r\nonly five centuries, but also the leap into electronic typesetting, \r\nremaining essentially unchanged. It was popularised in the 1960s with \r\nthe release of Letraset sheets containing Lorem Ipsum passages, and more\r\n recently with desktop publishing software like Aldus PageMaker \r\nincluding versions of Lorem Ipsum.</p>\r\n<p>&nbsp;</p>',	'1403057359.jpg',	'2014-06-17 19:47:26',	'2014-06-18 04:09:20',	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL),
(18,	'post',	'Lorem Ipsum is simply dummy text 1',	'\r\n<p><span style=\"font-weight: bold;\"></span></p>\r\n<p><span style=\"font-weight: bold;\">Lorem Ipsum</span> is simply dummy text of the printing and \r\ntypesetting industry. Lorem Ipsum has been the industry\'s standard dummy\r\n text ever since the 1500s, when an unknown printer took a galley of \r\ntype and scrambled it to make a type specimen book. It has survived not \r\nonly five centuries, but also the leap into electronic typesetting, \r\nremaining essentially unchanged.</p>\r\n<p>&nbsp;It was popularised in the 1960s with \r\nthe release of Letraset sheets containing Lorem Ipsum passages, and more\r\n recently with desktop publishing software like Aldus PageMaker \r\nincluding versions of Lorem Ipsum.</p>\r\n<p><span style=\"font-weight: bold;\">Lorem Ipsum</span> is simply dummy text of the printing and \r\ntypesetting industry. Lorem Ipsum has been the industry\'s standard dummy\r\n text ever since the 1500s, when an unknown printer took a galley of \r\ntype and scrambled it to make a type specimen book. It has survived not \r\nonly five centuries, but also the leap into electronic typesetting, \r\nremaining essentially unchanged.</p>\r\n<p>&nbsp;It was popularised in the 1960s with \r\nthe release of Letraset sheets containing Lorem Ipsum passages, and more\r\n recently with desktop publishing software like Aldus PageMaker \r\nincluding versions of Lorem Ipsum.</p><br />\r\n',	'1403057350.jpg',	'2014-06-17 19:51:06',	'2014-06-18 04:09:12',	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL),
(19,	'post',	'Lorem Ipsum is simply dummy text 2',	'\r\n<p><span style=\"font-weight: bold;\">Lorem Ipsum</span> is simply dummy text of the printing and \r\ntypesetting industry. Lorem Ipsum has been the industry\'s standard dummy\r\n text ever since the 1500s, when an unknown printer took a galley of \r\ntype and scrambled.</p>\r\n<p>&nbsp;It to make a type specimen book. It has survived not \r\nonly five centuries, but also the leap into electronic typesetting, \r\nremaining essentially unchanged. It was popularised in the 1960s with \r\nthe release of Letraset sheets containing Lorem Ipsum passages, and more\r\n recently with desktop publishing software like Aldus PageMaker \r\nincluding versions of Lorem Ipsum.</p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"font-weight: bold;\">Lorem Ipsum</span> is simply dummy text of the printing and \r\ntypesetting industry. Lorem Ipsum has been the industry\'s standard dummy\r\n text ever since the 1500s, when an unknown printer took a galley of \r\ntype and scrambled.</p>\r\n<p>&nbsp;It to make a type specimen book. It has survived not \r\nonly five centuries, but also the leap into electronic typesetting, \r\nremaining essentially unchanged. It was popularised in the 1960s with \r\nthe release of Letraset sheets containing Lorem Ipsum passages, and more\r\n recently with desktop publishing software like Aldus PageMaker \r\nincluding versions of Lorem Ipsum.</p>\r\n<p>&nbsp;</p>',	'1403057342.jpg',	'2014-06-17 19:51:44',	'2014-06-18 04:09:04',	1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL);

DROP TABLE IF EXISTS `ac_socials`;
CREATE TABLE `ac_socials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `url_image` varchar(150) DEFAULT NULL,
  `link_image` varchar(150) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `ac_socials` (`id`, `name`, `category_id`, `url_image`, `link_image`, `created_at`, `updated_at`, `status`) VALUES
(10,	'charla informativa sabado 27',	12,	'1403058168.jpg',	'http://www.google.com',	'2014-06-18 04:22:49',	NULL,	1),
(11,	'social facebook',	23,	'1440048649.jpg',	'https://www.youtube.com/watch?v=uuwfgXD8qV8',	'2015-08-19 23:16:29',	'2015-08-20 00:30:51',	1),
(12,	'red social facebook 2',	23,	'1440048660.png',	'https://www.duolingo.com/',	'2015-08-19 23:52:04',	'2015-08-20 00:31:02',	1),
(13,	'convocatoria para twitter',	25,	'1440048669.png',	'http://stackoverflow.com/',	'2015-08-20 00:19:44',	'2015-08-20 00:31:11',	1),
(14,	'red instagram',	26,	'1440048720.jpg',	'https://ellislab.com/codeigniter/user-guide/general/profiling.html',	'2015-08-20 00:32:15',	NULL,	1),
(15,	'new content social',	23,	'1440052994.jpg',	'https://www.duolingo.com/',	'2015-08-20 01:43:32',	NULL,	1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `ac_users` (`id`, `name`, `user_name`, `password`, `email`, `created_at`, `updated_at`, `status`) VALUES
(1,	'luis',	'luis',	'e10adc3949ba59abbe56e057f20f883e',	'1@1.com',	'2014-04-18 00:00:00',	'2014-04-18 00:00:00',	1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `ac_works` (`id`, `title`, `enlace`, `description`, `url_image`, `created_at`, `updated_at`, `status`) VALUES
(14,	'Title Company',	'http://www.google.com',	'Relleno estándar de las industrias. ',	'1440130176.jpg',	'2014-06-18 03:09:28',	'2015-08-20 23:09:39',	1),
(17,	'Relleno estándar de las industrias',	'http://local.mediastart/portfolio/video/36',	'Relleno estándar de las industrias ',	'1440130160.jpg',	'2014-07-04 04:54:12',	'2015-08-20 23:09:23',	1),
(18,	'inmobiliaria roal',	'https://www.video2brain.com/mx/soluciones/centros-educativos',	'tiny description',	'1440130449.jpg',	'2015-08-20 23:14:20',	NULL,	1),
(19,	'inmobiliaria roal t1',	'https://www.video2brain.com',	'<span style=\"color: rgb(68, 68, 68); font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 18.5714302062988px; background-color: rgb(249, 249, 249);\">inmobiliaria roal t1</span>\n',	'1440130515.jpg',	'2015-08-20 23:15:17',	NULL,	1),
(20,	'girasol 2.0',	'https://www.video2brain.com',	'\n',	'1440130523.jpg',	'2015-08-20 23:15:45',	NULL,	1);

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

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('fa3a9f475311b5032d5bda6acf275ad7',	'127.0.0.1',	'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.155 Safari/537.36',	1440651943,	'a:4:{s:9:\"user_data\";s:0:\"\";s:5:\"token\";s:32:\"78369d67411e5494771ee826086401f6\";s:5:\"admin\";a:8:{s:2:\"id\";s:1:\"1\";s:4:\"name\";s:4:\"luis\";s:9:\"user_name\";s:4:\"luis\";s:8:\"password\";s:32:\"e10adc3949ba59abbe56e057f20f883e\";s:5:\"email\";s:7:\"1@1.com\";s:10:\"created_at\";s:19:\"2014-04-18 00:00:00\";s:10:\"updated_at\";s:19:\"2014-04-18 00:00:00\";s:6:\"status\";s:1:\"1\";}s:9:\"portfolio\";s:0:\"\";}');

-- 2015-08-27 05:15:08
