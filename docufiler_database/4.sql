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

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `account` bigint(6) NOT NULL,
  `emailid` varchar(255) COLLATE latin1_bin DEFAULT NULL,
  `admin` varchar(3) COLLATE latin1_bin DEFAULT NULL,
  `readwrite` varchar(3) COLLATE latin1_bin DEFAULT NULL,
  `readonly` varchar(3) COLLATE latin1_bin DEFAULT NULL,
  PRIMARY KEY (`account`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

/*Data for the table `roles` */

/*Table structure for table `settings` */

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `awsAccessKey` varchar(100) DEFAULT NULL,
  `awsSecretKey` varchar(100) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `discountactive` enum('inactive','active') DEFAULT 'active',
  `paypalmerchanctemail` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `settings` */

insert  into `settings`(`id`,`awsAccessKey`,`awsSecretKey`,`discount`,`discountactive`,`paypalmerchanctemail`) values (1,'AKIAJHGW4ABUUOEBHEUA','AT6K1ASUegLuVYSFsLT8Gl0X/KU0+pOLi+3kA7Ss',100,'inactive','pcmishra22@gmail.com');

/*Table structure for table `user_cardinfo` */

DROP TABLE IF EXISTS `user_cardinfo`;

CREATE TABLE `user_cardinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(50) DEFAULT NULL,
  `cardname` varchar(50) NOT NULL,
  `cardholderfname` varchar(50) NOT NULL,
  `cardholderlname` varchar(50) DEFAULT NULL,
  `cardno` varchar(20) NOT NULL,
  `cardcvv` varchar(5) NOT NULL,
  `expirymonth` varchar(5) NOT NULL,
  `expiryyear` varchar(5) NOT NULL,
  `create_datetime` datetime NOT NULL,
  `baddress` varchar(200) DEFAULT NULL,
  `bcity` varchar(100) DEFAULT NULL,
  `bstate` varchar(100) DEFAULT NULL,
  `bzip` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `user_cardinfo` */

insert  into `user_cardinfo`(`id`,`userid`,`cardname`,`cardholderfname`,`cardholderlname`,`cardno`,`cardcvv`,`expirymonth`,`expiryyear`,`create_datetime`,`baddress`,`bcity`,`bstate`,`bzip`) values (2,'2','MasterCard','Prakash Chandra',NULL,'5555555555554444','456','02','2018','2015-12-02 11:33:33','707 W. Bay Drive','Largo','FL','33770'),(4,'2','MasterCard','Prakash Chandra',NULL,'1234567812345678','1234','11','2020','2015-12-05 18:29:26','my visa card address','panchkula','chandigarh','11111'),(5,'2','MasterCard','Prakash','Mishra','4444444444444444','456','03','2015','2015-12-20 05:47:53',NULL,NULL,NULL,NULL),(6,'2','visa','Prakash','Mishra','1111111111111111','456','10','2020','2015-12-20 11:41:21',NULL,NULL,NULL,NULL),(7,'2','discover','Prakash','Mishra','2222333344445555','234','12','2021','2015-12-20 11:42:01',NULL,NULL,NULL,NULL),(8,'2','MasterCard','Kartik','Mishra','1234567812345678','567','12','2024','2015-12-23 17:08:51',NULL,NULL,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
