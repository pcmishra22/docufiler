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

/*Table structure for table `test` */

DROP TABLE IF EXISTS `test`;

CREATE TABLE `test` (
  `col1` int(11) NOT NULL,
  `col2` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`col1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `test` */

/*Table structure for table `user_category` */

DROP TABLE IF EXISTS `user_category`;

CREATE TABLE `user_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(50) DEFAULT NULL,
  `categoryname` varchar(50) NOT NULL,
  `categoryimage` varchar(50) NOT NULL,
  `create_datetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user_category` */

/*Table structure for table `user_details` */

DROP TABLE IF EXISTS `user_details`;

CREATE TABLE `user_details` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rights` enum('1','2','3','4','0') DEFAULT '0',
  `create_datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `user_details` */

insert  into `user_details`(`id`,`email`,`user_id`,`rights`,`create_datetime`) values (1,'sushant.securelife@gmail.com',2,'1','2015-11-02 12:59:22'),(2,'sushant@gmail.com',2,'2','2015-11-03 12:32:23'),(3,'kartik@gmail.com',2,'3','2015-11-03 12:32:23'),(4,'himanshu@gmail.com',2,'1','2015-11-03 12:32:23'),(5,'rishabh@gmail.com',2,'2','2015-11-03 12:32:23');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
