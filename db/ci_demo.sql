/*
SQLyog Enterprise - MySQL GUI v7.02 
MySQL - 5.5.5-10.1.36-MariaDB : Database - ci_admin
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

USE `ci_admin`;

/*Table structure for table `items` */

DROP TABLE IF EXISTS `items`;

CREATE TABLE `items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `size` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `file_name` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `preference` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `items` */

insert  into `items`(`id`,`title`,`description`,`size`,`type`,`date`,`file_name`,`preference`) values (1,'Welcome','Welcome data test',NULL,NULL,NULL,NULL,NULL),(16,'Hello','Welcome data test',NULL,NULL,NULL,NULL,NULL),(17,'Praveen','Welcome data test',NULL,NULL,NULL,NULL,NULL),(18,'kalbi','Welcome data test',NULL,NULL,NULL,NULL,NULL),(19,'how to connect','how to connect',NULL,NULL,NULL,NULL,NULL),(20,'Welcome','data',NULL,NULL,NULL,NULL,NULL),(21,'123456466 - - -8','12321321321 321 32132 321 5656',NULL,NULL,NULL,NULL,NULL),(22,'','test','Normal,Medium','soft','2018-11-28','',NULL),(23,'testestset --- ','estsetset','Medium','hard','2018-11-30','',NULL),(24,'WElcome ','demo','Normal','hard','2018-11-30','2066834000Tulips.jpg',NULL);

/*Table structure for table `user_login` */

DROP TABLE IF EXISTS `user_login`;

CREATE TABLE `user_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `user_login` */

insert  into `user_login`(`id`,`user_name`,`user_email`,`user_password`) values (3,'praveen','praveenkalbi@gmail.com','e10adc3949ba59abbe56e057f20f883e'),(4,'898989','8989@gmail.com','e10adc3949ba59abbe56e057f20f883e');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
