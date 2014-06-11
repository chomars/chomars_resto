/*
SQLyog Community v9.63 
MySQL - 5.5.16-log : Database - posyandu
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`posyandu` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `posyandu`;

/*Table structure for table `bayi` */

DROP TABLE IF EXISTS `bayi`;

CREATE TABLE `bayi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tgl_lahir` varchar(54) DEFAULT NULL,
  `ayah` varchar(50) DEFAULT NULL,
  `ibu` varchar(50) DEFAULT NULL,
  `berat` varchar(50) DEFAULT NULL,
  `panjang` varchar(50) DEFAULT NULL,
  `alamat` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `bayi` */

insert  into `bayi`(`id`,`nama`,`tempat_lahir`,`tgl_lahir`,`ayah`,`ibu`,`berat`,`panjang`,`alamat`) values (1,'bayi','lahir','tanga','ta','234','324','29','394');

/*Table structure for table `dokter` */

DROP TABLE IF EXISTS `dokter`;

CREATE TABLE `dokter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` text,
  `jenis_kelamin` varchar(100) DEFAULT NULL,
  `tgl_lahir` varchar(100) DEFAULT NULL,
  `telp` varchar(100) DEFAULT NULL,
  `hp` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `dokter` */

insert  into `dokter`(`id`,`nama`,`alamat`,`jenis_kelamin`,`tgl_lahir`,`telp`,`hp`) values (1,'nama dokter','alamat','male','tanggal','2343242','234235235');

/*Table structure for table `pelayanan` */

DROP TABLE IF EXISTS `pelayanan`;

CREATE TABLE `pelayanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pelayanan` varchar(100) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pelayanan` */

/*Table structure for table `puskesmas` */

DROP TABLE IF EXISTS `puskesmas`;

CREATE TABLE `puskesmas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_puskesmas` varchar(100) DEFAULT NULL,
  `tgl` varchar(100) DEFAULT NULL,
  `nama_bayi` varchar(100) DEFAULT NULL,
  `diagnosa` varchar(100) DEFAULT NULL,
  `posyandu` varchar(100) DEFAULT NULL,
  `alamat` text,
  `telp` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `puskesmas` */

insert  into `puskesmas`(`id`,`nama_puskesmas`,`tgl`,`nama_bayi`,`diagnosa`,`posyandu`,`alamat`,`telp`) values (1,'nama puskesmas','tnaggal','bayi','diagnosa','posyandu','alamat','telp');

/*Table structure for table `rujukan` */

DROP TABLE IF EXISTS `rujukan`;

CREATE TABLE `rujukan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `id_dokter` int(11) DEFAULT NULL,
  `id_puskesmas` int(11) DEFAULT NULL,
  `tanggal` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `rujukan` */

insert  into `rujukan`(`id`,`user_id`,`id_dokter`,`id_puskesmas`,`tanggal`) values (1,1,1,1,'agustus');

/*Table structure for table `transaksi` */

DROP TABLE IF EXISTS `transaksi`;

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_bayi` int(11) DEFAULT NULL,
  `tgl` varchar(100) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `transaksi` */

insert  into `transaksi`(`id`,`id_bayi`,`tgl`,`keterangan`) values (2,1,'123213','123');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) DEFAULT NULL,
  `privilege` int(1) DEFAULT NULL,
  PRIMARY KEY (`user_id`,`username`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`user_id`,`username`,`password`,`privilege`) values (8,'admin','202cb962ac59075b964b07152d234b70',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
