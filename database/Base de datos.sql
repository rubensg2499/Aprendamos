-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.22-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para aplicacion_web
DROP DATABASE IF EXISTS `aplicacion_web`;
CREATE DATABASE IF NOT EXISTS `aplicacion_web` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `aplicacion_web`;

-- Volcando estructura para tabla aplicacion_web.administrador
DROP TABLE IF EXISTS `administrador`;
CREATE TABLE IF NOT EXISTS `administrador` (
  `nick_administrador` varchar(16) NOT NULL,
  `fecha_inicio` date NOT NULL,
  PRIMARY KEY (`nick_administrador`),
  CONSTRAINT `usuario_administrador_fk` FOREIGN KEY (`nick_administrador`) REFERENCES `usuario` (`nick_usuario`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla aplicacion_web.alumno
DROP TABLE IF EXISTS `alumno`;
CREATE TABLE IF NOT EXISTS `alumno` (
  `nick_alumno` varchar(16) NOT NULL,
  `matricula` char(10) DEFAULT NULL,
  `grupo` int(11) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `escuela_procedencia` varchar(64) NOT NULL,
  `pregunta_seguridad` varchar(64) NOT NULL,
  `respuesta_pregunta` varchar(32) NOT NULL,
  `imagen_perfil` varchar(32) NOT NULL,
  `nick_administrador` varchar(16) DEFAULT NULL,
  `id_periodo` int(11) DEFAULT NULL,
  PRIMARY KEY (`nick_alumno`),
  KEY `administrador_alumno_fk` (`nick_administrador`),
  KEY `periodo_alumno_fk` (`id_periodo`),
  CONSTRAINT `administrador_alumno_fk` FOREIGN KEY (`nick_administrador`) REFERENCES `administrador` (`nick_administrador`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `periodo_alumno_fk` FOREIGN KEY (`id_periodo`) REFERENCES `periodo` (`id_periodo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `usuario_alumno_fk` FOREIGN KEY (`nick_alumno`) REFERENCES `usuario` (`nick_usuario`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla aplicacion_web.alumno_cuestionario_reactivo
DROP TABLE IF EXISTS `alumno_cuestionario_reactivo`;
CREATE TABLE IF NOT EXISTS `alumno_cuestionario_reactivo` (
  `nick_alumno` varchar(16) NOT NULL,
  `id_reactivo` int(11) NOT NULL,
  `id_cuestionario` int(11) NOT NULL,
  `respuesta_alumno` char(1) DEFAULT NULL,
  PRIMARY KEY (`nick_alumno`,`id_reactivo`,`id_cuestionario`),
  KEY `cuestionario_alumno_reactivo_fk` (`id_cuestionario`),
  KEY `reactivo_alumno_reactivo_fk` (`id_reactivo`),
  CONSTRAINT `alumno_alumno_reactivo_fk` FOREIGN KEY (`nick_alumno`) REFERENCES `alumno` (`nick_alumno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `cuestionario_alumno_reactivo_fk` FOREIGN KEY (`id_cuestionario`) REFERENCES `cuestionario` (`id_cuestionario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `reactivo_alumno_reactivo_fk` FOREIGN KEY (`id_reactivo`) REFERENCES `reactivo` (`id_reactivo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla aplicacion_web.alumno_materia
DROP TABLE IF EXISTS `alumno_materia`;
CREATE TABLE IF NOT EXISTS `alumno_materia` (
  `nick_alumno` varchar(16) NOT NULL,
  `clave` char(4) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`nick_alumno`,`clave`),
  KEY `materia_alumno_materia_fk` (`clave`),
  CONSTRAINT `alumno_alumno_materia_fk` FOREIGN KEY (`nick_alumno`) REFERENCES `alumno` (`nick_alumno`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `materia_alumno_materia_fk` FOREIGN KEY (`clave`) REFERENCES `materia` (`clave`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla aplicacion_web.alumno_realiza_cuestionario
DROP TABLE IF EXISTS `alumno_realiza_cuestionario`;
CREATE TABLE IF NOT EXISTS `alumno_realiza_cuestionario` (
  `nick_alumno` varchar(16) NOT NULL,
  `id_cuestionario` int(11) NOT NULL,
  `aciertos` smallint(6) DEFAULT NULL,
  `errores` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`nick_alumno`,`id_cuestionario`),
  KEY `cuestionario_alumno_realiza_cuestionario_fk` (`id_cuestionario`),
  CONSTRAINT `alumno_alumno_realiza_cuestionario_fk` FOREIGN KEY (`nick_alumno`) REFERENCES `alumno` (`nick_alumno`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `cuestionario_alumno_realiza_cuestionario_fk` FOREIGN KEY (`id_cuestionario`) REFERENCES `cuestionario` (`id_cuestionario`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla aplicacion_web.alumno_solicita_cuestionario
DROP TABLE IF EXISTS `alumno_solicita_cuestionario`;
CREATE TABLE IF NOT EXISTS `alumno_solicita_cuestionario` (
  `nick_alumno` varchar(16) NOT NULL,
  `id_cuestionario` int(11) NOT NULL,
  `estado` varchar(16) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`nick_alumno`,`id_cuestionario`),
  KEY `cuestionario_alumno_solicita_cuestionario_fk` (`id_cuestionario`),
  CONSTRAINT `alumno_alumno_solicita_cuestionario_fk` FOREIGN KEY (`nick_alumno`) REFERENCES `alumno` (`nick_alumno`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `cuestionario_alumno_solicita_cuestionario_fk` FOREIGN KEY (`id_cuestionario`) REFERENCES `cuestionario` (`id_cuestionario`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla aplicacion_web.cuestionario
DROP TABLE IF EXISTS `cuestionario`;
CREATE TABLE IF NOT EXISTS `cuestionario` (
  `id_cuestionario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(64) NOT NULL,
  `complejidad` varchar(16) NOT NULL,
  `fecha_creacion` date NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `estado` char(1) NOT NULL,
  `clave` char(4) NOT NULL,
  `nick_profesor` varchar(16) NOT NULL,
  PRIMARY KEY (`id_cuestionario`),
  KEY `profesor_cuestionario_fk` (`nick_profesor`),
  KEY `materia_cuestionario_fk` (`clave`),
  CONSTRAINT `materia_cuestionario_fk` FOREIGN KEY (`clave`) REFERENCES `materia` (`clave`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `profesor_cuestionario_fk` FOREIGN KEY (`nick_profesor`) REFERENCES `profesor` (`nick_profesor`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla aplicacion_web.cuestionario_reactivo
DROP TABLE IF EXISTS `cuestionario_reactivo`;
CREATE TABLE IF NOT EXISTS `cuestionario_reactivo` (
  `id_cuestionario` int(11) NOT NULL,
  `id_reactivo` int(11) NOT NULL,
  PRIMARY KEY (`id_cuestionario`,`id_reactivo`),
  KEY `reactivo_cuestionario_reactivo_fk` (`id_reactivo`),
  CONSTRAINT `cuestionario_cuestionario_reactivo_fk` FOREIGN KEY (`id_cuestionario`) REFERENCES `cuestionario` (`id_cuestionario`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `reactivo_cuestionario_reactivo_fk` FOREIGN KEY (`id_reactivo`) REFERENCES `reactivo` (`id_reactivo`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla aplicacion_web.materia
DROP TABLE IF EXISTS `materia`;
CREATE TABLE IF NOT EXISTS `materia` (
  `clave` char(4) NOT NULL,
  `nombre` varchar(64) NOT NULL,
  `horas` varchar(3) NOT NULL,
  `creditos` varchar(3) NOT NULL,
  `semestre` varchar(2) NOT NULL,
  `grupo` int(11) NOT NULL,
  `nick_administrador` varchar(16) NOT NULL,
  PRIMARY KEY (`clave`),
  KEY `administrador_materia_fk` (`nick_administrador`),
  CONSTRAINT `administrador_materia_fk` FOREIGN KEY (`nick_administrador`) REFERENCES `administrador` (`nick_administrador`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla aplicacion_web.periodo
DROP TABLE IF EXISTS `periodo`;
CREATE TABLE IF NOT EXISTS `periodo` (
  `id_periodo` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(16) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `nick_administrador` varchar(16) NOT NULL,
  PRIMARY KEY (`id_periodo`),
  KEY `administrador_periodo_fk` (`nick_administrador`),
  CONSTRAINT `administrador_periodo_fk` FOREIGN KEY (`nick_administrador`) REFERENCES `administrador` (`nick_administrador`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla aplicacion_web.profesor
DROP TABLE IF EXISTS `profesor`;
CREATE TABLE IF NOT EXISTS `profesor` (
  `nick_profesor` varchar(16) NOT NULL,
  `cvu` varchar(10) DEFAULT NULL,
  `grado_maximo_estudios` varchar(16) NOT NULL,
  `pregunta_seguridad` varchar(64) NOT NULL,
  `respuesta_pregunta` varchar(32) NOT NULL,
  `nick_administrador` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`nick_profesor`),
  KEY `administrador_profesor_fk` (`nick_administrador`),
  CONSTRAINT `administrador_profesor_fk` FOREIGN KEY (`nick_administrador`) REFERENCES `administrador` (`nick_administrador`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `usuario_profesor_fk` FOREIGN KEY (`nick_profesor`) REFERENCES `usuario` (`nick_usuario`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla aplicacion_web.profesor_alumno
DROP TABLE IF EXISTS `profesor_alumno`;
CREATE TABLE IF NOT EXISTS `profesor_alumno` (
  `nick_profesor` varchar(16) NOT NULL,
  `nick_alumno` varchar(16) NOT NULL,
  PRIMARY KEY (`nick_profesor`,`nick_alumno`),
  KEY `alumno_profesor_alumno_fk` (`nick_alumno`),
  CONSTRAINT `alumno_profesor_alumno_fk` FOREIGN KEY (`nick_alumno`) REFERENCES `alumno` (`nick_alumno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `profesor_profesor_alumno_fk` FOREIGN KEY (`nick_profesor`) REFERENCES `profesor` (`nick_profesor`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla aplicacion_web.profesor_materia
DROP TABLE IF EXISTS `profesor_materia`;
CREATE TABLE IF NOT EXISTS `profesor_materia` (
  `nick_profesor` varchar(16) NOT NULL,
  `clave` char(4) NOT NULL,
  PRIMARY KEY (`nick_profesor`,`clave`),
  KEY `materia_profesor_materia_fk` (`clave`),
  CONSTRAINT `materia_profesor_materia_fk` FOREIGN KEY (`clave`) REFERENCES `materia` (`clave`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `profesor_profesor_materia_fk` FOREIGN KEY (`nick_profesor`) REFERENCES `profesor` (`nick_profesor`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla aplicacion_web.profesor_periodo
DROP TABLE IF EXISTS `profesor_periodo`;
CREATE TABLE IF NOT EXISTS `profesor_periodo` (
  `nick_profesor` varchar(16) NOT NULL,
  `id_periodo` int(11) NOT NULL,
  PRIMARY KEY (`nick_profesor`,`id_periodo`),
  KEY `periodo_profesor_periodo_fk` (`id_periodo`),
  CONSTRAINT `periodo_profesor_periodo_fk` FOREIGN KEY (`id_periodo`) REFERENCES `periodo` (`id_periodo`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `profesor_profesor_periodo_fk` FOREIGN KEY (`nick_profesor`) REFERENCES `profesor` (`nick_profesor`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla aplicacion_web.reactivo
DROP TABLE IF EXISTS `reactivo`;
CREATE TABLE IF NOT EXISTS `reactivo` (
  `id_reactivo` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(16) NOT NULL,
  `complejidad` varchar(16) NOT NULL,
  `tipo` varchar(16) NOT NULL,
  `enunciado` varchar(512) NOT NULL,
  `inciso_a_texto` varchar(128) DEFAULT NULL,
  `inciso_b_texto` varchar(128) DEFAULT NULL,
  `inciso_c_texto` varchar(128) DEFAULT NULL,
  `inciso_d_texto` varchar(128) DEFAULT NULL,
  `inciso_a_archivo` longblob DEFAULT NULL,
  `inciso_b_archivo` longblob DEFAULT NULL,
  `inciso_c_archivo` longblob DEFAULT NULL,
  `inciso_d_archivo` longblob DEFAULT NULL,
  `respuesta` char(1) DEFAULT NULL,
  `fecha_adicion` date NOT NULL,
  `nick_profesor` varchar(16) NOT NULL,
  `clave` char(4) NOT NULL,
  PRIMARY KEY (`id_reactivo`),
  KEY `profesor_reactivo_fk` (`nick_profesor`),
  KEY `materia_reactivo_fk` (`clave`),
  CONSTRAINT `materia_reactivo_fk` FOREIGN KEY (`clave`) REFERENCES `materia` (`clave`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `profesor_reactivo_fk` FOREIGN KEY (`nick_profesor`) REFERENCES `profesor` (`nick_profesor`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla aplicacion_web.usuario
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `nick_usuario` varchar(16) NOT NULL,
  `pass` varchar(16) NOT NULL,
  `tipo` varchar(16) NOT NULL,
  `nombre` varchar(32) NOT NULL,
  `ape_pat` varchar(32) NOT NULL,
  `ape_mat` varchar(32) NOT NULL,
  `correo` varchar(32) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`nick_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
