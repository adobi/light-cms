/*
Navicat MySQL Data Transfer

Source Server         : _localhost
Source Server Version : 50133
Source Host           : localhost:3306
Source Database       : invictushu

Target Server Type    : MYSQL
Target Server Version : 50133
File Encoding         : 65001

Date: 2010-08-10 16:11:28
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
  `website` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_type` (`type_id`),
  KEY `idx_games` (`name`,`logo`,`released`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of games
-- ----------------------------
INSERT INTO `games` VALUES ('11', 'Level R', '2010.08.10_1281446806_n109285415087_9579.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean commodo,&lt;br /&gt;\r\n odio vel dapibus aliquet, diam nisl dictum erat, id tincidunt est purus&lt;br /&gt;\r\n at ante. Donec vitae tellus risus. Integer eleifend lacus eget est &lt;br /&gt;\r\nmollis congue. Donec enim orci, convallis in bibendum ut, auctor id &lt;br /&gt;\r\ndiam. Pellentesque a mollis eros. Mauris id dolor turpis. Sed ac mauris &lt;br /&gt;\r\nsed elit lobortis venenatis vel eget enim. Quisque lorem arcu, tincidunt&lt;br /&gt;\r\n in rhoncus vel, vulputate ut elit. In eu ligula in nulla blandit &lt;br /&gt;\r\nporttitor in in velit. Proin et eros a massa varius tempus. Proin luctus&lt;br /&gt;\r\n leo a mi accumsan vulputate. Integer vulputate leo id sem accumsan &lt;br /&gt;\r\nauctor pharetra vitae tellus.&lt;br /&gt;\r\n', '2010-08-01 00:00:00', '6', 'level-r', '2', 'http://levelr.gamigo.com/');
INSERT INTO `games` VALUES ('12', 'froggy jump', '2010.08.10_1281446871_23274_118840491488257_28_n.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean commodo,&lt;br /&gt;\r\n odio vel dapibus aliquet, diam nisl dictum erat, id tincidunt est purus&lt;br /&gt;\r\n at ante. Donec vitae tellus risus. Integer eleifend lacus eget est &lt;br /&gt;\r\nmollis congue. Donec enim orci, convallis in bibendum ut, auctor id &lt;br /&gt;\r\ndiam. Pellentesque a mollis eros. Mauris id dolor turpis. Sed ac mauris &lt;br /&gt;\r\nsed elit lobortis venenatis vel eget enim. Quisque lorem arcu, tincidunt&lt;br /&gt;\r\n in rhoncus vel, vulputate ut elit. In eu ligula in nulla blandit &lt;br /&gt;\r\nporttitor in in velit. Proin et eros a massa varius tempus. Proin luctus&lt;br /&gt;\r\n leo a mi accumsan vulputate. Integer vulputate leo id sem accumsan &lt;br /&gt;\r\nauctor pharetra vitae tellus.&lt;br /&gt;\r\n', '2010-08-09 00:00:00', '7', 'froggy-jump', '1', 'http://www.invictus-games.com/');

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
INSERT INTO `menus` VALUES ('2', 'játékok', 'jatekok', '4');
INSERT INTO `menus` VALUES ('3', 'letöltés', 'letoltes', '7');
INSERT INTO `menus` VALUES ('4', 'cég', 'ceg', '1');
INSERT INTO `menus` VALUES ('5', 'kapcsolat', 'kapcsolat', '2');
INSERT INTO `menus` VALUES ('6', 'partnerek', 'partnerek', '5');
INSERT INTO `menus` VALUES ('7', 'munka', 'munka', '6');
INSERT INTO `menus` VALUES ('8', 'design concept', 'design-concept', '3');

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
INSERT INTO `news` VALUES ('1', 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sollicitudin dui eget tellus imperdiet vitae fermentum turpis imperdiet.Sed est est, elementum nec porta a, tincidunt a felis. Aenean porta nisi est, id sodales sem. Cras non fermentum nisi. Ut ut tortor dapibus dolor rutrum vulputate. Proin quam mauris, consequat ut eleifend mattis,lacinia eget massa. Quisque at tortor justo. Nunc mollis, libero conguetempor adipiscing, eros turpis commodo magna, in gravida erat erat quisvelit. Sed vitae ante orci. Etiam dictum pellentesque malesuada. Nulla semper adipiscing consequat. Integer ultricies gravida malesuada. Sed malesuada, metus eget imperdiet auctor, ipsum urna feugiat eros, non dapibus nisl ligula porttitor nibh.', 'lorem-ipsum-dolor-sit-amet', '2010-08-10 14:37:16');

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of partners
-- ----------------------------
INSERT INTO `partners` VALUES ('1', 'Google Ltd', '2010.08.08_1281280397_april-10-creeping-up-calendar-1280x1024.jpg', 'http://google.com');
INSERT INTO `partners` VALUES ('3', 'Apple Inc', '2010.08.10_1281447795_apple-logo.jpg', 'http://apple.com');
INSERT INTO `partners` VALUES ('4', 'Microsoft', '2010.08.10_1281447946_microsoft-logo.jpg', 'http://microsoft.com');
INSERT INTO `partners` VALUES ('5', 'Nvidia', '2010.08.10_1281448003_nvidia-logo.png', 'http://nvidia.com');

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
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of screenshots
-- ----------------------------
INSERT INTO `screenshots` VALUES ('20', '11', '2010.08.10_1281446820_37626_135812453117964_100000676310440_225278_5104195_s.jpg');
INSERT INTO `screenshots` VALUES ('21', '11', '2010.08.10_1281446821_35097_10150210887260088_109285415087_13751645_3137044_s.jpg');
INSERT INTO `screenshots` VALUES ('22', '11', '2010.08.10_1281446820_12961_234666659553_671064553_4286921_8178007_s.jpg');

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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of types
-- ----------------------------
INSERT INTO `types` VALUES ('7', 'iphone', null, 'iphone');
INSERT INTO `types` VALUES ('2', 'psp', '2', 'psp');
INSERT INTO `types` VALUES ('6', 'pc', null, 'pc');
INSERT INTO `types` VALUES ('5', 'android', '4', 'android');

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
