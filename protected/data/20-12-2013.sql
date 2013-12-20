# --------------------------------------------------------
# Host:                         127.0.0.1
# Server version:               5.5.32
# Server OS:                    Win32
# HeidiSQL version:             6.0.0.3603
# Date/time:                    2013-12-20 09:25:13
# --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

# Dumping structure for table comfort.authassignment
CREATE TABLE IF NOT EXISTS `authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`),
  CONSTRAINT `authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# Dumping data for table comfort.authassignment: ~3 rows (approximately)
/*!40000 ALTER TABLE `authassignment` DISABLE KEYS */;
INSERT INTO `authassignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
	('Admin', '1', NULL, 'N;'),
	('Authenticated', '2', NULL, 'N;'),
	('Moder', '2', NULL, 'N;');
/*!40000 ALTER TABLE `authassignment` ENABLE KEYS */;


# Dumping structure for table comfort.authitem
CREATE TABLE IF NOT EXISTS `authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# Dumping data for table comfort.authitem: ~6 rows (approximately)
/*!40000 ALTER TABLE `authitem` DISABLE KEYS */;
INSERT INTO `authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
	('Admin', 2, 'Администратор', NULL, 'N;'),
	('Admin.News.*', 1, NULL, NULL, 'N;'),
	('Admin.Page.*', 1, NULL, NULL, 'N;'),
	('Authenticated', 2, 'Зарегистрированный пользователь', NULL, 'N;'),
	('Guest', 2, 'Гость', NULL, 'N;'),
	('Moder', 2, 'модератор новостей', NULL, 'N;');
/*!40000 ALTER TABLE `authitem` ENABLE KEYS */;


# Dumping structure for table comfort.authitemchild
CREATE TABLE IF NOT EXISTS `authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `authitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# Dumping data for table comfort.authitemchild: ~2 rows (approximately)
/*!40000 ALTER TABLE `authitemchild` DISABLE KEYS */;
INSERT INTO `authitemchild` (`parent`, `child`) VALUES
	('Moder', 'Admin.News.*'),
	('Moder', 'Admin.Page.*');
/*!40000 ALTER TABLE `authitemchild` ENABLE KEYS */;


# Dumping structure for table comfort.rights
CREATE TABLE IF NOT EXISTS `rights` (
  `itemname` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  PRIMARY KEY (`itemname`),
  CONSTRAINT `rights_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# Dumping data for table comfort.rights: ~0 rows (approximately)
/*!40000 ALTER TABLE `rights` DISABLE KEYS */;
/*!40000 ALTER TABLE `rights` ENABLE KEYS */;


# Dumping structure for table comfort.tbl_categories
CREATE TABLE IF NOT EXISTS `tbl_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(300) DEFAULT NULL,
  `is_enabled` enum('1','0') DEFAULT '1',
  `is_inbloglist` enum('1','0') DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `title` (`title`(255))
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

# Dumping data for table comfort.tbl_categories: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_categories` DISABLE KEYS */;
INSERT INTO `tbl_categories` (`id`, `title`, `is_enabled`, `is_inbloglist`) VALUES
	(1, 'Новости компании', '1', '1'),
	(2, 'Хз', '1', '1');
/*!40000 ALTER TABLE `tbl_categories` ENABLE KEYS */;


# Dumping structure for table comfort.tbl_events_events
CREATE TABLE IF NOT EXISTS `tbl_events_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `description` text NOT NULL,
  `color` char(15) DEFAULT '#3865a8',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

# Dumping data for table comfort.tbl_events_events: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbl_events_events` DISABLE KEYS */;
INSERT INTO `tbl_events_events` (`id`, `title`, `date_start`, `date_end`, `description`, `color`) VALUES
	(1, 'Бухаем в Тамбове', '2013-06-11', '2013-06-11', '<p>Подскажите куда можно сходить/съездить в Тамбове на новогодних выходных. Хочу спланировать отдых с парнем. Может есть какие-нибудь лыжные базы, может горки - где можно поучиться на горных лыжах или сноуборде. есть ли катки? и где лучше всего кататься(хороший лед и не битком народу). Чем можно еще заняться в тамбове итересным? Видела есть улица Ипподромная? Можно ли покататься на лошадях?? ))<p><img src="/uploads/admin/index//b96d4e6c273bfc478cdfe4e70104b734.jpg" style="width: 231.0528967254408px; height: 208px; float: right; margin: 0px 0px 10px 10px;" alt=""></p></p><p>tyurturturtutyu</p><p></p><p></p><p></p>\r\n', '#3aa838'),
	(2, 'Вечеринка у слесарей', '2013-06-14', '2013-06-14', '<p>ФЫВфыв</p>', '#3865a8'),
	(3, 'Свадьба у Толяна', '2013-06-14', '2013-06-15', '<p>ФЫВфыв</p>', '#a83845');
/*!40000 ALTER TABLE `tbl_events_events` ENABLE KEYS */;


# Dumping structure for table comfort.tbl_events_reserve
CREATE TABLE IF NOT EXISTS `tbl_events_reserve` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `contacts` text NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `description` text,
  `visited` enum('1','0') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# Dumping data for table comfort.tbl_events_reserve: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_events_reserve` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_events_reserve` ENABLE KEYS */;


# Dumping structure for table comfort.tbl_gallery
CREATE TABLE IF NOT EXISTS `tbl_gallery` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `thumbnail` varchar(500) DEFAULT NULL,
  `title` varchar(500) DEFAULT NULL,
  `is_published` enum('1','0') NOT NULL DEFAULT '1',
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

# Dumping data for table comfort.tbl_gallery: ~1 rows (approximately)
/*!40000 ALTER TABLE `tbl_gallery` DISABLE KEYS */;
INSERT INTO `tbl_gallery` (`id`, `thumbnail`, `title`, `is_published`, `created`) VALUES
	(17, '/uploads/gallery/title/51dbb132a738b07-06_present-ronaldo_press_15.jpg', 'ХЗ', '1', '2013-07-09 12:43:46');
/*!40000 ALTER TABLE `tbl_gallery` ENABLE KEYS */;


# Dumping structure for table comfort.tbl_galleryphotos
CREATE TABLE IF NOT EXISTS `tbl_galleryphotos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(255) DEFAULT NULL,
  `thumb` varchar(500) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `gallery_id` int(10) unsigned NOT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `gallery_id` (`gallery_id`)
) ENGINE=InnoDB AUTO_INCREMENT=186 DEFAULT CHARSET=utf8;

# Dumping data for table comfort.tbl_galleryphotos: ~10 rows (approximately)
/*!40000 ALTER TABLE `tbl_galleryphotos` DISABLE KEYS */;
INSERT INTO `tbl_galleryphotos` (`id`, `title`, `thumb`, `image`, `gallery_id`, `created`) VALUES
	(176, NULL, '/uploads/gallery/thumb/51dbb149f1da801043_lakemapourikanewzealand_1280x800.jpg', '/uploads/gallery/original/51dbb149f1da801043_lakemapourikanewzealand_1280x800.jpg', 17, '2013-07-09 12:44:26'),
	(177, NULL, '/uploads/gallery/thumb/51dbb14a653cd01045_macrosun_1280x800.jpg', '/uploads/gallery/original/51dbb14a653cd01045_macrosun_1280x800.jpg', 17, '2013-07-09 12:44:26'),
	(178, NULL, '/uploads/gallery/thumb/51dbb14aacf5101050_doubtfullsoundnewzealand_1280x800.jpg', '/uploads/gallery/original/51dbb14aacf5101050_doubtfullsoundnewzealand_1280x800.jpg', 17, '2013-07-09 12:44:26'),
	(179, NULL, '/uploads/gallery/thumb/51dbb14b03fe301051_purplemood_1280x800.jpg', '/uploads/gallery/original/51dbb14b03fe301051_purplemood_1280x800.jpg', 17, '2013-07-09 12:44:27'),
	(180, NULL, '/uploads/gallery/thumb/51dbb14b490b801075_goodbyebluesky_1280x800.jpg', '/uploads/gallery/original/51dbb14b490b801075_goodbyebluesky_1280x800.jpg', 17, '2013-07-09 12:44:27'),
	(181, NULL, '/uploads/gallery/thumb/51dbb14b8e5a801077_spidersweb_1280x800.jpg', '/uploads/gallery/original/51dbb14b8e5a801077_spidersweb_1280x800.jpg', 17, '2013-07-09 12:44:27'),
	(182, NULL, '/uploads/gallery/thumb/51dbb14bd7e1d01082_januarynightsky_1280x800.jpg', '/uploads/gallery/original/51dbb14bd7e1d01082_januarynightsky_1280x800.jpg', 17, '2013-07-09 12:44:27'),
	(183, NULL, '/uploads/gallery/thumb/51dbb14c2f74601083_venturabeachdriftwood_1280x800.jpg', '/uploads/gallery/original/51dbb14c2f74601083_venturabeachdriftwood_1280x800.jpg', 17, '2013-07-09 12:44:28'),
	(184, NULL, '/uploads/gallery/thumb/51dbb14c76b9101037_aloneinthepark_1280x800.jpg', '/uploads/gallery/original/51dbb14c76b9101037_aloneinthepark_1280x800.jpg', 17, '2013-07-09 12:44:28'),
	(185, NULL, '/uploads/gallery/thumb/51dbb14cbfb3101041_skyabovechina_1280x800.jpg', '/uploads/gallery/original/51dbb14cbfb3101041_skyabovechina_1280x800.jpg', 17, '2013-07-09 12:44:28');
/*!40000 ALTER TABLE `tbl_galleryphotos` ENABLE KEYS */;


# Dumping structure for table comfort.tbl_lunch_main
CREATE TABLE IF NOT EXISTS `tbl_lunch_main` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

# Dumping data for table comfort.tbl_lunch_main: ~1 rows (approximately)
/*!40000 ALTER TABLE `tbl_lunch_main` DISABLE KEYS */;
INSERT INTO `tbl_lunch_main` (`id`, `description`) VALUES
	(1, 'Бизнес-ланч - это комплексный обед деловых людей в середине рабочего дня, когда можно за доступную цену быстро и вкусно поесть.');
/*!40000 ALTER TABLE `tbl_lunch_main` ENABLE KEYS */;


# Dumping structure for table comfort.tbl_lunch_products
CREATE TABLE IF NOT EXISTS `tbl_lunch_products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(1000) NOT NULL,
  `description` text,
  `weight` varchar(50) DEFAULT NULL,
  `price` float DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

# Dumping data for table comfort.tbl_lunch_products: ~5 rows (approximately)
/*!40000 ALTER TABLE `tbl_lunch_products` DISABLE KEYS */;
INSERT INTO `tbl_lunch_products` (`id`, `title`, `description`, `weight`, `price`) VALUES
	(1, 'Суп гороховый!', '400г свинины, 300г картофеля (4-5 шт.), 200г лука (2 шт. среднего размера), 150г моркови (2 шт. среднего размера), 250г.', '300', 100),
	(4, 'Пельмени с щавелем', 'тыц тыц тыц', '300', 150),
	(5, 'rty', '', '56465', 0),
	(6, 'ryrety', 'tyetyrty', 'yrty', 651),
	(8, 'werwer', '3fef', '123', 324.43);
/*!40000 ALTER TABLE `tbl_lunch_products` ENABLE KEYS */;


# Dumping structure for table comfort.tbl_menu
CREATE TABLE IF NOT EXISTS `tbl_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lft` int(10) unsigned NOT NULL,
  `rgt` int(10) unsigned NOT NULL,
  `access` enum('1','2','3') NOT NULL DEFAULT '1',
  `root` int(10) DEFAULT NULL,
  `level` smallint(5) unsigned NOT NULL,
  `title` char(100) DEFAULT NULL,
  `link` varchar(400) DEFAULT '#',
  PRIMARY KEY (`id`),
  KEY `lft` (`lft`),
  KEY `rgt` (`rgt`),
  KEY `level` (`level`),
  KEY `root` (`root`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

# Dumping data for table comfort.tbl_menu: ~8 rows (approximately)
/*!40000 ALTER TABLE `tbl_menu` DISABLE KEYS */;
INSERT INTO `tbl_menu` (`id`, `lft`, `rgt`, `access`, `root`, `level`, `title`, `link`) VALUES
	(1, 1, 16, '3', 1, 1, 'Корень', '#'),
	(21, 2, 3, '1', NULL, 2, 'Главная', '/'),
	(22, 6, 7, '1', NULL, 2, 'Каталог', '/shop'),
	(24, 8, 9, '1', NULL, 2, 'О компании', '/about'),
	(25, 4, 5, '1', NULL, 2, 'Новости', '/news'),
	(26, 10, 11, '1', NULL, 2, 'События', '/events'),
	(27, 12, 13, '1', NULL, 2, 'Ланч', '/lunch'),
	(28, 14, 15, '1', NULL, 2, 'Фото', '/gallery');
/*!40000 ALTER TABLE `tbl_menu` ENABLE KEYS */;


# Dumping structure for table comfort.tbl_migration
CREATE TABLE IF NOT EXISTS `tbl_migration` (
  `version` varchar(255) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# Dumping data for table comfort.tbl_migration: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbl_migration` DISABLE KEYS */;
INSERT INTO `tbl_migration` (`version`, `apply_time`) VALUES
	('m000000_000000_base', 1360126042),
	('m110805_153437_installYiiUser', 1360126058),
	('m110810_162301_userTimestampFix', 1360126058);
/*!40000 ALTER TABLE `tbl_migration` ENABLE KEYS */;


# Dumping structure for table comfort.tbl_news
CREATE TABLE IF NOT EXISTS `tbl_news` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(255) NOT NULL DEFAULT '',
  `introtext` mediumtext NOT NULL,
  `fulltext` mediumtext NOT NULL,
  `is_published` enum('1','0') NOT NULL DEFAULT '1',
  `is_onfrontpage` enum('1','0') NOT NULL DEFAULT '1',
  `user_id` int(11) DEFAULT NULL,
  `catid` int(11) unsigned NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `metakey` text,
  `metadesc` text,
  `alias_url` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `title` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

# Dumping data for table comfort.tbl_news: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbl_news` DISABLE KEYS */;
INSERT INTO `tbl_news` (`id`, `title`, `alias`, `introtext`, `fulltext`, `is_published`, `is_onfrontpage`, `user_id`, `catid`, `created`, `modified`, `metakey`, `metadesc`, `alias_url`) VALUES
	(3, 'вапв вапвап', '', '<p>\r\n	 546456\r\n</p>', '<p>\r\n	 rtrtyery\r\n</p>', '1', '1', 1, 1, '2013-09-05 05:48:17', '2013-09-05 05:48:56', '', '', 'vapv-vapvap6'),
	(4, 'yyui', '', '<p>\r\n	trut\r\n</p>', '<p>\r\n	tyurtu\r\n</p>', '1', '1', 1, 1, '2013-09-05 05:49:41', '2013-09-05 05:49:41', '', '', 'privet-vsem'),
	(5, 'j', '', '<p>\r\n	ghj\r\n</p>', '', '1', '1', 1, 1, '2013-10-16 10:45:01', '2013-10-16 10:45:01', '', '', 'j');
/*!40000 ALTER TABLE `tbl_news` ENABLE KEYS */;


# Dumping structure for table comfort.tbl_page
CREATE TABLE IF NOT EXISTS `tbl_page` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(300) NOT NULL,
  `content` text,
  `metakey` varchar(300) DEFAULT NULL,
  `metadesc` varchar(300) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `is_published` enum('1','0') DEFAULT '1',
  `alias_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `title` (`title`(255))
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

# Dumping data for table comfort.tbl_page: ~7 rows (approximately)
/*!40000 ALTER TABLE `tbl_page` DISABLE KEYS */;
INSERT INTO `tbl_page` (`id`, `title`, `content`, `metakey`, `metadesc`, `updated_at`, `is_published`, `alias_url`) VALUES
	(1, 'О компании', '<p>\n	  Текст о компании!\n</p>', '', '', '2013-02-11 10:05:05', '1', 'about'),
	(2, 'Новая страница6', '<p>yi</p>', 'tyi', 'tyi', '2013-03-26 15:30:43', '1', 'sdf'),
	(4, 'fghfgh', '<p>fghfgh</p>', '', '', '2013-03-26 15:46:22', '1', '4-about'),
	(5, 'Просто новая страница', '<h2 style="text-align: center;">Заголовок</h2><div>Салют</div>', '', '', '2013-04-17 15:36:25', '1', 'newpage'),
	(6, 'Всем Привет', '<p>\r\n	Привет\r\n</p>', '', '', '2013-09-05 09:51:28', '1', 'vsem-privet'),
	(7, 'Еще раз привет', '<p>\r\n	выаыва\r\n</p>', '', '', '2013-09-05 09:52:04', '1', '-vsem-privet'),
	(8, 'Ветром в голову надуло', '', '', '', '2013-09-05 09:52:57', '1', 'tulula_tulula');
/*!40000 ALTER TABLE `tbl_page` ENABLE KEYS */;


# Dumping structure for table comfort.tbl_profiles
CREATE TABLE IF NOT EXISTS `tbl_profiles` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `aboutme` text NOT NULL,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `user_profile_id` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

# Dumping data for table comfort.tbl_profiles: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_profiles` DISABLE KEYS */;
INSERT INTO `tbl_profiles` (`user_id`, `first_name`, `last_name`, `aboutme`) VALUES
	(1, 'Administrator', 'Admin', 'Администратор'),
	(2, '', '', '');
/*!40000 ALTER TABLE `tbl_profiles` ENABLE KEYS */;


# Dumping structure for table comfort.tbl_profiles_fields
CREATE TABLE IF NOT EXISTS `tbl_profiles_fields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `varname` varchar(50) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  `field_type` varchar(50) NOT NULL DEFAULT '',
  `field_size` int(3) NOT NULL DEFAULT '0',
  `field_size_min` int(3) NOT NULL DEFAULT '0',
  `required` int(1) NOT NULL DEFAULT '0',
  `match` varchar(255) NOT NULL DEFAULT '',
  `range` varchar(255) NOT NULL DEFAULT '',
  `error_message` varchar(255) NOT NULL DEFAULT '',
  `other_validator` text,
  `default` varchar(255) NOT NULL DEFAULT '',
  `widget` varchar(255) NOT NULL DEFAULT '',
  `widgetparams` text,
  `position` int(3) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

# Dumping data for table comfort.tbl_profiles_fields: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbl_profiles_fields` DISABLE KEYS */;
INSERT INTO `tbl_profiles_fields` (`id`, `varname`, `title`, `field_type`, `field_size`, `field_size_min`, `required`, `match`, `range`, `error_message`, `other_validator`, `default`, `widget`, `widgetparams`, `position`, `visible`) VALUES
	(1, 'first_name', 'First Name', 'VARCHAR', 255, 3, 2, '', '', 'Incorrect First Name (length between 3 and 50 characters).', '', '', '', '', 1, 3),
	(2, 'last_name', 'Last Name', 'VARCHAR', 255, 3, 2, '', '', 'Incorrect Last Name (length between 3 and 50 characters).', '', '', '', '', 2, 3),
	(5, 'aboutme', 'О пользователе', 'TEXT', 0, 10, 0, '', '', '', '', '', '', '', 3, 3);
/*!40000 ALTER TABLE `tbl_profiles_fields` ENABLE KEYS */;


# Dumping structure for table comfort.tbl_shop_accessories
CREATE TABLE IF NOT EXISTS `tbl_shop_accessories` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `product_id` int(50) unsigned NOT NULL,
  `acc_id` int(50) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `FK_tbl_shop_accessories_tbl_shop_products` FOREIGN KEY (`product_id`) REFERENCES `tbl_shop_products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=utf8;

# Dumping data for table comfort.tbl_shop_accessories: ~27 rows (approximately)
/*!40000 ALTER TABLE `tbl_shop_accessories` DISABLE KEYS */;
INSERT INTO `tbl_shop_accessories` (`id`, `product_id`, `acc_id`) VALUES
	(42, 5, 20),
	(45, 5, 19),
	(46, 5, 1),
	(47, 5, 21),
	(50, 19, 5),
	(63, 19, 1),
	(83, 31, 20),
	(84, 31, 19),
	(86, 31, 21),
	(87, 32, 20),
	(88, 32, 19),
	(89, 32, 1),
	(90, 32, 21),
	(104, 31, 32),
	(105, 1, 1),
	(106, 1, 2),
	(107, 1, 32),
	(108, 1, 35),
	(109, 33, 1),
	(110, 33, 2),
	(111, 33, 5),
	(112, 33, 19),
	(113, 38, 1),
	(114, 38, 2),
	(115, 38, 32),
	(116, 38, 35),
	(117, 33, 21);
/*!40000 ALTER TABLE `tbl_shop_accessories` ENABLE KEYS */;


# Dumping structure for table comfort.tbl_shop_adds_groups
CREATE TABLE IF NOT EXISTS `tbl_shop_adds_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(200) NOT NULL,
  `active` enum('1','0') DEFAULT '1',
  `multichoice` enum('1','0') NOT NULL DEFAULT '0',
  `withprice` enum('1','0') NOT NULL DEFAULT '0',
  `withstock` enum('1','0') NOT NULL DEFAULT '0',
  `product_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_tbl_shop_adds_groups_tbl_shop_products` (`product_id`),
  CONSTRAINT `FK_tbl_shop_adds_groups_tbl_shop_products` FOREIGN KEY (`product_id`) REFERENCES `tbl_shop_products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

# Dumping data for table comfort.tbl_shop_adds_groups: ~4 rows (approximately)
/*!40000 ALTER TABLE `tbl_shop_adds_groups` DISABLE KEYS */;
INSERT INTO `tbl_shop_adds_groups` (`id`, `title`, `active`, `multichoice`, `withprice`, `withstock`, `product_id`) VALUES
	(3, 'хз', '1', '0', '0', '0', 5),
	(11, 'Опция 1', '1', '0', '1', '1', 31),
	(12, 'Цвет', '1', '0', '0', '1', 35),
	(13, 'Доп. услуги', '1', '1', '1', '0', 35);
/*!40000 ALTER TABLE `tbl_shop_adds_groups` ENABLE KEYS */;


# Dumping structure for table comfort.tbl_shop_adds_items
CREATE TABLE IF NOT EXISTS `tbl_shop_adds_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` int(10) unsigned NOT NULL,
  `in_stock` int(10) NOT NULL DEFAULT '0',
  `title` char(100) NOT NULL,
  `price` tinyint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_tbl_shop_adds_items_tbl_shop_adds_groups` (`group_id`),
  CONSTRAINT `FK_tbl_shop_adds_items_tbl_shop_adds_groups` FOREIGN KEY (`group_id`) REFERENCES `tbl_shop_adds_groups` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

# Dumping data for table comfort.tbl_shop_adds_items: ~7 rows (approximately)
/*!40000 ALTER TABLE `tbl_shop_adds_items` DISABLE KEYS */;
INSERT INTO `tbl_shop_adds_items` (`id`, `group_id`, `in_stock`, `title`, `price`) VALUES
	(1, 11, 21, 'Пункт 1', 10),
	(2, 13, 10, 'Настроить интернет', 100),
	(3, 13, 0, 'Наклеить плёнку', 50),
	(4, 12, 120, 'Синий', 0),
	(5, 12, 50, 'Зелёный', 0),
	(7, 3, 0, 'Опция 1', 0),
	(8, 13, 0, 'Надежная упаковка', 20);
/*!40000 ALTER TABLE `tbl_shop_adds_items` ENABLE KEYS */;


# Dumping structure for table comfort.tbl_shop_adds_sessions
CREATE TABLE IF NOT EXISTS `tbl_shop_adds_sessions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `session_id` char(32) NOT NULL,
  `product_id` int(10) DEFAULT NULL,
  `optionkit_id` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_tbl_shop_adds_sessions_yiisession` (`session_id`),
  CONSTRAINT `FK_tbl_shop_adds_sessions_yiisession` FOREIGN KEY (`session_id`) REFERENCES `yiisession` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# Dumping data for table comfort.tbl_shop_adds_sessions: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_shop_adds_sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_shop_adds_sessions` ENABLE KEYS */;


# Dumping structure for table comfort.tbl_shop_attribute_titles
CREATE TABLE IF NOT EXISTS `tbl_shop_attribute_titles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(300) NOT NULL,
  `category_id` int(50) NOT NULL,
  `measure` varchar(50) NOT NULL,
  `default_value` varchar(50) NOT NULL,
  `type` int(1) NOT NULL DEFAULT '1',
  `in_search` enum('1','0') DEFAULT '1',
  `pos` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8;

# Dumping data for table comfort.tbl_shop_attribute_titles: ~5 rows (approximately)
/*!40000 ALTER TABLE `tbl_shop_attribute_titles` DISABLE KEYS */;
INSERT INTO `tbl_shop_attribute_titles` (`id`, `title`, `category_id`, `measure`, `default_value`, `type`, `in_search`, `pos`) VALUES
	(6, 'Глубина', 14, 'См', '', 2, '1', 0),
	(88, 'Высота', 14, 'См', '345', 2, '1', 2),
	(90, 'Ширина', 14, 'См', '', 1, '1', 1),
	(92, 'Глубина', 3, 'См', '', 1, '1', 0),
	(93, 'Объем', 3, 'л', '', 1, '1', 1);
/*!40000 ALTER TABLE `tbl_shop_attribute_titles` ENABLE KEYS */;


# Dumping structure for table comfort.tbl_shop_attrs
CREATE TABLE IF NOT EXISTS `tbl_shop_attrs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `attribute_id` int(10) NOT NULL,
  `attr_valueid` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `attribute_id` (`attribute_id`),
  KEY `attr_valueid` (`attr_valueid`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

# Dumping data for table comfort.tbl_shop_attrs: ~15 rows (approximately)
/*!40000 ALTER TABLE `tbl_shop_attrs` DISABLE KEYS */;
INSERT INTO `tbl_shop_attrs` (`id`, `product_id`, `attribute_id`, `attr_valueid`) VALUES
	(5, 1, 6, 1142),
	(7, 1, 88, 1145),
	(8, 1, 90, 1146),
	(10, 5, 93, 1148),
	(12, 26, 93, 1148),
	(14, 28, 93, 1148),
	(16, 29, 93, 1148),
	(18, 30, 93, 1148),
	(20, 31, 93, 1148),
	(22, 32, 93, 1148),
	(23, 32, 92, 1149),
	(30, 31, 92, 1150),
	(31, 38, 6, 1142),
	(32, 38, 88, 1145),
	(33, 38, 90, 1146);
/*!40000 ALTER TABLE `tbl_shop_attrs` ENABLE KEYS */;


# Dumping structure for table comfort.tbl_shop_attr_value
CREATE TABLE IF NOT EXISTS `tbl_shop_attr_value` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `attr_id` int(10) NOT NULL,
  `value` varchar(1500) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `value` (`value`(255))
) ENGINE=InnoDB AUTO_INCREMENT=1151 DEFAULT CHARSET=utf8;

# Dumping data for table comfort.tbl_shop_attr_value: ~225 rows (approximately)
/*!40000 ALTER TABLE `tbl_shop_attr_value` DISABLE KEYS */;
INSERT INTO `tbl_shop_attr_value` (`id`, `attr_id`, `value`) VALUES
	(716, 90, '280'),
	(718, 92, '0'),
	(720, 94, 'чёрный матовый'),
	(721, 90, '300'),
	(726, 90, '320'),
	(731, 90, '340'),
	(736, 90, '360'),
	(769, 92, '1'),
	(770, 93, 'алюминий'),
	(781, 95, '9'),
	(782, 96, '360'),
	(783, 97, '120'),
	(784, 98, '170'),
	(785, 102, '6'),
	(786, 101, 'чугун'),
	(787, 103, '8'),
	(788, 104, '1'),
	(795, 103, '11'),
	(797, 95, '4'),
	(798, 96, '300'),
	(800, 98, '130'),
	(801, 102, '5'),
	(804, 103, '4'),
	(805, 105, 'есть в наличии'),
	(815, 95, '6'),
	(816, 96, '330'),
	(818, 98, '140'),
	(822, 103, '5'),
	(831, 103, '5'),
	(833, 95, '8'),
	(834, 96, '345'),
	(835, 98, '145'),
	(836, 99, '330'),
	(837, 100, '40'),
	(841, 103, '12'),
	(845, 97, '100'),
	(853, 96, '350'),
	(855, 98, '160'),
	(859, 103, '7'),
	(872, 95, '12'),
	(873, 96, '400'),
	(874, 98, '150'),
	(878, 103, '10'),
	(882, 98, '180'),
	(888, 95, '18'),
	(889, 96, '460'),
	(890, 98, '200'),
	(894, 103, '13'),
	(896, 95, '20'),
	(897, 96, '480'),
	(902, 103, '15'),
	(904, 95, '22'),
	(905, 96, '500'),
	(906, 98, '210'),
	(910, 103, '16'),
	(912, 95, '25'),
	(914, 98, '240'),
	(920, 95, '40'),
	(921, 96, '565'),
	(922, 98, '330'),
	(924, 104, '0'),
	(926, 103, '20'),
	(927, 105, 'под заказ'),
	(928, 95, '10'),
	(929, 96, '325'),
	(930, 97, '140'),
	(931, 98, '190'),
	(938, 96, '280'),
	(944, 103, '6'),
	(948, 98, '175'),
	(954, 93, 'чугун'),
	(955, 94, 'серебристый'),
	(956, 102, '7'),
	(957, 102, '8'),
	(958, 95, '100'),
	(959, 95, '3'),
	(960, 96, '210'),
	(961, 98, '110'),
	(962, 103, '3'),
	(963, 96, '220'),
	(964, 98, '120'),
	(965, 95, '5'),
	(966, 96, '240'),
	(967, 96, '250'),
	(968, 96, '260'),
	(970, 90, '200'),
	(972, 90, '220'),
	(973, 90, '240'),
	(975, 90, '290'),
	(981, 89, '4'),
	(982, 106, '230'),
	(983, 87, '120'),
	(984, 108, 'чугун'),
	(985, 109, 'термостекло'),
	(986, 86, 'белая эмаль'),
	(987, 88, 'красный'),
	(988, 107, 'есть в наличии'),
	(989, 89, '5'),
	(990, 106, '250'),
	(991, 109, 'чугун'),
	(992, 89, '7'),
	(993, 106, '280'),
	(994, 87, '130'),
	(995, 89, '6'),
	(996, 89, '3'),
	(997, 88, 'синий'),
	(999, 88, 'оранжевый'),
	(1000, 86, 'без покрытия'),
	(1001, 88, 'чёрный матовый'),
	(1002, 110, '330x230'),
	(1005, 111, 'есть в наличии'),
	(1009, 112, 'есть в наличии'),
	(1010, 112, 'временно отсутствует'),
	(1012, 114, '70'),
	(1013, 115, '30'),
	(1015, 116, '90'),
	(1017, 118, '70'),
	(1018, 119, '30'),
	(1019, 120, '15'),
	(1020, 114, '110'),
	(1022, 121, '2'),
	(1029, 114, '85'),
	(1030, 115, '40'),
	(1032, 116, '97'),
	(1033, 116, '75'),
	(1035, 114, '80'),
	(1045, 102, '9'),
	(1046, 103, '9'),
	(1047, 96, '450'),
	(1048, 98, '230'),
	(1049, 105, 'уточнять по наличию'),
	(1050, 95, '70'),
	(1051, 96, '650'),
	(1052, 98, '360'),
	(1053, 103, '35'),
	(1055, 88, 'тёмно коричневый'),
	(1056, 89, '2.5'),
	(1057, 87, '100'),
	(1058, 106, '210'),
	(1059, 89, '6.5'),
	(1060, 89, '3.5'),
	(1061, 89, '2.2'),
	(1063, 89, '2'),
	(1064, 106, '200'),
	(1065, 106, '240'),
	(1066, 87, '115'),
	(1067, 89, '5.5'),
	(1068, 106, '260'),
	(1069, 87, '125'),
	(1070, 89, '8'),
	(1071, 106, '300'),
	(1072, 87, '140'),
	(1073, 90, '370'),
	(1074, 90, '210'),
	(1075, 90, '270'),
	(1076, 94, 'коричневая эмаль'),
	(1077, 94, 'оранжевая эмаль'),
	(1078, 90, '250'),
	(1079, 96, '270'),
	(1080, 103, '3.5'),
	(1081, 122, '500'),
	(1082, 123, '300'),
	(1083, 124, '300'),
	(1084, 125, '2'),
	(1085, 126, '1'),
	(1086, 128, '1.5'),
	(1087, 127, 'нержавеющая сталь'),
	(1088, 129, 'есть в наличии'),
	(1089, 122, '400'),
	(1090, 123, '350'),
	(1091, 124, '250'),
	(1092, 127, 'чёрная сталь'),
	(1093, 122, '350'),
	(1094, 123, '250'),
	(1095, 124, '150'),
	(1096, 122, '450'),
	(1097, 124, '200'),
	(1098, 128, '1'),
	(1099, 122, '330'),
	(1100, 122, '300'),
	(1101, 122, '420'),
	(1102, 123, '260'),
	(1103, 124, '210'),
	(1104, 128, '0.8'),
	(1105, 107, 'временно отсутствует'),
	(1106, 106, '220'),
	(1107, 88, 'красный глянец'),
	(1108, 105, 'временно отсутствует'),
	(1109, 96, '560'),
	(1110, 98, '300'),
	(1111, 133, '40'),
	(1112, 134, '30'),
	(1113, 135, '15'),
	(1114, 136, '38'),
	(1115, 137, '1'),
	(1116, 138, 'чёрная сталь'),
	(1117, 139, 'есть в наличии'),
	(1118, 137, '1.5'),
	(1119, 133, '72'),
	(1120, 136, '72'),
	(1121, 133, '50'),
	(1122, 137, '0.8'),
	(1123, 140, '70'),
	(1124, 141, '670'),
	(1125, 142, '370'),
	(1126, 143, '7'),
	(1127, 144, '0'),
	(1129, 146, '15'),
	(1131, 140, '100'),
	(1132, 141, '840'),
	(1133, 146, '20'),
	(1134, 140, '28'),
	(1135, 141, '580'),
	(1136, 142, '300'),
	(1137, 143, '5'),
	(1138, 144, '1'),
	(1139, 147, 'есть в наличии'),
	(1140, 145, 'алюминий'),
	(1141, 6, '234'),
	(1142, 6, '34'),
	(1145, 88, '3455'),
	(1146, 90, '7567'),
	(1148, 93, '120'),
	(1149, 92, '1234'),
	(1150, 92, '567');
/*!40000 ALTER TABLE `tbl_shop_attr_value` ENABLE KEYS */;


# Dumping structure for table comfort.tbl_shop_categories
CREATE TABLE IF NOT EXISTS `tbl_shop_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lft` int(10) unsigned NOT NULL,
  `thumbnail` varchar(500) DEFAULT NULL,
  `rgt` int(10) unsigned NOT NULL,
  `level` smallint(5) unsigned NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `description` text,
  `active` enum('1','0') DEFAULT '1',
  `alias_url` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lft` (`lft`),
  KEY `rgt` (`rgt`),
  KEY `level` (`level`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

# Dumping data for table comfort.tbl_shop_categories: ~12 rows (approximately)
/*!40000 ALTER TABLE `tbl_shop_categories` DISABLE KEYS */;
INSERT INTO `tbl_shop_categories` (`id`, `lft`, `thumbnail`, `rgt`, `level`, `title`, `meta_description`, `meta_keywords`, `description`, `active`, `alias_url`) VALUES
	(1, 1, NULL, 24, 1, 'Каталог', NULL, NULL, NULL, '1', NULL),
	(2, 18, '/uploads/shop/title/5135a0fb8b3c654c34e9ae4.jpg', 21, 2, 'Детские', '57', '5674', 'Описание Товаров 1!В мебельных магазинах Екатеринбурга, от разнообразия&nbsp;<a href="http://kupe66.ru/">шкафов-купе</a>, можно просто напросто растеряться. Чтобы не запутаться с выбором, мы советуем вам не искать готовый, а заказать шкаф-купе по своему вкусу. Компания "Фаворит Урал" может стать вам помощником, ведь в области производства шкафов-купе она работает с 2003года. Специалисты компании сами снимают все необходимые размеры, создают эскиз, изготавливают составляющие&nbsp;<b>шкафа купе</b>&nbsp;и собирают его на месте.\r\n', '1', NULL),
	(3, 10, '/uploads/shop/title/5131d1de45fb9meshok.jpg', 11, 2, 'Шкафы-купе', '', '', 'Кухни на заказ от компании «Мария» — это яркий дизайн и широкий модельный ряд кухонной мебели от классики до модерна. Удобство, функциональность и эргономичность кухни обеспечиваются за счет использования надежной фурнитуры, аксессуаров для мебели и встраиваемой техники от ведущих мировых производителей.', '1', '3-kupeshka'),
	(6, 22, '/uploads/shop/title/512a34a5410aaarticle-0-0156545f00000578-671_468x437.jpg', 23, 2, 'Кухни', '', '', 'tyu', '1', NULL),
	(11, 16, '/uploads/shop/title/5131e331b6c154.jpg', 17, 2, 'Шкафчики, ёпт', '', '', '', '1', NULL),
	(12, 19, '/uploads/shop/title/5170d84a257abbfr62mycmaihorz.jpg', 20, 3, 'Детские кроватки', '', '', '', '1', NULL),
	(13, 6, '/uploads/shop/title/5131d2ad6f42dpost-3-13404004084030.jpg', 7, 2, 'Гостиные', 'фывфыв', '', '', '1', NULL),
	(14, 12, '/uploads/shop/title/5131e1e20427b05uv2.jpg', 13, 2, 'Прихожие', '', '', '<p>&nbsp;В нашем каталоге представлен широкий ассортимент&nbsp;мебели для<b>прихожих</b>&nbsp;(с&nbsp;<b>фото</b>&nbsp;и ценами), которую можно приобрести в&nbsp;Екатеринбурге.<br></p>\r\n', '1', '14-kupeshka'),
	(16, 4, NULL, 5, 2, 'Торговое оборудование', '', '', '', '1', NULL),
	(17, 14, NULL, 15, 2, 'Ортопедические основания', '', '', '', '1', '17-kupeshka'),
	(18, 2, '/uploads/shop/title/5188835486e9971052.jpg', 3, 2, 'Мобильные телефоны', '', '', '<p>Мы специализируемся на продаже сотовых телефонов. И, основываясь на своем опыте, сможем посоветовать модель, которая будет соответствовать Вашим пожеланиям. И подберем к ней наиболее необходимый аксессуар.<br></p>', '1', 'phones'),
	(19, 8, '/uploads/shop/title/5191c69e50822ambulance-car.png', 9, 2, 'Хз чё', '', '', '', '1', 'hzche');
/*!40000 ALTER TABLE `tbl_shop_categories` ENABLE KEYS */;


# Dumping structure for table comfort.tbl_shop_gallery
CREATE TABLE IF NOT EXISTS `tbl_shop_gallery` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) NOT NULL,
  `thumbnail` varchar(500) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;

# Dumping data for table comfort.tbl_shop_gallery: ~30 rows (approximately)
/*!40000 ALTER TABLE `tbl_shop_gallery` DISABLE KEYS */;
INSERT INTO `tbl_shop_gallery` (`id`, `product_id`, `thumbnail`, `image`) VALUES
	(17, 17, '/uploads/shop/gallery/thumb/512cb32394847916500537.jpg', '/uploads/shop/gallery/title/512cb32394847916500537.jpg'),
	(18, 17, '/uploads/shop/gallery/thumb/512cb32394847Black_Labrador_Retrievers_portrait.jpg', '/uploads/shop/gallery/title/512cb32394847Black_Labrador_Retrievers_portrait.jpg'),
	(19, 5, '/uploads/shop/gallery/thumb/5131e0e7a1d81Jessica_Alba_Main.jpg', '/uploads/shop/gallery/title/5131e0e7a1d81Jessica_Alba_Main.jpg'),
	(21, 5, '/uploads/shop/gallery/thumb/5131e0e7a1d81jessica-alba-011-1920x1200.jpg', '/uploads/shop/gallery/title/5131e0e7a1d81jessica-alba-011-1920x1200.jpg'),
	(22, 5, '/uploads/shop/gallery/thumb/513340e07bdceXr_YKG8KTBel.jpg', '/uploads/shop/gallery/title/513340e07bdceXr_YKG8KTBel.jpg'),
	(24, 5, '/uploads/shop/gallery/thumb/513340e07bdcejessica-alba-im-alltags-look-600x900-615109.jpg', '/uploads/shop/gallery/title/513340e07bdcejessica-alba-im-alltags-look-600x900-615109.jpg'),
	(25, 5, '/uploads/shop/gallery/thumb/513340e07bdceJessica-Alba11.jpg', '/uploads/shop/gallery/title/513340e07bdceJessica-Alba11.jpg'),
	(26, 5, '/uploads/shop/gallery/thumb/513340e07bdcejessica-alba-011-1920x1200.jpg', '/uploads/shop/gallery/title/513340e07bdcejessica-alba-011-1920x1200.jpg'),
	(27, 5, '/uploads/shop/gallery/thumb/513340e07bdceJessica-Alba-4.jpg', '/uploads/shop/gallery/title/513340e07bdceJessica-Alba-4.jpg'),
	(28, 5, '/uploads/shop/gallery/thumb/513340e07bdce77026088_large_1279638508_jessicaalba_by_reactor_net_064.jpg', '/uploads/shop/gallery/title/513340e07bdce77026088_large_1279638508_jessicaalba_by_reactor_net_064.jpg'),
	(33, 19, '/uploads/shop/gallery/thumb/513838aceac7dsvarochnyy_stol_demmeler_608h456.jpg', '/uploads/shop/gallery/title/513838aceac7dsvarochnyy_stol_demmeler_608h456.jpg'),
	(35, 19, '/uploads/shop/gallery/thumb/513838aceac7d0B7A9672-582F-4658-8D21-B9B78BED82F4.jpg', '/uploads/shop/gallery/title/513838aceac7d0B7A9672-582F-4658-8D21-B9B78BED82F4.jpg'),
	(36, 19, '/uploads/shop/gallery/thumb/513838aceac7d046c67f24bfb3b4ca352a4a93c90ef5b.jpg', '/uploads/shop/gallery/title/513838aceac7d046c67f24bfb3b4ca352a4a93c90ef5b.jpg'),
	(37, 19, '/uploads/shop/gallery/thumb/513838aceac7d54c34e9ae4.jpg', '/uploads/shop/gallery/title/513838aceac7d54c34e9ae4.jpg'),
	(38, 19, '/uploads/shop/gallery/thumb/513838aceac7d150px-Stephan_El_Shaarawy.jpg', '/uploads/shop/gallery/title/513838aceac7d150px-Stephan_El_Shaarawy.jpg'),
	(39, 19, '/uploads/shop/gallery/thumb/513838aceac7d753E5AFA-C3A0-4DF0-9BA0-51E604E8C97B.jpg', '/uploads/shop/gallery/title/513838aceac7d753E5AFA-C3A0-4DF0-9BA0-51E604E8C97B.jpg'),
	(40, 19, '/uploads/shop/gallery/thumb/513838aceac7da-govno-life-zam.jpg', '/uploads/shop/gallery/title/513838aceac7da-govno-life-zam.jpg'),
	(41, 19, '/uploads/shop/gallery/thumb/513838aceac7dметалл.jpg', '/uploads/shop/gallery/title/513838aceac7dметалл.jpg'),
	(42, 19, '/uploads/shop/gallery/thumb/513838aceac7d329.jpeg', '/uploads/shop/gallery/title/513838aceac7d329.jpeg'),
	(43, 19, '/uploads/shop/gallery/thumb/513838aceac7d1t.jpg', '/uploads/shop/gallery/title/513838aceac7d1t.jpg'),
	(44, 19, '/uploads/shop/gallery/thumb/513838aceac7d1325451683_222701728_1----.jpg', '/uploads/shop/gallery/title/513838aceac7d1325451683_222701728_1----.jpg'),
	(45, 19, '/uploads/shop/gallery/thumb/513838aceac7d410-2.jpg', '/uploads/shop/gallery/title/513838aceac7d410-2.jpg'),
	(54, 33, '/uploads/shop/gallery/thumb/519333edf10b1150px-Stephan_El_Shaarawy.jpg', '/uploads/shop/gallery/title/519333edf10b1150px-Stephan_El_Shaarawy.jpg'),
	(55, 33, '/uploads/shop/gallery/thumb/519333edf10b1753E5AFA-C3A0-4DF0-9BA0-51E604E8C97B.jpg', '/uploads/shop/gallery/title/519333edf10b1753E5AFA-C3A0-4DF0-9BA0-51E604E8C97B.jpg'),
	(59, 38, '/uploads/shop/gallery/thumb/51a2ca5c1002871052.jpg', '/uploads/shop/gallery/title/51a2ca5c1002871052.jpg'),
	(60, 38, '/uploads/shop/gallery/thumb/51a2ca5c10028046c67f24bfb3b4ca352a4a93c90ef5b.jpg', '/uploads/shop/gallery/title/51a2ca5c10028046c67f24bfb3b4ca352a4a93c90ef5b.jpg'),
	(61, 38, '/uploads/shop/gallery/thumb/51a2ca5c10028150px-Stephan_El_Shaarawy.jpg', '/uploads/shop/gallery/title/51a2ca5c10028150px-Stephan_El_Shaarawy.jpg'),
	(62, 34, '/uploads/shop/gallery/thumb/52522090e1888Selena-Gomez-2013-Shirts-Collections.jpg', '/uploads/shop/gallery/title/52522090e1888Selena-Gomez-2013-Shirts-Collections.jpg'),
	(63, 34, '/uploads/shop/gallery/thumb/52522090e1888150px-Stephan_El_Shaarawy.jpg', '/uploads/shop/gallery/title/52522090e1888150px-Stephan_El_Shaarawy.jpg'),
	(64, 34, '/uploads/shop/gallery/thumb/52522090e1888yu.jpg', '/uploads/shop/gallery/title/52522090e1888yu.jpg');
/*!40000 ALTER TABLE `tbl_shop_gallery` ENABLE KEYS */;


# Dumping structure for table comfort.tbl_shop_optionkits
CREATE TABLE IF NOT EXISTS `tbl_shop_optionkits` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `options` char(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

# Dumping data for table comfort.tbl_shop_optionkits: ~15 rows (approximately)
/*!40000 ALTER TABLE `tbl_shop_optionkits` DISABLE KEYS */;
INSERT INTO `tbl_shop_optionkits` (`id`, `options`) VALUES
	(11, '5, 2, 3'),
	(12, '4, 2'),
	(13, '0, 2, 3'),
	(14, '0, 2'),
	(15, '5, 3'),
	(16, '6, 3'),
	(17, '4, 2, 3'),
	(18, '5, 2'),
	(19, '0, 3'),
	(20, '4, 3'),
	(21, '0'),
	(22, '1'),
	(23, '4'),
	(24, '7'),
	(25, '5, 8');
/*!40000 ALTER TABLE `tbl_shop_optionkits` ENABLE KEYS */;


# Dumping structure for table comfort.tbl_shop_orders
CREATE TABLE IF NOT EXISTS `tbl_shop_orders` (
  `id` int(25) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `comments` varchar(1000) DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `active` enum('1','0') NOT NULL DEFAULT '1',
  `visited` enum('1','0') NOT NULL DEFAULT '0',
  `email` varchar(100) NOT NULL,
  `shipping_date` date DEFAULT NULL,
  `phone` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

# Dumping data for table comfort.tbl_shop_orders: ~13 rows (approximately)
/*!40000 ALTER TABLE `tbl_shop_orders` DISABLE KEYS */;
INSERT INTO `tbl_shop_orders` (`id`, `user_id`, `name`, `address`, `comments`, `created`, `active`, `visited`, `email`, `shipping_date`, `phone`) VALUES
	(20, NULL, 'Олег', 'wer', '', '2013-10-22 09:03:40', '1', '1', 'kjhkJ@sdf.ru', '1970-01-01', NULL),
	(24, 1, 'Брэдли Купер', 'asd', '', '2013-10-22 09:25:11', '1', '1', 'iuhi@ewr.rt', '1970-01-01', NULL),
	(27, 1, 'rtyu', 'wertwer', '', '2013-10-22 11:15:22', '1', '1', 'dfss@dfg.er', '1970-01-01', 32767),
	(28, 1, 'tyu', 'fghdfh', '', '2013-10-22 11:17:26', '1', '1', 'tyu@gfg.ru', '1970-01-01', NULL),
	(29, 1, '111111111', '345345', '', '2013-10-22 11:20:37', '1', '1', 'qwe@wer.rt', '1970-01-01', NULL),
	(30, 0, 'hfgdh', 'sdfasdf', '', '2013-10-22 11:22:34', '1', '1', 'sdf@sdf.rt', '1970-01-01', NULL),
	(31, NULL, '456', 'rtey', '', '2013-10-22 11:45:52', '1', '1', 're@dfg.ru', '1970-01-01', NULL),
	(32, NULL, 'ert', '345345', '', '2013-10-22 11:51:27', '1', '1', 'dfss@dfg.er', '1970-01-01', NULL),
	(33, NULL, 'Селена Гомес', 'LA', '', '2013-10-22 11:52:49', '1', '1', 'dfss@dfg.er', '1970-01-01', NULL),
	(34, NULL, 'Селена Гомес', '345345', '', '2013-10-22 11:57:36', '1', '1', 'dfss@dfg.er', '1970-01-01', 567),
	(35, NULL, 'Селена Гомес', 'LA', '', '2013-10-22 12:58:30', '1', '1', 'selena@gomez.com', '1970-01-01', 567),
	(36, NULL, 'try', 'LA', '', '2013-10-22 13:03:31', '1', '1', 'tryr@hfgh.ru', '1970-01-01', NULL),
	(38, 1, 'wer', 'ул. Мира, д. 45, кв. 4', '', '2013-12-05 10:31:09', '1', '0', 'flintmesh@gmail.com', '1970-01-01', NULL);
/*!40000 ALTER TABLE `tbl_shop_orders` ENABLE KEYS */;


# Dumping structure for table comfort.tbl_shop_orders_items
CREATE TABLE IF NOT EXISTS `tbl_shop_orders_items` (
  `id` int(25) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(25) unsigned NOT NULL,
  `product_id` int(25) unsigned NOT NULL,
  `quantity` int(25) NOT NULL,
  `price` int(25) NOT NULL,
  `sum` int(25) NOT NULL,
  `optionkit_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `FK_tbl_shop_orders_items_tbl_shop_orders` FOREIGN KEY (`order_id`) REFERENCES `tbl_shop_orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

# Dumping data for table comfort.tbl_shop_orders_items: ~20 rows (approximately)
/*!40000 ALTER TABLE `tbl_shop_orders_items` DISABLE KEYS */;
INSERT INTO `tbl_shop_orders_items` (`id`, `order_id`, `product_id`, `quantity`, `price`, `sum`, `optionkit_id`) VALUES
	(20, 20, 34, 1, 234, 234, NULL),
	(26, 24, 35, 2, 200, 400, 14),
	(27, 24, 35, 1, 150, 150, 15),
	(34, 27, 34, 5, 234, 1170, 0),
	(35, 27, 35, 1, 200, 200, 12),
	(36, 28, 34, 1, 234, 234, 0),
	(37, 28, 35, 1, 200, 200, 14),
	(38, 29, 34, 1, 234, 234, 0),
	(39, 29, 35, 1, 200, 200, 12),
	(40, 30, 34, 4, 234, 936, 0),
	(41, 30, 35, 1, 150, 150, 16),
	(42, 31, 34, 1, 234, 234, 0),
	(43, 31, 35, 1, 200, 200, 14),
	(44, 32, 34, 1, 234, 234, 0),
	(45, 33, 34, 1, 234, 234, 0),
	(46, 34, 34, 1, 234, 234, 0),
	(47, 35, 34, 1, 234, 234, 0),
	(48, 36, 35, 1, 250, 250, 17),
	(49, 36, 34, 1, 234, 234, 0),
	(51, 38, 35, 400, 100, 40000, 21);
/*!40000 ALTER TABLE `tbl_shop_orders_items` ENABLE KEYS */;


# Dumping structure for table comfort.tbl_shop_products
CREATE TABLE IF NOT EXISTS `tbl_shop_products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text,
  `characters` text,
  `price` float DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` int(50) NOT NULL,
  `in_stock` int(50) DEFAULT '0',
  `active` enum('1','0') DEFAULT '1',
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `alias_url` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

# Dumping data for table comfort.tbl_shop_products: ~14 rows (approximately)
/*!40000 ALTER TABLE `tbl_shop_products` DISABLE KEYS */;
INSERT INTO `tbl_shop_products` (`id`, `title`, `description`, `characters`, `price`, `created_at`, `updated_at`, `category_id`, `in_stock`, `active`, `meta_description`, `meta_keywords`, `alias_url`) VALUES
	(1, 'Товар 1', 'Описание!!!', 'Хрень какаято\r\n<div><p><p><img src="/uploads/admin/index//9ddf11e264d8ac56e9d9fdc9c4e00164.jpg" style="width: 250px; height: 250px; float: left; margin: 0px 10px 10px 0px;" alt=""></p><br></p></div>\r\n', 100, '2013-02-25 20:18:36', '2013-06-25 09:51:51', 14, 0, '1', '', '', 'tovarchik'),
	(2, 'Товар 2', '', '<p><br></p>', 1608, '2013-02-25 23:59:27', '2013-05-15 07:43:32', 2, 0, '1', '', '', NULL),
	(5, 'Джессика Альба', 'Джессика Альба родилась 28 апреля 1981 года в городе Помона, штат Калифорния, США в семье Кэтрин (урождённой Йенсен) и Марка Альба.', '<p>\r\n	<span style="line-height: 1.45em;">В 2001 году Джессика заняла первое место в Hot 100 журнала Maxim. В 2005 году она была названа одной из 50 самых красивых людей планеты по версии журнала People, а в 2007 году попала в список 100 самых красивых людей. В 2002 году Альба заняла пятое место в рейтинге самых сексуальных актрис по результатам опроса портала Hollywood.com, шестое по версии журнала FHM и двенадцатое в списке «102 самых сексуальных женщин планеты» по версии журнала Stuff. В 2005 году она заняла пятое место в Hot 100 журнала Maxim.</span>\r\n</p>', 1800, '2013-02-26 00:01:23', '2013-10-24 06:56:02', 3, 0, '1', '', '', '5-5-albanochka'),
	(19, 'Шкаф 2!', ' Шкафчик Шкафчик', '<p>яч сч</p>', 23435, '2013-02-26 20:44:15', '2013-05-16 10:16:29', 2, 0, '1', '', '', NULL),
	(21, 'Шкаф 3', 'Шкаф 3 суперский 4 дверцы', '', 4560, '2013-03-02 18:25:33', '2013-05-03 11:04:15', 2, 0, '1', '', '', NULL),
	(24, 'пропр', 'опронро', '', 0, '2013-03-05 14:13:54', '2013-03-05 09:14:11', 1, 0, '1', '', '', NULL),
	(25, 'нке', '', '', 0, '2013-03-05 14:14:35', NULL, 1, 0, '1', 'нукн', '', NULL),
	(31, 'Джессика Альба 2', 'Джессика Альба родилась 28 апреля 1981 года в городе Помона, штат Калифорния, США в семье Кэтрин (урождённой Йенсен) и Марка Альба.', '<p><span style="line-height: 1.45em;">В 2001 году Джессика заняла первое место в Hot 100 журнала Maxim. В 2005 году она была названа одной из 50 самых красивых людей планеты по версии журнала People, а в 2007 году попала в список 100 самых красивых людей. В 2002 году Альба заняла пятое место в рейтинге самых сексуальных актрис по результатам опроса портала Hollywood.com, шестое по версии журнала FHM и двенадцатое в списке «102 самых сексуальных женщин планеты» по версии журнала Stuff. В 2005 году она заняла пятое место в Hot 100 журнала Maxim!</span></p>', 1800, '2013-04-29 05:13:13', '2013-10-08 10:38:19', 3, 0, '1', '', '', '31-albanochka'),
	(32, 'Джессика Альба 3', 'Джессика Альба родилась 28 апреля 1981 года в городе Помона, штат Калифорния, США в семье Кэтрин (урождённой Йенсен) и Марка Альба.', '<p><span style="line-height: 1.45em;">В 2001 году Джессика заняла первое место в Hot 100 журнала Maxim. В 2005 году она была названа одной из 50 самых красивых людей планеты по версии журнала People, а в 2007 году попала в список 100 самых красивых людей. В 2002 году Альба заняла пятое место в рейтинге самых сексуальных актрис по результатам опроса портала Hollywood.com, шестое по версии журнала FHM и двенадцатое в списке «102 самых сексуальных женщин планеты» по версии журнала Stuff. В 2005 году она заняла пятое место в Hot 100 журнала Maxim.</span></p>', 1600, '2013-04-29 05:15:14', '2013-09-02 11:07:55', 3, 0, '1', '', '', NULL),
	(33, 'Samsung Galaxy S III i9300 16Gb Black', 'GSM, 3G, смартфон, Android 4.0, вес 133 г, ШхВхТ 70.6x136.6x8.6 мм, экран 4.8", 720x1280, FM-радио, Bluetooth, NFC, Wi-Fi, GPS, ГЛОНАСС, фотокамера 8 МП, память 16 Гб,', '<p><b style="line-height: 1.45em;">Достоинства:&nbsp;</b><span style="line-height: 1.45em;">Экран,самый качественный корые я когда то видел!!!!Большое разрешение, фотографии получаются естественными,яркими!!! Процессор: шустрый,ни где не тормозит, не зависал еще ни разу!!!Аккумулятор держит очень долго, зарядил утром на 68%, продержался 2 дня!!!... Все писать не буду, выделил главное т.к все ни раз упоминалось!!!</span></p><p><b style="line-height: 1.45em;">Недостатки:&nbsp;</b><span style="line-height: 1.45em;">Пока не заметил!!!</span></p><p><b>Комментарий:&nbsp;</b>Ребята, если кто то затрудняется в выборе, то скажу,пока нет ничего лучшего, кроме Note 2!!</p><p></p>', 17680, '2013-05-07 06:23:47', '2013-07-17 10:38:35', 18, 0, '1', 'Samsung Galaxy S III i9300 16Gb Black', 'Samsung', 'samsung-galaxy-s3'),
	(34, 'Самсунг', '', '', 234, '2013-05-14 04:32:27', '2013-10-07 05:10:39', 18, 0, '1', '', '', 'samsung'),
	(35, 'HTC ONE X', 'GSM, 3G, смартфон, Android 4.0, вес 130 г, ШхВхТ 69.9x134.36x8.9 мм, экран 4.7", 720x1280, FM-радио, Bluetooth, NFC, Wi-Fi, GPS, фотокамера 8 МП, память 32 Гб, аккумулятор ...', '<p>\r\n	       Отличный аппарат!\r\n</p>', 100, '2013-05-14 04:35:03', '2013-12-05 05:46:42', 18, 460, '1', '', '', 'htc-one-x'),
	(36, 'Ещё Уан икс', 'цуацуа', '<p>фывапвыап</p>', 234, '2013-05-14 06:34:47', '2013-05-20 09:24:10', 18, 0, '1', '', '', '36--samsung-galaxy-s3'),
	(38, 'Товар 1', 'Описание!', 'Хрень какаято', 100678, '2013-05-30 04:43:28', '2013-05-30 05:10:38', 14, 10, '1', '', '', 'tovarchik2');
/*!40000 ALTER TABLE `tbl_shop_products` ENABLE KEYS */;


# Dumping structure for table comfort.tbl_shop_productsimg
CREATE TABLE IF NOT EXISTS `tbl_shop_productsimg` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `thumbnail` varchar(500) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `FK_tbl_shop_productsimg_tbl_shop_products` FOREIGN KEY (`product_id`) REFERENCES `tbl_shop_products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

# Dumping data for table comfort.tbl_shop_productsimg: ~14 rows (approximately)
/*!40000 ALTER TABLE `tbl_shop_productsimg` DISABLE KEYS */;
INSERT INTO `tbl_shop_productsimg` (`id`, `product_id`, `thumbnail`, `image`) VALUES
	(6, 19, '/uploads/shop/product/thumb/5170ecc9e6425753E5AFA-C3A0-4DF0-9BA0-51E604E8C97B.jpg', '/uploads/shop/product/title/5170ecc9e6425753E5AFA-C3A0-4DF0-9BA0-51E604E8C97B.jpg'),
	(7, 5, '/uploads/shop/product/thumb/5268a867292ddtambov.jpg', '/uploads/shop/product/title/5268a867292ddtambov.jpg'),
	(9, 21, '/uploads/shop/product/thumb/5131efbd38d8204-04-06_1557.jpg', '/uploads/shop/product/title/5131efbd38d8204-04-06_1557.jpg'),
	(10, 1, '/uploads/shop/product/thumb/5135a88a842beTravel.png', '/uploads/shop/product/title/5135a88a842beTravel.png'),
	(13, 24, '/uploads/shop/product/thumb/5135a9536cd521266239971_74379928_1---.jpg', '/uploads/shop/product/title/5135a9536cd521266239971_74379928_1---.jpg'),
	(14, 25, '/uploads/shop/product/thumb/5135a96b639333cef940e71025ef7dbb0656dd7554c03.jpg', '/uploads/shop/product/title/5135a96b639333cef940e71025ef7dbb0656dd7554c03.jpg'),
	(15, 2, '/uploads/shop/product/thumb/517a25ba43b8eTY2tnq2cWB0.jpg', '/uploads/shop/product/title/517a25ba43b8eTY2tnq2cWB0.jpg'),
	(21, 31, '/uploads/shop/product/thumb/5134650feb1538d31b779e3dc27748fbab31df16cef06.png', '/uploads/shop/product/title/5134650feb1538d31b779e3dc27748fbab31df16cef06.png'),
	(22, 32, '/uploads/shop/product/thumb/5134650feb1538d31b779e3dc27748fbab31df16cef06.png', '/uploads/shop/product/title/5134650feb1538d31b779e3dc27748fbab31df16cef06.png'),
	(23, 33, '/uploads/shop/product/thumb/518881d3e598e71052.jpg', '/uploads/shop/product/title/518881d3e598e71052.jpg'),
	(24, 34, '/uploads/shop/product/thumb/52521f56d3235onex.jpg', '/uploads/shop/product/title/52521f56d3235onex.jpg'),
	(25, 35, '/uploads/shop/product/thumb/5254e87110b0fonex.jpg', '/uploads/shop/product/title/5254e87110b0fonex.jpg'),
	(26, 36, '/uploads/shop/product/thumb/5191bee78f1bc150px-Stephan_El_Shaarawy.jpg', '/uploads/shop/product/title/5191bee78f1bc150px-Stephan_El_Shaarawy.jpg'),
	(27, 38, '/uploads/shop/product/thumb/5135a88a842beTravel.png', '/uploads/shop/product/title/5135a88a842beTravel.png');
/*!40000 ALTER TABLE `tbl_shop_productsimg` ENABLE KEYS */;


# Dumping structure for table comfort.tbl_shop_products_rating
CREATE TABLE IF NOT EXISTS `tbl_shop_products_rating` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `rating` float unsigned DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_tbl_shop_products_rating_tbl_shop_products` (`product_id`),
  CONSTRAINT `FK_tbl_shop_products_rating_tbl_shop_products` FOREIGN KEY (`product_id`) REFERENCES `tbl_shop_products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

# Dumping data for table comfort.tbl_shop_products_rating: ~30 rows (approximately)
/*!40000 ALTER TABLE `tbl_shop_products_rating` DISABLE KEYS */;
INSERT INTO `tbl_shop_products_rating` (`id`, `product_id`, `rating`) VALUES
	(1, 33, 10),
	(2, 33, 5),
	(3, 33, 3),
	(4, 33, 5),
	(5, 34, 8),
	(6, 34, 8),
	(7, 34, 5),
	(8, 34, 2),
	(9, 35, 9),
	(10, 36, 10),
	(11, 36, 4),
	(12, 33, 4),
	(13, 36, 6),
	(14, 34, 10),
	(15, 34, 10),
	(16, 34, 9),
	(17, 34, 10),
	(18, 34, 10),
	(19, 34, 10),
	(20, 34, 10),
	(21, 34, 10),
	(22, 34, 10),
	(23, 34, 6),
	(43, 35, 5),
	(44, 35, 10),
	(45, 35, 6),
	(46, 38, 9),
	(47, 38, 10),
	(48, 36, 10),
	(49, 36, 10);
/*!40000 ALTER TABLE `tbl_shop_products_rating` ENABLE KEYS */;


# Dumping structure for table comfort.tbl_users
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(128) NOT NULL DEFAULT '',
  `email` varchar(128) NOT NULL DEFAULT '',
  `activkey` varchar(128) NOT NULL DEFAULT '',
  `superuser` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastvisit_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `userpic` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_username` (`username`),
  UNIQUE KEY `user_email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

# Dumping data for table comfort.tbl_users: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;
INSERT INTO `tbl_users` (`id`, `username`, `password`, `email`, `activkey`, `superuser`, `status`, `create_at`, `lastvisit_at`, `userpic`) VALUES
	(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'webmaster@example.com', '9b94c7be573c22b9d4f7f8caccd5043d', 1, 1, '2013-02-06 10:47:38', '2013-12-04 04:50:03', '/uploads/user/52241ea4d3b37cristiano_ronaldo.jpg'),
	(2, 'valera', 'b51e8dbebd4ba8a8f342190a4b9f08d7', 'valera@verim.ru', '04bce2865b33ed1306b671b70747c5ec', 0, 1, '2013-09-13 04:38:56', '2013-09-13 04:41:06', NULL);
/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;


# Dumping structure for table comfort.yiisession
CREATE TABLE IF NOT EXISTS `yiisession` (
  `id` char(32) NOT NULL,
  `expire` int(11) DEFAULT NULL,
  `data` longblob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# Dumping data for table comfort.yiisession: ~1 rows (approximately)
/*!40000 ALTER TABLE `yiisession` DISABLE KEYS */;
INSERT INTO `yiisession` (`id`, `expire`, `data`) VALUES
	('q8dtcjvh7dbviuk1bm5g7lv924', 1386824861, _binary 0x38626662656566373663343733323166366264326463333966316338616434305F5F69647C733A313A2231223B38626662656566373663343733323166366264326463333966316338616434305F5F6E616D657C733A353A2261646D696E223B38626662656566373663343733323166366264326463333966316338616434305F5F7374617465737C613A303A7B7D38626662656566373663343733323166366264326463333966316338616434305269676874735F69735375706572757365727C623A313B);
/*!40000 ALTER TABLE `yiisession` ENABLE KEYS */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
