-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.8 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL version:             7.0.0.4170
-- Date/time:                    2013-07-26 00:14:44
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table comfort.tbl_categories
CREATE TABLE IF NOT EXISTS `tbl_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(300) DEFAULT NULL,
  `is_enabled` enum('1','0') DEFAULT '1',
  `is_inbloglist` enum('1','0') DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `title` (`title`(255))
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table comfort.tbl_categories: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_categories` DISABLE KEYS */;
INSERT INTO `tbl_categories` (`id`, `title`, `is_enabled`, `is_inbloglist`) VALUES
	(1, 'Новости компании', '1', '1'),
	(2, 'Хз', '1', '1');
/*!40000 ALTER TABLE `tbl_categories` ENABLE KEYS */;


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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table comfort.tbl_events_reserve: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbl_events_reserve` DISABLE KEYS */;
INSERT INTO `tbl_events_reserve` (`id`, `name`, `contacts`, `date_start`, `date_end`, `description`, `visited`) VALUES
	(4, 'Шпак Антон Семёнович', 'ewf', '2013-07-19', '2013-07-16', 'fergferg', '1'),
	(5, 'Шпак Антон Семёнович', 'ewf', '2013-07-19', '2013-07-16', 'fergferg', '0'),
	(6, 'Шпак Антон Семёнович', 'ewf', '2013-07-19', '2013-07-16', 'fergferg', '1');
/*!40000 ALTER TABLE `tbl_events_reserve` ENABLE KEYS */;


-- Dumping structure for table comfort.tbl_gallery
CREATE TABLE IF NOT EXISTS `tbl_gallery` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `thumbnail` varchar(500) DEFAULT NULL,
  `title` varchar(500) DEFAULT NULL,
  `is_published` enum('1','0') NOT NULL DEFAULT '1',
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- Dumping data for table comfort.tbl_gallery: ~1 rows (approximately)
/*!40000 ALTER TABLE `tbl_gallery` DISABLE KEYS */;
INSERT INTO `tbl_gallery` (`id`, `thumbnail`, `title`, `is_published`, `created`) VALUES
	(17, '/uploads/gallery/title/51dbb132a738b07-06_present-ronaldo_press_15.jpg', 'ХЗ', '1', '2013-07-09 12:43:46');
/*!40000 ALTER TABLE `tbl_gallery` ENABLE KEYS */;


-- Dumping structure for table comfort.tbl_galleryphotos
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

-- Dumping data for table comfort.tbl_galleryphotos: ~10 rows (approximately)
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


-- Dumping structure for table comfort.tbl_lunch_main
CREATE TABLE IF NOT EXISTS `tbl_lunch_main` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table comfort.tbl_lunch_main: ~1 rows (approximately)
/*!40000 ALTER TABLE `tbl_lunch_main` DISABLE KEYS */;
INSERT INTO `tbl_lunch_main` (`id`, `description`) VALUES
	(1, 'Бизнес-ланч - это комплексный обед деловых людей в середине рабочего дня, когда можно за доступную цену быстро и вкусно поесть.');
/*!40000 ALTER TABLE `tbl_lunch_main` ENABLE KEYS */;


-- Dumping structure for table comfort.tbl_lunch_products
CREATE TABLE IF NOT EXISTS `tbl_lunch_products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(1000) NOT NULL,
  `description` text,
  `weight` varchar(50) DEFAULT NULL,
  `price` float DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Dumping data for table comfort.tbl_lunch_products: ~5 rows (approximately)
/*!40000 ALTER TABLE `tbl_lunch_products` DISABLE KEYS */;
INSERT INTO `tbl_lunch_products` (`id`, `title`, `description`, `weight`, `price`) VALUES
	(1, 'Суп гороховый!', '400г свинины, 300г картофеля (4-5 шт.), 200г лука (2 шт. среднего размера), 150г моркови (2 шт. среднего размера), 250г.', '300', 100),
	(4, 'Пельмени с щавелем', 'тыц тыц тыц', '300', 150),
	(5, 'rty', '', '56465', 0),
	(6, 'ryrety', 'tyetyrty', 'yrty', 651),
	(8, 'werwer', '3fef', '123', 324.43);
/*!40000 ALTER TABLE `tbl_lunch_products` ENABLE KEYS */;


-- Dumping structure for table comfort.tbl_menu
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

-- Dumping data for table comfort.tbl_menu: ~8 rows (approximately)
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


-- Dumping structure for table comfort.tbl_migration
CREATE TABLE IF NOT EXISTS `tbl_migration` (
  `version` varchar(255) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table comfort.tbl_migration: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbl_migration` DISABLE KEYS */;
INSERT INTO `tbl_migration` (`version`, `apply_time`) VALUES
	('m000000_000000_base', 1360126042),
	('m110805_153437_installYiiUser', 1360126058),
	('m110810_162301_userTimestampFix', 1360126058);
/*!40000 ALTER TABLE `tbl_migration` ENABLE KEYS */;


-- Dumping structure for table comfort.tbl_news
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Dumping data for table comfort.tbl_news: ~17 rows (approximately)
/*!40000 ALTER TABLE `tbl_news` DISABLE KEYS */;
INSERT INTO `tbl_news` (`id`, `title`, `alias`, `introtext`, `fulltext`, `is_published`, `is_onfrontpage`, `user_id`, `catid`, `created`, `modified`, `metakey`, `metadesc`, `alias_url`) VALUES
	(1, 'Заголовок 1', 'test', '<img alt="" src="/images/demo/demonews.jpg" style="padding: 4px; border: 1px solid rgb(206, 205, 205); margin: 0px 10px 8px 0px; float: left;" width:150px;=""><span style="line-height: 1.45em;">Сочетание киноа с творогом и фруктами бесподобно. Полезное и вкусное блюдо подойдет и детям и взрослым. Этот вкусный десерт посвящаю всем женщинам связавшим свою жизнь с армией и боевым подругам. Так случилось, что сегодня год с момента моей регистрации на сайте, угощайтесь! rs</span><p><img src="/uploads/news//064cedee0bbd42b05cb2511018f91a3b.jpg" alt="" style="cursor: nw-resize;"><br></p>\r\n<div class="clear"></div>\r\n', '<pre>&lt;p&gt;&lt;?php  echo "Salut" ?&gt;&lt;/p&gt;r</pre><p><img src="/uploads/news//0e68cc03000a73c194a09fa6efa308ff.jpg" style="width: 289px; height: 289px;"></p><br>', '1', '1', 1, 1, '2012-12-12 12:12:12', '2013-06-25 09:53:25', '', '', '1-zagolovok'),
	(2, 'Заголовок 2', 'test2', '<p><span>Делать этот&nbsp;</span>плов<span>&nbsp;надо на природе, на даче или где имеется «очаг», так называют&nbsp;</span>узбеки<span>&nbsp;кухню, приспособленную для готовки&nbsp;</span>плова<span>. Но этот плов можно готовить и в домашних условиях, лучше на газе, но и на электричестве он так же не становится хуже.</span><br><span>Вы просто соотносите технологию варения в <span style="color: #0099ff;"><a title="казаны и печи под казаны" href="http://metallpark96.ru/shop/16/kazany-chugunnaya-i-alyuminievaya-posuda?sort=title-asc"><span style="color: #0099ff;">казане</span></a></span> на открытом огне к домашним источникам приготовления пищи. Какая разница, каким образом увеличить или же уменьшить огонь. Под казаном надо убрать или добавить дровишки, а на кухне легким поворотом регулятора пламени газа или силы тока делается то же - верно же ?!!!!</span></p>', '<p><img style="display: block; margin-left: auto; margin-right: auto;" src="https://lh5.googleusercontent.com/-UJNW5bjCt6c/UC3K0DlvOoI/AAAAAAAAAwM/BlvgBy0KBk8/s800/26_04_2011_9.jpg" alt="" width="451" height="338"></p>\n<p>Для начала, обмойте мясо проточной водой и высушите его салфеточным полотенцем. Кто его знает, как и кто его лапал до вас, а влага в мариновке не нужна, абсолютно. Если мясо купите на базаре рано утром, замариновав по этому рецепту сразу, то вечером можете смело уже вертеть его на мангале!</p>\n<p>С мясом мы разобрались, кстати, еще вкуснее будет барашек, и я не раз в этом убеждался и, всегда, буду это утверждать. Довелось как-то готовить шашлык для чисто турецкого общества, мясо они купили мне сами. Каково было мо. удивление, что они выхватывали куски мяса чуть ли не изо рта даже у других! Баранина была маринована именно, по этому рецепту! Поэтому, дорогих и уважаемых гостей я, все-таки, стараюсь угощать свежей бараниной!</p>\n<p><img style="display: block; margin-left: auto; margin-right: auto;" src="https://lh3.googleusercontent.com/-Zu6nz6Uo0Xc/UC3KyGvBGJI/AAAAAAAAAvg/1DsgGXbisr4/s800/26_04_2011_10.jpg" alt="" width="476" height="357"></p>\n<p>Таким методом, разрезаем мясо на поперечные шайбы по 3-4 см. шириной, потом на одинаковые кусочки, удаляя планку и сухожилия. Сильно не увлекайтесь удалением сала, это придаст некую сочность. После хорошей тренировки у вас может получиться также как у меня, где каждая полочка с мясом выходит с разницей от двух- до пяти граммов!!! При нежирной баранине рекомендуют надевать между мясом еще и курдючный жир. Оставим эту тему для любителей баранины.</p>\n<p>Теперь ингредиенты для мариновки и весь секрет моего блюда. Берем с расчета, скажем так, на 3-4 килограмма. Главная система для мариновки мяса не в том, какие ингредиенты туда положить, очень важно даже - в какой последовательности!</p>\n<p>1. Соль (примерно 4-5 ч.л.). Вкусы, скажу сразу, у всех разные, я лично ничего на столе не досаливаю, даже яйца или помидоры никогда не солю. Два химических состава, натрий и хлор, составляющие соль, хорошего для организма ничего не дают, а косточки до артрозов подпортят. Не будем говорить о том, что соль просто необходима, без нее никак нельзя и т. д. А вот недосоленный шашлык будет очень некстати, поэтому его нужно хорошо и правильно посолить.</p>\n<p>2. Перец черный и, особо подчеркну, КРУПНО молотый, как на картинке. Никакой «пыли» из перечницы! А еще лучше, раздавить горошины плоскостью ножа и потом, порезать немного острием. Когда Вы будете мясо жевать, то эти крупинки будут давать Вам приятные вкусовые ощущения. Сколько? 15 – 20 горошин!!! Хотите больше, на любителя! Кстати, черный перец очень полезен для организма!!! Вам знакома водка с перцем от простуды? Так вот, выздоровительную реакцию дает, в первую очередь, не водка, а сам черный перец!</p>\n<p>3. Кориандр. Она же и – кинза. Думаю, знакомо Вам это название. Опять же вопрос – сколько? Считаю, что тоже 15-20 горошин будет достаточно. Их нужно растолочь в ступе, сначала слегка прожарив. Может уже продаваться и молотый. Но, ни в коем случае, может быть я, и повторюсь, перебарщивать с приправами – НЕЛЬЗЯ! Иначе настоящего вкуса мяса не получите. Если кориандр уже молотый: чуть больше половины ч.л. А точнее будет как на фотографии. Я видел, как маринуют шашлык с зеленой кинзой, но чтобы такое вам посоветовать, необходимо самому на этом проверить. Не пробовал – не знаю, хотя обязательно, как только появится возможность, попробую так замариновать.</p>\n<p>4. Базилик. У меня он в баночке, сухой. Продается почти во всех магазинах. Берите столько же сколько и молотого кориандра. В чайно-ложечном размере это 1/2 , можно чуть больше! Эта трава не имеет такого резкого и острого вкуса.</p>\n<p>5. Тимьян. Он же Чабрец. Одна из азиатских приправ, от которого применяется зелень тимьяна в засушенном виде. В небольших количествах хорошо дополняет овощные и мясные блюда, а также различные салаты. Использование тимьяна восходит к древней Греции, где он символизировал смелость. Римские солдаты купались в воде, настоянной на тимьяне, чтобы набраться сил, энергии и смелости. В Средних веках девушки вышивали веточку тимьяна на шарфах рыцарей для отваги. Сколько? На килограмм – одну, две щепотки, перетирая слегка пальцами.</p>\n<p>6. Зира, она же Зра, она же Кумин. Не спутайте с тмином или укропом. Такие вещи в шашлык не идут вообще. Ищите в магазинах, у друзей и вам это окупится! В магазинах Германии я его не видел, а вот в русских магазинах есть точно! Количество? Очень специфическая приправа, будет достаточно чуть меньше половины ч.л. Зира, очень специфическая на вкус, поэтому будьте осторожны в ее количестве. Зира очень похожа на укроп, не спутайте!</p>\n<p>7. Лавровый лист, пару штук. Пусть он там даже разломается на мелкие кусочки при перемешивании. Когда будете надевать мясо на шампуры, заметив его, просто уберите в сторону. Его не кушают!!!</p>\n<p>8. Красный перец, паприка. Молотый, сладкий. Можно чайную ложку без «горки». Он даст немного нужный аромат и красивый цвет при жарке. Хотите добавить остроту? Один зубок раздавленного чеснока, добавьте острый, стручковый перец, но я предупреждаю, что вкус мяса может сильно перебиться, я думаю, что вам это не надо, ведь вы хотели настоящий шашлык, не так ли?</p>\n<p>9. Лук репчатый. Готовим двумя способами: луковицы, что помельче – в мясо, покрупнее луковицы – на закуску. Сначала режем крупные луковицы и только кольцами. Кольца нужно отделить друг от друга. Перебираем аккуратненько и отдельно в дозу складываем колечки, а все остальное перемешиваем с мясом. Закусывайте шашлык кольцами! А не какими-нибудь отходами или хвостиками, нарезанными, как попало. Эстетическая культура и аккуратность должна присутствовать в первую очередь! Примерно 5-6 луковиц хватит. Как пишут некоторые, что лука 1:1, мне кажется, будет много, просто режьте правильно, чтоб он сок отдал. Для удобства, вторым способом, можно лук пропустить через мясорубку, а потом отжать полученную массу через марлю. Этим я и пользуюсь, очень удобно и не нужно возиться с отходами от лука. Еще проще пропустить через соковыжималку, будет практичней, но хлопот с мытьем аппарата будет больше. На следующий день кольца лука можно сбрызнуть уксусом, разведенным с водой и посыпать красным или черным перцем, кому как нравится!</p>\n<p><img style="display: block; margin-left: auto; margin-right: auto;" src="https://lh4.googleusercontent.com/-f2rh7mXPDzQ/UC3KyTcFPYI/AAAAAAAAAvk/AcDBhMRS1k0/s800/26_04_2011_13.jpg" alt=""></p>\n<p>10. Масло подсолнечное, не спутайте с оливковым маслом, 5-6 столовых ложек. Да-да, Вы, абсолютно не ослышались, именно подсолнечное масло! Представьте сами, что Вы бросили мясо на сковородку, без масла. И, какой бы непригораемой сковородка она у вас не была, любое мясо просто начнет гореть. Вот это и получается на картинках у других шашлычников, где торчат обугленные краешки, а тебе нужно их жевать, потому что выплюнуть некрасиво, да и просто неудобно. Масло добавлять после всех добавленных, перемешанных припав, именно в такой последовательности, как написано.</p>\n<p style="text-align: center;"><img src="https://lh4.googleusercontent.com/-ytqiweTOcCk/UC3KyKOG6CI/AAAAAAAAAv0/WnIOPeZXdhY/s800/26_04_2011_14.jpg" alt="" width="460" height="345"></p>\n<p>Так выглядит, кем-то, жареное, на картинке, мясо: а. маринованное без масла;<br>б. слишком мелко нарезанный лук и его весь не убрали;<br>в. это и есть то мясо, которое идет по шейному обрезку,<br>слегка розового цвета, не меняет своей формы после мариновки и не имеет настоящего, сочного вкуса. А сгорел-то как? Разве можно такое назвать шашлыком?</p>\n<p>11. И вот теперь, положив в мясо все, что написано выше, пропуская между пальцами, начинаем все хорошенько перемешивать, добавляя не менее важный и, даже скажу, эффективный продукт, это – ЛИМОН. Хорошего размера лимона хватит и половины. Только будьте осторожны, выдавливать только тогда, когда все будет уже перемешано приправами и маслом. Попадая лимон на чистое мясо, оно тут же станет «колом», как после уксуса, поэтому уксус в шашлык просто не идет.</p>\n<p>Уксусом можете полить уже жареный шашлык.</p>\n<p>12. Четверть, можно и половинку, натурального гранатового сока добавит вам еще больше комплиментов и еще надежней спрячет разгадку Вашего рецепта! Гранат, в летнее время, вряд ли вы где-то его найдете, а соками в магазине лучше пренебрегать. Многие тесты показывают, что гранат там даже рядом не лежал. Так что, оставим ваш эксперимент до глубокой осени.</p>\n<p>Все это тщательно перемешиваем и оставляем плотно накрытым в кастрюле, придавив сверху подходящим, примерно, по диаметру тарелкой. Сверху поставьте что-нибудь тяжелое и так оставляем до завтра. Хотя, как я упоминал выше, если мясо свежее, то за весь день оно тоже промаринуется. Утром все перемешайте, наслаждаясь теперь запахом, который будет уже исходить от мяса. Можете даже лизнуть его или откусить, страшного теперь в этом мясе уже ничего нет.</p>\n<p>А вот так должно выглядеть свежее, мягкое, ядреное, замаринованное мясо. Его можно сразу отличить от нехорошего мяса. Вывод: дружите с мясником, хотя бы, узнайте, в какие дни у него происходит забой. Исключительный случай, если вы сами этим занимаетесь. Уделю внимание теперь еще и мангалу. Он тоже должен соответствовать кое-каким параметрам. Лучше всего иметь железный, а еще лучше с нержавеющей стали, чем толще будут его стенки, тем лучше. Он будет лучше сохранять жар и прожаривать крайние кусочки.</p>\n<p>И не надо пытать себя голодом, делая шашлык на кирпичах или где-то на висячих цепях.</p>\n<p><img style="display: block; margin-left: auto; margin-right: auto;" src="https://lh6.googleusercontent.com/-Ilzq092T42U/UC3Ky70tCHI/AAAAAAAAAv8/yCcSr49ftyM/s800/26_04_2011_16.jpg" alt="" width="449" height="337"></p>\n<p>Мой мангал выглядит так: длина – 60 см., высота 15 (от решетки) и ширина 22 см. Главная ошибка тех, кто делает мангалы: решетка не должна иметь большое количество дыр. Пусть лучше четверть дна мангала будет вовсе только из решетки, остальное цельное железо. Вы увидите, как мясо будет просто румяниться, и прожариваться на всю глубину. А главное, оно не будет вспыхивать под пламенем огня, где мясо сразу примет закопченный цвет и потеряет, всеми нам необходимый, вкус. Хотите кушать сажу??? Я – нет!!! Копчение – это совсем другая тема и в этом деле она просто будет не уместна.</p>\n<p>Теперь, когда уже всё позади и мясо съедено, могу с уверенностью сказать, что тест он прошел не на все 100% и есть теперь свои недостатки: по краю бездырочного дна, вдоль, я проделал отверстия, через пять сантиметров и теперь все отлично! Да, не было еще заслонки для поддувала, поэтому приходилось убирать мясо с того места где решетка, мой сварщик сказал, что поправит это дело.</p>\n<p>Также, не буду заострять внимание на том, что мясо должно жариться на хорошем жару все время, поворачивая и, ни в коем случае, не должно обдаваться языками пламени. Пусть угли хорошенько прогорят, обмахать пепел, и только потом делать самое прекрасное в этом искусстве – жарить шашлык! Это должен знать каждый, уважающий себя, шашлычник!</p>\n<p><img style="display: block; margin-left: auto; margin-right: auto;" src="https://lh5.googleusercontent.com/-CtOM4x7LzBo/UC3KzcP-zWI/AAAAAAAAAvw/C3Gy14P9z6Q/s800/26_04_2011_17.jpg" alt="" width="441" height="331"></p>\n<p><br>На счет баранины: будьте особо внимательны! Если Вы его пережарите, мясо превратится в сухие и черствые шарики. Хорошее, свежее мясо готовится быстро, достаточно каких-то пару минут. Особенно женщинам нужно усвоить одну истину, т.к. они часто путают сок из жареного мяса с кровью, поэтому просят поджарить еще. Хотя мясо уже вполне готово.</p>\n<p>А еще открою всем свою традицию. Когда разгорятся угли, я всегда сначала жарю только одну палочку. За успех мероприятия налью бокал хорошего красного вина и оценю качество будущего шашлыка. Дам попробовать гостям, пусть хоть и не всем, раздразнив их до предела. А уж потом пошло – поехало!</p>\n<p>У меня, лично, были случаи, что близкие друзья, один даже мясник по образованию, теряли дар речи во время еды. А после 5-6 палочек выдохнув, сказал, что такого шашлыка он еще не ел! Теперь, кстати, маринует только так!</p>\n<p>Не надо делать шампуры метровые. Пока, кушая, доберетесь до последнего кусочка, он будет уже холодным. Во-вторых, махая за столом «шпагой», приговаривая какой вкусный шашлык, можно хорошему другу выколоть глаз. А как прекрасно есть шашлык именно с шампура, когда он еще горячий. В этом случае я пользуюсь своими, короткими, общая длина 37 см, шампурами. Если у вас их всего 20 штук, значит, у вас нет друзей, и вы не можете кого-то позвать в гости. Мясо должно быть надето на шампуры до последнего кусочка. Или вы делаете так: –Эй, Вован, давай, доедай, шампур давай, мне Кольке надо пожарить!</p>\n<p>У меня их штук 90–100, не ржавеют, кушать не просят, если только чтоб на них мясо надели, и на всех хватит. А на природу беру все мясо уже надетое и только на шампурах. В специальной емкости и от всяких насекомых спрятано. Маринованное мясо надеваю на шампуры только сам и только дома. Этой работой своих дам я не утруждаю, уж если взялся за дело, то и доведу его до конца. Не хочу обижать наш милый и прекрасный пол, но мясо не должно прокручиваться на шампурах или свисать до самых углей.</p>\n<p>Что касается размера палочек, то во время еды, лучше ведь, взять другую, свеженькую, горячую палочку, поэтому я насаживаю по 5-6 кусочков. Для милых дам бывает достаточно и один шампур, она бы и второй хотела бы попробовать, но при огромных шампурах она боится, что вдруг не справится. При моих размерах можно спокойно регулировать количеством съеденного шашлыка. Мы ведь не в каменном веке у крутящегося мамонта или на соревновании: «Кто больше съест!» Хотя, при хорошем шашлыке, любая мысль о диете просто пропадает! И уж два – три шампурчика, ваша дамочка может съесть всегда с удовольствием!</p>\n<p>Опять же случай из жизни. День затянулся всякими делами, был поздний вечер, сауна и, соответственно, шашлычок. Одна дама из родственного круга, уж очень возмутилась, типа, на ночь, глядя и такое блюдо!? С юности знала правила питания, присматривала за своей фигуркой, а сама, между прочим, три палочки и проглотила, да еще и кружку пива наверх!!!…</p>\n<p>Последнее условие и немаловажное: гостей всегда сажайте за стол, пусть они пропустят одну рюмку с салатами. Никакой ходьбы вокруг мангала, все должны сидеть за столом! Пусть втягивают ноздрями, что Вы там готовите. Ваше место только у огня!!! Вот тут Вы и начинайте подавать им Ваш шашлычок!</p>\n<p>Шашлык необходимо есть только горячим! И ещ., если угощаете шашлыком, пусть это будет только шашлык. Что-то из закуски, типа: соленые огурцы, помидоры, патиссоны. Сладкий перец, оливки черные, лук, темный хлеб и, конечно – хорошая водочка! Никаких мантов и пирогов быть не должно, ведь Вы угощаете только ШАШЛЫКОМ!</p>\n<p>Не знаю, куда потом Вас будут целовать за это, но первым шашлычником на деревне Вы точно будете! Вот так выглядит первый шампур, скворчащий, поджаривающийся и, не сгорая на жарком огне. А сок, какой сок бежит, Вы только посмотрите! Если он капнет на огонь, то эта капля сразу вспыхнет огнем, а при дне мангала с наименьшей вентиляцией, этого не произойдет.</p>\n<p>Ниже вы увидите, что все партии прожаренного мной шашлыка у меня выглядят примерно одинаково, так что и у вас получится, я в этом уверен!</p>\n<p>А вот она первая партия, народ ждет, все налито, только подавай!</p>\n<p>Источник:&nbsp;<a href="http://www.shashlik.spb.ru/">http://www.shashlik.spb.ru</a></p>', '1', '1', 1, 1, '0000-00-00 00:00:00', '2013-04-19 04:56:28', 'вап', 'енг', 'hz'),
	(3, 'Заголовок 3', 'test2', '<p><span>Делать этот&nbsp;</span>плов<span>&nbsp;надо на природе, на даче или где имеется &laquo;очаг&raquo;, так называют&nbsp;</span>узбеки<span>&nbsp;кухню, приспособленную для готовки&nbsp;</span>плова<span>. Но этот плов можно готовить и в домашних условиях, лучше на газе, но и на электричестве он так же не становится хуже.</span><br /><span>Вы просто соотносите технологию варения в <span style="color: #0099ff;"><a title="казаны и печи под казаны" href="http://metallpark96.ru/shop/16/kazany-chugunnaya-i-alyuminievaya-posuda?sort=title-asc"><span style="color: #0099ff;">казане</span></a></span> на открытом огне к домашним источникам приготовления пищи. Какая разница, каким образом увеличить или же уменьшить огонь. Под казаном надо убрать или добавить дровишки, а на кухне легким поворотом регулятора пламени газа или силы тока делается то же - верно же ?!</span></p>', 'Полный текст цуквыдлаодвлп', '1', '1', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL),
	(4, 'Заголовок 4', 'test2', '<p><span>Делать этот&nbsp;</span>плов<span>&nbsp;надо на природе, на даче или где имеется &laquo;очаг&raquo;, так называют&nbsp;</span>узбеки<span>&nbsp;кухню, приспособленную для готовки&nbsp;</span>плова<span>. Но этот плов можно готовить и в домашних условиях, лучше на газе, но и на электричестве он так же не становится хуже.</span><br /><span>Вы просто соотносите технологию варения в <span style="color: #0099ff;"><a title="казаны и печи под казаны" href="http://metallpark96.ru/shop/16/kazany-chugunnaya-i-alyuminievaya-posuda?sort=title-asc"><span style="color: #0099ff;">казане</span></a></span> на открытом огне к домашним источникам приготовления пищи. Какая разница, каким образом увеличить или же уменьшить огонь. Под казаном надо убрать или добавить дровишки, а на кухне легким поворотом регулятора пламени газа или силы тока делается то же - верно же ?!</span></p>', 'Полный текст цуквыдлаодвлп', '1', '1', 1, 1, '0000-00-00 00:00:00', '2013-03-26 06:42:18', '', '', ''),
	(5, 'Заголовок 5', 'test2', '<p><span>Делать этот&nbsp;</span>плов<span>&nbsp;надо на природе, на даче или где имеется «очаг», так называют&nbsp;</span>узбеки<span>&nbsp;кухню, приспособленную для готовки&nbsp;</span>плова<span>. Но этот плов можно готовить и в домашних условиях, лучше на газе, но и на электричестве он так же не становится хуже.</span><br><span>Вы просто соотносите технологию варения в <span style="color: #0099ff;"><a title="казаны и печи под казаны" href="http://metallpark96.ru/shop/16/kazany-chugunnaya-i-alyuminievaya-posuda?sort=title-asc"><span style="color: #0099ff;">казане</span></a></span> на открытом огне к домашним источникам приготовления пищи. Какая разница, каким образом увеличить или же уменьшить огонь. Под казаном надо убрать или добавить дровишки, а на кухне легким поворотом регулятора пламени газа или силы тока делается то же - верно же ?!</span></p>', 'Полный текст цуквыдлаодвлп', '1', '1', 1, 1, '0000-00-00 00:00:00', '2013-04-02 09:22:21', '', '', '5-hz'),
	(6, 'Заголовок 6', 'test2', '<p><span>Делать этот&nbsp;</span>плов<span>&nbsp;надо на природе, на даче или где имеется &laquo;очаг&raquo;, так называют&nbsp;</span>узбеки<span>&nbsp;кухню, приспособленную для готовки&nbsp;</span>плова<span>. Но этот плов можно готовить и в домашних условиях, лучше на газе, но и на электричестве он так же не становится хуже.</span><br /><span>Вы просто соотносите технологию варения в <span style="color: #0099ff;"><a title="казаны и печи под казаны" href="http://metallpark96.ru/shop/16/kazany-chugunnaya-i-alyuminievaya-posuda?sort=title-asc"><span style="color: #0099ff;">казане</span></a></span> на открытом огне к домашним источникам приготовления пищи. Какая разница, каким образом увеличить или же уменьшить огонь. Под казаном надо убрать или добавить дровишки, а на кухне легким поворотом регулятора пламени газа или силы тока делается то же - верно же ?!</span></p>', 'Полный текст цуквыдлаодвлп', '1', '1', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL),
	(7, 'Заголовок 7', 'test2', '<p><span>Делать этот&nbsp;</span>плов<span>&nbsp;надо на природе, на даче или где имеется &laquo;очаг&raquo;, так называют&nbsp;</span>узбеки<span>&nbsp;кухню, приспособленную для готовки&nbsp;</span>плова<span>. Но этот плов можно готовить и в домашних условиях, лучше на газе, но и на электричестве он так же не становится хуже.</span><br /><span>Вы просто соотносите технологию варения в <span style="color: #0099ff;"><a title="казаны и печи под казаны" href="http://metallpark96.ru/shop/16/kazany-chugunnaya-i-alyuminievaya-posuda?sort=title-asc"><span style="color: #0099ff;">казане</span></a></span> на открытом огне к домашним источникам приготовления пищи. Какая разница, каким образом увеличить или же уменьшить огонь. Под казаном надо убрать или добавить дровишки, а на кухне легким поворотом регулятора пламени газа или силы тока делается то же - верно же ?!</span></p>', 'Полный текст цуквыдлаодвлп', '1', '1', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL),
	(8, 'Заголовок 8', 'test2', '<p><span>Делать этот&nbsp;</span>плов<span>&nbsp;надо на природе, на даче или где имеется «очаг», так называют&nbsp;</span>узбеки<span>&nbsp;кухню, приспособленную для готовки&nbsp;</span>плова<span>. Но этот плов можно готовить и в домашних условиях, лучше на газе, но и на электричестве он так же не становится хуже.</span><br><span>Вы просто соотносите технологию варения в <span style="color: #0099ff;"><a title="казаны и печи под казаны" href="http://metallpark96.ru/shop/16/kazany-chugunnaya-i-alyuminievaya-posuda?sort=title-asc"><span style="color: #0099ff;">казане</span></a></span> на открытом огне к домашним источникам приготовления пищи. Какая разница, каким образом увеличить или же уменьшить огонь. Под казаном надо убрать или добавить дровишки, а на кухне легким поворотом регулятора пламени газа или силы тока делается то же - верно же ?!</span></p>', 'Полный текст цуквыдлаодвлп', '1', '1', 1, 1, '0000-00-00 00:00:00', '2013-05-03 04:50:01', '', '', 'zagolovok'),
	(9, 'Заголовок 9', 'test2', '<p><span>Делать этот&nbsp;</span>плов<span>&nbsp;надо на природе, на даче или где имеется &laquo;очаг&raquo;, так называют&nbsp;</span>узбеки<span>&nbsp;кухню, приспособленную для готовки&nbsp;</span>плова<span>. Но этот плов можно готовить и в домашних условиях, лучше на газе, но и на электричестве он так же не становится хуже.</span><br /><span>Вы просто соотносите технологию варения в <span style="color: #0099ff;"><a title="казаны и печи под казаны" href="http://metallpark96.ru/shop/16/kazany-chugunnaya-i-alyuminievaya-posuda?sort=title-asc"><span style="color: #0099ff;">казане</span></a></span> на открытом огне к домашним источникам приготовления пищи. Какая разница, каким образом увеличить или же уменьшить огонь. Под казаном надо убрать или добавить дровишки, а на кухне легким поворотом регулятора пламени газа или силы тока делается то же - верно же ?!</span></p>', 'Полный текст цуквыдлаодвлп', '1', '1', 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL);
/*!40000 ALTER TABLE `tbl_news` ENABLE KEYS */;


-- Dumping structure for table comfort.tbl_page
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table comfort.tbl_page: ~4 rows (approximately)
/*!40000 ALTER TABLE `tbl_page` DISABLE KEYS */;
INSERT INTO `tbl_page` (`id`, `title`, `content`, `metakey`, `metadesc`, `updated_at`, `is_published`, `alias_url`) VALUES
	(1, 'О компании', '<p>Текст о компании</p>', '', '', '2013-02-11 10:05:05', '1', 'about'),
	(2, 'Новая страница6', '<p>yi</p>', 'tyi', 'tyi', '2013-03-26 15:30:43', '1', 'sdf'),
	(4, 'fghfgh', '<p>fghfgh</p>', '', '', '2013-03-26 15:46:22', '1', '4-about'),
	(5, 'Просто новая страница', '<h2 style="text-align: center;">Заголовок</h2><div>Салют</div>', '', '', '2013-04-17 15:36:25', '1', 'newpage');
/*!40000 ALTER TABLE `tbl_page` ENABLE KEYS */;


-- Dumping structure for table comfort.tbl_profiles
CREATE TABLE IF NOT EXISTS `tbl_profiles` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `user_profile_id` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table comfort.tbl_profiles: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_profiles` DISABLE KEYS */;
INSERT INTO `tbl_profiles` (`user_id`, `first_name`, `last_name`) VALUES
	(1, 'Administrator', 'Admin'),
	(2, '', '');
/*!40000 ALTER TABLE `tbl_profiles` ENABLE KEYS */;


-- Dumping structure for table comfort.tbl_profiles_fields
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table comfort.tbl_profiles_fields: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_profiles_fields` DISABLE KEYS */;
INSERT INTO `tbl_profiles_fields` (`id`, `varname`, `title`, `field_type`, `field_size`, `field_size_min`, `required`, `match`, `range`, `error_message`, `other_validator`, `default`, `widget`, `widgetparams`, `position`, `visible`) VALUES
	(1, 'first_name', 'First Name', 'VARCHAR', 255, 3, 2, '', '', 'Incorrect First Name (length between 3 and 50 characters).', '', '', '', '', 1, 3),
	(2, 'last_name', 'Last Name', 'VARCHAR', 255, 3, 2, '', '', 'Incorrect Last Name (length between 3 and 50 characters).', '', '', '', '', 2, 3);
/*!40000 ALTER TABLE `tbl_profiles_fields` ENABLE KEYS */;


-- Dumping structure for table comfort.tbl_shop_accessories
CREATE TABLE IF NOT EXISTS `tbl_shop_accessories` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `product_id` int(50) unsigned NOT NULL,
  `acc_id` int(50) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `FK_tbl_shop_accessories_tbl_shop_products` FOREIGN KEY (`product_id`) REFERENCES `tbl_shop_products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=utf8;

-- Dumping data for table comfort.tbl_shop_accessories: ~27 rows (approximately)
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


-- Dumping structure for table comfort.tbl_shop_attribute_titles
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

-- Dumping data for table comfort.tbl_shop_attribute_titles: ~5 rows (approximately)
/*!40000 ALTER TABLE `tbl_shop_attribute_titles` DISABLE KEYS */;
INSERT INTO `tbl_shop_attribute_titles` (`id`, `title`, `category_id`, `measure`, `default_value`, `type`, `in_search`, `pos`) VALUES
	(6, 'Глубина', 14, 'См', '', 2, '1', 0),
	(88, 'Высота', 14, 'См', '345', 2, '1', 2),
	(90, 'Ширина', 14, 'См', '', 1, '1', 1),
	(92, 'Глубина', 3, 'См', '', 1, '1', 0),
	(93, 'Объем', 3, 'л', '', 1, '1', 1);
/*!40000 ALTER TABLE `tbl_shop_attribute_titles` ENABLE KEYS */;


-- Dumping structure for table comfort.tbl_shop_attrs
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

-- Dumping data for table comfort.tbl_shop_attrs: ~15 rows (approximately)
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


-- Dumping structure for table comfort.tbl_shop_attr_value
CREATE TABLE IF NOT EXISTS `tbl_shop_attr_value` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `attr_id` int(10) NOT NULL,
  `value` varchar(1500) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `value` (`value`(255))
) ENGINE=InnoDB AUTO_INCREMENT=1151 DEFAULT CHARSET=utf8;

-- Dumping data for table comfort.tbl_shop_attr_value: ~225 rows (approximately)
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


-- Dumping structure for table comfort.tbl_shop_categories
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

-- Dumping data for table comfort.tbl_shop_categories: ~12 rows (approximately)
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


-- Dumping structure for table comfort.tbl_shop_gallery
CREATE TABLE IF NOT EXISTS `tbl_shop_gallery` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) NOT NULL,
  `thumbnail` varchar(500) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

-- Dumping data for table comfort.tbl_shop_gallery: ~38 rows (approximately)
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
	(46, 35, '/uploads/shop/gallery/thumb/5131e0e7a1d81Jessica_Alba_Main.jpg', '/uploads/shop/gallery/title/5131e0e7a1d81Jessica_Alba_Main.jpg'),
	(47, 35, '/uploads/shop/gallery/thumb/5131e0e7a1d81jessica-alba-011-1920x1200.jpg', '/uploads/shop/gallery/title/5131e0e7a1d81jessica-alba-011-1920x1200.jpg'),
	(48, 35, '/uploads/shop/gallery/thumb/513340e07bdceXr_YKG8KTBel.jpg', '/uploads/shop/gallery/title/513340e07bdceXr_YKG8KTBel.jpg'),
	(49, 35, '/uploads/shop/gallery/thumb/513340e07bdcejessica-alba-im-alltags-look-600x900-615109.jpg', '/uploads/shop/gallery/title/513340e07bdcejessica-alba-im-alltags-look-600x900-615109.jpg'),
	(50, 35, '/uploads/shop/gallery/thumb/513340e07bdceJessica-Alba11.jpg', '/uploads/shop/gallery/title/513340e07bdceJessica-Alba11.jpg'),
	(51, 35, '/uploads/shop/gallery/thumb/513340e07bdcejessica-alba-011-1920x1200.jpg', '/uploads/shop/gallery/title/513340e07bdcejessica-alba-011-1920x1200.jpg'),
	(52, 35, '/uploads/shop/gallery/thumb/513340e07bdceJessica-Alba-4.jpg', '/uploads/shop/gallery/title/513340e07bdceJessica-Alba-4.jpg'),
	(53, 35, '/uploads/shop/gallery/thumb/513340e07bdce77026088_large_1279638508_jessicaalba_by_reactor_net_064.jpg', '/uploads/shop/gallery/title/513340e07bdce77026088_large_1279638508_jessicaalba_by_reactor_net_064.jpg'),
	(54, 33, '/uploads/shop/gallery/thumb/519333edf10b1150px-Stephan_El_Shaarawy.jpg', '/uploads/shop/gallery/title/519333edf10b1150px-Stephan_El_Shaarawy.jpg'),
	(55, 33, '/uploads/shop/gallery/thumb/519333edf10b1753E5AFA-C3A0-4DF0-9BA0-51E604E8C97B.jpg', '/uploads/shop/gallery/title/519333edf10b1753E5AFA-C3A0-4DF0-9BA0-51E604E8C97B.jpg'),
	(56, 1, '/uploads/shop/gallery/thumb/51a2ca5c1002871052.jpg', '/uploads/shop/gallery/title/51a2ca5c1002871052.jpg'),
	(57, 1, '/uploads/shop/gallery/thumb/51a2ca5c10028046c67f24bfb3b4ca352a4a93c90ef5b.jpg', '/uploads/shop/gallery/title/51a2ca5c10028046c67f24bfb3b4ca352a4a93c90ef5b.jpg'),
	(58, 1, '/uploads/shop/gallery/thumb/51a2ca5c10028150px-Stephan_El_Shaarawy.jpg', '/uploads/shop/gallery/title/51a2ca5c10028150px-Stephan_El_Shaarawy.jpg'),
	(59, 38, '/uploads/shop/gallery/thumb/51a2ca5c1002871052.jpg', '/uploads/shop/gallery/title/51a2ca5c1002871052.jpg'),
	(60, 38, '/uploads/shop/gallery/thumb/51a2ca5c10028046c67f24bfb3b4ca352a4a93c90ef5b.jpg', '/uploads/shop/gallery/title/51a2ca5c10028046c67f24bfb3b4ca352a4a93c90ef5b.jpg'),
	(61, 38, '/uploads/shop/gallery/thumb/51a2ca5c10028150px-Stephan_El_Shaarawy.jpg', '/uploads/shop/gallery/title/51a2ca5c10028150px-Stephan_El_Shaarawy.jpg');
/*!40000 ALTER TABLE `tbl_shop_gallery` ENABLE KEYS */;


-- Dumping structure for table comfort.tbl_shop_orders
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- Dumping data for table comfort.tbl_shop_orders: ~8 rows (approximately)
/*!40000 ALTER TABLE `tbl_shop_orders` DISABLE KEYS */;
INSERT INTO `tbl_shop_orders` (`id`, `user_id`, `name`, `address`, `comments`, `created`, `active`, `visited`, `email`, `shipping_date`, `phone`) VALUES
	(8, 1, '547', '5647', '', '2013-05-06 11:24:01', '1', '1', '546', '2013-05-28', NULL),
	(9, 1, '5674', 'WERWER', '', '2013-05-06 11:24:58', '1', '1', 'werwer@POKFE.ER', '1970-01-01', NULL),
	(10, 1, 'Василий', 'Ул. Лермонтова 17-7', '', '2013-05-06 15:34:54', '0', '1', 'Пупкин', '1970-01-01', 32767),
	(11, 1, 'Серёга', 'wdfsdf', '', '2013-05-27 09:38:53', '1', '1', 'sovremenny@live.ru', '1970-01-01', 32767),
	(12, 1, 'Василий', 'PODKSPDFOK', 'SDF', '2013-05-27 10:22:11', '1', '1', 'lkjf@kjlf.rt', '2013-05-10', NULL),
	(13, 1, 'Анатолий', '984984984', '', '2013-05-27 10:23:34', '1', '1', 'vasserman@mail.ru', '1970-01-01', 32767),
	(14, 1, 'Алексей', 'fsdfsdf', '', '2013-05-27 10:43:33', '1', '0', 'kpk@pokd.er', '1970-01-01', 32767),
	(15, 1, 'Лёха', 'зщвалпзвапщ', '', '2013-05-27 15:10:10', '1', '1', 'вапвап', '1970-01-01', 32767);
/*!40000 ALTER TABLE `tbl_shop_orders` ENABLE KEYS */;


-- Dumping structure for table comfort.tbl_shop_orders_items
CREATE TABLE IF NOT EXISTS `tbl_shop_orders_items` (
  `id` int(25) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(25) unsigned NOT NULL,
  `product_id` int(25) unsigned NOT NULL,
  `quantity` int(25) NOT NULL,
  `price` int(25) NOT NULL,
  `sum` int(25) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `FK_tbl_shop_orders_items_tbl_shop_orders` FOREIGN KEY (`order_id`) REFERENCES `tbl_shop_orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- Dumping data for table comfort.tbl_shop_orders_items: ~12 rows (approximately)
/*!40000 ALTER TABLE `tbl_shop_orders_items` DISABLE KEYS */;
INSERT INTO `tbl_shop_orders_items` (`id`, `order_id`, `product_id`, `quantity`, `price`, `sum`) VALUES
	(4, 8, 1, 1, 100, 100),
	(5, 9, 2, 8, 1608, 12864),
	(6, 9, 5, 7, 1800, 12600),
	(7, 9, 1, 5, 100, 500),
	(8, 10, 31, 1, 1800, 1800),
	(9, 10, 5, 11, 1800, 19800),
	(10, 11, 1, 1, 100, 100),
	(11, 12, 33, 1, 17680, 17680),
	(12, 13, 34, 13, 234, 3042),
	(13, 13, 36, 14, 234, 3276),
	(14, 14, 1, 4, 100, 400),
	(15, 15, 33, 1, 17680, 17680);
/*!40000 ALTER TABLE `tbl_shop_orders_items` ENABLE KEYS */;


-- Dumping structure for table comfort.tbl_shop_products
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

-- Dumping data for table comfort.tbl_shop_products: ~15 rows (approximately)
/*!40000 ALTER TABLE `tbl_shop_products` DISABLE KEYS */;
INSERT INTO `tbl_shop_products` (`id`, `title`, `description`, `characters`, `price`, `created_at`, `updated_at`, `category_id`, `in_stock`, `active`, `meta_description`, `meta_keywords`, `alias_url`) VALUES
	(1, 'Товар 1', 'Описание!!!', 'Хрень какаято\r\n<div><p><p><img src="/uploads/admin/index//9ddf11e264d8ac56e9d9fdc9c4e00164.jpg" style="width: 250px; height: 250px; float: left; margin: 0px 10px 10px 0px;" alt=""></p><br></p></div>\r\n', 100, '2013-02-25 20:18:36', '2013-06-25 09:51:51', 14, 0, '1', '', '', 'tovarchik'),
	(2, 'Товар 2', '', '<p><br></p>', 1608, '2013-02-25 23:59:27', '2013-05-15 07:43:32', 2, 0, '1', '', '', NULL),
	(5, 'Джессика Альба', 'Джессика Альба родилась 28 апреля 1981 года в городе Помона, штат Калифорния, США в семье Кэтрин (урождённой Йенсен) и Марка Альба.', '<p><span style="line-height: 1.45em;">В 2001 году Джессика заняла первое место в Hot 100 журнала Maxim. В 2005 году она была названа одной из 50 самых красивых людей планеты по версии журнала People, а в 2007 году попала в список 100 самых красивых людей. В 2002 году Альба заняла пятое место в рейтинге самых сексуальных актрис по результатам опроса портала Hollywood.com, шестое по версии журнала FHM и двенадцатое в списке «102 самых сексуальных женщин планеты» по версии журнала Stuff. В 2005 году она заняла пятое место в Hot 100 журнала Maxim.</span></p>', 1800, '2013-02-26 00:01:23', '2013-05-06 06:25:18', 3, 0, '1', '', '', '5-5-albanochka'),
	(19, 'Шкаф 2!', ' Шкафчик Шкафчик', '<p>яч сч</p>', 23435, '2013-02-26 20:44:15', '2013-05-16 10:16:29', 2, 0, '1', '', '', NULL),
	(21, 'Шкаф 3', 'Шкаф 3 суперский 4 дверцы', '', 4560, '2013-03-02 18:25:33', '2013-05-03 11:04:15', 2, 0, '1', '', '', NULL),
	(24, 'пропр', 'опронро', '', 0, '2013-03-05 14:13:54', '2013-03-05 09:14:11', 1, 0, '1', '', '', NULL),
	(25, 'нке', '', '', 0, '2013-03-05 14:14:35', NULL, 1, 0, '1', 'нукн', '', NULL),
	(31, 'Джессика Альба 2', 'Джессика Альба родилась 28 апреля 1981 года в городе Помона, штат Калифорния, США в семье Кэтрин (урождённой Йенсен) и Марка Альба.', '<p><span style="line-height: 1.45em;">В 2001 году Джессика заняла первое место в Hot 100 журнала Maxim. В 2005 году она была названа одной из 50 самых красивых людей планеты по версии журнала People, а в 2007 году попала в список 100 самых красивых людей. В 2002 году Альба заняла пятое место в рейтинге самых сексуальных актрис по результатам опроса портала Hollywood.com, шестое по версии журнала FHM и двенадцатое в списке «102 самых сексуальных женщин планеты» по версии журнала Stuff. В 2005 году она заняла пятое место в Hot 100 журнала Maxim!</span></p>', 1800, '2013-04-29 05:13:13', '2013-05-17 04:32:50', 3, 0, '1', '', '', '31-albanochka'),
	(32, 'Джессика Альба 3', 'Джессика Альба родилась 28 апреля 1981 года в городе Помона, штат Калифорния, США в семье Кэтрин (урождённой Йенсен) и Марка Альба.', '<p><span style="line-height: 1.45em;">В 2001 году Джессика заняла первое место в Hot 100 журнала Maxim. В 2005 году она была названа одной из 50 самых красивых людей планеты по версии журнала People, а в 2007 году попала в список 100 самых красивых людей. В 2002 году Альба заняла пятое место в рейтинге самых сексуальных актрис по результатам опроса портала Hollywood.com, шестое по версии журнала FHM и двенадцатое в списке «102 самых сексуальных женщин планеты» по версии журнала Stuff. В 2005 году она заняла пятое место в Hot 100 журнала Maxim.</span></p>', 1600, '2013-04-29 05:15:14', '2013-05-16 07:38:57', 3, 0, '1', '', '', NULL),
	(33, 'Samsung Galaxy S III i9300 16Gb Black', 'GSM, 3G, смартфон, Android 4.0, вес 133 г, ШхВхТ 70.6x136.6x8.6 мм, экран 4.8", 720x1280, FM-радио, Bluetooth, NFC, Wi-Fi, GPS, ГЛОНАСС, фотокамера 8 МП, память 16 Гб,', '<p><b style="line-height: 1.45em;">Достоинства:&nbsp;</b><span style="line-height: 1.45em;">Экран,самый качественный корые я когда то видел!!!!Большое разрешение, фотографии получаются естественными,яркими!!! Процессор: шустрый,ни где не тормозит, не зависал еще ни разу!!!Аккумулятор держит очень долго, зарядил утром на 68%, продержался 2 дня!!!... Все писать не буду, выделил главное т.к все ни раз упоминалось!!!</span></p><p><b style="line-height: 1.45em;">Недостатки:&nbsp;</b><span style="line-height: 1.45em;">Пока не заметил!!!</span></p><p><b>Комментарий:&nbsp;</b>Ребята, если кто то затрудняется в выборе, то скажу,пока нет ничего лучшего, кроме Note 2!!</p><p></p>', 17680, '2013-05-07 06:23:47', '2013-07-17 10:38:35', 18, 0, '1', 'Samsung Galaxy S III i9300 16Gb Black', 'Samsung', 'samsung-galaxy-s3'),
	(34, 'Самсунг', '', '', 234, '2013-05-14 04:32:27', NULL, 18, 0, '1', '', '', '-samsung-galaxy-s3'),
	(35, 'HTC ONE X', 'GSM, 3G, смартфон, Android 4.0, вес 130 г, ШхВхТ 69.9x134.36x8.9 мм, экран 4.7", 720x1280, FM-радио, Bluetooth, NFC, Wi-Fi, GPS, фотокамера 8 МП, память 32 Гб, аккумулятор ...', '<p>yr</p>', 123324, '2013-05-14 04:35:03', '2013-05-15 10:37:18', 18, 0, '1', '', '', '3578-samsung-galaxy-s3'),
	(36, 'Ещё Уан икс', 'цуацуа', '<p>фывапвыап</p>', 234, '2013-05-14 06:34:47', '2013-05-20 09:24:10', 18, 0, '1', '', '', '36--samsung-galaxy-s3'),
	(37, 'Джессика Альба 4', 'Джессика Альба', '<p><span style="line-height: 1.45em;">В 2001 году Джессика заняла первое место в Hot 100 журнала Maxim. В 2005 году она была названа одной из 50 самых красивых людей планеты по версии журнала People, а в 2007 году попала в список 100 самых красивых людей. В 2002 году Альба заняла пятое место в рейтинге самых сексуальных актрис по результатам опроса портала Hollywood.com, шестое по версии журнала FHM и двенадцатое в списке «102 самых сексуальных женщин планеты» по версии журнала Stuff. В 2005 году она заняла пятое место в Hot 100 журнала Maxim.</span></p>', 1600, '2013-04-29 05:15:14', '2013-05-16 10:17:32', 3, 0, '1', '', '', NULL),
	(38, 'Товар 1', 'Описание!', 'Хрень какаято', 100678, '2013-05-30 04:43:28', '2013-05-30 05:10:38', 14, 10, '1', '', '', 'tovarchik2');
/*!40000 ALTER TABLE `tbl_shop_products` ENABLE KEYS */;


-- Dumping structure for table comfort.tbl_shop_productsimg
CREATE TABLE IF NOT EXISTS `tbl_shop_productsimg` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `thumbnail` varchar(500) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `FK_tbl_shop_productsimg_tbl_shop_products` FOREIGN KEY (`product_id`) REFERENCES `tbl_shop_products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- Dumping data for table comfort.tbl_shop_productsimg: ~14 rows (approximately)
/*!40000 ALTER TABLE `tbl_shop_productsimg` DISABLE KEYS */;
INSERT INTO `tbl_shop_productsimg` (`id`, `product_id`, `thumbnail`, `image`) VALUES
	(6, 19, '/uploads/shop/product/thumb/5170ecc9e6425753E5AFA-C3A0-4DF0-9BA0-51E604E8C97B.jpg', '/uploads/shop/product/title/5170ecc9e6425753E5AFA-C3A0-4DF0-9BA0-51E604E8C97B.jpg'),
	(7, 5, '/uploads/shop/product/thumb/5134650feb1538d31b779e3dc27748fbab31df16cef06.png', '/uploads/shop/product/title/5134650feb1538d31b779e3dc27748fbab31df16cef06.png'),
	(9, 21, '/uploads/shop/product/thumb/5131efbd38d8204-04-06_1557.jpg', '/uploads/shop/product/title/5131efbd38d8204-04-06_1557.jpg'),
	(10, 1, '/uploads/shop/product/thumb/5135a88a842beTravel.png', '/uploads/shop/product/title/5135a88a842beTravel.png'),
	(13, 24, '/uploads/shop/product/thumb/5135a9536cd521266239971_74379928_1---.jpg', '/uploads/shop/product/title/5135a9536cd521266239971_74379928_1---.jpg'),
	(14, 25, '/uploads/shop/product/thumb/5135a96b639333cef940e71025ef7dbb0656dd7554c03.jpg', '/uploads/shop/product/title/5135a96b639333cef940e71025ef7dbb0656dd7554c03.jpg'),
	(15, 2, '/uploads/shop/product/thumb/517a25ba43b8eTY2tnq2cWB0.jpg', '/uploads/shop/product/title/517a25ba43b8eTY2tnq2cWB0.jpg'),
	(21, 31, '/uploads/shop/product/thumb/5134650feb1538d31b779e3dc27748fbab31df16cef06.png', '/uploads/shop/product/title/5134650feb1538d31b779e3dc27748fbab31df16cef06.png'),
	(22, 32, '/uploads/shop/product/thumb/5134650feb1538d31b779e3dc27748fbab31df16cef06.png', '/uploads/shop/product/title/5134650feb1538d31b779e3dc27748fbab31df16cef06.png'),
	(23, 33, '/uploads/shop/product/thumb/518881d3e598e71052.jpg', '/uploads/shop/product/title/518881d3e598e71052.jpg'),
	(24, 34, '/uploads/shop/product/thumb/5191a23badb649104697shop_items_catalog_image273.jpg', '/uploads/shop/product/title/5191a23badb649104697shop_items_catalog_image273.jpg'),
	(25, 35, '/uploads/shop/product/thumb/5191a2d71f2d4onex.jpg', '/uploads/shop/product/title/5191a2d71f2d4onex.jpg'),
	(26, 36, '/uploads/shop/product/thumb/5191bee78f1bc150px-Stephan_El_Shaarawy.jpg', '/uploads/shop/product/title/5191bee78f1bc150px-Stephan_El_Shaarawy.jpg'),
	(27, 38, '/uploads/shop/product/thumb/5135a88a842beTravel.png', '/uploads/shop/product/title/5135a88a842beTravel.png');
/*!40000 ALTER TABLE `tbl_shop_productsimg` ENABLE KEYS */;


-- Dumping structure for table comfort.tbl_shop_products_rating
CREATE TABLE IF NOT EXISTS `tbl_shop_products_rating` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `rating` float unsigned DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_tbl_shop_products_rating_tbl_shop_products` (`product_id`),
  CONSTRAINT `FK_tbl_shop_products_rating_tbl_shop_products` FOREIGN KEY (`product_id`) REFERENCES `tbl_shop_products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

-- Dumping data for table comfort.tbl_shop_products_rating: ~31 rows (approximately)
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
	(49, 36, 10),
	(50, 37, 10);
/*!40000 ALTER TABLE `tbl_shop_products_rating` ENABLE KEYS */;


-- Dumping structure for table comfort.tbl_users
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_username` (`username`),
  UNIQUE KEY `user_email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table comfort.tbl_users: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;
INSERT INTO `tbl_users` (`id`, `username`, `password`, `email`, `activkey`, `superuser`, `status`, `create_at`, `lastvisit_at`) VALUES
	(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'webmaster@example.com', '9b94c7be573c22b9d4f7f8caccd5043d', 1, 1, '2013-02-06 10:47:38', '2013-07-17 10:18:26'),
	(2, 'sega', '81dc9bdb52d04dc20036dbd8313ed055', 'esrde@rty.rt', 'af40cbe01b5936d62d8b947c7bf9140f', 0, 1, '2013-02-12 17:06:06', '2013-02-24 16:35:43');
/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
