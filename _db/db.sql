/*
SQLyog Community v13.1.7 (64 bit)
MySQL - 10.4.21-MariaDB : Database - sowatstation
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sowatstation` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `sowatstation`;

/*Table structure for table `events` */

DROP TABLE IF EXISTS `events`;

CREATE TABLE `events` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `events_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `events` */

insert  into `events`(`id`,`title`,`slug`,`cover`,`banner`,`description`,`status`,`created_by`,`updated_by`,`created_at`,`updated_at`) values 
(4,'Event 1','event-1','b93b53ffa2c5970f995b15d76535fc1b.jpg','41eec0ce701d687fa85a8822e8205b40.jpg','<p>Passengers access easily to art activities by coming to our events that hosted by<br>the very talented and dedicated artists.<br>Workshops will be held weekly, and more other events are coming up.</p>',0,NULL,NULL,'2022-03-04 04:46:31','2022-03-04 21:06:21');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2019_12_14_000001_create_personal_access_tokens_table',1),
(5,'2022_03_02_202812_create_sowaters_table',2),
(6,'2022_03_02_204753_update_sowaters_table',3),
(7,'2022_03_04_035226_create_events_table',4),
(8,'2022_03_04_051317_create_postcards_table',5);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `postcards` */

DROP TABLE IF EXISTS `postcards`;

CREATE TABLE `postcards` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `gif` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `postcards_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `postcards` */

insert  into `postcards`(`id`,`title`,`slug`,`cover`,`type`,`gif`,`video`,`description`,`status`,`created_by`,`updated_by`,`created_at`,`updated_at`) values 
(1,'Mèo mái hiền','meo-mai-hien','10fb9872eb47d285cd76518125cfe8b9.jpg',NULL,'0edff1ab807693f1a6c9e56d34f14ffc.jpg',NULL,'<p>Mèo mái hiền</p>',0,NULL,NULL,'2022-03-04 08:14:25','2022-03-04 08:14:25'),
(3,'Mèo mái hiền 2','meo-mai-hien-2','c9cf8447f037dfb7a59bb4fc28e321ad.jpg',NULL,'94939187d9ff20c78f6f1299b322186b.jpg',NULL,'<p>Mèo mái hiền</p>',0,NULL,NULL,'2022-03-04 08:37:51','2022-03-04 08:38:25');

/*Table structure for table `settings` */

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `settings` */

insert  into `settings`(`id`,`key`,`value`,`status`,`created_by`,`updated_by`,`created_at`,`updated_at`) values 
(8,'production_desc','Attention please, on this platform there are exclusive product lines that resulted from the combination between the beautiful artworks from talented artists and professional production from SoWat. All products were made with a lot of love and care, to bring out the best quality in every detail.',0,1,1,'2022-03-02 20:20:15','2022-03-02 20:20:18'),
(9,'about_description','<p>We connect artists with the resources they need to pursue their artistic goals, while also valuing their individual creations and assisting them in reaching out to audiences.</p>\r\n<p>We connect and expose art to the community in order to raise the appreciation value of creativity, art, design innovation, and so on. We connect art, from all over the world.</p>',0,1,1,'2022-03-02 20:21:05','2022-03-02 20:21:07'),
(10,'sowater_description','At Sowat Station, each Sowat—ers carries on their own hunt for original ideas, for ingenious execution, and for their own growth. We set out to chart the uncharted territories of this industry, in a hunt that\'s always on.',0,1,1,'2022-03-02 20:35:28','2022-03-02 20:35:30'),
(11,'address','386/21 B Lê Văn Sỹ, phường 14, quận 03, TP Hồ Chí Minh',0,NULL,NULL,NULL,NULL),
(12,'contact_email','van.au@sowatstation.com',0,NULL,NULL,NULL,NULL),
(13,'facebook','https://www.facebook.com/sowat.station',0,NULL,NULL,NULL,NULL),
(14,'instagram','https://www.instagram.com/sowat.station',0,NULL,NULL,NULL,NULL),
(15,'postcard_description','Lorem, ipsum dolor sit amet consectetur adipisicing elit.',0,NULL,NULL,NULL,NULL);

/*Table structure for table `sowaters` */

DROP TABLE IF EXISTS `sowaters`;

CREATE TABLE `sowaters` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar_hover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `on_column` int(11) DEFAULT NULL,
  `show_homepage` int(11) DEFAULT 0,
  `status` int(1) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sowaters` */

insert  into `sowaters`(`id`,`full_name`,`avatar`,`avatar_hover`,`priority`,`on_column`,`show_homepage`,`status`,`created_by`,`updated_by`,`created_at`,`updated_at`) values 
(1,'Ngọc Điệp','59b793b1f1b1637a448fd2037c886ebb.jpg','2f7ba0ab01bc0910aaa53270c5b9fe14.jpg',1,1,0,0,NULL,NULL,NULL,NULL),
(2,'Đăng Nguyễn','35f6fd27f79f64bc95d12377aa8d3802.jpg','9994c7f422c91c7111f69968ae9e2c27.jpg',2,1,1,0,NULL,NULL,NULL,NULL),
(3,'Uyên Châu','2e081ccec08df6b62319f5ae55463eb3.jpg','9b9c9fa4ce003d1f71f4bdf571c96b90.jpg',3,1,0,0,NULL,NULL,NULL,NULL),
(4,'Văn Âu','2c0780f275eea84c69f9a536debfba9c.jpg','9c24f524db9504f78ad2e63b080d8a91.jpg',1,2,0,0,NULL,NULL,NULL,NULL),
(5,'Quỳnh Lê','4ce28e04009d6223f4fc249fd6971dcc.jpg','97300ae4a13b286ad350813e13b6f590.jpg',2,2,0,0,NULL,NULL,NULL,NULL),
(6,'Ngân Nguyễn','a9a3f6d5a65f61f7945636a377bf4721.jpg','b0144a500604ec43de3346bece668d81.jpg',3,2,0,0,NULL,NULL,NULL,NULL),
(7,'Linh Tăng','8475f59796a784889576f723863f9e7d.jpg','d899e6ae63e356fd4ecf0aadde801624.jpg',1,3,0,0,NULL,NULL,NULL,NULL),
(10,'Huy Đình','1d808487a2a1a76b69c8a794b2795bb0.jpg','a0b40d62707adcebd6569e15573779e8.jpg',2,3,1,0,NULL,NULL,NULL,NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` int(11) NOT NULL DEFAULT 0,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`is_admin`,`email`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values 
(1,'admin',1,'admin@sowatstation.com','2022-03-02 20:04:03','$2y$10$JYHm0CLQxkrsg11ovsDF2.D0uEKd5Wq2DG.vPNLnbzWW3Vv7ggs8i',NULL,'2022-03-02 20:04:09','2022-03-02 20:04:11');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
