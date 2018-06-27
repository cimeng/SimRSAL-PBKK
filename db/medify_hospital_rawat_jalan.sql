/*
SQLyog Community v12.3.3 (64 bit)
MySQL - 5.7.22-0ubuntu0.16.04.1 : Database - medify_hospital_rawat_jalan
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`medify_hospital_rawat_jalan` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `medify_hospital_rawat_jalan`;

/*Table structure for table `dokter` */

DROP TABLE IF EXISTS `dokter`;

CREATE TABLE `dokter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `poliklinik_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `dokter` */

/*Table structure for table `dokter_jadwal` */

DROP TABLE IF EXISTS `dokter_jadwal`;

CREATE TABLE `dokter_jadwal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT 'id milik dokter',
  `hari` varchar(24) DEFAULT NULL,
  `jam_buka` time DEFAULT NULL,
  `jam_tutup` time DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `dokter_jadwal` */

/*Table structure for table `layanan` */

DROP TABLE IF EXISTS `layanan`;

CREATE TABLE `layanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `poliklinik_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `layanan` */

/*Table structure for table `poliklinik` */

DROP TABLE IF EXISTS `poliklinik`;

CREATE TABLE `poliklinik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) DEFAULT NULL,
  `image_thumb` varchar(256) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `poliklinik` */

insert  into `poliklinik`(`id`,`name`,`image_thumb`,`created_at`,`updated_at`,`created_by`,`deleted_at`) values 
(1,'Poli Gigi','uploads/rawatjalan/poliklinik/MedifyPoliklinikLogo-25042018210321-kKLeWr49kf.png','2018-02-19 04:00:07','2018-04-25 21:03:21',NULL,NULL),
(2,'Poli Umum','assets\\img\\poli\\009-stethoscope-1.png','2018-02-19 04:00:15','2018-02-19 04:00:15',NULL,NULL),
(3,'Poli Jantung','assets\\img\\poli\\006-medical-1.png','2018-02-20 03:55:39','2018-02-20 03:55:39',NULL,NULL),
(4,'Poli THT','assets\\img\\poli\\005-ear-lobe-side-view-outline.png','2018-02-23 01:37:39','2018-02-23 01:37:39',NULL,NULL),
(5,'Poli Kandungan','assets/img/poli/Poli Kandungan-smiling-baby.png','2018-02-23 02:17:15','2018-02-23 02:17:15',NULL,NULL),
(6,'Poli Anak','assets/img/poli/Poli Anak-008-stethoscope.png','2018-02-23 02:19:49','2018-02-23 02:19:49',NULL,NULL),
(7,'Poli Si','assets/app/poli/Poli Si-001-brain.png','2018-02-23 17:49:19','2018-02-23 17:49:19',NULL,NULL),
(8,'Poli Gizi','uploads/rawatjalan/poliklinik/MedifyPoliklinikLogo-25042018211059-Gvm8KVBFlA.png','2018-04-25 21:10:59','2018-04-25 21:21:56',NULL,'2018-04-25 21:21:56'),
(9,'First Aid Kit','uploads/rawatjalan/poliklinik/MedifyPoliklinikLogo-25042018211321-V7v1HefNz2.png','2018-04-25 21:11:56','2018-04-25 21:21:46',NULL,'2018-04-25 21:21:46'),
(10,'Contoh nama','uploads/rawatjalan/poliklinik/MedifyPoliklinikLogo-15052018155208-7uc8BLTPig.png','2018-05-15 15:52:11','2018-05-15 15:52:11',NULL,NULL);

/*Table structure for table `transaksi` */

DROP TABLE IF EXISTS `transaksi`;

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `poliklinik_id` int(11) DEFAULT NULL,
  `pasien_id` int(11) DEFAULT NULL,
  `nomor_antrian` int(11) DEFAULT NULL,
  `kasus_id` int(11) DEFAULT NULL,
  `transaksi_masuk_detail_id` int(11) DEFAULT NULL,
  `status` int(2) DEFAULT NULL COMMENT '0 = waiting, 1 = done, -1 = canceled',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

/*Data for the table `transaksi` */

insert  into `transaksi`(`id`,`poliklinik_id`,`pasien_id`,`nomor_antrian`,`kasus_id`,`transaksi_masuk_detail_id`,`status`,`created_at`,`created_by`,`updated_at`,`deleted_at`) values 
(2,1,2126,1,522,5,1,'2018-02-20 23:52:30',NULL,'2018-02-20 23:54:38',NULL),
(3,1,2129,1,525,12,1,'2018-02-22 23:26:58',NULL,'2018-02-22 16:31:32',NULL),
(4,2,2126,1,NULL,13,0,'2018-02-22 23:31:39',NULL,'2018-02-22 23:31:39',NULL),
(5,3,2129,1,526,14,1,'2018-02-23 14:56:52',NULL,'2018-02-23 15:01:53',NULL),
(6,3,2114,2,NULL,15,0,'2018-02-23 15:01:46',NULL,'2018-02-23 15:01:46',NULL),
(7,5,2113,1,NULL,16,0,'2018-02-23 15:03:17',NULL,'2018-02-23 15:03:17',NULL),
(8,4,2126,1,527,17,1,'2018-02-23 16:41:34',NULL,'2018-02-23 16:42:18',NULL),
(9,1,2095,1,533,21,1,'2018-02-23 19:38:34',NULL,'2018-02-23 19:39:54',NULL),
(10,2,2130,1,535,26,1,'2018-02-24 14:34:48',NULL,'2018-02-24 14:35:21',NULL),
(11,1,2136,1,549,96,1,'2018-03-01 09:17:57',NULL,'2018-03-01 09:18:04',NULL),
(12,1,2135,1,566,10,1,'2018-03-08 07:00:52',NULL,'2018-03-08 07:02:12',NULL),
(13,3,2135,1,566,17,0,'2018-03-08 09:13:29',NULL,'2018-03-08 09:13:29',NULL),
(14,5,2135,1,566,18,0,'2018-03-08 09:15:37',NULL,'2018-03-08 09:15:37',NULL),
(15,4,2135,1,566,19,0,'2018-03-08 09:18:10',NULL,'2018-03-08 09:18:10',NULL),
(16,6,2135,1,566,22,0,'2018-03-08 09:21:56',NULL,'2018-03-08 09:21:56',NULL),
(17,1,2129,1,1,32,0,'2018-03-09 15:54:19',NULL,'2018-03-09 15:54:19',NULL),
(18,2,2169,1,567,33,1,'2018-04-25 19:36:49',NULL,'2018-04-25 20:07:07',NULL),
(19,2,2150,2,568,34,1,'2018-04-25 20:03:17',NULL,'2018-04-25 22:57:29',NULL),
(20,1,2136,1,NULL,35,0,'2018-04-25 21:24:23',NULL,'2018-04-25 21:24:23',NULL),
(21,1,2168,2,NULL,36,0,'2018-04-25 21:26:16',NULL,'2018-04-25 21:26:16',NULL),
(22,1,2169,1,NULL,47,0,'2018-04-29 08:05:23',NULL,'2018-04-29 08:05:23',NULL),
(23,1,2169,1,584,49,1,'2018-05-15 15:46:32',NULL,'2018-05-15 15:46:53',NULL),
(24,2,2177,1,585,51,1,'2018-05-17 16:00:11',NULL,'2018-05-17 16:01:19',NULL),
(25,2,2169,2,NULL,52,0,'2018-05-17 16:01:08',NULL,'2018-05-17 16:01:08',NULL),
(26,1,2129,1,1,55,0,'2018-05-18 11:06:01',NULL,'2018-05-18 11:06:01',NULL),
(27,1,2129,2,1,56,0,'2018-05-18 11:06:18',NULL,'2018-05-18 11:06:18',NULL),
(28,2,2129,1,1,58,0,'2018-05-18 11:12:12',NULL,'2018-05-18 11:12:12',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
