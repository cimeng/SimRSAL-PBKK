/*
SQLyog Community v12.3.3 (64 bit)
MySQL - 5.7.22-0ubuntu0.16.04.1 : Database - medify_hospital
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

/*Table structure for table `daftar_harga` */

DROP TABLE IF EXISTS `daftar_harga`;

CREATE TABLE `daftar_harga` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `keterangan` varchar(256) DEFAULT NULL,
  `departemen` varchar(256) DEFAULT NULL,
  `detail_departemen` varchar(256) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `harga_1` int(11) DEFAULT NULL,
  `harga_2` int(11) DEFAULT NULL,
  `harga_3` int(11) DEFAULT NULL,
  `harga_vip` int(11) DEFAULT NULL,
  `harga_vvip` int(11) DEFAULT NULL,
  `pajak` int(3) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `daftar_harga` */

insert  into `daftar_harga`(`id`,`name`,`type`,`keterangan`,`departemen`,`detail_departemen`,`harga`,`harga_1`,`harga_2`,`harga_3`,`harga_vip`,`harga_vvip`,`pajak`,`created_at`,`updated_at`) values 
(1,'Administrasi IGD',1,NULL,'IGD','Front Office',15000,15000,15000,15000,15000,15000,10,'2018-03-28 04:19:13','2018-03-28 04:19:13'),
(2,'Jasa Dokter IGD',1,NULL,'IGD','Dokter',0,150000,100000,50000,200000,250000,10,'2018-03-28 04:19:38','2018-03-28 04:19:38'),
(3,'Jasa Perawat IGD',1,NULL,'IGD','Perawat',0,50000,40000,30000,60000,70000,10,'2018-03-28 04:20:33','2018-03-28 04:20:33'),
(4,'Investasi',NULL,NULL,'Manajemen','Manajemen',0,NULL,NULL,NULL,NULL,NULL,0,'2018-05-17 06:01:28','2018-05-17 06:01:28');

/*Table structure for table `daftar_harga_type` */

DROP TABLE IF EXISTS `daftar_harga_type`;

CREATE TABLE `daftar_harga_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `desc` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `daftar_harga_type` */

insert  into `daftar_harga_type`(`id`,`desc`) values 
(1,'Jasa');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

/*Table structure for table `modul` */

DROP TABLE IF EXISTS `modul`;

CREATE TABLE `modul` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `modul` */

insert  into `modul`(`id`,`name`,`created_at`,`updated_at`) values 
(1,'Pasien','2018-02-20 23:39:00',NULL),
(2,'Rawat Jalan','2018-02-20 23:39:03',NULL),
(3,'Rawat Inap','2018-02-20 23:39:04',NULL),
(4,'Gizi','2018-02-20 23:39:06',NULL),
(5,'Farmasi','2018-02-20 23:39:07',NULL),
(6,'Radiologi','2018-02-20 23:39:08',NULL),
(7,'Gudang Farmasi','2018-02-20 23:39:12',NULL),
(8,'IGD','2018-02-20 23:39:13',NULL),
(9,'Kamar Operasi','2018-03-02 09:55:49',NULL),
(10,'Lab PK','2018-05-20 13:16:52',NULL);

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
('kevin@medify.ida','$2y$10$rUb31ebHsOnSC01o85nBZufd.sadLMQtpt9TjrbVjjgAJxwSIXovu','2017-09-25 21:28:41'),
('kevinfachreza009@gmail.com','$2y$10$oQQ0MvKqiX4U0AYnm3whiu7x491tJWgsCgeJhRiplSNErllTXVnRq','2018-03-20 12:03:55');

/*Table structure for table `transaksi_keluar` */

DROP TABLE IF EXISTS `transaksi_keluar`;

CREATE TABLE `transaksi_keluar` (
  `id` int(11) DEFAULT NULL,
  `modul_id` int(11) DEFAULT NULL,
  `transaksi_local_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `transaksi_keluar` */

/*Table structure for table `transaksi_masuk` */

DROP TABLE IF EXISTS `transaksi_masuk`;

CREATE TABLE `transaksi_masuk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pasien_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `kasus_rujuk_id` int(11) DEFAULT NULL,
  `transaksi_rujuk_id` int(11) DEFAULT NULL,
  `modul_id` int(11) DEFAULT NULL,
  `transaksi_lokal_id` int(11) DEFAULT NULL,
  `tagihan_id` int(11) DEFAULT NULL,
  `kasus_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

/*Data for the table `transaksi_masuk` */

insert  into `transaksi_masuk`(`id`,`pasien_id`,`created_at`,`updated_at`,`deleted_at`,`created_by`,`kasus_rujuk_id`,`transaksi_rujuk_id`,`modul_id`,`transaksi_lokal_id`,`tagihan_id`,`kasus_id`) values 
(1,2137,'2018-03-07 22:41:08','2018-03-07 22:41:08',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(2,2130,'2018-03-08 06:47:17','2018-03-08 06:47:17',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(3,2130,'2018-03-08 06:49:19','2018-03-08 06:49:19',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(4,2135,'2018-03-08 07:00:52','2018-03-08 07:00:52',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(5,2138,'2018-03-08 08:04:32','2018-03-08 08:04:32',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(6,2138,'2018-03-08 08:04:50','2018-03-08 08:04:50',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(7,2135,'2018-03-08 09:13:29','2018-03-08 09:13:29',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(8,2135,'2018-03-08 09:15:36','2018-03-08 09:15:36',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(9,2135,'2018-03-08 09:18:09','2018-03-08 09:18:09',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(10,2135,'2018-03-08 09:21:56','2018-03-08 09:21:56',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(11,2135,'2018-03-08 09:30:22','2018-03-08 09:30:22',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(12,2135,'2018-03-08 09:32:25','2018-03-08 09:32:25',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(13,2135,'2018-03-08 09:32:56','2018-03-08 09:32:56',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(14,2135,'2018-03-08 09:33:22','2018-03-08 09:33:22',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(15,2135,'2018-03-08 09:33:48','2018-03-08 09:33:48',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(16,2135,'2018-03-08 09:34:14','2018-03-08 09:34:14',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(17,2135,'2018-03-08 09:39:21','2018-03-08 09:39:21',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(18,2135,'2018-03-08 09:40:06','2018-03-08 09:40:06',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(19,2129,'2018-03-09 15:54:18','2018-03-09 15:54:18',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(20,2169,'2018-04-25 19:36:49','2018-04-25 19:36:49',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(21,2150,'2018-04-25 20:03:16','2018-04-25 20:03:16',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(22,2136,'2018-04-25 21:24:23','2018-04-25 21:24:23',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(23,2168,'2018-04-25 21:26:15','2018-04-25 21:26:15',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(24,2169,'2018-04-26 08:27:50','2018-04-26 08:27:50',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(25,2150,'2018-04-26 08:45:11','2018-04-26 08:45:11',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(26,2151,'2018-04-26 09:00:17','2018-04-26 09:00:17',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(27,2169,'2018-04-27 07:32:46','2018-04-27 07:32:46',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(28,2168,'2018-04-27 07:33:56','2018-04-27 07:33:56',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(29,2165,'2018-04-27 07:35:39','2018-04-27 07:35:39',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(30,2151,'2018-04-27 07:35:59','2018-04-27 07:35:59',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(31,2150,'2018-04-27 07:37:01','2018-04-27 07:37:01',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(32,2169,'2018-04-28 22:00:58','2018-04-28 22:00:58',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(33,2169,'2018-04-29 07:18:23','2018-04-29 07:18:23',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(34,2169,'2018-04-29 08:05:22','2018-04-29 08:05:22',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(35,2169,'2018-05-15 15:46:32','2018-05-15 15:46:32',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(36,2177,'2018-05-17 16:00:10','2018-05-17 16:00:10',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(37,2169,'2018-05-17 16:01:07','2018-05-17 16:01:07',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(38,2129,'2018-05-18 11:06:01','2018-05-18 11:06:01',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(39,2129,'2018-05-18 11:06:17','2018-05-18 11:06:17',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(40,2129,'2018-05-18 11:09:08','2018-05-18 11:09:08',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(41,2129,'2018-05-18 11:12:12','2018-05-18 11:12:12',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(42,2129,'2018-05-18 11:12:44','2018-05-18 11:12:44',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `transaksi_masuk_detail` */

DROP TABLE IF EXISTS `transaksi_masuk_detail`;

CREATE TABLE `transaksi_masuk_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `modul_id` int(11) DEFAULT NULL,
  `transaksi_lokal_id` int(11) DEFAULT NULL,
  `transaksi_masuk_id` int(11) DEFAULT NULL,
  `utama` int(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

/*Data for the table `transaksi_masuk_detail` */

insert  into `transaksi_masuk_detail`(`id`,`modul_id`,`transaksi_lokal_id`,`transaksi_masuk_id`,`utama`,`created_at`,`updated_at`,`created_by`) values 
(1,8,1,1,1,'2018-03-07 22:41:09','2018-03-07 22:41:10',NULL),
(6,3,4,1,1,'2018-03-08 06:20:01','2018-03-08 06:20:02',NULL),
(7,8,NULL,2,1,'2018-03-08 06:47:17','2018-03-08 06:47:17',NULL),
(8,8,3,3,1,'2018-03-08 06:49:21','2018-03-08 06:49:22',NULL),
(9,3,5,3,1,'2018-03-08 06:50:31','2018-03-08 06:50:31',NULL),
(10,2,12,4,1,'2018-03-08 07:00:52','2018-03-08 07:00:53',NULL),
(11,3,6,4,1,'2018-03-08 07:03:32','2018-03-08 07:03:33',NULL),
(12,3,NULL,5,1,'2018-03-08 08:04:32','2018-03-08 08:04:32',NULL),
(13,3,7,6,1,'2018-03-08 08:04:51','2018-03-08 08:04:51',NULL),
(14,3,8,4,1,'2018-03-08 08:18:16','2018-03-08 08:18:16',NULL),
(15,3,9,4,1,'2018-03-08 08:24:40','2018-03-08 08:24:40',NULL),
(16,3,10,4,1,'2018-03-08 08:27:33','2018-03-08 08:27:33',NULL),
(17,2,13,7,1,'2018-03-08 09:13:29','2018-03-08 09:13:30',NULL),
(18,2,14,8,1,'2018-03-08 09:15:37','2018-03-08 09:15:37',NULL),
(19,2,15,9,1,'2018-03-08 09:18:10','2018-03-08 09:18:10',NULL),
(20,3,11,9,1,'2018-03-08 09:20:23','2018-03-08 09:20:23',NULL),
(21,3,12,9,1,'2018-03-08 09:20:58','2018-03-08 09:20:58',NULL),
(22,2,16,10,1,'2018-03-08 09:21:56','2018-03-08 09:21:56',NULL),
(23,8,4,11,1,'2018-03-08 09:30:23','2018-03-08 09:30:24',NULL),
(24,8,NULL,12,1,'2018-03-08 09:32:25','2018-03-08 09:32:25',NULL),
(25,8,NULL,13,1,'2018-03-08 09:32:56','2018-03-08 09:32:56',NULL),
(26,8,NULL,14,1,'2018-03-08 09:33:22','2018-03-08 09:33:22',NULL),
(27,8,NULL,15,1,'2018-03-08 09:33:49','2018-03-08 09:33:49',NULL),
(28,8,NULL,16,1,'2018-03-08 09:34:15','2018-03-08 09:34:15',NULL),
(29,8,10,17,1,'2018-03-08 09:39:21','2018-03-08 09:39:22',NULL),
(30,8,11,18,1,'2018-03-08 09:40:06','2018-03-08 09:40:08',NULL),
(31,3,13,1,1,'2018-03-09 15:53:22','2018-03-09 15:53:23',NULL),
(32,3,17,19,1,'2018-03-09 15:54:19','2018-03-09 15:54:19',NULL),
(33,2,18,20,1,'2018-04-25 19:36:49','2018-04-25 19:36:50',NULL),
(34,2,19,21,1,'2018-04-25 20:03:17','2018-04-25 20:03:17',NULL),
(35,2,20,22,1,'2018-04-25 21:24:23','2018-04-25 21:24:23',NULL),
(36,2,21,23,1,'2018-04-25 21:26:16','2018-04-25 21:26:16',NULL),
(37,8,12,24,1,'2018-04-26 08:27:50','2018-04-26 08:27:51',NULL),
(38,8,13,25,1,'2018-04-26 08:45:12','2018-04-26 08:45:12',NULL),
(39,8,14,26,1,'2018-04-26 09:00:17','2018-04-26 09:00:18',NULL),
(40,3,15,27,1,'2018-04-27 07:32:47','2018-04-27 07:32:47',NULL),
(41,3,16,28,1,'2018-04-27 07:33:56','2018-04-27 07:33:57',NULL),
(42,3,17,29,1,'2018-04-27 07:35:39','2018-04-27 07:35:40',NULL),
(43,3,18,30,1,'2018-04-27 07:36:00','2018-04-27 07:36:00',NULL),
(44,3,19,31,1,'2018-04-27 07:37:01','2018-04-27 07:37:01',NULL),
(45,3,20,32,1,'2018-04-28 22:00:59','2018-04-28 22:01:00',NULL),
(46,3,21,33,1,'2018-04-29 07:18:23','2018-04-29 07:18:24',NULL),
(47,2,22,34,1,'2018-04-29 08:05:23','2018-04-29 08:05:23',NULL),
(48,3,22,18,1,'2018-05-09 11:18:55','2018-05-09 11:18:56',NULL),
(49,2,23,35,1,'2018-05-15 15:46:32','2018-05-15 15:46:32',NULL),
(50,3,23,29,1,'2018-05-15 18:47:25','2018-05-15 18:47:25',NULL),
(51,2,24,36,1,'2018-05-17 16:00:11','2018-05-17 16:00:11',NULL),
(52,2,25,37,1,'2018-05-17 16:01:08','2018-05-17 16:01:09',NULL),
(53,3,24,29,1,'2018-05-18 11:04:03','2018-05-18 11:04:04',NULL),
(54,3,25,29,1,'2018-05-18 11:04:11','2018-05-18 11:04:12',NULL),
(55,2,26,38,1,'2018-05-18 11:06:01','2018-05-18 11:06:01',NULL),
(56,2,27,39,1,'2018-05-18 11:06:18','2018-05-18 11:06:18',NULL),
(57,8,15,40,1,'2018-05-18 11:09:08','2018-05-18 11:09:09',NULL),
(58,2,28,41,1,'2018-05-18 11:12:12','2018-05-18 11:12:12',NULL),
(59,8,16,42,1,'2018-05-18 11:12:44','2018-05-18 11:12:45',NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`password`,`avatar_ori`,`avatar_big`,`avatar_thumb`,`remember_token`,`created_at`,`updated_at`,`profesi`) values 
(0,'Admin','admin@gmail.com','1232','/assets/users/avatar/1/song_jong_ki.jpg',NULL,'/assets/users/avatar/1/song_jong_ki.jpg',NULL,NULL,NULL,'7'),
(1,'Nanik','nanik@medify.id','$2y$10$jzEZb3jiCRH91k1z.SWKg.33n3ZDW32XnG.yPfDCRzayk7XYUGmHe','/assets/users/avatar/1/song_jong_ki.jpg','/assets/users/avatar/1/song_jong_ki.jpg','/assets/users/avatar/1/song_jong_ki.jpg','CT8JZ9Nb4mbKs9vN2sBTuFElBLaLTIdFgHvbMLztmviBGXaNegKPpd3fnZq0','2017-09-25 09:20:27','2017-09-25 21:29:37','20'),
(3,'Bayu','bayu@medify.id','$2y$10$jzEZb3jiCRH91k1z.SWKg.33n3ZDW32XnG.yPfDCRzayk7XYUGmHe','/assets/users/avatar/1/song_jong_ki.jpg','/assets/users/avatar/1/song_jong_ki.jpg','/assets/users/avatar/1/song_jong_ki.jpg','CT8JZ9Nb4mbKs9vN2sBTuFElBLaLTIdFgHvbMLztmviBGXaNegKPpd3fnZq0','2017-09-25 09:20:27','2017-09-25 21:29:37','2'),
(4,'Rini','rini@medify.id','$2y$10$jzEZb3jiCRH91k1z.SWKg.33n3ZDW32XnG.yPfDCRzayk7XYUGmHe','/assets/users/avatar/1/song_jong_ki.jpg','/assets/users/avatar/1/song_jong_ki.jpg','/assets/users/avatar/1/song_jong_ki.jpg','CT8JZ9Nb4mbKs9vN2sBTuFElBLaLTIdFgHvbMLztmviBGXaNegKPpd3fnZq0','2017-09-25 09:20:27','2017-09-25 21:29:37','2'),
(5,'Anandi','anandi.jaya31@gmail.com','$2y$10$S15wnaaOR9qTIT5hvpe5weQfCwV7.HjLZdrr1ot36TDkodnVRVmba','/assets/users/avatar/1/song_jong_ki.jpg',NULL,'/assets/users/avatar/1/song_jong_ki.jpg','LNsTWnNIxzR2Z64M7xK4B7h55Ij5KLwlogtKarMa4yioHvMzTD7RdmsKhkc3','2018-01-12 08:04:08','2018-01-12 08:04:08','16'),
(7,'Anne','anne@gmail.com','$2y$10$6wy/C2wZYAz13cnetgPUku58BYqtQxu5mvkk6J2dOgtemaKUdV.IC','/assets/users/avatar/1/song_jong_ki.jpg',NULL,'/assets/users/avatar/1/song_jong_ki.jpg',NULL,NULL,NULL,'20'),
(9,'Dr Faiq Firdausy','faiq@gmail.com','$2y$10$6wy/C2wZYAz13cnetgPUku58BYqtQxu5mvkk6J2dOgtemaKUdV.IC','/assets/users/avatar/1/song_jong_ki.jpg',NULL,'/assets/users/avatar/1/song_jong_ki.jpg','aeUUEisPuQGA1bUPT95bkvn1ll17wFWUZJpVtuXLS58H9K9zfBB7lgoSpNVG','2018-01-14 16:30:41','2018-01-14 16:30:41','1'),
(10,'Dr Kevin Fachreza, SpIT','kevinfachreza009@gmail.com','$2y$10$GDxdXuZ15HReILNyiCfGwu3rfVLdK3MNzDPZh5dPlxxbxJIBZ4aH6','/assets/users/avatar/1/song_jong_ki.jpg',NULL,'/assets/users/avatar/1/song_jong_ki.jpg','OBr4xSp6F6CzW8cM07ihxRubwGu3zgCGT68fdgfkmDCjkYQv3Z756MFkKr4H','2018-03-20 11:34:57','2018-03-20 12:01:21','1'),
(20,'Dr Adi Suriyanto','adi@gmail.com','123','/assets/users/avatar/1/song_jong_ki.jpg',NULL,'/assets/users/avatar/1/song_jong_ki.jpg',NULL,NULL,NULL,'7'),
(27,'Syahrini','syahrini','syahrini','/assets/users/avatar/1/song_jong_ki.jpg',NULL,'/assets/users/avatar/1/song_jong_ki.jpg',NULL,'2018-03-27 17:32:15','2018-03-27 17:32:15',NULL),
(28,'Bambang','bambang@rsal.id','bambang','/assets/users/avatar/1/song_jong_ki.jpg',NULL,'/assets/users/avatar/1/song_jong_ki.jpg',NULL,'2018-03-27 18:32:29','2018-03-27 18:32:29',NULL),
(29,'Oing','oing@gmail.com','abcetsting','/assets/users/avatar/1/song_jong_ki.jpg',NULL,'/assets/users/avatar/1/song_jong_ki.jpg',NULL,'2018-03-28 18:58:47','2018-03-28 18:58:47',NULL),
(30,'Fourir Akbar','','','/assets/users/avatar/1/song_jong_ki.jpg',NULL,'/assets/users/avatar/1/song_jong_ki.jpg',NULL,'2018-03-31 16:10:45','2018-03-31 16:10:45',NULL),
(31,'Fourir Akbar','','','/assets/users/avatar/1/song_jong_ki.jpg',NULL,'/assets/users/avatar/1/song_jong_ki.jpg',NULL,'2018-03-31 16:16:30','2018-03-31 16:16:30',NULL),
(32,'Ryan Tri Juniarto','','','/assets/users/avatar/1/song_jong_ki.jpg',NULL,'/assets/users/avatar/1/song_jong_ki.jpg',NULL,'2018-03-31 16:28:38','2018-03-31 16:28:38',NULL),
(33,'Junianatha','','','/assets/users/avatar/1/song_jong_ki.jpg',NULL,'/assets/users/avatar/1/song_jong_ki.jpg',NULL,'2018-04-27 20:09:35','2018-04-27 20:09:35',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
