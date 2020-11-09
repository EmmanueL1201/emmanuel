/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.32-MariaDB : Database - kinky
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`kinky` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `kinky`;

/*Table structure for table `detalle_hotel` */

DROP TABLE IF EXISTS `detalle_hotel`;

CREATE TABLE `detalle_hotel` (
  `id_det_hotel` int(11) NOT NULL AUTO_INCREMENT,
  `id_hotel` int(11) DEFAULT NULL,
  `id_habitacion` int(11) DEFAULT NULL,
  `activo` int(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_det_hotel`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `detalle_hotel` */

insert  into `detalle_hotel`(`id_det_hotel`,`id_hotel`,`id_habitacion`,`activo`,`created_at`,`updated_at`) values (1,1,1,1,NULL,'0000-00-00 00:00:00'),(2,1,2,1,NULL,'0000-00-00 00:00:00'),(3,2,1,1,NULL,'0000-00-00 00:00:00'),(4,2,2,0,NULL,'0000-00-00 00:00:00'),(5,3,1,0,NULL,'0000-00-00 00:00:00'),(6,3,2,1,NULL,'0000-00-00 00:00:00');

/*Table structure for table `habitaciones` */

DROP TABLE IF EXISTS `habitaciones`;

CREATE TABLE `habitaciones` (
  `id_habitacion` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(150) DEFAULT NULL,
  `activo` int(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_habitacion`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `habitaciones` */

insert  into `habitaciones`(`id_habitacion`,`tipo`,`activo`,`created_at`,`updated_at`) values (1,'individual',1,'2020-11-07 12:36:14','0000-00-00 00:00:00'),(2,'matrimonial',1,'2020-11-07 12:36:26','0000-00-00 00:00:00');

/*Table structure for table `hoteles` */

DROP TABLE IF EXISTS `hoteles`;

CREATE TABLE `hoteles` (
  `id_hotel` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `activo` int(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_hotel`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `hoteles` */

insert  into `hoteles`(`id_hotel`,`nombre`,`activo`,`created_at`,`updated_at`) values (1,'Concorde',1,'2020-11-07 12:23:50','0000-00-00 00:00:00'),(2,'Quinta del rey',1,'2020-11-07 12:29:15','0000-00-00 00:00:00'),(3,'Aeropuerto',1,'2020-11-07 12:29:36','0000-00-00 00:00:00');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) DEFAULT NULL,
  `ap_paterno` varchar(150) DEFAULT NULL,
  `ap_materno` varchar(150) DEFAULT NULL,
  `correo` varchar(150) DEFAULT NULL,
  `contrasena` varchar(150) DEFAULT NULL,
  `activo` int(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `usuarios` */

insert  into `usuarios`(`id`,`nombre`,`ap_paterno`,`ap_materno`,`correo`,`contrasena`,`activo`,`created_at`,`updated_at`) values (1,'Emmanuel','Damian','Peña','edp12011995@gmail.com','123456',1,'2020-10-30 18:29:26','0000-00-00 00:00:00'),(2,'Monse','Pioquinto','Desco','monse@gmail.com','monse10',1,'2020-11-07 19:32:57','2020-11-07 19:32:57');

/*Table structure for table `visitas` */

DROP TABLE IF EXISTS `visitas`;

CREATE TABLE `visitas` (
  `id_visita` int(11) NOT NULL AUTO_INCREMENT,
  `id_hotel` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `numero_visita` int(11) DEFAULT NULL,
  `activo` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_visita`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `visitas` */

insert  into `visitas`(`id_visita`,`id_hotel`,`id_usuario`,`numero_visita`,`activo`,`created_at`,`updated_at`) values (14,2,1,12,1,'2020-11-09 18:23:48','2020-11-09 18:23:48'),(15,1,1,2,1,'2020-11-09 18:23:48','2020-11-09 18:23:48'),(16,3,1,1,1,'2020-11-09 18:55:40','2020-11-09 18:55:40');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
