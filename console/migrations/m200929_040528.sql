-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               10.4.11-MariaDB - mariadb.org binary distribution
-- Операционная система:         Win64
-- HeidiSQL Версия:              10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры для таблица eco2020_local.conference
CREATE TABLE IF NOT EXISTS `conference` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `registration_deadline` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Дамп данных таблицы eco2020_local.conference: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `conference` DISABLE KEYS */;
INSERT INTO `conference` (`id`, `name`, `registration_deadline`, `created_at`) VALUES
	(1, 'Российский научный форум «Экология и общество: баланс интересов»', 2147483647, 1601009998);
/*!40000 ALTER TABLE `conference` ENABLE KEYS */;

-- Дамп структуры для таблица eco2020_local.lecture
CREATE TABLE IF NOT EXISTS `lecture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'Имя',
  `middlename` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Отчество',
  `lastname` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'Фамилия',
  `country` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Страна',
  `city` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Город',
  `place_work` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Место работы',
  `position` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Должность',
  `user_academic_degree_id` int(11) DEFAULT NULL COMMENT 'Ученая степень',
  `user_academic_rank_id` int(11) DEFAULT NULL COMMENT 'Ученое звание',
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'Адрес электронной почты',
  `phone` varchar(32) DEFAULT NULL COMMENT 'Номер телефона',
  `participation_format_id` int(32) NOT NULL COMMENT 'Формат участия в форуме',
  `conference_id` int(11) DEFAULT NULL,
  `section_id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'Тема выступления',
  `need_hotel` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Потребность в гостинице',
  `created_at` int(11) DEFAULT NULL,
  `file_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `conference_id` (`conference_id`),
  KEY `user_academic_degree_id` (`user_academic_degree_id`),
  KEY `user_academic_rank_id` (`user_academic_rank_id`),
  KEY `section_id` (`section_id`)
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8mb4;

-- Дамп данных таблицы eco2020_local.lecture: ~17 rows (приблизительно)
/*!40000 ALTER TABLE `lecture` DISABLE KEYS */;
/*!40000 ALTER TABLE `lecture` ENABLE KEYS */;

-- Дамп структуры для таблица eco2020_local.migration
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы eco2020_local.migration: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;

-- Дамп структуры для таблица eco2020_local.participation_format
CREATE TABLE IF NOT EXISTS `participation_format` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_ru` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_ru` (`name_ru`),
  UNIQUE KEY `name_en` (`name_en`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Дамп данных таблицы eco2020_local.participation_format: ~4 rows (приблизительно)
/*!40000 ALTER TABLE `participation_format` DISABLE KEYS */;
INSERT INTO `participation_format` (`id`, `name_ru`, `name_en`) VALUES
	(1, 'докладчик', 'speaker'),
	(2, 'слушатель', 'listener'),
	(3, 'член программного комитета', 'program committe member'),
	(4, 'член организационного комитета', 'member of the organizing committee');
/*!40000 ALTER TABLE `participation_format` ENABLE KEYS */;

-- Дамп структуры для таблица eco2020_local.section
CREATE TABLE IF NOT EXISTS `section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `conference_id` varchar(255) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `conference_id` (`conference_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Дамп данных таблицы eco2020_local.section: ~6 rows (приблизительно)
/*!40000 ALTER TABLE `section` DISABLE KEYS */;
INSERT INTO `section` (`id`, `title`, `conference_id`) VALUES
	(1, 'Секция 1. Эколого-экономические проблемы устойчивого развития территорий', '1'),
	(2, 'Секция 2. Экологизация производственной деятельности', '1'),
	(3, 'Секция 3. Экология города', '1'),
	(4, 'Секция 4. Социальная экология/ Социальные аспекты экологии человека', '1'),
	(5, 'Круглый стол 1. Проблемы рационального природопользования и охраны окружающей среды', '1'),
	(6, 'Круглый стол 2. Экологическое образование и просвещение', '1');
/*!40000 ALTER TABLE `section` ENABLE KEYS */;

-- Дамп структуры для таблица eco2020_local.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Дамп данных таблицы eco2020_local.user: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'Q44Jv6aAYKqDRsAAYSojUtDnVzpvN7SV', '$2y$13$fQQ6yeP9jFsO0h0vhyjIKu2oH19V8oGdOV1WKT8BCvFIhgmmi0lTa', 'jGV7li9_wW6ZkzIK1j88XyMbqVCNJAtU_1601009998', 'admin@admin.admin', 10, 1601009998, 1601009998);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Дамп структуры для таблица eco2020_local.user_academic_degree
CREATE TABLE IF NOT EXISTS `user_academic_degree` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_ru` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_ru` (`name_ru`),
  UNIQUE KEY `name_en` (`name_en`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Дамп данных таблицы eco2020_local.user_academic_degree: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `user_academic_degree` DISABLE KEYS */;
INSERT INTO `user_academic_degree` (`id`, `name_ru`, `name_en`) VALUES
	(1, 'Кандидат наук', 'Ph.D.'),
	(2, 'Доктор наук', 'Doctor of Science');
/*!40000 ALTER TABLE `user_academic_degree` ENABLE KEYS */;

-- Дамп структуры для таблица eco2020_local.user_academic_rank
CREATE TABLE IF NOT EXISTS `user_academic_rank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_ru` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_ru` (`name_ru`),
  UNIQUE KEY `name_en` (`name_en`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Дамп данных таблицы eco2020_local.user_academic_rank: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `user_academic_rank` DISABLE KEYS */;
INSERT INTO `user_academic_rank` (`id`, `name_ru`, `name_en`) VALUES
	(1, 'Доцент', 'Associate'),
	(2, 'Профессор', 'Professor');
/*!40000 ALTER TABLE `user_academic_rank` ENABLE KEYS */;

-- Дамп структуры для таблица eco2020_local.user_files
CREATE TABLE IF NOT EXISTS `user_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

-- Дамп данных таблицы eco2020_local.user_files: ~14 rows (приблизительно)
/*!40000 ALTER TABLE `user_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_files` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
