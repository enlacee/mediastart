CREATE DATABASE  IF NOT EXISTS `free_mediastart` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `free_mediastart`;
-- MySQL dump 10.13  Distrib 5.5.34, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: free_mediastart
-- ------------------------------------------------------
-- Server version	5.5.34-0ubuntu0.13.10.1

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
  `type` enum('OTRO','PRINCIPAL') DEFAULT NULL COMMENT '1 = principal\n2 = otro\n',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(1) DEFAULT NULL COMMENT '1 = ACTIVO\n0 = INACTIVO',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ac_banners`
--

LOCK TABLES `ac_banners` WRITE;
/*!40000 ALTER TABLE `ac_banners` DISABLE KEYS */;
INSERT INTO `ac_banners` VALUES (1,'uno',NULL,'1.jpg','http://www.uno.com','PRINCIPAL','2014-04-14 00:00:00','2014-04-14 00:00:00',1),(2,'google',NULL,'google.jpg','http://www.google.com','PRINCIPAL','2014-04-14 00:00:00','2014-04-14 00:00:00',1),(3,'comcast',NULL,'comcast.png','http://www.comcast.com','PRINCIPAL','2014-04-14 00:00:00','2014-04-14 00:00:00',1),(4,'k-net',NULL,'k-net.jpg','http://www.k-net.com','PRINCIPAL','2014-04-14 00:00:00','2014-04-14 00:00:00',1),(5,'brightcove',NULL,'brightcove.jpg','http://www.brightcove.com','PRINCIPAL','2014-04-14 00:00:00','2014-04-14 00:00:00',1),(6,'intel',NULL,'intel.jpg','http://www.intel.com','PRINCIPAL','2014-04-14 00:00:00','2014-04-14 00:00:00',1),(7,'att',NULL,'att.jpg','http://www.att.com','PRINCIPAL','2014-04-14 00:00:00','2014-04-14 00:00:00',0);
/*!40000 ALTER TABLE `ac_banners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ac_category`
--

DROP TABLE IF EXISTS `ac_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ac_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ac_category`
--

LOCK TABLES `ac_category` WRITE;
/*!40000 ALTER TABLE `ac_category` DISABLE KEYS */;
INSERT INTO `ac_category` VALUES (1,'Showreel','2014-04-15 00:00:00',NULL,1),(2,'Action - Sport','2014-04-15 00:00:00',NULL,1),(3,'Cars','2014-04-15 00:00:00',NULL,1),(4,'Comedy','2014-04-15 00:00:00',NULL,1),(5,'Corporate','2014-04-15 00:00:00',NULL,1),(6,'Fashion','2014-04-15 00:00:00',NULL,1),(7,'Storytelling','2014-04-15 00:00:00',NULL,1),(8,'Trailers','2014-04-15 00:00:00',NULL,1),(9,'Music Videos','2014-04-15 00:00:00',NULL,1);
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
  `posts_id` int(11) NOT NULL,
  `author` varchar(30) DEFAULT NULL,
  `author_email` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `approved` int(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_ac_comments_ac_posts1_idx` (`posts_id`),
  CONSTRAINT `fk_ac_comments_ac_posts1` FOREIGN KEY (`posts_id`) REFERENCES `ac_posts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ac_comments`
--

LOCK TABLES `ac_comments` WRITE;
/*!40000 ALTER TABLE `ac_comments` DISABLE KEYS */;
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
  `cargo` enum('SOPORT','OTRO','CARGO3') DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `skype` varchar(15) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ac_our_teams`
--

LOCK TABLES `ac_our_teams` WRITE;
/*!40000 ALTER TABLE `ac_our_teams` DISABLE KEYS */;
INSERT INTO `ac_our_teams` VALUES (1,'mike bour','image.jpg','SOPORT','958457845','mike.bour@empresa.com','mike123','2014-04-15 00:00:00','0000-00-00 00:00:00',1),(2,'mario lay','mario.jpg','SOPORT','942512525','mario@empresa.com','mario99','2014-04-15 00:00:00','0000-00-00 00:00:00',1),(3,'maria gum','mario1.jpg','SOPORT','859455484','maria@empresa.com','maria123','2014-04-15 00:00:00','0000-00-00 00:00:00',1),(4,'jhony sing','image.jpg','OTRO','992541578','jhony@empresa.com','jhonysk','2014-04-15 00:00:00','0000-00-00 00:00:00',1),(5,'katy roll','image.jpg','CARGO3','898895874','katyr@empresa.com','katyr','2014-04-15 00:00:00','0000-00-00 00:00:00',1),(6,'marco','image.jpg','SOPORT','965855458','marco@empresa.com','marcoabc','2014-04-14 00:00:00',NULL,1);
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
  `category` enum('Agencies','Producers','Directors','Directors of Photography','Filmakers','Postproduction','Photographer','Other') DEFAULT NULL,
  `url_image` varchar(150) DEFAULT NULL,
  `link_image` varchar(150) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ac_partners`
--

LOCK TABLES `ac_partners` WRITE;
/*!40000 ALTER TABLE `ac_partners` DISABLE KEYS */;
INSERT INTO `ac_partners` VALUES (1,'partners 01','Agencies','image.jpg','https://www.google.com.pe/','2014-04-15 00:00:00',NULL,1),(2,'partners 02','Producers','image.jpg','https://www.google.com.pe/','2014-04-15 00:00:00',NULL,1),(3,'partners 03','Producers','image.jpg','https://www.google.com.pe/','2014-04-15 00:00:00',NULL,1),(4,'partners 04','Agencies','image.jpg','https://www.google.com.pe/','2014-04-15 00:00:00',NULL,1),(5,'partners 01','Agencies','image.jpg','https://www.google.com.pe/','2014-04-15 00:00:00',NULL,1),(6,'partners 05','Agencies','image.jpg','https://www.google.com.pe/','2014-04-15 00:00:00',NULL,1),(7,'partners 06','Agencies','image.jpg','https://www.google.com.pe/','2014-04-15 00:00:00',NULL,1),(8,'partners 07','Agencies','image.jpg','https://www.google.com.pe/','2014-04-15 00:00:00',NULL,1),(9,'partners 08','Agencies','image.jpg','https://www.google.com.pe/','2014-04-15 00:00:00',NULL,1);
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
  `category_id` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `url_image` varchar(100) DEFAULT NULL,
  `url_video` varchar(150) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `count_view` int(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_ac_portfolio_ac_category_idx` (`category_id`),
  CONSTRAINT `fk_ac_portfolio_ac_category` FOREIGN KEY (`category_id`) REFERENCES `ac_category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ac_portfolios`
--

LOCK TABLES `ac_portfolios` WRITE;
/*!40000 ALTER TABLE `ac_portfolios` DISABLE KEYS */;
INSERT INTO `ac_portfolios` VALUES (1,1,'portolio 001','image.jpg','http://player.vimeo.com/video/81244498','2014-04-15 00:00:00',NULL,1,0),(2,9,'portolio 002','image.jpg','http://player.vimeo.com/video/81244498','2014-04-15 00:00:00',NULL,1,1),(3,3,'portolio 003','image.jpg','http://player.vimeo.com/video/81244498','2014-04-15 00:00:00',NULL,1,5),(4,1,'portolio 004','image.jpg','http://player.vimeo.com/video/81244498','2014-04-15 00:00:00',NULL,1,0),(5,1,'portolio 005','image.jpg','http://player.vimeo.com/video/81244498','2014-04-15 00:00:00',NULL,1,0),(6,1,'portolio 006','image.jpg','http://player.vimeo.com/video/81244498','2014-04-15 00:00:00',NULL,1,3),(7,5,'portolio 007','image.jpg','http://player.vimeo.com/video/81244498','2014-04-15 00:00:00',NULL,1,0),(8,1,'portolio 008','image.jpg','http://player.vimeo.com/video/81244498','2014-04-15 00:00:00',NULL,1,0),(9,2,'portolio 009','image.jpg','http://player.vimeo.com/video/81244498','2014-04-15 00:00:00',NULL,1,2),(10,1,'portolio 010','image.jpg','http://player.vimeo.com/video/81244498','2014-04-15 00:00:00',NULL,1,0),(11,1,'new porfolio','image.jpg','http://player.vimeo.com/video/81244498','2014-04-01 00:00:00',NULL,1,0);
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
  `status` int(1) DEFAULT '0',
  `comment_count` int(11) NOT NULL DEFAULT '0',
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ac_posts`
--

LOCK TABLES `ac_posts` WRITE;
/*!40000 ALTER TABLE `ac_posts` DISABLE KEYS */;
INSERT INTO `ac_posts` VALUES (1,'post','Lorem Ipsum es simplemente el texto de relleno','Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto de relleno estándar. Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto de relleno estándar.Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto de relleno estándar.Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto de relleno estándar. Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto de relleno estándar. Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto de relleno estándar. Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto de relleno estándar.','image.jpg','2014-04-15 00:00:00','2014-04-15 00:00:00',1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,'post','Lorem Ipsum es simplemente el texto de relleno','Lorem Ipsum es simplemente el texto de relleno, Lorem Ipsum es simplemente el texto de relleno, Lorem Ipsum es simplemente el texto de relleno, Lorem Ipsum es simplemente el texto de relleno, Lorem Ipsum es simplemente el texto de relleno, Lorem Ipsum es simplemente el texto de relleno, Lorem Ipsum es simplemente el texto de relleno, Lorem Ipsum es simplemente el texto de relleno, Lorem Ipsum es simplemente el texto de relleno, Lorem Ipsum es simplemente el texto de relleno, Lorem Ipsum es simplemente el texto de relleno, Lorem Ipsum es simplemente el texto de relleno, Lorem Ipsum es simplemente el texto de relleno, Lorem Ipsum es simplemente el texto de relleno, Lorem Ipsum es simplemente el texto de relleno, Lorem Ipsum es simplemente el texto de relleno, Lorem Ipsum es simplemente el texto de relleno, Lorem Ipsum es simplemente el texto de relleno, Lorem Ipsum es simplemente el texto de relleno, Lorem Ipsum es simplemente el texto de relleno, ','att.jpg','2014-04-15 00:00:00','2014-04-15 00:00:00',1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,'post','tittle of post with description','conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, ','image.jpg','2014-04-15 00:00:00','2014-04-15 00:00:00',1,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,'post','tittle of post with description 2','tittle of post with description, 2 tittle of post with description, 2 tittle of post with description, 2 tittle of post with description, 2 tittle of post with description, 2 tittle of post with description, 2 tittle of post with description, 2 tittle of post with description, 2 tittle of post with description, 2 tittle of post with description, 2 tittle of post with description, 2 tittle of post with description, 2 tittle of post with description, 2 tittle of post with description, 2 tittle of post with description, 2 tittle of post with description, 2 tittle of post with description, 2 tittle of post with description, 2 tittle of post with description, 2 tittle of post with description, 2 ','image.jpg','2014-04-15 00:00:00','2014-04-15 00:00:00',1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,'post','post 3','without content. without content. without content.','image.jpg','2014-04-15 00:00:00','2014-04-15 00:00:00',1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,'post','post 4','post 4.','image.jpg','2014-04-15 00:00:00','2014-04-15 00:00:00',1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,'post','post 4',' post 4. post 4.post 4.post 4.post 4.post 4.post 4.post 4.post 4.post 4.post 4.post 4.post 4.post 4.post 4.post 4.post 4.post 4.post 4.post 4.post 4.post 4.post 4.post 4.post 4.post 4.post 4.','image.jpg','2014-04-15 11:24:15','0000-00-00 00:00:00',1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,'post','post number five in website','post number five in website, post number five in websitepost number five in website, post number five in website, post number five in website, post number five in website, post number five in website, post number five in website, post number five in website, post number five in website, post number five in website, post number five in website, post number five in website, post number five in website, post number five in website, post number five in website, post number five in website, post number five in website, post number five in website, post number five in website, post number five in website, post number five in website, post number five in website, post number five in website, post number five in website, post number five in website, post number five in website\r\n\r\n\r\n, post number five in website, post number five in website, post number five in website, post number five in website\r\n\r\n, post number five in website, post number five in website\r\n\r\n, post number five in website, post number five in website, post number five in website, post number five in website','image.jpg','2014-04-15 00:00:00','2014-04-15 00:00:00',1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(9,'page-about','What we do','Content What we do, What we do (US)','image.jpg','2014-04-15 00:00:00','2014-04-23 00:00:00',1,0,' ESPAÑOL',' FRANÇAIS',' DEUTSCH',' ITALIANO',' PORTUGUÊS','РУССКИЙ','简体中文','العربية','日本語','What we do (ES)','What we do (What we do (FR)',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(10,'page-about','How we do it','content How we do it, (US)','image.jpg','2014-04-15 00:00:00','2014-04-15 00:00:00',1,0,' ESPAÑOL',' FRANÇAIS',' DEUTSCH',' ITALIANO',' PORTUGUÊS','РУССКИЙ','简体中文','العربية','日本語','How we do it (ES)','How we do it (FR)',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(11,'page','TITULO PYMES','Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto de relleno estándarpara paginas web.','image.jpg','2014-04-15 00:00:00','2014-04-15 00:00:00',1,0,'','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(12,'page','POPULAR','Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto de relleno estándarpara paginas web.','image.jpg','2014-04-15 00:00:00','2014-04-15 00:00:00',1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
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
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ac_works`
--

LOCK TABLES `ac_works` WRITE;
/*!40000 ALTER TABLE `ac_works` DISABLE KEYS */;
INSERT INTO `ac_works` VALUES (1,'Name Company 01','content company 01.','image.jpg','2014-04-14 00:00:00',NULL,1),(2,'Name Company 02','content Company 02.','image.jpg','2014-04-15 00:00:00',NULL,1),(3,'Name Company 03','content Company 03.','image.jpg','2014-04-15 00:00:00',NULL,1),(4,'Name Company 04','content Company 04.','image.jpg','2014-04-15 00:00:00',NULL,1),(5,'Name Company 05','content Company 05.','image.jpg','2014-04-15 00:00:00',NULL,1),(6,'Name Company 06','content Company 06.','image.jpg','2014-04-15 00:00:00',NULL,1),(7,'Name Company 07','content Company 07.','image.jpg','2014-04-15 00:00:00',NULL,1),(8,'Name Company 08','content Company 08.','image.jpg','2014-04-15 00:00:00',NULL,1);
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
INSERT INTO `ci_sessions` VALUES ('81d32d7dc580b82cfbe7a35e3b812160','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/33.0.1750.152 Chrome/33.0.1750.15',1398139089,'a:2:{s:9:\"user_data\";s:0:\"\";s:7:\"id_lang\";s:2:\"en\";}'),('919381ad9daeeb96fdb83fde0cc2c90f','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/33.0.1750.152 Chrome/33.0.1750.15',1398131106,'a:1:{s:7:\"id_lang\";s:2:\"fr\";}');
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'free_mediastart'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-04-21 23:00:55
