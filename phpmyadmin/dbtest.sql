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
  `AmbientesNom` varchar(50) NOT NULL,
  `sedes_idSedes` int(11) NOT NULL,
  PRIMARY KEY (`idAmbientes`),
  KEY `fk_ambientes_sedes1_idx` (`sedes_idSedes`),
  CONSTRAINT `fk_ambientes_sedes1` FOREIGN KEY (`sedes_idSedes`) REFERENCES `sedes` (`idSedes`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ambientes` */

insert  into `ambientes`(`idAmbientes`,`AmbientesNom`,`sedes_idSedes`) values (101,'AMBIENTE 101',4),(102,'AMBIENTE 102',4),(103,'AMBIENTE 103',4),(200,'AMBIENTE 200',4),(201,'AMBIENTE 201',4),(202,'AMBIENTE 202',4),(203,'AMBIENTE 203',4),(204,'AMBIENTE 204',4),(300,'AMBIENTE 300',4),(301,'AMBIENTE 301',4),(302,'AMBIENTE 302',4),(303,'AMBIENTE 303',4),(304,'AMBIENTE 304',4);

/*Table structure for table `centro` */

DROP TABLE IF EXISTS `centro`;

CREATE TABLE `centro` (
  `idCentro` int(11) NOT NULL,
  `CentroNom` varchar(80) NOT NULL,
  `ciudades_idciudades` int(11) NOT NULL,
  PRIMARY KEY (`idCentro`),
  KEY `fk_centro_ciudades1_idx` (`ciudades_idciudades`),
  CONSTRAINT `fk_centro_ciudades1` FOREIGN KEY (`ciudades_idciudades`) REFERENCES `ciudades` (`idciudades`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `centro` */

insert  into `centro`(`idCentro`,`CentroNom`,`ciudades_idciudades`) values (5201,'centro de electricidad electrónica y telecomunicaciones',5),(5231,'centro de materiales y ensayos',5);

/*Table structure for table `ciudades` */

DROP TABLE IF EXISTS `ciudades`;

CREATE TABLE `ciudades` (
  `idciudades` int(11) NOT NULL,
  `ciudades` varchar(50) NOT NULL,
  `departamentos_iddepartamentos` int(11) NOT NULL,
  PRIMARY KEY (`idciudades`),
  KEY `fk_ciudades_departamentos_idx` (`departamentos_iddepartamentos`),
  CONSTRAINT `fk_ciudades_departamentos` FOREIGN KEY (`departamentos_iddepartamentos`) REFERENCES `departamentos` (`iddepartamentos`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ciudades` */

insert  into `ciudades`(`idciudades`,`ciudades`,`departamentos_iddepartamentos`) values (5,'Bogota D.C',12),(25,'Florida Blanca',15);

/*Table structure for table `departamentos` */

DROP TABLE IF EXISTS `departamentos`;

CREATE TABLE `departamentos` (
  `iddepartamentos` int(11) NOT NULL,
  `departamentos` varchar(50) NOT NULL,
  PRIMARY KEY (`iddepartamentos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `departamentos` */

insert  into `departamentos`(`iddepartamentos`,`departamentos`) values (12,'Cundinamarca'),(15,'Norte de Santander'),(23,'Cali');

/*Table structure for table `fichas` */

DROP TABLE IF EXISTS `fichas`;

CREATE TABLE `fichas` (
  `idfichas` int(11) NOT NULL,
  `fichasNom` varchar(80) NOT NULL,
  `ambientes_idAmbientes` int(11) NOT NULL,
  `jornadas_idjornadas` int(11) NOT NULL,
  PRIMARY KEY (`idfichas`),
  KEY `fk_fichas_ambientes1_idx` (`ambientes_idAmbientes`),
  KEY `fk_fichas_jornadas1_idx` (`jornadas_idjornadas`),
  CONSTRAINT `fk_fichas_ambientes1` FOREIGN KEY (`ambientes_idAmbientes`) REFERENCES `ambientes` (`idAmbientes`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_fichas_jornadas1` FOREIGN KEY (`jornadas_idjornadas`) REFERENCES `jornadas` (`idjornadas`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `fichas` */

insert  into `fichas`(`idfichas`,`fichasNom`,`ambientes_idAmbientes`,`jornadas_idjornadas`) values (1122334,'Analisis y Desarrollo de Sistemas de Informacion',101,1),(1220001,'Analisis y Desarrollo de Sistemas de Informacion',102,2),(1330002,'Analisis y Desarrollo de Sistemas de Informacion',103,3),(1440003,'Analisis y Desarrollo de Sistemas de Informacion',200,4),(1442203,'Analisis y Desarrollo de Sistemas de Informacion',201,1);

/*Table structure for table `formularioinstructor` */

DROP TABLE IF EXISTS `formularioinstructor`;

CREATE TABLE `formularioinstructor` (
  `nombres` varchar(75) NOT NULL,
  `apellidos` varchar(75) NOT NULL,
  `cedula` int(15) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `correo` varchar(75) NOT NULL,
  `pregunta1` enum('SI','NO') NOT NULL,
  `pregunta2` enum('SI','NO') NOT NULL,
  `pregunta3` enum('SI','NO') NOT NULL,
  `pregunta4` enum('SI','NO') NOT NULL,
  `pregunta5` enum('SI','NO') NOT NULL,
  `pregunta6` enum('SI','NO') NOT NULL,
  `departamento` varchar(80) NOT NULL,
  `ciudades` varchar(80) NOT NULL,
  `centros` varchar(80) NOT NULL,
  `sede` varchar(50) NOT NULL,
  `ambientes` varchar(50) NOT NULL,
  `ficha` int(15) NOT NULL,
  `jornada` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `formularioinstructor` */

insert  into `formularioinstructor`(`nombres`,`apellidos`,`cedula`,`cargo`,`correo`,`pregunta1`,`pregunta2`,`pregunta3`,`pregunta4`,`pregunta5`,`pregunta6`,`departamento`,`ciudades`,`centros`,`sede`,`ambientes`,`ficha`,`jornada`) values ('Jeison Andres','Ramirez',1030633810,'Instructor','jaramirez018@misena.edu.co','SI','SI','SI','SI','SI','SI','Cundinamarca','Bogota D.C','centro de electricidad electrï¿½nica y telecomunicaciones','COLOMBIA','AMBIENTE 101',1122334,'DIURNA');

/*Table structure for table `jornadas` */

DROP TABLE IF EXISTS `jornadas`;

CREATE TABLE `jornadas` (
  `idjornadas` int(11) NOT NULL,
  `jornadas` varchar(25) NOT NULL,
  PRIMARY KEY (`idjornadas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `jornadas` */

insert  into `jornadas`(`idjornadas`,`jornadas`) values (1,'DIURNA'),(2,'NOCTURNA'),(3,'MADRUGADA'),(4,'MIXTA');

/*Table structure for table `preguntas` */

DROP TABLE IF EXISTS `preguntas`;

CREATE TABLE `preguntas` (
  `id_Pregunta` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_Pregunta` varchar(80) NOT NULL,
  `registrarusu_id` int(11) NOT NULL,
  PRIMARY KEY (`id_Pregunta`),
  KEY `fk_preguntas_registrarusu1_idx` (`registrarusu_id`),
  CONSTRAINT `fk_preguntas_registrarusu1` FOREIGN KEY (`registrarusu_id`) REFERENCES `registrarusu` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `preguntas` */

insert  into `preguntas`(`id_Pregunta`,`Nom_Pregunta`,`registrarusu_id`) values (1,'La maquinaria y equipos son suficientes y se encuentran en buen estado para desa',1),(2,'El ambiente se encuentra en buenas condiciones de orden y aseo.',1),(3,'Se cuenta con el procedimiento para el almacenamiento, tratamiento y disposicion',1),(4,'Los materiales e insumos son los requeridos para desarrollar la acftividad de ap',1),(5,'El inventario existente en el ambiente esta completo y en buenas condiciones.',1),(6,'Se cuenta con la bibliografia basica (fisica  y/o digital), según lo establecido',1);

/*Table structure for table `registrarusu` */

DROP TABLE IF EXISTS `registrarusu`;

CREATE TABLE `registrarusu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tbl_users_userID` int(11) NOT NULL,
  `Cedula` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `fichas_idfichas` int(11) NOT NULL,
  `jornadas_idjornadas` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_registrarusu_fichas1_idx` (`fichas_idfichas`),
  KEY `fk_registrarusu_tbl_users1_idx` (`tbl_users_userID`),
  KEY `fk_registrarusu_jornadas1_idx` (`jornadas_idjornadas`),
  CONSTRAINT `fk_registrarusu_fichas1` FOREIGN KEY (`fichas_idfichas`) REFERENCES `fichas` (`idfichas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_registrarusu_jornadas1` FOREIGN KEY (`jornadas_idjornadas`) REFERENCES `jornadas` (`idjornadas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_registrarusu_tbl_users1` FOREIGN KEY (`tbl_users_userID`) REFERENCES `tbl_users` (`userID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `registrarusu` */

insert  into `registrarusu`(`id`,`tbl_users_userID`,`Cedula`,`Nombre`,`fichas_idfichas`,`jornadas_idjornadas`) values (1,1,1020635885,'JEISON ANDRES RAMIREZ',1122334,1);

/*Table structure for table `sedes` */

DROP TABLE IF EXISTS `sedes`;

CREATE TABLE `sedes` (
  `idSedes` int(11) NOT NULL,
  `SedesNom` varchar(50) NOT NULL,
  `centro_idCentro` int(11) NOT NULL,
  PRIMARY KEY (`idSedes`),
  KEY `fk_sedes_centro1_idx` (`centro_idCentro`),
  CONSTRAINT `fk_sedes_centro1` FOREIGN KEY (`centro_idCentro`) REFERENCES `centro` (`idCentro`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sedes` */

insert  into `sedes`(`idSedes`,`SedesNom`,`centro_idCentro`) values (1,'RESTREPO',5201),(2,'ALAMOS',5201),(3,'COMPLEJO SUR',5201),(4,'COLOMBIA',5201),(5,'RICAUTE',5201);

/*Table structure for table `tbl_admin` */

DROP TABLE IF EXISTS `tbl_admin`;

CREATE TABLE `tbl_admin` (
  `userID` int(11) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `userEmail` varchar(50) NOT NULL,
  `userPass` varchar(50) NOT NULL,
  `userStatus` enum('Y','N') NOT NULL,
  `tokenCode` varchar(50) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_admin` */

insert  into `tbl_admin`(`userID`,`userName`,`userEmail`,`userPass`,`userStatus`,`tokenCode`) values (0,'Jeison Andres Ramirez','jaramirez018@misena.edu.co','25d55ad283aa400af464c76d713c07ad','Y','ecf6a5eefc28308c4d91fec47490f8c0');

/*Table structure for table `tbl_users` */

DROP TABLE IF EXISTS `tbl_users`;

CREATE TABLE `tbl_users` (
  `userID` int(11) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `userEmail` varchar(50) NOT NULL,
  `userPass` varchar(50) NOT NULL,
  `userStatus` enum('Y','N') NOT NULL,
  `tokenCode` varchar(50) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_users` */

insert  into `tbl_users`(`userID`,`userName`,`userEmail`,`userPass`,`userStatus`,`tokenCode`) values (1,'JEISON ANDRES RAMIREZ','jaramirez018@misena.edu.co','25d55ad283aa400af464c76d713c07ad','Y','ee5edf5be10db8998c71585b9203bc59');

/* Procedure structure for procedure `stpca_iambientes` */

/*!50003 DROP PROCEDURE IF EXISTS  `stpca_iambientes` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `stpca_iambientes`(IN pidAmbientes INT,IN pAmbientesNom VARCHAR (80),IN psedes_idSedes INT)
BEGIN
	INSERT INTO ambientes(idAmbientes,AmbientesNom,sedes_idSedes) 
	VALUES (pidAmbientes,pAmbientesNom,psedes_idSedes);
END */$$
DELIMITER ;

/* Procedure structure for procedure `stpcf_ifichas` */

/*!50003 DROP PROCEDURE IF EXISTS  `stpcf_ifichas` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `stpcf_ifichas`(IN pidfichas INT,IN pfichasNom VARCHAR (80),IN pambientes_idAmbientes INT,in pjornadas_idjornadas int)
BEGIN
	INSERT INTO fichas(idfichas,fichasNom,ambientes_idAmbientes,jornadas_idjornadas) 
	VALUES (pidfichas,pfichasNom,pambientes_idAmbientes,pjornadas_idjornadas);
END */$$
DELIMITER ;

/* Procedure structure for procedure `stpcp_ipreguntas` */

/*!50003 DROP PROCEDURE IF EXISTS  `stpcp_ipreguntas` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `stpcp_ipreguntas`(IN pid_Pregunta INT,IN pNom_Pregunta VARCHAR (80),in pregistrarusu_id int)
BEGIN
	INSERT INTO preguntas(id_Pregunta,Nom_Pregunta,registrarusu_id) 
	VALUES (pid_Pregunta,pNom_Pregunta,pregistrarusu_id);
END */$$
DELIMITER ;

/* Procedure structure for procedure `stpcse_isedes` */

/*!50003 DROP PROCEDURE IF EXISTS  `stpcse_isedes` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `stpcse_isedes`(IN pidSedes INT,IN pSedesNom VARCHAR (80),IN pcentro_idCentro INT)
BEGIN
	INSERT INTO sedes(idSedes,SedesNom,centro_idCentro) 
	VALUES (pidSedes,pSedesNom,pcentro_idCentro);
END */$$
DELIMITER ;

/* Procedure structure for procedure `stpc_icentro` */

/*!50003 DROP PROCEDURE IF EXISTS  `stpc_icentro` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `stpc_icentro`(IN pidCentro INT,IN pCentroNom VARCHAR (80),IN pciudades_idciudades INT)
BEGIN
	INSERT INTO centro(idCentro,CentroNom,ciudades_idciudades) 
	VALUES (pidCentro,pCentroNom,pciudades_idciudades);
END */$$
DELIMITER ;

/* Procedure structure for procedure `stpe_iciudades` */

/*!50003 DROP PROCEDURE IF EXISTS  `stpe_iciudades` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `stpe_iciudades`(IN pidciudades INT,IN pciudades VARCHAR (50),IN pdepartamentos_iddepartamentos INT)
BEGIN
	INSERT INTO ciudades(idciudades,ciudades,departamentos_iddepartamentos) 
	VALUES (pidciudades,pciudades,pdepartamentos_iddepartamentos);
END */$$
DELIMITER ;

/* Procedure structure for procedure `stp_actualizar_iciudades` */

/*!50003 DROP PROCEDURE IF EXISTS  `stp_actualizar_iciudades` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `stp_actualizar_iciudades`(IN pidciudades INT,IN pciudades VARCHAR (50),IN pdepartamentos_iddepartamentos INT)
BEGIN
	UPDATE ciudades 
	SET ciudades = pciudades
	WHERE idciudades = pidciudades OR departamentos_iddepartamentos = pdepartamentos_iddepartamentos;
END */$$
DELIMITER ;

/* Procedure structure for procedure `stp_actualizar_idepartamentos` */

/*!50003 DROP PROCEDURE IF EXISTS  `stp_actualizar_idepartamentos` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `stp_actualizar_idepartamentos`(IN piddepartamentos INT,IN pdepartamentos VARCHAR (50))
BEGIN
	UPDATE departamentos 
	SET departamentos = pdepartamentos 
	WHERE iddepartamentos = piddepartamentos;
END */$$
DELIMITER ;

/* Procedure structure for procedure `stp_idepartamentos` */

/*!50003 DROP PROCEDURE IF EXISTS  `stp_idepartamentos` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `stp_idepartamentos`(IN piddepartamentos INT,IN pdepartamentos VARCHAR (50))
BEGIN
	INSERT INTO departamentos(iddepartamentos,departamentos) 
	VALUES (piddepartamentos,pdepartamentos);
END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
