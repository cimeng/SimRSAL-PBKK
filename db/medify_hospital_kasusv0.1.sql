/*
SQLyog Community v12.3.3 (64 bit)
MySQL - 5.7.21-0ubuntu0.16.04.1 : Database - medify_dev
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`medify_dev` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `medify_dev`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Table structure for table `diskusi_message` */

DROP TABLE IF EXISTS `diskusi_message`;

CREATE TABLE `diskusi_message` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `id_kasus` int(12) DEFAULT NULL,
  `content` text,
  `channel` varchar(32) DEFAULT NULL,
  `created_by` int(12) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `team_member` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1413 DEFAULT CHARSET=latin1;

/*Table structure for table `diskusi_message_read` */

DROP TABLE IF EXISTS `diskusi_message_read`;

CREATE TABLE `diskusi_message_read` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `message_id` int(12) DEFAULT NULL,
  `users_id` int(12) DEFAULT NULL,
  `read_status` int(2) DEFAULT '0',
  `read_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `get` tinyint(1) DEFAULT '0',
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3952 DEFAULT CHARSET=latin1;

/*Table structure for table `icd_10` */

DROP TABLE IF EXISTS `icd_10`;

CREATE TABLE `icd_10` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `code_icd` varchar(8) DEFAULT NULL,
  `long_desc` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `all_fulltext` (`code_icd`,`long_desc`)
) ENGINE=MyISAM AUTO_INCREMENT=10344 DEFAULT CHARSET=latin1;

/*Table structure for table `icd_9` */

DROP TABLE IF EXISTS `icd_9`;

CREATE TABLE `icd_9` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `code_icd` varchar(16) DEFAULT NULL,
  `long_desc` varchar(1024) DEFAULT NULL,
  `short_desc` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `fulltext` (`code_icd`,`long_desc`,`short_desc`)
) ENGINE=MyISAM AUTO_INCREMENT=3883 DEFAULT CHARSET=latin1;

/*Table structure for table `kasus` */

DROP TABLE IF EXISTS `kasus`;

CREATE TABLE `kasus` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `judul_kasus` varchar(128) DEFAULT NULL,
  `nomor_kasus` varchar(48) DEFAULT NULL,
  `rumah_sakit` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(12) DEFAULT NULL,
  `team_member` int(11) DEFAULT NULL,
  `end_at` timestamp NULL DEFAULT NULL,
  `end_by` int(12) DEFAULT NULL,
  `slug` varchar(48) DEFAULT NULL,
  `ref` int(12) DEFAULT NULL,
  `end` tinyint(2) DEFAULT '0',
  `business_transaction_id` int(11) DEFAULT NULL,
  `pasien_id` int(11) DEFAULT NULL,
  `hospital` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nomor_kasus` (`nomor_kasus`),
  FULLTEXT KEY `fulltext` (`judul_kasus`)
) ENGINE=MyISAM AUTO_INCREMENT=550 DEFAULT CHARSET=latin1;

/*Table structure for table `kasus_alat_apgar` */

DROP TABLE IF EXISTS `kasus_alat_apgar`;

CREATE TABLE `kasus_alat_apgar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kasus_id` int(11) DEFAULT NULL,
  `appearance` varchar(2) DEFAULT NULL,
  `pulse` varchar(2) DEFAULT NULL,
  `grimace` varchar(2) DEFAULT NULL,
  `activity` varchar(2) DEFAULT NULL,
  `respiration` varchar(2) DEFAULT NULL,
  `score` varchar(2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) DEFAULT NULL,
  `team_member` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Table structure for table `kasus_alat_mews` */

DROP TABLE IF EXISTS `kasus_alat_mews`;

CREATE TABLE `kasus_alat_mews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kasus_id` int(11) DEFAULT NULL,
  `resp` int(2) DEFAULT '0',
  `o2` int(2) DEFAULT '0',
  `suplo2` int(2) DEFAULT '0',
  `sys` int(2) DEFAULT '0',
  `pulse` int(2) DEFAULT '0',
  `avpu` int(2) DEFAULT '0',
  `temp` int(2) DEFAULT '0',
  `score` int(2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) DEFAULT NULL,
  `team_member` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

/*Table structure for table `kasus_alat_poedji` */

DROP TABLE IF EXISTS `kasus_alat_poedji`;

CREATE TABLE `kasus_alat_poedji` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kasus_id` int(11) DEFAULT NULL,
  `triwulan` int(1) DEFAULT NULL,
  `result` varchar(1024) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `team_member` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Table structure for table `kasus_collaborator` */

DROP TABLE IF EXISTS `kasus_collaborator`;

CREATE TABLE `kasus_collaborator` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `users_id` int(12) DEFAULT NULL,
  `kasus_id` int(12) DEFAULT NULL,
  `role` int(3) DEFAULT NULL,
  `admin` int(3) DEFAULT NULL,
  `accept` tinyint(1) DEFAULT '0',
  `added_by` int(12) DEFAULT NULL,
  `message` varchar(512) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `team_member` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1609 DEFAULT CHARSET=latin1;

/*Table structure for table `kasus_collaborator_type` */

DROP TABLE IF EXISTS `kasus_collaborator_type`;

CREATE TABLE `kasus_collaborator_type` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `type` int(3) NOT NULL,
  `type_temp` int(3) DEFAULT NULL,
  `shows` tinyint(1) DEFAULT NULL,
  `title` varchar(64) NOT NULL,
  `short_title` varchar(64) DEFAULT NULL,
  `tagihan` int(2) DEFAULT NULL,
  `alat_bantu` int(2) DEFAULT NULL,
  `kasus` int(2) DEFAULT NULL COMMENT '1=edit,read',
  `identitas` int(2) DEFAULT NULL COMMENT '2=read',
  `soap` int(2) DEFAULT NULL COMMENT '0=notshowed',
  `penunjang` int(2) DEFAULT NULL COMMENT '3=edit once',
  `tindakan` int(2) DEFAULT NULL,
  `lokasi` int(2) DEFAULT NULL,
  `collaborator` int(2) DEFAULT NULL,
  `diskusi` int(2) DEFAULT NULL,
  `diagnosis` int(2) DEFAULT NULL,
  `operasi` int(2) DEFAULT NULL,
  `resep` int(2) DEFAULT NULL,
  `note` varchar(64) DEFAULT NULL,
  `penunjang_laborat` int(2) DEFAULT NULL,
  `penunjang_elektrogram` int(2) DEFAULT NULL,
  `penunjang_radiologi` int(2) DEFAULT NULL,
  `penunjang_klinis` int(2) DEFAULT NULL,
  `penunjang_umum` int(2) DEFAULT NULL,
  `penunjang_link` int(2) DEFAULT NULL,
  `diskusi_dokter` int(2) DEFAULT NULL,
  `diskusi_laborat` int(2) DEFAULT NULL,
  `diskusi_perawat` int(2) DEFAULT NULL,
  `diskusi_farmasi` int(2) DEFAULT NULL,
  `print` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Table structure for table `kasus_diagnosis` */

DROP TABLE IF EXISTS `kasus_diagnosis`;

CREATE TABLE `kasus_diagnosis` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `kasus_id` int(12) DEFAULT NULL,
  `icd_10` int(8) NOT NULL,
  `utama` tinyint(1) DEFAULT '0',
  `created_by` int(12) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `team_member` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`,`icd_10`)
) ENGINE=InnoDB AUTO_INCREMENT=380 DEFAULT CHARSET=latin1;

/*Table structure for table `kasus_identitas` */

DROP TABLE IF EXISTS `kasus_identitas`;

CREATE TABLE `kasus_identitas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pasien_id` int(11) DEFAULT NULL,
  `kasus_id` int(11) DEFAULT NULL,
  `nama` varchar(256) DEFAULT NULL,
  `no_rekam_medis` varchar(12) DEFAULT NULL,
  `tempat_lahir` varchar(64) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(2) DEFAULT NULL,
  `alamat` varchar(256) DEFAULT NULL,
  `pekerjaan` varchar(256) DEFAULT NULL,
  `no_hp` varchar(32) DEFAULT NULL,
  `asuransi` varchar(64) DEFAULT NULL,
  `no_asuransi` varchar(64) DEFAULT NULL,
  `tinggi_badan` varchar(4) DEFAULT NULL,
  `berat_badan` varchar(6) DEFAULT NULL,
  `avatar` varchar(512) DEFAULT 'default.png',
  `avatar_thumb` varchar(512) DEFAULT 'default.png',
  `avatar_small` varchar(512) DEFAULT 'default.png',
  `rumah_sakit` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `team_member` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `Identitas_FullText` (`nama`,`no_rekam_medis`,`alamat`)
) ENGINE=MyISAM AUTO_INCREMENT=500 DEFAULT CHARSET=latin1;

/*Table structure for table `kasus_log` */

DROP TABLE IF EXISTS `kasus_log`;

CREATE TABLE `kasus_log` (
  `id` int(24) NOT NULL AUTO_INCREMENT,
  `kasus_id` int(12) DEFAULT NULL,
  `log_content` varchar(64) DEFAULT NULL,
  `log_tab` varchar(140) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(12) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `team_member` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3539 DEFAULT CHARSET=latin1;

/*Table structure for table `kasus_log_count` */

DROP TABLE IF EXISTS `kasus_log_count`;

CREATE TABLE `kasus_log_count` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kasus_id` int(11) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `count_identitas` int(3) DEFAULT NULL,
  `count_soap` int(3) DEFAULT NULL,
  `count_penunjang` int(3) DEFAULT NULL,
  `count_tindakan` int(3) DEFAULT NULL,
  `count_diagnosis` int(3) DEFAULT NULL,
  `count_resep` int(3) DEFAULT NULL,
  `count_operasi` int(3) DEFAULT NULL,
  `count_lokasi` int(3) DEFAULT NULL,
  `count_alat_bantu_apgar` int(3) DEFAULT NULL,
  `count_alat_bantu_mews` int(3) DEFAULT NULL,
  `count_alat_bantu_poedji` int(3) DEFAULT NULL,
  `count_diskusi_umum` int(3) DEFAULT NULL,
  `count_disksui_dokter` int(3) DEFAULT NULL,
  `count_diskusi_perawat` int(3) DEFAULT NULL,
  `count_diskusi_laborat` int(3) DEFAULT NULL,
  `count_diskusi_farmasi` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1129 DEFAULT CHARSET=latin1;

/*Table structure for table `kasus_log_read` */

DROP TABLE IF EXISTS `kasus_log_read`;

CREATE TABLE `kasus_log_read` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kasus_log` int(11) DEFAULT NULL,
  `read` tinyint(2) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `team_member` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7420 DEFAULT CHARSET=latin1;

/*Table structure for table `kasus_lokasi` */

DROP TABLE IF EXISTS `kasus_lokasi`;

CREATE TABLE `kasus_lokasi` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `kasus_id` int(12) DEFAULT NULL,
  `lokasi` varchar(512) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(12) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `alasan` text,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `team_member` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=774 DEFAULT CHARSET=latin1;

/*Table structure for table `kasus_operasi` */

DROP TABLE IF EXISTS `kasus_operasi`;

CREATE TABLE `kasus_operasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kasus_id` int(11) DEFAULT NULL,
  `content` varchar(512) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `team_member` int(11) DEFAULT NULL,
  `judul` varchar(72) DEFAULT NULL,
  `operator` varchar(256) DEFAULT NULL,
  `asisten_1` varchar(256) DEFAULT NULL,
  `asisten_2` varchar(256) DEFAULT NULL,
  `perawat` varchar(256) DEFAULT NULL,
  `diagnosa_awal` varchar(256) DEFAULT NULL,
  `diagnosa_akhir` varchar(256) DEFAULT NULL,
  `persiapan` varchar(256) DEFAULT NULL,
  `posisi` varchar(256) DEFAULT NULL,
  `desinfektan` varchar(256) DEFAULT NULL,
  `incisi` varchar(256) DEFAULT NULL,
  `temuan` varchar(256) DEFAULT NULL,
  `tindakan` varchar(256) DEFAULT NULL,
  `perdarahan` varchar(72) DEFAULT NULL,
  `advice` varchar(256) DEFAULT NULL,
  `tanggal_operasi` timestamp NULL DEFAULT NULL,
  `waktu_mulai` timestamp NULL DEFAULT NULL,
  `waktu_selesai` timestamp NULL DEFAULT NULL,
  `lama_anastesi` varchar(72) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=522 DEFAULT CHARSET=latin1;

/*Table structure for table `kasus_penunjang` */

DROP TABLE IF EXISTS `kasus_penunjang`;

CREATE TABLE `kasus_penunjang` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `kasus_id` int(12) DEFAULT NULL,
  `file` varchar(1024) DEFAULT NULL,
  `file_primary` varchar(1024) DEFAULT NULL,
  `file_thumb` varchar(1024) DEFAULT NULL,
  `type` varchar(32) DEFAULT NULL,
  `file_type` tinyint(1) DEFAULT NULL,
  `link_flag` tinyint(1) DEFAULT '0',
  `judul` varchar(64) DEFAULT NULL,
  `created_by` int(12) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `team_member` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2135 DEFAULT CHARSET=latin1;

/*Table structure for table `kasus_resep` */

DROP TABLE IF EXISTS `kasus_resep`;

CREATE TABLE `kasus_resep` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kasus_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `team_member` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

/*Table structure for table `kasus_resep_detail` */

DROP TABLE IF EXISTS `kasus_resep_detail`;

CREATE TABLE `kasus_resep_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kasus_resep_id` int(11) DEFAULT NULL,
  `obat_id` int(11) DEFAULT NULL,
  `obat_name` varchar(256) DEFAULT NULL,
  `type` varchar(8) DEFAULT NULL,
  `nomor` varchar(5) DEFAULT NULL,
  `aturan` varchar(256) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=latin1;

/*Table structure for table `kasus_soap` */

DROP TABLE IF EXISTS `kasus_soap`;

CREATE TABLE `kasus_soap` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `kasus_id` int(12) DEFAULT NULL,
  `subjective` text,
  `objective` text,
  `assessment` text,
  `plan` text,
  `ppa` text,
  `created_by` int(12) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `team_member` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=720 DEFAULT CHARSET=latin1;

/*Table structure for table `kasus_tagihan` */

DROP TABLE IF EXISTS `kasus_tagihan`;

CREATE TABLE `kasus_tagihan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kasus_id` int(11) DEFAULT NULL,
  `total_bill` int(11) DEFAULT NULL,
  `total_paid` int(11) DEFAULT NULL,
  `is_paid` int(2) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `team_member` int(11) DEFAULT NULL,
  `checkout` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

/*Table structure for table `kasus_tagihan_detail` */

DROP TABLE IF EXISTS `kasus_tagihan_detail`;

CREATE TABLE `kasus_tagihan_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kasus_tagihan_id` int(11) DEFAULT NULL,
  `desc` varchar(512) DEFAULT NULL,
  `lokasi` varchar(512) DEFAULT NULL,
  `nominal` int(11) DEFAULT NULL,
  `type` varchar(2) DEFAULT NULL,
  `pricelist_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `unit_price` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `team_member` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=latin1;

/*Table structure for table `kasus_tindakan` */

DROP TABLE IF EXISTS `kasus_tindakan`;

CREATE TABLE `kasus_tindakan` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `kasus_id` int(12) DEFAULT NULL,
  `icd_9` varchar(8) DEFAULT NULL,
  `created_by` int(12) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `team_member` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=218 DEFAULT CHARSET=latin1;

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `notifikasi` */

DROP TABLE IF EXISTS `notifikasi`;

CREATE TABLE `notifikasi` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `content` varchar(512) DEFAULT NULL,
  `created_by` int(12) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `link` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=179 DEFAULT CHARSET=latin1;

/*Table structure for table `notifikasi_tujuan` */

DROP TABLE IF EXISTS `notifikasi_tujuan`;

CREATE TABLE `notifikasi_tujuan` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `user_id` int(12) DEFAULT NULL,
  `read_status` int(2) DEFAULT '0',
  `notifikasi_id` int(12) DEFAULT NULL,
  `hash_id` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=265 DEFAULT CHARSET=latin1;

/*Table structure for table `oauth_access_tokens` */

DROP TABLE IF EXISTS `oauth_access_tokens`;

CREATE TABLE `oauth_access_tokens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) DEFAULT NULL,
  `access_token` varchar(1024) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `expired_at` timestamp NULL DEFAULT NULL,
  `revoked` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11621 DEFAULT CHARSET=latin1;

/*Table structure for table `oauth_clients` */

DROP TABLE IF EXISTS `oauth_clients`;

CREATE TABLE `oauth_clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `client_secret` varchar(256) DEFAULT NULL,
  `client_name` varchar(256) DEFAULT NULL,
  `revoked` int(1) DEFAULT '0',
  `isWebBrowser` int(1) DEFAULT '0',
  `isAndroid` int(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Table structure for table `oauth_refresh_tokens` */

DROP TABLE IF EXISTS `oauth_refresh_tokens`;

CREATE TABLE `oauth_refresh_tokens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) DEFAULT NULL,
  `refresh_token` varchar(1024) DEFAULT NULL,
  `revoked` int(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `expired_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

/*Table structure for table `obat` */

DROP TABLE IF EXISTS `obat`;

CREATE TABLE `obat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(256) DEFAULT NULL,
  `type` int(2) DEFAULT NULL,
  `manufaktur` int(11) DEFAULT NULL,
  `tags` varchar(256) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=356 DEFAULT CHARSET=latin1;

/*Table structure for table `obat_manufaktur` */

DROP TABLE IF EXISTS `obat_manufaktur`;

CREATE TABLE `obat_manufaktur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(256) DEFAULT NULL,
  `alamat` varchar(256) DEFAULT NULL,
  `no_hp` varchar(22) DEFAULT NULL,
  `nama_agen` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `pasien` */

DROP TABLE IF EXISTS `pasien`;

CREATE TABLE `pasien` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(256) DEFAULT NULL,
  `no_rekam_medis` varchar(12) DEFAULT NULL,
  `tempat_lahir` varchar(64) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(2) DEFAULT NULL,
  `alamat` varchar(256) DEFAULT NULL,
  `pekerjaan` varchar(256) DEFAULT NULL,
  `rumah_sakit` int(12) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `last_update` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `avatar` varchar(512) DEFAULT NULL,
  `avatar_thumb` varchar(512) DEFAULT NULL,
  `avatar_small` varchar(512) DEFAULT NULL,
  `slug` varchar(64) DEFAULT NULL,
  `created_by` int(12) DEFAULT NULL,
  `last_update_by` int(12) DEFAULT NULL,
  `no_hp` varchar(32) DEFAULT NULL,
  `asuransi` varchar(64) DEFAULT NULL,
  `no_asuransi` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `no_rekam_medis+rs` (`no_rekam_medis`,`rumah_sakit`),
  UNIQUE KEY `slug` (`slug`),
  FULLTEXT KEY `fulltext` (`nama`,`no_rekam_medis`,`alamat`),
  FULLTEXT KEY `nama_fulltext` (`nama`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `profession` */

DROP TABLE IF EXISTS `profession`;

CREATE TABLE `profession` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `title` varchar(32) DEFAULT NULL,
  `slug` varchar(32) DEFAULT NULL,
  `create_kasus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Table structure for table `profession_specialty` */

DROP TABLE IF EXISTS `profession_specialty`;

CREATE TABLE `profession_specialty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `profession` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=186 DEFAULT CHARSET=latin1;

/*Table structure for table `reg_kota` */

DROP TABLE IF EXISTS `reg_kota`;

CREATE TABLE `reg_kota` (
  `id` char(4) COLLATE utf8_unicode_ci NOT NULL,
  `province_id` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `reg_provinsi` */

DROP TABLE IF EXISTS `reg_provinsi`;

CREATE TABLE `reg_provinsi` (
  `id` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `rekan` */

DROP TABLE IF EXISTS `rekan`;

CREATE TABLE `rekan` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `user_1` int(12) DEFAULT NULL COMMENT 'yang ngefollow',
  `user_2` int(12) DEFAULT NULL COMMENT 'yang di follow',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_friend` (`user_1`,`user_2`)
) ENGINE=InnoDB AUTO_INCREMENT=523 DEFAULT CHARSET=latin1;

/*Table structure for table `rumah_sakit` */

DROP TABLE IF EXISTS `rumah_sakit`;

CREATE TABLE `rumah_sakit` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `nama` varchar(256) DEFAULT NULL,
  `jenis` varchar(16) DEFAULT NULL,
  `kelas` char(2) DEFAULT NULL,
  `direktur` varchar(256) DEFAULT NULL,
  `alamat` varchar(256) DEFAULT NULL,
  `penyelenggara` varbinary(64) DEFAULT NULL,
  `kota` varchar(128) DEFAULT NULL,
  `kodepos` varchar(6) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `fax` varchar(15) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `admin_rs` int(2) DEFAULT NULL COMMENT 'admin rumahsakit sana',
  `kode` varchar(512) DEFAULT NULL COMMENT 'kode rumah sakit, gak pake ID ex: 25604',
  `added_by` int(2) DEFAULT NULL,
  `business_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kodeunique` (`kode`)
) ENGINE=InnoDB AUTO_INCREMENT=187 DEFAULT CHARSET=latin1;

/*Table structure for table `user_activity_log` */

DROP TABLE IF EXISTS `user_activity_log`;

CREATE TABLE `user_activity_log` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `user_id` int(12) DEFAULT NULL,
  `route` varchar(256) DEFAULT NULL,
  `method` varchar(32) DEFAULT NULL,
  `agent` varchar(32) DEFAULT NULL,
  `device` varchar(32) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37026 DEFAULT CHARSET=latin1;

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `profesi` int(11) DEFAULT NULL,
  `profesi_specialty` int(11) DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(512) COLLATE utf8_unicode_ci DEFAULT 'default.png',
  `avatar_thumb` varchar(512) COLLATE utf8_unicode_ci DEFAULT 'default.png',
  `usercode` varchar(24) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'id untuk di tampilkan ke user',
  `terms_check` tinyint(2) DEFAULT '1' COMMENT 'udah check term blm?',
  `active` tinyint(2) DEFAULT '0' COMMENT '??',
  `login_count` int(5) DEFAULT '0' COMMENT 'jumlah login',
  `device` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'token device dia',
  `tutorial_home` int(2) DEFAULT '0' COMMENT 'apakah udah tutorial',
  `tutorial_kasus` int(2) DEFAULT '0' COMMENT 'apakah udah tutorial',
  `legal_number` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'nomer sip',
  `current_login` int(12) DEFAULT NULL COMMENT 'jadi kan bisa login banyak, ini menandakan saat ini dia sedang login sebagai apa',
  `team` tinyint(1) DEFAULT NULL COMMENT 'apakah dia tim',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  FULLTEXT KEY `name_fulltext` (`name`),
  FULLTEXT KEY `all_fulltext` (`name`,`email`,`phone`)
) ENGINE=MyISAM AUTO_INCREMENT=350 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `users_rs` */

DROP TABLE IF EXISTS `users_rs`;

CREATE TABLE `users_rs` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `users_id` int(12) DEFAULT NULL,
  `rumah_sakit_id` int(12) DEFAULT NULL,
  `sip` varchar(64) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=404 DEFAULT CHARSET=latin1;

/*Table structure for table `users_team` */

DROP TABLE IF EXISTS `users_team`;

CREATE TABLE `users_team` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `user_id` int(12) DEFAULT NULL,
  `team_id` int(12) DEFAULT NULL,
  `role` int(2) DEFAULT NULL COMMENT '1 = admin, 2 = user biasa',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Table structure for table `youtube_access_tokens` */

DROP TABLE IF EXISTS `youtube_access_tokens`;

CREATE TABLE `youtube_access_tokens` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `access_token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Table structure for table `mutasi_pasien` */

DROP TABLE IF EXISTS `mutasi_pasien`;

/*!50001 DROP VIEW IF EXISTS `mutasi_pasien` */;
/*!50001 DROP TABLE IF EXISTS `mutasi_pasien` */;

/*!50001 CREATE TABLE  `mutasi_pasien`(
 `user_id` int(10) unsigned ,
 `name` varchar(255) ,
 `kasus_id` int(12) ,
 `judul_kasus` varchar(128) ,
 `created_at` timestamp ,
 `end_at` timestamp ,
 `rumah_sakit` varchar(256) ,
 `nama_pasien` varchar(256) 
)*/;

/*Table structure for table `unread_kasus_log` */

DROP TABLE IF EXISTS `unread_kasus_log`;

/*!50001 DROP VIEW IF EXISTS `unread_kasus_log` */;
/*!50001 DROP TABLE IF EXISTS `unread_kasus_log` */;

/*!50001 CREATE TABLE  `unread_kasus_log`(
 `kasus_id` int(12) ,
 `log_content` varchar(64) ,
 `log_tab` varchar(140) ,
 `created_at` timestamp ,
 `created_by` int(12) ,
 `users_id` int(11) 
)*/;

/*Table structure for table `unread_message` */

DROP TABLE IF EXISTS `unread_message`;

/*!50001 DROP VIEW IF EXISTS `unread_message` */;
/*!50001 DROP TABLE IF EXISTS `unread_message` */;

/*!50001 CREATE TABLE  `unread_message`(
 `id` int(12) ,
 `id_kasus` int(12) ,
 `content` text ,
 `channel` varchar(32) ,
 `created_by` int(12) ,
 `created_at` timestamp ,
 `read_id` int(12) ,
 `users_id` int(12) ,
 `read_status` int(2) ,
 `get_msg` tinyint(1) ,
 `time_now` datetime ,
 `creator_id` int(10) unsigned ,
 `creator_name` varchar(255) ,
 `avatar_thumb` varchar(512) 
)*/;

/*Table structure for table `view_diagnosis_icd` */

DROP TABLE IF EXISTS `view_diagnosis_icd`;

/*!50001 DROP VIEW IF EXISTS `view_diagnosis_icd` */;
/*!50001 DROP TABLE IF EXISTS `view_diagnosis_icd` */;

/*!50001 CREATE TABLE  `view_diagnosis_icd`(
 `kasus_id` int(12) ,
 `id` int(12) ,
 `code_icd` varchar(8) ,
 `long_desc` varchar(1024) ,
 `deleted_at` timestamp 
)*/;

/*Table structure for table `view_kasus_collaborator` */

DROP TABLE IF EXISTS `view_kasus_collaborator`;

/*!50001 DROP VIEW IF EXISTS `view_kasus_collaborator` */;
/*!50001 DROP TABLE IF EXISTS `view_kasus_collaborator` */;

/*!50001 CREATE TABLE  `view_kasus_collaborator`(
 `user_id` int(10) unsigned ,
 `name` varchar(255) ,
 `usercode` varchar(24) ,
 `profesi` int(11) ,
 `avatar_thumb` varchar(512) ,
 `device` varchar(256) ,
 `accept` tinyint(1) ,
 `order` int(11) ,
 `admin` int(3) ,
 `id` int(3) ,
 `type` int(3) ,
 `shows` tinyint(1) ,
 `title` varchar(64) ,
 `short_title` varchar(64) ,
 `kasus` int(2) ,
 `identitas` int(2) ,
 `resep` int(2) ,
 `soap` int(2) ,
 `penunjang` int(2) ,
 `tindakan` int(2) ,
 `lokasi` int(2) ,
 `collaborator` int(2) ,
 `diskusi` int(2) ,
 `diagnosis` int(2) ,
 `operasi` int(2) ,
 `note` varchar(64) ,
 `penunjang_laborat` int(2) ,
 `penunjang_elektrogram` int(2) ,
 `penunjang_radiologi` int(2) ,
 `penunjang_klinis` int(2) ,
 `penunjang_umum` int(2) ,
 `penunjang_link` int(2) ,
 `diskusi_dokter` int(2) ,
 `diskusi_laborat` int(2) ,
 `diskusi_perawat` int(2) ,
 `diskusi_farmasi` int(2) ,
 `tagihan` int(2) ,
 `alat_bantu` int(2) ,
 `print` int(2) ,
 `role` int(3) ,
 `kasus_id` int(12) ,
 `nomor_kasus` varchar(48) ,
 `judul_kasus` varchar(128) 
)*/;

/*Table structure for table `view_kasus_identitas` */

DROP TABLE IF EXISTS `view_kasus_identitas`;

/*!50001 DROP VIEW IF EXISTS `view_kasus_identitas` */;
/*!50001 DROP TABLE IF EXISTS `view_kasus_identitas` */;

/*!50001 CREATE TABLE  `view_kasus_identitas`(
 `id` int(11) ,
 `pasien_id` int(11) ,
 `kasus_id` int(11) ,
 `nama` varchar(256) ,
 `no_rekam_medis` varchar(12) ,
 `tempat_lahir` varchar(64) ,
 `tanggal_lahir` date ,
 `jenis_kelamin` varchar(2) ,
 `alamat` varchar(256) ,
 `pekerjaan` varchar(256) ,
 `no_hp` varchar(32) ,
 `asuransi` varchar(64) ,
 `no_asuransi` varchar(64) ,
 `avatar` varchar(512) ,
 `avatar_thumb` varchar(512) ,
 `avatar_small` varchar(512) ,
 `rumah_sakit` int(11) ,
 `created_at` timestamp ,
 `updated_at` timestamp ,
 `updated_by` int(11) ,
 `name` varchar(255) ,
 `rs_kode` varchar(512) ,
 `rs_nama` varchar(256) ,
 `rs_id` int(12) ,
 `business_id` int(11) 
)*/;

/*Table structure for table `view_pasien_rs` */

DROP TABLE IF EXISTS `view_pasien_rs`;

/*!50001 DROP VIEW IF EXISTS `view_pasien_rs` */;
/*!50001 DROP TABLE IF EXISTS `view_pasien_rs` */;

/*!50001 CREATE TABLE  `view_pasien_rs`(
 `id` int(11) ,
 `nama` varchar(256) ,
 `no_rekam_medis` varchar(12) ,
 `tempat_lahir` varchar(64) ,
 `tanggal_lahir` date ,
 `jenis_kelamin` varchar(2) ,
 `alamat` varchar(256) ,
 `pekerjaan` varchar(256) ,
 `rumah_sakit` int(12) ,
 `created_at` timestamp ,
 `last_update` timestamp ,
 `avatar` varchar(512) ,
 `avatar_thumb` varchar(512) ,
 `avatar_small` varchar(512) ,
 `slug` varchar(64) ,
 `created_by` int(12) ,
 `last_update_by` int(12) ,
 `asuransi` varchar(64) ,
 `no_asuransi` varchar(64) ,
 `no_hp` varchar(32) ,
 `nama_user` varchar(255) ,
 `rs_kode` varchar(512) ,
 `rs_nama` varchar(256) ,
 `rs_id` int(12) 
)*/;

/*Table structure for table `view_tindakan_icd` */

DROP TABLE IF EXISTS `view_tindakan_icd`;

/*!50001 DROP VIEW IF EXISTS `view_tindakan_icd` */;
/*!50001 DROP TABLE IF EXISTS `view_tindakan_icd` */;

/*!50001 CREATE TABLE  `view_tindakan_icd`(
 `kasus_id` int(12) ,
 `id` int(12) ,
 `code_icd` varchar(16) ,
 `long_desc` varchar(1024) ,
 `short_desc` varchar(1024) ,
 `deleted_at` timestamp 
)*/;

/*Table structure for table `view_user` */

DROP TABLE IF EXISTS `view_user`;

/*!50001 DROP VIEW IF EXISTS `view_user` */;
/*!50001 DROP TABLE IF EXISTS `view_user` */;

/*!50001 CREATE TABLE  `view_user`(
 `id` int(10) unsigned ,
 `name` varchar(255) ,
 `email` varchar(255) ,
 `password` varchar(255) ,
 `remember_token` varchar(100) ,
 `created_at` timestamp ,
 `updated_at` timestamp ,
 `profesi` int(11) ,
 `phone` varchar(15) ,
 `avatar` varchar(512) ,
 `usercode` varchar(24) ,
 `rs_kode` varchar(512) ,
 `rs_id` int(12) ,
 `title` varchar(32) 
)*/;

/*View structure for view mutasi_pasien */

/*!50001 DROP TABLE IF EXISTS `mutasi_pasien` */;
/*!50001 DROP VIEW IF EXISTS `mutasi_pasien` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`app`@`%` SQL SECURITY DEFINER VIEW `mutasi_pasien` AS (select `users`.`id` AS `user_id`,`users`.`name` AS `name`,`kasus`.`id` AS `kasus_id`,`kasus`.`judul_kasus` AS `judul_kasus`,`kasus`.`created_at` AS `created_at`,`kasus`.`end_at` AS `end_at`,`rs`.`nama` AS `rumah_sakit`,`ki`.`nama` AS `nama_pasien` from ((((`users` join `kasus`) join `kasus_collaborator` `kc`) join `rumah_sakit` `rs`) join `kasus_identitas` `ki`) where ((`users`.`id` = `kc`.`users_id`) and (`kc`.`kasus_id` = `kasus`.`id`) and (`kc`.`role` = 11) and (`kasus`.`rumah_sakit` = `rs`.`id`) and (`kasus`.`id` = `ki`.`kasus_id`))) */;

/*View structure for view unread_kasus_log */

/*!50001 DROP TABLE IF EXISTS `unread_kasus_log` */;
/*!50001 DROP VIEW IF EXISTS `unread_kasus_log` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`app`@`%` SQL SECURITY DEFINER VIEW `unread_kasus_log` AS (select `kl`.`kasus_id` AS `kasus_id`,`kl`.`log_content` AS `log_content`,`kl`.`log_tab` AS `log_tab`,`kl`.`created_at` AS `created_at`,`kl`.`created_by` AS `created_by`,`klr`.`users_id` AS `users_id` from (`kasus_log` `kl` join `kasus_log_read` `klr`) where ((`kl`.`id` = `klr`.`kasus_log`) and (`klr`.`read` = 0) and (`kl`.`log_tab` <> 'diskusi'))) */;

/*View structure for view unread_message */

/*!50001 DROP TABLE IF EXISTS `unread_message` */;
/*!50001 DROP VIEW IF EXISTS `unread_message` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`app`@`%` SQL SECURITY DEFINER VIEW `unread_message` AS (select `dm`.`id` AS `id`,`dm`.`id_kasus` AS `id_kasus`,`dm`.`content` AS `content`,`dm`.`channel` AS `channel`,`dm`.`created_by` AS `created_by`,`dm`.`created_at` AS `created_at`,`dmr`.`id` AS `read_id`,`dmr`.`users_id` AS `users_id`,`dmr`.`read_status` AS `read_status`,`dmr`.`get` AS `get_msg`,now() AS `time_now`,`u`.`id` AS `creator_id`,`u`.`name` AS `creator_name`,`u`.`avatar_thumb` AS `avatar_thumb` from ((`diskusi_message` `dm` join `diskusi_message_read` `dmr`) join `users` `u`) where ((`dm`.`id` = `dmr`.`message_id`) and (`dmr`.`read_status` = 0) and (`dm`.`created_by` = `u`.`id`))) */;

/*View structure for view view_diagnosis_icd */

/*!50001 DROP TABLE IF EXISTS `view_diagnosis_icd` */;
/*!50001 DROP VIEW IF EXISTS `view_diagnosis_icd` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`app`@`%` SQL SECURITY DEFINER VIEW `view_diagnosis_icd` AS (select `kd`.`kasus_id` AS `kasus_id`,`icd`.`id` AS `id`,`icd`.`code_icd` AS `code_icd`,`icd`.`long_desc` AS `long_desc`,`kd`.`deleted_at` AS `deleted_at` from (`kasus_diagnosis` `kd` join `icd_10` `icd`) where ((`kd`.`icd_10` = `icd`.`id`) and isnull(`kd`.`deleted_at`))) */;

/*View structure for view view_kasus_collaborator */

/*!50001 DROP TABLE IF EXISTS `view_kasus_collaborator` */;
/*!50001 DROP VIEW IF EXISTS `view_kasus_collaborator` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`app`@`%` SQL SECURITY DEFINER VIEW `view_kasus_collaborator` AS (select `u`.`id` AS `user_id`,`u`.`name` AS `name`,`u`.`usercode` AS `usercode`,`u`.`profesi` AS `profesi`,`u`.`avatar_thumb` AS `avatar_thumb`,`u`.`device` AS `device`,`kc`.`accept` AS `accept`,`kc`.`order` AS `order`,`kc`.`admin` AS `admin`,`kct`.`id` AS `id`,`kct`.`type` AS `type`,`kct`.`shows` AS `shows`,`kct`.`title` AS `title`,`kct`.`short_title` AS `short_title`,`kct`.`kasus` AS `kasus`,`kct`.`identitas` AS `identitas`,`kct`.`resep` AS `resep`,`kct`.`soap` AS `soap`,`kct`.`penunjang` AS `penunjang`,`kct`.`tindakan` AS `tindakan`,`kct`.`lokasi` AS `lokasi`,`kct`.`collaborator` AS `collaborator`,`kct`.`diskusi` AS `diskusi`,`kct`.`diagnosis` AS `diagnosis`,`kct`.`operasi` AS `operasi`,`kct`.`note` AS `note`,`kct`.`penunjang_laborat` AS `penunjang_laborat`,`kct`.`penunjang_elektrogram` AS `penunjang_elektrogram`,`kct`.`penunjang_radiologi` AS `penunjang_radiologi`,`kct`.`penunjang_klinis` AS `penunjang_klinis`,`kct`.`penunjang_umum` AS `penunjang_umum`,`kct`.`penunjang_link` AS `penunjang_link`,`kct`.`diskusi_dokter` AS `diskusi_dokter`,`kct`.`diskusi_laborat` AS `diskusi_laborat`,`kct`.`diskusi_perawat` AS `diskusi_perawat`,`kct`.`diskusi_farmasi` AS `diskusi_farmasi`,`kct`.`tagihan` AS `tagihan`,`kct`.`alat_bantu` AS `alat_bantu`,`kct`.`print` AS `print`,`kc`.`role` AS `role`,`k`.`id` AS `kasus_id`,`k`.`nomor_kasus` AS `nomor_kasus`,`k`.`judul_kasus` AS `judul_kasus` from (((`users` `u` join `kasus_collaborator` `kc`) join `kasus` `k`) join `kasus_collaborator_type` `kct`) where ((`u`.`id` = `kc`.`users_id`) and (`k`.`id` = `kc`.`kasus_id`) and (`kct`.`id` = `kc`.`role`) and (`kc`.`accept` >= 0))) */;

/*View structure for view view_kasus_identitas */

/*!50001 DROP TABLE IF EXISTS `view_kasus_identitas` */;
/*!50001 DROP VIEW IF EXISTS `view_kasus_identitas` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`app`@`%` SQL SECURITY DEFINER VIEW `view_kasus_identitas` AS (select `kc`.`id` AS `id`,`kc`.`pasien_id` AS `pasien_id`,`kc`.`kasus_id` AS `kasus_id`,`kc`.`nama` AS `nama`,`kc`.`no_rekam_medis` AS `no_rekam_medis`,`kc`.`tempat_lahir` AS `tempat_lahir`,`kc`.`tanggal_lahir` AS `tanggal_lahir`,`kc`.`jenis_kelamin` AS `jenis_kelamin`,`kc`.`alamat` AS `alamat`,`kc`.`pekerjaan` AS `pekerjaan`,`kc`.`no_hp` AS `no_hp`,`kc`.`asuransi` AS `asuransi`,`kc`.`no_asuransi` AS `no_asuransi`,`kc`.`avatar` AS `avatar`,`kc`.`avatar_thumb` AS `avatar_thumb`,`kc`.`avatar_small` AS `avatar_small`,`kc`.`rumah_sakit` AS `rumah_sakit`,`kc`.`created_at` AS `created_at`,`kc`.`updated_at` AS `updated_at`,`kc`.`updated_by` AS `updated_by`,`u`.`name` AS `name`,`rs`.`kode` AS `rs_kode`,`rs`.`nama` AS `rs_nama`,`rs`.`id` AS `rs_id`,`rs`.`business_id` AS `business_id` from ((`kasus_identitas` `kc` join `users` `u`) join `rumah_sakit` `rs`) where ((`u`.`id` = `kc`.`updated_by`) and (`kc`.`rumah_sakit` = `rs`.`id`))) */;

/*View structure for view view_pasien_rs */

/*!50001 DROP TABLE IF EXISTS `view_pasien_rs` */;
/*!50001 DROP VIEW IF EXISTS `view_pasien_rs` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`app`@`%` SQL SECURITY DEFINER VIEW `view_pasien_rs` AS (select `pasien`.`id` AS `id`,`pasien`.`nama` AS `nama`,`pasien`.`no_rekam_medis` AS `no_rekam_medis`,`pasien`.`tempat_lahir` AS `tempat_lahir`,`pasien`.`tanggal_lahir` AS `tanggal_lahir`,`pasien`.`jenis_kelamin` AS `jenis_kelamin`,`pasien`.`alamat` AS `alamat`,`pasien`.`pekerjaan` AS `pekerjaan`,`pasien`.`rumah_sakit` AS `rumah_sakit`,`pasien`.`created_at` AS `created_at`,`pasien`.`last_update` AS `last_update`,`pasien`.`avatar` AS `avatar`,`pasien`.`avatar_thumb` AS `avatar_thumb`,`pasien`.`avatar_small` AS `avatar_small`,`pasien`.`slug` AS `slug`,`pasien`.`created_by` AS `created_by`,`pasien`.`last_update_by` AS `last_update_by`,`pasien`.`asuransi` AS `asuransi`,`pasien`.`no_asuransi` AS `no_asuransi`,`pasien`.`no_hp` AS `no_hp`,`users`.`name` AS `nama_user`,`rs`.`kode` AS `rs_kode`,`rs`.`nama` AS `rs_nama`,`rs`.`id` AS `rs_id` from ((`pasien` join `rumah_sakit` `rs`) join `users`) where ((`users`.`id` = `pasien`.`last_update_by`) and (`pasien`.`rumah_sakit` = `rs`.`id`))) */;

/*View structure for view view_tindakan_icd */

/*!50001 DROP TABLE IF EXISTS `view_tindakan_icd` */;
/*!50001 DROP VIEW IF EXISTS `view_tindakan_icd` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`app`@`%` SQL SECURITY DEFINER VIEW `view_tindakan_icd` AS (select `kt`.`kasus_id` AS `kasus_id`,`icd`.`id` AS `id`,`icd`.`code_icd` AS `code_icd`,`icd`.`long_desc` AS `long_desc`,`icd`.`short_desc` AS `short_desc`,`kt`.`deleted_at` AS `deleted_at` from (`kasus_tindakan` `kt` join `icd_9` `icd`) where ((`kt`.`icd_9` = `icd`.`id`) and isnull(`kt`.`deleted_at`))) */;

/*View structure for view view_user */

/*!50001 DROP TABLE IF EXISTS `view_user` */;
/*!50001 DROP VIEW IF EXISTS `view_user` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`app`@`%` SQL SECURITY DEFINER VIEW `view_user` AS (select `users`.`id` AS `id`,`users`.`name` AS `name`,`users`.`email` AS `email`,`users`.`password` AS `password`,`users`.`remember_token` AS `remember_token`,`users`.`created_at` AS `created_at`,`users`.`updated_at` AS `updated_at`,`users`.`profesi` AS `profesi`,`users`.`phone` AS `phone`,`users`.`avatar` AS `avatar`,`users`.`usercode` AS `usercode`,`rumah_sakit`.`kode` AS `rs_kode`,`rumah_sakit`.`id` AS `rs_id`,`profession`.`title` AS `title` from (((`users` join `rumah_sakit`) join `profession`) join `users_rs`) where ((`users`.`id` = `users_rs`.`users_id`) and (`users`.`profesi` = `profession`.`id`) and (`users_rs`.`rumah_sakit_id` = `rumah_sakit`.`id`))) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
