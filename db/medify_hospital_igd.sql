/*
SQLyog Community v12.3.3 (64 bit)
MySQL - 5.7.22-0ubuntu0.16.04.1 : Database - medify_hospital_igd
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`medify_hospital_igd` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `medify_hospital_igd`;

/*Table structure for table `ruangan` */

DROP TABLE IF EXISTS `ruangan`;

CREATE TABLE `ruangan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) DEFAULT NULL,
  `kapasitas` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `ruangan` */

insert  into `ruangan`(`id`,`name`,`kapasitas`,`level`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'P1',6,1,'2018-02-26 03:17:37','2018-02-26 06:53:27',NULL),
(2,'P2',20,2,'2018-02-26 10:17:54','2018-02-26 03:17:56',NULL),
(3,'P3',30,3,'2018-02-26 10:18:15','2018-02-26 10:18:16',NULL),
(4,'P4',15,1,'2018-02-26 12:49:53','2018-02-26 12:49:53',NULL),
(5,'P561',1011,551,'2018-04-26 10:29:48','2018-04-26 10:36:57','2018-04-26 10:36:57');

/*Table structure for table `transaksi` */

DROP TABLE IF EXISTS `transaksi`;

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pasien_id` int(11) DEFAULT NULL,
  `ruangan_id` int(11) DEFAULT NULL,
  `waktu_masuk` datetime DEFAULT NULL,
  `waktu_keluar` datetime DEFAULT NULL,
  `kasus_id` int(11) DEFAULT NULL,
  `transaksi_masuk_detail_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `transaksi` */

insert  into `transaksi`(`id`,`pasien_id`,`ruangan_id`,`waktu_masuk`,`waktu_keluar`,`kasus_id`,`transaksi_masuk_detail_id`,`created_at`,`updated_at`,`deleted_at`) values 
(1,2137,1,'2018-03-07 22:41:09',NULL,564,1,'2018-03-07 22:41:09','2018-03-09 15:53:47','2018-03-09 15:53:47'),
(3,2130,1,'2018-03-08 06:49:21',NULL,565,8,'2018-03-08 06:49:21','2018-03-08 06:50:59','2018-03-08 06:50:59'),
(4,2135,1,'2018-03-08 09:30:23',NULL,566,23,'2018-03-08 09:30:23','2018-03-08 02:33:59','2018-03-08 09:32:06'),
(5,2135,1,'2018-03-08 09:32:25',NULL,566,24,'2018-03-08 09:32:25','2018-03-08 02:35:05','2018-03-08 09:33:12'),
(6,2135,1,'2018-03-08 09:32:56',NULL,566,25,'2018-03-08 09:32:56','2018-03-08 02:35:06','2018-03-08 09:33:14'),
(7,2135,1,'2018-03-08 09:33:22',NULL,566,26,'2018-03-08 09:33:22','2018-03-08 02:35:54','2018-03-08 09:34:01'),
(8,2135,1,'2018-03-08 09:33:49',NULL,566,27,'2018-03-08 09:33:49','2018-03-08 02:35:55','2018-03-08 09:34:03'),
(9,2135,1,'2018-03-08 09:34:15',NULL,566,28,'2018-03-08 09:34:15','2018-03-08 02:41:43','2018-03-08 09:39:50'),
(10,2135,1,'2018-03-08 09:39:22',NULL,566,29,'2018-03-08 09:39:22','2018-03-08 09:40:09','2018-03-08 09:40:09'),
(11,2135,2,'2018-03-08 09:40:06',NULL,566,30,'2018-03-08 09:40:06','2018-05-09 11:21:12','2018-05-09 11:21:12'),
(12,2169,1,'2018-04-26 08:27:51',NULL,569,37,'2018-04-26 08:27:51','2018-04-26 08:27:52',NULL),
(13,2150,1,'2018-04-26 08:45:12',NULL,570,38,'2018-04-26 08:45:12','2018-04-26 08:45:13',NULL),
(14,2151,2,'2018-04-26 09:00:17',NULL,571,39,'2018-04-26 09:00:17','2018-04-26 09:00:18',NULL),
(15,2129,2,'2018-05-18 11:09:09',NULL,1,57,'2018-05-18 11:09:09','2018-05-18 11:12:22','2018-05-18 11:12:22'),
(16,2129,2,'2018-05-18 11:12:44',NULL,1,59,'2018-05-18 11:12:44','2018-05-18 11:12:44',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
