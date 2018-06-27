/*
SQLyog Community v12.3.3 (64 bit)
MySQL - 5.7.21-0ubuntu0.16.04.1 : Database - medify_hospital
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`medify_hospital` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `medify_hospital`;

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `password_resets` */

insert  into `password_resets`(`email`,`token`,`created_at`) values 
('kevin@medify.ida','$2y$10$rUb31ebHsOnSC01o85nBZufd.sadLMQtpt9TjrbVjjgAJxwSIXovu','2017-09-26 04:28:41');

/*Table structure for table `room` */

DROP TABLE IF EXISTS `room`;

CREATE TABLE `room` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) DEFAULT NULL,
  `room_ward_id` int(11) DEFAULT NULL,
  `img_ori` varchar(512) DEFAULT NULL,
  `img_lg` varchar(512) DEFAULT NULL,
  `img_md` varchar(512) DEFAULT NULL,
  `img_sm` varchar(512) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

/*Data for the table `room` */

insert  into `room`(`id`,`name`,`room_ward_id`,`img_ori`,`img_lg`,`img_md`,`img_sm`,`created_at`,`updated_at`) values 
(1,'Ruang 1',1,'room-1.jpg','room-1.jpg','room-1.jpg','room-1.jpg','2017-11-13 07:18:04',NULL),
(2,'Ruang 2',1,'room-2.jpg','room-2.jpg','room-2.jpg','room-2.jpg','2017-11-13 07:18:12',NULL),
(3,'Ruang 3',1,'room-3.jpg','room-3.jpg','room-3.jpg','room-3.jpg','2017-11-13 07:18:17',NULL),
(4,'Ruang 4',1,'room-4.jpg','room-4.jpg','room-4.jpg','room-4.jpg','2017-11-13 07:18:19',NULL),
(5,'Ruang 5',1,'room-5.jpg','room-5.jpg','room-5.jpg','room-5.jpg','2017-11-13 07:18:22',NULL),
(6,'Ruang 6',1,'room-6.jpg','room-6.jpg','room-6.jpg','room-6.jpg','2017-11-13 07:18:23',NULL),
(7,'Ruang 1',2,'room-1.jpg','room-1.jpg','room-1.jpg','room-1.jpg','2017-11-13 07:18:34',NULL),
(8,'Ruang 2',2,'room-2.jpg','room-2.jpg','room-2.jpg','room-2.jpg','2017-11-13 07:18:36',NULL),
(9,'Ruang 3',2,'room-3.jpg','room-3.jpg','room-3.jpg','room-3.jpg','2017-11-13 07:18:38',NULL),
(10,'Ruang 4',2,'room-4.jpg','room-4.jpg','room-4.jpg','room-4.jpg','2017-11-13 07:18:40',NULL),
(11,'Ruang 5',2,'room-5.jpg','room-5.jpg','room-5.jpg','room-5.jpg','2017-11-13 07:18:42',NULL),
(12,'Ruang 6',2,'room-6.jpg','room-6.jpg','room-6.jpg','room-6.jpg','2017-11-13 07:18:43',NULL),
(13,'Ruang 1',3,'room-1.jpg','room-1.jpg','room-1.jpg','room-1.jpg','2017-11-13 07:18:59',NULL),
(14,'Ruang 2',3,'room-2.jpg','room-2.jpg','room-2.jpg','room-2.jpg','2017-11-13 07:19:01',NULL),
(15,'Ruang 3',3,'room-3.jpg','room-3.jpg','room-3.jpg','room-3.jpg','2017-11-13 07:19:03',NULL),
(16,'Ruang 4',3,'room-4.jpg','room-4.jpg','room-4.jpg','room-4.jpg','2017-11-13 07:19:05',NULL),
(17,'Ruang 5',3,'room-5.jpg','room-5.jpg','room-5.jpg','room-5.jpg','2017-11-13 07:19:07',NULL),
(18,'Ruang 1',4,'room-6.jpg','room-6.jpg','room-6.jpg','room-6.jpg','2017-11-13 07:19:18',NULL),
(19,'Ruang 2',4,'room-1.jpg','room-1.jpg','room-1.jpg','room-1.jpg','2017-11-13 07:19:19',NULL),
(20,'Ruang 3',4,'room-2.jpg','room-2.jpg','room-2.jpg','room-2.jpg','2017-11-13 07:19:20',NULL),
(21,'Ruang 4',4,'room-3.jpg','room-3.jpg','room-3.jpg','room-3.jpg','2017-11-13 07:19:21',NULL),
(22,'Ruang 5',4,'room-4.jpg','room-4.jpg','room-4.jpg','room-4.jpg','2017-11-13 07:19:23',NULL),
(23,'Ruang 1',5,NULL,NULL,NULL,NULL,'2017-11-13 07:19:28',NULL),
(24,'Ruang 2',5,NULL,NULL,NULL,NULL,'2017-11-13 07:19:29',NULL),
(25,'Ruang 3',5,NULL,NULL,NULL,NULL,'2017-11-13 07:19:30',NULL),
(26,'Ruang 4',5,NULL,NULL,NULL,NULL,'2017-11-13 07:19:32',NULL),
(27,'Ruang 5',5,NULL,NULL,NULL,NULL,'2017-11-13 07:19:33',NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar_ori` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar_big` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar_thumb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `profesi` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`password`,`avatar_ori`,`avatar_big`,`avatar_thumb`,`remember_token`,`created_at`,`updated_at`,`profesi`) values 
(1,'Nanik','nanik@medify.id','$2y$10$jzEZb3jiCRH91k1z.SWKg.33n3ZDW32XnG.yPfDCRzayk7XYUGmHe','/assets/users/avatar/1/song_jong_ki.jpg','/assets/users/avatar/1/song_jong_ki.jpg','/assets/users/avatar/1/song_jong_ki.jpg','CT8JZ9Nb4mbKs9vN2sBTuFElBLaLTIdFgHvbMLztmviBGXaNegKPpd3fnZq0','2017-09-25 16:20:27','2017-09-26 04:29:37','Front Office'),
(3,'Bayu','bayu@medify.id','$2y$10$jzEZb3jiCRH91k1z.SWKg.33n3ZDW32XnG.yPfDCRzayk7XYUGmHe','/assets/users/avatar/1/song_jong_ki.jpg','/assets/users/avatar/1/song_jong_ki.jpg','/assets/users/avatar/1/song_jong_ki.jpg','CT8JZ9Nb4mbKs9vN2sBTuFElBLaLTIdFgHvbMLztmviBGXaNegKPpd3fnZq0','2017-09-25 16:20:27','2017-09-26 04:29:37','Pengantar'),
(4,'Rini','rini@medify.id','$2y$10$jzEZb3jiCRH91k1z.SWKg.33n3ZDW32XnG.yPfDCRzayk7XYUGmHe','/assets/users/avatar/1/song_jong_ki.jpg','/assets/users/avatar/1/song_jong_ki.jpg','/assets/users/avatar/1/song_jong_ki.jpg','CT8JZ9Nb4mbKs9vN2sBTuFElBLaLTIdFgHvbMLztmviBGXaNegKPpd3fnZq0','2017-09-25 16:20:27','2017-09-26 04:29:37','Perawat'),
(5,'Anandi','anandi.jaya31@gmail.com','$2y$10$S15wnaaOR9qTIT5hvpe5weQfCwV7.HjLZdrr1ot36TDkodnVRVmba',NULL,NULL,NULL,'LNsTWnNIxzR2Z64M7xK4B7h55Ij5KLwlogtKarMa4yioHvMzTD7RdmsKhkc3','2018-01-12 15:04:08','2018-01-12 15:04:08',NULL),
(6,'','hari@medify.id','$2y$10$6wy/C2wZYAz13cnetgPUku58BYqtQxu5mvkk6J2dOgtemaKUdV.IC',NULL,NULL,NULL,NULL,'2018-01-14 23:30:41','2018-01-14 23:30:41',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
