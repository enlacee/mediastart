CREATE DATABASE  IF NOT EXISTS `free_mediastart` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `free_mediastart`;
-- MySQL dump 10.13  Distrib 5.5.37, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: free_mediastart
-- ------------------------------------------------------
-- Server version	5.5.37-0ubuntu0.13.10.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `ac_banners`
--

DROP TABLE IF EXISTS `ac_banners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ac_banners`
--

LOCK TABLES `ac_banners` WRITE;
/*!40000 ALTER TABLE `ac_banners` DISABLE KEYS */;
INSERT INTO `ac_banners` VALUES (1,'uno','','image.jpg','http://www.uno.com','2014-04-14 00:00:00','2014-04-26 06:33:05',1),(2,'title 1','title 1','image.jpg','http://www.google.com','2014-04-14 00:00:00','2014-04-24 07:30:16',0),(3,'comcast',NULL,'image.jpg','http://www.comcast.com','2014-04-14 00:00:00','2014-04-14 00:00:00',1),(4,'k-net',NULL,'image.jpg','http://www.k-net.com','2014-04-14 00:00:00','2014-04-14 00:00:00',1),(5,'brightcove',NULL,'image.jpg','http://www.brightcove.com','2014-04-14 00:00:00','2014-04-14 00:00:00',1),(6,'intel',NULL,'image.jpg','http://www.intel.com','2014-04-14 00:00:00','2014-04-14 00:00:00',1);
/*!40000 ALTER TABLE `ac_banners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ac_cargos`
--

DROP TABLE IF EXISTS `ac_cargos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ac_cargos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ac_cargos`
--

LOCK TABLES `ac_cargos` WRITE;
/*!40000 ALTER TABLE `ac_cargos` DISABLE KEYS */;
INSERT INTO `ac_cargos` VALUES (1,'SOPORT'),(2,'CARGO1'),(3,'CARGO2'),(4,'CARGO3');
/*!40000 ALTER TABLE `ac_cargos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ac_category`
--

DROP TABLE IF EXISTS `ac_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ac_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_parent` int(11) DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ac_category`
--

LOCK TABLES `ac_category` WRITE;
/*!40000 ALTER TABLE `ac_category` DISABLE KEYS */;
INSERT INTO `ac_category` VALUES (1,11,'Showreel','2014-04-15 00:00:00',NULL,1),(2,11,'Action - Sport','2014-04-15 00:00:00',NULL,1),(3,11,'Cars','2014-04-15 00:00:00',NULL,1),(4,11,'Comedy','2014-04-15 00:00:00',NULL,1),(5,11,'Corporate','2014-04-15 00:00:00',NULL,1),(6,11,'Fashion','2014-04-15 00:00:00',NULL,1),(7,11,'Storytelling','2014-04-15 00:00:00',NULL,1),(8,11,'Trailers','2014-04-15 00:00:00',NULL,1),(9,11,'Music Videos','2014-04-15 00:00:00',NULL,1),(10,NULL,'PARTNERS','2014-04-23 00:00:00',NULL,1),(11,NULL,'PORTFOLIO','2014-04-23 00:00:00',NULL,1),(12,10,'Agencies','2014-04-23 00:00:00',NULL,1),(13,10,'Producers','2014-04-23 00:00:00',NULL,1),(14,10,'Directors','2014-04-23 00:00:00',NULL,1),(15,10,'Directors of Photography','2014-04-23 00:00:00',NULL,1),(16,10,'Filmakers','2014-04-23 00:00:00',NULL,1),(17,10,'Postproduction','2014-04-23 00:00:00',NULL,1),(18,10,'Photographer','2014-04-23 00:00:00',NULL,1),(19,10,'Other','2014-04-23 00:00:00',NULL,1);
/*!40000 ALTER TABLE `ac_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ac_comments`
--

DROP TABLE IF EXISTS `ac_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ac_comments`
--

LOCK TABLES `ac_comments` WRITE;
/*!40000 ALTER TABLE `ac_comments` DISABLE KEYS */;
INSERT INTO `ac_comments` VALUES (2,2,'maria','maria@gmail.com','maria comment','2014-05-13 11:54:00',NULL,1),(3,2,'juan','juan@gmail.com','juan comment','2014-05-13 11:56:10',NULL,1),(4,2,'marco','marcoa@gmail.com','marco comment','2014-05-13 11:59:34',NULL,1),(5,2,'mario mario','mario@mario.com','es un comentario de prueba','2014-05-13 14:27:29',NULL,0);
/*!40000 ALTER TABLE `ac_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ac_our_teams`
--

DROP TABLE IF EXISTS `ac_our_teams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ac_our_teams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `url_image` varchar(150) DEFAULT NULL,
  `cargo_id` int(11) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `skype` varchar(15) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ac_our_teams`
--

LOCK TABLES `ac_our_teams` WRITE;
/*!40000 ALTER TABLE `ac_our_teams` DISABLE KEYS */;
INSERT INTO `ac_our_teams` VALUES (1,'mike bour','image.jpg',1,'958457845','mike.bour@empresa.com','mike123','2014-04-15 00:00:00','0000-00-00 00:00:00',1),(2,'mario lay','mario.jpg',1,'942512525','mario@empresa.com','mario99','2014-04-15 00:00:00','0000-00-00 00:00:00',1),(3,'maria gum','mario1.jpg',2,'859455484','maria@empresa.com','maria123','2014-04-15 00:00:00','0000-00-00 00:00:00',1),(4,'jhony sing','image.jpg',2,'992541578','jhony@empresa.com','jhonysk','2014-04-15 00:00:00','0000-00-00 00:00:00',1),(5,'katy roll','image.jpg',2,'898895874','katyr@empresa.com','katyr','2014-04-15 00:00:00','0000-00-00 00:00:00',1),(6,'marco','image.jpg',3,'965855458','marco@empresa.com','marcoabc','2014-04-14 00:00:00',NULL,1),(8,'contact','image.jpg',1,'000','contac@contac.vc','contac.cv','2014-04-23 04:43:55','2014-04-23 18:52:57',1),(9,'future 2','image.jpg',1,'22222222','future_22@gmail.com','future2','2014-04-23 04:48:08','2014-04-23 18:27:33',0);
/*!40000 ALTER TABLE `ac_our_teams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ac_partners`
--

DROP TABLE IF EXISTS `ac_partners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ac_partners`
--

LOCK TABLES `ac_partners` WRITE;
/*!40000 ALTER TABLE `ac_partners` DISABLE KEYS */;
INSERT INTO `ac_partners` VALUES (1,'partners 01 youtube',12,'image.jpg','https://www.youtube.com/','2014-04-15 00:00:00','2014-04-23 18:34:45',1),(2,'partners 02',12,'image.jpg','https://www.google.com.pe/','2014-04-15 00:00:00',NULL,1),(3,'partners 03',12,'image.jpg','https://www.google.com.pe/','2014-04-15 00:00:00',NULL,1),(4,'partners 04',12,'image.jpg','https://www.google.com.pe/','2014-04-15 00:00:00',NULL,1),(5,'partners 01',12,'image.jpg','https://www.google.com.pe/','2014-04-15 00:00:00',NULL,1),(6,'partners 05',13,'image.jpg','https://www.google.com.pe/','2014-04-15 00:00:00',NULL,1),(7,'partners 06',13,'image.jpg','https://www.google.com.pe/','2014-04-15 00:00:00',NULL,1),(8,'partners 07',13,'image.jpg','https://www.google.com.pe/','2014-04-15 00:00:00',NULL,1),(9,'partners 8',19,'image.jpg','https://www.google.com.pe/','2014-04-15 00:00:00','2014-04-23 18:30:44',1);
/*!40000 ALTER TABLE `ac_partners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ac_portfolios`
--

DROP TABLE IF EXISTS `ac_portfolios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ac_portfolios`
--

LOCK TABLES `ac_portfolios` WRITE;
/*!40000 ALTER TABLE `ac_portfolios` DISABLE KEYS */;
INSERT INTO `ac_portfolios` VALUES (1,3,'portolio 001100','image.jpg',NULL,'81244498','2014-04-15 00:00:00','2014-04-24 03:34:21',1,5),(2,9,'portolio 002','image.jpg',NULL,'81244498','2014-04-15 00:00:00',NULL,1,0),(3,3,'portolio 003','image.jpg',NULL,'91590180','2014-04-15 00:00:00',NULL,1,3),(4,1,'portolio 004','image.jpg',NULL,'81244498','2014-04-15 00:00:00',NULL,1,1),(5,1,'portolio 005','image.jpg',NULL,'91590180','2014-04-15 00:00:00',NULL,1,3),(6,1,'portolio 006','image.jpg',NULL,'81244498','2014-04-15 00:00:00',NULL,1,2),(7,5,'portolio 007','image.jpg',NULL,'81244498','2014-04-15 00:00:00',NULL,1,3),(8,1,'portolio 008','image.jpg',NULL,'81244498','2014-04-15 00:00:00',NULL,1,3),(9,2,'portolio 009','image.jpg',NULL,'91590180','2014-04-15 00:00:00',NULL,1,2),(11,1,'new porfolio','image.jpg',NULL,'81244498','2014-04-01 00:00:00',NULL,1,1),(12,1,'portfolio 1111','image.jpg',NULL,'91590180','2014-04-24 03:49:42',NULL,1,7),(13,1,'nuevo nuevo','image.jpg',NULL,'91590180','2014-04-24 03:53:37','2014-04-26 01:40:05',1,0),(14,1,'ddddd','image.jpg','http://i.vimeocdn.com/video/474840671_640.jpg','94936857','2014-04-26 06:38:16','2014-05-12 21:00:08',1,4),(15,1,'name 81244498',NULL,'http://i.vimeocdn.com/video/458164484_640.jpg','81244498','2014-05-12 21:09:58',NULL,1,0);
/*!40000 ALTER TABLE `ac_portfolios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ac_posts`
--

DROP TABLE IF EXISTS `ac_posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ac_posts`
--

LOCK TABLES `ac_posts` WRITE;
/*!40000 ALTER TABLE `ac_posts` DISABLE KEYS */;
INSERT INTO `ac_posts` VALUES (2,'post','Lorem Ipsum es simplemente el texto de relleno','Lorem Ipsum es simplemente el texto de relleno, Lorem Ipsum es simplemente el texto de relleno, Lorem Ipsum es simplemente el texto de relleno, Lorem Ipsum es simplemente el texto de relleno, Lorem Ipsum es simplemente el texto de relleno, Lorem Ipsum es simplemente el texto de relleno, Lorem Ipsum es simplemente el texto de relleno, Lorem Ipsum es simplemente el texto de relleno, Lorem Ipsum es simplemente el texto de relleno, Lorem Ipsum es simplemente el texto de relleno, Lorem Ipsum es simplemente el texto de relleno, Lorem Ipsum es simplemente el texto de relleno, Lorem Ipsum es simplemente el texto de relleno, Lorem Ipsum es simplemente el texto de relleno, Lorem Ipsum es simplemente el texto de relleno, Lorem Ipsum es simplemente el texto de relleno, Lorem Ipsum es simplemente el texto de relleno, Lorem Ipsum es simplemente el texto de relleno, Lorem Ipsum es simplemente el texto de relleno, Lorem Ipsum es simplemente el texto de relleno,  ','image.jpg','2014-04-15 00:00:00','2014-04-22 19:43:02',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,'post','tittle of post with description','conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, ','image.jpg','2014-04-15 00:00:00','2014-04-15 00:00:00',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,'post','tittle of post with description 2','tittle of post with description, 2 tittle of post with description, 2 tittle of post with description, 2 tittle of post with description, 2 tittle of post with description, 2 tittle of post with description, 2 tittle of post with description, 2 tittle of post with description, 2 tittle of post with description, 2 tittle of post with description, 2 tittle of post with description, 2 tittle of post with description, 2 tittle of post with description, 2 tittle of post with description, 2 tittle of post with description, 2 tittle of post with description, 2 tittle of post with description, 2 tittle of post with description, 2 tittle of post with description, 2 tittle of post with description, 2 ','image.jpg','2014-04-15 00:00:00','2014-04-15 00:00:00',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,'post','post 3','without content. without content. without content.','image.jpg','2014-04-15 00:00:00','2014-04-15 00:00:00',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(9,'page-about','What we do','Content What we do, What we do (US)   ','image.jpg','2014-04-15 00:00:00','2014-04-25 23:04:31',1,' ESPAÑOL   ',' FRANÇAIS   ',' DEUTSCH   ',' ITALIANO   ',' PORTUGUÊS   ','РУССКИЙ   ','简体中文   ','العربية arabe 123 ','日本語 chino 123','What we do (ES)','What we do (What we do (FR)','title 3','title 4','title 5','title 6','title 7','arabe 123','123'),(10,'page-about','How we do it','content How we do it, (US)  ','image.jpg','2014-04-15 00:00:00','2014-04-25 23:05:35',1,' ESPAÑOL  ',' FRANÇAIS  ',' DEUTSCH  ',' ITALIANO  ',' PORTUGUÊS  ','РУССКИЙ  ','简体中文  ','العربية  ','日本語','How we do it (ES)','How we do it (FR)','How we do it','How we do it','How we do it','How we do it','How we do it','How we do it','How we do it'),(11,'page','TITULO PYMES SS','Lorem <span style=\"font-weight: bold;\">Ipsum</span> es simplemente el texto de relleno de las imprentas y archivos de texto de relleno estándarpara paginas web. 2     ','image.jpg','2014-04-15 00:00:00','2014-04-24 04:36:06',1,'','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(12,'page','POPULAR','Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto de relleno estándarpara paginas web.','image.jpg','2014-04-15 00:00:00','2014-04-15 00:00:00',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(13,'post','post demo OK','post demo    ','image.jpg','2014-04-23 05:10:47','2014-04-24 01:09:47',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `ac_posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ac_users`
--

DROP TABLE IF EXISTS `ac_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ac_users`
--

LOCK TABLES `ac_users` WRITE;
/*!40000 ALTER TABLE `ac_users` DISABLE KEYS */;
INSERT INTO `ac_users` VALUES (1,'Luis Figuera','luis','e10adc3949ba59abbe56e057f20f883e','milindex@gmail.com','2014-04-18 00:00:00','2014-04-18 00:00:00',1);
/*!40000 ALTER TABLE `ac_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ac_works`
--

DROP TABLE IF EXISTS `ac_works`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ac_works` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `description` text,
  `url_image` varchar(150) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ac_works`
--

LOCK TABLES `ac_works` WRITE;
/*!40000 ALTER TABLE `ac_works` DISABLE KEYS */;
INSERT INTO `ac_works` VALUES (3,'Name Company 03','content Company 03.','image.jpg','2014-04-15 00:00:00',NULL,1),(4,'Name Company 04','content Company 04. ','image.jpg','2014-04-15 00:00:00','2014-04-23 07:15:04',1),(5,'Name Company 05','content Company 05.','image.jpg','2014-04-15 00:00:00',NULL,1),(6,'Name Company 06','content Company 06.','image.jpg','2014-04-15 00:00:00',NULL,1),(7,'Name Company 07','content Company 07.','image.jpg','2014-04-15 00:00:00',NULL,1),(8,'Name Company 08','content Company 08.','image.jpg','2014-04-15 00:00:00',NULL,1),(10,'new ok','new up <span style=\"font-weight: bold;\">aa</span>   ','image.jpg','2014-04-23 07:10:32','2014-04-23 19:10:02',1),(11,'new work','new <span style=\"font-weight: bold;\">work</span>   ','image.jpg','2014-04-23 19:09:02','2014-04-26 01:48:09',1);
/*!40000 ALTER TABLE `ac_works` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ci_sessions`
--

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` VALUES ('1c1f23112e1aaa40e0702229788157d3','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.132 Safari/537.36',1400025036,'a:3:{s:5:\"token\";s:32:\"241493007c11f5e26584f266ee85ce6b\";s:5:\"admin\";a:8:{s:2:\"id\";s:1:\"1\";s:4:\"name\";s:12:\"Luis Figuera\";s:9:\"user_name\";s:4:\"luis\";s:8:\"password\";s:32:\"e10adc3949ba59abbe56e057f20f883e\";s:5:\"email\";s:18:\"milindex@gmail.com\";s:10:\"created_at\";s:19:\"2014-04-18 00:00:00\";s:10:\"updated_at\";s:19:\"2014-04-18 00:00:00\";s:6:\"status\";s:1:\"1\";}s:4:\"post\";s:0:\"\";}');
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-05-13 18:56:26
