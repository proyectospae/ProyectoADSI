/*
SQLyog Ultimate v11.11 (32 bit)
MySQL - 5.5.5-10.1.25-MariaDB : Database - dbtest
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dbtest` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `dbtest`;

/*Table structure for table `ambientes` */

DROP TABLE IF EXISTS `ambientes`;

CREATE TABLE `ambientes` (
  `idAmbientes` int(11) NOT NULL,
  `AmbientesNom` varchar(80) NOT NULL,
  PRIMARY KEY (`idAmbientes`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ambientes` */

LOCK TABLES `ambientes` WRITE;

UNLOCK TABLES;

/*Table structure for table `centro` */

DROP TABLE IF EXISTS `centro`;

CREATE TABLE `centro` (
  `idCentro` int(11) NOT NULL,
  `CentroNom` varchar(80) NOT NULL,
  PRIMARY KEY (`idCentro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `centro` */

LOCK TABLES `centro` WRITE;

UNLOCK TABLES;

/*Table structure for table `ciudades` */

DROP TABLE IF EXISTS `ciudades`;

CREATE TABLE `ciudades` (
  `idciudades` int(11) NOT NULL,
  `ciudades` varchar(80) NOT NULL,
  PRIMARY KEY (`idciudades`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ciudades` */

LOCK TABLES `ciudades` WRITE;

UNLOCK TABLES;

/*Table structure for table `departamentos` */

DROP TABLE IF EXISTS `departamentos`;

CREATE TABLE `departamentos` (
  `iddepartamentos` int(15) NOT NULL,
  `departamentos` varchar(80) NOT NULL,
  PRIMARY KEY (`iddepartamentos`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `departamentos` */

LOCK TABLES `departamentos` WRITE;

UNLOCK TABLES;

/*Table structure for table `fichas` */

DROP TABLE IF EXISTS `fichas`;

CREATE TABLE `fichas` (
  `idfichas` int(11) NOT NULL,
  `fichasNom` varchar(80) NOT NULL,
  PRIMARY KEY (`idfichas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `fichas` */

LOCK TABLES `fichas` WRITE;

UNLOCK TABLES;

/*Table structure for table `jornadas` */

DROP TABLE IF EXISTS `jornadas`;

CREATE TABLE `jornadas` (
  `idjornadas` int(11) NOT NULL,
  `jornadas` varchar(80) NOT NULL,
  PRIMARY KEY (`idjornadas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `jornadas` */

LOCK TABLES `jornadas` WRITE;

UNLOCK TABLES;

/*Table structure for table `preguntas` */

DROP TABLE IF EXISTS `preguntas`;

CREATE TABLE `preguntas` (
  `id_Pregunta` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_Pregunta` varchar(100) NOT NULL,
  PRIMARY KEY (`id_Pregunta`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `preguntas` */

LOCK TABLES `preguntas` WRITE;

insert  into `preguntas`(`id_Pregunta`,`Nom_Pregunta`) values (1,'La distribucion de maquinaria, equipos, muebles etc. En el ambiente corresponde a las necesidades de'),(2,'La maquinaria y equipos son suficientes y se encuentran en buen estado para desarrollar la actividad'),(3,'El ambiente se encuentra en buenas condiciones de orden y aseo.'),(4,'Se cuenta con el procedimiento para el almacenamiento, tratamiento y disposicion de residuos.'),(5,'Los materiales e insumos son los requeridos para desarrollar la acftividad de aprendizaje (cantidad '),(6,'El inventario existente en el ambiente esta completo y en buenas condiciones.'),(7,'Se cuenta con la bibliografia basica (fisica  y/o digital), según lo establecido en el diseño del pr');

UNLOCK TABLES;

/*Table structure for table `sedes` */

DROP TABLE IF EXISTS `sedes`;

CREATE TABLE `sedes` (
  `idSedes` int(11) NOT NULL,
  `SedesNom` varchar(80) NOT NULL,
  PRIMARY KEY (`idSedes`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `sedes` */

LOCK TABLES `sedes` WRITE;

UNLOCK TABLES;

/*Table structure for table `tbl_admin` */

DROP TABLE IF EXISTS `tbl_admin`;

CREATE TABLE `tbl_admin` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(100) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `userPass` varchar(100) NOT NULL,
  `userStatus` enum('Y','N') NOT NULL,
  `tokenCode` varchar(100) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_admin` */

LOCK TABLES `tbl_admin` WRITE;

insert  into `tbl_admin`(`userID`,`userName`,`userEmail`,`userPass`,`userStatus`,`tokenCode`) values (2,'jeison andre ramirez','jaramirez018@misena.edu.co','25d55ad283aa400af464c76d713c07ad','Y','2e385858278b6849faa2896ec5147045');

UNLOCK TABLES;

/*Table structure for table `tbl_users` */

DROP TABLE IF EXISTS `tbl_users`;

CREATE TABLE `tbl_users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(100) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `userPass` varchar(100) NOT NULL,
  `userStatus` enum('Y','N') NOT NULL DEFAULT 'N',
  `tokenCode` varchar(100) NOT NULL,
  PRIMARY KEY (`userID`),
  UNIQUE KEY `userEmail` (`userEmail`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_users` */

LOCK TABLES `tbl_users` WRITE;

insert  into `tbl_users`(`userID`,`userName`,`userEmail`,`userPass`,`userStatus`,`tokenCode`) values (10,'Orlando','oecheverry0@misena.edu.co','202cb962ac59075b964b07152d234b70','Y','f80a5c1e00608604fb4dc88beb0af961');

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
