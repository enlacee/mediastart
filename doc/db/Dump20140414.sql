CREATE DATABASE  IF NOT EXISTS `free_mediastart` /*!40100 DEFAULT CHARACTER SET latin1 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ac_banners`
--

LOCK TABLES `ac_banners` WRITE;
/*!40000 ALTER TABLE `ac_banners` DISABLE KEYS */;
INSERT INTO `ac_banners` VALUES (1,'uno',NULL,'1.jpg','www.uno.com','PRINCIPAL','2014-04-14 00:00:00','2014-04-14 00:00:00',1),(2,'google',NULL,'google.jpg','www.google.com','PRINCIPAL','2014-04-14 00:00:00','2014-04-14 00:00:00',1),(3,'comcast',NULL,'comcast.png','www.comcast.com','PRINCIPAL','2014-04-14 00:00:00','2014-04-14 00:00:00',1),(4,'k-net',NULL,'k-net.jpg','www.k-net.com','PRINCIPAL','2014-04-14 00:00:00','2014-04-14 00:00:00',1),(5,'brightcove',NULL,'brightcove.jpg','www.brightcove.com','PRINCIPAL','2014-04-14 00:00:00','2014-04-14 00:00:00',1),(6,'intel',NULL,'intel.jpg','www.intel.com','PRINCIPAL','2014-04-14 00:00:00','2014-04-14 00:00:00',1),(7,'att',NULL,'att.jpg','www.att.com','PRINCIPAL','2014-04-14 00:00:00','2014-04-14 00:00:00',0);
/*!40000 ALTER TABLE `ac_banners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ac_category`
--

DROP TABLE IF EXISTS `ac_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ac_category` (
  `id` int(11) NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ac_category`
--

LOCK TABLES `ac_category` WRITE;
/*!40000 ALTER TABLE `ac_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `ac_category` ENABLE KEYS */;
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
  `cargo` enum('CARGO1','CARGO2','CARGO3') DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `skype` varchar(15) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ac_our_teams`
--

LOCK TABLES `ac_our_teams` WRITE;
/*!40000 ALTER TABLE `ac_our_teams` DISABLE KEYS */;
/*!40000 ALTER TABLE `ac_our_teams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ac_posts`
--

DROP TABLE IF EXISTS `ac_posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ac_posts` (
  `id` int(11) NOT NULL,
  `post_type` varchar(20) DEFAULT NULL COMMENT 'page\npost',
  `title` varchar(200) DEFAULT NULL,
  `content` longtext,
  `url_image` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ac_posts`
--

LOCK TABLES `ac_posts` WRITE;
/*!40000 ALTER TABLE `ac_posts` DISABLE KEYS */;
/*!40000 ALTER TABLE `ac_posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ac_works`
--

DROP TABLE IF EXISTS `ac_works`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ac_works` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `description` text,
  `url_image` varchar(150) DEFAULT NULL,
  `url_video` varchar(150) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ac_works_ac_category_idx` (`category_id`),
  CONSTRAINT `fk_ac_works_ac_category` FOREIGN KEY (`category_id`) REFERENCES `ac_category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ac_works`
--

LOCK TABLES `ac_works` WRITE;
/*!40000 ALTER TABLE `ac_works` DISABLE KEYS */;
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
INSERT INTO `ci_sessions` VALUES ('b36076d01a0d50c85e5d4ac6e53833f5','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/31.0.1650.63 Chrome/31.0.1650.63 ',1397523926,'');
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

-- Dump completed on 2014-04-14 21:12:01
