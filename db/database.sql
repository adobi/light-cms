/*
Navicat MySQL Data Transfer

Source Server         : _localhost
Source Server Version : 50133
Source Host           : localhost:3306
Source Database       : invictushu

Target Server Type    : MYSQL
Target Server Version : 50133
File Encoding         : 65001

Date: 2010-08-10 21:28:07
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pages
-- ----------------------------
INSERT INTO `pages` VALUES ('1', 'Invictus-Games Kft', '&lt;font size=&quot;2&quot;&gt;&lt;font size=&quot;5&quot;&gt;&lt;strong&gt;&lt;font&gt;Invictus-Games Kft. üzleti háttér&lt;/font&gt;&lt;/strong&gt;&lt;/font&gt;&lt;font&gt; &lt;br&gt;&lt;br&gt;&lt;/font&gt;&lt;strong&gt;&lt;font size=&quot;4&quot;&gt;Cégtörténet&lt;br&gt;&lt;/font&gt;&lt;/strong&gt;&lt;font&gt;&lt;span style=&quot;font-size: 10pt; font-family: Arial;&quot;&gt;&lt;font&gt;&lt;br&gt;Az Invictus független játékfejlesztő stúdiót 1992-ben Kozák Tamás és Diviánszky Ákos hozta létre azzal a céllal, hogy csúcsminőségű számítógépes játékokat fejlesszen ki.Ez a cél élvonalbeli technológiák kifejlesztését teszi szükségessé, amit kreatív játékötletekkel és új, &lt;br&gt;szórakoztató játékmenettel kell kombinálnunk. A korai sikereinkre alapozva cégünk átszervezése és kiterjesztése mellett döntöttünk 2000-ben. Ez magában foglalta új székhelyünk elfoglalását és nevünk megváltoztatását Invictus-Games Kft-re. Ugyanebben az évben örömmel üdvözölhettük Nagymáthé Dénest a vezetőség köreiben; az ő forradalmi dizájn- és programozási ötletei fejlesztési törekvéseink elemi részét képezik. 2006-ban az Invictus új, tágas saját-tulajdonú irodahelyiségbe költözött, ezzel is lehetőséget adva újabb tehetségek alkalmazásának és fejlesztő csapata bővítésének.&lt;/font&gt;&lt;br&gt;&lt;/span&gt;&lt;br&gt;&lt;/font&gt;&lt;strong&gt;&lt;font size=&quot;4&quot;&gt;Földrajzi helyzetünk&lt;br&gt;&lt;/font&gt;&lt;/strong&gt;&lt;span style=&quot;font-size: 10pt; font-family: Arial;&quot;&gt;&lt;font&gt;Büszkék vagyunk rá, hogy a közép-kelet-európai régió egyik vezető játékfejlesztő csapata lehetünk. Székhelyünk Magyarország, Debrecen. A nemzetközi fejlesztést megcélozva, olyan kiadókkal volt lehetőségünk dolgozni, mint a brit Codemasters, az amerikai Activision, az orosz 1C, a japán illetőségű Gamepot vagy a kínai Joyzone.&lt;/font&gt;&lt;/span&gt;&lt;br&gt;&lt;br&gt;&lt;br /&gt;\r\n&lt;/font&gt;&lt;p align=&quot;justify&quot;&gt;&lt;font size=&quot;2&quot;&gt;&lt;font&gt;&lt;strong&gt;&lt;font size=&quot;4&quot;&gt;Fejlesztő csapatunk&lt;/font&gt; &lt;br&gt;&lt;/strong&gt;Terjeszkedő vállalkozásunk több, mint 50 tehetséges és tapasztalt, saját szakterületén jól képzett főt számlál, legyen az menedzseri, grafikusi, programozói, dizájn vagy hangkészítői munka. Minden tekintetben folyamatosan igyekszünk javítani fejlesztési stratégiánkon, hogy minden egyes új játékunkkal valami újat nyújtson tehetséges, eltökélt csapatunk. Az Invictus szoftver- és hardver infrastruktúrája kiemelkedő, ami megmutatkozik a fejlesztéshez használt eszközökben, a teszteléshez és az élesben használt szerverekben, biztonsági és fáljszerverekben és alkalmazásokban.&lt;/font&gt;&lt;/font&gt;&lt;/p&gt;&lt;p align=&quot;justify&quot;&gt;&lt;font size=&quot;2&quot;&gt;&lt;strong&gt;&lt;font size=&quot;4&quot;&gt;Invictus technológia&lt;br&gt;&lt;/font&gt;&lt;/strong&gt;&lt;font&gt;&lt;span style=&quot;font-size: 10pt; font-family: Arial;&quot;&gt;&lt;font&gt;Az új generációs Invictus engine-t úgy terveztük, hogy segítségével sok különböző fajtájú platformfüggetlen és moduláris játékot készíthessünk. Meglátásunk szerint egy termék fejlesztését több módon lehet megközelíteni, ezért szívesen egyesítjük engine-ünket partnercégek technológiájával ha ezt fontosnak látjuk, persze a project ütemterv / költség igénye szerint. Engine technológiánk sikeresen vizsgázott PS2 dev kit-en, így regisztrált Sony Playstation2 és Sony Playstation3 és Apple iPhone fejlesztők vagyunk.&lt;/font&gt;&lt;/span&gt;&lt;/font&gt;&lt;/font&gt;&lt;/p&gt;&lt;p align=&quot;justify&quot;&gt;&lt;font size=&quot;2&quot;&gt;&lt;font&gt;&lt;strong&gt;&lt;font size=&quot;4&quot;&gt;Verseny és járműszimuláció&lt;/font&gt;&lt;br&gt;&lt;/strong&gt;Köztudott,hogy autós játékokra specializálódtunk, melyek a multi-player- és online technológiákat támogatják. Legújabb fizikai engine-ünket, úgy véljük a videojátékban valaha alkalmazott legpontosabb karosszéria-, futómű- és motorszimuláció képességével ruháztuk fel. Mivel minden &lt;br&gt;&lt;br&gt;&lt;br /&gt;\r\njárművünk egyedi paraméterekkel ellátott, különálló fizikai testekből épül fel, játékainkban a következő képességeket használhatjuk ki:&lt;br&gt; - Teljes testdeformáció, &quot;lifegő&quot; ajtók és más alkatrészek&lt;br&gt; - Az idő folyamán vagy nagy ütközésektől széthulló járművek&lt;br&gt; - Belső motorsérülés pontos szimulációja&lt;br&gt; - 50-nél több külön alkatrészből felépülő járművek&lt;br&gt; - Autófestés és átalakítás matricák és egyéb eszközök segítségével&lt;br&gt; - Valós idejű és &quot;játék közbeni&quot; tuning, javítás és szerelés&lt;br&gt; - 2, 4-16 kerekű járművek élethű szimulációja&lt;br&gt; - Pontos levegő- és folyadékszimuláció&lt;br&gt; - Első-, hátsó- és öszkerékhajtású járművek szimulációja&lt;br&gt; - Paraméterezhető felületszimuláció Off-road és épített út körülményekhez&lt;br&gt; - Valós működésen alapuló, újszerű alkalmazású Dyno 2000 szimuláció&lt;br&gt;&lt;br&gt;&lt;/font&gt;&lt;font&gt;&lt;strong&gt;&lt;font size=&quot;4&quot;&gt;Online játékok&lt;/font&gt;&lt;br&gt;&lt;/strong&gt;Az Invictus vallja, hogy a jövő a letölthető, online automatikusan frissülő PC Játékok felé halad. &lt;br&gt; &lt;br&gt;2005-benkezdtünk hozzá egy olyan új generációs engine kifejlesztéséhez, melyneksegítségével játékosok ezrei játszhatnak egyidejűleg egy azon szerveren. Alkalmazunk Peer to Peer és Kliens Szerver módokat, különállóan vagy akár ha szükséges, egymással is. &lt;br&gt;&lt;/font&gt;&lt;span style=&quot;font-size: 10pt; font-family: Arial;&quot;&gt;&lt;font&gt;&lt;br&gt;Az Invictus szoros együttműködésben dolgozik olyan MMO (Massively Multiplayer Online) játékok kiadóival, mint a Gamepot (Japán), Joyzone (Kína), Aeria Games Entertainment (USA) és a Gamigo (Németország). Az Invictus büszke arra, hogy az említett kiadók tapasztalataiból merítve és saját technológiai hátterére és szakmai tudására alapozva megalkotta a Level-R / Project Torque MMO Racing játékát.&lt;br&gt;&lt;/font&gt;&lt;/span&gt;&lt;span style=&quot;font-size: 10pt; font-family: Arial;&quot;&gt;&lt;font&gt;&lt;br&gt;Legújabb online játékunk számos egyedi tervezésű és több tucat licenszelt autót vonultat fel. &lt;/font&gt;&lt;/span&gt;&lt;/font&gt;&lt;/p&gt;&lt;font size=&quot;2&quot;&gt;&lt;br&gt;&lt;br /&gt;\r\n&lt;p align=&quot;justify&quot;&gt;&lt;font&gt;Jelen technológia lehetőséget ad a játékosoknak, hogy mind egyénileg, mind csapatjátékban kipróbálják önmagukat, egymással megismerkedhessenek, online bajnokságokon, továbbá &lt;br&gt;&lt;br&gt;&lt;br /&gt;\r\noff-line eseményeken részt vehessenek.  A Lever-R a következő játékmódokat tartalmazza: NASCAR, Rally, Off-Road és illegális utcai verseny. A hagyományos körversenyeken és a ‘A’-ból ‘B’ pontba eljutó játékmódokon felül, a Lever-R különféle szórakoztató játékmódokat is kínál, ilyenek például a „Capture The Flag”, „Police Chase”, „Jamboree”, „Show Off Events” és számos egyéb meglepetés.&lt;br&gt; &lt;br&gt;A játékosok több, mint 500 tartalommal gazdagíthatják a kedvenc autóikat. Ezen kiegészítők a játék &lt;br&gt;&lt;br&gt;&lt;br /&gt;\r\nCredit pontjaival vásárolhatók meg, amelyek lehetnek optikai vagy teljesítménynövelő, tuning elemek.  Nem csak autókkal kapcsolatos tartalommal lehet a játékot izgalmasabbá tenni, de olyan &lt;br&gt;&lt;br&gt;&lt;br /&gt;\r\ntartalmakkal is, mint a játék pont sokszorozóval, játékmóddal kapcsolatos tartalommakkal, belépőjegyekkel, avatar elemekkel, szponzor lányokkal, a GUI-t testreszabó elemekkel és sok mással.&lt;br&gt; &lt;br&gt;A játékosok valódi pénzért vagy virtuális pénzért vásárolhatnak Credit Pontokat (CP). A játék egy beépített internet böngészőben futtatja a kiadó online fizetési rendszerét.&lt;/font&gt;&lt;/p&gt;&lt;p align=&quot;justify&quot;&gt;&lt;font&gt;&lt;strong&gt;&lt;font size=&quot;4&quot;&gt;Játékon belüli hirdetések&lt;/font&gt;&lt;br&gt;&lt;/strong&gt;A Lever-R a legmodernebb hirdetési technológiával van ellátva, melyben a fejlesztő, a kiadó, a reklámügynökségek és maguk a hirdető cégek elektronikus úton, pontos tájékoztatást kaphatnak hirdetéseik nézettségéről régiókra, időszakokra lebontva.&lt;br&gt;&lt;br&gt;&lt;/font&gt;&lt;span&gt;&lt;strong&gt;&lt;font size=&quot;4&quot;&gt;iPhone &amp;amp; PSP játékok&lt;br&gt;&lt;/font&gt;&lt;/strong&gt;&lt;/span&gt;&lt;span style=&quot;font-size: 10pt; font-family: Arial;&quot;&gt;&lt;font&gt;Az Invictus az iPhone/iPod és PSP felületeken is forradalmian új megoldások segítségével fejleszt különféle játékokat verseny, puzzle, akció és kaland kategóriákban.&lt;/font&gt;&lt;/span&gt;&lt;/p&gt;&lt;p align=&quot;justify&quot;&gt;&lt;span style=&quot;font-size: 10pt; font-family: Arial;&quot;&gt;&lt;/span&gt;&lt;font&gt;&lt;strong&gt;&lt;font size=&quot;4&quot;&gt;Oktatás&lt;br&gt;&lt;/font&gt;&lt;/strong&gt;A Mesharray Digital Media School, ami  Magyarország legnagyobb számítógépes grafikát oktató intézménye, 2008-ban alapította oktatótermét a Debreceni Egyetem Műszaki Karán. A Mesharray Debrecen hallgatói a hivatalos, gyártók által akkreditált tananyagot az Invictus-Games Kft. szakembereinek segítségével sajátítják el. A kelet-magyarországi régióban egyedülálló 3ds Max Mesterkurzust elvégző hallgatók hivatalos gyártói oklevelet és a Debreceni Egyetem Műszaki &lt;br&gt;&lt;br&gt;&lt;br /&gt;\r\nKarán kreditpontokat kapnak. &lt;/font&gt;&lt;/p&gt;&lt;/font&gt;', '2010-08-10 21:26:50', 'invictus-games-kft', '4');

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
INSERT INTO `types` VALUES ('7', 'iphone', '1', 'iphone');
INSERT INTO `types` VALUES ('2', 'psp', '4', 'psp');
INSERT INTO `types` VALUES ('6', 'pc', '3', 'pc');
INSERT INTO `types` VALUES ('5', 'android', '2', 'android');

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
