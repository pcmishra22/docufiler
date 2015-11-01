/*
SQLyog - Free MySQL GUI v5.17
Host - 5.6.25 : Database - docufiler
*********************************************************************
Server version : 5.6.25
*/

SET NAMES utf8;

SET SQL_MODE='';

create database if not exists `docufiler`;

USE `docufiler`;

SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';

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

insert into `doc_admin` (`id`,`first_name`,`last_name`,`email_address`,`user_name`,`pass_word`,`date`,`status`) values (1,'prakash','mishra','prakash@redlizardstudioz.com','admin','21232f297a57a5a743894a0e4a801fc3','2015-02-12 00:00:00',1);

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

insert into `doc_email_templates` (`id`,`template_name`,`template_contents`,`template_subject`,`date_created`) values (42,'Service','<p>Thank you for registering with docufiler. Please click on the link below to confirm your registration.</p>\n','Sign Up','2015-06-11 10:18:13');

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
  `expiryyear` varchar(4) DEFAULT NULL,
  `create_datetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `doc_user` */

insert into `doc_user` (`id`,`firstname`,`lastname`,`email`,`password`,`passwordreset`,`phone`,`address`,`city`,`state`,`zip`,`baddress`,`bcity`,`bstate`,`bzip`,`cardname`,`cardno`,`cardcvv`,`expirymonth`,`expiryyear`,`create_datetime`) values (2,'prakash','mishra','pcmishra22@gmail.com','b0baee9d279d34fa1dfd71aadb908c3f','','9872728767','house no 682','qqqqqqqqq','wwwwwwwwwww','134109','house no 682','pkl','haryana','134109','prakash','ddddddddddd','ccc','02','15','0000-00-00 00:00:00'),(3,'aa','bb','abc@gmail.com','21232f297a57a5a743894a0e4a801fc3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00'),(4,'cc','dd','cd@abc.com','21232f297a57a5a743894a0e4a801fc3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00'),(5,'dd','ee','ef@abc.ocm','21232f297a57a5a743894a0e4a801fc3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00'),(6,'ee','dd','ef@gmail.com','21232f297a57a5a743894a0e4a801fc3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00'),(7,'gg','hh','gh@cd.com','21232f297a57a5a743894a0e4a801fc3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00'),(8,'a','b','ab@def.com','21232f297a57a5a743894a0e4a801fc3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00'),(9,'z','aa','za@def.com','21232f297a57a5a743894a0e4a801fc3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00'),(10,'pf','fe','fe@pop.com','21232f297a57a5a743894a0e4a801fc3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00'),(11,'prakash','chandra','pcmishra22@yahoo.com','21232f297a57a5a743894a0e4a801fc3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2015-10-28 07:49:59');

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

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
