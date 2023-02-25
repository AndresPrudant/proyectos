-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 25-02-2023 a las 06:12:21
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdvotos`
--
CREATE DATABASE IF NOT EXISTS `bdvotos` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `bdvotos`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `candidatos`
--

DROP TABLE IF EXISTS `candidatos`;
CREATE TABLE IF NOT EXISTS `candidatos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `candidatos`
--

INSERT INTO `candidatos` (`id`, `nombre`) VALUES
(1, 'Gabriel Boric'),
(2, 'José Antonio Kast'),
(3, 'Yasna Provoste'),
(4, 'Sebastián Sichel'),
(5, 'Eduardo Artés'),
(6, 'Marco Enríquez-Ominami'),
(7, 'Franco Parisi');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comunas`
--

DROP TABLE IF EXISTS `comunas`;
CREATE TABLE IF NOT EXISTS `comunas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(300) NOT NULL,
  `region` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_comuna` (`region`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `comunas`
--

INSERT INTO `comunas` (`id`, `nombre`, `region`) VALUES
(1, 'Alihué', 1),
(2, 'Conchalí', 1),
(3, 'Independencia', 1),
(4, 'La Florida', 1),
(5, 'Puente Alto', 1),
(6, 'Arica', 2),
(7, 'Camarones', 2),
(8, 'General Lagos', 2),
(9, 'Putre', 2),
(15, 'Algarrobo', 3),
(16, 'Concón', 3),
(17, 'La Cruz', 3),
(18, 'Putaendo', 3),
(19, 'Quilpué', 3),
(20, 'Andacollo', 4),
(21, 'Coquimbo', 4),
(22, 'La Serena', 4),
(23, 'Ovalle', 4),
(24, 'La Higuera', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regiones`
--

DROP TABLE IF EXISTS `regiones`;
CREATE TABLE IF NOT EXISTS `regiones` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `regiones`
--

INSERT INTO `regiones` (`id`, `nombre`) VALUES
(1, 'Metropolitana'),
(2, 'Arica'),
(3, 'Valparaíso'),
(4, 'Coquimbo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `votos`
--

DROP TABLE IF EXISTS `votos`;
CREATE TABLE IF NOT EXISTS `votos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombreApellido` varchar(100) NOT NULL,
  `alias` varchar(200) NOT NULL,
  `rut` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `region` varchar(80) NOT NULL,
  `comuna` varchar(50) NOT NULL,
  `candidato` varchar(100) NOT NULL,
  `enteraPorWeb` int NOT NULL,
  `enteraPorTv` int NOT NULL,
  `enteraPorRedSoc` int NOT NULL,
  `enteraPorAmigo` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `votos`
--

INSERT INTO `votos` (`id`, `nombreApellido`, `alias`, `rut`, `email`, `region`, `comuna`, `candidato`, `enteraPorWeb`, `enteraPorTv`, `enteraPorRedSoc`, `enteraPorAmigo`) VALUES
(1, 'Roberto Fernandez', 'RoberFer', '19.838.990-0', 'asd@asd.ejemplo', '1', '4', '1', 1, 1, 1, 0);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comunas`
--
ALTER TABLE `comunas`
  ADD CONSTRAINT `fk_id_comuna` FOREIGN KEY (`region`) REFERENCES `regiones` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
