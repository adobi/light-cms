/*
Navicat MySQL Data Transfer

Source Server         : _localhost
Source Server Version : 50133
Source Host           : localhost:3306
Source Database       : invictushu

Target Server Type    : MYSQL
Target Server Version : 50133
File Encoding         : 65001

Date: 2010-08-09 15:53:25
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `games`
-- ----------------------------
DROP TABLE IF EXISTS `games`;
CREATE TABLE `games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `logo` varchar(150) DEFAULT NULL,
  `description` text,
  `released` timestamp NULL DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_type` (`type_id`),
  KEY `idx_games` (`name`,`logo`,`released`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of games
-- ----------------------------
INSERT INTO `games` VALUES ('5', 'Level R', '2010.08.09_1281352661_12961_234666659553_671064553_4286921_8178007_s.jpg', 'alma', '2010-08-31 00:00:00', '3', 'level-r', '3');
INSERT INTO `games` VALUES ('4', 'alma', '2010.08.09_1281352007_sprite-icons2.png', 'asd', '2010-08-31 00:00:00', '3', 'alma', '4');
INSERT INTO `games` VALUES ('6', 'Heat Online', '2010.08.09_1281352693_37626_135812453117964_100000676310440_225278_5104195_s.jpg', 'asd', '2010-08-30 00:00:00', '3', 'heat-online', '1');
INSERT INTO `games` VALUES ('7', 'froggy jump', '2010.08.09_1281361033_23274_118840491488257_28_n.jpg', 'alma a fa alatt', '2010-08-10 00:00:00', '3', 'froggy-jump', '2');

-- ----------------------------
-- Table structure for `images`
-- ----------------------------
DROP TABLE IF EXISTS `images`;
CREATE TABLE `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img_path` varchar(100) DEFAULT NULL,
  `thumb_path` varchar(100) DEFAULT NULL,
  `page_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_page` (`page_id`),
  KEY `idx_images` (`img_path`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of images
-- ----------------------------

-- ----------------------------
-- Table structure for `menus`
-- ----------------------------
DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `url` varchar(45) DEFAULT NULL,
  `order` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_menus` (`name`,`url`,`order`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of menus
-- ----------------------------
INSERT INTO `menus` VALUES ('2', 'játékok', 'jatekok', '3');
INSERT INTO `menus` VALUES ('3', 'letöltés', 'letoltes', '1');
INSERT INTO `menus` VALUES ('4', 'cég', 'ceg', '4');
INSERT INTO `menus` VALUES ('5', 'kapcsolat', 'kapcsolat', '5');
INSERT INTO `menus` VALUES ('6', 'partnerek', 'partnerek', '7');
INSERT INTO `menus` VALUES ('7', 'munka', 'munka', '6');
INSERT INTO `menus` VALUES ('8', 'design concept', 'design-concept', '2');

-- ----------------------------
-- Table structure for `news`
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `content` text,
  `url` varchar(45) DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_news` (`title`,`url`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES ('1', 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec &lt;br /&gt;\r\nsollicitudin dui eget tellus imperdiet vitae fermentum turpis imperdiet.&lt;br /&gt;\r\n Sed est est, elementum nec porta a, tincidunt a felis. Aenean porta &lt;br /&gt;\r\nnisi est, id sodales sem. Cras non fermentum nisi. Ut ut tortor dapibus &lt;br /&gt;\r\ndolor rutrum vulputate. Proin quam mauris, consequat ut eleifend mattis,&lt;br /&gt;\r\n lacinia eget massa. Quisque at tortor justo. Nunc mollis, libero congue&lt;br /&gt;\r\n tempor adipiscing, eros turpis commodo magna, in gravida erat erat quis&lt;br /&gt;\r\n velit. Sed vitae ante orci. Etiam dictum pellentesque malesuada. Nulla &lt;br /&gt;\r\nsemper adipiscing consequat. Integer ultricies gravida malesuada. Sed &lt;br /&gt;\r\nmalesuada, metus eget imperdiet auctor, ipsum urna feugiat eros, non &lt;br /&gt;\r\ndapibus nisl ligula porttitor nibh.', 'lorem-ipsum-dolor-sit-amet', '2010-08-08 17:21:41');

-- ----------------------------
-- Table structure for `pages`
-- ----------------------------
DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `content` text,
  `created` timestamp NULL DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_menu` (`menu_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pages
-- ----------------------------

-- ----------------------------
-- Table structure for `partners`
-- ----------------------------
DROP TABLE IF EXISTS `partners`;
CREATE TABLE `partners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `logo` varchar(150) DEFAULT NULL,
  `url` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_partners` (`name`,`logo`,`url`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of partners
-- ----------------------------
INSERT INTO `partners` VALUES ('1', 'Google Ltd', '2010.08.08_1281280397_april-10-creeping-up-calendar-1280x1024.jpg', 'http://google.com');

-- ----------------------------
-- Table structure for `screenshots`
-- ----------------------------
DROP TABLE IF EXISTS `screenshots`;
CREATE TABLE `screenshots` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `game_id` int(11) DEFAULT NULL,
  `path` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_game` (`game_id`),
  KEY `idx_screenshots` (`path`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of screenshots
-- ----------------------------
INSERT INTO `screenshots` VALUES ('3', '4', '2010.08.09_1281352021_Shot_20100806_140416.jpg');
INSERT INTO `screenshots` VALUES ('4', '4', '2010.08.09_1281352021_Shot_20100806_140427.jpg');
INSERT INTO `screenshots` VALUES ('5', '7', '2010.08.09_1281361079_35097_10150210887260088_109285415087_13751645_3137044_s.jpg');
INSERT INTO `screenshots` VALUES ('6', '7', '2010.08.09_1281361080_23274_118840491488257_28_n.jpg');
INSERT INTO `screenshots` VALUES ('7', '7', '2010.08.09_1281361079_37626_135812453117964_100000676310440_225278_5104195_s.jpg');
INSERT INTO `screenshots` VALUES ('8', '7', '2010.08.09_1281361080_12961_234666659553_671064553_4286921_8178007_s.jpg');

-- ----------------------------
-- Table structure for `settings`
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `value` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of settings
-- ----------------------------
INSERT INTO `settings` VALUES ('1', 'info@invictus.hu', 'Céges email');
INSERT INTO `settings` VALUES ('2', 'support@invictus.hu', 'Support email');
INSERT INTO `settings` VALUES ('3', '4032, Debrecen, Kartács utca 9', 'Cím');
INSERT INTO `settings` VALUES ('4', '+3652-123-1456', 'Telefon');

-- ----------------------------
-- Table structure for `types`
-- ----------------------------
DROP TABLE IF EXISTS `types`;
CREATE TABLE `types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `url` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_types` (`name`,`order`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of types
-- ----------------------------
INSERT INTO `types` VALUES ('1', 'iphone játékok', '2', 'iphone-jatekok');
INSERT INTO `types` VALUES ('2', 'psp játékok', '1', 'ps2-jatekok');
INSERT INTO `types` VALUES ('3', 'pc játékok', '3', 'pc-jatekok');

-- ----------------------------
-- Table structure for `videos`
-- ----------------------------
DROP TABLE IF EXISTS `videos`;
CREATE TABLE `videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(100) DEFAULT NULL,
  `page_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_page` (`page_id`),
  KEY `idx_videos` (`path`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of videos
-- ----------------------------
