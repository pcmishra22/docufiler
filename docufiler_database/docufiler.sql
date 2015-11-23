/*
SQLyog Community v12.09 (64 bit)
MySQL - 5.6.17 : Database - docufiler
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`docufiler` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `docufiler`;

/*Table structure for table `doc_admin` */

DROP TABLE IF EXISTS `doc_admin`;

CREATE TABLE `doc_admin` (
  `id` tinyint(10) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(225) NOT NULL,
  `last_name` varchar(225) NOT NULL,
  `email_address` varchar(225) NOT NULL,
  `user_name` varchar(225) NOT NULL,
  `pass_word` varchar(225) NOT NULL,
  `date` datetime NOT NULL,
  `status` tinyint(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `doc_admin` */

insert  into `doc_admin`(`id`,`first_name`,`last_name`,`email_address`,`user_name`,`pass_word`,`date`,`status`) values (1,'prakash','mishra','prakash@redlizardstudioz.com','admin','21232f297a57a5a743894a0e4a801fc3','2015-02-12 00:00:00',1);

/*Table structure for table `doc_email_templates` */

DROP TABLE IF EXISTS `doc_email_templates`;

CREATE TABLE `doc_email_templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `template_name` varchar(255) NOT NULL,
  `template_contents` text NOT NULL,
  `template_subject` varchar(250) NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

/*Data for the table `doc_email_templates` */

insert  into `doc_email_templates`(`id`,`template_name`,`template_contents`,`template_subject`,`date_created`) values (42,'Service','<p>Thank you for registering with docufiler. Please click on the link below to confirm your registration.</p>\n','Sign Up','2015-06-11 10:18:13');

/*Table structure for table `doc_settings` */

DROP TABLE IF EXISTS `doc_settings`;

CREATE TABLE `doc_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `awsAccessKey` varchar(100) DEFAULT NULL,
  `awsSecretKey` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `doc_settings` */

insert  into `doc_settings`(`id`,`awsAccessKey`,`awsSecretKey`) values (1,'AKIAI5R37UMKQTIKWIHA','F3tBMwHpUhGAOzzeaZumtsXD1d7F2TAddK5lKAPB');

/*Table structure for table `doc_user` */

DROP TABLE IF EXISTS `doc_user`;

CREATE TABLE `doc_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `passwordreset` varchar(100) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `zip` varchar(50) DEFAULT NULL,
  `baddress` varchar(100) DEFAULT NULL,
  `bcity` varchar(100) DEFAULT NULL,
  `bstate` varchar(100) DEFAULT NULL,
  `bzip` varchar(50) DEFAULT NULL,
  `cardname` varchar(50) DEFAULT NULL,
  `cardno` varchar(20) DEFAULT NULL,
  `cardcvv` varchar(3) DEFAULT NULL,
  `expirymonth` varchar(2) DEFAULT NULL,
  `answer` varchar(100) DEFAULT NULL,
  `question` varchar(100) DEFAULT NULL,
  `expiryyear` varchar(4) DEFAULT NULL,
  `create_datetime` datetime NOT NULL,
  `usertype` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `doc_user` */

insert  into `doc_user`(`id`,`firstname`,`lastname`,`email`,`password`,`passwordreset`,`phone`,`address`,`city`,`state`,`zip`,`baddress`,`bcity`,`bstate`,`bzip`,`cardname`,`cardno`,`cardcvv`,`expirymonth`,`answer`,`question`,`expiryyear`,`create_datetime`,`usertype`) values (2,'prakash','mishra','pcmishra22@gmail.com','b0baee9d279d34fa1dfd71aadb908c3f','','9872728767','house no 682','qqqqqqqqq','wwwwwwwwwww','134109','house no 682','pkl','haryana','134109','prakash','ddddddddddd','ccc','02','answer is ','what is your eee','15','0000-00-00 00:00:00',NULL),(3,'aa','bb','abc@gmail.com','21232f297a57a5a743894a0e4a801fc3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00',NULL),(4,'cc','dd','cd@abc.com','21232f297a57a5a743894a0e4a801fc3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00',NULL),(5,'dd','ee','ef@abc.ocm','21232f297a57a5a743894a0e4a801fc3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00',NULL),(6,'ee','dd','ef@gmail.com','21232f297a57a5a743894a0e4a801fc3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00',NULL),(7,'gg','hh','gh@cd.com','21232f297a57a5a743894a0e4a801fc3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00',NULL),(8,'a','b','ab@def.com','21232f297a57a5a743894a0e4a801fc3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00',NULL),(9,'z','aa','za@def.com','21232f297a57a5a743894a0e4a801fc3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00',NULL),(10,'pf','fe','fe@pop.com','21232f297a57a5a743894a0e4a801fc3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00',NULL),(11,'prakash','chandra','pcmishra22@yahoo.com','21232f297a57a5a743894a0e4a801fc3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2015-10-28 07:49:59',NULL),(12,NULL,'','sushant.securelife@gmail.com','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2015-11-02 12:59:22',1),(13,NULL,'','vchauhan46@gmail.com','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2015-11-02 15:22:31',1),(14,NULL,'','sushant@gmail.com','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2015-11-03 12:32:23',1);

/*Table structure for table `doc_user_category` */

DROP TABLE IF EXISTS `doc_user_category`;

CREATE TABLE `doc_user_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(50) DEFAULT NULL,
  `categoryname` varchar(50) NOT NULL,
  `categoryimage` varchar(50) NOT NULL,
  `create_datetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `doc_user_category` */

/*Table structure for table `doc_user_details` */

DROP TABLE IF EXISTS `doc_user_details`;

CREATE TABLE `doc_user_details` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rights` enum('1','2','3','4','0') DEFAULT '0',
  `create_datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `doc_user_details` */

insert  into `doc_user_details`(`id`,`email`,`user_id`,`rights`,`create_datetime`) values (1,'sushant.securelife@gmail.com',2,'1','2015-11-02 12:59:22'),(2,'sushant@gmail.com',2,'2','2015-11-03 12:32:23'),(3,'kartik@gmail.com',2,'3','2015-11-03 12:32:23'),(4,'himanshu@gmail.com',2,'1','2015-11-03 12:32:23'),(5,'rishabh@gmail.com',2,'2','2015-11-03 12:32:23');

/*Table structure for table `doc_user_files` */

DROP TABLE IF EXISTS `doc_user_files`;

CREATE TABLE `doc_user_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `uniquename` varchar(100) DEFAULT NULL,
  `folder` varchar(100) DEFAULT NULL,
  `device` varchar(100) DEFAULT NULL,
  `filetype` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `size` varchar(10) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

/*Data for the table `doc_user_files` */

insert  into `doc_user_files`(`id`,`userid`,`name`,`uniquename`,`folder`,`device`,`filetype`,`location`,`size`,`created_date`) values (32,2,'images.jpg','1447472060_images.jpg','','','image/jpeg','','9299','2015-11-14 04:34:23'),(33,2,'images.jpg','1447472122_images.jpg','','','image/jpeg','','9299','2015-11-14 04:35:25'),(34,2,'images.jpg','1447472136_images.jpg','','','image/jpeg','','9299','2015-11-14 04:35:38'),(35,2,'images.jpg','1447472217_images.jpg','','','image/jpeg','','9299','2015-11-14 04:37:00'),(36,2,'images.jpg','1447472395_images.jpg','','','image/jpeg','','9299','2015-11-14 04:39:57'),(37,2,'images.jpg','1447472468_images.jpg','','','image/jpeg','','9299','2015-11-14 04:41:10'),(38,2,'index.php.html','1447472518_index.php.html','','','text/html','','8151','2015-11-14 04:42:00'),(39,2,'main.css','1447472522_main.css','','','text/css','','2050','2015-11-14 04:42:04'),(40,2,'script.js','1447472526_script.js','','','application/javascript','','3537','2015-11-14 04:42:08'),(41,2,'test.php','1447472529_test.php','','','application/octet-stream','','698','2015-11-14 04:42:11'),(42,2,'upload.php','1447472533_upload.php','','','application/octet-stream','','819','2015-11-14 04:42:15'),(43,2,'test.php','1447472636_test.php','','','application/octet-stream','','698','2015-11-14 04:43:58'),(44,2,'test.php','1447472700_test.php','','','application/octet-stream','','698','2015-11-14 04:45:02'),(45,2,'test.php','1447473133_test.php','','','application/octet-stream','','698','2015-11-14 04:52:15'),(46,2,'test.php','1447473177_test.php','','','application/octet-stream','','698','2015-11-14 04:52:59'),(47,2,'upload.php','1447475513_upload.php','','','application/octet-stream','','819','2015-11-14 05:31:55');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
