/*
SQLyog Community v12.3.3 (64 bit)
MySQL - 10.1.22-MariaDB : Database - medify
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`medify` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `medify`;

/*Table structure for table `profession` */

DROP TABLE IF EXISTS `profession`;

CREATE TABLE `profession` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `title` varchar(32) DEFAULT NULL,
  `slug` varchar(32) DEFAULT NULL,
  `create_kasus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `profession` */

insert  into `profession`(`id`,`title`,`slug`,`create_kasus`) values 
(1,'Dokter','dokter',1),
(2,'Perawat','perawat',1),
(3,'Farmasi','farmasi',1),
(4,'Psikolog','psikolog',1),
(5,'Dokter Gigi','doktergigi',1),
(6,'Penyedia Layanan Kesehatan Lain','kesehatanlain',1),
(7,'Mahasiswa','mahasiswa',1),
(8,'Laboratory Technician','laborat',0),
(9,'MRI Technologist','mri',0),
(10,'Nuclear Medicine Technologist','nuclear',0),
(11,'Childcare Professional','childcare',0),
(12,'Paramedic/EMT','paramedic',0),
(13,'Physical Therapist','physicaltherapist',0),
(14,'Podiatrist','podiatrist',0),
(15,'Radiation Therapist','radiationtherapist',0),
(16,'Radiology Technologist','radiology',0),
(17,'Rehab Specialist','rehabspecialist',0),
(18,'Social Worker','socialworker',0),
(19,'Nutritionist','nutritionist',0),
(20,'Front Office','frontoffice',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
