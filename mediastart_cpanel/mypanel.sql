/*
Navicat MySQL Data Transfer

Source Server         : Local
Source Server Version : 50534
Source Host           : localhost:3306
Source Database       : mypanel

Target Server Type    : MYSQL
Target Server Version : 50534
File Encoding         : 65001

Date: 2014-02-14 23:23:34
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for multi_uploads
-- ----------------------------
DROP TABLE IF EXISTS `multi_uploads`;
CREATE TABLE `multi_uploads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `object_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `file` varchar(100) NOT NULL,
  `image` int(1) NOT NULL DEFAULT '0',
  `filetype` varchar(10) NOT NULL,
  `type_id` int(1) NOT NULL DEFAULT '1',
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `display_order` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of multi_uploads
-- ----------------------------

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'Luis Figuera', 'luis', 'c4ca4238a0b923820dcc509a6f75849b', 'milindex@gmail.com');
