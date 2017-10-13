-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-09-2017 a las 09:16:59
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clima`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dispositivo`
--

CREATE TABLE `dispositivo` (
  `NUMSERIE` varchar(4) NOT NULL,
  `BARRIO` varchar(30) NOT NULL,
  `LATITUD` double NOT NULL,
  `LONGITUD` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `dispositivo`
--

INSERT INTO `dispositivo` (`NUMSERIE`, `BARRIO`, `LATITUD`, `LONGITUD`) VALUES
('S001', 'cataguan', 89, 67),
('S002', 'lomas', 45, 54),
('S003', 'cartago', 78, 78),
('S004', 'valencia', 67, 78);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medida`
--

CREATE TABLE `medida` (
  `NUMMEDIDA` int(11) NOT NULL,
  `NUMSERIE` varchar(4) NOT NULL,
  `HUMEDAD` float NOT NULL,
  `TEMPERATURA` float NOT NULL,
  `LLUVIA` tinyint(1) NOT NULL,
  `ANIO` int(11) NOT NULL,
  `MES` int(11) NOT NULL,
  `DIA` int(11) NOT NULL,
  `HORA` int(11) NOT NULL,
  `MINUTO` int(11) NOT NULL,
  `SEGUNDO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `dispositivo`
--
ALTER TABLE `dispositivo`
  ADD PRIMARY KEY (`NUMSERIE`);

--
-- Indices de la tabla `medida`
--
ALTER TABLE `medida`
  ADD PRIMARY KEY (`NUMMEDIDA`),
  ADD KEY `FK_TOMA` (`NUMSERIE`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `medida`
--
ALTER TABLE `medida`
  ADD CONSTRAINT `FK_TOMA` FOREIGN KEY (`NUMSERIE`) REFERENCES `dispositivo` (`NUMSERIE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
