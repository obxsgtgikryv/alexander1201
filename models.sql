-- Nombre de la base de datos
CREATE DATABASE IF NOT EXISTS `db_uptnmls`;
USE `db_uptnmls`;


-- Modelo de la tabla
CREATE TABLE IF NOT EXISTS `empleados` (
  `id` int(11) NOT NULL DEFAULT 912345678,
  `Nombre` varchar(50) NOT NULL DEFAULT '',
  `Apellido` varchar(50) NOT NULL DEFAULT '',
  `Correo` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
