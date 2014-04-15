

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
-- Table structure for table `ac_comments`
--

DROP TABLE IF EXISTS `ac_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ac_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `author` varchar(30) DEFAULT NULL,
  `author_email` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `approved` int(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_ac_comments_ac_posts1_idx` (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_type` varchar(20) DEFAULT NULL COMMENT 'page\npost',
  `title` varchar(200) DEFAULT NULL,
  `content` longtext,
  `url_image` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `comment_count` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ac_posts`
--

LOCK TABLES `ac_posts` WRITE;
/*!40000 ALTER TABLE `ac_posts` DISABLE KEYS */;
INSERT INTO `ac_posts` VALUES (1,'post','Lorem Ipsum es simplemente el texto de relleno','Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto de relleno estándar. Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto de relleno estándar.Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto de relleno estándar.Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto de relleno estándar. Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto de relleno estándar. Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto de relleno estándar. Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto de relleno estándar.','image.jpg','2014-04-15 00:00:00','2014-04-15 00:00:00',1,0),(2,'post','Lorem Ipsum es simplemente el texto de relleno','Lorem Ipsum es simplemente el texto de relleno, Lorem Ipsum es simplemente el texto de relleno, Lorem Ipsum es simplemente el texto de relleno, Lorem Ipsum es simplemente el texto de relleno, Lorem Ipsum es simplemente el texto de relleno, Lorem Ipsum es simplemente el texto de relleno, Lorem Ipsum es simplemente el texto de relleno, Lorem Ipsum es simplemente el texto de relleno, Lorem Ipsum es simplemente el texto de relleno, Lorem Ipsum es simplemente el texto de relleno, Lorem Ipsum es simplemente el texto de relleno, Lorem Ipsum es simplemente el texto de relleno, Lorem Ipsum es simplemente el texto de relleno, Lorem Ipsum es simplemente el texto de relleno, Lorem Ipsum es simplemente el texto de relleno, Lorem Ipsum es simplemente el texto de relleno, Lorem Ipsum es simplemente el texto de relleno, Lorem Ipsum es simplemente el texto de relleno, Lorem Ipsum es simplemente el texto de relleno, Lorem Ipsum es simplemente el texto de relleno, ','att.jpg','2014-04-15 00:00:00','2014-04-15 00:00:00',1,0),(3,'post','tittle of post with description','conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, conten without description, ','image.jpg','2014-04-15 00:00:00','2014-04-15 00:00:00',1,0),(4,'post','tittle of post with description 2','tittle of post with description, 2 tittle of post with description, 2 tittle of post with description, 2 tittle of post with description, 2 tittle of post with description, 2 tittle of post with description, 2 tittle of post with description, 2 tittle of post with description, 2 tittle of post with description, 2 tittle of post with description, 2 tittle of post with description, 2 tittle of post with description, 2 tittle of post with description, 2 tittle of post with description, 2 tittle of post with description, 2 tittle of post with description, 2 tittle of post with description, 2 tittle of post with description, 2 tittle of post with description, 2 tittle of post with description, 2 ','image.jpg','2014-04-15 00:00:00','2014-04-15 00:00:00',1,0),(5,'post','post 3','without content. without content. without content.','image.jpg','2014-04-15 00:00:00','2014-04-15 00:00:00',1,0),(6,'post','post 4','post 4.','image.jpg','2014-04-15 00:00:00','2014-04-15 00:00:00',1,0),(7,'post','post 4',' post 4. post 4.post 4.post 4.post 4.post 4.post 4.post 4.post 4.post 4.post 4.post 4.post 4.post 4.post 4.post 4.post 4.post 4.post 4.post 4.post 4.post 4.post 4.post 4.post 4.post 4.post 4.','image.jpg','2014-04-15 11:24:15','0000-00-00 00:00:00',1,0),(8,'post','post number five in website','post number five in website, post number five in websitepost number five in website, post number five in website, post number five in website, post number five in website, post number five in website, post number five in website, post number five in website, post number five in website, post number five in website, post number five in website, post number five in website, post number five in website, post number five in website, post number five in website, post number five in website, post number five in website, post number five in website, post number five in website, post number five in website, post number five in website, post number five in website, post number five in website, post number five in website, post number five in website, post number five in website\r\n\r\n\r\n, post number five in website, post number five in website, post number five in website, post number five in website\r\n\r\n, post number five in website, post number five in website\r\n\r\n, post number five in website, post number five in website, post number five in website, post number five in website','image.jpg','2014-04-15 00:00:00',NULL,1,0);
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
INSERT INTO `ci_sessions` VALUES ('1d9c6a396fccb3b788513cf86fed879a','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/33.0.1750.152 Chrome/33.0.1750.15',1397571045,''),('2d16033dbc9e203d746fd7cdcc107dd2','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/33.0.1750.152 Chrome/33.0.1750.15',1397573868,''),('32499fb0d4229bc5a2ef9cca39fcd937','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/33.0.1750.152 Chrome/33.0.1750.15',1397576593,''),('6c544eed44091199fdac07072ecd2186','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/31.0.1650.63 Chrome/31.0.1650.63 ',1397570025,''),('8ace8f3face3ac32424121f8a438c060','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:24.0) Gecko/20100101 Firefox/24.0',1397573911,''),('a0243547da00723916105b626ef2caaa','127.0.0.1','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:24.0) Gecko/20100101 Firefox/24.0',1397574076,'');
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;
