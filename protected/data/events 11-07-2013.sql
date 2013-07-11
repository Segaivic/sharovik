-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.8 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL version:             7.0.0.4170
-- Date/time:                    2013-07-11 14:48:09
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table comfort.tbl_events_events
CREATE TABLE IF NOT EXISTS `tbl_events_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `description` text NOT NULL,
  `color` char(15) DEFAULT '#3865a8',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table comfort.tbl_events_events: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbl_events_events` DISABLE KEYS */;
INSERT INTO `tbl_events_events` (`id`, `title`, `date_start`, `date_end`, `description`, `color`) VALUES
	(1, 'Бухаем в Тамбове', '2013-06-11', '2013-06-11', '<p>Подскажите куда можно сходить/съездить в Тамбове на новогодних выходных. Хочу спланировать отдых с парнем. Может есть какие-нибудь лыжные базы, может горки - где можно поучиться на горных лыжах или сноуборде. есть ли катки? и где лучше всего кататься(хороший лед и не битком народу). Чем можно еще заняться в тамбове итересным? Видела есть улица Ипподромная? Можно ли покататься на лошадях?? ))<p><img src="/uploads/admin/index//b96d4e6c273bfc478cdfe4e70104b734.jpg" style="width: 231.0528967254408px; height: 208px; float: right; margin: 0px 0px 10px 10px;" alt=""></p></p><p>tyurturturtutyu</p><p></p><p></p><p></p>\r\n', '#3aa838'),
	(2, 'Вечеринка у слесарей', '2013-06-14', '2013-06-14', '<p>ФЫВфыв</p>', '#3865a8'),
	(3, 'Свадьба у Толяна', '2013-06-14', '2013-06-15', '<p>ФЫВфыв</p>', '#a83845');
/*!40000 ALTER TABLE `tbl_events_events` ENABLE KEYS */;


-- Dumping structure for table comfort.tbl_events_reserve
CREATE TABLE IF NOT EXISTS `tbl_events_reserve` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `contacts` text NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `description` text,
  `visited` enum('1','0') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table comfort.tbl_events_reserve: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_events_reserve` DISABLE KEYS */;
INSERT INTO `tbl_events_reserve` (`id`, `name`, `contacts`, `date_start`, `date_end`, `description`, `visited`) VALUES
	(4, 'Шпак Антон Семёнович', 'ewf', '2013-07-19', '2013-07-16', 'fergferg', '1'),
	(5, 'Шпак Антон Семёнович', 'ewf', '2013-07-19', '2013-07-16', 'fergferg', '0'),
	(6, 'Шпак Антон Семёнович', 'ewf', '2013-07-19', '2013-07-16', 'fergferg', '1');
/*!40000 ALTER TABLE `tbl_events_reserve` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
