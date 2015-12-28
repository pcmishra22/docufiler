/*
SQLyog Community v12.09 (64 bit)
MySQL - 5.6.17 : Database - docudb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`docudb` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `docudb`;

/*Table structure for table `promotionalcode` */

DROP TABLE IF EXISTS `promotionalcode`;

CREATE TABLE `promotionalcode` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `codename` varchar(100) DEFAULT NULL,
  `percent` int(5) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'inactive',
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `promotionalcode` */

insert  into `promotionalcode`(`id`,`codename`,`percent`,`status`,`created_date`) values (1,'abc111',5,'active','2015-12-03 15:58:19'),(2,'def222',5,'inactive','2015-12-03 15:58:31'),(3,'sed123',5,'inactive','2015-12-04 15:58:42'),(4,'awq345',3,'inactive','2015-12-25 15:58:53'),(5,'wse345',4,'inactive','2015-12-03 15:59:05'),(7,'wwww345updated',12,'inactive','2015-12-03 01:49:06'),(8,'qqqqqq',0,'inactive','2015-12-03 06:13:36');

/*Table structure for table `roleaccess` */

DROP TABLE IF EXISTS `roleaccess`;

CREATE TABLE `roleaccess` (
  `account` bigint(6) NOT NULL,
  `emailid` varchar(255) COLLATE latin1_bin DEFAULT NULL,
  `fileid` int(11) DEFAULT NULL,
  `menuid` int(11) DEFAULT NULL,
  `write` varchar(3) COLLATE latin1_bin DEFAULT NULL,
  PRIMARY KEY (`account`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

/*Data for the table `roleaccess` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
