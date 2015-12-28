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

/*Table structure for table `pages` */

DROP TABLE IF EXISTS `pages`;

CREATE TABLE `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `content` text,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `pages` */

insert  into `pages`(`id`,`title`,`content`,`created_date`) values (1,'About Us','adfdfdfdfdfd','2015-11-25 04:45:28'),(2,'Second','Second Second\r\nSecond Second\r\nSecond Second','2015-11-25 11:07:48'),(3,'Thirdwwwww','ThirdThird ThirdThird ThirdThird eeeee','2015-11-25 11:32:26');

/*Table structure for table `plans` */

DROP TABLE IF EXISTS `plans`;

CREATE TABLE `plans` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `price` varchar(10) DEFAULT NULL,
  `files` int(10) DEFAULT NULL,
  `space` varchar(50) DEFAULT NULL,
  `usertype` varchar(50) DEFAULT NULL,
  `discount` varchar(100) DEFAULT NULL,
  `filesize` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `plans` */

insert  into `plans`(`id`,`name`,`price`,`files`,`space`,`usertype`,`discount`,`filesize`) values (1,'Personal','4.99',5000,'10 MB ','1','1 Month Free','10'),(2,'Household','14.99',20000,'50 MB','2','3 Months Free','20'),(3,'Business','29.99',50000,'No Max','5','3 Months Free','50');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
