/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50616
Source Host           : localhost:3306
Source Database       : my_docs

Target Server Type    : MYSQL
Target Server Version : 50616
File Encoding         : 65001

Date: 2015-03-10 17:05:44
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `carousel`
-- ----------------------------
DROP TABLE IF EXISTS `carousel`;
CREATE TABLE `carousel` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of carousel
-- ----------------------------
INSERT INTO `carousel` VALUES ('1', 'В Чиколе открылся МФЦ', '<p>В Чиколе открылся центр Мои документы</p>', 'wybINzLaHMHDpg18OT1v.jpg', '1', '1', '2015-02-10 08:26:30', '2015-03-02 22:14:49');
INSERT INTO `carousel` VALUES ('2', 'В Моздоке открылся МФЦ', '<p>В г. Моздок открылся центр &quot;Мои документы&quot;</p>', 'yVHRdRENZ4pQHqEfAg4v.jpg', '2', '1', '2015-02-10 08:26:30', '2015-03-02 22:59:24');
INSERT INTO `carousel` VALUES ('3', 'Получите свои документы в центрах МФЦ', '<p>Мы оказываем около 50 различных услуг</p>', 'Hz8WPUSDYglsEmQAvylC.jpg', '3', '1', '2015-02-10 08:26:30', '2015-03-02 23:03:12');
INSERT INTO `carousel` VALUES ('4', 'Слайдер 4', 'Описание слайдера 4', '4.gif', '4', '0', '2015-02-10 08:26:30', '2015-02-10 08:26:30');

-- ----------------------------
-- Table structure for `centres`
-- ----------------------------
DROP TABLE IF EXISTS `centres`;
CREATE TABLE `centres` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hot_line` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `call_centre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `director` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `latitude` float(8,2) DEFAULT NULL,
  `longtitude` float(8,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of centres
-- ----------------------------
INSERT INTO `centres` VALUES ('1', 'г. Владикавказ, проспект Коста, 15', 'г. Владикавказ, проспект Коста, 15', 'г. Владикавказ, проспект Коста, 15', '+7 (867) 270-77-23', 'vladikavkaz@mfc15.ru', 'Бзаева Аида Кайтикоевна', '43.01', '44.67', '2015-02-10 08:26:32', '2015-03-02 23:47:12');
INSERT INTO `centres` VALUES ('2', 'г. Владикавказ, ул. Коцоева, 17', 'г. Владикавказ, ул. Коцоева, 17', 'г. Владикавказ, ул. Коцоева, 17', '+7 (867) 270-77-23', 'vladikavkaz@mfc15.ru', 'Петров Петр Петрович', '43.02', '44.60', '2015-02-10 08:26:33', '2015-03-02 23:46:14');
INSERT INTO `centres` VALUES ('3', 'г. Владикавказ, ул. Кутузова, 104 б', '+7 (867) 270-77-23', 'г. Владикавказ, ул. Кутузова, 104 б', '+7 (867) 270-77-23', 'info@mfc15.ru', 'Петров Петр Петрович', '43.02', '44.60', '2015-02-10 08:26:34', '2015-02-10 08:26:34');
INSERT INTO `centres` VALUES ('4', 'с. Эльхотово, ул. Кирова', '+7 (867) 270-77-23', 'с. Эльхотово, ул. Кирова', '+7 (867) 270-77-23', 'info@mfc15.ru', 'Петров Петр Петрович', '43.02', '44.60', '2015-02-10 08:26:35', '2015-02-10 08:26:35');
INSERT INTO `centres` VALUES ('5', 'с. Чикола, ул. Сталина', 'с. Чикола, ул. Сталина', 'с. Чикола, ул. Сталина', '+7 (867) 270-77-23', 'iraf@mfc15.ru', 'Баликоева Залина Тазретовна', '43.20', '43.92', '2015-02-10 08:26:35', '2015-03-02 23:37:26');
INSERT INTO `centres` VALUES ('6', 'г. Моздок, ул. 50 лет Октября, 44', '(86736) 2-21-98', 'г. Моздок, ул. 50 лет Октября, 44', '+7 (8672) 70-77-23', 'mozdok@mfc15.ru', 'Минорецкий Рустам Самадович', '43.73', '44.65', '2015-02-10 08:26:35', '2015-03-02 23:32:55');

-- ----------------------------
-- Table structure for `centres_photos`
-- ----------------------------
DROP TABLE IF EXISTS `centres_photos`;
CREATE TABLE `centres_photos` (
  `centre_id` int(10) unsigned NOT NULL,
  `photo_id` int(10) unsigned NOT NULL,
  KEY `centres_photos_centre_id_foreign` (`centre_id`),
  KEY `centres_photos_photo_id_foreign` (`photo_id`),
  CONSTRAINT `centres_photos_centre_id_foreign` FOREIGN KEY (`centre_id`) REFERENCES `centres` (`id`) ON DELETE CASCADE,
  CONSTRAINT `centres_photos_photo_id_foreign` FOREIGN KEY (`photo_id`) REFERENCES `photos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of centres_photos
-- ----------------------------
INSERT INTO `centres_photos` VALUES ('1', '1');
INSERT INTO `centres_photos` VALUES ('1', '2');
INSERT INTO `centres_photos` VALUES ('1', '3');
INSERT INTO `centres_photos` VALUES ('2', '4');
INSERT INTO `centres_photos` VALUES ('2', '5');
INSERT INTO `centres_photos` VALUES ('2', '6');
INSERT INTO `centres_photos` VALUES ('4', '10');
INSERT INTO `centres_photos` VALUES ('4', '11');
INSERT INTO `centres_photos` VALUES ('4', '12');
INSERT INTO `centres_photos` VALUES ('6', '19');
INSERT INTO `centres_photos` VALUES ('6', '21');
INSERT INTO `centres_photos` VALUES ('6', '22');
INSERT INTO `centres_photos` VALUES ('5', '23');
INSERT INTO `centres_photos` VALUES ('5', '24');
INSERT INTO `centres_photos` VALUES ('5', '25');
INSERT INTO `centres_photos` VALUES ('3', '26');
INSERT INTO `centres_photos` VALUES ('3', '27');
INSERT INTO `centres_photos` VALUES ('3', '28');

-- ----------------------------
-- Table structure for `documents`
-- ----------------------------
DROP TABLE IF EXISTS `documents`;
CREATE TABLE `documents` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `document_category_id` int(10) unsigned NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `size` float(8,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `documents_document_category_id_foreign` (`document_category_id`),
  CONSTRAINT `documents_document_category_id_foreign` FOREIGN KEY (`document_category_id`) REFERENCES `documents_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of documents
-- ----------------------------
INSERT INTO `documents` VALUES ('1', 'Доп. соглашение 6-М (Долгоруково)', '1', 'file1.pdf', '631.96', '2015-02-10 08:26:38', '2015-02-10 08:26:38');
INSERT INTO `documents` VALUES ('2', 'Доп. соглашение к 5-М (Долгоруково)', '1', 'file2.pdf', '606.59', '2015-02-10 08:26:38', '2015-02-10 08:26:38');
INSERT INTO `documents` VALUES ('3', 'Доп. соглашение к 7-М (Долгоруково)', '1', 'file3.pdf', '634.10', '2015-02-10 08:26:38', '2015-02-10 08:26:38');
INSERT INTO `documents` VALUES ('4', 'Реестр соглашений', '2', 'file4.pdf', '27.44', '2015-02-10 08:26:38', '2015-02-10 08:26:38');
INSERT INTO `documents` VALUES ('5', 'Реестр филиалов и обособ. подр-й УМФЦ', '2', 'file4.pdf', '69.00', '2015-02-10 08:26:38', '2015-02-10 08:26:38');

-- ----------------------------
-- Table structure for `documents_categories`
-- ----------------------------
DROP TABLE IF EXISTS `documents_categories`;
CREATE TABLE `documents_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of documents_categories
-- ----------------------------
INSERT INTO `documents_categories` VALUES ('1', 'Дополнительное соглашение 6-М (Долгоруково)', '2015-02-10 08:26:38', '2015-02-10 08:26:38');
INSERT INTO `documents_categories` VALUES ('2', 'Реестры', '2015-02-10 08:26:38', '2015-02-10 08:26:38');

-- ----------------------------
-- Table structure for `global_service_categories`
-- ----------------------------
DROP TABLE IF EXISTS `global_service_categories`;
CREATE TABLE `global_service_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of global_service_categories
-- ----------------------------
INSERT INTO `global_service_categories` VALUES ('1', 'Гражданство', '2015-02-10 08:26:31', '2015-02-14 11:06:17');
INSERT INTO `global_service_categories` VALUES ('2', 'Имущественные отношения', '2015-02-10 08:26:31', '2015-02-14 11:19:35');
INSERT INTO `global_service_categories` VALUES ('3', 'Пенсионное обеспечение', '2015-02-10 08:26:31', '2015-02-14 11:35:00');
INSERT INTO `global_service_categories` VALUES ('4', 'Семья', '2015-02-10 08:26:31', '2015-02-14 11:39:47');
INSERT INTO `global_service_categories` VALUES ('5', 'Труд и занятость', '2015-02-10 08:26:31', '2015-02-14 11:42:26');
INSERT INTO `global_service_categories` VALUES ('6', 'Социальное обеспечение', '2015-02-10 08:26:31', '2015-02-14 11:46:00');
INSERT INTO `global_service_categories` VALUES ('7', 'Налоги и сборы', '2015-02-10 08:26:31', '2015-02-14 11:48:36');
INSERT INTO `global_service_categories` VALUES ('8', 'Производство и торговля', '2015-02-10 08:26:31', '2015-02-14 11:50:01');
INSERT INTO `global_service_categories` VALUES ('10', 'Архив', '2015-02-10 08:26:31', '2015-02-14 12:00:40');
INSERT INTO `global_service_categories` VALUES ('11', 'Культура и СМИ', '2015-02-10 08:26:31', '2015-02-14 12:03:04');
INSERT INTO `global_service_categories` VALUES ('12', 'Правопорядок и безопасность', '2015-02-10 08:26:31', '2015-02-14 12:04:06');
INSERT INTO `global_service_categories` VALUES ('13', 'УЭК и ЭЦП', '2015-02-10 08:26:31', '2015-02-14 12:05:32');

-- ----------------------------
-- Table structure for `links`
-- ----------------------------
DROP TABLE IF EXISTS `links`;
CREATE TABLE `links` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of links
-- ----------------------------
INSERT INTO `links` VALUES ('1', 'Госуслуги', '1.jpg', 'https://www.gosuslugi.ru/', '2015-02-10 08:26:37', '2015-02-10 08:26:37');
INSERT INTO `links` VALUES ('2', 'Универсальная электронная карта', 'nPtlgn91FlJfRjDdb3bd.jpg', 'http://www.uecard.ru/', '2015-02-10 08:26:37', '2015-03-02 23:51:48');
INSERT INTO `links` VALUES ('3', 'Ваш контроль', '3.jpg', 'https://vashkontrol.ru/', '2015-02-10 08:26:37', '2015-02-10 08:26:37');

-- ----------------------------
-- Table structure for `members`
-- ----------------------------
DROP TABLE IF EXISTS `members`;
CREATE TABLE `members` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of members
-- ----------------------------
INSERT INTO `members` VALUES ('1', 'Участник 1', '1.png', 'http://ya.ru', '2015-02-10 08:26:36', '2015-02-10 08:26:36');
INSERT INTO `members` VALUES ('2', 'Участник 2', '2.png', 'http://ya.ru', '2015-02-10 08:26:36', '2015-02-10 08:26:36');
INSERT INTO `members` VALUES ('3', 'Участник 3', '3.png', 'http://ya.ru', '2015-02-10 08:26:36', '2015-02-10 08:26:36');
INSERT INTO `members` VALUES ('4', 'Участник 4', '4.png', 'http://ya.ru', '2015-02-10 08:26:37', '2015-02-10 08:26:37');
INSERT INTO `members` VALUES ('5', 'Участник 5', '5.png', 'http://ya.ru', '2015-02-10 08:26:37', '2015-02-10 08:26:37');

-- ----------------------------
-- Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('2015_01_29_081856_create_carousel_table', '1');
INSERT INTO `migrations` VALUES ('2015_01_29_125227_create_news_table', '1');
INSERT INTO `migrations` VALUES ('2015_01_29_150401_create_global_service_categories_table', '1');
INSERT INTO `migrations` VALUES ('2015_01_29_150420_create_service_categories_table', '1');
INSERT INTO `migrations` VALUES ('2015_01_29_150450_create_services_table', '1');
INSERT INTO `migrations` VALUES ('2015_01_30_140050_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2015_01_31_105317_create_centres_table', '1');
INSERT INTO `migrations` VALUES ('2015_01_31_110506_create_photos_table', '1');
INSERT INTO `migrations` VALUES ('2015_01_31_112030_create_centres_photos_table', '1');
INSERT INTO `migrations` VALUES ('2015_02_02_151339_create_members_table', '1');
INSERT INTO `migrations` VALUES ('2015_02_02_164202_create_links_table', '1');
INSERT INTO `migrations` VALUES ('2015_02_04_163837_documents_categories', '1');
INSERT INTO `migrations` VALUES ('2015_02_04_163854_documents', '1');
INSERT INTO `migrations` VALUES ('2015_02_05_142613_create_videos_table', '1');
INSERT INTO `migrations` VALUES ('2015_02_25_115117_add_order_to_photos', '2');
INSERT INTO `migrations` VALUES ('2015_03_02_193620_add_note_to_services', '3');
INSERT INTO `migrations` VALUES ('2015_03_06_140335_create_organizations_table', '4');
INSERT INTO `migrations` VALUES ('2015_03_06_141706_add_organization_id_to_service_categories', '4');

-- ----------------------------
-- Table structure for `news`
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `short_text` text COLLATE utf8_unicode_ci,
  `full_text` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES ('1', 'В Чиколе открылся центр \"Мои документы\"', '<p>В с. Чикола открылся центр &quot;Мои документы&quot;</p>', '<p>В с. Чикола открылся новый пункт &quot;Моих документов&quot;. Приём заявителей ведётся в шести окнах. &quot;Мои документы&quot; работают с 08:00 до 20:00 по будням, с 08:00 до 16:00 по субботам. Воскресенье - выходной. &quot;Мои документы&quot; в Чиколе расположены по ул. Фадзаева, 22. Добро пожаловать!</p>\r\n\r\n<p><img alt=\"\" src=\"http://xn--15-jlcennldkec6cj0j.xn--p1ai/upload/chikola_resize.jpg\" style=\"height:410px; width:601px\" /></p>\r\n\r\n<p>&nbsp;</p>', 'djsDlkTWbjFmjij6LkQU.jpg', '1', '2015-02-10 08:26:30', '2015-02-12 01:49:09');
INSERT INTO `news` VALUES ('2', 'В Моздоке заработал центр \"Мои документы\"', '<p>В г. Моздок открылся новый центр &quot;Мои документы&quot;.</p>', '<p>В Моздоке начал свою работу пункт &quot;Мои документы&quot;. Жители города и района смогут воспользоваться услугами универсальных специалистов. Спектр государственных услуг уже на первом этапе работы центра достаточно широк. В перспективе перечень государственных и муниципальных услуг будет только расширяться.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Центр &quot;Мои документы&quot; в Моздоке расположен по пл. 50 лет Октября, 44. Сайт - <a href=\"http://www.mfc15.ru\" target=\"_blank\">www.mfc15.ru</a></p>\r\n\r\n<p><img alt=\"\" src=\"http://www.mfc15.ru/large_553_resepshen.jpg\" style=\"height:424px; width:600px\" /></p>', 'CunTXUqPDMAGTq5vzdgm.jpg', '1', '2015-02-10 08:26:30', '2015-02-12 01:41:41');
INSERT INTO `news` VALUES ('3', 'Сайт МФЦ работает в тестовом режиме', '<p>Заработал сайт &quot;Мои документы&quot; РСО-Алания</p>', '<p>Новый сайт &quot;Мои документы&quot; - www.моидокументы15.рф начинает свою работу. Пока сайт работает в тестовом режиме. В ближайшее время будут устранены все ошибки и добавлена необходимая информация. На сайте можно будет найти информацию о работе центров &quot;Мои документы&quot; в РСО-Алания, записаться на приём, связаться с руководством центров.&nbsp;</p>', 'r7POLlgiS9TPRkLrqBP3.jpg', '1', '2015-02-10 08:26:30', '2015-02-12 01:52:59');

-- ----------------------------
-- Table structure for `organizations`
-- ----------------------------
DROP TABLE IF EXISTS `organizations`;
CREATE TABLE `organizations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of organizations
-- ----------------------------
INSERT INTO `organizations` VALUES ('1', 'Ведомство 1', '2015-03-10 14:24:42', '2015-03-10 14:24:42');

-- ----------------------------
-- Table structure for `photos`
-- ----------------------------
DROP TABLE IF EXISTS `photos`;
CREATE TABLE `photos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of photos
-- ----------------------------
INSERT INTO `photos` VALUES ('1', '1.gif', '1', '2015-02-10 08:26:32', '2015-02-10 08:26:32');
INSERT INTO `photos` VALUES ('2', '2.gif', '2', '2015-02-10 08:26:32', '2015-02-10 08:26:32');
INSERT INTO `photos` VALUES ('3', '3.gif', '3', '2015-02-10 08:26:32', '2015-02-10 08:26:32');
INSERT INTO `photos` VALUES ('4', '4.gif', '1', '2015-02-10 08:26:33', '2015-02-10 08:26:33');
INSERT INTO `photos` VALUES ('5', '5.gif', '2', '2015-02-10 08:26:34', '2015-02-10 08:26:34');
INSERT INTO `photos` VALUES ('6', '6.gif', '3', '2015-02-10 08:26:34', '2015-02-10 08:26:34');
INSERT INTO `photos` VALUES ('10', '10.gif', '1', '2015-02-10 08:26:35', '2015-02-10 08:26:35');
INSERT INTO `photos` VALUES ('11', '11.gif', '2', '2015-02-10 08:26:35', '2015-02-10 08:26:35');
INSERT INTO `photos` VALUES ('12', '12.gif', '3', '2015-02-10 08:26:35', '2015-02-10 08:26:35');
INSERT INTO `photos` VALUES ('19', 'nixDtjNq1BQtOeKkTGB7.jpg', '1', '2015-03-02 23:19:18', '2015-03-02 23:31:43');
INSERT INTO `photos` VALUES ('21', 'xHTDVQmQMyLkxeztkDxH.jpg', '2', '2015-03-02 23:31:50', '2015-03-02 23:31:50');
INSERT INTO `photos` VALUES ('22', 'ekj8ZM9GpLQ1ulrn3yqS.jpg', '3', '2015-03-02 23:31:55', '2015-03-02 23:31:55');
INSERT INTO `photos` VALUES ('23', 'vWJiTNMbSmwNz2rL52M1.jpg', '2', '2015-03-02 23:42:58', '2015-03-02 23:43:20');
INSERT INTO `photos` VALUES ('24', '9aTP6UnN8I1TQ1WpdyNY.jpg', '3', '2015-03-02 23:43:08', '2015-03-02 23:43:17');
INSERT INTO `photos` VALUES ('25', '2NzshO3klaQsX1Fmka3m.jpg', '1', '2015-03-02 23:43:14', '2015-03-02 23:43:20');
INSERT INTO `photos` VALUES ('26', 'sIm9ErMeVV02U8yMECx8.jpg', '1', '2015-03-02 23:56:01', '2015-03-02 23:56:08');
INSERT INTO `photos` VALUES ('27', 'zwQUTe1G3ihvNMprPi8t.jpg', '2', '2015-03-02 23:56:06', '2015-03-02 23:56:08');
INSERT INTO `photos` VALUES ('28', 'gm9sIMd5uIcfQg193elC.jpg', '3', '2015-03-02 23:56:14', '2015-03-02 23:56:14');

-- ----------------------------
-- Table structure for `services`
-- ----------------------------
DROP TABLE IF EXISTS `services`;
CREATE TABLE `services` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `full_text` text COLLATE utf8_unicode_ci,
  `service_category_id` int(10) unsigned NOT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `services_service_category_id_foreign` (`service_category_id`),
  CONSTRAINT `services_service_category_id_foreign` FOREIGN KEY (`service_category_id`) REFERENCES `service_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of services
-- ----------------------------
INSERT INTO `services` VALUES ('1', 'Регистрация иностранных граждан по месту пребывания', '<p><strong>Полное наименование услуги</strong><br />\r\nПрием и выдача документов о регистрации и снятии граждан РФ с регистрационного учета месту пребывания и по месту жительства в пределах РФ<br />\r\n&nbsp;</p>\r\n\r\n<p><strong>Как получить услугу</strong><br />\r\n1. Лично или через своего законного представителя подать заявление установленной формы и необходимые документы в МФЦ.<br />\r\n2. Лично или через своего законного представителя подать заявление установленной формы и необходимые документы в территориальное подразделение Управления Федеральной миграционной службы по РСО-Алания по месту жительства.<br />\r\n&nbsp;</p>\r\n\r\n<p><strong>Стоимость и порядок оплаты</strong><br />\r\nУслуга предоставляется бесплатно.<br />\r\n&nbsp;</p>\r\n\r\n<p><strong>Категории получателей</strong><br />\r\nФизические лица</p>\r\n\r\n<p><br />\r\n<strong>Основание для предоставления услуги</strong><br />\r\nЗаявление установленной формы, подписанное гражданином и собственником жилого помещения, указанного в заявлении.</p>\r\n\r\n<p><strong>Основание для отказа в предоставлении услуги</strong><br />\r\nОснований для приостановления или отказа в предоставлении государственной услуги не имеется.</p>\r\n\r\n<p><strong>Результат оказания услуги</strong><br />\r\nПолучение гражданином свидетельства о регистрации по месту пребывания, свидетельства о регистрации по месту жительства (для граждан, не достигших 14-летнего возраста) установленной формы<br />\r\nпроставление в документе, удостоверяющем личность гражданина, отметки о регистрации по месту жительства установленной формы<br />\r\nснятие гражданина с регистрационного учета по месту пребывания<br />\r\nпроставление в документе, удостоверяющем личность гражданина, отметки о снятии с регистрационного учета по месту жительства</p>\r\n\r\n<p><strong>Для регистрации по месту пребывания:</strong><br />\r\nзаявление о регистрации по месту пребывания установленной формы, подписанное гражданином и собственником (нанимателем) жилого помещения, указанного в заявлении<br />\r\nдокумент, удостоверяющий личность (предъявляется заявителем в целях идентификации получателя государственной услуги)<br />\r\nдокумент, являющийся основанием для временного проживания в жилом помещении (договор найма (поднайма), социального найма жилого помещения, свидетельство о государственной регистрации права на жилое помещение или заявление лица, предоставившего гражданину жилое помещение для временного проживания)<br />\r\n&nbsp;<br />\r\n<strong>Для регистрации по месту жительства:</strong><br />\r\nдокумент, удостоверяющий личность<br />\r\nзаявление о регистрации по месту жительства установленной формы<br />\r\nдокумент, являющийся основанием для вселения в жилое помещение (заявление лица (лиц), предоставившего гражданину жилое помещение, договор, свидетельство о государственной регистрации права (права собственности на жилое помещение), решение суда о признании права пользования жилым помещением либо иной документ или его надлежащим образом заверенная копия, подтверждающие наличие права пользования жилым помещением)<br />\r\nЗаявления о регистрации по месту пребывания и по месту жительства, снятии с регистрационного учета по месту пребывания и по месту жительства от имени граждан, не достигших 14-летнего возраста, представляют их законные представители (родители, опекуны).</p>\r\n\r\n<p><strong>Внимание! </strong>Гражданин вправе не предъявлять документ, являющийся основанием для вселения гражданина в жилое помещение, если сведения, содержащиеся в соответствующем документе, находятся в распоряжении государственных органов или органов местного самоуправления.</p>', '2', null, '2015-02-10 08:26:32', '2015-02-14 11:09:30');
INSERT INTO `services` VALUES ('2', 'Регистрация граждан РФ по месту пребывания и по месту жительства', '<p><strong>Полное наименование услуги</strong><br />\r\nПрием и выдача документов о регистрации и снятии граждан РФ с регистрационного учета месту пребывания и по месту жительства в пределах РФ</p>\r\n\r\n<p><strong>Как получить услугу</strong><br />\r\n1. Лично или через своего законного представителя подать заявление установленной формы и необходимые документы в МФЦ.<br />\r\n2. Лично или через своего законного представителя подать заявление установленной формы и необходимые документы в территориальное подразделение Управления Федеральной миграционной службы по РСО-Алания&nbsp;по месту жительства.</p>\r\n\r\n<p><strong>Стоимость и порядок оплаты</strong><br />\r\nУслуга предоставляется бесплатно.</p>\r\n\r\n<p><strong>Категории получателей</strong><br />\r\nФизические лица<br />\r\n<strong>Основание для предоставления услуги</strong><br />\r\nЗаявление установленной формы, подписанное гражданином и собственником жилого помещения, указанного в заявлении.</p>\r\n\r\n<p><strong>Основание для отказа в предоставлении услуги</strong><br />\r\nОснований для приостановления или отказа в предоставлении государственной услуги не имеется.</p>\r\n\r\n<p><strong>Результат оказания услуги</strong><br />\r\nполучение гражданином свидетельства о регистрации по месту пребывания, свидетельства о регистрации по месту жительства (для граждан, не достигших 14-летнего возраста) установленной формы<br />\r\nпроставление в документе, удостоверяющем личность гражданина, отметки о регистрации по месту жительства установленной формы<br />\r\nснятие гражданина с регистрационного учета по месту пребывания<br />\r\nпроставление в документе, удостоверяющем личность гражданина, отметки о снятии с регистрационного учета по месту жительства</p>\r\n\r\n<p><strong>Необходимые документы</strong><br />\r\n<em><strong>Для регистрации по месту пребывания:</strong></em><br />\r\nзаявление о регистрации по месту пребывания установленной формы, подписанное гражданином и собственником (нанимателем) жилого помещения, указанного в заявлении<br />\r\nдокумент, удостоверяющий личность (предъявляется заявителем в целях идентификации получателя государственной услуги)<br />\r\nдокумент, являющийся основанием для временного проживания в жилом помещении (договор найма (поднайма), социального найма жилого помещения, свидетельство о государственной регистрации права на жилое помещение или заявление лица, предоставившего гражданину жилое помещение для временного проживания)<br />\r\n&nbsp;<br />\r\n<em><strong>Для регистрации по месту жительства:</strong></em><br />\r\nдокумент, удостоверяющий личность<br />\r\nзаявление о регистрации по месту жительства установленной формы<br />\r\nдокумент, являющийся основанием для вселения в жилое помещение (заявление лица (лиц), предоставившего гражданину жилое помещение, договор, свидетельство о государственной регистрации права (права собственности на жилое помещение), решение суда о признании права пользования жилым помещением либо иной документ или его надлежащим образом заверенная копия, подтверждающие наличие права пользования жилым помещением)<br />\r\nЗаявления о регистрации по месту пребывания и по месту жительства, снятии с регистрационного учета по месту пребывания и по месту жительства от имени граждан, не достигших 14-летнего возраста, представляют их законные представители (родители, опекуны).<br />\r\n<strong>Внимание!</strong> Гражданин вправе не предъявлять документ, являющийся основанием для вселения гражданина в жилое помещение, если сведения, содержащиеся в соответствующем документе, находятся в распоряжении государственных органов или органов местного самоуправления.</p>', '2', null, '2015-02-10 08:26:32', '2015-02-14 11:13:47');
INSERT INTO `services` VALUES ('3', 'Выдача и замена паспорта', '<p><strong>Полное наименование услуги:</strong></p>\r\n\r\n<p>Прием документов и личных фотографий, необходимых для получения или замены паспорта гражданина РФ, удостоверяющего личность гражданина РФ на территории РФ</p>\r\n\r\n<p><strong>Как получить услугу</strong><br />\r\n1. Лично подать заявление установленной формы и необходимые документы в МФЦ.<br />\r\n2. Лично подать заявление установленной формы и необходимые документы в территориальное подразделение Управления Федеральной миграционной службы по Воронежской области по месту жительства.<br />\r\n3. Подать заявление в электронном виде через Единый портал государственных услуг. www.gosuslugi.ru</p>\r\n\r\n<p><strong>Стоимость и порядок оплаты</strong><br />\r\n<strong><em>Государственная пошлина:&nbsp;</em></strong><br />\r\nза выдачу паспорта - 300 рублей<br />\r\nза выдачу паспорта взамен утраченного или пришедшего в негодность - 1 500 рублей<br />\r\nза выдачу паспорта детям-сиротам и детям, оставшимся без попечения родителей, государственная пошлина не взимается<br />\r\n&nbsp;<br />\r\n&nbsp;<br />\r\n<strong>Сроки оказания услуги</strong><br />\r\n10 дней - в случае оформления паспорта по месту жительства<br />\r\n2 месяца - в случае оформления паспорта не по месту жительства</p>\r\n\r\n<p><strong>Категории получателей</strong><br />\r\nФизические лица</p>\r\n\r\n<p><strong>Основание для предоставления услуги</strong><br />\r\nЗаявление о выдаче (замене) паспорта по установленной форме, заполненное гражданином, лично обратившимся за получением паспорта.<br />\r\nОснование для отказа в предоставлении услуги<br />\r\nнедостижение гражданином 14-летнего возраста<br />\r\nотсутствие или неполнота обязательных для указания сведений в заявлении о выдаче (замене) паспорта<br />\r\nнепредставление документов, определенных действующим законодательством (см. раздел Документы)<br />\r\nнесоответствие представленных личных фотографий установленным законодательством требованиям<br />\r\nпредставление гражданами документов, выполненных на иностранном языке и не имеющих соответствующего перевода на русский язык</p>\r\n\r\n<p><br />\r\n<strong>Результат оказания услуги</strong><br />\r\nВыдача или замена паспорта.</p>\r\n\r\n<p><strong>Необходимые документы</strong><br />\r\n<em><strong>Для выдачи паспорта:</strong></em><br />\r\nзаявление о выдаче (замене) паспорта<br />\r\nсвидетельство о рождении<br />\r\nдве личные фотографии (идентичные и соответствующие возрасту заявителя на момент подачи заявления о выдаче (замене) паспорта) в черно-белом или цветном исполнении размером 35x45 мм с четким изображением лица строго в анфас без головного убора&nbsp;<br />\r\nдокументы, необходимые для проставления обязательных отметок в паспорте:<br />\r\nдокументы воинского учета (при наличии соответствующего основания)<br />\r\nсвидетельство о заключении брака, свидетельство о расторжении брака (при наличии указанного факта)<br />\r\nсвидетельства о рождении детей, не достигших 14-летнего возраста (при наличии)<br />\r\nдокументы, подтверждающие регистрацию по месту жительства (при наличии регистрации по месту жительства)<br />\r\nреквизиты квитанции об уплате государственной пошлины<br />\r\n&nbsp;<br />\r\nВ случае необходимости оформления временного удостоверения личности представляется дополнительная фотография.<br />\r\n&nbsp;<br />\r\n<strong>Для замены паспорта представляются дополнительно:</strong><br />\r\nпаспорт, подлежащий замене<br />\r\nсвидетельство о регистрации брака, выданное органом ЗАГС на территории Российской Федерации, свидетельство о регистрации брака и (или) документ компетентного органа иностранного государства, подтверждающий принятие фамилии супруга, свидетельство о расторжении брака, выданное органом ЗАГС на территории Российской Федерации, свидетельство о расторжении брака и (или) документ компетентного органа иностранного государства, подтверждающий изменение фамилии после расторжения брака, свидетельство о перемене имени, свидетельство о рождении<br />\r\nдокумент, содержащий верные сведения, - при обнаружении неточности или ошибочности произведенных в паспорте записей<br />\r\nзаключение органа записи актов гражданского состояния о внесении исправления или изменения в запись акта гражданского состояния, свидетельство о рождении - при изменении пола<br />\r\n&nbsp;<br />\r\n&nbsp;<br />\r\nГражданин вправе не представлять документы, удостоверяющие наличие гражданства РФ, выданные в связи с изменением гражданства на территории РФ, а только указать в заявлении о выдаче (замене) паспорта сведения о территориальном органе, принявшем решение об изменении гражданства.</p>', '1', 'Закон РФ', '2015-02-12 11:57:09', '2015-03-02 18:44:39');
INSERT INTO `services` VALUES ('4', 'Оформление загранпаспорта старого образца', '<p><strong>Полное наименование услуги</strong><br />\r\nПрием заявления для оформления паспорта гражданина РФ, удостоверяющего личность гражданина РФ за пределами территории РФ</p>\r\n\r\n<p><br />\r\n<strong>Как получить услугу</strong><br />\r\n1. Лично или через своего законного представителя (для несовершеннолетних или недееспособных граждан) подать заявление установленной формы и необходимые документы в МФЦ.<br />\r\n2. Лично или через своего законного представителя (для несовершеннолетних или недееспособных граждан) подать заявление установленной формы и необходимые документы в территориальное подразделение Управления Федеральной миграционной службы по РСО-Алания по месту жительства.<br />\r\n3. Подать заявление в электронном виде через Единый портал государственных услуг. www.gosuslugi.ru</p>\r\n\r\n<p><strong>Стоимость и порядок оплаты<br />\r\n<em>Государственная пошлина:</em></strong><br />\r\nот 14 лет - 2 000 рублей<br />\r\nдо 14 лет - 1 000 рублей</p>\r\n\r\n<p><br />\r\n<strong>Сроки оказания услуги</strong><br />\r\n1 месяц - при подаче документов по месту жительства<br />\r\n4 месяца - при подаче заявления по месту пребывания или фактического проживания&nbsp;</p>\r\n\r\n<p><strong>Категории получателей</strong><br />\r\nФизические лица</p>\r\n\r\n<p><strong>Основание для предоставления услуги</strong><br />\r\nЗаявление гражданина РФ (установленной формы).<br />\r\nДля граждан РФ до 18 лет - заявление хотя бы одного из родителей, усыновителей, опекунов или попечителей, если иное не предусмотрено законом.</p>\r\n\r\n<p><br />\r\n<strong>Основание для отказа в предоставлении услуги</strong><br />\r\nналичие временного ограничения права гражданина РФ на выезд из РФ, предусмотренного ст.15 Федерального закона от 15.08.2014 N 114-ФЗ &laquo;О порядке выезда из Российской Федерации и въезда в Российскую Федерацию&raquo;<br />\r\nнесогласие одного из родителей, усыновителей, опекунов или попечителей на выезд из РФ несовершеннолетнего гражданина РФ</p>\r\n\r\n<p><strong>Результат оказания услуги</strong><br />\r\nвыдача паспорта<br />\r\nвыдача уведомления об отказе в оформлении паспорта</p>\r\n\r\n<p><strong>Формы и квитанции</strong><br />\r\nКвитанция для уплаты госпошлины за выдачу загранпаспорта старого образца гражданину, не достигшему 14 лет<br />\r\nКвитанция для уплаты госпошлины за выдачу загранпаспорта старого образца гражданину, достигшему 14 лет<br />\r\nПриложения для внесения в паспорт сведений о детях<br />\r\nЗаявление на несовершеннолетнего гражданина<br />\r\nЗаявление для совершеннолетнего гражданина</p>\r\n\r\n<p><strong>Необходимые документы<br />\r\n<em>Для заявителей в возрасте от 18 лет:</em></strong><br />\r\nзаявление об оформлении паспорта (на бланке установленной формы). В случае, если заявитель хочет внести в паспорт сведения о его несовершеннолетних детях в возрасте до 14 лет, заполняется приложение к заявлению<br />\r\nосновной документ, удостоверяющий личность (паспорт)<br />\r\nквитанция об оплате государственной пошлины за выдачу паспорта (представляется заявителем по собственной инициативе)<br />\r\nзагранпаспорт, если имеется и срок его действия не истек<br />\r\nвоенный билет (для заявителей мужского пола в возрасте от 18 до 27 лет, проживающих на территории РФ)<br />\r\nтри личные фотографии в черно-белом или цветном исполнении размером 35x45мм с четким изображением лица строго в анфас без головного убора на матовой бумаге<br />\r\n&nbsp;<br />\r\n<em><strong>Для заявителей в возрасте от 14 до 18 лет или граждан, признанных судом недееспособными (ограниченно дееспособными):</strong></em><br />\r\nосновной документ, удостоверяющий личность заявителя (паспорт)<br />\r\nдокумент, удостоверяющий личность законного представителя (паспорт одного из родителей)<br />\r\nдокументы, подтверждающие права законного представителя:<br />\r\nсвидетельство о рождении несовершеннолетнего<br />\r\nакт органа опеки и попечительства о назначении опекуна или попечителя.<br />\r\nквитанция об оплате государственной пошлины за выдачу паспорта (представляется заявителем по собственной инициативе)&nbsp;<br />\r\nзагранпаспорт, если имеется и срок его действия не истек<br />\r\nдве личные фотографии в черно-белом или цветном исполнении размером 35x45мм с четким изображением лица строго в анфас без головного убора на матовой бумаге<br />\r\n&nbsp;<br />\r\n<em><strong>Для заявителей в возрасте до 14 лет:</strong></em><br />\r\nсвидетельство о рождении<br />\r\nдокумент, удостоверяющий личность законного представителя<br />\r\nдокумент, удостоверяющий наличие гражданства РФ у несовершеннолетнего гражданина<br />\r\nдокументы, подтверждающие права законного представителя (акт органа опеки и попечительства о назначении опекуна или попечителя)&nbsp;<br />\r\nквитанция об оплате государственной пошлины за выдачу паспорта (представляется заявителем по собственной инициативе)<br />\r\nпаспорт (паспорт нового поколения), если имеется и срок его действия не истек<br />\r\nдве личные фотографии в черно-белом или цветном исполнении размером 35x45мм с четким изображением лица строго в анфас без головного убора на матовой бумаге</p>', '3', null, '2015-02-14 11:17:37', '2015-02-14 11:17:37');
INSERT INTO `services` VALUES ('5', 'Составление проекта договора', '<p><strong>Полное наименование услуги</strong><br />\r\nСоставление проекта договора (об отчуждении недвижимого имущества, аренды недвижимого имущества или соглашения об установлении сервитута)</p>\r\n\r\n<p><br />\r\n<strong>Как получить услугу</strong><br />\r\nЛично или через своего законного представителя обратиться в МФЦ<br />\r\n&nbsp;</p>\r\n\r\n<p><strong>Стоимость и порядок оплаты</strong><br />\r\n1 000 рублей</p>\r\n\r\n<p><strong>Сроки оказания услуги</strong><br />\r\n2 рабочих дня</p>\r\n\r\n<p><strong>Категории получателей</strong><br />\r\nФизические лица, Юридические лица,</p>\r\n\r\n<p><strong>Основание для предоставления услуги</strong><br />\r\nЗаключение договора об оказании услуг между МФЦ&nbsp;и заявителем, либо его представителем (по доверенности)</p>\r\n\r\n<p><strong>Основание для отказа в предоставлении услуги</strong><br />\r\nпредставленные документы, по форме или содержанию не соответствуют требованиям действующего законодательства;<br />\r\nзаявитель не представил необходимые документы, в случаях, если обязанность по представлению таких документов возложена на заявителя</p>\r\n\r\n<p><br />\r\n<strong>Результат оказания услуги</strong><br />\r\nПроект договора об отчуждении имущества.</p>\r\n\r\n<p><br />\r\n<strong>Необходимые документы</strong><br />\r\nправоустанавливающие документы на отчуждаемое имущество;<br />\r\nдокумент, удостоверяющий личность заявителя</p>', '4', null, '2015-02-14 11:24:01', '2015-02-14 11:24:01');
INSERT INTO `services` VALUES ('6', 'Разрешение на ввод объекта в эксплуатацию', '<p><strong>Полное наименование услуги</strong><br />\r\nПодготовка и выдача разрешений на ввод объекта в эксплуатацию</p>\r\n\r\n<p><br />\r\n<strong>Как получить услугу</strong><br />\r\n1. Лично или через своего законного представителя подать заявление и необходимые документы в МФЦ.<br />\r\n2. Лично или через своего законного представителя подать заявление и необходимые документы &nbsp;в администрацию муниципального образования (структурное подразделение администрации, обеспечивающее организацию предоставления данной услуги) &nbsp;по месту регистрации заявителя.<br />\r\n<br />\r\n<strong>Стоимость и порядок оплаты</strong><br />\r\nМуниципальная услуга предоставляется на бесплатной основе.<br />\r\n&nbsp;<br />\r\n<strong>Сроки оказания услуги</strong><br />\r\n10 календарных дней<br />\r\n<strong>&nbsp;<br />\r\nКатегории получателей</strong><br />\r\nФизические лица, Юридические лица</p>\r\n\r\n<p><br />\r\n<strong>Основание для предоставления услуги</strong><br />\r\nЗаявление застройщика - физического и юридического лица, обеспечивающего на принадлежащем ему земельном участке строительство, реконструкцию объектов капитального строительства, за исключением индивидуальных жилых домов до трех этажей включительно, предназначенных для проживания одной семьи, многоквартирных блокированных домов количеством квартир не более двух, а также индивидуальных жилых домов до трех этажей включительно, находящихся в общей долевой собственности, с количеством изолированных жилых помещений, имеющих самостоятельный выход на земельный участок, не более четырех при общей площади дома не более 300 кв. м в секторе индивидуальной жилой застройки<br />\r\n&nbsp;<br />\r\n<strong>Основание для отказа в предоставлении услуги</strong><br />\r\nнепредставление документов, определенных административным регламентом предоставления услуги несоответствие объекта капитального строительства требованиям градостроительного плана земельного участка или в случае строительства, реконструкции линейного объекта требованиям проекта планировки территории и проекта межевания территории<br />\r\nнесоответствие объекта капитального строительства требованиям, установленным в разрешении на строительство<br />\r\nнесоответствие параметров построенного, реконструированного объекта капитального строительства проектной документации<br />\r\nневыполнение застройщиком требований, предусмотренных частью 18 статьи 51 Градостроительного кодекса РФ<br />\r\n&nbsp;<br />\r\n<strong>Результат оказания услуги</strong><br />\r\nвыдача разрешения на ввод объекта капитального строительства в эксплуатацию<br />\r\nмотивированный отказ в предоставлении муниципальной услуги<br />\r\n<strong>Необходимые документы</strong><br />\r\nдокумент, удостоверяющий личность заявителя<br />\r\nдокумент, удостоверяющий личность представителя заявителя, и документ, подтверждающий полномочия представлять интересы заявителя (при обращении представителя заявителя)<br />\r\nзаявление о выдаче разрешения на ввод объетка в эксплуатацию<br />\r\nтехнический план, подготовленный в установленном порядке<br />\r\nакт приемки объекта капитального строительства (в случае осуществления строительства, реконструкции на основании договора)<br />\r\nдокумент, подтверждающий соответствие построенного, реконструированного объекта капитального строительства требованиям технических регламентов&nbsp;<br />\r\nдокумент, подтверждающий соответствие параметров построенного, реконструированного объекта капитального строительства проектной документации, в том числе требованиям энергетической эффективности и требованиям оснащенности объектов капитального строительства приборами учета используемых энергетических ресурсов<br />\r\nдокументы, подтверждающие соответствие построенного, реконструированного объекта капитального строительства техническим условиям (при их наличии)&nbsp;<br />\r\nсхема, отображающая расположение построенного, реконструированного объекта капитального строительства, расположение сетей инженерно-технического обеспечения в границах земельного участка и планировочную организацию земельного участка, за исключением случаев строительства, реконструкции линейного объекта<br />\r\nдокумент, подтверждающий заключение договора обязательного страхования гражданской ответственности владельца опасного объекта за причинение вреда в результате аварии на опасном объекте&nbsp;<br />\r\n&nbsp;<br />\r\nДокументы, необходимые в соответствии с нормативными правовыми актами для предоставления муниципальной услуги, которые находятся в распоряжении государственных органов, органов местного самоуправления и иных органов, участвующих в предоставлении государственных и муниципальных услуг, и могут быть представлены заявителем по собственной инициативе:<br />\r\nправоустанавливающие документы на земельный участок, если указанные документы отсутствуют в Едином государственном реестре прав на недвижимое имущество и сделок с ним&nbsp;<br />\r\nградостроительный план земельного участка или в случае выдачи разрешения на строительство линейного объекта - реквизиты проекта планировки территории и проекта межевания территории<br />\r\nсведения о площади, о высоте и количестве этажей планируемого объекта капитального строительства, о сетях инженерно-технического обеспечения, один экземпляр копии результатов инженерных изысканий и по одному экземпляру копий разделов проектной документации<br />\r\nвыписка из Единого государственного реестра прав на недвижимое имущество и сделок с ним о зарегистрированных правах на объект недвижимости (земельный участок)<br />\r\nзаключение органа государственного строительного надзора (в случае если предусмотрено осуществление государственного строительного надзора) о соответствии построенного, реконструированного объекта капитального строительства требованиям технических регламентов и проектной документации, в том числе требованиям энергетической эффективности и требованиям оснащенности объекта капитального строительства приборами учета используемых энергетических ресурсов<br />\r\nразрешение на строительство, реконструкцию<br />\r\n&nbsp;</p>', '4', null, '2015-02-14 11:27:42', '2015-02-14 11:27:42');

-- ----------------------------
-- Table structure for `service_categories`
-- ----------------------------
DROP TABLE IF EXISTS `service_categories`;
CREATE TABLE `service_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `global_service_category_id` int(10) unsigned NOT NULL,
  `organization_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `service_categories_global_service_category_id_foreign` (`global_service_category_id`),
  KEY `service_categories_organization_id_foreign` (`organization_id`),
  CONSTRAINT `service_categories_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `service_categories_global_service_category_id_foreign` FOREIGN KEY (`global_service_category_id`) REFERENCES `global_service_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of service_categories
-- ----------------------------
INSERT INTO `service_categories` VALUES ('1', 'Паспорт Российской Федерации', '1.png', '1', '1', '2015-02-10 08:26:31', '2015-02-10 08:26:31');
INSERT INTO `service_categories` VALUES ('2', 'Смена места жительства', 'XvjRrMvRR8eo2tPcCtkj.png', '1', '1', '2015-02-10 08:26:31', '2015-02-10 13:02:09');
INSERT INTO `service_categories` VALUES ('3', 'Заграничный паспорт', '9WkuRHkpgAaSI47leyme.png', '1', '1', '2015-02-10 08:26:32', '2015-02-10 13:04:07');
INSERT INTO `service_categories` VALUES ('4', 'Недвижимость', '8WS4fRR27fPPdxGEiNXa.png', '2', '1', '2015-02-14 11:21:39', '2015-02-14 11:21:39');
INSERT INTO `service_categories` VALUES ('5', 'Земельные отношения', 'I7k7IBJ9cqKPlcCcNjNu.png', '2', '1', '2015-02-14 11:32:14', '2015-02-14 11:32:14');
INSERT INTO `service_categories` VALUES ('6', 'Жилищно-коммунальное хозяйство (ЖКХ)', '6pNHJ6FAauKu5276ICPR.png', '2', '1', '2015-02-14 11:32:55', '2015-02-14 11:32:55');
INSERT INTO `service_categories` VALUES ('7', 'Информирование', 'kgaul9YmXSaLeJmbYB2v.png', '2', '1', '2015-02-14 11:33:27', '2015-02-14 11:33:27');
INSERT INTO `service_categories` VALUES ('8', 'Прочее', 'MsS7ESCc1TztZLTpi8wU.png', '2', '1', '2015-02-14 11:33:54', '2015-02-14 11:33:54');
INSERT INTO `service_categories` VALUES ('9', 'Обязательное пенсионное страхование', 'F7GDPG1PTSQPmT9NOGQ5.png', '3', '1', '2015-02-14 11:37:48', '2015-02-14 11:37:48');
INSERT INTO `service_categories` VALUES ('10', 'Назначение и выплата пенсий', 'U3WhGLsnRORWWpuunW04.png', '3', '1', '2015-02-14 11:38:20', '2015-02-14 11:38:20');
INSERT INTO `service_categories` VALUES ('11', 'Формирование и инвестирование пенсионных накоплений', 'h9SfBrIEbXB52SBTFd5n.png', '3', '1', '2015-02-14 11:38:51', '2015-02-14 11:38:51');
INSERT INTO `service_categories` VALUES ('12', 'Информирование', 'vsTRlelXPp6kREOmmADG.png', '3', '1', '2015-02-14 11:39:12', '2015-02-14 11:39:12');
INSERT INTO `service_categories` VALUES ('13', 'Регистрация важных событий', 'rZMs2KYuTbRmBh2xgcee.png', '4', '1', '2015-02-14 11:40:48', '2015-02-14 11:40:48');
INSERT INTO `service_categories` VALUES ('14', 'Дети', 'aa1dK0LfDBFUgly69Bf1.png', '4', '1', '2015-02-14 11:41:27', '2015-02-14 11:41:27');
INSERT INTO `service_categories` VALUES ('15', 'Работодателям', 'JDjuRA68fVJpn46puR7K.png', '5', '1', '2015-02-14 11:43:36', '2015-02-14 11:43:36');
INSERT INTO `service_categories` VALUES ('16', 'Соискателям', 'ujekCmDvJbYxKc2c5ltO.png', '5', '1', '2015-02-14 11:43:51', '2015-02-14 11:43:51');
INSERT INTO `service_categories` VALUES ('17', 'Информирование', 'kpVHVw8TXT1qfSpmRnA1.png', '5', '1', '2015-02-14 11:44:26', '2015-02-14 11:44:26');
INSERT INTO `service_categories` VALUES ('18', 'Пособия, субсидии, компенсации', 'i8umc7sPuE6pbgnszQEH.png', '6', '1', '2015-02-14 11:46:49', '2015-02-14 11:46:49');
INSERT INTO `service_categories` VALUES ('19', 'Семьи с детьми', 'Iz8Icwx2Abpfz4Z8jsSL.png', '6', '1', '2015-02-14 11:47:01', '2015-02-14 11:47:01');
INSERT INTO `service_categories` VALUES ('20', 'Прочее', 'G8AD5wkU3wliw8ye1BwG.png', '6', '1', '2015-02-14 11:47:25', '2015-02-14 11:47:25');
INSERT INTO `service_categories` VALUES ('21', 'Для физических лиц и ИП', 'VfHDKu3aepbKoajizaYa.png', '7', '1', '2015-02-14 11:49:16', '2015-02-14 11:49:16');
INSERT INTO `service_categories` VALUES ('22', 'Информирование', 'LiBcTU7z70zNRyKsz2us.png', '7', '1', '2015-02-14 11:49:31', '2015-02-14 11:49:31');
INSERT INTO `service_categories` VALUES ('23', 'Защита прав потребителей', 'U5HN4Erb6y5g3MN5qOyy.png', '8', '1', '2015-02-14 11:58:52', '2015-02-14 11:58:52');
INSERT INTO `service_categories` VALUES ('24', 'Лицензии, сертификаты, разрешения', 'OjrtDUsLM6EWYOtLD4dg.png', '8', null, '2015-02-14 11:59:09', '2015-02-14 11:59:09');
INSERT INTO `service_categories` VALUES ('25', 'Прием уведомлений о начале предпринимательской деятельности', 'zzz7uffRtPI2DISpM1S0.png', '8', null, '2015-02-14 11:59:25', '2015-02-14 11:59:25');
INSERT INTO `service_categories` VALUES ('26', 'Информирование', 'CDoNggx3C6BOq0dfPtfr.png', '8', null, '2015-02-14 11:59:35', '2015-02-14 11:59:35');
INSERT INTO `service_categories` VALUES ('27', 'Государственная регистрация предприятия', 'x0VvylxGDKkbXEI5PDwr.png', '8', null, '2015-02-14 11:59:55', '2015-02-14 11:59:55');
INSERT INTO `service_categories` VALUES ('28', 'Прочее', 'Z8NstJmSGjMLXOaXAYqD.png', '8', null, '2015-02-14 12:00:06', '2015-02-14 12:00:06');
INSERT INTO `service_categories` VALUES ('29', 'Выписки, справки', '93j9wyGFdQLLQUv5SaeU.png', '10', null, '2015-02-14 12:02:00', '2015-02-14 12:02:00');
INSERT INTO `service_categories` VALUES ('30', 'Культурные ценности', 'W1CDh8mnf3Nrwu5e6qrT.png', '11', null, '2015-02-14 12:03:21', '2015-02-14 12:03:21');
INSERT INTO `service_categories` VALUES ('31', 'Информирование', 'ujnP7X5WvvFlepAnPXom.png', '12', null, '2015-02-14 12:04:21', '2015-02-14 12:04:21');
INSERT INTO `service_categories` VALUES ('32', 'Чрезвычайные ситуации', 'WEcKYzrrS4XSIIkbpBm5.png', '12', null, '2015-02-14 12:05:01', '2015-02-14 12:05:01');
INSERT INTO `service_categories` VALUES ('33', 'Универсальная электронная карта', 'aUmvZJwE7SUHSzDmRuzo.png', '13', null, '2015-02-14 12:06:14', '2015-02-14 12:06:14');
INSERT INTO `service_categories` VALUES ('34', 'Электронно-цифровая подпись', 'vVHWW4cLg6rbQID4WdWU.png', '13', null, '2015-02-14 12:07:11', '2015-02-14 12:07:11');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'alex.mon1989@gmail.com', '$2y$10$DNrmcqgADhbvgdefPRxgq.Yzz.32QWyponISpR7ui3XRPz1M2Vpte', 'admin', null, '2015-02-10 08:26:40', '2015-02-10 08:26:40');

-- ----------------------------
-- Table structure for `videos`
-- ----------------------------
DROP TABLE IF EXISTS `videos`;
CREATE TABLE `videos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `youtube_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of videos
-- ----------------------------
INSERT INTO `videos` VALUES ('1', 'Мы работаем в МФЦ', 'Ul5NAqmASvQ', '2015-02-10 08:26:39', '2015-02-10 08:26:39');
INSERT INTO `videos` VALUES ('2', 'Мульти МФЦ', 'UaXFM6_CrjA', '2015-02-10 08:26:39', '2015-02-10 08:26:39');
INSERT INTO `videos` VALUES ('3', 'Независимая экспертиза МФЦ', 'T58lTyhog-Q', '2015-02-10 08:26:39', '2015-02-10 08:26:39');
